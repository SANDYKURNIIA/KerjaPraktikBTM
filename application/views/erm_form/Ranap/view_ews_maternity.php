<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">EWS MATERNITY</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">

                <div class="panel-body">
                    <div class="form-wrap">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                                <!-- <input type="text" disabled class="form-control"id="inNoRM"> -->
                                <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                                <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                                <input type="hidden" class="form-control" id="id">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <!-- <input type="text" disabled class="form-control" id="inNama"> -->
                                <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Tgl Lahir / Umur<span
                                        class="help"></span></label>
                                <!-- <input type="text" disabled class="form-control" id="inTglLahir"> -->
                                <input type="text" disabled class="form-control" value="<?= $tgl_lahir ?>"
                                    id="inTglLahir">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                <!-- <input type="text" disabled class="form-control" id="inJk"> -->
                                <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>"
                                    id="inJk">
                            </div>
                        </div>

                        <div class="form-group" id="spirit">

                            <div class="col-md-12">
                                <h5 style="margin-top:30px;">
                                    <strong>
                                        <label class="control-label mb-10 text-left">
                                            <b>PANTAUAN HARIAN KESEHATAN PASIEN</b>
                                        </label>
                                    </strong>
                                </h5>
                            </div>

                            <!-- baris 1 -->
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Tingkat Kesadaran</label>
                                        <span id="kesadaran_error" class="text-danger"></span>

                                        <div class="radio-button radio-button-primary">
                                            <input id="kesadaran1" type="radio" name="kesadaran" value="0">
                                            <label class="control-label" for="kesadaran1">Sadar</label>
                                        </div>
                                        <div class="radio-button radio-button-primary">
                                            <input id="kesadaran2" type="radio" name="kesadaran" value="3">
                                            <label class="control-label" for="kesadaran2">V</label>
                                        </div>
                                        <div class="radio-button radio-button-primary">
                                            <input id="kesadaran3" type="radio" name="kesadaran" value="3">
                                            <label class="control-label" for="kesadaran3">P</label>
                                        </div>
                                        <div class="radio-button radio-button-primary">
                                            <input id="kesadaran4" type="radio" name="kesadaran" value="3">
                                            <label class="control-label" for="kesadaran4">U</label>
                                        </div>
                                    </div>

                                    <script>
                                        var currentKesadaranInputField = null;
                                        document.querySelectorAll('input[name="kesadaran"]').forEach(function (radio) {
                                            radio.addEventListener('change', function () {
                                                if (currentKesadaranInputField) {
                                                    currentKesadaranInputField.remove();
                                                    currentKesadaranInputField = null;
                                                }
                                            });
                                        });
                                    </script>

                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Tekanan Darah Sistolik</label>
                                        <span id="sistolik_error" class="text-danger"></span>

                                        <div class="radio-button radio-button-primary">
                                            <input id="sistolik1" type="radio" name="sistolik" value="3">
                                            <label class="control-label" for="sistolik1">
                                                &gt; 160
                                            </label>
                                        </div>
                                        <div class="radio-button radio-button-primary"><input id="sistolik2"
                                                type="radio" name="sistolik" value="0"><label class="control-label"
                                                for="sistolik2">150</label></div>
                                        <div class="radio-button radio-button-primary"><input id="sistolik3"
                                                type="radio" name="sistolik" value="0"><label class="control-label"
                                                for="sistolik3">140</label></div>
                                        <div class="radio-button radio-button-primary"><input id="sistolik4"
                                                type="radio" name="sistolik" value="0"><label class="control-label"
                                                for="sistolik4">130</label></div>
                                        <div class="radio-button radio-button-primary"><input id="sistolik5"
                                                type="radio" name="sistolik" value="0"><label class="control-label"
                                                for="sistolik5">120</label></div>
                                        <div class="radio-button radio-button-primary"><input id="sistolik6"
                                                type="radio" name="sistolik" value="0"><label class="control-label"
                                                for="sistolik6">110</label></div>
                                        <div class="radio-button radio-button-primary"><input id="sistolik7"
                                                type="radio" name="sistolik" value="1"><label class="control-label"
                                                for="sistolik7">100</label></div>
                                        <div class="radio-button radio-button-primary"><input id="sistolik8"
                                                type="radio" name="sistolik" value="2"><label class="control-label"
                                                for="sistolik8">90</label></div>
                                        <div class="radio-button radio-button-primary"><input id="sistolik9"
                                                type="radio" name="sistolik" value="3"><label class="control-label"
                                                for="sistolik9">&lt; 80</label></div>
                                    </div>

                                    <script>
                                        var currentSistolikInputField = null;
                                        document.querySelectorAll('input[name="sistolik"]').forEach(function (radio) {
                                            radio.addEventListener('change', function () {
                                                if (currentSistolikInputField) {
                                                    currentSistolikInputField.remove();
                                                    currentSistolikInputField = null;
                                                }
                                            });
                                        });
                                    </script>

                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Tekanan Darah Diastolik</label>
                                        <span id="diastolik_error" class="text-danger"></span>

                                        <div class="radio-button radio-button-primary"><input id="diastolik1"
                                                type="radio" name="diastolik" value="3"><label class="control-label"
                                                for="diastolik1">&gt; 110</label></div>
                                        <div class="radio-button radio-button-primary"><input id="diastolik2"
                                                type="radio" name="diastolik" value="2"><label class="control-label"
                                                for="diastolik2">100</label></div>
                                        <div class="radio-button radio-button-primary"><input id="diastolik3"
                                                type="radio" name="diastolik" value="1"><label class="control-label"
                                                for="diastolik3">90</label></div>
                                        <div class="radio-button radio-button-primary"><input id="diastolik4"
                                                type="radio" name="diastolik" value="0"><label class="control-label"
                                                for="diastolik4">80</label></div>
                                        <div class="radio-button radio-button-primary"><input id="diastolik5"
                                                type="radio" name="diastolik" value="0"><label class="control-label"
                                                for="diastolik5">70</label></div>
                                    </div>

                                    <script>
                                        var currentDiastolikInputField = null;
                                        document.querySelectorAll('input[name="diastolik"]').forEach(function (radio) {
                                            radio.addEventListener('change', function () {
                                                if (currentDiastolikInputField) {
                                                    currentDiastolikInputField.remove();
                                                    currentDiastolikInputField = null;
                                                }
                                            });
                                        });
                                    </script>

                                </div>
                            </div>

                            <!-- baris 2 -->
                            <div class="col-md-12" style="margin-top:25px;">
                                <div class="row">

                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Nadi</label>
                                        <span id="nadi_error" class="text-danger"></span>

                                        <div class="radio-button radio-button-primary"><input id="nadi1" type="radio"
                                                name="nadi" value="3"><label class="control-label" for="nadi1">&gt;
                                                130</label></div>
                                        <div class="radio-button radio-button-primary"><input id="nadi2" type="radio"
                                                name="nadi" value="2"><label class="control-label"
                                                for="nadi2">120</label></div>
                                        <div class="radio-button radio-button-primary"><input id="nadi3" type="radio"
                                                name="nadi" value="2"><label class="control-label"
                                                for="nadi3">110</label></div>
                                        <div class="radio-button radio-button-primary"><input id="nadi4" type="radio"
                                                name="nadi" value="1"><label class="control-label"
                                                for="nadi4">100</label></div>
                                        <div class="radio-button radio-button-primary"><input id="nadi5" type="radio"
                                                name="nadi" value="1"><label class="control-label"
                                                for="nadi5">90</label></div>
                                        <div class="radio-button radio-button-primary"><input id="nadi6" type="radio"
                                                name="nadi" value="0"><label class="control-label"
                                                for="nadi6">80</label></div>
                                        <div class="radio-button radio-button-primary"><input id="nadi7" type="radio"
                                                name="nadi" value="0"><label class="control-label"
                                                for="nadi7">70</label></div>
                                        <div class="radio-button radio-button-primary"><input id="nadi8" type="radio"
                                                name="nadi" value="0"><label class="control-label"
                                                for="nadi8">60</label></div>
                                        <div class="radio-button radio-button-primary"><input id="nadi9" type="radio"
                                                name="nadi" value="0"><label class="control-label"
                                                for="nadi9">50</label></div>
                                        <div class="radio-button radio-button-primary"><input id="nadi10" type="radio"
                                                name="nadi" value="1"><label class="control-label"
                                                for="nadi10">40</label></div>
                                        <div class="radio-button radio-button-primary"><input id="nadi11" type="radio"
                                                name="nadi" value="3"><label class="control-label"
                                                for="nadi11">30</label></div>
                                    </div>

                                    <script>
                                        var currentNadiInputField = null;
                                        document.querySelectorAll('input[name="nadi"]').forEach(function (radio) {
                                            radio.addEventListener('change', function () {
                                                if (currentNadiInputField) {
                                                    currentNadiInputField.remove();
                                                    currentNadiInputField = null;
                                                }
                                            });
                                        });
                                    </script>

                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Pernafasan</label>
                                        <span id="pernafasan_error" class="text-danger"></span>

                                        <div class="radio-button radio-button-primary"><input id="pernafasan1"
                                                type="radio" name="pernafasan" value="3"><label class="control-label"
                                                for="pernafasan1">&gt; 25</label></div>
                                        <div class="radio-button radio-button-primary"><input id="pernafasan2"
                                                type="radio" name="pernafasan" value="2"><label class="control-label"
                                                for="pernafasan2">21-24</label></div>
                                        <div class="radio-button radio-button-primary"><input id="pernafasan3"
                                                type="radio" name="pernafasan" value="0"><label class="control-label"
                                                for="pernafasan3">12-20</label></div>
                                        <div class="radio-button radio-button-primary"><input id="pernafasan4"
                                                type="radio" name="pernafasan" value="1"><label class="control-label"
                                                for="pernafasan4">9-11</label></div>
                                        <div class="radio-button radio-button-primary"><input id="pernafasan5"
                                                type="radio" name="pernafasan" value="2"><label class="control-label"
                                                for="pernafasan5">&lt; 8</label></div>
                                    </div>

                                    <script>
                                        var currentPernafasanInputField = null;
                                        document.querySelectorAll('input[name="pernafasan"]').forEach(function (radio) {
                                            radio.addEventListener('change', function () {
                                                if (currentPernafasanInputField) {
                                                    currentPernafasanInputField.remove();
                                                    currentPernafasanInputField = null;
                                                }
                                            });
                                        });
                                    </script>

                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Suhu</label>
                                        <span id="suhu_error" class="text-danger"></span>

                                        <div class="radio-button radio-button-primary"><input id="suhu1" type="radio"
                                                name="suhu" value="2"><label class="control-label" for="suhu1">&gt;
                                                39°</label></div>
                                        <div class="radio-button radio-button-primary"><input id="suhu2" type="radio"
                                                name="suhu" value="1"><label class="control-label"
                                                for="suhu2">38°</label></div>
                                        <div class="radio-button radio-button-primary"><input id="suhu3" type="radio"
                                                name="suhu" value="0"><label class="control-label"
                                                for="suhu3">37°</label></div>
                                        <div class="radio-button radio-button-primary"><input id="suhu4" type="radio"
                                                name="suhu" value="0"><label class="control-label"
                                                for="suhu4">36°</label></div>
                                        <div class="radio-button radio-button-primary"><input id="suhu5" type="radio"
                                                name="suhu" value="1"><label class="control-label" for="suhu5">&lt;
                                                35°</label></div>
                                    </div>

                                    <script>
                                        var currentSuhuInputField = null;
                                        document.querySelectorAll('input[name="suhu"]').forEach(function (radio) {
                                            radio.addEventListener('change', function () {
                                                if (currentSuhuInputField) {
                                                    currentSuhuInputField.remove();
                                                    currentSuhuInputField = null;
                                                }
                                            });
                                        });
                                    </script>

                                </div>
                            </div>

                        </div>

                        <!-- ================= BARIS LANJUTAN PANTAUAN ================= -->
                        <div class="col-md-12" style="margin-top:20px;">
                            <div class="row">

                                <div class="col-md-3">
                                    <label class="control-label mb-10 text-left">Oksigen</label>
                                    <span id="oksigen_error" class="text-danger"></span>

                                    <div class="radio-button radio-button-primary">
                                        <input id="oksigen1" type="radio" name="oksigen" value="2">
                                        <label class="control-label" for="oksigen1">Ya</label>
                                    </div>

                                    <div class="radio-button radio-button-primary">
                                        <input id="oksigen2" type="radio" name="oksigen" value="1">
                                        <label class="control-label" for="oksigen2">Tidak</label>
                                    </div>

                                    <span id="oksigen_detail_error" class="text-danger"></span>

                                    <script>
                                        var currentOksigenInputField = null;
                                        document.querySelectorAll('input[name="oksigen"]').forEach((radio) => {
                                            radio.addEventListener('change', function () {
                                                if (currentOksigenInputField) {
                                                    currentOksigenInputField.remove();
                                                    currentOksigenInputField = null;
                                                }
                                            });
                                        });
                                    </script>
                                </div>

                                <div class="col-md-3">
                                    <label class="control-label mb-10 text-left">Nyeri</label>
                                    <span id="nyeri_error" class="text-danger"></span>

                                    <div class="radio-button radio-button-primary">
                                        <input id="nyeri1" type="radio" name="nyeri" value="2">
                                        <label class="control-label" for="nyeri1">Abnormal</label>
                                    </div>

                                    <div class="radio-button radio-button-primary">
                                        <input id="nyeri2" type="radio" name="nyeri" value="1">
                                        <label class="control-label" for="nyeri2">Normal</label>
                                    </div>

                                    <span id="nyeri_detail_error" class="text-danger"></span>

                                    <script>
                                        var currentNyeriInputField = null;
                                        document.querySelectorAll('input[name="nyeri"]').forEach((radio) => {
                                            radio.addEventListener('change', function () {
                                                if (currentNyeriInputField) {
                                                    currentNyeriInputField.remove();
                                                    currentNyeriInputField = null;
                                                }
                                            });
                                        });
                                    </script>
                                </div>

                                <div class="col-md-3">
                                    <label class="control-label mb-10 text-left">Lokia</label>
                                    <span id="lokia_error" class="text-danger"></span>

                                    <div class="radio-button radio-button-primary">
                                        <input id="lokia1" type="radio" name="lokia" value="3">
                                        <label class="control-label" for="lokia1">Abnormal</label>
                                    </div>

                                    <div class="radio-button radio-button-primary">
                                        <input id="lokia2" type="radio" name="lokia" value="0">
                                        <label class="control-label" for="lokia2">Normal</label>
                                    </div>

                                    <span id="lokia_detail_error" class="text-danger"></span>

                                    <script>
                                        var currentLokiaInputField = null;
                                        document.querySelectorAll('input[name="lokia"]').forEach((radio) => {
                                            radio.addEventListener('change', function () {
                                                if (currentLokiaInputField) {
                                                    currentLokiaInputField.remove();
                                                    currentLokiaInputField = null;
                                                }
                                            });
                                        });
                                    </script>
                                </div>

                                <div class="col-md-3">
                                    <label class="control-label mb-10 text-left">Protein</label>
                                    <span id="protein_error" class="text-danger"></span>

                                    <div class="radio-button radio-button-primary">
                                        <input id="protein1" type="radio" name="protein" value="3">
                                        <label class="control-label" for="protein1">&gt;++</label>
                                    </div>

                                    <div class="radio-button radio-button-primary">
                                        <input id="protein2" type="radio" name="protein" value="2">
                                        <label class="control-label" for="protein2">+</label>
                                    </div>

                                    <span id="protein_detail_error" class="text-danger"></span>

                                    <script>
                                        var currentProteinInputField = null;
                                        document.querySelectorAll('input[name="protein"]').forEach((radio) => {
                                            radio.addEventListener('change', function () {
                                                if (currentProteinInputField) {
                                                    currentProteinInputField.remove();
                                                    currentProteinInputField = null;
                                                }
                                            });
                                        });
                                    </script>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top:40px;">
                            <div class="row">

                                <div class="form-group col-md-2">
                                    <label class="control-label mb-10 text-left">Total :</label>
                                    <span id="total_ews_error" class="text-danger"></span>
                                    <div>
                                        <input class="form-control" id="total_ews" name="total_ews" disabled>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <!-- ================= SPACER (SESUAI GRID) ================= -->
                                <div class="col-md-1"></div>

                                <div class="form-group col-md-3">
                                    <label class="control-label mb-10 text-left">Mulai Pukul:</label>
                                    <span id="pukul_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="time" class="form-control" id="inPukul" name="inPukul">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group col-md-12">
                                        <label class="control-label mb-6 text-left" style="opacity:0.75;">
                                            <strong>EWS MATERNITY:</strong>
                                        </label>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="control-label mb-6 text-left" style="opacity:0.75;">
                                                0 : <strong>Tidak Berisiko</strong>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-6 text-left" style="opacity:0.75;">
                                                1 - 4 : <strong>Resiko Rendah</strong>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-6 text-left" style="opacity:0.75;">
                                                5 - 6 : <strong>Resiko Sedang</strong>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-6 text-left" style="opacity:0.75;">
                                                &gt; 7 : <strong>Resiko Tinggi</strong>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <script>
                            document.getElementById("inPukul").style.display = "none";
                        </script>

                        <script>
                            window.onload = function () {
                                const now = new Date();
                                const hours = String(now.getHours()).padStart(2, '0');
                                const minutes = String(now.getMinutes()).padStart(2, '0');
                                document.getElementById("inPukul").value = `${hours}:${minutes}`;
                            };
                        </script>


                        <div class="col-md-3">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="col-md-3">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <!-- id staff -->
                        <input type="hidden" name="staff" value="<?= $id_staff ?>">


                        <div class="col-md-6">
                            <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)"
                                style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span
                                    class="btn-text">KEMBALI</span></a>
                            <button id="simpan" onclick="simpan()" type="submit"
                                class="btn btn-success mb-4">Simpan</button>

                            <!-- <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button> -->
                            <button style="display:none;" type="submit" class="btn btn-success mb-4"
                                onclick="cetak()">Cetak</button>
                        </div>
                    </div>
                </div>



                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">TABEL EWS</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table class="table table-hover display  pb-60" id="tabel_ews">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>PILIH</th>
                                                        <th>HAPUS</th>
                                                        <th>TANGGAL</th>
                                                        <th>KESADARAN</th>
                                                        <th>TEKANAN DARAH SISTOLIK</th>
                                                        <th>TEKANAN DARAH DIASTOLIK</th>
                                                        <th>NADI</th>
                                                        <th>PERNAFASAN</th>
                                                        <th>SUHU</th>
                                                        <th>OKSIGEN</th>
                                                        <th>NYERI</th>
                                                        <th>LOKIA</th>
                                                        <th>PROTEIN</th>
                                                        <th>WAKTU</th>
                                                        <th>TOTAL EWS</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>PILIH</th>
                                                        <th>HAPUS</th>
                                                        <th>TANGGAL</th>
                                                        <th>KESADARAN</th>
                                                        <th>TEKANAN DARAH SISTOLIK</th>
                                                        <th>TEKANAN DARAH DIASTOLIK</th>
                                                        <th>NADI</th>
                                                        <th>PERNAFASAN</th>
                                                        <th>SUHU</th>
                                                        <th>OKSIGEN</th>
                                                        <th>NYERI</th>
                                                        <th>LOKIA</th>
                                                        <th>PROTEIN</th>
                                                        <th>WAKTU</th>
                                                        <th>TOTAL EWS</th>
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
            </div>
        </div>

        <!-- <script src="<?= base_url(); ?>assets/dist/js/slider.js">
                <link rel="stylesheet" href ="<?= base_url(); ?>assets/dist/css/range-slide.css"  />  -->

        <script type="text/javascript">
            function sumScore() {

                if ($('#kesadaran1').is(":checked")) {
                    score = 3;
                } else if ($('#kesadaran2').is(":checked")) {
                    score = 0;
                } else if ($('#kesadaran3').is(":checked")) {
                    score = 0;
                } else if ($('#kesadaran4').is(":checked")) {
                    score = 0;
                }

                if ($('#sistolik1').is(":checked")) {
                    score1 = 3;
                } else if ($('#sistolik2').is(":checked")) {
                    score1 = 0;
                } else if ($('#sistolik3').is(":checked")) {
                    score1 = 0;
                } else if ($('#sistolik4').is(":checked")) {
                    score1 = 0;
                } else if ($('#sistolik5').is(":checked")) {
                    score1 = 0;
                } else if ($('#sistolik6').is(":checked")) {
                    score1 = 0;
                } else if ($('#sistolik7').is(":checked")) {
                    score1 = 1;
                } else if ($('#sistolik8').is(":checked")) {
                    score1 = 2;
                } else if ($('#sistolik9').is(":checked")) {
                    score1 = 3;
                }

                if ($('#diastolik1').is(":checked")) {
                    score1 = 3;
                } else if ($('#diastolik2').is(":checked")) {
                    score1 = 0;
                } else if ($('#diastolik3').is(":checked")) {
                    score1 = 0;
                } else if ($('#diastolik4').is(":checked")) {
                    score1 = 0;
                } else if ($('#diastolik5').is(":checked")) {
                    score1 = 0;
                }

                if ($('#nadi1').is(":checked")) {
                    score3 = 3;
                } else if ($('#nadi2').is(":checked")) {
                    score3 = 2;
                } else if ($('#nadi3').is(":checked")) {
                    score3 = 2;
                } else if ($('#nadi4').is(":checked")) {
                    score3 = 1;
                } else if ($('#nadi5').is(":checked")) {
                    score3 = 1;
                } else if ($('#nadi6').is(":checked")) {
                    score3 = 0;
                } else if ($('#nadi7').is(":checked")) {
                    score3 = 0;
                } else if ($('#nadi8').is(":checked")) {
                    score3 = 0;
                } else if ($('#nadi9').is(":checked")) {
                    score3 = 0;
                } else if ($('#nadi10').is(":checked")) {
                    score3 = 1;
                } else if ($('#nadi11').is(":checked")) {
                    score3 = 3;
                }

                if ($('#pernafasan1').is(":checked")) {
                    score1 = 3;
                } else if ($('#pernafasan2').is(":checked")) {
                    score1 = 2;
                } else if ($('#pernafasan3').is(":checked")) {
                    score1 = 0;
                } else if ($('#pernafasan4').is(":checked")) {
                    score1 = 1;
                } else if ($('#pernafasan5').is(":checked")) {
                    score1 = 2;
                }

                if ($('#suhu1').is(":checked")) {
                    score4 = 2;
                } else if ($('#suhu2').is(":checked")) {
                    score4 = 1;
                } else if ($('#suhu3').is(":checked")) {
                    score4 = 0;
                } else if ($('#suhu4').is(":checked")) {
                    score4 = 0;
                } else if ($('#suhu5').is(":checked")) {
                    score4 = 1;
                }

                if ($('#oksigen1').is(":checked")) {
                    score2 = 3;
                } else if ($('#oksigen2').is(":checked")) {
                    score2 = 2;
                }

                if ($('#nyeri1').is(":checked")) {
                    score2 = 3;
                } else if ($('#nyeri2').is(":checked")) {
                    score2 = 2;
                }

                if ($('#lokia1').is(":checked")) {
                    score2 = 3;
                } else if ($('#lokia2').is(":checked")) {
                    score2 = 2;
                }

                if ($('#protein1').is(":checked")) {
                    score2 = 3;
                } else if ($('#protein2').is(":checked")) {
                    score2 = 2;
                }


                sum = Number(score) + Number(score1) + Number(score2) + Number(score3) + Number(score4); //+Number(score6);
                console.log(sum);
                total = $('#total_ews').val(sum);
            }
            document.addEventListener('DOMContentLoaded', function () {
                const radioGroups = ['kesadaran', 'sistolik', 'diastolik', 'nadi', 'pernafasan', 'suhu', 'oksigen', 'nyeri', 'lokia', 'protein'];

                radioGroups.forEach(group => {
                    const radios = document.querySelectorAll(`input[name="${group}"]`);
                    radios.forEach(radio => {
                        radio.addEventListener('change', calculateEwsScore);
                    });
                });

                function calculateEwsScore() {
                    let totalScore = 0;

                    radioGroups.forEach(group => {
                        const selectedRadio = document.querySelector(`input[name="${group}"]:checked`);
                        if (selectedRadio) {
                            totalScore += parseInt(selectedRadio.value);
                        }
                    });

                    document.getElementById('total_ews').value = totalScore;
                }
            });
        </script>

        <script type="text/javascript">
            function simpan() {
                id_pelayanan = $('#inPel').val();
                id_history = $('#inHis').val();
                no_rm = $('#inNoRM').val();
                waktu = $('#inPukul').val();

                kesadaran = $('input[name="kesadaran"]:checked').val() || '';

                sistolik = $('input[name="sistolik"]:checked').val();

                diastolik = $('input[name="diastolik"]:checked').val();

                nadi = $('input[name="nadi"]:checked').val();

                pernafasan = $('input[name="pernafasan"]:checked').val();

                suhu = $('input[name="suhu"]:checked').val();

                oksigen = $('input[name="oksigen"]:checked').val();

                nyeri = $('input[name="nyeri"]:checked').val();

                lokia = $('input[name="lokia"]:checked').val();

                protein = $('input[name="protein"]:checked').val();

                total_ews = $('input[name="total_ews"]').val();
                total_score = $('#inTotal').val();

                dataString =
                    '&no_rm=' + no_rm +

                    '&kesadaran=' + kesadaran +

                    '&sistolik=' + sistolik +

                    '&diastolik=' + diastolik +

                    '&nadi=' + nadi +

                    '&pernafasan=' + pernafasan +

                    '&suhu=' + suhu +

                    '&oksigen=' + oksigen +

                    '&nyeri=' + nyeri +

                    '&lokia=' + lokia +

                    '&protein=' + protein +

                    '&total_ews=' + total_ews +
                    '&waktu=' + waktu +
                    '&id_pelayanan=' + id_pelayanan +
                    '&id_history=' + id_history;

                console.log(dataString)

                let isValid = true;

                //kesadaran
                if (!kesadaran) {
                    $('#kesadaran_error').html('*wajib diisi');
                    $('#kesadaran1').focus();
                    isValid = false;
                } else {
                    $('#kesadaran_error').html('');
                }

                //sistolik
                if (!sistolik) {
                    $('#sistolik_error').html('*wajib diisi');
                    $('#sistolik1').focus();
                    isValid = false;
                } else {
                    $('#sistolik_error').html('');
                }

                //diastolik
                if (!diastolik) {
                    $('#diastolik_error').html('*wajib diisi');
                    $('#diastolik1').focus();
                    isValid = false;
                } else {
                    $('#diastolik_error').html('');
                }

                //nadi
                if (!nadi) {
                    $('#nadi_error').html('*wajib diisi');
                    $('#nadi1').focus();
                    isValid = false;
                } else {
                    $('#nadi_error').html('');
                }

                //pernafasan
                if (!pernafasan && isValid) {
                    $('#pernafasan_error').html('*wajib diisi');
                    $('#pernafasan1').focus();
                    isValid = false;
                } else {
                    $('#pernafasan_error').html('');
                }

                //suhu
                if (!suhu && isValid) {
                    $('#suhu_error').html('*wajib diisi');
                    $('#suhu1').focus();
                    isValid = false;
                } else {
                    $('#suhu_error').html('');
                }

                //oksigen
                if (!oksigen && isValid) {
                    $('#oksigen_error').html('*wajib diisi');
                    $('#oksigen1').focus();
                    isValid = false;
                } else {
                    $('#oksigen_error').html('');
                }

                //nyeri
                if (!nyeri && isValid) {
                    $('#nyeri_error').html('*wajib diisi');
                    $('#nyeri1').focus();
                    isValid = false;
                } else {
                    $('#nyeri_error').html('');
                }

                //lokia
                if (!lokia && isValid) {
                    $('#lokia_error').html('*wajib diisi');
                    $('#lokia1').focus();
                    isValid = false;
                } else {
                    $('#lokia_error').html('');
                }

                //protein
                if (!protein && isValid) {
                    $('#protein_error').html('*wajib diisi');
                    $('#protein1').focus();
                    isValid = false;
                } else {
                    $('#protein_error').html('');
                }


                if (!isValid) {
                    return false;
                }


                $.ajax({
                    url: "<?php echo base_url() ?>Erm_ews_maternity/insert_ews_maternity",
                    method: "POST",
                    dataType: 'json',
                    data: dataString,
                    success: function (data) {
                        if (data.status == "success") {
                            window.location.href = "<?php echo base_url('Erm_ews_maternity/formewsmaternity/') ?>" + id_pelayanan + '/' + id_history;
                        } else if (data.error) {
                            if (kesadaran == "" || kesadaran == null) {
                                $('#kesadaran_error').html("*wajib diisi");
                            } else {
                                $('#kesadaran_error').html('');
                            }
                            if (sistolik == "" || sistolik == null) {
                                $('#sistolik_error').html("*wajib diisi");
                            } else {
                                $('#sistolik_error').html('');
                            }
                            if (diastolik == "" || diastolik == null) {
                                $('#diastolik_error').html("*wajib diisi");
                            } else {
                                $('#diastolik_error').html('');
                            }
                            if (nadi == "" || nadi == null) {
                                $('#nadi_error').html("*wajib diisi");
                            } else {
                                $('#nadi_error').html('');
                            }
                            if (pernafasan == "" || pernafasan == null) {
                                $('#pernafasan_error').html("*wajib diisi");
                            } else {
                                $('#pernafasan_error').html('');
                            }
                            if (suhu == "" || suhu == null) {
                                $('#suhu_error').html("*wajib diisi");
                            } else {
                                $('#suhu_error').html('');
                            }
                            if (oksigen == "" || oksigen == null) {
                                $('#oksigen_error').html("*wajib diisi");
                            } else {
                                $('#oksigen_error').html('');
                            }
                            if (nyeri == "" || nyeri == null) {
                                $('#nyeri_error').html("*wajib diisi");
                            } else {
                                $('#nyeri_error').html('');
                            }
                            if (lokia == "" || lokia == null) {
                                $('#lokia_error').html("*wajib diisi");
                            } else {
                                $('#lokia_error').html('');
                            }
                            if (protein == "" || protein == null) {
                                $('#protein_error').html("*wajib diisi");
                            } else {
                                $('#protein_error').html('');
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

            $(function () {
                $("#kesadaran1").click(function () {
                    if ($(this).is(":checked")) {
                        $("#kesadaran1").show();
                    }
                });
                $("#kesadaran2").click(function () {
                    if ($(this).is(":checked")) {
                        $("#kesadaran2").show();
                    }
                });
                $("#kesadaran3").click(function () {
                    if ($(this).is(":checked")) {
                        $("#kesadaran3").show();
                    }
                });
                $("#kesadaran4").click(function () {
                    if ($(this).is(":checked")) {
                        $("#kesadaran4").show();
                    }
                });
                $("#sistolik1").click(function () {
                    if ($(this).is(":checked")) {
                        $("#sistolik1").show();
                    }
                });
                $("#sistolik2").click(function () {
                    if ($(this).is(":checked")) {
                        $("#sistolik2").show();
                    }
                });
                $("#sistolik3").click(function () {
                    if ($(this).is(":checked")) {
                        $("#sistolik3").show();
                    }
                });
                $("#sistolik4").click(function () {
                    if ($(this).is(":checked")) {
                        $("#sistolik4").show();
                    }
                });
                $("#sistolik5").click(function () {
                    if ($(this).is(":checked")) {
                        $("#sistolik5").show();
                    }
                });
                $("#sistolik6").click(function () {
                    if ($(this).is(":checked")) {
                        $("#sistolik6").show();
                    }
                });
                $("#sistolik7").click(function () {
                    if ($(this).is(":checked")) {
                        $("#sistolik7").show();
                    }
                });
                $("#sistolik8").click(function () {
                    if ($(this).is(":checked")) {
                        $("#sistolik8").show();
                    }
                });
                $("#sistolik9").click(function () {
                    if ($(this).is(":checked")) {
                        $("#sistolik9").show();
                    }
                });
                $("#diastolik1").click(function () {
                    if ($(this).is(":checked")) {
                        $("#diastolik1").show();
                    }
                });
                $("#diastolik2").click(function () {
                    if ($(this).is(":checked")) {
                        $("#diastolik2").show();
                    }
                });
                $("#diastolik3").click(function () {
                    if ($(this).is(":checked")) {
                        $("#diastolik3").show();
                    }
                });
                $("#diastolik4").click(function () {
                    if ($(this).is(":checked")) {
                        $("#diastolik4").show();
                    }
                });
                $("#diastolik5").click(function () {
                    if ($(this).is(":checked")) {
                        $("#diastolik5").show();
                    }
                });
                $("#nadi1").click(function () {
                    if ($(this).is(":checked")) {
                        $("#nadi1").show();
                    }
                });
                $("#nadi2").click(function () {
                    if ($(this).is(":checked")) {
                        $("#nadi2").show();
                    }
                });
                $("#nadi3").click(function () {
                    if ($(this).is(":checked")) {
                        $("#nadi3").show();
                    }
                });
                $("#nadi4").click(function () {
                    if ($(this).is(":checked")) {
                        $("#nadi4").show();
                    }
                });
                $("#nadi5").click(function () {
                    if ($(this).is(":checked")) {
                        $("#nadi5").show();
                    }
                });
                $("#nadi6").click(function () {
                    if ($(this).is(":checked")) {
                        $("#nadi6").show();
                    }
                });
                $("#nadi7").click(function () {
                    if ($(this).is(":checked")) {
                        $("#nadi7").show();
                    }
                });
                $("#nadi8").click(function () {
                    if ($(this).is(":checked")) {
                        $("#nadi8").show();
                    }
                });
                $("#nadi9").click(function () {
                    if ($(this).is(":checked")) {
                        $("#nadi9").show();
                    }
                });
                $("#nadi10").click(function () {
                    if ($(this).is(":checked")) {
                        $("#nadi10").show();
                    }
                });
                $("#nadi11").click(function () {
                    if ($(this).is(":checked")) {
                        $("#nadi11").show();
                    }
                });
                $("#pernafasan1").click(function () {
                    if ($(this).is(":checked")) {
                        $("#pernafasan1").show();
                    }
                });
                $("#pernafasan2").click(function () {
                    if ($(this).is(":checked")) {
                        $("#pernafasan2").show();
                    }
                });
                $("#pernafasan3").click(function () {
                    if ($(this).is(":checked")) {
                        $("#pernafasan3").show();
                    }
                });
                $("#pernafasan4").click(function () {
                    if ($(this).is(":checked")) {
                        $("#pernafasan4").show();
                    }
                });
                $("#pernafasan5").click(function () {
                    if ($(this).is(":checked")) {
                        $("#pernafasan5").show();
                    }
                });
                $("#suhu1").click(function () {
                    if ($(this).is(":checked")) {
                        $("#suhu1").show();
                    }
                });
                $("#suhu2").click(function () {
                    if ($(this).is(":checked")) {
                        $("#suhu2").show();
                    }
                });
                $("#suhu3").click(function () {
                    if ($(this).is(":checked")) {
                        $("#suhu3").show();
                    }
                });
                $("#suhu4").click(function () {
                    if ($(this).is(":checked")) {
                        $("#suhu4").show();
                    }
                });
                $("#suhu5").click(function () {
                    if ($(this).is(":checked")) {
                        $("#suhu5").show();
                    }
                });
                $("#oksigen1").click(function () {
                    if ($(this).is(":checked")) {
                        $("#oksigen1").show();
                    }
                });
                $("#oksigen2").click(function () {
                    if ($(this).is(":checked")) {
                        $("#oksigen2").show();
                    }
                });
                $("#nyeri1").click(function () {
                    if ($(this).is(":checked")) {
                        $("#nyeri1").show();
                    }
                });
                $("#nyeri2").click(function () {
                    if ($(this).is(":checked")) {
                        $("#nyeri2").show();
                    }
                });
                $("#lokia1").click(function () {
                    if ($(this).is(":checked")) {
                        $("#lokia1").show();
                    }
                });
                $("#lokia2").click(function () {
                    if ($(this).is(":checked")) {
                        $("#lokia2").show();
                    }
                });
                $("#protein1").click(function () {
                    if ($(this).is(":checked")) {
                        $("#protein1").show();
                    }
                });
                $("#protein2").click(function () {
                    if ($(this).is(":checked")) {
                        $("#protein2").show();
                    }
                });
            });

            function pilih(id) {
                $('#id').val(id);
                $.ajax({
                    url: "<?php echo base_url() ?>Erm_ews_maternity/get_ews_maternity",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function (data) {

                        // ini belum sesui dgn yang ada di dalam database dan tag htmll seperti name, id 
                        if (data.status_dt == "found") {
                            $('#id').val(data.id_form);
                            $('#inTgl').val(data.tanggal);
                            $('#kesadaran_detail').val(data.kesadaran_detail);
                            $('#sistolik_detail').val(data.sistolik_detail);
                            $('#diastolik_detail').val(data.diastolik_detail);
                            $('#nadi_detail').val(data.nadi_detail);
                            $('#pernafasan_detail').val(data.pernafasan_detail);
                            $('#suhu_detail').val(data.suhu_detail);
                            $('#oksigen_detail').val(data.oksigen_detail);
                            $('#nyeri_detail').val(data.nyeri_detail);
                            $('#lokia_detail').val(data.lokia_detail);
                            $('#protein_detail').val(data.protein_detail);
                            $('#inPukul').val(data.waktu);
                            $('#edit').show();
                            // $('#cetak').show();
                            $('#simpan').hide();

                        } else {
                            swal({
                                title: "Gagal!",
                                type: "warning",
                                text: "Data Kosong",
                                confirmButtonColor: "#3cb878",
                            });
                        }
                    }

                });
                return false;

            }

            function hapus(id) { //utk hapus diagnosa pasien
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
                            url: "<?php echo base_url() ?>Erm_ews_maternity/hapus_ews_maternity",
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
                                    $('#tabel_infus').DataTable().ajax.reload();
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

            $(document).ready(function (e) {
                id_pelayanan = $('#inPel').val();
                reload_data_id_pel(id_pelayanan);
            });

            function reload_data_id_pel(id_pelayanan) {
                $('#tabel_ews').dataTable().fnClearTable();
                $('#tabel_ews').dataTable().fnDestroy();
                $('#tabel_ews').DataTable({
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
                        "url": '<?php echo base_url('Erm_ews_maternity/tampil_list_per_id'); ?>',
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
                    },],
                });
            }
        </script>