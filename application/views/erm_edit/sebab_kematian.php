<<<<<<< HEAD
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Formulir Persetujuan Tindakan Kedokteran</h6>
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
                                        <p><br>Sebab Kematian I</p>
                                    </label>
                                </strong>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2">
                                        <p style="text-transform: lowercase;">(a)</p>Penyakit atau keadaan yang langsung<span class="help"></span>
                                    </label>
                                    <div class="col-md-5">
                                        <label class="control-label col-md-12">Penyakit tersebut dalam ruang a disebabkan oleh (atau akibat dari) : <span class="help"></span></label>
                                        <span id="sebab_a_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" name="" id="sebab_a" cols="30" rows="3"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label col-md-12">Lamanya (kira-kira) mulai sakit hingga meninggal dunia : <span class="help"></span></label>
                                        <span id="lama_a_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" name="" id="lama_a" cols="15" rows="3"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2">
                                        <p style="text-transform: lowercase;">(b,c)</p>Penyakit-penyakit (bila ada) yang menjadi lantaran timbulnya sebab kematian tersebut pada a. dengan menyebutkan yang menjadi pokok pangkal terakhir.<span class="help"></span>
                                    </label>
                                    <div class="col-md-5">
                                        <label class="control-label col-md-12">Penyakit tersebut dalam ruang b disebabkan oleh (atau akibat dari) : <span class="help"></span></label>
                                        <span id="sebab_b_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" name="" id="sebab_b" cols="30" rows="3"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label col-md-12">Lamanya (kira-kira) mulai sakit hingga meninggal dunia : <span class="help"></span></label>
                                        <span id="lama_b_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" name="" id="lama_b" cols="15" rows="3"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>Sebab Kematian II</p>
                                    </label>
                                </strong>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2">Penyakit-penyakit lain yang berarti dan mempengaruhi pula kematian itu, tetapi tidak ada hubungannya dengan penyakit-penyakit tersebut dalam I.a.b.c.<span class="help"></span>
                                    </label>
                                    <div class="col-md-5">
                                        <label class="control-label col-md-12">Penyakit tersebut disebabkan oleh (atau akibat dari) : <span class="help"></span></label>
                                        <span id="sebab_2_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" name="" id="sebab_2" cols="30" rows="3"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label col-md-12">Lamanya (kira-kira) mulai sakit hingga meninggal dunia : <span class="help"></span></label>
                                        <span id="lama_2_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" name="" id="lama_2" cols="15" rows="3"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>Keterangan khusus untuk :</p>
                                    </label>
                                </strong>
                                <h5 style="margin-top: 5px;"><strong>
                                        <label class="control-label mb-10 text-left"><b> 1. MATI KARENA RUPADAKSA (Violent Death) <b /><span class="help"></span></label>
                                    </strong>
                                </h5>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                a. Macam rudapaksa :
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="ruda_paksa1" type="radio" name="ruda_paksa" value="Bunuh Diri">
                                                <label class="control-label" for="ruda_paksa1">
                                                    Bunuh Diri
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="ruda_paksa2" type="radio" name="ruda_paksa" value=" Pembunuhan" onchange="sumScore()">
                                                <label class="control-label" for="ruda_paksa2">
                                                    Pembunuhan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="ruda_paksa3" type="radio" name="ruda_paksa" value="Kecelakaan" onchange="sumScore()">
                                                <label class="control-label" for="ruda_paksa3">
                                                    Kecelakaan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                b. Cara kejadian rudapaksa :
                                            </label>
                                        </div>
                                        <span id="cara_rudapaksa_error" class="text-danger"></span>
                                        <div class="col-md-4 has-success">
                                            <textarea class="form-control" cols="30" rows="3" id="cara_rudapaksa" name="penurunan_bb"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                c. Sifat jejas (kerusakan tubuh) :
                                            </label>
                                        </div>
                                        <span id="sifat_jejas_error" class="text-danger"></span>
                                        <div class="col-md-4 has-success">
                                            <textarea class="form-control" cols="30" rows="3" id="sifat_jejas" name="penurunan_bb"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <h5 style="margin-top: 5px;"><strong>
                                        <label class="control-label mb-10 text-left"><b> 2. KELAHIRAN MATI (Stillbirth) <b /><span class="help"></span></label>
                                    </strong>
                                </h5>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                a. Apakah ini janin lahir mati :
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="janin_mati_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="janin_mati1" type="radio" name="janin_mati" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="janin_mati1">
                                                    Ya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="janin_mati2" type="radio" name="janin_mati" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="janin_mati2">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                b. Sebab kelahiran mati :
                                            </label>
                                        </div>
                                        <span id="sebab_lahir_mati_error" class="text-danger"></span>
                                        <div class="col-md-4 has-success">
                                            <textarea class="form-control" cols="30" rows="3" id="sebab_lahir_mati" name="penurunan_bb"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <h5 style="margin-top: 5px;"><strong>
                                        <label class="control-label mb-10 text-left"><b> 3. PERSALINAN, KEHAMILAN <b /><span class="help"></span></label>
                                    </strong>
                                </h5>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                a. Apakah ini peristiwa persalinan :
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="persalinan_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="persalinan1" type="radio" name="persalinan" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="persalinan1">
                                                    Ya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="persalinan2" type="radio" name="persalinan" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="persalinan2">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                b. Apakah ini peristiwa kehamilan :
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="hamil_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="hamil1" type="radio" name="hamil" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="hamil1">
                                                    Ya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="hamil2" type="radio" name="hamil" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="hamil2">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 style="margin-top: 5px;"><strong>
                                        <label class="control-label mb-10 text-left"><b> 4. OPERASI <b /><span class="help"></span></label>
                                    </strong>
                                </h5>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                a. Apakah di sini dilakukan operasi :
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="operasi_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="operasi1" type="radio" name="operasi" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="operasi1">
                                                    Ya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="operasi2" type="radio" name="operasi" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="operasi2">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                b. Jenis Operasi :
                                            </label>
                                        </div>
                                        <span id="jenis_operasi_error" class="text-danger"></span>
                                        <div class="col-md-4 has-success">
                                            <textarea class="form-control" cols="30" rows="3" id="jenis_operasi" name="penurunan_bb"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label mb-10 text-left">
                                        Nama Terang :
                                    </label>
                                </div>
                                <span id="nama_terang_error" class="text-danger"></span>
                                <div class="col-md-4 has-success">
                                    <input type="text" class="form-control" id="nama_terang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--modal 1-->
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label">Yang memberi keterangan sebab kematian</label>
                            <div class="row">
                                <button data-toggle="modal" data-target="#modal_ttd" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
                                <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                                <canvas id="can" width="300" height="300" style="display: none;"></canvas>
                                <div class="form-group">
                                    <div class="modal fade" id="modal_ttd" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                                                                <button class="btn btn-default" id="sig-clearBtn1">Clear Signature</button>
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
<?php $this->load->view('assets/signature2') ?>
<style>
    canvas {
        cursor: crosshair;
        border: 1px solid #000000;
    }
</style>

<script type="text/javascript">
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

        id_pel = "<?php echo urlencode(base64_encode($id_pelayanan));?>";
    id_his = "<?php echo urlencode(base64_encode($id_history));?>";

        $.ajax({
            url: "<?php echo base_url() ?>Erm_sebab_kematian/insert_sebab_kematian",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;
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

    function reload_data_diagnosa(id_pelayanan) { //nampilinn diagnosa seluruhnya utk nambah ke diagnosa pasien
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
                "url": '<?php echo base_url('Assembling/tampil_listdata_diagnosa'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan
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
                "url": '<?php echo base_url('Assembling/tampil_list_diagnosa'); ?>',
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
                "url": '<?php echo base_url('erm_igd/tampil_list_diagnosa1'); ?>',
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

    function tambah_data_diagnosa(id_pelayanan, id_diagnosa, nama_diagnosa) { //utk nambah diagnosa pasien
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
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>erm_igd/tambah_data_diagnosa",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pelayanan: id_pelayanan,
                        id_diagnosa: id_diagnosa,
                        nama_diagnosa: nama_diagnosa,

                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Id diagnosa" + id_diagnosa + " Berhasil ditambah",
                                confirmButtonColor: "#3cb878",
                            });
                            reload_data_diagnosa_id_pel(id_pelayanan);
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
=======
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Formulir Persetujuan Tindakan Kedokteran</h6>
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
                                        <p><br>Sebab Kematian I</p>
                                    </label>
                                </strong>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2">
                                        <p style="text-transform: lowercase;">(a)</p>Penyakit atau keadaan yang langsung<span class="help"></span>
                                    </label>
                                    <div class="col-md-5">
                                        <label class="control-label col-md-12">Penyakit tersebut dalam ruang a disebabkan oleh (atau akibat dari) : <span class="help"></span></label>
                                        <span id="sebab_a_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" name="" id="sebab_a" cols="30" rows="3"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label col-md-12">Lamanya (kira-kira) mulai sakit hingga meninggal dunia : <span class="help"></span></label>
                                        <span id="lama_a_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" name="" id="lama_a" cols="15" rows="3"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2">
                                        <p style="text-transform: lowercase;">(b,c)</p>Penyakit-penyakit (bila ada) yang menjadi lantaran timbulnya sebab kematian tersebut pada a. dengan menyebutkan yang menjadi pokok pangkal terakhir.<span class="help"></span>
                                    </label>
                                    <div class="col-md-5">
                                        <label class="control-label col-md-12">Penyakit tersebut dalam ruang b disebabkan oleh (atau akibat dari) : <span class="help"></span></label>
                                        <span id="sebab_b_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" name="" id="sebab_b" cols="30" rows="3"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label col-md-12">Lamanya (kira-kira) mulai sakit hingga meninggal dunia : <span class="help"></span></label>
                                        <span id="lama_b_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" name="" id="lama_b" cols="15" rows="3"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>Sebab Kematian II</p>
                                    </label>
                                </strong>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2">Penyakit-penyakit lain yang berarti dan mempengaruhi pula kematian itu, tetapi tidak ada hubungannya dengan penyakit-penyakit tersebut dalam I.a.b.c.<span class="help"></span>
                                    </label>
                                    <div class="col-md-5">
                                        <label class="control-label col-md-12">Penyakit tersebut disebabkan oleh (atau akibat dari) : <span class="help"></span></label>
                                        <span id="sebab_2_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" name="" id="sebab_2" cols="30" rows="3"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label col-md-12">Lamanya (kira-kira) mulai sakit hingga meninggal dunia : <span class="help"></span></label>
                                        <span id="lama_2_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" name="" id="lama_2" cols="15" rows="3"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>Keterangan khusus untuk :</p>
                                    </label>
                                </strong>
                                <h5 style="margin-top: 5px;"><strong>
                                        <label class="control-label mb-10 text-left"><b> 1. MATI KARENA RUPADAKSA (Violent Death) <b /><span class="help"></span></label>
                                    </strong>
                                </h5>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                a. Macam rudapaksa :
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="ruda_paksa_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="ruda_paksa1" type="radio" name="ruda_paksa" value="Bunuh Diri">
                                                <label class="control-label" for="ruda_paksa1">
                                                    Bunuh Diri
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="ruda_paksa2" type="radio" name="ruda_paksa" value=" Pembunuhan" onchange="sumScore()">
                                                <label class="control-label" for="ruda_paksa2">
                                                    Pembunuhan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="ruda_paksa3" type="radio" name="ruda_paksa" value="Kecelakaan" onchange="sumScore()">
                                                <label class="control-label" for="ruda_paksa3">
                                                    Kecelakaan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                b. Cara kejadian rudapaksa :
                                            </label>
                                        </div>
                                        <span id="cara_rudapaksa_error" class="text-danger"></span>
                                        <div class="col-md-4 has-success">
                                            <textarea class="form-control" cols="30" rows="3" id="cara_rudapaksa" name="penurunan_bb"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                c. Sifat jejas (kerusakan tubuh) :
                                            </label>
                                        </div>
                                        <span id="sifat_jejas_error" class="text-danger"></span>
                                        <div class="col-md-4 has-success">
                                            <textarea class="form-control" cols="30" rows="3" id="sifat_jejas" name="penurunan_bb"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <h5 style="margin-top: 5px;"><strong>
                                        <label class="control-label mb-10 text-left"><b> 2. KELAHIRAN MATI (Stillbirth) <b /><span class="help"></span></label>
                                    </strong>
                                </h5>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                a. Apakah ini janin lahir mati :
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="janin_mati_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="janin_mati1" type="radio" name="janin_mati" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="janin_mati1">
                                                    Ya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="janin_mati2" type="radio" name="janin_mati" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="janin_mati2">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                b. Sebab kelahiran mati :
                                            </label>
                                        </div>
                                        <span id="sebab_lahir_mati_error" class="text-danger"></span>
                                        <div class="col-md-4 has-success">
                                            <textarea class="form-control" cols="30" rows="3" id="sebab_lahir_mati" name="penurunan_bb"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <h5 style="margin-top: 5px;"><strong>
                                        <label class="control-label mb-10 text-left"><b> 3. PERSALINAN, KEHAMILAN <b /><span class="help"></span></label>
                                    </strong>
                                </h5>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                a. Apakah ini peristiwa persalinan :
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="persalinan_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="persalinan1" type="radio" name="persalinan" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="persalinan1">
                                                    Ya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="persalinan2" type="radio" name="persalinan" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="persalinan2">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                b. Apakah ini peristiwa kehamilan :
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="hamil_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="hamil1" type="radio" name="hamil" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="hamil1">
                                                    Ya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="hamil2" type="radio" name="hamil" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="hamil2">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 style="margin-top: 5px;"><strong>
                                        <label class="control-label mb-10 text-left"><b> 4. OPERASI <b /><span class="help"></span></label>
                                    </strong>
                                </h5>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                a. Apakah di sini dilakukan operasi :
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span id="operasi_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="operasi1" type="radio" name="operasi" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="operasi1">
                                                    Ya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="operasi2" type="radio" name="operasi" value="Tidak" onchange="sumScore()">
                                                <label class="control-label" for="operasi2">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label mb-10 text-left">
                                                b. Jenis Operasi :
                                            </label>
                                        </div>
                                        <span id="jenis_operasi_error" class="text-danger"></span>
                                        <div class="col-md-4 has-success">
                                            <textarea class="form-control" cols="30" rows="3" id="jenis_operasi" name="penurunan_bb"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="control-label mb-10 text-left">
                                        Nama Terang :
                                    </label>
                                </div>
                                <span id="nama_terang_error" class="text-danger"></span>
                                <div class="col-md-4 has-success">
                                    <input type="text" class="form-control" id="nama_terang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--modal 1-->
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label">Yang memberi keterangan sebab kematian</label>
                            <div class="row">
                                <button data-toggle="modal" data-target="#modal_ttd" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
                                <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                                <canvas id="can" width="300" height="300" style="display: none;"></canvas>
                                <div class="form-group">
                                    <div class="modal fade" id="modal_ttd" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                                                                <button class="btn btn-default" id="sig-clearBtn1">Clear Signature</button>
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
<?php $this->load->view('assets/signature2') ?>
<style>
    canvas {
        cursor: crosshair;
        border: 1px solid #000000;
    }
</style>

<script type="text/javascript">
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

        id_pel = "<?php echo urlencode(base64_encode($id_pelayanan));?>";
    id_his = "<?php echo urlencode(base64_encode($id_history));?>";

        $.ajax({
            url: "<?php echo base_url() ?>Erm_sebab_kematian/insert_sebab_kematian",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;
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

    function reload_data_diagnosa(id_pelayanan) { //nampilinn diagnosa seluruhnya utk nambah ke diagnosa pasien
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
                "url": '<?php echo base_url('Assembling/tampil_listdata_diagnosa'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan
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
                "url": '<?php echo base_url('Assembling/tampil_list_diagnosa'); ?>',
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
                "url": '<?php echo base_url('erm_igd/tampil_list_diagnosa1'); ?>',
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

    function tambah_data_diagnosa(id_pelayanan, id_diagnosa, nama_diagnosa) { //utk nambah diagnosa pasien
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
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>erm_igd/tambah_data_diagnosa",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pelayanan: id_pelayanan,
                        id_diagnosa: id_diagnosa,
                        nama_diagnosa: nama_diagnosa,

                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Id diagnosa" + id_diagnosa + " Berhasil ditambah",
                                confirmButtonColor: "#3cb878",
                            });
                            reload_data_diagnosa_id_pel(id_pelayanan);
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>