<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h1 class="panel-title txt-dark"><strong>Penyakit yang Pernah / Sedang Diderita</strong></h1>
                </div>
                <div class="clearfix"></div>
                <hr>
            </div>
            <div class="panel-body">
                <form id="form-penyakit">
                    <input type="hidden" name="id_mcu" value="<?= isset($id_mcu) ? $id_mcu : ''; ?>">

                    <table class="table table-bordered">
                        <thead class="btn-success text-white">
                            <tr>
                                <th class="text-center">Penyakit</th>
                                <th class="text-center">Pilih</th>
                                <th class="text-center">Tahun</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Daftar penyakit sesuai controller
                            $penyakit = [
                                'asma' => 'Asma',
                                'kanker' => 'Kanker/Tumor',
                                'kencing_manis' => 'Kencing Manis',
                                'radang_otak' => 'Radang Otak',
                                'jantung' => 'Jantung',
                                'batu_ginjal' => 'Batu Ginjal',
                                'gangguan_fungsi_ginjal' => 'Gangguan Fungsi Ginjal',
                                'malaria' => 'Malaria',
                                'ayan_epilepsi' => 'Ayan/Epilepsi',
                                'gondong_parotitis' => 'Gondong/Parotitis',
                            ];
                            foreach ($penyakit as $key => $label): ?>
                                <tr>
                                    <td><?= $label; ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" name="<?= $key; ?>_checked" value="<?= $label ?>">
                                    </td>
                                    <td>
                                        <select name="<?= $key; ?>_tahun" class="form-control">
                                            <option value="">Pilih Tahun</option>
                                            <?php for ($i = date('Y'); $i >= 1950; $i--): ?>
                                                <option value="<?= $i; ?>"><?= $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <label><input type="radio" name="<?= $key; ?>_status" value="Diobati"> Diobati</label>
                                        <label><input type="radio" name="<?= $key; ?>_status" value="Tidak Diobati"> Tidak Diobati</label>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="text-right">
                        <button class="btn btn-success" type="submit">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        var id_mcu = $('#id_mcu_form').val();

        $('#form-penyakit').on('submit', function(e) {
            e.preventDefault(); // cegah submit default

            $.ajax({
                url: "<?= site_url('Quitioners/simpan_penyakit_pasien/'); ?>" + id_mcu,
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(res) {
                    if (res.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Data penyakit berhasil disimpan!',
                            confirmButtonText: 'OK'
                        })
                    }

                    if (res.status === 'error') {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Mohon untuk mengisi form, minimal 1 pilihan",
                            icon: "error"
                        });
                    }
                },

            });
        });
 
        $.ajax({
            url: "<?= site_url('Quitioners/getPenyakitPasien/'); ?>" + id_mcu,
            type: "GET",
            dataType: "json",
            success: function(res) {
                if (res.data) {
                    let data = res.data;

                    // Loop semua penyakit sesuai daftar PHP
                    let penyakit = [
                        'asma',
                        'kanker',
                        'kencing_manis',
                        'radang_otak',
                        'jantung',
                        'batu_ginjal',
                        'gangguan_fungsi_ginjal',
                        'malaria',
                        'ayan_epilepsi',
                        'gondong_parotitis'
                    ];

                    penyakit.forEach(function(item) {
                        // isi checkbox
                        if (data[item + '_checked']) {
                            $('input[name="' + item + '_checked"]').prop('checked', true);
                        }

                        // isi tahun
                        if (data[item + '_tahun']) {
                            $('select[name="' + item + '_tahun"]').val(data[item + '_tahun']);
                        }

                        // isi status (radio)
                        if (data[item + '_status']) {
                            $('input[name="' + item + '_status"][value="' + data[item + '_status'] + '"]').prop('checked', true);
                        }
                    });
                }
            }
        });

    });
</script>