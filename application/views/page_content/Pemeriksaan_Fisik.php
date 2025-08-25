<div class="page_content">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h2 class="panel-title txt-dark"><strong>ANTROPOMETRI</strong></h2>
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
                                            <label class="control-label col-md-3 pt-5">Dokter General Check Up</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="dokter_periksa" placeholder="Cari...">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Berat Badan</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="berat_badan" oninput="hitungIMT()"
                                                    placeholder="Kg">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Tinggi Badan</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="tinggi_badan" oninput="hitungIMT()"
                                                    placeholder="Cm">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Lingkar Pinggang</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="lingkar_pinggang" oninput="hitungWHR()"
                                                    placeholder="Cm">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Lingkar Panggul</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="lingkar_panggul" oninput="hitungWHR()"
                                                    placeholder="Cm">
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">IMT</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="imt" disabled>
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">RPP</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="rpp" disabled>
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Vital Sign</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Suhu</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="suhu" placeholder="&deg;C">
                                                <span class="help-block"></span>
                                            </div>
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
                                <br>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Nafas</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Frekuensi:</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="pernapasan" placeholder="x/menit">
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
                                                            <input type="radio" value="Teratur" name="irama_nafas" id="irama_nafas1">
                                                            <label class="control-label" for="irama_nafas1">Teratur</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak Teratur" name="irama_nafas" id="irama_nafas2">
                                                            <label class="control-label" for="irama_nafas2">Tidak Teratur</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Tekanan darah</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Sistolik/Diastolik</label>
                                            <div class="col-md-4 has-success">
                                                <input type="text" class="form-control" id="sistol">

                                            </div>
                                            <div class="col-md-4 has-success">
                                                <input type="text" class="form-control" id="diastol">

                                            </div>
                                            <div class="col-md-1">
                                                <label class="control-label">mmHg</label>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Step Test (Harvard)</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Nadi I</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="nadi_1" oninput="hitungHSS()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Nadi II</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="nadi_2" oninput="hitungHSS()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Nadi III</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="nadi_3" oninput="hitungHSS()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Skor</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="skor_step" disabled>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <!-- <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Nafas</strong></b></h4> -->
                                <hr>
                                <div class="row mt-20">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Tes Kebugaran (Rockport Test):</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Dilakukan" name="tes_kebugaran" id="tes_kebugaran1">
                                                            <label class="control-label" for="tes_kebugaran1">Dilakukan</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak Dilakukan" name="tes_kebugaran" id="tes_kebugaran2" checked>
                                                            <label class="control-label" for="tes_kebugaran2">Tidak Dilakukan</label>
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
                                            <label class="control-label col-md-3 pt-5">Waktu Tempuh:</label>
                                            <div class="col-md-4 has-success">
                                                <input type="text" class="form-control" id="menit_tes_bugar" placeholder="menit">
                                            </div>
                                            <div class="col-md-5 has-success">
                                                <input type="text" class="form-control" id="detik_tes_bugar" placeholder="detik">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Nadi:</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="nadi_tes_bugar" placeholder="X/menit">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Vo2Max:</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="vo2max" placeholder="MI/Kg/Menit">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Kesimpulan:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Low Fit" name="kesimpulan_fit" id="kesimpulan_fit1">
                                                            <label class="control-label" for="kesimpulan_fit1">Low Fit</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Moderate Fit" name="kesimpulan_fit" id="kesimpulan_fit2">
                                                            <label class="control-label" for="kesimpulan_fit2">Moderate Fit</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="High Fit" name="kesimpulan_fit" id="kesimpulan_fit2">
                                                            <label class="control-label" for="kesimpulan_fit2">High Fit</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Angkle Brachial Index</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Tek. Systolic Lengan (AP)</label>
                                            <div class="col-md-4 has-success">
                                                <label class="control-label txt-dark">Kanan</label>
                                                <input type="text" class="form-control" id="ap_kanan" oninput="hitungABIkanan()">
                                            </div>
                                            <div class="col-md-4 has-success">
                                                <label class="control-label txt-dark">Kiri</label>
                                                <input type="text" class="form-control" id="ap_kiri" oninput="hitungABIkiri()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Tek. Systolic Dorsalic Padis (DP)</label>
                                            <div class="col-md-4 has-success">
                                                <label class="control-label txt-dark">Kanan</label>
                                                <input type="text" class="form-control" id="dp_kanan" oninput="hitungABIkanan()">
                                            </div>
                                            <div class="col-md-4 has-success">
                                                <label class="control-label txt-dark">Kiri</label>
                                                <input type="text" class="form-control" id="dp_kiri" oninput="hitungABIkiri()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Tek. Systolic Tibiolis Posterior (TP)</label>
                                            <div class="col-md-4 has-success">
                                                <label class="control-label txt-dark">Kanan</label>
                                                <input type="text" class="form-control" id="tp_kanan" oninput="hitungABIkanan()">
                                            </div>
                                            <div class="col-md-4 has-success">
                                                <label class="control-label txt-dark">Kiri</label>
                                                <input type="text" class="form-control" id="tp_kiri" oninput="hitungABIkiri()">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Skor</label>
                                            <div class="col-md-4 has-success">
                                                <label class="control-label txt-dark">Kanan</label>
                                                <input type="text" class="form-control" id="skor_angkle_kanan">
                                            </div>
                                            <div class="col-md-4 has-success">
                                                <label class="control-label txt-dark">Kiri</label>
                                                <input type="text" class="form-control" id="skor_angkle_kiri">
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Kesimpulan</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" rows="4" cols="50" placeholder="-" id="kesimpulan_umum"></textarea>

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
    });

    function hitungIMT() {
        berat = $('#berat_badan').val();
        tinggi = $('#tinggi_badan').val();
        // Pastikan tinggi dalam meter
        tinggi = tinggi / 100;

        // Hitung IMT
        const imt = berat / (tinggi * tinggi);

        // Bulatkan hasil ke dua desimal
        $('#imt').val(imt.toFixed(2));
    }

    function hitungWHR() {
        lingkarPinggang = $('#lingkar_pinggang').val();
        lingkarPanggul = $('#lingkar_panggul').val();
        // Hitung WHR
        const whr = lingkarPinggang / lingkarPanggul;

        // Bulatkan hasil ke dua desimal
        $('#rpp').val(whr.toFixed(2));
    }

    function hitungABIkanan() {
        dp_kanan = $('#dp_kanan').val();
        tp_kanan = $('#tp_kanan').val();
        ap_kanan = $('#ap_kanan').val();
        ap_kiri = $('#ap_kiri').val();
        const maks = Math.max(dp_kanan, tp_kanan);
        const maks1 = Math.max(ap_kanan, ap_kiri);
        // Hitung WHR
        const hasil = maks / maks1;
        if (hasil > 0.90) {
            ket = 'Normal';
        } else if (hasil <= 0.90 && hasil >= 0.71) {
            ket = 'Mild Obstruction';
        } else if (hasil <= 0.70 && hasil >= 0.41) {
            ket = 'Moderate Obstruction';
        } else if (hasil <= 0.40 && hasil >= 0.00) {
            ket = 'Severe Obstruction';
        }

        // Bulatkan hasil ke dua desimal
        $('#skor_angkle_kanan').val(hasil.toFixed(2) + ' (' + ket + ')');
    }

    function hitungABIkiri() {
        dp_kiri = $('#dp_kiri').val();
        tp_kiri = $('#tp_kiri').val();
        ap_kanan = $('#ap_kanan').val();
        ap_kiri = $('#ap_kiri').val();
        const maks = Math.max(dp_kiri, tp_kiri);
        const maks1 = Math.max(ap_kanan, ap_kiri);
        // Hitung WHR
        const hasil = maks / maks1;
        if (hasil > 0.90) {
            ket = 'Normal';
        } else if (hasil <= 0.90 && hasil >= 0.71) {
            ket = 'Mild Obstruction';
        } else if (hasil <= 0.70 && hasil >= 0.41) {
            ket = 'Moderate Obstruction';
        } else if (hasil <= 0.40 && hasil >= 0.00) {
            ket = 'Severe Obstruction';
        }
        // Bulatkan hasil ke dua desimal
        $('#skor_angkle_kiri').val(hasil.toFixed(2) + ' (' + ket + ')');
    }

    function hitungHSS() {
        jk = $('#inJK').val();
        nadi_1 = $('#nadi_1').val();
        nadi_2 = $('#nadi_2').val();
        nadi_3 = $('#nadi_3').val();
        const jumlah = Number(nadi_1) + Number(nadi_2) + Number(nadi_3);

        const hasil = (300 / (2 * jumlah)) * 100;
        if (jk == 'LAKI-LAKI') {
            if (hasil > 90) {
                ket = 'High Score';
            } else if (hasil <= 90 && hasil >= 80) {
                ket = 'Above Average';
            } else if (hasil <= 79 && hasil >= 61) {
                ket = 'Average';
            } else if (hasil <= 60 && hasil >= 55) {
                ket = 'Below Average';
            }else{
                ket = 'Low Score';
            }
        }else{
            if (hasil > 86) {
                ket = 'High Score';
            } else if (hasil <= 86 && hasil >= 76) {
                ket = 'Above Average';
            } else if (hasil <= 75 && hasil >= 61) {
                ket = 'Average';
            } else if (hasil <= 60 && hasil >= 50) {
                ket = 'Below Average';
            }else{
                ket = 'Low Score';
            }
        }
        // Bulatkan hasil ke dua desimal
        $('#skor_step').val(hasil.toFixed(2) + ' (' + ket + ')');
    }
</script>

<script type="text/javascript">
    function insertData() {

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
                    url: "<?php echo base_url() ?>Surat_mcu/simpan_pemeriksaan_fisik",
                    method: "POST",
                    dataType: "json",
                    data: {
                        id_mcu: $('#id_mcu').val(),
                        dokter_periksa: $('#dokter_periksa').val(),
                        berat_badan: $('#berat_badan').val(),
                        tinggi_badan: $('#tinggi_badan').val(),
                        lingkar_pinggang: $('#lingkar_pinggang').val(),
                        lingkar_panggul: $('#lingkar_panggul').val(),
                        imt: $('#imt').val(),
                        rpp: $('#rpp').val(),
                        suhu: $('#suhu').val(),
                        nadi: $('#nadi').val(),
                        irama: $('input[name="irama"]:checked').val(),
                        isi_nadi: $('input[name="isi_nadi"]:checked').val(),
                        pernapasan: $('#pernapasan').val(),
                        irama_nafas: $('input[name="irama_nafas"]:checked').val(),
                        sistol: $('#sistol').val(),
                        diastol: $('#diastol').val(),
                        nadi_1: $('#nadi_1').val(),
                        nadi_2: $('#nadi_2').val(),
                        nadi_3: $('#nadi_3').val(),
                        skor_step: $('#skor_step').val(),
                        tes_kebugaran: $('input[name="tes_kebugaran"]:checked').val(),
                        menit_tes_bugar: $('#menit_tes_bugar').val(),
                        detik_tes_bugar: $('#detik_tes_bugar').val(),
                        nadi_tes_bugar: $('#nadi_tes_bugar').val(),
                        vo2max: $('#vo2max').val(),
                        kesimpulan_fit: $('input[name="kesimpulan_fit"]:checked').val(),
                        ap_kanan: $('#ap_kanan').val(),
                        ap_kiri: $('#ap_kiri').val(),
                        dp_kanan: $('#dp_kanan').val(),
                        dp_kiri: $('#dp_kiri').val(),
                        tp_kanan: $('#tp_kanan').val(),
                        tp_kiri: $('#tp_kiri').val(),
                        skor_angkle_kanan: $('#skor_angkle_kanan').val(),
                        skor_angkle_kiri: $('#skor_angkle_kiri').val(),
                        kesimpulan: $('input[name="kesimpulan"]:checked').val(),
                        kesimpulan_umum: $('#kesimpulan_umum').val()

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
                table: 'antropometri',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('input[name="irama"][value="' + data.irama + '"]').prop("checked", true);
                    $('input[name="isi_nadi"][value="' + data.isi_nadi + '"]').prop("checked", true);
                    $('input[name="irama_nafas"][value="' + data.irama_nafas + '"]').prop("checked", true);
                    $('input[name="tes_kebugaran"][value="' + data.tes_kebugaran + '"]').prop("checked", true);
                    $('input[name="kesimpulan_fit"][value="' + data.kesimpulan_fit + '"]').prop("checked", true);

                    $('#dokter_periksa').val(data.dokter_periksa);
                    $('#berat_badan').val(data.berat_badan);
                    $('#tinggi_badan').val(data.tinggi_badan);
                    $('#lingkar_pinggang').val(data.lingkar_pinggang);
                    $('#lingkar_panggul').val(data.lingkar_panggul);
                    $('#imt').val(data.imt);
                    $('#rpp').val(data.rpp);
                    $('#suhu').val(data.suhu);
                    $('#nadi').val(data.nadi);
                    $('#pernapasan').val(data.pernapasan);
                    $('#sistol').val(data.sistol);
                    $('#diastol').val(data.diastol);
                    $('#nadi_1').val(data.nadi_1);
                    $('#nadi_2').val(data.nadi_2);
                    $('#nadi_3').val(data.nadi_3);
                    $('#skor_step').val(data.skor_step);
                    $('#menit_tes_bugar').val(data.menit_tes_bugar);
                    $('#detik_tes_bugar').val(data.detik_tes_bugar);
                    $('#nadi_tes_bugar').val(data.nadi_tes_bugar);
                    $('#vo2max').val(data.vo2max);
                    // Tekanan Systolic Lengan (AP)
                    $('#ap_kanan').val(data.ap_kanan);
                    $('#ap_kiri').val(data.ap_kiri);

                    // Tekanan Systolic Dorsalic Padis (DP)
                    $('#dp_kanan').val(data.dp_kanan);
                    $('#dp_kiri').val(data.dp_kiri);

                    // Tekanan Systolic Tibiolis Posterior (TP)
                    $('#tp_kanan').val(data.tp_kanan);
                    $('#tp_kiri').val(data.tp_kiri);

                    // Skor Angkle
                    $('#skor_angkle_kanan').val(data.skor_angkle_kanan);
                    $('#skor_angkle_kiri').val(data.skor_angkle_kiri);

                    // Kesimpulan Radio Button
                    $('input[name="kesimpulan"][value="' + data.kesimpulan + '"]').prop("checked", true);

                    // Kesimpulan Umum Textarea
                    $('#kesimpulan_umum').val(data.kesimpulan_umum);
                }
            }

        });
    });
</script>