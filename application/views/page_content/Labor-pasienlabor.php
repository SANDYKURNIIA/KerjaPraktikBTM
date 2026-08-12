<!-- Row -->

<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">TINDAKAN LABOR SENDIRI</span></h6>
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
								<th>TINDAKAN</th>
								<th>N/A</th>
								<th>KASIR</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>CARA BAYAR</th>
								<th>DIAGNOSA</th>
								<th>DPJP</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>N/A</th>
								<th>KASIR</th>
								<th>TANGGAL PELAYANAN</th>
								<th>JAM PELAYANAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
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
	
	<!-- End -->

	<!-- Dewasa -->
	<?php $this->load->view('page_content/Labor-PASIENDEWASA'); ?>
	<!-- End -->

	<!-- Anak -->
	<?php $this->load->view('page_content/Labor-PASIENANAK'); ?>
	<!-- End -->

	<!-- Hari -->
	<?php $this->load->view('page_content/Labor-PASIENHARI'); ?>
	<!-- End -->

	<!-- Bulan -->
	<?php $this->load->view('page_content/Labor-PASIENBULAN'); ?>
	<!-- End -->


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
    							"sSearch":  "Pencarian :",
    							"sUrl":          "",
								"oPaginate": {
        						"sFirst":    "Pertama",
        						"sPrevious": "Sebelumnya",
        						"sNext":     "Selanjutnya",
        							"sLast":     "Terakhir"
    					        },
							        },		
									"ajax": '<?php echo base_url('Labor/tampil_pasien_labor'); ?>',	
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

			function aksi_data_tindakan(id_pelayanan, id_history, nama, umr, umur, jenis_kelamin) {
				if(umr <= 000031){
					$("#id_pel_lab_HARI").val(id_pelayanan);
					$("#inNamaPasienHARI").val(nama);
					$("#inUmurPasienHARI").val(umur);
					$("#inJenisPasienHARI").val(jenis_kelamin);
					$("#modal_edit_HARI").modal('show');
					reload_data_labor_HARI(id_pelayanan);
					reload_total_labor_HARI(id_pelayanan);
				}else if (umr <= 001200) {
					$("#id_pel_lab_BULAN").val(id_pelayanan);
					$("#inNamaPasienBULAN").val(nama);
					$("#inUmurPasienBULAN").val(umur);
					$("#inJenisPasienBULAN").val(jenis_kelamin);
					$("#modal_edit_BULAN").modal('show');
					reload_data_labor_BULAN(id_pelayanan);
					reload_total_labor_BULAN(id_pelayanan);
				}else if(umr <= 170000){
					$("#id_pel_lab_ANAK").val(id_pelayanan);
					$("#inNamaPasienANAK").val(nama);
					$("#inUmurPasienANAK").val(umur);
					$("#inJenisPasienANAK").val(jenis_kelamin);
					$("#modal_edit_ANAK").modal('show');
					reload_data_labor_ANAK(id_pelayanan);
					reload_total_labor_ANAK(id_pelayanan);
				}else if(umr > 170000){
					$("#id_pel_lab_DEWASA").val(id_pelayanan);
					$("#inNamaPasienDEWASA").val(nama);
					$("#inJenisPasienDEWASA").val(jenis_kelamin);
					$("#inUmurPasienDEWASA").val(umur);
					$("#modal_edit_DEWASA").modal('show');
					reload_data_labor_DEWASA(id_pelayanan);
					reload_total_labor_DEWASA(id_pelayanan);
				} else {
					alert('tidak ketemu');
				}
			}
		function edit_na(id_pelayanan, id_history) {
		$.ajax({
			url: "<?= base_url() . 'Poli/insert_na_lab' ?>",
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
		
    </script>

		
<?php $this->load->view('page_content/Labor-PASIENHARI-JS'); ?>
<?php $this->load->view('page_content/Labor-PASIENBULAN-JS'); ?>
<?php $this->load->view('page_content/Labor-PASIENANAK-JS'); ?>
<?php $this->load->view('page_content/Labor-PASIENDEWASA-JS'); ?>


