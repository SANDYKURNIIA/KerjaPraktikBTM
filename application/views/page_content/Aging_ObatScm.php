<!-- Row -->
<?php
$data = $this->session->userdata('data_auth');
$datatipe = $data->tipe;
$status = $data->status;
$izinAkses = $data->izin_akses;
?>


<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">AGING <?=strtoupper($tipe)?> SCM</span></h6>
        </div>
        <div align="right">

            <!-- <div class="btn btn-primary btn-anim btn-sm " onclick="tambahFormFaktur()"><i class="icon-rocket"></i><span class="btn-text">TAMBAH FORM PERMINTAAN</span>
                <div></div>
            </div> -->
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">
            <div class="col-md-12">

                <div class="col-md-5">
                    <label class="mt-0 txt-dark">PERIODE : </label>
                    <input type="month" autocomplete="off" id="inBulan" class="form-control">
                </div>

                <div class="col-md-1 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>

                </div>

            </div>
        </div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th rowspan="2">NO</th>
                                <th rowspan="2">KODE SIBATIK </th>
                                <th rowspan="2">KODE OSS</th>
                                <th rowspan="2">NAMA OBAT</th>
                                <th rowspan="2">PBF/DISTRIBUTOR</th>
                                <th rowspan="2">KATEGORI</th>
                                <th rowspan="2">QTY</th>
                                <th rowspan="2">HARGA BELI (SATUAN)</th>
                                <th rowspan="2">VALUE PERSEDIAAN</th>
                                <th rowspan="2">TANGGAL PEMBELIAN</th>
                                <th rowspan="2">TANGGAL CUT OFF</th>
                                <th rowspan="2">AGING PERSEDIAAN (HARI)</th>
                                <th rowspan="2">AGING PERSEDIAAN (BULAN)</th>
                                <th colspan="2" style="text-align: center">< 3 BULAN</th>
                                <th colspan="2" style="text-align: center">3-6 BULAN</th>
                                <th colspan="2" style="text-align: center">> 6 BULAN</th>
                                <th colspan="2" style="text-align: center">TOTAL</th>

                                <th rowspan="2">KETERANGAN LOKASI STOK</th>

                            </tr>
                            <tr class="bg-success">
                                <th>QTY</th>
                                <th>NILAI</th>
                                <th>QTY</th>
                                <th>NILAI</th>
                                <th>QTY</th>
                                <th>NILAI</th>
                                <th>QTY</th>
                                <th>NILAI</th>
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
    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return rupiah.split('', rupiah.length - 1).reverse().join('');
    }
    $(document).ready(function() {
        $('#datable').DataTable({
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
            "paging": false,
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
                "url": '<?= base_url($url); ?>',
                "type": 'POST',
                "data": {
                    periode: '<?= date('Y-m') ?>',
                    tipe: '<?= $tipe?>',
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


    function tampilRangePermit() {
        $('#datable').DataTable().destroy();
        periode = $("#inBulan").val();
        $('#datable').DataTable({
            "retrieve": true,
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
            "paging": false,
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
                "url": '<?= base_url($url); ?>',
                "type": 'POST',
                "data": {
                    periode: periode,
                    tipe: '<?= $tipe?>',
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