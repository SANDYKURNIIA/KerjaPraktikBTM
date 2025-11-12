<?php
$id_pelayanan = $this->uri->segment(3);
$id_history = $this->uri->segment(4);
$laporan_operasi = $this->db->get_where('laporan_operasi', ['id_pelayanan' => $id_pelayanan])->row();
?>

<!-- Row -->
<form>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default card-view">
        <div class="panel-heading">
          <div class="pull-left">
            <h6 class="panel-title txt-dark">Laporan Operasi</h6>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="form-wrap">

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Ruang<span class="help"></span></label>
                  <input type="text" disabled class="form-control"
                    value="<?php echo isset($nama_ruangan) ? $nama_ruangan : '' ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                  <input type="text" disabled class="form-control" value="<?php echo $no_rm ?>" id="inNoRM">
                </div>
              </div>
              <input type="hidden" class="form-control" value="<?php echo $id_pelayanan ?>" id="inPel">
              <input type="hidden" class="form-control" value="<?php echo $id_history ?>" id="inHis">
              <input type="hidden" name="id_laporan" value="<?php echo isset($laporan->id_laporan) ? $laporan->id_laporan : ''; ?>">

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Kelas<span class="help"></span></label>
                  <input type="text" disabled class="form-control" value="<?php echo $kelas ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Nama Pasien<span class="help"></span></label>
                  <input type="text" disabled class="form-control" value="<?php echo $nama ?>">
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                  <input type="text" disabled class="form-control" value="<?php echo $jenis_kelamin ?>">
                </div>
              </div>

              <div class="form-group ">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Tanggal Lahir /umur</label>
                  <input type="text" disabled class="form-control" value="<?php
                  setlocale(LC_ALL, 'id_ID');

                  date_default_timezone_set('Asia/Jakarta');
                  $time = strtotime($tgl_lahir);
                  $date = strftime(" %d %B %Y ", $time);
                  echo $date . '(' . getAge($tgl_lahir) . ')' ?>">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Kamar OK<span class="help"></span></label>
                  <div class="has-success">
                    <textarea name="kamar_ok" id="kamar_ok" class="form-control" rows="1"
                      style="overflow:hidden; resize:none;"></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12">
                  <center> <label class="control-label mb-10 text-left">Surat Izin Operasi : Ada / Tidak Ada, Mohon
                      Dilampirkan<span class="help"></span></label> </center>
                  <span id="rawat_error" class="text-danger"></span>
                  <div class="has-success">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Nama Ahli Bedah<span class="help"></span></label>
                  <div class="has-success">
                    <select class="form-control select2" id="inDPJP" required>
                      <option value="">-- Pilih Ahli Bedah --</option>
                      <?php foreach ($dokter as $d): ?>
                        <?php
                        $nama = trim($d['nama']);
                        if ($nama !== '' && $nama !== '-'):
                          ?>
                          <option value="<?php echo $nama; ?>"><?php echo $nama; ?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Nama Perawat Instrumen<span class="help"></span></label>
                  <div class="has-success">
                    <select class="form-control select2" id="inNamaPerawat" required>
                      <?php foreach ($staff as $s): ?>
                        <option><?php echo $s['nama']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Nama Asisten I<span class="help"></span></label>
                  <div class="has-success">
                    <select class="form-control select2" id="inNamaAsisten1" required>
                      <?php foreach ($staff as $s): ?>
                        <option><?php echo $s['nama']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Nama Asisten II<span class="help"></span></label>
                  <div class="has-success">
                    <select class="form-control select2" id="inNamaAsisten2" required>
                      <?php foreach ($staff as $s): ?>
                        <option><?php echo $s['nama']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <!-- Tambahan 3 field baru -->
              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Sirkuler<span class="help"></span></label>
                  <div class="has-success">
                    <select class="form-control select2" id="inSirkuler" required>
                      <?php foreach ($staff as $s): ?>
                        <option><?php echo $s['nama']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Nama Dokter Anestesi<span class="help"></span></label>
                  <div class="has-success">
                    <select class="form-control select2" id="inDokterAnestesi" name="inDokterAnestesi" required>
                      <option value="">-- Pilih Dokter Anestesi --</option>
                      <?php if (!empty($dokter_anestesi)): ?>
                        <?php foreach ($dokter_anestesi as $d): ?>
                          <option value="<?= $d->nama; ?>"><?= $d->nama; ?></option>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <option value="">Tidak ada dokter aktif</option>
                      <?php endif; ?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-3">
                  <label class="control-label mb-10 text-left">Nama Perawat Anestesi<span class="help"></span></label>
                  <div class="has-success">
                    <select class="form-control select2" id="inPerawatAnestesi" required>
                      <?php foreach ($staff as $s): ?>
                        <option><?php echo $s['nama']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>
<div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label mb-10 text-left">Diagnosa Pra Operasi</label>
                    <div class="has-success">
                      <textarea class="form-control" id="inDiagPra" name="inDiagnosaPra" rows="6"
                        placeholder="Diagnosa Pra Operasi"></textarea>
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label mb-10 text-left">Diagnosa Post Operasi</label>
                    <div class="has-success">
                      <textarea class="form-control" id="inDiagPost" name="inDiagnosaPost" rows="6"
                        placeholder="Diagnosa Post Operasi"></textarea>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label mb-10 text-left">Tindakan Operasi</label>
                    <div class="has-success">
                      <textarea class="form-control" id="inTinOperasi" name="inTinOperasi" rows="6"
                        placeholder="Tindakan Operasi"></textarea>
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label mb-10 text-left">Indikasi Operasi</label>
                    <div class="has-success">
                      <textarea class="form-control" id="inOperasi" name="inOperasi" rows="6"
                        placeholder="Indikasi Operasi"></textarea>
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Jenis Operasi</label>
                  <div class="radio-button radio-button-primary">
                    <div class="col-md-3">
                      <input id="inJenOperasi1" type="radio" name="inJenOperasi" value="Ringan">
                      <label class="control-label" for="inJenOperasi1">Ringan</label>
                    </div>
                    <div class="col-md-3">
                      <input id="inJenOperasi2" type="radio" name="inJenOperasi" value="Sedang">
                      <label class="control-label" for="inJenOperasi2">Sedang</label>
                    </div>
                    <div class="col-md-3">
                      <input id="inJenOperasi3" type="radio" name="inJenOperasi" value="Besar">
                      <label class="control-label" for="inJenOperasi3">Besar</label>
                    </div>
                    <div class="col-md-3">
                      <input id="inJenOperasi4" type="radio" name="inJenOperasi" value="Khusus">
                      <label class="control-label" for="inJenOperasi4">Khusus</label>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tambahkan pemisah baris -->
              <div style="clear: both;"></div>

              <!-- Tambahkan jarak ke atas agar rapi -->
              <div class="form-group" style="margin-top: 15px;">
                <div class="col-md-6">
                  <label class="control-label mb-12 text-left">Jenis Pembiusan</label>
                  <div class="radio-button radio-button-primary" style="margin-top: 8px;">
                    <div class="col-md-4" style="margin-bottom: 8px;">
                      <input id="inAnestesi1" type="radio" name="inAnestesi" value="Lokal Anastesi">
                      <label class="control-label" for="inAnestesi1">Lokal Anastesi</label>
                    </div>
                    <div class="col-md-4" style="margin-bottom: 8px;">
                      <input id="inAnestesi2" type="radio" name="inAnestesi" value="Regional Anastesi">
                      <label class="control-label" for="inAnestesi2">Regional Anastesi</label>
                    </div>
                    <div class="col-md-4" style="margin-bottom: 8px;">
                      <input id="inAnestesi3" type="radio" name="inAnestesi" value="Generali Anastesi">
                      <label class="control-label" for="inAnestesi3">Generali Anastesi</label>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tambahan Field ta Operasi (jarak disamakan dengan atas) -->
              <div class="form-group" style="margin-top: 15px; clear: both;">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Posisi Operasi <span class="help"></span></label>
                  <div class="has-success">
                    <textarea class="form-control" name="inPosisiOperasi" id="inPosisiOperasi" cols="22" rows="8"
                      placeholder="Tuliskan posisi operasi..."></textarea>
                    <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6">
                  <label class="control-label mb-10 text-left">Waktu Operasi<span class="help"></span></label>
                  <div class="has-success">
                    <span class="help-block"></span>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <label class="control-label mb-10 text-left">Tanggal Operasi</label>
                      <div class="has-success">
                        <?php
                        // Mendapatkan tanggal hari ini
                        $tanggal_operasi = date("Y/m/d");
                        echo '<input type="text" id="inTglOperasi" readonly name="inTglOperasi" class="form-control"
        value="' . $tanggal_operasi . '">';
                        ?>
                        <span class="help-block"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label class="control-label mb-10 text-left">Operasi Dimulai<span class="help"></span></label>
                      <div class="has-success">
                        <input type="time" class="form-control" id="inOpeMulai" name="inOpeMulai">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-10">
                    <div class="col-md-6">
                      <label class="control-label mb-10 text-left">Operasi Selesai<span class="help"></span></label>
                      <div class="has-success">
                        <input type="time" class="form-control" id="inOpeSelesai" name="inOpeSelesai">
                        <span class="help-block"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label class="control-label mb-10 text-left">Lama Operasi<span class="help"></span></label>
                      <div class="has-success">
                        <input type="text" class="form-control" id="inLamaOperasi" name="inLamaOperasi" readonly
                          value="0 Jam, 0 Menit" style="color: #888;">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                </div>

                <script>
                  const inOpeMulai = document.getElementById('inOpeMulai');
                  const inOpeSelesai = document.getElementById('inOpeSelesai');
                  const inLamaOperasi = document.getElementById('inLamaOperasi');

                  function hitungLamaOperasi() {
                    const mulai = inOpeMulai.value;
                    const selesai = inOpeSelesai.value;

                    // Jika salah satu belum diisi
                    if (!mulai || !selesai) {
                      inLamaOperasi.value = "0 Jam, 0 Menit";
                      inLamaOperasi.style.color = "#888"; // Abu-abu
                      return;
                    }

                    const [mulaiJam, mulaiMenit] = mulai.split(":").map(Number);
                    const [selesaiJam, selesaiMenit] = selesai.split(":").map(Number);

                    // Konversi ke menit total
                    let mulaiTotal = mulaiJam * 60 + mulaiMenit;
                    let selesaiTotal = selesaiJam * 60 + selesaiMenit;

                    // Jika operasi selesai lewat tengah malam
                    if (selesaiTotal < mulaiTotal) {
                      selesaiTotal += 24 * 60;
                    }

                    let durasi = selesaiTotal - mulaiTotal;
                    let jam = Math.floor(durasi / 60);
                    let menit = durasi % 60;

                    inLamaOperasi.value = `${jam} Jam, ${menit} Menit`;
                    inLamaOperasi.style.color = "#000"; // Hitam jelas
                  }

                  // Event listener
                  inOpeMulai.addEventListener('input', hitungLamaOperasi);
                  inOpeSelesai.addEventListener('input', hitungLamaOperasi);
                </script>


              </div>
            </div>

            <div class="col-md-12">
              <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
            </div>
            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-30 text-left">Jaringan yang di Eksisi/Insisi<span
                    class="help"></span></label>
                <div class="has-success">
                  <input type="text" class="form-control" name="inJarEksisi" id="inJarEksisi">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Jenis Pemeriksaan yang dikirim ke Laboratorium<span
                    class="help"></span></label>
                <div class="has-success">
                  <input type="text" class="form-control" name="inBahDikirim" id="inBahDikirim">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>

            <!-- <div class="form-group ">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Dikirim untuk pemeriksaan Pathologie</label>
                <div class="radio-button radio-button-primary">
                  <div class="col-md-3">
                    <input id="inPemPath1" type="radio" name="inPemPath" value="Ya">
                    <label class="control-label" for="jenispathologie1">
                      Ya
                    </label>
                  </div>
                  <div class="col-md-0">
                    <div class="radio-button radio-button-primary">
                      <input id="inPemPath2" type="radio" name="inPemPath" value="Tidak">
                      <label class="control-label" for="jenispathologie2">
                        Tidak
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- <div class="form-group">
              <div class="col-md-3">
                <label class="control-label mb-10 text-left">Untuk Pemeriksaan<span class="help"></span></label>
                <div class="has-success">
                  <input type="text" class="form-control" name="inUntPem" id="inUntPem">
                  <span class="help-block"></span>
                </div>
              </div>
            </div> -->

            <!-- <div class="form-group">
                  <div class="col-md-6">
                    <label class="control-label mb-10 text-left">Antiseptik dilakukan di daerah operasi dengan : Bethadine / Alkohol<span class="help"></span></label>
                    <div class="has-success">
                      <input type="text" class="form-control" name="inAntiseptik" id="inAntiseptik">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div> -->

            <div class="form-group ">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Antiseptik dilakukan di daerah operasi dengan :</label>
                <div class="radio-button radio-button-primary">
                  <div class="col-md-3">
                    <input id="inAntiseptik1" type="radio" name="inAntiSeptik" value="Betadine">
                    <label class="control-label" for="inAntiseptik1">
                      Betadine
                    </label>
                  </div>
                  <div class="col-md-3">
                    <div class="radio-button radio-button-primary">
                      <input id="inAntiseptik2" type="radio" name="inAntiSeptik" value="Alkohol">
                      <label class="control-label" for="inAntiseptik2">
                        Alkohol
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Jumlah Pendarahan :<span class="help"></span></label>
                <div class="has-success">
                  <input type="number" class="form-control" name="inJumPenda" id="inJumPenda">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Jumlah Transfusi :<span class="help"></span></label>
                <div class="has-success">
                  <input type="number" class="form-control" name="inJumTrans" id="inJumTrans">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>


            <div class="form-group ">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Penyulit Operasi :</label>
                <div class="row">
                  <div class="col-md-6">
                    <div class="radio-button radio-button-primary">
                      <input id="inPenOperasi1" type="radio" name="inPenOperasi" value="Tidak Ada">
                      <label class="control-label" for="inPenOperasi1">
                        Tidak Ada
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="radio-button radio-button-primary">
                      <input id="inPenOperasi2" type="radio" name="inPenOperasi" value="Ada">
                      <label class="control-label" for="inPenOperasi2">
                        Ada
                      </label>
                      <div class="has-success">
                        <input type="text" class="form-control" id="inPenOperasi" style="display: none;">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="form-group ">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Komplikasi : </label>
                <div class="row">
                  <div class="col-md-6">
                    <div class="radio-button radio-button-primary">
                      <input id="inKomplikasi1" type="radio" name="inKomplikasi" value="Tidak Ada">
                      <label class="control-label" for="inKomplikasi1">
                        Tidak Ada
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="radio-button radio-button-primary">
                      <input id="inKomplikasi2" type="radio" name="inKomplikasi" value="Ada">
                      <label class="control-label" for="inKomplikasi2">
                        Ada
                      </label>
                      <div class="has-success">
                        <input type="text" class="form-control" id="inKomplikasi" style="display: none;">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">Nomor Pendaftaran Implan yang dipasang :<span
                    class="help"></span></label>
                <div class="has-success">
                  <input type="text" class="form-control" name="inNoPend" id="inNoPend">
                  <span class="help-block"></span>
                </div>
              </div>
            </div>

            <!-- Penambahan -->
            <div class="form-group ">
              <div class="col-md-12">
                <label class="control-label mb-10 text-left">LAPORAN OPERASI :<span class="help"></span></label>
                <span id="reaksi_error" class="text-danger"></span>
                <div class="has-success">
                  <textarea class="summernote x" name="inLaporan_operasi" id="inLaporan_operasi">
                        <?php echo empty($form_laporan['laporan_operasi']) ? '' : $form_laporan['laporan_operasi']; ?></textarea>
                </div>
              </div>
            </div>

            <div class="form-group text-center" style="margin-top: 30px;">
              <div class="col-md-6">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>

              <div class="col-md-20">
                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
              </div>
              <div class="col-md-6">
                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)"
                  style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span
                    class="btn-text">KEMBALI</span></a>
                <button type="button" value="Simpan" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
              </div>
            </div>

            <script type="text/javascript">
              $(document).ready(function () {
                id_pelayanan = $('#inPel').val();
                id_history = $('#inHis').val();
                reload_data_diagnosa(id_pelayanan, id_history);
                reload_data_diagnosa_id_pel(id_pelayanan);
                reload_data_diagnosa1_id_pel1(id_pelayanan);

                $("#inPenOperasi2").click(function () {
                  if ($(this).is(":checked")) {
                    $("#inPenOperasi").show();
                  }
                });
                $("#inPenOperasi1").click(function () {
                  if ($(this).is(":checked")) {
                    $("#inPenOperasi").hide();
                  }
                });

                $("#inKomplikasi2").click(function () {
                  if ($(this).is(":checked")) {
                    $("#inKomplikasi").show();
                  }
                });
                $("#inKomplikasi1").click(function () {
                  if ($(this).is(":checked")) {
                    $("#inKomplikasi").hide();
                  }
                });

              });
            </script>
            <script type="text/javascript">
              $("#persalinan1").click(function () {
                if ($(this).is(":checked")) {
                  $("#title2").hide();
                  $("#label3").hide();
                  $("#label4").hide();
                  $("#caesaria2").hide();
                  $("#caesaria1").hide();
                  $("#title1").show();
                  $("#label1").show();
                  $("#label2").show();
                  $("#pervagina2").show();
                  $("#pervagina1").show();
                }
              });
              $("#persalinan2").click(function () {
                if ($(this).is(":checked")) {
                  $("#title1").hide();
                  $("#label1").hide();
                  $("#label2").hide();
                  $("#pervagina2").hide();
                  $("#pervagina1").hide();
                  $("#title2").show();
                  $("#label3").show();
                  $("#label4").show();
                  $("#caesaria2").show();
                  $("#caesaria1").show();
                }
              });

              /Typeahead Init/

              $(function () {
                "use strict";

                /Basic/

                var substringMatcher = function (strs) {
                  return function findMatches(q, cb) {
                    var matches, substringRegex;

                    // an array that will be populated with substring matches
                    matches = [];

                    // regex used to determine if a string contains the substring q
                    var substrRegex = new RegExp(q, 'i');

                    // iterate through the pool of strings and for any string that
                    // contains the substring q, add it to the matches array
                    $.each(strs, function (i, str) {
                      if (substrRegex.test(str)) {
                        matches.push(str);
                      }
                    });

                    cb(matches);
                  };
                };

                var states = [
                  <?php

                  foreach ($diagnosa as $row) {

                    echo ",'" . $row["id_diagnosa"] . " | " . $row["nama_diagnosa"] . "'";
                  } ?>
                ];


                $('#the-basics .typeahead').typeahead({
                  hint: true,
                  highlight: true,
                  minLength: 1
                }, {
                  name: 'states',
                  source: substringMatcher(states)
                });
              });
            </script>
            <script type="text/javascript">
              function simpan() {
                id_pelayanan = $('#inPel').val();
                id_history = $('#inHis').val();
                no_rm = $('#inNoRM').val();
                // tambah
                kamar_ok = $('#kamar_ok').val();

                nama_ahli_bedah = $('#inDPJP').val();
                nama_perawat_instrumen = $('#inNamaPerawat').val();
                nama_asisten1 = $('#inNamaAsisten1').val();
                nama_asisten2 = $('#inNamaAsisten2').val();
                //tambah
                sirkuler = $('#inSirkuler').val();
                nama_dokter_anestesi = $('#inDokterAnestesi').val();
                nama_perawat_anestesi = $('#inPerawatAnestesi').val();

                diagnosa_pra_operasi = $('#inDiagPra').val();
                tindakan_operasi = $('#inTinOperasi').val();
                diagnosa_post_operasi = $('#inDiagPost').val();
                indikasi_operasi = $('#inOperasi').val();
                jenis_operasi = $('input[name="inJenOperasi"]:checked').val();
                // tambah
                jenis_pembiusan = $('input[name="inAnestesi"]:checked').val();
                posisi_operasi = $('#inPosisiOperasi').val();

                tanggal_operasi = $('#inTglOperasi').val();
                operasi_dimulai = $('#inOpeMulai').val();
                operasi_selesai = $('#inOpeSelesai').val();
                lama_operasi = $('#inLamaOperasi').val();

                jaringan_eksisi = $('#inJarEksisi').val();
                bahan_dikirim_laboratorium = $('#inBahDikirim').val();
                pemeriksaan_pathologie = $('input[name="inPemPath"]:checked').val();
                untuk_pemeriksaan = $('#inUntPem').val();
                singkatan_kelainan = $('#inSingKel').val();
                antiseptik = $('input[name="inAntiSeptik"]:checked').val();
                jumlah_pendarahan = $('#inJumPenda').val();
                jumlah_transfusi = $('#inJumTrans').val();
                // tambahan
                laporan_operasi = $('#inLaporan_operasi').val();

                penyulit_operasi = $('input[name="inPenOperasi"]:checked').val();
                if (penyulit_operasi == "Ada") {
                  penyulit_operasi = $('#inPenOperasi').val();
                }
                penyulit = $('input[name="penyulit"]:checked').val();

                komplikasi_operasi = $('input[name="inKomplikasi"]:checked').val();
                if (komplikasi_operasi == "Ada") {
                  komplikasi_operasi = $('#inKomplikasi').val();
                }
                komplikasi = $('input[name="komplikasi"]:checked').val();

                nomor_pendaftaran = $('#inNoPend').val();



                $.ajax({
                  url: "<?php echo base_url() ?>Erm_laporan_operasi/store",
                  method: "POST",
                  dataType: 'json',
                  data: {
                    id_pelayanan: id_pelayanan,
                    no_rm: no_rm,
                    id_history: id_history,
                    // tambah
                    kamar_ok: kamar_ok,

                    nama_ahli_bedah: nama_ahli_bedah,
                    nama_perawat_instrumen: nama_perawat_instrumen,
                    nama_asisten1: nama_asisten1,
                    nama_asisten2: nama_asisten2,
                    //tambah
                    sirkuler: sirkuler,
                    nama_dokter_anestesi: nama_dokter_anestesi,
                    nama_perawat_anestesi: nama_perawat_anestesi,

                    diagnosa_pra_operasi: diagnosa_pra_operasi,
                    tindakan_operasi: tindakan_operasi,
                    diagnosa_post_operasi: diagnosa_post_operasi,
                    indikasi_operasi: indikasi_operasi,
                    jenis_operasi: jenis_operasi,
                    //tambah
                    jenis_pembiusan: jenis_pembiusan,
                    posisi_operasi: posisi_operasi,

                    tanggal_operasi: tanggal_operasi,
                    operasi_dimulai: operasi_dimulai,
                    operasi_selesai: operasi_selesai,
                    lama_operasi: lama_operasi,

                    jaringan_eksisi: jaringan_eksisi,
                    bahan_dikirim_laboratorium: bahan_dikirim_laboratorium,
                    pemeriksaan_pathologie: pemeriksaan_pathologie,
                    untuk_pemeriksaan: untuk_pemeriksaan,
                    singkatan_kelainan: singkatan_kelainan,
                    antiseptik: antiseptik,
                    jumlah_pendarahan: jumlah_pendarahan,
                    jumlah_transfusi: jumlah_transfusi,
                    penyulit_operasi: penyulit_operasi,
                    komplikasi_operasi: komplikasi_operasi,
                    nomor_pendaftaran: nomor_pendaftaran,
                    laporan_operasi: laporan_operasi,

                  },
                 success: function (data) {
  console.log(data);
  if (data.status == "success") {
    swal({
      title: "Berhasil!",
      text: "Data berhasil disimpan.",
      type: "success",
      confirmButtonColor: "#3cb878"
    }, function () {
      if (window.history.length > 1) {
        window.history.back();
      } else {
        window.location.replace(document.referrer || window.location.origin);
      }
    });
  } else if (data.error) {
    if (nama_ibu == '' || nama_ibu == null) {
      $('#ibu_error').html('*wajib diisi');
    } else {
      $('#ibu_error').html('');
    }
    if (jenis_persalinan == '' || jenis_persalinan == null) {
      $('#persalinan_error').html('*wajib diisi');
    } else {
      $('#persalinan_error').html('');
    }
    if (rawat_gabung == '' || rawat_gabung == null) {
      $('#rawat_error').html('*wajib diisi');
    } else {
      $('#rawat_error').html('');
    }
    if (alasan == '' || alasan == null) {
      $('#alasan_error').html('*wajb diisi');
    } else {
      $('#alasan_error').html('');
    }
    if (catatan == '' || catatan == null) {
      $('#catatan_error').html('*wajib diisi');
    } else {
      $('#catatan_error').html('');
    }
  } else {
    swal({
      title: "Gagal!",
      type: "warning",
      text: data.status,
      confirmButtonColor: "#3cb878"
    });
  }
}


                });
                return false;
              }

              function reload_data_diagnosa(id_pelayanan, id_history) { //nampilinn diagnosa seluruhnya utk nambah ke diagnosa pasien
                $('#tabledgns').dataTable().fnClearTable();
                $('#tabledgns').dataTable().fnDestroy();
                $('#tabledgns').DataTable({
                  "scrollX": false,
                  "scrollY": false,
                  "pageLength": 3,
                  "language": {
                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing": "Sedang memproses...",
                    "sLengthMenu": "Tampilkan _MENU_ entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "sInfoPostFix": "",
                    "sSearch": "Cari Diagnosa:",
                    "sUrl": "",
                    "oPaginate": {
                      "sFirst": "Pertama",
                      "sPrevious": "Sebelumnya",
                      "sNext": "Selanjutnya",
                      "sLast": "Terakhir",
                    }
                  },
                  "ajax": {
                    "url": '<?php echo base_url('Erm_igd/tampil_listdata_diagnosa'); ?>',
                    "type": 'POST',
                    "data": {
                      id_pelayanan: id_pelayanan,
                      id_history: id_history
                    },
                  },

                  "deferRender": true,
                  "processing": true,

                  "order": [],
                  "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                  },],
                });
              }

              function reload_data_diagnosa_id_pel(id_pelayanan) { // modal utk nampilin diagnosa pasien
                $('#tablediagnosa').dataTable().fnClearTable();
                $('#tablediagnosa').dataTable().fnDestroy();
                $('#tablediagnosa').DataTable({
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
                    "url": '<?php echo base_url('Erm_ranap_asesmen_dokter/tampil_list_diagnosa_ranap'); ?>',
                    "type": 'POST',
                    "data": {
                      id_pelayanan: id_pelayanan
                    },
                  },

                  "deferRender": true,
                  "processing": true,
                  "order": [],
                  "columnDefs": [{
                    "width": "20%",
                    "targets": [0],
                    "orderable": false,
                  },],
                });
              }

              function reload_data_diagnosa1_id_pel1(id_pelayanan) { // modal utk nampilin diagnosa pasien
                $('#tablediagnosa1').dataTable().fnClearTable();
                $('#tablediagnosa1').dataTable().fnDestroy();
                $('#tablediagnosa1').DataTable({
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
                    "url": '<?php echo base_url('Erm_ranap_asesmen_dokter/tampil_list_diagnosa1'); ?>',
                    "type": 'POST',
                    "data": {
                      id_pelayanan: id_pelayanan
                    },
                  },

                  "deferRender": true,
                  "processing": true,
                  "order": [],
                  "columnDefs": [{
                    "width": "20%",
                    "targets": [0],
                    "orderable": false,
                  },],
                });
              }

              function tambah_data_diagnosa(id_pelayanan, id_diagnosa, nama_diagnosa, his) { //utk nambah diagnosa pasien
                id_pelayanan = $('#inPel').val();
                // no_diagnosa = $('#no_diagnosa').val();
                swal({
                  title: "Apakah kamu yakin?",
                  text: "Menambah Diagnosa " + nama_diagnosa + "?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3cb878",
                  confirmButtonText: "Yakin",
                  cancelButtonText: "Batal",
                  closeOnConfirm: false
                }, function () {
                  $().ready(function () {
                    $.ajax({
                      url: "<?php echo base_url() ?>Erm_igd/tambah_data_diagnosa",
                      method: "POST",
                      dataType: 'json',
                      data: {
                        id_pelayanan: id_pelayanan,
                        id_diagnosa: id_diagnosa,
                        nama_diagnosa: nama_diagnosa,
                        id_history: his
                      },
                      success: function (data) {
                        if (data.status == "success") {
                          swal({
                            title: "good job!",
                            type: "success",
                            text: "Id diagnosa" + id_diagnosa + " Berhasil ditambah",
                            confirmButtonColor: "#3cb878",
                          });
                          reload_data_diagnosa_id_pel(his);
                          reload_data_diagnosa1_id_pel1(his);
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
                  });

                });
                return false;
              }

              function hapus_data_diagnosa(id) { //utk hapus diagnosa pasien
                swal({
                  title: "Warning?",
                  text: "Apakah kamu yakin menghapus data ini?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3cb878",
                  confirmButtonText: "Yakin",
                  cancelButtonText: "Batal",
                  closeOnConfirm: false
                }, function () {
                  $().ready(function () {
                    $.ajax({
                      url: "<?php echo base_url() ?>Erm_ranap_asesmen_dokter/hapus_data_diagnosa",
                      method: "POST",
                      dataType: 'json',
                      data: {
                        id: id,
                      },
                      success: function (data) {
                        if (data.status == "success") {
                          swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil dihapus",
                            confirmButtonColor: "#3cb878",
                          });
                          $('#tablediagnosa').DataTable().ajax.reload();
                          $('#tablediagnosa1').DataTable().ajax.reload();
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

              function hapus_data_diagnosa1(id) { //utk hapus diagnosa pasien
                swal({
                  title: "Warning?",
                  text: "Apakah kamu yakin menghapus data ini?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3cb878",
                  confirmButtonText: "Yakin",
                  cancelButtonText: "Batal",
                  closeOnConfirm: false
                }, function () {
                  $().ready(function () {
                    $.ajax({
                      url: "<?php echo base_url() ?>Erm_ranap_asesmen_dokter/hapus_data_diagnosa1",
                      method: "POST",
                      dataType: 'json',
                      data: {
                        id: id,
                      },
                      success: function (data) {
                        if (data.status == "success") {
                          swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil dihapus",
                            confirmButtonColor: "#3cb878",
                          });
                          $('#tablediagnosa').DataTable().ajax.reload();
                          $('#tablediagnosa1').DataTable().ajax.reload();
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
            </script>

<script>
(function() {
  try {
    var existing = <?php echo json_encode(isset($laporan_operasi)?$laporan_operasi:null, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_AMP|JSON_HEX_QUOT); ?>;
    if (!existing) return;

    function setValById(id, val){
      var $el = $('#'+id);
      if ($el.length && val !== null && val !== undefined) {
        $el.val(val);
        if ($el.is('select')) $el.trigger('change');
      }
    }
    function setRadioByName(name, val){
      if (val === null || val === undefined || val === '') return;
      var $r = $('input[name="'+name+'"][value="'+val+'"]');
      if ($r.length){
        $r.prop('checked', true).trigger('click');
      }
    }
    // Direct ID-based fills
    var map = {
      kamar_ok: 'kamar_ok',
      nama_ahli_bedah: 'inDPJP',
      nama_perawat_instrumen: 'inNamaPerawat',
      nama_asisten1: 'inNamaAsisten1',
      nama_asisten2: 'inNamaAsisten2',
      sirkuler: 'inSirkuler',
      nama_dokter_anestesi: 'inDokterAnestesi',
      nama_perawat_anestesi: 'inPerawatAnestesi',
      diagnosa_pra_operasi: 'inDiagPra',
      tindakan_operasi: 'inTinOperasi',
      diagnosa_post_operasi: 'inDiagPost',
      indikasi_operasi: 'inOperasi',
      posisi_operasi: 'inPosisiOperasi',
      tanggal_operasi: 'inTglOperasi',
      operasi_dimulai: 'inOpeMulai',
      operasi_selesai: 'inOpeSelesai',
      lama_operasi: 'inLamaOperasi',
      jaringan_eksisi: 'inJarEksisi',
      bahan_dikirim_laboratorium: 'inBahDikirim',
      untuk_pemeriksaan: 'inUntPem',
      singkatan_kelainan: 'inSingKel',
      jumlah_pendarahan: 'inJumPenda',
      jumlah_transfusi: 'inJumTrans',
      laporan_operasi: 'inLaporan_operasi',
      penyulit_operasi: 'inPenOperasi',
      komplikasi_operasi: 'inKomplikasi',
      nomor_pendaftaran: 'inNoPend'
    };
    Object.keys(map).forEach(function(k){
      if (existing.hasOwnProperty(k)) setValById(map[k], existing[k]);
    });

    // Radio mappings
    // If detail exists, set Ada, else Tidak Ada
    if (typeof existing.penyulit_operasi !== 'undefined'){
      var adaPenyulit = existing.penyulit_operasi && String(existing.penyulit_operasi).trim() !== '';
      setRadioByName('penyulit', adaPenyulit ? 'Ada' : 'Tidak Ada');
      if (adaPenyulit) $('#inPenOperasi').show();
    }
    if (typeof existing.komplikasi_operasi !== 'undefined'){
      var adaKompl = existing.komplikasi_operasi && String(existing.komplikasi_operasi).trim() !== '';
      setRadioByName('komplikasi', adaKompl ? 'Ada' : 'Tidak Ada');
      if (adaKompl) $('#inKomplikasi').show();
    }

    // Value-based radio groups
    if (existing.hasOwnProperty('jenis_operasi')) {
      setRadioByName('inJenOperasi', existing.jenis_operasi);
    }
    if (existing.hasOwnProperty('jenis_pembiusan')) {
      setRadioByName('inAnestesi', existing.jenis_pembiusan);
    }
    if (existing.hasOwnProperty('antiseptik')) {
      setRadioByName('inAntiSeptik', existing.antiseptik);
    }
    if (existing.hasOwnProperty('pemeriksaan_pathologie')) {
      setRadioByName('inPemPath', existing.pemeriksaan_pathologie);
    }

    // Trigger any dependent calculations, e.g., duration
    $('#inOpeMulai, #inOpeSelesai').trigger('change');

  } catch(e) {
    console && console.warn && console.warn('Prefill error:', e);
  }
})();
</script>
