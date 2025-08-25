<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">AKTUAL INTENSIF JASA DOKTER</span></h6>
        </div>
    </div>
    <div class="panel-body">
        <div class="clearfix"></div>
        <h6 class="txt-dark capitalize-font"><i class="icon-money mr-10 mt-20"></i>FILTER</h6>
        <hr>
        <div class="row mt-30">

            <div class="col-md-12">

                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Tanggal Mulai</label>
                        <div class="col-md-9 has-success">
                            <input type="date" class="form-control " id="inTglMulai">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Tanggal Akhir</label>
                        <div class="col-md-9 has-success">
                            <input type="date" class="form-control " id="inTglAkhir">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group ">
                        <label class="control-label col-md-3">Dokter</label>
                        <div class="col-md-9 has-success">
                            <select class="form-control filled-input select2" placeholder="Choose a Category" id="inDOkter" name="inDOkter">
                                <?php

                                foreach ($dokter as $row) {

                                ?>
                                    <option value="<?php echo $row['nama']; ?>">
                                        <?php echo $row['nama']; ?></option>
                                <?php }  ?>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-30">
            <div class="col-md-12 mt-20">
                <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span></button>

            </div>
        </div>
        <hr>
        <div class="col-md-12">

            <div class="col-md-6">
                <div class="form-group ">
                    <label class="control-label col-md-3">Tanggal Jurnal</label>
                    <div class="col-md-9 has-success">
                        <input type="date" class="form-control " id="inTgl">
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <button class="btn btn-info btn-anim btn-sm1 " onclick="setJurnal();"><i class="icon-rocket"></i><span class="btn-text">Jurnal</span></button>

            </div>


        </div>

    </div>

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <div class="row mt-30 pull-right">
                        <div class="col-md-12 ">


                        </div>
                    </div>
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th><label for="check_all"><input id="check_all" type="checkbox" onClick="toggle(this)"> All</label></br></th>
                                <th>No</th>
                                <th>No Reg</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Tipe Pasien</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="div_result" style="display: none;"></div>

<style>
    td {
        color: black;
    }
</style>

<script>
    function tampilRangePermit() {
        $('#datable').DataTable().destroy();
        mulai = $("#inTglMulai").val();
        akhir = $("#inTglAkhir").val();
        dokter = $("#inDOkter").val();
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
                "url": '<?= base_url('Keuangan_IJD/tampil_data_bymhd_ijd'); ?>',
                "type": 'POST',
                "data": {
                    mulai: mulai,
                    akhir: akhir,
                    dokter: dokter,
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
    function toggle(source) {
        if ($('#check_all').is(":checked")) {
            $('input[name="check[]"]').prop("checked", true);
        } else {
            $('input[name="check[]"]').prop("checked", false);

        }
    }

    function setJurnal() {
        dokter = $("#inDOkter").val();
        tgl = $("#inTgl").val();

        var fav = [];
        $.each($("input[name='check[]']:checked"), function() {
            fav.push($(this).val());
        });
        // alert(fav);
        // fav = $('#fav').val();
        $.ajax({
            url: "<?= base_url() . 'Keuangan_IJD/setJurnalIJD' ?>",
            data: {
                req: fav,
                dokter: dokter,
                tgl: tgl,
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