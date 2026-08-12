<<<<<<< HEAD
<!-- Include SweetAlert 2 library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<form method="POST" id="formId" action="<?= site_url('Erm_ranap_resume_medis/store') ?>">

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Resume medis</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">

                    <div class="panel-body">
                        <div class="form-wrap">


                            <div class="form-group">
                                <div class="row">
                                    <input type="text" class="form-control" style="display: none;" name="id_staff" value="<?= $id_staff ?>" id="id_staff">
                                    <input type="text" class="form-control" style="display: none;" name="id_pelayanan" value="<?= $id_pelayanan ?>" id="id_pelayanan">
                                    <!-- <input type="text" style="display: none;" class="form-control" name="id_pelayanan" value="<?= $id_pelayanan ?>" id="id_pelayanan"> -->


                                    <div class="col-md-4">

                                        <span id="nama_error" class="text-danger"></span>

                                        <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                        <!-- <input type="text" disabled class="form-control" id="inNama"> -->
                                        <input type="text" readonly class="form-control" value="<?= $nama ?>" name="namas" id="namas">

                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Tanggal Masuk<span class="help"></span></label>
                                        <!-- <input type="text" id="inTglMasuk" disabled class="form-control"> -->
                                        <input type="text" readonly id="tanggal_masuk" name="tanggal_masuk" class="form-control" value="<?php
                                                                                                                                        setlocale(LC_ALL, 'id_ID');

                                                                                                                                        date_default_timezone_set('Asia/Jakarta');
                                                                                                                                        $time = strtotime($tgl_masuk);
                                                                                                                                        $date = strftime(" %d %B %Y ", $time);
                                                                                                                                        $jam = date(" H:i:s ", $time);
                                                                                                                                        echo $jam . '/' . $date ?>">
                                    </div>

                                    <div class="col-md-4">

                                        <label class="control-label mb-10 text-left">DPJP 1:</label>
                                        <span id="dpjp2_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <select class="select2 form-control" id="dpjp1" name="dpjp1">
                                                <option value="">-</option>
                                                <?php foreach ($dokter as $row) : ?>
                                                    <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4"><br>
                                            <label class="control-label mb-10 text-left">Tanggal Lahir:</label>
                                            <span id="tgl_lahir_error" class="text-danger"></span>
                                            <label class="control-label mb-10 text-left"><span class="help"></span></label>
                                            <!-- <input type="text" disabled class="form-control" id="inTglLahir"> -->
                                            <input type="text" class="form-control" readonly id="tanggal_lahir" name="tanggal_lahir" value="<?= date('d-m-Y', strtotime($tgl_lahir)) ?>">
                                            <span class="help-block"></span>


                                        </div>
                                        <div class="col-md-4"><br>
                                            <label class="control-label mb-10 text-left">Tanggal Keluar:</label>
                                            <span id="tgl_keluar_error" class="text-danger"></span>
                                            <div class="has-success">
                                                <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>


                                        <!-- Formulir 1 -->


                                        <div class="col-md-4">
                                            <br>
                                            <label class="control-label mb-10 text-left">DPJP 2:</label>
                                            <span id="dpjp2_error" class="text-danger"></span>
                                            <div class="has-success">
                                                <select class="select2 form-control" id="dpjp2" name="dpjp2">
                                                    <option value="">-</option>
                                                    <?php foreach ($dokter as $row) : ?>
                                                        <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><br>

                                                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                                                <input type="text" readonly class="form-control" value="<?= $no_rm ?>" id="no_rm" name="no_rm">


                                            </div>
                                            <div class="col-md-4"><br>
                                                <label class="control-label mb-10 text-left">Ruang Rawat:</label>
                                                <span id="ruang_rawat_error" class="text-danger"></span>
                                                <div class="has-success">
                                                    <input type="text" id="ruang_rawat" name="ruang_rawat" readonly class="form-control" value="<?= $nama_ruangan ?>">
                                                </div>
                                            </div>




                                            <!-- Formulir 2 -->
                                            <div class="col-md-4">
                                                <br>
                                                <label class="control-label mb-10 text-left">DPJP 3:</label>
                                                <span id="dpjp2_error" class="text-danger"></span>
                                                <div class="has-success">
                                                    <select class="select2 form-control" id="dpjp3" name="dpjp3">
                                                        <option value="">-</option>
                                                        <?php foreach ($dokter as $row) : ?>
                                                            <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- ... Form lainnya ... -->



                                    </div>
                                </div>



                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Jenis Kelamin:</label>
                                    <span id="jenis_kelamin_error" class="text-danger"></span>

                                    <!-- <input type="text" disabled class="form-control" id="inJk"> -->
                                    <input type="text" readonly class="form-control" value="<?= $jenis_kelamin ?>" name="kelamin" id="kelamin">
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Kelas:</label>
                                    <span id="kelas_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="text" id="kelas" name="kelas" value="<?= $kelas ?>" readonly class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <label class="control-label mb-10 text-left">DPJP 4:</label>
                                    <span id="dpjp2_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <select class="select2 form-control" id="dpjp4" name="dpjp4">
                                            <option value="">-</option>
                                            <?php foreach ($dokter as $row) : ?>
                                                <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                </div>



                                <!-- ... Form lainnya ... -->





                                <!-- Lanjutkan dengan form input untuk Nomor RM, Ruang Rawat, DPJP 3, Jenis Kelamin, Kelas, dan DPJP 4 sesuai dengan pola yang sama -->

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>


                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label class="control-label mb-10 text-left" id="title2">&nbsp;&nbsp;&nbsp; Riwayat Alergi :</label>
                                        <span id="alergi_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="radio-button radio-button-primary">
                                            <input id="riwayat_alergi" name="riwayat_alergi" type="radio" value="Ya">
                                            <label class="control-label" id="labelya" for="ya1">
                                                Ya
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="radio-button radio-button-primary">
                                            <input id="riwayat_alergi" name="riwayat_alergi" type="radio" value="Tidak">
                                            <label class="control-label" id="labeltidak" for="tidak1">
                                                Tidak
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <!-- <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label mb-10 text-left">Jenis Persalinan<span class="help"></span></label>
                                <span id="diagnosis_error" class="text-danger"></span>
                                <div class="has-success" onchange="pilihPersalinan()">
                                <select class="form-control filled-input select2" id="inPersalinan" name="inPersalinan">
                                                            <option value="">Jenis Persalinan</option>
                                                            <option value="Pervagina">Pervagina</option>
                                                            <option value="Caesaria">Sectio Caesaria</option>    
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div> -->
                                <div class="form-group ">

                                    <div class="col-md-12">

                                        <label class="control-label mb-10 text-left">Keterangan: <span class="help"></span></label>
                                        <span id="keterangan_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" id="keterangan" name="keterangan" style="height: 40px;" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <br>
                                        <label class="control-label mb-10 text-left">Alasan indikasi masuk: <span class="help"></span></label>
                                        <span id="keterangan_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" id="alasan_indikasi_masuk" name="alasan_indikasi_masuk" style="height: 40px;" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-6">
                                        <label class="control-label mb-10 text-left"><b>Keluhan Utama:<b /><span class="help"></span></label>
                                        <span id="keluhan_error" class="text-danger"></span>
                                        <div class="has-success">
                                        
                                        </div> -->

                                    <div class="col-md-12">
                                        <br>
                                        <label class="control-label mb-10 text-left">Riwayat Singkat Dan Pemeriksaan Fisik: <span class="help"></span></label>
                                        <span id="riwayat_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" name="riwayat_singkat_fisik" style="height: 80px;" id="riwayat_singkat_fisik" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-md-12">
                                            <br>
                                            <label class="control-label mb-10 text-left" id="title2">Pemeriksaan Penunjang Diagnostik:</label>
                                            <span id="alergi_error" class="text-danger"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="pemeriksaan_penunjang_diagnostik" type="radio" name="pemeriksaan_penunjang_diagnostik" value="Radiologi">
                                                <label class="control-label" id="labelradiologi" for="radiologi">
                                                    Radiologi
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="pemeriksaan_penunjang_diagnostik" type="radio" name="pemeriksaan_penunjang_diagnostik" value="Laboratorium">
                                                <label class="control-label" id="labellaboratorium" for="laboratorium">
                                                    Laboratorium
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="pemeriksaan_penunjang_diagnostik" type="radio" name="pemeriksaan_penunjang_diagnostik" value="Lain-lain">
                                                <label class="control-label" id="labellainlain" for="lainlain">
                                                    Lain-lain
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-md-12"><br>
                                                <label class="control-label mb-10 text-left">Diagnosa Saat Masuk: <span class="help"></span></label>
                                                <span id="masuk_error" class="text-danger"></span>
                                                <div class="has-success">
                                                    <textarea class="form-control" name="diagnosa_masuk" readonly style="height: 40px;" id="diagnosa_masuk" re cols="30" rows="4"><?= $pasien->diagnosa ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <br>
                                                <label class="control-label mb-10 text-left">Diagnosa Saat Keluar: <span class="help"></span></label>
                                                <span id="keluar_error" class="text-danger"></span>
                                                <div class="has-success">
                                                    <textarea class="form-control" name="diagnosa_keluar" style="height: 40px;" id="diagnosa_keluar" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <br>
                                                <label class="control-label mb-10 text-left">Prosedur Pembedahan/Tindakan: <span class="help"></span></label>
                                                <span id="pembedahan_error" class="text-danger"></span>
                                                <div class="has-success">
                                                    <textarea class="form-control" name="prosedur_pembedahan_tindakan" style="height: 80px;" id="prosedur_pembedahan_tindakan" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-6"><br>
                                            <label class="control-label mb-10 text-left" style="font-weight: bold;">Ringkasan Keluar: <span class="help"></span></label>
                                            <br>
                                            <label class="control-label mb-15 text-left">Keadaan waktu pulang: <span class="help"></span></label>
                                            <div class="form-group">
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="keadaan_waktu_pulang" type="radio" name="keadaan_waktu_pulang" value="sembuh">
                                                        <label class="control-label" for="sembuh">
                                                            Sembuh
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="keadaan_waktu_pulang" type="radio" name="keadaan_waktu_pulang" value="belumsembuh">
                                                        <label class="control-label" for="belumsembuh">
                                                            Belum sembuh
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="keadaan_waktu_pulang" type="radio" name="keadaan_waktu_pulang" value="perbaikan">
                                                        <label class="control-label" for="perbaikan">
                                                            Perbaikan
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="keadaan_waktu_pulang" type="radio" name="keadaan_waktu_pulang" value="meninggal">
                                                        <label class="control-label" for="meninggal">
                                                            Meninggal
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6"><br>
                                            <label class="control-label mb-10 text-left" style="font-weight: bold;">Kesadaran <span class="help"></span></label>
                                            <br>
                                            <label class="control-label mb-15 text-left">TTV: <span class="help"></span></label>
                                            <div class="form-group">
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="kesadaran" type="radio" name="kesadaran" value="td">
                                                        <label class="control-label" for="td">
                                                            TD
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="kesadaran" type="radio" name="kesadaran" value="temp">
                                                        <label class="control-label" for="temp">
                                                            TEMP
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="kesadaran" type="radio" name="kesadaran" value="rr">
                                                        <label class="control-label" for="rr">
                                                            RR
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="kesadaran" type="radio" name="kesadaran" value="hr">
                                                        <label class="control-label" for="hr">
                                                            HR
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="kesadaran" type="radio" name="kesadaran" value="sp02">
                                                        <label class="control-label" for="sp02">
                                                            SP02
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12"><br>
                                            <label class="control-label mb-10 text-left" style="font-weight: bold;">Alasan Pulang: <span class="help"></span></label>
                                            <br>

                                            <div class="form-group">
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="alasan_pulang" type="radio" name="alasan_pulang" value="persetujuan">
                                                        <label class="control-label" id="labelpersetujuan" for="persetujuan">
                                                            Dengan Persetujuan Dokter
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="alasan_pulang" type="radio" name="alasan_pulang" value="sendiri">
                                                        <label class="control-label" id="labelsendiri" for="sendiri">
                                                            Atas Permintaan Sendiri
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="alasan_pulang" type="radio" name="alasan_pulang" value="dirujuk">
                                                        <label class="control-label" id="labeldirujuk" for="dirujuk">
                                                            Dirujuk
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-6"><br>
                                        <label class="control-label mb-10 text-left">Hari/Tanggal Kontrol ke RS:</label>
                                        <span id="tanggal_keluar_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="date" class="form-control" id="tanggal_keluar_rs" name="tanggal_keluar_rs" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6"><br>
                                        <label class="control-label mb-10 text-left">Poliklinik:</label>
                                        <span id="poliklinik_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <select class="select2 form-control" id="poliklinik" name="poliklinik">
                                                <option value="">-</option>
                                                <?php foreach ($poli as $row) : ?>
                                                    <option value="<?= $row['nama_panjang']; ?>"><?= $row['nama_panjang']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>



                                    <div class="form-group">

                                        <div class="col-md-6"><br>
                                            <label style="font-weight: bold" class="control-label mb-1 text-left">Edukasi yang telah diberikan:</label>
                                            <br><br>
                                            <label class="control-label mb-10 text-left">Selama Di Rumah Sakit:</label>
                                            <span id="selama_rs_error" class="text-danger"></span>
                                            <div class="has-success">
                                                <textarea class="form-control" rows="5" name="selama_dirumah_sakit" id="selama_dirumah_sakit"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6"><br><br><br> <label class="control-label mb-1 text-left"></label>
                                            <label class="control-label mb-10 text-left">Selama Di Rumah:</label>
                                            <span id="selama_rumah_error" class="text-danger"></span>
                                            <div class="has-success">
                                                <textarea class="form-control" rows="5" id="selama_dirumah" name="selama_dirumah"></textarea>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="col-md-4">

                                        <br />
                                        <div class="row">

                                            <button class="btn btn-default" style="display: none;" id="sig-clearBtn"></button>
                                            <canvas id="can" width="300" height="300" style="display: none;"></canvas>
                                            <div class="form-group">
                                                <div class="modal fade" id="modal_ttd" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <button type="button" style="display: none;" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="form-group row" style="margin-left: 30px;">

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <canvas id="ttd" width="300" height="300">
                                                                            </canvas>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <button class="btn btn-primary" style="display: none;" id="sig-submitBtn">Submit Signature</button>
                                                                            <button class="btn btn-default" style="display: none;" id="sig-clearBtn3"></button>
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
                                <div class="col-md-4">

                                    <br />
                                    <div class="row">
                                        <button data-toggle="modal" aria-expanded="false" class="btn btn-primary btn-anim btn-sm" style="display: none;"></button>

                                        <button class="btn btn-default" style="display: none;" id="sig-clearBtn1"></button>
                                        <canvas id="can1" width="300" height="300" style="display: none;"></canvas>
                                        <div class="form-group">
                                            <div class="modal fade" id="modal_ttd1" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">

                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="false">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="form-group row" style="margin-left: 30px;">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <canvas id="ttd1" width="300" height="300">
                                                                        </canvas>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <button class="btn btn-primary" style="display: none;" id="sig-submitBtn1"></button>
                                                                        <button class="btn btn-default" style="display: none;" id="sig-clearBtn4"></button>
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
                                <div class="col-md-4">
                                    <label class="control-label"></label>
                                    <br />
                                    <div class="row">
                                        <button data-toggle="modal" disabled data-target="#modal_ttd2" aria-expanded="false" aria-controls="poli_sore" class="btn"></span></button>
                                        <button class="btn" style="display: none;" disabled id="sig-clearBtn2"></button>
                                        <canvas id="can2" width="300" height="300" style="display: none;"></canvas>
                                        <div class="form-group">
                                            <div class="modal fade" id="modal_ttd2" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">

                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="form-group row" style="margin-left: 30px;">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <canvas id="ttd2" width="300" height="300">
                                                                        </canvas>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <button class="btn btn-primary" id="sig-submitBtn2"></button>
                                                                        <button class="btn btn-default" style="color: #000000; display: none;" id="sig-clearBtn5"></button>
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

                                <div class="form-group">



                                    <div class="col-md-8">
                                        <button type="button" class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px;  margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                            <div class="col-md-6">
                                                <button type="submit" id="simpanButton" value="Simpan" class="btn btn-success mb-4">Simpan</button>
                                                <div class="col-md-6">
                                                    <a type="button" target="_blank" class="btn btn-primary mb-4" id="cetakPdf" href="<?= base_url('Erm_ranap_pdfcontroller/generate_pdf/' . $id_pelayanan . '') ?>">Cetak ke PDF</a>

                                                    <!-- <button type="button" target="_blank" class="btn btn-primary mb-4" id="cetakPdf">Cetak ke PDF</button> -->

                                                    <!-- ... (Form inputan lainnya) ... -->

                                                    <!-- <script>
                                                        document.getElementById("cetakPdf").addEventListener("click", function() {
                                                            window.location.href = "<?= site_url('Erm_ranap_pdfcontroller/generate_pdf') ?>";
                                                        });
                                                    </script> -->
                                                    <button type="submit" style="display: none;" id="simpan" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                                                    <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                                                    <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
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
            <script>
                // Menambahkan event click pada tombol "Simpan"
                document.getElementById('simpanButton').addEventListener('click', function(event) {
                    // Hentikan pengiriman formulir secara otomatis (default behavior)
                    event.preventDefault();

                    // Tampilkan SweetAlert2 untuk konfirmasi sebelum mengirimkan data
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: 'Anda yakin data sudah sesuai untuk disimpan?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Simpan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika pengguna mengklik "Ya, Simpan!", kirim data formulir dengan AJAX
                            $.ajax({
                                url: $("#formId").attr("action"), // Ambil URL dari atribut 'action' formulir
                                type: $("#formId").attr("method"), // Ambil metode HTTP dari atribut 'method' formulir
                                data: $("#formId").serialize(), // Ambil data formulir yang akan dikirim
                                success: function(response) {
                                    // Setelah data berhasil diinput, tampilkan pesan sukses
                                    Swal.fire({
                                        title: 'Good job!',
                                        text: 'Data berhasil disimpan.',
                                        icon: 'success',
                                        confirmButtonColor: '#3cb878'
                                    });
                                }
                            });
                        }
                    });
                });
            </script>
            <script>
                // Menambahkan event click pada tombol "Simpan"
                document.getElementById('simpanButton').addEventListener('click', function(event) {
                    // Hentikan pengiriman formulir secara otomatis (default behavior)
                    event.preventDefault();

                    // Tampilkan SweetAlert2 untuk konfirmasi sebelum mengirimkan data
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: 'Anda yakin data sudah sesuai untuk disimpan?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Simpan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika pengguna mengklik "Ya, Simpan!", kirim data formulir dengan AJAX
                            $.ajax({
                                url: $("#formId").attr("action"), // Ambil URL dari atribut 'action' formulir
                                type: $("#formId").attr("method"), // Ambil metode HTTP dari atribut 'method' formulir
                                data: $("#formId").serialize(), // Ambil data formulir yang akan dikirim
                                success: function(response) {
                                    // Setelah data berhasil diinput, tampilkan pesan sukses
                                    Swal.fire({
                                        title: 'Good job!',
                                        text: 'Data berhasil disimpan.',
                                        icon: 'success',
                                        confirmButtonColor: '#3cb878'
                                    });
                                }
                            });
                        }
                    });
                });
            </script>


            <script type="text/javascript">
                $("#persalinan1").click(function() {
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
                $("#persalinan2").click(function() {
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
                    nama_ibu = $('#inIbu').val();
                    jam_lahir = $('#inJam').val();
                    jenis_persalinan = $('input[name="persalinan"]:checked').val();
                    pervagina = $('input[name="pervagina"]:checked').val();
                    sectio = $('input[name="caesaria"]:checked').val();
                    kontak = $('input[name="kontak"]:checked').val();
                    waktu_mulai = $('#jam_mulai').val();
                    waktu_selesai = $('#jam_selesai').val();
                    lama_kontak = $('#inKontak').val();
                    menyusui1 = $('#inMenyusui1').val();
                    menyusui2 = $('#inMenyusui2').val();
                    alasan = $('#inAlasan').val();
                    catatan = $('#inCatatan').val();
                    canvas = document.getElementById('can');
                    ttd = canvas.toDataURL("image/png");
                    canvas1 = document.getElementById('can1');
                    ttd1 = canvas1.toDataURL("image/png");

                    dataString = 'nama_ibu=' + nama_ibu + '&no_rm=' + no_rm + '&jam_lahir=' + jam_lahir + '&pervagina=' + pervagina + '&sectio=' + sectio + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
                        '&kontak=' + kontak + '&waktu_mulai=' + waktu_mulai + '&waktu_selesai=' + waktu_selesai + '&lama_kontak=' + lama_kontak + '&menyusui1=' + menyusui1 + '&menyusui2=' + menyusui2 + '&alasan=' + alasan + '&catatan=' + catatan +
                        '&ttd=' + ttd + '&ttd1=' + ttd1 + '&jenis_persalinan=' + jenis_persalinan;

                    $.ajax({
                        url: "<?php echo base_url() ?>Erm_ranap_imd/insert_imd_asi",
                        method: "POST",
                        dataType: 'json',
                        data: dataString,
                        success: function(data) {
                            if (data.status == "success") {
                                window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" + '<?= urlencode(base64_encode($id_pelayanan)) ?>' + '/' + '<?= urlencode(base64_encode($id_history)) ?>';
                            } else if (data.error) {
                                if (data.nama_ibu != '') {
                                    $('#ibu_error').html(data.nama_ibu);
                                } else {
                                    $('#ibu_error').html('');
                                }
                                if (data.jam_lahir != '') {
                                    $('#lahir_error').html(data.jam_lahir);
                                } else {
                                    $('#lahir_error').html('');
                                }
                                if (data.waktu_mulai != '') {
                                    $('#jam_mulai_error').html(data.waktu_mulai);
                                } else {
                                    $('#jam_mulai_error').html('');
                                }
                                if (data.waktu_selesai != '') {
                                    $('#jam_selesai_error').html(data.waktu_selesai);
                                } else {
                                    $('#jam_selesai_error').html('');
                                }
                                if (data.bayi_menyusui != '') {
                                    $('#menyusu1_error').html(data.bayi_menyusui);
                                } else {
                                    $('#menyusu1_error').html('');
                                }
                                if (data.lama_kontak != '') {
                                    $('#Lkontak_error').html(data.lama_kontak);
                                } else {
                                    $('#Lkontak_error').html('');
                                }
                                if (data.menolong != '') {
                                    $('#menyusu2_error').html(data.menolong);
                                } else {
                                    $('#menyusu2_error').html('');
                                }
                                if (data.catatan != '') {
                                    $('#catatan_error').html(data.catatan);
                                } else {
                                    $('#catatan_error').html('');
                                }
                                if (data.alasan != '') {
                                    $('#alasan_error').html(data.alasan);
                                } else {
                                    $('#alasan_error').html('');
                                }
                                if (jenis_persalinan == '' | jenis_persalinan == null) {
                                    $('#persalinan_error').html('*wajib diisi');
                                } else {
                                    $('#persalinan_error').html('');
                                }
                                if (kontak == '' | kontak == null) {
                                    $('#kontak_error').html('*wajib diisi');
                                } else {
                                    $('#kontak_error').html('');
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
                //   function hapus(id) { //utk hapus diagnosa pasien
                //     swal({
                //       title: "Warning?",
                //       text: "Apakah kamu yakin menghapus data ini?",
                //       type: "warning",
                //       showCancelButton: true,
                //       confirmButtonColor: "#3cb878",
                //       confirmButtonText: "Yakin",
                //       cancelButtonText: "Batal",
                //       closeOnConfirm: false
                //     }, function() {
                //       $().ready(function() {
                //         $.ajax({
                //           url: "<?php echo base_url() ?>Erm_penunjang_diagnostik/hapus_penunjang",
                //           method: "POST",
                //           dataType: 'json',
                //           data: {
                //             id: id,
                //           },
                //           success: function(data) {
                //             if (data.status == "success") {
                //               swal({
                //                 title: "good job!",
                //                 type: "success",
                //                 text: "Data Berhasil dihapus",
                //                 confirmButtonColor: "#3cb878",
                //               });
                //               $('#tabel_terapi').DataTable().ajax.reload();
                //             } else {
                //               swal({
                //                 title: "Gagal!",
                //                 type: "warning",
                //                 confirmButtonColor: "#3cb878",
                //               });
                //             }
                //           }
                //         });
                //       });
                //     });
                //     return false;
                //   }

                //   function reload_data_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
                //     $('#tabel_terapi').dataTable().fnClearTable();
                //     $('#tabel_terapi').dataTable().fnDestroy();
                //     $('#tabel_terapi').DataTable({
                //       "language": {
                //         "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                //         "sProcessing": "Sedang memproses...",
                //         "sLengthMenu": "Tampilkan _MENU_ entri",
                //         "sZeroRecords": "Tidak ditemukan data yang sesuai",
                //         "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                //         "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                //         "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                //         "sInfoPostFix": "",
                //         "sSearch": "Cari:",
                //         "sUrl": "",
                //         "oPaginate": {
                //           "sFirst": "Pertama",
                //           "sPrevious": "Sebelumnya",
                //           "sNext": "Selanjutnya",
                //           "sLast": "Terakhir",
                //         }
                //       },
                //       "ajax": {
                //         "url": '<?php echo base_url('Erm_penunjang_diagnostik/tampil_list_per_pen_rujukan'); ?>',
                //         "type": 'POST',
                //         "data": {
                //           id_pelayanan: id_pelayanan
                //         },
                //       },

                //       "deferRender": true,
                //       "processing": true,
                //       "order": [],
                //       "columnDefs": [{
                //         "targets": [0],
                //         "orderable": false,
                //       }, ],
                //     });
                //   }

                //   function pilih(id) {
                //     $('#id').val(id);
                //     $.ajax({
                //       url: "<?php echo base_url() ?>Erm_penunjang_diagnostik/getPerPenRujukan",
                //       method: "POST",
                //       dataType: 'json',
                //       data: {
                //         id: id
                //       },
                //       success: function(data) {
                //         if (data.status_dt == "found") {
                //           $('#inTgl').val(data.tanggal);
                //           $('#inPeriksa').val(data.periksa);
                //           $('#inDPJP').val(data.dpjp);
                //           $('#inKet').val(data.ket);
                //           $('#edit').show();
                //           $('#cetak').show();
                //           $('#simpan').hide();
                //           // smooth scroll
                //           window.scrollTo({
                //             top: 0,
                //             behavior: 'smooth'
                //           });
                //         } else {
                //           swal({
                //             title: "Gagal!",
                //             type: "warning",
                //             text: "Data Kosong",
                //             confirmButtonColor: "#3cb878",
                //           });
                //         }
                //       }

                //     });
                //     return false;

                //   }

                //   function edit() {
                //     var formData = new FormData($('#formUpload')[0]);
                //     $.ajax({
                //       url: '<?php echo base_url(); ?>Erm_penunjang_diagnostik/edit_penunjang',
                //       type: "POST",
                //       data: formData,
                //       processData: false,
                //       contentType: false,
                //       cache: false,
                //       dataType: 'JSON',
                //       success: function(data) {
                //         const success = data.status.success;
                //         const error = data.status.error;
                //         if (success > 0) {
                //           swal({
                //             title: "good job!",
                //             type: "success",
                //             text: "Data berhasil disimpan",
                //             confirmButtonColor: "#3cb878",
                //           });
                //           $("#file_input").val(null);
                //           $("#inDPJP").val('');
                //           $("#inKet").val('');
                //           $("#inPeriksa").val('');
                //           $("#inTgl").val('');
                //           $('#edit').hide();
                //           $('#cetak').hide();
                //           $('#simpan').show();
                //           $('#tabel_terapi').DataTable().ajax.reload();
                //         } else if (error > 0) {
                //           swal({
                //             title: "Gagal!",
                //             text: "Data tidak terkirim, mohon cek inputan Anda kembali",
                //             type: "warning",
                //             confirmButtonColor: "#3cb878",
                //           });
                //         }
                //       }
                //     });
                //   }

                //   function cetak() {
                //     id = $('#id').val();
                //     window.location.href = "<?php echo base_url('Erm_igd_edit/print_penunjang/') ?>" + id;
                //   }
=======
<!-- Include SweetAlert 2 library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<form method="POST" id="formId" action="<?= site_url('Erm_ranap_resume_medis/store') ?>">

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Resume medis</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">

                    <div class="panel-body">
                        <div class="form-wrap">


                            <div class="form-group">
                                <div class="row">
                                    <input type="text" class="form-control" style="display: none;" name="id_staff" value="<?= $id_staff ?>" id="id_staff">
                                    <input type="text" class="form-control" style="display: none;" name="id_pelayanan" value="<?= $id_pelayanan ?>" id="id_pelayanan">
                                    <!-- <input type="text" style="display: none;" class="form-control" name="id_pelayanan" value="<?= $id_pelayanan ?>" id="id_pelayanan"> -->


                                    <div class="col-md-4">

                                        <span id="nama_error" class="text-danger"></span>

                                        <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                        <!-- <input type="text" disabled class="form-control" id="inNama"> -->
                                        <input type="text" readonly class="form-control" value="<?= $nama ?>" name="namas" id="namas">

                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Tanggal Masuk<span class="help"></span></label>
                                        <!-- <input type="text" id="inTglMasuk" disabled class="form-control"> -->
                                        <input type="text" readonly id="tanggal_masuk" name="tanggal_masuk" class="form-control" value="<?php
                                                                                                                                        setlocale(LC_ALL, 'id_ID');

                                                                                                                                        date_default_timezone_set('Asia/Jakarta');
                                                                                                                                        $time = strtotime($tgl_masuk);
                                                                                                                                        $date = strftime(" %d %B %Y ", $time);
                                                                                                                                        $jam = date(" H:i:s ", $time);
                                                                                                                                        echo $jam . '/' . $date ?>">
                                    </div>

                                    <div class="col-md-4">

                                        <label class="control-label mb-10 text-left">DPJP 1:</label>
                                        <span id="dpjp2_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <select class="select2 form-control" id="dpjp1" name="dpjp1">
                                                <option value="">-</option>
                                                <?php foreach ($dokter as $row) : ?>
                                                    <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4"><br>
                                            <label class="control-label mb-10 text-left">Tanggal Lahir:</label>
                                            <span id="tgl_lahir_error" class="text-danger"></span>
                                            <label class="control-label mb-10 text-left"><span class="help"></span></label>
                                            <!-- <input type="text" disabled class="form-control" id="inTglLahir"> -->
                                            <input type="text" class="form-control" readonly id="tanggal_lahir" name="tanggal_lahir" value="<?= date('d-m-Y', strtotime($tgl_lahir)) ?>">
                                            <span class="help-block"></span>


                                        </div>
                                        <div class="col-md-4"><br>
                                            <label class="control-label mb-10 text-left">Tanggal Keluar:</label>
                                            <span id="tgl_keluar_error" class="text-danger"></span>
                                            <div class="has-success">
                                                <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>


                                        <!-- Formulir 1 -->


                                        <div class="col-md-4">
                                            <br>
                                            <label class="control-label mb-10 text-left">DPJP 2:</label>
                                            <span id="dpjp2_error" class="text-danger"></span>
                                            <div class="has-success">
                                                <select class="select2 form-control" id="dpjp2" name="dpjp2">
                                                    <option value="">-</option>
                                                    <?php foreach ($dokter as $row) : ?>
                                                        <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4"><br>

                                                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                                                <input type="text" readonly class="form-control" value="<?= $no_rm ?>" id="no_rm" name="no_rm">


                                            </div>
                                            <div class="col-md-4"><br>
                                                <label class="control-label mb-10 text-left">Ruang Rawat:</label>
                                                <span id="ruang_rawat_error" class="text-danger"></span>
                                                <div class="has-success">
                                                    <input type="text" id="ruang_rawat" name="ruang_rawat" readonly class="form-control" value="<?= $nama_ruangan ?>">
                                                </div>
                                            </div>




                                            <!-- Formulir 2 -->
                                            <div class="col-md-4">
                                                <br>
                                                <label class="control-label mb-10 text-left">DPJP 3:</label>
                                                <span id="dpjp2_error" class="text-danger"></span>
                                                <div class="has-success">
                                                    <select class="select2 form-control" id="dpjp3" name="dpjp3">
                                                        <option value="">-</option>
                                                        <?php foreach ($dokter as $row) : ?>
                                                            <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- ... Form lainnya ... -->



                                    </div>
                                </div>



                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Jenis Kelamin:</label>
                                    <span id="jenis_kelamin_error" class="text-danger"></span>

                                    <!-- <input type="text" disabled class="form-control" id="inJk"> -->
                                    <input type="text" readonly class="form-control" value="<?= $jenis_kelamin ?>" name="kelamin" id="kelamin">
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Kelas:</label>
                                    <span id="kelas_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="text" id="kelas" name="kelas" value="<?= $kelas ?>" readonly class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <label class="control-label mb-10 text-left">DPJP 4:</label>
                                    <span id="dpjp2_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <select class="select2 form-control" id="dpjp4" name="dpjp4">
                                            <option value="">-</option>
                                            <?php foreach ($dokter as $row) : ?>
                                                <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                </div>



                                <!-- ... Form lainnya ... -->





                                <!-- Lanjutkan dengan form input untuk Nomor RM, Ruang Rawat, DPJP 3, Jenis Kelamin, Kelas, dan DPJP 4 sesuai dengan pola yang sama -->

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>


                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label class="control-label mb-10 text-left" id="title2">&nbsp;&nbsp;&nbsp; Riwayat Alergi :</label>
                                        <span id="alergi_error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="radio-button radio-button-primary">
                                            <input id="riwayat_alergi" name="riwayat_alergi" type="radio" value="Ya">
                                            <label class="control-label" id="labelya" for="ya1">
                                                Ya
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="radio-button radio-button-primary">
                                            <input id="riwayat_alergi" name="riwayat_alergi" type="radio" value="Tidak">
                                            <label class="control-label" id="labeltidak" for="tidak1">
                                                Tidak
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <!-- <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label mb-10 text-left">Jenis Persalinan<span class="help"></span></label>
                                <span id="diagnosis_error" class="text-danger"></span>
                                <div class="has-success" onchange="pilihPersalinan()">
                                <select class="form-control filled-input select2" id="inPersalinan" name="inPersalinan">
                                                            <option value="">Jenis Persalinan</option>
                                                            <option value="Pervagina">Pervagina</option>
                                                            <option value="Caesaria">Sectio Caesaria</option>    
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div> -->
                                <div class="form-group ">

                                    <div class="col-md-12">

                                        <label class="control-label mb-10 text-left">Keterangan: <span class="help"></span></label>
                                        <span id="keterangan_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" id="keterangan" name="keterangan" style="height: 40px;" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <br>
                                        <label class="control-label mb-10 text-left">Alasan indikasi masuk: <span class="help"></span></label>
                                        <span id="keterangan_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" id="alasan_indikasi_masuk" name="alasan_indikasi_masuk" style="height: 40px;" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-6">
                                        <label class="control-label mb-10 text-left"><b>Keluhan Utama:<b /><span class="help"></span></label>
                                        <span id="keluhan_error" class="text-danger"></span>
                                        <div class="has-success">
                                        
                                        </div> -->

                                    <div class="col-md-12">
                                        <br>
                                        <label class="control-label mb-10 text-left">Riwayat Singkat Dan Pemeriksaan Fisik: <span class="help"></span></label>
                                        <span id="riwayat_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" name="riwayat_singkat_fisik" style="height: 80px;" id="riwayat_singkat_fisik" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-md-12">
                                            <br>
                                            <label class="control-label mb-10 text-left" id="title2">Pemeriksaan Penunjang Diagnostik:</label>
                                            <span id="alergi_error" class="text-danger"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="pemeriksaan_penunjang_diagnostik" type="radio" name="pemeriksaan_penunjang_diagnostik" value="Radiologi">
                                                <label class="control-label" id="labelradiologi" for="radiologi">
                                                    Radiologi
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="pemeriksaan_penunjang_diagnostik" type="radio" name="pemeriksaan_penunjang_diagnostik" value="Laboratorium">
                                                <label class="control-label" id="labellaboratorium" for="laboratorium">
                                                    Laboratorium
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="pemeriksaan_penunjang_diagnostik" type="radio" name="pemeriksaan_penunjang_diagnostik" value="Lain-lain">
                                                <label class="control-label" id="labellainlain" for="lainlain">
                                                    Lain-lain
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-md-12"><br>
                                                <label class="control-label mb-10 text-left">Diagnosa Saat Masuk: <span class="help"></span></label>
                                                <span id="masuk_error" class="text-danger"></span>
                                                <div class="has-success">
                                                    <textarea class="form-control" name="diagnosa_masuk" readonly style="height: 40px;" id="diagnosa_masuk" re cols="30" rows="4"><?= $pasien->diagnosa ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <br>
                                                <label class="control-label mb-10 text-left">Diagnosa Saat Keluar: <span class="help"></span></label>
                                                <span id="keluar_error" class="text-danger"></span>
                                                <div class="has-success">
                                                    <textarea class="form-control" name="diagnosa_keluar" style="height: 40px;" id="diagnosa_keluar" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <br>
                                                <label class="control-label mb-10 text-left">Prosedur Pembedahan/Tindakan: <span class="help"></span></label>
                                                <span id="pembedahan_error" class="text-danger"></span>
                                                <div class="has-success">
                                                    <textarea class="form-control" name="prosedur_pembedahan_tindakan" style="height: 80px;" id="prosedur_pembedahan_tindakan" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-6"><br>
                                            <label class="control-label mb-10 text-left" style="font-weight: bold;">Ringkasan Keluar: <span class="help"></span></label>
                                            <br>
                                            <label class="control-label mb-15 text-left">Keadaan waktu pulang: <span class="help"></span></label>
                                            <div class="form-group">
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="keadaan_waktu_pulang" type="radio" name="keadaan_waktu_pulang" value="sembuh">
                                                        <label class="control-label" for="sembuh">
                                                            Sembuh
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="keadaan_waktu_pulang" type="radio" name="keadaan_waktu_pulang" value="belumsembuh">
                                                        <label class="control-label" for="belumsembuh">
                                                            Belum sembuh
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="keadaan_waktu_pulang" type="radio" name="keadaan_waktu_pulang" value="perbaikan">
                                                        <label class="control-label" for="perbaikan">
                                                            Perbaikan
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="keadaan_waktu_pulang" type="radio" name="keadaan_waktu_pulang" value="meninggal">
                                                        <label class="control-label" for="meninggal">
                                                            Meninggal
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6"><br>
                                            <label class="control-label mb-10 text-left" style="font-weight: bold;">Kesadaran <span class="help"></span></label>
                                            <br>
                                            <label class="control-label mb-15 text-left">TTV: <span class="help"></span></label>
                                            <div class="form-group">
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="kesadaran" type="radio" name="kesadaran" value="td">
                                                        <label class="control-label" for="td">
                                                            TD
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="kesadaran" type="radio" name="kesadaran" value="temp">
                                                        <label class="control-label" for="temp">
                                                            TEMP
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="kesadaran" type="radio" name="kesadaran" value="rr">
                                                        <label class="control-label" for="rr">
                                                            RR
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="kesadaran" type="radio" name="kesadaran" value="hr">
                                                        <label class="control-label" for="hr">
                                                            HR
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="kesadaran" type="radio" name="kesadaran" value="sp02">
                                                        <label class="control-label" for="sp02">
                                                            SP02
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12"><br>
                                            <label class="control-label mb-10 text-left" style="font-weight: bold;">Alasan Pulang: <span class="help"></span></label>
                                            <br>

                                            <div class="form-group">
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="alasan_pulang" type="radio" name="alasan_pulang" value="persetujuan">
                                                        <label class="control-label" id="labelpersetujuan" for="persetujuan">
                                                            Dengan Persetujuan Dokter
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="alasan_pulang" type="radio" name="alasan_pulang" value="sendiri">
                                                        <label class="control-label" id="labelsendiri" for="sendiri">
                                                            Atas Permintaan Sendiri
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="radio-button radio-button-primary">
                                                        <input id="alasan_pulang" type="radio" name="alasan_pulang" value="dirujuk">
                                                        <label class="control-label" id="labeldirujuk" for="dirujuk">
                                                            Dirujuk
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-6"><br>
                                        <label class="control-label mb-10 text-left">Hari/Tanggal Kontrol ke RS:</label>
                                        <span id="tanggal_keluar_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="date" class="form-control" id="tanggal_keluar_rs" name="tanggal_keluar_rs" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6"><br>
                                        <label class="control-label mb-10 text-left">Poliklinik:</label>
                                        <span id="poliklinik_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <select class="select2 form-control" id="poliklinik" name="poliklinik">
                                                <option value="">-</option>
                                                <?php foreach ($poli as $row) : ?>
                                                    <option value="<?= $row['nama_panjang']; ?>"><?= $row['nama_panjang']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>



                                    <div class="form-group">

                                        <div class="col-md-6"><br>
                                            <label style="font-weight: bold" class="control-label mb-1 text-left">Edukasi yang telah diberikan:</label>
                                            <br><br>
                                            <label class="control-label mb-10 text-left">Selama Di Rumah Sakit:</label>
                                            <span id="selama_rs_error" class="text-danger"></span>
                                            <div class="has-success">
                                                <textarea class="form-control" rows="5" name="selama_dirumah_sakit" id="selama_dirumah_sakit"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6"><br><br><br> <label class="control-label mb-1 text-left"></label>
                                            <label class="control-label mb-10 text-left">Selama Di Rumah:</label>
                                            <span id="selama_rumah_error" class="text-danger"></span>
                                            <div class="has-success">
                                                <textarea class="form-control" rows="5" id="selama_dirumah" name="selama_dirumah"></textarea>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="col-md-4">

                                        <br />
                                        <div class="row">

                                            <button class="btn btn-default" style="display: none;" id="sig-clearBtn"></button>
                                            <canvas id="can" width="300" height="300" style="display: none;"></canvas>
                                            <div class="form-group">
                                                <div class="modal fade" id="modal_ttd" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <button type="button" style="display: none;" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="form-group row" style="margin-left: 30px;">

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <canvas id="ttd" width="300" height="300">
                                                                            </canvas>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <button class="btn btn-primary" style="display: none;" id="sig-submitBtn">Submit Signature</button>
                                                                            <button class="btn btn-default" style="display: none;" id="sig-clearBtn3"></button>
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
                                <div class="col-md-4">

                                    <br />
                                    <div class="row">
                                        <button data-toggle="modal" aria-expanded="false" class="btn btn-primary btn-anim btn-sm" style="display: none;"></button>

                                        <button class="btn btn-default" style="display: none;" id="sig-clearBtn1"></button>
                                        <canvas id="can1" width="300" height="300" style="display: none;"></canvas>
                                        <div class="form-group">
                                            <div class="modal fade" id="modal_ttd1" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">

                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="false">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="form-group row" style="margin-left: 30px;">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <canvas id="ttd1" width="300" height="300">
                                                                        </canvas>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <button class="btn btn-primary" style="display: none;" id="sig-submitBtn1"></button>
                                                                        <button class="btn btn-default" style="display: none;" id="sig-clearBtn4"></button>
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
                                <div class="col-md-4">
                                    <label class="control-label"></label>
                                    <br />
                                    <div class="row">
                                        <button data-toggle="modal" disabled data-target="#modal_ttd2" aria-expanded="false" aria-controls="poli_sore" class="btn"></span></button>
                                        <button class="btn" style="display: none;" disabled id="sig-clearBtn2"></button>
                                        <canvas id="can2" width="300" height="300" style="display: none;"></canvas>
                                        <div class="form-group">
                                            <div class="modal fade" id="modal_ttd2" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">

                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="form-group row" style="margin-left: 30px;">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <canvas id="ttd2" width="300" height="300">
                                                                        </canvas>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <button class="btn btn-primary" id="sig-submitBtn2"></button>
                                                                        <button class="btn btn-default" style="color: #000000; display: none;" id="sig-clearBtn5"></button>
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

                                <div class="form-group">



                                    <div class="col-md-8">
                                        <button type="button" class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px;  margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                            <div class="col-md-6">
                                                <button type="submit" id="simpanButton" value="Simpan" class="btn btn-success mb-4">Simpan</button>
                                                <div class="col-md-6">
                                                    <a type="button" target="_blank" class="btn btn-primary mb-4" id="cetakPdf" href="<?= base_url('Erm_ranap_pdfcontroller/generate_pdf/' . $id_pelayanan . '') ?>">Cetak ke PDF</a>

                                                    <!-- <button type="button" target="_blank" class="btn btn-primary mb-4" id="cetakPdf">Cetak ke PDF</button> -->

                                                    <!-- ... (Form inputan lainnya) ... -->

                                                    <!-- <script>
                                                        document.getElementById("cetakPdf").addEventListener("click", function() {
                                                            window.location.href = "<?= site_url('Erm_ranap_pdfcontroller/generate_pdf') ?>";
                                                        });
                                                    </script> -->
                                                    <button type="submit" style="display: none;" id="simpan" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                                                    <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                                                    <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
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
            <script>
                // Menambahkan event click pada tombol "Simpan"
                document.getElementById('simpanButton').addEventListener('click', function(event) {
                    // Hentikan pengiriman formulir secara otomatis (default behavior)
                    event.preventDefault();

                    // Tampilkan SweetAlert2 untuk konfirmasi sebelum mengirimkan data
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: 'Anda yakin data sudah sesuai untuk disimpan?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Simpan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika pengguna mengklik "Ya, Simpan!", kirim data formulir dengan AJAX
                            $.ajax({
                                url: $("#formId").attr("action"), // Ambil URL dari atribut 'action' formulir
                                type: $("#formId").attr("method"), // Ambil metode HTTP dari atribut 'method' formulir
                                data: $("#formId").serialize(), // Ambil data formulir yang akan dikirim
                                success: function(response) {
                                    // Setelah data berhasil diinput, tampilkan pesan sukses
                                    Swal.fire({
                                        title: 'Good job!',
                                        text: 'Data berhasil disimpan.',
                                        icon: 'success',
                                        confirmButtonColor: '#3cb878'
                                    });
                                }
                            });
                        }
                    });
                });
            </script>
            <script>
                // Menambahkan event click pada tombol "Simpan"
                document.getElementById('simpanButton').addEventListener('click', function(event) {
                    // Hentikan pengiriman formulir secara otomatis (default behavior)
                    event.preventDefault();

                    // Tampilkan SweetAlert2 untuk konfirmasi sebelum mengirimkan data
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: 'Anda yakin data sudah sesuai untuk disimpan?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Simpan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika pengguna mengklik "Ya, Simpan!", kirim data formulir dengan AJAX
                            $.ajax({
                                url: $("#formId").attr("action"), // Ambil URL dari atribut 'action' formulir
                                type: $("#formId").attr("method"), // Ambil metode HTTP dari atribut 'method' formulir
                                data: $("#formId").serialize(), // Ambil data formulir yang akan dikirim
                                success: function(response) {
                                    // Setelah data berhasil diinput, tampilkan pesan sukses
                                    Swal.fire({
                                        title: 'Good job!',
                                        text: 'Data berhasil disimpan.',
                                        icon: 'success',
                                        confirmButtonColor: '#3cb878'
                                    });
                                }
                            });
                        }
                    });
                });
            </script>


            <script type="text/javascript">
                $("#persalinan1").click(function() {
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
                $("#persalinan2").click(function() {
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
                    nama_ibu = $('#inIbu').val();
                    jam_lahir = $('#inJam').val();
                    jenis_persalinan = $('input[name="persalinan"]:checked').val();
                    pervagina = $('input[name="pervagina"]:checked').val();
                    sectio = $('input[name="caesaria"]:checked').val();
                    kontak = $('input[name="kontak"]:checked').val();
                    waktu_mulai = $('#jam_mulai').val();
                    waktu_selesai = $('#jam_selesai').val();
                    lama_kontak = $('#inKontak').val();
                    menyusui1 = $('#inMenyusui1').val();
                    menyusui2 = $('#inMenyusui2').val();
                    alasan = $('#inAlasan').val();
                    catatan = $('#inCatatan').val();
                    canvas = document.getElementById('can');
                    ttd = canvas.toDataURL("image/png");
                    canvas1 = document.getElementById('can1');
                    ttd1 = canvas1.toDataURL("image/png");

                    dataString = 'nama_ibu=' + nama_ibu + '&no_rm=' + no_rm + '&jam_lahir=' + jam_lahir + '&pervagina=' + pervagina + '&sectio=' + sectio + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
                        '&kontak=' + kontak + '&waktu_mulai=' + waktu_mulai + '&waktu_selesai=' + waktu_selesai + '&lama_kontak=' + lama_kontak + '&menyusui1=' + menyusui1 + '&menyusui2=' + menyusui2 + '&alasan=' + alasan + '&catatan=' + catatan +
                        '&ttd=' + ttd + '&ttd1=' + ttd1 + '&jenis_persalinan=' + jenis_persalinan;

                    $.ajax({
                        url: "<?php echo base_url() ?>Erm_ranap_imd/insert_imd_asi",
                        method: "POST",
                        dataType: 'json',
                        data: dataString,
                        success: function(data) {
                            if (data.status == "success") {
                                window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" + '<?= urlencode(base64_encode($id_pelayanan)) ?>' + '/' + '<?= urlencode(base64_encode($id_history)) ?>';
                            } else if (data.error) {
                                if (data.nama_ibu != '') {
                                    $('#ibu_error').html(data.nama_ibu);
                                } else {
                                    $('#ibu_error').html('');
                                }
                                if (data.jam_lahir != '') {
                                    $('#lahir_error').html(data.jam_lahir);
                                } else {
                                    $('#lahir_error').html('');
                                }
                                if (data.waktu_mulai != '') {
                                    $('#jam_mulai_error').html(data.waktu_mulai);
                                } else {
                                    $('#jam_mulai_error').html('');
                                }
                                if (data.waktu_selesai != '') {
                                    $('#jam_selesai_error').html(data.waktu_selesai);
                                } else {
                                    $('#jam_selesai_error').html('');
                                }
                                if (data.bayi_menyusui != '') {
                                    $('#menyusu1_error').html(data.bayi_menyusui);
                                } else {
                                    $('#menyusu1_error').html('');
                                }
                                if (data.lama_kontak != '') {
                                    $('#Lkontak_error').html(data.lama_kontak);
                                } else {
                                    $('#Lkontak_error').html('');
                                }
                                if (data.menolong != '') {
                                    $('#menyusu2_error').html(data.menolong);
                                } else {
                                    $('#menyusu2_error').html('');
                                }
                                if (data.catatan != '') {
                                    $('#catatan_error').html(data.catatan);
                                } else {
                                    $('#catatan_error').html('');
                                }
                                if (data.alasan != '') {
                                    $('#alasan_error').html(data.alasan);
                                } else {
                                    $('#alasan_error').html('');
                                }
                                if (jenis_persalinan == '' | jenis_persalinan == null) {
                                    $('#persalinan_error').html('*wajib diisi');
                                } else {
                                    $('#persalinan_error').html('');
                                }
                                if (kontak == '' | kontak == null) {
                                    $('#kontak_error').html('*wajib diisi');
                                } else {
                                    $('#kontak_error').html('');
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
                //   function hapus(id) { //utk hapus diagnosa pasien
                //     swal({
                //       title: "Warning?",
                //       text: "Apakah kamu yakin menghapus data ini?",
                //       type: "warning",
                //       showCancelButton: true,
                //       confirmButtonColor: "#3cb878",
                //       confirmButtonText: "Yakin",
                //       cancelButtonText: "Batal",
                //       closeOnConfirm: false
                //     }, function() {
                //       $().ready(function() {
                //         $.ajax({
                //           url: "<?php echo base_url() ?>Erm_penunjang_diagnostik/hapus_penunjang",
                //           method: "POST",
                //           dataType: 'json',
                //           data: {
                //             id: id,
                //           },
                //           success: function(data) {
                //             if (data.status == "success") {
                //               swal({
                //                 title: "good job!",
                //                 type: "success",
                //                 text: "Data Berhasil dihapus",
                //                 confirmButtonColor: "#3cb878",
                //               });
                //               $('#tabel_terapi').DataTable().ajax.reload();
                //             } else {
                //               swal({
                //                 title: "Gagal!",
                //                 type: "warning",
                //                 confirmButtonColor: "#3cb878",
                //               });
                //             }
                //           }
                //         });
                //       });
                //     });
                //     return false;
                //   }

                //   function reload_data_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
                //     $('#tabel_terapi').dataTable().fnClearTable();
                //     $('#tabel_terapi').dataTable().fnDestroy();
                //     $('#tabel_terapi').DataTable({
                //       "language": {
                //         "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                //         "sProcessing": "Sedang memproses...",
                //         "sLengthMenu": "Tampilkan _MENU_ entri",
                //         "sZeroRecords": "Tidak ditemukan data yang sesuai",
                //         "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                //         "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                //         "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                //         "sInfoPostFix": "",
                //         "sSearch": "Cari:",
                //         "sUrl": "",
                //         "oPaginate": {
                //           "sFirst": "Pertama",
                //           "sPrevious": "Sebelumnya",
                //           "sNext": "Selanjutnya",
                //           "sLast": "Terakhir",
                //         }
                //       },
                //       "ajax": {
                //         "url": '<?php echo base_url('Erm_penunjang_diagnostik/tampil_list_per_pen_rujukan'); ?>',
                //         "type": 'POST',
                //         "data": {
                //           id_pelayanan: id_pelayanan
                //         },
                //       },

                //       "deferRender": true,
                //       "processing": true,
                //       "order": [],
                //       "columnDefs": [{
                //         "targets": [0],
                //         "orderable": false,
                //       }, ],
                //     });
                //   }

                //   function pilih(id) {
                //     $('#id').val(id);
                //     $.ajax({
                //       url: "<?php echo base_url() ?>Erm_penunjang_diagnostik/getPerPenRujukan",
                //       method: "POST",
                //       dataType: 'json',
                //       data: {
                //         id: id
                //       },
                //       success: function(data) {
                //         if (data.status_dt == "found") {
                //           $('#inTgl').val(data.tanggal);
                //           $('#inPeriksa').val(data.periksa);
                //           $('#inDPJP').val(data.dpjp);
                //           $('#inKet').val(data.ket);
                //           $('#edit').show();
                //           $('#cetak').show();
                //           $('#simpan').hide();
                //           // smooth scroll
                //           window.scrollTo({
                //             top: 0,
                //             behavior: 'smooth'
                //           });
                //         } else {
                //           swal({
                //             title: "Gagal!",
                //             type: "warning",
                //             text: "Data Kosong",
                //             confirmButtonColor: "#3cb878",
                //           });
                //         }
                //       }

                //     });
                //     return false;

                //   }

                //   function edit() {
                //     var formData = new FormData($('#formUpload')[0]);
                //     $.ajax({
                //       url: '<?php echo base_url(); ?>Erm_penunjang_diagnostik/edit_penunjang',
                //       type: "POST",
                //       data: formData,
                //       processData: false,
                //       contentType: false,
                //       cache: false,
                //       dataType: 'JSON',
                //       success: function(data) {
                //         const success = data.status.success;
                //         const error = data.status.error;
                //         if (success > 0) {
                //           swal({
                //             title: "good job!",
                //             type: "success",
                //             text: "Data berhasil disimpan",
                //             confirmButtonColor: "#3cb878",
                //           });
                //           $("#file_input").val(null);
                //           $("#inDPJP").val('');
                //           $("#inKet").val('');
                //           $("#inPeriksa").val('');
                //           $("#inTgl").val('');
                //           $('#edit').hide();
                //           $('#cetak').hide();
                //           $('#simpan').show();
                //           $('#tabel_terapi').DataTable().ajax.reload();
                //         } else if (error > 0) {
                //           swal({
                //             title: "Gagal!",
                //             text: "Data tidak terkirim, mohon cek inputan Anda kembali",
                //             type: "warning",
                //             confirmButtonColor: "#3cb878",
                //           });
                //         }
                //       }
                //     });
                //   }

                //   function cetak() {
                //     id = $('#id').val();
                //     window.location.href = "<?php echo base_url('Erm_igd_edit/print_penunjang/') ?>" + id;
                //   }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
            </script>