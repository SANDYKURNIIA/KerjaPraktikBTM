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
        <?php
        $id_pel = urlencode(base64_encode($id_pelayanan));
        $id_his = urlencode(base64_encode($id_histori));

        if (preg_match('/BPJS/i', $cara_bayar) && $cara_bayar != 'BPJSTK') { ?>
            <div class="panel card-view">
                <div class="panel-wrapper">
                    <div class="panel-body">
                        <!-- <a class="btn btn-success col-md-12" style="margin: 3px" href="</?php echo base_url('All_Poli/Spri/') . $id_his .  '/' . $id_pel; ?>">SPRI</a> -->
                        <a class="btn btn-success col-md-12" style="margin: 3px" href="<?php echo base_url('All_Poli/Rencana_kontrol/') . $id_his .  '/' . $id_pel; ?>">RENCANA KONTROL</a>

                    </div>
                </div>
            </div>
        <?php } ?>
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


                                            <h5 class="txt-dark capitalize-font"><i class="fa fa-medkit mr-10"></i>PENUNJANG</h5>
                                            <hr width="100%">

                                            <?php echo
                                            "<button class='btn btn-success col-md-5'  onclick='pindah_kamar(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Pindah Kamar
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
                                            <?php
                                            $db_kamar = $this->db->get_where('history_pelayanan_ranap', ['id_history' => $id_histori])->row();
                                            //  if($db_kamar->tgl_keluar == NULL){
                                            echo
                                            "<button class='btn btn-success col-md-5' onclick='edit_obat(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Obat
                                            </button>";
                                            //  }
                                            ?>
                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='tindakan_apelkes(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Tindakan Biaya
                                            </button>";
                                            ?>
                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='obat_ruang(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Obat Ruang
                                            </button>";
                                            ?>
                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='show_visite(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Visite Dokter
                                            </button>";
                                            ?>
                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='tindakan_fisio(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Tindakan Fisio
                                            </button>";
                                            ?>

                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='edit_paket(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Paket Cendrawasih
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
                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='edit_lain(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Penunjang Lainnya
                                            </button>";
                                            ?>
                                            <?php echo
                                            "<button class='btn btn-success col-md-5' onclick='edit_makan(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Makan
                                            </button>";
                                            ?>
                                            <?php echo
                                            "<button class='btn btn-success col-md-5'  onclick='listDuaTindakan(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Dua Tindakan
                                            </button>";
                                            ?>
                                            <!-- </?php echo
                                            "<button class='btn btn-success col-md-5' onclick='listDuaTindakan(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            2 Tindakan OK
                                            </button>";
                                            ?> -->
                                            <div class="clearfix"></div>

                                        </div>
                                        <div style="display: block;">
                                            <h5 class="txt-dark capitalize-font"><i class="fa fa-file mr-10"></i>ERM</h5>
                                            <hr width="100%">
                                            <!-- </?php if($id_histori_igd != ""){?>
                                            <a class="btn btn-success col-md-5 asses_per_igd" href="<?php echo base_url('Erm_ases_per_igd/form/') . $id_pelayanan . '/' . $id_histori_igd; ?>">
                                                Triase & Assesmen Keperawatan   
                                            </a>

                                            <a class="btn btn-success col-md-5 asses_dokter_igd" href="<?php echo base_url('erm_ases_dok_igd/form/') .  $id_pelayanan . '/' . $id_histori_igd; ?>">
                                               Status Present
                                            </a>
                                        </?php }?> -->
                                            <a class="btn btn-success col-md-5 asses_per_ranap" href="<?php echo base_url('Erm_ranap_asesmen_perawat/formasesmenranap/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                Assesmen Awal Perawat
                                            </a>
                                            <!-- <a class="btn btn-success col-md-5 asses_per_ranap" onclick="cek_skrining_tbc()">
                                                Assesmen Awal Perawat
                                            </a> -->
                                            <a class="btn btn-success col-md-5 rencana_keperawatan" href="<?php echo base_url('Erm_ranap_rencana_keperawatan/formrencanakeperawatan/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                Rencana Keperawatan
                                            </a>
                                            <a class="btn btn-success col-md-5 anamnesis_fisik" href="<?php echo base_url('Erm_ranap_asesmen_dokter/formasesmen/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                Asesmen Awal Medis Rawat Inap
                                            </a>
                                            <a class="btn btn-success col-md-5 catatan_perkembangan" href="<?php echo base_url('Erm_ranap_catatan_perkembangan/formcppt/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                Catatan Perkembangan Pasien Terintegrasi
                                            </a>
                                            <!-- <a class="btn btn-success col-md-5 infus_sehari" href="<?php echo base_url('Erm_ranap_infus_sehari/forminfus/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                Catatan Pemakaian Cairan Infus
                                            </a> -->
                                            <a class="btn btn-success col-md-5 form_edu_dokter" href="<?= base_url('Catatan_pemakaian_cairan_infus/formcpci/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                                Catatan Pemakaian Cairan Infus
                                            </a>

                                            <a class="btn btn-success col-md-5 pemantauan_vital" href="<?php echo base_url('Erm_ranap_pemantauan_vital/formvital/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                Pemantauan Tanda Vital Dewasa
                                            </a>

                                            <!-- <a class="btn btn-success col-md-5 analisis_data" href="<?php echo base_url('Erm_ranap_analisis/formanalisisdata/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                Analisis Data
                                            </a> -->
                                            <a class="btn btn-success col-md-5 intra" href="<?= base_url('Erm_transfer_intra_rs/form/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                                Transfer Internal RS
                                            </a>
                                            <!-- <a class="btn btn-success col-md-5 visite_dokter" href="<?php echo base_url('Erm_ranap_visite_dokter/formvisite/') . $id_pelayanan . '/' . $id_histori; ?>"> 
                                            Visite Dokter
                                        </a> -->
                                            <!-- <a class="btn btn-success col-md-5 bayi_gabung" href="<?php echo base_url('Erm_ranap_bayi_gabung/formbayirawatgabung/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                Bayi Rawat Gabung
                                            </a> -->

                                            <a class="btn btn-success col-md-5 imd_eksklusif" href="<?php echo base_url('Erm_ranap_imd/formimdasi/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                IMD/ASI Ekslusif
                                            </a>
                                            <!-- <a class="btn btn-success col-md-5 asesmen_awal_dewasa" href="<?php echo base_url('Erm_ranap_awal_jatuh_dewasa/formawaljatuhdewasa/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                Asesmen Awal Jatuh Dewasa
                                            </a> -->
                                            <a class="btn btn-success col-md-5 asesmen_ulang_dewasa" href="<?php echo base_url('Erm_ranap_ulang_jatuh_dewasa/formulangjatuhdewasa/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                Asesmen Ulang Jatuh Dewasa
                                            </a>
                                            <!-- <a class="btn btn-success col-md-5 asesmen_awal_geriatri" href="<?php echo base_url('Erm_ranap_awal_jatuh_geriatri/formawaljatuhgeriatri/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                Asesmen Awal Jatuh Geriatri
                                            </a> -->
                                            <a class="btn btn-success col-md-5 asesmen_ulang_geriatri" href="<?php echo base_url('Erm_ranap_ulang_jatuh_geriatri/formulangjatuhgeriatri/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                Asesmen Ulang Jatuh Geriatri
                                            </a>
                                            <a class="btn btn-success col-md-5 persetujuan_kedokteran" href="<?php echo base_url('Erm_ranap_persetujuan_kedokteran/formpersetujuan/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                Persetujuan Tindakan Kedokteran
                                            </a>
                                            <a class="btn btn-success col-md-5 lembar_evaluasi" href="<?php echo base_url('Erm_ranap_evaluasi_dpjp/formevaluasidpjp/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                Lembar Evaluasi DPJP
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

                                            <!-- <a class="btn btn-success col-md-5 surveilans" href="<?= base_url('Erm_ranap_resume_medis/formresume/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Resume Medis
                                        </a> -->

                                            <a class="btn btn-success col-md-5 resume_bayi_tabung" href="<?= base_url('Erm_resume_bayi_tabung/formresumebayitabung/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                                Resume Bayi Tabung
                                            </a>

                                            <a class="btn btn-success col-md-5 resume_pulang" href="<?= base_url('Erm_resume_pulang/form_resume_pulang/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                                Resume Pulang
                                            </a>

                                            <a class="btn btn-success col-md-5 laporan_operasi" href="<?= base_url('Erm_laporan_operasi/formlaporanoperasi/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                                Laporan Operasi
                                            </a>

                                            <!-- <a class="btn btn-success col-md-5 resume_pasien_pulang" href="<?= base_url('Erm_resume_pasien_pulang/formresumepasienpulang/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            Resume Pasien Pulang
                                        </a> -->


                                            <a class="btn btn-success col-md-5  ass_bayi_baru_lahir" href="<?= base_url('Erm_ranap_bayi_baru_lahir/formbayibarulahir/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                                Assesmen Bayi Baru Lahir
                                            </a>

                                            <a class="btn btn-success col-md-5  discharge_planning" href="<?= base_url('Discharge_planning/formresume/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                                Discharge Planning
                                            </a>
                                            <a class="btn btn-success col-md-5  assesmen_gizi" href="<?= base_url('Erm_assesmen_gizi/formgizi/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                                Assesmen Gizi
                                            </a>

                                            <a class="btn btn-success col-md-5  one_day_care" href="<?= base_url('OneDayCare/decer/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                                One Day Care
                                            </a>
                                             <a class="btn btn-success col-md-5  status_respirasi" href="<?= base_url('StatusRespirasi/form/'.$id_pelayanan.'/'.$id_histori) ?>">
                                                Status Respirasi
                                            </a>

                                            <!-- <a id="dischargePlanningBtn" class="btn btn-success col-md-5 discharger_planning" href="<?= base_url('Discharge_planning/formresume/') . $id_pelayanan . '/' . $id_histori; ?>">
                                                Discharge Planning
                                            </a> -->    




                                        </div>
                                        <div class="row pull-right">
                                            <button class="btn btn-default btn-anim" onclick="window.location.href='javascript:history.go(-1)';" type="submit" style="margin-right: 40px; margin-top:40px;padding: 10px 24px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></button>
                                            <!-- </?php if ($simpan == 0) { ?>
                                                <button class="btn btn-primary btn-anim" onclick="simpan()" type="submit" style="margin-right: 100px; margin-top:40px" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN ERM</span></button>
                                            </?php } ?> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('erm_form/Ranap/view_penunjang') ?>
<?php $this->load->view('erm_form/Ranap/view_paket') ?>
<?php $this->load->view('erm_form/Penunjang/pelayanan_tambahan') ?>
<?php $this->load->view('erm_form/Penunjang/tindakan_kia') ?>
<?php $this->load->view('erm_form/Penunjang/penunjang_lain') ?>
<?php $this->load->view('erm_form/Penunjang/makan') ?>
<?php $this->load->view('erm_form/OK/view_dua_tindakan') ?>

<style>
    p {
        color: black;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        id_pelayanan = $('#inPel').val();
        id_histori = $('#inHis').val();
        $.ajax({
            url: "<?php echo base_url() ?>Erm_ranap/checkData",
            method: "POST",
            dataType: 'json',
            data: {
                id_pelayanan: id_pelayanan,
                id_histori : id_histori
            },
            success: function(data) {
                if (data.asses_per_ranap == "found") {
                    $('.asses_per_ranap').removeClass('btn-success').addClass('btn-danger ');
                    $('.asses_per_ranap').attr('href', '<?php echo base_url('Erm_ranap_asesmen_perawat/edit_asses_perawat_ranap/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.asesmen_awal_dewasa == "found") {
                    $('.asesmen_awal_dewasa').removeClass('btn-success').addClass('btn-danger ');
                    $('.asesmen_awal_dewasa').attr('href', '<?php echo base_url('Erm_ranap_awal_jatuh_dewasa/edit_asesmen/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.asesmen_ulang_dewasa == "found") {
                    $('.asesmen_ulang_dewasa').removeClass('btn-success').addClass('btn-danger ');
                    $('.asesmen_ulang_dewasa').attr('href', '<?php echo base_url('erm_ranap_ulang_jatuh_dewasa/formulangjatuhdewasa/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.asesmen_awal_geriatri == "found") {
                    $('.asesmen_awal_geriatri').removeClass('btn-success').addClass('btn-danger ');
                    $('.asesmen_awal_geriatri').attr('href', '<?php echo base_url('Erm_ranap_awal_jatuh_geriatri/edit_asesmen/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.asesmen_ulang_geriatri == "found") {
                    $('.asesmen_ulang_geriatri').removeClass('btn-success').addClass('btn-danger ');
                    $('.asesmen_ulang_geriatri').attr('href', '<?php echo base_url('Erm_ranap_ulang_jatuh_geriatri/edit_asesmen/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.imd_eksklusif == "found") {
                    $('.imd_eksklusif').removeClass('btn-success').addClass('btn-danger ');
                    $('.imd_eksklusif').attr('href', '<?php echo base_url('Erm_ranap_imd/edit_imd/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.analisis_data == "found") {
                    $('.analisis_data').removeClass('btn-success').addClass('btn-danger ');
                    $('.analisis_data').attr('href', '<?php echo base_url('Erm_ranap_analisis/formanalisisdata/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.rencana_keperawatan == "found") {
                    $('.rencana_keperawatan').removeClass('btn-success').addClass('btn-danger ');
                    $('.rencana_keperawatan').attr('href', '<?php echo base_url('Erm_ranap_rencana_keperawatan/formrencanakeperawatan/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.bayi_gabung == "found") {
                    $('.bayi_gabung').removeClass('btn-success').addClass('btn-danger ');
                    $('.bayi_gabung').attr('href', '<?php echo base_url('Erm_ranap_bayi_gabung/edit_bayi_gabung/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.catatan_perkembangan == "found") {
                    $('.catatan_perkembangan').removeClass('btn-success').addClass('btn-danger ');
                    $('.catatan_perkembangan').attr('href', '<?php echo base_url('Erm_ranap_catatan_perkembangan/formcppt/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.persetujuan_kedokteran == "found") {
                    $('.persetujuan_kedokteran').removeClass('btn-success').addClass('btn-danger ');
                    $('.persetujuan_kedokteran').attr('href', '<?php echo base_url('Erm_ranap_persetujuan_kedokteran/formpersetujuan/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.lembar_evaluasi == "found") {
                    $('.lembar_evaluasi').removeClass('btn-success').addClass('btn-danger ');
                    $('.lembar_evaluasi').attr('href', '<?php echo base_url('Erm_ranap_evaluasi_dpjp/edit_evaluasi_dpjp/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.infus_sehari == "found") {
                    $('.infus_sehari').removeClass('btn-success').addClass('btn-danger ');
                    $('.infus_sehari').attr('href', '<?php echo base_url('Erm_ranap_infus_sehari/forminfus/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.pemantauan_vital == "found") {
                    $('.pemantauan_vital').removeClass('btn-success').addClass('btn-danger ');
                    $('.pemantauan_vital').attr('href', '<?php echo base_url('Erm_ranap_pemantauan_vital/edit_vital/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.discharge_planning == "found") {
                    $('.discharge_planning').removeClass('btn-success').addClass('btn-danger ');
                    $('.discharge_planning').attr('href', '<?php echo base_url('Discharge_planning/edit_discharger/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.one_day_care == "found") {
                    $('.one_day_care').removeClass('btn-success').addClass('btn-danger ');
                }
                if (data.pengobatan_sakit == "found") {
                    $('.pengobatan_sakit').removeClass('btn-success').addClass('btn-danger ');
                    // $('.pengobatan_sakit').attr('href', '<?php echo base_url('Erm_ranap_infus_sehari/forminfus/') . $id_pelayanan . '/' . $id_histori; ?>');
                }
                if (data.anamnesis_fisik == "found") {
                    $('.anamnesis_fisik').removeClass('btn-success').addClass('btn-danger ');
                    $('.anamnesis_fisik').attr('href', '<?php echo base_url('Erm_ranap_asesmen_dokter/formedit/') . $id_pelayanan . '/' . $id_histori; ?>');
                    
                }
                if (data.one_day_care == "found") {
                    $('.one_day_care').removeClass('btn-success').addClass('btn-danger ');
                }
                if (data.resume_pulang == "found") {
                    $('.resume_pulang').removeClass('btn-success').addClass('btn-danger ');
                }
                 if (data.status_respirasi == "found") {
                    $('.status_respirasi').removeClass('btn-success').addClass('btn-danger ');
                }
                if (data.survei == "found") {
                    $('.survei').removeClass('btn-success').addClass('btn-danger ');
                }

                $('#loader').removeClass('hide')
            }
        });
        return false;
    });

    function cek_skrining_tbc() {
        id_pelayanan = $('#inPel').val();
        $.ajax({
            url: "<?php echo base_url() ?>Erm_ranap/cek_skrining_tbc",
            method: "POST",
            dataType: 'json',
            data: {
                id_pelayanan: id_pelayanan
            },
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?php echo base_url('Erm_ranap_asesmen_perawat/formasesmenranap/') . $id_pelayanan . '/' . $id_histori; ?>";
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: "anda belum mengisi Skrining TBC!",
                        confirmButtonColor: "#3cb878",
                    });
                }
            }

        });

    }
</script>
<!-- <link rel="stylesheet" href="</?= base_url(); ?>assets/dist/css/loading.css"> -->

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

<script type="text/javascript">
    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();

        $.ajax({
            url: "<?php echo base_url() ?>Erm_igd/simpan_erm",
            method: "POST",
            dataType: 'json',
            data: {
                id_pelayanan: id_pelayanan
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