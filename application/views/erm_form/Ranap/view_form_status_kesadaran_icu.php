<!DOCTYPE html>
<html>

<head>
  <title>Status Kesadaran Pasien ICU</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      background: #f7f7f7;
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    .panel {
      border-radius: 12px;
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
      border: 1px solid #ddd;
      background: #fff;
      width: 100%;
    }

    .panel-heading {
      background-color: #3cb878;
      color: white;
      padding: 15px 25px;
      border-radius: 12px 12px 0 0;
    }

    .panel-title {
      font-size: 20px;
      font-weight: bold;
      margin: 0;
    }

    .panel-body {
      padding: 25px 35px;
    }

    .form-group label {
      font-weight: 600;
      color: #333;
    }

    .bold-label {
      font-weight: bold;
      color: #000;
    }

    .form-control {
      border-radius: 8px;
      border: 1px solid #ccc;
      width: 100%;
      padding: 6px 10px;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      margin-bottom: 15px;
    }

    .col-md-4,
    .col-md-6,
    .col-md-12 {
      padding: 5px;
    }

    .col-md-4 {
      flex: 0 0 33.333%;
      max-width: 33.333%;
    }

    .col-md-6 {
      flex: 0 0 50%;
      max-width: 50%;
    }

    .col-md-12 {
      flex: 0 0 100%;
      max-width: 100%;
    }

    textarea.form-control {
      resize: none;
    }

    .btn {
      border-radius: 6px;
      padding: 8px 18px;
      font-size: 14px;
      cursor: pointer;
    }

    .btn-success {
      background-color: #3cb878;
      border: none;
      color: white;
    }

    .btn-success:hover {
      background-color: #34a36c;
    }

    .btn-default {
      background-color: #e0e0e0;
      border: none;
      color: #333;
    }

    .btn-default:hover {
      background-color: #d6d6d6;
    }

    .text-right {
      text-align: right;
    }

    .lds-dual-ring.overlay {
      display: none;
      position: fixed;
      z-index: 9999;
      height: 100%;
      width: 100%;
      top: 0;
      left: 0;
      background: rgba(255, 255, 255, 0.7);
    }

    .lds-dual-ring.overlay::after {
      content: " ";
      display: block;
      position: absolute;
      left: 50%;
      top: 50%;
      width: 64px;
      height: 64px;
      margin: -32px 0 0 -32px;
      border-radius: 50%;
      border: 6px solid #3cb878;
      border-color: #3cb878 transparent #3cb878 transparent;
      animation: lds-dual-ring 1.2s linear infinite;
    }

    @keyframes lds-dual-ring {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    /* Header tabel */
    #tabel_kesadaran thead th {
      background-color: #3cb878;
      color: white;
      font-weight: bold;
      text-align: center;
      border-right: 1px solid #ddd;
    }

    /* Isi tabel tebal */
    #tabel_kesadaran tbody td {
      font-weight: bold;
      color: #000;
      text-align: center;
      border-right: 1px solid #ddd;
    }

    #tabel_kesadaran tbody tr:hover {
      background-color: #e9f9ef;
      cursor: pointer;
    }

    /* Garis bawah untuk header terakhir */
    #tabel_kesadaran th:last-child,
    #tabel_kesadaran td:last-child {
      border-right: none;
    }

    /* Judul bagian */
    h5.section-title {
      font-weight: bold;
      color: #000;
      margin-top: 20px;
      text-transform: uppercase;
    }
  </style>
</head>

<body>

  <div class="panel panel-default card-view">
    <div class="panel-heading">
      <div class="panel-title">Form Status Kesadaran Pasien ICU</div>
    </div>

    <div class="panel-body">
      <form id="formStatusICU">
        <input type="hidden" name="id_pelayanan" id="id_pelayanan" value="<?= $id_pelayanan ?>">
        <input type="hidden" name="id_history" value="<?= $id_histori ?>">
        <input type="hidden" name="no_rm" value="<?= $pasien->no_rm ?>">

        <!-- Tanggal -->
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="bold-label">Tanggal</label>
              <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>">
            </div>
          </div>
        </div>

        <h5 class="section-title">Glasgow Coma Scale (GCS)</h5>
        <div class="row">
          <div class="col-md-4">
            <label class="bold-label">E (Eye)</label>
            <input type="number" class="form-control" name="gcs_e" min="1" max="4">
          </div>
          <div class="col-md-4">
            <label class="bold-label">V (Verbal)</label>
            <input type="number" class="form-control" name="gcs_v" min="1" max="5">
          </div>
          <div class="col-md-4">
            <label class="bold-label">M (Motorik)</label>
            <input type="number" class="form-control" name="gcs_m" min="1" max="6">
          </div>
        </div>

        <div class="form-group">
          <label class="bold-label">Total GCS</label>
          <input type="number" class="form-control" name="total_gcs" readonly>
        </div>

        <script>
          $('input[name="gcs_e"], input[name="gcs_v"], input[name="gcs_m"]').on('input', function() {
            let e = parseInt($('input[name="gcs_e"]').val()) || 0;
            let v = parseInt($('input[name="gcs_v"]').val()) || 0;
            let m = parseInt($('input[name="gcs_m"]').val()) || 0;
            $('input[name="total_gcs"]').val(e + v + m);
          });
        </script>

        <h5 class="section-title">Pemeriksaan Pupil</h5>

        <div class="row">
          <div class="col-md-6">
            <label class="bold-label">Pupil Kanan</label>
            <input type="text" class="form-control" name="pupil_kanan" placeholder="misal: 3mm">
          </div>
          <div class="col-md-6">
            <label class="bold-label">Pupil Kiri</label>
            <input type="text" class="form-control" name="pupil_kiri" placeholder="misal: 3mm">
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <label class="bold-label">Refleks Cahaya</label>
            <select name="refleks_cahaya" class="form-control">
              <option value="">-- Pilih --</option>
              <option value="Normal">Normal</option>
              <option value="Tidak Ada">Tidak Ada</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="bold-label">Jam</label>
            <input type="time" class="form-control" id="inPukul" name="inPukul" value="<?= date('H:i') ?>">
          </div>
        </div>

        <script>
          function updateCurrentTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            document.getElementById('inPukul').value = `${hours}:${minutes}`;
          }
          setInterval(updateCurrentTime, 1000);
          updateCurrentTime();
        </script>

        <div class="form-group mt-10 mb-20">
          <label class="bold-label">Keterangan</label>
          <textarea name="keterangan" class="form-control" rows="3"></textarea>
        </div>

        <div class="text-right mt-20">
          <button type="button" class="btn btn-default" onclick="history.back()">
            <i class="fa fa-arrow-left"></i> Kembali
          </button>
          <button type="button" class="btn btn-success" id="btnSimpanStatusICU">
            <i class="fa fa-save"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- TABEL RIWAYAT -->
  <div class="panel panel-default mt-20">
    <div class="panel-heading">
      <div class="panel-title">Riwayat Status Kesadaran Pasien ICU</div>
    </div>
    <div class="panel-body">
      <table id="tabel_kesadaran" class="display" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>GCS (E/V/M)</th>
            <th>Total</th>
            <th>Pupil Kanan</th>
            <th>Pupil Kiri</th>
            <th>Refleks</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>

  <div class="lds-dual-ring overlay" id="loading"></div>

  <script>
    let tabel;

    $(document).ready(function() {
      tabel = $('#tabel_kesadaran').DataTable({
        ajax: {
          url: "<?= base_url('Erm_status_kesadaran_icu/tampil_list_per_id') ?>",
          type: "POST",
          data: function(d) {
            d.id_pelayanan = $('#id_pelayanan').val();
          }
        }
      });

      $('#btnSimpanStatusICU').click(function(e) {
        e.preventDefault();
        $("#loading").show();

        $.ajax({
          url: "<?= base_url('Erm_status_kesadaran_icu/simpan') ?>",
          type: "POST",
          data: $('#formStatusICU').serialize(),
          dataType: "json",
          success: function(res) {
            $("#loading").hide();
            if (res.status == 'success') {
              Swal.fire('Berhasil!', 'Data berhasil disimpan.', 'success');
              $('#formStatusICU')[0].reset();
              tabel.ajax.reload();
            } else {
              Swal.fire('Gagal!', 'Data tidak berhasil disimpan.', 'error');
            }
          },
          error: function() {
            $("#loading").hide();
            Swal.fire('Error!', 'Terjadi kesalahan pada server.', 'error');
          }
        });
      });

      $('#tabel_kesadaran').on('click', '.hapus', function() {
        const id = $(this).data('id');

        Swal.fire({
          title: 'Hapus Data?',
          text: 'Data yang dihapus tidak dapat dikembalikan!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Ya, hapus!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "<?= base_url('Erm_status_kesadaran_icu/hapus') ?>",
              type: "POST",
              dataType: "json",
              data: { id: id },
              beforeSend: function() {
                $('#loading').show();
              },
              success: function(response) {
                $('#loading').hide();

                if (response.status === 'success') {
                  Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data berhasil dihapus.',
                    icon: 'success',
                    timer: 1500
                  });
                  tabel.ajax.reload(null, false);
                } else {
                  Swal.fire({
                    title: 'Gagal!',
                    text: 'Data gagal dihapus.',
                    icon: 'error'
                  });
                }
              },
              error: function() {
                $('#loading').hide();
                Swal.fire({
                  title: 'Kesalahan!',
                  text: 'Terjadi kesalahan pada server.',
                  icon: 'error'
                });
              }
            });
          }
        });
      });
    });
  </script>

</body>
</html>
