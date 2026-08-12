<<<<<<< HEAD
<style type="text/css">
    .table1 {
        color: #232323;
        border-collapse: collapse;
        border: 1px solid;

    }


    .garisbawah {
        border-bottom: 1px solid;
    }

    .gariskanan {
        border-right: 1px solid;
    }

    .box {
        border-bottom: 1px solid;
        width: 1px;
        height: 1px;

    }


    .block,

    li {
        border: 1px solid black;
        padding: .1em;
        width: 29px;
    }

    .block {
        display: block;
    }

    span,
    ul {
        border: 1px solid black;
        padding: .1em;
        width: 50px;

    }


    ul {
        display: inline-flex;
        list-style: none;
        padding: 0;
    }

    .inline {
        display: inline;
    }

    h5 {
        margin-bottom: 0;
        margin-top: 0;
    }
</style>

<div class="content">
    <table width=100% cellspacing=0>
        <tr>
            <td>
                <table class="a" style="width: 100%">
                    <tr>
                        <td style="width: 25%">
                            <img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" style="width: 150px;">
                        </td>
                        <td>
                            <p>
                                <font size=2.5><b>RUMAH SAKIT BAKTI TIMAH</b>
                            </p>
                            <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                            <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                            <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                            </font>
                        </td>

                    </tr>
                </table>
                <h3 style="margin-top:-10px; text-align: center;">
                    <b><u>
                            <br>
                            <br>
                            SURAT KETERANGAN PEMERIKSAAN FISIK
                    </b></u>
                </h3>
            </td>
        </tr>
        <tr>
            <td>
                <table cellspacing=0>
                    <tr height=10px>
                        <td width=200px colspan=2>
                            Yang bertanda tangan dibawah ini, Dokter Rumah Sakit Bakti Timah, dengan ini menerangkan
                            bahwa :
                        </td>
                    </tr>
                    <tr height=10px>
                        <td width=265px>
                            Nama Lengkap
                        </td>
                        <td>: <?php echo $nama_pasien; ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            NIK/NPP
                        </td>
                        <td>: <?php echo $nik_npp; ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            Tempat / Tgl. Lahir
                        </td>
                        <td>: <?php echo $tempat_lahir . ' / ' . indo_date2($tgl_lahir); ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            Jenis Kelamin
                        </td>
                        <td>: <?php echo $sex; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            Alamat
                        </td>
                        <td>: <?php echo $alamat; ?></td>
                    </tr>


                    <tr height=20px>
                        <td colspan=2>
                            <br>
                            <br>
                            Telah melakukan pemeriksaan fisik kepada pasien tersebut dengan hasil :
                            <br><br>
                            Demikianlah surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
                            <br>
                        </td>
                    </tr>
                </table>
                <hr style="margin: 0;">
            </td>
        </tr>

        <table cellpadding="0">
            <tbody>
                <tr class="txt-dark" width="30%">
                    <td>
                        <b>A. U M U M :</b>
                    </td>
                </tr>
            </tbody>
            <tr height="10px">
                <td>
                <hr style="margin: 0;">
                    Kesan Umum
                </td>
                <td>: <?php echo $kesan_umum; ?></td>
                <td></td>
                <td>Pernapasan</td>
                <td>: <?php echo $pernapasan; ?> x/menit</td>
            </tr>

            <tr height=10px>
                <td>
                    Berat Badan
                </td>
                <td>: <?php echo $berat_badan; ?> kg</td>
                <td></td>
                <td>
                    Tinggi Badan
                </td>
                <td>: <?php echo $tinggi_badan; ?> cm</td>
            </tr>
            <tr height=10px>
                <td>
                    Tekanan Darah
                </td>
                <td>: <?php echo $tekanan_darah; ?> MmHg</td>
                <td></td>
                <td>
                    Nadi
                </td>
                <td>: <?php echo $nadi; ?> x/menit</td>
                <td></td>
            </tr>
            <tr height=10px>
                <td>
                    Golongan Darah
                </td>
                <td>: <?php echo $golongan_darah; ?></td>
                <td></td>
                <td>
                    IMT
                </td>
                <td>: <?php echo $imt; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Kulit
                </td>
                <td>: <?php echo $kulit; ?></td>
            </tr>

            <tr class="txt-dark" width="30%">
                <td>
                    <br>
                    <b>B. L E H E R : </b>
                </td>
            </tr>
            <tr height=10px>
                <td width=265px>
                    <hr style="margin: 0;">
                    Struma
                </td>
                <td>: <?php echo $struma; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Lain : lain
                </td>
                <td>: <?php echo $lain_struma; ?></td>
            </tr>

            <tr class="txt-dark" width="30%">
                <td>
                    <br>
                    <b>C. T H O R A K : </b>
                </td>
            <tr height=10px>
                <td width=265px>
                    <hr style="margin: 0;">
                    <h5>JANTUNG</h5>
                </td>
                <td></td>
                <br>
            <tr height=10px>
                <td>
                    Batas - batas
                </td>
                <td>: <?php echo $batas_jantung; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Auscultasi
                </td>
                <td>: <?php echo $auscultasi_jantung; ?></td>
            </tr>
            <tr height=10px>
                <td width=265px>
                    <h5>PARU - PARU</h5>
                </td>
                <td></td>

            <tr height=10px>
                <td>
                    Kapasitas Vital
                </td>
                <td>: <?php echo $kapasitas_paru; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Auscultasi
                </td>
                <td>: <?php echo $auscultasi_paru; ?></td>
            </tr>

            <tr class="txt-dark" width="30%">
                <td>
                    <br>
                    <b>D. A B D O M E N : </b>
                </td>
            <tr height=10px>
                <td width=265px>
                    <hr style="margin: 0;">
                    Heper
                </td>
                <td>: <?php echo $heper_abdomen; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Limpa
                </td>
                <td>: <?php echo $limpa_abdomen; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Hernia
                </td>
                <td>: <?php echo $hernia_abdomen; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Tumor
                </td>
                <td>: <?php echo $tumor_abdomen; ?></td>
            </tr>

            <tr class="txt-dark" width="30%">
                <td>
                    <br><br><br>
                    <b>E. GENETALIA & ANORECTAL : </b>
                </td>
            <tr height=10px>
                <td width=265px>
                    <hr style="margin: 0;">
                    Hernia
                </td>
                <td>: <?php echo $hernia_ga; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Haemorhoid
                </td>
                <td>: <?php echo $haemorhoid_ga; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Spincer Ani
                </td>
                <td>: <?php echo $spincerani_ga; ?></td>
            </tr>
            <tr height=10px>
                <td width=265px>
                    <h5>GENETALIA LELAKI</h5>
                </td>
                <td></td>
            <tr height=10px>
                <td>
                    Epidermis/Testis/Prostat
                </td>
                <td>: <?php echo $etp_ga; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Urethra Discharge
                </td>
                <td>: <?php echo $urethra_ga; ?></td>
            </tr>
            <tr height=10px>
                <td width=265px>
                    <h5>GENETALIA WANITA</h5>
                </td>
                <td></td>

            <tr height=10px>
                <td>
                    Flour Albus
                </td>
                <td>: <?php echo $flour_ga; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Fluxus
                </td>
                <td>: <?php echo $fluxus_ga; ?></td>
            </tr>

            <tr class="txt-dark" width="30%">
                <td>
                    <br>
                    <b>F. ANGGOTA GERAK : </b>
                </td>
            <tr height=10px>
                <td width=265px>
                    <hr style="margin: 0;">
                    Atas Kanan/Kiri
                </td>
                <td>: <?php echo $akk_ag; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Bawah Kanan/Kiri
                </td>
                <td>: <?php echo $bkk_ag; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Oedeem
                </td>
                <td>: <?php echo $oedeem_ag; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Cacat - cacat
                </td>
                <td>: <?php echo $cacat_ag; ?></td>
            </tr>

            <tr class="txt-dark" width="30%">
                <td>
                    <br>
                    <b>G. REFLEK REFLEK : </b>
                </td>
            <tr height=10px>
                <td width=265px>
                    <hr style="margin: 0;">
                    Pupil
                </td>
                <td>: <?php echo $pupil_rr; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Patella
                </td>
                <td>: <?php echo $patella_rr; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Achilles
                </td>
                <td>: <?php echo $archilles_rr; ?></td>
            </tr>
            </tbody>
        </table>
        </tr>
    </table>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <center>
        <h4>K E S I M P U L A N :</h4>
    </center>
    <hr>
    <table>
        <tbody>
            <td width=265px>
                Pemeriksaan Fisik
            </td>
            <td>: <?php echo $p_fisik; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Dokter Mata
                </td>
                <td>: <?php echo $p_dokter_mata; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Buta Warna
                </td>
                <td>: <?php echo $p_buta_warna; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Funduscopy
                </td>
                <td>: <?php echo $p_fundus; ?></td>
            <tr height=10px>
                <td>
                    Pemeriksaan Tonometry
                </td>
                <td>: <?php echo $p_tonomet; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Audiometri
                </td>
                <td>: <?php echo $p_audio; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Spirometri
                </td>
                <td>: <?php echo $p_spiro; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan EKG
                </td>
                <td>: <?php echo $p_ekg; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Treadmill
                </td>
                <td>: <?php echo $p_treadmill; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Rontgen (Thorax)
                </td>
                <td>: <?php echo $p_rontgen; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Laboratorium
                </td>
                <td>: <?php echo $p_labor; ?></td>
            </tr>
            <!-- <tr height=10px>
                <td>
                    Lain - Lain
                </td>
                <td>: <?php echo $kes_lain; ?></td>
            </tr> -->
            <tr height=10px>
                <td>
                    <!-- <br><br><br><br><br><br><br><br><br><br><br><br> -->
                    <b><br><br>KESIMPULAN UMUM </b>
                </td>
                <td><br>: <?php echo $kesimpulan_umum; ?></td>
            </tr>
            <tr height=2px>
                <td>
                    SARAN
                </td>
                <td>: <?php echo $saran; ?></td>
            </tr>
        </tbody>
    </table>

    <table style="float: right; margin-right:40px" cellpading="5">
        <tbody>
            <tr height=50px></tr>
            <tr class="txt-dark" width="30%">
                <td></td>
                <td width="350px"></td>
                <td><br><br><br><br><br><br><br><br><br><br><br>Pangkal Pinang, <?= indo_date2($tgl) ?> </td>
            </tr>
            <tr class="txt-dark" width="30%">
                <td></td>
                <td></td>
                <td>Dokter yang memeriksa, </td>
            </tr>
            <tr height=110px></tr>
            <tr class="txt-dark" width="30%">
                <td></td>
                <td></td>
                <td>(__________________)</td>
            </tr>
    </table>





</div>
<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    window.onafterprint = function (e) {
        closePrintView();
    };

    function closePrintView() {
        window.location.href = 'javascript:history.go(-1)';
    }
=======
<style type="text/css">
    .table1 {
        color: #232323;
        border-collapse: collapse;
        border: 1px solid;

    }


    .garisbawah {
        border-bottom: 1px solid;
    }

    .gariskanan {
        border-right: 1px solid;
    }

    .box {
        border-bottom: 1px solid;
        width: 1px;
        height: 1px;

    }


    .block,

    li {
        border: 1px solid black;
        padding: .1em;
        width: 29px;
    }

    .block {
        display: block;
    }

    span,
    ul {
        border: 1px solid black;
        padding: .1em;
        width: 50px;

    }


    ul {
        display: inline-flex;
        list-style: none;
        padding: 0;
    }

    .inline {
        display: inline;
    }

    h5 {
        margin-bottom: 0;
        margin-top: 0;
    }
</style>

<div class="content">
    <table width=100% cellspacing=0>
        <tr>
            <td>
                <table class="a" style="width: 100%">
                    <tr>
                        <td style="width: 25%">
                            <img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" style="width: 150px;">
                        </td>
                        <td>
                            <p>
                                <font size=2.5><b>RUMAH SAKIT BAKTI TIMAH</b>
                            </p>
                            <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                            <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                            <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                            </font>
                        </td>

                    </tr>
                </table>
                <h3 style="margin-top:-10px; text-align: center;">
                    <b><u>
                            <br>
                            <br>
                            SURAT KETERANGAN PEMERIKSAAN FISIK
                    </b></u>
                </h3>
            </td>
        </tr>
        <tr>
            <td>
                <table cellspacing=0>
                    <tr height=10px>
                        <td width=200px colspan=2>
                            Yang bertanda tangan dibawah ini, Dokter Rumah Sakit Bakti Timah, dengan ini menerangkan
                            bahwa :
                        </td>
                    </tr>
                    <tr height=10px>
                        <td width=265px>
                            Nama Lengkap
                        </td>
                        <td>: <?php echo $nama_pasien; ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            NIK/NPP
                        </td>
                        <td>: <?php echo $nik_npp; ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            Tempat / Tgl. Lahir
                        </td>
                        <td>: <?php echo $tempat_lahir . ' / ' . indo_date2($tgl_lahir); ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            Jenis Kelamin
                        </td>
                        <td>: <?php echo $sex; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            Alamat
                        </td>
                        <td>: <?php echo $alamat; ?></td>
                    </tr>


                    <tr height=20px>
                        <td colspan=2>
                            <br>
                            <br>
                            Telah melakukan pemeriksaan fisik kepada pasien tersebut dengan hasil :
                            <br><br>
                            Demikianlah surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
                            <br>
                        </td>
                    </tr>
                </table>
                <hr style="margin: 0;">
            </td>
        </tr>

        <table cellpadding="0">
            <tbody>
                <tr class="txt-dark" width="30%">
                    <td>
                        <b>A. U M U M :</b>
                    </td>
                </tr>
            </tbody>
            <tr height="10px">
                <td>
                <hr style="margin: 0;">
                    Kesan Umum
                </td>
                <td>: <?php echo $kesan_umum; ?></td>
                <td></td>
                <td>Pernapasan</td>
                <td>: <?php echo $pernapasan; ?> x/menit</td>
            </tr>

            <tr height=10px>
                <td>
                    Berat Badan
                </td>
                <td>: <?php echo $berat_badan; ?> kg</td>
                <td></td>
                <td>
                    Tinggi Badan
                </td>
                <td>: <?php echo $tinggi_badan; ?> cm</td>
            </tr>
            <tr height=10px>
                <td>
                    Tekanan Darah
                </td>
                <td>: <?php echo $tekanan_darah; ?> MmHg</td>
                <td></td>
                <td>
                    Nadi
                </td>
                <td>: <?php echo $nadi; ?> x/menit</td>
                <td></td>
            </tr>
            <tr height=10px>
                <td>
                    Golongan Darah
                </td>
                <td>: <?php echo $golongan_darah; ?></td>
                <td></td>
                <td>
                    IMT
                </td>
                <td>: <?php echo $imt; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Kulit
                </td>
                <td>: <?php echo $kulit; ?></td>
            </tr>

            <tr class="txt-dark" width="30%">
                <td>
                    <br>
                    <b>B. L E H E R : </b>
                </td>
            </tr>
            <tr height=10px>
                <td width=265px>
                    <hr style="margin: 0;">
                    Struma
                </td>
                <td>: <?php echo $struma; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Lain : lain
                </td>
                <td>: <?php echo $lain_struma; ?></td>
            </tr>

            <tr class="txt-dark" width="30%">
                <td>
                    <br>
                    <b>C. T H O R A K : </b>
                </td>
            <tr height=10px>
                <td width=265px>
                    <hr style="margin: 0;">
                    <h5>JANTUNG</h5>
                </td>
                <td></td>
                <br>
            <tr height=10px>
                <td>
                    Batas - batas
                </td>
                <td>: <?php echo $batas_jantung; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Auscultasi
                </td>
                <td>: <?php echo $auscultasi_jantung; ?></td>
            </tr>
            <tr height=10px>
                <td width=265px>
                    <h5>PARU - PARU</h5>
                </td>
                <td></td>

            <tr height=10px>
                <td>
                    Kapasitas Vital
                </td>
                <td>: <?php echo $kapasitas_paru; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Auscultasi
                </td>
                <td>: <?php echo $auscultasi_paru; ?></td>
            </tr>

            <tr class="txt-dark" width="30%">
                <td>
                    <br>
                    <b>D. A B D O M E N : </b>
                </td>
            <tr height=10px>
                <td width=265px>
                    <hr style="margin: 0;">
                    Heper
                </td>
                <td>: <?php echo $heper_abdomen; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Limpa
                </td>
                <td>: <?php echo $limpa_abdomen; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Hernia
                </td>
                <td>: <?php echo $hernia_abdomen; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Tumor
                </td>
                <td>: <?php echo $tumor_abdomen; ?></td>
            </tr>

            <tr class="txt-dark" width="30%">
                <td>
                    <br><br><br>
                    <b>E. GENETALIA & ANORECTAL : </b>
                </td>
            <tr height=10px>
                <td width=265px>
                    <hr style="margin: 0;">
                    Hernia
                </td>
                <td>: <?php echo $hernia_ga; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Haemorhoid
                </td>
                <td>: <?php echo $haemorhoid_ga; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Spincer Ani
                </td>
                <td>: <?php echo $spincerani_ga; ?></td>
            </tr>
            <tr height=10px>
                <td width=265px>
                    <h5>GENETALIA LELAKI</h5>
                </td>
                <td></td>
            <tr height=10px>
                <td>
                    Epidermis/Testis/Prostat
                </td>
                <td>: <?php echo $etp_ga; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Urethra Discharge
                </td>
                <td>: <?php echo $urethra_ga; ?></td>
            </tr>
            <tr height=10px>
                <td width=265px>
                    <h5>GENETALIA WANITA</h5>
                </td>
                <td></td>

            <tr height=10px>
                <td>
                    Flour Albus
                </td>
                <td>: <?php echo $flour_ga; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Fluxus
                </td>
                <td>: <?php echo $fluxus_ga; ?></td>
            </tr>

            <tr class="txt-dark" width="30%">
                <td>
                    <br>
                    <b>F. ANGGOTA GERAK : </b>
                </td>
            <tr height=10px>
                <td width=265px>
                    <hr style="margin: 0;">
                    Atas Kanan/Kiri
                </td>
                <td>: <?php echo $akk_ag; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Bawah Kanan/Kiri
                </td>
                <td>: <?php echo $bkk_ag; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Oedeem
                </td>
                <td>: <?php echo $oedeem_ag; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Cacat - cacat
                </td>
                <td>: <?php echo $cacat_ag; ?></td>
            </tr>

            <tr class="txt-dark" width="30%">
                <td>
                    <br>
                    <b>G. REFLEK REFLEK : </b>
                </td>
            <tr height=10px>
                <td width=265px>
                    <hr style="margin: 0;">
                    Pupil
                </td>
                <td>: <?php echo $pupil_rr; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Patella
                </td>
                <td>: <?php echo $patella_rr; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Achilles
                </td>
                <td>: <?php echo $archilles_rr; ?></td>
            </tr>
            </tbody>
        </table>
        </tr>
    </table>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <center>
        <h4>K E S I M P U L A N :</h4>
    </center>
    <hr>
    <table>
        <tbody>
            <td width=265px>
                Pemeriksaan Fisik
            </td>
            <td>: <?php echo $p_fisik; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Dokter Mata
                </td>
                <td>: <?php echo $p_dokter_mata; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Buta Warna
                </td>
                <td>: <?php echo $p_buta_warna; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Funduscopy
                </td>
                <td>: <?php echo $p_fundus; ?></td>
            <tr height=10px>
                <td>
                    Pemeriksaan Tonometry
                </td>
                <td>: <?php echo $p_tonomet; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Audiometri
                </td>
                <td>: <?php echo $p_audio; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Spirometri
                </td>
                <td>: <?php echo $p_spiro; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan EKG
                </td>
                <td>: <?php echo $p_ekg; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Treadmill
                </td>
                <td>: <?php echo $p_treadmill; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Rontgen (Thorax)
                </td>
                <td>: <?php echo $p_rontgen; ?></td>
            </tr>
            <tr height=10px>
                <td>
                    Pemeriksaan Laboratorium
                </td>
                <td>: <?php echo $p_labor; ?></td>
            </tr>
            <!-- <tr height=10px>
                <td>
                    Lain - Lain
                </td>
                <td>: <?php echo $kes_lain; ?></td>
            </tr> -->
            <tr height=10px>
                <td>
                    <!-- <br><br><br><br><br><br><br><br><br><br><br><br> -->
                    <b><br><br>KESIMPULAN UMUM </b>
                </td>
                <td><br>: <?php echo $kesimpulan_umum; ?></td>
            </tr>
            <tr height=2px>
                <td>
                    SARAN
                </td>
                <td>: <?php echo $saran; ?></td>
            </tr>
        </tbody>
    </table>

    <table style="float: right; margin-right:40px" cellpading="5">
        <tbody>
            <tr height=50px></tr>
            <tr class="txt-dark" width="30%">
                <td></td>
                <td width="350px"></td>
                <td><br><br><br><br><br><br><br><br><br><br><br>Pangkal Pinang, <?= indo_date2($tgl) ?> </td>
            </tr>
            <tr class="txt-dark" width="30%">
                <td></td>
                <td></td>
                <td>Dokter yang memeriksa, </td>
            </tr>
            <tr height=110px></tr>
            <tr class="txt-dark" width="30%">
                <td></td>
                <td></td>
                <td>(__________________)</td>
            </tr>
    </table>





</div>
<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    window.onafterprint = function (e) {
        closePrintView();
    };

    function closePrintView() {
        window.location.href = 'javascript:history.go(-1)';
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>