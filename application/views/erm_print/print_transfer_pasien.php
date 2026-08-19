<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Print Form Transfer Pasien IGD</title>
    <style>
        body {
            font-family: "Times New Roman", Arial, sans-serif;
            font-size: 11px;
        }

        .table-utama {
            width: 100%;
            border-collapse: collapse;
        }

        .table-utama td,
        .table-utama th {
            border: 1px solid #000;
            padding: 3px 5px;
            vertical-align: top;
        }

        .no-border td,
        .no-border th {
            border: none;
        }

        .title {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
        }

        .sub-title {
            text-align: center;
            font-size: 11px;
        }

        .section-title {
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 10px;
            margin-bottom: 3px;
        }

        .ttd-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .ttd-table td {
            text-align: center;
            vertical-align: bottom;
            height: 80px;
        }

        .label {
            width: 25%;
        }

        /* Untuk tampilan layar */
        .print-container {
            transform: scale(0.8);
            transform-origin: top left;
            width: 125%;
        }

        /* Untuk hasil print */
        @media print {
            body {
                zoom: 0.8;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <input type="hidden" id="id_history" value="<?= $transfer->id_history ?>">
<script>var base_url = '<?= base_url(); ?>';</script>


    <?php
    // antisipasi null
    $transfer = isset($transfer) ? $transfer : null;
    $pasien   = isset($pasien) ? $pasien : null;

    // shortcut variabel
    $nama_pasien    = $pasien ? $pasien->nama : '';
    $no_rm          = $pasien ? $pasien->no_rm : '';
    $tgl_lahir      = $pasien ? $pasien->tgl_lahir : '';
    $jk             = $pasien ? $pasien->jenis_kelamin : '';
    // $alamat         = $pasien ? ($pasien->alamat . ', ' . $pasien->kelurahan . ', ' . $pasien->kecamatan . ', ' . $pasien->provinsi) : '';
    $tgl_masuk      = $pasien ? $pasien->tgl_masuk : '';
    $cara_bayar     = $pasien ? $pasien->cara_bayar : '';

    $riwayat_dulu_text = isset($riwayat_dulu_text) ? $riwayat_dulu_text : '';

    $pasien_dari        = $transfer ? $transfer->pasien_dari        : '';
    $tt_asal            = $transfer ? $transfer->tt_asal            : '';
    $tiba_di            = $transfer ? $transfer->tiba_di            : '';
    $tt_tujuan          = $transfer ? $transfer->tt_tujuan          : '';
    $dr1                = $transfer ? $transfer->dr1                : '';
    $dr2                = $transfer ? $transfer->dr2                : '';
    $dr3                = $transfer ? $transfer->dr3                : '';
    $dx1                = $transfer ? $transfer->dx1                : '';
    $dx2                = $transfer ? $transfer->dx2                : '';
    $dx3                = $transfer ? $transfer->dx3                : '';
    $prosedur_invasif   = $transfer ? $transfer->prosedur_invasif   : '';
    $tgl_prosedur       = $transfer ? $transfer->tgl_prosedur       : '';
    $indikasi_rawat     = $transfer ? $transfer->indikasi_rawat_inap : '';

    $alergi_obat        = $transfer ? $transfer->alergi_obat        : '';
    $alergi_obat_nama   = $transfer ? $transfer->alergi_obat_nama   : '';
    $kewaspadaan        = $transfer ? $transfer->kewaspadaan        : '';

    $jam_observasi      = $transfer ? $transfer->jam_observasi      : '';
    $pupil_kanan        = $transfer ? $transfer->pupil_kanan        : '';
    $pupil_kiri         = $transfer ? $transfer->pupil_kiri         : '';
    $ews                = $transfer ? $transfer->ews                : '';
    $ews_kategori       = $transfer ? $transfer->ews_kategori       : '';
    $skor_nyeri         = $transfer ? $transfer->skor_nyeri         : '';
    $skor_nyeri_kategori = $transfer ? $transfer->skor_nyeri_kategori : '';
    $skor_jatuh         = $transfer ? $transfer->skor_jatuh         : '';
    $skor_jatuh_kategori = $transfer ? $transfer->skor_jatuh_kategori : '';
    $skor_vte           = $transfer ? $transfer->skor_vte           : '';
    $skor_vte_kategori  = $transfer ? $transfer->skor_vte_kategori  : '';
    $skor_braden        = $transfer ? $transfer->skor_braden        : '';
    $skor_braden_kategori = $transfer ? $transfer->skor_braden_kategori : '';

    $pemberian_makan    = $transfer ? $transfer->pemberian_makan    : '';
    $bab                = $transfer ? $transfer->bab                : '';
    $bak                = $transfer ? $transfer->bak                : '';
    $aktivitas          = $transfer ? $transfer->aktivitas          : '';
    $mobilitas          = $transfer ? $transfer->mobilitas          : '';
    $dekubitus          = $transfer ? $transfer->dekubitus          : '';
    $dekubitus_lokasi   = $transfer ? $transfer->dekubitus_lokasi   : '';
    $gangguan_indra     = $transfer ? $transfer->gangguan_indra     : '';
    $indra_lokasi       = $transfer ? $transfer->indra_lokasi       : '';
    $alat_bantu         = $transfer ? $transfer->alat_bantu         : '';
    $alat_bantu_lokasi  = $transfer ? $transfer->alat_bantu_lokasi  : '';
    $infus              = $transfer ? $transfer->infus              : '';
    $infus_pivas        = $transfer ? $transfer->infus_pivas        : '';
    $infus_tanggal      = $transfer ? $transfer->infus_tanggal      : '';

    $follow_up_rujukan  = $transfer ? $transfer->follow_up_rujukan  : '';
    $terapi_khusus      = $transfer ? $transfer->terapi_khusus      : '';
    $peralatan_khusus   = $transfer ? $transfer->peralatan_khusus   : '';
    $rencana_tindakan   = $transfer ? $transfer->rencana_tindakan   : '';
    $persiapan_khusus   = $transfer ? $transfer->persiapan_khusus   : '';
    $persiapan_pulang   = $transfer ? $transfer->persiapan_pulang   : '';

    $lab_lembar         = $transfer ? $transfer->lab_lembar         : '';
    $xray_lembar        = $transfer ? $transfer->xray_lembar        : '';
    $ctscan_lembar      = $transfer ? $transfer->ctscan_lembar      : '';
    $mri_lembar         = $transfer ? $transfer->mri_lembar         : '';
    $ekg_lembar         = $transfer ? $transfer->ekg_lembar         : '';
    $echo_lembar        = $transfer ? $transfer->echo_lembar        : '';
    $periksa_lainnya    = $transfer ? $transfer->periksa_lainnya    : '';
    $dokumen            = $transfer ? $transfer->dokumen            : '';
    $dokumen_lainnya    = $transfer ? $transfer->dokumen_lainnya    : '';
    $hasil_nilai_kritis = $transfer ? $transfer->hasil_nilai_kritis : '';

    $diserahkan_oleh    = $transfer ? $transfer->diserahkan_oleh    : '';
    $diterima_oleh      = $transfer ? $transfer->diterima_oleh      : '';
    $dokter_jaga_nama   = isset($dokter_jaga_nama) ? $dokter_jaga_nama : '';
    $foto   = isset($foto) ? $foto : '';
    // $ttd_perawat   = isset($ttd_perawat) ? $ttd_perawat : '';

    $tgl_pengajuan      = $transfer ? $transfer->tgl_pengajuan      : '';
    $jam_pengajuan      = $transfer ? $transfer->jam_pengajuan      : '';
    ?>

    <table class="no-border" width="100%">
        <tr>
              <td style="width:15%; text-align:left;">
                <!-- logo jika ada -->
                <img src="<?= base_url('assets/logo.png'); ?>" width="120">
            </td>
            <td style="width:70%; text-align:center;">
                
                <div class="title">FORM TRANSFER PASIEN IGD</div>
                <div class="sub-title">Rumah Sakit ................................................</div>
            </td>
            <td style="width:15%;"></td>
        </tr>
    </table>

    <hr>

    <!-- IDENTITAS PASIEN -->
    <div class="section-title print-container">Identitas Pasien</div>
    <table class="table-utama">
        <tr>
            <td class="label">Nama</td>
            <td><?= htmlspecialchars($nama_pasien); ?></td>
            <td class="label">No. Rekam Medis</td>
            <td><?= htmlspecialchars($no_rm); ?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><?= htmlspecialchars($tgl_lahir); ?></td>
            <td>Jenis Kelamin</td>
            <td><?= htmlspecialchars($jk); ?></td>
        </tr>
        <!-- <tr>
            <td>Alamat</td>
            <td colspan="3"><?= htmlspecialchars($alamat); ?></td>
        </tr> -->
        <tr>
            <td>Tanggal Masuk</td>
            <td><?= htmlspecialchars($tgl_masuk); ?></td>
            <td>Cara Bayar</td>
            <td><?= htmlspecialchars($cara_bayar); ?></td>
        </tr>
    </table>

    <!-- SITUATION -->
    <div class="section-title">Situation</div>
    <table class="table-utama">
        <tr>
            <td class="label">Pasien dari</td>
            <td><?= htmlspecialchars($pasien_dari); ?></td>
            <td class="label">No. TT Asal</td>
            <td><?= htmlspecialchars($tt_asal); ?></td>
        </tr>
        <tr>
            <td>Tiba di</td>
            <td><?= htmlspecialchars($tiba_di); ?></td>
            <td>No. TT Tujuan</td>
            <td><?= htmlspecialchars($tt_tujuan); ?></td>
        </tr>
        <tr>
            <td>Dokter yang merawat 1</td>
            <td><?= htmlspecialchars($dr1); ?></td>
            <td>Dokter yang merawat 2</td>
            <td><?= htmlspecialchars($dr2); ?></td>
        </tr>
        <tr>
            <td>Dokter yang merawat 3</td>
            <td colspan="3"><?= htmlspecialchars($dr3); ?></td>
        </tr>
        <tr>
            <td>Diagnosa medis 1</td>
            <td><?= nl2br(htmlspecialchars($dx1)); ?></td>
            <td>Diagnosa medis 2</td>
            <td><?= nl2br(htmlspecialchars($dx2)); ?></td>
        </tr>
        <tr>
            <td>Diagnosa medis 3</td>
            <td colspan="3"><?= nl2br(htmlspecialchars($dx3)); ?></td>
        </tr>
        <tr>
            <td>Prosedur pembedahan / invasif</td>
            <td colspan="3"><?= nl2br(htmlspecialchars($prosedur_invasif)); ?></td>
        </tr>
        <tr>
            <td>Tanggal prosedur</td>
            <td><?= htmlspecialchars($tgl_prosedur); ?></td>
            <td>Indikasi Rawat Inap</td>
            <td><?= nl2br(htmlspecialchars($indikasi_rawat)); ?></td>
        </tr>
    </table>

    <!-- BACKGROUND -->
    <div class="section-title">Background</div>
    <table class="table-utama">
        <tr>
            <td class="label">Riwayat alergi obat</td>
            <td><?= htmlspecialchars($alergi_obat); ?></td>
            <td class="label">Nama obat bila alergi</td>
            <td><?= htmlspecialchars($alergi_obat_nama); ?></td>
        </tr>
        <tr>
            <td>Kewaspadaan</td>
            <td colspan="3"><?= htmlspecialchars($kewaspadaan); ?></td>
        </tr>
        <tr>
            <td>Riwayat penyakit terdahulu</td>
            <td colspan="3"><?= nl2br(htmlspecialchars($riwayat_dulu_text)); ?></td>
        </tr>
    </table>

    <!-- ASSESSMENT -->
    <div class="section-title">Assessment</div>
    <table class="table-utama">
        <tr>
            <td class="label">Observasi terakhir jam</td>
            <td><?= htmlspecialchars($jam_observasi); ?></td>
            <td class="label">Pupil kanan</td>
            <td><?= htmlspecialchars($pupil_kanan); ?></td>
        </tr>
       <tr>
        <td>GCS</td>
        <td><?= isset($triase->gcs) ? $triase->gcs : '' ?></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>E</td>
        <td><?= isset($triase->e) ? $triase->e : '' ?></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>M</td>
        <td><?= isset($triase->m) ? $triase->m : '' ?></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>V</td>
        <td><?= isset($triase->v) ? $triase->v : '' ?></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Tekanan Darah</td>
        <td><?= isset($triase->tekanan_darah) ? $triase->tekanan_darah : '' ?></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Frequensi Nadi</td>
        <td><?= isset($triase->frequensi_nadi) ? $triase->frequensi_nadi : '' ?></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Frequensi Nafas</td>
        <td><?= isset($triase->frequensi_nafas) ? $triase->frequensi_nafas : '' ?></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Suhu</td>
        <td><?= isset($triase->suhu) ? $triase->suhu : '' ?></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>SpO2</td>
        <td><?= isset($triase->spo2) ? $triase->spo2 : '' ?></td>
        <td></td>
        <td></td>
    </tr>
        <tr>
            <td>Pupil kiri</td>
            <td><?= htmlspecialchars($pupil_kiri); ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>EWS / PEWS / MEWS</td>
            <td><?= htmlspecialchars($ews); ?></td>
            <td>Kategori</td>
            <td><?= htmlspecialchars($ews_kategori); ?></td>
        </tr>
        <tr>
            <td>Skor nyeri</td>
            <td><?= htmlspecialchars($skor_nyeri); ?></td>
            <td>Kategori</td>
            <td><?= htmlspecialchars($skor_nyeri_kategori); ?></td>
        </tr>
        <tr>
            <td>Skor risiko jatuh</td>
            <td><?= htmlspecialchars($skor_jatuh); ?></td>
            <td>Kategori</td>
            <td><?= htmlspecialchars($skor_jatuh_kategori); ?></td>
        </tr>
        <tr>
            <td>Skor risiko VTE</td>
            <td><?= htmlspecialchars($skor_vte); ?></td>
            <td>Kategori</td>
            <td><?= htmlspecialchars($skor_vte_kategori); ?></td>
        </tr>
        <tr>
            <td>Skor Braden / Glamorgan</td>
            <td><?= htmlspecialchars($skor_braden); ?></td>
            <td>Kategori</td>
            <td><?= htmlspecialchars($skor_braden_kategori); ?></td>
        </tr>
    </table>

    <!-- PEMBERIAN MAKAN, ELIMINASI, AKTIVITAS -->
    <div class="section-title">Pemberian Makan dan Cairan, Eliminasi, Aktivitas</div>
    <table class="table-utama">
        <tr>
            <td class="label">Pemberian makan dan cairan</td>
            <td><?= htmlspecialchars($pemberian_makan); ?></td>
            <td class="label">BAB</td>
            <td><?= htmlspecialchars($bab); ?></td>
        </tr>
        <tr>
            <td>BAK</td>
            <td><?= htmlspecialchars($bak); ?></td>
            <td>Aktivitas</td>
            <td><?= htmlspecialchars($aktivitas); ?></td>
        </tr>
        <tr>
            <td>Mobilitas</td>
            <td><?= htmlspecialchars($mobilitas); ?></td>
            <td>Luka / dekubitus</td>
            <td><?= htmlspecialchars($dekubitus) . ' ' . htmlspecialchars($dekubitus_lokasi); ?></td>
        </tr>
        <tr>
            <td>Gangguan indra</td>
            <td><?= htmlspecialchars($gangguan_indra) . ' ' . htmlspecialchars($indra_lokasi); ?></td>
            <td>Alat bantu</td>
            <td><?= htmlspecialchars($alat_bantu) . ' ' . htmlspecialchars($alat_bantu_lokasi); ?></td>
        </tr>
        <tr>
            <td>Infus</td>
            <td><?= htmlspecialchars($infus); ?></td>
            <td>PIVAS / tgl pemasangan</td>
            <td><?= htmlspecialchars($infus_pivas) . ' / ' . htmlspecialchars($infus_tanggal); ?></td>
        </tr>
    </table>

    <!-- RECOMMENDATIONS -->
    <div class="section-title">Recommendations</div>
    <table class="table-utama">
        <tr>
            <td class="label">Follow up rujukan</td>
            <td><?= nl2br(htmlspecialchars($follow_up_rujukan)); ?></td>
        </tr>
        <tr>
            <td>Terapi khusus</td>
            <td><?= nl2br(htmlspecialchars($terapi_khusus)); ?></td>
        </tr>
        <tr>
            <td>Peralatan khusus</td>
            <td><?= nl2br(htmlspecialchars($peralatan_khusus)); ?></td>
        </tr>
        <tr>
            <td>Rencana tindakan / pemeriksaan</td>
            <td><?= nl2br(htmlspecialchars($rencana_tindakan)); ?></td>
        </tr>
        <tr>
            <td>Persiapan khusus</td>
            <td><?= nl2br(htmlspecialchars($persiapan_khusus)); ?></td>
        </tr>
        <tr>
            <td>Persiapan pulang</td>
            <td><?= nl2br(htmlspecialchars($persiapan_pulang)); ?></td>
        </tr>
    </table>

    <!-- HASIL PEMERIKSAAN -->
    <div class="section-title">Hasil Pemeriksaan dan Dokumen</div>
    <table class="table-utama">
        <tr>
            <td class="label">Lab, lembar</td>
            <td><?= htmlspecialchars($lab_lembar); ?></td>
            <td class="label">X Ray, lembar</td>
            <td><?= htmlspecialchars($xray_lembar); ?></td>
        </tr>
        <tr>
            <td>CT Scan, lembar</td>
            <td><?= htmlspecialchars($ctscan_lembar); ?></td>
            <td>MRI, lembar</td>
            <td><?= htmlspecialchars($mri_lembar); ?></td>
        </tr>
        <tr>
            <td>EKG, lembar</td>
            <td><?= htmlspecialchars($ekg_lembar); ?></td>
            <td>Echo, lembar</td>
            <td><?= htmlspecialchars($echo_lembar); ?></td>
        </tr>
        <tr>
            <td>Pemeriksaan lain</td>
            <td><?= htmlspecialchars($periksa_lainnya); ?></td>
            <td>Dokumen</td>
            <td><?= htmlspecialchars($dokumen) . ' ' . htmlspecialchars($dokumen_lainnya); ?></td>
        </tr>
        <tr>
            <td>Hasil nilai kritis</td>
            <td colspan="3"><?= nl2br(htmlspecialchars($hasil_nilai_kritis)); ?></td>
        </tr>
    </table>

    <!-- TANDA TANGAN -->
    <div class="section-title">Tanda Tangan</div>
    <table class="ttd-table">
        <tr>
            <td>Diserahkan oleh<br>(Perawat / Incharge)</td>
            <td>Diterima oleh<br>(Perawat / Incharge)</td>
            <td>Dokter Jaga IGD</td>
        </tr>
        <tr>
            <td>
                <!-- ruang tanda tangan -->
                <img width="80" src="<?= base_url('assets/qr_code/') . $ttd_perawat  ?>" />
                <br><br><br>
                <u><?= htmlspecialchars($nama_per1); ?></u>
            </td>
            <td>

                <img width="80" src="<?= base_url('assets/qr_code/') . $ttd_perawat  ?>" />
                <br><br><br>
                <u><?= htmlspecialchars($nama_per2); ?></u>
            </td>
            <td>

                <img width="80" src="<?= base_url('assets/ttd/') . $foto  ?>" />
                <br><br><br>
                <u><?= htmlspecialchars($dokter_jaga_nama); ?></u>
            </td>
        </tr>
    </table>

    <table class="no-border" width="100%" style="margin-top:10px;">
        <tr>
            <td style="text-align:left;">
                Tanggal pengajuan: <?= htmlspecialchars($tgl_pengajuan); ?>, Jam: <?= htmlspecialchars($jam_pengajuan); ?>
            </td>
        </tr>
    </table>

</body>

</html>


