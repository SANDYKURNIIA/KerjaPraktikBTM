<!-- Tindakan hd -->
<div class="modal fade bs-example-modal-lg" id="modal_hd" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body mt-10">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <hr width="95%">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TIPE KAMAR</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="KAMAR" style="border: 1px solid lightgreen;" id="inTipeKamarHD" name="inTipeKamarHD">
                                            <option value="-">
                                                -</option>
                                            <?php
                                            foreach ($data_tipe_kamar as $row) :
                                            ?>
                                                <option value="<?php echo $row->nama ?>">
                                                    <?php echo $row->nama; ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select>
                                        <span class="help-block"></span>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                    <div class="col-md-9 has-success" onchange="pilihTindakanHd()">
                                        <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanHd" id="inTindakanHd">
                                            <option value="-">-</option>

                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" class="form-control" id="inJumlahHd" value="1" min="1" placeholder="jumlah" oninput="hargaTotalHd()">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="help-block"></span>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " disabled="" id="outBiayaTindakanHd">
                                        <input type="hidden" class="form-control " disabled="" id="idPelayananHd">
                                        <input type="hidden" class="form-control " disabled="" id="idHistoryHd">
                                        <input type="hidden" class="form-control " disabled="" id="jumTindakanHd">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">TOTAL HARGA</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control" disabled="" id="outTotalHd">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="help-block"></span>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">NAMA DOKTER</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;" tabindex="1" id="inDPJPHd" name="namaDPJPHd">
                                            <option value="-">-</option>
                                            <?php
                                            foreach ($dokter as $row) : ?>
                                                <option value="<?php echo $row['id_dokter']; ?>">
                                                    <?php echo $row['nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <button onclick="insert_tindakanHd()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        <!-- <button onclick="insert_na_tindakan()" class="btn btn-warning btn-anim  btn-sm ml-20 mt-5" id="na_tindakan"><i class="icon-rocket"></i><span class="btn-text">N/A</span> -->
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
                        <table class="table table-hover display  pb-60" id="tabletindakanHd">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>BIAYA TINDAKAN </th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>TOTAL BIAYA</th>
                                    <th>DOKTER</th>
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

            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4 pull-right mt-20">

                    <div class="table-wrap" style="width: 85%; margin-bottom:40px;">
                        <div class="table-responsive ">
                            <table class="table table-hover display " id="outTotalHargaHd">
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#inTipeKamarHD').change(function() {
            var tipe_kamar = $('#inTipeKamarHD').val();

            $.ajax({
                url: "<?php echo base_url(); ?>Rawatinap/getTindakanByTipeKamarHD",
                method: "POST",
                data: {
                    tipe_kamar: tipe_kamar
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value=' + '-' + '>' + '-' + '</option>';
                    for (i = 0; i < data.length; i++) {

                        harga = Number(data[i].harga_sarana) + Number(data[i].harga_jasa);
                        html += '<option value=' + data[i].id_list_tindakan + '|' + harga + '|' + data[i].nama + '|' + data[i].kelompok_eklaim + '>' + data[i].nama + '</option>';
                    }
                    $('#inTindakanHd').html(html);
                }
            });

        });
    });

    function reload_data_tindakan(id_pelayanan) {
        $('#tabletindakanHd').dataTable().fnClearTable();
        $('#tabletindakanHd').dataTable().fnDestroy();
        $('#tabletindakanHd').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_list_tindakan'); ?>',
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

    function reload_total_harga(id_pelayanan) {
        $('#outTotalHargaHd').dataTable().fnClearTable();
        $('#outTotalHargaHd').dataTable().fnDestroy();
        $('#outTotalHargaHd').DataTable({
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
                "url": '<?php echo base_url('Poli/tampil_total_harga'); ?>',
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

    function tindakan_hd(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'Poli/getdata_gigi' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    //disini set datanya ke modal
                    // if (data.countTin == 0) {
                    // 	$("#na_tindakan").show();
                    // } else {
                    // 	$("#na_tindakan").hide();
                    // }
                    // $("#jumTindakan").val(data.countTin);
                    $("#idPelayananHd").val(data.data['id_pelayanan']);
                    $("#idHistoryHd").val(id_history);
                    $("#inDPJPHd").val(data.data['dpjp']).change();
                    $("#modal_hd").modal('show');
                    $('#inTipeKamarHD').val(data.kelas).change();

                    reload_data_tindakan(id_pelayanan);
                    reload_total_harga(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }

    function hapus_data_tindakan(id_tindakan, id_pelayanan, nama_tindakan) { //utk hapus diagnosa pasien
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + nama_tindakan + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Poli/hapus_data_tindakan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_tindakan: id_tindakan,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                buttons: false,
                                timer: 800
                            });
                            $('#tabletindakanHd').DataTable().ajax.reload();
                            $('#outTotalHargaHd').DataTable().ajax.reload();
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

    function pilihTindakanHd() {
        a = $("#inTindakanHd").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        $("#outBiayaTindakanHd").val(convertToRupiah(harga));
        document.getElementById("inJumlahHd").value = "1";
        document.getElementById("outTotalHd").value = convertToRupiah(harga);
    }

    function insert_tindakanHd() {
        a = $("#inTindakanHd").val();
        dokter = $("#inDPJPHd").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahHd").val());
        total = harga * frek;
        var ID = Math.random().toString(36).substr(2, 16);
        idPelayanan = $('#idPelayananHd').val();
        // count = $("#jumTindakan").val();
        id_history = $('#idHistoryHd').val();
        nama_dokter = $.trim($("#inDPJPHd").children("option:selected").text()); 

        dataString = 'id_tindakan_poli_gigi=' + ID + '&harga=' + harga +
            '&idPelayanan=' + idPelayanan + '&id_list_tindakan=' + splitDiag[0] +
            '&frek=' + frek + '&total=' + total +
            '&dokter=' + dokter + '&id_history=' + id_history +
            '&nama_dokter=' + nama_dokter + '&nama_tindakan=' + splitDiag[2] + 
            '&eklaim=' + splitDiag[3] + '&status_pembayaran=' + 'ditanggung' ;
        $.ajax({
            url: "<?= base_url() . 'Poli/insert_tindakan' ?>",
            method: "POST",
            cache: false,
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    $.toast({
                        heading: 'Success!',
                        text: 'Tindakan ini telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                    $('#outBiayaTindakanHd').val('');
                    $('#inJumlahHd').val('');
                    $('#outTotalHd').val('');
                    $('#outTotalHargaHd').DataTable().ajax.reload();
                    $('#tabletindakanHd').DataTable().ajax.reload();
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

    function hargaTotalHd() {
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        frek = parseFloat($("#inJumlahHd").val());
        total = harga * frek;

        $("#outTotal").val(convertToRupiah(total));

    }
</script>