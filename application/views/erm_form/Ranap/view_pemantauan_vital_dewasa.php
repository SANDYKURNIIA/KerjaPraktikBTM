<<<<<<< HEAD
<style>
    /* Warna zona total EWS */
    .ews-merah {
        background-color: #e74c3c;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }

    .ews-oranye {
        background-color: #e67e22;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }

    .ews-kuning {
        background-color: #f1c40f;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }

    .ews-hijau {
        background-color: #B6F500;
        color: #000;
        font-weight: bold;
        text-align: center;
    }
</style>
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">PEMANTAUAN TANDA VITAL DEWASA / EWS MODIFIKASI</h6>
                </div>
                <div class="clearfix"></div>
            </div>

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
                            <input type="text" disabled class="form-control" value="<?= $tgl_lahir ?>" id="inTglLahir">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-md-3">
                            <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                            <!-- <input type="text" disabled class="form-control" id="inJk"> -->
                            <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk">
                        </div>
                    </div>



                    <!-- <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Ruang Rawat<span class="help"></span></label>
                <input type="text" class="form-control" id="inRawat">
              </div>
            </div> -->


                    <!-- 
                              --bagian ASESMEN AWAL KEPERAWATAN/KEBIDANAN
                            -->
                    <div class="form-group" id="spirit">
                        <div class="col-md-12">
                            <h5 style="margin-top: 30px;"><strong>
                                    <label class="control-label mb-10 text-left"><b>TANDA VITAL<b><span
                                                    class="help"></span></label>
                                </strong>
                            </h5>
                        </div>

                        <div class="col-md-4">
                            <label class="control-label mb-10 text-left">Tingkat Kesadaran</label>
                            <span id="kesadaran_error" class="text-danger"></span>

                            <!-- Radio buttons -->
                            <div class="radio-button radio-button-primary">
                                <input id="kesadaran1" type="radio" name="kesadaran" value="3">
                                <label class="control-label" for="kesadaran1">Tidak Respon</label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="kesadaran2" type="radio" name="kesadaran" value="2">
                                <label class="control-label" for="kesadaran2">Respon dengan nyeri</label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="kesadaran3" type="radio" name="kesadaran" value="1">
                                <label class="control-label" for="kesadaran3">Respon dengan suara</label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="kesadaran4" type="radio" name="kesadaran" value="0">
                                <label class="control-label" for="kesadaran4">CM</label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="kesadaran5" type="radio" name="kesadaran" value="1">
                                <label class="control-label" for="kesadaran5">Gelisah/Bingung</label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="kesadaran6" type="radio" name="kesadaran" value="2">
                                <label class="control-label" for="kesadaran6">Bingung</label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="kesadaran7" type="radio" name="kesadaran" value="3">
                                <label class="control-label" for="kesadaran7">Pengganti Kesadaran</label>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <span id="kesadaran_detail_error" class="text-danger"></span>

                        <script>
                            // Variable to store the currently displayed input field
                            var currentInputField = null;

                            // Function to handle showing/hiding the input field below the selected radio button
                            document.querySelectorAll('input[name="kesadaran"]').forEach((radio) => {
                                radio.addEventListener('change', function () {
                                    // Remove the current input field if it exists
                                    if (currentInputField) {
                                        currentInputField.remove();
                                    }

                                    // Create a new input field
                                    var inputField = document.createElement('input');
                                    inputField.type = 'text';
                                    inputField.name = 'kesadaran_detail';
                                    inputField.className = 'form-control';
                                    inputField.placeholder = 'Detail Kesadaran';
                                    inputField.style.marginTop = '8px';

                                    // Insert the input field directly after the current radio button's parent div
                                    this.parentNode.appendChild(inputField);

                                    // Update the current input field reference
                                    currentInputField = inputField;
                                });
                            });
                        </script>


                        <div class="col-md-4">
                            <label class="control-label mb-10 text-left">
                                Pernafasan/menit
                            </label>
                            <span id="pernafasan_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                                <input id="pernafasan1" type="radio" name="pernafasan" value="2">
                                <label class="control-label" for="pernafasan1">
                                    < 8 </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="pernafasan2" type="radio" name="pernafasan" value="1">
                                <label class="control-label" for="pernafasan2">
                                    8
                                </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="pernafasan3" type="radio" name="pernafasan" value="0">
                                <label class="control-label" for="pernafasan3">
                                    9-17
                                </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="pernafasan4" type="radio" name="pernafasan" value="1">
                                <label class="control-label" for="pernafasan4">
                                    18-20
                                </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="pernafasan5" type="radio" name="pernafasan" value="2">
                                <label class="control-label" for="pernafasan5">
                                    21-29
                                </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="pernafasan6" type="radio" name="pernafasan" value="3">
                                <label class="control-label" for="pernafasan6">
                                    > 30
                                </label>
                            </div>
                        </div>

                        <span id="pernafasan_detail_error" class="text-danger"></span>
                        <script>
                            // Variable to store the currently displayed input field
                            var currentPernafasanInputField = null;

                            // Function to handle showing/hiding the input field below the selected radio button
                            document.querySelectorAll('input[name="pernafasan"]').forEach((radio) => {
                                radio.addEventListener('change', function () {
                                    // Remove the current input field if it exists
                                    if (currentPernafasanInputField) {
                                        currentPernafasanInputField.remove();
                                    }

                                    // Create a new input field
                                    var inputField = document.createElement('input');
                                    inputField.type = 'text';
                                    inputField.name = 'pernafasan_detail';
                                    inputField.id = 'pernafasan_detail';
                                    inputField.className = 'form-control';

                                    inputField.placeholder = 'Detail Pernafasan';
                                    inputField.style.marginTop = '10px';

                                    // Insert the input field directly after the current radio button's parent div
                                    this.parentNode.appendChild(inputField);

                                    // Update the current input field reference
                                    currentPernafasanInputField = inputField;
                                });
                            });
                        </script>

                    </div>

                    <div class="col-md-3">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>

                    <div class="col-md-3">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>

                    <div class="form-group ">
                        <div class="col-md-4">
                            <label class="control-label mb-10 text-left">
                                Tekanan Darah
                            </label>
                            <span id="takananDarah_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                                <input id="tekananDarah1" type="radio" name="tekananDarah" value="3">
                                <label class="control-label" for="tekananDarah1">
                                    < 70 </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="tekananDarah2" type="radio" name="tekananDarah" value="2">
                                <label class="control-label" for="tekananDarah2">
                                    71-80
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="tekananDarah3" type="radio" name="tekananDarah" value="1">
                                <label class="control-label" for="tekananDarah3">
                                    81-100
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="tekananDarah4" type="radio" name="tekananDarah" value="0">
                                <label class="control-label" for="tekananDarah4">
                                    101-159
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="tekananDarah5" type="radio" name="tekananDarah" value="1">
                                <label class="control-label" for="tekananDarah5">
                                    160-199
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="tekananDarah6" type="radio" name="tekananDarah" value="2">
                                <label class="control-label" for="tekananDarah6">
                                    200-220
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="tekananDarah7" type="radio" name="tekananDarah" value="3">
                                <label class="control-label" for="tekananDarah7">
                                    > 220
                                </label>
                            </div>
                            <span id="tekananDarah_detail_error" class="text-danger"></span>

                            <script>
                                // Variable to store the currently displayed input field
                                var currentTekananDarahInputField = null;

                                // Function to handle showing/hiding the input field below the selected radio button
                                document.querySelectorAll('input[name="tekananDarah"]').forEach((radio) => {
                                    radio.addEventListener('change', function () {
                                        // Remove the current input field if it exists
                                        if (currentTekananDarahInputField) {
                                            currentTekananDarahInputField.remove();
                                        }

                                        // Create a new input field
                                        var inputField = document.createElement('input');
                                        inputField.type = 'text';
                                        inputField.name = 'tekananDarah_detail';
                                        inputField.id = 'tekananDarah_detail';
                                        inputField.className = 'form-control';
                                        inputField.placeholder = 'Detail Tekanan Darah';
                                        inputField.style.marginTop = '10px';

                                        // Insert the input field directly after the current radio button's parent div
                                        this.parentNode.appendChild(inputField);

                                        // Update the current input field reference
                                        currentTekananDarahInputField = inputField;
                                    });
                                });
                            </script>
                        </div>

                        <div class="col-md-3">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="col-md-4">
                            <label class="control-label mb-10 text-left">
                                Denyut Jantung
                            </label>
                            <span id="denyut_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                                <input id="denyut_jantung1" type="radio" name="denyut_jantung" value="2">
                                <label class="control-label" for="denyut_jantung1">
                                    < 40 </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="denyut_jantung2" type="radio" name="denyut_jantung" value="1">
                                <label class="control-label" for="denyut_jantung2">
                                    40-50
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="denyut_jantung3" type="radio" name="denyut_jantung" value="0">
                                <label class="control-label" for="denyut_jantung3">
                                    51-100
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="denyut_jantung4" type="radio" name="denyut_jantung" value="1">
                                <label class="control-label" for="denyut_jantung4">
                                    101-110
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="denyut_jantung5" type="radio" name="denyut_jantung" value="2">
                                <label class="control-label" for="denyut_jantung5">
                                    111-129
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="denyut_jantung6" type="radio" name="denyut_jantung" value="3">
                                <label class="control-label" for="denyut_jantung6">
                                    > 130
                                </label>
                            </div>
                        </div>

                        <span id="denyutJantung_detail_error" class="text-danger"></span>

                        <script>
                            // Variable to store the currently displayed input field
                            var currentDenyutInputField = null;

                            // Function to handle showing/hiding the input field below the selected radio button
                            document.querySelectorAll('input[name="denyut_jantung"]').forEach((radio) => {
                                radio.addEventListener('change', function () {
                                    // Remove the current input field if it exists
                                    if (currentDenyutInputField) {
                                        currentDenyutInputField.remove();
                                    }

                                    // Create a new input field
                                    var inputField = document.createElement('input');
                                    inputField.type = 'text';
                                    inputField.name = 'denyut_jantung_detail';
                                    inputField.id = 'denyut_jantung_detail';
                                    inputField.className = 'form-control';
                                    inputField.placeholder = 'Detail Denyut Jantung';
                                    inputField.style.marginTop = '10px';

                                    // Insert the input field directly after the current radio button's parent div
                                    this.parentNode.appendChild(inputField);

                                    // Update the current input field reference
                                    currentDenyutInputField = inputField;
                                });
                            });
                        </script>

                        <div class="col-md-4">
                            <label class="control-label mb-10 text-left">
                                Temperatur (C)
                            </label>
                            <span id="temperatur_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                                <input id="temperatur1" type="radio" name="temperatur" value="2">
                                <label class="control-label" for="temperatur1">
                                    < 35 </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="temperatur2" type="radio" name="temperatur" value="1">
                                <label class="control-label" for="temperatur2">
                                    35.05-36
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="temperatur3" type="radio" name="temperatur" value="0">
                                <label class="control-label" for="temperatur3">
                                    36.05-38
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="temperatur4" type="radio" name="temperatur" value="1">
                                <label class="control-label" for="temperatur4">
                                    38.05-38.5
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="temperatur5" type="radio" name="temperatur" value="2">
                                <label class="control-label" for="temperatur5">
                                    > 38.5
                                </label>
                            </div>
                        </div>

                        <span id="temperatur_detail_error" class="text-danger"></span>

                        <script>
                            // Variable to store the currently displayed input field
                            var currentTemperaturInputField = null;

                            // Function to handle showing/hiding the input field below the selected radio button
                            document.querySelectorAll('input[name="temperatur"]').forEach((radio) => {
                                radio.addEventListener('change', function () {
                                    // Remove the current input field if it exists
                                    if (currentTemperaturInputField) {
                                        currentTemperaturInputField.remove();
                                    }

                                    // Create a new input field
                                    var inputField = document.createElement('input');
                                    inputField.type = 'text';
                                    inputField.name = 'temperatur_detail';
                                    inputField.id = 'temperatur_detail';
                                    inputField.className = 'form-control';
                                    inputField.placeholder = 'Detail Temperatur';
                                    inputField.style.marginTop = '10px';

                                    // Insert the input field directly after the current radio button's parent div
                                    this.parentNode.appendChild(inputField);

                                    // Update the current input field reference
                                    currentTemperaturInputField = inputField;
                                });
                            });
                        </script>
                    </div>

                    <div class="col-md-3">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>




                    <div class="form-group col-md-2">
                        <label class="control-label mb-10 text-left"> Total :</label>
                        <span id="total_ews_error" class="text-danger"></span>
                        <div class=" ">
                            <input class="form-control" cols="1" rows="1" id="total_ews" name="total_ews"
                                disabled></input>
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label mb-10 text-left">Mulai Pukul: <span class="help"></span></label>
                            <span id="pukul_error" class="text-danger"></span>
                            <div class="has-success">
                                <input type="time" class="form-control" id="inPukul" name="inPukul">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.getElementById("inPukul").style.display = "none";
                    </script>


                    <script>
                        // Set current time to the input field on page load
                        window.onload = function () {
                            const now = new Date();
                            const hours = String(now.getHours()).padStart(2, '0');
                            const minutes = String(now.getMinutes()).padStart(2, '0');
                            document.getElementById("inPukul").value = `${hours}:${minutes}`;
                        };
                    </script>



                    <div class="col-md-6">
                        <div class="form-group col-md-12">
                            <label class="control-label mb-6 text-left" style="opacity: 0.75;"><strong>EWSS PASIEN
                                    DEWASA:</strong> </label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group ">
                                <label class="control-label mb-6 text-left" style="opacity: 0.75;">0 - 3 :
                                    <strong>OBS 4 - 6 jam</strong></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-6 text-left" style="opacity: 0.75;">4 - 5:
                                    <strong>OBS 2 jam</strong></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-6 text-left" style="opacity: 0.75;">6 - 7:
                                    <strong>OBS 1 jam</strong></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-6 text-left" style="opacity: 0.75;">> 8:
                                    <strong>Code Blue</strong></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>

                    <div class="col-md-3">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>
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
            <h3 class="text-center">Penatalaksanaan Berdasarkan Zona</h3>
            <div class="panel-body">
                <div class="panel-wrapper collapse in" style="padding: 10px;">
                    <div style="
                        display: grid; 
                        grid-template-columns: repeat(4, 1fr); 
                        gap: 15px;
                        font-family: Arial, sans-serif;
                        color: #fff;
                        font-weight: bold;
                    ">
                        <div style="background-color:#e74c3c; padding: 20px; border-radius: 8px;">
                            TTV di zona merah atau total skor > 8
                        </div>
                        <div style="background-color:#e74c3c; padding: 20px; border-radius: 8px;">
                            Telpon 1001 panggil tim code blue
                        </div>
                        <div style="background-color:#f1c40f; padding: 20px; border-radius: 8px;">
                            TTV di zona kuning atau total skor 4-5
                        </div>
                        <div style="background-color:#f1c40f; padding: 20px; border-radius: 8px;">
                            Observasi ulang tiap 2 jam dan diskusi PPJP/PJ Shift
                        </div>
                        <div style="background-color:#e67e22; padding: 20px; border-radius: 8px;">
                            TTV di zona orange atau total skor 6-7
                        </div>
                        <div style="background-color:#e67e22; padding: 20px; border-radius: 8px;">
                            Observasi ulang tiap 1 jam dan lapor PPJP/JP shift
                        </div>
                        <div style="background-color:#B6F500; color:#000; padding: 20px; border-radius: 8px;">
                            TTV di zona hijau atau hijau total skor 0-3
                        </div>
                        <div style="background-color:#B6F500; color:#000; padding: 20px; border-radius: 8px;">
                            Lakukan pemeriksaan ulang tiap 4-6 jam
                        </div>
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
                                        <table class="table table-hover display  pb-60" id="tabel_infus">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>PILIH</th>
                                                    <th>HAPUS</th>
                                                    <th>TANGGAL</th>
                                                    <th>KESADARAN</th>
                                                    <th>PERNAFASAN</th>
                                                    <th>TEKANAN DARAH</th>
                                                    <th>DENYUT JANTUNG</th>
                                                    <th>TEMPERATUR</th>
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
                                                    <th>PERNAFASAN</th>
                                                    <th>TEKANAN DARAH</th>
                                                    <th>DENYUT JANTUNG</th>
                                                    <th>TEMPERATUR</th>
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
                score = 2;
            } else if ($('#kesadaran3').is(":checked")) {
                score = 1;
            } else if ($('#kesadaran4').is(":checked")) {
                score = 0;
            } else if ($('#kesadaran5').is(":checked")) {
                score = 1;
            } else if ($('#kesadaran6').is(":checked")) {
                score = 2;
            } else if ($('#kesadaran7').is(":checked")) {
                score = 3;
            }

            if ($('#pernafasan1').is(":checked")) {
                score1 = 2;
            } else if ($('#pernafasan2').is(":checked")) {
                score1 = 1;
            } else if ($('#pernafasan3').is(":checked")) {
                score1 = 2;
            } else if ($('#pernafasan4').is(":checked")) {
                score1 = 0;
            } else if ($('#pernafasan5').is(":checked")) {
                score1 = 1;
            } else if ($('#pernafasan6').is(":checked")) {
                score1 = 2;
            }

            if ($('#tekananDarah1').is(":checked")) {
                score2 = 3;
            } else if ($('#tekananDarah2').is(":checked")) {
                score2 = 2;
            } else if ($('#tekananDarah3').is(":checked")) {
                score2 = 1;
            } else if ($('#tekananDarah4').is(":checked")) {
                score2 = 0;
            } else if ($('#tekananDarah5').is(":checked")) {
                score2 = 1;
            } else if ($('#tekananDarah6').is(":checked")) {
                score2 = 2;
            } else if ($('#tekananDarah7').is(":checked")) {
                score2 = 3;
            }

            if ($('#denyut_jantung1').is(":checked")) {
                score3 = 2;
            } else if ($('#denyut_jantung2').is(":checked")) {
                score3 = 1;
            } else if ($('#denyut_jantung3').is(":checked")) {
                score3 = 0;
            } else if ($('#denyut_jantung4').is(":checked")) {
                score3 = 1;
            } else if ($('#denyut_jantung5').is(":checked")) {
                score3 = 2;
            } else if ($('#denyut_jantung6').is(":checked")) {
                score3 = 3;
            }

            if ($('#temperatur1').is(":checked")) {
                score4 = 2;
            } else if ($('#temperatur2').is(":checked")) {
                score4 = 1;
            } else if ($('#temperatur3').is(":checked")) {
                score4 = 0;
            } else if ($('#temperatur4').is(":checked")) {
                score4 = 1;
            } else if ($('#temperatur5').is(":checked")) {
                score4 = 2;
            }



            sum = Number(score) + Number(score1) + Number(score2) + Number(score3) + Number(score4); //+Number(score6);
            console.log(sum);
            total = $('#total_ews').val(sum);
        }
        document.addEventListener('DOMContentLoaded', function () {
            const radioGroups = ['kesadaran', 'pernafasan', 'tekananDarah', 'denyut_jantung', 'temperatur'];

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
            kesadaran = $('input[name="kesadaran"]:checked').val();
            // kesadaran_detail = $('kesadaran_detail').val();
            kesadaran_detail = $('input[name="kesadaran_detail"]').val();
            pernafasan = $('input[name="pernafasan"]:checked').val();
            // pernafasan_detail = $('pernafasan_detail').val();
            pernafasan_detail = $('input[name="pernafasan_detail"]').val();
            tekananDarah = $('input[name="tekananDarah"]:checked').val();
            // tekananDarah_detail = $('tekananDarah_detail').val();
            tekananDarah_detail = $('input[name="tekananDarah_detail"]').val();
            denyut_jantung = $('input[name="denyut_jantung"]:checked').val();
            // denyut_detail = $('denyut_detail').val();
            denyut_detail = $('input[name="denyut_jantung_detail"]').val();
            temperatur = $('input[name="temperatur"]:checked').val();
            // temperatur_detail = $('temperatur_detail').val();
            temperatur_detail = $('input[name="temperatur_detail"]').val();
            total_ews = $('input[name="total_ews"]').val();
            // total_score = $('#inTotal').val();


            dataString = '&no_rm=' + no_rm + '&kesadaran=' + kesadaran + '&kesadaran_detail=' + kesadaran_detail + '&pernafasan=' + pernafasan + '&pernafasan_detail=' + pernafasan_detail + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
                '&tekananDarah=' + tekananDarah + '&tekananDarah_detail=' + tekananDarah_detail + '&denyut_jantung=' + denyut_jantung + '&denyut_jantung_detail=' + denyut_detail + '&temperatur=' + temperatur + '&temperatur_detail=' + temperatur_detail +
                '&total_ews=' + total_ews + '&waktu=' + waktu;
            console.log(dataString)

            let isValid = true;

            if (!kesadaran) {
                $('#kesadaran_error').html('*wajib diisi');
                $('#kesadaran1').focus();
                isValid = false;
            } else {
                $('#kesadaran_error').html('');
            }

            if (!kesadaran_detail && isValid) {
                $('#kesadaran_detail_error').html('*wajib diisi');
                $('#kesadaran_detail').focus();
                isValid = false;
            } else {
                $('#kesadaran_detail_error').html('');
            }

            if (!pernafasan && isValid) {
                $('#pernafasan_error').html('*wajib diisi');
                $('#pernafasan1').focus();
                isValid = false;
            } else {
                $('#pernafasan_error').html('');
            }

            if (!pernafasan_detail && isValid) {
                $('#pernafasan_detail_error').html('*wajib diisi');
                $('#pernafasan_detail').focus();
                isValid = false;
            } else {
                $('#pernafasan_detail_error').html('');
            }

            if (!tekananDarah && isValid) {
                $('#tekananDarah_error').html('*wajib diisi');
                $('#tekananDarah1').focus();
                isValid = false;
            } else {
                $('#tekananDarah_error').html('');
            }

            if (!tekananDarah_detail && isValid) {
                $('#tekananDarah_detail_error').html('*wajib diisi');
                $('#tekananDarah_detail').focus();
                isValid = false;
            } else {
                $('#tekananDarah_detail_error').html('');
            }

            if (!denyut_jantung && isValid) {
                $('#denyut_jantung_error').html('*wajib diisi');
                $('#denyut_jantung1').focus();
                isValid = false;
            } else {
                $('#denyut_jantung_error').html('');
            }

            if (!denyut_detail && isValid) {
                $('#denyutJantung_detail_error').html('*wajib diisi');
                $('#denyut_jantung_detail').focus();
                isValid = false;
            } else {
                $('#denyutJantung_detail_error').html('');
            }

            if (!temperatur && isValid) {
                $('#temperatur_error').html('*wajib diisi');
                $('#temperatur1').focus();
                isValid = false;
            } else {
                $('#temperatur_error').html('');
            }

            if (!temperatur_detail && isValid) {
                $('#temperatur_detail_error').html('*wajib diisi');
                $('#temperatur_detail').focus();
                isValid = false;
            } else {
                $('#temperatur_detail_error').html('');
            }


            if (!isValid) {
                return false;
            }



            $.ajax({
                url: "<?php echo base_url() ?>Erm_ranap_pemantauan_vital/insert_pemantauan_vital",
                method: "POST",
                dataType: 'json',
                data: dataString,
                success: function (data) {
                    if (data.status == "success") {
                        window.location.href = "<?php echo base_url('Erm_ranap_pemantauan_vital/formvital/') ?>" + id_pelayanan + '/' + id_history;
                    } else if (data.error) {
                        if (kesadaran == "" || kesadaran == null) {
                            $('#kesadaran_error').html("*wajib diisi");
                        } else {
                            $('#kesadaran_error').html('');
                        }
                        // if (kesadaran_detail == "" || kesadaran_detail == null) {
                        //     $('#kesadaran_error').html("*wajib diisi");
                        // }
                        if (pernafasan == "" || pernafasan == null) {
                            $('#pernafasan_error').html("*wajib diisi");
                        } else {
                            $('#pernafasan_error').html('');
                        }
                        // if (pernafasan_detail == "" || pernafasan_detail == null) {
                        //     $('#pernafasan_error').html("*wajib diisi");
                        // }
                        if (tekananDarah == "" || tekananDarah == null) {
                            $('#tekananDarah_error').html("*wajib diisi");
                        } else {
                            $('#tekananDarah_error').html('');
                        }
                        // if (tekananDarah_detail == "" || tekananDarah_detail == null) {
                        //     $('#tekananDarah_error').html("*wajib diisi");
                        // }
                        if (denyut == "" || denyut == null) {
                            $('#denyut_error').html("*wajib diisi");
                        } else {
                            $('#denyut_error').html('');
                        }
                        // if (denyut_detail == "" || denyut_detail == null) {
                        //     $('#denyut_error').html("*wajib diisi");
                        // }
                        if (temperatur == "" || temperatur == null) {
                            $('#temperatur_error').html("*wajib diisi");
                        } else {
                            $('#temperatur_error').html('');
                        }
                        // if (temperatur_detail == "" || temperatur_detail == null) {
                        //     $('#temperatur_error').html("*wajib diisi");
                        // }
                        // if (total_ews == "" || total_ews == null) {
                        //     $('#total_ews').html("*Klik Untuk Memproses Skor");
                        // }

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
            $("#kesadaran5").click(function () {
                if ($(this).is(":checked")) {
                    $("#kesadaran5").show();
                }
            });
            $("#kesadaran6").click(function () {
                if ($(this).is(":checked")) {
                    $("#kesadaran6").show();
                }
            });
            $("#kesadaran7").click(function () {
                if ($(this).is(":checked")) {
                    $("#kesadaran7").show();
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
            $("#pernafasan6").click(function () {
                if ($(this).is(":checked")) {
                    $("#pernafasan6").show();
                }
            });
            $("#tekananDarah1").click(function () {
                if ($(this).is(":checked")) {
                    $("#tekananDarah1").show();
                }
            });
            $("#tekananDarah2").click(function () {
                if ($(this).is(":checked")) {
                    $("#tekananDarah2").show();
                }
            });
            $("#tekananDarah3").click(function () {
                if ($(this).is(":checked")) {
                    $("#tekananDarah3").show();
                }
            });
            $("#tekananDarah4").click(function () {
                if ($(this).is(":checked")) {
                    $("#tekananDarah4").show();
                }
            });
            $("#tekananDarah5").click(function () {
                if ($(this).is(":checked")) {
                    $("#tekananDarah5").show();
                }
            });
            $("#tekananDarah6").click(function () {
                if ($(this).is(":checked")) {
                    $("#tekananDarah6").show();
                }
            });
            $("#tekananDarah7").click(function () {
                if ($(this).is(":checked")) {
                    $("#tekananDarah7").show();
                }
            });
            $("#denyut_jantung1").click(function () {
                if ($(this).is(":checked")) {
                    $("#denyut_jantung1").show();
                }
            });
            $("#denyut_jantung2").click(function () {
                if ($(this).is(":checked")) {
                    $("#denyut_jantung2").show();
                }
            });
            $("#denyut_jantung3").click(function () {
                if ($(this).is(":checked")) {
                    $("#denyut_jantung3").show();
                }
            });
            $("#denyut_jantung4").click(function () {
                if ($(this).is(":checked")) {
                    $("#denyut_jantung4").show();
                }
            });
            $("#denyut_jantung5").click(function () {
                if ($(this).is(":checked")) {
                    $("#denyut_jantung5").show();
                }
            });
            $("#denyut_jantung6").click(function () {
                if ($(this).is(":checked")) {
                    $("#denyut_jantung6").show();
                }
            });
            $("#temperatur1").click(function () {
                if ($(this).is(":checked")) {
                    $("#temperatur1").show();
                }
            });
            $("#temperatur2").click(function () {
                if ($(this).is(":checked")) {
                    $("#temperatur2").show();
                }
            });
            $("#temperatur3").click(function () {
                if ($(this).is(":checked")) {
                    $("#temperatur3").show();
                }
            });
            $("#temperatur4").click(function () {
                if ($(this).is(":checked")) {
                    $("#temperatur4").show();
                }
            });
            $("#temperatur5").click(function () {
                if ($(this).is(":checked")) {
                    $("#temperatur5").show();
                }
            });

        });

        function pilih(id) {
            $('#id').val(id);
            $.ajax({
                url: "<?php echo base_url() ?>Erm_ranap_pemantauan_vital/get_peman_vital",
                method: "POST",
                dataType: 'json',
                data: {
                    id: id
                },
                success: function (data) {
                    if (data.status_dt == "found") {
                        $('#id').val(data.id_form);
                        $('#inTgl').val(data.tanggal);
                        $('#temperatur_detail').val(data.temperatur_detail);
                        $('#denyut_jantung_detail').val(data.denyut_jantung_detail);
                        $('#tekananDarah_detail').val(data.tekananDarah_detail);
                        $('#pernafasan_detail').val(data.pernafasan_detail);
                        $('#kesadaran_detail').val(data.kesadaran_detail);
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
                        url: "<?php echo base_url() ?>Erm_ranap_pemantauan_vital/hapus_vital",
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

        function reload_data_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
            $('#tabel_infus').dataTable().fnClearTable();
            $('#tabel_infus').dataTable().fnDestroy();
            $('#tabel_infus').DataTable({
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
                    "url": '<?php echo base_url('Erm_ranap_pemantauan_vital/tampil_list_per_id'); ?>',
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
                "createdRow": function (row, data, dataIndex) {
                    var total_ews = parseInt(data[10]); // Index kolom total_ews
                    var cell = $('td', row).eq(10); // Kolom ke 10

                    // Reset class jika ada
                    cell.removeClass('ews-merah ews-oranye ews-kuning ews-hijau');

                    if (total_ews >= 8) {
                        cell.addClass('ews-merah');
                    } else if (total_ews >= 6 && total_ews <= 7) {
                        cell.addClass('ews-oranye');
                    } else if (total_ews >= 4 && total_ews <= 5) {
                        cell.addClass('ews-kuning');
                    } else if (total_ews >= 0 && total_ews <= 3) {
                        cell.addClass('ews-hijau');
                    }
                }
            });
        }


    </script>
    <!-- <script type="text/javascript">
  function sumScore() {
    // var score = null;
    // var score1 = null;
    // var score2 = null;
    // var score3 = null;
    // var score4 = null;
    // var score5 = null;
    // var score6 = null;
    if ($('#kesadaran1').is(":checked")) {
      score = 0;
    } else if ($('#kesadaran2').is(":checked")) {
      score = 25;
    }




    if ($('#kesadaran1').is(":checked")) {
      score1 = 0;
    } else if ($('#kesadaran2').is(":checked")) {
      score1 = 15;
    }
    if ($('#bantu1').is(":checked")) {
      score2 = 0;
    } else if ($('#bantu2').is(":checked")) {
      score2 = 15;
    }
    else if ($('#bantu3').is(":checked")) {
      score2 = 30;
    }
    if ($('#infus1').is(":checked")) {
      score3 = 0;
    } else if ($('#infus2').is(":checked")) {
      score3 = 20;
    }
    if ($('#berjalan1').is(":checked")) {
      score4 = 0;
    } else if ($('#berjalan2').is(":checked")) {
      score4 = 10;
    } else if ($('#berjalan3').is(":checked")) {
      score4 = 20;
    }
    if ($('#mental1').is(":checked")) {
      score5 = 0;
    } else if ($('#mental2').is(":checked")) {
      score5 = 15;
    }
    sum = Number(score) + Number(score1) + Number(score2) + Number(score3) + Number(score4)+ Number(score5);
    $('#inTotal').val(sum);
  }
  

=======
<style>
    /* Warna zona total EWS */
    .ews-merah {
        background-color: #e74c3c;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }

    .ews-oranye {
        background-color: #e67e22;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }

    .ews-kuning {
        background-color: #f1c40f;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }

    .ews-hijau {
        background-color: #B6F500;
        color: #000;
        font-weight: bold;
        text-align: center;
    }
</style>
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">PEMANTAUAN TANDA VITAL DEWASA / EWS MODIFIKASI</h6>
                </div>
                <div class="clearfix"></div>
            </div>

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
                            <input type="text" disabled class="form-control" value="<?= $tgl_lahir ?>" id="inTglLahir">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-md-3">
                            <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                            <!-- <input type="text" disabled class="form-control" id="inJk"> -->
                            <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk">
                        </div>
                    </div>



                    <!-- <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Ruang Rawat<span class="help"></span></label>
                <input type="text" class="form-control" id="inRawat">
              </div>
            </div> -->


                    <!-- 
                              --bagian ASESMEN AWAL KEPERAWATAN/KEBIDANAN
                            -->
                    <div class="form-group" id="spirit">
                        <div class="col-md-12">
                            <h5 style="margin-top: 30px;"><strong>
                                    <label class="control-label mb-10 text-left"><b>TANDA VITAL<b><span
                                                    class="help"></span></label>
                                </strong>
                            </h5>
                        </div>

                        <div class="col-md-4">
                            <label class="control-label mb-10 text-left">Tingkat Kesadaran</label>
                            <span id="kesadaran_error" class="text-danger"></span>

                            <!-- Radio buttons -->
                            <div class="radio-button radio-button-primary">
                                <input id="kesadaran1" type="radio" name="kesadaran" value="3">
                                <label class="control-label" for="kesadaran1">Tidak Respon</label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="kesadaran2" type="radio" name="kesadaran" value="2">
                                <label class="control-label" for="kesadaran2">Respon dengan nyeri</label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="kesadaran3" type="radio" name="kesadaran" value="1">
                                <label class="control-label" for="kesadaran3">Respon dengan suara</label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="kesadaran4" type="radio" name="kesadaran" value="0">
                                <label class="control-label" for="kesadaran4">CM</label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="kesadaran5" type="radio" name="kesadaran" value="1">
                                <label class="control-label" for="kesadaran5">Gelisah/Bingung</label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="kesadaran6" type="radio" name="kesadaran" value="2">
                                <label class="control-label" for="kesadaran6">Bingung</label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="kesadaran7" type="radio" name="kesadaran" value="3">
                                <label class="control-label" for="kesadaran7">Pengganti Kesadaran</label>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <span id="kesadaran_detail_error" class="text-danger"></span>

                        <script>
                            // Variable to store the currently displayed input field
                            var currentInputField = null;

                            // Function to handle showing/hiding the input field below the selected radio button
                            document.querySelectorAll('input[name="kesadaran"]').forEach((radio) => {
                                radio.addEventListener('change', function () {
                                    // Remove the current input field if it exists
                                    if (currentInputField) {
                                        currentInputField.remove();
                                    }

                                    // Create a new input field
                                    var inputField = document.createElement('input');
                                    inputField.type = 'text';
                                    inputField.name = 'kesadaran_detail';
                                    inputField.className = 'form-control';
                                    inputField.placeholder = 'Detail Kesadaran';
                                    inputField.style.marginTop = '8px';

                                    // Insert the input field directly after the current radio button's parent div
                                    this.parentNode.appendChild(inputField);

                                    // Update the current input field reference
                                    currentInputField = inputField;
                                });
                            });
                        </script>


                        <div class="col-md-4">
                            <label class="control-label mb-10 text-left">
                                Pernafasan/menit
                            </label>
                            <span id="pernafasan_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                                <input id="pernafasan1" type="radio" name="pernafasan" value="2">
                                <label class="control-label" for="pernafasan1">
                                    < 8 </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="pernafasan2" type="radio" name="pernafasan" value="1">
                                <label class="control-label" for="pernafasan2">
                                    8
                                </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="pernafasan3" type="radio" name="pernafasan" value="0">
                                <label class="control-label" for="pernafasan3">
                                    9-17
                                </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="pernafasan4" type="radio" name="pernafasan" value="1">
                                <label class="control-label" for="pernafasan4">
                                    18-20
                                </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="pernafasan5" type="radio" name="pernafasan" value="2">
                                <label class="control-label" for="pernafasan5">
                                    21-29
                                </label>
                            </div>
                            <div class="radio-button radio-button-primary">
                                <input id="pernafasan6" type="radio" name="pernafasan" value="3">
                                <label class="control-label" for="pernafasan6">
                                    > 30
                                </label>
                            </div>
                        </div>

                        <span id="pernafasan_detail_error" class="text-danger"></span>
                        <script>
                            // Variable to store the currently displayed input field
                            var currentPernafasanInputField = null;

                            // Function to handle showing/hiding the input field below the selected radio button
                            document.querySelectorAll('input[name="pernafasan"]').forEach((radio) => {
                                radio.addEventListener('change', function () {
                                    // Remove the current input field if it exists
                                    if (currentPernafasanInputField) {
                                        currentPernafasanInputField.remove();
                                    }

                                    // Create a new input field
                                    var inputField = document.createElement('input');
                                    inputField.type = 'text';
                                    inputField.name = 'pernafasan_detail';
                                    inputField.id = 'pernafasan_detail';
                                    inputField.className = 'form-control';

                                    inputField.placeholder = 'Detail Pernafasan';
                                    inputField.style.marginTop = '10px';

                                    // Insert the input field directly after the current radio button's parent div
                                    this.parentNode.appendChild(inputField);

                                    // Update the current input field reference
                                    currentPernafasanInputField = inputField;
                                });
                            });
                        </script>

                    </div>

                    <div class="col-md-3">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>

                    <div class="col-md-3">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>

                    <div class="form-group ">
                        <div class="col-md-4">
                            <label class="control-label mb-10 text-left">
                                Tekanan Darah
                            </label>
                            <span id="takananDarah_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                                <input id="tekananDarah1" type="radio" name="tekananDarah" value="3">
                                <label class="control-label" for="tekananDarah1">
                                    < 70 </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="tekananDarah2" type="radio" name="tekananDarah" value="2">
                                <label class="control-label" for="tekananDarah2">
                                    71-80
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="tekananDarah3" type="radio" name="tekananDarah" value="1">
                                <label class="control-label" for="tekananDarah3">
                                    81-100
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="tekananDarah4" type="radio" name="tekananDarah" value="0">
                                <label class="control-label" for="tekananDarah4">
                                    101-159
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="tekananDarah5" type="radio" name="tekananDarah" value="1">
                                <label class="control-label" for="tekananDarah5">
                                    160-199
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="tekananDarah6" type="radio" name="tekananDarah" value="2">
                                <label class="control-label" for="tekananDarah6">
                                    200-220
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="tekananDarah7" type="radio" name="tekananDarah" value="3">
                                <label class="control-label" for="tekananDarah7">
                                    > 220
                                </label>
                            </div>
                            <span id="tekananDarah_detail_error" class="text-danger"></span>

                            <script>
                                // Variable to store the currently displayed input field
                                var currentTekananDarahInputField = null;

                                // Function to handle showing/hiding the input field below the selected radio button
                                document.querySelectorAll('input[name="tekananDarah"]').forEach((radio) => {
                                    radio.addEventListener('change', function () {
                                        // Remove the current input field if it exists
                                        if (currentTekananDarahInputField) {
                                            currentTekananDarahInputField.remove();
                                        }

                                        // Create a new input field
                                        var inputField = document.createElement('input');
                                        inputField.type = 'text';
                                        inputField.name = 'tekananDarah_detail';
                                        inputField.id = 'tekananDarah_detail';
                                        inputField.className = 'form-control';
                                        inputField.placeholder = 'Detail Tekanan Darah';
                                        inputField.style.marginTop = '10px';

                                        // Insert the input field directly after the current radio button's parent div
                                        this.parentNode.appendChild(inputField);

                                        // Update the current input field reference
                                        currentTekananDarahInputField = inputField;
                                    });
                                });
                            </script>
                        </div>

                        <div class="col-md-3">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="col-md-4">
                            <label class="control-label mb-10 text-left">
                                Denyut Jantung
                            </label>
                            <span id="denyut_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                                <input id="denyut_jantung1" type="radio" name="denyut_jantung" value="2">
                                <label class="control-label" for="denyut_jantung1">
                                    < 40 </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="denyut_jantung2" type="radio" name="denyut_jantung" value="1">
                                <label class="control-label" for="denyut_jantung2">
                                    40-50
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="denyut_jantung3" type="radio" name="denyut_jantung" value="0">
                                <label class="control-label" for="denyut_jantung3">
                                    51-100
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="denyut_jantung4" type="radio" name="denyut_jantung" value="1">
                                <label class="control-label" for="denyut_jantung4">
                                    101-110
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="denyut_jantung5" type="radio" name="denyut_jantung" value="2">
                                <label class="control-label" for="denyut_jantung5">
                                    111-129
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="denyut_jantung6" type="radio" name="denyut_jantung" value="3">
                                <label class="control-label" for="denyut_jantung6">
                                    > 130
                                </label>
                            </div>
                        </div>

                        <span id="denyutJantung_detail_error" class="text-danger"></span>

                        <script>
                            // Variable to store the currently displayed input field
                            var currentDenyutInputField = null;

                            // Function to handle showing/hiding the input field below the selected radio button
                            document.querySelectorAll('input[name="denyut_jantung"]').forEach((radio) => {
                                radio.addEventListener('change', function () {
                                    // Remove the current input field if it exists
                                    if (currentDenyutInputField) {
                                        currentDenyutInputField.remove();
                                    }

                                    // Create a new input field
                                    var inputField = document.createElement('input');
                                    inputField.type = 'text';
                                    inputField.name = 'denyut_jantung_detail';
                                    inputField.id = 'denyut_jantung_detail';
                                    inputField.className = 'form-control';
                                    inputField.placeholder = 'Detail Denyut Jantung';
                                    inputField.style.marginTop = '10px';

                                    // Insert the input field directly after the current radio button's parent div
                                    this.parentNode.appendChild(inputField);

                                    // Update the current input field reference
                                    currentDenyutInputField = inputField;
                                });
                            });
                        </script>

                        <div class="col-md-4">
                            <label class="control-label mb-10 text-left">
                                Temperatur (C)
                            </label>
                            <span id="temperatur_error" class="text-danger"></span>
                            <div class="radio-button radio-button-primary">
                                <input id="temperatur1" type="radio" name="temperatur" value="2">
                                <label class="control-label" for="temperatur1">
                                    < 35 </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="temperatur2" type="radio" name="temperatur" value="1">
                                <label class="control-label" for="temperatur2">
                                    35.05-36
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="temperatur3" type="radio" name="temperatur" value="0">
                                <label class="control-label" for="temperatur3">
                                    36.05-38
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="temperatur4" type="radio" name="temperatur" value="1">
                                <label class="control-label" for="temperatur4">
                                    38.05-38.5
                                </label>
                            </div>

                            <div class="radio-button radio-button-primary">
                                <input id="temperatur5" type="radio" name="temperatur" value="2">
                                <label class="control-label" for="temperatur5">
                                    > 38.5
                                </label>
                            </div>
                        </div>

                        <span id="temperatur_detail_error" class="text-danger"></span>

                        <script>
                            // Variable to store the currently displayed input field
                            var currentTemperaturInputField = null;

                            // Function to handle showing/hiding the input field below the selected radio button
                            document.querySelectorAll('input[name="temperatur"]').forEach((radio) => {
                                radio.addEventListener('change', function () {
                                    // Remove the current input field if it exists
                                    if (currentTemperaturInputField) {
                                        currentTemperaturInputField.remove();
                                    }

                                    // Create a new input field
                                    var inputField = document.createElement('input');
                                    inputField.type = 'text';
                                    inputField.name = 'temperatur_detail';
                                    inputField.id = 'temperatur_detail';
                                    inputField.className = 'form-control';
                                    inputField.placeholder = 'Detail Temperatur';
                                    inputField.style.marginTop = '10px';

                                    // Insert the input field directly after the current radio button's parent div
                                    this.parentNode.appendChild(inputField);

                                    // Update the current input field reference
                                    currentTemperaturInputField = inputField;
                                });
                            });
                        </script>
                    </div>

                    <div class="col-md-3">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>




                    <div class="form-group col-md-2">
                        <label class="control-label mb-10 text-left"> Total :</label>
                        <span id="total_ews_error" class="text-danger"></span>
                        <div class=" ">
                            <input class="form-control" cols="1" rows="1" id="total_ews" name="total_ews"
                                disabled></input>
                            <span class="help-block text-danger"></span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label mb-10 text-left">Mulai Pukul: <span class="help"></span></label>
                            <span id="pukul_error" class="text-danger"></span>
                            <div class="has-success">
                                <input type="time" class="form-control" id="inPukul" name="inPukul">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.getElementById("inPukul").style.display = "none";
                    </script>


                    <script>
                        // Set current time to the input field on page load
                        window.onload = function () {
                            const now = new Date();
                            const hours = String(now.getHours()).padStart(2, '0');
                            const minutes = String(now.getMinutes()).padStart(2, '0');
                            document.getElementById("inPukul").value = `${hours}:${minutes}`;
                        };
                    </script>



                    <div class="col-md-6">
                        <div class="form-group col-md-12">
                            <label class="control-label mb-6 text-left" style="opacity: 0.75;"><strong>EWSS PASIEN
                                    DEWASA:</strong> </label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group ">
                                <label class="control-label mb-6 text-left" style="opacity: 0.75;">0 - 3 :
                                    <strong>OBS 4 - 6 jam</strong></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-6 text-left" style="opacity: 0.75;">4 - 5:
                                    <strong>OBS 2 jam</strong></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-6 text-left" style="opacity: 0.75;">6 - 7:
                                    <strong>OBS 1 jam</strong></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-6 text-left" style="opacity: 0.75;">> 8:
                                    <strong>Code Blue</strong></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>

                    <div class="col-md-3">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>
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
            <h3 class="text-center">Penatalaksanaan Berdasarkan Zona</h3>
            <div class="panel-body">
                <div class="panel-wrapper collapse in" style="padding: 10px;">
                    <div style="
                        display: grid; 
                        grid-template-columns: repeat(4, 1fr); 
                        gap: 15px;
                        font-family: Arial, sans-serif;
                        color: #fff;
                        font-weight: bold;
                    ">
                        <div style="background-color:#e74c3c; padding: 20px; border-radius: 8px;">
                            TTV di zona merah atau total skor > 8
                        </div>
                        <div style="background-color:#e74c3c; padding: 20px; border-radius: 8px;">
                            Telpon 1001 panggil tim code blue
                        </div>
                        <div style="background-color:#f1c40f; padding: 20px; border-radius: 8px;">
                            TTV di zona kuning atau total skor 4-5
                        </div>
                        <div style="background-color:#f1c40f; padding: 20px; border-radius: 8px;">
                            Observasi ulang tiap 2 jam dan diskusi PPJP/PJ Shift
                        </div>
                        <div style="background-color:#e67e22; padding: 20px; border-radius: 8px;">
                            TTV di zona orange atau total skor 6-7
                        </div>
                        <div style="background-color:#e67e22; padding: 20px; border-radius: 8px;">
                            Observasi ulang tiap 1 jam dan lapor PPJP/JP shift
                        </div>
                        <div style="background-color:#B6F500; color:#000; padding: 20px; border-radius: 8px;">
                            TTV di zona hijau atau hijau total skor 0-3
                        </div>
                        <div style="background-color:#B6F500; color:#000; padding: 20px; border-radius: 8px;">
                            Lakukan pemeriksaan ulang tiap 4-6 jam
                        </div>
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
                                        <table class="table table-hover display  pb-60" id="tabel_infus">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>PILIH</th>
                                                    <th>HAPUS</th>
                                                    <th>TANGGAL</th>
                                                    <th>KESADARAN</th>
                                                    <th>PERNAFASAN</th>
                                                    <th>TEKANAN DARAH</th>
                                                    <th>DENYUT JANTUNG</th>
                                                    <th>TEMPERATUR</th>
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
                                                    <th>PERNAFASAN</th>
                                                    <th>TEKANAN DARAH</th>
                                                    <th>DENYUT JANTUNG</th>
                                                    <th>TEMPERATUR</th>
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
                score = 2;
            } else if ($('#kesadaran3').is(":checked")) {
                score = 1;
            } else if ($('#kesadaran4').is(":checked")) {
                score = 0;
            } else if ($('#kesadaran5').is(":checked")) {
                score = 1;
            } else if ($('#kesadaran6').is(":checked")) {
                score = 2;
            } else if ($('#kesadaran7').is(":checked")) {
                score = 3;
            }

            if ($('#pernafasan1').is(":checked")) {
                score1 = 2;
            } else if ($('#pernafasan2').is(":checked")) {
                score1 = 1;
            } else if ($('#pernafasan3').is(":checked")) {
                score1 = 2;
            } else if ($('#pernafasan4').is(":checked")) {
                score1 = 0;
            } else if ($('#pernafasan5').is(":checked")) {
                score1 = 1;
            } else if ($('#pernafasan6').is(":checked")) {
                score1 = 2;
            }

            if ($('#tekananDarah1').is(":checked")) {
                score2 = 3;
            } else if ($('#tekananDarah2').is(":checked")) {
                score2 = 2;
            } else if ($('#tekananDarah3').is(":checked")) {
                score2 = 1;
            } else if ($('#tekananDarah4').is(":checked")) {
                score2 = 0;
            } else if ($('#tekananDarah5').is(":checked")) {
                score2 = 1;
            } else if ($('#tekananDarah6').is(":checked")) {
                score2 = 2;
            } else if ($('#tekananDarah7').is(":checked")) {
                score2 = 3;
            }

            if ($('#denyut_jantung1').is(":checked")) {
                score3 = 2;
            } else if ($('#denyut_jantung2').is(":checked")) {
                score3 = 1;
            } else if ($('#denyut_jantung3').is(":checked")) {
                score3 = 0;
            } else if ($('#denyut_jantung4').is(":checked")) {
                score3 = 1;
            } else if ($('#denyut_jantung5').is(":checked")) {
                score3 = 2;
            } else if ($('#denyut_jantung6').is(":checked")) {
                score3 = 3;
            }

            if ($('#temperatur1').is(":checked")) {
                score4 = 2;
            } else if ($('#temperatur2').is(":checked")) {
                score4 = 1;
            } else if ($('#temperatur3').is(":checked")) {
                score4 = 0;
            } else if ($('#temperatur4').is(":checked")) {
                score4 = 1;
            } else if ($('#temperatur5').is(":checked")) {
                score4 = 2;
            }



            sum = Number(score) + Number(score1) + Number(score2) + Number(score3) + Number(score4); //+Number(score6);
            console.log(sum);
            total = $('#total_ews').val(sum);
        }
        document.addEventListener('DOMContentLoaded', function () {
            const radioGroups = ['kesadaran', 'pernafasan', 'tekananDarah', 'denyut_jantung', 'temperatur'];

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
            kesadaran = $('input[name="kesadaran"]:checked').val();
            // kesadaran_detail = $('kesadaran_detail').val();
            kesadaran_detail = $('input[name="kesadaran_detail"]').val();
            pernafasan = $('input[name="pernafasan"]:checked').val();
            // pernafasan_detail = $('pernafasan_detail').val();
            pernafasan_detail = $('input[name="pernafasan_detail"]').val();
            tekananDarah = $('input[name="tekananDarah"]:checked').val();
            // tekananDarah_detail = $('tekananDarah_detail').val();
            tekananDarah_detail = $('input[name="tekananDarah_detail"]').val();
            denyut_jantung = $('input[name="denyut_jantung"]:checked').val();
            // denyut_detail = $('denyut_detail').val();
            denyut_detail = $('input[name="denyut_jantung_detail"]').val();
            temperatur = $('input[name="temperatur"]:checked').val();
            // temperatur_detail = $('temperatur_detail').val();
            temperatur_detail = $('input[name="temperatur_detail"]').val();
            total_ews = $('input[name="total_ews"]').val();
            // total_score = $('#inTotal').val();


            dataString = '&no_rm=' + no_rm + '&kesadaran=' + kesadaran + '&kesadaran_detail=' + kesadaran_detail + '&pernafasan=' + pernafasan + '&pernafasan_detail=' + pernafasan_detail + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
                '&tekananDarah=' + tekananDarah + '&tekananDarah_detail=' + tekananDarah_detail + '&denyut_jantung=' + denyut_jantung + '&denyut_jantung_detail=' + denyut_detail + '&temperatur=' + temperatur + '&temperatur_detail=' + temperatur_detail +
                '&total_ews=' + total_ews + '&waktu=' + waktu;
            console.log(dataString)

            let isValid = true;

            if (!kesadaran) {
                $('#kesadaran_error').html('*wajib diisi');
                $('#kesadaran1').focus();
                isValid = false;
            } else {
                $('#kesadaran_error').html('');
            }

            if (!kesadaran_detail && isValid) {
                $('#kesadaran_detail_error').html('*wajib diisi');
                $('#kesadaran_detail').focus();
                isValid = false;
            } else {
                $('#kesadaran_detail_error').html('');
            }

            if (!pernafasan && isValid) {
                $('#pernafasan_error').html('*wajib diisi');
                $('#pernafasan1').focus();
                isValid = false;
            } else {
                $('#pernafasan_error').html('');
            }

            if (!pernafasan_detail && isValid) {
                $('#pernafasan_detail_error').html('*wajib diisi');
                $('#pernafasan_detail').focus();
                isValid = false;
            } else {
                $('#pernafasan_detail_error').html('');
            }

            if (!tekananDarah && isValid) {
                $('#tekananDarah_error').html('*wajib diisi');
                $('#tekananDarah1').focus();
                isValid = false;
            } else {
                $('#tekananDarah_error').html('');
            }

            if (!tekananDarah_detail && isValid) {
                $('#tekananDarah_detail_error').html('*wajib diisi');
                $('#tekananDarah_detail').focus();
                isValid = false;
            } else {
                $('#tekananDarah_detail_error').html('');
            }

            if (!denyut_jantung && isValid) {
                $('#denyut_jantung_error').html('*wajib diisi');
                $('#denyut_jantung1').focus();
                isValid = false;
            } else {
                $('#denyut_jantung_error').html('');
            }

            if (!denyut_detail && isValid) {
                $('#denyutJantung_detail_error').html('*wajib diisi');
                $('#denyut_jantung_detail').focus();
                isValid = false;
            } else {
                $('#denyutJantung_detail_error').html('');
            }

            if (!temperatur && isValid) {
                $('#temperatur_error').html('*wajib diisi');
                $('#temperatur1').focus();
                isValid = false;
            } else {
                $('#temperatur_error').html('');
            }

            if (!temperatur_detail && isValid) {
                $('#temperatur_detail_error').html('*wajib diisi');
                $('#temperatur_detail').focus();
                isValid = false;
            } else {
                $('#temperatur_detail_error').html('');
            }


            if (!isValid) {
                return false;
            }



            $.ajax({
                url: "<?php echo base_url() ?>Erm_ranap_pemantauan_vital/insert_pemantauan_vital",
                method: "POST",
                dataType: 'json',
                data: dataString,
                success: function (data) {
                    if (data.status == "success") {
                        window.location.href = "<?php echo base_url('Erm_ranap_pemantauan_vital/formvital/') ?>" + id_pelayanan + '/' + id_history;
                    } else if (data.error) {
                        if (kesadaran == "" || kesadaran == null) {
                            $('#kesadaran_error').html("*wajib diisi");
                        } else {
                            $('#kesadaran_error').html('');
                        }
                        // if (kesadaran_detail == "" || kesadaran_detail == null) {
                        //     $('#kesadaran_error').html("*wajib diisi");
                        // }
                        if (pernafasan == "" || pernafasan == null) {
                            $('#pernafasan_error').html("*wajib diisi");
                        } else {
                            $('#pernafasan_error').html('');
                        }
                        // if (pernafasan_detail == "" || pernafasan_detail == null) {
                        //     $('#pernafasan_error').html("*wajib diisi");
                        // }
                        if (tekananDarah == "" || tekananDarah == null) {
                            $('#tekananDarah_error').html("*wajib diisi");
                        } else {
                            $('#tekananDarah_error').html('');
                        }
                        // if (tekananDarah_detail == "" || tekananDarah_detail == null) {
                        //     $('#tekananDarah_error').html("*wajib diisi");
                        // }
                        if (denyut == "" || denyut == null) {
                            $('#denyut_error').html("*wajib diisi");
                        } else {
                            $('#denyut_error').html('');
                        }
                        // if (denyut_detail == "" || denyut_detail == null) {
                        //     $('#denyut_error').html("*wajib diisi");
                        // }
                        if (temperatur == "" || temperatur == null) {
                            $('#temperatur_error').html("*wajib diisi");
                        } else {
                            $('#temperatur_error').html('');
                        }
                        // if (temperatur_detail == "" || temperatur_detail == null) {
                        //     $('#temperatur_error').html("*wajib diisi");
                        // }
                        // if (total_ews == "" || total_ews == null) {
                        //     $('#total_ews').html("*Klik Untuk Memproses Skor");
                        // }

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
            $("#kesadaran5").click(function () {
                if ($(this).is(":checked")) {
                    $("#kesadaran5").show();
                }
            });
            $("#kesadaran6").click(function () {
                if ($(this).is(":checked")) {
                    $("#kesadaran6").show();
                }
            });
            $("#kesadaran7").click(function () {
                if ($(this).is(":checked")) {
                    $("#kesadaran7").show();
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
            $("#pernafasan6").click(function () {
                if ($(this).is(":checked")) {
                    $("#pernafasan6").show();
                }
            });
            $("#tekananDarah1").click(function () {
                if ($(this).is(":checked")) {
                    $("#tekananDarah1").show();
                }
            });
            $("#tekananDarah2").click(function () {
                if ($(this).is(":checked")) {
                    $("#tekananDarah2").show();
                }
            });
            $("#tekananDarah3").click(function () {
                if ($(this).is(":checked")) {
                    $("#tekananDarah3").show();
                }
            });
            $("#tekananDarah4").click(function () {
                if ($(this).is(":checked")) {
                    $("#tekananDarah4").show();
                }
            });
            $("#tekananDarah5").click(function () {
                if ($(this).is(":checked")) {
                    $("#tekananDarah5").show();
                }
            });
            $("#tekananDarah6").click(function () {
                if ($(this).is(":checked")) {
                    $("#tekananDarah6").show();
                }
            });
            $("#tekananDarah7").click(function () {
                if ($(this).is(":checked")) {
                    $("#tekananDarah7").show();
                }
            });
            $("#denyut_jantung1").click(function () {
                if ($(this).is(":checked")) {
                    $("#denyut_jantung1").show();
                }
            });
            $("#denyut_jantung2").click(function () {
                if ($(this).is(":checked")) {
                    $("#denyut_jantung2").show();
                }
            });
            $("#denyut_jantung3").click(function () {
                if ($(this).is(":checked")) {
                    $("#denyut_jantung3").show();
                }
            });
            $("#denyut_jantung4").click(function () {
                if ($(this).is(":checked")) {
                    $("#denyut_jantung4").show();
                }
            });
            $("#denyut_jantung5").click(function () {
                if ($(this).is(":checked")) {
                    $("#denyut_jantung5").show();
                }
            });
            $("#denyut_jantung6").click(function () {
                if ($(this).is(":checked")) {
                    $("#denyut_jantung6").show();
                }
            });
            $("#temperatur1").click(function () {
                if ($(this).is(":checked")) {
                    $("#temperatur1").show();
                }
            });
            $("#temperatur2").click(function () {
                if ($(this).is(":checked")) {
                    $("#temperatur2").show();
                }
            });
            $("#temperatur3").click(function () {
                if ($(this).is(":checked")) {
                    $("#temperatur3").show();
                }
            });
            $("#temperatur4").click(function () {
                if ($(this).is(":checked")) {
                    $("#temperatur4").show();
                }
            });
            $("#temperatur5").click(function () {
                if ($(this).is(":checked")) {
                    $("#temperatur5").show();
                }
            });

        });

        function pilih(id) {
            $('#id').val(id);
            $.ajax({
                url: "<?php echo base_url() ?>Erm_ranap_pemantauan_vital/get_peman_vital",
                method: "POST",
                dataType: 'json',
                data: {
                    id: id
                },
                success: function (data) {
                    if (data.status_dt == "found") {
                        $('#id').val(data.id_form);
                        $('#inTgl').val(data.tanggal);
                        $('#temperatur_detail').val(data.temperatur_detail);
                        $('#denyut_jantung_detail').val(data.denyut_jantung_detail);
                        $('#tekananDarah_detail').val(data.tekananDarah_detail);
                        $('#pernafasan_detail').val(data.pernafasan_detail);
                        $('#kesadaran_detail').val(data.kesadaran_detail);
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
                        url: "<?php echo base_url() ?>Erm_ranap_pemantauan_vital/hapus_vital",
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

        function reload_data_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
            $('#tabel_infus').dataTable().fnClearTable();
            $('#tabel_infus').dataTable().fnDestroy();
            $('#tabel_infus').DataTable({
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
                    "url": '<?php echo base_url('Erm_ranap_pemantauan_vital/tampil_list_per_id'); ?>',
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
                "createdRow": function (row, data, dataIndex) {
                    var total_ews = parseInt(data[10]); // Index kolom total_ews
                    var cell = $('td', row).eq(10); // Kolom ke 10

                    // Reset class jika ada
                    cell.removeClass('ews-merah ews-oranye ews-kuning ews-hijau');

                    if (total_ews >= 8) {
                        cell.addClass('ews-merah');
                    } else if (total_ews >= 6 && total_ews <= 7) {
                        cell.addClass('ews-oranye');
                    } else if (total_ews >= 4 && total_ews <= 5) {
                        cell.addClass('ews-kuning');
                    } else if (total_ews >= 0 && total_ews <= 3) {
                        cell.addClass('ews-hijau');
                    }
                }
            });
        }


    </script>
    <!-- <script type="text/javascript">
  function sumScore() {
    // var score = null;
    // var score1 = null;
    // var score2 = null;
    // var score3 = null;
    // var score4 = null;
    // var score5 = null;
    // var score6 = null;
    if ($('#kesadaran1').is(":checked")) {
      score = 0;
    } else if ($('#kesadaran2').is(":checked")) {
      score = 25;
    }




    if ($('#kesadaran1').is(":checked")) {
      score1 = 0;
    } else if ($('#kesadaran2').is(":checked")) {
      score1 = 15;
    }
    if ($('#bantu1').is(":checked")) {
      score2 = 0;
    } else if ($('#bantu2').is(":checked")) {
      score2 = 15;
    }
    else if ($('#bantu3').is(":checked")) {
      score2 = 30;
    }
    if ($('#infus1').is(":checked")) {
      score3 = 0;
    } else if ($('#infus2').is(":checked")) {
      score3 = 20;
    }
    if ($('#berjalan1').is(":checked")) {
      score4 = 0;
    } else if ($('#berjalan2').is(":checked")) {
      score4 = 10;
    } else if ($('#berjalan3').is(":checked")) {
      score4 = 20;
    }
    if ($('#mental1').is(":checked")) {
      score5 = 0;
    } else if ($('#mental2').is(":checked")) {
      score5 = 15;
    }
    sum = Number(score) + Number(score1) + Number(score2) + Number(score3) + Number(score4)+ Number(score5);
    $('#inTotal').val(sum);
  }
  

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script> -->