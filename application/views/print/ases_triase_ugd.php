<!DOCTYPE html>
<html>

<head>
    <title>Print Out</title>
    <style>
    /* 🛠️ Reset dan Dasar Styling */
    body {
        font-family: 'Arial', sans-serif;
        font-size: 10px;
        margin: 0;
        padding: 10px;
        color: #000;
    }

    /* 🛠️ Utility Classes */
    .text-center { text-align: center; }
    .text-left { text-align: left; }
    .text-right { text-align: right; }
    .font-bold { font-weight: bold; }

    /* --- Pengaturan Border Baru untuk Mengatasi Double Border --- */
    /* 1. Reset Border Top/Bottom */
    .no-border-top { border-top: none !important; }
    .no-border-bottom { border-bottom: none !important; }
    /* 2. Reset Border Kanan/Kiri */
    .no-border-right { border-right: none !important; }
    .no-border-left { border-left: none !important; }
    /* 3. Border Penuh (digunakan untuk tabel yang ingin dipisah dari yang lain) */
    .full-border { border: 1px solid #000 !important; }
    /* ----------------------------------------------------------- */

    /* 📊 Table Styling Utama */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 5px;
        /* Tambahkan border luar pada tabel (optional, tergantung layout) */
        border: 1px solid #000; 
    }

    td,
    th {
        /* Hapus border penuh di sini, kita akan gunakan border-collapse: collapse */
        /* Biarkan border-collapse yang menangani. */
        /* Jika ingin setiap sel memiliki border, biarkan seperti ini, tapi ini sering menyebabkan double border */
        /* Perhatian: Setting border di sini (1px solid #000) AKAN membuat double border */
        /* Sebaiknya dihilangkan jika border-collapse: collapse sudah diatur di <table> */
        /* Contoh: Jika tabel memiliki border, td/th tidak perlu border kecuali Anda ingin border pemisah internal */
        
        /* Menggunakan border-collapse: collapse seharusnya cukup, 
           tapi untuk kepastian kita atur lagi, dan kita fokus hilangkan duplikasi */
        border: 1px solid #000; 
        padding: 3px 5px;
        vertical-align: top;
    }

    /* 📋 Header Section */
    .header-table {
        border: none; /* Hilangkan border pada tabel header */
        margin-bottom: 10px;
    }
    .header-table td {
        border: none; /* Pastikan sel header tidak punya border */
    }
    .header-title {
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
    }

    /* 🆔 Identitas Pasien Box (Pojok Kanan Atas) */
    .patient-box {
        padding: 5px;
        width: 300px;
        font-size: 11px;
    }

    /* ✅ Checkbox Styling untuk Print */
    input[type="checkbox"] {
        transform: scale(0.9);
        vertical-align: middle;
        margin: 0 2px 0 0;
    }

    label {
        vertical-align: middle;
        margin-right: 8px;
    }

    /* 🎨 Warna Latar Belakang Kategori (Wajib pakai !important untuk print) */
    .bg-red { background-color: #ff4d4d !important; color: black; font-weight: bold; }
    .bg-yellow { background-color: #ffe135 !important; color: black; font-weight: bold; }
    .bg-green { background-color: #28a745 !important; color: white; font-weight: bold; }
    .bg-black { background-color: #000 !important; color: white; font-weight: bold; }
    .bg-grey { background-color: #f0f0f0 !important; font-weight: bold; }

    /* 📐 Layout Khusus Grid Triase */
    .triase-grid td { height: 25px; } /* Tinggi minimum baris */

    .vital-section { font-size: 9px; }
    .vital-row {
        margin-bottom: 8px;
        border-bottom: 1px dotted #999;
        padding-bottom: 2px;
    }

    .no-click { pointer-events: none; }

    /* 🖨️ Print Settings */
    @media print {
        body {
            -webkit-print-color-adjust: exact;
        }

        .no-print {
            display: none;
        }

        @page {
            size: A4;
            margin: 1cm;
        }
    }
</style>
</head>

<body>
    <div class="font-bold" style="font-size: 14px; margin-bottom: 5px;">TRIASE IGD</div>

    <table style="width: 100%; border-collapse: collapse; border: 2px ; margin-bottom: 0;">
        <tr>
            <td style="width: 50%; padding: 0; vertical-align: top; border-right: 1px;">
                <table style="width: 100%; border: none;">
                    <tr style="height: 100px;">

                        <!-- KOLOM KIRI : LOGO -->
                        <td style="width: 22%; border-right:1px; padding:10px; text-align:center; vertical-align:middle;">
                            <img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" style="width:150px;">
                        </td>

                        <!-- KOLOM TENGAH : JUDUL -->
                        <td style="width: 40%; border-right:1px; text-align:center; vertical-align:middle; padding:5px;">
                            <div style="font-size:14px; font-weight:bold;">
                                ASESMEN TRIASE<br>
                                INSTALASI GAWAT DARURAT
                            </div>
                        </td>


                        <td style="width: 50%; padding: 0; vertical-align: top;">
                            <table style="width: 100%; border: none;">
                                <tr>
                                    <td style="width: 85%; border: none; padding: 5px; border-right: 1px solid #000;">
                                        <table style="width: 100%; border: none; font-size: 10px;">
                                            <?php
                                            $no_rm = $data['no_rm'] ?? '';
                                            $nama_pasien = $data['pasien'] ?? '';
                                            $tgl_lahir = $data['tgl_lahir'] ?? '';
                                            $tgl_masuk = $data['tanggal'] ?? date('Y-m-d H:i:s');
                                            ?>
                                            <tr>
                                                <td style="border:none; width: 70px;">NRM</td>
                                                <td style="border:none;">:</td>
                                                <td style="border:none;"><span style="border-bottom: 1px solid #000; display: block; height: 12px; width: 100%;"><?= $no_rm ?></span></td>
                                            </tr>
                                            <tr>
                                                <td style="border:none;">Nama</td>
                                                <td style="border:none;">:</td>
                                                <td style="border:none;"><span style="border-bottom: 1px solid #000; display: block; height: 12px; width: 100%;"><?= $nama_pasien ?></span></td>
                                            </tr>
                                            <tr>
                                                <td style="border:none;">Tanggal Lahir</td>
                                                <td style="border:none;">:</td>
                                                <td style="border:none;"><span style="border-bottom: 1px solid #000; display: block; height: 12px; width: 100%;"><?= $tgl_lahir ?></span></td>
                                            </tr>
                                            <tr>
                                                <td style="border:none;">Tanggal Datang</td>
                                                <td style="border:none;">:</td>
                                                <td style="border:none;"><span style="border-bottom: 1px solid #000; display: block; height: 12px; width: 100%;"><?= date('d-m-Y', strtotime($data['tanggal'])) ?></span></td>
                                            </tr>
                                            <tr>
                                                <td style="border:none;">Jam</td>
                                                <td style="border:none;">:</td>
                                                <td style="border:none;"><span style="border-bottom: 1px solid #000; display: block; height: 12px; width: 100%;"> <?= date('H:i', strtotime($data['tanggal'])) ?></span></td>
                                            </tr>
                                            <tr>
                                                <td style="border:none;">Alamat</td>
                                                <td style="border:none;">:</td>
                                                <td style="border:none;"><span style="border-bottom: 1px solid #000; display: block; height: 12px; width: 100%;"></span></td>
                                            </tr>
                                            <tr>
                                                <td style="border:none;"></td>
                                                <td style="border:none;"></td>
                                                <td style="border:none;"><span style="border-bottom: 1px solid #000; display: block; height: 12px; width: 100%;"></span></td>
                                            </tr>
                                            <tr>
                                                <td style="border:none;">Status</td>
                                                <td style="border:none;">:</td>
                                                <td style="border:none;"><span style="border-bottom: 1px solid #000; display: block; height: 12px; width: 100%; font-size: 8px;">(Mohon diisi atau ditempel barcode)</span></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <div style="background-color: #666; color: white; font-weight: bold; text-align: center; padding: 5px; margin-top: 5px;">
                TRIASE
                </div>

                <table style="border-top: none;">
                    <tr>
                        <td width="70%" style="border-top: none;">
                            <table style="width: 100%; border: none;">
                                <tr>
                                    <td style="border: none; width: 80px;">Cara Datang</td>
                                    <td style="border: none; width: 10px;">:</td>
                                    <td style="border: none;">
                                        <input type="checkbox" class="no-click" <?= ($data['cara_datang'] == 'Sendiri') ? 'checked' : '' ?>> Sendiri
                                        <input type="checkbox" class="no-click" <?= ($data['cara_datang'] == 'Ambulan') ? 'checked' : '' ?>> Ambulan
                                        <input type="checkbox" class="no-click" <?= ($data['cara_datang'] == 'Diantar keluarga') ? 'checked' : '' ?>> Diantar Keluarga
                                        <input type="checkbox" class="no-click" <?= ($data['cara_datang'] == 'Diantar Polisi') ? 'checked' : '' ?>> Polisi
                                        <br>
                                        <input type="checkbox" class="no-click" <?= (strpos($data['cara_datang'], 'Rujukan') !== false) ? 'checked' : '' ?>> Rujukan <?= (strpos($data['cara_datang'], 'Rujukan') !== false) ? str_replace('Rujukan', '', $data['cara_datang']) : '....................' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;">Alat Bantu</td>
                                    <td style="border: none;">:</td>
                                    <td style="border: none;">
                                        <input type="checkbox" class="no-click" <?= ($data['alat_bantu'] == 'Jalan Kaki') ? 'checked' : '' ?>> Jalan Kaki
                                        <input type="checkbox" class="no-click" <?= ($data['alat_bantu'] == 'Brankard') ? 'checked' : '' ?>> Brankard
                                        <input type="checkbox" class="no-click" <?= ($data['alat_bantu'] == 'Kursi Roda') ? 'checked' : '' ?>> Kursi Roda
                                        <input type="checkbox" class="no-click" <?= ($data['alat_bantu'] == 'Tongkat/Walker') ? 'checked' : '' ?>> Tongkat/Walker
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;">Kasus</td>
                                    <td style="border: none;">:</td>
                                    <td style="border: none;">

                                        <input type="checkbox" class="no-click"
                                            <?= ($data['kasus'] == 'non_trauma') ? 'checked' : '' ?>> Non Trauma

                                        <input type="checkbox" class="no-click" <?= (strpos($data['kasus'], 'Trauma') !== false) ? 'checked' : '' ?>> Trauma
                                        <?= (strpos($data['kasus'], 'Trauma') !== false) ? str_replace('Trauma', '', $data['kasus']) : '....................' ?>
                                        <br>
                                        <!-- Kebidanan -->
                                        <input type="checkbox" class="no-click"
                                            <?= ($data['kasus'] == 'Kebidanan') ? 'checked' : '' ?>> Kebidanan :
                                        <?php if ($data['kasus'] == 'Kebidanan'): ?>
                                            <!-- Jika status hamil adalah Tidak Hamil -->
                                            <?php if ($data['status_hamil'] == 'Tidak Hamil'): ?>
                                                <span>Tidak Hamil</span>

                                                <!-- Jika status hamil adalah Hamil -->
                                            <?php elseif ($data['status_hamil'] == 'Hamil'): ?>
                                                G: <?= $data['hamil_g'] ?? '...' ?>,
                                                P: <?= $data['hamil_p'] ?? '...' ?>,
                                                A: <?= $data['hamil_a'] ?? '...' ?>,
                                                Hamil: <?= $data['hamil_minggu'] ?? '...' ?> Minggu
                                                <!-- Jika belum memilih status -->
                                            <?php else: ?>
                                                <span>...</span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <table style="border-top: none; margin-top: -6px; width: 100%;">
                    <tr>
                        <td width="20%" class="font-bold bg-grey">Keluhan Utama :</td>
                        <td><?= $data['keluhan_utama'] ?></td>
                    </tr>
                </table>
                <table style="margin-top: -6px; width: 100%;">
                    <tr>
                        <td width="20%" class="font-bold bg-grey">Risiko Jatuh :</td>
                        <td>
                            <input type="checkbox" class="no-click" <?php echo ($data['risiko_jatuh'] == 'Tidak') ? 'checked' : '' ?>> Tidak
                            <input type="checkbox" class="no-click" <?php echo ($data['risiko_jatuh'] == 'Ya') ? 'checked' : '' ?>> Ya
                        </td>
                    </tr>
                </table>
                <table style="margin-top: -6px; width: 100%;">
                    <tbody>
                        <tr>
                            <td class="vital-cell">Tekanan Darah : <?= $data['tekanan_darah']; ?> </td>
                            <td class="vital-cell">suhu : <?= $data['suhu']; ?> </td>
                            <td class="vital-cell">Spo2. : <?= $data['spo2']; ?> </td>
                            <td class="vital-cell">Frequensi Nadi : <?= $data['frequensi_nadi']; ?> </td>
                            <td class="vital-cell">Frequensi Nafas : <?= $data['frequensi_nafas']; ?> </td>
                        </tr>
                    </tbody>
                </table>

                <!-- TABEL GCS DETAIL -->
                <table style="margin-top: -6px; width: 100%;">
                    <tr>
                        <td colspan="4" style="padding:5px; font-weight:bold; background:#f2f2f2;">
                            DETAIL GCS
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:5px; width: 25%;">GCS Total</td>
                        <td style="padding:5px; width: 25%;">
                            <?= $data['gcs'] ?? '...' ?>
                        </td>

                        <td style="padding:5px; width: 25%;">E (Eye)</td>
                        <td style="padding:5px; width: 25%;">
                            <?= $data['e'] ?? '...' ?>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:5px;">V (Verbal)</td>
                        <td style="padding:5px;">
                            <?= $data['v'] ?? '...' ?>
                        </td>

                        <td style="padding:5px;">M (Motorik)</td>
                        <td style="padding:5px;">
                            <?= $data['m'] ?? '...' ?>
                        </td>
                    </tr>
                </table>



                <table class="triase-grid" style="margin-top: -6px;">
                    <tr>
                        <td class="font-bold" style="padding: 5px; width: 20%;">Airway</td>
                        <td style="padding: 5px; width: 20%;">
                            <input type="checkbox" class="no-click" <?= (strpos($data['airway'], 'sumbatan') !== false) ? 'checked' : '' ?>> Sumbatan<br>
                            <input type="checkbox" class="no-click" <?= (strpos($data['airway'], 'ancaman sumbatan') !== false) ? 'checked' : '' ?>> Ancaman Sumbatan
                        </td>
                        <td style="padding: 5px; width: 20%;">
                            <input type="checkbox" class="no-click" <?= (strpos($data['airway'], 'bebas1') !== false) ? 'checked' : '' ?>> Bebas
                        </td>
                        <td style="padding: 5px; width: 20%;">
                            <input type="checkbox" class="no-click" <?= (strpos($data['airway'], 'bebas2') !== false) ? 'checked' : '' ?>> Bebas
                        </td>
                        <td style="padding: 5px; width: 20%; background-color: #f9f9f9;"></td>
                    </tr>


            </td>
        <tr>
            <td class="font-bold">Breathing</td>
            <td>
                <input type="checkbox" class="no-click" <?= (strpos($data['breathing'], 'henti_nafas') !== false) ? 'checked' : '' ?>> Henti Nafas<br>
                <input type="checkbox" class="no-click" <?= (strpos($data['breathing'], 'rr_kurang_10') !== false) ? 'checked' : '' ?>> Napas (<10x /mnt)<br>
                    <input type="checkbox" class="no-click" <?= (strpos($data['breathing'], 'rr_lebih_32') !== false) ? 'checked' : '' ?>> Napas (>32x/mnt)
            </td>
            <td>
                <input type="checkbox" class="no-click" <?= (strpos($data['breathing'], 'rr_25_32') !== false) ? 'checked' : '' ?>> Napas (25–32x/mnt)<br>
                <input type="checkbox" class="no-click" <?= (strpos($data['breathing'], 'whezing') !== false) ? 'checked' : '' ?>> Whezing / Mengi
            </td>
            <td>
                <input type="checkbox" class="no-click" <?= (strpos($data['breathing'], 'normal') !== false) ? 'checked' : '' ?>> Normal<br>
                <input type="checkbox" class="no-click" <?= (strpos($data['breathing'], 'rr_10_24') !== false) ? 'checked' : '' ?>> Napas (10–24x/mnt)
            </td>
            <td>
                <input type="checkbox" class="no-click" <?= (strpos($data['breathing'], 'henti_napas') !== false) ? 'checked' : '' ?>> Henti Napas
            </td>
        </tr>

        <tr>
            <td class="font-bold">Circulation</td>
            <td>
                <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'henti_jantung') !== false) ? 'checked' : '' ?>> Henti Jantung<br>
                <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'nadi_lemah') !== false) ? 'checked' : '' ?>> Nadi Lemah<br>
                <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'nadi_kurang_50') !== false) ? 'checked' : '' ?>> Nadi (<50)<br>
                    <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'nadi_lebih_120') !== false) ? 'checked' : '' ?>> Nadi (>120)<br>
                    <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'akral_dingin') !== false) ? 'checked' : '' ?>> Akral Dingin<br>
                    <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'crt_2') !== false) ? 'checked' : '' ?>> CRT > 2 Detik<br>
                    <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'nyeri_dada') !== false) ? 'checked' : '' ?>> Nyeri Dada
            </td>
            <td>
                <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'nadi_kuat1') !== false) ? 'checked' : '' ?>> Nadi Kuat<br>
                <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'nadi_101_120') !== false) ? 'checked' : '' ?>> Nadi (101–120)<br>
                <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'nadi_51_59') !== false) ? 'checked' : '' ?>> Nadi (51–59)<br>
                <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'akral_hangat') !== false) ? 'checked' : '' ?>> Akral Hangat<br>
                <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'crt_2d') !== false) ? 'checked' : '' ?>> CRT < 2 Detik<br>
                    <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'sistol_lebih_160') !== false) ? 'checked' : '' ?>> Sistol > 160<br>
                    <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'diastol_lebih_100') !== false) ? 'checked' : '' ?>> Diastol > 100
            </td>
            <td>
                <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'nadi_kuat2') !== false) ? 'checked' : '' ?>> Nadi Kuat<br>
                <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'nadi_60_100') !== false) ? 'checked' : '' ?>> Nadi (60–100)<br>
                <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'akral_hangat2') !== false) ? 'checked' : '' ?>> Akral Hangat<br>
                <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'crt_2dd') !== false) ? 'checked' : '' ?>> CRT < 2 Detik<br>
            </td>
            <td>
                <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'hentijantung') !== false) ? 'checked' : '' ?>> Henti Jantung<br>
                <input type="checkbox" class="no-click" <?= (strpos($data['cyrculation'], 'ekg_asistol') !== false) ? 'checked' : '' ?>> EKG Asistol
            </td>
        </tr>

        <tr>
            <td class="font-bold">Kesadaran</td>
            <td>
                <input type="checkbox" class="no-click" <?= (strpos($data['disability'], 'gcs_kurang_12') !== false) ? 'checked' : '' ?>> GCS <12<br>
                    <input type="checkbox" class="no-click" <?= (strpos($data['disability'], 'kejang') !== false) ? 'checked' : '' ?>> Kejang<br>
                    <input type="checkbox" class="no-click" <?= (strpos($data['disability'], 'gelisah') !== false) ? 'checked' : '' ?>> Gelisah
            </td>
            <td>
                <input type="checkbox" class="no-click" <?= (strpos($data['disability'], 'gcs_lebih_12') !== false) ? 'checked' : '' ?>> GCS >12
            </td>
            <td>
                <input type="checkbox" class="no-click" <?= (strpos($data['disability'], 'gcs_15') !== false) ? 'checked' : '' ?>> GCS 15
            </td>
            <td>
                <input type="checkbox" class="no-click" <?= (strpos($data['disability'], 'gcs_3') !== false) ? 'checked' : '' ?>> GCS 3<br>
                <input type="checkbox" class="no-click" <?= (strpos($data['disability'], 'rc') !== false) ? 'checked' : '' ?>> RC (-/-)
            </td>
        </tr>

        <tr style="height: 50px;">
            <td class="font-bold bg-grey text-center" style="vertical-align: middle;">KATEGORI</td>

            <td class="bg-red text-center" style="vertical-align: middle;">
                <input type="checkbox" class="no-click" <?= (strpos($data['kategori'], 'resusitasi') !== false) ? 'checked' : '' ?>> MERAH
                <span style="font-size: 9px;">RESUSITASI</span>
            </td>

            <td class="bg-yellow text-center" style="vertical-align: middle;">
                <input type="checkbox" class="no-click" <?= (strpos($data['kategori'], 'urgent') !== false) ? 'checked' : '' ?>> KUNING
                <span style="font-size: 9px;">URGENT</span>
            </td>

            <td class="bg-green text-center" style="vertical-align: middle;">
                <input type="checkbox" class="no-click" <?= (strpos($data['kategori'], 'non_urgent') !== false) ? 'checked' : '' ?>> HIJAU
                <span style="font-size: 9px;">NON URGENT</span>
            </td>

            <td class="bg-black text-center" style="vertical-align: middle;">
                <input type="checkbox" class="no-click" <?= (strpos($data['kategori'], 'doa') !== false) ? 'checked' : '' ?>> HITAM
                <span style="font-size: 9px;">DOA</span>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td colspan="4" style="padding:5px; font-weight:bold; background:#f2f2f2;">
                DETAIL ASSESMEN
            </td>
        </tr>
        <tr>
            <td style="padding:5px; font-weight:bold; width: 20%;">
                Staff Assesmen
            </td>
            <td style="padding:5px; width: 30%;">
                <?= $data['nama_staff'] ?? '-' ?>
            </td>

            <td style="padding:5px; font-weight:bold; width: 20%;">
                Skala Nyeri
            </td>
            <td style="padding:5px; width: 30%;">
                <?= $data['skala_nyeri'] ?? '-' ?>
            </td>
        </tr>
    </table>
    <table style="border-top: none;">
    <tr>
        <td style="width: 60%; border: none;"> 
            </td>

        <td style="width: 40%; text-align: center; border-left: none; border-top: none;">
            <p style="margin-bottom: 5px;">
                Verifikasi Dokter,
            </p>
            <div style="height: 90px; margin-bottom: 5px; display: inline-block; width: 100%;">
               <?php if ($data['dokter_verif'] && $ttd_dokter): ?>
                    <img src="<?= base_url() . 'assets/ttd/' . $ttd_dokter ?>" width="100px;" height="90px;">
                    <?php else: ?>
                    <div width="100px;" height="90px;">-</div>
                <?php endif ?>
            </div>
            <p style="font-weight: bold;">
                (<?= $data['dokter_verif'] ?? 'Nama Dokter' ?>)
            </p>
        </td>
    </tr>
</table>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            window.print();
        });
        window.onafterprint = function() {
            window.history.back();
        };
    </script>
</body>

</html>