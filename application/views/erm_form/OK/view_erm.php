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
                                <h4 class="txt-light block  mb-5 capitalize-font"><?php echo $nama ?></h4>
                                <h6 class="txt-light block uppercase-font pb-40"><?php echo $nama_dokter ?></h6>
                            </div>
                            <div class="profile-image-overlay"></div>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                        <input type="hidden" class="form-control" value="<?= $id_histori ?>" id="inHis">
                        <input type="hidden" class="form-control" value="<?= $no_rm ?>" id="noRM">
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="panel card-view">
            <div class="panel-wrapper">
                <div class="panel-body">
                    <button class="btn btn-success col-md-12" style="margin: 3px">Rawat Inap</button>
                    <button class="btn btn-success col-md-12" style="margin: 3px">Pindah Poli</button>
                </div>
            </div>
        </div> -->
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

                <div class="panel panel-success card-view">

                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row lds-dual-ring overlay" id="loader">
                                <div class="col-lg-12">
                                    <div class="button-list mt-25">
                                        <div id="penunjang" style="margin-bottom: 50px; display: block;">

                                            <?php
                                            $id_pel = urlencode(base64_encode($id_pelayanan));
                                            $id_his = urlencode(base64_encode($id_histori)); ?>
                                            <h5 class="txt-dark capitalize-font"><i class="fa fa-medkit mr-10"></i>FORM</h5>
                                            <hr width="100%">

                                            <?php echo
                                            "<button class='btn btn-success col-md-5'  onclick='tampilTindakanFarmasi(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Tindakan
                                            </button>";
                                            ?>
                                            <?php echo
                                            "<button class='btn btn-success col-md-5'  onclick='listDuaTindakan(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Dua Tindakan
                                            </button>";
                                            ?>
                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='tampilTindakanDokter(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Dokter
                                        </button>";
                                            ?>
                                            <?php
                                            $staff = $this->session->userdata('data_auth');
                                            if ($staff->ruangan == 'Cendrawasih') {
                                                echo
                                                "<button class='btn btn-success col-md-5' onclick='obat_ruang(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Obat
                                        </button>";
                                            } else {
                                                echo
                                                "<button class='btn btn-success col-md-5' onclick='tampilTindakanObat(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Obat
                                        </button>";
                                            }
                                            ?>

                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='listAlkes(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Alat Kesehatan
                                        </button>";
                                            ?>

                                            <div class="clearfix"></div>

                                        </div>

                                        <!-- <h5 class="txt-dark capitalize-font"><i class="fa fa-file mr-10"></i>ERM</h5>
                                        <hr width="100%">
                                        
                                        <a class="btn btn-success col-md-5 form_laporan" href="<?php echo base_url('Form_laporan/form/') . $id_pelayanan . '/' . $id_histori; ?>">
                                            Form Laporan Operasi
                                        </a>
                                        <a class="btn btn-success col-md-5 operasi_mata" href="<?php echo base_url('Form_laporan/form_mata/') . $id_pelayanan . '/' . $id_histori; ?>">
                                            Form Laporan Operasi Mata
                                        </a> -->
                                    </div>


                                    <!-- <div class="row pull-right">
                                        <button class="btn btn-default btn-anim" onclick="window.location.href='javascript:history.go(-1)';" type="submit" style="margin-right: 40px; margin-top:40px;padding: 10px 24px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></button>
                                         -->
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('erm_form/OK/view_tindakan') ?>
<?php $this->load->view('erm_form/OK/view_dua_tindakan') ?>
<?php $this->load->view('page_content/Form_ok'); ?>
<?php if ($staff->ruangan == 'Cendrawasih') { 
    // print_r($obat_ruang);
    $this->load->view('erm_form/Penunjang/obat_ruangan'); 
    }?>

<style>
    p {
        color: black;
    }
</style>

<!-- <link rel="stylesheet" href="</?= base_url(); ?>assets/dist/css/loading.css"> -->

<script type="text/javascript">
    $(document).ready(function() {
        id_histori = $('#inHis').val();
        $.ajax({
            url: "<?php echo base_url() ?>OK_Pasien/checkData",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_histori
            },
            success: function(data) {
                if (data.form_laporan == "found") {
                    $('.form_laporan').removeClass('btn-success').addClass('btn-danger ');
                }
            }
        });
        return false;
    });


    function erm() {
        no_rm = $('#noRM').val();
        $.ajax({
            url: "<?php echo base_url() ?>Erm_ranap/getErm",
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
                        html +=
                            '<a href = "<?= base_url('Erm_igd/form_riwayat/') ?>' + data.erm[i].id_pelayanan + '/' + data.erm[i].id_history + '" class="list-group-item" >' +
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