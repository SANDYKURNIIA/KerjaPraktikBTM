<<<<<<< HEAD
<!-- MOdal ALKES -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_OK" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">TINDAKAN PASIEN</h6>
                        </div>
                        <div class="clearfix"></div>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-equalizer mr-10"></i> ALKES
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body mt-20" style="margin-left:-1em">
                            <div class="row">
                                <div class="col-md-6">
                                    <form id="dataAlkes">
                                    <label for="" class="control-label col-md-3">NAMA ALKES</label>
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                    <input type="hidden" id="id_pelayanan" name="id_pelayanan">
                                        <input type="text" name="nmTindakanAlkes" id="nmTindakanAlkes" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="control-label col-md-3">TIPE</label>
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <select name="tipeTindakanAlkes" id="tipeTindakanAlkes" class="form-control select2">
                                        <option value="-">-</option>
                                                <?php
                                                foreach ($tipe as $row) {
                                                ?>
                                                    <option value="<?php echo $row["keterangan"]; ?>"><?php echo $row["keterangan"]; ?></option>
                                                <?php }  ?>
                                        </select>
                                    </div>
                                </div>             
                            </div>
                            <div class="row">
                                    <div class="col-md-6">
                                        <br>
                                        <label for="" class="control-label col-md-3">JUMLAH</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                            <input type="number" class="form-control" id="jmlTindakanAlkes" name="jmlTindakanAlkes">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <label for="" class="control-label col-md-3">HARGA</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                            <input type="number" class="form-control" id="hargaTindakanAlkes" name="hargaTindakanAlkes">
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                        <br>
                                        <label for="" class="control-label col-md-3">TOTAL</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                            <input type="text" class="form-control" id="totalHargaAlkes" name="totalHargaAlkes" disabled>
                                            <br><br>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <br>
                                        <label for="" class="control-label col-md-3">KETERANGAN</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                            <textarea name="keteranganAlkes" class="form-control" id="keteranganAlkes" cols="30" rows="10"></textarea>
                                            <br><br>
                                        </div>
                                </div> 
                                </form>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="clearfix">&nbsp;</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn btn-success btn-square" onclick="insert_tindakan_alkes()">SUBMIT</div>
                                </div>
                            </div>

                            <div class="panel-wrapper collapse in mb-20 mt-20" id="outListTindakanApelkes">
                                <h6 class="txt-dark capitalize-font pl-20 mb-0"><i class="icon-list mr-10"></i>LIST DETAIL</h6>
                                <hr width="95% mb-0">
                                <div class="panel-body mt-0">
                                    <div class="table-wrap mt-0">
                                        <div class="table-responsive mt-0">
                                            <table id="table_alkes" class="table table-hover display pb-30 mt-10" width="100%">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>HAPUS</th>
                                                        <th>NAMA TINDAKAN</th>
                                                        <th>TIPE</th>
                                                        <th>BIAYA TINDAKAN</th>
                                                        <th>JUMLAH TINDAKAN</th>
                                                        <th>TOTAL BIAYA</th>
                                                        <th>KETERANGAN</th>
                                                        <th>NAMA STAFF</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>HAPUS</th>
                                                        <th>NAMA TINDAKAN</th>
                                                        <th>TIPE</th>
                                                        <th>BIAYA TINDAKAN</th>
                                                        <th>JUMLAH TINDAKAN</th>
                                                        <th>TOTAL BIAYA</th>
                                                        <th>KETERANGAN</th>
                                                        <th>NAMA STAFF</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
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
</div>
<!-- END MODALS ALKES -->

<!-- MOdal Tindakan Dokter -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tindakan_dokter" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">TINDAKAN PASIEN</h6>
                        </div>
                        <div class="clearfix"></div>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-equalizer mr-10"></i> LIST DOKTER
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body mt-20" style="margin-left:-1em">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA DOKTER</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12 ">
                                            <select class="form-control filled-input rounded-input select2" id="inDokter">
                                                <?php
                                                foreach ($data_dokter as $d) : ?>
                                                    <option value="<?php echo $d->id_dokter; ?>">
                                                        <?php echo $d->nama; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <input type="hidden" class="form-control" id="idPelayanan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TIPE DOKTER</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12 ">
                                            <select class="form-control filled-input rounded-input select2" id="inJenisDokter">
                                                <option value="OPERATOR">OPERATOR</option>
                                                <option value="ANASTESI">ANASTESI</option>
                                                <option value="PENDAMPING">PENDAMPING</option>
                                            </select>
                                            <br>
                                            <br>
                                        </div>
                                        <div class="btn btn-success btn-square " onclick="insert_tindakan()">SUBMIT</div>
                                    </div>
                                </div>

                            </div>
                            <div class="panel-wrapper collapse in mb-20 mt-20" id="outListTindakanApelkes">
                                <h6 class="txt-dark capitalize-font pl-20 mb-0"><i class="icon-list mr-10"></i>LIST DETAIL</h6>
                                <hr width="95% mb-0">
                                <div class="panel-body mt-0">
                                    <div class="table-wrap mt-0">
                                        <div class="table-responsive mt-0">
                                            <table id="table_tindakan_dokter" class="table table-hover display pb-30 mt-10" width="100%">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>NAMA DOKTER</th>
                                                        <th>TIPE DOKTER</th>
                                                        <th>HAPUS</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>NAMA DOKTER</th>
                                                        <th>TIPE DOKTER</th>
                                                        <th>HAPUS</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
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
</div>
<!-- obat ok -->
<div class="modal fade bs-example-modal-lg" id="modal_obat" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
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
                    <div class="form-body">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                        </h6>
                        <hr width="95%">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NAMA OBAT</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" id="inObat" onchange="setHarga()">
                                            <option value="-">-</option>
                                            <?php

                                            foreach ($obat as $row) {
                                                $harga = ($row["harga_cost"]/$row["satuan_ok"]) * 1.11;
                                                $stok =  $row["stok"] * $row["satuan_ok"];
                                            ?>
                                                <option value="<?php echo $row["id_logistik"] . '|' . $harga . '|' . $row["margin"] . '|' . $row["kadaluarsa"] . '|' . $stok; ?>"><?php echo $row["nama"] .' ('. $row["produsen"] .')'; ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">DISCOUNT</label>
                                    <div class="col-md-3 has-success">
                                        <input type="number" placeholder="Disc" max="35" class="form-control" id="inDisc" value="0" oninput="setHarga()">
                                    </div>
                                    <div class="col-md-1">
                                        %
                                    </div>
                                </div>
                            </div>
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">PILIHAN HARGA</label>
                                    <div class="col-md-9">
                                        <div class="radio-list">
                                            <div class="radio-inline pl-0">
                                                <span class="radio radio-info">
                                                    <input type="radio" name="inRadioPilihanHarga" id="inRadioCost" value="option1" onclick="setHarga()">
                                                    <label for="inRadioCost">HNA+PPN (BPJS)</label>
                                                </span>
                                            </div>
                                            <div class="radio-inline pl-0">
                                                <span class="radio radio-info">
                                                    <input type="radio" name="inRadioPilihanHarga" id="inRadioMargin" value="option2" onclick="setHarga()" checked="true">
                                                    <label for="inRadioMargin">HARGA+MARGIN</label>
                                                </span>
                                            </div>
                                        </div>
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


                        </div>
                        <!-- <div class="row" style="margin-top: 10px;" id="cetakSigna">

                            <div class="col-md-6">
                                <label class="control-label col-md-3">SIGNA OBAT</label>
                                <div class="col-md-9 has-success">
                                    <select class="form-control filled-input rounded-input select2" id="inSigna">
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
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div> -->
                        <input type="hidden" class="form-control" disabled="" id="cara_bayar">
                        <input type="hidden" class="form-control" id="inPelObat">
                        <input type="hidden" class="form-control" id="inHisObat">
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
                        <div class="panel-wrapper collapse in mb-20 mt-20" id="outListTindakanApelkes">
                            <h6 class="txt-dark capitalize-font pl-20 mb-0"><i class="icon-list mr-10"></i>TINDAKAN OBAT</h6>
                            <hr width="95% mb-0">
                            <div class="panel-body mt-0">
                                <div class="table-wrap mt-0">
                                    <div class="table-responsive mt-0">
                                        <table id="tableobat" class="table table-hover display pb-30 mt-10" width="100%">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>NAMA OBAT</th>
                                                    <th>EXPIRE DATE</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>TOTAL BIAYA</th>
                                                    <th>NAMA STAFF</th>
                                                    <th>HAPUS</th>
                                                    <!-- <th>SIGNA</th> -->
                                                </tr>
                                            </thead>
                                            <tbody style="color: black">
                                            </tbody>
                                            <tfoot>
                                                <th>NO</th>
                                                <th>NAMA OBAT</th>
                                                <th>EXPIRE DATE</th>
                                                <th>HARGA OBAT</th>
                                                <th>JUMLAH OBAT</th>
                                                <th>TOTAL BIAYA</th>
                                                <th>NAMA STAFF</th>
                                                <th>HAPUS</th>
                                            </tfoot>
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
                                                <table class="table table-hover display " id="outTotalHarga1">
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

                        <span class="help-block"></span>
                        <div align="right">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <div id="cetakFarmasi" onclick="cetak_resep()" class="btn btn-success mr-10">CETAK RESEP</div>
                                            <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>

                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        </hr>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('page_content/Form_ok'); ?>

<style>
    td {
        color: black;
    }
</style>
<script type="text/javascript">
    function reload_data_total1(id_pelayanan) {
        $('#outTotalHarga1').dataTable().fnClearTable();
        $('#outTotalHarga1').dataTable().fnDestroy();
        $('#outTotalHarga1').DataTable({
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
                "sSearch": "Pencarian:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir",
                }
            },
            "ajax": {
                "url": '<?php echo base_url('OK_Pasien/tampil_list_total'); ?>',
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

    function setHarga() {

        // caraBayar = $('#cara_bayar').val();

        obat = $('#inObat').val();
        splitDiag = obat.split("|");
        stok = (splitDiag[4]);

        $("#outStok").val(stok);

        harga = parseFloat(splitDiag[1]);
        hargaMargin = harga * parseFloat(splitDiag[2]);
        $("#outBiayaTindakanObat").val(convertToRupiah(harga.toFixed(0)));
        $("#outBiayaMarginObat").val(convertToRupiah(hargaMargin.toFixed(0)));

        frek = parseFloat($("#inJumlahObat").val());
        if (frek > stok) {
            $("#inJumlahObat").val(stok);
        } else if (frek < 0) {
            $("#inJumlahObat").val(1);
        }


        disc = parseFloat($("#inDisc").val());

        if (document.getElementById('inRadioCost').checked) {
            total = harga * frek * (1 - (disc * 0.01));
        } else {
            total = hargaMargin * frek * (1 - (disc * 0.01));
        }

        $("#outTotalObat").val(convertToRupiah(total.toFixed(0)));

    }
    $('#inObat').change(function() {
        obat = $('#inObat').val();
        splitDiag = obat.split("|");
        tgl = splitDiag[3];
        $('#inTglExp').val(tgl);
        stok = splitDiag[4];
        $("#outStok").val(stok);
    });

    function insert_Obat() {
        id_pelayanan = $('#inPelObat').val();
        id_history = $('#inHisObat').val();
        a = $("#inObat").val();
        splitDiag = a.split("|");
        margin = parseFloat(splitDiag[2]);

        id_list_tindakan = splitDiag[0];
        harga = parseFloat(splitDiag[1]);
        hargaMargin = harga * parseFloat(splitDiag[2]);

        frek = parseFloat($("#inJumlahObat").val());
        disc = parseFloat($("#inDisc").val());
        expire = (splitDiag[3]);
        jumlahKurang = frek * -1;

        if (document.getElementById('inRadioCost').checked) {
            total = harga * frek * (1 - (disc * 0.01));
        } else {
            total = hargaMargin * frek * (1 - (disc * 0.01));
        }

        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/insert_obat' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
                margin: margin,
                harga: harga,
                frek: frek,
                disc: disc,
                expire: expire,
                jumlahKurang: jumlahKurang,
                total: total,
                id_list_tindakan: id_list_tindakan,
            },
            success: function(data) {
                if (data.status == "success") {

                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    })

                    $('#tableobat').DataTable().ajax.reload();
                    $('#outtotalharga1').DataTable().ajax.reload();
                    reload_data_total1(id_pelayanan);
                    $('#inObat').val('-').change();
                    $('#inTglExp').empty().trigger('change');
                    $("#inJumlahObat").val('1');
                    $("#inDisc").val(0);
                    $("#outBiayaTindakanObat").val('');
                    $("#outBiayaMarginObat").val('');
                    $("#outStok").val('0');
                    $("#outTotalObat").val('');
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

    function hapus_obat(id, nama, id_pelayanan) {
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
                    url: "<?php echo base_url() ?>OK_Pasien/hapus_obat",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tableobat').DataTable().ajax.reload();
                            reload_data_total1(id_pelayanan);
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

    function cetak_resep() {
        id_pel = $('#inPelObat').val();
        id_his = $('#inHisObat').val();
        window.location.href = '<?php echo base_url('OK_Pasien/print_resep/'); ?>' + id_pel + '/' + id_his;
    }

    function tampilTindakanFarmasi(id_pelayanan, id_history) {
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
                    if(data.cara_bayar == 'BPJS'){
                        $("#inCaraBayar").val('BPJS').change();
                    }else if(data.cara_bayar == 'NON BPJS'){
                        $("#inCaraBayar").val('NON BPJS').change();
                    } else {
                        $("#inCaraBayar").val('BPJSTK').change();
                    }
                    $("#id_pelayanan").val(data.id_pelayanan);
                    $("#modal_tindakan").modal('show');
                    reload_data_tindakan(id_pelayanan);
                    reload_total_harga(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function tampilTindakanObat(id_pelayanan, id_history) {
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
                    $("#inPelObat").val(id_pelayanan);
                    $("#inHisObat").val(id_history);
                    $("#modal_obat").modal('show');
                    reload_data_obat(id_pelayanan);
                    reload_data_total1(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }
    $('#modal_obat').on('hidden.bs.modal', function() {
        $('#inObat').val('-').change();
        $('#inTglExp').empty().trigger('change');
        $("#inJumlahObat").val('1');
        $("#inDisc").val(0);
        $("#outBiayaTindakanObat").val('');
        $("#outBiayaMarginObat").val('');
        $("#outStok").val('0');
        $("#outTotalObat").val('');
        $('#datable').DataTable().ajax.reload();
    })

    function cariTindakan() {
        jenis = $("#inJenis").val();
        cara_bayar = $("#inCaraBayar").val();
        tipe = $("#inTipe").val();
        tipeKamar = $("#inTipeKamar").val();
        keterangan = $("#inKeterangan").val();
        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/cariTindakan' ?>",
            data: {
                cara_bayar: cara_bayar,
                tipe: tipe,
                tipeKamar: tipeKamar,
                keterangan: keterangan,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {

                var html = '';
                var i;
                html = '<option value=0>-</option>';
                for (i = 0; i < data.length; i++) {
                    var harga1 = Number(data[i].harga_sarana);
                    var harga2 = Number(data[i].harga_jasa);
                    var harga = harga1 + harga2;
                    html +=
                        '<option value=' + data[i].id_list_kamar_ok + '|' + harga + '>' + data[i].nama + '</option>';
                }
                $('#inTindakan').html(html);
            }
        });
    }

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    

    function reload_data_obat(id_pelayanan) {
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
                "url": '<?php echo base_url('OK_Pasien/tampil_obat'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan,
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

    function tampilTindakanDokter(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/getDataDokter' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {

                if (data.status_dt == "found") {
                    //disini set datanya ke modal
                    $("#idPelayanan").val(data.id_pelayanan);
                    $("#modal_tindakan_dokter").modal('show');
                    reload_data_tindakan_dokter(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function insert_tindakan() {
        dokter = $("#inDokter").val();
        tipe = $("#inJenisDokter").val();
        var ID = Math.random().toString(36).substr(2, 16);
        idPelayanan = $('#idPelayanan').val();

        dataString = 'id=' + ID + '&dokter=' + dokter +
            '&idPelayanan=' + idPelayanan + '&tipe=' + tipe;
        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/insert_tindakan' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#table_tindakan_dokter').DataTable().ajax.reload();
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

    function hapus_data_tindakan_dokter(id_list_dokter) { //utk hapus diagnosa pasien
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + id_list_dokter + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>OK_Pasien/hapus_data_tindakan_dokter",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_list_dokter: id_list_dokter,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#table_tindakan_dokter').DataTable().ajax.reload();
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

    
</script>
<script type="text/javascript">
    function reload_data_tindakan_dokter(idPelayanan) {
        $('#table_tindakan_dokter').dataTable().fnClearTable();
        $('#table_tindakan_dokter').dataTable().fnDestroy();
        $('#table_tindakan_dokter').DataTable({
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
                "url": '<?php echo base_url('OK_Pasien/tampil_list_tindakan_dokter'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: idPelayanan
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

    function listAlkes(id_pelayanan,id_history){
        $('#modal_OK').modal('show');
        $("#id_pelayanan").val(id_pelayanan);
        $('#table_alkes').dataTable().fnClearTable();
        $('#table_alkes').dataTable().fnDestroy();
        $('#table_alkes').DataTable({
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
                "sSearch": "Cari Tindakan:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir",
                }
            },
            "ajax": {
                "url": '<?php echo base_url('OK_Pasien/viewDataAlkes'); ?>',
                "type": 'POST',
                "data": {
                    idPelayanan: id_pelayanan
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

    $(document).ready(function(){
        $('#jmlTindakanAlkes').val(0);
        $('#hargaTindakanAlkes').val(0);
    });

    $("#jmlTindakanAlkes").on("input",function(){
        $("#totalHargaAlkes").val($('#jmlTindakanAlkes').val()*$('#hargaTindakanAlkes').val());
    });
    $("#hargaTindakanAlkes").on("input",function(){
        $("#totalHargaAlkes").val($('#jmlTindakanAlkes').val()*$('#hargaTindakanAlkes').val());
    });

    function insert_tindakan_alkes(){
        var formData = $("#dataAlkes").serializeArray();
        $.ajax({
            url:"<?= base_url("OK_Pasien/insertDataAlkes") ?>",
            method:"POST",
            dataType:"JSON",
            cache:false,
            data:{
                id_pelayanan:formData[0].value,
                nmTindakanAlkes:formData[1].value,
                tipeTindakanAlkes:formData[2].value,
                hargaTindakanAlkes:formData[4].value,
                jmlTindakanAlkes:formData[3].value,
                totalHargaAlkes:$("#totalHargaAlkes").val(),
                keteranganAlkes:formData[5].value.replace(/\r?\n/g, '<br />'),
            },success:function(res){
                if(res.status == "mantab"){
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil diSimpan",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#table_alkes').DataTable().ajax.reload();
                    $("#nmTindakanAlkes").val("");
                    $("#jmlTindakanAlkes").val("");
                    $("#tipeTindakanAlkes").val("-").trigger("change");
                    $("#hargaTindakanAlkes").val("");
                    $("#totalHargaAlkes").val("");
                    $("#keteranganAlkes").val("");
                } else{
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


    function hapus_alkes(nama,id_tindakan){
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
                    url: "<?php echo base_url() ?>OK_Pasien/hapusAlkes",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        idTindakanAlkes: id_tindakan,
                    },
                    success: function(data) {
                        if (data.status == "mantab") {
                            $('#table_alkes').DataTable().ajax.reload();
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

    $('#jmlTindakanAlkes').keypress(function(event){
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault(); //stop character from entering input
        }
});

$('#hargaTindakanAlkes').keypress(function(event){
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault(); //stop character from entering input
        }
});
=======
<!-- MOdal ALKES -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_OK" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">TINDAKAN PASIEN</h6>
                        </div>
                        <div class="clearfix"></div>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-equalizer mr-10"></i> ALKES
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body mt-20" style="margin-left:-1em">
                            <div class="row">
                                <div class="col-md-6">
                                    <form id="dataAlkes">
                                    <label for="" class="control-label col-md-3">NAMA ALKES</label>
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                    <input type="hidden" id="id_pelayanan" name="id_pelayanan">
                                        <input type="text" name="nmTindakanAlkes" id="nmTindakanAlkes" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="control-label col-md-3">TIPE</label>
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <select name="tipeTindakanAlkes" id="tipeTindakanAlkes" class="form-control select2">
                                        <option value="-">-</option>
                                                <?php
                                                foreach ($tipe as $row) {
                                                ?>
                                                    <option value="<?php echo $row["keterangan"]; ?>"><?php echo $row["keterangan"]; ?></option>
                                                <?php }  ?>
                                        </select>
                                    </div>
                                </div>             
                            </div>
                            <div class="row">
                                    <div class="col-md-6">
                                        <br>
                                        <label for="" class="control-label col-md-3">JUMLAH</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                            <input type="number" class="form-control" id="jmlTindakanAlkes" name="jmlTindakanAlkes">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <label for="" class="control-label col-md-3">HARGA</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                            <input type="number" class="form-control" id="hargaTindakanAlkes" name="hargaTindakanAlkes">
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                        <br>
                                        <label for="" class="control-label col-md-3">TOTAL</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                            <input type="text" class="form-control" id="totalHargaAlkes" name="totalHargaAlkes" disabled>
                                            <br><br>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <br>
                                        <label for="" class="control-label col-md-3">KETERANGAN</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12">
                                            <textarea name="keteranganAlkes" class="form-control" id="keteranganAlkes" cols="30" rows="10"></textarea>
                                            <br><br>
                                        </div>
                                </div> 
                                </form>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="clearfix">&nbsp;</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn btn-success btn-square" onclick="insert_tindakan_alkes()">SUBMIT</div>
                                </div>
                            </div>

                            <div class="panel-wrapper collapse in mb-20 mt-20" id="outListTindakanApelkes">
                                <h6 class="txt-dark capitalize-font pl-20 mb-0"><i class="icon-list mr-10"></i>LIST DETAIL</h6>
                                <hr width="95% mb-0">
                                <div class="panel-body mt-0">
                                    <div class="table-wrap mt-0">
                                        <div class="table-responsive mt-0">
                                            <table id="table_alkes" class="table table-hover display pb-30 mt-10" width="100%">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>HAPUS</th>
                                                        <th>NAMA TINDAKAN</th>
                                                        <th>TIPE</th>
                                                        <th>BIAYA TINDAKAN</th>
                                                        <th>JUMLAH TINDAKAN</th>
                                                        <th>TOTAL BIAYA</th>
                                                        <th>KETERANGAN</th>
                                                        <th>NAMA STAFF</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>HAPUS</th>
                                                        <th>NAMA TINDAKAN</th>
                                                        <th>TIPE</th>
                                                        <th>BIAYA TINDAKAN</th>
                                                        <th>JUMLAH TINDAKAN</th>
                                                        <th>TOTAL BIAYA</th>
                                                        <th>KETERANGAN</th>
                                                        <th>NAMA STAFF</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
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
</div>
<!-- END MODALS ALKES -->

<!-- MOdal Tindakan Dokter -->
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tindakan_dokter" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">TINDAKAN PASIEN</h6>
                        </div>
                        <div class="clearfix"></div>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-equalizer mr-10"></i> LIST DOKTER
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-body mt-20" style="margin-left:-1em">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA DOKTER</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12 ">
                                            <select class="form-control filled-input rounded-input select2" id="inDokter">
                                                <?php
                                                foreach ($data_dokter as $d) : ?>
                                                    <option value="<?php echo $d->id_dokter; ?>">
                                                        <?php echo $d->nama; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <input type="hidden" class="form-control" id="idPelayanan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TIPE DOKTER</label>
                                        <div class="col-md-9 col-sm-12 col-xs-12 ">
                                            <select class="form-control filled-input rounded-input select2" id="inJenisDokter">
                                                <option value="OPERATOR">OPERATOR</option>
                                                <option value="ANASTESI">ANASTESI</option>
                                                <option value="PENDAMPING">PENDAMPING</option>
                                            </select>
                                            <br>
                                            <br>
                                        </div>
                                        <div class="btn btn-success btn-square " onclick="insert_tindakan()">SUBMIT</div>
                                    </div>
                                </div>

                            </div>
                            <div class="panel-wrapper collapse in mb-20 mt-20" id="outListTindakanApelkes">
                                <h6 class="txt-dark capitalize-font pl-20 mb-0"><i class="icon-list mr-10"></i>LIST DETAIL</h6>
                                <hr width="95% mb-0">
                                <div class="panel-body mt-0">
                                    <div class="table-wrap mt-0">
                                        <div class="table-responsive mt-0">
                                            <table id="table_tindakan_dokter" class="table table-hover display pb-30 mt-10" width="100%">
                                                <thead>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>NAMA DOKTER</th>
                                                        <th>TIPE DOKTER</th>
                                                        <th>HAPUS</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr class="bg-success">
                                                        <th>NO</th>
                                                        <th>NAMA DOKTER</th>
                                                        <th>TIPE DOKTER</th>
                                                        <th>HAPUS</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
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
</div>
<!-- obat ok -->
<div class="modal fade bs-example-modal-lg" id="modal_obat" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
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
                    <div class="form-body">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                        </h6>
                        <hr width="95%">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NAMA OBAT</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" id="inObat" onchange="setHarga()">
                                            <option value="-">-</option>
                                            <?php

                                            foreach ($obat as $row) {
                                                $harga = ($row["harga_cost"]/$row["satuan_ok"]) * 1.11;
                                                $stok =  $row["stok"] * $row["satuan_ok"];
                                            ?>
                                                <option value="<?php echo $row["id_logistik"] . '|' . $harga . '|' . $row["margin"] . '|' . $row["kadaluarsa"] . '|' . $stok; ?>"><?php echo $row["nama"] .' ('. $row["produsen"] .')'; ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">DISCOUNT</label>
                                    <div class="col-md-3 has-success">
                                        <input type="number" placeholder="Disc" max="35" class="form-control" id="inDisc" value="0" oninput="setHarga()">
                                    </div>
                                    <div class="col-md-1">
                                        %
                                    </div>
                                </div>
                            </div>
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">PILIHAN HARGA</label>
                                    <div class="col-md-9">
                                        <div class="radio-list">
                                            <div class="radio-inline pl-0">
                                                <span class="radio radio-info">
                                                    <input type="radio" name="inRadioPilihanHarga" id="inRadioCost" value="option1" onclick="setHarga()">
                                                    <label for="inRadioCost">HNA+PPN (BPJS)</label>
                                                </span>
                                            </div>
                                            <div class="radio-inline pl-0">
                                                <span class="radio radio-info">
                                                    <input type="radio" name="inRadioPilihanHarga" id="inRadioMargin" value="option2" onclick="setHarga()" checked="true">
                                                    <label for="inRadioMargin">HARGA+MARGIN</label>
                                                </span>
                                            </div>
                                        </div>
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


                        </div>
                        <!-- <div class="row" style="margin-top: 10px;" id="cetakSigna">

                            <div class="col-md-6">
                                <label class="control-label col-md-3">SIGNA OBAT</label>
                                <div class="col-md-9 has-success">
                                    <select class="form-control filled-input rounded-input select2" id="inSigna">
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
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div> -->
                        <input type="hidden" class="form-control" disabled="" id="cara_bayar">
                        <input type="hidden" class="form-control" id="inPelObat">
                        <input type="hidden" class="form-control" id="inHisObat">
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
                        <div class="panel-wrapper collapse in mb-20 mt-20" id="outListTindakanApelkes">
                            <h6 class="txt-dark capitalize-font pl-20 mb-0"><i class="icon-list mr-10"></i>TINDAKAN OBAT</h6>
                            <hr width="95% mb-0">
                            <div class="panel-body mt-0">
                                <div class="table-wrap mt-0">
                                    <div class="table-responsive mt-0">
                                        <table id="tableobat" class="table table-hover display pb-30 mt-10" width="100%">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>NAMA OBAT</th>
                                                    <th>EXPIRE DATE</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>TOTAL BIAYA</th>
                                                    <th>NAMA STAFF</th>
                                                    <th>HAPUS</th>
                                                    <!-- <th>SIGNA</th> -->
                                                </tr>
                                            </thead>
                                            <tbody style="color: black">
                                            </tbody>
                                            <tfoot>
                                                <th>NO</th>
                                                <th>NAMA OBAT</th>
                                                <th>EXPIRE DATE</th>
                                                <th>HARGA OBAT</th>
                                                <th>JUMLAH OBAT</th>
                                                <th>TOTAL BIAYA</th>
                                                <th>NAMA STAFF</th>
                                                <th>HAPUS</th>
                                            </tfoot>
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
                                                <table class="table table-hover display " id="outTotalHarga1">
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

                        <span class="help-block"></span>
                        <div align="right">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <div id="cetakFarmasi" onclick="cetak_resep()" class="btn btn-success mr-10">CETAK RESEP</div>
                                            <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>

                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        </hr>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('page_content/Form_ok'); ?>

<style>
    td {
        color: black;
    }
</style>
<script type="text/javascript">
    function reload_data_total1(id_pelayanan) {
        $('#outTotalHarga1').dataTable().fnClearTable();
        $('#outTotalHarga1').dataTable().fnDestroy();
        $('#outTotalHarga1').DataTable({
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
                "sSearch": "Pencarian:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir",
                }
            },
            "ajax": {
                "url": '<?php echo base_url('OK_Pasien/tampil_list_total'); ?>',
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

    function setHarga() {

        // caraBayar = $('#cara_bayar').val();

        obat = $('#inObat').val();
        splitDiag = obat.split("|");
        stok = (splitDiag[4]);

        $("#outStok").val(stok);

        harga = parseFloat(splitDiag[1]);
        hargaMargin = harga * parseFloat(splitDiag[2]);
        $("#outBiayaTindakanObat").val(convertToRupiah(harga.toFixed(0)));
        $("#outBiayaMarginObat").val(convertToRupiah(hargaMargin.toFixed(0)));

        frek = parseFloat($("#inJumlahObat").val());
        if (frek > stok) {
            $("#inJumlahObat").val(stok);
        } else if (frek < 0) {
            $("#inJumlahObat").val(1);
        }


        disc = parseFloat($("#inDisc").val());

        if (document.getElementById('inRadioCost').checked) {
            total = harga * frek * (1 - (disc * 0.01));
        } else {
            total = hargaMargin * frek * (1 - (disc * 0.01));
        }

        $("#outTotalObat").val(convertToRupiah(total.toFixed(0)));

    }
    $('#inObat').change(function() {
        obat = $('#inObat').val();
        splitDiag = obat.split("|");
        tgl = splitDiag[3];
        $('#inTglExp').val(tgl);
        stok = splitDiag[4];
        $("#outStok").val(stok);
    });

    function insert_Obat() {
        id_pelayanan = $('#inPelObat').val();
        id_history = $('#inHisObat').val();
        a = $("#inObat").val();
        splitDiag = a.split("|");
        margin = parseFloat(splitDiag[2]);

        id_list_tindakan = splitDiag[0];
        harga = parseFloat(splitDiag[1]);
        hargaMargin = harga * parseFloat(splitDiag[2]);

        frek = parseFloat($("#inJumlahObat").val());
        disc = parseFloat($("#inDisc").val());
        expire = (splitDiag[3]);
        jumlahKurang = frek * -1;

        if (document.getElementById('inRadioCost').checked) {
            total = harga * frek * (1 - (disc * 0.01));
        } else {
            total = hargaMargin * frek * (1 - (disc * 0.01));
        }

        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/insert_obat' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
                margin: margin,
                harga: harga,
                frek: frek,
                disc: disc,
                expire: expire,
                jumlahKurang: jumlahKurang,
                total: total,
                id_list_tindakan: id_list_tindakan,
            },
            success: function(data) {
                if (data.status == "success") {

                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    })

                    $('#tableobat').DataTable().ajax.reload();
                    $('#outtotalharga1').DataTable().ajax.reload();
                    reload_data_total1(id_pelayanan);
                    $('#inObat').val('-').change();
                    $('#inTglExp').empty().trigger('change');
                    $("#inJumlahObat").val('1');
                    $("#inDisc").val(0);
                    $("#outBiayaTindakanObat").val('');
                    $("#outBiayaMarginObat").val('');
                    $("#outStok").val('0');
                    $("#outTotalObat").val('');
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

    function hapus_obat(id, nama, id_pelayanan) {
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
                    url: "<?php echo base_url() ?>OK_Pasien/hapus_obat",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tableobat').DataTable().ajax.reload();
                            reload_data_total1(id_pelayanan);
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

    function cetak_resep() {
        id_pel = $('#inPelObat').val();
        id_his = $('#inHisObat').val();
        window.location.href = '<?php echo base_url('OK_Pasien/print_resep/'); ?>' + id_pel + '/' + id_his;
    }

    function tampilTindakanFarmasi(id_pelayanan, id_history) {
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
                    if(data.cara_bayar == 'BPJS'){
                        $("#inCaraBayar").val('BPJS').change();
                    }else if(data.cara_bayar == 'NON BPJS'){
                        $("#inCaraBayar").val('NON BPJS').change();
                    } else {
                        $("#inCaraBayar").val('BPJSTK').change();
                    }
                    $("#id_pelayanan").val(data.id_pelayanan);
                    $("#modal_tindakan").modal('show');
                    reload_data_tindakan(id_pelayanan);
                    reload_total_harga(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function tampilTindakanObat(id_pelayanan, id_history) {
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
                    $("#inPelObat").val(id_pelayanan);
                    $("#inHisObat").val(id_history);
                    $("#modal_obat").modal('show');
                    reload_data_obat(id_pelayanan);
                    reload_data_total1(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }
    $('#modal_obat').on('hidden.bs.modal', function() {
        $('#inObat').val('-').change();
        $('#inTglExp').empty().trigger('change');
        $("#inJumlahObat").val('1');
        $("#inDisc").val(0);
        $("#outBiayaTindakanObat").val('');
        $("#outBiayaMarginObat").val('');
        $("#outStok").val('0');
        $("#outTotalObat").val('');
        $('#datable').DataTable().ajax.reload();
    })

    function cariTindakan() {
        jenis = $("#inJenis").val();
        cara_bayar = $("#inCaraBayar").val();
        tipe = $("#inTipe").val();
        tipeKamar = $("#inTipeKamar").val();
        keterangan = $("#inKeterangan").val();
        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/cariTindakan' ?>",
            data: {
                cara_bayar: cara_bayar,
                tipe: tipe,
                tipeKamar: tipeKamar,
                keterangan: keterangan,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {

                var html = '';
                var i;
                html = '<option value=0>-</option>';
                for (i = 0; i < data.length; i++) {
                    var harga1 = Number(data[i].harga_sarana);
                    var harga2 = Number(data[i].harga_jasa);
                    var harga = harga1 + harga2;
                    html +=
                        '<option value=' + data[i].id_list_kamar_ok + '|' + harga + '>' + data[i].nama + '</option>';
                }
                $('#inTindakan').html(html);
            }
        });
    }

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    

    function reload_data_obat(id_pelayanan) {
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
                "url": '<?php echo base_url('OK_Pasien/tampil_obat'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan,
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

    function tampilTindakanDokter(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/getDataDokter' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {

                if (data.status_dt == "found") {
                    //disini set datanya ke modal
                    $("#idPelayanan").val(data.id_pelayanan);
                    $("#modal_tindakan_dokter").modal('show');
                    reload_data_tindakan_dokter(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function insert_tindakan() {
        dokter = $("#inDokter").val();
        tipe = $("#inJenisDokter").val();
        var ID = Math.random().toString(36).substr(2, 16);
        idPelayanan = $('#idPelayanan').val();

        dataString = 'id=' + ID + '&dokter=' + dokter +
            '&idPelayanan=' + idPelayanan + '&tipe=' + tipe;
        $.ajax({
            url: "<?= base_url() . 'OK_Pasien/insert_tindakan' ?>",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#table_tindakan_dokter').DataTable().ajax.reload();
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

    function hapus_data_tindakan_dokter(id_list_dokter) { //utk hapus diagnosa pasien
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + id_list_dokter + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>OK_Pasien/hapus_data_tindakan_dokter",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_list_dokter: id_list_dokter,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#table_tindakan_dokter').DataTable().ajax.reload();
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

    
</script>
<script type="text/javascript">
    function reload_data_tindakan_dokter(idPelayanan) {
        $('#table_tindakan_dokter').dataTable().fnClearTable();
        $('#table_tindakan_dokter').dataTable().fnDestroy();
        $('#table_tindakan_dokter').DataTable({
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
                "url": '<?php echo base_url('OK_Pasien/tampil_list_tindakan_dokter'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: idPelayanan
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

    function listAlkes(id_pelayanan,id_history){
        $('#modal_OK').modal('show');
        $("#id_pelayanan").val(id_pelayanan);
        $('#table_alkes').dataTable().fnClearTable();
        $('#table_alkes').dataTable().fnDestroy();
        $('#table_alkes').DataTable({
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
                "sSearch": "Cari Tindakan:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir",
                }
            },
            "ajax": {
                "url": '<?php echo base_url('OK_Pasien/viewDataAlkes'); ?>',
                "type": 'POST',
                "data": {
                    idPelayanan: id_pelayanan
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

    $(document).ready(function(){
        $('#jmlTindakanAlkes').val(0);
        $('#hargaTindakanAlkes').val(0);
    });

    $("#jmlTindakanAlkes").on("input",function(){
        $("#totalHargaAlkes").val($('#jmlTindakanAlkes').val()*$('#hargaTindakanAlkes').val());
    });
    $("#hargaTindakanAlkes").on("input",function(){
        $("#totalHargaAlkes").val($('#jmlTindakanAlkes').val()*$('#hargaTindakanAlkes').val());
    });

    function insert_tindakan_alkes(){
        var formData = $("#dataAlkes").serializeArray();
        $.ajax({
            url:"<?= base_url("OK_Pasien/insertDataAlkes") ?>",
            method:"POST",
            dataType:"JSON",
            cache:false,
            data:{
                id_pelayanan:formData[0].value,
                nmTindakanAlkes:formData[1].value,
                tipeTindakanAlkes:formData[2].value,
                hargaTindakanAlkes:formData[4].value,
                jmlTindakanAlkes:formData[3].value,
                totalHargaAlkes:$("#totalHargaAlkes").val(),
                keteranganAlkes:formData[5].value.replace(/\r?\n/g, '<br />'),
            },success:function(res){
                if(res.status == "mantab"){
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil diSimpan",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#table_alkes').DataTable().ajax.reload();
                    $("#nmTindakanAlkes").val("");
                    $("#jmlTindakanAlkes").val("");
                    $("#tipeTindakanAlkes").val("-").trigger("change");
                    $("#hargaTindakanAlkes").val("");
                    $("#totalHargaAlkes").val("");
                    $("#keteranganAlkes").val("");
                } else{
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


    function hapus_alkes(nama,id_tindakan){
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
                    url: "<?php echo base_url() ?>OK_Pasien/hapusAlkes",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        idTindakanAlkes: id_tindakan,
                    },
                    success: function(data) {
                        if (data.status == "mantab") {
                            $('#table_alkes').DataTable().ajax.reload();
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

    $('#jmlTindakanAlkes').keypress(function(event){
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault(); //stop character from entering input
        }
});

$('#hargaTindakanAlkes').keypress(function(event){
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault(); //stop character from entering input
        }
});
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>