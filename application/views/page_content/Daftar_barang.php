<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR BARANG</span></h6>
        </div>
        <div align="right">
            <div class="btn btn-primary btn-anim  btn-md " data-toggle="modal" data-target="#modal_tambah_barang" style="margin-right: 40px;"><i class="icon-rocket"></i><span class="btn-text">TAMBAH MASTER</span>
                <div></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display  pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>EDIT</th>
                                <th>MUTASI</th>
                                <th>PEMBELIAN</th>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>SATUAN</th>
                                <th>KELOMPOK</th>
                                <th>HARGA</th>
                                <th>JENIS BEBAN</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>EDIT</th>
                                <th>MUTASI</th>
                                <th>PEMBELIAN</th>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>SATUAN</th>
                                <th>KELOMPOK</th>
                                <th>HARGA</th>
                                <th>JENIS BEBAN</th>
                                <th>STATUS</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="modal_tambah_barang" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TAMBAH DATA MASTER
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-wrap">
                        <!-- /formbody -->
                        <div class="form-body mt-10 mb-30">
                            <div class="row">
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA BARANG</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" autocomplete="off" placeholder="NAMA BARANG" id="inNama">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">SATUAN</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="inSatuan">

                                                <?php
                                                foreach ($satuan as $row) {
                                                ?>
                                                    <option value="<?php echo  $row['satuan']; ?>"><?php echo $row["satuan"]; ?></option>
                                                <?php }  ?>

                                                <option value="PACK"><?php echo "PACK"; ?></option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <!--/span-->
                                <div class="col-md-6 mt-10">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">HARGA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="number" class="form-control " autocomplete="off" placeholder="HARGA" id="inHarga">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6 mt-10">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">KELOMPOK</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="inGolongan">

                                                <?php
                                                foreach ($tipe as $row) {
                                                ?>
                                                    <option value="<?php echo  $row['tipe']; ?>"><?php echo $row["tipe"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!-- /Row -->
                            <div class="row">

                                <!--/span-->
                                <div class="col-md-6 mt-10">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">JENIS BEBAN</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="inJenis">

                                                <?php
                                                foreach ($jenis_beban as $row) {
                                                ?>
                                                    <option value="<?php echo  $row['jenis_beban']; ?>"><?php echo $row["jenis_beban"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                     <div class="row">
                                         <div class="col-md-offset-3 ml-1 col-md-9">
                                             <button type="submit" class="btn btn-success mr-10 btn-anim" onclick="insertBarang()"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</button>
                                            <span></span>
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
    <div class="modal fade bs-example-modal-lg" id="modal_edit_barang" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT DATA BARANG
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-wrap">
                        <!-- /formbody -->
                        <div class="form-body">
                            <div class="row mt-10">
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA BARANG</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" autocomplete="off" placeholder="NAMA BARANG" id="upNama">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 mt-10">SATUAN</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="upSatuan">
                                                <?php
                                                foreach ($satuan as $row) {

                                                ?>
                                                    <option value="<?php echo  $row['satuan']; ?>"><?php echo $row["satuan"]; ?></option>
                                                <?php }  ?>

                                                <option value="PACK"><?php echo "PACK"; ?></option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-6 mt-10">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 mt-10">HARGA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="number" class="form-control" autocomplete="off" placeholder="HARGA" id="upHarga">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6 mt-10">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 mt-10">KELOMPOK</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" id="upGolongan">

                                                <?php
                                                foreach ($tipe as $row) {

                                                ?>
                                                    <option value="<?php echo  $row['tipe']; ?>"><?php echo $row["tipe"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!-- /Row -->
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-6 mt-10">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">JENIS BEBAN</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input  select2" id="upJenis">

                                                <?php
                                                foreach ($jenis_beban as $row) {
                                                ?>
                                                    <option value="<?php echo  $row['jenis_beban']; ?>"><?php echo $row["jenis_beban"]; ?></option>
                                                <?php }  ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 mt-10">STATUS</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input  select2" id="upStatus">
                                                <option value="TIDAK AKTIF"><?php echo "TIDAK AKTIF"; ?></option>
                                                <option value="AKTIF"><?php echo "AKTIF"; ?></option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Row -->

                        </div>

                        <!--/span-->

                        <!-- row -->
                        <div class="form-actions mt-10 mb-20">
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6"> </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <input type="hidden" class="form-control" autocomplete="off" id="upId">
                                                <button onclick="updateBarang()" class="btn btn-success btn-anim  btn-sm ml-10 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                                <span></span>
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

    <div class="modal fade bs-example-modal-lg" id="modal_mutasi" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> MUTASI BARANG
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="table-wrap mt-20 mb-40" style="width: 95%; margin: auto ">
                        <div class="table-responsive">
                            <table id="tabelMutasi" class="table table-hover display  pb-30">
                                <thead>
                                    <tr class="bg-success">
                                        <th>NO</th>
                                        <th>JENIS TRANSAKSI</th>
                                        <th>NAMA BARANG</th>
                                        <th>UNIT</th>
                                        <th>JUMLAH</th>
                                        <th>SATUAN</th>
                                        <th>BEBAN</th>
                                        <th>HARGA</th>
                                        <th>TOTAL</th>
                                        <th>TANGGAL TERIMA</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-success">
                                        <th>NO</th>
                                        <th>JENIS TRANSAKSI</th>
                                        <th>NAMA BARANG</th>
                                        <th>UNIT</th>
                                        <th>JUMLAH</th>
                                        <th>SATUAN</th>
                                        <th>BEBAN</th>
                                        <th>HARGA</th>
                                        <th>TOTAL</th>
                                        <th>TANGGAL TERIMA</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="modal_pembelian" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> LIST PEMBELIAN
                    </h5>
                </div>
                <div class="modal-body">
                <div class="table-wrap mt-10 mb-40" style="width: 95%; margin: auto ">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="tabelPembelian" class="table table-hover display">
                                <thead>
                                    <tr class="bg-success">
                                        <th>NO</th>
                                        <th>NO DOKUMEN</th>
                                        <th>NO FAKTUR</th>
                                        <th>DISTRIBUTOR</th>
                                        <th>NAMA BARANG</th>
                                        <th>SATUAN</th>
                                        <th>PP</th>
                                        <th>TERIMA</th>
                                        <th>SISA</th>
                                        <th>HARGA </th>
                                        <th>DISKON </th>
                                        <th>PPN </th>
                                        <th>TOTAL</th>
                                        <th>TGL TERIMA</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-success">
                                        <th>NO</th>
                                        <th>NO DOKUMEN</th>
                                        <th>NO FAKTUR</th>
                                        <th>DISTRIBUTOR</th>
                                        <th>NAMA BARANG</th>
                                        <th>SATUAN</th>
                                        <th>PP</th>
                                        <th>TERIMA</th>
                                        <th>SISA</th>
                                        <th>HARGA </th>
                                        <th>DISKON </th>
                                        <th>PPN </th>
                                        <th>TOTAL</th>
                                        <th>TGL TERIMA</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<style>
    td{
        color:black;
    }
</style>
<script type="text/javascript">
    function insertBarang() {
        nama = ($("#inNama").val());
        golongan = ($("#inGolongan").val());
        tipe = ($("#inSatuan").val());
        harga = parseFloat($("#inHarga").val());
        jenis = ($("#inJenis").val());
        var ID = Math.random().toString(36).substr(2, 16);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Logistik_umum/tambah_barang",
            dataType: 'json',
            data: {
                id: ID,
                nama: nama,
                golongan: golongan,
                tipe: tipe,
                harga: harga,
                jenis: jenis,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil ditambahkan",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#inNama").val("");
                    $("#inGolongan").val("");
                    $("#inSatuan").val("");
                    $("#inHarga").val("");
                    $("#inJenis").val("");

                    $("#modal_tambah_barang").modal('hide');
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
        })
    }

    function tampilEditBarang(id_list) {
        $.ajax({
            url: "<?php echo base_url() ?>Logistik_umum/getDataBarang",
            data: {
                id_list: id_list,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    $("#upNama").val(data.nama);
                    $("#upGolongan").val(data.tipe).change();
                    $("#upSatuan").val(data.satuan).change();
                    $("#upHarga").val(data.harga);
                    $("#upJenis").val(data.jenis_beban).change();
                    $("#upStatus").val(data.status).change();
                    $("#upId").val(data.id_list);

                    $("#modal_edit_barang").modal('show');
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function updateBarang() {
        nama = ($("#upNama").val());
        golongan = ($("#upGolongan").val());
        tipe = ($("#upSatuan").val());
        harga = parseFloat($("#upHarga").val());
        jenis = ($("#upJenis").val());
        status = ($("#upStatus").val());
        id = ($("#upId").val());

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Logistik_umum/edit_barang",
            dataType: 'json',
            data: {
                id: id,
                nama: nama,
                golongan: golongan,
                tipe: tipe,
                harga: harga,
                jenis: jenis,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil ditambahkan",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#upNama").val("");
                    $("#upGolongan").val("");
                    $("#upSatuan").val("");
                    $("#upHarga").val("");
                    $("#upJenis").val("");
                    $("#upStatus").val("");
                    $("#modal_edit_barang").modal('hide');
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
        })
    }

    function tampilKunjungan(id_list) {
        reload_mutasi(id_list);
        $("#modal_mutasi").modal('show');
    }
    function tampilKunjunganPembelian(id_list) {
        reload_pembelian(id_list);
        $("#modal_pembelian").modal('show');
    }

    function reload_mutasi(id_list) {
        $('#tabelMutasi').dataTable().fnClearTable();
        $('#tabelMutasi').dataTable().fnDestroy();
        $('#tabelMutasi').DataTable({
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
                "url": '<?php echo base_url('Logistik_umum/tampil_mutasi'); ?>',
                "type": 'POST',
                "data": {
                    id_list: id_list
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
    function reload_pembelian(id_list) {
        $('#tabelPembelian').dataTable().fnClearTable();
        $('#tabelPembelian').dataTable().fnDestroy();
        $('#tabelPembelian').DataTable({
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
                "url": '<?php echo base_url('Logistik_umum/tampil_pembelian'); ?>',
                "type": 'POST',
                "data": {
                    id_list: id_list
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
            "ajax": '<?php echo base_url('Logistik_umum/tampil_master_barang'); ?>',
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