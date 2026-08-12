<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PERMINTAAN OBAT</span></h6>
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
                                <th>LIST OBAT</th>
                                <th>TANGGAL PERMINTAAN</th>
                                <th>JAM PERMINTAAN</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>LIST OBAT</th>
                                <th>TANGGAL PERMINTAAN</th>
                                <th>JAM PERMINTAAN</th>
                                <th>STATUS</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tindakan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT DATA KUNJUNGAN
                        </h5>
                    </div>
                    <div class="modal-body">

                        <!-- /formbody -->

                        <div class="panel panel-default card-view">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PERMINTAAN OBAT</span></h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table id="isiListTindakan"" class=" table table-hover display pb-30" width="100%">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>NAMA OBAT</th>
                                                        <th>SATUAN</th>
                                                        <th>JUMLAH</th>
                                                        <th>HARGA</th>
                                                        <th>TOTAL</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr class="bg-success" >
                                                        <th colspan="5" style="font-weight:bold; font-size:medium">TOTAL</th>
                                                        <th id="total_akhir" style="font-weight:bold; font-size:medium"></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /Row -->
                </div>
                <!-- /formbody -->
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
function tampil_harga(id_req){
    $.ajax({
            url: "<?= base_url() . 'Logistik_farmasi/getHarga' ?>",
            data: {
                id_req: id_req,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    var harga = data.harga_cost;
                    var frek = data.jml_terima;
                    var total = Number(harga) * Number(frek);
                    var total_akhir = Number(total_akhir) + Number(total);
                    $("#total_akhir").html(total);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
}
    function tampilPermintaanObat(id_req) {
        $('#isiListTindakan').dataTable().fnClearTable();
        $('#isiListTindakan').dataTable().fnDestroy();
        $('#isiListTindakan').DataTable({
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
                "url": '<?php echo base_url('Logistik_farmasi/tampil_list_tindakan'); ?>',
                "type": 'POST',
                "data": {
                    id_req: id_req
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
        tampil_harga(id_req)
        $("#modal_tindakan").modal('show');
    }

    $(document).ready(function() {
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
            "ajax": '<?php echo base_url('Logistik_farmasi/Tampil_laporan_po_kundur'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });

</script>