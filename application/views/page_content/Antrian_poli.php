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
					<table id="datable" class="table table-hover display pb-30">
							<thead>
								<tr class="bg-success">
									<th>NO.</th>
									<th>BUKA/TUTUP</th>
									<th>STATUS</th>
									<th>NAMA POLI</th>

								</tr>
							</thead>
							<tfoot>
								<tr class="bg-success">
									<th>NO.</th>
									<th>BUKA/TUTUP</th>
									<th>STATUS</th>
									<th>NAMA POLI</th>

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
				"language": {
            				"sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
    		"sProcessing":   "Sedang memproses...",
    		"sLengthMenu":   "Tampilkan _MENU_ entri",
    		"sZeroRecords":  "Tidak ditemukan data yang sesuai",
    		"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    		"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
    		"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    		"sInfoPostFix":  "",
    		"sSearch":       "Pencarian:",
    		"sUrl":          "",
			"oPaginate": {
        		"sFirst":    "Pertama",
        		"sPrevious": "Sebelumnya",
        		"sNext":     "Selanjutnya",
        		"sLast":     "Terakhir"
    		},
				},		
	
			"ajax": '<?php echo base_url('Antrian_poli/tampil_antrian_poli'); ?>',	
			});

			});

	</script>

<script type="text/javascript">
	function edit_buka(nama) {
			swal({   
            title: "Apakah kamu yakin?",   
            text: "Membuka Poli : " + nama + "?",
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#3cb878",   
            confirmButtonText: "Yakin",   
            cancelButtonText: "Batal",   
			closeOnConfirm: false 
			}, function(){   
				$().ready(function(){                                        
					$.ajax({  
						url : "<?php echo base_url() ?>Antrian_poli/buka_poli",
						method: "POST",
						dataType: 'json',
						data : {
							nama:nama, 
						},  
						success: function(data){
							if(data.status=="success"){
								swal({   
									title: "good job!",   
									type: "success", 
									text: "Poli : " + nama + " telah dibuka",
									confirmButtonColor: "#3cb878",   
								});
								$('#datable').DataTable().ajax.reload();
							}else{
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


		function edit_tutup(nama) {
			swal({   
            title: "Apakah kamu yakin?",   
			text: "Menutup Poli : " + nama + "?",
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#3cb878",   
            confirmButtonText: "Yakin",   
            cancelButtonText: "Batal",   
			closeOnConfirm: false 
			}, function(){   
				$().ready(function(){                                        
					$.ajax({  
						url : "<?php echo base_url() ?>Antrian_poli/tutup_poli",
						method: "POST",
						dataType: 'json',
						data : {
							nama:nama, 
						},  
						success: function(data){
							if(data.status=="success"){
								swal({   
									title: "good job!",   
									type: "success", 
									text: "Poli : " + nama + " telah  ditutup",
									confirmButtonColor: "#3cb878",   
								});
								$('#datable').DataTable().ajax.reload();
							}else{
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
</script>
