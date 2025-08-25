<div class="page_content">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h2 class="panel-title txt-dark"><strong>MATA</strong></h2>
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

                                <table border=1 class="table table-bordered display product-overview mb-30" id="support_table">
                                    <tbody>
                                        <tr>
                                            <th width=30%></th>
                                            <th width=35%>
                                                KIRI
                                            </th>
                                            <th width=35%>
                                                KANAN
                                            </th>
                                        </tr>

                                        <tr>
                                            <td>Tajam Penglihatan Visus</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="tajam_kiri" id="tajam_kiri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="tajam_kanan" id="tajam_kanan" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Binokularitas</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="binokularitas_kiri" id="binokularitas_kiri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="binokularitas_kanan" id="binokularitas_kanan" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kedalaman</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kedalaman_kiri" id="kedalaman_kiri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kedalaman_kanan" id="kedalaman_kanan" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Lapang Pandang</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="lapang_pandang_kiri" id="lapang_pandang_kiri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="lapang_pandang_kanan" id="lapang_pandang_kanan" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Diferensiasi Warna</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="diferensiasi_warna_kiri" id="diferensiasi_warna_kiri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="diferensiasi_warna_kanan" id="diferensiasi_warna_kanan" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Stereognosis</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="stereognosis_kiri" id="stereognosis_kiri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="stereognosis_kanan" id="stereognosis_kanan" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fundus</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="fundus_kiri" id="fundus_kiri1" value="Normal" class="rad1" checked />
                                                            <label for="fundus_kiri1">Normal</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="fundus_kiri" id="fundus_kiri2" value="Kelainan" class="rad1" />
                                                            <label for="fundus_kiri2">Kelainan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="fundus_kanan" id="fundus_kanan1" value="Normal" class="rad1" checked />
                                                            <label for="fundus_kanan1">Normal</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="fundus_kanan" id="fundus_kanan2" value="Kelainan" class="rad1" />
                                                            <label for="fundus_kanan2">Kelainan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Media Refraksi</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="media_refraksi_kiri" id="media_refraksi_kiri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="media_refraksi_kanan" id="media_refraksi_kanan" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Papil Optik</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="papil_optik_kiri" id="papil_optik_kiri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="papil_optik_kanan" id="papil_optik_kanan" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Makula Lutea</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="makula_lutea_kiri" id="makula_lutea_kiri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="makula_lutea_kanan" id="makula_lutea_kanan" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Retina</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="retina_kiri" id="retina_kiri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="retina_kanan" id="retina_kanan" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>



                                        <tr>
                                            <td>Tekanan Bola Mata</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="tekanan_bola_mata_kiri" id="tekanan_bola_mata_kiri1" value="Normal" class="rad1" checked />
                                                            <label for="tekanan_bola_mata_kiri1">Normal</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="tekanan_bola_mata_kiri" id="tekanan_bola_mata_kiri2" value="Kelainan" class="rad1" />
                                                            <label for="tekanan_bola_mata_kiri2">Kelainan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="tekanan_bola_mata_kanan" id="tekanan_bola_mata_kanan1" value="Normal" class="rad1" checked />
                                                            <label for="tekanan_bola_mata_kanan1">Normal</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="tekanan_bola_mata_kanan" id="tekanan_bola_mata_kanan2" value="Kelainan" class="rad1" />
                                                            <label for="tekanan_bola_mata_kanan2">Kelainan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ishihara</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="ishihara_kiri" id="ishihara_kiri1" value="Normal" class="rad1" checked />
                                                            <label for="ishihara_kiri1">Normal</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="ishihara_kiri" id="ishihara_kiri2" value="Kelainan" class="rad1" />
                                                            <label for="ishihara_kiri2">Kelainan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="ishihara_kanan" id="ishihara_kanan1" value="Normal" class="rad1" checked />
                                                            <label for="ishihara_kanan1">Normal</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="ishihara_kanan" id="ishihara_kanan2" value="Kelainan" class="rad1" />
                                                            <label for="ishihara_kanan2">Kelainan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Amsler Grid</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="amsler_grid_kiri" id="amsler_grid_kiri1" value="Normal" class="rad1" checked />
                                                            <label for="amsler_grid_kiri1">Normal</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="amsler_grid_kiri" id="amsler_grid_kiri2" value="Kelainan" class="rad1" />
                                                            <label for="amsler_grid_kiri2">Kelainan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="amsler_grid_kanan" id="amsler_grid_kanan1" value="Normal" class="rad1" checked />
                                                            <label for="amsler_grid_kanan1">Normal</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="amsler_grid_kanan" id="amsler_grid_kanan2" value="Kelainan" class="rad1" />
                                                            <label for="amsler_grid_kanan2">Kelainan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Balik Mata Depan</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="balik_mata_depan_kiri" id="balik_mata_depan_kiri1" value="Normal" class="rad1" checked />
                                                            <label for="balik_mata_depan_kiri1">Normal</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="balik_mata_depan_kiri" id="balik_mata_depan_kiri2" value="Kelainan" class="rad1" />
                                                            <label for="balik_mata_depan_kiri2">Kelainan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="balik_mata_depan_kanan" id="balik_mata_depan_kanan1" value="Normal" class="rad1" checked />
                                                            <label for="balik_mata_depan_kanan1">Normal</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="balik_mata_depan_kanan" id="balik_mata_depan_kanan2" value="Kelainan" class="rad1" />
                                                            <label for="balik_mata_depan_kanan2">Kelainan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <br>
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
                                                    <div class="col-md-9 has-success kesimpulan2 collapse">
                                                        <textarea class="form-control" rows="4" cols="50" placeholder="-" id="kesimpulan"></textarea>
                                                    </div>
                                                    <span class="help-block"></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Saran</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Saran</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" rows="4" cols="50" placeholder="-" id="saran"></textarea>

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
<style>
    tr {
        color: black;
    }

    td {
        color: black;
    }

    th {
        color: black;
    }
</style>
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
        var kesimpulan = $("input[name='kesimpulan']:checked").val();
        kesimpulan = (kesimpulan === 'Kelainan') ? $("#kesimpulan").val() : kesimpulan;
        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Menyimpan Data  ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/simpan_mata",
                    method: "POST",
                    dataType: "json",
                    data: {
                        id_mcu: $('#id_mcu').val(),
                        dokter_periksa: $('#dokter_periksa').val(),
                        kelainan: $('input[name="kelainan"]:checked').val(),
                        tajam_kiri: $('#tajam_kiri').val(),
                        tajam_kanan: $('#tajam_kanan').val(),
                        binokularitas_kiri: $('#binokularitas_kiri').val(),
                        binokularitas_kanan: $('#binokularitas_kanan').val(),
                        kedalaman_kiri: $('#kedalaman_kiri').val(),
                        kedalaman_kanan: $('#kedalaman_kanan').val(),
                        lapang_pandang_kiri: $('#lapang_pandang_kiri').val(),
                        lapang_pandang_kanan: $('#lapang_pandang_kanan').val(),
                        diferensiasi_warna_kiri: $('#diferensiasi_warna_kiri').val(),
                        diferensiasi_warna_kanan: $('#diferensiasi_warna_kanan').val(),
                        stereognosis_kiri: $('#stereognosis_kiri').val(),
                        stereognosis_kanan: $('#stereognosis_kanan').val(),
                        fundus_kiri: $('input[name="fundus_kiri"]:checked').val(),
                        fundus_kanan: $('input[name="fundus_kanan"]:checked').val(),
                        media_refraksi_kiri: $('#media_refraksi_kiri').val(),
                        media_refraksi_kanan: $('#media_refraksi_kanan').val(),
                        papil_optik_kiri: $('#papil_optik_kiri').val(),
                        papil_optik_kanan: $('#papil_optik_kanan').val(),
                        makula_lutea_kiri: $('#makula_lutea_kiri').val(),
                        makula_lutea_kanan: $('#makula_lutea_kanan').val(),
                        retina_kiri: $('#retina_kiri').val(),
                        retina_kanan: $('#retina_kanan').val(),
                        tekanan_bola_mata_kiri: $('input[name="tekanan_bola_mata_kiri"]:checked').val(),
                        tekanan_bola_mata_kanan: $('input[name="tekanan_bola_mata_kanan"]:checked').val(),
                        ishihara_kiri: $('input[name="ishihara_kiri"]:checked').val(),
                        ishihara_kanan: $('input[name="ishihara_kanan"]:checked').val(),
                        amsler_grid_kiri: $('input[name="amsler_grid_kiri"]:checked').val(),
                        amsler_grid_kanan: $('input[name="amsler_grid_kanan"]:checked').val(),
                        balik_mata_depan_kiri: $('input[name="balik_mata_depan_kiri"]:checked').val(),
                        balik_mata_depan_kanan: $('input[name="balik_mata_depan_kanan"]:checked').val(),
                        kesimpulan: kesimpulan,
                        saran: $('#saran').val()

                    },
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
                    }

                });
            });
        });
        return false;
    }

    $(document).ready(function() {
        id_pelayanan = $('#id_mcu').val();
        $.ajax({
            url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/get_data_pemeriksaan",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
                table: 'mata_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {

                    $('#dokter_periksa').val(data.dokter_periksa);
                    $('input[name="kelainan"][value="' + data.kelainan + '"]').prop("checked", true);
                    $('#tajam_kiri').val(data.tajam_kiri);
                    $('#tajam_kanan').val(data.tajam_kanan);
                    $('#binokularitas_kiri').val(data.binokularitas_kiri);
                    $('#binokularitas_kanan').val(data.binokularitas_kanan);
                    $('#kedalaman_kiri').val(data.kedalaman_kiri);
                    $('#kedalaman_kanan').val(data.kedalaman_kanan);
                    $('#lapang_pandang_kiri').val(data.lapang_pandang_kiri);
                    $('#lapang_pandang_kanan').val(data.lapang_pandang_kanan);
                    $('#diferensiasi_warna_kiri').val(data.diferensiasi_warna_kiri);
                    $('#diferensiasi_warna_kanan').val(data.diferensiasi_warna_kanan);
                    $('#stereognosis_kiri').val(data.stereognosis_kiri);
                    $('#stereognosis_kanan').val(data.stereognosis_kanan);
                    $('#media_refraksi_kiri').val(data.media_refraksi_kiri);
                    $('#media_refraksi_kanan').val(data.media_refraksi_kanan);
                    $('#papil_optik_kiri').val(data.papil_optik_kiri);
                    $('#papil_optik_kanan').val(data.papil_optik_kanan);
                    $('#makula_lutea_kiri').val(data.makula_lutea_kiri);
                    $('#makula_lutea_kanan').val(data.makula_lutea_kanan);
                    $('#retina_kiri').val(data.retina_kiri);
                    $('#retina_kanan').val(data.retina_kanan);

                    // Mengatur radio button
                    $('input[name="fundus_kiri"][value="' + data.fundus_kiri + '"]').prop("checked", true);
                    $('input[name="fundus_kanan"][value="' + data.fundus_kanan + '"]').prop("checked", true);
                    $('input[name="tekanan_bola_mata_kiri"][value="' + data.tekanan_bola_mata_kiri + '"]').prop("checked", true);
                    $('input[name="tekanan_bola_mata_kanan"][value="' + data.tekanan_bola_mata_kanan + '"]').prop("checked", true);
                    $('input[name="ishihara_kiri"][value="' + data.ishihara_kiri + '"]').prop("checked", true);
                    $('input[name="ishihara_kanan"][value="' + data.ishihara_kanan + '"]').prop("checked", true);
                    $('input[name="amsler_grid_kiri"][value="' + data.amsler_grid_kiri + '"]').prop("checked", true);
                    $('input[name="amsler_grid_kanan"][value="' + data.amsler_grid_kanan + '"]').prop("checked", true);
                    $('input[name="balik_mata_depan_kiri"][value="' + data.balik_mata_depan_kiri + '"]').prop("checked", true);
                    $('input[name="balik_mata_depan_kanan"][value="' + data.balik_mata_depan_kanan + '"]').prop("checked", true);

                    if (data.kesimpulan === 'Normal') {
                        $('input[name="kesimpulan"][value="' + data.kesimpulan + '"]').prop("checked", true);
                    } else {
                        $('input[name="kesimpulan"][value="Kelainan"]').prop("checked", true).change();
                        $('#kesimpulan').val(data.kesimpulan);
                    }

                    // Kesimpulan Umum Textarea
                    $('#saran').val(data.saran);
                }
            }

        });
    });
</script>