<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h4 class="panel-title txt-dark">ASESMEN JATUH ANAK</h4>

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">

                        <!-- Info Pasien -->
                        <h5 class="txt-dark mb-20">Data Pasien</h5>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>

                                        <input type="text" disabled class="form-control" value="<?php echo $no_rm?>" id="inNoRM">
                                        <input type="hidden" class="form-control" value="<?php echo $id_pelayanan?>" id="inPel">
                                        <input type="hidden" class="form-control" value="<?php echo $id_history?>" id="inHis">
                                         <input type="hidden" class="form-control" id="id" name="id">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?php echo $nama ?>" id="inNama">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Tgl Lahir / Umur<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?php
                                                                                        setlocale(LC_ALL, 'id_ID');

                                                                                        date_default_timezone_set('Asia/Jakarta');
                                                                                        $time = strtotime($tgl_lahir);
                                                                                        $date = strftime(" %d %B %Y ", $time);
                                                                                        echo $date . '(' . getAge($tgl_lahir) . ')' ?>">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                <!-- <input type="text" disabled class="form-control" id="inJk"> -->
                                <input type="text" disabled class="form-control" value="<?php echo $jenis_kelamin ?>" id="inJk">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 text-left">
                                <label class="control-label mb-10 ">Ruang Rawat<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?php echo $nama_ruangan ?>" id="inRawat" disabled>
                            </div>
                        </div>

                        <!-- Faktor Resiko -->
                        <h5 class="txt-dark mb-20 mt-30">Faktor Resiko</h5>
                    <hr>

                                <div class="form-group" id="spirit">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">Ket : DESKRIPSI RESIKO (SKOR)</label>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">Total Skor :</label>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">- 7–11 : Resiko Rendah</label>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">- > 12 : Resiko Tinggi</label>
                                    </div>

                                    <!-- ================== CSS ================== -->
                                    <style>
                                        .risk-form label.control-label,
                                        .control-label {
                                            color: #000 !important;
                                            font-weight: 500;
                                        }

                                        .radio-button-primary input[type="radio"],
                                        input[type="radio"] {
                                            accent-color: #1e90ff;
                                            width: 16px !important;
                                            height: 16px !important;
                                            cursor: pointer;
                                            flex-shrink: 0;
                                        }

                                        .radio-button-primary {
                                            display: flex;
                                            align-items: center;
                                            gap: 6px;
                                            margin-bottom: 6px;
                                        }

                                        .radio-button-primary.long-label {
                                            align-items: flex-start;
                                        }

                                        .radio-button-primary.long-label label {
                                            line-height: 1.35;
                                            margin-top: -1px;
                                            display: block;
                                            padding-left: 2px;
                                        }

                                        .form-group {
                                            margin-bottom: 18px;
                                        }
                                    </style>

                                    <!-- ================== FORM RADIO BUTTON ================== -->

                                    <!-- USIA -->
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <label class="control-label mb-10" style="font-weight: 600; margin-top: 10px;">
                                                a. Berapa usia pasien
                                            </label>
                                            <span id="usia_error" class="text-danger"></span>

                                            <div class="radio-button-primary">
                                                <input id="kurang_3_tahun" type="radio" name="usia" value="4">
                                                <label for="kurang_3_tahun">Kurang dari 3 tahun (4)</label>
                                            </div>

                                            <div class="radio-button-primary">
                                                <input id="usia_3_7_tahun" type="radio" name="usia" value="3">
                                                <label for="usia_3_7_tahun">Dari 3–7 tahun (3)</label>
                                            </div>

                                            <div class="radio-button-primary">
                                                <input id="usia_7_13_tahun" type="radio" name="usia" value="2">
                                                <label for="usia_7_13_tahun">7–13 tahun (2)</label>
                                            </div>

                                            <div class="radio-button-primary">
                                                <input id="lebih_13_tahun" type="radio" name="usia" value="1">
                                                <label for="lebih_13_tahun">Lebih dari 13 tahun (1)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- JENIS KELAMIN -->
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <label class="control-label mb-10" style="font-weight: 600; margin-top: 10px;">
                                                b. Jenis kelamin pasien
                                            </label>
                                            <span id="kelamin_error" class="text-danger"></span>

                                            <div class="radio-button-primary">
                                                <input id="laki_laki" type="radio" name="kelamin" value="2">
                                                <label for="laki_laki">Laki-laki (2)</label>
                                            </div>

                                            <div class="radio-button-primary">
                                                <input id="perempuan" type="radio" name="kelamin" value="1">
                                                <label for="perempuan">Perempuan (1)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- DIAGNOSA -->
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <label class="control-label mb-10" style="font-weight: 600; margin-top: 10px;">
                                                c. Diagnosa Pasien
                                            </label>
                                            <span id="diagnosa_error" class="text-danger"></span>

                                            <div class="radio-button-primary">
                                                <input id="neurologi" type="radio" name="diagnosa" value="4">
                                                <label for="neurologi">Neurologi (4)</label>
                                            </div>

                                            <div class="radio-button-primary long-label">
                                                <input id="gangguan_oksigenasi" type="radio" name="diagnosa" value="3">
                                                <label for="gangguan_oksigenasi">
                                                    Gangguan oksigenasi, respiratorik, dehidrasi, anemia, anoreksia, syncope (3)
                                                </label>
                                            </div>

                                            <div class="radio-button-primary">
                                                <input id="gangguan_perilaku" type="radio" name="diagnosa" value="2">
                                                <label for="gangguan_perilaku">Gangguan perilaku (2)</label>
                                            </div>

                                            <div class="radio-button-primary">
                                                <input id="lain_lain" type="radio" name="diagnosa" value="1">
                                                <label for="lain_lain">Lain-lain (1)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- KOGNITIF -->
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <label class="control-label mb-10" style="font-weight: 600; margin-top: 10px;">
                                                d. Gangguan kognitif pada pasien
                                            </label>
                                            <span id="kognitif_error" class="text-danger"></span>

                                            <div class="radio-button-primary">
                                                <input id="keterbatasan_daya_pikir" type="radio" name="kognitif" value="3">
                                                <label for="keterbatasan_daya_pikir">Keterbatasan daya pikir (3)</label>
                                            </div>

                                            <div class="radio-button-primary">
                                                <input id="pelupa_berkurang_orientasi" type="radio" name="kognitif" value="2">
                                                <label for="pelupa_berkurang_orientasi">Pelupa, berkurangnya orientasi (2)</label>
                                            </div>

                                            <div class="radio-button-primary">
                                                <input id="daya_pikir_normal" type="radio" name="kognitif" value="1">
                                                <label for="daya_pikir_normal">Normal (1)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- LINGKUNGAN -->
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <label class="control-label mb-10" style="font-weight: 600; margin-top: 10px;">
                                                e. Faktor Lingkungan Pasien
                                            </label>
                                            <span id="lingkungan_error" class="text-danger"></span>

                                            <div class="radio-button-primary">
                                                <input id="faktor1" type="radio" name="lingkungan" value="4">
                                                <label for="faktor1">Riwayat jatuh / bayi di tempat tidur (4)</label>
                                            </div>

                                            <div class="radio-button-primary">
                                                <input id="faktor2" type="radio" name="lingkungan" value="3">
                                                <label for="faktor2">Pakai alat bantu / bayi dalam ayunan (3)</label>
                                            </div>

                                            <div class="radio-button-primary">
                                                <input id="faktor3" type="radio" name="lingkungan" value="2">
                                                <label for="faktor3">Pasien di tempat tidur (2)</label>
                                            </div>

                                            <div class="radio-button-primary">
                                                <input id="faktor4" type="radio" name="lingkungan" value="1">
                                                <label for="faktor4">Rawat jalan (1)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- RESPONSE -->
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <label class="control-label mb-10" style="font-weight: 600; margin-top: 10px;">
                                                f. Response pasien terhadap pembedahan sedasi & anestesi
                                            </label>
                                            <span id="response_error" class="text-danger"></span>

                                            <div class="radio-button-primary">
                                                <input id="dalam_24_jam" type="radio" name="response" value="3">
                                                <label for="dalam_24_jam">Dalam 24 jam (3)</label>
                                            </div>

                                            <div class="radio-button-primary">
                                                <input id="dalam_48_jam" type="radio" name="response" value="2">
                                                <label for="dalam_48_jam">Dalam 48 jam (2)</label>
                                            </div>

                                            <div class="radio-button-primary">
                                                <input id="lebih_48_jam" type="radio" name="response" value="1">
                                                <label for="lebih_48_jam">>48 jam / tidak ada respon (1)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- OBAT-OBATAN -->
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <label class="control-label mb-10" style="font-weight: 600; margin-top: 10px;">
                                                g. Penggunaan Obat-Obatan
                                            </label>
                                            <span id="obat_error" class="text-danger"></span>

                                            <div class="radio-button-primary long-label">
                                                <input id="penggunaan_banyak_obat" type="radio" name="obat" value="3">
                                                <label for="penggunaan_banyak_obat">
                                                    Sedative, barbiturate, antidepresan, diuretik, narkotika, laksatif, ICU (3)
                                                </label>
                                            </div>

                                            <div class="radio-button-primary long-label">
                                                <input id="satu_obat" type="radio" name="obat" value="2">
                                                <label for="satu_obat">Satu dari obat-obatan di atas (2)</label>
                                            </div>

                                            <div class="radio-button-primary long-label">
                                                <input id="obat_lain_tanpa_obat" type="radio" name="obat" value="1">
                                                <label for="obat_lain_tanpa_obat">Obat lain / tanpa obat (1)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- BUTTON -->
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-success mb-4" onclick="sumScore()">Skor Resiko</button>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" disabled id="inTotal">
                                            <input type="hidden" id="tipeResikoHidden" name="tipe_resiko">
                                        </div>
                                    </div>
                                </div>


                            <!-- Select all radio button ya-->
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const observasiYes = document.getElementById("p1_ya");

                                    observasiYes.addEventListener("change", function() {
                                        if (observasiYes.checked) {
                                            // Get all radio buttons with "Ya" option
                                            const radioButtons = document.querySelectorAll(
                                                'input[type="radio"][value="Ya"]'
                                            );

                                            // Select all "Ya" options except those with data-exclude
                                            radioButtons.forEach((radio) => {
                                                if (!radio.hasAttribute("data-exclude")) {
                                                    radio.checked = true;
                                                }
                                            });
                                        }
                                    });
                                });
                            </script>

                            <!-- Formulir Resiko Rendah -->
                            <style>
                                /* Semua label teks pertanyaan dibuat hitam, font-weight seperti faktor risiko */
                                .risk-form label.control-label {
                                    color: #000 !important;
                                    font-weight: 600;
                                    margin-top: 10px;
                                    display: block;
                                }

                                /* Radio button ukuran standar, warna biru */
                                .radio-button input[type="radio"],
                                .radio-button-primary input[type="radio"] {
                                    accent-color: #1e90ff;
                                    width: 16px !important;
                                    height: 16px !important;
                                    cursor: pointer;
                                    flex-shrink: 0;
                                }

                                /* Wrapper radio agar rapi */
                                .radio-button,
                                .radio-button-primary {
                                    display: flex;
                                    align-items: center;
                                    gap: 6px;
                                    margin-bottom: 6px;
                                }

                                /* Label radio panjang */
                                .radio-button label,
                                .radio-button-primary label {
                                    line-height: 1.35;
                                    margin-top: -1px;
                                    cursor: pointer;
                                    display: block;
                                    padding-left: 2px;
                                    color: #000;
                                    font-weight: 500;
                                }

                                /* Jarak antar pertanyaan */
                                .form-group {
                                    margin-bottom: 18px;
                                }
                            </style>

                            <div id="formResikoRendah" class="risk-form" style="display:none;">
                                <div class="col-md-12">
                                    <h5 style="margin-top: 30px;"><strong>FORMULIR INTERVENSI JATUH RESIKO RENDAH</strong></h5>
                                </div>

                                <!-- 1 -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label">1. Orientasikan pasien pada lingkungan kamar/bangsal</label>
                                        <div class="radio-button">
                                            <input id="p1_tidak" type="radio" name="orientasikan_pasien" value="Tidak">
                                            <label for="p1_tidak">Tidak</label>
                                        </div>
                                        <div class="radio-button">
                                            <input id="p1_ya" type="radio" name="orientasikan_pasien" value="Ya">
                                            <label for="p1_ya">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- 2 -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label">2. Pastikan rem tempat tidur terkunci</label>
                                        <div class="radio-button">
                                            <input id="p2_tidak" type="radio" name="rem_tempat_tidur" value="Tidak">
                                            <label for="p2_tidak">Tidak</label>
                                        </div>
                                        <div class="radio-button">
                                            <input id="p2_ya" type="radio" name="rem_tempat_tidur" value="Ya">
                                            <label for="p2_ya">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- 3 -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label">3. Pastikan bel pasien terjangkau</label>
                                        <div class="radio-button">
                                            <input id="p3_tidak" type="radio" name="pastikel_bel" value="Tidak">
                                            <label for="p3_tidak">Tidak</label>
                                        </div>
                                        <div class="radio-button">
                                            <input id="p3_ya" type="radio" name="pastikel_bel" value="Ya">
                                            <label for="p3_ya">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- 4 -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label">
                                            4. Singkirkan barang yang berbahaya terutama pada malam hari (kursi tambahan dan lain-lain)
                                        </label>
                                        <div class="radio-button">
                                            <input id="p4_tidak" type="radio" name="singkirkan_barang_berbahaya" value="Tidak">
                                            <label for="p4_tidak">Tidak</label>
                                        </div>
                                        <div class="radio-button">
                                            <input id="p4_ya" type="radio" name="singkirkan_barang_berbahaya" value="Ya">
                                            <label for="p4_ya">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- 5 -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label">
                                            5. Minta persetujuan pasien agar lampu malam tetap menyala karena lingkungan masih asing
                                        </label>
                                        <div class="radio-button">
                                            <input id="p5_tidak" type="radio" name="persetujuan_pasien" value="Tidak">
                                            <label for="p5_tidak">Tidak</label>
                                        </div>
                                        <div class="radio-button">
                                            <input id="p5_ya" type="radio" name="persetujuan_pasien" value="Ya">
                                            <label for="p5_ya">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- 6 -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label">6. Pastikan alat bantu jalan dalam jangkauan</label>
                                        <div class="radio-button">
                                            <input id="p6_tidak" type="radio" name="alat_bantu_jalan" value="Tidak">
                                            <label for="p6_tidak">Tidak</label>
                                        </div>
                                        <div class="radio-button">
                                            <input id="p6_ya" type="radio" name="alat_bantu_jalan" value="Ya">
                                            <label for="p6_ya">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- 7 -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label">7. Pastikan alas kaki tidak licin</label>
                                        <div class="radio-button">
                                            <input id="p7_tidak" type="radio" name="alas_kaki" value="Tidak">
                                            <label for="p7_tidak">Tidak</label>
                                        </div>
                                        <div class="radio-button">
                                            <input id="p7_ya" type="radio" name="alas_kaki" value="Ya">
                                            <label for="p7_ya">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- 8 -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label">8. Pastikan kebutuhan pribadi dalam jangkauan</label>
                                        <div class="radio-button">
                                            <input id="p8_tidak" type="radio" name="kebutuhan_pribadi" value="Tidak">
                                            <label for="p8_tidak">Tidak</label>
                                        </div>
                                        <div class="radio-button">
                                            <input id="p8_ya" type="radio" name="kebutuhan_pribadi" value="Ya">
                                            <label for="p8_ya">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- 9 -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label">9. Tempatkan meja pasien dengan baik agar tidak menghalangi</label>
                                        <div class="radio-button">
                                            <input id="p9_tidak" type="radio" name="meja_pasien" value="Tidak">
                                            <label for="p9_tidak">Tidak</label>
                                        </div>
                                        <div class="radio-button">
                                            <input id="p9_ya" type="radio" name="meja_pasien" value="Ya">
                                            <label for="p9_ya">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- 10 -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label">10. Tempatkan pasien sesuai dengan tinggi badannya</label>
                                        <div class="radio-button">
                                            <input id="p10_tidak" type="radio" name="tempatkan_pasien" value="Tidak">
                                            <label for="p10_tidak">Tidak</label>
                                        </div>
                                        <div class="radio-button">
                                            <input id="p10_ya" type="radio" name="tempatkan_pasien" value="Ya">
                                            <label for="p10_ya">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- 11 -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label">11. Review kembali obat-obatan yang beresiko jatuh</label>
                                        <div class="radio-button">
                                            <input id="p11_tidak" type="radio" name="review_obat_berisiko" value="Tidak">
                                            <label for="p11_tidak">Tidak</label>
                                        </div>
                                        <div class="radio-button">
                                            <input id="p11_ya" type="radio" name="review_obat_berisiko" value="Ya">
                                            <label for="p11_ya">Ya</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Formulir Resiko Tinggi -->
                            <div id="formResikoTinggi" class="risk-form" style="display:none;">
                                <div class="col-md-12">
                                    <h5 style="margin-top: 30px;"><strong>FORMULIR INTERVENSI JATUH RESIKO TINGGI</strong></h5>
                                </div>

                                <!-- 1 -->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label">1. Kaji kebutuhan pasien</label>
                                        <div class="radio-button-primary">
                                            <input id="kaji1" type="radio" name="kebutuhan_pasien" value="Tidak">
                                            <label for="kaji1">Tidak</label>
                                        </div>
                                        <div class="radio-button-primary">
                                            <input id="kaji2" type="radio" name="kebutuhan_pasien" value="Ya">
                                            <label for="kaji2">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- 2 -->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label">2. Pasang pagar pengaman tempat tidur dan pastikan rem tempat tidur terkunci</label>
                                        <div class="radio-button-primary">
                                            <input id="pagar1" type="radio" name="pagar_pegangan" value="Tidak">
                                            <label for="pagar1">Tidak</label>
                                        </div>
                                        <div class="radio-button-primary">
                                            <input id="pagar2" type="radio" name="pagar_pegangan" value="Ya">
                                            <label for="pagar2">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- 3 -->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label">3. Bila memungkinkan pindahkan pasien dekat nurse station</label>
                                        <div class="radio-button-primary">
                                            <input id="pindah1" type="radio" name="pindahkan_pasien" value="Tidak">
                                            <label for="pindah1">Tidak</label>
                                        </div>
                                        <div class="radio-button-primary">
                                            <input id="pindah2" type="radio" name="pindahkan_pasien" value="Ya">
                                            <label for="pindah2">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- 4 -->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label">4. Orientasikan ulang bila perlu</label>
                                        <div class="radio-button-primary">
                                            <input id="orientasi1" type="radio" name="orientasi_ulang" value="Tidak">
                                            <label for="orientasi1">Tidak</label>
                                        </div>
                                        <div class="radio-button-primary">
                                            <input id="orientasi2" type="radio" name="orientasi_ulang" value="Ya">
                                            <label for="orientasi2">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- 5 -->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label">5. Berikan tanda gelang berwarna kuning dan kalung kuning risiko jatuh tinggi yang digantungkan pada bed pasien</label>
                                        <div class="radio-button-primary">
                                            <input id="gelangk1" type="radio" name="tanda_gelang_kuning" value="Tidak">
                                            <label for="gelangk1">Tidak</label>
                                        </div>
                                        <div class="radio-button-primary">
                                            <input id="gelangk2" type="radio" name="tanda_gelang_kuning" value="Ya">
                                            <label for="gelangk2">Ya</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group text-center" style="margin-top: 30px;">
                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left">
                                        </i><span class="btn-text">KEMBALI</span></a>

                                    <button id="simpan" onclick="simpan()" type="submit" class="btn btn-success mb-4">Simpan</button>
                                    <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                                    <!-- <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button> -->
                                </div>
                                <canvas id="can" style="display:none;"></canvas>
                            </div>

                            <div class="panel panel-default card-view">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <!-- <h6 class="panel-title txt-dark">CATATAN PERKEMBANGAN</h6> -->
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="table-wrap">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover display pb-60" id="jatuh_ulang">
                                                            <thead>
                                                                <tr class="bg-success">
                                                                    <th>NO</th>
                                                                    <th>PILIH</th>
                                                                    <!-- <th>HAPUS</th> -->
                                                                    <!-- <th>DIAGNOSA</th> -->
                                                                    <th>SKOR</th>
                                                                    <th>TANGGAL</th>
                                                                    <th>STAFF</th>
                                                                    <th>TIPE RESIKO</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                                <tr class="bg-success">
                                                                    <th>NO</th>
                                                                    <th>PILIH</th>
                                                                    <!-- <th>HAPUS</th> -->
                                                                    <!-- <th>DIAGNOSA</th> -->
                                                                    <th>SKOR</th>
                                                                    <th>TANGGAL</th>
                                                                    <th>STAFF</th>
                                                                    <th>TIPE RESIKO</th>
                                                                </tr>
                                                            </tfoot>
                                                            <tbody style="color: black">

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
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function(e) {
                            id_pelayanan = $('#inPel').val();
                            reload_data_id_pel(id_pelayanan);
                        });
                    </script>


                    <script type="text/javascript">
                        function sumScore() {
                            var score = 0,
                                score1 = 0,
                                score2 = 0,
                                score3 = 0,
                                score4 = 0,
                                score5 = 0,
                                score6 = 0;


                            // Logika perhitungan skor yang sama seperti sebelumnya
                            if ($('#kurang_3_tahun').is(":checked")) score = 4;
                            else if ($('#usia_3_7_tahun').is(":checked")) score = 3;
                            else if ($('#usia_7_13_tahun').is(":checked")) score = 2;
                            else if ($('#lebih_13_tahun').is(":checked")) score = 1;

                            if ($('#laki_laki').is(":checked")) score1 = 2;
                            else if ($('#perempuan').is(":checked")) score1 = 1;

                            if ($('#neurologi').is(":checked")) score2 = 4;
                            else if ($('#gangguan_oksigenasi').is(":checked")) score2 = 3;
                            else if ($('#gangguan_perilaku').is(":checked")) score2 = 2;
                            else if ($('#lain_lain').is(":checked")) score2 = 1;

                            if ($('#keterbatasan_daya_pikir').is(":checked")) score3 = 3;
                            else if ($('#pelupa_berkurang_orientasi').is(":checked")) score3 = 2;
                            else if ($('#daya_pikir_normal').is(":checked")) score3 = 1;

                            if ($('#faktor1').is(":checked")) score4 = 4;
                            else if ($('#faktor2').is(":checked")) score4 = 3;
                            else if ($('#faktor3').is(":checked")) score4 = 2;
                            else if ($('#faktor4').is(":checked")) score4 = 1;


                            if ($('#dalam_24_jam').is(":checked")) score5 = 3;
                            else if ($('#dalam_48_jam').is(":checked")) score5 = 2;
                            else if ($('#lebih_48_jam').is(":checked")) score5 = 1;

                            if ($('#penggunaan_banyak_obat').is(":checked")) score6 = 3;
                            else if ($('#satu_obat').is(":checked")) score6 = 2;
                            else if ($('#obat_lain_tanpa_obat').is(":checked")) score6 = 1;

                            var sum = score + score1 + score2 + score3 + score4 + score5 + score6
                            $('#inTotal').val(sum);

                            var tipe_resiko = '';
                            if (sum >= 7 && sum <= 11) {
                                tipe_resiko = 'Rendah';
                            } else if (sum >= 12) {
                                tipe_resiko = 'Tinggi';
                            } else {
                                tipe_resiko = 'Tidak ada';
                            }


                            $('#tipeResikoHidden').val(tipe_resiko);

                            let formToShow = [];
                            if (sum >= 7 && sum <= 11) {
                                formToShow.push('formResikoRendah');
                            } else if (sum >= 12) {
                                formToShow.push('formResikoTinggi', 'formResikoRendah');
                            } else {
                                formToShow.push('formResikoRendah');
                            }
                            $('.risk-form').hide();
                            formToShow.forEach(function(form) {
                                $('#' + form).show();
                            });

                        }
                    </script>


                    <!-- Akasi dari controller -->
                    <script type="text/javascript">
                        function simpan() {
                            console.log("Fungsi simpan dipanggil");

                            //Data wajib (Argument)
                            var id_pelayanan = $('#inPel').val();
                            var id_history = $('#inHis').val();
                            var no_rm = $('#inNoRM').val();

                            // Data utama asesmen
                            var usia = $('input[name="usia"]:checked').val(); // A
                            var kelamin = $('input[name="kelamin"]:checked').val(); // B
                            var diagnosa = $('input[name="diagnosa"]:checked').val(); // C
                            var kognitif = $('input[name="kognitif"]:checked').val(); // D
                            var lingkungan = $('input[name="lingkungan"]:checked').val(); // E
                            var response = $('input[name="response"]:checked').val(); // F
                            var obat = $('input[name="obat"]:checked').val(); // G

                            var skor_total = $('#inTotal').val();
                            var staff = $('#inStaff').val();
                            var tipe_resiko = $('#tipeResikoHidden').val();

                            // Data tabel resiko ulang
                            var orientasikan_pasien = $('input[name="orientasikan_pasien"]:checked').val();
                            var rem_tempat_tidur = $('input[name="rem_tempat_tidur"]:checked').val();
                            var pastikel_bel = $('input[name="pastikel_bel"]:checked').val();
                            var singkirkan_barang_berbahaya = $('input[name="singkirkan_barang_berbahaya"]:checked').val();
                            var persetujuan_pasien = $('input[name="persetujuan_pasien"]:checked').val();
                            var alat_bantu_jalan = $('input[name="alat_bantu_jalan"]:checked').val();
                            var alas_kaki = $('input[name="alas_kaki"]:checked').val();
                            var kebutuhan_pribadi = $('input[name="kebutuhan_pribadi"]:checked').val();
                            var meja_pasien = $('input[name="meja_pasien"]:checked').val();
                            var tempatkan_pasien = $('input[name="tempatkan_pasien"]:checked').val();
                            var review_obat_berisiko = $('input[name="review_obat_berisiko"]:checked').val();
                            var kebutuhan_pasien = $('input[name="kebutuhan_pasien"]:checked').val();
                            var pagar_pegangan = $('input[name="pagar_pegangan"]:checked').val();
                            var pindahkan_pasien = $('input[name="pindahkan_pasien"]:checked').val();
                            var orientasi_ulang = $('input[name="orientasi_ulang"]:checked').val();
                            var tanda_gelang_kuning = $('input[name="tanda_gelang_kuning"]:checked').val();


                            // Buat data string untuk dikirim
                            var dataString =
                                'usia=' + usia + // a
                                '&no_rm=' + no_rm + // b
                                '&kelamin=' + kelamin + // c
                                '&diagnosa=' + diagnosa + // d
                                '&kognitif=' + kognitif + // e
                                '&id_pelayanan=' + id_pelayanan + // f
                                '&id_history=' + id_history + // g
                                '&lingkungan=' + lingkungan + // h     // FIX
                                '&response=' + response + // i
                                '&obat=' + obat + // j     // FIX
                                '&skor_total=' + skor_total + //k
                                '&staff=' + staff + // l
                                '&tipe_resiko=' + tipe_resiko + // m

                                // Sub tabel resiko ulang
                                '&orientasikan_pasien=' + orientasikan_pasien +
                                '&rem_tempat_tidur=' + rem_tempat_tidur +
                                '&pastikel_bel=' + pastikel_bel +
                                '&singkirkan_barang_berbahaya=' + singkirkan_barang_berbahaya +
                                '&persetujuan_pasien=' + persetujuan_pasien +
                                '&alat_bantu_jalan=' + alat_bantu_jalan +
                                '&alas_kaki=' + alas_kaki +
                                '&kebutuhan_pribadi=' + kebutuhan_pribadi +
                                '&meja_pasien=' + meja_pasien +
                                '&tempatkan_pasien=' + tempatkan_pasien +
                                '&review_obat_berisiko=' + review_obat_berisiko +
                                '&kebutuhan_pasien=' + kebutuhan_pasien +
                                '&pagar_pegangan=' + pagar_pegangan +
                                '&pindahkan_pasien=' + pindahkan_pasien +
                                '&orientasi_ulang=' + orientasi_ulang +
                                '&tanda_gelang_kuning=' + tanda_gelang_kuning;

                            console.log('ini data yang akan di load=>>', dataString);


                            $.ajax({
                                url: "<?php echo base_url() ?>Erm_awal_jatuh_anak/insert_asesmen",
                                method: "POST",
                                dataType: 'json',
                                data: dataString,
                                success: function(data) {
                                    if (data.status == "success") {
                                        window.location.href =
                                            "<?php echo base_url('Erm_awal_jatuh_anak/form/') ?>" +
                                            id_pelayanan + '/' + id_history;
                                    } else if (data.error) {
                                        // Validasi error
                                        if (!usia) $('#usia_error').html("*wajib diisi"); // a
                                        if (!kelamin) $('#kelamin_error').html("*wajib diisi"); //b
                                        if (!diagnosa) $('#diagnosa_error').html("*wajib diisi"); //c
                                        if (!kognitif) $('#kognitif_error').html("*wajib diisi"); //d
                                        if (!lingkungan) $('#lingkungan_error').html("*wajib diisi"); // FIX label e
                                        if (!response) $('#response_error').html("*wajib diisi"); //f
                                        if (!obat) $('#obat_error').html("*wajib diisi"); // FIX label //g
                                        if (!skor_total) $('#inTotal').html("*Klik Untuk Memproses Skor");
                                    } else {
                                        swal({
                                            title: "Gagal!",
                                            type: "warning",
                                            text: data.status,
                                            confirmButtonColor: "#3cb878",
                                        });
                                    }
                                }
                            });

                            return false;
                        }

                        function pilih(id) {
                              $('#id').val(id);
                            $.ajax({
                                url: "<?php echo base_url() ?>Erm_awal_jatuh_anak/get_ass_per",
                                method: "POST",
                                dataType: 'json',
                                data: {
                                    id: id
                                },
                                success: function(data) {
                                    if (data.status_dt == "found") {
                                        //Data utama asesmen
                                        $('input[name="usia"][value="' + data.usia + '"]').prop('checked', true);
                                        $('input[name="kelamin"][value="' + data.kelamin + '"]').prop('checked', true);
                                        $('input[name="kognitif"][value="' + data.kognitif + '"]').prop('checked', true);
                                        $('input[name="lingkungan"][value="' + data.lingkungan + '"]').prop('checked', true);
                                        $('input[name="response"][value="' + data.response + '"]').prop('checked', true);
                                        $('input[name="obat"][value="' + data.obat + '"]').prop('checked', true);
                                        //Data utama asesmen
                                        $('input[name="orientasikan_pasien"][value="' + data.orientasikan_pasien + '"]').prop('checked', true);
                                        $('input[name="rem_tempat_tidur"][value="' + data.rem_tempat_tidur + '"]').prop('checked', true);
                                        $('input[name="pastikel_bel"][value="' + data.pastikel_bel + '"]').prop('checked', true);
                                        $('input[name="singkirkan_barang_berbahaya"][value="' + data.singkirkan_barang_berbahaya + '"]').prop('checked', true);
                                        $('input[name="persetujuan_pasien"][value="' + data.persetujuan_pasien + '"]').prop('checked', true);
                                        $('input[name="alat_bantu_jalan"][value="' + data.alat_bantu_jalan + '"]').prop('checked', true);
                                        $('input[name="alas_kaki"][value="' + data.alas_kaki + '"]').prop('checked', true);
                                        $('input[name="kebutuhan_pribadi"][value="' + data.kebutuhan_pribadi + '"]').prop('checked', true);
                                        $('input[name="meja_pasien"][value="' + data.meja_pasien + '"]').prop('checked', true);
                                        $('input[name="tempatkan_pasien"][value="' + data.tempatkan_pasien + '"]').prop('checked', true);
                                        $('input[name="review_obat_berisiko"][value="' + data.review_obat_berisiko + '"]').prop('checked', true);
                                        $('input[name="kebutuhan_pasien"][value="' + data.kebutuhan_pasien + '"]').prop('checked', true);
                                        $('input[name="pagar_pegangan"][value="' + data.pagar_pegangan + '"]').prop('checked', true);
                                        $('input[name="pindahkan_pasien"][value="' + data.pindahkan_pasien + '"]').prop('checked', true);
                                        $('input[name="orientasi_ulang"][value="' + data.orientasi_ulang + '"]').prop('checked', true);
                                        $('input[name="tanda_gelang_kuning"][value="' + data.tanda_gelang_kuning + '"]').prop('checked', true);
                                        $('#inTotal').val(data.skor_total);
                                        $('#edit').show();
                                        $('#cetak').show();
                                        $('#simpan').hide();
                                        // smooth scroll
                                        window.scrollTo({
                                            top: 0,
                                            behavior: 'smooth'
                                        });
                                    } else {
                                        swal({
                                            title: "Gagal!",
                                            type: "warning",
                                            text: "Data Kosong",
                                            confirmButtonColor: "#3cb878",
                                        });
                                    }
                                }
                            });
                            return false;
                        }

                        function reload_data_id_pel(id_pelayanan) {
                            $('#jatuh_ulang').dataTable().fnClearTable();
                            $('#jatuh_ulang').dataTable().fnDestroy();
                            $('#jatuh_ulang').DataTable({
                                "language": {
                                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                                    "sProcessing": "Sedang memproses...",
                                    "sLengthMenu": "Tampilkan _MENU_ entri",
                                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                                    "sInfoPostFix": "",
                                    "sSearch": "Cari:",
                                    "sUrl": "",
                                    "oPaginate": {
                                        "sFirst": "Pertama",
                                        "sPrevious": "Sebelumnya",
                                        "sNext": "Selanjutnya",
                                        "sLast": "Terakhir"
                                    }
                                },
                                "ajax": {
                                    "url": '<?php echo base_url('Erm_awal_jatuh_anak/tampil_list_per_pen_rujukan'); ?>',
                                    "type": 'POST',
                                    "data": {
                                        id_pelayanan: id_pelayanan
                                    },
                                },
                                "deferRender": true,
                                "processing": true,
                                "order": [],
                                "columnDefs": [{
                                    "targets": [0],
                                    "orderable": false,
                                }],
                            });
                        }

                        function edit() {

                            var id = $('#id').val();
                            //Data wajib (Argument)
                            var id_pelayanan = $('#inPel').val();
                            var id_history = $('#inHis').val();
                            var no_rm = $('#inNoRM').val();

                            // Data utama asesmen
                            var usia = $('input[name="usia"]:checked').val(); // A
                            var kelamin = $('input[name="kelamin"]:checked').val(); // B
                            var diagnosa = $('input[name="diagnosa"]:checked').val(); // C
                            var kognitif = $('input[name="kognitif"]:checked').val(); // D
                            var lingkungan = $('input[name="lingkungan"]:checked').val(); // E
                            var response = $('input[name="response"]:checked').val(); // F
                            var obat = $('input[name="obat"]:checked').val(); // G

                            var skor_total = $('#inTotal').val();
                            var staff = $('#inStaff').val();
                            var tipe_resiko = $('#tipeResikoHidden').val();

                            // Data tabel resiko ulang
                            var orientasikan_pasien = $('input[name="orientasikan_pasien"]:checked').val();
                            var rem_tempat_tidur = $('input[name="rem_tempat_tidur"]:checked').val();
                            var pastikel_bel = $('input[name="pastikel_bel"]:checked').val();
                            var singkirkan_barang_berbahaya = $('input[name="singkirkan_barang_berbahaya"]:checked').val();
                            var persetujuan_pasien = $('input[name="persetujuan_pasien"]:checked').val();
                            var alat_bantu_jalan = $('input[name="alat_bantu_jalan"]:checked').val();
                            var alas_kaki = $('input[name="alas_kaki"]:checked').val();
                            var kebutuhan_pribadi = $('input[name="kebutuhan_pribadi"]:checked').val();
                            var meja_pasien = $('input[name="meja_pasien"]:checked').val();
                            var tempatkan_pasien = $('input[name="tempatkan_pasien"]:checked').val();
                            var review_obat_berisiko = $('input[name="review_obat_berisiko"]:checked').val();
                            var kebutuhan_pasien = $('input[name="kebutuhan_pasien"]:checked').val();
                            var pagar_pegangan = $('input[name="pagar_pegangan"]:checked').val();
                            var pindahkan_pasien = $('input[name="pindahkan_pasien"]:checked').val();
                            var orientasi_ulang = $('input[name="orientasi_ulang"]:checked').val();
                            var tanda_gelang_kuning = $('input[name="tanda_gelang_kuning"]:checked').val();


                            // Buat data string untuk dikirim
                            var dataString =
                                'id=' + id +
                                '&usia=' + usia + // a
                                '&no_rm=' + no_rm + // b
                                '&kelamin=' + kelamin + // c
                                '&diagnosa=' + diagnosa + // d
                                '&kognitif=' + kognitif + // e
                                '&id_pelayanan=' + id_pelayanan + // f
                                '&id_history=' + id_history + // g
                                '&lingkungan=' + lingkungan + // h     // FIX
                                '&response=' + response + // i
                                '&obat=' + obat + // j     // FIX
                                '&skor_total=' + skor_total + //k
                                '&staff=' + staff + // l
                                '&tipe_resiko=' + tipe_resiko + // m

                                // Sub tabel resiko ulang
                                '&orientasikan_pasien=' + orientasikan_pasien +
                                '&rem_tempat_tidur=' + rem_tempat_tidur +
                                '&pastikel_bel=' + pastikel_bel +
                                '&singkirkan_barang_berbahaya=' + singkirkan_barang_berbahaya +
                                '&persetujuan_pasien=' + persetujuan_pasien +
                                '&alat_bantu_jalan=' + alat_bantu_jalan +
                                '&alas_kaki=' + alas_kaki +
                                '&kebutuhan_pribadi=' + kebutuhan_pribadi +
                                '&meja_pasien=' + meja_pasien +
                                '&tempatkan_pasien=' + tempatkan_pasien +
                                '&review_obat_berisiko=' + review_obat_berisiko +
                                '&kebutuhan_pasien=' + kebutuhan_pasien +
                                '&pagar_pegangan=' + pagar_pegangan +
                                '&pindahkan_pasien=' + pindahkan_pasien +
                                '&orientasi_ulang=' + orientasi_ulang +
                                '&tanda_gelang_kuning=' + tanda_gelang_kuning;

                            console.log('ini data yang akan di load=>>', dataString);


                            $.ajax({
                                url: "<?php echo base_url() ?>Erm_awal_jatuh_anak/update_asesmen_anak",
                                method: "POST",
                                dataType: 'json',
                                data: dataString,
                                success: function(data) {
                                    if (data.status == "success") {
                                        window.location.href = "<?php echo base_url('Erm_awal_jatuh_anak/formulangjatuhanak/') ?>" + id_pelayanan + '/' + id_history;
                                    } else {
                                        swal({
                                            title: "Gagal!",
                                            type: "warning",
                                            text: data.status,
                                            confirmButtonColor: "#3cb878",
                                        });
                                    }
                                }

                            });
                            return false;
                        }
                    
                    </script>