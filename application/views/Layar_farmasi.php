<<<<<<< HEAD
<div class="row ">
	<div class="col-md-12 mt-30 mb-20 ">
		<div class="col-md-5">
			<h4 class="txt-dark text-center pl-30 pt-10" style="font-weight:bold; font-size:40px;">
				LIST ANTRIAN </h4>
			<br>
			<br>
			<?php foreach ($farmasi as $row) { ?>
				<div class="panel panel-default card-view col-md-4 pa-15 mb-0 pl-15 pt-15 pr-15">
					<div class="panel-wrapper collapse in">
						<div class="panel-body bg-success pa-0">
							<div class="sm-data-box  pt-25 pb-0">
								<div class="row ma-0">
									<div class="col-md-12 text-center mb-4 mt-5 pr-5" >
										<div class="col-md-3 text-center">
											<div class="row">
												<h2 class="txt-dark text-left pl-30 pt-10" style="font-weight:bold; font-size:50px;">
													T<?= $row['no_antri'] ?> </h2>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
		<div class="col-md-7">
			<div class="panel panel-default card-view">
				<div class="panel-wrapper collapse in">
					<div class="panel-body" style="background-color:#f7f7f9">
						<div class="row">
							<div class="col-md-12 text-center mb-75">
								<h3 style="font-weight:bold; font-size:35px; margin-bottom:110px;"> NOMOR ANTRIAN </h3>

								<h1 class="txt-danger" style="font-size:295px; font-weight:bold;"><?= strtoupper($data['no']); ?> </h1>

								<h3 style="font-weight:normal; font-size:50px; margin-top:180px;"> NAMA PASIEN </h3>
								<h3 class="txt-primary" style="font-weight:bold; font-size:50px; margin-top:-0.2em; ">
									<?= strtoupper($data['nama']); ?></h3>
								</h2>

								<h3 style="font-weight:bold; font-size:35px; margin-top:115px;"> SILAHKAN MENUJU KE
									LOKET </h3>
								<h2 class="txt-danger" style="font-size:130px; font-weight:bold;  margin-top:45px;"> FARMASI
								</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Bordered-->
		<div class="col-md-12">
			<div class="panel panel-default card-view">
				<div class="panel-wrapper collapse in" style="margin-left:-1em; margin-right:-1em; margin-top:-1em; margin-bottom:-1em">
					<div class="panel-body">
						<!-- START carousel-->
						<div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
							<ol class="carousel-indicators">
								<li data-target="#carousel-example-captions-1" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-captions-1" data-slide-to="1"></li>
							</ol>
							<div role="listbox" class="carousel-inner">
								<div class="item active"> <img width="100%" src="<?= base_url(); ?>assets/images/footer.jpg"> </div>
								<div class="item"> <img width="100%" src="<?= base_url(); ?>assets/images/footer2.jpg">
								</div>
							</div>
						</div>
						<!-- END carousel-->
					</div>
				</div>
			</div>
		</div>
	</div>




	<script type="text/javascript">
		isPlay = false;

		var currentAudio = null;

		function test() {
			alert(audios.length);
			audios[0].play();
		}


		function read_digit(digit) {
			if (digit < 10) {
				return parseInt(digit) + ",";
			} else if (digit < 100) {
				return read_puluhan(digit);
			} else if (digit < 1000) {
				return read_ratusan(digit);
			} else if (digit < 10000) {
				return read_ribuan(digit);
			} else if (digit < 100000) {
				return read_puluhribuan(digit);
			} else {
				strNo = digit + "";
				tmpout = "";
				for (var i = 0; i < (strNo.length); i++) {
					tmpout += strNo.charAt(i) + ",";
				}
				return tmpout;
			}
		}

		function read_puluhribuan(digit) {
			strdigit = digit + "";
			var out1 = "";
			var out2 = "";
			if (digit == 10000) {
				out1 = "sepuluh,ribu";
			} else if (digit < 11000) {
				out1 = "sepuluh,ribu,";
				out2 = read_ratusan(strdigit.substring(2, 5));
			} else if (digit > 11000 && digit < 12000) {
				out1 = "sebelas,ribu,";
				out2 = read_ratusan(strdigit.substring(2, 5));
			} else if (digit < 20000) {
				out1 = strdigit.charAt(1) + ",belas,ribu,";
				out2 = read_ratusan(strdigit.substring(2, 5));
			} else {
				out1 = strdigit.charAt(0) + ",puluh," + strdigit.charAt(1) + ",ribu,";
				out2 = read_ratusan(strdigit.substring(2, 5));
			}
			return out1 + out2;
		}

		function read_ribuan(digit) {
			strdigit = digit + "";
			var out1 = "";
			var out2 = "";
			if (digit == 100) {
				out1 = "seribu";
			} else if (digit > 1000 && digit < 2000) {
				out1 = "seribu,";
				out2 = read_ratusan(strdigit.substring(1, 4));
			} else {
				out1 = strdigit.charAt(0) + ",ribu,";
				out2 = read_ratusan(strdigit.substring(1, 4));
			}
			return out1 + out2;
		}

		function read_ratusan(digit) {
			strdigit = digit + "";
			var out1 = "";
			var out2 = "";
			if (digit == 100) {
				out1 = "seratus";
			} else if (digit < 100) {
				out1 = ",";
				out2 = read_puluhan(strdigit.substring(1, 3));
			} else if (digit > 100 && digit < 200) {
				out1 = "seratus,";
				out2 = read_puluhan(strdigit.substring(1, 3));
			} else {
				out1 = strdigit.charAt(0) + ",ratus,";
				out2 = read_puluhan(strdigit.substring(1, 3));
			}
			return out1 + out2;
		}

		function read_puluhan(digit) {
			strdigit = digit + "";
			if (digit == 10) {
				return "sepuluh";
			} else if (digit < 10) {
				return parseInt(digit);
			} else if (digit == 11) {
				return "sebelas";
			} else if (digit > 11 && digit < 20) { //16
				return strdigit.charAt(1) + ",belas";
			} else {
				if (strdigit.charAt(1) == "0") { //94
					return strdigit.charAt(0) + ",puluh,";
				} else {
					return strdigit.charAt(0) + ",puluh," + strdigit.charAt(1);
				}
			}
		}

		function playSuaraAntrian(no) {
			// alert(no);
			// cth -> no ="A456"
			if (isPlay == false && no != '') {
				isPlay = true;
				charAntrian = no.substring(0, 1); //cut no first (array start from 0, so 0 to 1) character "A"
				noAntrian = parseInt(no.substring(1)); // cut no from second character to end
				strNo = noAntrian + "";
				urutan = [];
				urutan.push('IN');
				urutan.push('NO ANTRIAN');
				urutan.push(charAntrian); // push sound character
				ReadNo = read_digit(noAntrian); // call read digit to get number
				// console.log(ReadNo);
				ReadNo_arr = ReadNo.split(",");
				for (var i = 0; i < (ReadNo_arr.length); i++) {
					if (ReadNo_arr[i] != "") {
						urutan.push(ReadNo_arr[i]);
					}
				}
				// alert(tipe);

				urutan.push('SILAHKAN MENUJU LOKET FARMASI');
				urutan.push('OUT');


				index = 0;
				audios = {};
				urutan.forEach(note => {
					var audio = new Audio();
					audio.src = `<?= base_url(); ?>assets/audio/${note}.mp3`;
					audios[note] = audio;

				});

				currentAudio = null;
				playNoteAntrian();
			} else {
				hapusAtasAntrian();
			}
		}
	</script>


	<script type="text/javascript">
		function playNoteAntrian() {
			if (currentAudio) {
				currentAudio.removeEventListener('ended', playNoteAntrian);
			}

			if (index >= urutan.length) {

				isPlay = false;
				hapusAtasAntrian();
				return;
			}

			currentAudio = audios[urutan[index]];
			index++;
			currentAudio.play();
			currentAudio.addEventListener('ended', playNoteAntrian);
		}

		//  Beda
		<?php
		if ($data > 0) {
		?>
			playSuaraAntrian(<?= "'" . $data['no'] . "'"; ?>);

		<?php
		} else {
		?>
			setTimeout(location.reload.bind(location), 5000);
		<?php } ?>


		function hapusAtasAntrian() {
			$.ajax({
				url: "<?= base_url() ?>Layar_farmasi/deleteSuara",
				method: "POST",
				dataType: "JSON",
				data: "",
				success: function(data) {
					// alert('Oke');
					setTimeout(location.reload.bind(location), 3000);
				}
			});
		}
=======
<div class="row ">
	<div class="col-md-12 mt-30 mb-20 ">
		<div class="col-md-5">
			<h4 class="txt-dark text-center pl-30 pt-10" style="font-weight:bold; font-size:40px;">
				LIST ANTRIAN </h4>
			<br>
			<br>
			<?php foreach ($farmasi as $row) { ?>
				<div class="panel panel-default card-view col-md-4 pa-15 mb-0 pl-15 pt-15 pr-15">
					<div class="panel-wrapper collapse in">
						<div class="panel-body bg-success pa-0">
							<div class="sm-data-box  pt-25 pb-0">
								<div class="row ma-0">
									<div class="col-md-12 text-center mb-4 mt-5 pr-5" >
										<div class="col-md-3 text-center">
											<div class="row">
												<h2 class="txt-dark text-left pl-30 pt-10" style="font-weight:bold; font-size:50px;">
													T<?= $row['no_antri'] ?> </h2>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
		<div class="col-md-7">
			<div class="panel panel-default card-view">
				<div class="panel-wrapper collapse in">
					<div class="panel-body" style="background-color:#f7f7f9">
						<div class="row">
							<div class="col-md-12 text-center mb-75">
								<h3 style="font-weight:bold; font-size:35px; margin-bottom:110px;"> NOMOR ANTRIAN </h3>

								<h1 class="txt-danger" style="font-size:295px; font-weight:bold;"><?= strtoupper($data['no']); ?> </h1>

								<h3 style="font-weight:normal; font-size:50px; margin-top:180px;"> NAMA PASIEN </h3>
								<h3 class="txt-primary" style="font-weight:bold; font-size:50px; margin-top:-0.2em; ">
									<?= strtoupper($data['nama']); ?></h3>
								</h2>

								<h3 style="font-weight:bold; font-size:35px; margin-top:115px;"> SILAHKAN MENUJU KE
									LOKET </h3>
								<h2 class="txt-danger" style="font-size:130px; font-weight:bold;  margin-top:45px;"> FARMASI
								</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Bordered-->
		<div class="col-md-12">
			<div class="panel panel-default card-view">
				<div class="panel-wrapper collapse in" style="margin-left:-1em; margin-right:-1em; margin-top:-1em; margin-bottom:-1em">
					<div class="panel-body">
						<!-- START carousel-->
						<div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
							<ol class="carousel-indicators">
								<li data-target="#carousel-example-captions-1" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-captions-1" data-slide-to="1"></li>
							</ol>
							<div role="listbox" class="carousel-inner">
								<div class="item active"> <img width="100%" src="<?= base_url(); ?>assets/images/footer.jpg"> </div>
								<div class="item"> <img width="100%" src="<?= base_url(); ?>assets/images/footer2.jpg">
								</div>
							</div>
						</div>
						<!-- END carousel-->
					</div>
				</div>
			</div>
		</div>
	</div>




	<script type="text/javascript">
		isPlay = false;

		var currentAudio = null;

		function test() {
			alert(audios.length);
			audios[0].play();
		}


		function read_digit(digit) {
			if (digit < 10) {
				return parseInt(digit) + ",";
			} else if (digit < 100) {
				return read_puluhan(digit);
			} else if (digit < 1000) {
				return read_ratusan(digit);
			} else if (digit < 10000) {
				return read_ribuan(digit);
			} else if (digit < 100000) {
				return read_puluhribuan(digit);
			} else {
				strNo = digit + "";
				tmpout = "";
				for (var i = 0; i < (strNo.length); i++) {
					tmpout += strNo.charAt(i) + ",";
				}
				return tmpout;
			}
		}

		function read_puluhribuan(digit) {
			strdigit = digit + "";
			var out1 = "";
			var out2 = "";
			if (digit == 10000) {
				out1 = "sepuluh,ribu";
			} else if (digit < 11000) {
				out1 = "sepuluh,ribu,";
				out2 = read_ratusan(strdigit.substring(2, 5));
			} else if (digit > 11000 && digit < 12000) {
				out1 = "sebelas,ribu,";
				out2 = read_ratusan(strdigit.substring(2, 5));
			} else if (digit < 20000) {
				out1 = strdigit.charAt(1) + ",belas,ribu,";
				out2 = read_ratusan(strdigit.substring(2, 5));
			} else {
				out1 = strdigit.charAt(0) + ",puluh," + strdigit.charAt(1) + ",ribu,";
				out2 = read_ratusan(strdigit.substring(2, 5));
			}
			return out1 + out2;
		}

		function read_ribuan(digit) {
			strdigit = digit + "";
			var out1 = "";
			var out2 = "";
			if (digit == 100) {
				out1 = "seribu";
			} else if (digit > 1000 && digit < 2000) {
				out1 = "seribu,";
				out2 = read_ratusan(strdigit.substring(1, 4));
			} else {
				out1 = strdigit.charAt(0) + ",ribu,";
				out2 = read_ratusan(strdigit.substring(1, 4));
			}
			return out1 + out2;
		}

		function read_ratusan(digit) {
			strdigit = digit + "";
			var out1 = "";
			var out2 = "";
			if (digit == 100) {
				out1 = "seratus";
			} else if (digit < 100) {
				out1 = ",";
				out2 = read_puluhan(strdigit.substring(1, 3));
			} else if (digit > 100 && digit < 200) {
				out1 = "seratus,";
				out2 = read_puluhan(strdigit.substring(1, 3));
			} else {
				out1 = strdigit.charAt(0) + ",ratus,";
				out2 = read_puluhan(strdigit.substring(1, 3));
			}
			return out1 + out2;
		}

		function read_puluhan(digit) {
			strdigit = digit + "";
			if (digit == 10) {
				return "sepuluh";
			} else if (digit < 10) {
				return parseInt(digit);
			} else if (digit == 11) {
				return "sebelas";
			} else if (digit > 11 && digit < 20) { //16
				return strdigit.charAt(1) + ",belas";
			} else {
				if (strdigit.charAt(1) == "0") { //94
					return strdigit.charAt(0) + ",puluh,";
				} else {
					return strdigit.charAt(0) + ",puluh," + strdigit.charAt(1);
				}
			}
		}

		function playSuaraAntrian(no) {
			// alert(no);
			// cth -> no ="A456"
			if (isPlay == false && no != '') {
				isPlay = true;
				charAntrian = no.substring(0, 1); //cut no first (array start from 0, so 0 to 1) character "A"
				noAntrian = parseInt(no.substring(1)); // cut no from second character to end
				strNo = noAntrian + "";
				urutan = [];
				urutan.push('IN');
				urutan.push('NO ANTRIAN');
				urutan.push(charAntrian); // push sound character
				ReadNo = read_digit(noAntrian); // call read digit to get number
				// console.log(ReadNo);
				ReadNo_arr = ReadNo.split(",");
				for (var i = 0; i < (ReadNo_arr.length); i++) {
					if (ReadNo_arr[i] != "") {
						urutan.push(ReadNo_arr[i]);
					}
				}
				// alert(tipe);

				urutan.push('SILAHKAN MENUJU LOKET FARMASI');
				urutan.push('OUT');


				index = 0;
				audios = {};
				urutan.forEach(note => {
					var audio = new Audio();
					audio.src = `<?= base_url(); ?>assets/audio/${note}.mp3`;
					audios[note] = audio;

				});

				currentAudio = null;
				playNoteAntrian();
			} else {
				hapusAtasAntrian();
			}
		}
	</script>


	<script type="text/javascript">
		function playNoteAntrian() {
			if (currentAudio) {
				currentAudio.removeEventListener('ended', playNoteAntrian);
			}

			if (index >= urutan.length) {

				isPlay = false;
				hapusAtasAntrian();
				return;
			}

			currentAudio = audios[urutan[index]];
			index++;
			currentAudio.play();
			currentAudio.addEventListener('ended', playNoteAntrian);
		}

		//  Beda
		<?php
		if ($data > 0) {
		?>
			playSuaraAntrian(<?= "'" . $data['no'] . "'"; ?>);

		<?php
		} else {
		?>
			setTimeout(location.reload.bind(location), 5000);
		<?php } ?>


		function hapusAtasAntrian() {
			$.ajax({
				url: "<?= base_url() ?>Layar_farmasi/deleteSuara",
				method: "POST",
				dataType: "JSON",
				data: "",
				success: function(data) {
					// alert('Oke');
					setTimeout(location.reload.bind(location), 3000);
				}
			});
		}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
	</script>