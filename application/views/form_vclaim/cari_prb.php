<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>

<div class="panel panel-success card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-light">PENCARIAN PRB</h6>
        </div>
        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="row">

        <div class="clearfix"></div>
        <hr>
        <div class="row mt-30">
            <div class="col-md-12">

                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglakhir" class="form-control">
                </div>
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">CARI</span>
                </div>
            </div>
        </div>

    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display  pb-30">
                        <thead>
                            <tr class="bg-success">

                                <th>NO</th>
                                <th>CETAK</th>
                                <th>AKSI</th>
                                <th>NO SRB</th>
                                <th>NO SEP</th>
                                <th>NAMA PASIEN</th>
                                <th>NO KARTU</th>
                                <th>EMAIL</th>
                                <th>ALAMAT</th>
                                <th>NOMOR HANDPHONE</th>
                                <th>TANGGAL SRB</th>
                                <th>KETERANGAN</th>
                                <th>SARAN</th>
                                <th>PROGRAM PRB</th>
                                <th>NAMA DOKTER</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    td {
        color: black;
    }
</style>

<script type="text/javascript">
    function tampilRangePermit() {
        $('#datable').DataTable().destroy();
        tglAwal = $("#inTglMulai").val();
        tglAkhir = $("#inTglakhir").val();

        $('#datable').DataTable({
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
                    "sLast": "Terakhir"
                },
            },
            "ajax": {
                "url": '<?= base_url('Vclaim_bpjs/getPRB'); ?>',
                "type": 'POST',
                "data": {
                    mulai: tglAwal,
                    akhir: tglAkhir,
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


    function delete_ranap(noSurat,nosep) {
        // nama = $("#NamaPasien").val();
        swal({
            title: "Apakah kamu yakin akan !",
            text: "Menghapus data ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Vclaim_bpjs/hapus_prb",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        no: noSurat,
                        no_sep: nosep,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#datable').DataTable().ajax.reload();
                        } else {
                            swal({
                                title: "Gagal!",
                                type: "warning",
                                text: data.data['message'],
                                confirmButtonColor: "#3cb878",
                            });
                        }
                    }
                });
            });
        });
        return false;
    }

    function cetak_ranap() {
        // nama = $("#NamaPasien").val();
        
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Vclaim_bpjs/cetak_prb",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        no: noSurat,
                        no_sep: nosep,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#datable').DataTable().ajax.reload();
                        } else {
                            swal({
                                title: "Gagal!",
                                type: "warning",
                                text: data.data['message'],
                                confirmButtonColor: "#3cb878",
                            });
                        }
                    }
                });
            });
       
        return false;
    }
</script>