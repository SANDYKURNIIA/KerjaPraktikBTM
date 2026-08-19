<div class="page_content">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h1 class="panel-title txt-dark"><strong>Form Tindakan Pemeriksaan</strong></h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="form-wrap">

                                <span class="help-block"></span>
                                <div class="form-body mt-10">
                                    <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>BIODATA PASIEN
                                    </h6>
                                    
                                    <hr width="95%">

                                </div>
                                <div class="row">


                                    <input type="hidden" id="id_mcu_form" name="id_mcu" value="<?php echo $data_mcu['id_mcu']; ?>" />

                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA</label>
                                            <label class="control-label col-md-1">:</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="innama" name="innama" disabled="" value="<?php echo $data_mcu['nama_pasien'] ?>">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">UMUR</label>
                                            <label class="control-label col-md-1">:</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="inumur" name="inumur" disabled="" value="<?php
                                                                                                                                        setlocale(LC_ALL, 'id_ID');

                                                                                                                                        date_default_timezone_set('Asia/Jakarta');
                                                                                                                                        $time = strtotime($data_mcu['tgl_lahir']);
                                                                                                                                        $date = strftime(" %d %B %Y ", $time);
                                                                                                                                        echo getAge($date) ?>">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">PEKERJAAN</label>
                                            <label class="control-label col-md-1">:</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="inpekerjaan" name="i0 npekerjaan" disabled="" value="<?php echo $data_mcu['occupation'] ?>">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DOKTER PEMERIKSA</label>
                                            <label class="control-label col-md-1">:</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="dokter_periksa" placeholder="Cari...">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">FORM PERIKSA</label>
                                            <label class="control-label col-md-1">:</label>
                                            <div class="col-md-6 has-success">
                                                <select class="form-control filled-input select2" name="inJenisPeriksa" style="border: 1px solid lightgreen;" tabindex="1" id="inJenisPeriksa">
                                                    <option value="-">-</option>
                                                    <option value="keadaan_umum">KEADAAN UMUM</option>
                                                    <option value="mata">MATA</option>
                                                    <option value="tht">THT</option>
                                                    <option value="leher">LEHER</option>
                                                    <option value="dada">DADA</option>
                                                    <option value="form_paru">PEMERIKSAAN PARU-PARU</option>
                                                    <option value="rongga_perut">RONGGA PERUT</option>
                                                    <option value="urogenital">UROGENITAL</option>
                                                    <option value="anggota_gerak">ANGGOTA GERAK</option>
                                                    <option value="form_jantung">PEMERIKSAAN PENYAKIT JANTUNG</option>
                                                    <option value="form_neurologi">PEMERIKSAAN NEUROLOGI</option>
                                                    <!-- <option value="penyakit_dalam">PEMERIKSAAN PENYAKIT DALAM</option>
                                                    <option value="form_obgyne">PEMERIKSAAN KANDUNGAN</option>
                                                    <option value="form_ekg">PEMERIKSAAN EKG</option>
                                                    <option value="spesialis_bedah">PEMERIKSAAN DOKTER SPESIALIS BEDAH</option> 
                                                    <option value="form_spirometri">PEMERIKSAAN SPIROMETRI</option>
                                                    <option value="form_gigi">PEMERIKSAAN GIGI</option>
                                                    <option value="form_rehab">PEMERIKSAAN REHABILITASI</option> -->

                                                </select><br>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <span class="help-block"></span>

                            </div>
                        </div>
                        <div id="pemeriksaan-container">
                        </div>
                    </div>
                </div>
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
<script>
    $('#inJenisPeriksa').change(function() {
        $('#pemeriksaan-container').empty();
        b = $('#inJenisPeriksa').val();
        $.ajax({
            url: '<?php echo base_url("Surat_mcu/form_pemeriksaan/"); ?>' + b, // Buat URL yang benar.
            type: 'GET',
            dataType: "html",
            success: function(response) {
                // Tempatkan konten yang dimuat ke dalam elemen yang sesuai.
                $('#pemeriksaan-container').html(response); // Pastikan ada elemen dengan id 'pemeriksaan-container'
            },
            error: function(xhr, status, error) {
                console.error("Error loading pemeriksaan:", error);
            }
        });


    });
</script>

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
    });
</script>