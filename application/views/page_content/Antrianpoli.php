	<!-- Row -->
	<div class="panel panel-default card-view mt-20">
		<div class="panel-heading">
			<div class="pull-left">
				<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">ANTRIAN POLI</span>
				</h6>

			</div>
			<div class="clearfix"></div>
		</div>

		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<div class="table-wrap">
					<div class="table-responsive">
						<table id="datable" width="100%" class="table table-hover table-responsive mb-10">
							<thead>
								<tr class="bg-success">
									<th>NO ANTRIAN</th>
									<th>POLI TUJUAN</th>
									<th>JAM</th>
									<th>NO RM</th>
									<th>NAMA</th>
									<th>CARA BAYAR</th>
									<th>STATUS</th>
									<th>SKIP</th>
									<th>SELESAI</th>
								</tr>
							</thead>
							<tfoot>
								<tr class="bg-success">
									<th>NO ANTRIAN</th>
									<th>POLI TUJUAN</th>
									<th>JAM</th>
									<th>NO RM</th>
									<th>NAMA</th>
									<th>CARA BAYAR</th>
									<th>STATUS</th>
									<th>SKIP</th>
									<th>SELESAI</th>
								</tr>
							</tfoot>
						</table>
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


<script type="text/javascript">
			$(document).ready(function () {

                $('#datable').DataTable({
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
                        "sSearch": "Pencarian:",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext": "Selanjutnya",
                            "sLast": "Terakhir"
                        },
                    },
                    "ajax": '<?php echo base_url('Antrianpoli/tampil_antrian_poli'); ?>',
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
    </script>
    
    <script type="text/javascript">
        function skip_data(id_antrian) {
			$.ajax({  
				url : "<?= base_url() ?>Antrianpoli/updateskip",
				method: 'POST',
				dataType: 'json',
				data : {
					id_antrian: id_antrian, 
					},  
				success: function(data) { 
					if(data.status=="success"){
						$('#datable').DataTable().ajax.reload();
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

        function selesai_data(id_antrian) {
			$.ajax({  
				url : "<?= base_url() ?>Antrianpoli/updateselesai",
				method: 'POST',
				dataType: 'json',
				data : {
					id_antrian: id_antrian, 
					},  
				success: function(data) { 
					if(data.status=="success"){
						$('#datable').DataTable().ajax.reload();
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