<div class="page_content">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h2 class="panel-title txt-dark"><strong>Gigi Geligi</strong></h2>
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

                                <br>
                                <br>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Riwayat Penyakit</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Penyakit Jantung</label>
                                            <div class="col-md-9">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="penyakit_jantung" id="penyakit_jantung_ada">
                                                            <label class="control-label" for="penyakit_jantung_ada">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" checked name="penyakit_jantung" id="penyakit_jantung_tidak">
                                                            <label class="control-label" for="penyakit_jantung_tidak">Tidak</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Hipertensi</label>
                                            <div class="col-md-9">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="hipertensi" id="hipertensi_ada">
                                                            <label class="control-label" for="hipertensi_ada">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" checked name="hipertensi" id="hipertensi_tidak">
                                                            <label class="control-label" for="hipertensi_tidak">Tidak</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Diabetes Militus</label>
                                            <div class="col-md-9">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="diabetes_militus" id="diabetes_militus_ada">
                                                            <label class="control-label" for="diabetes_militus_ada">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" checked name="diabetes_militus" id="diabetes_militus_tidak">
                                                            <label class="control-label" for="diabetes_militus_tidak">Tidak</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Alergi</label>
                                            <div class="col-md-9">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="alergi" id="alergi_ada">
                                                            <label class="control-label" for="alergi_ada">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" checked name="alergi" id="alergi_tidak">
                                                            <label class="control-label" for="alergi_tidak">Tidak</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Asma</label>
                                            <div class="col-md-9">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="asma" id="asma_ada">
                                                            <label class="control-label" for="asma_ada">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" checked name="asma" id="asma_tidak">
                                                            <label class="control-label" for="asma_tidak">Tidak</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Kelainan Darah</label>
                                            <div class="col-md-9">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="kelainan_darah" id="kelainan_darah_ada">
                                                            <label class="control-label" for="kelainan_darah_ada">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" checked name="kelainan_darah" id="kelainan_darah_tidak">
                                                            <label class="control-label" for="kelainan_darah_tidak">Tidak</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Penyakit Lambung</label>
                                            <div class="col-md-9">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="penyakit_lambung" id="penyakit_lambung_ada">
                                                            <label class="control-label" for="penyakit_lambung_ada">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" checked name="penyakit_lambung" id="penyakit_lambung_tidak">
                                                            <label class="control-label" for="penyakit_lambung_tidak">Tidak</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Psikis</label>
                                            <div class="col-md-9">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="psikis" id="psikis_ada">
                                                            <label class="control-label" for="psikis_ada">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" checked name="psikis" id="psikis_tidak">
                                                            <label class="control-label" for="psikis_tidak">Tidak</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Hepatitis</label>
                                            <div class="col-md-9">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="hepatitis" id="hepatitis_ada">
                                                            <label class="control-label" for="hepatitis_ada">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" checked name="hepatitis" id="hepatitis_tidak">
                                                            <label class="control-label" for="hepatitis_tidak">Tidak</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Lain-lain</label>
                                            <div class="col-md-9">
                                                <div class="radio-list">
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Ada" name="lain_lain" id="lain_lain_ada">
                                                            <label class="control-label" for="lain_lain_ada">Ada</label>
                                                        </span>
                                                    </div>
                                                    <div class="radio-inline pl-0">
                                                        <span class="radio radio-info">
                                                            <input type="radio" value="Tidak" checked name="lain_lain" id="lain_lain_tidak">
                                                            <label class="control-label" for="lain_lain_tidak">Tidak</label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Intra Oral</strong></b></h4>
                                <hr>

                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Lidah</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" rows="4" cols="50" placeholder="-" id="lidah"></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Gingiva</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" rows="4" cols="50" placeholder="-" id="gingiva"></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Mukosa Pipi</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" rows="4" cols="50" placeholder="-" id="mukosa_pipi"></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Pallatum</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" rows="4" cols="50" placeholder="-" id="pallatum"></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Pemeriksaan Odontogram</strong></b></h4>
                                <hr>
                                <div class="odontogram">
                                    <div class="teeth-row">
                                        <div class="tooth" data-tooth="18">18</div>
                                        <div class="tooth" data-tooth="17">17</div>
                                        <div class="tooth" data-tooth="16">16</div>
                                        <div class="tooth" data-tooth="15">15</div>
                                        <div class="tooth" data-tooth="14">14</div>
                                        <div class="tooth" data-tooth="13">13</div>
                                        <div class="tooth" data-tooth="12">12</div>
                                        <div class="tooth" data-tooth="11">11</div>
                                        <div class="tooth" data-tooth="21">21</div>
                                        <div class="tooth" data-tooth="22">22</div>
                                        <div class="tooth" data-tooth="23">23</div>
                                        <div class="tooth" data-tooth="24">24</div>
                                        <div class="tooth" data-tooth="25">25</div>
                                        <div class="tooth" data-tooth="26">26</div>
                                        <div class="tooth" data-tooth="27">27</div>
                                        <div class="tooth" data-tooth="28">28</div>
                                    </div>
                                    <div class="teeth-row">
                                        <!-- <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> -->
                                        <div style="margin-left: 105px;" class="tooth" data-tooth="55">55</div>
                                        <div class="tooth" data-tooth="54">54</div>
                                        <div class="tooth" data-tooth="53">53</div>
                                        <div class="tooth" data-tooth="52">52</div>
                                        <div class="tooth" data-tooth="51">51</div>
                                        <div class="tooth" data-tooth="61">61</div>
                                        <div class="tooth" data-tooth="62">62</div>
                                        <div class="tooth" data-tooth="63">63</div>
                                        <div class="tooth" data-tooth="64">64</div>
                                        <div class="tooth" data-tooth="65">65</div>
                                    </div>
                                    <div class="teeth-row">
                                        <div style="margin-left: 173px;" class="tooth" data-tooth="85">85</div>
                                        <div class="tooth" data-tooth="84">84</div>
                                        <div class="tooth" data-tooth="83">83</div>
                                        <div class="tooth" data-tooth="82">82</div>
                                        <div class="tooth" data-tooth="81">81</div>
                                        <div class="tooth" data-tooth="71">71</div>
                                        <div class="tooth" data-tooth="72">72</div>
                                        <div class="tooth" data-tooth="73">73</div>
                                        <div class="tooth" data-tooth="74">74</div>
                                        <div class="tooth" data-tooth="75">75</div>
                                    </div>
                                    <div class="teeth-row">
                                        <div class="tooth" data-tooth="48">48</div>
                                        <div class="tooth" data-tooth="47">47</div>
                                        <div class="tooth" data-tooth="46">46</div>
                                        <div class="tooth" data-tooth="45">45</div>
                                        <div class="tooth" data-tooth="44">44</div>
                                        <div class="tooth" data-tooth="43">43</div>
                                        <div class="tooth" data-tooth="42">42</div>
                                        <div class="tooth" data-tooth="41">41</div>
                                        <div class="tooth" data-tooth="31">31</div>
                                        <div class="tooth" data-tooth="32">32</div>
                                        <div class="tooth" data-tooth="33">33</div>
                                        <div class="tooth" data-tooth="34">34</div>
                                        <div class="tooth" data-tooth="35">35</div>
                                        <div class="tooth" data-tooth="36">36</div>
                                        <div class="tooth" data-tooth="37">37</div>
                                        <div class="tooth" data-tooth="38">38</div>
                                    </div>
                                </div>

                                <h4 class="panel-title txt-dark mt-20"><b><strong><i class="fa fa-user-md mr-10"></i>Isian Odontogram</strong></b></h4>
                                <hr>
                                <div class="isian_odonto col-md-12">
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
                                                    <div class="col-md-9 has-success kesimpulan2 collapse">
                                                        <textarea class="form-control" rows="4" cols="50" placeholder="-" id="kesimpulan"></textarea>
                                                    </div>
                                                    <span class="help-block"></span>

                                                </div>
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
    .isian_odonto {
        /* display: flex; */
        /* justify-content: space-around; */
        /* padding: 20px; */
        color: black;
    }

    /* 
    .column {
        width: 45%;
    } */
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
        let odontogramData = [];

        $('.tooth.selected').each(function() {
            let toothNumber = $(this).data('tooth');

            odontogramData.push({
                    nomor: toothNumber,
                    pilihan: $.trim($(`#pilihan_${toothNumber}`).children("option:selected").text()),
                    keterangan: $(`#input_${toothNumber}`).val(),
                },

            );
        });
        console.log(odontogramData);
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
                    url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/simpan_gigi_geligi",
                    method: "POST",
                    dataType: "json",
                    data: {
                        id_mcu: $('#id_mcu').val(),
                        dokter_periksa: $('#dokter_periksa').val(),
                        penyakit_jantung: $('input[name="penyakit_jantung"]:checked').val(),
                        hipertensi: $('input[name="hipertensi"]:checked').val(),
                        diabetes_militus: $('input[name="diabetes_militus"]:checked').val(),
                        alergi: $('input[name="alergi"]:checked').val(),
                        asma: $('input[name="asma"]:checked').val(),
                        kelainan_darah: $('input[name="kelainan_darah"]:checked').val(),
                        penyakit_lambung: $('input[name="penyakit_lambung"]:checked').val(),
                        psikis: $('input[name="psikis"]:checked').val(),
                        hepatitis: $('input[name="hepatitis"]:checked').val(),
                        lain_lain: $('input[name="lain_lain"]:checked').val(),
                        lidah: $('#lidah').val(),
                        gingiva: $('#gingiva').val(),
                        mukosa_pipi: $('#mukosa_pipi').val(),
                        pallatum: $('#pallatum').val(),
                        kesimpulan: kesimpulan,
                        odontogramData: odontogramData,

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
                table: 'gigi_mcu',
            },
            success: function(data) {
                if (data.status_dt == 'found') {

                    $('#dokter_periksa').val(data.dokter_periksa);
                    $('input[name="penyakit_jantung"][value="' + data.penyakit_jantung + '"]').prop("checked", true);
                    $('input[name="hipertensi"][value="' + data.hipertensi + '"]').prop("checked", true);
                    $('input[name="diabetes_militus"][value="' + data.diabetes_militus + '"]').prop("checked", true);
                    $('input[name="alergi"][value="' + data.alergi + '"]').prop("checked", true);
                    $('input[name="asma"][value="' + data.asma + '"]').prop("checked", true);
                    $('input[name="kelainan_darah"][value="' + data.kelainan_darah + '"]').prop("checked", true);
                    $('input[name="penyakit_lambung"][value="' + data.penyakit_lambung + '"]').prop("checked", true);
                    $('input[name="psikis"][value="' + data.psikis + '"]').prop("checked", true);
                    $('input[name="hepatitis"][value="' + data.hepatitis + '"]').prop("checked", true);
                    $('input[name="lain_lain"][value="' + data.lain_lain + '"]').prop("checked", true);

                    // Mengatur input teks
                    $('#lidah').val(data.lidah);
                    $('#gingiva').val(data.gingiva);
                    $('#mukosa_pipi').val(data.mukosa_pipi);
                    $('#pallatum').val(data.pallatum);
                    if (data.kesimpulan === 'Normal') {
                        $('input[name="kesimpulan"][value="' + data.kesimpulan + '"]').prop("checked", true);
                    } else {
                        $('input[name="kesimpulan"][value="Kelainan"]').prop("checked", true).change();
                        $('#kesimpulan').val(data.kesimpulan);
                    }
                    var odontogramString = data.odontogram;

                    // Mengambil nilai string JSON dari objek
                    var odontogramValue = JSON.parse(odontogramString);
                    console.log(odontogramValue);
                    odontogramValue.forEach(function(data) {
                        var toothElement = document.querySelector(`.tooth[data-tooth="${data.nomor}"]`);
                        if (toothElement) {
                            toothElement.classList.add("selected");
                        }

                        let toothNumber = data.nomor;
                        let isianOdonto = document.querySelector('.isian_odonto');
                        let rowOdonto = isianOdonto.querySelector('#row_' + toothNumber);
                        if (!rowOdonto) {
                            rowOdonto = document.createElement('div');
                            rowOdonto.className = 'row_odonto col-md-6 form-group';
                            rowOdonto.id = 'row_' + toothNumber;

                            let label = document.createElement('label');
                            label.className = 'control-label col-md-1';
                            label.textContent = toothNumber;

                            divselect = document.createElement('div');
                            divselect.className = 'has-success col-md-5';

                            let select = document.createElement('select');
                            select.id = 'pilihan_' + toothNumber;
                            select.className = 'form-control filled-input select2';

                            for (const key in opsiData) {
                                let option = document.createElement('option');
                                option.value = key;
                                option.textContent = opsiData[key];
                                select.appendChild(option);
                            }
                            divinput = document.createElement('div');
                            divinput.className = 'has-success col-md-6';
                            let input = document.createElement('input');
                            input.className = 'form-control';
                            input.type = 'text';
                            input.id = 'input_' + toothNumber;

                            rowOdonto.appendChild(label);
                            rowOdonto.appendChild(divselect)
                            rowOdonto.appendChild(divinput)
                            divselect.appendChild(select);
                            divinput.appendChild(input);

                            isianOdonto.appendChild(rowOdonto)

                        }
                        var str = data.pilihan;
                        var parts = str.split(" = "); // Memisahkan string berdasarkan " = "
                        var kode = parts[0];
                        $(`#pilihan_${toothNumber}`).val(kode).change();
                        $(`#input_${toothNumber}`).val(data.keterangan);
                    });
                }
            }

        });
    });
</script>

<style>
    .odontogram {
        display: inline-block;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .teeth-row {
        display: flex;
    }

    .tooth {
        width: 30px;
        height: 50px;
        border: 1px solid #000;
        margin: 2px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 12px;
        cursor: pointer;
        color: black;
    }

    .tooth.selected {
        background-color: lightblue;
    }

    /* .row_odonto select,
    .row_odonto input[type="text"] {
  
        padding: 5px;
    } */
</style>
<script>
    var opsiData = {
        "-": "",
        "AB": "AB = Anomali Bentuk",
        "BL": "BL = Brigde Logam",
        "BNL": "BNL = Bridge Non Logam",
        "CNL": "CNL = Crown Non Logam",
        "GH": "GH = Gigi Hilang",
        "GTSL": "GTSL = Gts Lepasan",
        "LL": "LL = Lain Lain",
        "MA": "MA = Mesio Angular",
        "ML": "ML = Mahkota Logam",
        "N": "N = Normal",
        "NA": "NA = Normal", // Duplikat "Normal"
        "NV": "NV = Non Vital",
        "PE": "PE = Erupsi Sebagian",
        "SA": "SA = Sisa Akar",
        "TL": "TL = Tumpatan Logam",
        "TNL": "TNL = Tumpatan Non Logam",
        "TS": "TS = Caries / Ts",
        "UE": "UE = Tidak/belum Erupsi"
    };
    const teeth = document.querySelectorAll('.tooth');

    teeth.forEach(tooth => {
        tooth.addEventListener('click', () => {
            tooth.classList.toggle('selected');
            let toothNumber = tooth.dataset.tooth;

            let isianOdonto = document.querySelector('.isian_odonto');

            isianOdonto.querySelectorAll('.row_odonto').forEach(row => {
                let rowToothNumber = row.id.split('_')[1]; // Ambil nomor gigi dari ID row_odonto
                let relatedTooth = document.querySelector(`.tooth[data-tooth="${rowToothNumber}"]`);

                if (relatedTooth && !relatedTooth.classList.contains('selected') && relatedTooth.style.backgroundColor != 'lightblue') {
                    row.style.display = 'none';
                } else {
                    row.style.display = 'block';
                }
            });

            let rowOdonto = isianOdonto.querySelector('#row_' + toothNumber);
            if (!rowOdonto) {
                rowOdonto = document.createElement('div');
                rowOdonto.className = 'row_odonto col-md-6 form-group';
                rowOdonto.id = 'row_' + toothNumber;

                let label = document.createElement('label');
                label.className = 'control-label col-md-1';
                label.textContent = toothNumber;

                divselect = document.createElement('div');
                divselect.className = 'has-success col-md-5';

                let select = document.createElement('select');
                select.id = 'pilihan_' + toothNumber;
                select.className = 'form-control filled-input select2';

                for (const key in opsiData) {
                    let option = document.createElement('option');
                    option.value = key;
                    option.textContent = opsiData[key];
                    select.appendChild(option);
                }
                divinput = document.createElement('div');
                divinput.className = 'has-success col-md-6';
                let input = document.createElement('input');
                input.className = 'form-control';
                input.type = 'text';
                input.id = 'input_' + toothNumber;

                rowOdonto.appendChild(label);
                rowOdonto.appendChild(divselect)
                rowOdonto.appendChild(divinput)
                divselect.appendChild(select);
                divinput.appendChild(input);

                isianOdonto.appendChild(rowOdonto)

            }

        });
    });
</script>