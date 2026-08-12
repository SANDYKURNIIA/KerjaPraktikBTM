<<<<<<< HEAD
<div class="page_content">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h2 class="panel-title txt-dark"><strong>Audiometri</strong></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <h4 class="panel-title txt-dark"><b><strong>DATA PASIEN</strong></b></h4>



                                <div class="row mt-20">
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">NIK</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="nik_npp" value="<?php echo $data_mcu['no_ktp']; ?>" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Nama Lengkap</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="inName" disabled=""
                                                    value="<?php echo $data_mcu['nama_pasien']; ?>">
                                                <p id="namefull" style="font-size:12px; margin-top:5px;"></p>
                                                <input type="hidden" id="intanggalmasuk"
                                                    value="<?php echo date('Y-m-d H:i:s'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Jenis Kelamin</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="inJK" value="<?php echo $data_mcu['jenis_kelamin']; ?>" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">No Panduan</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="no_panduan" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Umur</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" disabled="" class="form-control" value="<?php
                                                                                                            setlocale(LC_ALL, 'id_ID');
                                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                                            $time = strtotime($data_mcu['tgl_lahir']);
                                                                                                            $date = strftime("%d %B %Y", $time);
                                                                                                            echo getAge($date)
                                                                                                            ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Upload File</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="dokumen_periksa" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-upload"></i>
                                                    </span>
                                                </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Dokter Pemeriksa</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="dokter_periksa" placeholder="Cari...">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-6 pt-5" for="kelainan">Apakah terdapat kelainan pada pemeriksaan-pemeriksaan di bawah?</label>
                                            <input type="radio" id="tidak_kelainan" name="kelainan" value="tidak">
                                            <label class="control-label" for="tidak_kelainan">Tidak</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="ya_kelainan" name="kelainan" value="ya">
                                            <label class="control-label" for="ya_kelainan">Ya</label>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <br>

                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Telinga Kanan</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Telinga Kanan:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="telinga_kanan" id="telinga_kanan1" checked>
                                                            <label class="control-label" for="telinga_kanan1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="telinga_kanan" id="telinga_kanan2">
                                                            <label class="control-label" for="telinga_kanan2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Telinga Kiri</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Telinga Kiri:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="telinga_kiri" id="telinga_kiri1" checked>
                                                            <label class="control-label" for="telinga_kiri1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="telinga_kiri" id="telinga_kiri2">
                                                            <label class="control-label" for="telinga_kiri2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Kesimpulan</strong></b></h4>
                                <hr>
                                <div class="row mt-20">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Kesimpulan:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="kesimpulan" id="kesimpulan1">
                                                            <label class="control-label" for="kesimpulan1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="kesimpulan" id="kesimpulan2">
                                                            <label class="control-label" for="kesimpulan2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>

                                            <div class="col-md-9 has-success kesimpulan2 collapse" >
                                                <textarea class="form-control" rows="4" cols="50" placeholder="-" id="kesimpulan"></textarea>

                                            </div>

                                        </div>
                                    </div>
                                </div>



                                <div class="modal-footer mb-5 mr-5 mt-10">
                                    <input type="hidden" id="id_mcu" value="<?php echo $data_mcu['id_mcu']; ?>">
                                    <button onclick="insertData()" class="btn btn-success btn-anim  btn-sm"><i
                                            class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->


                </div>
                <!-- /Main Content -->

            </div>
        </div>
    </div>

</div>

<link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
<script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/jquery-ui.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dokter_periksa').autocomplete({
            source: function(query, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Pelayanan_masuk/getNamaDokter",
                    type: "POST",
                    dataType: "json",
                    data: {
                        query: query,
                    },

                    success: function(data) {
                        response(data);
                        // response($.map(data.message, function(item) {
                        //     return item.value;
                        // }));

                    },

                });
            },
            focus: function(event, ui) {
                $('#dokter_periksa').val(ui.item.value);
            },
            select: function(event, ui) {
                //$('#inObat').val(ui.item.nama);
                //alert(ui.item.value);
                $('#dokter_periksa').val(ui.item.value);

            },
            // appendTo: "#modal_edit_resep"
        });
        $('input[name="kesimpulan"]').change(function() {
            if ($(this).val() === 'Kelainan' && $(this).prop('checked')) {
                $(".kesimpulan2").collapse('show');
            } else {
                $(".kesimpulan2").collapse('hide'); // Jika radio button lain dipilih, sembunyikan kembali (opsional)
            }
        });
    });
</script>

<script type="text/javascript">
    function insertData() {
        var formData = new FormData();


        formData.append("id_mcu", $("#id_mcu").val());
        formData.append("dokter_periksa", $("#dokter_periksa").val());
        var kelainan = $("input[name='kelainan']:checked").val();
        formData.append("kelainan", kelainan);
        var telingaKanan = $("input[name='telinga_kanan']:checked").val();
        formData.append("telinga_kanan", telingaKanan);
        var telingaKiri = $("input[name='telinga_kiri']:checked").val();
        formData.append("telinga_kiri", telingaKiri);
        var kesimpulan = $("input[name='kesimpulan']:checked").val();
        kesimpulan = (kesimpulan === 'Kelainan') ? $("#kesimpulan").val() : kesimpulan;
        formData.append("kesimpulan", kesimpulan);

        var fileInput = $("#dokumen_periksa")[0];
        if (fileInput.files.length > 0) {
            formData.append("dokumen_periksa", fileInput.files[0]);
        }

        $.ajax({
            url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/simpan_audiometri", // Ganti dengan URL endpoint server Anda
            type: "POST",
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Medical Check Up Pasien ini telah disimpan",
                        confirmButtonColor: "#3cb878",
                    }, function() {
                        location.reload();
                    });


                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: data.status,
                        confirmButtonColor: "#3cb878",
                    });
                }
            },
            error: function(error) {
                swal({
                    title: "Gagal!",
                    type: "warning",
                    text: "Terjadi kesalahan saat menyimpan data.",
                    confirmButtonColor: "#3cb878",
                });

            }
        });
    }



    $(document).ready(function() {
        id_pelayanan = $('#id_mcu').val();
        $.ajax({
            url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/get_data_pemeriksaan",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
                table: 'audiometri_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('input[name="kelainan"][value="' + data.kelainan + '"]').prop("checked", true);
                    $('input[name="telinga_kanan"][value="' + data.telinga_kanan + '"]').prop("checked", true);
                    $('input[name="telinga_kiri"][value="' + data.telinga_kiri + '"]').prop("checked", true);
                    if (data.kesimpulan === 'Normal') {
                        $('input[name="kesimpulan"][value="' + data.kesimpulan + '"]').prop("checked", true);
                    } else {
                        $('input[name="kesimpulan"][value="Kelainan"]').prop("checked", true).change();
                        $('#kesimpulan').val(data.kesimpulan);
                    }

                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
=======
<div class="page_content">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h2 class="panel-title txt-dark"><strong>Audiometri</strong></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <h4 class="panel-title txt-dark"><b><strong>DATA PASIEN</strong></b></h4>



                                <div class="row mt-20">
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">NIK</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="nik_npp" value="<?php echo $data_mcu['no_ktp']; ?>" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Nama Lengkap</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="inName" disabled=""
                                                    value="<?php echo $data_mcu['nama_pasien']; ?>">
                                                <p id="namefull" style="font-size:12px; margin-top:5px;"></p>
                                                <input type="hidden" id="intanggalmasuk"
                                                    value="<?php echo date('Y-m-d H:i:s'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Jenis Kelamin</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="inJK" value="<?php echo $data_mcu['jenis_kelamin']; ?>" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">No Panduan</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="no_panduan" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Umur</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" disabled="" class="form-control" value="<?php
                                                                                                            setlocale(LC_ALL, 'id_ID');
                                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                                            $time = strtotime($data_mcu['tgl_lahir']);
                                                                                                            $date = strftime("%d %B %Y", $time);
                                                                                                            echo getAge($date)
                                                                                                            ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Upload File</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="dokumen_periksa" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-upload"></i>
                                                    </span>
                                                </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Dokter Pemeriksa</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="dokter_periksa" placeholder="Cari...">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-6 pt-5" for="kelainan">Apakah terdapat kelainan pada pemeriksaan-pemeriksaan di bawah?</label>
                                            <input type="radio" id="tidak_kelainan" name="kelainan" value="tidak">
                                            <label class="control-label" for="tidak_kelainan">Tidak</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="ya_kelainan" name="kelainan" value="ya">
                                            <label class="control-label" for="ya_kelainan">Ya</label>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <br>

                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Telinga Kanan</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Telinga Kanan:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="telinga_kanan" id="telinga_kanan1" checked>
                                                            <label class="control-label" for="telinga_kanan1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="telinga_kanan" id="telinga_kanan2">
                                                            <label class="control-label" for="telinga_kanan2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Telinga Kiri</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Telinga Kiri:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="telinga_kiri" id="telinga_kiri1" checked>
                                                            <label class="control-label" for="telinga_kiri1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="telinga_kiri" id="telinga_kiri2">
                                                            <label class="control-label" for="telinga_kiri2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Kesimpulan</strong></b></h4>
                                <hr>
                                <div class="row mt-20">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Kesimpulan:</label>
                                            <div class="col-md-9 ">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Normal" name="kesimpulan" id="kesimpulan1">
                                                            <label class="control-label" for="kesimpulan1">Normal</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Kelainan" name="kesimpulan" id="kesimpulan2">
                                                            <label class="control-label" for="kesimpulan2">Kelainan</label>
                                                        </span>
                                                    </div>
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>

                                            <div class="col-md-9 has-success kesimpulan2 collapse" >
                                                <textarea class="form-control" rows="4" cols="50" placeholder="-" id="kesimpulan"></textarea>

                                            </div>

                                        </div>
                                    </div>
                                </div>



                                <div class="modal-footer mb-5 mr-5 mt-10">
                                    <input type="hidden" id="id_mcu" value="<?php echo $data_mcu['id_mcu']; ?>">
                                    <button onclick="insertData()" class="btn btn-success btn-anim  btn-sm"><i
                                            class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->


                </div>
                <!-- /Main Content -->

            </div>
        </div>
    </div>

</div>

<link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
<script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/jquery-ui.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dokter_periksa').autocomplete({
            source: function(query, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Pelayanan_masuk/getNamaDokter",
                    type: "POST",
                    dataType: "json",
                    data: {
                        query: query,
                    },

                    success: function(data) {
                        response(data);
                        // response($.map(data.message, function(item) {
                        //     return item.value;
                        // }));

                    },

                });
            },
            focus: function(event, ui) {
                $('#dokter_periksa').val(ui.item.value);
            },
            select: function(event, ui) {
                //$('#inObat').val(ui.item.nama);
                //alert(ui.item.value);
                $('#dokter_periksa').val(ui.item.value);

            },
            // appendTo: "#modal_edit_resep"
        });
        $('input[name="kesimpulan"]').change(function() {
            if ($(this).val() === 'Kelainan' && $(this).prop('checked')) {
                $(".kesimpulan2").collapse('show');
            } else {
                $(".kesimpulan2").collapse('hide'); // Jika radio button lain dipilih, sembunyikan kembali (opsional)
            }
        });
    });
</script>

<script type="text/javascript">
    function insertData() {
        var formData = new FormData();


        formData.append("id_mcu", $("#id_mcu").val());
        formData.append("dokter_periksa", $("#dokter_periksa").val());
        var kelainan = $("input[name='kelainan']:checked").val();
        formData.append("kelainan", kelainan);
        var telingaKanan = $("input[name='telinga_kanan']:checked").val();
        formData.append("telinga_kanan", telingaKanan);
        var telingaKiri = $("input[name='telinga_kiri']:checked").val();
        formData.append("telinga_kiri", telingaKiri);
        var kesimpulan = $("input[name='kesimpulan']:checked").val();
        kesimpulan = (kesimpulan === 'Kelainan') ? $("#kesimpulan").val() : kesimpulan;
        formData.append("kesimpulan", kesimpulan);

        var fileInput = $("#dokumen_periksa")[0];
        if (fileInput.files.length > 0) {
            formData.append("dokumen_periksa", fileInput.files[0]);
        }

        $.ajax({
            url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/simpan_audiometri", // Ganti dengan URL endpoint server Anda
            type: "POST",
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Medical Check Up Pasien ini telah disimpan",
                        confirmButtonColor: "#3cb878",
                    }, function() {
                        location.reload();
                    });


                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: data.status,
                        confirmButtonColor: "#3cb878",
                    });
                }
            },
            error: function(error) {
                swal({
                    title: "Gagal!",
                    type: "warning",
                    text: "Terjadi kesalahan saat menyimpan data.",
                    confirmButtonColor: "#3cb878",
                });

            }
        });
    }



    $(document).ready(function() {
        id_pelayanan = $('#id_mcu').val();
        $.ajax({
            url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/get_data_pemeriksaan",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
                table: 'audiometri_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('input[name="kelainan"][value="' + data.kelainan + '"]').prop("checked", true);
                    $('input[name="telinga_kanan"][value="' + data.telinga_kanan + '"]').prop("checked", true);
                    $('input[name="telinga_kiri"][value="' + data.telinga_kiri + '"]').prop("checked", true);
                    if (data.kesimpulan === 'Normal') {
                        $('input[name="kesimpulan"][value="' + data.kesimpulan + '"]').prop("checked", true);
                    } else {
                        $('input[name="kesimpulan"][value="Kelainan"]').prop("checked", true).change();
                        $('#kesimpulan').val(data.kesimpulan);
                    }

                    $('#dokter_periksa').val(data.dokter_periksa);

                }
            }

        });
    });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>