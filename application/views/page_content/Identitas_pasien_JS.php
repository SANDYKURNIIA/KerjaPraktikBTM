<style>
	td {
		color: black;
	}
</style>
<style>
	.kbw-signature {
		width: 400px;
		height: 200px;
	}

	#sig canvas {
		width: 100% !important;
		height: 100%;
	}
</style>
<!-- JQuiery UI -->
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/dist/css/jquery.signature.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.signature.min.js"></script>
<!-- [if lte IE 8]> -->
<!-- <script type="text/javascript" src="<?= base_url(); ?>assets/js/excanvas.js"></script> -->
<script type="text/javascript">
	var sig = $('#sig').signature({
		syncField: '#signature',
		syncFormat: 'PNG'
	});
	$('#clear').click(function(e) {
		e.preventDefault();
		sig.signature('clear');
		$("#signature").val('');
	});
	$(document).ready(function() {
		$("#kondisi_umum6").click(function() {
			if ($(this).is(":checked")) {
				$("#ghubungan").show();
			} else {
				$("#ghubungan").hide();
			}
		});

	});
</script>
<script>
	document.getElementById("back").onclick = function() {
		window.location.href = "<?php echo base_url('Pencarian_pasien') ?>";
	};

	function Kunjungan() {
		b = $('#inTipeMasuk').val();
		splitDiagB = b.split("|");
		jenis_pelayanan = splitDiagB[0];
		cara_bayar = $('#inCaraBayar').val();
		if (jenis_pelayanan == 3) {
			$('#inJnsPelayanan').val(1);
		} else {
			$('#inJnsPelayanan').val(2);
		}
		if (cara_bayar == 'WA14BJ84') {

			$('#vclaim_sep').collapse('show');
		} else {
			insertData();
		}
	}

	function insertData() {
		no_rm = $('#no_rm').val();
		b = $('#inTipeMasuk').val();
		splitDiagB = b.split("|");
		jenis_pelayanan = splitDiagB[0];
		tgl_masuk = $('#inTanggalKunjugan').val();
		asal_pasien = $('#inAsalPasien').val();
		cara_bayar = $('#inCaraBayar').val();
		no_sep = $('#inNoSEP').val();
		diagnosa = $('#inDiagnosa').val();
		keterangan = $('#inKeterangan').val();

		a = $("#inDPJP").val();
		splitDiag = a.split("|");
		dpjp = splitDiag[0];
		nama_poli = $('#inJenisPoli').val();
		kelas = $('#inKelasRuangan').val();
		tempat_tidur = $('#inTempatTidur').val();
		biaya_jasa = $('#inBiayaDok').val();
		biaya_rs = $('#inBiayaRS').val();
		biaya_admin = $('#inBiayaAdm').val();
		antrian = $('#inAntrian').val();
		total = Number(biaya_jasa) + Number(biaya_rs) + Number(biaya_admin);
		if (dpjp == '-' || dpjp == null || dpjp == '') {
			swal({
				title: "Gagal!",
				text: "DPJP dipilih terlebih dahulu",
				type: "warning",
				confirmButtonColor: "#3cb878",
			});
		}
		$.ajax({
			url: "<?php echo base_url() ?>Pencarian_pasien/tambah_kunjungan",
			method: "POST",
			dataType: 'json',
			data: {
				id_pasien: no_rm,
				jenis_pelayanan: jenis_pelayanan,
				tgl_masuk: tgl_masuk,
				asal_pasien: asal_pasien,
				cara_bayar: cara_bayar,
				no_sep: no_sep,
				diagnosa: diagnosa,
				keterangan: keterangan,
				dpjp: dpjp,
				nama_poli: nama_poli,
				kelas: kelas,
				tempat_tidur: tempat_tidur,
				biaya_jasa: biaya_jasa,
				biaya_rs: biaya_rs,
				biaya_admin: biaya_admin,
				antrian: antrian,
			},
			success: function(data) {
				if (data.status == "success") {
					if (jenis_pelayanan == '2') {
						swal({
							title: "SELAMAT!",
							type: "success",
							text: "Silahkan Menuju Rekam Medis",
							confirmButtonColor: "#3cb878",
							confirmButtonText: "OK",
						}, function() {
							$().ready(function() {
								window.location.href = '<?php echo base_url() ?>Pencarian_pasien/cetak_antrian/' + antrian + '/' + nama_poli + '/' + total;
							});
						});
					} else {
						swal({
							title: "good job!",
							type: "success",
							text: "Silahkan Menuju Rekam Medis",
							confirmButtonColor: "#3cb878",
						});
					}
					$("#modal_tambah_kunjungan").modal('hide');
					$("#identitas_pasien").load(location.href + " #identitas_pasien");
					$('#inNoSEP').val("");
					$('#inDiagnosa').val("");
					$('#inKeterangan').val("");
					$('#inDPJP').val('-').change();
					$('#inAsalPasien').val('-').change();
					$('#inCaraBayar').val('-').change();
					$('#inJenisPoli').val('-').change();
					$('#inKelasRuangan').val('-').change();
					$('#inTempatTidur').val('-').change();
					$('#inBiayaDok').val("");
					$('#inBiayaRS').val("");
					$('#inBiayaAdm').val("");
					$('#inAntrian').val("");
					$('#inTipeMasuk').val('-').change();
					$('#inTotal').val("");



				} else if (data.status == "error") {
					swal({
						title: "Gagal!",
						text: "Nomor Antrian Telah dipakai, silahkan tekan tombol refresh",
						type: "warning",
						confirmButtonColor: "#3cb878",
					});
				} else if (data.status == 'failed') {
					if (data.error.dpjp != '') {
						$('#dpjp_error').html(data.error.dpjp);
					} else {
						$('#dpjp_error').html('');
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

	function insertPoliSore() {
		no_rm = $('#no_rm').val();
		b = $('#inTipeMasuk2').val();
		splitDiagB = b.split("|");
		jenis_pelayanan = splitDiagB[0];
		tgl_masuk = $('#inTanggalKunjugan2').val();
		asal_pasien = $('#inAsalPasien2').val();
		cara_bayar = $('#inCaraBayar2').val();
		no_sep = $('#inNoSEP2').val();
		diagnosa = $('#inDiagnosa2').val();
		keterangan = $('#inKeterangan2').val();
		a = $("#inDPJP2").val();
		splitDiag = a.split("|");
		dpjp = splitDiag[0];
		nama_poli = $('#inJenisPoli2').val();
		kelas = $('#inKelasRuangan2').val();
		tempat_tidur = $('#inTempatTidur2').val();
		biaya_jasa = $('#inBiayaDok2').val();
		biaya_rs = $('#inBiayaRS2').val();
		biaya_admin = $('#inBiayaAdm2').val();
		antrian = $('#inAntrian2').val();
		total = Number(biaya_jasa) + Number(biaya_rs) + Number(biaya_admin);
		$.ajax({
			url: "<?php echo base_url() ?>Pencarian_pasien/tambah_kunjungan_sore",
			method: "POST",
			dataType: 'json',
			data: {
				id_pasien: no_rm,
				jenis_pelayanan: jenis_pelayanan,
				tgl_masuk: tgl_masuk,
				asal_pasien: asal_pasien,
				cara_bayar: cara_bayar,
				no_sep: no_sep,
				diagnosa: diagnosa,
				keterangan: keterangan,
				dpjp: dpjp,
				nama_poli: nama_poli,
				kelas: kelas,
				tempat_tidur: tempat_tidur,
				biaya_jasa: biaya_jasa,
				biaya_rs: biaya_rs,
				biaya_admin: biaya_admin,
				antrian: antrian,
			},
			success: function(data) {
				if (data.status == "success") {
					if (jenis_pelayanan == '2') {
						swal({
							title: "SELAMAT!",
							type: "success",
							text: "Silahkan Menuju Rekam Medis",
							confirmButtonColor: "#3cb878",
							confirmButtonText: "OK",
						}, function() {
							$().ready(function() {
								window.location.href = '<?php echo base_url() ?>Pencarian_pasien/cetak_antrian/' + antrian + '/' + nama_poli + '/' + total;
							});
						});
					} else {
						swal({
							title: "good job!",
							type: "success",
							text: "Silahkan Menuju Rekam Medis",
							confirmButtonColor: "#3cb878",
						});
					}

					$('#inNoSEP2').val("");
					$('#inDiagnosa2').val("");
					$('#inKeterangan2').val("");
					$('#inDPJP2').val("");
					$('#inTanggalKunjugan2').val("");
					$('#inAsalPasien2').val("");
					$('#inCaraBayar2').val("");
					$('#inJenisPoli2').val("");
					$('#inKelasRuangan2').val("");
					$('#inTempatTidur2').val("");
					$('#inBiayaDok2').val("");
					$('#inBiayaRS2').val("");
					$('#inBiayaAdm2').val("");
					$('#inAntrian2').val("");
					$('#inTipeMasuk2').val("");
					$('#inTotal2').val("");

					$("#modal_poli_sore").modal('hide');
					$("#identitas_pasien").load(location.href + " #identitas_pasien");

				} else if (data.status == "error") {
					swal({
						title: "Gagal!",
						text: "Nomor Antrian Telah dipakai, silahkan tekan tombol refresh",
						type: "warning",
						confirmButtonColor: "#3cb878",
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
		return false;
	}

	function riwayat() {
		$().ready(function() {
			reload_riwayat();
			$("#modal_riwayat").modal('show');
		});
	}

	function reload_riwayat() {
		// var table;
		$('#tb_riwayat').dataTable().fnClearTable();
		$('#tb_riwayat').dataTable().fnDestroy();
		var table = $('#tb_riwayat').DataTable({
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
			"ajax": {
				"url": '<?php echo base_url('Pencarian_pasien/tampil_riwayat_kunjungan'); ?>',
				"type": 'POST',
				"data": function(data) {
					data.no_rm = $('#no_riwayat').val();
					data.jenis_pelayanan = $('#jenis_pel').val();

				}
			},
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],

		});
		$('#btn-filter').click(function() { //button filter event click
			table.ajax.reload(); //just reload table
		});
		$('#btn-reset').click(function() { //button reset event click
			$('#form-filter')[0].reset();
			table.ajax.reload(); //just reload table
		});
	}

	function update_pasien() {
		nama = $('#upNama').val();
		no_ktp = $('#upNoKtp').val();
		jk = $('input#upJkLk:checked').val() ? 'LAKI-LAKI' : 'PEREMPUAN';
		// jk = $('#inJkLk').val();
		nama_ibu = $('#upNamaIbu').val();
		nama_ayah = $('#upNamaAyah').val();
		tgl_lahir = $('#upTglLahir').val();
		namaKK = $('#upNamaKK').val();
		agama = $('#upAgama').val();
		pendidikan = $('#upPendidikan').val();
		status = $('#upStatus').val();
		pekerjaan = $('#upPekerjaan').val();
		no_hp = $('#upNoHp').val();
		telp = $('#upTelp').val();
		umur = $('#upUmur').val();
		prov = $('#upProv').val();
		kota = $('#upKota').val();
		kec = $('#upKec').val();
		kel = $('#upKel').val();
		alamat = $('#upAlamat').val();
		no_bpjs = $('#upNoBpjs').val();
		no_id_lain = $('#upNoIdLain').val();
		no_rm = $('#upNoRm').val();


		$.ajax({
			url: "<?= base_url() . 'Pencarian_pasien/edit_pasien' ?>",
			data: {
				nama: nama,
				no_ktp: no_ktp,
				jk: jk,
				nama_ibu: nama_ibu,
				nama_ayah: nama_ayah,
				tgl_lahir: tgl_lahir,
				namaKK: namaKK,
				agama: agama,
				pendidikan: pendidikan,
				status: status,
				pekerjaan: pekerjaan,
				no_hp: no_hp,
				telp: telp,
				umur: umur,
				prov: prov,
				kota: kota,
				kec: kec,
				kel: kel,
				alamat: alamat,
				no_bpjs: no_bpjs,
				no_id_lain: no_id_lain,
				no_rm: no_rm,
			},
			method: 'POST',
			dataType: 'json',
			success: function(data) {

				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Data Berhasil diubah",
						confirmButtonColor: "#3cb878",
					});

					$("#edit_pasien").modal('hide');
					$("#identitas_pasien").load(location.href + " #identitas_pasien");

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

	}

	function tampilUmur(elem) {
		a = new Date(elem.value);
		var diff_ms = Date.now() - a.getTime();
		var age_dt = new Date(diff_ms);
		document.getElementById("inUmur").value = Math.abs(age_dt.getUTCFullYear() - 1970) + " Tahun";
	}

	function cekAntrian(poli) {
		$.ajax({
			url: "<?php echo base_url(); ?>Pencarian_pasien/getAntrian",
			method: "POST",
			data: {
				poli: poli
			},
			dataType: 'json',
			success: function(data) {
				$("#inAntrian").val(data);
			}
		});
	}

	function cekAntrian2(poli) {
		$.ajax({
			url: "<?php echo base_url(); ?>Pencarian_pasien/getAntrian",
			method: "POST",
			data: {
				poli: poli
			},
			dataType: 'json',
			success: function(data) {
				$("#inAntrian2").val(data);
			}
		});
	}

	function cekAntrian1(poli) {
		$.ajax({
			url: "<?php echo base_url(); ?>Pencarian_pasien/getAntrian",
			method: "POST",
			data: {
				poli: poli
			},
			dataType: 'json',
			success: function(data) {
				$("#inAntrian1").val(data);
			}
		});
	}

	function refresh() {
		poli = $('#inJenisPoli').val();

		$.ajax({
			url: "<?php echo base_url(); ?>Pencarian_pasien/getAntrian",
			method: "POST",
			data: {
				poli: poli
			},
			dataType: 'json',
			success: function(data) {
				$("#inAntrian").val(data);
			}
		});
	}

	$(document).ready(function() {
		$('#upProv').change(function() {
			var prov = $('#upProv').val();
			if (prov != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getKota",
					method: "POST",
					data: {
						prov: prov
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option value="">Pilih Kota</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nm_kab + '>' + data[i].nm_kab + '</option>';
						}
						$('#upKota').html(html);
						$('#upKec').html('<option value="">Pilih Kecamatan</option>');
						$('#upKel').html('<option value="">Pilih Kelurahan</option>');

					}
				});
			} else {
				$('#upKota').html('<option value="">Pilih Kota</option>');
				$('#upKec').html('<option value="">Pilih Kecamatan</option>');
				$('#upKel').html('<option value="">Pilih Kelurahan</option>');
			}
		});

		$('#upKota').change(function() {
			var kota = $('#upKota').val();
			if (kota != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getKec",
					method: "POST",
					data: {
						kota: kota
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option value="">Pilih Kecamatan</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nm_kec + '>' + data[i].nm_kec + '</option>';
						}
						$('#upKec').html(html);
						$('#upKel').html('<option value="">Pilih Kelurahan</option>');
					}
				});
			} else {
				$('#upKec').html('<option value="">Pilih Kecamatan</option>');
				$('#upKel').html('<option value="">Pilih Kelurahan</option>');
			}
		});
		$('#upKec').change(function() {
			var kec = $('#upKec').val();
			if (kec != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getKel",
					method: "POST",
					data: {
						kec: kec
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option value="">Pilih Kelurahan</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].nm_desa + '>' + data[i].nm_desa + '</option>';
						}
						$('#upKel').html(html);
					}
				});
			} else {
				$('#upKel').html('<option value="">Pilih Kelurahan</option>');
			}
		});

		$('#inTipeMasuk').change(function() {
			b = $('#inTipeMasuk').val();
			splitDiagB = b.split("|");
			var tipe_masuk = splitDiagB[0];
			var cara_bayar = $('#inCaraBayar').val();
			var poli = $('#inJenisPoli').val();
			$('#inBiayaAdm').val(splitDiagB[1]);
			if (tipe_masuk == '1') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						tipe_masuk: tipe_masuk
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);


					}
				});
			} else if (tipe_masuk == '2') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getNamaPoli",
					method: "POST",
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_list_poli + '>' + data[i].nama_panjang + '</option>';
						}
						$('#inJenisPoli').html(html);
					}
				});
			} else if (tipe_masuk == '3') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						tipe_masuk: tipe_masuk
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						// html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);
					}
				});
			} else {
				$('#inDPJP').html('<option>-</option>');
				$('#inJenisPoli').html('<option>-</option>');

			}
		});


		//Poli tujuan
		$('#inJenisPoli').change(function() {
			var poli = $('#inJenisPoli').val();
			if (poli == '111111') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else if (poli == '146582') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else if (poli == '15487956') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else if (poli == '24QRNLX29R') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else if (poli == '2JZ09X4K22') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else if (poli == '6E975PL694') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else if (poli == 'AX1520L18') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else if (poli == 'E00RX703') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else if (poli == 'HLGI4176K8') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else if (poli == 'I9NXY5VNQG') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else if (poli == 'MWK205D30K') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else if (poli == 'O782EGU4PR') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else if (poli == 'ODI8643C27') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else if (poli == 'RZE28J1098') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);

					}
				});
			} else if (poli == 'UQ81K76373') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_pagi + '|' + data[i].jasmed_asuransi_pagi + '|' + data[i].jasmed_bpjs_pagi + '|' + data[i].rs_pp_pagi + '|' + data[i].rs_asuransi_pagi + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP').html(html);
					}
				});
			} else {
				$('#inDPJP').html('<option>-</option>');
			}
		});

		$('#inCaraBayar').change(function() {
			var cara_bayar = $('#inCaraBayar').val();
			var a = $("#inDPJP").val();
			splitDiag = a.split("|");

			if (cara_bayar == 'WA14BJ84') { //bpjs
				$("#inBiayaRS").val(0);
				$('#inBiayaDok').val(splitDiag[3]);
				var a = $("#inBiayaRS").val();
				var b = parseInt(splitDiag[3]);
				var c = $('#inBiayaAdm').val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal").val(total);
			} else if (cara_bayar == '65AP55') { //pp
				$("#inBiayaRS").val(splitDiag[4]);
				$('#inBiayaDok').val(splitDiag[1]);
				var a = parseInt(splitDiag[4]);
				var b = parseInt(splitDiag[1]);
				var c = $('#inBiayaAdm').val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal").val(total);
			} else { //asuransi
				$("#inBiayaRS").val(splitDiag[5]);
				$('#inBiayaDok').val(splitDiag[2]);
				var a = parseInt(splitDiag[5]);
				var b = parseInt(splitDiag[2]);
				var c = $('#inBiayaAdm').val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal").val(total);
			}

		});
		$('#inKelasRuangan').change(function() {
			var kelas = $('#inKelasRuangan').val();
			if (kelas != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getKamar",
					method: "POST",
					data: {
						kelas: kelas
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option value="">Pilih Kamar</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_ruangan + '>' + data[i].tipe + '</option>';
						}
						$('#inTempatTidur').html(html);
					}
				});
			} else {
				$('#inTempatTidur').html('<option value="">Pilih Kamar</option>');
			}
		});

		$('.data_hide').addClass('collapse');

		$('#inTipeMasuk').change(function() {
			b = $('#inTipeMasuk').val();
			splitDiagB = b.split("|");

			var selector = '.data_hide_' + splitDiagB[0];

			$('.data_hide').collapse('hide');

			$(selector).collapse('show');
		});

		$('#inDPJP').change(function() {


			$('#cb_hide').collapse('show');
		});

		//pilih tindakan poli sore
		$('#inTipeMasuk2').change(function() {
			b = $('#inTipeMasuk2').val();
			splitDiagB = b.split("|");

			var tipe_masuk = splitDiagB[0];
			var poli = $('#inJenisPoli2').val();
			$('#inBiayaAdm2').val(splitDiagB[1]);
			if (tipe_masuk == '1') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						tipe_masuk: tipe_masuk
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);
					}
				});
			} else if (tipe_masuk == '2') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getNamaPoli",
					method: "POST",
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_list_poli + '>' + data[i].nama_panjang + '</option>';
						}
						$('#inJenisPoli2').html(html);
					}
				});
			} else if (tipe_masuk == '3') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						tipe_masuk: tipe_masuk
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else {
				$('#inDPJP2').html('<option>-</option>');
				$('#inJenisPoli2').html('<option>-</option>');

			}
		});
		$('#inJenisPoli2').change(function() {
			var poli = $('#inJenisPoli2').val();
			if (poli == '111111') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else if (poli == '146582') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else if (poli == '15487956') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else if (poli == '24QRNLX29R') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else if (poli == '2JZ09X4K22') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else if (poli == '6E975PL694') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else if (poli == 'AX1520L18') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else if (poli == 'E00RX703') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else if (poli == 'HLGI4176K8') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else if (poli == 'I9NXY5VNQG') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else if (poli == 'MWK205D30K') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else if (poli == 'O782EGU4PR') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else if (poli == 'ODI8643C27') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else if (poli == 'RZE28J1098') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);

					}
				});
			} else if (poli == 'UQ81K76373') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getDokter",
					method: "POST",
					data: {
						poli: poli
					},
					dataType: 'json',
					success: function(data) {
						cekAntrian2(poli);
						var html = '';
						var i;
						html = '<option>-</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_dokter + '|' + data[i].jasmed_pp_sore + '|' + data[i].jasmed_asuransi_sore + '|' + data[i].jasmed_bpjs_sore + '|' + data[i].rs_pp_sore + '|' + data[i].rs_asuransi_sore + '|' + '>' + data[i].nama + '</option>';
						}
						$('#inDPJP2').html(html);
					}

				});

			} else {
				$('#inDPJP2').html('<option>-</option>');
			}


		});

		$('#inCaraBayar2').change(function() {
			var cara_bayar = $('#inCaraBayar2').val();
			var a = $("#inDPJP2").val();
			splitDiag = a.split("|");

			if (cara_bayar == 'WA14BJ84') { //bpjs
				$("#inBiayaRS2").val(0);
				$('#inBiayaDok2').val(splitDiag[3]);
				var a = $("#inBiayaRS2").val();
				var b = parseInt(splitDiag[3]);
				var c = $("#inBiayaAdm2").val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal2").val(total);
			} else if (cara_bayar == '65AP55') { //pp
				$("#inBiayaRS2").val(splitDiag[4]);
				$('#inBiayaDok2').val(splitDiag[1]);
				var a = parseInt(splitDiag[4]);
				var b = parseInt(splitDiag[1]);
				var c = $("#inBiayaAdm2").val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal2").val(total);
			} else { //asuransi
				$("#inBiayaRS2").val(splitDiag[5]);
				$('#inBiayaDok2').val(splitDiag[2]);
				var a = parseInt(splitDiag[5]);
				var b = parseInt(splitDiag[2]);
				var c = $("#inBiayaAdm2").val();
				var total = Number(a) + Number(b) + Number(c);
				$("#inTotal2").val(total);
			}
		});
		$('#inKelasRuangan2').change(function() {
			var kelas = $('#inKelasRuangan2').val();
			if (kelas != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>Pencarian_pasien/getKamar",
					method: "POST",
					data: {
						kelas: kelas
					},
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						html = '<option value="">Pilih Kamar</option>';
						for (i = 0; i < data.length; i++) {
							html += '<option value=' + data[i].id_ruangan + '>' + data[i].tipe + '</option>';
						}
						$('#inTempatTidur2').html(html);
					}
				});
			} else {
				$('#inTempatTidur2').html('<option value="">Pilih Kamar</option>');
			}
		});


		$('.data_poli').addClass('collapse');

		$('#inTipeMasuk2').change(function() {
			b = $('#inTipeMasuk2').val();
			splitDiagB = b.split("|");
			var selector = '.poli_' + splitDiagB[0];

			$('.data_poli').collapse('hide');

			$(selector).collapse('show');
		});
	});
</script>
<script type="text/javascript">
	/*Typeahead Init*/

	$(function() {
		"use strict";

		/*Basic*/

		var substringMatcher = function(strs) {
			return function findMatches(q, cb) {
				var matches, substringRegex;

				// an array that will be populated with substring matches
				matches = [];

				// regex used to determine if a string contains the substring `q`
				var substrRegex = new RegExp(q, 'i');

				// iterate through the pool of strings and for any string that
				// contains the substring `q`, add it to the `matches` array
				$.each(strs, function(i, str) {
					if (substrRegex.test(str)) {
						matches.push(str);
					}
				});

				cb(matches);
			};
		};

		var states = [
			<?php

			foreach ($diagnosa as $row) {


				echo ",'" . $row["id_diagnosa"] . " | " . $row["nama_diagnosa"] . "'";
			}  ?>
		];


		$('#the-basics .typeahead').typeahead({
			hint: true,
			highlight: true,
			minLength: 1
		}, {
			name: 'states',
			source: substringMatcher(states)
		});



	});
</script>
<script type="text/javascript">
  $(document).ready(function() {
    no_rm = $('#no_rm').val();
    $.ajax({
      url: "<?php echo base_url() ?>Erm_general_concern/get_gencon",
      method: "POST",
      dataType: 'json',
      data: {
        id: no_rm
      },
      success: function(data) {
        if (data.status_dt == 'found') {
			$('#gecon').attr('disabled', true);
        }
      }

    });
  });
  function tambah_kunjungan(){
	no_rm = $('#no_rm').val();
    $.ajax({
      url: "<?php echo base_url() ?>Erm_general_concern/get_gencon",
      method: "POST",
      dataType: 'json',
      data: {
        id: no_rm
      },
      success: function(data) {
        if (data.status_dt == 'found') {
			$('#modal_tambah_kunjungan').modal('show')
        }else{
			swal({
				title: "Form General Concent Kosong",
				text: "Form General Concent Diisi Terlebih Dahulu",
				type: "warning",
				confirmButtonColor: "#3cb878",
			});
		}
      }

    });
  }
</script>
