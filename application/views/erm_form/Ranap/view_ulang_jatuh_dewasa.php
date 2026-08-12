<<<<<<< HEAD
<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">ASESMEN AWAL JATUH DEWASA</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">

        <div class="panel-body">
          <div class="form-wrap">




            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                <!-- <input type="text" disabled class="form-control"id="inNoRM"> -->
                <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                <input type="hidden" class="form-control" id="id">
               
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                <!-- <input type="text" disabled class="form-control" id="inNama"> -->
                <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama">
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
                                                                        echo $date  . '(' . getAge($tgl_lahir) . ')' ?>">
                <span class="help-block"></span>
              </div>
            </div>


            <div class="form-group ">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                <!-- <input type="text" disabled class="form-control" id="inJk"> -->
                <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk">
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-3 text-left">
                <label class="control-label mb-10 ">Ruang Rawat<span class="help"></span></label>
                <input type="text" disabled class="form-control" value="<?= $nama_ruangan ?>" id="inRawat" disabled>
              </div>
            </div>




            <!--
                              --bagian ASESMEN AWAL KEPERAWATAN/KEBIDANAN
                            -->
            <div class="form-group" id="spirit">
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
                <label class="control-label mb-10 text-left">
                  Total Skor :
                </label>
              </div>
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">
                  - 0-24 : Risiko Rendah
                </label>
              </div>
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">
                  - 25-44 : Risiko Sedang
                </label>
              </div>
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">
                  - >44 : Risiko Tinggi
                </label>
              </div>
              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    a. Riwayat Jatuh Pasien
                  </label>
                  <span id="jatuh_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="jatuh0" type="radio" name="jatuh" value="Tidak" data-exclude="true">
                    <label class="control-label" for="jatuh1">
                      Tidak(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="jatuh25" type="radio" name="jatuh" value="Ya" data-exclude="true">
                    <label class="control-label" for="jatuh2">
                      Ya(25)
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    b. Diagnosa Sekunder
                  </label>
                  <span id="sekunder_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="sekunder0" type="radio" name="sekunder" value="Tidak" data-exclude="true">
                    <label class="control-label" for="sekunder1">
                      Tidak(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="sekunder15" type="radio" name="sekunder" value="Ya" data-exclude="true">
                    <label class="control-label" for="sekunder2">
                      Ya(15)
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    c. Menggunakan Alat Bantu
                  </label>
                  <span id="bantu_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="bantu0" type="radio" name="bantu" value="Tidak Ada" data-exclude="true">
                    <label class="control-label" for="bantu1">
                      Tidak Ada/Bedrest/Dibantu Perawat(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="bantu15" type="radio" name="bantu" value="Tongkat" data-exclude="true">
                    <label class="control-label" for="bantu2">
                      Kruk/Tongkat(15)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="bantu30" type="radio" name="bantu" value="Kursi" data-exclude="true">
                    <label class="control-label" for="bantu3">
                      Kursi/Perabot(30)
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    d. Menggunakan Infus/Heparin/Pengencer Dara
                  </label>
                  <span id="infus_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="infus0" type="radio" name="infus" value="Tidak" data-exclude="true">
                    <label class="control-label" for="infus1">
                      Tidak(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="infus20" type="radio" name="infus" value="Ya" data-exclude="true">
                    <label class="control-label" for="infus2">
                      Ya(20)
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    e. Gaya Berjalan
                  </label>
                  <span id="berjalan_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="berjalan0" type="radio" name="berjalan" value="Normal" data-exclude="true">
                    <label class="control-label" for="berjalan1">
                      Normal/Bedrest/Kursi Roda(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="berjalan10" type="radio" name="berjalan" value="Lemah" data-exclude="true">
                    <label class="control-label" for="berjalan2">
                      Lemah(10)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="berjalan20" type="radio" name="berjalan" value="Terganggu" data-exclude="true">
                    <label class="control-label" for="berjalan3">
                      Terganggu(20)
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    f. Status Mental
                  </label>
                  <span id="mental_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="mental0" type="radio" name="mental" value="Menyadari" data-exclude="true">
                    <label class="control-label" for="mental1">
                      Menyadari Kemampuan(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="mental15" type="radio" name="mental" value="Pelupa" data-exclude="true">
                    <label class="control-label" for="mental2">
                      Lupa akan keterbatasan/Pelupa(15)
                    </label>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <button type="submit" class="btn btn-success mb-4" onclick="sumScore()">Skor Risiko</button>
              <div class="col-md-3">
                <input type="text" class="form-control" disabled id="inTotal">
                <input type="hidden" id="tipeResikoHidden" name="tipe_resiko">
              </div>
            </div>


            <script>
              document.addEventListener("DOMContentLoaded", function() {
                const observasiYes = document.getElementById("observasi1");


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


            <!-- Formulir resiko rendah -->
            <div id="formResikoRendah" class="risk-form" style="display:none;">
              <div class="col-md-12">
                <h5 style="margin-top: 30px;"><strong>
                    <label class="control-label mb-10 text-left"><b>FORMULIR INTERVENSI JATUH RESIKO RENDAH<b /><span class="help"></span></label>
                  </strong>
                </h5>
              </div>


              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">1. Tingkatan observasi bantuan yang sesuai saat ambulasi</label>
                  <span id="jatuh_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="observasi" type="radio" name="observasi" value="Tidak">
                    <label class="control-label" for="observasi">Tidak</label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="observasi1" type="radio" name="observasi" value="Ya">
                    <label class="control-label" for="observasi1">Ya</label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    2. Pagar pengaman tempat tidur dinaikkan
                  </label>
                  <span id="sekunder_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="pagar" type="radio" name="pagar" value="Tidak">
                    <label class="control-label" for="pagar">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="pagar1" type="radio" name="pagar" value="Ya">
                    <label class="control-label" for="pagar1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    3. Tempat tidur dalam posisi rendah terkunci
                  </label>
                  <span id="bantu_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="posisi" type="radio" name="posisi" value="Tidak">
                    <label class="control-label" for="posisi">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="posisi1" type="radio" name="posisi" value="Ya">
                    <label class="control-label" for="posisi1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-5 mt-10 text-left">
                    4. Edukasi perilaku yang lebih aman saat jatuh atau transfer
                  </label>
                  <span id="infus_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="edukasi" type="radio" name="edukasi" value="Tidak">
                    <label class="control-label" for="edukasi">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="edukasi1" type="radio" name="edukasi" value="Ya">
                    <label class="control-label" for="edukasi1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-5 mt-10 text-left">
                    5. Monitor kebutuhan pasien secara berkala (minimal tiap 2 jam)
                  </label>
                  <span id="berjalan_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="monitor" type="radio" name="monitor" value="Tidak">
                    <label class="control-label" for="monitor">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="monitor1" type="radio" name="monitor" value="Ya">
                    <label class="control-label" for="monitor1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-5  text-left">
                    6. Anjurkan pasien tidak menggunakan kaus kaki atau sepatu yang licin
                  </label>
                  <span id="mental_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="kaoskaki" type="radio" name="kaoskaki" value="Tidak">
                    <label class="control-label" for="kaos">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="kaoskaki1" type="radio" name="kaoskaki" value="Ya">
                    <label class="control-label" for="kaoskaki1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 mt-5 text-left">
                    7. Orientasikan pasien terhadap lingkungan dan rutinitas Rumah Sakit</label>
                  <div class="row ms-4">
                    <div class="col-md-6">
                      <label class="control-label mb-5">a. Tunjukkan Lokasi Kamar Mandi</label>
                      <div class="radio-button radio-button-primary">
                        <input id="lokasi_kamar_mandi_iya" type="radio" name="lokasi_kamar_mandi" value="Ya">
                        <label class="control-label" for="lokasi_kamar_mandi_iya">Ya</label>
                      </div>
                      <div class="radio-button radio-button-primary">
                        <input id="lokasi_kamar_mandi_tidak" type="radio" name="lokasi_kamar_mandi" value="Tidak">
                        <label class="control-label" for="lokasi_kamar_mandi_tidak">Tidak</label>
                      </div>


                      <label class="control-label mb-5 mt-5">b. Jika pasien linglung orientasi dilaksanakan bertahap</label>
                      <div class="radio-button radio-button-primary">
                        <input id="orientasi_bertahap_iya" type="radio" name="orientasi_bertahap" value="Ya">
                        <label class="control-label" for="orientasi_bertahap_iya">Ya</label>
                      </div>
                      <div class="radio-button radio-button-primary">
                        <input id="orientasi_bertahap_tidak" type="radio" name="orientasi_bertahap" value="Tidak">
                        <label class="control-label" for="orientasi_bertahap_tidak">Tidak</label>
                      </div>
                    </div>


                    <div class="col-md-6">
                      <label class="control-label mb-5">c. Tempatkan bel ditempat yang mudah dicapai</label>
                      <div class="radio-button radio-button-primary">
                        <input id="tempat_bel_iya" type="radio" name="tempat_bel" value="Ya">
                        <label class="control-label" for="tempat_bel_iya">Ya</label>
                      </div>
                      <div class="radio-button radio-button-primary">
                        <input id="tempat_bel_tidak" type="radio" name="tempat_bel" value="Tidak">
                        <label class="control-label" for="tempat_bel_tidak">Tidak</label>
                      </div>


                      <label class="control-label mb-5 mt-5">d. Instruksikan meminta bantuan perawat sebelum turun dari tempat tidur</label>
                      <div class="radio-button radio-button-primary">
                        <input id="bantuan_perawat_iya" type="radio" name="bantuan_perawat" value="Ya">
                        <label class="control-label" for="bantuan_perawat_iya">Ya</label>
                      </div>
                      <div class="radio-button radio-button-primary">
                        <input id="bantuan_perawat_tidak" type="radio" name="bantuan_perawat" value="Tidak">
                        <label class="control-label" for="bantuan_perawat_tidak">Tidak</label>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                  <label class="control-label mb-15 mt-10 text-left">
                    8. Lantai kamar mandi dengan karpet antislip tidak licin</label>
                  <span id="mental_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="lantai" type="radio" name="lantai_licin" value="Tidak">
                    <label class="control-label" for="lantai">Tidak</label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="lantai1" type="radio" name="lantai_licin" value="Ya">
                    <label class="control-label" for="lantai1">Ya</label>
                  </div>
                </div>


              </div>


            </div>
            <!-- Ending formulir resiko rendah -->


            <!-- Formulir resiko sedang -->
            <div id="formResikoSedang" class="risk-form" style="display:none;">
              <div class="col-md-12">
                <h5 style="margin-top: 30px;"><strong>
                    <label class="control-label mb-10 text-left"><b>FORMULIR INTERVENSI JATUH RESIKO SEDANG<b /><span class="help"></span></label>
                  </strong>
                </h5>
              </div>


              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">1. Lakukan SEMUA intervensi jatuh resiko rendah/standar</label>
                  <span id="jatuh_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="sedang" type="radio" name="aktivitas_sedang" value="Tidak">
                    <label class="control-label" for="sedang">Tidak</label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="sedang1" type="radio" name="aktivitas_sedang" value="Ya">
                    <label class="control-label" for="sedang1">Ya</label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    2. Pakailah gelang resiko jatuh berwarna kuning
                  </label>
                  <span id="sekunder_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="gelang" type="radio" name="pakai_gelang" value="Tidak">
                    <label class="control-label" for="gelang">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="gelang1" type="radio" name="pakai_gelang" value="Ya">
                    <label class="control-label" for="gelang1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    3. Pasang gambar risiko jatuh diatas tempat tidur pasien dan pada pintu kamar pasien
                  </label>
                  <span id="bantu_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="gambar" type="radio" name="pasang_gambar" value="Tidak">
                    <label class="control-label" for="gambar">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="gambar1" type="radio" name="pasang_gambar" value="Ya">
                    <label class="control-label" for="gambar1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-5 mt-10 text-left">
                    4. Tempatkan tanda risiko pasien jatuh pada daftar nama pasien(warna kuning)
                  </label>
                  <span id="infus_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="tanda" type="radio" name="tempat_tanda" value="Tidak">
                    <label class="control-label" for="tanda">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="tanda1" type="radio" name="tempat_tanda" value="Ya">
                    <label class="control-label" for="tanda1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-5 mt-10 text-left">
                    5. Pertimbangkan riwayat obat-obatan dan suplemen untuk mengevaluasi pengobatan
                  </label>
                  <span id="berjalan_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="obatan" type="radio" name="obatan" value="Tidak">
                    <label class="control-label" for="obatan">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="obatan1" type="radio" name="obatan" value="Ya">
                    <label class="control-label" for="obatan">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-5 mt-10 text-left">
                    6. Gunakan alat bantu jalan(walker, handrail)
                  </label>
                  <span id="mental_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="walker" type="radio" name="alat_bantu" value="Tidak">
                    <label class="control-label" for="walker">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="walker1" type="radio" name="alat_bantu" value="Ya">
                    <label class="control-label" for="walker1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-5">
                  <label class="control-label mb-5 mt-10 text-left">
                    7. Dorong pastisipasi keluarga dalam keselamatan pasien
                  </label>
                  <span id="mental_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="keluarga" type="radio" name="partisipasi_keluarga" value="Tidak">
                    <label class="control-label" for="keluarga">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="keluarga1" type="radio" name="partisipasi_keluarga" value="Ya">
                    <label class="control-label" for="keluarga1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


            </div>


            <!-- Ending formulir resiko sedang -->


            <!-- Formulir resiko tinggi -->
            <div id="formResikoTinggi" class="risk-form" style="display:none;">
              <div class="col-md-12">
                <h5 style="margin-top: 30px;"><strong>
                    <label class="control-label mb-10 text-left"><b>FORMULIR INTERVENSI JATUH RESIKO TINGGI<b /><span class="help"></span></label>
                  </strong>
                </h5>
              </div>


              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">1. Lakukan SEMUA intervensi jatuh rendah/standar dan resiko sedang</label>
                  <span id="jatuh_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="tinggi" type="radio" name="aktivitas_tinggi" value="Tidak">
                    <label class="control-label" for="tinggi">Tidak</label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="tinggi1" type="radio" name="aktivitas_tinggi" value="Ya">
                    <label class="control-label" for="tinggi1">Ya</label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    2. Jangan tinggalkan pasien saat di ruangan diagnostic atau tindakan
                  </label>
                  <span id="sekunder_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="diagnostic" type="radio" name="ruangan_diagnostic" value="Tidak">
                    <label class="control-label" for="diagnostic">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="diagnostic1" type="radio" name="ruangan_diagnostic" value="Ya">
                    <label class="control-label" for="diagnostic1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    3. Penempatan pasien dekat nurse station untuk memudahkan observasi ( 24-48 jam)
                  </label>
                  <span id="bantu_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="nurse" type="radio" name="penempatan_pasien" value="Tidak">
                    <label class="control-label" for="nurse">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="nurse1" type="radio" name="penempatan_pasien" value="Ya">
                    <label class="control-label" for="nurse1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


            </div>
            <!-- Ending formulir resiko tinggi -->




            <div class="col-md-3">
              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
            </div>
            <div class="col-md-3">
              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
            </div>
            <div class="col-md-3">
              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
            </div>
            <div class="col-md-3">
              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
            </div>
            <!-- <div class="form-group">
              <div class="col-md-8">
                <label class="control-label mb-10 text-left">Diagnosa<span class="help"></span></label>
                <div class="has-success">
                  <textarea class="form-control" cols="10" rows="10" id="inDiagnosa" name="inDiagnosa"></textarea>
                  <span class="help-block text-danger"></span>
                </div>
              </div>
            </div> -->












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
          </div>
        </div>

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


  <style>
    canvas {
      cursor: crosshair;
      border: 1px solid #000000;
    }
  </style>

  <script type="text/javascript">
    $(document).ready(function(e) {
      id_pelayanan = $('#inPel').val();
      reload_data_id_pel(id_pelayanan);
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      let today = new Date();
      let day = String(today.getDate()).padStart(2, '0');
      let month = String(today.getMonth() + 1).padStart(2, '0'); // January is 0
      let year = today.getFullYear();

      let todayFormatted = `${year}-${month}-${day}`;
      let dateInput = document.getElementById('inTgl');
      if (dateInput) {
        dateInput.value = todayFormatted;
      }
    });
  </script>


  <!-- <script src="<?= base_url(); ?>assets/dist/js/slider.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/range-slide.css"> -->


  <script type="text/javascript">
    function simpan() {
      console.log("Fungsi simpan dipanggil");
      var id_pelayanan = $('#inPel').val();
      var id_history = $('#inHis').val();
      var no_rm = $('#inNoRM').val();
      var jatuh = $('input[name="jatuh"]:checked').val();
      var sekunder = $('input[name="sekunder"]:checked').val();
      var bantu = $('input[name="bantu"]:checked').val();
      var infus = $('input[name="infus"]:checked').val();
      var berjalan = $('input[name="berjalan"]:checked').val();
      var mental = $('input[name="mental"]:checked').val();
      var skor_total = $('#inTotal').val();
      var diagnosa = $('#inDiagnosa').val() || 'testing ';
      var staff = $('#inStaff').val();
      var tipe_resiko = $('#tipeResikoHidden').val(); // Tipe resiko dari input hidden

      // Data untuk tabel resiko_ulang_jatuh_dewasa
      var observasi = $('input[name="observasi"]:checked').val();
      var pagar = $('input[name="pagar"]:checked').val();
      var posisi = $('input[name="posisi"]:checked').val();
      var edukasi = $('input[name="edukasi"]:checked').val();
      var monitor = $('input[name="monitor"]:checked').val();
      var kaoskaki = $('input[name="kaoskaki"]:checked').val();
      var lokasi_kamar_mandi = $('input[name="lokasi_kamar_mandi"]:checked').val();
      var orientasi_bertahap = $('input[name="orientasi_bertahap"]:checked').val();
      var tempat_bel = $('input[name="tempat_bel"]:checked').val();
      var bantuan_perawat = $('input[name="bantuan_perawat"]:checked').val();
      var lantai_licin = $('input[name="lantai_licin"]:checked').val();
      var aktivitas_sedang = $('input[name="aktivitas_sedang"]:checked').val();
      var pakai_gelang = $('input[name="pakai_gelang"]:checked').val();
      var pasang_gambar = $('input[name="pasang_gambar"]:checked').val();
      var tempat_tanda = $('input[name="tempat_tanda"]:checked').val();
      var obatan = $('input[name="obatan"]:checked').val();
      var alat_bantu = $('input[name="alat_bantu"]:checked').val();
      var partisipasi_keluarga = $('input[name="partisipasi_keluarga"]:checked').val();
      var aktivitas_tinggi = $('input[name="aktivitas_tinggi"]:checked').val();
      var ruangan_diagnostic = $('input[name="ruangan_diagnostic"]:checked').val();
      var penempatan_pasien = $('input[name="penempatan_pasien"]:checked').val();

      // Buat data string untuk dikirim
      var dataString = 'jatuh=' + jatuh + '&no_rm=' + no_rm + '&sekunder=' + sekunder + '&bantu=' + bantu +
        '&infus=' + infus + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
        '&berjalan=' + berjalan + '&mental=' + mental + '&skor_total=' + skor_total +
        '&diagnosa=' + diagnosa + '&staff=' + staff + '&tipe_resiko=' + tipe_resiko +
        // Tambahkan data untuk resiko_ulang_jatuh_dewasa
        '&observasi=' + observasi + '&pagar=' + pagar + '&posisi=' + posisi + '&edukasi=' + edukasi +
        '&monitor=' + monitor + '&kaoskaki=' + kaoskaki + '&lokasi_kamar_mandi=' + lokasi_kamar_mandi +
        '&orientasi_bertahap=' + orientasi_bertahap + '&tempat_bel=' + tempat_bel +
        '&bantuan_perawat=' + bantuan_perawat + '&lantai_licin=' + lantai_licin +
        '&aktivitas_sedang=' + aktivitas_sedang + '&pakai_gelang=' + pakai_gelang +
        '&pasang_gambar=' + pasang_gambar + '&tempat_tanda=' + tempat_tanda +
        '&obatan=' + obatan + '&alat_bantu=' + alat_bantu +
        '&partisipasi_keluarga=' + partisipasi_keluarga + '&aktivitas_tinggi=' + aktivitas_tinggi +
        '&ruangan_diagnostic=' + ruangan_diagnostic + '&penempatan_pasien=' + penempatan_pasien;

      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/insert_asesmen",
        method: "POST",
        dataType: 'json',
        data: dataString,
        success: function(data) {
          if (data.status == "success") {
            window.location.href = "<?php echo base_url('Erm_ranap_ulang_jatuh_dewasa/formulangjatuhdewasa/') ?>" + id_pelayanan + '/' + id_history;
          } else if (data.error) {
            // Menangani error form
            if (jatuh == "" || jatuh == null) $('#jatuh_error').html("*wajib diisi");
            if (sekunder == "" || sekunder == null) $('#sekunder_error').html("*wajib diisi");
            if (bantu == "" || bantu == null) $('#bantu_error').html("*wajib diisi");
            if (infus == "" || infus == null) $('#infus_error').html("*wajib diisi");
            if (berjalan == "" || berjalan == null) $('#berjalan_error').html("*wajib diisi");
            if (mental == "" || mental == null) $('#mental_error').html("*wajib diisi");
            if (skor_total == "" || skor_total == null) $('#inTotal').html("*Klik Untuk Memproses Skor");
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

  <!-- <script type="text/javascript">
    function simpan() {
      console.log("Fungsi simpan dipanggil");
      var id_pelayanan = $('#inPel').val();
      var id_history = $('#inHis').val();
      var no_rm = $('#inNoRM').val();
      var jatuh = $('input[name="jatuh"]:checked').val();
      var sekunder = $('input[name="sekunder"]:checked').val();
      var bantu = $('input[name="bantu"]:checked').val();
      var infus = $('input[name="infus"]:checked').val();
      var berjalan = $('input[name="berjalan"]:checked').val();
      var mental = $('input[name="mental"]:checked').val();
      var skor_total = $('#inTotal').val();
      var diagnosa = $('#inDiagnosa').val() || 'testing ';
      var staff = $('#inStaff').val();
      var tipe_resiko = $('#tipeResikoHidden').val();

      // Data untuk tabel resiko_ulang_jatuh_dewasa
      var observasi = $('input[name="observasi"]:checked').val();
      var pagar = $('input[name="pagar"]:checked').val();
      var posisi = $('input[name="posisi"]:checked').val();
      var edukasi = $('input[name="edukasi"]:checked').val();
      var monitor = $('input[name="monitor"]:checked').val();
      var kaoskaki = $('input[name="kaoskaki"]:checked').val();
      var lokasi_kamar_mandi = $('input[name="lokasi_kamar_mandi"]:checked').val();
      var orientasi_bertahap = $('input[name="orientasi_bertahap"]:checked').val();
      var tempat_bel = $('input[name="tempat_bel"]:checked').val();
      var bantuan_perawat = $('input[name="bantuan_perawat"]:checked').val();
      var lantai_licin = $('input[name="lantai_licin"]:checked').val();
      var aktivitas_sedang = $('input[name="aktivitas_sedang"]:checked').val();
      var pakai_gelang = $('input[name="pakai_gelang"]:checked').val();
      var pasang_gambar = $('input[name="pasang_gambar"]:checked').val();
      var tempat_tanda = $('input[name="tempat_tanda"]:checked').val();
      var obatan = $('input[name="obatan"]:checked').val();
      var alat_bantu = $('input[name="alat_bantu"]:checked').val();
      var partisipasi_keluarga = $('input[name="partisipasi_keluarga"]:checked').val();
      var aktivitas_tinggi = $('input[name="aktivitas_tinggi"]:checked').val();
      var ruangan_diagnostic = $('input[name="ruangan_diagnostic"]:checked').val();
      var penempatan_pasien = $('input[name="penempatan_pasien"]:checked').val();


      var dataString = 'jatuh=' + jatuh + '&no_rm=' + no_rm + '&sekunder=' + sekunder + '&bantu=' + bantu +
        '&infus=' + infus + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
        '&berjalan=' + berjalan + '&mental=' + mental + '&skor_total=' + skor_total +
        '&diagnosa=' + diagnosa + '&staff=' + staff + '&tipe_resiko=' + tipe_resiko +
        '&observasi=' + observasi + '&pagar=' + pagar + '&posisi=' + posisi + '&edukasi=' + edukasi +
        '&monitor=' + monitor + '&kaoskaki=' + kaoskaki + '&lokasi_kamar_mandi=' + lokasi_kamar_mandi +
        '&orientasi_bertahap=' + orientasi_bertahap + '&tempat_bel=' + tempat_bel +
        '&bantuan_perawat=' + bantuan_perawat + '&lantai_licin=' + lantai_licin +
        '&aktivitas_sedang=' + aktivitas_sedang + '&pakai_gelang=' + pakai_gelang +
        '&pasang_gambar=' + pasang_gambar + '&tempat_tanda=' + tempat_tanda +
        '&obatan=' + obatan + '&alat_bantu=' + alat_bantu +
        '&partisipasi_keluarga=' + partisipasi_keluarga + '&aktivitas_tinggi=' + aktivitas_tinggi +
        '&ruangan_diagnostic=' + ruangan_diagnostic + '&penempatan_pasien=' + penempatan_pasien;

      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/insert_asesmen",
        method: "POST",
        dataType: 'json',
        data: dataString,
        success: function(data) {
          if (data.status == "success") {
            window.location.href = "<?php echo base_url('Erm_ranap_ulang_jatuh_dewasa/formulangjatuhdewasa/') ?>" + id_pelayanan + '/' + id_history;
          } else if (data.error) {
            // Menangani error form
            if (jatuh == "" || jatuh == null) $('#jatuh_error').html("*wajib diisi");
            if (sekunder == "" || sekunder == null) $('#sekunder_error').html("*wajib diisi");
            if (bantu == "" || bantu == null) $('#bantu_error').html("*wajib diisi");
            if (infus == "" || infus == null) $('#infus_error').html("*wajib diisi");
            if (berjalan == "" || berjalan == null) $('#berjalan_error').html("*wajib diisi");
            if (mental == "" || mental == null) $('#mental_error').html("*wajib diisi");
            if (skor_total == "" || skor_total == null) $('#inTotal').html("*Klik Untuk Memproses Skor");
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
  </script> -->

  <!-- <script type="text/javascript">
    function simpan() {
      console.log("Fungsi simpan dipanggil");
      var id_pelayanan = $('#inPel').val();
      var id_history = $('#inHis').val();
      var no_rm = $('#inNoRM').val();
      var jatuh = $('input[name="jatuh"]:checked').val();
      var sekunder = $('input[name="sekunder"]:checked').val();
      var bantu = $('input[name="bantu"]:checked').val();
      var infus = $('input[name="infus"]:checked').val();
      var berjalan = $('input[name="berjalan"]:checked').val();
      var mental = $('input[name="mental"]:checked').val();
      var skor_total = $('#inTotal').val();
      var diagnosa = $('#inDiagnosa').val() || 'testing ';
      var staff = $('#inStaff').val();

      // Ambil tipe_resiko dari input tersembunyi
      var tipe_resiko = $('#tipeResikoHidden').val(); // Ambil tipe resiko yang disimpan di hidden field

      // Buat data string untuk dikirim
      var dataString = 'jatuh=' + jatuh + '&no_rm=' + no_rm + '&sekunder=' + sekunder + '&bantu=' + bantu +
        '&infus=' + infus + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
        '&berjalan=' + berjalan + '&mental=' + mental + '&skor_total=' + skor_total +
        '&diagnosa=' + diagnosa + '&staff=' + staff + '&tipe_resiko=' + tipe_resiko;

      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/insert_asesmen",
        method: "POST",
        dataType: 'json',
        data: dataString,
        success: function(data) {
          if (data.status == "success") {
            window.location.href = "<?php echo base_url('Erm_ranap_ulang_jatuh_dewasa/formulangjatuhdewasa/') ?>" + id_pelayanan + '/' + id_history;
          } else if (data.error) {
            // Menangani error form
            if (jatuh == "" || jatuh == null) $('#jatuh_error').html("*wajib diisi");
            if (sekunder == "" || sekunder == null) $('#sekunder_error').html("*wajib diisi");
            if (bantu == "" || bantu == null) $('#bantu_error').html("*wajib diisi");
            if (infus == "" || infus == null) $('#infus_error').html("*wajib diisi");
            if (berjalan == "" || berjalan == null) $('#berjalan_error').html("*wajib diisi");
            if (mental == "" || mental == null) $('#mental_error').html("*wajib diisi");
            if (skor_total == "" || skor_total == null) $('#inTotal').html("*Klik Untuk Memproses Skor");
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
  </script> -->

  <script type="text/javascript">
    function sumScore() {
      var score = 0,
        score1 = 0,
        score2 = 0,
        score3 = 0,
        score4 = 0,
        score5 = 0;

      // Logika perhitungan skor yang sama seperti sebelumnya
      if ($('#jatuh1').is(":checked")) score = 0;
      else if ($('#jatuh2').is(":checked")) score = 25;

      if ($('#sekunder1').is(":checked")) score1 = 0;
      else if ($('#sekunder2').is(":checked")) score1 = 15;

      if ($('#bantu1').is(":checked")) score2 = 0;
      else if ($('#bantu2').is(":checked")) score2 = 15;
      else if ($('#bantu3').is(":checked")) score2 = 30;

      if ($('#infus1').is(":checked")) score3 = 0;
      else if ($('#infus2').is(":checked")) score3 = 20;

      if ($('#berjalan1').is(":checked")) score4 = 0;
      else if ($('#berjalan2').is(":checked")) score4 = 10;
      else if ($('#berjalan3').is(":checked")) score4 = 20;

      if ($('#mental1').is(":checked")) score5 = 0;
      else if ($('#mental2').is(":checked")) score5 = 15;

      // Total skor
      var sum = score + score1 + score2 + score3 + score4 + score5;
      $('#inTotal').val(sum);

      // Penentuan tipe resiko berdasarkan skor
      var tipe_resiko = '';
      if (sum <= 24) {
        tipe_resiko = 'Rendah';
      } else if (sum <= 44) {
        tipe_resiko = 'Sedang';
      } else {
        tipe_resiko = 'Tinggi';
      }

      console.log('Total Score:', sum);
      console.log('Tipe Resiko:', tipe_resiko);

      // Simpan tipe_resiko ke variabel global atau input tersembunyi untuk diambil saat simpan
      $('#tipeResikoHidden').val(tipe_resiko); // Misalnya menggunakan input hidden

      // Logika menampilkan form berdasarkan tipe risiko
      let formToShow = [];
      if (sum <= 24) {
        formToShow.push('formResikoRendah');
      } else if (sum <= 44) {
        formToShow.push('formResikoRendah', 'formResikoSedang');
      } else {
        formToShow.push('formResikoRendah', 'formResikoSedang', 'formResikoTinggi');
      }
      $('.risk-form').hide();
      formToShow.forEach(function(form) {
        $('#' + form).show();
      });
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
          "url": '<?php echo base_url('Erm_ranap_ulang_jatuh_dewasa/tampil_list_per_pen_rujukan'); ?>',
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

    function hapus(id) { //utk hapus diagnosa pasien
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
        $().ready(function() {
          $.ajax({
            url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/hapus_catatan",
            method: "POST",
            dataType: 'json',
            data: {
              id: id,
            },
            success: function(data) {
              if (data.status == "success") {
                swal({
                  title: "good job!",
                  type: "success",
                  text: "Data Berhasil dihapus",
                  confirmButtonColor: "#3cb878",
                });
                $('#jatuh_ulang').DataTable().ajax.reload();
              } else {
                swal({
                  title: "Gagal!",
                  type: "warning",
                  confirmButtonColor: "#3cb878",
                });
              }
            }
          });
        });
      });
      return false;
    }

    function edit() {
      id = $("#id").val();
      id_pelayanan = $('#inPel').val();
      id_history = $('#inHis').val();
      no_rm = $('#inNoRM').val();
      jatuh = $('input[name="jatuh"]:checked').val();
      sekunder = $('input[name="sekunder"]:checked').val();
      bantu = $('input[name="bantu"]:checked').val();
      infus = $('input[name="infus"]:checked').val();
      berjalan = $('input[name="berjalan"]:checked').val();
      mental = $('input[name="mental"]:checked').val();
      skor_total = $('#inTotal').val();
      diagnosa = $('#inDiagnosa').val();
      staff = $('#inStaff').val();
      tipe_resiko = $('#tipeResikoHidden').val();

      observasi = $('input[name="observasi"]:checked').val();
      pagar = $('input[name="pagar"]:checked').val();
      posisi = $('input[name="posisi"]:checked').val();
      edukasi = $('input[name="edukasi"]:checked').val();
      monitor = $('input[name="monitor"]:checked').val();
      kaoskaki = $('input[name="kaoskaki"]:checked').val();
      lokasi_kamar_mandi = $('input[name="lokasi_kamar_mandi"]:checked').val();
      orientasi_bertahap = $('input[name="orientasi_bertahap"]:checked').val();
      tempat_bel = $('input[name="tempat_bel"]:checked').val();
      bantuan_perawat = $('input[name="bantuan_perawat"]:checked').val();
      lantai_licin = $('input[name="lantai_licin"]:checked').val();
      aktivitas_sedang = $('input[name="aktivitas_sedang"]:checked').val();
      pakai_gelang = $('input[name="pakai_gelang"]:checked').val();
      pasang_gambar = $('input[name="pasang_gambar"]:checked').val();
      tempat_tanda = $('input[name="tempat_tanda"]:checked').val();
      obatan = $('input[name="obatan"]:checked').val();
      alat_bantu = $('input[name="alat_bantu"]:checked').val();
      partisipasi_keluarga = $('input[name="partisipasi_keluarga"]:checked').val();
      aktivitas_tinggi = $('input[name="aktivitas_tinggi"]:checked').val();
      ruangan_diagnostic = $('input[name="ruangan_diagnostic"]:checked').val();
      penempatan_pasien = $('input[name="penempatan_pasien"]:checked').val();

      dataString = 'jatuh=' + jatuh + '&no_rm=' + no_rm + '&sekunder=' + sekunder + '&bantu=' + bantu +
        '&infus=' + infus + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
        '&berjalan=' + berjalan + '&mental=' + mental + '&skor_total=' + skor_total +
        '&diagnosa=' + diagnosa + '&staff=' + staff + '&tipe_resiko=' + tipe_resiko +
        // Tambahkan data untuk resiko_ulang_jatuh_dewasa
        '&observasi=' + observasi + '&pagar=' + pagar + '&posisi=' + posisi + '&edukasi=' + edukasi +
        '&monitor=' + monitor + '&kaoskaki=' + kaoskaki + '&lokasi_kamar_mandi=' + lokasi_kamar_mandi +
        '&orientasi_bertahap=' + orientasi_bertahap + '&tempat_bel=' + tempat_bel +
        '&bantuan_perawat=' + bantuan_perawat + '&lantai_licin=' + lantai_licin +
        '&aktivitas_sedang=' + aktivitas_sedang + '&pakai_gelang=' + pakai_gelang +
        '&pasang_gambar=' + pasang_gambar + '&tempat_tanda=' + tempat_tanda +
        '&obatan=' + obatan + '&alat_bantu=' + alat_bantu +
        '&partisipasi_keluarga=' + partisipasi_keluarga + '&aktivitas_tinggi=' + aktivitas_tinggi +
        '&ruangan_diagnostic=' + ruangan_diagnostic + '&penempatan_pasien=' + penempatan_pasien;

      // dataString = 'jatuh=' + jatuh + '&sekunder=' + sekunder + '&bantu=' + bantu + '&infus=' + infus + '&id_pelayanan=' + id_pelayanan + '&berjalan=' + berjalan + '&mental=' + mental + '&skor_total=' + skor_total + '&diagnosa=' + diagnosa +
      // '&observasi=' + observasi + '&pagar=' + pagar + '&posisi=' + posisi + '&edukasi=' + edukasi +
      //   '&monitor=' + monitor + '&kaoskaki=' + kaoskaki + '&lokasi_kamar_mandi=' + lokasi_kamar_mandi +
      //   '&orientasi_bertahap=' + orientasi_bertahap + '&tempat_bel=' + tempat_bel +
      //   '&bantuan_perawat=' + bantuan_perawat + '&lantai_licin=' + lantai_licin +
      //   '&aktivitas_sedang=' + aktivitas_sedang + '&pakai_gelang=' + pakai_gelang +
      //   '&pasang_gambar=' + pasang_gambar + '&tempat_tanda=' + tempat_tanda +
      //   '&obatan=' + obatan + '&alat_bantu=' + alat_bantu +
      //   '&partisipasi_keluarga=' + partisipasi_keluarga + '&aktivitas_tinggi=' + aktivitas_tinggi +
      //   '&ruangan_diagnostic=' + ruangan_diagnostic + '&penempatan_pasien=' + penempatan_pasien;


      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/update_asesmen",
        method: "POST",
        dataType: 'json',
        data: dataString,
        success: function(data) {
          if (data.status == "success") {
            window.location.href = "<?php echo base_url('Erm_ranap_ulang_jatuh_dewasa/formulangjatuhdewasa/') ?>" + id_pelayanan + '/' + id_history;
            //  id_pelayanan = $('#inPel').val();
            //  id_history = $('#inHis').val();
            //swal({
            // title: "Berhasil Update Data!",
            // type: "success",
            // text: data.status,
            // confirmButtonColor: "#3cb878",
            // });
            //  reload_data_id_pel(id_pelayanan);
            // window.location.href = "<?php echo base_url('Erm_ranap_ulang_jatuh_dewasa/formulangjatuhdewasa/') ?>" + id_pelayanan + '/' + id_history;
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
      // $('#id').val(id);
      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/get_ass_per",
        method: "POST",
        dataType: 'json',
        data: {
          id: id
        },
        success: function(data) {
          if (data.status_dt == "found") {
            // $('#inPel').val(data.id_asesmen);
            $('input[name="jatuh"][value="' + data.riwayat_jatuh + '"]').prop('checked', true);
            $('input[name="sekunder"][value="' + data.diagnosa_sekunder + '"]').prop('checked', true);
            $('input[name="bantu"][value="' + data.bantu + '"]').prop('checked', true);
            $('input[name="infus"][value="' + data.infus + '"]').prop('checked', true);
            $('input[name="berjalan"][value="' + data.gaya_jalan + '"]').prop('checked', true);
            $('input[name="mental"][value="' + data.status_mental + '"]').prop('checked', true);
            $('input[name="observasi"][value="' + data.observasi + '"]').prop('checked', true);
            $('input[name="pagar"][value="' + data.pagar + '"]').prop('checked', true);
            $('input[name="posisi"][value="' + data.posisi + '"]').prop('checked', true);
            $('input[name="edukasi"][value="' + data.edukasi + '"]').prop('checked', true);
            $('input[name="monitor"][value="' + data.monitor + '"]').prop('checked', true);
            $('input[name="kaoskaki"][value="' + data.kaoskaki + '"]').prop('checked', true);
            $('input[name="lokasi_kamar_mandi"][value="' + data.lokasi_kamar_mandi + '"]').prop('checked', true);
            $('input[name="orientasi_bertahap"][value="' + data.orientasi_bertahap + '"]').prop('checked', true);
            $('input[name="tempat_bel"][value="' + data.tempat_bel + '"]').prop('checked', true);
            $('input[name="bantuan_perawat"][value="' + data.bantuan_perawat + '"]').prop('checked', true);
            $('input[name="lantai_licin"][value="' + data.lantai_licin + '"]').prop('checked', true);
            $('input[name="aktivitas_sedang"][value="' + data.aktivitas_sedang + '"]').prop('checked', true);
            $('input[name="pakai_gelang"][value="' + data.pakai_gelang + '"]').prop('checked', true);
            $('input[name="pasang_gambar"][value="' + data.pasang_gambar + '"]').prop('checked', true);
            $('input[name="tempat_tanda"][value="' + data.tempat_tanda + '"]').prop('checked', true);
            $('input[name="obatan"][value="' + data.obatan + '"]').prop('checked', true);
            $('input[name="alat_bantu"][value="' + data.alat_bantu + '"]').prop('checked', true);
            $('input[name="partisipasi_keluarga"][value="' + data.partisipasi_keluarga + '"]').prop('checked', true);
            $('input[name="aktivitas_tinggi"][value="' + data.aktivitas_tinggi + '"]').prop('checked', true);
            $('input[name="ruangan_diagnostic"][value="' + data.ruangan_diagnostic + '"]').prop('checked', true);
            $('input[name="penempatan_pasien"][value="' + data.penempatan_pasien + '"]').prop('checked', true);
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
  </script>

  <<script>
 function pilihRanap(id) {
      // $('#id').val(id);
      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/get_ass_per_ranap",
        method: "POST",
        dataType: 'json',
        data: {
          id: id
        },


        success: function(data) {
          if (data.status_dt == "found") {
            const { umur, jenis_kelamin, diagnosis, gangguan, faktor, anestesi } = data;


            const total =
                (+umur || 0) +
                (+jenis_kelamin || 0) +
                (+diagnosis || 0) +
                (+gangguan || 0) +
                (+faktor || 0) +
                (+anestesi || 0);
              const map = {
              jatuh: data.umur,
              sekunder: data.jenis_kelamin,
              bantu: data.diagnosis,
              infus: data.gangguan,
              berjalan: data.faktor,
              mental: data.anestesi
            };


            $('#edit').attr('onclick', 'editRanap()');


          // 2️⃣ Loop tiap pasangan name:value
            $.each(map, function(name, value) {
              // Pastikan value tidak undefined/null
              if (value !== undefined && value !== null && value !== 'undefined') {
                // Coba check radio dengan value yang sesuai
                $(`input[name="${name}"][id="${name+value}"]`).prop('checked', true);
              }
            });


            // smooth scroll
            window.scrollTo({
              top: 0,
              behavior: 'smooth'
            });


            $('#inTotal').val(total);
            $('#edit').show();
            $('#cetak').show();
            $('#simpan').hide();




            //  const skorMap = {
            //   // Jatuh
            //   "jatuh0": 0,
            //   "jatuh25": 25,


            //   // Sekunder
            //   "sekunder0": 0,
            //   "sekunder15": 15,


            //   // Bantu
            //   "bantu0": 0,
            //   "bantu15": 15,
            //   "bantu30": 30,


            //   // Infus
            //   "infus0": 0,
            //   "infus20": 20,


            //   // Berjalan
            //   "berjalan0": 0,
            //   "berjalan10": 10,
            //   "berjalan20": 20,


            //   // Mental
            //   "mental0": 0,
            //   "mental15": 15
            // };


            // // setiap kali ada radio berubah, update value-nya
            // $('input[type="radio"]').on('change', function() {
            //   const id = $(this).attr('id'); // contoh: "sekunder15"
            //   const skor = skorMap[id] || 0; // ambil skor dari mapping
            //   $(this).val(skor); // ubah value input jadi angka skor


            //   console.log('Input', $(this).attr('name'), 'sekarang bernilai:', skor);
            // });


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


    function editRanap() {
      let id = $("#id").val();
      let id_pelayanan = $('#inPel').val();
      let id_history = $('#inHis').val();
      let no_rm = $('#inNoRM').val();


      // Ambil semua nilai radio
      let jatuh = $('input[name="jatuh"]:checked').val() || "";
      let sekunder = $('input[name="sekunder"]:checked').val() || "";
      let bantu = $('input[name="bantu"]:checked').val() || "";
      let infus = $('input[name="infus"]:checked').val() || "";
      let berjalan = $('input[name="berjalan"]:checked').val() || "";
      let mental = $('input[name="mental"]:checked').val() || "";


      // ✅ Gunakan mapping objek (lebih cepat, mudah dibaca)
      const nilaiMap = {
        jatuh: { "Ya": 25, "Tidak": 0 },
        sekunder: { "Ya": 15, "Tidak": 0 },
        bantu: { "Tongkat": 15, "Kursi": 30, "Tidak Ada": 0 },
        infus: { "Ya": 20, "Tidak": 0 },
        berjalan: { "Lemah": 10, "Terganggu": 20, "Normal": 0 },
        mental: { "Pelupa": 15, "Menyadari": 0 }
      };


      // 🧠 Otomatis ubah semua berdasarkan mapping
      jatuh = nilaiMap.jatuh[jatuh] ?? 0;
      sekunder = nilaiMap.sekunder[sekunder] ?? 0;
      bantu = nilaiMap.bantu[bantu] ?? 0;
      infus = nilaiMap.infus[infus] ?? 0;
      berjalan = nilaiMap.berjalan[berjalan] ?? 0;
      mental = nilaiMap.mental[mental] ?? 0;


      const dataString = {
        id,
        id_pelayanan,
        id_history,
        no_rm,
        jatuh,
        sekunder,
        bantu,
        infus,
        berjalan,
        mental
      };


      console.log("Data dikirim:", dataString);


      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/update_asesmen_ranap",
        method: "POST",
        dataType: 'json',
        data: dataString,
        success: function (data) {
          console.log("Berhasil:", data);
          location.reload();
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error:", error);
          swal({
            title: "Error!",
            text: "Terjadi kesalahan saat mengirim data.",
            icon: "error",
            confirmButtonColor: "#3cb878",
          });
        }
      });


      return false;
    }
 function sumScore() {
      var score = 0,
        score1 = 0,
        score2 = 0,
        score3 = 0,
        score4 = 0,
        score5 = 0;


      // Logika perhitungan skor yang sama seperti sebelumnya
      if ($('#jatuh0').is(":checked")) score = 0;
      else if ($('#jatuh25').is(":checked")) score = 25;


      if ($('#sekunder0').is(":checked")) score1 = 0;
      else if ($('#sekunder15').is(":checked")) score1 = 15;


      if ($('#bantu0').is(":checked")) score2 = 0;
      else if ($('#bantu15').is(":checked")) score2 = 15;
      else if ($('#bantu30').is(":checked")) score2 = 30;


      if ($('#infus0').is(":checked")) score3 = 0;
      else if ($('#infus20').is(":checked")) score3 = 20;


      if ($('#berjalan0').is(":checked")) score4 = 0;
      else if ($('#berjalan10').is(":checked")) score4 = 10;
      else if ($('#berjalan20').is(":checked")) score4 = 20;


      if ($('#mental0').is(":checked")) score5 = 0;
      else if ($('#mental15').is(":checked")) score5 = 15;


      // Total skor
      var sum = score + score1 + score2 + score3 + score4 + score5;
      $('#inTotal').val(sum);


      // Penentuan tipe resiko berdasarkan skor
      var tipe_resiko = '';
      if (sum <= 24) {
        tipe_resiko = 'Rendah';
      } else if (sum <= 44) {
        tipe_resiko = 'Sedang';m
      } else {
        tipe_resiko = 'Tinggi';
      }


      console.log('Total Score:', sum);
      console.log('Tipe Resiko:', tipe_resiko);


      // Simpan tipe_resiko ke variabel global atau input tersembunyi untuk diambil saat simpan
      $('#tipeResikoHidden').val(tipe_resiko); // Misalnya menggunakan input hidden


      // Logika menampilkan form berdasarkan tipe risiko
      let formToShow = [];
      if (sum <= 24) {
        formToShow.push('formResikoRendah');
      } else if (sum <= 44) {
        formToShow.push('formResikoRendah', 'formResikoSedang');
      } else {
        formToShow.push('formResikoRendah', 'formResikoSedang', 'formResikoTinggi');
      }
      $('.risk-form').hide();
      formToShow.forEach(function(form) {
        $('#' + form).show();
      });
    }



=======
<!-- Row -->
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">ASESMEN AWAL JATUH DEWASA</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">

        <div class="panel-body">
          <div class="form-wrap">




            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                <!-- <input type="text" disabled class="form-control"id="inNoRM"> -->
                <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                <input type="hidden" class="form-control" id="id">
               
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                <!-- <input type="text" disabled class="form-control" id="inNama"> -->
                <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama">
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
                                                                        echo $date  . '(' . getAge($tgl_lahir) . ')' ?>">
                <span class="help-block"></span>
              </div>
            </div>


            <div class="form-group ">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                <!-- <input type="text" disabled class="form-control" id="inJk"> -->
                <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk">
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-3 text-left">
                <label class="control-label mb-10 ">Ruang Rawat<span class="help"></span></label>
                <input type="text" disabled class="form-control" value="<?= $nama_ruangan ?>" id="inRawat" disabled>
              </div>
            </div>




            <!--
                              --bagian ASESMEN AWAL KEPERAWATAN/KEBIDANAN
                            -->
            <div class="form-group" id="spirit">
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
                <label class="control-label mb-10 text-left">
                  Total Skor :
                </label>
              </div>
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">
                  - 0-24 : Risiko Rendah
                </label>
              </div>
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">
                  - 25-44 : Risiko Sedang
                </label>
              </div>
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">
                  - >44 : Risiko Tinggi
                </label>
              </div>
              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    a. Riwayat Jatuh Pasien
                  </label>
                  <span id="jatuh_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="jatuh0" type="radio" name="jatuh" value="Tidak" data-exclude="true">
                    <label class="control-label" for="jatuh1">
                      Tidak(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="jatuh25" type="radio" name="jatuh" value="Ya" data-exclude="true">
                    <label class="control-label" for="jatuh2">
                      Ya(25)
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    b. Diagnosa Sekunder
                  </label>
                  <span id="sekunder_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="sekunder0" type="radio" name="sekunder" value="Tidak" data-exclude="true">
                    <label class="control-label" for="sekunder1">
                      Tidak(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="sekunder15" type="radio" name="sekunder" value="Ya" data-exclude="true">
                    <label class="control-label" for="sekunder2">
                      Ya(15)
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    c. Menggunakan Alat Bantu
                  </label>
                  <span id="bantu_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="bantu0" type="radio" name="bantu" value="Tidak Ada" data-exclude="true">
                    <label class="control-label" for="bantu1">
                      Tidak Ada/Bedrest/Dibantu Perawat(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="bantu15" type="radio" name="bantu" value="Tongkat" data-exclude="true">
                    <label class="control-label" for="bantu2">
                      Kruk/Tongkat(15)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="bantu30" type="radio" name="bantu" value="Kursi" data-exclude="true">
                    <label class="control-label" for="bantu3">
                      Kursi/Perabot(30)
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    d. Menggunakan Infus/Heparin/Pengencer Dara
                  </label>
                  <span id="infus_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="infus0" type="radio" name="infus" value="Tidak" data-exclude="true">
                    <label class="control-label" for="infus1">
                      Tidak(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="infus20" type="radio" name="infus" value="Ya" data-exclude="true">
                    <label class="control-label" for="infus2">
                      Ya(20)
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    e. Gaya Berjalan
                  </label>
                  <span id="berjalan_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="berjalan0" type="radio" name="berjalan" value="Normal" data-exclude="true">
                    <label class="control-label" for="berjalan1">
                      Normal/Bedrest/Kursi Roda(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="berjalan10" type="radio" name="berjalan" value="Lemah" data-exclude="true">
                    <label class="control-label" for="berjalan2">
                      Lemah(10)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="berjalan20" type="radio" name="berjalan" value="Terganggu" data-exclude="true">
                    <label class="control-label" for="berjalan3">
                      Terganggu(20)
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    f. Status Mental
                  </label>
                  <span id="mental_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="mental0" type="radio" name="mental" value="Menyadari" data-exclude="true">
                    <label class="control-label" for="mental1">
                      Menyadari Kemampuan(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="mental15" type="radio" name="mental" value="Pelupa" data-exclude="true">
                    <label class="control-label" for="mental2">
                      Lupa akan keterbatasan/Pelupa(15)
                    </label>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <button type="submit" class="btn btn-success mb-4" onclick="sumScore()">Skor Risiko</button>
              <div class="col-md-3">
                <input type="text" class="form-control" disabled id="inTotal">
                <input type="hidden" id="tipeResikoHidden" name="tipe_resiko">
              </div>
            </div>


            <script>
              document.addEventListener("DOMContentLoaded", function() {
                const observasiYes = document.getElementById("observasi1");


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


            <!-- Formulir resiko rendah -->
            <div id="formResikoRendah" class="risk-form" style="display:none;">
              <div class="col-md-12">
                <h5 style="margin-top: 30px;"><strong>
                    <label class="control-label mb-10 text-left"><b>FORMULIR INTERVENSI JATUH RESIKO RENDAH<b /><span class="help"></span></label>
                  </strong>
                </h5>
              </div>


              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">1. Tingkatan observasi bantuan yang sesuai saat ambulasi</label>
                  <span id="jatuh_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="observasi" type="radio" name="observasi" value="Tidak">
                    <label class="control-label" for="observasi">Tidak</label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="observasi1" type="radio" name="observasi" value="Ya">
                    <label class="control-label" for="observasi1">Ya</label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    2. Pagar pengaman tempat tidur dinaikkan
                  </label>
                  <span id="sekunder_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="pagar" type="radio" name="pagar" value="Tidak">
                    <label class="control-label" for="pagar">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="pagar1" type="radio" name="pagar" value="Ya">
                    <label class="control-label" for="pagar1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    3. Tempat tidur dalam posisi rendah terkunci
                  </label>
                  <span id="bantu_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="posisi" type="radio" name="posisi" value="Tidak">
                    <label class="control-label" for="posisi">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="posisi1" type="radio" name="posisi" value="Ya">
                    <label class="control-label" for="posisi1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-5 mt-10 text-left">
                    4. Edukasi perilaku yang lebih aman saat jatuh atau transfer
                  </label>
                  <span id="infus_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="edukasi" type="radio" name="edukasi" value="Tidak">
                    <label class="control-label" for="edukasi">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="edukasi1" type="radio" name="edukasi" value="Ya">
                    <label class="control-label" for="edukasi1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-5 mt-10 text-left">
                    5. Monitor kebutuhan pasien secara berkala (minimal tiap 2 jam)
                  </label>
                  <span id="berjalan_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="monitor" type="radio" name="monitor" value="Tidak">
                    <label class="control-label" for="monitor">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="monitor1" type="radio" name="monitor" value="Ya">
                    <label class="control-label" for="monitor1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-5  text-left">
                    6. Anjurkan pasien tidak menggunakan kaus kaki atau sepatu yang licin
                  </label>
                  <span id="mental_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="kaoskaki" type="radio" name="kaoskaki" value="Tidak">
                    <label class="control-label" for="kaos">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="kaoskaki1" type="radio" name="kaoskaki" value="Ya">
                    <label class="control-label" for="kaoskaki1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 mt-5 text-left">
                    7. Orientasikan pasien terhadap lingkungan dan rutinitas Rumah Sakit</label>
                  <div class="row ms-4">
                    <div class="col-md-6">
                      <label class="control-label mb-5">a. Tunjukkan Lokasi Kamar Mandi</label>
                      <div class="radio-button radio-button-primary">
                        <input id="lokasi_kamar_mandi_iya" type="radio" name="lokasi_kamar_mandi" value="Ya">
                        <label class="control-label" for="lokasi_kamar_mandi_iya">Ya</label>
                      </div>
                      <div class="radio-button radio-button-primary">
                        <input id="lokasi_kamar_mandi_tidak" type="radio" name="lokasi_kamar_mandi" value="Tidak">
                        <label class="control-label" for="lokasi_kamar_mandi_tidak">Tidak</label>
                      </div>


                      <label class="control-label mb-5 mt-5">b. Jika pasien linglung orientasi dilaksanakan bertahap</label>
                      <div class="radio-button radio-button-primary">
                        <input id="orientasi_bertahap_iya" type="radio" name="orientasi_bertahap" value="Ya">
                        <label class="control-label" for="orientasi_bertahap_iya">Ya</label>
                      </div>
                      <div class="radio-button radio-button-primary">
                        <input id="orientasi_bertahap_tidak" type="radio" name="orientasi_bertahap" value="Tidak">
                        <label class="control-label" for="orientasi_bertahap_tidak">Tidak</label>
                      </div>
                    </div>


                    <div class="col-md-6">
                      <label class="control-label mb-5">c. Tempatkan bel ditempat yang mudah dicapai</label>
                      <div class="radio-button radio-button-primary">
                        <input id="tempat_bel_iya" type="radio" name="tempat_bel" value="Ya">
                        <label class="control-label" for="tempat_bel_iya">Ya</label>
                      </div>
                      <div class="radio-button radio-button-primary">
                        <input id="tempat_bel_tidak" type="radio" name="tempat_bel" value="Tidak">
                        <label class="control-label" for="tempat_bel_tidak">Tidak</label>
                      </div>


                      <label class="control-label mb-5 mt-5">d. Instruksikan meminta bantuan perawat sebelum turun dari tempat tidur</label>
                      <div class="radio-button radio-button-primary">
                        <input id="bantuan_perawat_iya" type="radio" name="bantuan_perawat" value="Ya">
                        <label class="control-label" for="bantuan_perawat_iya">Ya</label>
                      </div>
                      <div class="radio-button radio-button-primary">
                        <input id="bantuan_perawat_tidak" type="radio" name="bantuan_perawat" value="Tidak">
                        <label class="control-label" for="bantuan_perawat_tidak">Tidak</label>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                  <label class="control-label mb-15 mt-10 text-left">
                    8. Lantai kamar mandi dengan karpet antislip tidak licin</label>
                  <span id="mental_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="lantai" type="radio" name="lantai_licin" value="Tidak">
                    <label class="control-label" for="lantai">Tidak</label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="lantai1" type="radio" name="lantai_licin" value="Ya">
                    <label class="control-label" for="lantai1">Ya</label>
                  </div>
                </div>


              </div>


            </div>
            <!-- Ending formulir resiko rendah -->


            <!-- Formulir resiko sedang -->
            <div id="formResikoSedang" class="risk-form" style="display:none;">
              <div class="col-md-12">
                <h5 style="margin-top: 30px;"><strong>
                    <label class="control-label mb-10 text-left"><b>FORMULIR INTERVENSI JATUH RESIKO SEDANG<b /><span class="help"></span></label>
                  </strong>
                </h5>
              </div>


              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">1. Lakukan SEMUA intervensi jatuh resiko rendah/standar</label>
                  <span id="jatuh_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="sedang" type="radio" name="aktivitas_sedang" value="Tidak">
                    <label class="control-label" for="sedang">Tidak</label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="sedang1" type="radio" name="aktivitas_sedang" value="Ya">
                    <label class="control-label" for="sedang1">Ya</label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    2. Pakailah gelang resiko jatuh berwarna kuning
                  </label>
                  <span id="sekunder_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="gelang" type="radio" name="pakai_gelang" value="Tidak">
                    <label class="control-label" for="gelang">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="gelang1" type="radio" name="pakai_gelang" value="Ya">
                    <label class="control-label" for="gelang1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    3. Pasang gambar risiko jatuh diatas tempat tidur pasien dan pada pintu kamar pasien
                  </label>
                  <span id="bantu_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="gambar" type="radio" name="pasang_gambar" value="Tidak">
                    <label class="control-label" for="gambar">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="gambar1" type="radio" name="pasang_gambar" value="Ya">
                    <label class="control-label" for="gambar1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-5 mt-10 text-left">
                    4. Tempatkan tanda risiko pasien jatuh pada daftar nama pasien(warna kuning)
                  </label>
                  <span id="infus_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="tanda" type="radio" name="tempat_tanda" value="Tidak">
                    <label class="control-label" for="tanda">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="tanda1" type="radio" name="tempat_tanda" value="Ya">
                    <label class="control-label" for="tanda1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-5 mt-10 text-left">
                    5. Pertimbangkan riwayat obat-obatan dan suplemen untuk mengevaluasi pengobatan
                  </label>
                  <span id="berjalan_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="obatan" type="radio" name="obatan" value="Tidak">
                    <label class="control-label" for="obatan">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="obatan1" type="radio" name="obatan" value="Ya">
                    <label class="control-label" for="obatan">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-5 mt-10 text-left">
                    6. Gunakan alat bantu jalan(walker, handrail)
                  </label>
                  <span id="mental_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="walker" type="radio" name="alat_bantu" value="Tidak">
                    <label class="control-label" for="walker">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="walker1" type="radio" name="alat_bantu" value="Ya">
                    <label class="control-label" for="walker1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-5">
                  <label class="control-label mb-5 mt-10 text-left">
                    7. Dorong pastisipasi keluarga dalam keselamatan pasien
                  </label>
                  <span id="mental_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="keluarga" type="radio" name="partisipasi_keluarga" value="Tidak">
                    <label class="control-label" for="keluarga">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="keluarga1" type="radio" name="partisipasi_keluarga" value="Ya">
                    <label class="control-label" for="keluarga1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


            </div>


            <!-- Ending formulir resiko sedang -->


            <!-- Formulir resiko tinggi -->
            <div id="formResikoTinggi" class="risk-form" style="display:none;">
              <div class="col-md-12">
                <h5 style="margin-top: 30px;"><strong>
                    <label class="control-label mb-10 text-left"><b>FORMULIR INTERVENSI JATUH RESIKO TINGGI<b /><span class="help"></span></label>
                  </strong>
                </h5>
              </div>


              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">1. Lakukan SEMUA intervensi jatuh rendah/standar dan resiko sedang</label>
                  <span id="jatuh_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="tinggi" type="radio" name="aktivitas_tinggi" value="Tidak">
                    <label class="control-label" for="tinggi">Tidak</label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="tinggi1" type="radio" name="aktivitas_tinggi" value="Ya">
                    <label class="control-label" for="tinggi1">Ya</label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    2. Jangan tinggalkan pasien saat di ruangan diagnostic atau tindakan
                  </label>
                  <span id="sekunder_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="diagnostic" type="radio" name="ruangan_diagnostic" value="Tidak">
                    <label class="control-label" for="diagnostic">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="diagnostic1" type="radio" name="ruangan_diagnostic" value="Ya">
                    <label class="control-label" for="diagnostic1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">
                    3. Penempatan pasien dekat nurse station untuk memudahkan observasi ( 24-48 jam)
                  </label>
                  <span id="bantu_error" class="text-danger"></span>
                  <div class="radio-button radio-button-primary">
                    <input id="nurse" type="radio" name="penempatan_pasien" value="Tidak">
                    <label class="control-label" for="nurse">
                      Tidak
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="nurse1" type="radio" name="penempatan_pasien" value="Ya">
                    <label class="control-label" for="nurse1">
                      Ya
                    </label>
                  </div>
                </div>
              </div>


            </div>
            <!-- Ending formulir resiko tinggi -->




            <div class="col-md-3">
              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
            </div>
            <div class="col-md-3">
              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
            </div>
            <div class="col-md-3">
              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
            </div>
            <div class="col-md-3">
              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
            </div>
            <!-- <div class="form-group">
              <div class="col-md-8">
                <label class="control-label mb-10 text-left">Diagnosa<span class="help"></span></label>
                <div class="has-success">
                  <textarea class="form-control" cols="10" rows="10" id="inDiagnosa" name="inDiagnosa"></textarea>
                  <span class="help-block text-danger"></span>
                </div>
              </div>
            </div> -->












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
          </div>
        </div>

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


  <style>
    canvas {
      cursor: crosshair;
      border: 1px solid #000000;
    }
  </style>

  <script type="text/javascript">
    $(document).ready(function(e) {
      id_pelayanan = $('#inPel').val();
      reload_data_id_pel(id_pelayanan);
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      let today = new Date();
      let day = String(today.getDate()).padStart(2, '0');
      let month = String(today.getMonth() + 1).padStart(2, '0'); // January is 0
      let year = today.getFullYear();

      let todayFormatted = `${year}-${month}-${day}`;
      let dateInput = document.getElementById('inTgl');
      if (dateInput) {
        dateInput.value = todayFormatted;
      }
    });
  </script>


  <!-- <script src="<?= base_url(); ?>assets/dist/js/slider.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/range-slide.css"> -->


  <script type="text/javascript">
    function simpan() {
      console.log("Fungsi simpan dipanggil");
      var id_pelayanan = $('#inPel').val();
      var id_history = $('#inHis').val();
      var no_rm = $('#inNoRM').val();
      var jatuh = $('input[name="jatuh"]:checked').val();
      var sekunder = $('input[name="sekunder"]:checked').val();
      var bantu = $('input[name="bantu"]:checked').val();
      var infus = $('input[name="infus"]:checked').val();
      var berjalan = $('input[name="berjalan"]:checked').val();
      var mental = $('input[name="mental"]:checked').val();
      var skor_total = $('#inTotal').val();
      var diagnosa = $('#inDiagnosa').val() || 'testing ';
      var staff = $('#inStaff').val();
      var tipe_resiko = $('#tipeResikoHidden').val(); // Tipe resiko dari input hidden

      // Data untuk tabel resiko_ulang_jatuh_dewasa
      var observasi = $('input[name="observasi"]:checked').val();
      var pagar = $('input[name="pagar"]:checked').val();
      var posisi = $('input[name="posisi"]:checked').val();
      var edukasi = $('input[name="edukasi"]:checked').val();
      var monitor = $('input[name="monitor"]:checked').val();
      var kaoskaki = $('input[name="kaoskaki"]:checked').val();
      var lokasi_kamar_mandi = $('input[name="lokasi_kamar_mandi"]:checked').val();
      var orientasi_bertahap = $('input[name="orientasi_bertahap"]:checked').val();
      var tempat_bel = $('input[name="tempat_bel"]:checked').val();
      var bantuan_perawat = $('input[name="bantuan_perawat"]:checked').val();
      var lantai_licin = $('input[name="lantai_licin"]:checked').val();
      var aktivitas_sedang = $('input[name="aktivitas_sedang"]:checked').val();
      var pakai_gelang = $('input[name="pakai_gelang"]:checked').val();
      var pasang_gambar = $('input[name="pasang_gambar"]:checked').val();
      var tempat_tanda = $('input[name="tempat_tanda"]:checked').val();
      var obatan = $('input[name="obatan"]:checked').val();
      var alat_bantu = $('input[name="alat_bantu"]:checked').val();
      var partisipasi_keluarga = $('input[name="partisipasi_keluarga"]:checked').val();
      var aktivitas_tinggi = $('input[name="aktivitas_tinggi"]:checked').val();
      var ruangan_diagnostic = $('input[name="ruangan_diagnostic"]:checked').val();
      var penempatan_pasien = $('input[name="penempatan_pasien"]:checked').val();

      // Buat data string untuk dikirim
      var dataString = 'jatuh=' + jatuh + '&no_rm=' + no_rm + '&sekunder=' + sekunder + '&bantu=' + bantu +
        '&infus=' + infus + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
        '&berjalan=' + berjalan + '&mental=' + mental + '&skor_total=' + skor_total +
        '&diagnosa=' + diagnosa + '&staff=' + staff + '&tipe_resiko=' + tipe_resiko +
        // Tambahkan data untuk resiko_ulang_jatuh_dewasa
        '&observasi=' + observasi + '&pagar=' + pagar + '&posisi=' + posisi + '&edukasi=' + edukasi +
        '&monitor=' + monitor + '&kaoskaki=' + kaoskaki + '&lokasi_kamar_mandi=' + lokasi_kamar_mandi +
        '&orientasi_bertahap=' + orientasi_bertahap + '&tempat_bel=' + tempat_bel +
        '&bantuan_perawat=' + bantuan_perawat + '&lantai_licin=' + lantai_licin +
        '&aktivitas_sedang=' + aktivitas_sedang + '&pakai_gelang=' + pakai_gelang +
        '&pasang_gambar=' + pasang_gambar + '&tempat_tanda=' + tempat_tanda +
        '&obatan=' + obatan + '&alat_bantu=' + alat_bantu +
        '&partisipasi_keluarga=' + partisipasi_keluarga + '&aktivitas_tinggi=' + aktivitas_tinggi +
        '&ruangan_diagnostic=' + ruangan_diagnostic + '&penempatan_pasien=' + penempatan_pasien;

      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/insert_asesmen",
        method: "POST",
        dataType: 'json',
        data: dataString,
        success: function(data) {
          if (data.status == "success") {
            window.location.href = "<?php echo base_url('Erm_ranap_ulang_jatuh_dewasa/formulangjatuhdewasa/') ?>" + id_pelayanan + '/' + id_history;
          } else if (data.error) {
            // Menangani error form
            if (jatuh == "" || jatuh == null) $('#jatuh_error').html("*wajib diisi");
            if (sekunder == "" || sekunder == null) $('#sekunder_error').html("*wajib diisi");
            if (bantu == "" || bantu == null) $('#bantu_error').html("*wajib diisi");
            if (infus == "" || infus == null) $('#infus_error').html("*wajib diisi");
            if (berjalan == "" || berjalan == null) $('#berjalan_error').html("*wajib diisi");
            if (mental == "" || mental == null) $('#mental_error').html("*wajib diisi");
            if (skor_total == "" || skor_total == null) $('#inTotal').html("*Klik Untuk Memproses Skor");
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

  <!-- <script type="text/javascript">
    function simpan() {
      console.log("Fungsi simpan dipanggil");
      var id_pelayanan = $('#inPel').val();
      var id_history = $('#inHis').val();
      var no_rm = $('#inNoRM').val();
      var jatuh = $('input[name="jatuh"]:checked').val();
      var sekunder = $('input[name="sekunder"]:checked').val();
      var bantu = $('input[name="bantu"]:checked').val();
      var infus = $('input[name="infus"]:checked').val();
      var berjalan = $('input[name="berjalan"]:checked').val();
      var mental = $('input[name="mental"]:checked').val();
      var skor_total = $('#inTotal').val();
      var diagnosa = $('#inDiagnosa').val() || 'testing ';
      var staff = $('#inStaff').val();
      var tipe_resiko = $('#tipeResikoHidden').val();

      // Data untuk tabel resiko_ulang_jatuh_dewasa
      var observasi = $('input[name="observasi"]:checked').val();
      var pagar = $('input[name="pagar"]:checked').val();
      var posisi = $('input[name="posisi"]:checked').val();
      var edukasi = $('input[name="edukasi"]:checked').val();
      var monitor = $('input[name="monitor"]:checked').val();
      var kaoskaki = $('input[name="kaoskaki"]:checked').val();
      var lokasi_kamar_mandi = $('input[name="lokasi_kamar_mandi"]:checked').val();
      var orientasi_bertahap = $('input[name="orientasi_bertahap"]:checked').val();
      var tempat_bel = $('input[name="tempat_bel"]:checked').val();
      var bantuan_perawat = $('input[name="bantuan_perawat"]:checked').val();
      var lantai_licin = $('input[name="lantai_licin"]:checked').val();
      var aktivitas_sedang = $('input[name="aktivitas_sedang"]:checked').val();
      var pakai_gelang = $('input[name="pakai_gelang"]:checked').val();
      var pasang_gambar = $('input[name="pasang_gambar"]:checked').val();
      var tempat_tanda = $('input[name="tempat_tanda"]:checked').val();
      var obatan = $('input[name="obatan"]:checked').val();
      var alat_bantu = $('input[name="alat_bantu"]:checked').val();
      var partisipasi_keluarga = $('input[name="partisipasi_keluarga"]:checked').val();
      var aktivitas_tinggi = $('input[name="aktivitas_tinggi"]:checked').val();
      var ruangan_diagnostic = $('input[name="ruangan_diagnostic"]:checked').val();
      var penempatan_pasien = $('input[name="penempatan_pasien"]:checked').val();


      var dataString = 'jatuh=' + jatuh + '&no_rm=' + no_rm + '&sekunder=' + sekunder + '&bantu=' + bantu +
        '&infus=' + infus + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
        '&berjalan=' + berjalan + '&mental=' + mental + '&skor_total=' + skor_total +
        '&diagnosa=' + diagnosa + '&staff=' + staff + '&tipe_resiko=' + tipe_resiko +
        '&observasi=' + observasi + '&pagar=' + pagar + '&posisi=' + posisi + '&edukasi=' + edukasi +
        '&monitor=' + monitor + '&kaoskaki=' + kaoskaki + '&lokasi_kamar_mandi=' + lokasi_kamar_mandi +
        '&orientasi_bertahap=' + orientasi_bertahap + '&tempat_bel=' + tempat_bel +
        '&bantuan_perawat=' + bantuan_perawat + '&lantai_licin=' + lantai_licin +
        '&aktivitas_sedang=' + aktivitas_sedang + '&pakai_gelang=' + pakai_gelang +
        '&pasang_gambar=' + pasang_gambar + '&tempat_tanda=' + tempat_tanda +
        '&obatan=' + obatan + '&alat_bantu=' + alat_bantu +
        '&partisipasi_keluarga=' + partisipasi_keluarga + '&aktivitas_tinggi=' + aktivitas_tinggi +
        '&ruangan_diagnostic=' + ruangan_diagnostic + '&penempatan_pasien=' + penempatan_pasien;

      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/insert_asesmen",
        method: "POST",
        dataType: 'json',
        data: dataString,
        success: function(data) {
          if (data.status == "success") {
            window.location.href = "<?php echo base_url('Erm_ranap_ulang_jatuh_dewasa/formulangjatuhdewasa/') ?>" + id_pelayanan + '/' + id_history;
          } else if (data.error) {
            // Menangani error form
            if (jatuh == "" || jatuh == null) $('#jatuh_error').html("*wajib diisi");
            if (sekunder == "" || sekunder == null) $('#sekunder_error').html("*wajib diisi");
            if (bantu == "" || bantu == null) $('#bantu_error').html("*wajib diisi");
            if (infus == "" || infus == null) $('#infus_error').html("*wajib diisi");
            if (berjalan == "" || berjalan == null) $('#berjalan_error').html("*wajib diisi");
            if (mental == "" || mental == null) $('#mental_error').html("*wajib diisi");
            if (skor_total == "" || skor_total == null) $('#inTotal').html("*Klik Untuk Memproses Skor");
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
  </script> -->

  <!-- <script type="text/javascript">
    function simpan() {
      console.log("Fungsi simpan dipanggil");
      var id_pelayanan = $('#inPel').val();
      var id_history = $('#inHis').val();
      var no_rm = $('#inNoRM').val();
      var jatuh = $('input[name="jatuh"]:checked').val();
      var sekunder = $('input[name="sekunder"]:checked').val();
      var bantu = $('input[name="bantu"]:checked').val();
      var infus = $('input[name="infus"]:checked').val();
      var berjalan = $('input[name="berjalan"]:checked').val();
      var mental = $('input[name="mental"]:checked').val();
      var skor_total = $('#inTotal').val();
      var diagnosa = $('#inDiagnosa').val() || 'testing ';
      var staff = $('#inStaff').val();

      // Ambil tipe_resiko dari input tersembunyi
      var tipe_resiko = $('#tipeResikoHidden').val(); // Ambil tipe resiko yang disimpan di hidden field

      // Buat data string untuk dikirim
      var dataString = 'jatuh=' + jatuh + '&no_rm=' + no_rm + '&sekunder=' + sekunder + '&bantu=' + bantu +
        '&infus=' + infus + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
        '&berjalan=' + berjalan + '&mental=' + mental + '&skor_total=' + skor_total +
        '&diagnosa=' + diagnosa + '&staff=' + staff + '&tipe_resiko=' + tipe_resiko;

      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/insert_asesmen",
        method: "POST",
        dataType: 'json',
        data: dataString,
        success: function(data) {
          if (data.status == "success") {
            window.location.href = "<?php echo base_url('Erm_ranap_ulang_jatuh_dewasa/formulangjatuhdewasa/') ?>" + id_pelayanan + '/' + id_history;
          } else if (data.error) {
            // Menangani error form
            if (jatuh == "" || jatuh == null) $('#jatuh_error').html("*wajib diisi");
            if (sekunder == "" || sekunder == null) $('#sekunder_error').html("*wajib diisi");
            if (bantu == "" || bantu == null) $('#bantu_error').html("*wajib diisi");
            if (infus == "" || infus == null) $('#infus_error').html("*wajib diisi");
            if (berjalan == "" || berjalan == null) $('#berjalan_error').html("*wajib diisi");
            if (mental == "" || mental == null) $('#mental_error').html("*wajib diisi");
            if (skor_total == "" || skor_total == null) $('#inTotal').html("*Klik Untuk Memproses Skor");
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
  </script> -->

  <script type="text/javascript">
    function sumScore() {
      var score = 0,
        score1 = 0,
        score2 = 0,
        score3 = 0,
        score4 = 0,
        score5 = 0;

      // Logika perhitungan skor yang sama seperti sebelumnya
      if ($('#jatuh1').is(":checked")) score = 0;
      else if ($('#jatuh2').is(":checked")) score = 25;

      if ($('#sekunder1').is(":checked")) score1 = 0;
      else if ($('#sekunder2').is(":checked")) score1 = 15;

      if ($('#bantu1').is(":checked")) score2 = 0;
      else if ($('#bantu2').is(":checked")) score2 = 15;
      else if ($('#bantu3').is(":checked")) score2 = 30;

      if ($('#infus1').is(":checked")) score3 = 0;
      else if ($('#infus2').is(":checked")) score3 = 20;

      if ($('#berjalan1').is(":checked")) score4 = 0;
      else if ($('#berjalan2').is(":checked")) score4 = 10;
      else if ($('#berjalan3').is(":checked")) score4 = 20;

      if ($('#mental1').is(":checked")) score5 = 0;
      else if ($('#mental2').is(":checked")) score5 = 15;

      // Total skor
      var sum = score + score1 + score2 + score3 + score4 + score5;
      $('#inTotal').val(sum);

      // Penentuan tipe resiko berdasarkan skor
      var tipe_resiko = '';
      if (sum <= 24) {
        tipe_resiko = 'Rendah';
      } else if (sum <= 44) {
        tipe_resiko = 'Sedang';
      } else {
        tipe_resiko = 'Tinggi';
      }

      console.log('Total Score:', sum);
      console.log('Tipe Resiko:', tipe_resiko);

      // Simpan tipe_resiko ke variabel global atau input tersembunyi untuk diambil saat simpan
      $('#tipeResikoHidden').val(tipe_resiko); // Misalnya menggunakan input hidden

      // Logika menampilkan form berdasarkan tipe risiko
      let formToShow = [];
      if (sum <= 24) {
        formToShow.push('formResikoRendah');
      } else if (sum <= 44) {
        formToShow.push('formResikoRendah', 'formResikoSedang');
      } else {
        formToShow.push('formResikoRendah', 'formResikoSedang', 'formResikoTinggi');
      }
      $('.risk-form').hide();
      formToShow.forEach(function(form) {
        $('#' + form).show();
      });
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
          "url": '<?php echo base_url('Erm_ranap_ulang_jatuh_dewasa/tampil_list_per_pen_rujukan'); ?>',
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

    function hapus(id) { //utk hapus diagnosa pasien
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
        $().ready(function() {
          $.ajax({
            url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/hapus_catatan",
            method: "POST",
            dataType: 'json',
            data: {
              id: id,
            },
            success: function(data) {
              if (data.status == "success") {
                swal({
                  title: "good job!",
                  type: "success",
                  text: "Data Berhasil dihapus",
                  confirmButtonColor: "#3cb878",
                });
                $('#jatuh_ulang').DataTable().ajax.reload();
              } else {
                swal({
                  title: "Gagal!",
                  type: "warning",
                  confirmButtonColor: "#3cb878",
                });
              }
            }
          });
        });
      });
      return false;
    }

    function edit() {
      id = $("#id").val();
      id_pelayanan = $('#inPel').val();
      id_history = $('#inHis').val();
      no_rm = $('#inNoRM').val();
      jatuh = $('input[name="jatuh"]:checked').val();
      sekunder = $('input[name="sekunder"]:checked').val();
      bantu = $('input[name="bantu"]:checked').val();
      infus = $('input[name="infus"]:checked').val();
      berjalan = $('input[name="berjalan"]:checked').val();
      mental = $('input[name="mental"]:checked').val();
      skor_total = $('#inTotal').val();
      diagnosa = $('#inDiagnosa').val();
      staff = $('#inStaff').val();
      tipe_resiko = $('#tipeResikoHidden').val();

      observasi = $('input[name="observasi"]:checked').val();
      pagar = $('input[name="pagar"]:checked').val();
      posisi = $('input[name="posisi"]:checked').val();
      edukasi = $('input[name="edukasi"]:checked').val();
      monitor = $('input[name="monitor"]:checked').val();
      kaoskaki = $('input[name="kaoskaki"]:checked').val();
      lokasi_kamar_mandi = $('input[name="lokasi_kamar_mandi"]:checked').val();
      orientasi_bertahap = $('input[name="orientasi_bertahap"]:checked').val();
      tempat_bel = $('input[name="tempat_bel"]:checked').val();
      bantuan_perawat = $('input[name="bantuan_perawat"]:checked').val();
      lantai_licin = $('input[name="lantai_licin"]:checked').val();
      aktivitas_sedang = $('input[name="aktivitas_sedang"]:checked').val();
      pakai_gelang = $('input[name="pakai_gelang"]:checked').val();
      pasang_gambar = $('input[name="pasang_gambar"]:checked').val();
      tempat_tanda = $('input[name="tempat_tanda"]:checked').val();
      obatan = $('input[name="obatan"]:checked').val();
      alat_bantu = $('input[name="alat_bantu"]:checked').val();
      partisipasi_keluarga = $('input[name="partisipasi_keluarga"]:checked').val();
      aktivitas_tinggi = $('input[name="aktivitas_tinggi"]:checked').val();
      ruangan_diagnostic = $('input[name="ruangan_diagnostic"]:checked').val();
      penempatan_pasien = $('input[name="penempatan_pasien"]:checked').val();

      dataString = 'jatuh=' + jatuh + '&no_rm=' + no_rm + '&sekunder=' + sekunder + '&bantu=' + bantu +
        '&infus=' + infus + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
        '&berjalan=' + berjalan + '&mental=' + mental + '&skor_total=' + skor_total +
        '&diagnosa=' + diagnosa + '&staff=' + staff + '&tipe_resiko=' + tipe_resiko +
        // Tambahkan data untuk resiko_ulang_jatuh_dewasa
        '&observasi=' + observasi + '&pagar=' + pagar + '&posisi=' + posisi + '&edukasi=' + edukasi +
        '&monitor=' + monitor + '&kaoskaki=' + kaoskaki + '&lokasi_kamar_mandi=' + lokasi_kamar_mandi +
        '&orientasi_bertahap=' + orientasi_bertahap + '&tempat_bel=' + tempat_bel +
        '&bantuan_perawat=' + bantuan_perawat + '&lantai_licin=' + lantai_licin +
        '&aktivitas_sedang=' + aktivitas_sedang + '&pakai_gelang=' + pakai_gelang +
        '&pasang_gambar=' + pasang_gambar + '&tempat_tanda=' + tempat_tanda +
        '&obatan=' + obatan + '&alat_bantu=' + alat_bantu +
        '&partisipasi_keluarga=' + partisipasi_keluarga + '&aktivitas_tinggi=' + aktivitas_tinggi +
        '&ruangan_diagnostic=' + ruangan_diagnostic + '&penempatan_pasien=' + penempatan_pasien;

      // dataString = 'jatuh=' + jatuh + '&sekunder=' + sekunder + '&bantu=' + bantu + '&infus=' + infus + '&id_pelayanan=' + id_pelayanan + '&berjalan=' + berjalan + '&mental=' + mental + '&skor_total=' + skor_total + '&diagnosa=' + diagnosa +
      // '&observasi=' + observasi + '&pagar=' + pagar + '&posisi=' + posisi + '&edukasi=' + edukasi +
      //   '&monitor=' + monitor + '&kaoskaki=' + kaoskaki + '&lokasi_kamar_mandi=' + lokasi_kamar_mandi +
      //   '&orientasi_bertahap=' + orientasi_bertahap + '&tempat_bel=' + tempat_bel +
      //   '&bantuan_perawat=' + bantuan_perawat + '&lantai_licin=' + lantai_licin +
      //   '&aktivitas_sedang=' + aktivitas_sedang + '&pakai_gelang=' + pakai_gelang +
      //   '&pasang_gambar=' + pasang_gambar + '&tempat_tanda=' + tempat_tanda +
      //   '&obatan=' + obatan + '&alat_bantu=' + alat_bantu +
      //   '&partisipasi_keluarga=' + partisipasi_keluarga + '&aktivitas_tinggi=' + aktivitas_tinggi +
      //   '&ruangan_diagnostic=' + ruangan_diagnostic + '&penempatan_pasien=' + penempatan_pasien;


      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/update_asesmen",
        method: "POST",
        dataType: 'json',
        data: dataString,
        success: function(data) {
          if (data.status == "success") {
            window.location.href = "<?php echo base_url('Erm_ranap_ulang_jatuh_dewasa/formulangjatuhdewasa/') ?>" + id_pelayanan + '/' + id_history;
            //  id_pelayanan = $('#inPel').val();
            //  id_history = $('#inHis').val();
            //swal({
            // title: "Berhasil Update Data!",
            // type: "success",
            // text: data.status,
            // confirmButtonColor: "#3cb878",
            // });
            //  reload_data_id_pel(id_pelayanan);
            // window.location.href = "<?php echo base_url('Erm_ranap_ulang_jatuh_dewasa/formulangjatuhdewasa/') ?>" + id_pelayanan + '/' + id_history;
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
      // $('#id').val(id);
      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/get_ass_per",
        method: "POST",
        dataType: 'json',
        data: {
          id: id
        },
        success: function(data) {
          if (data.status_dt == "found") {
            // $('#inPel').val(data.id_asesmen);
            $('input[name="jatuh"][value="' + data.riwayat_jatuh + '"]').prop('checked', true);
            $('input[name="sekunder"][value="' + data.diagnosa_sekunder + '"]').prop('checked', true);
            $('input[name="bantu"][value="' + data.bantu + '"]').prop('checked', true);
            $('input[name="infus"][value="' + data.infus + '"]').prop('checked', true);
            $('input[name="berjalan"][value="' + data.gaya_jalan + '"]').prop('checked', true);
            $('input[name="mental"][value="' + data.status_mental + '"]').prop('checked', true);
            $('input[name="observasi"][value="' + data.observasi + '"]').prop('checked', true);
            $('input[name="pagar"][value="' + data.pagar + '"]').prop('checked', true);
            $('input[name="posisi"][value="' + data.posisi + '"]').prop('checked', true);
            $('input[name="edukasi"][value="' + data.edukasi + '"]').prop('checked', true);
            $('input[name="monitor"][value="' + data.monitor + '"]').prop('checked', true);
            $('input[name="kaoskaki"][value="' + data.kaoskaki + '"]').prop('checked', true);
            $('input[name="lokasi_kamar_mandi"][value="' + data.lokasi_kamar_mandi + '"]').prop('checked', true);
            $('input[name="orientasi_bertahap"][value="' + data.orientasi_bertahap + '"]').prop('checked', true);
            $('input[name="tempat_bel"][value="' + data.tempat_bel + '"]').prop('checked', true);
            $('input[name="bantuan_perawat"][value="' + data.bantuan_perawat + '"]').prop('checked', true);
            $('input[name="lantai_licin"][value="' + data.lantai_licin + '"]').prop('checked', true);
            $('input[name="aktivitas_sedang"][value="' + data.aktivitas_sedang + '"]').prop('checked', true);
            $('input[name="pakai_gelang"][value="' + data.pakai_gelang + '"]').prop('checked', true);
            $('input[name="pasang_gambar"][value="' + data.pasang_gambar + '"]').prop('checked', true);
            $('input[name="tempat_tanda"][value="' + data.tempat_tanda + '"]').prop('checked', true);
            $('input[name="obatan"][value="' + data.obatan + '"]').prop('checked', true);
            $('input[name="alat_bantu"][value="' + data.alat_bantu + '"]').prop('checked', true);
            $('input[name="partisipasi_keluarga"][value="' + data.partisipasi_keluarga + '"]').prop('checked', true);
            $('input[name="aktivitas_tinggi"][value="' + data.aktivitas_tinggi + '"]').prop('checked', true);
            $('input[name="ruangan_diagnostic"][value="' + data.ruangan_diagnostic + '"]').prop('checked', true);
            $('input[name="penempatan_pasien"][value="' + data.penempatan_pasien + '"]').prop('checked', true);
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
  </script>

  <<script>
 function pilihRanap(id) {
      // $('#id').val(id);
      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/get_ass_per_ranap",
        method: "POST",
        dataType: 'json',
        data: {
          id: id
        },


        success: function(data) {
          if (data.status_dt == "found") {
            const { umur, jenis_kelamin, diagnosis, gangguan, faktor, anestesi } = data;


            const total =
                (+umur || 0) +
                (+jenis_kelamin || 0) +
                (+diagnosis || 0) +
                (+gangguan || 0) +
                (+faktor || 0) +
                (+anestesi || 0);
              const map = {
              jatuh: data.umur,
              sekunder: data.jenis_kelamin,
              bantu: data.diagnosis,
              infus: data.gangguan,
              berjalan: data.faktor,
              mental: data.anestesi
            };


            $('#edit').attr('onclick', 'editRanap()');


          // 2️⃣ Loop tiap pasangan name:value
            $.each(map, function(name, value) {
              // Pastikan value tidak undefined/null
              if (value !== undefined && value !== null && value !== 'undefined') {
                // Coba check radio dengan value yang sesuai
                $(`input[name="${name}"][id="${name+value}"]`).prop('checked', true);
              }
            });


            // smooth scroll
            window.scrollTo({
              top: 0,
              behavior: 'smooth'
            });


            $('#inTotal').val(total);
            $('#edit').show();
            $('#cetak').show();
            $('#simpan').hide();




            //  const skorMap = {
            //   // Jatuh
            //   "jatuh0": 0,
            //   "jatuh25": 25,


            //   // Sekunder
            //   "sekunder0": 0,
            //   "sekunder15": 15,


            //   // Bantu
            //   "bantu0": 0,
            //   "bantu15": 15,
            //   "bantu30": 30,


            //   // Infus
            //   "infus0": 0,
            //   "infus20": 20,


            //   // Berjalan
            //   "berjalan0": 0,
            //   "berjalan10": 10,
            //   "berjalan20": 20,


            //   // Mental
            //   "mental0": 0,
            //   "mental15": 15
            // };


            // // setiap kali ada radio berubah, update value-nya
            // $('input[type="radio"]').on('change', function() {
            //   const id = $(this).attr('id'); // contoh: "sekunder15"
            //   const skor = skorMap[id] || 0; // ambil skor dari mapping
            //   $(this).val(skor); // ubah value input jadi angka skor


            //   console.log('Input', $(this).attr('name'), 'sekarang bernilai:', skor);
            // });


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


    function editRanap() {
      let id = $("#id").val();
      let id_pelayanan = $('#inPel').val();
      let id_history = $('#inHis').val();
      let no_rm = $('#inNoRM').val();


      // Ambil semua nilai radio
      let jatuh = $('input[name="jatuh"]:checked').val() || "";
      let sekunder = $('input[name="sekunder"]:checked').val() || "";
      let bantu = $('input[name="bantu"]:checked').val() || "";
      let infus = $('input[name="infus"]:checked').val() || "";
      let berjalan = $('input[name="berjalan"]:checked').val() || "";
      let mental = $('input[name="mental"]:checked').val() || "";


      // ✅ Gunakan mapping objek (lebih cepat, mudah dibaca)
      const nilaiMap = {
        jatuh: { "Ya": 25, "Tidak": 0 },
        sekunder: { "Ya": 15, "Tidak": 0 },
        bantu: { "Tongkat": 15, "Kursi": 30, "Tidak Ada": 0 },
        infus: { "Ya": 20, "Tidak": 0 },
        berjalan: { "Lemah": 10, "Terganggu": 20, "Normal": 0 },
        mental: { "Pelupa": 15, "Menyadari": 0 }
      };


      // 🧠 Otomatis ubah semua berdasarkan mapping
      jatuh = nilaiMap.jatuh[jatuh] ?? 0;
      sekunder = nilaiMap.sekunder[sekunder] ?? 0;
      bantu = nilaiMap.bantu[bantu] ?? 0;
      infus = nilaiMap.infus[infus] ?? 0;
      berjalan = nilaiMap.berjalan[berjalan] ?? 0;
      mental = nilaiMap.mental[mental] ?? 0;


      const dataString = {
        id,
        id_pelayanan,
        id_history,
        no_rm,
        jatuh,
        sekunder,
        bantu,
        infus,
        berjalan,
        mental
      };


      console.log("Data dikirim:", dataString);


      $.ajax({
        url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/update_asesmen_ranap",
        method: "POST",
        dataType: 'json',
        data: dataString,
        success: function (data) {
          console.log("Berhasil:", data);
          location.reload();
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error:", error);
          swal({
            title: "Error!",
            text: "Terjadi kesalahan saat mengirim data.",
            icon: "error",
            confirmButtonColor: "#3cb878",
          });
        }
      });


      return false;
    }
 function sumScore() {
      var score = 0,
        score1 = 0,
        score2 = 0,
        score3 = 0,
        score4 = 0,
        score5 = 0;


      // Logika perhitungan skor yang sama seperti sebelumnya
      if ($('#jatuh0').is(":checked")) score = 0;
      else if ($('#jatuh25').is(":checked")) score = 25;


      if ($('#sekunder0').is(":checked")) score1 = 0;
      else if ($('#sekunder15').is(":checked")) score1 = 15;


      if ($('#bantu0').is(":checked")) score2 = 0;
      else if ($('#bantu15').is(":checked")) score2 = 15;
      else if ($('#bantu30').is(":checked")) score2 = 30;


      if ($('#infus0').is(":checked")) score3 = 0;
      else if ($('#infus20').is(":checked")) score3 = 20;


      if ($('#berjalan0').is(":checked")) score4 = 0;
      else if ($('#berjalan10').is(":checked")) score4 = 10;
      else if ($('#berjalan20').is(":checked")) score4 = 20;


      if ($('#mental0').is(":checked")) score5 = 0;
      else if ($('#mental15').is(":checked")) score5 = 15;


      // Total skor
      var sum = score + score1 + score2 + score3 + score4 + score5;
      $('#inTotal').val(sum);


      // Penentuan tipe resiko berdasarkan skor
      var tipe_resiko = '';
      if (sum <= 24) {
        tipe_resiko = 'Rendah';
      } else if (sum <= 44) {
        tipe_resiko = 'Sedang';m
      } else {
        tipe_resiko = 'Tinggi';
      }


      console.log('Total Score:', sum);
      console.log('Tipe Resiko:', tipe_resiko);


      // Simpan tipe_resiko ke variabel global atau input tersembunyi untuk diambil saat simpan
      $('#tipeResikoHidden').val(tipe_resiko); // Misalnya menggunakan input hidden


      // Logika menampilkan form berdasarkan tipe risiko
      let formToShow = [];
      if (sum <= 24) {
        formToShow.push('formResikoRendah');
      } else if (sum <= 44) {
        formToShow.push('formResikoRendah', 'formResikoSedang');
      } else {
        formToShow.push('formResikoRendah', 'formResikoSedang', 'formResikoTinggi');
      }
      $('.risk-form').hide();
      formToShow.forEach(function(form) {
        $('#' + form).show();
      });
    }



>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
  </script>