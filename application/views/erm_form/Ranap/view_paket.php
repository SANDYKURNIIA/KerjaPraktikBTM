<!-- PAKET OBAT CENDRAWASIH --------------------------------------------------------------------------------------------->
<div class="modal fade bs-example-modal-lg" id="modal_paket" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN PAKET
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">

                    <span class="help-block"></span>
                    <div class="form-body mt-10">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                        </h6>
                        <!-- <div align="right">
								<button class="btn btn-primary btn-anim mr-50" style="margin-right: 40px;" onclick="edit_tindakan_mcu()"><i class="icon-plus"></i><span class="btn-text">TAMBAH TINDAKAN</span>
								</button>
							</div> -->
                        <hr width="95%">

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label col-md-3">PAKET OBAT</label>
                                <div class="col-md-9 has-success" onchange="pilihTindakanPaket()">
                                    <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inPaket" id="inPaket">
                                        <option value="-">-</option>
                                        <?php
                                        foreach ($paket_obat as $row) :
                                            $harga = $row['harga']; ?>
                                            <option value="<?php echo $row['id_paket_mcu'] . "|" . $harga . "|" .  $row['nama_paket']; ?>">
                                                <?php echo $row['nama_paket']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">HARGA</label>
                                <div class="col-md-9 has-error">
                                    <input type="text" class="form-control " disabled id="outTotalPaket">
                                    <input type="hidden" class="form-control " id="hargaPaket">
                                    <input type="hidden" class="form-control " id="idPel_paket">
                                    <input type="hidden" class="form-control " id="idHis_paket">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <span class="help-block"></span>


                    <span class="help-block"></span>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group pull-right">
                                <button onclick="insert_paket()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="modal-body mt-10">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 100%; margin: auto ">
                    <div class="table-responsive">
                        <table class="table table-hover display  pb-60" id="tablepaket">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>REQUEST</th>
                                    <th>PAKET</th>
                                    <th>TOTAL BIAYA</th>
                                    <th>NAMA STAFF</th>
                                    <th>HAPUS</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>REQUEST</th>
                                    <th>PAKET</th>
                                    <th>TOTAL BIAYA</th>
                                    <th>NAMA STAFF</th>
                                    <th>HAPUS</th>
                                </tr>
                            </tfoot>
                            <tbody style="color: black">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- PAKET ------------------------------------------------->
<script>
    function edit_tindakan_mcu() {
        $("#collap_edit_mcu").collapse('toggle');
    }

    function insert_paket() {
        a = $("#inPaket").val();
        splitDiag = a.split("|");
        harga = parseFloat(splitDiag[1]);
        id_paket = splitDiag[0];
        nama_paket = splitDiag[2];
        id_pelayanan = $('#idPel_paket').val();
        id_history = $('#idHis_paket').val();

        $.ajax({
            url: "<?= base_url() . 'Paket_Cendrawasih/insert_paket_pasien' ?>",
            method: "POST",
            dataType: 'json',
            cache: true,
            data: {
                harga: harga,
                id_paket: id_paket,
                nama_resep: nama_paket,
                id_pelayanan: id_pelayanan,
                id_history: id_history,
                jenis_pelayanan: 'RANAP',
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#inPaket").val('-').change();
                    $('#outBiayaTindakanMcu').val('');
                    $('#inJumlahMcu').val('');
                    $('#outTotalMcu').val('');
                    $('#outTotalPaket').val('');
                    $('#tablepaket').DataTable().ajax.reload();
                    $('#outTotalHargaPaket').DataTable().ajax.reload();
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: data,
                        confirmButtonColor: "#3cb878",
                    });
                }
            }
        });
    }

    function hapus_list_paket(id_resep, nama) {
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
                            $("#inPaket").val('-').change();
                            $('#tablepaket').DataTable().ajax.reload();
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
    function request_paket(id_resep, jenis_resep) {
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
                    $('#tablepaket').DataTable().ajax.reload();

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
    function reload_data_paket(id_mcu) {
        $('#tablepaket').dataTable().fnClearTable();
        $('#tablepaket').dataTable().fnDestroy();
        $('#tablepaket').DataTable({
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
                "url": '<?php echo base_url('Paket_Cendrawasih/tampil_list_paket_pasien'); ?>',
                "type": 'POST',
                "data": {
                    id: id_mcu
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


    function pilihTindakanPaket() {
        a = $("#inPaket").val();
        splitDiag = a.split("|");

        harga = parseFloat(splitDiag[1]);
        $("#outTotalPaket").val(convertToRupiah(harga));
        $("#hargaPaket").val(harga);

    }


    function edit_paket(id_pelayanan, id_history) {
        $("#modal_paket").modal('show');
        $('#idPel_paket').val(id_pelayanan);
        $('#idHis_paket').val(id_history);
        reload_data_paket(id_pelayanan);
    }
</script>