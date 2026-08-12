
<!DOCTYPE html>
<html lang="en">
<head>
<script> 
function displayResultsex(sex){  
document.getElementById("result_sex").value=sex; } 
function displayAlertsex(){     
var x=document.getElementById("result_sex").value;     
if (x==""){               
form.sex[0].focus();         
return false;} 
} 
</script> 
<script> 
function displayResultEar(Ear){  
document.getElementById("result_Ear").value=Ear; } 
function displayAlertEar(){     
var x=document.getElementById("result_Ear").value;     
if (x==""){               
form.Ear[0].focus();         
return false;} 
} 
</script>
<script> 
function displayResultNose(Nose){  
document.getElementById("result_Nose").value=Nose; } 
function displayAlertNose(){     
var x=document.getElementById("result_Nose").value;     
if (x==""){               
form.Nose[0].focus();         
return false;} 
} 
</script>

<script> 
function displayResultColor(Color){  
document.getElementById("result_Color").value=Color; } 
function displayAlertColor(){     
var x=document.getElementById("result_Color").value;     
if (x==""){               
form.Color[0].focus();         
return false;} 
} 
</script>

<script> 
function displayResultFrequent(Frequent){  
document.getElementById("result_Frequent").value=Frequent; } 
function displayAlertFrequent(){     
var x=document.getElementById("result_Frequent").value;     
if (x==""){               
form.Frequent[0].focus();         
return false;} 
} 
</script>

<script> 
function displayResultEpilepsy(Epilepsy){  
document.getElementById("result_Epilepsy").value=Epilepsy; } 
function displayAlertEpilepsy(){     
var x=document.getElementById("result_Epilepsy").value;     
if (x==""){               
form.Epilepsy[0].focus();         
return false;} 
} 
</script>

<script> 
function displayResultHypertension(Hypertension){  
document.getElementById("result_Hypertension").value=Hypertension; } 
function displayAlertHypertension(){     
var x=document.getElementById("result_Hypertension").value;     
if (x==""){               
form.Hypertension[0].focus();         
return false;} 
} 
</script>

<script> 
function displayResultDiabetes(Diabetes){  
document.getElementById("result_Diabetes").value=Diabetes; } 
function displayAlertDiabetes(){     
var x=document.getElementById("result_Diabetes").value;     
if (x==""){               
form.Diabetes[0].focus();         
return false;} 
} 
</script>

<script> 
function displayResultEndocrione(Endocrione){  
document.getElementById("result_Endocrione").value=Endocrione; } 
function displayAlertEndocrione(){     
var x=document.getElementById("result_Endocrione").value;     
if (x==""){               
form.Endocrione[0].focus();         
return false;} 
} 
</script>

<script> 
function displayResultHernia(Hernia){  
document.getElementById("result_Hernia").value=Hernia; } 
function displayAlertHernia(){     
var x=document.getElementById("result_Hernia").value;     
if (x==""){               
form.Hernia[0].focus();         
return false;} 
} 
</script>

<script> 
function displayResultFistula(Fistula){  
document.getElementById("result_Fistula").value=Fistula; } 
function displayAlertFistula(){     
var x=document.getElementById("result_Fistula").value;     
if (x==""){               
form.Fistula[0].focus();         
return false;} 
} 
</script>

<script> 
function displayResultMalaria(Malaria){  
document.getElementById("result_Malaria").value=Malaria; } 
function displayAlertMalaria(){     
var x=document.getElementById("result_Malaria").value;     
if (x==""){               
form.Malaria[0].focus();         
return false;} 
} 
</script>

<script> 
function displayResultSkin(Skin){  
document.getElementById("result_Skin").value=Skin; } 
function displayAlertSkin(){     
var x=document.getElementById("result_Skin").value;     
if (x==""){               
form.Skin[0].focus();         
return false;} 
} 
</script>

<script> 
function displayResultCance(Cance){  
document.getElementById("result_Cance").value=Cance; } 
function displayAlertCance(){     
var x=document.getElementById("result_Cance").value;     
if (x==""){               
form.Cance[0].focus();         
return false;} 
} 
</script>

<script> 
function displayResultAllergy(Allergy){  
document.getElementById("result_Allergy").value=Allergy; } 
function displayAlertAllergy(){     
var x=document.getElementById("result_Allergy").value;     
if (x==""){               
form.Allergy[0].focus();         
return false;} 
} 
</script>

<script> 
function displayResultblood(blood){  
document.getElementById("result_blood").value=blood; } 
function displayAlertblood(){     
var x=document.getElementById("result_blood").value;     
if (x==""){           
form.blood[0].focus();         
return false;}     
 } 
</script> 

<script> 
	//javascript untuk checkbox smoker
function displayResultsmoked(smoked){     
var selectedsmoke="";     
for (i = 0; i < smoked.smoke.length; i++){
if (smoked.smoke[i].checked){       
selectedsmoke += smoked.smoke[i].value +", ";   }     
} 	
document.getElementById("result_smoked").value=selectedsmoke; } 
function displayAlertsmoked(smoked){     
var selectedsmoke="";     
for (i = 0; i < smoked.smoke.length; i++){      
if (smoked.smoke[i].checked){       selectedsmoke += smoked.smoke[i].value +", ";   }     }     
if (selectedsmoke==""){ //jika tidak ada smoke yg dipilih             
form.smoke[0].focus();         
return false;     }     
 } 
</script> 

<script> 
function displayResultbloodr(blood_frm){     
var selectedblood="";     
for (i = 0; i < blood_frm.blood.length; i++){ //menghitung jumlah panjang array   	
if (blood_frm.blood[i].checked){       
selectedblood += blood_frm.blood[i].value +" <br>";   }     
}  //memunculkan data di input id result yg isinya select blood     
	
document.getElementById("result_bloodr").value=selectedblood; } 
function displayAlertbloodr(blood_frm){     
var selectedblood="";     
for (i = 0; i < blood_frm.blood.length; i++){      
if (blood_frm.blood[i].checked){       selectedblood += blood_frm.blood[i].value +", ";   }     }     
if (selectedblood==""){ //jika tidak ada blood yg dipilih             
form.blood[0].focus();         
return false;     }     
} 
</script>

<script> 
function displayResultBasophils(frm_Basophils){     
var selectedBasophils="";     
for (i = 0; i < frm_Basophils.Basophils.length; i++){ 
if (frm_Basophils.Basophils[i].checked){       
selectedBasophils += frm_Basophils.Basophils[i].value +" <br>";   }     
} 	
document.getElementById("result_Basophils").value=selectedBasophils; } 
function displayAlertBasophils(frm_Basophils){     
var selectedBasophils="";     
for (i = 0; i < frm_Basophils.Basophils.length; i++){      
if (frm_Basophils.Basophils[i].checked){       selectedBasophils += frm_Basophils.Basophils[i].value +", ";   }
}     
if (selectedBasophils==""){        
form.Basophils[0].focus();         
return false;     }     
 } 
</script> 

<script> 
function displayResulturea(frm_urea){     
var selectedurea="";     
for (i = 0; i < frm_urea.urea.length; i++){ 
if (frm_urea.urea[i].checked){       
selectedurea += frm_urea.urea[i].value +" <br>";   }     
} 	
document.getElementById("result_urea").value=selectedurea; } 
function displayAlerturea(frm_urea){     
var selectedurea="";     
for (i = 0; i < frm_urea.urea.length; i++){      
if (frm_urea.urea[i].checked){       selectedurea += frm_urea.urea[i].value +", ";   }
}     
if (selectedurea==""){        
form.urea[0].focus();         
return false;     }     
 } 
</script> 

<script> 
	//HIV
function displayResultHIV(frm_hiv){     
var selectedHIV="";     
for (i = 0; i < frm_hiv.HIV.length; i++){ //menghitung jumlah panjang array   	
if (frm_hiv.HIV[i].checked){       
selectedHIV += frm_hiv.HIV[i].value +", ";   }     
}  //memunculkan data di input id result yg isinya select HIV     
	
document.getElementById("result_HIV").value=selectedHIV; } 
function displayAlertHIV(frm_hiv){     
var selectedHIV="";     
for (i = 0; i < frm_hiv.HIV.length; i++){      
if (frm_hiv.HIV[i].checked){       selectedHIV += frm_hiv.HIV[i].value +", ";   }     }     
if (selectedHIV==""){ //jika tidak ada HIV yg dipilih          
form.HIV[0].focus();         
return false;     }     
 } 
</script>

<script> 
function displayResultTine(frm_Tine){    
	//tine 
var selectedTine="";     
for (i = 0; i < frm_Tine.Tine.length; i++){ //menghitung jumlah panjang array   	
if (frm_Tine.Tine[i].checked){       
selectedTine += frm_Tine.Tine[i].value +", ";   }     
}  //memunculkan data di input id result yg isinya select Tine     
	
document.getElementById("result_Tine").value=selectedTine; } 
function displayAlertTine(frm_Tine){     
var selectedTine="";     
for (i = 0; i < frm_Tine.Tine.length; i++){      
if (frm_Tine.Tine[i].checked){       selectedTine += frm_Tine.Tine[i].value +", ";   }     }     
if (selectedTine==""){ //jika tidak ada Tine yg dipilih            
form.Tine[0].focus();         
return false;     }     
 } 
</script>

<script> 
function displayResultHB(frm_HB){ 
//HB    
var selectedHB="";     
for (i = 0; i < frm_HB.HB.length; i++){ //menghitung jumlah panjang array   	
if (frm_HB.HB[i].checked){       
selectedHB += frm_HB.HB[i].value +", ";   }     
}  //memunculkan data di input id result yg isinya select HB     
	
document.getElementById("result_HB").value=selectedHB; } 
function displayAlertHB(frm_HB){     
var selectedHB="";     
for (i = 0; i < frm_HB.HB.length; i++){      
if (frm_HB.HB[i].checked){       selectedHB += frm_HB.HB[i].value +", ";   }     }     
if (selectedHB==""){ //jika tidak ada HB yg dipilih      
form.HB[0].focus();         
return false;     }     
} 
</script> 

<script> 
function displayResultTPHA(frm_TPHA){     
var selectedTPHA="";     
for (i = 0; i < frm_TPHA.TPHA.length; i++){ //menghitung jumlah panjang array   	
if (frm_TPHA.TPHA[i].checked){       
selectedTPHA += frm_TPHA.TPHA[i].value +", ";   }     
}  //memunculkan data di input id result yg isinya select TPHA     
	
document.getElementById("result_TPHA").value=selectedTPHA; } 
function displayAlertTPHA(frm_TPHA){     
var selectedTPHA="";     
for (i = 0; i < frm_TPHA.TPHA.length; i++){      
if (frm_TPHA.TPHA[i].checked){       selectedTPHA += frm_TPHA.TPHA[i].value +", ";   }     }     
if (selectedTPHA==""){ //jika tidak ada TPHA yg dipilih              
form.TPHA[0].focus();         
return false;     }     
 } 
</script> 

<script> 
function displayResultStool(frm_Stool){     
var selectedStool="";     
for (i = 0; i < frm_Stool.Stool.length; i++){ //menghitung jumlah panjang array   	
if (frm_Stool.Stool[i].checked){       
selectedStool += frm_Stool.Stool[i].value +", ";   }     
}  //memunculkan data di input id result yg isinya select Stool     
	
document.getElementById("result_Stool").value=selectedStool; } 
function displayAlertStool(frm_Stool){     
var selectedStool="";     
for (i = 0; i < frm_Stool.Stool.length; i++){      
if (frm_Stool.Stool[i].checked){       selectedStool += frm_Stool.Stool[i].value +", ";   }     }     
if (selectedStool==""){ //jika tidak ada Stool yg dipilih              
form.Stool[0].focus();         
return false;     }     
 } 
</script> 

<script> 
function displayResultPharyngeal(frm_Pharyngeal){     
var selectedPharyngeal="";     
for (i = 0; i < frm_Pharyngeal.Pharyngeal.length; i++){ //menghitung jumlah panjang array   	
if (frm_Pharyngeal.Pharyngeal[i].checked){       
selectedPharyngeal += frm_Pharyngeal.Pharyngeal[i].value +", ";   }     
}  //memunculkan data di input id result yg isinya select Pharyngeal     
	
document.getElementById("result_Pharyngeal").value=selectedPharyngeal; } 
function displayAlertPharyngeal(frm_Pharyngeal){     
var selectedPharyngeal="";     
for (i = 0; i < frm_Pharyngeal.Pharyngeal.length; i++){      
if (frm_Pharyngeal.Pharyngeal[i].checked){       selectedPharyngeal += frm_Pharyngeal.Pharyngeal[i].value +", ";   }     }     
if (selectedPharyngeal==""){ //jika tidak ada Pharyngeal yg dipilih              
form.Pharyngeal[0].focus();         
return false;     }     
 } 
</script> 

<script> 
function displayResultSpirometry(frm_Spirometry){     
var selectedSpirometry="";     
for (i = 0; i < frm_Spirometry.Spirometry.length; i++){ //menghitung jumlah panjang array   	
if (frm_Spirometry.Spirometry[i].checked){       
selectedSpirometry += frm_Spirometry.Spirometry[i].value +", ";   }     
}  //memunculkan data di input id result yg isinya select Spirometry     
	
document.getElementById("result_Spirometry").value=selectedSpirometry; } 
function displayAlertSpirometry(frm_Spirometry){     
var selectedSpirometry="";     
for (i = 0; i < frm_Spirometry.Spirometry.length; i++){      
if (frm_Spirometry.Spirometry[i].checked){       selectedSpirometry += frm_Spirometry.Spirometry[i].value +", ";   }     }     
if (selectedSpirometry==""){ //jika tidak ada Spirometry yg dipilih              
form.Spirometry[0].focus();         
return false;     }     
 } 
</script> 


<script> 
function displayResultDuty(frm_Duty){     
var selectedDuty="";     
for (i = 0; i < frm_Duty.Duty.length; i++){ //menghitung jumlah panjang array   	
if (frm_Duty.Duty[i].checked){       
selectedDuty += frm_Duty.Duty[i].value +", ";   }     
}  //memunculkan data di input id result yg isinya select Duty     
	
document.getElementById("result_Duty").value=selectedDuty; } 
function displayAlertDuty(frm_Duty){     
var selectedDuty="";     
for (i = 0; i < frm_Duty.Duty.length; i++){      
if (frm_Duty.Duty[i].checked){       selectedDuty += frm_Duty.Duty[i].value +", ";   }     }     
if (selectedDuty==""){ //jika tidak ada Duty yg dipilih              
form.Duty[0].focus();         
return false;     }     
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
						<button class="btn btn-primary btn-anim pull-right mr-30" data-toggle="modal"
				data-target=".modal-printmcu"><i class="icon-rocket"></i><span class="btn-text">DATA MCU</span></button>
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
								<h4 class="panel-title txt-dark"><b><strong>1. PERSONAL HISTORY</strong></b></h4>



								<div class="row mt-20">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">Name in full</label>
											<div class="col-md-6 has-success">
												<input type="text" class="form-control" id="inName">
												<p id="namefull" style="font-size:12px; margin-top:5px;"></p>
												<input type="hidden" id="intanggalmasuk" value="<?php echo date('Y-m-d H:i:s');?>">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">Date of birth</label>
											<div class="col-md-6 has-success">
												<input type="date" class="form-control" id="inDateofbirth">
												<p id="datebirth" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">Occupation</label>
											<div class="col-md-6 has-success">
												<input type="text" class="form-control" id="inOccupation">
												<p id="occupation" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">Badge no</label>
											<div class="col-md-6 has-success">
												<input type="text" class="form-control" id="inbadge">
												<p id="badgeno" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
									<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Sex</label>
														<input type="radio" name="sex" onclick="displayResultsex(this.value)" value="Laki-laki">Laki-laki 
														<input type="radio" name="sex" onclick="displayResultsex(this.value)" value="Perempuan">Perempuan 
														<input type="hidden" id="result_sex"> 
											</div>
										</div>
										<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">Blood Group</label>
											<div class="col-md-6 has-success">
												<input type="text" class="form-control" id="result_blood">
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
														<th width="500px"><center>Question</center></th>
														<th width="100px"><center>Yes</center></th>
														<th width="100px"><center>No</center></th>
														<th><center>Detail If Yes</center></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>a) Are you at present under medical care or receiving treatment ?
														</td>
														<td><center>
														<input type="radio" name="rad1" id="rad1" value="1" class="rad1"/> 
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad1" id="rad2" value="2" class="rad1"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text1" style="display:none">
														<textarea  rows="4" cols="80" id="intext1"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td></td>
														<td>b) Are you currently taking medication, prescribed or not, heaving injection, using an inhaler or have you recently done so, or are you on a special diet?
														</td>
														<td><center>
														<input type="radio" name="rad2" id="rad3" value="3" class="rad2"/>
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad2" id="rad4" value="4" class="rad2"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text2" style="display:none">
														<textarea rows="4" cols="80" id="intext2"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td>2</td>
														<td>have you ever suffered from:</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td></td>
														<td>a) Fits, Painting, giddiness or any mental or nerveus disorder?
														</td>
														<td><center>
														<input type="radio" name="rad3" id="rad5" value="5" class="rad3"/>
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad3" id="rad6" value="6" class="rad3"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text3" style="display:none">
														<textarea rows="4" cols="80" id="intext3"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td></td>
														<td>b) Asthma, bronchitis, pneumonia or any other lung disorder?
														</td>
														<td><center>
														<input type="radio" name="rad4" id="rad5" value="7" class="rad4"/>
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad4" id="rad6" value="8" class="rad4"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text4" style="display:none">
														<textarea rows="4" cols="80" id="intext4"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td></td>
														<td>c) Rheumatism, rheumatic fever, arthritis or any other disorder of joints and muscle ?
														</td>
														<td><center>
														<input type="radio" name="rad5" id="rad5" value="9" class="rad5"/>
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad5" id="rad6" value="10" class="rad5"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text5" style="display:none">
														<textarea rows="4" cols="80" id="intext5"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td></td>
														<td>d) Chest pain, shortnes of breath, palpitation, high blood pressure or other disorders of the heart or circulation?
														</td>
														<td><center>
														<input type="radio" name="rad6" id="rad5" value="11" class="rad6"/>
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad6" id="rad6" value="12" class="rad6"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text6" style="display:none">
														<textarea rows="4" cols="80" id="intext6"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td></td>
														<td>e) Indigestion, peptic ulcer, diarrhoea, constipation or any intestinal complaint, hepatitis or other liver disorders, diabetes
														</td>
														<td><center>
														<input type="radio" name="rad7" id="rad5" value="13" class="rad7"/>
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad7" id="rad6" value="14" class="rad7"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text7" style="display:none">
														<textarea rows="4" cols="80" id="intext7"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td></td>
														<td>f) kidney, bladder or other genito-urinary disorders?
														</td>
														<td><center>
														<input type="radio" name="rad8" id="rad5" value="15" class="rad8"/>
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad8" id="rad6" value="16" class="rad8"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text8" style="display:none">
														<textarea rows="4" cols="80" id="intext8"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td></td>
														<td>g) Any injury, operation, physical defect or deformity ?
														</td>
														<td><center>
														<input type="radio" name="rad9" id="rad5" value="17" class="rad9"/>
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad9" id="rad6" value="18" class="rad9"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text9" style="display:none">
														<textarea rows="4" cols="80" id="intext9"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td></td>
														<td>h) Any other illness not mentioned above ?
														</td>
														<td><center>
														<input type="radio" name="rad10" id="rad5" value="19" class="rad10"/>
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad10" id="rad6" value="20" class="rad10"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text10" style="display:none">
														<textarea rows="4" cols="80" id="intext10"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td>3</td>
														<td>a) Have you ever been a patient at a hospital, nursing home or special clinic
														</td>
														<td><center>
														<input type="radio" name="rad11" id="rad5" value="21" class="rad11"/>
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad11" id="rad6" value="22" class="rad11"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text11" style="display:none">
														<textarea rows="4" cols="80" id="intext11"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td></td>
														<td>b) have you ever had any medical investigation carried out?
														</td>
														<td><center>
														<input type="radio" name="rad12" id="rad5" value="23" class="rad12"/>
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad12" id="rad6" value="24" class="rad12"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text12" style="display:none">
														<textarea rows="4" cols="80" id="intext12"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td>4</td>
														<td>Have you ever had any form of sexually transmitted disease or is there anything about your lifestyle which could expose you to the risk of AIDS or AIDS related condition ?
														</td>
														<td><center>
														<input type="radio" name="rad13" id="rad5" value="25" class="rad13"/>
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad13" id="rad6" value="26" class="rad13"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text13" style="display:none">
														<textarea rows="4" cols="80" id="intext13"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td>5</td>
														<td>Female only : Have you ever had any gynaecological or obstetric problems ?
														</td>
														<td><center>
														<input type="radio" name="rad14" id="rad5" value="27" class="rad14"/>
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad14" id="rad6" value="28" class="rad14"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text14" style="display:none">
														<textarea rows="4" cols="80" id="intext14"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td>6</td>
														<td>Have you ever taken drugs other than prescribed by any doctor ? 
														</td>
														<td><center>
														<input type="radio" name="rad15" id="rad5" value="29" class="rad15"/>
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad15" id="rad6" value="30" class="rad15"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text15" style="display:none">
														<textarea rows="4" cols="80" id="intext15"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td>7</td>
														<td>a) Non-smoker : Have you smoked in the past?
														</td>
														<td><center>
														<input type="radio" name="rad16" id="rad5" value="31" class="rad16"/>
														</center>
														</td>
														<td>
														<center>
														<input type="radio" name="rad16" id="rad6" value="32" class="rad16"/>
														</center></td>
														<td><!-- form yang mau ditampilkan-->
														<div id="text16" style="display:none">
														<textarea rows="4" cols="80" id="intext16"></textarea>
														</div>
														</td>
													</tr>
													<tr>
														<td></td>
														<td>b) smokers : How much do you smoker per day?
														</td>
														<td></td>
														<td></td>
													<td>
													<form> 
													<input type="checkbox" name="smoke" onclick="displayResultsmoked(this.form)" value="Cigarettes">Cigarettes <br>
													<input type="checkbox" name="smoke" onclick="displayResultsmoked(this.form)" value="Cigars">Cigars <br>
													<input type="checkbox" name="smoke" onclick="displayResultsmoked(this.form)" value="Pipes">Pipes 
													<input type="hidden" id="result_smoked" size="60"> 
													</form> 
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label col-md-6 pt-3">Number smoked </label>
											<div class="col-md-3 has-success">
												<input type="text" class="form-control" id="innumbersmoked"> 
												<p id="NumberSmoked" style="font-size:12px; margin-top:5px;"></p>
											</div>
											<label class="control-label col-md-3 pt-3"> pieces/day </label>
										</div>
									</div>
														
													</td>
													</tr>
													<tr>
														<td></td>
														<td>c) What is the average daily concumption of alcohol?
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
											<h4 class="panel-title txt-dark"><b><strong>2. FAMILY MEDICAL HISTORY</strong></b></h4>
											<table class="table display product-overview mb-30" id="support_table">
												<thead>
													<tr>
														<th width="100px"></th>
														<th width="300px"><center>if living, age</center></th>
														<th width="300px"><center>State of Health</center></th>
														<th width="300px"><center>if dead, age at deat</center></th>
														<th width="300px"><center>Cause of death</center></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<th width="100px">Father</th>
														<th width="300px"><center>
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-md-12 has-success">
												<input type="text" class="form-control" id="inlivfather"> 
												<p id="livfather" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
								</center></th>
														<th width="300px"><center>
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-md-12 has-success">
												<input type="text" class="form-control" id="inhealthfather"> 
												<p id="healthfather" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
														</center></th>
														<th width="300px"><center>
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-md-12 has-success">
												<input type="text" class="form-control" id="indeadfather"> 
												<p id="deadfather" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
														</center></th>
														<th width="300px"><center>
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-md-12 has-success">
												<input type="text" class="form-control" id="incausedeadfather"> 
												<p id="causedeadfather" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
														</center></th>
													</tr>


					<tr>
														<th width="100px">Mother</th>
														<th width="300px"><center>
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-md-12 has-success">
												<input type="text" class="form-control" id="inlivmother"> 
												<p id="livmother" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
								</center></th>
														<th width="300px"><center>
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-md-12 has-success">
												<input type="text" class="form-control" id="inhealthmother"> 
												<p id="healthmother" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
														</center></th>
														<th width="300px"><center>
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-md-12 has-success">
												<input type="text" class="form-control" id="indeadmother"> 
												<p id="deadmother" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
														</center></th>
														<th width="300px"><center>
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-md-12 has-success">
												<input type="text" class="form-control" id="incausedeadmother"> 
												<p id="causedeadmother" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
														</center></th>
					</tr>

					<tr>
														<th width="100px">Brother/Sister</th>
														<th width="300px"><center>
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-md-12 has-success">
												<input type="text" class="form-control" id="inlivbrosis"> 
												<p id="livbrosis" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
								</center></th>
														<th width="300px"><center>
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-md-12 has-success">
												<input type="text" class="form-control" id="inhealthbrosis"> 
												<p id="healthbrosis" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
														</center></th>
														<th width="300px"><center>
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-md-12 has-success">
												<input type="text" class="form-control" id="indeadbrosis"> 
												<p id="deadbrosis" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
														</center></th>
														<th width="300px"><center>
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-md-12 has-success">
												<input type="text" class="form-control" id="incausedeadbrosis"> 
												<p id="causedeadbrosis" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
														</center></th>
					</tr>
												</tbody>
											</table>
<br>
<h4><strong>-------------------------------------------------------------------------------------------------------------------------------------------</strong></h4>
<br>
<h4 class="panel-title txt-dark"><b><strong>3. SUMMARY OF MEDICAL HISTORY OF MR/MRS</strong></b></h4>
<label class="control-label">Has the applicant ever had or has now any of the following ? if yes, give details in the summary description</label>
											<div class="col-md-6">
												<div class="form-group">
													<table class="table display product-overview mb-30" id="support_table">
														<thead>
															<tr>
																<th width="10px">No</th>
																<th width="500px"><center>Question</center></th>
																<th width="100px"><center>Yes</center></th>
																<th width="100px"><center>No</center></th>
																<!-- <th><center>Detail If Yes</center></th> -->
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>1</td>
																<td>Ear infection/ Sinusitis/ Vertigo
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
																<td>Nose, mouth or throat trouble
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
																<td>Color blindness/ Loss Vision
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
																<td>Frequent headaches/ Fainting
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
																<td>Epilepsy/ Mental illness
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
																<td>Hypertension
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
																<th width="500px"><center>Question</center></th>
																<th width="100px"><center>Yes</center></th>
																<th width="100px"><center>No</center></th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>8</td>
																<td>Endocrione disorder
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
																<td>Hernia/ Hydrocele/ Piles/ Fissures
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
																<td>Malaria/ Tropical Disease
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
																<td>Skin disease
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
																<td>Cance or tumor
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
																<td>Allergy to foods/ drugs
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
<h4 class="panel-title txt-dark"><b><strong>4. MEDICAL EXAMINER'S REPORT</strong></b></h4>
<label class="control-label">If you answer Yes to any of the following question, please give full details with any ascertainable cause as appicable</label>
<table class="table display product-overview mb-30" id="support_table">
															<thead>
																<tr>
																	<th width="10px">No</th>
																	<th width="500px"><center>Question</center></th>
																	<th width="100px"><center>Yes</center></th>
																	<th width="100px"><center>No</center></th>
																	<th><center>Detail If Yes</center></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>8</td>
																	<td>Measuerement & Pyhsical Description</td>
																	<td></td>
																	<td></td>
																	<td></td>
																</tr>
																<tr> 
																	<td></td>
																	<td>a) Measuerement (to be taken in indoor clothing)
																	</td>
																	<td><center>
																		<input type="radio" name="rad17" id="rad17" value="33" class="rad17"/>
																	</center>
																</td>
																<td>
																	<center>
																		<input type="radio" name="rad17" id="rad17" value="34" class="rad17"/>
																	</center></td>
																	<td><center>
																		<div id="text17" style="display:none"><!-- form yang mau ditampilkan-->
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label col-md-3 pt-5">Height</label>
																					<div class="col-md-6 has-success">
																						<input type="text" class="form-control" id="inheight"></div>
																						<p id="height" style="font-size:12px; margin-top:5px;">cm</p>
																					</div>
																				</div>
																				<div class="col-md-6">
																					<div class="form-group">
																						<label class="control-label col-md-3 pt-5">Weight</label>
																						<div class="col-md-6 has-success">
																							<input type="text" class="form-control" id="inweight"></div>
																							<p id="weight" style="font-size:12px; margin-top:5px;">kg</p>
																						</div>
																					</div>
																				</div>
																			</center>
																		</td>

																	</tr>
																	<tr>
																		<td></td>
																		<td>b) Please describe general appearance and build :
																		</td>
																		<td><center>
																			<input type="radio" name="rad18" id="rad3" value="35" class="rad18"/>
																		</center>
																	</td>
																	<td>
																		<center>
																			<input type="radio" name="rad18" id="rad4" value="36" class="rad18"/>
																		</center></td>
																		<td><center><!-- form yang mau ditampilkan-->
																			<div id="text18" style="display:none">
																				<div class="col-md-6">
																					<div class="form-group">
																						<label class="control-label col-md-3 pt-5">BMI</label>
																						<div class="col-md-6 has-success">
																							<input type="text" class="form-control" id="inbmi"></div>
																							<p id="bmi" style="font-size:12px; margin-top:5px;"></p>
																						</div>
																					</div>
																				</div></center>
																			</td>

																		</tr>
																		<tr>
																			<td></td>
																			<td>c) Are there any signs of past or present over-indulgence in alcohol, tobaco, or irregular lifestyle
																			</td>
																			<td><center>
																				<input type="radio" name="rad19" id="rad5" value="37" class="rad19"/>
																			</center>
																		</td>
																		<td>
																			<center>
																				<input type="radio" name="rad19" id="rad6" value="38" class="rad19"/>
																			</center>
																		</td>
																		<td><!-- form yang mau ditampilkan-->
																			<center><div id="text19" style="display:none">
																				<textarea rows="4" cols="40" id="intext19"></textarea>
																			</div></center>
																		</td>
																	</tr>
																	<tr>
																		<td></td>
																		<td>d) Is there any enlargement of lymph nodes or thyroid gland ? 
																		</td>
																		<td><center>
																			<input type="radio" name="rad20" id="rad7" value="39" class="rad20"/>
																		</center>
																	</td>
																	<td>
																		<center>
																			<input type="radio" name="rad20" id="rad8" value="40" class="rad20"/>
																		</center>
																	</td>
																	<td><!-- form yang mau ditampilkan-->
																		<center><div id="text20" style="display:none">
																			<textarea rows="4" cols="40" id="intext20"></textarea>
																		</div></center>
																	</td>
																</tr>
																<tr>
																	<td></td>
																	<td>e) Are there any scars of material significance ?
																	</td>
																	<td><center>
																		<input type="radio" name="rad21" id="rad9" value="41" class="rad21"/>
																	</center>
																</td>
																<td>
																	<center>
																		<input type="radio" name="rad21" id="rad10" value="42" class="rad21"/>
																	</center>
																</td>
																<td><!-- form yang mau ditampilkan-->
																	<center><div id="text21" style="display:none">
																		<textarea rows="4" cols="40" id="intext21"></textarea>
																	</div></center>
																</td>
															</tr>

															<tr>
																<td>9</td>
																<td>Cardio-vascular System & Blood pressure</td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr> 
																<td></td>
																<td>a) Does the heart appear to be enlarged ? <br>
																	if "Yes" do you consider this to be slight, moderate or marked ? 
																</td>
																<td><center>
																	<input type="radio" name="rad22" id="rad11" value="43" class="rad22"/>
																</center>
															</td>
															<td>
																<center>
																	<input type="radio" name="rad22" id="rad12" value="44" class="rad22"/>
																</center>
															</td>
															<td><!-- form yang mau ditampilkan-->
																<center><div id="text22" style="display:none">
																	<textarea rows="4" cols="40" id="intext22"></textarea>
																</div></center>
															</td>
														</tr>
														<tr>
															<td></td>
															<td>b) Is there any irregularity of ryhthm ? 
															</td>
															<td><center>
																<input type="radio" name="rad23" id="rad13" value="45" class="rad23"/>
															</center>
														</td>
														<td>
															<center>
																<input type="radio" name="rad23" id="rad14" value="46" class="rad23"/>
															</center>
														</td>
														<td><!-- form yang mau ditampilkan-->
															<center><div id="text23" style="display:none">
																<textarea rows="4" cols="40" id="intext23"></textarea>
															</div></center>
														</td>
													</tr>
													<tr>
														<td></td>
														<td>c) Is there any abnormality in the arterial pulse
														</td>
														<td><center>
															<input type="radio" name="rad24" id="rad15" value="47" class="rad24"/>
														</center>
													</td>
													<td>
														<center>
															<input type="radio" name="rad24" id="rad16" value="48" class="rad24"/>
														</center>
													</td>
													<td><!-- form yang mau ditampilkan-->
														<center><div id="text24" style="display:none">
															<textarea rows="4" cols="40" id="intext24"></textarea>
														</div></center>
													</td>
												</tr>
												<tr>
													<td></td>
													<td>d) Are there any varicose veins ? 
													</td>
													<td><center>
														<input type="radio" name="rad25" id="rad17" value="49" class="rad25"/>
													</center>
												</td>
												<td>
													<center>
														<input type="radio" name="rad25" id="rad18" value="50" class="rad25"/>
													</center>
												</td>
												<td><!-- form yang mau ditampilkan-->
													<center><div id="text25" style="display:none">
														<textarea rows="4" cols="40" id="intext25"></textarea>
													</div></center>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>e) Blood Pressure : (Please record opposite)
												</td>
												<td><center>
													<input type="radio" name="rad26" id="rad19" value="51" class="rad26"/>
												</center>
											</td>
											<td>
												<center>
													<input type="radio" name="rad26" id="rad20" value="52" class="rad26"/>
												</center>
											</td>
											<td><center>
												<div id="text26" style="display:none"><!-- form yang mau ditampilkan-->

													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-6 has-success">
																<label class="control-label">Systolic/Diastolic</label>
																<input type="text" class="form-control" id="insystolic"></div>
																<p id="systolic" style="font-size:12px; margin-top:5px;"></p>
															</div>
														</div>
														<div class="col-md-6">
															<div class="col-md-6 has-success">
																<div class="form-group">
																	<label class="control-label">Pulse Rate </label>
																	<input type="text" class="form-control" id="inpulse"></div>
																	<p id="pulse" style="font-size:12px; margin-top:5px;"></p>
																</div>
															</div>
														</div>
													</center>
												</td>
											</tr>
											<tr>
												<td>10</td>
												<td>Respiratory System</td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr> 
												<td></td>
												<td>a) Is there any abnormality in the shapes and development of the chest
												</td>
												<td><center>
													<input type="radio" name="rad27" id="rad21" value="53" class="rad27"/>
												</center>
											</td>
											<td>
												<center>
													<input type="radio" name="rad27" id="rad22" value="54" class="rad27"/>
												</center>
											</td>
											<td><!-- form yang mau ditampilkan-->
												<center><div id="text27" style="display:none">
													<textarea rows="4" cols="40" id="intext27"></textarea>
												</div></center>
											</td>
										</tr>
										<tr>
											<td></td>
											<td>b) Are there any abnormal physical signs in the lungs ? 
											</td>
											<td><center>
												<input type="radio" name="rad28" id="rad23" value="55" class="rad28"/>
											</center>
										</td>
										<td>
											<center>
												<input type="radio" name="rad28" id="rad24" value="56" class="rad28"/>
											</center>
										</td>
										<td><!-- form yang mau ditampilkan-->
											<center><div id="text28" style="display:none">
												<textarea rows="4" cols="40" id="intext28"></textarea>
											</div></center>
										</td>
									</tr>
									<tr>
										<td>11</td>
										<td>Genito/ Urinary & Digestive System</td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<tr> 
										<td></td>
										<td>a) Is the urine test abnormal ?
										</td>
										<td><center>
											<input type="radio" name="rad29" id="rad25" value="57" class="rad29"/>
										</center>
									</td>
									<td>
										<center>
											<input type="radio" name="rad29" id="rad26" value="58" class="rad29"/>
										</center>
									</td>
									<td><!-- form yang mau ditampilkan-->
										<center><div id="text29" style="display:none">
											<textarea rows="4" cols="40" id="intext29"></textarea>
										</div></center>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>b) Is there any abnormal tenderness, enlargement or other palpable abnormality in a abdomen ?
									</td>
									<td><center>
										<input type="radio" name="rad30" id="rad27" value="59" class="rad30"/>
									</center>
								</td>
								<td>
									<center>
										<input type="radio" name="rad30" id="rad28" value="60" class="rad30"/>
									</center>
								</td>
								<td><!-- form yang mau ditampilkan-->
									<center><div id="text30" style="display:none">
										<textarea rows="4" cols="40" id="intext30"></textarea>
									</div></center>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>c) Is a hernia present 
								</td>
								<td>
								<center>
									<input type="radio" name="rad31" id="rad29" value="61" class="rad31"/>
								</center>
							</td>
							<td>
								<center>
									<input type="radio" name="rad31" id="rad30" value="62" class="rad31"/>
								</center>
							</td>
							<td><!-- form yang mau ditampilkan-->
								<center><div id="text31" style="display:none">
									<textarea rows="4" cols="40" id="intext31"></textarea>
								</div></center>
							</td>
						</tr>
						<tr>
							<td>12</td>
							<td>Nervous System</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr> 
							<td></td>
							<td>a) Is there any sign of disease in the central nervous system ?
							</td>
							<td><center>
								<input type="radio" name="rad32" id="rad31" value="63" class="rad32"/>
							</center>
						</td>
						<td>
							<center>
								<input type="radio" name="rad32" id="rad32" value="64" class="rad32"/>
							</center>
						</td>
						<td><!-- form yang mau ditampilkan-->
							<center><div id="text32" style="display:none">
								<textarea rows="4" cols="40" id="intext32"></textarea>
							</div></center>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>b) Is there anything to suggest a tendency to psychiatric disorder ?
						</td>
						<td><center>
							<input type="radio" name="rad33" id="rad33" value="65" class="rad33"/>
						</center>
					</td>
					<td>
						<center>
							<input type="radio" name="rad33" id="rad34" value="66" class="rad33"/>
						</center>
					</td>
					<td><!-- form yang mau ditampilkan-->
						<center><div id="text33" style="display:none">
							<textarea rows="4" cols="40" id="intext33"></textarea>
						</div></center>
					</td>
				</tr>
				<tr>
					<td>13</td>
					<td>Sense Organs</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr> 
					<td></td>
					<td>a) Is there any affection of the eyes, ears, nose or tongue
					</td>
					<td><center>
						<input type="radio" name="rad34" id="rad35" value="67" class="rad34"/>
					</center>
				</td>
				<td>
					<center>
						<input type="radio" name="rad34" id="rad36" value="68" class="rad34"/>
					</center>
				</td>
				<td><!-- form yang mau ditampilkan-->
					<center><div id="text34" style="display:none">
						<textarea rows="4" cols="40" id="intext34"></textarea>
					</div></center>
				</td>
			</tr>
		</tbody>
	</table>
		<table class="table display product-overview mb-30" id="support_table">
		<thead>
			<tr>
				<th width="10px">Vision</th>
				<th width="500px">Far Vision</center></th>
				<th width="500px">Near Vision</center></th>
				<th width="500px">Color Vision</center></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Uncorrected</td>
				<td><div class="col-md-6 has-success">
					<label class="control-label">OO</label>
					<input type="text" class="form-control" id="inuncorrected1">
					<p id="uncorrected1" style="font-size:12px; margin-top:5px;"></p>
				</div><div class="col-md-6 has-success">
					<label class="control-label">OS</label>
					<input type="text" class="form-control" id="inuncorrected2">
					<p id="uncorrected2" style="font-size:12px; margin-top:5px;"></p>
				</div></td>
				<td><div class="col-md-6 has-success">
					<label class="control-label">OO</label>
					<input type="text" class="form-control" id="inuncorrected3">
					<p id="uncorrected3" style="font-size:12px; margin-top:5px;"></p>
				</div><div class="col-md-6 has-success">
					<label class="control-label">OS</label>
					<input type="text" class="form-control" id="inuncorrected4">
					<p id="uncorrected4" style="font-size:12px; margin-top:5px;"></p>
				</div></td>
				<td>
					<div class="form-group">
						<label class="control-label col-md-3 pt-5">Adequate</label>
						<div class="col-md-6 has-success">
							<input type="text" class="form-control" id="inAdequate">
							<p id="adequate" style="font-size:12px; margin-top:5px;"></p>
						</div>
					</div>
				</td>

			</tr>
			<tr>
				<td>Corrected</td>
				<td><div class="col-md-6 has-success">
					<label class="control-label">OO</label>
					<input type="text" class="form-control" id="incorrected1">
					<p id="corrected1" style="font-size:12px; margin-top:5px;"></p>
				</div><div class="col-md-6 has-success">
					<label class="control-label">OS</label>
					<input type="text" class="form-control" id="incorrected2">
					<p id="corrected2" style="font-size:12px; margin-top:5px;"></p>
				</div></td>
				<td><div class="col-md-6 has-success">
					<label class="control-label">OO</label>
					<input type="text" class="form-control" id="incorrected3">
					<p id="corrected3" style="font-size:12px; margin-top:5px;"></p>
				</div><div class="col-md-6 has-success">
					<label class="control-label">OS</label>
					<input type="text" class="form-control" id="incorrected4">
					<p id="corrected4" style="font-size:12px; margin-top:5px;"></p>
				</div></td>
				<td>

					<div class="form-group">
						<label class="control-label col-md-3 pt-5">Defective</label>
						<div class="col-md-6 has-success">
							<input type="text" class="form-control" id="inDefective">
							<p id="defective" style="font-size:12px; margin-top:5px;"></p>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
		<label class="control-label ">Remarks : </label>
		<div id="remark">
				<textarea rows="4" cols="80" id="inremarks"></textarea>
		</div>
	<br>
<h4><strong>-------------------------------------------------------------------------------------------------------------------------------------------</strong></h4>
<br>
<h4 class="panel-title txt-dark"><strong>5. EXAMINATION RESULT AND REPORT</strong></h4>
<br>
<p class=" txt-dark"><b>X-Ray, Audiogram and Blood urine laboratory examination report</b></p><br>
<p class="txt-dark"><b>All examination result are be attached. Please, indicate your remark in case of abnormal result</b></p>
<div class="col-md-9">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">1. Chest X-Ray Report</label>
											<div class="col-md-6 has-success">
												<input type="text" class="form-control" id="inChest">
												<p id="inChest" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>

									<div class="col-md-9">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">2. ECG Report</label>
											<div class="col-md-6 has-success">
												<input type="text" class="form-control" id="inEcg">
												<p id="inEcg" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>
									<div class="col-md-9">
										<div class="form-group">
											<label class="control-label col-md-3 pt-5">3. Audiogram Report</label>
											<div class="col-md-6 has-success">
												<input type="text" class="form-control" id="inAudiogram">
												<p id="inAudiogram" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label col-md-10 pt-5">4. Blood examination report (Please, attach the result of the following examinations or indicate here below the result): </label>
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
														</div>	 </div>
														

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
																<label class="control-label mb-10 col-sm-10 text-left">17) Blood Urea disorder</label>


												<input type="checkbox" name="urea" onclick="displayResulturea(this.form)" value="Blood Urea disorder">
														</div>
																</div>
																
																<div class="col-sm-9">
																	<div class="form-group">
																<label class="control-label mb-10 col-sm-10 text-left">18) Cholesterol</label>

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
																<label class="control-label mb-10 col-sm-10 text-left">20) Direct Bilirubine</label>

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
											<label class="control-label col-md-5 pt-5">5. Urine Examination Report</label>
											<div class="col-md-6 has-success">
												<input type="text" class="form-control" id="inurine">
												<p id="urine" style="font-size:12px; margin-top:5px;"></p>
											</div>
										</div>
									</div>

								<div class="col-md-9">
										<div class="form-group">
											<label class="control-label col-md-5 pt-5">6. Drugs, alcohol screening tes report</label>
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
														<input type="checkbox" name="HIV" onclick="displayResultHIV(this.form)" value="HIV Test ">  HIV Test (**)
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
													<td><table width="100%">
						
												<tr>
													<form>
													<input type="hidden" id="result_HB" size="60"> 
													<td >
														<input type="checkbox" name="HB" onclick="displayResultHB(this.form)" value="HbsAg">HbsAg 
													</td>
													<td >
														<input type="checkbox" name="HB" onclick="displayResultHB(this.form)" value="HBsAb">HBsAb 
													</td>
													<td >
														<input type="checkbox" name="HB" onclick="displayResultHB(this.form)" value="HBcAb">HBcAb 
													</td>
													<td >
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
													<td><form> 
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
														<input type="checkbox" name="Pharyngeal" onclick="displayResultPharyngeal(this.form)" value="Pharyngeal plug test">Pharyngeal plug test (**)
														<input type="checkbox" name="Pharyngeal" onclick="displayResultPharyngeal(this.form)" value="No">
														<input type="hidden" id="result_Pharyngeal" size="60"> 
														</form> 
														</td>
												</tr>

												<tr>
													<td class="col-sm-1 txt-dark">13.</td>
													<td>
														<form> 
														<input type="checkbox" name="Spirometry" onclick="displayResultSpirometry(this.form)" value="Spirometry Test">Spirometry Test 
														<input type="checkbox" name="Spirometry" onclick="displayResultSpirometry(this.form)" value="No"> 
														<input type="hidden" id="result_Spirometry" size="60"> 
														</form> 
													</td>
												</tr>
											</thead>
										</table>		
</div>
<div class="col-md-9">
<p class=" txt-dark"><b>(**) Only if required</b></p>
		<br>
<h4 class="panel-title txt-dark"><strong>6. OVERALL SUMMARY, ASSESSMENT AND RECOMMENDATIONS</strong></h4>
<div class="col-sm-9">
										<div id="summary" style="display">
														<textarea class="txt-dark" rows="4" cols="120" id="insummary"></textarea>
														</div>
									</div>

									<br><br><br><br><br>
										<div class="form-group">
											<label class="control-label col-md-4 pt-5">The present Medical Certificate is valid until:</label>
											<div class="col-md-3 has-success">
												<input type="date" class="form-control" id="inpresent">
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<label class="control-label col-md-4 pt-5">I have examined MR / MRS</label>
											<div class="col-md-3 has-success">
													<select class="form-control filled-input select2"
														placeholder="pilih dokter"
														style="border: 1px solid lightgreen;" tabindex="1" id="inexamined">
													
														<?php
                                                            foreach ($data_dokter as $row) :
                                                        ?>
														<option value="<?php echo $row->nama; ?>">
															<?php echo $row->nama; ?></option>
														<?php endforeach ?>
													</select>
												</div>
											<label class="control-label col-md-4 pt-5">and found him (tick the box)<br></label>
										</div>
 										<br>
 										<br>
 										<br>
 										<form>
 										<div class="col-sm-4">
 											<input type="checkbox" name="Duty" onclick="displayResultDuty(this.form)" value="FIT for duty">FIT for duty 
										</div>

										<div class="col-sm-4">
											<input type="checkbox" name="Duty" onclick="displayResultDuty(this.form)" value="UNFIT for duty">UNFIT for duty 
										</div>
										<div class="col-sm-4">
										<input type="checkbox" name="Duty" onclick="displayResultDuty(this.form)" value="Pending">Pending
										</div>
										<input type="hidden" id="result_Duty" size="60"> 
										<br>
										<br>
</form>
									<div class="modal-footer mb-5 mr-5 mt-10">		
									<button onclick="insertData()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></div>
										
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
							<h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> Data Medical Check Up</h5>
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
									<th scope="col">TGL LAHIR</th>
									<th scope="col">OCCUPATION</th>
									<th scope="col">BADGE NO</th>
									<th scope="col">BLOOD GROUP</th>
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
									<th scope="col">TGL LAHIR</th>
									<th scope="col">OCCUPATION</th>
									<th scope="col">BADGE NO</th>
									<th scope="col">BLOOD GROUP</th>
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
			$(function(){
				$(":radio.rad1").click(function(){
					if($(this).val() == "1"){
						$("#text1").show();
					}if($(this).val() == "2"){
						$("#text1").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad2").click(function(){
					if($(this).val() == "3"){
						$("#text2").show();
					}if($(this).val() == "4"){
						$("#text2").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad3").click(function(){
					if($(this).val() == "5"){
						$("#text3").show();
					}if($(this).val() == "6"){
						$("#text3").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad4").click(function(){
					if($(this).val() == "7"){
						$("#text4").show();
					}if($(this).val() == "8"){
						$("#text4").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad5").click(function(){
					if($(this).val() == "9"){
						$("#text5").show();
					}if($(this).val() == "10"){
						$("#text5").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad6").click(function(){
					if($(this).val() == "11"){
						$("#text6").show();
					}if($(this).val() == "12"){
						$("#text6").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad7").click(function(){
					if($(this).val() == "13"){
						$("#text7").show();
					}if($(this).val() == "14"){
						$("#text7").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad8").click(function(){
					if($(this).val() == "15"){
						$("#text8").show();
					}if($(this).val() == "16"){
						$("#text8").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad9").click(function(){
					if($(this).val() == "17"){
						$("#text9").show();
					}if($(this).val() == "18"){
						$("#text9").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad10").click(function(){
					if($(this).val() == "19"){
						$("#text10").show();
					}if($(this).val() == "20"){
						$("#text10").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad11").click(function(){
					if($(this).val() == "21"){
						$("#text11").show();
					}if($(this).val() == "22"){
						$("#text11").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad12").click(function(){
					if($(this).val() == "23"){
						$("#text12").show();
					}if($(this).val() == "24"){
						$("#text12").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad13").click(function(){
					if($(this).val() == "25"){
						$("#text13").show();
					}if($(this).val() == "26"){
						$("#text13").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad14").click(function(){
					if($(this).val() == "27"){
						$("#text14").show();
					}if($(this).val() == "28"){
						$("#text14").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad15").click(function(){
					if($(this).val() == "29"){
						$("#text15").show();
					}if($(this).val() == "30"){
						$("#text15").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad16").click(function(){
					if($(this).val() == "31"){
						$("#text16").show();
					}if($(this).val() == "32"){
						$("#text16").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad17").click(function(){
					if($(this).val() == "33"){
						$("#text17").show();
					}if($(this).val() == "34"){
						$("#text17").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad18").click(function(){
					if($(this).val() == "35"){
						$("#text18").show();
					}if($(this).val() == "36"){
						$("#text18").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad19").click(function(){
					if($(this).val() == "37"){
						$("#text19").show();
					}if($(this).val() == "38"){
						$("#text19").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad20").click(function(){
					if($(this).val() == "39"){
						$("#text20").show();
					}if($(this).val() == "40"){
						$("#text20").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad21").click(function(){
					if($(this).val() == "41"){
						$("#text21").show();
					}if($(this).val() == "42"){
						$("#text21").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad22").click(function(){
					if($(this).val() == "43"){
						$("#text22").show();
					}if($(this).val() == "44"){
						$("#text22").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad23").click(function(){
					if($(this).val() == "45"){
						$("#text23").show();
					}if($(this).val() == "46"){
						$("#text23").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad24").click(function(){
					if($(this).val() == "47"){
						$("#text24").show();
					}if($(this).val() == "48"){
						$("#text24").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad25").click(function(){
					if($(this).val() == "49"){
						$("#text25").show();
					}if($(this).val() == "50"){
						$("#text25").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad26").click(function(){
					if($(this).val() == "51"){
						$("#text26").show();
					}if($(this).val() == "52"){
						$("#text26").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad27").click(function(){
					if($(this).val() == "53"){
						$("#text27").show();
					}if($(this).val() == "54"){
						$("#text27").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad28").click(function(){
					if($(this).val() == "55"){
						$("#text28").show();
					}if($(this).val() == "56"){
						$("#text28").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad29").click(function(){
					if($(this).val() == "57"){
						$("#text29").show();
					}if($(this).val() == "58"){
						$("#text29").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad30").click(function(){
					if($(this).val() == "59"){
						$("#text30").show();
					}if($(this).val() == "60"){
						$("#text30").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad31").click(function(){
					if($(this).val() == "61"){
						$("#text31").show();
					}if($(this).val() == "62"){
						$("#text31").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad32").click(function(){
					if($(this).val() == "63"){
						$("#text32").show();
					}if($(this).val() == "64"){
						$("#text32").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad33").click(function(){
					if($(this).val() == "65"){
						$("#text33").show();
					}if($(this).val() == "66"){
						$("#text33").hide();
					
					}
				});
			});
			$(function(){
				$(":radio.rad34").click(function(){
					if($(this).val() == "67"){
						$("#text34").show();
					}if($(this).val() == "68"){
						$("#text34").hide();
					
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
        }, function(){   
				$().ready(function(){                                        
					$.ajax({  
						url : "<?php echo base_url() ?>mcu/delete_mcu",
						method: "POST",
						dataType: 'json',
						data : {
							id_mcu: id_mcu,
						},  
						success: function(data){
							if(data.status=="success"){
								swal({   
									title: "good job!",   
									type: "success", 
									text: "Data MCU Berhasil dihapus",
									confirmButtonColor: "#3cb878",   
								});
								$('#datable').DataTable().ajax.reload();
							}else{
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
		    nama_lengkap = $('#inName').val();
		    tanggal = $('#intanggalmasuk').val();
			tgl_lahir = $('#inDateofbirth').val();
			occupation = $('#inOccupation').val();
			badgeno = $('#inbadge').val(); 
			sex = $('#result_sex').val();
			blood = $('#result_blood').val();
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
			healthbrosis = $('#inhealthbrosis').val();
			deadbrosis = $('#indeadbrosis').val();
			causedeadbrosis = $('#incausedeadbrosis').val();
			Ear= $('#result_Ear').val();
			Nose= $('#result_Nose').val();
			Color= $('#result_Color').val();
			Frequent= $('#result_Frequent').val();
			epilepsy= $('#result_Epilepsy').val();
			Hypertension= $('#result_Hypertension').val();
			Diabetes= $('#result_Diabetes').val();
			Endocrione= $('#result_Endocrione').val();
			Hernia= $('#result_Hernia').val();
			Fistula= $('#result_Fistula').val();
			Malaria= $('#result_Malaria').val();
			Skin= $('#result_Skin').val();
			Cance= $('#result_Cance').val();
			Allergy= $('#result_Allergy').val();
			height= $('#inheight').val();
			weight= $('#inweight').val();
			BMI= $('#inbmi').val();
			P48c= $('#intext19').val();
			P48d= $('#intext20').val();
			P48e= $('#intext21').val();
			P49a= $('#intext22').val();
			P49b= $('#intext23').val();
			P49c= $('#intext24').val();
			P49d= $('#intext25').val();
			insystolic= $('#insystolic').val();
			inpulse= $('#inpulse').val();
			P410a= $('#intext27').val();
			P410b= $('#intext28').val();
			P411a= $('#intext29').val();
			P411b= $('#intext30').val();
			P411c= $('#intext31').val();
			P412a= $('#intext32').val();
			P412b= $('#intext33').val();
			P413a= $('#intext34').val();
			UFVOO = $('#inuncorrected1').val();
			UFVOS = $('#inuncorrected2').val();
			UNVOO = $('#inuncorrected3').val();
			UNVOS = $('#inuncorrected4').val();
			UCVAdequate= $('#inAdequate').val();
			CFVOO = $('#incorrected1').val();
			CFVOS = $('#incorrected2').val();
			CNVOO = $('#incorrected3').val();
			CNVOS = $('#incorrected4').val();
			CCVDefective= $('#inDefective').val();
			Remarks= $('#inremarks').val();
			P51a= $('#inChest').val();
			P52a= $('#inEcg').val();
			P53a= $('#inAudiogram').val();
			P541a= $('#result_bloodr').val();
			P542a= $('#result_Basophils').val();
			P543a= $('#result_urea').val();
			P55a= $('#inurine').val();
			P56a= $('#indrugs').val();
			P57a= $('#result_HIV').val();
			P58a= $('#result_Tine').val();
			P59a= $('#result_HB').val();
			P510a= $('#result_TPHA').val();
			P511a= $('#result_Stool').val();
			P512a= $('#result_Pharyngeal').val();
			P513a= $('#result_Spirometry').val();
			summary= $('#insummary').val();
			present= $('#inpresent').val();
			examined= $('#inexamined').val();
			Duty= $('#result_Duty').val();
			swal({   
            title: "Apakah kamu yakin ingin !",   
            text: "Menyimpan Data  ini ?",
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#3cb878",   
            confirmButtonText: "Yakin",   
            cancelButtonText: "Batal",   
            closeOnConfirm: false 
        }, function(){   
				$().ready(function(){                                        
					$.ajax({  
						url : "<?php echo base_url() ?>mcu/simpan_mcu",
						method: "POST",
						dataType: 'json',
						data : {
						nama_lengkap:nama_lengkap,
						tanggal:tanggal,
						tgl_lahir:tgl_lahir,
						occupation:occupation,
						sex:sex,
						badgeno:badgeno,
						blood:blood,
						P11a:P11a,
						P11b:P11b,
						P12a:P12a,
						P12b:P12b,
						P12c:P12c,
						P12d:P12d,
						P12e:P12e,
						P12f:P12f,
						P12g:P12g,
						P12h:P12h,
						P13a:P13a,
						P13b:P13b,
						P14 :P14,
						P15 :P15,
						P16 :P16,
						P17a:P17a,
						smoker:smoker,
						numbersmoked:numbersmoked,
						concumption_alcohol:concumption_alcohol,
						liv_father:liv_father,
						healthfather:healthfather,
						deadfather:deadfather,
						causedeadfather:causedeadfather,
						liv_mother : liv_mother,
						healthmother : healthmother,
						deadmother : deadmother,
						causedeadmother : causedeadmother,
						livbrosis : livbrosis,
						healthbrosis : healthbrosis,
						deadbrosis : deadbrosis,
						causedeadbrosis : causedeadbrosis,
						Ear:Ear,
						Nose:Nose,
						Color:Color,
						Frequent:Frequent,
						epilepsy:epilepsy,
						Hypertension:Hypertension,
						Diabetes:Diabetes,
						Endocrione:Endocrione,
						Hernia:Hernia,
						Fistula:Fistula,
						Malaria:Malaria,
						Skin:Skin,
						Cance:Cance,
						Allergy:Allergy,
						height:height,
						weight:weight,
						BMI:BMI,
						P48c:P48c,
						P48d:P48d,
						P48e:P48e,
						P49a: P49a,
						P49b: P49b,
						P49c: P49c,
						P49d: P49d,
						insystolic: insystolic,
						inpulse: inpulse,
						P410a:P410a,
						P410b:P410b,
						P411a:P411a,
						P411b:P411b,
						P411c:P411c,
						P412a:P412a,
						P412b:P412b,
						P413a:P413a,
						UFVOO:UFVOO,
						UFVOS:UFVOS,
						UNVOO:UNVOO,
						UNVOS:UNVOS,
						UCVAdequate:UCVAdequate,
						CFVOO:CFVOO,
						CFVOS:CFVOS,
						CNVOO:CNVOO,
						CNVOS:CNVOS,
						CCVDefective:CCVDefective,
						Remarks:Remarks,
						P51a:P51a,
						P52a:P52a,
						P53a:P53a,
						P541a:P541a,
						P542a:P542a,
						P543a:P543a,
						P55a:P55a,
						P56a:P56a,
						P57a:P57a,
						P58a:P58a,
						P59a:P59a,
						P510a:P510a,
						P511a:P511a,
						P512a:P512a,
						P513a:P513a,
						summary:summary,
						present:present,
						examined:examined,
						Duty:Duty,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Medical Check Up Pasien ini telah disimpan",
							confirmButtonColor: "#3cb878",

						});
						$('#datable').DataTable().ajax.reload();
						}else{
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
							$(document).ready(function () {
								$('#datable').DataTable({
									"language": {
            					"sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
    							"sProcessing":   "Sedang memproses...",
    							"sLengthMenu":   "Tampilkan _MENU_ entri",
    							"sZeroRecords":  "Tidak ditemukan data yang sesuai",
    							"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    							"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
    							"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    							"sInfoPostFix":  "",
    							"sSearch":       "Cari:",
    							"sUrl":          "",
								"oPaginate": {
        						"sFirst":    "Pertama",
        						"sPrevious": "Sebelumnya",
        						"sNext":     "Selanjutnya",
        							"sLast":     "Terakhir"
    					},
					
							},		
									"ajax": '<?php echo base_url('mcu/Data_MCU'); ?>',	
									"deferRender": true,
									"processing": true,
									"order": [], 
									"columnDefs": [
            						{ 
                					"targets": [ 0 ], 
                					"orderable": false, 
            						},
            						],
									
								});
							});

						</script>
</body>
</html>
