<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">RIWAYAT PASIEN</span></h6>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-3 mt-20 pl-5">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
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
                                <th>TINDAKAN</th>
                                <th>RETUR</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>TANGGAL REQ</th>
                                <th>JAM REQ</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>NO NOTA</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>ALAMAT</th>
                                <th>CARA MASUK</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>JENIS KLAIM</th>
                                <th>DIAGNOSA</th>
                                <th>DOKTER DPJP</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TINDAKAN</th>
                                <th>RETUR</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>TANGGAL REQ</th>
                                <th>JAM REQ</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>NO NOTA</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>ALAMAT</th>
                                <th>CARA MASUK</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>JENIS KLAIM</th>
                                <th>DIAGNOSA</th>
                                <th>DOKTER DPJP</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_tindakan" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT DATA KUNJUNGAN
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="collapse" id="collap_obat">
                            <div class="form-body">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                                </h6>
                                <hr width="95%">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DEPO</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="inDepo">
                                                    <option value="APOTIK">APOTIK</option>
                                                    <!-- <option value="IGD">IGD</option> -->
                                                    <option value="RANAP">RANAP</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" id="inObat" onchange="setHarga()">
                                                    <option value="-">-</option>


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
                                                <input type="number" class="form-control " id="inJumlahObat" placeholder="jumlah" value="1" oninput="setHarga()">
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
                                <div class="row" id="cetakSigna">

                                    <div class="col-md-6">
                                        <label class="control-label col-md-3">SIGNA OBAT</label>
                                        <div class="col-md-9">
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
                                        <div class="col-md-9">
                                            <select class="form-control filled-input rounded-input select2" id="inCaraPakai">
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
                                <input type="hidden" class="form-control" id="cara_bayar">
                                <input type="hidden" class="form-control" id="tipe_resep">
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
                            </div>
                        </div>
                        <div class="collapse" id="collap_obat_edit">
                            <div class="form-body">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                                </h6>
                                <hr width="95%">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control " id="inObat1" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">EXPIRED DATE</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control " id="inTglExp1" disabled="">
                                            </div>
                                        </div>
                                    </div>

                                    <!--signa obat-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">SIGNA OBAT</label>
                                            <div class="col-md-9 has-success">
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
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH OBAT</label>
                                            <div class="col-md-9 has-success">
                                                <input type="number" class="form-control " id="inJumlahObat1" placeholder="jumlah" value="1" oninput="setHarga1()">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TOTAL HARGA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" disabled="" id="outTotalObat1">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" class="form-control" id="idTindakan">
                                <input type="hidden" class="form-control" id="hargaCost">
                                <input type="hidden" class="form-control" id="inDepo1">
                                <input type="hidden" class="form-control" id="inStok">
                                <div class="form-actions mt-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <div type="submit" class="btn btn-success mr-10" onclick="edit_Obat()">SIMPAN</div>

                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /formbody -->
                        <div class="form-body mt-10">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                            <hr width="95%">
                            <div class="table-wrap" style="width: 100%; margin: auto ">
                                <div class="table-responsive">
                                    <table class="table table-hover display  pb-60" id="tabletindakan">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>EDIT</th>
                                                <th>HAPUS</th>
                                                <th>NAMA OBAT</th>
                                                <th>EXPIRE DATE</th>
                                                <th>HARGA OBAT</th>
                                                <th>JUMLAH OBAT</th>
                                                <th>JUMLAH OBAT REQUEST</th>
                                                <th>TIPE</th>
                                                <th>TOTAL BIAYA</th>
                                                <th>NAMA STAFF</th>
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
                                    <div class="table-responsive ">
                                        <table class="table table-hover display " id="outTotalHarga">
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
                        <div align="left">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <input type="hidden" class="form-control" id="inPel">
                                            <input type="hidden" class="form-control" id="inHis">
                                            <input type="hidden" class="form-control" id="inJenisPel">
                                            <input type="hidden" class="form-control" id="inResObat">

                                            <div id="tambahObatFarmasi" onclick="tindakan_nonracikan()" class="btn btn-info mr-10">TAMBAH OBAT</div>
                                            <div id="cetakFarmasi" onclick="cetak()" class="btn btn-success mr-10">CETAK</div>
                                            <!-- <div id="cetakFarmasi" onclick="cetak_resep()" class="btn btn-primary mr-10">CETAK RESEP</div> -->
                                            <div id="cetakFarmasi" onclick="copy_resep()" class="btn btn-sm btn-success mr-10">COPY RESEP</div>
                                            <div id="cetakFarmasi" onclick="cetak_sampel()" class="btn btn-sm btn-success mr-10">SAMPEL</div>
                                            <div id="cetakFarmasi" onclick="cetakSigna1()" class="btn btn-sm btn-success mr-10">CETAK SIGNA</div>
                                            <div id="cetakFarmasi" onclick="cetak_Layout()" class="btn btn-sm btn-success mr-10">SKRINING RESEP</div>



                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                </div>
                <!-- /formbody -->
            </div>
        </div>

    </div>
</div>
<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="modal fade bs-example-modal-lg" id="collap_Return" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> OBAT
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrap">

                            <div class="form-body">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO OBAT
                                </h6>
                                <hr width="95%">
                                <form id="formObat1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">NAMA OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <select class="form-control filled-input select2" id="inObat2" onchange="setJumlahObatReturn()">

                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">JUMLAH STOK</label>
                                                <div class="col-md-9 has-error">
                                                    <input type="number" class="form-control " id="outStokReturn" value="0" disabled="">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">JUMLAH OBAT</label>
                                                <div class="col-md-9 has-success">
                                                    <input type="number" class="form-control " id="inJumlahObatReturn" placeholder="jumlah" value="1" oninput="setJumlahObatReturn()">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- <input type="hidden" class="form-control" disabled="" id="cara_bayar"> -->
                            <input type="hidden" class="form-control" id="inPelResep">
                            <input type="hidden" class="form-control" id="inHisResep">
                            <input type="hidden" class="form-control" id="hargaCost1">
                            <input type="hidden" class="form-control" id="inDepo1">
                            <input type="hidden" class="form-control" id="inResRetur">
                            <input type="hidden" class="form-control" id="inJenisPelRetur">

                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <div type="submit" class="btn btn-success mr-10" onclick="insert_Return()">SIMPAN</div>

                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                            <div class="row ">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                                <hr width="95%">
                                <div id="cetakFarmasi" onclick="cetak_retur()" class="btn btn-primary mr-10" style="margin-left: 40px;">CETAK NOTA</div>

                                <div class="table-wrap" style="width: 100%; margin: auto ">
                                    <div class="table-responsive">
                                        <table class="table table-hover display  pb-60" id="tableobat1">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>NAMA OBAT</th>
                                                    <th>EXPIRE DATE</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>DEPO</th>
                                                    <th>TOTAL BIAYA</th>
                                                    <th>KETERANGAN</th>
                                                    <th>NAMA STAFF</th>
                                                    <th>HAPUS</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: black">
                                            </tbody>
                                        </table>
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
                            </hr>


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
    function edit_data_tindakan(id_pelayanan, id_his, jenis_pel, id_resep) {
        getObatReturn(id_resep);
        reload_data_obat1(id_resep);

        $('#inPelResep').val(id_pelayanan);
        $('#inHisResep').val(id_his);
        $('#inResRetur').val(id_resep);
        $('#inJenisPelRetur').val(jenis_pel);
        $("#collap_Return").modal('toggle');

    }

    function getObatReturn(id_resep) {
        $.ajax({
            url: "<?php echo base_url(); ?>Apotik/getNamaObatReturn",
            method: "POST",
            data: {
                id_pelayanan: id_resep
            },
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option value="">-</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + data[i].margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].total + '|' + data[i].depo + '>' + data[i].nama + '</option>';
                }
                $('#inObat2').html(html);
            }
        });
    }

    function setJumlahObatReturn() {
        obat = $('#inObat2').val();
        splitDiag = obat.split("|");
        stok = (splitDiag[4]);
        total = (splitDiag[5]);
        frek = parseFloat($("#inJumlahObatReturn").val());
        if (frek > stok) {
            $("#inJumlahObatReturn").val(stok);
        } else if (frek < 0) {
            $("#inJumlahObatReturn").val(1);
        }
        $('#outStokReturn').val(stok);
        $("#hargaCost1").val(Number(total) / Number(stok));
        $('#inDepo1').val(splitDiag[6]);
    }

    function insert_Return() {
        id_pelayanan = $('#inPelResep').val();
        id_resep = $('#inResRetur').val();
        jenis_pelayanan = $('#inJenisPelRetur').val();
        id_history = $('#inHisResep').val();

        //caraBayar = $('#cara_bayar').val();
        a = $("#inObat2").val();
        depo = $("#inDepo1").val();
        splitDiag = a.split("|");
        id_list_tindakan = splitDiag[0];
        harga = splitDiag[1];
        margin = splitDiag[2];
        expire = splitDiag[3];
        harga_cost = $("#hargaCost1").val();
        frek = parseFloat($("#inJumlahObatReturn").val());
        total = (harga_cost * frek) * -1;
        jumlahKurang = frek * -1;
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_Return' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
                id_resep: id_resep,
                depo: depo,
                margin: margin,

                harga: harga,
                frek: frek,
                jenis_pelayanan: jenis_pelayanan,
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
                    });
                    reload_data_obat1(id_resep);
                    getObatReturn(id_resep)
                    $('#formObat1')[0].reset();
                    $('#inObat1').val('-').change();
                    $("#collap_Return").collapse('show');
                    $("#collap_nonracikan").collapse('hide');
                    $("#collap_racikan").collapse('hide');

                } else if (data.status == "error") {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: 'Stok tidak sesuai dengan jumlah permintaan',
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

    function reload_data_obat1(id) {
        $('#tableobat1').dataTable().fnClearTable();
        $('#tableobat1').dataTable().fnDestroy();
        $('#tableobat1').DataTable({
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
                "url": '<?php echo base_url('Apotik/tampil_tindakan_obat_retur'); ?>',
                "type": 'POST',
                "data": {
                    id: id,
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
    function tindakan_nonracikan() {
        id_pelayanan = $("#inPel").val();
        $.ajax({
            url: "<?php echo base_url(); ?>Pasien/getDataPasien",
            method: "POST",
            data: {
                id_pelayanan: id_pelayanan
            },
            dataType: 'json',
            success: function(data) {
                $('#cara_bayar').val(data.id_cara_bayar);
            }
        });
        $('#inDepo').val('APOTIK').change()
        $("#collap_obat").collapse('toggle');
    }
    $(document).ready(function() {
        $('#inDepo').change(function() {

            var depo = $('#inDepo').val();
            if (depo != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>Apotik/getNamaObat",
                    method: "POST",
                    data: {
                        depo: depo
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        var cara_bayar = $('#cara_bayar').val();
                        if (cara_bayar == '31' && depo == 'APOTIK') {
                            margin = 1.1;
                        } else {
                            margin = 1.3;
                        }
                        html = '<option value="">-</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id_logistik + '|' + data[i].harga_cost + '|' + margin + '|' + data[i].kadaluarsa + '|' + data[i].stok + '|' + data[i].ppn + '|' + '">' + data[i].nama + '</option>';
                        }
                        $('#inObat').html(html);
                    }
                });
            } else {
                $('#inObat').html('<option value="">-</option>');
            }
        });
        $('#inObat').change(function() {
            var obat = $('#inObat').val();
            splitDiag = obat.split('|');
            tgl = splitDiag[3];
            $('#inTglExp').val(tgl);
            stok = splitDiag[4];
            $("#outStok").val(stok);
        });
    });

    function setHarga() {

        caraBayar = $('#cara_bayar').val();
        tipe = $('#tipe_resep').val();
        obat = $('#inObat').val();
        splitDiag = obat.split("|");
        stok = (splitDiag[4]);
        disc = parseFloat($("#inDisc").val());
        if (disc > 35) {
            disc = 35;
        }
        if (caraBayar == "WA14BJ84") {
            disc = 0;
        }

        $("#inDisc").val(disc);


        $("#outStok").val(stok);

        ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
        harga = parseFloat(splitDiag[1]) + ppn;

        hargaMargin = harga * parseFloat(splitDiag[2]);
        $("#outBiayaTindakanObat").val(convertToRupiah(harga.toFixed(0)));
        $("#outBiayaMarginObat").val(convertToRupiah(hargaMargin.toFixed(0)));

        frek = parseFloat($("#inJumlahObat").val());
        if (frek > stok) {
            $("#inJumlahObat").val(stok);
        } else if (frek < 0) {
            $("#inJumlahObat").val(1);
        }
        frek = parseFloat($("#inJumlahObat").val());

        // 		  if (document.getElementById('inRadioCost').checked ) {
        // if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
        //     total = harga * frek;
        // } else if (caraBayar == "WA14BJ84" && tipe == "3") {
        //     total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        // } else {
        total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        //}

        $("#outTotalObat").val(convertToRupiah(total.toFixed(0)));

    }

    function insert_Obat() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        jenis_pelayanan = $('#inJenisPel').val();
        id_resep = $('#inResObat').val();
        caraBayar = $('#cara_bayar').val();
        tipe = $('#tipe_resep').val();
        a = $("#inObat").val();
        depo = $("#inDepo").val();
        splitDiag = a.split("|");
        margin = parseFloat(splitDiag[2]);
        ket = $("#inKeteranganObat").val();
        id_list_tindakan = splitDiag[0];
        ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
        harga = parseFloat(splitDiag[1]) + ppn;
        // hargaMargin = parseFloat(splitDiag[1]) * parseFloat(splitDiag[2]);

        frek = parseFloat($("#inJumlahObat").val());
        disc = parseFloat($("#inDisc").val());
        expire = (splitDiag[3]);
        jumlahKurang = frek * -1;

        // if ((caraBayar == "WA14BJ84" && tipe == "1") || (caraBayar == "WA14BJ84" && tipe == "2")) {
        //     total = harga * frek;
        // } else if (caraBayar == "WA14BJ84" && tipe == "3") {
        //     total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        // } else {
        total = (harga * (parseFloat(splitDiag[2]) - (disc / 100))) * frek;
        //}
        signa = $('#inSigna').val();
        cara_pakai = $('#inCaraPakai').val();

        $.ajax({
            url: "<?= base_url() . 'Apotik/insert_obat' ?>",
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
                jenis_pelayanan: jenis_pelayanan
            },
            success: function(data) {
                if (data.status == "success") {

                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });

                    // $("#collap_nonracikan").collapse('hide');

                    $('#inDepo').val('APOTIK').change();
                    $('#inObat').val('-').change();
                    $('#inTglExp').empty().trigger('change');
                    $("#inKeteranganObat").removeData();
                    $("#inJumlahObat").val('1');
                    $("#inDisc").val(0);
                    $("#outBiayaTindakanObat").val('');
                    $("#outBiayaMarginObat").val('');
                    $("#outStok").val('0');
                    $("#outTotalObat").val('');
                    $('#inSigna').val('-').change();
                    $('#inCaraPakai').val('-').change();
                    $('#tabletindakan').DataTable().ajax.reload();
                    $('#outTotalHarga').DataTable().ajax.reload();
                    // $('#tableobat').DataTable().ajax.reload();
                    // $('#inDepo').val('APOTIK').change();
                    // $('#inObat').empty().trigger('change');
                    // $('#inTglExp').val('');
                    // $("#inKeteranganObat").val('');
                    // $("#inJumlahObat").val(0);
                    // $("#inDisc").val(0);
                    // $("#outBiayaTindakanObat").val('');
                    // $("#outBiayaMarginObat").val('');
                    // $("#outStok").val(0);
                    // $("#outTotalObat").val('');
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
</script>
<script type="text/javascript">
    function edit_obat(id, id_resep, stok) {
        $.ajax({
            url: "<?= base_url() . 'Apotik/getDataObat' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id_tindakan: id
            },
            success: function(data) {
                if (data.status_dt == "found") {
                    $('#inDepo1').val(data.depo);
                    $('#inObat1').val(data.nama);
                    $('#inSigna1').val(data.id_signa).change();
                    $('#inTglExp1').val(data.kadaluarsa);
                    $("#inJumlahObat1").val(data.frek);
                    $("#inStok").val(Number(stok) + Number(data.frek));
                    harga = Number(data.margin) * Number(data.harga);
                    $("#hargaCost").val(harga);
                    $("#idTindakan").val(id);

                    $("#collap_obat_edit").collapse('toggle');
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function edit_Obat() {
        jumlah = $("#inJumlahObat1").val();
        harga = $("#hargaCost").val();
        total = harga * jumlah;
        id = $("#idTindakan").val();
        depo = $('#inDepo1').val();
        signa = $('#inSigna1').val();
        stok = $('#inStok').val();


        $.ajax({
            url: "<?= base_url() . 'Apotik/update_obat' ?>",
            method: "POST",
            dataType: 'json',
            data: {
                id: id,
                jumlah: jumlah,
                depo: depo,
                total: total,
                signa: signa,
                stok: stok

            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $('#inObat1').val('');
                    $('#inSigna1').val('');
                    $('#inTglExp1').val('');
                    $("#inJumlahObat1").val('');
                    $("#hargaCost").val('');
                    $("#idTindakan").val('');
                    $("#collap_nonracikan").collapse('show');
                    $("#collap_obat_edit").collapse('hide');
                    $("#collap_racikan").collapse('show');
                    $('#tabletindakan').DataTable().ajax.reload();
                    $('#outTotalHarga').DataTable().ajax.reload();
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
                    url: "<?php echo base_url() ?>Apotik/hapus_obat",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                        depo: depo
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tabletindakan').DataTable().ajax.reload();
                            $('#outTotalHarga').DataTable().ajax.reload();
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

    function setHarga1() {
        frek = $("#inJumlahObat1").val();
        harga = $("#hargaCost").val();
        total = harga * frek;
        $("#outTotalObat1").val(convertToRupiah(total.toFixed(0)));
    }

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    function tampilTindakanFarmasi(id_pelayanan, id_history, jenis_pel, id_resep) {
        $("#inPel").val(id_pelayanan);
        $("#inHis").val(id_history);
        $('#inResObat').val(id_resep);
        $('#inJenisPel').val(jenis_pel);
        $("#modal_tindakan").modal('show');
        reload_data_tindakan(id_resep);
        reload_total_harga(id_resep);
    }

    function reload_data_tindakan(id_resep) {
        $('#tabletindakan').dataTable().fnClearTable();
        $('#tabletindakan').dataTable().fnDestroy();
        $('#tabletindakan').DataTable({
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
                "url": '<?php echo base_url('Apotik/tampil_tindakan_riwayat_pasien'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_resep
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

    function reload_total_harga(id_pelayanan) {
        $('#outTotalHarga').dataTable().fnClearTable();
        $('#outTotalHarga').dataTable().fnDestroy();
        $('#outTotalHarga').DataTable({
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
                "url": '<?php echo base_url('Apotik/tampil_harga_riwayat'); ?>',
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

    // function cetak() {
    //     // id_resep = $('#inResObat').val();
    //     id_pelayanan = $("#inPel").val();
    //     id_history = $("#inHis").val();
    //     window.location.href = 'print_riwayat/' + id_pelayanan + '/' + id_history;
    // }

    // function cetak_resep() {
    //     id_pelayanan = $("#inPel").val();
    //     id_history = $("#inHis").val();

    //     window.location.href = 'print_resep_riwayat/' + id_pelayanan + '/' + id_history;
    // }
    function cetak() {
        id_resep = $('#inResObat').val();
        id_his = $('#inHis').val();
        window.open('<?= base_url('Apotik/') ?>' + 'print_struk/' + id_resep + '/' + id_his);

    }

    function cetak_retur() {
        id_history = $('#inHisResep').val();
        id_resep = $('#inResRetur').val();
        window.open('<?= base_url('Apotik/') ?>print_retur/' + id_resep + '/' + id_history);
    }

    function cetak_resep() {
        id_resep = $('#inResObat').val();
        id_his = $('#inHis').val();
        window.open('<?= base_url('Apotik/') ?>' + 'print_resep/' + id_resep + '/' + id_his);
    }

    function copy_resep() {
        id_resep = $('#inResObat').val();
        id_his = $('#inHis').val();
        window.open('<?= base_url('Apotik/') ?>' + 'print_copy_resep/' + id_resep + '/' + id_his);
    }

    function cetak_sampel() {
        id_resep = $('#inResObat').val();
        id_his = $('#inHis').val();
        window.open('<?= base_url('Apotik/') ?>' + 'print_cetak_sampel/' + id_resep + '/' + id_his);
    }

    function cetak_Layout() {
        id_resep = $('#inResObat').val();
        id_his = $('#inHis').val();
        window.open('<?= base_url('Apotik/') ?>' + 'print_layout/' + id_resep + '/' + id_his);
    }

    function cetakSigna1() {
        id_resep = $('#inResObat').val();
        id_his = $('#inHis').val();
        window.open('<?= base_url('Apotik/') ?>' + 'cetak_signa/' + id_resep + '/' + id_his);
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
            "ajax": '<?php echo base_url('Apotik/Tampil_riwayat_pasien'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });

    function tampilHariIni() {
        $('#datable').DataTable().destroy();
        $('#datable').DataTable({
            "retrieve": true,
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
            "ajax": '<?php echo base_url('Apotik/Tampil_riwayat_pasien'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    }

    function tampilRangePermit(mulai, akhir) {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        $('#datable').DataTable({
            "retrieve": true,
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
            "ajax": {
                "url": '<?= base_url('Apotik/Tampil_RangeRiwayat_pasien'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir
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