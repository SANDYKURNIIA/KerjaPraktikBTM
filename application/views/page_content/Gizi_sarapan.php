<style>
    /* button 1 */
    .button {
        display: inline-block;
        padding: 15px 25px;
        font-size: 24px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: blue;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
    }

    .button:hover {
        background-color: lightskyblue
    }

    .button:active {
        background-color: blue;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }

    /* button 2 */
    .button2 {
        display: inline-block;
        padding: 15px 25px;
        font-size: 24px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: red;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
    }

    .button2:hover {
        background-color: lightsalmon
    }

    .button2:active {
        background-color: red;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }

    /* button 3 */
    .button3 {
        display: inline-block;
        padding: 15px 25px;
        font-size: 24px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: green;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
        width: 20%;
        height: 80%;
    }

    .button3:hover {
        background-color: limegreen
    }

    .button3:active {
        background-color: green;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }
</style>
<!-- Row -->
<div class="panel panel-default card-view mt-20 ">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">DAFTAR PASIEN RAWAT
                    INAP SARAPAN</span></h6>
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
                                <th>INPUT SARAPAN</th>
                                <th>PRINT</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>RUANG INAP</th>
                                <th>CARA BAYAR</th>
                                <th>MENU SARAPAN</th>
                                <th>DIAGNOSA</th>
                                <th>KETERANGAN</th>
                                <th>DOKTER DPJP</th>
                            </tr>
                        </thead>
                    <tfoot>
                             <tr class="bg-success">
                                <th>NO</th>
                                <th>INPUT SARAPAN</th>
                                <th>PRINT</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>RUANG INAP</th>
                                <th>CARA BAYAR</th>
                                <th>MENU SARAPAN</th>
                                <th>DIAGNOSA</th>
                                <th>KETERANGAN</th>
                                <th>DOKTER DPJP</th>
                            </tr>
                    </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- modal edit data -->
    <div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel"><i class="fa fa-coffee mr-10"></i> INFO TINDAKAN SARAPAN
                    </h5>
                </div>

                <div class="modal-body mb-30">

                    <div class="form-wrap">
                        <!-- /formbody -->
                        <div class="form-body">
                            <div class="row mt-20">
                                    <div class="col-md-12 centered col-md-offset-1">
                                        <input type="hidden" id="id_tndk_gizi" name="idPelayanan">
                                        <input type="hidden" id="idHis" name="idHis">
                                        <input type="hidden" id="tgl_lahir" name="tgl_lahir">
                                        <input type="hidden" id="nama" name="nama">
                                        <input type="hidden" id="ruang" name="ruang">

                                        <?php
                                        foreach ($data_bentuk_sarapan as $row) :
                                        ?>
                                            <button class="button3 col-md-3" style="margin-right: 30px; margin-bottom: 30px; width: 10ch; height: 7ch" onclick="pilihMenu(<?php echo  "'" . $row['kelompok_menu'] . "'"; ?>)">
                                                <div class="panel panel-default card-view pa-0">
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="bg-yellow" style="width: 7ch; height: 5ch; ">
                                                            <h2> <strong>
                                                                    <font style="width: 5ch; height: 1ch; font-size: 0.9ch"> <?php echo  $row['kelompok_menu']; ?></font>
                                                                </strong> </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        <?php endforeach; ?>
                                    </div>
                            </div>
                            <div class="row mt-30">
                                <div class="col-md-12">
                                    <h6 class="txt-dark capitalize-font pl-40"><i class="icon-list mr-10"></i>DETAIL JENIS MAKANAN</h6>
                                    <hr width="90%">
                                </div>
                                <div class="col-md-12 centered col-md-offset-1" id="tampilMenu">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 centered col-md-offset-1" id="tampilMenu2">
                                </div>
                            </div>

                            <div class="col-xs-7 text-center data-wrap-right" id="outDataPasien" style="display: none">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td width="50%"><?php echo "NAMA LENGKAP";   ?></td>
                                            <td width="50%">
                                                <font id="nama_lengkap">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%"><?php echo "TANGGAL LAHIR";   ?></td>
                                            <td width="50%">
                                                <font id="tanggal_lahir">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%"><?php echo "NO REKAM MEDIS";   ?></td>
                                            <td width="50%">
                                                <font id="noRmm">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%"><?php echo "RUANG";   ?></td>
                                            <td width="50%">
                                                <font id="ruangg">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%"><?php echo "MENU SARAPAN";   ?></td>
                                            <td width="25%">
                                                <font id="bentuk_makanann">
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <br>
                                <center>ALAT MAKAN DIAMBIL +- 1 JAM SETELAH MAKAN DIANTAR</center>
                                <center>MAKANAN TIDAK DIJAMIN SEGAR SETELAH 1 JAM</center>
                                <center>SELAMAT MENIKMATI</center>
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
        function pilihMenu(menu) {
            id_gizi = $("#id_tndk_gizi").val();
            $.ajax({
                url: "<?= base_url() . 'Gizi/getMenu' ?>",
                method: "POST",
                data: {
                    menu: menu,
                    id_gizi: id_gizi
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    tes = $("#coba").val(data.id_gizi);
                    for (i = 0; i < data.length; i++) {
                        html += '<button class="button3 col-lg-3 col-md-3" onclick="insertSarapan(' + '\'' + data[i].nama_makanan + '\'' + ')" style="margin-right: 15px; margin-left: 30px; margin-bottom: 30px; width: 10ch; height: 9ch; " value=' + data[i].nama_makanan + '>' + '<font style="margin-bottom: 6ch ;width: 5ch; height: 1ch; font-size: 0.9ch">' + data[i].nama_makanan + '</font>' + '</button>';
                    }
                    $('#tampilMenu').html(html);
                    $('#tampilMenu2').html(tes);
                }
            });
        }

        function insertSarapan(menu) {

            $.ajax({
                url: "<?= base_url() . 'Gizi/insert_sarapan' ?>",
                method: "POST",
                data: {
                    menu: menu
                },
                success: function(data) {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#datable').DataTable().ajax.reload();
                }
            });

        }

        function tambah_sarapan(id_pelayanan, id_history, no_rm, id_tindakan_gizi) {
            $.ajax({
                url: "<?= base_url() . 'Gizi/getMakanByNoRm' ?>",
                data: {
                    pelayanan: id_pelayanan,
                    history: id_history,
                    no_rm: no_rm,
                    id_tindakan_gizi: id_tindakan_gizi
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data.status_dt == "found") {
                        $("#tipe_masuk").val(data.jenis_pelayanan);
                        $("#inBentukMakanan").val(data.bentuk_makanan + "|" + data.harga).change();
                        $("#inDietMakanan").val(data.diet_makan).change();

                        $("#noRm").val(data.no_rm);
                        $("#nama").val(data.nama);
                        $("#ruang").val(data.poli);
                        $("#inTanggalKunjugan").val(data.tgl_masuk);
                        $("#id_tndk_gizi").val(id_tindakan_gizi);
                        $("#idHis").val(data.id_history);

                        $("#tgl_lahir").val(data.tgl_lahir);
                        $("#NamaPasien").val(data.nama).change();
                        $("#inAsalPasien").val(data.asal_pasien).change();
                        $("#inCaraBayar").val(data.id_cara_bayar).change();
                        $("#modal_edit_data").modal('show');
                        reload_data_makan(id_pelayanan, no_rm);
                    } else {
                        alert("data tidak ditemukan");
                    }
                }
            });
        }
    </script>
    <script type="text/javascript">
        function reload_data_makan(idPelayanan, no_rm) {
            $('#tableMakan').dataTable().fnClearTable();
            $('#tableMakan').dataTable().fnDestroy();
            $('#tableMakan').DataTable({
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
                    "url": '<?php echo base_url('Gizi/tampil_list_makanan'); ?>',
                    "type": 'POST',
                    "data": {
                        id_pelayanan: idPelayanan,
                        no_rm: no_rm
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
                "ajax": '<?php echo base_url('Gizi/tampil_data_gizi_sarapan'); ?>',
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
        function insertTambahGizi() {
            idPelayanan = $("#idPelayanan").val();
            diet_makanan = $("#inDietMakanan").val();
            // bentuk_makanan = $("#inBentukMakanan").val();

            keterangan_gizi = $("#keteranganSekarang").val();
            no_rm = $("#noRm").val();
            idHis = $("#idHis").val();

            a = $("#inBentukMakanan").val();
            splitDiag = a.split("|");

            bentuk_makanan = String(splitDiag[0]);
            a = $("#inBentukMakanan").val();
            splitDiag = a.split("|");

            harga = parseFloat(splitDiag[1]);

            frek = parseFloat($("#inJumlah").val());
            total = harga * frek;


            dataString = 'keterangan_gizi=' + keterangan_gizi + '&diet_makanan=' + diet_makanan + '&bentuk_makanan=' + bentuk_makanan +
                '&idPelayanan=' + idPelayanan + '&harga=' + harga + '&harga=' + harga + '&frek=' + frek + '&total=' + total;
            // 		  alert(dataString);
            if (bentuk_makanan == null || bentuk_makanan == "-") {
                swal({
                    title: "PILIH BENTUK MAKANAN DAHULU!",
                    type: "warning",

                    confirmButtonColor: "#3cb878",
                });
            } else if (diet_makanan == null || diet_makanan == "-") {
                swal({
                    title: "PILIH DIET MAKANAN DAHULU!",
                    type: "warning",

                    confirmButtonColor: "#3cb878",
                });
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url() . 'Gizi/updateTindakanGizi' ?>",
                    data: dataString,
                    success: function(data) {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Tindakan ini Telah di Simpan!",
                            confirmButtonColor: "#3cb878",
                        });
                        tambah_sarapan(idPelayanan, idHis, no_rm)
                        reload_data_makan(idPelayanan);
                    }
                });
            }
        }



        function cetak(id_tindakan_gizi) {
            idPelayanan = $("#idPelayanan").val();
            diet_makanan = $("#inDietMakanan").val();
            bentuk_makanan = $("#inBentukMakanan").val();
            keterangan_gizi = $("#keteranganSekarang").val();
            no_rm = $("#noRm").val();
            idHis = $("#idHis").val();
            tgl_lahir = $("#tgl_lahir").val();
            nama = $("#nama").val();
            ruang = $("#ruang").val();

            $.ajax({
                url: "<?= base_url() . 'Gizi/print_sarapan' ?>",
                data: {
                    idPelayanan: idPelayanan,
                    diet_makanan: diet_makanan,
                    id_tindakan_gizi: id_tindakan_gizi,
                    bentuk_makanan: bentuk_makanan,
                    keterangan_gizi: keterangan_gizi,
                    idHis: idHis,
                    tgl_lahir: tgl_lahir,
                    nama: nama,
                    no_rm: no_rm,
                    ruang: ruang,
                    id_tindakan_gizi: id_tindakan_gizi,

                },
                type: 'POST',
                dataType: 'json',
                success: function(html) {
                    document.getElementById("nama_lengkap").innerHTML = html.nama;
                    document.getElementById("ruangg").innerHTML = html.poli;
                    document.getElementById("tanggal_lahir").innerHTML = html.tgl_lahir;
                    document.getElementById("noRmm").innerHTML = html.no_rm;
                    document.getElementById("bentuk_makanann").innerHTML = html.menu_sarapan;

                    var printContents = document.getElementById("outDataPasien").innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;

                    window.print();
                    window.location.reload();

                    document.body.innerHTML = originalContents;


                }
            });
        }
    </script>