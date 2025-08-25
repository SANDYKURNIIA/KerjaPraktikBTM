<h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
</h6>
<hr width="95%">
<div class="row">
    <div class="col-md-6">
        <div class="form-group ">
            <label class="control-label col-md-3">JENIS RESEP</label>
            <div class="col-md-9 has-success">
                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inTindakan" id="inJenisResep">
                    <option value="1">Non Racikan</option>
                    <option value="2">Racikan</option>
                    <option value="5">Obat Kronis</option>
                    <option value="next">Lanjutkan Resep</option>
                    <option value="3">OTT</option>
                </select>
            </div>
        </div>
    </div>
    <div class="collapse_resep" style="display: block;">
        <div class="col-md-6">
            <div class="form-group ">
                <label class="control-label col-md-3">NAMA RESEP</label>
                <div class="col-md-9 has-success">
                    <input type="text" class="form-control" id="inNamaResep" placeholder="Nama Resep">
                    <span class="help-block"></span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group ">
                <label class="control-label col-md-3">DEPO</label>
                <div class="col-md-9 has-success">
                    <select class="form-control filled-input select2" id="inDepo1">
                        <option value="APOTIK">RAJAL</option>

                        <option value="RANAP">RANAP</option>
                    </select>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse_next_resep" style="display: none;">


        <div class="col-md-6">
            <div class="form-group ">
                <label class="control-label col-md-3">LIST RESEP</label>
                <div class="col-md-9 has-success">
                    <select class="form-control filled-input select2" id="inResepBefore" onchange="tampil_next_resep(this.value)">

                    </select>
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12" id="resep_nonracikan" style="display: none;">
            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
            <hr width="95%">
            <div class="table-wrap" style="width: 100%; margin: auto ">
                <div class="table-responsive">
                    <table class="table table-hover display  pb-60" id="tableobatNextResep">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>NAMA OBAT</th>
                                <th>JUMLAH OBAT</th>
                                <th>SIGNA</th>
                                <th>CARA PAKAI</th>
                            </tr>
                        </thead>
                        <tbody style="color: black">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12" id="resep_racikan" style="display: none;">
            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
            <hr width="95%">
            <div class="table-wrap" style="width: 100%; margin: auto ">
                <div class="table-responsive">
                    <table class="table table-hover display  pb-60" id="tableRacikanNextResep">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>RESEP</th>
                                <th>SIGNA</th>
                                <th>CARA PAKAI</th>
                            </tr>
                        </thead>
                        <tbody style="color: black">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" class="form-control" id="inPelResep">
<input type="hidden" class="form-control" id="inHisResep">
<span class="help-block"></span>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <button onclick="insert_resep()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5 collapse_resep" style="display: block;"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
            <button onclick="next_resep_before()" class="btn btn-primary btn-anim  btn-sm ml-20 mt-5 collapse_next_resep" style="display: none;"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
            <!-- <button onclick="insert_na_obat()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_obat"><i class="icon-rocket"></i><span class="btn-text">OBAT RETURN</span></button> -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#inJenisResep').change(function() {
            var jenis = $('#inJenisResep').val();
            var id_pelayanan = $('#inPelResep').val();
            if (jenis == 'next') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Poli/getResepBefore",
                    method: "POST",
                    data: {
                        id_pelayanan: id_pelayanan
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data == "") {
                            swal({
                                title: "Gagal!",
                                type: "warning",
                                text: "Belum Ada Resep",
                                confirmButtonColor: "#3cb878",
                            }, function() {
                                $('#inJenisResep').val('1').change();
                            });
                        } else {
                            $('.collapse_resep').hide();
                            $('.collapse_next_resep').show();
                            var html = '';
                            var i;
                            html = '<option>-</option>';
                            for (i = 0; i < data.length; i++) {
                                html += '<option value="' + data[i].id_resep + '">' + data[i].nama_resep + ' = ' + data[i].tanggal + ' (' + data[i].staff + ')' + '</option>';
                            }
                            $('#inResepBefore').html(html);
                        }
                    }
                });
            } else {
                $('.collapse_resep').show();
                $('.collapse_next_resep').hide();
            }
        });

    });

    function next_resep_before() {
        id_resep = $('#inResepBefore').val();
        id_history = $('#inHisResep').val();
        id_pelayanan = $('#inPelResep').val();
        swal({
            title: "Apakah kamu yakin?",
            text: "Melanjutkan resep ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Poli/next_resep",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_resep: id_resep,
                        id_history: id_history,
                        id_pelayanan: id_pelayanan,
                        // jenis_pelayanan: 'RANAP',
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Resep Berhasil Ditambahkan",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tableresep').DataTable().ajax.reload();
                            $('#inJenisResep').val('1').change();
                            $('.collapse_resep').show();
                            $('.collapse_next_resep').hide();
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

    function tampil_next_resep(id_resep) {
        $.ajax({
            url: "<?php echo base_url() ?>Poli/get_resep",
            method: "POST",
            dataType: 'json',
            data: {
                id_resep: id_resep,
            },
            success: function(data) {
                if (data.jenis_resep == '2') {
                    tampil_next_resep_racikan(id_resep);
                    $('#resep_racikan').show();
                    $('#resep_nonracikan').hide();

                } else {
                    tampil_next_resep_nonracikan(id_resep)
                    $('#resep_racikan').hide();
                    $('#resep_nonracikan').show();
                }
            }
        });
    }

    function tampil_next_resep_nonracikan(id_resep) {
        $('#tableobatNextResep').dataTable().fnClearTable();
        $('#tableobatNextResep').dataTable().fnDestroy();
        $('#tableobatNextResep').DataTable({
            "pageLength": 5,
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Pencarian :",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir",
                }
            },
            "ajax": {
                "url": '<?php echo base_url('Poli/tampil_obat'); ?>',
                "type": 'POST',
                "data": {
                    id_resep: id_resep,
                    tipe: 'next',
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

    function tampil_next_resep_racikan(id_resep) {
        $('#tableRacikanNextResep').dataTable().fnClearTable();
        $('#tableRacikanNextResep').dataTable().fnDestroy();
        $('#tableRacikanNextResep').DataTable({
            "pageLength": 5,
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Pencarian :",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir",
                }
            },
            "ajax": {
                "url": '<?php echo base_url('Poli/tampil_racikan'); ?>',
                "type": 'POST',
                "data": {
                    id_resep: id_resep,
                    tipe: 'next',
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