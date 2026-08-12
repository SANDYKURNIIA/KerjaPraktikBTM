<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">RIWAYAT PASIEN</span></h6>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">
            <div class="col-md-12">
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
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>TANGGAL KELUAR</th>
                                <th>JAM KELUAR</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>JENIS KLAIM</th>
                                <th>DIAGNOSA</th>
                                <th>DOKTER DPJP</th>
                                <th>TINDAKAN</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>TANGGAL KELUAR</th>
                                <th>JAM KELUAR</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>JENIS KLAIM</th>
                                <th>DIAGNOSA</th>
                                <th>DOKTER DPJP</th>
                                <th>TINDAKAN</th>
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
                    </div>
                    <div class="modal-body">

                        <!-- /formbody -->
                        <div class="form-body mt-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NO RM</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control rounded-input" disabled="" id="inNoRm">
`
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA PASIEN</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control rounded-input" disabled="" id="inNamaPasien">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>LIST KAMAR</h6>
                            <hr width="95%">
                            <div class="table-wrap" style="width: 100%; margin: auto ">
                                <div class="table-responsive">
                                    <table class="table table-hover display  pb-60" id="list_kamar">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>KELAS</th>
                                                <th>KAMAR</th>
                                                <th>TANGGAL MASUK</th>
                                                <th>TANGGAL KELUAR</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody style="color: black">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>LIST TINDAKAN</h6>
                            <hr width="95%">
                            <div class="table-wrap" style="width: 100%; margin: auto ">
                                <div class="table-responsive">
                                    <table class="table table-hover display  pb-60" id="list_tindakan">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>ID TINDAKAN</th>
                                                <th>NAMA TINDAKAN</th>
                                                <th>TIPE KAMAR</th>
                                                <th>BIAYA TINDAKAN </th>
                                                <th>JUMLAH TINDAKAN</th>
                                                <th>TOTAL BIAYA</th>
                                                <th>DOKTER</th>
                                                <th>NAMA STAFF</th>
                                            </tr>
                                        </thead>
                                        <tbody style="color: black">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4 pull-right mt-20">

                                <div class="table-wrap" style="width: 85%; margin-bottom:40px;">
                                    <div class="table-responsive ">
                                        <table class="table table-hover display " id="outTotalHarga">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th style="font-weight:bold;">Total Keseluruhan</th>
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


<script>

</script>
<script type="text/javascript">
    function tindakan(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'Apelkes/getDataPasienById' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $("#modal_tindakan").modal('show');
                    $('#inNamaPasien').val(data.nama);
                    $('#inNoRm').val(data.no_rm);
                    reload_list_kamar(id_pelayanan, id_history);
                    reload_list_tindakan(id_pelayanan, id_history);
                    reload_total_harga(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function reload_list_kamar(id_pelayanan, id_history) {
        $('#list_kamar').dataTable().fnClearTable();
        $('#list_kamar').dataTable().fnDestroy();
        $('#list_kamar').DataTable({
            "pageLength": 10,
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
                "url": '<?php echo base_url('Apelkes/tampil_kamar'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan,
                    id_history: id_history
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
    function reload_list_tindakan(id_pelayanan, id_history) {
        $('#list_tindakan').dataTable().fnClearTable();
        $('#list_tindakan').dataTable().fnDestroy();
        $('#list_tindakan').DataTable({
            "pageLength": 10,
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
                "url": '<?php echo base_url('Apelkes/tampil_tindakan'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan,
                    id_history: id_history
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
    function reload_total_harga(id_pelayanan) {
		$('#outTotalHarga').dataTable().fnClearTable();
		$('#outTotalHarga').dataTable().fnDestroy();
		$('#outTotalHarga').DataTable({
			"pageLength": 10,
			"searching": false,
			"lengthChange": false,
			"bInfo": false,
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
					"sLast": "Terakhir",
				}
			},
			"ajax": {
				"url": '<?php echo base_url('Apelkes/tampil_harga_riwayat'); ?>',
				"type": 'POST',
				"data": {
					id_pelayanan: id_pelayanan
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
            "ajax": '<?php echo base_url('Apelkes/Tampil_riwayat_pasien'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });

    function tampilHariIni() {
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
            "ajax": '<?php echo base_url('Apelkes/Tampil_riwayat_pasien'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    }

    function tampilRangePermit(mulai, akhir) {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
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
                "url": '<?= base_url('Apelkes/TampilRange_riwayatPasien'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir
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