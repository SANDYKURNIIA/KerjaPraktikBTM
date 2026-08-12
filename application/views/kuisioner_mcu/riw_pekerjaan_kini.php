<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Riwayat Pekerjaan Terkini</title>
    <style>
        :root {
            --primary: #007bff;
            --primary-dark: #0056b3;
            --muted-bg: #e6f2ff;
            --white: #fff;
            --card-border: #d1d5da;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 20px;
            color: #222;
        }
        .form-container {
            max-width: 980px;
            margin: 0 auto;
            border: 1px solid var(--card-border);
            background-color: var(--white);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(12, 35, 60, 0.06);
        }
        .form-title {
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: var(--white);
            padding: 14px 18px;
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: 0.2px;
        }
        .form-body { padding: 12px; }
        .form-row {
            display: flex;
            gap: 0;
            align-items: stretch;
            border-bottom: 1px solid #efefef;
            padding: 10px 0;
            flex-wrap: wrap;
        }
        .form-row:last-child { border-bottom: none; }
        .label-cell {
            background-color: var(--primary);
            color: var(--white);
            padding: 12px;
            flex: 0 0 36%;
            display: flex;
            align-items: center;
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
            min-width: 220px;
        }
        .input-cell {
            padding: 12px;
            flex: 1 1 64%;
            background-color: var(--muted-bg);
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
        }
        .input-cell input[type="text"], .input-cell select {
            padding: 7px 8px;
            width: 100%;
            max-width: 100%;
            border: 1px solid #cfcfcf;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .radio-wrapper { display: flex; align-items: center; gap: 6px; margin-right: 12px; }
        .radio-wrapper input[type="radio"] { margin: 0; }
        .radio-wrapper label { margin: 0; font-size: 0.95rem; cursor: pointer; line-height: 1.2; }
        .radio-vertical { display: flex; flex-direction: column; align-items: flex-start; gap: 12px; width: 100%; }
        .keterangan-box { flex: 1 1 40%; min-width: 160px; }
        .keterangan-box input[type="text"] { width: 100%; }
        .date-input { display: flex; align-items: center; gap: 8px; width: 100%; flex-wrap: nowrap; }
        .date-input select { min-width: 120px; }
        .submit-row { display: flex; justify-content: flex-end; padding: 14px; background: transparent; }
        .submit-btn {
            padding: 10px 18px;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
        }
        .submit-btn[disabled] { opacity: 0.65; cursor: not-allowed; }
        @media (max-width: 720px) {
            .label-cell, .input-cell { flex-basis: 100%; min-width: 0; }
            .label-cell { border-radius: 6px 6px 0 0; }
            .input-cell { border-radius: 0 0 6px 6px; }
            .date-input { flex-direction: column; align-items: stretch; }
            .radio-vertical { flex-direction: column; align-items: stretch; }
        }
    </style>
</head>
<body>

<form id="riwayatForm" class="form-wrapper" autocomplete="off">
    <div class="form-container">
        <div class="form-title">Riwayat Pekerjaan Terkini</div>
        <div class="form-body">

        <input type="hidden" id="id_mcu"
                  value="<?= isset($id_mcu) && $id_mcu ? htmlspecialchars($id_mcu, ENT_QUOTES, 'UTF-8') : (isset($data_mcu['id_mcu']) ? htmlspecialchars($data_mcu['id_mcu'], ENT_QUOTES, 'UTF-8') : '') ?>">

            <div class="form-row">
                <div class="label-cell">Perusahaan</div>
                <div class="input-cell"><input type="text" name="perusahaan" placeholder="Nama perusahaan..."></div>
            </div>

            <div class="form-row">
                <div class="label-cell">Tahun</div>
                <div class="input-cell">
                    <div class="date-input">
                        <select id="tahun_dari" name="tahun_dari"></select>
                        <div style="align-self:center; min-width:60px; text-align:center;">Sampai</div>
                        <select id="tahun_sampai" name="tahun_sampai"></select>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="label-cell">Sebagai</div>
                <div class="input-cell"><input type="text" name="sebagai" placeholder="Jabatan / posisi..."></div>
            </div>

            <div class="form-row">
                <div class="label-cell">Divisi</div>
                <div class="input-cell"><input type="text" name="divisi" placeholder="Divisi / departemen..."></div>
            </div>

            <div class="form-row">
                <div class="label-cell">Apakah terdapat program K3 di perusahaan?</div>
                <div class="input-cell radio-vertical">
                    <?php
                    $k3_options = [
                        'Ya', 
                        'Tidak', 
                        'Sesuai aturan pemerintah', 
                        'Hanya ruang lingkup perusahaan', 
                        'Tidak jelas programnya'
                    ];
                    foreach ($k3_options as $opt) {
                        $id = 'programK3_' . str_replace(' ', '_', $opt);
                        echo '<div class="radio-wrapper">';
                        echo "<input type='radio' id='$id' name='programK3' value='$opt'>";
                        echo "<label for='$id'>$opt</label>";
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <?php
            $fields = [
                'berdebu','bahanKimia','radiasi','asap','fume',
                'makanan','alatBerat','getaran','panas','dingin',
                'ketinggian','bising','penglihatan','kantoran'
            ];

            foreach($fields as $field) {
                echo '<div class="form-row">';
                echo "<div class='label-cell'>".ucfirst($field)."</div>";
                echo "<div class='input-cell'>";
                echo "<div class='radio-wrapper'><input type='radio' id='{$field}_ya' name='{$field}' value='Ya'><label for='{$field}_ya'>Ya</label></div>";
                echo "<div class='radio-wrapper'><input type='radio' id='{$field}_tidak' name='{$field}' value='Tidak' checked><label for='{$field}_tidak'>Tidak</label></div>";
                echo "<div class='keterangan-box'><input type='text' name='ket_{$field}' placeholder='Keterangan...'></div>";
                echo "</div></div>";
            }
            ?>

        </div>
        <div class="submit-row">
            <button type="button" id="simpan_riw_pekerjaan_kini" class="submit-btn">Simpan</button>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function isiDropdownTahun(id) {
    const select = document.getElementById(id);
    if (!select) return;
    select.innerHTML = '';
    for (let i = 1900; i <= 2070; i++) {
        const option = document.createElement('option');
        option.value = i;
        option.text = i;
        select.appendChild(option);
    }
    const nowYear = new Date().getFullYear();
    select.value = nowYear;
}
isiDropdownTahun('tahun_dari');
isiDropdownTahun('tahun_sampai');

$('#simpan_riw_pekerjaan_kini').on('click', function() {
    // Tampilkan pop-up konfirmasi menggunakan SweetAlert
    swal({
        title: "Apakah kamu yakin!",
        text: "Menyimpan Data ini?",
        icon: "warning",
        buttons: ["Batal", "Yakin"],
        dangerMode: true,
    })
    .then((willSave) => {
        if (willSave) {
            let id_mcu = $('#id_mcu').val();

            // Cek jika id_mcu dari input form kosong, ambil dari URL
            if (!id_mcu) {
                const urlSegments = window.location.pathname.split('/');
                // Asumsi URL adalah /Quitioners/tampil/ID_MCU
                id_mcu = urlSegments[urlSegments.length - 1]; 
            }

            const formData = new FormData($('#riwayatForm')[0]);
            // Tambahkan id_mcu ke formData jika sudah ditemukan
            if (id_mcu) {
                formData.set('id_mcu', id_mcu);
            }

            const btn = $(this);
            btn.prop('disabled', true);

            $.ajax({
                url: "<?= base_url('Quitioners/simpan_riwayat_pekerjaan_kini'); ?>",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(res) {
                    btn.prop('disabled', false);
                    if (res.status === 'success') {
                        swal("Good job!", "Form berhasil disimpan", "success");
                    } else {
                        swal("Oops!", res.message, "error");
                    }
                },
                error: function(xhr, status, error) {
                    btn.prop('disabled', false);
                    swal("Terjadi Kesalahan!", "Gagal menyimpan data.", "error");
                    console.error("AJAX Error: " + status + error);
                }
            });
        }
    });
});
</script></body>
</html>
