

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="content-wrapper">
                <section class="content-header text-center">
                    <h4>FORMULIR MEDIKASI PASIEN ICU</h4>
                </section>

                <section class="content mt-30">
                    <div class="box box-success">
                        <div class="box-body">
                            <form method="POST" action="<?= base_url('Medikasi_pasien_icu/simpan') ?>" id="form_medikasi">
                                <input type="hidden" name="id_pelayanan" value="<?= $id_pelayanan ?>">
                                <input type="hidden" name="id_history" value="<?= $id_history ?>">
                                <input type="hidden" name="no_rm" value="<?= $no_rm ?>">
                                <input type="hidden" name="staff" value="<?= $staff ?>">
                                <!-- <input type="hidden" name="ttd" id="ttd"> -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nama Pasien</label>
                                        <input type="text" class="form-control" value="<?= $nama ?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label>No RM</label>
                                        <input type="text" class="form-control" value="<?= $no_rm ?>" readonly>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label>Umur / Jenis Kelamin</label>
                                        <input type="text" class="form-control" value="<?= $tgl_lahir ?> / <?= $jenis_kelamin ?>" readonly>
                                    </div>
                                </div>

                                <hr>

                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label>Jenis Obat</label>
                                        <input type="text" class="form-control" name="jenis_obat" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Frekuensi (x/hari)</label>
                                        <input type="number" class="form-control" name="frekuensi" required>
                                    </div>
                                    <!-- <div class="col-md-3">
                                        <label>Jam</label>
                                        <input type="time" class="form-control" name="jam" required>
                                    </div> -->
                                </div>

                                <div class="row mt-10">
                                    <div class="col-md-6">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Jam</label>
                                        <input type="time" class="form-control" name="jam" required>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <label>jenis_obat</label>
                                        <textarea class="form-control" name="jenis_obat"></textarea>
                                    </div> -->
                                </div>
                                <!-- 
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Tanda Tangan</label><br>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signatureModal">
                                            <i class="fa fa-pencil"></i> Tanda Tangan
                                        </button>
                                    </div>
                                </div> -->

                                <!-- <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Tanda Tangan</label><br> -->
                                <!-- Button untuk buka modal -->
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTtd">
                                            Tanda Tangan
                                        </button> -->

                                <!-- Tempat tampilkan hasil ttd -->
                                <!-- <div id="preview_ttd" class="mt-3"> -->
                                <!-- Gambar akan muncul di sini -->
                                <!-- </div> -->

                                <!-- Input hidden untuk simpan path ttd ke DB -->
                                <!-- <input type="hidden" name="ttd" id="ttd_path">
                                    </div>
                                </div> -->
                                <!-- Modal untuk tanda tangan -->
                                <!-- <div class="modal fade" id="modalTtd" tabindex="-1" role="dialog" aria-labelledby="modalTtdLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTtdLabel">Gambar Tanda Tangan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <canvas id="signature-pad" width="450" height="200" style="border:1px solid #000; border-radius:8px;"></canvas>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="clear-signature" class="btn btn-secondary">Clear</button>
                                                <button type="button" id="save-signature" class="btn btn-success">Submit Signature</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    const canvas = document.getElementById('signature-pad');
                                    const ctx = canvas.getContext('2d');
                                    let drawing = false; -->

                                <!-- canvas.addEventListener('mousedown', e => {
                                        drawing = true;
                                        ctx.beginPath();
                                        ctx.moveTo(e.offsetX, e.offsetY);
                                    });

                                    canvas.addEventListener('mousemove', e => {
                                        if (!drawing) return;
                                        ctx.lineTo(e.offsetX, e.offsetY);
                                        ctx.stroke();
                                    });

                                    canvas.addEventListener('mouseup', () => drawing = false);
                                    canvas.addEventListener('mouseout', () => drawing = false);

                                    // Tombol clear
                                    document.getElementById('clear-signature').addEventListener('click', () => {
                                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                                    });

                                    // Tombol simpan
                                    document.getElementById('save-signature').addEventListener('click', () => {
                                        const dataURL = canvas.toDataURL('image/png'); -->

                                <!-- fetch('<?= base_url("Medikasi_pasien_icu/simpan_ttd") ?>', {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json'
                                                },
                                                body: JSON.stringify({
                                                    image: dataURL
                                                })
                                            })
                                            .then(res => res.json())
                                            .then(data => {
                                                if (data.status === 'success') {
                                                    // Simpan path ke input hidden
                                                    document.getElementById('ttd_path').value = data.relative;

                                                    // Tampilkan preview gambar
                                                    document.getElementById('preview_ttd').innerHTML =
                                                        `<img src="${data.path}" alt="TTD" class="img-thumbnail mt-2" width="200">`;

                                                    // Tutup modal
                                                    $('#modalTtd').modal('hide');
                                                } else {
                                                    alert('Gagal menyimpan tanda tangan!');
                                                }
                                            })
                                            .catch(err => console.error('Error:', err));
                                    }); -->
                                <!-- </script> -->
<style>
    /* Warna teks utama form dan tabel */
    .form-control,
    .form-control:focus,
    label,
    h4,
    th,
    td {
        color: #000 !important; /* Hitam solid */
        font-weight: normal !important; /* Tidak tebal */
    }

    /* Style tabel */
    table th {
        background-color: #e6f4ea !important;
        color: #000 !important;
        font-weight: normal !important;
    }

    table td {
        color: #000 !important;
        font-weight: normal !important;
    }

    /* Input lebih tegas tapi clean */
    .form-control {
        border: 1px solid #51ce66b3 !important;
        box-shadow: none !important;
    }

    .form-control:focus {
        border-color: #28a745 !important; /* warna hijau saat aktif */
        outline: none;
    }

    /* Tombol rapi dan rata tengah */
    .btn {
        min-width: 100px;
        font-weight: 500;
    }

    .text-center h4 {
        color: #000 !important;
        font-weight: normal !important;
    }
</style>



                                <div class="row mt-20"> <!-- ubah mt-4 jadi mt-5 untuk jarak lebih lebar -->
                                    <div class="col-md-12 text-center">
                                        <a href="javascript:history.back()" class="btn btn-default">Kembali</a>
                                        <button type="submit" class="btn btn-success ml-2">Simpan</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                    <!-- Tabel hasil input -->
                    <div class="box box-primary mt-10">
                        <div class="box-header">
                            <h5>DATA MEDIKASI PASIEN ICU</h5>
                        </div>
                        <div class="box-body table-responsive mt-10">
                            <table class="table table-bordered table-striped" id="tabelMedikasi">
                                <thead style="background-color: #e6f4ea;">
                                    <tr>
                                        <th>No</th>
                                        <th>Pilih</th>
                                        <th>Hapus</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Jenis Obat</th>
                                        <th>Frekuensi</th>
                                        <!-- <th>jenis_obat</th> -->
                                        <!-- <th>TTD</th> -->
                                        <th>Staff</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data_medikasi)) : $no = 1;
                                        foreach ($data_medikasi as $row): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-success btn-xs btn-pilih"
                                                        data-id="<?= $row->id_medikasi ?>">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </td>

                                                <script>
                                                    $(document).ready(function() {
                                                        // Event klik tombol Pilih
                                                        $('.btn-pilih').click(function() {
                                                            var id = $(this).data('id');

                                                            $.ajax({
                                                                url: '<?= base_url("Medikasi_pasien_icu/get_medikasi_by_id") ?>',
                                                                type: 'POST',
                                                                data: {
                                                                    id: id
                                                                },
                                                                dataType: 'json',
                                                                success: function(data) {
                                                                    if (data) {
                                                                        // Isi form dengan data yang diambil
                                                                        $('input[name="jenis_obat"]').val(data.jenis_obat);
                                                                        $('input[name="frekuensi"]').val(data.frekuensi);
                                                                        $('input[name="jam"]').val(data.jam);
                                                                        $('input[name="tanggal"]').val(data.tanggal);
                                                                        // $('textarea[name="jenis_obat"]').val(data.jenis_obat);
                                                                        // $('#ttd_path').val(data.ttd);

                                                                        // if (data.ttd) {
                                                                        //     $('#preview_ttd').html(`<img src="<?= base_url() ?>${data.ttd}" width="200" class="img-thumbnail mt-2">`);
                                                                        // } else {
                                                                        //     $('#preview_ttd').html('');
                                                                        // }

                                                                        // Ubah form action menjadi update
                                                                        $('#form_medikasi').attr('action', '<?= base_url("Medikasi_pasien_icu/update") ?>');

                                                                        // Tambahkan hidden input id_medikasi jika belum ada
                                                                        if ($('#id_medikasi').length === 0) {
                                                                            $('#form_medikasi').append('<input type="hidden" id="id_medikasi" name="id_medikasi">');
                                                                        }
                                                                        $('#id_medikasi').val(data.id_medikasi);

                                                                        // Ubah teks tombol submit jadi "Update"
                                                                        $('#form_medikasi button[type="submit"]').text('Update');
                                                                    }
                                                                },
                                                                error: function(xhr, status, error) {
                                                                    alert('Gagal mengambil data!');
                                                                    console.log(error);
                                                                }
                                                            });
                                                        });
                                                    });
                                                </script>

                                                <td>
                                                    <a href="<?= base_url('Medikasi_pasien_icu/hapus/' . $row->id_medikasi . '/' . $id_pelayanan . '/' . $id_history) ?>"
                                                        onclick="return confirm('Yakin hapus data ini?')"
                                                        class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                                </td>
                                                <td><?= date('d/m/Y', strtotime($row->tanggal)) ?></td>
                                                <td><?= $row->jam ?></td>
                                                <td><?= $row->jenis_obat ?></td>
                                                <td><?= $row->frekuensi ?></td>
                                                <!-- <td><?= $row->jenis_obat ?></td> -->
                                                <!-- <td>
                                                    <?php if ($row->ttd) : ?>
                                                        <img src="<?= base_url($row->ttd) ?>" alt="TTD" width="100">
                                                    <?php endif; ?>
                                                </td> -->
                                                <td><?= $row->staff ?></td>
                                            </tr>
                                        <?php endforeach;
                                    else: ?>
                                        <tr>
                                            <td colspan="10" class="text-center">Belum ada data medikasi pasien.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- Modal Signature -->
<div class="modal fade" id="signatureModal" tabindex="-1" role="dialog" aria-labelledby="signatureModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title" id="signatureModalLabel">Tanda Tangan Digital</h4>
            </div>
            <div class="modal-body text-center">
                <canvas id="signatureCanvas" style="border:1px solid #000; width:100%; height:200px;"></canvas>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="clearSignature">Clear</button>
                <button type="button" class="btn btn-success" id="saveSignature">Submit Signature</button>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    // Canvas setup
    const canvas = document.getElementById('signatureCanvas');
    const ctx = canvas.getContext('2d');
    let drawing = false;

    canvas.addEventListener('mousedown', () => drawing = true);
    canvas.addEventListener('mouseup', () => drawing = false);
    canvas.addEventListener('mouseout', () => drawing = false);
    canvas.addEventListener('mousemove', draw);

    function draw(e) {
        if (!drawing) return;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#000';
        ctx.lineTo(e.offsetX, e.offsetY);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(e.offsetX, e.offsetY);
    }

    document.getElementById('clearSignature').addEventListener('click', function() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    });

    document.getElementById('saveSignature').addEventListener('click', function() {
        const dataURL = canvas.toDataURL('image/png');
        fetch('<?= base_url("Medikasi_pasien_icu/simpan_ttd") ?>', {
                method: 'POST',
                body: JSON.stringify({
                    image: dataURL
                }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('ttd').value = data.path;
                $('#signatureModal').modal('hide');
            });
    });
</script> -->

