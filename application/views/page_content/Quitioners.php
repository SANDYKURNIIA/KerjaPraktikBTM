<<<<<<< HEAD
<div class="page_content">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h1 class="panel-title txt-dark"><strong>Form Quitioners</strong></h1>
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


                                </div>
                                <span class="help-block"></span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Menu -->
<div class="task_quitioners">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h1 class="panel-title txt-dark"><strong>Task Quitioners</strong></h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="form-wrap">

                                <span class="help-block"></span>
                                <div class="form-body">
                                    <ul role="tablist" class="nav nav-pills" id="myTabs_9">
                                        <li role="presentation" class="active"><a aria-expanded="true" data-toggle="tab" role="tab" href="#pemeriksaan_data_pribadi">Pemeriksaan Data Pribadi</a></li>
                                        <li role="presentation" class="active"><a data-toggle="tab" role="tab" href="#riw_kes_keluarga">Riwayat Kesehatan Keluarga</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#penyakit_diderita">Penyakit Yang Sedang / Pernah Diderita</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#gejala_dialami">Gejala Yang Dialami Sekarang</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#hambatan_fisik">SRQ-29 (Suspect)</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#aktifitas_fisik">Aktivitas Fisik</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#kebiasaan_makan">Kebiasaan Makan</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#perasaan_pribadi">Perasaan Pribadi</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#hoby_kebiasaan">Hobi Dan Kebiasaan</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#diagnosis_stres">Survey Diagnosis Stres</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#riw_pekerjaan_dulu">Riwayat Pekerjaan Terdahulu</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#riw_pekerjaan_kini">Riwayat Pekerjaan Terkini</a></li>
                                        <!-- <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#srq">SRQ</a></li> -->

                                    </ul>

                                </div>
                                <div class="row">


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
    $(document).ready(function() {
        function toggleSection(sectionId) {
            $.ajax({
                url: '<?php echo base_url("Quitioners/form_pemeriksaan/"); ?>' + sectionId,
                type: 'GET',
                dataType: "html",
                success: function(response) {
                    $('#pemeriksaan-container').html(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error loading pemeriksaan:", error);
                }
            });
        }

        // Tambahkan event listener ke setiap tab
        $('a[data-toggle="tab"]').on('click', function(e) {
            e.preventDefault(); // Mencegah perilaku default tab
            $(this).tab('show'); // Menampilkan tab yang diklik

            // Dapatkan sectionId dari href tab
            var sectionId = $(this).attr('href').replace('#', '');

            // Panggil fungsi toggleSection dengan sectionId
            toggleSection(sectionId);
        });

        //panggil active tab pertama kali saat halaman di load.
        var firstSectionId = $('li.active a').attr('href').replace('#', '');
        toggleSection(firstSectionId);

    });

   
</script>
=======
<div class="page_content">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h1 class="panel-title txt-dark"><strong>Form Quitioners</strong></h1>
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


                                </div>
                                <span class="help-block"></span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Menu -->
<div class="task_quitioners">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h1 class="panel-title txt-dark"><strong>Task Quitioners</strong></h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="form-wrap">

                                <span class="help-block"></span>
                                <div class="form-body">
                                    <ul role="tablist" class="nav nav-pills" id="myTabs_9">
                                        <li role="presentation" class="active"><a aria-expanded="true" data-toggle="tab" role="tab" href="#pemeriksaan_data_pribadi">Pemeriksaan Data Pribadi</a></li>
                                        <li role="presentation" class="active"><a data-toggle="tab" role="tab" href="#riw_kes_keluarga">Riwayat Kesehatan Keluarga</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#penyakit_diderita">Penyakit Yang Sedang / Pernah Diderita</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#gejala_dialami">Gejala Yang Dialami Sekarang</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#hambatan_fisik">SRQ-29 (Suspect)</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#aktifitas_fisik">Aktivitas Fisik</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#kebiasaan_makan">Kebiasaan Makan</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#perasaan_pribadi">Perasaan Pribadi</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#hoby_kebiasaan">Hobi Dan Kebiasaan</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#diagnosis_stres">Survey Diagnosis Stres</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#riw_pekerjaan_dulu">Riwayat Pekerjaan Terdahulu</a></li>
                                        <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#riw_pekerjaan_kini">Riwayat Pekerjaan Terkini</a></li>
                                        <!-- <li role="presentation" class=""><a data-toggle="tab" role="tab" href="#srq">SRQ</a></li> -->

                                    </ul>

                                </div>
                                <div class="row">


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
    $(document).ready(function() {
        function toggleSection(sectionId) {
            $.ajax({
                url: '<?php echo base_url("Quitioners/form_pemeriksaan/"); ?>' + sectionId,
                type: 'GET',
                dataType: "html",
                success: function(response) {
                    $('#pemeriksaan-container').html(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error loading pemeriksaan:", error);
                }
            });
        }

        // Tambahkan event listener ke setiap tab
        $('a[data-toggle="tab"]').on('click', function(e) {
            e.preventDefault(); // Mencegah perilaku default tab
            $(this).tab('show'); // Menampilkan tab yang diklik

            // Dapatkan sectionId dari href tab
            var sectionId = $(this).attr('href').replace('#', '');

            // Panggil fungsi toggleSection dengan sectionId
            toggleSection(sectionId);
        });

        //panggil active tab pertama kali saat halaman di load.
        var firstSectionId = $('li.active a').attr('href').replace('#', '');
        toggleSection(firstSectionId);

    });

   
</script>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
