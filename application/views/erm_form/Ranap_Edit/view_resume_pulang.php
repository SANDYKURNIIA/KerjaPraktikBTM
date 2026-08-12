<<<<<<< HEAD
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">

            <div class="panel-heading">
                <div class="pull-left">
                    <strong>
                        <h6 class="panel-title txt-dark"> PASIEN PULANG (DISCHARGE SUMMARY)</h6>
                    </strong>



                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in" id="myDiv">
                    <div class="panel-body">
                        <div class="form-wrap">

                            <div class="form-group">
                                <!-- <form id="formUpload"> -->
                                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel"
                                    id="inPel">
                                <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis"
                                    id="inHis">
                                <input type="hidden" class="form-control" value="" id="id" name="id">
                                <input type="text" class="form-control" style="display: none;" name="id_pelayanan"
                                    value="<?= $id_pelayanan ?>" id="id_pelayanan">

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Ruang :<span
                                            class="help"></span></label>
                                    <div class="has-success">
                                        <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                        <input type="text" class="form-control" id="nama_ruangan"
                                            value="<?= $nama_ruangan ?>" disabled>
                                        <!-- <span class="help-block"></span> -->
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Nama Pasien :<span
                                            class="help"></span></label>
                                    <div class="has-success">
                                        <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                        <input type="text" class="form-control" id="inNama" value="<?= $nama ?>"
                                            disabled>
                                        <!-- <span class="help-block"></span> -->
                                    </div>
                                </div>
                                <!-- <input type="hidden" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>"> -->

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Kelas :<span
                                            class="help"></span></label>
                                    <span id="alamat_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="kelas" value="<?= $kelas ?>"
                                            disabled>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Dokter :</label>
                                    <span id="dpjp1_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="dpjp1" value="<?= $dokter ?>"
                                            disabled>

                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Tgl. Lahir : <span
                                            class="help"></span></label>
                                    <span id="tanggal_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <?php

                                        $tanggal_indonesia = date("d/m/Y", strtotime($tgl_lahir));

                                        echo '<input type="text" disabled class="form-control" value="' . $tanggal_indonesia . '">';
                                        ?>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Alamat :<span
                                            class="help"></span></label>
                                    <div class="has-success">
                                        <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                        <input type="text" class="form-control" id="alamat" value="<?= $alamat ?>"
                                            disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <!-- <form id="formUpload"> -->
                                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel"
                                    id="inPel">
                                <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis"
                                    id="inHis">
                                <input type="hidden" class="form-control" value="" id="id" name="id">
                                <!-- <input type="hidden" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>"> -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">No. RM :<span
                                                class="help"></span></label>
                                        <div class="has-success">
                                            <!-- <input type="text" class="form-control" id="in" disabled> -->
                                            <input type="text" class="form-control" id="inNoRM" value="<?= $no_rm ?>"
                                                disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <div class="col-md-4">      
                                        <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                        <div class="has-success">
                                             <select class="form-control filled-input select2" id="inJO" name="inJO">
                                                <option value="">Jenis Kelamin</option>
                                                <option value="Lakilaki">LK</option>
                                                <option value="Perempuan">PR</option>    
                                              </select>
                                        </div>
                                    </div>
                                  </div> -->
                                <!-- <div class="col-md-7">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div> -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Jenis Kelamin :<span
                                                class="help"></span></label>
                                        <div class="has-success">
                                            <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                            <input type="text" disabled class="form-control"
                                                value="<?= $jenis_kelamin ?>" id="jenis_kelamin">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Tgl Masuk :<span
                                                class="help"></span></label>
                                        <div class="has-success">
                                            <input type="text" id="tgl_masuk" disabled class="form-control" value="<?php
                                            setlocale(LC_ALL, 'id_ID');

                                            date_default_timezone_set('Asia/Jakarta');
                                            $time = strtotime($tgl_masuk);
                                            $date = strftime(" %d %B %Y ", $time);
                                            $jam = date(" H:i:s ", $time);
                                            echo $jam . '/' . $date ?>">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>




                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Tgl. Keluar : <span class="help"></span></label>
                                        <span id="tanggal_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar" value="<?php echo $resume_pulang["tgl_keluar"] ?>">

                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Agama :<span
                                                class="help"></span></label>
                                        <div class="has-success">
                                            <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                            <input type="text" disabled class="form-control" value="<?= $agama ?>"
                                                id="status">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Status Perkawinan :<span
                                                class="help"></span></label>
                                        <div class="has-success">
                                            <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                            <input type="text" disabled class="form-control" value="<?= $status ?>"
                                                id="status">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <label class="control-label mb-10 text-left">&nbsp;<span
                                            class="help"></span></label>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Alasan / Indikasi Masuk RS :<span
                                                class="help"></span></label>
                                        <span id="keluhan_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" readonly name="keluhan_utama"
                                                id="keluhan_utama" cols="30"
                                                rows="3"><?= isset($form_perawat->keluhan_utama) ? $form_perawat->keluhan_utama : ''; ?></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel panel-default card-view">

                                            <div class="pull-left">

                                                <strong>
                                                    <h6 class="panel-title txt-dark">RINGKASAN RIWAYAT PENYAKIT DAN
                                                        PENEMUAN FISIK PENTING</h6>
                                                </strong>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Riwayat :<span
                                                        class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" cols="3" disabled rows="2"
                                                        id="riwayat"
                                                        name=""><?php echo $resume_pulang["riwayat"] ?></textarea>

                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Pemeriksaan Fisik :<span
                                                        class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" cols="3" disabled rows="2"
                                                        id="p_fisik"
                                                        name=""><?php echo $resume_pulang["p_fisik"] ?></textarea>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Hasil Pemeriksaan Penunjang
                                                    :<span class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" cols="3" disabled rows="2" id="hasil"
                                                        name=""><?php echo $resume_pulang["hasil"] ?></textarea>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Diagnosa Saat Masuk :<span
                                                        class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" readonly disabled name="diagnosa"
                                                        id="diagnosa" re cols="3"
                                                        rows="2"><?= $pasien->diagnosa ?></textarea>

                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Diagnosa Utama Yang
                                                    Ditengahkan :<span class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" cols="3" disabled rows="2"
                                                        id="diagnosa_utama"
                                                        name=""><?php echo $resume_pulang["diagnosa_utama"] ?></textarea>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Prosedur Terapi & Tindakan
                                                    Yang Telah Dikerjakan :<span class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" cols="3" rows="2" disabled
                                                        id="prosedur_terapi"
                                                        name=""><?php echo $resume_pulang["prosedur_terapi"] ?></textarea>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Terapi Obat-obatan Yang Diberikan Termasuk Obat Setelah Pasien Pulang :<span class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" cols="3" rows="2" id="terapi_obat" name=""><?php echo $resume_pulang["terapi_obat"] ?></textarea>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Edukasi Yang Sudah
                                                    Diberikan :<span class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" disabled cols="3" rows="2"
                                                        id="edukasi"
                                                        name=""><?php echo $resume_pulang["edukasi"] ?></textarea>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Keadaan Pasien Saat
                                                    Pulang:</label>
                                                <span id="ruang_rawat_error" class="text-danger"></span>
                                                <div class="has-success">
                                                    <select class="select2 form-control" disabled id="keadaan"
                                                        name="keadaan" cols="3" rows="2">
                                                        <option value="Diizinkan Dokter" <?php echo ($resume_pulang["keadaan"] == 'Diizinkan Dokter') ? 'selected' : ''; ?>>Diizinkan Dokter</option>
                                                        <option value="Pulang Paksa" <?php echo ($resume_pulang["keadaan"] == 'Pulang Paksa') ? 'selected' : ''; ?>>Pulang Paksa</option>
                                                        <option value="Meninggal < 48 jam" <?php echo ($resume_pulang["keadaan"] == 'Meninggal < 48 jam') ? 'selected' : ''; ?>>Meninggal < 48 jam</option>
                                                        <option value="Meninggal > 48 jam" <?php echo ($resume_pulang["keadaan"] == 'Meninggal > 48 jam') ? 'selected' : ''; ?>>Meninggal > 48 jam</option>
                                                        <option value="Dirujuk" <?php echo ($resume_pulang["keadaan"] == 'Dirujuk') ? 'selected' : ''; ?>>Dirujuk</option>
                                                        <option value="Atas Permintaan Sendiri(APS)" <?php echo ($resume_pulang["keadaan"] == 'Atas Permintaan Sendiri(APS)') ? 'selected' : ''; ?>>Atas Permintaan Sendiri(APS)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-sm-12">
                                                <div class="panel panel-default card-view">

                                                    <div class="pull-left">
                                                        <strong>
                                                            <h6 class="panel-title txt-dark">Bayi</h6>
                                                        </strong>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label class="control-label mb-10 text-left">Hidup/Mati :<span class="help"></span></label>
                                                        <div class="has-success">
                                                            <textarea class="form-control" cols="3" rows="2" id="kondisi_bayi" name=""><?php echo $resume_pulang["kondisi_bayi"] ?></textarea>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label class="control-label mb-10 text-left">Jenis Kelamin :<span class="help"></span></label>
                                                        <div class="has-success">
                                                            <textarea class="form-control" cols="3" rows="2" id="jenis_kelamin_bayi" name=""><?php echo $resume_pulang["jenis_kelamin_bayi"] ?></textarea>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label class="control-label mb-10 text-left">BB/ PB Janin Waktu Lahir :<span class="help"></span></label>
                                                        <div class="has-success">
                                                            <textarea class="form-control" cols="3" rows="2" id="bb_pb" name=""><?php echo $resume_pulang["bb_pb"] ?></textarea>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">

                                                        <label class="control-label mb-10 text-left">Apgar Score :<span class="help"></span></label>
                                                        <div class="has-success">
                                                            <input type="number" class="form-control" name="apgar_score" id="apgar_score" value="<?php echo $resume_pulang["apgar_score"] ?>">
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label class="control-label mb-10 text-left">Kontrol Kembali Ke RS. Tanggal : <span class="help"></span></label>
                                                        <span id="tanggal_error" class="text-danger"></span>
                                                        <div class="has-success">
                                                            <input type="date" class="form-control" id="kontrol_kembali" name="kontrol_kembali" value="<?php echo $resume_pulang["kontrol_kembali"] ?>">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label class="control-label mb-10 text-left">Pukul : <span class="help"></span></label>
                                                        <span id="jam_error" class="text-danger"></span>
                                                        <div class="has-success">
                                                            <input type="time" class="form-control" id="pukul" name="pukul" value="<?php echo $resume_pulang["pukul"] ?>">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div> -->
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="panel panel-default card-view">

                                                <div class="pull-left">

                                                    <strong>
                                                        <h6 class="panel-title txt-dark">TERAPI</h6>
                                                    </strong>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default card-view">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="table-wrap">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover display pb-60"
                                                                    id="tabel_terapi">
                                                                    <thead>
                                                                        <tr class="bg-success">
                                                                            <th>NAMA OBAT</th>
                                                                            <th>DOSIS</th>
                                                                            <th>FREKUENSI</th>
                                                                            <th>CARA PEMBERIAN</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                        <tr class="bg-success">
                                                                            <th>NAMA OBAT</th>
                                                                            <th>DOSIS</th>
                                                                            <th>FREKUENSI</th>
                                                                            <th>CARA PEMBERIAN</th>
                                                                        </tr>
                                                                    </tfoot>
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


                                    <div class="form-group text-center" style="margin-top: 30px;">
                                        <div class="col-md-12">
                                            <label class="control-label mb-10 text-left">&nbsp;<span
                                                    class="help"></span></label>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <a class="btn btn-default btn-sm" onclick="javascript:history.go(-1)">
                                                <i class="fa fa-arrow-left"></i><span class="btn-text">Kembali</span>
                                            </a>

                                            <!-- <button type="button" value="Simpan" class="btn btn-success btn-sm" onclick="simpan()">Simpan</button> -->
                                            <a type="button" target="_blank" class="btn btn-primary btn-sm" id="cetak"
                                                href="<?= base_url('Erm_resume_pulang/print_out/' . $id_pelayanan . '/' . $id_history . '') ?>">Cetak</a>
                                        </div>
                                    </div>





                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <?php $this->load->view('assets/signature1') ?>
        <style>
            canvas {
                cursor: crosshair;
                border: 1px solid #000000;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function () {
                id_pelayanan = $('#inPel').val();
                id_history = $('#inHis').val();
                reload_data_diagnosa(id_pelayanan, id_history);
                reload_data_diagnosa_id_pel(id_pelayanan);
                reload_data_diagnosa1_id_pel1(id_pelayanan);

                $("#Diizinkan Dokter").click(function () {
                    if ($(this).is(":selected")) {
                        $("#keadaan").show();
                    }
                });
                $("#Pulang Paksa").click(function () {
                    if ($(this).is(":selected")) {
                        $("#keadaan").hide();
                    }
                });

                $("#Meninggal < 48 jam").click(function () {
                    if ($(this).is(":selected")) {
                        $("#keadaan").show();
                    }
                });
                $("#Meninggal > 48 jam").click(function () {
                    if ($(this).is(":selected")) {
                        $("#keadaan").hide();
                    }
                });
                $("#Dirujuk").click(function () {
                    if ($(this).is(":selected")) {
                        $("#keadaan").hide();
                    }
                });
                $("#Atas Permintaan Sendiri(APS)").click(function () {
                    if ($(this).is(":selected")) {
                        $("#keadaan").hide();
                    }
                });

            });
        </script>
        <script type="text/javascript">
            $("#persalinan1").click(function () {
                if ($(this).is(":checked")) {
                    $("#title2").hide();
                    $("#label3").hide();
                    $("#label4").hide();
                    $("#caesaria2").hide();
                    $("#caesaria1").hide();
                    $("#title1").show();
                    $("#label1").show();
                    $("#label2").show();
                    $("#pervagina2").show();
                    $("#pervagina1").show();
                }
            });
            $("#persalinan2").click(function () {
                if ($(this).is(":checked")) {
                    $("#title1").hide();
                    $("#label1").hide();
                    $("#label2").hide();
                    $("#pervagina2").hide();
                    $("#pervagina1").hide();
                    $("#title2").show();
                    $("#label3").show();
                    $("#label4").show();
                    $("#caesaria2").show();
                    $("#caesaria1").show();
                }
            });
        </script>
        <script type="text/javascript">
            function simpan() {
                id_pelayanan = $('#inPel').val();
                id_history = $('#inHis').val();
                no_rm = $('#inNoRM').val();
                tgl_lahir = $('#tgl_lahir').val();
                tgl_keluar = $('#tgl_keluar').val();
                jenis_kelamin = $('#jenis_kelamin').val();
                dokter = $('#dokter').val();
                poli = $('#poli').val();
                alamat = $('#alamat').val();
                kelas = $('#kelas').val();
                nama_ruangan = $('#nama_ruangan').val();
                tgl_masuk = $('#tgl_masuk').val();
                staff = $('#staff').val();
                agama = $('#agama').val();
                status = $('#status').val();
                riwayat = $('#riwayat').val();
                p_fisik = $('#p_fisik').val();
                hasil = $('#hasil').val();
                diagnosa = $('#diagnosa').val();
                diagnosa_utama = $('#diagnosa_utama').val();
                prosedur_terapi = $('#prosedur_terapi').val();
                terapi_obat = $('#terapi_obat').val();
                keadaan = $('#keadaan').val();
                edukasi = $('#edukasi').val();
                kondisi_bayi = $('#kondisi_bayi').val();
                jenis_kelamin_bayi = $('#jenis_kelamin_bayi').val();
                bb_pb = $('#bb_pb').val();
                apgar_score = $('#apgar_score').val();
                kontrol_kembali = $('#kontrol_kembali').val();
                pukul = $('#pukul').val();



                $.ajax({
                    url: "<?php echo base_url() ?>Erm_resume_pulang/store",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pelayanan: id_pelayanan,
                        no_rm: no_rm,
                        id_history: id_history,
                        tgl_lahir: tgl_lahir,
                        tgl_keluar: tgl_keluar,
                        jenis_kelamin: jenis_kelamin,
                        dokter: dokter,
                        nama_ruangan: nama_ruangan,
                        tgl_masuk: tgl_masuk,
                        staff: staff,
                        agama: agama,
                        status: status,
                        riwayat: riwayat,
                        p_fisik: p_fisik,
                        hasil: hasil,
                        diagnosa: diagnosa,
                        diagnosa_utama: diagnosa_utama,
                        prosedur_terapi: prosedur_terapi,
                        terapi_obat: terapi_obat,
                        keadaan: keadaan,
                        edukasi: edukasi,
                        kondisi_bayi: kondisi_bayi,
                        jenis_kelamin_bayi: jenis_kelamin_bayi,
                        bb_pb: bb_pb,
                        apgar_score: apgar_score,
                        kontrol_kembali: kontrol_kembali,
                        pukul: pukul,

                    },
                    success: function (data) {
                        if (data.status == "success") {
                            // alert('success');
                            window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" + '<?= urlencode(base64_encode($id_pelayanan)) ?>' + '/' + '<?= urlencode(base64_encode($id_history)) ?>';
                        } else if (data.error) {
                            if (nama_ibu == '' | nama_ibu == null) {
                                $('#ibu_error').html('*wajib diisi');
                            } else {
                                $('#ibu_error').html('');
                            }
                            if (jenis_persalinan == '' | jenis_persalinan == null) {
                                $('#persalinan_error').html('*wajib diisi');
                            } else {
                                $('#persalinan_error').html('');
                            }
                            if (rawat_gabung == '' | rawat_gabung == null) {
                                $('#rawat_error').html('*wajib diisi');
                            } else {
                                $('#rawat_error').html('');
                            }
                            if (alasan == '' | alasan == null) {
                                $('#alasan_error').html('*wajb diisi');
                            } else {
                                $('#alasan_error').html('');
                            }
                            if (catatan == '' | catatan == null) {
                                $('#catatan_error').html('*wajib diisi');
                            } else {
                                $('#catatan_error').html('');
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
                    },],
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
                    },],
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
                    },],
                });
            }

            function tambah_data_diagnosa(id_pelayanan, id_diagnosa, nama_diagnosa, his) { //utk nambah diagnosa pasien
                id_pelayanan = $('#inPel').val();
                // no_diagnosa = $('#no_diagnosa').val();
                swal({
                    title: "Apakah kamu yakin?",
                    text: "Menambah Diagnosa " + nama_diagnosa + "?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3cb878",
                    confirmButtonText: "Yakin",
                    cancelButtonText: "Batal",
                    closeOnConfirm: false
                }, function () {
                    $().ready(function () {
                        $.ajax({
                            url: "<?php echo base_url() ?>Erm_igd/tambah_data_diagnosa",
                            method: "POST",
                            dataType: 'json',
                            data: {
                                id_pelayanan: id_pelayanan,
                                id_diagnosa: id_diagnosa,
                                nama_diagnosa: nama_diagnosa,
                                id_history: his
                            },
                            success: function (data) {
                                if (data.status == "success") {
                                    swal({
                                        title: "good job!",
                                        type: "success",
                                        text: "Id diagnosa" + id_diagnosa + " Berhasil ditambah",
                                        confirmButtonColor: "#3cb878",
                                    });
                                    reload_data_diagnosa_id_pel(his);
                                    reload_data_diagnosa1_id_pel1(his);
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

            function hapus_data_diagnosa(id) { //utk hapus diagnosa pasien
                swal({
                    title: "Warning?",
                    text: "Apakah kamu yakin menghapus data ini?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3cb878",
                    confirmButtonText: "Yakin",
                    cancelButtonText: "Batal",
                    closeOnConfirm: false
                }, function () {
                    $().ready(function () {
                        $.ajax({
                            url: "<?php echo base_url() ?>Erm_ranap_asesmen_dokter/hapus_data_diagnosa",
                            method: "POST",
                            dataType: 'json',
                            data: {
                                id: id,
                            },
                            success: function (data) {
                                if (data.status == "success") {
                                    swal({
                                        title: "good job!",
                                        type: "success",
                                        text: "Data Berhasil dihapus",
                                        confirmButtonColor: "#3cb878",
                                    });
                                    $('#tablediagnosa').DataTable().ajax.reload();
                                    $('#tablediagnosa1').DataTable().ajax.reload();
                                } else {
                                    swal({
                                        title: "Gagal!",
                                        type: "warning",
                                        confirmButtonColor: "#3cb878",
                                    });
                                }
                            }
                        });
                    });
                });
                return false;
            }

            function hapus_data_diagnosa1(id) { //utk hapus diagnosa pasien
                swal({
                    title: "Warning?",
                    text: "Apakah kamu yakin menghapus data ini?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3cb878",
                    confirmButtonText: "Yakin",
                    cancelButtonText: "Batal",
                    closeOnConfirm: false
                }, function () {
                    $().ready(function () {
                        $.ajax({
                            url: "<?php echo base_url() ?>Erm_ranap_asesmen_dokter/hapus_data_diagnosa1",
                            method: "POST",
                            dataType: 'json',
                            data: {
                                id: id,
                            },
                            success: function (data) {
                                if (data.status == "success") {
                                    swal({
                                        title: "good job!",
                                        type: "success",
                                        text: "Data Berhasil dihapus",
                                        confirmButtonColor: "#3cb878",
                                    });
                                    $('#tablediagnosa').DataTable().ajax.reload();
                                    $('#tablediagnosa1').DataTable().ajax.reload();
                                } else {
                                    swal({
                                        title: "Gagal!",
                                        type: "warning",
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
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">

            <div class="panel-heading">
                <div class="pull-left">
                    <strong>
                        <h6 class="panel-title txt-dark"> PASIEN PULANG (DISCHARGE SUMMARY)</h6>
                    </strong>



                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in" id="myDiv">
                    <div class="panel-body">
                        <div class="form-wrap">

                            <div class="form-group">
                                <!-- <form id="formUpload"> -->
                                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel"
                                    id="inPel">
                                <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis"
                                    id="inHis">
                                <input type="hidden" class="form-control" value="" id="id" name="id">
                                <input type="text" class="form-control" style="display: none;" name="id_pelayanan"
                                    value="<?= $id_pelayanan ?>" id="id_pelayanan">

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Ruang :<span
                                            class="help"></span></label>
                                    <div class="has-success">
                                        <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                        <input type="text" class="form-control" id="nama_ruangan"
                                            value="<?= $nama_ruangan ?>" disabled>
                                        <!-- <span class="help-block"></span> -->
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Nama Pasien :<span
                                            class="help"></span></label>
                                    <div class="has-success">
                                        <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                        <input type="text" class="form-control" id="inNama" value="<?= $nama ?>"
                                            disabled>
                                        <!-- <span class="help-block"></span> -->
                                    </div>
                                </div>
                                <!-- <input type="hidden" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>"> -->

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Kelas :<span
                                            class="help"></span></label>
                                    <span id="alamat_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="kelas" value="<?= $kelas ?>"
                                            disabled>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Dokter :</label>
                                    <span id="dpjp1_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="dpjp1" value="<?= $dokter ?>"
                                            disabled>

                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Tgl. Lahir : <span
                                            class="help"></span></label>
                                    <span id="tanggal_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <?php

                                        $tanggal_indonesia = date("d/m/Y", strtotime($tgl_lahir));

                                        echo '<input type="text" disabled class="form-control" value="' . $tanggal_indonesia . '">';
                                        ?>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Alamat :<span
                                            class="help"></span></label>
                                    <div class="has-success">
                                        <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                        <input type="text" class="form-control" id="alamat" value="<?= $alamat ?>"
                                            disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <!-- <form id="formUpload"> -->
                                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel"
                                    id="inPel">
                                <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis"
                                    id="inHis">
                                <input type="hidden" class="form-control" value="" id="id" name="id">
                                <!-- <input type="hidden" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>"> -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">No. RM :<span
                                                class="help"></span></label>
                                        <div class="has-success">
                                            <!-- <input type="text" class="form-control" id="in" disabled> -->
                                            <input type="text" class="form-control" id="inNoRM" value="<?= $no_rm ?>"
                                                disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <div class="col-md-4">      
                                        <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                        <div class="has-success">
                                             <select class="form-control filled-input select2" id="inJO" name="inJO">
                                                <option value="">Jenis Kelamin</option>
                                                <option value="Lakilaki">LK</option>
                                                <option value="Perempuan">PR</option>    
                                              </select>
                                        </div>
                                    </div>
                                  </div> -->
                                <!-- <div class="col-md-7">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div> -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Jenis Kelamin :<span
                                                class="help"></span></label>
                                        <div class="has-success">
                                            <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                            <input type="text" disabled class="form-control"
                                                value="<?= $jenis_kelamin ?>" id="jenis_kelamin">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Tgl Masuk :<span
                                                class="help"></span></label>
                                        <div class="has-success">
                                            <input type="text" id="tgl_masuk" disabled class="form-control" value="<?php
                                            setlocale(LC_ALL, 'id_ID');

                                            date_default_timezone_set('Asia/Jakarta');
                                            $time = strtotime($tgl_masuk);
                                            $date = strftime(" %d %B %Y ", $time);
                                            $jam = date(" H:i:s ", $time);
                                            echo $jam . '/' . $date ?>">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>




                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Tgl. Keluar : <span class="help"></span></label>
                                        <span id="tanggal_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar" value="<?php echo $resume_pulang["tgl_keluar"] ?>">

                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Agama :<span
                                                class="help"></span></label>
                                        <div class="has-success">
                                            <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                            <input type="text" disabled class="form-control" value="<?= $agama ?>"
                                                id="status">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Status Perkawinan :<span
                                                class="help"></span></label>
                                        <div class="has-success">
                                            <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                            <input type="text" disabled class="form-control" value="<?= $status ?>"
                                                id="status">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <label class="control-label mb-10 text-left">&nbsp;<span
                                            class="help"></span></label>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Alasan / Indikasi Masuk RS :<span
                                                class="help"></span></label>
                                        <span id="keluhan_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" readonly name="keluhan_utama"
                                                id="keluhan_utama" cols="30"
                                                rows="3"><?= isset($form_perawat->keluhan_utama) ? $form_perawat->keluhan_utama : ''; ?></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel panel-default card-view">

                                            <div class="pull-left">

                                                <strong>
                                                    <h6 class="panel-title txt-dark">RINGKASAN RIWAYAT PENYAKIT DAN
                                                        PENEMUAN FISIK PENTING</h6>
                                                </strong>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Riwayat :<span
                                                        class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" cols="3" disabled rows="2"
                                                        id="riwayat"
                                                        name=""><?php echo $resume_pulang["riwayat"] ?></textarea>

                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Pemeriksaan Fisik :<span
                                                        class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" cols="3" disabled rows="2"
                                                        id="p_fisik"
                                                        name=""><?php echo $resume_pulang["p_fisik"] ?></textarea>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Hasil Pemeriksaan Penunjang
                                                    :<span class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" cols="3" disabled rows="2" id="hasil"
                                                        name=""><?php echo $resume_pulang["hasil"] ?></textarea>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Diagnosa Saat Masuk :<span
                                                        class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" readonly disabled name="diagnosa"
                                                        id="diagnosa" re cols="3"
                                                        rows="2"><?= $pasien->diagnosa ?></textarea>

                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Diagnosa Utama Yang
                                                    Ditengahkan :<span class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" cols="3" disabled rows="2"
                                                        id="diagnosa_utama"
                                                        name=""><?php echo $resume_pulang["diagnosa_utama"] ?></textarea>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Prosedur Terapi & Tindakan
                                                    Yang Telah Dikerjakan :<span class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" cols="3" rows="2" disabled
                                                        id="prosedur_terapi"
                                                        name=""><?php echo $resume_pulang["prosedur_terapi"] ?></textarea>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Terapi Obat-obatan Yang Diberikan Termasuk Obat Setelah Pasien Pulang :<span class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" cols="3" rows="2" id="terapi_obat" name=""><?php echo $resume_pulang["terapi_obat"] ?></textarea>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Edukasi Yang Sudah
                                                    Diberikan :<span class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" disabled cols="3" rows="2"
                                                        id="edukasi"
                                                        name=""><?php echo $resume_pulang["edukasi"] ?></textarea>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Keadaan Pasien Saat
                                                    Pulang:</label>
                                                <span id="ruang_rawat_error" class="text-danger"></span>
                                                <div class="has-success">
                                                    <select class="select2 form-control" disabled id="keadaan"
                                                        name="keadaan" cols="3" rows="2">
                                                        <option value="Diizinkan Dokter" <?php echo ($resume_pulang["keadaan"] == 'Diizinkan Dokter') ? 'selected' : ''; ?>>Diizinkan Dokter</option>
                                                        <option value="Pulang Paksa" <?php echo ($resume_pulang["keadaan"] == 'Pulang Paksa') ? 'selected' : ''; ?>>Pulang Paksa</option>
                                                        <option value="Meninggal < 48 jam" <?php echo ($resume_pulang["keadaan"] == 'Meninggal < 48 jam') ? 'selected' : ''; ?>>Meninggal < 48 jam</option>
                                                        <option value="Meninggal > 48 jam" <?php echo ($resume_pulang["keadaan"] == 'Meninggal > 48 jam') ? 'selected' : ''; ?>>Meninggal > 48 jam</option>
                                                        <option value="Dirujuk" <?php echo ($resume_pulang["keadaan"] == 'Dirujuk') ? 'selected' : ''; ?>>Dirujuk</option>
                                                        <option value="Atas Permintaan Sendiri(APS)" <?php echo ($resume_pulang["keadaan"] == 'Atas Permintaan Sendiri(APS)') ? 'selected' : ''; ?>>Atas Permintaan Sendiri(APS)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-sm-12">
                                                <div class="panel panel-default card-view">

                                                    <div class="pull-left">
                                                        <strong>
                                                            <h6 class="panel-title txt-dark">Bayi</h6>
                                                        </strong>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label class="control-label mb-10 text-left">Hidup/Mati :<span class="help"></span></label>
                                                        <div class="has-success">
                                                            <textarea class="form-control" cols="3" rows="2" id="kondisi_bayi" name=""><?php echo $resume_pulang["kondisi_bayi"] ?></textarea>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label class="control-label mb-10 text-left">Jenis Kelamin :<span class="help"></span></label>
                                                        <div class="has-success">
                                                            <textarea class="form-control" cols="3" rows="2" id="jenis_kelamin_bayi" name=""><?php echo $resume_pulang["jenis_kelamin_bayi"] ?></textarea>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label class="control-label mb-10 text-left">BB/ PB Janin Waktu Lahir :<span class="help"></span></label>
                                                        <div class="has-success">
                                                            <textarea class="form-control" cols="3" rows="2" id="bb_pb" name=""><?php echo $resume_pulang["bb_pb"] ?></textarea>
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">

                                                        <label class="control-label mb-10 text-left">Apgar Score :<span class="help"></span></label>
                                                        <div class="has-success">
                                                            <input type="number" class="form-control" name="apgar_score" id="apgar_score" value="<?php echo $resume_pulang["apgar_score"] ?>">
                                                            <span class="help-block text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label class="control-label mb-10 text-left">Kontrol Kembali Ke RS. Tanggal : <span class="help"></span></label>
                                                        <span id="tanggal_error" class="text-danger"></span>
                                                        <div class="has-success">
                                                            <input type="date" class="form-control" id="kontrol_kembali" name="kontrol_kembali" value="<?php echo $resume_pulang["kontrol_kembali"] ?>">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label class="control-label mb-10 text-left">Pukul : <span class="help"></span></label>
                                                        <span id="jam_error" class="text-danger"></span>
                                                        <div class="has-success">
                                                            <input type="time" class="form-control" id="pukul" name="pukul" value="<?php echo $resume_pulang["pukul"] ?>">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div> -->
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="panel panel-default card-view">

                                                <div class="pull-left">

                                                    <strong>
                                                        <h6 class="panel-title txt-dark">TERAPI</h6>
                                                    </strong>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default card-view">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="table-wrap">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover display pb-60"
                                                                    id="tabel_terapi">
                                                                    <thead>
                                                                        <tr class="bg-success">
                                                                            <th>NAMA OBAT</th>
                                                                            <th>DOSIS</th>
                                                                            <th>FREKUENSI</th>
                                                                            <th>CARA PEMBERIAN</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                        <tr class="bg-success">
                                                                            <th>NAMA OBAT</th>
                                                                            <th>DOSIS</th>
                                                                            <th>FREKUENSI</th>
                                                                            <th>CARA PEMBERIAN</th>
                                                                        </tr>
                                                                    </tfoot>
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


                                    <div class="form-group text-center" style="margin-top: 30px;">
                                        <div class="col-md-12">
                                            <label class="control-label mb-10 text-left">&nbsp;<span
                                                    class="help"></span></label>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <a class="btn btn-default btn-sm" onclick="javascript:history.go(-1)">
                                                <i class="fa fa-arrow-left"></i><span class="btn-text">Kembali</span>
                                            </a>

                                            <!-- <button type="button" value="Simpan" class="btn btn-success btn-sm" onclick="simpan()">Simpan</button> -->
                                            <a type="button" target="_blank" class="btn btn-primary btn-sm" id="cetak"
                                                href="<?= base_url('Erm_resume_pulang/print_out/' . $id_pelayanan . '/' . $id_history . '') ?>">Cetak</a>
                                        </div>
                                    </div>





                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <?php $this->load->view('assets/signature1') ?>
        <style>
            canvas {
                cursor: crosshair;
                border: 1px solid #000000;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function () {
                id_pelayanan = $('#inPel').val();
                id_history = $('#inHis').val();
                reload_data_diagnosa(id_pelayanan, id_history);
                reload_data_diagnosa_id_pel(id_pelayanan);
                reload_data_diagnosa1_id_pel1(id_pelayanan);

                $("#Diizinkan Dokter").click(function () {
                    if ($(this).is(":selected")) {
                        $("#keadaan").show();
                    }
                });
                $("#Pulang Paksa").click(function () {
                    if ($(this).is(":selected")) {
                        $("#keadaan").hide();
                    }
                });

                $("#Meninggal < 48 jam").click(function () {
                    if ($(this).is(":selected")) {
                        $("#keadaan").show();
                    }
                });
                $("#Meninggal > 48 jam").click(function () {
                    if ($(this).is(":selected")) {
                        $("#keadaan").hide();
                    }
                });
                $("#Dirujuk").click(function () {
                    if ($(this).is(":selected")) {
                        $("#keadaan").hide();
                    }
                });
                $("#Atas Permintaan Sendiri(APS)").click(function () {
                    if ($(this).is(":selected")) {
                        $("#keadaan").hide();
                    }
                });

            });
        </script>
        <script type="text/javascript">
            $("#persalinan1").click(function () {
                if ($(this).is(":checked")) {
                    $("#title2").hide();
                    $("#label3").hide();
                    $("#label4").hide();
                    $("#caesaria2").hide();
                    $("#caesaria1").hide();
                    $("#title1").show();
                    $("#label1").show();
                    $("#label2").show();
                    $("#pervagina2").show();
                    $("#pervagina1").show();
                }
            });
            $("#persalinan2").click(function () {
                if ($(this).is(":checked")) {
                    $("#title1").hide();
                    $("#label1").hide();
                    $("#label2").hide();
                    $("#pervagina2").hide();
                    $("#pervagina1").hide();
                    $("#title2").show();
                    $("#label3").show();
                    $("#label4").show();
                    $("#caesaria2").show();
                    $("#caesaria1").show();
                }
            });
        </script>
        <script type="text/javascript">
            function simpan() {
                id_pelayanan = $('#inPel').val();
                id_history = $('#inHis').val();
                no_rm = $('#inNoRM').val();
                tgl_lahir = $('#tgl_lahir').val();
                tgl_keluar = $('#tgl_keluar').val();
                jenis_kelamin = $('#jenis_kelamin').val();
                dokter = $('#dokter').val();
                poli = $('#poli').val();
                alamat = $('#alamat').val();
                kelas = $('#kelas').val();
                nama_ruangan = $('#nama_ruangan').val();
                tgl_masuk = $('#tgl_masuk').val();
                staff = $('#staff').val();
                agama = $('#agama').val();
                status = $('#status').val();
                riwayat = $('#riwayat').val();
                p_fisik = $('#p_fisik').val();
                hasil = $('#hasil').val();
                diagnosa = $('#diagnosa').val();
                diagnosa_utama = $('#diagnosa_utama').val();
                prosedur_terapi = $('#prosedur_terapi').val();
                terapi_obat = $('#terapi_obat').val();
                keadaan = $('#keadaan').val();
                edukasi = $('#edukasi').val();
                kondisi_bayi = $('#kondisi_bayi').val();
                jenis_kelamin_bayi = $('#jenis_kelamin_bayi').val();
                bb_pb = $('#bb_pb').val();
                apgar_score = $('#apgar_score').val();
                kontrol_kembali = $('#kontrol_kembali').val();
                pukul = $('#pukul').val();



                $.ajax({
                    url: "<?php echo base_url() ?>Erm_resume_pulang/store",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pelayanan: id_pelayanan,
                        no_rm: no_rm,
                        id_history: id_history,
                        tgl_lahir: tgl_lahir,
                        tgl_keluar: tgl_keluar,
                        jenis_kelamin: jenis_kelamin,
                        dokter: dokter,
                        nama_ruangan: nama_ruangan,
                        tgl_masuk: tgl_masuk,
                        staff: staff,
                        agama: agama,
                        status: status,
                        riwayat: riwayat,
                        p_fisik: p_fisik,
                        hasil: hasil,
                        diagnosa: diagnosa,
                        diagnosa_utama: diagnosa_utama,
                        prosedur_terapi: prosedur_terapi,
                        terapi_obat: terapi_obat,
                        keadaan: keadaan,
                        edukasi: edukasi,
                        kondisi_bayi: kondisi_bayi,
                        jenis_kelamin_bayi: jenis_kelamin_bayi,
                        bb_pb: bb_pb,
                        apgar_score: apgar_score,
                        kontrol_kembali: kontrol_kembali,
                        pukul: pukul,

                    },
                    success: function (data) {
                        if (data.status == "success") {
                            // alert('success');
                            window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" + '<?= urlencode(base64_encode($id_pelayanan)) ?>' + '/' + '<?= urlencode(base64_encode($id_history)) ?>';
                        } else if (data.error) {
                            if (nama_ibu == '' | nama_ibu == null) {
                                $('#ibu_error').html('*wajib diisi');
                            } else {
                                $('#ibu_error').html('');
                            }
                            if (jenis_persalinan == '' | jenis_persalinan == null) {
                                $('#persalinan_error').html('*wajib diisi');
                            } else {
                                $('#persalinan_error').html('');
                            }
                            if (rawat_gabung == '' | rawat_gabung == null) {
                                $('#rawat_error').html('*wajib diisi');
                            } else {
                                $('#rawat_error').html('');
                            }
                            if (alasan == '' | alasan == null) {
                                $('#alasan_error').html('*wajb diisi');
                            } else {
                                $('#alasan_error').html('');
                            }
                            if (catatan == '' | catatan == null) {
                                $('#catatan_error').html('*wajib diisi');
                            } else {
                                $('#catatan_error').html('');
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
                    },],
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
                    },],
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
                    },],
                });
            }

            function tambah_data_diagnosa(id_pelayanan, id_diagnosa, nama_diagnosa, his) { //utk nambah diagnosa pasien
                id_pelayanan = $('#inPel').val();
                // no_diagnosa = $('#no_diagnosa').val();
                swal({
                    title: "Apakah kamu yakin?",
                    text: "Menambah Diagnosa " + nama_diagnosa + "?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3cb878",
                    confirmButtonText: "Yakin",
                    cancelButtonText: "Batal",
                    closeOnConfirm: false
                }, function () {
                    $().ready(function () {
                        $.ajax({
                            url: "<?php echo base_url() ?>Erm_igd/tambah_data_diagnosa",
                            method: "POST",
                            dataType: 'json',
                            data: {
                                id_pelayanan: id_pelayanan,
                                id_diagnosa: id_diagnosa,
                                nama_diagnosa: nama_diagnosa,
                                id_history: his
                            },
                            success: function (data) {
                                if (data.status == "success") {
                                    swal({
                                        title: "good job!",
                                        type: "success",
                                        text: "Id diagnosa" + id_diagnosa + " Berhasil ditambah",
                                        confirmButtonColor: "#3cb878",
                                    });
                                    reload_data_diagnosa_id_pel(his);
                                    reload_data_diagnosa1_id_pel1(his);
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

            function hapus_data_diagnosa(id) { //utk hapus diagnosa pasien
                swal({
                    title: "Warning?",
                    text: "Apakah kamu yakin menghapus data ini?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3cb878",
                    confirmButtonText: "Yakin",
                    cancelButtonText: "Batal",
                    closeOnConfirm: false
                }, function () {
                    $().ready(function () {
                        $.ajax({
                            url: "<?php echo base_url() ?>Erm_ranap_asesmen_dokter/hapus_data_diagnosa",
                            method: "POST",
                            dataType: 'json',
                            data: {
                                id: id,
                            },
                            success: function (data) {
                                if (data.status == "success") {
                                    swal({
                                        title: "good job!",
                                        type: "success",
                                        text: "Data Berhasil dihapus",
                                        confirmButtonColor: "#3cb878",
                                    });
                                    $('#tablediagnosa').DataTable().ajax.reload();
                                    $('#tablediagnosa1').DataTable().ajax.reload();
                                } else {
                                    swal({
                                        title: "Gagal!",
                                        type: "warning",
                                        confirmButtonColor: "#3cb878",
                                    });
                                }
                            }
                        });
                    });
                });
                return false;
            }

            function hapus_data_diagnosa1(id) { //utk hapus diagnosa pasien
                swal({
                    title: "Warning?",
                    text: "Apakah kamu yakin menghapus data ini?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3cb878",
                    confirmButtonText: "Yakin",
                    cancelButtonText: "Batal",
                    closeOnConfirm: false
                }, function () {
                    $().ready(function () {
                        $.ajax({
                            url: "<?php echo base_url() ?>Erm_ranap_asesmen_dokter/hapus_data_diagnosa1",
                            method: "POST",
                            dataType: 'json',
                            data: {
                                id: id,
                            },
                            success: function (data) {
                                if (data.status == "success") {
                                    swal({
                                        title: "good job!",
                                        type: "success",
                                        text: "Data Berhasil dihapus",
                                        confirmButtonColor: "#3cb878",
                                    });
                                    $('#tablediagnosa').DataTable().ajax.reload();
                                    $('#tablediagnosa1').DataTable().ajax.reload();
                                } else {
                                    swal({
                                        title: "Gagal!",
                                        type: "warning",
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