<<<<<<< HEAD
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

                                <?php
                                ?>

                                <!-- <img class="img-circle inline-block mt-40 mb-10" src="<?= base_url() ?>resources/img/userimgs/default_man.png" alt="user"/> -->
                                <h4 class="txt-light block  mb-5 capitalize-font"><?= $nama ?></h4>
                                <h5 class="txt-light block uppercase-font"><?= $no_rm ?></h5>
                                <h6 class="txt-light block uppercase-font"><?= $jenis_kelamin ?></h6>
                                <h6 class="txt-light block uppercase-font"><?= getAge($tgl_lahir); ?></h6>
                                <!-- <h6 class="txt-light block uppercase-font"><?= $tgl_lahir ?></h6> -->
                                <h6 class="txt-light block uppercase-font"><?= $cara_bayar ?></h6>
                                <h6 class="txt-light block uppercase-font pb-40"><?= $nama_dokter ?></h6>
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
                        <a href="<?php echo base_url('SEP/icare_dok/') . $id_pelayanan . '/' . $id_histori; ?>" class="btn btn-success col-md-12" style="margin: 3px" target="_blank">I-Care</a>

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
                    <button class="btn btn-success col-md-12" style="margin: 3px" id="riwayattbc" onclick="riwayattbc()">RIWAYAT TBC</button>
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
                            <!-- <div class="row hide lds-dual-ring overlay" id="loader"> -->
                            <div class="col-lg-12">
                                <div class="button-list mt-25">
                                    <div id="penunjang" style="margin-bottom: 50px; display: block;">

                                        <?php


                                        $data = $this->session->userdata('data_auth');
                                        $tipe = $data->tipe;
                                        ?>
                                        <h5 class="txt-dark capitalize-font"><i class="fa fa-medkit mr-10"></i>PENUNJANG</h5>
                                        <hr width="100%">
                                        <?php echo
                                        "<button class='btn btn-success col-md-5' onclick='edit_data_tindakan(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Tindakan Poli
                                        </button>";
                                        ?>
                                        <?php echo
                                        "<button class='btn btn-success col-md-5' onclick='edit_radiologi(\"" . $id_pelayanan . "\",\"" . $id_histori .  "\",\"" . $jenis_pelayanan . "\")'>
                                            Radiologi
                                        </button>";
                                        ?>
                                        <?php echo
                                        "<button class='btn btn-success col-md-5' onclick='edit_labor(\"" . $id_pelayanan . "\",\"" . $id_histori .  "\",\"" . $jenis_pelayanan . "\")'>
                                            Labor
                                        </button>";
                                        ?>
                                        <?php echo
                                        "<button class='btn btn-success col-md-5' onclick='edit_obat(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Obat
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
                                        "<button class='btn btn-success col-md-5' onclick='openModal(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                                        Tindakan Fisio
                                                </button>";
                                        ?>
                                        <?php if ($tipe == "kemoterapi") {
                                            echo
                                            "<button class='btn btn-success col-md-5' onclick='obat_ruang(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                                Obat Ruang
                                                </button>";
                                            $this->load->view('erm_form/Penunjang/obat_ruangan');
                                        }
                                        ?>
                                        <!-- <?php echo
                                                "<button class='btn btn-success col-md-5' onclick='edit_lain(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Penunjang Lainnya
                                        </button>";
                                                ?> -->

                                        <?php if ($tipe == "polibedah" || $tipe == "polibedahmulut" || $tipe == "poliorthopedi" || $tipe == "politht" || $tipe == "poliobgyne") {
                                            echo "<button class='btn btn-success col-md-5' onclick='antrian_operasi(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                                Antrian Operasi
                                                </button>";
                                            $this->load->view('erm_form/OK/antrian_operasi');
                                        }
                                        ?>
                                        <div class="clearfix"></div>

                                    </div>

                                    <h5 class="txt-dark capitalize-font"><i class="fa fa-file mr-10"></i>ERM</h5>
                                    <hr width="100%">
                                    <a class="btn btn-success col-md-5 skirining_tbc" href="<?php echo base_url('Skrining_TBC/form/')  . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Skrining TBC
                                    </a>
                                    <?php if ($tipe == "rehab") { ?>
                                        <a class="btn btn-success col-md-5 form_edu_dokter" href="<?= base_url('Form_soap_rehab/formsoap/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            SOAP Rehabmed
                                        </a>
                                    <?php }
                                    ?>
                                    <a class="btn btn-success col-md-5 asses_per_igd" href="<?php echo base_url('Erm_asesmen_awal/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Assesmen Rawat Jalan / Assesmen Awal
                                    </a>

                                    <!-- <a class="btn btn-success col-md-5 asses_per_igd" onclick="cek_skrining_tbc()">
                                        Assesmen Rawat Jalan / Assesmen Awal
                                    </a> -->

                                    <a class="btn btn-success col-md-5 asses_dokter_igd" href="<?php echo base_url('Asesmen_dokter/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Assesmen Dokter
                                    </a>


                                    <a class="btn btn-success col-md-5 resume" href="<?= base_url('Erm_resume_medis_raj/form/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Resume Medis Rajal
                                    </a>
                                    <a class="btn btn-success col-md-5 penunjang" href="<?= base_url('Erm_penunjang_diagnostik/form/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Hasil Baca Penunjang Diagnostik
                                    </a>
                                    <a class="btn btn-success col-md-5 penunjang" href="<?= base_url('Erm_resiko_jatuh/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Resiko Jatuh
                                    </a>
                                    <a class="btn btn-success col-md-5 penunjang" href="<?= base_url('Erm_lembar_anam_poliklinik/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Lembar Anamnesa
                                    </a>
                                    <!-- <a class="btn btn-success col-md-5 penunjang" href="<?= base_url('Erm_lembar_rujukan/form/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                            Lembar Rujukan
                                        </a> -->
                                    <a class="btn btn-success col-md-5 lembar_rujukan" href="<?= base_url('Erm_dpjp/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Lembar Konsul
                                    </a>
                                    <a class="btn btn-success col-md-5 penunjang" target="_blank" href="<?= base_url('Erm_prmrj/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        PRMRJ
                                    </a>
                                    <a class="btn btn-success col-md-5 penunjang" href="<?= base_url('Erm_skdp/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        SKDP
                                    </a>
                                    <a class="btn btn-success col-md-5 penunjang" href="<?= base_url('Erm_surat_rujukan_balik/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Surat Rujukan Balik
                                    </a>
                                    <a class="btn btn-success col-md-5 observasi" href="<?= base_url('Erm_observasi_transfer/form_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Form Observasi Transfer antar RS
                                    </a>

                                    <a class="btn btn-success col-md-5 per_pen_rujuk" href="<?= base_url('Erm_per_pen_rujukan/form_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Form Persetujuan Penolakan Rujukan
                                    </a>

                                    <a class="btn btn-success col-md-5 sebab_kematian" href="<?= base_url('Erm_sebab_kematian/form_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Form Sebab Kematian
                                    </a>

                                    <!-- <a class="btn btn-success col-md-5 lembar_rujukan" href="<?= base_url('Erm_igd_lembar_rujukan/form_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan ?>">
                                            Lembar Rujukan Antar DPJP
                                        </a> -->

                                    <a class="btn btn-success col-md-5 pengkhu" href="<?= base_url('Erm_peng_khu_upmar_2017/form/') .  $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Pengawasan Khusus Update Maret 2017
                                    </a>

                                    <a class="btn btn-success col-md-5 pentindok" href="<?= base_url('Erm_penolakan_tindakan_kedokteran/form_raj/') .  $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan;  ?>">
                                        Penolakan Tindakan Kedokteran
                                    </a>

                                    <a class="btn btn-success col-md-5 penundaan" href="<?= base_url('Erm_penundaan_pelayanan_pengobatan/form/') .  $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Penundaan Pelayanan Atau Pengobatan
                                    </a>

                                    <a class="btn btn-success col-md-5 pertindok" href="<?= base_url('Erm_per_tin_kedokteran/form_raj/') .  $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan;  ?>">
                                        Persetujuan Tindakan Kedokteran
                                    </a>

                                    <a class="btn btn-success col-md-5 super_ranap" href="<?= base_url('Erm_super_rawat_inap_spri/form_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Surat Perintah Rawat Inap SPRI 2020
                                    </a>

                                    <a class="btn btn-success col-md-5 intra" href="<?= base_url('Erm_transfer_intra_rs/form_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Observasi Intra RS
                                    </a>
                                    <a class="btn btn-success col-md-5 antar" href="<?= base_url('Erm_trans_pas_antar_rs/form_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Rujukan Pasien Antar Rumah Sakit
                                    </a>
                                    <a class="btn btn-success col-md-5 eval" href="<?= base_url('Erm_dpjp/eval/') . $id_pel . '/' . $id_his . '/' . $jenis_pelayanan; ?>">
                                        Lembar Evaluasi
                                    </a>
                                    <a class="btn btn-success col-md-5 tb" id="kirimDataTBC" data-id-pel="<?= $id_pel; ?>" data-no-rm="<?= $no_rm; ?>">
                                        Kirim Data TBC
                                    </a>
                                    <a class="btn btn-success col-md-5 usg_kebidanan" href="<?= base_url('Erm_usg_kebidanan/form/') . $id_pel . '/' . $id_his . '/' . $jenis_pelayanan; ?>">
                                        hasil usg kebidanan
                                    </a>

                                    <a class="btn btn-success col-md-5 tb lembar_uji_fungsi"
                                        href="<?= base_url('Lembar_uji_fungsi/form/' . $id_pelayanan . '/' . $no_rm); ?>">
                                        Lembar Uji Fungsi Setelah Rehab
                                    </a>

                                    <a class="btn btn-success col-md-5 form_assesmen_rehab"
                                        href="<?= base_url('Assesmen_Rehab/form/') . $id_pelayanan . '/' . $id_histori . '/' . $jenis_pelayanan; ?>">
                                        Assesmen Rehab
                                    </a>

                                    <a class="btn btn-success col-md-5 form_fisikrehab"
                                        href="<?php echo base_url('Form_fisikrehab/form/') . $id_pel . '/' . $id_his . '/' . $jenis_pelayanan; ?>">
                                        Formulir Layanan Rehabilitasi Medik
                                    </a>
                                    <a class="btn btn-success col-md-5 hd_harian" href="<?php echo base_url('Pemantauan_pelaksanaan_hemodialis_harian/form/')  . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Pemantauan Pelaksanaan Hemodialisis
                                    </a>

                                    <a class="btn btn-success col-md-5 intradialitik" href="<?= base_url('Erm_pemantauan_intradialitik/form/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Pemantauan Intradialitik
                                    </a>

                                    <a class="btn btn-success col-md-5 form_ekg"
                                        href="<?= base_url('Erm_form_ekg/form/') . $id_pelayanan . '/' . $id_histori . '/' . $jenis_pelayanan; ?>">
                                        Form EKG
                                    </a>

                                    <?php if ($tipe == 'polimata') { ?>
                                        <a class="btn btn-success col-md-5 laporan_tin_operasi" href="<?= base_url('Erm_laporan_tin_operasi/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                            Laporan Tindakan Operasi
                                        </a>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="row pull-right">
                                <button class="btn btn-default btn-anim" onclick="window.location.href='javascript:history.go(-1)';" type="submit" style="margin-right: 40px; margin-top:40px;padding: 10px 24px;" id="simpanKunjungan"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></button>
                                <?php if ($simpan == 0) { ?>
                                    <button class="btn btn-primary btn-anim" onclick="simpan()" type="submit" style="margin-right: 100px; margin-top:40px" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN ERM</span></button>
                                <?php } ?>
                            </div>
                            <!-- </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tindakanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tindakan Fisio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-10">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 95%; margin: auto">
                    <div class="table-responsive">
                        <table class="table table-hover display pb-60" id="tablefisio">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>BIAYA TINDAKAN</th>
                                    <th>STATUS</th>
                                    <th>STAFF REQUEST</th>
                                </tr>
                            </thead>
                            <tbody style="color: black"></tbody>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>BIAYA TINDAKAN</th>
                                    <th>STATUS</th>
                                    <th>STAFF REQUEST</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// $cara_bayar = $this->db->get_where('pelayanan',['id_pelayanan'=>$id_pelayanan])->row()->cara_bayar;
$this->load->view('erm_form/Poli/view_penunjang') ?>
<?php $this->load->view('erm_form/Penunjang/pelayanan_tambahan') ?>
<?php $this->load->view('erm_form/Penunjang/tindakan_kia') ?>
<?php $this->load->view('erm_form/Penunjang/penunjang_lain') ?>
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
            url: "<?php echo base_url() ?>Erm_poli/checkData",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_histori
            },
            success: function(data) {
                if (data.super_ranap == "found") {
                    $('.super_ranap').removeClass('btn-success').addClass('btn-danger ');
                    $('.super_ranap').attr('href', '<?php echo base_url('Erm_super_rawat_inap_spri/edit_super_ranap_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>');
                }
                if (data.skrining_tbc == "found") {
                    $('.skirining_tbc').removeClass('btn-success').addClass('btn-danger');
                }
                if (data.asses_per_igd == "found") {
                    $('.asses_per_igd').removeClass('btn-success').addClass('btn-danger ');
                    $('.asses_per_igd').attr('href', '<?php echo base_url('Erm_asesmen_awal/edit_asses_perawat_igd/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>');
                }
                if (data.asses_dokter_igd == "found") {
                    $('.asses_dokter_igd').removeClass('btn-success').addClass('btn-danger ');
                    $('.asses_dokter_igd').attr('href', '<?php echo base_url('Asesmen_dokter/edit_asses_dok_igd/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>');
                }
                if (data.observasi == "found") {
                    $('.observasi').removeClass('btn-success').addClass('btn-danger ');
                    $('.observasi').attr('href', '<?php echo base_url('Erm_observasi_transfer/edit_obserfasi_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>');
                }
                if (data.sebab_kematian == "found") {
                    $('.sebab_kematian').removeClass('btn-success').addClass('btn-danger ');
                    $('.sebab_kematian').attr('href', '<?php echo base_url('erm_sebab_kematian/edit_sebab_kematian_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>');
                }
                if (data.lembar_rujukan == "found") {
                    $('.lembar_rujukan').removeClass('btn-success').addClass('btn-danger ');
                }
                if (data.eval == "found") {
                    $('.eval').removeClass('btn-success').addClass('btn-danger ');
                    $('.eval').attr('href', '<?php echo base_url('Erm_dpjp/edit_eval/') . $id_pelayanan . '/' . $id_histori . '/' . $jenis_pelayanan; ?>');
                }
                if (data.assesmen_rehab == "found") {
                    $('.form_assesmen_rehab')
                        .removeClass('btn-success')
                        .addClass('btn-danger')
                        .attr('href', '<?php echo base_url('Assesmen_Rehab/form_edit/') . $id_pelayanan . '/' . $id_histori . '/' . $jenis_pelayanan; ?>');
                }

                if (data.penundaan == "found") {
                    $('.penundaan').removeClass('btn-success').addClass('btn-danger ');
                    $('.penundaan').attr('href', '<?php echo base_url('Erm_penundaan_pelayanan_pengobatan/edit_penundaan/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>');
                }
                if (data.antar == "found") {
                    $('.antar').removeClass('btn-success').addClass('btn-danger ');
                    $('.antar').attr('href', '<?php echo base_url('Erm_trans_pas_antar_rs/edit_antar_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>');
                }
                if (data.intra == "found") {
                    $('.intra').removeClass('btn-success').addClass('btn-danger ');
                    $('.intra').attr('href', '<?php echo base_url('Erm_transfer_intra_rs/edit_intra/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>');
                }


                if (data.hasil_usg_kebidanan == "found") {
                    $('.usg_kebidanan').removeClass('btn-success').addClass('btn-danger ');
                }

                if (data.form_fisikrehab === "found") {
                    $('.form_fisikrehab').removeClass('btn-success').addClass('btn-danger');
                    // kalau nanti kamu punya route edit khusus, bisa sekalian ganti href di sini
                    // $('.form_fisikrehab').attr('href', '<?= base_url('Form_fisikrehab/edit/') ?>' + <?= $id_pelayanan ?> + '/<?= $id_histori ?>');
                }
                if (data.laporan_tin_operasi == "found") {
                    $('.laporan_tin_operasi').removeClass('btn-success').addClass('btn-danger ');
                    $('.laporan_tin_operasi').attr('href', '<?php echo base_url('Erm_laporan_tin_operasi/edit_laporan/') . $id_pelayanan .  '/' . $id_histori; ?>');
                }
                if (data.lembar_uji_fungsi == "found") {
                    $('.lembar_uji_fungsi').removeClass('btn-success').addClass('btn-danger ');

                }

                if (data.intradialitik == "found") {
                    $('.intradialitik').removeClass('btn-success').addClass('btn-danger ');
                }

                if (data.hd_harian == "found") {
                    $('.hd_harian').removeClass('btn-success').addClass('btn-danger ');
                }
                if (data.laporan_tin_operasi == "found") {
                    $('.laporan_tin_operasi').removeClass('btn-success').addClass('btn-danger ');
                    $('.laporan_tin_operasi').attr('href', '<?php echo base_url('Erm_laporan_tin_operasi/edit_laporan/') . $id_pelayanan .  '/' . $id_histori; ?>');
                }
                if (data.form_ekg == "found") {
                    $('.form_ekg')
                        .removeClass('btn-success')
                        .addClass('btn-danger')
                        .attr('href', '<?php echo base_url('Erm_form_ekg/form_edit/') . $id_pelayanan . '/' . $id_histori . '/' . $jenis_pelayanan; ?>');
                }

                $('#loader').removeClass('hide')
            }
        });
        return false;
    });
    // $(document).ready(function() {
    //     //     id_pelayanan = $('#inPel').val();
    //     //     id_history = $('#inHis').val();
    //     //     $.ajax({
    //     //         url: "</?php echo base_url() ?>Erm_igd/checkKasir",
    //     //         method: "POST",
    //     //         dataType: 'json',
    //     //         data: {
    //     //             id_pelayanan: id_pelayanan,
    //     //             id_history: id_history
    //     //         },
    //     //         success: function(data) {
    //     //             if (data.status == 'found') {
    //     $('#penunjang').show();
    //     //             } else {
    //     //                 $('#penunjang').hide();
    //     //             }

    //     //         }
    //     //     });
    //     //     return false;
    // });
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

    function riwayattbc() {
        $('#slide').html(''); // Mengosongkan elemen '#slide'
        no_pel = $('#inPel').val();
        $.ajax({
            url: "<?php echo base_url() ?>Erm_igd/getTBC",
            method: "POST",
            dataType: 'json',
            data: {
                id: no_pel
            },
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html +=
                        '<a href="javascript:void(0)" class="list-group-item">' +
                        '<strong>' + data[i].nama + '</strong> <br>' +
                        '<span class="inline-block font-12 mb-5"><p><strong>tanggal dinyatakan:</strong>' + data[i].tgl_dinyatakan + '</p> </span>' +
                        '<div class="clearfix"></div> ' +
                        '<p><strong> Jenis Kelamin:</strong> ' + data[i].jenis_kelamin + ' </p>' +
                        '<p><strong> Hasil Skrining TBC: </strong> ' + data[i].keterangan + ' </p> </a>';
                }
                $('#slide').html(html);
            }
        });
    }

    $(document).ready(function() {
        $('#kirimDataTBC').on('click', function(e) {
            e.preventDefault(); // Mencegah redirect default

            // Ambil data dari atribut tombol
            var id_pel = $(this).data('id-pel');
            var no_rm = $(this).data('no-rm');

            $.ajax({
                url: "<?= base_url('ihs_api/collect_data/'); ?>" + id_pel + '/' + no_rm,
                method: "POST", // Atau "POST" jika function collect_data menggunakan metode POST
                dataType: "json",
                success: function(response) {
                    if (response.status == true) {
                        // Jika sukses, tampilkan pesan sukses
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil disimpan",
                            confirmButtonColor: "#3cb878",
                        });
                    } else if (response.status == false) {
                        // Tampilkan pesan error jika gagal
                        swal({
                            title: "Gagal!",
                            type: "warning",
                            text: response.message,
                            confirmButtonColor: "#3cb878",
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Tampilkan error dari server jika ada
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil disimpan",
                        confirmButtonColor: "#3cb878",
                    });
                }
            });
        });
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
                    window.location.href = "<?php echo base_url('Erm_asesmen_awal/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>";
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



    // Trigger the function when the button is clicked
    $(document).ready(function() {
        $('#riwayattbc').on('click', function() {
            riwayattbc();
        });
    });

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
                            '<p> Diagnosa: ' + data.erm[i].kode + ' - ' + data.erm[i].nama_diagnosa + ' </p>' +
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
            // url: "<?php echo base_url() ?>satusehat/Bundle_encounter/create_encounter",
            url: "<?php echo base_url() ?>Erm_poli/simpan_erm",
            method: "POST",
            dataType: 'json',
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
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

    $(document).ready(function() {
        // Inisialisasi DataTable saat dokumen siap
        // initializeDataTable();

        function initializeDataTable() {
            $('#tablefisio').DataTable({
                "language": {
                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing": "Sedang memproses...",
                    "sLengthMenu": "Tampilkan _MENU_ entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "sInfoPostFix": "",
                    "sSearch": "Pencarian :",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext": "Selanjutnya",
                        "sLast": "Terakhir"
                    },
                },
                "ajax": '<?php echo base_url('Poli/tampil_pasien'); ?>',
                "deferRender": true,
                "processing": true,
                "order": [],
                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                }],
            });
        }

        window.openModal = function(id_pelayanan) {
            console.log('openModal dipanggil dengan id_pelayanan:', id_pelayanan); // Debugging
            $('#tindakanModal').modal('show');
            reload_table(id_pelayanan);
        }

        window.reload_table = function(id_pelayanan) {
            // Hancurkan DataTable sebelumnya
            if ($.fn.DataTable.isDataTable('#tablefisio')) {
                $('#tablefisio').DataTable().clear().destroy();
            }

            // Inisialisasi ulang DataTable
            $('#tablefisio').DataTable({
                "pageLength": 10,
                "language": {
                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing": "Sedang memproses...",
                    "sLengthMenu": "Tampilkan _MENU_ entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "sInfoPostFix": "",
                    "sSearch": "Pencarian :",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext": " ",
                        "sLast": "Terakhir",
                    }
                },
                "ajax": {
                    "url": '<?php echo base_url('Poli/tampil_list_tindakan'); ?>',
                    "type": 'POST',
                    "data": {
                        id_pelayanan: id_pelayanan
                    },
                    "dataSrc": "data"
                },
                "deferRender": true,
                "processing": true,
                "order": [],

                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                }],
            });
        }
    });
=======
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

                                <?php
                                ?>

                                <!-- <img class="img-circle inline-block mt-40 mb-10" src="<?= base_url() ?>resources/img/userimgs/default_man.png" alt="user"/> -->
                                <h4 class="txt-light block  mb-5 capitalize-font"><?= $nama ?></h4>
                                <h5 class="txt-light block uppercase-font"><?= $no_rm ?></h5>
                                <h6 class="txt-light block uppercase-font"><?= $jenis_kelamin ?></h6>
                                <h6 class="txt-light block uppercase-font"><?= getAge($tgl_lahir); ?></h6>
                                <!-- <h6 class="txt-light block uppercase-font"><?= $tgl_lahir ?></h6> -->
                                <h6 class="txt-light block uppercase-font"><?= $cara_bayar ?></h6>
                                <h6 class="txt-light block uppercase-font pb-40"><?= $nama_dokter ?></h6>
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
                        <a href="<?php echo base_url('SEP/icare_dok/') . $id_pelayanan . '/' . $id_histori; ?>" class="btn btn-success col-md-12" style="margin: 3px" target="_blank">I-Care</a>

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
                    <button class="btn btn-success col-md-12" style="margin: 3px" id="riwayattbc" onclick="riwayattbc()">RIWAYAT TBC</button>
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
                            <!-- <div class="row hide lds-dual-ring overlay" id="loader"> -->
                            <div class="col-lg-12">
                                <div class="button-list mt-25">
                                    <div id="penunjang" style="margin-bottom: 50px; display: block;">

                                        <?php


                                        $data = $this->session->userdata('data_auth');
                                        $tipe = $data->tipe;
                                        ?>
                                        <h5 class="txt-dark capitalize-font"><i class="fa fa-medkit mr-10"></i>PENUNJANG</h5>
                                        <hr width="100%">
                                        <?php echo
                                        "<button class='btn btn-success col-md-5' onclick='edit_data_tindakan(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Tindakan Poli
                                        </button>";
                                        ?>
                                        <?php echo
                                        "<button class='btn btn-success col-md-5' onclick='edit_radiologi(\"" . $id_pelayanan . "\",\"" . $id_histori .  "\",\"" . $jenis_pelayanan . "\")'>
                                            Radiologi
                                        </button>";
                                        ?>
                                        <?php echo
                                        "<button class='btn btn-success col-md-5' onclick='edit_labor(\"" . $id_pelayanan . "\",\"" . $id_histori .  "\",\"" . $jenis_pelayanan . "\")'>
                                            Labor
                                        </button>";
                                        ?>
                                        <?php echo
                                        "<button class='btn btn-success col-md-5' onclick='edit_obat(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Obat
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
                                        "<button class='btn btn-success col-md-5' onclick='openModal(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                                        Tindakan Fisio
                                                </button>";
                                        ?>
                                        <?php if ($tipe == "kemoterapi") {
                                            echo
                                            "<button class='btn btn-success col-md-5' onclick='obat_ruang(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                                Obat Ruang
                                                </button>";
                                            $this->load->view('erm_form/Penunjang/obat_ruangan');
                                        }
                                        ?>
                                        <!-- <?php echo
                                                "<button class='btn btn-success col-md-5' onclick='edit_lain(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                            Penunjang Lainnya
                                        </button>";
                                                ?> -->

                                        <?php if ($tipe == "polibedah" || $tipe == "polibedahmulut" || $tipe == "poliorthopedi" || $tipe == "politht" || $tipe == "poliobgyne") {
                                            echo "<button class='btn btn-success col-md-5' onclick='antrian_operasi(\"" . $id_pelayanan . "\",\"" . $id_histori . "\")'>
                                                Antrian Operasi
                                                </button>";
                                            $this->load->view('erm_form/OK/antrian_operasi');
                                        }
                                        ?>
                                        <div class="clearfix"></div>

                                    </div>

                                    <h5 class="txt-dark capitalize-font"><i class="fa fa-file mr-10"></i>ERM</h5>
                                    <hr width="100%">
                                    <a class="btn btn-success col-md-5 skirining_tbc" href="<?php echo base_url('Skrining_TBC/form/')  . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Skrining TBC
                                    </a>
                                    <?php if ($tipe == "rehab") { ?>
                                        <a class="btn btn-success col-md-5 form_edu_dokter" href="<?= base_url('Form_soap_rehab/formsoap/') .  $id_pelayanan . '/' . $id_histori; ?>">
                                            SOAP Rehabmed
                                        </a>
                                    <?php }
                                    ?>
                                    <a class="btn btn-success col-md-5 asses_per_igd" href="<?php echo base_url('Erm_asesmen_awal/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Assesmen Rawat Jalan / Assesmen Awal
                                    </a>

                                    <!-- <a class="btn btn-success col-md-5 asses_per_igd" onclick="cek_skrining_tbc()">
                                        Assesmen Rawat Jalan / Assesmen Awal
                                    </a> -->

                                    <a class="btn btn-success col-md-5 asses_dokter_igd" href="<?php echo base_url('Asesmen_dokter/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Assesmen Dokter
                                    </a>


                                    <a class="btn btn-success col-md-5 resume" href="<?= base_url('Erm_resume_medis_raj/form/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Resume Medis Rajal
                                    </a>
                                    <a class="btn btn-success col-md-5 penunjang" href="<?= base_url('Erm_penunjang_diagnostik/form/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Hasil Baca Penunjang Diagnostik
                                    </a>
                                    <a class="btn btn-success col-md-5 penunjang" href="<?= base_url('Erm_resiko_jatuh/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Resiko Jatuh
                                    </a>
                                    <a class="btn btn-success col-md-5 penunjang" href="<?= base_url('Erm_lembar_anam_poliklinik/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Lembar Anamnesa
                                    </a>
                                    <!-- <a class="btn btn-success col-md-5 penunjang" href="<?= base_url('Erm_lembar_rujukan/form/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                            Lembar Rujukan
                                        </a> -->
                                    <a class="btn btn-success col-md-5 lembar_rujukan" href="<?= base_url('Erm_dpjp/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Lembar Konsul
                                    </a>
                                    <a class="btn btn-success col-md-5 penunjang" target="_blank" href="<?= base_url('Erm_prmrj/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        PRMRJ
                                    </a>
                                    <a class="btn btn-success col-md-5 penunjang" href="<?= base_url('Erm_skdp/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        SKDP
                                    </a>
                                    <a class="btn btn-success col-md-5 penunjang" href="<?= base_url('Erm_surat_rujukan_balik/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Surat Rujukan Balik
                                    </a>
                                    <a class="btn btn-success col-md-5 observasi" href="<?= base_url('Erm_observasi_transfer/form_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Form Observasi Transfer antar RS
                                    </a>

                                    <a class="btn btn-success col-md-5 per_pen_rujuk" href="<?= base_url('Erm_per_pen_rujukan/form_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Form Persetujuan Penolakan Rujukan
                                    </a>

                                    <a class="btn btn-success col-md-5 sebab_kematian" href="<?= base_url('Erm_sebab_kematian/form_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Form Sebab Kematian
                                    </a>

                                    <!-- <a class="btn btn-success col-md-5 lembar_rujukan" href="<?= base_url('Erm_igd_lembar_rujukan/form_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan ?>">
                                            Lembar Rujukan Antar DPJP
                                        </a> -->

                                    <a class="btn btn-success col-md-5 pengkhu" href="<?= base_url('Erm_peng_khu_upmar_2017/form/') .  $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Pengawasan Khusus Update Maret 2017
                                    </a>

                                    <a class="btn btn-success col-md-5 pentindok" href="<?= base_url('Erm_penolakan_tindakan_kedokteran/form_raj/') .  $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan;  ?>">
                                        Penolakan Tindakan Kedokteran
                                    </a>

                                    <a class="btn btn-success col-md-5 penundaan" href="<?= base_url('Erm_penundaan_pelayanan_pengobatan/form/') .  $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Penundaan Pelayanan Atau Pengobatan
                                    </a>

                                    <a class="btn btn-success col-md-5 pertindok" href="<?= base_url('Erm_per_tin_kedokteran/form_raj/') .  $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan;  ?>">
                                        Persetujuan Tindakan Kedokteran
                                    </a>

                                    <a class="btn btn-success col-md-5 super_ranap" href="<?= base_url('Erm_super_rawat_inap_spri/form_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Surat Perintah Rawat Inap SPRI 2020
                                    </a>

                                    <a class="btn btn-success col-md-5 intra" href="<?= base_url('Erm_transfer_intra_rs/form_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Observasi Intra RS
                                    </a>
                                    <a class="btn btn-success col-md-5 antar" href="<?= base_url('Erm_trans_pas_antar_rs/form_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Rujukan Pasien Antar Rumah Sakit
                                    </a>
                                    <a class="btn btn-success col-md-5 eval" href="<?= base_url('Erm_dpjp/eval/') . $id_pel . '/' . $id_his . '/' . $jenis_pelayanan; ?>">
                                        Lembar Evaluasi
                                    </a>
                                    <a class="btn btn-success col-md-5 tb" id="kirimDataTBC" data-id-pel="<?= $id_pel; ?>" data-no-rm="<?= $no_rm; ?>">
                                        Kirim Data TBC
                                    </a>
                                    <a class="btn btn-success col-md-5 usg_kebidanan" href="<?= base_url('Erm_usg_kebidanan/form/') . $id_pel . '/' . $id_his . '/' . $jenis_pelayanan; ?>">
                                        hasil usg kebidanan
                                    </a>

                                    <a class="btn btn-success col-md-5 tb lembar_uji_fungsi"
                                        href="<?= base_url('Lembar_uji_fungsi/form/' . $id_pelayanan . '/' . $no_rm); ?>">
                                        Lembar Uji Fungsi Setelah Rehab
                                    </a>

                                    <a class="btn btn-success col-md-5 form_assesmen_rehab"
                                        href="<?= base_url('Assesmen_Rehab/form/') . $id_pelayanan . '/' . $id_histori . '/' . $jenis_pelayanan; ?>">
                                        Assesmen Rehab
                                    </a>

                                    <a class="btn btn-success col-md-5 form_fisikrehab"
                                        href="<?php echo base_url('Form_fisikrehab/form/') . $id_pel . '/' . $id_his . '/' . $jenis_pelayanan; ?>">
                                        Formulir Layanan Rehabilitasi Medik
                                    </a>
                                    <a class="btn btn-success col-md-5 hd_harian" href="<?php echo base_url('Pemantauan_pelaksanaan_hemodialis_harian/form/')  . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                        Pemantauan Pelaksanaan Hemodialisis
                                    </a>

                                    <a class="btn btn-success col-md-5 intradialitik" href="<?= base_url('Erm_pemantauan_intradialitik/form/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>">
                                        Pemantauan Intradialitik
                                    </a>

                                    <a class="btn btn-success col-md-5 form_ekg"
                                        href="<?= base_url('Erm_form_ekg/form/') . $id_pelayanan . '/' . $id_histori . '/' . $jenis_pelayanan; ?>">
                                        Form EKG
                                    </a>

                                    <?php if ($tipe == 'polimata') { ?>
                                        <a class="btn btn-success col-md-5 laporan_tin_operasi" href="<?= base_url('Erm_laporan_tin_operasi/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>">
                                            Laporan Tindakan Operasi
                                        </a>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="row pull-right">
                                <button class="btn btn-default btn-anim" onclick="window.location.href='javascript:history.go(-1)';" type="submit" style="margin-right: 40px; margin-top:40px;padding: 10px 24px;" id="simpanKunjungan"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></button>
                                <?php if ($simpan == 0) { ?>
                                    <button class="btn btn-primary btn-anim" onclick="simpan()" type="submit" style="margin-right: 100px; margin-top:40px" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN ERM</span></button>
                                <?php } ?>
                            </div>
                            <!-- </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tindakanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tindakan Fisio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-10">
                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN</h6>
                <hr width="95%">
                <div class="table-wrap" style="width: 95%; margin: auto">
                    <div class="table-responsive">
                        <table class="table table-hover display pb-60" id="tablefisio">
                            <thead>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>BIAYA TINDAKAN</th>
                                    <th>STATUS</th>
                                    <th>STAFF REQUEST</th>
                                </tr>
                            </thead>
                            <tbody style="color: black"></tbody>
                            <tfoot>
                                <tr class="bg-success">
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL TINDAKAN</th>
                                    <th>JUMLAH TINDAKAN</th>
                                    <th>BIAYA TINDAKAN</th>
                                    <th>STATUS</th>
                                    <th>STAFF REQUEST</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// $cara_bayar = $this->db->get_where('pelayanan',['id_pelayanan'=>$id_pelayanan])->row()->cara_bayar;
$this->load->view('erm_form/Poli/view_penunjang') ?>
<?php $this->load->view('erm_form/Penunjang/pelayanan_tambahan') ?>
<?php $this->load->view('erm_form/Penunjang/tindakan_kia') ?>
<?php $this->load->view('erm_form/Penunjang/penunjang_lain') ?>
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
            url: "<?php echo base_url() ?>Erm_poli/checkData",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_histori
            },
            success: function(data) {
                if (data.super_ranap == "found") {
                    $('.super_ranap').removeClass('btn-success').addClass('btn-danger ');
                    $('.super_ranap').attr('href', '<?php echo base_url('Erm_super_rawat_inap_spri/edit_super_ranap_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>');
                }
                if (data.skrining_tbc == "found") {
                    $('.skirining_tbc').removeClass('btn-success').addClass('btn-danger');
                }
                if (data.asses_per_igd == "found") {
                    $('.asses_per_igd').removeClass('btn-success').addClass('btn-danger ');
                    $('.asses_per_igd').attr('href', '<?php echo base_url('Erm_asesmen_awal/edit_asses_perawat_igd/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>');
                }
                if (data.asses_dokter_igd == "found") {
                    $('.asses_dokter_igd').removeClass('btn-success').addClass('btn-danger ');
                    $('.asses_dokter_igd').attr('href', '<?php echo base_url('Asesmen_dokter/edit_asses_dok_igd/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>');
                }
                if (data.observasi == "found") {
                    $('.observasi').removeClass('btn-success').addClass('btn-danger ');
                    $('.observasi').attr('href', '<?php echo base_url('Erm_observasi_transfer/edit_obserfasi_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>');
                }
                if (data.sebab_kematian == "found") {
                    $('.sebab_kematian').removeClass('btn-success').addClass('btn-danger ');
                    $('.sebab_kematian').attr('href', '<?php echo base_url('erm_sebab_kematian/edit_sebab_kematian_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>');
                }
                if (data.lembar_rujukan == "found") {
                    $('.lembar_rujukan').removeClass('btn-success').addClass('btn-danger ');
                }
                if (data.eval == "found") {
                    $('.eval').removeClass('btn-success').addClass('btn-danger ');
                    $('.eval').attr('href', '<?php echo base_url('Erm_dpjp/edit_eval/') . $id_pelayanan . '/' . $id_histori . '/' . $jenis_pelayanan; ?>');
                }
                if (data.assesmen_rehab == "found") {
                    $('.form_assesmen_rehab')
                        .removeClass('btn-success')
                        .addClass('btn-danger')
                        .attr('href', '<?php echo base_url('Assesmen_Rehab/form_edit/') . $id_pelayanan . '/' . $id_histori . '/' . $jenis_pelayanan; ?>');
                }

                if (data.penundaan == "found") {
                    $('.penundaan').removeClass('btn-success').addClass('btn-danger ');
                    $('.penundaan').attr('href', '<?php echo base_url('Erm_penundaan_pelayanan_pengobatan/edit_penundaan/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>');
                }
                if (data.antar == "found") {
                    $('.antar').removeClass('btn-success').addClass('btn-danger ');
                    $('.antar').attr('href', '<?php echo base_url('Erm_trans_pas_antar_rs/edit_antar_raj/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>');
                }
                if (data.intra == "found") {
                    $('.intra').removeClass('btn-success').addClass('btn-danger ');
                    $('.intra').attr('href', '<?php echo base_url('Erm_transfer_intra_rs/edit_intra/') . $id_pelayanan .  '/' . $id_histori .  '/' . $jenis_pelayanan; ?>');
                }


                if (data.hasil_usg_kebidanan == "found") {
                    $('.usg_kebidanan').removeClass('btn-success').addClass('btn-danger ');
                }

                if (data.form_fisikrehab === "found") {
                    $('.form_fisikrehab').removeClass('btn-success').addClass('btn-danger');
                    // kalau nanti kamu punya route edit khusus, bisa sekalian ganti href di sini
                    // $('.form_fisikrehab').attr('href', '<?= base_url('Form_fisikrehab/edit/') ?>' + <?= $id_pelayanan ?> + '/<?= $id_histori ?>');
                }
                if (data.laporan_tin_operasi == "found") {
                    $('.laporan_tin_operasi').removeClass('btn-success').addClass('btn-danger ');
                    $('.laporan_tin_operasi').attr('href', '<?php echo base_url('Erm_laporan_tin_operasi/edit_laporan/') . $id_pelayanan .  '/' . $id_histori; ?>');
                }
                if (data.lembar_uji_fungsi == "found") {
                    $('.lembar_uji_fungsi').removeClass('btn-success').addClass('btn-danger ');

                }

                if (data.intradialitik == "found") {
                    $('.intradialitik').removeClass('btn-success').addClass('btn-danger ');
                }

                if (data.hd_harian == "found") {
                    $('.hd_harian').removeClass('btn-success').addClass('btn-danger ');
                }
                if (data.laporan_tin_operasi == "found") {
                    $('.laporan_tin_operasi').removeClass('btn-success').addClass('btn-danger ');
                    $('.laporan_tin_operasi').attr('href', '<?php echo base_url('Erm_laporan_tin_operasi/edit_laporan/') . $id_pelayanan .  '/' . $id_histori; ?>');
                }
                if (data.form_ekg == "found") {
                    $('.form_ekg')
                        .removeClass('btn-success')
                        .addClass('btn-danger')
                        .attr('href', '<?php echo base_url('Erm_form_ekg/form_edit/') . $id_pelayanan . '/' . $id_histori . '/' . $jenis_pelayanan; ?>');
                }

                $('#loader').removeClass('hide')
            }
        });
        return false;
    });
    // $(document).ready(function() {
    //     //     id_pelayanan = $('#inPel').val();
    //     //     id_history = $('#inHis').val();
    //     //     $.ajax({
    //     //         url: "</?php echo base_url() ?>Erm_igd/checkKasir",
    //     //         method: "POST",
    //     //         dataType: 'json',
    //     //         data: {
    //     //             id_pelayanan: id_pelayanan,
    //     //             id_history: id_history
    //     //         },
    //     //         success: function(data) {
    //     //             if (data.status == 'found') {
    //     $('#penunjang').show();
    //     //             } else {
    //     //                 $('#penunjang').hide();
    //     //             }

    //     //         }
    //     //     });
    //     //     return false;
    // });
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

    function riwayattbc() {
        $('#slide').html(''); // Mengosongkan elemen '#slide'
        no_pel = $('#inPel').val();
        $.ajax({
            url: "<?php echo base_url() ?>Erm_igd/getTBC",
            method: "POST",
            dataType: 'json',
            data: {
                id: no_pel
            },
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html +=
                        '<a href="javascript:void(0)" class="list-group-item">' +
                        '<strong>' + data[i].nama + '</strong> <br>' +
                        '<span class="inline-block font-12 mb-5"><p><strong>tanggal dinyatakan:</strong>' + data[i].tgl_dinyatakan + '</p> </span>' +
                        '<div class="clearfix"></div> ' +
                        '<p><strong> Jenis Kelamin:</strong> ' + data[i].jenis_kelamin + ' </p>' +
                        '<p><strong> Hasil Skrining TBC: </strong> ' + data[i].keterangan + ' </p> </a>';
                }
                $('#slide').html(html);
            }
        });
    }

    $(document).ready(function() {
        $('#kirimDataTBC').on('click', function(e) {
            e.preventDefault(); // Mencegah redirect default

            // Ambil data dari atribut tombol
            var id_pel = $(this).data('id-pel');
            var no_rm = $(this).data('no-rm');

            $.ajax({
                url: "<?= base_url('ihs_api/collect_data/'); ?>" + id_pel + '/' + no_rm,
                method: "POST", // Atau "POST" jika function collect_data menggunakan metode POST
                dataType: "json",
                success: function(response) {
                    if (response.status == true) {
                        // Jika sukses, tampilkan pesan sukses
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data Berhasil disimpan",
                            confirmButtonColor: "#3cb878",
                        });
                    } else if (response.status == false) {
                        // Tampilkan pesan error jika gagal
                        swal({
                            title: "Gagal!",
                            type: "warning",
                            text: response.message,
                            confirmButtonColor: "#3cb878",
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Tampilkan error dari server jika ada
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil disimpan",
                        confirmButtonColor: "#3cb878",
                    });
                }
            });
        });
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
                    window.location.href = "<?php echo base_url('Erm_asesmen_awal/form/') . $id_pel .  '/' . $id_his .  '/' . $jenis_pelayanan; ?>";
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



    // Trigger the function when the button is clicked
    $(document).ready(function() {
        $('#riwayattbc').on('click', function() {
            riwayattbc();
        });
    });

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
                            '<p> Diagnosa: ' + data.erm[i].kode + ' - ' + data.erm[i].nama_diagnosa + ' </p>' +
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
            // url: "<?php echo base_url() ?>satusehat/Bundle_encounter/create_encounter",
            url: "<?php echo base_url() ?>Erm_poli/simpan_erm",
            method: "POST",
            dataType: 'json',
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history,
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

    $(document).ready(function() {
        // Inisialisasi DataTable saat dokumen siap
        // initializeDataTable();

        function initializeDataTable() {
            $('#tablefisio').DataTable({
                "language": {
                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing": "Sedang memproses...",
                    "sLengthMenu": "Tampilkan _MENU_ entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "sInfoPostFix": "",
                    "sSearch": "Pencarian :",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext": "Selanjutnya",
                        "sLast": "Terakhir"
                    },
                },
                "ajax": '<?php echo base_url('Poli/tampil_pasien'); ?>',
                "deferRender": true,
                "processing": true,
                "order": [],
                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                }],
            });
        }

        window.openModal = function(id_pelayanan) {
            console.log('openModal dipanggil dengan id_pelayanan:', id_pelayanan); // Debugging
            $('#tindakanModal').modal('show');
            reload_table(id_pelayanan);
        }

        window.reload_table = function(id_pelayanan) {
            // Hancurkan DataTable sebelumnya
            if ($.fn.DataTable.isDataTable('#tablefisio')) {
                $('#tablefisio').DataTable().clear().destroy();
            }

            // Inisialisasi ulang DataTable
            $('#tablefisio').DataTable({
                "pageLength": 10,
                "language": {
                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing": "Sedang memproses...",
                    "sLengthMenu": "Tampilkan _MENU_ entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "sInfoPostFix": "",
                    "sSearch": "Pencarian :",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext": " ",
                        "sLast": "Terakhir",
                    }
                },
                "ajax": {
                    "url": '<?php echo base_url('Poli/tampil_list_tindakan'); ?>',
                    "type": 'POST',
                    "data": {
                        id_pelayanan: id_pelayanan
                    },
                    "dataSrc": "data"
                },
                "deferRender": true,
                "processing": true,
                "order": [],

                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                }],
            });
        }
    });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>