<div class="row ">
	<div class="col-md-12 mt-20 mb-20">
		<div class="col-md-8">
			<br>
			<br>

			<div class="row">
				<style>
					#list_tanggungan {
						min-height: 650px;
						max-height: 650px;
						/* Atur tinggi maksimum */
						overflow: hidden;
					}

					#scrolling-content0 {
						animation: scrollUpMenunggu 50s linear infinite;
						/* Atur animasi scrolling */
					}

					@keyframes scrollUpMenunggu {
						0% {
							transform: translateY(0);
						}

						100% {
							transform: translateY(-100%);
						}
					}
				</style>

				<div class="col-md-3 text-center">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h2 class="txt-dark text-center pl-10 pt-10" style="font-weight:bold; font-size:30px; font-family: 'Times New Roman', Times, serif">
								MENUNGGU</h2>
						</div>
						<div id="list_tanggungan">
							<div id="scrolling-content0">
							</div>
						</div>
					</div>
				</div>

				<style>
					#list_diproses {
						min-height: 650px;
						max-height: 650px;
						/* Atur tinggi maksimum */
						overflow: hidden;
					}

					#scrolling-content1 {
						animation: scrollUpDiproses 50s linear infinite;
						/* Atur animasi scrolling */
					}

					@keyframes scrollUpDiproses {
						0% {
							transform: translateY(0);
						}

						100% {
							transform: translateY(-100%);
						}
					}
				</style>

				<div class="col-md-3 text-center">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h2 class="txt-dark text-center pl-10 pt-10" style="font-weight:bold; font-size:30px; font-family: 'Times New Roman', Times, serif">
								DIPROSES</h2>
						</div>
						<div id="list_diproses">
							<div id="scrolling-content1">
							</div>
						</div>
					</div>
				</div>

				<style>
					#list_selesai {
						min-height: 650px;
						max-height: 650px;
						/* Atur tinggi maksimum */
						overflow: hidden;
					}

					#scrolling-content2 {
						animation: scrollUpSelesai 50s linear infinite;
						/* Atur animasi scrolling */
					}

					@keyframes scrollUpSelesai {
						0% {
							transform: translateY(0);
						}

						100% {
							transform: translateY(-100%);
						}
					}
				</style>

				<div class="col-md-3 text-center">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h2 class="txt-dark text-center pl-10 pt-10" style="font-weight:bold; font-size:30px; font-family: 'Times New Roman', Times, serif">
								SELESAI</h2>
						</div>
						<div id="list_selesai">
							<div id="scrolling-content2">
							</div>
						</div>
					</div>
				</div>

				<style>
					#list_lewat {
						min-height: 650px;
						max-height: 650px;
						/* Atur tinggi maksimum */
						overflow: hidden;
					}

					#scrolling-content3 {
						animation: scrollUpLewat 50s linear infinite;
						/* Atur animasi scrolling */
					}

					@keyframes scrollUpLewat {
						0% {
							transform: translateY(0);
						}

						100% {
							transform: translateY(-100%);
						}
					}
				</style>

				<div class="col-md-3 text-center">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h2 class="txt-dark text-center pl-10 pt-10" style="font-weight:bold; font-size:30px; font-family: 'Times New Roman', Times, serif">
								TERLEWATI</h2>
						</div>
						<div id="list_lewat">
							<div id="scrolling-content3">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-default card-view" style="background-color:#3CB878; margin-top:27px; height:730px;">
				<div class="panel-wrapper collapse in">
					<div class="panel-body" style="background-color:#f7f7f9; height:700px;">
						<div class="row">
							<div class="col-md-12 text-center mb-75">

								<h3 style="font-weight:bold; font-size:35px; margin-top:15px; font-family: 'Times New Roman', Times, serif"> NOMOR ANTRIAN </h3>
								<h1 class="txt-danger" id="no" style="font-size:170px; font-weight:bold; margin-top:100px; font-family: 'Times New Roman', Times, serif"></h1>
								<h3 style="font-weight:normal; font-size:40px; margin-top:80px; font-family: 'Times New Roman', Times, serif"> NAMA PASIEN </h3>
								<h3 class="txt-danger" id="nama" style="font-weight:bold; font-size:40px; margin-top:-0.2em; font-family: 'Times New Roman', Times, serif"> </h3>
								<h3 style="font-weight:bold; font-size:35px; margin-top:40px; font-family: 'Times New Roman', Times, serif"> SILAHKAN MENUJU KE LOKET </h3>
								<h2 class="txt-danger" style="font-size:60px; font-weight:bold; margin-top:10px; font-family: 'Times New Roman', Times, serif"> FARMASI </h2>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div>

	<marquee bgcolor="white" style="color: black; font-weight: bold; margin-top:-20px;">
		<h4>SELAMAT DATANG DI FARMASI RUMAH SAKIT BAKTI TIMAH PANGKALPINANG</h4>
	</marquee>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		setInterval(function() {
			$.ajax({
				url: "<?= base_url() ?>Layar_farmasi2/Get_antrian_Suara",
				type: "POST",
				dataType: "JSON",
				data: {},
				success: function(data) {
					var no_antri = data.data.inisial + data.data.no;
					var nomorHurufBesar = no_antri.toUpperCase();
					$("#no").html(nomorHurufBesar);
					$("#nama").html(data.data.nama);

					if (data.data.no !== 'undefined') {
						playSuaraAntrian(data.data.no, data.data.inisial);
					}
				}
			});
		}, 5000);
	})
</script>

<script type="text/javascript">
	function hapusAtasAntrian() {
		$.ajax({
			url: "<?= base_url() ?>Layar_farmasi2/deleteSuara",
			method: "POST",
			dataType: "JSON",
			data: "",
			success: function(data) {}
		});
	}
</script>

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

	function playSuaraAntrian(no,inisial) {
		if (isPlay == false && no != '') {
			isPlay = true;
			// charAntrian = no.substring(0, 1);
			noAntrian = parseInt(no);
			strNo = noAntrian + "";

			urutan = [];
			urutan.push('IN');
			urutan.push('NO ANTRIAN');
			urutan.push(inisial);
			ReadNo = read_digit(noAntrian);
			ReadNo_arr = ReadNo.split(",");
			for (var i = 0; i < (ReadNo_arr.length); i++) {
				if (ReadNo_arr[i] != "") {
					urutan.push(ReadNo_arr[i]);
				}
			}
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
		}
	}
</script>

<script>
	// Menunggu
	function checkData() {
		$.ajax({
			url: "Layar_farmasi2/Get_Menunggu",
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				var event_data = '';
				$.each(data.data, function(index, value) {
					event_data += '<div class="panel-body">';
					event_data += '<div class="col-md-12 txt-dark text-center" style="font-size: 35px; font-weight:bold; color: rgb(255, 100, 0) !important; font-family: \'Times New Roman\', Times, serif">';
					event_data += '<span>' + value.inisial.toUpperCase() + '</span>';
					event_data += '<span>' + value.nomor + '</span>';
					event_data += '</div>';
					event_data += '<div class="col-md-12 txt-dark text-center" style="font-size: 20px;  color: rgb(255, 100, 0) !important; font-family: \'Times New Roman\', Times, serif">';
					event_data += '<span>' + value.nama + '</span>';
					event_data += '</div>';
					event_data += '</div>';
				});

				$("#scrolling-content0").empty().html(event_data);
			},
		});
	}
	setInterval(checkData, 5000);
</script>

<script>
	// Diproses
	function checkData2() {
		$.ajax({
			url: "Layar_farmasi2/Get_Diproses",
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				var event_data = '';
				$.each(data.data, function(index, value) {
					event_data += '<div class="panel-body">';
					event_data += '<div class="col-md-12 txt-dark text-center" style="font-size: 35px; font-weight:bold; color: rgb(0, 0, 255) !important; font-family: \'Times New Roman\', Times, serif">';
					event_data += '<span>' + value.inisial.toUpperCase() + '</span>';
					event_data += '<span>' + value.nomor + '</span>';
					event_data += '</div>';
					event_data += '<div class="col-md-12 txt-dark text-center" style="font-size: 20px;  color: rgb(0, 0, 255) !important; font-family: \'Times New Roman\', Times, serif">';
					event_data += '<span>' + value.nama + '</span>';
					event_data += '</div>';
					event_data += '</div>';
				});

				$("#scrolling-content1").empty().html(event_data);
			},
		});
	}
	setInterval(checkData2, 5000);
</script>

<script>
	//Selesai
	function checkData3() {
		$.ajax({
			url: "Layar_farmasi2/Get_Selesai",
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				var event_data = '';
				$.each(data.data, function(index, value) {
					event_data += '<div class="panel-body">';
					event_data += '<div class="col-md-12 txt-dark text-center" style="font-size: 35px; font-weight:bold; color: rgb(255, 100, 0) !important; font-family: \'Times New Roman\', Times, serif">';
					event_data += '<span>' + value.inisial.toUpperCase() + '</span>';
					event_data += '<span>' + value.nomor + '</span>';
					event_data += '</div>';
					event_data += '<div class="col-md-12 txt-dark text-center" style="font-size: 20px;  color: rgb(255, 100, 0) !important; font-family: \'Times New Roman\', Times, serif">';
					event_data += '<span>' + value.nama + '</span>';
					event_data += '</div>';
					event_data += '</div>';
				});

				$("#scrolling-content2").empty().html(event_data);
			},
		});
	}
	setInterval(checkData3, 5000);
</script>

<script>
	//Terlewati
	function checkData4() {
		$.ajax({
			url: "Layar_farmasi2/Get_Lewat",
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				var event_data = '';
				$.each(data.data, function(index, value) {
					event_data += '<div class="panel-body">';
					event_data += '<div class="col-md-12 txt-dark text-center" style="font-size: 35px; font-weight:bold; color: rgb(255, 100, 0) !important; font-family: \'Times New Roman\', Times, serif">';
					event_data += '<span>' + value.inisial.toUpperCase() + '</span>';
					event_data += '<span>' + value.nomor + '</span>';
					event_data += '</div>';
					event_data += '<div class="col-md-12 txt-dark text-center" style="font-size: 20px;  color: rgb(255, 100, 0) !important; font-family: \'Times New Roman\', Times, serif">';
					event_data += '<span>' + value.nama + '</span>';
					event_data += '</div>';
					event_data += '</div>';
				});

				$("#scrolling-content3").empty().html(event_data);
			},
		});
	}
	setInterval(checkData4, 5000);
</script>