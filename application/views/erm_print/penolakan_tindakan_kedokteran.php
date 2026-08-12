<!DOCTYPE html>
<html>

<head>
    <title>Print out <?= $page_title ?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid black;

        }

        .garisbawah {
            border-bottom: 1px solid;
        }

        .garisatas {
            border-top: 2px solid;
        }

        .gariskanan {
            border-right: 1px solid;
        }

        .gariskiri {
            border-left: 1px solid;
        }
    </style>
</head>

<body>
    <div class="content">
        <table class="a" style="width: 100%">
            <tr>
                <td>
                <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
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


        <h3 class="center">
            <p style="margin-top:-20px"> FORMULIR PENOLAKAN TINDAKAN KEDOKTERAN</p>
        </h3>
        <table width=100% class="table1" border="1" cellspacing=0 style="margin-top:-20px;   ">

            <tr>
                <td colspan=2 width="44px">Dokter Pelaksana Tindakan</td>
                <td width="54px" colspan="2"><?= $data['dpjp'] ?></td>
            </tr>

            <tr>
                <td colspan=2 width="44px">Pemberi Informasi</td>
                <td width="54px" colspan="2"><?= $data['pemberi_info'] ?></td>

            </tr>

            <tr>
                <td colspan=2 width="44px">Penerima Informasi / Pemberi Persetujuan*</td>
                <td width="54px" colspan="2"><?= $data['penerima_info'] ?></td>

            </tr>


            <tr>
                <td width="1px" class="center"><b>No</b></td>
                <td width="43px" class="center"><b>Jenis Informasi</b></td>
                <td width="50px" class="center"><b>Isi Informasi</b></td>
                <td width="2px" class="center"><b>Tandai (v)</b></td>
            </tr>

            <tr>
                <td width="1px" class="center">1</td>
                <td width="43px">Diagnosis (WD & DD)</td>
                <td width="50px"><?= $data['diagnosis'] ?></td>
                <td width="2px" class="center"><?php if ($data['td_diagnosis'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr>
                <td width="1px" class="center">2</td>
                <td width="43px">Dasar Diagnosis</td>
                <td width="50px"><?= $data['diagnosis_d'] ?></td>
                <td width="2px" class="center"><?php if ($data['td_diagnosis_d'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr>
                <td width="1px" class="center">3</td>
                <td width="43px">Tindakan Kedokteran</td>
                <td width="50px"><?= $data['tindakan'] ?></td>
                <td width="2px" class="center"><?php if ($data['td_tindakan'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr>
                <td width="1px" class="center">4</td>
                <td width="43px">Indikasi Tindakan</td>
                <td width="50px"><?= $data['indikasi'] ?></td>
                <td width="2px" class="center"><?php if ($data['td_indikasi'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr>
                <td width="1px" class="center">5</td>
                <td width="43px">Tata Cara : <br>
                    Tipe sedasi/anesthesia
                    uraian singkat prosedur dan
                    tahapan yang penting.
                </td>
                <td width="50px"><?= $data['tatacara'] ?></td>
                <td width="2px" class="center"><?php if ($data['td_tatacara'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr>
                <td width="1px" class="center">6</td>
                <td width="43px">Tujuan</td>
                <td width="50px"><?= $data['tujuan'] ?></td>
                <td width="2px" class="center"><?php if ($data['td_tujuan'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr>
                <td width="1px" class="center">7</td>
                <td width="43px">Risiko & Komplikasi</td>
                <td width="50px"><?= $data['risiko'] ?></td>
                <td width="2px" class="center"><?php if ($data['td_risiko'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>

            <tr>
                <td width="1px" class="center">8</td>
                <td width="43px">Prognosis<br>
                    Prognosis vital, prognosis fungsi dan
                    prognosis kesembuhan
                </td>
                <td width="50px"><?= $data['prognosis'] ?></td>
                <td width="2px" class="center"><?php if ($data['td_prognosis'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>
            </tr>

            <tr>
                <td width="1px" class="center">9</td>
                <td width="43px">Alternatif & Risiko<br>
                    Pilihan pengobatan/penatalaksanaan
                </td>
                <td width="50px"><?= $data['alt_risiko'] ?></td>
                <td width="2px" class="center"><?php if ($data['td_alt_risiko'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>
            </tr>

            <tr>
                <td width="1px" class="center">10</td>
                <td width="43px">Hal lain yang akan dilakukan untuk
                    menyelamatkan pasien<br>
                    Perluasan tindakan
                    Konsultasi selama tindakan
                    Resusitasi
                </td>
                <td width="50px"><?= $data['hal_lain'] ?></td>
                <td width="2px" class="center"><?php if ($data['td_hal_lain'] == 'OK') { ?>&#10004;<?php } ?></td>
            </tr>
            </tr>


            <tr>
                <td colspan=3 width="44px">Dengan ini menyatakan bahwa saya telah menerangkan hal-hal diatas secara benar dan jelas dan memberikan kesempatan untuk bertanya dan/atau berdiskusi</td>
                <td width="2px" class="center"><?php if ($data['ttd_pemberi_info'] == 'OK') { ?>&#10004;<?php } ?></td>

            </tr>

            <tr>
                <td colspan=3 width="44px">Dengan ini menyatakan bahwa saya telah menerima informasi dari dokter sebagaimana di atas kemudian yang saya beri tanda/paraf di kolom kanannya dan telah memahaminya</td>
                <td width="2px" class="center"><?php if ($data['ttd_penerima_info'] == 'OK') { ?>&#10004;<?php } ?></td>

            </tr>


            <tr>
                <td colspan=4 width="44px">*Bila pasien tidak kompeten atau tidak mau menerima informasi, maka penerima informasi adalah wali atau keluarga terdekat.</td>

            </tr>
        </table>

        <table width=100% class="table1" cellspacing=0>
            <tr height="40" class="garisbawah" align="center">
                <td>
                <b>PENOLAKAN TINDAKAN KEDOKTERAN</b>
                </td>
            </tr>
        </table>

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
                    alamat <b><?= $data['almt'] . ', ' . $data['kelurahan'] . ', ' . $data['kecamatan'] . ', ' . $data['provinsi'] ?></b>. <br>

                    Saya memahami perlunya dan manfaat tindakan tersebut sebagaimana telah dijelaskan seperti di atas kepada saya, termasuk risiko dan komplikasi yang mungkin timbul.
                    Saya bertanggung jawab secara penuh atas segala akibat yang mungkin timbul sebagai akibat tidak dilakukannya tindakan kedokteran yang direncanakan oleh dokter.

                </td>

            </tr>






        </table>
        <table width=100% class="gariskanan gariskiri garisbawah" cellspacing=0>
            <tr>
                <td colspan="3">
                    Pangkal Pinang, tanggal <?= strftime('%d %B %Y', strtotime($data['tanggal'])) ?> pukul <?= date('H:i:s', strtotime($data['tanggal'])) ?>
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