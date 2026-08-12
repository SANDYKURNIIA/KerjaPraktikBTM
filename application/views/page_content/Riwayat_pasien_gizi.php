<<<<<<< HEAD
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<div class="panel panel-default card-view mt-20 ">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR PASIEN
                    GIZI</span></h6>
        </div>

        <div class="clearfix"></div>
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
                                <th>DATA DIET</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>RUANG INAP</th>
                                <th>JENIS KLAIM</th>
                                <!-- <th>BENTUK MAKANAN</th> -->
                                <th>DIAGNOSA</th>
                                <!-- <th>KETERANGAN</th> 
								<th>DOKTER DPJP\</th> -->
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>DATA DIET</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>RUANG INAP</th>
                                <th>JENIS KLAIM</th>
                                <!-- <th>BENTUK MAKANAN</th> -->
                                <th>DIAGNOSA</th>
                                <!-- <th>KETERANGAN</th>
								<th>DOKTER DPJP</th> -->
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
        <div class="modal fade" id="modal_checkout" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display:none;">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">
                                CHECKOUT PASIEN - <span id="namaPasien"></span>
                            </h6>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div style="margin-left:1-em" class="form-body mt-20">
                            <form action="" id="formCheckout">
                                <input type="hidden" id='idHisto'>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="" class="control-label col-md-12">KETERANGAN</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <select name="ketKeluar" class='form-control select2' id="ketKeluar">
                                                <option value="DIIZINKAN PULANG">DI IZINKAN PULANG</option>
                                                <option value="DIRUJUK">DI RUJUK</option>
                                                <option value="PASIEN LARI">PASIEN LARI</option>
                                                <option value="PULANG PAKSA">PULANG PAKSA</option>
                                                <option value="Meninggal < 48 JAM">MENINGGAL KURANG DARI 48 JAM</option>
                                                <option value="Meninggal > 48 JAM">MENINGGAL LEBIH DARI 48 JAM</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="clearfix">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <button type="submit" class="btn btn-success btn-square" onclick="btnYakin();" id="btnYakin">YAKIN</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <button class="btn btn-secondary btn-square" id="btnBatal" data-dismiss="modal">TIDAK</button>
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
        <div class="modal fade" id="modal_antrian" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <div class="pull-left">

                        </div>
                        <div class="clearfix"></div>

                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <form id="formAntrian">

                                <div class="modal-body mt-30">
                                    <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>LIST DIET</h6>
                                    <hr width="95%">
                                    <div class="table-wrap" style="width: 100%; margin: auto ">
                                        <div class="table-responsive">
                                            <table class="table table-hover display  pb-60" id="tabletindakan">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>CETAK</th>
                                                        <th>EDIT</th>
                                                        <th></th>
                                                        <th>DIET</th>
                                                        <th>KETERANGAN</th>
                                                        <th>TANGGAL</th>
                                                        <th>NAMA STAFF</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="color: black">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="modal-body collapse" id="edit">
                        <div class="form-body">
                            <form id="formAntrian">
                                <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="ti-layout-media-right-alt mr-10"></i> FORM EDIT DIET
                                </h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left">DIET</label>
                                            <input type="text" class="form-control" name="diet" id="up_diet">
                                            <input type="hidden" class="form-control" name="up_id_form" id="up_id_form">
                                            <input type="hidden" class="form-control" name="up_id_pelayanan" id="up_id_pelayanan">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left">KETERANGAN</label>
                                            <input type="text" class="form-control" name="keterangan" id="up_keterangan">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="inPelAntri">

                                    <div type="submit" class="btn btn-success mr-10" onclick="edit_data()">EDIT
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /formbody -->
</div>




<!-- </?php $this->load->view('page_content/Form_ok'); ?> -->
<!-- <div id="div_result" style="display: none;"></div> -->
<style>
    td {
        color: black;
    }

    .zoom:active {
        position: relative;
        overflow: hidden;
        transition: all .3s ease-in-out;
        -webkit-transform: scale(6.5);
        transform: scale(6.5);
    }
</style>

<script type="text/javascript">
    function edit_data_tindakan(id_form) {
        $("#edit").collapse('toggle');
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/getData_gizi' ?>",
            data: {
                id_form: id_form,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {

                    // $("#idPelayanan").val(id_pelayanan);
                    $("#up_diet").val(data.diet);
                    $("#up_id_form").val(data.id_form);
                    $("#up_keterangan").val(data.keterangan);
                    // $("#inDPJP").val(data.data['dpjp']).change();
                    // $("#modal_edit_").modal('show');

                    // $("#modal_antrian").modal('show');
                    // reload_data_diet(data.id_pelayanan);


                    // reload_data_tindakan(id_pelayanan);
                    // reload_total_harga_tindakan(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }
    //Data Diet
    function reload_data_diet(id_pelayanan) {
        $('#tabletindakan').dataTable().fnClearTable();
        $('#tabletindakan').dataTable().fnDestroy();
        $('#tabletindakan').DataTable({
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
                "url": '<?php echo base_url('Rawatinap/tampil_data_riwayat'); ?>',
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
    //Obat
    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }
</script>

<script type="text/javascript">
    function data_gizi(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/getDataPasien' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {

                if (data.status_dt == "found") {
                    //disini set datanya ke modal
                    $("#nomorkartu").val(data.no_bpjs.padStart(13, "0"));
                    $("#no_rm").val(data.no_rm);
                    $("#nama").val(data.nama);
                    $("#tgl_lahir").val(data.tgl_lahir);
                    $("#poli").val(data.poli);
                    $("#inPelAntri").val(id_pelayanan);
                    if (data.kdpoli_bpjs == 'RANAP') {
                        $("#kodepoli").val('BED').change();
                    } else {
                        $("#kodepoli").val(data.kdpoli_bpjs).change();
                    }

                    $("#modal_antrian").modal('show');
                    reload_data_diet(id_pelayanan);
                    $("#edit").collapse('hide');

                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function edit_data() {
        id_form = $('#up_id_form').val();
        id_pelayanan = $('#inPelAntri').val();
        diet = $('#up_diet').val();
        keterangan = $('#up_keterangan').val();
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/update_gizi' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_form: id_form,
                id_pelayanan: id_pelayanan,
                diet: diet,
                keterangan: keterangan,
            },
            success: function(data) {
                if (data.status == "success") {
                    // $('#formAntrian')[0].reset();
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data berhasil diubah",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#modal_antrian").modal('show');
                    reload_data_diet(id_pelayanan);
                    // $('#datable').DataTable().ajax.reload();
                    $("#edit").collapse('hide');

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
        return false;
    }

    function insert_data() {
        id_pelayanan = $('#inPelAntri').val();
        diet = $('#diet').val();
        keterangan = $('#keterangan').val();
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/insert_gizi' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_pelayanan: id_pelayanan,
                diet: diet,
                keterangan: keterangan,
            },
            success: function(data) {
                if (data.status == "success") {
                    // $('#formAntrian')[0].reset();
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data berhasil ditambahkan",
                        confirmButtonColor: "#3cb878",
                    });
                    reload_data_diet(id_pelayanan);
                    $('#diet').val('');
                    $('#keterangan').val('');
                    $("#modal_antrian").modal('show');
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
            // success: function(data) {
            // 	// if (data.status == "success") {
            // 	//     swal({
            // 	//         title: "good job!",
            // 	//         type: "success",
            // 	//         text: "Data Medical Check Up Pasien ini telah disimpan",
            // 	//         confirmButtonColor: "#3cb878",

            // 	//     });

            // 	//     $('#datable').DataTable().ajax.reload();
            // 	//     window.location.href = 'javascript:history.go(-1)';
            // 	$("#div_result").html(data);
            // 	var divContents = document.getElementById("div_result").innerHTML;
            // 	// var a = window.open('', '', 'height=500, width=500');
            // 	var a = window.open();
            // 	a.document.write('<html>');
            // 	// a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
            // 	a.document.write('<body >');
            // 	a.document.write(divContents);
            // 	a.document.write('</body>');
            // 	a.document.write('</html>');
            // 	setTimeout(function() { // wait until all resources loaded 
            // 		a.document.close(); // necessary for IE >= 10
            // 		a.focus(); // necessary for IE >= 10
            // 		a.print(); // change window to winPrint
            // 		a.close(); // change window to winPrint
            // 	}, 500);
            // } else {
            //     swal({
            //         title: "Gagal!",
            //         type: "warning",
            //         text: data.status,
            //         confirmButtonColor: "#3cb878",
            //     });
            // }
            // }
        });
        return false;
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
                "sSearch": "Pencarian:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },

            },
            "ajax": '<?php echo base_url('Rawatinap/tampil_data_riwayat_gizi'); ?>',
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


<script type="text/javascript">
    /*Typeahead Init*/


    function hapus_data_diet(id_form) { //utk hapus diet pasien
        id_pelayanan = $('#inPelAntri').val();
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Rawatinap/hapus_data_diett",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_form: id_form,
                        id_pelayanan: id_pelayanan,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                buttons: false,
                                timer: 800
                            });
                            $("#modal_antrian").modal('show');
                            reload_data_diet(id_pelayanan);
                            // $('#datable').DataTable().ajax.reload();
                            $("#edit").collapse('hide');
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

        });
        return false;
    }
=======
<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<div class="panel panel-default card-view mt-20 ">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR PASIEN
                    GIZI</span></h6>
        </div>

        <div class="clearfix"></div>
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
                                <th>DATA DIET</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>RUANG INAP</th>
                                <th>JENIS KLAIM</th>
                                <!-- <th>BENTUK MAKANAN</th> -->
                                <th>DIAGNOSA</th>
                                <!-- <th>KETERANGAN</th> 
								<th>DOKTER DPJP\</th> -->
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>DATA DIET</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>RUANG INAP</th>
                                <th>JENIS KLAIM</th>
                                <!-- <th>BENTUK MAKANAN</th> -->
                                <th>DIAGNOSA</th>
                                <!-- <th>KETERANGAN</th>
								<th>DOKTER DPJP</th> -->
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
        <div class="modal fade" id="modal_checkout" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display:none;">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">
                                CHECKOUT PASIEN - <span id="namaPasien"></span>
                            </h6>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div style="margin-left:1-em" class="form-body mt-20">
                            <form action="" id="formCheckout">
                                <input type="hidden" id='idHisto'>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="" class="control-label col-md-12">KETERANGAN</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <select name="ketKeluar" class='form-control select2' id="ketKeluar">
                                                <option value="DIIZINKAN PULANG">DI IZINKAN PULANG</option>
                                                <option value="DIRUJUK">DI RUJUK</option>
                                                <option value="PASIEN LARI">PASIEN LARI</option>
                                                <option value="PULANG PAKSA">PULANG PAKSA</option>
                                                <option value="Meninggal < 48 JAM">MENINGGAL KURANG DARI 48 JAM</option>
                                                <option value="Meninggal > 48 JAM">MENINGGAL LEBIH DARI 48 JAM</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="clearfix">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <button type="submit" class="btn btn-success btn-square" onclick="btnYakin();" id="btnYakin">YAKIN</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <button class="btn btn-secondary btn-square" id="btnBatal" data-dismiss="modal">TIDAK</button>
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
        <div class="modal fade" id="modal_antrian" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <div class="pull-left">

                        </div>
                        <div class="clearfix"></div>

                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <form id="formAntrian">

                                <div class="modal-body mt-30">
                                    <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>LIST DIET</h6>
                                    <hr width="95%">
                                    <div class="table-wrap" style="width: 100%; margin: auto ">
                                        <div class="table-responsive">
                                            <table class="table table-hover display  pb-60" id="tabletindakan">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>CETAK</th>
                                                        <th>EDIT</th>
                                                        <th></th>
                                                        <th>DIET</th>
                                                        <th>KETERANGAN</th>
                                                        <th>TANGGAL</th>
                                                        <th>NAMA STAFF</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="color: black">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="modal-body collapse" id="edit">
                        <div class="form-body">
                            <form id="formAntrian">
                                <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="ti-layout-media-right-alt mr-10"></i> FORM EDIT DIET
                                </h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left">DIET</label>
                                            <input type="text" class="form-control" name="diet" id="up_diet">
                                            <input type="hidden" class="form-control" name="up_id_form" id="up_id_form">
                                            <input type="hidden" class="form-control" name="up_id_pelayanan" id="up_id_pelayanan">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left">KETERANGAN</label>
                                            <input type="text" class="form-control" name="keterangan" id="up_keterangan">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="inPelAntri">

                                    <div type="submit" class="btn btn-success mr-10" onclick="edit_data()">EDIT
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /formbody -->
</div>




<!-- </?php $this->load->view('page_content/Form_ok'); ?> -->
<!-- <div id="div_result" style="display: none;"></div> -->
<style>
    td {
        color: black;
    }

    .zoom:active {
        position: relative;
        overflow: hidden;
        transition: all .3s ease-in-out;
        -webkit-transform: scale(6.5);
        transform: scale(6.5);
    }
</style>

<script type="text/javascript">
    function edit_data_tindakan(id_form) {
        $("#edit").collapse('toggle');
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/getData_gizi' ?>",
            data: {
                id_form: id_form,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {

                    // $("#idPelayanan").val(id_pelayanan);
                    $("#up_diet").val(data.diet);
                    $("#up_id_form").val(data.id_form);
                    $("#up_keterangan").val(data.keterangan);
                    // $("#inDPJP").val(data.data['dpjp']).change();
                    // $("#modal_edit_").modal('show');

                    // $("#modal_antrian").modal('show');
                    // reload_data_diet(data.id_pelayanan);


                    // reload_data_tindakan(id_pelayanan);
                    // reload_total_harga_tindakan(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }
    //Data Diet
    function reload_data_diet(id_pelayanan) {
        $('#tabletindakan').dataTable().fnClearTable();
        $('#tabletindakan').dataTable().fnDestroy();
        $('#tabletindakan').DataTable({
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
                "url": '<?php echo base_url('Rawatinap/tampil_data_riwayat'); ?>',
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
    //Obat
    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }
</script>

<script type="text/javascript">
    function data_gizi(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/getDataPasien' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {

                if (data.status_dt == "found") {
                    //disini set datanya ke modal
                    $("#nomorkartu").val(data.no_bpjs.padStart(13, "0"));
                    $("#no_rm").val(data.no_rm);
                    $("#nama").val(data.nama);
                    $("#tgl_lahir").val(data.tgl_lahir);
                    $("#poli").val(data.poli);
                    $("#inPelAntri").val(id_pelayanan);
                    if (data.kdpoli_bpjs == 'RANAP') {
                        $("#kodepoli").val('BED').change();
                    } else {
                        $("#kodepoli").val(data.kdpoli_bpjs).change();
                    }

                    $("#modal_antrian").modal('show');
                    reload_data_diet(id_pelayanan);
                    $("#edit").collapse('hide');

                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function edit_data() {
        id_form = $('#up_id_form').val();
        id_pelayanan = $('#inPelAntri').val();
        diet = $('#up_diet').val();
        keterangan = $('#up_keterangan').val();
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/update_gizi' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_form: id_form,
                id_pelayanan: id_pelayanan,
                diet: diet,
                keterangan: keterangan,
            },
            success: function(data) {
                if (data.status == "success") {
                    // $('#formAntrian')[0].reset();
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data berhasil diubah",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#modal_antrian").modal('show');
                    reload_data_diet(id_pelayanan);
                    // $('#datable').DataTable().ajax.reload();
                    $("#edit").collapse('hide');

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
        return false;
    }

    function insert_data() {
        id_pelayanan = $('#inPelAntri').val();
        diet = $('#diet').val();
        keterangan = $('#keterangan').val();
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/insert_gizi' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_pelayanan: id_pelayanan,
                diet: diet,
                keterangan: keterangan,
            },
            success: function(data) {
                if (data.status == "success") {
                    // $('#formAntrian')[0].reset();
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data berhasil ditambahkan",
                        confirmButtonColor: "#3cb878",
                    });
                    reload_data_diet(id_pelayanan);
                    $('#diet').val('');
                    $('#keterangan').val('');
                    $("#modal_antrian").modal('show');
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
            // success: function(data) {
            // 	// if (data.status == "success") {
            // 	//     swal({
            // 	//         title: "good job!",
            // 	//         type: "success",
            // 	//         text: "Data Medical Check Up Pasien ini telah disimpan",
            // 	//         confirmButtonColor: "#3cb878",

            // 	//     });

            // 	//     $('#datable').DataTable().ajax.reload();
            // 	//     window.location.href = 'javascript:history.go(-1)';
            // 	$("#div_result").html(data);
            // 	var divContents = document.getElementById("div_result").innerHTML;
            // 	// var a = window.open('', '', 'height=500, width=500');
            // 	var a = window.open();
            // 	a.document.write('<html>');
            // 	// a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
            // 	a.document.write('<body >');
            // 	a.document.write(divContents);
            // 	a.document.write('</body>');
            // 	a.document.write('</html>');
            // 	setTimeout(function() { // wait until all resources loaded 
            // 		a.document.close(); // necessary for IE >= 10
            // 		a.focus(); // necessary for IE >= 10
            // 		a.print(); // change window to winPrint
            // 		a.close(); // change window to winPrint
            // 	}, 500);
            // } else {
            //     swal({
            //         title: "Gagal!",
            //         type: "warning",
            //         text: data.status,
            //         confirmButtonColor: "#3cb878",
            //     });
            // }
            // }
        });
        return false;
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
                "sSearch": "Pencarian:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },

            },
            "ajax": '<?php echo base_url('Rawatinap/tampil_data_riwayat_gizi'); ?>',
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


<script type="text/javascript">
    /*Typeahead Init*/


    function hapus_data_diet(id_form) { //utk hapus diet pasien
        id_pelayanan = $('#inPelAntri').val();
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Rawatinap/hapus_data_diett",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_form: id_form,
                        id_pelayanan: id_pelayanan,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                buttons: false,
                                timer: 800
                            });
                            $("#modal_antrian").modal('show');
                            reload_data_diet(id_pelayanan);
                            // $('#datable').DataTable().ajax.reload();
                            $("#edit").collapse('hide');
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

        });
        return false;
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>