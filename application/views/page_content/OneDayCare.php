<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
  <title><b>One Day Care & One Day Surgery</b></title>
  <!-- jQuery + SweetAlert2 -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    .mt-10 { margin-top: 10px; }
    .mt-20 { margin-top: 20px; }
    .mb-10 { margin-bottom: 10px; }
    .mb-20 { margin-bottom: 20px; }
    .title {
      font-weight: bold;
      color: #000;
    }
    label {
      font-weight: bold;
      color: #000;
    }
    h4 {
      font-weight: bold;
      color: #000;
    }
    .btn-text {
      font-weight: bold;
      color: #000;
    }
  </style>
</head>

<body>

  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default card-view">
        <div class="panel-heading">
          <div class="pull-left">
            <div class="title"><b>ONE DAY CARE & ONE DAY SURGERY</b></div>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="form-wrap">

              <!-- FORM -->
              <form id="formOneDayCare" action="<?= base_url('OneDayCare/simpan') ?>" method="post">

                <!-- Hidden ikut tersubmit -->
                <input type="hidden" name="no_rm" value="<?= $no_rm ?? '' ?>">
                <input type="hidden" id="id_pelayanan" value="<?= $id_pelayanan ?? '' ?>">
                <input type="hidden" id="id_history" value="<?= $id_history ?? '' ?>">

                <!-- Identitas Pasien -->
                <div class="form-group row">
                  <div class="col-md-3 mb-10">
                    <label><b>No. RM</b></label>
                    <input type="text" class="form-control" value="<?= $data->no_rm ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Nama Pasien</b></label>
                    <input type="text" class="form-control" value="<?= $data->nama ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Tanggal Lahir</b></label>
                    <input type="text" class="form-control" value="<?= $data->tgl_lahir ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Jenis Kelamin</b></label>
                    <input type="text" class="form-control" value="<?= $data->jenis_kelamin ?? '-' ?>" disabled>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-3 mb-10">
                    <label><b>Pekerjaan</b></label>
                    <input type="text" class="form-control" value="<?= $data->pekerjaan ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Pendidikan</b></label>
                    <input type="text" class="form-control" value="<?= $data->pendidikan ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Status Perkawinan</b></label>
                    <input type="text" class="form-control" value="<?= $data->status ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Alamat</b></label>
                    <input type="text" class="form-control" value="<?= $data->alamat ?? '-' ?>" disabled>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-3 mb-10">
                    <label><b>Ruang Rawat</b></label>
                    <input type="text" class="form-control" value="<?= $data->jenis_pelayanan ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Kelas</b></label>
                    <input type="text" class="form-control" value="<?= $data->kelas ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Agama</b></label>
                    <input type="text" class="form-control" value="<?= $data->agama ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Tanggal Masuk</b></label>
                    <input type="text" class="form-control"
                      value="<?= isset($data->tgl_masuk) ? date('d-m-Y', strtotime($data->tgl_masuk)) : '-' ?>" disabled>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-3 mb-20">
                    <label><b>Jam</b></label>
                    <input type="text" class="form-control"
                      value="<?= isset($data->tgl_masuk) ? date('H:i', strtotime($data->tgl_masuk)) : '-' ?>" disabled>
                  </div>
                </div>

                <!-- === Bagian ONEDAYCARE === -->
                <div class="row">
                  <div class="col-md-7 mb-10">
                    <label><b>Anamnesa</b></label>
                    <textarea class="form-control" name="anamnesa" rows="3"><?= $data_oneday->anamnesa ?? '' ?></textarea>
                  </div>

                  <div class="col-md-7 mb-10">
                    <label><b>Riwayat Penyakit Sebelumnya</b></label>
                    <textarea class="form-control" name="riwayat_penyakit_sebelumnya" rows="3"><?= $data_oneday->riwayat_penyakit_sebelumnya ?? '' ?></textarea>
                  </div>

                  <div class="col-md-7 mb-10">
                    <label><b>Pengobatan yang Sudah Pernah Diberikan</b></label>
                    <textarea class="form-control" name="pengobatan_sebelumnya" rows="3"><?= $data_oneday->pengobatan_sebelumnya ?? '' ?></textarea>
                  </div>

                  <!-- === PEMERIKSAAN VITALS === -->
                  <div class="col-md-12"><h4><b>Pemeriksaan Vitals</b></h4></div>

                  <div class="col-md-4 mb-10">
                    <label><b>Tekanan Darah</b></label>
                    <input type="text" class="form-control" name="tekanan_darah" placeholder="Contoh: 120/80"
                      value="<?= $pemeriksaan_fisik->tekanan_darah ?? '' ?>">
                  </div>

                  <div class="col-md-4 mb-10">
                    <label><b>Suhu (°C)</b></label>
                    <input type="number" step="0.1" class="form-control" name="suhu" placeholder="Contoh: 36.7"
                      value="<?= $pemeriksaan_fisik->suhu ?? '' ?>">
                  </div>

                  <div class="col-md-4 mb-10">
                    <label><b>Frekuensi Nadi (x/menit)</b></label>
                    <input type="text" class="form-control" name="nadi" placeholder="Contoh: 80"
                      value="<?= $pemeriksaan_fisik->nadi ?? '' ?>">
                  </div>

                  <div class="col-md-4 mb-10">
                    <label><b>Berat Badan (Kg)</b></label>
                    <input type="text" class="form-control" name="berat_badan" placeholder="Contoh: 70"
                      value="<?= $pemeriksaan_fisik->berat_badan ?? '' ?>">
                  </div>

                  <div class="col-md-4 mb-10">
                    <label><b>Frekuensi Nafas (x/menit)</b></label>
                    <input type="text" class="form-control" name="pernapasan" placeholder="Contoh: 20"
                      value="<?= $pemeriksaan_fisik->pernapasan ?? '' ?>">
                  </div>

                  <div class="col-md-4 mb-20">
                    <label><b>Tinggi Badan (cm)</b></label>
                    <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan" placeholder="Contoh: 170"
                      value="<?= $pemeriksaan_fisik->tinggi_badan ?? '' ?>">
                  </div>
                  <!-- === END PEMERIKSAAN VITALS === -->

                  <div class="col-md-7 mb-10">
                    <label><b>Pemeriksaan Fisik</b></label>
                    <textarea class="form-control" id="pemeriksaan_fisik" name="pemeriksaan_fisik" rows="3"><?= $data_oneday->pemeriksaan_fisik ?? '' ?></textarea>
                  </div>

                  <div class="col-md-7 mb-10">
                    <label><b>Hasil Laboratorium / X-Ray / dll</b></label>
                    <textarea class="form-control" name="hasil_labor" rows="3"><?= $data_oneday->hasil_labor ?? '' ?></textarea>
                  </div>

                  <div class="col-md-7 mb-10">
                    <label><b>Therapi</b></label>
                    <textarea class="form-control" name="therapi" rows="3"><?= $data_oneday->therapi ?? '' ?></textarea>
                  </div>

                  <div class="col-md-7 mb-10">
                    <label><b>Pemantauan</b></label>
                    <textarea class="form-control" name="pemantauan" rows="3"><?= $data_oneday->pemantauan ?? '' ?></textarea>
                  </div>

                  <div class="col-md-7 mb-20">
                    <label><b>Anjuran</b></label>
                    <textarea class="form-control" name="anjuran" rows="3"><?= $data_oneday->anjuran ?? '' ?></textarea>
                  </div>
                </div>
                <!-- === /Bagian ONEDAYCARE === -->

                <!-- Tombol Aksi -->
                <div class="col-md-12 mt-20">
                  <a class="btn btn-default btn-anim btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;">
                    <i class="fa fa-arrow-left"></i><span class="btn-text"><b>KEMBALI</b></span>
                  </a>
                  <button type="button" class="btn btn-success mb-4" id="btnSimpan"><b>Simpan</b></button>

                  <!-- Tombol Cetak -->
                  <a href="<?= base_url('OneDayCare/cetak/' . $id_pelayanan . '/' . $id_history) ?>"
                    target="_blank" class="btn btn-primary mb-4">
                    <i class="fa fa-print"></i> <b>Cetak</b>
                  </a>
                </div>

              </form>
              <!-- /FORM -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- AJAX + SweetAlert2 -->
  <script>
    function buildBackUrl() {
      var idPel = document.getElementById('id_pelayanan').value || '';
      var idHis = document.getElementById('id_history').value || '';

      function b64(s) { try { return btoa(s); } catch (e) { return ''; } }
      function enc(s) { return encodeURIComponent(s); }

      if (idPel && idHis) {
        return "<?= base_url('erm_ranap/form/') ?>" + enc(b64(idPel)) + "/" + enc(b64(idHis));
      }
      return "";
    }

    $(function() {
      $("#btnSimpan").on("click", function(e) {
        e.preventDefault();
        var $form = $("#formOneDayCare");
        $.ajax({
          url: $form.attr("action"),
          type: "POST",
          data: $form.serialize(),
          success: function() {
            Swal.fire({
              title: "<b>Good job!</b>",
              text: "Data One Day Care berhasil disimpan!",
              icon: "success"
            }).then(() => {
              var backUrl = buildBackUrl();
              if (backUrl) {
                window.location.href = backUrl;
              } else {
                history.go(-1);
              }
            });
          },
          error: function(xhr, s, err) {
            Swal.fire({
              title: "<b>Gagal!</b>",
              text: "Terjadi kesalahan saat menyimpan. " + (err || ""),
              icon: "error"
            });
          }
        });
      });
    });
  </script>

  <?php if ($this->session->flashdata('success')): ?>
    <script>
      Swal.fire({
        title: "<b>Good job!</b>",
        text: "<?= $this->session->flashdata('success'); ?>",
        icon: "success"
      });
    </script>
  <?php endif; ?>

</body>
</html>
=======
<!DOCTYPE html>
<html>

<head>
  <title><b>One Day Care & One Day Surgery</b></title>
  <!-- jQuery + SweetAlert2 -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    .mt-10 { margin-top: 10px; }
    .mt-20 { margin-top: 20px; }
    .mb-10 { margin-bottom: 10px; }
    .mb-20 { margin-bottom: 20px; }
    .title {
      font-weight: bold;
      color: #000;
    }
    label {
      font-weight: bold;
      color: #000;
    }
    h4 {
      font-weight: bold;
      color: #000;
    }
    .btn-text {
      font-weight: bold;
      color: #000;
    }
  </style>
</head>

<body>

  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default card-view">
        <div class="panel-heading">
          <div class="pull-left">
            <div class="title"><b>ONE DAY CARE & ONE DAY SURGERY</b></div>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="form-wrap">

              <!-- FORM -->
              <form id="formOneDayCare" action="<?= base_url('OneDayCare/simpan') ?>" method="post">

                <!-- Hidden ikut tersubmit -->
                <input type="hidden" name="no_rm" value="<?= $no_rm ?? '' ?>">
                <input type="hidden" id="id_pelayanan" value="<?= $id_pelayanan ?? '' ?>">
                <input type="hidden" id="id_history" value="<?= $id_history ?? '' ?>">

                <!-- Identitas Pasien -->
                <div class="form-group row">
                  <div class="col-md-3 mb-10">
                    <label><b>No. RM</b></label>
                    <input type="text" class="form-control" value="<?= $data->no_rm ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Nama Pasien</b></label>
                    <input type="text" class="form-control" value="<?= $data->nama ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Tanggal Lahir</b></label>
                    <input type="text" class="form-control" value="<?= $data->tgl_lahir ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Jenis Kelamin</b></label>
                    <input type="text" class="form-control" value="<?= $data->jenis_kelamin ?? '-' ?>" disabled>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-3 mb-10">
                    <label><b>Pekerjaan</b></label>
                    <input type="text" class="form-control" value="<?= $data->pekerjaan ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Pendidikan</b></label>
                    <input type="text" class="form-control" value="<?= $data->pendidikan ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Status Perkawinan</b></label>
                    <input type="text" class="form-control" value="<?= $data->status ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Alamat</b></label>
                    <input type="text" class="form-control" value="<?= $data->alamat ?? '-' ?>" disabled>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-3 mb-10">
                    <label><b>Ruang Rawat</b></label>
                    <input type="text" class="form-control" value="<?= $data->jenis_pelayanan ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Kelas</b></label>
                    <input type="text" class="form-control" value="<?= $data->kelas ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Agama</b></label>
                    <input type="text" class="form-control" value="<?= $data->agama ?? '-' ?>" disabled>
                  </div>
                  <div class="col-md-3 mb-10">
                    <label><b>Tanggal Masuk</b></label>
                    <input type="text" class="form-control"
                      value="<?= isset($data->tgl_masuk) ? date('d-m-Y', strtotime($data->tgl_masuk)) : '-' ?>" disabled>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-3 mb-20">
                    <label><b>Jam</b></label>
                    <input type="text" class="form-control"
                      value="<?= isset($data->tgl_masuk) ? date('H:i', strtotime($data->tgl_masuk)) : '-' ?>" disabled>
                  </div>
                </div>

                <!-- === Bagian ONEDAYCARE === -->
                <div class="row">
                  <div class="col-md-7 mb-10">
                    <label><b>Anamnesa</b></label>
                    <textarea class="form-control" name="anamnesa" rows="3"><?= $data_oneday->anamnesa ?? '' ?></textarea>
                  </div>

                  <div class="col-md-7 mb-10">
                    <label><b>Riwayat Penyakit Sebelumnya</b></label>
                    <textarea class="form-control" name="riwayat_penyakit_sebelumnya" rows="3"><?= $data_oneday->riwayat_penyakit_sebelumnya ?? '' ?></textarea>
                  </div>

                  <div class="col-md-7 mb-10">
                    <label><b>Pengobatan yang Sudah Pernah Diberikan</b></label>
                    <textarea class="form-control" name="pengobatan_sebelumnya" rows="3"><?= $data_oneday->pengobatan_sebelumnya ?? '' ?></textarea>
                  </div>

                  <!-- === PEMERIKSAAN VITALS === -->
                  <div class="col-md-12"><h4><b>Pemeriksaan Vitals</b></h4></div>

                  <div class="col-md-4 mb-10">
                    <label><b>Tekanan Darah</b></label>
                    <input type="text" class="form-control" name="tekanan_darah" placeholder="Contoh: 120/80"
                      value="<?= $pemeriksaan_fisik->tekanan_darah ?? '' ?>">
                  </div>

                  <div class="col-md-4 mb-10">
                    <label><b>Suhu (°C)</b></label>
                    <input type="number" step="0.1" class="form-control" name="suhu" placeholder="Contoh: 36.7"
                      value="<?= $pemeriksaan_fisik->suhu ?? '' ?>">
                  </div>

                  <div class="col-md-4 mb-10">
                    <label><b>Frekuensi Nadi (x/menit)</b></label>
                    <input type="text" class="form-control" name="nadi" placeholder="Contoh: 80"
                      value="<?= $pemeriksaan_fisik->nadi ?? '' ?>">
                  </div>

                  <div class="col-md-4 mb-10">
                    <label><b>Berat Badan (Kg)</b></label>
                    <input type="text" class="form-control" name="berat_badan" placeholder="Contoh: 70"
                      value="<?= $pemeriksaan_fisik->berat_badan ?? '' ?>">
                  </div>

                  <div class="col-md-4 mb-10">
                    <label><b>Frekuensi Nafas (x/menit)</b></label>
                    <input type="text" class="form-control" name="pernapasan" placeholder="Contoh: 20"
                      value="<?= $pemeriksaan_fisik->pernapasan ?? '' ?>">
                  </div>

                  <div class="col-md-4 mb-20">
                    <label><b>Tinggi Badan (cm)</b></label>
                    <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan" placeholder="Contoh: 170"
                      value="<?= $pemeriksaan_fisik->tinggi_badan ?? '' ?>">
                  </div>
                  <!-- === END PEMERIKSAAN VITALS === -->

                  <div class="col-md-7 mb-10">
                    <label><b>Pemeriksaan Fisik</b></label>
                    <textarea class="form-control" id="pemeriksaan_fisik" name="pemeriksaan_fisik" rows="3"><?= $data_oneday->pemeriksaan_fisik ?? '' ?></textarea>
                  </div>

                  <div class="col-md-7 mb-10">
                    <label><b>Hasil Laboratorium / X-Ray / dll</b></label>
                    <textarea class="form-control" name="hasil_labor" rows="3"><?= $data_oneday->hasil_labor ?? '' ?></textarea>
                  </div>

                  <div class="col-md-7 mb-10">
                    <label><b>Therapi</b></label>
                    <textarea class="form-control" name="therapi" rows="3"><?= $data_oneday->therapi ?? '' ?></textarea>
                  </div>

                  <div class="col-md-7 mb-10">
                    <label><b>Pemantauan</b></label>
                    <textarea class="form-control" name="pemantauan" rows="3"><?= $data_oneday->pemantauan ?? '' ?></textarea>
                  </div>

                  <div class="col-md-7 mb-20">
                    <label><b>Anjuran</b></label>
                    <textarea class="form-control" name="anjuran" rows="3"><?= $data_oneday->anjuran ?? '' ?></textarea>
                  </div>
                </div>
                <!-- === /Bagian ONEDAYCARE === -->

                <!-- Tombol Aksi -->
                <div class="col-md-12 mt-20">
                  <a class="btn btn-default btn-anim btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;">
                    <i class="fa fa-arrow-left"></i><span class="btn-text"><b>KEMBALI</b></span>
                  </a>
                  <button type="button" class="btn btn-success mb-4" id="btnSimpan"><b>Simpan</b></button>

                  <!-- Tombol Cetak -->
                  <a href="<?= base_url('OneDayCare/cetak/' . $id_pelayanan . '/' . $id_history) ?>"
                    target="_blank" class="btn btn-primary mb-4">
                    <i class="fa fa-print"></i> <b>Cetak</b>
                  </a>
                </div>

              </form>
              <!-- /FORM -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- AJAX + SweetAlert2 -->
  <script>
    function buildBackUrl() {
      var idPel = document.getElementById('id_pelayanan').value || '';
      var idHis = document.getElementById('id_history').value || '';

      function b64(s) { try { return btoa(s); } catch (e) { return ''; } }
      function enc(s) { return encodeURIComponent(s); }

      if (idPel && idHis) {
        return "<?= base_url('erm_ranap/form/') ?>" + enc(b64(idPel)) + "/" + enc(b64(idHis));
      }
      return "";
    }

    $(function() {
      $("#btnSimpan").on("click", function(e) {
        e.preventDefault();
        var $form = $("#formOneDayCare");
        $.ajax({
          url: $form.attr("action"),
          type: "POST",
          data: $form.serialize(),
          success: function() {
            Swal.fire({
              title: "<b>Good job!</b>",
              text: "Data One Day Care berhasil disimpan!",
              icon: "success"
            }).then(() => {
              var backUrl = buildBackUrl();
              if (backUrl) {
                window.location.href = backUrl;
              } else {
                history.go(-1);
              }
            });
          },
          error: function(xhr, s, err) {
            Swal.fire({
              title: "<b>Gagal!</b>",
              text: "Terjadi kesalahan saat menyimpan. " + (err || ""),
              icon: "error"
            });
          }
        });
      });
    });
  </script>

  <?php if ($this->session->flashdata('success')): ?>
    <script>
      Swal.fire({
        title: "<b>Good job!</b>",
        text: "<?= $this->session->flashdata('success'); ?>",
        icon: "success"
      });
    </script>
  <?php endif; ?>

</body>
</html>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
