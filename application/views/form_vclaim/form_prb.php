<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<?php $this->load->view('form_vclaim/Modal_cari_sep'); ?>


<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark">FORM PRB</h6>
        </div>
        <div class="clearfix"></div>
    </div>
    <input type="hidden" class="form-control" value="<?= $id_pel ?>" id="inPel">

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="form-wrap">
                <div class="form-group ">
                    <div class="form-group">
                        <div class="col-md-12">
                            <strong><label class="control-label mb-10 text-left">PEMBUATAN RUJUK BALIK<span class="help"></span></label></strong>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">NO SEP :<span class="help"></span></label>
                                <!-- <span id=" " class="text-danger"></span> -->
                                <div class="has-success">
                                    <input type="text" class="form-control" id="noSep" value="<?= $sep ?>" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">NOMOR KARTU :<span class="help"></span></label>
                                <span id="tm_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" id="noKartu" value="<?= $kartu ?>" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">DIAGNOSA :<span class="help"></span></label>
                                <span id="tgl_error" class="text-danger"></span>
                                <div class="has-success">
                                    <select class="form-control filled-input select2" placeholder="Choose a Category" name="inprogramPRB" id="inprogramPRB">

                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Email :<span class="help"></span></label>
                                <span id="tgl_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" id="email" value="<?php echo empty($form_prb['email']) ? '' : $form_prb['email']; ?>">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">DOKTER :<span class="help"></span></label>
                                <div class="input-group col-md-9 has-success">
                                    <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDPJP" name="inDPJP">
                                        <?php foreach ($dokter as $row) {
                                        ?>
                                            <option value="<?php echo $row["kode_dokter"]; ?>" <?php echo (!empty($form_prb["kodeDpjp"])&& $row["kode_dokter"]==$form_prb["kodeDpjp"]) ? 'selected' : ''; ?>>
                                                <?php echo  $row["nama"]; ?></option>
                                        <?php }  ?>
                                    </select>
                                    <input type="hidden" id="kodeDPJP">

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">ALAMAT :<span class="help"></span></label>
                                <span id="tgl_error" class="text-danger"></span>
                                <div class="has-success">
                                    <textarea type="text" class="form-control" id="inAlamat" value="" disabled><?= $alamat ?></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">KETERANGAN :<span class="help"></span></label>
                                <span id="tgl_error" class="text-danger"></span>
                                <div class="has-success">
                                    <textarea type="text" class="form-control" id="keterangan"><?php echo empty($form_prb['keterangan']) ? '' : $form_prb['keterangan']; ?></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">SARAN :<span class="help"></span></label>
                                <span id="tgl_error" class="text-danger"></span>
                                <div class="has-success">
                                    <textarea type="text" class="form-control" id="saran"><?php echo empty($form_prb['saran']) ? '' : $form_prb['saran']; ?></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group ">

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">TAMBAHKAN OBAT :<span class="help"></span></label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#newPeternakModal">Tambah</a>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                    </div>
                                    <table class="table table-hover display  pb-60" style="" id="tabel_terapi">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>EDIT</th>
                                                <th>HAPUS</th>
                                                <th>KODE OBAT</th>
                                                <th>SIGNA1</th>
                                                <th>SIGNA2</th>
                                                <th>JUMLAH OBAT</th>
                                            </tr>
                                        </thead>

                                        <tbody style="color: black">
                                        </tbody>
                                        <tfoot>
                                            <tr class="bg-success">
                                                <th>EDIT</th>
                                                <th>HAPUS</th>
                                                <th>KODE OBAT</th>
                                                <th>SIGNA1</th>
                                                <th>SIGNA2</th>
                                                <th>JUMLAH OBAT</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="modal fade" id="newPeternakModal" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="newPeternakModallabel">
                                                        Tambah Obat</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="hidden" class="form-control" value="<?= $id_pel ?>" id="inPel">
                                                                <input type="hidden" class="form-control" value="<?= $id_his ?>" id="inHis">
                                                                <input type="hidden" class="form-control" value="<?= $sep ?>" id="noSep">
                                                                <div class="col-md-6">
                                                                    <label class="control-label mb-10 text-left">OBAT
                                                                        GENERIK<span class="help"></span></label>
                                                                    <div class="has-success">
                                                                        <input type="text" autocomplete="off" class="form-control" id="kdObat" placeholder="Ketik Nama Obat" value="">
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label mb-10 text-left">SIGNA
                                                                        1<span class="help"></span></label>
                                                                    <div class="has-success">

                                                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="signa1" name="signa1">
                                                                            <?php foreach ($signa as $row1) {
                                                                            ?>
                                                                                <option value="<?php echo $row1["id_signa"]; ?>">
                                                                                    <?php echo  $row1["tindakan"]; ?>
                                                                                </option>
                                                                            <?php }  ?>
                                                                        </select>
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label mb-10 text-left">SIGNA
                                                                        2<span class="help"></span></label>
                                                                    <div class="has-success">
                                                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="signa2" name="signa2">
                                                                            <?php foreach ($signa as $row1) {
                                                                            ?>
                                                                                <option value="<?php echo $row1["id_signa"]; ?>">
                                                                                    <?php echo  $row1["tindakan"]; ?>
                                                                                </option>
                                                                            <?php }  ?>
                                                                        </select>
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label mb-10 text-left">JUMLAH
                                                                        OBAT<span class="help"></span></label>
                                                                    <div class="has-success">
                                                                        <input type="number" step="any" class="form-control" id="jumlah" value="">
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer mb-5 mr-5 mt-10">
                                                    <button class="btn btn-success btn-anim  btn-sm" onclick="simpan_tindakan1()" style="margin-right: 40px;" id="simpanKunjungan"><span class="btn-text">SIMPAN</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="edit" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="newPeternakModallabel">Edit Obat
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="hidden" class="form-control" value="<?= $id_pel ?>" id="upPel">
                                                                <input type="hidden" class="form-control" value="<?= $id_his ?>" id="upHis">
                                                                <input type="hidden" class="form-control" value="<?= $sep ?>" id="upnoSep">
                                                                <input type="hidden" class="form-control" id="id_form">
                                                                <div class="col-md-6">
                                                                    <label class="control-label mb-10 text-left">KODE
                                                                        OBAT<span class="help"></span></label>
                                                                    <div class="has-success">
                                                                        <input type="text" autocomplete="off" class="form-control" id="UpkdObat" value="">
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label mb-10 text-left">SIGNA
                                                                        1<span class="help"></span></label>
                                                                    <div class="has-success">
                                                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="upsigna1" name="upsigna1">
                                                                            <?php foreach ($signa as $row1) {
                                                                            ?>
                                                                                <option value="<?php echo $row1["kode_signa"]; ?>">
                                                                                    <?php echo  $row1["tindakan"]; ?>
                                                                                </option>
                                                                            <?php }  ?>
                                                                        </select>
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label mb-10 text-left">SIGNA
                                                                        2<span class="help"></span></label>
                                                                    <div class="has-success">
                                                                        <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="upsigna2" name="upsigna2">
                                                                            <?php foreach ($signa as $row1) {
                                                                            ?>
                                                                                <option value="<?php echo $row1["kode_signa"]; ?>">
                                                                                    <?php echo  $row1["tindakan"]; ?>
                                                                                </option>
                                                                            <?php }  ?>
                                                                        </select>
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label mb-10 text-left">JUMLAH
                                                                        OBAT<span class="help"></span></label>
                                                                    <div class="has-success">
                                                                        <input type="number" step="any" class="form-control" id="upjumlah" value="">
                                                                        <span class="help-block"></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer mb-5 mr-5 mt-10">
                                                    <button class="btn btn-success btn-anim  btn-sm" onclick="edit()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">Update</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center" style="margin-top: 30px;">
                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                    <?php if (!empty($form_prb)) {

                                    ?>
                                        <button class="btn btn-warning mb-4" onclick="edit_form()">Simpan</button>

                                    <?php } else { ?>
                                        <button class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
<script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>

<script type="text/javascript">
    function simpan() {
        id_pel = $('#inPel').val();
        id_his = $('#inHis').val();
        sep = $('#noSep').val();
        noKartu = $('#noKartu').val();
        alamat = $('#inAlamat').val();
        email = $('#email').val();
        programPrb = $('#inprogramPRB').val();
        kodeDpjp = $('#inDPJP').val();
        keterangan = $('#keterangan').val();
        saran = $('#saran').val();

        id_pel = "<?php echo urlencode(base64_encode($id_pel)); ?>";
        id_his = "<?php echo urlencode(base64_encode($id_his)); ?>";
        $.ajax({
            url: "<?php echo base_url() ?>Vclaim_bpjs/insert_prb",
            method: "POST",
            dataType: 'json',
            data: {
                sep: sep,
                kodeDpjp: kodeDpjp,
                noKartu: noKartu,
                alamat: alamat,
                email: email,
                programPrb: programPrb,
                keterangan: keterangan,
                saran: saran,
                id_pel: id_pel,
                id_his: id_his,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil dinput. NO SRB : " + data.data['noSRB'],
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
        return false;
    }

    function edit_form() {
        id_pel = $('#inPel').val();
        id_his = $('#inHis').val();
        sep = $('#noSep').val();
        noKartu = $('#noKartu').val();
        alamat = $('#inAlamat').val();
        email = $('#email').val();
        programPrb = $('#inprogramPRB').val();
        kodeDpjp = $('#inDPJP').val();
        keterangan = $('#keterangan').val();
        saran = $('#saran').val();


        $.ajax({
            url: "<?php echo base_url() ?>Vclaim_bpjs/update_prb",
            method: "POST",
            dataType: 'json',
            data: {
                noSrb: '<?= $form_prb['noSRB'] ?>',
                sep: sep,
                kodeDpjp: kodeDpjp,
                noKartu: noKartu,
                alamat: alamat,
                email: email,
                programPrb: programPrb,
                keterangan: keterangan,
                saran: saran,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil dinput. NO SRB : " + data.data,
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
        return false;
    }

    function simpan_tindakan1() {
        id_his = $('#inHis').val();
        id_pel = $('#inPel').val();
        sep = $('#noSep').val();
        obat = $('#kdObat').val();
        splitObat = obat.split(' | ');
        kdObat = splitObat[0];
        nama = splitObat[1];

        signa1 = $('#signa1').val();
        signa2 = $('#signa2').val();
        jumlah = $('#jumlah').val();

        $.ajax({
            url: "<?php echo base_url() ?>Vclaim/insert_obat",
            method: "POST",
            dataType: 'json',
            data: {
                id_his: id_his,
                id_pel: id_pel,
                noSep: sep,
                kdObat: kdObat,
                nama: nama,
                signa1: signa1,
                signa2: signa2,
                jumlah: jumlah,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil ditambah",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#newPeternakModal").modal('hide');
                    $('#tabel_terapi').DataTable().ajax.reload();
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
        return false;
    }

    function hapus_tindakan(id) { //utk hapus diagnosa pasien
        swal({
            title: "Warning?",
            text: "Apakah kamu yakin menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Vclaim/hapus_obat",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tabel_terapi').DataTable().ajax.reload();
                        } else {
                            swal({
                                title: "Gagal!",
                                type: "warning",
                                confirmButtonColor: "#3cb878",
                            });
                        }
                    }
                });
            });
        });
        return false;
    }

    function pilih(id) {
        $('#id_form').val(id);
        $.ajax({
            url: "<?php echo base_url() ?>Vclaim/get_obat_obatPrb",
            method: "POST",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                $("#id_form").val(id);
                $('#UpkdObat').val(data.kdObat);
                $('#upsigna1').val(data.signa1);
                $('#upsigna2').val(data.signa2);
                $('#upjumlah').val(data.jumlah);
                $("#edit").modal('show');
                $('#tabel_terapi').DataTable().ajax.reload();

            }

        });
        return false;
    }

    function edit() {
        id_his = $('#upHis').val();
        id_pel = $('#upPel').val();
        sep = $('#upnoSep').val();
        obatup = $('#UpkdObat').val();
        splitObat = obatup.split(' | ');
        UpkdObat = splitObat[0];
        nama = splitObat[1];

        signa1 = $('#upsigna1').val();
        signa2 = $('#upsigna2').val();
        jumlah = $('#upjumlah').val();

        $.ajax({
            url: "<?php echo base_url() ?>Vclaim/edit_obat",
            method: "POST",
            dataType: 'json',
            data: {
                id_form: $("#id_form").val(),
                kdObat: UpkdObat,
                nama: nama,
                signa1: signa1,
                signa2: signa2,
                jumlah: jumlah,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil diUbah",
                        confirmButtonColor: "#3cb878",
                    });
                    $("#edit").modal('hide');
                    $('#tabel_terapi').DataTable().ajax.reload();
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
        return false;
    }
</script>
<script>
    $(document).ready(function() {
        sep = $('#noSep').val();
        id_his = $('#inHIs').val();
        id_pel = $('#inPel').val();
        reload_data_id_pel(id_his, id_pel, sep);
    });

    function reload_data_id_pel(id_his, id_pel, sep) { //utk reload data diagnosa pasien jika berhasil
        $('#tabel_terapi').dataTable().fnClearTable();
        $('#tabel_terapi').dataTable().fnDestroy();
        $('#tabel_terapi').DataTable({
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir",
                }
            },
            "ajax": {
                "url": '<?php echo base_url('Vclaim/tampil_list_obat'); ?>',
                "type": 'POST',
                "data": {
                    id_his: id_his,
                    id_pel: id_pel,
                    sep: sep,
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
        $.ajax({
            url: "<?php echo base_url(); ?>Vclaim_bpjs/getDiagnosaPRB",
            method: "GET",
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                html = '<option value="">Pilih</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode + '>' + data[i].nama + '</option>';
                }
                $('#inprogramPRB').html(html);
                var diagnosa =
                    "<?php echo (!empty($form_prb["programPrb"])) ? $form_prb["programPrb"] : ''; ?>";
                // alert(diagnosa);
                $('#inprogramPRB').val(diagnosa).change();
            }
        });




    });
</script>

<script type="text/javascript">
    $('#kdObat').autocomplete({

        source: function(query, response) {
            $.ajax({
                url: "<?php echo base_url(); ?>Vclaim_bpjs/getObatPRB",
                method: "POST",
                data: {
                    query: query,
                },
                minLength: 3,
                dataType: "json",
                cache: false,
                success: function(data) {
                    response($.map(data.slice(0, 5), function(item) {
                        return item.kode + ' | ' + item.nama;
                    }));

                }
            });
        },
        appendTo: "#newPeternakModal"
    });
    $('#UpkdObat').autocomplete({

        source: function(query, response) {
            $.ajax({
                url: "<?php echo base_url(); ?>Vclaim_bpjs/getObatPRB",
                method: "POST",
                data: {
                    query: query,
                },
                minLength: 3,
                dataType: "json",
                cache: false,
                success: function(data) {
                    response($.map(data.slice(0, 5), function(item) {
                        return item.kode + ' | ' + item.nama;
                    }));

                }
            });
        },
        appendTo: "#edit"
    });
</script>