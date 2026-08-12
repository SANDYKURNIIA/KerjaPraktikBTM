<<<<<<< HEAD
<!-- Row -->
<div class="panel panel-default card-view mt-20 ">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN OBAT BEBAS</span></h6>
        </div>

        <div class="clearfix"></div>
        <div class="row mt-30">
            <div class="col-md-12">
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
    <h6 class="panel-title txt-dark mt-10"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>CETAK</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KLAIM</th>
                                <th>DOKTER</th>
                                <th>DEPO</th>
                                <th>NOTA FARMASI</th>
                                <th>KETERANGAN</th>


                            </tr>
                        </thead>

                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>CETAK</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KLAIM</th>
                                <th>DOKTER</th>
                                <th>DEPO</th>
                                <th>NOTA FARMASI</th>
                                <th>KETERANGAN</th>

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
        <div class="modal fade" role="dialog" id="modal_edit_kasir" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!--modal 1-->
                    <div class="modal-body">
                        <div class="form-body mt-10">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-wrap">
                                                        <div class="form-body">
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" action="<?php echo base_url('Kasir_poli/print_obat_bebas') ?>" method="post" enctype="multipart/form-data" role="form" target="_blank">
                                                                    <input type="hidden" id="inPel" name="inPel">
                                                                    <input type="hidden" id="inHis" name="inHis">
                                                                    <div class="form-body">

                                                                        <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO KASIR</h6>
                                                                        <hr>
                                                                        <!-- <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">DISC</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="number" class="form-control rounded-input" autocomplete="off" id="inDiskon" name="inDiskon" value="0">
                                                                                        <span class="help-block"></span>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">DP </label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="number" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="inDp" name="inDp" value="0">
                                                                                        <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div> -->
                                                                        <div class="row">
                                                                            <!-- <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">TANGGAL PULANG</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="datetime-local" class="form-control rounded-input" autocomplete="off" id="inTglKeluar" name="inTglKeluar" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                                                                        echo date("Y-m-d"); ?>">
                                                                                        <span class="help-block"></span>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">SELISIH </label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="number" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="inSelisih" name="inSelisih" value="0">
                                                                                        <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div> -->
                                                                            <div class="col-md-6 data_hide_opsi">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">OPSI BAYAR</label>
                                                                                    <div class="col-md-9 has-success">
                                                                                        <select class="form-control filled-input select2" name="opsi_bayar" id="opsi_bayar">
                                                                                            <option value="cash" selected>CASH</option>
                                                                                            <option value="transfer">TRANSFER</option>
                                                                                            <option value="kredit">KREDIT</option>
                                                                                            <option value="debit">DEBIT</option>
                                                                                            <option value="asuransi">ASURANSI</option>
                                                                                            <option value="lainnya">LAINNYA</option>
                                                                                            <!-- <option value="asuransi" hidden></option> -->
                                                                                        </select>
                                                                                        <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">CATATAN </label>
                                                                                    <div class="col-md-9 has-success">
                                                                                        <textarea class="form-control" rows="5" cols="30" autocomplete="off" id="inNote" name="inNote"></textarea>
                                                                                        <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div> -->
                                                                        </div>

                                                                        <div id="tbh_distributor" class="collapse">
                                                                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO PEMBAYARAN</h6>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="data_hide_bank collapse">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3">JENIS BANK </label>
                                                                                            <div class="col-md-9 has-success">
                                                                                                <select class="form-control filled-input select2" placeholder="Choose a Category" id="jenis_bank" name="jenis_bank">
                                                                                                    <?php foreach ($data_bank as $row) : ?>
                                                                                                        <option value="<?php echo $row->id_bank; ?>">
                                                                                                            <?php echo $row->nama_bank; ?></option>
                                                                                                    <?php endforeach ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group ">
                                                                                        <label class="control-label col-md-3">TOTAL BAYAR KESELURUHAN</label>
                                                                                        <div class="col-md-9  has-success">
                                                                                            <input type="text" class="form-control" autocomplete="off" id="totalkeseluruhan1" name="totalkeseluruhan1" value="0" readonly>
                                                                                            <input type="hidden" class="form-control" autocomplete="off" id="totalkeseluruhan" name="totalkeseluruhan">
                                                                                            <span class="help-block"></span>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group ">
                                                                                        <label class="control-label col-md-3">TOTAL BAYAR</label>
                                                                                        <div class="col-md-9  has-success">
                                                                                            <input type="number" class="form-control" autocomplete="off" id="totalbayar" name="totalbayar" value="0">
                                                                                            <span class="help-block"></span>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">TOTAL BAYAR</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="totalbayar" name="totalbayar" value="0" disabled="">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div> -->

                                                                        </div>






                                                                        <div class="row">
                                                                            <center>
                                                                                <!-- <button class="btn btn-primary btn-anim btn-rounded mr-10" title="Simpan Pembayaran di Pendapatan Kasir" type="submit" name="action" value="simpan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button> -->
                                                                                <button class="btn btn-warning btn-anim btn-rounded mr-10" title="Hanya Cetak Billing" type="submit" name="action" value="cetak"><i class="icon-printer"></i><span class="btn-text">CETAK</span></button>
                                                                            </center>


                                                                        </div>

                                                                    </div>
                                                                </form>
                                                                <br>
                                                                <br>
                                                                <div class="row">
                                                                    <center>
                                                                        <button onclick="reload_riwayat()" class="btn btn-primary btn-anim btn-rounded mr-10" type="button"><i class="icon-arrow-down"></i><span class="btn-text">RIWAYAT PEMBAYARAN</span></button>
                                                                    </center>
                                                                </div>
                                                                <div id="coll_opsi_bayar" class="collapse">
                                                                    <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO PEMBAYARAN</h6>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">OPSI BAYAR</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" name="edit_opsi_bayar" id="edit_opsi_bayar">
                                                                                        <option value="cash" selected>CASH</option>
                                                                                        <option value="transfer">TRANSFER</option>
                                                                                        <option value="kredit">KREDIT</option>
                                                                                        <option value="debit">DEBIT</option>
                                                                                        <option value="asuransi" class="hide">ASURANSI</option>
                                                                                        <option value="lainnya">LAINNYA</option>

                                                                                    </select>
                                                                                    <span class="help-block"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 data_hide_bank1 collapse">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">JENIS BANK </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="edit_jenis_bank" name="edit_jenis_bank">
                                                                                        <option value="">-</option>

                                                                                        <?php foreach ($data_bank as $row) : ?>
                                                                                            <option value="<?php echo $row->id_bank; ?>">
                                                                                                <?php echo $row->nama_bank; ?></option>
                                                                                        <?php endforeach ?>
                                                                                    </select>
                                                                                    <span class="help-block"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">BIAYA</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="text" class="form-control" autocomplete="off" id="edit_totalbayar" name="edit_totalbayar">
                                                                                    <span class="help-block"></span>
                                                                                    <input type="hidden" id="inPendapatan">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <center>
                                                                            <button title="Mengubah Opsi Bayar" onclick="editDetailKasir()" class="btn btn-warning btn-anim btn-square mr-10" type="button"><i class="icon-rocket"></i><span class="btn-text">EDIT</span></button>
                                                                        </center>
                                                                    </div>

                                                                </div>
                                                                <div class="table-wrap t_riwayat collapse">
                                                                    <div class="table-responsive ">
                                                                        <table id="tb_riwayat" class="table table-hover display">
                                                                            <thead>
                                                                                <tr class="bg-success">
                                                                                    <th>NO</th>
                                                                                    <th>CETAK</th>
                                                                                    <th>EDIT</th>
                                                                                    <th>TANGGAL</th>
                                                                                    <th>NILAI</th>
                                                                                    <th>OPSI BAYAR</th>
                                                                                    <th>STAFF</th>
                                                                                </tr>
                                                                            </thead>

                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!--end modal-->
                                </div>
                            </div>
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
    function tampilTindakanFarmasi(id_pelayanan, id_cara_bayar) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Kasir_poli/getTotalObatBebas') ?>",
            dataType: "JSON",
            data: {
                id: id_pelayanan,
            },
            success: function(data) {
                if (id_cara_bayar != '42') {
                    // $('.data_hide_opsi').collapse('hide');
                    $('#tbh_distributor').collapse('hide');

                    $('#opsi_bayar').val('asuransi').change();

                } else {
                    // $('.data_hide_opsi').collapse('show');
                    $('#opsi_bayar').val('cash').change();

                }
                $("#modal_edit_kasir").modal('show');
                $('#inPel').val(id_pelayanan);
                $('#totalkeseluruhan1').val(convertToRupiah(data));
                $('#totalkeseluruhan').val(data);
                $('#totalbayar').val(data);
            }
        });
    }

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
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
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },

            },
            "ajax": '<?php echo base_url('Kasir_poli/Tampil_obat_bebas'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });
        $('#opsi_bayar').change(function() {


            if ($(this).val() == 'cash' || $(this).val() == 'asuransi') {
                if ($(this).val() == 'cash') {
                    $('#tbh_distributor').collapse('show');
                }
                $('.data_hide_bank').collapse('hide');
            } else {
                $('#tbh_distributor').collapse('show');
                $('.data_hide_bank').collapse('show');
            }
        });

        $('#edit_opsi_bayar').change(function() {
            if ($(this).val() == 'cash' || $(this).val() == 'asuransi') {

                $('.data_hide_bank1').collapse('hide');
            } else {
                $('.data_hide_bank1').collapse('show');
            }
        });
        
        $('#modal_edit_kasir').on('hidden.bs.modal', function() {
            $('.t_riwayat').collapse('hide');

        })
    });

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
                "url": '<?= base_url('Kasir_poli/Tampil_obat_bebas'); ?>',
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
<script>

    function reload_riwayat() {
        // var table;
        $('.t_riwayat').collapse('show');

        $('#tb_riwayat').dataTable().fnClearTable();
        $('#tb_riwayat').dataTable().fnDestroy();
        var table = $('#tb_riwayat').DataTable({
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Pencarian : ",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },

            },
            "ajax": {
                "url": '<?php echo base_url('Kasir/tampil_riwayat_pembayaran'); ?>',
                "type": 'POST',
                "data": function(data) {
                    data.id = $('#inPel').val();
                    data.id_his = $('#inHis').val();
                    data.url = "Kasir_poli/print_riwayat_dp";

                }
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
            table.ajax.reload(); //just reload table
        });
        $('#btn-reset').click(function() { //button reset event click
            $('#form-filter')[0].reset();
            table.ajax.reload(); //just reload table
        });
    }

    function editDetailKasir() {
        id_pelayanan = $('#inPendapatan').val();
        opsi_bayar = $('#edit_opsi_bayar').val();
        jenis_bank = $('#edit_jenis_bank').val();
        total = $('#edit_totalbayar').val();
        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Mengubah Opsi Bayar pada pasien ini?",
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
                    url: "<?php echo base_url() ?>Kasir/edit_pendapatan_kasir",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pendapatan: id_pelayanan,
                        opsi: opsi_bayar,
                        jenis_bank: jenis_bank,
                        total: total
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Pembayaran Sudah Disimpan",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tb_riwayat').DataTable().ajax.reload();
                            $('#coll_opsi_bayar').collapse('hide');

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
        return false;
    }

    function tampilEditOpsiBayar(id_pendapatan, ket, total, bank) {
        $('#inPendapatan').val(id_pendapatan);
        $('#edit_opsi_bayar').val(ket).change();
        $('#edit_jenis_bank').val(bank).change();
        $('#edit_totalbayar').val(total);
        $('#coll_opsi_bayar').collapse('show');

    }
=======
<!-- Row -->
<div class="panel panel-default card-view mt-20 ">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN OBAT BEBAS</span></h6>
        </div>

        <div class="clearfix"></div>
        <div class="row mt-30">
            <div class="col-md-12">
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
    <h6 class="panel-title txt-dark mt-10"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>CETAK</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KLAIM</th>
                                <th>DOKTER</th>
                                <th>DEPO</th>
                                <th>NOTA FARMASI</th>
                                <th>KETERANGAN</th>


                            </tr>
                        </thead>

                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>CETAK</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>NAMA PASIEN</th>
                                <th>JENIS KLAIM</th>
                                <th>DOKTER</th>
                                <th>DEPO</th>
                                <th>NOTA FARMASI</th>
                                <th>KETERANGAN</th>

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
        <div class="modal fade" role="dialog" id="modal_edit_kasir" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!--modal 1-->
                    <div class="modal-body">
                        <div class="form-body mt-10">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-wrap">
                                                        <div class="form-body">
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" action="<?php echo base_url('Kasir_poli/print_obat_bebas') ?>" method="post" enctype="multipart/form-data" role="form" target="_blank">
                                                                    <input type="hidden" id="inPel" name="inPel">
                                                                    <input type="hidden" id="inHis" name="inHis">
                                                                    <div class="form-body">

                                                                        <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO KASIR</h6>
                                                                        <hr>
                                                                        <!-- <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">DISC</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="number" class="form-control rounded-input" autocomplete="off" id="inDiskon" name="inDiskon" value="0">
                                                                                        <span class="help-block"></span>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">DP </label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="number" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="inDp" name="inDp" value="0">
                                                                                        <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div> -->
                                                                        <div class="row">
                                                                            <!-- <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">TANGGAL PULANG</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="datetime-local" class="form-control rounded-input" autocomplete="off" id="inTglKeluar" name="inTglKeluar" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                                                                        echo date("Y-m-d"); ?>">
                                                                                        <span class="help-block"></span>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">SELISIH </label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="number" class="form-control rounded-input" autocomplete="off" placeholder="jumlah" id="inSelisih" name="inSelisih" value="0">
                                                                                        <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div> -->
                                                                            <div class="col-md-6 data_hide_opsi">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">OPSI BAYAR</label>
                                                                                    <div class="col-md-9 has-success">
                                                                                        <select class="form-control filled-input select2" name="opsi_bayar" id="opsi_bayar">
                                                                                            <option value="cash" selected>CASH</option>
                                                                                            <option value="transfer">TRANSFER</option>
                                                                                            <option value="kredit">KREDIT</option>
                                                                                            <option value="debit">DEBIT</option>
                                                                                            <option value="asuransi">ASURANSI</option>
                                                                                            <option value="lainnya">LAINNYA</option>
                                                                                            <!-- <option value="asuransi" hidden></option> -->
                                                                                        </select>
                                                                                        <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- <div class="col-md-6">
                                                                                <div class="form-group ">
                                                                                    <label class="control-label col-md-3">CATATAN </label>
                                                                                    <div class="col-md-9 has-success">
                                                                                        <textarea class="form-control" rows="5" cols="30" autocomplete="off" id="inNote" name="inNote"></textarea>
                                                                                        <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div> -->
                                                                        </div>

                                                                        <div id="tbh_distributor" class="collapse">
                                                                            <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO PEMBAYARAN</h6>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="data_hide_bank collapse">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3">JENIS BANK </label>
                                                                                            <div class="col-md-9 has-success">
                                                                                                <select class="form-control filled-input select2" placeholder="Choose a Category" id="jenis_bank" name="jenis_bank">
                                                                                                    <?php foreach ($data_bank as $row) : ?>
                                                                                                        <option value="<?php echo $row->id_bank; ?>">
                                                                                                            <?php echo $row->nama_bank; ?></option>
                                                                                                    <?php endforeach ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group ">
                                                                                        <label class="control-label col-md-3">TOTAL BAYAR KESELURUHAN</label>
                                                                                        <div class="col-md-9  has-success">
                                                                                            <input type="text" class="form-control" autocomplete="off" id="totalkeseluruhan1" name="totalkeseluruhan1" value="0" readonly>
                                                                                            <input type="hidden" class="form-control" autocomplete="off" id="totalkeseluruhan" name="totalkeseluruhan">
                                                                                            <span class="help-block"></span>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group ">
                                                                                        <label class="control-label col-md-3">TOTAL BAYAR</label>
                                                                                        <div class="col-md-9  has-success">
                                                                                            <input type="number" class="form-control" autocomplete="off" id="totalbayar" name="totalbayar" value="0">
                                                                                            <span class="help-block"></span>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">TOTAL BAYAR</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="number" class="form-control" autocomplete="off" id="totalbayar" name="totalbayar" value="0" disabled="">
                                                                                    <span class="help-block"></span>

                                                                                </div>
                                                                            </div>
                                                                        </div> -->

                                                                        </div>






                                                                        <div class="row">
                                                                            <center>
                                                                                <!-- <button class="btn btn-primary btn-anim btn-rounded mr-10" title="Simpan Pembayaran di Pendapatan Kasir" type="submit" name="action" value="simpan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button> -->
                                                                                <button class="btn btn-warning btn-anim btn-rounded mr-10" title="Hanya Cetak Billing" type="submit" name="action" value="cetak"><i class="icon-printer"></i><span class="btn-text">CETAK</span></button>
                                                                            </center>


                                                                        </div>

                                                                    </div>
                                                                </form>
                                                                <br>
                                                                <br>
                                                                <div class="row">
                                                                    <center>
                                                                        <button onclick="reload_riwayat()" class="btn btn-primary btn-anim btn-rounded mr-10" type="button"><i class="icon-arrow-down"></i><span class="btn-text">RIWAYAT PEMBAYARAN</span></button>
                                                                    </center>
                                                                </div>
                                                                <div id="coll_opsi_bayar" class="collapse">
                                                                    <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>INFO PEMBAYARAN</h6>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">OPSI BAYAR</label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" name="edit_opsi_bayar" id="edit_opsi_bayar">
                                                                                        <option value="cash" selected>CASH</option>
                                                                                        <option value="transfer">TRANSFER</option>
                                                                                        <option value="kredit">KREDIT</option>
                                                                                        <option value="debit">DEBIT</option>
                                                                                        <option value="asuransi" class="hide">ASURANSI</option>
                                                                                        <option value="lainnya">LAINNYA</option>

                                                                                    </select>
                                                                                    <span class="help-block"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 data_hide_bank1 collapse">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">JENIS BANK </label>
                                                                                <div class="col-md-9 has-success">
                                                                                    <select class="form-control filled-input select2" placeholder="Choose a Category" id="edit_jenis_bank" name="edit_jenis_bank">
                                                                                        <option value="">-</option>

                                                                                        <?php foreach ($data_bank as $row) : ?>
                                                                                            <option value="<?php echo $row->id_bank; ?>">
                                                                                                <?php echo $row->nama_bank; ?></option>
                                                                                        <?php endforeach ?>
                                                                                    </select>
                                                                                    <span class="help-block"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group ">
                                                                                <label class="control-label col-md-3">BIAYA</label>
                                                                                <div class="col-md-9  has-success">
                                                                                    <input type="text" class="form-control" autocomplete="off" id="edit_totalbayar" name="edit_totalbayar">
                                                                                    <span class="help-block"></span>
                                                                                    <input type="hidden" id="inPendapatan">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <center>
                                                                            <button title="Mengubah Opsi Bayar" onclick="editDetailKasir()" class="btn btn-warning btn-anim btn-square mr-10" type="button"><i class="icon-rocket"></i><span class="btn-text">EDIT</span></button>
                                                                        </center>
                                                                    </div>

                                                                </div>
                                                                <div class="table-wrap t_riwayat collapse">
                                                                    <div class="table-responsive ">
                                                                        <table id="tb_riwayat" class="table table-hover display">
                                                                            <thead>
                                                                                <tr class="bg-success">
                                                                                    <th>NO</th>
                                                                                    <th>CETAK</th>
                                                                                    <th>EDIT</th>
                                                                                    <th>TANGGAL</th>
                                                                                    <th>NILAI</th>
                                                                                    <th>OPSI BAYAR</th>
                                                                                    <th>STAFF</th>
                                                                                </tr>
                                                                            </thead>

                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!--end modal-->
                                </div>
                            </div>
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
    function tampilTindakanFarmasi(id_pelayanan, id_cara_bayar) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Kasir_poli/getTotalObatBebas') ?>",
            dataType: "JSON",
            data: {
                id: id_pelayanan,
            },
            success: function(data) {
                if (id_cara_bayar != '42') {
                    // $('.data_hide_opsi').collapse('hide');
                    $('#tbh_distributor').collapse('hide');

                    $('#opsi_bayar').val('asuransi').change();

                } else {
                    // $('.data_hide_opsi').collapse('show');
                    $('#opsi_bayar').val('cash').change();

                }
                $("#modal_edit_kasir").modal('show');
                $('#inPel').val(id_pelayanan);
                $('#totalkeseluruhan1').val(convertToRupiah(data));
                $('#totalkeseluruhan').val(data);
                $('#totalbayar').val(data);
            }
        });
    }

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
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
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },

            },
            "ajax": '<?php echo base_url('Kasir_poli/Tampil_obat_bebas'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });
        $('#opsi_bayar').change(function() {


            if ($(this).val() == 'cash' || $(this).val() == 'asuransi') {
                if ($(this).val() == 'cash') {
                    $('#tbh_distributor').collapse('show');
                }
                $('.data_hide_bank').collapse('hide');
            } else {
                $('#tbh_distributor').collapse('show');
                $('.data_hide_bank').collapse('show');
            }
        });

        $('#edit_opsi_bayar').change(function() {
            if ($(this).val() == 'cash' || $(this).val() == 'asuransi') {

                $('.data_hide_bank1').collapse('hide');
            } else {
                $('.data_hide_bank1').collapse('show');
            }
        });
        
        $('#modal_edit_kasir').on('hidden.bs.modal', function() {
            $('.t_riwayat').collapse('hide');

        })
    });

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
                "url": '<?= base_url('Kasir_poli/Tampil_obat_bebas'); ?>',
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
<script>

    function reload_riwayat() {
        // var table;
        $('.t_riwayat').collapse('show');

        $('#tb_riwayat').dataTable().fnClearTable();
        $('#tb_riwayat').dataTable().fnDestroy();
        var table = $('#tb_riwayat').DataTable({
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Pencarian : ",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },

            },
            "ajax": {
                "url": '<?php echo base_url('Kasir/tampil_riwayat_pembayaran'); ?>',
                "type": 'POST',
                "data": function(data) {
                    data.id = $('#inPel').val();
                    data.id_his = $('#inHis').val();
                    data.url = "Kasir_poli/print_riwayat_dp";

                }
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
            table.ajax.reload(); //just reload table
        });
        $('#btn-reset').click(function() { //button reset event click
            $('#form-filter')[0].reset();
            table.ajax.reload(); //just reload table
        });
    }

    function editDetailKasir() {
        id_pelayanan = $('#inPendapatan').val();
        opsi_bayar = $('#edit_opsi_bayar').val();
        jenis_bank = $('#edit_jenis_bank').val();
        total = $('#edit_totalbayar').val();
        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Mengubah Opsi Bayar pada pasien ini?",
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
                    url: "<?php echo base_url() ?>Kasir/edit_pendapatan_kasir",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_pendapatan: id_pelayanan,
                        opsi: opsi_bayar,
                        jenis_bank: jenis_bank,
                        total: total
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Pembayaran Sudah Disimpan",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tb_riwayat').DataTable().ajax.reload();
                            $('#coll_opsi_bayar').collapse('hide');

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
        return false;
    }

    function tampilEditOpsiBayar(id_pendapatan, ket, total, bank) {
        $('#inPendapatan').val(id_pendapatan);
        $('#edit_opsi_bayar').val(ket).change();
        $('#edit_jenis_bank').val(bank).change();
        $('#edit_totalbayar').val(total);
        $('#coll_opsi_bayar').collapse('show');

    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>