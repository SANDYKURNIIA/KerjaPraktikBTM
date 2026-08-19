<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">

      <div class="panel-heading">
        <div class="pull-left">
          <strong>
            <h6 class="panel-title txt-dark">RINGKASAN PASIEN PULANG (DISCHARGE SUMMARY)</h6>
          </strong>


          <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in" id="myDiv">
          <div class="panel-body">
            <div class="form-wrap">

              <div class="form-group">
                <!-- <form id="formUpload"> -->
                <input type="hidden" class="form-control" value="<?php echo $id_pelayanan ?>" name="inPel" id="inPel">
                <input type="hidden" class="form-control" value="<?php echo $id_history ?>" name="inHis" id="inHis">
                <input type="hidden" class="form-control" value="" id="id" name="id">
                <input type="text" class="form-control" style="display: none;" name="id_pelayanan" value="<?php echo $id_pelayanan ?>" id="id_pelayanan">

                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Ruang :<span class="help"></span></label>
                  <div class="has-success">
                    <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                    <input type="text" class="form-control" id="nama_ruangan" value="<?php echo $nama_ruangan ?>" disabled>
                    <!-- <span class="help-block"></span> -->
                  </div>
                </div>


                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Nama Pasien :<span class="help"></span></label>
                  <div class="has-success">
                    <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                    <input type="text" class="form-control" id="inNama" value="<?php echo $nama ?>" disabled>
                    <!-- <span class="help-block"></span> -->
                  </div>
                </div>
                <!-- <input type="hidden" class="form-control" name="inNoRM" id="inNoRM" value="<?php echo $no_rm ?>"> -->

                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Kelas :<span class="help"></span></label>
                  <span id="alamat_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="text" class="form-control" id="kelas" value="<?php echo $kelas ?>" disabled>
                  </div>
                </div>

                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Dokter :</label>
                  <span id="dpjp1_error" class="text-danger"></span>
                  <div class="has-success">
                    <input type="text" class="form-control" id="dpjp1" value="<?php echo $dokter ?>" disabled>

                  </div>
                </div>

                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Tgl. Lahir : <span class="help"></span></label>
                  <span id="tanggal_error" class="text-danger"></span>
                  <div class="has-success">
                    <?php

                    $tanggal_indonesia = date("d/m/Y", strtotime($tgl_lahir));

                    echo '<input type="text" disabled class="form-control" value="' . $tanggal_indonesia . '">';
                    ?>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Alamat :<span class="help"></span></label>
                  <div class="has-success">
                    <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                    <input type="text" class="form-control" id="alamat" value="<?php echo $alamat ?>" disabled>
                    <span class="help-block"></span>
                  </div>
                </div>

              </div>

              <!-- <form id="formUpload"> -->
              <input type="hidden" class="form-control" value="<?php echo $id_pelayanan ?>" name="inPel" id="inPel">
              <input type="hidden" class="form-control" value="<?php echo $id_history ?>" name="inHis" id="inHis">
              <input type="hidden" class="form-control" value="" id="id" name="id">
              <!-- <input type="hidden" class="form-control" name="inNoRM" id="inNoRM" value="<?php echo $no_rm ?>"> -->
              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">No. RM :<span class="help"></span></label>
                  <div class="has-success">
                    <!-- <input type="text" class="form-control" id="in" disabled> -->
                    <input type="text" class="form-control" id="inNoRM" value="<?php echo $no_rm ?>" disabled>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Jenis Kelamin :</label>
                  <!-- <input type="text" disabled class="form-control" id="inJk"> -->
                  <div class="has-success">
                    <input type="text" disabled class="form-control" value="<?php echo $jenis_kelamin ?>" id="inJk">
                  </div>
                </div>
              </div>

              <!-- <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                        <div class="has-success">
                                             <select class="form-control filled-input select2" id="inJO" name="inJO">
                                                <option value="">Jenis Kelamin</option>
                                                <option value="Lakilaki">LK</option>
                                                <option value="Perempuan">PR</option>
                                              </select>
                                        </div>
                                    </div>
                                  </div> -->
              <!-- <div class="col-md-7">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div> -->


              <div class="col-md-4">
                <div class="form-group">

                  <label class="control-label mb-10 text-left">Tgl. Masuk :<span class="help"></span></label>
                  <!-- <input type="text" id="inTglMasuk" disabled class="form-control"> -->
                  <div class="has-success">
                    <input type="text" id="inTglMasuk" disabled class="form-control" value="<?php
                                                                                            setlocale(LC_ALL, 'id_ID');

                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                            $time = strtotime($tgl_masuk);
                                                                                            $date = strftime(" %d %B %Y ", $time);
                                                                                            $jam  = date(" H:i:s ", $time);
                                                                                            echo $jam . '/' . $date ?>">
                  </div>
                </div>
              </div>


              <!-- Kolom pertama -->
              <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Tgl. Keluar : <span
                                            class="help"></span></label>
                                    <span id="tanggal_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div> -->

              <div class="form-group ">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Agama :</label>
                  <!-- <input type="text" disabled class="form-control" id="inJk"> -->
                  <div class="has-success">
                    <input type="text" disabled class="form-control" value="<?php echo $agama ?>" id="agama">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label class="control-label mb-10 text-left">Status Perkawinan :<span class="help"></span></label>
                  <div class="has-success">
                    <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                    <input type="text" disabled class="form-control" value="<?php echo $status ?>" id="status">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-10">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>
              <div class="form-group">
                <div class="col-md-4">
                    <label class="control-label mb-10 text-left">Alasan / Indikasi Masuk RS <span style="color:red;">*</span><span class="help"></span></label>
                    <span id="keluhan_error" class="text-danger"></span>
                    <div class="has-success">
                        <textarea class="form-control" name="keluhan_utama" id="keluhan_utama" cols="30" rows="3"></textarea>
                        <span class="help-block text-danger"></span>
                    </div>
                </div>
                </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="panel panel-default card-view">

                    <div class="pull-left">

                      <strong>
                        <h6 class="panel-title txt-dark">RINGKASAN RIWAYAT PENYAKIT DAN PENEMUAN
                          FISIK PENTING</h6>
                      </strong>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <!-- RIWAYAT -->
                  <div class="form-group">
                    <div class="col-md-4">
                      <label class="control-label mb-5 text-left">Riwayat <span style="color:red;">*</span></label>
                      <span id="ket_error" class="text-danger"></span>

                      <div class="has-success">
                        <!-- Radio Button Ya/Tidak -->
                        <div class="form-check" hidden>
                          <input class="form-check-input" type="radio" name="riwayat" value="Tidak" id="riwayat_tidak">
                          <label class="form-check-label" for="riwayat_tidak" style="color: black;">Tidak</label>
                        </div>
                        <div class="form-check" hidden>
                          <input class="form-check-input" type="radio" name="riwayat" value="Ya" id="riwayat_ya" checked>
                          <label class="form-check-label" for="riwayat_ya" style="color: black;" >Ya</label>
                        </div>

                        <!-- Kolom Keterangan (disembunyikan default) -->
                        <div id="keterangan_container" >
                          <textarea class="form-control" id="ket" name="ket" rows="2" placeholder="Isi keterangan di sini..."></textarea>
                          <span class="help-block text-danger"></span>
                        </div>
                      </div>
                    </div>
                  </div>
<!-- 
                  <script>
                    document.addEventListener("DOMContentLoaded", function() {
                      const ya = document.getElementById("riwayat_ya");
                      const tidak = document.getElementById("riwayat_tidak");
                      const ketContainer = document.getElementById("keterangan_container");

                      function toggleKeterangan() {
                        if (ya && ya.checked || ) {
                          ketContainer.style.display = "block";
                        } else {
                          ketContainer.style.display = "none";
                          const t = document.getElementById("ket");
                          if (t) t.value = "";
                        }
                      }

                      if (ya) ya.addEventListener("change", toggleKeterangan);
                      if (tidak) tidak.addEventListener("change", toggleKeterangan);
                    });
                  </script> -->

                  <!-- PEMERIKSAAN FISIK (full width) -->
                  <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">Pemeriksaan Fisik :</label>
                      <div class="has-success" id="p_fisik">
                        <span class="help-block text-danger"></span>
                      </div>
                      <br>
                      <div class="has-success" id="p_fisik_2">
                        <span class="help-block text-danger"></span>
                      </div>
                    </div>
                  </div>

                  <!-- Pemeriksaan Penunjang Diagnostik (full width) -->
                  <!-- Pemeriksaan Penunjang Diagnostik (full width) -->
<div class="form-group">
  <div class="col-md-12">
    <label class="control-label mb-10 text-left">Pemeriksaan Penunjang Diagnostik :</label>

    <div class="has-success">
      <label class="form-check form-check-inline " style="color: black;">
        <input class="form-check-input" type="checkbox" name="penunjang[]" id="radiologi" value="Radiologi">
        <span>Radiologi</span>
      </label>

      <label class="form-check form-check-inline" style="color: black;">
        <input class="form-check-input" type="checkbox" name="penunjang[]" id="laboratorium" value="Laboratorium">
        <span>Laboratorium</span>
      </label>

      <label class="form-check form-check-inline" style="color: black;">
        <input class="form-check-input" type="checkbox" name="penunjang[]" id="lain" value="Lain-lain">
        <span>Lain-lain</span>
      </label>
    </div>

    <!-- Keterangan "Lain-lain" -->
    <div id="lain_container" style="display:none; margin-top:10px;">
      <label class="control-label" for="ket_lain">Sebutkan :</label>
      <textarea class="form-control" id="ket_lain" name="ket_lain" rows="2"
                placeholder="Tuliskan pemeriksaan lain di sini..."></textarea>
    </div>
  </div>

  <div class="col-md-12">
    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
  </div>
</div>

<script>
  // Tampilkan/sembunyikan textarea saat "Lain-lain" dicentang
  document.addEventListener('DOMContentLoaded', function() {
    const cbLain = document.getElementById('lain');
    const box    = document.getElementById('lain_container');
    const ket    = document.getElementById('ket_lain');

    function toggle() {
      if (cbLain && cbLain.checked) {
        box.style.display = 'block';
      } else {
        box.style.display = 'none';
        if (ket) ket.value = '';
      }
    }
    if (cbLain) {
      cbLain.addEventListener('change', toggle);
      toggle(); // init
    }
  });
</script>


                  <!-- Baris 1: Hasil Pemeriksaan Penunjang | Diagnosa Saat Masuk -->
                  <div class="form-group">
                    <div class="col-md-6">
                      <label class="control-label mb-10 text-left">Hasil Pemeriksaan Penunjang:</label>
                      <div class="has-success">
                        <textarea class="form-control" style="font-weight: bold;" disabled rows="2" id="hasil" name="hasil">Terlampir</textarea>
                        <span class="help-block text-danger"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label class="control-label mb-10 text-left">Diagnosa Saat Masuk:</label>
                      <div class="has-success">
                        <textarea class="form-control" disabled readonly name="diagnosa" id="diagnosa" rows="2"></textarea>
                        <span class="help-block text-danger"></span>
                      </div>
                    </div>
                  </div>

                  <!-- Baris 2: Prosedur | Edukasi -->
                  <div class="form-group">
                    <div class="col-md-6">
                      <label class="control-label mb-10 text-left">
                        Prosedur Terapi &amp; Tindakan Yang Telah Dikerjakan:
                      </label>
                      <div class="has-success">
                        <textarea class="form-control" id="prosedur_terapi" name="prosedur_terapi" rows="3"></textarea>
                        <span class="help-block"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label class="control-label mb-10 text-left">
                        Edukasi Yang Sudah Diberikan:
                      </label>
                      <div class="has-success">
                        <textarea class="form-control" id="edukasi" name="edukasi" rows="3"></textarea>
                        <span class="help-block text-danger"></span>
                      </div>
                    </div>
                  </div>

                  <!-- Baris 3 (sejajar dengan Baris 2): Alasan Pasien Saat Pulang | Keadaan Waktu Pulang -->
                  <div class="form-group">
                    <!-- Kolom 1: Alasan Pasien Saat Pulang (→ kolom 'keadaan') -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label mb-10 text-left">Alasan Pasien Saat Pulang:</label>
                        <span id="ruang_rawat_error" class="text-danger"></span>
                        <div class="has-success">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="keadaan" value="Diizinkan Dokter" id="keadaan1">
                            <label class="form-check-label" for="keadaan1" style="color: black;">Diizinkan Dokter</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="keadaan" value="Pulang Paksa" id="keadaan2">
                            <label class="form-check-label" for="keadaan2" style="color: black;">Pulang Paksa</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="keadaan" value="Meninggal < 48 jam" id="keadaan3">
                            <label class="form-check-label" for="keadaan3" style="color: black;">Meninggal &lt; 48 jam</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="keadaan" value="Meninggal > 48 jam" id="keadaan4">
                            <label class="form-check-label" for="keadaan4" style="color: black;">Meninggal &gt; 48 jam</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="keadaan" value="Dirujuk" id="keadaan5">
                            <label class="form-check-label" for="keadaan5" style="color: black;">Dirujuk</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="keadaan" value="Atas Permintaan Sendiri(APS)" id="keadaan6">
                            <label class="form-check-label" for="keadaan6" style="color: black;">Atas Permintaan Sendiri (APS)</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Kolom 2: Keadaan Waktu Pulang (→ kolom 'keadaan_pulang') -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label mb-10 text-left">Keadaan Waktu Pulang:</label>
                        <div class="has-success">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="keadaan_pulang" value="Sembuh" id="keadaan_wp1">
                            <label class="form-check-label" for="keadaan_wp1" style="color: black;">Sembuh</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="keadaan_pulang" value="Belum Sembuh" id="keadaan_wp2">
                            <label class="form-check-label" for="keadaan_wp2" style="color: black;">Belum Sembuh</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="keadaan_pulang" value="Perbaikan" id="keadaan_wp3">
                            <label class="form-check-label" for="keadaan_wp3" style="color: black;">Perbaikan</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="keadaan_pulang" value="Meninggal" id="keadaan_wp4">
                            <label class="form-check-label" for="keadaan_wp4" style="color: black;">Meninggal</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <br>

                  <div class="form-group">
                    <div class="col-md-8">
                      <div class="row ">
                        <div class="col-md-4">
                          <strong>
                            <label class="control-label mb-10 text-left">
                              <b>Diagnosa (ICD-10): </b><span class="help"></span>
                            </label>
                          </strong>
                        </div>
                        <div class="col-md-8">
                          <div class="input-group has-success">
                            <input type="text" class="form-control" id="diagnosa_search" placeholder="Cari Diagnosa">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group" style="margin-top:20px;">
                        <u>
                          <h6 class="panel-title txt-dark">LIST DIAGNOSA:</h6>
                        </u>
                        <br>
                        <div id="diagnosa_ranap" style="margin-top:15px;"></div>
                      </div>
                    </div>
                  </div>
                  <br>

                  <!-- Diagnosa new -->
                      <div class="col-md-6">
                      <label class="control-label mb-10 text-left">
                        Diagnosa : 
                      </label>
                      <div class="has-success">
                        <textarea class="form-control" id="diagnosa2" name="diagnosa2" rows="3"></textarea>
                        <span class="help-block"></span>
                      </div>
                    </div>


                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="panel panel-default card-view">
                        <div class="pull-left">
                          <strong>
                            <h6 class="panel-title txt-dark">TERAPI</h6>
                          </strong>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <!-- Kolom 1: Hari/Tanggal Kontrol -->
                    <div class="col-md-6">
                      <label class="control-label mb-10 text-left">Hari/Tanggal Kontrol ke RS:</label>
                      <input type="text" class="form-control" id="tgl_kontrol" name="tgl_kontrol" placeholder="Pilih tanggal">
                      <input type="hidden" id="tgl_kontrol_iso" name="tgl_kontrol_iso">
                      <span class="help-block text-danger"></span>
                    </div>

                    <!-- Kolom 2: Poliklinik -->
                    <div class="col-md-6">
                      <label class="control-label">Poliklinik:</label>
                      <select id="id_list_poli" name="id_list_poli" class="form-control">
                        <option value=""></option>
                      </select>
                    </div>
                  </div>

                  <script>
                    $(function() {
                      var $sel = $('#id_list_poli');
                      var placeholder = "-- Pilih poliklinik --";

                      // Siapkan option kosong di index 0
                      $sel.html('<option value="" selected></option>');

                      $.getJSON("<?= base_url('Erm_resume_pulang/get_list_poli'); ?>", function(res) {
                        var frag = document.createDocumentFragment();
                        (res || []).forEach(function(row) {
                          frag.appendChild(new Option(row.nama_panjang, row.id_list_poli, false, false));
                        });
                        $sel.append(frag);

                        // Jika Select2 ada -> init dengan placeholder
                        if ($.fn.select2) {
                          $sel.select2({
                            placeholder: placeholder,
                            allowClear: true,
                            width: '100%'
                          });

                          // Paksa tetap kosong (robust)
                          $sel.val('').trigger('change'); // state Select2
                          $sel.prop('selectedIndex', 0); // state native
                          $sel.find('option').prop('selected', false);
                        } else {
                          // Fallback native: tampilkan teks placeholder
                          $sel.find('option[value=""]').text(placeholder);
                          $sel.prop('selectedIndex', 0);
                        }

                        // Jika ada script lain yg set value setelah ini, kosongkan lagi
                        setTimeout(function() {
                          if ($sel.val()) {
                            $sel.val('').trigger('change');
                            $sel.prop('selectedIndex', 0);
                          }
                        }, 0);
                      });
                    });
                  </script>




                  </script>


                  <script>
                    const tglInput = document.getElementById('tgl_kontrol');
                    const tglIso = document.getElementById('tgl_kontrol_iso');

                    if (tglInput) {
                      tglInput.addEventListener('focus', function() {
                        this.type = 'date';
                      });

                      tglInput.addEventListener('change', function() {
                        if (this.value) {
                          // Simpan ISO ke hidden
                          if (tglIso) tglIso.value = this.value; // YYYY-MM-DD
                          // Tampilkan format lokal di textbox
                          const [y, m, d] = this.value.split('-').map(Number);
                          const tanggal = new Date(y, m - 1, d);
                          const options = {
                            weekday: 'long',
                            day: '2-digit',
                            month: 'long',
                            year: 'numeric'
                          };
                          this.type = 'text';
                          this.value = tanggal.toLocaleDateString('id-ID', options); // Kamis, 21 Agustus 2025
                        } else {
                          if (tglIso) tglIso.value = '';
                        }
                      });
                    }
                  </script>



                  <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                      <div class="panel-body">
                        <div class="form-group">
                          <div class="col-md-12">
                            <div class="table-wrap">
                              <div class="table-responsive">
                                <table class="table table-hover display pb-60" id="tabel_terapi">
                                  <thead>
                                    <tr class="bg-success">
                                      <th>NAMA OBAT</th>
                                      <th>DOSIS</th>
                                      <th>FREKUENSI</th>
                                      <th>CARA PEMBERIAN</th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr class="bg-success">
                                      <th>NAMA OBAT</th>
                                      <th>DOSIS</th>
                                      <th>FREKUENSI</th>
                                      <th>CARA PEMBERIAN</th>
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


                  <div class="form-group text-center" style="margin-top: 30px;">
                    <div class="col-md-12">
                      <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>
                    <div class="col-md-12 text-center">
                      <a class="btn btn-default btn-sm" onclick="javascript:history.go(-1)"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                      <a type="button" class="btn btn-success btn-sm" id="simpan" onclick="simpan()">SIMPAN</a>
                      <a type="button" target="_blank" class="btn btn-primary btn-sm" id="cetak" href="<?php echo base_url('Erm_resume_pulang/print_out/' . $id_pelayanan . '/' . $id_history . '') ?>">Cetak</a>

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
  <div id="loading" style="display:none;">
    <div class="spinner"></div>
    <p>Sedang memuat...</p>
  </div>
  <style>
    #t_fisik td {
      padding-right: 15px;
    }

    #loading {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      /* Latar belakang semi-transparan */
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1000;
      /* Pastikan di atas konten lain */
      flex-direction: column;
    }

    .spinner {
      border: 4px solid rgba(0, 0, 0, 0.3);
      border-top: 4px solid #3498db;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      animation: spin 2s linear infinite;
      margin-bottom: 10px;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
  </style>
  <script type="text/javascript">
    let diagnose_arry = []; // Deklarasikan di scope global
    $(document).ready(function() {
      id_pelayanan = $('#inPel').val();
      id_history = $('#inHis').val();
      reload_data_terapi_id_pel(id_pelayanan);
    });
  </script>

  <script type="text/javascript">
    function reload_data_terapi_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
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
          "url": '<?php echo base_url('erm_igd/tampil_list_terapi'); ?>',
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
  </script>
  <script>
   $(document).ready(function () {
  // NEW: hindari global leak, pakai const
  const id_pelayanan = $('#inPel').val();
  const id_history   = $('#inHis').val();

  $('#loading').show();

  $.ajax({
    url: "<?php echo base_url() ?>Erm_resume_pulang/get_data_resume",
    method: "POST",
    dataType: "json",
    data: { id: id_pelayanan, id_history: id_history },
    success: function (data) {
      if (data.status == 'success') {
          // nilai dasar
        $('#keluhan_utama').val(data.alasan);
        // NEW: fallback dua sumber riwayat, ambil yang tersedia
        $('#riwayat').val(
          (data.resume && data.resume.riwayat_sekarang)
            ? data.resume.riwayat_sekarang
            : (data.riwayat_sekarang || "")
        );
        const ketContainer = document.getElementById("keterangan_container");

        $('#ket').val(data.resume.riwayat_sekarang);

        if (data.resume.riwayat_sekarang) {
          $('input[id="riwayat_ya"]').prop('checked', true);
          ketContainer.style.display = 'block';
        }

        $('#diagnosa').val(data.diagnosa);
        $('#prosedur_terapi').val(data.resume ? data.resume['terapi'] : "");
        $('#edukasi').val(data.resume ? data.resume['konsul'] : "");
        $('#keadaan').val(data.resume ? data.resume['keadaan_pulang'] : "").change();

        // rakit tabel fisik
        var html =
          "<table id='t_fisik'>" +
          "<tr><td>a. Tanda Vital: </td></tr>" +
          "<tr>" +
          "<td>GCS : " + (data.resume ? data.resume['gcs'] : "") + " </td>" +
          "<td>E : " + (data.resume ? data.resume['e'] : "") + " </td>" +
          "<td>M : " + (data.resume ? data.resume['m'] : "") + " </td>" +
          "<td>V : " + (data.resume ? data.resume['v'] : "") + " </td>" +
          "</tr>" +
          "<tr>" +
          "<td>Tekanan darah : " + (data.resume ? data.resume['tekanan_darah'] : "") + " MmHg</td>" +
          "<td>Suhu : " + (data.resume ? data.resume['suhu'] : "") + " &deg;C</td>" +
          "<td>Nadi : " + (data.resume ? data.resume['frequensi_nadi'] : "") + " x/menit</td>" +
          "<td>Pernafasan : " + (data.resume ? data.resume['frequensi_nafas'] : "") + " x/menit</td>" +
          "</tr>" +
          "<tr>" +
          "<td>SPO2 : " + (data.resume ? data.resume['spo2'] : "") + " </td>" +
          "<td>Berat Badan : " + (data.resume ? data.resume['berat_badan'] : "") + " kg</td>" +
          "<td>Tinggi Badan : " + (data.resume ? data.resume['tinggi_badan'] : "") + " cm</td>" +
          "<td></td>" +
          "</tr>" +
          "</table>";

        $('#p_fisik').html(html).attr("style", "color:black");

        // NEW: aman jika resume null
        const tabelHTML = generatePemeriksaanFisikTable(data.resume || {});
        $('#p_fisik_2').html(tabelHTML).attr("style", "color:black");

        let htmlDiagnosa = generateDiagnosa(data.diagnosa_ranap || []);
        $('#diagnosa_ranap').html(htmlDiagnosa).attr("style", "color:black");

        // NEW: hindari global leak
        const diagnose_arry = data.diagnosa_ranap || [];
        console.log("Data diagnose_arry dari AJAX pertama:", diagnose_arry);

        reload_data_terapi_id_pel(id_pelayanan);
      }
      $('#loading').hide();

      
    },
    // NEW: pastikan loading disembunyikan saat error
    error: function (xhr, status, err) {
      console.error("Gagal get_data_resume:", status, err);
      $('#loading').hide();
    }
  });
});

    function generatePemeriksaanFisikTable(data) {
      let html = `
                <table>
                <tr>
                    <td>b. Pemeriksaan Fisik:</td>
            `;

      const allNormal = (
        data.kepala === "Dalam Batas Normal" &&
        data.hidung === "Dalam Batas Normal" &&
        data.mulut === "Dalam Batas Normal" &&
        data.leher === "Dalam Batas Normal" &&
        data.thorax === "Dalam Batas Normal" &&
        data.jantung === "Dalam Batas Normal" &&
        data.paru === "Dalam Batas Normal" &&
        data.andomen === "Dalam Batas Normal" &&
        data.punggung === "Dalam Batas Normal" &&
        data.ekstremitas === "Dalam Batas Normal"
      );

      if (allNormal) {
        html += `
          <td>Dalam Batas Normal</td>
        </tr>
    `;
      } else {
        html += `
        <td></td>
      </tr>
    `;

        if (data.kepala !== "Dalam Batas Normal") {
          html += `
        <tr>
          <td>Kepala :</td>
          <td>${data.kepala}</td>
        </tr>
      `;
        }
        if (data.hidung !== "Dalam Batas Normal") {
          html += `
        <tr>
          <td>Hidung :</td>
          <td>${data.hidung}</td>
        </tr>
      `;
        }
        if (data.mulut !== "Dalam Batas Normal") {
          html += `
        <tr>
          <td>Mulut :</td>
          <td>${data.mulut}</td>
        </tr>
      `;
        }
        if (data.leher !== "Dalam Batas Normal") {
          html += `
        <tr>
          <td>Leher :</td>
          <td>${data.leher}</td>
        </tr>
      `;
        }
        if (data.thorax !== "Dalam Batas Normal") {
          html += `
        <tr>
          <td>Thorax :</td>
          <td>${data.thorax}</td>
        </tr>
      `;
        }
        if (data.jantung !== "Dalam Batas Normal") {
          html += `
        <tr>
          <td>Jantung :</td>
          <td>${data.jantung}</td>
        </tr>
      `;
        }
        if (data.paru !== "Dalam Batas Normal") {
          html += `
        <tr>
          <td>Paru :</td>
          <td>${data.paru}</td>
        </tr>
      `;
        }
        if (data.andomen !== "Dalam Batas Normal") {
          html += `
        <tr>
          <td>Andomen :</td>
          <td>${data.andomen}</td>
        </tr>
      `;
        }
        if (data.punggung !== "Dalam Batas Normal") {
          html += `
        <tr>
          <td>Punggung :</td>
          <td>${data.punggung}</td>
        </tr>
      `;
        }
        if (data.ekstremitas !== "Dalam Batas Normal") {
          html += `
        <tr>
          <td>Ekstremitas :</td>
          <td>${data.ekstremitas}</td>
        </tr>
      `;
        }
      }

      html += `
    </table>
  `;
      return html;
    }

    function generateDiagnosa(data) {
      let html = '';
      data.forEach((item, index) => {
        const parts = item.diagnosa.split(" - ");
        const code = parts[0];
        // const description = parts.slice(1).join(" - ");
        const id = `diag_no_${index}_${code.replace('.', '')}`;
        const id_diag = `${code.replace('.', '')}_${index}`;

        html += `
      <div class="diagitem" id="${id}">
        <span onclick="klikspan(${index})">${item.diagnosa}</span>&nbsp;<span style="color:#888;">${item.ket}</span>

      </div>
        <div class="row form_${index} collapse" style="margin-top:5px;">
            <div class="col-md-6" id="editDiag_${index}">
                <div class="input-group has-success col-md-12">
                        <input type="text" class="form-control" id="cari_diagnosa_edit_${index}" placeholder="Substitusi">
                        <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
                </div>
            </div>
            <div class="has-danger col-md-1">
                <button class="btn btn-danger" onclick="hapus_data_diagnosa(${index})"><i class="glyphicon glyphicon-trash "></i></button>
            </div>
        </div>
        <hr>
    `;
      });
      return html;
    }

    function klikspan(id) {
      $(`.form_${id}`).collapse('toggle');
    }
  </script>
  <style>
    .diagitem {
      font-size: 17px;
      cursor: pointer;
    }
  </style>
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
  <script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/dist/jquery-ui.js'); ?>"></script>
  <script type="text/javascript">
    $(document).ready(function() {

      $('#diagnosa_search').autocomplete({
        source: function(query, response) {

          $.ajax({
            url: "<?php echo base_url(); ?>Erm_resume_pulang/getDiagnosa",
            type: "POST",
            dataType: "json",
            data: {
              query: query,
            },

            success: function(data) {
              response(data);

            },

          });
        },
        focus: function(event, ui) {
          $('#diagnosa_search').val(ui.item.value);
          return false;
        },
        select: function(event, ui) {

          $('#diagnosa_search').val(ui.item.value); // Set the value in the input field

          // Lakukan AJAX request untuk menyimpan ke database
          var diagnosaObj = {
            diagnosa: ui.item.value, // Contoh properti ID jika ada
            ket: "Sekunder",
          };

          diagnose_arry.push(diagnosaObj);
          console.log("Nilai diagnose_arry saat select:", diagnose_arry);
          getDataDiagnosa();
          $('#diagnosa_search').val('');
          $.toast({
            heading: 'Success!',
            text: 'Diagnosa telah ditambah',
            showHideTransition: 'fade',
            icon: 'success'
          });

        },
      });


    });

    $(document).on('focus', '[id^="cari_diagnosa_edit_"]', function() {
      var currentInput = $(this);
      var index = currentInput.attr('id').split('_')[3];
      currentInput.autocomplete({
        source: function(query, response) {
          $.ajax({
            url: "<?php echo base_url(); ?>Erm_resume_pulang/getDiagnosa",
            type: "POST",
            dataType: "json",
            data: {
              query: query,
            },
            success: function(data) {
              response(data);
            },
          });
        },
        focus: function(event, ui) {
          currentInput.val(ui.item.value);
          return false;
        },
        select: function(event, ui) {
          currentInput.val(ui.item.value);
          var diagnosaObj = {
            diagnosa: ui.item.value, // Contoh properti ID jika ada
            ket: "Sekunder",
          };
          diagnose_arry[index].diagnosa = ui.item.value;
          console.log("Array setelah update:", diagnose_arry);
          getDataDiagnosa(); // Contoh: refresh tampilan tabel diagnosa
          $.toast({
            heading: 'Success!',
            text: 'Diagnosa berhasil diubah',
            showHideTransition: 'fade',
            icon: 'success'
          });
        },
      });
      // Unbind agar autocomplete tidak diinisialisasi ulang setiap kali fokus
      currentInput.off('focus', this);
    });

    function getDataDiagnosa() {
      htmlDiagnosa = generateDiagnosa(diagnose_arry);
      $('#diagnosa_ranap').html(htmlDiagnosa).attr("style", "color:black");

    }


    function hapus_data_diagnosa(indexYangDihapus) {
      // Buat salinan array agar tidak memodifikasi array asli secara langsung (opsional tapi disarankan)
      // const arrayBaru = [...diagnose_arry];
      if (indexYangDihapus >= 0 && indexYangDihapus < diagnose_arry.length) {
        diagnose_arry.splice(indexYangDihapus, 1);
        // diagnose_arry = arrayBaru;
        $.toast({
          heading: 'Success!',
          text: 'Diagnosa telah dihapus',
          showHideTransition: 'fade',
          icon: 'success'
        });
      } else {
        console.warn("Indeks di luar batas array.");
        // diagnose_arry = arrayBaru;
      }
      console.log("Data setelah dihapus indeks ke-" + indexYangDihapus + ":", diagnose_arry);
      getDataDiagnosa();
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    $(function() {
      const no_rm = $('#inNoRM, #no_rm').val() || '';
      const id_pelayanan = $('#inPel, #id_pelayanan').val() || '';

      if (!no_rm) return;

      $.getJSON("<?= base_url('Erm_resume_pulang/last_draft'); ?>", {
          no_rm: no_rm,
          id_pelayanan: id_pelayanan
        },
        function(row) {
          if (!row) return; // belum ada data sebelumnya

          // --- Prefill sederhana ---
          $('#prosedur_terapi').val(row.prosedur_terapi || '');
          $('#edukasi').val(row.edukasi || '');

          // RIWAYAT: "Ya: xxxx" atau "Tidak"
          if ((row.riwayat || '').startsWith('Ya')) {
            $('#riwayat_ya').prop('checked', true).trigger('change');
            // ambil teks setelah "Ya:"
            const ket = (row.riwayat || '').split(':').slice(1).join(':').trim();
            $('#ket').val(ket);
          } else if (row.riwayat === 'Tidak') {
            $('#riwayat_tidak').prop('checked', true).trigger('change');
          }

          // DIAGNOSTIK: Radiologi/Laboratorium/Lain-lain: xxx
          const diag = (row.diagnostik || '').trim();
          if (/^Radiologi$/i.test(diag)) {
            $('#radiologi').prop('checked', true).trigger('change');
          } else if (/^Laboratorium$/i.test(diag)) {
            $('#laboratorium').prop('checked', true).trigger('change');
          } else if (/^Lain-?lain/i.test(diag)) {
            $('#lain').prop('checked', true).trigger('change');
            const ketLain = diag.split(':').slice(1).join(':').trim();
            $('#ket_lain').val(ketLain);
          }

          // ALASAN (radio name="keadaan")
          if (row.alasan) {
            $(`input[name="keadaan"][value="${row.alasan}"]`).prop('checked', true);
          }

          // KEADAAN PULANG (radio name="keadaan_pulang")
          if (row.keadaan_pulang) {
            $(`input[name="keadaan_pulang"][value="${row.keadaan_pulang}"]`).prop('checked', true);
          }

          // TANGGAL KONTROL (ISO -> tampilkan lokal + set hidden)
          if (row.tgl_kontrol) {
            $('#tgl_kontrol_iso').val(row.tgl_kontrol);
            // render tampilan "Kamis, 21 Agustus 2025"
            const parts = row.tgl_kontrol.split('-');
            if (parts.length === 3) {
              const tanggal = new Date(parts[0], parts[1] - 1, parts[2]);
              const options = {
                weekday: 'long',
                day: '2-digit',
                month: 'long',
                year: 'numeric'
              };
              $('#tgl_kontrol').attr('type', 'text')
                .val(tanggal.toLocaleDateString('id-ID', options));
            }
          }

          // POLIKLINIK (dropdown FK)
          if (row.id_list_poli) {
            $('#id_list_poli').val(row.id_list_poli).trigger('change');
          }

          // DIAGNOSA (JSON) — opsional: kalau kamu punya renderer diagnose_arry
          try {
            if (row.diagnosa) {
              const parsed = JSON.parse(row.diagnosa);
              // jika strukturmu [{diagnosa: 'A001 - ...', ket: 'Primer'}, ...]
              window.diagnose_arry = Array.isArray(parsed) ? parsed : [];
              // TODO: panggil fungsi render list diagnosa kamu di sini, mis.:
              // renderDiagnosaList(diagnose_arry);
            }
          } catch (e) {
            /* abaikan parsing error */
          }
        }
      );
    });
  </script>



<script>
  // Helper: kembalikan YYYY-MM-DD dari input lokal (DD/MM/YYYY, DD-MM-YYYY, dsb.)
  function toISODate(raw) {
    if (!raw) return '';
    if (/^\d{4}-\d{2}-\d{2}$/.test(raw)) return raw; // sudah ISO
    const m = raw.match(/^(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})$/);
    if (m) {
      const d  = String(m[1]).padStart(2,'0');
      const mo = String(m[2]).padStart(2,'0');
      const y  = m[3];
      return `${y}-${mo}-${d}`;
    }
    const t = Date.parse(raw);
    if (!isNaN(t)) {
      const dt = new Date(t);
      const y  = dt.getFullYear();
      const mo = String(dt.getMonth()+1).padStart(2,'0');
      const d  = String(dt.getDate()).padStart(2,'0');
      return `${y}-${mo}-${d}`;
    }
    return '';
  }

  // Bangun string diagnostik dari checkbox (dengan “Lain-lain: …” jika diisi)
  function buildDiagnostik() {
    const selected = $('input[name="penunjang[]"]:checked').map(function(){ return this.value; }).get();

    // replace "Lain-lain" -> "Lain-lain: <ket_lain>" bila ada keterangan
    const idx = selected.indexOf('Lain-lain');
    if (idx > -1) {
      const ket = ($('#ket_lain').val() || '').trim();
      selected.splice(idx, 1, ket ? `Lain-lain: ${ket}` : 'Lain-lain');
    }
    return selected.join(', ');
  }

  function simpan() {
    // Ambil hidden id dasar (pakai yang tersedia)
    const id_pelayanan = $('#inPel, #id_pelayanan').val() || '';
    const id_history   = $('#inHis, #id_history').val() || '';
    const no_rm        = $('#inNoRM, #no_rm').val() || '';
    const id_list_poli = ($('#id_list_poli').val() || '').trim();
    const keluhan = ($('#keluhan_utama').val() || '').trim();

    $('#keluhan_utama').removeClass('is-invalid');
    $('#keluhan_error').text('');

    if (keluhan === '') {
      $('html, body').animate({
        scrollTop: $('#keluhan_utama').offset().top - 100
      }, 500);
      $('#keluhan').focus();


      $('#keluhan_utama').addClass('is-invalid');
      $('#keluhan_error').text('Kolom ini wajib diisi!');


      return false;
    }
    
    const k = ($('#ket').val() || '').trim();

    // 1) RIWAYAT (radio + keterangan)
    const riwayatVal = $('input[name="riwayat"]:checked').val() || '';
    let riwayat = riwayatVal;
    if (riwayatVal === 'Ya') {
      riwayat = k ? `Ya: ${k}` : 'Ya';
    } else if (riwayatVal === 'Tidak') {
      riwayat = 'Tidak';
    }

    $('#ket').removeClass('is-invalid');
    $('#ket_error').text('');

    if (k === '') {
      $('html, body').animate({
        scrollTop: $('#ket').offset().top - 100
      }, 500);
      $('#ket').focus();


      $('#ket').addClass('is-invalid');
      $('#ket_error').text('Kolom ini wajib diisi!');


      return false;
    }


    // 2) DIAGNOSTIK dari checkbox (=> kolom 'diagnostik')
    const diagnostik = buildDiagnostik();

    // 3) ALASAN PASIEN SAAT PULANG (radio name="keadaan")
    const alasan = ($('input[name="keadaan"]:checked').val() || '').trim();

    // 4) KEADAAN WAKTU PULANG (radio name="keadaan_pulang")
    const keadaan_pulang = ($('input[name="keadaan_pulang"]:checked').val() || '').trim();

    // 5) PROSEDUR & EDUKASI
    const prosedur_terapi = ($('#prosedur_terapi').val() || '').trim();
    const diagnosa2 = ($('#diagnosa2').val() || '').trim();
    const edukasi         = ($('#edukasi').val() || '').trim();

    // 6) DIAGNOSA (array dari UI)
    const diagnosa = (typeof diagnose_arry !== 'undefined') ? diagnose_arry : [];

    // 7) TANGGAL KONTROL → ambil hidden ISO, fallback parse textbox
    let tgl_kontrol = ($('#tgl_kontrol_iso').val() || '').trim();
    if (!tgl_kontrol) tgl_kontrol = toISODate(($('#tgl_kontrol').val() || '').trim());

    const payload = {
      id_pelayanan,
      id_history,
      no_rm,
      id_list_poli,
      alasan,
      riwayat,
      diagnostik,        // <— akan tersimpan di kolom 'diagnostik'
      keadaan_pulang,
      tgl_kontrol,
      prosedur_terapi,
      edukasi,
      diagnosa,
      diagnosa2
    };

    console.log('PAYLOAD SIMPAN RESUME:', payload);

    $.ajax({
      url: "<?= base_url('Erm_resume_pulang/simpan'); ?>",
      method: "POST",
      dataType: "json",
      data: payload,
      beforeSend: function() { $('#simpan').prop('disabled', true); },
      success: function(res) {
        $('#simpan').prop('disabled', false);
        if (!(res && res.status === 'success')) {
          Swal.fire({ icon:'error', title:'Gagal', text:'Penyimpanan gagal. Cek isian atau hubungi admin.' });
          return;
        }
        // Sukses
        Swal.fire({ icon:'success', title:'Tersimpan!', text:'Ringkasan pasien pulang berhasil disimpan.', showConfirmButton:false, timer:1500 })
        .then(() => {
          const $modal = $('#modalResumePulang');
          if ($modal.length && typeof $modal.modal === 'function') { $modal.modal('hide'); return; }
          if (window.opener && !window.opener.closed) { try{ window.opener.postMessage({type:'resumePulangSaved'}, '*'); }catch(e){} window.close(); return; }
          if (window.parent && window.parent !== window) { try{ window.parent.postMessage({type:'resumePulangSaved'}, '*'); }catch(e){} return; }
          if (document.referrer) window.location.href = document.referrer; else history.back();
        });
      },
      error: function(xhr) {
        $('#simpan').prop('disabled', false);
        console.error(xhr.responseText);
        alert('Terjadi kesalahan saat menyimpan.');
      }
    });
  }
</script>
