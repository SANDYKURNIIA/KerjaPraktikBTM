<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">TOTAL PENDAPATAN KASIR</span></h6>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">
            <div class="col-md-12">
                <!-- <div class="col-md-3 mt-20 pl-5">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div> -->
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Staff :</label>
                    <select class="form-control select2" placeholder="Choose a Category" name="staff" id="inStaff">
                        <option value="-">-</option>
                        <?php
                        foreach ($data_staff as $row) :
                        ?>
                            <option value="<?php echo $row->id_staff; ?>">
                                <?php echo $row->nama; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                </div>
            </div>

        </div>
        <br>
        <br>
        <h6 class="txt-dark capitalize-font"><i class="icon-money mr-10 mt-20"></i>INFO VERIFIKASI</h6>
        <hr>
        <div class="col-md-12">
            <div class="col-md-5">
                <div class="form-group ">
                    <label class="control-label col-md-3">Tanggal Verifikasi</label>
                    <div class="col-md-9 has-success">
                        <input type="date" class="form-control " id="inTglVerifikasi" value="<?=date('Y-m-d')?>">
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <button class="btn btn-info btn-anim btn-sm1 mr-10" onclick="verifikasi();"><i class="icon-rocket"></i><span class="btn-text">VERIFIKASI</span></button>

            </div>
        </div>
    </div>
    <div class="row mt-30">

    </div>

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th><label for="check_all"><input id="check_all" type="checkbox" onClick="toggle(this)"> All</label></br></th>
                                <th>NO</th>
                                <th>TGL. PENERIMAAN PEMBAYARAN</th>
                                <th>TANGGAL MASUK</th>
                                <th>TANGGAL CHECKOUT</th>
                                <th>NAMA PASIEN</th>
                                <th>NO. RM</th>
                                <th>JENIS PELAYANAN</th>
                                <th>BIAYA</th>
                                <th>OPSI BAYAR</th>
                                <th>BANK</th>
                                <th>STAFF</th>
                            </tr>
                        </thead>

                    </table>
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
    $(document).ready(function() {
        $('#datable').DataTable({
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
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
                    "sLast": "Terakhir"
                },
            },
            "ajax": '<?php echo base_url('Kasir/tampil_pendapatan'); ?>',
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });

    function tampilRangePermit(mulai, akhir) {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        staff = $("#inStaff").val();
        $('#datable').DataTable({
            "retrieve": true,
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
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
                    "sLast": "Terakhir"
                },
            },
            "ajax": {
                "url": '<?= base_url('Kasir/tampil_pendapatan'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,
                    staff: staff
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

    function toggle(source) {
        if ($('#check_all').is(":checked")) {
            $('input[name="check[]"]').prop("checked", true);
        } else {
            $('input[name="check[]"]').prop("checked", false);

        }
    }

    function verifikasi() {
        var fav = [];
        $.each($("input[name='check[]']:checked"), function() {
            fav.push($(this).val());
        });
        tgl_verif = $("#inTglVerifikasi").val();

        // alert(fav);
        // fav = $('#fav').val();
        $.ajax({
            url: "<?= base_url() . 'Kasir/setVerifikasi_pendapatan' ?>",
            data: {
                req: fav,
                tgl_verif: tgl_verif,
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data berhasil diverifikasi",
                        confirmButtonColor: "#3cb878",
                    });
                    // $("#modal_edit_data").modal('hide');
                    $('#datable').DataTable().ajax.reload();
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