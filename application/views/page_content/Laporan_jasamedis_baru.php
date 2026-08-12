<<<<<<< HEAD
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN JASMED DAN SARANA SETELAH REALISASI</span></h6>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">
            <div class="col-md-12">
                <!-- <div class="col-md-3 mt-20 pl-5">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div> -->
                <div class="col-md-2">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-2">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
                </div>
                <div class="col-md-2">
                    <label class="mt-0 txt-dark">Jenis Laporan :</label>
                    <select class="form-control select2" placeholder="Choose a Category" name="jenis_jurnal" id="jenis_jurnal">
                        <option value="-">All</option>
                        <option value="per dokter">DOKTER</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="mt-0 txt-dark">Jenis Pelayanan :</label>
                    <select class="form-control select2" placeholder="Choose a Category" name="jenis_pel" id="jenis_pel">
                        <option value="-">All</option>
                        <option value="rajal">RAWAT JALAN</option>
                        <option value="ranap">RAWAT INAP</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="mt-0 txt-dark">Dokter :</label>
                    <select class="form-control select2" placeholder="Choose a Category" name="inDokter" id="inDokter">
                        <option value="-">All</option>
                        <?php $db = $this->db->get_where('dokter', ['status' => 'aktif'])->result();
                        foreach ($db as $row) {
                        ?>
                            <option value="<?=$row->id_dokter?>"><?=$row->nama?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-3 mt-20">
                    <!-- <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span> -->
                    <button class="btn btn-info btn-anim btn-sm1 mr-10" onclick="cetak_pdf();"><i class="icon-rocket"></i><span class="btn-text">PDF</span>
                    <button class="btn btn-success btn-anim btn-sm1" onclick="export_excel();"><i class="icon-rocket"></i><span class="btn-text">ECEL</span>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TANGGAL MASUK</th>
                                <th>TANGGAL KELUAR</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>TINDAKAN</th>
                                <th>JASA DOKTER</th>
                                <th>FREK</th>
                                <th>JUMLAH</th>
                                <th>CARA BAYAR</th>
                                <th>DOKTER</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TANGGAL MASUK</th>
                                <th>TANGGAL KELUAR</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>TINDAKAN</th>
                                <th>JASA DOKTER</th>
                                <th>FREK</th>
                                <th>JUMLAH</th>
                                <th>CARA BAYAR</th>
                                <th>DOKTER</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div> -->
</div>

<style>
    td {
        color: black;
    }
</style>



<script type="text/javascript">
    function tampilRangePermit(mulai, akhir) {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        jenis_pelayanan = $("#jenis_pelayanan").val();
        jenis_klaim = $("#jenis_klaim").val();
        $('#datable').DataTable({
            "retrieve": true,
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel'],
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
                "url": '<?= base_url($url); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,
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

    function cetak_pdf() {
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        jenis_jurnal = $("#jenis_jurnal").val();
        jenis_pel = $("#jenis_pel").val();
        dokter = $("#inDokter").val();
        if (jenis_jurnal == '-') {
            window.open('<?= base_url('Jasamedis/cetak_detail_pdf/'); ?>' + mulai + '/' + akhir + '/' + jenis_pel, '_blank');
        } else {
            if(dokter =='-'){
                window.open('<?= base_url('Jasamedis/cetak_detail_pdf_dokter/'); ?>' + mulai + '/' + akhir + '/' + jenis_pel, '_blank');
            }else{
            window.open('<?= base_url('Jasamedis/cetak_pasien_dokter/'); ?>' + mulai + '/' + akhir+ '/' + dokter + '/' + jenis_pel, '_blank');
            }
        }
    }
    function export_excel() {
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        jenis_jurnal = $("#jenis_jurnal").val();
        dokter = $("#inDokter").val();
        if (jenis_jurnal == '-') {
            window.open('<?= base_url('Jasamedis/cetak_detail_excel/'); ?>' + mulai + '/' + akhir + '/' + jenis_pel, '_blank');
        } else {
            if(dokter =='-'){
                window.open('<?= base_url('Jasamedis/cetak_detail_excel_dokter/'); ?>' + mulai + '/' + akhir + '/' + jenis_pel, '_blank');
            }else{
            window.open('<?= base_url('Jasamedis/cetak_pasien_dokter_excel/'); ?>' + mulai + '/' + akhir+ '/' + dokter + '/' + jenis_pel, '_blank');
            }
        }
    }
=======
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN JASMED DAN SARANA SETELAH REALISASI</span></h6>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">
            <div class="col-md-12">
                <!-- <div class="col-md-3 mt-20 pl-5">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div> -->
                <div class="col-md-2">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-2">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
                </div>
                <div class="col-md-2">
                    <label class="mt-0 txt-dark">Jenis Laporan :</label>
                    <select class="form-control select2" placeholder="Choose a Category" name="jenis_jurnal" id="jenis_jurnal">
                        <option value="-">All</option>
                        <option value="per dokter">DOKTER</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="mt-0 txt-dark">Jenis Pelayanan :</label>
                    <select class="form-control select2" placeholder="Choose a Category" name="jenis_pel" id="jenis_pel">
                        <option value="-">All</option>
                        <option value="rajal">RAWAT JALAN</option>
                        <option value="ranap">RAWAT INAP</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="mt-0 txt-dark">Dokter :</label>
                    <select class="form-control select2" placeholder="Choose a Category" name="inDokter" id="inDokter">
                        <option value="-">All</option>
                        <?php $db = $this->db->get_where('dokter', ['status' => 'aktif'])->result();
                        foreach ($db as $row) {
                        ?>
                            <option value="<?=$row->id_dokter?>"><?=$row->nama?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-3 mt-20">
                    <!-- <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span> -->
                    <button class="btn btn-info btn-anim btn-sm1 mr-10" onclick="cetak_pdf();"><i class="icon-rocket"></i><span class="btn-text">PDF</span>
                    <button class="btn btn-success btn-anim btn-sm1" onclick="export_excel();"><i class="icon-rocket"></i><span class="btn-text">ECEL</span>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TANGGAL MASUK</th>
                                <th>TANGGAL KELUAR</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>TINDAKAN</th>
                                <th>JASA DOKTER</th>
                                <th>FREK</th>
                                <th>JUMLAH</th>
                                <th>CARA BAYAR</th>
                                <th>DOKTER</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TANGGAL MASUK</th>
                                <th>TANGGAL KELUAR</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>TINDAKAN</th>
                                <th>JASA DOKTER</th>
                                <th>FREK</th>
                                <th>JUMLAH</th>
                                <th>CARA BAYAR</th>
                                <th>DOKTER</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div> -->
</div>

<style>
    td {
        color: black;
    }
</style>



<script type="text/javascript">
    function tampilRangePermit(mulai, akhir) {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        jenis_pelayanan = $("#jenis_pelayanan").val();
        jenis_klaim = $("#jenis_klaim").val();
        $('#datable').DataTable({
            "retrieve": true,
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel'],
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
                "url": '<?= base_url($url); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,
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

    function cetak_pdf() {
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        jenis_jurnal = $("#jenis_jurnal").val();
        jenis_pel = $("#jenis_pel").val();
        dokter = $("#inDokter").val();
        if (jenis_jurnal == '-') {
            window.open('<?= base_url('Jasamedis/cetak_detail_pdf/'); ?>' + mulai + '/' + akhir + '/' + jenis_pel, '_blank');
        } else {
            if(dokter =='-'){
                window.open('<?= base_url('Jasamedis/cetak_detail_pdf_dokter/'); ?>' + mulai + '/' + akhir + '/' + jenis_pel, '_blank');
            }else{
            window.open('<?= base_url('Jasamedis/cetak_pasien_dokter/'); ?>' + mulai + '/' + akhir+ '/' + dokter + '/' + jenis_pel, '_blank');
            }
        }
    }
    function export_excel() {
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        jenis_jurnal = $("#jenis_jurnal").val();
        dokter = $("#inDokter").val();
        if (jenis_jurnal == '-') {
            window.open('<?= base_url('Jasamedis/cetak_detail_excel/'); ?>' + mulai + '/' + akhir + '/' + jenis_pel, '_blank');
        } else {
            if(dokter =='-'){
                window.open('<?= base_url('Jasamedis/cetak_detail_excel_dokter/'); ?>' + mulai + '/' + akhir + '/' + jenis_pel, '_blank');
            }else{
            window.open('<?= base_url('Jasamedis/cetak_pasien_dokter_excel/'); ?>' + mulai + '/' + akhir+ '/' + dokter + '/' + jenis_pel, '_blank');
            }
        }
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>