<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div id="lembar_monitoring">
    <div class="row mt-4 mb-5">
        <div class="col-sm-12">
            <div class="panel panel-default card-view shadow-sm">

                <div class="panel-heading mb-4">
                    <div class="pull-left">
                        <h3 class="panel-title txt-dark" style="color:black; font-weight:700;">
                            <strong>Lembar Monitoring</strong>
                        </h3>
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
                                        <label style="color:black; font-weight:600;">Nama Pasien</label>
                                        <input type="text" class="form-control" style="color:black;" value="<?= html_escape($nama_pasien ?? '') ?>" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:black; font-weight:600;">Jenis Kelamin</label>
                                        <input type="text" class="form-control" style="color:black;" value="<?= html_escape($jenis_kelamin ?? '') ?>" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label style="color:black; font-weight:600;">No.RM</label>
                                        <input type="text" class="form-control" style="color:black;" value="<?= html_escape($no_rm) ?>" disabled>
                                    </div>


                                </div>

                                <div class="row mb-4">
                                    <div class="form-group col-md-4">
                                        <label style="color:black; font-weight:600;">Tanggal Lahir</label>
                                        <input type="text" class="form-control" style="color:black;"
                                            value="<?= !empty($tgl_lahir) ? date('d-m-Y', strtotime($tgl_lahir)) : '' ?>" disabled>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label style="color:black; font-weight:600;">Alamat</label>
                                        <input type="text" class="form-control" style="color:black;" value="<?= html_escape($alamat ?? '') ?>" disabled>
                                    </div>
                                </div>


                                <!-- ===== FORM ===== -->
                                <form id="formMonitoring">
                                    <input type="hidden" name="id" id="monitoring_id">
                                    <input type="hidden" name="id_pelayanan" value="<?= $id_pelayanan ?>">
                                    <input type="hidden" name="id_history" value="<?= $id_history ?>">

                                    <div class="row mb-4">
                                        <!-- TD -->
                                        <div class="form-group col-md-2">
                                            <label style="color:black; font-weight:600;">TD</label>
                                            <input type="text"
                                                name="td"
                                                class="form-control"
                                                style="color:black;"
                                                value="<?= (!$sudah_ada_monitoring ? ($ass->tekanan_darah ?? '') : '') ?>">
                                        </div>

                                        <!-- RR -->
                                        <div class="form-group col-md-2">
                                            <label style="color:black; font-weight:600;">RR</label>
                                            <input type="text"
                                                name="rr"
                                                class="form-control"
                                                style="color:black;"
                                                value="<?= (!$sudah_ada_monitoring ? ($ass->frequensi_nafas ?? '') : '') ?>">
                                        </div>

                                        <!-- HR -->
                                        <div class="form-group col-md-2">
                                            <label style="color:black; font-weight:600;">HR</label>
                                            <input type="text"
                                                name="hr"
                                                class="form-control"
                                                style="color:black;"
                                                value="<?= (!$sudah_ada_monitoring ? ($ass->frequensi_nadi ?? '') : '') ?>">
                                        </div>

                                        <!-- Saturasi -->
                                        <div class="form-group col-md-3">
                                            <label style="color:black; font-weight:600;">Saturasi</label>
                                            <input type="text"
                                                name="saturasi"
                                                class="form-control"
                                                style="color:black;"
                                                value="<?= (!$sudah_ada_monitoring ? ($ass->spo2 ?? '') : '') ?>">
                                        </div>

                                        <!-- Temp -->
                                        <div class="form-group col-md-3">
                                            <label style="color:black; font-weight:600;">Temp</label>
                                            <input type="text"
                                                name="temp"
                                                class="form-control"
                                                style="color:black;"
                                                value="<?= (!$sudah_ada_monitoring ? ($ass->suhu ?? '') : '') ?>">
                                        </div>

                                        <!-- Tanggal Monitoring -->
                                        <div class="form-group col-md-3">
                                            <label style="color:black; font-weight:600;">Tanggal Monitoring</label>
                                            <input type="date"
                                                name="tgl_monitoring"
                                                class="form-control"
                                                style="color:black;"
                                                value="<?= date('Y-m-d') ?>">
                                        </div>

                                        <!-- Jam Monitoring -->
                                        <div class="form-group col-md-3">
                                            <label style="color:black; font-weight:600;">Jam Monitoring</label>
                                            <input type="time"
                                                name="jam_monitoring"
                                                class="form-control"
                                                style="color:black;"
                                                value="<?= date('H:i') ?>">
                                        </div>


                                    </div>


                                    <!-- ===== KEADAAN UMUM ===== -->
                                    <div class="form-group mb-4">
                                        <label style="color:black; font-weight:600;">Keadaan Umum</label>
                                        <textarea class="form-control" name="keadaan_umum" rows="5" style="color:black; resize:vertical;"></textarea>
                                    </div>

                                    <!-- ===== TINDAKAN / TERAPI ===== -->
                                    <div class="form-group mb-4">
                                        <label style="color:black; font-weight:600;">Tindakan / Therapi</label>
                                        <textarea class="form-control" name="tindakan_terapi" rows="5" style="color:black; resize:vertical;"></textarea>
                                    </div>

                                    <!-- ===== KETERANGAN ===== -->
                                    <div class="form-group mb-4">
                                        <label style="color:black; font-weight:600;">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" rows="5" style="color:black; resize:vertical;"></textarea>
                                    </div>

                                    <!-- ===== BUTTON ===== -->
                                    <div class="row">
                                        <div class="col-md-12 d-flex">
                                            <button type="button" onclick="history.back()"
                                                class="btn btn-default btn-sm me-2" style="min-width:100px;height:36px;">
                                                <i class="fa fa-arrow-left"></i> KEMBALI
                                            </button>
                                            <button type="submit" id="btn_simpan"
                                                class="btn btn-success btn-sm" style="min-width:100px;height:36px;">
                                                <i class="fa fa-save"></i> SIMPAN
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

<div class="panel panel-default card-view">

    <div class="panel-heading">

        <div class="pull-left">
            <h6 class="panel-title txt-dark">Lembar Monitoring</h6>

        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="form-group">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table table-hover display pb-60" id="tabel_monitoring">
                                <thead>
                                    <tr class="bg-success">
                                        <th><input type="checkbox" id="check_all" onclick="toggle(this)"> All</th>
                                        <th>NO</th>
                                        <th>PILIH</th>
                                        <th>HAPUS</th>
                                        <th>TD</th>
                                        <th>RR</th>
                                        <th>HR</th>
                                        <th>SATURASI</th>
                                        <th>TEMP</th>
                                        <th>TANGGAL MONITORING</th>
                                        <th>JAM MONITORING</th>
                                        <th>KEADAAN UMUM</th>
                                        <th>TINDAKAN / THERAPI</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-success">
                                        <th>All</th>
                                        <th>NO</th>
                                        <th>PILIH</th>
                                        <th>HAPUS</th>
                                        <th>TD</th>
                                        <th>RR</th>
                                        <th>HR</th>
                                        <th>SATURASI</th>
                                        <th>TEMP</th>
                                        <th>TANGGAL MONITORING</th>
                                        <th>JAM MONITORING</th>
                                        <th>KEADAAN UMUM</th>
                                        <th>TINDAKAN / THERAPI</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </tfoot>
                                <tbody></tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    let selectedId = null;
    let tableMonitoring;

    function toggle(source) {
        $('.check_item').prop('checked', source.checked);
    }

    $(document).ready(function() {

        // ===== Inisialisasi DataTables =====
        tableMonitoring = $('#tabel_monitoring').DataTable({
            ajax: {
                url: '<?= base_url("Lembar_Monitoring/get_by_history") ?>/<?= $id_history ?>',
                dataSrc: '' // karena controller return array JSON
            },
            columns: [{
                    data: null,
                    render: function() {
                        return '<input type="checkbox" class="check_item">';
                    }
                },
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'id',
                    render: function(data) {
                        return `<button class="btn btn-warning btn-sm btn-pilih" data-id="${data}" title="Edit">
                            <i class="fa fa-edit"></i>

                        </button>`;
                    }
                },
                {
                    data: 'id',
                    render: function(data) {
                        return `<button class="btn btn-danger btn-sm btn-hapus" data-id="${data}" title="Hapus">
                           <i class="fa fa-trash-o"></i>


                        </button>`;
                    }
                },
                {
                    data: 'td',
                    render: function(data) {
                        return `<span style="color:black;font-weight:200;">${data ?? ''}</span>`;
                    }
                },
                {
                    data: 'rr',
                    render: function(data) {
                        return `<span style="color:black;font-weight:200;">${data ?? ''}</span>`;
                    }
                },
                {
                    data: 'hr',
                    render: function(data) {
                        return `<span style="color:black;font-weight:200;">${data ?? ''}</span>`;
                    }
                },
                {
                    data: 'saturasi',
                    render: function(data) {
                        return `<span style="color:black;font-weight:200;">${data ?? ''}</span>`;
                    }
                },
                {
                    data: 'temp',
                    render: function(data) {
                        return `<span style="color:black;font-weight:200;">${data ?? ''}</span>`;
                    }
                },


                {
                    data: 'tanggal_monitoring',
                    render: function(data) {
                        return `<span style="color:black;font-weight:200;">
                    ${data ? new Date(data).toLocaleDateString('id-ID') : ''}
                </span>`;
                    }
                },

                {
                    data: 'jam_monitoring',
                    render: function(data) {
                        return `<span style="color:black;font-weight:200;">
                    ${data ?? ''}
                </span>`;
                    }
                },



                {
                    data: 'keadaan_umum',
                    render: function(data) {
                        return `<div style="color:black;font-weight:200;">${data ?? ''}</div>`;
                    }
                },
                {
                    data: 'tindakan_terapi',
                    render: function(data) {
                        return `<div style="color:black;font-weight:200;">${data ?? ''}</div>`;
                    }
                },
                {
                    data: 'keterangan',
                    render: function(data) {
                        return `<div style="color:black;font-weight:200;">${data ?? ''}</div>`;
                    }
                },

            ]
        });

        // ===== Submit Form =====
        $('#formMonitoring').on('submit', function(e) {
            e.preventDefault();
            const formData = $(this).serialize();

            $.ajax({
                url: '<?= base_url("Lembar_Monitoring/save") ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(res) {
                    if (res.success) {
                        alert('Data berhasil disimpan');

                        // reset form → SEMUA KOSONG
                        $('#formMonitoring')[0].reset();

                        // kosongkan kolom vital
                        $('input[name="td"]').val('');
                        $('input[name="rr"]').val('');
                        $('input[name="hr"]').val('');
                        $('input[name="saturasi"]').val('');
                        $('input[name="temp"]').val('');

                        // reset state
                        $('#monitoring_id').val('');
                        selectedId = null;

                        // reset tombol
                        $('#btn_simpan')
                            .html('<i class="fa fa-save"></i> SIMPAN')
                            .removeClass('btn-warning')
                            .addClass('btn-success');

                        // reload tabel → auto-refresh
                        tableMonitoring.ajax.reload(null, false); // false supaya tidak pindah halaman
                    } else {
                        alert(res.message || 'Gagal menyimpan');
                    }
                }
            });
        });



        // ===== Pilih data untuk edit =====
        $('#tabel_monitoring tbody').on('click', '.btn-pilih', function() {
            selectedId = $(this).data('id');

            $.getJSON('<?= site_url("Lembar_Monitoring/get_monitoring") ?>/' + selectedId, function(res) {
                if (!res.success) {
                    alert(res.message);
                    return;
                }

                $('#btn_simpan').html('EDIT DATA');
                $('#btn_simpan').addClass('btn-warning');

                const m = res.data;
                $('#monitoring_id').val(m.id);

                // ✅ KOSONGKAN TD, RR, HR, SATURASI, TEMP
                $('input[name="td"]').val('');
                $('input[name="rr"]').val('');
                $('input[name="hr"]').val('');
                $('input[name="saturasi"]').val('');
                $('input[name="temp"]').val('');

                $('input[name="tgl_monitoring"]').val(m.tanggal_monitoring);
                $('input[name="jam_monitoring"]').val(m.jam_monitoring);
                $('textarea[name="keadaan_umum"]').val(m.keadaan_umum);
                $('textarea[name="tindakan_terapi"]').val(m.tindakan_terapi);
                $('textarea[name="keterangan"]').val(m.keterangan);

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });

        // ===== Hapus data =====
        $('#tabel_monitoring tbody').on('click', '.btn-hapus', function() {
            const id = $(this).data('id');

            if (!confirm('Hapus data ini?')) return;

            $.post('<?= base_url("Lembar_Monitoring/delete") ?>/' + id, function(res) {
                if (res.success) {
                    alert('Data berhasil dihapus');

                    // hapus row dari DataTable
                    tableMonitoring.row($(this).parents('tr')).remove().draw(false);

                    // reset form jika data yang sedang diedit dihapus
                    if ($('#monitoring_id').val() == id) {
                        $('#formMonitoring')[0].reset();
                        $('#monitoring_id').val('');
                        selectedId = null;
                    }

                    // ===== Auto refresh form dengan row pertama =====
                    const firstRowData = tableMonitoring.row(0).data();
                    if (firstRowData) {
                        $('input[name="td"]').val(firstRowData.td);
                        $('input[name="rr"]').val(firstRowData.rr);
                        $('input[name="hr"]').val(firstRowData.hr);
                        $('input[name="saturasi"]').val(firstRowData.saturasi);
                        $('input[name="temp"]').val(firstRowData.temp);

                        $('input[name="tgl_monitoring"]').val(firstRowData.tanggal_monitoring);
                        $('input[name="jam_monitoring"]').val(firstRowData.jam_monitoring);
                        $('textarea[name="keadaan_umum"]').val(firstRowData.keadaan_umum);
                        $('textarea[name="tindakan_terapi"]').val(firstRowData.tindakan_terapi);
                        $('textarea[name="keterangan"]').val(firstRowData.keterangan);
                    } else {
                        // jika tidak ada row tersisa → kosongkan form
                        $('#formMonitoring')[0].reset();
                        $('#monitoring_id').val('');
                    }
                } else {
                    alert(res.message || 'Gagal menghapus');
                }
            }.bind(this), 'json'); // bind(this) supaya context tetap benar
        });

    });
</script>