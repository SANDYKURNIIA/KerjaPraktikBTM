
<script type="text/javascript">

function reload_data_labor_ANAK(id_pelayanan) {    
	var a = document.getElementById('cetak_semua_anak'); 
	a.href = "labor_ANAK_All_print/" + id_pelayanan

    $('#tablelaborANAK').dataTable().fnClearTable();
    $('#tablelaborANAK').dataTable().fnDestroy();
    $('#tablelaborANAK').DataTable({
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
            "url": '<?php echo base_url('Labor/tampil_all_labor_anak_sendiri'); ?>',
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

function reload_total_labor_ANAK(id_pelayanan) {
    $('#outTotalHargaANAK').dataTable().fnClearTable();
    $('#outTotalHargaANAK').dataTable().fnDestroy();
    $('#outTotalHargaANAK').DataTable({
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

// END

</script>

<script type="text/javascript">
function aksi_labor_anak(id_tindakan_labor,id_pelayanan){
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
							$("#inNamaDARAHANAK").val(data.nama);
							$('#isiDARAHANAK').collapse('toggle');
							
							$('.data_mchc').addClass('collapse');
							$('#inTipeMasukMCHCANAK').change(function() {
								var selector = '.data_mchc_' + $(this).val();
								$('.data_mchc').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_mch').addClass('collapse');
							$('#inTipeMasukMCHANAK').change(function() {
								var selector = '.data_mch_' + $(this).val();
								$('.data_mch').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_mcv').addClass('collapse');
							$('#inTipeMasukMCVANAK').change(function() {
								var selector = '.data_mcv_' + $(this).val();
								$('.data_mcv').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_hema').addClass('collapse');
							$('#inTipeMasukHEMATOKRITANAK').change(function() {
								var selector = '.data_hema_' + $(this).val();
								$('.data_hema').collapse('hide');
								$(selector).collapse('show');
							});

							$('.data_hide').addClass('collapse');
							$('#inTipeMasukHBANAK').change(function() {
								var selector = '.data_hide_' + $(this).val();
								$('.data_hide').collapse('hide');
								$(selector).collapse('show');
							});
							$('#isiAGDANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiTRIGLYSERIDE').collapse('hide');
							$('#isiHDL').collapse('hide');
							$("#id_tindakan_laborDARAHANAK").val(data.id_tindakan_labor);
							$("#Harga_darah_rutin_anak").val(data.harga);
							$("#Frek_darah_rutin_anak").val(data.frek);
							$("#id_pelayanan_darah_rutin_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_darah_rutin_anak").val(data.id_list_tindakan);
							$("#total_darah_rutin_anak").val(data.total);
							$("#tanggal_darah_rutin_anak").val(data.tanggal);
							$("#id_staff_darah_rutin_anak").val(data.id_staff);
						}else if(data.nama == " GOL DARAH "){
							// GOL DARAH
							$("#inNamaGOLANAK").val(data.nama);
							$('#isiGOLANAK').collapse('toggle');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiHBA').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$("#id_tindakan_laborGOLANAK").val(data.id_tindakan_labor);
							$("#Harga_goldar_anak").val(data.harga);
							$("#Frek_goldar_anak").val(data.frek);
							$("#id_pelayanan_goldar_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_goldar_anak").val(data.id_list_tindakan);
							$("#total_goldar_anak").val(data.total);
							$("#tanggal_goldar_anak").val(data.tanggal);
							$("#id_staff_goldar_anak").val(data.id_staff);
						}else if(data.nama == " LED "){
							// LED
							$("#inNamaLEDANAK").val(data.nama);
							$('#isiLEDANAK').collapse('toggle');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$("#id_tindakan_laborLEDANAK").val(data.id_tindakan_labor);
						}else if(data.nama == "RHESUS"){
							// RHESUS
							$("#inNamaRHESUSANAK").val(data.nama);
							$('#isiRHESUSANAK').collapse('toggle');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$("#id_tindakan_laborRHESUSANAK").val(data.id_tindakan_labor);
							$("#Harga_rhesus_anak").val(data.harga);
							$("#Frek_rhesus_anak").val(data.frek);
							$("#id_pelayanan_rhesus_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_rhesus_anak").val(data.id_list_tindakan);
							$("#total_rhesus_anak").val(data.total);
							$("#tanggal_rhesus_anak").val(data.tanggal);
							$("#id_staff_rhesus_anak").val(data.id_staff);
						}else if(data.nama == "APTT"){
							// APTT
							$("#inNamaAPTTANAK").val(data.nama);
							$('#isiAPTTANAK').collapse('toggle');
							$('#isiBLTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborAPTTANAK").val(data.id_tindakan_labor);
							$("#Harga_aptt_anak").val(data.harga);
							$("#Frek_aptt_anak").val(data.frek);
							$("#id_pelayanan_aptt_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_aptt_anak").val(data.id_list_tindakan);
							$("#total_aptt_anak").val(data.total);
							$("#tanggal_aptt_anak").val(data.tanggal);
							$("#id_staff_aptt_anak").val(data.id_staff);
						}else if(data.nama == " GULA DARAH "){
							// GULA DARAH
							$("#inNamaGULDARAHANAK").val(data.nama);
							$('#isiGULDARAHANAK').collapse('toggle');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborGULDARAHANAK").val(data.id_tindakan_labor);
							$("#Harga_gula_darah_anak").val(data.harga);
							$("#Frek_gula_darah_anak").val(data.frek);
							$("#id_pelayanan_gula_darah_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_gula_darah_anak").val(data.id_list_tindakan);
							$("#total_gula_darah_anak").val(data.total);
							$("#tanggal_gula_darah_anak").val(data.tanggal);
							$("#id_staff_gula_darah_anak").val(data.id_staff);
						}else if(data.nama == "HBA 1 C (A 1 C)"){
							// HBA 1 C (A 1 C)
							$("#inNamaHBAANAK").val(data.nama);
							$('#isiHBAANAK').collapse('toggle');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborHBAANAK").val(data.id_tindakan_labor);
						}else if(data.nama == "CHO"){
							// CHO
							$("#inNamaANAKCHO").val(data.nama);
							$('#isiCHOANAK').collapse('toggle');
							$('#isiLDLANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$("#id_tindakan_laborCHOANAK").val(data.id_tindakan_labor);
						}else if(data.nama == "HDL"){
							// HDL
							$("#inNamaHDLANAK").val(data.nama);
							$('#isiHDLANAK').collapse('toggle');
							$('#isiLDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborHDLANAK").val(data.id_tindakan_labor);
						}else if(data.nama == "LDL"){
							// LDL
							$("#inNamaLDLANAK").val(data.nama);
							$('#isiLDLANAK').collapse('toggle');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborLDLANAK").val(data.id_tindakan_labor);
						}else if(data.nama == "UREUM"){
							// UREUM
							$("#inNamaUREUMANAK").val(data.nama);
							$('#isiUREUMANAK').collapse('toggle');
							$('#isiLDLANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborUREUMANAK").val(data.id_tindakan_labor);
							$("#Harga_ureum_anak").val(data.harga);
							$("#Frek_ureum_anak").val(data.frek);
							$("#id_pelayanan_ureum_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_ureum_anak").val(data.id_list_tindakan);
							$("#total_ureum_anak").val(data.total);
							$("#tanggal_ureum_anak").val(data.tanggal);
							$("#id_staff_ureum_anak").val(data.id_staff);
						}else if(data.nama == "CREATININ"){
							// CREATININ
							$("#inNamaCREATININANAK").val(data.nama);
							$('#isiCREATININANAK').collapse('toggle');
							$('.data_hide').addClass('collapse');
							$('#inTipeCREATININ').change(function() {
								var selector = '.data_hide_' + $(this).val();
								$('.data_hide').collapse('hide');
								$(selector).collapse('show');
							});
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$("#id_tindakan_laborCREATININANAK").val(data.id_tindakan_labor);
							$("#Harga_creatinin_anak").val(data.harga);
							$("#Frek_creatinin_anak").val(data.frek);
							$("#id_pelayanan_creatinin_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_creatinin_anak").val(data.id_list_tindakan);
							$("#total_creatinin_anak").val(data.total);
							$("#tanggal_creatinin_anak").val(data.tanggal);
							$("#id_staff_creatinin_anak").val(data.id_staff);
						}else if(data.nama == "SGOT"){
							// SGOT
							$("#inNamaSGOTANAK").val(data.nama);
							$('#isiSGOTANAK').collapse('toggle');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiALANAKP').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$("#id_tindakan_laborSGOTANAK").val(data.id_tindakan_labor);
							$("#Harga_sgot_anak").val(data.harga);
							$("#Frek_sgot_anak").val(data.frek);
							$("#id_pelayanan_sgot_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_sgot_anak").val(data.id_list_tindakan);
							$("#total_sgot_anak").val(data.total);
							$("#tanggal_sgot_anak").val(data.tanggal);
							$("#id_staff_sgot_anak").val(data.id_staff);
						}else if(data.nama == "SGPT"){
							// SGPT
							$("#inNamaSGPTANAK").val(data.nama);
							$('#isiSGPTANAK').collapse('toggle');
							$('#isiAGDANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborSGPTANAK").val(data.id_tindakan_labor);
							$("#Harga_sgpt_anak").val(data.harga);
							$("#Frek_sgpt_anak").val(data.frek);
							$("#id_pelayanan_sgpt_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_sgpt_anak").val(data.id_list_tindakan);
							$("#total_sgpt_anak").val(data.total);
							$("#tanggal_sgpt_anak").val(data.tanggal);
							$("#id_staff_sgpt_anak").val(data.id_staff);
						}else if(data.nama == "ELEKTROLIT "){
							// ELEKTROLIT
							$("#inNamaELEKTROLITANAK").val(data.nama);
							$('#isiELEKTROLITANAK').collapse('toggle');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');;
							$('#isiPTANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$("#id_tindakan_laborELEKTROLITANAK").val(data.id_tindakan_labor);
							$("#Harga_elektrolit_anak").val(data.harga);
							$("#Frek_elektrolit_anak").val(data.frek);
							$("#id_pelayanan_elektrolit_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_elektrolit_anak").val(data.id_list_tindakan);
							$("#total_elektrolit_anak").val(data.total);
							$("#tanggal_elektrolit_anak").val(data.tanggal);
							$("#id_staff_elektrolit_anak").val(data.id_staff);
						}else if(data.nama == " Sputum B T A I"){
							// SPUTUMBTAI
							$("#inNamaSPUTUMBTAIANAK").val(data.nama);
							$('#isiSPUTUMBTAIANAK').collapse('toggle');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborSPUTUMBTAIANAK").val(data.id_tindakan_labor);
							$("#Harga_sputumbtai_anak").val(data.harga);
							$("#Frek_sputumbtai_anak").val(data.frek);
							$("#id_pelayanan_sputumbtai_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_sputumbtai_anak").val(data.id_list_tindakan);
							$("#total_sputumbtai_anak").val(data.total);
							$("#tanggal_sputumbtai_anak").val(data.tanggal);
							$("#id_staff_sputumbtai_anak").val(data.id_staff);
						}else if(data.nama == " Sputum B T A II"){
							// SPUTUMBTAII
							$("#inNamaSPUTUMBTAIIANAK").val(data.nama);
							$('#isiSPUTUMBTAIIANAK').collapse('toggle');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$("#id_tindakan_laborSPUTUMBTAIIANAK").val(data.id_tindakan_labor);
							$("#Harga_sputumbtaii_anak").val(data.harga);
							$("#Frek_sputumbtaii_anak").val(data.frek);
							$("#id_pelayanan_sputumbtaii_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_sputumbtaii_anak").val(data.id_list_tindakan);
							$("#total_sputumbtaii_anak").val(data.total);
							$("#tanggal_sputumbtaii_anak").val(data.tanggal);
							$("#id_staff_sputumbtaii_anak").val(data.id_staff);
						}else if(data.nama == " Sputum B T A III"){
							// SPUTUMBTAIII
							$("#inNamaSPUTUMBTAIIIANAK").val(data.nama);
							$('#isiSPUTUMBTAIIIANAK').collapse('toggle');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborSPUTUMBTAIIIANAK").val(data.id_tindakan_labor);
							$("#Harga_sputumbtaiii_anak").val(data.harga);
							$("#Frek_sputumbtaiii_anak").val(data.frek);
							$("#id_pelayanan_sputumbtaiii_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_sputumbtaiii_anak").val(data.id_list_tindakan);
							$("#total_sputumbtaiii_anak").val(data.total);
							$("#tanggal_sputumbtaiii_anak").val(data.tanggal);
							$("#id_staff_sputumbtaiii_anak").val(data.id_staff);
						}else if(data.nama == " PROTEIN "){
							// PROTEIN
							$("#inNamaPROTEINANAK").val(data.nama);
							$('#isiPROTEINANAK').collapse('toggle');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborPROTEINANAK").val(data.id_tindakan_labor);
							$("#Harga_protein_anak").val(data.harga);
							$("#Frek_protein_anak").val(data.frek);
							$("#id_pelayanan_protein_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_gula_darah_anak").val(data.id_list_tindakan);
							$("#total_protein_anak").val(data.total);
							$("#tanggal_protein_anak").val(data.tanggal);
							$("#id_staff_protein_anak").val(data.id_staff);

						}else if(data.nama == " ALBUMIN "){
							// ALBUMIN
							$("#inNamaALBUMINANAK").val(data.nama);
							$('#isiALBUMINANAK').collapse('toggle');
							$('.data_hide').addClass('collapse');
							$('#inTipeMasukALBUMINANAK').change(function() {
								var selector = '.data_hide_' + $(this).val();
								$('.data_hide').collapse('hide');
								$(selector).collapse('show');
							});
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborALBUMINANAK").val(data.id_tindakan_labor);
							$("#Harga_albumin_anak").val(data.harga);
							$("#Frek_albumin_anak").val(data.frek);
							$("#id_pelayanan_albumin_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_albumin_anak").val(data.id_list_tindakan);
							$("#total_albumin_anak").val(data.total);
							$("#tanggal_albumin_anak").val(data.tanggal);
							$("#id_staff_albumin_anak").val(data.id_staff);

						}else if(data.nama == " MALARIA "){
							// MALARIA
							$("#inNamaMALARIAANAK").val(data.nama);
							$('#isiMALARIAANAK').collapse('toggle');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborMALARIAANAK").val(data.id_tindakan_labor);
							$("#Harga_malaria_anak").val(data.harga);
							$("#Frek_malaria_anak").val(data.frek);
							$("#id_pelayanan_malaria_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_malaria_anak").val(data.id_list_tindakan);
							$("#total_malaria_anak").val(data.total);
							$("#tanggal_malaria_anak").val(data.tanggal);
							$("#id_staff_malaria_anak").val(data.id_staff);
						}else if(data.nama == " WIDAL "){
							// WIDAL
							$("#inNamaWIDALANAK").val(data.nama);
							$('#isiWIDALANAK').collapse('toggle');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborWIDALANAK").val(data.id_tindakan_labor);
						}else if(data.nama == " TROPONIN "){
							// TROPONIN
							$("#inNamaTROPONINANAK").val(data.nama);
							$('#isiTROPONINANAK').collapse('toggle');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborTROPONINANAK").val(data.id_tindakan_labor);
						}else if(data.nama == " NS 1 "){
							// NS1
							$("#inNamaNS1ANAK").val(data.nama);
							$('#isiNS1ANAK').collapse('toggle');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborNS1ANAK").val(data.id_tindakan_labor);
							$("#Harga_ns1_anak").val(data.harga);
							$("#Frek_ns1_anak").val(data.frek);
							$("#id_pelayanan_ns1_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_ns1_anak").val(data.id_list_tindakan);
							$("#total_ns1_anak").val(data.total);
							$("#tanggal_ns1_anak").val(data.tanggal);
							$("#id_staff_ns1_anak").val(data.id_staff);
						}else if(data.nama == " HBSAG "){
							// HBSAG
							$("#inNamaHBSAGANAK").val(data.nama);
							$('#isiHBSAGANAK').collapse('toggle');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiBLTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborHBSAGANAK").val(data.id_tindakan_labor);
							$("#Harga_hbsag_anak").val(data.harga);
							$("#Frek_hbsag_anak").val(data.frek);
							$("#id_pelayanan_hbsag_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_hbsag_anak").val(data.id_list_tindakan);
							$("#total_hbsag_anak").val(data.total);
							$("#tanggal_hbsag_anak").val(data.tanggal);
							$("#id_staff_hbsag_anak").val(data.id_staff);
						}else if(data.nama == " HBSAB "){
							// HBSAB
							$("#inNamaHBSABANAK").val(data.nama);
							$('#isiHBSABANAK').collapse('toggle');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborHBSABANAK").val(data.id_tindakan_labor);
							$("#Harga_hbsab_anak").val(data.harga);
							$("#Frek_hbsab_anak").val(data.frek);
							$("#id_pelayanan_hbsab_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_hbsab_anak").val(data.id_list_tindakan);
							$("#total_hbsab_anak").val(data.total);
							$("#tanggal_hbsab_anak").val(data.tanggal);
							$("#id_staff_hbsab_anak").val(data.id_staff);
						}else if(data.nama == "B20"){
							// B20
							$("#inNamaB20ANAK").val(data.nama);
							$('#isiB20ANAK').collapse('toggle');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborB20ANAK").val(data.id_tindakan_labor);
							$("#Harga_b20_anak").val(data.harga);
							$("#Frek_b20_anak").val(data.frek);
							$("#id_pelayanan_b20_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_b20_anak").val(data.id_list_tindakan);
							$("#total_b20_anak").val(data.total);
							$("#tanggal_b20_anak").val(data.tanggal);
							$("#id_staff_b20_anak").val(data.id_staff);
						}else if(data.nama == " VDRL "){
							// VDRL
							$("#inNamaVDRLANAK").val(data.nama);
							$('#isiVDRLANAK').collapse('toggle');
							$('#isiB20ANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborVDRLANAK").val(data.id_tindakan_labor);
							$("#Harga_vdrl_anak").val(data.harga);
							$("#Frek_vdrl_anak").val(data.frek);
							$("#id_pelayanan_vdrl_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_vdrl_anak").val(data.id_list_tindakan);
							$("#total_vdrl_anak").val(data.total);
							$("#tanggal_vdrl_anak").val(data.tanggal);
							$("#id_staff_vdrl_anak").val(data.id_staff);
						}else if(data.nama == "Darah Samar"){
							// DARAH SAMAR
							$("#inNamaSAMARANAK").val(data.nama);
							$('#isiSAMARANAK').collapse('toggle');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborSAMARANAK").val(data.id_tindakan_labor);
							$("#Harga_samar_anak").val(data.harga);
							$("#Frek_samar_anak").val(data.frek);
							$("#id_pelayanan_samar_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_samar_anak").val(data.id_list_tindakan);
							$("#total_samar_anak").val(data.total);
							$("#tanggal_samar_anak").val(data.tanggal);
							$("#id_staff_samar_anak").val(data.id_staff);
						}else if(data.nama == " SALMONELLA "){
							// SALMONELLA
							$("#inNamaSALMONELLAANAK").val(data.nama);
							$('#isiSALMONELLAANAK').collapse('toggle');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborSALMONELLAANAK").val(data.id_tindakan_labor);
							$("#Harga_salmonella_anak").val(data.harga);
							$("#Frek_salmonella_anak").val(data.frek);
							$("#id_pelayanan_salmonella_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_salmonella_anak").val(data.id_list_tindakan);
							$("#total_salmonella_anak").val(data.total);
							$("#tanggal_salmonella_anak").val(data.tanggal);
							$("#id_staff_salmonella_anak").val(data.id_staff);
						}else if(data.nama == "AGD"){
							// AGD
							$("#inNamaAGDANAK").val(data.nama);
							$('#isiAGDANAK').collapse('toggle');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborAGDANAK").val(data.id_tindakan_labor);
						}else if(data.nama == " URINE "){
							// URINE
							$("#inNamaURINEANAK").val(data.nama);
							$('#isiURINEANAK').collapse('toggle');
							$('#isiAGDANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborAGDANAK").val(data.id_tindakan_labor);
						}else if(data.nama == "ANALISA SPERMA"){
							// ANALISA SPERMA
							$("#inNamaSPERMAANAK").val(data.nama);
							$('#isiSPERMAANAK').collapse('toggle');
							$('#isiURINEANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborSPERMAANAK").val(data.id_tindakan_labor);
						}else if(data.nama == " FEACES "){
							// FEACES
							$("#inNamaFESESANAK").val(data.nama);
							$('#isiFESESANAK').collapse('toggle');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborFESESANAK").val(data.id_tindakan_labor);
						}else if(data.nama == "CRP"){
							// CRP
							$("#inNamaCRPANAK").val(data.nama);
							$('#isiCRPANAK').collapse('toggle');
							$('#isiFESESANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborCRPANAK").val(data.id_tindakan_labor);
							$("#Harga_crp_anak").val(data.harga);
							$("#Frek_crp_anak").val(data.frek);
							$("#id_pelayanan_crp_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_crp_anak").val(data.id_list_tindakan);
							$("#total_crp_anak").val(data.total);
							$("#tanggal_crp_anak").val(data.tanggal);
							$("#id_staff_crp_anak").val(data.id_staff);
						}else if(data.nama == "PT"){
							// PT
							$("#inNamaPTANAK").val(data.nama);
							$('#isiPTANAK').collapse('toggle');
							$('#isiCRPANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborPTANAK").val(data.id_tindakan_labor);
							$("#Harga_pt_anak").val(data.harga);
							$("#Frek_pt_anak").val(data.frek);
							$("#id_pelayanan_pt_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_pt_anak").val(data.id_list_tindakan);
							$("#total_pt_anak").val(data.total);
							$("#tanggal_pt_anak").val(data.tanggal);
							$("#id_staff_pt_anak").val(data.id_staff);
						}else if(data.nama == "PT/APTT"){
							// PT/APTT
							$("#inNamaPTAPTTANAK").val(data.nama);
							$('#isiPTAPTTANAK').collapse('toggle');
							$('#isiPTANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiDENGUEANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborPTAPTTANAK").val(data.id_tindakan_labor);
							$("#Harga_ptaptt_anak").val(data.harga);
							$("#Frek_ptaptt_anak").val(data.frek);
							$("#id_pelayanan_ptaptt_anak").val(data.id_pelayanan);
							$("#id_list_tindakan_ptaptt_anak").val(data.id_list_tindakan);
							$("#total_ptaptt_anak").val(data.total);
							$("#tanggal_ptaptt_anak").val(data.tanggal);
							$("#id_staff_ptaptt_anak").val(data.id_staff);	
						}else if(data.nama == "DENGUE"){
							// DENGUE
							$("#inNamaDENGUEANAK").val(data.nama);
							$('#isiDENGUEANAK').collapse('toggle');
							$('#isiPTAPTTANAK').collapse('hide');
							$('#isiPTANAK').collapse('hide');
							$('#isiCRPANAK').collapse('hide');
							$('#isiFESESANAK').collapse('hide');
							$('#isiSPERMAANAK').collapse('hide');
							$('#isiURINEANAK').collapse('hide');
							$('#isiAGDANAK').collapse('hide');
							$('#isiSALMONELLAANAK').collapse('hide');
							$('#isiSAMARANAK').collapse('hide');
							$('#isiPLANOANAK').collapse('hide');
							$('#isiVDRLANAK').collapse('hide');
							$('#isiB20ANAK').collapse('hide');
							$('#isiHBSABANAK').collapse('hide');
							$('#isiHBSAGANAK').collapse('hide');
							$('#isiNS1ANAK').collapse('hide');
							$('#isiTROPONINANAK').collapse('hide');
							$('#isiWIDALANAK').collapse('hide');
							$('#isiMALARIAANAK').collapse('hide');
							$('#isiGLOBULINANAK').collapse('hide');
							$('#isiALBUMINANAK').collapse('hide');
							$('#isiPROTEINANAK').collapse('hide');
							$('#isiSPUTUMBTAIIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIIANAK').collapse('hide');
							$('#isiSPUTUMBTAIANAK').collapse('hide');
							$('#isiELEKTROLITANAK').collapse('hide');
							$('#isiSGOTANAK').collapse('hide');
							$('#isiSGPTANAK').collapse('hide');
							$('#isiCREATININANAK').collapse('hide');
							$('#isiUREUMANAK').collapse('hide');
							$('#isiLDLANAK').collapse('hide');
							$('#isiHDLANAK').collapse('hide');
							$('#isiCHOANAK').collapse('hide');
							$('#isiHBAANAK').collapse('hide');
							$('#isiGULDARAHANAK').collapse('hide');
							$('#isiAPTTANAK').collapse('hide');
							$('#isiRHESUSANAK').collapse('hide');
							$('#isiLEDANAK').collapse('hide');
							$('#isiGOL-DARAHANAK').collapse('hide');
							$('#isiDARAHANAK').collapse('hide');
							$("#id_tindakan_laborDENGUEANAK").val(data.id_tindakan_labor);	
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


			// keyUp PROTEIN 
			$('#inPROTEINGLOBULINANAK').keyup(function() {
				$('#notifinPROTEINGLOBULINANAK').html('');
				a = $('#inPROTEINGLOBULINANAK').val();
				if (a == "") {
					html = '<b style="color:red">Field tidak boleh kosong</b>';
					$('#notifinPROTEINGLOBULINANAK').html(html);
				}else if( a >= 6.4 && a <= 8.3){
					html = '<b style="color:blue">PROTEIN NORMAL</b>';
					$('#notifinPROTEINGLOBULINANAK').html(html);
				}else{
					html = '<b style="color:red">PROTEIN TIDAK NORMAL</b>';
					$('#notifinPROTEINGLOBULINANAK').html(html);
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
        }

    </script>

<!-- END ANAK -->

	 <script>
	    function convertToRupiah(angka) {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            	for (var i = 0; i < angkarev.length; i++)
                        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
            	return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
        }
	 </script>
	 <script type="text/javascript">
	 	 function insert_anak_darah() {
		    Nama_tindakan = $('#inNamaDARAHANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborDARAHANAK').val();
			hb115=$('#inHB115ANAK').val();
			hb153=$('#inHB153ANAK').val();
			hb316=$('#inHB316ANAK').val();
			hematokrit13=$('#inHEMATOKRIT13ANAK').val();
			hematokrit35=$('#inHEMATOKRIT35ANAK').val();
			hematokrit510=$('#inHEMATOKRIT510ANAK').val();
			hematokrit1016=$('#inHEMATOKRIT1016ANAK').val();
			mcv115=$('#inMCV115ANAK').val();
			mcv153=$('#inMCV153ANAK').val();
			mcv35=$('#inMCV35ANAK').val();
			mcv510=$('#inMCV510ANAK').val();
			mcv10=$('#inMCV10ANAK').val();
			mch15=$('#inMCH15ANAK').val();
			mch510=$('#inMCH510ANAK').val();
			mch10=$('#inMCH10ANAK').val();
			mchc115=$('#inMCHC115ANAK').val();
			mchc153=$('#inMCHC153ANAK').val();
			mchc310=$('#inMCHC310ANAK').val();
			mchc10=$('#inMCHC10ANAK').val();
			leukosit=$('#inLEUKOSITANAK').val();
			trombosit=$('#inTROMBOSITANAK').val();
			eritrosit=$('#inERITROSITANAK').val();
			led=$('#inLEDANAK').val();
			rdw_cv=$('#inRDW_CVANAK').val();
			rdw_sd=$('#inRDW_SDANAK').val();
			blt=$('#inBLTANAK').val();
			clt=$('#inCLTANAK').val();
			bas=$('#inBASANAK').val();
			mono=$('#inMONOANAK').val();
			eos=$('#inEOSANAK').val();
			segmen=$('#inSEGMENANAK').val();
			lympo=$('#inLYMPOANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_darah_rutin_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						hb115: hb115,
						hb153: hb153,
						hb316: hb316,
						hematokrit13: hematokrit13,
						hematokrit35: hematokrit35,
						hematokrit510: hematokrit510,
						hematokrit1016: hematokrit1016,
						mcv115: mcv115,
						mcv153: mcv153,
						mcv35: mcv35,
						mcv510: mcv510,
						mcv10: mcv10,
						mch15: mch15,
						mch510: mch510,
						mch10: mch10,
						mchc115: mchc115,
						mchc153: mchc153,
						mchc310: mchc310,
						mchc10: mchc10,
						leukosit: leukosit,
						trombosit: trombosit,
						eritrosit: eritrosit,
						led: led,
						rdw_cv: rdw_cv,
						rdw_sd: rdw_sd,
						blt: blt,
						clt: clt,
						bas: bas,
						mono: mono,
						eos: eos,
						segmen: segmen,
						lympo: lympo,		
						inJenisPasienANAK:inJenisPasienANAK,				
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hb115=$('#inHB115ANAK').val("");
						hb153=$('#inHB153ANAK').val("");
						hb316=$('#inHB316ANAK').val("");
						hematokrit13=$('#inHEMATOKRIT13ANAK').val("");
						hematokrit35=$('#inHEMATOKRIT35ANAK').val("");
						hematokrit510=$('#inHEMATOKRIT510ANAK').val("");
						hematokrit1016=$('#inHEMATOKRIT1016ANAK').val("");
						mcv115=$('#inMCV115ANAK').val("");
						mcv153=$('#inMCV153ANAK').val("");
						mcv35=$('#inMCV35ANAK').val("");
						mcv510=$('#inMCV510ANAK').val("");
						mcv10=$('#inMCV10ANAK').val("");
						mch15=$('#inMCH15ANAK').val("");
						mch510=$('#inMCH510ANAK').val("");
						mch10=$('#inMCH10ANAK').val("");
						mchc115=$('#inMCHC115ANAK').val("");
						mchc153=$('#inMCHC153ANAK').val("");
						mchc310=$('#inMCHC310ANAK').val("");
						mchc10=$('#inMCHC10ANAK').val("");
						leukosit=$('#inLEUKOSITANAK').val("");
						trombosit=$('#inTROMBOSITANAK').val("");
						eritrosit=$('#inERITROSITANAK').val("");
						led=$('#inLEDANAK').val("");
						rdw_cv=$('#inRDW_CVANAK').val("");
						rdw_sd=$('#inRDW_SDANAK').val("");
						blt=$('#inBLTANAK').val("");
						clt=$('#inCLTANAK').val("");
						bas=$('#inBASANAK').val("");
						mono=$('#inMONOANAK').val("");
						eos=$('#inEOSANAK').val("");
						segmen=$('#inSEGMENANAK').val("");
						lympo=$('#inLYMPOANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_pt() {
		    Nama_tindakan = $('#inNamaPTANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborPTANAK').val();
			pt=$('#inPTANAK').val();
			inr=$('#inINRANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_pt_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						pt: pt,	
						inr: inr,	
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						pt=$('#inPTANAK').val("");
						inr=$('#inINRANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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


	 	 function insert_anak_ptaptt() {
		    Nama_tindakan = $('#inNamaPTAPTTANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborPTAPTTANAK').val();
			pt=$('#inPTAPTTANAK').val();
			inr=$('#inINRPTAPTTANAK').val();
			aptt=$('#inAPTTPTAPTTANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_ptaptt_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						pt: pt,
						inr: inr,
						aptt: aptt,		
						inJenisPasienANAK:inJenisPasienANAK,			
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						pt=$('#inPTAPTTANAK').val("");
						inr=$('#inINRPTAPTTANAK').val("");
						aptt=$('#inAPTTPTAPTTANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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


	 	 function insert_anak_aptt() {
		    Nama_tindakan = $('#inNamaAPTTANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborAPTTANAK').val();
			aptt=$('#inAPTTANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_aptt_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						aptt: aptt,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						aptt=$('#inAPTTANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

	 function insert_anak_guldarah() {
		    Nama_tindakan = $('#inNamaGULDARAHANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborGULDARAHANAK').val();
			puasa=$('#inPUASAANAK').val();
			jampp=$('#in2JAMPPANAK').val();
			sewaktu=$('#inSEWAKTUANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_gula_darah_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						puasa: puasa,
						jampp: jampp,
						sewaktu: sewaktu,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						puasa=$('#inPUASAANAK').val("");
						jampp=$('#in2JAMPPANAK').val("");
						sewaktu=$('#inSEWAKTUANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_ureum() {
		    Nama_tindakan = $('#inNamaUREUMANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborUREUMANAK').val();
			ureum=$('#inUREUMANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_ureum_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						ureum: ureum,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						ureum=$('#inUREUMANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_creatinin() {
		    Nama_tindakan = $('#inNamaCREATININANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborCREATININANAK').val();
			creatinin1115=$('#inCREATININ115ANAK').val();
			creatinin1518=$('#inCREATININ1518ANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_creatinin_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						creatinin1115: creatinin1115,
						creatinin1518: creatinin1518,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						creatinin1115=$('#inCREATININ115ANAK').val("");
						creatinin1518=$('#inCREATININ1518ANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_protein() {
		    Nama_tindakan = $('#inNamaPROTEINANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborPROTEINANAK').val();
			protein=$('#inPROTEINANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_protein_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						protein: protein,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						protein=$('#inPROTEINANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_albumin() {
		    Nama_tindakan = $('#inNamaALBUMINANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborALBUMINANAK').val();
			albumin414=$('#inALBUMIN414ANAK').val();
			albumin1418=$('#inALBUMIN1418ANAK').val();
			albumin1860=$('#inALBUMIN1860ANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_albumin_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						albumin414: albumin414,
						albumin1418: albumin1418,
						albumin1860: albumin1860,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						albumin414=$('#inALBUMIN414ANAK').val("");
						albumin1418=$('#inALBUMIN1418ANAK').val("");
						albumin1860=$('#inALBUMIN1860ANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_sgpt() {
		    Nama_tindakan = $('#inNamaSGPTANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborSGPTANAK').val();
			sgpt=$('#inSGPTANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_sgpt_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						sgpt: sgpt,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sgpt=$('#inSGPTANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_sgot() {
		    Nama_tindakan = $('#inNamaSGOTANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborSGOTANAK').val();
			sgot=$('#inSGOTANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_sgot_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						sgot: sgot,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sgot=$('#inSGOTANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_sgpt() {
		    Nama_tindakan = $('#inNamaSGPTANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborSGPTANAK').val();
			sgpt=$('#inSGPTANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_sgpt_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						sgpt: sgpt,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sgpt=$('#inSGPTANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_crp() {
		    Nama_tindakan = $('#inNamaCRPANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborCRPANAK').val();
			crp=$('#inCRPANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_crp_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						crp: crp,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						crp=$('#inCRPANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_malaria() {
		    Nama_tindakan = $('#inNamaMALARIAANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborMALARIAANAK').val();
			malaria=$('#inMALARIAANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_malaria_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						malaria: malaria,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						malaria=$('#inMALARIAANAK').val("")
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_ns1() {
		    Nama_tindakan = $('#inNamaNS1ANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborNS1ANAK').val();
			ns1=$('#inNS1ANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_ns1_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						ns1: ns1,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						ns1=$('#inNS1ANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_salmonella() {
		    Nama_tindakan = $('#inNamaSALMONELLAANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborSALMONELLAANAK').val();
			salmonella=$('#inSALMONELLAANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_salmonella_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						salmonella: salmonella,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						salmonella=$('#inSALMONELLAANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_hbsag() {
		    Nama_tindakan = $('#inNamaHBSAGANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborHBSAGANAK').val();
			hbsag=$('#inHBSAGANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_hbsag_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						hbsag: hbsag,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hbsag=$('#inHBSAGANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_hbsab() {
		    Nama_tindakan = $('#inNamaHBSABANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborHBSABANAK').val();
			hbsab=$('#inHBSABANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_hbsab_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						hbsab: hbsab,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						hbsab=$('#inHBSABANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_b20() {
		    Nama_tindakan = $('#inNamaB20ANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborB20ANAK').val();
			b20=$('#inB20ANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_b20_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						b20: b20,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						b20=$('#inB20ANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_vdrl() {
		    Nama_tindakan = $('#inNamaVDRLANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborVDRLANAK').val();
			vdrl=$('#inVDRLANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_vdrl_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						vdrl: vdrl,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						vdrl=$('#inVDRLANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_rhesus() {
		    Nama_tindakan = $('#inNamaRHESUSANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborRHESUSANAK').val();
			rhesus=$('#inRHESUSANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_rhesus_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						rhesus: rhesus,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						rhesus=$('#inRHESUSANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_samar() {
		    Nama_tindakan = $('#inNamaSAMARANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborSAMARANAK').val();
			darah_samar=$('#inSAMARANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_darah_samar_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						darah_samar: darah_samar,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						darah_samar=$('#inSAMARANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_elektrolit() {
		    Nama_tindakan = $('#inNamaELEKTROLITANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborELEKTROLITANAK').val();
			na=$('#inNAANAK').val();
			k=$('#inKANAK').val();
			cl=$('#inCLANAK').val();
			ca=$('#inCaANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_elektrolit_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						na: na,
						k: k,
						cl: cl,
						ca: ca,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						na=$('#inNAANAK').val("");
						k=$('#inKANAK').val("");
						cl=$('#inCLANAK').val("");
						ca=$('#inCaANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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
		    Nama_tindakan = $('#inNamaGOLANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborGOLANAK').val();
			gol_darah=$('#inGOLDARAHANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_goldar_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						gol_darah: gol_darah,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						gol_darah=$('#inGOLDARAHANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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
	function insert_anak_sputumbtai() {
		    Nama_tindakan = $('#inNamaSPUTUMBTAIANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborSPUTUMBTAIANAK').val();
			sputum_bta_i=$('#inSPUTUMBTIANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_sputumbtai_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						sputum_bta_i: sputum_bta_i,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sputum_bta_i=$('#inSPUTUMBTIANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

		function insert_anak_sputumbtaii() {
		    Nama_tindakan = $('#inNamaSPUTUMBTAIIANAK').val();
		    id_tindakan_labor = $('#id_tindakan_laborSPUTUMBTAIIANAK').val();
			sputum_bta_ii=$('#inSPUTUMBTAIIANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_sputumbtaii_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						sputum_bta_ii: sputum_bta_ii,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sputum_bta_ii=$('#inSPUTUMBTAIIANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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

	function insert_anak_sputumbtaiii() {
		    Nama_tindakan = $('#inNamaSPUTUMBTAIIIANAK').val();
			sputum_bta_iii=$('#inSPUTUMBTAIIIANAK').val();
			inJenisPasienANAK="LABOR";
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
						url : "<?php echo base_url() ?>Labor/insert_sputumbtaiii_anak",
						method: "POST",
						dataType: 'json',
						data : {
						id_tindakan_labor:id_tindakan_labor,
						sputum_bta_iii: sputum_bta_iii,
						inJenisPasienANAK:inJenisPasienANAK,
						},
						success: function(data){
						if(data.status=="success"){
						swal({   
							title: "good job!",   
							type: "success", 
							text: "Data Labor " +Nama_tindakan+ " Telah disimpan",
							confirmButtonColor: "#3cb878",  
						});
						sputum_bta_iii=$('#inSPUTUMBTAIIIANAK').val("");
						$('#tablelaborANAK').DataTable().ajax.reload();
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
				function insert_labor_ANAK() { 
                    a = $("#inTindakanLabor_ANAK").val();
                    splitDiag = a.split("|");
                    harga = parseFloat(splitDiag[1]);
                    frek = parseFloat($("#inJumlahLabor_ANAK").val());
                    total = harga * frek;
                    id_pel_lab = $('#id_pel_lab_ANAK').val();
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
								$('#outBiayaTindakanLabor_ANAK').val('');
								$('#inJumlahLabor_ANAK').val('');
								$('#outTotalLabor_ANAK').val('');
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
                }

				function pilihTindakanLabor_ANAK() {
                    a = $("#inTindakanLabor_ANAK").val();
                    splitDiag = a.split("|");

                    harga = parseFloat(splitDiag[1]);
                    $("#outBiayaTindakanLabor_ANAK").val(convertToRupiah(harga));
                    document.getElementById("inJumlahLabor_ANAK").value = "1";
                    document.getElementById("outTotalLabor_ANAK").value = convertToRupiah(harga);
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
							$("#id_pel_lab_ANAK").val(data.id_pelayanan);
							$("#modal_labor").modal('show');
							reload_data_labor_ANAK(id_pelayanan);
							reload_total_labor_ANAK(id_pelayanan);
						} else {
							alert("data tidak ditemukan");
						}
					}
				});    
            }

			function hapus_labor_ANAK(id_tindakan_labor, id_pelayanan, nama) { 
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