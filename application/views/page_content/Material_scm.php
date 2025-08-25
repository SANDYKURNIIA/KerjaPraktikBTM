<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN <?=strtoupper($tipe)?> SCM</span>
            </h6>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
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

            <br>
            <br>
            <div class="table-wrap">
                <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="datable">
                        <thead>
                            <tr class="bg-success">
                                <th>KODE SIMBOS</th>
                                <th>KODE MATERIAL</th>
                                <th>KATEGORI</th>
                                <th>MATERIAL</th>
                                <th>SATUAN TERKECIL</th>
                                <th>STOK AWAL</th>
                                <th>PENERIMAAN DARI GUDANG</th>
                                <th>PEMAKAIAN MELALUI RESEP</th>
                                <th>STOK AKHIR (FISIK)</th>
                            
                            </tr>
                        </thead>
                        <tfoot>
                            <!-- <tr>
                                <th colspan="8" style="text-align:right; font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">Total:</th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px;"></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr> -->
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cetak -->
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
                    tipe: '<?=$tipe?>',
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
                    tipe: '<?=$tipe?>',
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