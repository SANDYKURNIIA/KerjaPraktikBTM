<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div id="implementasi_perawatan">
    <div class="row mt-4 mb-5">
        <div class="col-sm-12">
            <div class="panel panel-default card-view shadow-sm">
                <div class="panel-heading mb-4">
                    <div class="pull-left">
                        <h3 class="panel-title txt-dark" style="color:black; font-weight:700;"><strong>Implementasi Perawatan</strong></h3>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">
                            <div class="form-body">

                                <!-- ===== DATA PASIEN ===== -->
                                <div class="row mb-3">
                                    <div class="form-group col-md-4">
                                        <label style="color:black; font-weight:600;">No.RM</label>
                                        <input type="text" class="form-control" style="color:black;" value="<?= html_escape($no_rm) ?>" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:black; font-weight:600;">Nama</label>
                                        <input type="text" class="form-control" style="color:black;" value="<?= isset($nama) ? html_escape($nama) : '' ?>" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:black; font-weight:600;">Jenis Kelamin</label>
                                        <input type="text" class="form-control" style="color:black;" value="<?= isset($jenis_kelamin) ? html_escape($jenis_kelamin) : '' ?>" disabled>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="form-group col-md-4">
                                        <label style="color:black; font-weight:600;">Tanggal Lahir / Usia</label>
                                        <input type="text" class="form-control" style="color:black;" value="<?php
                                                                                                            if (!empty($tgl_lahir)) {
                                                                                                                $date = new DateTime($tgl_lahir);
                                                                                                                $now = new DateTime();
                                                                                                                $interval = $now->diff($date);
                                                                                                                echo date('d-m-Y', strtotime($tgl_lahir)) . ' / ' . $interval->y . ' Tahun';
                                                                                                            }
                                                                                                            ?>" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:black; font-weight:600;">Alamat</label>
                                        <input type="text" class="form-control" style="color:black;" value="<?= isset($alamat) ? html_escape($alamat) : '' ?>" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:black; font-weight:600;">Tanggal Pemeriksaan</label>
                                        <input type="text" class="form-control" style="color:black;" value="<?= isset($tgl_pemeriksaan) ? date('d-m-Y', strtotime($tgl_pemeriksaan)) : '' ?>" disabled>
                                    </div>
                                </div>

                                <!-- ===== FORM IMPLEMENTASI ===== -->
                                <form id="formImplementasiPerawatan" method="post">
                                    <!-- hidden untuk koneksi ke controller -->
                                    <input type="hidden" name="id_pelayanan" value="<?= isset($id_pelayanan) ? $id_pelayanan : '' ?>">
                                    <input type="hidden" name="id_history" value="<?= isset($id_history) ? $id_history : '' ?>">
                                    <input type="hidden" name="id_staff" value="<?= $this->session->userdata('id_staff') ?>">


                                    <!-- ===== TABEL TINDAKAN ===== -->
                                    <div class="table-responsive mb-5" style="max-height: 500px; overflow: auto;">
                                        <table class="table table-bordered table-striped table-scroll" style="min-width: 1200px; border-collapse: collapse;">
                                            <thead class="table-light">
                                                <tr>
                                                    <th rowspan="2" style="width:60px; vertical-align:middle; position: sticky; top: 0; background: #19c650ff; z-index: 3;">No</th>
                                                    <th rowspan="2" style="width:220px; vertical-align:middle; position: sticky; top: 0; background: #19c650ff; z-index: 3;">Mandiri</th>
                                                    <th colspan="24" style="text-align:center; position: sticky; top: 0; background: #71de04ff; z-index: 2;">Jam</th>
                                                </tr>
                                                <tr>
                                                    <?php for ($i = 7; $i <= 24; $i++): ?>
                                                        <th style="position: sticky; top: 40px; background: #19c650ff; z-index: 1;"><?= $i ?></th>
                                                    <?php endfor; ?>
                                                    <?php for ($i = 1; $i <= 6; $i++): ?>
                                                        <th style="position: sticky; top: 40px; background: #19c650ff; z-index: 1;"><?= $i ?></th>
                                                    <?php endfor; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // kunci = nama kolom di DB, value = label
                                                $tindakan = [
                                                    "memandikan_pasien" => "Memandikan Pasien",
                                                    "mencuci_rambut" => "Mencuci Rambut",
                                                    "perawatan_genitalia_eks" => "Perawatan Genitalia Eks",
                                                    "perawatan_mulut" => "Perawatan Mulut",
                                                    "fisioterapi_dada" => "Fisioterapi Dada",
                                                    "penghisapan_sekret" => "Penghisapan Sekret",
                                                    "terapi_inhalasi" => "Terapi Inhalasi",
                                                    "kompres" => "Kompres",
                                                    "perawatan_luka_operasi" => "Perawatan Luka Operasi",
                                                    "perawatan_luka_dekubitus" => "Perawatan Luka Dekubitus",
                                                    "perawatan_ett" => "Perawatan ETT",
                                                    "perawatan_cvp" => "Perawatan CVP",
                                                    "perawatan_drain" => "Perawatan Drain",
                                                    "memasang_jalur_iv" => "Memasang Jalur IV",
                                                    "perawatan_jalur_iv" => "Perawatan Jalur IV",
                                                    "mencabut_jalur_iv" => "Mencabut Jalur IV",
                                                    "pasang_ngt" => "Pasang NGT",
                                                    "memberikan_makanan" => "Memberikan Makanan",
                                                    "mobilisasi_ubah_posisi" => "Mobilisasi / Ubah Posisi",
                                                    "latihan_gerak_ringan" => "Latihan Gerak Ringan",
                                                    "gosok_minyak" => "Gosok Minyak"
                                                ];
                                                $no = 1;

                                                $jam = array_merge(range(7, 24), range(1, 6)); // urutan jam sesuai header
                                                foreach ($tindakan as $key => $label):
                                                    $saved_array = !empty($saved->$key) ? json_decode($saved->$key, true) : [];
                                                ?>
                                                    <tr>
                                                        <td style="position: sticky; left: 0; background: #ffffffff; color:black;"><?= $no++ ?></td>
                                                        <td style="text-align:left; position: sticky; left: 40px; background: #ffffffff; color:black;"><?= $label ?></td>
                                                        <?php foreach ($jam as $j): ?>
                                                            <td style="text-align:center;">
                                                                <input type="checkbox" name="<?= $key ?>[]" value="<?= $j ?>" style="transform: scale(1.1);" <?= in_array($j, $saved_array) ? 'checked' : '' ?>>
                                                            </td>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- ===== LAPORAN PERAWAT ===== -->
                                    <div class="mt-5 mb-4 text-start">
                                        <h5 class="judul-laporan" style="font-size: 15px; font-weight: 30; color: black; margin: 0;">Laporan Perawat</h5>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4 mb-4">
                                            <label style="color: black;">Pagi</label>
                                            <textarea class="form-control" name="laporan_pagi" rows="3" style="color:black;"><?= !empty($saved->laporan_pagi) ? html_escape($saved->laporan_pagi) : '' ?></textarea>
                                        </div>
                                        <div class="form-group col-md-4 mb-4">
                                            <label style="color: black;">Siang</label>
                                            <textarea class="form-control" name="laporan_siang" rows="3" style="color:black;"><?= !empty($saved->laporan_siang) ? html_escape($saved->laporan_siang) : '' ?></textarea>
                                        </div>
                                        <div class="form-group col-md-4 mb-4">
                                            <label style="color: black;">Malam</label>
                                            <textarea class="form-control" name="laporan_malam" rows="3" style="color:black;"><?= !empty($saved->laporan_malam) ? html_escape($saved->laporan_malam) : '' ?></textarea>
                                        </div>

                                    </div>

                                    <!-- ===== BUTTON ===== -->
                                    <div class="row mt-3">
                                        <div class="col-md-12 d-flex">
                                            <button type="button" onclick="history.back()" class="btn btn-default btn-anim btn-sm me-2" style="min-width:100px;height:36px;">
                                                <i class="fa fa-arrow-left"></i> <span class="btn-text">KEMBALI</span>
                                            </button>
                                            <button type="submit" id="btnSimpan" class="btn btn-success btn-sm" style="min-width:100px;height:36px;">
                                                <i class="fa fa-save"></i> Simpan
                                            </button>
                                        </div>
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

<!-- JAVASCRIPT AJAX -->
<!-- Tambahkan SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(function() {
        $('#formImplementasiPerawatan').on('submit', function(e) {
            e.preventDefault();
            var $btn = $('#btnSimpan');
            $btn.prop('disabled', true).text('Menyimpan...');

            $.ajax({
                    url: '<?= base_url("Implementasi_Perawatan/simpan_ajax") ?>',
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json'
                })
                .done(function(resp) {
                    if (resp.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: resp.message,
                            timer: 1800,
                            showConfirmButton: false
                        });
                    } else {
                        var msg = resp.message || 'Gagal menyimpan data.';
                        if (resp.db_error) msg += '\nDB: ' + JSON.stringify(resp.db_error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: msg
                        });
                        console.error(resp);
                    }
                })
                .fail(function(xhr, status, err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan',
                        text: 'Terjadi kesalahan koneksi: ' + err
                    });
                    console.error(xhr.responseText);
                })
                .always(function() {
                    $btn.prop('disabled', false).text('Simpan');
                });
        });
    });
</script>