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
							<h2 class="panel-title txt-dark"><strong>MEDICAL REPORT</strong></h2>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="table-wrap">
								<div class="table-responsive">
									<h4 class="panel-title txt-dark"><b><strong>1. DATA PRIBADI</strong></b></h4>



									<div class="row mt-20">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3 pt-5">Nama Lengkap</label>
												<div class="col-md-6 has-success">
													<input type="text" class="form-control" id="inName" disabled="" value="<?php echo $data_mcu['nama_pasien']; ?>">
													<p id="namefull" style="font-size:12px; margin-top:5px;"></p>
													<input type="hidden" id="intanggalmasuk" value="<?php echo date('Y-m-d H:i:s'); ?>">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3 pt-5">Tanggal Lahir</label>
												<div class="col-md-6 has-success">
													<input type="date" class="form-control" id="inDateofbirth" disabled="" value="<?php echo $data_mcu['tgl_lahir']; ?>">
													<p id="datebirth" style="font-size:12px; margin-top:5px;"></p>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3 pt-5">Pekerjaan</label>
												<div class="col-md-6 has-success">
													<input type="text" class="form-control" id="inOccupation" disabled="" value="<?php echo $data_mcu['occupation']; ?>">
													<p id="occupation" style="font-size:12px; margin-top:5px;"></p>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3 pt-5">Badge no</label>
												<div class="col-md-6 has-success">
													<input type="text" class="form-control" id="inbadge" disabled="" value="<?php echo $data_mcu['badge_no']; ?>">
													<p id="badgeno" style="font-size:12px; margin-top:5px;"></p>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3 pt-5">Jenis Kelamin</label>
												<div class="col-md-6 has-success">
													<input type="text" class="form-control" id="insex" disabled="" value="<?php echo $data_mcu['sex']; ?>">
													<input type="hidden" id="result_sex">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3 pt-5">Golongan Darah</label>
												<div class="col-md-6 has-success">
													<input type="text" class="form-control" id="result_blood" disabled="" value="<?php echo $data_mcu['blood_group']; ?>">
													<p id="resultblood" style="font-size:12px; margin-top:5px;"></p>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3 pt-5">Alamat</label>
												<div class="col-md-6 has-success">
													<input type="text" class="form-control" id="inAlamat" disabled="" value="<?php echo $data_mcu['alamat']; ?>">
													<input type="hidden" id="result_sex">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3 pt-5">Alamat Kantor</label>
												<div class="col-md-6 has-success">
													<input type="text" class="form-control" id="inComp" disabled="" value="<?php echo $data_mcu['alamat_comp']; ?>">
													<p id="resultblood" style="font-size:12px; margin-top:5px;"></p>
												</div>
											</div>
										</div>
									</div>
									<br>
									<br>
									<table class="table display product-overview mb-30" id="support_table">
										<thead>
											<tr>
												<th width="10px">No</th>
												<th width="500px">
													<center>Pertanyaan</center>
												</th>
												<th width="100px">
													<center>Ya</center>
												</th>
												<th width="100px">
													<center>Tidak</center>
												</th>
												<th>
													<center>Keterangan Jika Ya</center>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>a) Apakah Anda saat ini dalam perawatan medis atau menerima perawatan?
												</td>
												<td>
													<center>
														<input type="radio" name="rad1" id="rad1" value="1" class="rad1" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad1" id="rad2" value="2" class="rad1" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text1" style="display:none">
														<textarea rows="4" cols="80" id="intext1"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>b) Apakah Anda sedang minum obat, diresepkan atau tidak, injeksi, menggunakan inhaler atau baru saja melakukannya, atau Anda sedang menjalani diet khusus?
												</td>
												<td>
													<center>
														<input type="radio" name="rad2" id="rad3" value="3" class="rad2" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad2" id="rad4" value="4" class="rad2" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text2" style="display:none">
														<textarea rows="4" cols="80" id="intext2"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>Apakah anda pernah mengalami:</td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td>a) Sawan, Fobia, pusing atau gangguan mental atau saraf?
												</td>
												<td>
													<center>
														<input type="radio" name="rad3" id="rad5" value="5" class="rad3" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad3" id="rad6" value="6" class="rad3" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text3" style="display:none">
														<textarea rows="4" cols="80" id="intext3"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>b) Asma, bronkitis, pneumonia atau gangguan paru-paru lainnya?
												</td>
												<td>
													<center>
														<input type="radio" name="rad4" id="rad5" value="7" class="rad4" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad4" id="rad6" value="8" class="rad4" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text4" style="display:none">
														<textarea rows="4" cols="80" id="intext4"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>c) Rematik, demam reumatik, radang sendi atau gangguan sendi dan otot lainnya ?
												</td>
												<td>
													<center>
														<input type="radio" name="rad5" id="rad5" value="9" class="rad5" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad5" id="rad6" value="10" class="rad5" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text5" style="display:none">
														<textarea rows="4" cols="80" id="intext5"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>d) Nyeri dada, sesak napas, jantung berdebar, tekanan darah tinggi atau gangguan jantung atau sirkulasi lainnya?
												</td>
												<td>
													<center>
														<input type="radio" name="rad6" id="rad5" value="11" class="rad6" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad6" id="rad6" value="12" class="rad6" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text6" style="display:none">
														<textarea rows="4" cols="80" id="intext6"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>e) Gangguan pencernaan, tukak lambung, diare, sembelit atau keluhan usus, hepatitis atau gangguan hati lainnya atau diabetes
												</td>
												<td>
													<center>
														<input type="radio" name="rad7" id="rad5" value="13" class="rad7" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad7" id="rad6" value="14" class="rad7" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text7" style="display:none">
														<textarea rows="4" cols="80" id="intext7"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>f) ginjal, kandung kemih atau gangguan genitourinari lainnya?
												</td>
												<td>
													<center>
														<input type="radio" name="rad8" id="rad5" value="15" class="rad8" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad8" id="rad6" value="16" class="rad8" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text8" style="display:none">
														<textarea rows="4" cols="80" id="intext8"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>g) Adakah cedera, operasi, cacat fisik atau kelainan bentuk?
												</td>
												<td>
													<center>
														<input type="radio" name="rad9" id="rad5" value="17" class="rad9" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad9" id="rad6" value="18" class="rad9" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text9" style="display:none">
														<textarea rows="4" cols="80" id="intext9"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>h) Penyakit lain yang tidak disebutkan di atas?
												</td>
												<td>
													<center>
														<input type="radio" name="rad10" id="rad5" value="19" class="rad10" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad10" id="rad6" value="20" class="rad10" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text10" style="display:none">
														<textarea rows="4" cols="80" id="intext10"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>a) Pernahkah Anda menjadi pasien di rumah sakit, panti jompo atau klinik khusus?
												</td>
												<td>
													<center>
														<input type="radio" name="rad11" id="rad5" value="21" class="rad11" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad11" id="rad6" value="22" class="rad11" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text11" style="display:none">
														<textarea rows="4" cols="80" id="intext11"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>b) apakah anda pernah melakukan pemeriksaan medis?
												</td>
												<td>
													<center>
														<input type="radio" name="rad12" id="rad5" value="23" class="rad12" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad12" id="rad6" value="24" class="rad12" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text12" style="display:none">
														<textarea rows="4" cols="80" id="intext12"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>Apakah Anda pernah menderita penyakit menular seksual atau adakah gaya hidup Anda yang dapat membuat Anda berisiko terkena AIDS atau kondisi terkait AIDS?
												</td>
												<td>
													<center>
														<input type="radio" name="rad13" id="rad5" value="25" class="rad13" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad13" id="rad6" value="26" class="rad13" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text13" style="display:none">
														<textarea rows="4" cols="80" id="intext13"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td>5</td>
												<td><strong>Khusus Wanita:</strong> Apakah Anda pernah memiliki masalah ginekologi atau obstetrik?
												</td>
												<td>
													<center>
														<input type="radio" name="rad14" id="rad5" value="27" class="rad14" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad14" id="rad6" value="28" class="rad14" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text14" style="display:none">
														<textarea rows="4" cols="80" id="intext14"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td>6</td>
												<td>Apakah Anda pernah minum obat selain yang diresepkan oleh dokter?
												</td>
												<td>
													<center>
														<input type="radio" name="rad15" id="rad5" value="29" class="rad15" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad15" id="rad6" value="30" class="rad15" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text15" style="display:none">
														<textarea rows="4" cols="80" id="intext15"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td>7</td>
												<td>a) Non-Perokok: Apakah Anda pernah merokok di masa lalu?
												</td>
												<td>
													<center>
														<input type="radio" name="rad16" id="rad5" value="31" class="rad16" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad16" id="rad6" value="32" class="rad16" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<div id="text16" style="display:none">
														<textarea rows="4" cols="80" id="intext16"></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>b) Perokok : Berapa kali anda merokok per hari?
												</td>
												<td></td>
												<td></td>
												<td>
													<form>
														<input type="checkbox" name="smoke" onclick="displayResultsmoked(this.form)" value="Cigarettes">Rokok <br>
														<input type="checkbox" name="smoke" onclick="displayResultsmoked(this.form)" value="Cigars">Cerutu <br>
														<input type="checkbox" name="smoke" onclick="displayResultsmoked(this.form)" value="Pipes">Pipa Rokok
														<input type="hidden" id="result_smoked" size="60">
													</form>
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label col-md-6 pt-3">Jumlah Rokok yang dihisap</label>
															<div class="col-md-3 has-success">
																<input type="text" class="form-control" id="innumbersmoked">
																<p id="NumberSmoked" style="font-size:12px; margin-top:5px;"></p>
															</div>
															<label class="control-label col-md-3 pt-3"> batang/hari </label>
														</div>
													</div>

												</td>
											</tr>
											<tr>
												<td></td>
												<td>c) Berapa rata-rata konsumsi alkohol setiap hari?
												</td>
												<td></td>
												<td></td>
												<td>
													<div class="col-md-12">
														<div class="form-group">
															<div class="col-md-12 has-success">
																<input type="text" class="form-control" id="inalcohol">
																<p id="Alcohol" style="font-size:12px; margin-top:5px;"></p>
															</div>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<br>
									<h4><strong>-------------------------------------------------------------------------------------------------------------------------------------------</strong></h4>
									<br>
									<h4 class="panel-title txt-dark"><b><strong>2. RIWAYAT MEDIS KELUARGA</strong></b></h4>
									<table class="table display product-overview mb-30" id="support_table">
										<thead>
											<tr>
												<th width="100px"></th>
												<th width="300px">
													<center>Jika masih ada, Umur</center>
												</th>
												<th width="300px">
													<center>Keadaan Kesehatannya</center>
												</th>
												<th width="300px">
													<center>Jika Meninggal, pada umur berapa</center>
												</th>
												<th width="300px">
													<center>Penyebab kematiannya</center>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th width="100px">Ayah</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="inlivfather">
																	<p id="livfather" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="inhealthfather">
																	<p id="healthfather" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="indeadfather">
																	<p id="deadfather" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="incausedeadfather">
																	<p id="causedeadfather" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
											</tr>
											<tr>
												<th width="100px">Ibu</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="inlivmother">
																	<p id="livmother" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="inhealthmother">
																	<p id="healthmother" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="indeadmother">
																	<p id="deadmother" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="incausedeadmother">
																	<p id="causedeadmother" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
											</tr>
											<tr>
												<th width="100px">Saudara/Saudari</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="inlivbrosis">
																	<p id="livbrosis" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="inhealthbrosis">
																	<p id="healthbrosis" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="indeadbrosis">
																	<p id="deadbrosis" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="incausedeadbrosis">
																	<p id="causedeadbrosis" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
											</tr>
											<!-- New Column Bro Sis First-->
											<tr>
												<th width="100px">Saudara/Saudari</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="inlivbrosis1">
																	<p id="livbrosis1" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="inhealthbrosis1">
																	<p id="healthbrosis1" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="indeadbrosis1">
																	<p id="deadbrosis1" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="incausedeadbrosis1">
																	<p id="causedeadbrosis1" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
											</tr>
											<!-- New Column Bro Sis First-->
											<tr>
												<th width="100px">Saudara/Saudari</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="inlivbrosis2">
																	<p id="livbrosis2" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="inhealthbrosis2">
																	<p id="healthbrosis2" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="indeadbrosis2">
																	<p id="deadbrosis2" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
												<th width="300px">
													<center>
														<div class="col-md-12">
															<div class="form-group">
																<div class="col-md-12 has-success">
																	<input type="text" class="form-control" id="incausedeadbrosis2">
																	<p id="causedeadbrosis2" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</th>
											</tr>
										</tbody>
									</table>
									<br>
									<h4><strong>-------------------------------------------------------------------------------------------------------------------------------------------</strong></h4>
									<br>
									<h4 class="panel-title txt-dark"><b><strong>3. RINGKASAN RIWAYAT MEDIS MR/MRS</strong></b></h4>
									<label class="control-label">Apakah pemohon pernah atau sedang mengalami salah satu dari berikut ini? jika ya, berikan detail dalam deskripsi ringkasan</label>
									<div class="col-md-6">
										<div class="form-group">
											<table class="table display product-overview mb-30" id="support_table">
												<thead>
													<tr>
														<th width="10px">No</th>
														<th width="500px">
															<center>Pertanyaan</center>
														</th>
														<th width="100px">
															<center>YA</center>
														</th>
														<th width="100px">
															<center>TIDAK</center>
														</th>
														<!-- <th><center>Detail If Yes</center></th> -->
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>Infeksi Telinga / Sinusitis/ Vertigo
														</td>
														<td>
															<center>
																<input type="radio" name="Ear" onclick="displayResultEar(this.value)" value="Yes">
															</center>
														</td>
														<td>
															<center>
																<input type="radio" name="Ear" onclick="displayResultEar(this.value)" value="No">
															</center>
														</td>
														<input type="hidden" id="result_Ear">
													</tr>

													<tr>
														<td>2</td>
														<td>Masalah Hidung, Mulut atau Tenggorokan
														</td>
														<td>
															<center>
																<input type="radio" name="Nose" onclick="displayResultNose(this.value)" value="Yes">
															</center>
														</td>
														<td>
															<center>
																<input type="radio" name="Nose" onclick="displayResultNose(this.value)" value="No">
															</center>
														</td>
														<input type="hidden" id="result_Nose">
													</tr>
													<tr>
														<td>3</td>
														<td>Buta Warna / Kehilangan Penglihatan
														</td>
														<td>
															<center>
																<input type="radio" name="Color" onclick="displayResultColor(this.value)" value="Yes">
															</center>
														</td>
														<td>
															<center>
																<input type="radio" name="Color" onclick="displayResultColor(this.value)" value="No">
															</center>
														</td>
														<input type="hidden" id="result_Color">
													</tr>
													<tr>
														<td>4</td>
														<td>Sering Sakit Kepala / Pingsan
														</td>
														<td>
															<center>
																<input type="radio" name="Frequent" onclick="displayResultFrequent(this.value)" value="Yes">
															</center>
														</td>
														<td>
															<center>
																<input type="radio" name="Frequent" onclick="displayResultFrequent(this.value)" value="No">
															</center>
														</td>
														<input type="hidden" id="result_Frequent">
													</tr>
													<tr>
														<td>5</td>
														<td>Epilepsi / Gangguan Jiwa
														</td>
														<td>
															<center>
																<input type="radio" name="Epilepsy" onclick="displayResultEpilepsy(this.value)" value="Yes">
															</center>
														</td>
														<td>
															<center>
																<input type="radio" name="Epilepsy" onclick="displayResultEpilepsy(this.value)" value="No">
															</center>
														</td>
														<input type="hidden" id="result_Epilepsy">
													</tr>
													<tr>
														<td>6</td>
														<td>Hipertensi
														</td>
														<td>
															<center>
																<input type="radio" name="Hypertension" onclick="displayResultHypertension(this.value)" value="Yes">
															</center>
														</td>
														<td>
															<center>
																<input type="radio" name="Hypertension" onclick="displayResultHypertension(this.value)" value="No">
															</center>
														</td>
														<input type="hidden" id="result_Hypertension">
													</tr>
													<tr>
														<td>7</td>
														<td>Diabetes mellitus
														</td>
														<td>
															<center>
																<input type="radio" name="Diabetes" onclick="displayResultDiabetes(this.value)" value="Yes">
															</center>
														</td>
														<td>
															<center>
																<input type="radio" name="Diabetes" onclick="displayResultDiabetes(this.value)" value="No">
															</center>
														</td>
														<input type="hidden" id="result_Diabetes">
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<table class="table display product-overview mb-30" id="support_table">
												<thead>
													<tr>
														<th width="10px">No</th>
														<th width="500px">
															<center>Pertanyaan</center>
														</th>
														<th width="100px">
															<center>YA</center>
														</th>
														<th width="100px">
															<center>TIDAK</center>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>8</td>
														<td>Gangguan Endokrin
														</td>
														<td>
															<center>
																<input type="radio" name="Endocrione" onclick="displayResultEndocrione(this.value)" value="Yes">
															</center>
														</td>
														<td>
															<center>
																<input type="radio" name="Endocrione" onclick="displayResultEndocrione(this.value)" value="No">
															</center>
														</td>
														<input type="hidden" id="result_Endocrione">
													</tr>
													<tr>
														<td>9</td>
														<td>Hernia/ Hidrokel/ Wasir/ Fisura
														</td>
														<td>
															<center>
																<input type="radio" name="Hernia" onclick="displayResultHernia(this.value)" value="Yes">
															</center>
														</td>
														<td>
															<center>
																<input type="radio" name="Hernia" onclick="displayResultHernia(this.value)" value="No">
															</center>
														</td>
														<input type="hidden" id="result_Hernia">
													</tr>
													<tr>
														<td>10</td>
														<td>Fistula/ Appendicitis/ Varicocele
														</td>
														<td>
															<center>
																<input type="radio" name="Fistula" onclick="displayResultFistula(this.value)" value="Yes">
															</center>
														</td>
														<td>
															<center>
																<input type="radio" name="Fistula" onclick="displayResultFistula(this.value)" value="No">
															</center>
														</td>
														<input type="hidden" id="result_Fistula">
													</tr>
													<tr>
														<td>11</td>
														<td>Malaria/ Penyakit Tropis
														</td>
														<td>
															<center>
																<input type="radio" name="Malaria" onclick="displayResultMalaria(this.value)" value="Yes">
															</center>
														</td>
														<td>
															<center>
																<input type="radio" name="Malaria" onclick="displayResultMalaria(this.value)" value="No">
															</center>
														</td>
														<input type="hidden" id="result_Malaria">
													</tr>
													<tr>
														<td>12</td>
														<td>Penyakit Kulit
														</td>
														<td>
															<center>
																<input type="radio" name="Skin" onclick="displayResultSkin(this.value)" value="Yes">
															</center>
														</td>
														<td>
															<center>
																<input type="radio" name="Skin" onclick="displayResultSkin(this.value)" value="No">
															</center>
														</td>
														<input type="hidden" id="result_Skin">
													</tr>
													<tr>
														<td>13</td>
														<td>Kanker atau Tumor
														</td>
														<td>
															<center>
																<input type="radio" name="Cance" onclick="displayResultCance(this.value)" value="Yes">
															</center>
														</td>
														<td>
															<center>
																<input type="radio" name="Cance" onclick="displayResultCance(this.value)" value="No">
															</center>
														</td>
														<input type="hidden" id="result_Cance">
													</tr>
													<tr>
														<td>14</td>
														<td>Alergi Terhadap Makanan atau Obat - obatan
														</td>
														<td>
															<center>
																<input type="radio" name="Allergy" onclick="displayResultAllergy(this.value)" value="Yes">
															</center>
														</td>
														<td>
															<center>
																<input type="radio" name="Allergy" onclick="displayResultAllergy(this.value)" value="No">
															</center>
														</td>
														<input type="hidden" id="result_Allergy">
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<br>
									<h4><strong>-------------------------------------------------------------------------------------------------------------------------------------------</strong></h4>
									<br>
									<h4 class="panel-title txt-dark"><b><strong>4. LAPORAN PEMERIKSA MEDIS</strong></b></h4>
									<label class="control-label">Jika Anda menjawab Ya untuk salah satu pertanyaan berikut, harap berikan rincian lengkap dengan penyebab yang dapat dipastikan apa pun yang dapat diterapkan</label>
									<table class="table display product-overview mb-30" id="support_table">
										<thead>
											<tr>
												<th width="10px">No</th>
												<th width="500px">
													<center>Pertanyaan</center>
												</th>
												<th width="100px">
													<center>YA</center>
												</th>
												<th width="100px">
													<center>NO</center>
												</th>
												<th>
													<center>Keterangannya jika YA</center>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>8</td>
												<td>Pengukuran dan Deskripsi Fisik</td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td>a) Pengukuran (to be taken in indoor clothing)
												</td>
												<td>
													<center>
														<input type="radio" name="rad17" id="rad17" value="33" class="rad17" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad17" id="rad17" value="34" class="rad17" />
													</center>
												</td>
												<td>
													<center>
														<div id="text17" style="display:none">
															<!-- form yang mau ditampilkan-->
															<div class="col-md-6">
																<div class="form-group">
																	<label class="control-label col-md-3 pt-5">Tinggi</label>
																	<div class="col-md-6 has-success">
																		<input type="text" class="form-control" id="inheight">
																	</div>
																	<p id="height" style="font-size:12px; margin-top:5px;">cm</p>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label class="control-label col-md-3 pt-5">Berat</label>
																	<div class="col-md-6 has-success">
																		<input type="text" class="form-control" id="inweight">
																	</div>
																	<p id="weight" style="font-size:12px; margin-top:5px;">kg</p>
																</div>
															</div>
														</div>
													</center>
												</td>

											</tr>
											<tr>
												<td></td>
												<td>b) Mohon Jelaskan Tampilannya secara Umum :
												</td>
												<td>
													<center>
														<input type="radio" name="rad18" id="rad3" value="35" class="rad18" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad18" id="rad4" value="36" class="rad18" />
													</center>
												</td>
												<td>
													<center>
														<!-- form yang mau ditampilkan-->
														<div id="text18" style="display:none">
															<div class="col-md-6">
																<div class="form-group">
																	<label class="control-label col-md-3 pt-5">BMI</label>
																	<div class="col-md-6 has-success">
																		<input type="text" class="form-control" id="inbmi">
																	</div>
																	<p id="bmi" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</td>

											</tr>
											<tr>
												<td></td>
												<td>c) Apakah terdapat tanda-tanda kencaduan alkohol, tembakau atau gaya hidup yang tidak teratur pada masa lalu atau saat ini ?
												</td>
												<td>
													<center>
														<input type="radio" name="rad19" id="rad5" value="37" class="rad19" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad19" id="rad6" value="38" class="rad19" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<center>
														<div id="text19" style="display:none">
															<textarea rows="4" cols="40" id="intext19"></textarea>
														</div>
													</center>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>d) Apakah terdapat pembesaran kelenjar getah bening atau kelenjar tiroid ?
												</td>
												<td>
													<center>
														<input type="radio" name="rad20" id="rad7" value="39" class="rad20" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad20" id="rad8" value="40" class="rad20" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<center>
														<div id="text20" style="display:none">
															<textarea rows="4" cols="40" id="intext20"></textarea>
														</div>
													</center>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>e) Apakah ada bekas luka yang signifikan
												</td>
												<td>
													<center>
														<input type="radio" name="rad21" id="rad9" value="41" class="rad21" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad21" id="rad10" value="42" class="rad21" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<center>
														<div id="text21" style="display:none">
															<textarea rows="4" cols="40" id="intext21"></textarea>
														</div>
													</center>
												</td>
											</tr>

											<tr>
												<td>9</td>
												<td>Sistem Kardiovaskular dan Tekanan Darah</td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td>a) Apakah jantung tampak membesar? <br>
													jika "Ya" apakah Anda menganggap ini sedikit, sedang atau ditandai?
												</td>
												<td>
													<center>
														<input type="radio" name="rad22" id="rad11" value="43" class="rad22" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad22" id="rad12" value="44" class="rad22" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<center>
														<div id="text22" style="display:none">
															<textarea rows="4" cols="40" id="intext22"></textarea>
														</div>
													</center>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>b) Apakah adanya ketidakaturan ritmetnya ?
												</td>
												<td>
													<center>
														<input type="radio" name="rad23" id="rad13" value="45" class="rad23" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad23" id="rad14" value="46" class="rad23" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<center>
														<div id="text23" style="display:none">
															<textarea rows="4" cols="40" id="intext23"></textarea>
														</div>
													</center>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>c) Apakah ada kelainan pada nadi arteri?
												</td>
												<td>
													<center>
														<input type="radio" name="rad24" id="rad15" value="47" class="rad24" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad24" id="rad16" value="48" class="rad24" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<center>
														<div id="text24" style="display:none">
															<textarea rows="4" cols="40" id="intext24"></textarea>
														</div>
													</center>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>d) Apakah ada varises?
												</td>
												<td>
													<center>
														<input type="radio" name="rad25" id="rad17" value="49" class="rad25" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad25" id="rad18" value="50" class="rad25" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<center>
														<div id="text25" style="display:none">
															<textarea rows="4" cols="40" id="intext25"></textarea>
														</div>
													</center>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>e) Tekanan Darah : (Tolong dicatat keterangan)
												</td>
												<td>
													<center>
														<input type="radio" name="rad26" id="rad19" value="51" class="rad26" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad26" id="rad20" value="52" class="rad26" />
													</center>
												</td>
												<td>
													<center>
														<div id="text26" style="display:none">
															<!-- form yang mau ditampilkan-->

															<div class="col-md-6">
																<div class="form-group">
																	<div class="col-md-6 has-success">
																		<label class="control-label">Systolic/Diastolic</label>
																		<input type="text" class="form-control" id="insystolic">
																	</div>
																	<p id="systolic" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
															<div class="col-md-6">
																<div class="col-md-6 has-success">
																	<div class="form-group">
																		<label class="control-label">Denyut Nadi</label>
																		<input type="text" class="form-control" id="inpulse">
																	</div>
																	<p id="pulse" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</td>
											</tr>
											<tr>
												<td>10</td>
												<td>Sistem pernapasan</td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td>a)Apakah ada kelainan pada bentuk dan perkembangan dada?
												</td>
												<td>
													<center>
														<input type="radio" name="rad27" id="rad21" value="53" class="rad27" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad27" id="rad22" value="54" class="rad27" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<center>
														<div id="text27" style="display:none">
															<textarea rows="4" cols="40" id="intext27"></textarea>
														</div>
													</center>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>b) Apakah ada tanda-tanda fisik yang abnormal pada paru-paru ?
												</td>
												<td>
													<center>
														<input type="radio" name="rad28" id="rad23" value="55" class="rad28" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad28" id="rad24" value="56" class="rad28" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<center>
														<div id="text28" style="display:none">
															<textarea rows="4" cols="40" id="intext28"></textarea>
														</div>
													</center>
												</td>
											</tr>
											<tr>
												<td>11</td>
												<td>Genito/ Sistem Kencing dan Pencernaan</td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td>a) Apakah tes urin tidak normal?
												</td>
												<td>
													<center>
														<input type="radio" name="rad29" id="rad25" value="57" class="rad29" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad29" id="rad26" value="58" class="rad29" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<center>
														<div id="text29" style="display:none">
															<textarea rows="4" cols="40" id="intext29"></textarea>
														</div>
													</center>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>b) Apakah ada nyeri tekan abnormal, pembesaran atau kelainan teraba lainnya di perut?
												</td>
												<td>
													<center>
														<input type="radio" name="rad30" id="rad27" value="59" class="rad30" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad30" id="rad28" value="60" class="rad30" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<center>
														<div id="text30" style="display:none">
															<textarea rows="4" cols="40" id="intext30"></textarea>
														</div>
													</center>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>c) Apakah ada hernia ?
												</td>
												<td>
													<center>
														<input type="radio" name="rad31" id="rad29" value="61" class="rad31" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad31" id="rad30" value="62" class="rad31" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<center>
														<div id="text31" style="display:none">
															<textarea rows="4" cols="40" id="intext31"></textarea>
														</div>
													</center>
												</td>
											</tr>
											<tr>
												<td>12</td>
												<td>Sistem saraf</td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td>a) Apakah ada tanda-tanda penyakit pada sistem saraf pusat ?
												</td>
												<td>
													<center>
														<input type="radio" name="rad32" id="rad31" value="63" class="rad32" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad32" id="rad32" value="64" class="rad32" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<center>
														<div id="text32" style="display:none">
															<textarea rows="4" cols="40" id="intext32"></textarea>
														</div>
													</center>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>b) Apakah ada sesuatu yang menunjukkan kecenderungan gangguan kejiwaan?
												</td>
												<td>
													<center>
														<input type="radio" name="rad33" id="rad33" value="65" class="rad33" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad33" id="rad34" value="66" class="rad33" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<center>
														<div id="text33" style="display:none">
															<textarea rows="4" cols="40" id="intext33"></textarea>
														</div>
													</center>
												</td>
											</tr>
											<tr>
												<td>13</td>
												<td>Organ Indera</td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td>a) Apakah ada pengaruh terhadap mata, telinga, hidung atau lidah
												</td>
												<td>
													<center>
														<input type="radio" name="rad34" id="rad35" value="67" class="rad34" />
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad34" id="rad36" value="68" class="rad34" />
													</center>
												</td>
												<td>
													<!-- form yang mau ditampilkan-->
													<center>
														<div id="text34" style="display:none">
															<textarea rows="4" cols="40" id="intext34"></textarea>
														</div>
													</center>
												</td>
											</tr>
										</tbody>
									</table>
									<table class="table display product-overview mb-30" id="support_table">
										<thead>
											<tr>
												<th width="10px">Penglihatan</th>
												<th width="500px">Penglihatan Jauh</center>
												</th>
												<th width="500px">Penglihatan Dekat</center>
												</th>
												<th width="500px">Penglihatan Warna</center>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Tidak terkoreksi</td>
												<td>
													<div class="col-md-6 has-success">
														<label class="control-label">OO</label>
														<input type="text" class="form-control" id="inuncorrected1">
														<p id="uncorrected1" style="font-size:12px; margin-top:5px;"></p>
													</div>
													<div class="col-md-6 has-success">
														<label class="control-label">OS</label>
														<input type="text" class="form-control" id="inuncorrected2">
														<p id="uncorrected2" style="font-size:12px; margin-top:5px;"></p>
													</div>
												</td>
												<td>
													<div class="col-md-6 has-success">
														<label class="control-label">OO</label>
														<input type="text" class="form-control" id="inuncorrected3">
														<p id="uncorrected3" style="font-size:12px; margin-top:5px;"></p>
													</div>
													<div class="col-md-6 has-success">
														<label class="control-label">OS</label>
														<input type="text" class="form-control" id="inuncorrected4">
														<p id="uncorrected4" style="font-size:12px; margin-top:5px;"></p>
													</div>
												</td>
												<td>
													<div class="form-group">
														<label class="control-label col-md-3 pt-5">Adequate</label>
														<div class="col-md-6 has-success">
															<input type="radio" name="rad35" id="rad38" value="70" class="rad35" />
															<p id="adequate" style="font-size:12px; margin-top:5px;"></p>
														</div>
													</div>
												</td>

											</tr>
											<tr>
												<td>Corrected</td>
												<td>
													<div class="col-md-6 has-success">
														<label class="control-label">OO</label>
														<input type="text" class="form-control" id="incorrected1">
														<p id="corrected1" style="font-size:12px; margin-top:5px;"></p>
													</div>
													<div class="col-md-6 has-success">
														<label class="control-label">OS</label>
														<input type="text" class="form-control" id="incorrected2">
														<p id="corrected2" style="font-size:12px; margin-top:5px;"></p>
													</div>
												</td>
												<td>
													<div class="col-md-6 has-success">
														<label class="control-label">OO</label>
														<input type="text" class="form-control" id="incorrected3">
														<p id="corrected3" style="font-size:12px; margin-top:5px;"></p>
													</div>
													<div class="col-md-6 has-success">
														<label class="control-label">OS</label>
														<input type="text" class="form-control" id="incorrected4">
														<p id="corrected4" style="font-size:12px; margin-top:5px;"></p>
													</div>
												</td>
												<td>

													<div class="form-group">
														<label class="control-label col-md-3 pt-5">Defective</label>
														<div class="col-md-6 has-success">
															<input type="radio" name="rad35" id="rad37" value="69" class="rad35" />
															<p id="rad37" style="font-size:12px; margin-top:5px;"></p>
														</div>
													</div>
													<center>
														<div id="text35" style="display:none">
															<textarea rows="2" cols="20" id="intext35"></textarea>
														</div>
													</center>
												</td>

											</tr>
										</tbody>
									</table>
									<label class="control-label ">Catatan : </label>
									<div id="remark">
										<textarea rows="4" cols="80" id="inremarks"></textarea>
									</div>
									<br>
									<h4><strong>-------------------------------------------------------------------------------------------------------------------------------------------</strong></h4>
									<br>
									<h4 class="panel-title txt-dark"><strong>5. HASIL PEMERIKSAAN DAN LAPORAN</strong></h4>
									<br>
									<p class=" txt-dark"><b>Laporan pemeriksaan laboratorium X-Ray, Audiogram dan urin berdarah</b></p><br>
									<p class="txt-dark"><b>Semua hasil pemeriksaan dilampirkan. Tolong, tunjukkan komentar Anda jika ada hasil yang tidak normal</b></p>
									<div class="col-md-9">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">1. Laporan Rontgen Dada</label>
											<div class="col-md-6 has-success">
												<input type="text" class="form-control" id="inChest">
												<p id="inChest" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>

									<div class="col-md-9">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">2. Laporan ECG</label>
											<div class="col-md-6 has-success">
												<input type="text" class="form-control" id="inEcg">
												<p id="inEcg" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
									<div class="col-md-9">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">3. Laporan Audiogram</label>
											<div class="col-md-6 has-success">
												<input type="text" class="form-control" id="inAudiogram">
												<p id="inAudiogram" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label col-md-10 pt-5">4. Laporan pemeriksaan darah (Harap lampirkan hasil pemeriksaan berikut atau tunjukkan di sini di bawah hasilnya): </label>
										</div>
									</div>
									<br>
									<br>

									<div class="panel-wrapper collapse in">
										<div class="panel-body">
											<div class="form-wrap">
												<form class="form-horizontal">
													<input type="hidden" id="result_bloodr" size="60">
													<div class="col-sm-12">
														<div class="row">
															<div class="col-sm-4">
																<div class="col-md-9">
																	<div class="form-group">
																		<label class="control-label mb-5 col-sm-10 text-left">1) Heamogoblin</label>

																		<input type="checkbox" name="blood" onclick="displayResultbloodr(this.form)" value="Heamogoblin">

																	</div>
																</div>


																<div class="col-sm-9">
																	<div class="form-group">
																		<label class="control-label mb-10 col-sm-10 text-left">2) RBC</label>

																		<input type="checkbox" name="blood" onclick="displayResultbloodr(this.form)" value="RBC">
																	</div>
																</div>


																<div class="col-sm-9">
																	<div class="form-group">
																		<label class="control-label mb-10 col-sm-10 text-left">3) ESR</label>

																		<input type="checkbox" name="blood" onclick="displayResultbloodr(this.form)" value="ESR">
																	</div>
																</div>

																<div class="col-sm-9">
																	<div class="form-group">
																		<label class="control-label mb-10 col-sm-10 text-left">4) WBC</label>



																		<input type="checkbox" name="blood" onclick="displayResultbloodr(this.form)" value="WBC">
																	</div>
																</div>

																<div class="col-sm-9">
																	<div class="form-group">
																		<label class="control-label mb-10 col-sm-10 text-left">5) Neutrophils</label>



																		<input type="checkbox" name="blood" onclick="displayResultbloodr(this.form)" value="Neutrophils">
																	</div>
																</div>

																<div class="col-sm-9">
																	<div class="form-group">
																		<label class="control-label mb-10 col-sm-10 text-left">6) Lymphocytes</label>



																		<input type="checkbox" name="blood" onclick="displayResultbloodr(this.form)" value="Lymphocytes">
																	</div>
																</div>


																<div class="col-sm-9">
																	<div class="form-group">
																		<label class="control-label mb-10 col-sm-10 text-left">7) Monocytes</label>

																		<input type="checkbox" name="blood" onclick="displayResultbloodr(this.form)" value="Monocytes">
																	</div>
																</div>


																<div class="col-sm-9">
																	<div class="form-group">
																		<label class="control-label mb-10 col-sm-10 text-left">8) Eosinophils</label>

																		<input type="checkbox" name="blood" onclick="displayResultbloodr(this.form)" value="Eosinophils">
																	</div>
																</div>

															</div>
												</form>

												<form>
													<input type="hidden" id="result_Basophils" size="60">
													<div class="col-sm-4">
														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">9) Basophils</label>

																<input type="checkbox" name="Basophils" onclick="displayResultBasophils(this.form)" value="Basophils">
															</div>
														</div>


														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">10) MCV (**)</label>

																<input type="checkbox" name="Basophils" onclick="displayResultBasophils(this.form)" value="MCV">
															</div>
														</div>

														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">11) MCM(**)</label>

																<input type="checkbox" name="Basophils" onclick="displayResultBasophils(this.form)" value="MCM">
															</div>
														</div>

														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">12) MCHC(**)</label>

																<input type="checkbox" name="Basophils" onclick="displayResultBasophils(this.form)" value="MCHC">
															</div>
														</div>

														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">13) Platelet</label>

																<input type="checkbox" name="Basophils" onclick="displayResultBasophils(this.form)" value="Platelet">
															</div>
														</div>


														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">14) Reticulocyte(**)</label>

																<input type="checkbox" name="Basophils" onclick="displayResultBasophils(this.form)" value="Reticulocyte">
															</div>
														</div>

														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">15) Hematocrit</label>

																<input type="checkbox" name="Basophils" onclick="displayResultBasophils(this.form)" value="Hematocrit">
															</div>
														</div>

														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">16) Glycemia</label>

																<input type="checkbox" name="Basophils" onclick="displayResultBasophils(this.form)" value="Glycemia">
															</div>
														</div>

													</div>
												</form>
												<form>
													<input type="hidden" id="result_urea" size="60">
													<div class="col-sm-4">
														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">17) Gangguan Urea Darah</label>


																<input type="checkbox" name="urea" onclick="displayResulturea(this.form)" value="Blood Urea disorder">
															</div>
														</div>

														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">18) Kolestrol</label>

																<input type="checkbox" name="urea" onclick="displayResulturea(this.form)" value="Cholesterol">
															</div>
														</div>

														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">19) Total Bilirubine</label>

																<input type="checkbox" name="urea" onclick="displayResulturea(this.form)" value="Total Bilirubine">
															</div>
														</div>

														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">20) Bilirubine Langsung</label>

																<input type="checkbox" name="urea" onclick="displayResulturea(this.form)" value="Direct Bilirubine">
															</div>
														</div>

														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">21) Alkaline Phosphatase</label>

																<input type="checkbox" name="urea" onclick="displayResulturea(this.form)" value="Alkaline Phosphatase">
															</div>
														</div>

														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">22) AST (SGOT)</label>

																<input type="checkbox" name="urea" onclick="displayResulturea(this.form)" value="AST (SGOT)">
															</div>
														</div>

														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">23) ALT (SGPT)</label>

																<input type="checkbox" name="urea" onclick="displayResulturea(this.form)" value="ALT (SGPT)">
															</div>
														</div>

														<div class="col-sm-9">
															<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">24) GAMMA GT</label>

																<input type="checkbox" name="urea" onclick="displayResulturea(this.form)" value="GAMMA GT">
															</div>
														</div>


													</div>

											</div>
										</div>

										</form>
									</div>
								</div>
							</div>

							<div class="col-md-9">
								<div class="form-group">
									<label class="control-label col-md-5 pt-5">5. Laporan Pemeriksaan Urine</label>
									<div class="col-md-6 has-success">
										<input type="text" class="form-control" id="inurine">
										<p id="urine" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>

							<div class="col-md-9">
								<div class="form-group">
									<label class="control-label col-md-5 pt-5">6. Pengaruh Obat - Obatan, laporan test skrining alkohol</label>
									<div class="col-md-6 has-success">
										<input type="text" class="form-control" id="indrugs">
										<p id="drugs" style="font-size:12px; margin-top:5px;"></p>
									</div>
								</div>
							</div>


							<div class="col-md-9">
								<table>
									<thead>
										<tr>
											<td class="col-sm-1 txt-dark">7.</td>
											<td>
												<form>
													<input type="checkbox" name="HIV" onclick="displayResultHIV(this.form)" value="HIV Test "> HIV Test (**)
													<input type="hidden" name="HIV" onclick="displayResultHIV(this.form)" value="No">
													<input type="hidden" id="result_HIV" size="60">
												</form>
											</td>
										</tr>

										<tr>
											<td class="col-sm-1 txt-dark">8.</td>
											<td>
												<form>
													<input type="checkbox" name="Tine" onclick="displayResultTine(this.form)" value="Tine"> Tine (Tuberculin test)(**)
													<input type="hidden" name="Tine" onclick="displayResultTine(this.form)" value="No">
													<input type="hidden" id="result_Tine" size="60">
												</form>
											</td>
										</tr>

										<tr>
											<td class="col-sm-1 txt-dark">9.</td>
											<td>
												<table width="100%">

													<tr>
														<form>
															<input type="hidden" id="result_HB" size="60">
															<td>
																<input type="checkbox" name="HB" onclick="displayResultHB(this.form)" value="HbsAg">HbsAg
															</td>
															<td>
																<input type="checkbox" name="HB" onclick="displayResultHB(this.form)" value="HBsAb">HBsAb
															</td>
															<td>
																<input type="checkbox" name="HB" onclick="displayResultHB(this.form)" value="HBcAb">HBcAb
															</td>
															<td>
																<input type="checkbox" name="HB" onclick="displayResultHB(this.form)" value="HBeAg">HBeAg
															</td>
															<td>
																<input type="checkbox" name="HB" onclick="displayResultHB(this.form)" value="HBeAb">HBeAb
															</td>
														</form>
													</tr>

												</table>
											</td>
										</tr>

										<tr>
											<td class="col-sm-1 txt-dark">10.</td>
											<td>
												<form>
													<input type="checkbox" name="TPHA" onclick="displayResultTPHA(this.form)" value="TPHA"> TPHA
													<input type="hidden" name="TPHA" onclick="displayResultTPHA(this.form)" value="No">
													<input type="hidden" id="result_TPHA" size="60">
												</form>
											</td>
										</tr>

										<tr>
											<td class="col-sm-1 txt-dark">11.</td>
											<td>
												<form>
													<input type="checkbox" name="Stool" onclick="displayResultStool(this.form)" value="Stool examination">Stool examination (**)
													<input type="hidden" name="Stool" onclick="displayResultStool(this.form)" value="No">
													<input type="hidden" id="result_Stool" size="60">
												</form>
											</td>
										</tr>

										<tr>
											<td class="col-sm-1 txt-dark">12.</td>
											<td>
												<form>
													<input type="checkbox" name="Pharyngeal" onclick="displayResultPharyngeal(this.form)" value="Pharyngeal plug test">Tes sumbat faring (**)
													<input type="checkbox" name="Pharyngeal" onclick="displayResultPharyngeal(this.form)" value="No">
													<input type="hidden" id="result_Pharyngeal" size="60">
												</form>
											</td>
										</tr>

										<tr>
											<td class="col-sm-1 txt-dark">13.</td>
											<td>
												<form>
													<input type="checkbox" name="Spirometry" onclick="displayResultSpirometry(this.form)" value="Spirometry Test">Tes Spirometri
													<input type="checkbox" name="Spirometry" onclick="displayResultSpirometry(this.form)" value="No">
													<input type="hidden" id="result_Spirometry" size="60">
												</form>
											</td>
										</tr>
									</thead>
								</table>
							</div>
							<div class="col-md-9">
								<p class=" txt-dark"><b>(**) Hanya jika diperlukan</b></p>
								<br>
								<h4 class="panel-title txt-dark"><strong>6. RINGKASAN KESELURUHAN, PENILAIAN DAN REKOMENDASI</strong></h4>
								<div class="col-sm-9">
									<div id="summary">
										<textarea class="txt-dark" rows="4" cols="120" id="insummary"></textarea>
									</div>
								</div>

								<br><br><br><br><br>
								<div class="form-group">
									<label class="control-label col-md-4 pt-5">Sertifikat Medis ini berlaku sampai:</label>
									<div class="col-md-3 has-success">
										<input type="date" class="form-control" id="inpresent">
									</div>
								</div>
								<br><br>
								<div class="form-group">
									<label class="control-label col-md-4 pt-5">Saya telah memeriksa MR / MRS</label>
									<div class="col-md-3 has-success">
										<select class="form-control filled-input select2" placeholder="pilih dokter" style="border: 1px solid lightgreen;" tabindex="1" id="inexamined">

											<?php
											foreach ($data_dokter as $row) :
											?>
												<option value="<?php echo $row->nama; ?>">
													<?php echo $row->nama; ?></option>
											<?php endforeach ?>
										</select>
									</div>
									<label class="control-label col-md-4 pt-5">dan menemukannya (centang kotak)<br></label>
								</div>
								<br>
								<br>
								<br>
								<form>
									<div class="col-sm-4">
										<input type="checkbox" id="Duty1" name="Duty" onclick="displayResultDuty(this.form)" value="FIT for duty">
										<label class="control-label" for="Duty1">FIT for duty</label>
									</div>

									<div class="col-sm-4">
										<input type="checkbox" id="Duty2" name="Duty" onclick="displayResultDuty(this.form)" value="UNFIT for duty">
										<label class="control-label" for="Duty2">UNFIT for duty</label>
									</div>
									<div class="col-sm-4">
										<input type="checkbox" id="Duty3" name="Duty" onclick="displayResultDuty(this.form)" value="Pending">
										<label class="control-label" for="Duty3">Pending</label>
									</div>
									<input type="hidden" id="result_Duty" size="60">
									<br>
									<br>
								</form>
								<div class="modal-footer mb-5 mr-5 mt-10">
									<input type="hidden" id="id_mcu" value="<?php echo $data_mcu['id_mcu']; ?>">
									<button onclick="insertData()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
									<hr>

								</div>
								<div class="row ">
									<div class="col-md-5">
										<button onclick="tampilSuratSehat()" class="btn btn-success btn-anim  btn-sm "><i class="icon-rocket"></i><span class="btn-text">SURAT KETERANGAN SEHAT</span></button>
										<span class="help-block"></span>
									</div>
									<div class="col-md-5">
										<button onclick="tampilMedicSertif()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SERTIFIKAT MEDIS</span></button>
										<span class="help-block"></span>
									</div>
									<div class="col-md-5">
										<button onclick="tampilKesehatanRohani()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SURAT KETERANGAN ROHANI</span></button>
										<span class="help-block"></span>
									</div>
									<div class="col-md-5">
										<button onclick="tampilButaWarna()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SURAT KETERANGAN BUTA WARNA</span></button>
										<span class="help-block"></span>
									</div>
									<div class="col-md-5">
										<button onclick="tampilWarnaVisus()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SURAT KETERANGAN BUTA WARNA & VISUS</span></button>
										<span class="help-block"></span>
									</div>
									<div class="col-md-5">
										<button onclick="tampilMantouxTest()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SURAT KETERANGAN MANTOUX TEST</span></button>
										<span class="help-block"></span>
									</div>
									<div class="col-md-5">
										<button onclick="tampilBebasTato()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SURAT KETERANGAN BEBAS TATO</span></button>
										<span class="help-block"></span>
									</div>
									<div class="col-md-5">
										<button onclick="tampilBebasNarkoba()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SURAT KETERANGAN BEBAS NARKOBA</span></button>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->

					<!-- /Modal Tambah Pasien-->
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<!-- sample modal content -->
							<div class="modal fade modal-printmcu" id="modal_print_mcu" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> Data Pemeriksaan Medis</h5>
									</div>
									<div class="modal-body mt-20">
										<div class="form-body">
											<h6 class="txt-dark capitalize-font"><i class="icon-user mr-10 mt-20"></i><b>Silahkan Pilih Data yang ingin Anda Cetak</b></h6>
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
			<script type="text/javascript">
				$(function() {
					$(":radio.rad1").click(function() {
						if ($(this).val() == "1") {
							$("#text1").show();
						}
						if ($(this).val() == "2") {
							$("#text1").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad2").click(function() {
						if ($(this).val() == "3") {
							$("#text2").show();
						}
						if ($(this).val() == "4") {
							$("#text2").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad3").click(function() {
						if ($(this).val() == "5") {
							$("#text3").show();
						}
						if ($(this).val() == "6") {
							$("#text3").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad4").click(function() {
						if ($(this).val() == "7") {
							$("#text4").show();
						}
						if ($(this).val() == "8") {
							$("#text4").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad5").click(function() {
						if ($(this).val() == "9") {
							$("#text5").show();
						}
						if ($(this).val() == "10") {
							$("#text5").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad6").click(function() {
						if ($(this).val() == "11") {
							$("#text6").show();
						}
						if ($(this).val() == "12") {
							$("#text6").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad7").click(function() {
						if ($(this).val() == "13") {
							$("#text7").show();
						}
						if ($(this).val() == "14") {
							$("#text7").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad8").click(function() {
						if ($(this).val() == "15") {
							$("#text8").show();
						}
						if ($(this).val() == "16") {
							$("#text8").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad9").click(function() {
						if ($(this).val() == "17") {
							$("#text9").show();
						}
						if ($(this).val() == "18") {
							$("#text9").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad10").click(function() {
						if ($(this).val() == "19") {
							$("#text10").show();
						}
						if ($(this).val() == "20") {
							$("#text10").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad11").click(function() {
						if ($(this).val() == "21") {
							$("#text11").show();
						}
						if ($(this).val() == "22") {
							$("#text11").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad12").click(function() {
						if ($(this).val() == "23") {
							$("#text12").show();
						}
						if ($(this).val() == "24") {
							$("#text12").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad13").click(function() {
						if ($(this).val() == "25") {
							$("#text13").show();
						}
						if ($(this).val() == "26") {
							$("#text13").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad14").click(function() {
						if ($(this).val() == "27") {
							$("#text14").show();
						}
						if ($(this).val() == "28") {
							$("#text14").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad15").click(function() {
						if ($(this).val() == "29") {
							$("#text15").show();
						}
						if ($(this).val() == "30") {
							$("#text15").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad16").click(function() {
						if ($(this).val() == "31") {
							$("#text16").show();
						}
						if ($(this).val() == "32") {
							$("#text16").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad17").click(function() {
						if ($(this).val() == "33") {
							$("#text17").show();
						}
						if ($(this).val() == "34") {
							$("#text17").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad18").click(function() {
						if ($(this).val() == "35") {
							$("#text18").show();
						}
						if ($(this).val() == "36") {
							$("#text18").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad19").click(function() {
						if ($(this).val() == "37") {
							$("#text19").show();
						}
						if ($(this).val() == "38") {
							$("#text19").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad20").click(function() {
						if ($(this).val() == "39") {
							$("#text20").show();
						}
						if ($(this).val() == "40") {
							$("#text20").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad21").click(function() {
						if ($(this).val() == "41") {
							$("#text21").show();
						}
						if ($(this).val() == "42") {
							$("#text21").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad22").click(function() {
						if ($(this).val() == "43") {
							$("#text22").show();
						}
						if ($(this).val() == "44") {
							$("#text22").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad23").click(function() {
						if ($(this).val() == "45") {
							$("#text23").show();
						}
						if ($(this).val() == "46") {
							$("#text23").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad24").click(function() {
						if ($(this).val() == "47") {
							$("#text24").show();
						}
						if ($(this).val() == "48") {
							$("#text24").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad25").click(function() {
						if ($(this).val() == "49") {
							$("#text25").show();
						}
						if ($(this).val() == "50") {
							$("#text25").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad26").click(function() {
						if ($(this).val() == "51") {
							$("#text26").show();
						}
						if ($(this).val() == "52") {
							$("#text26").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad27").click(function() {
						if ($(this).val() == "53") {
							$("#text27").show();
						}
						if ($(this).val() == "54") {
							$("#text27").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad28").click(function() {
						if ($(this).val() == "55") {
							$("#text28").show();
						}
						if ($(this).val() == "56") {
							$("#text28").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad29").click(function() {
						if ($(this).val() == "57") {
							$("#text29").show();
						}
						if ($(this).val() == "58") {
							$("#text29").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad30").click(function() {
						if ($(this).val() == "59") {
							$("#text30").show();
						}
						if ($(this).val() == "60") {
							$("#text30").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad31").click(function() {
						if ($(this).val() == "61") {
							$("#text31").show();
						}
						if ($(this).val() == "62") {
							$("#text31").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad32").click(function() {
						if ($(this).val() == "63") {
							$("#text32").show();
						}
						if ($(this).val() == "64") {
							$("#text32").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad33").click(function() {
						if ($(this).val() == "65") {
							$("#text33").show();
						}
						if ($(this).val() == "66") {
							$("#text33").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad34").click(function() {
						if ($(this).val() == "67") {
							$("#text34").show();
						}
						if ($(this).val() == "68") {
							$("#text34").hide();

						}
					});
				});
				$(function() {
					$(":radio.rad35").click(function() {
						if ($(this).val() == "69") {
							$("#text35").show();
						}
						if ($(this).val() == "70") {
							$("#text35").hide();
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
					}, function() {
						$().ready(function() {
							$.ajax({
								url: "<?php echo base_url() ?>mcu/delete_mcu",
								method: "POST",
								dataType: 'json',
								data: {
									id_mcu: id_mcu,
								},
								success: function(data) {
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
					id_mcu = $('#id_mcu').val();
					P11a = $('#intext1').val();
					P11b = $('#intext2').val();
					P12a = $('#intext3').val();
					P12b = $('#intext4').val();
					P12c = $('#intext5').val();
					P12d = $('#intext6').val();
					P12e = $('#intext7').val();
					P12f = $('#intext8').val();
					P12g = $('#intext9').val();
					P12h = $('#intext10').val();
					P13a = $('#intext11').val();
					P13b = $('#intext12').val();
					P14 = $('#intext13').val();
					P15 = $('#intext14').val();
					P16 = $('#intext15').val();
					P17a = $('#intext16').val();
					smoker = $('#result_smoked').val();
					numbersmoked = $('#innumbersmoked').val();
					concumption_alcohol = $('#inalcohol').val();
					liv_father = $('#inlivfather').val();
					healthfather = $('#inhealthfather').val();
					deadfather = $('#indeadfather').val();
					causedeadfather = $('#incausedeadfather').val();
					liv_mother = $('#inlivmother').val();
					healthmother = $('#inhealthmother').val();
					deadmother = $('#indeadmother').val();
					causedeadmother = $('#incausedeadmother').val();
					livbrosis = $('#inlivbrosis').val();
					livbrosis1 = $('#inlivbrosis1').val();
					livbrosis2 = $('#inlivbrosi2').val();
					healthbrosis = $('#inhealthbrosis').val();
					healthbrosis1 = $('#inhealthbrosis1').val();
					healthbrosis2 = $('#inhealthbrosis2').val();
					deadbrosis = $('#indeadbrosis').val();
					deadbrosis1 = $('#indeadbrosis1').val();
					deadbrosis2 = $('#indeadbrosis2').val();
					causedeadbrosis = $('#incausedeadbrosis').val();
					causedeadbrosis1 = $('#incausedeadbrosis1').val();
					causedeadbrosis2 = $('#incausedeadbrosis2').val();
					Ear = $('#result_Ear').val();
					Nose = $('#result_Nose').val();
					Color = $('#result_Color').val();
					Frequent = $('#result_Frequent').val();
					epilepsy = $('#result_Epilepsy').val();
					Hypertension = $('#result_Hypertension').val();
					Diabetes = $('#result_Diabetes').val();
					Endocrione = $('#result_Endocrione').val();
					Hernia = $('#result_Hernia').val();
					Fistula = $('#result_Fistula').val();
					Malaria = $('#result_Malaria').val();
					Skin = $('#result_Skin').val();
					Cance = $('#result_Cance').val();
					Allergy = $('#result_Allergy').val();
					height = $('#inheight').val();
					weight = $('#inweight').val();
					BMI = $('#inbmi').val();
					P48c = $('#intext19').val();
					P48d = $('#intext20').val();
					P48e = $('#intext21').val();
					P49a = $('#intext22').val();
					P49b = $('#intext23').val();
					P49c = $('#intext24').val();
					P49d = $('#intext25').val();
					insystolic = $('#insystolic').val();
					inpulse = $('#inpulse').val();
					P410a = $('#intext27').val();
					P410b = $('#intext28').val();
					P411a = $('#intext29').val();
					P411b = $('#intext30').val();
					P411c = $('#intext31').val();
					P412a = $('#intext32').val();
					P412b = $('#intext33').val();
					P413a = $('#intext34').val();
					P414a = $('#intext35').val();
					P414b = $('#intext36').val();
					UFVOO = $('#inuncorrected1').val();
					UFVOS = $('#inuncorrected2').val();
					UNVOO = $('#inuncorrected3').val();
					UNVOS = $('#inuncorrected4').val();
					UCVAdequate = $('#inAdequate').val();
					CFVOO = $('#incorrected1').val();
					CFVOS = $('#incorrected2').val();
					CNVOO = $('#incorrected3').val();
					CNVOS = $('#incorrected4').val();
					// CCVDefective = $('#inDefective').val();
					Remarks = $('#inremarks').val();
					P51a = $('#inChest').val();
					P52a = $('#inEcg').val();
					P53a = $('#inAudiogram').val();
					P541a = $('#result_bloodr').val();
					P542a = $('#result_Basophils').val();
					P543a = $('#result_urea').val();
					P55a = $('#inurine').val();
					P56a = $('#indrugs').val();
					P57a = $('#result_HIV').val();
					P58a = $('#result_Tine').val();
					P59a = $('#result_HB').val();
					P510a = $('#result_TPHA').val();
					P511a = $('#result_Stool').val();
					P512a = $('#result_Pharyngeal').val();
					P513a = $('#result_Spirometry').val();
					summary = $('#insummary').val();
					present = $('#inpresent').val();
					examined = $('#inexamined').val();
					Duty = $('#result_Duty').val();
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
								url: "<?php echo base_url() ?>mcu/simpan_mcu",
								method: "POST",
								dataType: 'json',
								data: {
									id_mcu: id_mcu,
									P11a: P11a,
									P11b: P11b,
									P12a: P12a,
									P12b: P12b,
									P12c: P12c,
									P12d: P12d,
									P12e: P12e,
									P12f: P12f,
									P12g: P12g,
									P12h: P12h,
									P13a: P13a,
									P13b: P13b,
									P14: P14,
									P15: P15,
									P16: P16,
									P17a: P17a,
									smoker: smoker,
									numbersmoked: numbersmoked,
									concumption_alcohol: concumption_alcohol,
									liv_father: liv_father,
									healthfather: healthfather,
									deadfather: deadfather,
									causedeadfather: causedeadfather,
									liv_mother: liv_mother,
									healthmother: healthmother,
									deadmother: deadmother,
									causedeadmother: causedeadmother,
									livbrosis: livbrosis,
									livbrosis1: livbrosis1,
									livbrosis2: livbrosis2,
									healthbrosis: healthbrosis,
									healthbrosis1: healthbrosis1,
									healthbrosis2: healthbrosis2,
									deadbrosis: deadbrosis,
									deadbrosis1: deadbrosis1,
									deadbrosis2: deadbrosis2,
									causedeadbrosis: causedeadbrosis,
									causedeadbrosis1: causedeadbrosis1,
									causedeadbrosis2: causedeadbrosis2,
									Ear: Ear,
									Nose: Nose,
									Color: Color,
									Frequent: Frequent,
									epilepsy: epilepsy,
									Hypertension: Hypertension,
									Diabetes: Diabetes,
									Endocrione: Endocrione,
									Hernia: Hernia,
									Fistula: Fistula,
									Malaria: Malaria,
									Skin: Skin,
									Cance: Cance,
									Allergy: Allergy,
									height: height,
									weight: weight,
									BMI: BMI,
									P48c: P48c,
									P48d: P48d,
									P48e: P48e,
									P49a: P49a,
									P49b: P49b,
									P49c: P49c,
									P49d: P49d,
									insystolic: insystolic,
									inpulse: inpulse,
									P410a: P410a,
									P410b: P410b,
									P411a: P411a,
									P411b: P411b,
									P411c: P411c,
									P412a: P412a,
									P412b: P412b,
									P413a: P413a,
									P414a: P414a,
									UFVOO: UFVOO,
									UFVOS: UFVOS,
									UNVOO: UNVOO,
									UNVOS: UNVOS,
									UCVAdequate: UCVAdequate,
									CFVOO: CFVOO,
									CFVOS: CFVOS,
									CNVOO: CNVOO,
									CNVOS: CNVOS,
									// CCVDefective: CCVDefective,
									Remarks: Remarks,
									P51a: P51a,
									P52a: P52a,
									P53a: P53a,
									P541a: P541a,
									P542a: P542a,
									P543a: P543a,
									P55a: P55a,
									P56a: P56a,
									P57a: P57a,
									P58a: P58a,
									P59a: P59a,
									P510a: P510a,
									P511a: P511a,
									P512a: P512a,
									P513a: P513a,
									summary: summary,
									present: present,
									examined: examined,
									Duty: Duty,
								},
								success: function(data) {
									if (data.status == "success") {
										swal({
											title: "good job!",
											type: "success",
											text: "Data Medical Check Up Pasien ini telah disimpan",
											confirmButtonColor: "#3cb878",

										});
										$('#datable').DataTable().ajax.reload();
										window.location.href = 'javascript:history.go(-1)';
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
				$(document).ready(function() {
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
						}, ],

					});
				});
			</script>

			<!-- Function untuk button surat -->
			<script type="text/javascript">
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
						success: function(data) {
							if (data.surat_sehat.status == "found") {
								$('input[name="sehat"][value="' + data.surat_sehat.data.sehat + '"]').prop("checked", true);
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
						success: function(data) {
							if (data.medic_sertif.status == "found") {
								$('input[name="sehat"][value="' + data.medic_sertif.data.sehat + '"]').prop("checked", true);
								$('#inTanggal').val(data.medic_sertif.data.tgl_periksa).change();
								$('#inWeight').val(data.medic_sertif.data.berat_badan);
								$('#inHigh').val(data.medic_sertif.data.tinggi_badan);
								$('#tekanan_darah').val(data.medic_sertif.data.tekanan_darah);
								$('#kebutuhan').val(data.medic_sertif.data.kebutuhan);
								$('input[name="blind"][value="' + data.medic_sertif.data.blind + '"]').prop("checked", true);
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
						success: function(data) {
							if (data.sehat_rohani.status == "found") {
								$('input[name="sehat"][value="' + data.sehat_rohani.data.sehat + '"]').prop("checked", true);
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
						success: function(data) {
							if (data.buta_warna.status == "found") {
								$('input[name="sehat"][value="' + data.buta_warna.data.sehat + '"]').prop("checked", true);
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
						success: function(data) {
							if (data.buta_warna_visus.status == "found") {
								$('input[name="sehat"][value="' + data.buta_warna_visus.data.sehat + '"]').prop("checked", true);
								$('input[name="dekat"][value="' + data.buta_warna_visus.data.dekat + '"]').prop("checked", true);
								$('input[name="jauh"][value="' + data.buta_warna_visus.data.jauh + '"]').prop("checked", true);
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
						success: function(data) {
							if (data.surat_mantoux.status == "found") {
								$('input[name="sehat"][value="' + data.surat_mantoux.data.sehat + '"]').prop("checked", true);
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
						success: function(data) {
							if (data.bebas_tato.status == "found") {
								$('input[name="sehat"][value="' + data.bebas_tato.data.sehat + '"]').prop("checked", true);
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
						success: function(data) {
							if (data.bebas_narkoba.status == "found") {
								$('input[name="metamphetamine"][value="' + data.bebas_narkoba.data.metamphetamine + '"]').prop("checked", true);
								$('input[name="morphine"][value="' + data.bebas_narkoba.data.morphine + '"]').prop("checked", true);
								$('input[name="benzodiazepam"][value="' + data.bebas_narkoba.data.benzodiazepam + '"]').prop("checked", true);
								$('input[name="marijuana"][value="' + data.bebas_narkoba.data.marijuana + '"]').prop("checked", true);
								$('input[name="cocain"][value="' + data.bebas_narkoba.data.cocain + '"]').prop("checked", true);
								$('#tinggi').val(data.bebas_narkoba.data.tinggi_badan);
								$('#berat').val(data.bebas_narkoba.data.berat_badan);
								$('#tekanan').val(data.bebas_narkoba.data.tekanan_darah);
								$('#nadi').val(data.bebas_narkoba.data.nadi);

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
			</script>
			<?php
			$this->load->view('modal_mcu/surat_sehat');

			$this->load->view('modal_mcu/medic_sertif');
			$this->load->view('modal_mcu/surat_sehat_rohani');
			$this->load->view('modal_mcu/surat_buta_warna');
			$this->load->view('modal_mcu/surat_warna_visus');
			$this->load->view('modal_mcu/surat_mantoux_test');
			$this->load->view('modal_mcu/surat_bebas_tato');
			$this->load->view('modal_mcu/surat_bebas_narkoba');
			?>
</body>

</html>