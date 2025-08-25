<div class="modal fade bs-example-modal-lg" id="modal_edit_resep" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> OBAT
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="collapse" id="collap_nonracikan">
                        <div class="form-body">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                            </h6>
                            <hr width="95%">
                            <form id="formObat" style="display: none;">
                                <div id="tambah_obat">
                                    <!-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">DEPO</label>
                                                <div class="col-md-9 has-success"> -->
                                    <input type="hidden" class="form-control" id="inDepo">
                                    <!-- <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">GOLONGAN OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <select class="form-control filled-input select2" id="inGolongan" onchange="getObatByGol()">
                                                        <option value="-">-</option>
                                                        <?php foreach ($golongan as $s) { ?>
                                                            <option value="<?= $s['golongan_farmakologi']; ?>"><?= $s['golongan_farmakologi']; ?></option>

                                                        <?php } ?>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
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
                                        <!--/span-->
                                        <div class="col-md-6 " id="outTglExp">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">EXPIRED DATE</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control " id="inTglExp" disabled="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">JUMLAH STOK</label>
                                                <div class="col-md-9 has-error">
                                                    <input type="number" class="form-control " id="outStok" value="0" disabled="">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">JUMLAH OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="number" class="form-control " id="inJumlahObat" placeholder="jumlah" value="1" min="1" oninput="setHarga()">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <!--  <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">DISCOUNT</label>
                                                <div class="col-md-3 has-success"> -->
                                        <input type="hidden" placeholder="Disc" max="35" class="form-control" id="inDisc" value="0" oninput="setHarga()">
                                        <!--  </div>
                                                <div class="col-md-1">
                                                    %
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <!--/span-->
                                    <div class="row">
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
                                    </div>

                                    <!-- span -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">TOTAL HARGA</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="text" class="form-control" disabled="" id="outTotalObat">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">KETERANGAN</label>
                                                <div class="col-md-9 has-success">
                                                    <textarea class="form-control" rows="2" style="resize:none" id="inKeteranganObat">-</textarea>
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
                                            <input type="hidden" class="form-control" id="inResObat1">
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

                                <input type="hidden" class="form-control" disabled="" id="cara_bayar">
                                <input type="hidden" class="form-control" disabled="" id="tipe_resep">
                                <input type="hidden" class="form-control" id="inPelObat">
                                <input type="hidden" class="form-control" id="inResObat">
                                <!-- <input type="hidden" class="form-control" id="inDepo"> -->

                                <div class="form-actions mt-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <div type="submit" class="btn btn-success mr-10" onclick="insert_Obat()">SIMPAN</div>

                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"> </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row ">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                                <hr width="95%">
                                <div class="table-wrap" style="width: 100%; margin: auto ">
                                    <div class="table-responsive">
                                        <table class="table table-hover display  pb-60" id="tableobat">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>HAPUS</th>
                                                    <th>NAMA OBAT</th>
                                                    <th>EXPIRE DATE</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>DEPO</th>
                                                    <th>TOTAL BIAYA</th>
                                                    <th>KETERANGAN</th>
                                                    <th>SIGNA</th>
                                                    <th>CARA PAKAI</th>
                                                    <th>NAMA STAFF</th>
                                                    <th>CETAK SIGNA</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: black">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                </div>
                                <div class="col-md-4 pull-right mt-20">

                                    <div class="table-wrap" style="width: 85%; margin-bottom:40px;">
                                        <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->
                                        <div class="table-responsive ">
                                            <table class="table table-hover display " id="outTotalHargaObat">
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

                            <span class="help-block"></span>
                            <div align="right">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>

                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>

                            </div>
                            <br><br>
                            <div class="collapse" id="collap_signa">
                            </div>
                            </hr>
                        </div>

                    </div>
                    <div class="collapse" id="collap_racikan">
                        <div class="form-body" id="form_racikan" style="display: none;">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
                            </h6>
                            <hr width="95%">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-1">RESEP</label>
                                        <div class="col-md-11 has-success">
                                            <textarea class="form-control" id="inResep"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row" id="cetakSigna">

                                <div class="col-md-6">
                                    <label class="control-label col-md-3">SIGNA OBAT</label>
                                    <div class="col-md-9">
                                        <select class="form-control filled-input rounded-input select2" id="inSigna1">
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
                                    <input type="hidden" class="form-control" id="inResObat1">
                                    <div class="col-md-offset-3 col-md-9">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-3">CARA PAKAI OBAT</label>
                                    <div class="col-md-9">
                                        <select class="form-control filled-input rounded-input select2" id="inCaraPakai1">
                                            <option>-</option>
                                            <?php
                                            foreach ($cara_pemakaian_obat as $row) {

                                            ?>
                                                <option value="<?php echo $row["id_cara_pemakaian"]; ?>"> <?php echo $row["cara_pemakaian"]; ?> </option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <span class="help-block"></span>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button onclick="insert_resep_racikan()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                            <hr width="95%">
                            <div class="table-wrap" style="width: 100%; margin: auto ">
                                <div class="table-responsive">
                                    <table class="table table-hover display  pb-60" id="tableRacikan">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>RESEP</th>
                                                <th>SIGNA</th>
                                                <th>CARA PAKAI</th>
                                                <th>HAPUS</th>
                                            </tr>
                                        </thead>
                                        <tbody style="color: black">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <div align="right"> -->
                            <span class="help-block"></span>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-3">
                                            <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>

                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="form-body mt-10">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO RESEP
                        </h6>
                        <hr width="95%">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JENIS RESEP</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" name="inTindakan" id="inJenisResep">
                                            <option value="1">Non Racikan</option>
                                            <option value="2">Racikan</option>
                                            <option value="3">OTT</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NAMA RESEP</label>
                                    <div class="col-md-9 has-success">
                                        <input type="text" class="form-control" id="inNamaResep" placeholder="Nama Resep">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">DEPO</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" id="inDepo1">
                                            <option value="APOTIK">RAJAL</option>

                                            <option value="RANAP">RANAP</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <input type="hidden" class="form-control" id="inPelResep">
                        <input type="hidden" class="form-control" id="inHisResep">
                        <span class="help-block"></span>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button onclick="insert_resep()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        <!-- <button onclick="insert_na_obat()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_obat"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body mt-30">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 100%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tableresep">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>REQUEST</th>
                                    <th>TINDAKAN</th>
                                    <th>HAPUS</th>
                                    <th>NAMA RESEP</th>
                                    <th>JENIS RESEP</th>
                                    <th>DEPO</th>
                                    <th>TANGGAL</th>
                                </tr>
                            </thead>
                            <tbody style="color: black">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <button onclick="cetak_antrian()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">CETAK ANTRIAN APOTIK</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
<script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/jquery-ui.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#inObat').focus();

        $('#inObat').autocomplete({
            source: function(query, response) {
                depo = $("#inDepo").val();

                $.ajax({
                    url: "<?php echo base_url(); ?>Poli/getNamaObat",
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
                $('#inObat').val(ui.item.value);
            },
            select: function(event, ui) {
                //$('#inObat').val(ui.item.nama);
                //alert(ui.item.value);
                $('#inIdLog').val(ui.item.id_logistik);
                $('#inHargaCost').val(ui.item.harga_cost);
                $('#inMargin').val(ui.item.margin);
                $('#inTglExp').val(ui.item.kadaluarsa);
                $('#inPpn').val(ui.item.ppn);
                $('#outStok').val(ui.item.stok);
                setHarga();
            },
            appendTo: "#modal_edit_resep"
        });

        $('#inSigna').autocomplete({
            source: function(query, response) {

                $.ajax({
                    url: "<?php echo base_url(); ?>Poli/getSigna",
                    type: "POST",
                    dataType: "json",
                    data: {
                        query: query,
                    },
                    success: function(data) {
                        response(data);
                    },
                });
            },
            focus: function(event, ui) {
                $('#inSigna').val(ui.item.value);
            },
            select: function(event, ui) {
                $('#inIdSigna').val(ui.item.id_signa);
            },
            appendTo: "#modal_edit_resep"
        });

        $('#inCaraPakai').autocomplete({
            source: function(query, response) {

                $.ajax({
                    url: "<?php echo base_url(); ?>Poli/getCaraPakai",
                    type: "POST",
                    dataType: "json",
                    data: {
                        query: query,
                    },
                    success: function(data) {
                        response(data);
                    },
                });
            },
            focus: function(event, ui) {
                $('#inCaraPakai').val(ui.item.value);
            },
            select: function(event, ui) {
                $('#inIdCaraPakai').val(ui.item.id_cara_pemakaian);
            },
            appendTo: "#modal_edit_resep"
        });
    });
    function reload_data_resep(id_pelayanan, id_history) {
        $('#tableresep').dataTable().fnClearTable();
        $('#tableresep').dataTable().fnDestroy();
        $('#tableresep').DataTable({
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
                "url": '<?php echo base_url($url_resep); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan,
                    id_history: id_history
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

    function reload_data_racikan(id_resep) {
        $('#tableRacikan').dataTable().fnClearTable();
        $('#tableRacikan').dataTable().fnDestroy();
        $('#tableRacikan').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_racikan'); ?>',
                "type": 'POST',
                "data": {
                    id_resep: id_resep
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

    function reload_data_obat(id_resep) {
        $('#tableobat').dataTable().fnClearTable();
        $('#tableobat').dataTable().fnDestroy();
        $('#tableobat').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_obat'); ?>',
                "type": 'POST',
                "data": {
                    id_resep: id_resep,
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
    function reload_total_obat(id_pelayanan) {
        $('#outTotalHargaObat').dataTable().fnClearTable();
        $('#outTotalHargaObat').dataTable().fnDestroy();
        $('#outTotalHargaObat').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_total_obat'); ?>',
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
    function cetak_antrian() {
        id_pelayanan = $('#inPelResep').val();
        $.ajax({
            url: "<?php echo base_url() ?>Poli/insertAntrian",
            method: "POST",
            data: {
                id_pelayanan: id_pelayanan,
            },

            success: function() {
                window.location.href = '<?php echo base_url() ?>Poli/print_antrian_apotik';

            }
        })

    }

    

    function pilih_obat(idResep, tipe, cara_bayar, depo) {
        if (tipe == 2) {
            $('#form_racikan').show();
            $('#inResObat').val(idResep);
            $('#inDepo').val(depo);
            getObat(depo);
            $("#collap_racikan").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_racikan(idResep);
        } else {
            $('#formObat').show();
            $('#inDepo').val(depo);
            getObat(depo);
            $('#cara_bayar').val(cara_bayar);
            $('#tipe_resep').val(tipe);
            $('#inResObat').val(idResep);
            $("#collap_nonracikan").collapse('toggle');
            $("#collap_racikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_obat(idResep);
        }
    }

    function pilih_obat1(idResep, tipe, cara_bayar, depo) {

        if (tipe == 2) {
            $('#inDepo').val(depo);
            getObat(depo);
            $('#form_racikan').hide();
            $("#collap_racikan").collapse('toggle');
            $("#collap_nonracikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_racikan(idResep);

        } else {
            $('#inDepo').val(depo);
            getObat(depo);
            $('#formObat').hide();
            $("#collap_nonracikan").collapse('toggle');
            $("#collap_racikan").collapse('hide');
            reload_total_obat(idResep);
            reload_data_obat(idResep);
        }
    }

    function batalFarmasi() {
        $("#collap_nonracikan").collapse('hide');
        $("#collap_racikan").collapse('hide');
    }

    function insert_resep() {
        jenis_resep = $('#inJenisResep').val();
        nama_resep = $('#inNamaResep').val();
        depo = $('#inDepo1').val();
        id_pelayanan = $('#inPelResep').val();
        id_history = $('#inHisResep').val();
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_resep' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                jenis_resep: jenis_resep,
                nama_resep: nama_resep,
                depo: depo,
                id_pelayanan: id_pelayanan,
                id_history: id_history
            },
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#inJenisResep').val(1).change();
                    $('#inNamaResep').val('');
                    $("#collap_nonracikan").collapse('hide');
                    $("#collap_racikan").collapse('hide');
                    $('#tableresep').DataTable().ajax.reload();
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

    function insert_resep_racikan() {
        resep = $('#inResep').val();
        id_resep = $('#inResObat').val();
        signa = $('#inSigna1').val();
        cara_pakai = $('#inCaraPakai1').val();

        $.ajax({
            url: "<?= base_url() . 'Poli/insert_resep_racikan' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                resep: resep,
                id_resep: id_resep,
                signa: signa,
                cara_pakai: cara_pakai
            },
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });

                    $('#inResep').val('');
                    $('#inSigna1').val(signa).change();
                    $('#inCaraPakai1').val('');
                    $("#collap_nonracikan").collapse('hide');
                    $("#collap_racikan").collapse('show');
                    $('#tableRacikan').DataTable().ajax.reload();
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

    function insert_Obat() {
        id_pelayanan = $('#inPelResep').val();
        id_history = $('#inHisResep').val();
        id_resep = $('#inResObat').val();

        caraBayar = $('#cara_bayar').val();
        tipe = $('#tipe_resep').val();

        depo = $("#inDepo").val();


        ket = $("#inKeteranganObat").val();
        id_list_tindakan = $("#inIdLog").val();

        harga = $("#inHargaCost").val();
        ppn = $("#inPpn").val();
        margin = $("#inMargin").val();


        ppn = harga * (ppn / 100);
        harga = Number(harga) + Number(ppn);
        hargaMargin = Number(harga) * Number(margin);

        frek = parseFloat($("#inJumlahObat").val());
        disc = parseFloat($("#inDisc").val());
        expire = $('#inTglExp').val();
        jumlahKurang = frek * -1;

        // if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
        //     total = harga * frek;
        // } else if (caraBayar == "WA14BJ84" && tipe == "3") {
        //     total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        // } else {
        total = hargaMargin * frek;

        //}
        signa = $('#inSigna').val();
        cara_pakai = $('#inCaraPakai').val();

        $.ajax({
            url: "<?= base_url() . 'Poli/insert_obat' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
                id_resep: id_resep,
                depo: depo,
                margin: margin,
                ket: ket,
                harga: harga,
                frek: frek,
                disc: disc,
                expire: expire,
                jumlahKurang: jumlahKurang,
                total: total,
                id_list_tindakan: id_list_tindakan,
                signa: signa,
                cara_pakai: cara_pakai,
                jenis_pelayanan: '<?= $jenis_pelayanan ?>',
                tipe: tipe
            },
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#formObat')[0].reset();
                    $("#collap_nonracikan").collapse('show');

                    $("#collap_racikan").collapse('hide');
                    $('#tableobat').DataTable().ajax.reload();
                    // $('#inDepo').val('APOTIK').change();
                    //getObat(depo);
                    // $('#inGolongan').val('-').change();
                    $('#inObat').val('').change();
                    $('#inTglExp').val('');
                    $("#inKeteranganObat").removeData();
                    $("#inJumlahObat").val('1');
                    $("#inDisc").val(0);
                    $("#outBiayaTindakanObat").val('');
                    $("#outBiayaMarginObat").val('');
                    $("#outStok").val('0');
                    $("#outTotalObat").val('');
                    $('#inSigna').val(signa).change();
                    // $('#inCaraPakai').val('-').change();

                } else if (data.status == "error") {
                    $.toast({
                        heading: 'Error!',
                        text: 'Stok tidak sesuai dengan permintaan',
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
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
    $('#modal_edit_resep').on('hidden.bs.modal', function() {
        // $('#inDepo').val('APOTIK').change();
        $('#inObat').val('').change();
        $('#inTglExp').val('').change();
        $("#inKeteranganObat").removeData();
        $("#inJumlahObat").val('1');
        $("#inDisc").val(0);
        $("#outBiayaTindakanObat").val('0');
        $("#outBiayaMarginObat").val('0');
        $("#outStok").val('0');
        $("#outTotalObat").val('0');
        $('#inSigna').val('-').change();
        $('#inCaraPakai').val('-').change();
        $('#inResep').val('');
        $('#inJenisResep').val(1).change();
        $('#inNamaResep').val('');
    })

    function cetakSigna1() {
        // id_resep = $('#inResObat').val();
        id_tindakan = $('#inResObat1').val();
        signa = $('#inSigna').val();
        cara_pakai = $('#inCaraPakai').val();
        $.ajax({
            url: "<?php echo base_url() ?>Apotik/cetak_signa",
            method: "POST",
            dataType: 'json',
            data: {
                signa: signa,
                cara_pakai: cara_pakai,
                id_tindakan: id_tindakan
            },
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = '<?php echo base_url() ?>Apotik/print_signa/' + id_tindakan;

                } else {
                    swal({
                        title: "Gagal!",
                        text: data.error,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
                    });
                }
            }

        });
        return false;
    }

    function cetakSigna(id, id_resep) {
        id_tindakan = id;
        window.location.href = '<?php echo base_url() ?>Apotik/print_signa/' + id_tindakan;
    }

    function hapus_resep(id_resep, nama) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + nama + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Poli/hapus_resep",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_resep: id_resep,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tableresep').DataTable().ajax.reload();
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
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
            });
        });
        return false;
    }

    function hapus_obat(id, nama, depo) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + nama + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Poli/hapus_obat",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                        depo: depo
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tableobat').DataTable().ajax.reload();
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
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
            });
        });
        return false;
    }



    function hapus_racikan(id_racikan) {
        swal({
            title: "Apakah kamu yakin?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Poli/hapus_racikan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_racikan: id_racikan
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tableRacikan').DataTable().ajax.reload();
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
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
            });
        });
        return false;
    }

    function request(id_resep, jenis_resep) {
        $.ajax({
            url: "<?= base_url() . 'Poli/request_resep' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id_resep: id_resep,
                jenis_resep: jenis_resep
            },
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#tableresep').DataTable().ajax.reload();
                    //$('#tableRacikan').DataTable().ajax.reload();


                } else if (data.status == "error") {
                    swal({
                        title: "Tindakan Belum Diisi",
                        type: "warning",
                        text: "Silahkan isi tindakan terlebih dahulu",
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
    // $(document).ready(function() {

    //     $('#inObat').change(function() {
    //         obat = $('#inObat').val();
    //         splitDiag = obat.split("|");
    //         tgl = splitDiag[3];
    //         $('#inTglExp').val(tgl);
    //         stok = splitDiag[4];
    //         $("#outStok").val(stok);
    //     });
    // });

    function getObat(depo) {
        if (depo != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>Poli/getNamaObat",
                method: "POST",
                data: {
                    depo: depo
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html = '<option value="">-</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].ppn + '|' + '>' + data[i].nama + '</option>';
                    }
                    $('#inObat').html(html);
                }
            });
        } else {
            $('#inObat').html('<option value="">-</option>');
        }
    }

    function getObatByGol() {
        gol = $('#inGolongan').val();
        depo = $('#inDepo').val();
        if (gol != '-') {
            $.ajax({
                url: "<?php echo base_url(); ?>Poli/getNamaObatByGol",
                method: "POST",
                data: {
                    gol: gol,
                    depo: depo
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html = '<option value="">-</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].ppn + '|' + '>' + data[i].nama + '</option>';
                    }
                    $('#inObat').html(html);
                }
            });
        } else {
            $('#inObat').html('<option value="">-</option>');
        }
    }

    function setHarga() {

        caraBayar = $('#cara_bayar').val();
        tipe = $('#tipe_resep').val();
        obat = $('#inObat').val();
        //plitDiag = obat.split("|");
        //stok = (splitDiag[4]);
        disc = parseFloat($("#inDisc").val());
        if (disc > 35) {
            disc = 35;
        }
        if (caraBayar == "WA14BJ84") {
            disc = 0;
        }

        $("#inDisc").val(disc);


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

        // 		  if (document.getElementById('inRadioCost').checked ) {
        // if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
        //     total = harga * frek;
        // } else if (caraBayar == "WA14BJ84" && tipe == "3") {
        //     total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        // } else {
        total = hargaMargin * frek;
        //}
        $("#outTotalObat").val(convertToRupiah(total.toFixed(0)));

    }
</script>