<!-- ============================================ -->
<!-- TAB NAVIGASI - SESUAI DENGAN LEBAR KONTEN -->
<!-- ============================================ -->
<div style="max-width: 1400px; margin: 0 auto; padding: 0 20px;" id="tabContainer">
    <ul class="nav nav-tabs mb-20" style="border-bottom: 2px solid #3cb878; padding: 0; display: flex; align-items: stretch; height: 52px; background: #ffffff; border-radius: 8px 8px 0 0; margin-top: 20px; list-style: none;">
        <li style="display: flex; align-items: stretch; margin-bottom: -2px;">
            <a href="#" onclick="goToHemodialisisHarian(event)" style="border: none; color: #6c7a89; font-weight: 600; padding: 12px 24px; display: flex; align-items: center; height: 100%; text-decoration: none; font-size: 13px; border-radius: 0;">
                <i class="fa fa-heartbeat" style="margin-right: 8px; font-size: 15px;"></i> PEMANTAUAN HEMODIALISIS HARIAN
            </a>
        </li>
        <li class="active" style="display: flex; align-items: stretch; margin-bottom: -2px;">
            <a href="#" onclick="return false;" style="border: none; border-bottom: 3px solid #3cb878; color: #3cb878; font-weight: 600; padding: 12px 24px; display: flex; align-items: center; height: 100%; text-decoration: none; font-size: 13px; border-radius: 0;">
                <i class="fa fa-stethoscope" style="margin-right: 8px; font-size: 15px;"></i> PEMANTAUAN INTRADIALITIK
            </a>
        </li>
    </ul>
</div>

<!-- KONTEN HALAMAN INTRADIALITIK -->
<div style="max-width: 1400px; margin: 0 auto; padding: 0 20px;">
    <div class="paper-wrapper-custom" style="padding: 0;">
        <div class="paper-container" style="background: #fff; padding: 30px 35px 20px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); max-width: 100%; border-radius: 0 0 16px 16px; border: 1px solid #f0f0f0; border-top: none;">
            
            <h2 style="text-align: center; text-transform: uppercase; margin-bottom: 10px; font-weight: 700; font-size: 22px; color: #1a2a3a; letter-spacing: 1px;">Pemantauan Intradialitik</h2>
        <form id="formPemantauan">
            <input type="hidden" name="id_staff" value="<?= $staff ?? '' ?>">
            <input type="hidden" name="id_pelayanan" value="<?= $id_pelayanan ?? '' ?>" id="inPel">
            <input type="hidden" name="id_history" value="<?= $id_history ?? '' ?>" id="inHis">
            <input type="hidden" name="tanggal" value="<?= $tanggal ?? date('Y-m-d') ?>">
            <input type="hidden" id="noRmHidden" value="<?= $no_rm ?? '' ?>">
            <input type="hidden" id="id_sbar_edit" value="">
            <input type="hidden" id="mode_sbar" value="insert">

            <!-- DATA PASIEN - 3 KOLOM -->
            <div class="row" style="margin-bottom: 20px;">
                <!-- Kolom 1 -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>No. RM</label>
                        <input class="form-control readonly" id="noRmDisplay" value="<?= $no_rm ?? '-' ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input class="form-control readonly" value="<?= $no_hp ?? '-' ?>" disabled>
                    </div>
                </div>

                <!-- Kolom 2 -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input class="form-control readonly" value="<?= $nama ?? '-' ?>" disabled>
                    </div>
                    <div class="form-group">
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

                <!-- Kolom 3 -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input class="form-control readonly" value="<?= $tgl_masuk ? date('d-m-Y H:i', strtotime($tgl_masuk)) : '-' ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Cara Bayar</label>
                        <input class="form-control readonly" value="<?= $cara_bayar ?? '-' ?>" disabled>
                    </div>
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

<!-- TOMBOL AKSI - DENGAN TOMBOL KEMBALI -->
<div style="text-align: right; margin-top: 30px;">
    <button type="button" onclick="goBack()" class="btn-back" style="padding: 12px 30px; border: 1px solid #ccc; border-radius: 8px; font-weight: 600; background: #f5f5f5; color: #333; cursor: pointer; transition: all 0.3s ease; margin-right: 10px;">
        <i class="fa fa-arrow-left"></i> KEMBALI
    </button>
    <button type="submit" id="btnSimpanIntradialitik" class="btn-save" style="padding: 12px 30px; border: none; border-radius: 8px; font-weight: 600; background: #3cb878; color: #fff; box-shadow: 0 4px 6px rgba(60, 184, 120, 0.3); cursor: pointer; transition: all 0.3s ease;">
        <i class="fa fa-save"></i> Simpan Data
    </button>
    <button type="button" class="btn-save" style="background-color: #007bff; margin-left: 10px; padding: 12px 30px; border: none; border-radius: 8px; font-weight: 600; color: #fff; box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3); cursor: pointer; transition: all 0.3s ease;" onclick="cetak()">
        <i class="fa fa-print"></i> Cetak
    </button>
</div>
        </form>
    </div>
</div>

<!-- TABEL SBAR - INTRADIALITIK -->
<div style="max-width: 1400px; margin: 0 auto; padding: 0 20px; margin-top: 20px;">
    <div class="panel panel-default card-view" style="border-radius: 16px; border: 1px solid #f0f0f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
        <div class="panel-heading" style="background: #fff; border-bottom: 2px solid #f0f0f0; padding: 15px 30px;">
            <div class="pull-left">
                <h6 class="panel-title txt-dark" style="font-weight: 700; font-size: 16px; color: #1a2a3a; margin: 0;">Form SBAR - Intradialitik</h6>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body" style="padding: 20px 30px;">
                <div class="form-group" style="margin-bottom: 15px;">
                    <div class="col-md-12" style="padding: 0;">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-hover display pb-60" id="tabel_sbar_intradialitik" style="width: 100%; border-collapse: collapse;">
                                    <thead>
                                        <tr class="bg-success" style="background: #3cb878; color: white;">
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">NO</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">PILIH</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">LANJUTKAN</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">HAPUS</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">CETAK</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">NO RM</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">NAMA PASIEN</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">TANGGAL MASUK</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">TANGGAL INPUT</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-success" style="background: #3cb878; color: white;">
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">NO</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">PILIH</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">LANJUTKAN</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">HAPUS</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">CETAK</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">NO RM</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">NAMA PASIEN</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">TANGGAL MASUK</th>
                                            <th style="padding: 12px 10px; text-align: center; font-weight: 600;">TANGGAL INPUT</th>
                                        </tr>
                                    </tfoot>
                                    <tbody style="color: black">
                                        <!-- Data akan diisi oleh JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

    /* Style Tab SEDERHANA - SAMA DENGAN HD */
    .nav-tabs {
        background: #ffffff;
        border-radius: 8px 8px 0 0;
        border-bottom: 2px solid #e8ecef;
        margin-top: 20px;
        padding: 0 20px;
    }
    
    .nav-tabs > li {
        margin-bottom: -2px;
    }
    
    .nav-tabs > li > a {
        border: none;
        border-radius: 0;
        padding: 12px 24px;
        font-weight: 600;
        font-size: 13px;
        color: #6c7a89;
        transition: all 0.25s ease;
        cursor: pointer;
        text-decoration: none;
    }
    
    .nav-tabs > li > a:hover {
        background: transparent;
        color: #3cb878;
        text-decoration: none;
    }
    
    .nav-tabs > li.active > a {
        color: #3cb878;
        background: transparent;
        border: none;
        border-bottom: 3px solid #3cb878;
    }
    
    .nav-tabs > li > a i {
        margin-right: 8px;
        font-size: 15px;
    }

    .paper-wrapper-custom {
        font-family: 'Inter', sans-serif;
        font-size: 13px;
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
        margin-bottom: 5px;
        font-weight: 500;
        color: #555;
    }

    .form-group {
        margin-bottom: 15px;
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

    /* Style untuk tombol */
    .btn-save {
        background: var(--primary-color);
        color: #fff;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(60, 184, 120, 0.3);
        transition: all 0.3s ease;
    }

    .btn-save:hover {
        background: #34a46a;
        transform: translateY(-2px);
    }

    .btn-back {
        padding: 12px 30px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-weight: 600;
        background: #f5f5f5;
        color: #333;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background: #e8e8e8;
        transform: translateY(-2px);
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -15px;
    }

    .col-md-4 {
        width: 33.333%;
        padding: 0 15px;
        box-sizing: border-box;
    }

    /* FIX: Pastikan tab container tetap di posisi atas */
    #tabContainer {
        position: relative;
        z-index: 10;
    }

    @media (max-width: 768px) {
        .col-md-4 {
            width: 100%;
        }

        .footer-section {
            flex-direction: column;
        }

        .nav-tabs {
            padding: 0 10px;
        }
        
        .nav-tabs > li > a {
            padding: 10px 15px;
            font-size: 12px;
        }
        
        .nav-tabs > li > a i {
            margin-right: 5px;
            font-size: 13px;
        }
    }
</style>

<script>
function formatTanggal(datetime) {
    if (!datetime || datetime === '0000-00-00' || datetime === '0000-00-00 00:00:00') {
        return '-';
    }
    
    try {
        let d = new Date(datetime);
        if (isNaN(d.getTime())) {
            return '-';
        }
        let date = d.toLocaleDateString('id-ID', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric'
        });
        let time = d.toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit'
        });
        return date + ' ' + time;
    } catch(e) {
        return '-';
    }
}

// ===== FUNGSI LOAD DATA FORM =====
function loadData() {
    const idPelayanan = $('input[name="id_pelayanan"]').val();
    const idHis = $('input[name="id_history"]').val();
    
    if (!idPelayanan || !idHis) return;

    $.ajax({
        url: "<?= base_url('erm_pemantauan_intradialitik/get_data_pemantauan') ?>",
        type: "POST",
        dataType: "json",
        data: {
            id_pelayanan: idPelayanan,
            id_history: idHis
        },
        success: function(resp) {
            if (resp.status && resp.data) {
                const db = resp.data;

                if (db.tanggal) {
                    $('input[name="tanggal"]').val(db.tanggal);
                }

                if (db.data_pemantauan) {
                    $.each(db.data_pemantauan, function(param, times) {
                        $.each(times, function(time, value) {
                            $(`[name="${time}_${param}"]`).val(value).trigger('change');
                        });
                    });
                }

                $('[name="dp_text_1"]').val(db.tindakan_next);
                $('[name="dp_text_2"]').val(db.edukasi);
                $('[name="dp_text_3"]').val(db.konsultasi);
                $('[name="dp_text_4"]').val(db.penunjang);
                $('[name="dp_text_5"]').val(db.lain_lain);
            }
        }
    });
}

function loadTableSBARIntradialitik() {
    let id_history = $('#inHis').val();
    let id_pelayanan = $('#inPel').val();

    if (!id_history || !id_pelayanan) {
        $('#tabel_sbar_intradialitik tbody').html('<tr><td colspan="9" class="text-center text-muted">ID pelayanan atau history tidak tersedia</td></tr>');
        return;
    }

    let no_rm = $('#noRmHidden').val() || $('#noRmDisplay').val() || '';
    if (!no_rm) {
        no_rm = sessionStorage.getItem('no_rm') || '';
    }

    $.ajax({
        url: "<?= base_url() ?>Erm_pemantauan_intradialitik/get_data_sbar",
        method: "POST",
        dataType: 'json',
        cache: false,
        data: {
            id_pelayanan: id_pelayanan,
            id_history: id_history,
            no_rm: no_rm,
            _: new Date().getTime()
        },
        success: function(res) {
            let html = "";
            let no = 1;

            if (res.status === 'found' && res.data && res.data.length > 0) {
                res.data.forEach(item => {
                    let noRm = item.no_rm || no_rm || '-';
                    let createdDate = item.updated_at || item.created_at || item.tgl_simpan || '-';
                    
                    html += `
                    <tr>
                        <td style="padding: 10px; text-align: center;">${no++}</td>
                        <td style="padding: 10px; text-align: center;">
                            <button class="btn btn-success btn-icon-anim btn square" onclick="pilihSBARIntradialitik('${item.id}')" style="padding: 5px 10px; border: none; border-radius: 4px; background: #3cb878; color: white;">
                                <i class="icon-rocket"></i>
                            </button>
                        </td>
                        <td style="padding: 10px; text-align: center;">
                            <button class="btn btn-warning btn-icon-anim btn square" onclick="lanjutkanSBARIntradialitik('${item.id}')" style="padding: 5px 10px; border: none; border-radius: 4px; background: #f39c12; color: white;">
                                <i class="icon-rocket"></i>
                            </button>
                        </td>
                        <td style="padding: 10px; text-align: center;">
                            <button class="btn btn-danger btn-icon-anim btn square" onclick="hapusSBARIntradialitik('${item.id}')" style="padding: 5px 10px; border: none; border-radius: 4px; background: #e74c3c; color: white;">
                                <i class="icon-trash"></i>
                            </button>
                        </td>
                        <td style="padding: 10px; text-align: center;">
                            <button class="btn btn-info btn-icon-anim btn square" onclick="cetakSBARIntradialitik('${item.id}')" style="padding: 5px 10px; border: none; border-radius: 4px; background: #3498db; color: white;">
                                <i class="fa fa-print"></i>
                            </button>
                        </td>
                        <td style="padding: 10px; text-align: center;">${noRm}</td>
                        <td style="padding: 10px;">${item.nama_pasien || '-'}</td>
                        <td style="padding: 10px; text-align: center;">${formatTanggal(item.tgl_masuk)}</td>
                        <td style="padding: 10px; text-align: center;">${formatTanggal(createdDate)}</td>
                    </tr>
                    `;
                });
            } else {
                html = `<tr><td colspan="9" class="text-center text-muted">Tidak ada data</td></tr>`;
            }

            $('#tabel_sbar_intradialitik tbody').html(html);
            
            let totalData = (res.data && res.data.length) ? res.data.length : 0;
            if ($('#totalDataSbar').length) {
                $('#totalDataSbar').text('Total: ' + totalData + ' data');
            }
        },
        error: function(xhr) {
            console.log('Error:', xhr.responseText);
            $('#tabel_sbar_intradialitik tbody').html('<tr><td colspan="9" class="text-center text-danger">Error loading data</td></tr>');
        }
    });
}

// ===== PILIH DATA (EDIT) =====
function pilihSBARIntradialitik(id) {
    // Cek apakah sedang dalam proses submit
    if ($('#formPemantauan').data('submitting')) {
        return;
    }

    $.ajax({
        url: "<?= base_url() ?>Erm_pemantauan_intradialitik/get_sbar_by_id",
        method: "POST",
        dataType: 'json',
        data: { id: id },
        success: function(res) {
            if (res.status === 'found') {
                let data = res.data;
                
                // Isi form dengan data
                if (data.data_pemantauan) {
                    let pemantauan = typeof data.data_pemantauan === 'string' ? 
                        JSON.parse(data.data_pemantauan) : data.data_pemantauan;
                    
                    $.each(pemantauan, function(param, times) {
                        $.each(times, function(time, value) {
                            let selector = `[name="${time}_${param}"]`;
                            if ($(selector).length) {
                                $(selector).val(value).trigger('change');
                            }
                        });
                    });
                }
                
                if (data.tindakan_next) $('[name="dp_text_1"]').val(data.tindakan_next);
                if (data.edukasi) $('[name="dp_text_2"]').val(data.edukasi);
                if (data.konsultasi) $('[name="dp_text_3"]').val(data.konsultasi);
                if (data.penunjang) $('[name="dp_text_4"]').val(data.penunjang);
                if (data.lain_lain) $('[name="dp_text_5"]').val(data.lain_lain);
                
                // Set mode EDIT
                $('#id_sbar_edit').val(id);
                $('#mode_sbar').val('edit');
                
                // Ubah tombol menjadi EDIT DATA
                $('#btnSimpanIntradialitik')
                    .html('<i class="fa fa-edit"></i> EDIT DATA')
                    .removeClass('btn-save')
                    .addClass('btn-warning')
                    .attr('onclick', 'updateSBARIntradialitik()')
                    .prop('type', 'button');
                
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
                swal("Gagal!", "Data tidak ditemukan", "warning");
            }
        }
    });
}

// ===== LANJUTKAN (COPY DATA KE FORM BARU) =====
function lanjutkanSBARIntradialitik(id) {
    // Cek apakah sedang dalam proses submit
    if ($('#formPemantauan').data('submitting')) {
        return;
    }

    $.ajax({
        url: "<?= base_url() ?>Erm_pemantauan_intradialitik/get_sbar_by_id",
        method: "POST",
        dataType: 'json',
        data: { id: id },
        success: function(res) {
            if (res.status === 'found') {
                let data = res.data;
                
                // Isi form dengan data
                if (data.data_pemantauan) {
                    let pemantauan = typeof data.data_pemantauan === 'string' ? 
                        JSON.parse(data.data_pemantauan) : data.data_pemantauan;
                    
                    $.each(pemantauan, function(param, times) {
                        $.each(times, function(time, value) {
                            let selector = `[name="${time}_${param}"]`;
                            if ($(selector).length) {
                                $(selector).val(value).trigger('change');
                            }
                        });
                    });
                }
                
                if (data.tindakan_next) $('[name="dp_text_1"]').val(data.tindakan_next);
                if (data.edukasi) $('[name="dp_text_2"]').val(data.edukasi);
                if (data.konsultasi) $('[name="dp_text_3"]').val(data.konsultasi);
                if (data.penunjang) $('[name="dp_text_4"]').val(data.penunjang);
                if (data.lain_lain) $('[name="dp_text_5"]').val(data.lain_lain);
                
                // SET MODE INSERT (biar simpan jadi data baru)
                $('#id_sbar_edit').val('');
                $('#mode_sbar').val('insert');
                
                // Reset tombol ke SIMPAN DATA
                $('#btnSimpanIntradialitik')
                    .html('<i class="fa fa-save"></i> SIMPAN DATA')
                    .removeClass('btn-warning')
                    .addClass('btn-save')
                    .attr('onclick', '')
                    .prop('type', 'submit');
                
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
                swal("Gagal!", "Data tidak ditemukan", "warning");
            }
        }
    });
}

// ===== UPDATE DATA =====
function updateSBARIntradialitik() {
    // Cek apakah sedang dalam proses
    if ($('#formPemantauan').data('submitting')) {
        return;
    }

    let id = $('#id_sbar_edit').val();
    let formData = $('#formPemantauan').serialize();
    formData += '&id=' + encodeURIComponent(id);
    
    swal({
        title: "Update Data?",
        text: "Apakah Anda yakin ingin mengubah data ini?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#f39c12",
        confirmButtonText: "Ya, Update",
        cancelButtonText: "Batal",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            $('#formPemantauan').data('submitting', true);
            
            $.ajax({
                url: "<?= base_url() ?>Erm_pemantauan_intradialitik/update_sbar",
                method: "POST",
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        swal("Berhasil!", response.message, "success");
                        loadTableSBARIntradialitik();
                        
                        // Reset mode ke insert
                        $('#mode_sbar').val('insert');
                        $('#id_sbar_edit').val('');
                        
                        // Reset tombol ke SIMPAN DATA
                        $('#btnSimpanIntradialitik')
                            .html('<i class="fa fa-save"></i> SIMPAN DATA')
                            .removeClass('btn-warning')
                            .addClass('btn-save')
                            .attr('onclick', '')
                            .prop('type', 'submit');
                        
                        // Reset form
                        $('#formPemantauan')[0].reset();
                        if (typeof $.fn.select2 === 'function') {
                            $('.select2').val('').trigger('change');
                        }
                    } else {
                        swal("Gagal!", response.message || "Terjadi kesalahan", "error");
                    }
                },
                error: function(xhr) {
                    let msg = 'Terjadi kesalahan saat update data';
                    try {
                        let resp = JSON.parse(xhr.responseText);
                        if (resp.message) msg = resp.message;
                    } catch(e) {}
                    swal("Gagal!", msg, "error");
                },
                complete: function() {
                    $('#formPemantauan').data('submitting', false);
                }
            });
        }
    });
}

// ===== HAPUS DATA =====
function hapusSBARIntradialitik(id) {
    swal({
        title: "Hapus Data?",
        text: "Data yang dihapus tidak bisa dikembalikan!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#e74c3c",
        confirmButtonText: "Ya, Hapus",
        cancelButtonText: "Batal",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: "<?= base_url() ?>Erm_pemantauan_intradialitik/delete_sbar",
                method: "POST",
                dataType: "json",
                data: { id: id },
                success: function(res) {
                    swal("Berhasil!", "Data berhasil dihapus", "success");
                    loadTableSBARIntradialitik();
                },
                error: function() {
                    swal("Gagal!", "Terjadi kesalahan saat menghapus data", "error");
                }
            });
        }
    });
}

// ===== CETAK SBAR =====
function cetakSBARIntradialitik(id) {
    let url = "<?= base_url('Erm_pemantauan_intradialitik/cetak_sbar/') ?>" + id;
    window.open(url, '_blank');
}

// ===== FUNGSI UTAMA =====
function saveScrollPosition() {
    sessionStorage.setItem('scrollPosition', window.scrollY);
}

function restoreScrollPosition() {
    const scrollPos = sessionStorage.getItem('scrollPosition');
    if (scrollPos) {
        setTimeout(function() {
            window.scrollTo(0, parseInt(scrollPos));
            sessionStorage.removeItem('scrollPosition');
        }, 100);
    }
}

function goBack() {
    let url = "<?= base_url('erm_poli/form/cGxfMzQ%3D/aGlzXzE0MA%3D%3D/POLI') ?>";
    window.location.href = url;
}

function goToHemodialisisHarian(event) {
    if (event) {
        event.preventDefault();
    }
    
    saveScrollPosition();
    
    let id_pelayanan = sessionStorage.getItem('id_pelayanan');
    let id_history = sessionStorage.getItem('id_history');
    let no_rm = sessionStorage.getItem('no_rm');
    
    if (!id_pelayanan) {
        id_pelayanan = $('#inPel').val();
    }
    if (!id_history) {
        id_history = $('#inHis').val();
    }
    if (!no_rm) {
        no_rm = $('#noRmHidden').val() || $('#noRmDisplay').val() || '';
    }
    
    if (!id_pelayanan || !id_history) {
        let urlParams = new URLSearchParams(window.location.search);
        id_pelayanan = urlParams.get('id_pelayanan');
        id_history = urlParams.get('id_history');
        no_rm = urlParams.get('no_rm');
    }
    
    if (!id_pelayanan || !id_history) {
        if (typeof swal === 'function') {
            swal("Info", "Data pelayanan belum lengkap", "info");
        } else {
            alert('Data pelayanan belum lengkap!');
        }
        return;
    }
    
    sessionStorage.setItem('from_tab', 'intradialitik');
    sessionStorage.setItem('id_pelayanan', id_pelayanan);
    sessionStorage.setItem('id_history', id_history);
    sessionStorage.setItem('no_rm', no_rm || '');
    
    let url = "<?= base_url('Pemantauan_pelaksanaan_hemodialis_harian/form') ?>" + 
              "?id_pelayanan=" + encodeURIComponent(id_pelayanan) +
              "&id_history=" + encodeURIComponent(id_history) +
              "&no_rm=" + encodeURIComponent(no_rm || '');
    
    window.location.href = url;
}

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

// ===== DOCUMENT READY =====
$(document).ready(function() {
    const URL_SAVE = "<?= base_url('erm_pemantauan_intradialitik/save') ?>";

    if ($('.select2').length > 0 && typeof $.fn.select2 === 'function') {
        $('.select2').select2({
            width: '100%',
            placeholder: '-'
        });
    }

    loadData();
    restoreScrollPosition();
    loadTableSBARIntradialitik();

    // HANYA SATU EVENT LISTENER UNTUK SUBMIT
    $('#formPemantauan').on('submit', function(e) {
        e.preventDefault();
        
        // Cek apakah sedang dalam proses
        if ($(this).data('submitting')) {
            return false;
        }
        
        // Cek mode - jika edit, gunakan updateSBARIntradialitik
        let mode = $('#mode_sbar').val();
        if (mode === 'edit') {
            // Tombol sudah berubah menjadi EDIT DATA dengan onclick sendiri
            return false;
        }
        
        // Mode INSERT
        $(this).data('submitting', true);
        
        let btn = $('#btnSimpanIntradialitik');
        let txt = btn.text();
        
        btn.prop('disabled', true).text('Menyimpan...');
        
        $.ajax({
            url: URL_SAVE,
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(resp) {
                if (resp.status) {
                    if (typeof swal === 'function') {
                        swal("Sukses", resp.message, "success");
                    } else {
                        alert('Data berhasil disimpan.');
                    }
                    loadTableSBARIntradialitik();
                    
                    // Reset form untuk input baru
                    $('#formPemantauan')[0].reset();
                    if (typeof $.fn.select2 === 'function') {
                        $('.select2').val('').trigger('change');
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
                $('#formPemantauan').data('submitting', false);
            }
        });
    });
});
</script>