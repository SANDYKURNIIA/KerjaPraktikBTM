<!DOCTYPE html>
<html>

<head>
    <title>Print out <?= $page_title ?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
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
        .gariskiri {
            border-left: 1px solid;
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

        hr {
            border: 1px solid black;
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
    </style>
</head>

<body>
    <div class="content">
        <table class="a" style="width: 100%">
            <tr>
                <td>
                    <img src="<?= base_url() ?>resources/img/rsbt_logo.jpg" style="width: 80px;">
                </td>
                <td>
                <p><b>RS. Bakti Timah</b></p>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
                <td>
                    <p style="margin-left:-9em">NRM : <?= $data['no_rm'] ?></p>
                    <p style="margin-left:-9em">Nama :<?= $data['pasien'] ?></p>
                    <p style="margin-left:-9em">Jenis Kelamin :<?= $data['jenis_kelamin'] ?></p>
                    <p style="margin-left:-9em">Tanggal Lahir :<?= strftime('%d %B %Y', strtotime($data['tgl_lahir'])) ?></p>
                    <p style="margin-left:-9em">(Mohon diisi stiker jika ada)</p>

                </td>
            </tr>
        </table>

        <center><b>FORMULIR PERSETUJUAN TINDAKAN KEDOKTERAN</b></center>
        <hr>
        <!--Atas-->
        
        <!--Akhir Atas-->

        <!--table baru 1-->

        <table width=100% class="table1" cellspacing=0>
        <tr>
                <td class="gariskanan garisbawah" colspan=2>Dokter Pelaksana Tindakan</td>
                <td class=garisbawah  colspan="2"><?= $data['dpjp'] ?></td>
            </tr>

            <tr>
                <td class="gariskanan garisbawah" colspan=2 >Pemberi Informasi</td>
                <td class=garisbawah  colspan="2"><?= $data['pemberi_info'] ?></td>

            </tr>

            <tr>
                <td class="gariskanan garisbawah" colspan=2 >Penerima Informasi / Pemberi Persetujuan*</td>
                <td class=garisbawah  colspan="2"><?= $data['penerima_info'] ?></td>

            </tr>
            <tr height="40" class=garisbawah align="center">
                <td class=gariskanan><b>No</b></td>
                <td class=gariskanan><b>Jenis Informasi</b></td>
                <td width="290" class=gariskanan><b>Isi Informasi</b></td>
                <td width="150" class=gariskanan><b>Tandai (√)</b></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>1</td>
                <td class=gariskanan>Diagnosis (WD & DD)</td>
                <td width="290" class=gariskanan><?= $data['diagnosis'] ?></td>
                <td width="150" class=gariskanan><?php if ($data['td_diagnosis'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>2</td>
                <td class=gariskanan>Dasar Diagnosis</td>
                <td width="290" class=gariskanan><?= $data['diagnosis_d'] ?></td>
                <td width="150" class=gariskanan><?php if ($data['td_diagnosis_d'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>3</td>
                <td class=gariskanan>Tindakan Kedokteran</td>
                <td width="290" class=gariskanan><?= $data['tindakan'] ?></td>
                <td width="150" class=gariskanan><?php if ($data['td_tindakan'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>4</td>
                <td class=gariskanan>Indikasi Tindakan</td>
                <td width="290" class=gariskanan><?= $data['indikasi'] ?></td>
                <td width="150" class=gariskanan><?php if ($data['td_indikasi'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>5</td>
                <td class=gariskanan>
                    Tata Cara : <br>
                    &nbsp; &nbsp; &nbsp;<i>Tipe sedasi/anesthesia<i><br>
                            &nbsp; &nbsp; &nbsp;uraian singkat prosedur dan <br>
                            &nbsp; &nbsp; &nbsp;tahapan yang penting.
                </td>
                <td width="290" class=gariskanan><?= $data['tatacara'] ?></td>
                <td width="150" class=gariskanan><?php if ($data['td_tujuan'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>6</td>
                <td class=gariskanan>Tujuan</td>

                <td width="290" class=gariskanan><?= $data['tujuan'] ?></td>
                <td width="150" class=gariskanan><?php if ($data['td_tujuan'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>7</td>
                <td class=gariskanan>Risiko & Komplikasi</td>
                <td width="290" class=gariskanan><?= $data['risiko'] ?></td>
                <td width="150" class=gariskanan><?php if ($data['td_risiko'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>8</td>
                <td class=gariskanan>
                    Prognosis<br>
                    &nbsp; &nbsp; &nbsp;<i>Prognosis vital, prognosis fungsi dan<br>
                        &nbsp; &nbsp; &nbsp;prognosis kesembuhan</i>
                </td>
                <td width="290" class=gariskanan><?= $data['prognosis'] ?></td>
                <td width="150" class=gariskanan><?php if ($data['td_prognosis'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>9</td>
                <td class=gariskanan>
                    Alternatif & Risiko<br>
                    Pilihan pengobatan/penatalaksanaan
                </td>
                <td width="290" class=gariskanan><?= $data['alt_risiko'] ?></td>
                <td width="150" class=gariskanan><?php if ($data['td_alt_risiko'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>10</td>
                <td class=gariskanan>
                    Hal lain yang akan dilakukan untuk <br>
                    menyelamatkan pasien<br>
                    &nbsp; &nbsp; &nbsp; <i>Perluasan tindakan <br>
                        &nbsp; &nbsp; &nbsp; Konsultasi selama tindakan<br>
                        &nbsp; &nbsp; &nbsp; Resusitasi</i>
                </td>
                <td width="290" class=gariskanan><?= $data['hal_lain'] ?></td>
                <td width="150" class=gariskanan><?php if ($data['td_hal_lain'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>



        </table>

        <!--akhir table baru 1-->

        <!--table ketiga -->
        <table width=100% class="table1" cellspacing=0>

            <tr height="60" class=garisbawah>
                <td class=gariskanan>
                    Dengan ini menyatakan bahwa saya telah menerangkan hal-hal diatas secara benar dan jelas<br>
                    dan memberikan kesempatan untuk bertanya dan/ atau berdiskusi
                </td>
                <td width="150" class=gariskanan align="center"><?php if ($data['ttd_pemberi_info'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr height="60" class=garisbawah>
                <td class=gariskanan>
                    Dengan ini menyatakan bahwa saya telah menerangkan hal-hal diatas secara benar dan jelas<br>
                    dan memberikan kesempatan untuk bertanya dan/ atau berdiskusi
                </td>
                <td width="150" class=gariskanan align="center"><?php if ($data['ttd_penerima_info'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>
            <tr height="40" class="garisbawah gariskanan">
                <td colspan="2">
                    *Bila pasien tidak kompeten atau tidak mau menerima informasi, maka penerima informasi adalah wali keluarga terdekat.
                </td>
            </tr>

        </table>



        <!--akhir table tiga-->
        <table width=100% class="table1" cellspacing=0>
            <tr height="40" class="garisbawah" align="center">
                <td>
                    <b>PERSETUJUAN TINDAKAN KEDOKTERAN</b>
                </td>
            </tr>
        </table>
        <!--table satu kecil-->
        <table width=100% class="gariskanan gariskiri" cellspacing=0>
            <tr>
                <td colspan=4 width="44px">Yang bertandatangan di bawah ini, saya nama <b><?= $data['nama'] ?></b>, umur <b><?= $data['umur'] ?></b> tahun,
                    <b><?= $data['jk'] ?></b>, alamat <b><?= $data['alamat'] ?></b> ,
                    dengan ini menyatakan penolakan untuk dilakukannya tindakan <b><?= $data['tolak_tindakan'] ?></b> pada tanggal <b><?= strftime('%d %B %Y', strtotime($data['tgl_tindakan'])) ?></b> terhadap <b><?= $data['ghubungan'] ?></b>*
                    bernama <b><?= $data['pasien'] ?></b> , umur <b><?php
                                                                    $tanggal = new DateTime($data['tgl_lahir']);
                                                                    $today = new DateTime();
                                                                    $y = $today->diff($tanggal)->y;
                                                                    echo  $y; ?></b> tahun, <b><?= $data['jenis_kelamin'] ?></b>,
                    tanggal lahir <b><?= strftime('%d %B %Y', strtotime($data['tgl_lahir'])) ?></b>,
                    <!-- alamat <b><?= $data['almt'] . ', ' . $data['kelurahan'] . ', ' . $data['kecamatan'] . ', ' . $data['provinsi'] ?></b>. <br> -->

                    Saya memahami perlunya dan manfaat tindakan tersebut sebagaimana telah dijelaskan seperti di atas kepada <br>
                    saya, termasuk risiko dan komplikasi yang mungkin timbul. <br>
                    Saya juga menyadari bahwa dokter melakukan suatu upaya dan oleh karena ilmu kedokteran bukanlah ilmu pasti, <br>
                    maka keberhasilan tindakan kedokteran bukanlah keniscayaan, melainkan sangat bergantung kepada izin Tuhan <br>
                    Yang Maha Esa.<br>

                </td>

            </tr>
        </table>
        <table width=100% class="gariskanan gariskiri garisbawah" cellspacing=0>
            <tr>
                <td colspan="3">
                    PangkalPinang, tanggal <?= strftime('%d %B %Y', strtotime($data['tanggal'])) ?> pukul <?= date('H:i:s', strtotime($data['tanggal'])) ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                   &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <center>Yang menyatakan*</center>
                </td>
                <td>
                    <center>Saksi 1</center>
                </td>
                <td>
                    <center>Saksi 2</center>
                </td>
            </tr>
            <tr>
                <td>
                    <center><img src="<?= base_url() . $data['ttd'] ?>" style="width: 200px;height:200px; "></center>
                </td>
                <td>
                    <center><img src="<?= base_url() . $data['ttd1'] ?>" style="width: 200px;height:200px; "></center>
                </td>
                <td>
                    <center><img src="<?= base_url() . $data['ttd2'] ?>" style="width: 200px;height:200px; "></center>
                </td>
            </tr>

        </table>
    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
        window.onafterprint = function(e) {
            closePrintView();
        };

        function closePrintView() {
            window.location.href = 'javascript:history.go(-1)';
        }
    </script>
</body>

</html>