<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Form Transfer Pasien</h6>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">

                        <form id="form-transfer-pasien">
                            <input type="hidden" name="id_pelayanan" id="id_pelayanan" value="<?= $id_pelayanan ?>">
                            <input type="hidden" name="id_history" id="id_history" value="<?= $id_history ?>">
                            <input type="hidden" name="no_rm" id="no_rm" value="<?= $no_rm ?>">

                            <!-- semua input lain di sini -->
                            <!-- STIKER PASIEN (SAMA DENGAN view_asses_perawat_igd) -->
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                                    <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                                    <input type="text" disabled class="form-control" value="" id="">
                                    <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                                    <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3">
                                    <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                    <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama">
                                </div>
                            </div>
                            <!-- <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="" id="">
                            </div>
                        </div> -->

                            <div class="form-group">
                                <div class="col-md-3">
                                    <label class="control-label mb-10 text-left">Tgl Lahir / Umur<span class="help"></span></label>
                                    <input type="text" disabled class="form-control" value="<?= $tgl_lahir ?>" id="inTglLahir">
                                </div>
                            </div>
                            <!-- <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Tgl Lahir / Umur<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="" id="">
                            </div>
                        </div> -->

                            <div class="form-group">
                                <div class="col-md-3">
                                    <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                    <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk">
                                </div>
                            </div>
                            <!-- <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                <input type="text" disabled class="form-control" value="" id="">
                            </div>
                        </div> -->

                            <div class="clearfix"></div>
                            <hr>

                            <!-- SITUATION -->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h5><strong>SITUATION</strong></h5>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Pasien dari</label>
                                    <input type="text" class="form-control" name="pasien_dari">
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label mb-10 text-left">No. tempat tidur</label>
                                    <input type="text" class="form-control" name="tt_asal">
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label mb-10 text-left">Tiba di</label>
                                    <input type="text" class="form-control" name="tiba_di">
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label mb-10 text-left">No. tempat tidur</label>
                                    <input type="text" class="form-control" name="tt_tujuan">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Dokter yang merawat 1</label>
                                    <select class="form-control select2" name="dr1">
                                        <option value="">Pilih Dokter</option>
                                        <?php foreach ($list_dokter as $d): ?>
                                            <option value="<?= $d->id_dokter ?>">
                                                <?= $d->nama ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Dokter yang merawat 2</label>
                                    <select class="form-control select2" name="dr2">
                                        <option value="">Pilih Dokter</option>
                                        <?php foreach ($list_dokter as $d): ?>
                                            <option value="<?= $d->id_dokter ?>">
                                                <?= $d->nama ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Dokter yang merawat 3</label>
                                    <select class="form-control select2" name="dr3">
                                        <option value="">Pilih Dokter</option>
                                        <?php foreach ($list_dokter as $d): ?>
                                            <option value="<?= $d->id_dokter ?>">
                                                <?= $d->nama ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Diagnosa medis 1</label>
                                    <textarea type="text" class="form-control" name="dx1"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Diagnosa medis 2</label>
                                    <textarea type="text" class="form-control" name="dx2"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Diagnosa medis 3</label>
                                    <textarea type="text" class="form-control" name="dx3"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8">
                                    <label class="control-label mb-10 text-left">Prosedur pembedahan atau tindakan invasif yang sudah dilakukan</label>
                                    <textarea class="form-control" rows="2" name="prosedur_invasif"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Tanggal Prosedur/Tindakan</label>
                                    <input type="date" class="form-control" name="tgl_prosedur">
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">Indikasi Rawat Inap</label>
                                    <textarea class="form-control" rows="2" name="indikasi_rawat_inap"></textarea>
                                </div>
                            </div>

                            <hr>

                            <!-- BACKGROUND -->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h5><strong>BACKGROUND</strong></h5>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Riwayat alergi obat</label>

                                    <div class="radio radio-primary">
                                        <input id="alergi_tidak" type="radio" name="alergi_obat" value="Tidak">
                                        <label for="alergi_tidak" style="color:#000;">Tidak</label>
                                    </div>

                                    <div class="radio radio-primary">
                                        <input id="alergi_ya" type="radio" name="alergi_obat" value="Ya">
                                        <label for="alergi_ya" style="color:#000;">Ya</label>
                                    </div>

                                     <input type="text"
                                            class="form-control mt-10"
                                            id="alergi_obat_nama"
                                            name="alergi_obat_nama"
                                            placeholder="riwayat alergi"
                                            style="display:none;">
                                </div>

                                <!-- <div class="form-group">

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left"  style="display:none;">Nama obat jika ada alergi</label>
                                    <input type="text" class="form-control" name="alergi_obat_nama" style="display:none;">

                                </div>
                             </div> -->

                                <!-- <script>
function toggleAlergiNama(clear = false) {
    if ($('input[name="alergi_obat"]:checked').val() === 'Ya') {
        $('[name="alergi_obat_nama"]').show();
    } else {
        if (clear) {
            $('[name="alergi_obat_nama"]').val('');
        }
        $('[name="alergi_obat_nama"]').hide();
    }
}

</script> -->

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Kewaspadaan</label>
                                    <div class="checkbox checkbox-primary">
                                        <input id="kw_std" type="checkbox" name="kewaspadaan[]" value="Standart">
                                        <label for="kw_std" style="color:#000;">Standart</label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                        <input id="kw_contact" type="checkbox" name="kewaspadaan[]" value="Contact">
                                        <label for="kw_contact" style="color:#000;">Contact</label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                        <input id="kw_airborne" type="checkbox" name="kewaspadaan[]" value="Airborne">
                                        <label for="kw_airborne" style="color:#000;">Airbone</label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                        <input id="kw_droplet" type="checkbox" name="kewaspadaan[]" value="Droplet">
                                        <label for="kw_droplet" style="color:#000;">Droplet</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">Riwayat penyakit terdahulu</label>
                                    <textarea class="form-control" rows="2" name="riwayat_dulu"></textarea>
                                </div>
                            </div>

                            <hr>

                            <!-- ASSESSMENT -->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h5><strong>ASSESSMENT</strong></h5>
                                </div>
                            </div>

                            <!-- Observasi terakhir -->
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label class="control-label mb-10 text-left">Observasi Terakhir Jam</label>
                                    <input type="time"
                                        class="form-control"
                                        name="jam_observasi"
                                        id="jam_observasi"
                                        step="60"> <!-- lompat per 1 menit -->
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-2">
                                    <label class="control-label mb-10 text-left">GCS :<span class="help"></span></label>
                                    <span id="gcs_error" class="text-danger"></span>
                                    <div class="">
                                        <input type="number" disabled class="form-control" name="gcs" id="gcs" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="control-label mb-10 text-left">E :<span class="help"></span></label>
                                        <span id="e_error" class="text-danger">*</span>
                                        <div class="">
                                            <input type="number" class="form-control" name="e" id="e" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="control-label mb-10 text-left">M :<span class="help"></span></label>
                                        <span id="m_error" class="text-danger">*</span>
                                        <div class=" ">
                                            <input type="number" class="form-control" name="m" id="m" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="control-label mb-10 text-left">V :<span class="help"></span></label>
                                        <span id="v_error" class="text-danger">*</span>
                                        <div class=" ">
                                            <input type="number" class="form-control" name="v" id="v" value="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="control-label mb-10 text-left">Suhu (°C)</label>
                                        <input type="text" class="form-control" name="suhu">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label mb-10 text-left">SpO2 (%)</label>
                                        <input type="text" class="form-control" name="spo2">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label mb-10 text-left">TD (mmHg)</label>
                                        <input type="text" class="form-control" name="tekanan_darah">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label mb-10 text-left">Nadi (x/menit)</label>
                                        <input type="text" class="form-control" name="frequensi_nadi">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label mb-10 text-left">Nafas (x/menit)</label>
                                        <input type="text" class="form-control" name="frequensi_nafas">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-md-7">
                                        <label class="control-label mb-10 text-left">Pupil dan reaksi cahaya kanan</label>
                                        <input type="text" class="form-control" name="pupil_kanan">
                                    </div>
                                    <div class="col-md-7">
                                        <label class="control-label mb-10 text-left">Pupil dan reaksi cahaya kiri</label>
                                        <input type="text" class="form-control" name="pupil_kiri">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">EWS atau PEWS atau MEWS</label>
                                        <input type="number" class="form-control" name="ews">
                                        <input type="text" class="form-control mt-5" name="ews_kategori" placeholder="Kategori">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Skor Nyeri</label>
                                        <input type="number" class="form-control" name="skor_nyeri">
                                        <input type="text" class="form-control mt-5" name="skor_nyeri_kategori" placeholder="Kategori">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Skor Risiko Jatuh</label>
                                        <input type="number" class="form-control" name="skor_jatuh">
                                        <input type="text" class="form-control mt-5" name="skor_jatuh_kategori" placeholder="Kategori">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Skor Risiko VTE</label>
                                        <input type="number" class="form-control" name="skor_vte">
                                        <input type="text" class="form-control mt-5" name="skor_vte_kategori" placeholder="Kategori">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Skor Braden atau Glamorgan</label>
                                        <input type="number" class="form-control" name="skor_braden">
                                        <input type="text" class="form-control mt-5" name="skor_braden_kategori" placeholder="Kategori">
                                    </div>
                                </div>

                                <!-- Eliminasi dan aktivitas -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">Pemberian Makan dan Cairan</label>

                                        <!-- ORAL -->
                                        <div class="radio radio-primary">
                                            <input id="makan_oral" type="radio" name="pemberian_makan_opt" value="Oral">
                                            <label for="makan_oral" style="color:#000;">Oral</label>
                                        </div>

                                        <!-- NGT -->
                                        <div class="radio radio-primary">
                                            <input id="makan_ngt" type="radio" name="pemberian_makan_opt" value="NGT">
                                            <label for="makan_ngt" style="color:#000;">NGT</label>
                                        </div>

                                        <!-- BATASAN CAIRAN -->
                                        <div class="radio radio-primary">
                                            <input id="makan_batasan" type="radio" name="pemberian_makan_opt" value="Batasan Cairan">
                                            <label for="makan_batasan" style="color:#000;">Batasan Cairan</label>
                                        </div>

                                        <!-- TEXTBOX BATASAN CAIRAN -->
                                        <input type="text"
                                            class="form-control mt-10"
                                            id="txt_batasan_cairan"
                                            placeholder="Contoh: 500 ml/hari"
                                            style="display:none; max-width:200px;">

                                        <!-- DIET KHUSUS -->
                                        <div class="radio radio-primary">
                                            <input id="makan_diet" type="radio" name="pemberian_makan_opt" value="Diet Khusus">
                                            <label for="makan_diet" style="color:#000;">Diet Khusus</label>
                                        </div>

                                        <!-- TEXTBOX DIET KHUSUS -->
                                        <input type="text"
                                            class="form-control mt-10"
                                            id="txt_diet_khusus"
                                            placeholder="Isi jenis diet"
                                            style="display:none; max-width:300px;">

                                        <!-- PUASA -->
                                        <div class="radio radio-primary">
                                            <input id="makan_puasa" type="radio" name="pemberian_makan_opt" value="Puasa">
                                            <label for="makan_puasa" style="color:#000;">Puasa</label>
                                        </div>

                                        <!-- NILAI FINAL YANG DIKIRIM KE SERVER (1 kolom saja) -->
                                        <input type="hidden" id="pemberian_makan" name="pemberian_makan">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Buang air besar (BAB)</label>

                                        <div class="radio radio-primary">
                                            <input id="bab_normal" type="radio" name="bab" value="Tidak ada masalah">
                                            <label for="bab_normal" style="color:#000;">Tidak ada masalah</label>
                                        </div>

                                        <div class="radio radio-primary">
                                            <input id="bab_masalah" type="radio" name="bab" value="Ada masalah">
                                            <label for="bab_masalah" style="color:#000;">Ada masalah</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Buang air kecil (BAK)</label>

                                        <div class="radio radio-primary">
                                            <input id="bak_normal" type="radio" name="bak" value="Tidak ada masalah">
                                            <label for="bak_normal" style="color:#000;">Tidak ada masalah</label>
                                        </div>

                                        <div class="radio radio-primary">
                                            <input id="bak_kateter" type="radio" name="bak" value="Kateter">
                                            <label for="bak_kateter" style="color:#000;">Kateter</label>
                                        </div>

                                        <div class="radio radio-primary">
                                            <input id="bak_inkon" type="radio" name="bak" value="Inkontinensia urine">
                                            <label for="bak_inkon" style="color:#000;">Inkontinensia urine</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Aktivitas sehari hari</label>

                                        <div class="radio radio-primary">
                                            <input id="aktiv_mandiri" type="radio" name="aktivitas" value="Mandiri">
                                            <label for="aktiv_mandiri" style="color:#000;">Mandiri</label>
                                        </div>

                                        <div class="radio radio-primary">
                                            <input id="aktiv_bantu" type="radio" name="aktivitas" value="Dibantu sebagian">
                                            <label for="aktiv_bantu" style="color:#000;">Dibantu sebagian</label>
                                        </div>

                                        <div class="radio radio-primary">
                                            <input id="aktiv_penuh" type="radio" name="aktivitas" value="Dibantu penuh">
                                            <label for="aktiv_penuh" style="color:#000;">Dibantu penuh</label>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Mobilitas</label>

                                        <div class="radio radio-primary">
                                            <input id="mob_jalan" type="radio" name="mobilitas" value="Jalan">
                                            <label for="mob_jalan" style="color:#000;">Jalan</label>
                                        </div>

                                        <div class="radio radio-primary">
                                            <input id="mob_duduk" type="radio" name="mobilitas" value="Duduk">
                                            <label for="mob_duduk" style="color:#000;">Duduk</label>
                                        </div>

                                        <div class="radio radio-primary">
                                            <input id="mob_tirah" type="radio" name="mobilitas" value="Tirah baring">
                                            <label for="mob_tirah" style="color:#000;">Tirah baring</label>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Luka atau decubitus</label>

                                        <div class="radio radio-primary">
                                            <input id="dekub_tidak" type="radio" name="dekubitus" value="Tidak">
                                            <label for="dekub_tidak" style="color:#000;">Tidak</label>
                                        </div>

                                        <div class="radio radio-primary">
                                            <input id="dekub_ada" type="radio" name="dekubitus" value="Ada">
                                            <label for="dekub_ada" style="color:#000;">Ada, lokasi</label>
                                        </div>

                                        <input type="text"
                                            class="form-control mt-10"
                                            id="dekubitus_lokasi"
                                            name="dekubitus_lokasi"
                                            placeholder="Lokasi luka"
                                            style="display:none;">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Gangguan indra</label>

                                        <div class="radio radio-primary">
                                            <input id="indra_tidak" type="radio" name="indra" value="Tidak">
                                            <label for="indra_tidak" style="color:#000;">Tidak</label>
                                        </div>

                                        <div class="radio radio-primary">
                                            <input id="indra_ada" type="radio" name="indra" value="Ada">
                                            <label for="indra_ada" style="color:#000;">Ada, lokasi</label>
                                        </div>

                                        <input type="text"
                                            class="form-control mt-10"
                                            id="indra_lokasi"
                                            name="indra_lokasi"
                                            placeholder="Lokasi gangguan"
                                            style="display:none;">

                                    </div>

                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Alat bantu yang digunakan</label>

                                        <div class="radio radio-primary">
                                            <input id="alat_tidak" type="radio" name="alat_bantu" value="Tidak">
                                            <label for="alat_tidak" style="color:#000;">Tidak</label>
                                        </div>

                                        <div class="radio radio-primary">
                                            <input id="alat_ya" type="radio" name="alat_bantu" value="Ya">
                                            <label for="alat_ya" style="color:#000;">Ada</label>
                                        </div>

                                        <input type="text"
                                            class="form-control mt-10"
                                            id="alat_bantu_lokasi"
                                            name="alat_bantu_lokasi"
                                            placeholder="Lokasi alat bantu"
                                            style="display:none;">


                                    </div>




                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Infus</label>

                                        <div class="radio radio-primary">
                                            <input id="infus_tidak" type="radio" name="infus" value="Tidak">
                                            <label for="infus_tidak" style="color:#000;">Tidak</label>
                                        </div>

                                        <div class="radio radio-primary">
                                            <input id="infus_ya" type="radio" name="infus" value="Ya">
                                            <label for="infus_ya" style="color:#000;">Ya, lokasi</label>
                                        </div>

                                        <input type="text"
                                            class="form-control mt-10"
                                            id="infus_pivas"
                                            name="infus_pivas"
                                            placeholder="PIVAS"
                                            style="display:none;">

                                        <input type="date"
                                            class="form-control mt-10"
                                            id="infus_tanggal"
                                            name="infus_tanggal"
                                            style="display:none;">

                                    </div>
                                </div>

                               <script>
$(function () {

    function toggleInputByRadio(radioName, showValue, inputSelector) {
        function update(clear = false) {
            const val = $('input[name="' + radioName + '"]:checked').val();
            if (val === showValue) {
                $(inputSelector).show();
            } else {
                $(inputSelector).hide();
                if (clear) {
                    $(inputSelector).val('');
                }
            }
        }

        // event change, clear hanya saat user klik
        $(document).on('change', 'input[name="' + radioName + '"]', function () {
            update(true);
        });

        // initial load, JANGAN clear
        update(false);
    }

    toggleInputByRadio('dekubitus', 'Ada', '#dekubitus_lokasi');
    toggleInputByRadio('indra', 'Ada', '#indra_lokasi');
    toggleInputByRadio('alat_bantu', 'Ya', '#alat_bantu_lokasi');
    toggleInputByRadio('alergi_obat', 'Ya', '#alergi_obat_nama');

    function toggleInfus(clear = false) {
        if ($('input[name="infus"]:checked').val() === 'Ya') {
            $('#infus_pivas, #infus_tanggal').show();
        } else {
            $('#infus_pivas, #infus_tanggal').hide();
            if (clear) {
                $('#infus_pivas, #infus_tanggal').val('');
            }
        }
    }

    $(document).on('change', 'input[name="infus"]', function () {
        toggleInfus(true);
    });

    toggleInfus(false);

});
</script>



                                <hr>

                                <!-- RECOMMENDATIONS (ATAS) -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <h5><strong>RECOMMENDATIONS</strong></h5>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Follow up rujukan</label>
                                        <textarea class="form-control" rows="2" name="follow_up_rujukan"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Pemberian terapi khusus</label>
                                        <textarea class="form-control" rows="2" name="terapi_khusus"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Peralatan khusus</label>
                                        <textarea class="form-control" rows="2" name="peralatan_khusus"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Rencana tindakan atau pemeriksaan</label>
                                        <textarea class="form-control" rows="2" name="rencana_tindakan"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Persiapan khusus</label>
                                        <textarea class="form-control" rows="2" name="persiapan_khusus"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Persiapan pulang</label>
                                        <textarea class="form-control" rows="2" name="persiapan_pulang"></textarea>
                                    </div>
                                </div>

                                <hr>

                                <!-- RECOMMENDATIONS BAWAH: HASIL PEMERIKSAAN -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <h5><strong>RECOMMENDATIONS</strong></h5>
                                    </div>
                                </div>

                                <!-- HASIL PEMERIKSAAN -->
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="control-label mb-10 text-left">Hasil pemeriksaan</label>
                                        <label class="control-label">Lab, lembar</label>
                                        <input type="text" class="form-control" name="lab_lembar">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label mb-10 text-left">&nbsp;</label>
                                        <label class="control-label">X Ray, lembar</label>
                                        <input type="text" class="form-control" name="xray_lembar">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label mb-10 text-left">&nbsp;</label>
                                        <div class="checkbox checkbox-primary">
                                            <input id="ctscan" type="checkbox" name="hasil_periksa[]" value="CT Scan">
                                            <label for="ctscan" style="color:#000;">CT Scan, lembar</label>
                                        </div>
                                        <input type="text" class="form-control" id="ctscan_text"
                                            name="ctscan_lembar" placeholder="Jumlah lembar"
                                            style="display:none;">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label mb-10 text-left">&nbsp;</label>
                                        <div class="checkbox checkbox-primary">
                                            <input id="mri" type="checkbox" name="hasil_periksa[]" value="MRI">
                                            <label for="mri" style="color:#000;">MRI, lembar</label>
                                        </div>
                                        <input type="text" class="form-control" id="mri_text"
                                            name="mri_lembar" placeholder="Jumlah lembar"
                                            style="display:none;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">&nbsp;</label>
                                        <div class="checkbox checkbox-primary">
                                            <input id="ekg" type="checkbox" name="hasil_periksa[]" value="EKG">
                                            <label for="ekg" style="color:#000;">EKG, lembar</label>
                                        </div>
                                        <input type="text" class="form-control" id="ekg_text"
                                            name="ekg_lembar" placeholder="Jumlah lembar"
                                            style="display:none;">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">&nbsp;</label>
                                        <div class="checkbox checkbox-primary">
                                            <input id="echo" type="checkbox" name="hasil_periksa[]" value="Echo">
                                            <label for="echo" style="color:#000;">Echo, lembar</label>
                                        </div>
                                        <input type="text" class="form-control" id="echo_text"
                                            name="echo_lembar" placeholder="Jumlah lembar"
                                            style="display:none;">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">&nbsp;</label>
                                        <div class="checkbox checkbox-primary">
                                            <input id="periksa_lain" type="checkbox" name="hasil_periksa[]" value="Lainnya">
                                            <label for="periksa_lain" style="color:#000;">Lainnya</label>
                                        </div>
                                        <input type="text" class="form-control" id="periksa_lain_text"
                                            name="periksa_lainnya" placeholder="Sebutkan, lembar"
                                            style="display:none;">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Dokumen</label>
                                        <div class="checkbox checkbox-primary">
                                            <input id="rekam_lama" type="checkbox" name="dokumen[]" value="Rekam medis lama">
                                            <label for="rekam_lama" style="color:#000;">Rekam medis lama</label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="rekam_lain" type="checkbox" name="dokumen[]" value="Rekam medis lain">
                                            <label for="rekam_lain" style="color:#000;">Rekam medis lain</label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="dok_lain" type="checkbox" name="dokumen[]" value="Lainnya">
                                            <label for="dok_lain" style="color:#000;">Lainnya</label>
                                        </div>
                                        <input type="text" class="form-control" id="dok_lain_text"
                                            name="dokumen_lainnya" placeholder="Sebutkan dokumen"
                                            style="display:none;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- <div class="col-md-3">
        <label class="control-label mb-10 text-left">Lainnya</label>
        <textarea class="form-control" rows="3" name="lainnya"></textarea>
    </div> -->
                                    <div class="col-md-9">
                                        <label class="control-label mb-10 text-left">Hasil nilai kritis</label>
                                        <textarea class="form-control" rows="3" name="hasil_nilai_kritis"></textarea>
                                    </div>
                                </div>


                                <!-- TANDA TANGAN -->
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">
                                            Diserahkan Oleh (Perawat igd/Incharge)
                                        </label>
                                        <select class="form-control select2" name="diserahkan_oleh">
                                            <option value="">Pilih Perawat IGD</option>
                                            <?php foreach ($list_perawat_igd as $p): ?>
                                                <option value="<?= $p->id_staff ?>"><?= $p->nama ?></option>
                                            <?php endforeach; ?>
                                        </select>


                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">
                                            Diterima Oleh (Perawat rawatainap Incharge)
                                        </label>
                                        <select class="form-control select2" name="diterima_oleh">
                                            <option value="">Pilih Perawat Rawat Inap</option>
                                            <?php foreach ($list_perawat_ranap as $p): ?>
                                                <option value="<?= $p->id_staff ?>"><?= $p->nama ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>


                                    <?php
                                    // dari controller: $detail_transfer mungkin ada / tidak
                                    $verif_db       = !empty($detail_transfer) ? ($detail_transfer->verif ?? 'Tidak') : 'Tidak';
                                    $dokter_verif   = !empty($detail_transfer) ? ($detail_transfer->dokter_verif ?? '') : '';
                                    $auth           = $this->session->userdata('data_auth');
                                    $login_staff_id = $auth ? $auth->id_staff : null;
                                    ?>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 pt-5">Verifikasi Dokter :</label>
                                                <div class="col-md-8">
                                                    <div class="radio-list">
                                                        <div class="radio-inline pl-0">
                                                            <span class="radio radio-info">
                                                                <input type="radio"
                                                                    value="Tidak"
                                                                    name="verifikasi_dokter"
                                                                    id="verifikasi_dokter_tidak"
                                                                    <?= ($verif_db === 'Tidak') ? 'checked' : '' ?>>
                                                                <label class="control-label" for="verifikasi_dokter_tidak">Tidak</label>
                                                            </span>
                                                        </div>
                                                        <div class="radio-inline pl-0">
                                                            <span class="radio radio-info">
                                                                <input type="radio"
                                                                    value="Ya"
                                                                    name="verifikasi_dokter"
                                                                    id="verifikasi_dokter_ya"
                                                                    <?= in_array($verif_db, ['Belum', 'Ya'], true) ? 'checked' : '' ?>>
                                                                <label class="control-label" for="verifikasi_dokter_ya">Ya</label>
                                                            </span>
                                                        </div>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label pt-5">Status Verifikasi :</label>
                                                <div class="col-md-8">
                                                    <div class="radio-list">
                                                        <div id="status">
                                                            <?php
                                                            if ($verif_db === 'Ya') {
                                                                echo '<span class="badge" style="background:blue;color:white;">Terverifikasi</span>';
                                                            } elseif ($verif_db === 'Belum') {
                                                                echo '<span class="badge" style="background:orange;color:white;">Belum Terverifikasi</span>';
                                                            } else {
                                                                echo '<span class="badge" style="background:#a94442;color:white;">Tidak memerlukan verifikasi</span>';
                                                            }
                                                            ?>
                                                        </div>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="detail_verifikasi"
                                        class="form-group row"
                                        style="<?= in_array($verif_db, ['Belum', 'Ya'], true) ? '' : 'display:none;' ?>">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 pt-5">Nama Dokter:</label>
                                                <div class="col-md-8 has-success">
                                                    <select id="dokter_jaga_dropdown"
                                                        name="dokter_jaga"
                                                        class="form-control mt-10 select2"
                                                        style="<?= in_array($verif_db, ['Belum', 'Ya'], true) ? '' : 'display:none;' ?>">
                                                        <option value="">Pilih Dokter Jaga IGD</option>
                                                        <?php if (!empty($dokter_igd)): ?>
                                                            <?php foreach ($dokter_igd as $d): ?>
                                                                <option value="<?= $d->id_dokter ?>"
                                                                    <?= (string)$dokter_verif === (string)$d->id_dokter ? 'selected' : '' ?>>
                                                                    <?= $d->nama ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    // tombol approve: hanya muncul jika verif = 'Belum' dan dokter_verif = dokter yang login
                                    if ($verif_db === 'Belum' && (string)$dokter_verif === (string)$login_staff_id): ?>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <button type="button" id="btnApprove" class="btn btn-success">
                                                    APPROVE TRANSFER
                                                </button>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <script>
                                        // baseUrl global untuk semua AJAX
                                        var baseUrl = "<?= base_url(); ?>";
                                        var base_url = baseUrl;

                                        function updateStatusVerif(forceBelum) {
                                            var val = $('input[name="verifikasi_dokter"]:checked').val();

                                            if (val === 'Tidak') {
                                                $('#status').html(
                                                    '<span class="badge" style="background:#a94442;color:white;">Tidak memerlukan verifikasi</span>'
                                                );
                                                $('#detail_verifikasi').hide();
                                                $('#dokter_jaga_dropdown').hide().val('');
                                            } else {
                                                if (forceBelum) {
                                                    $('#status').html(
                                                        '<span class="badge" style="background:orange;color:white;">Belum Terverifikasi</span>'
                                                    );
                                                }
                                                $('#detail_verifikasi').show();
                                                $('#dokter_jaga_dropdown').show();
                                            }
                                        }

                                        $(function() {
                                            // inisialisasi saat halaman pertama kali dibuka
                                            // tidak memaksa status menjadi "Belum" supaya status dari DB tidak direset
                                            updateStatusVerif(false);

                                            // ubah status saat radio berubah
                                            $('input[name="verifikasi_dokter"]').on('change', function() {
                                                updateStatusVerif(true);
                                            });

                                            // tombol approve
                                            $(document).on('click', '#btnApprove', function() {
                                                $.post(
                                                    baseUrl + 'TransferPasien/approve_transfer', {
                                                        id_history: $('#id_history').val()
                                                    },
                                                    function(res) {
                                                        if (res.status === 'success') {
                                                            alert(res.msg || 'Berhasil disetujui');
                                                            location.reload();
                                                        } else {
                                                            alert(res.msg || 'Gagal approve');
                                                        }
                                                    },
                                                    'json'
                                                );
                                            });
                                        });
                                    </script>

                                    <div class="col-md-3">
                                        <label class="control-label">Tanggal Pengajuan</label>
                                        <input type="date" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="control-label">Jam Pengajuan</label>
                                        <input type="time" class="form-control" id="jam_pengajuan" name="jam_pengajuan">
                                    </div>

                                </div>
                                <!-- BUTTON AKSI -->
                                <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        <button type="button"
                                            onclick="history.back()"
                                            class="btn btn-default btn-anim btn-sm me-2"
                                            style="min-width:100px;height:36px;">
                                            <i class="fa fa-arrow-left"></i>
                                            <span class="btn-text">KEMBALI</span>
                                        </button>

                                        <button class="btn btn-success mb-4" type="submit">
                                            Simpan
                                        </button>
                                        <a href="<?= base_url('TransferPasien/print/' . $id_pelayanan . '/' . $id_history); ?>"
                                            target="_blank"
                                            class="btn btn-default mb-4">
                                            Print
                                        </a>
                                    </div>
                                </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<script>
    // PEMBERIAN MAKAN (radio UI: name="pemberian_makan_opt", hidden: #pemberian_makan)
    $(function() {
        function togglePemberianMakanOpt() {
            var val = $('input[name="pemberian_makan_opt"]:checked').val();

            $('#txt_batasan_cairan').hide().val('');
            $('#txt_diet_khusus').hide().val('');

            if (val === 'Batasan Cairan') {
                $('#txt_batasan_cairan').show();
            } else if (val === 'Diet Khusus') {
                $('#txt_diet_khusus').show();
            }
        }

        togglePemberianMakanOpt();

        $(document).on('change', 'input[name="pemberian_makan_opt"]', togglePemberianMakanOpt);
    });
</script>

<script>
    // toggle textbox untuk CT scan, MRI, EKG, Echo, pemeriksaan lain
    $(function() {
        function toggleText(cbId, txtId) {
            var $cb = $('#' + cbId);
            var $txt = $('#' + txtId);

            function update() {
                if ($cb.is(':checked')) {
                    $txt.show();
                } else {
                    $txt.hide().val('');
                }
            }

            $cb.on('change', update);
            update();
        }

        ['ctscan', 'mri', 'ekg', 'echo', 'periksa_lain'].forEach(function(id) {
            $('#' + id).on('change', function() {
                toggleText(id, id + '_text');
            });
            toggleText(id, id + '_text');
        });

        $('#dok_lain').on('change', function() {
            toggleText('dok_lain', 'dok_lain_text');
        });
        toggleText('dok_lain', 'dok_lain_text');
    });
</script>

<script>
    // PREFILL FORM TRANSFER PASIEN
    $(function() {
        var idHistory = $('#id_history').val();

        $.ajax({
            url: baseUrl + 'TransferPasien/get_transfer_pasien',
            type: 'POST',
            data: {
                id_history: idHistory
            },
            dataType: 'json',
            success: function(res) {
                if (!res || res.status_dt !== 'found') return;

                // SITUATION
                $('[name="pasien_dari"]').val(res.pasien_dari);
                $('[name="tt_asal"]').val(res.tt_asal);
                $('[name="tiba_di"]').val(res.tiba_di);
                $('[name="tt_tujuan"]').val(res.tt_tujuan);

                $('[name="dr1"]').val(res.dr1);
                $('[name="dr2"]').val(res.dr2);
                $('[name="dr3"]').val(res.dr3);

                $('[name="dx1"]').val(res.dx1);
                $('[name="dx2"]').val(res.dx2);
                $('[name="dx3"]').val(res.dx3);

                $('[name="prosedur_invasif"]').val(res.prosedur_invasif);
                $('[name="tgl_prosedur"]').val(res.tgl_prosedur);
                $('[name="indikasi_rawat_inap"]').val(res.indikasi_rawat_inap);
                //  $('input[type=radio]:checked').trigger('change');

                // BACKGROUND
                // if (res.alergi_obat) {
                //     $('input[name="alergi_obat"][value="' + res.alergi_obat + '"]').prop('checked', true);
                // }
                // $('#riwayat_alergi_lainnya').val(res.riwayat_alergi_lainnya);

                // riwayat alergi
                    if (res.alergi_obat) {
                        $('input[name="alergi_obat"][value="' + res.alergi_obat + '"]').prop('checked', true).trigger('change');
                        $('[name="alergi_obat_nama"]').val(res.alergi_obat_nama || '');
                    }
                //  $('input[type=radio]:checked').trigger('change');

                if (res.kewaspadaan) {
                    res.kewaspadaan.split(',').forEach(function(v) {
                        v = v.trim();
                        $('input[name="kewaspadaan[]"][value="' + v + '"]').prop('checked', true);
                    });
                }

                $('[name="riwayat_dulu"]').val(res.riwayat_dulu);

                // ASSESSMENT ATAS
                $('[name="jam_observasi"]').val(res.jam_observasi);
                $('[name="pupil_kanan"]').val(res.pupil_kanan);
                $('[name="pupil_kiri"]').val(res.pupil_kiri);

                // EWS + SKOR
                $('[name="ews"]').val(res.ews);
                $('[name="ews_kategori"]').val(res.ews_kategori);

                $('[name="skor_nyeri"]').val(res.skor_nyeri);
                $('[name="skor_nyeri_kategori"]').val(res.skor_nyeri_kategori);

                $('[name="skor_jatuh"]').val(res.skor_jatuh);
                $('[name="skor_jatuh_kategori"]').val(res.skor_jatuh_kategori);

                $('[name="skor_vte"]').val(res.skor_vte);
                $('[name="skor_vte_kategori"]').val(res.skor_vte_kategori);

                $('[name="skor_braden"]').val(res.skor_braden);
                $('[name="skor_braden_kategori"]').val(res.skor_braden_kategori);

                // PEMBERIAN MAKAN (string ke radio + textbox + hidden)
                if (res.pemberian_makan) {
                    $('#pemberian_makan').val(res.pemberian_makan);

                    var pm = res.pemberian_makan;

                    if (pm.indexOf('Batasan Cairan') === 0) {
                        $('#makan_batasan').prop('checked', true);
                        $('#txt_batasan_cairan')
                            .val(pm.replace('Batasan Cairan', '').trim())
                            .show();
                    } else if (pm.indexOf('Diet Khusus') === 0) {
                        $('#makan_diet').prop('checked', true);
                        $('#txt_diet_khusus')
                            .val(pm.replace('Diet Khusus', '').trim())
                            .show();
                    } else {
                        $('input[name="pemberian_makan_opt"][value="' + pm + '"]').prop('checked', true);
                    }
                }

                // BAB / BAK
                // BAB / BAK (radio)
                if (res.bab) {
                    $('input[name="bab"][value="' + res.bab + '"]').prop('checked', true);
                }

                if (res.bak) {
                    $('input[name="bak"][value="' + res.bak + '"]').prop('checked', true);
                }

                // AKTIVITAS / MOBILITAS (radio)
                if (res.aktivitas) {
                    $('input[name="aktivitas"][value="' + res.aktivitas + '"]').prop('checked', true);
                }

                if (res.mobilitas) {
                    $('input[name="mobilitas"][value="' + res.mobilitas + '"]').prop('checked', true);
                }

                // DEKUBITUS
                if (res.dekubitus) {
                    $('input[name="dekubitus"][value="' + res.dekubitus + '"]').prop('checked', true).trigger('change');
                    $('[name="dekubitus_lokasi"]').val(res.dekubitus_lokasi || '');
                }

                // INDRA
                if (res.gangguan_indra) {
                    $('input[name="indra"][value="' + res.gangguan_indra + '"]').prop('checked', true).trigger('change');
                    $('[name="indra_lokasi"]').val(res.indra_lokasi || '');
                }

                // ALAT BANTU
                if (res.alat_bantu) {
                    $('input[name="alat_bantu"][value="' + res.alat_bantu + '"]').prop('checked', true).trigger('change');
                    $('[name="alat_bantu_lokasi"]').val(res.alat_bantu_lokasi || '');
                }

                // INFUS
                    if (res.infus) {
                        $('input[name="infus"][value="' + res.infus + '"]').prop('checked', true).trigger('change');
                        $('[name="infus_pivas"]').val(res.infus_pivas || '');
                        $('[name="infus_tanggal"]').val(res.infus_tanggal || '');
                    }

                    

                // RECOMMENDATIONS
                $('[name="follow_up_rujukan"]').val(res.follow_up_rujukan);
                $('[name="terapi_khusus"]').val(res.terapi_khusus);
                $('[name="peralatan_khusus"]').val(res.peralatan_khusus);
                $('[name="rencana_tindakan"]').val(res.rencana_tindakan);
                $('[name="persiapan_khusus"]').val(res.persiapan_khusus);
                $('[name="persiapan_pulang"]').val(res.persiap_pulang || res.persiapan_pulang);

                // HASIL PEMERIKSAAN
                $('[name="lab_lembar"]').val(res.lab_lembar);
                $('[name="xray_lembar"]').val(res.xray_lembar);
                $('[name="ctscan_lembar"]').val(res.ctscan_lembar);
                $('[name="mri_lembar"]').val(res.mri_lembar);
                $('[name="ekg_lembar"]').val(res.ekg_lembar);
                $('[name="echo_lembar"]').val(res.echo_lembar);
                $('[name="periksa_lainnya"]').val(res.periksa_lainnya);

                if (res.hasil_periksa) {
                    res.hasil_periksa.split(',').forEach(function(v) {
                        v = v.trim();
                        $('input[name="hasil_periksa[]"][value="' + v + '"]')
                            .prop('checked', true)
                            .trigger('change');
                    });
                }

                if (res.dokumen) {
                    res.dokumen.split(',').forEach(function(v) {
                        v = v.trim();
                        $('input[name="dokumen[]"][value="' + v + '"]')
                            .prop('checked', true)
                            .trigger('change');
                    });
                }
                $('[name="dokumen_lainnya"]').val(res.dokumen_lainnya);

                $('[name="hasil_nilai_kritis"]').val(res.hasil_nilai_kritis);

                // PERAWAT & DOKTER JAGA
                $('[name="diserahkan_oleh"]').val(res.diserahkan_oleh);
                $('[name="diterima_oleh"]').val(res.diterima_oleh);

                $('[name="dokter_jaga"]').val(res.dokter_jaga).trigger('change');

                $('[name="tgl_pengajuan"]').val(res.tgl_pengajuan);
                $('[name="jam_pengajuan"]').val(res.jam_pengajuan);
            }
        });
    });
</script>

<script>
    // load riwayat_dulu ke textarea "Riwayat Penyakit Terdahulu"
    $(function() {
        var idHistory = $('#id_history').val();

        $.ajax({
            url: baseUrl + 'TransferPasien/get_riwayat_dulu',
            type: 'POST',
            data: {
                id_history: idHistory
            },
            dataType: 'json',
            success: function(res) {
                if (res && res.status === 'found') {
                    $('[name="riwayat_dulu"]').val(res.riwayat_dulu);
                }
            }
        });
    });
</script>

<script>
    // ambil triase dasar dari form triase IGD lama
    $(function() {
        loadTriaseToForm();
    });
</script>

<script>
    // toggle lokasi dekubitus, indra, alat bantu, infus
    $(function() {
        function toggleLokasi(cekIdAda, cekIdTidak, inputId) {
            var $ada = $('#' + cekIdAda);
            var $tidak = $('#' + cekIdTidak);
            var $inp = $('#' + inputId);

            function update() {
                if ($ada.is(':checked')) {
                    $inp.show();
                } else {
                    $inp.hide().val('');
                }
            }

            $ada.on('change', update);
            $tidak.on('change', update);
            update();
        }

        toggleLokasi('dekub_ada', 'dekub_tidak', 'dekubitus_lokasi');
        toggleLokasi('indra_ada', 'indra_tidak', 'indra_lokasi');
        toggleLokasi('alat_ya', 'alat_tidak', 'alat_bantu_lokasi');
        toggleLokasi('alergi_ya', 'alergi_tidak', 'alergi_obat_nama');

        function toggleInfus() {
            if ($('#infus_ya').is(':checked')) {
                $('#infus_pivas').show();
                $('#infus_tanggal').show();
            } else {
                $('#infus_pivas').hide().val('');
                $('#infus_tanggal').hide().val('');
            }
        }

        $('#infus_ya, #infus_tidak').on('change', toggleInfus);
        toggleInfus();
    });
</script>

<script>
    var base_url = '<?= base_url(); ?>';

    function saveTriase() {
        return $.post(
            base_url + 'TransferPasien/saveTriase', {
                id_history: $('#id_history').val(),
                id_pelayanan: $('#id_pelayanan').val(),
                no_rm: $('#no_rm').val(),

                gcs: $('#gcs').val(),
                e: $('#e').val() || '',
                m: $('#m').val() || '',
                v: $('#v').val() || '',

                tekanan_darah: $('input[name="tekanan_darah"]').val(),
                suhu: $('input[name="suhu"]').val(),
                spo2: $('input[name="spo2"]').val(),
                frequensi_nadi: $('input[name="frequensi_nadi"]').val(),
                frequensi_nafas: $('input[name="frequensi_nafas"]').val()
            },
            null,
            'json'
        );
    }


    function loadTriaseToForm() {
        $.post(
            base_url + 'TransferPasien/get_triase', {
                id_history: $('#id_history').val()
            },
            function(res) {
                console.log(res);
                if (res && res.status_dt === 'found') {
                    $('#gcs').val(res.gcs);
                    $('#e').val(res.e);
                    $('#m').val(res.m);
                    $('#v').val(res.v);

                    $('input[name="tekanan_darah"]').val(res.tekanan_darah);
                    $('input[name="suhu"]').val(res.suhu);
                    $('input[name="spo2"]').val(res.spo2);
                    $('input[name="frequensi_nadi"]').val(res.frequensi_nadi);
                    $('input[name="frequensi_nafas"]').val(res.frequensi_nafas);
                }
            },
            'json'
        );
    }


    function saveRiwayatDulu() {
        var dfd = $.Deferred();

        var dataR = {
            id_history: $('#id_history').val(),
            id_pelayanan: $('#id_pelayanan').val(),
            no_rm: $('#no_rm').val(),
            riwayat_dulu: $('textarea[name="riwayat_dulu"]').val()
        };

        $.post(base_url + 'TransferPasien/save_riwayat_dulu', dataR, function(res) {
            dfd.resolve(res);
        }, 'json').fail(function() {
            dfd.reject();
        });

        return dfd.promise();
    }

    function saveDokterJagaIGD() {
        var dfd = $.Deferred();

        // logika: hanya simpan jika opsi verifikasi dokter di form ini memang "Ya"
        var opt = $('input[name="verifikasi_dokter"]:checked').val();

        if (opt !== 'Ya') {
            dfd.resolve();
            return dfd.promise();
        }

        var dokterId = $('#dokter_jaga_dropdown').val();
        var dokterNama = $('#dokter_jaga_dropdown option:selected').text();

        if (!dokterId) {
            dfd.resolve();
            return dfd.promise();
        }

        var dataD = {
            id_history: $('#id_history').val(),
            id_pelayanan: $('#id_pelayanan').val(),
            no_rm: $('#no_rm').val(),
            verif: 'Ya',
            nama_dokter: dokterNama,
            instruksi: 'Dokter jaga IGD dari form transfer',
            S: '',
            O: '',
            A: '',
            P: '',
            tanggal_rencana: $('#tgl_pengajuan').val() || '',
            mulai_pukul: $('#jam_pengajuan').val() || ''
        };

        $.post(
            base_url + 'Erm_ranap_catatan_perkembangan/insert_perkembangan',
            dataD,
            function(res) {
                dfd.resolve(res);
            },
            'json'
        ).fail(function() {
            dfd.reject();
        });

        return dfd.promise();
    }

    function saveTransferForm() {
        var dfd = $.Deferred();
        var dataForm = $('#form-transfer-pasien').serialize();

        $.post(
            base_url + 'TransferPasien/simpan_transfer_igd',
            dataForm,
            function(res) {
                if (res && res.status === 'success') {
                    dfd.resolve(res);
                } else {
                    dfd.reject(res);
                }
            },
            'json'
        ).fail(function(jqXHR, textStatus, errorThrown) {
            console.error('Error saveTransferForm:', textStatus, errorThrown, jqXHR.responseText);
            dfd.reject({
                message: 'Gagal Koneksi atau Format JSON Tidak Valid'
            });
        });

        return dfd.promise();
    }

    $('#form-transfer-pasien').on('submit', function(e) {
        e.preventDefault();

        // packing nilai pemberian_makan ke hidden sebelum semua proses simpan
        var val = $('input[name="pemberian_makan_opt"]:checked').val() || '';
        var finalVal = val;

        if (val === 'Batasan Cairan') {
            var ketBatasan = $('#txt_batasan_cairan').val().trim();
            if (ketBatasan !== '') {
                finalVal = val + ': ' + ketBatasan;
            }
        } else if (val === 'Diet Khusus') {
            var ketDiet = $('#txt_diet_khusus').val().trim();
            if (ketDiet !== '') {
                finalVal = val + ': ' + ketDiet;
            }
        }

        $('#pemberian_makan').val(finalVal);

        $.when(
            saveTriase(),
            saveRiwayatDulu(),
            saveDokterJagaIGD(),
            saveTransferForm()
        ).done(function() {

            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data transfer pasien berhasil disimpan'
            }).then(() => {
                location.reload();
            });

        }).fail(function() {

            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Terjadi kesalahan saat menyimpan data'
            }).then(() => {
                location.reload();
            });

        });
    });
</script>

<!-- rumus GCS -->
<script>
    var inputE = document.getElementById('e');
    var inputM = document.getElementById('m');
    var inputV = document.getElementById('v');
    var inputGCS = document.getElementById('gcs');

    function calculateGCS() {
        var eValue = parseInt(inputE.value, 10) || 0;
        var mValue = parseInt(inputM.value, 10) || 0;
        var vValue = parseInt(inputV.value, 10) || 0;

        var gcsValue = eValue + mValue + vValue;
        inputGCS.value = gcsValue;
    }

    inputE.addEventListener('input', calculateGCS);
    inputM.addEventListener('input', calculateGCS);
    inputV.addEventListener('input', calculateGCS);
</script>