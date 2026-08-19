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
                <!-- <input type="text" disabled class="form-control" id="inTglLahir"> -->
                <input type="text" disabled class="form-control" value="<?= $tgl_lahir ?>" id="inTglLahir">
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
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Ruang Rawat<span class="help"></span></label>
                <input type="text" class="form-control" disabled id="inRawat">
                <!-- <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama"> -->
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
                    <input id="jatuh1" type="radio" name="jatuh" value="Tidak">
                    <label class="control-label" for="jatuh1">
                      Tidak(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="jatuh2" type="radio" name="jatuh" value="Ya">
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
                    <input id="sekunder1" type="radio" name="sekunder" value="Tidak">
                    <label class="control-label" for="sekunder1">
                      Tidak(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="sekunder2" type="radio" name="sekunder" value="Ya">
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
                    <input id="bantu1" type="radio" name="bantu" value="Tidak Ada">
                    <label class="control-label" for="bantu1">
                      Tidak Ada/Bedrest/Dibantu Perawat(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="bantu2" type="radio" name="bantu" value="Tongkat">
                    <label class="control-label" for="bantu2">
                      Kruk/Tongkat(15)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="bantu3" type="radio" name="bantu" value="Kursi">
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
                    <input id="infus1" type="radio" name="infus" value="Tidak">
                    <label class="control-label" for="infus1">
                      Tidak(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="infus2" type="radio" name="infus" value="Ya">
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
                    <input id="berjalan1" type="radio" name="berjalan" value="Normal">
                    <label class="control-label" for="berjalan1">
                      Normal/Bedrest/Kursi Roda(0)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="berjalan2" type="radio" name="berjalan" value="Lemah">
                    <label class="control-label" for="berjalan2">
                      Lemah(10)
                    </label>
                  </div>
                  <div class="radio-button radio-button-primary">
                    <input id="berjalan3" type="radio" name="berjalan" value="Terganggu">
                    <label class="control-label" for="berjalan3">
                      Terganggu(20)
                    </label>
                  </div>
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
                  <input id="mental1" type="radio" name="mental" value="Menyadari">
                  <label class="control-label" for="mental1">
                    Menyadari Kemampuan(0)
                  </label>
                </div>
                <div class="radio-button radio-button-primary">
                  <input id="mental2" type="radio" name="mental" value="Pelupa">
                  <label class="control-label" for="mental2">
                    Lupa akan keterbatasan/Pelupa(15)
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <button type="submit" class="btn btn-success mb-4" onclick="sumScore()">Skor Risiko</button>
              <div class="col-md-3">
                <input type="text" class="form-control" disabled id="inTotal">
              </div>
            </div>

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



            <div class="col-md-6">
              <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
              <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
              <button type="submit" class="btn btn-success mb-4" onclick="cetak()">Cetak</button>
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
      </div>
    </div>
    <script src="<?= base_url(); ?>assets/dist/js/slider.js"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/range-slide.css">
    <script type="text/javascript">
      $(document).ready(function() {
        id_pelayanan = $('#inPel').val();
        reload_data_id_pel(id_pelayanan);
        id_history = $('#inHis').val();
        $.ajax({
          url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/get_ass_per", // URL untuk AJAX
          method: "POST",
          dataType: 'json', // Format data yang dikembalikan adalah JSON
          data: {
            id: id_history // Kirimkan id_history ke server
          },
          success: function(data) {
            // Mengisi form dengan data asesmen
            $('#id').val(data.asesmen.id_asesmen); // Mengisi field id_asesmen
            $('#inDiagnosa').val(data.asesmen.diagnosa); // Mengisi field diagnosa
            $('#inTotal').val(data.asesmen.skor_total); // Mengisi field skor_total

            /*----------------------*/
            // Mengisi radio button dengan data dari asesmen
            $('input[name="jatuh"][value="' + data.asesmen.riwayat_jatuh + '"]').prop("checked", true);
            $('input[name="sekunder"][value="' + data.asesmen.diagnosa_sekunder + '"]').prop("checked", true);
            $('input[name="bantu"][value="' + data.asesmen.alat_bantu + '"]').prop("checked", true);
            $('input[name="infus"][value="' + data.asesmen.infus + '"]').prop("checked", true);
            $('input[name="berjalan"][value="' + data.asesmen.gaya_jalan + '"]').prop("checked", true);
            $('input[name="mental"][value="' + data.asesmen.status_mental + '"]').prop("checked", true);

            // Mengisi data resiko ke dalam form
            $('input[name="observasi"][value="' + data.resiko.observasi + '"]').prop("checked", true);
            $('input[name="pagar"][value="' + data.resiko.pagar + '"]').prop("checked", true);
            $('input[name="posisi"][value="' + data.resiko.posisi + '"]').prop("checked", true);
            $('input[name="edukasi"][value="' + data.resiko.edukasi + '"]').prop("checked", true);
            $('input[name="aktivitas_sedang"][value="' + data.resiko.aktivitas_sedang + '"]').prop("checked", true);
            $('input[name="aktivitas_tinggi"][value="' + data.resiko.aktivitas_tinggi + '"]').prop("checked", true);
            $('input[name="alat_bantu_resiko"][value="' + data.resiko.alat_bantu + '"]').prop("checked", true);
            $('input[name="bantuan_perawat"][value="' + data.resiko.bantuan_perawat + '"]').prop("checked", true);
            $('input[name="kaoskaki"][value="' + data.resiko.kaoskaki + '"]').prop("checked", true);
            $('input[name="lantai_licin"][value="' + data.resiko.lantai_licin + '"]').prop("checked", true);
            $('input[name="lokasi_kamar_mandi"][value="' + data.resiko.lokasi_kamar_mandi + '"]').prop("checked", true);
            $('input[name="monitor"][value="' + data.resiko.monitor + '"]').prop("checked", true);
            $('input[name="obatan"][value="' + data.resiko.obatan + '"]').prop("checked", true);
            $('input[name="orientasi_bertahap"][value="' + data.resiko.orientasi_bertahap + '"]').prop("checked", true);
            $('input[name="partisipasi_keluarga"][value="' + data.resiko.partisipasi_keluarga + '"]').prop("checked", true);
            $('input[name="pasang_gambar"][value="' + data.resiko.pasang_gambar + '"]').prop("checked", true);
            $('input[name="penempatan_pasien"][value="' + data.resiko.penempatan_pasien + '"]').prop("checked", true);
            $('input[name="ruangan_diagnostic"][value="' + data.resiko.ruangan_diagnostic + '"]').prop("checked", true);
            $('input[name="tempat_bel"][value="' + data.resiko.tempat_bel + '"]').prop("checked", true);
            $('input[name="tempat_tanda"][value="' + data.resiko.tempat_tanda + '"]').prop("checked", true);

            console.log('Tipe Resiko:', data.asesmen.tipe_resiko); // Tambahkan log ini
            var tipe_resiko = data.asesmen.tipe_resiko;
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

      // $(document).ready(function() {
      //   id_history = $('#inHis').val();
      //   $.ajax({
      //     url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/get_ass_per",
      //     method: "POST",
      //     dataType: 'json',
      //     data: {
      //       id: id_history
      //     },
      //     success: function(data) {
      //       $('#id').val(data.id_asesmen);
      //       $('#inDiagnosa').val(data.diagnosa);
      //       $('#inTotal').val(data.skor_total);
      //       /*----------------------*/
      //       $('input[name="jatuh"][value="' + data.riwayat_jatuh + '"]').prop("checked", true);
      //       $('input[name="sekunder"][value="' + data.diagnosa_sekunder + '"]').prop("checked", true);
      //       $('input[name="bantu"][value="' + data.alat_bantu + '"]').prop("checked", true);
      //       $('input[name="infus"][value="' + data.infus + '"]').prop("checked", true);
      //       $('input[name="berjalan"][value="' + data.gaya_jalan + '"]').prop("checked", true);
      //       $('input[name="mental"][value="' + data.status_mental + '"]').prop("checked", true);
      //     }
      //   });
      // });

      function cetak() {
        id = $('#id').val();
        window.location.href = "<?php echo base_url('Erm_ranap/print_ulang_dewasa/') ?>" + id;
      }
    </script>
    <script type="text/javascript">
      function simpan() {
        id = $('#id').val();
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
          url: "<?php echo base_url() ?>Erm_ranap_ulang_jatuh_dewasa/update_asesmen",
          method: "POST",
          dataType: 'json',
          data: dataString,
          success: function(data) {
            if (data.status == "success") {
              window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" + '<?= urlencode(base64_encode($id_pelayanan)) ?>' + '/' + '<?= urlencode(base64_encode($id_history)) ?>';
            } else if (data.error) {
              if (jatuh == "" || jatuh == null) {
                $('#jatuh_error').html("*wajib diisi");
              }
              if (sekunder == "" || sekunder == null) {
                $('#sekunder_error').html("*wajib diisi");
              }
              if (bantu == "" || bantu == null) {
                $('#bantu_error').html("*wajib diisi");
              }
              if (infus == "" || infus == null) {
                $('#infus_error').html("*wajib diisi");
              }
              if (berjalan == "" || berjalan == null) {
                $('#berjalan_error').html("*wajib diisi");
              }
              if (mental == "" || mental == null) {
                $('#mental_error').html("*wajib diisi");
              }
              if (skor_total == "" || skor_total == null) {
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
    </script>
    <script type="text/javascript">
      function sumScore() {
        var score = null;
        var score1 = null;
        var score2 = null;
        var score3 = null;
        var score4 = null;
        var score5 = null;
        var score6 = null;
        if ($('#jatuh1').is(":checked")) {
          score = 0;
        } else if ($('#jatuh2').is(":checked")) {
          score = 25;
        }
        if ($('#sekunder1').is(":checked")) {
          score1 = 0;
        } else if ($('#sekunder2').is(":checked")) {
          score1 = 15;
        }
        if ($('#bantu1').is(":checked")) {
          score2 = 0;
        } else if ($('#bantu2').is(":checked")) {
          score2 = 15;
        } else if ($('#bantu3').is(":checked")) {
          score2 = 30;
        }
        if ($('#infus1').is(":checked")) {
          score3 = 0;
        } else if ($('#infus2').is(":checked")) {
          score3 = 20;
        }
        if ($('#berjalan1').is(":checked")) {
          score4 = 0;
        } else if ($('#berjalan2').is(":checked")) {
          score4 = 10;
        } else if ($('#berjalan3').is(":checked")) {
          score4 = 20;
        }
        if ($('#mental1').is(":checked")) {
          score5 = 0;
        } else if ($('#mental2').is(":checked")) {
          score5 = 15;
        }
        sum = Number(score) + Number(score1) + Number(score2) + Number(score3) + Number(score4) + Number(score5);
        $('#inTotal').val(sum);
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
    </script>