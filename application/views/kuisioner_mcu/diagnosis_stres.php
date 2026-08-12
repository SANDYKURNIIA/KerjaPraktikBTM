<div id="diagnosis_stres">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default card-view">
        <div class="panel-heading">
          <div class="pull-left">
            <h1 class="panel-title txt-dark"><strong>Survey Diagnosis Stres</strong></h1>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="form-wrap">
              <div class="form-body">
                <!-- Hidden: id_mcu -->
                <input type="hidden" id="id_mcu"
                  value="<?= isset($id_mcu) && $id_mcu ? htmlspecialchars($id_mcu, ENT_QUOTES, 'UTF-8') : (isset($data_mcu['id_mcu']) ? htmlspecialchars($data_mcu['id_mcu'], ENT_QUOTES, 'UTF-8') : '') ?>">

                <form id="formSurveyDiagnosis">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:50px;">No</th>
                        <th>Pernyataan</th>
                        <?php for ($i = 1; $i <= 7; $i++): ?>
                          <th><?= $i ?></th>
                        <?php endfor; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $pertanyaan = [
                        "Tujuan tugas-tugas dan pekerjaan saya tidak jelas",
                        "Saya mengerjakan tugas-tugas atau proyek-proyek yang tidak perlu",
                        "Saya harus membawa pulang pekerjaan ke rumah setiap sore hari atau akhir pekan agar dapat mengejar waktu",
                        "Tuntutan-tuntutan mengenai mutu pekerjaan terhadap saya keterlaluan",
                        "Saya tidak mempunyai kesempatan yang memadai untuk maju dalam organisasi ini",
                        "Saya bertanggung jawab untuk pengembangan karyawan lain",
                        "Saya tidak jelas kepada siapa harus melapor dan/atau siapa yang melapor kepada saya",
                        "Saya terjepit di tengah-tengah diantara atasan dan bawahan saya",
                        "Saya menghabiskan terlalu banyak untuk pertemuan-pertemuan yang tidak penting dan menyita waktu saya",
                        "Tugas-Tugas Yang Diberikan Kepada Saya Kadang-Kadang Terlalu Sulit Dan/atau Terlalu Kompleks",
                        "Kalau Saya Ingin Naik Pangkat, Saya Harus Mencari Pekerjaan Pada Satuan Kerja Lain",
                        "Saya Bertanggung Jawab Untuk Pengembangan Karyawan Lain",
                        "Saya Tidak Mempunyai Wewenang Untuk Melaksanakan Tanggung Jawab Pekerjaan Saya",
                        "Jalur Perintah Yang Formal Tidak Dipatuhi",
                        "Saya Bertanggung Jawab Atas Semua Proyek Pekerjaan Dalam Waktu Bersamaan Yang Sering Tidak Dapat Dikendalikan",
                        "Tugas-Tugas Tampaknya Makin Hari Menjadi Makin Kompleks",
                        "Saya Merugikan Kemunduran Karir Saya Dalam Pejabat Pada Organisasi Ini",
                        "Saya Bertindak Atau Membuat Keputusan-Keputusan Yang Mempengaruhi Keselamatan Dan Kesejahteraan Orang Lain"
                      ];
                      foreach ($pertanyaan as $no => $p): $index = $no + 1; ?>
                        <tr>
                          <td><?= $index ?></td>
                          <td style="text-align:left;"><?= $p ?></td>
                          <?php for ($i = 1; $i <= 7; $i++): ?>
                            <td>
                              <input type="radio" name="q<?= $index ?>" value="<?= $i ?>" required>
                            </td>
                          <?php endfor; ?>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                  <div class="text-right mt-3 mb-3">
                    <button type="button" id="btnSimpanSurvey" class="btn btn-success" onclick="simpanSurveyDiagnosisStres()">
                      <i class="fa fa-check"></i> Simpan
                    </button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  th, td { text-align: center; vertical-align: middle; }
  th { background-color: #007bff; color: white; }
</style>

<script>
function simpanSurveyDiagnosisStres() {
  const id_mcu = document.getElementById('id_mcu')?.value || '';
  if (!id_mcu) {
    swal({ title: "Oops", text: "id_mcu wajib diisi.", type: "warning", confirmButtonColor: "#3cb878" });
    return;
  }

  let data = { id_mcu: id_mcu };
  for (let i = 1; i <= 18; i++) {
    let el = document.querySelector(`input[name="q${i}"]:checked`);
    if (!el) {
      swal({
        title: "Oops",
        text: `Pertanyaan ${i} belum dijawab.`,
        type: "warning",
        confirmButtonColor: "#3cb878"
      });
      return;
    }
    data[`q${i}`] = el.value;
  }

  swal({
    title: "Apakah kamu yakin?",
    text: "Menyimpan data survey diagnosis stres ini?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3cb878",
    confirmButtonText: "Yakin",
    cancelButtonText: "Batal",
    closeOnConfirm: false
  }, function () {
    const btn = document.getElementById('btnSimpanSurvey');
    if (btn) btn.disabled = true;

    $.ajax({
      url: "<?= base_url('Quitioners/simpan_survey_diagnosis_stres'); ?>",
      method: "POST",
      dataType: "json",
      data: data,
      success: function (res) {
        if (res && res.status === "success") {
          swal({
            title: "Berhasil!",
            type: "success",
            text: "Data survey diagnosis stres telah disimpan.",
            confirmButtonColor: "#3cb878"
          }, function () { location.reload(); });
        } else {
          swal({
            title: "Gagal",
            type: "warning",
            text: res && res.message ? res.message : "Gagal menyimpan.",
            confirmButtonColor: "#3cb878"
          });
          if (btn) btn.disabled = false;
        }
      },
      error: function () {
        swal({ title: "Error", type: "error", text: "Terjadi kesalahan koneksi.", confirmButtonColor: "#3cb878" });
        if (btn) btn.disabled = false;
      }
    });
  });
}

</script>