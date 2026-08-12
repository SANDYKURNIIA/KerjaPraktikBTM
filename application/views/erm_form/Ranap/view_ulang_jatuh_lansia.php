<!-- view_ulang_jatuh_lansia.php -->

<style>
  .panel-body label,
  .panel-body p,
  .panel-body li {
    color: #000 !important;
  }

  /* Khusus baris abu-abu */
  /* Override text-muted / help */
  .text-muted,
  .help,
  .help-block,
  small {
    color: #000 !important;
    opacity: 1 !important;
  }

  .radio-item {
  display: flex;
  align-items: flex-start;
  gap: 6px;
  margin-bottom: 6px;
}

.radio-item input[type="radio"] {
  margin-top: 3px;
}

.radio-item label {
  line-height: 1.4;
  font-weight: normal;
}

</style>




<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">ASESMEN JATUH LANSIA</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">

        <div class="panel-body">
          <div class="form-wrap">

            <!-- IDENTITAS PASIEN -->
            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">No.RM</label>
                <input type="text" disabled class="form-control" value="<?php echo $no_rm ?>" id="inNoRM">
                <input type="hidden" class="form-control" value="<?php echo $id_pelayanan ?>" id="inPel">
                <input type="hidden" class="form-control" value="<?php echo $id_history ?>" id="inHis">
                <input type="hidden" class="form-control" id="id" name="id">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Nama</label>
                <input type="text" disabled class="form-control" value="<?php echo $nama ?>" id="inNama">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Tgl Lahir / Umur</label>
                <input type="text" disabled class="form-control" value="<?php echo $tgl_lahir ?>" id="inTglLahir">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                <input type="text" disabled class="form-control" value="<?php echo $jenis_kelamin ?>" id="inJK">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Ruang Rawat</label>
                <input type="text" disabled class="form-control" value="<?php echo $nama_ruangan ?>" id="inRuangan">
              </div>
            </div>

            <!-- PETUNJUK SKOR -->
            <div class="col-md-12" style="margin-top:20px;">
              <div class="panel panel-default card-view">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12">
                      <h5 style="margin-top: 30px;"><strong>
                          <label class="control-label mb-10 text-left"><b>FAKTOR RESIKO<b /><span class="help"></span></label>
                        </strong>
                      </h5>
                      <label class="control-label mb-10 text-left">
                        Ket : DESKRIPSI RESIKO(SKOR)
                      </label>
                    </div>
                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left"><b>Petunjuk Penilaian</b></label>
                      <p>- 0-7 : Risiko Rendah</p>
                      <p>- 8-13 : Risiko Sedang</p>
                      <p>- >14 : Risiko Tinggi</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- START FORMULIR SKOR (PERTANYAAN UTAMA) -->
            <div class="row">

              <!-- A. Usia -->
              <div class="col-md-4 form-section">
                <label class="control-label mb-10 text-left" style="font-weight: 600; margin-top: 10px;">a. Berapa Usia Pasien</label>
                <span id="usia_error" class="text-danger"></span>

                <div class="radio-button"><input id="usia1" type="radio" name="usia" value="2"> <label for="usia1">60–70 Tahun (2)</label></div>
                <div class="radio-button"><input id="usia2" type="radio" name="usia" value="1"> <label for="usia2">Lebih dari 70 Tahun (1)</label></div>
              </div>

              <!-- B. Defisit Sensoris -->
              <div class="col-md-4 form-section">
                <label class="control-label mb-10 text-left" style="font-weight: 600; margin-top: 10px;">b. Defisit Sensoris</label>
                <span id="sensoris_error" class="text-danger"></span>

                <div class="radio-button"><input id="sensoris1" type="radio" name="sensoris" value="0"><label for="sensoris1">Tidak menggunakan kaca mata (0)</label></div>
                <div class="radio-button"><input id="sensoris2" type="radio" name="sensoris" value="1"><label for="sensoris2">Kacamata bifokal / rabun dekat (1)</label></div>
                <div class="radio-button"><input id="sensoris3" type="radio" name="sensoris" value="1"><label for="sensoris3">Gangguan pendengaran (1)</label></div>
                <div class="radio-button"><input id="sensoris4" type="radio" name="sensoris" value="2"><label for="sensoris4">Kacamata multifokal (2)</label></div>
                <div class="radio-button"><input id="sensoris5" type="radio" name="sensoris" value="2"><label for="sensoris5">Katarak / Glaukoma (2)</label></div>
                <div class="radio-button"><input id="sensoris6" type="radio" name="sensoris" value="3"><label for="sensoris6">Hampir tidak melihat / buta (3)</label></div>
              </div>

              <!-- C. Aktivitas -->
              <div class="col-md-4 form-section">
                <label class="control-label mb-10 text-left" style="font-weight: 600; margin-top: 10px;">c. Aktivitas</label>
                <span id="aktivitas_error" class="text-danger"></span>

                <div class="radio-button"><input id="aktivitas1" type="radio" name="aktivitas" value="0"><label for="aktivitas1">Mandiri (0)</label></div>
                <div class="radio-button"><input id="aktivitas2" type="radio" name="aktivitas" value="1"><label for="aktivitas2">ADL dibantu sebagian (1)</label></div>
                <div class="radio-button"><input id="aktivitas3" type="radio" name="aktivitas" value="2"><label for="aktivitas3">ADL dibantu penuh (2)</label></div>
              </div>

            </div> <!-- End Row 1 -->


            <!-- ================== ROW 2 (D–F) ================== -->
            <div class="row">

              <!-- D. Riwayat Jatuh -->
              <div class="col-md-4 form-section">
                <label class="control-label mb-10 text-left" style="font-weight: 600; margin-top: 10px;">d. Riwayat Jatuh</label>
                <span id="riwayat_error" class="text-danger"></span>

                <div class="radio-button"><input id="riwayat1" type="radio" name="riwayat_jatuh" value="0"><label for="riwayat1">Tidak pernah (0)</label></div>
                <div class="radio-button"><input id="riwayat2" type="radio" name="riwayat_jatuh" value="1"><label for="riwayat2">Jatuh lebih dari satu tahun (1)</label></div>
                <div class="radio-button"><input id="riwayat3" type="radio" name="riwayat_jatuh" value="2"><label for="riwayat3">Jatuh kurang dari 1 bulan (2)</label></div>
                <div class="radio-button"><input id="riwayat4" type="radio" name="riwayat_jatuh" value="3"><label for="riwayat4">Jatuh saat dirawat sekarang (3)</label></div>
              </div>

              <!-- E. Kognisi -->
              <div class="col-md-4 form-section">
                <label class="control-label mb-10 text-left" style="font-weight: 600; margin-top: 10px;">e. Kognisi</label>
                <span id="kognisi_error" class="text-danger"></span>

                <div class="radio-button"><input id="kognisi1" type="radio" name="kognisi" value="0"><label for="kognisi1">Orientasi baik (0)</label></div>
                <div class="radio-button"><input id="kognisi2" type="radio" name="kognisi" value="1"><label for="kognisi2">Kesulitan mengerti perintah (1)</label></div>
                <div class="radio-button"><input id="kognisi3" type="radio" name="kognisi" value="2"><label for="kognisi3">Gangguan memori (2)</label></div>
                <div class="radio-button"><input id="kognisi4" type="radio" name="kognisi" value="3"><label for="kognisi4">Kebingungan (3)</label></div>
                <div class="radio-button"><input id="kognisi5" type="radio" name="kognisi" value="3"><label for="kognisi5">Disorientasi (3)</label></div>
              </div>

              <!-- F. Pengobatan
              <div class="col-md-4 form-section">
                <label class="control-label mb-10 text-left" style="font-weight: 600; margin-top: 10px;">f. Pengobatan dan Penggunaan Alat</label>
                <span id="obat_error" class="text-danger"></span>

                <div class="radio-button"><input id="obat1" type="radio" name="pengobatan" value="1"><label for="obat1">&gt; 4 jenis pengobatan (1)</label></div>
                <div class="radio-button"><input id="obat2" type="radio" name="pengobatan" value="2"><label for="obat2">Antihipertensi/ hipoglikemik / antidepresan / pengencer darah (2)</label></div>
                <div class="radio-button"><input id="obat3" type="radio" name="pengobatan" value="2"><label for="obat3">Sedatif / Psikotropika / Narkotika (2)</label></div>
                <div class="radio-button"><input id="obat4" type="radio" name="pengobatan" value="2"><label for="obat4">Infus / Epidural / Spinal / Catheter / Traksi (2)</label></div>
              </div>

            </div>  -->
            <!-- End Row 2 -->

            <!-- F. Pengobatan -->
            <div class="col-md-4 form-section">
               <label class="control-label mb-10 text-left" style="font-weight: 600; margin-top: 10px;">
               f. Pengobatan dan Penggunaan Alat
                </label>
            <span id="obat_error" class="text-danger"></span>

            <div class="radio-item">
               <input id="obat1" type="radio" name="pengobatan" value="1">
               <label for="obat1">&gt; 4 jenis pengobatan (1)</label>
            </div>

            <div class="radio-item">
                <input id="obat2" type="radio" name="pengobatan" value="2">
               <label for="obat2">
               Antihipertensi / hipoglikemik / antidepresan / pengencer darah (2)
               </label>
           </div>

             <div class="radio-item">
                 <input id="obat3" type="radio" name="pengobatan" value="2">
                 <label for="obat3">Sedatif / Psikotropika / Narkotika (2)</label>
           </div>

            <div class="radio-item">
                 <input id="obat4" type="radio" name="pengobatan" value="2">
                <label for="obat4">
                Infus / Epidural / Spinal / Catheter / Traksi (2)
           </label>
           </div>
          </div>



            <!-- ================== ROW 3 (G–I) ================== -->
            <div class="row">

              <!-- G. Mobilitas -->
              <div class="col-md-4 form-section">
                <label class="control-label mb-10 text-left" style="font-weight: 600; margin-top: 10px;">g. Mobilitas</label>
                <span id="mobilitas_error" class="text-danger"></span>

                <div class="radio-button"><input id="mobilitas1" type="radio" name="mobilitas" value="0"><label for="mobilitas1">Mandiri (0)</label></div>
                <div class="radio-button"><input id="mobilitas2" type="radio" name="mobilitas" value="1"><label for="mobilitas2">Menggunakan alat bantu (1)</label></div>
                <div class="radio-button"><input id="mobilitas3" type="radio" name="mobilitas" value="2"><label for="mobilitas3">Koordinasi / keseimbangan buruk (2)</label></div>
                <div class="radio-button"><input id="mobilitas4" type="radio" name="mobilitas" value="3"><label for="mobilitas4">Dibantu sebagian (3)</label></div>
                <div class="radio-button"><input id="mobilitas5" type="radio" name="mobilitas" value="4"><label for="mobilitas5">Dibantu penuh / bed rest (4)</label></div>
              </div>

              <!-- H. Pola BAB/BAK -->
              <div class="col-md-4 form-section">
                <label class="control-label mb-10 text-left" style="font-weight: 600; margin-top: 10px;">H. Pola BAB/BAK</label>
                <span id="bab_error" class="text-danger"></span>

                <div class="radio-button"><input id="bab1" type="radio" name="bab" value="0"><label for="bab1">Teratur (0)</label></div>
                <div class="radio-button"><input id="bab2" type="radio" name="bab" value="1"><label for="bab2">Inkontinensi urine/feses (1)</label></div>
                <div class="radio-button"><input id="bab3" type="radio" name="bab" value="2"><label for="bab3">Nokturia (2)</label></div>
                <div class="radio-button"><input id="bab4" type="radio" name="bab" value="3"><label for="bab4">Urgensi/frekuensi (3)</label></div>
              </div>

              <!-- I. Komorbiditas -->
              <div class="col-md-4 form-section">
                <label class="control-label mb-10 text-left" style="font-weight: 600; margin-top: 10px;">i. Komorbiditas</label>
                <span id="komorbid_error" class="text-danger"></span>

                <div class="radio-button"><input id="komorbid1" type="radio" name="komorbid" value="2"><label for="komorbid1">Diabetes / Jantung / Stroke / ISK / CKD (2)</label></div>
                <div class="radio-button"><input id="komorbid2" type="radio" name="komorbid" value="3"><label for="komorbid2">Gangguan saraf pusat / Parkinson (3)</label></div>
                <div class="radio-button"><input id="komorbid3" type="radio" name="komorbid" value="3"><label for="komorbid3">Pasca Bedah 0–24 jam (3)</label></div>
              </div>

            </div> <!-- End Row 3 -->

            <!-- END FORMULIR SKOR (PERTANYAAN UTAMA) -->

            <!-- Start Aksi Button -->
            <div class="col-md-6">
              <button type="submit" class="btn btn-success mb-4" onclick="sumScore()">Skor Risiko</button>
              <div class="col-md-3">
                <input type="text" class="form-control" disabled id="inTotal">
                <input type="hidden" id="tipeResikoHidden" name="tipe_resiko">
              </div>
            </div>
            <!-- End Aksi Button -->

            <script>
              document.addEventListener("DOMContentLoaded", function() {
                const observasiYes = document.getElementById("orientasi_ya");

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

            <!-- Start Intervensi -->

            <!-- Formulir resiko rendah -->
            <div id="formResikoRendah" class="risk-form" style="display:none;">
              <div class="col-md-12">
                <h5 style="margin-top: 30px;">
                  <strong>
                    <label class="control-label mb-10 text-left">
                      <b>FORMULIR INTERVENSI JATUH RESIKO RENDAH</b>
                      <span class="help"></span>
                    </label>
                  </strong>
                </h5>
              </div>

              <!-- 1 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">1. Orientasikan pasien pada lingkungan kamar/bangsal</label>
                  <span id="orientasi_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="orientasi_tidak" type="radio" name="orientasi" value="Tidak">
                    <label class="control-label" for="orientasi_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="orientasi_ya" type="radio" name="orientasi" value="Ya">
                    <label class="control-label" for="orientasi_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 2 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">2. Pastikan rem tempat tidur terkunci</label>
                  <span id="rem_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="rem_tidak" type="radio" name="rem_terkunci" value="Tidak">
                    <label class="control-label" for="rem_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="rem_ya" type="radio" name="rem_terkunci" value="Ya">
                    <label class="control-label" for="rem_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 3 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">3. Pastikan bel pasien terjangkau</label>
                  <span id="bel_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="bel_tidak" type="radio" name="bel_terjangkau" value="Tidak">
                    <label class="control-label" for="bel_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="bel_ya" type="radio" name="bel_terjangkau" value="Ya">
                    <label class="control-label" for="bel_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 4 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-5 mt-10 text-left">4. Singkirkan barang yang berbahaya</label>
                  <span id="barang_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="barang_tidak" type="radio" name="barang_berbahaya" value="Tidak">
                    <label class="control-label" for="barang_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="barang_ya" type="radio" name="barang_berbahaya" value="Ya">
                    <label class="control-label" for="barang_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 5 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-5 mt-10 text-left">5. Minta persetujuan pasien agar lampu malam tetap menyala</label>
                  <span id="lampu_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="lampu_tidak" type="radio" name="lampu_malam" value="Tidak">
                    <label class="control-label" for="lampu_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="lampu_ya" type="radio" name="lampu_malam" value="Ya">
                    <label class="control-label" for="lampu_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 6 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-5 mt-10 text-left">6. Pastikan alat bantu jalan dalam jangkauan</label>
                  <span id="alatbantu_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="alatbantu_tidak" type="radio" name="alat_bantu" value="Tidak">
                    <label class="control-label" for="alatbantu_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="alatbantu_ya" type="radio" name="alat_bantu" value="Ya">
                    <label class="control-label" for="alatbantu_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 7 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 mt-5 text-left">7. Pastikan alas kaki tidak licin</label>
                  <span id="alaskaki_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="alaskaki_ya" type="radio" name="alas_kaki" value="Ya">
                    <label class="control-label" for="alaskaki_ya">Ya</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="alaskaki_tidak" type="radio" name="alas_kaki" value="Tidak">
                    <label class="control-label" for="alaskaki_tidak">Tidak</label>
                  </div>
                </div>
              </div>

              <!-- 8 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-15 mt-10 text-left">8. Pastikan kebutuhan pribadi dalam jangkauan</label>
                  <span id="kebutuhan_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="kebutuhan_tidak" type="radio" name="kebutuhan_pribadi" value="Tidak">
                    <label class="control-label" for="kebutuhan_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="kebutuhan_ya" type="radio" name="kebutuhan_pribadi" value="Ya">
                    <label class="control-label" for="kebutuhan_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 9 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-15 mt-10 text-left">9. Tempatkan meja pasien dengan baik</label>
                  <span id="meja_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="meja_tidak" type="radio" name="meja_pasien" value="Tidak">
                    <label class="control-label" for="meja_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="meja_ya" type="radio" name="meja_pasien" value="Ya">
                    <label class="control-label" for="meja_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 10 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-15 mt-10 text-left">10. Tempatkan pasien sesuai tinggi badannya</label>
                  <span id="posisi_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="posisi_tidak" type="radio" name="posisi_pasien" value="Tidak">
                    <label class="control-label" for="posisi_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="posisi_ya" type="radio" name="posisi_pasien" value="Ya">
                    <label class="control-label" for="posisi_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 11 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-15 mt-10 text-left">11. Review obat-obatan yang berisiko jatuh</label>
                  <span id="obat_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="obat_tidak" type="radio" name="review_obat" value="Tidak">
                    <label class="control-label" for="obat_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="obat_ya" type="radio" name="review_obat" value="Ya">
                    <label class="control-label" for="obat_ya">Ya</label>
                  </div>
                </div>
              </div>
            </div>
            <!-- Ending formulir resiko rendah -->

            <!-- Formulir resiko sedang -->
            <div id="formResikoSedang" class="risk-form" style="display:none;">
              <div class="col-md-12">
                <h5 style="margin-top: 30px;">
                  <strong>
                    <label class="control-label mb-10 text-left">
                      <b>FORMULIR INTERVENSI JATUH RISIKO SEDANG</b>
                    </label>
                  </strong>
                </h5>
              </div>

              <!-- 1 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    1. Pasang gelang kuning di pergelangan tangan pasien
                  </label>
                  <span id="gelang_kuning_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="gelang_kuning_tidak" type="radio" name="gelang_kuning" value="Tidak">
                    <label for="gelang_kuning_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="gelang_kuning_ya" type="radio" name="gelang_kuning" value="Ya">
                    <label for="gelang_kuning_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 2 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    2. Menjelaskan kepada pasien dan keluarga mengenai risiko jatuh dan tindakan pencegahannya
                  </label>
                  <span id="edukasi_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="edukasi_tidak" type="radio" name="edukasi_risiko" value="Tidak">
                    <label for="edukasi_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="edukasi_ya" type="radio" name="edukasi_risiko" value="Ya">
                    <label for="edukasi_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 3 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    3. Minta pasien/keluarga segera menekan bel jika membutuhkan bantuan
                  </label>
                  <span id="bel_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="bel_tidak" type="radio" name="instruksi_bel" value="Tidak">
                    <label for="bel_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="bel_ya" type="radio" name="instruksi_bel" value="Ya">
                    <label for="bel_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 4 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    4. Pasang pagar pengaman tempat tidur dan pastikan rem terkunci
                  </label>
                  <span id="pagar_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="pagar_tidak" type="radio" name="pagar_tempat_tidur" value="Tidak">
                    <label for="pagar_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="pagar_ya" type="radio" name="pagar_tempat_tidur" value="Ya">
                    <label for="pagar_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 5 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    5. Informasikan pasien agar mobilisasi secara bertahap (duduk perlahan sebelum berdiri)
                  </label>
                  <span id="mobilisasi_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="mobilisasi_tidak" type="radio" name="mobilisasi_bertahap" value="Tidak">
                    <label for="mobilisasi_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="mobilisasi_ya" type="radio" name="mobilisasi_bertahap" value="Ya">
                    <label for="mobilisasi_ya">Ya</label>
                  </div>
                </div>
              </div>

            </div>
            <!-- Ending formulir resiko tinggi -->

            <!-- Formulir resiko tinggi -->
            <div id="formResikoTinggi" class="risk-form" style="display:none;">
              <div class="col-md-12">
                <h5 style="margin-top: 30px;">
                  <strong>
                    <label class="control-label mb-10 text-left">
                      <b>FORMULIR INTERVENSI JATUH RISIKO TINGGI</b>
                    </label>
                  </strong>
                </h5>
              </div>

              <!-- 1 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">1. Kaji kebutuhan pasien</label>
                  <span id="kaji_kebutuhan_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="kaji_kebutuhan_tidak" type="radio" name="kaji_kebutuhan" value="Tidak">
                    <label for="kaji_kebutuhan_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="kaji_kebutuhan_ya" type="radio" name="kaji_kebutuhan" value="Ya">
                    <label for="kaji_kebutuhan_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 2 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    2. Bila memungkinkan, pindahkan pasien dekat nurse station
                  </label>
                  <span id="pindah_nurse_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="pindah_nurse_tidak" type="radio" name="pindah_dekat_nurse" value="Tidak">
                    <label for="pindah_nurse_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="pindah_nurse_ya" type="radio" name="pindah_dekat_nurse" value="Ya">
                    <label for="pindah_nurse_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 3 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    3. Pasang pagar pengaman tempat tidur dan pastikan rem terkunci
                  </label>
                  <span id="pagar_tinggi_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="pagar_tinggi_tidak" type="radio" name="pagar_pelindung" value="Tidak">
                    <label for="pagar_tinggi_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="pagar_tinggi_ya" type="radio" name="pagar_pelindung" value="Ya">
                    <label for="pagar_tinggi_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 4 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    4. Orientasikan ulang tentang risiko jatuh
                  </label>
                  <span id="orientasi_ulangan_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="orientasi_ulangan_tidak" type="radio" name="orientasi_risiko" value="Tidak">
                    <label for="orientasi_ulangan_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="orientasi_ulangan_ya" type="radio" name="orientasi_risiko" value="Ya">
                    <label for="orientasi_ulangan_ya">Ya</label>
                  </div>
                </div>
              </div>

              <!-- 5 -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    5. Berikan tanda gelang kuning dan kalung risiko jatuh tinggi yang digantungkan pada bed pasien
                  </label>
                  <span id="tanda_kuning_error" class="text-danger"></span>

                  <div class="radio-button radio-button-primary">
                    <input id="tanda_kuning_tidak" type="radio" name="tanda_kuning_tinggi" value="Tidak">
                    <label for="tanda_kuning_tidak">Tidak</label>
                  </div>

                  <div class="radio-button radio-button-primary">
                    <input id="tanda_kuning_ya" type="radio" name="tanda_kuning_tinggi" value="Ya">
                    <label for="tanda_kuning_ya">Ya</label>
                  </div>
                </div>
              </div>
            </div>
            <!-- Ending formulir resiko tinggi -->

            <!-- End Intervensi -->

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
                          <table class="table table-hover display pb-60" id="jatuh_ulang_lansia">
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
      </div>
    </div>
  </div>

  <!-- SCRIPTS -->
  <script src="<?php echo base_url(); ?>assets/dist/js/slider.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/range-slide.css">

  <script type="text/javascript">
    // Jalankan ketika document siap
    $(document).ready(function() {
      id_pelayanan = $('#inPel').val();
      reload_data_id_pel(id_pelayanan);
      id_history = $('#inHis').val();



      // Ambil data asesmen & resiko via AJAX (controller lansia)
      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_lansia/get_ass_per",
        method: "POST",
        dataType: 'json',
        data: {
          id: id_history
        },
        success: function(data) {
          if (data.asesmen) {
            $('#id').val(data.asesmen.id_asesmen);
            $('#inDiagnosa').val(data.asesmen.diagnosa);
            $('#inTotal').val(data.asesmen.skor_total);

            $('input[name="jatuh"][value="' + data.asesmen.riwayat_jatuh + '"]').prop("checked", true);
            $('input[name="sekunder"][value="' + data.asesmen.diagnosa_sekunder + '"]').prop("checked", true);
            $('input[name="bantu"][value="' + data.asesmen.alat_bantu + '"]').prop("checked", true);
            $('input[name="infus"][value="' + data.asesmen.infus + '"]').prop("checked", true);
            $('input[name="berjalan"][value="' + data.asesmen.gaya_jalan + '"]').prop("checked", true);
            $('input[name="mental"][value="' + data.asesmen.status_mental + '"]').prop("checked", true);
          }
          if (data.resiko) {
            //  sesuikan untuk name dari tag htlm intervensi
            $('input[name="orientasi_pasien"][value="' + data.resiko.orientasi_pasien + '"]').prop("checked", true);
            $('input[name="rem"][value="' + data.resiko.rem + '"]').prop("checked", true);
            $('input[name="bel"][value="' + data.resiko.bel + '"]').prop("checked", true);
            $('input[name="barang_berbahaya"][value="' + data.resiko.barang_berbahaya + '"]').prop("checked", true);
            $('input[name="lampu_malam"][value="' + data.resiko.lampu_malam + '"]').prop("checked", true);
            $('input[name="alat_bantu"][value="' + data.resiko.alat_bantu + '"]').prop("checked", true);
            $('input[name="alas_kaki"][value="' + data.resiko.alas_kaki + '"]').prop("checked", true);
            $('input[name="kebutuhan_pribadi"][value="' + data.resiko.kebutuhan_pribadi + '"]').prop("checked", true);
            $('input[name="meja_pasien"][value="' + data.resiko.meja_pasien + '"]').prop("checked", true);
            $('input[name="tempatkan_pasien"][value="' + data.resiko.tempatkan_pasien + '"]').prop("checked", true);
            $('input[name="review_obat"][value="' + data.resiko.review_obat + '"]').prop("checked", true);
            $('input[name="gelang"][value="' + data.resiko.gelang + '"]').prop("checked", true);
            $('input[name="risiko_jatuh"][value="' + data.resiko.risiko_jatuh + '"]').prop("checked", true);
            $('input[name="perlu_bantuan"][value="' + data.resiko.perlu_bantuan + '"]').prop("checked", true);
            $('input[name="pasang_pagar"][value="' + data.resiko.pasang_pagar + '"]').prop("checked", true);
            $('input[name="mobilisasi"][value="' + data.resiko.mobilisasi + '"]').prop("checked", true);
            $('input[name="kaji_kebutuhan"][value="' + data.resiko.kaji_kebutuhan + '"]').prop("checked", true);
            $('input[name="pindahkan_pasien"][value="' + data.resiko.pindahkan_pasien + '"]').prop("checked", true);
            $('input[name="pagar_pengaman"][value="' + data.resiko.pagar_pengaman + '"]').prop("checked", true);
            $('input[name="orientasi_ulang"][value="' + data.resiko.orientasi_ulang + '"]').prop("checked", true);
            $('input[name="tanda_gelang_kuning"][value="' + data.resiko.tanda_gelang_kuning + '"]').prop("checked", true);
          }

          // Tampilkan form sesuai tipe_resiko
          var tipe_resiko = data.asesmen ? data.asesmen.tipe_resiko : '';
          $('#tipeResikoHidden').val(tipe_resiko);
          let formToShow = [];
          if (tipe_resiko === 'Rendah') {
            formToShow.push('formResikoRendah');
          } else if (tipe_resiko === 'Sedang') {
            formToShow.push('formResikoRendah', 'formResikoSedang');
          } else if (tipe_resiko === 'Tinggi') {
            formToShow.push('formResikoRendah', 'formResikoSedang', 'formResikoTinggi');
          }
          $('.risk-form').hide();
          formToShow.forEach(function(form) {
            $('#' + form).show();
          });
        }
      });
    });

    // Reload DataTable with data per id_pelayanan (controller lansia)
    function reload_data_id_pel(id_pelayanan) {
      $('#jatuh_ulang_lansia').dataTable().fnClearTable();
      $('#jatuh_ulang_lansia').dataTable().fnDestroy();
      $('#jatuh_ulang_lansia').DataTable({
        "language": {
          "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
          "sProcessing": "Sedang memproses.",
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
          "url": '<?php echo base_url('Erm_ranap_ulang_jatuh_lansia/tampil_list_per_pen_rujukan'); ?>',
          "type": 'POST',
          "data": {
            id_pelayanan: id_pelayanan
          }
        },
        "deferRender": true,
        "processing": true,
        "order": [],
        "columnDefs": [{
          "targets": [0],
          "orderable": false
        }]
      });
    }

    // Proses penghitungan skor
    function sumScore() {
      var score = 0,
        score1 = 0,
        score2 = 0,
        score3 = 0,
        score4 = 0,
        score5 = 0,
        score6 = 0,
        score7 = 0,
        score8 = 0;

      if ($('#usia1').is(":checked")) {
        score = 2;
      } else if ($('#usia2').is(":checked")) {
        score = 1;
      }

      if ($('#sensoris1').is(":checked")) {
        score1 = 0;
      } else if ($('#sensoris2').is(":checked")) {
        score1 = 1;
      } else if ($('#sensoris3').is(":checked")) {
        score1 = 1;
      } else if ($('#sensoris4').is(":checked")) {
        score1 = 2;
      } else if ($('#sensoris5').is(":checked")) {
        score1 = 2;
      } else if ($('#sensoris6').is(":checked")) {
        score1 = 3;
      }


      if ($('#aktivitas1').is(":checked")) {
        score2 = 0;
      } else if ($('#aktivitas2').is(":checked")) {
        score2 = 1;
      } else if ($('#aktivitas3').is(":checked")) {
        score2 = 2;
      }


      if ($('#riwayat1').is(":checked")) {
        score3 = 0;
      } else if ($('#riwayat2').is(":checked")) {
        score3 = 1;
      } else if ($('#riwayat3').is(":checked")) {
        score3 = 2;
      } else if ($('#riwayat4').is(":checked")) {
        score3 = 3;
      }


      if ($('#kognisi1').is(":checked")) {
        score4 = 0;
      } else if ($('#kognisi2').is(":checked")) {
        score4 = 1;
      } else if ($('#kognisi3').is(":checked")) {
        score4 = 2;
      } else if ($('#kognisi4').is(":checked")) {
        score4 = 3;
      } else if ($('#kognisi5').is(":checked")) {
        score4 = 3;
      }

      if ($('#obat1').is(":checked")) {
        score5 = 1;
      } else if ($('#obat2').is(":checked")) {
        score5 = 2;
      } else if ($('#obat3').is(":checked")) {
        score5 = 2;
      } else if ($('#obat4').is(":checked")) {
        score5 = 2;
      }


      if ($('#mobilitas1').is(":checked")) {
        score6 = 0;
      } else if ($('#mobilitas2').is(":checked")) {
        score6 = 1;
      } else if ($('#mobilitas3').is(":checked")) {
        score6 = 2;
      } else if ($('#mobilitas4').is(":checked")) {
        score6 = 3;
      } else if ($('#mobilitas5').is(":checked")) {
        score6 = 4;
      }

      if ($('#bab1').is(":checked")) {
        score7 = 0;
      } else if ($('#bab2').is(":checked")) {
        score7 = 1;
      } else if ($('#bab3').is(":checked")) {
        score7 = 2;
      } else if ($('#bab4').is(":checked")) {
        score7 = 3;
      }

      if ($('#komorbid1').is(":checked")) {
        score8 = 2;
      } else if ($('#komorbid2').is(":checked")) {
        score8 = 3;
      } else if ($('#komorbid3').is(":checked")) {
        score8 = 3;
      }

      // Total skor
      var sum = score + score1 + score2 + score3 + score4 + score5 + score6 + score7 + score8;
      $('#inTotal').val(sum);


      var tipe_resiko = '';
      if (sum >= 0 && sum <= 7) {
        tipe_resiko = 'Rendah';
      } else if (sum >= 8 && sum <= 13) {
        tipe_resiko = 'Sedang';
      } else {
        tipe_resiko = 'Tinggi';

      }
      $('#tipeResikoHidden').val(tipe_resiko);

      // Tampilkan form sesuai hasil hitung
      let formToShow = [];
      if (sum >= 0 && sum <= 7) {
        formToShow.push('formResikoRendah');
      } else if (sum >= 8 && sum <= 13) {
        formToShow.push('formResikoRendah', 'formResikoSedang');
      } else {
        formToShow.push('formResikoRendah', 'formResikoSedang', 'formResikoTinggi');
      }
      $('.risk-form').hide();
      formToShow.forEach(function(form) {
        $('#' + form).show();
      });
    }

    // Simpan data (asesmen & resiko) via AJAX ke controller lansia
    function simpan() {

      // Atribut wajib
      console.log('Function ini dijalanka');
      var id = $('#id').val();
      var id_pelayanan = $('#inPel').val();
      var id_history = $('#inHis').val();
      var no_rm = $('#inNoRM').val();

      // Inputan asesmen
      var usia = $('input[name="usia"]:checked').val();
      var sensoris = $('input[name="sensoris"]:checked').val();
      var aktivitas = $('input[name="aktivitas"]:checked').val();
      var riwayat_jatuh = $('input[name="riwayat_jatuh"]:checked').val();
      var kognisi = $('input[name="kognisi"]:checked').val();
      var pengobatan = $('input[name="pengobatan"]:checked').val();
      var mobilitas = $('input[name="mobilitas"]:checked').val();
      var bab = $('input[name="bab"]:checked').val();
      var komorbid = $('input[name="komorbid"]:checked').val();

      // Hasil
      var skor_total = $('#inTotal').val();
      var staff = $('#inStaff').val();
      var tipe_resiko = $('#tipeResikoHidden').val();

      // Inputan untuk resiko
      var orientasi_pasien = $('input[name="orientasi"]:checked').val();
      var rem = $('input[name="rem_terkunci"]:checked').val();
      var bel = $('input[name="bel_terjangkau"]:checked').val();
      var barang_berbahaya = $('input[name="barang_berbahaya"]:checked').val();
      var lampu_malam = $('input[name="lampu_malam"]:checked').val();
      var alat_bantu = $('input[name="alat_bantu"]:checked').val();
      var alas_kaki = $('input[name="alas_kaki"]:checked').val();
      var kebutuhan_pribadi = $('input[name="kebutuhan_pribadi"]:checked').val();
      var meja_pasien = $('input[name="meja_pasien"]:checked').val();
      var tempatkan_pasien = $('input[name="posisi_pasien"]:checked').val();
      var review_obat = $('input[name="review_obat"]:checked').val();

      var gelang = $('input[name="gelang_kuning"]:checked').val();
      var risiko_jatuh = $('input[name="edukasi_risiko"]:checked').val();
      var perlu_bantuan = $('input[name="instruksi_bel"]:checked').val();
      var pasang_pagar = $('input[name="pagar_tempat_tidur"]:checked').val();
      var mobilisasi = $('input[name="mobilisasi_bertahap"]:checked').val();

      var kaji_kebutuhan = $('input[name="kaji_kebutuhan"]:checked').val();
      var pindahkan_pasien = $('input[name="pindah_dekat_nurse"]:checked').val();
      var pagar_pengaman = $('input[name="pagar_pelindung"]:checked').val();
      var orientasi_ulang = $('input[name="orientasi_risiko"]:checked').val();
      var tanda_gelang_kuning = $('input[name="tanda_kuning_tinggi"]:checked').val();



      var dataString = 'usia=' + usia + '&no_rm=' + no_rm + '&sensoris=' + sensoris + '&aktivitas=' + aktivitas +
        '&riwayat_jatuh=' + riwayat_jatuh + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
        '&kognisi=' + kognisi + '&pengobatan=' + pengobatan + '&mobilitas=' + mobilitas +
        '&bab=' + bab + '&komorbid=' + komorbid + '&skor_total=' + skor_total + '&tipe_resiko=' + tipe_resiko +

        '&orientasi_pasien=' + orientasi_pasien + '&rem=' + rem + '&bel=' + bel + '&barang_berbahaya=' + barang_berbahaya +
        '&lampu_malam=' + lampu_malam + '&alat_bantu=' + alat_bantu + '&alas_kaki=' + alas_kaki +

        '&kebutuhan_pribadi=' + kebutuhan_pribadi + '&meja_pasien=' + meja_pasien +
        '&tempatkan_pasien=' + tempatkan_pasien + '&review_obat=' + review_obat +
        '&gelang=' + gelang + '&risiko_jatuh=' + risiko_jatuh +

        '&perlu_bantuan=' + perlu_bantuan + '&pasang_pagar=' + pasang_pagar +
        '&mobilisasi=' + mobilisasi + '&kaji_kebutuhan=' + kaji_kebutuhan +
        '&pindahkan_pasien=' + pindahkan_pasien + '&pagar_pengaman=' + pagar_pengaman +
        '&orientasi_ulang=' + orientasi_ulang + '&tanda_gelang_kuning=' + tanda_gelang_kuning;


      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_lansia/insert_asesmen",
        method: "POST",
        dataType: 'json',
        data: dataString,
        success: function(data) {
          if (data.status == "success") {
            // redirect ke form utama setelah sukses
            window.location.href = "<?php echo base_url('Erm_ranap_ulang_jatuh_lansia/formulangjatuhlansia/') ?>" + id_pelayanan + '/' + id_history;
          } else if (data.error) {
            // error handling validasi
            if (!usia) {
              $('#usia_error').html("*wajib diisi");
            }
            if (!sensoris) {
              $('#sensoris_error').html("*wajib diisi");
            }
            if (!aktivitas) {
              $('#aktivitas_error').html("*wajib diisi");
            }
            if (!riwayat_jatuh) {
              $('#riwayat_error').html("*wajib diisi");
            }
            if (!kognisi) {
              $('#kognisi_error').html("*wajib diisi");
            }
            if (!pengobatan) {
              $('#obat_error').html("*wajib diisi");
            }
            if (!mobilitas) {
              $('#mobilitas_error').html("*wajib diisi");
            }
            if (!bab) {
              $('#bab_error').html("*wajib diisi");
            }
            if (!komorbid) {
              $('#komorbid_error').html("*wajib diisi");
            }
            if (!skor_total) {
              $('#inTotal').html("*Klik Untuk Memproses Skor");
            }
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

    // Fungsi cetak (pindah ke print_ulang_lansia)
    function cetak() {
      id = $('#id').val();
      window.location.href = "<?php echo base_url('Erm_ranap/print_ulang_lansia/') ?>" + id;
    }

    function pilih(id) {
      $('#id').val(id);
      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_lansia/get_ass_per",
        method: "POST",
        dataType: 'json',
        data: {
          id: id
        },
        success: function(data) {
          if (data.status_dt == "found") {
            // $('#inPel').val(data.id_asesmen);
            // Asesmen utama
            $('input[name="usia"][value="' + data.usia + '"]').prop('checked', true);
            $('input[name="sensoris"][value="' + data.defisit_sensoris + '"]').prop('checked', true);
            $('input[name="aktivitas"][value="' + data.aktivitas + '"]').prop('checked', true);
            $('input[name="riwayat_jatuh"][value="' + data.riwayat_jatuh + '"]').prop('checked', true);
            $('input[name="kognisi"][value="' + data.kognisi + '"]').prop('checked', true);
            $('input[name="pengobatan"][value="' + data.pengobatan_penggunaan + '"]').prop('checked', true);
            $('input[name="mobilitas"][value="' + data.mobilitas + '"]').prop('checked', true);
            $('input[name="bab"][value="' + data.pola_bab + '"]').prop('checked', true);
            $('input[name="komorbid"][value="' + data.komorbiditas + '"]').prop('checked', true);

            // Hasil
            $('#inTotal').val(data.skor_resiko);
            $('#tipeResikoHidden').val(data.tipe_resiko);

            // Form Resiko
            $('input[name="orientasi"][value="' + data.orientasi_pasien + '"]').prop('checked', true);
            $('input[name="rem_terkunci"][value="' + data.rem + '"]').prop('checked', true);
            $('input[name="bel_terjangkau"][value="' + data.bel + '"]').prop('checked', true);
            $('input[name="barang_berbahaya"][value="' + data.barang_berbahaya + '"]').prop('checked', true);
            $('input[name="lampu_malam"][value="' + data.lampu_malam + '"]').prop('checked', true);
            $('input[name="alat_bantu"][value="' + data.alat_bantu + '"]').prop('checked', true);
            $('input[name="alas_kaki"][value="' + data.alas_kaki + '"]').prop('checked', true);
            $('input[name="kebutuhan_pribadi"][value="' + data.kebutuhan_pribadi + '"]').prop('checked', true);
            $('input[name="meja_pasien"][value="' + data.meja_pasien + '"]').prop('checked', true);
            $('input[name="posisi_pasien"][value="' + data.tempatkan_pasien + '"]').prop('checked', true);
            $('input[name="review_obat"][value="' + data.review_obat + '"]').prop('checked', true);

            $('input[name="gelang_kuning"][value="' + data.gelang + '"]').prop('checked', true);
            $('input[name="edukasi_risiko"][value="' + data.risiko_jatuh + '"]').prop('checked', true);
            $('input[name="instruksi_bel"][value="' + data.perlu_bantuan + '"]').prop('checked', true);
            $('input[name="pagar_tempat_tidur"][value="' + data.pasang_pagar + '"]').prop('checked', true);
            $('input[name="mobilisasi_bertahap"][value="' + data.mobilisasi + '"]').prop('checked', true);

            $('input[name="kaji_kebutuhan"][value="' + data.kaji_kebutuhan + '"]').prop('checked', true);
            $('input[name="pindah_dekat_nurse"][value="' + data.pindahkan_pasien + '"]').prop('checked', true);
            $('input[name="pagar_pelindung"][value="' + data.pagar_pengaman + '"]').prop('checked', true);
            $('input[name="orientasi_risiko"][value="' + data.orientasi_ulang + '"]').prop('checked', true);
            $('input[name="tanda_kuning_tinggi"][value="' + data.tanda_gelang_kuning + '"]').prop('checked', true);

            $('#inTotal').val(data.skor_total);
            $('#inDiagnosa').val(data.diagnosa);

            $('#edit').show();
            $('#cetak').show();
            $('#simpan').hide();
            // smooth scroll
            window.scrollTo({
              top: 0,
              behavior: 'smooth'
            });

            sumScore();
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

    function edit() {
      var id = $('#id').val();

      //Data wajib (Argument)
      var id_pelayanan = $('#inPel').val();
      var id_history = $('#inHis').val();
      var no_rm = $('#inNoRM').val();

      // Inputan asesmen
      var usia = $('input[name="usia"]:checked').val();
      var sensoris = $('input[name="sensoris"]:checked').val();
      var aktivitas = $('input[name="aktivitas"]:checked').val();
      var riwayat_jatuh = $('input[name="riwayat_jatuh"]:checked').val();
      var kognisi = $('input[name="kognisi"]:checked').val();
      var pengobatan = $('input[name="pengobatan"]:checked').val();
      var mobilitas = $('input[name="mobilitas"]:checked').val();
      var bab = $('input[name="bab"]:checked').val();
      var komorbid = $('input[name="komorbid"]:checked').val();

      // Hasil
      var skor_total = $('#inTotal').val();
      var staff = $('#inStaff').val();
      var tipe_resiko = $('#tipeResikoHidden').val();

      // Inputan untuk resiko
      var orientasi_pasien = $('input[name="orientasi"]:checked').val();
      var rem = $('input[name="rem_terkunci"]:checked').val();
      var bel = $('input[name="bel_terjangkau"]:checked').val();
      var barang_berbahaya = $('input[name="barang_berbahaya"]:checked').val();
      var lampu_malam = $('input[name="lampu_malam"]:checked').val();
      var alat_bantu = $('input[name="alat_bantu"]:checked').val();
      var alas_kaki = $('input[name="alas_kaki"]:checked').val();
      var kebutuhan_pribadi = $('input[name="kebutuhan_pribadi"]:checked').val();
      var meja_pasien = $('input[name="meja_pasien"]:checked').val();
      var tempatkan_pasien = $('input[name="posisi_pasien"]:checked').val();
      var review_obat = $('input[name="review_obat"]:checked').val();

      var gelang = $('input[name="gelang_kuning"]:checked').val();
      var risiko_jatuh = $('input[name="edukasi_risiko"]:checked').val();
      var perlu_bantuan = $('input[name="instruksi_bel"]:checked').val();
      var pasang_pagar = $('input[name="pagar_tempat_tidur"]:checked').val();
      var mobilisasi = $('input[name="mobilisasi_bertahap"]:checked').val();

      var kaji_kebutuhan = $('input[name="kaji_kebutuhan"]:checked').val();
      var pindahkan_pasien = $('input[name="pindah_dekat_nurse"]:checked').val();
      var pagar_pengaman = $('input[name="pagar_pelindung"]:checked').val();
      var orientasi_ulang = $('input[name="orientasi_risiko"]:checked').val();
      var tanda_gelang_kuning = $('input[name="tanda_kuning_tinggi"]:checked').val();


      // Buat data string untuk dikirim
      var dataString =
        'id=' + id +
        '&usia=' + usia +
        '&no_rm=' + no_rm +
        '&sensoris=' + sensoris +
        '&aktivitas=' + aktivitas +
        '&riwayat_jatuh=' + riwayat_jatuh +
        '&id_pelayanan=' + id_pelayanan +
        '&id_history=' + id_history +
        '&kognisi=' + kognisi +
        '&pengobatan=' + pengobatan +
        '&mobilitas=' + mobilitas +
        '&bab=' + bab +
        '&komorbid=' + komorbid +
        '&skor_total=' + skor_total +
        '&tipe_resiko=' + tipe_resiko +

        '&orientasi_pasien=' + orientasi_pasien +
        '&rem=' + rem +
        '&bel=' + bel +
        '&barang_berbahaya=' + barang_berbahaya +
        '&lampu_malam=' + lampu_malam +
        '&alat_bantu=' + alat_bantu +
        '&alas_kaki=' + alas_kaki +
        '&kebutuhan_pribadi=' + kebutuhan_pribadi +
        '&meja_pasien=' + meja_pasien +
        '&tempatkan_pasien=' + tempatkan_pasien +
        '&review_obat=' + review_obat +
        '&gelang=' + gelang +
        '&risiko_jatuh=' + risiko_jatuh +
        '&perlu_bantuan=' + perlu_bantuan +
        '&pasang_pagar=' + pasang_pagar +
        '&mobilisasi=' + mobilisasi +
        '&kaji_kebutuhan=' + kaji_kebutuhan +
        '&pindahkan_pasien=' + pindahkan_pasien +
        '&pagar_pengaman=' + pagar_pengaman +
        '&orientasi_ulang=' + orientasi_ulang +
        '&tanda_gelang_kuning=' + tanda_gelang_kuning;


      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_lansia/update_asesmen",
        method: "POST",
        dataType: 'json',
        data: dataString,
        success: function(data) {
          if (data.status == "success") {
            window.location.href = "<?php echo base_url('Erm_ranap_ulang_jatuh_lansia/formulangjatuhlansia/') ?>" + id_pelayanan + '/' + id_history;
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