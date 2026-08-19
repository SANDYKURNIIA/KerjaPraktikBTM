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

        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td width="220" class=gariskanan>
                    <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 200px;">
                </td>

                <td class=gariskanan>
                    <p><b>RS. Bakti Timah</b></p>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>

                <td class=gariskanan>
                    <p>No. RM : <?= $data['no_rm'] ?></p>
                    <p>Nama : <?= $data['nama'] ?></p>
                    <p>Tgl Lahir : <?= date('d-M-Y', strtotime($data['tgl_lahir'])) ?></p>
                    <p>Jenis Kelamin : <?= $data['jenis_kelamin'] ?></p>
                </td>


            </tr>
        </table>

        <!--table satu-->
        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>PENGKAJIAN DOKTER</b>
                </td>

            </tr>

        </table>
        <!--end of table satu-->

        <!--new one-->
        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td height="30">Jam melakukan asesmen</td>
                <td colspan="3" height="30"> <?= date('H:i:s', strtotime($data['tanggal'])) ?> WIB</td>

            </tr>


            

        </table>


        <!--end new one-->
        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>PEMERIKSAAN FISIK</b>
                </td>

            </tr>

        </table>
        <!--table baru lagi-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td></td>
                <td>Tekannan Darah = <?= $data['tekanan_darah'] ?> mmHg</td>
                <td>Nadi = <?= $data['frequensi_nadi'] ?> x/menit</td>
                <td>Pernafasan = <?= $data['frequensi_nafas'] ?> x/menit</td>
            </tr>

            <tr>
                <td></td>
                <td>GCS = <?= $data['gcs'] ?></td>
                <td>Berat Badan = <?= $data['berat_badan'] ?> kg</td>
                <td>Tinggi Badan = <?= $data['tinggi_badan'] ?></td>
            </tr>
        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>RESPON TIME</b>
                </td>

            </tr>

        </table>
        <table width=100% class="table1" cellspacing=0>
            
            <tr>
                <td colspan="4"><b>LABOR :  </b></td>
            </tr>
            <tr>
                <td></td>
                <td>Mulai = <?= $data['labor_mulai'] ?> </td>
                <td>Selesai = <?= $data['labor_selesai'] ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4"><b>RONTGEN :  </b></td>
            </tr>
            <tr>
                <td></td>
                <td>Mulai = <?= $data['rontgen_mulai'] ?> </td>
                <td>Selesai = <?= $data['rontgen_selesai'] ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4"><b>KONSUL DOKTER :  </b></td>
            </tr>
            <tr>
                <td></td>
                <td>Mulai = <?= $data['konsul_mulai'] ?> </td>
                <td>Selesai = <?= $data['konsul_selesai'] ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4"><b>RESEP :  </b></td>
            </tr>
            <tr>
                <td></td>
                <td>Mulai = <?= $data['resep_mulai'] ?> </td>
                <td>Selesai = <?= $data['resep_selesai'] ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4"><b>TRANSFER :  </b></td>
            </tr>
            <tr>
                <td></td>
                <td>Mulai = <?= $data['transfer_mulai'] ?> </td>
                <td>Selesai = <?= $data['transfer_selesai'] ?></td>
                <td></td>
            </tr>
        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>RIWAYAT, KELUHAN, KEADAAN</b>
                </td>

            </tr>

        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="4" height="6"><b>Keluhan Utama :</b></td>
            </tr>
            <tr>
                <td colspan="4" ;>
                    <?= $data['keluhan_utama'] ?>
                </td>
            </tr>

            <tr>
                <td colspan="4" height="6"><b>Riwayat Penyakit Sekarang :</b></td>
            </tr>
            <tr>
                <td colspan="4">
                    <?= $data['riwayat_sekarang'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="4" height="6"><b>Riwayat Penyakit Dahulu :</b></td>
            </tr>

            <tr>
                <td colspan="4"><?= $data['riwayat_dahulu'] ?></td>
            </tr>
            <tr>
                <td colspan="4" height="6"><b>Riwayat Penyakit Menular :</b></td>
            </tr>

            <tr>
                <td colspan="4"><?= $data['riwayat_menular'] ?></td>
            </tr>
            <tr>
                <td colspan="4" height="6"><b>Keadaan Sosial :</b></td>
            </tr>

            <tr>
                <td colspan="4"><?= $data['keadaan_sosial'] ?></td>
            </tr>
            <tr>
                <td colspan="4" height="6"><b>Keadaan Fisik :</b></td>
            </tr>

            <tr>
                <td colspan="4"><?= $data['keadaan_fisik'] ?></td>
            </tr>
            

        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>DIAGNOSA</b>
                </td>

            </tr>

        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="4">Diagnosa Utama :</td>
            </tr>

        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr class="garisbawah" height="60">
                <td class=gariskanan>
                    <center>Kode</center>
                </td>
                <td class=gariskanan>
                    <center>Nama</center>
                </td>
            </tr>
            <?php $db = $this->db->get_where('diagnosa_utama_ranap', ['id_pelayanan' => $data['id_pelayanan']])->result_array();
            if (count($db) > 0) {
                foreach ($db as $row) { ?>
                    <tr class="garisbawah" height="60">
                        <td class=gariskanan>
                            <center><?= $row['kode'] ?></center>
                        </td>
                        <td class=gariskanan>
                            <center><?= $row['nama_diagnosa'] ?></center>
                        </td>
                    </tr>

                <?php }
            } else { ?>

                <tr width="90">
                    <td colspan="4" class=gariskanan>
                        <center>Tidak ada data</center>
                    </td>
                </tr>
            <?php } ?>

        </table>    
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="4">Diagnosa Sekunder :</td>
            </tr>

        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr class="garisbawah" height="60">
                <td class=gariskanan>
                    <center>Kode</center>
                </td>
                <td class=gariskanan>
                    <center>Nama</center>
                </td>
            </tr>
            <?php $db = $this->db->get_where('diagnosa_ranap', ['id_pelayanan' => $data['id_pelayanan']])->result_array();
            if (count($db) > 0) {
                foreach ($db as $row) { ?>
                    <tr class="garisbawah" height="60">
                        <td class=gariskanan>
                            <center><?= $row['kode'] ?></center>
                        </td>
                        <td class=gariskanan>
                            <center><?= $row['nama_diagnosa'] ?></center>
                        </td>
                    </tr>

                <?php }
            } else { ?>

                <tr width="90">
                    <td colspan="4" class=gariskanan>
                        <center>Tidak ada data</center>
                    </td>
                </tr>
            <?php } ?>

        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>GAMBAR</b>
                </td>

            </tr>

        </table>
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="4">
                    <img src="<?= base_url() . $data['gambar'] ?>" style="width: 300px; ">
                </td>
            </tr>
            <tr>
                <td>----------------------------------------------</td>
            </tr>
            <tr>
                <td colspan="1">Terapi/Instruksi : </td> 
            </tr>
            <tr>
                <td colspan="1"><?= $data['terapi'] ?></td>
            </tr>

        </table>
        <!--end 4 table terakhir-->

        <!--table terakhir-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="1">Dokter Pemeriksa : </td>
                <td colspan="1"><?= $data['dokter_pemeriksa'] ?></td>
            </tr>
            <tr>
                <td colspan="1">Jam dan Tanggal Pemeriksaan : </td>
                <td colspan="1"><?= date('d-M-Y', strtotime($data['tanggal_pemeriksaan'])) ?> Jam : <?= date('H:i:s', strtotime($data['tanggal_pemeriksaan'])) ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <center>TTD Dokter</center>
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <center><img src="<?= base_url() . $data['ttd'] ?>" style="width: 200px;height:200px; "></center>
                </td>
            </tr>

            <tr>
                <td colspan="2" >
                    <center> <?= $data['dpjp'] ?>.</center>
                </td>

            </tr>


        </table>




        <!--akhir table terakhir-->




        <!--batas-->


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