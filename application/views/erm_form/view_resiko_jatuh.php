<<<<<<< HEAD
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Formulir Resiko Jatuh</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">

                <div class="panel-body">
                    <div class="form-wrap">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $no_rm ?>" id="inNoRM" disabled>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $nama ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                <input type="text" class="form-control" value="<?= $jenis_kelamin ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Umur<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?php
                                                                                $birthDate = $tgl_lahir;
                                                                                date_default_timezone_set('Asia/Jakarta');

                                                                                $date = new DateTime($birthDate);
                                                                                $now = new DateTime();
                                                                                $interval = $now->diff($date);

                                                                                echo  $interval->y . " Tahun"; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Alamat</label>
                                <input type="text" class="form-control" value="<?= $alamat ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Dokter Pelaksana Tindakan<span class="help"></span></label>
                                <input type="Text" class="form-control" value="<?= $pasien->nama_dokter ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>1. Mengendalikan rangsang defeksi (BAB)</p>
                                    </label>
                                </strong>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (1) Sebelum sakit :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab1_1" type="radio" name="bab1" value="0">
                                            <label class="control-label" for="bab1_1">
                                                Tak terkendali/tak teratur
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab1_2" type="radio" name="bab1" value="1">
                                            <label class="control-label" for="bab1_2">
                                                Kadang-kadang tak terkendali
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab1_3" type="radio" name="bab1" value="2">
                                            <label class="control-label" for="bab1_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (2) Saat masuk RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab2_1" type="radio" name="bab2" value="0">
                                            <label class="control-label" for="bab2_1">
                                                Tak terkendali/tak teratur
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab2_2" type="radio" name="bab2" value="1">
                                            <label class="control-label" for="bab2_2">
                                                Kadang-kadang tak terkendali
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab2_3" type="radio" name="bab2" value="2">
                                            <label class="control-label" for="bab2_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (3) Minggu I di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab3_1" type="radio" name="bab3" value="0">
                                            <label class="control-label" for="bab3_1">
                                                Tak terkendali/tak teratur
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab3_2" type="radio" name="bab3" value="1">
                                            <label class="control-label" for="bab3_2">
                                                Kadang-kadang tak terkendali
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab3_3" type="radio" name="bab3" value="2">
                                            <label class="control-label" for="bab3_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (4) Minggu II di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab4_1" type="radio" name="bab4" value="0">
                                            <label class="control-label" for="bab4_1">
                                                Tak terkendali/tak teratur
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab4_2" type="radio" name="bab4" value="1">
                                            <label class="control-label" for="bab4_2">
                                                Kadang-kadang tak terkendali
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab4_3" type="radio" name="bab4" value="2">
                                            <label class="control-label" for="bab4_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (5) Minggu III di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab5_1" type="radio" name="bab5" value="0">
                                            <label class="control-label" for="bab5_1">
                                                Tak terkendali/tak teratur
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab5_2" type="radio" name="bab5" value="1">
                                            <label class="control-label" for="bab5_2">
                                                Kadang-kadang tak terkendali
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab5_3" type="radio" name="bab5" value="2">
                                            <label class="control-label" for="bab5_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (6) Minggu IV di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab6_1" type="radio" name="bab6" value="0">
                                            <label class="control-label" for="bab6_1">
                                                Tak terkendali/tak teratur
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab6_2" type="radio" name="bab6" value="1">
                                            <label class="control-label" for="bab6_2">
                                                Kadang-kadang tak terkendali
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab6_3" type="radio" name="bab6" value="2">
                                            <label class="control-label" for="bab6_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (7) Saat Pulang :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab7_1" type="radio" name="bab7" value="0">
                                            <label class="control-label" for="bab7_1">
                                                Tak terkendali/tak teratur
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab7_2" type="radio" name="bab7" value="1">
                                            <label class="control-label" for="bab7_2">
                                                Kadang-kadang tak terkendali
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab7_3" type="radio" name="bab7" value="2">
                                            <label class="control-label" for="bab7_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>2. Mengendalikan rangsang berkemih (BAK)</p>
                                    </label>
                                </strong>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (1) Sebelum sakit :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak1_1" type="radio" name="bak1" value="0">
                                            <label class="control-label" for="bak1_1">
                                                Tak terkendali/pakai kateter
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak1_2" type="radio" name="bak1" value="1">
                                            <label class="control-label" for="bak1_2">
                                                Kadang-kadang tak terkendali (1x24jam)
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak1_3" type="radio" name="bak1" value="2">
                                            <label class="control-label" for="bak1_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (2) Saat masuk RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak2_1" type="radio" name="bak2" value="0">
                                            <label class="control-label" for="bak2_1">
                                                Tak terkendali/pakai kateter
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak2_2" type="radio" name="bak2" value="1">
                                            <label class="control-label" for="bak2_2">
                                                Kadang-kadang tak terkendali (1x24jam)
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak2_3" type="radio" name="bak2" value="2">
                                            <label class="control-label" for="bak2_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (3) Minggu I di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak3_1" type="radio" name="bak3" value="0">
                                            <label class="control-label" for="bak3_1">
                                                Tak terkendali/pakai kateter
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak3_2" type="radio" name="bak3" value="1">
                                            <label class="control-label" for="bak3_2">
                                                Kadang-kadang tak terkendali (1x24jam)
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak3_3" type="radio" name="bak3" value="2">
                                            <label class="control-label" for="bak3_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (4) Minggu II di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak4_1" type="radio" name="bak4" value="0">
                                            <label class="control-label" for="bak4_1">
                                                Tak terkendali/pakai kateter
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak4_2" type="radio" name="bak4" value="1">
                                            <label class="control-label" for="bak4_2">
                                                Kadang-kadang tak terkendali (1x24jam)
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak4_3" type="radio" name="bak4" value="2">
                                            <label class="control-label" for="bak4_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (5) Minggu III di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak5_1" type="radio" name="bak5" value="0">
                                            <label class="control-label" for="bak5_1">
                                                Tak terkendali/pakai kateter
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak5_2" type="radio" name="bak5" value="1">
                                            <label class="control-label" for="bak5_2">
                                                Kadang-kadang tak terkendali (1x24jam)
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak5_3" type="radio" name="bak5" value="2">
                                            <label class="control-label" for="bak5_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (6) Minggu IV di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak6_1" type="radio" name="bak6" value="0">
                                            <label class="control-label" for="bak6_1">
                                                Tak terkendali/pakai kateter
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak6_2" type="radio" name="bak6" value="1">
                                            <label class="control-label" for="bak6_2">
                                                Kadang-kadang tak terkendali (1x24jam)
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak6_3" type="radio" name="bak6" value="2">
                                            <label class="control-label" for="bak6_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (7) Saat Pulang :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak7_1" type="radio" name="bak7" value="0">
                                            <label class="control-label" for="bak7_1">
                                                Tak terkendali/pakai kateter
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak7_2" type="radio" name="bak7" value="1">
                                            <label class="control-label" for="bak7_2">
                                                Kadang-kadang tak terkendali (1x24jam)
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak7_3" type="radio" name="bak7" value="2">
                                            <label class="control-label" for="bak7_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>3. Membersihkan diri (cuci muka, sisir rambut, sikat gigi)</p>
                                    </label>
                                </strong>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (1) Sebelum sakit :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi1_1" type="radio" name="rapi1" value="0">
                                            <label class="control-label" for="rapi1_1">
                                                Butuh pertolongan orang lain
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi1_2" type="radio" name="rapi1" value="1">
                                            <label class="control-label" for="rapi1_2">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (2) Saat masuk RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi2_1" type="radio" name="rapi2" value="0">
                                            <label class="control-label" for="rapi2_1">
                                                Butuh pertolongan orang lain
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi2_2" type="radio" name="rapi2" value="1">
                                            <label class="control-label" for="rapi2_2">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (3) Minggu I di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi3_1" type="radio" name="rapi3" value="0">
                                            <label class="control-label" for="rapi3_1">
                                                Butuh pertolongan orang lain
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi3_2" type="radio" name="rapi3" value="1">
                                            <label class="control-label" for="rapi3_2">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (4) Minggu II di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi4_1" type="radio" name="rapi4" value="0">
                                            <label class="control-label" for="rapi4_1">
                                                Butuh pertolongan orang lain
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi4_2" type="radio" name="rapi4" value="1">
                                            <label class="control-label" for="rapi4_2">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (5) Minggu III di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi5_1" type="radio" name="rapi5" value="0">
                                            <label class="control-label" for="rapi5_1">
                                                Butuh pertolongan orang lain
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi5_2" type="radio" name="rapi5" value="1">
                                            <label class="control-label" for="rapi5_2">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (6) Minggu IV di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi6_1" type="radio" name="rapi6" value="0">
                                            <label class="control-label" for="rapi6_1">
                                                Butuh pertolongan orang lain
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi6_2" type="radio" name="rapi6" value="1">
                                            <label class="control-label" for="rapi6_2">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (7) Saat Pulang :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi7_1" type="radio" name="rapi7" value="0">
                                            <label class="control-label" for="rapi7_1">
                                                Butuh pertolongan orang lain
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi7_2" type="radio" name="rapi7" value="1">
                                            <label class="control-label" for="rapi7_2">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">
                                            <p><br>4. Penggunaan jamban, masuk dan keluar (melepaskan, memakai celana, membersihkan, menyiram)</p>
                                        </label>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (1) Sebelum sakit :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban1_1" type="radio" name="jamban1" value="0">
                                                <label class="control-label" for="jamban1_1">
                                                    Tergantung pertolongan orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary col-md-1">
                                                <input id="jamban1_2" type="radio" name="jamban1" value="1">
                                            </div>
                                            <label class="control-label col-md-8" for="jamban1_2">
                                                Perlu pertolongan pada beberapa kegiatan, tetapi dapat mengerjakan sendiri kegiatan yang lain
                                            </label>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban1_3" type="radio" name="jamban1" value="2">
                                                <label class="control-label" for="jamban1_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (2) Saat masuk RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban2_1" type="radio" name="jamban2" value="0">
                                                <label class="control-label" for="jamban2_1">
                                                    Tergantung pertolongan orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary col-md-1">
                                                <input id="jamban2_2" type="radio" name="jamban2" value="1">
                                            </div>
                                            <label class="control-label col-md-8" for="jamban2_2">
                                                Perlu pertolongan pada beberapa kegiatan, tetapi dapat mengerjakan sendiri kegiatan yang lain
                                            </label>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban2_3" type="radio" name="jamban2" value="2">
                                                <label class="control-label" for="jamban2_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (3) Minggu I di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban3_1" type="radio" name="jamban3" value="0">
                                                <label class="control-label" for="jamban3_1">
                                                    Tergantung pertolongan orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary col-md-1">
                                                <input id="jamban3_2" type="radio" name="jamban3" value="1">
                                            </div>
                                            <label class="control-label col-md-8" for="jamban3_2">
                                                Perlu pertolongan pada beberapa kegiatan, tetapi dapat mengerjakan sendiri kegiatan yang lain
                                            </label>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban3_3" type="radio" name="jamban3" value="2">
                                                <label class="control-label" for="jamban3_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (4) Minggu II di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban4_1" type="radio" name="jamban4" value="0">
                                                <label class="control-label" for="jamban4_1">
                                                    Tergantung pertolongan orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary col-md-1">
                                                <input id="jamban4_2" type="radio" name="jamban4" value="1">
                                            </div>
                                            <label class="control-label col-md-8" for="jamban4_2">
                                                Perlu pertolongan pada beberapa kegiatan, tetapi dapat mengerjakan sendiri kegiatan yang lain
                                            </label>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban4_3" type="radio" name="jamban4" value="2">
                                                <label class="control-label" for="jamban4_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (5) Minggu III di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban5_1" type="radio" name="jamban5" value="0">
                                                <label class="control-label" for="jamban5_1">
                                                    Tergantung pertolongan orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary col-md-1">
                                                <input id="jamban5_2" type="radio" name="jamban5" value="1">
                                            </div>
                                            <label class="control-label col-md-8" for="jamban5_2">
                                                Perlu pertolongan pada beberapa kegiatan, tetapi dapat mengerjakan sendiri kegiatan yang lain
                                            </label>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban5_3" type="radio" name="jamban5" value="2">
                                                <label class="control-label" for="jamban5_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (6) Minggu IV di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban6_1" type="radio" name="jamban6" value="0">
                                                <label class="control-label" for="jamban6_1">
                                                    Tergantung pertolongan orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary col-md-1">
                                                <input id="jamban6_2" type="radio" name="jamban6" value="1">
                                            </div>
                                            <label class="control-label col-md-8" for="jamban6_2">
                                                Perlu pertolongan pada beberapa kegiatan, tetapi dapat mengerjakan sendiri kegiatan yang lain
                                            </label>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban6_3" type="radio" name="jamban6" value="2">
                                                <label class="control-label" for="jamban6_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (7) Saat Pulang :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban7_1" type="radio" name="jamban7" value="0">
                                                <label class="control-label" for="jamban7_1">
                                                    Tergantung pertolongan orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary col-md-1">
                                                <input id="jamban7_2" type="radio" name="jamban7" value="1">
                                            </div>
                                            <label class="control-label col-md-8" for="jamban7_2">
                                                Perlu pertolongan pada beberapa kegiatan, tetapi dapat mengerjakan sendiri kegiatan yang lain
                                            </label>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban7_3" type="radio" name="jamban7" value="2">
                                                <label class="control-label" for="jamban7_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">
                                            <p><br>5. Makan</p>
                                        </label>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (1) Sebelum sakit :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan1_1" type="radio" name="makan1" value="0">
                                                <label class="control-label" for="makan1_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan1_2" type="radio" name="makan1" value="1">
                                                <label class="control-label" for="makan1_2">
                                                    Perlu ditolong memotong makanan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan1_3" type="radio" name="makan1" value="2">
                                                <label class="control-label" for="makan1_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (2) Saat masuk RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan2_1" type="radio" name="makan2" value="0">
                                                <label class="control-label" for="makan2_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan2_2" type="radio" name="makan2" value="1">
                                                <label class="control-label" for="makan2_2">
                                                    Perlu ditolong memotong makanan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan2_3" type="radio" name="makan2" value="2">
                                                <label class="control-label" for="makan2_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (3) Minggu I di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan3_1" type="radio" name="makan3" value="0">
                                                <label class="control-label" for="makan3_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan3_2" type="radio" name="makan3" value="1">
                                                <label class="control-label" for="makan3_2">
                                                    Perlu ditolong memotong makanan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan3_3" type="radio" name="makan3" value="2">
                                                <label class="control-label" for="makan3_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (4) Minggu II di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan4_1" type="radio" name="makan4" value="0">
                                                <label class="control-label" for="makan4_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan4_2" type="radio" name="makan4" value="1">
                                                <label class="control-label" for="makan4_2">
                                                    Perlu ditolong memotong makanan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan4_3" type="radio" name="makan4" value="2">
                                                <label class="control-label" for="makan4_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (5) Minggu III di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan5_1" type="radio" name="makan5" value="0">
                                                <label class="control-label" for="makan1_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan5_2" type="radio" name="makan5" value="1">
                                                <label class="control-label" for="makan1_2">
                                                    Perlu ditolong memotong makanan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan5_3" type="radio" name="makan5" value="2">
                                                <label class="control-label" for="makan5_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (6) Minggu IV di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan6_1" type="radio" name="makan6" value="0">
                                                <label class="control-label" for="makan6_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan6_2" type="radio" name="makan6" value="1">
                                                <label class="control-label" for="makan6_2">
                                                    Perlu ditolong memotong makanan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan6_3" type="radio" name="makan6" value="2">
                                                <label class="control-label" for="makan6_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (7) Saat Pulang :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan7_1" type="radio" name="makan7" value="0">
                                                <label class="control-label" for="makan7_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan7_2" type="radio" name="makan7" value="1">
                                                <label class="control-label" for="makan7_2">
                                                    Perlu ditolong memotong makanan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan7_3" type="radio" name="makan7" value="2">
                                                <label class="control-label" for="makan7_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">
                                            <p><br>6. Berubah sikap dari berbaring ke duduk</p>
                                        </label>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (1) Sebelum sakit :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk1_1" type="radio" name="duduk1" value="0">
                                                <label class="control-label" for="duduk1_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk1_2" type="radio" name="duduk1" value="1">
                                                <label class="control-label" for="duduk1_2">
                                                    perlu banyak bantuan untuk bisa duduk (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk1_3" type="radio" name="duduk1" value="2">
                                                <label class="control-label" for="duduk1_3">
                                                    Bantuan (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk1_4" type="radio" name="duduk1" value="3">
                                                <label class="control-label" for="duduk1_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (2) Saat masuk RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk2_1" type="radio" name="duduk2" value="0">
                                                <label class="control-label" for="duduk2_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk2_2" type="radio" name="duduk2" value="1">
                                                <label class="control-label" for="duduk2_2">
                                                    perlu banyak bantuan untuk bisa duduk (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk2_3" type="radio" name="duduk2" value="2">
                                                <label class="control-label" for="duduk2_3">
                                                    Bantuan (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk2_4" type="radio" name="duduk2" value="3">
                                                <label class="control-label" for="duduk2_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (3) Minggu I di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk3_1" type="radio" name="duduk3" value="0">
                                                <label class="control-label" for="duduk3_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk3_2" type="radio" name="duduk3" value="1">
                                                <label class="control-label" for="duduk3_2">
                                                    perlu banyak bantuan untuk bisa duduk (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk3_3" type="radio" name="duduk3" value="2">
                                                <label class="control-label" for="duduk3_3">
                                                    Bantuan (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk3_4" type="radio" name="duduk3" value="3">
                                                <label class="control-label" for="duduk3_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (4) Minggu II di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk4_1" type="radio" name="duduk4" value="0">
                                                <label class="control-label" for="duduk4_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk4_2" type="radio" name="duduk4" value="1">
                                                <label class="control-label" for="duduk4_2">
                                                    perlu banyak bantuan untuk bisa duduk (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk4_3" type="radio" name="duduk4" value="2">
                                                <label class="control-label" for="duduk4_3">
                                                    Bantuan (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk4_4" type="radio" name="duduk4" value="3">
                                                <label class="control-label" for="duduk4_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (5) Minggu III di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk5_1" type="radio" name="duduk5" value="0">
                                                <label class="control-label" for="duduk5_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk5_2" type="radio" name="duduk5" value="1">
                                                <label class="control-label" for="duduk5_2">
                                                    perlu banyak bantuan untuk bisa duduk (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk5_3" type="radio" name="duduk5" value="2">
                                                <label class="control-label" for="duduk5_3">
                                                    Bantuan (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk5_4" type="radio" name="duduk5" value="3">
                                                <label class="control-label" for="duduk5_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (6) Minggu IV di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk6_1" type="radio" name="duduk6" value="0">
                                                <label class="control-label" for="duduk6_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk6_2" type="radio" name="duduk6" value="1">
                                                <label class="control-label" for="duduk6_2">
                                                    perlu banyak bantuan untuk bisa duduk (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk6_3" type="radio" name="duduk6" value="2">
                                                <label class="control-label" for="duduk6_3">
                                                    Bantuan (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk6_4" type="radio" name="duduk6" value="3">
                                                <label class="control-label" for="duduk6_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (7) Saat Pulang :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk7_1" type="radio" name="duduk7" value="0">
                                                <label class="control-label" for="duduk7_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk7_2" type="radio" name="duduk7" value="1">
                                                <label class="control-label" for="duduk7_2">
                                                    perlu banyak bantuan untuk bisa duduk (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk7_3" type="radio" name="duduk7" value="2">
                                                <label class="control-label" for="duduk7_3">
                                                    Bantuan (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk7_4" type="radio" name="duduk7" value="3">
                                                <label class="control-label" for="duduk7_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">
                                            <p><br>7. Berpindah / berjalan </p>
                                        </label>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (1) Sebelum sakit :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan1_1" type="radio" name="jalan1" value="0">
                                                <label class="control-label" for="jalan1_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan1_2" type="radio" name="jalan1" value="1">
                                                <label class="control-label" for="jalan1_2">
                                                    Bisa (pindah) dengan kursi roda
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan1_3" type="radio" name="jalan1" value="2">
                                                <label class="control-label" for="jalan1_3">
                                                    Berjalan dengan bantuan 1 orang
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan1_4" type="radio" name="jalan1" value="3">
                                                <label class="control-label" for="jalan1_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (2) Saat masuk RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan2_1" type="radio" name="jalan2" value="0">
                                                <label class="control-label" for="jalan2_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan2_2" type="radio" name="jalan2" value="1">
                                                <label class="control-label" for="jalan2_2">
                                                    Bisa (pindah) dengan kursi roda
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan2_3" type="radio" name="jalan2" value="2">
                                                <label class="control-label" for="jalan2_3">
                                                    Berjalan dengan bantuan 1 orang
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan2_4" type="radio" name="jalan2" value="3">
                                                <label class="control-label" for="jalan2_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (3) Minggu I di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan3_1" type="radio" name="jalan3" value="0">
                                                <label class="control-label" for="jalan3_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan3_2" type="radio" name="jalan3" value="1">
                                                <label class="control-label" for="jalan3_2">
                                                    Bisa (pindah) dengan kursi roda
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan3_3" type="radio" name="jalan3" value="2">
                                                <label class="control-label" for="jalan3_3">
                                                    Berjalan dengan bantuan 1 orang
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan3_4" type="radio" name="jalan3" value="3">
                                                <label class="control-label" for="jalan3_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (4) Minggu II di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan4_1" type="radio" name="jalan4" value="0">
                                                <label class="control-label" for="jalan4_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan4_2" type="radio" name="jalan4" value="1">
                                                <label class="control-label" for="jalan4_2">
                                                    Bisa (pindah) dengan kursi roda
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan4_3" type="radio" name="jalan4" value="2">
                                                <label class="control-label" for="jalan4_3">
                                                    Berjalan dengan bantuan 1 orang
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan4_4" type="radio" name="jalan4" value="3">
                                                <label class="control-label" for="jalan4_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (5) Minggu III di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan5_1" type="radio" name="jalan5" value="0">
                                                <label class="control-label" for="jalan5_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan5_2" type="radio" name="jalan5" value="1">
                                                <label class="control-label" for="jalan5_2">
                                                    Bisa (pindah) dengan kursi roda
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan5_3" type="radio" name="jalan5" value="2">
                                                <label class="control-label" for="jalan5_3">
                                                    Berjalan dengan bantuan 1 orang
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan5_4" type="radio" name="jalan5" value="3">
                                                <label class="control-label" for="jalan5_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (6) Minggu IV di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan6_1" type="radio" name="jalan6" value="0">
                                                <label class="control-label" for="jalan6_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan6_2" type="radio" name="jalan6" value="1">
                                                <label class="control-label" for="jalan6_2">
                                                    Bisa (pindah) dengan kursi roda
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan6_3" type="radio" name="jalan6" value="2">
                                                <label class="control-label" for="jalan6_3">
                                                    Berjalan dengan bantuan 1 orang
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan6_4" type="radio" name="jalan6" value="3">
                                                <label class="control-label" for="jalan6_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (7) Saat Pulang :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan7_1" type="radio" name="jalan7" value="0">
                                                <label class="control-label" for="jalan7_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan7_2" type="radio" name="jalan7" value="1">
                                                <label class="control-label" for="jalan7_2">
                                                    Bisa (pindah) dengan kursi roda
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan7_3" type="radio" name="jalan7" value="2">
                                                <label class="control-label" for="jalan7_3">
                                                    Berjalan dengan bantuan 1 orang
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan7_4" type="radio" name="jalan7" value="3">
                                                <label class="control-label" for="jalan7_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">
                                            <p><br>8. Memakai baju</p>
                                        </label>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (1) Sebelum sakit :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju1_1" type="radio" name="baju1" value="0">
                                                <label class="control-label" for="baju1_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju1_2" type="radio" name="baju1" value="1">
                                                <label class="control-label" for="baju1_2">
                                                    Sebagian dibantu (misalnya : mengancing baju)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju1_3" type="radio" name="baju1" value="2">
                                                <label class="control-label" for="baju1_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (2) Saat masuk RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju2_1" type="radio" name="baju2" value="0">
                                                <label class="control-label" for="baju2_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju2_2" type="radio" name="baju2" value="1">
                                                <label class="control-label" for="baju2_2">
                                                    Sebagian dibantu (misalnya : mengancing baju)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju2_3" type="radio" name="baju2" value="2">
                                                <label class="control-label" for="baju2_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (3) Minggu I di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju3_1" type="radio" name="baju3" value="0">
                                                <label class="control-label" for="baju3_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju3_2" type="radio" name="baju3" value="1">
                                                <label class="control-label" for="baju3_2">
                                                    Sebagian dibantu (misalnya : mengancing baju)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju3_3" type="radio" name="baju3" value="2">
                                                <label class="control-label" for="baju3_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (4) Minggu II di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju4_1" type="radio" name="baju4" value="0">
                                                <label class="control-label" for="baju4_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju4_2" type="radio" name="baju4" value="1">
                                                <label class="control-label" for="baju4_2">
                                                    Sebagian dibantu (misalnya : mengancing baju)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju4_3" type="radio" name="baju4" value="2">
                                                <label class="control-label" for="baju4_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (5) Minggu III di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju5_1" type="radio" name="baju5" value="0">
                                                <label class="control-label" for="baju5_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju5_2" type="radio" name="baju5" value="1">
                                                <label class="control-label" for="baju5_2">
                                                    Sebagian dibantu (misalnya : mengancing baju)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju5_3" type="radio" name="baju5" value="2">
                                                <label class="control-label" for="baju5_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (6) Minggu IV di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju6_1" type="radio" name="baju6" value="0">
                                                <label class="control-label" for="baju6_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju6_2" type="radio" name="baju6" value="1">
                                                <label class="control-label" for="baju6_2">
                                                    Sebagian dibantu (misalnya : mengancing baju)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju6_3" type="radio" name="baju6" value="2">
                                                <label class="control-label" for="baju6_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (7) Saat Pulang :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju7_1" type="radio" name="baju7" value="0">
                                                <label class="control-label" for="baju7_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju7_2" type="radio" name="baju7" value="1">
                                                <label class="control-label" for="baju7_2">
                                                    Sebagian dibantu (misalnya : mengancing baju)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju7_3" type="radio" name="baju7" value="2">
                                                <label class="control-label" for="baju7_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">
                                            <p><br>9. Naik turun tangga</p>
                                        </label>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (1) Sebelum sakit :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga1_1" type="radio" name="tangga1" value="0">
                                                <label class="control-label" for="tangga1_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga1_2" type="radio" name="tangga1" value="1">
                                                <label class="control-label" for="tangga1_2">
                                                    Butuh pertolongan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga1_3" type="radio" name="tangga1" value="2">
                                                <label class="control-label" for="tangga1_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (2) Saat masuk RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga2_1" type="radio" name="tangga2" value="0">
                                                <label class="control-label" for="tangga2_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga2_2" type="radio" name="tangga2" value="1">
                                                <label class="control-label" for="tangga2_2">
                                                    Butuh pertolongan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga2_3" type="radio" name="tangga2" value="2">
                                                <label class="control-label" for="tangga2_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (3) Minggu I di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga3_1" type="radio" name="tangga3" value="0">
                                                <label class="control-label" for="tangga3_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga3_2" type="radio" name="tangga3" value="1">
                                                <label class="control-label" for="tangga3_2">
                                                    Butuh pertolongan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga3_3" type="radio" name="tangga3" value="2">
                                                <label class="control-label" for="tangga3_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (4) Minggu II di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga4_1" type="radio" name="tangga4" value="0">
                                                <label class="control-label" for="tangga1_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga4_2" type="radio" name="tangga4" value="1">
                                                <label class="control-label" for="tangga4_2">
                                                    Butuh pertolongan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga4_3" type="radio" name="tangga4" value="2">
                                                <label class="control-label" for="tangga4_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (5) Minggu III di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga5_1" type="radio" name="tangga5" value="0">
                                                <label class="control-label" for="tangga5_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga5_2" type="radio" name="tangga5" value="1">
                                                <label class="control-label" for="tangga5_2">
                                                    Butuh pertolongan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga5_3" type="radio" name="tangga5" value="2">
                                                <label class="control-label" for="tangga5_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (6) Minggu IV di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga6_1" type="radio" name="tangga6" value="0">
                                                <label class="control-label" for="tangga1_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga6_2" type="radio" name="tangga6" value="1">
                                                <label class="control-label" for="tangga6_2">
                                                    Butuh pertolongan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga6_3" type="radio" name="tangga6" value="2">
                                                <label class="control-label" for="tangga6_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (7) Saat Pulang :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga7_1" type="radio" name="tangga7" value="0">
                                                <label class="control-label" for="tangga7_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga7_2" type="radio" name="tangga7" value="1">
                                                <label class="control-label" for="tangga7_2">
                                                    Butuh pertolongan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga7_3" type="radio" name="tangga7" value="2">
                                                <label class="control-label" for="tangga7_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">
                                            <p><br>10. Mandi</p>
                                        </label>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (1) Sebelum sakit :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi1_1" type="radio" name="mandi1" value="0">
                                                <label class="control-label" for="mandi1_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi1_2" type="radio" name="mandi1" value="1">
                                                <label class="control-label" for="mandi1_2">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (2) Saat masuk RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi2_1" type="radio" name="mandi2" value="0">
                                                <label class="control-label" for="mandi2_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi2_2" type="radio" name="mandi2" value="1">
                                                <label class="control-label" for="mandi2_2">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (3) Minggu I di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi3_1" type="radio" name="mandi3" value="0">
                                                <label class="control-label" for="mandi3_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi3_2" type="radio" name="mandi3" value="1">
                                                <label class="control-label" for="mandi3_2">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (4) Minggu II di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi4_1" type="radio" name="mandi4" value="0">
                                                <label class="control-label" for="mandi1_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi4_2" type="radio" name="mandi4" value="1">
                                                <label class="control-label" for="mandi4_2">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (5) Minggu III di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi5_1" type="radio" name="mandi5" value="0">
                                                <label class="control-label" for="mandi5_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi5_2" type="radio" name="mandi5" value="1">
                                                <label class="control-label" for="mandi5_2">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (6) Minggu IV di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi6_1" type="radio" name="mandi6" value="0">
                                                <label class="control-label" for="mandi6_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi6_2" type="radio" name="mandi6" value="1">
                                                <label class="control-label" for="mandi6_2">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (7) Saat Pulang :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi7_1" type="radio" name="mandi7" value="0">
                                                <label class="control-label" for="mandi7_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi7_2" type="radio" name="mandi7" value="1">
                                                <label class="control-label" for="mandi7_2">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" onclick="sumScore()" class="btn btn-primary mb-4">Hitung Skor</button>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>Hasil Skor</p>
                                    </label>
                                </strong>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (1) Sebelum sakit :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            <p id="sum1">0</p> <span class="help"></span>
                                        </label>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (2) Saat Masuk RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            <p id="sum2">0</p> <span class="help"></span>
                                        </label>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (3) Minggu I di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            <p id="sum3">0</p> <span class="help"></span>
                                        </label>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (4) Minggu II di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            <p id="sum4">0</p> <span class="help"></span>
                                        </label>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (5) Minggu III di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            <p id="sum5">0</p> <span class="help"></span>
                                        </label>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (6) Minggu IV di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            <p id="sum6">0</p> <span class="help"></span>
                                        </label>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (7) Saat Pulang :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            <p id="sum7">0</p> <span class="help"></span>
                                        </label>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center" style="margin-top: 30px;">
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                            <button type="submit" onclick="simpan()" class="btn btn-success mb-4">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    canvas {
        cursor: crosshair;
        border: 1px solid #000000;
    }
</style>

<script type="text/javascript">
    function sumScore() {
        bab1 = $('input[name="bab1"]:checked').val();
        bab2 = $('input[name="bab2"]:checked').val();
        bab3 = $('input[name="bab3"]:checked').val();
        bab4 = $('input[name="bab4"]:checked').val();
        bab5 = $('input[name="bab5"]:checked').val();
        bab6 = $('input[name="bab6"]:checked').val();
        bab7 = $('input[name="bab7"]:checked').val();

        bak1 = $('input[name="bak1"]:checked').val();
        bak2 = $('input[name="bak2"]:checked').val();
        bak3 = $('input[name="bak3"]:checked').val();
        bak4 = $('input[name="bak4"]:checked').val();
        bak5 = $('input[name="bak5"]:checked').val();
        bak6 = $('input[name="bak6"]:checked').val();
        bak7 = $('input[name="bak7"]:checked').val();

        rapi1 = $('input[name="rapi1"]:checked').val();
        rapi2 = $('input[name="rapi2"]:checked').val();
        rapi3 = $('input[name="rapi3"]:checked').val();
        rapi4 = $('input[name="rapi4"]:checked').val();
        rapi5 = $('input[name="rapi5"]:checked').val();
        rapi6 = $('input[name="rapi6"]:checked').val();
        rapi7 = $('input[name="rapi7"]:checked').val();

        jamban1 = $('input[name="jamban1"]:checked').val();
        jamban2 = $('input[name="jamban2"]:checked').val();
        jamban3 = $('input[name="jamban3"]:checked').val();
        jamban4 = $('input[name="jamban4"]:checked').val();
        jamban5 = $('input[name="jamban5"]:checked').val();
        jamban6 = $('input[name="jamban6"]:checked').val();
        jamban7 = $('input[name="jamban7"]:checked').val();

        makan1 = $('input[name="makan1"]:checked').val();
        makan2 = $('input[name="makan2"]:checked').val();
        makan3 = $('input[name="makan3"]:checked').val();
        makan4 = $('input[name="makan4"]:checked').val();
        makan5 = $('input[name="makan5"]:checked').val();
        makan6 = $('input[name="makan6"]:checked').val();
        makan7 = $('input[name="makan7"]:checked').val();

        duduk1 = $('input[name="duduk1"]:checked').val();
        duduk2 = $('input[name="duduk2"]:checked').val();
        duduk3 = $('input[name="duduk3"]:checked').val();
        duduk4 = $('input[name="duduk4"]:checked').val();
        duduk5 = $('input[name="duduk5"]:checked').val();
        duduk6 = $('input[name="duduk6"]:checked').val();
        duduk7 = $('input[name="duduk7"]:checked').val();

        jalan1 = $('input[name="jalan1"]:checked').val();
        jalan2 = $('input[name="jalan2"]:checked').val();
        jalan3 = $('input[name="jalan3"]:checked').val();
        jalan4 = $('input[name="jalan4"]:checked').val();
        jalan5 = $('input[name="jalan5"]:checked').val();
        jalan6 = $('input[name="jalan6"]:checked').val();
        jalan7 = $('input[name="jalan7"]:checked').val();

        baju1 = $('input[name="baju1"]:checked').val();
        baju2 = $('input[name="baju2"]:checked').val();
        baju3 = $('input[name="baju3"]:checked').val();
        baju4 = $('input[name="baju4"]:checked').val();
        baju5 = $('input[name="baju5"]:checked').val();
        baju6 = $('input[name="baju6"]:checked').val();
        baju7 = $('input[name="baju7"]:checked').val();

        tangga1 = $('input[name="tangga1"]:checked').val();
        tangga2 = $('input[name="tangga2"]:checked').val();
        tangga3 = $('input[name="tangga3"]:checked').val();
        tangga4 = $('input[name="tangga4"]:checked').val();
        tangga5 = $('input[name="tangga5"]:checked').val();
        tangga6 = $('input[name="tangga6"]:checked').val();
        tangga7 = $('input[name="tangga7"]:checked').val();

        mandi1 = $('input[name="mandi1"]:checked').val();
        mandi2 = $('input[name="mandi2"]:checked').val();
        mandi3 = $('input[name="mandi3"]:checked').val();
        mandi4 = $('input[name="mandi4"]:checked').val();
        mandi5 = $('input[name="mandi5"]:checked').val();
        mandi6 = $('input[name="mandi6"]:checked').val();
        mandi7 = $('input[name="mandi7"]:checked').val();


        sum1 = Number(bab1) + Number(bak1) + Number(rapi1) + Number(jamban1) + Number(makan1) + Number(duduk1) + Number(jalan1) + Number(baju1) + Number(tangga1) + Number(mandi1);
        sum2 = Number(bab2) + Number(bak2) + Number(rapi2) + Number(jamban2) + Number(makan2) + Number(duduk2) + Number(jalan2) + Number(baju2) + Number(tangga2) + Number(mandi2);
        sum3 = Number(bab3) + Number(bak3) + Number(rapi3) + Number(jamban3) + Number(makan3) + Number(duduk3) + Number(jalan3) + Number(baju3) + Number(tangga3) + Number(mandi3);
        sum4 = Number(bab4) + Number(bak4) + Number(rapi4) + Number(jamban4) + Number(makan4) + Number(duduk4) + Number(jalan4) + Number(baju4) + Number(tangga4) + Number(mandi4);
        sum5 = Number(bab5) + Number(bak5) + Number(rapi5) + Number(jamban5) + Number(makan5) + Number(duduk5) + Number(jalan5) + Number(baju5) + Number(tangga5) + Number(mandi5);
        sum6 = Number(bab6) + Number(bak6) + Number(rapi6) + Number(jamban6) + Number(makan6) + Number(duduk6) + Number(jalan6) + Number(baju6) + Number(tangga6) + Number(mandi6);
        sum7 = Number(bab7) + Number(bak7) + Number(rapi7) + Number(jamban7) + Number(makan7) + Number(duduk7) + Number(jalan7) + Number(baju7) + Number(tangga7) + Number(mandi7);

        $('#sum1').html('<p>'+ sum1+'</p>');
        $('#sum2').html('<p>'+ sum2+'</p>');
        $('#sum3').html('<p>'+ sum3+'</p>');
        $('#sum4').html('<p>'+ sum4+'</p>');
        $('#sum5').html('<p>'+ sum5+'</p>');
        $('#sum6').html('<p>'+ sum6+'</p>');
        $('#sum7').html('<p>'+ sum7+'</p>');

    }

    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();
        sebab_a = $('#sebab_a').val();
        lama_a = $('#lama_a').val();
        sebab_b = $('#sebab_b').val();
        lama_b = $('#lama_b').val();
        sebab_2 = $('#sebab_2').val();
        lama_2 = $('#lama_2').val();
        ruda_paksa = $('input[name="ruda_paksa"]:checked').val();
        cara_rudapaksa = $('#cara_rudapaksa').val();
        sifat_jejas = $('#sifat_jejas').val();
        janin_mati = $('input[name="janin_mati"]:checked').val();
        sebab_lahir_mati = $('#sebab_lahir_mati').val();
        persalinan = $('input[name="persalinan"]:checked').val();
        hamil = $('input[name="hamil"]:checked').val();
        operasi = $('input[name="operasi"]:checked').val();
        jenis_operasi = $('#jenis_operasi').val();
        nama_terang = $('#nama_terang').val();
        canvas = document.getElementById('can');
        gambar = canvas.toDataURL("image/png");

        dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history + '&sebab_a=' + sebab_a + '&lama_a=' + lama_a +
            '&sebab_b=' + sebab_b + '&lama_b=' + lama_b + '&sebab_2=' + sebab_2 +
            '&lama_2=' + lama_2 + '&ruda_paksa=' + ruda_paksa + '&cara_rudapaksa=' + cara_rudapaksa +
            '&sifat_jejas=' + sifat_jejas + '&janin_mati=' + janin_mati + '&sebab_lahir_mati=' + sebab_lahir_mati +
            '&persalinan=' + persalinan + '&hamil=' + hamil + '&operasi=' + operasi + '&jenis_operasi=' + jenis_operasi +
            '&nama_terang=' + nama_terang + '&gambar=' + gambar;
        // alert(tindak_lanjut);

        $.ajax({
            url: "<?php echo base_url() ?>Erm_sebab_kematian/insert_sebab_kematian",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pelayanan + '/' + id_history;
                } else if (data.error) {
                    if (data.sebab_a != '') {
                        $('#sebab_a_error').html(data.sebab_a);
                    } else {
                        $('#sebab_a_error').html('');
                    }
                    if (data.lama_a != '') {
                        $('#lama_a_error').html(data.lama_a);
                    } else {
                        $('#lama_a_error').html('');
                    }
                    if (data.sebab_b != '') {
                        $('#sebab_b_error').html(data.sebab_b);
                    } else {
                        $('#sebab_b_error').html('');
                    }
                    if (data.lama_b != '') {
                        $('#lama_b_error').html(data.lama_b);
                    } else {
                        $('#lama_b_error').html('');
                    }
                    if (data.sebab_2 != '') {
                        $('#sebab_2_error').html(data.sebab_2);
                    } else {
                        $('#sebab_2_error').html('');
                    }
                    if (data.lama_2 != '') {
                        $('#lama_2_error').html(data.lama_2);
                    } else {
                        $('#lama_2_error').html('');
                    }
                    if (ruda_paksa == "" || ruda_paksa == null) {
                        $('#ruda_paksa_error').html("*wajib diisi");
                    }
                    if (data.cara_rudapaksa != '') {
                        $('#cara_rudapaksa_error').html(data.cara_rudapaksa);
                    } else {
                        $('#cara_rudapaksa_error').html('');
                    }
                    if (data.sifat_jejas != '') {
                        $('#sifat_jejas_error').html(data.sifat_jejas);
                    } else {
                        $('#sifat_jejas_error').html('');
                    }
                    if (janin_mati == "" || janin_mati == null) {
                        $('#janin_mati_error').html("*wajib diisi");
                    }
                    if (data.sebab_lahir_mati != '') {
                        $('#sebab_lahir_mati_error').html(data.sebab_lahir_mati);
                    } else {
                        $('#sebab_lahir_mati_error').html('');
                    }
                    if (persalinan == "" || persalinan == null) {
                        $('#01').html("*wajib diisi");
                    }
                    if (hamil == "" || hamil == null) {
                        $('#hamil_error').html("*wajib diisi");
                    }
                    if (operasi == "" || operasi == null) {
                        $('#operasi_error').html("*wajib diisi");
                    }
                    if (data.jenis_operasi != '') {
                        $('#jenis_operasi_error').html(data.jenis_operasi);
                    } else {
                        $('#jenis_operasi_error').html('');
                    }
                    if (data.nama_terang != '') {
                        $('#nama_terang_error').html(data.nama_terang);
                    } else {
                        $('#nama_terang_error').html('');
                    }

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
        return false;
    }
=======
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Formulir Resiko Jatuh</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">

                <div class="panel-body">
                    <div class="form-wrap">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $no_rm ?>" id="inNoRM" disabled>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $nama ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                <input type="text" class="form-control" value="<?= $jenis_kelamin ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Umur<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?php
                                                                                $birthDate = $tgl_lahir;
                                                                                date_default_timezone_set('Asia/Jakarta');

                                                                                $date = new DateTime($birthDate);
                                                                                $now = new DateTime();
                                                                                $interval = $now->diff($date);

                                                                                echo  $interval->y . " Tahun"; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Alamat</label>
                                <input type="text" class="form-control" value="<?= $alamat ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Dokter Pelaksana Tindakan<span class="help"></span></label>
                                <input type="Text" class="form-control" value="<?= $pasien->nama_dokter ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>1. Mengendalikan rangsang defeksi (BAB)</p>
                                    </label>
                                </strong>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (1) Sebelum sakit :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab1_1" type="radio" name="bab1" value="0">
                                            <label class="control-label" for="bab1_1">
                                                Tak terkendali/tak teratur
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab1_2" type="radio" name="bab1" value="1">
                                            <label class="control-label" for="bab1_2">
                                                Kadang-kadang tak terkendali
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab1_3" type="radio" name="bab1" value="2">
                                            <label class="control-label" for="bab1_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (2) Saat masuk RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab2_1" type="radio" name="bab2" value="0">
                                            <label class="control-label" for="bab2_1">
                                                Tak terkendali/tak teratur
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab2_2" type="radio" name="bab2" value="1">
                                            <label class="control-label" for="bab2_2">
                                                Kadang-kadang tak terkendali
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab2_3" type="radio" name="bab2" value="2">
                                            <label class="control-label" for="bab2_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (3) Minggu I di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab3_1" type="radio" name="bab3" value="0">
                                            <label class="control-label" for="bab3_1">
                                                Tak terkendali/tak teratur
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab3_2" type="radio" name="bab3" value="1">
                                            <label class="control-label" for="bab3_2">
                                                Kadang-kadang tak terkendali
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab3_3" type="radio" name="bab3" value="2">
                                            <label class="control-label" for="bab3_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (4) Minggu II di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab4_1" type="radio" name="bab4" value="0">
                                            <label class="control-label" for="bab4_1">
                                                Tak terkendali/tak teratur
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab4_2" type="radio" name="bab4" value="1">
                                            <label class="control-label" for="bab4_2">
                                                Kadang-kadang tak terkendali
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab4_3" type="radio" name="bab4" value="2">
                                            <label class="control-label" for="bab4_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (5) Minggu III di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab5_1" type="radio" name="bab5" value="0">
                                            <label class="control-label" for="bab5_1">
                                                Tak terkendali/tak teratur
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab5_2" type="radio" name="bab5" value="1">
                                            <label class="control-label" for="bab5_2">
                                                Kadang-kadang tak terkendali
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab5_3" type="radio" name="bab5" value="2">
                                            <label class="control-label" for="bab5_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (6) Minggu IV di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab6_1" type="radio" name="bab6" value="0">
                                            <label class="control-label" for="bab6_1">
                                                Tak terkendali/tak teratur
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab6_2" type="radio" name="bab6" value="1">
                                            <label class="control-label" for="bab6_2">
                                                Kadang-kadang tak terkendali
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab6_3" type="radio" name="bab6" value="2">
                                            <label class="control-label" for="bab6_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (7) Saat Pulang :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab7_1" type="radio" name="bab7" value="0">
                                            <label class="control-label" for="bab7_1">
                                                Tak terkendali/tak teratur
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab7_2" type="radio" name="bab7" value="1">
                                            <label class="control-label" for="bab7_2">
                                                Kadang-kadang tak terkendali
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bab7_3" type="radio" name="bab7" value="2">
                                            <label class="control-label" for="bab7_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>2. Mengendalikan rangsang berkemih (BAK)</p>
                                    </label>
                                </strong>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (1) Sebelum sakit :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak1_1" type="radio" name="bak1" value="0">
                                            <label class="control-label" for="bak1_1">
                                                Tak terkendali/pakai kateter
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak1_2" type="radio" name="bak1" value="1">
                                            <label class="control-label" for="bak1_2">
                                                Kadang-kadang tak terkendali (1x24jam)
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak1_3" type="radio" name="bak1" value="2">
                                            <label class="control-label" for="bak1_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (2) Saat masuk RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak2_1" type="radio" name="bak2" value="0">
                                            <label class="control-label" for="bak2_1">
                                                Tak terkendali/pakai kateter
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak2_2" type="radio" name="bak2" value="1">
                                            <label class="control-label" for="bak2_2">
                                                Kadang-kadang tak terkendali (1x24jam)
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak2_3" type="radio" name="bak2" value="2">
                                            <label class="control-label" for="bak2_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (3) Minggu I di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak3_1" type="radio" name="bak3" value="0">
                                            <label class="control-label" for="bak3_1">
                                                Tak terkendali/pakai kateter
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak3_2" type="radio" name="bak3" value="1">
                                            <label class="control-label" for="bak3_2">
                                                Kadang-kadang tak terkendali (1x24jam)
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak3_3" type="radio" name="bak3" value="2">
                                            <label class="control-label" for="bak3_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (4) Minggu II di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak4_1" type="radio" name="bak4" value="0">
                                            <label class="control-label" for="bak4_1">
                                                Tak terkendali/pakai kateter
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak4_2" type="radio" name="bak4" value="1">
                                            <label class="control-label" for="bak4_2">
                                                Kadang-kadang tak terkendali (1x24jam)
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak4_3" type="radio" name="bak4" value="2">
                                            <label class="control-label" for="bak4_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (5) Minggu III di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak5_1" type="radio" name="bak5" value="0">
                                            <label class="control-label" for="bak5_1">
                                                Tak terkendali/pakai kateter
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak5_2" type="radio" name="bak5" value="1">
                                            <label class="control-label" for="bak5_2">
                                                Kadang-kadang tak terkendali (1x24jam)
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak5_3" type="radio" name="bak5" value="2">
                                            <label class="control-label" for="bak5_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (6) Minggu IV di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak6_1" type="radio" name="bak6" value="0">
                                            <label class="control-label" for="bak6_1">
                                                Tak terkendali/pakai kateter
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak6_2" type="radio" name="bak6" value="1">
                                            <label class="control-label" for="bak6_2">
                                                Kadang-kadang tak terkendali (1x24jam)
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak6_3" type="radio" name="bak6" value="2">
                                            <label class="control-label" for="bak6_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (7) Saat Pulang :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak7_1" type="radio" name="bak7" value="0">
                                            <label class="control-label" for="bak7_1">
                                                Tak terkendali/pakai kateter
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak7_2" type="radio" name="bak7" value="1">
                                            <label class="control-label" for="bak7_2">
                                                Kadang-kadang tak terkendali (1x24jam)
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="bak7_3" type="radio" name="bak7" value="2">
                                            <label class="control-label" for="bak7_3">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>3. Membersihkan diri (cuci muka, sisir rambut, sikat gigi)</p>
                                    </label>
                                </strong>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (1) Sebelum sakit :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi1_1" type="radio" name="rapi1" value="0">
                                            <label class="control-label" for="rapi1_1">
                                                Butuh pertolongan orang lain
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi1_2" type="radio" name="rapi1" value="1">
                                            <label class="control-label" for="rapi1_2">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (2) Saat masuk RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi2_1" type="radio" name="rapi2" value="0">
                                            <label class="control-label" for="rapi2_1">
                                                Butuh pertolongan orang lain
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi2_2" type="radio" name="rapi2" value="1">
                                            <label class="control-label" for="rapi2_2">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (3) Minggu I di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi3_1" type="radio" name="rapi3" value="0">
                                            <label class="control-label" for="rapi3_1">
                                                Butuh pertolongan orang lain
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi3_2" type="radio" name="rapi3" value="1">
                                            <label class="control-label" for="rapi3_2">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (4) Minggu II di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi4_1" type="radio" name="rapi4" value="0">
                                            <label class="control-label" for="rapi4_1">
                                                Butuh pertolongan orang lain
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi4_2" type="radio" name="rapi4" value="1">
                                            <label class="control-label" for="rapi4_2">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (5) Minggu III di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi5_1" type="radio" name="rapi5" value="0">
                                            <label class="control-label" for="rapi5_1">
                                                Butuh pertolongan orang lain
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi5_2" type="radio" name="rapi5" value="1">
                                            <label class="control-label" for="rapi5_2">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (6) Minggu IV di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi6_1" type="radio" name="rapi6" value="0">
                                            <label class="control-label" for="rapi6_1">
                                                Butuh pertolongan orang lain
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi6_2" type="radio" name="rapi6" value="1">
                                            <label class="control-label" for="rapi6_2">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (7) Saat Pulang :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="ruda_paksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi7_1" type="radio" name="rapi7" value="0">
                                            <label class="control-label" for="rapi7_1">
                                                Butuh pertolongan orang lain
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="rapi7_2" type="radio" name="rapi7" value="1">
                                            <label class="control-label" for="rapi7_2">
                                                Mandiri
                                            </label>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">
                                            <p><br>4. Penggunaan jamban, masuk dan keluar (melepaskan, memakai celana, membersihkan, menyiram)</p>
                                        </label>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (1) Sebelum sakit :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban1_1" type="radio" name="jamban1" value="0">
                                                <label class="control-label" for="jamban1_1">
                                                    Tergantung pertolongan orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary col-md-1">
                                                <input id="jamban1_2" type="radio" name="jamban1" value="1">
                                            </div>
                                            <label class="control-label col-md-8" for="jamban1_2">
                                                Perlu pertolongan pada beberapa kegiatan, tetapi dapat mengerjakan sendiri kegiatan yang lain
                                            </label>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban1_3" type="radio" name="jamban1" value="2">
                                                <label class="control-label" for="jamban1_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (2) Saat masuk RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban2_1" type="radio" name="jamban2" value="0">
                                                <label class="control-label" for="jamban2_1">
                                                    Tergantung pertolongan orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary col-md-1">
                                                <input id="jamban2_2" type="radio" name="jamban2" value="1">
                                            </div>
                                            <label class="control-label col-md-8" for="jamban2_2">
                                                Perlu pertolongan pada beberapa kegiatan, tetapi dapat mengerjakan sendiri kegiatan yang lain
                                            </label>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban2_3" type="radio" name="jamban2" value="2">
                                                <label class="control-label" for="jamban2_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (3) Minggu I di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban3_1" type="radio" name="jamban3" value="0">
                                                <label class="control-label" for="jamban3_1">
                                                    Tergantung pertolongan orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary col-md-1">
                                                <input id="jamban3_2" type="radio" name="jamban3" value="1">
                                            </div>
                                            <label class="control-label col-md-8" for="jamban3_2">
                                                Perlu pertolongan pada beberapa kegiatan, tetapi dapat mengerjakan sendiri kegiatan yang lain
                                            </label>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban3_3" type="radio" name="jamban3" value="2">
                                                <label class="control-label" for="jamban3_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (4) Minggu II di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban4_1" type="radio" name="jamban4" value="0">
                                                <label class="control-label" for="jamban4_1">
                                                    Tergantung pertolongan orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary col-md-1">
                                                <input id="jamban4_2" type="radio" name="jamban4" value="1">
                                            </div>
                                            <label class="control-label col-md-8" for="jamban4_2">
                                                Perlu pertolongan pada beberapa kegiatan, tetapi dapat mengerjakan sendiri kegiatan yang lain
                                            </label>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban4_3" type="radio" name="jamban4" value="2">
                                                <label class="control-label" for="jamban4_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (5) Minggu III di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban5_1" type="radio" name="jamban5" value="0">
                                                <label class="control-label" for="jamban5_1">
                                                    Tergantung pertolongan orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary col-md-1">
                                                <input id="jamban5_2" type="radio" name="jamban5" value="1">
                                            </div>
                                            <label class="control-label col-md-8" for="jamban5_2">
                                                Perlu pertolongan pada beberapa kegiatan, tetapi dapat mengerjakan sendiri kegiatan yang lain
                                            </label>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban5_3" type="radio" name="jamban5" value="2">
                                                <label class="control-label" for="jamban5_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (6) Minggu IV di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban6_1" type="radio" name="jamban6" value="0">
                                                <label class="control-label" for="jamban6_1">
                                                    Tergantung pertolongan orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary col-md-1">
                                                <input id="jamban6_2" type="radio" name="jamban6" value="1">
                                            </div>
                                            <label class="control-label col-md-8" for="jamban6_2">
                                                Perlu pertolongan pada beberapa kegiatan, tetapi dapat mengerjakan sendiri kegiatan yang lain
                                            </label>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban6_3" type="radio" name="jamban6" value="2">
                                                <label class="control-label" for="jamban6_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (7) Saat Pulang :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban7_1" type="radio" name="jamban7" value="0">
                                                <label class="control-label" for="jamban7_1">
                                                    Tergantung pertolongan orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary col-md-1">
                                                <input id="jamban7_2" type="radio" name="jamban7" value="1">
                                            </div>
                                            <label class="control-label col-md-8" for="jamban7_2">
                                                Perlu pertolongan pada beberapa kegiatan, tetapi dapat mengerjakan sendiri kegiatan yang lain
                                            </label>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jamban7_3" type="radio" name="jamban7" value="2">
                                                <label class="control-label" for="jamban7_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">
                                            <p><br>5. Makan</p>
                                        </label>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (1) Sebelum sakit :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan1_1" type="radio" name="makan1" value="0">
                                                <label class="control-label" for="makan1_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan1_2" type="radio" name="makan1" value="1">
                                                <label class="control-label" for="makan1_2">
                                                    Perlu ditolong memotong makanan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan1_3" type="radio" name="makan1" value="2">
                                                <label class="control-label" for="makan1_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (2) Saat masuk RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan2_1" type="radio" name="makan2" value="0">
                                                <label class="control-label" for="makan2_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan2_2" type="radio" name="makan2" value="1">
                                                <label class="control-label" for="makan2_2">
                                                    Perlu ditolong memotong makanan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan2_3" type="radio" name="makan2" value="2">
                                                <label class="control-label" for="makan2_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (3) Minggu I di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan3_1" type="radio" name="makan3" value="0">
                                                <label class="control-label" for="makan3_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan3_2" type="radio" name="makan3" value="1">
                                                <label class="control-label" for="makan3_2">
                                                    Perlu ditolong memotong makanan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan3_3" type="radio" name="makan3" value="2">
                                                <label class="control-label" for="makan3_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (4) Minggu II di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan4_1" type="radio" name="makan4" value="0">
                                                <label class="control-label" for="makan4_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan4_2" type="radio" name="makan4" value="1">
                                                <label class="control-label" for="makan4_2">
                                                    Perlu ditolong memotong makanan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan4_3" type="radio" name="makan4" value="2">
                                                <label class="control-label" for="makan4_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (5) Minggu III di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan5_1" type="radio" name="makan5" value="0">
                                                <label class="control-label" for="makan1_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan5_2" type="radio" name="makan5" value="1">
                                                <label class="control-label" for="makan1_2">
                                                    Perlu ditolong memotong makanan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan5_3" type="radio" name="makan5" value="2">
                                                <label class="control-label" for="makan5_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (6) Minggu IV di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan6_1" type="radio" name="makan6" value="0">
                                                <label class="control-label" for="makan6_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan6_2" type="radio" name="makan6" value="1">
                                                <label class="control-label" for="makan6_2">
                                                    Perlu ditolong memotong makanan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan6_3" type="radio" name="makan6" value="2">
                                                <label class="control-label" for="makan6_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (7) Saat Pulang :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan7_1" type="radio" name="makan7" value="0">
                                                <label class="control-label" for="makan7_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan7_2" type="radio" name="makan7" value="1">
                                                <label class="control-label" for="makan7_2">
                                                    Perlu ditolong memotong makanan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="makan7_3" type="radio" name="makan7" value="2">
                                                <label class="control-label" for="makan7_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">
                                            <p><br>6. Berubah sikap dari berbaring ke duduk</p>
                                        </label>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (1) Sebelum sakit :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk1_1" type="radio" name="duduk1" value="0">
                                                <label class="control-label" for="duduk1_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk1_2" type="radio" name="duduk1" value="1">
                                                <label class="control-label" for="duduk1_2">
                                                    perlu banyak bantuan untuk bisa duduk (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk1_3" type="radio" name="duduk1" value="2">
                                                <label class="control-label" for="duduk1_3">
                                                    Bantuan (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk1_4" type="radio" name="duduk1" value="3">
                                                <label class="control-label" for="duduk1_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (2) Saat masuk RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk2_1" type="radio" name="duduk2" value="0">
                                                <label class="control-label" for="duduk2_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk2_2" type="radio" name="duduk2" value="1">
                                                <label class="control-label" for="duduk2_2">
                                                    perlu banyak bantuan untuk bisa duduk (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk2_3" type="radio" name="duduk2" value="2">
                                                <label class="control-label" for="duduk2_3">
                                                    Bantuan (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk2_4" type="radio" name="duduk2" value="3">
                                                <label class="control-label" for="duduk2_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (3) Minggu I di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk3_1" type="radio" name="duduk3" value="0">
                                                <label class="control-label" for="duduk3_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk3_2" type="radio" name="duduk3" value="1">
                                                <label class="control-label" for="duduk3_2">
                                                    perlu banyak bantuan untuk bisa duduk (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk3_3" type="radio" name="duduk3" value="2">
                                                <label class="control-label" for="duduk3_3">
                                                    Bantuan (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk3_4" type="radio" name="duduk3" value="3">
                                                <label class="control-label" for="duduk3_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (4) Minggu II di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk4_1" type="radio" name="duduk4" value="0">
                                                <label class="control-label" for="duduk4_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk4_2" type="radio" name="duduk4" value="1">
                                                <label class="control-label" for="duduk4_2">
                                                    perlu banyak bantuan untuk bisa duduk (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk4_3" type="radio" name="duduk4" value="2">
                                                <label class="control-label" for="duduk4_3">
                                                    Bantuan (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk4_4" type="radio" name="duduk4" value="3">
                                                <label class="control-label" for="duduk4_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (5) Minggu III di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk5_1" type="radio" name="duduk5" value="0">
                                                <label class="control-label" for="duduk5_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk5_2" type="radio" name="duduk5" value="1">
                                                <label class="control-label" for="duduk5_2">
                                                    perlu banyak bantuan untuk bisa duduk (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk5_3" type="radio" name="duduk5" value="2">
                                                <label class="control-label" for="duduk5_3">
                                                    Bantuan (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk5_4" type="radio" name="duduk5" value="3">
                                                <label class="control-label" for="duduk5_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (6) Minggu IV di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk6_1" type="radio" name="duduk6" value="0">
                                                <label class="control-label" for="duduk6_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk6_2" type="radio" name="duduk6" value="1">
                                                <label class="control-label" for="duduk6_2">
                                                    perlu banyak bantuan untuk bisa duduk (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk6_3" type="radio" name="duduk6" value="2">
                                                <label class="control-label" for="duduk6_3">
                                                    Bantuan (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk6_4" type="radio" name="duduk6" value="3">
                                                <label class="control-label" for="duduk6_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (7) Saat Pulang :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk7_1" type="radio" name="duduk7" value="0">
                                                <label class="control-label" for="duduk7_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk7_2" type="radio" name="duduk7" value="1">
                                                <label class="control-label" for="duduk7_2">
                                                    perlu banyak bantuan untuk bisa duduk (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk7_3" type="radio" name="duduk7" value="2">
                                                <label class="control-label" for="duduk7_3">
                                                    Bantuan (2 orang)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="duduk7_4" type="radio" name="duduk7" value="3">
                                                <label class="control-label" for="duduk7_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">
                                            <p><br>7. Berpindah / berjalan </p>
                                        </label>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (1) Sebelum sakit :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan1_1" type="radio" name="jalan1" value="0">
                                                <label class="control-label" for="jalan1_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan1_2" type="radio" name="jalan1" value="1">
                                                <label class="control-label" for="jalan1_2">
                                                    Bisa (pindah) dengan kursi roda
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan1_3" type="radio" name="jalan1" value="2">
                                                <label class="control-label" for="jalan1_3">
                                                    Berjalan dengan bantuan 1 orang
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan1_4" type="radio" name="jalan1" value="3">
                                                <label class="control-label" for="jalan1_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (2) Saat masuk RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan2_1" type="radio" name="jalan2" value="0">
                                                <label class="control-label" for="jalan2_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan2_2" type="radio" name="jalan2" value="1">
                                                <label class="control-label" for="jalan2_2">
                                                    Bisa (pindah) dengan kursi roda
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan2_3" type="radio" name="jalan2" value="2">
                                                <label class="control-label" for="jalan2_3">
                                                    Berjalan dengan bantuan 1 orang
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan2_4" type="radio" name="jalan2" value="3">
                                                <label class="control-label" for="jalan2_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (3) Minggu I di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan3_1" type="radio" name="jalan3" value="0">
                                                <label class="control-label" for="jalan3_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan3_2" type="radio" name="jalan3" value="1">
                                                <label class="control-label" for="jalan3_2">
                                                    Bisa (pindah) dengan kursi roda
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan3_3" type="radio" name="jalan3" value="2">
                                                <label class="control-label" for="jalan3_3">
                                                    Berjalan dengan bantuan 1 orang
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan3_4" type="radio" name="jalan3" value="3">
                                                <label class="control-label" for="jalan3_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (4) Minggu II di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan4_1" type="radio" name="jalan4" value="0">
                                                <label class="control-label" for="jalan4_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan4_2" type="radio" name="jalan4" value="1">
                                                <label class="control-label" for="jalan4_2">
                                                    Bisa (pindah) dengan kursi roda
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan4_3" type="radio" name="jalan4" value="2">
                                                <label class="control-label" for="jalan4_3">
                                                    Berjalan dengan bantuan 1 orang
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan4_4" type="radio" name="jalan4" value="3">
                                                <label class="control-label" for="jalan4_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (5) Minggu III di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan5_1" type="radio" name="jalan5" value="0">
                                                <label class="control-label" for="jalan5_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan5_2" type="radio" name="jalan5" value="1">
                                                <label class="control-label" for="jalan5_2">
                                                    Bisa (pindah) dengan kursi roda
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan5_3" type="radio" name="jalan5" value="2">
                                                <label class="control-label" for="jalan5_3">
                                                    Berjalan dengan bantuan 1 orang
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan5_4" type="radio" name="jalan5" value="3">
                                                <label class="control-label" for="jalan5_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (6) Minggu IV di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan6_1" type="radio" name="jalan6" value="0">
                                                <label class="control-label" for="jalan6_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan6_2" type="radio" name="jalan6" value="1">
                                                <label class="control-label" for="jalan6_2">
                                                    Bisa (pindah) dengan kursi roda
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan6_3" type="radio" name="jalan6" value="2">
                                                <label class="control-label" for="jalan6_3">
                                                    Berjalan dengan bantuan 1 orang
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan6_4" type="radio" name="jalan6" value="3">
                                                <label class="control-label" for="jalan6_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (7) Saat Pulang :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan7_1" type="radio" name="jalan7" value="0">
                                                <label class="control-label" for="jalan7_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan7_2" type="radio" name="jalan7" value="1">
                                                <label class="control-label" for="jalan7_2">
                                                    Bisa (pindah) dengan kursi roda
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan7_3" type="radio" name="jalan7" value="2">
                                                <label class="control-label" for="jalan7_3">
                                                    Berjalan dengan bantuan 1 orang
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="jalan7_4" type="radio" name="jalan7" value="3">
                                                <label class="control-label" for="jalan7_4">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">
                                            <p><br>8. Memakai baju</p>
                                        </label>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (1) Sebelum sakit :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju1_1" type="radio" name="baju1" value="0">
                                                <label class="control-label" for="baju1_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju1_2" type="radio" name="baju1" value="1">
                                                <label class="control-label" for="baju1_2">
                                                    Sebagian dibantu (misalnya : mengancing baju)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju1_3" type="radio" name="baju1" value="2">
                                                <label class="control-label" for="baju1_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (2) Saat masuk RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju2_1" type="radio" name="baju2" value="0">
                                                <label class="control-label" for="baju2_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju2_2" type="radio" name="baju2" value="1">
                                                <label class="control-label" for="baju2_2">
                                                    Sebagian dibantu (misalnya : mengancing baju)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju2_3" type="radio" name="baju2" value="2">
                                                <label class="control-label" for="baju2_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (3) Minggu I di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju3_1" type="radio" name="baju3" value="0">
                                                <label class="control-label" for="baju3_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju3_2" type="radio" name="baju3" value="1">
                                                <label class="control-label" for="baju3_2">
                                                    Sebagian dibantu (misalnya : mengancing baju)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju3_3" type="radio" name="baju3" value="2">
                                                <label class="control-label" for="baju3_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (4) Minggu II di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju4_1" type="radio" name="baju4" value="0">
                                                <label class="control-label" for="baju4_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju4_2" type="radio" name="baju4" value="1">
                                                <label class="control-label" for="baju4_2">
                                                    Sebagian dibantu (misalnya : mengancing baju)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju4_3" type="radio" name="baju4" value="2">
                                                <label class="control-label" for="baju4_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (5) Minggu III di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju5_1" type="radio" name="baju5" value="0">
                                                <label class="control-label" for="baju5_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju5_2" type="radio" name="baju5" value="1">
                                                <label class="control-label" for="baju5_2">
                                                    Sebagian dibantu (misalnya : mengancing baju)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju5_3" type="radio" name="baju5" value="2">
                                                <label class="control-label" for="baju5_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (6) Minggu IV di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju6_1" type="radio" name="baju6" value="0">
                                                <label class="control-label" for="baju6_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju6_2" type="radio" name="baju6" value="1">
                                                <label class="control-label" for="baju6_2">
                                                    Sebagian dibantu (misalnya : mengancing baju)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju6_3" type="radio" name="baju6" value="2">
                                                <label class="control-label" for="baju6_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (7) Saat Pulang :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju7_1" type="radio" name="baju7" value="0">
                                                <label class="control-label" for="baju7_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju7_2" type="radio" name="baju7" value="1">
                                                <label class="control-label" for="baju7_2">
                                                    Sebagian dibantu (misalnya : mengancing baju)
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="baju7_3" type="radio" name="baju7" value="2">
                                                <label class="control-label" for="baju7_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">
                                            <p><br>9. Naik turun tangga</p>
                                        </label>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (1) Sebelum sakit :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga1_1" type="radio" name="tangga1" value="0">
                                                <label class="control-label" for="tangga1_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga1_2" type="radio" name="tangga1" value="1">
                                                <label class="control-label" for="tangga1_2">
                                                    Butuh pertolongan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga1_3" type="radio" name="tangga1" value="2">
                                                <label class="control-label" for="tangga1_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (2) Saat masuk RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga2_1" type="radio" name="tangga2" value="0">
                                                <label class="control-label" for="tangga2_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga2_2" type="radio" name="tangga2" value="1">
                                                <label class="control-label" for="tangga2_2">
                                                    Butuh pertolongan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga2_3" type="radio" name="tangga2" value="2">
                                                <label class="control-label" for="tangga2_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (3) Minggu I di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga3_1" type="radio" name="tangga3" value="0">
                                                <label class="control-label" for="tangga3_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga3_2" type="radio" name="tangga3" value="1">
                                                <label class="control-label" for="tangga3_2">
                                                    Butuh pertolongan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga3_3" type="radio" name="tangga3" value="2">
                                                <label class="control-label" for="tangga3_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (4) Minggu II di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga4_1" type="radio" name="tangga4" value="0">
                                                <label class="control-label" for="tangga1_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga4_2" type="radio" name="tangga4" value="1">
                                                <label class="control-label" for="tangga4_2">
                                                    Butuh pertolongan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga4_3" type="radio" name="tangga4" value="2">
                                                <label class="control-label" for="tangga4_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (5) Minggu III di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga5_1" type="radio" name="tangga5" value="0">
                                                <label class="control-label" for="tangga5_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga5_2" type="radio" name="tangga5" value="1">
                                                <label class="control-label" for="tangga5_2">
                                                    Butuh pertolongan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga5_3" type="radio" name="tangga5" value="2">
                                                <label class="control-label" for="tangga5_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (6) Minggu IV di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga6_1" type="radio" name="tangga6" value="0">
                                                <label class="control-label" for="tangga1_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga6_2" type="radio" name="tangga6" value="1">
                                                <label class="control-label" for="tangga6_2">
                                                    Butuh pertolongan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga6_3" type="radio" name="tangga6" value="2">
                                                <label class="control-label" for="tangga6_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (7) Saat Pulang :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga7_1" type="radio" name="tangga7" value="0">
                                                <label class="control-label" for="tangga7_1">
                                                    Tidak mampu
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga7_2" type="radio" name="tangga7" value="1">
                                                <label class="control-label" for="tangga7_2">
                                                    Butuh pertolongan
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tangga7_3" type="radio" name="tangga7" value="2">
                                                <label class="control-label" for="tangga7_3">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>
                                        <label class="control-label mb-10 text-left">
                                            <p><br>10. Mandi</p>
                                        </label>
                                    </strong>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (1) Sebelum sakit :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi1_1" type="radio" name="mandi1" value="0">
                                                <label class="control-label" for="mandi1_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi1_2" type="radio" name="mandi1" value="1">
                                                <label class="control-label" for="mandi1_2">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (2) Saat masuk RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi2_1" type="radio" name="mandi2" value="0">
                                                <label class="control-label" for="mandi2_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi2_2" type="radio" name="mandi2" value="1">
                                                <label class="control-label" for="mandi2_2">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (3) Minggu I di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi3_1" type="radio" name="mandi3" value="0">
                                                <label class="control-label" for="mandi3_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi3_2" type="radio" name="mandi3" value="1">
                                                <label class="control-label" for="mandi3_2">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (4) Minggu II di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi4_1" type="radio" name="mandi4" value="0">
                                                <label class="control-label" for="mandi1_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi4_2" type="radio" name="mandi4" value="1">
                                                <label class="control-label" for="mandi4_2">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (5) Minggu III di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi5_1" type="radio" name="mandi5" value="0">
                                                <label class="control-label" for="mandi5_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi5_2" type="radio" name="mandi5" value="1">
                                                <label class="control-label" for="mandi5_2">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (6) Minggu IV di RS :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi6_1" type="radio" name="mandi6" value="0">
                                                <label class="control-label" for="mandi6_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi6_2" type="radio" name="mandi6" value="1">
                                                <label class="control-label" for="mandi6_2">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <label class="control-label">
                                                (7) Saat Pulang :<span class="help"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi7_1" type="radio" name="mandi7" value="0">
                                                <label class="control-label" for="mandi7_1">
                                                    Tergantung orang lain
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mandi7_2" type="radio" name="mandi7" value="1">
                                                <label class="control-label" for="mandi7_2">
                                                    Mandiri
                                                </label>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" onclick="sumScore()" class="btn btn-primary mb-4">Hitung Skor</button>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>Hasil Skor</p>
                                    </label>
                                </strong>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (1) Sebelum sakit :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            <p id="sum1">0</p> <span class="help"></span>
                                        </label>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (2) Saat Masuk RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            <p id="sum2">0</p> <span class="help"></span>
                                        </label>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (3) Minggu I di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            <p id="sum3">0</p> <span class="help"></span>
                                        </label>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (4) Minggu II di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            <p id="sum4">0</p> <span class="help"></span>
                                        </label>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (5) Minggu III di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            <p id="sum5">0</p> <span class="help"></span>
                                        </label>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (6) Minggu IV di RS :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            <p id="sum6">0</p> <span class="help"></span>
                                        </label>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            (7) Saat Pulang :<span class="help"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">
                                            <p id="sum7">0</p> <span class="help"></span>
                                        </label>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center" style="margin-top: 30px;">
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                            <button type="submit" onclick="simpan()" class="btn btn-success mb-4">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    canvas {
        cursor: crosshair;
        border: 1px solid #000000;
    }
</style>

<script type="text/javascript">
    function sumScore() {
        bab1 = $('input[name="bab1"]:checked').val();
        bab2 = $('input[name="bab2"]:checked').val();
        bab3 = $('input[name="bab3"]:checked').val();
        bab4 = $('input[name="bab4"]:checked').val();
        bab5 = $('input[name="bab5"]:checked').val();
        bab6 = $('input[name="bab6"]:checked').val();
        bab7 = $('input[name="bab7"]:checked').val();

        bak1 = $('input[name="bak1"]:checked').val();
        bak2 = $('input[name="bak2"]:checked').val();
        bak3 = $('input[name="bak3"]:checked').val();
        bak4 = $('input[name="bak4"]:checked').val();
        bak5 = $('input[name="bak5"]:checked').val();
        bak6 = $('input[name="bak6"]:checked').val();
        bak7 = $('input[name="bak7"]:checked').val();

        rapi1 = $('input[name="rapi1"]:checked').val();
        rapi2 = $('input[name="rapi2"]:checked').val();
        rapi3 = $('input[name="rapi3"]:checked').val();
        rapi4 = $('input[name="rapi4"]:checked').val();
        rapi5 = $('input[name="rapi5"]:checked').val();
        rapi6 = $('input[name="rapi6"]:checked').val();
        rapi7 = $('input[name="rapi7"]:checked').val();

        jamban1 = $('input[name="jamban1"]:checked').val();
        jamban2 = $('input[name="jamban2"]:checked').val();
        jamban3 = $('input[name="jamban3"]:checked').val();
        jamban4 = $('input[name="jamban4"]:checked').val();
        jamban5 = $('input[name="jamban5"]:checked').val();
        jamban6 = $('input[name="jamban6"]:checked').val();
        jamban7 = $('input[name="jamban7"]:checked').val();

        makan1 = $('input[name="makan1"]:checked').val();
        makan2 = $('input[name="makan2"]:checked').val();
        makan3 = $('input[name="makan3"]:checked').val();
        makan4 = $('input[name="makan4"]:checked').val();
        makan5 = $('input[name="makan5"]:checked').val();
        makan6 = $('input[name="makan6"]:checked').val();
        makan7 = $('input[name="makan7"]:checked').val();

        duduk1 = $('input[name="duduk1"]:checked').val();
        duduk2 = $('input[name="duduk2"]:checked').val();
        duduk3 = $('input[name="duduk3"]:checked').val();
        duduk4 = $('input[name="duduk4"]:checked').val();
        duduk5 = $('input[name="duduk5"]:checked').val();
        duduk6 = $('input[name="duduk6"]:checked').val();
        duduk7 = $('input[name="duduk7"]:checked').val();

        jalan1 = $('input[name="jalan1"]:checked').val();
        jalan2 = $('input[name="jalan2"]:checked').val();
        jalan3 = $('input[name="jalan3"]:checked').val();
        jalan4 = $('input[name="jalan4"]:checked').val();
        jalan5 = $('input[name="jalan5"]:checked').val();
        jalan6 = $('input[name="jalan6"]:checked').val();
        jalan7 = $('input[name="jalan7"]:checked').val();

        baju1 = $('input[name="baju1"]:checked').val();
        baju2 = $('input[name="baju2"]:checked').val();
        baju3 = $('input[name="baju3"]:checked').val();
        baju4 = $('input[name="baju4"]:checked').val();
        baju5 = $('input[name="baju5"]:checked').val();
        baju6 = $('input[name="baju6"]:checked').val();
        baju7 = $('input[name="baju7"]:checked').val();

        tangga1 = $('input[name="tangga1"]:checked').val();
        tangga2 = $('input[name="tangga2"]:checked').val();
        tangga3 = $('input[name="tangga3"]:checked').val();
        tangga4 = $('input[name="tangga4"]:checked').val();
        tangga5 = $('input[name="tangga5"]:checked').val();
        tangga6 = $('input[name="tangga6"]:checked').val();
        tangga7 = $('input[name="tangga7"]:checked').val();

        mandi1 = $('input[name="mandi1"]:checked').val();
        mandi2 = $('input[name="mandi2"]:checked').val();
        mandi3 = $('input[name="mandi3"]:checked').val();
        mandi4 = $('input[name="mandi4"]:checked').val();
        mandi5 = $('input[name="mandi5"]:checked').val();
        mandi6 = $('input[name="mandi6"]:checked').val();
        mandi7 = $('input[name="mandi7"]:checked').val();


        sum1 = Number(bab1) + Number(bak1) + Number(rapi1) + Number(jamban1) + Number(makan1) + Number(duduk1) + Number(jalan1) + Number(baju1) + Number(tangga1) + Number(mandi1);
        sum2 = Number(bab2) + Number(bak2) + Number(rapi2) + Number(jamban2) + Number(makan2) + Number(duduk2) + Number(jalan2) + Number(baju2) + Number(tangga2) + Number(mandi2);
        sum3 = Number(bab3) + Number(bak3) + Number(rapi3) + Number(jamban3) + Number(makan3) + Number(duduk3) + Number(jalan3) + Number(baju3) + Number(tangga3) + Number(mandi3);
        sum4 = Number(bab4) + Number(bak4) + Number(rapi4) + Number(jamban4) + Number(makan4) + Number(duduk4) + Number(jalan4) + Number(baju4) + Number(tangga4) + Number(mandi4);
        sum5 = Number(bab5) + Number(bak5) + Number(rapi5) + Number(jamban5) + Number(makan5) + Number(duduk5) + Number(jalan5) + Number(baju5) + Number(tangga5) + Number(mandi5);
        sum6 = Number(bab6) + Number(bak6) + Number(rapi6) + Number(jamban6) + Number(makan6) + Number(duduk6) + Number(jalan6) + Number(baju6) + Number(tangga6) + Number(mandi6);
        sum7 = Number(bab7) + Number(bak7) + Number(rapi7) + Number(jamban7) + Number(makan7) + Number(duduk7) + Number(jalan7) + Number(baju7) + Number(tangga7) + Number(mandi7);

        $('#sum1').html('<p>'+ sum1+'</p>');
        $('#sum2').html('<p>'+ sum2+'</p>');
        $('#sum3').html('<p>'+ sum3+'</p>');
        $('#sum4').html('<p>'+ sum4+'</p>');
        $('#sum5').html('<p>'+ sum5+'</p>');
        $('#sum6').html('<p>'+ sum6+'</p>');
        $('#sum7').html('<p>'+ sum7+'</p>');

    }

    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();
        sebab_a = $('#sebab_a').val();
        lama_a = $('#lama_a').val();
        sebab_b = $('#sebab_b').val();
        lama_b = $('#lama_b').val();
        sebab_2 = $('#sebab_2').val();
        lama_2 = $('#lama_2').val();
        ruda_paksa = $('input[name="ruda_paksa"]:checked').val();
        cara_rudapaksa = $('#cara_rudapaksa').val();
        sifat_jejas = $('#sifat_jejas').val();
        janin_mati = $('input[name="janin_mati"]:checked').val();
        sebab_lahir_mati = $('#sebab_lahir_mati').val();
        persalinan = $('input[name="persalinan"]:checked').val();
        hamil = $('input[name="hamil"]:checked').val();
        operasi = $('input[name="operasi"]:checked').val();
        jenis_operasi = $('#jenis_operasi').val();
        nama_terang = $('#nama_terang').val();
        canvas = document.getElementById('can');
        gambar = canvas.toDataURL("image/png");

        dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history + '&sebab_a=' + sebab_a + '&lama_a=' + lama_a +
            '&sebab_b=' + sebab_b + '&lama_b=' + lama_b + '&sebab_2=' + sebab_2 +
            '&lama_2=' + lama_2 + '&ruda_paksa=' + ruda_paksa + '&cara_rudapaksa=' + cara_rudapaksa +
            '&sifat_jejas=' + sifat_jejas + '&janin_mati=' + janin_mati + '&sebab_lahir_mati=' + sebab_lahir_mati +
            '&persalinan=' + persalinan + '&hamil=' + hamil + '&operasi=' + operasi + '&jenis_operasi=' + jenis_operasi +
            '&nama_terang=' + nama_terang + '&gambar=' + gambar;
        // alert(tindak_lanjut);

        $.ajax({
            url: "<?php echo base_url() ?>Erm_sebab_kematian/insert_sebab_kematian",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pelayanan + '/' + id_history;
                } else if (data.error) {
                    if (data.sebab_a != '') {
                        $('#sebab_a_error').html(data.sebab_a);
                    } else {
                        $('#sebab_a_error').html('');
                    }
                    if (data.lama_a != '') {
                        $('#lama_a_error').html(data.lama_a);
                    } else {
                        $('#lama_a_error').html('');
                    }
                    if (data.sebab_b != '') {
                        $('#sebab_b_error').html(data.sebab_b);
                    } else {
                        $('#sebab_b_error').html('');
                    }
                    if (data.lama_b != '') {
                        $('#lama_b_error').html(data.lama_b);
                    } else {
                        $('#lama_b_error').html('');
                    }
                    if (data.sebab_2 != '') {
                        $('#sebab_2_error').html(data.sebab_2);
                    } else {
                        $('#sebab_2_error').html('');
                    }
                    if (data.lama_2 != '') {
                        $('#lama_2_error').html(data.lama_2);
                    } else {
                        $('#lama_2_error').html('');
                    }
                    if (ruda_paksa == "" || ruda_paksa == null) {
                        $('#ruda_paksa_error').html("*wajib diisi");
                    }
                    if (data.cara_rudapaksa != '') {
                        $('#cara_rudapaksa_error').html(data.cara_rudapaksa);
                    } else {
                        $('#cara_rudapaksa_error').html('');
                    }
                    if (data.sifat_jejas != '') {
                        $('#sifat_jejas_error').html(data.sifat_jejas);
                    } else {
                        $('#sifat_jejas_error').html('');
                    }
                    if (janin_mati == "" || janin_mati == null) {
                        $('#janin_mati_error').html("*wajib diisi");
                    }
                    if (data.sebab_lahir_mati != '') {
                        $('#sebab_lahir_mati_error').html(data.sebab_lahir_mati);
                    } else {
                        $('#sebab_lahir_mati_error').html('');
                    }
                    if (persalinan == "" || persalinan == null) {
                        $('#01').html("*wajib diisi");
                    }
                    if (hamil == "" || hamil == null) {
                        $('#hamil_error').html("*wajib diisi");
                    }
                    if (operasi == "" || operasi == null) {
                        $('#operasi_error').html("*wajib diisi");
                    }
                    if (data.jenis_operasi != '') {
                        $('#jenis_operasi_error').html(data.jenis_operasi);
                    } else {
                        $('#jenis_operasi_error').html('');
                    }
                    if (data.nama_terang != '') {
                        $('#nama_terang_error').html(data.nama_terang);
                    } else {
                        $('#nama_terang_error').html('');
                    }

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
        return false;
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>