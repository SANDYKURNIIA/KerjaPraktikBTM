<<<<<<< HEAD
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">Jurnal Biaya Farmasi</span>
            </h6>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="row mt-30">
                <div class="col-md-12">

                    <div class="col-md-5">
                        <label class="mt-0 txt-dark">PERIODE : </label>
                        <input type="month" autocomplete="off" id="inBulan" class="form-control">
                    </div>

                    <div class="col-md-3 mt-20">
                        <button class="btn btn-info btn-anim btn-sm1" onclick="jurnal();"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>

                    </div>
                </div>
            </div>

            <br>
            <br>
            <div class="table-wrap">
                <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="datable">
                        <thead>
                            <tr class="bg-success">
                                <th>CETAK</th>
                                <th>BULAN</th>
                                <th>TAHUN</th>
                                <th>NO JURNAL</th>
                                <th>TOTAL</th>
                                <th>STAFF</th>
                                <th>HAPUS</th>
                               
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cetak -->
<style>
    td {
        color: black;
    }
</style>
<script type="text/javascript">
    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function jurnal() {

        periode = $('#inBulan').val();
        var teks = "Melakukan jurnal pada bulan " + bulan_date_js(new Date(periode+'-01')) + " ?";
        swal({
            title: "Apakah kamu yakin?" ,
            text: teks,
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
                    url: "<?php echo base_url() ?>Jurnal_Biaya_farmasi/setJurnal",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        periode: periode,
                    },
                    success: function(data) {
                        if (data.status == "success") {

                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Jurnal Berhasil Disimpan",
                                confirmButtonColor: "#3cb878",
                            });

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
=======
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">Jurnal Biaya Farmasi</span>
            </h6>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="row mt-30">
                <div class="col-md-12">

                    <div class="col-md-5">
                        <label class="mt-0 txt-dark">PERIODE : </label>
                        <input type="month" autocomplete="off" id="inBulan" class="form-control">
                    </div>

                    <div class="col-md-3 mt-20">
                        <button class="btn btn-info btn-anim btn-sm1" onclick="jurnal();"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>

                    </div>
                </div>
            </div>

            <br>
            <br>
            <div class="table-wrap">
                <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="datable">
                        <thead>
                            <tr class="bg-success">
                                <th>CETAK</th>
                                <th>BULAN</th>
                                <th>TAHUN</th>
                                <th>NO JURNAL</th>
                                <th>TOTAL</th>
                                <th>STAFF</th>
                                <th>HAPUS</th>
                               
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cetak -->
<style>
    td {
        color: black;
    }
</style>
<script type="text/javascript">
    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function jurnal() {

        periode = $('#inBulan').val();
        var teks = "Melakukan jurnal pada bulan " + bulan_date_js(new Date(periode+'-01')) + " ?";
        swal({
            title: "Apakah kamu yakin?" ,
            text: teks,
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
                    url: "<?php echo base_url() ?>Jurnal_Biaya_farmasi/setJurnal",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        periode: periode,
                    },
                    success: function(data) {
                        if (data.status == "success") {

                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Jurnal Berhasil Disimpan",
                                confirmButtonColor: "#3cb878",
                            });

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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>