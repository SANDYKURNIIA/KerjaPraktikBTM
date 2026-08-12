<<<<<<< HEAD
	<script type="text/javascript">
	function detail_tindakan_labor_bulan(id_tindakan_labor) {
		$.ajax({
			url: "<?= base_url() . 'Labor/getdata_formById_Labor' ?>",
			data: {
				tindakan: id_tindakan_labor,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					$('#detailTindakanLaborBULAN').collapse('toggle');
					$("#outNamaBULAN").val(data.nama);
					$("#outFrekBULAN").val(data.frek);
					$("#outTanggalBULAN").val(data.tanggal_req);
					$("#outHargaBULAN").val(data.harga);
					$("#outRingBULAN").val(data.ringkasan);
					$("#outKetaBULAN").val(data.keterangan);
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

					function reload_data_labor_BULAN(id_pelayanan) {   
						var a = document.getElementById('cetak_semua_bulan'); 
						a.href = "Labor_BULAN_All_print/" + id_pelayanan
						 
                        $('#tablelaborBULAN').dataTable().fnClearTable();
                        $('#tablelaborBULAN').dataTable().fnDestroy();
                        $('#tablelaborBULAN').DataTable({
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
                                "url": '<?php echo base_url('Labor/tampil_all_labor_bulan'); ?>',
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

					function reload_total_labor_BULAN(id_pelayanan) {
                        $('#outTotalHargaBULAN').dataTable().fnClearTable();
                        $('#outTotalHargaBULAN').dataTable().fnDestroy();
                        $('#outTotalHargaBULAN').DataTable({
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

        function aksi_labor_bulan(id_tindakan_labor,id_pelayanan){
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
							$("#inNamaDARAHBULAN").val(data.nama);
							$('#isiDARAHBULAN').collapse('toggle');
							
							$('.data_mchc').addClass('collapse');
							$('#inTipeMasukMCHCBULAN').change(function() {
								var selector = '.data_mchc_' + $(this).val();
								$('.data_mchc').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_mch').addClass('collapse');
							$('#inTipeMasukMCHBULAN').change(function() {
								var selector = '.data_mch_' + $(this).val();
								$('.data_mch').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_mcv').addClass('collapse');
							$('#inTipeMasukMCVBULAN').change(function() {
								var selector = '.data_mcv_' + $(this).val();
								$('.data_mcv').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_hema').addClass('collapse');
							$('#inTipeMasukHEMATOKRITBULAN').change(function() {
								var selector = '.data_hema_' + $(this).val();
								$('.data_hema').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_hide').addClass('collapse');
							$('#inTipeMasukHBBULAN').change(function() {
								var selector = '.data_hide_' + $(this).val();
								$('.data_hide').collapse('hide');
								$(selector).collapse('show');
							});
							$('#isiAGDBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');;
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborDARAHBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " GOL DARAH "){
							// GOL DARAH
							$("#inNamaGOLBULAN").val(data.nama);
							$('#isiGOL-DARAHBULAN').collapse('toggle');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$("#id_tindakan_laborGOLBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " LED "){
							// LED
							$("#inNamaLEDBULAN").val(data.nama);
							$('#isiLEDBULAN').collapse('toggle');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
	
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$("#id_tindakan_laborLEDBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "RHESUS"){
							// RHESUS
							$("#inNamaRHESUSBULAN").val(data.nama);
							$('#isiRHESUSBULAN').collapse('toggle');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$("#id_tindakan_laborRHESUSBULAN").val(data.id_tindakan_labor);
							$("#id_staff_bulan_rhesus");
						}else if(data.nama == "APTT"){
							// APTT
							$("#inNamaAPTTBULAN").val(data.nama);
							$('#isiAPTTBULAN').collapse('toggle');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborAPTTBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " GULA DARAH "){
							// GULA DARAH
							$("#inNamaGULDARAHBULAN").val(data.nama);
							$('#isiGULDARAHBULAN').collapse('toggle');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborGULDARAHBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "HBA 1 C (A 1 C)"){
							// HBA 1 C (A 1 C)
							$("#inNamaHBABULAN").val(data.nama);
							$('#isiHBABULAN').collapse('toggle');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborHBABULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "URIC ACID"){
							// URIC ACID
							$("#inNamaURICBULAN").val(data.nama);
							$('#isiURICBULAN').collapse('toggle');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$("#id_tindakan_laborURICBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "TRIGLYSERIDE"){
							// TRIGLYSERIDE
							$("#inNamaTRIGLYSERIDEBULAN").val(data.nama);
							$('#isiTRIGLYSERIDEBULAN').collapse('toggle');
							$('#isiURICBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$("#id_tindakan_laborTRIGLYSERIDEBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "CHO"){
							// CHO
							$("#inNamaCHOBULAN").val(data.nama);
							$('#isiCHOBULAN').collapse('toggle');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$("#id_tindakan_laborCHOBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "HDL"){
							// HDL
							$("#inNamaHDLBULAN").val(data.nama);
							$('#isiHDLBULAN').collapse('toggle');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborHDLBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "LDL"){
							// LDL
							$("#inNamaLDLBULAN").val(data.nama);
							$('#isiLDLBULAN').collapse('toggle');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborLDLBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "UREUM"){
							// UREUM
							$("#inNamaUREUMBULAN").val(data.nama);
							$('#isiUREUMBULAN').collapse('toggle');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborUREUMBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "CREATININ"){
							// CREATININ
							$("#inNamaCREATININBULAN").val(data.nama);
							$('#isiCREATININBULAN').collapse('toggle');
							$('.data_hide').addClass('collapse');
							$('#inTipeCREATININ').change(function() {
								var selector = '.data_hide_' + $(this).val();
								$('.data_hide').collapse('hide');
								$(selector).collapse('show');
							});
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$("#id_tindakan_laborCREATININBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "SGOT"){
							// SGOT
							$("#inNamaSGOTBULAN").val(data.nama);
							$('#isiSGOTBULAN').collapse('toggle');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiALBULANP').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$("#id_tindakan_laborSGOTBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "SGPT"){
							// SGPT
							$("#inNamaSGPTBULAN").val(data.nama);
							$('#isiSGPTBULAN').collapse('toggle');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborSGPTBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "ELEKTROLIT "){
							// ELEKTROLIT
							$("#inNamaELEKTROLITBULAN").val(data.nama);
							$('#isiELEKTROLITBULAN').collapse('toggle');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$("#id_tindakan_laborELEKTROLITBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " Sputum B T A I"){
							// SPUTUMBTAI
							$("#inNamaSPUTUMBTAIBULAN").val(data.nama);
							$('#isiSPUTUMBTAIBULAN').collapse('toggle');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborSPUTUMBTAIBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " Sputum B T A II"){
							// SPUTUMBTAII
							$("#inNamaSPUTUMBTAIIBULAN").val(data.nama);
							$('#isiSPUTUMBTAIIBULAN').collapse('toggle');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$("#id_tindakan_laborSPUTUMBTAIIBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " Sputum B T A III"){
							// SPUTUMBTAIII
							$("#inNamaSPUTUMBTAIIIBULAN").val(data.nama);
							$('#isiSPUTUMBTAIIIBULAN').collapse('toggle');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborSPUTUMBTAIIIBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " PROTEIN "){
							// PROTEIN
							$("#inNamaPROTEINBULAN").val(data.nama);
							$('#isiPROTEINBULAN').collapse('toggle');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborPROTEINBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " ALBUMIN "){
							// ALBUMIN
							$("#inNamaALBUMINBULAN").val(data.nama);
							$('#isiALBUMINBULAN').collapse('toggle');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborALBUMINBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " MALARIA "){
							// MALARIA
							$("#inNamaMALARIABULAN").val(data.nama);
							$('#isiMALARIABULAN').collapse('toggle');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborMALARIABULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " WIDAL "){
							// WIDAL
							$("#inNamaWIDALBULAN").val(data.nama);
							$('#isiWIDALBULAN').collapse('toggle');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborWIDALBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " TROPONIN "){
							// TROPONIN
							$("#inNamaTROPONINBULAN").val(data.nama);
							$('#isiTROPONINBULAN').collapse('toggle');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborTROPONINBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " NS 1 "){
							// NS1
							$("#inNamaNS1BULAN").val(data.nama);
							$('#isiNS1BULAN').collapse('toggle');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborNS1BULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " HBSAG "){
							// HBSAG
							$("#inNamaHBSAGBULAN").val(data.nama);
							$('#isiHBSAGBULAN').collapse('toggle');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborHBSAGBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " HBSAB "){
							// HBSAB
							$("#inNamaHBSABBULAN").val(data.nama);
							$('#isiHBSABBULAN').collapse('toggle');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborHBSABBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "B20"){
							// B20
							$("#inNamaB20BULAN").val(data.nama);
							$('#isiB20BULAN').collapse('toggle');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborB20BULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " VDRL "){
							// VDRL
							$("#inNamaVDRLBULAN").val(data.nama);
							$('#isiVDRLBULAN').collapse('toggle');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborVDRLBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " PLANOTES "){
							// PLANOTES
							$("#inNamaPLANOBULAN").val(data.nama);
							$('#isiPLANOBULAN').collapse('toggle');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborVDRLBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " SALMONELLA "){
							// SALMONELLA
							$("#inNamaSALMONELLABULAN").val(data.nama);
							$('#isiSALMONELLABULAN').collapse('toggle');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborSALMONELLABULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "AGD"){
							// AGD
							$("#inNamaAGDBULAN").val(data.nama);
							$('#isiAGDBULAN').collapse('toggle');
							$('#isiPTBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborAGDBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " URINE "){
							// URINE
							$("#inNamaURINEBULAN").val(data.nama);
							$('#isiURINEBULAN').collapse('toggle');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborURINEBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "ANALISA SPERMA"){
							// ANALISA SPERMA
							$("#inNamaSPERMABULAN").val(data.nama);
							$('#isiSPERMABULAN').collapse('toggle');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborSPERMABULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " FEACES "){
							// FEACES
							$("#inNamaFESESBULAN").val(data.nama);
							$('#isiFESESBULAN').collapse('toggle');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborFESESBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "CRP"){
							// CRP
							$("#inNamaCRPBULAN").val(data.nama);
							$('#isiCRPBULAN').collapse('toggle');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborCRPBULAN").val(data.id_tindakan_labor);	
						}else if(data.nama == "PT"){
							// PT
							$("#inNamaPTBULAN").val(data.nama);
							$('#isiPTBULAN').collapse('toggle');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborPTBULAN").val(data.id_tindakan_labor);		
						}else if(data.nama == "PT/APTT"){
							// PT/APTT
							$("#inNamaPTAPTTBULAN").val(data.nama);
							$('#isiPTAPTTBULAN').collapse('toggle');
							$('#isiPTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborPTAPTTBULAN").val(data.id_tindakan_labor);	
						}else if(data.nama == "DENGUE"){
							// DENGUE
							$("#inNamaDENGUEBULAN").val(data.nama);
							$('#isiDENGUEBULAN').collapse('toggle');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborDENGUEBULAN").val(data.id_tindakan_labor);	
						}else if(data.nama == "Darah Samar"){
							// DENGUE
							$("#inNamaDARAHSAMARBULAN").val(data.nama);
							$('#isiDARAHSAMARBULAN').collapse('toggle');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborDARAHSAMARBULAN").val(data.id_tindakan_labor);
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
// KeyUp Bayi Bulan
	//HB BULAN
			// KeyUP HB 40 - 50 Hari
			$('#inHB4050BULAN').keyup(function() {
				$('#notifinHB4050BULAN').html('');
				a = $('#inHB4050BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB4050BULAN').html(html);
				}else if (a >= 9.0 && a <= 16.6) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB4050BULAN').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB4050BULAN').html(html);
				}
			});

			// KeyUP HB BULAN >50 Hari - 2.5 Bulan
			$('#inHB5025BULAN').keyup(function() {
				$('#notifinHB5025BULAN').html('');
				a = $('#inHB5025BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB5025BULAN').html(html);
				}else if (a >= 9.2 && a <= 13.6) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB5025BULAN').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB5025BULAN').html(html);
				}
			});

			// KeyUP HB BULAN 2.6 - 3.5 Bulan
			$('#inHB2635BULAN').keyup(function() {
				$('#notifinHB2635BULAN').html('');
				a = $('#inHB2635BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB2635BULAN').html(html);
				}else if (a >= 9.6 && a <= 12.8) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB2635BULAN').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB2635BULAN').html(html);
				}
			});

			// KeyUP HB BULAN 4 - 7 Bulan
			$('#inHB47BULAN').keyup(function() {
				$('#notifinHB47BULAN').html('');
				a = $('#inHB47BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB47BULAN').html(html);
				}else if (a >= 10.1 && a <= 12.9) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB47BULAN').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB47BULAN').html(html);
				}
			});

			// KeyUP HB BULAN 8 - 12 Bulan
			$('#inHB812BULAN').keyup(function() {
				$('#notifinHB812BULAN').html('');
				a = $('#inHB812BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB812BULAN').html(html);
				}else if (a >= 10.5 && a <= 13.1) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB812BULAN').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB812BULAN').html(html);
				}
			});

	// END 

			// KeyUP LEUKOSIT
			$('#inLEUKOSITBULAN').keyup(function() {
				$('#notifinLEUKOSITBULAN').html('');
				a = $('#inLEUKOSITBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITBULAN').html(html);
				}else if (a >= 5000 && a <= 10000) {
					html = '<b style="color:blue">LEUKOSIT NORMAL</b>';
					$('#notifinLEUKOSITBULAN').html(html);
				} else{
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSITBULAN').html(html);
				}
			});

			// KeyUP TROMBOSIT
			$('#inTROMBOSITBULAN').keyup(function() {
				$('#notifinTROMBOSITBULAN').html('');
				a = $('#inTROMBOSITBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTROMBOSITBULAN').html(html);
				}else if (a >= 150000 && a <= 400000) {
					html = '<b style="color:blue">TROMBOSIT NORMAL</b>';
					$('#notifinTROMBOSITBULAN').html(html);
				} else{
					html = '<b style="color:red">TROMBOSIT TIDAK NORMAL</b>';
					$('#notifinTROMBOSITBULAN').html(html);
				}
			});

	//HEMATOKRIT
			// KeyUP HEMATOKRIT	UMUR 40 - 50 Hari		
			$('#inHEMATOKRIT4050BULAN').keyup(function() {
				$('#notifinHEMATOKRIT4050BULAN').html('');
				a = $('#inHEMATOKRIT4050BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT4050BULAN').html(html);
				}else if (a >= 30 && a <= 54) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL </b>';
					$('#notifinHEMATOKRIT4050BULAN').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT4050BULAN').html(html);
				}
			});

			// KeyUP HEMATOKRIT	UMUR >50 Hari - 2.5 Bulan	
			$('#inHEMATOKRIT5025BULAN').keyup(function() {
				$('#notifinHEMATOKRIT5025BULAN').html('');
				a = $('#inHEMATOKRIT5025BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT5025BULAN').html(html);
				}else if (a >= 30 && a <= 46) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL </b>';
					$('#notifinHEMATOKRIT5025BULAN').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT5025BULAN').html(html);
				}
			});

			// KeyUP HEMATOKRIT	UMUR 2.6 - 3.5 Bulan	
			$('#inHEMATOKRIT2635BULAN').keyup(function() {
				$('#notifinHEMATOKRIT2635BULAN').html('');
				a = $('#inHEMATOKRIT2635BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT2635BULAN').html(html);
				}else if (a >= 31 && a <= 43) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL</b>';
					$('#notifinHEMATOKRIT2635BULAN').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT2635BULAN').html(html);
				}
			});

			// KeyUP HEMATOKRIT	UMUR 4 - 7 Bulan	
			$('#inHEMATOKRIT47BULAN').keyup(function() {
				$('#notifinHEMATOKRIT47BULAN').html('');
				a = $('#inHEMATOKRIT47BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT47BULAN').html(html);
				}else if (a >= 32 && a <= 44) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL</b>';
					$('#notifinHEMATOKRIT47BULAN').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT47BULAN').html(html);
				}
			});

			// KeyUP HEMATOKRIT	UMUR 8 - 12 Bulan
			$('#inHEMATOKRIT812BULAN').keyup(function() {
				$('#notifinHEMATOKRIT812BULAN').html('');
				a = $('#inHEMATOKRIT812BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT812BULAN').html(html);
				}else if (a >= 35 && a <= 43) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL</b>';
					$('#notifinHEMATOKRIT812BULAN').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT812BULAN').html(html);
				}
			});
	// End

			// KeyUP BAS			
			$('#inBASBULAN').keyup(function() {
				$('#notifinBASBULAN').html('');
				a = $('#inBASBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBASBULAN').html(html);
				}else if (a >= 0 && a <= 1) {
					html = '<b style="color:blue">BAS NORMAL</b>';
					$('#notifinBASBULAN').html(html);
				} else{
					html = '<b style="color:red">BAS TIDAK NORMAL</b>';
					$('#notifinBASBULAN').html(html);
				}
			});

			// KeyUP EOS			
			$('#inEOSBULAN').keyup(function() {
				$('#notifinEOSBULAN').html('');
				a = $('#inEOSBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinEOSBULAN').html(html);
				}else if (a >= 1 && a <= 5) {
					html = '<b style="color:blue">EOS NORMAL</b>';
					$('#notifinEOSBULAN').html(html);
				} else{
					html = '<b style="color:red">EOS TIDAK NORMAL</b>';
					$('#notifinEOSBULAN').html(html);
				}
			});

			// KeyUP MONO		
			$('#inMONOBULAN').keyup(function() {
				$('#notifinMONOBULAN').html('');
				a = $('#inMONOBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMONOBULAN').html(html);
				}else if (a >= 1 && a <= 11) {
					html = '<b style="color:blue">MONO NORMAL</b>';
					$('#notifinMONOBULAN').html(html);
				} else{
					html = '<b style="color:red">MONO TIDAK NORMAL</b>';
					$('#notifinMONOBULAN').html(html);
				}
			});

			// KeyUP SEGMEN		
			$('#inSEGMENBULAN').keyup(function() {
				$('#notifinSEGMENBULAN').html('');
				a = $('#inSEGMENBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSEGMENBULAN').html(html);
				}else if (a >= 17 && a <= 60) {
					html = '<b style="color:blue">SEGMEN NORMAL</b>';
					$('#notifinSEGMENBULAN').html(html);
				} else{
					html = '<b style="color:red">SEGMEN TIDAK NORMAL</b>';
					$('#notifinSEGMENBULAN').html(html);
				}
			});

			// KeyUP LYMPO		
			$('#inLYMPOBULAN').keyup(function() {
				$('#notifinLYMPOBULAN').html('');
				a = $('#inLYMPOBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLYMPOBULAN').html(html);
				}else if (a >= 20 && a <= 70) {
					html = '<b style="color:blue">LYMPO NORMAL</b>';
					$('#notifinLYMPOBULAN').html(html);
				} else{
					html = '<b style="color:red">LYMPO TIDAK NORMAL</b>';
					$('#notifinLYMPOBULAN').html(html);
				}
			});

	// MCV
			// KeyUP MCV 37 Hari
			$('#inMCV37BULAN').keyup(function() {
				$('#notifinMCV37BULAN').html('');
				a = $('#inMCV37BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV37BULAN').html(html);
				}else if (a >= 82 && a <= 126) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV37BULAN').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV37BULAN').html(html);
				}
			});

			// KeyUP MCV 1.5 - 2.5 Bulan
			$('#inMCV1525BULAN').keyup(function() {
				$('#notifinMCV1525BULAN').html('');
				a = $('#inMCV1525BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV1525BULAN').html(html);
				}else if (a >= 81 && a <= 121) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV1525BULAN').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV1525BULAN').html(html);
				}
			});

			// KeyUP MCV 2.6 - 3.5 Bulan
			$('#inMCV2635BULAN').keyup(function() {
				$('#notifinMCV2635BULAN').html('');
				a = $('#inMCV2635BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV2635BULAN').html(html);
				}else if (a >= 77 && a <= 113) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV2635BULAN').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV2635BULAN').html(html);
				}
			});

			// KeyUP MCV 3.5 - 7 Bulan
			$('#inMCV357BULAN').keyup(function() {
				$('#notifinMCV357BULAN').html('');
				a = $('#inMCV357BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV357BULAN').html(html);
				}else if (a >= 73 && a <= 109) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV357BULAN').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV357BULAN').html(html);
				}
			});

			// KeyUP MCV 7 - 12 Bulan
			$('#inMCV712BULAN').keyup(function() {
				$('#notifinMCV712BULAN').html('');
				a = $('#inMCV712BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV712BULAN').html(html);
				}else if (a >= 74 && a <= 106) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV712BULAN').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV712BULAN').html(html);
				}
			});
	//  End

	// MCH
			// KeyUP MCH UMUR 37 Hari
			$('#inMCH37BULAN').keyup(function() {
				$('#notifinMCH37BULAN').html('');
				a = $('#inMCH37BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH37BULAN').html(html);
				}else if (a >= 26 && a <= 38) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH37BULAN').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH37BULAN').html(html);
				}
			});

			// KeyUP MCH UMUR 1 - 1.5 Bulan
			$('#inMCH15BULAN').keyup(function() {
				$('#notifinMCH15BULAN').html('');
				a = $('#inMCH15BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH15BULAN').html(html);
				}else if (a >= 25 && a <= 38) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH15BULAN').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH15BULAN').html(html);
				}
			});

			// KeyUP MCH UMUR 2 - 2.5 Bulan
			$('#inMCH225BULAN').keyup(function() {
				$('#notifinMCH225BULAN').html('');
				a = $('#inMCH225BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH225BULAN').html(html);
				}else if (a >= 24 && a <= 36) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH225BULAN').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH225BULAN').html(html);
				}
			});

			// KeyUP MCH UMUR 2.6 - 3.5 Bulan
			$('#inMCH2635BULAN').keyup(function() {
				$('#notifinMCH2635BULAN').html('');
				a = $('#inMCH2635BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH2635BULAN').html(html);
				}else if (a >= 23 && a <= 36) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH2635BULAN').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH2635BULAN').html(html);
				}
			});

			// KeyUP MCH UMUR 3.6 - 10 Bulan
			$('#inMCH3610BULAN').keyup(function() {
				$('#notifinMCH3610BULAN').html('');
				a = $('#inMCH3610BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH3610BULAN').html(html);
				}else if (a >= 21 && a <= 33) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH3610BULAN').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH3610BULAN').html(html);
				}
			});

			// KeyUP MCH UMUR 11 Bulan - 5 Tahun
			$('#inMCH115BULAN').keyup(function() {
				$('#notifinMCH115BULAN').html('');
				a = $('#inMCH115BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH115BULAN').html(html);
				}else if (a >= 23 && a <= 31) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH115BULAN').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH115BULAN').html(html);
				}
			});


	// End

	// MCHC
			// KeyUP MCHC UMUR 37 Hari
			$('#inMCHC37BULAN').keyup(function() {
				$('#notifinMCHC37BULAN').html('');
				a = $('#inMCHC37BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHC37BULAN').html(html);
				}else if (a >= 25 && a <= 37) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHC37BULAN').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHC37BULAN').html(html);
				}
			});

			// KeyUP MCHC UMUR 40 Hari - 7 Bulan
			$('#inMCHC407BULAN').keyup(function() {
				$('#notifinMCHC407BULAN').html('');
				a = $('#inMCHC407BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHC407BULAN').html(html);
				}else if (a >= 26 && a <= 34) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHC407BULAN').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHC407BULAN').html(html);
				}
			});

			// KeyUP MCHC UMUR 8 - 12 Bulan
			$('#inMCHC812BULAN').keyup(function() {
				$('#notifinMCHC812BULAN').html('');
				a = $('#inMCHC812BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHC812BULAN').html(html);
				}else if (a >= 28 && a <= 32) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHC812BULAN').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHC812BULAN').html(html);
				}
			});


	// End
			// KeyUP RDW-CV
			$('#inRDW-CVBULAN').keyup(function() {
				$('#notifinRDW-CVBULAN').html('');
				a = $('#inRDW-CVBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRDW-CVBULAN').html(html);
				}else if (a >= 11.0 && a <= 16.0) {
					html = '<b style="color:blue">RDW-CV NORMAL</b>';
					$('#notifinRDW-CVBULAN').html(html);
				} else{
					html = '<b style="color:red">RDW-CV TIDAK NORMAL</b>';
					$('#notifinRDW-CVBULAN').html(html);
				}
			});

			// KeyUP RDW-SD
			$('#inRDW-SDBULAN').keyup(function() {
				$('#notifinRDW-SDBULAN').html('');
				a = $('#inRDW-SDBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRDW-SDBULAN').html(html);
				}else if (a >= 35.0 && a <= 56.0) {
					html = '<b style="color:blue">RDW-SD NORMAL</b>';
					$('#notifinRDW-SDBULAN').html(html);
				} else{
					html = '<b style="color:red">RDW-SD TIDAK NORMAL</b>';
					$('#notifinRDW-SDBULAN').html(html);
				}
			});

			// KeyUP LED
			$('#inLEDBULAN').keyup(function() {
				$('#notifinLEDBULAN').html('');
				a = $('#inLEDBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEDBULAN').html(html);
				}else if (a >= 0 && a <= 10) {
					html = '<b style="color:blue">LED NORMAL PRIA BULAN</b>';
					$('#notifinLEDBULAN').html(html);
				}else if (a >= 0 && a <= 15) {
					html = '<b style="color:blue">LED NORMAL WANITA BULAN</b>';
					$('#notifinLEDBULAN').html(html);
				} else{
					html = '<b style="color:red">LED TIDAK NORMAL</b>';
					$('#notifinLEDBULAN').html(html);
				}
			});

			// Keyup PH
			$('#inPHBULAN').keyup(function() {
				$('#notifinPHBULAN').html('');
				a = $('#inPHBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPHBULAN').html(html);
				}else if (a >= 7.35 && a <= 7.45) {
					html = '<b style="color:blue">NILAI PH NORMAL</b>';
					$('#notifinPHBULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI PH TIDAK NORMAL</b>';
					$('#notifinPHBULAN').html(html);
				}
			});

			// Keyup PCO2
			$('#inPCO2BULAN').keyup(function() {
				$('#notifinPCO2BULAN').html('');
				a = $('#inPCO2BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPCO2BULAN').html(html);
				}else if (a >= 41 && a <= 51) {
					html = '<b style="color:blue">NILAI PCO2 NORMAL</b>';
					$('#notifinPCO2BULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI PCO2 TIDAK NORMAL</b>';
					$('#notifinPCO2BULAN').html(html);
				}
			});

			// Keyup PO2
			$('#inPO2BULAN').keyup(function() {
				$('#notifinPO2BULAN').html('');
				a = $('#inPO2BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPO2BULAN').html(html);
				}else if (a >= 80 && a <= 100) {
					html = '<b style="color:blue">NILAI PO2 NORMAL</b>';
					$('#notifinPO2BULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI PO2 TIDAK NORMAL</b>';
					$('#notifinPO2BULAN').html(html);
				}
			});

				// Keyup HCO3
			$('#inHCO3BULAN').keyup(function() {
			$('#notifinHCO3BULAN').html('');
				a = $('#inHCO3BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHCO3BULAN').html(html);
				}else if (a >= 24 && a <= 28) {
					html = '<b style="color:blue">NILAI HCO3 NORMAL</b>';
					$('#notifinHCO3BULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI HCO3 TIDAK NORMAL</b>';
					$('#notifinHCO3BULAN').html(html);
				}
			});

			// Keyup BE
			$('#inBEBULAN').keyup(function() {
				$('#notifinBEBULAN').html('');
				a = $('#inBEBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBEBULAN').html(html);
				}
			});

			// Keyup SO2
			$('#inSO2BULAN').keyup(function() {
				$('#notifinSO2BULAN').html('');
				a = $('#inSO2BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSO2BULAN').html(html);
				}else if (a >= 93 && a <= 99) {
					html = '<b style="color:blue">NILAI SO2 NORMAL</b>';
					$('#notifinSO2BULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI SO2 TIDAK NORMAL</b>';
					$('#notifinSO2BULAN').html(html);
				}
			});

			// Keyup SUHU
			$('#inSUHUBULAN').keyup(function() {
				$('#notifinSUHUBULAN').html('');
				a = $('#inSUHUBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSUHUBULAN').html(html);
				}else if (a >= 36.8 && a <= 37.8) {
					html = '<b style="color:blue">NILAI SUHU NORMAL</b>';
					$('#notifinSUHUBULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI SUHU TIDAK NORMAL</b>';
					$('#notifinSUHUBULAN').html(html);
				}
			});

			// Keyup OKSIGEN
			$('#inOKSIGENBULAN').keyup(function() {
				$('#notifinOKSIGENBULAN').html('');
				a = $('#inOKSIGENBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinOKSIGENBULAN').html(html);
				}else if (a == 12) {
					html = '<b style="color:blue">NILAI OKSIGEN NORMAL</b>';
					$('#notifinOKSIGENBULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI OKSIGEN TIDAK NORMAL</b>';
					$('#notifinOKSIGENBULAN').html(html);
				}
			});

			// Keyup SATURASI
			$('#inSATURASIBULAN').keyup(function() {
				$('#notifinSATURASIBULAN').html('');
				a = $('#inSATURASIBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSATURASIBULAN').html(html);
				}else if (a >= 90) {
					html = '<b style="color:blue">NILAI SATURASI NORMAL</b>';
					$('#notifinSATURASIBULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI SATURASI TIDAK NORMAL</b>';
					$('#notifinSATURASIBULAN').html(html);
				}
			});
			
			// KeyUP RHESUS BULAN
			$('#inRHESUSBULAN').keyup(function() {
				$('#notifinRHESUSBULAN').html('');
				a = $('#inRHESUSBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRHESUSBULAN').html(html);
				}
			});

			// KeyUP GOL-DARAH BULAN
			$('#inGOLDARAHBULAN').keyup(function() {
				$('#notifinGOLDARAHBULAN').html('');
				a = $('#inGOLDARAHBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinGOLDARAHBULAN').html(html);
				}
			});


			// KeyUP BLT BULAN
			$('#inBLTBULAN').keyup(function() {
				$('#notifinBLTBULAN').html('');
				a = $('#inBLTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBLTBULAN').html(html);
				}else if( a >= 2 && a <= 6){
					html = '<b style="color:blue">BLT NORMAL</b>';
					$('#notifinBLTBULAN').html(html);
				}else{
					html = '<b style="color:red">BLT TIDAK NORMAL</b>';
					$('#notifinBLTBULAN').html(html);
				}
			});

			// KeyUP CLT BULAN
			$('#inCLTBULAN').keyup(function() {
				$('#notifinCLTBULAN').html('');
				a = $('#inCLTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCLT').html(html);
				}else if( a >= 2 && a <= 6){
					html = '<b style="color:blue">CLT NORMAL</b>';
					$('#notifinCLTBULAN').html(html);
				}else{
					html = '<b style="color:red">CLT TIDAK NORMAL</b>';
					$('#notifinCLTBULAN').html(html);
				}
			});

			// KeyUP APTT
			$('#inAPTTBULAN').keyup(function() {
				$('#notifinAPTTBULAN').html('');
				a = $('#inAPTTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinAPTTBULAN').html(html);
				}else if( a >= 25 && a <= 40){
					html = '<b style="color:blue">APTT NORMAL</b>';
					$('#notifinAPTTBULAN').html(html);
				}else{
					html = '<b style="color:red">APTT TIDAK NORMAL</b>';
					$('#notifinAPTTBULAN').html(html);
				}
			});

			
			// keyUp INR PT/APTT
			$('#inINRPTAPTTBULAN').keyup(function() {
				$('#notifinINRPTAPTTBULAN').html('');
				a = $('#inINRPTAPTTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinINRPTAPTTBULAN').html(html);
				}else if( a >= 0.7 && a <= 1.3){
					html = '<b style="color:blue">INR NORMAL</b>';
					$('#notifinINRPTAPTTBULAN').html(html);
				}else{
					html = '<b style="color:red">INR TIDAK NORMAL</b>';
					$('#notifinINRPTAPTTBULAN').html(html);
				}
			});
			// End

			// keyUp PT
			$('#inPTBULAN').keyup(function() {
				$('#notifinPTBULAN').html('');
				a = $('#inPTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPTBULAN').html(html);
				}else if( a >= 11 && a <= 16){
					html = '<b style="color:blue">PT NORMAL</b>';
					$('#notifinPTBULAN').html(html);
				}else{
					html = '<b style="color:red">PT TIDAK NORMAL</b>';
					$('#notifinPTBULAN').html(html);
				}
			});
			// End

			// keyUp PT/APTT
			$('#inPTAPTTBULAN').keyup(function() {
				$('#notifinPTAPTTBULAN').html('');
				a = $('#inPTAPTTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPTAPTTBULAN').html(html);
				}else if( a >= 11 && a <= 16){
					html = '<b style="color:blue">PT NORMAL</b>';
					$('#notifinPTAPTTBULAN').html(html);
				}else{
					html = '<b style="color:red">PT TIDAK NORMAL</b>';
					$('#notifinPTAPTTBULAN').html(html);
				}
			});
			// End

			// KeyUP GULDARAH
			$('#inGULDARAHBULAN').keyup(function() {
				$('#notifinGULDARAHBULAN').html('');
				a = $('#inGULDARAHBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinGULDARAHBULAN').html(html);
				}else if( a >= 54 && a <= 103){
					html = '<b style="color:blue">GULA DARAH NORMAL</b>';
					$('#notifinGULDARAHBULAN').html(html);
				}else{
					html = '<b style="color:red">GULA DARAH TIDAK NORMAL</b>';
					$('#notifinGULDARAHBULAN').html(html);
				}
			});

			// KeyUP HBA
			$('#inHBABULAN').keyup(function() {
				$('#notifinHBABULAN').html('');
				a = $('#inHBABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBABULAN').html(html);
				}else if( a >= 4 && a <= 5.6){
					html = '<b style="color:blue">HBA1C NORMAL</b>';
					$('#notifinHBABULAN').html(html);
				}else{
					html = '<b style="color:red">HBA1C TIDAK NORMAL</b>';
					$('#notifinHBABULAN').html(html);
				}
			});

			// KeyUP URIC
			$('#inURICBULAN').keyup(function() {
				$('#notifinURICBULAN').html('');
				a = $('#inURICBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinURICBULAN').html(html);
				}else if( a == 2.0){
					html = '<b style="color:blue">URIC ACID NORMAL</b>';
					$('#notifinURICBULAN').html(html);
				}else{
					html = '<b style="color:red">URIC ACID TIDAK NORMAL</b>';
					$('#notifinURICBULAN').html(html);
				}
			});
			
			// KeyUP TRIGLYSERIDE
			$('#inTRIGLYSERIDEBULAN').keyup(function() {
				$('#notifinTRIGLYSERIDEBULAN').html('');
				a = $('#inTRIGLYSERIDEBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTRIGLYSERIDEBULAN').html(html);
				}else if( a >= 60 && a <= 150){
					html = '<b style="color:blue">TRIGLISERIDA NORMAL</b>';
					$('#notifinTRIGLYSERIDEBULAN').html(html);
				}else{
					html = '<b style="color:red">TRIGLISERIDA TIDAK NORMAL</b>';
					$('#notifinTRIGLYSERIDEBULAN').html(html);
				}
			});

			// KeyUP CHO
			$('#inCHOBULAN').keyup(function() {
				$('#notifinCHOBULAN').html('');
				a = $('#inCHOBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCHOBULAN').html(html);
				}else if( a >= 120 && a <= 200){
					html = '<b style="color:blue">CHO NORMAL</b>';
					$('#notifinCHOBULAN').html(html);
				}else{
					html = '<b style="color:red">CHO TIDAK NORMAL</b>';
					$('#notifinCHOBULAN').html(html);
				}
			});

			// KeyUP HDL
			$('#inHDLBULAN').keyup(function() {
				$('#notifinHDLBULAN').html('');
				a = $('#inHDLBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHDLBULAN').html(html);
				}else if( a >= 35 && a <= 60){
					html = '<b style="color:blue">HDL NORMAL</b>';
					$('#notifinHDLBULAN').html(html);
				}else{
					html = '<b style="color:red">HDL TIDAK NORMAL</b>';
					$('#notifinHDLBULAN').html(html);
				}
			});

			// KeyUP LDL
			$('#inLDLBULAN').keyup(function() {
				$('#notifinLDLBULAN').html('');
				a = $('#inLDLBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLDLBULAN').html(html);
				}else if( a < 150){
					html = '<b style="color:blue">LDL NORMAL</b>';
					$('#notifinLDLBULAN').html(html);
				}else{
					html = '<b style="color:red">LDL TIDAK NORMAL</b>';
					$('#notifinLDLBULAN').html(html);
				}
			});

			// KeyUP UREUM
			$('#inUREUMBULAN').keyup(function() {
				$('#notifinUREUMBULAN').html('');
				a = $('#inUREUMBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinUREUMBULAN').html(html);
				}else if( a >= 10 && a <= 50){
					html = '<b style="color:blue">UREUM NORMAL</b>';
					$('#notifinUREUMBULAN').html(html);
				}else{
					html = '<b style="color:red">UREUM TIDAK NORMAL</b>';
					$('#notifinUREUMBULAN').html(html);
				}
			});

			// KeyUP CREATININ
			$('#inCREATININBULAN').keyup(function() {
				$('#notifinCREATININBULAN').html('');
				a = $('#inCREATININBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCREATININBULAN').html(html);
				}else if (a >= 0.2 && a <= 0.4) {
					html = '<b style="color:blue">CREATININ NORMAL</b>';
					$('#notifinCREATININBULAN').html(html);
				} else{
					html = '<b style="color:red">CREATININ TIDAK NORMAL</b>';
					$('#notifinCREATININBULAN').html(html);
				}
			});
			
			// KeyUP SGOT
			$('#inSGOTBULAN').keyup(function() {
				$('#notifinSGOTBULAN').html('');
				a = $('#inSGOTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGOTBULAN').html(html);
				}else if( a >= 9 && a <= 80){
					html = '<b style="color:blue">SGOT NORMAL </b>';
					$('#notifinSGOTBULAN').html(html);
				}else{
					html = '<b style="color:red">SGOT TIDAK NORMAL</b>';
					$('#notifinSGOTBULAN').html(html);
				}
			});

			// KeyUP SGPT
			$('#inSGPTBULAN').keyup(function() {
				$('#notifinSGPTBULAN').html('');
				a = $('#inSGPTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGPTBULAN').html(html);
				}else if( a >= 13 && a <= 45){
					html = '<b style="color:blue">SGPT NORMAL </b>';
					$('#notifinSGPTBULAN').html(html);
				}else{
					html = '<b style="color:red">SGPT TIDAK NORMAL</b>';
					$('#notifinSGPTBULAN').html(html);
				}
			});
			// End

			// KeyUP NA
			$('#inNABULAN').keyup(function() {
				$('#notifinNABULAN').html('');
				a = $('#inNABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNABULAN').html(html);
				}else if( a >= 128 && a <= 138){
					html = '<b style="color:blue">NA NORMAL</b>';
					$('#notifinNABULAN').html(html);
				}else{
					html = '<b style="color:red">NA TIDAK NORMAL</b>';
					$('#notifinNABULAN').html(html);
				}
			});

			//KeyUp K
			$('#inKBULAN').keyup(function() {
				$('#notifinKBULAN').html('');
				a = $('#inKBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKBULAN').html(html);
				}else if( a >= 3.9 && a <= 4.9){
					html = '<b style="color:blue">K NORMAL</b>';
					$('#notifinKBULAN').html(html);
				}else{
					html = '<b style="color:red">K TIDAK NORMAL</b>';
					$('#notifinKBULAN').html(html);
				}
			});

			$('#inCLBULAN').keyup(function() {
				$('#notifinCLBULAN').html('');
				a = $('#inCLBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCLBULAN').html(html);
				}else if( a >= 88 && a <= 100){
					html = '<b style="color:blue">CL NORMAL</b>';
					$('#notifinCLBULAN').html(html);
				}else{
					html = '<b style="color:red">CL TIDAK NORMAL</b>';
					$('#notifinCLBULAN').html(html);
				}
			});

			//Ca
			$('#inCaBULAN').keyup(function() {
				$('#notifinCaBULAN').html('');
				a = $('#inCaBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCaBULAN').html(html);
				}else if( a >= 0.99 && a <= 1.29){
					html = '<b style="color:blue">Ca NORMAL</b>';
					$('#notifinCaBULAN').html(html);
				}else{
					html = '<b style="color:red">Ca TIDAK NORMAL</b>';
					$('#notifinCaBULAN').html(html);
				}
			});
			// End

			// keyUp PROTEIN 
			$('#inPROTEINBULAN').keyup(function() {
				$('#notifinPROTEINBULAN').html('');
				a = $('#inPROTEINBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEINBULAN').html(html);
				}else if( a >= 5.1 && a <= 7.3){
					html = '<b style="color:blue">PROTEIN  NORMAL</b>';
					$('#notifinPROTEINBULAN').html(html);
				}else{
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEINBULAN').html(html);
				}
			});
			// End

			// keyUp ALBUMIN BULAN
			$('#inALBUMINBULAN').keyup(function() {
				$('#notifinALBUMINBULAN').html('');
				a = $('#inALBUMINBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinALBUMINBULAN').html(html);
				}else if( a >= 3.8 && a <= 5.4){
					html = '<b style="color:blue">ALBUMIN  NORMAL</b>';
					$('#notifinALBUMINBULAN').html(html);
				}else{
					html = '<b style="color:red">ALBUMIN TIDAK NORMAL</b>';
					$('#notifinALBUMINBULAN').html(html);
				}
			});
			// End

			// keyUp PROTEIN 
			$('#inPROTEINGLOBULINBULAN').keyup(function() {
				$('#notifinPROTEINGLOBULINBULAN').html('');
				a = $('#inPROTEINGLOBULINBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEINGLOBULINBULAN').html(html);
				}else if( a >= 6.4 && a <= 8.3){
					html = '<b style="color:blue">PROTEIN NORMAL</b>';
					$('#notifinPROTEINGLOBULINBULAN').html(html);
				}else{
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEINGLOBULINBULAN').html(html);
				}
			});
			// End

			// keyUp MALARIA
			$('#inMALARIABULAN').keyup(function() {
				$('#notifinMALARIABULAN').html('');
				a = $('#inMALARIABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMALARIABULAN').html(html);
				}
			});
			// End

			// keyUp WIDAL
			$('#inWIDALBULAN').keyup(function() {
				$('#notifinWIDALBULAN').html('');
				a = $('#inWIDALBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinWIDALBULAN').html(html);
				}
			});
			// End

			// keyUp TROPONIN
			$('#inTROPONINBULAN').keyup(function() {
				$('#notifinTROPONINBULAN').html('');
				a = $('#inTROPONINBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTROPONINBULAN').html(html);
				}
			});
			// End
			
			// keyUp NS1
			$('#inNS1BULAN').keyup(function() {
				$('#notifinNS1BULAN').html('');
				a = $('#inNS1BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNS1BULAN').html(html);
				}
			});
			// End

			// keyUp HBSAG
			$('#inHBSAGBULAN').keyup(function() {
				$('#notifinHBSAGBULAN').html('');
				a = $('#inHBSAGBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBSAGBULAN').html(html);
				}
			});
			// End
			
			// keyUp HBSAB
			$('#inHBSABBULAN').keyup(function() {
				$('#notifinHBSABBULAN').html('');
				a = $('#inHBSABBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBSABBULAN').html(html);
				}
			});
			// End

			// keyUp B20
			$('#inB20BULAN').keyup(function() {
				$('#notifinB20BULAN').html('');
				a = $('#inB20BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinB20BULAN').html(html);
				}
			});
			// End

			// keyUp VDRL
			$('#inVDRLBULAN').keyup(function() {
				$('#notifinVDRLBULAN').html('');
				a = $('#inVDRLBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinVDRLBULAN').html(html);
				}
			});
			// End

			// keyUp PLANO
			$('#inPLANOBULAN').keyup(function() {
				$('#notifinPLANOBULAN').html('');
				a = $('#inPLANOBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPLANOBULAN').html(html);
				}
			});
			// End

			// keyUp SALMONELLA
			$('#inSALMONELLABULAN').keyup(function() {
				$('#notifinSALMONELLABULAN').html('');
				a = $('#inSALMONELLABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSALMONELLABULAN').html(html);
				}
			});
			// End

			// keyUp DENGUE
			$('#inDENGUEBULAN').keyup(function() {
				$('#notifinDENGUEBULAN').html('');
				a = $('#inDENGUEBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinDENGUEBULAN').html(html);
				}
			});
			// End

			// keyUp WARNA
			$('#inWARNABULAN').keyup(function() {
				$('#notifinWARNABULAN').html('');
				a = $('#inWARNABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinWARNABULAN').html(html);
				}
			});
			// End

			// keyUp KEJERNIHAN
			$('#inKEJERNIHANBULAN').keyup(function() {
				$('#notifinKEJERNIHANBULAN').html('');
				a = $('#inKEJERNIHANBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKEJERNIHANBULAN').html(html);
				}
			});
			// End

			// keyUp ERITROSIT
			$('#inERITROSITURINEBULAN').keyup(function() {
				$('#notifinERITROSITURINEBULAN').html('');
				a = $('#inERITROSITURINEBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITURINEBULAN').html(html);
				}else if( a <= 1){
					html = '<b style="color:blue">ERITROSIT NORMAL</b>';
					$('#notifinERITROSITURINEBULAN').html(html);
				}else{
					html = '<b style="color:red">ERITROSIT TIDAK NORMAL</b>';
					$('#notifinERITROSITURINEBULAN').html(html);
				}
			});
			// End

			// keyUp LEUKOSIT
			$('#inLEUKOSITURINEBULAN').keyup(function() {
				$('#notifinLEUKOSITURINEBULAN').html('');
				a = $('#inLEUKOSITURINEBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITURINEBULAN').html(html);
				}else if( a <= 6){
					html = '<b style="color:blue">LEUKOSIT NORMAL</b>';
					$('#notifinLEUKOSITURINEBULAN').html(html);
				}else{
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSITURINEBULAN').html(html);
				}
			});
			// End

			// keyUp SEL EPITEL
			$('#inSELBULAN').keyup(function() {
				$('#notifinSELBULAN').html('');
				a = $('#inSELBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSELBULAN').html(html);
				}
			});
			// End

			// keyUp SILINDER
			$('#inSILINDERBULAN').keyup(function() {
				$('#notifinSILINDERBULAN').html('');
				a = $('#inSILINDERBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSILINDERBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">SILINDER NORMAL</b>';
					$('#notifinSILINDERBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:blue">SILINDER TIDAK NORMAL</b>';
					$('#notifinSILINDERBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinSILINDERBULAN').html(html);
				}
			});
			// End

			// keyUp KRISTAL
			$('#inKRISTALBULAN').keyup(function() {
				$('#notifinKRISTALBULAN').html('');
				a = $('#inKRISTALBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKRISTALBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">KRISTAL NORMAL</b>';
					$('#notifinKRISTALBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">KRISTAL TIDAK NORMAL</b>';
					$('#notifinKRISTALBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinKRISTALBULAN').html(html);
				}
			});
			// End

			// keyUp BAKTERI
			$('#inBAKTERIBULAN').keyup(function() {
				$('#notifinBAKTERIBULAN').html('');
				a = $('#inBAKTERIBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAKTERIBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">BAKTERI NORMAL</b>';
					$('#notifinBAKTERIBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">BAKTERI TIDAK NORMAL</b>';
					$('#notifinBAKTERIBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinBAKTERIBULAN').html(html);
				}
			});
			// End

			// keyUp JAMUR
			$('#inJAMURBULAN').keyup(function() {
				$('#notifinJAMURBULAN').html('');
				a = $('#inJAMURBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinJAMURBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">JAMUR NORMAL</b>';
					$('#notifinJAMURBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">JAMUR TIDAK NORMAL</b>';
					$('#notifinJAMURBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinJAMURBULAN').html(html);
				}
			});
			// End

			// keyUp ERIROSITKIMIA
			$('#inERITROSITKIMIABULAN').keyup(function() {
				$('#notifinERITROSITKIMIABULAN').html('');
				a = $('#inERITROSITKIMIABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITKIMIABULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">ERITROSIT NORMAL</b>';
					$('#notifinERITROSITKIMIABULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">ERITROSIT TIDAK NORMAL</b>';
					$('#notifinERITROSITKIMIABULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinERITROSITKIMIABULAN').html(html);
				}
			});
			// End

			// keyUp GLUKOSA
			$('#inGLUKOSABULAN').keyup(function() {
				$('#notifinGLUKOSABULAN').html('');
				a = $('#inGLUKOSABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinGLUKOSABULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">GLUKOSA NORMAL</b>';
					$('#notifinGLUKOSABULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">GLUKOSA TIDAK NORMAL</b>';
					$('#notifinGLUKOSABULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinGLUKOSABULAN').html(html);
				}
			});
			// End

			// keyUp PROTEINKIMIA
			$('#inPROTEINKIMIABULAN').keyup(function() {
				$('#notifinPROTEINKIMIABULAN').html('');
				a = $('#inPROTEINKIMIABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEINKIMIABULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">PROTEIN NORMAL</b>';
					$('#notifinPROTEINKIMIABULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEINKIMIABULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinPROTEINKIMIABULAN').html(html);
				}
			});
			// End

			// keyUp BILIRUBIN
			$('#inBILIRUBINBULAN').keyup(function() {
				$('#notifinBILIRUBINBULAN').html('');
				a = $('#inBILIRUBINBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBILIRUBINBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">BILIRUBIN NORMAL</b>';
					$('#notifinBILIRUBINBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">BILIRUBIN TIDAK NORMAL</b>';
					$('#notifinBILIRUBINBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinBILIRUBINBULAN').html(html);
				}
			});
			// End


			// keyUp PH
			$('#inPHKIMIABULAN').keyup(function() {
				$('#notifinPHKIMIABULAN').html('');
				a = $('#inPHKIMIABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPHKIMIABULAN').html(html);
				}else if( a >= 2 && a <= 8){
					html = '<b style="color:blue">PH NORMAL</b>';
					$('#notifinPHKIMIABULAN').html(html);
				}else{
					html = '<b style="color:red">PH TIDAK NORMAL</b>';
					$('#notifinPHKIMIABULAN').html(html);
				}
			});
			// End

			// keyUp BERAT
			$('#inBERATBULAN').keyup(function() {
				$('#notifinBERATBULAN').html('');
				a = $('#inBERATBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBERATBULAN').html(html);
				}else if( a >= 1003 && a <= 1029){
					html = '<b style="color:blue">BERAT JENIS NORMAL</b>';
					$('#notifinBERATBULAN').html(html);
				}else{
					html = '<b style="color:red">BERAT JENIS TIDAK NORMAL</b>';
					$('#notifinBERATBULAN').html(html);
				}
			});
			// End

			// keyUp KETON
			$('#inKETONBULAN').keyup(function() {
				$('#notifinKETONBULAN').html('');
				a = $('#inKETONBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKETONBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">KETON NORMAL</b>';
					$('#notifinKETONBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">KETON TIDAK NORMAL</b>';
					$('#notifinKETONBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinKETONBULAN').html(html);
				}
			});
			// End

			// keyUp NITRIT
			$('#inNITRITBULAN').keyup(function() {
				$('#notifinNITRITBULAN').html('');
				a = $('#inNITRITBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNITRITBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">NITRIT NORMAL</b>';
					$('#notifinNITRITBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">NITRIT TIDAK NORMAL</b>';
					$('#notifinNITRITBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinNITRITBULAN').html(html);
				}
			});
			// End

			// keyUp LEUKOSITKIMIA
			$('#inLEUKOSITKIMIABULAN').keyup(function() {
				$('#notifinLEUKOSITKIMIABULAN').html('');
				a = $('#inLEUKOSITKIMIABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITKIMIABULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">LEUKOSITNORMAL</b>';
					$('#notifinLEUKOSITKIMIABULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSITKIMIABULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinLEUKOSITKIMIABULAN').html(html);
				}
			});
			// End

			// keyUp UROBILINOGEN
			$('#inUROBILINOGENBULAN').keyup(function() {
				$('#notifinUROBILINOGENBULAN').html('');
				a = $('#inUROBILINOGENBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinUROBILINOGENBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">UROBILINOGEN NORMAL</b>';
					$('#notifinUROBILINOGENBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">UROBILINOGEN TIDAK NORMAL</b>';
					$('#notifinUROBILINOGENBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinUROBILINOGENBULAN').html(html);
				}
			});
			// End
			
			// keyUp ANALISA SPERMA
			$('#inSPERMABULAN').keyup(function() {
				$('#notifinSPERMABULAN').html('');
				a = $('#inSPERMABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSPERMABULAN').html(html);
				}
			});
			// End

			// keyUp DARAH FESES
			$('#inDARAHFESESBULAN').keyup(function() {
				$('#notifinDARAHFESESBULAN').html('');
				a = $('#inDARAHFESESBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinDARAHFESESBULAN').html(html);
				}
			});
			// End

			// keyUp LENDIR
			$('#inLENDIRBULAN').keyup(function() {
				$('#notifinLENDIRBULAN').html('');
				a = $('#inLENDIRBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLENDIRBULAN').html(html);
				}
			});
			// End

			// keyUp BAU
			$('#inBAUBULAN').keyup(function() {
				$('#notifinBAUBULAN').html('');
				a = $('#inBAUBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAUBULAN').html(html);
				}
			});
			// End
			
			// keyUp KONSISTENSI
			$('#inKONSISTENSIBULAN').keyup(function() {
				$('#notifinKONSISTENSIBULAN').html('');
				a = $('#inKONSISTENSIBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKONSISTENSIBULAN').html(html);
				}
			});
			// End
			
			// keyUp WARNA FESES
			$('#inWARNAFESESBULAN').keyup(function() {
				$('#notifinWARNAFESESBULAN').html('');
				a = $('#inWARNAFESESBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinWARNAFESESBULAN').html(html);
				}
			});
			// End

			// keyUp PARASIT
			$('#inPARASITBULAN').keyup(function() {
				$('#notifinPARASITBULAN').html('');
				a = $('#inPARASITBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPARASITBULAN').html(html);
				}
			});
			// End

			// keyUp LEUKOSIT FESES
			$('#inLEUKOSITFESESBULAN').keyup(function() {
				$('#notifinLEUKOSITFESESBULAN').html('');
				a = $('#inLEUKOSITFESESBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITFESESBULAN').html(html);
				}
			});
			// End

			// keyUp ERITROSIT FESES
			$('#inERITROSITFESESBULAN').keyup(function() {
				$('#notifinERITROSITFESESBULAN').html('');
				a = $('#inERITROSITFESESBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITFESESBULAN').html(html);
				}
			});
			// End

			// keyUp SEL EPITEL
			$('#inSELFESESBULAN').keyup(function() {
				$('#notifinSELFESESBULAN').html('');
				a = $('#inSELFESESBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSELFESESBULAN').html(html);
				}
			});
			// End

			// keyUp SILIDER
			$('#inSILIDERBULAN').keyup(function() {
				$('#notifinSILIDERBULAN').html('');
				a = $('#inSILIDERBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSILIDERBULAN').html(html);
				}
			});
			// End

			// keyUp TELUR CACING
			$('#inTELURBULAN').keyup(function() {
				$('#notifinTELURBULAN').html('');
				a = $('#inTELURBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTELURBULAN').html(html);
				}
			});
			// End

			// keyUp AMOEBA
			$('#inAMOEBABULAN').keyup(function() {
				$('#notifinAMOEBABULAN').html('');
				a = $('#inAMOEBABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinAMOEBABULAN').html(html);
				}
			});
			// End

			// keyUp BAKTERI FESES
			$('#inBAKTERIFESESBULAN').keyup(function() {
				$('#notifinBAKTERIFESESBULAN').html('');
				a = $('#inBAKTERIFESESBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAKTERIFESESBULAN').html(html);
				}
			});
			// End

			// keyUp INR
			$('#inINRBULAN').keyup(function() {
				$('#notifinINRBULAN').html('');
				a = $('#inINRBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinINRBULAN').html(html);
				}else if( a >= 0.7 && a <= 1.3){
					html = '<b style="color:blue">INR NORMAL</b>';
					$('#notifinINRBULAN').html(html);
				}else{
					html = '<b style="color:red">INR TIDAK NORMAL</b>';
					$('#notifinINRBULAN').html(html);
				}
			});
			// End

			// keyUp CRP
			$('#inCRPBULAN').keyup(function() {
				$('#notifinCRPBULAN').html('');
				a = $('#inCRPBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCRPBULAN').html(html);
				}else if( a <= 10){
					html = '<b style="color:blue">CRP NORMAL</b>';
					$('#notifinCRPBULAN').html(html);
				}else{
					html = '<b style="color:red">CRP TIDAK NORMAL</b>';
					$('#notifinCRPBULAN').html(html);
				}
			});
			// End
// End KeyUp Bayi Bulan
    </script>

<!-- END BULAN -->

<!-- Insert Script -->

	 <!--insert Darah Rutin Anak Bulan-->
	 <script type="text/javascript">
		function insert_bulan_darah() {
		    Nama_tindakan = $('#inNamaDARAHBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborDARAHBULAN').val();
			hb4050=$('#inHB4050BULAN').val();
			hb5025=$('#inHB5025BULAN').val();
			hb2635 =$('#inHB2635BULAN').val();
			hb47 =$('#inHB47BULAN').val();
			hb812 =$('#inHB812BULAN').val();
			leukosit=$('#inLEUKOSITBULAN').val();
			led=$('#inLEDBULAN').val();
			trombosit=$('#inTROMBOSITBULAN').val();
			hematokrit4050=$('#inHEMATOKRIT4050BULAN').val();
			hematokrit5025=$('#inHEMATOKRIT5025BULAN').val();
			hematokrit2635=$('#inHEMATOKRIT2635BULAN').val();
			hematokrit47=$('#inHEMATOKRIT47BULAN').val();
			hematokrit812=$('#inHEMATOKRIT812BULAN').val();
			mcv37=$('#inMCV37BULAN').val();
			mcv1525=$('#inMCV1525BULAN').val();
			mcv2635=$('#inMCV2635BULAN').val();
			mcv357=$('#inMCV357BULAN').val();
			mcv712=$('#inMCV712BULAN').val();
			mch37=$('#inMCH37BULAN').val();
			mch15=$('#inMCH15BULAN').val();
			mch225=$('#inMCH225BULAN').val();
			mch2635=$('#inMCH2635BULAN').val();
			mch3610=$('#inMCH3610BULAN').val();
			mch115=$('#inMCH115BULAN').val();
			mchc37=$('#inMCHC37BULAN').val();
			mchc407=$('#inMCHC407BULAN').val();
			mchc812=$('#inMCHC812BULAN').val();
			rdw_cv=$('#inRDW-CVBULAN').val();
			rdw_sd=$('#inRDW-SDBULAN').val();
			bas=$('#inBASBULAN').val();
			eos=$('#inEOSBULAN').val();
			mono=$('#inMONOBULAN').val();
			segmen=$('#inSEGMENBULAN').val();
			lympo=$('#inLYMPOBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_darah_rutin_bulan",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						hb4050:hb4050,
						hb5025:hb5025,
						hb2635:hb2635,
						hb47:hb47,
						hb812:hb812,
						leukosit:leukosit,
						led:led,
						trombosit:trombosit,
						hematokrit4050:hematokrit4050,
						hematokrit5025:hematokrit5025,
						hematokrit2635:hematokrit2635,
						hematokrit47:hematokrit47,
						hematokrit812:hematokrit812,
						mcv37:mcv37,
						mcv1525:mcv1525,
						mcv2635:mcv2635,
						mcv357:mcv357,
						mcv712:mcv712,
						mch37:mch37,
						mch15:mch15,
						mch225:mch225,
						mch2635:mch2635,
						mch3610:mch3610,
						mch115:mch115,
						mchc37:mchc37,
						mchc407:mchc407,
						mchc812:mchc812,
						rdw_cv:rdw_cv,
						rdw_sd:rdw_sd,
						bas:bas,
						eos:eos,
						mono:mono,
						segmen:segmen,
						lympo:lympo,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hb4050=$('#inHB4050BULAN').val("");
						hb5025=$('#inHB5025BULAN').val("");
						hb2635 =$('#inHB2635BULAN').val("");
						hb47 =$('#inHB47BULAN').val("");
						hb812 =$('#inHB812BULAN').val("");
						leukosit=$('#inLEUKOSITBULAN').val("");
						led=$('#inLEDBULAN').val("");
						trombosit=$('#inTROMBOSITBULAN').val();
						hematokrit4050=$('#inHEMATOKRIT4050BULAN').val("");
						hematokrit5025=$('#inHEMATOKRIT5025BULAN').val("");
						hematokrit2635=$('#inHEMATOKRIT2635BULAN').val("");
						hematokrit47=$('#inHEMATOKRIT47BULAN').val("");
						hematokrit812=$('#inHEMATOKRIT812BULAN').val("");
						mcv37=$('#inMCV37BULAN').val("");
						mcv1525=$('#inMCV1525BULAN').val("");
						mcv2635=$('#inMCV2635BULAN').val("");
						mcv357=$('#inMCV357BULAN').val("");
						mcv712=$('#inMCV712BULAN').val("");
						mch37=$('#inMCH37BULAN').val("");
						mch15=$('#inMCH15BULAN').val("");
						mch225=$('#inMCH225BULAN').val("");
						mch2635=$('#inMCH2635BULAN').val("");
						mch3610=$('#inMCH3610BULAN').val("");
						mch115=$('#inMCH115BULAN').val("");
						mchc37=$('#inMCHC37BULAN').val("");
						mchc407=$('#inMCHC407BULAN').val("");
						mchc812=$('#inMCHC812BULAN').val("");
						rdw_cv=$('#inRDW-CVBULAN').val("");
						rdw_sd=$('#inRDW-SDBULAN').val("");
						bas=$('#inBASBULAN').val("");
						eos=$('#inEOSBULAN').val("");
						mono=$('#inMONOBULAN').val("");
						segmen=$('#inSEGMENBULAN').val("");
						lympo=$('#inLYMPOBULAN').val("");
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

		//Insert golongan darah baby bulan
		function	insert_gol_darah_baby_bulan() {
		    Nama_tindakan = $('#inNamaGOLBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborGOLBULAN').val();
			golongan_darah_baby_bulan=$('#inGOLDARAHBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_golongan_darah_baby_bulan",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						gol_darah:golongan_darah_baby_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						golongan_darah_baby_bulan=$('#inGOLDARAHBULAN').val("");
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

		//Insert rhesus bulan
		function	insert_bulan_rhesus() {
		    Nama_tindakan = $('#inNamaRHESUSBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborRHESUSBULAN').val();
			rhesus_bulan=$('#inRHESUSBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_rhesus_baby_bulan",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						rhesus:rhesus_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						rhesus_bulan=$('#inRHESUSBULAN').val("");
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
		//End Rhesus

		//Insert aptt bulan
		function	insert_bulan_aptt() {
		    Nama_tindakan = $('#inNamaAPTTBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborAPTTBULAN').val();
			aptt_bulan=$('#inAPTTBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_aptt",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						aptt:aptt_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						aptt_bulan=$('#inAPTTBULAN').val("");
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
		//End Aptt

		//Insert Gula Darah
		function	insert_bulan_guldarah() {
		    Nama_tindakan = $('#inNamaGULDARAHBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborGULDARAHBULAN').val();
			guldarah_bulan=$('#inGULDARAHBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_guldarah",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						guldarah:guldarah_bulan,
						inJenisPasienBULAN
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						guldarah_bulan=$('#inGULDARAHBULAN').val("");
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
		//End Gula darah

		//Insert PT bulan
		function insert_bulan_pt() {
		    Nama_tindakan = $('#inNamaPTBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborPTBULAN').val();
			pt=$('#inPTBULAN').val();
			inr=$('#inINRBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_pt",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						pt:pt,
						inr:inr,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						pt=$('#inPTBULAN').val("");
						inr=$('#inINRBULAN').val("");
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
		//End PT Bulan

		//Insert PT/APTT bulan
		function	insert_bulan_ptaptt() {
		    Nama_tindakan = $('#inNamaPTAPTTBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborPTAPTTBULAN').val();
			pt=$('#inPTAPTTBULAN').val();
			inr=$('#inINRPTAPTTBULAN').val();
			aptt=$('#inAPTTPTAPTTBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_ptaptt",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						pt:pt,
						inr:inr,
						aptt:aptt,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						pt=$('#inPTAPTTBULAN').val("");
						inr=$('#inINRPTAPTTBULAN').val("");
						aptt=$('#inAPTTPTAPTTBULAN').val("");
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
		//End PTAPTT Bulan

		//Insert HBA bulan
		function	insert_bulan_hba() {
		    Nama_tindakan = $('#inNamaHBABULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborHBABULAN').val();
			hba=$('#inHBABULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_hba",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						hba:hba,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hba=$('#inHBABULAN').val("");
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
		//End HBA Bulan


		//Insert Uric Acid
		function	insert_bulan_uric() {
		    Nama_tindakan = $('#inNamaURICBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborURICBULAN').val();
			uric_acid12=$('#inURICBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_uric",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						uric_acid12:uric_acid12,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						uric_acid12=$('#inURICBULAN').val("");
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
		//End Uric Acid

		//Insert TRIGLISERIDA			
		function	insert_bulan_triglyseride() {
		    Nama_tindakan = $('#inNamaTRIGLYSERIDEBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborTRIGLYSERIDEBULAN').val();
			trigiserida=$('#inTRIGLYSERIDEBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_triglyseride",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						trigiserida:trigiserida,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						trigiserida=$('#inTRIGLYSERIDEBULAN').val("");
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
		//End TRIGLISERIDA	

		//Insert bulan UREUM		
		function	insert_bulan_ureum() {
		    Nama_tindakan = $('#inNamaUREUMBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborUREUMBULAN').val();
		    Harga=$('#Harga_ureum_bulan').val();
		    Frekuensi = $("#Frek_ureum_bulan").val();
			id_pelayanan = $('#id_pelayanan_ureum_bulan').val();
			id_list_tindakan= $('#id_list_tindakan_ureum_bulan').val();
			Total= $('#total_ureum_bulan').val();
			tanggal= $('#tanggal_ureum_bulan').val();
			id_staff=$('#id_staff_ureum_bulan').val();
			ureum_bulan=$('#inUREUMBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_ureum",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						ureum:ureum_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						ureum_bulan=$('#inUREUMBULAN').val("");
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
		//End UREUM	

		//Insert bulan CREATININ		
		function	insert_bulan_creatinin() {
		    Nama_tindakan = $('#inNamaCREATININBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborCREATININBULAN').val();
			creatinin_bulan=$('#inCREATININBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_creatinin",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						creatinin:creatinin_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						creatinin_bulan=$('#inCREATININBULAN').val("");
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
		//End CREATININ

		//Insert bulan PROTEIN		
		function	insert_bulan_protein() {
		    Nama_tindakan = $('#inNamaPROTEINBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborPROTEINBULAN').val();
			protein_bulan=$('#inPROTEINBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_protein",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						protein:protein_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						protein_bulan=$('#inPROTEINBULAN').val("");
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
		//End PROTEIN

		//Insert bulan ALBUMIN		
		function	insert_bulan_albumin() {
		    Nama_tindakan = $('#inNamaALBUMINBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborALBUMINBULAN').val();
			albumin_bulan=$('#inALBUMINBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_albumin",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						albumin:albumin_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						albumin_bulan=$('#inALBUMINBULAN').val("");
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
		//End ALBUMIN

		//Insert bulan ELEKTROLIT		
		function	insert_bulan_elektrolit() {
		    Nama_tindakan = $('#inNamaELEKTROLITBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborELEKTROLITBULAN').val();
			na_bulan=$('#inNABULAN').val();
			k_bulan=$('#inKBULAN').val();
			cl_bulan=$('#inCLBULAN').val();
			ca_bulan=$('#inCaBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_elektrolit",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						na:na_bulan,
						k:k_bulan,
						cl:cl_bulan,
						ca:ca_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						na_bulan=$('#inNABULAN').val("");
						k_bulan=$('#inKBULAN').val("");
						cl_bulan=$('#inCLBULAN').val("");
						ca_bulan=$('#inCaBULAN').val("");
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
		//End ELEKTROLIT

		//Insert bulan SGPT		
		function	insert_bulan_sgpt() {
		    Nama_tindakan = $('#inNamaSGPTBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborSGPTBULAN').val();
			sgpt_bulan=$('#inSGPTBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_sgpt",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						sgpt:sgpt_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sgpt_bulan=$('#inSGPTBULAN').val("");
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
		//End SGPT

		//Insert bulan SGOT	
		function	insert_bulan_sgot() {
		    Nama_tindakan = $('#inNamaSGOTBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborSGOTBULAN').val();
			sgot_bulan=$('#inSGOTBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_sgot",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						sgot:sgot_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sgot_bulan=$('#inSGOTBULAN').val("");
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
		//End SGOT

		//Insert bulan CRP
		function	insert_bulan_crp() {
		    Nama_tindakan = $('#inNamaCRPBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborCRPBULAN').val();
			crp_bulan=$('#inCRPBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_crp",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						crp:crp_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						crp_bulan=$('#inCRPBULAN').val("");
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
		//End CRP

		//Insert CHOLESTEROL					
		function	insert_bulan_cho() {
		    Nama_tindakan = $('#inNamaCHOBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborCHOBULAN').val();
			cho=$('#inCHOBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_cho",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						cho:cho,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						cho=$('#inCHOBULAN').val("");
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
		//End CHOLESTEROL		

		//Insert B20					
		function	insert_bulan_b20() {
		    Nama_tindakan = $('#inNamaB20BULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborB20BULAN').val();
			b20_bulan=$('#inB20BULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_b20",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						b20:b20_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						b20_bulan=$('#inB20BULAN').val("");
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
		//B20	

		//Insert HBSAB					
		function	insert_bulan_hbsab() {
		    Nama_tindakan = $('#inNamaHBSABBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborHBSABBULAN').val();
			hbsab_bulan=$('#inHBSABBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_hbsab",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						hbsab:hbsab_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hbsab_bulan=$('#inHBSABBULAN').val("");
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
		//End HBSAB	

		//Insert HBSAG				
		function	insert_bulan_hbsag() {
		    Nama_tindakan = $('#inNamaHBSAGBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborHBSAGBULAN').val();
			hbsag_bulan=$('#inHBSAGBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_hbsag",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						hbsag:hbsag_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hbsag_bulan=$('#inHBSAGBULAN').val("");
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
		//End HBSAG

		//Insert SALMONELLA				
		function	insert_bulan_salmonella() {
		    Nama_tindakan = $('#inNamaSALMONELLABULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborSALMONELLABULAN').val();
			salmonella_bulan=$('#inSALMONELLABULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_salmonella",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						salmonella:salmonella_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						salmonella_bulan=$('#inSALMONELLABULAN').val("");
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
		//End SALMONELLA

		//Insert DENGUE				
		function	insert_bulan_dengue() {
		    Nama_tindakan = $('#inNamaDENGUEBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborDENGUEBULAN').val();
			dengue_bulan=$('#inDENGUEBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_dengue",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						dengue:dengue_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						dengue_bulan=$('#inDENGUEBULAN').val("");
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
		//End DENGUE


		//Insert NS1				
		function	insert_bulan_ns1() {
		    Nama_tindakan = $('#inNamaNS1BULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborNS1BULAN').val();
			ns1_bulan=$('#inNS1BULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_ns1",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						ns1:ns1_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						ns1_bulan=$('#inNS1BULAN').val("");
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
		//End NS1

		function insert_bulan_vdrl() {
		    Nama_tindakan = $('#inNamaVDRLBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborVDRLBULAN').val();
			vdrl=$('#inVDRLBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
							url : "<?php echo base_url() ?>Labor/insert_bulan_vdrl",
							method: "POST",
							dataType: 'json',
							data : {
							id_tindakan_labor:id_tindakan_labor,
							vdrl:vdrl,
							inJenisPasienBULAN:inJenisPasienBULAN,
							},
							success: function(data){
							if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							vdrl=$('#inVDRLBULAN').val("");
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
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
							inJenisPasienBULAN:inJenisPasienBULAN,
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
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
							inJenisPasienBULAN:inJenisPasienBULAN,
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

	function insert_bulan_sputumbtaiii() {
		    Nama_tindakan = $('#inNamaSPUTUMBTAIIIBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborSPUTUMBTAIIIBULAN').val();
			sputum=$('#inSPUTUMBTAIIIBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
							url : "<?php echo base_url() ?>Labor/sputum_bulan_btaiii",
							method: "POST",
							dataType: 'json',
							data : {
							id_tindakan_labor:id_tindakan_labor,
							sputum:sputum,
							inJenisPasienBULAN:inJenisPasienBULAN,
							},
							success: function(data){
							if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							sputum=$('#inSPUTUMBTAIIIBULAN').val("");
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

	function insert_bulan_sputumbtaii() {
		    Nama_tindakan = $('#inNamaSPUTUMBTAIIBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborSPUTUMBTAIIBULAN').val();
			sputum=$('#inSPUTUMBTAIIBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
							url : "<?php echo base_url() ?>Labor/sputum_bulan_btaii",
							method: "POST",
							dataType: 'json',
							data : {
							id_tindakan_labor:id_tindakan_labor,
							sputum:sputum,
							inJenisPasienBULAN:inJenisPasienBULAN,
							},
							success: function(data){
							if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							sputum=$('#inSPUTUMBTAIIBULAN').val("");
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

	function insert_bulan_sputumbtai() {
		    Nama_tindakan = $('#inNamaSPUTUMBTAIBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborSPUTUMBTAIBULAN').val();
			sputum=$('#inSPUTUMBTAIBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
							url : "<?php echo base_url() ?>Labor/sputum_bulan_btai",
							method: "POST",
							dataType: 'json',
							data : {
							id_tindakan_labor:id_tindakan_labor,
							sputum:sputum,
							inJenisPasienBULAN:inJenisPasienBULAN,
							},
							success: function(data){
							if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							sputum=$('#inSPUTUMBTAIBULAN').val("");
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

	//insert DARAH SAMAR BULAN
	function insert_bulan_darahsamar() {
		Nama_tindakan = $('#inNamaDARAHSAMARBULAN').val();
		id_tindakan_labor = $('#id_tindakan_laborDARAHSAMARBULAN').val();
		darahsamar=$('#inDARAHSAMARBULAN').val();
		inJenisPasienBULAN=$('#inMasukBULAN').val();
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
					url : "<?php echo base_url() ?>Labor/insert_darahsamar_baby_bulan",
					method: "POST",
					dataType: 'json',
					data : {
						id_tindakan_labor:id_tindakan_labor,
						darahsamar:darahsamar,
						inJenisPasienBULAN:inJenisPasienBULAN,
					},
					success: function(data){
						if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							darahsamar=$('#inDARAHSAMARBULAN').val("");
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

	//insert MALARIA BULAN
	function insert_bulan_malaria() {
		Nama_tindakan = $('#inNamaMALARIABULAN').val();
		id_tindakan_labor = $('#id_tindakan_laborMALARIABULAN').val();
		malaria=$('#inMALARIABULAN').val();
		inJenisPasienBULAN=$('#inMasukBULAN').val();
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
					url : "<?php echo base_url() ?>Labor/insert_malaria_baby_bulan",
					method: "POST",
					dataType: 'json',
					data : {
						id_tindakan_labor:id_tindakan_labor,
						malaria:malaria,
						inJenisPasienBULAN:inJenisPasienBULAN,
					},
					success: function(data){
						if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							malaria=$('#inMALARIABULAN').val("");
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

	function hapus_labor_BULAN(id_tindakan_labor, id_pelayanan, nama) { 
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
										$('#tablelaborANAK').DataTable().ajax.reload();
                                        $('#outTotalHargaANAK').DataTable().ajax.reload();
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
=======
	<script type="text/javascript">
	function detail_tindakan_labor_bulan(id_tindakan_labor) {
		$.ajax({
			url: "<?= base_url() . 'Labor/getdata_formById_Labor' ?>",
			data: {
				tindakan: id_tindakan_labor,
			},
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				if (data.status_dt == "found") {
					$('#detailTindakanLaborBULAN').collapse('toggle');
					$("#outNamaBULAN").val(data.nama);
					$("#outFrekBULAN").val(data.frek);
					$("#outTanggalBULAN").val(data.tanggal_req);
					$("#outHargaBULAN").val(data.harga);
					$("#outRingBULAN").val(data.ringkasan);
					$("#outKetaBULAN").val(data.keterangan);
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

					function reload_data_labor_BULAN(id_pelayanan) {   
						var a = document.getElementById('cetak_semua_bulan'); 
						a.href = "Labor_BULAN_All_print/" + id_pelayanan
						 
                        $('#tablelaborBULAN').dataTable().fnClearTable();
                        $('#tablelaborBULAN').dataTable().fnDestroy();
                        $('#tablelaborBULAN').DataTable({
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
                                "url": '<?php echo base_url('Labor/tampil_all_labor_bulan'); ?>',
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

					function reload_total_labor_BULAN(id_pelayanan) {
                        $('#outTotalHargaBULAN').dataTable().fnClearTable();
                        $('#outTotalHargaBULAN').dataTable().fnDestroy();
                        $('#outTotalHargaBULAN').DataTable({
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

        function aksi_labor_bulan(id_tindakan_labor,id_pelayanan){
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
							$("#inNamaDARAHBULAN").val(data.nama);
							$('#isiDARAHBULAN').collapse('toggle');
							
							$('.data_mchc').addClass('collapse');
							$('#inTipeMasukMCHCBULAN').change(function() {
								var selector = '.data_mchc_' + $(this).val();
								$('.data_mchc').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_mch').addClass('collapse');
							$('#inTipeMasukMCHBULAN').change(function() {
								var selector = '.data_mch_' + $(this).val();
								$('.data_mch').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_mcv').addClass('collapse');
							$('#inTipeMasukMCVBULAN').change(function() {
								var selector = '.data_mcv_' + $(this).val();
								$('.data_mcv').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_hema').addClass('collapse');
							$('#inTipeMasukHEMATOKRITBULAN').change(function() {
								var selector = '.data_hema_' + $(this).val();
								$('.data_hema').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_hide').addClass('collapse');
							$('#inTipeMasukHBBULAN').change(function() {
								var selector = '.data_hide_' + $(this).val();
								$('.data_hide').collapse('hide');
								$(selector).collapse('show');
							});
							$('#isiAGDBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');;
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborDARAHBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " GOL DARAH "){
							// GOL DARAH
							$("#inNamaGOLBULAN").val(data.nama);
							$('#isiGOL-DARAHBULAN').collapse('toggle');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$("#id_tindakan_laborGOLBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " LED "){
							// LED
							$("#inNamaLEDBULAN").val(data.nama);
							$('#isiLEDBULAN').collapse('toggle');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
	
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$("#id_tindakan_laborLEDBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "RHESUS"){
							// RHESUS
							$("#inNamaRHESUSBULAN").val(data.nama);
							$('#isiRHESUSBULAN').collapse('toggle');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$("#id_tindakan_laborRHESUSBULAN").val(data.id_tindakan_labor);
							$("#id_staff_bulan_rhesus");
						}else if(data.nama == "APTT"){
							// APTT
							$("#inNamaAPTTBULAN").val(data.nama);
							$('#isiAPTTBULAN').collapse('toggle');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborAPTTBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " GULA DARAH "){
							// GULA DARAH
							$("#inNamaGULDARAHBULAN").val(data.nama);
							$('#isiGULDARAHBULAN').collapse('toggle');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborGULDARAHBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "HBA 1 C (A 1 C)"){
							// HBA 1 C (A 1 C)
							$("#inNamaHBABULAN").val(data.nama);
							$('#isiHBABULAN').collapse('toggle');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborHBABULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "URIC ACID"){
							// URIC ACID
							$("#inNamaURICBULAN").val(data.nama);
							$('#isiURICBULAN').collapse('toggle');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$("#id_tindakan_laborURICBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "TRIGLYSERIDE"){
							// TRIGLYSERIDE
							$("#inNamaTRIGLYSERIDEBULAN").val(data.nama);
							$('#isiTRIGLYSERIDEBULAN').collapse('toggle');
							$('#isiURICBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiGOL-DARAH').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$("#id_tindakan_laborTRIGLYSERIDEBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "CHO"){
							// CHO
							$("#inNamaCHOBULAN").val(data.nama);
							$('#isiCHOBULAN').collapse('toggle');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$("#id_tindakan_laborCHOBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "HDL"){
							// HDL
							$("#inNamaHDLBULAN").val(data.nama);
							$('#isiHDLBULAN').collapse('toggle');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborHDLBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "LDL"){
							// LDL
							$("#inNamaLDLBULAN").val(data.nama);
							$('#isiLDLBULAN').collapse('toggle');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborLDLBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "UREUM"){
							// UREUM
							$("#inNamaUREUMBULAN").val(data.nama);
							$('#isiUREUMBULAN').collapse('toggle');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborUREUMBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "CREATININ"){
							// CREATININ
							$("#inNamaCREATININBULAN").val(data.nama);
							$('#isiCREATININBULAN').collapse('toggle');
							$('.data_hide').addClass('collapse');
							$('#inTipeCREATININ').change(function() {
								var selector = '.data_hide_' + $(this).val();
								$('.data_hide').collapse('hide');
								$(selector).collapse('show');
							});
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$("#id_tindakan_laborCREATININBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "SGOT"){
							// SGOT
							$("#inNamaSGOTBULAN").val(data.nama);
							$('#isiSGOTBULAN').collapse('toggle');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiALBULANP').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$("#id_tindakan_laborSGOTBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "SGPT"){
							// SGPT
							$("#inNamaSGPTBULAN").val(data.nama);
							$('#isiSGPTBULAN').collapse('toggle');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborSGPTBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "ELEKTROLIT "){
							// ELEKTROLIT
							$("#inNamaELEKTROLITBULAN").val(data.nama);
							$('#isiELEKTROLITBULAN').collapse('toggle');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$("#id_tindakan_laborELEKTROLITBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " Sputum B T A I"){
							// SPUTUMBTAI
							$("#inNamaSPUTUMBTAIBULAN").val(data.nama);
							$('#isiSPUTUMBTAIBULAN').collapse('toggle');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborSPUTUMBTAIBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " Sputum B T A II"){
							// SPUTUMBTAII
							$("#inNamaSPUTUMBTAIIBULAN").val(data.nama);
							$('#isiSPUTUMBTAIIBULAN').collapse('toggle');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$("#id_tindakan_laborSPUTUMBTAIIBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " Sputum B T A III"){
							// SPUTUMBTAIII
							$("#inNamaSPUTUMBTAIIIBULAN").val(data.nama);
							$('#isiSPUTUMBTAIIIBULAN').collapse('toggle');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborSPUTUMBTAIIIBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " PROTEIN "){
							// PROTEIN
							$("#inNamaPROTEINBULAN").val(data.nama);
							$('#isiPROTEINBULAN').collapse('toggle');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborPROTEINBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " ALBUMIN "){
							// ALBUMIN
							$("#inNamaALBUMINBULAN").val(data.nama);
							$('#isiALBUMINBULAN').collapse('toggle');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborALBUMINBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " MALARIA "){
							// MALARIA
							$("#inNamaMALARIABULAN").val(data.nama);
							$('#isiMALARIABULAN').collapse('toggle');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborMALARIABULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " WIDAL "){
							// WIDAL
							$("#inNamaWIDALBULAN").val(data.nama);
							$('#isiWIDALBULAN').collapse('toggle');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborWIDALBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " TROPONIN "){
							// TROPONIN
							$("#inNamaTROPONINBULAN").val(data.nama);
							$('#isiTROPONINBULAN').collapse('toggle');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborTROPONINBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " NS 1 "){
							// NS1
							$("#inNamaNS1BULAN").val(data.nama);
							$('#isiNS1BULAN').collapse('toggle');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborNS1BULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " HBSAG "){
							// HBSAG
							$("#inNamaHBSAGBULAN").val(data.nama);
							$('#isiHBSAGBULAN').collapse('toggle');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiBLTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborHBSAGBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " HBSAB "){
							// HBSAB
							$("#inNamaHBSABBULAN").val(data.nama);
							$('#isiHBSABBULAN').collapse('toggle');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborHBSABBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "B20"){
							// B20
							$("#inNamaB20BULAN").val(data.nama);
							$('#isiB20BULAN').collapse('toggle');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborB20BULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " VDRL "){
							// VDRL
							$("#inNamaVDRLBULAN").val(data.nama);
							$('#isiVDRLBULAN').collapse('toggle');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborVDRLBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " PLANOTES "){
							// PLANOTES
							$("#inNamaPLANOBULAN").val(data.nama);
							$('#isiPLANOBULAN').collapse('toggle');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborVDRLBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " SALMONELLA "){
							// SALMONELLA
							$("#inNamaSALMONELLABULAN").val(data.nama);
							$('#isiSALMONELLABULAN').collapse('toggle');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborSALMONELLABULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "AGD"){
							// AGD
							$("#inNamaAGDBULAN").val(data.nama);
							$('#isiAGDBULAN').collapse('toggle');
							$('#isiPTBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborAGDBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " URINE "){
							// URINE
							$("#inNamaURINEBULAN").val(data.nama);
							$('#isiURINEBULAN').collapse('toggle');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborURINEBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "ANALISA SPERMA"){
							// ANALISA SPERMA
							$("#inNamaSPERMABULAN").val(data.nama);
							$('#isiSPERMABULAN').collapse('toggle');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborSPERMABULAN").val(data.id_tindakan_labor);
						}else if(data.nama == " FEACES "){
							// FEACES
							$("#inNamaFESESBULAN").val(data.nama);
							$('#isiFESESBULAN').collapse('toggle');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborFESESBULAN").val(data.id_tindakan_labor);
						}else if(data.nama == "CRP"){
							// CRP
							$("#inNamaCRPBULAN").val(data.nama);
							$('#isiCRPBULAN').collapse('toggle');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiTRIGLYSERIDEBULAN').collapse('hide');
							$('#isiURICBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborCRPBULAN").val(data.id_tindakan_labor);	
						}else if(data.nama == "PT"){
							// PT
							$("#inNamaPTBULAN").val(data.nama);
							$('#isiPTBULAN').collapse('toggle');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborPTBULAN").val(data.id_tindakan_labor);		
						}else if(data.nama == "PT/APTT"){
							// PT/APTT
							$("#inNamaPTAPTTBULAN").val(data.nama);
							$('#isiPTAPTTBULAN').collapse('toggle');
							$('#isiPTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborPTAPTTBULAN").val(data.id_tindakan_labor);	
						}else if(data.nama == "DENGUE"){
							// DENGUE
							$("#inNamaDENGUEBULAN").val(data.nama);
							$('#isiDENGUEBULAN').collapse('toggle');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborDENGUEBULAN").val(data.id_tindakan_labor);	
						}else if(data.nama == "Darah Samar"){
							// DENGUE
							$("#inNamaDARAHSAMARBULAN").val(data.nama);
							$('#isiDARAHSAMARBULAN').collapse('toggle');
							$('#isiDENGUEBULAN').collapse('hide');
							$('#isiPTAPTTBULAN').collapse('hide');
							$('#isiPTBULAN').collapse('hide');
							$('#isiCRPBULAN').collapse('hide');
							$('#isiFESESBULAN').collapse('hide');
							$('#isiSPERMABULAN').collapse('hide');
							$('#isiURINEBULAN').collapse('hide');
							$('#isiAGDBULAN').collapse('hide');
							$('#isiSALMONELLABULAN').collapse('hide');
							$('#isiPLANOBULAN').collapse('hide');
							$('#isiVDRLBULAN').collapse('hide');
							$('#isiDARAHSAMARBULAN').collapse('hide');
							$('#isiB20BULAN').collapse('hide');
							$('#isiHBSABBULAN').collapse('hide');
							$('#isiHBSAGBULAN').collapse('hide');
							$('#isiNS1BULAN').collapse('hide');
							$('#isiTROPONINBULAN').collapse('hide');
							$('#isiWIDALBULAN').collapse('hide');
							$('#isiMALARIABULAN').collapse('hide');
							$('#isiGLOBULINBULAN').collapse('hide');
							$('#isiALBUMINBULAN').collapse('hide');
							$('#isiPROTEINBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIIBULAN').collapse('hide');
							$('#isiSPUTUMBTAIBULAN').collapse('hide');
							$('#isiELEKTROLITBULAN').collapse('hide');
							$('#isiSGOTBULAN').collapse('hide');
							$('#isiSGPTBULAN').collapse('hide');
							$('#isiCREATININBULAN').collapse('hide');
							$('#isiUREUMBULAN').collapse('hide');
							$('#isiLDLBULAN').collapse('hide');
							$('#isiHDLBULAN').collapse('hide');
							$('#isiCHOBULAN').collapse('hide');
							$('#isiHBABULAN').collapse('hide');
							$('#isiGULDARAHBULAN').collapse('hide');
							$('#isiAPTTBULAN').collapse('hide');
							$('#isiRHESUSBULAN').collapse('hide');
							$('#isiLEDBULAN').collapse('hide');
							$('#isiGOL-DARAHBULAN').collapse('hide');
							$('#isiDARAHBULAN').collapse('hide');
							$("#id_tindakan_laborDARAHSAMARBULAN").val(data.id_tindakan_labor);
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
// KeyUp Bayi Bulan
	//HB BULAN
			// KeyUP HB 40 - 50 Hari
			$('#inHB4050BULAN').keyup(function() {
				$('#notifinHB4050BULAN').html('');
				a = $('#inHB4050BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB4050BULAN').html(html);
				}else if (a >= 9.0 && a <= 16.6) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB4050BULAN').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB4050BULAN').html(html);
				}
			});

			// KeyUP HB BULAN >50 Hari - 2.5 Bulan
			$('#inHB5025BULAN').keyup(function() {
				$('#notifinHB5025BULAN').html('');
				a = $('#inHB5025BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB5025BULAN').html(html);
				}else if (a >= 9.2 && a <= 13.6) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB5025BULAN').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB5025BULAN').html(html);
				}
			});

			// KeyUP HB BULAN 2.6 - 3.5 Bulan
			$('#inHB2635BULAN').keyup(function() {
				$('#notifinHB2635BULAN').html('');
				a = $('#inHB2635BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB2635BULAN').html(html);
				}else if (a >= 9.6 && a <= 12.8) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB2635BULAN').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB2635BULAN').html(html);
				}
			});

			// KeyUP HB BULAN 4 - 7 Bulan
			$('#inHB47BULAN').keyup(function() {
				$('#notifinHB47BULAN').html('');
				a = $('#inHB47BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB47BULAN').html(html);
				}else if (a >= 10.1 && a <= 12.9) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB47BULAN').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB47BULAN').html(html);
				}
			});

			// KeyUP HB BULAN 8 - 12 Bulan
			$('#inHB812BULAN').keyup(function() {
				$('#notifinHB812BULAN').html('');
				a = $('#inHB812BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB812BULAN').html(html);
				}else if (a >= 10.5 && a <= 13.1) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB812BULAN').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB812BULAN').html(html);
				}
			});

	// END 

			// KeyUP LEUKOSIT
			$('#inLEUKOSITBULAN').keyup(function() {
				$('#notifinLEUKOSITBULAN').html('');
				a = $('#inLEUKOSITBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITBULAN').html(html);
				}else if (a >= 5000 && a <= 10000) {
					html = '<b style="color:blue">LEUKOSIT NORMAL</b>';
					$('#notifinLEUKOSITBULAN').html(html);
				} else{
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSITBULAN').html(html);
				}
			});

			// KeyUP TROMBOSIT
			$('#inTROMBOSITBULAN').keyup(function() {
				$('#notifinTROMBOSITBULAN').html('');
				a = $('#inTROMBOSITBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTROMBOSITBULAN').html(html);
				}else if (a >= 150000 && a <= 400000) {
					html = '<b style="color:blue">TROMBOSIT NORMAL</b>';
					$('#notifinTROMBOSITBULAN').html(html);
				} else{
					html = '<b style="color:red">TROMBOSIT TIDAK NORMAL</b>';
					$('#notifinTROMBOSITBULAN').html(html);
				}
			});

	//HEMATOKRIT
			// KeyUP HEMATOKRIT	UMUR 40 - 50 Hari		
			$('#inHEMATOKRIT4050BULAN').keyup(function() {
				$('#notifinHEMATOKRIT4050BULAN').html('');
				a = $('#inHEMATOKRIT4050BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT4050BULAN').html(html);
				}else if (a >= 30 && a <= 54) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL </b>';
					$('#notifinHEMATOKRIT4050BULAN').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT4050BULAN').html(html);
				}
			});

			// KeyUP HEMATOKRIT	UMUR >50 Hari - 2.5 Bulan	
			$('#inHEMATOKRIT5025BULAN').keyup(function() {
				$('#notifinHEMATOKRIT5025BULAN').html('');
				a = $('#inHEMATOKRIT5025BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT5025BULAN').html(html);
				}else if (a >= 30 && a <= 46) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL </b>';
					$('#notifinHEMATOKRIT5025BULAN').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT5025BULAN').html(html);
				}
			});

			// KeyUP HEMATOKRIT	UMUR 2.6 - 3.5 Bulan	
			$('#inHEMATOKRIT2635BULAN').keyup(function() {
				$('#notifinHEMATOKRIT2635BULAN').html('');
				a = $('#inHEMATOKRIT2635BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT2635BULAN').html(html);
				}else if (a >= 31 && a <= 43) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL</b>';
					$('#notifinHEMATOKRIT2635BULAN').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT2635BULAN').html(html);
				}
			});

			// KeyUP HEMATOKRIT	UMUR 4 - 7 Bulan	
			$('#inHEMATOKRIT47BULAN').keyup(function() {
				$('#notifinHEMATOKRIT47BULAN').html('');
				a = $('#inHEMATOKRIT47BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT47BULAN').html(html);
				}else if (a >= 32 && a <= 44) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL</b>';
					$('#notifinHEMATOKRIT47BULAN').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT47BULAN').html(html);
				}
			});

			// KeyUP HEMATOKRIT	UMUR 8 - 12 Bulan
			$('#inHEMATOKRIT812BULAN').keyup(function() {
				$('#notifinHEMATOKRIT812BULAN').html('');
				a = $('#inHEMATOKRIT812BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT812BULAN').html(html);
				}else if (a >= 35 && a <= 43) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL</b>';
					$('#notifinHEMATOKRIT812BULAN').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT812BULAN').html(html);
				}
			});
	// End

			// KeyUP BAS			
			$('#inBASBULAN').keyup(function() {
				$('#notifinBASBULAN').html('');
				a = $('#inBASBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBASBULAN').html(html);
				}else if (a >= 0 && a <= 1) {
					html = '<b style="color:blue">BAS NORMAL</b>';
					$('#notifinBASBULAN').html(html);
				} else{
					html = '<b style="color:red">BAS TIDAK NORMAL</b>';
					$('#notifinBASBULAN').html(html);
				}
			});

			// KeyUP EOS			
			$('#inEOSBULAN').keyup(function() {
				$('#notifinEOSBULAN').html('');
				a = $('#inEOSBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinEOSBULAN').html(html);
				}else if (a >= 1 && a <= 5) {
					html = '<b style="color:blue">EOS NORMAL</b>';
					$('#notifinEOSBULAN').html(html);
				} else{
					html = '<b style="color:red">EOS TIDAK NORMAL</b>';
					$('#notifinEOSBULAN').html(html);
				}
			});

			// KeyUP MONO		
			$('#inMONOBULAN').keyup(function() {
				$('#notifinMONOBULAN').html('');
				a = $('#inMONOBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMONOBULAN').html(html);
				}else if (a >= 1 && a <= 11) {
					html = '<b style="color:blue">MONO NORMAL</b>';
					$('#notifinMONOBULAN').html(html);
				} else{
					html = '<b style="color:red">MONO TIDAK NORMAL</b>';
					$('#notifinMONOBULAN').html(html);
				}
			});

			// KeyUP SEGMEN		
			$('#inSEGMENBULAN').keyup(function() {
				$('#notifinSEGMENBULAN').html('');
				a = $('#inSEGMENBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSEGMENBULAN').html(html);
				}else if (a >= 17 && a <= 60) {
					html = '<b style="color:blue">SEGMEN NORMAL</b>';
					$('#notifinSEGMENBULAN').html(html);
				} else{
					html = '<b style="color:red">SEGMEN TIDAK NORMAL</b>';
					$('#notifinSEGMENBULAN').html(html);
				}
			});

			// KeyUP LYMPO		
			$('#inLYMPOBULAN').keyup(function() {
				$('#notifinLYMPOBULAN').html('');
				a = $('#inLYMPOBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLYMPOBULAN').html(html);
				}else if (a >= 20 && a <= 70) {
					html = '<b style="color:blue">LYMPO NORMAL</b>';
					$('#notifinLYMPOBULAN').html(html);
				} else{
					html = '<b style="color:red">LYMPO TIDAK NORMAL</b>';
					$('#notifinLYMPOBULAN').html(html);
				}
			});

	// MCV
			// KeyUP MCV 37 Hari
			$('#inMCV37BULAN').keyup(function() {
				$('#notifinMCV37BULAN').html('');
				a = $('#inMCV37BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV37BULAN').html(html);
				}else if (a >= 82 && a <= 126) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV37BULAN').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV37BULAN').html(html);
				}
			});

			// KeyUP MCV 1.5 - 2.5 Bulan
			$('#inMCV1525BULAN').keyup(function() {
				$('#notifinMCV1525BULAN').html('');
				a = $('#inMCV1525BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV1525BULAN').html(html);
				}else if (a >= 81 && a <= 121) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV1525BULAN').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV1525BULAN').html(html);
				}
			});

			// KeyUP MCV 2.6 - 3.5 Bulan
			$('#inMCV2635BULAN').keyup(function() {
				$('#notifinMCV2635BULAN').html('');
				a = $('#inMCV2635BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV2635BULAN').html(html);
				}else if (a >= 77 && a <= 113) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV2635BULAN').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV2635BULAN').html(html);
				}
			});

			// KeyUP MCV 3.5 - 7 Bulan
			$('#inMCV357BULAN').keyup(function() {
				$('#notifinMCV357BULAN').html('');
				a = $('#inMCV357BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV357BULAN').html(html);
				}else if (a >= 73 && a <= 109) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV357BULAN').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV357BULAN').html(html);
				}
			});

			// KeyUP MCV 7 - 12 Bulan
			$('#inMCV712BULAN').keyup(function() {
				$('#notifinMCV712BULAN').html('');
				a = $('#inMCV712BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV712BULAN').html(html);
				}else if (a >= 74 && a <= 106) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV712BULAN').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV712BULAN').html(html);
				}
			});
	//  End

	// MCH
			// KeyUP MCH UMUR 37 Hari
			$('#inMCH37BULAN').keyup(function() {
				$('#notifinMCH37BULAN').html('');
				a = $('#inMCH37BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH37BULAN').html(html);
				}else if (a >= 26 && a <= 38) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH37BULAN').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH37BULAN').html(html);
				}
			});

			// KeyUP MCH UMUR 1 - 1.5 Bulan
			$('#inMCH15BULAN').keyup(function() {
				$('#notifinMCH15BULAN').html('');
				a = $('#inMCH15BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH15BULAN').html(html);
				}else if (a >= 25 && a <= 38) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH15BULAN').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH15BULAN').html(html);
				}
			});

			// KeyUP MCH UMUR 2 - 2.5 Bulan
			$('#inMCH225BULAN').keyup(function() {
				$('#notifinMCH225BULAN').html('');
				a = $('#inMCH225BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH225BULAN').html(html);
				}else if (a >= 24 && a <= 36) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH225BULAN').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH225BULAN').html(html);
				}
			});

			// KeyUP MCH UMUR 2.6 - 3.5 Bulan
			$('#inMCH2635BULAN').keyup(function() {
				$('#notifinMCH2635BULAN').html('');
				a = $('#inMCH2635BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH2635BULAN').html(html);
				}else if (a >= 23 && a <= 36) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH2635BULAN').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH2635BULAN').html(html);
				}
			});

			// KeyUP MCH UMUR 3.6 - 10 Bulan
			$('#inMCH3610BULAN').keyup(function() {
				$('#notifinMCH3610BULAN').html('');
				a = $('#inMCH3610BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH3610BULAN').html(html);
				}else if (a >= 21 && a <= 33) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH3610BULAN').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH3610BULAN').html(html);
				}
			});

			// KeyUP MCH UMUR 11 Bulan - 5 Tahun
			$('#inMCH115BULAN').keyup(function() {
				$('#notifinMCH115BULAN').html('');
				a = $('#inMCH115BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH115BULAN').html(html);
				}else if (a >= 23 && a <= 31) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH115BULAN').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH115BULAN').html(html);
				}
			});


	// End

	// MCHC
			// KeyUP MCHC UMUR 37 Hari
			$('#inMCHC37BULAN').keyup(function() {
				$('#notifinMCHC37BULAN').html('');
				a = $('#inMCHC37BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHC37BULAN').html(html);
				}else if (a >= 25 && a <= 37) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHC37BULAN').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHC37BULAN').html(html);
				}
			});

			// KeyUP MCHC UMUR 40 Hari - 7 Bulan
			$('#inMCHC407BULAN').keyup(function() {
				$('#notifinMCHC407BULAN').html('');
				a = $('#inMCHC407BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHC407BULAN').html(html);
				}else if (a >= 26 && a <= 34) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHC407BULAN').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHC407BULAN').html(html);
				}
			});

			// KeyUP MCHC UMUR 8 - 12 Bulan
			$('#inMCHC812BULAN').keyup(function() {
				$('#notifinMCHC812BULAN').html('');
				a = $('#inMCHC812BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHC812BULAN').html(html);
				}else if (a >= 28 && a <= 32) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHC812BULAN').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHC812BULAN').html(html);
				}
			});


	// End
			// KeyUP RDW-CV
			$('#inRDW-CVBULAN').keyup(function() {
				$('#notifinRDW-CVBULAN').html('');
				a = $('#inRDW-CVBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRDW-CVBULAN').html(html);
				}else if (a >= 11.0 && a <= 16.0) {
					html = '<b style="color:blue">RDW-CV NORMAL</b>';
					$('#notifinRDW-CVBULAN').html(html);
				} else{
					html = '<b style="color:red">RDW-CV TIDAK NORMAL</b>';
					$('#notifinRDW-CVBULAN').html(html);
				}
			});

			// KeyUP RDW-SD
			$('#inRDW-SDBULAN').keyup(function() {
				$('#notifinRDW-SDBULAN').html('');
				a = $('#inRDW-SDBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRDW-SDBULAN').html(html);
				}else if (a >= 35.0 && a <= 56.0) {
					html = '<b style="color:blue">RDW-SD NORMAL</b>';
					$('#notifinRDW-SDBULAN').html(html);
				} else{
					html = '<b style="color:red">RDW-SD TIDAK NORMAL</b>';
					$('#notifinRDW-SDBULAN').html(html);
				}
			});

			// KeyUP LED
			$('#inLEDBULAN').keyup(function() {
				$('#notifinLEDBULAN').html('');
				a = $('#inLEDBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEDBULAN').html(html);
				}else if (a >= 0 && a <= 10) {
					html = '<b style="color:blue">LED NORMAL PRIA BULAN</b>';
					$('#notifinLEDBULAN').html(html);
				}else if (a >= 0 && a <= 15) {
					html = '<b style="color:blue">LED NORMAL WANITA BULAN</b>';
					$('#notifinLEDBULAN').html(html);
				} else{
					html = '<b style="color:red">LED TIDAK NORMAL</b>';
					$('#notifinLEDBULAN').html(html);
				}
			});

			// Keyup PH
			$('#inPHBULAN').keyup(function() {
				$('#notifinPHBULAN').html('');
				a = $('#inPHBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPHBULAN').html(html);
				}else if (a >= 7.35 && a <= 7.45) {
					html = '<b style="color:blue">NILAI PH NORMAL</b>';
					$('#notifinPHBULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI PH TIDAK NORMAL</b>';
					$('#notifinPHBULAN').html(html);
				}
			});

			// Keyup PCO2
			$('#inPCO2BULAN').keyup(function() {
				$('#notifinPCO2BULAN').html('');
				a = $('#inPCO2BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPCO2BULAN').html(html);
				}else if (a >= 41 && a <= 51) {
					html = '<b style="color:blue">NILAI PCO2 NORMAL</b>';
					$('#notifinPCO2BULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI PCO2 TIDAK NORMAL</b>';
					$('#notifinPCO2BULAN').html(html);
				}
			});

			// Keyup PO2
			$('#inPO2BULAN').keyup(function() {
				$('#notifinPO2BULAN').html('');
				a = $('#inPO2BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPO2BULAN').html(html);
				}else if (a >= 80 && a <= 100) {
					html = '<b style="color:blue">NILAI PO2 NORMAL</b>';
					$('#notifinPO2BULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI PO2 TIDAK NORMAL</b>';
					$('#notifinPO2BULAN').html(html);
				}
			});

				// Keyup HCO3
			$('#inHCO3BULAN').keyup(function() {
			$('#notifinHCO3BULAN').html('');
				a = $('#inHCO3BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHCO3BULAN').html(html);
				}else if (a >= 24 && a <= 28) {
					html = '<b style="color:blue">NILAI HCO3 NORMAL</b>';
					$('#notifinHCO3BULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI HCO3 TIDAK NORMAL</b>';
					$('#notifinHCO3BULAN').html(html);
				}
			});

			// Keyup BE
			$('#inBEBULAN').keyup(function() {
				$('#notifinBEBULAN').html('');
				a = $('#inBEBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBEBULAN').html(html);
				}
			});

			// Keyup SO2
			$('#inSO2BULAN').keyup(function() {
				$('#notifinSO2BULAN').html('');
				a = $('#inSO2BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSO2BULAN').html(html);
				}else if (a >= 93 && a <= 99) {
					html = '<b style="color:blue">NILAI SO2 NORMAL</b>';
					$('#notifinSO2BULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI SO2 TIDAK NORMAL</b>';
					$('#notifinSO2BULAN').html(html);
				}
			});

			// Keyup SUHU
			$('#inSUHUBULAN').keyup(function() {
				$('#notifinSUHUBULAN').html('');
				a = $('#inSUHUBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSUHUBULAN').html(html);
				}else if (a >= 36.8 && a <= 37.8) {
					html = '<b style="color:blue">NILAI SUHU NORMAL</b>';
					$('#notifinSUHUBULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI SUHU TIDAK NORMAL</b>';
					$('#notifinSUHUBULAN').html(html);
				}
			});

			// Keyup OKSIGEN
			$('#inOKSIGENBULAN').keyup(function() {
				$('#notifinOKSIGENBULAN').html('');
				a = $('#inOKSIGENBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinOKSIGENBULAN').html(html);
				}else if (a == 12) {
					html = '<b style="color:blue">NILAI OKSIGEN NORMAL</b>';
					$('#notifinOKSIGENBULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI OKSIGEN TIDAK NORMAL</b>';
					$('#notifinOKSIGENBULAN').html(html);
				}
			});

			// Keyup SATURASI
			$('#inSATURASIBULAN').keyup(function() {
				$('#notifinSATURASIBULAN').html('');
				a = $('#inSATURASIBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSATURASIBULAN').html(html);
				}else if (a >= 90) {
					html = '<b style="color:blue">NILAI SATURASI NORMAL</b>';
					$('#notifinSATURASIBULAN').html(html);
				} else{
					html = '<b style="color:red">NILAI SATURASI TIDAK NORMAL</b>';
					$('#notifinSATURASIBULAN').html(html);
				}
			});
			
			// KeyUP RHESUS BULAN
			$('#inRHESUSBULAN').keyup(function() {
				$('#notifinRHESUSBULAN').html('');
				a = $('#inRHESUSBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRHESUSBULAN').html(html);
				}
			});

			// KeyUP GOL-DARAH BULAN
			$('#inGOLDARAHBULAN').keyup(function() {
				$('#notifinGOLDARAHBULAN').html('');
				a = $('#inGOLDARAHBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinGOLDARAHBULAN').html(html);
				}
			});


			// KeyUP BLT BULAN
			$('#inBLTBULAN').keyup(function() {
				$('#notifinBLTBULAN').html('');
				a = $('#inBLTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBLTBULAN').html(html);
				}else if( a >= 2 && a <= 6){
					html = '<b style="color:blue">BLT NORMAL</b>';
					$('#notifinBLTBULAN').html(html);
				}else{
					html = '<b style="color:red">BLT TIDAK NORMAL</b>';
					$('#notifinBLTBULAN').html(html);
				}
			});

			// KeyUP CLT BULAN
			$('#inCLTBULAN').keyup(function() {
				$('#notifinCLTBULAN').html('');
				a = $('#inCLTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCLT').html(html);
				}else if( a >= 2 && a <= 6){
					html = '<b style="color:blue">CLT NORMAL</b>';
					$('#notifinCLTBULAN').html(html);
				}else{
					html = '<b style="color:red">CLT TIDAK NORMAL</b>';
					$('#notifinCLTBULAN').html(html);
				}
			});

			// KeyUP APTT
			$('#inAPTTBULAN').keyup(function() {
				$('#notifinAPTTBULAN').html('');
				a = $('#inAPTTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinAPTTBULAN').html(html);
				}else if( a >= 25 && a <= 40){
					html = '<b style="color:blue">APTT NORMAL</b>';
					$('#notifinAPTTBULAN').html(html);
				}else{
					html = '<b style="color:red">APTT TIDAK NORMAL</b>';
					$('#notifinAPTTBULAN').html(html);
				}
			});

			
			// keyUp INR PT/APTT
			$('#inINRPTAPTTBULAN').keyup(function() {
				$('#notifinINRPTAPTTBULAN').html('');
				a = $('#inINRPTAPTTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinINRPTAPTTBULAN').html(html);
				}else if( a >= 0.7 && a <= 1.3){
					html = '<b style="color:blue">INR NORMAL</b>';
					$('#notifinINRPTAPTTBULAN').html(html);
				}else{
					html = '<b style="color:red">INR TIDAK NORMAL</b>';
					$('#notifinINRPTAPTTBULAN').html(html);
				}
			});
			// End

			// keyUp PT
			$('#inPTBULAN').keyup(function() {
				$('#notifinPTBULAN').html('');
				a = $('#inPTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPTBULAN').html(html);
				}else if( a >= 11 && a <= 16){
					html = '<b style="color:blue">PT NORMAL</b>';
					$('#notifinPTBULAN').html(html);
				}else{
					html = '<b style="color:red">PT TIDAK NORMAL</b>';
					$('#notifinPTBULAN').html(html);
				}
			});
			// End

			// keyUp PT/APTT
			$('#inPTAPTTBULAN').keyup(function() {
				$('#notifinPTAPTTBULAN').html('');
				a = $('#inPTAPTTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPTAPTTBULAN').html(html);
				}else if( a >= 11 && a <= 16){
					html = '<b style="color:blue">PT NORMAL</b>';
					$('#notifinPTAPTTBULAN').html(html);
				}else{
					html = '<b style="color:red">PT TIDAK NORMAL</b>';
					$('#notifinPTAPTTBULAN').html(html);
				}
			});
			// End

			// KeyUP GULDARAH
			$('#inGULDARAHBULAN').keyup(function() {
				$('#notifinGULDARAHBULAN').html('');
				a = $('#inGULDARAHBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinGULDARAHBULAN').html(html);
				}else if( a >= 54 && a <= 103){
					html = '<b style="color:blue">GULA DARAH NORMAL</b>';
					$('#notifinGULDARAHBULAN').html(html);
				}else{
					html = '<b style="color:red">GULA DARAH TIDAK NORMAL</b>';
					$('#notifinGULDARAHBULAN').html(html);
				}
			});

			// KeyUP HBA
			$('#inHBABULAN').keyup(function() {
				$('#notifinHBABULAN').html('');
				a = $('#inHBABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBABULAN').html(html);
				}else if( a >= 4 && a <= 5.6){
					html = '<b style="color:blue">HBA1C NORMAL</b>';
					$('#notifinHBABULAN').html(html);
				}else{
					html = '<b style="color:red">HBA1C TIDAK NORMAL</b>';
					$('#notifinHBABULAN').html(html);
				}
			});

			// KeyUP URIC
			$('#inURICBULAN').keyup(function() {
				$('#notifinURICBULAN').html('');
				a = $('#inURICBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinURICBULAN').html(html);
				}else if( a == 2.0){
					html = '<b style="color:blue">URIC ACID NORMAL</b>';
					$('#notifinURICBULAN').html(html);
				}else{
					html = '<b style="color:red">URIC ACID TIDAK NORMAL</b>';
					$('#notifinURICBULAN').html(html);
				}
			});
			
			// KeyUP TRIGLYSERIDE
			$('#inTRIGLYSERIDEBULAN').keyup(function() {
				$('#notifinTRIGLYSERIDEBULAN').html('');
				a = $('#inTRIGLYSERIDEBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTRIGLYSERIDEBULAN').html(html);
				}else if( a >= 60 && a <= 150){
					html = '<b style="color:blue">TRIGLISERIDA NORMAL</b>';
					$('#notifinTRIGLYSERIDEBULAN').html(html);
				}else{
					html = '<b style="color:red">TRIGLISERIDA TIDAK NORMAL</b>';
					$('#notifinTRIGLYSERIDEBULAN').html(html);
				}
			});

			// KeyUP CHO
			$('#inCHOBULAN').keyup(function() {
				$('#notifinCHOBULAN').html('');
				a = $('#inCHOBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCHOBULAN').html(html);
				}else if( a >= 120 && a <= 200){
					html = '<b style="color:blue">CHO NORMAL</b>';
					$('#notifinCHOBULAN').html(html);
				}else{
					html = '<b style="color:red">CHO TIDAK NORMAL</b>';
					$('#notifinCHOBULAN').html(html);
				}
			});

			// KeyUP HDL
			$('#inHDLBULAN').keyup(function() {
				$('#notifinHDLBULAN').html('');
				a = $('#inHDLBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHDLBULAN').html(html);
				}else if( a >= 35 && a <= 60){
					html = '<b style="color:blue">HDL NORMAL</b>';
					$('#notifinHDLBULAN').html(html);
				}else{
					html = '<b style="color:red">HDL TIDAK NORMAL</b>';
					$('#notifinHDLBULAN').html(html);
				}
			});

			// KeyUP LDL
			$('#inLDLBULAN').keyup(function() {
				$('#notifinLDLBULAN').html('');
				a = $('#inLDLBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLDLBULAN').html(html);
				}else if( a < 150){
					html = '<b style="color:blue">LDL NORMAL</b>';
					$('#notifinLDLBULAN').html(html);
				}else{
					html = '<b style="color:red">LDL TIDAK NORMAL</b>';
					$('#notifinLDLBULAN').html(html);
				}
			});

			// KeyUP UREUM
			$('#inUREUMBULAN').keyup(function() {
				$('#notifinUREUMBULAN').html('');
				a = $('#inUREUMBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinUREUMBULAN').html(html);
				}else if( a >= 10 && a <= 50){
					html = '<b style="color:blue">UREUM NORMAL</b>';
					$('#notifinUREUMBULAN').html(html);
				}else{
					html = '<b style="color:red">UREUM TIDAK NORMAL</b>';
					$('#notifinUREUMBULAN').html(html);
				}
			});

			// KeyUP CREATININ
			$('#inCREATININBULAN').keyup(function() {
				$('#notifinCREATININBULAN').html('');
				a = $('#inCREATININBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCREATININBULAN').html(html);
				}else if (a >= 0.2 && a <= 0.4) {
					html = '<b style="color:blue">CREATININ NORMAL</b>';
					$('#notifinCREATININBULAN').html(html);
				} else{
					html = '<b style="color:red">CREATININ TIDAK NORMAL</b>';
					$('#notifinCREATININBULAN').html(html);
				}
			});
			
			// KeyUP SGOT
			$('#inSGOTBULAN').keyup(function() {
				$('#notifinSGOTBULAN').html('');
				a = $('#inSGOTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGOTBULAN').html(html);
				}else if( a >= 9 && a <= 80){
					html = '<b style="color:blue">SGOT NORMAL </b>';
					$('#notifinSGOTBULAN').html(html);
				}else{
					html = '<b style="color:red">SGOT TIDAK NORMAL</b>';
					$('#notifinSGOTBULAN').html(html);
				}
			});

			// KeyUP SGPT
			$('#inSGPTBULAN').keyup(function() {
				$('#notifinSGPTBULAN').html('');
				a = $('#inSGPTBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGPTBULAN').html(html);
				}else if( a >= 13 && a <= 45){
					html = '<b style="color:blue">SGPT NORMAL </b>';
					$('#notifinSGPTBULAN').html(html);
				}else{
					html = '<b style="color:red">SGPT TIDAK NORMAL</b>';
					$('#notifinSGPTBULAN').html(html);
				}
			});
			// End

			// KeyUP NA
			$('#inNABULAN').keyup(function() {
				$('#notifinNABULAN').html('');
				a = $('#inNABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNABULAN').html(html);
				}else if( a >= 128 && a <= 138){
					html = '<b style="color:blue">NA NORMAL</b>';
					$('#notifinNABULAN').html(html);
				}else{
					html = '<b style="color:red">NA TIDAK NORMAL</b>';
					$('#notifinNABULAN').html(html);
				}
			});

			//KeyUp K
			$('#inKBULAN').keyup(function() {
				$('#notifinKBULAN').html('');
				a = $('#inKBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKBULAN').html(html);
				}else if( a >= 3.9 && a <= 4.9){
					html = '<b style="color:blue">K NORMAL</b>';
					$('#notifinKBULAN').html(html);
				}else{
					html = '<b style="color:red">K TIDAK NORMAL</b>';
					$('#notifinKBULAN').html(html);
				}
			});

			$('#inCLBULAN').keyup(function() {
				$('#notifinCLBULAN').html('');
				a = $('#inCLBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCLBULAN').html(html);
				}else if( a >= 88 && a <= 100){
					html = '<b style="color:blue">CL NORMAL</b>';
					$('#notifinCLBULAN').html(html);
				}else{
					html = '<b style="color:red">CL TIDAK NORMAL</b>';
					$('#notifinCLBULAN').html(html);
				}
			});

			//Ca
			$('#inCaBULAN').keyup(function() {
				$('#notifinCaBULAN').html('');
				a = $('#inCaBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCaBULAN').html(html);
				}else if( a >= 0.99 && a <= 1.29){
					html = '<b style="color:blue">Ca NORMAL</b>';
					$('#notifinCaBULAN').html(html);
				}else{
					html = '<b style="color:red">Ca TIDAK NORMAL</b>';
					$('#notifinCaBULAN').html(html);
				}
			});
			// End

			// keyUp PROTEIN 
			$('#inPROTEINBULAN').keyup(function() {
				$('#notifinPROTEINBULAN').html('');
				a = $('#inPROTEINBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEINBULAN').html(html);
				}else if( a >= 5.1 && a <= 7.3){
					html = '<b style="color:blue">PROTEIN  NORMAL</b>';
					$('#notifinPROTEINBULAN').html(html);
				}else{
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEINBULAN').html(html);
				}
			});
			// End

			// keyUp ALBUMIN BULAN
			$('#inALBUMINBULAN').keyup(function() {
				$('#notifinALBUMINBULAN').html('');
				a = $('#inALBUMINBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinALBUMINBULAN').html(html);
				}else if( a >= 3.8 && a <= 5.4){
					html = '<b style="color:blue">ALBUMIN  NORMAL</b>';
					$('#notifinALBUMINBULAN').html(html);
				}else{
					html = '<b style="color:red">ALBUMIN TIDAK NORMAL</b>';
					$('#notifinALBUMINBULAN').html(html);
				}
			});
			// End

			// keyUp PROTEIN 
			$('#inPROTEINGLOBULINBULAN').keyup(function() {
				$('#notifinPROTEINGLOBULINBULAN').html('');
				a = $('#inPROTEINGLOBULINBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEINGLOBULINBULAN').html(html);
				}else if( a >= 6.4 && a <= 8.3){
					html = '<b style="color:blue">PROTEIN NORMAL</b>';
					$('#notifinPROTEINGLOBULINBULAN').html(html);
				}else{
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEINGLOBULINBULAN').html(html);
				}
			});
			// End

			// keyUp MALARIA
			$('#inMALARIABULAN').keyup(function() {
				$('#notifinMALARIABULAN').html('');
				a = $('#inMALARIABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMALARIABULAN').html(html);
				}
			});
			// End

			// keyUp WIDAL
			$('#inWIDALBULAN').keyup(function() {
				$('#notifinWIDALBULAN').html('');
				a = $('#inWIDALBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinWIDALBULAN').html(html);
				}
			});
			// End

			// keyUp TROPONIN
			$('#inTROPONINBULAN').keyup(function() {
				$('#notifinTROPONINBULAN').html('');
				a = $('#inTROPONINBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTROPONINBULAN').html(html);
				}
			});
			// End
			
			// keyUp NS1
			$('#inNS1BULAN').keyup(function() {
				$('#notifinNS1BULAN').html('');
				a = $('#inNS1BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNS1BULAN').html(html);
				}
			});
			// End

			// keyUp HBSAG
			$('#inHBSAGBULAN').keyup(function() {
				$('#notifinHBSAGBULAN').html('');
				a = $('#inHBSAGBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBSAGBULAN').html(html);
				}
			});
			// End
			
			// keyUp HBSAB
			$('#inHBSABBULAN').keyup(function() {
				$('#notifinHBSABBULAN').html('');
				a = $('#inHBSABBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBSABBULAN').html(html);
				}
			});
			// End

			// keyUp B20
			$('#inB20BULAN').keyup(function() {
				$('#notifinB20BULAN').html('');
				a = $('#inB20BULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinB20BULAN').html(html);
				}
			});
			// End

			// keyUp VDRL
			$('#inVDRLBULAN').keyup(function() {
				$('#notifinVDRLBULAN').html('');
				a = $('#inVDRLBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinVDRLBULAN').html(html);
				}
			});
			// End

			// keyUp PLANO
			$('#inPLANOBULAN').keyup(function() {
				$('#notifinPLANOBULAN').html('');
				a = $('#inPLANOBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPLANOBULAN').html(html);
				}
			});
			// End

			// keyUp SALMONELLA
			$('#inSALMONELLABULAN').keyup(function() {
				$('#notifinSALMONELLABULAN').html('');
				a = $('#inSALMONELLABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSALMONELLABULAN').html(html);
				}
			});
			// End

			// keyUp DENGUE
			$('#inDENGUEBULAN').keyup(function() {
				$('#notifinDENGUEBULAN').html('');
				a = $('#inDENGUEBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinDENGUEBULAN').html(html);
				}
			});
			// End

			// keyUp WARNA
			$('#inWARNABULAN').keyup(function() {
				$('#notifinWARNABULAN').html('');
				a = $('#inWARNABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinWARNABULAN').html(html);
				}
			});
			// End

			// keyUp KEJERNIHAN
			$('#inKEJERNIHANBULAN').keyup(function() {
				$('#notifinKEJERNIHANBULAN').html('');
				a = $('#inKEJERNIHANBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKEJERNIHANBULAN').html(html);
				}
			});
			// End

			// keyUp ERITROSIT
			$('#inERITROSITURINEBULAN').keyup(function() {
				$('#notifinERITROSITURINEBULAN').html('');
				a = $('#inERITROSITURINEBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITURINEBULAN').html(html);
				}else if( a <= 1){
					html = '<b style="color:blue">ERITROSIT NORMAL</b>';
					$('#notifinERITROSITURINEBULAN').html(html);
				}else{
					html = '<b style="color:red">ERITROSIT TIDAK NORMAL</b>';
					$('#notifinERITROSITURINEBULAN').html(html);
				}
			});
			// End

			// keyUp LEUKOSIT
			$('#inLEUKOSITURINEBULAN').keyup(function() {
				$('#notifinLEUKOSITURINEBULAN').html('');
				a = $('#inLEUKOSITURINEBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITURINEBULAN').html(html);
				}else if( a <= 6){
					html = '<b style="color:blue">LEUKOSIT NORMAL</b>';
					$('#notifinLEUKOSITURINEBULAN').html(html);
				}else{
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSITURINEBULAN').html(html);
				}
			});
			// End

			// keyUp SEL EPITEL
			$('#inSELBULAN').keyup(function() {
				$('#notifinSELBULAN').html('');
				a = $('#inSELBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSELBULAN').html(html);
				}
			});
			// End

			// keyUp SILINDER
			$('#inSILINDERBULAN').keyup(function() {
				$('#notifinSILINDERBULAN').html('');
				a = $('#inSILINDERBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSILINDERBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">SILINDER NORMAL</b>';
					$('#notifinSILINDERBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:blue">SILINDER TIDAK NORMAL</b>';
					$('#notifinSILINDERBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinSILINDERBULAN').html(html);
				}
			});
			// End

			// keyUp KRISTAL
			$('#inKRISTALBULAN').keyup(function() {
				$('#notifinKRISTALBULAN').html('');
				a = $('#inKRISTALBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKRISTALBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">KRISTAL NORMAL</b>';
					$('#notifinKRISTALBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">KRISTAL TIDAK NORMAL</b>';
					$('#notifinKRISTALBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinKRISTALBULAN').html(html);
				}
			});
			// End

			// keyUp BAKTERI
			$('#inBAKTERIBULAN').keyup(function() {
				$('#notifinBAKTERIBULAN').html('');
				a = $('#inBAKTERIBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAKTERIBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">BAKTERI NORMAL</b>';
					$('#notifinBAKTERIBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">BAKTERI TIDAK NORMAL</b>';
					$('#notifinBAKTERIBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinBAKTERIBULAN').html(html);
				}
			});
			// End

			// keyUp JAMUR
			$('#inJAMURBULAN').keyup(function() {
				$('#notifinJAMURBULAN').html('');
				a = $('#inJAMURBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinJAMURBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">JAMUR NORMAL</b>';
					$('#notifinJAMURBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">JAMUR TIDAK NORMAL</b>';
					$('#notifinJAMURBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinJAMURBULAN').html(html);
				}
			});
			// End

			// keyUp ERIROSITKIMIA
			$('#inERITROSITKIMIABULAN').keyup(function() {
				$('#notifinERITROSITKIMIABULAN').html('');
				a = $('#inERITROSITKIMIABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITKIMIABULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">ERITROSIT NORMAL</b>';
					$('#notifinERITROSITKIMIABULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">ERITROSIT TIDAK NORMAL</b>';
					$('#notifinERITROSITKIMIABULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinERITROSITKIMIABULAN').html(html);
				}
			});
			// End

			// keyUp GLUKOSA
			$('#inGLUKOSABULAN').keyup(function() {
				$('#notifinGLUKOSABULAN').html('');
				a = $('#inGLUKOSABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinGLUKOSABULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">GLUKOSA NORMAL</b>';
					$('#notifinGLUKOSABULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">GLUKOSA TIDAK NORMAL</b>';
					$('#notifinGLUKOSABULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinGLUKOSABULAN').html(html);
				}
			});
			// End

			// keyUp PROTEINKIMIA
			$('#inPROTEINKIMIABULAN').keyup(function() {
				$('#notifinPROTEINKIMIABULAN').html('');
				a = $('#inPROTEINKIMIABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEINKIMIABULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">PROTEIN NORMAL</b>';
					$('#notifinPROTEINKIMIABULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEINKIMIABULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinPROTEINKIMIABULAN').html(html);
				}
			});
			// End

			// keyUp BILIRUBIN
			$('#inBILIRUBINBULAN').keyup(function() {
				$('#notifinBILIRUBINBULAN').html('');
				a = $('#inBILIRUBINBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBILIRUBINBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">BILIRUBIN NORMAL</b>';
					$('#notifinBILIRUBINBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">BILIRUBIN TIDAK NORMAL</b>';
					$('#notifinBILIRUBINBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinBILIRUBINBULAN').html(html);
				}
			});
			// End


			// keyUp PH
			$('#inPHKIMIABULAN').keyup(function() {
				$('#notifinPHKIMIABULAN').html('');
				a = $('#inPHKIMIABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPHKIMIABULAN').html(html);
				}else if( a >= 2 && a <= 8){
					html = '<b style="color:blue">PH NORMAL</b>';
					$('#notifinPHKIMIABULAN').html(html);
				}else{
					html = '<b style="color:red">PH TIDAK NORMAL</b>';
					$('#notifinPHKIMIABULAN').html(html);
				}
			});
			// End

			// keyUp BERAT
			$('#inBERATBULAN').keyup(function() {
				$('#notifinBERATBULAN').html('');
				a = $('#inBERATBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBERATBULAN').html(html);
				}else if( a >= 1003 && a <= 1029){
					html = '<b style="color:blue">BERAT JENIS NORMAL</b>';
					$('#notifinBERATBULAN').html(html);
				}else{
					html = '<b style="color:red">BERAT JENIS TIDAK NORMAL</b>';
					$('#notifinBERATBULAN').html(html);
				}
			});
			// End

			// keyUp KETON
			$('#inKETONBULAN').keyup(function() {
				$('#notifinKETONBULAN').html('');
				a = $('#inKETONBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKETONBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">KETON NORMAL</b>';
					$('#notifinKETONBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">KETON TIDAK NORMAL</b>';
					$('#notifinKETONBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinKETONBULAN').html(html);
				}
			});
			// End

			// keyUp NITRIT
			$('#inNITRITBULAN').keyup(function() {
				$('#notifinNITRITBULAN').html('');
				a = $('#inNITRITBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNITRITBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">NITRIT NORMAL</b>';
					$('#notifinNITRITBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">NITRIT TIDAK NORMAL</b>';
					$('#notifinNITRITBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinNITRITBULAN').html(html);
				}
			});
			// End

			// keyUp LEUKOSITKIMIA
			$('#inLEUKOSITKIMIABULAN').keyup(function() {
				$('#notifinLEUKOSITKIMIABULAN').html('');
				a = $('#inLEUKOSITKIMIABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITKIMIABULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">LEUKOSITNORMAL</b>';
					$('#notifinLEUKOSITKIMIABULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSITKIMIABULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinLEUKOSITKIMIABULAN').html(html);
				}
			});
			// End

			// keyUp UROBILINOGEN
			$('#inUROBILINOGENBULAN').keyup(function() {
				$('#notifinUROBILINOGENBULAN').html('');
				a = $('#inUROBILINOGENBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinUROBILINOGENBULAN').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">UROBILINOGEN NORMAL</b>';
					$('#notifinUROBILINOGENBULAN').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">UROBILINOGEN TIDAK NORMAL</b>';
					$('#notifinUROBILINOGENBULAN').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinUROBILINOGENBULAN').html(html);
				}
			});
			// End
			
			// keyUp ANALISA SPERMA
			$('#inSPERMABULAN').keyup(function() {
				$('#notifinSPERMABULAN').html('');
				a = $('#inSPERMABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSPERMABULAN').html(html);
				}
			});
			// End

			// keyUp DARAH FESES
			$('#inDARAHFESESBULAN').keyup(function() {
				$('#notifinDARAHFESESBULAN').html('');
				a = $('#inDARAHFESESBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinDARAHFESESBULAN').html(html);
				}
			});
			// End

			// keyUp LENDIR
			$('#inLENDIRBULAN').keyup(function() {
				$('#notifinLENDIRBULAN').html('');
				a = $('#inLENDIRBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLENDIRBULAN').html(html);
				}
			});
			// End

			// keyUp BAU
			$('#inBAUBULAN').keyup(function() {
				$('#notifinBAUBULAN').html('');
				a = $('#inBAUBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAUBULAN').html(html);
				}
			});
			// End
			
			// keyUp KONSISTENSI
			$('#inKONSISTENSIBULAN').keyup(function() {
				$('#notifinKONSISTENSIBULAN').html('');
				a = $('#inKONSISTENSIBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKONSISTENSIBULAN').html(html);
				}
			});
			// End
			
			// keyUp WARNA FESES
			$('#inWARNAFESESBULAN').keyup(function() {
				$('#notifinWARNAFESESBULAN').html('');
				a = $('#inWARNAFESESBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinWARNAFESESBULAN').html(html);
				}
			});
			// End

			// keyUp PARASIT
			$('#inPARASITBULAN').keyup(function() {
				$('#notifinPARASITBULAN').html('');
				a = $('#inPARASITBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPARASITBULAN').html(html);
				}
			});
			// End

			// keyUp LEUKOSIT FESES
			$('#inLEUKOSITFESESBULAN').keyup(function() {
				$('#notifinLEUKOSITFESESBULAN').html('');
				a = $('#inLEUKOSITFESESBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITFESESBULAN').html(html);
				}
			});
			// End

			// keyUp ERITROSIT FESES
			$('#inERITROSITFESESBULAN').keyup(function() {
				$('#notifinERITROSITFESESBULAN').html('');
				a = $('#inERITROSITFESESBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITFESESBULAN').html(html);
				}
			});
			// End

			// keyUp SEL EPITEL
			$('#inSELFESESBULAN').keyup(function() {
				$('#notifinSELFESESBULAN').html('');
				a = $('#inSELFESESBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSELFESESBULAN').html(html);
				}
			});
			// End

			// keyUp SILIDER
			$('#inSILIDERBULAN').keyup(function() {
				$('#notifinSILIDERBULAN').html('');
				a = $('#inSILIDERBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSILIDERBULAN').html(html);
				}
			});
			// End

			// keyUp TELUR CACING
			$('#inTELURBULAN').keyup(function() {
				$('#notifinTELURBULAN').html('');
				a = $('#inTELURBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTELURBULAN').html(html);
				}
			});
			// End

			// keyUp AMOEBA
			$('#inAMOEBABULAN').keyup(function() {
				$('#notifinAMOEBABULAN').html('');
				a = $('#inAMOEBABULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinAMOEBABULAN').html(html);
				}
			});
			// End

			// keyUp BAKTERI FESES
			$('#inBAKTERIFESESBULAN').keyup(function() {
				$('#notifinBAKTERIFESESBULAN').html('');
				a = $('#inBAKTERIFESESBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAKTERIFESESBULAN').html(html);
				}
			});
			// End

			// keyUp INR
			$('#inINRBULAN').keyup(function() {
				$('#notifinINRBULAN').html('');
				a = $('#inINRBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinINRBULAN').html(html);
				}else if( a >= 0.7 && a <= 1.3){
					html = '<b style="color:blue">INR NORMAL</b>';
					$('#notifinINRBULAN').html(html);
				}else{
					html = '<b style="color:red">INR TIDAK NORMAL</b>';
					$('#notifinINRBULAN').html(html);
				}
			});
			// End

			// keyUp CRP
			$('#inCRPBULAN').keyup(function() {
				$('#notifinCRPBULAN').html('');
				a = $('#inCRPBULAN').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCRPBULAN').html(html);
				}else if( a <= 10){
					html = '<b style="color:blue">CRP NORMAL</b>';
					$('#notifinCRPBULAN').html(html);
				}else{
					html = '<b style="color:red">CRP TIDAK NORMAL</b>';
					$('#notifinCRPBULAN').html(html);
				}
			});
			// End
// End KeyUp Bayi Bulan
    </script>

<!-- END BULAN -->

<!-- Insert Script -->

	 <!--insert Darah Rutin Anak Bulan-->
	 <script type="text/javascript">
		function insert_bulan_darah() {
		    Nama_tindakan = $('#inNamaDARAHBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborDARAHBULAN').val();
			hb4050=$('#inHB4050BULAN').val();
			hb5025=$('#inHB5025BULAN').val();
			hb2635 =$('#inHB2635BULAN').val();
			hb47 =$('#inHB47BULAN').val();
			hb812 =$('#inHB812BULAN').val();
			leukosit=$('#inLEUKOSITBULAN').val();
			led=$('#inLEDBULAN').val();
			trombosit=$('#inTROMBOSITBULAN').val();
			hematokrit4050=$('#inHEMATOKRIT4050BULAN').val();
			hematokrit5025=$('#inHEMATOKRIT5025BULAN').val();
			hematokrit2635=$('#inHEMATOKRIT2635BULAN').val();
			hematokrit47=$('#inHEMATOKRIT47BULAN').val();
			hematokrit812=$('#inHEMATOKRIT812BULAN').val();
			mcv37=$('#inMCV37BULAN').val();
			mcv1525=$('#inMCV1525BULAN').val();
			mcv2635=$('#inMCV2635BULAN').val();
			mcv357=$('#inMCV357BULAN').val();
			mcv712=$('#inMCV712BULAN').val();
			mch37=$('#inMCH37BULAN').val();
			mch15=$('#inMCH15BULAN').val();
			mch225=$('#inMCH225BULAN').val();
			mch2635=$('#inMCH2635BULAN').val();
			mch3610=$('#inMCH3610BULAN').val();
			mch115=$('#inMCH115BULAN').val();
			mchc37=$('#inMCHC37BULAN').val();
			mchc407=$('#inMCHC407BULAN').val();
			mchc812=$('#inMCHC812BULAN').val();
			rdw_cv=$('#inRDW-CVBULAN').val();
			rdw_sd=$('#inRDW-SDBULAN').val();
			bas=$('#inBASBULAN').val();
			eos=$('#inEOSBULAN').val();
			mono=$('#inMONOBULAN').val();
			segmen=$('#inSEGMENBULAN').val();
			lympo=$('#inLYMPOBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_darah_rutin_bulan",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						hb4050:hb4050,
						hb5025:hb5025,
						hb2635:hb2635,
						hb47:hb47,
						hb812:hb812,
						leukosit:leukosit,
						led:led,
						trombosit:trombosit,
						hematokrit4050:hematokrit4050,
						hematokrit5025:hematokrit5025,
						hematokrit2635:hematokrit2635,
						hematokrit47:hematokrit47,
						hematokrit812:hematokrit812,
						mcv37:mcv37,
						mcv1525:mcv1525,
						mcv2635:mcv2635,
						mcv357:mcv357,
						mcv712:mcv712,
						mch37:mch37,
						mch15:mch15,
						mch225:mch225,
						mch2635:mch2635,
						mch3610:mch3610,
						mch115:mch115,
						mchc37:mchc37,
						mchc407:mchc407,
						mchc812:mchc812,
						rdw_cv:rdw_cv,
						rdw_sd:rdw_sd,
						bas:bas,
						eos:eos,
						mono:mono,
						segmen:segmen,
						lympo:lympo,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hb4050=$('#inHB4050BULAN').val("");
						hb5025=$('#inHB5025BULAN').val("");
						hb2635 =$('#inHB2635BULAN').val("");
						hb47 =$('#inHB47BULAN').val("");
						hb812 =$('#inHB812BULAN').val("");
						leukosit=$('#inLEUKOSITBULAN').val("");
						led=$('#inLEDBULAN').val("");
						trombosit=$('#inTROMBOSITBULAN').val();
						hematokrit4050=$('#inHEMATOKRIT4050BULAN').val("");
						hematokrit5025=$('#inHEMATOKRIT5025BULAN').val("");
						hematokrit2635=$('#inHEMATOKRIT2635BULAN').val("");
						hematokrit47=$('#inHEMATOKRIT47BULAN').val("");
						hematokrit812=$('#inHEMATOKRIT812BULAN').val("");
						mcv37=$('#inMCV37BULAN').val("");
						mcv1525=$('#inMCV1525BULAN').val("");
						mcv2635=$('#inMCV2635BULAN').val("");
						mcv357=$('#inMCV357BULAN').val("");
						mcv712=$('#inMCV712BULAN').val("");
						mch37=$('#inMCH37BULAN').val("");
						mch15=$('#inMCH15BULAN').val("");
						mch225=$('#inMCH225BULAN').val("");
						mch2635=$('#inMCH2635BULAN').val("");
						mch3610=$('#inMCH3610BULAN').val("");
						mch115=$('#inMCH115BULAN').val("");
						mchc37=$('#inMCHC37BULAN').val("");
						mchc407=$('#inMCHC407BULAN').val("");
						mchc812=$('#inMCHC812BULAN').val("");
						rdw_cv=$('#inRDW-CVBULAN').val("");
						rdw_sd=$('#inRDW-SDBULAN').val("");
						bas=$('#inBASBULAN').val("");
						eos=$('#inEOSBULAN').val("");
						mono=$('#inMONOBULAN').val("");
						segmen=$('#inSEGMENBULAN').val("");
						lympo=$('#inLYMPOBULAN').val("");
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

		//Insert golongan darah baby bulan
		function	insert_gol_darah_baby_bulan() {
		    Nama_tindakan = $('#inNamaGOLBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborGOLBULAN').val();
			golongan_darah_baby_bulan=$('#inGOLDARAHBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_golongan_darah_baby_bulan",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						gol_darah:golongan_darah_baby_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						golongan_darah_baby_bulan=$('#inGOLDARAHBULAN').val("");
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

		//Insert rhesus bulan
		function	insert_bulan_rhesus() {
		    Nama_tindakan = $('#inNamaRHESUSBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborRHESUSBULAN').val();
			rhesus_bulan=$('#inRHESUSBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_rhesus_baby_bulan",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						rhesus:rhesus_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						rhesus_bulan=$('#inRHESUSBULAN').val("");
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
		//End Rhesus

		//Insert aptt bulan
		function	insert_bulan_aptt() {
		    Nama_tindakan = $('#inNamaAPTTBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborAPTTBULAN').val();
			aptt_bulan=$('#inAPTTBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_aptt",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						aptt:aptt_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						aptt_bulan=$('#inAPTTBULAN').val("");
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
		//End Aptt

		//Insert Gula Darah
		function	insert_bulan_guldarah() {
		    Nama_tindakan = $('#inNamaGULDARAHBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborGULDARAHBULAN').val();
			guldarah_bulan=$('#inGULDARAHBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_guldarah",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						guldarah:guldarah_bulan,
						inJenisPasienBULAN
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						guldarah_bulan=$('#inGULDARAHBULAN').val("");
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
		//End Gula darah

		//Insert PT bulan
		function insert_bulan_pt() {
		    Nama_tindakan = $('#inNamaPTBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborPTBULAN').val();
			pt=$('#inPTBULAN').val();
			inr=$('#inINRBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_pt",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						pt:pt,
						inr:inr,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						pt=$('#inPTBULAN').val("");
						inr=$('#inINRBULAN').val("");
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
		//End PT Bulan

		//Insert PT/APTT bulan
		function	insert_bulan_ptaptt() {
		    Nama_tindakan = $('#inNamaPTAPTTBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborPTAPTTBULAN').val();
			pt=$('#inPTAPTTBULAN').val();
			inr=$('#inINRPTAPTTBULAN').val();
			aptt=$('#inAPTTPTAPTTBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_ptaptt",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						pt:pt,
						inr:inr,
						aptt:aptt,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						pt=$('#inPTAPTTBULAN').val("");
						inr=$('#inINRPTAPTTBULAN').val("");
						aptt=$('#inAPTTPTAPTTBULAN').val("");
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
		//End PTAPTT Bulan

		//Insert HBA bulan
		function	insert_bulan_hba() {
		    Nama_tindakan = $('#inNamaHBABULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborHBABULAN').val();
			hba=$('#inHBABULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_hba",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						hba:hba,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hba=$('#inHBABULAN').val("");
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
		//End HBA Bulan


		//Insert Uric Acid
		function	insert_bulan_uric() {
		    Nama_tindakan = $('#inNamaURICBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborURICBULAN').val();
			uric_acid12=$('#inURICBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_uric",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						uric_acid12:uric_acid12,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						uric_acid12=$('#inURICBULAN').val("");
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
		//End Uric Acid

		//Insert TRIGLISERIDA			
		function	insert_bulan_triglyseride() {
		    Nama_tindakan = $('#inNamaTRIGLYSERIDEBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborTRIGLYSERIDEBULAN').val();
			trigiserida=$('#inTRIGLYSERIDEBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_triglyseride",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						trigiserida:trigiserida,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						trigiserida=$('#inTRIGLYSERIDEBULAN').val("");
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
		//End TRIGLISERIDA	

		//Insert bulan UREUM		
		function	insert_bulan_ureum() {
		    Nama_tindakan = $('#inNamaUREUMBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborUREUMBULAN').val();
		    Harga=$('#Harga_ureum_bulan').val();
		    Frekuensi = $("#Frek_ureum_bulan").val();
			id_pelayanan = $('#id_pelayanan_ureum_bulan').val();
			id_list_tindakan= $('#id_list_tindakan_ureum_bulan').val();
			Total= $('#total_ureum_bulan').val();
			tanggal= $('#tanggal_ureum_bulan').val();
			id_staff=$('#id_staff_ureum_bulan').val();
			ureum_bulan=$('#inUREUMBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_ureum",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						ureum:ureum_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						ureum_bulan=$('#inUREUMBULAN').val("");
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
		//End UREUM	

		//Insert bulan CREATININ		
		function	insert_bulan_creatinin() {
		    Nama_tindakan = $('#inNamaCREATININBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborCREATININBULAN').val();
			creatinin_bulan=$('#inCREATININBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_creatinin",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						creatinin:creatinin_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						creatinin_bulan=$('#inCREATININBULAN').val("");
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
		//End CREATININ

		//Insert bulan PROTEIN		
		function	insert_bulan_protein() {
		    Nama_tindakan = $('#inNamaPROTEINBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborPROTEINBULAN').val();
			protein_bulan=$('#inPROTEINBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_protein",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						protein:protein_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						protein_bulan=$('#inPROTEINBULAN').val("");
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
		//End PROTEIN

		//Insert bulan ALBUMIN		
		function	insert_bulan_albumin() {
		    Nama_tindakan = $('#inNamaALBUMINBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborALBUMINBULAN').val();
			albumin_bulan=$('#inALBUMINBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_albumin",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						albumin:albumin_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						albumin_bulan=$('#inALBUMINBULAN').val("");
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
		//End ALBUMIN

		//Insert bulan ELEKTROLIT		
		function	insert_bulan_elektrolit() {
		    Nama_tindakan = $('#inNamaELEKTROLITBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborELEKTROLITBULAN').val();
			na_bulan=$('#inNABULAN').val();
			k_bulan=$('#inKBULAN').val();
			cl_bulan=$('#inCLBULAN').val();
			ca_bulan=$('#inCaBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_elektrolit",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						na:na_bulan,
						k:k_bulan,
						cl:cl_bulan,
						ca:ca_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						na_bulan=$('#inNABULAN').val("");
						k_bulan=$('#inKBULAN').val("");
						cl_bulan=$('#inCLBULAN').val("");
						ca_bulan=$('#inCaBULAN').val("");
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
		//End ELEKTROLIT

		//Insert bulan SGPT		
		function	insert_bulan_sgpt() {
		    Nama_tindakan = $('#inNamaSGPTBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborSGPTBULAN').val();
			sgpt_bulan=$('#inSGPTBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_sgpt",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						sgpt:sgpt_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sgpt_bulan=$('#inSGPTBULAN').val("");
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
		//End SGPT

		//Insert bulan SGOT	
		function	insert_bulan_sgot() {
		    Nama_tindakan = $('#inNamaSGOTBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborSGOTBULAN').val();
			sgot_bulan=$('#inSGOTBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_sgot",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						sgot:sgot_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sgot_bulan=$('#inSGOTBULAN').val("");
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
		//End SGOT

		//Insert bulan CRP
		function	insert_bulan_crp() {
		    Nama_tindakan = $('#inNamaCRPBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborCRPBULAN').val();
			crp_bulan=$('#inCRPBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_crp",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						crp:crp_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						crp_bulan=$('#inCRPBULAN').val("");
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
		//End CRP

		//Insert CHOLESTEROL					
		function	insert_bulan_cho() {
		    Nama_tindakan = $('#inNamaCHOBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborCHOBULAN').val();
			cho=$('#inCHOBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_cho",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						cho:cho,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						cho=$('#inCHOBULAN').val("");
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
		//End CHOLESTEROL		

		//Insert B20					
		function	insert_bulan_b20() {
		    Nama_tindakan = $('#inNamaB20BULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborB20BULAN').val();
			b20_bulan=$('#inB20BULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_b20",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						b20:b20_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						b20_bulan=$('#inB20BULAN').val("");
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
		//B20	

		//Insert HBSAB					
		function	insert_bulan_hbsab() {
		    Nama_tindakan = $('#inNamaHBSABBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborHBSABBULAN').val();
			hbsab_bulan=$('#inHBSABBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_hbsab",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						hbsab:hbsab_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hbsab_bulan=$('#inHBSABBULAN').val("");
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
		//End HBSAB	

		//Insert HBSAG				
		function	insert_bulan_hbsag() {
		    Nama_tindakan = $('#inNamaHBSAGBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborHBSAGBULAN').val();
			hbsag_bulan=$('#inHBSAGBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_hbsag",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						hbsag:hbsag_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hbsag_bulan=$('#inHBSAGBULAN').val("");
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
		//End HBSAG

		//Insert SALMONELLA				
		function	insert_bulan_salmonella() {
		    Nama_tindakan = $('#inNamaSALMONELLABULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborSALMONELLABULAN').val();
			salmonella_bulan=$('#inSALMONELLABULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_salmonella",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						salmonella:salmonella_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						salmonella_bulan=$('#inSALMONELLABULAN').val("");
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
		//End SALMONELLA

		//Insert DENGUE				
		function	insert_bulan_dengue() {
		    Nama_tindakan = $('#inNamaDENGUEBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborDENGUEBULAN').val();
			dengue_bulan=$('#inDENGUEBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_dengue",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						dengue:dengue_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						dengue_bulan=$('#inDENGUEBULAN').val("");
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
		//End DENGUE


		//Insert NS1				
		function	insert_bulan_ns1() {
		    Nama_tindakan = $('#inNamaNS1BULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborNS1BULAN').val();
			ns1_bulan=$('#inNS1BULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
						url : "<?php echo base_url() ?>Labor/insert_bulan_ns1",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						ns1:ns1_bulan,
						inJenisPasienBULAN:inJenisPasienBULAN,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						ns1_bulan=$('#inNS1BULAN').val("");
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
		//End NS1

		function insert_bulan_vdrl() {
		    Nama_tindakan = $('#inNamaVDRLBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborVDRLBULAN').val();
			vdrl=$('#inVDRLBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
							url : "<?php echo base_url() ?>Labor/insert_bulan_vdrl",
							method: "POST",
							dataType: 'json',
							data : {
							id_tindakan_labor:id_tindakan_labor,
							vdrl:vdrl,
							inJenisPasienBULAN:inJenisPasienBULAN,
							},
							success: function(data){
							if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							vdrl=$('#inVDRLBULAN').val("");
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
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
							inJenisPasienBULAN:inJenisPasienBULAN,
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
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
							inJenisPasienBULAN:inJenisPasienBULAN,
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

	function insert_bulan_sputumbtaiii() {
		    Nama_tindakan = $('#inNamaSPUTUMBTAIIIBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborSPUTUMBTAIIIBULAN').val();
			sputum=$('#inSPUTUMBTAIIIBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
							url : "<?php echo base_url() ?>Labor/sputum_bulan_btaiii",
							method: "POST",
							dataType: 'json',
							data : {
							id_tindakan_labor:id_tindakan_labor,
							sputum:sputum,
							inJenisPasienBULAN:inJenisPasienBULAN,
							},
							success: function(data){
							if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							sputum=$('#inSPUTUMBTAIIIBULAN').val("");
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

	function insert_bulan_sputumbtaii() {
		    Nama_tindakan = $('#inNamaSPUTUMBTAIIBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborSPUTUMBTAIIBULAN').val();
			sputum=$('#inSPUTUMBTAIIBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
							url : "<?php echo base_url() ?>Labor/sputum_bulan_btaii",
							method: "POST",
							dataType: 'json',
							data : {
							id_tindakan_labor:id_tindakan_labor,
							sputum:sputum,
							inJenisPasienBULAN:inJenisPasienBULAN,
							},
							success: function(data){
							if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							sputum=$('#inSPUTUMBTAIIBULAN').val("");
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

	function insert_bulan_sputumbtai() {
		    Nama_tindakan = $('#inNamaSPUTUMBTAIBULAN').val();
		    id_tindakan_labor = $('#id_tindakan_laborSPUTUMBTAIBULAN').val();
			sputum=$('#inSPUTUMBTAIBULAN').val();
			inJenisPasienBULAN=$('#inMasukBULAN').val();
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
							url : "<?php echo base_url() ?>Labor/sputum_bulan_btai",
							method: "POST",
							dataType: 'json',
							data : {
							id_tindakan_labor:id_tindakan_labor,
							sputum:sputum,
							inJenisPasienBULAN:inJenisPasienBULAN,
							},
							success: function(data){
							if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							sputum=$('#inSPUTUMBTAIBULAN').val("");
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

	//insert DARAH SAMAR BULAN
	function insert_bulan_darahsamar() {
		Nama_tindakan = $('#inNamaDARAHSAMARBULAN').val();
		id_tindakan_labor = $('#id_tindakan_laborDARAHSAMARBULAN').val();
		darahsamar=$('#inDARAHSAMARBULAN').val();
		inJenisPasienBULAN=$('#inMasukBULAN').val();
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
					url : "<?php echo base_url() ?>Labor/insert_darahsamar_baby_bulan",
					method: "POST",
					dataType: 'json',
					data : {
						id_tindakan_labor:id_tindakan_labor,
						darahsamar:darahsamar,
						inJenisPasienBULAN:inJenisPasienBULAN,
					},
					success: function(data){
						if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							darahsamar=$('#inDARAHSAMARBULAN').val("");
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

	//insert MALARIA BULAN
	function insert_bulan_malaria() {
		Nama_tindakan = $('#inNamaMALARIABULAN').val();
		id_tindakan_labor = $('#id_tindakan_laborMALARIABULAN').val();
		malaria=$('#inMALARIABULAN').val();
		inJenisPasienBULAN=$('#inMasukBULAN').val();
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
					url : "<?php echo base_url() ?>Labor/insert_malaria_baby_bulan",
					method: "POST",
					dataType: 'json',
					data : {
						id_tindakan_labor:id_tindakan_labor,
						malaria:malaria,
						inJenisPasienBULAN:inJenisPasienBULAN,
					},
					success: function(data){
						if(data.status=="success"){
							swal({   
								title: "good job!",   
								type: "success", 
								text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
								confirmButtonColor: "#3cb878",  
							});
							malaria=$('#inMALARIABULAN').val("");
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

	function hapus_labor_BULAN(id_tindakan_labor, id_pelayanan, nama) { 
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
										$('#tablelaborANAK').DataTable().ajax.reload();
                                        $('#outTotalHargaANAK').DataTable().ajax.reload();
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
<!-- End Script -->