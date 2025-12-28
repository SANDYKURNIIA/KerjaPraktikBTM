<div class="panel panel-default card-view border border-secondary shadow-sm">
  <div class="panel-heading bg-primary text-white p-3 rounded-top">
    <h5 class="section-title mb-0"><strong>FORMULIR PENGAMATAN DOKTER HASIL ICU</strong></h5>
  </div>

  <div class="panel-wrapper collapse in">
    <div class="panel-body p-4">
      <div class="form-wrap">
        <form id="form-pengamatan" method="post" action="<?= base_url('PengamatanDokterHasilMcu/save') ?>">
          <input type="hidden" name="no_rm" value="<?= $header->no_rm ?>">
          <input type="hidden" name="id_pelayanan" value="<?= $id_pelayanan ?>">
          <input type="hidden" name="id_history" value="<?= $id_history ?>">
          <input type="hidden" name="tgl_pengkajian" value="<?= date('Y-m-d') ?>">

          <div class="form-body">

            <h6 class="txt-dark text-uppercase mb-3 pb-2 border-bottom"><strong>Data Pasien</strong></h6>

            <div class="row mb-3">
              <div class="form-group col-md-4">
                <label for="no_rm" class="form-label text-muted">No.RM</label>
                <input type="text" id="no_rm" class="form-control form-control-plaintext border border-secondary p-2"
                  value="<?= html_escape($header->no_rm) ?>" disabled readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="nama" class="form-label text-muted">Nama</label>
                <input type="text" id="nama" class="form-control form-control-plaintext border border-secondary p-2"
                  value="<?= isset($header->nama) ? html_escape($header->nama) : '' ?>" disabled readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="jenis_kelamin" class="form-label text-muted">Jenis Kelamin</label>
                <input type="text" id="jenis_kelamin" class="form-control form-control-plaintext border border-secondary p-2"
                  value="<?= isset($header->jenis_kelamin) ? html_escape($header->jenis_kelamin) : '' ?>"
                  disabled readonly>
              </div>
            </div>

            <div class="row mb-4">
              <div class="form-group col-md-4">
                <label for="tgl_lahir" class="form-label text-muted">Tanggal Lahir / Usia</label>
                <?php
                // Hitung umur dan ubah urutan tanggal lahir jadi Hari-Bulan-Tahun
                $umur = '';
                $tgl_lahir_format = '-';
                if (!empty($header->tgl_lahir)) {
                  $tgl_lahir = new DateTime($header->tgl_lahir);
                  $today = new DateTime('today');
                  $umur = $tgl_lahir->diff($today)->y . ' tahun';

                  // Format tanggal lahir ke format Indonesia (DD NamaBulan YYYY)
                  $bulan = [
                    1 => 'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                  ];
                  $tgl_lahir_format = $tgl_lahir->format('d') . ' ' . $bulan[(int)$tgl_lahir->format('m')] . ' ' . $tgl_lahir->format('Y');
                }
                ?>
                <input type="text" id="tgl_lahir" class="form-control form-control-plaintext border border-secondary p-2"
                  value="<?= !empty($header->tgl_lahir) ? html_escape($tgl_lahir_format . ' / ' . $umur) : '-' ?>" disabled readonly>
              </div>

              <div class="form-group col-md-8">
                <label for="alamat" class="form-label text-muted">Alamat</label>
                <input type="text" id="alamat" class="form-control form-control-plaintext border border-secondary p-2"
                  value="<?= isset($header->alamat) ? html_escape($header->alamat) : '' ?>" disabled readonly>
              </div>
            </div>


            <hr class="mt-0 mb-4 border-primary">

            <h6 class="txt-dark text-uppercase mb-3 pb-2 border-bottom"><strong>Observasi Dokter</strong></h6>

            <div class="row form-row">

              <div class="form-group col-md-4 mb-4">
                <label for="pencitraan" class="form-label fw-bold" style="color: #000;">
                  <i class="fas fa-x-ray me-2 text-secondary"></i> 1. <strong>Pencitraan:</strong>
                </label>
                <textarea name="pencitraan" id="pencitraan" class="form-control border-secondary" rows="3"
                  placeholder="Hasil pencitraan..."><?= html_escape($pencitraan ?? '') ?></textarea>
              </div>

              <div class="form-group col-md-4 mb-4">
                <label for="kultur" class="form-label fw-bold" style="color: #000;">
                  <i class="fas fa-vial me-2 text-secondary"></i> 2. <strong>Kultur (Lab):</strong>
                </label>
                <textarea name="kultur" id="kultur" class="form-control border-secondary" rows="3"
                  placeholder="Hasil kultur..."><?= html_escape($kultur ?? '') ?></textarea>
              </div>

              <div class="form-group col-md-4 mb-4">
                <label for="catatan_konsultasi" class="form-label fw-bold" style="color: #000;">
                  <i class="fas fa-handshake me-2 text-secondary"></i> 3. <strong>Catatan Konsultasi & Rekomendasi:</strong>
                </label>
                <textarea name="catatan_konsultasi" id="catatan_konsultasi" class="form-control border-secondary" rows="3"
                  placeholder="Tuliskan catatan konsultasi atau rekomendasi tindakan lanjutan..."><?= html_escape($catatan_konsultasi ?? '') ?></textarea>
              </div>
            </div>
            <div class="text-right mt-4 pt-3 border-top">
              <button type="submit" class="btn btn-success">
                <i class="fa fa-save me-2"></i> Simpan Hasil
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(function () {
    $('#form-pengamatan').on('submit', function (e) {
      e.preventDefault();

      var form = $(this);
      var btn = form.find('button[type="submit"]');

      btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin me-2"></i> Menyimpan...');

      $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: form.serialize(),
        dataType: 'json',
        success: function (res) {
          if (res.success) {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: res.message || 'Data berhasil disimpan.',
              confirmButtonText: 'OK'
            }).then(function () {
              window.history.back();
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: res.message || 'Terjadi kesalahan saat menyimpan data.',
              confirmButtonText: 'OK'
            });
          }
        },
        error: function (xhr) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Terjadi kesalahan pada server. Kode: ' + xhr.status,
            confirmButtonText: 'OK'
          });
        },
        complete: function () {
          btn.prop('disabled', false).html('<i class="fa fa-save me-2"></i> Simpan Hasil');
        }
      });
    });
  });
</script>
