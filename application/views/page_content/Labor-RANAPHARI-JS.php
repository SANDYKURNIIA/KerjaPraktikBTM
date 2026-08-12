<script type="text/javascript">
	function detail_tindakan_labor_hari(id_tindakan_labor) {
		$.ajax({
			url: "<?= base_url() . 'Labor/getdata_formById_Labor' ?>",
			data: {
				tindakan: id_tindakan_labor,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					$('#detailTindakanLaborHARI').collapse('toggle');
					$("#outNamaHARI").val(data.nama);
					$("#outFrekHARI").val(data.frek);
					$("#outTanggalHARI").val(data.tanggal_req);
					$("#outHargaHARI").val(data.harga);
					$("#outRingHARI").val(data.ringkasan);
					$("#outKetaHARI").val(data.keterangan);
				} else {
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Maaf, Data tidak ditemukan",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
	}

				// Hari
				function reload_data_labor_HARI(id_pelayanan) {    
					var a = document.getElementById('cetak_semua_hari'); 
					a.href = "labor_HARI_All_print/" + id_pelayanan

						$('#tablelaborHARI').dataTable().fnClearTable();
						$('#tablelaborHARI').dataTable().fnDestroy();
						$('#tablelaborHARI').DataTable({
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
								"url": '<?php echo base_url('Labor/tampil_all_labor_hari'); ?>',
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
					
					function reload_total_labor_HARI(id_pelayanan) {
						$('#outTotalHargaHARI').dataTable().fnClearTable();
						$('#outTotalHargaHARI').dataTable().fnDestroy();
						$('#outTotalHargaHARI').DataTable({
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
								"url": '<?php echo base_url('Labor/tampil_total_labor'); ?>',
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

					// END
					

		function aksi_labor_hari(id_tindakan_labor,id_pelayanan){
			$.ajax({
				url : "<?= base_url(). 'Labor/getLaborById'?>",
				data:{
					tindakan:id_tindakan_labor,
					pelayanan:id_pelayanan,
				},
				type:'POST',
				dataType: 'json',
				success:function(data){
					if(data.status_dt == "found"){
						if(data.nama == " Darah Rutin "){
							// Darah Rutin
							
							$("#inNamaDARAHHARI").val(data.nama);
							$('#isiDARAHHARI').collapse('toggle');
							
							$('.data_mchc').addClass('collapse');
							$('#inTipeMasukMCHCHARI').change(function() {
								var selector = '.data_mchc_' + $(this).val();
								$('.data_mchc').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_mch').addClass('collapse');
							$('#inTipeMasukMCHHARI').change(function() {
								var selector = '.data_mch_' + $(this).val();
								$('.data_mch').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_mcv').addClass('collapse');
							$('#inTipeMasukMCVHARI').change(function() {
								var selector = '.data_mcv_' + $(this).val();
								$('.data_mcv').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_hema').addClass('collapse');
							$('#inTipeMasukHEMATOKRITHARI').change(function() {
								var selector = '.data_hema_' + $(this).val();
								$('.data_hema').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_hide').addClass('collapse');
							$('#inTipeMasukHBHARI').change(function() {
								var selector = '.data_hide_' + $(this).val();
								$('.data_hide').collapse('hide');
								$(selector).collapse('show');
							});
							$('#isiAGDHARI').collapse('hide');
							$('#isiLEDHARI').collapse('hide');
							$('#isiAPTTHARI').collapse('hide');
							$('#isiVDRLHARI').collapse('hide');
							$('#isiUREUMHARI').collapse('hide');
							$('#isiB20HARI').collapse('hide');
							$('#isiPTHARI').collapse('hide');
							$('#isiPTAPTTHARI').collapse('hide');
							$('#isiDENGUEHARI').collapse('hide');
							$('#isiAPTTHARI').collapse('hide');
							$('#isiTROPONINHARI').collapse('hide');
							$('#isiELEKTROLITHARI').collapse('hide');
							$('#isiGLOBULINHARI').collapse('hide');
							$('#isiCRPHARI').collapse('hide');
							$('#isiGOL-DARAHHARI').collapse('hide');
							$('#isiDARAHSAMARHARI').collapse('hide');
							$('#isiSALMONELLAHARI').collapse('hide');
							$('#isiNS1HARI').collapse('hide');
							$('#isiGULDARAHHARI').collapse('hide');
							$('#isiFESESHARI').collapse('hide');
							$('#isiALBUMINHARI').collapse('hide');
							$('#isiPROTEINHARI').collapse('hide');
							$('#isiSPUTUMBTAIIHARI').collapse('hide');
							$('#isiSPUTUMBTAIIIHARI').collapse('hide');
							$('#isiHBSABHARI').collapse('hide');
							$('#isiMALARIAHARI').collapse('hide');
							$('#isiSPERMAHARI').collapse('hide');
							$('#isiHBSAGHARI').collapse('hide');
							$('#isiSPUTUMBTAIHARI').collapse('hide');
							$('#isiURINEHARI').collapse('hide');
							$('#isiPLANOHARI').collapse('hide');
							$('#isiSGPTHARI').collapse('hide');
							$('#isiSGOTHARI').collapse('hide');
							$('#isiCREATININHARI').collapse('hide');
							$('#isiWIDALHARI').collapse('hide');
							$('#isiHBAHARI').collapse('hide');
							$('#isiURICHARI').collapse('hide');
							$('#isiLDLHARI').collapse('hide');
							$('#isiCHOHARI').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborDARAHHARI").val(data.id_tindakan_labor);
						}else if(data.nama == " GOL DARAH "){
								// GOL DARAH
								$("#inNamaGOLHARI").val(data.nama);
								$('#isiGOL-DARAHHARI').collapse('toggle');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiBLTHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiHBA').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$("#id_tindakan_laborGOLHARI").val(data.id_tindakan_labor);
							}else if(data.nama == "RHESUS"){
								// RHESUS
								$("#inNamaRHESUSHARI").val(data.nama);
								$('#isiRHESUSHARI').collapse('toggle');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiBLTHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$("#id_tindakan_laborRHESUSHARI").val(data.id_tindakan_labor);
							}else if(data.nama == "APTT"){
								// APTT
								$("#inNamaAPTTHARI").val(data.nama);
								$('#isiAPTTHARI').collapse('toggle');
								$('#isiBLTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborAPTTHARI").val(data.id_tindakan_labor);
							}else if(data.nama == " GULA DARAH "){
								// GULA DARAH
								$("#inNamaGULDARAHHARI").val(data.nama);
								$('#isiGULDARAHHARI').collapse('toggle');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiBLTHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborGULDARAHHARI").val(data.id_tindakan_labor);
							}else if(data.nama == "UREUM"){
								// UREUM
								$("#inNamaUREUMHARI").val(data.nama);
								$('#isiUREUMHARI').collapse('toggle');
								$('#isiLDLHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiBLTHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborUREUMHARI").val(data.id_tindakan_labor);
							}else if(data.nama == "CREATININ"){
								// CREATININ
								$("#inNamaCREATININHARI").val(data.nama);
								$('#isiCREATININHARI').collapse('toggle');
								$('.data_hide').addClass('collapse');
								$('#inTipeCREATININ').change(function() {
									var selector = '.data_hide_' + $(this).val();
									$('.data_hide').collapse('hide');
									$(selector).collapse('show');
								});
								$('#isiUREUMHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiBLTHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$("#id_tindakan_laborCREATININHARI").val(data.id_tindakan_labor);
							}else if(data.nama == "SGOT"){
								// SGOT
								$("#inNamaSGOTHARI").val(data.nama);
								$('#isiSGOTHARI').collapse('toggle');
								$('.data_sgot').addClass('collapse');
								$('#inTipeMasukSGOTHARI').change(function() {
									var selector = '.data_sgot_' + $(this).val();
									$('.data_sgot').collapse('hide');
									$(selector).collapse('show');
								});
								$('#isiCREATININHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiBLTHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiALHARIP').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$("#id_tindakan_laborSGOTHARI").val(data.id_tindakan_labor);
							}else if(data.nama == "SGPT"){
								// SGPT
								$("#inNamaSGPTHARI").val(data.nama);
								$('#isiSGPTHARI').collapse('toggle');
								$('#isiAGDHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiBLTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborSGPTHARI").val(data.id_tindakan_labor);
							}else if(data.nama == "ELEKTROLIT "){
								// ELEKTROLIT
								$("#inNamaELEKTROLITHARI").val(data.nama);
								$('#isiELEKTROLITHARI').collapse('toggle');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiBLTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$("#id_tindakan_laborELEKTROLITHARI").val(data.id_tindakan_labor);
							}else if(data.nama == " PROTEIN "){
								// PROTEIN
								$("#inNamaPROTEINHARI").val(data.nama);
								$('#isiPROTEINHARI').collapse('toggle');
								$('.data_protein').addClass('collapse');
								$('#inTipeMasukPROTEINHARI').change(function() {
									var selector = '.data_protein_' + $(this).val();
									$('.data_protein').collapse('hide');
									$(selector).collapse('show');
								});
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiBLTHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborPROTEINHARI").val(data.id_tindakan_labor);
							}else if(data.nama == " ALBUMIN "){
								// ALBUMIN
								$("#inNamaALBUMINHARI").val(data.nama);
								$('#isiALBUMINHARI').collapse('toggle');
								$('#isiPROTEINHARI').collapse('hide');
								$('.data_albu').addClass('collapse');
								$('#inTipeMasukALBUMINHARI').change(function() {
									var selector = '.data_albu_' + $(this).val();
									$('.data_albu').collapse('hide');
									$(selector).collapse('show');
								});
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiBLTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborALBUMINHARI").val(data.id_tindakan_labor);
							}else if(data.nama == " NS 1 "){
								// NS1
								$("#inNamaNS1HARI").val(data.nama);
								$('#isiNS1HARI').collapse('toggle');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiBLTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborNS1HARI").val(data.id_tindakan_labor);
							}else if(data.nama == " HBSAG "){
								// HBSAG
								$("#inNamaHBSAGHARI").val(data.nama);
								$('#isiHBSAGHARI').collapse('toggle');
								$('#isiNS1HARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiBLTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborHBSAGHARI").val(data.id_tindakan_labor);
							}else if(data.nama == " HBSAB "){
								// HBSAB
								$("#inNamaHBSABHARI").val(data.nama);
								$('#isiHBSABHARI').collapse('toggle');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborHBSABHARI").val(data.id_tindakan_labor);
							}else if(data.nama == "B20"){
								// B20
								$("#inNamaB20HARI").val(data.nama);
								$('#isiB20HARI').collapse('toggle');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborB20HARI").val(data.id_tindakan_labor);
							}else if(data.nama == " VDRL "){
								// VDRL
								$("#inNamaVDRLHARI").val(data.nama);
								$('#isiVDRLHARI').collapse('toggle');
								$('#isiB20HARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborVDRLHARI").val(data.id_tindakan_labor);
							}else if(data.nama == " SALMONELLA "){
								// SALMONELLA
								$("#inNamaSALMONELLAHARI").val(data.nama);
								$('#isiSALMONELLAHARI').collapse('toggle');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborSALMONELLAHARI").val(data.id_tindakan_labor);
							}else if(data.nama == "CRP"){
								// CRP
								$("#inNamaCRPHARI").val(data.nama);
								$('#isiCRPHARI').collapse('toggle');
								$('#isiFESESHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiTRIGLYSERIDEHARI').collapse('hide');
								$('#isiURICHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborCRPHARI").val(data.id_tindakan_labor);
							}else if(data.nama == "PT"){
								// PT
								$("#inNamaPTHARI").val(data.nama);
								$('#isiPTHARI').collapse('toggle');
								$('#isiCRPHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborPTHARI").val(data.id_tindakan_labor);	
							}else if(data.nama == "DENGUE"){
								// DENGUE
								$("#inNamaDENGUEHARI").val(data.nama);
								$('#isiDENGUEHARI').collapse('toggle');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborDENGUEHARI").val(data.id_tindakan_labor);		
							}else if(data.nama == " URINE "){
								// URINE
								$("#inNamaURINEBULAN").val(data.nama);
								$('#isiURINEBULAN').collapse('toggle');
								$('#isiFESESBULAN').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborURINEBULAN").val(data.id_tindakan_labor);
							}else if(data.nama == " FEACES "){
								// FESES
								$("#inNamaURINEBULAN").val(data.nama);
								$('#isiFESESBULAN').collapse('toggle');
								$('#isiURINEBULAN').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborFESESBULAN").val(data.id_tindakan_labor);
							}else if(data.nama == "PT/APTT"){
								// PT/APTT
								$("#inNamaPTAPTTHARI").val(data.nama);
								$('#isiPTAPTTHARI').collapse('toggle');
								$('#isiFESESBULAN').collapse('hide');
								$('#isiURINEBULAN').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborPTAPTTHARI").val(data.id_tindakan_labor);
							}else if(data.nama == " MALARIA "){
								// PT/APTT
								$("#inNamaMALARIAHARI").val(data.nama);
								$('#isiMALARIAHARI').collapse('toggle');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiFESESBULAN').collapse('hide');
								$('#isiURINEBULAN').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiDARAHSAMARHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborMALARIAHARI").val(data.id_tindakan_labor);
							}else if(data.nama == "Darah Samar"){
								// Darah Samar
								$("#inNamaDARAHSAMARHARI").val(data.nama);
								$('#isiDARAHSAMARHARI').collapse('toggle');
								$('#isiMALARIAHARI').collapse('hide');
								$('#isiPTAPTTHARI').collapse('hide');
								$('#isiFESESBULAN').collapse('hide');
								$('#isiURINEBULAN').collapse('hide');
								$('#isiDENGUEHARI').collapse('hide');
								$('#isiPTHARI').collapse('hide');
								$('#isiCRPHARI').collapse('hide');
								$('#isiFESESHARI').collapse('hide');
								$('#isiSPERMAHARI').collapse('hide');
								$('#isiURINEHARI').collapse('hide');
								$('#isiAGDHARI').collapse('hide');
								$('#isiSALMONELLAHARI').collapse('hide');
								$('#isiPLANOHARI').collapse('hide');
								$('#isiVDRLHARI').collapse('hide');
								$('#isiB20HARI').collapse('hide');
								$('#isiHBSABHARI').collapse('hide');
								$('#isiHBSAGHARI').collapse('hide');
								$('#isiNS1HARI').collapse('hide');
								$('#isiTROPONINHARI').collapse('hide');
								$('#isiWIDALHARI').collapse('hide');
								$('#isiGLOBULINHARI').collapse('hide');
								$('#isiALBUMINHARI').collapse('hide');
								$('#isiPROTEINHARI').collapse('hide');
								$('#isiSPUTUMBTAIIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIIHARI').collapse('hide');
								$('#isiSPUTUMBTAIHARI').collapse('hide');
								$('#isiELEKTROLITHARI').collapse('hide');
								$('#isiSGOTHARI').collapse('hide');
								$('#isiSGPTHARI').collapse('hide');
								$('#isiCREATININHARI').collapse('hide');
								$('#isiUREUMHARI').collapse('hide');
								$('#isiLDLHARI').collapse('hide');
								$('#isiHDLHARI').collapse('hide');
								$('#isiCHOHARI').collapse('hide');
								$('#isiHBAHARI').collapse('hide');
								$('#isiGULDARAHHARI').collapse('hide');
								$('#isiAPTTHARI').collapse('hide');
								$('#isiRHESUSHARI').collapse('hide');
								$('#isiLEDHARI').collapse('hide');
								$('#isiGOL-DARAHHARI').collapse('hide');
								$('#isiDARAHHARI').collapse('hide');
								$("#id_tindakan_laborDARAHSAMARHARI").val(data.id_tindakan_labor);
							}else{
								swal({   
									title: "DATA TIDAK DITEMUKAN",   
									text: "Silahkan periksa pilihan aksi Anda",
									type: "warning",   
									confirmButtonColor: "#3cb878",   
								});
							}
						}else{
							alert("data tidak ditemukan");
						}
					}
				});
}
// KeyUp Bayi Hari
	//HB HARI
			// KeyUP HB 1 Hari
			$('#inHB1HARI').keyup(function() {
				$('#notifinHB1HARI').html('');
				a = $('#inHB1HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB1HARI').html(html);
				}else if (a >= 15.2 && a <= 23.6) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB1HARI').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB1HARI').html(html);
				}
			});

			// KeyUP HB 2 - 6 Hari
			$('#inHB26HARI').keyup(function() {
				$('#notifinHB26HARI').html('');
				a = $('#inHB26HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB26HARI').html(html);
				}else if (a >= 15.0 && a <= 24.6) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB26HARI').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB26HARI').html(html);
				}
			});

			// KeyUP HB 7 - 23 Hari
			$('#inHB723HARI').keyup(function() {
				$('#notifinHB723HARI').html('');
				a = $('#inHB723HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB723HARI').html(html);
				}else if (a >= 12.7 && a <= 18.7) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB723HARI').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB723HARI').html(html);
				}
			});

			// KeyUP HB HARI 24 - 37 HARI
			$('#inHB2437HARI').keyup(function() {
				$('#notifinHB2437HARI').html('');
				a = $('#inHB2437HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB2437HARI').html(html);
				}else if (a >= 10.3 && a <= 17.9) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB2437HARI').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB2437HARI').html(html);
				}
			});

			// KeyUP HB 38 - 1 Tahun
			$('#inHB381HARI').keyup(function() {
				$('#notifinHB381HARI').html('');
				a = $('#inHB381HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB381HARI').html(html);
				}else if (a >= 9.0 && a <= 16.6) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB381HARI').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB381HARI').html(html);
				}
			});

	// END 

			// KeyUP LEUKOSIT
			$('#inLEUKOSITHARI').keyup(function() {
				$('#notifinLEUKOSITHARI').html('');
				a = $('#inLEUKOSITHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITHARI').html(html);
				}else if (a >= 5000 && a <= 10000) {
					html = '<b style="color:blue">LEUKOSIT NORMAL</b>';
					$('#notifinLEUKOSITHARI').html(html);
				} else{
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSITHARI').html(html);
				}
			});

			// KeyUP TROMBOSIT
			$('#inTROMBOSITHARI').keyup(function() {
				$('#notifinTROMBOSITHARI').html('');
				a = $('#inTROMBOSITHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTROMBOSITHARI').html(html);
				}else if (a >= 150000 && a <= 400000) {
					html = '<b style="color:blue">TROMBOSIT NORMAL</b>';
					$('#notifinTROMBOSITHARI').html(html);
				} else{
					html = '<b style="color:red">TROMBOSIT TIDAK NORMAL</b>';
					$('#notifinTROMBOSITHARI').html(html);
				}
			});

	//HEMATOKRIT
			// KeyUP HEMATOKRIT	UMUR 1 Hari		
			$('#inHEMATOKRIT1HARI').keyup(function() {
				$('#notifinHEMATOKRIT1HARI').html('');
				a = $('#inHEMATOKRIT1HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT1HARI').html(html);
				}else if (a >= 44 && a <= 72) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL </b>';
					$('#notifinHEMATOKRIT1HARI').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT1HARI').html(html);
				}
			});

			// KeyUP HEMATOKRIT	UMUR 1 - 6 Hari
			$('#inHEMATOKRIT16HARI').keyup(function() {
				$('#notifinHEMATOKRIT16HARI').html('');
				a = $('#inHEMATOKRIT16HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT16HARI').html(html);
				}else if (a >= 50 && a <= 82) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL </b>';
					$('#notifinHEMATOKRIT16HARI').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT16HARI').html(html);
				}
			});

			// KeyUP HEMATOKRIT	UMUR 7 - 23 HARI	
			$('#inHEMATOKRIT723HARI').keyup(function() {
				$('#notifinHEMATOKRIT723HARI').html('');
				a = $('#inHEMATOKRIT723HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT723HARI').html(html);
				}else if (a >= 42 && a <= 63) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL</b>';
					$('#notifinHEMATOKRIT723HARI').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT723HARI').html(html);
				}
			});

			// KeyUP HEMATOKRIT	UMUR 24 - 37 HARI	
			$('#inHEMATOKRIT2437HARI').keyup(function() {
				$('#notifinHEMATOKRIT2437HARI').html('');
				a = $('#inHEMATOKRIT2437HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT2437HARI').html(html);
				}else if (a >= 31 && a <= 59) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL</b>';
					$('#notifinHEMATOKRIT2437HARI').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT2437HARI').html(html);
				}
			});

	// End

			// KeyUP BAS			
			$('#inBASHARI').keyup(function() {
				$('#notifinBASHARI').html('');
				a = $('#inBASHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBASHARI').html(html);
				}else if (a >= 0 && a <= 1) {
					html = '<b style="color:blue">BAS NORMAL</b>';
					$('#notifinBASHARI').html(html);
				} else{
					html = '<b style="color:red">BAS TIDAK NORMAL</b>';
					$('#notifinBASHARI').html(html);
				}
			});

			// KeyUP EOS			
			$('#inEOSHARI').keyup(function() {
				$('#notifinEOSHARI').html('');
				a = $('#inEOSHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinEOSHARI').html(html);
				}else if (a >= 1 && a <= 5) {
					html = '<b style="color:blue">EOS NORMAL</b>';
					$('#notifinEOSHARI').html(html);
				} else{
					html = '<b style="color:red">EOS TIDAK NORMAL</b>';
					$('#notifinEOSHARI').html(html);
				}
			});

			// KeyUP MONO		
			$('#inMONOHARI').keyup(function() {
				$('#notifinMONOHARI').html('');
				a = $('#inMONOHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMONOHARI').html(html);
				}else if (a >= 1 && a <= 11) {
					html = '<b style="color:blue">MONO NORMAL</b>';
					$('#notifinMONOHARI').html(html);
				} else{
					html = '<b style="color:red">MONO TIDAK NORMAL</b>';
					$('#notifinMONOHARI').html(html);
				}
			});

			// KeyUP SEGMEN		
			$('#inSEGMENHARI').keyup(function() {
				$('#notifinSEGMENHARI').html('');
				a = $('#inSEGMENHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSEGMENHARI').html(html);
				}else if (a >= 17 && a <= 60) {
					html = '<b style="color:blue">SEGMEN NORMAL</b>';
					$('#notifinSEGMENHARI').html(html);
				} else{
					html = '<b style="color:red">SEGMEN TIDAK NORMAL</b>';
					$('#notifinSEGMENHARI').html(html);
				}
			});

			// KeyUP LYMPO		
			$('#inLYMPOHARI').keyup(function() {
				$('#notifinLYMPOHARI').html('');
				a = $('#inLYMPOHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLYMPOHARI').html(html);
				}else if (a >= 20 && a <= 40) {
					html = '<b style="color:blue">LYMPO NORMAL</b>';
					$('#notifinLYMPOHARI').html(html);
				} else{
					html = '<b style="color:red">LYMPO TIDAK NORMAL</b>';
					$('#notifinLYMPOHARI').html(html);
				}
			});

	// MCV
			// KeyUP MCV 1 Hari
			$('#inMCV1HARI').keyup(function() {
				$('#notifinMCV1HARI').html('');
				a = $('#inMCV1HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV1HARI').html(html);
				}else if (a >= 98 && a <= 122) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV1HARI').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV1HARI').html(html);
				}
			});

			// KeyUP MCV 2 - 6  HARI
			$('#inMCV26HARI').keyup(function() {
				$('#notifinMCV26HARI').html('');
				a = $('#inMCV26HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV26HARI').html(html);
				}else if (a >= 94 && a <= 150) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV26HARI').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV26HARI').html(html);
				}
			});

			// KeyUP MCV 7 - 23 HARI
			$('#inMCV723HARI').keyup(function() {
				$('#notifinMCV723HARI').html('');
				a = $('#inMCV723HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV723HARI').html(html);
				}else if (a >= 84 && a <= 128) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV723HARI').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV723HARI').html(html);
				}
			});

			// KeyUP MCV 24 - 37 HARI
			$('#inMCV2437HARI').keyup(function() {
				$('#notifinMCV2437HARI').html('');
				a = $('#inMCV2437HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV2437HARI').html(html);
				}else if (a >= 82 && a <= 126) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV2437HARI').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV2437HARI').html(html);
				}
			});

	//  End

	// MCH
			// KeyUP MCH UMUR 1 Hari
			$('#inMCH1HARI').keyup(function() {
				$('#notifinMCH1HARI').html('');
				a = $('#inMCH1HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH1HARI').html(html);
				}else if (a >= 33 && a <= 41) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH1HARI').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH1HARI').html(html);
				}
			});

			// KeyUP MCH UMUR 2 - 6 HARI
			$('#inMCH26HARI').keyup(function() {
				$('#notifinMCH26HARI').html('');
				a = $('#inMCH26HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH26HARI').html(html);
				}else if (a >= 29 && a <= 45) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH26HARI').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH26HARI').html(html);
				}
			});

			// KeyUP MCH UMUR 7 - 23 HARI
			$('#inMCH723HARI').keyup(function() {
				$('#notifinMCH723HARI').html('');
				a = $('#inMCH723HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH723HARI').html(html);
				}else if (a >= 26 && a <= 38) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH723HARI').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH723HARI').html(html);
				}
			});

	// End

	// MCHC
			// KeyUP MCHC UMUR 1 Hari
			$('#inMCHC1HARI').keyup(function() {
				$('#notifinMCHC1HARI').html('');
				a = $('#inMCHC1HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHC1HARI').html(html);
				}else if (a >= 31 && a <= 35) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHC1HARI').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHC1HARI').html(html);
				}
			});

			// KeyUP MCHC UMUR 2 - 6 Hari
			$('#inMCHC26HARI').keyup(function() {
				$('#notifinMCHC26HARI').html('');
				a = $('#inMCHC26HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHC26HARI').html(html);
				}else if (a >= 24 && a <= 36) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHC26HARI').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHC26HARI').html(html);
				}
			});

			// KeyUP MCHC UMUR 7 - 23 Hari
			$('#inMCHC723HARI').keyup(function() {
				$('#notifinMCHC723HARI').html('');
				a = $('#inMCHC723HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHC723HARI').html(html);
				}else if (a >= 25 && a <= 37) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHC723HARI').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHC723HARI').html(html);
				}
			});


	// End
			// KeyUP RDW-CV
			$('#inRDW-CVHARI').keyup(function() {
				$('#notifinRDW-CVHARI').html('');
				a = $('#inRDW-CVHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRDW-CVHARI').html(html);
				}else if (a >= 11.0 && a <= 16.0) {
					html = '<b style="color:blue">RDW-CV NORMAL</b>';
					$('#notifinRDW-CVHARI').html(html);
				} else{
					html = '<b style="color:red">RDW-CV TIDAK NORMAL</b>';
					$('#notifinRDW-CVHARI').html(html);
				}
			});

			// KeyUP RDW-SD
			$('#inRDW-SDHARI').keyup(function() {
				$('#notifinRDW-SDHARI').html('');
				a = $('#inRDW-SDHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRDW-SDHARI').html(html);
				}else if (a >= 35.0 && a <= 56.0) {
					html = '<b style="color:blue">RDW-SD NORMAL</b>';
					$('#notifinRDW-SDHARI').html(html);
				} else{
					html = '<b style="color:red">RDW-SD TIDAK NORMAL</b>';
					$('#notifinRDW-SDHARI').html(html);
				}
			});

			// KeyUP LED
			$('#inLEDHARI').keyup(function() {
				$('#notifinLEDHARI').html('');
				a = $('#inLEDHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEDHARI').html(html);
				}else if (a >= 0 && a <= 10) {
					html = '<b style="color:blue">LED NORMAL PRIA </b>';
					$('#notifinLEDHARI').html(html);
				}else if (a >= 0 && a <= 15) {
					html = '<b style="color:blue">LED NORMAL WANITA </b>';
					$('#notifinLEDHARI').html(html);
				} else{
					html = '<b style="color:red">LED TIDAK NORMAL</b>';
					$('#notifinLEDHARI').html(html);
				}
			});

			// Keyup PH
			$('#inPHHARI').keyup(function() {
				$('#notifinPHHARI').html('');
				a = $('#inPHHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPHHARI').html(html);
				}else if (a >= 7.35 && a <= 7.45) {
					html = '<b style="color:blue">NILAI PH NORMAL</b>';
					$('#notifinPHHARI').html(html);
				} else{
					html = '<b style="color:red">NILAI PH TIDAK NORMAL</b>';
					$('#notifinPHHARI').html(html);
				}
			});

			// Keyup PCO2
			$('#inPCO2HARI').keyup(function() {
				$('#notifinPCO2HARI').html('');
				a = $('#inPCO2HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPCO2HARI').html(html);
				}else if (a >= 41 && a <= 51) {
					html = '<b style="color:blue">NILAI PCO2 NORMAL</b>';
					$('#notifinPCO2HARI').html(html);
				} else{
					html = '<b style="color:red">NILAI PCO2 TIDAK NORMAL</b>';
					$('#notifinPCO2HARI').html(html);
				}
			});

			// Keyup PO2
			$('#inPO2HARI').keyup(function() {
				$('#notifinPO2HARI').html('');
				a = $('#inPO2HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPO2HARI').html(html);
				}else if (a >= 80 && a <= 100) {
					html = '<b style="color:blue">NILAI PO2 NORMAL</b>';
					$('#notifinPO2HARI').html(html);
				} else{
					html = '<b style="color:red">NILAI PO2 TIDAK NORMAL</b>';
					$('#notifinPO2HARI').html(html);
				}
			});

				// Keyup HCO3
				$('#inHCO3HARI').keyup(function() {
					$('#notifinHCO3HARI').html('');
					a = $('#inHCO3HARI').val();
					if (a == "") {
						html = '<b style="color:red">Field tidak boleh kosong</b>';
						$('#notifinHCO3HARI').html(html);
					}else if (a >= 24 && a <= 28) {
						html = '<b style="color:blue">NILAI HCO3 NORMAL</b>';
						$('#notifinHCO3HARI').html(html);
					} else{
						html = '<b style="color:red">NILAI HCO3 TIDAK NORMAL</b>';
						$('#notifinHCO3HARI').html(html);
					}
				});

			// Keyup BE
			$('#inBEHARI').keyup(function() {
				$('#notifinBEHARI').html('');
				a = $('#inBEHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBEHARI').html(html);
				}
			});

			// Keyup SO2
			$('#inSO2HARI').keyup(function() {
				$('#notifinSO2HARI').html('');
				a = $('#inSO2HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSO2HARI').html(html);
				}else if (a >= 93 && a <= 99) {
					html = '<b style="color:blue">NILAI SO2 NORMAL</b>';
					$('#notifinSO2HARI').html(html);
				} else{
					html = '<b style="color:red">NILAI SO2 TIDAK NORMAL</b>';
					$('#notifinSO2HARI').html(html);
				}
			});

			// Keyup SUHU
			$('#inSUHUHARI').keyup(function() {
				$('#notifinSUHUHARI').html('');
				a = $('#inSUHUHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSUHUHARI').html(html);
				}else if (a >= 36.8 && a <= 37.8) {
					html = '<b style="color:blue">NILAI SUHU NORMAL</b>';
					$('#notifinSUHUHARI').html(html);
				} else{
					html = '<b style="color:red">NILAI SUHU TIDAK NORMAL</b>';
					$('#notifinSUHUHARI').html(html);
				}
			});

			// Keyup OKSIGEN
			$('#inOKSIGENHARI').keyup(function() {
				$('#notifinOKSIGENHARI').html('');
				a = $('#inOKSIGENHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinOKSIGENHARI').html(html);
				}else if (a == 12) {
					html = '<b style="color:blue">NILAI OKSIGEN NORMAL</b>';
					$('#notifinOKSIGENHARI').html(html);
				} else{
					html = '<b style="color:red">NILAI OKSIGEN TIDAK NORMAL</b>';
					$('#notifinOKSIGENHARI').html(html);
				}
			});

			// Keyup SATURASI
			$('#inSATURASIHARI').keyup(function() {
				$('#notifinSATURASIHARI').html('');
				a = $('#inSATURASIHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSATURASIHARI').html(html);
				}else if (a >= 90) {
					html = '<b style="color:blue">NILAI SATURASI NORMAL</b>';
					$('#notifinSATURASIHARI').html(html);
				} else{
					html = '<b style="color:red">NILAI SATURASI TIDAK NORMAL</b>';
					$('#notifinSATURASIHARI').html(html);
				}
			});
			
			// KeyUP RHESUS HARI
			$('#inRHESUSHARI').keyup(function() {
				$('#notifinRHESUSHARI').html('');
				a = $('#inRHESUSHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRHESUSHARI').html(html);
				}
			});

			// KeyUP GOL-DARAH HARI
			$('#inGOLDARAHHARI').keyup(function() {
				$('#notifinGOLDARAHHARI').html('');
				a = $('#inGOLDARAHHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinGOLDARAHHARI').html(html);
				}
			});


			// KeyUP BLT HARI
			$('#inBLTHARI').keyup(function() {
				$('#notifinBLTHARI').html('');
				a = $('#inBLTHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBLTHARI').html(html);
				}else if( a >= 2 && a <= 6){
					html = '<b style="color:blue">BLT NORMAL</b>';
					$('#notifinBLTHARI').html(html);
				}else{
					html = '<b style="color:red">BLT TIDAK NORMAL</b>';
					$('#notifinBLTHARI').html(html);
				}
			});

			// KeyUP CLT HARI
			$('#inCLTHARI').keyup(function() {
				$('#notifinCLTHARI').html('');
				a = $('#inCLTHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCLT').html(html);
				}else if( a >= 2 && a <= 6){
					html = '<b style="color:blue">CLT NORMAL</b>';
					$('#notifinCLTHARI').html(html);
				}else{
					html = '<b style="color:red">CLT TIDAK NORMAL</b>';
					$('#notifinCLTHARI').html(html);
				}
			});

			// KeyUP APTT
			$('#inAPTTHARI').keyup(function() {
				$('#notifinAPTTHARI').html('');
				a = $('#inAPTTHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinAPTTHARI').html(html);
				}else if( a >= 25 && a <= 40){
					html = '<b style="color:blue">APTT NORMAL</b>';
					$('#notifinAPTTHARI').html(html);
				}else{
					html = '<b style="color:red">APTT TIDAK NORMAL</b>';
					$('#notifinAPTTHARI').html(html);
				}
			});

			
			// keyUp INR PT/APTT
			$('#inINRPTAPTTHARI').keyup(function() {
				$('#notifinINRPTAPTTHARI').html('');
				a = $('#inINRPTAPTTHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinINRPTAPTTHARI').html(html);
				}else if( a >= 0.7 && a <= 1.3){
					html = '<b style="color:blue">INR NORMAL</b>';
					$('#notifinINRPTAPTTHARI').html(html);
				}else{
					html = '<b style="color:red">INR TIDAK NORMAL</b>';
					$('#notifinINRPTAPTTHARI').html(html);
				}
			});
			// End

			// keyUp PT
			$('#inPTHARI').keyup(function() {
				$('#notifinPTHARI').html('');
				a = $('#inPTHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPTHARI').html(html);
				}else if( a >= 11 && a <= 16){
					html = '<b style="color:blue">PT NORMAL</b>';
					$('#notifinPTHARI').html(html);
				}else{
					html = '<b style="color:red">PT TIDAK NORMAL</b>';
					$('#notifinPTHARI').html(html);
				}
			});
			// End

			// keyUp PT/APTT
			$('#inPTAPTTHARI').keyup(function() {
				$('#notifinPTAPTTHARI').html('');
				a = $('#inPTAPTTHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPTAPTTHARI').html(html);
				}else if( a >= 11 && a <= 16){
					html = '<b style="color:blue">PT NORMAL</b>';
					$('#notifinPTAPTTHARI').html(html);
				}else{
					html = '<b style="color:red">PT TIDAK NORMAL</b>';
					$('#notifinPTAPTTHARI').html(html);
				}
			});
			// End

			// KeyUP GULDARAHPREMATURE HARI
			$('#inGULDARAHPREMATUREHARI').keyup(function() {
				$('#notifinGULDARAHPREMATUREHARI').html('');
				a = $('#inGULDARAHPREMATUREHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinGULDARAHPREMATUREHARI').html(html);
				}else if( a >= 20 && a <= 60){
					html = '<b style="color:blue">GULA DARAH NORMAL</b>';
					$('#notifinGULDARAHPREMATUREHARI').html(html);
				}else{
					html = '<b style="color:red">GULA DARAH TIDAK NORMAL</b>';
					$('#notifinGULDARAHPREMATUREHARI').html(html);
				}
			});

			// KeyUP GULDARAHBAYI HARI
			$('#inGULDARAHBAYIHARI').keyup(function() {
				$('#notifinGULDARAHBAYIHARI').html('');
				a = $('#inGULDARAHBAYIHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinGULDARAHBAYIHARI').html(html);
				}else if( a >= 54 && a <= 103){
					html = '<b style="color:blue">GULA DARAH NORMAL</b>';
					$('#notifinGULDARAHBAYIHARI').html(html);
				}else{
					html = '<b style="color:red">GULA DARAH TIDAK NORMAL</b>';
					$('#notifinGULDARAHBAYIHARI').html(html);
				}
			});

			// KeyUP HBA
			$('#inHBAHARI').keyup(function() {
				$('#notifinHBAHARI').html('');
				a = $('#inHBAHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBAHARI').html(html);
				}else if( a >= 4 && a <= 5.6){
					html = '<b style="color:blue">HBA1C NORMAL</b>';
					$('#notifinHBAHARI').html(html);
				}else{
					html = '<b style="color:red">HBA1C TIDAK NORMAL</b>';
					$('#notifinHBAHARI').html(html);
				}
			});

			// KeyUP URIC
			$('#inURICHARI').keyup(function() {
				$('#notifinURICHARI').html('');
				a = $('#inURICHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinURICHARI').html(html);
				}else if( a == 2.0){
					html = '<b style="color:blue">URIC ACID NORMAL</b>';
					$('#notifinURICHARI').html(html);
				}else{
					html = '<b style="color:red">URIC ACID TIDAK NORMAL</b>';
					$('#notifinURICHARI').html(html);
				}
			});
			
			// KeyUP TRIGLYSERIDE
			$('#inTRIGLYSERIDEHARI').keyup(function() {
				$('#notifinTRIGLYSERIDEHARI').html('');
				a = $('#inTRIGLYSERIDEHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTRIGLYSERIDEHARI').html(html);
				}else if( a >= 60 && a <= 150){
					html = '<b style="color:blue">TRIGLISERIDA NORMAL</b>';
					$('#notifinTRIGLYSERIDEHARI').html(html);
				}else{
					html = '<b style="color:red">TRIGLISERIDA TIDAK NORMAL</b>';
					$('#notifinTRIGLYSERIDEHARI').html(html);
				}
			});

			// KeyUP CHO
			$('#inCHOHARI').keyup(function() {
				$('#notifinCHOHARI').html('');
				a = $('#inCHOHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCHOHARI').html(html);
				}else if( a >= 120 && a <= 200){
					html = '<b style="color:blue">CHO NORMAL</b>';
					$('#notifinCHOHARI').html(html);
				}else{
					html = '<b style="color:red">CHO TIDAK NORMAL</b>';
					$('#notifinCHOHARI').html(html);
				}
			});

			// KeyUP HDL
			$('#inHDLHARI').keyup(function() {
				$('#notifinHDLHARI').html('');
				a = $('#inHDLHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHDLHARI').html(html);
				}else if( a >= 35 && a <= 60){
					html = '<b style="color:blue">HDL NORMAL</b>';
					$('#notifinHDLHARI').html(html);
				}else{
					html = '<b style="color:red">HDL TIDAK NORMAL</b>';
					$('#notifinHDLHARI').html(html);
				}
			});

			// KeyUP LDL
			$('#inLDLHARI').keyup(function() {
				$('#notifinLDLHARI').html('');
				a = $('#inLDLHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLDLHARI').html(html);
				}else if( a < 150){
					html = '<b style="color:blue">LDL NORMAL</b>';
					$('#notifinLDLHARI').html(html);
				}else{
					html = '<b style="color:red">LDL TIDAK NORMAL</b>';
					$('#notifinLDLHARI').html(html);
				}
			});

			// KeyUP UREUM
			$('#inUREUMHARI').keyup(function() {
				$('#notifinUREUMHARI').html('');
				a = $('#inUREUMHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinUREUMHARI').html(html);
				}else if( a >= 10 && a <= 50){
					html = '<b style="color:blue">UREUM NORMAL</b>';
					$('#notifinUREUMHARI').html(html);
				}else{
					html = '<b style="color:red">UREUM TIDAK NORMAL</b>';
					$('#notifinUREUMHARI').html(html);
				}
			});

			// KeyUP CREATININ
			$('#inCREATININHARI').keyup(function() {
				$('#notifinCREATININHARI').html('');
				a = $('#inCREATININHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCREATININHARI').html(html);
				}else if (a >= 0.2 && a <= 0.4) {
					html = '<b style="color:blue">CREATININ NORMAL</b>';
					$('#notifinCREATININHARI').html(html);
				} else{
					html = '<b style="color:red">CREATININ TIDAK NORMAL</b>';
					$('#notifinCREATININHARI').html(html);
				}
			});
			
			// KeyUP SGOT 0 - 10 Hari
			$('#inSGOT010HARI').keyup(function() {
				$('#notifinSGOT010HARI').html('');
				a = $('#inSGOT010HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGOT010HARI').html(html);
				}else if( a >= 47 && a <= 150){
					html = '<b style="color:blue">SGOT NORMAL </b>';
					$('#notifinSGOT010HARI').html(html);
				}else{
					html = '<b style="color:red">SGOT TIDAK NORMAL</b>';
					$('#notifinSGOT010HARI').html(html);
				}
			});

			// KeyUP SGOT 10 Hari - 24 Bulan
			$('#inSGOT1024HARI').keyup(function() {
				$('#notifinSGOT1024HARI').html('');
				a = $('#inSGOT1024HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGOT1024HARI').html(html);
				}else if( a >= 9 && a <= 80){
					html = '<b style="color:blue">SGOT NORMAL </b>';
					$('#notifinSGOT1024HARI').html(html);
				}else{
					html = '<b style="color:red">SGOT TIDAK NORMAL</b>';
					$('#notifinSGOT1024HARI').html(html);
				}
			});

			// KeyUP SGOT 24 Bulan - 60 Tahun
			$('#inSGOT2460HARI').keyup(function() {
				$('#notifinSGOT2460HARI').html('');
				a = $('#inSGOT2460HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGOT2460HARI').html(html);
				}else if( a >= 13 && a <= 35){
					html = '<b style="color:blue">SGOT NORMAL </b>';
					$('#notifinSGOT2460HARI').html(html);
				}else if( a >= 15 && a <= 40){
					html = '<b style="color:blue">SGOT NORMAL</b>';
					$('#notifinSGOT2460HARI').html(html);
				}else{
					html = '<b style="color:red">SGOT TIDAK NORMAL</b>';
					$('#notifinSGOT2460HARI').html(html);
				}
			});

			// KeyUP SGPT
			$('#inSGPTHARI').keyup(function() {
				$('#notifinSGPTHARI').html('');
				a = $('#inSGPTHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGPTHARI').html(html);
				}else if( a >= 13 && a <= 45){
					html = '<b style="color:blue">SGPT NORMAL </b>';
					$('#notifinSGPTHARI').html(html);
				}else{
					html = '<b style="color:red">SGPT TIDAK NORMAL</b>';
					$('#notifinSGPTHARI').html(html);
				}
			});
			// End

			// KeyUP NA
			$('#inNAHARI').keyup(function() {
				$('#notifinNAHARI').html('');
				a = $('#inNAHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNAHARI').html(html);
				}else if( a >= 128 && a <= 138){
					html = '<b style="color:blue">NA NORMAL</b>';
					$('#notifinNAHARI').html(html);
				}else{
					html = '<b style="color:red">NA TIDAK NORMAL</b>';
					$('#notifinNAHARI').html(html);
				}
			});

			//KeyUp K
			$('#inKHARI').keyup(function() {
				$('#notifinKHARI').html('');
				a = $('#inKHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKHARI').html(html);
				}else if( a >= 3.9 && a <= 4.9){
					html = '<b style="color:blue">K NORMAL</b>';
					$('#notifinKHARI').html(html);
				}else{
					html = '<b style="color:red">K TIDAK NORMAL</b>';
					$('#notifinKHARI').html(html);
				}
			});

			$('#inCLHARI').keyup(function() {
				$('#notifinCLHARI').html('');
				a = $('#inCLHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCLHARI').html(html);
				}else if( a >= 88 && a <= 100){
					html = '<b style="color:blue">CL NORMAL</b>';
					$('#notifinCLHARI').html(html);
				}else{
					html = '<b style="color:red">CL TIDAK NORMAL</b>';
					$('#notifinCLHARI').html(html);
				}
			});

			//Ca
			$('#inCaHARI').keyup(function() {
				$('#notifinCaHARI').html('');
				a = $('#inCaHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCaHARI').html(html);
				}else if( a >= 0.99 && a <= 1.29){
					html = '<b style="color:blue">Ca NORMAL</b>';
					$('#notifinCaHARI').html(html);
				}else{
					html = '<b style="color:red">Ca TIDAK NORMAL</b>';
					$('#notifinCaHARI').html(html);
				}
			});
			// End

	// PROTEIN
			// keyUp PROTEIN PREMATUR
			$('#inPROTEINPREMATURHARI').keyup(function() {
				$('#notifinPROTEINPREMATURHARI').html('');
				a = $('#inPROTEINPREMATURHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEINPREMATURHARI').html(html);
				}else if( a >= 3.6 && a <= 6.0){
					html = '<b style="color:blue">PROTEIN  NORMAL</b>';
					$('#notifinPROTEINPREMATURHARI').html(html);
				}else{
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEINPREMATURHARI').html(html);
				}
			});
			// End

			// keyUp PROTEIN 0-6 HARI
			$('#inPROTEIN06HARI').keyup(function() {
				$('#notifinPROTEIN06HARI').html('');
				a = $('#inPROTEIN06HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEIN06HARI').html(html);
				}else if( a >= 4.6 && a <= 7.0){
					html = '<b style="color:blue">PROTEIN  NORMAL</b>';
					$('#notifinPROTEIN06HARI').html(html);
				}else{
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEIN06HARI').html(html);
				}
			});
			// End

			// keyUp PROTEIN 1 MINGGU
			$('#inPROTEIN1HARI').keyup(function() {
				$('#notifinPROTEIN1HARI').html('');
				a = $('#inPROTEIN1HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEIN1HARI').html(html);
				}else if( a >= 4.4 && a <= 7.6){
					html = '<b style="color:blue">PROTEIN  NORMAL</b>';
					$('#notifinPROTEIN1HARI').html(html);
				}else{
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEIN1HARI').html(html);
				}
			});
			// End

			// keyUp PROTEIN 7 BULAN - 1 TAHUN 
			$('#inPROTEIN71HARI').keyup(function() {
				$('#notifinPROTEIN71HARI').html('');
				a = $('#inPROTEIN71HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEIN71HARI').html(html);
				}else if( a >= 5.1 && a <= 7.3){
					html = '<b style="color:blue">PROTEIN  NORMAL</b>';
					$('#notifinPROTEIN71HARI').html(html);
				}else{
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEIN71HARI').html(html);
				}
			});
			// End
	// END

	// ALBUMIN
			// keyUp ALBUMIN 0 - 4 HARI
			$('#inALBUMIN04HARI').keyup(function() {
				$('#notifinALBUMIN04HARI').html('');
				a = $('#inALBUMIN04HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinALBUMIN04HARI').html(html);
				}else if( a >= 2.8 && a <= 4.4){
					html = '<b style="color:blue">ALBUMIN  NORMAL</b>';
					$('#notifinALBUMIN04HARI').html(html);
				}else{
					html = '<b style="color:red">ALBUMIN TIDAK NORMAL</b>';
					$('#notifinALBUMIN04HARI').html(html);
				}
			});
			// End

			// keyUp ALBUMIN 4 HARI - 14 TAHUN
			$('#inALBUMIN414HARI').keyup(function() {
				$('#notifinALBUMIN414HARI').html('');
				a = $('#inALBUMIN414HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinALBUMIN414HARI').html(html);
				}else if( a >= 3.8 && a <= 5.4){
					html = '<b style="color:blue">ALBUMIN  NORMAL</b>';
					$('#notifinALBUMIN414HARI').html(html);
				}else{
					html = '<b style="color:red">ALBUMIN TIDAK NORMAL</b>';
					$('#notifinALBUMIN414HARI').html(html);
				}
			});
			// End

	// END

			// keyUp PROTEIN 
			$('#inPROTEINGLOBULINHARI').keyup(function() {
				$('#notifinPROTEINGLOBULINHARI').html('');
				a = $('#inPROTEINGLOBULINHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEINGLOBULINHARI').html(html);
				}else if( a >= 6.4 && a <= 8.3){
					html = '<b style="color:blue">PROTEIN NORMAL</b>';
					$('#notifinPROTEINGLOBULINHARI').html(html);
				}else{
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEINGLOBULINHARI').html(html);
				}
			});
			// End

			// keyUp MALARIA
			$('#inMALARIAHARI').keyup(function() {
				$('#notifinMALARIAHARI').html('');
				a = $('#inMALARIAHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMALARIAHARI').html(html);
				}
			});
			// End

			// keyUp WIDAL
			$('#inWIDALHARI').keyup(function() {
				$('#notifinWIDALHARI').html('');
				a = $('#inWIDALHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinWIDALHARI').html(html);
				}
			});
			// End

			// keyUp TROPONIN
			$('#inTROPONINHARI').keyup(function() {
				$('#notifinTROPONINHARI').html('');
				a = $('#inTROPONINHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTROPONINHARI').html(html);
				}
			});
			// End
			
			// keyUp NS1
			$('#inNS1HARI').keyup(function() {
				$('#notifinNS1HARI').html('');
				a = $('#inNS1HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNS1HARI').html(html);
				}
			});
			// End

			// keyUp HBSAG
			$('#inHBSAGHARI').keyup(function() {
				$('#notifinHBSAGHARI').html('');
				a = $('#inHBSAGHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBSAGHARI').html(html);
				}
			});
			// End
			
			// keyUp HBSAB
			$('#inHBSABHARI').keyup(function() {
				$('#notifinHBSABHARI').html('');
				a = $('#inHBSABHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBSABHARI').html(html);
				}
			});
			// End

			// keyUp B20
			$('#inB20HARI').keyup(function() {
				$('#notifinB20HARI').html('');
				a = $('#inB20HARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinB20HARI').html(html);
				}
			});
			// End

			// keyUp VDRL
			$('#inVDRLHARI').keyup(function() {
				$('#notifinVDRLHARI').html('');
				a = $('#inVDRLHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinVDRLHARI').html(html);
				}
			});
			// End

			// keyUp PLANO
			$('#inPLANOHARI').keyup(function() {
				$('#notifinPLANOHARI').html('');
				a = $('#inPLANOHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPLANOHARI').html(html);
				}
			});
			// End

			// keyUp SALMONELLA
			$('#inSALMONELLAHARI').keyup(function() {
				$('#notifinSALMONELLAHARI').html('');
				a = $('#inSALMONELLAHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSALMONELLAHARI').html(html);
				}
			});
			// End

			// keyUp DENGUE
			$('#inDENGUEHARI').keyup(function() {
				$('#notifinDENGUEHARI').html('');
				a = $('#inDENGUEHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinDENGUEHARI').html(html);
				}
			});
			// End

			// keyUp WARNA
			$('#inWARNAHARI').keyup(function() {
				$('#notifinWARNAHARI').html('');
				a = $('#inWARNAHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinWARNAHARI').html(html);
				}
			});
			// End

			// keyUp KEJERNIHAN
			$('#inKEJERNIHANHARI').keyup(function() {
				$('#notifinKEJERNIHANHARI').html('');
				a = $('#inKEJERNIHANHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKEJERNIHANHARI').html(html);
				}
			});
			// End

			// keyUp ERITROSIT
			$('#inERITROSITURINEHARI').keyup(function() {
				$('#notifinERITROSITURINEHARI').html('');
				a = $('#inERITROSITURINEHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITURINEHARI').html(html);
				}else if( a <= 1){
					html = '<b style="color:blue">ERITROSIT NORMAL</b>';
					$('#notifinERITROSITURINEHARI').html(html);
				}else{
					html = '<b style="color:red">ERITROSIT TIDAK NORMAL</b>';
					$('#notifinERITROSITURINEHARI').html(html);
				}
			});
			// End

			// keyUp LEUKOSIT
			$('#inLEUKOSITURINEHARI').keyup(function() {
				$('#notifinLEUKOSITURINEHARI').html('');
				a = $('#inLEUKOSITURINEHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITURINEHARI').html(html);
				}else if( a <= 6){
					html = '<b style="color:blue">LEUKOSIT NORMAL</b>';
					$('#notifinLEUKOSITURINEHARI').html(html);
				}else{
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSITURINEHARI').html(html);
				}
			});
			// End

			// keyUp SEL EPITEL
			$('#inSELHARI').keyup(function() {
				$('#notifinSELHARI').html('');
				a = $('#inSELHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSELHARI').html(html);
				}
			});
			// End

			// keyUp SILINDER
			$('#inSILINDERHARI').keyup(function() {
				$('#notifinSILINDERHARI').html('');
				a = $('#inSILINDERHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSILINDERHARI').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">SILINDER NORMAL</b>';
					$('#notifinSILINDERHARI').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:blue">SILINDER TIDAK NORMAL</b>';
					$('#notifinSILINDERHARI').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinSILINDERHARI').html(html);
				}
			});
			// End

			// keyUp KRISTAL
			$('#inKRISTALHARI').keyup(function() {
				$('#notifinKRISTALHARI').html('');
				a = $('#inKRISTALHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKRISTALHARI').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">KRISTAL NORMAL</b>';
					$('#notifinKRISTALHARI').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">KRISTAL TIDAK NORMAL</b>';
					$('#notifinKRISTALHARI').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinKRISTALHARI').html(html);
				}
			});
			// End

			// keyUp BAKTERI
			$('#inBAKTERIHARI').keyup(function() {
				$('#notifinBAKTERIHARI').html('');
				a = $('#inBAKTERIHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAKTERIHARI').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">BAKTERI NORMAL</b>';
					$('#notifinBAKTERIHARI').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">BAKTERI TIDAK NORMAL</b>';
					$('#notifinBAKTERIHARI').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinBAKTERIHARI').html(html);
				}
			});
			// End

			// keyUp JAMUR
			$('#inJAMURHARI').keyup(function() {
				$('#notifinJAMURHARI').html('');
				a = $('#inJAMURHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinJAMURHARI').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">JAMUR NORMAL</b>';
					$('#notifinJAMURHARI').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">JAMUR TIDAK NORMAL</b>';
					$('#notifinJAMURHARI').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinJAMURHARI').html(html);
				}
			});
			// End

			// keyUp ERIROSITKIMIA
			$('#inERITROSITKIMIAHARI').keyup(function() {
				$('#notifinERITROSITKIMIAHARI').html('');
				a = $('#inERITROSITKIMIAHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITKIMIAHARI').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">ERITROSIT NORMAL</b>';
					$('#notifinERITROSITKIMIAHARI').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">ERITROSIT TIDAK NORMAL</b>';
					$('#notifinERITROSITKIMIAHARI').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinERITROSITKIMIAHARI').html(html);
				}
			});
			// End

			// keyUp GLUKOSA
			$('#inGLUKOSAHARI').keyup(function() {
				$('#notifinGLUKOSAHARI').html('');
				a = $('#inGLUKOSAHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinGLUKOSAHARI').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">GLUKOSA NORMAL</b>';
					$('#notifinGLUKOSAHARI').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">GLUKOSA TIDAK NORMAL</b>';
					$('#notifinGLUKOSAHARI').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinGLUKOSAHARI').html(html);
				}
			});
			// End

			// keyUp PROTEINKIMIA
			$('#inPROTEINKIMIAHARI').keyup(function() {
				$('#notifinPROTEINKIMIAHARI').html('');
				a = $('#inPROTEINKIMIAHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEINKIMIAHARI').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">PROTEIN NORMAL</b>';
					$('#notifinPROTEINKIMIAHARI').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEINKIMIAHARI').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinPROTEINKIMIAHARI').html(html);
				}
			});
			// End

			// keyUp BILIRUBIN
			$('#inBILIRUBINHARI').keyup(function() {
				$('#notifinBILIRUBINHARI').html('');
				a = $('#inBILIRUBINHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBILIRUBINHARI').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">BILIRUBIN NORMAL</b>';
					$('#notifinBILIRUBINHARI').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">BILIRUBIN TIDAK NORMAL</b>';
					$('#notifinBILIRUBINHARI').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinBILIRUBINHARI').html(html);
				}
			});
			// End


			// keyUp PH
			$('#inPHKIMIAHARI').keyup(function() {
				$('#notifinPHKIMIAHARI').html('');
				a = $('#inPHKIMIAHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPHKIMIAHARI').html(html);
				}else if( a >= 2 && a <= 8){
					html = '<b style="color:blue">PH NORMAL</b>';
					$('#notifinPHKIMIAHARI').html(html);
				}else{
					html = '<b style="color:red">PH TIDAK NORMAL</b>';
					$('#notifinPHKIMIAHARI').html(html);
				}
			});
			// End

			// keyUp BERAT
			$('#inBERATHARI').keyup(function() {
				$('#notifinBERATHARI').html('');
				a = $('#inBERATHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBERATHARI').html(html);
				}else if( a >= 1003 && a <= 1029){
					html = '<b style="color:blue">BERAT JENIS NORMAL</b>';
					$('#notifinBERATHARI').html(html);
				}else{
					html = '<b style="color:red">BERAT JENIS TIDAK NORMAL</b>';
					$('#notifinBERATHARI').html(html);
				}
			});
			// End

			// keyUp KETON
			$('#inKETONHARI').keyup(function() {
				$('#notifinKETONHARI').html('');
				a = $('#inKETONHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKETONHARI').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">KETON NORMAL</b>';
					$('#notifinKETONHARI').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">KETON TIDAK NORMAL</b>';
					$('#notifinKETONHARI').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinKETONHARI').html(html);
				}
			});
			// End

			// keyUp NITRIT
			$('#inNITRITHARI').keyup(function() {
				$('#notifinNITRITHARI').html('');
				a = $('#inNITRITHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNITRITHARI').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">NITRIT NORMAL</b>';
					$('#notifinNITRITHARI').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">NITRIT TIDAK NORMAL</b>';
					$('#notifinNITRITHARI').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinNITRITHARI').html(html);
				}
			});
			// End

			// keyUp LEUKOSITKIMIA
			$('#inLEUKOSITKIMIAHARI').keyup(function() {
				$('#notifinLEUKOSITKIMIAHARI').html('');
				a = $('#inLEUKOSITKIMIAHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITKIMIAHARI').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">LEUKOSITNORMAL</b>';
					$('#notifinLEUKOSITKIMIAHARI').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSITKIMIAHARI').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinLEUKOSITKIMIAHARI').html(html);
				}
			});
			// End

			// keyUp UROBILINOGEN
			$('#inUROBILINOGENHARI').keyup(function() {
				$('#notifinUROBILINOGENHARI').html('');
				a = $('#inUROBILINOGENHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinUROBILINOGENHARI').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">UROBILINOGEN NORMAL</b>';
					$('#notifinUROBILINOGENHARI').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">UROBILINOGEN TIDAK NORMAL</b>';
					$('#notifinUROBILINOGENHARI').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinUROBILINOGENHARI').html(html);
				}
			});
			// End
			
			// keyUp ANALISA SPERMA
			$('#inSPERMAHARI').keyup(function() {
				$('#notifinSPERMAHARI').html('');
				a = $('#inSPERMAHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSPERMAHARI').html(html);
				}
			});
			// End

			// keyUp DARAH FESES
			$('#inDARAHFESESHARI').keyup(function() {
				$('#notifinDARAHFESESHARI').html('');
				a = $('#inDARAHFESESHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinDARAHFESESHARI').html(html);
				}
			});
			// End

			// keyUp LENDIR
			$('#inLENDIRHARI').keyup(function() {
				$('#notifinLENDIRHARI').html('');
				a = $('#inLENDIRHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLENDIRHARI').html(html);
				}
			});
			// End

			// keyUp BAU
			$('#inBAUHARI').keyup(function() {
				$('#notifinBAUHARI').html('');
				a = $('#inBAUHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAUHARI').html(html);
				}
			});
			// End
			
			// keyUp KONSISTENSI
			$('#inKONSISTENSIHARI').keyup(function() {
				$('#notifinKONSISTENSIHARI').html('');
				a = $('#inKONSISTENSIHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKONSISTENSIHARI').html(html);
				}
			});
			// End
			
			// keyUp WARNA FESES
			$('#inWARNAFESESHARI').keyup(function() {
				$('#notifinWARNAFESESHARI').html('');
				a = $('#inWARNAFESESHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinWARNAFESESHARI').html(html);
				}
			});
			// End

			// keyUp PARASIT
			$('#inPARASITHARI').keyup(function() {
				$('#notifinPARASITHARI').html('');
				a = $('#inPARASITHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPARASITHARI').html(html);
				}
			});
			// End

			// keyUp LEUKOSIT FESES
			$('#inLEUKOSITFESESHARI').keyup(function() {
				$('#notifinLEUKOSITFESESHARI').html('');
				a = $('#inLEUKOSITFESESHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITFESESHARI').html(html);
				}
			});
			// End

			// keyUp ERITROSIT FESES
			$('#inERITROSITFESESHARI').keyup(function() {
				$('#notifinERITROSITFESESHARI').html('');
				a = $('#inERITROSITFESESHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITFESESHARI').html(html);
				}
			});
			// End

			// keyUp SEL EPITEL
			$('#inSELFESESHARI').keyup(function() {
				$('#notifinSELFESESHARI').html('');
				a = $('#inSELFESESHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSELFESESHARI').html(html);
				}
			});
			// End

			// keyUp SILIDER
			$('#inSILIDERHARI').keyup(function() {
				$('#notifinSILIDERHARI').html('');
				a = $('#inSILIDERHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSILIDERHARI').html(html);
				}
			});
			// End

			// keyUp TELUR CACING
			$('#inTELURHARI').keyup(function() {
				$('#notifinTELURHARI').html('');
				a = $('#inTELURHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTELURHARI').html(html);
				}
			});
			// End

			// keyUp AMOEBA
			$('#inAMOEBAHARI').keyup(function() {
				$('#notifinAMOEBAHARI').html('');
				a = $('#inAMOEBAHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinAMOEBAHARI').html(html);
				}
			});
			// End

			// keyUp BAKTERI FESES
			$('#inBAKTERIFESESHARI').keyup(function() {
				$('#notifinBAKTERIFESESHARI').html('');
				a = $('#inBAKTERIFESESHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAKTERIFESESHARI').html(html);
				}
			});
			// End

			// keyUp INR
			$('#inINRHARI').keyup(function() {
				$('#notifinINRHARI').html('');
				a = $('#inINRHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinINRHARI').html(html);
				}else if( a >= 0.7 && a <= 1.3){
					html = '<b style="color:blue">INR NORMAL</b>';
					$('#notifinINRHARI').html(html);
				}else{
					html = '<b style="color:red">INR TIDAK NORMAL</b>';
					$('#notifinINRHARI').html(html);
				}
			});
			// End

			// keyUp CRP
			$('#inCRPHARI').keyup(function() {
				$('#notifinCRPHARI').html('');
				a = $('#inCRPHARI').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCRPHARI').html(html);
				}else if( a <= 10){
					html = '<b style="color:blue">CRP NORMAL</b>';
					$('#notifinCRPHARI').html(html);
				}else{
					html = '<b style="color:red">CRP TIDAK NORMAL</b>';
					$('#notifinCRPHARI').html(html);
				}
			});
			// End
// End KeyUp Bayi Hari

</script>

<!-- END HARI -->



<!--insert Darah Rutin babyhari-->
<script type="text/javascript">
//insert darah rutin

function insert_hari_darah() {
	Nama_tindakan = $('#inNamaDARAHHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborDARAHHARI').val();
	hb1_hari=$('#inHB1HARI').val();
	hb26_hari=$('#inHB26HARI').val();
	hb723_hari=$('#inHB723HARI').val();	
	hb2437_hari=$('#inHB2437HARI').val();
	hb381_hari=$('#inHB381HARI').val();
	leukosit=$('#inLEUKOSITHARI').val();
	trombosit=$('#inTROMBOSITHARI').val();
	led=$('#inLEDHARI').val();
	hematokrit1_hari=$('#inHEMATOKRIT1HARI').val();
	hematokrit16_hari=$('#inHEMATOKRIT16HARI').val();
	hematokrit723_hari=$('#inHEMATOKRIT723HARI').val();
	hematokrit2437_hari=$('#inHEMATOKRIT2437HARI').val();
	eritrosit=$('#inERITROSITFESESHARI').val();
	mcv1_hari=$('#inMCV1HARI').val();
	mcv26_hari=$('#inMCV26HARI').val();
	mcv723_hari=$('#inMCV723HARI').val();
	mcv2437_hari=$('#inMCV2437HARI').val();
	mch1_hari=$('#inMCH1HARI').val();
	mch26_hari=$('#inMCH26HARI').val();
	mch723_hari=$('#inMCH723HARI').val();
	mchc1_hari=$('#inMCHC1HARI').val();
	mchc26_hari=$('#inMCHC26HARI').val();
	mchc723_hari=$('#inMCHC723HARI').val();
	rdw_cv=$('#inRDW_CVHARI').val();
	rdw_sd=$('#inRDW_SDHARI').val();
	bas=$('#inBASHARI').val();
	eos=$('#inEOSHARI').val();
	mono=$('#inMONOHARI').val();
	segmen=$('#inSEGMENHARI').val();
	lympo=$('#inLYMPOHARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_darah_rutin_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					hb1_hari:hb1_hari,
					hb26_hari:hb26_hari,
					hb723_hari:hb723_hari,
					hb2437_hari:hb2437_hari,
					hb381_hari:hb381_hari,
					leukosit:leukosit,
					trombosit:trombosit,
					led:led,
					hematokrit1_hari:hematokrit1_hari,
					hematokrit16_hari:hematokrit16_hari,
					hematokrit723_hari:hematokrit723_hari,
					hematokrit2437_hari:hematokrit2437_hari,
					eritrosit:eritrosit,
					mcv1_hari:mcv1_hari,
					mcv26_hari:mcv26_hari,
					mcv723_hari:mcv723_hari,
					mcv2437_hari:mcv2437_hari,
					mch1_hari:mch1_hari,
					mch26_hari:mch26_hari,
					mch723_hari:mch723_hari,
					mchc1_hari:mchc1_hari,
					mchc26_hari:mchc26_hari,
					mchc723_hari:mchc723_hari,
					rdw_cv:rdw_cv,
					rdw_sd:rdw_sd,
					bas:bas,
					eos:eos,
					mono:mono,
					segmen:segmen,
					lympo:lympo,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hb1_hari=$('#inHB1HARI').val("");
						hb26_hari=$('#inHB26HARI').val("");
						hb723_hari=$('#inHB723HARI').val("");	
						hb2437_hari=$('#inHB2437HARI').val("");
						hb381_hari=$('#inHB381HARI').val("");
						leukosit=$('#inLEUKOSITHARI').val("");
						trombosit=$('#inTROMBOSITHARI').val("");
						led=$('#inLEDHARI').val("");
						hematokrit1_hari=$('#inHEMATOKRIT1HARI').val("");
						hematokrit16_hari=$('#inHEMATOKRIT16HARI').val("");
						hematokrit723_hari=$('#inHEMATOKRIT723HARI').val("");
						hematokrit2437_hari=$('#inHEMATOKRIT2437HARI').val("");
						eritrosit=$('#inERITROSITFESESHARI').val("");
						mcv1_hari=$('#inMCV1HARI').val("");
						mcv26_hari=$('#inMCV26HARI').val("");
						mcv723_hari=$('#inMCV723HARI').val("");
						mcv2437_hari=$('#inMCV2437HARI').val("");
						mch1_hari=$('#inMCH1HARI').val("");
						mch26_hari=$('#inMCH26HARI').val("");
						mch723_hari=$('#inMCH723HARI').val("");
						mchc1_hari=$('#inMCHC1HARI').val("");
						mchc26_hari=$('#inMCHC26HARI').val("");
						mchc723_hari=$('#inMCHC723HARI').val("");
						rdw_cv=$('#inRDW_CVHARI').val("");
						rdw_sd=$('#inRDW_SDHARI').val("");
						bas=$('#inBASHARI').val("");
						eos=$('#inEOSHARI').val("");
						mono=$('#inMONOHARI').val("");
						segmen=$('#inSEGMENHARI').val("");
						lympo=$('#inLYMPOHARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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
//insert gol darah
function insert_gol_darah_hari() {
	Nama_tindakan = $('#inNamaGOLHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborGOLHARI').val();
	golongan_darah_hari=$('#inGOLDARAHHARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_golongan_darah_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					golongan_darah_hari:golongan_darah_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						golongan_darah_hari=$('#inGOLDARAHHARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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
//insert rhesus
function insert_hari_rhesus() {
	Nama_tindakan = $('#inNamaRHESUSHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborRHESUSHARI').val();
	rhesus_hari=$('#inRHESUSHARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_rhesus_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					rhesus_hari:rhesus_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						rhesus_hari=$('#inRHESUSHARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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
//insert APTT 
function insert_hari_aptt() {
	Nama_tindakan = $('#inNamaAPTTHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborAPTTHARI').val();
	aptt_hari=$('#inAPTTHARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_aptt_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					aptt_hari:aptt_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						aptt_hari=$('#inAPTTHARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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
// insert pt 
function insert_hari_pt() {
	Nama_tindakan = $('#inNamaPTHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborPTHARI').val();
	pt_hari=$('#inPTHARI').val();
	inr_hari=$('#inINRHARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_pt_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					pt_hari:pt_hari,
					inr_hari:inr_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						pt_hari=$('#inPTHARI').val("");
						inr_hari=$('#inINRHARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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
//insert gula darah
function insert_hari_guldarah() {
	Nama_tindakan = $('#inNamaGULDARAHHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborGULDARAHHARI').val();
	prematur_hari=$('#inGULDARAHPREMATUREHARI').val();
	bayi_hari=$('#inGULDARAHBAYIHARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_gula_darah_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					prematur_hari:prematur_hari,
					bayi_hari :bayi_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						prematur_hari=$('#inGULDARAHPREMATUREHARI').val("");
						bayi_hari=$('#inGULDARAHBAYIHARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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
// insert ureum hari
function insert_hari_ureum() {
	Nama_tindakan = $('#inNamaUREUMHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborUREUMHARI').val();
	ureum_hari=$('#inUREUMHARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_ureum_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					ureum_hari:ureum_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						ureum_hari=$('#inUREUMHARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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

// insert creatinin hari
function insert_hari_creatinin() {
	Nama_tindakan = $('#inNamaCREATININHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborCREATININHARI').val();
	creatinin_hari=$('#inCREATININHARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_creatinin_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					creatinin_hari:creatinin_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						creatinin_hari=$('#inCREATININHARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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

// insert protein hari
function insert_hari_protein() {
	Nama_tindakan = $('#inNamaPROTEINHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborPROTEINHARI').val();
	protein_prematur_hari=$('#inPROTEINPREMATURHARI').val();
	protein_06_hari=$('#inPROTEIN06HARI').val();
	protein_1_hari=$('#inPROTEIN1HARI').val();
	protein_71_hari=$('#inPROTEIN71HARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_protein_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					protein_prematur_hari:protein_prematur_hari,
					protein_06_hari:protein_06_hari,
					protein_1_hari:protein_1_hari,
					protein_71_hari:protein_71_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						protein_prematur_hari=$('#inPROTEINPREMATURHARI').val("");
						protein_06_hari=$('#inPROTEIN06HARI').val("");
						protein_1_hari=$('#inPROTEIN1HARI').val("");
						protein_71_hari=$('#inPROTEIN71HARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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

// insert albumin hari
function insert_hari_albumin() {
	Nama_tindakan = $('#inNamaALBUMINHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborALBUMINHARI').val();
	albumin04_hari=$('#inALBUMIN04HARI').val();
	albumin414_hari=$('#inALBUMIN414HARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_albumin_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					albumin04_hari:albumin04_hari,
					albumin414_hari:albumin414_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						albumin04_hari=$('#inALBUMIN04HARI').val("");
						albumin414_hari=$('#inALBUMIN414HARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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

// insert elektrolit hari
function insert_hari_elektrolit() {
	Nama_tindakan = $('#inNamaELEKTROLITHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborELEKTROLITHARI').val();
	na_hari=$('#inNAHARI').val();
	k_hari=$('#inKHARI').val();
	cl_hari=$('#inCLHARI').val();
	ca_hari=$('#inCaHARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_elektrolit_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					na_hari:na_hari,
					k_hari:k_hari,
					cl_hari:cl_hari,
					ca_hari:ca_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						na_hari=$('#inNAHARI').val("");
						k_hari=$('#inKHARI').val("");
						cl_hari=$('#inCLHARI').val("");
						ca_hari=$('#inCaHARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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

// insert CRP hari
function insert_hari_crp() {
	Nama_tindakan = $('#inNamaCRPHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborCRPHARI').val();
	crp_hari=$('#inCRPHARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_crp_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					crp_hari:crp_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						crp_hari=$('#inCRPHARI').val();
						$('#tablelaborHARI').DataTable().ajax.reload();
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
// insert sgot hari
function insert_hari_sgot() {
	Nama_tindakan = $('#inNamaSGOT').val();
	id_tindakan_labor = $('#id_tindakan_laborSGOTHARI').val();
	sgot010_hari=$('#inSGOT010HARI').val();
	sgot1024_hari=$('#inSGOT1024HARI').val();
	sgot2460_hari=$('#inSGOT2460HARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_sgot_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					sgot010_hari:sgot010_hari,
					sgot1024_hari:sgot1024_hari,
					sgot2460_hari:sgot2460_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sgot010_hari=$('#inSGOT010HARI').val("");
						sgot1024_hari=$('#inSGOT1024HARI').val("");
						sgot2460_hari=$('#inSGOT2460HARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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
// insert sgpt hari
function insert_hari_sgpt() {
	Nama_tindakan = $('#inNamaSGPT').val();
	id_tindakan_labor = $('#id_tindakan_laborSGPTHARI').val();
	sgpt_hari=$('#inSGPTHARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_sgpt_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					sgpt_hari:sgpt_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sgpt_hari=$('#inSGPTHARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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
//insert ns 1 hari
function insert_hari_ns1() {
	Nama_tindakan = $('#inNamaNS1HARI').val();
	id_tindakan_labor = $('#id_tindakan_laborNS1HARI').val();
	ns1_hari=$('#inNS1HARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_ns1_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					ns1_hari:ns1_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						ns1_hari=$('#inNS1HARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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
//insert dengue hari
function insert_hari_dengue() {
	Nama_tindakan = $('#inNamaDENGUEHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborDENGUEHARI').val();
	dengue_hari=$('#inDENGUEHARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_dengue_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					dengue_hari:dengue_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						dengue_hari=$('#inDENGUEHARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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
//insert salmonella hari
function insert_hari_salmonella() {
	Nama_tindakan = $('#inNamaSALMONELLAHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborSALMONELLAHARI').val();
	salmonella_hari=$('#inSALMONELLAHARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_salmonella_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					salmonella_hari:salmonella_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						salmonella_hari=$('#inSALMONELLAHARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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
//insert HBSAB hari
function insert_hari_hbsab() {
	Nama_tindakan = $('#inNamaHBSABHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborHBSABHARI').val();
	hbsab_hari=$('#inHBSABHARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_hbsab_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					hbsab_hari:hbsab_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hbsab_hari=$('#inHBSABHARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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
//insert HBSAG hari
function insert_hari_hbsag() {
	Nama_tindakan = $('#inNamaHBSAGHARI').val();
	id_tindakan_labor = $('#id_tindakan_laborHBSAGHARI').val();
	hbsag_hari=$('#inHBSAGHARI').val();
	inJenisPasienHARI=$('#inMasukHARI').val();
	swal({   
		title: "Apakah kamu yakin ingin !",   
		text: "Menyimpan Data " + Nama_tindakan + " ini?",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#3cb878",   
		confirmButtonText: "Yakin",   
		cancelButtonText: "Batal",   
		closeOnConfirm: false 
	}, function(){   
		$().ready(function(){                                        
			$.ajax({  
				url : "<?php echo base_url() ?>Labor/insert_hbsag_babyhari",
				method: "POST",
				dataType: 'json',
				data : {
					id_tindakan_labor:id_tindakan_labor,
					hbsag_hari:hbsag_hari,
					inJenisPasienHARI:inJenisPasienHARI,
				},
				success: function(data){
					if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hbsag_hari=$('#inHBSAGHARI').val("");
						$('#tablelaborHARI').DataTable().ajax.reload();
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

	//insert B20 hari
	function insert_hari_b20() {
		Nama_tindakan = $('#inNamaB20HARI').val();
		id_tindakan_labor = $('#id_tindakan_laborB20HARI').val();
		b20_hari=$('#inB20HARI').val();
		inJenisPasienHARI=$('#inMasukHARI').val();
		swal({   
			title: "Apakah kamu yakin ingin !",   
			text: "Menyimpan Data " + Nama_tindakan + " ini?",
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#3cb878",   
			confirmButtonText: "Yakin",   
			cancelButtonText: "Batal",   
			closeOnConfirm: false 
		}, function(){   
			$().ready(function(){                                        
				$.ajax({  
					url : "<?php echo base_url() ?>Labor/insert_b20_babyhari",
					method: "POST",
					dataType: 'json',
					data : {
						id_tindakan_labor:id_tindakan_labor,
						b20_hari:b20_hari,
						inJenisPasienHARI:inJenisPasienHARI,
					},
					success: function(data){
						if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							b20_hari=$('#inB20HARI').val("");
							$('#tablelaborHARI').DataTable().ajax.reload();
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

	//insert VDRL hari
	function insert_hari_vdrl() {
		Nama_tindakan = $('#inNamaVDRLHARI').val();
		id_tindakan_labor = $('#id_tindakan_laborVDRLHARI').val();
		vdrl_hari=$('#inVDRLHARI').val();
		inJenisPasienHARI=$('#inMasukHARI').val();
		swal({   
			title: "Apakah kamu yakin ingin !",   
			text: "Menyimpan Data " + Nama_tindakan + " ini?",
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#3cb878",   
			confirmButtonText: "Yakin",   
			cancelButtonText: "Batal",   
			closeOnConfirm: false 
		}, function(){   
			$().ready(function(){                                        
				$.ajax({  
					url : "<?php echo base_url() ?>Labor/insert_vdrl_babyhari",
					method: "POST",
					dataType: 'json',
					data : {
						id_tindakan_labor:id_tindakan_labor,
						vdrl_hari:vdrl_hari,
						inJenisPasienHARI:inJenisPasienHARI,
					},
					success: function(data){
						if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							vdrl_hari=$('#inVDRLHARI').val("");
							$('#tablelaborHARI').DataTable().ajax.reload();
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


	function insert_data_feses() {
		    Nama_tindakan = $('#inNamaFESESBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborFESESBULAN').val();
			makro_darah = $('#inDARAHFESESBULAN').val();
			makro_lendir = $('#inLENDIRBULAN').val();
			makro_bau = $('#inBAUBULAN').val();
			makro_konsistensi = $('#inKONSISTENSIBULAN').val();
			makro_warna = $('#inWARNAFESESBULAN').val();
			makro_parasit = $('#inPARASITBULAN').val();
			mikro_leukosit = $('#inLEUKOSITFESESBULAN').val();
			mikro_eritrosit = $('#inERITROSITFESESBULAN').val();
			mikro_sel_epitel = $('#inSELFESESBULAN').val();
			mikro_silinder = $('#inSILIDERBULAN').val();
			mikro_telur_cacing = $('#inTELURBULAN').val();
			mikro_amoeba = $('#inAMOEBABULAN').val();
			mikro_bakteri = $('#inBAKTERIFESESBULAN').val();
			inJenisPasienHARI=$('#inMasukHARI').val();
			swal({   
				title: "Apakah kamu yakin ingin !",   
				text: "Menyimpan Data " + Nama_tindakan + " ini?",
				type: "warning",   
				showCancelButton: true,   
				confirmButtonColor: "#3cb878",   
				confirmButtonText: "Yakin",   
				cancelButtonText: "Batal",   
				closeOnConfirm: false 
        }, function(){   
			$().ready(function(){                                        
					$.ajax({  
							url : "<?php echo base_url() ?>Labor/insert_feses",
							method: "POST",
							dataType: 'json',
							data : {
							id_tindakan_labor:id_tindakan_labor,
							makro_darah:makro_darah ,
							makro_lendir:makro_lendir,
							makro_bau:makro_bau,
							makro_konsistensi:makro_konsistensi,
							makro_warna:makro_warna,
							makro_parasit:makro_parasit,
							mikro_leukosit:mikro_leukosit,
							mikro_eritrosit:mikro_eritrosit,
							mikro_sel_epitel:mikro_sel_epitel,
							mikro_silinder:mikro_silinder,
							mikro_telur_cacing:mikro_telur_cacing,
							mikro_amoeba:mikro_amoeba,
							mikro_bakteri:mikro_bakteri,
							inJenisPasienHARI:inJenisPasienHARI,
							},
							success: function(data){
							if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							makro_darah = $('#inDARAHFESESBULAN').val("");
							makro_lendir = $('#inLENDIRBULAN').val("");
							makro_bau = $('#inBAUBULAN').val("");
							makro_konsistensi = $('#inKONSISTENSIBULAN').val("");
							makro_warna = $('#inWARNAFESESBULAN').val("");
							makro_parasit = $('#inPARASITBULAN').val("");
							mikro_leukosit = $('#inLEUKOSITFESESBULAN').val("");
							mikro_eritrosit = $('#inERITROSITFESESBULAN').val("");
							mikro_sel_epitel = $('#inSELFESESBULAN').val("");
							mikro_silinder = $('#inSILIDERBULAN').val("");
							mikro_telur_cacing = $('#inTELURBULAN').val("");
							mikro_amoeba = $('#inAMOEBABULAN').val("");
							mikro_bakteri = $('#inBAKTERIFESESBULAN').val("");
							$('#tablelaborBULAN').DataTable().ajax.reload();

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


	function insert_data_urine() {
		    Nama_tindakan = $('#inNamaURINEBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborURINEBULAN').val();
			warna = $('#inWARNABULAN').val();
			kejernihan = $('#inKEJERNIHANBULAN').val();
			eritrosit = $('#inERITROSITURINEBULAN').val();
			leukosit = $('#inLEUKOSITURINEBULAN').val();
			epitel = $('#inSELBULAN').val();
			silinder = $('#inSILINDERBULAN').val();
			kristal = $('#inKRISTALBULAN').val();
			bakteri = $('#inBAKTERIBULAN').val();
			jamur = $('#inJAMURBULAN').val();
			eritrositkimia = $('#inERITROSITKIMIABULAN').val();
			glukosa = $('#inGLUKOSABULAN').val();
			protein = $('#inPROTEINKIMIABULAN').val();
			bilirubin = $('#inBILIRUBINBULAN').val();
			urobilin= $('#inUROBILINOGENBULAN').val();
			ph = $('#inPHKIMIABULAN').val();
			berat = $('#inBERATBULAN').val();
			keton = $('#inKETONBULAN').val();
			nitrit = $('#inNITRITBULAN').val();
			leukositkimia = $('#inLEUKOSITKIMIABULAN').val();
			inJenisPasienHARI=$('#inMasukHARI').val();
			swal({   
				title: "Apakah kamu yakin ingin !",   
				text: "Menyimpan Data " + Nama_tindakan + " ini?",
				type: "warning",   
				showCancelButton: true,   
				confirmButtonColor: "#3cb878",   
				confirmButtonText: "Yakin",   
				cancelButtonText: "Batal",   
				closeOnConfirm: false 
        }, function(){   
			$().ready(function(){                                        
					$.ajax({  
							url : "<?php echo base_url() ?>Labor/insert_feses",
							method: "POST",
							dataType: 'json',
							data : {
							id_tindakan_labor:id_tindakan_labor,
							warna:warna,
							kejernihan:kejernihan,
							eritrosit:eritrosit,
							leukosit:leukosit,
							epitel:epitel,
							silinder:silinder,
							kristal:kristal,
							bakteri:bakteri,
							jamur:jamur,
							eritrositkimia:eritrositkimia,
							glukosa:glukosa,
							protein:protein,
							bilirubin:bilirubin,
							urobilin:urobilin,
							ph:ph,
							berat:berat,
							keton:keton,
							nitrit:nitrit,
							leukositkimia:leukositkimia,
							inJenisPasienHARI:inJenisPasienHARI,
							},
							success: function(data){
							if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							warna = $('#inWARNABULAN').val("");
							kejernihan = $('#inKEJERNIHANBULAN').val("");
							eritrosit = $('#inERITROSITURINEBULAN').val("");
							leukosit = $('#inLEUKOSITURINEBULAN').val("");
							epitel = $('#inSELBULAN').val("");
							silinder = $('#inSILINDERBULAN').val("");
							kristal = $('#inKRISTALBULAN').val("");
							bakteri = $('#inBAKTERIBULAN').val("");
							jamur = $('#inJAMURBULAN').val("");
							eritrositkimia = $('#inERITROSITKIMIABULAN').val("");
							glukosa = $('#inGLUKOSABULAN').val("");
							protein = $('#inPROTEINKIMIABULAN').val("");
							bilirubin = $('#inBILIRUBINBULAN').val("");
							urobilin= $('#inUROBILINOGENBULAN').val("");
							ph = $('#inPHKIMIABULAN').val("");
							berat = $('#inBERATBULAN').val("");
							keton = $('#inKETONBULAN').val("");
							nitrit = $('#inNITRITBULAN').val("");
							leukosit = $('#inLEUKOSITKIMIABULAN').val("");
							$('#tablelaborBULAN').DataTable().ajax.reload();

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

	//insert PTAPTT HARI
	function insert_hari_ptaptt() {
		Nama_tindakan = $('#inNamaPTAPTTHARI').val();
		id_tindakan_labor = $('#id_tindakan_laborPTAPTTHARI').val();
		ptaptt=$('#inPTAPTTHARI').val();
		inJenisPasienHARI=$('#inMasukHARI').val();
		swal({   
			title: "Apakah kamu yakin ingin !",   
			text: "Menyimpan Data " + Nama_tindakan + " ini?",
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#3cb878",   
			confirmButtonText: "Yakin",   
			cancelButtonText: "Batal",   
			closeOnConfirm: false 
		}, function(){   
			$().ready(function(){                                        
				$.ajax({  
					url : "<?php echo base_url() ?>Labor/insert_ptaptt_babyhari",
					method: "POST",
					dataType: 'json',
					data : {
						id_tindakan_labor:id_tindakan_labor,
						ptaptt:ptaptt,
						inJenisPasienHARI:inJenisPasienHARI,
					},
					success: function(data){
						if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							vdrl_hari=$('#inPTAPTTHARI').val("");
							$('#tablelaborHARI').DataTable().ajax.reload();
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

	//insert MALARIA HARI
	function insert_hari_malaria() {
		Nama_tindakan = $('#inNamaMALARIAHARI').val();
		id_tindakan_labor = $('#id_tindakan_laborMALARIAHARI').val();
		malaria=$('#inMALARIAHARI').val();
		inJenisPasienHARI=$('#inMasukHARI').val();
		swal({   
			title: "Apakah kamu yakin ingin !",   
			text: "Menyimpan Data " + Nama_tindakan + " ini?",
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#3cb878",   
			confirmButtonText: "Yakin",   
			cancelButtonText: "Batal",   
			closeOnConfirm: false 
		}, function(){   
			$().ready(function(){                                        
				$.ajax({  
					url : "<?php echo base_url() ?>Labor/insert_malaria_babyhari",
					method: "POST",
					dataType: 'json',
					data : {
						id_tindakan_labor:id_tindakan_labor,
						malaria:malaria,
						inJenisPasienHARI:inJenisPasienHARI,
					},
					success: function(data){
						if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							malaria=$('#inMALARIAHARI').val("");
							$('#tablelaborHARI').DataTable().ajax.reload();
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

	//insert DARAH SAMAR HARI
	function insert_hari_darahsamar() {
		Nama_tindakan = $('#inNamaDARAHSAMARHARI').val();
		id_tindakan_labor = $('#id_tindakan_laborDARAHSAMARHARI').val();
		darahsamar=$('#inDARAHSAMARHARI').val();
		inJenisPasienHARI=$('#inMasukHARI').val();
		swal({   
			title: "Apakah kamu yakin ingin !",   
			text: "Menyimpan Data " + Nama_tindakan + " ini?",
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#3cb878",   
			confirmButtonText: "Yakin",   
			cancelButtonText: "Batal",   
			closeOnConfirm: false 
		}, function(){   
			$().ready(function(){                                        
				$.ajax({  
					url : "<?php echo base_url() ?>Labor/insert_darahsamar_babyhari",
					method: "POST",
					dataType: 'json',
					data : {
						id_tindakan_labor:id_tindakan_labor,
						darahsamar:darahsamar,
						inJenisPasienHARI:inJenisPasienHARI,
					},
					success: function(data){
						if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							darahsamar=$('#inDARAHSAMARHARI').val("");
							$('#tablelaborHARI').DataTable().ajax.reload();
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

	//insert LED HARI
	function insert_led_hari() {
		Nama_tindakan = $('#inNamaLEDHARI').val();
		id_tindakan_labor = $('#id_tindakan_laborLEDHARI').val();
		led=$('#inLEDHARI').val();
		inJenisPasienHARI=$('#inMasukHARI').val();
		swal({   
			title: "Apakah kamu yakin ingin !",   
			text: "Menyimpan Data " + Nama_tindakan + " ini?",
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#3cb878",   
			confirmButtonText: "Yakin",   
			cancelButtonText: "Batal",   
			closeOnConfirm: false 
		}, function(){   
			$().ready(function(){                                        
				$.ajax({  
					url : "<?php echo base_url() ?>Labor/insert_led_babyhari",
					method: "POST",
					dataType: 'json',
					data : {
						id_tindakan_labor:id_tindakan_labor,
						led:led,
						inJenisPasienHARI:inJenisPasienHARI,
					},
					success: function(data){
						if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							led=$('#inLEDHARI').val("");
							$('#tablelaborHARI').DataTable().ajax.reload();
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

	function hapus_labor_HARI(id_tindakan_labor, id_pelayanan, nama) { 
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
                                url: "<?php echo base_url() ?>Labor/hapus_data_labor",
                                method: "POST",
                                dataType: 'json',
                                data: {
                                    id_tindakan_labor: id_tindakan_labor,
                                },
                                success: function(data) {
                                    if (data.status == "success") {
                                        swal({
                                            title: "good job!",
                                            type: "success",
                                            text: "Data Berhasil dihapus",
                                            confirmButtonColor: "#3cb878",
                                        });
										$('#tablelaborHARI').DataTable().ajax.reload();
                                        $('#outTotalHargaHARI').DataTable().ajax.reload();
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