<div class="container-fluid">

	<!-- Row -->
	<div class="panel-wrapper collapse in">
		<!-- search rm -->
		<div class="container-fluid">
			<div class="container-fluid">
				<!-- Row -->
				<div class="row ">
					<div class="col-sm-13">
						<div class="panel panel-default card-view pb-0">
							<div class="btn btn-success btn-icon-anim btn-circle" onClick="window.location.reload();"><i
									class="icon-refresh"></i></div>
							<div class="col-md-1">
                            <input type="text" class="form-control rounded-input text-center" value="<?= $count_data['jumlah']; ?>" disabled>
								<input type="hidden" id="id_antrian" value="<?= $antrian_data['id_antrian'];?>" disabled>
								<input type="hidden" id="no_antrian" value="<?php $in = 'r'; $no= $antrian_data['no_antri']; echo ($in.$no); ?>" disabled>
								<span class="help-block"> </span>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body pb-1">
									<div class="row">
										<div class="col-lg-3 col-md-7 col-sm-12 text-center md-4">
										</div>
										<div class="col-md-6 mb-30">
											<div class="panel panel-pricing mb-0 center">
												<div class="panel-heading text-center">
													<h6>ANTRIAN POLI FISIO</h6>
													<span class="panel-price" style="font-size: 150px">
													<?php 
													$inisial = 'r';
													$noantri = $antrian_data['no_antri'];
													echo strtoupper($inisial.$noantri);
													?>
													</span>
													<div class="btn btn-success btn-rounded btn-lg" onclick="playSuara(<?=  "'".$antrian_data['no_antri']."','".$antrian_data['nama']."'"; ?>)">
														PLAY</div>

													<div class="btn btn-success btn-rounded btn-lg" onclick="nextAntrian();">
														NEXT</div>
												</div>
											</div>
											<!-- /item -->
											<div class="alert alert-warning peringatan" role="alert">
												<strong>WARNING !!</strong> Belum Ada Antrian.
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->

					<!-- /Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">LIST ANTRIAN</h6>
									</div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="table-wrap">
											<div class="table-responsive">
												<table id="tabledata" width="100%"
													class="table table-hover table-responsive mb-10">
													<thead>
														<tr class="bg-success">
															<th>NO ANTRIAN</th>
															<th>JAM</th>
															<th>NO RM</th>
															<th>NAMA</th>
															<th>CARA BAYAR</th>
															<th>STATUS</th>
															<th>SKIP</th>
															<th>PANGGIL</th>
														</tr>
													</thead>
													<tfoot>
														<tr class="bg-success">
															<th>NO ANTRIAN</th>
															<th>JAM</th>
															<th>NO RM</th>
															<th>NAMA</th>
															<th>CARA BAYAR</th>
															<th>STATUS</th>
															<th>SKIP</th>
															<th>PANGGIL</th>
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
	</div>
	<!-- End -->
</div>

<style>
	td {
		color: black;
	}

</style>



<script type="text/javascript">
    $(document).ready(function() {
		no_antrian = $('#no_antrian').val();

		if (no_antrian == 'l0') {
			$(".peringatan").show();
		}else{
			$(".peringatan").hide();
		}

            $('#tabledata').DataTable({
					"fnRowCallback": function (nRow, aData, iDisplayIndex) {
						if(iDisplayIndex == 0) {
							$(nRow).css('font-weight', 'bold');
						}
					},
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
                    "ajax": '<?php echo base_url('Poli_fisio/tampilAntrian'); ?>',
                    "deferRender": true,
                    "processing": true,
                    "order": [],
                    "columnDefs": [{
                        "targets": [0],
                        "orderable": false,
                    }, 
                    ],
            });
    });

	function skip_data(id_antrian) {
			$.ajax({  
				url : "<?= base_url() ?>Poli_fisio/updateskip",
				method: 'POST',
				dataType: 'json',
				data : {
					id_antrian: id_antrian, 
					},  
				success: function(data) { 
					if(data.status=="success"){
						$('#tabledata').DataTable().ajax.reload();
					}else{
						swal({   
							title: "Gagal!",   
							type: "warning", 
							text: "Maaf terjadi kesalahan",
							confirmButtonColor: "#3cb878",   
						});
					}  
				}       
			});                    
		}

        function nextAntrian() {
			id_antrian = $('#id_antrian').val();
			$.ajax({  
				url : "<?= base_url() ?>Poli_fisio/updatenext",
				method: "POST",
				dataType: 'json',
				data : {
					id_antrian: id_antrian, 
						},  
				success: function(data) { 
					if(data.status=="success"){
						location.reload();  
					}else{
						swal({   
							title: "Gagal!",   
							type: "warning", 
							text: "Maaf terjadi kesalahan",
							confirmButtonColor: "#3cb878",   
						});
					}  
				}       
			});                    
		}

        function playSuara(no_antri,nama) {
			$nomor = "r" +no_antri;
				$.ajax({  
					url : "<?= base_url() ?>Poli_fisio/playSuara",					
					method: "POST",
					dataType: 'json',
					data : {
						nomor: $nomor, 
						nama: nama, 
					},success: function(data) { 
						if(data.status=="success"){
							location.reload();  
						}else{
							swal({   
								title: "Gagal!",   
								type: "warning", 
								text: "Maaf terjadi kesalahan",
								confirmButtonColor: "#3cb878",   
							});
						}
					}  
				});
            }

		function playTableSuara(no_antri, poli, nama) {
				$.ajax({  
					url : "<?= base_url() ?>Poli_fisio/playSuara",					
					method: "POST",
					dataType: 'json',
					data : {
						nomor: no_antri, 
						jenis: poli, 
						nama: nama, 
					},success: function(data) { 
						if(data.status=="success"){
							$('#tabledata').DataTable().ajax.reload();
						}else{
							swal({   
								title: "Gagal!",   
								type: "warning", 
								text: "Maaf terjadi kesalahan",
								confirmButtonColor: "#3cb878",   
							});
						}
					}  
				});
			}
</script>
