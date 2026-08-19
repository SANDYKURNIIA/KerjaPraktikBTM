<script>
     $(document).ready(function() {
        id_pelayanan = '<?=$identitas['id_mcu']?>';
       
        $.ajax({
            url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/get_data_pemeriksaan",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
                table: 'antropometri',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    // $('#antropometri').collapse('show');

                    $('input[name="irama"][value="' + data.irama + '"]').prop("checked", true);
                    $('input[name="isi_nadi"][value="' + data.isi_nadi + '"]').prop("checked", true);
                    $('input[name="irama_nafas"][value="' + data.irama_nafas + '"]').prop("checked", true);
                    $('input[name="tes_kebugaran"][value="' + data.tes_kebugaran + '"]').prop("checked", true);
                    $('input[name="kesimpulan_fit"][value="' + data.kesimpulan_fit + '"]').prop("checked", true);

                    $('#dokter_antropometri').html(data.dokter_periksa!=''?data.dokter_periksa:'PERAWAT GENERAL CHECK UP');
                    $('#berat_badan').val(data.berat_badan);
                    $('#tinggi_badan').val(data.tinggi_badan);
                    $('#lingkar_pinggang').val(data.lingkar_pinggang);
                    $('#lingkar_panggul').val(data.lingkar_panggul);
                    $('#imt').val(data.imt);
                    $('#rpp').val(data.rpp);
                    $('#suhu').val(data.suhu);
                    $('#nadi').val(data.nadi);
                    $('#pernapasan').val(data.pernapasan);
                    $('#sistol').val(data.sistol);
                    $('#diastol').val(data.diastol);
                    $('#nadi_1').val(data.nadi_1);
                    $('#nadi_2').val(data.nadi_2);
                    $('#nadi_3').val(data.nadi_3);
                    $('#skor_step').val(data.skor_step);
                    $('#menit_tes_bugar').val(data.menit_tes_bugar);
                    $('#detik_tes_bugar').val(data.detik_tes_bugar);
                    $('#nadi_tes_bugar').val(data.nadi_tes_bugar);
                    $('#vo2max').val(data.vo2max);
                    // Tekanan Systolic Lengan (AP)
                    $('#ap_kanan').val(data.ap_kanan);
                    $('#ap_kiri').val(data.ap_kiri);

                    // Tekanan Systolic Dorsalic Padis (DP)
                    $('#dp_kanan').val(data.dp_kanan);
                    $('#dp_kiri').val(data.dp_kiri);

                    // Tekanan Systolic Tibiolis Posterior (TP)
                    $('#tp_kanan').val(data.tp_kanan);
                    $('#tp_kiri').val(data.tp_kiri);

                    // Skor Angkle
                    $('#skor_angkle_kanan').val(data.skor_angkle_kanan);
                    $('#skor_angkle_kiri').val(data.skor_angkle_kiri);

                    // Kesimpulan Radio Button
                    $('input[name="kesimpulan"][value="' + data.kesimpulan + '"]').prop("checked", true);

                    // Kesimpulan Umum Textarea
                    $('#kesimpulan_umum').val(data.kesimpulan_umum);
                }
            }

        });
    });
</script>