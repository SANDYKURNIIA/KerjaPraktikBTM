<!-- Row -->
<div class="panel panel-default card-view mt-20 ">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR PASIEN ANTRIAN ONLINE JKN</span></h6>
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
								<th>KONFIRMASI</th>
								<th>BATAL</th>
								<th>NO RM</th>
								<th>NO ANTRIAN</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL MASUK</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DPJP</th>
								<th>CARA BAYAR</th>
							</tr>
						</thead>

						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>KONFIRMASI</th>
								<th>BATAL</th>
								<th>NO RM</th>
								<th>NO ANTRIAN</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL MASUK</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DPJP</th>
								<th>CARA BAYAR</th>
								
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- modal edit data -->
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
								BATAL ANTRIAN MJKN PASIEN - <span id="namaPasien"></span>
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
											<select name="keterangan" class='form-control select2' id="keterangan">
												<option value="Pasien Tidak Hadir">Pasien Tidak Hadir</option>
												<option value="Sudah Mengambil Antrrian Lain">Sudah Mengambil Antrrian Lain</option>
												<option value="Perubahan Jadwal Kunjungan Berobat">Perubahan Jadwal Kunjungan Berobat</option>
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
										<input type="hidden" id="id_antrian">
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
<style>
	td {
		color: black;
	}
</style>
<link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/bower_components/sweetalert/dist/sweetalert2.min.css">
<script src="<?= base_url(); ?>assets/vendors/bower_components/sweetalert/dist/sweetalert2@11.js"></script>
<script type="text/javascript">
	function konfirmasi(id_antrian,no_rm) {
		Swal.fire({
			title: 'Memproses...',
			text: 'Harap tunggu sebentar.',
			allowOutsideClick: false, // Prevent closing by clicking outside
			didOpen: () => {
				Swal.showLoading(); // Show the loading spinner
			}
		});
		$.ajax({
			url: "<?= base_url() . 'Pasien/konfirmasiAntrolJkn' ?>",
			data: {
				id: id_antrian,
				no_rm:no_rm
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				Swal.close();
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Data sudah dikonfirmasi",
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
	function batal(id_antrian) {
		$("#id_antrian").val(id_antrian);
		$("#modal_batal").modal('show');
	}
	function btnYakin() {
		keterangan = $("#keterangan").val();
		id_antrian = $("#id_antrian").val();
		$("#modal_batal").modal('hide');
		batal_asli(id_antrian,keterangan);
	}
	function batal_asli(id_antrian) {
		$.ajax({
			url: "<?= base_url() . 'Pasien/delete_pasien_jkn' ?>",
			data: {
				id: id_antrian,
				keterangan: keterangan,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status == "success") {
					swal({
						title: "good job!",
						type: "success",
						text: "Data sudah dibatalkan",
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



<script type="text/javascript">
	$(document).ready(function() {
		$('#datable').DataTable({
			"retrieve": true,
			"dom": 'Bfrtip',
			"buttons": ['csv', 'excel', 'pdf'],
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
			"ajax": '<?php echo base_url('Pasien/tampil_antrolJkn'); ?>',
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