<<<<<<< HEAD
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">KLAIM</span></h6>
        </div>
        <div align="right">
            <div class="btn btn-success btn-anim  btn-sm " onclick="tampilTambahFaktur()"><i class="icon-rocket"></i><span class="btn-text">TAMBAH FAKTUR</span>
            </div>
        </div>
        <div class="clearfix"></div>


    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>


                            <tr>
                                <th rowspan="2">NO</th>
                                <th rowspan="2">SERAH TERIMA</th>
                                <th rowspan="2">FPK</th>
                                <th rowspan="2">TERIMA PEMBAYARAN</th>
                                <th colspan="4">PENGAJUAN BERITA ACARA BPJS</th>
                                <th colspan="2">RAWAT JALAN</th>
                                <th colspan="2">rawat inap</th>
                                <th colspan="2">SERAH TERIMA BERITA ACARA BPJS</th>
                                <th colspan="2">RAWAT JALAN</th>
                                <th colspan="2">rawat inap</th>
                                <th colspan="2">SERAH TERIMA FPK BPJS</th>
                                <th colspan="2">LAYAK RAWAT JALAN</th>
                                <th colspan="2">LAYAK rawat inap</th>
                                <th colspan="2">Pending RAWAT JALAN</th>
                                <th colspan="2">pending rawat inap</th>
                                <th colspan="2">TIdak LAYAK RAWAT JALAN</th>
                                <th colspan="2">TIDAK LAYAK rawat inap</th>
                                <th colspan="2">DISPUITE RAWAT JALAN</th>
                                <th colspan="2">DISPUITE rawat inap</th>
                                <th colspan="3">DI TERIMA </th>


                            </tr>
                            <tr>

                                <th>BULAN PENGAJUAN</th>
                                <th>BULAN PELAYANAN</th>
                                <th>NO BA</th>
                                <th>TANGGAL BA</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>NO BA SERAH TERIMA</th>
                                <th>TANGGAL BA SERAH TERIMA</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>NO FPK</th>
                                <th>TANGGAL FPK</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Masuk Rekening Tgl</th>
                                <th>Σ Rp Rawat Jalan </th>
                                <th>Σ Rp Rawat Inap </th>

                            </tr>


                        </thead>

                    </table>
                    <span id="hasil"></span>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('page_content/Modal_klaim') ?>


    <style>
        td {
            color: black;
        }
    </style>



    <script type="text/javascript">
        function tampilTambahFaktur() {
            $("#modal_edit_faktur").modal('show');
        }

        function tindakanST(id_klaim) {
            $("#idKlaim").val(id_klaim);
            $("#serah_terima").modal('show');
        }
        function tindakanFpk(id_klaim) {
            $("#idKlaim").val(id_klaim);
            $("#modal_fpk").modal('show');
        }
        function tindakanTP(id_klaim) {
            $("#idKlaim").val(id_klaim);
            $("#terima_pembayaran").modal('show');
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
                "ajax": '<?php echo base_url('Casemix/tampil_klaim'); ?>',
                "deferRender": true,
                "processing": true,
                "order": [],
                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                }, ],
            });
        });
=======
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">KLAIM</span></h6>
        </div>
        <div align="right">
            <div class="btn btn-success btn-anim  btn-sm " onclick="tampilTambahFaktur()"><i class="icon-rocket"></i><span class="btn-text">TAMBAH FAKTUR</span>
            </div>
        </div>
        <div class="clearfix"></div>


    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>


                            <tr>
                                <th rowspan="2">NO</th>
                                <th rowspan="2">SERAH TERIMA</th>
                                <th rowspan="2">FPK</th>
                                <th rowspan="2">TERIMA PEMBAYARAN</th>
                                <th colspan="4">PENGAJUAN BERITA ACARA BPJS</th>
                                <th colspan="2">RAWAT JALAN</th>
                                <th colspan="2">rawat inap</th>
                                <th colspan="2">SERAH TERIMA BERITA ACARA BPJS</th>
                                <th colspan="2">RAWAT JALAN</th>
                                <th colspan="2">rawat inap</th>
                                <th colspan="2">SERAH TERIMA FPK BPJS</th>
                                <th colspan="2">LAYAK RAWAT JALAN</th>
                                <th colspan="2">LAYAK rawat inap</th>
                                <th colspan="2">Pending RAWAT JALAN</th>
                                <th colspan="2">pending rawat inap</th>
                                <th colspan="2">TIdak LAYAK RAWAT JALAN</th>
                                <th colspan="2">TIDAK LAYAK rawat inap</th>
                                <th colspan="2">DISPUITE RAWAT JALAN</th>
                                <th colspan="2">DISPUITE rawat inap</th>
                                <th colspan="3">DI TERIMA </th>


                            </tr>
                            <tr>

                                <th>BULAN PENGAJUAN</th>
                                <th>BULAN PELAYANAN</th>
                                <th>NO BA</th>
                                <th>TANGGAL BA</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>NO BA SERAH TERIMA</th>
                                <th>TANGGAL BA SERAH TERIMA</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>NO FPK</th>
                                <th>TANGGAL FPK</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Σ KLAIM </th>
                                <th>Σ RP</th>
                                <th>Masuk Rekening Tgl</th>
                                <th>Σ Rp Rawat Jalan </th>
                                <th>Σ Rp Rawat Inap </th>

                            </tr>


                        </thead>

                    </table>
                    <span id="hasil"></span>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('page_content/Modal_klaim') ?>


    <style>
        td {
            color: black;
        }
    </style>



    <script type="text/javascript">
        function tampilTambahFaktur() {
            $("#modal_edit_faktur").modal('show');
        }

        function tindakanST(id_klaim) {
            $("#idKlaim").val(id_klaim);
            $("#serah_terima").modal('show');
        }
        function tindakanFpk(id_klaim) {
            $("#idKlaim").val(id_klaim);
            $("#modal_fpk").modal('show');
        }
        function tindakanTP(id_klaim) {
            $("#idKlaim").val(id_klaim);
            $("#terima_pembayaran").modal('show');
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
                "ajax": '<?php echo base_url('Casemix/tampil_klaim'); ?>',
                "deferRender": true,
                "processing": true,
                "order": [],
                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                }, ],
            });
        });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
    </script>