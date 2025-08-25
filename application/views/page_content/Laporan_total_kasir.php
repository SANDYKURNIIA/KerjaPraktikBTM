<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN TOTAL KASIR</span></h6>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">
            <div class="col-md-12">
                <!-- <div class="col-md-3 mt-20 pl-5">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div> -->
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Staff :</label>
                    <select class="form-control select2" placeholder="Choose a Category" name="staff" id="inStaff">
                        <option value="-">-</option>
                        <?php
                        foreach ($data_staff as $row) :
                        ?>
                            <option value="<?php echo $row->id_staff; ?>">
                                <?php echo $row->nama; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-md-3 mt-20">
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
                                <th>NO</th>
                                <th>TANGGAL</th>
                                <th>NAMA PASIEN</th>
                                <th>NO. RM</th>
                                <th>JENIS PELAYANAN</th>
                                <th>BIAYA</th>
                                <th>OPSI BAYAR</th>
                                <th>BANK</th>
                                <th>STAFF</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TANGGAL</th>
                                <th>NAMA PASIEN</th>
                                <th>NO. RM</th>
                                <th>JENIS PELAYANAN</th>
                                <th>BIAYA</th>
                                <th>OPSI BAYAR</th>
                                <th>BANK</th>
                                <th>STAFF</th>
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
            "ajax": '<?php echo base_url('Laporan/Tampil_laporan_total_kasir'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });

    // function tampilHariIni() {
    //     $('#datable').DataTable().destroy();
    //     $('#datable').DataTable({
    //         "retrieve": true,
    //         "dom": 'Bfrtip',
    //         "buttons": ['csv', 'excel', 'pdf'],
    //         "language": {
    //             "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
    //             "sProcessing": "Sedang memproses...",
    //             "sLengthMenu": "Tampilkan _MENU_ entri",
    //             "sZeroRecords": "Tidak ditemukan data yang sesuai",
    //             "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    //             "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
    //             "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    //             "sInfoPostFix": "",
    //             "sSearch": "Pencarian :",
    //             "sUrl": "",
    //             "oPaginate": {
    //                 "sFirst": "Pertama",
    //                 "sPrevious": "Sebelumnya",
    //                 "sNext": "Selanjutnya",
    //                 "sLast": "Terakhir"
    //             },
    //         },
    //         "ajax": '<?php echo base_url('Laporan/Tampil_laporan_total_kasir'); ?>',
    //         "deferRender": true,
    //         "processing": true,
    //         "order": [],
    //         "columnDefs": [{
    //             "targets": [0],
    //             "orderable": false,
    //         }, ],
    //     });
    // }

    // function reload_total_kasir(id_pelayanan) {
    //     $('#outTotalHargaRadiologi').dataTable().fnClearTable();
    //     $('#outTotalHargaRadiologi').dataTable().fnDestroy();
    //     $('#outTotalHargaRadiologi').DataTable({
    //         "pageLength": 10,
    //         "searching": false,
    //         "lengthChange": false,
    //         "bInfo": false,
    //         "paging": false,
    //         "language": {
    //             "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
    //             "sProcessing": "Sedang memproses...",
    //             "sLengthMenu": "Tampilkan _MENU_ entri",
    //             "sZeroRecords": "Tidak ditemukan data yang sesuai",
    //             "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    //             "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
    //             "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    //             "sInfoPostFix": "",
    //             "sSearch": "Pencarian :",
    //             "sUrl": "",
    //             "oPaginate": {
    //                 "sFirst": "Pertama",
    //                 "sPrevious": "Sebelumnya",
    //                 "sNext": "Selanjutnya",
    //                 "sLast": "Terakhir",
    //             }
    //         },
    //         "ajax": {
    //             "url": '<?php echo base_url('Poli/tampil_total_radiologi'); ?>',
    //             "type": 'POST',
    //             "data": {
    //                 id_pelayanan: id_pelayanan
    //             },
    //         },
    //         "deferRender": true,
    //         "processing": true,
    //         "order": [],
    //         "columnDefs": [{
    //             "targets": [0],
    //             "orderable": false,
    //         }, ],
    //     });
    // }

    function tampilRangePermit(mulai, akhir) {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        staff = $("#inStaff").val();
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
            "ajax": {
                "url": '<?= base_url('Laporan/Tampil_laporan_total_kasir'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,
                    staff: staff
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