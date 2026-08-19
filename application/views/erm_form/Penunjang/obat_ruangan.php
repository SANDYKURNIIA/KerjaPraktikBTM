
<!-- obat ruangan -->
<div class="modal fade bs-example-modal-lg" id="modal_obat_ruang" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> OBAT RUANGAN
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
                                        <select class="form-control filled-input select2" id="inObatRuang" onchange="setHarga1()">
                                            <option value="-">-</option>
                                            <?php

                                            foreach ($obat_ruang as $row) {
                                                $harga = ($row["harga_cost"] / $row["satuan_ok"]);
                                                $stok =  $row["stok"] * $row["satuan_ok"];
                                            ?>
                                                <option value="<?php echo $row["id_logistik"] . '|' . $harga . '|' . $row["margin"] . '|' . $row["kadaluarsa"] . '|' . $stok . '|' . $row["ppn"]; ?>"><?php echo $row["nama"]; ?></option>
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
                                        <input type="text" class="form-control " id="inTglExpR" disabled="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JUMLAH STOK</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" class="form-control " id="outStokR" value="0" disabled="">
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
                                        <input type="number" class="form-control " id="inJumlahObatR" placeholder="jumlah" value="1" min="1" oninput="setHarga1()">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">DISCOUNT</label>
                                    <div class="col-md-3 has-success">
                                        <input type="number" placeholder="Disc" max="35" class="form-control" id="inDiscR" value="0" oninput="setHarga1()">
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
                                        <input type="text" class="form-control" disabled="" id="outBiayaTindakanObatR">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">HARGA + MARGIN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control" disabled="" id="outBiayaMarginObatR">
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
                                        <input type="text" class="form-control" disabled="" id="outTotalObatR">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">KETERANGAN</label>
                                    <div class="col-md-9 has-success">
                                        <textarea class="form-control" rows="2" style="resize:none" id="inKeteranganObatR">-</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row" style="margin-top: 10px;" id="cetakSigna1">

                            <div class="col-md-6">
                                <label class="control-label col-md-3">SIGNA OBAT</label>
                                <div class="col-md-9 has-success">
                                    <select class="form-control filled-input rounded-input select2" id="inSignaR">
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
                                    <select class="form-control filled-input rounded-input select2" id="inCaraPakaiR">
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
                        </div>
                        <input type="hidden" class="form-control" disabled="" id="cara_bayar">
                        <input type="hidden" class="form-control" id="inPelObat">
                        <input type="hidden" class="form-control" id="inHisObat">
                        <div class="form-actions mt-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <div type="submit" class="btn btn-success mr-10" onclick="insert_ObatR()">SIMPAN</div>

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
                                        <table id="tableobatR" class="table table-hover display pb-30 mt-10" width="100%">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>NO</th>
                                                    <th>NAMA OBAT</th>
                                                    <th>EXPIRE DATE</th>
                                                    <th>HARGA OBAT</th>
                                                    <th>JUMLAH OBAT</th>
                                                    <th>TOTAL BIAYA</th>
                                                    <th>TANGGAL INPUT</th>
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
                                                <th>TANGGAL INPUT</th>
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
                                            <!-- <div id="cetakFarmasi" onclick="cetak_resep()" class="btn btn-success mr-10">CETAK RESEP</div> -->
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

<script type="text/javascript">
    function obat_ruang(id_pelayanan, id_history) {
        $("#inPelObat").val(id_pelayanan);
        $("#inHisObat").val(id_history);
        $("#modal_obat_ruang").modal('show');
        reload_data_obatR(id_pelayanan);
        reload_data_total1(id_pelayanan);
    }

    function insert_ObatR() {
        id_pelayanan = $('#inPelObat').val();
        id_history = $('#inHisObat').val();
        a = $("#inObatRuang").val();
        splitDiag = a.split("|");
        margin = parseFloat(splitDiag[2]);
        ket = $("#inKeteranganObatR").val();
        id_list_tindakan = splitDiag[0];
        ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
        harga = parseFloat(splitDiag[1]) + ppn;
        hargaMargin = harga * parseFloat(splitDiag[2]);

        frek = parseFloat($("#inJumlahObatR").val());
        disc = parseFloat($("#inDiscR").val());
        expire = (splitDiag[3]);
        jumlahKurang = frek * -1;


        total = hargaMargin * frek * (1 - (disc * 0.01));

        signa = $('#inSignaR').val();
        cara_pakai = $('#inCaraPakaiR').val();

        $.ajax({
            url: "<?= base_url() . 'Rawatinap/insert_obatR' ?>",
            method: "POST",
            dataType: 'json',
            cache: false,
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
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
                cara_pakai: cara_pakai
            },
            success: function(data) {
                if (data.status == "success") {

                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    })

                    $('#tableobatR').DataTable().ajax.reload();
                    $('#outTotalHarga1').DataTable().ajax.reload();
                    // reload_data_total1(id_pelayanan)
                    $('#inObatR').val('-').change();
                    $('#inTglExpR').empty().trigger('change');
                    $("#inJumlahObatR").val('1');
                    $("#inDiscR").val(0);
                    $("#outBiayaTindakanObatR").val('');
                    $("#outBiayaMarginObatR").val('');
                    $("#outStokR").val('0');
                    $("#outTotalObatR").val('');
                    $('#inSignaR').val(signa).change();
                    $('#inCaraPakaiR').val(cara_pakai).change();
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

    function cetak_resep() {
        id_pel = $('#inPelObat').val();
        id_his = $('#inHisObat').val();
        window.open('<?php echo base_url('Rawatinap/print_resep/'); ?>' + id_pel + '/' + id_his);
    }

    function setHarga1() {

        // caraBayar = $('#cara_bayar').val();

        obat = $('#inObatRuang').val();
        splitDiag = obat.split("|");
        stok = (splitDiag[4]);

        $("#outStokR").val(stok);

        ppn = parseFloat(splitDiag[1]) * (parseFloat(splitDiag[5]) / 100);
        harga = parseFloat(splitDiag[1]) + ppn;
        hargaMargin = harga * parseFloat(splitDiag[2]);
        $("#outBiayaTindakanObatR").val(convertToRupiah(harga.toFixed(0)));
        $("#outBiayaMarginObatR").val(convertToRupiah(hargaMargin.toFixed(0)));

        frek = parseFloat($("#inJumlahObatR").val());
        if (frek > stok) {
            $("#inJumlahObatR").val(stok);
        } else if (frek < 0) {
            $("#inJumlahObatR").val(1);
        }


        disc = parseFloat($("#inDiscR").val());

        // if (document.getElementById('inRadioCost').checked) {
        //     total = harga * frek * (1 - (disc * 0.01));
        // } else {
        total = hargaMargin * frek * (1 - (disc * 0.01));
        // }

        $("#outTotalObatR").val(convertToRupiah(total.toFixed(0)));

    }
    $('#inObatRuang').change(function() {
        obat = $('#inObatRuang').val();
        splitDiag = obat.split("|");
        tgl = splitDiag[3];
        $('#inTglExpR').val(tgl);
        stok = splitDiag[4];
        $("#outStokR").val(stok);
    });

    function reload_data_obatR(id_resep) {
        $('#tableobatR').dataTable().fnClearTable();
        $('#tableobatR').dataTable().fnDestroy();
        $('#tableobatR').DataTable({
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
                "url": '<?php echo base_url('Rawatinap/tampil_obat'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_resep,
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

    function hapus_obat1(id) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus obat ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Rawatinap/hapus_obat1",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            $('#tableobatR').DataTable().ajax.reload();
                            $('#outTotalHarga1').DataTable().ajax.reload();

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
                "url": '<?php echo base_url('Rawatinap/tampil_list_total_obat'); ?>',
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
</script>