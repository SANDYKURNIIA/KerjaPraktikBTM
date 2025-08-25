<!-- modal edit data -->
<div class="modal fade bs-example-modal-lg" id="modal_pindah" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> INFO TINDAKAN PINDAH KAMAR
                </h5>
            </div>

            <div class="modal-body">

                <div class="form-wrap">
                    <!-- /formbody -->
                    <div class="form-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="help-block"></span>
                                    <label class="control-label col-md-3">KAMAR SEKARANG</label>
                                    <div class="col-md-9 has-success">

                                        <input type="text" class="form-control" disabled="" id="no_rm">
                                        <input type="hidden" class="form-control" disabled="" id="inKamarSekarang">
                                        <input type="hidden" class="form-control" disabled="" id="idHis">
                                        <input type="hidden" class="form-control" disabled="" id="idPelayanan">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAMA PASIEN</label>
                                    <div class="col-md-9 has-success">

                                        <input type="text" class="form-control" disabled="" id="nama">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="help-block"></span>
                                    <label class="control-label col-md-3">KAMAR TUJUAN</label>
                                    <div class="col-md-9 has-success">

                                        <select class="form-control filled-input select2" placeholder="KAMAR TUJUAN" style="border: 1px solid lightgreen;" id="inKelasRuangan" name="KamarTujuan">
                                            <option value="-"> -</option>
                                            <?php
                                            foreach ($data_kamar as $row) :
                                            ?>
                                                <option value="<?php echo $row->nama; ?>">
                                                    <?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                            >
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NO TEMPAT TIDUR</label>
                                    <div class="col-md-9 has-success">
                                        <select class="form-control filled-input select2" placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;" id="inTempatTidur">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="updatePindahKamar()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                <button onclick="deletePindahKamar()" class="btn btn-success btn-anim  btn-sm"><i class="icon-rocket"></i><span class="btn-text">BATAL PINDAH</span>
                        </div>
                        <div class="modal-body mt-30">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>DATA KAMAR</h6>
                            <hr width="95%">
                            <div class="table-wrap" style="width: 100%; margin: auto ">
                                <div class="table-responsive">
                                    <table class="table table-hover display  pb-60" id="tablekamar">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>KELAS</th>
                                                <th>KAMAR</th>
                                                <th>TANGGAL MASUK</th>
                                                <th>TANGGAL KELUAR</th>
                                                <th>STATUS</th>
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
    </div>
</div>
<script>
    function pindah_kamar(id_pelayanan, id_history) {
        $.ajax({
            url: "<?= base_url() . 'Rawatinap/getdKamarById' ?>",
            data: {
                pelayanan: id_pelayanan,
                history: id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status_dt == "found") {
                    //disini set datanya ke modal
                    $("#tipe_masuk").val(data.jenis_pelayanan);
                    $("#no_rm").val(data.poli);
                    $("#inKamarSekarang").val(data.id_kamar);
                    $("#nama").val(data.nama);
                    $("#inTanggalKunjugan").val(data.tgl_masuk);
                    $("#idPelayanan").val(data.id_pelayanan);
                    $("#idHis").val(data.id_history);
                    $("#inNoSEP").val(data.no_sep);
                    $("#inDiagnosa").val(data.diagnosa);
                    $("#inTempatTidur").val(data.dpjp).change();
                    $("#inKelasRuangan").val(data.nama_poli).change();
                    $("#NamaPasien").val(data.nama).change();
                    $("#inAsalPasien").val(data.asal_pasien).change();
                    $("#inCaraBayar").val(data.id_cara_bayar).change();
                    $("#modal_pindah").modal('show');

                    reload_data_kamar(id_pelayanan);
                } else {
                    alert("data tidak ditemukan");
                }
            }
        });
    }
</script>
<script type="text/javascript">
    function updatePindahKamar() {
        kamarSekarang = $("#inKamarSekarang").val();
        kamarBaru = $("#inTempatTidur").val();
        kelas = $("#inKelasRuangan").val();
        idHis = $("#idHis").val();

        idPelayanan = $("#idPelayanan").val();

        dataString = 'kamarSekarang=' + kamarSekarang + '&kamarBaru=' + kamarBaru +
            '&idHis=' + idHis + '&idPelayanan=' + idPelayanan;
        //        alert(dataString);
        if (kamarBaru == "undefined" || kelas == "-") {
            swal({
                title: "PILIH KAMAR DAHULU!",
                type: "warning",

                confirmButtonColor: "#3cb878",
            });
        } else if (kamarBaru == "-") {
            swal({
                title: "PILIH NOMOR BED DAHULU!",
                type: "warning",

                confirmButtonColor: "#3cb878",
            });
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url() . 'Rawatinap/updatePindahKamar' ?>",
                data: dataString,
                success: function(data) {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Tindakan ini Telah di Simpan!",
                        confirmButtonColor: "#3cb878",
                    });
                    pindah_kamar(idPelayanan, idHis)
                    reload_data_kamar(idPelayanan);
                }
            });
        }



    }

    function deletePindahKamar() {
        kamarSekarang = $("#inKamarSekarang").val();
        kamarBaru = $("#inTempatTidur").val();
        kelas = $("#inKelasRuangan").val();
        idHis = $("#idHis").val();

        idPelayanan = $("#idPelayanan").val();

        dataString = 'kamarSekarang=' + kamarSekarang + '&kamarBaru=' + kamarBaru +
            '&idHis=' + idHis + '&idPelayanan=' + idPelayanan;
        //        alert(dataString);

        $.ajax({
            type: "POST",
            url: "<?= base_url() . 'Rawatinap/deletePindahKamar' ?>",
            // url: "controller/updatePindahKamar.php",
            data: dataString,
            success: function(data) {
                swal({
                    title: "good job!",
                    type: "success",
                    text: "Tindakan ini Telah di Simpan!",
                    confirmButtonColor: "#3cb878",
                });
                pindah_kamar(idPelayanan, idHis)
                reload_data_kamar(idPelayanan);
            }
        });
    }
    function batal_kamar(id_riwayat, nama) {
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
                    url: "<?php echo base_url() ?>Rawatinap/batal_kamar",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_riwayat: id_riwayat,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "Good Job!",
                                type: "success",
                                text: "Data berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tablekamar').DataTable().ajax.reload();
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
    function reload_data_kamar(idPelayanan) {
        $('#tablekamar').dataTable().fnClearTable();
        $('#tablekamar').dataTable().fnDestroy();
        $('#tablekamar').DataTable({
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
                "url": '<?php echo base_url('Rawatinap/tampil_list_kamar'); ?>',
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
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#inKelasRuangan').change(function() {
            var kelas_ruangan = $('#inKelasRuangan').val();

            $.ajax({
                url: "<?php echo base_url(); ?>Rawatinap/getTempatTidur",
                method: "POST",
                data: {
                    kelas_ruangan: kelas_ruangan
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value=' + '-' + '>' + '-' + '</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_ruangan + '>' + data[i].tipe + '</option>';
                    }
                    $('#inTempatTidur').html(html);
                }
            });

        });
    });
</script>