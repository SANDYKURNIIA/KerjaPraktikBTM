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
        <div class="panel card-view">
            <div class="panel-wrapper">
                <div class="panel-body">
                    <button class="btn btn-success col-md-12" style="margin: 3px">Rawat Inap</button>
                    <button class="btn btn-success col-md-12" style="margin: 3px">Pindah Poli</button>
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
                <div class="panel panel-success card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-light">Print out IGD form</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row hide lds-dual-ring overlay" id="loader">
                                <div class="col-lg-12">
                                    <div class="button-list mt-25">
                                        <div id="penunjang" style="margin-bottom: 50px; display: none;">

                                            <?php
                                            $id_pel = urlencode(base64_encode($id_pelayanan));
                                            $id_his = urlencode(base64_encode($id_histori)); ?>
                                            <h5 class="txt-dark capitalize-font"><i class="fa fa-medkit mr-10"></i>PENUNJANG</h5>
                                            <hr width="100%">
                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='edit_data_igd(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Tindakan IGD
                                            </button>";
                                            ?>
                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='edit_radiologi(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Radiologi
                                            </button>";
                                            ?>
                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='edit_labor(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Labor
                                            </button>";
                                            ?>
                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='edit_obat(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Obat
                                            </button>";
                                            ?>
                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='obat_ruang(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Obat Ruang
                                            </button>";
                                            ?>
                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='edit_transportasi(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Transportasi & Jenazah
                                            </button>";
                                            ?>
                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='edit_kia(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Tindakan KIA
                                            </button>";
                                            ?>
                                            <div class="clearfix"></div>

                                        </div>

                                        <h5 class="txt-dark capitalize-font"><i class="fa fa-file mr-10"></i>ERM</h5>
                                        <hr width="100%">
                                        <a class="btn btn-success col-md-5 asses_per_igd" href="<?php echo base_url('Erm_ases_per_igd/form/') . $id_pelayanan . '/' . $id_histori; ?>">
                                            Assesmen Perawat/Bidan IGD
                                        </a>

                                        <a class="btn btn-success col-md-5 asses_dokter_igd" href="<?php echo base_url('erm_ases_dok_igd/form/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Assesmen Dokter IGD
                                        </a>
                                        <a class="btn btn-success col-md-5 asses_triase_ugd" href="<?php echo base_url('Erm_ases_triase_ugd/form/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Assesmen Triase UGD
                                        </a>

                                        <a class="btn btn-success col-md-5 resume" href="<?= base_url('erm_igd/input_resume_medis_raj/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Resume Medis Rajal
                                        </a>

                                        <a class="btn btn-success col-md-5 penunjang" href="<?= base_url('Erm_penunjang_diagnostik/form/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Hasil Baca Penunjang Diagnostik
                                        </a>

                                        <a class="btn btn-success col-md-5 aps" href="<?= base_url('Erm_Aps/form/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Upload APS
                                        </a>

                                        <a class="btn btn-success col-md-5 fkronologis" href="<?= base_url('Erm_fKronologis/form/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Upload Form Kronologis
                                        </a>

                                        <a class="btn btn-success col-md-5 ptindakan" href="<?= base_url('Erm_pTindakan/form/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Upload Penolakan Tindakan
                                        </a>

                                        <a class="btn btn-success col-md-5 skematian" href="<?= base_url('Erm_sKematian/form/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Upload Surat Kematian
                                        </a>

                                        <a class="btn btn-success col-md-5 observasi" href="<?= base_url('Erm_observasi_transfer/form/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Form Observasi Transfer antar RS
                                        </a>

                                        <a class="btn btn-success col-md-5 per_pen_rujuk" href="<?= base_url('Erm_per_pen_rujukan/form/') . $id_pelayanan . '/' . $id_histori; ?>">
                                            Form Persetujuan Penolakan Rujukan
                                        </a>

                                        <a class="btn btn-success col-md-5 sebab_kematian" href="<?= base_url('Erm_sebab_kematian/form/') . $id_pelayanan . '/' . $id_histori; ?>">
                                            Form Sebab Kematian
                                        </a>

                                        <a class="btn btn-success col-md-5 lembar_rujukan" href="<?= base_url('Erm_igd_lembar_rujukan/form/') .  $id_pelayanan . '/' . $id_histori ?>">
                                            Lembar Rujukan Antar DPJP
                                        </a>

                                        <a class="btn btn-success col-md-5 pengkhu" href="<?= base_url('Erm_igd_peng_khu_upmar_2017/form/') .   $id_pelayanan . '/' . $id_histori; ?>">
                                            Pengawasan Khusus Update Maret 2017
                                        </a>

                                        <a class="btn btn-success col-md-5 pentindok" href="<?= base_url('Erm_penolakan_tindakan_kedokteran/form/') .   $id_pelayanan . '/' . $id_histori;  ?>">
                                            Penolakan Tindakan Kedokteran
                                        </a>

                                        <a class="btn btn-success col-md-5 penundaan" href="<?= base_url('Erm_igd_penundaan_pelayanan_pengobatan/form/') .   $id_pelayanan . '/' . $id_histori; ?>">
                                            Penundaan Pelayanan Atau Pengobatan
                                        </a>

                                        <a class="btn btn-success col-md-5 pertindok" href="<?= base_url('Erm_per_tin_kedokteran/form/') .   $id_pelayanan . '/' . $id_histori;  ?>">
                                            Persetujuan Tindakan Kedokteran
                                        </a>

                                        <a class="btn btn-success col-md-5 super_ranap" href="<?= base_url('Erm_super_rawat_inap_spri/form/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Surat Perintah Rawat Inap SPRI 2020
                                        </a>

                                        <a class="btn btn-success col-md-5 intra" href="<?= base_url('Erm_transfer_intra_rs/form/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Transfer Internal RS
                                        </a>

                                        <a class="btn btn-success col-md-5 form_edu_dokter" href="<?= base_url('Catatan_pemakaian_cairan_infus/formcpci/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Catatan Pemakaian Cairan Infus
                                        </a>
                                        <a class="btn btn-success col-md-5 pengobatan_sakit" href="<?php echo base_url('Erm_ranap_pengobatan_orang_sakit/formpengobatan/') . $id_pelayanan . '/' . $id_histori; ?>">
                                            Daftar Pemberian Obat
                                        </a>
                                        <a class="btn btn-success col-md-5 surveilans" href="<?= base_url('erm_survei_infeksi/form/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Surveilans Infeksi Daerah Operasi
                                        </a>

                                        <a class="btn btn-success col-md-5 surveilans" href="<?= base_url('Erm_surveilans_hais_rs/form/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Surveilans Hais RS
                                        </a>
                                        <a class="btn btn-success col-md-5 surveilans"
                                            href="<?php echo base_url('Erm_edukasi_igd/edukasi_pendaftaran_igd/' . urlencode($no_rm));?>">
                                            Form Edukasi Pasien
                                        </a>


                                    </div>
                                </div>
                                <div class="row pull-right">
                                    <button class="btn btn-default btn-anim" onclick="window.location.href='javascript:history.go(-1)';" type="submit" style="margin-right: 40px; margin-top:40px;padding: 10px 24px;" id="simpanKunjungan"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></button>
                                    <?php if ($simpan == 0) { ?>
                                        <button class="btn btn-primary btn-anim" onclick="simpan()" type="submit" style="margin-right: 100px; margin-top:40px" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN ERM</span></button>
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
<?php $this->load->view('erm_form/IGD/view_penunjang') ?>
<?php $this->load->view('erm_form/Penunjang/tindakan_kia') ?>
<?php $this->load->view('erm_form/Penunjang/pelayanan_tambahan') ?>

<style>
    p {
        color: black;
    }
</style>
<!-- <link rel="stylesheet" href="</?= base_url(); ?>assets/dist/css/loading.css"> -->
<script type="text/javascript">
    $(document).ready(function() {
        //     id_pelayanan = $('#inPel').val();
        //     id_history = $('#inHis').val();
        //     $.ajax({
        //         url: "</?php echo base_url() ?>Erm_igd/checkKasir",
        //         method: "POST",
        //         dataType: 'json',
        //         data: {
        //             id_pelayanan: id_pelayanan,
        //             id_history: id_history
        //         },
        //         success: function(data) {
        //             if (data.status == 'found') {
        $('#penunjang').show();
        //             } else {
        //                 $('#penunjang').hide();
        //             }

        //         }
        //     });
        //     return false;
    });
    $(document).ready(function() {
        id_pelayanan = $('#inPel').val();
        $.ajax({
            url: "<?php echo base_url() ?>Erm_igd/checkData",
            method: "POST",
            dataType: 'json',
            data: {
                id_pelayanan: id_pelayanan
            },
            success: function(data) {
                if (data.super_ranap == "found") {
                    $('.super_ranap').removeClass('btn-success').addClass('btn-danger ');
                    $('.super_ranap').attr('href', '<?php echo base_url('Erm_super_rawat_inap_spri/edit_super_ranap/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.asses_per_igd == "found") {
                    $('.asses_per_igd').removeClass('btn-success').addClass('btn-danger ');
                    $('.asses_per_igd').attr('href', '<?php echo base_url('erm_ases_per_igd/edit_asses_perawat_igd/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.asses_dokter_igd == "found") {
                    $('.asses_dokter_igd').removeClass('btn-success').addClass('btn-danger ');
                    $('.asses_dokter_igd').attr('href', '<?php echo base_url('erm_ases_dok_igd/edit_asses_dok_igd/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.asses_triase_ugd == "found") {
                    $('.asses_triase_ugd').removeClass('btn-success').addClass('btn-danger ');
                    $('.asses_triase_ugd').attr('href', '<?php echo base_url('Erm_ases_triase_ugd/edit_asses_triase_ugd/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.observasi == "found") {
                    $('.observasi').removeClass('btn-success').addClass('btn-danger ');
                    $('.observasi').attr('href', '<?php echo base_url('Erm_observasi_transfer/edit_obserfasi/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.sebab_kematian == "found") {
                    $('.sebab_kematian').removeClass('btn-success').addClass('btn-danger ');
                    $('.sebab_kematian').attr('href', '<?php echo base_url('erm_sebab_kematian/edit_sebab_kematian/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.lembar_rujukan == "found") {
                    $('.lembar_rujukan').removeClass('btn-success').addClass('btn-danger ');
                    $('.lembar_rujukan').attr('href', '<?php echo base_url('erm_igd_lembar_rujukan/edit_lembar_rujukan/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.penundaan == "found") {
                    $('.penundaan').removeClass('btn-success').addClass('btn-danger ');
                    $('.penundaan').attr('href', '<?php echo base_url('Erm_igd_penundaan_pelayanan_pengobatan/edit_penundaan/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.antar == "found") {
                    $('.antar').removeClass('btn-success').addClass('btn-danger ');
                    $('.antar').attr('href', '<?php echo base_url('Erm_trans_pas_antar_rs/edit_antar/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.intra == "found") {
                    $('.intra').removeClass('btn-success').addClass('btn-danger ');
                    // $('.intra').attr('href', '<?php echo base_url('Erm_transfer_intra_rs/edit_intra/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.upload_aps == "found") {
                    $('.aps').removeClass('btn-success').addClass('btn-danger ');
                }
                if (data.upload_fKronologis == "found") {
                    $('.fkronologis').removeClass('btn-success').addClass('btn-danger ');
                }
                if (data.upload_pTindakan == "found") {
                    $('.ptindakan').removeClass('btn-success').addClass('btn-danger ');
                }
                if (data.upload_sKematian == "found") {
                    $('.skematian').removeClass('btn-success').addClass('btn-danger ');
                }
                if (data.surveilans == "found") {
                    $('.surveilans').removeClass('btn-success').addClass('btn-danger ');
                }
                if (data.survei == "found") {
                    $('.survei').removeClass('btn-success').addClass('btn-danger ');
                }

                $('#loader').removeClass('hide')
            }
        });
        return false;
    });
</script>
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
            url: "<?php echo base_url() ?>Erm_igd/getErm",
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
<script>
    // $(document).ready(function() {
    //     // var slideIndex = 0;
    //     showSlides(0);

    // });

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        // var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        // for (i = 0; i < dots.length; i++) {
        //     dots[i].className = dots[i].className.replace(" active", "");
        // }
        slides[slideIndex - 1].style.display = "block";
        // dots[slideIndex - 1].className += " active";
    }
</script>
<script type="text/javascript">
    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();

        $.ajax({
            url: "<?php echo base_url() ?>Erm_igd/simpan_erm",
            method: "POST",
            dataType: 'json',
            data: {
                id_pelayanan: id_pelayanan,
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