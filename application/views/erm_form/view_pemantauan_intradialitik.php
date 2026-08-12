<<<<<<< HEAD
<style>
    /* --- VARIABLES --- */
    :root {
        --primary-color: #3cb878;
        --primary-color-font: #00000;
        --primary-light: #e6fffa;
        --text-dark: #333;
        --border-color: #e0e0e0;
        --shadow-soft: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    /* Ganti selector body jadi specific container atau hapus jika bikin konflik */
    .paper-wrapper-custom {
        font-family: 'Inter', sans-serif;
        font-size: 13px;
        /* background-color: #f0f2f5; Jangan warnai body dashboard */
        padding: 30px;
        color: var(--text-dark);
    }

    .paper-container {
        background: #fff;
        padding: 30px;
        box-shadow: var(--shadow-soft);
        max-width: 100%;
        border-radius: 16px;
        border: 1px solid #fff;
    }

    /* ... (CSS SISANYA SAMA PERSIS SEPERTI SEBELUMNYA, BIARKAN SAJA) ... */

    h2 {
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 25px;
        font-weight: 700;
        color: var(--primary-color-font);
        border-bottom: 2px solid var(--primary-light);
        padding-bottom: 10px;
        letter-spacing: 0.5px;
    }

    .form-control.readonly {
        background-color: #f8f9fa;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        padding: 8px 12px;
        width: 100%;
        margin-bottom: 15px;
        font-weight: 500;
        color: #555;
    }

    label {
        font-weight: 600;
        font-size: 12px;
        color: #666;
        margin-bottom: 4px;
        display: block;
    }

    .table-wrapper {
        overflow-x: auto;
        margin: 20px 0;
        border-radius: 8px;
        background: #fff;
        border: 1px solid var(--border-color);
        position: relative;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        min-width: 1200px;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
        vertical-align: middle;
        border-bottom: 1px solid var(--border-color);
        border-right: 1px solid #f0f0f0;
    }

    thead th {
        background-color: var(--primary-color);
        color: white;
        font-weight: 600;
        height: 45px;
        letter-spacing: 0.5px;
        border-right: 1px solid rgba(255, 255, 255, 0.2);
    }

    .sticky-col {
        position: sticky;
        left: 0;
        background-color: #fff;
        z-index: 10;
        width: 220px;
        min-width: 220px;
        text-align: left;
        padding-left: 15px;
        font-weight: 600;
        color: #2c3e50;
        box-shadow: 4px 0 5px -2px rgba(0, 0, 0, 0.1);
        border-right: none;
    }

    thead .sticky-col {
        background-color: var(--primary-color);
        color: white;
        z-index: 20;
        box-shadow: none;
        border-right: 1px solid rgba(255, 255, 255, 0.2);
    }

    tbody tr:hover td {
        background-color: #f0fdf4;
    }

    tbody tr:hover .sticky-col {
        background-color: #fff;
    }

    tbody tr:nth-child(even) td,
    tbody tr:nth-child(even) .sticky-col {
        background-color: #fafafa;
    }

    input.grid-input,
    select.grid-input {
        width: 100%;
        border: 1px solid transparent;
        border-radius: 4px;
        text-align: center;
        text-align-last: center;
        font-size: 13px;
        padding: 6px 0;
        background: transparent;
        color: #333;
        transition: all 0.2s ease;
        font-family: 'Inter', sans-serif;
    }

    select.grid-input {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        cursor: pointer;
    }

    input.grid-input:focus,
    select.grid-input:focus {
        background-color: #fff;
        border: 1px solid var(--primary-color);
        box-shadow: 0 0 0 2px rgba(60, 184, 120, 0.1);
        outline: none;
    }

    .footer-section {
        display: flex;
        gap: 30px;
        margin-top: 40px;
        background: #fff;
    }

    .planning-box {
        flex: 6;
        background: #fdfdfd;
        padding: 20px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
    }

    .planning-header {
        display: block;
        color: var(--primary-color);
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 13px;
        border-bottom: 2px solid var(--primary-light);
        padding-bottom: 8px;
    }

    .planning-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .planning-list li {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        font-size: 13px;
        color: #444;
    }

    .planning-list input[type="checkbox"] {
        margin-right: 10px;
        transform: scale(1.1);
        accent-color: var(--primary-color);
        cursor: pointer;
    }

    .planning-list .line-input {
        flex-grow: 1;
        border: none;
        border-bottom: 1px dashed #999;
        background: transparent;
        margin-left: 10px;
        padding: 2px 5px;
        font-family: inherit;
        font-size: 13px;
    }

    .planning-list .line-input:focus {
        outline: none;
        border-bottom: 1px solid var(--primary-color);
        background-color: #f0fdf4;
    }

    .btn-save {
        background: var(--primary-color);
        color: #fff;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(60, 184, 120, 0.3);
        transition: transform 0.2s;
    }

    .btn-save:hover {
        background: #34a46a;
        transform: translateY(-2px);
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -15px;
    }

    .col-md-6 {
        width: 50%;
        padding: 0 15px;
        box-sizing: border-box;
    }

    @media (max-width: 768px) {
        .col-md-6 {
            width: 100%;
        }

        .footer-section,
        .ttd-box {
            flex-direction: column;
        }
    }
</style>

<div class="paper-wrapper-custom">
    <div class="paper-container">
        <h2>Pemantauan Intradialitik</h2>

        <form id="formPemantauan">
            <input type="hidden" name="id_staff" value="<?= $staff ?? '' ?>">
            <input type="hidden" name="id_pelayanan" value="<?= $id_pelayanan ?? '' ?>" id="inPel">
            <input type="hidden" name="id_history" value="<?= $id_history ?? '' ?>" id="inHis">
            <input type="hidden" name="tanggal" value="<?= $tanggal ?? date('Y-m-d') ?>">

            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-6">
                    <label>No. RM</label>
                    <input class="form-control readonly" value="<?= $no_rm ?? '-' ?>" disabled>
                    <label>Nama Pasien</label>
                    <input class="form-control readonly" value="<?= $nama ?? '-' ?>" disabled>
                    <label>No. Telepon</label>
                    <input class="form-control readonly" value="<?= $no_hp ?? '-' ?>" disabled>
                </div>

                <div class="col-md-6">
                    <label>Tanggal Masuk</label>
                    <input class="form-control readonly" value="<?= $tgl_masuk ? date('d-m-Y H:i', strtotime($tgl_masuk)) : '-' ?>" disabled>
                    <label>Tgl Lahir / Umur</label>
                    <?php
                    $umur = '';
                    if (!empty($tgl_lahir)) {
                        $lahir = new DateTime($tgl_lahir);
                        $umur  = (new DateTime('today'))->diff($lahir)->y . ' tahun';
                    }
                    ?>
                    <input class="form-control readonly" value="<?= ($tgl_lahir ? date('d-m-Y', strtotime($tgl_lahir)) : '-') . ' / ' . $umur ?>" disabled>
                </div>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th class="sticky-col" rowspan="2">PARAMETER</th>
                            <th rowspan="2" style="width: 100px;">Pre HD</th>
                            <th colspan="8">PEMANTAUAN JAM KE-</th>
                            <th rowspan="2" style="width: 100px;">Post HD</th>
                        </tr>
                        <tr>
                            <?php for ($i = 1; $i <= 8; $i++): ?><th><?= $i ?></th><?php endfor; ?>
                        </tr>
                    </thead>

                    <?php
                    $rows = [
                        'jam_wib'                       => 'Jam (WIB)',
                        'keluhan'                       => 'Keluhan',
                        'bb_kg'                         => 'BB (Kg)',
                        'kesadaran'                     => 'Kesadaran',
                        'tekanan_darah_mmhg'            => 'Tekanan Darah (mmHg)',
                        'nadi_x_menit'                  => 'Nadi (x/menit)',
                        'suhu_c'                        => 'Suhu (°C)',
                        'qd_ml_menit'                   => 'Qd (mL/menit)',
                        'qb_ml_menit'                   => 'Qb (mL/menit)',
                        'tekanan_vena_mmhg'             => 'Tekanan Vena (mmHg)',
                        'tmp_mmhg'                      => 'TMP (mmHg)',
                        'volume_yang_ditarik_ml'        => 'Volume yang ditarik (mL)',
                        'asesmen_intervensi_keterangan' => 'Asesmen / Intervensi Keterangan',
                        'nama_dan_paraf_perawat'        => 'Nama dan Paraf Perawat'
                    ];
                    ?>

                    <tbody>
                        <?php foreach ($rows as $slug => $label): ?>
                            <?php
                            $inputType = ($slug === 'jam_wib') ? 'time' : 'text';
                            $isNurseRow = ($slug === 'nama_dan_paraf_perawat');
                            ?>
                            <tr>
                                <td class="sticky-col"><?= htmlspecialchars($label) ?></td>
                                <td>
                                    <?php if ($isNurseRow): ?>
                                        <select class="grid-input select2" name="pre_<?= $slug ?>">
                                            <option value="">-</option>
                                            <?php if (!empty($list_perawat)): foreach ($list_perawat as $p): ?>
                                                    <option value="<?= htmlspecialchars($p) ?>"><?= htmlspecialchars($p) ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                    <?php else: ?>
                                        <input type="<?= $inputType ?>" class="grid-input" name="pre_<?= $slug ?>">
                                    <?php endif; ?>
                                </td>
                                <?php for ($i = 1; $i <= 8; $i++): ?>
                                    <td>
                                        <?php if ($isNurseRow): ?>
                                            <select class="grid-input select2" name="jam<?= $i ?>_<?= $slug ?>">
                                                <option value="">-</option>
                                                <?php if (!empty($list_perawat)): foreach ($list_perawat as $p): ?>
                                                        <option value="<?= htmlspecialchars($p) ?>"><?= htmlspecialchars($p) ?></option>
                                                <?php endforeach;
                                                endif; ?>
                                            </select>
                                        <?php else: ?>
                                            <input type="<?= $inputType ?>" class="grid-input" name="jam<?= $i ?>_<?= $slug ?>">
                                        <?php endif; ?>
                                    </td>
                                <?php endfor; ?>
                                <td>
                                    <?php if ($isNurseRow): ?>
                                        <select class="grid-input select2" name="post_<?= $slug ?>">
                                            <option value="">-</option>
                                            <?php if (!empty($list_perawat)): foreach ($list_perawat as $p): ?>
                                                    <option value="<?= htmlspecialchars($p) ?>"><?= htmlspecialchars($p) ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                    <?php else: ?>
                                        <input type="<?= $inputType ?>" class="grid-input" name="post_<?= $slug ?>">
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="footer-section">
                <div class="planning-box">
                    <span class="planning-header">PERENCANAAN PULANG (DISCHARGE PLANNING)</span>
                    <ul class="planning-list">
                        <?php
                        $plans = ['Tindakan HD berikutnya', 'Edukasi', 'Rencana Konsultasi', 'Rencana Pemeriksaan Penunjang', 'Lain-lain'];
                        foreach ($plans as $idx => $plan):
                            $num = $idx + 1;
                        ?>
                            <li>
                                <label><?= $num ?>. <?= $plan ?> :</label>
                                <input type="text" name="dp_text_<?= $num ?>" class="line-input">
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div style="text-align: right; margin-top: 30px;">
                <button type="submit" class="btn-save">Simpan Data</button>
                <button type="button" class="btn-save" style="background-color: #007bff; margin-left: 10px;" onclick="cetak()">
                    Cetak
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        // KONFIGURASI URL
        const URL_SAVE = "<?= base_url('erm_pemantauan_intradialitik/save') ?>";
        const URL_GET = "<?= base_url('erm_pemantauan_intradialitik/get_data_pemantauan') ?>";

        const idPelayanan = $('input[name="id_pelayanan"]').val();
        const idHis = $('input[name="id_history"]').val(); // Pake id history buat load

        // Inisialisasi Select2 (Cek dulu pluginnya ada atau nggak)
        if ($('.select2').length > 0 && typeof $.fn.select2 === 'function') {
            $('.select2').select2({
                width: '100%',
                placeholder: '-'
            });
        }

        // FUNGSI LOAD DATA
        function loadData() {
            if (!idPelayanan || !idHis) return;

            $.ajax({
                url: URL_GET,
                type: "POST",
                dataType: "json",
                data: {
                    id_pelayanan: idPelayanan,
                    id_history: idHis
                },
                success: function(resp) {
                    if (resp.status && resp.data) {
                        const db = resp.data;

                        // Update Tanggal
                        if (db.tanggal) {
                            $('input[name="tanggal"]').val(db.tanggal);
                        }

                        // Isi Grid
                        if (db.data_pemantauan) {
                            $.each(db.data_pemantauan, function(param, times) {
                                $.each(times, function(time, value) {
                                    $(`[name="${time}_${param}"]`).val(value).trigger('change');
                                });
                            });
                        }
                        // Isi Footer
                        $('[name="dp_text_1"]').val(db.tindakan_next);
                        $('[name="dp_text_2"]').val(db.edukasi);
                        $('[name="dp_text_3"]').val(db.konsultasi);
                        $('[name="dp_text_4"]').val(db.penunjang);
                        $('[name="dp_text_5"]').val(db.lain_lain);
                    }
                }
            });
        }
        loadData();

        // FUNGSI SIMPAN DATA
        $('#formPemantauan').on('submit', function(e) {
            e.preventDefault();
            let btn = $('.btn-save');
            let txt = btn.text();
            btn.prop('disabled', true).text('Menyimpan...');

            $.ajax({
                url: URL_SAVE,
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(resp) {
                    if (resp.status) {
                        // Kalau pake SweetAlert (swal) pastikan pluginnya ada
                        if (typeof swal === 'function') {
                            swal("Sukses", 'Mantap! Data berhasil disimpan.', "success");
                        } else {
                            alert('Mantap! Data berhasil disimpan.');
                        }
                    } else {
                        alert('Gagal: ' + resp.message);
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan server.');
                },
                complete: function() {
                    btn.prop('disabled', false).text(txt);
                }
            });
        });
    });

    // FUNGSI CETAK
    window.cetak = function() {
        const idPel = $('input[name="id_pelayanan"]').val();
        const idHis = $('input[name="id_history"]').val();

        if (!idPel || !idHis) {
            alert('ID Pelayanan belum tersedia.');
            return;
        }

        const baseUrl = "<?= base_url('erm_pemantauan_intradialitik/cetak/') ?>";
        const fullUrl = baseUrl + idPel + "/" + idHis;

        window.open(fullUrl, '_blank', 'noopener,noreferrer');
    }
=======
<style>
    /* --- VARIABLES --- */
    :root {
        --primary-color: #3cb878;
        --primary-color-font: #00000;
        --primary-light: #e6fffa;
        --text-dark: #333;
        --border-color: #e0e0e0;
        --shadow-soft: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    /* Ganti selector body jadi specific container atau hapus jika bikin konflik */
    .paper-wrapper-custom {
        font-family: 'Inter', sans-serif;
        font-size: 13px;
        /* background-color: #f0f2f5; Jangan warnai body dashboard */
        padding: 30px;
        color: var(--text-dark);
    }

    .paper-container {
        background: #fff;
        padding: 30px;
        box-shadow: var(--shadow-soft);
        max-width: 100%;
        border-radius: 16px;
        border: 1px solid #fff;
    }

    /* ... (CSS SISANYA SAMA PERSIS SEPERTI SEBELUMNYA, BIARKAN SAJA) ... */

    h2 {
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 25px;
        font-weight: 700;
        color: var(--primary-color-font);
        border-bottom: 2px solid var(--primary-light);
        padding-bottom: 10px;
        letter-spacing: 0.5px;
    }

    .form-control.readonly {
        background-color: #f8f9fa;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        padding: 8px 12px;
        width: 100%;
        margin-bottom: 15px;
        font-weight: 500;
        color: #555;
    }

    label {
        font-weight: 600;
        font-size: 12px;
        color: #666;
        margin-bottom: 4px;
        display: block;
    }

    .table-wrapper {
        overflow-x: auto;
        margin: 20px 0;
        border-radius: 8px;
        background: #fff;
        border: 1px solid var(--border-color);
        position: relative;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        min-width: 1200px;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
        vertical-align: middle;
        border-bottom: 1px solid var(--border-color);
        border-right: 1px solid #f0f0f0;
    }

    thead th {
        background-color: var(--primary-color);
        color: white;
        font-weight: 600;
        height: 45px;
        letter-spacing: 0.5px;
        border-right: 1px solid rgba(255, 255, 255, 0.2);
    }

    .sticky-col {
        position: sticky;
        left: 0;
        background-color: #fff;
        z-index: 10;
        width: 220px;
        min-width: 220px;
        text-align: left;
        padding-left: 15px;
        font-weight: 600;
        color: #2c3e50;
        box-shadow: 4px 0 5px -2px rgba(0, 0, 0, 0.1);
        border-right: none;
    }

    thead .sticky-col {
        background-color: var(--primary-color);
        color: white;
        z-index: 20;
        box-shadow: none;
        border-right: 1px solid rgba(255, 255, 255, 0.2);
    }

    tbody tr:hover td {
        background-color: #f0fdf4;
    }

    tbody tr:hover .sticky-col {
        background-color: #fff;
    }

    tbody tr:nth-child(even) td,
    tbody tr:nth-child(even) .sticky-col {
        background-color: #fafafa;
    }

    input.grid-input,
    select.grid-input {
        width: 100%;
        border: 1px solid transparent;
        border-radius: 4px;
        text-align: center;
        text-align-last: center;
        font-size: 13px;
        padding: 6px 0;
        background: transparent;
        color: #333;
        transition: all 0.2s ease;
        font-family: 'Inter', sans-serif;
    }

    select.grid-input {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        cursor: pointer;
    }

    input.grid-input:focus,
    select.grid-input:focus {
        background-color: #fff;
        border: 1px solid var(--primary-color);
        box-shadow: 0 0 0 2px rgba(60, 184, 120, 0.1);
        outline: none;
    }

    .footer-section {
        display: flex;
        gap: 30px;
        margin-top: 40px;
        background: #fff;
    }

    .planning-box {
        flex: 6;
        background: #fdfdfd;
        padding: 20px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
    }

    .planning-header {
        display: block;
        color: var(--primary-color);
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 13px;
        border-bottom: 2px solid var(--primary-light);
        padding-bottom: 8px;
    }

    .planning-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .planning-list li {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        font-size: 13px;
        color: #444;
    }

    .planning-list input[type="checkbox"] {
        margin-right: 10px;
        transform: scale(1.1);
        accent-color: var(--primary-color);
        cursor: pointer;
    }

    .planning-list .line-input {
        flex-grow: 1;
        border: none;
        border-bottom: 1px dashed #999;
        background: transparent;
        margin-left: 10px;
        padding: 2px 5px;
        font-family: inherit;
        font-size: 13px;
    }

    .planning-list .line-input:focus {
        outline: none;
        border-bottom: 1px solid var(--primary-color);
        background-color: #f0fdf4;
    }

    .btn-save {
        background: var(--primary-color);
        color: #fff;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(60, 184, 120, 0.3);
        transition: transform 0.2s;
    }

    .btn-save:hover {
        background: #34a46a;
        transform: translateY(-2px);
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -15px;
    }

    .col-md-6 {
        width: 50%;
        padding: 0 15px;
        box-sizing: border-box;
    }

    @media (max-width: 768px) {
        .col-md-6 {
            width: 100%;
        }

        .footer-section,
        .ttd-box {
            flex-direction: column;
        }
    }
</style>

<div class="paper-wrapper-custom">
    <div class="paper-container">
        <h2>Pemantauan Intradialitik</h2>

        <form id="formPemantauan">
            <input type="hidden" name="id_staff" value="<?= $staff ?? '' ?>">
            <input type="hidden" name="id_pelayanan" value="<?= $id_pelayanan ?? '' ?>" id="inPel">
            <input type="hidden" name="id_history" value="<?= $id_history ?? '' ?>" id="inHis">
            <input type="hidden" name="tanggal" value="<?= $tanggal ?? date('Y-m-d') ?>">

            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-6">
                    <label>No. RM</label>
                    <input class="form-control readonly" value="<?= $no_rm ?? '-' ?>" disabled>
                    <label>Nama Pasien</label>
                    <input class="form-control readonly" value="<?= $nama ?? '-' ?>" disabled>
                    <label>No. Telepon</label>
                    <input class="form-control readonly" value="<?= $no_hp ?? '-' ?>" disabled>
                </div>

                <div class="col-md-6">
                    <label>Tanggal Masuk</label>
                    <input class="form-control readonly" value="<?= $tgl_masuk ? date('d-m-Y H:i', strtotime($tgl_masuk)) : '-' ?>" disabled>
                    <label>Tgl Lahir / Umur</label>
                    <?php
                    $umur = '';
                    if (!empty($tgl_lahir)) {
                        $lahir = new DateTime($tgl_lahir);
                        $umur  = (new DateTime('today'))->diff($lahir)->y . ' tahun';
                    }
                    ?>
                    <input class="form-control readonly" value="<?= ($tgl_lahir ? date('d-m-Y', strtotime($tgl_lahir)) : '-') . ' / ' . $umur ?>" disabled>
                </div>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th class="sticky-col" rowspan="2">PARAMETER</th>
                            <th rowspan="2" style="width: 100px;">Pre HD</th>
                            <th colspan="8">PEMANTAUAN JAM KE-</th>
                            <th rowspan="2" style="width: 100px;">Post HD</th>
                        </tr>
                        <tr>
                            <?php for ($i = 1; $i <= 8; $i++): ?><th><?= $i ?></th><?php endfor; ?>
                        </tr>
                    </thead>

                    <?php
                    $rows = [
                        'jam_wib'                       => 'Jam (WIB)',
                        'keluhan'                       => 'Keluhan',
                        'bb_kg'                         => 'BB (Kg)',
                        'kesadaran'                     => 'Kesadaran',
                        'tekanan_darah_mmhg'            => 'Tekanan Darah (mmHg)',
                        'nadi_x_menit'                  => 'Nadi (x/menit)',
                        'suhu_c'                        => 'Suhu (°C)',
                        'qd_ml_menit'                   => 'Qd (mL/menit)',
                        'qb_ml_menit'                   => 'Qb (mL/menit)',
                        'tekanan_vena_mmhg'             => 'Tekanan Vena (mmHg)',
                        'tmp_mmhg'                      => 'TMP (mmHg)',
                        'volume_yang_ditarik_ml'        => 'Volume yang ditarik (mL)',
                        'asesmen_intervensi_keterangan' => 'Asesmen / Intervensi Keterangan',
                        'nama_dan_paraf_perawat'        => 'Nama dan Paraf Perawat'
                    ];
                    ?>

                    <tbody>
                        <?php foreach ($rows as $slug => $label): ?>
                            <?php
                            $inputType = ($slug === 'jam_wib') ? 'time' : 'text';
                            $isNurseRow = ($slug === 'nama_dan_paraf_perawat');
                            ?>
                            <tr>
                                <td class="sticky-col"><?= htmlspecialchars($label) ?></td>
                                <td>
                                    <?php if ($isNurseRow): ?>
                                        <select class="grid-input select2" name="pre_<?= $slug ?>">
                                            <option value="">-</option>
                                            <?php if (!empty($list_perawat)): foreach ($list_perawat as $p): ?>
                                                    <option value="<?= htmlspecialchars($p) ?>"><?= htmlspecialchars($p) ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                    <?php else: ?>
                                        <input type="<?= $inputType ?>" class="grid-input" name="pre_<?= $slug ?>">
                                    <?php endif; ?>
                                </td>
                                <?php for ($i = 1; $i <= 8; $i++): ?>
                                    <td>
                                        <?php if ($isNurseRow): ?>
                                            <select class="grid-input select2" name="jam<?= $i ?>_<?= $slug ?>">
                                                <option value="">-</option>
                                                <?php if (!empty($list_perawat)): foreach ($list_perawat as $p): ?>
                                                        <option value="<?= htmlspecialchars($p) ?>"><?= htmlspecialchars($p) ?></option>
                                                <?php endforeach;
                                                endif; ?>
                                            </select>
                                        <?php else: ?>
                                            <input type="<?= $inputType ?>" class="grid-input" name="jam<?= $i ?>_<?= $slug ?>">
                                        <?php endif; ?>
                                    </td>
                                <?php endfor; ?>
                                <td>
                                    <?php if ($isNurseRow): ?>
                                        <select class="grid-input select2" name="post_<?= $slug ?>">
                                            <option value="">-</option>
                                            <?php if (!empty($list_perawat)): foreach ($list_perawat as $p): ?>
                                                    <option value="<?= htmlspecialchars($p) ?>"><?= htmlspecialchars($p) ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                    <?php else: ?>
                                        <input type="<?= $inputType ?>" class="grid-input" name="post_<?= $slug ?>">
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="footer-section">
                <div class="planning-box">
                    <span class="planning-header">PERENCANAAN PULANG (DISCHARGE PLANNING)</span>
                    <ul class="planning-list">
                        <?php
                        $plans = ['Tindakan HD berikutnya', 'Edukasi', 'Rencana Konsultasi', 'Rencana Pemeriksaan Penunjang', 'Lain-lain'];
                        foreach ($plans as $idx => $plan):
                            $num = $idx + 1;
                        ?>
                            <li>
                                <label><?= $num ?>. <?= $plan ?> :</label>
                                <input type="text" name="dp_text_<?= $num ?>" class="line-input">
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div style="text-align: right; margin-top: 30px;">
                <button type="submit" class="btn-save">Simpan Data</button>
                <button type="button" class="btn-save" style="background-color: #007bff; margin-left: 10px;" onclick="cetak()">
                    Cetak
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        // KONFIGURASI URL
        const URL_SAVE = "<?= base_url('erm_pemantauan_intradialitik/save') ?>";
        const URL_GET = "<?= base_url('erm_pemantauan_intradialitik/get_data_pemantauan') ?>";

        const idPelayanan = $('input[name="id_pelayanan"]').val();
        const idHis = $('input[name="id_history"]').val(); // Pake id history buat load

        // Inisialisasi Select2 (Cek dulu pluginnya ada atau nggak)
        if ($('.select2').length > 0 && typeof $.fn.select2 === 'function') {
            $('.select2').select2({
                width: '100%',
                placeholder: '-'
            });
        }

        // FUNGSI LOAD DATA
        function loadData() {
            if (!idPelayanan || !idHis) return;

            $.ajax({
                url: URL_GET,
                type: "POST",
                dataType: "json",
                data: {
                    id_pelayanan: idPelayanan,
                    id_history: idHis
                },
                success: function(resp) {
                    if (resp.status && resp.data) {
                        const db = resp.data;

                        // Update Tanggal
                        if (db.tanggal) {
                            $('input[name="tanggal"]').val(db.tanggal);
                        }

                        // Isi Grid
                        if (db.data_pemantauan) {
                            $.each(db.data_pemantauan, function(param, times) {
                                $.each(times, function(time, value) {
                                    $(`[name="${time}_${param}"]`).val(value).trigger('change');
                                });
                            });
                        }
                        // Isi Footer
                        $('[name="dp_text_1"]').val(db.tindakan_next);
                        $('[name="dp_text_2"]').val(db.edukasi);
                        $('[name="dp_text_3"]').val(db.konsultasi);
                        $('[name="dp_text_4"]').val(db.penunjang);
                        $('[name="dp_text_5"]').val(db.lain_lain);
                    }
                }
            });
        }
        loadData();

        // FUNGSI SIMPAN DATA
        $('#formPemantauan').on('submit', function(e) {
            e.preventDefault();
            let btn = $('.btn-save');
            let txt = btn.text();
            btn.prop('disabled', true).text('Menyimpan...');

            $.ajax({
                url: URL_SAVE,
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(resp) {
                    if (resp.status) {
                        // Kalau pake SweetAlert (swal) pastikan pluginnya ada
                        if (typeof swal === 'function') {
                            swal("Sukses", 'Mantap! Data berhasil disimpan.', "success");
                        } else {
                            alert('Mantap! Data berhasil disimpan.');
                        }
                    } else {
                        alert('Gagal: ' + resp.message);
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan server.');
                },
                complete: function() {
                    btn.prop('disabled', false).text(txt);
                }
            });
        });
    });

    // FUNGSI CETAK
    window.cetak = function() {
        const idPel = $('input[name="id_pelayanan"]').val();
        const idHis = $('input[name="id_history"]').val();

        if (!idPel || !idHis) {
            alert('ID Pelayanan belum tersedia.');
            return;
        }

        const baseUrl = "<?= base_url('erm_pemantauan_intradialitik/cetak/') ?>";
        const fullUrl = baseUrl + idPel + "/" + idHis;

        window.open(fullUrl, '_blank', 'noopener,noreferrer');
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>