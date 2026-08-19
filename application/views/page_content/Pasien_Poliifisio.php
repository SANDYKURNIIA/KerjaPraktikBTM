<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN POLI</span></h6>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display  pb-30">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>FISIOTERAPI</th>
								<th>OBAT</th>
								<th>RADIOLOGI</th>
								<th>LABOR</th>
								<th>SEP</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLI KLINIK/RUANG</th>
								<th>CARA BAYAR</th>
								<th>DIAGNOSA</th>
								<th>DPJP</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>OBAT</th>
								<th>RADIOLOGI</th>
								<th>LABOR</th>
								<th>SEP</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLI KLINIK/RUANG</th>
								<th>CARA BAYAR</th>
								<th>DIAGNOSA</th>
								<th>DPJP</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade bs-example-modal-lg" id="modal_fisio" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN REQUEST REHAB
					</h5>
				</div>
				<div class="modal-body">
					<div class="form-wrap">
						<!-- /formbody -->
						<div class="form-body mt-10">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">TINDAKAN</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="PILIH TINDAKAN" style="border: 1px solid lightgreen;" id="outTindakanFisio" onchange="pilihTindakanFisio(this)">
												<option value="-">-</option>
												<?php
												foreach ($tindakan_fisio as $row) :
													$harga = $row['harga_sarana'];
													$jasa = $row['harga_jasa']; ?>
													<option value="<?php echo $row['id_list_tindakan'] . "|" . $harga . "|" . $jasa . "|" .  $row['nama_tindakan']; ?>">
														<?php echo $row['nama_tindakan']; ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
								</div>
								<!--/span-->

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">TOTAL TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="number" class="form-control" id="outJumlahTindakan">
											<input type="hidden" class="form-control" disabled id="id_pelayanan">
											<input type="hidden" class="form-control" disabled id="id_history">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">BIAYA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="outBiayaTindakan" disabled>
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">TOTAL HARGA</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control " disabled id="outTotalfisio">
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA DOKTER</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2" placeholder="PILIH DOKTER" style="border: 1px solid lightgreen;" id="inDPJP">
												<option value="-">-</option>
												<?php
												foreach ($dokter as $row) : ?>
													<option value="<?php echo $row['id_dokter']; ?>">
														<?php echo $row['nama']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<span class="help-block"></span>

							<div class="row">
								<div class="col-md-8">
									<div class="form-group pull-right">
										<button onclick="insert_fisio()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
											<!-- <button onclick="insert_na_radio()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_radio"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="modal-body mt-10">
					<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
					<hr width="95%">
					<div class="table-wrap" style="width: 95%; margin: auto ">
						<div class="table-responsive">
							<table class="table table-hover display  pb-60" id="tablefisio">
								<thead>
									<tr class="bg-success">
										<th>NO</th>
										<!-- <th>AKSI</th> -->
										<!-- <th>EXPERTISE</th> -->
										<th>NAMA</th>
										<th>TANGGAL TINDAKAN</th>
										<th>JUMLAH TINDAKAN</th>
										<th>BIAYA TINDAKAN</th>
										<th>DOKTER</th>
										<th>STAFF</th>
										<!-- <th>STAFF KONFIRMASI</th> -->
										<!-- <th>GAMBAR</th> -->
										<!-- <th>KETERANGAN</th> -->
										<th>HAPUS</th>
									</tr>
								</thead>
								<tbody style="color: black">
								</tbody>
								<tfoot>
									<tr class="bg-success">
										<th>NO</th>
										<!-- <th>AKSI</th> -->
										<!-- <th>EXPERTISE</th> -->
										<th>NAMA</th>
										<th>TANGGAL TINDAKAN</th>
										<th>BIAYA TINDAKAN </th>
										<th>JUMLAH TINDAKAN</th>
										<th>DOKTER</th>
										<th>STAFF</th>
										<!-- <th>STAFF KONFIRMASI</th> -->
										<!-- <th>GAMBAR</th> -->
										<!-- <th>KETERANGAN</th> -->
										<th>HAPUS</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-md-8">
					</div>
					<div class="col-md-4 pull-right mt-20">

						<div class="table-wrap" style="width: 85%; margin-bottom:40px;">
							<!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
							<div class="table-responsive ">
								<table class="table table-hover display " id="outTotalHargaFisio">
									<thead>
										<tr class="bg-success">
											<th style="font-weight:bold;">Total Keseluruhan</th>
										</tr>
									</thead>
									<tbody style="color: black">
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>



				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12">

							<!-- Detail Tindakan -->
							<div class="collapse" id="detailTindakan">
								<div class="form-body mb-30">
									<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL
										TINDAKAN
									</h6>
									<hr width="95%">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group ">
												<label class="control-label col-md-3">NAMA TINDAKAN</label>
												<div class="col-md-9 has-success">
													<input type="text" class="form-control" readonly id="outNama">
												</div>
											</div>
										</div>
										<!--/span-->

										<div class="col-md-6">
											<div class="form-group ">
												<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
												<div class="col-md-9 has-success">
													<input type="text" class="form-control" id="outFrek" readonly>
													<span class="help-block"></span>
												</div>
											</div>
										</div>
									</div>
									<span class="help-block"></span>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group ">
												<label class="control-label col-md-3">BIAYA TINDAKAN</label>
												<div class="col-md-9 has-success">
													<input type="text" class="form-control" readonly id="outHarga">
													<span class="help-block"></span>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group ">
												<label class="control-label col-md-3">DOKTER PEMBACA</label>
												<div class="col-md-9 has-success">
													<input type="text" class="form-control" readonly id="outDokter">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
									</div>

									<span class="help-block"></span>

									<div class="row mt-10">
										<div class="col-md-12">
											<div class="form-group">
												<div class="row" style="margin-bottom:15px; margin-top:10px;">
													<div class="col-md-12">
														<label class="control-label col-md-3">KETERANGAN</label>
													</div>
												</div>
												<div class="col-md-12 has-success">
													<textarea class="form-control" id="outKeterangan" rows="13" style="max-width:100%; " readonly></textarea>
													<span class="help-block"></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>





</div>
<!-- End -->

<?php $this->load->view('erm_form/Penunjang/view_penunjang'); ?>



<style>
	td {
		color: black;
	}
</style>

<script type="text/javascript">
	function reload_data_tindakan(id_pelayanan) {
		$('#tablefisio').dataTable().fnClearTable();
		$('#tablefisio').dataTable().fnDestroy();
		$('#tablefisio').DataTable({
			"pageLength": 10,
			"language": {
				"sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
				"sProcessing": "Sedang memproses...",
				"sLengthMenu": "Tampilkan _MENU_ entri",
				"sZeroRecords": "Tidak ditemukan data yang sesuai",
				"sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
				"sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
				"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
				"sInfoPostFix": "",
				"sSearch": "Pencarian :",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir",
				}
			},
			"ajax": {
				"url": '<?php echo base_url('Poli/tampil_list_tindakan'); ?>',
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
			}, ],
		});
	}

	//reload data fisio
	function reload_data_fisio(id_pel_lab) {
		$('#tablefisio').dataTable().fnClearTable();
		$('#tablefisio').dataTable().fnDestroy();
		$('#tablefisio').DataTable({
			"pageLength": 10,
			"language": {
				"sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
				"sProcessing": "Sedang memproses...",
				"sLengthMenu": "Tampilkan _MENU_ entri",
				"sZeroRecords": "Tidak ditemukan data yang sesuai",
				"sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
				"sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
				"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
				"sInfoPostFix": "",
				"sSearch": "Pencarian :",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir",
				}
			},
			"ajax": {
				"url": '<?php echo base_url('Poli/tampil_list_fisio'); ?>',
				"type": 'POST',
				"data": {
					id_pelayanan: id_pel_lab
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
	}



	//fisio
	function tindakan_fisio(id_pelayanan, id_history, jenis_pelayanan) {
		$.ajax({
			url: "<?= base_url() . 'IGD/getdata_igd' ?>",
			data: {
				pelayanan: id_pelayanan,
				history: id_history
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				$("#modal_fisio").modal('show');
				reload_total_fisio(id_pelayanan)
				reload_data_tindakan(id_pelayanan);
				$('#id_pelayanan').val(id_pelayanan);
				$('#id_history').val(id_history);
				// if (data.status_dt == "found") {
				//     // if (data.countTin == 0) {
				//     // 	$("#na_radio").show();
				//     // } else {
				//     // 	$("#na_radio").hide();
				//     // }
				//     $("#id_pelayanan").val(data.data['id_pelayanan']);
				//     $("#id_his_rad").val(id_history);
				//     reload_data_fisio(id_pelayanan);
				//     $("#modal_fisio").modal('show');

				// } else {
				//     alert("data tidak ditemukan");
				// }
			}
		});
	}


	function hapus_data_tindakan(id_tindakan_igd, id_pelayanan) { //utk hapus diagnosa pasien
		swal({
			title: "Warning?",
			text: "Apakah kamu yakin menghapus data ID Tindakan :" + id_tindakan_igd + "?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Poli/hapus_data_tindakan",
					method: "POST",
					dataType: 'json',
					data: {
						id_tindakan: id_tindakan_igd,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Id diagnosa" + id_tindakan_igd + " Berhasil dihapus",
								confirmButtonColor: "#3cb878",
							});
							reload_data_tindakan(id_pelayanan);
							reload_total_fisio(id_pelayanan)
							$('#tablefisio').DataTable().ajax.reload();
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

	function reload_total_fisio(id_pelayanan) {
		$('#outTotalHargaFisio').dataTable().fnClearTable();
		$('#outTotalHargaFisio').dataTable().fnDestroy();
		$('#outTotalHargaFisio').DataTable({
			"pageLength": 10,
			"searching": false,
			"lengthChange": false,
			"bInfo": false,
			"paging": false,
			"language": {
				"sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
				"sProcessing": "Sedang memproses...",
				"sLengthMenu": "Tampilkan _MENU_ entri",
				"sZeroRecords": "Tidak ditemukan data yang sesuai",
				"sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
				"sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
				"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
				"sInfoPostFix": "",
				"sSearch": "Pencarian :",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir",
				}
			},
			"ajax": {
				"url": '<?php echo base_url('Poli/tampil_total_fisio'); ?>',
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
			}, ],
		});
	}
</script>

<script type="text/javascript">
	function insert_fisio() {
        a = $("#outTindakanFisio").val();
        dokter = $("#inDPJP").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        jasa = parseFloat(splitDiag[2]);
        id_pelayanan = $('#id_pelayanan').val();
        id_history = $('#id_history').val();
        frek = parseFloat($("#outJumlahTindakan").val());
        total = (jasa + harga)  * frek;
        id_list_tindakan = $('#id_list_tindakan').val();
        nama = $('#nama').val();
        var ID = Math.random().toString(36).substr(2, 16);
        nama_dokter = $.trim($("#inDPJP").children("option:selected").text()) 

        dataString = 'id=' + ID +
            '&id_pelayanan=' + id_pelayanan + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&dokter=' + dokter + '&total=' + total +
			'&id_history=' + id_history + '&jenis_pelayanan=' + 'POLI' + 
			'&nama_tindakan=' + splitDiag[3] + '&nama_dokter=' + nama_dokter;
        $.ajax({
            url: "<?php echo base_url("Poli/insert_fisio"); ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#outTindakanFisio').val('');
                    $('#outJumlahTindakan').val('');
                    $('#outTotalfisio').val('');
					reload_total_fisio(id_pelayanan)
                    $('#tablefisio').DataTable().ajax.reload();
                    // $('#outTotalfisio').DataTable().ajax.reload();
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
    }

	function insert_tindakan() {
		a = $("#inTindakan").val();
		nama_dokter = $("#inDPJP").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlah").val());
		total = harga * frek;
		var ID = Math.random().toString(36).substr(2, 16);
		idPelayanan = $('#idPelayanan').val();
		id_list_tindakan = $('#id_tindakan_igd').val();
		id_history = $("#idHis").val();

		dataString = 'id_tindakan_igd=' + ID + '&harga=' + harga +
			'&idPelayanan=' + idPelayanan + '&id_list_tindakan=' + splitDiag[0] +
			'&frek=' + frek + '&total=' + total
			//copy ini 3
			+
			'&dokter=' + nama_dokter + '&id_history=' + id_history;
		$.ajax({
			url: "<?= base_url() . 'IGD/insert_tindakan' ?>",
			method: "POST",
			dataType: 'json',
			data: dataString,
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Data Tindakan berhasil ditambahkan!",
						confirmButtonColor: "#3cb878",
					});
					reload_data_tindakan(idPelayanan);
					reload_data_fisio(idPelayanan);
					reload_total_fisio(idPelayanan)
					reload_data_tindakan(idPelayanan);
					$('#outTotalHarga').DataTable().ajax.reload();
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
				"sSearch": "Cari:",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir"
				},

			},
			"ajax": '<?php echo base_url('Pasien/tampil_data_polifisio'); ?>',
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

<script type="text/javascript">
	function pilihTindakanFisio() {
			a = $("#outTindakanFisio").val();
			splitDiag = a.split("|");

			harga = parseFloat(splitDiag[1]);
			jasa = parseFloat(splitDiag[2]);
			harga1 = harga + jasa
			total = (harga + jasa)
			document.getElementById("outJumlahTindakan").value = "1";
			document.getElementById("outBiayaTindakan").value = convertToRupiah(harga1);
			document.getElementById("outTotalfisio").value = convertToRupiah(total);
		}


	function pilihTindakan() {
		a = $("#inTindakan").val();
		splitDiag = a.split("|");

		harga = parseFloat(splitDiag[1]);
		jasa = parseFloat(splitDiag[2]);
		$("#outBiayaTindakan").val(convertToRupiah(harga));
		document.getElementById("inJumlah").value = "1";
		document.getElementById("outTotal").value = convertToRupiah(harga);
	}

	function hargaTotalFisio() {
		a = $("#outTindakanFisio").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseInt($("input[id='outJumlahTindakan'][type='number']").val());
		total = harga * frek;
		$("#outTotalfisio").val(convertToRupiah(total));
	}

	$('#outJumlahTindakan').on('input',function(){
		a = $("#outTindakanFisio").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseInt($(this).val());
		total = harga * frek;
		$("#outTotalfisio").val(convertToRupiah(total));
	});

	function convertToRupiah(angka) {
		var rupiah = '';
		var angkarev = angka.toString().split('').reverse().join('');
		for (var i = 0; i < angkarev.length; i++)
			if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
		return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
	}

	function hargaTotalFisio() {
		a = $("#outTindakanFisio").val();
		splitDiag = a.split("|");
		harga = parseFloat(splitDiag[1]);
		frek = parseFloat($("#inJumlah").val());
		total = harga * frek;
		$("#outTotalfisio").val(convertToRupiah(total));
	}
	// Radiologi


	function edit_kasir(id_pelayanan, id_history) {
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_req_kasir' ?>",
			data: {
				id_pelayanan: id_pelayanan,
				id_history: id_history
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Data berhasil ditambahkan",
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
	}
</script>
