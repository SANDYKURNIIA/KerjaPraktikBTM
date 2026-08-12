<<<<<<< HEAD
<?php


?>

<div class="row ">
	<div class="col-md-12 mt-30 mb-20 ">
		<style>
			#list_tanggungan {
				min-height: 650px;
				max-height: 650px;
				/* Atur tinggi maksimum */
				overflow: hidden;
			}

			.scrolling {
				animation: scrollUpMenunggu 20s linear infinite forwards;
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
		<div class="col-md-4 text-center">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h2 class="txt-dark text-center pl-10 pt-10" style="font-weight:bold; font-size:30px; font-family: 'Times New Roman', Times, serif">LIST</h2>
				</div>
				<div id="list_tanggungan">
					<div id="scrolling-content0">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-default card-view" style="height: 730px;">
				<div class="panel-wrapper collapse in">
					<div class="panel-body" style="background-color:#f7f7f9; height: 700px;">
						<div class="row">
							<div class="col-md-50 text-center mb-15">
								<h3 style="font-weight:bold; font-size:35px; margin-top:15px;"> NOMOR ANTRIAN</h3>
								<h3 id="namapoli" style="font-weight:bold; font-size:35px; margin-top:1px;"></h3>

								<h1 class="txt-danger" id="nomor" style="font-size:170px; font-weight:bold; margin-top:50px;"></h1>
								<h3 style="font-weight:normal; font-size:40px; margin-top:50px;"> NAMA PASIEN </h3>
								<h3 class="txt-primary" id="nama" style="font-weight:bold; font-size:40px; margin-top:-0.2em; "></h3>
								<h3 style="font-weight:bold; font-size:35px; margin-top:40px; font-family: 'Times New Roman', Times, serif"> SILAHKAN MENUJU KE POLI</h3>
								<h2 class="txt-danger" id="namadokter" style="font-size:60px; font-weight:bold; margin-top:10px; font-family: 'Times New Roman', Times, serif"> </h2>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


<!-- IKLAN -->

<div class="col-md-12 mt-20">
	<div class="panel panel-default card-view">
		<div class="panel-wrapper collapse in" style="margin-left:-1em; margin-right:-1em; margin-top:-1em; margin-bottom:-1em">
			<div class="panel-body">
				<!-- START carousel-->
				<div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-captions-1" data-slide-to="0" class="active">
						</li>
						<li data-target="#carousel-example-captions-1" data-slide-to="1"></li>
					</ol>
					<div role="listbox" class="carousel-inner">
						<div class="item active"> <img width="100%" src="<?= base_url(); ?>assets/dist/img/footer.jpg">
						</div>
						<div class="item"> <img width="100%" src="<?= base_url(); ?>assets/dist/img/footer2.jpg">
						</div>
					</div>
				</div>
				<!-- END carousel-->
			</div>
		</div>
	</div>
</div>

<!-- END IKLAN -->

<script type="text/javascript">
	$(document).ready(function() {
		setInterval(function() {
			$.ajax({
				url: "<?= base_url() ?>Layar_Poli/Get_antrian_Suara",
				type: "POST",
				dataType: "JSON",
				data: {
					poli: '<?= $poli ?>'
				},
				success: function(data) {
					if (data.status == 'ok') {
						var no_antri = data.data.kode + data.data.no;
						var nomorHurufBesar = no_antri.toUpperCase();
						$("#nomor").html(nomorHurufBesar);
						$("#nama").html(data.data.nama);
						var poli = data.data.poli;
						var polibesar = poli.toUpperCase();

						$("#namapoli").html('POLI ' + polibesar);
						playSuaraAntrian(data.data.no, data.data.kode, data.data.poli);
					} else {
						$("#nomor").html('');
						$("#nama").html('');
					}
				}
			});
		}, 5000);
		// $("#no").html('');
		setInterval(checkData, 5000);

	})
</script>
<script>
	const panelContainer = document.querySelector('#scrolling-content0');
	// Fungsi untuk mengkloning panel pertama dan menambahkannya ke akhir
	function cloneFirstPanel() {
		const firstPanel = panelContainer.firstElementChild.cloneNode(true);
		panelContainer.appendChild(firstPanel);
	}

	// Fungsi untuk mengkloning panel terakhir dan menambahkannya ke awal
	function cloneLastPanel() {
		const lastPanel = panelContainer.lastElementChild.cloneNode(true);
		panelContainer.insertBefore(lastPanel, panelContainer.firstChild);
	}

	// Menunggu
	function checkData() {
		$.ajax({
			url: "<?= base_url() ?>Layar_Poli/getPoli",
			type: "POST",
			dataType: "JSON",
			data: {
				poli: '<?= $poli ?>'
			},
			success: function(data) {
				console.log(data.data.length);
				if (data.data.length > 3) {
					$('#scrolling-content0').addClass("scrolling");
				} else {
					$('#scrolling-content0').removeClass("scrolling");
				}
				var event_data = '';
				$.each(data.data, function(index, value) {
					event_data += '<div class="panel panel-default card-view pa-15 mb-0 pl-15 pt-15 pr-15">';
					event_data += '<div class="panel-wrapper collapse in">';
					event_data += '<div class="panel-body bg-success pa-0">';
					event_data += '<div class="sm-data-box pt-30 pb-50 ">';

					event_data += '<div class="col-md-12 txt-dark text-center" style="font-size: 20px;  color: black !important; font-family: \'Times New Roman\', Times, serif">';
					event_data += '<span>POLI ' + value.nama + '</span>';
					event_data += '</div>';

					event_data += '<div class="col-md-12 txt-dark text-center" style="font-size: 35px; font-weight:bold; color: black !important; font-family: \'Times New Roman\', Times, serif">';
					event_data += '<span>' + value.inisial.toUpperCase() + '</span>';
					event_data += '<span>' + value.nomor + '</span>';
					event_data += '</div>';

					event_data += '</div>';
					event_data += '</div>';
					event_data += '</div>';
					event_data += '</div>';
				});

				$("#scrolling-content0").empty().html(event_data);
				// cloneFirstPanel();
				// cloneLastPanel();
			},
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
		if (digit == 1000) {
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
		} else if (digit == 200) {
			out1 = strdigit.charAt(0) + ",ratus,";
		} else if (digit == 300) {
			out1 = strdigit.charAt(0) + ",ratus,";
		} else if (digit == 400) {
			out1 = strdigit.charAt(0) + ",ratus,";
		} else if (digit == 500) {
			out1 = strdigit.charAt(0) + ",ratus,";
		} else if (digit == 600) {
			out1 = strdigit.charAt(0) + ",ratus,";
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
		} else if (digit > 11 && digit < 20) {
			return strdigit.charAt(1) + ",belas";
		} else {
			if (strdigit.charAt(1) == "0") {
				return strdigit.charAt(0) + ",puluh,";
			} else {
				return strdigit.charAt(0) + ",puluh," + strdigit.charAt(1);
			}
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

	function playSuaraAntrian(no, inisial, tipe) {

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

			urutan.push('SILAHKAN MENUJU KE POLI');
			urutan.push(tipe);

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


	
	function hapusAtasAntrian() {
		$.ajax({
			url: "<?= base_url() ?>Layar_Poli/deleteSuara",
			method: "POST",
			dataType: "JSON",
			data: "",
			success: function(data) {}
		});
	}
=======
<?php


?>

<div class="row ">
	<div class="col-md-12 mt-30 mb-20 ">
		<style>
			#list_tanggungan {
				min-height: 650px;
				max-height: 650px;
				/* Atur tinggi maksimum */
				overflow: hidden;
			}

			.scrolling {
				animation: scrollUpMenunggu 20s linear infinite forwards;
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
		<div class="col-md-4 text-center">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h2 class="txt-dark text-center pl-10 pt-10" style="font-weight:bold; font-size:30px; font-family: 'Times New Roman', Times, serif">LIST</h2>
				</div>
				<div id="list_tanggungan">
					<div id="scrolling-content0">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-default card-view" style="height: 730px;">
				<div class="panel-wrapper collapse in">
					<div class="panel-body" style="background-color:#f7f7f9; height: 700px;">
						<div class="row">
							<div class="col-md-50 text-center mb-15">
								<h3 style="font-weight:bold; font-size:35px; margin-top:15px;"> NOMOR ANTRIAN</h3>
								<h3 id="namapoli" style="font-weight:bold; font-size:35px; margin-top:1px;"></h3>

								<h1 class="txt-danger" id="nomor" style="font-size:170px; font-weight:bold; margin-top:50px;"></h1>
								<h3 style="font-weight:normal; font-size:40px; margin-top:50px;"> NAMA PASIEN </h3>
								<h3 class="txt-primary" id="nama" style="font-weight:bold; font-size:40px; margin-top:-0.2em; "></h3>
								<h3 style="font-weight:bold; font-size:35px; margin-top:40px; font-family: 'Times New Roman', Times, serif"> SILAHKAN MENUJU KE POLI</h3>
								<h2 class="txt-danger" id="namadokter" style="font-size:60px; font-weight:bold; margin-top:10px; font-family: 'Times New Roman', Times, serif"> </h2>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


<!-- IKLAN -->

<div class="col-md-12 mt-20">
	<div class="panel panel-default card-view">
		<div class="panel-wrapper collapse in" style="margin-left:-1em; margin-right:-1em; margin-top:-1em; margin-bottom:-1em">
			<div class="panel-body">
				<!-- START carousel-->
				<div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-captions-1" data-slide-to="0" class="active">
						</li>
						<li data-target="#carousel-example-captions-1" data-slide-to="1"></li>
					</ol>
					<div role="listbox" class="carousel-inner">
						<div class="item active"> <img width="100%" src="<?= base_url(); ?>assets/dist/img/footer.jpg">
						</div>
						<div class="item"> <img width="100%" src="<?= base_url(); ?>assets/dist/img/footer2.jpg">
						</div>
					</div>
				</div>
				<!-- END carousel-->
			</div>
		</div>
	</div>
</div>

<!-- END IKLAN -->

<script type="text/javascript">
	$(document).ready(function() {
		setInterval(function() {
			$.ajax({
				url: "<?= base_url() ?>Layar_Poli/Get_antrian_Suara",
				type: "POST",
				dataType: "JSON",
				data: {
					poli: '<?= $poli ?>'
				},
				success: function(data) {
					if (data.status == 'ok') {
						var no_antri = data.data.kode + data.data.no;
						var nomorHurufBesar = no_antri.toUpperCase();
						$("#nomor").html(nomorHurufBesar);
						$("#nama").html(data.data.nama);
						var poli = data.data.poli;
						var polibesar = poli.toUpperCase();

						$("#namapoli").html('POLI ' + polibesar);
						playSuaraAntrian(data.data.no, data.data.kode, data.data.poli);
					} else {
						$("#nomor").html('');
						$("#nama").html('');
					}
				}
			});
		}, 5000);
		// $("#no").html('');
		setInterval(checkData, 5000);

	})
</script>
<script>
	const panelContainer = document.querySelector('#scrolling-content0');
	// Fungsi untuk mengkloning panel pertama dan menambahkannya ke akhir
	function cloneFirstPanel() {
		const firstPanel = panelContainer.firstElementChild.cloneNode(true);
		panelContainer.appendChild(firstPanel);
	}

	// Fungsi untuk mengkloning panel terakhir dan menambahkannya ke awal
	function cloneLastPanel() {
		const lastPanel = panelContainer.lastElementChild.cloneNode(true);
		panelContainer.insertBefore(lastPanel, panelContainer.firstChild);
	}

	// Menunggu
	function checkData() {
		$.ajax({
			url: "<?= base_url() ?>Layar_Poli/getPoli",
			type: "POST",
			dataType: "JSON",
			data: {
				poli: '<?= $poli ?>'
			},
			success: function(data) {
				console.log(data.data.length);
				if (data.data.length > 3) {
					$('#scrolling-content0').addClass("scrolling");
				} else {
					$('#scrolling-content0').removeClass("scrolling");
				}
				var event_data = '';
				$.each(data.data, function(index, value) {
					event_data += '<div class="panel panel-default card-view pa-15 mb-0 pl-15 pt-15 pr-15">';
					event_data += '<div class="panel-wrapper collapse in">';
					event_data += '<div class="panel-body bg-success pa-0">';
					event_data += '<div class="sm-data-box pt-30 pb-50 ">';

					event_data += '<div class="col-md-12 txt-dark text-center" style="font-size: 20px;  color: black !important; font-family: \'Times New Roman\', Times, serif">';
					event_data += '<span>POLI ' + value.nama + '</span>';
					event_data += '</div>';

					event_data += '<div class="col-md-12 txt-dark text-center" style="font-size: 35px; font-weight:bold; color: black !important; font-family: \'Times New Roman\', Times, serif">';
					event_data += '<span>' + value.inisial.toUpperCase() + '</span>';
					event_data += '<span>' + value.nomor + '</span>';
					event_data += '</div>';

					event_data += '</div>';
					event_data += '</div>';
					event_data += '</div>';
					event_data += '</div>';
				});

				$("#scrolling-content0").empty().html(event_data);
				// cloneFirstPanel();
				// cloneLastPanel();
			},
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
		if (digit == 1000) {
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
		} else if (digit == 200) {
			out1 = strdigit.charAt(0) + ",ratus,";
		} else if (digit == 300) {
			out1 = strdigit.charAt(0) + ",ratus,";
		} else if (digit == 400) {
			out1 = strdigit.charAt(0) + ",ratus,";
		} else if (digit == 500) {
			out1 = strdigit.charAt(0) + ",ratus,";
		} else if (digit == 600) {
			out1 = strdigit.charAt(0) + ",ratus,";
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
		} else if (digit > 11 && digit < 20) {
			return strdigit.charAt(1) + ",belas";
		} else {
			if (strdigit.charAt(1) == "0") {
				return strdigit.charAt(0) + ",puluh,";
			} else {
				return strdigit.charAt(0) + ",puluh," + strdigit.charAt(1);
			}
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

	function playSuaraAntrian(no, inisial, tipe) {

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

			urutan.push('SILAHKAN MENUJU KE POLI');
			urutan.push(tipe);

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


	
	function hapusAtasAntrian() {
		$.ajax({
			url: "<?= base_url() ?>Layar_Poli/deleteSuara",
			method: "POST",
			dataType: "JSON",
			data: "",
			success: function(data) {}
		});
	}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>