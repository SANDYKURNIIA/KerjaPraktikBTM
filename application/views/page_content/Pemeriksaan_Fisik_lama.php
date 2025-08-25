<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        td,
        th {
            color: black;
        }
    </style>
    <script>
        function displayResultsex(sex) {
            document.getElementById("result_sex").value = sex;
        }

        function displayAlertsex() {
            var x = document.getElementById("result_sex").value;
            if (x == "") {
                form.sex[0].focus();
                return false;
            }
        }
    </script>
    <script>
        function displayResultEar(Ear) {
            document.getElementById("result_Ear").value = Ear;
        }

        function displayAlertEar() {
            var x = document.getElementById("result_Ear").value;
            if (x == "") {
                form.Ear[0].focus();
                return false;
            }
        }
    </script>
    <script>
        function displayResultNose(Nose) {
            document.getElementById("result_Nose").value = Nose;
        }

        function displayAlertNose() {
            var x = document.getElementById("result_Nose").value;
            if (x == "") {
                form.Nose[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultColor(Color) {
            document.getElementById("result_Color").value = Color;
        }

        function displayAlertColor() {
            var x = document.getElementById("result_Color").value;
            if (x == "") {
                form.Color[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultFrequent(Frequent) {
            document.getElementById("result_Frequent").value = Frequent;
        }

        function displayAlertFrequent() {
            var x = document.getElementById("result_Frequent").value;
            if (x == "") {
                form.Frequent[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultEpilepsy(Epilepsy) {
            document.getElementById("result_Epilepsy").value = Epilepsy;
        }

        function displayAlertEpilepsy() {
            var x = document.getElementById("result_Epilepsy").value;
            if (x == "") {
                form.Epilepsy[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultHypertension(Hypertension) {
            document.getElementById("result_Hypertension").value = Hypertension;
        }

        function displayAlertHypertension() {
            var x = document.getElementById("result_Hypertension").value;
            if (x == "") {
                form.Hypertension[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultDiabetes(Diabetes) {
            document.getElementById("result_Diabetes").value = Diabetes;
        }

        function displayAlertDiabetes() {
            var x = document.getElementById("result_Diabetes").value;
            if (x == "") {
                form.Diabetes[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultEndocrione(Endocrione) {
            document.getElementById("result_Endocrione").value = Endocrione;
        }

        function displayAlertEndocrione() {
            var x = document.getElementById("result_Endocrione").value;
            if (x == "") {
                form.Endocrione[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultHernia(Hernia) {
            document.getElementById("result_Hernia").value = Hernia;
        }

        function displayAlertHernia() {
            var x = document.getElementById("result_Hernia").value;
            if (x == "") {
                form.Hernia[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultFistula(Fistula) {
            document.getElementById("result_Fistula").value = Fistula;
        }

        function displayAlertFistula() {
            var x = document.getElementById("result_Fistula").value;
            if (x == "") {
                form.Fistula[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultMalaria(Malaria) {
            document.getElementById("result_Malaria").value = Malaria;
        }

        function displayAlertMalaria() {
            var x = document.getElementById("result_Malaria").value;
            if (x == "") {
                form.Malaria[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultSkin(Skin) {
            document.getElementById("result_Skin").value = Skin;
        }

        function displayAlertSkin() {
            var x = document.getElementById("result_Skin").value;
            if (x == "") {
                form.Skin[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultCance(Cance) {
            document.getElementById("result_Cance").value = Cance;
        }

        function displayAlertCance() {
            var x = document.getElementById("result_Cance").value;
            if (x == "") {
                form.Cance[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultAllergy(Allergy) {
            document.getElementById("result_Allergy").value = Allergy;
        }

        function displayAlertAllergy() {
            var x = document.getElementById("result_Allergy").value;
            if (x == "") {
                form.Allergy[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultblood(blood) {
            document.getElementById("result_blood").value = blood;
        }

        function displayAlertblood() {
            var x = document.getElementById("result_blood").value;
            if (x == "") {
                form.blood[0].focus();
                return false;
            }
        }
    </script>

    <script>
        //javascript untuk checkbox smoker
        function displayResultsmoked(smoked) {
            var selectedsmoke = "";
            for (i = 0; i < smoked.smoke.length; i++) {
                if (smoked.smoke[i].checked) {
                    selectedsmoke += smoked.smoke[i].value + ", ";
                }
            }
            document.getElementById("result_smoked").value = selectedsmoke;
        }

        function displayAlertsmoked(smoked) {
            var selectedsmoke = "";
            for (i = 0; i < smoked.smoke.length; i++) {
                if (smoked.smoke[i].checked) {
                    selectedsmoke += smoked.smoke[i].value + ", ";
                }
            }
            if (selectedsmoke == "") { //jika tidak ada smoke yg dipilih             
                form.smoke[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultbloodr(blood_frm) {
            var selectedblood = "";
            for (i = 0; i < blood_frm.blood.length; i++) { //menghitung jumlah panjang array   	
                if (blood_frm.blood[i].checked) {
                    selectedblood += blood_frm.blood[i].value + " ,";
                }
            } //memunculkan data di input id result yg isinya select blood     

            document.getElementById("result_bloodr").value = selectedblood;
        }

        function displayAlertbloodr(blood_frm) {
            var selectedblood = "";
            for (i = 0; i < blood_frm.blood.length; i++) {
                if (blood_frm.blood[i].checked) {
                    selectedblood += blood_frm.blood[i].value + ", ";
                }
            }
            if (selectedblood == "") { //jika tidak ada blood yg dipilih             
                form.blood[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultBasophils(frm_Basophils) {
            var selectedBasophils = "";
            for (i = 0; i < frm_Basophils.Basophils.length; i++) {
                if (frm_Basophils.Basophils[i].checked) {
                    selectedBasophils += frm_Basophils.Basophils[i].value + " <br>";
                }
            }
            document.getElementById("result_Basophils").value = selectedBasophils;
        }

        function displayAlertBasophils(frm_Basophils) {
            var selectedBasophils = "";
            for (i = 0; i < frm_Basophils.Basophils.length; i++) {
                if (frm_Basophils.Basophils[i].checked) {
                    selectedBasophils += frm_Basophils.Basophils[i].value + ", ";
                }
            }
            if (selectedBasophils == "") {
                form.Basophils[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResulturea(frm_urea) {
            var selectedurea = "";
            for (i = 0; i < frm_urea.urea.length; i++) {
                if (frm_urea.urea[i].checked) {
                    selectedurea += frm_urea.urea[i].value + " ,";
                }
            }
            document.getElementById("result_urea").value = selectedurea;
        }

        function displayAlerturea(frm_urea) {
            var selectedurea = "";
            for (i = 0; i < frm_urea.urea.length; i++) {
                if (frm_urea.urea[i].checked) {
                    selectedurea += frm_urea.urea[i].value + ", ";
                }
            }
            if (selectedurea == "") {
                form.urea[0].focus();
                return false;
            }
        }
    </script>

    <script>
        //HIV
        function displayResultHIV(frm_hiv) {
            var selectedHIV = "";
            for (i = 0; i < frm_hiv.HIV.length; i++) { //menghitung jumlah panjang array   	
                if (frm_hiv.HIV[i].checked) {
                    selectedHIV += frm_hiv.HIV[i].value;
                }
            } //memunculkan data di input id result yg isinya select HIV     

            document.getElementById("result_HIV").value = selectedHIV;
        }

        function displayAlertHIV(frm_hiv) {
            var selectedHIV = "";
            for (i = 0; i < frm_hiv.HIV.length; i++) {
                if (frm_hiv.HIV[i].checked) {
                    selectedHIV += frm_hiv.HIV[i].value + ", ";
                }
            }
            if (selectedHIV == "") { //jika tidak ada HIV yg dipilih          
                form.HIV[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultTine(frm_Tine) {
            //tine 
            var selectedTine = "";
            for (i = 0; i < frm_Tine.Tine.length; i++) { //menghitung jumlah panjang array   	
                if (frm_Tine.Tine[i].checked) {
                    selectedTine += frm_Tine.Tine[i].value + ", ";
                }
            } //memunculkan data di input id result yg isinya select Tine     

            document.getElementById("result_Tine").value = selectedTine;
        }

        function displayAlertTine(frm_Tine) {
            var selectedTine = "";
            for (i = 0; i < frm_Tine.Tine.length; i++) {
                if (frm_Tine.Tine[i].checked) {
                    selectedTine += frm_Tine.Tine[i].value + ", ";
                }
            }
            if (selectedTine == "") { //jika tidak ada Tine yg dipilih            
                form.Tine[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultHB(frm_HB) {
            //HB    
            var selectedHB = "";
            for (i = 0; i < frm_HB.HB.length; i++) { //menghitung jumlah panjang array   	
                if (frm_HB.HB[i].checked) {
                    selectedHB += frm_HB.HB[i].value + ", ";
                }
            } //memunculkan data di input id result yg isinya select HB     

            document.getElementById("result_HB").value = selectedHB;
        }

        function displayAlertHB(frm_HB) {
            var selectedHB = "";
            for (i = 0; i < frm_HB.HB.length; i++) {
                if (frm_HB.HB[i].checked) {
                    selectedHB += frm_HB.HB[i].value + ", ";
                }
            }
            if (selectedHB == "") { //jika tidak ada HB yg dipilih      
                form.HB[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultTPHA(frm_TPHA) {
            var selectedTPHA = "";
            for (i = 0; i < frm_TPHA.TPHA.length; i++) { //menghitung jumlah panjang array   	
                if (frm_TPHA.TPHA[i].checked) {
                    selectedTPHA += frm_TPHA.TPHA[i].value + ", ";
                }
            } //memunculkan data di input id result yg isinya select TPHA     

            document.getElementById("result_TPHA").value = selectedTPHA;
        }

        function displayAlertTPHA(frm_TPHA) {
            var selectedTPHA = "";
            for (i = 0; i < frm_TPHA.TPHA.length; i++) {
                if (frm_TPHA.TPHA[i].checked) {
                    selectedTPHA += frm_TPHA.TPHA[i].value + ", ";
                }
            }
            if (selectedTPHA == "") { //jika tidak ada TPHA yg dipilih              
                form.TPHA[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultStool(frm_Stool) {
            var selectedStool = "";
            for (i = 0; i < frm_Stool.Stool.length; i++) { //menghitung jumlah panjang array   	
                if (frm_Stool.Stool[i].checked) {
                    selectedStool += frm_Stool.Stool[i].value + ", ";
                }
            } //memunculkan data di input id result yg isinya select Stool     

            document.getElementById("result_Stool").value = selectedStool;
        }

        function displayAlertStool(frm_Stool) {
            var selectedStool = "";
            for (i = 0; i < frm_Stool.Stool.length; i++) {
                if (frm_Stool.Stool[i].checked) {
                    selectedStool += frm_Stool.Stool[i].value + ", ";
                }
            }
            if (selectedStool == "") { //jika tidak ada Stool yg dipilih              
                form.Stool[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultPharyngeal(frm_Pharyngeal) {
            var selectedPharyngeal = "";
            for (i = 0; i < frm_Pharyngeal.Pharyngeal.length; i++) { //menghitung jumlah panjang array   	
                if (frm_Pharyngeal.Pharyngeal[i].checked) {
                    selectedPharyngeal += frm_Pharyngeal.Pharyngeal[i].value + ", ";
                }
            } //memunculkan data di input id result yg isinya select Pharyngeal     

            document.getElementById("result_Pharyngeal").value = selectedPharyngeal;
        }

        function displayAlertPharyngeal(frm_Pharyngeal) {
            var selectedPharyngeal = "";
            for (i = 0; i < frm_Pharyngeal.Pharyngeal.length; i++) {
                if (frm_Pharyngeal.Pharyngeal[i].checked) {
                    selectedPharyngeal += frm_Pharyngeal.Pharyngeal[i].value + ", ";
                }
            }
            if (selectedPharyngeal == "") { //jika tidak ada Pharyngeal yg dipilih              
                form.Pharyngeal[0].focus();
                return false;
            }
        }
    </script>

    <script>
        function displayResultSpirometry(frm_Spirometry) {
            var selectedSpirometry = "";
            for (i = 0; i < frm_Spirometry.Spirometry.length; i++) { //menghitung jumlah panjang array   	
                if (frm_Spirometry.Spirometry[i].checked) {
                    selectedSpirometry += frm_Spirometry.Spirometry[i].value + ", ";
                }
            } //memunculkan data di input id result yg isinya select Spirometry     

            document.getElementById("result_Spirometry").value = selectedSpirometry;
        }

        function displayAlertSpirometry(frm_Spirometry) {
            var selectedSpirometry = "";
            for (i = 0; i < frm_Spirometry.Spirometry.length; i++) {
                if (frm_Spirometry.Spirometry[i].checked) {
                    selectedSpirometry += frm_Spirometry.Spirometry[i].value + ", ";
                }
            }
            if (selectedSpirometry == "") { //jika tidak ada Spirometry yg dipilih              
                form.Spirometry[0].focus();
                return false;
            }
        }
    </script>


    <script>
        function displayResultDuty(frm_Duty) {
            var selectedDuty = "";
            for (i = 0; i < frm_Duty.Duty.length; i++) { //menghitung jumlah panjang array   	
                if (frm_Duty.Duty[i].checked) {
                    selectedDuty += frm_Duty.Duty[i].value + ", ";
                }
            } //memunculkan data di input id result yg isinya select Duty     

            document.getElementById("result_Duty").value = selectedDuty;
        }

        function displayAlertDuty(frm_Duty) {
            var selectedDuty = "";
            for (i = 0; i < frm_Duty.Duty.length; i++) {
                if (frm_Duty.Duty[i].checked) {
                    selectedDuty += frm_Duty.Duty[i].value + ", ";
                }
            }
            if (selectedDuty == "") { //jika tidak ada Duty yg dipilih              
                form.Duty[0].focus();
                return false;
            }
        }
    </script>

</head>

<body>
    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>

    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h2 class="panel-title txt-dark"><strong>Pemeriksaan Fisik</strong></h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <h4 class="panel-title txt-dark"><b><strong>DATA PRIBADI</strong></b></h4>



                                    <div class="row mt-20">
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
                                                <label class="control-label col-md-3 pt-5">NIK/NPP</label>
                                                <div class="col-md-6 has-success">
                                                    <input type="text" class="form-control" id="nik_npp">
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

                                    <br>
                                    <br>
                                    <h4 class="panel-title txt-dark"><b><strong>A. U M U M:</strong></b>
                                    </h4>
                                    <table border='1' class="table table-bordered display product-overview mb-30"
                                        id="support_table">
                                        <tbody>
                                            <tr>
                                                <th width="100px">Kesan Umum</th>
                                                <th width="300px">
                                                    <center>
                                                        <div class="col-md-12">
                                                            <!-- <div class="form-group"> -->
                                                            <!-- <div class="col-md-6 has-success"> -->
                                                            <input type="radio" name="kesan_umum" id="rad1" value="Baik"
                                                                class="rad1" /> Baik
                                                            <!-- <p id="adequate" style="font-size:12px; margin-top:5px;">
                                                            </p> -->
                                                        </div>

                                </div>
                            </div>
                            </center>
                            </th>
                            <th width="300px">
                                <center>
                                    <div class="col-md-6 has-success">
                                        <input type="radio" name="kesan_umum" id="rad1" value="Sedang" class="rad2" />
                                        Sedang
                                        <!-- <p id="adequate" style="font-size:12px; margin-top:5px;">
                                        </p> -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">

                                        </div>
                                    </div>
                                </center>
                            </th>
                            <th width="300px">
                                <center>
                                    <div class="col-md-12">
                                        <div class="col-md-6 has-success">
                                            <input type="radio" name="kesan_umum" id="rad1" value="Buruk"
                                                class="rad5" />
                                            Buruk
                                            <!-- <p id="adequate" style="font-size:12px; margin-top:5px;">
                                            </p> -->
                                        </div>

                                    </div>
                        </div>
                        </center>
                        </th>
                        </tr>



                        <tr>
                            <th width="100px">Berat Badan</th>
                            <td width="300px">
                                <center>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12 has-success">
                                                <input type="text" class="form-control" id="berat_badan"
                                                    placeholder="Kg">
                                                <!-- <p id="bb" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </td>
                            <th width="100px" class="text-center">Tinggi Badan</th>
                            <th width="300px">
                                <center>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12 has-success">
                                                <input type="text" class="form-control" id="tinggi_badan"
                                                    placeholder="Cm">
                                                <!-- <p id="tb" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </th>
                        </tr>
                        <tr>
                            <th width="100px">Tekanan Darah</th>
                            <td width="300px">
                                <center>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12 has-success">
                                                <input type="text" class="form-control" id="tekanan_darah"
                                                    placeholder="mm Hg">
                                                <!-- <p id="td" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </td>
                            <th width="100px" class="text-center">Nadi</th>
                            <th width="300px">
                                <center>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12 has-success">
                                                <input type="text" class="form-control" id="nadi" placeholder="/Menit">
                                                <!-- <p id="nadi" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </th>
                        </tr>
                        <!-- New Column Pernapasan-->
                        <tr>
                            <th width="100px">Pernapasan</th>
                            <th width="300px">
                                <center>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12 has-success">
                                                <input type="text" class="form-control" id="pernapasan"
                                                    placeholder="/Menit">
                                                <!-- <p id="pernapasan" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </th>
                            <th width="100px">Golongan Darah</th>
                            <th width="300px">
                                <center>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12 has-success">
                                                <input type="text" class="form-control" id="golongan_darah"
                                                    placeholder="">
                                                <!-- <p id="pernapasan" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </th>
                        </tr>
                        <!-- New Column IMT-->
                        <tr>
                            <th width="100px">IMT</th>
                            <th width="300px">
                                <center>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12 has-success">
                                                <input type="text" class="form-control" id="imt" placeholder="">
                                                <!-- <p id="pernapasan" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </th>
                        </tr>
                        <tr>
                            <th width="100px">Kulit</th>
                            <th width="300px">
                                <center>
                                    <div class="col-md-12">
                                        <!-- <div class="form-group"> -->
                                        <!-- <div class="col-md-6 has-success"> -->
                                        <input type="radio" name="kulit" id="rad35" value="Normal" class="rad35" />
                                        Normal
                                        <!-- <p id="adequate" style="font-size:12px; margin-top:5px;">
                                        </p> -->
                                    </div>

                    </div>
                </div>
                </center>
                </th>
                <th width="300px">
                    <center>
                        <div class="col-md-6 has-success">
                            <input type="radio" name="kulit" id="rad35" value="Luka-Luka" class="rad35" /> Luka-luka
                            <!-- <p id="adequate" style="font-size:12px; margin-top:5px;">
                            </p> -->
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">

                            </div>
                        </div>
                    </center>
                </th>
                <th width="300px">
                    <center>
                        <div class="col-md-12">
                            <div class="col-md-6 has-success">
                                <input type="radio" name="kulit" id="rad35" value="Penyakit Kulit" class="rad35" />
                                Penyakit Kulit
                                <!-- <p id="adequate" style="font-size:12px; margin-top:5px;">
                                </p> -->
                            </div>

                        </div>
            </div>
            </center>
            </th>
            <th width="300px">
                <center>
                    <div class="col-md-12">
                        <div class="col-md-6 has-success">
                            <input type="radio" name="kulit" id="rad35" value="Kontraktor" class="rad35" /> Kontraktor
                            <!-- <p id="adequate" style="font-size:12px; margin-top:5px;">
                            </p> -->
                        </div>

                    </div>
        </div>
        </center>
        </th>
        </tr>
        </tbody>
        </table>
        <br>
        <h4><strong>-------------------------------------------------------------------------------------------------------------------------------------------</strong>
        </h4>
        <br>
        <h4 class="panel-title txt-dark"><b><strong>B. L E H E R :</strong></b>
        </h4>
        <table class="table display product-overview mb-30" id="support_table">
            <thead>
                <tr>
                    <th width=""></th>
                    <th width="100px">
                        <center>Pertanyaan</center>
                    </th>
                    <th width="100px">
                        <center>Ada</center>
                    </th>
                    <th width="100px">
                        <center>Tidak Ada</center>
                    </th>
                    <th>
                        <center>Keterangannya Jika Ada</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td> Struma
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="struma" id="rad19" value="Ada" class="rad19" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="struma" id="rad19" value="Tidak Ada" class="rad19" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <center>
                            <div id="text19" style="display:none">
                                <textarea rows="4" cols="40" id="rad19" name="struma_val"></textarea>
                            </div>
                        </center>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <label>Lain - lain : </label>
                        <div id="remark">
                            <textarea rows="4" cols="100" placeholder="-" id="lain_struma"></textarea>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <h4><strong>-------------------------------------------------------------------------------------------------------------------------------------------</strong>
        </h4>
        <br>
        <h4 class="panel-title txt-dark"><strong>C. T H O R A K :</strong>
        </h4>
        <br>
        <table class="table display product-overview mb-30" id="support_table">
            <thead>
                <tr>
                    <th width="10px">No</th>
                    <th width="500px">
                        <center>Pertanyaan</center>
                    </th>
                    <th width="100px">
                        <center>Tidak</center>
                    </th>
                    <th width="100px">
                        <center>Normal</center>
                    </th>
                    <th>
                        <center>Keterangan Jika Tidak</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Jantung :</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>A) Batas - batas
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="batas_jantung" id="rad3" value="Tidak" class="rad3" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="batas_jantung" id="rad3" value="Normal" class="rad3" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text3" style="display:none">
                            <textarea rows="4" cols="80" id="rad3" name="val_batas"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>B) Auscultasi
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="auscultasi_jantung" id="rad4" value="Tidak" class="rad4" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="auscultasi_jantung" id="rad4" value="Normal" class="rad4" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text4" style="display:none">
                            <textarea rows="4" cols="80" id="rad4" name="aus_jan"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Paru - paru :</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>A) Kapasitas Vital
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <div id="text3">
                            <input type="text" class="form-control" id="kapasitas_paru" placeholder="%">
                            <!-- <p id="kapasitasparu" style="font-size:12px; margin-top:5px;"></p> -->
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>B) Auscultasi
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="auscultasi_paru" id="rad6" value="Tidak" class="rad6" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="auscultasi_paru" id="rad6" value="Normal" class="rad6" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text6" style="display:none">
                            <textarea rows="4" cols="80" id="rad6" name="aus_par"></textarea>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <h4 class="panel-title txt-dark"><strong>D. A B D O M E N :</strong>
        </h4>
        <br>
        <table class="table display product-overview mb-30" id="support_table">
            <thead>
                <tr>
                    <th width="10px">No</th>
                    <th width="500px">
                        <center>Pertanyaan</center>
                    </th>
                    <th width="100px">
                        <center>Tidak</center>
                    </th>
                    <th width="100px">
                        <center>Normal</center>
                    </th>
                    <th>
                        <center>Keterangan Jika Tidak</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td>A) Heper
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="heper_abdomen" id="rad7" value="Tidak" class="rad7" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="heper_abdomen" id="rad7" value="Normal" class="rad7" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text7" style="display:none">
                            <textarea rows="4" cols="80" id="rad7" name="heper_val"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>B) Limpa
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="limpa_abdomen" id="rad8" value="Tidak" class="rad8" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="limpa_abdomen" id="rad8" value="Normal" class="rad8" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text8" style="display:none">
                            <textarea rows="4" cols="80" id="rad8" name="limpa_val"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>C) Hernia
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="hernia_abdomen" id="rad9" value="Tidak" class="rad9" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="hernia_abdomen" id="rad9" value="Normal" class="rad9" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text9" style="display:none">
                            <textarea rows="4" cols="80" id="rad9" name="hernia_abd"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>D) Tumor
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="tumor_abdomen" id="rad10" value="Tidak" class="rad10" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="tumor_abdomen" id="rad10" value="Normal" class="rad10" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text10" style="display:none">
                            <textarea rows="4" cols="80" id="rad10" name="tumor_val"></textarea>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <h4 class="panel-title txt-dark"><strong>E. GENETALIA & ANORECTAL :</strong>
        </h4>
        <br>
        <table class="table display product-overview mb-30" id="support_table">
            <thead>
                <tr>
                    <th width="10px">No</th>
                    <th width="500px">
                        <center>Pertanyaan</center>
                    </th>
                    <th width="100px">
                        <center>Tidak</center>
                    </th>
                    <th width="100px">
                        <center>Normal</center>
                    </th>
                    <th>
                        <center>Keterangan Jika Tidak</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td>A) Hernia
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="hernia_ga" id="rad21" value="Tidak" class="rad21" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="hernia_ga" id="rad21" value="Normal" class="rad21" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text21" style="display:none">
                            <textarea rows="4" cols="80" id="rad21" name="hernia_gene"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>B) Haemorhoid
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="haemorhoid_ga" id="rad22" value="Tidak" class="rad22" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="haemorhoid_ga" id="rad22" value="Normal" class="rad22" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text22" style="display:none">
                            <textarea rows="4" cols="80" id="rad22" name="haemorhoid_val"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>C) Spincer Ani
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="spincerani_ga" id="rad23" value="Tidak" class="rad23" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="spincerani_ga" id="rad23" value="Normal" class="rad23" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text23" style="display:none">
                            <textarea rows="4" cols="80" id="rad23" name="spincerani_val"></textarea>
                        </div>
                    </td>
                </tr>
                <td>1</td>
                <td>Genetalia Lelaki :</td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>a) Epidermis/Testis/Prostat
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="etp_ga" id="rad25" value="Tidak" class="rad25" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="etp_ga" id="rad25" value="Normal" class="rad25" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text25" style="display:none">
                            <textarea rows="4" cols="80" id="rad25" name="etp_val"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>b) Urethra Discharge
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="urethra_ga" id="rad26" value="Tidak" class="rad26" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="urethra_ga" id="rad26" value="Normal" class="rad26" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text26" style="display:none">
                            <textarea rows="4" cols="80" id="rad26" name="urethra_val"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Genetalia Wanita:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>a) Flour Albus
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="flour_ga" id="rad27" value="Tidak" class="rad27" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="flour_ga" id="rad27" value="Normal" class="rad27" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text27" style="display:none">
                            <textarea rows="4" cols="80" id="rad27" name="flour_val"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>b) Fluxus
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="fluxus_ga" id="rad28" value="Tidak" class="rad28" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="fluxus_ga" id="rad28" value="Normal" class="rad28" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text28" style="display:none">
                            <textarea rows="4" cols="80" id="rad28" name="fluxus_val"></textarea>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <h4 class="panel-title txt-dark"><strong>F. ANGGOTA GERAK :</strong>
        </h4>
        <br>
        <table class="table display product-overview mb-30" id="support_table">
            <thead>
                <tr>
                    <th width="10px">No</th>
                    <th width="500px">
                        <center>Pertanyaan</center>
                    </th>
                    <th width="100px">
                        <center>Tidak</center>
                    </th>
                    <th width="100px">
                        <center>Normal</center>
                    </th>
                    <th>
                        <center>Keterangan Jika Tidak</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td>A) Atas Kanan/Kiri
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="akk_ag" id="rad29" value="Tidak" class="rad29" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="akk_ag" id="rad29" value="Normal" class="rad29" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text29" style="display:none">
                            <textarea rows="4" cols="80" id="rad29" name="akk_val"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>B) Bawah Kanan/Kiri
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="bkk_ag" id="rad30" value="Tidak" class="rad30" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="radio" name="bkk_ag" id="rad30" value="Normal" class="rad30" />
                        </center>
                    </td>
                    <td>
                        <!-- form yang mau ditampilkan-->
                        <div id="text30" style="display:none">
                            <textarea rows="4" cols="80" id="rad30" name="bkk_val"></textarea>
                        </div>
                    </td>
                </tr>
                <br>
                <table class="table display product-overview mb-30" id="support_table">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th width="500px">
                                <center>Pertanyaan</center>
                            </th>
                            <th width="100px">
                                <center>Ada</center>
                            </th>
                            <th width="100px">
                                <center>Tidak Ada</center>
                            </th>
                            <th>
                                <center>Keterangan Jika Ada</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>C) Oedeem
                            </td>
                            <td>
                                <center>
                                    <input type="radio" name="oedeem_ag" id="rad31" value="Ada" class="rad31" />
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input type="radio" name="oedeem_ag" id="rad31" value="Tidak Ada" class="rad31" />
                                </center>
                            </td>
                            <td>
                                <!-- form yang mau ditampilkan-->
                                <div id="text31" style="display:none">
                                    <textarea rows="4" cols="80" id="rad31" name="oedeem_val"></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>D) Cacat - cacat
                            </td>
                            <td>
                                <center>
                                    <input type="radio" name="cacat_ag" id="rad32" value="Ada" class="rad32" />
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input type="radio" name="cacat_ag" id="rad32" value="Tidak Ada" class="rad32" />
                                </center>
                            </td>
                            <td>
                                <!-- form yang mau ditampilkan-->
                                <div id="text32" style="display:none">
                                    <textarea rows="4" cols="80" id="rad32" name="cacat_val"></textarea>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <h4 class="panel-title txt-dark"><strong>G. REFLEK - REFLEK :</strong>
                </h4>
                <br>
                <table class="table display product-overview mb-30" id="support_table">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th width="500px">
                                <center>Pertanyaan</center>
                            </th>
                            <th width="100px">
                                <center>Tidak</center>
                            </th>
                            <th width="100px">
                                <center>Normal</center>
                            </th>
                            <th>
                                <center>Keterangan Jika Tidak</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>A) Pupil
                            </td>
                            <td>
                                <center>
                                    <input type="radio" name="pupil_rr" id="rad33" value="Tidak" class="rad33" />
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input type="radio" name="pupil_rr" id="rad33" value="Normal" class="rad33" />
                                </center>
                            </td>
                            <td>
                                <!-- form yang mau ditampilkan-->
                                <div id="text33" style="display:none">
                                    <textarea rows="4" cols="80" id="rad33" name="pupil_val"></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>B) Patella
                            </td>
                            <td>
                                <center>
                                    <input type="radio" name="patella_rr" id="rad34" value="Tidak" class="rad34" />
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input type="radio" name="patella_rr" id="rad34" value="Normal" class="rad34" />
                                </center>
                            </td>
                            <td>
                                <!-- form yang mau ditampilkan-->
                                <div id="text34" style="display:none">
                                    <textarea rows="4" cols="80" id="rad34" name="patella_val"></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>C) Achilles
                            </td>
                            <td>
                                <center>
                                    <input type="radio" name="archilles_rr" id="rad36" value="Tidak" class="rad36" />
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input type="radio" name="archilles_rr" id="rad36" value="Normal" class="rad36" />
                                </center>
                            </td>
                            <td>
                                <!-- form yang mau ditampilkan-->
                                <div id="text36" style="display:none">
                                    <textarea rows="4" cols="80" id="rad36" name="archilles_val"></textarea>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <br>
                <br>
                <center>
                    <h4 class="panel-title txt-dark"><strong>K E S I M P U L A N :</strong></h4>
                </center>
                <br><br>
                <h4 class="panel-title txt-dark"><strong>Pemeriksaan Fisik :</strong></h4>
                <div class="col-sm-9">
                    <div id="summary">
                        <textarea class="txt-dark" rows="4" cols="120" placeholder="-" id="p_fisik"></textarea>
                    </div>
                </div>
                <br><br><br><br><br><br>
                <h4 class="panel-title txt-dark"><strong>Pemeriksaan Dokter Mata :</strong></h4>
                <div class="col-sm-9">
                    <div id="summary">
                        <textarea class="txt-dark" rows="4" cols="120" placeholder="-" id="p_dokter_mata"></textarea>
                    </div>
                </div>
                <br><br><br><br><br><br>
                <h4 class="panel-title txt-dark"><strong>Pemeriksaan Buta Warna :</strong></h4>
                <div class="col-sm-9">
                    <div id="summary">
                        <textarea class="txt-dark" rows="4" cols="120" placeholder="-" id="p_buta_warna"></textarea>
                    </div>
                </div>
                <br><br><br><br><br><br>
                <h4 class="panel-title txt-dark"><strong>Pemeriksaan Funduscopy :</strong></h4>
                <div class="col-sm-9">
                    <div id="summary">
                        <textarea class="txt-dark" rows="4" cols="120" placeholder="-" id="p_fundus"></textarea>
                    </div>
                </div>
                <br><br><br><br><br><br>
                <h4 class="panel-title txt-dark"><strong>Pemeriksaan Tonometri :</strong></h4>
                <div class="col-sm-9">
                    <div id="summary">
                        <textarea class="txt-dark" rows="4" cols="120" placeholder="-" id="p_tonomet"></textarea>
                    </div>
                </div>
                <br><br><br><br><br><br>
                <h4 class="panel-title txt-dark"><strong>Pemeriksaan Audiometri :</strong></h4>
                <div class="col-sm-9">
                    <div id="summary">
                        <textarea class="txt-dark" rows="4" cols="120" placeholder="-" id="p_audio"></textarea>
                    </div>
                </div>
                <br><br><br><br><br><br>
                <h4 class="panel-title txt-dark"><strong>Pemeriksaan Spirometri :</strong></h4>
                <div class="col-sm-9">
                    <div id="summary">
                        <textarea class="txt-dark" rows="4" cols="120" placeholder="-" id="p_spiro"></textarea>
                    </div>
                </div>
                <br><br><br><br><br><br>
                <h4 class="panel-title txt-dark"><strong>Pemeriksaan EKG :</strong></h4>
                <div class="col-sm-9">
                    <div id="summary">
                        <textarea class="txt-dark" rows="4" cols="120" placeholder="-" id="p_ekg"></textarea>
                    </div>
                </div>
                <br><br><br><br><br><br>
                <h4 class="panel-title txt-dark"><strong>Pemeriksaan Treadmill :</strong></h4>
                <div class="col-sm-9">
                    <div id="summary">
                        <textarea class="txt-dark" rows="4" cols="120" placeholder="-" id="p_treadmill"></textarea>
                    </div>
                </div>
                <br><br><br><br><br><br>
                <h4 class="panel-title txt-dark"><strong>Pemeriksaan Rontgen (Thorax) :</strong></h4>
                <div class="col-sm-9">
                    <div id="summary">
                        <textarea class="txt-dark" rows="4" cols="120" placeholder="-" id="p_rontgen"></textarea>
                    </div>
                </div>
                <br><br><br><br><br><br>
                <h4 class="panel-title txt-dark"><strong>Pemeriksaan Laboratorium :</strong></h4>
                <div class="col-sm-9">
                    <div id="summary">
                        <textarea class="txt-dark" rows="4" cols="120" placeholder="-" id="p_labor"></textarea>
                    </div>
                </div>
                <!-- <br><br><br><br><br><br>
                <h4 class="panel-title txt-dark"><strong>Lain - lain (*) Jika Ada :</strong></h4>
                <div class="col-sm-9">
                    <div id="summary">
                        <textarea class="txt-dark" rows="4" cols="120" id="kes_lain"></textarea>
                    </div>
                </div> -->
                <br><br><br>
                <br><br><br><br><br><br>
                <h4 class="panel-title txt-dark"><strong>KESIMPULAN UMUM :</strong></h4>
                <div class="col-sm-9">
                    <div id="summary">
                        <textarea class="txt-dark" rows="4" cols="120" placeholder="-" id="kesimpulan_umum"></textarea>
                    </div>
                </div>
                <br><br><br><br><br><br>
                <h4 class="panel-title txt-dark"><strong>SARAN :</strong></h4>
                <div class="col-sm-9">
                    <div id="summary">
                        <textarea class="txt-dark" rows="4" cols="120" placeholder="-" id="saran"></textarea>
                    </div>
                </div>

                <br><br><br><br><br>
                <div class="modal-footer mb-5 mr-5 mt-10">
                    <input type="hidden" id="id_mcu" value="<?php echo $data_mcu['id_mcu']; ?>">
                    <button onclick="insertData()" class="btn btn-success btn-anim  btn-sm"><i
                            class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
                    <hr>
                </div>
    </div>
    </div>
    </div>
    <!-- /Row -->

    <!-- /Modal Tambah Pasien-->
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <!-- sample modal content -->
            <div class="modal fade modal-printmcu" id="modal_print_mcu" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> Data
                            Pemeriksaan Medis</h5>
                    </div>
                    <div class="modal-body mt-20">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10 mt-20"></i><b>Silahkan Pilih
                                    Data yang ingin
                                    Anda Cetak</b></h6>
                            <hr>

                            <div class="row">
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table id="datable" class="table table-hover display pb-30" width="100%">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <th scope="col">NO</th>
                                                        <th scope="col">CETAK</th>
                                                        <th scope="col">HAPUS</th>
                                                        <th scope="col">NAMA PASIEN</th>
                                                        <th scope="col">TANGGAL</th>
                                                        <th scope="col">JENIS KELAMIN</th>
                                                        <th scope="col">TANGGAL LAHIR</th>
                                                        <th scope="col">PEKERJAAN</th>
                                                        <th scope="col">BADGE NO</th>
                                                        <th scope="col">GOLONGAN DARAH</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr class="bg-success">
                                                        <th scope="col">NO</th>
                                                        <th scope="col">CETAK</th>
                                                        <th scope="col">HAPUS</th>
                                                        <th scope="col">NAMA PASIEN</th>
                                                        <th scope="col">TANGGAL</th>
                                                        <th scope="col">JENIS KELAMIN</th>
                                                        <th scope="col">TANGGAL LAHIR</th>
                                                        <th scope="col">PEKERJAAN</th>
                                                        <th scope="col">BADGE NO</th>
                                                        <th scope="col">GOLONGAN DARAH</th>
                                                    </tr>
                                                </tfoot>
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
    </div>
    <div id="div_result" style="display: none;"></div>

    <!-- End -->

    <!-- Footer -->
    <footer class="footer container-fluid pl-30 pr-30">
        <div class="row">
            <div class="col-sm-5">
                <ul class="footer-link nav navbar-nav">
                    <li class="logo-footer"><a href="#">help</a></li>
                    <li class="logo-footer"><a href="#">terms</a></li>
                    <li class="logo-footer"><a href="#">privacy</a></li>
                </ul>
            </div>
            <div class="col-sm-7 text-right">
                <p>2016 &copy; Kenny. Pampered by Hencework</p>
            </div>
        </div>
    </footer>
    <!-- /Footer -->

    </div>
    <!-- /Main Content -->

    </div>

    <script>
        // Select the radio button with value "Baik"
        document.getElementById('rad1').checked = true;
        document.getElementById('rad35').checked = true;
    </script>

    <script>

        var normalRadioButton = document.querySelector('input[name="struma"][value="Tidak Ada"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="batas_jantung"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="auscultasi_jantung"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="auscultasi_paru"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="heper_abdomen"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="limpa_abdomen"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="hernia_abdomen"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="tumor_abdomen"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="hernia_ga"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="haemorhoid_ga"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="spincerani_ga"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="etp_ga"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="urethra_ga"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="flour_ga"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="fluxus_ga"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="akk_ag"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="bkk_ag"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="oedeem_ag"][value="Tidak Ada"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="cacat_ag"][value="Tidak Ada"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="pupil_rr"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="patella_rr"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }

        var normalRadioButton = document.querySelector('input[name="archilles_rr"][value="Normal"]');
        if (normalRadioButton) {
            normalRadioButton.checked = true;
        }


    </script>

    <script type="text/javascript">
        $(function () {
            $(":radio.rad1").click(function () {
                if ($(this).val() == "1") {
                    $("#text1").show();
                }
                if ($(this).val() == "2") {
                    $("#text1").hide();

                }
            });
        });
        $(function () {
            $(":radio.rad2").click(function () {
                if ($(this).val() == "3") {
                    $("#text2").show();
                }
                if ($(this).val() == "4") {
                    $("#text2").hide();

                }
            });
        });
        $(function () {
            $(":radio.rad3").click(function () {
                if ($("[name='batas_jantung']:checked").val() == "Tidak") {
                    $("#text3").show();
                } else {
                    $("#text3").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad4").click(function () {
                if ($("[name='auscultasi_jantung']:checked").val() == "Tidak") {
                    $("#text4").show();
                } else {
                    $("#text4").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad5").click(function () {
                if ($(this).val() == "9") {
                    $("#text5").show();
                }
                if ($(this).val() == "10") {
                    $("#text5").hide();

                }
            });
        });
        $(function () {
            $(":radio.rad6").click(function () {
                if ($("[name='auscultasi_paru']:checked").val() == "Tidak") {
                    $("#text6").show();
                } else {
                    $("#text6").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad7").click(function () {
                if ($("[name='heper_abdomen']:checked").val() == "Tidak") {
                    $("#text7").show();
                } else {
                    $("#text7").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad8").click(function () {
                if ($("[name='limpa_abdomen']:checked").val() == "Tidak") {
                    $("#text8").show();
                } else {
                    $("#text8").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad9").click(function () {
                if ($("[name='hernia_abdomen']:checked").val() == "Tidak") {
                    $("#text9").show();
                } else {
                    $("#text9").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad10").click(function () {
                if ($("[name='tumor_abdomen']:checked").val() == "Tidak") {
                    $("#text10").show();
                } else {
                    $("#text10").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad11").click(function () {
                if ($(this).val() == "21") {
                    $("#text11").show();
                }
                if ($(this).val() == "22") {
                    $("#text11").hide();

                }
            });
        });
        $(function () {
            $(":radio.rad12").click(function () {
                if ($(this).val() == "23") {
                    $("#text12").show();
                }
                if ($(this).val() == "24") {
                    $("#text12").hide();

                }
            });
        });
        $(function () {
            $(":radio.rad13").click(function () {
                if ($(this).val() == "25") {
                    $("#text13").show();
                }
                if ($(this).val() == "26") {
                    $("#text13").hide();

                }
            });
        });
        $(function () {
            $(":radio.rad14").click(function () {
                if ($(this).val() == "27") {
                    $("#text14").show();
                }
                if ($(this).val() == "28") {
                    $("#text14").hide();

                }
            });
        });
        $(function () {
            $(":radio.rad15").click(function () {
                if ($(this).val() == "29") {
                    $("#text15").show();
                }
                if ($(this).val() == "30") {
                    $("#text15").hide();

                }
            });
        });
        $(function () {
            $(":radio.rad16").click(function () {
                if ($(this).val() == "31") {
                    $("#text16").show();
                }
                if ($(this).val() == "32") {
                    $("#text16").hide();

                }
            });
        });
        $(function () {
            $(":radio.rad17").click(function () {
                if ($(this).val() == "33") {
                    $("#text17").show();
                }
                if ($(this).val() == "34") {
                    $("#text17").hide();

                }
            });
        });
        $(function () {
            $(":radio.rad18").click(function () {
                if ($(this).val() == "35") {
                    $("#text18").show();
                }
                if ($(this).val() == "36") {
                    $("#text18").hide();

                }
            });
        });
        $(function () {
            $(":radio.rad19").click(function () {
                if ($("[name='struma']:checked").val() == "Ada") {
                    $("#text19").show();
                } else {
                    $("#text19").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad20").click(function () {
                if ($(this).val() == "39") {
                    $("#text20").show();
                }
                if ($(this).val() == "40") {
                    $("#text20").hide();

                }
            });
        });
        $(function () {
            $(":radio.rad21").click(function () {
                if ($("[name='hernia_ga']:checked").val() == "Tidak") {
                    $("#text21").show();
                } else {
                    $("#text21").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad22").click(function () {
                if ($("[name='haemorhoid_ga']:checked").val() == "Tidak") {
                    $("#text22").show();
                } else {
                    $("#text22").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad23").click(function () {
                if ($("[name='spincerani_ga']:checked").val() == "Tidak") {
                    $("#text23").show();
                } else {
                    $("#text23").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad24").click(function () {
                if ($(this).val() == "47") {
                    $("#text24").show();
                }
                if ($(this).val() == "48") {
                    $("#text24").hide();

                }
            });
        });
        $(function () {
            $(":radio.rad25").click(function () {
                if ($("[name='etp_ga']:checked").val() == "Tidak") {
                    $("#text25").show();
                } else {
                    $("#text25").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad26").click(function () {
                if ($("[name='urethra_ga']:checked").val() == "Tidak") {
                    $("#text26").show();
                } else {
                    $("#text26").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad27").click(function () {
                if ($("[name='flour_ga']:checked").val() == "Tidak") {
                    $("#text27").show();
                } else {
                    $("#text27").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad28").click(function () {
                if ($("[name='fluxus_ga']:checked").val() == "Tidak") {
                    $("#text28").show();
                } else {
                    $("#text28").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad29").click(function () {
                if ($("[name='akk_ag']:checked").val() == "Tidak") {
                    $("#text29").show();
                } else {
                    $("#text29").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad30").click(function () {
                if ($("[name='bkk_ag']:checked").val() == "Tidak") {
                    $("#text30").show();
                } else {
                    $("#text30").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad31").click(function () {
                if ($("[name='oedeem_ag']:checked").val() == "Ada") {
                    $("#text31").show();
                } else {
                    $("#text31").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad32").click(function () {
                if ($("[name='cacat_ag']:checked").val() == "Ada") {
                    $("#text32").show();
                } else {
                    $("#text32").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad33").click(function () {
                if ($("[name='pupil_rr']:checked").val() == "Tidak") {
                    $("#text33").show();
                } else {
                    $("#text33").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad34").click(function () {
                if ($("[name='patella_rr']:checked").val() == "Tidak") {
                    $("#text34").show();
                } else {
                    $("#text34").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad35").click(function () {
                if ($(this).val() == "69") {
                    $("#text35").show();
                }
                if ($(this).val() == "70") {
                    $("#text35").hide();
                }
            });
        });
        $(function () {
            $(":radio.rad36").click(function () {
                if ($("[name='archilles_rr']:checked").val() == "Tidak") {
                    $("#text36").show();
                } else {
                    $("#text36").hide();
                }
            });
        });
    </script>
    <script type="text/javascript">
        function delete_mcu(id_mcu) {
            swal({
                title: "Apakah kamu yakin akan !",
                text: "Menghapus data ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function () {
                $().ready(function () {
                    $.ajax({
                        url: "<?php echo base_url() ?>mcu/delete_mcu",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            id_mcu: id_mcu,
                        },
                        success: function (data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Data MCU Berhasil dihapus",
                                    confirmButtonColor: "#3cb878",
                                });
                                $('#datable').DataTable().ajax.reload();
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
    </script>
    <script type="text/javascript">
        function insertData() {
            var struma_val = "";
            var val_batas = "";
            var aus_jan = "";
            var aus_par = "";
            var heper_val = "";
            var limpa_val = "";
            var hernia_abd = "";
            var tumor_val = "";
            var hernia_gene = "";
            var haemorhoid_val = "";
            var spincerani_val = "";
            var etp_val = "";
            var urethra_val = "";
            var flour_val = "";
            var fluxus_val = "";
            var akk_val = "";
            var bkk_val = "";
            var oedeem_val = "";
            var cacat_val = "";
            var pupil_val = "";
            var patella_val = "";
            var archilles_val = "";
            var rontagen_val = "";
            var ekg_val = "";
            var laboratorium_val = "";
            var fisik_val = "";
            var keslain_val = "";
            var kesimpulan_val = "";
            var saran_val = "";
            id_mcu = $('#id_mcu').val();
            nik_npp = $('#nik_npp').val();
            kesan_umum = $("[name='kesan_umum']:checked").val();
            berat_badan = $('#berat_badan').val();
            tinggi_badan = $('#tinggi_badan').val();
            tekanan_darah = $('#tekanan_darah').val();
            nadi = $('#nadi').val();
            golongan_darah = $('#golongan_darah').val();
            imt = $('#imt').val();
            pernapasan = $('#pernapasan').val();
            kulit = $("[name='kulit']:checked").val();
            struma = $("[name='struma']:checked").val();
            lain_struma = $('#lain_struma').val();
            batas_jantung = $("[name='batas_jantung']:checked").val();
            auscultasi_jantung = $("[name='auscultasi_jantung']:checked").val();
            kapasitas_paru = $('#kapasitas_paru').val();
            auscultasi_paru = $("[name='auscultasi_paru']:checked").val();
            heper_abdomen = $("[name='heper_abdomen']:checked").val();
            limpa_abdomen = $("[name='limpa_abdomen']:checked").val();
            hernia_abdomen = $("[name='hernia_abdomen']:checked").val();
            tumor_abdomen = $("[name='tumor_abdomen']:checked").val();
            hernia_ga = $("[name='hernia_ga']:checked").val();
            haemorhoid_ga = $("[name='haemorhoid_ga']:checked").val();
            spincerani_ga = $("[name='spincerani_ga']:checked").val();
            etp_ga = $("[name='etp_ga']:checked").val();
            urethra_ga = $("[name='urethra_ga']:checked").val();
            flour_ga = $("[name='flour_ga']:checked").val();
            fluxus_ga = $("[name='fluxus_ga']:checked").val();
            akk_ag = $("[name='akk_ag']:checked").val();
            bkk_ag = $("[name='bkk_ag']:checked").val();
            oedeem_ag = $("[name='oedeem_ag']:checked").val();
            cacat_ag = $("[name='cacat_ag']:checked").val();
            pupil_rr = $("[name='pupil_rr']:checked").val();
            patella_rr = $("[name='patella_rr']:checked").val();
            archilles_rr = $("[name='archilles_rr']:checked").val();
            p_fisik = $('#p_fisik').val();
            p_dokter_mata = $('#p_dokter_mata').val();
            p_buta_warna = $('#p_buta_warna').val();
            p_fundus = $('#p_fundus').val();
            p_tonomet = $('#p_tonomet').val();
            p_audio = $('#p_audio').val();
            p_spiro = $('#p_spiro').val();
            p_ekg = $('#p_ekg').val();
            p_treadmill = $('#p_treadmill').val();
            p_rontgen = $('#p_rontgen').val();
            p_labor = $('#p_labor').val();
            // kes_lain = $('#kes_lain').val();
            kesimpulan_umum = $('#kesimpulan_umum').val();
            saran = $('#saran').val();

            if (struma == "Ada") {
                struma_val = $("[name='struma_val']").val();
            } else {
                struma_val = "Tidak Ada";
            }

            if (batas_jantung == "Tidak") {
                val_batas = $("[name='val_batas']").val();
            } else {
                val_batas = "Normal";
            }

            if (auscultasi_jantung == "Tidak") {
                aus_jan = $("[name='aus_jan']").val();
            } else {
                aus_jan = "Normal";
            }

            if (auscultasi_paru == "Tidak") {
                aus_par = $("[name='aus_par']").val();
            } else {
                aus_par = "Normal";
            }

            if (heper_abdomen == "Tidak") {
                heper_val = $("[name='heper_val']").val();
            } else {
                heper_val = "Normal";
            }

            if (limpa_abdomen == "Tidak") {
                limpa_val = $("[name='limpa_val']").val();
            } else {
                limpa_val = "Normal";
            }

            if (hernia_abdomen == "Tidak") {
                hernia_abd = $("[name='hernia_abd']").val();
            } else {
                hernia_abd = "Normal";
            }

            if (tumor_abdomen == "Tidak") {
                tumor_val = $("[name='tumor_val']").val();
            } else {
                tumor_val = "Normal";
            }

            if (hernia_ga == "Tidak") {
                hernia_gene = $("[name='hernia_gene']").val();
            } else {
                hernia_gene = "Normal";
            }

            if (haemorhoid_ga == "Tidak") {
                haemorhoid_val = $("[name='haemorhoid_val']").val();
            } else {
                haemorhoid_val = "Normal";
            }

            if (spincerani_ga == "Tidak") {
                spincerani_val = $("[name='spincerani_val']").val();
            } else {
                spincerani_val = "Normal";
            }

            if (etp_ga == "Tidak") {
                etp_val = $("[name='etp_val']").val();
            } else {
                etp_val = "Normal";
            }

            if (urethra_ga == "Tidak") {
                urethra_val = $("[name='urethra_val']").val();
            } else {
                urethra_val = "Normal";
            }

            if (flour_ga == "Tidak") {
                flour_val = $("[name='flour_val']").val();
            } else {
                flour_val = "Normal";
            }

            if (fluxus_ga == "Tidak") {
                fluxus_val = $("[name='fluxus_val']").val();
            } else {
                fluxus_val = "Normal";
            }

            if (akk_ag == "Tidak") {
                akk_val = $("[name='akk_val']").val();
            } else {
                akk_val = "Normal";
            }

            if (bkk_ag == "Tidak") {
                bkk_val = $("[name='bkk_val']").val();
            } else {
                bkk_val = "Normal";
            }

            if (oedeem_ag == "Ada") {
                oedeem_val = $("[name='oedeem_val']").val();
            } else {
                oedeem_val = "Tidak Ada";
            }

            if (cacat_ag == "Ada") {
                cacat_val = $("[name='cacat_val']").val();
            } else {
                cacat_val = "Tidak Ada";
            }

            if (pupil_rr == "Tidak") {
                pupil_val = $("[name='pupil_val']").val();
            } else {
                pupil_val = "Normal";
            }

            if (patella_rr == "Tidak") {
                patella_val = $("[name='patella_val']").val();
            } else {
                patella_val = "Normal";
            }

            if (archilles_rr == "Tidak") {
                archilles_val = $("[name='archilles_val']").val();
            } else {
                archilles_val = "Normal";
            }



            // console.log(struma_val);
            // console.log(val_batas);
            // Nose = $('#result_Nose').val();
            // Color = $('#result_Color').val();
            // Frequent = $('#result_Frequent').val();
            // epilepsy = $('#result_Epilepsy').val();
            // Hypertension = $('#result_Hypertension').val();
            // Diabetes = $('#result_Diabetes').val();
            // Endocrione = $('#result_Endocrione').val();
            // Hernia = $('#result_Hernia').val();
            // Fistula = $('#result_Fistula').val();
            // Malaria = $('#result_Malaria').val();
            // Skin = $('#result_Skin').val();
            // Cance = $('#result_Cance').val();
            // Allergy = $('#result_Allergy').val();
            // height = $('#inheight').val();
            // weight = $('#inweight').val();
            // BMI = $('#inbmi').val();
            // P48c = $('#intext19').val();
            // P48d = $('#intext20').val();
            // P48e = $('#intext21').val();
            // P49a = $('#intext22').val();
            // P49b = $('#intext23').val();
            // P49c = $('#intext24').val();
            // P49d = $('#intext25').val();
            // insystolic = $('#insystolic').val();
            // inpulse = $('#inpulse').val();
            // P410a = $('#intext27').val();
            // P410b = $('#intext28').val();
            // P411a = $('#intext29').val();
            // P411b = $('#intext30').val();
            // P411c = $('#intext31').val();
            // P412a = $('#intext32').val();
            // P412b = $('#intext33').val();
            // P413a = $('#intext34').val();
            // P414a = $('#intext35').val();
            // P414b = $('#intext36').val();
            // UFVOO = $('#inuncorrected1').val();
            // UFVOS = $('#inuncorrected2').val();
            // UNVOO = $('#inuncorrected3').val();
            // UNVOS = $('#inuncorrected4').val();
            // UCVAdequate = $('#inAdequate').val();
            // CFVOO = $('#incorrected1').val();
            // CFVOS = $('#incorrected2').val();
            // CNVOO = $('#incorrected3').val();
            // CNVOS = $('#incorrected4').val();
            // // CCVDefective = $('#inDefective').val();
            // Remarks = $('#inremarks').val();
            // P51a = $('#inChest').val();
            // P52a = $('#inEcg').val();
            // P53a = $('#inAudiogram').val();
            // P541a = $('#result_bloodr').val();
            // P542a = $('#result_Basophils').val();
            // P543a = $('#result_urea').val();
            // P55a = $('#inurine').val();
            // P56a = $('#indrugs').val();
            // P57a = $('#result_HIV').val();
            // P58a = $('#result_Tine').val();
            // P59a = $('#result_HB').val();
            // P510a = $('#result_TPHA').val();
            // P511a = $('#result_Stool').val();
            // P512a = $('#result_Pharyngeal').val();
            // P513a = $('#result_Spirometry').val();
            // summary = $('#insummary').val();
            // present = $('#inpresent').val();
            // examined = $('#inexamined').val();
            // Duty = $('#result_Duty').val();
            swal({
                title: "Apakah kamu yakin ingin !",
                text: "Menyimpan Data  ini ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function () {
                $().ready(function () {
                    $.ajax({
                        url: "<?php echo base_url() ?>Surat_mcu/simpan_pemeriksaan_fisik",
                        method: "POST",
                        dataType: "html",
                        data: {
                            id_mcu: id_mcu,
                            nik_npp: nik_npp,
                            kesan_umum: kesan_umum,
                            berat_badan: berat_badan,
                            tinggi_badan: tinggi_badan,
                            tekanan_darah: tekanan_darah,
                            nadi: nadi,
                            golongan_darah: golongan_darah,
                            imt: imt,
                            pernapasan: pernapasan,
                            kulit: kulit,
                            struma: struma_val,
                            lain_struma: lain_struma,
                            batas_jantung: val_batas,
                            auscultasi_jantung: aus_jan,
                            kapasitas_paru: kapasitas_paru,
                            auscultasi_paru: aus_par,
                            heper_abdomen: heper_val,
                            limpa_abdomen: limpa_val,
                            hernia_abdomen: hernia_abd,
                            tumor_abdomen: tumor_val,
                            hernia_ga: hernia_gene,
                            haemorhoid_ga: haemorhoid_val,
                            spincerani_ga: spincerani_val,
                            etp_ga: etp_val,
                            urethra_ga: urethra_val,
                            flour_ga: flour_val,
                            fluxus_ga: fluxus_val,
                            akk_ag: akk_val,
                            bkk_ag: bkk_val,
                            oedeem_ag: oedeem_val,
                            cacat_ag: cacat_val,
                            pupil_rr: pupil_val,
                            patella_rr: patella_val,
                            archilles_rr: archilles_val,
                            p_fisik: p_fisik,
                            p_dokter_mata: p_dokter_mata,
                            p_buta_warna: p_buta_warna,
                            p_fundus: p_fundus,
                            p_tonomet: p_tonomet,
                            p_audio: p_audio,
                            p_spiro: p_spiro,
                            p_ekg: p_ekg,
                            p_treadmill: p_treadmill,
                            p_rontgen: p_rontgen,
                            p_labor: p_labor,
                            // kes_lain: kes_lain,
                            kesimpulan_umum: kesimpulan_umum,
                            saran: saran,
                            // Hernia: Hernia,
                            // Fistula: Fistula,
                            // Malaria: Malaria,
                            // Skin: Skin,
                            // Cance: Cance,
                            // Allergy: Allergy,
                            // height: height,
                            // weight: weight,
                            // BMI: BMI,
                            // P48c: P48c,
                            // P48d: P48d,
                            // P48e: P48e,
                            // P49a: P49a,
                            // P49b: P49b,
                            // P49c: P49c,
                            // P49d: P49d,
                            // insystolic: insystolic,
                            // inpulse: inpulse,
                            // P410a: P410a,
                            // P410b: P410b,
                            // P411a: P411a,
                            // P411b: P411b,
                            // P411c: P411c,
                            // P412a: P412a,
                            // P412b: P412b,
                            // P413a: P413a,
                            // P414a: P414a,
                            // UFVOO: UFVOO,
                            // UFVOS: UFVOS,
                            // UNVOO: UNVOO,
                            // UNVOS: UNVOS,
                            // UCVAdequate: UCVAdequate,
                            // CFVOO: CFVOO,
                            // CFVOS: CFVOS,
                            // CNVOO: CNVOO,
                            // CNVOS: CNVOS,
                            // // CCVDefective: CCVDefective,
                            // Remarks: Remarks,
                            // P51a: P51a,
                            // P52a: P52a,
                            // P53a: P53a,
                            // P541a: P541a,
                            // P542a: P542a,
                            // P543a: P543a,
                            // P55a: P55a,
                            // P56a: P56a,
                            // P57a: P57a,
                            // P58a: P58a,
                            // P59a: P59a,
                            // P510a: P510a,
                            // P511a: P511a,
                            // P512a: P512a,
                            // P513a: P513a,
                            // summary: summary,
                            // present: present,
                            // examined: examined,
                            // Duty: Duty,
                        },
                        success: function (data) {
                            // if (data.status == "success") {
                            //     swal({
                            //         title: "good job!",
                            //         type: "success",
                            //         text: "Data Medical Check Up Pasien ini telah disimpan",
                            //         confirmButtonColor: "#3cb878",

                            //     });

                            //     $('#datable').DataTable().ajax.reload();
                            //     window.location.href = 'javascript:history.go(-1)';
                            $("#div_result").html(data);
                            var divContents = document.getElementById("div_result").innerHTML;
                            // var a = window.open('', '', 'height=500, width=500');
                            var a = window.open();
                            a.document.write('<html>');
                            // a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
                            a.document.write('<body >');
                            a.document.write(divContents);
                            a.document.write('</body>');
                            a.document.write('</html>');
                            setTimeout(function () { // wait until all resources loaded 
                                a.document.close(); // necessary for IE >= 10
                                a.focus(); // necessary for IE >= 10
                                a.print(); // change window to winPrint
                                a.close(); // change window to winPrint
                            }, 500);
                            // } else {
                            //     swal({
                            //         title: "Gagal!",
                            //         type: "warning",
                            //         text: data.status,
                            //         confirmButtonColor: "#3cb878",
                            //     });
                            // }
                        }

                    });
                });
            });
            return false;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datable').DataTable({
                "language": {
                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing": "Sedang memproses...",
                    "sLengthMenu": "Tampilkan _MENU_ entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "sInfoPostFix": "",
                    "sSearch": "Pencarian : ",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext": "Selanjutnya",
                        "sLast": "Terakhir"
                    },

                },
                "ajax": '<?php echo base_url('mcu/Data_MCU'); ?>',
                "deferRender": true,
                "processing": true,
                "order": [],
                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                },],

            });
        });
    </script>

    <!-- Function untuk button surat -->
    <!-- <script type="text/javascript">
        function tampilSuratSehat() {
            dokter = $('#inexamined').val();
            id_mcu = $('#id_mcu').val();
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/checkData",
                method: "POST",
                dataType: 'json',
                data: {
                    id_mcu: id_mcu
                },
                success: function (data) {
                    if (data.surat_sehat.status == "found") {
                        $('input[name="sehat"][value="' + data.surat_sehat.data.sehat + '"]').prop(
                            "checked", true);
                        $('#inTanggal').val(data.surat_sehat.data.tgl_periksa).change();
                        $('#inWeight').val(data.surat_sehat.data.berat_badan);
                        $('#inHigh').val(data.surat_sehat.data.tinggi_badan);
                        $('#tekanan_darah').val(data.surat_sehat.data.tekanan_darah);
                        $('#kebutuhan').val(data.surat_sehat.data.kebutuhan);

                        $('#nadi').val(data.surat_sehat.data.nadi);
                        $('#respirasi').val(data.surat_sehat.data.respirasi);
                        $('#suhu').val(data.surat_sehat.data.suhu);
                        $('#keadaan').val(data.surat_sehat.data.pf_kea_umum);
                        $("#kepala").val(data.surat_sehat.data.pf_kpl_leher);
                        $("#thorax").val(data.surat_sehat.data.pf_thorax);
                        $("#abdomen").val(data.surat_sehat.data.pf_abdomen);
                        $("#extremitas").val(data.surat_sehat.data.pf_extremitas);
                        $("#neurologis").val(data.surat_sehat.data.pf_neurologis);
                        $("#bwarna").val(data.surat_sehat.data.pf_bwarna);

                        $("#dok_sip").val(data.surat_sehat.data.dok_sip);
                        $("#dok_jabatan").val(data.surat_sehat.data.dok_jabatan);
                        $('#inDokter').val(dokter);
                        $('#modal_surat_sehat').modal('toggle');
                    } else {
                        $('#inDokter').val(dokter);
                        $('#modal_surat_sehat').modal('toggle');
                    }
                }
            });
            return false;

        }

        function tampilMedicSertif() {
            dokter = $('#inexamined').val();
            id_mcu = $('#id_mcu').val();
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/checkData",
                method: "POST",
                dataType: 'json',
                data: {
                    id_mcu: id_mcu
                },
                success: function (data) {
                    if (data.medic_sertif.status == "found") {
                        $('input[name="sehat"][value="' + data.medic_sertif.data.sehat + '"]').prop(
                            "checked", true);
                        $('#inTanggal').val(data.medic_sertif.data.tgl_periksa).change();
                        $('#inWeight').val(data.medic_sertif.data.berat_badan);
                        $('#inHigh').val(data.medic_sertif.data.tinggi_badan);
                        $('#tekanan_darah').val(data.medic_sertif.data.tekanan_darah);
                        $('#kebutuhan').val(data.medic_sertif.data.kebutuhan);
                        $('input[name="blind"][value="' + data.medic_sertif.data.blind + '"]').prop(
                            "checked", true);
                        $('#inDokter1').val(dokter);
                        $('#modal_medic_sertif').modal('toggle');
                    } else {
                        $('#inDokter1').val(dokter);
                        $('#modal_medic_sertif').modal('toggle');
                    }
                }
            });
            return false;

        }

        function tampilKesehatanRohani() {
            dokter = $('#inexamined').val();
            id_mcu = $('#id_mcu').val();
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/checkData",
                method: "POST",
                dataType: 'json',
                data: {
                    id_mcu: id_mcu
                },
                success: function (data) {
                    if (data.sehat_rohani.status == "found") {
                        $('input[name="sehat"][value="' + data.sehat_rohani.data.sehat + '"]').prop(
                            "checked", true);
                        $('#inTanggal').val(data.sehat_rohani.data.tgl_periksa).change();
                        $('#inPerlu').val(data.sehat_rohani.data.kebutuhan);
                        $('#inDokter2').val(dokter);
                        $('#modal_sehat_rohani').modal('toggle');
                    } else {
                        $('#inDokter2').val(dokter);
                        $('#modal_sehat_rohani').modal('toggle');
                    }
                }
            });
            return false;

        }

        function tampilButaWarna() {
            dokter = $('#inexamined').val();
            id_mcu = $('#id_mcu').val();
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/checkData",
                method: "POST",
                dataType: 'json',
                data: {
                    id_mcu: id_mcu
                },
                success: function (data) {
                    if (data.buta_warna.status == "found") {
                        $('input[name="sehat"][value="' + data.buta_warna.data.sehat + '"]').prop(
                            "checked", true);
                        $('#inTanggal').val(data.buta_warna.data.tgl_periksa).change();
                        $('#inDokter3').val(dokter);
                        $('#modal_buta_warna').modal('toggle');
                    } else {
                        $('#inDokter3').val(dokter);
                        $('#modal_buta_warna').modal('toggle');
                    }
                }
            });
            return false;

        }

        function tampilWarnaVisus() {
            dokter = $('#inexamined').val();
            id_mcu = $('#id_mcu').val();
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/checkData",
                method: "POST",
                dataType: 'json',
                data: {
                    id_mcu: id_mcu
                },
                success: function (data) {
                    if (data.buta_warna_visus.status == "found") {
                        $('input[name="sehat"][value="' + data.buta_warna_visus.data.sehat + '"]')
                            .prop("checked", true);
                        $('input[name="dekat"][value="' + data.buta_warna_visus.data.dekat + '"]')
                            .prop("checked", true);
                        $('input[name="jauh"][value="' + data.buta_warna_visus.data.jauh + '"]')
                            .prop("checked", true);
                        $('#inTanggal').val(data.buta_warna_visus.data.tgl_periksa).change();
                        $('#inDokter4').val(dokter);
                        $('#modal_warna_visus').modal('toggle');
                    } else {
                        $('#inDokter4').val(dokter);
                        $('#modal_warna_visus').modal('toggle');
                    }
                }
            });
            return false;

        }

        function tampilMantouxTest() {
            dokter = $('#inexamined').val();
            id_mcu = $('#id_mcu').val();
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/checkData",
                method: "POST",
                dataType: 'json',
                data: {
                    id_mcu: id_mcu
                },
                success: function (data) {
                    if (data.surat_mantoux.status == "found") {
                        $('input[name="sehat"][value="' + data.surat_mantoux.data.sehat + '"]')
                            .prop("checked", true);
                        $('#inTanggal').val(data.surat_mantoux.data.tgl_periksa).change();
                        $('#inDokter5').val(dokter);
                        $('#modal_mantoux_test').modal('toggle');
                    } else {
                        $('#inDokter5').val(dokter);
                        $('#modal_mantoux_test').modal('toggle');
                    }
                }
            });
            return false;

        }

        function tampilBebasTato() {
            dokter = $('#inexamined').val();
            id_mcu = $('#id_mcu').val();
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/checkData",
                method: "POST",
                dataType: 'json',
                data: {
                    id_mcu: id_mcu
                },
                success: function (data) {
                    if (data.bebas_tato.status == "found") {
                        $('input[name="sehat"][value="' + data.bebas_tato.data.sehat + '"]').prop(
                            "checked", true);
                        $('#inTanggal').val(data.bebas_tato.data.tgl_periksa).change();
                        $('#inPeriksa').val(data.bebas_tato.data.labor);
                        $('#jauh').val(data.bebas_tato.data.hasil);
                        $('#inDokter6').val(dokter);
                        $('#modal_bebas_tato').modal('toggle');
                    } else {
                        $('#inDokter6').val(dokter);
                        $('#modal_bebas_tato').modal('toggle');
                    }
                }
            });
            return false;

        }

        function tampilBebasNarkoba() {
            dokter = $('#inexamined').val();
            id_mcu = $('#id_mcu').val();
            $.ajax({
                url: "<?php echo base_url() ?>Surat_mcu/checkData",
                method: "POST",
                dataType: 'json',
                data: {
                    id_mcu: id_mcu
                },
                success: function (data) {
                    if (data.bebas_narkoba.status == "found") {
                        $('input[name="metamphetamine"][value="' + data.bebas_narkoba.data
                            .metamphetamine + '"]').prop("checked", true);
                        $('input[name="morphine"][value="' + data.bebas_narkoba.data.morphine +
                            '"]').prop("checked", true);
                        $('input[name="benzodiazepam"][value="' + data.bebas_narkoba.data
                            .benzodiazepam + '"]').prop("checked", true);
                        $('input[name="marijuana"][value="' + data.bebas_narkoba.data.marijuana +
                            '"]').prop("checked", true);
                        $('input[name="cocain"][value="' + data.bebas_narkoba.data.cocain + '"]')
                            .prop("checked", true);

                        $('#inTanggal').val(data.bebas_narkoba.data.tgl_periksa).change();
                        $('#inDokter7').val(dokter);
                        $('#modal_bebas_narkoba').modal('toggle');
                    } else {
                        $('#inDokter7').val(dokter);
                        $('#modal_bebas_narkoba').modal('toggle');
                    }
                }
            });
            return false;

        }
    </script>-->
</body>

</html>