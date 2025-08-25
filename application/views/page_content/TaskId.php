<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">TASK ID</h6>
                </div>
                <div class="clearfix"></div>

                <div class="row mt-30">
                    <div class="col-md-12">
                        <div class="col-md-3 mt-20 pl-5">
                            <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();">
                                <i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                            </button>
                        </div>
                        <div class="col-md-3">
                            <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                            <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                            <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
                        </div>
                        <div class="col-md-3 mt-20">
                            <button class="btn btn-primary btn-anim btn-sm" onclick="tampilRangePermit();">
                                <i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table table-hover display pb-30" id="datable">
                                <thead>
                                    <tr class="bg-success">
                                        <th>KODE BOOKING</th>
                                        <th>NORM</th>
                                        <th>PASIEN</th>
                                        <th>JENIS PASIEN</th>
                                        <th>NAMA POLI</th>
                                        <th>NAMA DOKTER</th>
                                        <th>TASK 3</th>
                                        <th>TASK 4</th>
                                        <th>TASK 5</th>
                                        <th>TASK 6</th>
                                        <th>TASK 7</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($schedule_antrol)) : ?>
                                        <?php foreach ($schedule_antrol as $row) : ?>
                                            <tr>
                                                <td><?php echo $row['kodebooking']; ?></td>
                                                <td><?php echo $row['norm']; ?></td>
                                                <td><?php echo $row['pasien']; ?></td>
                                                <td><?php echo $row['jenispasien']; ?></td>
                                                <td><?php echo $row['namapoli']; ?></td>
                                                <td><?php echo $row['namadokter']; ?></td>
                                                <td><?php echo $row['task_3']; ?></td>
                                                <td><?php echo $row['task_4']; ?></td>
                                                <td><?php echo $row['task_5']; ?></td>
                                                <td><?php echo $row['task_6']; ?></td>
                                                <td><?php echo $row['task_7']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="11">No data found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sSearch": "Cari:",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            },
            "ajax": {
                "url": "<?php echo base_url('Task_Id/Tampil_TaskId'); ?>",
                "type": "POST",
                "dataSrc": "data"
            },
            "deferRender": true,
            "processing": true,
            "columns": [{
                    "data": "kodebooking"
                },
                {
                    "data": "norm"
                },
                {
                    "data": "pasien"
                },
                {
                    "data": "jenispasien"
                },
                {
                    "data": "namapoli"
                },
                {
                    "data": "namadokter"
                },
                {
                    "data": "task_3"
                },
                {
                    "data": "task_4"
                },
                {
                    "data": "task_5"
                },
                {
                    "data": "task_6"
                },
                {
                    "data": "task_7"
                }
            ]
        });
    });

    function tampilRangePermit() {
        var mulai = $('#inTglMulai').val();
        var akhir = $('#inTglAkhir').val();

        $('#datable').DataTable().destroy();
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
                "sSearch": "Cari:",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            },
            "ajax": {
                "url": '<?php echo base_url('Task_Id/Tampil_Range_Task_Id'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir
                },
                "dataSrc": "data"
            },
            "deferRender": true,
            "processing": true,
            "columns": [{
                    "data": "kodebooking"
                },
                {
                    "data": "norm"
                },
                {
                    "data": "pasien"
                },
                {
                    "data": "jenispasien"
                },
                {
                    "data": "namapoli"
                },
                {
                    "data": "namadokter"
                },
                {
                    "data": "task_3"
                },
                {
                    "data": "task_4"
                },
                {
                    "data": "task_5"
                },
                {
                    "data": "task_6"
                },
                {
                    "data": "task_7"
                }
            ],
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }]
        });
    }
</script>