<<<<<<< HEAD
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100"> <?= strtoupper($judul) ?></span></h6>
        </div>
        <div class="clearfix"></div>
        <?php if ($tipe == 'tambah' || $tipe == 'non_verif') {
        ?>
            <div align="right">
                <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" onclick="tambah_detailx()"><i class="icon-plus"></i><span class="btn-text">BUAT PEMBAYARAN PIUTANG</span></button>

            </div>
        <?php } ?>
        <div class="row mt-30">
            <div class="col-md-12">
                <!-- <div class="col-md-3 mt-20">
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

                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>

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
                                <th>NO</th>
                                <th>AKSI</th>
                                <?php if ($tipe == 'tambah' || $tipe == 'non_verif') { ?>
                                    <th>TAMBAH</th>
                                <?php } ?>
                                <th>TANGGAL</th>
                                <th>NO DOKUMEN</th>
                                <th>VENDOR</th>
                                <th>TOTAL</th>
                                <th>STAFF</th>
                                <th>STATUS</th>

                            </tr>
                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-pendaftaranakun" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <p><i class="icon-people mr-10"></i>INFO</p>

            </div>
            <div class="modal-body">
                <!-- Form body  -->

                <div class="form-body mt-20">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Tanggal</label>
                                <div class="col-md-9 has-success">
                                    <input type="date" placeholder="TANGGAL MASUK" value="<?php echo date("Y-m-d"); ?>" id="tgl_faktur" name="tgl_faktur" class="form-control" onchange="getNoDokumen()"></input>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label col-md-3">JENIS KLAIM</label>
                                <div class="col-md-9 has-success ">
                                    <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inTipe" id="inTipe">

                                        <option value="-" selected>-</option>
                                        <?php foreach ($pelayanan as $row) {
                                        ?>
                                            <option value="<?= $row['id_vendor'] ?>"><?= $row['cara_klaim'] ?></option>

                                        <?php }
                                        ?>

                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row" style="margin-top: 20px;margin-bottom:20px;">
                        <div class="col-md-6"> </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button onclick="simpan_bukti()" class="btn btn-primary btn-anim  btn-sm simpanBukti" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN </span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="modal fade modal_pembayaran" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p><i class="icon-people mr-10"></i>INFO</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">


                                <div class="col-md-12">
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NO DOKUMEN</label>
                                        <div class="col-md-9 has-error">
                                            <input type="text" class="form-control" readonly id="no_dok1">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">

                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TANGGAL</label>
                                        <div class="col-md-9 has-error">
                                            <input type="date" placeholder="TANGGAL" value="<?php echo date("Y-m-d"); ?>" id="tgl_faktur1" name="tgl_faktur1" class="form-control"></input>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JENIS PEMBAYARAN</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inJenis" id="inJenis">

                                                <option value="-" selected>-</option>
                                                <option value="kas">KAS</option>
                                                <option value="bank">BANK</option>
                                                <option value="rk">RK</option>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10 collapse" id="list_bank">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA BANK</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inBank" id="inBank">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10 collapse" id="list_RK">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">LIST RK</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inRK" id="inRK">
                                                <?php $db = $this->db->get_where('sub_detail_akun', ['kategori' => '950'])->result_array();
                                                foreach ($db as $row) :
                                                ?>
                                                    <option value="<?php echo $row["id_detail"]; ?>"><?php echo $row["deskripsi"] . ' (' . implode('.', [$row["kategori"], $row["sub_kategori"], $row["kode"]]) . ')'; ?></option>

                                                <?php endforeach; ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row" style="margin-top: 20px;margin-bottom:20px;">
                            <div class="col-md-6"> </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button onclick="simpan()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
                                    </div>
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
<div id="div_result" style="display: none;">

</div>
<style>
    td {
        color: black;
    }
</style>

<script type="text/javascript">
    function simpan_bukti() {

        id_vendor = $("#inTipe").val();
        vendor = $("#inTipe option:selected").text();
        tgl_faktur = $("#tgl_faktur").val();

        $.ajax({
            url: "<?= base_url() . 'Jurnal_utang_piutang/simpan_bukti' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id_vendor: id_vendor,
                vendor: vendor,
                tgl_faktur: tgl_faktur,
                tipe: '<?= $tipe ?>',
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Dokumen " + data.no_dok + " Sudah Dibuat",
                        confirmButtonColor: "#3cb878",
                        confirmButtonText: "OK",
                    });
                    $(".modal-pendaftaranakun").modal('hide');
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

    function tambah_detailx() {

        $(".modal-pendaftaranakun").modal('show');
    }

    function getNoDokumen() {
        var tanggal = $('#tgl_faktur').val();

        $.ajax({
            url: "<?= base_url() . 'Jurnal_farmasi/getNoDokumen' ?>",
            data: {
                tanggal: tanggal,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                $('#no_dok').val(data);

            }
        });

    }
</script>

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
            "ajax": {
                "url": '<?= base_url('Jurnal_utang_piutang/tampil_pembayaran_piutang'); ?>',
                "type": 'POST',
                "data": {
                    tipe: '<?= $tipe ?>',
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
                "url": '<?= base_url('Jurnal_utang_piutang/tampil_pembayaran_piutang'); ?>',
                "type": 'POST',
                "data": {
                    tipe: '<?= $tipe ?>',
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
                "url": '<?= base_url('Jurnal_utang_piutang/tampil_pembayaran_piutang'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,
                    tipe: '<?= $tipe ?>',


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
    function verifikasi(no_dokumen, status, tipe) {
        if (status == 99) {
            mess = "Dibatalkan";
        } else {
            mess = "Disimpan"
        }

        $.ajax({
            url: "<?= base_url() . 'Jurnal_utang_piutang/acc_pembayaran_piutang' ?>",
            data: {
                no_dok: no_dokumen,
                status: status,
                tipe: tipe
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Bukti Kas " + no_dokumen + " Berhasil " + mess,
                        confirmButtonColor: "#3cb878",
                    });
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
</script>
<script type="text/javascript">
    function cetak(no_jurnal) {

        $.ajax({
            type: 'POST',
            url: "<?= base_url() . 'Jurnal_farmasi/cetak_bukti_kas' ?>",
            data: {
                no_jurnal: no_jurnal,
            },
            dataType: "html",
            success: function(msg) {
                $("#div_result").html(msg);
                var divContents = document.getElementById("div_result").innerHTML;
                // var a = window.open('', '', 'height=500, width=500');
                var a = window.open();
                a.document.write('<html>');
                // a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
                a.document.write('<body >');
                a.document.write(divContents);
                a.document.write('</body>');
                a.document.write('</html>');
                setTimeout(function() { // wait until all resources loaded 
                    a.document.close(); // necessary for IE >= 10
                    a.focus(); // necessary for IE >= 10
                    // a.print(); // change window to winPrint
                    // a.close(); // change window to winPrint
                }, 100);
            }
        });
    }
</script>
<script>
    function pilih(no_dokumen) {
        $('#no_dok1').val(no_dokumen);
        $(".modal_pembayaran").modal('show');
    }
    $('#inJenis').change(function() {
        var upJenis = $('#inJenis').val();
        if (upJenis == 'bank') {
            $('#list_bank').collapse('show');
            $.ajax({
                url: "<?= base_url('Jurnal_farmasi/get_bank') ?>",
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html = '<option>-</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].kode_coa + '">' + data[i].nama_bank + ' (No Rek: ' + data[i].no_rek + ')</option>';
                    }
                    $('#inBank').html(html);
                }
            });

        } else {
            $('#list_bank').collapse('hide');

        }
        if (upJenis == 'rk') {
            $('#list_RK').collapse('show');
        } else {
            $('#list_RK').collapse('hide');

        }

    });


    function simpan() {

        tgl_faktur = $("#tgl_faktur1").val();
        id_jenis = $("#inJenis").val();
        if(id_jenis == 'bank'){
            bank = $("#inBank").val();
        }else{
            bank = $("#inRK").val();
        }
        no_dokumen = $('#no_dok1').val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_utang_piutang/acc_pembayaran_piutang",
                method: "POST",
                dataType: 'json',
                data: {
                    no_dokumen: no_dokumen,
                    id_jenis: id_jenis,
                    bank: bank,
                    tgl_faktur: tgl_faktur,
                    tipe: 'pembayaran',
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Bukti Kas " + no_dokumen + " Berhasil Disimpan",
                            confirmButtonColor: "#3cb878",
                        });
                        $('#datable').DataTable().ajax.reload();
                        $(".modal_pembayaran").modal('hide');


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
        });
        return false;
    }
=======
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100"> <?= strtoupper($judul) ?></span></h6>
        </div>
        <div class="clearfix"></div>
        <?php if ($tipe == 'tambah' || $tipe == 'non_verif') {
        ?>
            <div align="right">
                <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" onclick="tambah_detailx()"><i class="icon-plus"></i><span class="btn-text">BUAT PEMBAYARAN PIUTANG</span></button>

            </div>
        <?php } ?>
        <div class="row mt-30">
            <div class="col-md-12">
                <!-- <div class="col-md-3 mt-20">
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

                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>

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
                                <th>NO</th>
                                <th>AKSI</th>
                                <?php if ($tipe == 'tambah' || $tipe == 'non_verif') { ?>
                                    <th>TAMBAH</th>
                                <?php } ?>
                                <th>TANGGAL</th>
                                <th>NO DOKUMEN</th>
                                <th>VENDOR</th>
                                <th>TOTAL</th>
                                <th>STAFF</th>
                                <th>STATUS</th>

                            </tr>
                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-pendaftaranakun" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <p><i class="icon-people mr-10"></i>INFO</p>

            </div>
            <div class="modal-body">
                <!-- Form body  -->

                <div class="form-body mt-20">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Tanggal</label>
                                <div class="col-md-9 has-success">
                                    <input type="date" placeholder="TANGGAL MASUK" value="<?php echo date("Y-m-d"); ?>" id="tgl_faktur" name="tgl_faktur" class="form-control" onchange="getNoDokumen()"></input>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label col-md-3">JENIS KLAIM</label>
                                <div class="col-md-9 has-success ">
                                    <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inTipe" id="inTipe">

                                        <option value="-" selected>-</option>
                                        <?php foreach ($pelayanan as $row) {
                                        ?>
                                            <option value="<?= $row['id_vendor'] ?>"><?= $row['cara_klaim'] ?></option>

                                        <?php }
                                        ?>

                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row" style="margin-top: 20px;margin-bottom:20px;">
                        <div class="col-md-6"> </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button onclick="simpan_bukti()" class="btn btn-primary btn-anim  btn-sm simpanBukti" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN </span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="modal fade modal_pembayaran" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p><i class="icon-people mr-10"></i>INFO</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">


                                <div class="col-md-12">
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NO DOKUMEN</label>
                                        <div class="col-md-9 has-error">
                                            <input type="text" class="form-control" readonly id="no_dok1">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">

                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">TANGGAL</label>
                                        <div class="col-md-9 has-error">
                                            <input type="date" placeholder="TANGGAL" value="<?php echo date("Y-m-d"); ?>" id="tgl_faktur1" name="tgl_faktur1" class="form-control"></input>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JENIS PEMBAYARAN</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inJenis" id="inJenis">

                                                <option value="-" selected>-</option>
                                                <option value="kas">KAS</option>
                                                <option value="bank">BANK</option>
                                                <option value="rk">RK</option>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10 collapse" id="list_bank">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA BANK</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inBank" id="inBank">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10 collapse" id="list_RK">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">LIST RK</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inRK" id="inRK">
                                                <?php $db = $this->db->get_where('sub_detail_akun', ['kategori' => '950'])->result_array();
                                                foreach ($db as $row) :
                                                ?>
                                                    <option value="<?php echo $row["id_detail"]; ?>"><?php echo $row["deskripsi"] . ' (' . implode('.', [$row["kategori"], $row["sub_kategori"], $row["kode"]]) . ')'; ?></option>

                                                <?php endforeach; ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row" style="margin-top: 20px;margin-bottom:20px;">
                            <div class="col-md-6"> </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button onclick="simpan()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
                                    </div>
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
<div id="div_result" style="display: none;">

</div>
<style>
    td {
        color: black;
    }
</style>

<script type="text/javascript">
    function simpan_bukti() {

        id_vendor = $("#inTipe").val();
        vendor = $("#inTipe option:selected").text();
        tgl_faktur = $("#tgl_faktur").val();

        $.ajax({
            url: "<?= base_url() . 'Jurnal_utang_piutang/simpan_bukti' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id_vendor: id_vendor,
                vendor: vendor,
                tgl_faktur: tgl_faktur,
                tipe: '<?= $tipe ?>',
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Dokumen " + data.no_dok + " Sudah Dibuat",
                        confirmButtonColor: "#3cb878",
                        confirmButtonText: "OK",
                    });
                    $(".modal-pendaftaranakun").modal('hide');
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

    function tambah_detailx() {

        $(".modal-pendaftaranakun").modal('show');
    }

    function getNoDokumen() {
        var tanggal = $('#tgl_faktur').val();

        $.ajax({
            url: "<?= base_url() . 'Jurnal_farmasi/getNoDokumen' ?>",
            data: {
                tanggal: tanggal,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                $('#no_dok').val(data);

            }
        });

    }
</script>

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
            "ajax": {
                "url": '<?= base_url('Jurnal_utang_piutang/tampil_pembayaran_piutang'); ?>',
                "type": 'POST',
                "data": {
                    tipe: '<?= $tipe ?>',
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
                "url": '<?= base_url('Jurnal_utang_piutang/tampil_pembayaran_piutang'); ?>',
                "type": 'POST',
                "data": {
                    tipe: '<?= $tipe ?>',
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
                "url": '<?= base_url('Jurnal_utang_piutang/tampil_pembayaran_piutang'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,
                    tipe: '<?= $tipe ?>',


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
    function verifikasi(no_dokumen, status, tipe) {
        if (status == 99) {
            mess = "Dibatalkan";
        } else {
            mess = "Disimpan"
        }

        $.ajax({
            url: "<?= base_url() . 'Jurnal_utang_piutang/acc_pembayaran_piutang' ?>",
            data: {
                no_dok: no_dokumen,
                status: status,
                tipe: tipe
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Bukti Kas " + no_dokumen + " Berhasil " + mess,
                        confirmButtonColor: "#3cb878",
                    });
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
</script>
<script type="text/javascript">
    function cetak(no_jurnal) {

        $.ajax({
            type: 'POST',
            url: "<?= base_url() . 'Jurnal_farmasi/cetak_bukti_kas' ?>",
            data: {
                no_jurnal: no_jurnal,
            },
            dataType: "html",
            success: function(msg) {
                $("#div_result").html(msg);
                var divContents = document.getElementById("div_result").innerHTML;
                // var a = window.open('', '', 'height=500, width=500');
                var a = window.open();
                a.document.write('<html>');
                // a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
                a.document.write('<body >');
                a.document.write(divContents);
                a.document.write('</body>');
                a.document.write('</html>');
                setTimeout(function() { // wait until all resources loaded 
                    a.document.close(); // necessary for IE >= 10
                    a.focus(); // necessary for IE >= 10
                    // a.print(); // change window to winPrint
                    // a.close(); // change window to winPrint
                }, 100);
            }
        });
    }
</script>
<script>
    function pilih(no_dokumen) {
        $('#no_dok1').val(no_dokumen);
        $(".modal_pembayaran").modal('show');
    }
    $('#inJenis').change(function() {
        var upJenis = $('#inJenis').val();
        if (upJenis == 'bank') {
            $('#list_bank').collapse('show');
            $.ajax({
                url: "<?= base_url('Jurnal_farmasi/get_bank') ?>",
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html = '<option>-</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].kode_coa + '">' + data[i].nama_bank + ' (No Rek: ' + data[i].no_rek + ')</option>';
                    }
                    $('#inBank').html(html);
                }
            });

        } else {
            $('#list_bank').collapse('hide');

        }
        if (upJenis == 'rk') {
            $('#list_RK').collapse('show');
        } else {
            $('#list_RK').collapse('hide');

        }

    });


    function simpan() {

        tgl_faktur = $("#tgl_faktur1").val();
        id_jenis = $("#inJenis").val();
        if(id_jenis == 'bank'){
            bank = $("#inBank").val();
        }else{
            bank = $("#inRK").val();
        }
        no_dokumen = $('#no_dok1').val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Jurnal_utang_piutang/acc_pembayaran_piutang",
                method: "POST",
                dataType: 'json',
                data: {
                    no_dokumen: no_dokumen,
                    id_jenis: id_jenis,
                    bank: bank,
                    tgl_faktur: tgl_faktur,
                    tipe: 'pembayaran',
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Bukti Kas " + no_dokumen + " Berhasil Disimpan",
                            confirmButtonColor: "#3cb878",
                        });
                        $('#datable').DataTable().ajax.reload();
                        $(".modal_pembayaran").modal('hide');


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
        });
        return false;
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>