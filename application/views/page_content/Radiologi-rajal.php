<<<<<<< HEAD
<!-- Row -->

<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN RAWAT JALAN /
					UGD</span></h6>
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
								<th>TINDAKAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DPJP</th>
								<th>JENIS KLAIM</th>
								<th>KETERANGAN</th>
								<th>NO SEP</th>
								<th>DIAGNOSA</th>
								<th>AGAMA</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DPJP</th>
								<th>JENIS KLAIM</th>
								<th>KETERANGAN</th>
								<th>NO SEP</th>
								<th>DIAGNOSA</th>
								<th>AGAMA</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- POLI THT -->
	<div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel"
		aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN RADIOLOGI
						RAWAT JALAN | POLI THT
					</h5>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 mb-20 mt-10">
							<div class="form-group ">
								<label class="control-label col-md-3">NAMA PASIEN</label>
								<div class="col-md-9 has-success">
									<input type="text" class="form-control" disabled id="inNamaPasien">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="modal-body mt-5">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
							<hr width="95%">
							<div class="table-wrap" style="width: 95%; margin: auto ">
								<div class="table-responsive">
									<table class="table table-hover display pb-60" id="tableradiologi">
										<thead>
											<tr class="bg-success">
												<th>NO</th>
												<th>AKSI</th>
												<th>STATUS</th>
												<th>NAMA TINDAKAN</th>
												<th>JUMLAH TINDAKAN</th>
												<th>BIAYA</th>
												<th>DOKTER</th>
												<th>STAFF REQUEST</th>
												<th>STAFF KONFIRMASI</th>
												<th>GAMBAR</th>
												<th>KETERANGAN</th>
											</tr>
										</thead>
										<tfoot>
											<tr class="bg-success">
												<th>NO</th>
												<th>AKSI</th>
												<th>STATUS</th>
												<th>NAMA TINDAKAN</th>
												<th>JUMLAH TINDAKAN</th>
												<th>BIAYA</th>
												<th>DOKTER</th>
												<th>STAFF REQUEST</th>
												<th>STAFF KONFIRMASI</th>
												<th>GAMBAR</th>
												<th>KETERANGAN</th>
											</tr>
										</tfoot>
										<tbody style="color: black">
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-8">
							</div>
							<div class="col-md-4 pull-right mt-20">
								<div class="table-wrap" style="width: 85%; margin-bottom:40px;">
									<div class="table-responsive ">
										<table class="table table-hover display " id="outTotalHargaRadiologi">
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
					</div>

						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" disabled id="inNama">
										</div>
									</div>
								</div>
								<!--/span-->

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inJumlah" disabled>
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
											<input type="text" class="form-control" disabled id="inBiaya">
											<input type="hidden" class="form-control" disabled id="idPelayanan">
											<input type="hidden" class="form-control" disabled
												id="id_tindakan_radiologi">
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">DOKTER PEMBACA</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2"
												placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;"
												tabindex="1" id="inDPJP" name="namaDPJP">
												<option value="-">-</option>
												<?php
                                                    foreach ($dokter as $row) :?>
												<option value="<?php echo $row['nama']; ?>">
													<?php echo $row['nama']; ?></option>
												<?php endforeach; ?>
											</select><br>
										</div>
									</div>
								</div>

							</div>
							<span class="help-block"></span>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">KETERANGAN</label>
										<div class="col-md-9 has-success">
											<textarea class="form-control" id="inKet" rows="13"
												style="max-width:110%; "></textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group pl-15">
										<label class="control-label">UPLOAD FILE</label>
										<div class="panel-body" style="margin-left:-1em;">
											<div class="mt-5">
												<input type="file" id="gambar" name="gambar" class="dropify" />
											</div>
										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<div class="row">
								<div class="col-md-6 pull-right" style="margin-top:-1em;">
									<div class="form-group">
										<button onclick="update_tindakan()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
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
									"ajax": '<?php echo base_url('Radiologi/tampil_datarajal'); ?>',	
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

					function reload_data_radiologi(id_pelayanan) {    
                        $('#tableradiologi').dataTable().fnClearTable();
                        $('#tableradiologi').dataTable().fnDestroy();
                        $('#tableradiologi').DataTable({
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
                                "url": '<?php echo base_url('Radiologi/tampil_rajal_radiologi'); ?>',
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


					function reload_total_radiologi(id_pelayanan) {
                        $('#outTotalHargaRadiologi').dataTable().fnClearTable();
                        $('#outTotalHargaRadiologi').dataTable().fnDestroy();
                        $('#outTotalHargaRadiologi').DataTable({
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
                                "url": '<?php echo base_url('Radiologi/tampil_total_radiologi'); ?>',
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

// Kondisi Display Modal Per-poli
			function edit_data_tindakan(id_pelayanan, id_history, poli, nama) {
                // alert(poli);
                if(poli == 'THT'){
                    $.ajax({
                        url: "<?= base_url().'Radiologi/getdata_radiologiTHT'?>",
                        data: {
                            pelayanan: id_pelayanan,
                            history: id_history
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function (data) {
                            if (data.status_dt == "found") {
                                $("#idPelayanan").val(data.id_pelayanan);
                                $("#inNamaPasien").val(nama);
                                $("#modal_edit_data").modal('show');
                                reload_data_radiologi(id_pelayanan);
                                reload_total_radiologi(id_pelayanan);
                            } else {
                                alert("data tidak ditemukan");
                            }
                        }
				    });  
                }else{
                    alert('tidak ketemu');
                }
            }

        function aksi_radiologi(id_pelayanan,id_tindakan_radiologi){
            $.ajax({
                url : "<?= base_url(). 'Radiologi/getdata_formTHT'?>",
                data:{
                    pelayanan:id_pelayanan,
                    tindakan:id_tindakan_radiologi,
                },
                type:'POST',
                dataType: 'json',
                success:function(data){
                    if(data.status_dt == "found"){
                        $("#inNama").val(data.nama);
                        $("#inBiaya").val(data.total);
                        $("#inJumlah").val(data.frek);
                        $("#id_tindakan_radiologi").val(data.id_tindakan_radiologi);
                    }else{
                        alert("data tidak ditemukan");
                    }
                }
            });
        }

        function update_tindakan(){
            a = $("#inNama").val();
            b = $("#idPelayanan").val();
            c = $("#inJumlah").val();
            d = $("#gambar").val();
            e = $("#id_tindakan_radiologi").val();
            f = $("#inDPJP").val();
            g = $("#inBiaya").val();
            h = $("#inKet").val();
           
            swal({
                title: "Info!",
                text:"Anda akan menyimpan tindakan " +a+ "",
                type: "info",
                showCancelButton:true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm:false
            }, 
            function(){   
				$().ready(function(){                                        
					$.ajax({  
						url : "<?php echo base_url() ?>Radiologi/update_tht",
						method: "POST",
						dataType: 'json',
						data : {
							idPelayanan:b,
							inJumlah:c,
						    gambar:d,
							id_tindakan_radiologi:e,
							inDPJP:f,
							inBiaya:g,
                            inKet:h
						},  
						success: function(data){
							if(data.status=="success"){
								swal({   
									title: "good job!",   
									type: "success", 
									text: "Data berhasil disimpan",
									confirmButtonColor: "#3cb878",   
								});
								 $("#inNama").val('');
								 $("#inJumlah").val('');
								 $("#gambar").val('');
								 $("#inBiaya").val('');
								 $("#inKet").val('');
           
								$('#tableradiologi').DataTable().ajax.reload();
								$('#outTotalHargaRadiologi').DataTable().ajax.reload();
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
        }

		function hapus_radiologi(id_tindakan_radiologi, id_pelayanan, nama) { 
                    swal({
                        title: "Apakah kamu yakin?",
                        text: "Menghapus data " + nama + "?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3cb878",
                        confirmButtonText: "Yakin",
                        cancelButtonText: "Batal",
                        closeOnConfirm: false
                    }, function() {
                        $().ready(function() {
                            $.ajax({
                                url: "<?php echo base_url() ?>Radiologi/hapus_data_radiologi",
                                method: "POST",
                                dataType: 'json',
                                data: {
                                    id_tindakan_radiologi: id_tindakan_radiologi,
                                },
                                success: function(data) {
                                    if (data.status == "success") {
                                        swal({
                                            title: "good job!",
                                            type: "success",
                                            text: "Data Berhasil dihapus",
                                            confirmButtonColor: "#3cb878",
                                        });
										$('#tableradiologi').DataTable().ajax.reload();
                                        $('#outTotalHargaRadiologi').DataTable().ajax.reload();
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
    </script>

    <script type="text/javascript">
                function convertToRupiah(angka) {
                    var rupiah = '';
                    var angkarev = angka.toString().split('').reverse().join('');
                    for (var i = 0; i < angkarev.length; i++)
                        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
                }
     </script>
=======
<!-- Row -->

<div class="panel panel-default card-view">
	<div class="panel-heading">
		<div class="pull-left">
			<h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN RAWAT JALAN /
					UGD</span></h6>
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
								<th>TINDAKAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DPJP</th>
								<th>JENIS KLAIM</th>
								<th>KETERANGAN</th>
								<th>NO SEP</th>
								<th>DIAGNOSA</th>
								<th>AGAMA</th>
							</tr>
						</thead>
						<tfoot>
							<tr class="bg-success">
								<th>NO</th>
								<th>TINDAKAN</th>
								<th>NO RM</th>
								<th>NAMA PASIEN</th>
								<th>TANGGAL MASUK</th>
								<th>JAM MASUK</th>
								<th>JENIS KELAMIN</th>
								<th>TANGGAL LAHIR</th>
								<th>UMUR</th>
								<th>CARA MASUK</th>
								<th>POLIKLINIK / RUANG</th>
								<th>DPJP</th>
								<th>JENIS KLAIM</th>
								<th>KETERANGAN</th>
								<th>NO SEP</th>
								<th>DIAGNOSA</th>
								<th>AGAMA</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- POLI THT -->
	<div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel"
		aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN RADIOLOGI
						RAWAT JALAN | POLI THT
					</h5>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 mb-20 mt-10">
							<div class="form-group ">
								<label class="control-label col-md-3">NAMA PASIEN</label>
								<div class="col-md-9 has-success">
									<input type="text" class="form-control" disabled id="inNamaPasien">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="modal-body mt-5">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
							<hr width="95%">
							<div class="table-wrap" style="width: 95%; margin: auto ">
								<div class="table-responsive">
									<table class="table table-hover display pb-60" id="tableradiologi">
										<thead>
											<tr class="bg-success">
												<th>NO</th>
												<th>AKSI</th>
												<th>STATUS</th>
												<th>NAMA TINDAKAN</th>
												<th>JUMLAH TINDAKAN</th>
												<th>BIAYA</th>
												<th>DOKTER</th>
												<th>STAFF REQUEST</th>
												<th>STAFF KONFIRMASI</th>
												<th>GAMBAR</th>
												<th>KETERANGAN</th>
											</tr>
										</thead>
										<tfoot>
											<tr class="bg-success">
												<th>NO</th>
												<th>AKSI</th>
												<th>STATUS</th>
												<th>NAMA TINDAKAN</th>
												<th>JUMLAH TINDAKAN</th>
												<th>BIAYA</th>
												<th>DOKTER</th>
												<th>STAFF REQUEST</th>
												<th>STAFF KONFIRMASI</th>
												<th>GAMBAR</th>
												<th>KETERANGAN</th>
											</tr>
										</tfoot>
										<tbody style="color: black">
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-8">
							</div>
							<div class="col-md-4 pull-right mt-20">
								<div class="table-wrap" style="width: 85%; margin-bottom:40px;">
									<div class="table-responsive ">
										<table class="table table-hover display " id="outTotalHargaRadiologi">
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
					</div>

						<!-- /formbody -->
						<div class="form-body mb-30">
							<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
							</h6>
							<hr width="95%">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">NAMA TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" disabled id="inNama">
										</div>
									</div>
								</div>
								<!--/span-->

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">JUMLAH TINDAKAN</label>
										<div class="col-md-9 has-error">
											<input type="text" class="form-control" id="inJumlah" disabled>
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
											<input type="text" class="form-control" disabled id="inBiaya">
											<input type="hidden" class="form-control" disabled id="idPelayanan">
											<input type="hidden" class="form-control" disabled
												id="id_tindakan_radiologi">
											<span class="help-block"></span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label col-md-3">DOKTER PEMBACA</label>
										<div class="col-md-9 has-success">
											<select class="form-control filled-input select2"
												placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;"
												tabindex="1" id="inDPJP" name="namaDPJP">
												<option value="-">-</option>
												<?php
                                                    foreach ($dokter as $row) :?>
												<option value="<?php echo $row['nama']; ?>">
													<?php echo $row['nama']; ?></option>
												<?php endforeach; ?>
											</select><br>
										</div>
									</div>
								</div>

							</div>
							<span class="help-block"></span>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">KETERANGAN</label>
										<div class="col-md-9 has-success">
											<textarea class="form-control" id="inKet" rows="13"
												style="max-width:110%; "></textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group pl-15">
										<label class="control-label">UPLOAD FILE</label>
										<div class="panel-body" style="margin-left:-1em;">
											<div class="mt-5">
												<input type="file" id="gambar" name="gambar" class="dropify" />
											</div>
										</div>
									</div>
								</div>
							</div>
							<span class="help-block"></span>
							<div class="row">
								<div class="col-md-6 pull-right" style="margin-top:-1em;">
									<div class="form-group">
										<button onclick="update_tindakan()"
											class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i
												class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
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
									"ajax": '<?php echo base_url('Radiologi/tampil_datarajal'); ?>',	
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

					function reload_data_radiologi(id_pelayanan) {    
                        $('#tableradiologi').dataTable().fnClearTable();
                        $('#tableradiologi').dataTable().fnDestroy();
                        $('#tableradiologi').DataTable({
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
                                "url": '<?php echo base_url('Radiologi/tampil_rajal_radiologi'); ?>',
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


					function reload_total_radiologi(id_pelayanan) {
                        $('#outTotalHargaRadiologi').dataTable().fnClearTable();
                        $('#outTotalHargaRadiologi').dataTable().fnDestroy();
                        $('#outTotalHargaRadiologi').DataTable({
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
                                "url": '<?php echo base_url('Radiologi/tampil_total_radiologi'); ?>',
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

// Kondisi Display Modal Per-poli
			function edit_data_tindakan(id_pelayanan, id_history, poli, nama) {
                // alert(poli);
                if(poli == 'THT'){
                    $.ajax({
                        url: "<?= base_url().'Radiologi/getdata_radiologiTHT'?>",
                        data: {
                            pelayanan: id_pelayanan,
                            history: id_history
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function (data) {
                            if (data.status_dt == "found") {
                                $("#idPelayanan").val(data.id_pelayanan);
                                $("#inNamaPasien").val(nama);
                                $("#modal_edit_data").modal('show');
                                reload_data_radiologi(id_pelayanan);
                                reload_total_radiologi(id_pelayanan);
                            } else {
                                alert("data tidak ditemukan");
                            }
                        }
				    });  
                }else{
                    alert('tidak ketemu');
                }
            }

        function aksi_radiologi(id_pelayanan,id_tindakan_radiologi){
            $.ajax({
                url : "<?= base_url(). 'Radiologi/getdata_formTHT'?>",
                data:{
                    pelayanan:id_pelayanan,
                    tindakan:id_tindakan_radiologi,
                },
                type:'POST',
                dataType: 'json',
                success:function(data){
                    if(data.status_dt == "found"){
                        $("#inNama").val(data.nama);
                        $("#inBiaya").val(data.total);
                        $("#inJumlah").val(data.frek);
                        $("#id_tindakan_radiologi").val(data.id_tindakan_radiologi);
                    }else{
                        alert("data tidak ditemukan");
                    }
                }
            });
        }

        function update_tindakan(){
            a = $("#inNama").val();
            b = $("#idPelayanan").val();
            c = $("#inJumlah").val();
            d = $("#gambar").val();
            e = $("#id_tindakan_radiologi").val();
            f = $("#inDPJP").val();
            g = $("#inBiaya").val();
            h = $("#inKet").val();
           
            swal({
                title: "Info!",
                text:"Anda akan menyimpan tindakan " +a+ "",
                type: "info",
                showCancelButton:true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm:false
            }, 
            function(){   
				$().ready(function(){                                        
					$.ajax({  
						url : "<?php echo base_url() ?>Radiologi/update_tht",
						method: "POST",
						dataType: 'json',
						data : {
							idPelayanan:b,
							inJumlah:c,
						    gambar:d,
							id_tindakan_radiologi:e,
							inDPJP:f,
							inBiaya:g,
                            inKet:h
						},  
						success: function(data){
							if(data.status=="success"){
								swal({   
									title: "good job!",   
									type: "success", 
									text: "Data berhasil disimpan",
									confirmButtonColor: "#3cb878",   
								});
								 $("#inNama").val('');
								 $("#inJumlah").val('');
								 $("#gambar").val('');
								 $("#inBiaya").val('');
								 $("#inKet").val('');
           
								$('#tableradiologi').DataTable().ajax.reload();
								$('#outTotalHargaRadiologi').DataTable().ajax.reload();
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
        }

		function hapus_radiologi(id_tindakan_radiologi, id_pelayanan, nama) { 
                    swal({
                        title: "Apakah kamu yakin?",
                        text: "Menghapus data " + nama + "?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3cb878",
                        confirmButtonText: "Yakin",
                        cancelButtonText: "Batal",
                        closeOnConfirm: false
                    }, function() {
                        $().ready(function() {
                            $.ajax({
                                url: "<?php echo base_url() ?>Radiologi/hapus_data_radiologi",
                                method: "POST",
                                dataType: 'json',
                                data: {
                                    id_tindakan_radiologi: id_tindakan_radiologi,
                                },
                                success: function(data) {
                                    if (data.status == "success") {
                                        swal({
                                            title: "good job!",
                                            type: "success",
                                            text: "Data Berhasil dihapus",
                                            confirmButtonColor: "#3cb878",
                                        });
										$('#tableradiologi').DataTable().ajax.reload();
                                        $('#outTotalHargaRadiologi').DataTable().ajax.reload();
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
    </script>

    <script type="text/javascript">
                function convertToRupiah(angka) {
                    var rupiah = '';
                    var angkarev = angka.toString().split('').reverse().join('');
                    for (var i = 0; i < angkarev.length; i++)
                        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
                }
     </script>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
