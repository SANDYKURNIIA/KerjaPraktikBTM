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
<style>
                        .content {
                            width: 100%;
                        }
                        .header-table {
                            width: 100%;
                            border-collapse: collapse;
                        }
                        .header-left img {
                            width: 150px;
                        }
                        .header-right {
                            text-align: left;
                            color: blue;
                        }
                        .header-right td {
                            font-size: 8px;
                            padding: 0;
                        }
                        .header-title {
                            font-weight: bold;
                            font-size: 10px;
                        }
                    </style>

                    <body>
                        <div class="content">
                            <table class="header-table">
                                <tr>
                                    <td class="header-left" style="width: 60%;">
                                        <img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" alt="Logo Rumah Sakit">
                                    </td>
                                    <td class="header-right">
                                        <table>
                                            <tr>
                                                <td class="header-title">RUMAH SAKIT BAKTI TIMAH PANGKALPINANG</td>
                                            </tr>
                                            <tr>
                                                <td>Jalan Bukit Baru No. 1, Kelurahan Taman Bunga, Kecamatan Gerunggang</td>
                                            </tr>
                                            <tr>
                                                <td>Kota Pangkalpinang, Prov. Kepulauan Bangka Belitung - Indonesia</td>
                                            </tr>
                                            <tr>
                                                <td>Telp: +62(717)421091, +62(717)433027, Fax: +62(717)424212</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </body>

                        </tr>
                    </table>
                    <h3 style="margin-top:-10px" class="center">
                        <b><u>
                        <br>

                                <br>
                                SURAT KETERANGAN BEBAS NARKOBA
                        </b></u>
                    </h3>
                    <h5  style="margin-top:-10px" class="center">
                    NOMOR:Ket-___/BTM/2300/13/11/2024
                    </h5>
                    <style>
    table {
        width: 90%;
        margin-left: 40px;
        border-collapse: collapse;
        font-size: 17px;
        line-height: 1.2;
    }
    td {
        padding: 3px; 
        vertical-align: top;
    }
    .section-title {
        font-weight: bold;
        padding-top: 10px;
        text-align: left;
    }
    .label {
        width: 150px; 
    }
    .separator {
        width: 10px;
        text-align: left;
    }
    .txt-dark {
        font-weight: bold;
    }
    .note {
        font-size: small;
        font-style: italic;
        margin-top: 5px; 
    }
    .signature-table {
        margin-left: 40px;
        width: 90%;
    }
    .signature-table td {
        padding: 5px; 
    }
    .signature-space {
        height: 60px;
    }
</style>
                    <table cellpadding="3" 
                        <tr height=10px>
                            <td width=200px colspan=2>
                    Yang bertanda tangan dibawah ini, Dokter Medical Check Up Rumah Sakit Bakti Timah Pangkalpinang menerangkan :
                  
                                <b>
                                    <br>
                                    <br>
                                Yang bertanda tangan dibawah ini:
                        </b>
                            </td>
                        </tr>
                        <tr>
                        <tr height=10px>
                            <td width=245px>
                                Nama Dokter
                            </td>
                            <td>: </td>
                        </tr>
                        <tr height=10px>
                            <td>
                               Sip
                            </td>
                            <td>: </td>
                        </tr>
                        <tr height=10px>
                            <td>
                                Jabatan
                            </td>
                            <td>: </td>
                        </tr>
              </table>
                        <table cellpadding="3" 
                        <tr height=10px>
                            <td width=200px colspan=2>
                        <b>

                            Menerangkan dengan sebenarnya bahwa:
                        </b>
                        </td>
                        </tr>
                        <tr height=10px>
                            <td width=245px>
                                Nama
                            </td>
                            <td>: <?php echo $nama_pasien; ?></td>
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
                        <tr>
                            <td>
                                Tinggi Badan / Berat Badan
                            </td>
                            <td>
                                :<?= $tinggi_badan ." cm " . " / " . $berat_badan . " kg" ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tekanan Darah / Nadi</td>
                            <td>
                            :<?= $tekanan_darah ." mmHg " . " / " . $nadi . " x/m" ?>
                            </td>
                        </tr>
                        <tr height=20px>
                            <td>
                                Alamat
                            </td>
                            <td>: <?php echo $alamat; ?></td>
                        </tr>
                    </table>

                        <table cellpadding="3" 
                        <tr height=10px>
                            <td width=200px colspan=2>
                            <b>
                                Dengan hasil pemeriksaan Urine sebagai berikut :
                            </b>
                                </td>
                        </tr>
                        <tr height=10px>
                            <td width=245px>
                                    <tr>
                                        <td>Metamphetamine</td>
                                        <td>: <b>Negatif(-) / Positif(+)</b></td>
                                    </tr>
                                    <tr>
                                        <td>Morphine</td>
                                        <td>: <b>Negatif(-) / Positif(+)</b></td>
                                    </tr>
                                    <tr>
                                        <td>Benzodiazepam</td>
                                        <td>: <b>Negatif(-) / Positif(+)</b></td>
                                    </tr>
                                    <tr>
                                        <td>Marijuana</td>
                                        <td>: <b>Negatif(-) / Positif(+)</b></td>
                                    </tr>
                                    <tr>
                                        <td>Cocain</td>
                                        <td>: <b>Negatif(-) / Positif(+)</b></td>
                                    </tr>
                                    </table>

                                    <table cellpadding="3" 
                        <tr height=10px>
                            <td width=200px colspan=2>
                                    <p style="line-height: 1.5;">
                                    <br>
                                    Pada pemeriksaan tanggal <b><?= indo_date2($tgl_periksa) ?></b> jenis tersebut diatas <b>(* tidak dijumpai/dijumpai *)</b> tanda - tanda ketergantungan narkoba. 
                                </p>
                        <p style="line-height: 1.5;">
                        <br>
                Demikian surat Keterangan Bebas Narkoba ini dibuat untuk keperluan 
                </p>
                <p> <b>PERSYARATAN MELAMAR PEKERJAAN</b> dan untuk dapat dipergunakan sebagaimana mestinya</p>

                </td>
            </tr>

            <style>
    .signature-table {
        margin-left: 40px;
        width: 90%;
    }
    .signature-table td {
        padding: 10px;
        vertical-align: top;
    }
    .section-title {
        font-weight: bold;
    }
    .signature {
        width: 100px;
    }
    .signature-space {
        height: 60px;
    }
    .note {
        font-size: small;
        font-style: italic;
    }
</style>

       <tr>
                <table style="float: left;" cellpadding="5">

                    <tbody>
                        <?php

                        ?>
                        <br>
                        <tr>
                            <td colspan="2" align="left">Pangkal Pinang, <?= indo_date2($tgl_periksa) ?></td>

                        </tr>
                        <tr>
                            <td colspan="2" align="left">Dokter yang memeriksa, </td>

                        </tr>
                        <tr>
                        <td colspan="2" align="left">
                            <?php
                                $data = $this->db->query("SELECT foto from dokter where nama = '$dokter'")->row_array();
                                ?>
                                <img src="<?php echo base_url() . 'assets/ttd/' . $data['foto']; ?>" width="100px">
                            </td>
                        </tr>

                        <tr class="txt-dark">
                            <td colspan="2" align="left"><?= $dokter; ?></td>
                        </tr>
        <tr>
            <td colspan="2" class="note" align="left" style="padding-top: 15px;">*Coret yang tidak perlu</td>
        </tr>
        <tr>
            <td colspan="2" class="note" align="left">*Berkas ini wajib dikeluarkan oleh Unit MCU RSBT Pangkalpinang</td>
        </tr>
    </tbody>
 </table>

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