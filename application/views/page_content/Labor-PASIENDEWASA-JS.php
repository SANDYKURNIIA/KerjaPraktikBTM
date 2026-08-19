<script type="text/javascript">
					// DEWASA
					function reload_data_labor_DEWASA(id_pelayanan) {   
						var a = document.getElementById('cetak_semua_dewasa'); 
						a.href = "labor_DEWASA_All_print/" + id_pelayanan

                        $('#tablelaborDEWASA').dataTable().fnClearTable();
                        $('#tablelaborDEWASA').dataTable().fnDestroy();
                        $('#tablelaborDEWASA').DataTable({
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
                                "url": '<?php echo base_url('Labor/tampil_all_labor_dewasa_sendiri'); ?>',
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

					function reload_total_labor_DEWASA(id_pelayanan) {
                        $('#outTotalHargaDEWASA').dataTable().fnClearTable();
                        $('#outTotalHargaDEWASA').dataTable().fnDestroy();
                        $('#outTotalHargaDEWASA').DataTable({
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
                                "url": '<?php echo base_url('Labor/tampil_total_labor_sendiri'); ?>',
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
					// End
</script>


<script type="text/javascript">
        function aksi_labor_dewasa(id_tindakan_labor,id_pelayanan,nama){
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
					//DEWASA 
						if(data.nama == " Darah Rutin "){
							// Darah Rutin
							$("#inNamaDARAHDEWASA").val(data.nama);
							$('#isiDARAHDEWASA').collapse('toggle');
							$('#isiAGDDEWASA').collapse('hide');
							$('#isiLEDDEWASA').collapse('hide');
							$('#isiAPTTDEWASA').collapse('hide');
							$('#isiCLTDEWASA').collapse('hide');
							$('#isiVDRLDEWASA').collapse('hide');
							$('#isiUREUMDEWASA').collapse('hide');
							$('#isiB20DEWASA').collapse('hide');
							$('#isiBLTDEWASA').collapse('hide');
							$('#isiPTDEWASA').collapse('hide');
							$('#isiAPTTDEWASA').collapse('hide');
							$('#isiPTAPTTDEWASA').collapse('hide');
							$('#isiDENGUEDEWASA').collapse('hide');
							$('#isiTROPONINDEWASA').collapse('hide');
							$('#isiELEKTROLITDEWASA').collapse('hide');
							$('#isiGLOBULINDEWASA').collapse('hide');
							$('#isiGOL-DARAHDEWASA').collapse('hide');
							$('#isiSALMONELLADEWASA').collapse('hide');
							$('#isiNS1DEWASA').collapse('hide');
							$('#isiGULDARAHDEWASA').collapse('hide');
							$('#isiFESESDEWASA').collapse('hide');
							$('#isiALBUMINDEWASA').collapse('hide');
							$('#isiPROTEINDEWASA').collapse('hide');
							$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
							$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
							$('#isiHBSABDEWASA').collapse('hide');
							$('#isiMALARIADEWASA').collapse('hide');
							$('#isiFT4DEWASA').collapse('hide');
							$('#isiSPERMADEWASA').collapse('hide');
							$('#isiSAMARDEWASA').collapse('hide');
							$('#isiHBSAGDEWASA').collapse('hide');
							$('#isiSPUTUMBTAIDEWASA').collapse('hide');
							$('#isiURINEDEWASA').collapse('hide');
							$('#isiPLANODEWASA').collapse('hide');
							$('#isiSGPTDEWASA').collapse('hide');
							$('#isiSGOTDEWASA').collapse('hide');
							$('#isiCREATININDEWASA').collapse('hide');
							$('#isiWIDALDEWASA').collapse('hide');
							$('#isiHBADEWASA').collapse('hide');
							$('#isiURICDEWASA').collapse('hide');
							$('#isiLDLDEWASA').collapse('hide');
							$('#isiCHODEWASA').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_labor_Darah_Dewasa").val(data.id_tindakan_labor);
							$("#Harga_Darah_Rutin_Dewasa").val(data.harga);
							$("#Frek_Darah_Rutin_Dewasa").val(data.frek);
							$("#id_pelayanan_Darah_Rutin_Rutin_Dewasa").val(data.id_pelayanan);
							$("#id_list_tindakan_Darah_Rutin_Dewasa").val(data.id_list_tindakan);
							$("#total_Darah_Rutin_Dewasa").val(data.total);
							$("#tanggal_Darah_Rutin_Dewasa").val(data.tanggal);
							$("#id_staff_Darah_Rutin_Dewasa").val(data.id_staff);
							}else if(data.nama == " GOL DARAH "){
								// GOL DARAH
								$("#inNamaGOLDEWASA").val(data.nama);
								$('#id_tindakan_labor_golongan_darah_dewasa').val(data.id_tindakan_labor);
		    					$('#Harga_golongan_darah_dewasa').val(data.harga);
		    					$("#Frek_golongan_darah_dewasa").val(data.frek);
								$('#id_pelayanan_golongan_darah_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_golongan_darah_dewasa').val(data.id_list_tindakan);
								$('#total_golongan_darah_dewasa').val(data.total);
								$('#tanggal_golongan_darah_dewasa').val(data.tanggal);
								$('#id_staff_golongan_darah_dewasa').val(data.id_staff);
								$('#isiGOL-DARAHDEWASA').collapse('toggle');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiHBA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$("#id_tindakan_laborGOLDEWASA").val(data.id_tindakan_labor);
							}else if(data.nama == " LED "){
								// LED
								$("#inNamaLEDDEWASA").val(data.nama);
								$('#isiLEDDEWASA').collapse('toggle');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$("#id_tindakan_labor_led_dewasa").val(data.id_tindakan_labor);
								$('#Harga_led_dewasa').val(data.harga);
		    					$("#Frek_led_dewasa").val(data.frek);
								$('#id_pelayanan_led_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_led_dewasa').val(data.id_list_tindakan);
								$('#total_led_dewasa').val(data.total);
								$('#tanggal_led_dewasa').val(data.tanggal);
								$('#id_staff_led_dewasa').val(data.id_staff);

							}else if(data.nama == "RHESUS"){
								// RHESUS
								$("#inNamaRHESUSDEWASA").val(data.nama);
								$('#isiRHESUSDEWASA').collapse('toggle');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$("#id_tindakan_laborRHESUS").val(data.id_tindakan_labor);
								$('#Harga_rhesus_dewasa').val(data.harga);
		    					$("#Frek_rhesus_dewasa").val(data.frek);
								$('#id_pelayanan_rhesus_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_rhesus_dewasa').val(data.id_list_tindakan);
								$('#total_rhesus_dewasa').val(data.total);
								$('#tanggal_rhesus_dewasa').val(data.tanggal);
								$('#id_staff_rhesus_dewasa').val(data.id_staff);
							}else if(data.nama == " BLT "){
								// BLT
								$("#inNamaBLTDEWASA").val(data.nama);
								$('#isiBLTDEWASA').collapse('toggle');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$("#id_tindakan_laborBLTDEWASA").val(data.id_tindakan_labor);
								$('#Harga_blt_dewasa').val(data.harga);
		    					$("#Frek_blt_dewasa").val(data.frek);
								$('#id_pelayanan_blt_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_blt_dewasa').val(data.id_list_tindakan);
								$('#total_blt_dewasa').val(data.total);
								$('#tanggal_blt_dewasa').val(data.tanggal);
								$('#id_staff_blt_dewasa').val(data.id_staff);
							}else if(data.nama == "APTT"){
								// APTT
								$("#inNamaAPTTDEWASA").val(data.nama);
								$('#isiAPTTDEWASA').collapse('toggle');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborAPTTDEWASA").val(data.id_tindakan_labor);
								$('#Harga_aptt_dewasa').val(data.harga);
		    					$("#Frek_aptt_dewasa").val(data.frek);
								$('#id_pelayanan_aptt_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_aptt_dewasa').val(data.id_list_tindakan);
								$('#total_aptt_dewasa').val(data.total);
								$('#tanggal_aptt_dewasa').val(data.tanggal);
								$('#id_staff_aptt_dewasa').val(data.id_staff);	
							}else if(data.nama == " CLT "){
								// GULA DARAH
								$("#inNamaCLTDEWASA").val(data.nama);
								$('#isiCLTDEWASA').collapse('toggle');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$("#id_tindakan_laborCLTDEWASA").val(data.id_tindakan_labor);
								$('#Harga_clt_dewasa').val(data.harga);
		    					$("#Frek_clt_dewasa").val(data.frek);
								$('#id_pelayanan_clt_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_clt_dewasa').val(data.id_list_tindakan);
								$('#total_clt_dewasa').val(data.total);
								$('#tanggal_clt_dewasa').val(data.tanggal);
								$('#id_staff_clt_dewasa').val(data.id_staff);
							}else if(data.nama == " GULA DARAH "){
								// GULA DARAH
								$("#inNamaGULDARAHDEWASA").val(data.nama);
								$('#isiGULDARAHDEWASA').collapse('toggle');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborGULDARAHDEWASA").val(data.id_tindakan_labor);
								$("#Harga_gula_darah_dewasa").val(data.harga);
								$("#Frek_gula_darah_dewasa").val(data.frek);
								$("#id_pelayanan_gula_darah_dewasa").val(data.id_pelayanan);
								$("#id_list_tindakan_gula_darah_dewasa").val(data.id_list_tindakan);
								$("#total_gula_darah_dewasa").val(data.total);
								$("#tanggal_gula_darah_dewasa").val(data.tanggal);
								$("#id_staff_gula_darah_dewasa").val(data.id_staff);
							}else if(data.nama == "HBA 1 C (A 1 C)"){
								// HBA 1 C (A 1 C)
								$("#inNamaHBADEWASA").val(data.nama);
								$('#isiHBADEWASA').collapse('toggle');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborHBADEWASA").val(data.id_tindakan_labor);
							}else if(data.nama == "URIC ACID"){
								// URIC ACID
								$("#inNamaURICDEWASA").val(data.nama);
								$('#isiURICDEWASA').collapse('toggle');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$("#id_tindakan_laborURICDEWASA").val(data.id_tindakan_labor);
								$("#Harga_uric_dewasa").val(data.harga);
								$("#Frek_uric_dewasa").val(data.frek);
								$("#id_pelayanan_uric_dewasa").val(data.id_pelayanan);
								$("#id_list_tindakan_uric_dewasa").val(data.id_list_tindakan);
								$("#total_uric_dewasa").val(data.total);
								$("#tanggal_uric_dewasa").val(data.tanggal);
								$("#id_staff_uric_dewasa").val(data.id_staff);
							}else if(data.nama == "TRIGLYSERIDE"){
								// TRIGLYSERIDE
								$("#inNamaTRIGLYSERIDEDEWASA").val(data.nama);
								$('#isiTRIGLYSERIDEDEWASA').collapse('toggle');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiGOL-DARAH').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$("#id_tindakan_laborTRIGLYSERIDEDEWASA").val(data.id_tindakan_labor);
								$("#Harga_tryglyseride_dewasa").val(data.harga);
								$("#Frek_tryglyseride_dewasa").val(data.frek);
								$("#id_pelayanan_tryglyseride_dewasa").val(data.id_pelayanan);
								$("#id_list_tindakan_tryglyseride_dewasa").val(data.id_list_tindakan);
								$("#total_tryglyseride_dewasa").val(data.total);
								$("#tanggal_tryglyseride_dewasa").val(data.tanggal);
								$("#id_staff_tryglyseride_dewasa").val(data.id_staff);
							}else if(data.nama == "CHO"){
								// CHO
								$("#inNamaDEWASACHO").val(data.nama);
								$('#isiCHODEWASA').collapse('toggle');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$("#id_tindakan_laborCHODEWASA").val(data.id_tindakan_labor);
							}else if(data.nama == "HDL"){
								// HDL
								$("#inNamaHDLDEWASA").val(data.nama);
								$('#isiHDLDEWASA').collapse('toggle');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborHDLDEWASA").val(data.id_tindakan_labor);
								$("#Harga_hdl_dewasa").val(data.harga);
								$("#Frek_hdl_dewasa").val(data.frek);
								$("#id_pelayanan_hdl_dewasa").val(data.id_pelayanan);
								$("#id_list_tindakan_hdl_dewasa").val(data.id_list_tindakan);
								$("#total_hdl_dewasa").val(data.total);
								$("#tanggal_hdl_dewasa").val(data.tanggal);
								$("#id_staff_hdl_dewasa").val(data.id_staff);
							}else if(data.nama == "LDL"){
								// LDL
								$("#inNamaLDLDEWASA").val(data.nama);
								$('#isiLDLDEWASA').collapse('toggle');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborLDLDEWASA").val(data.id_tindakan_labor);
								$("#Harga_ldl_dewasa").val(data.harga);
								$("#Frek_ldl_dewasa").val(data.frek);
								$("#id_pelayanan_ldl_dewasa").val(data.id_pelayanan);
								$("#id_list_tindakan_ldl_dewasa").val(data.id_list_tindakan);
								$("#total_ldl_dewasa").val(data.total);
								$("#tanggal_ldl_dewasa").val(data.tanggal);
								$("#id_staff_ldl_dewasa").val(data.id_staff);
							}else if(data.nama == "UREUM"){
								// UREUM
								$("#inNamaUREUMDEWASA").val(data.nama);
								$('#isiUREUMDEWASA').collapse('toggle');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborUREUMDEWASA").val(data.id_tindakan_labor);
								$('#Harga_ureum_dewasa').val(data.harga);
		    					$("#Frek_ureum_dewasa").val(data.frek);
								$('#id_pelayanan_ureum_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_ureum_dewasa').val(data.id_list_tindakan);
								$('#total_ureum_dewasa').val(data.total);
								$('#tanggal_ureum_dewasa').val(data.tanggal);
								$('#id_staff_ureum_dewasa').val(data.id_staff);
							}else if(data.nama == "CREATININ"){
								// CREATININ
								$("#inNamaCREATININDEWASA").val(data.nama);
								$('#isiCREATININDEWASA').collapse('toggle');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$("#id_tindakan_laborCREATININDEWASA").val(data.id_tindakan_labor);
								$('#Harga_creatinin_dewasa').val(data.harga);
		    					$("#Frek_creatinin_dewasa").val(data.frek);
								$('#id_pelayanan_creatinin_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_creatinin_dewasa').val(data.id_list_tindakan);
								$('#total_creatinin_dewasa').val(data.total);
								$('#tanggal_creatinin_dewasa').val(data.tanggal);
								$('#id_staff_creatinin_dewasa').val(data.id_staff);
							}else if(data.nama == "SGOT"){
								// SGOT
								$("#inNamaSGOTDEWASA").val(data.nama);
								$('#isiSGOTDEWASA').collapse('toggle');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiALDEWASAP').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$("#id_tindakan_laborSGOTDEWASA").val(data.id_tindakan_labor);
								$('#Harga_sgot_dewasa').val(data.harga);
		    					$("#Frek_sgot_dewasa").val(data.frek);
								$('#id_pelayanan_sgot_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_sgot_dewasa').val(data.id_list_tindakan);
								$('#total_sgot_dewasa').val(data.total);
								$('#tanggal_sgot_dewasa').val(data.tanggal);
								$('#id_staff_sgot_dewasa').val(data.id_staff);
							}else if(data.nama == "SGPT"){
								// SGPT
								$("#inNamaDEWASASGPT").val(data.nama);
								$('#isiSGPTDEWASA').collapse('toggle');
								$('.data_hide').addClass('collapse');
								$('#inTipeMasuk').change(function() {
									var selector = '.data_hide_' + $(this).val();
									$('.data_hide').collapse('hide');
									$(selector).collapse('show');
								});
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborSGPTDEWASA").val(data.id_tindakan_labor);
								$('#Harga_sgpt_dewasa').val(data.harga);
		    					$("#Frek_sgpt_dewasa").val(data.frek);
								$('#id_pelayanan_sgpt_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_sgpt_dewasa').val(data.id_list_tindakan);
								$('#total_sgpt_dewasa').val(data.total);
								$('#tanggal_sgpt_dewasa').val(data.tanggal);
								$('#id_staff_sgpt_dewasa').val(data.id_staff);
							}else if(data.nama == "ELEKTROLIT "){
								// ELEKTROLIT
								$("#inNamaELEKTROLITDEWASA").val(data.nama);
								$('#isiELEKTROLITDEWASA').collapse('toggle');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$("#id_tindakan_laborELEKTROLITDEWASA").val(data.id_tindakan_labor);
								$('#Harga_elektrolit_dewasa').val(data.harga);
		    					$("#Frek_elektrolit_dewasa").val(data.frek);
								$('#id_pelayanan_elektrolit_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_elektrolit_dewasa').val(data.id_list_tindakan);
								$('#total_elektrolit_dewasa').val(data.total);
								$('#tanggal_elektrolit_dewasa').val(data.tanggal);
								$('#id_staff_elektrolit_dewasa').val(data.id_staff);

							}else if(data.nama == " Sputum B T A I"){
								// SPUTUMBTAI
								$("#inNamaSPUTUMBTAIDEWASA").val(data.nama);
								$('#isiSPUTUMBTAIDEWASA').collapse('toggle');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborSPUTUMBTAIDEWASA").val(data.id_tindakan_labor);
								$('#Harga_sputumbtai_dewasa').val(data.harga);
		    					$("#Frek_sputumbtai_dewasa").val(data.frek);
								$('#id_pelayanan_sputumbtai_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_sputumbtai_dewasa').val(data.id_list_tindakan);
								$('#total_sputumbtai_dewasa').val(data.total);
								$('#tanggal_sputumbtai_dewasa').val(data.tanggal);
								$('#id_staff_sputumbtai_dewasa').val(data.id_staff);
							}else if(data.nama == " Sputum B T A II"){
								// SPUTUMBTAII
								$("#inNamaSPUTUMBTAIIDEWASA").val(data.nama);
								$('#isiSPUTUMBTAIIDEWASA').collapse('toggle');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$("#id_tindakan_laborSPUTUMBTAII").val(data.id_tindakan_labor);
								$('#Harga_sputumbtaii_dewasa').val(data.harga);
		    					$("#Frek_sputumbtaii_dewasa").val(data.frek);
								$('#id_pelayanan_sputumbtaii_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_sputumbtaii_dewasa').val(data.id_list_tindakan);
								$('#total_sputumbtaii_dewasa').val(data.total);
								$('#tanggal_sputumbtaii_dewasa').val(data.tanggal);
								$('#id_staff_sputumbtaii_dewasa').val(data.id_staff);
							}else if(data.nama == " Sputum B T A III"){
								// SPUTUMBTAIII
								$("#inNamaSPUTUMBTAIIIDEWASA").val(data.nama);
								$('#isiSPUTUMBTAIIIDEWASA').collapse('toggle');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborSPUTUMBTAIIIDEWASA").val(data.id_tindakan_labor);
								$('#Harga_sputumbtaiii_dewasa').val(data.harga);
		    					$("#Frek_sputumbtaiii_dewasa").val(data.frek);
								$('#id_pelayanan_sputumbtaiii_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_sputumbtaiii_dewasa').val(data.id_list_tindakan);
								$('#total_sputumbtaiii_dewasa').val(data.total);
								$('#tanggal_sputumbtaiii_dewasa').val(data.tanggal);
								$('#id_staff_sputumbtaiii_dewasa').val(data.id_staff);
							}else if(data.nama == " PROTEIN "){
								// PROTEIN
								$("#inNamaPROTEINDEWASA").val(data.nama);
								$('#isiPROTEINDEWASA').collapse('toggle');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborPROTEINDEWASA").val(data.id_tindakan_labor);
								$('#Harga_protein_dewasa').val(data.harga);
		    					$("#Frek_protein_dewasa").val(data.frek);
								$('#id_pelayanan_protein_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_protein_dewasa').val(data.id_list_tindakan);
								$('#total_protein_dewasa').val(data.total);
								$('#tanggal_protein_dewasa').val(data.tanggal);
								$('#id_staff_protein_dewasa').val(data.id_staff);
							}else if(data.nama == " ALBUMIN "){
								// ALBUMIN
								$("#inNamaDEWASAALBUMIN").val(data.nama);
								$('#isiALBUMINDEWASA').collapse('toggle');
								$('.data_hide').addClass('collapse');
								$('#inTipeMasukALBUMIN').change(function() {
									var selector = '.data_hide_' + $(this).val();
									$('.data_hide').collapse('hide');
									$(selector).collapse('show');
								});
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborALBUMINDEWASA").val(data.id_tindakan_labor);
								$('#Harga_albumin_dewasa').val(data.harga);
		    					$("#Frek_albumin_dewasa").val(data.frek);
								$('#id_pelayanan_albumin_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_albumin_dewasa').val(data.id_list_tindakan);
								$('#total_albumin_dewasa').val(data.total);
								$('#tanggal_albumin_dewasa').val(data.tanggal);
								$('#id_staff_albumin_dewasa').val(data.id_staff);
							}else if(data.nama == "GLOBULIN"){
								// GLOBULIN
								$("#inNamaDEWASAGLOBULIN").val(data.nama);
								$('#isiGLOBULINDEWASA').collapse('toggle');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('.data_hide').addClass('collapse');
								$('#inTipeMasukGLOBULIN').change(function() {
									var selector = '.data_hide_' + $(this).val();
									$('.data_hide').collapse('hide');
									$(selector).collapse('show');
								});
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborGLOBULINDEWASA").val(data.id_tindakan_labor);
								$('#Harga_globulin_dewasa').val(data.harga);
		    					$("#Frek_globulin_dewasa").val(data.frek);
								$('#id_pelayanan_globulin_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_globulin_dewasa').val(data.id_list_tindakan);
								$('#total_globulin_dewasa').val(data.total);
								$('#tanggal_globulin_dewasa').val(data.tanggal);
								$('#id_staff_globulin_dewasa').val(data.id_staff);
							}else if(data.nama == " MALARIA "){
								// MALARIA
								$("#inNamaMALARIADEWASA").val(data.nama);
								$('#isiMALARIADEWASA').collapse('toggle');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborMALARIADEWASA").val(data.id_tindakan_labor);
								$('#Harga_malaria_dewasa').val(data.harga);
		    					$("#Frek_malaria_dewasa").val(data.frek);
								$('#id_pelayanan_malaria_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_malaria_dewasa').val(data.id_list_tindakan);
								$('#total_malaria_dewasa').val(data.total);
								$('#tanggal_malaria_dewasa').val(data.tanggal);
								$('#id_staff_malaria_dewasa').val(data.id_staff);
							}else if(data.nama == " WIDAL "){
								// WIDAL
								$("#inNamaWIDALDEWASA").val(data.nama);
								$('#isiWIDALDEWASA').collapse('toggle');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborWIDALDEWASA").val(data.id_tindakan_labor);
								$('#Harga_widal_dewasa').val(data.harga);
		    					$("#Frek_widal_dewasa").val(data.frek);
								$('#id_pelayanan_widal_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_widal_dewasa').val(data.id_list_tindakan);
								$('#total_widal_dewasa').val(data.total);
								$('#tanggal_widal_dewasa').val(data.tanggal);
								$('#id_staff_widal_dewasa').val(data.id_staff);
							}else if(data.nama == " TROPONIN "){
								// TROPONIN
								$("#inNamaTROPONINDEWASA").val(data.nama);
								$('#isiTROPONINDEWASA').collapse('toggle');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborTROPONINDEWASA").val(data.id_tindakan_labor);
								$('#Harga_troponin_dewasa').val(data.harga);
		    					$("#Frek_troponin_dewasa").val(data.frek);
								$('#id_pelayanan_troponin_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_troponin_dewasa').val(data.id_list_tindakan);
								$('#total_troponin_dewasa').val(data.total);
								$('#tanggal_troponin_dewasa').val(data.tanggal);
								$('#id_staff_troponin_dewasa').val(data.id_staff);
							}else if(data.nama == " NS 1 "){
								// NS1
								$("#inNamaNS1DEWASA").val(data.nama);
								$('#isiNS1DEWASA').collapse('toggle');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborNS1DEWASA").val(data.id_tindakan_labor);
								$('#Harga_ns1_dewasa').val(data.harga);
		    					$("#Frek_ns1_dewasa").val(data.frek);
								$('#id_pelayanan_ns1_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_ns1_dewasa').val(data.id_list_tindakan);
								$('#total_ns1_dewasa').val(data.total);
								$('#tanggal_ns1_dewasa').val(data.tanggal);
								$('#id_staff_ns1_dewasa').val(data.id_staff);
							}else if(data.nama == " HBSAG "){
								// HBSAG
								$("#inNamaHBSAGDEWASA").val(data.nama);
								$('#isiHBSAGDEWASA').collapse('toggle');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborHBSAGDEWASA").val(data.id_tindakan_labor);
								$('#Harga_hbsag_dewasa').val(data.harga);
		    					$("#Frek_hbsag_dewasa").val(data.frek);
								$('#id_pelayanan_hbsag_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_hbsag_dewasa').val(data.id_list_tindakan);
								$('#total_hbsag_dewasa').val(data.total);
								$('#tanggal_hbsag_dewasa').val(data.tanggal);
								$('#id_staff_hbsag_dewasa').val(data.id_staff);
							}else if(data.nama == " HBSAB "){
								// HBSAB
								$("#inNamaHBSABDEWASA").val(data.nama);
								$('#isiHBSABDEWASA').collapse('toggle');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborHBSABDEWASA").val(data.id_tindakan_labor);
								$('#Harga_hbsab_dewasa').val(data.harga);
		    					$("#Frek_hbsab_dewasa").val(data.frek);
								$('#id_pelayanan_hbsab_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_hbsab_dewasa').val(data.id_list_tindakan);
								$('#total_hbsab_dewasa').val(data.total);
								$('#tanggal_hbsab_dewasa').val(data.tanggal);
								$('#id_staff_hbsab_dewasa').val(data.id_staff);
							}else if(data.nama == "B20"){
								// B20
								$("#inNamaB20DEWASA").val(data.nama);
								$('#isiB20DEWASA').collapse('toggle');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborB20DEWASA").val(data.id_tindakan_labor);
								$('#Harga_b20_dewasa').val(data.harga);
		    					$("#Frek_b20_dewasa").val(data.frek);
								$('#id_pelayanan_b20_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_b20_dewasa').val(data.id_list_tindakan);
								$('#total_b20_dewasa').val(data.total);
								$('#tanggal_b20_dewasa').val(data.tanggal);
								$('#id_staff_b20_dewasa').val(data.id_staff);
							}else if(data.nama == " VDRL "){
								// VDRL
								$("#inNamaVDRLDEWASA").val(data.nama);
								$('#isiVDRLDEWASA').collapse('toggle');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborVDRLDEWASA").val(data.id_tindakan_labor);
								$('#Harga_VDRL_dewasa').val(data.harga);
		    					$("#Frek_VDRL_dewasa").val(data.frek);
								$('#id_pelayanan_VDRL_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_VDRL_dewasa').val(data.id_list_tindakan);
								$('#total_VDRL_dewasa').val(data.total);
								$('#tanggal_VDRL_dewasa').val(data.tanggal);
								$('#id_staff_VDRL_dewasa').val(data.id_staff);
							}else if(data.nama == " PLANOTES "){
								// PLANOTES
								$("#inNamaPLANODEWASA").val(data.nama);
								$('#isiPLANODEWASA').collapse('toggle');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborPLANODEWASA").val(data.id_tindakan_labor);
								$('#Harga_planotest_dewasa').val(data.harga);
		    					$("#Frek_planotest_dewasa").val(data.frek);
								$('#id_pelayanan_planotest_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_planotest_dewasa').val(data.id_list_tindakan);
								$('#total_planotest_dewasa').val(data.total);
								$('#tanggal_planotest_dewasa').val(data.tanggal);
								$('#id_staff_planotest_dewasa').val(data.id_staff);
							}else if(data.nama == "Darah Samar"){
								// DARAH SAMAR
								$("#inNamaSAMARDEWASA").val(data.nama);
								$('#isiSAMARDEWASA').collapse('toggle');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborSAMARDEWASA").val(data.id_tindakan_labor);
								$('#Harga_darah_samar_dewasa').val(data.harga);
		    					$("#Frek_darah_samar_dewasa").val(data.frek);
								$('#id_pelayanan_darah_samar_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_darah_samar_dewasa').val(data.id_list_tindakan);
								$('#total_darah_samar_dewasa').val(data.total);
								$('#tanggal_darah_samar_dewasa').val(data.tanggal);
								$('#id_staff_darah_samar_dewasa').val(data.id_staff);
							}else if(data.nama == " SALMONELLA "){
								// SALMONELLA
								$("#inNamaSALMONELLADEWASA").val(data.nama);
								$('#isiSALMONELLADEWASA').collapse('toggle');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborSALMONELLADEWASA").val(data.id_tindakan_labor);
								$('#Harga_salmonella_dewasa').val(data.harga);
		    					$("#Frek_salmonella_dewasa").val(data.frek);
								$('#id_pelayanan_salmonella_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_salmonella_dewasa').val(data.id_list_tindakan);
								$('#total_salmonella_dewasa').val(data.total);
								$('#tanggal_salmonella_dewasa').val(data.tanggal);
								$('#id_staff_salmonella_dewasa').val(data.id_staff);
							}else if(data.nama == "FT4"){
								// FT4
								$("#inNamaFT4DEWASA").val(data.nama);
								$('#isiFT4DEWASA').collapse('toggle');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborFT4DEWASA").val(data.id_tindakan_labor);
								$('#Harga_ft4_dewasa').val(data.harga);
		    					$("#Frek_ft4_dewasa").val(data.frek);
								$('#id_pelayanan_ft4_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_ft4_dewasa').val(data.id_list_tindakan);
								$('#total_ft4_dewasa').val(data.total);
								$('#tanggal_ft4_dewasa').val(data.tanggal);
								$('#id_staff_ft4_dewasa').val(data.id_staff);
							}else if(data.nama == "AGD"){
								// AGD
								$("#inNamaAGDDEWASA").val(data.nama);
								$('#isiAGDDEWASA').collapse('toggle');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborAGDDEWASA").val(data.id_tindakan_labor);
								$('#Harga_agd_dewasa').val(data.harga);
		    					$("#Frek_agd_dewasa").val(data.frek);
								$('#id_pelayanan_agd_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_agd_dewasa').val(data.id_list_tindakan);
								$('#total_agd_dewasa').val(data.total);
								$('#tanggal_agd_dewasa').val(data.tanggal);
								$('#id_staff_agd_dewasa').val(data.id_staff);
							}else if(data.nama == " URINE "){
								// URINE
								$("#inNamaURINEDEWASA").val(data.nama);
								$('#isiURINEDEWASA').collapse('toggle');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborURINEDEWASA").val(data.id_tindakan_labor);
								$('#Harga_urine_dewasa').val(data.harga);
		    					$("#Frek_urine_dewasa").val(data.frek);
								$('#id_pelayanan_urine_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_urine_dewasa').val(data.id_list_tindakan);
								$('#total_urine_dewasa').val(data.total);
								$('#tanggal_urine_dewasa').val(data.tanggal);
								$('#id_staff_urine_dewasa').val(data.id_staff);
							}else if(data.nama == "ANALISA SPERMA"){
								// ANALISA SPERMA
								$("#inNamaSPERMADEWASA").val(data.nama);
								$('#isiSPERMADEWASA').collapse('toggle');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborSPERMADEWASA").val(data.id_tindakan_labor);
								$('#Harga_sperma_dewasa').val(data.harga);
		    					$("#Frek_sperma_dewasa").val(data.frek);
								$('#id_pelayanan_sperma_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_sperma_dewasa').val(data.id_list_tindakan);
								$('#total_sperma_dewasa').val(data.total);
								$('#tanggal_sperma_dewasa').val(data.tanggal);
								$('#id_staff_sperma_dewasa').val(data.id_staff);
							}else if(data.nama == " FEACES "){
								// FEACES
								$("#inNamaFESESDEWASA").val(data.nama);
								$('#isiFESESDEWASA').collapse('toggle');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiFT4DEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiTRIGLYSERIDEDEWASA').collapse('hide');
								$('#isiURICDEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiCLTDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiBLTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborFESESDEWASA").val(data.id_tindakan_labor);
								$('#Harga_feses_dewasa').val(data.harga);
		    					$("#Frek_feses_dewasa").val(data.frek);
								$('#id_pelayanan_feses_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_feses_dewasa').val(data.id_list_tindakan);
								$('#total_feses_dewasa').val(data.total);
								$('#tanggal_feses_dewasa').val(data.tanggal);
								$('#id_staff_feses_dewasa').val(data.id_staff);
							}else if(data.nama == "PT"){
								// PT
								$("#inNamaPTDEWASA").val(data.nama);
								$('#isiPTDEWASA').collapse('toggle');
								$('#isiCRPDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborPTDEWASA").val(data.id_tindakan_labor);
								$('#Harga_pt_dewasa').val(data.harga);
		    					$("#Frek_pt_dewasa").val(data.frek);
								$('#id_pelayanan_pt_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_pt_dewasa').val(data.id_list_tindakan);
								$('#total_pt_dewasa').val(data.total);
								$('#tanggal_pt_dewasa').val(data.tanggal);
								$('#id_staff_pt_dewasa').val(data.id_staff);
							}else if(data.nama == "PT/APTT"){
								// PT/APTT
								$("#inNamaPTAPTTDEWASA").val(data.nama);
								$('#isiPTAPTTDEWASA').collapse('toggle');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiCRPDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiDENGUEDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborPTAPTTDEWASA").val(data.id_tindakan_labor);
								$('#Harga_ptaptt_dewasa').val(data.harga);
		    					$("#Frek_ptaptt_dewasa").val(data.frek);
								$('#id_pelayanan_ptaptt_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_ptaptt_dewasa').val(data.id_list_tindakan);
								$('#total_ptaptt_dewasa').val(data.total);
								$('#tanggal_ptaptt_dewasa').val(data.tanggal);
								$('#id_staff_ptaptt_dewasa').val(data.id_staff);	
							}else if(data.nama == "DENGUE"){
							// DENGUE
								$("#inNamaDENGUEDEWASA").val(data.nama);
								$('#isiDENGUEDEWASA').collapse('toggle');
								$('#isiPTAPTTDEWASA').collapse('hide');
								$('#isiPTDEWASA').collapse('hide');
								$('#isiCRPDEWASA').collapse('hide');
								$('#isiFESESDEWASA').collapse('hide');
								$('#isiSPERMADEWASA').collapse('hide');
								$('#isiURINEDEWASA').collapse('hide');
								$('#isiAGDDEWASA').collapse('hide');
								$('#isiSALMONELLADEWASA').collapse('hide');
								$('#isiSAMARDEWASA').collapse('hide');
								$('#isiPLANODEWASA').collapse('hide');
								$('#isiVDRLDEWASA').collapse('hide');
								$('#isiB20DEWASA').collapse('hide');
								$('#isiHBSABDEWASA').collapse('hide');
								$('#isiHBSAGDEWASA').collapse('hide');
								$('#isiNS1DEWASA').collapse('hide');
								$('#isiTROPONINDEWASA').collapse('hide');
								$('#isiWIDALDEWASA').collapse('hide');
								$('#isiMALARIADEWASA').collapse('hide');
								$('#isiGLOBULINDEWASA').collapse('hide');
								$('#isiALBUMINDEWASA').collapse('hide');
								$('#isiPROTEINDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIIDEWASA').collapse('hide');
								$('#isiSPUTUMBTAIDEWASA').collapse('hide');
								$('#isiELEKTROLITDEWASA').collapse('hide');
								$('#isiSGOTDEWASA').collapse('hide');
								$('#isiSGPTDEWASA').collapse('hide');
								$('#isiCREATININDEWASA').collapse('hide');
								$('#isiUREUMDEWASA').collapse('hide');
								$('#isiLDLDEWASA').collapse('hide');
								$('#isiHDLDEWASA').collapse('hide');
								$('#isiCHODEWASA').collapse('hide');
								$('#isiHBADEWASA').collapse('hide');
								$('#isiGULDARAHDEWASA').collapse('hide');
								$('#isiAPTTDEWASA').collapse('hide');
								$('#isiRHESUSDEWASA').collapse('hide');
								$('#isiLEDDEWASA').collapse('hide');
								$('#isiGOL-DARAHDEWASA').collapse('hide');
								$('#isiDARAHDEWASA').collapse('hide');
								$("#id_tindakan_laborDENGUEDEWASA").val(data.id_tindakan_labor);
								$('#Harga_dengue_dewasa').val(data.harga);
		    					$("#Frek_dengue_dewasa").val(data.frek);
								$('#id_pelayanan_dengue_dewasa').val(data.id_pelayanan);
								$('#id_list_tindakan_dengue_dewasa').val(data.id_list_tindakan);
								$('#total_dengue_dewasa').val(data.total);
								$('#tanggal_dengue_dewasa').val(data.tanggal);
								$('#id_staff_dengue_dewasa').val(data.id_staff);	
						}else{
							swal({   
								title: "DATA TIDAK DITEMUKAN",   
								text: "Silahkan periksa pilihan aksi Anda",
								type: "warning",   
								confirmButtonColor: "#3cb878",   
							});
						}
                    }
					// End
			    }
            });
        }
   </script>

            <script type="text/javascript">
			// KeyUP HB
			$('#inHBDEWASA').keyup(function() {
				$('#notifinHBDEWASA').html('');
				a = $('#inHBDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBDEWASA').html(html);
				}else if (a >= 11.3 && a <= 15.7) {
					html = '<b style="color:blue">HB NORMAL PRIA DEWASA</b>';
					$('#notifinHBDEWASA').html(html);
				}else if (a >= 9.3 && a <= 13.6) {
				html = '<b style="color:blue">HB NORMAL WANITA DEWASA</b>';
				$('#notifinHBDEWASA').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHBDEWASA').html(html);
				}
			});

			// KeyUP LEUKOSIT
			$('#inLEUKOSITDEWASA').keyup(function() {
				$('#notifinLEUKOSITDEWASA').html('');
				a = $('#inLEUKOSITDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITDEWASA').html(html);
				}else if (a >= 4000 && a <= 10000) {
					html = '<b style="color:blue">LEUKOSIT NORMAL</b>';
					$('#notifinLEUKOSITDEWASA').html(html);
				} else{
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSITDEWASA').html(html);
				}
			});

			// KeyUP TROMBOSIT
			$('#inTROMBOSITDEWASA').keyup(function() {
				$('#notifinTROMBOSITDEWASA').html('');
				a = $('#inTROMBOSITDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTROMBOSITDEWASA').html(html);
				}else if (a >= 150000 && a <= 400000) {
					html = '<b style="color:blue">TROMBOSIT NORMAL</b>';
					$('#notifinTROMBOSITDEWASA').html(html);
				} else{
					html = '<b style="color:red">TROMBOSIT TIDAK NORMAL</b>';
					$('#notifinTROMBOSITDEWASA').html(html);
				}
			});

			// KeyUP HEMATOKRIT				
			$('#inHEMATOKRITDEWASA').keyup(function() {
				$('#notifinHEMATOKRITDEWASA').html('');
				a = $('#inHEMATOKRITDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRITDEWASA').html(html);
				}else if (a >= 40 && a <= 52) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL PRIA DEWASA</b>';
					$('#notifinHEMATOKRITDEWASA').html(html);
				}else if (a >= 35 && a <= 47) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL WANITA DEWASA</b>';
					$('#notifinHEMATOKRITDEWASA').html(html);
				} else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRITDEWASA').html(html);
				}
			});

			// KeyUP ERITROSIT				
			$('#inERITROSITDEWASA').keyup(function() {
				$('#notifinERITROSITDEWASA').html('');
				a = $('#inERITROSITDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITDEWASA').html(html);
				}else if (a >= 4.5 && a <= 5.9) {
					html = '<b style="color:blue">ERITROSIT NORMAL PRIA DEWASA</b>';
					$('#notifinERITROSITDEWASA').html(html);
				}else if (a >= 4.1 && a <= 5.1) {
					html = '<b style="color:blue">ERITROSIT NORMAL WANITA DEWASA</b>';
					$('#notifinERITROSITDEWASA').html(html);
				} else{
					html = '<b style="color:red">ERITROSIT TIDAK NORMAL</b>';
					$('#notifinERITROSITDEWASA').html(html);
				}
			});

			// KeyUP BAS			
			$('#inBASDEWASA').keyup(function() {
				$('#notifinBASDEWASA').html('');
				a = $('#inBASDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBASDEWASA').html(html);
				}else if (a >= 0 && a <= 1) {
					html = '<b style="color:blue">BAS NORMAL</b>';
					$('#notifinBASDEWASA').html(html);
				} else{
					html = '<b style="color:red">BAS TIDAK NORMAL</b>';
					$('#notifinBASDEWASA').html(html);
				}
			});

			// KeyUP EOS			
			$('#inEOSDEWASA').keyup(function() {
				$('#notifinEOSDEWASA').html('');
				a = $('#inEOSDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinEOSDEWASA').html(html);
				}else if (a >= 2 && a <= 4) {
					html = '<b style="color:blue">EOS NORMAL</b>';
					$('#notifinEOSDEWASA').html(html);
				} else{
					html = '<b style="color:red">EOS TIDAK NORMAL</b>';
					$('#notifinEOSDEWASA').html(html);
				}
			});

			// KeyUP MONO		
			$('#inMONODEWASA').keyup(function() {
				$('#notifinMONODEWASA').html('');
				a = $('#inMONODEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMONODEWASA').html(html);
				}else if (a >= 2 && a <= 8) {
					html = '<b style="color:blue">MONO NORMAL</b>';
					$('#notifinMONODEWASA').html(html);
				} else{
					html = '<b style="color:red">MONO TIDAK NORMAL</b>';
					$('#notifinMONODEWASA').html(html);
				}
			});

			// KeyUP SEGMEN		
			$('#inSEGMENDEWASA').keyup(function() {
				$('#notifinSEGMENDEWASA').html('');
				a = $('#inSEGMENDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSEGMENDEWASA').html(html);
				}else if (a >= 50 && a <= 70) {
					html = '<b style="color:blue">SEGMEN NORMAL</b>';
					$('#notifinSEGMENDEWASA').html(html);
				} else{
					html = '<b style="color:red">SEGMEN TIDAK NORMAL</b>';
					$('#notifinSEGMENDEWASA').html(html);
				}
			});

			// KeyUP LYMPO		
			$('#inLYMPODEWASA').keyup(function() {
				$('#notifinLYMPODEWASA').html('');
				a = $('#inLYMPO').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLYMPODEWASA').html(html);
				}else if (a >= 25 && a <= 40) {
					html = '<b style="color:blue">LYMPO NORMAL</b>';
					$('#notifinLYMPODEWASA').html(html);
				} else{
					html = '<b style="color:red">LYMPO TIDAK NORMAL</b>';
					$('#notifinLYMPODEWASA').html(html);
				}
			});

			// KeyUP MCV	
			$('#inMCVDEWASA').keyup(function() {
				$('#notifinMCVDEWASA').html('');
				a = $('#inMCVDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCVDEWASA').html(html);
				}else if (a >= 80 && a <= 96) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCVDEWASA').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCVDEWASA').html(html);
				}
			});

			// KeyUP MCH	
			$('#inMCHDEWASA').keyup(function() {
				$('#notifinMCHDEWASA').html('');
				a = $('#inMCHDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHDEWASA').html(html);
				}else if (a >= 28 && a <= 33) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCHDEWASA').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCHDEWASA').html(html);
				}
			});

			// KeyUP MCHC
			$('#inMCHCDEWASA').keyup(function() {
				$('#notifinMCHCDEWASA').html('');
				a = $('#inMCHCDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHCDEWASA').html(html);
				}else if (a >= 33 && a <= 36) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHCDEWASA').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHCDEWASA').html(html);
				}
			});

			// KeyUP RDW-CV
			$('#inRDW-CVDEWASA').keyup(function() {
				$('#notifinRDW-CVDEWASA').html('');
				a = $('#inRDW-CV').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRDW-CVDEWASA').html(html);
				}else if (a >= 11.0 && a <= 16.0) {
					html = '<b style="color:blue">RDW-CV NORMAL</b>';
					$('#notifinRDW-CVDEWASA').html(html);
				} else{
					html = '<b style="color:red">RDW-CV TIDAK NORMAL</b>';
					$('#notifinRDW-CVDEWASA').html(html);
				}
			});

			// KeyUP RDW-SD
			$('#inRDW-SDDEWASA').keyup(function() {
				$('#notifinRDW-SDDEWASA').html('');
				a = $('#inRDW-SDDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRDW-SDDEWASA').html(html);
				}else if (a >= 35.0 && a <= 56.0) {
					html = '<b style="color:blue">RDW-SD NORMAL</b>';
					$('#notifinRDW-SDDEWASA').html(html);
				} else{
					html = '<b style="color:red">RDW-SD TIDAK NORMAL</b>';
					$('#notifinRDW-SDDEWASA').html(html);
				}
			});

			// KeyUP LED
			$('#inLEDDEWASA').keyup(function() {
				$('#notifinLEDDEWASA').html('');
				a = $('#inLEDDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEDDEWASA').html(html);
				}else if (a >= 0 && a <= 10) {
					html = '<b style="color:blue">LED NORMAL PRIA DEWASA</b>';
					$('#notifinLEDDEWASA').html(html);
				}else if (a >= 0 && a <= 15) {
					html = '<b style="color:blue">LED NORMAL WANITA DEWASA</b>';
					$('#notifinLEDDEWASA').html(html);
				} else{
					html = '<b style="color:red">LED TIDAK NORMAL</b>';
					$('#notifinLEDDEWASA').html(html);
				}
			});

			// Keyup PH
			$('#inPHDEWASA').keyup(function() {
				$('#notifinPHDEWASA').html('');
				a = $('#inPHDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPHDEWASA').html(html);
				}else if (a >= 7.35 && a <= 7.45) {
					html = '<b style="color:blue">NILAI PH NORMAL</b>';
					$('#notifinPHDEWASA').html(html);
				} else{
					html = '<b style="color:red">NILAI PH TIDAK NORMAL</b>';
					$('#notifinPHDEWASA').html(html);
				}
			});

			// Keyup PCO2
			$('#inPCO2DEWASA').keyup(function() {
				$('#notifinPCO2DEWASA').html('');
				a = $('#inPCO2DEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPCO2DEWASA').html(html);
				}else if (a >= 41 && a <= 51) {
					html = '<b style="color:blue">NILAI PCO2 NORMAL</b>';
					$('#notifinPCO2DEWASA').html(html);
				} else{
					html = '<b style="color:red">NILAI PCO2 TIDAK NORMAL</b>';
					$('#notifinPCO2DEWASA').html(html);
				}
			});

			// Keyup PO2
			$('#inPO2DEWASA').keyup(function() {
				$('#notifinPO2DEWASA').html('');
				a = $('#inPO2DEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPO2DEWASA').html(html);
				}else if (a >= 80 && a <= 100) {
					html = '<b style="color:blue">NILAI PO2 NORMAL</b>';
					$('#notifinPO2DEWASA').html(html);
				} else{
					html = '<b style="color:red">NILAI PO2 TIDAK NORMAL</b>';
					$('#notifinPO2DEWASA').html(html);
				}
			});

			// Keyup HCO3
			$('#inHCO3DEWASA').keyup(function() {
				$('#notifinHCO3DEWASA').html('');
				a = $('#inHCO3DEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHCO3DEWASA').html(html);
				}else if (a >= 24 && a <= 28) {
					html = '<b style="color:blue">NILAI HCO3 NORMAL</b>';
					$('#notifinHCO3DEWASA').html(html);
				} else{
					html = '<b style="color:red">NILAI HCO3 TIDAK NORMAL</b>';
					$('#notifinHCO3DEWASA').html(html);
				}
			});

			// Keyup BE
			$('#inBEDEWASA').keyup(function() {
				$('#notifinBEDEWASA').html('');
				a = $('#inBEDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBEDEWASA').html(html);
				}
			});

			// Keyup SO2
			$('#inSO2DEWASA').keyup(function() {
				$('#notifinSO2DEWASA').html('');
				a = $('#inSO2DEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSO2DEWASA').html(html);
				}else if (a >= 93 && a <= 99) {
					html = '<b style="color:blue">NILAI SO2 NORMAL</b>';
					$('#notifinSO2DEWASA').html(html);
				} else{
					html = '<b style="color:red">NILAI SO2 TIDAK NORMAL</b>';
					$('#notifinSO2DEWASA').html(html);
				}
			});

			// Keyup SUHU
			$('#inSUHUDEWASA').keyup(function() {
				$('#notifinSUHUDEWASA').html('');
				a = $('#inSUHUDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSUHUDEWASA').html(html);
				}else if (a >= 36.8 && a <= 37.8) {
					html = '<b style="color:blue">NILAI SUHU NORMAL</b>';
					$('#notifinSUHUDEWASA').html(html);
				} else{
					html = '<b style="color:red">NILAI SUHU TIDAK NORMAL</b>';
					$('#notifinSUHUDEWASA').html(html);
				}
			});

			// Keyup OKSIGEN
			$('#inOKSIGENDEWASA').keyup(function() {
				$('#notifinOKSIGENDEWASA').html('');
				a = $('#inOKSIGENDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinOKSIGENDEWASA').html(html);
				}else if (a == 12) {
					html = '<b style="color:blue">NILAI OKSIGEN NORMAL</b>';
					$('#notifinOKSIGENDEWASA').html(html);
				} else{
					html = '<b style="color:red">NILAI OKSIGEN TIDAK NORMAL</b>';
					$('#notifinOKSIGENDEWASA').html(html);
				}
			});

			// Keyup SATURASI
			$('#inSATURASIDEWASA').keyup(function() {
				$('#notifinSATURASIDEWASA').html('');
				a = $('#inSATURASIDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSATURASIDEWASA').html(html);
				}else if (a >= 90) {
					html = '<b style="color:blue">NILAI SATURASI NORMAL</b>';
					$('#notifinSATURASIDEWASA').html(html);
				} else{
					html = '<b style="color:red">NILAI SATURASI TIDAK NORMAL</b>';
					$('#notifinSATURASIDEWASA').html(html);
				}
			});
			
			// KeyUP RHESUS DEWASA
			$('#inRHESUSDEWASA').keyup(function() {
				$('#notifinRHESUSDEWASA').html('');
				a = $('#inRHESUSDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRHESUSDEWASA').html(html);
				}
			});

			// KeyUP GOL-DARAH DEWASA
			$('#inGOLDARAHDEWASA').keyup(function() {
				$('#notifinGOLDARAHDEWASA').html('');
				a = $('#inGOLDARAHDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinGOLDARAHDEWASA').html(html);
				}
			});


			// KeyUP BLT DEWASA
			$('#inBLTDEWASA').keyup(function() {
				$('#notifinBLTDEWASA').html('');
				a = $('#inBLTDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBLTDEWASA').html(html);
				}else if( a >= 1 && a <= 6){
					html = '<b style="color:blue">BLT NORMAL</b>';
					$('#notifinBLTDEWASA').html(html);
				}else{
					html = '<b style="color:red">BLT TIDAK NORMAL</b>';
					$('#notifinBLTDEWASA').html(html);
				}
			});

			// KeyUP CLT DEWASA
			$('#inCLTDEWASA').keyup(function() {
				$('#notifinCLTDEWASA').html('');
				a = $('#inCLTDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCLT').html(html);
				}else if( a >= 2 && a <= 6){
					html = '<b style="color:blue">CLT NORMAL</b>';
					$('#notifinCLTDEWASA').html(html);
				}else{
					html = '<b style="color:red">CLT TIDAK NORMAL</b>';
					$('#notifinCLTDEWASA').html(html);
				}
			});

			// KeyUP APTT
			$('#inAPTTDEWASA').keyup(function() {
				$('#notifinAPTTDEWASA').html('');
				a = $('#inAPTTDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinAPTTDEWASA').html(html);
				}else if( a >= 25 && a <= 40){
					html = '<b style="color:blue">APTT NORMAL</b>';
					$('#notifinAPTTDEWASA').html(html);
				}else{
					html = '<b style="color:red">APTT TIDAK NORMAL</b>';
					$('#notifinAPTTDEWASA').html(html);
				}
			});

			// KeyUP PUASA
			$('#inPUASADEWASA').keyup(function() {
				$('#notifinPUASADEWASA').html('');
				a = $('#inPUASADEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPUASADEWASA').html(html);
				}else if( a >= 76 && a <= 110){
					html = '<b style="color:blue">PUASA NORMAL</b>';
					$('#notifinPUASADEWASA').html(html);
				}else{
					html = '<b style="color:red">PUASA TIDAK NORMAL</b>';
					$('#notifinPUASADEWASA').html(html);
				}
			});

			// KeyUP 2 JAM PP
			$('#in2JAMPPDEWASA').keyup(function() {
				$('#notifin2JAMPPDEWASA').html('');
				a = $('#in2JAMPPDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifin2JAMPPDEWASA').html(html);
				}else if( a <= 150){
					html = '<b style="color:blue">2 JAM PP NORMAL</b>';
					$('#notifin2JAMPPDEWASA').html(html);
				}else{
					html = '<b style="color:red">2 JAM PP TIDAK NORMAL</b>';
					$('#notifin2JAMPPDEWASA').html(html);
				}
			});

			// KeyUP SEWAKTU
			$('#inSEWAKTUDEWASA').keyup(function() {
				$('#notifinSEWAKTUDEWASA').html('');
				a = $('#inSEWAKTUDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSEWAKTUDEWASA').html(html);
				}else if( a >= 110 && a <= 150){
					html = '<b style="color:blue">SEWAKTU NORMAL</b>';
					$('#notifinSEWAKTUDEWASA').html(html);
				}else{
					html = '<b style="color:red">SEWAKTU TIDAK NORMAL</b>';
					$('#notifinSEWAKTUDEWASA').html(html);
				}
			});

			// KeyUP HBA
			$('#inHBADEWASA').keyup(function() {
				$('#notifinHBADEWASA').html('');
				a = $('#inHBADEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBADEWASA').html(html);
				}else if( a >= 4 && a <= 5.6){
					html = '<b style="color:blue">HBA1C NORMAL</b>';
					$('#notifinHBADEWASA').html(html);
				}else{
					html = '<b style="color:red">HBA1C TIDAK NORMAL</b>';
					$('#notifinHBADEWASA').html(html);
				}
			});

			// KeyUP URIC
			$('#inURICDEWASA').keyup(function() {
				$('#notifinURICDEWASA').html('');
				a = $('#inURIC').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinURICDEWASA').html(html);
				}else if( a >= 2.6 && a <= 6.0){
					html = '<b style="color:blue">URIC ACID NORMAL WANITA</b>';
					$('#notifinURICDEWASA').html(html);
				}else if( a >= 3.4 && a <= 7.2){
					html = '<b style="color:blue">URIC ACID NORMAL PRIA</b>';
					$('#notifinURICDEWASA').html(html);
				}else{
					html = '<b style="color:red">URIC ACID TIDAK NORMAL</b>';
					$('#notifinURICDEWASA').html(html);
				}
			});
			
			// KeyUP TRIGLYSERIDE
			$('#inTRIGLYSERIDEDEWASA').keyup(function() {
				$('#notifinTRIGLYSERIDEDEWASA').html('');
				a = $('#inTRIGLYSERIDEDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTRIGLYSERIDEDEWASA').html(html);
				}else if( a >= 60 && a <= 150){
					html = '<b style="color:blue">TRIGLISERIDA NORMAL</b>';
					$('#notifinTRIGLYSERIDEDEWASA').html(html);
				}else{
					html = '<b style="color:red">TRIGLISERIDA TIDAK NORMAL</b>';
					$('#notifinTRIGLYSERIDEDEWASA').html(html);
				}
			});

			// KeyUP CHO
			$('#inCHODEWASA').keyup(function() {
				$('#notifinCHODEWASA').html('');
				a = $('#inCHODEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCHODEWASA').html(html);
				}else if( a >= 120 && a <= 200){
					html = '<b style="color:blue">CHO NORMAL</b>';
					$('#notifinCHODEWASA').html(html);
				}else{
					html = '<b style="color:red">CHO TIDAK NORMAL</b>';
					$('#notifinCHODEWASA').html(html);
				}
			});

			// KeyUP HDL
			$('#inHDLDEWASA').keyup(function() {
				$('#notifinHDLDEWASA').html('');
				a = $('#inHDLDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHDLDEWASA').html(html);
				}else if( a >= 35 && a <= 60){
					html = '<b style="color:blue">HDL NORMAL</b>';
					$('#notifinHDLDEWASA').html(html);
				}else{
					html = '<b style="color:red">HDL TIDAK NORMAL</b>';
					$('#notifinHDLDEWASA').html(html);
				}
			});

			// KeyUP LDL
			$('#inLDLDEWASA').keyup(function() {
				$('#notifinLDLDEWASA').html('');
				a = $('#inLDLDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLDLDEWASA').html(html);
				}else if( a < 150){
					html = '<b style="color:blue">LDL NORMAL</b>';
					$('#notifinLDLDEWASA').html(html);
				}else{
					html = '<b style="color:red">LDL TIDAK NORMAL</b>';
					$('#notifinLDLDEWASA').html(html);
				}
			});

			// KeyUP UREUM
			$('#inUREUMDEWASA').keyup(function() {
				$('#notifinUREUMDEWASA').html('');
				a = $('#inUREUMDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinUREUMDEWASA').html(html);
				}else if( a >= 10 && a <= 50){
					html = '<b style="color:blue">UREUM NORMAL</b>';
					$('#notifinUREUMDEWASA').html(html);
				}else{
					html = '<b style="color:red">UREUM TIDAK NORMAL</b>';
					$('#notifinUREUMDEWASA').html(html);
				}
			});

			// KeyUP CREATININ
			$('#inCREATININDEWASA').keyup(function() {
				$('#notifinCREATININDEWASA').html('');
				a = $('#inCREATININDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCREATININDEWASA').html(html);
				}else if (a >= 0.6 && a <= 1.1) {
					html = '<b style="color:blue">CREATININ NORMAL PRIA DEWASA</b>';
					$('#notifinCREATININDEWASA').html(html);
				}else if (a >= 0.5 && a <= 1.5) {
					html = '<b style="color:blue">CREATININ NORMAL WANITA DEWASA</b>';
					$('#notifinCREATININDEWASA').html(html);
				} else{
					html = '<b style="color:red">CREATININ TIDAK NORMAL</b>';
					$('#notifinCREATININDEWASA').html(html);
				}
			});
			
			// KeyUP SGOT
			$('#inSGOTDEWASA').keyup(function() {
				$('#notifinSGOTDEWASA').html('');
				a = $('#inSGOTDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGOTDEWASA').html(html);
				}else if( a >= 13 && a <= 35){
					html = '<b style="color:blue">SGOT NORMAL WANITA</b>';
					$('#notifinSGOTDEWASA').html(html);
				}else if( a >= 15 && a <= 40){
					html = '<b style="color:blue">SGOT NORMAL PRIA</b>';
					$('#notifinSGOTDEWASA').html(html);
				}else{
					html = '<b style="color:red">SGOT TIDAK NORMAL</b>';
					$('#notifinSGOTDEWASA').html(html);
				}
			});

			// KeyUP SGPT
			$('#inSGPT1260DEWASA').keyup(function() {
				$('#notifinSGPT1260DEWASA').html('');
				a = $('#inSGPT1260DEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGPT1260DEWASA').html(html);
				}else if( a >= 7 && a <= 35){
					html = '<b style="color:blue">NORMAL WANITA</b>';
					$('#notifinSGPT1260DEWASA').html(html);
				}else if( a >= 10 && a <= 40){
					html = '<b style="color:blue">NORMAL PRIA</b>';
					$('#notifinSGPT1260DEWASA').html(html);
				}else{
					html = '<b style="color:red">SGPT TIDAK NORMAL</b>';
					$('#notifinSGPT1260DEWASA').html(html);
				}
			});

			$('#inSGPT6090DEWASA').keyup(function() {
				$('#notifinSGPT6090DEWASA').html('');
				a = $('#inSGPT6090DEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGPT6090DEWASA').html(html);
				}else if( a >= 10 && a <= 28){
					html = '<b style="color:blue">NORMAL WANITA</b>';
					$('#notifinSGPT6090DEWASA').html(html);
				}else if( a >= 13 && a <= 40){
					html = '<b style="color:blue">NORMAL PRIA</b>';
					$('#notifinSGPT6090DEWASA').html(html);
				}else{
					html = '<b style="color:red">SGPT TIDAK NORMAL</b>';
					$('#notifinSGPT6090DEWASA').html(html);
				}
			});
			// End

			// KeyUP NA
			$('#inNADEWASA').keyup(function() {
				$('#notifinNADEWASA').html('');
				a = $('#inNADEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNADEWASA').html(html);
				}else if( a >= 128 && a <= 138){
					html = '<b style="color:blue">NA NORMAL</b>';
					$('#notifinNADEWASA').html(html);
				}else{
					html = '<b style="color:red">NA TIDAK NORMAL</b>';
					$('#notifinNADEWASA').html(html);
				}
			});

			//KeyUp K
			$('#inKDEWASA').keyup(function() {
				$('#notifinKDEWASA').html('');
				a = $('#inKDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKDEWASA').html(html);
				}else if( a >= 3.9 && a <= 4.9){
					html = '<b style="color:blue">K NORMAL</b>';
					$('#notifinKDEWASA').html(html);
				}else{
					html = '<b style="color:red">K TIDAK NORMAL</b>';
					$('#notifinKDEWASA').html(html);
				}
			});

			$('#inCLDEWASA').keyup(function() {
				$('#notifinCLDEWASA').html('');
				a = $('#inCLDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCLDEWASA').html(html);
				}else if( a >= 88 && a <= 100){
					html = '<b style="color:blue">CL NORMAL</b>';
					$('#notifinCLDEWASA').html(html);
				}else{
					html = '<b style="color:red">CL TIDAK NORMAL</b>';
					$('#notifinCLDEWASA').html(html);
				}
			});

			//Ca
			$('#inCaDEWASA').keyup(function() {
				$('#notifinCaDEWASA').html('');
				a = $('#inCaDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCaDEWASA').html(html);
				}else if( a >= 0.99 && a <= 1.29){
					html = '<b style="color:blue">Ca NORMAL</b>';
					$('#notifinCaDEWASA').html(html);
				}else{
					html = '<b style="color:red">Ca TIDAK NORMAL</b>';
					$('#notifinCaDEWASA').html(html);
				}
			});
			// End

			// keyUp PROTEIN 
			$('#inPROTEINDEWASA').keyup(function() {
				$('#notifinPROTEINDEWASA').html('');
				a = $('#inPROTEINDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEINDEWASA').html(html);
				}else if( a >= 6.4 && a <= 8.3){
					html = '<b style="color:blue">PROTEIN NORMAL</b>';
					$('#notifinPROTEINDEWASA').html(html);
				}else{
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEINDEWASA').html(html);
				}
			});
			// End

			// keyUp ALBUMIN1860DEWASA
			$('#inALBUMIN1860DEWASA').keyup(function() {
				$('#notifinALBUMIN1860DEWASA').html('');
				a = $('#inALBUMIN1860DEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinALBUMIN1860DEWASA').html(html);
				}else if( a >= 3.4 && a <= 4.8){
					html = '<b style="color:blue">ALBUMIN  NORMAL</b>';
					$('#notifinALBUMIN1860DEWASA').html(html);
				}else{
					html = '<b style="color:red">ALBUMIN TIDAK NORMAL</b>';
					$('#notifinALBUMIN1860DEWASA').html(html);
				}
			});
			// End

			// keyUp ALBUMIN6090DEWASA
			$('#inALBUMIN6090DEWASA').keyup(function() {
				$('#notifinALBUMIN6090DEWASA').html('');
				a = $('#inALBUMIN6090DEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinALBUMIN6090DEWASA').html(html);
				}else if( a >= 3.2 && a <= 4.6){
					html = '<b style="color:blue">ALBUMIN  NORMAL</b>';
					$('#notifinALBUMIN6090DEWASA').html(html);
				}else{
					html = '<b style="color:red">ALBUMIN TIDAK NORMAL</b>';
					$('#notifinALBUMIN6090DEWASA').html(html);
				}
			});
			// End


	 //////////////////// GLOBULIN

			// keyUp ALBUMIN6090DEWASA
			$('#inALBUMIN6090GLOBULINDEWASA').keyup(function() {
				$('#notifinALBUMINGLOBULIN6090DEWASA').html('');
				a = $('#inALBUMINGLOBULIN6090DEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinALBUMIN6090GLOBULINDEWASA').html(html);
				}else if( a >= 3.2 && a <= 4.6){
					html = '<b style="color:blue">ALBUMIN  NORMAL</b>';
					$('#notifinALBUMIN6090GLOBULINDEWASA').html(html);
				}else{
					html = '<b style="color:red">ALBUMIN TIDAK NORMAL</b>';
					$('#notifinALBUMIN6090GLOBULINDEWASA').html(html);
				}
			});
			// End

			// keyUp ALBUMIN1860DEWASA
			$('#inALBUMIN1860GLOBULINDEWASA').keyup(function() {
				$('#notifinALBUMIN1860GLOBULINDEWASA').html('');
				a = $('#inALBUMIN1860GLOBULINDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinALBUMIN1860GLOBULINDEWASA').html(html);
				}else if( a >= 3.4 && a <= 4.8){
					html = '<b style="color:blue"> ALBUMIN  NORMAL</b>';
					$('#notifinALBUMIN1860GLOBULINDEWASA').html(html);
				}else{
					html = '<b style="color:red">ALBUMIN TIDAK NORMAL</b>';
					$('#notifinALBUMIN1860GLOBULINDEWASA').html(html);
				}
			});
			// End

			// keyUp PROTEIN 
			$('#inPROTEINGLOBULINDEWASA').keyup(function() {
				$('#notifinPROTEINGLOBULINDEWASA').html('');
				a = $('#inPROTEINGLOBULINDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEINGLOBULINDEWASA').html(html);
				}else if( a >= 6.4 && a <= 8.3){
					html = '<b style="color:blue">PROTEIN NORMAL</b>';
					$('#notifinPROTEINGLOBULINDEWASA').html(html);
				}else{
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEINGLOBULINDEWASA').html(html);
				}
			});
			// End

			// keyUp MALARIA
			$('#inMALARIADEWASA').keyup(function() {
				$('#notifinMALARIADEWASA').html('');
				a = $('#inMALARIADEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMALARIADEWASA').html(html);
				}
			});
			// End

			// keyUp WIDAL
			$('#inWIDALDEWASA').keyup(function() {
				$('#notifinWIDALDEWASA').html('');
				a = $('#inWIDALDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinWIDALDEWASA').html(html);
				}
			});
			// End

			// keyUp TROPONIN
			$('#inTROPONINDEWASA').keyup(function() {
				$('#notifinTROPONINDEWASA').html('');
				a = $('#inTROPONINDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTROPONINDEWASA').html(html);
				}
			});
			// End
			
			// keyUp NS1
			$('#inNS1DEWASA').keyup(function() {
				$('#notifinNS1DEWASA').html('');
				a = $('#inNS1DEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNS1DEWASA').html(html);
				}
			});
			// End

			// keyUp HBSAG
			$('#inHBSAGDEWASA').keyup(function() {
				$('#notifinHBSAGDEWASA').html('');
				a = $('#inHBSAGDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBSAGDEWASA').html(html);
				}
			});
			// End
			
			// keyUp HBSAB
			$('#inHBSABDEWASA').keyup(function() {
				$('#notifinHBSABDEWASA').html('');
				a = $('#inHBSABDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBSABDEWASA').html(html);
				}
			});
			// End

			// keyUp B20
			$('#inB20DEWASA').keyup(function() {
				$('#notifinB20DEWASA').html('');
				a = $('#inB20DEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinB20DEWASA').html(html);
				}
			});
			// End

			// keyUp VDRL
			$('#inVDRLDEWASA').keyup(function() {
				$('#notifinVDRLDEWASA').html('');
				a = $('#inVDRLDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinVDRLDEWASA').html(html);
				}
			});
			// End

			// keyUp PLANO
			$('#inPLANODEWASA').keyup(function() {
				$('#notifinPLANODEWASA').html('');
				a = $('#inPLANODEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPLANODEWASA').html(html);
				}
			});
			// End

			// keyUp SAMAR
			$('#inSAMARDEWASA').keyup(function() {
				$('#notifinSAMARDEWASA').html('');
				a = $('#inSAMARDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSAMARDEWASA').html(html);
				}
			});
			// End

			// keyUp SALMONELLA
			$('#inSALMONELLADEWASA').keyup(function() {
				$('#notifinSALMONELLADEWASA').html('');
				a = $('#inSALMONELLADEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSALMONELLADEWASA').html(html);
				}
			});
			// End

			// keyUp DENGUE
			$('#inDENGUEDEWASA').keyup(function() {
				$('#notifinDENGUEDEWASA').html('');
				a = $('#inDENGUEDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinDENGUEDEWASA').html(html);
				}
			});
			// End

			// keyUp FT4
			$('#inFT4DEWASA').keyup(function() {
				$('#notifinFT4DEWASA').html('');
				a = $('#inFT4DEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinFT4DEWASA').html(html);
				}else if( a >= 9 && a <= 20){
					html = '<b style="color:blue">FT4 NORMAL</b>';
					$('#notifinFT4DEWASA').html(html);
				}else{
					html = '<b style="color:red">FT4 TIDAK NORMAL</b>';
					$('#notifinFT4DEWASA').html(html);
				}
			});
			// End

			// keyUp WARNA
			$('#inWARNADEWASA').keyup(function() {
				$('#notifinWARNADEWASA').html('');
				a = $('#inWARNADEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinWARNADEWASA').html(html);
				}
			});
			// End

			// keyUp KEJERNIHAN
			$('#inKEJERNIHANDEWASA').keyup(function() {
				$('#notifinKEJERNIHANDEWASA').html('');
				a = $('#inKEJERNIHANDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKEJERNIHANDEWASA').html(html);
				}
			});
			// End

			// keyUp ERITROSIT
			$('#inERITROSITURINEDEWASA').keyup(function() {
				$('#notifinERITROSITURINEDEWASA').html('');
				a = $('#inERITROSITURINEDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITURINEDEWASA').html(html);
				}else if( a <= 1){
					html = '<b style="color:blue">ERITROSIT NORMAL</b>';
					$('#notifinERITROSITURINEDEWASA').html(html);
				}else{
					html = '<b style="color:red">ERITROSIT TIDAK NORMAL</b>';
					$('#notifinERITROSITURINEDEWASA').html(html);
				}
			});
			// End

			// keyUp LEUKOSIT
			$('#inLEUKOSITURINEDEWASA').keyup(function() {
				$('#notifinLEUKOSITURINEDEWASA').html('');
				a = $('#inLEUKOSITURINEDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITURINEDEWASA').html(html);
				}else if( a <= 6){
					html = '<b style="color:blue">LEUKOSIT NORMAL</b>';
					$('#notifinLEUKOSITURINEDEWASA').html(html);
				}else{
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSITURINEDEWASA').html(html);
				}
			});
			// End

			// keyUp SEL EPITEL
			$('#inSELDEWASA').keyup(function() {
				$('#notifinSELDEWASA').html('');
				a = $('#inSELDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSELDEWASA').html(html);
				}
			});
			// End

			// keyUp SILINDER
			$('#inSILINDERDEWASA').keyup(function() {
				$('#notifinSILINDERDEWASA').html('');
				a = $('#inSILINDERDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSILINDERDEWASA').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">SILINDER NORMAL</b>';
					$('#notifinSILINDERDEWASA').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:blue">SILINDER TIDAK NORMAL</b>';
					$('#notifinSILINDERDEWASA').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinSILINDERDEWASA').html(html);
				}
			});
			// End

			// keyUp KRISTAL
			$('#inKRISTALDEWASA').keyup(function() {
				$('#notifinKRISTALDEWASA').html('');
				a = $('#inKRISTALDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKRISTALDEWASA').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">KRISTAL NORMAL</b>';
					$('#notifinKRISTALDEWASA').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">KRISTAL TIDAK NORMAL</b>';
					$('#notifinKRISTALDEWASA').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinKRISTALDEWASA').html(html);
				}
			});
			// End

			// keyUp BAKTERI
			$('#inBAKTERIDEWASA').keyup(function() {
				$('#notifinBAKTERIDEWASA').html('');
				a = $('#inBAKTERIDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAKTERIDEWASA').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">BAKTERI NORMAL</b>';
					$('#notifinBAKTERIDEWASA').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">BAKTERI TIDAK NORMAL</b>';
					$('#notifinBAKTERIDEWASA').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinBAKTERIDEWASA').html(html);
				}
			});
			// End

			// keyUp JAMUR
			$('#inJAMURDEWASA').keyup(function() {
				$('#notifinJAMURDEWASA').html('');
				a = $('#inJAMURDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinJAMURDEWASA').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">JAMUR NORMAL</b>';
					$('#notifinJAMURDEWASA').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">JAMUR TIDAK NORMAL</b>';
					$('#notifinJAMURDEWASA').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinJAMURDEWASA').html(html);
				}
			});
			// End

			// keyUp ERIROSITKIMIA
			$('#inERITROSITKIMIADEWASA').keyup(function() {
				$('#notifinERITROSITKIMIADEWASA').html('');
				a = $('#inERITROSITKIMIADEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITKIMIADEWASA').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">ERITROSIT NORMAL</b>';
					$('#notifinERITROSITKIMIADEWASA').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">ERITROSIT TIDAK NORMAL</b>';
					$('#notifinERITROSITKIMIADEWASA').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinERITROSITKIMIADEWASA').html(html);
				}
			});
			// End

			// keyUp GLUKOSA
			$('#inGLUKOSADEWASA').keyup(function() {
				$('#notifinGLUKOSADEWASA').html('');
				a = $('#inGLUKOSADEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinGLUKOSADEWASA').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">GLUKOSA NORMAL</b>';
					$('#notifinGLUKOSADEWASA').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">GLUKOSA TIDAK NORMAL</b>';
					$('#notifinGLUKOSADEWASA').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinGLUKOSADEWASA').html(html);
				}
			});
			// End

			// keyUp PROTEINKIMIA
			$('#inPROTEINKIMIADEWASA').keyup(function() {
				$('#notifinPROTEINKIMIADEWASA').html('');
				a = $('#inPROTEINKIMIADEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEINKIMIADEWASA').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">PROTEIN NORMAL</b>';
					$('#notifinPROTEINKIMIADEWASA').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEINKIMIADEWASA').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinPROTEINKIMIADEWASA').html(html);
				}
			});
			// End

			// keyUp BILIRUBIN
			$('#inBILIRUBINDEWASA').keyup(function() {
				$('#notifinBILIRUBINDEWASA').html('');
				a = $('#inBILIRUBINDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBILIRUBINDEWASA').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">BILIRUBIN NORMAL</b>';
					$('#notifinBILIRUBINDEWASA').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">BILIRUBIN TIDAK NORMAL</b>';
					$('#notifinBILIRUBINDEWASA').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinBILIRUBINDEWASA').html(html);
				}
			});
			// End

			// keyUp PH
			$('#inPHKIMIADEWASA').keyup(function() {
				$('#notifinPHKIMIADEWASA').html('');
				a = $('#inPHKIMIADEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPHKIMIADEWASA').html(html);
				}else if( a >= 2 && a <= 8){
					html = '<b style="color:blue">PH NORMAL</b>';
					$('#notifinPHKIMIADEWASA').html(html);
				}else{
					html = '<b style="color:red">PH TIDAK NORMAL</b>';
					$('#notifinPHKIMIADEWASA').html(html);
				}
			});
			// End

			// keyUp BERAT
			$('#inBERATDEWASA').keyup(function() {
				$('#notifinBERATDEWASA').html('');
				a = $('#inBERATDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBERATDEWASA').html(html);
				}else if( a >= 1003 && a <= 1029){
					html = '<b style="color:blue">BERAT JENIS NORMAL</b>';
					$('#notifinBERATDEWASA').html(html);
				}else{
					html = '<b style="color:red">BERAT JENIS TIDAK NORMAL</b>';
					$('#notifinBERATDEWASA').html(html);
				}
			});
			// End

			// keyUp KETON
			$('#inKETONDEWASA').keyup(function() {
				$('#notifinKETONDEWASA').html('');
				a = $('#inKETONDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKETONDEWASA').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">KETON NORMAL</b>';
					$('#notifinKETONDEWASA').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">KETON TIDAK NORMAL</b>';
					$('#notifinKETONDEWASA').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinKETONDEWASA').html(html);
				}
			});
			// End

			// keyUp NITRIT
			$('#inNITRITDEWASA').keyup(function() {
				$('#notifinNITRITDEWASA').html('');
				a = $('#inNITRITDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNITRITDEWASA').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">NITRIT NORMAL</b>';
					$('#notifinNITRITDEWASA').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">NITRIT TIDAK NORMAL</b>';
					$('#notifinNITRITDEWASA').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinNITRITDEWASA').html(html);
				}
			});
			// End

			// keyUp LEUKOSITKIMIA
			$('#inLEUKOSITKIMIADEWASA').keyup(function() {
				$('#notifinLEUKOSITKIMIADEWASA').html('');
				a = $('#inLEUKOSITKIMIADEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITKIMIADEWASA').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">LEUKOSITNORMAL</b>';
					$('#notifinLEUKOSITKIMIADEWASA').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSITKIMIADEWASA').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinLEUKOSITKIMIADEWASA').html(html);
				}
			});
			// End

			// keyUp UROBILINOGEN
			$('#inUROBILINOGENDEWASA').keyup(function() {
				$('#notifinUROBILINOGENDEWASA').html('');
				a = $('#inUROBILINOGENDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinUROBILINOGENDEWASA').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">UROBILINOGEN NORMAL</b>';
					$('#notifinUROBILINOGENDEWASA').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">UROBILINOGEN TIDAK NORMAL</b>';
					$('#notifinUROBILINOGENDEWASA').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinUROBILINOGENDEWASA').html(html);
				}
			});
			// End
			
			// keyUp ANALISA SPERMA
			$('#inSPERMADEWASA').keyup(function() {
				$('#notifinSPERMADEWASA').html('');
				a = $('#inSPERMADEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSPERMADEWASA').html(html);
				}
			});
			// End

			// keyUp DARAH FESES
			$('#inDARAHFESESDEWASA').keyup(function() {
				$('#notifinDARAHFESESDEWASA').html('');
				a = $('#inDARAHFESESDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinDARAHFESESDEWASA').html(html);
				}
			});
			// End

			// keyUp LENDIR
			$('#inLENDIRDEWASA').keyup(function() {
				$('#notifinLENDIRDEWASA').html('');
				a = $('#inLENDIRDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLENDIRDEWASA').html(html);
				}
			});
			// End

			// keyUp BAU
			$('#inBAUDEWASA').keyup(function() {
				$('#notifinBAUDEWASA').html('');
				a = $('#inBAUDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAUDEWASA').html(html);
				}
			});
			// End
			
			// keyUp KONSISTENSI
			$('#inKONSISTENSIDEWASA').keyup(function() {
				$('#notifinKONSISTENSIDEWASA').html('');
				a = $('#inKONSISTENSIDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKONSISTENSIDEWASA').html(html);
				}
			});
			// End
			
			// keyUp WARNA FESES
			$('#inWARNAFESESDEWASA').keyup(function() {
				$('#notifinWARNAFESESDEWASA').html('');
				a = $('#inWARNAFESESDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinWARNAFESESDEWASA').html(html);
				}
			});
			// End

			// keyUp PARASIT
			$('#inPARASITDEWASA').keyup(function() {
				$('#notifinPARASITDEWASA').html('');
				a = $('#inPARASITDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPARASITDEWASA').html(html);
				}
			});
			// End

			// keyUp LEUKOSIT FESES
			$('#inLEUKOSITFESESDEWASA').keyup(function() {
				$('#notifinLEUKOSITFESESDEWASA').html('');
				a = $('#inLEUKOSITFESESDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITFESESDEWASA').html(html);
				}
			});
			// End

			// keyUp ERITROSIT FESES
			$('#inERITROSITFESESDEWASA').keyup(function() {
				$('#notifinERITROSITFESESDEWASA').html('');
				a = $('#inERITROSITFESESDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITFESESDEWASA').html(html);
				}
			});
			// End

			// keyUp SEL EPITEL
			$('#inSELFESESDEWASA').keyup(function() {
				$('#notifinSELFESESDEWASA').html('');
				a = $('#inSELFESESDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSELFESESDEWASA').html(html);
				}
			});
			// End

			// keyUp SILIDER
			$('#inSILIDERDEWASA').keyup(function() {
				$('#notifinSILIDERDEWASA').html('');
				a = $('#inSILIDERDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSILIDERDEWASA').html(html);
				}
			});
			// End

			// keyUp TELUR CACING
			$('#inTELURDEWASA').keyup(function() {
				$('#notifinTELURDEWASA').html('');
				a = $('#inTELURDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTELURDEWASA').html(html);
				}
			});
			// End

			// keyUp AMOEBA
			$('#inAMOEBADEWASA').keyup(function() {
				$('#notifinAMOEBADEWASA').html('');
				a = $('#inAMOEBADEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinAMOEBADEWASA').html(html);
				}
			});
			// End

			// keyUp BAKTERI FESES
			$('#inBAKTERIFESESDEWASA').keyup(function() {
				$('#notifinBAKTERIFESESDEWASA').html('');
				a = $('#inBAKTERIFESESDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAKTERIFESESDEWASA').html(html);
				}
			});
			// End

			// keyUp INR
			$('#inINRDEWASA').keyup(function() {
				$('#notifinINRDEWASA').html('');
				a = $('#inINRDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinINRDEWASA').html(html);
				}else if( a >= 0.7 && a <= 1.3){
					html = '<b style="color:blue">INR NORMAL</b>';
					$('#notifinINRDEWASA').html(html);
				}else{
					html = '<b style="color:red">INR TIDAK NORMAL</b>';
					$('#notifinINRDEWASA').html(html);
				}
			});
			// End

			// keyUp INR PT/APTT
			$('#inINRPTAPTTDEWASA').keyup(function() {
				$('#notifinINRPTAPTTDEWASA').html('');
				a = $('#inINRPTAPTTDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinINRPTAPTTDEWASA').html(html);
				}else if( a >= 0.7 && a <= 1.3){
					html = '<b style="color:blue">INR NORMAL</b>';
					$('#notifinINRPTAPTTDEWASA').html(html);
				}else{
					html = '<b style="color:red">INR TIDAK NORMAL</b>';
					$('#notifinINRPTAPTTDEWASA').html(html);
				}
			});
			// End

			// keyUp PT
			$('#inPTDEWASA').keyup(function() {
				$('#notifinPTDEWASA').html('');
				a = $('#inPTDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPTDEWASA').html(html);
				}else if( a >= 11 && a <= 16){
					html = '<b style="color:blue">PT NORMAL</b>';
					$('#notifinPTDEWASA').html(html);
				}else{
					html = '<b style="color:red">PT TIDAK NORMAL</b>';
					$('#notifinPTDEWASA').html(html);
				}
			});
			// End

			// keyUp PT/APTT
			$('#inPTAPTTDEWASA').keyup(function() {
				$('#notifinPTAPTTDEWASA').html('');
				a = $('#inPTAPTTDEWASA').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPTAPTTDEWASA').html(html);
				}else if( a >= 11 && a <= 16){
					html = '<b style="color:blue">PT NORMAL</b>';
					$('#notifinPTAPTTDEWASA').html(html);
				}else{
					html = '<b style="color:red">PT TIDAK NORMAL</b>';
					$('#notifinPTAPTTDEWASA').html(html);
				}
			});
			// End
// End KeyUp

// KeyUp Anak
	//HB ANAK
			// KeyUP HB ANAK 1-1.5 Tahun
			$('#inHB115ANAK').keyup(function() {
				$('#notifinHB115ANAK').html('');
				a = $('#inHB115ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB115ANAK').html(html);
				}else if (a >= 10.5 && a <= 13.1) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB115ANAK').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB115ANAK').html(html);
				}
			});

			// KeyUP HB ANAK 1.5 - 3 Tahun
			$('#inHB153ANAK').keyup(function() {
				$('#notifinHB153ANAK').html('');
				a = $('#inHB153ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB153ANAK').html(html);
				}else if (a >= 10.8 && a <= 12.8) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB153ANAK').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB153ANAK').html(html);
				}
			});

			// KeyUP HB ANAK 3-16 Tahun
			$('#inHB316ANAK').keyup(function() {
				$('#notifinHB316ANAK').html('');
				a = $('#inHB316ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHB316ANAK').html(html);
				}else if (a >= 10.5 && a <= 13.1) {
					html = '<b style="color:blue">HB NORMAL </b>';
					$('#notifinHB316ANAK').html(html);
				} else{
					html = '<b style="color:red">HB TIDAK NORMAL</b>';
					$('#notifinHB316ANAK').html(html);
				}
			});

	// END 

			// KeyUP LEUKOSIT
			$('#inLEUKOSITANAK').keyup(function() {
				$('#notifinLEUKOSITANAK').html('');
				a = $('#inLEUKOSITANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITANAK').html(html);
				}else if (a >= 5000 && a <= 10000) {
					html = '<b style="color:blue">LEUKOSIT NORMAL</b>';
					$('#notifinLEUKOSITANAK').html(html);
				} else{
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSITANAK').html(html);
				}
			});

			// KeyUP TROMBOSIT
			$('#inTROMBOSITANAK').keyup(function() {
				$('#notifinTROMBOSITANAK').html('');
				a = $('#inTROMBOSITANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTROMBOSITANAK').html(html);
				}else if (a >= 150000 && a <= 400000) {
					html = '<b style="color:blue">TROMBOSIT NORMAL</b>';
					$('#notifinTROMBOSITANAK').html(html);
				} else{
					html = '<b style="color:red">TROMBOSIT TIDAK NORMAL</b>';
					$('#notifinTROMBOSITANAK').html(html);
				}
			});

	//HEMATOKRIT
			// KeyUP HEMATOKRIT	UMUR 1-3 Tahun		
			$('#inHEMATOKRIT13ANAK').keyup(function() {
				$('#notifinHEMATOKRIT13ANAK').html('');
				a = $('#inHEMATOKRIT13ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT13ANAK').html(html);
				}else if (a >= 35 && a <= 43) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL </b>';
					$('#notifinHEMATOKRIT13ANAK').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT13ANAK').html(html);
				}
			});

			// KeyUP HEMATOKRIT	UMUR 3-5 Tahun		
			$('#inHEMATOKRIT35ANAK').keyup(function() {
				$('#notifinHEMATOKRIT35ANAK').html('');
				a = $('#inHEMATOKRIT35ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT35ANAK').html(html);
				}else if (a >= 31 && a <= 43) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL </b>';
					$('#notifinHEMATOKRIT35ANAK').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT35ANAK').html(html);
				}
			});

			// KeyUP HEMATOKRIT	UMUR 5-10 Tahun		
			$('#inHEMATOKRIT510ANAK').keyup(function() {
				$('#notifinHEMATOKRIT510ANAK').html('');
				a = $('#inHEMATOKRIT510ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT510ANAK').html(html);
				}else if (a >= 33 && a <= 45) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL</b>';
					$('#notifinHEMATOKRIT510ANAK').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT510ANAK').html(html);
				}
			});

			// KeyUP HEMATOKRIT	UMUR 1016 Tahun		
			$('#inHEMATOKRIT1016ANAK').keyup(function() {
				$('#notifinHEMATOKRIT1016ANAK').html('');
				a = $('#inHEMATOKRIT1016ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHEMATOKRIT1016ANAK').html(html);
				}else if (a >= 31 && a <= 45) {
					html = '<b style="color:blue">HEMATOKRIT NORMAL</b>';
					$('#notifinHEMATOKRIT1016ANAK').html(html);
				}else{
					html = '<b style="color:red">HEMATOKRIT TIDAK NORMAL</b>';
					$('#notifinHEMATOKRIT1016ANAK').html(html);
				}
			});
	// End
			// KeyUP ERITROSIT				
			$('#inERITROSITANAK').keyup(function() {
				$('#notifinERITROSITANAK').html('');
				a = $('#inERITROSITANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITANAK').html(html);
				}else if (a >= 3.6 && a <= 4.8) {
					html = '<b style="color:blue">ERITROSIT NORMAL PRIA ANAK</b>';
					$('#notifinERITROSITANAK').html(html);
				} else{
					html = '<b style="color:red">ERITROSIT TIDAK NORMAL</b>';
					$('#notifinERITROSITANAK').html(html);
				}
			});

			// KeyUP BAS			
			$('#inBASANAK').keyup(function() {
				$('#notifinBASANAK').html('');
				a = $('#inBASANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBASANAK').html(html);
				}else if (a >= 3 && a <= 6) {
					html = '<b style="color:blue">BAS NORMAL</b>';
					$('#notifinBASANAK').html(html);
				} else{
					html = '<b style="color:red">BAS TIDAK NORMAL</b>';
					$('#notifinBASANAK').html(html);
				}
			});

			// KeyUP EOS			
			$('#inEOSANAK').keyup(function() {
				$('#notifinEOSANAK').html('');
				a = $('#inEOSANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinEOSANAK').html(html);
				}else if (a >= 1 && a <= 5) {
					html = '<b style="color:blue">EOS NORMAL</b>';
					$('#notifinEOSANAK').html(html);
				} else{
					html = '<b style="color:red">EOS TIDAK NORMAL</b>';
					$('#notifinEOSANAK').html(html);
				}
			});

			// KeyUP MONO		
			$('#inMONOANAK').keyup(function() {
				$('#notifinMONOANAK').html('');
				a = $('#inMONOANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMONOANAK').html(html);
				}else if (a >= 1 && a <= 6) {
					html = '<b style="color:blue">MONO NORMAL</b>';
					$('#notifinMONOANAK').html(html);
				} else{
					html = '<b style="color:red">MONO TIDAK NORMAL</b>';
					$('#notifinMONOANAK').html(html);
				}
			});

			// KeyUP SEGMEN		
			$('#inSEGMENANAK').keyup(function() {
				$('#notifinSEGMENANAK').html('');
				a = $('#inSEGMENANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSEGMENANAK').html(html);
				}else if (a >= 25 && a <= 60) {
					html = '<b style="color:blue">SEGMEN NORMAL</b>';
					$('#notifinSEGMENANAK').html(html);
				} else{
					html = '<b style="color:red">SEGMEN TIDAK NORMAL</b>';
					$('#notifinSEGMENANAK').html(html);
				}
			});

			// KeyUP LYMPO		
			$('#inLYMPOANAK').keyup(function() {
				$('#notifinLYMPOANAK').html('');
				a = $('#inLYMPOANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLYMPOANAK').html(html);
				}else if (a >= 25 && a <= 50) {
					html = '<b style="color:blue">LYMPO NORMAL</b>';
					$('#notifinLYMPOANAK').html(html);
				} else{
					html = '<b style="color:red">LYMPO TIDAK NORMAL</b>';
					$('#notifinLYMPOANAK').html(html);
				}
			});
	// MCV
			// KeyUP MCV 1 - 1.5 Tahun	 
			$('#inMCV115ANAK').keyup(function() {
				$('#notifinMCV115ANAK').html('');
				a = $('#inMCV115ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV115ANAK').html(html);
				}else if (a >= 74 && a <= 106) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV115ANAK').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV115ANAK').html(html);
				}
			});

			// KeyUP MCV 1.5 - 3 Tahun
			$('#inMCV153ANAK').keyup(function() {
				$('#notifinMCV153ANAK').html('');
				a = $('#inMCV153ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV153ANAK').html(html);
				}else if (a >= 73 && a <= 101) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV153ANAK').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV153ANAK').html(html);
				}
			});

			// KeyUP MCV 5 - 10 Tahun
			$('#inMCV510ANAK').keyup(function() {
				$('#notifinMCV510ANAK').html('');
				a = $('#inMCV510ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV510ANAK').html(html);
				}else if (a >= 63 && a <= 93) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV510ANAK').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV510ANAK').html(html);
				}
			});

			// KeyUP MCV >10 Tahun
			$('#inMCV10ANAK').keyup(function() {
				$('#notifinMCV10ANAK').html('');
				a = $('#inMCV10ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCV10ANAK').html(html);
				}else if (a >= 80 && a <= 96) {
					html = '<b style="color:blue">MCV NORMAL</b>';
					$('#notifinMCV10ANAK').html(html);
				} else{
					html = '<b style="color:red">MCV TIDAK NORMAL</b>';
					$('#notifinMCV10ANAK').html(html);
				}
			});
	//  End

	// MCH
			// KeyUP MCH UMUR 1 - 5 Tahun	
			$('#inMCH15ANAK').keyup(function() {
				$('#notifinMCH15ANAK').html('');
				a = $('#inMCH15ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH15ANAK').html(html);
				}else if (a >= 23 && a <= 31) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH15ANAK').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH15ANAK').html(html);
				}
			});

			// KeyUP MCH UMUR 1.5 - 3 Tahun	
			$('#inMCH153ANAK').keyup(function() {
				$('#notifinMCH153ANAK').html('');
				a = $('#inMCH153ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH153ANAK').html(html);
				}else if (a >= 22 && a <= 34) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH153ANAK').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH153ANAK').html(html);
				}
			});

			// KeyUP MCH UMUR >10 Tahun	
			$('#inMCH10ANAK').keyup(function() {
				$('#notifinMCH10ANAK').html('');
				a = $('#inMCH10ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCH10ANAK').html(html);
				}else if (a >= 22 && a <= 34) {
					html = '<b style="color:blue">MCH NORMAL</b>';
					$('#notifinMCH10ANAK').html(html);
				} else{
					html = '<b style="color:red">MCH TIDAK NORMAL</b>';
					$('#notifinMCH10ANAK').html(html);
				}
			});

	// End

	// MCHC
			// KeyUP MCHC UMUR 1-1.5 Tahun
			$('#inMCHC115ANAK').keyup(function() {
				$('#notifinMCHC115ANAK').html('');
				a = $('#inMCHC115ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHC115ANAK').html(html);
				}else if (a >= 28 && a <= 32) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHC115ANAK').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHC115ANAK').html(html);
				}
			});

			// KeyUP MCHC UMUR 1.5-3 Tahun
			$('#inMCHC153ANAK').keyup(function() {
				$('#notifinMCHC153ANAK').html('');
				a = $('#inMCHC153ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHC153ANAK').html(html);
				}else if (a >= 26 && a <= 34) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHC153ANAK').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHC153ANAK').html(html);
				}
			});

			// KeyUP MCHC UMUR 3-10 Tahun
			$('#inMCHC310ANAK').keyup(function() {
				$('#notifinMCHC310ANAK').html('');
				a = $('#inMCHC310ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHC310ANAK').html(html);
				}else if (a >= 32 && a <= 36) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHC310ANAK').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHC310ANAK').html(html);
				}
			});

			// KeyUP MCHC UMUR >10 Tahun
			$('#inMCHC10ANAK').keyup(function() {
				$('#notifinMCHC10ANAK').html('');
				a = $('#inMCHC10ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMCHC10ANAK').html(html);
				}else if (a >= 33 && a <= 36) {
					html = '<b style="color:blue">MCHC NORMAL</b>';
					$('#notifinMCHC10ANAK').html(html);
				} else{
					html = '<b style="color:red">MCHC TIDAK NORMAL</b>';
					$('#notifinMCHC10ANAK').html(html);
				}
			});

	// End
			// KeyUP RDW-CV
			$('#inRDW-CVANAK').keyup(function() {
				$('#notifinRDW-CVANAK').html('');
				a = $('#inRDW-CVANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRDW-CVANAK').html(html);
				}else if (a >= 11.0 && a <= 16.0) {
					html = '<b style="color:blue">RDW-CV NORMAL</b>';
					$('#notifinRDW-CVANAK').html(html);
				} else{
					html = '<b style="color:red">RDW-CV TIDAK NORMAL</b>';
					$('#notifinRDW-CVANAK').html(html);
				}
			});

			// KeyUP RDW-SD
			$('#inRDW-SDANAK').keyup(function() {
				$('#notifinRDW-SDANAK').html('');
				a = $('#inRDW-SDANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRDW-SDANAK').html(html);
				}else if (a >= 35.0 && a <= 56.0) {
					html = '<b style="color:blue">RDW-SD NORMAL</b>';
					$('#notifinRDW-SDANAK').html(html);
				} else{
					html = '<b style="color:red">RDW-SD TIDAK NORMAL</b>';
					$('#notifinRDW-SDANAK').html(html);
				}
			});

			// KeyUP LED
			$('#inLEDANAK').keyup(function() {
				$('#notifinLEDANAK').html('');
				a = $('#inLEDANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEDANAK').html(html);
				}else if (a >= 0 && a <= 10) {
					html = '<b style="color:blue">LED NORMAL PRIA ANAK</b>';
					$('#notifinLEDANAK').html(html);
				}else if (a >= 0 && a <= 15) {
					html = '<b style="color:blue">LED NORMAL WANITA ANAK</b>';
					$('#notifinLEDANAK').html(html);
				} else{
					html = '<b style="color:red">LED TIDAK NORMAL</b>';
					$('#notifinLEDANAK').html(html);
				}
			});

			// Keyup PH
			$('#inPHANAK').keyup(function() {
				$('#notifinPHANAK').html('');
				a = $('#inPHANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPHANAK').html(html);
				}else if (a >= 7.35 && a <= 7.45) {
					html = '<b style="color:blue">NILAI PH NORMAL</b>';
					$('#notifinPHANAK').html(html);
				} else{
					html = '<b style="color:red">NILAI PH TIDAK NORMAL</b>';
					$('#notifinPHANAK').html(html);
				}
			});

			// Keyup PCO2
			$('#inPCO2ANAK').keyup(function() {
				$('#notifinPCO2ANAK').html('');
				a = $('#inPCO2ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPCO2ANAK').html(html);
				}else if (a >= 41 && a <= 51) {
					html = '<b style="color:blue">NILAI PCO2 NORMAL</b>';
					$('#notifinPCO2ANAK').html(html);
				} else{
					html = '<b style="color:red">NILAI PCO2 TIDAK NORMAL</b>';
					$('#notifinPCO2ANAK').html(html);
				}
			});

			// Keyup PO2
			$('#inPO2ANAK').keyup(function() {
				$('#notifinPO2ANAK').html('');
				a = $('#inPO2ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPO2ANAK').html(html);
				}else if (a >= 80 && a <= 100) {
					html = '<b style="color:blue">NILAI PO2 NORMAL</b>';
					$('#notifinPO2ANAK').html(html);
				} else{
					html = '<b style="color:red">NILAI PO2 TIDAK NORMAL</b>';
					$('#notifinPO2ANAK').html(html);
				}
			});

			// Keyup HCO3
			$('#inHCO3ANAK').keyup(function() {
				$('#notifinHCO3ANAK').html('');
				a = $('#inHCO3ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHCO3ANAK').html(html);
				}else if (a >= 24 && a <= 28) {
					html = '<b style="color:blue">NILAI HCO3 NORMAL</b>';
					$('#notifinHCO3ANAK').html(html);
				} else{
					html = '<b style="color:red">NILAI HCO3 TIDAK NORMAL</b>';
					$('#notifinHCO3ANAK').html(html);
				}
			});

			// Keyup BE
			$('#inBEANAK').keyup(function() {
				$('#notifinBEANAK').html('');
				a = $('#inBEANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBEANAK').html(html);
				}
			});

			// Keyup SO2
			$('#inSO2ANAK').keyup(function() {
				$('#notifinSO2ANAK').html('');
				a = $('#inSO2ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSO2ANAK').html(html);
				}else if (a >= 93 && a <= 99) {
					html = '<b style="color:blue">NILAI SO2 NORMAL</b>';
					$('#notifinSO2ANAK').html(html);
				} else{
					html = '<b style="color:red">NILAI SO2 TIDAK NORMAL</b>';
					$('#notifinSO2ANAK').html(html);
				}
			});

			// Keyup SUHU
			$('#inSUHUANAK').keyup(function() {
				$('#notifinSUHUANAK').html('');
				a = $('#inSUHUANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSUHUANAK').html(html);
				}else if (a >= 36.8 && a <= 37.8) {
					html = '<b style="color:blue">NILAI SUHU NORMAL</b>';
					$('#notifinSUHUANAK').html(html);
				} else{
					html = '<b style="color:red">NILAI SUHU TIDAK NORMAL</b>';
					$('#notifinSUHUANAK').html(html);
				}
			});

			// Keyup OKSIGEN
			$('#inOKSIGENANAK').keyup(function() {
				$('#notifinOKSIGENANAK').html('');
				a = $('#inOKSIGENANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinOKSIGENANAK').html(html);
				}else if (a == 12) {
					html = '<b style="color:blue">NILAI OKSIGEN NORMAL</b>';
					$('#notifinOKSIGENANAK').html(html);
				} else{
					html = '<b style="color:red">NILAI OKSIGEN TIDAK NORMAL</b>';
					$('#notifinOKSIGENANAK').html(html);
				}
			});

			// Keyup SATURASI
			$('#inSATURASIANAK').keyup(function() {
				$('#notifinSATURASIANAK').html('');
				a = $('#inSATURASIANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSATURASIANAK').html(html);
				}else if (a >= 90) {
					html = '<b style="color:blue">NILAI SATURASI NORMAL</b>';
					$('#notifinSATURASIANAK').html(html);
				} else{
					html = '<b style="color:red">NILAI SATURASI TIDAK NORMAL</b>';
					$('#notifinSATURASIANAK').html(html);
				}
			});
			
			// KeyUP RHESUS ANAK
			$('#inRHESUSANAK').keyup(function() {
				$('#notifinRHESUSANAK').html('');
				a = $('#inRHESUSANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinRHESUSANAK').html(html);
				}
			});

			// KeyUP RHESUS ANAK
			$('#inGOLDARAHANAK').keyup(function() {
				$('#notifinGOLDARAHANAK').html('');
				a = $('#inGOLDARAHANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinGOLDARAHANAK').html(html);
				}
			});

			// KeyUP BLT ANAK
			$('#inBLTANAK').keyup(function() {
				$('#notifinBLTANAK').html('');
				a = $('#inBLTANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBLTANAK').html(html);
				}else if( a >= 2 && a <= 6){
					html = '<b style="color:blue">BLT NORMAL</b>';
					$('#notifinBLTANAK').html(html);
				}else{
					html = '<b style="color:red">BLT TIDAK NORMAL</b>';
					$('#notifinBLTANAK').html(html);
				}
			});

			// KeyUP CLT ANAK
			$('#inCLTANAK').keyup(function() {
				$('#notifinCLTANAK').html('');
				a = $('#inCLTANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCLT').html(html);
				}else if( a >= 2 && a <= 6){
					html = '<b style="color:blue">CLT NORMAL</b>';
					$('#notifinCLTANAK').html(html);
				}else{
					html = '<b style="color:red">CLT TIDAK NORMAL</b>';
					$('#notifinCLTANAK').html(html);
				}
			});

			// KeyUP APTT
			$('#inAPTTANAK').keyup(function() {
				$('#notifinAPTTANAK').html('');
				a = $('#inAPTTANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinAPTTANAK').html(html);
				}else if( a >= 25 && a <= 40){
					html = '<b style="color:blue">APTT NORMAL</b>';
					$('#notifinAPTTANAK').html(html);
				}else{
					html = '<b style="color:red">APTT TIDAK NORMAL</b>';
					$('#notifinAPTTANAK').html(html);
				}
			});

			// KeyUP PT/APTT 
			$('#inAPTTPTAPTTANAK').keyup(function() {
				$('#notifinAPTTPTAPTTANAK').html('');
				a = $('#inAPTTPTAPTTANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinAPTTPTAPTTANAK').html(html);
				}else if( a >= 25 && a <= 40){
					html = '<b style="color:blue">APTT NORMAL</b>';
					$('#notifinAPTTPTAPTTANAK').html(html);
				}else{
					html = '<b style="color:red">APTT TIDAK NORMAL</b>';
					$('#notifinAPTTPTAPTTANAK').html(html);
				}
			});

			// KeyUP PUASA
			$('#inPUASAANAK').keyup(function() {
				$('#notifinPUASAANAK').html('');
				a = $('#inPUASAANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPUASAANAK').html(html);
				}else if( a >= 60 && a <= 100){
					html = '<b style="color:blue">PUASA NORMAL</b>';
					$('#notifinPUASAANAK').html(html);
				}else{
					html = '<b style="color:red">PUASA TIDAK NORMAL</b>';
					$('#notifinPUASAANAK').html(html);
				}
			});

			// KeyUP 2 JAM PP
			$('#in2JAMPPANAK').keyup(function() {
				$('#notifin2JAMPPANAK').html('');
				a = $('#in2JAMPPANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifin2JAMPPANAK').html(html);
				}else if( a <= 120){
					html = '<b style="color:blue">2 JAM PP NORMAL</b>';
					$('#notifin2JAMPPANAK').html(html);
				}else{
					html = '<b style="color:red">2 JAM PP TIDAK NORMAL</b>';
					$('#notifin2JAMPPANAK').html(html);
				}
			});

			// KeyUP SEWAKTU
			$('#inSEWAKTUANAK').keyup(function() {
				$('#notifinSEWAKTUANAK').html('');
				a = $('#inSEWAKTUANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSEWAKTUANAK').html(html);
				}else if( a <= 140){
					html = '<b style="color:blue">SEWAKTU NORMAL</b>';
					$('#notifinSEWAKTUANAK').html(html);
				}else{
					html = '<b style="color:red">SEWAKTU TIDAK NORMAL</b>';
					$('#notifinSEWAKTUANAK').html(html);
				}
			});

			// KeyUP HBA
			$('#inHBAANAK').keyup(function() {
				$('#notifinHBAANAK').html('');
				a = $('#inHBAANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBAANAK').html(html);
				}else if( a >= 4 && a <= 5.6){
					html = '<b style="color:blue">HBA1C NORMAL</b>';
					$('#notifinHBAANAK').html(html);
				}else{
					html = '<b style="color:red">HBA1C TIDAK NORMAL</b>';
					$('#notifinHBAANAK').html(html);
				}
			});

			// KeyUP CHO
			$('#inCHOANAK').keyup(function() {
				$('#notifinCHOANAK').html('');
				a = $('#inCHOANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCHOANAK').html(html);
				}else if( a >= 120 && a <= 200){
					html = '<b style="color:blue">CHO NORMAL</b>';
					$('#notifinCHOANAK').html(html);
				}else{
					html = '<b style="color:red">CHO TIDAK NORMAL</b>';
					$('#notifinCHOANAK').html(html);
				}
			});

			// KeyUP HDL
			$('#inHDLANAK').keyup(function() {
				$('#notifinHDLANAK').html('');
				a = $('#inHDLANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHDLANAK').html(html);
				}else if( a >= 35 && a <= 60){
					html = '<b style="color:blue">HDL NORMAL</b>';
					$('#notifinHDLANAK').html(html);
				}else{
					html = '<b style="color:red">HDL TIDAK NORMAL</b>';
					$('#notifinHDLANAK').html(html);
				}
			});

			// KeyUP LDL
			$('#inLDLANAK').keyup(function() {
				$('#notifinLDLANAK').html('');
				a = $('#inLDLANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLDLANAK').html(html);
				}else if( a < 150){
					html = '<b style="color:blue">LDL NORMAL</b>';
					$('#notifinLDLANAK').html(html);
				}else{
					html = '<b style="color:red">LDL TIDAK NORMAL</b>';
					$('#notifinLDLANAK').html(html);
				}
			});

			// KeyUP UREUM
			$('#inUREUMANAK').keyup(function() {
				$('#notifinUREUMANAK').html('');
				a = $('#inUREUMANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinUREUMANAK').html(html);
				}else if( a >= 10 && a <= 50){
					html = '<b style="color:blue">UREUM NORMAL</b>';
					$('#notifinUREUMANAK').html(html);
				}else{
					html = '<b style="color:red">UREUM TIDAK NORMAL</b>';
					$('#notifinUREUMANAK').html(html);
				}
			});
			
			// KeyUP SGOT
			$('#inSGOTANAK').keyup(function() {
				$('#notifinSGOTANAK').html('');
				a = $('#inSGOTANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGOTANAK').html(html);
				}else if( a >= 13 && a <= 35){
					html = '<b style="color:blue">SGOT NORMAL WANITA</b>';
					$('#notifinSGOTANAK').html(html);
				}else if( a >= 15 && a <= 40){
					html = '<b style="color:blue">SGOT NORMAL PRIA</b>';
					$('#notifinSGOTANAK').html(html);
				}else{
					html = '<b style="color:red">SGOT TIDAK NORMAL</b>';
					$('#notifinSGOTANAK').html(html);
				}
			});

			// KeyUP SGPT
			$('#inSGPTANAK').keyup(function() {
				$('#notifinSGPTANAK').html('');
				a = $('#inSGPTANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSGPTANAK').html(html);
				}else if( a >= 7 && a <= 35){
					html = '<b style="color:blue">SGPT NORMAL WANITA</b>';
					$('#notifinSGPTANAK').html(html);
				}else if( a >= 10 && a <= 40){
					html = '<b style="color:blue">SGPT NORMAL PRIA</b>';
					$('#notifinSGPTANAK').html(html);
				}else{
					html = '<b style="color:red">SGPT TIDAK NORMAL</b>';
					$('#notifinSGPTANAK').html(html);
				}
			});
			// End

			// KeyUP NA
			$('#inNAANAK').keyup(function() {
				$('#notifinNAANAK').html('');
				a = $('#inNAANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNAANAK').html(html);
				}else if( a >= 128 && a <= 138){
					html = '<b style="color:blue">NA NORMAL</b>';
					$('#notifinNAANAK').html(html);
				}else{
					html = '<b style="color:red">NA TIDAK NORMAL</b>';
					$('#notifinNAANAK').html(html);
				}
			});

			//KeyUp K
			$('#inKANAK').keyup(function() {
				$('#notifinKANAK').html('');
				a = $('#inKANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKANAK').html(html);
				}else if( a >= 3.9 && a <= 4.9){
					html = '<b style="color:blue">K NORMAL</b>';
					$('#notifinKANAK').html(html);
				}else{
					html = '<b style="color:red">K TIDAK NORMAL</b>';
					$('#notifinKANAK').html(html);
				}
			});

			$('#inCLANAK').keyup(function() {
				$('#notifinCLANAK').html('');
				a = $('#inCLANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCLANAK').html(html);
				}else if( a >= 88 && a <= 100){
					html = '<b style="color:blue">CL NORMAL</b>';
					$('#notifinCLANAK').html(html);
				}else{
					html = '<b style="color:red">CL TIDAK NORMAL</b>';
					$('#notifinCLANAK').html(html);
				}
			});

			//Ca
			$('#inCaANAK').keyup(function() {
				$('#notifinCaANAK').html('');
				a = $('#inCaANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCaANAK').html(html);
				}else if( a >= 0.99 && a <= 1.29){
					html = '<b style="color:blue">Ca NORMAL</b>';
					$('#notifinCaANAK').html(html);
				}else{
					html = '<b style="color:red">Ca TIDAK NORMAL</b>';
					$('#notifinCaANAK').html(html);
				}
			});
			// End

			// keyUp PROTEIN 
			$('#inPROTEINANAK').keyup(function() {
				$('#notifinPROTEINANAK').html('');
				a = $('#inPROTEINANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEINANAK').html(html);
				}
			});
			// End

			// keyUp ALBUMIN414ANAK
			$('#inALBUMIN414ANAK').keyup(function() {
				$('#notifinALBUMIN414ANAK').html('');
				a = $('#inALBUMIN414ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinALBUMIN414ANAK').html(html);
				}else if( a >= 3.8 && a <= 5.4){
					html = '<b style="color:blue">ALBUMIN  NORMAL</b>';
					$('#notifinALBUMIN414ANAK').html(html);
				}else{
					html = '<b style="color:red">ALBUMIN TIDAK NORMAL</b>';
					$('#notifinALBUMIN414ANAK').html(html);
				}
			});
			// End

			// keyUp ALBUMIN1418ANAK
			$('#inALBUMIN1418ANAK').keyup(function() {
				$('#notifinALBUMIN1418ANAK').html('');
				a = $('#inALBUMIN1418ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinALBUMIN1418ANAK').html(html);
				}else if( a >= 3.2 && a <= 4.5){
					html = '<b style="color:blue">ALBUMIN  NORMAL</b>';
					$('#notifinALBUMIN1418ANAK').html(html);
				}else{
					html = '<b style="color:red">ALBUMIN TIDAK NORMAL</b>';
					$('#notifinALBUMIN1418ANAK').html(html);
				}
			});
			// End

			// keyUp ALBUMIN1860ANAK
			$('#inALBUMIN1860ANAK').keyup(function() {
				$('#notifinALBUMIN1860ANAK').html('');
				a = $('#inALBUMIN1860ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinALBUMIN1860ANAK').html(html);
				}else if( a >= 3.4 && a <= 4.8){
					html = '<b style="color:blue">ALBUMIN  NORMAL</b>';
					$('#notifinALBUMIN1860ANAK').html(html);
				}else{
					html = '<b style="color:red">ALBUMIN TIDAK NORMAL</b>';
					$('#notifinALBUMIN1860ANAK').html(html);
				}
			});
			// End

			// keyUp MALARIA
			$('#inMALARIAANAK').keyup(function() {
				$('#notifinMALARIAANAK').html('');
				a = $('#inMALARIAANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinMALARIAANAK').html(html);
				}
			});
			// End

			// keyUp WIDAL
			$('#inWIDALANAK').keyup(function() {
				$('#notifinWIDALANAK').html('');
				a = $('#inWIDALANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinWIDALANAK').html(html);
				}
			});
			// End

			// keyUp TROPONIN
			$('#inTROPONINANAK').keyup(function() {
				$('#notifinTROPONINANAK').html('');
				a = $('#inTROPONINANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTROPONINANAK').html(html);
				}
			});
			// End
			
			// keyUp NS1
			$('#inNS1ANAK').keyup(function() {
				$('#notifinNS1ANAK').html('');
				a = $('#inNS1ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNS1ANAK').html(html);
				}
			});
			// End

			// keyUp HBSAG
			$('#inHBSAGANAK').keyup(function() {
				$('#notifinHBSAGANAK').html('');
				a = $('#inHBSAGANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBSAGANAK').html(html);
				}
			});
			// End
			
			// keyUp HBSAB
			$('#inHBSABANAK').keyup(function() {
				$('#notifinHBSABANAK').html('');
				a = $('#inHBSABANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinHBSABANAK').html(html);
				}
			});
			// End

			// keyUp B20
			$('#inB20ANAK').keyup(function() {
				$('#notifinB20ANAK').html('');
				a = $('#inB20ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinB20ANAK').html(html);
				}
			});
			// End

			// keyUp VDRL
			$('#inVDRLANAK').keyup(function() {
				$('#notifinVDRLANAK').html('');
				a = $('#inVDRLANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinVDRLANAK').html(html);
				}
			});
			// End

			// keyUp PLANO
			$('#inPLANOANAK').keyup(function() {
				$('#notifinPLANOANAK').html('');
				a = $('#inPLANOANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPLANOANAK').html(html);
				}
			});
			// End

			// keyUp SAMAR
			$('#inSAMARANAK').keyup(function() {
				$('#notifinSAMARANAK').html('');
				a = $('#inSAMARANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSAMARANAK').html(html);
				}
			});
			// End

			// keyUp SALMONELLA
			$('#inSALMONELLAANAK').keyup(function() {
				$('#notifinSALMONELLAANAK').html('');
				a = $('#inSALMONELLAANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSALMONELLAANAK').html(html);
				}
			});
			// End

			// keyUp DENGUE
			$('#inDENGUEANAK').keyup(function() {
				$('#notifinDENGUEANAK').html('');
				a = $('#inDENGUEANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinDENGUEANAK').html(html);
				}
			});
			// End

			// keyUp WARNA
			$('#inWARNAANAK').keyup(function() {
				$('#notifinWARNAANAK').html('');
				a = $('#inWARNAANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinWARNAANAK').html(html);
				}
			});
			// End

			// keyUp KEJERNIHAN
			$('#inKEJERNIHANANAK').keyup(function() {
				$('#notifinKEJERNIHANANAK').html('');
				a = $('#inKEJERNIHANANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKEJERNIHANANAK').html(html);
				}
			});
			// End

			// keyUp ERITROSIT
			$('#inERITROSITURINEANAK').keyup(function() {
				$('#notifinERITROSITURINEANAK').html('');
				a = $('#inERITROSITURINEANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITURINEANAK').html(html);
				}else if( a <= 1){
					html = '<b style="color:blue">ERITROSIT NORMAL</b>';
					$('#notifinERITROSITURINEANAK').html(html);
				}else{
					html = '<b style="color:red">ERITROSIT TIDAK NORMAL</b>';
					$('#notifinERITROSITURINEANAK').html(html);
				}
			});
			// End

			// keyUp LEUKOSIT
			$('#inLEUKOSITURINEANAK').keyup(function() {
				$('#notifinLEUKOSITURINEANAK').html('');
				a = $('#inLEUKOSITURINEANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITURINEANAK').html(html);
				}else if( a <= 6){
					html = '<b style="color:blue">LEUKOSIT NORMAL</b>';
					$('#notifinLEUKOSITURINEANAK').html(html);
				}else{
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSITURINEANAK').html(html);
				}
			});
			// End

			// keyUp SEL EPITEL
			$('#inSELANAK').keyup(function() {
				$('#notifinSELANAK').html('');
				a = $('#inSELANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSELANAK').html(html);
				}
			});
			// End

			// keyUp SILINDER
			$('#inSILINDERANAK').keyup(function() {
				$('#notifinSILINDERANAK').html('');
				a = $('#inSILINDERANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSILINDERANAK').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">SILINDER NORMAL</b>';
					$('#notifinSILINDERANAK').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:blue">SILINDER TIDAK NORMAL</b>';
					$('#notifinSILINDERANAK').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinSILINDERANAK').html(html);
				}
			});
			// End

			// keyUp KRISTAL
			$('#inKRISTALANAK').keyup(function() {
				$('#notifinKRISTALANAK').html('');
				a = $('#inKRISTALANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKRISTALANAK').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">KRISTAL NORMAL</b>';
					$('#notifinKRISTALANAK').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">KRISTAL TIDAK NORMAL</b>';
					$('#notifinKRISTALANAK').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinKRISTALANAK').html(html);
				}
			});
			// End

			// keyUp BAKTERI
			$('#inBAKTERIANAK').keyup(function() {
				$('#notifinBAKTERIANAK').html('');
				a = $('#inBAKTERIANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAKTERIANAK').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">BAKTERI NORMAL</b>';
					$('#notifinBAKTERIANAK').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">BAKTERI TIDAK NORMAL</b>';
					$('#notifinBAKTERIANAK').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinBAKTERIANAK').html(html);
				}
			});
			// End

			// keyUp JAMUR
			$('#inJAMURANAK').keyup(function() {
				$('#notifinJAMURANAK').html('');
				a = $('#inJAMURANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinJAMURANAK').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">JAMUR NORMAL</b>';
					$('#notifinJAMURANAK').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">JAMUR TIDAK NORMAL</b>';
					$('#notifinJAMURANAK').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinJAMURANAK').html(html);
				}
			});
			// End

			// keyUp ERIROSITKIMIA
			$('#inERITROSITKIMIAANAK').keyup(function() {
				$('#notifinERITROSITKIMIAANAK').html('');
				a = $('#inERITROSITKIMIAANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITKIMIAANAK').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">ERITROSIT NORMAL</b>';
					$('#notifinERITROSITKIMIAANAK').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">ERITROSIT TIDAK NORMAL</b>';
					$('#notifinERITROSITKIMIAANAK').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinERITROSITKIMIAANAK').html(html);
				}
			});
			// End

			// keyUp GLUKOSA
			$('#inGLUKOSAANAK').keyup(function() {
				$('#notifinGLUKOSAANAK').html('');
				a = $('#inGLUKOSAANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinGLUKOSAANAK').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">GLUKOSA NORMAL</b>';
					$('#notifinGLUKOSAANAK').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">GLUKOSA TIDAK NORMAL</b>';
					$('#notifinGLUKOSAANAK').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinGLUKOSAANAK').html(html);
				}
			});
			// End

			// keyUp PROTEINKIMIA
			$('#inPROTEINKIMIAANAK').keyup(function() {
				$('#notifinPROTEINKIMIAANAK').html('');
				a = $('#inPROTEINKIMIAANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEINKIMIAANAK').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">PROTEIN NORMAL</b>';
					$('#notifinPROTEINKIMIAANAK').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEINKIMIAANAK').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinPROTEINKIMIAANAK').html(html);
				}
			});
			// End

			// keyUp BILIRUBIN
			$('#inBILIRUBINANAK').keyup(function() {
				$('#notifinBILIRUBINANAK').html('');
				a = $('#inBILIRUBINANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBILIRUBINANAK').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">BILIRUBIN NORMAL</b>';
					$('#notifinBILIRUBINANAK').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">BILIRUBIN TIDAK NORMAL</b>';
					$('#notifinBILIRUBINANAK').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinBILIRUBINANAK').html(html);
				}
			});
			// End

			// keyUp PH
			$('#inPHKIMIAANAK').keyup(function() {
				$('#notifinPHKIMIAANAK').html('');
				a = $('#inPHKIMIAANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPHKIMIAANAK').html(html);
				}else if( a >= 2 && a <= 8){
					html = '<b style="color:blue">PH NORMAL</b>';
					$('#notifinPHKIMIAANAK').html(html);
				}else{
					html = '<b style="color:red">PH TIDAK NORMAL</b>';
					$('#notifinPHKIMIAANAK').html(html);
				}
			});
			// End

			// keyUp BERAT
			$('#inBERATANAK').keyup(function() {
				$('#notifinBERATANAK').html('');
				a = $('#inBERATANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBERATANAK').html(html);
				}else if( a >= 1003 && a <= 1029){
					html = '<b style="color:blue">BERAT JENIS NORMAL</b>';
					$('#notifinBERATANAK').html(html);
				}else{
					html = '<b style="color:red">BERAT JENIS TIDAK NORMAL</b>';
					$('#notifinBERATANAK').html(html);
				}
			});
			// End

			// keyUp KETON
			$('#inKETONANAK').keyup(function() {
				$('#notifinKETONANAK').html('');
				a = $('#inKETONANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKETONANAK').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">KETON NORMAL</b>';
					$('#notifinKETONANAK').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">KETON TIDAK NORMAL</b>';
					$('#notifinKETONANAK').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinKETONANAK').html(html);
				}
			});
			// End

			// keyUp NITRIT
			$('#inNITRITANAK').keyup(function() {
				$('#notifinNITRITANAK').html('');
				a = $('#inNITRITANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinNITRITANAK').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">NITRIT NORMAL</b>';
					$('#notifinNITRITANAK').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">NITRIT TIDAK NORMAL</b>';
					$('#notifinNITRITANAK').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinNITRITANAK').html(html);
				}
			});
			// End

			// keyUp LEUKOSITKIMIA
			$('#inLEUKOSITKIMIAANAK').keyup(function() {
				$('#notifinLEUKOSITKIMIAANAK').html('');
				a = $('#inLEUKOSITKIMIAANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITKIMIAANAK').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">LEUKOSITNORMAL</b>';
					$('#notifinLEUKOSITKIMIAANAK').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">LEUKOSIT TIDAK NORMAL</b>';
					$('#notifinLEUKOSITKIMIAANAK').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinLEUKOSITKIMIAANAK').html(html);
				}
			});
			// End

			// keyUp UROBILINOGEN
			$('#inUROBILINOGENANAK').keyup(function() {
				$('#notifinUROBILINOGENANAK').html('');
				a = $('#inUROBILINOGENANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinUROBILINOGENANAK').html(html);
				}else if( a == "negatif" || a == "NEGATIF" || a == "Negatif"){
					html = '<b style="color:blue">UROBILINOGEN NORMAL</b>';
					$('#notifinUROBILINOGENANAK').html(html);
				}else if( a == "positif" || a == "POSITIF" || a == "Positif"){
					html = '<b style="color:red">UROBILINOGEN TIDAK NORMAL</b>';
					$('#notifinUROBILINOGENANAK').html(html);
				}else{
					html = '<b style="color:red">Inputan Anda salah</b>';
					$('#notifinUROBILINOGENANAK').html(html);
				}
			});
			// End
			
			// keyUp ANALISA SPERMA
			$('#inSPERMAANAK').keyup(function() {
				$('#notifinSPERMAANAK').html('');
				a = $('#inSPERMAANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSPERMAANAK').html(html);
				}
			});
			// End

			// keyUp DARAH FESES
			$('#inDARAHFESESANAK').keyup(function() {
				$('#notifinDARAHFESESANAK').html('');
				a = $('#inDARAHFESESANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinDARAHFESESANAK').html(html);
				}
			});
			// End

			// keyUp LENDIR
			$('#inLENDIRANAK').keyup(function() {
				$('#notifinLENDIRANAK').html('');
				a = $('#inLENDIRANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLENDIRANAK').html(html);
				}
			});
			// End

			// keyUp BAU
			$('#inBAUANAK').keyup(function() {
				$('#notifinBAUANAK').html('');
				a = $('#inBAUANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAUANAK').html(html);
				}
			});
			// End
			
			// keyUp KONSISTENSI
			$('#inKONSISTENSIANAK').keyup(function() {
				$('#notifinKONSISTENSIANAK').html('');
				a = $('#inKONSISTENSIANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinKONSISTENSIANAK').html(html);
				}
			});
			// End
			
			// keyUp WARNA FESES
			$('#inWARNAFESESANAK').keyup(function() {
				$('#notifinWARNAFESESANAK').html('');
				a = $('#inWARNAFESESANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinWARNAFESESANAK').html(html);
				}
			});
			// End

			// keyUp PARASIT
			$('#inPARASITANAK').keyup(function() {
				$('#notifinPARASITANAK').html('');
				a = $('#inPARASITANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPARASITANAK').html(html);
				}
			});
			// End

			// keyUp LEUKOSIT FESES
			$('#inLEUKOSITFESESANAK').keyup(function() {
				$('#notifinLEUKOSITFESESANAK').html('');
				a = $('#inLEUKOSITFESESANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinLEUKOSITFESESANAK').html(html);
				}
			});
			// End

			// keyUp ERITROSIT FESES
			$('#inERITROSITFESESANAK').keyup(function() {
				$('#notifinERITROSITFESESANAK').html('');
				a = $('#inERITROSITFESESANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinERITROSITFESESANAK').html(html);
				}
			});
			// End

			// keyUp SEL EPITEL
			$('#inSELFESESANAK').keyup(function() {
				$('#notifinSELFESESANAK').html('');
				a = $('#inSELFESESANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSELFESESANAK').html(html);
				}
			});
			// End

			// keyUp SILIDER
			$('#inSILIDERANAK').keyup(function() {
				$('#notifinSILIDERANAK').html('');
				a = $('#inSILIDERANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinSILIDERANAK').html(html);
				}
			});
			// End

			// keyUp TELUR CACING
			$('#inTELURANAK').keyup(function() {
				$('#notifinTELURANAK').html('');
				a = $('#inTELURANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinTELURANAK').html(html);
				}
			});
			// End

			// keyUp AMOEBA
			$('#inAMOEBAANAK').keyup(function() {
				$('#notifinAMOEBAANAK').html('');
				a = $('#inAMOEBAANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinAMOEBAANAK').html(html);
				}
			});
			// End

			// keyUp BAKTERI FESES
			$('#inBAKTERIFESESANAK').keyup(function() {
				$('#notifinBAKTERIFESESANAK').html('');
				a = $('#inBAKTERIFESESANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinBAKTERIFESESANAK').html(html);
				}
			});
			// End

			// keyUp INR
			$('#inINRANAK').keyup(function() {
				$('#notifinINRANAK').html('');
				a = $('#inINRANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinINRANAK').html(html);
				}else if( a >= 0.7 && a <= 1.3){
					html = '<b style="color:blue">INR NORMAL</b>';
					$('#notifinINRANAK').html(html);
				}else{
					html = '<b style="color:red">INR TIDAK NORMAL</b>';
					$('#notifinINRANAK').html(html);
				}
			});
			// End

			// keyUp INR PT/APTT
			$('#inINRPTAPTTANAK').keyup(function() {
				$('#notifinINRPTAPTTANAK').html('');
				a = $('#inINRPTAPTTANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinINRPTAPTTANAK').html(html);
				}else if( a >= 0.7 && a <= 1.3){
					html = '<b style="color:blue">INR NORMAL</b>';
					$('#notifinINRPTAPTTANAK').html(html);
				}else{
					html = '<b style="color:red">INR TIDAK NORMAL</b>';
					$('#notifinINRPTAPTTANAK').html(html);
				}
			});
			// End

			// keyUp PT
			$('#inPTANAK').keyup(function() {
				$('#notifinPTANAK').html('');
				a = $('#inPTANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPTANAK').html(html);
				}else if( a >= 11 && a <= 16){
					html = '<b style="color:blue">PT NORMAL</b>';
					$('#notifinPTANAK').html(html);
				}else{
					html = '<b style="color:red">PT TIDAK NORMAL</b>';
					$('#notifinPTANAK').html(html);
				}
			});
			// End

			// keyUp PT/APTT
			$('#inPTAPTTANAK').keyup(function() {
				$('#notifinPTAPTTANAK').html('');
				a = $('#inPTAPTTANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPTAPTTANAK').html(html);
				}else if( a >= 11 && a <= 16){
					html = '<b style="color:blue">PT NORMAL</b>';
					$('#notifinPTAPTTANAK').html(html);
				}else{
					html = '<b style="color:red">PT TIDAK NORMAL</b>';
					$('#notifinPTAPTTANAK').html(html);
				}
			});
			// End
			
			// keyUp CREATININ ANAK 1-15
			$('#inCREATININ115ANAK').keyup(function() {
				$('#notifinCREATININ115ANAK').html('');
				a = $('#inCREATININ115ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCREATININ115ANAK').html(html);
				}else if( a >= 0.3 && a <= 0.7){
					html = '<b style="color:blue">CREATININ UMUR 1-15 Tahun, NORMAL</b>';
					$('#notifinCREATININ115ANAK').html(html);
				}else{
					html = '<b style="color:red">CREATININ UMUR 1-15 Tahun, TIDAK NORMAL</b>';
					$('#notifinCREATININ115ANAK').html(html);
				}
			});
			// End

			// keyUp CREATININ ANAK 15-18
			$('#inCREATININ1518ANAK').keyup(function() {
				$('#notifinCREATININ1518ANAK').html('');
				a = $('#inCREATININ115ANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCREATININ1518ANAK').html(html);
				}else if( a >= 0.5 && a <= 1.0){
					html = '<b style="color:blue">CREATININ UMUR 1-15 Tahun, NORMAL</b>';
					$('#notifinCREATININ1518ANAK').html(html);
				}else{
					html = '<b style="color:red">CREATININ UMUR 1-15 Tahun, TIDAK NORMAL</b>';
					$('#notifinCREATININ1518ANAK').html(html);
				}
			});
			// End

			// keyUp CRP
			$('#inCRPANAK').keyup(function() {
				$('#notifinCRPANAK').html('');
				a = $('#inCRPANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinCRPANAK').html(html);
				}else if( a <= 10){
					html = '<b style="color:blue">CRP NORMAL</b>';
					$('#notifinCRPANAK').html(html);
				}else{
					html = '<b style="color:red">CRP TIDAK NORMAL</b>';
					$('#notifinCRPANAK').html(html);
				}
			});
			// End
       
// End KeyUp

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

<!-- SUM GLOBULIN -->
    <script type="text/javascript">
		function sumGLOBULINDEWASA(){
			var a = document.getElementById('inPROTEINGLOBULINDEWASA').value;
			var b = document.getElementById('inALBUMIN1860GLOBULINDEWASA').value;
			var hasil = parseFloat(a) + parseFloat(b);
			if(!isNaN(hasil)){
				document.getElementById('inGLOBULINDEWASA').value = hasil;
			}
		}
    </script>
<!-- SUM GLOBULIN -->

	 <!--insert Darah Rutin Dewasa-->
	 <script type="text/javascript">
		function insert_bil_darah() {
		    Nama_tindakan = $('#inNamaDARAHDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_labor_Darah_Dewasa').val();
			hb=$('#inHBDEWASA').val();
			leukosit=$('#inLEUKOSITDEWASA').val();
			trombosit=$('#inTROMBOSITDEWASA').val();
			hematokrit=$('#inHEMATOKRITDEWASA').val();
			eritrosit=$('#inERITROSITDEWASA').val();
			mcv=$('#inMCVDEWASA').val();
			mch=$('#inMCHDEWASA').val();
			mchc=$('#inMCHCDEWASA').val();
			rdw_cv=$('#inRDW_CVDEWASA').val();
			rdw_sd=$('#inRDW_SDDEWASA').val();
			bas=$('#inBASDEWASA').val();
			eos=$('#inEOSDEWASA').val();
			mono=$('#inMONODEWASA').val();
			segmen=$('#inSEGMENDEWASA').val();
			lympo=$('#inLYMPODEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_darah_rutin_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						hb:hb,
						leukosit:leukosit,
						trombosit:trombosit,
						hematokrit:hematokrit,
						eritrosit:eritrosit,
						mcv:mcv,
						mch:mch,
						mchc:mchc,
						rdw_cv:rdw_cv,
						rdw_sd:rdw_sd,
						bas:bas,
						eos:eos,
						mono:mono,
						segmen:segmen,
						lympo:lympo,
						inJenisPasienDEWASA:inJenisPasienDEWASA,	
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hb=$('#inHBDEWASA').val("");
						leukosit=$('#inLEUKOSITDEWASA').val("");
						trombosit=$('#inTROMBOSITDEWASA').val("");
						hematokrit=$('#inHEMATOKRITDEWASA').val("");
						eritrosit=$('#inERITROSITDEWASA').val("");
						mcv=$('#inMCVDEWASA').val("");
						mch=$('#inMCHDEWASA').val("");
						mchc=$('#inMCHCDEWASA').val("");
						rdw_cv=$('#inRDW_CVDEWASA').val("");
						rdw_sd=$('#inRDW_SDDEWASA').val("");
						bas=$('#inBASDEWASA').val("");
						eos=$('#inEOSDEWASA').val("");
						mono=$('#inMONODEWASA').val("");
						segmen=$('#inSEGMENDEWASA').val("");
						lympo=$('#inLYMPODEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

		function insert_gol_darah() {
		    Nama_tindakan = $('#inNamaGOLDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_labor_golongan_darah_dewasa').val();
			golongan_darah_dewasa=$('#inGOLDARAHDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_golongan_darah_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						gol_darah:golongan_darah_dewasa,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						golongan_darah_dewasa=$('#inGOLDARAHDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_led() {
		    Nama_tindakan = $('#inNamaLEDDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_labor_led_dewasa').val();
			led_dewasa=$('#inLEDDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_led_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						led:led_dewasa,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						led_dewasa=$('#inLEDDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
						}else{
						swal({   
							title: "Gagal!",   
							type: "warning", 
							text: data.status,
							confirmButtonCrhesuolor: "#3cb878",   
						});
					}
				}          
				                  
				});    
			});
				});
		return false;
		}
		function insert_bil_rhesus() {
		    Nama_tindakan = $('#inNamaRHESUSDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborRHESUS').val();
			rhesus_dewasa=$('#inRHESUSDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_rhesus_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						rhesus_dewasa:rhesus_dewasa,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						rhesus_dewasa=$('#inRHESUSDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_blt() {
		    Nama_tindakan = $('#inNamaBLTDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborBLTDEWASA').val();
			blt_dewasa=$('#inBLTDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_blt_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						blt_dewasa:blt_dewasa,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						blt_dewasa=$('#inBLTDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_clt() {
		    Nama_tindakan = $('#inNamaCLTDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborCLTDEWASA').val();
			clt_dewasa=$('#inCLTDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_clt_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						clt_dewasa:clt_dewasa,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						clt_dewasa=$('#inCLTDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

		function insert_bil_guldarah() {
		    Nama_tindakan = $('#inNamaGULDARAHDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborGULDARAHDEWASA').val();
			puasa_dewasa=$('#inPUASADEWASA').val();
			jampp_dewasa=$('#in2JAMPPDEWASA').val();
			sewaktu_dewasa=$('#inSEWAKTUDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_gula_darah_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						puasa_dewasa:puasa_dewasa,
						jampp_dewasa:jampp_dewasa,
						sewaktu_dewasa:sewaktu_dewasa,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						puasa_dewasa=$('#inPUASADEWASA').val("");
						jampp_dewasa=$('#in2JAMPPDEWASA').val("");
						sewaktu_dewasa=$('#inSEWAKTUDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function	insert_bil_ureum() {
		    Nama_tindakan = $('#inNamaUREUMDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborUREUMDEWASA').val();
			ureum=$('#inUREUMDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_ureum_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						ureum:ureum,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						ureum=$('#inUREUMDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_creatinin() {
		    Nama_tindakan = $('#inNamaCREATININDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborCREATININDEWASA').val();
			creatinin=$('#inCREATININDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_creatinin_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						creatinin:creatinin,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						creatinin=$('#inCREATININDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_sgot() {
		    Nama_tindakan = $('#inNamaSGOTDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborSGOTDEWASA').val();
			sgot=$('#inSGOTDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_sgot_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						sgot:sgot,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sgot=$('#inSGOTDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_sgpt() {
		    Nama_tindakan = $('#inNamaDEWASASGPT').val();
		    id_tindakan_labor = $('#id_tindakan_laborSGPTDEWASA').val();
			SGPT1260=$('#inSGPT1260DEWASA').val();
			SGPT6090=$('#inSGPT6090DEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_sgpt_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						SGPT1260:SGPT1260,
						SGPT6090:SGPT6090,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						SGPT1260=$('#inSGPT1260DEWASA').val("");
						SGPT6090=$('#inSGPT6090DEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_pt() {
		    Nama_tindakan = $('#inNamaPTDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborPTDEWASA').val();
			PT=$('#inPTDEWASA').val();
			INR=$('#inINRDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_PT_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						PT:PT,
						INR:INR,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						PT=$('#inPTDEWASA').val("");
						INR=$('#inINRDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_aptt() {
		    Nama_tindakan = $('#inNamaAPTTDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborAPTTDEWASA').val();
			APTT=$('#inAPTTDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_APTT_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						APTT:APTT,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						APTT=$('#inAPTTDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

		function insert_bil_protein() {
		    Nama_tindakan = $('#inNamaPROTEINDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborPROTEINDEWASA').val();
			protein=$('#inPROTEINDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_protein_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						protein:protein,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						protein=$('#inPROTEINDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

		function insert_bil_albumin() {
		    Nama_tindakan = $('#inNamaDEWASAALBUMIN').val();
		    id_tindakan_labor = $('#id_tindakan_laborALBUMINDEWASA').val();
			albumin1860=$('#inALBUMIN1860DEWASA').val();
			albumin6090=$('#inALBUMIN6090DEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_albumin_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						albumin1860:albumin1860,
						albumin6090:albumin6090,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						albumin1860=$('#inALBUMIN1860DEWASA').val("");
						albumin6090=$('#inALBUMIN6090DEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

		function insert_bil_globulin() {
		    Nama_tindakan = $('#inNamaDEWASAGLOBULIN').val();
		    id_tindakan_labor = $('#id_tindakan_laborGLOBULINDEWASA').val();
			albumin1860=$('#inALBUMIN1860GLOBULINDEWASA').val();
			albumin6090=$('#inALBUMIN6090GLOBULINDEWASA').val();
			protein=$('#inPROTEINGLOBULINDEWASA').val();
			globulin=$('#inGLOBULINDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_globulin_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						albumin1860:albumin1860,
						albumin6090:albumin6090,
						protein:protein,
						globulin:globulin,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						albumin1860=$('#inALBUMIN1860GLOBULINDEWASA').val("");
						albumin6090=$('#inALBUMIN6090GLOBULINDEWASA').val("");
						protein=$('#inPROTEINGLOBULINDEWASA').val("");
						globulin=$('#inGLOBULINDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

	function insert_bil_ldl() {
		    Nama_tindakan = $('#inNamaLDLDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborLDLDEWASA').val();
			ldl=$('#inLDLDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_ldl_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						ldl:ldl,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						ldl=$('#inLDLDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_hdl() {
		    Nama_tindakan = $('#inNamaHDLDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborHDLDEWASA').val();
			hdl=$('#inHDLDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_hdl_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						hdl:hdl,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hdl=$('#inHDLDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_uric() {
		    Nama_tindakan = $('#inNamaURICDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborURICDEWASA').val();
			uric=$('#inURICDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_uric_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						uric:uric,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						uric=$('#inURICDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_trigiseride() {
		    Nama_tindakan = $('#inNamaTRIGLYSERIDEDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborTRIGLYSERIDEDEWASA').val();
			triglyseride=$('#inTRIGLYSERIDEDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_triglyseride_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						triglyseride:triglyseride,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						triglyseride=$('#inTRIGLYSERIDEDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

	function insert_bil_elektrolit() {
		    Nama_tindakan = $('#inNamaELEKTROLITDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborELEKTROLITDEWASA').val();
			Na=$('#inNADEWASA').val();
			K=$('#inKDEWASA').val();
			Cl=$('#inCLDEWASA').val();
			Ca=$('#inCaDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_elektrolit_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						Na:Na,
						K:K,
						Cl:Cl,
						Ca:Ca,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						Na=$('#inNADEWASA').val("");
						K=$('#inKDEWASA').val("");
						Cl=$('#inCLDEWASA').val("");
						Ca=$('#inCaDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

	function insert_bil_malaria() {
		    Nama_tindakan = $('#inNamaMALARIADEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborMALARIADEWASA').val();
			malaria=$('#inMALARIADEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_malaria_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						malaria:malaria,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						malaria=$('#inMALARIADEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

	function insert_bil_widal() {
		    Nama_tindakan = $('#inNamaWIDALDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborWIDALDEWASA').val();
			widal=$('#inWIDALDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_widal_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						widal:widal,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						widal=$('#inWIDALDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

		function insert_bil_ns1() {
		    Nama_tindakan = $('#inNamaNS1DEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborNS1DEWASA').val();
			ns1=$('#inNS1DEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_ns1_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						ns1:ns1,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						ns1=$('#inNS1DEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_troponin() {
		    Nama_tindakan = $('#inNamaTROPONINDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborTROPONINDEWASA').val();
			troponin=$('#inTROPONINDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_troponin_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						troponin:troponin,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						troponin=$('#inTROPONINDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

		function insert_bil_dengue() {
		    Nama_tindakan = $('#inNamaDENGUEDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborDENGUEDEWASA').val();
			dengue=$('#inDENGUEDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_dengue_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						dengue:dengue,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						dengue=$('#inDENGUEDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_salmonella() {
		    Nama_tindakan = $('#inNamaSALMONELLADEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborSALMONELLADEWASA').val();
			salmonella=$('#inSALMONELLADEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_salmonella_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						salmonella:salmonella,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						salmonella=$('#inSALMONELLADEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
	function insert_bil_hbsag() {
		    Nama_tindakan = $('#inNamaHBSAGDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborHBSAGDEWASA').val();
			hbsag=$('#inHBSAGDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_hbsag_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						hbsag:hbsag,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hbsag=$('#inHBSAGDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

		function insert_bil_hbsab() {
		    Nama_tindakan = $('#inNamaHBSABDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborHBSABDEWASA').val();
			hbsab=$('#inHBSABDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_hbsab_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						hbsab:hbsab,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hbsab=$('#inHBSABDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

	function insert_bil_b20() {
		    Nama_tindakan = $('#inNamaB20DEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborB20DEWASA').val();
			b20=$('#inB20DEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_b20_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						b20:b20,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						b20=$('#inB20DEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

		function insert_bil_vdrl() {
		    Nama_tindakan = $('#inNamaVDRLDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborVDRLDEWASA').val();
			VDRL=$('#inVDRLDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_VDSL_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						VDRL:VDRL,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						VDRL=$('#inVDRLDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_plano() {
		    Nama_tindakan = $('#inNamaPLANODEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborPLANODEWASA').val();
			planotes=$('#inPLANODEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_planotes_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						planotes:planotes,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						planotes=$('#inPLANODEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_samar() {
		    Nama_tindakan = $('#inNamaSAMARDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborSAMARDEWASA').val();
			darahsamar=$('#inSAMARDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_darah_samar_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						darahsamar:darahsamar,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						darahsamar=$('#inSAMARDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_ft4() {
		    Nama_tindakan = $('#inNamaFT4DEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborFT4DEWASA').val();
			ft4=$('#inFT4DEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_ft4_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						ft4:ft4,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						ft4=$('#inFT4DEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

		function insert_bil_sputumbtai() {
		    Nama_tindakan = $('#inNamaSPUTUMBTAIDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborSPUTUMBTAIDEWASA').val();
			sputum_bta_i=$('#inSPUTUMBTIDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_sputum_bta_i_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						sputum_bta_i:sputum_bta_i,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sputum_bta_i=$('#inSPUTUMBTIDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_sputumbtaii() {
		    Nama_tindakan = $('#inNamaSPUTUMBTAIIDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborSPUTUMBTAII').val();
			sputum_bta_ii=$('#inSPUTUMBTAIIDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_sputum_bta_ii_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						sputum_bta_ii:sputum_bta_ii,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sputum_bta_ii=$('#inSPUTUMBTAIIDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_sputumbtaiii() {
		    Nama_tindakan = $('#inNamaSPUTUMBTAIIIDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborSPUTUMBTAIIIDEWASA').val();
			sputum_bta_iii=$('#inSPUTUMBTAIIIDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_sputum_bta_iii_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						sputum_bta_iii:sputum_bta_iii,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sputum_bta_iii=$('#inSPUTUMBTAIIIDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_ptaptt() {
		    Nama_tindakan = $('#inNamaPTAPTTDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborPTAPTTDEWASA').val();
			pt=$('#inPTAPTTDEWASA').val();
			inr=$('#inINRPTAPTTDEWASA').val();
			aptt=$('#inAPTTPTAPTTDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_pt_aptt_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						pt:pt,
						inr:inr,
						aptt:aptt,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						pt=$('#inPTAPTTDEWASA').val("");
						inr=$('#inINRPTAPTTDEWASA').val("");
						aptt=$('#inAPTTPTAPTTDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_urine() {
		    Nama_tindakan = $('#inNamaURINEDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborURINEDEWASA').val();
			makro_warna=$('#inWARNADEWASA').val();
			makro_jernih=$('#inKEJERNIHANDEWASA').val();
			mikro_eritrosit=$('#inERITROSITURINEDEWASA').val();
			mikro_leukosit=$('#inLEUKOSITURINEDEWASA').val();
			mikro_sel_epitel=$('#inSELDEWASA').val();
			mikro_silinder=$('#inSILINDERDEWASA').val();
			mikro_kristal=$('#inKRISTALDEWASA').val();
			mikro_bakteri=$('#inBAKTERIDEWASA').val();
			mikro_jamur=$('#inJAMURDEWASA').val();
			kimia_eritrosit=$('#inERITROSITKIMIADEWASA').val();
			kimia_glukosa=$('#inGLUKOSADEWASA').val();
			kimia_protein=$('#inPROTEINKIMIADEWASA').val();
			kimia_bilirubin=$('#inBILIRUBINDEWASA').val();
			kimia_urobilinogen=$('#inUROBILINOGENDEWASA').val();
			kimia_ph=$('#inPHKIMIADEWASA').val();
			kimia_berat_jenis=$('#inBERATDEWASA').val();
			kimia_keton=$('#inKETONDEWASA').val();
			kimia_nitrit=$('#inNITRITDEWASA').val();
			kimia_leukosit=$('#inLEUKOSITKIMIADEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_urine_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						makro_jernih:makro_jernih,
						makro_warna:makro_warna,
						mikro_eritrosit:mikro_eritrosit,
						mikro_leukosit:mikro_leukosit,
						mikro_sel_epitel:mikro_sel_epitel,
						mikro_silinder:mikro_silinder,
						mikro_kristal:mikro_kristal,
						mikro_bakteri:mikro_bakteri,
						mikro_jamur:mikro_jamur,
						kimia_eritrosit:kimia_eritrosit,
						kimia_glukosa:kimia_glukosa,
						kimia_protein:kimia_protein,
						kimia_bilirubin:kimia_bilirubin,
						kimia_urobilinogen:kimia_urobilinogen,
						kimia_ph:kimia_ph,
						kimia_berat_jenis:kimia_berat_jenis,
						kimia_keton:kimia_keton,
						kimia_nitrit:kimia_nitrit,
						kimia_leukosit:kimia_leukosit,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						makro_warna=$('#inWARNADEWASA').val("");
						makro_jernih=$('#inKEJERNIHANDEWASA').val("");
						mikro_eritrosit=$('#inERITROSITURINEDEWASA').val("");
						mikro_leukosit=$('#inLEUKOSITURINEDEWASA').val("");
						mikro_sel_epitel=$('#inSELDEWASA').val("");
						mikro_silinder=$('#inSILINDERDEWASA').val("");
						mikro_kristal=$('#inKRISTALDEWASA').val("");
						mikro_bakteri=$('#inBAKTERIDEWASA').val("");
						mikro_jamur=$('#inJAMURDEWASA').val("");
						kimia_eritrosit=$('#inERITROSITKIMIADEWASA').val("");
						kimia_glukosa=$('#inGLUKOSADEWASA').val("");
						kimia_protein=$('#inPROTEINKIMIADEWASA').val("");
						kimia_bilirubin=$('#inBILIRUBINDEWASA').val("");
						kimia_urobilinogen=$('#inUROBILINOGENDEWASA').val("");
						kimia_ph=$('#inPHKIMIADEWASA').val("");
						kimia_berat_jenis=$('#inBERATDEWASA').val("");
						kimia_keton=$('#inKETONDEWASA').val("");
						kimia_nitrit=$('#inNITRITDEWASA').val("");
						kimia_leukosit=$('#inLEUKOSITKIMIADEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_feses() {
		    Nama_tindakan = $('#inNamaFESESDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborFESESDEWASA').val();
			makro_darah=$('#inDARAHFESESDEWASA').val();
			makro_lendir=$('#inLENDIRDEWASA').val();
			makro_bau=$('#inBAUDEWASA').val();
			makro_konsistensi=$('#inKONSISTENSIDEWASA').val();
			makro_warna=$('#inWARNAFESESDEWASA').val();
			makro_parasit=$('#inPARASITDEWASA').val();
			mikro_leukosit=$('#inLEUKOSITFESESDEWASA').val();
			mikro_eritrosit=$('#inERITROSITFESESDEWASA').val();
			mikro_sel_epitel=$('#inSELFESESDEWASA').val();
			mikro_silinder=$('#inSILIDERDEWASA').val();
			mikro_telur_cacing=$('#inTELURDEWASA').val();
			mikro_amoeba=$('#inAMOEBADEWASA').val();
			mikro_bakteri=$('#inBAKTERIFESESDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_feses_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						makro_darah:makro_darah,
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
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						makro_darah=$('#inDARAHFESESDEWASA').val("");
						makro_lendir=$('#inLENDIRDEWASA').val("");
						makro_bau=$('#inBAUDEWASA').val("");
						makro_konsistensi=$('#inKONSISTENSIDEWASA').val("");
						makro_warna=$('#inWARNAFESESDEWASA').val("");
						makro_parasit=$('#inPARASITDEWASA').val("");
						mikro_leukosit=$('#inLEUKOSITFESESDEWASA').val("");
						mikro_eritrosit=$('#inERITROSITFESESDEWASA').val("");
						mikro_sel_epitel=$('#inSELFESESDEWASA').val("");
						mikro_silinder=$('#inSILIDERDEWASA').val("");
						mikro_telur_cacing=$('#inTELURDEWASA').val("");
						mikro_amoeba=$('#inAMOEBADEWASA').val("");
						mikro_bakteri=$('#inBAKTERIFESESDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_agd() {
		    Nama_tindakan = $('#inNamaAGDDEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborAGDDEWASA').val();
			ph=$('#inPHDEWASA').val();
			pco2=$('#inPCO2DEWASA').val();
			po2=$('#inPO2DEWASA').val();
			hco3=$('#inHCO3DEWASA').val();
			be=$('#inBEDEWASA').val();
			so2=$('#inSO2DEWASA').val();
			suhu=$('#inSUHUDEWASA').val();
			oksigen=$('#inOKSIGENDEWASA').val();
			saturasi=$('#inSATURASIDEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_agd_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						ph:ph,
						pco2:pco2,
						po2:po2,
						hco3:hco3,
						be:be,
						so2:so2,
						suhu:suhu,
						oksigen:oksigen,
						saturasi:saturasi,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						ph=$('#inPHDEWASA').val("");
						pco2=$('#inPCO2DEWASA').val("");
						po2=$('#inPO2DEWASA').val("");
						hco3=$('#inHCO3DEWASA').val("");
						be=$('#inBEDEWASA').val("");
						so2=$('#inSO2DEWASA').val("");
						suhu=$('#inSUHUDEWASA').val("");
						oksigen=$('#inOKSIGENDEWASA').val("");
						saturasi=$('#inSATURASIDEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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
		function insert_bil_sperma() {
		    Nama_tindakan = $('#inNamaSPERMADEWASA').val();
		    id_tindakan_labor = $('#id_tindakan_laborSPERMADEWASA').val();
			sperma=$('#inSPERMADEWASA').val();
			inJenisPasienDEWASA="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_sperma_dewasa",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						sperma:sperma,
						inJenisPasienDEWASA:inJenisPasienDEWASA,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sperma=$('#inSPERMADEWASA').val("");
						$('#tablelaborDEWASA').DataTable().ajax.reload();
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

        
		<script type="text/javascript">
                function pilihTindakan() {
                    a = $("#inTindakan").val();
                    splitDiag = a.split("|");

                    harga = parseFloat(splitDiag[1]);
                    $("#outBiayaTindakan").val(convertToRupiah(harga));
                    document.getElementById("inJumlah").value = "1";
                    document.getElementById("outTotal").value = convertToRupiah(harga);
                }

                function convertToRupiah(angka) {
                    var rupiah = '';
                    var angkarev = angka.toString().split('').reverse().join('');
                    for (var i = 0; i < angkarev.length; i++)
                        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
                }

                function hargaTotal() {
                    splitDiag = a.split("|");
                    harga = parseFloat(splitDiag[1]);
                    frek = parseFloat($("#inJumlah").val());
                    total = harga * frek;

                    $("#outTotal").val(convertToRupiah(total));
                }

				// Labor
				function insert_labor_DEWASA() { 
                    a = $("#inTindakanLabor_DEWASA").val();
                    splitDiag = a.split("|");
                    harga = parseFloat(splitDiag[1]);
                    frek = parseFloat($("#inJumlahLabor_DEWASA").val());
                    total = harga * frek;
                    id_pel_lab = $('#id_pel_lab_DEWASA').val();
                    id_list_tindakan = $('#id_daftar_tindakan').val();
                    nama = $('#nama').val();
					var ID =   Math.random().toString(36).substr(2, 16);

                    dataString = 'id=' + ID + '&harga=' + harga +
                        '&id_pel_lab=' + id_pel_lab + '&id_list_tindakan=' + splitDiag[0] +
                        '&frek=' + frek + '&total=' + total;
                    $.ajax({
                        url: "<?= base_url() . 'Labor/insert_labor' ?>",
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
								$('#outBiayaTindakanLabor_DEWASA').val('');
								$('#inJumlahLabor_DEWASA').val('');
								$('#outTotalLabor_DEWASA').val('');
								$('#tablelaborDEWASA').DataTable().ajax.reload();
                                $('#outTotalHargaDEWASA').DataTable().ajax.reload(); 
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

				function pilihTindakanLabor_DEWASA() {
                    a = $("#inTindakanLabor_DEWASA").val();
                    splitDiag = a.split("|");

                    harga = parseFloat(splitDiag[1]);
                    $("#outBiayaTindakanLabor_DEWASA").val(convertToRupiah(harga));
                    document.getElementById("inJumlahLabor_DEWASA").value = "1";
                    document.getElementById("outTotalLabor_DEWASA").value = convertToRupiah(harga);
                }

				
			function aksi_labor(id_pelayanan, id_history) {
				$.ajax({
					url: "<?= base_url().'Labor/get_labor'?>",
					data: {
						pelayanan: id_pelayanan,
						history: id_history
					},
					type: 'POST',
					dataType: 'json',
					success: function (data) {
						if (data.status_dt == "found") {
							$("#id_pel_lab").val(data.id_pelayanan);
							$("#modal_labor").modal('show');
							reload_data_labor_DEWASA(id_pelayanan);
							reload_total_labor_DEWASA(id_pelayanan);
						} else {
							alert("data tidak ditemukan");
						}
					}
				});    
            }

			function hapus_labor_DEWASA(id_tindakan_labor, id_pelayanan, nama) { 
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
										$('#tablelaborDEWASA').DataTable().ajax.reload();
                                        $('#outTotalHargaDEWASA').DataTable().ajax.reload();
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
