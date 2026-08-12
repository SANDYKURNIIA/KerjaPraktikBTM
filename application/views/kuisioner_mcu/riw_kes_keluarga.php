<<<<<<< HEAD
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h1 class="panel-title txt-dark"><strong>Riwayat Kesehatan Keluarga</strong></h1>
                </div>
                <div class="clearfix"></div>
                <hr>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <form id="formRiwayat">
                    <input type="hidden" id="id_mcu" name="id_mcu" value="<?= isset($id_mcu) ? $id_mcu : ''; ?>">
                        <div class="table-wrap">
                            <div class="form-wrap">
                                <div class="form-body">
                                    <table class="table table-bordered">
                                        <thead class="btn-success text-white">
                                            <tr>
                                                <th colspan="7" class="text-center bg-success">Riwayat Penyakit Keluarga</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Penyakit</th>
                                                <th class="text-center">Ayah</th>
                                                <th class="text-center">Ibu</th>
                                                <th class="text-center">Kakek</th>
                                                <th class="text-center">Nenek</th>
                                                <th class="text-center">Adik</th>
                                                <th class="text-center">Kakak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Stroke</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_stroke"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_stroke"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_stroke"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_stroke"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_stroke"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_stroke"></td>
                                            </tr>
                                            <tr>
                                                <td>Tekanan darah tinggi</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_hipertensi"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_hipertensi"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_hipertensi"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_hipertensi"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_hipertensi"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_hipertensi"></td>
                                            </tr>
                                            <tr>
                                                <td>Jantung</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_jantung"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_jantung"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_jantung"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_jantung"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_jantung"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_jantung"></td>
                                            </tr>
                                            <tr>
                                                <td>Asma</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_asma"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_asma"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_asma"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_asma"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_asma"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_asma"></td>
                                            </tr>
                                            <tr>
                                                <td>Kanker/Tumor</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_kanker"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_kanker"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_kanker"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_kanker"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_kanker"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_kanker"></td>
                                            </tr>
                                            <tr>
                                                <td>Kanker payudara</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_kanker_pd"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_kanker_pd"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_kanker_pd"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_kanker_pd"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_kanker_pd"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_kanker_pd"></td>
                                            </tr>
                                            <tr>
                                                <td>Kanker indung telur</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_kanker_it"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_kanker_it"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_kanker_it"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_kanker_it"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_kanker_it"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_kanker_it"></td>
                                            </tr>
                                            <tr>
                                                <td>Kanker Usus Besar/Rektum</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_kanker_ub"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_kanker_ub"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_kanker_ub"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_kanker_ub"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_kanker_ub"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_kanker_ub"></td>
                                            </tr>
                                            <tr>
                                                <td>Kencing Manis</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_kencing_manis"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_kencing_manis"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_kencing_manis"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_kencing_manis"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_kencing_manis"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_kencing_manis"></td>
                                            </tr>
                                            <tr>
                                                <td>Kolestrol darah tinggi</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_kolesterol"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_kolesterol"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_kolesterol"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_kolesterol"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_kolesterol"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_kolesterol"></td>
                                            </tr>
                                            <tr>
                                                <td>Asam Urat Tinggi</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_asam_urat"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_asam_urat"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_asam_urat"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_asam_urat"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_asam_urat"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_asam_urat"></td>
                                            </tr>
                                            <tr>
                                                <td>Kegemukan/Obesitas</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_obesitas"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_obesitas"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_obesitas"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_obesitas"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_obesitas"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_obesitas"></td>
                                            </tr>
                                            <tr>
                                                <td>Tuberkulosis/TBC</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_tbc"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_tbc"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_tbc"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_tbc"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_tbc"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_tbc"></td>
                                            </tr>
                                            <tr>
                                                <td>Katarak</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_katarak"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_katarak"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_katarak"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_katarak"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_katarak"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_katarak"></td>
                                            </tr>
                                            <tr>
                                                <td>Tekanan Bola Mata Tinggi</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_tekanan"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_tekanan"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_tekanan"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_tekanan"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_tekanan"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_tekanan"></td>
                                            </tr>
                                            <tr>
                                                <td>Osteoporosis/pengeroposan tulang</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_osteoporosis"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_osteoporosis"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_osteoporosis"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_osteoporosis"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_osteoporosis"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_osteoporosis"></td>
                                            </tr>
                                            <tr>
                                                <td>Alergi</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_alergi"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_alergi"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_alergi"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_alergi"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_alergi"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_alergi"></td>
                                            </tr>
                                            <tr>
                                                <td>Ayan/Epilepsi</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_epilepsi"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_epilepsi"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_epilepsi"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_epilepsi"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_epilepsi"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_epilepsi"></td>
                                            </tr>
                                            <tr>
                                                <td>Kecanduan Alkohol</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_alkoholisme"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_alkoholisme"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_alkoholisme"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_alkoholisme"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_alkoholisme"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_alkoholisme"></td>
                                            </tr>
                                            <tr>
                                                <td>Perdarahan</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_pendarahan"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_pendarahan"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_pendarahan"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_pendarahan"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_pendarahan"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_pendarahan"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" onclick="insertData()" class="btn btn-success">
                                     <i class="fa fa-save"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function insertData() {
        var id_mcu = $('#id_mcu').val();

        var penyakit_list = [
            'stroke', 'hipertensi', 'jantung', 'asma', 'kanker', 'kanker_pd', 
            'kanker_it', 'kanker_ub', 'kencing_manis', 'kolesterol', 'asam_urat', 
            'obesitas', 'tbc', 'katarak', 'tekanan', 'osteoporosis', 'alergi', 
            'epilepsi', 'alkoholisme', 'pendarahan'
        ];
        
        var anggota_list = ['ayah', 'ibu', 'kakek', 'nenek', 'adik', 'kakak'];
        var data_to_send = { id_mcu: id_mcu };

        penyakit_list.forEach(function(penyakit) {
            var keluarga_terkena = [];
            anggota_list.forEach(function(anggota) {
                var selector = 'input[name="' + anggota + '_' + penyakit + '"]:checked';
                if ($(selector).length > 0) {
                    keluarga_terkena.push(anggota);
                }
            });
            data_to_send[penyakit] = keluarga_terkena.join(',');
        });

        swal({
            title: "Simpan Data Riwayat?",
            text: "Pastikan semua data sudah terisi dengan benar.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Ya, Simpan!",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $.ajax({
                url: "<?= site_url('Quitioners/simpan_riwayat_keluarga/'); ?>" + id_mcu,
                method: "POST",
                dataType: 'json',
                data: data_to_send,
                success: function(response) {
                    if (response.status == "success") {
                        swal("Berhasil!", "Data telah disimpan.", "success");
                    } else {
                        swal("Gagal!", "Terjadi kesalahan saat menyimpan data.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    swal("Gagal!", "Tidak dapat terhubung ke server.", "error");
                }
            });
        });
    }
</script>

=======
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h1 class="panel-title txt-dark"><strong>Riwayat Kesehatan Keluarga</strong></h1>
                </div>
                <div class="clearfix"></div>
                <hr>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <form id="formRiwayat">
                    <input type="hidden" id="id_mcu" name="id_mcu" value="<?= isset($id_mcu) ? $id_mcu : ''; ?>">
                        <div class="table-wrap">
                            <div class="form-wrap">
                                <div class="form-body">
                                    <table class="table table-bordered">
                                        <thead class="btn-success text-white">
                                            <tr>
                                                <th colspan="7" class="text-center bg-success">Riwayat Penyakit Keluarga</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Penyakit</th>
                                                <th class="text-center">Ayah</th>
                                                <th class="text-center">Ibu</th>
                                                <th class="text-center">Kakek</th>
                                                <th class="text-center">Nenek</th>
                                                <th class="text-center">Adik</th>
                                                <th class="text-center">Kakak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Stroke</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_stroke"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_stroke"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_stroke"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_stroke"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_stroke"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_stroke"></td>
                                            </tr>
                                            <tr>
                                                <td>Tekanan darah tinggi</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_hipertensi"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_hipertensi"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_hipertensi"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_hipertensi"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_hipertensi"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_hipertensi"></td>
                                            </tr>
                                            <tr>
                                                <td>Jantung</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_jantung"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_jantung"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_jantung"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_jantung"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_jantung"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_jantung"></td>
                                            </tr>
                                            <tr>
                                                <td>Asma</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_asma"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_asma"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_asma"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_asma"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_asma"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_asma"></td>
                                            </tr>
                                            <tr>
                                                <td>Kanker/Tumor</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_kanker"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_kanker"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_kanker"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_kanker"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_kanker"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_kanker"></td>
                                            </tr>
                                            <tr>
                                                <td>Kanker payudara</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_kanker_pd"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_kanker_pd"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_kanker_pd"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_kanker_pd"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_kanker_pd"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_kanker_pd"></td>
                                            </tr>
                                            <tr>
                                                <td>Kanker indung telur</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_kanker_it"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_kanker_it"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_kanker_it"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_kanker_it"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_kanker_it"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_kanker_it"></td>
                                            </tr>
                                            <tr>
                                                <td>Kanker Usus Besar/Rektum</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_kanker_ub"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_kanker_ub"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_kanker_ub"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_kanker_ub"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_kanker_ub"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_kanker_ub"></td>
                                            </tr>
                                            <tr>
                                                <td>Kencing Manis</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_kencing_manis"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_kencing_manis"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_kencing_manis"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_kencing_manis"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_kencing_manis"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_kencing_manis"></td>
                                            </tr>
                                            <tr>
                                                <td>Kolestrol darah tinggi</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_kolesterol"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_kolesterol"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_kolesterol"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_kolesterol"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_kolesterol"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_kolesterol"></td>
                                            </tr>
                                            <tr>
                                                <td>Asam Urat Tinggi</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_asam_urat"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_asam_urat"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_asam_urat"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_asam_urat"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_asam_urat"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_asam_urat"></td>
                                            </tr>
                                            <tr>
                                                <td>Kegemukan/Obesitas</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_obesitas"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_obesitas"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_obesitas"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_obesitas"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_obesitas"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_obesitas"></td>
                                            </tr>
                                            <tr>
                                                <td>Tuberkulosis/TBC</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_tbc"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_tbc"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_tbc"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_tbc"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_tbc"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_tbc"></td>
                                            </tr>
                                            <tr>
                                                <td>Katarak</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_katarak"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_katarak"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_katarak"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_katarak"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_katarak"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_katarak"></td>
                                            </tr>
                                            <tr>
                                                <td>Tekanan Bola Mata Tinggi</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_tekanan"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_tekanan"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_tekanan"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_tekanan"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_tekanan"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_tekanan"></td>
                                            </tr>
                                            <tr>
                                                <td>Osteoporosis/pengeroposan tulang</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_osteoporosis"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_osteoporosis"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_osteoporosis"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_osteoporosis"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_osteoporosis"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_osteoporosis"></td>
                                            </tr>
                                            <tr>
                                                <td>Alergi</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_alergi"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_alergi"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_alergi"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_alergi"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_alergi"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_alergi"></td>
                                            </tr>
                                            <tr>
                                                <td>Ayan/Epilepsi</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_epilepsi"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_epilepsi"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_epilepsi"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_epilepsi"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_epilepsi"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_epilepsi"></td>
                                            </tr>
                                            <tr>
                                                <td>Kecanduan Alkohol</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_alkoholisme"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_alkoholisme"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_alkoholisme"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_alkoholisme"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_alkoholisme"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_alkoholisme"></td>
                                            </tr>
                                            <tr>
                                                <td>Perdarahan</td>
                                                <td class="text-center"><input type="checkbox" name="ayah_pendarahan"></td>
                                                <td class="text-center"><input type="checkbox" name="ibu_pendarahan"></td>
                                                <td class="text-center"><input type="checkbox" name="kakek_pendarahan"></td>
                                                <td class="text-center"><input type="checkbox" name="nenek_pendarahan"></td>
                                                <td class="text-center"><input type="checkbox" name="adik_pendarahan"></td>
                                                <td class="text-center"><input type="checkbox" name="kakak_pendarahan"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" onclick="insertData()" class="btn btn-success">
                                     <i class="fa fa-save"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function insertData() {
        var id_mcu = $('#id_mcu').val();

        var penyakit_list = [
            'stroke', 'hipertensi', 'jantung', 'asma', 'kanker', 'kanker_pd', 
            'kanker_it', 'kanker_ub', 'kencing_manis', 'kolesterol', 'asam_urat', 
            'obesitas', 'tbc', 'katarak', 'tekanan', 'osteoporosis', 'alergi', 
            'epilepsi', 'alkoholisme', 'pendarahan'
        ];
        
        var anggota_list = ['ayah', 'ibu', 'kakek', 'nenek', 'adik', 'kakak'];
        var data_to_send = { id_mcu: id_mcu };

        penyakit_list.forEach(function(penyakit) {
            var keluarga_terkena = [];
            anggota_list.forEach(function(anggota) {
                var selector = 'input[name="' + anggota + '_' + penyakit + '"]:checked';
                if ($(selector).length > 0) {
                    keluarga_terkena.push(anggota);
                }
            });
            data_to_send[penyakit] = keluarga_terkena.join(',');
        });

        swal({
            title: "Simpan Data Riwayat?",
            text: "Pastikan semua data sudah terisi dengan benar.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Ya, Simpan!",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $.ajax({
                url: "<?= site_url('Quitioners/simpan_riwayat_keluarga/'); ?>" + id_mcu,
                method: "POST",
                dataType: 'json',
                data: data_to_send,
                success: function(response) {
                    if (response.status == "success") {
                        swal("Berhasil!", "Data telah disimpan.", "success");
                    } else {
                        swal("Gagal!", "Terjadi kesalahan saat menyimpan data.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    swal("Gagal!", "Tidak dapat terhubung ke server.", "error");
                }
            });
        });
    }
</script>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
