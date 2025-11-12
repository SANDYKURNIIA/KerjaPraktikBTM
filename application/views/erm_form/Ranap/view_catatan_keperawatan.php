<!-- 🔹 Google Fonts & Font Awesome -->
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<!-- 🔹 Bootstrap & DataTables -->
<link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<!-- 🔹 SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    body {
        background-color: #f3f3f3;
        font-family: 'Poppins', sans-serif;
    }

    .container {
        background-color: #fff;
        border-radius: 16px;
        padding: 50px 60px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
        width: 92%;
        margin-left: 40px;
    }

    h3 {
        font-family: 'Merriweather', serif;
        font-weight: 700;
        font-size: 26px;
        color: #2c3e50;
        margin-bottom: 30px;
        text-align: left;
        border-left: 6px solid #27ae60;
        padding-left: 12px;
    }

    label {
        font-weight: 500;
        margin-bottom: 6px;
        color: #2c3e50;
    }

    .form-control,
    textarea {
        border-radius: 6px;
        padding: 12px 14px;
        font-size: 15px;
    }

    button.btn-success {
        border-radius: 6px;
        padding: 12px 28px;
        font-weight: 500;
    }

    .table-title {
        font-family: 'Merriweather', serif;
        font-size: 16px;
        font-weight: 700;
        color: #1b5e20;
        text-align: left;
        margin-bottom: 15px;
        margin-top: 30px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    #tabel_catatan {
        width: 100%;
        border-collapse: collapse;
    }

    #tabel_catatan th,
    #tabel_catatan td {
        text-align: center;
        vertical-align: middle;
        padding: 12px;
    }

    #tabel_catatan thead th {
        background-color: #e8f5e9;
        color: #2e7d32;
        font-weight: 600;
    }

    #tabel_catatan tbody td {
        color: #2c3e50;
        font-weight: 500;
    }

    #tabel_catatan tbody tr:hover {
        background-color: #f6fbf6;
        transition: 0.2s;
    }

    .btn-hapus {
        background-color: transparent;
        border: none;
        color: #e74c3c;
        font-size: 18px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-hapus:hover {
        color: #c0392b;
        transform: scale(1.1);
    }

    .dataTables_filter input {
        width: 220px !important;
        border-radius: 6px;
        padding: 6px 10px;
        border: 1px solid #ccc;
    }

    div.dataTables_wrapper div.dataTables_info {
        float: left;
        padding-top: 0.85em;
        margin-top: 10px;
        color: #2e7d32;
        font-weight: 500;
    }

    div.dataTables_wrapper div.dataTables_paginate {
        float: right;
        padding-top: 0.85em;
        margin-top: 10px;
    }

    .dataTables_paginate .paginate_button {
        border-radius: 8px !important;
        margin: 0 3px;
        border: 1px solid #ccc !important;
        background: none !important;
        color: #2c3e50 !important;
        padding: 4px 10px !important;
    }

    .dataTables_paginate .paginate_button.current {
        background: #2e7d32 !important;
        color: #fff !important;
        border: none !important;
    }

    .row {
        margin-bottom: 18px;
    }

    @media (max-width: 768px) {
        .container {
            padding: 25px;
        }

        h3 {
            font-size: 20px;
        }

        #tabel_catatan th,
        #tabel_catatan td {
            font-size: 13px;
        }

        .dataTables_filter input {
            width: 160px !important;
        }
    }
</style>

<div class="container">
    <h3>Catatan Keperawatan</h3>

    <input type="hidden" id="inPel" value="<?= $id_pelayanan ?>">
    <input type="hidden" id="inHis" value="<?= $id_history ?>">
    <input type="hidden" id="inNoRM" value="<?= $no_rm ?>">

    <!-- Data Pasien -->
    <div class="row">
        <div class="col-md-4">
            <label>Nama Pasien</label>
            <input type="text" class="form-control" value="<?= $nama ?>" disabled>
        </div>
        <div class="col-md-4">
            <label>No RM</label>
            <input type="text" class="form-control" value="<?= $no_rm ?>" disabled>
        </div>
        <div class="col-md-4">
            <label>Umur / Jenis Kelamin</label>
            <input type="text" class="form-control" value="<?php
                                                            $tanggal = new DateTime($tgl_lahir);
                                                            $today = new DateTime();
                                                            $usia = $today->diff($tanggal)->y;
                                                            echo $usia . ' tahun, ' . $jenis_kelamin;
                                                            ?>" disabled>
        </div>
    </div>

    <!-- Form Input -->
    <div class="row">
        <div class="col-md-3">
            <label for="jam">Jam</label>
            <input type="time" id="jam" class="form-control">
        </div>
        <div class="col-md-9">
            <label for="masalah">Masalah</label>
            <textarea id="masalah" class="form-control" rows="2"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="instruksi">Instruksi</label>
            <textarea id="instruksi" class="form-control" rows="2"></textarea>
        </div>
        <div class="col-md-6">
            <label for="tindakan">Tindakan</label>
            <textarea id="tindakan" class="form-control" rows="2"></textarea>
        </div>
    </div>

    <button class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
    <hr>

    <!-- Table -->
    <div class="table-title">Catatan Keperawatan</div>
    <div class="table-responsive">
        <table id="tabel_catatan" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width:5%">No</th>
                    <th style="width:8%">Aksi</th>
                    <th style="width:10%">Jam</th>
                    <th>Masalah</th>
                    <th>Instruksi</th>
                    <th>Tindakan</th>
                    <th style="width:15%">Tanggal</th>
                    <th>Nama Staff</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script>
    let tabel;

    function initTable(data) {
        if ($.fn.DataTable.isDataTable('#tabel_catatan')) {
            tabel.clear().rows.add(data).draw();
            return;
        }

        tabel = $('#tabel_catatan').DataTable({
            data: data,
            columns: [{
                    data: null,
                    render: (_, __, ___, meta) => meta.row + 1
                },
                {
                    data: 'id',
                    render: id => `
                        <button class="btn-hapus" onclick="hapus(${id})" title="Hapus">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    `
                },
                {
                    data: 'jam'
                },
                {
                    data: 'masalah'
                },
                {
                    data: 'instruksi'
                },
                {
                    data: 'tindakan'
                },
                {
                    data: 'tanggal'
                },
                {
                    data: 'staff'
                }
            ],
            language: {
                lengthMenu: "Tampilkan _MENU_ entri",
                zeroRecords: "Tidak ada data",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 - 0 dari 0 entri",
                infoFiltered: "(difilter dari total _MAX_ entri)",
                search: "Cari:",
                paginate: {
                    previous: "Sebelumnya",
                    next: "Selanjutnya"
                }
            },
            pageLength: 5,
            columnDefs: [{
                orderable: false,
                searchable: false,
                targets: [0, 1]
            }]
        });
    }

    function loadTable() {
        const id_pelayanan = $('#inPel').val();

        $.ajax({
            url: '<?= base_url("catatan_keperawatan/list/") ?>' + id_pelayanan,
            type: 'GET',
            dataType: 'json',
            success: res => initTable(res?.data ?? []),
            error: () => Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Gagal memuat data.',
                confirmButtonColor: '#e74c3c'
            })
        });
    }

    function simpan() {
        const data = {
            id_pelayanan: $('#inPel').val(),
            id_history: $('#inHis').val(),
            no_rm: $('#inNoRM').val(),
            jam: $('#jam').val(),
            masalah: $('#masalah').val(),
            instruksi: $('#instruksi').val(),
            tindakan: $('#tindakan').val()
        };

        if (!data.jam || !data.masalah || !data.instruksi || !data.tindakan) {
            Swal.fire({
                icon: 'warning',
                title: 'Lengkapi Data!',
                text: 'Isi semua field sebelum menyimpan.',
                confirmButtonColor: '#27ae60'
            });
            return;
        }

        $.ajax({
            url: '<?= base_url("catatan_keperawatan/simpan") ?>',
            type: 'POST',
            data: data,
            success: res => {
                const r = JSON.parse(res);
                if (r.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data tersimpan.',
                        confirmButtonColor: '#27ae60',
                        timer: 1500,
                        showConfirmButton: false
                    });
                    $('#jam, #masalah, #instruksi, #tindakan').val('');
                    loadTable();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Data gagal disimpan.',
                        confirmButtonColor: '#e74c3c'
                    });
                }
            },
            error: () => Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Terjadi kesalahan saat menyimpan data.',
                confirmButtonColor: '#e74c3c'
            })
        });
    }

    function hapus(id) {
        Swal.fire({
            title: 'Yakin hapus data ini?',
            text: 'Data yang dihapus tidak dapat dikembalikan.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e74c3c',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
        }).then(result => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url("catatan_keperawatan/hapus") ?>',
                    type: 'POST',
                    data: {
                        id
                    },
                    success: res => {
                        const r = JSON.parse(res);
                        if (r.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Terhapus!',
                                text: 'Data berhasil dihapus.',
                                confirmButtonColor: '#27ae60',
                                timer: 1200,
                                showConfirmButton: false
                            });
                            loadTable();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Gagal menghapus data.',
                                confirmButtonColor: '#e74c3c'
                            });
                        }
                    },
                    error: () => Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menghapus data.',
                        confirmButtonColor: '#e74c3c'
                    })
                });
            }
        });
    }

    $(document).ready(() => loadTable());
</script>