<<<<<<< HEAD
<!-- Row -->
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">TRIAL BALANCE</span></h6>
        </div>
        <div class="clearfix"></div>
        <div class="row mt-30">
            <div class="col-md-12">
                <!-- <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div> -->
                <!-- <div class="col-md-3">
                    <label class="mt-0 txt-dark">Jenis</label>
                    <select class="form-control select2" placeholder="Choose a Category" name="jenis_jurnal" id="jenis_jurnal">
                        <option value="-">PILIH</option>
                        <option value="bulan">Bulan</option>
                        <option value="tahun">Tahun</option>

                    </select>
                </div> -->
                <div class="col-md-3  data_hide data_hide_bulan">
                    <label class="mt-0 txt-dark">Bulan Mulai : </label>
                    <input type="month" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-3  data_hide data_hide_bulan">
                    <label class="mt-0 txt-dark">Bulan Akhir : </label>
                    <input type="month" autocomplete="off" id="inTglAkhir" class="form-control">
                </div>

                <!-- <div class="col-md-3 collapse data_hide data_hide_tahun">
                    <label class="mt-0 txt-dark">Tahun : </label>
                    <input type="text" name="tahun" pattern="\d{4}" placeholder="YYYY" autocomplete="off" id="inTahun" class="form-control">
                </div> -->


                <div class="col-md-3 mt-20">
                    <!-- <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span></button> -->
                    <button class="btn btn-info btn-anim btn-sm1 " onclick="cetak();"><i class="icon-rocket"></i><span class="btn-text">EXCEL</span>
                        <!-- <a href="</?php echo base_url('Jurnal_keuangan/export') ?>" class="btn btn-info btn-anim btn-sm1" target="_blank"><i class="fas fa fa-print"></i><span class="btn-text">EXCEL</span></a> -->

                </div>
                <div class="col-md-3 mt-20">
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
    $('#jenis_jurnal').change(function() {
        b = $('#jenis_jurnal').val();

        var selector = '.data_hide_' + b;

        $('.data_hide').collapse('hide');

        $(selector).collapse('show');
    });

    function cetak() {
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        b = $('#jenis_jurnal').val();
        if (mulai != '' && akhir != '') {
            location.href = "<?= base_url() . 'Trial_balance/export/' ?>" + mulai+"/"+akhir;
        } else {
            alert('Pilih Bulan terlebih dahulu');
        }


    }
=======
<!-- Row -->
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">TRIAL BALANCE</span></h6>
        </div>
        <div class="clearfix"></div>
        <div class="row mt-30">
            <div class="col-md-12">
                <!-- <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div> -->
                <!-- <div class="col-md-3">
                    <label class="mt-0 txt-dark">Jenis</label>
                    <select class="form-control select2" placeholder="Choose a Category" name="jenis_jurnal" id="jenis_jurnal">
                        <option value="-">PILIH</option>
                        <option value="bulan">Bulan</option>
                        <option value="tahun">Tahun</option>

                    </select>
                </div> -->
                <div class="col-md-3  data_hide data_hide_bulan">
                    <label class="mt-0 txt-dark">Bulan Mulai : </label>
                    <input type="month" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-3  data_hide data_hide_bulan">
                    <label class="mt-0 txt-dark">Bulan Akhir : </label>
                    <input type="month" autocomplete="off" id="inTglAkhir" class="form-control">
                </div>

                <!-- <div class="col-md-3 collapse data_hide data_hide_tahun">
                    <label class="mt-0 txt-dark">Tahun : </label>
                    <input type="text" name="tahun" pattern="\d{4}" placeholder="YYYY" autocomplete="off" id="inTahun" class="form-control">
                </div> -->


                <div class="col-md-3 mt-20">
                    <!-- <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span></button> -->
                    <button class="btn btn-info btn-anim btn-sm1 " onclick="cetak();"><i class="icon-rocket"></i><span class="btn-text">EXCEL</span>
                        <!-- <a href="</?php echo base_url('Jurnal_keuangan/export') ?>" class="btn btn-info btn-anim btn-sm1" target="_blank"><i class="fas fa fa-print"></i><span class="btn-text">EXCEL</span></a> -->

                </div>
                <div class="col-md-3 mt-20">
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
    $('#jenis_jurnal').change(function() {
        b = $('#jenis_jurnal').val();

        var selector = '.data_hide_' + b;

        $('.data_hide').collapse('hide');

        $(selector).collapse('show');
    });

    function cetak() {
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        b = $('#jenis_jurnal').val();
        if (mulai != '' && akhir != '') {
            location.href = "<?= base_url() . 'Trial_balance/export/' ?>" + mulai+"/"+akhir;
        } else {
            alert('Pilih Bulan terlebih dahulu');
        }


    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>