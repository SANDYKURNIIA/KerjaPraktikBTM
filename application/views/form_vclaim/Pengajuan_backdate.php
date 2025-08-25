<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<?php $this->load->view('form_vclaim/Modal_cari_sep'); ?>


<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark">FORM PENGAJUAN APROVAL</h6>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="form-wrap">
                <div class="form-group">
                    <div class="col-md-12">
                        <strong><label class="control-label mb-10 text-left">BACKDATE / FINGERPRINT<span class="help"></span></label></strong>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label mb-10 text-left">NOMOR KARTU</label>
                            <div class="input-group col-md-9 has-success">
                                <input type="text" class="form-control" id="noKartu" value="<?= $kartu ?>" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label mb-10 text-left">TANGGAL SEP </label>
                            <div class="input-group col-md-9 has-success">
                                <input type="date" autocomplete="off" class="form-control" placeholder="TANGGAL SEP" name="inTglSEP" id="inTglSEP" value="<?= date('Y-m-d') ?>">

                            </div>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label mb-10 text-left">KATEGORI </label>
                            <div class="input-group col-md-9 has-success">
                                <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inSepBackdate" id="inSepBackdate">

                                    <option value="PENGAJUAN">PENGAJUAN</option>
                                    <option value="APPROVAL">APPROVAL</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label mb-10 text-left">JENIS PELAYANAN </label>
                            <div class="input-group col-md-9 has-success">
                                <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inJenisPel" id="inJenisPel">
                                    <option value="">-</option>
                                    <option value="1">Rawat Inap</option>
                                    <option value="2">Rawat Jalan</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label mb-10 text-left">JENIS PENGAJUAN </label>
                            <div class="input-group col-md-9 has-success">
                                <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" name="inJenisPega" id="inJenisPega">
                                    <option value="">-</option>
                                    <option value="1">Pengajuan Backdate</option>
                                    <option value="2">Pengajuan Finger Print</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label mb-10 text-left">KETERANGAN </label>
                            <div class="input-group col-md-9 has-success">
                                <input type="text" autocomplete="off" class="form-control" name="inKeterangan" id="inKeterangan" value="">
                                <span class="help-block"></span>
                            </div>

                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label mb-10 text-left">KETERANGAN </label>
                            <div class="input-group col-md-9 has-success">
                                <textarea class="form-control" id="inKeterangan" rows="4"></textarea>
                                <span class="help-block"></span>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer mb-5 mr-5 mt-10">
                        <button style="margin-top:50px; margin-right:150px;" class="btn btn-success btn-anim  btn-sm" onclick="simpan()" style="margin-right: 40px;"><span class="btn-text">SIMPAN</span></button>
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
        noKartu = $('#noKartu').val();
        inSepBackdate = $('#inSepBackdate').val();
        inTglSEP = $('#inTglSEP').val();
        inJenisPel = $('#inJenisPel').val();
        inKeterangan = $('#inKeterangan').val();
        inJenisPega = $('#inJenisPega').val();

        if (inSepBackdate == 'PENGAJUAN') {
            url = "<?php echo base_url() ?>Vclaim_bpjs/pengajuan_sep";
        } else {
            url = "<?php echo base_url() ?>Vclaim_bpjs/approval_sep";

        }

        $.ajax({
            url: url,
            method: "POST",
            dataType: 'json',
            data: {
                noKartu: noKartu,
                tglSep: inTglSEP,
                jnsPelayanan: inJenisPel,
                jnsPengajuan: inJenisPega,
                keterangan: inKeterangan,
            },
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: data.data,
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

    // function edit_form() {
    //     id_pel = $('#inPel').val();
    //     id_his = $('#inHis').val();
    //     sep = $('#noSep').val();
    //     noKartu = $('#noKartu').val();
    //     alamat = $('#inAlamat').val();
    //     email = $('#email').val();
    //     programPrb = $('#inprogramPRB').val();
    //     kodeDpjp = $('#inDPJP').val();
    //     keterangan = $('#keterangan').val();
    //     saran = $('#saran').val();


    //     $.ajax({
    //         url: "<php echo base_url() ?>Vclaim_bpjs/update_prb",
    //         method: "POST",
    //         dataType: 'json',
    //         data: {
    //             noSrb: '<= $form_prb['noSRB'] ?>',
    //             sep: sep,
    //             kodeDpjp: kodeDpjp,
    //             noKartu: noKartu,
    //             alamat: alamat,
    //             email: email,
    //             programPrb: programPrb,
    //             keterangan: keterangan,
    //             saran: saran,
    //         },
    //         success: function(data) {
    //             if (data.status == "success") {
    //                 swal({
    //                     title: "good job!",
    //                     type: "success",
    //                     text: "Data Berhasil dinput. NO SRB : " + data.data,
    //                     confirmButtonColor: "#3cb878",
    //                 });
    //             } else {
    //                 swal({
    //                     title: "Gagal!",
    //                     type: "warning",
    //                     text: data.status,
    //                     confirmButtonColor: "#3cb878",
    //                 });
    //             }
    //         }

    //     });
    //     return false;
    // }

    // function simpan_tindakan1() {
    //     id_his = $('#inHis').val();
    //     id_pel = $('#inPel').val();
    //     sep = $('#noSep').val();
    //     obat = $('#kdObat').val();
    //     splitObat = obat.split(' | ');
    //     kdObat = splitObat[0];

    //     signa1 = $('#signa1').val();
    //     signa2 = $('#signa2').val();
    //     jumlah = $('#jumlah').val();

    //     $.ajax({
    //         url: "<php echo base_url() ?>Vclaim/insert_obat",
    //         method: "POST",
    //         dataType: 'json',
    //         data: {
    //             id_his: id_his,
    //             id_pel: id_pel,
    //             noSep: sep,
    //             kdObat: kdObat,
    //             signa1: signa1,
    //             signa2: signa2,
    //             jumlah: jumlah,
    //         },
    //         success: function(data) {
    //             if (data.status == "success") {
    //                 swal({
    //                     title: "good job!",
    //                     type: "success",
    //                     text: "Data Berhasil ditambah",
    //                     confirmButtonColor: "#3cb878",
    //                 });
    //                 $("#newPeternakModal").modal('hide');
    //                 $('#tabel_terapi').DataTable().ajax.reload();
    //             } else {
    //                 swal({
    //                     title: "Gagal!",
    //                     type: "warning",
    //                     text: data.status,
    //                     confirmButtonColor: "#3cb878",
    //                 });
    //             }
    //         }

    //     });
    //     return false;
    // }

    // function hapus_tindakan(id) { //utk hapus diagnosa pasien
    //     swal({
    //         title: "Warning?",
    //         text: "Apakah kamu yakin menghapus data ini?",
    //         type: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#3cb878",
    //         confirmButtonText: "Yakin",
    //         cancelButtonText: "Batal",
    //         closeOnConfirm: false
    //     }, function() {
    //         $().ready(function() {
    //             $.ajax({
    //                 url: "<php echo base_url() ?>Vclaim/hapus_obat",
    //                 method: "POST",
    //                 dataType: 'json',
    //                 data: {
    //                     id: id,
    //                 },
    //                 success: function(data) {
    //                     if (data.status == "success") {
    //                         swal({
    //                             title: "good job!",
    //                             type: "success",
    //                             text: "Data Berhasil dihapus",
    //                             confirmButtonColor: "#3cb878",
    //                         });
    //                         $('#tabel_terapi').DataTable().ajax.reload();
    //                     } else {
    //                         swal({
    //                             title: "Gagal!",
    //                             type: "warning",
    //                             confirmButtonColor: "#3cb878",
    //                         });
    //                     }
    //                 }
    //             });
    //         });
    //     });
    //     return false;
    // }

    // function pilih(id) {
    //     $('#id_form').val(id);
    //     $.ajax({
    //         url: "<php echo base_url() ?>Vclaim/get_obat_obatPrb",
    //         method: "POST",
    //         dataType: 'json',
    //         data: {
    //             id: id
    //         },
    //         success: function(data) {
    //             $("#id_form").val(id);
    //             $('#UpkdObat').val(data.kdObat);
    //             $('#upsigna1').val(data.signa1);
    //             $('#upsigna2').val(data.signa2);
    //             $('#upjumlah').val(data.jumlah);
    //             $("#edit").modal('show');
    //             $('#tabel_terapi').DataTable().ajax.reload();

    //         }

    //     });
    //     return false;
    // }

    // function edit() {
    //     id_his = $('#upHis').val();
    //     id_pel = $('#upPel').val();
    //     sep = $('#upnoSep').val();
    //     obatup = $('#UpkdObat').val();
    //     splitObat = obatup.split(' | ');
    //     UpkdObat = splitObat[0];

    //     signa1 = $('#upsigna1').val();
    //     signa2 = $('#upsigna2').val();
    //     jumlah = $('#upjumlah').val();

    //     $.ajax({
    //         url: "<php echo base_url() ?>Vclaim/edit_obat",
    //         method: "POST",
    //         dataType: 'json',
    //         data: {
    //             id_form: $("#id_form").val(),
    //             kdObat: UpkdObat,
    //             signa1: signa1,
    //             signa2: signa2,
    //             jumlah: jumlah,
    //         },
    //         success: function(data) {
    //             if (data.status == "success") {
    //                 swal({
    //                     title: "good job!",
    //                     type: "success",
    //                     text: "Data Berhasil diUbah",
    //                     confirmButtonColor: "#3cb878",
    //                 });
    //                 $("#edit").modal('hide');
    //                 $('#tabel_terapi').DataTable().ajax.reload();
    //             } else {
    //                 swal({
    //                     title: "Gagal!",
    //                     type: "warning",
    //                     text: data.status,
    //                     confirmButtonColor: "#3cb878",
    //                 });
    //             }
    //         }

    //     });
    //     return false;
    // }
</script>
<script>
    // $(document).ready(function() {
    //     sep = $('#noSep').val();
    //     id_his = $('#inHIs').val();
    //     id_pel = $('#inPel').val();
    //     reload_data_id_pel(id_his, id_pel, sep);
    // });

    // function reload_data_id_pel(id_his, id_pel, sep) { //utk reload data diagnosa pasien jika berhasil
    //     $('#tabel_terapi').dataTable().fnClearTable();
    //     $('#tabel_terapi').dataTable().fnDestroy();
    //     $('#tabel_terapi').DataTable({
    //         "language": {
    //             "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
    //             "sProcessing": "Sedang memproses...",
    //             "sLengthMenu": "Tampilkan _MENU_ entri",
    //             "sZeroRecords": "Tidak ditemukan data yang sesuai",
    //             "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    //             "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
    //             "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    //             "sInfoPostFix": "",
    //             "sSearch": "Cari:",
    //             "sUrl": "",
    //             "oPaginate": {
    //                 "sFirst": "Pertama",
    //                 "sPrevious": "Sebelumnya",
    //                 "sNext": "Selanjutnya",
    //                 "sLast": "Terakhir",
    //             }
    //         },
    //         "ajax": {
    //             "url": '<php echo base_url('Vclaim/tampil_list_obat'); ?>',
    //             "type": 'POST',
    //             "data": {
    //                 id_his: id_his,
    //                 id_pel: id_pel,
    //                 sep: sep,
    //             },
    //         },

    //         "deferRender": true,
    //         "processing": true,
    //         "order": [],
    //         "columnDefs": [{
    //             "targets": [0],
    //             "orderable": false,
    //         }, ],
    //     });
    // }
</script>
<script type="text/javascript">
    // $(document).ready(function() {
    //     $.ajax({
    //         url: "<php echo base_url(); ?>Vclaim_bpjs/getDiagnosaPRB",
    //         method: "GET",
    //         dataType: 'json',
    //         success: function(data) {
    //             var html = '';
    //             var i;
    //             html = '<option value="">Pilih</option>';
    //             for (i = 0; i < data.length; i++) {
    //                 html += '<option value=' + data[i].kode + '>' + data[i].nama + '</option>';
    //             }
    //             $('#inprogramPRB').html(html);
    //             var diagnosa =
    //                 "<php echo (!empty($form_prb["programPrb"])) ? $form_prb["programPrb"] : ''; ?>";
    //             // alert(diagnosa);
    //             $('#inprogramPRB').val(diagnosa).change();
    //         }
    //     });




    // });
</script>

<script type="text/javascript">
    // $('#kdObat').autocomplete({

    //     source: function(query, response) {
    //         $.ajax({
    //             url: "<php echo base_url(); ?>Vclaim_bpjs/getObatPRB",
    //             method: "POST",
    //             data: {
    //                 query: query,
    //             },
    //             minLength: 3,
    //             dataType: "json",
    //             cache: false,
    //             success: function(data) {
    //                 response($.map(data.slice(0, 5), function(item) {
    //                     return item.kode + ' | ' + item.nama;
    //                 }));

    //             }
    //         });
    //     },
    //     appendTo: "#newPeternakModal"
    // });
    // $('#UpkdObat').autocomplete({

    //     source: function(query, response) {
    //         $.ajax({
    //             url: "<php echo base_url(); ?>Vclaim_bpjs/getObatPRB",
    //             method: "POST",
    //             data: {
    //                 query: query,
    //             },
    //             minLength: 3,
    //             dataType: "json",
    //             cache: false,
    //             success: function(data) {
    //                 response($.map(data.slice(0, 5), function(item) {
    //                     return item.kode + ' | ' + item.nama;
    //                 }));

    //             }
    //         });
    //     },
    //     appendTo: "#edit"
    // });
</script>