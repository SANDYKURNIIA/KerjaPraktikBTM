<<<<<<< HEAD
<!-- Row -->
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN SISA PIUTANG</span></h6>
        </div>
        <div class="clearfix"></div>


        <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-2 text-center">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-2 text-center">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
                </div>
                <div class="col-md-2 text-center">
                    <label class="mt-0 txt-dark">Vendor :</label>
                    <select class="form-control select2" placeholder="Choose a Category" name="inCaraBayar" id="inCaraBayar">
                        <!-- <option value="-">All</option> -->
                        <?php $db = $this->db->get_where('cara_bayar', ['status' => 'aktif'])->result();
                        foreach ($db as $row) {
                        ?>
                            <option value="<?= $row->kode_pelanggan ?>"><?= $row->nama ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3 mt-20 text-center">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <!-- <div class="table-responsive"> -->
                <table id="datable" class="table table-hover display pb-30" width="100%">
                    <thead>
                        <tr class="bg-success" width="100%">
                            <th>NO</th>
                            <th>VENDOR/PENJAMIN</th>
                            <th>NAMA PASIEN</th>
                            <th>NO RM</th>
                            <th>NO INVOICE</th>
                            <th>TOTAL</th>
                            <th>SISA PIUTANG</th>
                            <th>SUDAH BAYAR</th>
                        </tr>
                    </thead>
                    <tbody style="color: black">
                    </tbody>
                </table>
                <!-- </div> -->
            </div>
        </div>

    </div>
</div>
<!-- batas -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="modal fade modal-pendaftaranakun" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p><i class="icon-people mr-10"></i>LIST</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <div class="row mt-30 pull-right">
                                        <div class="col-md-12 ">
                                        </div>
                                    </div>
                                    <table id="datable" class="table table-striped  table-hover display pb-30" width="100%">
                                        <thead>
                                            <tr class="bg-success">

                                                <th>NO</th>
                                                <th>NO JURNAL PIUTANG</th>
                                                <!-- <th>NO PYMHD</th> -->
                                                <th>NO INVOICE</th>
                                                <th>VENDOR/PENJAMIN</th>
                                                <th>KODE VENDOR/PENJAMIN</th>
                                                <th>TOTAL</th>
                                                <th>SISA PIUTANG</th>
                                                <th>SUDAH BAYAR</th>

                                            </tr>
                                        </thead>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.modal-content -->
        </div>

    </div>
</div>

<style>
    td {
        color: black;
    }
</style>


<script type="text/javascript">
    function tampilRangePermit(mulai, akhir, inVendor) {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        vendor = $("#inCaraBayar").val();
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
                "url": '<?= base_url('Jurnal_piutang/tampil_sisa_piutang_vendor_pasien'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,
                    vendor: vendor,

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
    /////////////////
</script>
<style>
    .table-wrap {
        padding-top: 5px;
    }
=======
<!-- Row -->
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN SISA PIUTANG</span></h6>
        </div>
        <div class="clearfix"></div>


        <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-2 text-center">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-2 text-center">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
                </div>
                <div class="col-md-2 text-center">
                    <label class="mt-0 txt-dark">Vendor :</label>
                    <select class="form-control select2" placeholder="Choose a Category" name="inCaraBayar" id="inCaraBayar">
                        <!-- <option value="-">All</option> -->
                        <?php $db = $this->db->get_where('cara_bayar', ['status' => 'aktif'])->result();
                        foreach ($db as $row) {
                        ?>
                            <option value="<?= $row->kode_pelanggan ?>"><?= $row->nama ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3 mt-20 text-center">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <!-- <div class="table-responsive"> -->
                <table id="datable" class="table table-hover display pb-30" width="100%">
                    <thead>
                        <tr class="bg-success" width="100%">
                            <th>NO</th>
                            <th>VENDOR/PENJAMIN</th>
                            <th>NAMA PASIEN</th>
                            <th>NO RM</th>
                            <th>NO INVOICE</th>
                            <th>TOTAL</th>
                            <th>SISA PIUTANG</th>
                            <th>SUDAH BAYAR</th>
                        </tr>
                    </thead>
                    <tbody style="color: black">
                    </tbody>
                </table>
                <!-- </div> -->
            </div>
        </div>

    </div>
</div>
<!-- batas -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="modal fade modal-pendaftaranakun" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p><i class="icon-people mr-10"></i>LIST</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <div class="row mt-30 pull-right">
                                        <div class="col-md-12 ">
                                        </div>
                                    </div>
                                    <table id="datable" class="table table-striped  table-hover display pb-30" width="100%">
                                        <thead>
                                            <tr class="bg-success">

                                                <th>NO</th>
                                                <th>NO JURNAL PIUTANG</th>
                                                <!-- <th>NO PYMHD</th> -->
                                                <th>NO INVOICE</th>
                                                <th>VENDOR/PENJAMIN</th>
                                                <th>KODE VENDOR/PENJAMIN</th>
                                                <th>TOTAL</th>
                                                <th>SISA PIUTANG</th>
                                                <th>SUDAH BAYAR</th>

                                            </tr>
                                        </thead>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.modal-content -->
        </div>

    </div>
</div>

<style>
    td {
        color: black;
    }
</style>


<script type="text/javascript">
    function tampilRangePermit(mulai, akhir, inVendor) {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        vendor = $("#inCaraBayar").val();
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
                "url": '<?= base_url('Jurnal_piutang/tampil_sisa_piutang_vendor_pasien'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,
                    vendor: vendor,

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
    /////////////////
</script>
<style>
    .table-wrap {
        padding-top: 5px;
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</style>