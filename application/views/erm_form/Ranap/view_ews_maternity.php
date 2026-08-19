<style>
    .form-control {
        border-radius: 2px !important;
        border: 1px solid #cccccc;
        box-shadow: none !important;
    }

    .form-control[disabled] {
        background-color: #ececec !important;
        color: #222222;
        border-color: #e0e0e0;
    }

    /* Fix Layout Grid Zoom 100% */
    .row-flex {
        display: flex;
        flex-wrap: wrap;
    }

    .row-flex>[class*='col-'] {
        display: flex;
        flex-direction: column;
    }

    .ews-card-box {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 2px !important;
        padding: 12px 16px;
        margin-bottom: 12px;
        box-shadow: none !important;
        flex: 1;
        /* Memastikan tinggi card box konsisten */
    }

    .ews-param-title {
        font-weight: 600;
        font-size: 13px;
        color: #1e293b;
        margin-bottom: 10px;
        display: block;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 5px;
    }

    .radio-group-horizontal {
        display: flex;
        flex-wrap: wrap;
        gap: 10px 16px;
        align-items: center;
    }

    .radio-item-inline {
        display: inline-flex;
        align-items: center;
        margin-bottom: 0 !important;
        cursor: pointer;
    }

    .radio-item-inline input[type="radio"] {
        margin-top: 0;
        margin-right: 6px;
        cursor: pointer;
    }

    .ews-badge {
        display: inline-block;
        padding: 4px 10px;
        font-size: 12px;
        font-weight: 600;
        border-radius: 2px !important;
        letter-spacing: 0.1px;
        line-height: 1.2;
    }

    .badge-merah {
        background-color: #b91c1c !important;
        color: #ffffff;
    }

    .badge-kuning {
        background-color: #d97706 !important;
        color: #ffffff;
    }

    .badge-hijau {
        background-color: #15803d !important;
        color: #ffffff;
    }

    .badge-putih {
        background-color: #ffffff !important;
        color: #1e293b;
        border: 1px solid #cccccc;
    }
</style>

<?php
// Logika Perhitungan Umur Otomatis
$val_tgl_lahir = $tgl_lahir ?? '';
if (!empty($val_tgl_lahir) && strtotime($val_tgl_lahir)) {
    $dob = new DateTime($val_tgl_lahir);
    $today = new DateTime('today');
    $umur = $today->diff($dob)->y;
    $val_tgl_lahir_umur = $val_tgl_lahir . ' (' . $umur . ' Thn)';
} else {
    $val_tgl_lahir_umur = $val_tgl_lahir;
}
?>

<!-- Row Utama -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view" style="border-radius: 2px;">
            <div class="panel-heading">
                <div class="pull-left">
                    <h5 class="mb-15" style="padding-bottom: 8px;">
                        <strong class="txt-dark"><i></i>EWS MATERNITY (MOEWS)</strong>
                    </h5>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">

                        <!-- INFORMASI PASIEN -->
                        <div class="row">
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label mb-5 text-left">No.RM</label>
                                <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM" maxlength="20">
                                <input type="hidden" id="inPel" value="<?= $id_pelayanan ?>">
                                <input type="hidden" id="inHis" value="<?= $id_history ?>">
                                <input type="hidden" id="id_form" value="<?= isset($id_form) ? $id_form : '' ?>">
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label mb-5 text-left">Nama Pasien</label>
                                <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama" maxlength="100">
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label mb-5 text-left">Tgl Lahir / Umur</label>
                                <input type="text" disabled class="form-control" value="<?= $val_tgl_lahir_umur ?>" id="inTglLahir">
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label mb-5 text-left">Jenis Kelamin</label>
                                <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk">
                            </div>
                        </div>

                        <!-- DATA KEBIDANAN & DIAGNOSA & RUANGAN & DOKTER -->
                        <div class="row mb-15">
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label mb-5 text-left">Gravida / Para / Abortus</label>
                                <div style="display:flex; gap:8px;">
                                    <input type="number" class="form-control" id="inGravida" placeholder="G" min="0" max="99" oninput="if(this.value.length > 2) this.value = this.value.slice(0, 2);">
                                    <input type="number" class="form-control" id="inPara" placeholder="P" min="0" max="99" oninput="if(this.value.length > 2) this.value = this.value.slice(0, 2);">
                                    <input type="number" class="form-control" id="inAbortus" placeholder="A" min="0" max="99" oninput="if(this.value.length > 2) this.value = this.value.slice(0, 2);">
                                </div>
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label mb-5 text-left">Usia Kehamilan (Mgg/Hr)</label>
                                <div style="display:flex; gap:8px;">
                                    <input type="number" class="form-control" id="inMinggu" placeholder="Minggu" min="0" max="50" oninput="if(this.value.length > 2) this.value = this.value.slice(0, 2);">
                                    <input type="number" class="form-control" id="inHari" placeholder="Hari" min="0" max="6" oninput="if(this.value.length > 1) this.value = this.value.slice(0, 1);">
                                </div>
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label mb-5 text-left">Ruangan</label>
                                <input type="text" disabled class="form-control" id="inRuangan" value="<?= isset($nama_ruangan) ? $nama_ruangan : '' ?>">
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label mb-5 text-left">Dokter / DPJP</label>
                                <input type="text" disabled class="form-control" id="inDokter" value="<?= isset($nama_dokter) ? $nama_dokter : '' ?>" placeholder="Nama Dokter">
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label mb-5 text-left">Tanggal & Jam Periksa</label>
                                <div style="display:flex; gap:8px;">
                                    <input type="date" class="form-control" id="inTglPeriksa">
                                    <input type="time" class="form-control" id="inJamPeriksa">
                                </div>
                            </div>

                            <div class="form-group col-md-9 col-sm-6">
                                <label class="control-label mb-5 text-left">Diagnosa</label>
                                <input type="text" class="form-control" id="inDiagnosa" placeholder="Masukkan Diagnosa Pasien" value="<?= isset($diagnosa_pasien) ? $diagnosa_pasien : '' ?>">
                            </div>
                        </div>

                        <!-- PANTAUAN HARIAN KESEHATAN PASIEN -->
                        <div class="row" id="spirit">
                            <div class="col-md-12">
                                <h5 class="mb-15" style="border-bottom: 2px solid #e2e2e2; padding-bottom: 8px;">
                                    <strong class="txt-dark"><i class="fa fa-heartbeat mr-10"></i>PANTAUAN TANDA VITAL UTAMA</strong>
                                </h5>
                            </div>

                            <!-- 1. Respirasi -->
                            <div class="col-md-12">
                                <div class="ews-card-box">
                                    <span class="ews-param-title">Respirasi (x/menit) <span id="respirasi_error" class="text-danger font-12"></span></span>
                                    <div class="radio-group-horizontal">
                                        <label class="radio-item-inline" for="respirasi6">
                                            <input id="respirasi6" type="radio" name="respirasi" value="3">
                                            <span class="ews-badge badge-merah">&lt; 10</span>
                                        </label>
                                        <label class="radio-item-inline" for="respirasi5">
                                            <input id="respirasi5" type="radio" name="respirasi" value="2">
                                            <span class="ews-badge badge-kuning">10 - 11</span>
                                        </label>
                                        <label class="radio-item-inline" for="respirasi3">
                                            <input id="respirasi3" type="radio" name="respirasi" value="0">
                                            <span class="ews-badge badge-putih">12 - 19</span>
                                        </label>
                                        <label class="radio-item-inline" for="respirasi4">
                                            <input id="respirasi4" type="radio" name="respirasi" value="1">
                                            <span class="ews-badge badge-hijau">20 - 24</span>
                                        </label>
                                        <label class="radio-item-inline" for="respirasi2">
                                            <input id="respirasi2" type="radio" name="respirasi" value="2">
                                            <span class="ews-badge badge-kuning">25 - 29</span>
                                        </label>
                                        <label class="radio-item-inline" for="respirasi1">
                                            <input id="respirasi1" type="radio" name="respirasi" value="3">
                                            <span class="ews-badge badge-merah">&ge; 30</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- 2. Saturasi Oksigen -->
                            <div class="col-md-12">
                                <div class="ews-card-box">
                                    <span class="ews-param-title">Saturasi Oksigen (%) <span id="oksigen_error" class="text-danger font-12"></span></span>
                                    <div class="radio-group-horizontal">
                                        <label class="radio-item-inline" for="oksigen1">
                                            <input id="oksigen1" type="radio" name="oksigen" value="3">
                                            <span class="ews-badge badge-merah">&lt; 92%</span>
                                        </label>
                                        <label class="radio-item-inline" for="oksigen2">
                                            <input id="oksigen2" type="radio" name="oksigen" value="2">
                                            <span class="ews-badge badge-kuning">92% - 95%</span>
                                        </label>
                                        <label class="radio-item-inline" for="oksigen3">
                                            <input id="oksigen3" type="radio" name="oksigen" value="0">
                                            <span class="ews-badge badge-putih">&gt; 95%</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. Suhu -->
                            <div class="col-md-12">
                                <div class="ews-card-box">
                                    <span class="ews-param-title">Suhu (°C) <span id="suhu_error" class="text-danger font-12"></span></span>
                                    <div class="radio-group-horizontal">
                                        <label class="radio-item-inline" for="suhu6">
                                            <input id="suhu6" type="radio" name="suhu" value="3">
                                            <span class="ews-badge badge-merah">&le; 35.0°C</span>
                                        </label>
                                        <label class="radio-item-inline" for="suhu5">
                                            <input id="suhu5" type="radio" name="suhu" value="2">
                                            <span class="ews-badge badge-kuning">35.1°C - 35.9°C</span>
                                        </label>
                                        <label class="radio-item-inline" for="suhu3">
                                            <input id="suhu3" type="radio" name="suhu" value="0">
                                            <span class="ews-badge badge-putih">36.0°C - 37.4°C</span>
                                        </label>
                                        <label class="radio-item-inline" for="suhu4">
                                            <input id="suhu4" type="radio" name="suhu" value="1">
                                            <span class="ews-badge badge-hijau">37.5°C - 37.9°C</span>
                                        </label>
                                        <label class="radio-item-inline" for="suhu2">
                                            <input id="suhu2" type="radio" name="suhu" value="2">
                                            <span class="ews-badge badge-kuning">38.0°C - 38.9°C</span>
                                        </label>
                                        <label class="radio-item-inline" for="suhu1">
                                            <input id="suhu1" type="radio" name="suhu" value="3">
                                            <span class="ews-badge badge-merah">&ge; 39.0°C</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- 4. TD Sistolik -->
                            <div class="col-md-12">
                                <div class="ews-card-box">
                                    <span class="ews-param-title">Tekanan Darah Sistolik (mmHg) <span id="sistolik_error" class="text-danger font-12"></span></span>
                                    <div class="radio-group-horizontal">
                                        <label class="radio-item-inline" for="sistolik7">
                                            <input id="sistolik7" type="radio" name="sistolik" value="3">
                                            <span class="ews-badge badge-merah">&lt; 70</span>
                                        </label>
                                        <label class="radio-item-inline" for="sistolik6">
                                            <input id="sistolik6" type="radio" name="sistolik" value="2">
                                            <span class="ews-badge badge-kuning">70 - 79</span>
                                        </label>
                                        <label class="radio-item-inline" for="sistolik5">
                                            <input id="sistolik5" type="radio" name="sistolik" value="1">
                                            <span class="ews-badge badge-hijau">80 - 89</span>
                                        </label>
                                        <label class="radio-item-inline" for="sistolik4">
                                            <input id="sistolik4" type="radio" name="sistolik" value="0">
                                            <span class="ews-badge badge-putih">90 - 139</span>
                                        </label>
                                        <label class="radio-item-inline" for="sistolik3">
                                            <input id="sistolik3" type="radio" name="sistolik" value="1">
                                            <span class="ews-badge badge-hijau">140 - 149</span>
                                        </label>
                                        <label class="radio-item-inline" for="sistolik2">
                                            <input id="sistolik2" type="radio" name="sistolik" value="2">
                                            <span class="ews-badge badge-kuning">150 - 159</span>
                                        </label>
                                        <label class="radio-item-inline" for="sistolik1">
                                            <input id="sistolik1" type="radio" name="sistolik" value="3">
                                            <span class="ews-badge badge-merah">&ge; 160</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- 5. TD Diastolik -->
                            <div class="col-md-12">
                                <div class="ews-card-box">
                                    <span class="ews-param-title">Tekanan Darah Diastolik (mmHg) <span id="diastolik_error" class="text-danger font-12"></span></span>
                                    <div class="radio-group-horizontal">
                                        <label class="radio-item-inline" for="diastolik5">
                                            <input id="diastolik5" type="radio" name="diastolik" value="3">
                                            <span class="ews-badge badge-merah">&lt; 50</span>
                                        </label>
                                        <label class="radio-item-inline" for="diastolik6">
                                            <input id="diastolik6" type="radio" name="diastolik" value="2">
                                            <span class="ews-badge badge-kuning">50 - 69</span>
                                        </label>
                                        <label class="radio-item-inline" for="diastolik4">
                                            <input id="diastolik4" type="radio" name="diastolik" value="0">
                                            <span class="ews-badge badge-putih">70 - 89</span>
                                        </label>
                                        <label class="radio-item-inline" for="diastolik3">
                                            <input id="diastolik3" type="radio" name="diastolik" value="1">
                                            <span class="ews-badge badge-hijau">90 - 99</span>
                                        </label>
                                        <label class="radio-item-inline" for="diastolik2">
                                            <input id="diastolik2" type="radio" name="diastolik" value="2">
                                            <span class="ews-badge badge-kuning">100 - 109</span>
                                        </label>
                                        <label class="radio-item-inline" for="diastolik1">
                                            <input id="diastolik1" type="radio" name="diastolik" value="3">
                                            <span class="ews-badge badge-merah">&ge; 110</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- 6. Nadi -->
                            <div class="col-md-12">
                                <div class="ews-card-box">
                                    <span class="ews-param-title">Nadi / Denyut Jantung (x/menit) <span id="nadi_error" class="text-danger font-12"></span></span>
                                    <div class="radio-group-horizontal">
                                        <label class="radio-item-inline" for="nadi11">
                                            <input id="nadi11" type="radio" name="nadi" value="3">
                                            <span class="ews-badge badge-merah">&lt; 40</span>
                                        </label>
                                        <label class="radio-item-inline" for="nadi10">
                                            <input id="nadi10" type="radio" name="nadi" value="2">
                                            <span class="ews-badge badge-kuning">40 - 49</span>
                                        </label>
                                        <label class="radio-item-inline" for="nadi6">
                                            <input id="nadi6" type="radio" name="nadi" value="0">
                                            <span class="ews-badge badge-putih">50 - 99</span>
                                        </label>
                                        <label class="radio-item-inline" for="nadi5">
                                            <input id="nadi5" type="radio" name="nadi" value="1">
                                            <span class="ews-badge badge-hijau">100 - 109</span>
                                        </label>
                                        <label class="radio-item-inline" for="nadi3">
                                            <input id="nadi3" type="radio" name="nadi" value="2">
                                            <span class="ews-badge badge-kuning">110 - 129</span>
                                        </label>
                                        <label class="radio-item-inline" for="nadi1">
                                            <input id="nadi1" type="radio" name="nadi" value="3">
                                            <span class="ews-badge badge-merah">&ge; 130</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- PARAMETER OBSTETRI -->
                            <div class="col-md-12" style="margin-top: 10px;">
                                <h5 class="mb-15" style="border-bottom: 2px solid #e2e2e2; padding-bottom: 8px;">
                                    <strong class="txt-dark"><i class="fa fa-stethoscope mr-10"></i>PARAMETER OBSTETRI</strong>
                                </h5>
                            </div>

                            <!-- 7. Tingkat Kesadaran -->
                            <div class="col-md-12">
                                <div class="ews-card-box">
                                    <span class="ews-param-title">Tingkat Kesadaran (AVPU) <span id="kesadaran_error" class="text-danger font-12"></span></span>
                                    <div class="radio-group-horizontal">
                                        <label class="radio-item-inline" for="kesadaran4">
                                            <input id="kesadaran4" type="radio" name="kesadaran" value="0">
                                            <span class="ews-badge badge-putih">SADAR (Skor 0)</span>
                                        </label>
                                        <label class="radio-item-inline" for="kesadaran3">
                                            <input id="kesadaran3" type="radio" name="kesadaran" value="1">
                                            <span class="ews-badge badge-hijau">RESPON SUARA (Skor 1)</span>
                                        </label>
                                        <label class="radio-item-inline" for="kesadaran2">
                                            <input id="kesadaran2" type="radio" name="kesadaran" value="2">
                                            <span class="ews-badge badge-kuning">RESPON NYERI (Skor 2)</span>
                                        </label>
                                        <label class="radio-item-inline" for="kesadaran1">
                                            <input id="kesadaran1" type="radio" name="kesadaran" value="3">
                                            <span class="ews-badge badge-merah">TIDAK RESPON (Skor 3)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- MENGGUNAKAN ROW FLEX AGAR TIDAK BERANTAKAN DI ZOOM 100% -->
                            <div class="col-md-12 p-0">
                                <div class="row row-flex">
                                    <!-- 8. Produksi Urin -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="ews-card-box">
                                            <span class="ews-param-title">Produksi Urin (ml/jam) <span id="produksi_urin_error" class="text-danger font-12"></span></span>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-item-inline" for="prod_urin4">
                                                    <input id="prod_urin4" type="radio" name="produksi_urin" value="0">
                                                    <span class="ews-badge badge-putih">&gt; 50</span>
                                                </label>
                                                <label class="radio-item-inline" for="prod_urin3">
                                                    <input id="prod_urin3" type="radio" name="produksi_urin" value="1">
                                                    <span class="ews-badge badge-hijau">30 - 50</span>
                                                </label>
                                                <label class="radio-item-inline" for="prod_urin2">
                                                    <input id="prod_urin2" type="radio" name="produksi_urin" value="2">
                                                    <span class="ews-badge badge-kuning">10 - 30</span>
                                                </label>
                                                <label class="radio-item-inline" for="prod_urin1">
                                                    <input id="prod_urin1" type="radio" name="produksi_urin" value="3">
                                                    <span class="ews-badge badge-merah">&lt; 10</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 9. Nyeri -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="ews-card-box">
                                            <span class="ews-param-title">Nyeri <span id="nyeri_error" class="text-danger font-12"></span></span>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-item-inline" for="nyeri4">
                                                    <input id="nyeri4" type="radio" name="nyeri" value="0">
                                                    <span class="ews-badge badge-putih">Normal</span>
                                                </label>
                                                <label class="radio-item-inline" for="nyeri3">
                                                    <input id="nyeri3" type="radio" name="nyeri" value="1">
                                                    <span class="ews-badge badge-hijau">Nyeri Ringan</span>
                                                </label>
                                                <label class="radio-item-inline" for="nyeri2">
                                                    <input id="nyeri2" type="radio" name="nyeri" value="2">
                                                    <span class="ews-badge badge-kuning">Nyeri Sedang</span>
                                                </label>
                                                <label class="radio-item-inline" for="nyeri1">
                                                    <input id="nyeri1" type="radio" name="nyeri" value="3">
                                                    <span class="ews-badge badge-merah">Nyeri Berat</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 10. Lochea / Perdarahan -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="ews-card-box">
                                            <span class="ews-param-title">Lochea / Perdarahan <span id="lokia_error" class="text-danger font-12"></span></span>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-item-inline" for="lokia4">
                                                    <input id="lokia4" type="radio" name="lokia" value="0">
                                                    <span class="ews-badge badge-putih">Normal</span>
                                                </label>
                                                <label class="radio-item-inline" for="lokia3">
                                                    <input id="lokia3" type="radio" name="lokia" value="1">
                                                    <span class="ews-badge badge-hijau">Abnormal (Ringan)</span>
                                                </label>
                                                <label class="radio-item-inline" for="lokia2">
                                                    <input id="lokia2" type="radio" name="lokia" value="2">
                                                    <span class="ews-badge badge-kuning">Abnormal (Sedang)</span>
                                                </label>
                                                <label class="radio-item-inline" for="lokia1">
                                                    <input id="lokia1" type="radio" name="lokia" value="3">
                                                    <span class="ews-badge badge-merah">Abnormal (Berat)</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 11. Proteinuria -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="ews-card-box">
                                            <span class="ews-param-title">Proteinuria <span id="protein_urin_error" class="text-danger font-12"></span></span>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-item-inline" for="protein4">
                                                    <input id="protein4" type="radio" name="protein_urin" value="0">
                                                    <span class="ews-badge badge-putih">Negatif</span>
                                                </label>
                                                <label class="radio-item-inline" for="protein3">
                                                    <input id="protein3" type="radio" name="protein_urin" value="1">
                                                    <span class="ews-badge badge-hijau">+</span>
                                                </label>
                                                <label class="radio-item-inline" for="protein2">
                                                    <input id="protein2" type="radio" name="protein_urin" value="2">
                                                    <span class="ews-badge badge-kuning">++</span>
                                                </label>
                                                <label class="radio-item-inline" for="protein1">
                                                    <input id="protein1" type="radio" name="protein_urin" value="3">
                                                    <span class="ews-badge badge-merah">+++</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 12. Perdarahan Obstetri -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="ews-card-box">
                                            <span class="ews-param-title">Perdarahan Obstetri <span id="pendarahan_obstetri_error" class="text-danger font-12"></span></span>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-item-inline" for="pendarahan4">
                                                    <input id="pendarahan4" type="radio" name="pendarahan_obstetri" value="0">
                                                    <span class="ews-badge badge-putih">Tidak Ada</span>
                                                </label>
                                                <label class="radio-item-inline" for="pendarahan3">
                                                    <input id="pendarahan3" type="radio" name="pendarahan_obstetri" value="1">
                                                    <span class="ews-badge badge-hijau">Ringan (&lt; 500 ml)</span>
                                                </label>
                                                <label class="radio-item-inline" for="pendarahan2">
                                                    <input id="pendarahan2" type="radio" name="pendarahan_obstetri" value="2">
                                                    <span class="ews-badge badge-kuning">Sedang (500 - 999 ml)</span>
                                                </label>
                                                <label class="radio-item-inline" for="pendarahan1">
                                                    <input id="pendarahan1" type="radio" name="pendarahan_obstetri" value="3">
                                                    <span class="ews-badge badge-merah">Masif (&ge; 1000 ml)</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 13. DDJ / Kondisi Janin -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="ews-card-box">
                                            <span class="ews-param-title">DDJ / Denyut Jantung Janin (x/menit) <span id="ddj_error" class="text-danger font-12"></span></span>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-item-inline" for="ddj5">
                                                    <input id="ddj5" type="radio" name="ddj" value="3">
                                                    <span class="ews-badge badge-merah">&lt; 100</span>
                                                </label>
                                                <label class="radio-item-inline" for="ddj4">
                                                    <input id="ddj4" type="radio" name="ddj" value="2">
                                                    <span class="ews-badge badge-kuning">100 - 120</span>
                                                </label>
                                                <label class="radio-item-inline" for="ddj3">
                                                    <input id="ddj3" type="radio" name="ddj" value="0">
                                                    <span class="ews-badge badge-putih">Normal</span>
                                                </label>
                                                <label class="radio-item-inline" for="ddj2">
                                                    <input id="ddj2" type="radio" name="ddj" value="1">
                                                    <span class="ews-badge badge-hijau">121 - 159</span>
                                                </label>
                                                <label class="radio-item-inline" for="ddj1">
                                                    <input id="ddj1" type="radio" name="ddj" value="3">
                                                    <span class="ews-badge badge-merah">&gt; 160</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- TOTAL SKOR & KETERANGAN EWS -->
                        <div class="row" style="margin-top: 5px;">
                            <div class="col-md-12">
                                <div class="ews-card-box" style="background: #fcfcfc; border: 1px solid #d1d5db; padding: 12px 16px;">
                                    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 15px;">

                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            <label class="control-label mb-0" style="white-space: nowrap; font-weight: 600;">Total Skor EWS :</label>
                                            <input class="form-control text-center" id="total_ews" name="total_ews" value="0" readonly style="font-weight:bold; font-size: 18px; color: #1e293b; background: #fff; width: 75px; height: 36px; margin-bottom: 0;">
                                        </div>

                                        <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                                            <label class="control-label mb-0" style="white-space: nowrap; font-weight: 600; font-size: 12px;">KATEGORI ZONA RESIKO EWS :</label>
                                            <span class="ews-badge badge-putih">0 : Tidak Beresiko</span>
                                            <span class="ews-badge badge-hijau">1 - 4 : Resiko Rendah</span>
                                            <span class="ews-badge badge-kuning">5 - 6 : Resiko Sedang</span>
                                            <span class="ews-badge badge-merah">&gt; 7 : Resiko Tinggi</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ID Staff -->
                        <input type="hidden" name="staff" value="<?= $id_staff ?>">

                        <!-- Action Buttons -->
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-md-12 text-right">
                                <a class="btn btn-default btn-anim btn-sm" style="border-radius:2px;" onclick="javascript:history.go(-1)">
                                    <i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span>
                                </a>
                                <button id="simpan" onclick="simpan()" type="button" class="btn btn-success" style="border-radius:2px;">
                                    <i class="fa fa-save mr-5"></i> Simpan
                                </button>
                                <button id="edit" style="display:none; border-radius:2px;" type="button" class="btn btn-warning" onclick="edit()">
                                    <i class="fa fa-edit mr-5"></i> Update
                                </button>
                                <button id="reset" style="border-radius:2px;" type="button" class="btn btn-default" onclick="resetForm()">
                                    <i class="fa fa-refresh mr-5"></i> Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TABEL EWS -->
                <div class="panel panel-default card-view" style="margin-top: 25px; border-radius:2px;">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">TABEL RIWAYAT EWS</span></h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-hover display pb-60" id="tabel_ews">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>PILIH</th>
                                                <th>HAPUS</th>
                                                <th>CETAK</th>
                                                <th>TANGGAL</th>
                                                <th>WAKTU</th>
                                                <th>RUANGAN</th>
                                                <th>TOTAL EWS</th>
                                            </tr>
                                        </thead>
                                        <tbody style="color: black"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    const radioGroups = ['respirasi', 'oksigen', 'suhu', 'sistolik', 'diastolik', 'nadi', 'kesadaran', 'produksi_urin', 'nyeri', 'lokia', 'protein_urin', 'pendarahan_obstetri', 'ddj'];

    document.addEventListener('DOMContentLoaded', function() {
        setWaktuPeriksaAwal();

        radioGroups.forEach(group => {
            const radios = document.querySelectorAll(`input[name="${group}"]`);
            radios.forEach(radio => {
                radio.addEventListener('change', calculateEwsScore);
            });
        });
    });

    function setWaktuPeriksaAwal() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const currentTime = `${hours}:${minutes}`;
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const todayDate = `${year}-${month}-${day}`;
        const inJam = document.getElementById("inJamPeriksa");
        if (inJam) inJam.value = currentTime;

        const inTgl = document.getElementById("inTglPeriksa");
        if (inTgl) inTgl.value = todayDate;
    }

    function calculateEwsScore() {
        let totalScore = 0;
        radioGroups.forEach(group => {
            const selectedRadio = document.querySelector(`input[name="${group}"]:checked`);
            if (selectedRadio) {
                totalScore += parseInt(selectedRadio.value) || 0;
            }
        });
        document.getElementById('total_ews').value = totalScore;
    }

    function resetForm() {
        // Reset ID & Input Teks Kebidanan
        $('#id_form').val('');
        $('#inGravida').val('');
        $('#inPara').val('');
        $('#inAbortus').val('');
        $('#inMinggu').val('');
        $('#inHari').val('');
        $('#inDiagnosa').val('');

        // Reset Pilihan Radio Parameter
        radioGroups.forEach(group => {
            $(`input[name="${group}"]`).prop('checked', false);
        });

        // Reset Total EWS & Pesan Error
        $('#total_ews').val('0');
        $('.text-danger').html('');

        // Reset Tanggal & Jam Periksa ke Waktu Sekarang
        setWaktuPeriksaAwal();

        // Reset Tombol
        $('#simpan').show();
        $('#edit').hide();
    }

    function validateForm() {
        let isValid = true;
        let emptyFields = [];

        const items = [{
                name: 'Respirasi',
                val: $('input[name="respirasi"]:checked').val(),
                errId: '#respirasi_error'
            },
            {
                name: 'Saturasi Oksigen',
                val: $('input[name="oksigen"]:checked').val(),
                errId: '#oksigen_error'
            },
            {
                name: 'Suhu',
                val: $('input[name="suhu"]:checked').val(),
                errId: '#suhu_error'
            },
            {
                name: 'Tekanan Darah Sistolik',
                val: $('input[name="sistolik"]:checked').val(),
                errId: '#sistolik_error'
            },
            {
                name: 'Tekanan Darah Diastolik',
                val: $('input[name="diastolik"]:checked').val(),
                errId: '#diastolik_error'
            },
            {
                name: 'Nadi',
                val: $('input[name="nadi"]:checked').val(),
                errId: '#nadi_error'
            },
            {
                name: 'Tingkat Kesadaran',
                val: $('input[name="kesadaran"]:checked').val(),
                errId: '#kesadaran_error'
            },
            {
                name: 'Produksi Urin',
                val: $('input[name="produksi_urin"]:checked').val(),
                errId: '#produksi_urin_error'
            },
            {
                name: 'Nyeri',
                val: $('input[name="nyeri"]:checked').val(),
                errId: '#nyeri_error'
            },
            {
                name: 'Lokia',
                val: $('input[name="lokia"]:checked').val(),
                errId: '#lokia_error'
            },
            {
                name: 'Protein Urin',
                val: $('input[name="protein_urin"]:checked').val(),
                errId: '#protein_urin_error'
            },
            {
                name: 'Perdarahan Obstetri',
                val: $('input[name="pendarahan_obstetri"]:checked').val(),
                errId: '#pendarahan_obstetri_error'
            },
            {
                name: 'DDJ / Kondisi Janin',
                val: $('input[name="ddj"]:checked').val(),
                errId: '#ddj_error'
            }
        ];

        items.forEach(item => {
            if (item.val === undefined || item.val === null || item.val === '') {
                $(item.errId).html('*wajib diisi');
                emptyFields.push(item.name);
                isValid = false;
            } else {
                $(item.errId).html('');
            }
        });

        if (!$('#inTglPeriksa').val()) {
            emptyFields.push('Tanggal Periksa');
            isValid = false;
        }
        if (!$('#inJamPeriksa').val()) {
            emptyFields.push('Jam Periksa');
            isValid = false;
        }
        if (!$('#inGravida').val()) {
            emptyFields.push('Gravida (G)');
            isValid = false;
        }
        if (!$('#inPara').val()) {
            emptyFields.push('Para (P)');
            isValid = false;
        }
        if (!$('#inAbortus').val()) {
            emptyFields.push('Abortus (A)');
            isValid = false;
        }
        if (!$('#inMinggu').val()) {
            emptyFields.push('Usia Kehamilan (Minggu)');
            isValid = false;
        }
        if (!$('#inHari').val()) {
            emptyFields.push('Usia Kehamilan (Hari)');
            isValid = false;
        }
        if (!$('#inDiagnosa').val()) {
            emptyFields.push('Diagnosa');
            isValid = false;
        }

        if (!isValid) {
            swal({
                title: "Peringatan!",
                text: "Silahkan lengkapi data parameter yang masih kosong!",
                type: "warning",
                confirmButtonColor: "#3cb878"
            });
        }
        return isValid;
    }

    function getFormData() {
        return {
            id_form: $('#id_form').val() || '',
            id_pelayanan: $('#inPel').val() || '',
            id_history: $('#inHis').val() || '',
            no_rm: $('#inNoRM').val() || '',
            diagnosa: $('#inDiagnosa').val() || '',
            gravida: $('#inGravida').val() || '',
            para: $('#inPara').val() || '',
            abortus: $('#inAbortus').val() || '',
            minggu_kelahiran: $('#inMinggu').val() || '',
            hari_kelahiran: $('#inHari').val() || '',
            ruangan: $('#inRuangan').val() || '',
            tgl_periksa: $('#inTglPeriksa').val() || '',
            jam_periksa: $('#inJamPeriksa').val() || '',
            waktu: $('#inJamPeriksa').val() || '',
            respirasi: $('input[name="respirasi"]:checked').val() ?? '',
            oksigen: $('input[name="oksigen"]:checked').val() ?? '',
            suhu: $('input[name="suhu"]:checked').val() ?? '',
            sistolik: $('input[name="sistolik"]:checked').val() ?? '',
            diastolik: $('input[name="diastolik"]:checked').val() ?? '',
            nadi: $('input[name="nadi"]:checked').val() ?? '',
            kesadaran: $('input[name="kesadaran"]:checked').val() ?? '',
            produksi_urin: $('input[name="produksi_urin"]:checked').val() ?? '',
            nyeri: $('input[name="nyeri"]:checked').val() ?? '',
            lokia: $('input[name="lokia"]:checked').val() ?? '',
            protein_urin: $('input[name="protein_urin"]:checked').val() ?? '',
            pendarahan_obstetri: $('input[name="pendarahan_obstetri"]:checked').val() ?? '',
            ddj: $('input[name="ddj"]:checked').val() ?? '',
            total_ews: $('#total_ews').val() || '0'
        };
    }

    function simpan() {
        if (!validateForm()) return false;
        let formData = getFormData();
        $.ajax({
            url: "<?php echo base_url('Erm_ews_maternity/insert_ews_maternity'); ?>",
            method: "POST",
            dataType: 'json',
            data: formData,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "Berhasil!",
                        text: "Data EWS berhasil disimpan",
                        type: "success",
                        confirmButtonColor: "#3cb878"
                    }, function() {
                        resetForm();
                        reload_data_id_pel($('#inPel').val());
                    });
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: data.message || "Gagal menyimpan data",
                        confirmButtonColor: "#3cb878"
                    });
                }
            },
            error: function() {
                swal({
                    title: "Gagal!",
                    type: "warning",
                    text: "Terjadi kesalahan sistem saat menyimpan data",
                    confirmButtonColor: "#3cb878"
                });
            }
        });
        return false;
    }

    function edit() {
        let formData = getFormData();
        if (!formData.id_form) {
            swal("Peringatan!", "ID Form tidak ditemukan, pilih data terlebih dahulu.", "warning");
            return false;
        }

        $.ajax({
            url: "<?php echo base_url('Erm_ews_maternity/edit_ews_maternity'); ?>",
            method: "POST",
            dataType: 'json',
            data: formData,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "Berhasil!",
                        type: "success",
                        text: "Data Berhasil diperbarui",
                        confirmButtonColor: "#3cb878",
                    }, function() {
                        resetForm();
                        reload_data_id_pel(formData.id_pelayanan);
                    });
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: data.message || data.status,
                        confirmButtonColor: "#3cb878"
                    });
                }
            }
        });
        return false;
    }

    function pilih(id) {
        $.ajax({
            url: "<?php echo base_url('Erm_ews_maternity/get_ews_maternity'); ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                if (data.status_dt === 'found') {
                    $('#id_form').val(data.id_form);
                    $('#inDiagnosa').val(data.diagnosa);
                    $('#inGravida').val(data.gravida);
                    $('#inPara').val(data.para);
                    $('#inAbortus').val(data.abortus);
                    $('#inMinggu').val(data.minggu_kelahiran);
                    $('#inHari').val(data.hari_kelahiran);
                    $('#inTglPeriksa').val(data.tanggal ? data.tanggal.split(' ')[0] : '');
                    $('#inJamPeriksa').val(data.jam_periksa || data.waktu);
                    if (data.nama_dokter) {
                        $('#inDokter').val(data.nama_dokter);
                    }

                    setRadioValue('respirasi', data.respirasi);
                    setRadioValue('oksigen', data.oksigen);
                    setRadioValue('suhu', data.suhu);
                    setRadioValue('sistolik', data.sistolik);
                    setRadioValue('diastolik', data.diastolik);
                    setRadioValue('nadi', data.nadi);
                    setRadioValue('kesadaran', data.kesadaran);
                    setRadioValue('produksi_urin', data.produksi_urin);
                    setRadioValue('nyeri', data.nyeri);
                    setRadioValue('lokia', data.lokia);
                    setRadioValue('protein_urin', data.protein_urin);
                    setRadioValue('pendarahan_obstetri', data.pendarahan_obstetri);
                    setRadioValue('ddj', data.ddj);

                    calculateEwsScore();

                    $('#simpan').hide();
                    $('#edit').show();
                    $('html, body').animate({
                        scrollTop: 0
                    }, 'fast');
                }
            }
        });
    }

    function setRadioValue(name, val) {
        $(`input[name="${name}"]`).prop('checked', false);
        if (val !== null && val !== undefined && val !== '') {
            $(`input[name="${name}"][value="${val}"]`).prop('checked', true);
        }
    }

    function cetak(id_form) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = "<?php echo base_url('Erm_ews_maternity/print_ews_maternity/') ?>";
        form.target = '_blank';

        var hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'ids';
        hiddenInput.value = id_form;

        form.appendChild(hiddenInput);
        document.body.appendChild(form);
        form.submit();
        document.body.removeChild(form);
    }

    function hapus(id) {
        swal({
            title: "Warning?",
            text: "Apakah kamu yakin menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $.ajax({
                url: "<?php echo base_url('Erm_ews_maternity/hapus_ews_maternity'); ?>",
                method: "POST",
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "Good job!",
                            type: "success",
                            text: "Data Berhasil dihapus",
                            confirmButtonColor: "#3cb878"
                        });
                        resetForm();
                        reload_data_id_pel($('#inPel').val());
                    } else {
                        swal({
                            title: "Gagal!",
                            type: "warning",
                            confirmButtonColor: "#3cb878"
                        });
                    }
                }
            });
        });
        return false;
    }

    $(document).ready(function() {
        let id_pelayanan = $('#inPel').val();
        reload_data_id_pel(id_pelayanan);
        // get_dokter(id_pelayanan);
    });

    // function get_dokter(id_pelayanan) {
    //     let id_history = $('#inHis').val();
    //     if (!id_pelayanan) return;
    //     $.ajax({
    //         url: "<?php echo base_url('Erm_ews_maternity/get_dokter'); ?>",
    //         method: "GET",
    //         dataType: 'json',
    //         data: {
    //             id_pelayanan: id_pelayanan,
    //             id_history: id_history
    //         },
    //         success: function(data) {
    //             if (data && data.nama_dokter) {
    //                 $('#inDokter').val(data.nama_dokter);
    //             }
    //         }
    //     });
    // }

    function reload_data_id_pel(id_pelayanan) {
        $('#tabel_ews').dataTable().fnClearTable();
        $('#tabel_ews').dataTable().fnDestroy();
        $('#tabel_ews').DataTable({
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sSearch": "Cari:",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            },
            "ajax": {
                "url": '<?php echo base_url('Erm_ews_maternity/tampil_list_per_id'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan
                },
            },
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0, 1, 2, 3],
                "orderable": false
            }],
        });
    }
</script>