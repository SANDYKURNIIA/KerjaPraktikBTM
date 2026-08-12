


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Assesmen Rehabilitasi Medik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { font-family: "Segoe UI", Arial, sans-serif; background-color: #f5f6fa; }
        .header-green { background-color: #1b8f55; height: 6px; width: 100%; margin-bottom: 25px; border-radius: 4px; }
        .card-custom { background: #fff; border: 1px solid #dcdcdc; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); padding: 25px; }
        label { font-weight: 600; color: #333; font-size: 14px; }
        .form-control, textarea { font-size: 14px; border-radius: 5px !important; }
        h4.title { font-size: 18px; font-weight: 700; color: #1b8f55; text-align: center; text-transform: uppercase; margin-bottom: 20px; }
        .btn-submit { background-color: #1b8f55; color: #fff; border: none; font-weight: 600; padding: 10px 25px; border-radius: 6px; transition: all 0.2s; }
        .btn-submit:hover { background-color: #157246; }
        textarea { resize: none; }
    </style>
</head>
<body>

<div class="container mt-4 mb-5">
    <div class="header-green"></div>

    <div class="card card-custom">
        <h4 class="title">Formulir Assesmen Rehabilitasi Medik</h4>

        <form id="formAssesmen" method="post" action="<?= site_url('Assesmen_Rehab/simpan_form') ?>">
            <!-- ==================== INFORMASI PASIEN ==================== -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label>No. RM</label>
                    <input type="text" name="no_rm" class="form-control bg-light"
                           value="<?= htmlspecialchars($no_rm ?? $pasien['no_rm'] ?? '') ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label>Nama Pasien</label>
                    <input type="text" class="form-control bg-light"
                           value="<?= htmlspecialchars($pasien['nama'] ?? $pasien['nama_pasien'] ?? '') ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label>Tanggal Lahir / Umur</label>
                    <?php
                        $tgl_lahir = $pasien['tgl_lahir'] ?? $pasien['tanggal_lahir'] ?? '';
                        $umur = '';
                        if (!empty($tgl_lahir)) {
                            $diff = date_diff(date_create($tgl_lahir), date_create());
                            $umur = $diff->y . ' th ' . $diff->m . ' bln';
                        }
                    ?>
                    <input type="text" class="form-control bg-light"
                           value="<?= htmlspecialchars($tgl_lahir . ($umur ? ' / ' . $umur : '')) ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label>Alamat</label>
                    <input type="text" class="form-control bg-light"
                           value="<?= htmlspecialchars($pasien['alamat'] ?? $pasien['alamat_pasien'] ?? '') ?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label>Nama DPJP</label>
                    <input type="text" class="form-control bg-light"
                           value="<?= htmlspecialchars($nama_dokter ?? $dokter['nama'] ?? $dokter['nama_lengkap'] ?? '') ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label>Tanggal Pemeriksaan</label>
                    <input type="date" name="tanggal" class="form-control"
                           value="<?= htmlspecialchars($assesmen->tanggal ?? date('Y-m-d')) ?>">
                </div>
            </div>

            <hr>

            <!-- ==================== BAGIAN FORMULIR ==================== -->
            <div class="mb-3">
                <label>Subjective</label>
                <textarea name="subjective" class="form-control" rows="2"><?= htmlspecialchars($assesmen->subjective ?? '') ?></textarea>
            </div>

            <div class="mb-3">
                <label>Objective</label>
                <textarea name="objective" class="form-control" rows="2"><?= htmlspecialchars($assesmen->objective ?? '') ?></textarea>
            </div>

            <div class="mb-3">
                <label>Assessment</label>
                <textarea name="assessment" class="form-control" rows="2"><?= htmlspecialchars($assesmen->assessment ?? '') ?></textarea>
            </div>

            <div class="mb-3">
                <label>Planning</label>
                <div class="ms-3">
                    <p class="mb-1 fw-normal">a. Goal of Treatment</p>
                    <textarea name="goal_treatment" class="form-control mb-2" rows="2"><?= htmlspecialchars($assesmen->goal_treatment ?? '') ?></textarea>

                    <p class="mb-1 fw-normal">b. Tindakan Program Rehabilitasi Medik</p>
                    <textarea name="tindakan_rehab" class="form-control mb-2" rows="2"><?= htmlspecialchars($assesmen->tindakan_rehab ?? '') ?></textarea>

                    <p class="mb-1 fw-normal">c. Edukasi</p>
                    <textarea name="edukasi" class="form-control mb-2" rows="2"><?= htmlspecialchars($assesmen->edukasi ?? '') ?></textarea>

                    <p class="mb-1 fw-normal">d. Frekuensi Kunjungan</p>
                    <input type="text" name="frekuensi_kunjungan" class="form-control mb-2"
                           value="<?= htmlspecialchars($assesmen->frekuensi_kunjungan ?? '') ?>">
                </div>
            </div>

            <div class="mb-3">
                <label>Rencana Tindak Lanjut (Evaluasi / Rujuk / Selesai)</label>
                <textarea name="rencana_tindak_lanjut" class="form-control" rows="2"><?= htmlspecialchars($assesmen->rencana_tindak_lanjut ?? '') ?></textarea>
            </div>

            <!-- ==================== INPUT HIDDEN ==================== -->
            <input type="hidden" name="id_pelayanan" value="<?= htmlspecialchars($id_pelayanan ?? '') ?>">
            <input type="hidden" name="id_histori" value="<?= htmlspecialchars($id_histori ?? '') ?>">
            <input type="hidden" name="jenis_pelayanan" value="<?= htmlspecialchars($jenis_pelayanan ?? '') ?>">

            <div class="text-center mt-4">
                <button type="button" class="btn btn-secondary me-2" onclick="window.history.back()">
                    <i class="fa fa-arrow-left"></i> Kembali
                </button>
                <button type="submit" class="btn-submit">
                    <i class="fa fa-save"></i> Simpan Data
                </button>

                <?php if (!empty($id_pelayanan)): ?>
                    <a href="<?= site_url('Assesmen_Rehab/print_assesmen/' . $id_pelayanan . '/' . $id_histori) ?>"
                       target="_blank" class="btn btn-outline-success ms-2">
                        <i class="fa fa-print"></i> Cetak
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<script>const base_url = "<?= base_url(); ?>";</script>

<script>
document.getElementById("formAssesmen").addEventListener("submit", function(e){
    e.preventDefault();
    const form = this;
    fetch(form.action, { method: "POST", body: new FormData(form) })
    .then(res => res.text())
    .then(() => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data Assesmen berhasil disimpan.',
            confirmButtonColor: '#1b8f55'
        }).then(() => {
            // Ambil nilai dari input hidden
            const idPelayanan = form.querySelector('[name="id_pelayanan"]').value;
            const idHistori = form.querySelector('[name="id_histori"]').value;
            const jenisPelayanan = form.querySelector('[name="jenis_pelayanan"]').value;

            // Redirect ulang ke form agar data terbaru dimuat dari DB
            window.location.href = `${base_url}Assesmen_Rehab/form/${idPelayanan}/${idHistori}/${jenisPelayanan}`;
        });
    })
    .catch(() => {
        Swal.fire({ icon: 'error', title: 'Oops...', text: 'Terjadi kesalahan saat menyimpan data.' });
    });
});
</script>
<script>
document.getElementById("formAssesmen").addEventListener("submit", function(e){
    e.preventDefault();
    const form = this;
    fetch(form.action, { method: "POST", body: new FormData(form) })
    .then(res => res.text())
    .then(() => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data Assesmen berhasil disimpan.',
            confirmButtonColor: '#1b8f55'
        }).then(() => {
            const idPelayanan = form.querySelector('[name="id_pelayanan"]').value;
            const idHistori = form.querySelector('[name="id_histori"]').value;
            const jenisPelayanan = form.querySelector('[name="jenis_pelayanan"]').value;

            // 🔥 Tambahan AJAX untuk update tombol di halaman utama
            $.ajax({
                url: base_url + "Erm_poli/checkData",
                type: "POST",
                dataType: "json",
                data: { id: idHistori },
                success: function(data) {
                    if (data.assesmen_rehab == "found") {
                        // ubah tombol Assesmen Rehab jadi merah (edit)
                        window.opener.$('.form_assesmen_rehab')
                            .removeClass('btn-success')
                            .addClass('btn-danger')
                            .attr('href', base_url + 'Assesmen_Rehab/form_edit/' + idPelayanan + '/' + idHistori + '/' + jenisPelayanan);
                    }
                }
            });

            // 🔁 Setelah AJAX, reload halaman induk dan tutup form
            setTimeout(() => {
                if (window.opener) {
                    window.opener.location.reload(); // refresh halaman kumpulan button
                    window.close(); // tutup tab form
                } else {
                    // fallback kalau form dibuka di tab yang sama
                    window.location.href = `${base_url}Assesmen_Rehab/form/${idPelayanan}/${idHistori}/${jenisPelayanan}`;
                }
            }, 500);
        });
    })
    .catch(() => {
        Swal.fire({ icon: 'error', title: 'Oops...', text: 'Terjadi kesalahan saat menyimpan data.' });
    });
});
</script>


</body>
</html>

