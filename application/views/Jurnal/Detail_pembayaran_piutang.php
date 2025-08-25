<!-- /* HTML: <div class="loader"></div> */ -->
<style>
    .loader1 {
        width: 50px;
        padding: 8px;
        aspect-ratio: 1;
        border-radius: 50%;
        background: #25b09b;
        --_m:
            conic-gradient(#0000 10%, #000),
            linear-gradient(#000 0 0) content-box;
        -webkit-mask: var(--_m);
        mask: var(--_m);
        -webkit-mask-composite: source-out;
        mask-composite: subtract;
        animation: l3 1s infinite linear;
    } 
    .position1{
        position: absolute;
        right: 10px;
        top: 2%;
        scale: 40%;
        /* transform: translateY(-50%);  */
        /* display: none; */
    }
    .display1{
        display: none;
    }

    @keyframes l3 {
        to {
            transform: rotate(1turn)
        }
    }
</style>
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">PEMBAYARAN PIUTANG</span></h6>
        </div>
        <div class="clearfix"></div>

        <br>
        <br>
        <div align="left">
            <a class="btn btn-default mr-5200" href="<?= base_url('Jurnal_utang_piutang/Pembayaran_piutang') ?>"><span class="btn-text">KEMBALI</span></a>

            <button class="btn btn-primary btn-anim mr-5200" data-toggle="modal" onclick="tambah_detailx()"><i class="icon-plus"></i><span class="btn-text">TAMBAH PEMBAYARAN PIUTANG</span></button>
            <?php if ($tipe == 'non_verif') { ?>
                <button class="btn btn-info btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" onclick="tambah_jurnal()"><i class="icon-plus"></i><span class="btn-text">JURNAL</span></button>
            <?php } ?>
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
                                <th>INVOICE</th>
                                <th>NO RM</th>
                                <th>NAMA</th>
                                <th>NILAI YANG DIBAYAR</th>
                                <th>HAPUS</th>

                            </tr>
                        </thead>

                    </table>

                </div>
                <div class="row mt-20 mb-20" style="margin-left: 10px;">

                    <div class="col-md-6">
                        <div class="table-responsive ">
                            <table class="table table-hover display " id="outTotalHarga1">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="font-weight:bold;">Total Pembayaran Piutang</th>
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
    </div>
</div>

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- <form id="form-filter" class="form-horizontal"> -->


        <!-- Form body  -->
        <div class="modal fade modal-pendaftaranakun" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p><i class="icon-people mr-10"></i>INFO</p>

                    </div>
                    <div class="modal-body">
                        <div class="form-body mt-20">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NO DOKUMEN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" value="<?= $no_dokumen ?>" id="no_dok" name="no_dok" class="form-control" readonly></input>
                                            <input type="hidden" placeholder="TANGGAL MASUK" value="<?= $vendor ?>" id="inTipe" name="inTipe" class="form-control"></input>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">KATEGORI</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inKet" id="inKet" onchange="getTotalInv(this.value)">

                                                <option value="-" selected>SEMUA</option>
                                                <option value="obat">OBAT</option>
                                                <option value="pelayanan">PELAYANAN</option>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <span class="help-block"></span>
                                </div>
                                <!-- span -->

                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">INVOICE</label>
                                        <div class="col-md-9 has-success ">
                                            <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inVendor" id="inVendor" onchange="getTotalInv(this.value)">

                                                <option value="-" selected>-</option>
                                                <?php foreach ($invoice as $row) {
                                                ?>
                                                    <option value="<?= $row->no_jurnal . '|' . $row->pk ?>"><?= $row->pk ?></option>

                                                <?php }
                                                ?>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 mt-10">NILAI YANG DIBAYAR</label>
                                        <div class="col-md-9 has-success">

                                            <input type="text" class="form-control" id="inHarga1">
                                            <div class="loader1 position1 display1" id="loader"></div>
                                            <span class="help-block"></span>
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
                                            <button onclick="simpan_bundle()" class="btn btn-primary mr-20 btn-anim  btn-sm" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN INVOICE</span></button>
                                            <button onclick="cari()" class="btn btn-success btn-anim  btn-sm" type="button"><i class="fa fa-search"></i><span class="btn-text">CARI</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row collapse" id="collap_vendor">
                                <div class="col-sm-12">
                                    <div class="panel-wrapper collapse in">
                                        <div class="collapse" id="collap_obat_faktur1">
                                            <div class="pull-left">
                                                <h6 class="panel-title txt-dark">FORM PEMBAYARAN</h6>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div id="formObat">
                                                <div class="row">
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">NILAI</label>
                                                            <div class="col-md-9 has-success">

                                                                <input type="text" class="form-control" id="inTotal" disabled>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-10">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3 mt-10">NILAI YANG DIBAYAR</label>
                                                            <div class="col-md-9 has-success">

                                                                <input type="text" class="form-control" id="inHarga">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6"> </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">

                                                                <input type="hidden" class="form-control " autocomplete="off" id="upId">

                                                                <button class="btn btn-primary mr-10" onclick="insertObatFaktur()">SIMPAN</button>
                                                                <span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pull-left">
                                            <h6 class="panel-title txt-dark">LIST HUTANG</h6>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="row mr-20 ml-20">
                                            <div class="table-wrap">
                                                <div class="table-responsive">
                                                    <div class="row mt-30 pull-right">
                                                        <div class="col-md-12 ">
                                                        </div>
                                                    </div>
                                                    <table id="table_vendor" class="table table-striped  table-hover display pb-30" width="100%">
                                                        <thead>
                                                            <tr class="bg-success">
                                                                <!-- <th><label for="check_all"><input id="check_all" type="checkbox" onClick="toggle(this)"> All</label></br></th> -->
                                                                <th>AKSI</th>
                                                                <th>NO RM</th>
                                                                <th>NAMA</th>
                                                                <th>TANGGAL PELAYANAN</th>
                                                                <th>NILAI OUT STANDING</th>
                                                                <th>NILAI YANG DIBAYAR</th>
                                                            </tr>
                                                        </thead>

                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-20 mb-20" style="margin-left: 10px;">

                                            <div class="col-md-6">
                                                <div class="table-responsive ">
                                                    <table class="table table-hover display " id="outTotalHarga">
                                                        <thead>
                                                            <tr class="bg-success">
                                                                <th style="font-weight:bold;">Total Pembayaran Piutang</th>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modalTambahObatFaktur" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO JURNAL
                        </h5>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-12">

                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">LIST JURNAL</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="row">

                                    <div class="form-wrap">


                                        <div class="row">

                                            <div class="col-md-6 mt-10">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">NO DOKUMEN</label>
                                                    <div class="col-md-9 has-error">
                                                        <input type="text" class="form-control" value="<?= $no_dokumen ?>" readonly id="no_dok1">
                                                        <input type="hidden" class="form-control " autocomplete="off" id="inFaktur">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-10">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">KATEGORI</label>
                                                    <div class="col-md-9 has-success ">
                                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inKategori" id="inKategori">

                                                            <option value="">PILIH</option>
                                                            <?php
                                                            foreach ($pelayanan as $row) :
                                                            ?>
                                                                <option value="<?php echo $row["id_akun"]; ?>"><?php echo $row["deskripsi"] . ' (' . $row["kode"] . ')'; ?></option>

                                                            <?php endforeach; ?>
                                                        </select>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-10">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3 mt-10">NO PK</label>
                                                    <div class="col-md-9 has-success">
                                                        <input type="text" class="form-control" autocomplete="off" id="inPK">

                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-10">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">SUB KATEGORI</label>
                                                    <div class="col-md-9 has-success ">
                                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inJenis" id="inJenis">

                                                        </select>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-10">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3 mt-10">DESKRIPSI</label>
                                                    <div class="col-md-9 has-success">
                                                        <textarea cols="5" rows="5" class="form-control" autocomplete="off" id="inDesk"></textarea>
                                                        <!-- <input type="text" class="form-control" autocomplete="off" id="inDesk"> -->

                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-10">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">LIST</label>
                                                    <div class="col-md-9 has-success ">
                                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inPelayanan" id="inPelayanan">

                                                        </select>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mt-10">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3 mt-10">NILAI</label>
                                                    <div class="col-md-9 has-success">
                                                        <input type="number" class="form-control" step="0.01" autocomplete="off" value="" id="inNilai">

                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-10">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">TIPE</label>
                                                    <div class="col-md-9 has-success ">
                                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inTipe" id="inTipe">

                                                            <option value="-" selected>-</option>
                                                            <option value="DEBIT">DEBIT</option>
                                                            <option value="KREDIT">KREDIT</option>

                                                        </select>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" style="display: block;" class="btn btn-success mr-10" onclick="inserJurnalRupa()">TAMBAH AYAT JURNAL</button>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <div class="panel-heading">
                                                <div class="pull-left">
                                                    <h6 class="panel-title txt-dark">LIST JURNAL</h6>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="panel-wrapper collapse in">

                                                <div class="table-wrap">
                                                    <div class="table-responsive">
                                                        <table id="isiFaktur1" class="table table-hover display  pb-30">
                                                            <thead>
                                                                <tr class="bg-success">
                                                                    <th>NO</th>
                                                                    <th>REKENING</th>
                                                                    <th>DESKRIPSI</th>
                                                                    <th>PK</th>
                                                                    <th>DEBIT</th>
                                                                    <th>KREDIT</th>
                                                                    <th>DESKRIPSI REKENING</th>
                                                                    <th>HAPUS</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                                <tr class="bg-success">
                                                                    <th>NO</th>
                                                                    <th>REKENING</th>
                                                                    <th>DESKRIPSI</th>
                                                                    <th>PK</th>
                                                                    <th>DEBIT</th>
                                                                    <th>KREDIT</th>
                                                                    <th>DESKRIPSI REKENING</th>
                                                                    <th>HAPUS</th>
                                                                </tr>
                                                            </tfoot>

                                                            <tbody style="color: black; text-align: left;">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row mt-20" style="margin-left: 10px;">
                                                    <div class="col-md-6">


                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="table-responsive ">
                                                            <table class="table table-hover display " id="outTotalHarga">
                                                                <thead>
                                                                    <tr class="bg-success">
                                                                        <th style="font-weight:bold;">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="color: black">
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-20" style="margin-left: 10px;">
                                                    <div class="col-md-6">


                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="table-responsive ">

                                                            <table class="table table-hover display " id="outTotalHarga1">
                                                                <thead>
                                                                    <tr class="bg-success">
                                                                        <th style="font-weight:bold;">Total Debit</th>
                                                                        <th style="font-weight:bold;">Total Kredit</th>

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
                                    </div>

                                </div>
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


<style>
    td {
        color: black;
    }
</style>
<!--end modal edit-->
<script type="text/javascript">
    $('.modal-pendaftaranakun').on('hidden.bs.modal', function(e) {
        no_dok = $("#no_dok").val();

        $('#datable').DataTable().ajax.reload();
        reload_total_harga1(no_dok);
    });

    function tambah_detailx() {

        $(".modal-pendaftaranakun").modal('show');
    }

    function pilihKlaim(elem) {
        $.ajax({
            url: "<?= base_url() . 'Jurnal_utang_piutang/getVendor_piutang' ?>",
            type: 'POST',
            dataType: 'json',
            data: {
                klaim: elem,
            },
            success: function(data) {
                var html = '';
                var i;
                html = '<option>-</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].no_jurnal + '|' + data[i].pk + '>' + data[i].pk + '</option>';
                }
                $('#inVendor').html(html);
            }
        });

    }

    function getTotalInv(elem) {
        a = $('#inVendor').val();
        var splitDiag = a.split('|');
        vendor = splitDiag[0];
        inv = splitDiag[1];
        ket = $('#inKet').val();
        showLoader();
        $.ajax({
            url: "<?= base_url() . 'Jurnal_utang_piutang/getTotalInv' ?>",
            type: 'POST',
            dataType: 'json',
            data: {
                inv: inv,
                ket: ket,
            },

            success: function(data) {
                $('#inHarga1').val(data.total);
                hideLoader();
            }
            
        });

    }

    function showLoader(){
        const loader = document.getElementById("loader");

        loader.classList.remove('display1');
    }

    function hideLoader(){
        const loader = document.getElementById("loader");

        loader.classList.add('display1');
    }

    function cari() {
        a = $('#inVendor').val();
        var splitDiag = a.split('|');
        vendor = splitDiag[0];
        inv = splitDiag[1];

        $('#table_vendor').dataTable().fnClearTable();
        $('#table_vendor').dataTable().fnDestroy();
        $('#table_vendor').DataTable({
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
                "url": '<?php echo base_url('Jurnal_utang_piutang/tampil_pasien_by_inv'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: vendor
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
        $("#collap_vendor").collapse('toggle');
        reload_total_harga(inv);

    }

    function pilih_list_faktur(id_detail, total) {
        $("#upId").val(id_detail);
        $("#inTotal").val(total);
        $("#inHarga").val(total);
        $("#collap_obat_faktur1").collapse('toggle');
    }

    function insertObatFaktur() {
        id_faktur = $("#upId").val();
        harga = $("#inHarga").val();
        tipe = $('#inTipe').val();
        a = $('#inVendor').val();
        var splitDiag = a.split('|');
        no_jurnal = splitDiag[0];
        inv = splitDiag[1];
        no_dok = $("#no_dok").val();
        // alert(total);
        swal({
            title: "Warning?",
            text: "Apakah kamu yakin menyimpan pembayaran sebesar " + convertCurenncy(harga) + "?",
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
                    url: "<?= base_url() . 'Jurnal_utang_piutang/insertdetail_piutang' ?>",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        idFaktur: id_faktur,
                        harga: harga,
                        invoice: inv,
                        vendor: tipe,
                        no_jurnal: no_jurnal,
                        no_dok: no_dok

                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "FAKTUR Berhasil ditambahkan",
                                confirmButtonColor: "#3cb878",
                            });
                            $("#collap_obat_faktur1").collapse('hide');
                            $("#upId").val("");
                            $("#inHarga").val("");
                            $('#outTotalHarga').DataTable().ajax.reload();
                            $('#table_vendor').DataTable().ajax.reload();

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



    function simpan_bundle() {
        no_dok = $("#no_dok").val();
        tipe = $('#inTipe').val();
        a = $('#inVendor').val();
        var splitDiag = a.split('|');
        no_jurnal = splitDiag[0];
        inv = splitDiag[1];
        harga = $("#inHarga1").val();
        ket = $("#inKet").val();
        // alert(total);
        swal({
            title: "Warning?",
            text: "Apakah kamu yakin menyimpan pembayaran sebesar " + convertCurenncy(harga) + "?",
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
                    url: "<?= base_url() . 'Jurnal_utang_piutang/simpan_bundle_piutang' ?>",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        invoice: inv,
                        vendor: tipe,
                        harga: harga,
                        no_jurnal: no_jurnal,
                        no_dok: no_dok,
                        ket: ket,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Invoice " + inv + " Berhasil Disimpan",
                                confirmButtonColor: "#3cb878",
                                confirmButtonText: "OK",
                            });
                            $(".modal-pendaftaranakun").modal('hide');
                            $('#datable').DataTable().ajax.reload();
                            reload_total_harga1(no_dok);
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

    function hapus(id) {

        $.ajax({
            url: "<?= base_url() . 'Jurnal_utang_piutang/hapus_pembayaran_piutang' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id: id,

            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil Dihapus",
                        confirmButtonColor: "#3cb878",
                        confirmButtonText: "OK",
                    });
                    $('#datable').DataTable().ajax.reload();
                    reload_total_harga1(no_dok);
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

    function reload_total_harga(id_faktur) {
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
                "url": '<?php echo base_url('Jurnal_utang_piutang/tampil_total_piutang'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: id_faktur
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

    function reload_total_harga1(id_faktur) {
        $('#outTotalHarga1').dataTable().fnClearTable();
        $('#outTotalHarga1').dataTable().fnDestroy();
        $('#outTotalHarga1').DataTable({
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
                "url": '<?php echo base_url('Jurnal_utang_piutang/tampil_total_piutang_by_no'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: id_faktur
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
        no_dok = $("#no_dok").val();

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
                "url": '<?= base_url('Jurnal_utang_piutang/tampil_pembayaran_piutang_by_no'); ?>',
                "type": 'POST',
                "data": {
                    no_dok: $("#no_dok").val(),

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
        reload_total_harga1(no_dok);

    });
</script>
<script>
    function tambah_jurnal() {
        // alert(no_dokumen);
        no_dokumen = $("#no_dok1").val();
        $('#inPelayanan').val('01').change();
        $("#modalTambahObatFaktur").modal('show');

        reload_isi_list_faktur(no_dokumen);
        reload_total_dk(no_dokumen);
        reload_total(no_dokumen);
    }
    $('#modalTambahObatFaktur').on('hidden.bs.modal', function() {
        $("#inDesk").val('');
        $("#inPK").val('');
        $("#tbh_vendor").collapse('hide');
        $('#datable').DataTable().ajax.reload();

    })
    //end

    function reload_isi_list_faktur(idFaktur) {

        $('#isiFaktur1').dataTable().fnClearTable();
        $('#isiFaktur1').dataTable().fnDestroy();
        $('#isiFaktur1').DataTable({
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
                "url": '<?php echo base_url('Pembayaran_piutang/tampil_detail_jurnal'); ?>',
                "type": 'POST',
                "data": {
                    idFaktur: idFaktur,
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

    function insertJurnalRupa() {

        pelayanan = $("#inPelayanan").val();
        kategori = $('#inKategori').val();
        id_jenis = $("#inJenis").val();
        deskripsi = $("#inDesk").val();
        pk = $("#inPK").val();
        nilai = $("#inNilai").val();
        tipe = $("#inTipe").val();
        id_jurnal = $("#no_dok1").val();
        vendor = $("#inVendor").val();
        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pembayaran_piutang/insert_detail_jurnal_rupa",
                method: "POST",
                dataType: 'json',
                data: {
                    id_jurnal: id_jurnal,
                    pelayanan: pelayanan,
                    kategori: kategori,
                    id_jenis: id_jenis,
                    deskripsi: deskripsi,
                    pk: pk,
                    nilai: nilai,
                    tipe: tipe,
                    vendor: vendor,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil ditambahkan",
                            confirmButtonColor: "#3cb878",
                        });
                        $("#inPelayanan").val('01').change();
                        $("#inKategori").val('').change();
                        // $("#inDesk").val('');
                        // $("#inPK").val('');
                        $("#inNilai").val('');
                        $("#inTipe").val('-').change();
                        $('#isiFaktur1').DataTable().ajax.reload();
                        $('#outTotalHarga').DataTable().ajax.reload();
                        $('#outTotalHarga1').DataTable().ajax.reload();

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
</script>
<!--end tampil data-->