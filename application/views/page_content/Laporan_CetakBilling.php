<!-- Row -->
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN CETAK BILLING</span></h6>
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
                        <!-- <option value="UGD RAJAL">UGD RAJAL</option> -->
                        <option value="UGD">UGD</option>
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
                        <?php $db_cb = $this->db->query('SELECT * FROM cara_bayar where (nama like "%BPJS%" or id_cara_bayar ="PTDAK") ')->result();
                        foreach ($db_cb as $row) { ?>
                            <option value="<?= $row->id_cara_bayar ?>"><?= $row->nama ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="print_bill();"><i class="icon-rocket"></i><span class="btn-text">CETAK</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="div_result" style="display: none;"></div>


<style>
    td {
        color: black;
    }
</style>

<script type="text/javascript">
    function print_bill() {
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        jenis_pelayanan = $("#jenis_pelayanan").val();
        jenis_klaim = $("#jenis_klaim").val();
        window.open('<?=base_url() . 'CetakBilling/print_bill/'?>'+mulai+'/'+akhir+'/'+jenis_pelayanan+'/'+jenis_klaim, '_blank');
        // $.ajax({
        //     type: 'POST',
        //     url: "<?= base_url() . 'CetakBilling/print_bill' ?>",
        //     data: {
        //         mulai: mulai,
        //         akhir: akhir,
        //         jenis_pelayanan: jenis_pelayanan,
        //         jenis_klaim: jenis_klaim,
        //     },
        //     dataType: "html",
        //     success: function(msg) {
        //         $("#div_result").html(msg);
        //         var divContents = document.getElementById("div_result").innerHTML;
        //         // var a = window.open('', '', 'height=500, width=500');
        //         var a = window.open();
        //         // a.document.write('<html>');
        //         // a.document.write('<head><style type="text/css"> @page {size: A4;margin: 0;} body { margin: 0; } </style> </head>');
        //         // a.document.write('<body >');
        //         a.document.write(divContents);
        //         // a.document.write('</body>');
        //         // a.document.write('</html>');
        //         setTimeout(function() { // wait until all resources loaded 
        //             a.document.close(); // necessary for IE >= 10
        //             a.focus(); // necessary for IE >= 10
        //             // a.print(); // change window to winPrint
        //             // a.close(); // change window to winPrint
        //         }, 500);

        //     }
        // });
    }
</script>