<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<div class="panel panel-default card-view mt-20 ">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR PASIEN <?= ($tipe == 'ranap') ? "RAWAT INAP" : "ONE DAY CARE" ?></span></h6>
		</div>

		<div class="clearfix"></div>
	</div>
	<h6 class="panel-title txt-dark mt-10"><?= $this->session->flashdata('alert'); ?></h6>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display pb-30">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<?php
								if ($data->tipe == 'polihemodialisa') { ?>
									<th>HEMODIALISA</th>
								<?php } else if ($data->tipe == 'kemoterapi') { ?>
									<th>KEMOTERAPI</th>
									<th>OBAT</th>
									<?php if ($tipe == 'odc') { ?>
										<th>CHECKOUT</th>
									<?php } ?>
								<?php } else { ?>
									<th>ERM</th>

									<th>CHECKOUT</th>
									<th>ANTRIAN OPERASI</th>
								<?php } ?>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>RUANG INAP</th>
								<th>JENIS KLAIM</th>
								<!-- <th>BENTUK MAKANAN</th> -->
								<th>DIAGNOSA</th>
								<th>KETERANGAN</th>
								<th>DOKTER DPJP</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<?php
								if ($data->tipe == 'polihemodialisa') { ?>
									<th>HEMODIALISA</th>
								<?php } else if ($data->tipe == 'kemoterapi') { ?>
									<th>KEMOTERAPI</th>
									<th>OBAT</th>
									<?php if ($tipe == 'odc') { ?>
										<th>CHECKOUT</th>
									<?php } ?>
								<?php } else { ?>
									<th>ERM</th>

									<th>CHECKOUT</th>
									<th>ANTRIAN OPERASI</th>
								<?php } ?>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>RUANG INAP</th>
								<th>JENIS KLAIM</th>
								<!-- <th>BENTUK MAKANAN</th> -->
								<th>DIAGNOSA</th>
								<th>KETERANGAN</th>
								<th>DOKTER DPJP</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>

<div class="panel-wrapper collapse in">
	<div class="panel-body">
		<div class="modal fade" id="modal_checkout" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display:none;">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<div class="pull-left">
							<h6 class="panel-title txt-dark">
								CHECKOUT PASIEN - <span id="namaPasien"></span>
							</h6>
						</div>
					</div>
					<div class="modal-body">
						<div style="margin-left:1-em" class="form-body mt-20">
							<form action="" id="formCheckout">
								<input type="hidden" id='idHisto'>
								<div class="row">
									<div class="col-md-12">
										<label for="" class="control-label col-md-12">KETERANGAN</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<select name="ketKeluar" class='form-control select2' id="ketKeluar">
												<option value="DIIZINKAN PULANG">DI IZINKAN PULANG</option>
												<option value="DIRUJUK">DI RUJUK</option>
												<option value="PASIEN LARI">PASIEN LARI</option>
												<option value="PULANG PAKSA">PULANG PAKSA</option>
												<option value="Meninggal < 48 JAM">MENINGGAL KURANG DARI 48 JAM</option>
												<option value="Meninggal > 48 JAM">MENINGGAL LEBIH DARI 48 JAM</option>
											</select>
										</div>
									</div>
								</div>
							</form>
							<div class="row">
								<div class="clearfix">&nbsp;</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="col-md-9 col-sm-12 col-xs-12">
										<button type="submit" class="btn btn-success btn-square" onclick="btnYakin();" id="btnYakin">YAKIN</button>
									</div>
								</div>
								<div class="col-md-6">
									<div class="">
										<button class="btn btn-secondary btn-square" id="btnBatal" data-dismiss="modal">TIDAK</button>
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

<!-- </?php $this->load->view('page_content/Form_ok'); ?> -->
<?php
if ($data->tipe == 'polihemodialisa') {
	$this->load->view('erm_form/Penunjang/hemodialisa');
} else if ($data->tipe == 'kemoterapi') {
	$this->load->view('erm_form/Penunjang/kemoterapi');
} else {
	$this->load->view('page_content/Form_ok');
}
?>
<style>
	td {
		color: black;
	}

	.zoom:active {
		position: relative;
		overflow: hidden;
		transition: all .3s ease-in-out;
		-webkit-transform: scale(6.5);
		transform: scale(6.5);
	}
</style>

<script type="text/javascript">
	function check_out_yang_asli(id_history, nama, keterangan) {
		swal({
			title: "Apakah kamu yakin?",
			text: "Check-out pasien " + nama + "?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Rawatinap/checkout",
					method: "POST",
					dataType: 'json',
					data: {
						id_history: id_history,
						ketKeluar: keterangan
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Pasien Berhasil check out",
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

	$("#btnYakinOLD").on('click', function(e) {
		$.ajax({
			type: "POST",
			url: "<?php echo base_url() ?>Rawatinap/checkout",
			dataType: "json",
			data: {
				id_history: $("#idHisto").val(),
				ketKeluar: $("#ketKeluar").val()
			},
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Pasien Berhasil check out",
						confirmButtonColor: "#3cb878",
					});
					$("#modal_checkout").modal('hide');
					$('#datable').DataTable().ajax.reload();
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: data.status,
						confirmButtonColor: "#3cb878",
					});
					$("#modal_checkout").modal('hide');
				}
			}
		});
	});

	function btnYakin() {
		keterangan = $("#ketKeluar").val();
		idHistory = $("#idHisto").val();
		nama = $("#namaPasien").html();
		$("#modal_checkout").modal('hide');
		check_out_yang_asli(idHistory, nama, keterangan);
	}

	function check_out(id_history, nama) {
		$("#namaPasien").html(nama);
		$("#idHisto").val(id_history);
		$("#modal_checkout").modal('show');
	}
	//Obat
	function convertToRupiah(angka) {
		var rupiah = '';
		var angkarev = angka.toString().split('').reverse().join('');
		for (var i = 0; i < angkarev.length; i++)
			if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
		return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
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
				"sSearch": "Pencarian:",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir"
				},

			},
			"ajax": {
				"url": '<?= base_url('Rawatinap/tampil_data_ranap'); ?>',
				"type": 'POST',
				"data": {
					tipe: '<?= $tipe ?>',
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
	});
</script>

<!-- 
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

		// var states = [
		// 	<?php

				// 	foreach ($signa as $row) {


				// 		echo ",'" .  $row["tindakan"] . "'";
				// 	}  
				?>
		// ];
		// var states1 = [
		// 	<?php

				// 	foreach ($cara_pemakaian_obat as $row) {


				// 		echo ",'" .  $row["cara_pemakaian"] . "'";
				// 	}  
				?>
		// ];


		// $('#the-basics .typeahead').typeahead({
		// 	hint: true,
		// 	highlight: true,
		// 	minLength: 1
		// }, {
		// 	name: 'states',
		// 	source: substringMatcher(states)
		// });

		// $('#the-basics1 .typeahead').typeahead({
		// 	hint: true,
		// 	highlight: true,
		// 	minLength: 1
		// }, {
		// 	name: 'states1',
		// 	source: substringMatcher(states1)
		// });


	});
</script> -->