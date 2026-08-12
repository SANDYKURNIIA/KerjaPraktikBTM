<<<<<<< HEAD
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">SO</span></h6>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>KODE SIBATIK</th>
                                <th>NAMA OBAT</th>
                                <th>EXPIRED DATE</th>
                                <th>SATUAN</th>
                                <th>STOK SIBATIK</th>
                                <th>HNA</th>
                                <th>DISKON</th>
                                <th>HNA+PPN</th>
                                <th>HNA-DISKON</th>
                                <th>STOK FISIK</th>
                                <th>GOLONGAN OBAT</th>
                                <th>PRODUSEN</th>
                                <th>STANDAR</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                            <th>NO</th>
                                <th>KODE SIBATIK</th>
                                <th>NAMA OBAT</th>
                                <th>EXPIRED DATE</th>
                                <th>SATUAN</th>
                                <th>STOK SIBATIK</th>
                                <th>HNA</th>
                                <th>DISKON</th>
                                <th>HNA+PPN</th>
                                <th>HNA-DISKON</th>
                                <th>STOK FISIK</th>
                                <th>GOLONGAN OBAT</th>
                                <th>PRODUSEN</th>
                                <th>STANDAR</th>
                            </tr>
                        </tfoot>
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
        $('#datable').DataTable({
            "retrieve": true,
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
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
            "ajax": '<?php echo base_url('Logistik_farmasi/Tampil_cetak_so'); ?>',
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
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">SO</span></h6>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>KODE SIBATIK</th>
                                <th>NAMA OBAT</th>
                                <th>EXPIRED DATE</th>
                                <th>SATUAN</th>
                                <th>STOK SIBATIK</th>
                                <th>HNA</th>
                                <th>DISKON</th>
                                <th>HNA+PPN</th>
                                <th>HNA-DISKON</th>
                                <th>STOK FISIK</th>
                                <th>GOLONGAN OBAT</th>
                                <th>PRODUSEN</th>
                                <th>STANDAR</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                            <th>NO</th>
                                <th>KODE SIBATIK</th>
                                <th>NAMA OBAT</th>
                                <th>EXPIRED DATE</th>
                                <th>SATUAN</th>
                                <th>STOK SIBATIK</th>
                                <th>HNA</th>
                                <th>DISKON</th>
                                <th>HNA+PPN</th>
                                <th>HNA-DISKON</th>
                                <th>STOK FISIK</th>
                                <th>GOLONGAN OBAT</th>
                                <th>PRODUSEN</th>
                                <th>STANDAR</th>
                            </tr>
                        </tfoot>
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
        $('#datable').DataTable({
            "retrieve": true,
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
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
            "ajax": '<?php echo base_url('Logistik_farmasi/Tampil_cetak_so'); ?>',
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