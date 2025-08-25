<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN JASMED DAN SARANA</span></h6>
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
                    <label class="mt-0 txt-dark">Jenis Pelayanan : </label>
                    <select class="form-control select2" placeholder="Choose a Category" name="jenis_pelayanan" id="jenis_pelayanan">
                        <option value="-">-</option>
                        <option value="UGD RAJAL">UGD RAJAL</option>
                        <option value="UGD RANAP">UGD RANAP</option>
                        <option value="POLI">POLI</option>
                        <option value="RANAP">RAWAT INAP</option>
                        <!-- <option value="OK">KAMAR OPERASI</option> -->
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="mt-0 txt-dark">Jenis Klaim : </label>
                    <select class="form-control select2" placeholder="Choose a Category" name="jenis_klaim" id="jenis_klaim">
                        <option value="ALL">SEMUA</option>
                        <option value="TIMAH">TIMAH</option>
                        <option value="BPJS">BPJS</option>
                        <option value="BPJSTK">BPJSTK</option>
                        <option value="BPJS - PT DAK">BPJS - PT DAK</option>
                        <option value="BPJS - INHEALTH">BPJS - INHEALTH</option>
                        <option value="BPJS - PT TIMAH">BPJS - PT TIMAH</option>
                        <option value="BPJS - PT POS">BPJS - PT POS</option>
                        <option value="BPJS - RSBT">BPJS - RSBT</option>
                        <option value="SENDIRI">BAYAR SENDIRI / UMUM</option>
                        <?php $db_cb = $this->db->query('SELECT * FROM cara_bayar where (nama like "%BPJS%" or id_cara_bayar ="PTDAK") and id_cara_bayar != "30"')->result();
                        foreach ($db_cb as $row) { ?>
                            <option value="<?= $row->id_cara_bayar ?>"><?= $row->nama ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="mt-0 txt-dark">Dokter :</label>
                    <select class="form-control select2" placeholder="Choose a Category" name="inDokter" id="inDokter">
                        <option value="-">All</option>
                        <?php $db = $this->db->query("SELECT distinct(nama) nama from dokter where status ='aktif'")->result();
                        foreach ($db as $row) {
                        ?>
                            <option value="<?= $row->nama ?>"><?= $row->nama ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-wrapper collapse in">
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
                                <th>NO SEP</th>
                                <th>TINDAKAN</th>
                                <th>JASA DOKTER</th>
                                <th>FREK</th>
                                <th>JUMLAH</th>
                                <th>CARA BAYAR</th>
                                <th>DOKTER</th>
                                <th>KETERANGAN</th>
                                <th>POLI/RUANG</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TANGGAL MASUK</th>
                                <th>TANGGAL KELUAR</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>NO SEP</th>
                                <th>TINDAKAN</th>
                                <th>JASA DOKTER</th>
                                <th>FREK</th>
                                <th>JUMLAH</th>
                                <th>CARA BAYAR</th>
                                <th>DOKTER</th>
                                <th>KETERANGAN</th>
                                <th>POLI/RUANG</th>
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
    function tampilRangePermit(mulai, akhir) {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        jenis_pelayanan = $("#jenis_pelayanan").val();
        jenis_klaim = $("#jenis_klaim").val();
        dokter = $("#inDokter").val();
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
                "url": '<?= base_url('Jasamedis/tampil_jasmed'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,
                    jenis_pelayanan: jenis_pelayanan,
                    jenis_klaim: jenis_klaim,
                    dokter: dokter,
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