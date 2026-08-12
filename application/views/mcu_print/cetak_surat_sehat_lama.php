<!DOCTYPE html>
<html>

<head>
    <title>Print out</title>
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
    </style>
</head>

<body>
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
                                <p>Kabupaten Bangka, Prov.Kepulauan Bangka Belitung - Indonesia</p>
                                <p>Telp. +62(717)421091,+62(717)433027, Fax+62(717)424212</p>
                                </font>
                            </td>
                        </tr>
                    </table>
                    <h3 style="margin-top:-10px" class="center">
                        <b><u>
                                <br>
                                <br>
                                SURAT KETERANGAN SEHAT
                        </b></u>
                        <br>
                        NOMOR:...../PT.RSBT/SK-..../20..
                    </h3>
                    <table style="margin-left:40px" cellspacing=0>
                        <tr height=10px>
                            <td width="200px" colspan=2>
                                <b>Yang bertanda tangan dibawah ini:</b>
                            </td>
                        </tr>
                        <tr height=10px>
                            <td width=265px>
                                Nama Dokter
                            </td>
                            <td>: <?php echo $dokter; ?></td>
                        </tr>
                        <tr height=10px>
                            <td>
                                Sip
                            </td>
                            <td>: <?php echo $dok_sip; ?></td>
                        </tr>
                        <tr height=10px>
                            <td>
                                Jabatan
                            </td>
                            <td>: <?php echo $dok_jabatan; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                <table style="float: left; margin-left:40px" cellspacing=0>
                    <tbody>
                        <br>
                        <tr class="txt-dark" width="30%">
                            <td colspan="3"><b>Menerangkan dengan sebenarnya bahwa :</b></td>
                        </tr>
                        <tr class="txt-dark" width="30%">
                            <td>Nama</td>
                            <td>:</td>
                            <td><?=$nama_pasien?> Kg</td>
                        </tr>
                        <tr class="txt-dark" width="30%">
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?=$sex?></td>
                        </tr>
                        <tr class="txt-dark" width="30%">
                            <td>Tempat/Tanggal Lahir</td>
                            <td>:</td>
                            <td><?=$tempat_lahir . " / " . indo_date2($tgl_lahir);?></td>
                        </tr>
                        <tr class="txt-dark" width="30%">
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td><?=$occupation?></td>
                        </tr>
                        <tr class="txt-dark" width="30%">
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?=$alamat?></td>
                        </tr>
                    </tbody>
                </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table style="float: left; margin-left:40px" cellspacing=0>
                        <tbody>
                            <br>
                            <tr class="txt-dark" width="30%">
                                <td colspan="3"><b>Pemeriksaan tanda-tanda vital : </b></td>
                            </tr>
                            <tr class="txt-dark" width="30%">
                                <td>Tekanan Darah</td>
                                <td>:</td>
                                <td><?= $tekanan_darah ?> /MmHg</td>
                                <td>&nbsp;</td>
                                <td>Berat Badan</td>
                                <td>:</td>
                                <td><?= $berat_badan ?> Kg</td>
                            </tr>
                            <tr>
                                <td>Nadi</td>
                                <td>:</td>
                                <td><?= $nadi ?> x/mnt</td>
                                <td>&nbsp;</td>
                                <td>Tinggi Badan</td>
                                <td>:</td>
                                <td><?= $tinggi_badan ?>/cm</td>
                            </tr>
                            <tr>
                                <td>Respirasi</td>
                                <td>:</td>
                                <td><?= $respirasi ?> x/mnt</td>
                                <td>&nbsp;</td>
                                <td>Suhu</td>
                                <td>:</td>
                                <td colspan="4"><?= $suhu ?>&#8451;</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table style="float: left; margin-left:40px" cellspacing=0>
                        <tbody>
                            <br>
                            <tr class="txt-dark" width="30%">
                                <td colspan="3"><b>Pemeriksaan Fisik : </b></td>
                            </tr>
                            <tr class="txt-dark" width="30%">
                                <td>Keadaan Umum</td>
                                <td>:</td>
                                <td><?= $pf_kea_umum ?></td>
                            </tr>
                            <tr class="txt-dark" width="30%">
                                <td>Kepala - Leher</td>
                                <td>:</td>
                                <td><?= $pf_kpl_leher ?></td>
                            </tr>
                            <tr class="txt-dark" width="30%">
                                <td>Thorax</td>
                                <td>:</td>
                                <td><?= $pf_thorax ?></td>
                            </tr>
                            <tr class="txt-dark" width="30%">
                                <td>Abdomen</td>
                                <td>:</td>
                                <td><?= $pf_abdomen ?></td>
                            </tr>
                            <tr class="txt-dark" width="30%">
                                <td>Extremitas</td>
                                <td>:</td>
                                <td><?= $pf_extremitas ?></td>
                            </tr>
                            <tr class="txt-dark" width="30%">
                                <td>Status Neurologis</td>
                                <td>:</td>
                                <td><?= $pf_neurologis ?></td>
                            </tr>
                            <tr class="txt-dark" width="30%">
                                <td>Buta Warna</td>
                                <td>:</td>
                                <td><?= $pf_bwarna ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table style="float: left; margin-left:40px" cellpadding="5">
                        <tbody>
                            <tr>
                                <td style='  text-align: justify;text-justify: inter-word;'>
                                    Berdasarkan hasil pemeriksaan yang dilakukan pada hari ini, dalam keadaan
                                    <?php if ($sehat == "BAIK") {
                                        echo "<b>SEHAT/<s>TIDAK SEHAT</s></b>";
                                    } else {
                                        echo "<b><s>SEHAT</s>/TIDAK SEHAT</b>";
                                    } ?>.Demikianlah
                                    surat keterangan ini dibuat dengan sebenarnya untuk keperluan
                                    <?php echo $kebutuhan; ?>.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 style="margin-top:-10px" class="center">
                        <b><u>
                                <br>
                                <br>
                                FIT TO WORK
                        </b></u>
                    </h3>
                </td>
            </tr>
            <td style="float: left; margin-left:40px" cellpadding="5"><?= $ket ?></td>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table style="float: left; margin-left:40px" cellpadding="5">
                        <tbody>
                            <tr class="txt-dark" width="30%">
                                <td></td>
                                <td width="200px"></td>
                                <td>Pangkal Pinang, <?= indo_date2($tgl_periksa) ?></td>
                            </tr>
                            <tr class="txt-dark" width="30%">
                                <td>Tanda Tangan Pemegang</td>
                                <td></td>
                                <td>Dokter yang memeriksa, </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><?php
                                $data = $this->db->query("SELECT foto from dokter where nama = '$dokter'")->row_array();
                                ?>
                                    <img src="<?php echo base_url() . 'assets/ttd/' . $data['foto']; ?>" width="100px">
                                </td>
                            </tr>
                            <tr class="txt-dark" width="30%">
                                <td><br><br>(__________________)</td>
                                <td></td>
                                <td><?= $dokter; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

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