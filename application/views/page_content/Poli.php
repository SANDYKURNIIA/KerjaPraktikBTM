<!-- Row -->
<?php
$data = $this->session->userdata('data_auth');
$tipe = $data->tipe;
?>
<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">POLI <?php echo $nama_poli; ?></span></h6>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="panel-wrapper collapse in">
		<div class="panel-body">
			<div class="table-wrap">
				<div class="table-responsive">
					<table id="datable" class="table table-hover display  pb-30" width="100%">
						<thead>
							<tr class="bg-success">
								<th>NO</th>
								<th>ERM</th>
								<!-- <th>CHECKOUT PASIEN</th> -->
								<th>BATAL BEROBAT</th>
								<?php if ($tipe == "polihemodialisa") { ?>
									<th>SEP</th>
									<th>SOAP</th>
								<?php } ?>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<!-- <th>RAWAT INAP</th> -->
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<!-- <th>CARA MASUK</th> -->
								<th>POLIKLINIK / RUANG</th>
								<th>JENIS KLAIM</th>
								<th>DIAGNOSA</th>
								<th>DPJP</th>
								<th>JENIS PELAYANAN</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>ERM</th>
								<!-- <th>CHECKOUT PASIEN</th> -->
								<th>BATAL BEROBAT</th>								
								<?php if ($tipe == "polihemodialisa") { ?>
									<th>SEP</th>
									<th>SOAP</th>
									<?php } ?>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<!-- <th>RAWAT INAP</th> -->
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<!-- <th>CARA MASUK</th> -->
								<th>POLIKLINIK / RUANG</th>
								<th>JENIS KLAIM</th>
								<th>DIAGNOSA</th>
								<th>DPJP</th>
								<th>JENIS PELAYANAN</th>
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
		<div class="modal fade" id="modal_batal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display:none;">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<div class="pull-left">
							<h6 class="panel-title txt-dark">
								PEMBATALAN PASIEN <span id="namaPasien"></span>
							</h6>
						</div>
					</div>
					<div class="modal-body">
						<div style="margin-left:1-em" class="form-body mt-20">
							<form action="" id="formPembatalan">
								<input type="hidden" name="idPelayanan" id="idPelayanan" readonly>
								<input type="hidden" name="idHistory" id="idHistory" readonly>
								<input type="hidden" name="noRM" id="noRM" readonly>
								<input type="hidden" name="tipepoli" id="tipepoli" readonly>
								<input type="hidden" name="tgl_masuk" id="tgl_masuk" readonly>
								<input type="hidden" name="dpjp" id="dpjp">
								<input type="hidden" name="nmPasien" id="nmPasien" readonly>
								<div class="row">
									<div class="col-sm-6">
										<label for="" class="control-label col-md-3">KETERANGAN</label>
										<div class="col-md-9 col-sm-12 col-xs-12">
											<textarea name="keteranganBatal" id="keteranganBatal" style="width: 235px; height: 126px;" placeholder="Masukan Keterangan..." required></textarea>
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
										<button type="submit" class="btn btn-warning btn-square" id="btnYakin">YAKIN</button>
									</div>
								</div>
								<div class="col-md-6">
									<div class="">
										<button class="btn btn-primary btn-square" id="btnBatal" data-dismiss="modal">TIDAK</button>
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
				"sSearch": "Pencarian :",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext": "Selanjutnya",
					"sLast": "Terakhir"
				},
			},
			"ajax": '<?php echo base_url('Poli/tampil_pasien'); ?>',
			"deferRender": true,
			"processing": true,
			"order": [],
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],

		});
	});

	function reload_table(id_pelayanan) {
		$('#datable').dataTable().fnClearTable();
		$('#datable').dataTable().fnDestroy();
		$('#datable').DataTable({
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
				"url": '<?php echo base_url('Poli/tampil_pasien'); ?>',
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




	function insert_na_tindakan() {
		idPelayanan = $('#idPelayanan').val();
		id_history = $('#idHistory').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_tindakan' ?>",
			data: {
				id_pelayanan: idPelayanan,
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
					$("#na_tindakan").hide();
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

	function insert_na_obat() {
		idPelayanan = $('#inPelResep').val();
		id_history = $('#inHisResep').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_obat' ?>",
			data: {
				id_pelayanan: idPelayanan,
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
					$("#na_obat").hide();
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

	function insert_na_lab() {
		idPelayanan = $('#id_pel_lab').val();
		id_history = $('#id_his_lab').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_lab' ?>",
			data: {
				id_pelayanan: idPelayanan,
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
					$("#na_lab").hide();
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

	function insert_na_radio() {
		idPelayanan = $('#id_pel_rad').val();
		id_history = $('#id_his_rad').val();
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_radio' ?>",
			data: {
				id_pelayanan: idPelayanan,
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
					$("#na_radio").hide();
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

	function check_out(id_pelayanan, id_history, nama) {
		swal({
			title: "Warning?",
			text: "Apakah kamu yakin ingin check out pasien " + nama + "?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: true

		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Kasir/insertCheckOutFisio",
					method: "POST",
					dataType: 'json',
					data: {
						id_pelayanan: id_pelayanan,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Data Pasien " + nama + " Telah Berhasil di Check Out",
								confirmButtonColor: "#3cb878",
							});
							$('#datable').DataTable().ajax.reload();
							reload_table(id_pelayanan);

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

	$("#btnYakin").on("click", function() {
    // Mendapatkan nilai keterangan pembatalan dari textarea
    var keteranganBatal = $("#keteranganBatal").val();

    // Memeriksa apakah keterangan pembatalan sudah diisi
    if (keteranganBatal.trim() === "") {
        // Jika keterangan pembatalan kosong, tampilkan pesan kesalahan
        swal({
            title: "Peringatan!",
            type: "warning",
            text: "Keterangan pembatalan harus diisi.",
            confirmButtonColor: "#3cb878",
        });
    } else {
        // Jika keterangan pembatalan telah diisi, lanjutkan dengan pengiriman data
        $.ajax({
            url: "<?= base_url("Poli/konfirmasi_hapus_pasien") ?>",
            method: "POST",
            dataType: "JSON",
            data: {
                idPelayanan: $("#idPelayanan").val(),
                id_history: $("#idHistory").val(),
                noRM: $("#noRM").val(),
                tgl_masuk: $("#tgl_masuk").val(),
                dpjp: $("#dpjp").val(),
                tipepoli: $("#tipepoli").val(),
                nmPasien: $("#nmPasien").val(),
                keteranganBatal: keteranganBatal // Mengirim keterangan pembatalan
            },
            success: function(data) {
                if (data.status == "sukses") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Pembatalan Pasien " + $("#nmPasien").val() + " Telah di Ajukan. \n MENUNGGU DI APPROVE",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#formPembatalan").trigger("reset");
                    $("#modal_batal").modal("hide");
                    reload_table($("#idPelayanan").val());
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: "GAGAL",
                        confirmButtonColor: "#3cb878",
                    });
                }
            },
            error: function(xhr, status, error) {
                // Menangani kesalahan AJAX (jika terjadi)
                console.error(xhr.responseText);
            }
        });
    }
});


	$("#btnBatal").on("click",function(){
		$("#formPembatalan").trigger("reset");
	});

	function batal_berobat(id_pelayanan,nama,norm,tglmasuk,tipe,dpjp,id_history) {
		$("#noRM").val(norm);
		$("#idPelayanan").val(id_pelayanan);
		$("#idHistory").val(id_history);
		$("#tgl_masuk").val(tglmasuk);
		$("#tipepoli").val(tipe);
		$("#nmPasien").val(nama);
		$("#namaPasien").html(nama);
		$("#dpjp").val(dpjp);
		$("#modal_batal").modal('show');
	}

/*
	function batal_berobat(id_pelayanan, nama) {
		swal({
			title: "Warning?",
			text: "Apakah kamu yakin ingin menghapus pasien " + nama + "?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: true
		}, function() {
			$().ready(function() {
				$.ajax({
					url: "<?php echo base_url() ?>Pelayanan_masuk/delete_pasien",
					method: "POST",
					dataType: 'json',
					data: {
						id_pelayanan: id_pelayanan,
					},
					success: function(data) {
						if (data.status == "success") {
							swal({
								title: "good job!",
								type: "success",
								text: "Data Pasien " + nama + " Telah Berhasil di Hapus",
								confirmButtonColor: "#3cb878",
							});
							$('#datable').DataTable().ajax.reload();
							reload_table(id_pelayanan);

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
	}*/

</script>