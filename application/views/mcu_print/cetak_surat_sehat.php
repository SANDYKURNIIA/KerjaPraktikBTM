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
                                    <td class="header-left" style="width: 55%;">
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

                    <style>
                 h3.center {
                font-size: 15px; 
                }
                </style>
                    <h3 style="margin-top:-10px" class="center">
                        <b><u>
                        <br>
                                SURAT KETERANGAN SEHAT
                        </b></u>
                        <br>
                        NOMOR: Ket-...../BTM/2300/14/11/2024
                    </h3>

                    <style>
    table {
        width: 90%;
        margin-left: 40px;
        border-collapse: collapse;
        font-size: 16px;
        line-height: 1.1;
    }
    td {
        padding: 2px; 
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

<style>
    .label {
        width: 150px; 
    }
    .separator {
        width: 10px;
        text-align: right;
    }
</style>

                <table cellspacing="0">
                    <tr>
                        <td colspan="3" class="section-title">Yang bertanda tangan dibawah ini:</td>
                    </tr>
                    <tr>
                        <td class="label">Nama Dokter</td>
                        <td class="separator">:</td>
                        <td><?= $dokter ?></td>
                    </tr>
                    <tr>
                        <td class="label">Sip</td>
                        <td class="separator">:</td>
                        <td><?= $dok_sip ?></td>
                    </tr>
                    <tr>
                        <td class="label">Jabatan</td>
                        <td class="separator">:</td>
                        <td><?= $dok_jabatan ?></td>
                    </tr>
                </table>

                <table cellspacing="0">
                    <tr>
                        <td colspan="3" class="section-title">Menerangkan dengan sebenarnya bahwa:</td>
                    </tr>
                    <tr>
                        <td class="label">Nama</td>
                        <td class="separator">:</td>
                        <td><?= $nama_pasien ?></td>
                    </tr>
                    <tr>
                        <td class="label">Jenis Kelamin</td>
                        <td class="separator">:</td>
                        <td><?= $sex ?></td>
                    </tr>
                    <tr>
                        <td class="label">Tempat/Tanggal Lahir</td>
                        <td class="separator">:</td>
                        <td><?= $tempat_lahir . " / " . indo_date2($tgl_lahir); ?></td>
                    </tr>
                    <tr>
                        <td class="label">Pekerjaan</td>
                        <td class="separator">:</td>
                        <td><?= $occupation ?></td>
                    </tr>
                    <tr>
                        <td class="label">Alamat</td>
                        <td class="separator">:</td>
                        <td><?= $alamat ?></td>
                    </tr>
                </table>
                <style>
    .label {
        width: 150px; 
    }
    .separator {
        width: 5px;
        text-align: left; 
        padding: 0; 
    }
    td {
        padding: 2px; 
</style>
<tr>
    <td>
        <table cellspacing="0">
            <tbody>
                <tr class="txt-dark" width="90%">
                    <td colspan="3"><b>Pemeriksaan tanda-tanda vital : </b></td>
                </tr>
                <tr width="30%">
                    <td class="label">Tekanan Darah</td>
                    <td class="separator">:</td>
                    <td><?= $tekanan_darah ?> /MmHg</td>
                    <td>&nbsp;</td>
                    <td class="label">Berat Badan</td>
                    <td class="separator">:</td>
                    <td><?= $berat_badan ?> Kg</td>
                </tr>
                <tr>
                    <td class="label">Nadi</td>
                    <td class="separator">:</td>
                    <td><?= $nadi ?> x/mnt</td>
                    <td>&nbsp;</td>
                    <td class="label">Tinggi Badan</td>
                    <td class="separator">:</td>
                    <td><?= $tinggi_badan ?>/cm</td>
                </tr>
                <tr>
                    <td class="label">Respirasi</td>
                    <td class="separator">:</td>
                    <td><?= $respirasi ?> x/mnt</td>
                    <td>&nbsp;</td>
                    <td class="label">Suhu</td>
                    <td class="separator">:</td>
                    <td><?= $suhu ?>&#8451;</td>
                </tr>
                <tr>
                    <td class="label">Golongan Darah</td>
                    <td class="separator">:</td>
                    <td></td>
                    <td>&nbsp;</td>
                    <td class="label">BMI</td>
                    <td class="separator">:</td>
                    <td colspan="4"></td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>


            <tr>
                <td>
                    <table cellspacing="0">
                    <tr>
                        <td colspan="3" class="section-title">Pemeriksaan Fisik:</td>
                    </tr>
                    <tr>
                        <td class="label">Keadaan Umum</td>
                        <td class="separator">:</td>
                        <td><?= $pf_kea_umum ?></td>
                    </tr>
                    <tr>
                        <td class="label">Kepala - Leher</td>
                        <td class="separator">:</td>
                        <td><?= $pf_kpl_leher ?></td>
                    </tr>
                    <tr>
                        <td class="label">Thorax</td>
                        <td class="separator">:</td>
                        <td><?= $pf_thorax ?></td>
                    </tr>
                    <tr>
                        <td class="label">Abdomen</td>
                        <td class="separator">:</td>
                        <td><?= $pf_abdomen ?></td>
                    </tr>
                    <tr>
                        <td class="label">Extremitas</td>
                        <td class="separator">:</td>
                        <td><?= $pf_extremitas ?></td>
                    </tr>
                    <tr>
                        <td class="label">Status Neurologis</td>
                        <td class="separator">:</td>
                        <td><?= $pf_neurologis ?></td>
                    </tr>
                    <tr>
                        <td class="label">Buta Warna</td>
                        <td class="separator">:</td>
                        <td><?= $pf_bwarna ?></td>
                    </tr>
                </table>
                </td>
                </tr>
            <tr>
                <td>
                    <table style="float: left; margin-left:40px" cellpadding="5">
                        <tbody>
                            <tr>
                                <br>
                                <td style='  text-align: left;text-left: inter-word;'>
                                    Berdasarkan hasil pemeriksaan yang dilakukan pada hari ini, dalam keadaan
                                    <?php if ($sehat == "BAIK") {
                                        echo "<b>SEHAT/<s>TIDAK SEHAT</s></b>";
                                    } else {
                                        echo "<b><s>SEHAT</s>/TIDAK SEHAT</b>";
                                    } ?>.Demikianlah
                                    surat keterangan ini dibuat dengan sebenarnya untuk keperluan:
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <h3 style="margin-top:-10px" class="center">
                                <br>
                                <br>
                                <br>
                                <br>
                .............................................................................................................
                    </h3>
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

<table class="signature-table" cellpadding="5">
<table style="float: right; margin-right:40px" cellpadding="5">
    <tbody>
    <tr width="30%">
    <td></td>
    <td width="200px"></td>            
    <td align="right">Pangkal Pinang, <?= indo_date2($tgl_periksa) ?></td>
        </tr>
        <tr>
            <td>Tanda Tangan Pemegang</td>
            <td></td>
            <td align="right">Dokter MCU</td>
        </tr>
        <tr class="signature-space">
            <td></td>
            <td></td>
            <td align="right">
                <?php
                $data = $this->db->query("SELECT foto from dokter where nama = '$dokter'")->row_array();
                ?>
                <img src="<?php echo base_url() . 'assets/ttd/' . $data['foto']; ?>" width="100px">
            </td>
        </tr>
        <tr>
            <td>(__________________)</td>
            <td></td>
            <td align="right"><?= $dokter; ?></td>
        </tr>
        <tr>
            <td colspan="3" class="note" align="left">*Coret yang tidak perlu</td>
        </tr>
        <tr>
            <td colspan="3" class="note" align="left">*Berkas ini wajib dikeluarkan oleh Unit MCU RSBT Pangkalpinang</td>
        </tr>
    </tbody>
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