<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PYMHD RAWAT INAP NON TUNAI</span></h6>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-1 mt-20">
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
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Jurnal : </label>
                    <input type="date" autocomplete="off" id="inTglJurnal" class="form-control" value="<?= date('Y-m-d') ?>">
                </div>
                <div class="col-md-2">
                    <label class="mt-0 txt-dark">Jenis Klaim :</label>
                    <!-- <div class="col-md-2 has-success"> -->
                    <select class="form-control select2" placeholder="Choose a Category" name="jenis_klaim" id="jenis_klaim">
                        <option value="-">-</option>

                        <?php foreach ($cara_bayar as $row) { ?>
                            <option value="<?= $row->id_cara_bayar ?>"><?= $row->nama ?></option>
                        <?php } ?>
                    </select>
                    <!-- </div> -->
                </div>
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                        <button class="btn btn-info btn-anim btn-sm1 " onclick="setJurnal();"><i class="icon-rocket"></i><span class="btn-text">Jurnal</span>

                </div>
                <div class="col-md-3 mt-20">
                </div>
            </div>
        </div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <div class="row mt-30 pull-right">
                        <div class="col-md-12 ">


                        </div>
                    </div>
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th><label for="check_all"><input id="check_all" type="checkbox" onClick="toggle(this)"> All</label></br></th>

                                <th>NO</th>
                                <th>TANGGAL</th>
                                <th>NO RM</th>
                                <th> NAMA</th>
                                <th>JENIS PELAYANAN</th>
                                <th>JENIS KLAIM</th>
                                <th>TOTAL BILLING</th>
                                <th>TOTAL PYMHD</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th></th>
                                <th>NO</th>
                                <th>TANGGAL</th>
                                <th>NO RM</th>
                                <th>NAMA</th>
                                <th>JENIS PELAYANAN</th>
                                <th>JENIS KLAIM</th>
                                <th>TOTAL BILLING</th>
                                <th>TOTAL PYMHD</th>
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
        jenis_klaim = $('#jenis_klaim').val();
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
                "url": '<?= base_url('Jurnal_keuangan_nontunai/tampil_RangeLaporan_jurnal_ranap'); ?>',
                "type": 'POST',
                "data": {
                    jenis_klaim: jenis_klaim
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

    function tampilHariIni() {
        $('#datable').DataTable().destroy();
        jenis_klaim = $('#jenis_klaim').val();
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
                "url": '<?= base_url('Jurnal_keuangan_nontunai/tampil_RangeLaporan_jurnal_ranap'); ?>',
                "type": 'POST',
                "data": {
                    jenis_klaim: jenis_klaim
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

    function tampilRangePermit(mulai, akhir, jenis_klaim) {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        jenis_klaim = $('#jenis_klaim').val();
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
                "url": '<?= base_url('Jurnal_keuangan_nontunai/tampil_RangeLaporan_jurnal_ranap'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,
                    jenis_klaim: jenis_klaim
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
    function toggle(source) {
        if ($('#check_all').is(":checked")) {
            $('input[name="check[]"]').prop("checked", true);
        } else {
            $('input[name="check[]"]').prop("checked", false);

        }
    }
    function setJurnal() {
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        jenis_klaim = $('#jenis_klaim').val();
        jurnal = $("#inTglJurnal").val();
        var fav = [];
        $.each($("input[name='check[]']:checked"), function() {
            fav.push($(this).val());
        });

        // if (Date.parse(jurnal) < Date.parse(akhir)) {
        //     swal({
        //         title: "Gagal!",
        //         type: "warning",
        //         text: "Tanggal Jurnal Tidak Boleh Kurang Dari Tanggal Akhir Pilihan",
        //         confirmButtonColor: "#3cb878",
        //     });
        // } else {

        var teks = "Melakukan jurnal pada tgl " + indo_date_js(new Date(jurnal)) + " ?";

        swal({
            title: "Apakah kamu yakin?",
            text: teks,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {

                $.ajax({
                    url: "<?= base_url() . 'Jurnal_keuangan_nontunai/setJurnal_Nontunai_pymhd' ?>",
                    data: {
                        mulai: mulai,
                        akhir: akhir,
                        jenis_klaim: jenis_klaim,
                        jurnal: jurnal,
                        req: fav,
                        jenis_pelayanan: 'RANAP',

                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data berhasil ditambahkan",
                                confirmButtonColor: "#3cb878",
                            });
                            $("#na_tindakan").hide();
                            $('#datable').DataTable().ajax.reload();
                        } else {
                            swal({
                                title: "Gagal!",
                                type: "warning",
                                text: data.status,
                                confirmButtonColor: "#3cb878",
                            });
                        }
                    }
                });
            }
        });
        // }
    }
</script>