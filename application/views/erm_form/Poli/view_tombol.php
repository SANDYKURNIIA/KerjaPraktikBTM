<style>
    * {
        box-sizing: border-box
    }

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    /* Hide the images by default */
    .mySlides {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        opacity: 0
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: black;
        color: white;
        opacity: 1
    }


    @-webkit-keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }
</style>
<div class="row" onload="checkData()">
    <div class="col-lg-3 col-md-12">
        <div class="panel panel-success card-view  pa-0">
            <div class="panel-wrapper collapse in">
                <div class="panel-body  pa-0">
                    <div class="profile-box">
                        <div class="profile-info-wrap text-center">
                            <div class="profile-info pt-40">
                                <!-- <img class="img-circle inline-block mt-40 mb-10" src="<?= base_url() ?>resources/img/userimgs/default_man.png" alt="user"/> -->
                                <h4 class="txt-light block  mb-5 capitalize-font"><?= $nama ?></h4>
                                <h6 class="txt-light block uppercase-font pb-40"><?= $pasien->nama_dokter ?></h6>
                            </div>
                            <div class="profile-image-overlay"></div>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                        <input type="hidden" class="form-control" value="<?= $no_rm ?>" id="noRM">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel card-view">
            <div class="panel-wrapper">
                <div class="panel-body">

                    <h5 class="txt-dark capitalize-font"><i class="fa fa-medkit mr-10"></i>PENUNJANG</h5>
                    <hr width="100%">
                    <?php echo
                    "<button class='btn btn-success col-md-12' style='margin: 3px' onclick='edit_data_tindakan(\"" . $id_pelayanan . "\",\"" . $id_history . "\")'>
                                            Tindakan Poli
                                        </button>";
                    ?>
                    <?php echo
                    "<button class='btn btn-success col-md-12' style='margin: 3px' onclick='edit_radiologi(\"" . $id_pelayanan . "\",\"" . $id_history .  "\")'>
                                            Radiologi
                                        </button>";
                    ?>
                    <?php echo
                    "<button class='btn btn-success col-md-12' style='margin: 3px' onclick='edit_labor(\"" . $id_pelayanan . "\",\"" . $id_history .  "\")'>
                                            Labor
                                        </button>";
                    ?>
                    <?php echo
                    "<button class='btn btn-success col-md-12' style='margin: 3px' onclick='edit_obat(\"" . $id_pelayanan . "\",\"" . $id_history . "\")'>
                                            Obat
                                        </button>";
                    ?>
                    <?php echo
                    "<button class='btn btn-success col-md-12 kasir' style='margin: 3px' id='kasir' onclick='edit_kasir(\"" . $id_pelayanan . "\",\"" . $id_history . "\")'>
                                            Request Kasir
                                        </button>";
                    ?>
                </div>
            </div>
        </div>
        <div class="panel card-view">
            <div class="panel-wrapper">
                <div class="panel-heading">
                    <!-- <div class="pull-left">
                        <h6 class="panel-title txt-dark">RIWAYAT MEDIS</h6>
                    </div> -->
                    <button class="btn btn-success col-md-12" style="margin: 3px" onclick="riwayat()">RIWAYAT MEDIS</button>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body task-panel">

                    <div class="list-group mb-0" id="slide"></div>


                </div>

            </div>
        </div>
        <div class="panel card-view">
            <div class="panel-wrapper">
                <div class="panel-heading">
                    <!-- <div class="pull-left">
                        <h6 class="panel-title txt-dark">RIWAYAT MEDIS</h6>
                    </div> -->
                    <button class="btn btn-success col-md-12" style="margin: 3px" onclick="erm()">RIWAYAT ERM</button>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body task-panel">

                    <div class="list-group mb-0" id="slide1"></div>


                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-12">
        <div class="row">
            <div class="col-lg-12">



                <?php $this->load->view('erm_form/Poli/view_penunjang') ?>
                <style>
                    p {
                        color: black;
                    }
                </style>
                <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/loading.css">

                <script type="text/javascript">
                    function riwayat() {
                        no_rm = $('#noRM').val();
                        $.ajax({
                            url: "<?php echo base_url() ?>Erm_igd/getRiwayat",
                            method: "POST",
                            dataType: 'json',
                            data: {
                                id: no_rm
                            },
                            success: function(data) {
                                var html = '';
                                var i;
                                for (i = 0; i < data.length; i++) {
                                    html +=
                                        '<a href = "javascript:void(0)"class = "list-group-item" >' +
                                        '<strong> ' + data[i].jenis_pelayanan + '</strong> <br>' +
                                        '<span class = "inline-block font-12  mb-5" >' + data[i].tgl_masuk + ' s/d ' + data[i].tgl_keluar + ' </span>' +
                                        '<div class = "clearfix" > </div> ' +
                                        '<p> Diagnosa: ' + data[i].diagnosa + ' </p>' +
                                        '<p> DPJP: ' + data[i].dokter + ' </p> </a>';
                                }
                                $('#slide').html(html)


                            }

                        });
                        return false;

                    }

                    function erm() {
                        no_rm = $('#noRM').val();
                        $.ajax({
                            url: "<?php echo base_url() ?>Erm_poli/getErm",
                            method: "POST",
                            dataType: 'json',
                            data: {
                                id: no_rm
                            },
                            success: function(data) {
                                if (data.status == 'found') {
                                    var html = '';
                                    var i;
                                    for (i = 0; i < data.erm.length; i++) {
                                        var jenis_pelayanan = data.erm[i].jenis_pelayanan;
                                        if (jenis_pelayanan == "POLI PRIORITAS") {
                                            jp = "PRIORITAS";
                                        } else {
                                            jp = "POLI";
                                        }
                                        html +=
                                            '<a href = "<?= base_url('Erm_poli/form_riwayat/') ?>' + data.erm[i].id_pelayanan + '/' + data.erm[i].id_history + '/' + jp + '" class="list-group-item" >' +
                                            '<strong> ERM ' + (i + 1) + '</strong><br>' +
                                            '<span class = "inline-block font-12  mb-5" >' + data.erm[i].tgl_masuk + ' s/d ' + data.erm[i].tgl_keluar + ' </span>' +
                                            '<div class = "clearfix" > </div> ' +
                                            '<p> Diagnosa: ' + data.erm[i].diagnosa + ' </p>' +
                                            '<p> DPJP: ' + data.erm[i].dpjp + ' </p></a>  ';
                                    }
                                    $('#slide1').html(html)
                                } else {
                                    html = '<p> Tidak Ada Data </p>';
                                    $('#slide1').html(html)
                                }


                            }

                        });
                        return false;

                    }
                </script>

                <script type="text/javascript">
                    function simpan() {
                        id_pelayanan = $('#inPel').val();
                        id_history = $('#inHis').val();

                        $.ajax({
                            url: "<?php echo base_url() ?>Erm_poli/simpan_erm",
                            method: "POST",
                            dataType: 'json',
                            data: {
                                id_history: id_history
                            },
                            success: function(data) {
                                if (data.status == "success") {
                                    // window.location.href = "<?php echo base_url('Igd') ?>";

                                    swal({
                                        title: "good job!",
                                        type: "success",
                                        text: "Data Berhasil disimpan",
                                        confirmButtonColor: "#3cb878",
                                    });

                                    $('.super_ranap').attr('disabled', 'disabled');
                                    $('.asses_per_igd').attr('disabled', 'disabled');
                                    $('.asses_dokter_igd').attr('disabled', 'disabled');
                                    $('.observasi').attr('disabled', 'disabled');
                                    $('.sebab_kematian').attr('disabled', 'disabled');
                                    $('.lembar_rujukan').attr('disabled', 'disabled');
                                    $('.penundaan').attr('disabled', 'disabled');
                                    $('.antar').attr('disabled', 'disabled');
                                    $('.intra').attr('disabled', 'disabled');
                                    $('.resume').attr('disabled', 'disabled');
                                    $('.penunjang').attr('disabled', 'disabled');
                                    $('.per_pen_rujuk').attr('disabled', 'disabled');
                                    $('.pengkhu').attr('disabled', 'disabled');
                                    $('.pentindok').attr('disabled', 'disabled');
                                    $('.pertindok').attr('disabled', 'disabled');
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