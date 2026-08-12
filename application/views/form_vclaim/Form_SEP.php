<<<<<<< HEAD
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;

?>
<?php $this->load->view('form_vclaim/Modal_cari_sep');?>

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-dark"><span class="label label-success font-weight-1000">DAFTAR RUJUKAN PCare</span>
            </h1>
        </div>
        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display  pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>No</th>
                                <th>EDIT</th>
                                <th>NO RUJUKAN</th>
                                <th>JENIS RAWAT</th>
                                <th>PERUJUK</th>
                                <th>POLI RUJUK</th>
                                <th>TANGGAL RUJUKAN</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-dark"><span class="label label-success font-weight-1000">DAFTAR RUJUKAN RS</span>
            </h1>
        </div>
        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable1" class="table table-hover display  pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>No</th>
                                <th>EDIT</th>
                                <th>NO RUJUKAN</th>
                                <th>JENIS RAWAT</th>
                                <th>PERUJUK</th>
                                <th>POLI RUJUK</th>
                                <th>TANGGAL RUJUKAN</th>
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
    $(document).ready(function() {
        $('#jumSep').hide();

        $('#datable').DataTable({
            pageLength: 5,
            lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, 'All']
            ],
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },
            },
            "ajax": {
                "url": '<?php echo base_url('SEP/getRujukan'); ?>',
                "type": 'POST',
                "data": {
                    kartu: '<?= $kartu ?>',
                    history: '<?= $history ?>',
                    id_pel: '<?= $id_pel ?>',
                    
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
    });
    $(document).ready(function() {

        $('#datable1').DataTable({
            pageLength: 5,
            lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, 'All']
            ],
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },
            },
            "ajax": {
                "url": '<?php echo base_url('SEP/getRujukanRs'); ?>',
                "type": 'POST',
                "data": {
                    kartu: '<?= $kartu ?>',
                    history: '<?= $history ?>',
                    id_pel: '<?= $id_pel ?>',

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
    });
=======
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;

?>
<?php $this->load->view('form_vclaim/Modal_cari_sep');?>

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-dark"><span class="label label-success font-weight-1000">DAFTAR RUJUKAN PCare</span>
            </h1>
        </div>
        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display  pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>No</th>
                                <th>EDIT</th>
                                <th>NO RUJUKAN</th>
                                <th>JENIS RAWAT</th>
                                <th>PERUJUK</th>
                                <th>POLI RUJUK</th>
                                <th>TANGGAL RUJUKAN</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-dark"><span class="label label-success font-weight-1000">DAFTAR RUJUKAN RS</span>
            </h1>
        </div>
        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable1" class="table table-hover display  pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>No</th>
                                <th>EDIT</th>
                                <th>NO RUJUKAN</th>
                                <th>JENIS RAWAT</th>
                                <th>PERUJUK</th>
                                <th>POLI RUJUK</th>
                                <th>TANGGAL RUJUKAN</th>
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
    $(document).ready(function() {
        $('#jumSep').hide();

        $('#datable').DataTable({
            pageLength: 5,
            lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, 'All']
            ],
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },
            },
            "ajax": {
                "url": '<?php echo base_url('SEP/getRujukan'); ?>',
                "type": 'POST',
                "data": {
                    kartu: '<?= $kartu ?>',
                    history: '<?= $history ?>',
                    id_pel: '<?= $id_pel ?>',
                    
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
    });
    $(document).ready(function() {

        $('#datable1').DataTable({
            pageLength: 5,
            lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, 'All']
            ],
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },
            },
            "ajax": {
                "url": '<?php echo base_url('SEP/getRujukanRs'); ?>',
                "type": 'POST',
                "data": {
                    kartu: '<?= $kartu ?>',
                    history: '<?= $history ?>',
                    id_pel: '<?= $id_pel ?>',

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
    });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>