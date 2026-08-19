<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">RENCANA ASUHAN KEPERAWATAN</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in" id="myDiv">
        <div class="panel-body">
          <div class="form-wrap">

            <div class="form-group">
              <form id="formUpload">
                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
                <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
                <input type="hidden" class="form-control" value="" id="id" name="id">
                <input type="hidden" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>">
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Nama Pasien<span class="help"></span></label>
                    <div class="has-success">
                      <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                      <input type="text" class="form-control" id="inNama" value="<?= $nama ?>" disabled>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">No RM</label><span class="help"></span></label>
                    <div class="has-success">
                      <!-- <input type="text" class="form-control" name="inNoRM" id="inNoRM" disabled> -->
                      <input type="text" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>" disabled>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Umur / Jenis Kelamin<span class="help"></span></label>
                    <div class="has-success">
                      <!-- <input type="text" class="form-control" id="umur" disabled>  -->
                      <input type="text" class="form-control" id="diagnosis"
                        value="<?php
                                $tanggal = new DateTime($tgl_lahir);
                                $today = new DateTime();
                                $y = $today->diff($tanggal)->y;
                                echo $y . " tahun, " . $jenis_kelamin; ?>" disabled>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Tanggal<span class="help"></span></label>
                    <span id="tanggal_error" class="text-danger"></span>
                    <div class="has-success">
                      <input type="date" class="form-control" id="inTgl" name="tanggal">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="form-group" >
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Masalah Keperawatan</label><span class="help"></span>
                    <div class="has-success">
                      <input type="text" class="form-control" name="inIdMasalahKep" id="inIdMasalahKep"
                        value="<?= $id_masalah_kep_display ?>" readonly>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

              

                <script>
                  document.addEventListener("DOMContentLoaded", function() {
                    var today = new Date();
                    var day = String(today.getDate()).padStart(2, '0');
                    var month = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                    var year = today.getFullYear();
                    var todayDate = year + '-' + month + '-' + day;
                    document.getElementById('inTgl').value = todayDate;
                  });
                </script>

                <div class="clearfix"></div>


                <?php if (!empty($id_masalah_kep)): ?>
                  <?php foreach ($id_masalah_kep as $index => $id_masalah): ?>
                    <h3><?= $nama_masalah_kep[$index]; ?></h3>


                    <input type="hidden" name="id_masalah_kep" value="<?= $id_masalah; ?>">

                    <?php if ($id_masalah == 1): ?>
                      <div class="form-group">
                        <label class="control-label">Standar Diagnosa Keperawatan Indonesia</label><br>
                        <label class="control-label">Ansietas berhubungan dengan krisis situasional, ancaman terhadap konsep diri bukti dengan :</label>

                        <div class="checkbox">
                          <input type="checkbox" name="gejala[]" value="bingung">
                          <label class="control-label" for="bingung">Merasa bingung</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="gejala[]" value="khawatir">
                          <label class="control-label" for="khawatir">Merasa khawatir dengan akibat kondisi yang dihadapi (takut menghadapi operasi)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="gejala[]" value="gelisah">
                          <label class="control-label" for="gelisah">Tampak gelisah</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="gejala[]" value="tegang">
                          <label class="control-label" for="tegang">Tampak tegang</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="gejala[]" value="tidur">
                          <label class="control-label" for="tidur">Sulit tidur</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="gejala[]" value="pusing">
                          <label class="control-label" for="pusing">Mengeluh pusing</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="gejala[]" value="tidak_berdaya">
                          <label class="control-label" for="tidak_berdaya">Merasa tidak berdaya</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="gejala[]" value="frekuensi_nafas">
                          <label class="control-label" for="frekuensi_nafas">Frekuensi nafas meningkat: <input type="text" name="input_frekuensi_nafas" class="form-control" placeholder="...x/mnt"></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="gejala[]" value="frekuensi_nadi">
                          <label class="control-label" for="frekuensi_nadi">Frekuensi nadi meningkat: <input type="text" name="input_frekuensi_nadi" class="form-control" placeholder="...x/mnt"></label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="gejala[]" value="tekanan_darah">
                          <label class="control-label" for="tekanan_darah">Tekanan Darah meningkat: <input type="text" name="input_tekanan_darah" class="form-control" placeholder=".../....mmHg"></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Setelah dilakukan intervensi keperawatan, tingkat ansietas menurun dengan kriteria hasil:</label><br>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="checkbox">
                              <input type="checkbox" name="hasil_ansietas[]" value="gelisah_tegang_menurun" id="hasil_gelisah_tegang_menurun">
                              <label class="control-label" for="hasil_gelisah_tegang_menurun">Perilaku gelisah dan tegang menurun</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_ansietas[]" value="khawatir_menurun" id="hasil_khawatir_menurun">
                              <label class="control-label" for="hasil_khawatir_menurun">Verbalisasi khawatir akibat kondisi yang dihadapi menurun</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_ansietas[]" value="konsentrasi_membaik" id="hasil_konsentrasi_membaik">
                              <label class="control-label" for="hasil_konsentrasi_membaik">Konsentrasi membaik</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_ansietas[]" value="pola_tidur_membaik" id="hasil_pola_tidur_membaik">
                              <label class="control-label" for="hasil_pola_tidur_membaik">Pola tidur membaik</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">a. Reduksi Ansietas</label><br>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="checkbox">
                              <input type="checkbox" name="reduction_ansietas[]" value="monitor_tanda_ansietas" id="monitor_tanda_ansietas">
                              <label class="control-label" for="monitor_tanda_ansietas">Monitor tanda-tanda ansietas (verbal dan nonverbal)</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="reduction_ansietas[]" value="temani_pasien" id="temani_pasien">
                              <label class="control-label" for="temani_pasien">Temani pasien untuk mengurangi kecemasan, jika memungkinkan</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="reduction_ansietas[]" value="dengarkan_keluhan" id="dengarkan_keluhan">
                              <label class="control-label" for="dengarkan_keluhan">Dengarkan keluhan pasien penuh perhatian</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="reduction_ansietas[]" value="pendekatan_tenang" id="pendekatan_tenang">
                              <label class="control-label" for="pendekatan_tenang">Gunakan pendekatan yang tenang dan meyakinkan</label>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="checkbox">
                              <input type="checkbox" name="reduction_ansietas[]" value="diskusikan_rencana" id="diskusikan_rencana">
                              <label class="control-label" for="diskusikan_rencana">Diskusikan perecanaan realistis tentang peristiwa yang akan datang</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="reduction_ansietas[]" value="jelaskan_prosedur" id="jelaskan_prosedur">
                              <label class="control-label" for="jelaskan_prosedur">Jelaskan prosedur yang akan dilakukan, termasuk sensasi yang mungkin dialami</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="reduction_ansietas[]" value="anjurkan_ungkapkan" id="anjurkan_ungkapkan">
                              <label class="control-label" for="anjurkan_ungkapkan">Anjurkan mengungkapkan perasaan dan persepsi</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="reduction_ansietas[]" value="latih_teknik_relaksasi" id="latih_teknik_relaksasi">
                              <label class="control-label" for="latih_teknik_relaksasi">Latih teknik relaksasi seperti napas dalam, dan imajinasi terpimpin</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">b. Dukungan Pelaksanaan Ibadah</label><br>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="checkbox">
                              <input type="checkbox" name="dukungan_ibadah[]" value="identifikasi_kebutuhan_ibadah" id="identifikasi_kebutuhan_ibadah">
                              <label class="control-label" for="identifikasi_kebutuhan_ibadah">Identifikasi kebutuhan pelaksanaan ibadah sesuai agama yang dianut</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="dukungan_ibadah[]" value="fasilitasi_ibadah" id="fasilitasi_ibadah">
                              <label class="control-label" for="fasilitasi_ibadah">Fasilitasi pelaksanaan ibadah sesuai agama yang dianut (misal menghadap kiblat, menyiapkan peralatan ibadah)</label>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="checkbox">
                              <input type="checkbox" name="dukungan_ibadah[]" value="anjurkan_ibadah" id="anjurkan_ibadah">
                              <label class="control-label" for="anjurkan_ibadah">Anjurkan pasien untuk beribadah sesuai dengan agama yang dianut</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="dukungan_ibadah[]" value="fasilitasi_konsultasi_agama" id="fasilitasi_konsultasi_agama">
                              <label class="control-label" for="fasilitasi_konsultasi_agama">Fasilitasi konsultasi dengan tokoh agama bila dibutuhkan</label>
                            </div>
                          </div>
                          </div>
                           <div class="form-group" style="margin-top:8px; max-width:400px;">
                        <label for="laiinnya_dukungan_ibadah" class="control-label">Lainnya</label>
                        <textarea id="laiinnya_dukungan_ibadah" 
                          name="laiinnya_dukungan_ibadah"
                          class="form-control"
                          rows="5"
                          style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                      </div>
                      </div>

                    <?php elseif ($id_masalah == 2): ?>
                      <div class="form-group">
                        <label class="control-label">Standar Diagnosa Keperawatan Indonesia</label><br>
                        <label class="control-label">Hipertermia berhubungan dengan Proses penyakit bukti dengan :</label>

                        <div class="checkbox">
                          <input id="suhu_tubuh" name="bukti_hipertermia[]" type="checkbox" value="suhu_tubuh">
                          <label class="control-label" for="suhu_tubuh">Suhu tubuh di atas nilai normal T: <input type="text" name="input_suhu_tubuh" class="form-control" placeholder="...°C"></label>
                        </div>

                        <div class="checkbox">
                          <input id="kulit_merah" name="bukti_hipertermia[]" type="checkbox" value="kulit_merah">
                          <label class="control-label" for="kulit_merah">Kulit merah</label>
                        </div>

                        <div class="checkbox">
                          <input id="kejang" name="bukti_hipertermia[]" type="checkbox" value="kejang">
                          <label class="control-label" for="kejang">Kejang</label>
                        </div>

                        <div class="checkbox">
                          <input id="takikardi" name="bukti_hipertermia[]" type="checkbox" value="takikardi">
                          <label class="control-label" for="takikardi">Takikardi</label>
                        </div>

                        <div class="checkbox">
                          <input id="takipnea" name="bukti_hipertermia[]" type="checkbox" value="takipnea">
                          <label class="control-label" for="takipnea">Takipnea</label>
                        </div>

                        <div class="checkbox">
                          <input id="kulit_hangat" name="bukti_hipertermia[]" type="checkbox" value="kulit_hangat">
                          <label class="control-label" for="kulit_hangat">Kulit terasa hangat</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Standar Luaran Keperawatan Indonesia</label><br>
                        <label class="control-label">Setelah dilakukan intervensi keperawatan selama 1 x 4 jam diharapkan Termoregulasi membaik dengan kriteria hasil:</label>

                        <div class="checkbox">
                          <input id="menggigil_menurun" name="hasil_hipertermia[]" type="checkbox" value="menggigil_menurun">
                          <label class="control-label" for="menggigil_menurun">Menggigil menurun</label>
                        </div>

                        <div class="checkbox">
                          <input id="kulit_merah_menurun" name="hasil_hipertermia[]" type="checkbox" value="kulit_merah_menurun">
                          <label class="control-label" for="kulit_merah_menurun">Kulit merah menurun</label>
                        </div>

                        <div class="checkbox">
                          <input id="kejang_menurun" name="hasil_hipertermia[]" type="checkbox" value="kejang_menurun">
                          <label class="control-label" for="kejang_menurun">Kejang menurun</label>
                        </div>

                        <div class="checkbox">
                          <input id="pucat_menurun" name="hasil_hipertermia[]" type="checkbox" value="pucat_menurun">
                          <label class="control-label" for="pucat_menurun">Pucat menurun</label>
                        </div>

                        <div class="checkbox">
                          <input id="takikardi_menurun" name="hasil_hipertermia[]" type="checkbox" value="takikardi_menurun">
                          <label class="control-label" for="takikardi_menurun">Takikardi menurun</label>
                        </div>

                        <div class="checkbox">
                          <input id="takipnea_menurun" name="hasil_hipertermia[]" type="checkbox" value="takipnea_menurun">
                          <label class="control-label" for="takipnea_menurun">Takipnea menurun</label>
                        </div>

                        <div class="checkbox">
                          <input id="suhu_tubuh_membaik" name="hasil_hipertermia[]" type="checkbox" value="suhu_tubuh_membaik">
                          <label class="control-label" for="suhu_tubuh_membaik">Suhu tubuh membaik</label>
                        </div>

                        <div class="checkbox">
                          <input id="suhu_kulit_membaik" name="hasil_hipertermia[]" type="checkbox" value="suhu_kulit_membaik">
                          <label class="control-label" for="suhu_kulit_membaik">Suhu kulit membaik</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Manajemen Hipertermia</label><br>

                        <div class="checkbox">
                          <input id="identifikasi_hipertermia" name="manajemen_hipertermia[]" type="checkbox" value="identifikasi_hipertermia">
                          <label class="control-label" for="identifikasi_hipertermia">Identifikasi penyebab hipertermia (mis. dehidrasi, terpapar lingkungan panas)</label>
                        </div>

                        <div class="checkbox">
                          <input id="monitor_suhu" name="manajemen_hipertermia[]" type="checkbox" value="monitor_suhu">
                          <label class="control-label" for="monitor_suhu">Monitor suhu tubuh</label>
                        </div>

                        <div class="checkbox">
                          <input id="monitor_elektrolit" name="manajemen_hipertermia[]" type="checkbox" value="monitor_elektrolit">
                          <label class="control-label" for="monitor_elektrolit">Monitor kadar elektrolit</label>
                        </div>

                        <div class="checkbox">
                          <input id="monitor_urine" name="manajemen_hipertermia[]" type="checkbox" value="monitor_urine">
                          <label class="control-label" for="monitor_urine">Monitor haluaran urine</label>
                        </div>

                        <div class="checkbox">
                          <input id="monitor_komplikasi" name="manajemen_hipertermia[]" type="checkbox" value="monitor_komplikasi">
                          <label class="control-label" for="monitor_komplikasi">Monitor komplikasi akibat hipertermia</label>
                        </div>

                        <div class="checkbox">
                          <input id="lingkungan_dingin" name="manajemen_hipertermia[]" type="checkbox" value="lingkungan_dingin">
                          <label class="control-label" for="lingkungan_dingin">Sediakan lingkungan yang dingin</label>
                        </div>

                        <div class="checkbox">
                          <input id="lepas_pakaian" name="manajemen_hipertermia[]" type="checkbox" value="lepas_pakaian">
                          <label class="control-label" for="lepas_pakaian">Longgarkan atau lepaskan pakaian</label>
                        </div>

                        <div class="checkbox">
                          <input id="basahi_kipasi" name="manajemen_hipertermia[]" type="checkbox" value="basahi_kipasi">
                          <label class="control-label" for="basahi_kipasi">Basahi dan kipasi permukaan tubuh</label>
                        </div>

                        <div class="checkbox">
                          <input id="berikan_cairan_oral" name="manajemen_hipertermia[]" type="checkbox" value="berikan_cairan_oral">
                          <label class="control-label" for="berikan_cairan_oral">Berikan cairan oral</label>
                        </div>

                        <div class="checkbox">
                          <input id="ganti_linen" name="manajemen_hipertermia[]" type="checkbox" value="ganti_linen">
                          <label class="control-label" for="ganti_linen">Ganti linen setiap hari atau lebih sering jika mengalami hyperhidrosis</label>
                        </div>

                        <div class="checkbox">
                          <input id="pendinginan_eksternal" name="manajemen_hipertermia[]" type="checkbox" value="pendinginan_eksternal">
                          <label class="control-label" for="pendinginan_eksternal">Lakukan pendinginan eksternal (mis. selimut hipotermia atau kompres dingin)</label>
                        </div>

                        <div class="form-group" style="margin-top:8px; max-width:400px;">
                        <label for="laiinnya_manajemen_hipertermia" class="control-label">Lainnya</label>
                        <textarea id="laiinnya_manajemen_hipertermia" 
                        name="laiinnya_manajemen_hipertermia"
                        class="form-control"
                        rows="5"
                        style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                      </div>
                      </div>


                    <?php elseif ($id_masalah == 3): ?>
                      <div class="form-group">
                        <label class="control-label">Standar Diagnosa Keperawatan Indonesia</label>
                        <label class="control-label">Faktor yang mungkin berkontribusi:</label><br>

                        <div class="checkbox">
                          <input name="faktor_nausea[]" type="checkbox" value="gangguan_biokimiawi">
                          <label class="control-label" for="faktor_gangguan_biokimiawi">Gangguan biokimiawi</label>
                        </div>

                        <div class="checkbox">
                          <input name="faktor_nausea[]" type="checkbox" value="gangguan_esophagus">
                          <label class="control-label" for="faktor_gangguan_esophagus">Gangguan pada esophagus</label>
                        </div>

                        <div class="checkbox">
                          <input name="faktor_nausea[]" type="checkbox" value="distensi_lambung">
                          <label class="control-label" for="faktor_distensi_lambung">Distensi lambung</label>
                        </div>

                        <div class="checkbox">
                          <input name="faktor_nausea[]" type="checkbox" value="iritasi_lambung">
                          <label class="control-label" for="faktor_iritasi_lambung">Iritasi lambung</label>
                        </div>

                        <div class="checkbox">
                          <input name="faktor_nausea[]" type="checkbox" value="gangguan_pancreas">
                          <label class="control-label" for="faktor_gangguan_pancreas">Gangguan pancreas</label>
                        </div>

                        <div class="checkbox">
                          <input name="faktor_nausea[]" type="checkbox" value="peningkatan_tekanan_intraabdominal">
                          <label class="control-label" for="faktor_peningkatan_tekanan_intraabdominal">Peningkatan tekanan intraabdominal (mis. Keganasan intraabdomen)</label>
                        </div>

                        <div class="checkbox">
                          <input name="faktor_nausea[]" type="checkbox" value="peningkatan_tekanan_intracranial">
                          <label class="control-label" for="faktor_peningkatan_tekanan_intracranial">Peningkatan tekanan intracranial</label>
                        </div>

                        <div class="checkbox">
                          <input name="faktor_nausea[]" type="checkbox" value="faktor_psikologis">
                          <label class="control-label" for="faktor_faktor_psikologis">Faktor psikologis (mis. Kecemasan, ketakutan, stress)</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Dibuktikan dengan:</label><br>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="checkbox">
                              <input type="checkbox" name="gejala_nausea[]" value="mual">
                              <label class="control-label" for="gejala_mual">Mengeluh mual</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="gejala_nausea[]" value="ingin_muntah">
                              <label class="control-label" for="gejala_ingin_muntah">Merasa ingin muntah</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="gejala_nausea[]" value="tidak_berminat_makan">
                              <label class="control-label" for="gejala_tidak_berminat_makan">Tidak berminat makan</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="gejala_nausea[]" value="asam_dimulut">
                              <label class="control-label" for="gejala_asam_dimulut">Merasa asam di mulut</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="gejala_nausea[]" value="sensasi_panas">
                              <label class="control-label" for="gejala_sensasi_panas">Sensasi panas</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="gejala_nausea[]" value="sensasi_dingin">
                              <label class="control-label" for="gejala_sensasi_dingin">Sensasi dingin</label>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="checkbox">
                              <input type="checkbox" name="gejala_nausea[]" value="saliva_meningkat">
                              <label class="control-label" for="gejala_saliva_meningkat">Saliva meningkat</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="gejala_nausea[]" value="pucat">
                              <label class="control-label" for="gejala_pucat">Pucat</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="gejala_nausea[]" value="diaforesis">
                              <label class="control-label" for="gejala_diaforesis">Diaforesis</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="gejala_nausea[]" value="takikardia">
                              <label class="control-label" for="gejala_takikardia">Takikardia</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="gejala_nausea[]" value="pupil_dilatasi">
                              <label class="control-label" for="gejala_pupil_dilatasi">Pupil dilatasi</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Setelah dilakukan intervensi keperawatan selama 1 x 24 jam diharapkan Tingkat Nausea menurun dengan kriteria hasil:</label><br>

                        <div class="checkbox">
                          <input name="kriteria_hasil_nausea[]" type="checkbox" value="perasaan_ingin_muntah">
                          <label class="control-label" for="perasaan_ingin_muntah">Perasaan ingin muntah menurun</label>
                        </div>

                        <div class="checkbox">
                          <input name="kriteria_hasil_nausea[]" type="checkbox" value="perasaan_asam_dimulut">
                          <label class="control-label" for="perasaan_asam_dimulut">Perasaan asam di mulut menurun</label>
                        </div>

                        <div class="checkbox">
                          <input name="kriteria_hasil_nausea[]" type="checkbox" value="sensasi_panas">
                          <label class="control-label" for="sensasi_panas">Sensasi panas menurun</label>
                        </div>

                        <div class="checkbox">
                          <input name="kriteria_hasil_nausea[]" type="checkbox" value="sensasi_dingin">
                          <label class="control-label" for="sensasi_dingin">Sensasi dingin menurun</label>
                        </div>

                        <div class="checkbox">
                          <input name="kriteria_hasil_nausea[]" type="checkbox" value="diaforesis">
                          <label class="control-label" for="diaforesis">Diaforesis menurun</label>
                        </div>

                        <div class="checkbox">
                          <input name="kriteria_hasil_nausea[]" type="checkbox" value="takikardia">
                          <label class="control-label" for="takikardia">Takikardia menurun</label>
                        </div>

                        <div class="checkbox">
                          <input name="kriteria_hasil_nausea[]" type="checkbox" value="pucat_membaik">
                          <label class="control-label" for="pucat_membaik">Pucat membaik</label>
                        </div>

                        <div class="checkbox">
                          <input name="kriteria_hasil_nausea[]" type="checkbox" value="dilatasi_pupil_membaik">
                          <label class="control-label" for="dilatasi_pupil_membaik">Dilatasi pupil membaik</label>
                        </div>

                        <div class="checkbox">
                          <input name="kriteria_hasil_nausea[]" type="checkbox" value="nafsu_makan_membaik">
                          <label class="control-label" for="nafsu_makan_membaik">Nafsu makan membaik</label>
                        </div>

                        <div class="checkbox">
                          <input name="kriteria_hasil_nausea[]" type="checkbox" value="jumlah_saliva_membaik">
                          <label class="control-label" for="jumlah_saliva_membaik">Jumlah saliva membaik</label>
                        </div>

                        <div class="checkbox">
                          <input name="kriteria_hasil_nausea[]" type="checkbox" value="frekuensi_menelan_membaik">
                          <label class="control-label" for="frekuensi_menelan_membaik">Frekuensi menelan membaik</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Manajemen Mual:</label><br>

                        <div class="checkbox">
                          <input name="manajemen_mual[]" type="checkbox" value="identifikasi_pengalaman_mual">
                          <label class="control-label" for="identifikasi_pengalaman_mual">Identifikasi pengalaman mual</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_mual[]" type="checkbox" value="identifikasi_isyarat_nonverbal">
                          <label class="control-label" for="identifikasi_isyarat_nonverbal">Identifikasi isyarat nonverbal ketidaknyamanan (mis. bayi, anak-anak dan mereka yang tidak dapat berkomunikasi secara efektif)</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_mual[]" type="checkbox" value="identifikasi_dampak_mual">
                          <label class="control-label" for="identifikasi_dampak_mual">Identifikasi dampak mual terhadap kualitas hidup (mis. Nafsu makan, aktivitas, kinerja, tanggung jawab peran dan tidur)</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_mual[]" type="checkbox" value="identifikasi_faktor_penyebab">
                          <label class="control-label" for="identifikasi_faktor_penyebab">Identifikasi faktor penyebab mual (mis. Pengobatan dan prosedur)</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_mual[]" type="checkbox" value="monitor_mual">
                          <label class="control-label" for="monitor_mual">Monitor mual (mis. Frekuensi, durasi dan tingkat keparahan)</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_mual[]" type="checkbox" value="monitor_asupan_nutrisi">
                          <label class="control-label" for="monitor_asupan_nutrisi">Monitor asupan nutrisi dan kalori</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_mual[]" type="checkbox" value="berikan_makanan_kecil">
                          <label class="control-label" for="berikan_makanan_kecil">Berikan makanan dalam jumlah kecil dan menarik</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_mual[]" type="checkbox" value="anjurkan_istirahat">
                          <label class="control-label" for="anjurkan_istirahat">Anjurkan istirahat dan tidur yang cukup</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_mual[]" type="checkbox" value="anjurkan_bersihkan_mulut">
                          <label class="control-label" for="anjurkan_bersihkan_mulut">Anjurkan sering membersihkan mulut, kecuali jika merangsang mual</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_mual[]" type="checkbox" value="anjurkan_makanan_tinggi_karbohidrat">
                          <label class="control-label" for="anjurkan_makanan_tinggi_karbohidrat">Anjurkan makanan tinggi karbohidrat dan rendah lemak</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_mual[]" type="checkbox" value="ajarkan_teknik_nonfarmakologis">
                          <label class="control-label" for="ajarkan_teknik_nonfarmakologis">Ajarkan penggunaan teknik nonfarmakologis untuk mengatasi mual (mis. biofeedback, hipnotis, relaksasi, terapi musik, akupresur)</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_mual[]" type="checkbox" value="kolaborasi_pemberian_antimietik">
                          <label class="control-label" for="kolaborasi_pemberian_antimietik">Kolaborasi pemberian antimietik, jika perlu</label>
                    </div>
                      </div>

                      <!-- Manajemen Muntah -->
                      <div class="form-group">
                        <label class="control-label">Manajemen Muntah:</label><br>

                        <div class="checkbox">
                          <input name="manajemen_muntah[]" type="checkbox" value="identifikasi_karakteristik_muntah">
                          <label class="control-label" for="identifikasi_karakteristik_muntah">Identifikasi karakteristik muntah (mis. warna, konsistensi, adanya darah, waktu, frekuensi dan durasi)</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_muntah[]" type="checkbox" value="periksa_volume_muntah">
                          <label class="control-label" for="periksa_volume_muntah">Periksa volume muntah</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_muntah[]" type="checkbox" value="identifikasi_riwayat_diet">
                          <label class="control-label" for="identifikasi_riwayat_diet">Identifikasi riwayat diet (mis. makanan yang disukai, dan budaya)</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_muntah[]" type="checkbox" value="identifikasi_faktor_penyebab_muntah">
                          <label class="control-label" for="identifikasi_faktor_penyebab_muntah">Identifikasi faktor penyebab muntah (mis. pengobatan dan prosedur)</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_muntah[]" type="checkbox" value="monitor_keseimbangan_cairan">
                          <label class="control-label" for="monitor_keseimbangan_cairan">Monitor keseimbangan cairan dan elektrolit</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_muntah[]" type="checkbox" value="anjurkan_memperbanyak_istirahat">
                          <label class="control-label" for="anjurkan_memperbanyak_istirahat">Anjurkan memperbanyak istirahat</label>
                        </div>

                        <div class="checkbox">
                          <input name="manajemen_muntah[]" type="checkbox" value="kolaborasi_pemberian_antimietik_muntah">
                          <label class="control-label" for="kolaborasi_pemberian_antimietik_muntah">Kolaborasi pemberian antimietik, jika perlu</label>
                        </div>

                         <div class="form-group" style="margin-top:8px; max-width:400px;">
                        <label for="laiinnya_manajemen_muntah" class="control-label">Lainnya</label>
                         <textarea id="laiinnya_manajemen_muntah" 
                          name="laiinnya_manajemen_muntah"
                          class="form-control"
                          rows="5"
                          style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                      </div>
                      </div>

                    <?php elseif ($id_masalah == 4): ?>
                      <div class="form-group">
                        <label class="control-label">Standar Diagnosa Keperawatan Indonesia</label>

                        <label class="control-label">Bersihan jalan nafas tidak efektif berhubungan dengan:</label><br>

                        <div class="checkbox">
                          <input id="hipersekresi_jalan_nafas" name="faktor_bersihan_jalan_nafas[]" type="checkbox" value="hipersekresi_jalan_nafas">
                          <label class="control-label" for="hipersekresi_jalan_nafas">Hipersekresi jalan nafas</label>
                        </div>

                        <div class="checkbox">
                          <input id="proses_infeksi" name="faktor_bersihan_jalan_nafas[]" type="checkbox" value="proses_infeksi">
                          <label class="control-label" for="proses_infeksi">Proses infeksi</label>
                        </div>

                        <br>

                        <label class="control-label">Dibuktikan dengan:</label><br>

                        <div class="checkbox">
                          <input id="batuk_tidak_efektif" name="gejala_bersihan_jalan_nafas[]" type="checkbox" value="batuk_tidak_efektif">
                          <label class="control-label" for="batuk_tidak_efektif">Batuk tidak efektif atau tidak mampu batuk</label>
                        </div>

                        <div class="checkbox">
                          <input id="sputum_berlebih" name="gejala_bersihan_jalan_nafas[]" type="checkbox" value="sputum_berlebih">
                          <label class="control-label" for="sputum_berlebih">Sputum berlebih/obstruksi di jalan nafas</label>
                        </div>

                        <div class="checkbox">
                          <input id="mengi_wheezing" name="gejala_bersihan_jalan_nafas[]" type="checkbox" value="mengi_wheezing">
                          <label class="control-label" for="mengi_wheezing">Mengi, wheezing dan/atau ronkhi kering</label>
                        </div>

                        <div class="checkbox">
                          <input id="dyspneu" name="gejala_bersihan_jalan_nafas[]" type="checkbox" value="dyspneu">
                          <label class="control-label" for="dyspneu">Dyspneu</label>
                        </div>

                        <div class="checkbox">
                          <input id="sulit_bicara" name="gejala_bersihan_jalan_nafas[]" type="checkbox" value="sulit_bicara">
                          <label class="control-label" for="sulit_bicara">Sulit bicara</label>
                        </div>

                        <div class="checkbox">
                          <input id="orthopnea" name="gejala_bersihan_jalan_nafas[]" type="checkbox" value="orthopnea">
                          <label class="control-label" for="orthopnea">Orthopnea</label>
                        </div>

                        <div class="checkbox">
                          <input id="gelisah" name="gejala_bersihan_jalan_nafas[]" type="checkbox" value="gelisah">
                          <label class="control-label" for="gelisah">Gelisah</label>
                        </div>

                        <div class="checkbox">
                          <input id="sianosis" name="gejala_bersihan_jalan_nafas[]" type="checkbox" value="sianosis">
                          <label class="control-label" for="sianosis">Sianosis</label>
                        </div>

                        <div class="checkbox">
                          <input id="bunyi_nafas_menurun" name="gejala_bersihan_jalan_nafas[]" type="checkbox" value="bunyi_nafas_menurun">
                          <label class="control-label" for="bunyi_nafas_menurun">Bunyi nafas menurun</label>
                        </div>

                        <div class="checkbox">
                          <input id="frekuensi_nafas_berubah" name="gejala_bersihan_jalan_nafas[]" type="checkbox" value="frekuensi_nafas_berubah">
                          <label class="control-label" for="frekuensi_nafas_berubah">Frekuensi nafas berubah</label>
                        </div>

                        <div class="checkbox">
                          <input id="pola_nafas_berubah" name="gejala_bersihan_jalan_nafas[]" type="checkbox" value="pola_nafas_berubah">
                          <label class="control-label" for="pola_nafas_berubah">Pola nafas berubah</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Standar Luaran Keperawatan Indonesia</label>
                        <br>
                        <label class="control-label">a. Setelah dilakukan intervensi keperawatan, bersihan jalan nafas meningkat dengan kriteria hasil:</label><br>

                        <div class="checkbox">
                          <input id="batuk_efektif_meningkat" name="kriteria_hasil_bersihan_jalan_nafas[]" type="checkbox" value="batuk_efektif_meningkat">
                          <label class="control-label" for="batuk_efektif_meningkat">Batuk efektif meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input id="sputum_menurun" name="kriteria_hasil_bersihan_jalan_nafas[]" type="checkbox" value="sputum_menurun">
                          <label class="control-label" for="sputum_menurun">Sputum menurun</label>
                        </div>

                        <div class="checkbox">
                          <input id="wheezing_menurun" name="kriteria_hasil_bersihan_jalan_nafas[]" type="checkbox" value="wheezing_menurun">
                          <label class="control-label" for="wheezing_menurun">Wheezing menurun</label>
                        </div>

                        <br>

                        <label class="control-label">b. Setelah dilakukan intervensi keperawatan, tingkat infeksi menurun dengan kriteria hasil:</label><br>

                        <div class="checkbox">
                          <input id="demam_menurun" name="kriteria_hasil_tingkat_infeksi[]" type="checkbox" value="demam_menurun">
                          <label class="control-label" for="demam_menurun">Demam menurun</label>
                        </div>

                        <div class="checkbox">
                          <input id="kadar_sel_darah_putih_membaik" name="kriteria_hasil_tingkat_infeksi[]" type="checkbox" value="kadar_sel_darah_putih_membaik">
                          <label class="control-label" for="kadar_sel_darah_putih_membaik">Kadar sel darah putih membaik</label>
                        </div>

                        <div class="checkbox">
                          <input id="kepatuhan_pencegahan_infeksi" name="kriteria_hasil_tingkat_infeksi[]" type="checkbox" value="kepatuhan_pencegahan_infeksi">
                          <label class="control-label" for="kepatuhan_pencegahan_infeksi">Kepatuhan pencegahan infeksi (hand hygiene, etika batuk) meningkat</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Standar Intervensi Keperawatan Indonesia</label>
                        <br>

                        <label class="control-label">a. Manajemen Jalan Nafas</label><br>

                        <div class="checkbox">
                          <input id="monitor_jalan_nafas" name="manajemen_jalan_nafas[]" type="checkbox" value="monitor_jalan_nafas">
                          <label class="control-label" for="monitor_jalan_nafas">Monitor jalan nafas (frekuensi, kedalaman, usaha nafas)</label>
                        </div>

                        <div class="checkbox">
                          <input id="monitor_sekret" name="manajemen_jalan_nafas[]" type="checkbox" value="monitor_sekret">
                          <label class="control-label" for="monitor_sekret">Monitor Sekret (jumlah, warna, bau, konsistensi)</label>
                        </div>

                        <div class="checkbox">
                          <input id="monitor_kemampuan_batuk" name="manajemen_jalan_nafas[]" type="checkbox" value="monitor_kemampuan_batuk">
                          <label class="control-label" for="monitor_kemampuan_batuk">Monitor kemampuan batuk efektif</label>
                        </div>

                        <div class="checkbox">
                          <input id="posisikan_semi_fowler" name="manajemen_jalan_nafas[]" type="checkbox" value="posisikan_semi_fowler">
                          <label class="control-label" for="posisikan_semi_fowler">Posisikan semi-fowler/ fowler</label>
                        </div>

                        <div class="checkbox">
                          <input id="berikan_minum_hangat" name="manajemen_jalan_nafas[]" type="checkbox" value="berikan_minum_hangat">
                          <label class="control-label" for="berikan_minum_hangat">Berikan minum hangat</label>
                        </div>

                        <div class="checkbox">
                          <input id="anjurkan_asupan_cairan" name="manajemen_jalan_nafas[]" type="checkbox" value="anjurkan_asupan_cairan">
                          <label class="control-label" for="anjurkan_asupan_cairan">Anjurkan asupan cairan 2000 ml/hari (jika tidak kontra indikasi)</label>
                        </div>

                        <div class="checkbox">
                          <input id="ajarkan_teknik_batuk" name="manajemen_jalan_nafas[]" type="checkbox" value="ajarkan_teknik_batuk">
                          <label class="control-label" for="ajarkan_teknik_batuk">Ajarkan teknik batuk efektif</label>
                        </div>

                        <div class="checkbox">
                          <input id="kolaborasi_bronkodilator" name="manajemen_jalan_nafas[]" type="checkbox" value="kolaborasi_bronkodilator">
                          <label class="control-label" for="kolaborasi_bronkodilator">Kolaborasi pemberian bronkodilator dan/ atau mukolitik, jika perlu</label>
                        </div>

                        <br>

                        <label class="control-label">b. Manajemen Isolasi</label><br>

                        <div class="checkbox">
                          <input id="identifikasi_pasien" name="manajemen_isolasi[]" type="checkbox" value="identifikasi_pasien">
                          <label class="control-label" for="identifikasi_pasien">Identifikasi pasien yang membutuhkan isolasi</label>
                        </div>

                        <div class="checkbox">
                          <input id="monitor_suhu_tubuh" name="manajemen_isolasi[]" type="checkbox" value="monitor_suhu_tubuh">
                          <label class="control-label" for="monitor_suhu_tubuh">Monitor suhu tubuh pasien</label>
                        </div>

                        <div class="checkbox">
                          <input id="monitor_efektivitas_pemberian_obat" name="manajemen_isolasi[]" type="checkbox" value="monitor_efektivitas_pemberian_obat">
                          <label class="control-label" for="monitor_efektivitas_pemberian_obat">Monitor efektifitas pemberian obat antimikroba</label>
                        </div>

                        <div class="checkbox">
                          <input id="tempatkan_satu_pasien" name="manajemen_isolasi[]" type="checkbox" value="tempatkan_satu_pasien">
                          <label class="control-label" for="tempatkan_satu_pasien">Tempatkan satu pasien untuk satu kamar</label>
                        </div>

                        <div class="checkbox">
                          <input id="dekontaminasi_alat" name="manajemen_isolasi[]" type="checkbox" value="dekontaminasi_alat">
                          <label class="control-label" for="dekontaminasi_alat">Dekontaminasi alat alat kesehatan sesegera mungkin setelah digunakan</label>
                        </div>

                        <div class="checkbox">
                          <input id="kebersihan_tangan" name="manajemen_isolasi[]" type="checkbox" value="kebersihan_tangan">
                          <label class="control-label" for="kebersihan_tangan">Lakukan kebersihan tangan pada 5 moment</label>
                        </div>

                        <div class="checkbox">
                          <input id="pasang_alat_proteksi_diri" name="manajemen_isolasi[]" type="checkbox" value="pasang_alat_proteksi_diri">
                          <label class="control-label" for="pasang_alat_proteksi_diri">Pasang alat proteksi diri sesuai SPO (mis. sarung tangan, masker N95, gown coverall, apron)</label>
                        </div>

                        <div class="checkbox">
                          <input id="lepaskan_alat_proteksi" name="manajemen_isolasi[]" type="checkbox" value="lepaskan_alat_proteksi">
                          <label class="control-label" for="lepaskan_alat_proteksi">Lepaskan alat proteksi diri segera setelah kontak dengan pasien</label>
                        </div>

                        <div class="checkbox">
                          <input id="pakaikan_masker" name="manajemen_isolasi[]" type="checkbox" value="pakaikan_masker">
                          <label class="control-label" for="pakaikan_masker">Pakaikan masker pada pasien</label>
                        </div>

                        <div class="checkbox">
                          <input id="minimalkan_kontak" name="manajemen_isolasi[]" type="checkbox" value="minimalkan_kontak">
                          <label class="control-label" for="minimalkan_kontak">Minimalkan kontak dengan pasien, sesuai kebutuhan</label>
                        </div>

                        <div class="checkbox">
                          <input id="pastikan_kamar" name="manajemen_isolasi[]" type="checkbox" value="pastikan_kamar">
                          <label class="control-label" for="pastikan_kamar">Pastikan kamar pasien selalu dalam kondisi bertekanan negatif</label>
                        </div>

                        <div class="checkbox">
                          <input id="tempatkan_linen" name="manajemen_isolasi[]" type="checkbox" value="tempatkan_linen">
                          <label class="control-label" for="tempatkan_linen">Tempatkan linen yang telah digunakan merawat pasien pada tempat infeksius</label>
                        </div>

                        <div class="checkbox">
                          <input id="anjurkan_membuang_sekresi" name="manajemen_isolasi[]" type="checkbox" value="anjurkan_membuang_sekresi">
                          <label class="control-label" for="anjurkan_membuang_sekresi">Anjurkan membuang sekresi/ ludah/ sputum pada kantong kuning yang disediakan</label>
                        </div>

                         <div class="form-group" style="margin-top:8px; max-width:400px;">
                        <label for="laiinnya_isolasi"class="control-label">Lainnya</label>
                        <textarea id="laiinnya_isolasi" 
                          name="laiinnya_isolasi"
                          class="form-control"
                          rows="5"
                          style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                      </div>
                      </div>

                    <?php elseif ($id_masalah == 5): ?>
                      <div class="form-group">
                        <label class="control-label">Standar Diagnosa Keperawatan Indonesia</label><br>
                        <label class="control-label">Nyeri Akut Berhubungan Dengan :</label>

                        <div class="checkbox">
                          <input id="agen_pencedera" name="gejala_nyeri_akut[]" type="checkbox" value="agen_pencedera">
                          <label class="control-label" for="agen_pencedera">Agen pencedera fisiologis (mis. Inflamasi, iskemia, neoplasma)</label>
                        </div>

                        <div class="checkbox">
                          <input id="mengeluh_nyeri" name="gejala_nyeri_akut[]" type="checkbox" value="mengeluh_nyeri">
                          <label class="control-label" for="mengeluh_nyeri">Mengeluh nyeri</label>
                        </div>

                        <div class="checkbox">
                          <input id="tampak_meringis" name="gejala_nyeri_akut[]" type="checkbox" value="tampak_meringis">
                          <label class="control-label" for="tampak_meringis">Tampak meringis</label>
                        </div>

                        <div class="checkbox">
                          <input id="bersikap_protektif" name="gejala_nyeri_akut[]" type="checkbox" value="bersikap_protektif">
                          <label class="control-label" for="bersikap_protektif">Bersikap protektif (mis. Waspada, posisi menghindari nyeri)</label>
                        </div>

                        <div class="checkbox">
                          <input id="gelisah" name="gejala_nyeri_akut[]" type="checkbox" value="gelisah">
                          <label class="control-label" for="gelisah">Gelisah</label>
                        </div>

                        <div class="checkbox">
                          <input id="frekuensi_nadi" name="gejala_nyeri_akut[]" type="checkbox" value="frekuensi_nadi">
                          <label class="control-label" for="frekuensi_nadi">Frekuensi nadi meningkat: <input type="text" name="input_frekuensi_nadi" class="form-control" placeholder="...x/mnt"></label>
                        </div>

                        <div class="checkbox">
                          <input id="sulit_tidur" name="gejala_nyeri_akut[]" type="checkbox" value="sulit_tidur">
                          <label class="control-label" for="sulit_tidur">Sulit Tidur</label>
                        </div>

                        <div class="checkbox">
                          <input id="td_meningkat" name="gejala_nyeri_akut[]" type="checkbox" value="td_meningkat">
                          <label class="control-label" for="td_meningkat">TD meningkat: <input type="text" name="input_tekanan_darah" class="form-control" placeholder=".../... mmHg"></label>
                        </div>

                        <div class="checkbox">
                          <input id="pola_nafas" name="gejala_nyeri_akut[]" type="checkbox" value="pola_nafas">
                          <label class="control-label" for="pola_nafas">Pola nafas berubah</label>
                        </div>

                        <div class="checkbox">
                          <input id="nafsu_makan" name="gejala_nyeri_akut[]" type="checkbox" value="nafsu_makan">
                          <label class="control-label" for="nafsu_makan">Nafsu makan berubah</label>
                        </div>

                        <div class="checkbox">
                          <input id="proses_berpikir" name="gejala_nyeri_akut[]" type="checkbox" value="proses_berpikir">
                          <label class="control-label" for="proses_berpikir">Proses berfikir terganggu</label>
                        </div>

                        <div class="checkbox">
                          <input id="menarik_diri" name="gejala_nyeri_akut[]" type="checkbox" value="menarik_diri">
                          <label class="control-label" for="menarik_diri">Menarik diri</label>
                        </div>

                        <div class="checkbox">
                          <input id="berfokus_diri" name="gejala_nyeri_akut[]" type="checkbox" value="berfokus_diri">
                          <label class="control-label" for="berfokus_diri">Berfokus pada diri sendiri</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Setelah dilakukan intervensi keperawatan selama 1 x 8 jam diharapkan Tingkat Nyeri menurun dengan kriteria hasil:</label><br>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="checkbox">
                              <input type="checkbox" name="hasil_nyeri[]" value="kemampuan_menuntaskan" id="hasil_kemampuan_menuntaskan">
                              <label class="control-label" for="hasil_kemampuan_menuntaskan">Kemampuan menuntaskan aktivitas meningkat</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_nyeri[]" value="keluhan_nyeri_menurun" id="hasil_keluhan_nyeri_menurun">
                              <label class="control-label" for="hasil_keluhan_nyeri_menurun">Keluhan nyeri menurun</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_nyeri[]" value="meringis_menurun" id="hasil_meringis_menurun">
                              <label class="control-label" for="hasil_meringis_menurun">Meringis menurun</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_nyeri[]" value="sikap_protektif_menurun" id="hasil_sikap_protektif_menurun">
                              <label class="control-label" for="hasil_sikap_protektif_menurun">Sikap protektif menurun</label>
                            </div>

                             <div class="form-group" style="margin-top:8px; max-width:400px;">
                        <label for="laiinnya_nyeri" class="control-label">Lainnya</label>
                        <textarea id="laiinnya_nyeri" 
                          name="laiinnya_nyeri"
                          class="form-control"
                          rows="5"
                          style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                      </div>
                          </div>

                          <div class="col-md-6">
                            <div class="checkbox">
                              <input type="checkbox" name="hasil_nyeri[]" value="gelisah_menurun" id="hasil_gelisah_menurun">
                              <label class="control-label" for="hasil_gelisah_menurun">Gelisah menurun</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_nyeri[]" value="kesulitan_tidur_menurun" id="hasil_kesulitan_tidur_menurun">
                              <label class="control-label" for="hasil_kesulitan_tidur_menurun">Kesulitan tidur menurun</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_nyeri[]" value="menarik_diri_menurun" id="hasil_menarik_diri_menurun">
                              <label class="control-label" for="hasil_menarik_diri_menurun">Menarik diri menurun</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_nyeri[]" value="berfokus_diri_menurun" id="hasil_berfokus_diri_menurun">
                              <label class="control-label" for="hasil_berfokus_diri_menurun">Berfokus pada diri sendiri menurun</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_nyeri[]" value="anoreksia_menurun" id="hasil_anoreksia_menurun">
                              <label class="control-label" for="hasil_anoreksia_menurun">Anoreksia menurun</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php elseif ($id_masalah == 6): ?>
                      <div class="form-group">
                        <label class="control-label">Diare Berhubungan Dengan :</label>

                        <div class="checkbox">
                          <input id="defekasi" name="gejala_diare[]" type="checkbox" value="defekasi">
                          <label class="control-label" for="defekasi">Frekuensi defekasi meningkat (lebih dari 3 kali/hari)</label>
                        </div>

                        <div class="checkbox">
                          <input id="konsistensi_feses" name="gejala_diare[]" type="checkbox" value="konsistensi_feses">
                          <label class="control-label" for="konsistensi_feses">Konsistensi feses cair atau lembek</label>
                        </div>

                        <div class="checkbox">
                          <input id="urgency" name="gejala_diare[]" type="checkbox" value="urgency">
                          <label class="control-label" for="urgency">Urgency (kebutuhan mendesak untuk berak)</label>
                        </div>

                        <div class="checkbox">
                          <input id="nyeri_abdomen" name="gejala_diare[]" type="checkbox" value="nyeri_abdomen">
                          <label class="control-label" for="nyeri_abdomen">Nyeri atau kram abdomen</label>
                        </div>

                        <div class="checkbox">
                          <input id="gelisah" name="gejala_diare[]" type="checkbox" value="gelisah">
                          <label class="control-label" for="gelisah">Gelisah</label>
                        </div>

                        <div class="checkbox">
                          <input id="dehidrasi" name="gejala_diare[]" type="checkbox" value="dehidrasi">
                          <label class="control-label" for="dehidrasi">Dehidrasi (tanda-tanda kekurangan cairan)</label>
                        </div>

                        <div class="checkbox">
                          <input id="nafsu_makan" name="gejala_diare[]" type="checkbox" value="nafsu_makan">
                          <label class="control-label" for="nafsu_makan">Nafsu makan berkurang</label>
                        </div>

                        <div class="checkbox">
                          <input id="proses_berpikir" name="gejala_diare[]" type="checkbox" value="proses_berpikir">
                          <label class="control-label" for="proses_berpikir">Proses berpikir terganggu</label>
                        </div>

                        <div class="checkbox">
                          <input id="berfokus_diri" name="gejala_diare[]" type="checkbox" value="berfokus_diri">
                          <label class="control-label" for="berfokus_diri">Berfokus pada diri sendiri</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Setelah dilakukan intervensi keperawatan selama 1 x 8 jam diharapkan Tingkat Diare menurun dengan kriteria hasil:</label><br>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="checkbox">
                              <input type="checkbox" name="hasil_diare[]" value="frekuensi_bab_membaik" id="hasil_frekuensi_bab_membaik">
                              <label class="control-label" for="hasil_frekuensi_bab_membaik">Frekuensi BAB menurun</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_diare[]" value="konsistensi_feses_membaik" id="hasil_konsistensi_feses_membaik">
                              <label class="control-label" for="hasil_konsistensi_feses_membaik">Konsistensi feses membaik</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_diare[]" value="tanda_dehidrasi_menurun" id="hasil_tanda_dehidrasi_menurun">
                              <label class="control-label" for="hasil_tanda_dehidrasi_menurun">Tanda-tanda dehidrasi menurun</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_diare[]" value="kemampuan_aktivitas_meningkat" id="hasil_kemampuan_aktivitas_meningkat">
                              <label class="control-label" for="hasil_kemampuan_aktivitas_meningkat">Kemampuan untuk beraktivitas meningkat</label>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="checkbox">
                              <input type="checkbox" name="hasil_diare[]" value="gelisah_menurun" id="hasil_gelisah_menurun">
                              <label class="control-label" for="hasil_gelisah_menurun">Gelisah menurun</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_diare[]" value="nafsu_makan_meningkat" id="hasil_nafsu_makan_meningkat">
                              <label class="control-label" for="hasil_nafsu_makan_meningkat">Nafsu makan meningkat</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_diare[]" value="proses_berpikir_membaik" id="hasil_proses_berpikir_membaik">
                              <label class="control-label" for="hasil_proses_berpikir_membaik">Proses berpikir membaik</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_diare[]" value="berfokus_diri_menurun" id="hasil_berfokus_diri_menurun">
                              <label class="control-label" for="hasil_berfokus_diri_menurun">Berfokus pada diri sendiri menurun</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Manajemen Diare</label>

                        <div class="checkbox">
                          <input id="identifikasi_penyebab" name="manajemen_diare[]" type="checkbox" value="identifikasi_penyebab">
                          <label class="control-label" for="identifikasi_penyebab">Identifikasi penyebab diare (mis. inflamasi gastrointestinal, iritasi gastro intestina proses infeksi, malabsorpsi, kecemasan, efek obat-obatan)</label>
                        </div>

                        <div class="checkbox">
                          <input id="riwayat_pemberian_makanan" name="manajemen_diare[]" type="checkbox" value="riwayat_pemberian_makanan">
                          <label class="control-label" for="riwayat_pemberian_makanan">Identifikasi riwayat pemberian makanan</label>
                        </div>

                        <div class="checkbox">
                          <input id="monitor_warna_volume" name="manajemen_diare[]" type="checkbox" value="monitor_warna_volume">
                          <label class="control-label" for="monitor_warna_volume">Monitor warna, volume, frekuensi, dan konsistensi tinja</label>
                        </div>

                        <div class="checkbox">
                          <input id="monitor_tanda_hipovolemia" name="manajemen_diare[]" type="checkbox" value="monitor_tanda_hipovolemia">
                          <label class="control-label" for="monitor_tanda_hipovolemia">Monitor tanda dan gejala hipovolemia</label>
                        </div>

                        <div class="checkbox">
                          <input id="monitor_iritasi_kulit" name="manajemen_diare[]" type="checkbox" value="monitor_iritasi_kulit">
                          <label class="control-label" for="monitor_iritasi_kulit">Monitor iritasi dan ulserasi kulit di daerah perinatal</label>
                        </div>

                        <div class="checkbox">
                          <input id="monitor_jumlah_pengeluaran" name="manajemen_diare[]" type="checkbox" value="monitor_jumlah_pengeluaran">
                          <label class="control-label" for="monitor_jumlah_pengeluaran">Monitor jumlah pengeluaran diare</label>
                        </div>

                        <div class="checkbox">
                          <input id="asupan_cairan_oral" name="manajemen_diare[]" type="checkbox" value="asupan_cairan_oral">
                          <label class="control-label" for="asupan_cairan_oral">Berikan asupan cairan oral</label>
                        </div>

                        <div class="checkbox">
                          <input id="cairan_intravena" name="manajemen_diare[]" type="checkbox" value="cairan_intravena">
                          <label class="control-label" for="cairan_intravena">Berikan cairan intravena (mis. ringer asetat, ringer laktat), jika perlu</label>
                        </div>

                        <div class="checkbox">
                          <input id="ambil_sampel_darah" name="manajemen_diare[]" type="checkbox" value="ambil_sampel_darah">
                          <label class="control-label" for="ambil_sampel_darah">Ambil sampel darah untuk pemeriksaan darah lengkap dan elektrolit</label>
                        </div>

                        <div class="checkbox">
                          <input id="ambil_sampel_feses" name="manajemen_diare[]" type="checkbox" value="ambil_sampel_feses">
                          <label class="control-label" for="ambil_sampel_feses">Ambil sampel feses untuk kultur, jika perlu</label>
                        </div>

                        <div class="checkbox">
                          <input id="anjurkan_makanan" name="manajemen_diare[]" type="checkbox" value="anjurkan_makanan">
                          <label class="control-label" for="anjurkan_makanan">Anjurkan makanan porsi kecil dan sering secara bertahap</label>
                        </div>

                        <div class="checkbox">
                          <input id="kolaborasi_obat" name="manajemen_diare[]" type="checkbox" value="kolaborasi_obat">
                          <label class="control-label" for="kolaborasi_obat">Kolaborasi pemberian obat anti diare</label>
                        </div>

                         <div class="form-group" style="margin-top:8px; max-width:400px;">
                        <label for="laiinnya_diare" class="control-label">Lainnya</label>
                        <textarea id="laiinnya_diare" 
                          name="laiinnya_diare"
                          class="form-control"
                          rows="5"
                          style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                      </div>
                      </div>

                    <?php elseif ($id_masalah == 7): ?>
                      <div class="form-group">
                        <label class="control-label">Gangguan Mobilitas Fisik (D.0054) Berhubungan dengan :</label>

                        <div class="checkbox">
                          <input id="malnutrisi" name="gejala_mobilitas[]" type="checkbox" value="malnutrisi">
                          <label class="control-label" for="malnutrisi">Malnutrisi</label>
                        </div>

                        <div class="checkbox">
                          <input id="gangguan_muskuloskeletal" name="gejala_mobilitas[]" type="checkbox" value="gangguan_muskuloskeletal">
                          <label class="control-label" for="gangguan_muskuloskeletal">Gangguan muskuloskeletal</label>
                        </div>

                        <div class="checkbox">
                          <input id="gangguan_neuromuskuler" name="gejala_mobilitas[]" type="checkbox" value="gangguan_neuromuskuler">
                          <label class="control-label" for="gangguan_neuromuskuler">Gangguan neuromuskuler</label>
                        </div>

                        <div class="checkbox">
                          <input id="program_pembatasan_gerak" name="gejala_mobilitas[]" type="checkbox" value="program_pembatasan_gerak">
                          <label class="control-label" for="program_pembatasan_gerak">Program pembatasan gerak</label>
                        </div>

                        <div class="checkbox">
                          <input id="nyeri" name="gejala_mobilitas[]" type="checkbox" value="nyeri">
                          <label class="control-label" for="nyeri">Nyeri</label>
                        </div>

                        <div class="checkbox">
                          <input id="kurang_terpapar_informasi" name="gejala_mobilitas[]" type="checkbox" value="kurang_terpapar_informasi">
                          <label class="control-label" for="kurang_terpapar_informasi">Kurang terpapar informasi tentang aktivitas fisik</label>
                        </div>

                        <div class="checkbox">
                          <input id="kecemasan" name="gejala_mobilitas[]" type="checkbox" value="kecemasan">
                          <label class="control-label" for="kecemasan">Kecemasan</label>
                        </div>

                        <div class="checkbox">
                          <input id="gangguan_kognitif" name="gejala_mobilitas[]" type="checkbox" value="gangguan_kognitif">
                          <label class="control-label" for="gangguan_kognitif">Gangguan kognitif</label>
                        </div>

                        <div class="checkbox">
                          <input id="keengganan_melakukan" name="gejala_mobilitas[]" type="checkbox" value="keengganan_melakukan">
                          <label class="control-label" for="keengganan_melakukan">Keengganan melakukan pergerakan</label>
                        </div>

                        <div class="checkbox">
                          <input id="gangguan_sensori" name="gejala_mobilitas[]" type="checkbox" value="gangguan_sensori">
                          <label class="control-label" for="gangguan_sensori">Gangguan sensori persepsi</label>
                        </div>

                        <label class="control-label">Dibuktikan dengan :</label>

                        <div class="checkbox">
                          <input id="sulit_menggerakkan" name="bukti_mobilitas[]" type="checkbox" value="sulit_menggerakkan">
                          <label class="control-label" for="sulit_menggerakkan">Mengeluh sulit menggerakkan ekstremitas</label>
                        </div>

                        <div class="checkbox">
                          <input id="kekuatan_otot" name="bukti_mobilitas[]" type="checkbox" value="kekuatan_otot">
                          <label class="control-label" for="kekuatan_otot">Kekuatan otot menurun</label>
                        </div>

                        <div class="checkbox">
                          <input id="rentang_gerak" name="bukti_mobilitas[]" type="checkbox" value="rentang_gerak">
                          <label class="control-label" for="rentang_gerak">Rentang gerak (ROM) menurun</label>
                        </div>

                        <div class="checkbox">
                          <input id="nyeri_saat_bergerak" name="bukti_mobilitas[]" type="checkbox" value="nyeri_saat_bergerak">
                          <label class="control-label" for="nyeri_saat_bergerak">Nyeri saat bergerak</label>
                        </div>

                        <div class="checkbox">
                          <input id="enggan_bergerak" name="bukti_mobilitas[]" type="checkbox" value="enggan_bergerak">
                          <label class="control-label" for="enggan_bergerak">Enggan melakukan pergerakan</label>
                        </div>

                        <div class="checkbox">
                          <input id="cemas_saat_bergerak" name="bukti_mobilitas[]" type="checkbox" value="cemas_saat_bergerak">
                          <label class="control-label" for="cemas_saat_bergerak">Merasa cemas saat bergerak</label>
                        </div>

                        <div class="checkbox">
                          <input id="sendi_kaku" name="bukti_mobilitas[]" type="checkbox" value="sendi_kaku">
                          <label class="control-label" for="sendi_kaku">Sendi kaku</label>
                        </div>

                        <div class="checkbox">
                          <input id="gerakan_tidak_terkoordinasi" name="bukti_mobilitas[]" type="checkbox" value="gerakan_tidak_terkoordinasi">
                          <label class="control-label" for="gerakan_tidak_terkoordinasi">Gerakan tidak terkoordinasi</label>
                        </div>

                        <div class="checkbox">
                          <input id="fisik_lemah" name="bukti_mobilitas[]" type="checkbox" value="fisik_lemah">
                          <label class="control-label" for="fisik_lemah">Fisik lemah</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Setelah dilakukan intervensi keperawatan selama 1 x 24 jam diharapkan Mobilitas fisik (L.05042) meningkat dengan kriteria hasil :</label>
                        <br>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="checkbox">
                              <input type="checkbox" name="hasil_mobilitas[]" value="pergerakan_ekstremitas_membaik" id="hasil_pergerakan_ekstremitas_membaik">
                              <label class="control-label" for="hasil_pergerakan_ekstremitas_membaik">Pergerakan ekstremitas membaik</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_mobilitas[]" value="kekuatan_otot_membaik" id="hasil_kekuatan_otot_membaik">
                              <label class="control-label" for="hasil_kekuatan_otot_membaik">Kekuatan otot membaik</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_mobilitas[]" value="rentang_gerak_membaik" id="hasil_rentang_gerak_membaik">
                              <label class="control-label" for="hasil_rentang_gerak_membaik">Rentang gerak (ROM) membaik</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_mobilitas[]" value="nyeri_menurun" id="hasil_nyeri_menurun">
                              <label class="control-label" for="hasil_nyeri_menurun">Nyeri menurun</label>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="checkbox">
                              <input type="checkbox" name="hasil_mobilitas[]" value="kecemasan_menurun" id="hasil_kecemasan_menurun">
                              <label class="control-label" for="hasil_kecemasan_menurun">Kecemasan menurun</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_mobilitas[]" value="enggan_melakukan_berkurang" id="hasil_enggan_melakukan_berkurang">
                              <label class="control-label" for="hasil_enggan_melakukan_berkurang">Enggan melakukan pergerakan berkurang</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_mobilitas[]" value="sendi_lentur" id="hasil_sendi_lentur">
                              <label class="control-label" for="hasil_sendi_lentur">Sendi lentur</label>
                            </div>

                            <div class="checkbox">
                              <input type="checkbox" name="hasil_mobilitas[]" value="gerakan_terkoordinasi" id="hasil_gerakan_terkoordinasi">
                              <label class="control-label" for="hasil_gerakan_terkoordinasi">Gerakan terkoordinasi</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Dukungan Mobilisasi (I.05173)</label>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_mobilisasi[]" value="identifikasi_nyeri" id="dukungan_identifikasi_nyeri">
                          <label class="control-label" for="dukungan_identifikasi_nyeri">Identifikasi adanya nyeri atau keluhan fisik lainnya</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_mobilisasi[]" value="identifikasi_toleransi" id="dukungan_identifikasi_toleransi">
                          <label class="control-label" for="dukungan_identifikasi_toleransi">Identifikasi toleransi fisik melakukan pergerakan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_mobilisasi[]" value="monitor_jantung" id="dukungan_monitor_jantung">
                          <label class="control-label" for="dukungan_monitor_jantung">Monitor frekuensi jantung dan tekanan darah sebelum memulai mobilisasi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_mobilisasi[]" value="monitor_kondisi" id="dukungan_monitor_kondisi">
                          <label class="control-label" for="dukungan_monitor_kondisi">Monitor kondisi umum selama melakukan mobilisasi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_mobilisasi[]" value="fasilitasi_alat" id="dukungan_fasilitasi_alat">
                          <label class="control-label" for="dukungan_fasilitasi_alat">Fasilitasi aktivitas mobilisasi dengan alat bantu (mis. pagar tempat tidur)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_mobilisasi[]" value="fasilitasi_gerakan" id="dukungan_fasilitasi_gerakan">
                          <label class="control-label" for="dukungan_fasilitasi_gerakan">Fasilitasi melakukan gerakan jika perlu</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_mobilisasi[]" value="libatkan_keluarga" id="dukungan_libatkan_keluarga">
                          <label class="control-label" for="dukungan_libatkan_keluarga">Libatkan keluarga untuk membantu pasien dalam meningkatkan pergerakan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_mobilisasi[]" value="jelaskan_tujuan" id="dukungan_jelaskan_tujuan">
                          <label class="control-label" for="dukungan_jelaskan_tujuan">Jelaskan tujuan dan prosedur mobilisasi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_mobilisasi[]" value="anjurkan_mobilisasi" id="dukungan_anjurkan_mobilisasi">
                          <label class="control-label" for="dukungan_anjurkan_mobilisasi">Anjurkan melakukan mobilisasi dini</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_mobilisasi[]" value="ajarkan_mobilisasi" id="dukungan_ajarkan_mobilisasi">
                          <label class="control-label" for="dukungan_ajarkan_mobilisasi">Ajarkan mobilisasi sederhana yang harus dilakukan (mis. duduk di tempat tidur, duduk di sisi tempat tidur, pindah dari tempat tidur ke kursi)</label>
                        </div>

                        <div class="form-group" style="margin-top:8px; max-width:400px;">
                    <label for="laiinnya_mobilisasi" class="control-label">Lainnya</label>
                    <textarea id="laiinnya_mobilisasi" 
                      name="laiinnya_mobilisasi"
                      class="form-control"
                      rows="5"
                      style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                  </div>
                      </div>
                    <?php elseif ($id_masalah == 8): ?>
                      <div class="form-group">
                        <label class="control-label">Gangguan Penyapihan Ventilator Dibuktikan dengan:</label>

                        <div class="checkbox">
                          <input type="checkbox" name="gangguan_penyapihan[]" value="hipersekresi" id="gangguan_hipersekresi">
                          <label class="control-label" for="gangguan_hipersekresi">Hipersekresi jalan napas</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="gangguan_penyapihan[]" value="ketidakcukupan_energi" id="gangguan_ketidakcukupan_energi">
                          <label class="control-label" for="gangguan_ketidakcukupan_energi">Ketidakcukupan energi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="gangguan_penyapihan[]" value="hambatan_napas" id="gangguan_hambatan_napas">
                          <label class="control-label" for="gangguan_hambatan_napas">Hambatan upaya napas (mis. Nyeri saat bernapas, kelemahan otot pernapasan, efek sedasi)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="gangguan_penyapihan[]" value="riwayat_ketergantungan" id="gangguan_riwayat_ketergantungan">
                          <label class="control-label" for="gangguan_riwayat_ketergantungan">Riwayat ketergantungan ventilator &gt;4 hari</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Dibuktikan dengan:</label>

                        <div class="checkbox">
                          <input type="checkbox" name="buktikan_penyapihan[]" value="frekuensi_napas" id="buktikan_frekuensi_napas">
                          <label class="control-label" for="buktikan_frekuensi_napas">Frekuensi napas meningkat RR: ………x/mnt</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="buktikan_penyapihan[]" value="penggunaan_otot" id="buktikan_penggunaan_otot">
                          <label class="control-label" for="buktikan_penggunaan_otot">Penggunaan otot bantu napas</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="buktikan_penyapihan[]" value="napas_megap" id="buktikan_napas_megap">
                          <label class="control-label" for="buktikan_napas_megap">Napas megap-megap (gasping)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="buktikan_penyapihan[]" value="tidak_sinkron" id="buktikan_tidak_sinkron">
                          <label class="control-label" for="buktikan_tidak_sinkron">Upaya napas dan bantuan ventilator tidak sinkron</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="buktikan_penyapihan[]" value="napas_dangkal" id="buktikan_napas_dangkal">
                          <label class="control-label" for="buktikan_napas_dangkal">Napas dangkal</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="buktikan_penyapihan[]" value="warna_kulit_abnormal" id="buktikan_warna_kulit_abnormal">
                          <label class="control-label" for="buktikan_warna_kulit_abnormal">Warna kulit abnormal (mis. Pucat, sianosis)</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Setelah dilakukan intervensi keperawatan, penyapihan ventilator meningkat dengan kriteria hasil:</label>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penyapihan[]" value="kesinkronan" id="hasil_kesinkronan">
                          <label class="control-label" for="hasil_kesinkronan">Kesinkronan bantuan ventilator meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penyapihan[]" value="penggunaan_otot_menurun" id="hasil_penggunaan_otot_menurun">
                          <label class="control-label" for="hasil_penggunaan_otot_menurun">Penggunaan otot bantu napas menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penyapihan[]" value="napas_megap_menurun" id="hasil_napas_megap_menurun">
                          <label class="control-label" for="hasil_napas_megap_menurun">Napas megap-megap (gasping) menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penyapihan[]" value="napas_dangkal_menurun" id="hasil_napas_dangkal_menurun">
                          <label class="control-label" for="hasil_napas_dangkal_menurun">Napas dangkal menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penyapihan[]" value="lelah_menurun" id="hasil_lelah_menurun">
                          <label class="control-label" for="hasil_lelah_menurun">Lelah menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penyapihan[]" value="frekuensi_napas_membaik" id="hasil_frekuensi_napas_membaik">
                          <label class="control-label" for="hasil_frekuensi_napas_membaik">Frekuensi napas membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penyapihan[]" value="nilai_gas_darah" id="hasil_nilai_gas_darah">
                          <label class="control-label" for="hasil_nilai_gas_darah">Nilai gas darah arteri membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penyapihan[]" value="upaya_napas_membaik" id="hasil_upaya_napas_membaik">
                          <label class="control-label" for="hasil_upaya_napas_membaik">Upaya napas membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penyapihan[]" value="warna_kulit_membaik" id="hasil_warna_kulit_membaik">
                          <label class="control-label" for="hasil_warna_kulit_membaik">Warna kulit membaik</label>
                        </div>

                        <div class="form-group" style="margin-top:8px; max-width:400px;">
                        <label for="laiinnya_penyapihan" class="control-label">Lainnya</label>
                        <textarea id="laiinnya_penyapihan" 
                          name="laiinnya_penyapihan"
                          class="form-control"
                          rows="5"
                          style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                      </div>
                      </div>

                    <?php elseif ($id_masalah == 9): ?>
                      <div class="form-group">
                        <label><strong>Gangguan Pertukaran Gas</strong></label>
                        <p>Berhubungan dengan Perubahan Membran Alveolus-Kapiler Dibuktikan dengan:</p>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_pertukaran_gas[]" value="dyspnea" id="gangguan_dyspnea">
                          <label class="control-label" for="gangguan_dyspnea">Dyspnea</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_pertukaran_gas[]" value="pco2_meningkat" id="gangguan_pco2_meningkat">
                          <label class="control-label" for="gangguan_pco2_meningkat">PCO2 meningkat/menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_pertukaran_gas[]" value="takikardia" id="gangguan_takikardia">
                          <label class="control-label" for="gangguan_takikardia">Takikardia</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_pertukaran_gas[]" value="ph_meningkat" id="gangguan_ph_meningkat">
                          <label class="control-label" for="gangguan_ph_meningkat">pH arteri meningkat/menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_pertukaran_gas[]" value="bunyi_nafas_tambahan" id="gangguan_bunyi_nafas_tambahan">
                          <label class="control-label" for="gangguan_bunyi_nafas_tambahan">Bunyi nafas tambahan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_pertukaran_gas[]" value="pusing" id="gangguan_pusing">
                          <label class="control-label" for="gangguan_pusing">Pusing</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_pertukaran_gas[]" value="penglihatan_kabur" id="gangguan_penglihatan_kabur">
                          <label class="control-label" for="gangguan_penglihatan_kabur">Penglihatan kabur</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_pertukaran_gas[]" value="sianosis" id="gangguan_sianosis">
                          <label class="control-label" for="gangguan_sianosis">Sianosis</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_pertukaran_gas[]" value="diaforesis" id="gangguan_diaforesis">
                          <label class="control-label" for="gangguan_diaforesis">Diaforesis</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_pertukaran_gas[]" value="gelisah" id="gangguan_gelisah">
                          <label class="control-label" for="gangguan_gelisah">Gelisah</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_pertukaran_gas[]" value="nafas_cuping_hidung" id="gangguan_nafas_cuping_hidung">
                          <label class="control-label" for="gangguan_nafas_cuping_hidung">Nafas cuping hidung</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_pertukaran_gas[]" value="pola_nafas_abnormal" id="gangguan_pola_nafas_abnormal">
                          <label class="control-label" for="gangguan_pola_nafas_abnormal">Pola nafas abnormal (cepat/lambat, regular/irreguler, dalam/dangkal)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_pertukaran_gas[]" value="warna_kulit_abnormal" id="gangguan_warna_kulit_abnormal">
                          <label class="control-label" for="gangguan_warna_kulit_abnormal">Warna kulit abnormal (mis. pucat, kebiruan)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_pertukaran_gas[]" value="kesadaran_menurun" id="gangguan_kesadaran_menurun">
                          <label class="control-label" for="gangguan_kesadaran_menurun">Kesadaran menurun</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label><strong>Setelah dilakukan intervensi keperawatan, pertukaran gas meningkat dengan kriteria hasil:</strong></label>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_pertukaran_gas[]" value="dyspnea_menurun" id="hasil_dyspnea_menurun">
                          <label class="control-label" for="hasil_dyspnea_menurun">Dyspnea menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_pertukaran_gas[]" value="frekuensi_nafas" id="hasil_frekuensi_nafas">
                          <label class="control-label" for="hasil_frekuensi_nafas">Frekuensi nafas 12-20 kali/menit</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_pertukaran_gas[]" value="spO2" id="hasil_spO2">
                          <label class="control-label" for="hasil_spO2">SpO2 ≥90%</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_pertukaran_gas[]" value="sianosis_tidak_terjadi" id="hasil_sianosis_tidak_terjadi">
                          <label class="control-label" for="hasil_sianosis_tidak_terjadi">Sianosis tidak terjadi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_pertukaran_gas[]" value="ronkhi_menurun" id="hasil_ronkhi_menurun">
                          <label class="control-label" for="hasil_ronkhi_menurun">Ronkhi menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_pertukaran_gas[]" value="pemeriksaan_AGD_normal" id="hasil_pemeriksaan_AGD_normal">
                          <label class="control-label" for="hasil_pemeriksaan_AGD_normal">Pemeriksaan AGD dalam batas normal (PaO2 >80 mmHg, PaCO2 35-45 mmHg, pH 7.35-7.45)</label>
                        </div>

                        <div class="form-group" style="margin-top:8px; max-width:400px;">
                          <label for="laiinnya_pertukaran_gas" class="control-label">Lainnya</label>
                          <textarea id="laiinnya_pertukaran_gas" 
                            name="laiinnya_pertukaran_gas"
                            class="form-control"
                            rows="5"
                            style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                        </div>
                      </div>
                    <?php elseif ($id_masalah == 10): ?>
                      <div class="form-group">
                        <label><strong>Gangguan Pola Tidur</strong></label>
                        <p>Gangguan pola tidur Berhubungan dengan :</p>

                        <div class="checkbox">
                          <input type="checkbox" name="gangguan_poldur[]" id="hambatan_lingkungan" value="hambatan_lingkungan">
                          <label class="control-label" for="hambatan_lingkungan">
                            Hambatan lingkungan (mis. kelembapan lingkungan sekitar, suhu lingkungan, pencahayaan, kebisingan, bau tidak sedap, jadwal pemantauan/pemeriksaan/tindakan)
                          </label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="gangguan_poldur[]" id="kurangnya_kontrol_tidur" value="kurangnya_kontrol_tidur">
                          <label class="control-label" for="kurangnya_kontrol_tidur">Kurangnya kontrol tidur</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <p>Dibuktikan dengan :</p>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_poldur[]" id="sulit_tidur" value="sulit_tidur">
                          <label class="control-label" for="sulit_tidur">Mengeluh sulit tidur</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_poldur[]" id="sering_terjaga" value="sering_terjaga">
                          <label class="control-label" for="sering_terjaga">Mengeluh sering terjaga</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_poldur[]" id="tidak_puas_tidur" value="tidak_puas_tidur">
                          <label class="control-label" for="tidak_puas_tidur">Mengeluh tidak puas tidur</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_poldur[]" id="pola_tidur_berubah" value="pola_tidur_berubah">
                          <label class="control-label" for="pola_tidur_berubah">Mengeluh pola tidur berubah</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_poldur[]" id="istirahat_tidak_cukup" value="istirahat_tidak_cukup">
                          <label class="control-label" for="istirahat_tidak_cukup">Mengeluh istirahat tidak cukup</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_gangguan_poldur[]" id="aktifitas_menurun" value="aktifitas_menurun">
                          <label class="control-label" for="aktifitas_menurun">Mengeluh kemampuan beraktivitas menurun</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label><strong>Setelah dilakukan intervensi keperawatan selama 1 x 8 jam diharapkan pola tidur membaik dengan kriteria hasil :</strong></label>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_gangguan_poldur[]" id="keluhan_sulit_tidur" value="keluhan_sulit_tidur">
                          <label class="control-label" for="keluhan_sulit_tidur">Keluhan sulit tidur menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_gangguan_poldur[]" id="keluhan_sering_terjaga" value="keluhan_sering_terjaga">
                          <label class="control-label" for="keluhan_sering_terjaga">Keluhan sering terjaga menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_gangguan_poldur[]" id="keluhan_pola_tidur" value="keluhan_pola_tidur">
                          <label class="control-label" for="keluhan_pola_tidur">Keluhan pola tidur berubah menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_gangguan_poldur[]" id="istirahat_tidak_cukup_menurun" value="istirahat_tidak_cukup_menurun">
                          <label class="control-label" for="istirahat_tidak_cukup_menurun">Keluhan istirahat tidak cukup menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_gangguan_poldur[]" id="aktifitas_meningkat" value="aktifitas_meningkat">
                          <label class="control-label" for="aktifitas_meningkat">Kemampuan beraktivitas meningkat</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label><strong>Dukungan Tidur :</strong></label>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_poldur[]" id="pola_aktifitas" value="pola_aktifitas">
                          <label class="control-label" for="pola_aktifitas">Identifikasi pola aktivitas dan tidur</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_poldur[]" id="faktor_pengganggu" value="faktor_pengganggu">
                          <label class="control-label" for="faktor_pengganggu">Identifikasi faktor pengganggu tidur</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_poldur[]" id="makanan_minuman_pengganggu" value="makanan_minuman_pengganggu">
                          <label class="control-label" for="makanan_minuman_pengganggu">Identifikasi makanan dan minuman yang mengganggu tidur</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_poldur[]" id="obat_tidur" value="obat_tidur">
                          <label class="control-label" for="obat_tidur">Identifikasi obat tidur yang dikonsumsi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_poldur[]" id="jadwal_tidur_rutin" value="jadwal_tidur_rutin">
                          <label class="control-label" for="jadwal_tidur_rutin">Tetapkan jadwal tidur rutin</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_poldur[]" id="jadwal_pemberian_obat" value="jadwal_pemberian_obat">
                          <label class="control-label" for="jadwal_pemberian_obat">Sesuaikan jadwal pemberian obat dan tindakan untuk menunjang siklus tidur-terjaga</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_poldur[]" id="tidur_cukup" value="tidur_cukup">
                          <label class="control-label" for="tidur_cukup">Jelaskan pentingnya tidur cukup selama sakit</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_poldur[]" id="kebiasaan_waktu_tidur" value="kebiasaan_waktu_tidur">
                          <label class="control-label" for="kebiasaan_waktu_tidur">Anjurkan menepati kebiasaan waktu tidur</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_poldur[]" id="anjurkan_menghindari" value="anjurkan_menghindari">
                          <label class="control-label" for="anjurkan_menghindari">Anjurkan menghindari makanan/minuman yang mengganggu tidur</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="dukungan_poldur[]" id="relaksasi_otot" value="relaksasi_otot">
                          <label class="control-label" for="relaksasi_otot">Ajarkan relaksasi otot autogenik atau cara nonfarmakologi lainnya</label>
                        </div>

                        <div class="form-group" style="margin-top:8px; max-width:400px;">
                          <label for="laiinnya_poldur" class="control-label">Lainnya</label>
                          <textarea id="laiinnya_poldur" 
                            name="laiinnya_poldur"
                            class="form-control"
                            rows="5"
                            style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                        </div>
                      </div>


                    <?php elseif ($id_masalah == 11): ?>
                      <!-- Resiko Jatuh -->
                      <div class="form-group">
                        <label><strong>Resiko Jatuh</strong></label>
                        <p>Intoleransi aktivitas (D.0056) Berhubungan dengan :</p>

                        <div class="checkbox">
                          <input type="checkbox" name="resiko_jatuh[]" id="kebutuhan_oksigen" value="ketidakseimbangan_antara_suplai_dan_kebutuhan_oksigen">
                          <label class="control-label" for="kebutuhan_oksigen">ketidakseimbangan antara suplai dan kebutuhan oksigen</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="resiko_jatuh[]" id="tirah_baring" value="tirah_baring">
                          <label class="control-label" for="tirah_baring">Tirah baring</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="resiko_jatuh[]" id="kelemahan" value="kelemahan">
                          <label class="control-label" for="kelemahan">Kelemahan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="resiko_jatuh[]" id="imobilitas" value="imobilitas">
                          <label class="control-label" for="imobilitas">Imobilitas</label>
                        </div>
                      </div>

                      <!-- Bukti Resiko Jatuh -->
                      <div class="form-group">
                        <p>Ditandai dengan :</p>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_jatuh[]" id="mengeluh_lelah" value="mengeluh_lelah">
                          <label class="control-label" for="mengeluh_lelah">Mengeluh lelah</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_jatuh[]" id="frek_jantung_meningkat" value="frek_jantung_meningkat">
                          <label class="control-label" for="frek_jantung_meningkat">Frekuensi jantung meningkat >20% dari kondisi istirahat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_jatuh[]" id="dispnea" value="dispnea">
                          <label class="control-label" for="dispnea">Dispnea saat/ setelah aktivitas</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_jatuh[]" id="merasa_tidak_nyaman" value="merasa_tidak_nyaman">
                          <label class="control-label" for="merasa_tidak_nyaman">Merasa tidak nyaman setelah beraktivitas</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_jatuh[]" id="merasa_lemah" value="merasa_lemah">
                          <label class="control-label" for="merasa_lemah">Merasa lemah</label>
                        </div>
                      </div>

                      <!-- Minor Resiko Jatuh -->
                      <div class="form-group">
                        <label><strong>Minor (Objektif)</strong></label>

                        <div class="checkbox">
                          <input type="checkbox" name="minor_resiko_jatuh[]" id="tekanan_darah_berubah" value="tekanan_darah_berubah">
                          <label class="control-label" for="tekanan_darah_berubah">Tekanan darah berubah >20% dari kondisi istirahat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="minor_resiko_jatuh[]" id="gambaran_ekg" value="gambaran_ekg">
                          <label class="control-label" for="gambaran_ekg">Gambaran EKG menunjukkan iskemia</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="minor_resiko_jatuh[]" id="sianosis" value="sianosis">
                          <label class="control-label" for="sianosis">Sianosis</label>
                        </div>
                      </div>

                      <!-- Hasil Resiko Jatuh -->
                      <div class="form-group">
                        <label><strong>Setelah dilakukan intervensi keperawatan selama 1 x 8 jam diharapkan pola tidur membaik dengan kriteria hasil :</strong></label>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_jatuh[]" id="kemudahan_aktifitas" value="kemudahan_aktifitas">
                          <label class="control-label" for="kemudahan_aktifitas">Kemudahan dalam melakukan aktivitas sehari-hari meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_jatuh[]" id="dispnea_menurun" value="dispnea_menurun">
                          <label class="control-label" for="dispnea_menurun">Dispnea saat dan setelah aktivitas menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_jatuh[]" id="perasaan_lemah_menurun" value="perasaan_lemah_menurun">
                          <label class="control-label" for="perasaan_lemah_menurun">Perasaan lemah menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_jatuh[]" id="frek_napas_normal" value="frek_napas_normal">
                          <label class="control-label" for="frek_napas_normal">Frekuensi napas normal membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_jatuh[]" id="kemampuan_aktifitas_meningkat" value="kemampuan_aktifitas_meningkat">
                          <label class="control-label" for="kemampuan_aktifitas_meningkat">Kemampuan beraktivitas meningkat</label>
                        </div>
                      </div>

                      <!-- Manajemen Resiko Jatuh -->
                      <div class="form-group">
                        <label><strong>Manajemen Energi :</strong></label>

                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_resiko_jatuh[]" id="gangguan_fungsi_tubuh" value="gangguan_fungsi_tubuh">
                          <label class="control-label" for="gangguan_fungsi_tubuh">Identifikasi gangguan fungsi tubuh yang mengakibatkan kelemahan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_resiko_jatuh[]" id="kelelahan_fisik" value="kelelahan_fisik">
                          <label class="control-label" for="kelelahan_fisik">Monitor kelelahan fisik dan emosional</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_resiko_jatuh[]" id="monitor_pola" value="monitor_pola">
                          <label class="control-label" for="monitor_pola">Monitor pola dan jam tidur</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_resiko_jatuh[]" id="monitor_lokasi" value="monitor_lokasi">
                          <label class="control-label" for="monitor_lokasi">Monitor lokasi dan ketidaknyamanan selama melakukan aktivitas</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_resiko_jatuh[]" id="sediaan_lingkungan" value="sediaan_lingkungan">
                          <label class="control-label" for="sediaan_lingkungan">Sediakan lingkungan nyaman dan rendah stimulus</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_resiko_jatuh[]" id="aktivitas_distraksi" value="aktivitas_distraksi">
                          <label class="control-label" for="aktivitas_distraksi">Berikan aktivitas distraksi yang menenangkan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_resiko_jatuh[]" id="fasilitas_untuk_aktivas" value="fasilitas_untuk_aktivas">
                          <label class="control-label" for="fasilitas_untuk_aktivas">Beri fasilitas yang aman dalam melakukan aktivitas</label>
                        </div>

                         <div class="form-group" style="margin-top:8px; max-width:400px;">
                          <label for="laiinnya_jatuh" class="control-label">Lainnya</label>
                          <textarea id="laiinnya_jatuh" 
                            name="laiinnya_jatuh"
                            class="form-control"
                            rows="5"
                            style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                        </div>
                      </div>
                    <?php elseif ($id_masalah == 12): ?>
                      <div class="form-group">
                        <label><strong>Defisit Perawatan Diri</strong></label>
                        <p>Berhubungan dengan:</p>
                        <div class="checkbox">
                          <input type="checkbox" name="defisit_perawatan_diri[]" value="kelemahan" id="kelemahan">
                          <label class="control-label" for="kelemahan">Kelemahan</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="defisit_perawatan_diri[]" value="penurunan_motivasi" id="penurunan_motivasi">
                          <label class="control-label" for="penurunan_motivasi">Penurunan motivasi/minat</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <p>Dibuktikan dengan:</p>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_defisit_perawatan_diri[]" value="menolak_perawatan" id="menolak_perawatan">
                          <label class="control-label" for="menolak_perawatan">Menolak melakukan perawatan diri</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_defisit_perawatan_diri[]" value="tidak_mampu_mandi" id="tidak_mampu_mandi">
                          <label class="control-label" for="tidak_mampu_mandi">Tidak mampu mandi/mengenakan pakaian/makan/ke toilet/berhias secara mandiri</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_defisit_perawatan_diri[]" value="perawatan_diri_kurang" id="perawatan_diri_kurang">
                          <label class="control-label" for="perawatan_diri_kurang">Minat melakukan perawatan diri kurang</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label><strong>Setelah dilakukan intervensi keperawatan, perawatan diri meningkat dengan kriteria hasil:</strong></label>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_defisit_perawatan_diri[]" value="perawatan_diri_terpenuhi" id="perawatan_diri_terpenuhi">
                          <label class="control-label" for="perawatan_diri_terpenuhi">Perawatan diri (BAB/BAK, berpakaian, mandi, makan, minum) terpenuhi</label>
                        </div>

                         <div class="form-group" style="margin-top:8px; max-width:400px;">
                          <label for="laiinnya_perawatan_diri" class="control-label">Lainnya</label>
                          <textarea id="laiinnya_perawatan_diri" 
                            name="laiinnya_perawatan_diri"
                            class="form-control"
                            rows="5"
                            style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                        </div>
                      </div>

                    <?php elseif ($id_masalah == 13): ?>
                      <div class="form-group">
                        <label><strong>Hipovolemia</strong></label>
                        <p>Dibuktikan dengan :</p>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_hipovolemia[]" value="kehilangan_cairan" id="kehilangan_cairan">
                          <label class="control-label" for="kehilangan_cairan">Kehilangan cairan secara aktif</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_hipovolemia[]" value="gangguan_absorpsi" id="gangguan_absorpsi">
                          <label class="control-label" for="gangguan_absorpsi">Gangguan absorpsi cairan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_hipovolemia[]" value="usia_lanjut" id="usia_lanjut">
                          <label class="control-label" for="usia_lanjut">Usia lanjut</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_hipovolemia[]" value="kelebihan_bb" id="kelebihan_bb">
                          <label class="control-label" for="kelebihan_bb">Kelebihan berat badan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_hipovolemia[]" value="hipermetabolik" id="hipermetabolik">
                          <label class="control-label" for="hipermetabolik">Status hipermetabolik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_hipovolemia[]" value="gagal_mekanisme" id="gagal_mekanisme">
                          <label class="control-label" for="gagal_mekanisme">Kegagalan mekanisme regulasi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_hipovolemia[]" value="evaporasi" id="evaporasi">
                          <label class="control-label" for="evaporasi">Evaporasi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_hipovolemia[]" value="intake_cairan" id="intake_cairan">
                          <label class="control-label" for="intake_cairan">Kekurangan intake cairan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_hipovolemia[]" value="efek_agen" id="efek_agen">
                          <label class="control-label" for="efek_agen">Efek agen farmakologis</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <p>Setelah dilakukan intervensi keperawatan selama 3 x 24 jam diharapkan Status Cairan membaik dengan kriteria hasil :</p>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="kekuatan_nadi" id="kekuatan_nadi">
                          <label class="control-label" for="kekuatan_nadi">Kekuatan nadi meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="output_urine" id="output_urine">
                          <label class="control-label" for="output_urine">Output urine meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="membran_mukosa" id="membran_mukosa">
                          <label class="control-label" for="membran_mukosa">Membran mukosa lembab meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="pengisian_vena" id="pengisian_vena">
                          <label class="control-label" for="pengisian_vena">Pengisian vena meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="dispnea_menurun" id="dispnea_menurun">
                          <label class="control-label" for="dispnea_menurun">Dispnea menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="perasaan_lemah_menurun" id="perasaan_lemah_menurun">
                          <label class="control-label" for="perasaan_lemah_menurun">Perasaan lemah menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="rasa_haus_menurun" id="rasa_haus_menurun">
                          <label class="control-label" for="rasa_haus_menurun">Rasa haus menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="konsentrasi_menurun" id="konsentrasi_menurun">
                          <label class="control-label" for="konsentrasi_menurun">Konsentrasi urine menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="freq_nadi_membaik" id="freq_nadi_membaik">
                          <label class="control-label" for="freq_nadi_membaik">Frekuensi nadi membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="tekanan_darah_membaik" id="tekanan_darah_membaik">
                          <label class="control-label" for="tekanan_darah_membaik">Tekanan darah membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="tekanan_nadi_membaik" id="tekanan_nadi_membaik">
                          <label class="control-label" for="tekanan_nadi_membaik">Tekanan nadi membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="Turgor_kulit" id="Turgor_kulit">
                          <label class="control-label" for="Turgor_kulit">Turgor kulit membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="hb_membaik" id="hb_membaik">
                          <label class="control-label" for="hb_membaik">Hemoglobin membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="hematrokit_membaik" id="hematrokit_membaik">
                          <label class="control-label" for="hematrokit_membaik">Hematokrit membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="central_venous" id="central_venous">
                          <label class="control-label" for="central_venous">Central venous pressure membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="refluks_hepatojugular" id="refluks_hepatojugular">
                          <label class="control-label" for="refluks_hepatojugular">Refluks hepatojugular membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="hepatomegali" id="hepatomegali">
                          <label class="control-label" for="hepatomegali">Hepatomegali membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="oliguria" id="oliguria">
                          <label class="control-label" for="oliguria">Oliguria membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="intake" id="intake">
                          <label class="control-label" for="intake">Intake cairan membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_hipovolemia[]" value="suhu_tubuh_membaik" id="suhu_tubuh_membaik">
                          <label class="control-label" for="suhu_tubuh_membaik">Suhu tubuh membaik</label>
                        </div>

                        <div class="form-group" style="margin-top:8px; max-width:400px;">
                    <label for="laiinnya_hipovolemia" class="control-label">Lainnya</label>
                    <textarea id="laiinnya_hipovolemia" 
                      name="laiinnya_hipovolemia"
                      class="form-control"
                      rows="5"
                      style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                  </div>
                      </div>

                    <?php elseif ($id_masalah == 14): ?>
                      <div class="form-group">
                        <label><strong>Intoleransi Aktivitas</strong></label>
                        <p>Berhubungan dengan :</p>
                        <div class="checkbox">
                          <input type="checkbox" name="intoleransi_aktivitas[]" id="ketidakseimbangan_suplai" value="ketidakseimbangan_suplai">
                          <label class="control-label" for="ketidakseimbangan_suplai">Ketidakseimbangan antara suplai dan kebutuhan oksigen</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="intoleransi_aktivitas[]" id="tirah_baring_2" value="tirah_baring_2">
                          <label class="control-label" for="tirah_baring_2">Tirah baring</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="intoleransi_aktivitas[]" id="kelemahan_2" value="kelemahan_2">
                          <label class="control-label" for="kelemahan_2">Kelemahan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="intoleransi_aktivitas[]" id="imobilitas_2" value="imobilitas_2">
                          <label class="control-label" for="imobilitas_2">Imobilitas</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <p>Ditandai dengan :</p>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_intoleransi_aktivitas[]" id="mengeluh_lelah" value="mengeluh_lelah">
                          <label class="control-label" for="mengeluh_lelah">Mengeluh lelah</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_intoleransi_aktivitas[]" id="freq_jantung" value="freq_jantung">
                          <label class="control-label" for="freq_jantung">Frekuensi jantung meningkat >20% dari kondisi istirahat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_intoleransi_aktivitas[]" id="dispnea_aktivitas" value="dispnea_aktivitas">
                          <label class="control-label" for="dispnea_aktivitas">Dispnea saat/ setelah aktivitas</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_intoleransi_aktivitas[]" id="tidak_nyaman_beraktifitas" value="tidak_nyaman_beraktifitas">
                          <label class="control-label" for="tidak_nyaman_beraktifitas">Merasa tidak nyaman setelah beraktivitas</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_intoleransi_aktivitas[]" id="merasa_lemah_2" value="merasa_lemah_2">
                          <label class="control-label" for="merasa_lemah_2">Merasa lemah</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <p>Minor (Objektif)</p>
                        <div class="checkbox">
                          <input type="checkbox" name="minor_intoleransi_aktivitas[]" id="tekanan_darah_berubah" value="tekanan_darah_berubah">
                          <label class="control-label" for="tekanan_darah_berubah">Tekanan darah berubah >20% dari kondisi istirahat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="minor_intoleransi_aktivitas[]" id="gambaran_ekg_2" value="gambaran_ekg_2">
                          <label class="control-label" for="gambaran_ekg_2">Gambaran EKG menunjukkan iskemia</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="minor_intoleransi_aktivitas[]" id="sianosis_2" value="sianosis_2">
                          <label class="control-label" for="sianosis_2">Sianosis</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label><strong>Setelah dilakukan intervensi keperawatan selama 1 x 8 jam diharapkan toleransi aktivitas meningkat dengan kriteria hasil :</strong></label>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_intoleransi_aktivitas[]" id="kemudahan_aktifitas" value="kemudahan_aktifitas">
                          <label class="control-label" for="kemudahan_aktifitas">Kemudahan dalam melakukan aktivitas sehari- hari meningkat</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_intoleransi_aktivitas[]" id="dispnea_menurun" value="dispnea_menurun">
                          <label class="control-label" for="dispnea_menurun">Dispnea saat dan setelah aktivitas menurun</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_intoleransi_aktivitas[]" id="perasaan_lemah_menurun" value="perasaan_lemah_menurun">
                          <label class="control-label" for="perasaan_lemah_menurun">Perasaan lemah menurun</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_intoleransi_aktivitas[]" id="freq_napas_normal" value="freq_napas_normal">
                          <label class="control-label" for="freq_napas_normal">Frekuensi napas normal membaik</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <label><strong>Manajemen energi </strong></label>
                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_intoleransi_aktivitas[]" id="identifikasi_gangguan_fungsi" value="identifikasi_gangguan_fungsi">
                          <label class="control-label" for="identifikasi_gangguan_fungsi">Identifikasi gangguan fungsi tubuh yang mengakibatkan kelemahan</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_intoleransi_aktivitas[]" id="monitor_kelelahan_fisik" value="monitor_kelelahan_fisik">
                          <label class="control-label" for="monitor_kelelahan_fisik">Monitor kelelahan fisik dan emosional</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_intoleransi_aktivitas[]" id="monitor_pola_jam" value="monitor_pola_jam">
                          <label class="control-label" for="monitor_pola_jam">Monitor pola dan jam tidur</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_intoleransi_aktivitas[]" id="monitor_lokasi" value="monitor_lokasi">
                          <label class="control-label" for="monitor_lokasi">Monitor lokasi dan ketidaknyamanan selama melakukan aktivitas</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_intoleransi_aktivitas[]" id="lingkungan_nyaman" value="lingkungan_nyaman">
                          <label class="control-label" for="lingkungan_nyaman">Sediakan lingkungan nyaman dan rendah stimulus</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_intoleransi_aktivitas[]" id="aktivitas_distraksi" value="aktivitas_distraksi">
                          <label class="control-label" for="aktivitas_distraksi">Berikan aktivitas distraksi yang menenangkan</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_intoleransi_aktivitas[]" id="fasilitas_tempat_tidur" value="fasilitas_tempat_tidur">
                          <label class="control-label" for="fasilitas_tempat_tidur">Fasilitasi duduk di sisi tempat tidur</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_intoleransi_aktivitas[]" id="anjuran_tirah_baring" value="anjuran_tirah_baring">
                          <label class="control-label" for="anjuran_tirah_baring">Anjurkan tirah baring</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_intoleransi_aktivitas[]" id="aktivitas_bertahap" value="aktivitas_bertahap">
                          <label class="control-label" for="aktivitas_bertahap">Anjurkan melakukan aktivitas secara bertahap</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="manajemen_intoleransi_aktivitas[]" id="anjuran_hubungi_perawat" value="anjuran_hubungi_perawat">
                          <label class="control-label" for="anjuran_hubungi_perawat">Anjurkan menghubungi perawat jika tanda dan gejala kelelahan tidak berkurang</label>
                        </div>

                         <div class="form-group" style="margin-top:8px; max-width:400px;">
                        <label for="laiinnya_aktivitas" class="control-label">Lainnya</label>
                        <textarea id="laiinnya_aktivitas" 
                          name="laiinnya_aktivitas"
                          class="form-control"
                          rows="5"
                          style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                      </div>
                      </div>


                    <?php elseif ($id_masalah == 15): ?>
                      <div class="form-group">
                        <label><strong>Penurunan Curah Jantung</strong></label>
                        <p>Berhubungan dengan :</p>
                        <div class="checkbox">
                          <input type="checkbox" name="curah_jantung[]" id="perubahan_irama" value="perubahan_irama">
                          <label class="control-label" for="perubahan_irama">Perubahan Irama Jantung</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <p>Dibuktikan dengan :</p>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_curah_jantung[]" id="palpitasi" value="palpitasi">
                          <label class="control-label" for="palpitasi">Palpitasi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_curah_jantung[]" id="bradikardia" value="bradikardia">
                          <label class="control-label" for="bradikardia">Bradikardia/takikardia</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_curah_jantung[]" id="ekg_aritma" value="ekg_aritma">
                          <label class="control-label" for="ekg_aritma">Gambaran EKG aritmia atau gangguan konduksi</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <label><strong>Setelah dilakukan intervensi keperawatan selama 1 x 24 jam diharapkan Curah Jantung Meningkat (D.02008) dengan kriteria hasil :</strong></label>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_curah_jantung[]" id="kekuatan_nadi" value="kekuatan_nadi">
                          <label class="control-label" for="kekuatan_nadi">Kekuatan nadi perifer meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_curah_jantung[]" id="palpitasi_menurun" value="palpitasi_menurun">
                          <label class="control-label" for="palpitasi_menurun">Palpitasi menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_curah_jantung[]" id="bradikardia_menurun" value="bradikardia_menurun">
                          <label class="control-label" for="bradikardia_menurun">Bradikardia menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_curah_jantung[]" id="takikardia_menurun" value="takikardia_menurun">
                          <label class="control-label" for="takikardia_menurun">Takikardia menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_curah_jantung[]" id="ekg_aritma_menurun" value="ekg_aritma_menurun">
                          <label class="control-label" for="ekg_aritma_menurun">Gambaran EKG aritmia menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_curah_jantung[]" id="dispnea_menurun_2" value="dispnea_menurun_2">
                          <label class="control-label" for="dispnea_menurun_2">Dispnea menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_curah_jantung[]" id="oliguria_menurun_2" value="oliguria_menurun_2">
                          <label class="control-label" for="oliguria_menurun_2">Oliguria menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_curah_jantung[]" id="batuk_menurun" value="batuk_menurun">
                          <label class="control-label" for="batuk_menurun">Batuk menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_curah_jantung[]" id="tekanan_darah_membaik_2" value="tekanan_darah_membaik_2">
                          <label class="control-label" for="tekanan_darah_membaik_2">Tekanan Darah membaik</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label><strong>Perawatan Jantung</strong></label>
                        <div class="checkbox">
                          <input type="checkbox" name="perawatan_jantung[]" id="gejala_primer" value="gejala_primer">
                          <label class="control-label" for="gejala_primer">Identifikasi tanda/gejala primer penurunan curah jantung (meliputi dispnea, kelelahan, edema, ortopnea, paroxymal nocturnal dyspnea, peningkatan CVP)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="perawatan_jantung[]" id="monitor_tekanan_darah_2" value="monitor_tekanan_darah_2">
                          <label class="control-label" for="monitor_tekanan_darah_2">Monitor tekanan darah</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="perawatan_jantung[]" id="monitor_saturasi_oksigen" value="monitor_saturasi_oksigen">
                          <label class="control-label" for="monitor_saturasi_oksigen">Monitor saturasi oksigen</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="perawatan_jantung[]" id="monitor_keluhan_nyeri_dada" value="monitor_keluhan_nyeri_dada">
                          <label class="control-label" for="monitor_keluhan_nyeri_dada">Monitor keluhan nyeri dada</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="perawatan_jantung[]" id="ekg_12" value="ekg_12">
                          <label class="control-label" for="ekg_12">Monitor EKG 12 sadapan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="perawatan_jantung[]" id="monitor_aritma" value="monitor_aritma">
                          <label class="control-label" for="monitor_aritma">Monitor aritmia (kelainan irama dan frekuensi)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="perawatan_jantung[]" id="semi_fowler" value="semi_fowler">
                          <label class="control-label" for="semi_fowler">Posisikan pasien semi-fowler atau fowler dengan kaki ke bawah atau posisi nyaman</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="perawatan_jantung[]" id="terapi_relaksi" value="terapi_relaksi">
                          <label class="control-label" for="terapi_relaksi">Berikan terapi relaksasi untuk mengurangi stres, jika perlu</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="perawatan_jantung[]" id="beraktifitas_fisik" value="beraktifitas_fisik">
                          <label class="control-label" for="beraktifitas_fisik">Anjurkan beraktivitas fisik sesuai toleransi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="perawatan_jantung[]" id="aktifitas_fisik_bertahap" value="aktifitas_fisik_bertahap">
                          <label class="control-label" for="aktifitas_fisik_bertahap">Anjurkan beraktivitas fisik secara bertahap</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="perawatan_jantung[]" id="kolaborasi_antiaritma" value="kolaborasi_antiaritma">
                          <label class="control-label" for="kolaborasi_antiaritma">Kolaborasi pemberian antiaritmia, jika perlu</label>
                        </div>

                        <div class="form-group" style="margin-top:8px; max-width:400px;">
                      <label for="laiinnya_perawatan_jantung" class="control-label">Lainnya</label>
                      <textarea id="laiinnya_perawatan_jantung" 
                        name="laiinnya_perawatan_jantung"
                        class="form-control"
                        rows="5"
                        style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                    </div>

                      </div>

                    <?php elseif ($id_masalah == 16): ?>

                      <div class="form-group">
                        <label><strong>Penurunan Kapasitas Adaptif Intrakranial</strong></label>
                        <p>Berhubungan dengan :</p>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_penurunan_adaptif[]" id="lesi_menempati" value="lesi_menempati">
                          <label class="control-label" for="lesi_menempati">Lesi menempati ruang (mis. Space-occupying lesion - akibat tumor, abses)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_penurunan_adaptif[]" id="gangguan_metabolism" value="gangguan_metabolism">
                          <label class="control-label" for="gangguan_metabolism">Gangguan Metabolisme</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_penurunan_adaptif[]" id="edema_serebral" value="edema_serebral">
                          <label class="control-label" for="edema_serebral">Edema serebral (mis. Akibat cedera kepala [hematoma epidural, hematoma subdural, hematoma subarachnoid, hematoma intraserebral] stroke iskemik, stroke hemoragik, hipoksia, ensefalopati iskemik, pascaoperasi)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_penurunan_adaptif[]" id="peningkatan_tekanan_vena" value="peningkatan_tekanan_vena">
                          <label class="control-label" for="peningkatan_tekanan_vena">Peningkatan tekanan vena (mis. Akibat thrombosis sinus vena serebral, gagal jantung, thrombosis/obstruksi vena)</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <label><strong>Setelah dilakukan tindakan keperawatan selama 1x24 jam, kapasitas adaptif intrakranial meningkat</strong></label>
                        <p>Dengan hasil :</p>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penurunan_adaptif[]" id="tingkat_kesadaran_meningkat" value="tingkat_kesadaran_meningkat">
                          <label class="control-label" for="tingkat_kesadaran_meningkat">Tingkat Kesadaran meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penurunan_adaptif[]" id="fungsi_kognitif_meningkat" value="fungsi_kognitif_meningkat">
                          <label class="control-label" for="fungsi_kognitif_meningkat">Fungsi Kognitif Meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penurunan_adaptif[]" id="sakit_kepala_menurun" value="sakit_kepala_menurun">
                          <label class="control-label" for="sakit_kepala_menurun">Sakit Kepala Menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penurunan_adaptif[]" id="gelisah_menurun" value="gelisah_menurun">
                          <label class="control-label" for="gelisah_menurun">Gelisah Menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penurunan_adaptif[]" id="muntah_menurun" value="muntah_menurun">
                          <label class="control-label" for="muntah_menurun">Muntah Menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penurunan_adaptif[]" id="tekanan_darah_membaik" value="tekanan_darah_membaik">
                          <label class="control-label" for="tekanan_darah_membaik">Tekanan Darah membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penurunan_adaptif[]" id="tekanan_nadi_membaik" value="tekanan_nadi_membaik">
                          <label class="control-label" for="tekanan_nadi_membaik">Tekanan Nadi Membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penurunan_adaptif[]" id="bradikardia_membaik" value="bradikardia_membaik">
                          <label class="control-label" for="bradikardia_membaik">Bradikardia Membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penurunan_adaptif[]" id="pola_nafas_membaik" value="pola_nafas_membaik">
                          <label class="control-label" for="pola_nafas_membaik">Pola Nafas Membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penurunan_adaptif[]" id="respon_pupil_membaik" value="respon_pupil_membaik">
                          <label class="control-label" for="respon_pupil_membaik">Respon Pupil Membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penurunan_adaptif[]" id="reflek_neurologis_membaik" value="reflek_neurologis_membaik">
                          <label class="control-label" for="reflek_neurologis_membaik">Reflek Neurologis Membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_penurunan_adaptif[]" id="tekanan_intracranial_membaik" value="tekanan_intracranial_membaik">
                          <label class="control-label" for="tekanan_intracranial_membaik">Tekanan Intracranial Membaik</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <label><strong>Manajemen Peningkatan </strong></label>
                        <p>Tekanan Intracranial</p>
                        <div class="checkbox">
                          <input type="checkbox" id="identifikasi_penyebab_tingkatan_TIK" name="manajemen_peningkatan_adaptif[]" value="identifikasi_penyebab_tingkatan TIK">
                          <label class="control-label" for="identifikasi_penyebab_tingkatan_TIK">Identifikasi penyebab peningkatan TIK </label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="monitor_tanda_gejala_peningkatan_TIK" name="manajemen_peningkatan_adaptif[]" value="monitor_tanda_gejala_peningkatan_TIK">
                          <label class="control-label" for="monitor_tanda_gejala_peningkatan_TIK">o Monitor tanda/gejala peningkatan TIK (mis.tekanan darah meningkat, tekanan nadi melebar, bradikardia, pola nafas ireguler, kesadaran menurun)</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="monitor_MAP" name="manajemen_peningkatan_adaptif[]" value="monitor_MAP">
                          <label class="control-label" for="monitor_MAP">Monitor MAP</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="monitor_CVP" name="manajemen_peningkatan_adaptif[]" value="monitor_CVP">
                          <label class="control-label" for="monitor_CVP">Monitor CVPS</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="monitor_icp" name="manajemen_peningkatan_adaptif[]" value="monitor_icp">
                          <label class="control-label" for="monitor_icp">Monitor ICP</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="monitor_status_pernapasan" name="manajemen_peningkatan_adaptif[]" value="monitor_status_pernapasan">
                          <label class="control-label" for="monitor_status_pernapasan">Monitor Status Pernafasan</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="monitor_intake_output" name="manajemen_peningkatan_adaptif[]" value="monitor_intake_output">
                          <label class="control-label" for="monitor_intake_output">Monitor intake dan output cairan</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="monitor_ciaran_cerebro" name="manajemen_peningkatan_adaptif[]" value="monitor_ciaran_cerebro">
                          <label class="control-label" for="monitor_ciaran_cerebro">Monitor Cairan Cerebro-Spinalis</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="berikan_posisi_semi_flower" name="manajemen_peningkatan_adaptif[]" value="berikan_posisi_semi_flower">
                          <label class="control-label" for="berikan_posisi_semi_flower">Berikan Posisi Semi Flower</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="hindari_manufer_valsava" name="manajemen_peningkatan_adaptif[]" value="hindari_manufer_valsava">
                          <label class="control-label" for="hindari_manufer_valsava">Hindari Manuver Valsava</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="cegaah_terjadinya_kejang" name="manajemen_peningkatan_adaptif[]" value="cegaah_terjadinya_kejang">
                          <label class="control-label" for="cegaah_terjadinya_kejang">Cegah Terjadinya Kejang</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="atur_ventilator_agar_paco_optimal" name="manajemen_peningkatan_adaptif[]" value="atur_ventilator_agar_paco_optimal">
                          <label class="control-label" for="atur_ventilator_agar_paco_optimal">Atur ventilator agar PaCO2 Optimal</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="kolaborasi_pemberian_sedasi" name="manajemen_peningkatan_adaptif[]" value="kolaborasi_pemberian_sedasi">
                          <label class="control-label" for="kolaborasi_pemberian_sedasi">Kolaborasi Pemberian Sedasi</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="kolaborasi_pemberian_diuretik" name="manajemen_peningkatan_adaptif[]" value="kolaborasi_pemberian_diuretik">
                          <label class="control-label" for="kolaborasi_pemberian_diuretik">Kolaborasi Pemberian Diuretik Osmosis</label>
                        </div>

                        <div class="form-group" style="margin-top:8px; max-width:400px;">
                    <label for="laiinnya_peningkatan_adaptif" class="control-label">Lainnya</label>
                    <textarea id="laiinnya_peningkatan_adaptif" 
                      name="laiinnya_peningkatan_adaptif"
                      class="form-control"
                      rows="5"
                      style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                  </div>
                      </div>

                    <?php elseif ($id_masalah == 17): ?>

                      <div class="form-group">
                        <label><strong>Perfusi Perifier Tidak Efektif</strong></label>
                        <p>Berhubungan dengan :</p>
                        <div class="checkbox">
                          <input type="checkbox" id="hiperglikemia" name="hubungan_perfusi_perifier[]" value="hiperglikemia">
                          <label class="control-label" for="hiperglikemia">Hiperglikemia</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="penurunan_konsentrasi" name="hubungan_perfusi_perifier[]" value="penurunan_konsentrasi">
                          <label class="control-label" for="penurunan_konsentrasi">Penuruan Konsentrasi</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="peningkatan_tekanan_darah" name="hubungan_perfusi_perifier[]" value="peningkatan_tekanan_darah">
                          <label class="control-label" for="peningkatan_tekanan_darah">Peningkatan Tekanan Darah</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="kekurangan_volume_cairan" name="hubungan_perfusi_perifier[]" value="kekurangan volume cairan">
                          <label class="control-label" for="kekurangan_volume_cairan">Kekurangan Volume Cairan</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <label><strong>Dibuktikan dengan</strong></label>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_perfusi_perifer[]" id="pengisian_kapiler_>3_detik" value="pengisian_kapiler_>3_detik">
                          <label class="control-label" for="pengisian_kapiler_>3_detik">Pengisian kapiler >3 detik</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_perfusi_perifer[]" id="nadi_perifer_menurun" value="nadi_perifer_menurun">
                          <label class="control-label" for="nadi_perifer_menurun">Nadi perifer menurun atau tidak teraba</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_perfusi_perifer[]" id="akral_teraba_dingin" value="akral_teraba_dingin">
                          <label class="control-label" for="akral_teraba_dingin">Akral teraba dingin</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_perfusi_perifer[]" id="warna_kulit_pucat" value="warna_kulit_pucat">
                          <label class="control-label" for="warna_kulit_pucat">Warna kulit pucat</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_perfusi_perifer[]" id="turgor_kulit_menurun" value="turgor_kulit_menurun">
                          <label class="control-label" for="turgor_kulit_menurun">Turgor kulit menurun</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_perfusi_perifer[]" id="parastesia" value="parastesia">
                          <label class="control-label" for="parastesia">Parastesia</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_perfusi_perifer[]" id="nyeri_ekstremitas" value="nyeri_ekstremitas">
                          <label class="control-label" for="nyeri_ekstremitas">Nyeri ekstremitas (klaudikasi intermiten)</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_perfusi_perifer[]" id="edema" value="edema">
                          <label class="control-label" for="edema">Edema</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_perfusi_perifer[]" id="penyembuhan_luka_lambat" value="penyembuhan_luka_lambat">
                          <label class="control-label" for="penyembuhan_luka_lambat">Penyembuhan luka lambat</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_perfusi_perifer[]" id="indeks_ankle_<0.90" value="indeks_ankle_<0.90">
                          <label class="control-label" for="indeks_ankle_<0.90">Indeks ankle-brachial <0,90< /label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="bukti_perfusi_perifer[]" id="bruit_femralis" value="bruit_femralis">
                          <label class="control-label" for="bruit_femralis">Bruit femralis</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label><strong>Setelah dilakukan intervensi keperawatan selama 1 x 24 jam diharapkan Perfusi Perifer meningkat</strong></label>
                        <p>Dengan kriteria hasils</p>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_perfusi_perifer[]" id="warna_kulit_pucat_menurun_TIK" value="warna_kulit_pucat_menurun TIK">
                          <label class="control-label" for="warna_kulit_pucat_menurun_TIK">Warna kulit pucat menurun</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_perfusi_perifer[]" id="edema_purifer_menurun" value="edema_purifer_menurun">
                          <label class="control-label" for="edema_purifer_menurun">Edema perifer menurun</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_perfusi_perifer[]" id="neyeri_ekstermitas_menurun" value="neyeri_ekstermitas_menurun">
                          <label class="control-label" for="neyeri_ekstermitas_menurun">Nyeri ekstermitas menurun</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_perfusi_perifer[]" id="paratesia_menurun" value="paratesia_menurun">
                          <label class="control-label" for="paratesia_menurun">Parastesia menurun</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_perfusi_perifer[]" id="kelemahan_otot_menurun" value="kelemahan_otot_menurun">
                          <label class="control-label" for="kelemahan_otot_menurun">Kelemahan otot menurun</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_perfusi_perifer[]" id="kram_otot_menurun" value="kram_otot_menurun">
                          <label class="control-label" for="kram_otot_menurun">Kram otot menurunn</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_perfusi_perifer[]" id="pengisian_kapiler_membaik" value="pengisian_kapiler_membaik">
                          <label class="control-label" for="pengisian_kapiler_membaik">Pengisian kapiler membaik</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_perfusi_perifer[]" id="nekrosis_menurun" value="nekrosis_menurun">
                          <label class="control-label" for="nekrosis_menurun">Nekrosis menurun</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_perfusi_perifer[]" id="akral_membaik" value="akral_membaik">
                          <label class="control-label" for="akral_membaik">Akral membaik</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_perfusi_perifer[]" id="turgor_kulit_membaik" value="turgor_kulit_membaik">
                          <label class="control-label" for="turgor_kulit_membaik">Turgor kulit membaik</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_perfusi_perifer[]" id="tekanan_darah_membaik" value="tekanan_darah_membaik">
                          <label class="control-label" for="tekanan_darah_membaik">Tekanan darah membaik</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_perfusi_perifer[]" id="tekanan_arteri_rata2_membaik" value="tekanan_arteri_rata2_membaik">
                          <label class="control-label" for="tekanan_arteri_rata2_membaik">Tekanan arteri rata2 membaik</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_perfusi_perifer[]" id="denyut_nadi_perifer_membaik" value="denyut_nadi_perifer_membaik">
                          <label class="control-label" for="denyut_nadi_perifer_membaik">Denyut nadi perifer membaik</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="hasil_perfusi_perifer[]" id="sensasi_membaik" value="sensasi_membaik">
                          <label class="control-label" for="sensasi_membaik">Sensasi Membaik</label>
                        </div>

                        <div class="form-group" style="margin-top:8px; max-width:400px;">
                        <label for="laiinnya_perfusi_perifer" class="control-label">Lainnya</label>
                         <textarea id="laiinnya_perfusi_perifer" 
                          name="laiinnya_perfusi_perifer"
                          class="form-control"
                          rows="5"
                          style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                      </div>  
                      </div>


                    <?php elseif ($id_masalah == 18): ?>

                      <div class="form-group">
                        <label><strong>Pola Nafas Tidak Efektif (D.0005)</strong></label>
                        <p>Berhubungan dengan :</p>

                        <div class="checkbox">
                          <input type="checkbox" name="hubungan_nafas_tidak_efektif[]" id="depresi_pusat_pernafasan" value="depresi_pusat_pernafasan">
                          <label class="control-label" for="depresi_pusat_pernafasan">Depresi pusat pernafasan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hubungan_nafas_tidak_efektif[]" id="hambatan_upaya_nafas" value="hambatan_upaya_nafas">
                          <label class="control-label" for="hambatan_upaya_nafas">Hambatan upaya nafas (mis. nyeri saat bernafas, kelemahan otot pernafasan)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hubungan_nafas_tidak_efektif[]" id="deformitas_dinding_dada" value="deformitas_dinding_dada">
                          <label class="control-label" for="deformitas_dinding_dada">Deformitas dinding dada</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hubungan_nafas_tidak_efektif[]" id="deformitas_tulang_dada" value="deformitas_tulang_dada">
                          <label class="control-label" for="deformitas_tulang_dada">Deformitas tulang dada</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hubungan_nafas_tidak_efektif[]" id="gangguan_neuromuskuler" value="gangguan_neuromuskuler">
                          <label class="control-label" for="gangguan_neuromuskuler">Gangguan Neuromuskuler</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hubungan_nafas_tidak_efektif[]" id="obesitas" value="obesitas">
                          <label class="control-label" for="obesitas">Obesitas</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label><strong>Pola Nafas Tidak Efektif (D.0005)</strong></label>
                        <p>Dibuktikan dengan :</p>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_nafas_tidak_efektif[]" id="dispnea" value="dispnea">
                          <label class="control-label" for="dispnea">Dispnea</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_nafas_tidak_efektif[]" id="penggunaan_otot_bantu" value="penggunaan_otot_bantu">
                          <label class="control-label" for="penggunaan_otot_bantu">Penggunaan otot bantu pernafasan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_nafas_tidak_efektif[]" id="fase_ekspirasi_memanjang" value="fase_ekspirasi_memanjang">
                          <label class="control-label" for="fase_ekspirasi_memanjang">Fase ekspirasi memanjang</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_nafas_tidak_efektif[]" id="pola_nafas_abnormal" value="pola_nafas_abnormal">
                          <label class="control-label" for="pola_nafas_abnormal">Pola napas abnormal (mis. Takipnea, bradipnea, hiperventilasi, Kussmaul, Cheyne-Stokes)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_nafas_tidak_efektif[]" id="ortopneu" value="ortopneu">
                          <label class="control-label" for="ortopneu">Ortopneu</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_nafas_tidak_efektif[]" id="pernapasan_pursed_lip" value="pernapasan_pursed_lip">
                          <label class="control-label" for="pernapasan_pursed_lip">Pernapasan pursed-lip</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_nafas_tidak_efektif[]" id="pernapasan_cuping_hidung" value="pernapasan_cuping_hidung">
                          <label class="control-label" for="pernapasan_cuping_hidung">Pernapasan cuping hidung</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_nafas_tidak_efektif[]" id="diameter_thoraks_meningkat" value="diameter_thoraks_meningkat">
                          <label class="control-label" for="diameter_thoraks_meningkat">Diameter thoraks anterior-posterior meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_nafas_tidak_efektif[]" id="ventilasi_semenit_menurun" value="ventilasi_semenit_menurun">
                          <label class="control-label" for="ventilasi_semenit_menurun">Ventilasi semenit menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_nafas_tidak_efektif[]" id="kapasitas_vital_menurun" value="kapasitas_vital_menurun">
                          <label class="control-label" for="kapasitas_vital_menurun">Kapasitas vital menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_nafas_tidak_efektif[]" id="tekanan_ekspirasi_menurun" value="tekanan_ekspirasi_menurun">
                          <label class="control-label" for="tekanan_ekspirasi_menurun">Tekanan ekspirasi menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_nafas_tidak_efektif[]" id="tekanan_inspirasi_menurun" value="tekanan_inspirasi_menurun">
                          <label class="control-label" for="tekanan_inspirasi_menurun">Tekanan inspirasi menurun</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label><strong>Setelah dilakukan intervensi keperawatan selama 1x 24 jam diharapkan pola napas (L.01004) membaik dengan kriteria hasil :</strong></label>
                        <p>Dengan kriteria hasil :</p>

                        <div class="checkbox">
                          <input type="checkbox" id="dispnea_menurun" name="hasil_nafas_tidak_efektif[]" value="dispnea_menurun">
                          <label class="control-label" for="dispnea_menurun">Dispnea menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="penggunaan_otot_bantu_menurun" name="hasil_nafas_tidak_efektif[]" value="penggunaan_otot_bantu_menurun">
                          <label class="control-label" for="penggunaan_otot_bantu_menurun">Penggunaan otot bantu napas menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="fase_ekspirasi_menurun" name="hasil_nafas_tidak_efektif[]" value="fase_ekspirasi_menurun">
                          <label class="control-label" for="fase_ekspirasi_menurun">Pemanjangan fase ekspirasi menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="ortopnea_menurun" name="hasil_nafas_tidak_efektif[]" value="ortopnea_menurun">
                          <label class="control-label" for="ortopnea_menurun">Ortopnea menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="pernapasan_pursed_lip_menurun" name="hasil_nafas_tidak_efektif[]" value="pernapasan_pursed_lip_menurun">
                          <label class="control-label" for="pernapasan_pursed_lip_menurun">Pernapasan pursed-lip menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="pernapasan_cuping_hidung_menurun" name="hasil_nafas_tidak_efektif[]" value="pernapasan_cuping_hidung_menurun">
                          <label class="control-label" for="pernapasan_cuping_hidung_menurun">Pernapasan cuping hidung menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="frekuensi_napas_membaik" name="hasil_nafas_tidak_efektif[]" value="frekuensi_napas_membaik">
                          <label class="control-label" for="frekuensi_napas_membaik">Frekuensi napas membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="kedalaman_napas_membaik" name="hasil_nafas_tidak_efektif[]" value="kedalaman_napas_membaik">
                          <label class="control-label" for="kedalaman_napas_membaik">Kedalaman napas membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="ekskursi_dada_membaik" name="hasil_nafas_tidak_efektif[]" value="ekskursi_dada_membaik">
                          <label class="control-label" for="ekskursi_dada_membaik">Ekskursi dada membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="ventilasi_semenit_membaik" name="hasil_nafas_tidak_efektif[]" value="ventilasi_semenit_membaik">
                          <label class="control-label" for="ventilasi_semenit_membaik">Ventilasi semenit membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="kapasitas_vital_membaik" name="hasil_nafas_tidak_efektif[]" value="kapasitas_vital_membaik">
                          <label class="control-label" for="kapasitas_vital_membaik">Kapasitas vital membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="diameter_thoraks_membaik" name="hasil_nafas_tidak_efektif[]" value="diameter_thoraks_membaik">
                          <label class="control-label" for="diameter_thoraks_membaik">Diameter thoraks anterior-posterior membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="tekanan_ekspirasi_membaik" name="hasil_nafas_tidak_efektif[]" value="tekanan_ekspirasi_membaik">
                          <label class="control-label" for="tekanan_ekspirasi_membaik">Tekanan ekspirasi membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="tekanan_inspirasi_membaik" name="hasil_nafas_tidak_efektif[]" value="tekanan_inspirasi_membaik">
                          <label class="control-label" for="tekanan_inspirasi_membaik">Tekanan inspirasi membaik</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <label><strong>Manajemen Jalan Napas :</strong></label>

                        <div class="checkbox">
                          <input type="checkbox" id="monitor_pola_napas" name="manajamen_nafas_tidak_efektif[]" value="monitor_pola_napas">
                          <label class="control-label" for="monitor_pola_napas">Monitor pola napas (frekuensi, kedalaman, usaha napas)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="monitor_bunyi_napas" name="manajamen_nafas_tidak_efektif[]" value="monitor_bunyi_napas">
                          <label class="control-label" for="monitor_bunyi_napas">Monitor bunyi napas tambahan (mis. Gurgling, mengi, wheezing, ronkhi kering)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="monitor_sputum" name="manajamen_nafas_tidak_efektif[]" value="monitor_sputum">
                          <label class="control-label" for="monitor_sputum">Monitor sputum (jumlah, warna, aroma)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="pertahankan_kepatenan_jalan_napas" name="manajamen_nafas_tidak_efektif[]" value="pertahankan_kepatenan_jalan_napas">
                          <label class="control-label" for="pertahankan_kepatenan_jalan_napas">Pertahankan kepatenan jalan napas dengan head-tilt dan chin-lift (jaw-thrust jika curiga trauma servikal)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="posisikan_semi_fowler" name="manajamen_nafas_tidak_efektif[]" value="posisikan_semi_fowler">
                          <label class="control-label" for="posisikan_semi_fowler">Posisikan semi-fowler atau fowler</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="berikan_minum_hangat" name="manajamen_nafas_tidak_efektif[]" value="berikan_minum_hangat">
                          <label class="control-label" for="berikan_minum_hangat">Berikan minum hangat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="lakukan_fisioterapi_dada" name="manajamen_nafas_tidak_efektif[]" value="lakukan_fisioterapi_dada">
                          <label class="control-label" for="lakukan_fisioterapi_dada">Lakukan fisioterapi dada, jika perlu</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="lakukan_penghisapan_lendir" name="manajamen_nafas_tidak_efektif[]" value="lakukan_penghisapan_lendir">
                          <label class="control-label" for="lakukan_penghisapan_lendir">Lakukan penghisapan lendir kurang dari 15 detik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="berikan_oksigen" name="manajamen_nafas_tidak_efektif[]" value="berikan_oksigen">
                          <label class="control-label" for="berikan_oksigen">Berikan oksigen, jika perlu</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="anjurkan_asupan_cairan" name="manajamen_nafas_tidak_efektif[]" value="anjurkan_asupan_cairan">
                          <label class="control-label" for="anjurkan_asupan_cairan">Anjurkan asupan cairan 2000 ml/hari, jika tidak kontraindikasi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="ajarkan_teknik_batuk" name="manajamen_nafas_tidak_efektif[]" value="ajarkan_teknik_batuk">
                          <label class="control-label" for="ajarkan_teknik_batuk">Ajarkan teknik batuk efektif</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="kolaborasi_obat" name="manajamen_nafas_tidak_efektif[]" value="kolaborasi_obat">
                          <label class="control-label" for="kolaborasi_obat">Kolaborasi pemberian bronkodilator, ekspektoran, mukolitik, jika perlu</label>
                        </div>

                        <div class="form-group" style="margin-top:8px; max-width:400px;">
                        <label for="laiinnya_nafas_tidak_efektif" class="control-label">Lainnya</label>
                        <textarea id="laiinnya_nafas_tidak_efektif" 
                          name="laiinnya_nafas_tidak_efektif"
                          class="form-control"
                          rows="5"
                          style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                      </div>
                      </div>



                    <?php elseif ($id_masalah == 19): ?>

                      <div class="form-group">
                        <label><strong>Risiko Defisit Nutrisi</strong></label>
                        <p>Dibuktikan dengan :</p>

                        <div class="checkbox">
                          <input type="checkbox" id="ketidakmampuan_menelan" name="bukti_resiko_defisit_nutrisi[]" value="ketidakmampuan_menelan">
                          <label class="control-label" for="ketidakmampuan_menelan">Ketidakmampuan menelan makanan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="ketidakmampuan_mencerna" name="bukti_resiko_defisit_nutrisi[]" value="ketidakmampuan_mencerna">
                          <label class="control-label" for="ketidakmampuan_mencerna">Ketidakmampuan mencerna makanan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="ketidakmampuan_mengabsorpsi" name="bukti_resiko_defisit_nutrisi[]" value="ketidakmampuan_mengabsorpsi">
                          <label class="control-label" for="ketidakmampuan_mengabsorpsi">Ketidakmampuan mengabsorpsi nutrien</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="peningkatan_kebutuhan_metabolisme" name="bukti_resiko_defisit_nutrisi[]" value="peningkatan_kebutuhan_metabolisme">
                          <label class="control-label" for="peningkatan_kebutuhan_metabolisme">Peningkatan kebutuhan metabolisme</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label><strong>Setelah dilakukan intervensi keperawatan diharapkan Status Nutrisi membaik </strong></label>
                        <p>dengan kriteria hasil</p>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_defisit_nutrisi[]" value="porsi_makanan_meningkat" id="porsi_makanan_meningkat">
                          <label class="control-label" for="porsi_makanan_meningkat">Porsi makanan yang dihabiskan meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_defisit_nutrisi[]" value="kekuatan_otot_meningkat" id="kekuatan_otot_meningkat">
                          <label class="control-label" for="kekuatan_otot_meningkat">Kekuatan otot pengunyah dan menelan meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_defisit_nutrisi[]" value="verbalisasi_keinginan" id="verbalisasi_keinginan">
                          <label class="control-label" for="verbalisasi_keinginan">Verbalisasi keinginan untuk meningkatkan nutrisi meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_defisit_nutrisi[]" value="pengetahuan_pilihan_makanan" id="pengetahuan_pilihan_makanan">
                          <label class="control-label" for="pengetahuan_pilihan_makanan">Pengetahuan tentang pilihan makanan dan minuman yang sehat meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_defisit_nutrisi[]" value="pengetahuan_asupan_nutrisi" id="pengetahuan_asupan_nutrisi">
                          <label class="control-label" for="pengetahuan_asupan_nutrisi">Pengetahuan tentang standar asupan nutrisi yang tepat meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_defisit_nutrisi[]" value="penyimpanan_makanan_aman" id="penyimpanan_makanan_aman">
                          <label class="control-label" for="penyimpanan_makanan_aman">Penyiapan dan penyimpanan makanan dan minuman yang aman meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_defisit_nutrisi[]" value="nyeri_abdomen_menurun" id="nyeri_abdomen_menurun">
                          <label class="control-label" for="nyeri_abdomen_menurun">Nyeri abdomen menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_defisit_nutrisi[]" value="sariawan_menurun" id="sariawan_menurun">
                          <label class="control-label" for="sariawan_menurun">Sariawan menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_defisit_nutrisi[]" value="nafsu_makan_membaik" id="nafsu_makan_membaik">
                          <label class="control-label" for="nafsu_makan_membaik">Nafsu makan membaik</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <label><strong>Manajemen Nutrisi</strong></label>
                        <p>Pilih tindakan yang dilakukan:</p>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="identifikasi_status_nutrisi" id="identifikasi_status_nutrisi">
                          <label class="control-label" for="identifikasi_status_nutrisi">Identifikasi status nutrisi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="identifikasi_alergi_makanan" id="identifikasi_alergi_makanan">
                          <label class="control-label" for="identifikasi_alergi_makanan">Identifikasi alergi dan intoleransi makanan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="identifikasi_makanan_disukai" id="identifikasi_makanan_disukai">
                          <label class="control-label" for="identifikasi_makanan_disukai">Identifikasi makanan yang disukai</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="identifikasi_kebutuhan_kalori" id="identifikasi_kebutuhan_kalori">
                          <label class="control-label" for="identifikasi_kebutuhan_kalori">Identifikasi kebutuhan kalori dan jenis nutrien</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="identifikasi_selang_nasogastrik" id="identifikasi_selang_nasogastrik">
                          <label class="control-label" for="identifikasi_selang_nasogastrik">Identifikasi perlunya penggunaan selang nasogastrik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="monitor_asupan_makanan" id="monitor_asupan_makanan">
                          <label class="control-label" for="monitor_asupan_makanan">Monitor asupan makanan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="monitor_berat_badan" id="monitor_berat_badan">
                          <label class="control-label" for="monitor_berat_badan">Monitor berat badan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="oral_hygiene_sebelum_makan" id="oral_hygiene_sebelum_makan">
                          <label class="control-label" for="oral_hygiene_sebelum_makan">Lakukan oral hygiene sebelum makan, jika perlu</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="sajikan_makanan_tertarik" id="sajikan_makanan_tertarik">
                          <label class="control-label" for="sajikan_makanan_tertarik">Sajikan makanan secara menarik dan suhu yang sesuai</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="berikan_makanan_tinggi_serat" id="berikan_makanan_tinggi_serat">
                          <label class="control-label" for="berikan_makanan_tinggi_serat">Berikan makanan tinggi serat untuk mencegah konstipasi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="berikan_makanan_tinggi_kalori_protein" id="berikan_makanan_tinggi_kalori_protein">
                          <label class="control-label" for="berikan_makanan_tinggi_kalori_protein">Berikan makanan tinggi kalori dan tinggi protein</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="berikan_suplemen_makanan" id="berikan_suplemen_makanan">
                          <label class="control-label" for="berikan_suplemen_makanan">Berikan suplemen makanan, jika perlu</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="hentikan_makan_nasogastrik" id="hentikan_makan_nasogastrik">
                          <label class="control-label" for="hentikan_makan_nasogastrik">Hentikan pemberian makan melalui selang nasogastrik jika asupan oral dapat ditoleransi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="anjurkan_posisi_duduk" id="anjurkan_posisi_duduk">
                          <label class="control-label" for="anjurkan_posisi_duduk">Anjurkan posisi duduk, jika mampu</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="ajarkan_diet_diprogramkan" id="ajarkan_diet_diprogramkan">
                          <label class="control-label" for="ajarkan_diet_diprogramkan">Ajarkan diet yang diprogramkan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="kolaborasi_pemberian_medikasi" id="kolaborasi_pemberian_medikasi">
                          <label class="control-label" for="kolaborasi_pemberian_medikasi">Kolaborasi pemberian medikasi sebelum makan (mis. pereda nyeri, antiemetik), jika perlu</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_defisit_nutrisi[]" value="kolaborasi_dengan_ahli_gizi" id="kolaborasi_dengan_ahli_gizi">
                          <label class="control-label" for="kolaborasi_dengan_ahli_gizi">Kolaborasi dengan ahli gizi untuk menentukan jumlah kalori dan jenis nutrien yang dibutuhkan, jika perlu</label>
                        </div>

                        <div class="form-group" style="margin-top:8px; max-width:400px;">
                        <label for="laiinnya_defisit_nutrisi" class="control-label">Lainnya</label>
                        <textarea id="laiinnya_defisit_nutrisi" 
                          name="laiinnya_defisit_nutrisi"
                          class="form-control"
                          rows="5"
                          style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                      </div>
                      </div>


                    <?php elseif ($id_masalah == 20): ?>

                      <div class="form-group">
                        <label><strong>Risiko Hipovolemia</strong></label>
                        <p>Dibuktikan dengan :</p>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_hipovolemia[]" value="kehilangan_cairan_aktif">
                          <label class="control-label" for="kehilangan_cairan_aktif">Kehilangan cairan secara aktif</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_hipovolemia[]" value="gangguan_absorpsi_cairan">
                          <label class="control-label" for="gangguan_absorpsi_cairan">Gangguan absorpsi cairan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_hipovolemia[]" value="usia_lanjut">
                          <label class="control-label" for="usia_lanjut">Usia lanjut</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_hipovolemia[]" id="kelebihan_berat_badan" value="kelebihan_berat_badan">
                          <label class="control-label" for="kelebihan_berat_badan">Kelebihan berat badan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_hipovolemia[]" id="status_hipermetabolik" value="status_hipermetabolik">
                          <label class="control-label" for="status_hipermetabolik">Status hipermetabolik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_hipovolemia[]" id="kegagalan_mekanisme_regulasi" value="kegagalan_mekanisme_regulasi">
                          <label class="control-label" for="kegagalan_mekanisme_regulasi">Kegagalan mekanisme regulasi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_hipovolemia[]" id="evaporasi" value="evaporasi">
                          <label class="control-label" for="evaporasi">Evaporasi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_hipovolemia[]" id="kekurangan_intake_cairan" value="kekurangan_intake_cairan">
                          <label class="control-label" for="kekurangan_intake_cairan">Kekurangan intake cairan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_hipovolemia[]" id="efek_agen_farmakologis" value="efek_agen_farmakologis">
                          <label class="control-label" for="efek_agen_farmakologis">Efek agen farmakologis</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <label><strong>Setelah dilakukan intervensi keperawatan selama 3 x 24 jam diharapkan Status Cairan membaik dengan kriteria hasil</strong></label>
                        <p>dengan kriteria hasil :</p>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="kekuatan_nadi_meningkat" value="kekuatan_nadi_meningkat">
                          <label class="control-label" for="kekuatan_nadi_meningkat">Kekuatan nadi meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="output_urine_meningkat" value="output_urine_meningkat">
                          <label class="control-label" for="output_urine_meningkat">Output urine meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="membran_mukosa_lembab_meningkat" value="membran_mukosa_lembab_meningkat">
                          <label class="control-label" for="membran_mukosa_lembab_meningkat">Membran mukosa lembab meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="pengisian_vena_meningkat" value="pengisian_vena_meningkat">
                          <label class="control-label" for="pengisian_vena_meningkat">Pengisian vena meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="dispnea_menurun" value="dispnea_menurun">
                          <label class="control-label" for="dispnea_menurun">Dispnea menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="perasaan_lemah_menurun" value="perasaan_lemah_menurun">
                          <label class="control-label" for="perasaan_lemah_menurun">Perasaan lemah menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="rasa_haus_menurun" value="rasa_haus_menurun">
                          <label class="control-label" for="rasa_haus_menurun">Rasa haus menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="konsentrasi_urine_menurun" value="konsentrasi_urine_menurun">
                          <label class="control-label" for="konsentrasi_urine_menurun">Konsentrasi urine menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="frekuensi_nadi_membaik" value="frekuensi_nadi_membaik">
                          <label class="control-label" for="frekuensi_nadi_membaik">Frekuensi nadi membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="tekanan_darah_membaik" value="tekanan_darah_membaik">
                          <label class="control-label" for="tekanan_darah_membaik">Tekanan darah membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="tekanan_nadi_membaik" value="tekanan_nadi_membaik">
                          <label class="control-label" for="tekanan_nadi_membaik">Tekanan nadi membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="turgor_kulit_membaik" value="turgor_kulit_membaik">
                          <label class="control-label" for="turgor_kulit_membaik">Turgor kulit membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="hemoglobin_membaik" value="hemoglobin_membaik">
                          <label class="control-label" for="hemoglobin_membaik">Hemoglobin membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="hematokrit_membaik" value="hematokrit_membaik">
                          <label class="control-label" for="hematokrit_membaik">Hematokrit membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="central_venous_pressure_membaik" value="central_venous_pressure_membaik">
                          <label class="control-label" for="central_venous_pressure_membaik">Central venous pressure membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="refluks_hepatojugular_membaik" value="refluks_hepatojugular_membaik">
                          <label class="control-label" for="refluks_hepatojugular_membaik">Refluks hepatojugular membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="hepatomegali_membaik" value="hepatomegali_membaik">
                          <label class="control-label" for="hepatomegali_membaik">Hepatomegali membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="oliguria_membaik" value="oliguria_membaik">
                          <label class="control-label" for="oliguria_membaik">Oliguria membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="intake_cairan_membaik" value="intake_cairan_membaik">
                          <label class="control-label" for="intake_cairan_membaik">Intake cairan membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_hipovolemia[]" id="suhu_tubuh_membaik" value="suhu_tubuh_membaik">
                          <label class="control-label" for="suhu_tubuh_membaik">Suhu tubuh membaik</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <label><strong>Manajemen Hipovolemia</strong></label>
                        <p>Pilih tindakan yang dilakukan:</p>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_hipovolemia[]" id="periksa_tanda_gejala_hipovolemia" value="periksa_tanda_gejala_hipovolemia">
                          <label class="control-label" for="periksa_tanda_gejala_hipovolemia">Periksa tanda dan gejala hipovolemia (mis. frekuensi nadi meningkat, nadi teraba lemah, tekanan darah menurun, tekanan nadi menyempit, turgor kulit menurun, membran mukosa kering, volume urine menurun, hematokrit meningkat, haus, lemah)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_hipovolemia[]" id="monitor_intake_output_cairan" value="monitor_intake_output_cairan">
                          <label class="control-label" for="monitor_intake_output_cairan">Monitor intake dan output cairan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_hipovolemia[]" id="hitung_kebutuhan_cairan" value="hitung_kebutuhan_cairan">
                          <label class="control-label" for="hitung_kebutuhan_cairan">Hitung kebutuhan cairan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_hipovolemia[]" id="berikan_posisi_modified_trendelenburg" value="berikan_posisi_modified_trendelenburg">
                          <label class="control-label" for="berikan_posisi_modified_trendelenburg">Berikan posisi modified trendelenburg</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_hipovolemia[]" id="berikan_asupan_cairan_oral" value="berikan_asupan_cairan_oral">
                          <label class="control-label" for="berikan_asupan_cairan_oral">Berikan asupan cairan oral</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_hipovolemia[]" id="anjurkan_memperbanyak_asupan_cairan_oral" value="anjurkan_memperbanyak_asupan_cairan_oral">
                          <label class="control-label" for="anjurkan_memperbanyak_asupan_cairan_oral">Anjurkan memperbanyak asupan cairan oral</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_hipovolemia[]" id="anjurkan_terhindar_perubahan_posisi_mendadak" value="anjurkan_terhindar_perubahan_posisi_mendadak">
                          <label class="control-label" for="anjurkan_terhindar_perubahan_posisi_mendadak">Anjurkan menghindari perubahan posisi mendadak</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_hipovolemia[]" id="kolaborasi_pemberian_cairan_iv_isotonis" value="kolaborasi_pemberian_cairan_iv_isotonis">
                          <label class="control-label" for="kolaborasi_pemberian_cairan_iv_isotonis">Kolaborasi pemberian cairan IV isotonis (mis. NaCl, RL)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_hipovolemia[]" id="kolaborasi_pemberian_cairan_iv_hipotonis" value="kolaborasi_pemberian_cairan_iv_hipotonis">
                          <label class="control-label" for="kolaborasi_pemberian_cairan_iv_hipotonis">Kolaborasi pemberian cairan IV hipotonis (mis. glukosa 2,5%, NaCl 0,4%)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_hipovolemia[]" id="kolaborasi_pemberian_cairan_koloid" value="kolaborasi_pemberian_cairan_koloid">
                          <label class="control-label" for="kolaborasi_pemberian_cairan_koloid">Kolaborasi pemberian cairan koloid (mis. albumin, plasmanate)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="manajamen_resiko_hipovolemia[]" id="kolaborasi_pemberian_produk_darah" value="kolaborasi_pemberian_produk_darah">
                          <label class="control-label" for="kolaborasi_pemberian_produk_darah">Kolaborasi pemberian produk darah</label>
                        </div>

                        <div class="form-group" style="margin-top:8px; max-width:400px;">
                        <label for="laiinnya_resiko_hipovolemia" class="control-label">Lainnya</label>
                        <textarea id="laiinnya_resiko_hipovolemia" 
                          name="laiinnya_resiko_hipovolemia"
                          class="form-control"
                          rows="5"
                          style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                      </div>
                      </div>



                    <?php elseif ($id_masalah == 21): ?>

                      <div class="form-group">
                        <label><strong>Risiko Infeksi</strong></label>
                        <p>Dibuktikan dengan :</p>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_infeksi[]" id="penyakit_kronis" value="penyakit_kronis">
                          <label class="control-label" for="penyakit_kronis">Penyakit Kronis</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="bukti_resiko_infeksi[]" id="efek_prosedur_invasive" value="efek_prosedur_invasive">
                          <label class="control-label" for="efek_prosedur_invasive">Efek prosedur invasive Ketidakadekuatan pertahanan tubuh</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <label><strong>Setelah dilakukan intervensi keperawatan selama 3 x 24 jam diharapkan Tingkat Infeksi menurun dengan kriteria hasil</strong></label>
                        <p>dengan kriteria hasil :</p>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_infeksi[]" id="demam_menurun" value="demam_menurun">
                          <label class="control-label" for="demam_menurun">Demam Menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_infeksi[]" id="kemerahan_menurun" value="kemerahan_menurun">
                          <label class="control-label" for="kemerahan_menurun">Kemerahan Menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="hasil_resiko_infeksi[]" id="periode_malaise_menurun" value="periode_malaise_menurun">
                          <label class="control-label" for="periode_malaise_menurun">Periode Malaise Menurun</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <label><strong>Pencegahan Infeksi</strong></label>
                        <p>Pilih tindakan yang dilakukan:</p>

                        <div class="checkbox">
                          <input type="checkbox" name="pencegahan_resiko_infeksi[]" id="monitor_tanda_gejala_infeksi" value="monitor_tanda_gejala_infeksi">
                          <label class="control-label" for="monitor_tanda_gejala_infeksi">Monitor tanda dan gejala infeksi lokal dan sistemik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="pencegahan_resiko_infeksi[]" id="batasi_jumlah_pengunjung" value="batasi_jumlah_pengunjung">
                          <label class="control-label" for="batasi_jumlah_pengunjung">Batasi jumlah pengunjung</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="pencegahan_resiko_infeksi[]" id="berikan_perawatan_kulit_area_edema" value="berikan_perawatan_kulit_area_edema">
                          <label class="control-label" for="berikan_perawatan_kulit_area_edema">Berikan perawatan kulit pada area edema</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="pencegahan_resiko_infeksi[]" id="cuci_tangan_sebelum_sesudah_kontak" value="cuci_tangan_sebelum_sesudah_kontak">
                          <label class="control-label" for="cuci_tangan_sebelum_sesudah_kontak">Cuci tangan sebelum dan sesudah kontak dengan pasien dan lingkungan pasien</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="pencegahan_resiko_infeksi[]" id="pertahankan_tehnik_aseptik" value="pertahankan_tehnik_aseptik">
                          <label class="control-label" for="pertahankan_tehnik_aseptik">Pertahankan tehnik aseptik pada pasien berisiko tinggi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="pencegahan_resiko_infeksi[]" id="jelaskan_tanda_gejala_infeksi" value="jelaskan_tanda_gejala_infeksi">
                          <label class="control-label" for="jelaskan_tanda_gejala_infeksi">Jelaskan tanda dan gejala infeksi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="pencegahan_resiko_infeksi[]" id="ajarkan_cara_mencuci_tangan" value="ajarkan_cara_mencuci_tangan">
                          <label class="control-label" for="ajarkan_cara_mencuci_tangan">Ajarkan cara mencuci tangan dengan benar</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="pencegahan_resiko_infeksi[]" id="ajarkan_etika_batuk" value="ajarkan_etika_batuk">
                          <label class="control-label" for="ajarkan_etika_batuk">Ajarkan etika batuk</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="pencegahan_resiko_infeksi[]" id="ajarkan_cara_memeriksa_kondisi_luka_operasi" value="ajarkan_cara_memeriksa_kondisi_luka_operasi">
                          <label class="control-label" for="ajarkan_cara_memeriksa_kondisi_luka_operasi">Ajarkan cara memeriksa kondisi luka operasi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="pencegahan_resiko_infeksi[]" id="ajurkan_meningkatkan_asupan_nutrisi_cairan" value="ajurkan_meningkatkan_asupan_nutrisi_cairan">
                          <label class="control-label" for="ajurkan_meningkatkan_asupan_nutrisi_cairan">Ajurkan meningkatkan asupan nutrisi dan cairan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" name="pencegahan_resiko_infeksi[]" id="kolaborasi_pemberian_imunisasi" value="kolaborasi_pemberian_imunisasi">
                          <label class="control-label" for="kolaborasi_pemberian_imunisasi">Kolaborasi pemberian imunisasi, jika perlu</label>
                        </div>

                         <div class="form-group" style="margin-top:8px; max-width:400px;">
                        <label for="laiinnya_resiko_infeksi" class="control-label">Lainnya</label>
                        <textarea id="laiinnya_resiko_infeksi" 
                          name="laiinnya_resiko_infeksi"
                          class="form-control"
                          rows="5"
                          style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                      </div>
                      </div>


                    <?php elseif ($id_masalah == 22): ?>

                      <div class="form-group">
                        <label><strong>Risiko Ketidakstabilan Kadar Gula Darah (D.0038)</strong></label>
                        <p>Dibuktikan dengan :</p>

                        <div class="checkbox">
                          <input type="checkbox" id="kurang_terpapar_informasi_diabetes" name="bukti_resiko_ketidakstabilan_gula_darah[]" value="kurang_terpapar_informasi_diabetes">
                          <label class="control-label" for="kurang_terpapar_informasi_diabetes">Kurang terpapar informasi tentang manajemen diabetes</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="ketidaktepatan_pemantauan_glukosa_darah" name="bukti_resiko_ketidakstabilan_gula_darah[]" value="ketidaktepatan_pemantauan_glukosa_darah">
                          <label class="control-label" for="ketidaktepatan_pemantauan_glukosa_darah">Ketidaktepatan pemantauan glukosa darah</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="kurang_patuh_rencana_manajemen_diabetes" name="bukti_resiko_ketidakstabilan_gula_darah[]" value="kurang_patuh_rencana_manajemen_diabetes">
                          <label class="control-label" for="kurang_patuh_rencana_manajemen_diabetes">Kurang patuh pada rencana manajemen diabetes</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="manajemen_medikasi_tidak_terkontrol" name="bukti_resiko_ketidakstabilan_gula_darah[]" value="manajemen_medikasi_tidak_terkontrol">
                          <label class="control-label" for="manajemen_medikasi_tidak_terkontrol">Manajemen medikasi tidak terkontrol</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="kurang_dapat_menerima_diagnosis" name="bukti_resiko_ketidakstabilan_gula_darah[]" value="kurang_dapat_menerima_diagnosis">
                          <label class="control-label" for="kurang_dapat_menerima_diagnosis">Kurang dapat menerima diagnosis</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label><strong>Setelah dilakukan intervensi keperawatan selama 3 x 24 jam diharapkan Kestabilan Kadar Gula Darah Meningkat dengan kriteria hasil</strong></label>
                        <p>dengan kriteria hasil :</p>

                        <div class="checkbox">
                          <input type="checkbox" id="koordinasi_meningkat" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="koordinasi_meningkat">
                          <label class="control-label" for="koordinasi_meningkat">Koordinasi Meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="tingkat_kesadaran_meningkat" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="tingkat_kesadaran_meningkat">
                          <label class="control-label" for="tingkat_kesadaran_meningkat">Tingkat Kesadaran Meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="mengantuk_menurun" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="mengantuk_menurun">
                          <label class="control-label" for="mengantuk_menurun">Mengantuk Menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="pusing_menurun" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="pusing_menurun">
                          <label class="control-label" for="pusing_menurun">Pusing Menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="lelah_lesu_menurun" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="lelah_lesu_menurun">
                          <label class="control-label" for="lelah_lesu_menurun">Lelah/Lesu Menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="rasa_lapar_menurun" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="rasa_lapar_menurun">
                          <label class="control-label" for="rasa_lapar_menurun">Rasa Lapar Menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="gemetar_menurun" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="gemetar_menurun">
                          <label class="control-label" for="gemetar_menurun">Gemetar Menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="berkeringat_menurun" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="berkeringat_menurun">
                          <label class="control-label" for="berkeringat_menurun">Berkeringat Menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="mulut_kering_menurun" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="mulut_kering_menurun">
                          <label class="control-label" for="mulut_kering_menurun">Mulut Kering Menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="rasa_haus_menurun" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="rasa_haus_menurun">
                          <label class="control-label" for="rasa_haus_menurun">Rasa Haus Menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="perilaku_aneh_menurun" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="perilaku_aneh_menurun">
                          <label class="control-label" for="perilaku_aneh_menurun">Perilaku Aneh Menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="kesulitan_bicara_menurun" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="kesulitan_bicara_menurun">
                          <label class="control-label" for="kesulitan_bicara_menurun">Kesulitan Bicara Menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="kadar_glukosa_darah_membaik" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="kadar_glukosa_darah_membaik">
                          <label class="control-label" for="kadar_glukosa_darah_membaik">Kadar Glukosa dalam Darah Membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="kadar_glukosa_urine_membaik" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="kadar_glukosa_urine_membaik">
                          <label class="control-label" for="kadar_glukosa_urine_membaik">Kadar Glukosa dalam Urine Membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="palpitasi_membaik" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="palpitasi_membaik">
                          <label class="control-label" for="palpitasi_membaik">Palpitasi Membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="perilaku_membaik" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="perilaku_membaik">
                          <label class="control-label" for="perilaku_membaik">Perilaku Membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="jumlah_urine_membaik" name="hasil_resiko_ketidakstabilan_gula_darah[]" value="jumlah_urine_membaik">
                          <label class="control-label" for="jumlah_urine_membaik">Jumlah Urine Membaik</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label><strong>Manajemen Hiperglikemia</strong></label>
                        <p>Pilih tindakan yang dilakukan:</p>

                        <div class="checkbox">
                          <input type="checkbox" id="identifikasi_penyebab_hiperglikemia" name="manajemen_hiperglikimia[]" value="identifikasi_penyebab_hiperglikemia">
                          <label class="control-label" for="identifikasi_penyebab_hiperglikemia">Identifikasi kemungkinan penyebab hiperglikemia</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="monitor_kadar_gula_darah" name="manajemen_hiperglikimia[]" value="monitor_kadar_gula_darah">
                          <label class="control-label" for="monitor_kadar_gula_darah">Monitor kadar gula darah, jika perlu</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="monitor_tanda_gejala_hiperglikemia" name="manajemen_hiperglikimia[]" value="monitor_tanda_gejala_hiperglikemia">
                          <label class="control-label" for="monitor_tanda_gejala_hiperglikemia">Monitor tanda dan gejala hiperglikemia (mis. polyuria, polydipsia, polifagia, kelemahan, malaise, pandangan kabur, sakit kepala)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="monitor_intake_output_cairan" name="manajemen_hiperglikimia[]" value="monitor_intake_output_cairan">
                          <label class="control-label" for="monito
r_intake_output_cairan">Monitor intake dan output cairan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="berikan_asupan_cairan_oral" name="manajemen_hiperglikimia[]" value="berikan_asupan_cairan_oral">
                          <label class="control-label" for="berikan_asupan_cairan_oral">Berikan asupan cairan oral</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="fasilitasi_ambulasi" name="manajemen_hiperglikimia[]" value="fasilitasi_ambulasi">
                          <label class="control-label" for="fasilitasi_ambulasi">Fasilitasi ambulasi jika ada hipotensi ortostatik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="ajarkan_pengelolaan_diabetes" name="manajemen_hiperglikimia[]" value="ajarkan_pengelolaan_diabetes">
                          <label class="control-label" for="ajarkan_pengelolaan_diabetes">Ajarkan pengelolaan diabetes (mis. penggunaan insulin, obat oral, monitor asupan cairan, penggantian karbohidrat dan bantuan profesional kesehatan)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="kolaborasi_pemberian_insulin" name="manajemen_hiperglikimia[]" value="kolaborasi_pemberian_insulin">
                          <label class="control-label" for="kolaborasi_pemberian_insulin">Kolaborasi pemberian insulin, jika perlu</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="kolaborasi_pemberian_cairan_IV" name="manajemen_hiperglikimia[]" value="kolaborasi_pemberian_cairan_IV">
                          <label class="control-label" for="kolaborasi_pemberian_cairan_IV">Kolaborasi pemberian cairan IV, jika perlu</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <label><strong>Manajemen Hipoglikemia</strong></label>
                        <p>Pilih tindakan yang dilakukan:</p>

                        <div class="checkbox">
                          <input type="checkbox" id="identifikasi_tanda_gejala_hipoglikemia" name="manajemen_hipoglikemia[]" value="identifikasi_tanda_gejala_hipoglikemia">
                          <label class="control-label" for="identifikasi_tanda_gejala_hipoglikemia">Identifikasi tanda dan gejala hipoglikemia</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="identifikasi_penyebab_hipoglikemia" name="manajemen_hipoglikimia[]" value="identifikasi_penyebab_hipoglikemia">
                          <label class="control-label" for="identifikasi_penyebab_hipoglikemia">Identifikasi kemungkinan penyebab hipoglikemia</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="berikan_karbohidrat_sederhana" name="manajemen_hipoglikimia[]" value="berikan_karbohidrat_sederhana">
                          <label class="control-label" for="berikan_karbohidrat_sederhana">Berikan karbohidrat sederhana, jika perlu</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="berikan_glucagon" name="manajemen_hipoglikimia[]" value="berikan_glucagon">
                          <label class="control-label" for="berikan_glucagon">Berikan glucagon, jika perlu</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="pertahankan_kepatenan_jalan_nafas" name="manajemen_hipoglikimia[]" value="pertahankan_kepatenan_jalan_nafas">
                          <label class="control-label" for="pertahankan_kepatenan_jalan_nafas">Pertahankan kepatenan jalan nafas</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="pertahankan_akses_IV" name="manajemen_hipoglikimia[]" value="pertahankan_akses_IV">
                          <label class="control-label" for="pertahankan_akses_IV">Pertahankan akses IV, jika perlu</label>
                        </div>

                        <div class="form-group" style="margin-top:8px; max-width:400px;">
                        <label for="laiinnya_hipoglikimia" class="control-label">Lainnya</label>
                        <textarea id="laiinnya_hipoglikimia" 
                          name="laiinnya_hipoglikimia"
                          class="form-control"
                          rows="5"
                          style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                      </div>

                      </div>


                    <?php elseif ($id_masalah == 23): ?>

                      <div class="form-group">
                        <label><strong>Resiko Perdarahan (D.0012)</strong></label>
                        <p>Dibuktikan dengan :</p>

                        <div class="checkbox">
                          <input id="gangguan_koagulasi" type="checkbox" name="bukti_resiko_perdarahan[]" value="gangguan_koagulasi">
                          <label class="control-label" for="gangguan_koagulasi">Gangguan Koagulasi (mis. Trombositopenia)</label>
                        </div>
                      </div>


                      <div class="form-group">
                        <label><strong>Setelah dilakukan intervensi keperawatan selama 1 x 24 jam diharapkan tingkat perdarahan menurun dengan kriteria hasil</strong></label>
                        <p>dengan kriteria hasil:</p>

                        <div class="checkbox">
                          <input type="checkbox" id="membran_mukosa_lembab_meningkat" name="hasil_resiko_perdarahan[]" value="membran_mukosa_lembab_meningkat">
                          <label class="control-label" for="membran_mukosa_lembab_meningkat">Membran mukosa lembab meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="kelembapan_kulit_meningkat" name="hasil_resiko_perdarahan[]" value="kelembapan_kulit_meningkat">
                          <label class="control-label" for="kelembapan_kulit_meningkat">Kelembapan kulit meningkat</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="hemoptisis_menurun" name="hasil_resiko_perdarahan[]" value="hemoptisis_menurun">
                          <label class="control-label" for="hemoptisis_menurun">Hemoptisis menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="hematemesis_menurun" name="hasil_resiko_perdarahan[]" value="hematemesis_menurun">
                          <label class="control-label" for="hematemesis_menurun">Hematemesis menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="hematuria_menurun" name="hasil_resiko_perdarahan[]" value="hematuria_menurun">
                          <label class="control-label" for="hematuria_menurun">Hematuria menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="perdarahan_anus_menurun" name="hasil_resiko_perdarahan[]" value="perdarahan_anus_menurun">
                          <label class="control-label" for="perdarahan_anus_menurun">Perdarahan anus menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="distensi_abdomen_menurun" name="hasil_resiko_perdarahan[]" value="distensi_abdomen_menurun">
                          <label class="control-label" for="distensi_abdomen_menurun">Distensi abdomen menurun</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="hemoglobin_membaik" name="hasil_resiko_perdarahan[]" value="hemoglobin_membaik">
                          <label class="control-label" for="hemoglobin_membaik">Hemoglobin membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="hematokrit_membaik" name="hasil_resiko_perdarahan[]" value="hematokrit_membaik">
                          <label class="control-label" for="hematokrit_membaik">Hematokrit membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="frekuensi_nadi_membaik" name="hasil_resiko_perdarahan[]" value="frekuensi_nadi_membaik">
                          <label class="control-label" for="frekuensi_nadi_membaik">Frekuensi nadi membaik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="suhu_tubuh_membaik" name="hasil_resiko_perdarahan[]" value="suhu_tubuh_membaik">
                          <label class="control-label" for="suhu_tubuh_membaik">Suhu tubuh membaik</label>
                        </div>
                      </div>



                      <div class="form-group">
                        <label><strong>Pencegahan Perdarahan (I.02067)</strong></label>
                        <p>Pilih tindakan yang dilakukan:</p>

                        <div class="checkbox">
                          <input type="checkbox" id="monitor_tanda_gejala_perdarahan" name="pencegahan_resiko_perdarahan[]" value="monitor_tanda_gejala_perdarahan">
                          <label class="control-label" for="monitor_tanda_gejala_perdarahan">Monitor tanda dan gejala perdarahan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="monitor_hematokrit_hemoglobin" name="pencegahan_resiko_perdarahan[]" value="monitor_hematokrit_hemoglobin">
                          <label class="control-label" for="monitor_hematokrit_hemoglobin">Monitor nilai hematokrit/hemoglobin sebelum dan setelah kehilangan darah</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="monitor_tanda_tanda_vital_ortostatik" name="pencegahan_resiko_perdarahan[]" value="monitor_tanda_tanda_vital_ortostatik">
                          <label class="control-label" for="monitor_tanda_tanda_vital_ortostatik">Monitor tanda-tanda vital ortostatik</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="monitor_koagulasi" name="pencegahan_resiko_perdarahan[]" value="monitor_koagulasi">
                          <label class="control-label" for="monitor_koagulasi">Monitor koagulasi (mis. prothrombin time (PT), partial tromblopastin time (PTT), fibrinogen, degradasi fibrin dan/atau platelet)</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="pertahankan_bed_rest" name="pencegahan_resiko_perdarahan[]" value="pertahankan_bed_rest">
                          <label class="control-label" for="pertahankan_bed_rest">Pertahankan bed rest selama perdarahan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="jelaskan_tanda_gejala_perdarahan" name="pencegahan_resiko_perdarahan[]" value="jelaskan_tanda_gejala_perdarahan">
                          <label class="control-label" for="jelaskan_tanda_gejala_perdarahan">Jelaskan tanda dan gejala perdarahan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="anjurkan_asupan_cairan" name="pencegahan_resiko_perdarahan[]" value="anjurkan_asupan_cairan">
                          <label class="control-label" for="anjurkan_asupan_cairan">Anjurkan meningkatkan asupan cairan untuk menghindari konstipasi</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="anjurkan_lapor_perdarahan" name="pencegahan_resiko_perdarahan[]" value="anjurkan_lapor_perdarahan">
                          <label class="control-label" for="anjurkan_lapor_perdarahan">Anjurkan segera melapor jika terjadi perdarahan</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="kolaborasi_pemberian_obat_pengontrol_perdarahan" name="pencegahan_resiko_perdarahan[]" value="kolaborasi_pemberian_obat_pengontrol_perdarahan">
                          <label class="control-label" for="kolaborasi_pemberian_obat_pengontrol_perdarahan">Kolaborasi pemberian obat pengontrol perdarahan, jika perlu</label>
                        </div>

                        <div class="checkbox">
                          <input type="checkbox" id="kolaborasi_pemberian_produk_darah" name="pencegahan_resiko_perdarahan[]" value="kolaborasi_pemberian_produk_darah">
                          <label class="control-label" for="kolaborasi_pemberian_produk_darah">Kolaborasi pemberian produk darah, jika perlu</label>
                        </div>

                        <div class="form-group" style="margin-top:8px; max-width:400px;">
                        <label for="laiinnya_resiko_perdarahan" class="control-label">Lainnya</label>
                        <textarea id="laiinnya_resiko_perdarahan" 
                          name="laiinnya_resiko_perdarahan"
                          class="form-control"
                          rows="5"
                          style="width:100%; height:200px; resize:none; border:2px solid black;"></textarea>
                      </div>
                      </div>


                    <?php else: ?>
                      <p>Formulir belum tersedia untuk masalah ini.</p>
                    <?php endif; ?>

                    <hr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>Tidak ada data masalah keperawatan.</p>
                <?php endif; ?>
              </form>




              <div class="form-group text-center" style="margin-top: 30px;">
                <div class="col-md-12">
                  <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                </div>
                <div class="col-md-6">
                  <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)"
                    style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span
                      class="btn-text">KEMBALI</span></a>
                  <button id="simpan" onclick="simpan()" type="submit" class="btn btn-success mb-4">Simpan</button>
                  <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4"
                    onclick="edit()">Edit</button>
                  <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4"
                    onclick="cetak()">Cetak</button>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">RENCANA ASUHAN</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-group">
            <div class="col-md-12">
              <div class="table-wrap">
                <div class="table-responsive">
                  <table class="table table-hover display  pb-60" id="tabel_terapi">
                    <thead>
                      <tr class="bg-success">
                        <th>NO</th>
                        <th>PILIH</th>
                        <th>HAPUS</th>
                        <th>TANGGAL</th>
                        <th>JENIS MASALAH KEP</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr class="bg-success">
                        <th>NO</th>
                        <th>PILIH</th>
                        <th>HAPUS</th>
                        <th>TANGGAL</th>
                        <th>JENIS MASALAH KEP</th>
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
<script type="text/javascript">
  function getCheckedValues(name) {
    return [...new Set($("input[name='" + name + "[]']:checked").map(function() {
      return this.value;
    }).get())];
  }


  function simpan() {
    tanggal = $("#inTgl").val();
    id_pelayanan = $("#inPel").val();
    id_history = $("#inHis").val();
    no_rm = $("#inNoRM").val();
    inIdMasalahKep = $("#inIdMasalahKep").val();
    var laiinnya_resiko_perdarahan = $('#laiinnya_resiko_perdarahan').val() || '';
    var laiinnya_manajemen_hipertermia = $('#laiinnya_manajemen_hipertermia').val() || '';
    var laiinnya_manajemen_muntah = $('#laiinnya_manajemen_muntah').val() || '';
    var laiinnya_perawatan_jantung = $('#laiinnya_perawatan_jantung').val() || '';
    var laiinnya_hipoglikimia = $('#laiinnya_hipoglikimia').val() || '';
    var laiinnya_perfusi_perifer = $('#laiinnya_perfusi_perifer').val() || '';
    var laiinnya_resiko_hipovolemia = $('#laiinnya_resiko_hipovolemia').val() || '';
    var laiinnya_resiko_infeksi = $('#laiinnya_resiko_infeksi').val() || '';
    var laiinnya_peningkatan_adaptif = $('#laiinnya_peningkatan_adaptif').val() || '';
    var laiinnya_dukungan_ibadah = $('#laiinnya_dukungan_ibadah').val() || '';
    var laiinnya_isolasi = $('#laiinnya_isolasi').val() || '';
    var laiinnya_nyeri = $('#laiinnya_nyeri').val() || '';
    var laiinnya_poldur = $('#laiinnya_poldur').val() || '';
    var laiinnya_diare = $('#laiinnya_diare').val() || '';
    var laiinnya_defisit_nutrisi = $('#laiinnya_defisit_nutrisi').val() || '';
    var laiinnya_mobilisasi = $('#laiinnya_mobilisasi').val() || '';
    var laiinnya_penyapihan = $('#laiinnya_penyapihan').val() || '';
    var laiinnya_pertukaran_gas = $('#laiinnya_pertukaran_gas').val() || '';
    var laiinnya_jatuh = $('#laiinnya_jatuh').val() || '';
    var laiinnya_hipovolemia = $('#laiinnya_hipovolemia').val() || '';
    var laiinnya_aktivitas = $('#laiinnya_aktivitas').val() || '';
    var laiinnya_perawatan_diri = $('#laiinnya_perawatan_diri').val() || '';
    var laiinnya_nafas_tidak_efektif = $('#laiinnya_nafas_tidak_efektif').val() || '';



    

    bukti_hipertermia = getCheckedValues('bukti_hipertermia');
    hasil_hipertermia = getCheckedValues('hasil_hipertermia');
    manajemen_hipertermia = getCheckedValues('manajemen_hipertermia');

    faktor_nausea = getCheckedValues('faktor_nausea');
    gejala_nausea = getCheckedValues('gejala_nausea');
    kriteria_hasil_nausea = getCheckedValues('kriteria_hasil_nausea');
    manajemen_mual = getCheckedValues('manajemen_mual');
    manajemen_muntah = getCheckedValues('manajemen_muntah');

    faktor_bersihan_jalan_nafas = getCheckedValues('faktor_bersihan_jalan_nafas');
    gejala_bersihan_jalan_nafas = getCheckedValues('gejala_bersihan_jalan_nafas');
    kriteria_hasil_bersihan_jalan_nafas = getCheckedValues('kriteria_hasil_bersihan_jalan_nafas');
    kriteria_hasil_tingkat_infeksi = getCheckedValues('kriteria_hasil_tingkat_infeksi');
    manajemen_jalan_nafas = getCheckedValues('manajemen_jalan_nafas');
    manajemen_isolasi = getCheckedValues('manajemen_isolasi');

    gejala = getCheckedValues('gejala');
    hasil_ansietas = getCheckedValues('hasil_ansietas');
    reduction_ansietas = getCheckedValues('reduction_ansietas');
    dukungan_ibadah = getCheckedValues('dukungan_ibadah');

    gejala_nyeri_akut = getCheckedValues('gejala_nyeri_akut');
    hasil_nyeri = getCheckedValues('hasil_nyeri');

    gejala_diare = getCheckedValues('gejala_diare');
    hasil_diare = getCheckedValues('hasil_diare');
    manajemen_diare = getCheckedValues('manajemen_diare');

    gejala_mobilitas = getCheckedValues('gejala_mobilitas');
    bukti_mobilitas = getCheckedValues('bukti_mobilitas');
    hasil_mobilitas = getCheckedValues('hasil_mobilitas');
    dukungan_mobilisasi = getCheckedValues('dukungan_mobilisasi');

    gangguan_penyapihan = getCheckedValues('gangguan_penyapihan');
    buktikan_penyapihan = getCheckedValues('buktikan_penyapihan');
    hasil_penyapihan = getCheckedValues('hasil_penyapihan');

    bukti_gangguan_pertukaran_gas = getCheckedValues('bukti_gangguan_pertukaran_gas');
    hasil_pertukaran_gas = getCheckedValues('hasil_pertukaran_gas');

    gangguan_poldur = getCheckedValues('gangguan_poldur');
    bukti_gangguan_poldur = getCheckedValues('bukti_gangguan_poldur');
    hasil_gangguan_poldur = getCheckedValues('hasil_gangguan_poldur');
    dukungan_poldur = getCheckedValues('dukungan_poldur');

    resiko_jatuh = getCheckedValues('resiko_jatuh');
    bukti_resiko_jatuh = getCheckedValues('bukti_resiko_jatuh');
    minor_resiko_jatuh = getCheckedValues('minor_resiko_jatuh');
    hasil_resiko_jatuh = getCheckedValues('hasil_resiko_jatuh');
    manajemen_resiko_jatuh = getCheckedValues('manajemen_resiko_jatuh');

    defisit_perawatan_diri = getCheckedValues('defisit_perawatan_diri');
    bukti_defisit_perawatan_diri = getCheckedValues('bukti_defisit_perawatan_diri');
    hasil_defisit_perawatan_diri = getCheckedValues('hasil_defisit_perawatan_diri');

    bukti_hipovolemia = getCheckedValues('bukti_hipovolemia');
    hasil_hipovolemia = getCheckedValues('hasil_hipovolemia');

    intoleransi_aktivitas = getCheckedValues('intoleransi_aktivitas');
    bukti_intoleransi_aktivitas = getCheckedValues('bukti_intoleransi_aktivitas');
    minor_intoleransi_aktivitas = getCheckedValues('minor_intoleransi_aktivitas');
    hasil_intoleransi_aktivitas = getCheckedValues('hasil_intoleransi_aktivitas');
    manajemen_intoleransi_aktivitas = getCheckedValues('manajemen_intoleransi_aktivitas');

    curah_jantung = getCheckedValues('curah_jantung');
    bukti_curah_jantung = getCheckedValues('bukti_curah_jantung');
    hasil_curah_jantung = getCheckedValues('hasil_curah_jantung');
    perawatan_jantung = getCheckedValues('perawatan_jantung');

    bukti_penurunan_adaptif = getCheckedValues('bukti_penurunan_adaptif');
    hasil_penurunan_adaptif = getCheckedValues('hasil_penurunan_adaptif');
    manajemen_peningkatan_adaptif = getCheckedValues('manajemen_peningkatan_adaptif');

    hubungan_perfusi_perifier = getCheckedValues('hubungan_perfusi_perifier');
    bukti_perfusi_perifer = getCheckedValues('bukti_perfusi_perifer');
    hasil_perfusi_perifer = getCheckedValues('hasil_perfusi_perifer');

    hubungan_nafas_tidak_efektif = getCheckedValues('hubungan_nafas_tidak_efektif');
    bukti_nafas_tidak_efektif = getCheckedValues('bukti_nafas_tidak_efektif');
    hasil_nafas_tidak_efektif = getCheckedValues('hasil_nafas_tidak_efektif');
    manajamen_nafas_tidak_efektif = getCheckedValues('manajamen_nafas_tidak_efektif');

    bukti_resiko_defisit_nutrisi = getCheckedValues('bukti_resiko_defisit_nutrisi');
    hasil_resiko_defisit_nutrisi = getCheckedValues('hasil_resiko_defisit_nutrisi');
    manajamen_resiko_defisit_nutrisi = getCheckedValues('manajamen_resiko_defisit_nutrisi');

    bukti_resiko_hipovolemia = getCheckedValues('bukti_resiko_hipovolemia');
    hasil_resiko_hipovolemia = getCheckedValues('hasil_resiko_hipovolemia');
    manajamen_resiko_hipovolemia = getCheckedValues('manajamen_resiko_hipovolemia');

    bukti_resiko_infeksi = getCheckedValues('bukti_resiko_infeksi');
    hasil_resiko_infeksi = getCheckedValues('hasil_resiko_infeksi');
    pencegahan_resiko_infeksi = getCheckedValues('pencegahan_resiko_infeksi');

    bukti_resiko_ketidakstabilan_gula_darah = getCheckedValues('bukti_resiko_ketidakstabilan_gula_darah');
    hasil_resiko_ketidakstabilan_gula_darah = getCheckedValues('hasil_resiko_ketidakstabilan_gula_darah');
    manajemen_hiperglikimia = getCheckedValues('manajemen_hiperglikimia');
    manajemen_hipoglikimia = getCheckedValues('manajemen_hipoglikimia');

    bukti_resiko_perdarahan = getCheckedValues('bukti_resiko_perdarahan');
    hasil_resiko_perdarahan = getCheckedValues('hasil_resiko_perdarahan');
    pencegahan_resiko_perdarahan = getCheckedValues('pencegahan_resiko_perdarahan');


    dataString = 'no_rm=' + no_rm +
      '&id_pelayanan=' + id_pelayanan +
      '&id_history=' + id_history +
      '&tanggal=' + tanggal +
      '&bukti_hipertermia=' + bukti_hipertermia +
      '&hasil_hipertermia=' + hasil_hipertermia +
      '&manajemen_hipertermia=' + manajemen_hipertermia +
      '&laiinnya_manajemen_hipertermia=' + encodeURIComponent(laiinnya_manajemen_hipertermia)+
      '&faktor_nausea=' + faktor_nausea +
      '&gejala_nausea=' + gejala_nausea +
      '&kriteria_hasil_nausea=' + kriteria_hasil_nausea +
      '&manajemen_mual=' + manajemen_mual +
      '&manajemen_muntah=' + manajemen_muntah +
      '&laiinnya_manajemen_muntah=' + encodeURIComponent(laiinnya_manajemen_muntah) +
      '&faktor_bersihan_jalan_nafas=' + faktor_bersihan_jalan_nafas +
      '&gejala_bersihan_jalan_nafas=' + gejala_bersihan_jalan_nafas +
      '&kriteria_hasil_bersihan_jalan_nafas=' + kriteria_hasil_bersihan_jalan_nafas +
      '&kriteria_hasil_tingkat_infeksi=' + kriteria_hasil_tingkat_infeksi +
      '&manajemen_jalan_nafas=' + manajemen_jalan_nafas +
      '&manajemen_isolasi=' + manajemen_isolasi +
      '&laiinnya_isolasi=' + encodeURIComponent(laiinnya_isolasi) +
      '&faktor_bersihan_jalan_nafas=' + faktor_bersihan_jalan_nafas +
      '&gejala=' + gejala +
      '&hasil_ansietas=' + hasil_ansietas +
      '&reduction_ansietas=' + reduction_ansietas +
      '&dukungan_ibadah=' + dukungan_ibadah +
      '&laiinnya_dukungan_ibadah=' + encodeURIComponent(laiinnya_dukungan_ibadah) +
      '&gejala_nyeri_akut=' + gejala_nyeri_akut +
      '&hasil_nyeri=' + hasil_nyeri +
      '&laiinnya_nyeri=' + encodeURIComponent(laiinnya_nyeri) +
      '&gejala_diare=' + gejala_diare +
      '&hasil_diare=' + hasil_diare +
      '&manajemen_diare=' + manajemen_diare +
      '&laiinnya_diare=' + encodeURIComponent(laiinnya_diare) +
      '&gejala_mobilitas=' + gejala_mobilitas +
      '&bukti_mobilitas=' + bukti_mobilitas +
      '&hasil_mobilitas=' + hasil_mobilitas +
      '&dukungan_mobilisasi=' + dukungan_mobilisasi +
      '&laiinnya_mobilisasi=' + encodeURIComponent(laiinnya_mobilisasi) +
      '&gangguan_penyapihan=' + gangguan_penyapihan +
      '&buktikan_penyapihan=' + buktikan_penyapihan +
      '&hasil_penyapihan=' + hasil_penyapihan +
      '&laiinnya_penyapihan=' + encodeURIComponent(laiinnya_penyapihan) +
      '&bukti_gangguan_pertukaran_gas=' + bukti_gangguan_pertukaran_gas +
      '&hasil_pertukaran_gas=' + hasil_pertukaran_gas +
      '&laiinnya_pertukaran_gas=' + encodeURIComponent(laiinnya_pertukaran_gas) +
      '&gangguan_poldur=' + gangguan_poldur +
      '&bukti_gangguan_poldur=' + bukti_gangguan_poldur +
      '&hasil_gangguan_poldur=' + hasil_gangguan_poldur +
      '&dukungan_poldur=' + dukungan_poldur +
      '&laiinnya_poldur=' + encodeURIComponent(laiinnya_poldur) +
      '&resiko_jatuh=' + resiko_jatuh +
      '&bukti_resiko_jatuh=' + bukti_resiko_jatuh +
      '&minor_resiko_jatuh=' + minor_resiko_jatuh +
      '&hasil_resiko_jatuh=' + hasil_resiko_jatuh +
      '&manajemen_resiko_jatuh=' + manajemen_resiko_jatuh +
      '&laiinnya_jatuh=' + encodeURIComponent(laiinnya_jatuh) +
      '&defisit_perawatan_diri=' + defisit_perawatan_diri +
      '&bukti_defisit_perawatan_diri=' + bukti_defisit_perawatan_diri +
      '&hasil_defisit_perawatan_diri=' + hasil_defisit_perawatan_diri +
      '&laiinnya_perawatan_diri=' + encodeURIComponent(laiinnya_perawatan_diri)+
      '&bukti_hipovolemia=' + bukti_hipovolemia +
      '&hasil_hipovolemia=' + hasil_hipovolemia +
      '&laiinnya_hipovolemia=' + encodeURIComponent(laiinnya_hipovolemia)+
      '&intoleransi_aktivitas=' + intoleransi_aktivitas +
      '&bukti_intoleransi_aktivitas=' + bukti_intoleransi_aktivitas +
      '&minor_intoleransi_aktivitas=' + minor_intoleransi_aktivitas +
      '&hasil_intoleransi_aktivitas=' + hasil_intoleransi_aktivitas +
      '&manajemen_intoleransi_aktivitas=' + manajemen_intoleransi_aktivitas +
      '&laiinnya_aktivitas=' + encodeURIComponent(laiinnya_aktivitas) +
      '&curah_jantung=' + curah_jantung +
      '&bukti_curah_jantung=' + bukti_curah_jantung +
      '&hasil_curah_jantung=' + hasil_curah_jantung +
      '&perawatan_jantung=' + perawatan_jantung +
      '&laiinnya_perawatan_jantung=' + encodeURIComponent(laiinnya_perawatan_jantung) +
      '&bukti_penurunan_adaptif=' + bukti_penurunan_adaptif +
      '&hasil_penurunan_adaptif=' + hasil_penurunan_adaptif +
      '&manajemen_peningkatan_adaptif=' + manajemen_peningkatan_adaptif +
      '&laiinnya_peningkatan_adaptif=' + encodeURIComponent(laiinnya_peningkatan_adaptif) +
      '&hubungan_perfusi_perifier=' + hubungan_perfusi_perifier +
      '&bukti_perfusi_perifer=' + bukti_perfusi_perifer +
      '&hasil_perfusi_perifer=' + hasil_perfusi_perifer +
      '&laiinnya_perfusi_perifer=' + encodeURIComponent(laiinnya_perfusi_perifer) +
      '&hubungan_nafas_tidak_efektif=' + hubungan_nafas_tidak_efektif +
      '&bukti_nafas_tidak_efektif=' + bukti_nafas_tidak_efektif +
      '&hasil_nafas_tidak_efektif=' + hasil_nafas_tidak_efektif +
      '&manajamen_nafas_tidak_efektif=' + manajamen_nafas_tidak_efektif +
      '&laiinnya_nafas_tidak_efektif=' + encodeURIComponent(laiinnya_nafas_tidak_efektif) +
      '&bukti_resiko_defisit_nutrisi=' + bukti_resiko_defisit_nutrisi +
      '&hasil_resiko_defisit_nutrisi=' + hasil_resiko_defisit_nutrisi +
      '&manajamen_resiko_defisit_nutrisi=' + manajamen_resiko_defisit_nutrisi +
      '&laiinnya_defisit_nutrisi=' + encodeURIComponent(laiinnya_defisit_nutrisi) +
      '&bukti_resiko_hipovolemia=' + bukti_resiko_hipovolemia +
      '&hasil_resiko_hipovolemia=' + hasil_resiko_hipovolemia +
      '&manajamen_resiko_hipovolemia=' + manajamen_resiko_hipovolemia +
      '&laiinnya_resiko_hipovolemia=' + encodeURIComponent(laiinnya_resiko_hipovolemia) +
      '&bukti_resiko_infeksi=' + bukti_resiko_infeksi +
      '&hasil_resiko_infeksi=' + hasil_resiko_infeksi +
      '&pencegahan_resiko_infeksi=' + pencegahan_resiko_infeksi +
      '&laiinnya_resiko_infeksi=' + encodeURIComponent(laiinnya_resiko_infeksi) +
      '&bukti_resiko_ketidakstabilan_gula_darah=' + bukti_resiko_ketidakstabilan_gula_darah +
      '&hasil_resiko_ketidakstabilan_gula_darah=' + hasil_resiko_ketidakstabilan_gula_darah +
      '&manajemen_hiperglikimia=' + manajemen_hiperglikimia +
      '&manajemen_hipoglikimia=' + manajemen_hipoglikimia +
      '&laiinnya_hipoglikimia=' + encodeURIComponent(laiinnya_hipoglikimia) +
      '&bukti_resiko_perdarahan=' + bukti_resiko_perdarahan +
      '&hasil_resiko_perdarahan=' + hasil_resiko_perdarahan +
      '&pencegahan_resiko_perdarahan=' + pencegahan_resiko_perdarahan +
      '&laiinnya_resiko_perdarahan=' + encodeURIComponent(laiinnya_resiko_perdarahan) +
      '&inIdMasalahKep=' + inIdMasalahKep;


    $.ajax({
      url: "<?= base_url() . 'Erm_ranap_rencana_keperawatan/insert_rencana' ?>",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_ranap_rencana_keperawatan/formrencanakeperawatan/') ?>" + id_pelayanan + '/' + id_history;
        } else if (data.error) {
          if (tanggal == '' | tanggal == null) {
            $('#tanggal_error').html('*wajib diisi');
          } else {
            $('#tanggal_error').html('');
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

  function edit() {
    tanggal = $("#inTgl").val();
    id_pelayanan = $("#inPel").val();
    id_history = $("#inHis").val();
    no_rm = $("#inNoRM").val();
    inIdMasalahKep = $("#inIdMasalahKep").val();
    id = $("#id").val();
    var laiinnya_resiko_perdarahan = $('#laiinnya_resiko_perdarahan').val() || '';
    var laiinnya_manajemen_hipertermia = $('#laiinnya_manajemen_hipertermia').val() || '';
    var laiinnya_manajemen_muntah = $('#laiinnya_manajemen_muntah').val() || '';
    var laiinnya_perawatan_jantung = $('#laiinnya_perawatan_jantung').val() || '';
    var laiinnya_hipoglikimia = $('#laiinnya_hipoglikimia').val() || '';
    var laiinnya_perfusi_perifer = $('#laiinnya_perfusi_perifer').val() || '';
    var laiinnya_resiko_hipovolemia = $('#laiinnya_resiko_hipovolemia').val() || '';
    var laiinnya_resiko_infeksi = $('#laiinnya_resiko_infeksi').val() || '';
    var laiinnya_peningkatan_adaptif = $('#laiinnya_peningkatan_adaptif').val() || '';
    var laiinnya_dukungan_ibadah = $('#laiinnya_dukungan_ibadah').val() || '';
    var laiinnya_isolasi = $('#laiinnya_isolasi').val() || '';
    var laiinnya_nyeri = $('#laiinnya_nyeri').val() || '';
    var laiinnya_poldur = $('#laiinnya_poldur').val() || '';
    var laiinnya_diare = $('#laiinnya_diare').val() || '';
    var laiinnya_defisit_nutrisi = $('#laiinnya_defisit_nutrisi').val() || '';
    var laiinnya_mobilisasi = $('#laiinnya_mobilisasi').val() || '';
    var laiinnya_penyapihan = $('#laiinnya_penyapihan').val() || '';
    var laiinnya_pertukaran_gas = $('#laiinnya_pertukaran_gas').val() || '';
    var laiinnya_jatuh = $('#laiinnya_jatuh').val() || '';
    var laiinnya_hipovolemia = $('#laiinnya_hipovolemia').val() || '';
    var laiinnya_aktivitas = $('#laiinnya_aktivitas').val() || '';
    var laiinnya_perawatan_diri = $('#laiinnya_perawatan_diri').val() || '';
    var laiinnya_nafas_tidak_efektif = $('#laiinnya_nafas_tidak_efektif').val() || '';


    
    bukti_hipertermia = getCheckedValues('bukti_hipertermia');
    hasil_hipertermia = getCheckedValues('hasil_hipertermia');
    manajemen_hipertermia = getCheckedValues('manajemen_hipertermia');

    faktor_nausea = getCheckedValues('faktor_nausea');
    gejala_nausea = getCheckedValues('gejala_nausea');
    kriteria_hasil_nausea = getCheckedValues('kriteria_hasil_nausea');
    manajemen_mual = getCheckedValues('manajemen_mual');
    manajemen_muntah = getCheckedValues('manajemen_muntah');

    faktor_bersihan_jalan_nafas = getCheckedValues('faktor_bersihan_jalan_nafas');
    gejala_bersihan_jalan_nafas = getCheckedValues('gejala_bersihan_jalan_nafas');
    kriteria_hasil_bersihan_jalan_nafas = getCheckedValues('kriteria_hasil_bersihan_jalan_nafas');
    kriteria_hasil_tingkat_infeksi = getCheckedValues('kriteria_hasil_tingkat_infeksi');
    manajemen_jalan_nafas = getCheckedValues('manajemen_jalan_nafas');
    manajemen_isolasi = getCheckedValues('manajemen_isolasi');

    gejala = getCheckedValues('gejala');
    hasil_ansietas = getCheckedValues('hasil_ansietas');
    reduction_ansietas = getCheckedValues('reduction_ansietas');
    dukungan_ibadah = getCheckedValues('dukungan_ibadah');

    gejala_nyeri_akut = getCheckedValues('gejala_nyeri_akut');
    hasil_nyeri = getCheckedValues('hasil_nyeri');

    gejala_diare = getCheckedValues('gejala_diare');
    hasil_diare = getCheckedValues('hasil_diare');
    manajemen_diare = getCheckedValues('manajemen_diare');

    gejala_mobilitas = getCheckedValues('gejala_mobilitas');
    bukti_mobilitas = getCheckedValues('bukti_mobilitas');
    hasil_mobilitas = getCheckedValues('hasil_mobilitas');
    dukungan_mobilisasi = getCheckedValues('dukungan_mobilisasi');

    gangguan_penyapihan = getCheckedValues('gangguan_penyapihan');
    buktikan_penyapihan = getCheckedValues('buktikan_penyapihan');
    hasil_penyapihan = getCheckedValues('hasil_penyapihan');

    bukti_gangguan_pertukaran_gas = getCheckedValues('bukti_gangguan_pertukaran_gas');
    hasil_pertukaran_gas = getCheckedValues('hasil_pertukaran_gas');

    gangguan_poldur = getCheckedValues('gangguan_poldur');
    bukti_gangguan_poldur = getCheckedValues('bukti_gangguan_poldur');
    hasil_gangguan_poldur = getCheckedValues('hasil_gangguan_poldur');
    dukungan_poldur = getCheckedValues('dukungan_poldur');

    resiko_jatuh = getCheckedValues('resiko_jatuh');
    bukti_resiko_jatuh = getCheckedValues('bukti_resiko_jatuh');
    minor_resiko_jatuh = getCheckedValues('minor_resiko_jatuh');
    hasil_resiko_jatuh = getCheckedValues('hasil_resiko_jatuh');
    manajemen_resiko_jatuh = getCheckedValues('manajemen_resiko_jatuh');

    defisit_perawatan_diri = getCheckedValues('defisit_perawatan_diri');
    bukti_defisit_perawatan_diri = getCheckedValues('bukti_defisit_perawatan_diri');
    hasil_defisit_perawatan_diri = getCheckedValues('hasil_defisit_perawatan_diri');

    bukti_hipovolemia = getCheckedValues('bukti_hipovolemia');
    hasil_hipovolemia = getCheckedValues('hasil_hipovolemia');

    intoleransi_aktivitas = getCheckedValues('intoleransi_aktivitas');
    bukti_intoleransi_aktivitas = getCheckedValues('bukti_intoleransi_aktivitas');
    minor_intoleransi_aktivitas = getCheckedValues('minor_intoleransi_aktivitas');
    hasil_intoleransi_aktivitas = getCheckedValues('hasil_intoleransi_aktivitas');
    manajemen_intoleransi_aktivitas = getCheckedValues('manajemen_intoleransi_aktivitas');

    curah_jantung = getCheckedValues('curah_jantung');
    bukti_curah_jantung = getCheckedValues('bukti_curah_jantung');
    hasil_curah_jantung = getCheckedValues('hasil_curah_jantung');
    perawatan_jantung = getCheckedValues('perawatan_jantung');

    bukti_penurunan_adaptif = getCheckedValues('bukti_penurunan_adaptif');
    hasil_penurunan_adaptif = getCheckedValues('hasil_penurunan_adaptif');
    manajemen_peningkatan_adaptif = getCheckedValues('manajemen_peningkatan_adaptif');

    hubungan_perfusi_perifier = getCheckedValues('hubungan_perfusi_perifier');
    bukti_perfusi_perifer = getCheckedValues('bukti_perfusi_perifer');
    hasil_perfusi_perifer = getCheckedValues('hasil_perfusi_perifer');

    hubungan_nafas_tidak_efektif = getCheckedValues('hubungan_nafas_tidak_efektif');
    bukti_nafas_tidak_efektif = getCheckedValues('bukti_nafas_tidak_efektif');
    hasil_nafas_tidak_efektif = getCheckedValues('hasil_nafas_tidak_efektif');
    manajamen_nafas_tidak_efektif = getCheckedValues('manajamen_nafas_tidak_efektif');

    bukti_resiko_defisit_nutrisi = getCheckedValues('bukti_resiko_defisit_nutrisi');
    hasil_resiko_defisit_nutrisi = getCheckedValues('hasil_resiko_defisit_nutrisi');
    manajamen_resiko_defisit_nutrisi = getCheckedValues('manajamen_resiko_defisit_nutrisi');

    bukti_resiko_hipovolemia = getCheckedValues('bukti_resiko_hipovolemia');
    hasil_resiko_hipovolemia = getCheckedValues('hasil_resiko_hipovolemia');
    manajamen_resiko_hipovolemia = getCheckedValues('manajamen_resiko_hipovolemia');

    bukti_resiko_infeksi = getCheckedValues('bukti_resiko_infeksi');
    hasil_resiko_infeksi = getCheckedValues('hasil_resiko_infeksi');
    pencegahan_resiko_infeksi = getCheckedValues('pencegahan_resiko_infeksi');

    bukti_resiko_ketidakstabilan_gula_darah = getCheckedValues('bukti_resiko_ketidakstabilan_gula_darah');
    hasil_resiko_ketidakstabilan_gula_darah = getCheckedValues('hasil_resiko_ketidakstabilan_gula_darah');
    manajemen_hiperglikimia = getCheckedValues('manajemen_hiperglikimia');
    manajemen_hipoglikimia = getCheckedValues('manajemen_hipoglikimia');

    bukti_resiko_perdarahan = getCheckedValues('bukti_resiko_perdarahan');
    hasil_resiko_perdarahan = getCheckedValues('hasil_resiko_perdarahan');
    pencegahan_resiko_perdarahan = getCheckedValues('pencegahan_resiko_perdarahan');


    dataString = 'no_rm=' + no_rm +
      '&id_pelayanan=' + id_pelayanan +
      '&id_history=' + id_history +
      '&id=' + id +
      '&tanggal=' + tanggal +
      '&bukti_hipertermia=' + bukti_hipertermia +
      '&hasil_hipertermia=' + hasil_hipertermia +
      '&manajemen_hipertermia=' + manajemen_hipertermia +
      '&laiinnya_manajemen_hipertermia=' + encodeURIComponent(laiinnya_manajemen_hipertermia) +
      '&faktor_nausea=' + faktor_nausea +
      '&gejala_nausea=' + gejala_nausea +
      '&kriteria_hasil_nausea=' + kriteria_hasil_nausea +
      '&manajemen_mual=' + manajemen_mual +
      '&manajemen_muntah=' + manajemen_muntah +
      '&laiinnya_manajemen_muntah=' + encodeURIComponent(laiinnya_manajemen_muntah) +
      '&faktor_bersihan_jalan_nafas=' + faktor_bersihan_jalan_nafas +
      '&gejala_bersihan_jalan_nafas=' + gejala_bersihan_jalan_nafas +
      '&kriteria_hasil_bersihan_jalan_nafas=' + kriteria_hasil_bersihan_jalan_nafas +
      '&kriteria_hasil_tingkat_infeksi=' + kriteria_hasil_tingkat_infeksi +
      '&manajemen_jalan_nafas=' + manajemen_jalan_nafas +
      '&manajemen_isolasi=' + manajemen_isolasi +
      '&laiinnya_isolasi=' + encodeURIComponent(laiinnya_isolasi) +
      '&gejala=' + gejala +
      '&hasil_ansietas=' + hasil_ansietas +
      '&reduction_ansietas=' + reduction_ansietas +
      '&dukungan_ibadah=' + dukungan_ibadah +
      '&laiinnya_dukungan_ibadah=' + encodeURIComponent(laiinnya_dukungan_ibadah) +
      '&gejala_nyeri_akut=' + gejala_nyeri_akut +
      '&hasil_nyeri=' + hasil_nyeri +
      '&laiinnya_nyeri=' + encodeURIComponent(laiinnya_nyeri) +
      '&gejala_diare=' + gejala_diare +
      '&hasil_diare=' + hasil_diare +
      '&manajemen_diare=' + manajemen_diare +
      '&laiinnya_diare=' + encodeURIComponent(laiinnya_diare) +
      '&gejala_mobilitas=' + gejala_mobilitas +
      '&bukti_mobilitas=' + bukti_mobilitas +
      '&hasil_mobilitas=' + hasil_mobilitas +
      '&dukungan_mobilisasi=' + dukungan_mobilisasi +
      '&laiinnya_mobilisasi=' + encodeURIComponent(laiinnya_mobilisasi) +
      '&gangguan_penyapihan=' + gangguan_penyapihan +
      '&buktikan_penyapihan=' + buktikan_penyapihan +
      '&hasil_penyapihan=' + hasil_penyapihan +
      '&laiinnya_penyapihan=' + encodeURIComponent(laiinnya_penyapihan) +
      '&bukti_gangguan_pertukaran_gas=' + bukti_gangguan_pertukaran_gas +
      '&hasil_pertukaran_gas=' + hasil_pertukaran_gas +
      '&laiinnya_pertukaran_gas=' + encodeURIComponent(laiinnya_pertukaran_gas) +
      '&gangguan_poldur=' + gangguan_poldur +
      '&bukti_gangguan_poldur=' + bukti_gangguan_poldur +
      '&hasil_gangguan_poldur=' + hasil_gangguan_poldur +
      '&dukungan_poldur=' + dukungan_poldur +
      '&laiinnya_poldur=' + encodeURIComponent(laiinnya_poldur) +
      '&resiko_jatuh=' + resiko_jatuh +
      '&bukti_resiko_jatuh=' + bukti_resiko_jatuh +
      '&minor_resiko_jatuh=' + minor_resiko_jatuh +
      '&hasil_resiko_jatuh=' + hasil_resiko_jatuh +
      '&manajemen_resiko_jatuh=' + manajemen_resiko_jatuh +
      '&laiinnya_jatuh=' + encodeURIComponent(laiinnya_jatuh) +
      '&defisit_perawatan_diri=' + defisit_perawatan_diri +
      '&bukti_defisit_perawatan_diri=' + bukti_defisit_perawatan_diri +
      '&hasil_defisit_perawatan_diri=' + hasil_defisit_perawatan_diri +
      '&laiinnya_perawatan_diri=' + encodeURIComponent(laiinnya_perawatan_diri) +
      '&bukti_hipovolemia=' + bukti_hipovolemia +
      '&hasil_hipovolemia=' + hasil_hipovolemia +
      '&laiinnya_hipovolemia=' + encodeURIComponent(laiinnya_hipovolemia) +
      '&intoleransi_aktivitas=' + intoleransi_aktivitas +
      '&bukti_intoleransi_aktivitas=' + bukti_intoleransi_aktivitas +
      '&minor_intoleransi_aktivitas=' + minor_intoleransi_aktivitas +
      '&hasil_intoleransi_aktivitas=' + hasil_intoleransi_aktivitas +
      '&manajemen_intoleransi_aktivitas=' + manajemen_intoleransi_aktivitas +
      '&laiinnya_aktivitas=' + encodeURIComponent(laiinnya_aktivitas) +
      '&curah_jantung=' + curah_jantung +
      '&bukti_curah_jantung=' + bukti_curah_jantung +
      '&hasil_curah_jantung=' + hasil_curah_jantung +
      '&perawatan_jantung=' + perawatan_jantung +
      '&laiinnya_perawatan_jantung=' + encodeURIComponent(laiinnya_perawatan_jantung) +
      '&bukti_penurunan_adaptif=' + bukti_penurunan_adaptif +
      '&hasil_penurunan_adaptif=' + hasil_penurunan_adaptif +
      '&manajemen_peningkatan_adaptif=' + manajemen_peningkatan_adaptif +
      '&laiinnya_peningkatan_adaptif=' + encodeURIComponent(laiinnya_peningkatan_adaptif) +
      '&hubungan_perfusi_perifier=' + hubungan_perfusi_perifier +
      '&bukti_perfusi_perifer=' + bukti_perfusi_perifer +
      '&hasil_perfusi_perifer=' + hasil_perfusi_perifer +
      '&laiinnya_perfusi_perifer=' + encodeURIComponent(laiinnya_perfusi_perifer) +
      '&hubungan_nafas_tidak_efektif=' + hubungan_nafas_tidak_efektif +
      '&bukti_nafas_tidak_efektif=' + bukti_nafas_tidak_efektif +
      '&hasil_nafas_tidak_efektif=' + hasil_nafas_tidak_efektif +
      '&manajamen_nafas_tidak_efektif=' + manajamen_nafas_tidak_efektif +
      '&laiinnya_nafas_tidak_efektif=' + encodeURIComponent(laiinnya_nafas_tidak_efektif) +
      '&bukti_resiko_defisit_nutrisi=' + bukti_resiko_defisit_nutrisi +
      '&hasil_resiko_defisit_nutrisi=' + hasil_resiko_defisit_nutrisi +
      '&manajamen_resiko_defisit_nutrisi=' + manajamen_resiko_defisit_nutrisi +
      '&laiinnya_defisit_nutrisi=' + encodeURIComponent(laiinnya_defisit_nutrisi) +
      '&bukti_resiko_hipovolemia=' + bukti_resiko_hipovolemia +
      '&hasil_resiko_hipovolemia=' + hasil_resiko_hipovolemia +
      '&manajamen_resiko_hipovolemia=' + manajamen_resiko_hipovolemia +
      '&laiinnya_resiko_hipovolemia=' + encodeURIComponent(laiinnya_resiko_hipovolemia) +
      '&bukti_resiko_infeksi=' + bukti_resiko_infeksi +
      '&hasil_resiko_infeksi=' + hasil_resiko_infeksi +
      '&pencegahan_resiko_infeksi=' + pencegahan_resiko_infeksi +
      '&laiinnya_resiko_infeksi=' + encodeURIComponent(laiinnya_resiko_infeksi) +
      '&bukti_resiko_ketidakstabilan_gula_darah=' + bukti_resiko_ketidakstabilan_gula_darah +
      '&hasil_resiko_ketidakstabilan_gula_darah=' + hasil_resiko_ketidakstabilan_gula_darah +
      '&manajemen_hiperglikimia=' + manajemen_hiperglikimia +
      '&manajemen_hipoglikimia=' + manajemen_hipoglikimia +
      '&laiinnya_hipoglikimia=' + encodeURIComponent(laiinnya_hipoglikimia) +
      '&bukti_resiko_perdarahan=' + bukti_resiko_perdarahan +
      '&hasil_resiko_perdarahan=' + hasil_resiko_perdarahan +
      '&pencegahan_resiko_perdarahan=' + pencegahan_resiko_perdarahan +
      '&laiinnya_resiko_perdarahan=' + encodeURIComponent(laiinnya_resiko_perdarahan) +
      '&inIdMasalahKep=' + inIdMasalahKep;

    $.ajax({
      url: "<?= base_url() . 'Erm_ranap_rencana_keperawatan/edit_rencana' ?>",
      method: "POST",
      dataType: 'json',
      data: dataString,
      success: function(data) {
        swal({
          title: "Berhasil edit!",
          text: data.status,
          type: "success",
          confirmButtonColor: "#3cb878",
        });

        if (data.status == "success") {
          window.location.href = "<?php echo base_url('Erm_ranap_rencana_keperawatan/formrencanakeperawatan/') ?>" + id_pelayanan + '/' + id_history;
        } else if (data.error) {
          if (tanggal == '' | tanggal == null) {
            $('#tanggal_error').html('*wajib diisi');
          } else {
            $('#tanggal_error').html('');
          }
        } else {
          swal({
            title: "Gagal edit!",
            text: data.status,
            type: "warning",
            confirmButtonColor: "#3cb878",
          });

        }
      }

    });
    return false;
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
          url: "<?php echo base_url() ?>Erm_ranap_rencana_keperawatan/hapus_rencana",
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
              $('#tabel_terapi').DataTable().ajax.reload();
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

  function reload_data_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
    $('#tabel_terapi').dataTable().fnClearTable();
    $('#tabel_terapi').dataTable().fnDestroy();
    $('#tabel_terapi').DataTable({
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
          "sLast": "Terakhir",
        }
      },
      "ajax": {
        "url": '<?php echo base_url('Erm_ranap_rencana_keperawatan/tampil_list_per_id'); ?>',
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
      }, ],
    });
  }

  function pilih(id) {
    $('#id').val(id);
    $.ajax({
      url: "<?php echo base_url() ?>Erm_ranap_rencana_keperawatan/getPerRencana",
      method: "POST",
      dataType: 'json',
      data: {
        id: id
      },
      success: function(data) {
        if (data.status_dt == "found") {
          $('#id').val(data.id_rencana);
          $('#inTgl').val(data.tanggal);
          $('#edit').show();
          $('#simpan').hide();

          function setCheckboxValues(name, values) {
            var selectedValues = values.split(",");
            $('input[name="' + name + '[]"]').each(function() {
              var checkboxValue = $(this).val();
              if (selectedValues.includes(checkboxValue)) {
                $(this).prop('checked', true);
              } else {
                $(this).prop('checked', false);
              }
            });
          }

          setCheckboxValues('bukti_hipertermia', data.bukti_hipertermia);
          setCheckboxValues('hasil_hipertermia', data.hasil_hipertermia);
          setCheckboxValues('manajemen_hipertermia', data.manajemen_hipertermia);
          // setCheckboxValues('laiinnya_manajemen_hipertermia', data.laiinnya_manajemen_hipertermia);
          $('#laiinnya_manajemen_hipertermia').val(data.laiinnya_manajemen_hipertermia || '');
          
          setCheckboxValues('faktor_nausea', data.faktor_nausea);
          setCheckboxValues('gejala_nausea', data.gejala_nausea);
          setCheckboxValues('kriteria_hasil_nausea', data.kriteria_hasil_nausea);
          setCheckboxValues('manajemen_mual', data.manajemen_mual);
          setCheckboxValues('manajemen_muntah', data.manajemen_muntah);
          // setCheckboxValues('laiinnya_manajemen_muntah', data.laiinnya_manajemen_muntah);
          $('#laiinnya_manajemen_muntah').val(data.laiinnya_manajemen_muntah || '');

          setCheckboxValues('faktor_bersihan_jalan_nafas', data.faktor_bersihan_jalan_nafas);
          setCheckboxValues('gejala_bersihan_jalan_nafas', data.gejala_bersihan_jalan_nafas);
          setCheckboxValues('kriteria_hasil_bersihan_jalan_nafas', data.kriteria_hasil_bersihan_jalan_nafas);
          setCheckboxValues('kriteria_hasil_tingkat_infeksi', data.faktor_nausea);
          setCheckboxValues('manajemen_jalan_nafas', data.manajemen_jalan_nafas);
          setCheckboxValues('manajemen_isolasi', data.manajemen_isolasi);
          // setCheckboxValues('laiinnya_manajemen_muntah', data.laiinnya_manajemen_muntah);
          $('#laiinnya_isolasi').val(data.laiinnya_isolasi || '');

          setCheckboxValues('gejala', data.gejala);
          setCheckboxValues('hasil_ansietas', data.hasil_ansietas);
          setCheckboxValues('reduction_ansietas', data.reduction_ansietas);
          setCheckboxValues('dukungan_ibadah', data.dukungan_ibadah);
          $('#laiinnya_dukungan_ibadah').val(data.laiinnya_dukungan_ibadah || '');


          setCheckboxValues('gejala_nyeri_akut', data.gejala_nyeri_akut);
          setCheckboxValues('hasil_nyeri', data.hasil_nyeri);
          $('#laiinnya_nyeri').val(data.laiinnya_nyeri || '');

          setCheckboxValues('gejala_diare', data.gejala_diare);
          setCheckboxValues('hasil_diare', data.hasil_diare);
          setCheckboxValues('manajemen_diare', data.manajemen_diare);
          $('#laiinnya_diare').val(data.laiinnya_diare || '');

          setCheckboxValues('gejala_mobilitas', data.gejala_mobilitas);
          setCheckboxValues('bukti_mobilitas', data.bukti_mobilitas);
          setCheckboxValues('hasil_mobilitas', data.hasil_mobilitas);
          setCheckboxValues('dukungan_mobilisasi', data.dukungan_mobilisasi);
          $('#laiinnya_mobilisasi').val(data.laiinnya_mobilisasi || '');

          setCheckboxValues('gangguan_penyapihan', data.gangguan_penyapihan);
          setCheckboxValues('buktikan_penyapihan', data.buktikan_penyapihan);
          setCheckboxValues('hasil_penyapihan', data.hasil_penyapihan);
          $('#laiinnya_penyapihan').val(data.laiinnya_penyapihan || '');

          setCheckboxValues('bukti_gangguan_pertukaran_gas', data.bukti_gangguan_pertukaran_gas);
          setCheckboxValues('hasil_pertukaran_gas', data.hasil_pertukaran_gas);
          $('#laiinnya_pertukaran_gas').val(data.laiinnya_pertukaran_gas || '');


          setCheckboxValues('gangguan_poldur', data.gangguan_poldur);
          setCheckboxValues('bukti_gangguan_poldur', data.bukti_gangguan_poldur);
          setCheckboxValues('hasil_gangguan_poldur', data.hasil_gangguan_poldur);
          setCheckboxValues('dukungan_poldur', data.dukungan_poldur);
          $('#laiinnya_poldur').val(data.laiinnya_poldur || '');

          setCheckboxValues('resiko_jatuh', data.resiko_jatuh);
          setCheckboxValues('bukti_resiko_jatuh', data.bukti_resiko_jatuh);
          setCheckboxValues('minor_resiko_jatuh', data.minor_resiko_jatuh);
          setCheckboxValues('hasil_resiko_jatuh', data.hasil_resiko_jatuh);
          setCheckboxValues('manajemen_resiko_jatuh', data.manajemen_resiko_jatuh);
          $('#laiinnya_jatuh').val(data.laiinnya_jatuh || '');

          setCheckboxValues('defisit_perawatan_diri', data.defisit_perawatan_diri);
          setCheckboxValues('bukti_defisit_perawatan_diri', data.bukti_defisit_perawatan_diri);
          setCheckboxValues('hasil_defisit_perawatan_diri', data.hasil_defisit_perawatan_diri);
          $('#laiinnya_perawatan_diri').val(data.laiinnya_perawatan_diri || '');

          setCheckboxValues('bukti_hipovolemia', data.bukti_hipovolemia);
          setCheckboxValues('hasil_hipovolemia', data.hasil_hipovolemia);
          $('#laiinnya_hipovolemia').val(data.laiinnya_hipovolemia || '');

          setCheckboxValues('intoleransi_aktivitas', data.intoleransi_aktivitas);
          setCheckboxValues('bukti_intoleransi_aktivitas', data.bukti_intoleransi_aktivitas);
          setCheckboxValues('minor_intoleransi_aktivitas', data.minor_intoleransi_aktivitas);
          setCheckboxValues('hasil_intoleransi_aktivitas', data.hasil_intoleransi_aktivitas);
          setCheckboxValues('manajemen_intoleransi_aktivitas', data.manajemen_intoleransi_aktivitas);
          $('#laiinnya_aktivitas').val(data.laiinnya_aktivitas || '');

          setCheckboxValues('curah_jantung', data.curah_jantung);
          setCheckboxValues('bukti_curah_jantung', data.bukti_curah_jantung);
          setCheckboxValues('hasil_curah_jantung', data.hasil_curah_jantung);
          setCheckboxValues('perawatan_jantung', data.perawatan_jantung);
          // setCheckboxValues('laiinnya_perawatan_jantung', data.laiinnya_perawatan_jantung);
          $('#laiinnya_perawatan_jantung').val(data.laiinnya_perawatan_jantung || '');

          setCheckboxValues('bukti_penurunan_adaptif', data.bukti_penurunan_adaptif);
          setCheckboxValues('hasil_penurunan_adaptif', data.hasil_penurunan_adaptif);
          setCheckboxValues('manajemen_peningkatan_adaptif', data.manajemen_peningkatan_adaptif);
          $('#laiinnya_peningkatan_adaptif').val(data.laiinnya_peningkatan_adaptif || '');

          setCheckboxValues('hubungan_perfusi_perifier', data.hubungan_perfusi_perifier);
          setCheckboxValues('bukti_perfusi_perifer', data.bukti_perfusi_perifer);
          setCheckboxValues('hasil_perfusi_perifer', data.hasil_perfusi_perifer);
          // setCheckboxValues('laiinnya_perfusi_perifer', data.laiinnya_perfusi_perifer);
          $('#laiinnya_perfusi_perifer').val(data.laiinnya_perfusi_perifer || '');

          setCheckboxValues('hubungan_nafas_tidak_efektif', data.hubungan_nafas_tidak_efektif);
          setCheckboxValues('bukti_nafas_tidak_efektif', data.bukti_nafas_tidak_efektif);
          setCheckboxValues('hasil_nafas_tidak_efektif', data.hasil_nafas_tidak_efektif);
          setCheckboxValues('manajamen_nafas_tidak_efektif', data.manajamen_nafas_tidak_efektif);
          // setCheckboxValues('laiinnya_nafas_tidak_efektif', data.laiinnya_nafas_tidak_efektif);
          $('#laiinnya_nafas_tidak_efektif').val(data.laiinnya_nafas_tidak_efektif || '');

          setCheckboxValues('bukti_resiko_defisit_nutrisi', data.bukti_resiko_defisit_nutrisi);
          setCheckboxValues('hasil_resiko_defisit_nutrisi', data.hasil_resiko_defisit_nutrisi);
          setCheckboxValues('manajamen_resiko_defisit_nutrisi', data.manajamen_resiko_defisit_nutrisi);
          // setCheckboxValues('laiinnya_defisit_nutrisi', data.laiinnya_defisit_nutrisi);
          $('#laiinnya_defisit_nutrisi').val(data.laiinnya_defisit_nutrisi || '');

          
          setCheckboxValues('bukti_resiko_hipovolemia', data.bukti_resiko_hipovolemia);
          setCheckboxValues('hasil_resiko_hipovolemia', data.hasil_resiko_hipovolemia);
          setCheckboxValues('manajamen_resiko_hipovolemia', data.manajamen_resiko_hipovolemia);
          // setCheckboxValues('laiinnya_resiko_hipovolemia', data.laiinnya_resiko_hipovolemia);
          $('#laiinnya_resiko_hipovolemia').val(data.laiinnya_resiko_hipovolemia || '');

          setCheckboxValues('bukti_resiko_infeksi', data.bukti_resiko_infeksi);
          setCheckboxValues('hasil_resiko_infeksi', data.hasil_resiko_infeksi);
          setCheckboxValues('pencegahan_resiko_infeksi', data.pencegahan_resiko_infeksi);
          // setCheckboxValues('laiinnya_resiko_infeksi', data.laiinnya_resiko_infeksi);
          $('#laiinnya_resiko_infeksi').val(data.laiinnya_resiko_infeksi || '');

          setCheckboxValues('bukti_resiko_ketidakstabilan_gula_darah', data.bukti_resiko_ketidakstabilan_gula_darah);
          setCheckboxValues('hasil_resiko_ketidakstabilan_gula_darah', data.hasil_resiko_ketidakstabilan_gula_darah);
          setCheckboxValues('manajemen_hiperglikimia', data.manajemen_hiperglikimia);
          setCheckboxValues('manajemen_hipoglikimia', data.manajemen_hipoglikimia);
          // setCheckboxValues('laiinnya_hipoglikimia', data.laiinnya_hipoglikimia);
          $('#laiinnya_hipoglikimia').val(data.laiinnya_hipoglikimia || '');


          setCheckboxValues('bukti_resiko_perdarahan', data.bukti_resiko_perdarahan);
          setCheckboxValues('hasil_resiko_perdarahan', data.hasil_resiko_perdarahan);
          setCheckboxValues('pencegahan_resiko_perdarahan', data.pencegahan_resiko_perdarahan);
          // setCheckboxValues('laiinnya_resiko_perdarahan', data.laiinnya_resiko_perdarahan);

          $('#laiinnya_resiko_perdarahan').val(data.laiinnya_resiko_perdarahan || '');

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

  // function pilih(id) {
  //   $('#id').val(id);
  //   $.ajax({
  //     url: "<?php echo base_url() ?>Erm_ranap_rencana_keperawatan/getPerRencana",
  //     method: "POST",
  //     dataType: 'json',
  //     data: {
  //       id: id
  //     },
  //     success: function(data) {
  //       if (data.status_dt == "found") {
  //         $('#id').val(data.id_rencana);
  //         $('#inTgl').val(data.tanggal);

  //         $('#edit').show();
  //         // $('#cetak').show();
  //         $('#simpan').hide();
  //         // smooth scroll
  //         window.scrollTo({
  //           top: 0,
  //           behavior: 'smooth'
  //         });
  //       } else {
  //         swal({
  //           title: "Gagal!",
  //           type: "warning",
  //           text: "Data Kosong",
  //           confirmButtonColor: "#3cb878",
  //         });
  //       }
  //     }

  //   });
  //   return false;

  // }

  //   function cetak() {
  //     id = $('#id').val();
  //     window.location.href = "<?php echo base_url('Erm_igd_edit/print_penunjang/') ?>" + id;
  //   }
</script>