<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN </span></h6>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">
            <div id="form-filter" class="col-md-12">
                <div class="col-md-3 mt-20 pl-5">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
                </div>
                <div class="form-group">
                    <label class="mt-5 txt-dark">Jenis Pelayanan :</label>
                    <div class="col-md-2 has-success">
                        <select class="form-control select2" placeholder="Choose a Category" name="jenis_pelayanan" id="jenis_pelayanan">
                            <option value="-">-</option>
                            <option value="ECHO">ECHO, EKG, TREADMILL</option>
                            <option value="USG">USG OBGYNE</option>
                            <option value="AUDIOMETRI">AUDIOMETRI</option>
                            <option value="EKG">EKG RANAP</option>
                            <option value="RANAP">PENUNJANG RANAP</option>
                            <option value="MATA">POLI MATA</option>
                            <option value="UROLOGI">POLI UROLOGI</option>
                            <option value="INTERNIS">POLI INTERNIS</option>
                            <option value="SPIRO">SPIROMETRI</option>
                            <option value="USGPRIORITAS">USG PRIORITAS</option>
                            <option value="ECHOPRIORITAS">ECHO PRIORITAS</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1" id="btn-filter" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                        <!-- <button type="button" id="btn-reset" class="btn btn-default">Reset</button>  -->
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
                                <th>NAMA PASIEN</th>
                                <th>NO RM</th>
                                <th>CARA BAYAR</th>
                                <th>NAMA DOKTER</th>
                                <th>POLI/RUANGAN</th>
                                <th>NAMA TINDAKAN</th>
                                <th>SARANA</th>
                                <th>JASA</th>
                                <th>TANGGAL</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>NAMA PASIEN</th>
                                <th>NO RM</th>
                                <th>CARA BAYAR</th>
                                <th>NAMA DOKTER</th>
                                <th>POLI</th>
                                <th>NAMA TINDAKAN</th>
                                <th>SARANA</th>
                                <th>JASA</th>
                                <th>TANGGAL</th>
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
    // $(document).ready(function() {
    //     $('#datable').DataTable({
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
    //         "ajax": '<?php echo base_url('Laporan/Tampil_Range_penunjang'); ?>',
    //         "deferRender": true,
    //         "processing": true,
    //         "order": [],
    //         "columnDefs": [{
    //             "targets": [0],
    //             "orderable": false,
    //         }, ],
    //     });
    // });

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
    //         "ajax": '<?php echo base_url('Laporan/Tampil_laporan_kesehatan_gigi_mulut'); ?>',
    //         "deferRender": true,
    //         "processing": true,
    //         "order": [],
    //         "columnDefs": [{
    //             "targets": [0],
    //             "orderable": false,
    //         }, ],
    //     });
    // }

    function tampilRangePermit() {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        poli = $("#jenis_pelayanan").val();
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
                "url": '<?= base_url('Laporan/Tampil_Range_penunjang'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,
                    poli: poli
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
        $('#btn-filter').click(function() { //button filter event click
            datable.ajax.reload(); //just reload datable
        });
        $('#btn-reset').click(function() { //button reset event click
            $('#form-filter')[0].reset();
            $("#btn-filter").attr("disabled", false);
            datable.ajax.reload(); //just reload table
        });
    }
</script>