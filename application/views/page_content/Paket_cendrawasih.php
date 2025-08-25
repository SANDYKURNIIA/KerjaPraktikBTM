<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">PAKET OBAT</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>

    <div align="right">
        <button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" data-toggle="modal" onclick="show_tambah()"><i class="icon-plus"></i><span class="btn-text">TAMBAH PAKET</span>
        </button>
    </div>

    <div align="right" class="col-md-12 has-error">
        <label for="tanggal_masuk1" class="col-sm-2 control-label">
            <p>&nbsp;</p>
        </label>
    </div>

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="form-group">
                <div class="row mt-30">
                    <div class="col-md-12">

                    </div>
                </div>

                <div class="table-wrap">

                    <div class="table-responsive">
                        <table class="table table-hover display  pb-30" id="datable">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>EDIT</th>
                                    <th>HAPUS</th>
                                    <th>NAMA PAKET</th>
                                    <th>HARGA PAKET</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tfoot class="bg-success">
                                <th>NO</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                                <th>NAMA PAKET</th>
                                <th>HARGA PAKET</th>
                                <th>STATUS</th>
                            </tfoot>
                            <tbody style="color: black">

                                <!--percobaan nampilin data-->



                                <!--end percobaan penampilan data-->

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--data table-->

<!--modal yang akan dipakai-->

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="modal fade modal-pendaftaranakun" id="modal_edit_resep" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>TINDAKAN OBAT</p>
                        <p><i class="icon-people mr-10"></i>INPUT TINDAKAN</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA PAKET</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="NAMA PAKET" id="upTindakan" name="nama"></input>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div id="form_tindakan" style="display: block;">
                            <div class="form-body mt-20">
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" name="title" class="form-control" id="inObat" placeholder="Ketik karakter">
                                                <input type="hidden" class="form-control " id="inIdLog">
                                                <input type="hidden" class="form-control " id="inHargaCost">
                                                <input type="hidden" class="form-control " id="inMargin">
                                                <input type="hidden" class="form-control " id="inPpn">
                                                <span class="help-block"></span>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <input type="number" class="form-control " id="inJumlahObat" placeholder="jumlah" value="1" min="1">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA HNA+PPN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled="" id="outBiayaTindakanObat">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA + MARGIN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled="" id="outBiayaMarginObat">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="control-label col-md-3">PILIHAN HARGA</div>
                                            <div class="col-md-9">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" name="inRadioPilihanHarga" id="inRadioCost" value="option1">
                                                            <label for="inRadioCost">HNA+PPN (BPJS)</label>
                                                        </span>
                                                    </div>                                
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" name="inRadioPilihanHarga" id="inRadioMargin" value="option2">
                                                            <label for="inRadioMargin">HARGA+MARGIN</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TOTAL HARGA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" disabled="" id="outTotalObat">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row" style="margin-top: 10px;" id="cetakSigna">

                                    <div class="col-md-6">
                                        <label class="control-label col-md-3">SIGNA OBAT</label>
                                        <div class="col-md-9 has-success">

                                            <select class="form-control filled-input rounded-input select2" id="inSigna">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($signa as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_signa"]; ?>"> <?php echo $row["tindakan"]; ?> </option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                            <span class="help-block"></span>

                                        </div>
                                        <div class="col-md-offset-3 col-md-9">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label col-md-3">CARA PAKAI OBAT</label>
                                        <div class="col-md-9 has-success">

                                            <select class="form-control filled-input rounded-input select2" id="inCaraPakai">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($cara_pemakaian_obat as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_cara_pemakaian"]; ?>"> <?php echo $row["cara_pemakaian"]; ?> </option>
                                                <?php
                                                }
                                                ?>

                                            </select>

                                        </div>

                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="form-actions mt-10">
                                <input type="hidden" class="form-control " placeholder="" id="inId" value="<?= uniqid() ?>">

                                <button onclick="insertStok()" class="btn btn-success btn-anim  btn-sm" style="margin-left: 120px;" type="button"><i class="icon-rocket"></i><span class="btn-text">TAMBAH</span></button>

                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table id="datableracikan" class="table table-hover display  pb-30">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>NAMA OBAT</th>
                                                        <th>HARGA OBAT</th>
                                                        <th>JUMLAH OBAT</th>
                                                        <th>TOTAL BIAYA</th>
                                                        <th>SIGNA</th>
                                                        <th>CARA PAKAI</th>
                                                        <th>HAPUS</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="color: black" id="show_data">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TOTAL</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control " placeholder="" id="total" readonly>
                                                <input type="hidden" class="form-control " placeholder="" id="inTotal" value="0" readonly>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-actions mt-10">

                                <button onclick="insertPaket()" class="btn btn-primary btn-anim " style="margin-left: 120px;" type="button"><i class="icon-rocket"></i><span class="btn-text">SIMPAN PAKET</span></button>

                            </div>
                        </div>
                        <!-- End -->
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>

</div>
<!--akhir modal yang akan dipakai-->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->

        <div class="modal fade " id="modal_edit_mcu" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>EDIT PAKET</p>
                        <p><i class="icon-people mr-10"></i>INPUT TINDAKAN</p>

                    </div>
                    <div class="modal-body">
                        <!-- Form body  -->

                        <div class="form-body mt-20">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA PAKET</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" placeholder="NAMA PAKET" id="upNama" name="nama" readonly></input>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div id="form_tindakan" style="display: block;">
                            <div class="form-body mt-20">
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" name="title" class="form-control" id="upObat" placeholder="Ketik karakter">
                                                <input type="hidden" class="form-control " id="upIdLog">
                                                <input type="hidden" class="form-control " id="upHargaCost">
                                                <input type="hidden" class="form-control " id="upMargin">
                                                <input type="hidden" class="form-control " id="upPpn">
                                                <span class="help-block"></span>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <input type="number" class="form-control " id="upJumlahObat" placeholder="jumlah" value="1" min="1" oninput="setHarga1()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA HNA+PPN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled="" id="outBiayaTindakanObat1">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HARGA + MARGIN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled="" id="outBiayaMarginObat1">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="control-label col-md-3">PILIHAN HARGA</div>
                                            <div class="col-md-9">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" name="upRadioPilihanHarga" id="inRadioCost1" value="option1">
                                                            <label for="inRadioCost">HNA+PPN (BPJS)</label>
                                                        </span>
                                                    </div>                                
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" name="upRadioPilihanHarga" id="inRadioMargin1" value="option2">
                                                            <label for="inRadioMargin">HARGA+MARGIN</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TOTAL HARGA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" disabled="" id="outTotalObat1">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row" style="margin-top: 10px;" id="cetakSigna">

                                    <div class="col-md-6">
                                        <label class="control-label col-md-3">SIGNA OBAT</label>
                                        <div class="col-md-9 has-success">

                                            <select class="form-control filled-input rounded-input select2" id="upSigna">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($signa as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_signa"]; ?>"> <?php echo $row["tindakan"]; ?> </option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                            <span class="help-block"></span>

                                        </div>
                                        <div class="col-md-offset-3 col-md-9">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label col-md-3">CARA PAKAI OBAT</label>
                                        <div class="col-md-9 has-success">

                                            <select class="form-control filled-input rounded-input select2" id="upCaraPakai">
                                                <option value="-">-</option>
                                                <?php
                                                foreach ($cara_pemakaian_obat as $row) {

                                                ?>
                                                    <option value="<?php echo $row["id_cara_pemakaian"]; ?>"> <?php echo $row["cara_pemakaian"]; ?> </option>
                                                <?php
                                                }
                                                ?>

                                            </select>

                                        </div>

                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="form-actions mt-10">
                                <input type="hidden" class="form-control " placeholder="" id="upId">

                                <button onclick="updateTindakan()" class="btn btn-success btn-anim  btn-sm" style="margin-left: 120px;" type="button"><i class="icon-rocket"></i><span class="btn-text">Tambah</span></button>

                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table id="datableracikan1" class="table table-hover display  pb-30">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>NAMA OBAT</th>
                                                        <th>HARGA OBAT</th>
                                                        <th>JUMLAH OBAT</th>
                                                        <th>TOTAL BIAYA</th>
                                                        <th>SIGNA</th>
                                                        <th>CARA PAKAI</th>
                                                        <th>HAPUS</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="color: black" id="show_data1">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                        </div>
                                        <div class="col-md-4 pull-right mt-20">

                                            <div class="table-wrap" style="width: 85%; margin-bottom:40px;">
                                                <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
                                                <div class="table-responsive ">
                                                    <table class="table table-hover display " id="outTotalHargaPaket">
                                                        <thead>
                                                            <tr class="bg-success">
                                                                <th style="font-weight:bold;">Total Keseluruhan</th>
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
                        <!-- End -->
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>

</div>

<script type="text/javascript">
    function show_tambah() {
        $('.modal-pendaftaranakun').modal('toggle');

    }
  
</script>
<script type="text/javascript">
    function insertPaket() {
        upTindakan = $('#upTindakan').val();
        harga = $('#inTotal').val();
        id = $('#inId').val();

        $.ajax({
            url: "<?= base_url() . 'Paket_Cendrawasih/insert_paket' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                id: id,
                upTindakan: upTindakan,
                harga: harga,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data " + upTindakan + " berhasil ditambahkan",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#pilihMaster').val('list_tindakan_mcu').change();
                    $('.modal-pendaftaranakun').modal('hide');
                    $('#datable').DataTable().ajax.reload();
                    location.reload();

                    // $('#form_tindakan').show();

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

    function insertStok() {
        nama = $("#inObat").val();
        idLogistik = $("#inIdLog").val();
        harga = $("#inHargaCost").val();
        ppn = $("#inPpn").val();
        margin = $("#inMargin").val();
        bpjs = $('#outBiayaTindakanObat').val();
        ppn = harga * (ppn / 100);
        harga = Number(harga) + Number(ppn);
        hargaMargin = Number(harga) * Number(margin);

        frek = parseFloat($("#inJumlahObat").val());

        if($("input[name='inRadioPilihanHarga'][value='option1']").is(":checked")){
            total = harga * frek;
        }
        if($("input[name='inRadioPilihanHarga'][value='option2']").is(":checked")){
            harga = hargaMargin
            total = hargaMargin * frek;
        }


        signa = $('#inSigna').val();
        cara_pakai = $('#inCaraPakai').val();
        var uid = (new Date().getTime()).toString(36);
        // var ID = Math.random().toString(36).substr(2, 50) + Math.random().toString(36).substr(2, 50) + uid;
        id = $("#inId").val();
       
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Paket_Cendrawasih/insertDetail",
            data: {
                id_list_tindakan: idLogistik,
                nama: nama,
                id: id,
                harga: harga.toFixed(0),
                frek: frek,
                total: total,
                signa: signa,
                cara_pakai: cara_pakai,
                tipe: 'RANAP',
            },
            dataType: "json",
            success: function(data) {
                // $('#form_obat')[0].reset();
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#inObat').val('').change();
                    $("#outBiayaTindakanObat").val(null);
                    $("#outBiayaMarginObat").val(null);
                    $("#outTotalObat").val(null);
                    $("#inJumlahObat").val(1);
                    // $("#pilihMaster").val('list_tindakan_mcu').change();
                    reload_racikan(id);
                } else {
                    alert('tidak bisa insert');
                }
            }
        })
    }

    function edit_tindakan_mcu(id_paket, nama) {
        reload_racikan1(id_paket);
        reload_total_paket(id_paket);
        $("#upNama").val(nama);
        $("#upId").val(id_paket);
        $('#upMaster').val('list_tindakan_mcu').change();

        $("#modal_edit_mcu").modal('show');

    }


    function updateTindakan() {
        id = $("#upId").val();
        nama = $("#upObat").val();
        idLogistik = $("#upIdLog").val();
        harga = $("#upHargaCost").val();
        ppn = $("#upPpn").val();
        margin = $("#upMargin").val();

        ppn = harga * (ppn / 100);
        harga = Number(harga) + Number(ppn);
        hargaMargin = Number(harga) * Number(margin);

        frek = parseFloat($("#upJumlahObat").val());

        if($("input[name='upRadioPilihanHarga'][value='option1']").is(":checked")){
            total = harga * frek;
        }
        if($("input[name='upRadioPilihanHarga'][value='option2']").is(":checked")){
            harga = hargaMargin
            total = hargaMargin * frek;
        }

        //total = hargaMargin * frek;
        signa = $('#upSigna').val();
        cara_pakai = $('#upCaraPakai').val();
       
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Paket_Cendrawasih/insertDetail",
            dataType: 'json',
            data: {
                id_list_tindakan: idLogistik,
                nama: nama,
                id: id,
                harga: harga,
                frek: frek,
                total: total,
                signa: signa,
                cara_pakai: cara_pakai,
                tipe: 'RANAP',
            },
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $("#upMaster").val('list_tindakan_mcu').change();
                    reload_racikan1(id);
                    reload_total_paket(id);
                    $('#datable').DataTable().ajax.reload();

                    $('#upObat').val('').change();
                    $("#outBiayaTindakanObat1").val(null);
                    $("#outBiayaMarginObat1").val(null);
                    $("#outTotalObat1").val(null);
                    $("#upJumlahObat").val(0);
                    $("select[id='upSigna']").val('-').trigger('change');
                    $("select[id='upCaraPakai']").val('-').trigger('change');
                    $("input[name='upRadioPilihanHarga'][value='option2']").prop('checked',false);
                    $("input[name='upRadioPilihanHarga'][value='option1']").prop('checked',false);

                } else {
                    alert('tidak bisa insert');
                }

            }
        })
    }

    function hapus_paket(id, nama) {

        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + nama + " ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url(); ?>Paket_Cendrawasih/hapus_paket",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        //alert(data);
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Paket " + nama + " berhasil dihapus",
                            confirmButtonColor: "#3cb878",
                        });
                        $('#datable').DataTable().ajax.reload();

                    }
                });
            });
        });
        return false;
    }
</script>

<script type="text/javascript">
    function convertToRupiah(angka) {
        var angkarev = angka.toString().split('').reverse().join('');
        rib = angkarev.match(/\d{1,3}/g);
        rib = rib.join('.').split('').reverse().join('');
        return "Rp."+rib;
    }

    function reload_racikan(id) {

        // stok = $('#inStokAsli').val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('Paket_Cendrawasih/tampil_list_paket'); ?>',
            async: false,
            dataType: 'json',
            data: {
                id: id,
            },
            success: function(data) {
                var html = '';
                var sum = 0;
                var frek = 0;
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td>' + Number(i + 1) + '</td>' +
                        '<td>' + data[i].nama + '</td>' +
                        '<td>' + convertToRupiah(data[i].harga) + '</td>' +
                        '<td>' + data[i].frek + '</td>' +
                        '<td>' + convertToRupiah(data[i].total) + '</td>' +
                        '<td>' + data[i].signa + '</td>' +
                        '<td>' + data[i].cara_pakai + '</td>' +
                        '<td><button class="btn btn-danger btn-icon-anim btn-square delete" type="button" name="delete" id="' + data[i].id_detail_paket + '" ><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';

                    sum = Number(sum) + Number(data[i].total);
                }
                $('#show_data').html(html);
                $('#total').val(convertToRupiah(sum));
                $('#inTotal').val(sum);
            }

        });

    }

    function reload_racikan1(id) {
        $('#datableracikan1').dataTable().fnClearTable();
        $('#datableracikan1').dataTable().fnDestroy();
        $('#datableracikan1').DataTable({
            "pageLength": 5,
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
                "url": '<?php echo base_url('Paket_Cendrawasih/tampil_list_paket1'); ?>',
                "type": 'POST',
                "data": {
                    id: id
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
        $(document).on('click', '.delete', function() {
            var user_id = $(this).attr("id");
            var id = $('#id').val();
            var upId = $('#upId').val();
            swal({
                title: "Apakah kamu yakin?",
                text: "Menghapus data ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function() {
                $().ready(function() {
                    $.ajax({
                        url: "<?php echo base_url(); ?>Paket_Cendrawasih/hapus_list_paket",
                        method: "POST",
                        data: {
                            id: user_id,
                            id_paket: id,
                            id_paket1: upId,
                        },
                        success: function(data) {
                            //alert(data);
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            reload_racikan(id);
                            reload_racikan1(upId);
                            reload_total_paket(upId);
                            $('#datable').DataTable().ajax.reload();
                            //$('#modal_tambahstok').modal('show');
                            // } else {
                            //     swal({
                            //         title: "Gagal!",
                            //         type: "warning",
                            //         text: data.status,
                            //         confirmButtonColor: "#3cb878",
                            //     });
                            // }
                        }
                    });
                });
            });
            return false;
        });
    });

    function reload_total_paket(id_paket) {
        $('#outTotalHargaPaket').dataTable().fnClearTable();
        $('#outTotalHargaPaket').dataTable().fnDestroy();
        $('#outTotalHargaPaket').DataTable({
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
                "url": '<?php echo base_url('Mcu/tampil_total_paket'); ?>',
                "type": 'POST',
                "data": {
                    id_paket: id_paket
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
            "ajax": '<?php echo base_url('Paket_Cendrawasih/tampil_paket'); ?>',
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

<link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
<script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/jquery-ui.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#inObat').autocomplete({
            source: function(query, response) {
                depo = $("#inDepo").val();

                $.ajax({
                    url: "<?php echo base_url(); ?>Paket_Cendrawasih/getNamaObat",
                    type: "POST",
                    dataType: "json",
                    data: {
                        query: query,
                        depo: depo
                    },

                    success: function(data) {
                        response(data);
                        // response($.map(data.message, function(item) {
                        //     return item.value;
                        // }));

                    },

                });
            },
            focus: function(event, ui) {
                $('#inObat').val(ui.item.id);
            },
            select: function(event, ui) {
                //$('#inObat').val(ui.item.nama);
                //alert(ui.item.value);
                $('#inIdLog').val(ui.item.id_logistik);
                $('#inHargaCost').val(ui.item.harga_cost);
                $('#inMargin').val(ui.item.margin);
                $('#inTglExp').val(ui.item.kadaluarsa);
                $('#inPpn').val(ui.item.ppn);
                setHarga();
            },
            appendTo: "#modal_edit_resep"
        });
        $('#upObat').autocomplete({
            source: function(query, response) {
                depo = $("#inDepo").val();

                $.ajax({
                    url: "<?php echo base_url(); ?>Paket_Cendrawasih/getNamaObat",
                    type: "POST",
                    dataType: "json",
                    data: {
                        query: query,
                        depo: depo
                    },

                    success: function(data) {
                        response(data);
                        // response($.map(data.message, function(item) {
                        //     return item.value;
                        // }));

                    },

                });
            },
            focus: function(event, ui) {
                $('#upObat').val(ui.item.id);
            },
            select: function(event, ui) {
                //$('#inObat').val(ui.item.nama);
                //alert(ui.item.value);
                $('#upIdLog').val(ui.item.id_logistik);
                $('#upHargaCost').val(ui.item.harga_cost);
                $('#upMargin').val(ui.item.margin);
                $('#upTglExp').val(ui.item.kadaluarsa);
                $('#upPpn').val(ui.item.ppn);
                setHarga1();
            },
            appendTo: "#modal_edit_mcu"
        });

    });

    function setHarga() {

        tipe = $('#tipe_resep').val();
        obat = $('#inObat').val();
        //plitDiag = obat.split("|");
        //stok = (splitDiag[4]);


        harga = $("#inHargaCost").val();
        ppn = $("#inPpn").val();
        margin = $("#inMargin").val();


        ppn = harga * (ppn / 100);
        harga = Number(harga) + Number(ppn);
        hargaMargin = Number(harga) * Number(margin);
        //(harga);
        $("#outBiayaTindakanObat").val(convertToRupiah(harga.toFixed(0)));
        $("#outBiayaMarginObat").val(convertToRupiah(hargaMargin.toFixed(0)));



        frek = parseFloat($("#inJumlahObat").val());

        total = hargaMargin * frek;
        //}
        $("#outTotalObat").val(convertToRupiah(total.toFixed(0)));
        $("input[name='inRadioPilihanHarga'][value='option2']").prop("checked",true);
    }


$("input[name='inRadioPilihanHarga'][value='option1']").on("click",()=>{
        $("#inJumlahObat").val(1);
		$("#outTotalObat").val($("#outBiayaTindakanObat").val());
});
$("input[name='inRadioPilihanHarga'][value='option2']").on("click",()=>{
    $("#inJumlahObat").val(1);
	$("#outTotalObat").val($("#outBiayaMarginObat").val());
});

$("input[name='upRadioPilihanHarga'][value='option1']").on("click",()=>{
        $("#upJumlahObat").val(1);
		$("#outTotalObat1").val($("#outBiayaTindakanObat1").val());
});
$("input[name='upRadioPilihanHarga'][value='option2']").on("click",()=>{
    $("#upJumlahObat").val(1);
	$("#outTotalObat1").val($("#outBiayaMarginObat1").val());
});





    function setHarga1() {

        obat = $('#upObat').val();
        //plitDiag = obat.split("|");
        //stok = (splitDiag[4]);


        harga = $("#upHargaCost").val();
        ppn = $("#upPpn").val();
        margin = $("#upMargin").val();


        ppn = harga * (ppn / 100);
        harga = Number(harga) + Number(ppn);
        hargaMargin = Number(harga) * Number(margin);
        //(harga);
        $("#outBiayaTindakanObat1").val(convertToRupiah(harga.toFixed(0)));
        $("#outBiayaMarginObat1").val(convertToRupiah(hargaMargin.toFixed(0)));



        frek = parseFloat($("#upJumlahObat").val());

        total = hargaMargin * frek;
        //}
        $("#outTotalObat1").val(convertToRupiah(total.toFixed(0)));
        $("input[name='upRadioPilihanHarga'][value='option2']").prop("checked",true);
    }

$("#inJumlahObat").on("input",()=>{
    var jml = parseInt($("#inJumlahObat").val());
        harga = $("#inHargaCost").val();
        ppn = $("#inPpn").val();
        margin = parseFloat($("#inMargin").val());
        ppn = harga * (ppn / 100);
        harga = Number(harga) + Number(ppn);
        hargaMargin = Number(harga) * Number(margin);

        if($("input[name='inRadioPilihanHarga'][value='option1']").is(":checked")){
            totalisme = harga*jml;
            $("#outTotalObat").val(convertToRupiah(totalisme.toFixed(0)));
        }
        if($("input[name='inRadioPilihanHarga'][value='option2']").is(":checked")){
            totalisme = hargaMargin*jml;
            $("#outTotalObat").val(convertToRupiah(totalisme.toFixed(0)));
        }
});
</script>

<!--end of ajax-->