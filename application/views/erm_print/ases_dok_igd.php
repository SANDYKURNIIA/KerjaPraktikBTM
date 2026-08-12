<<<<<<< HEAD
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
                    <img src="<?= base_url() ?>resources/img/rsbt_logo.jpg" style="width: 200px;">
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
                <td colspan="2" height="30">Jam melakukan asesmen</td>
                <td colspan="4" height="30"> <?= date('H:i:s', strtotime($data['tanggal'])) ?> WIB</td>

            </tr>

            <tr>
                <td colspan="6" height="30"><b>Data Psikologis, Sosial, Ekonomi Dan Spiritual</b></td>
            </tr>


            <tr>
                <td>Psikologis:</td>
                <td colspan="5"><?= $data['psikologis'] ?></td>
            </tr>

            <tr>
                <td colspan="6" height="20"></td>
            </tr>

            <tr>
                <td>Hambatan Sosial:</td>
                <td colspan="5"> <?= $data['ham_sos'] ?></td>

            </tr>

            <tr>
                <td>Hambatan Ekonomi:</td>
                <td colspan="5"> <?= $data['ham_eko'] ?></td>

            </tr>

            <tr>
                <td>Hambatan Spritual:</td>
                <td colspan="5"><?= $data['ham_spirit'] ?></td>
            </tr>

            <tr>
                <td colspan="6" height="20"></td>
            </tr>

            <tr>
                <td colspan="6" height="6"><b>Anamnesis</b></td>
            </tr>

            <tr>
                <td colspan="6" height="6">Keluhan Utama :</td>
            </tr>
            <tr>
                <td colspan="6" ;>
                    <?= $data['keluhan'] ?>
                </td>
            </tr>

            <tr>

                <td colspan="6" height="6">Riwayat Penyakit Sekarang :</td>
            </tr>
            <tr>
                <td colspan="6">
                    <?= $data['riwayat'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="6" height="6">Riwayat Penyakit Dahulu :</td>
            </tr>

            <tr>
                <td colspan="6"><?= $data['diagnosa'] ?></td>
            </tr>

        </table>


        <!--end new one-->

        <!--table baru lagi-->
        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td colspan="5"><b>PEMERIKSAAN FISIK</b></td>

            </tr>

            <tr>
                <td>Tanda Vital</td>
                <td>TD = <?= $data['tekanan_darah'] ?> mmHg</td>
                <td>Nadi = <?= $data['frequensi_nadi'] ?> x/menit</td>
                <td>Pernafasan = <?= $data['frequensi_nafas'] ?> x/menit</td>
                <td>Suhu = <?= $data['suhu'] ?> &deg;C</td>
            </tr>

            <tr>
                <td></td>
                <td>Skala Nyeri = <?= $data['skala_nyeri'] ?></td>
                <td>GCS = <?= $data['gcs'] ?></td>
                <td>Kondisi Umum = <?= $data['kondisi_umum'] ?></td>
                <td>Berat Badan = <?= $data['berat_badan'] ?> kg</td>
            </tr>
            <tr>
                <td></td>
                <td>Tinggi Badan = <?= $data['tinggi_badan'] ?></td>
                <td>Kebutuhan Khusus = <?= $data['kebutuhan_khusus'] ?></td>
                <td>Asesmen Triase = <?= $data['asesment_triase'] ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3"><b>KEPALA</b></td>
                <td colspan="2" rowspan="14">
                    <img src="<?= base_url() . $data['gambar'] ?>" style="width: 300px; ">
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['kepala'] ?></td>
            </tr>

            <tr>
                <td colspan="3"><b>HIDUNG</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['hidung'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>MULUT</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['mulut'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>LEHER</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['leher'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>THORAX</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['thorax'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>JANTUNG</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['jantung'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>PARU</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['paru'] ?></td>
            </tr>

        </table>


        <!--akhir tabel baru lagi-->

        <!--new table lagi-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="6"><b>ABDOMEN DAN PELVIS :</b></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td colspan="4"><?= $data['andomen'] ?></td>
            </tr>
            <tr>
                <td colspan="6"><b>PUNGGUNG & PINGGANG :</b></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td colspan="4"><?= $data['punggung'] ?></td>
            </tr>
            <tr>
                <td colspan="6"><b>EKSTREMITAS :</b></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td colspan="4"><?= $data['ekstremitas'] ?></td>
            </tr>
        </table>

        <!--end new table lagi-->

        <!--table baru lagi-->

        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td><b>PEMERIKSAAN PENUNJANG</b></td>
                <td width="300"></td>
            </tr>

          
        </table>
        <!--end table baru lagi-->

        <!--4 table terakhir-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan=6><b>DIAGNOSA</b></td>
            </tr>
            <tr>
                <td colspan=6>
                    Diagnosa Utama : <?= $data['nama_diagnosa'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="6">Diagnosa Sekunder :</td>
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
            <?php $db = $this->db->get_where('erm_diagnosa_dokter', ['id_pelayanan' => $data['id_pelayanan']])->result_array();
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
        <!--end 4 table terakhir-->

        <!--3 table terakhir-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td width="300"><b>TERAPI / INSTRUKSI :</b></td>
                <td class="gariskanan"><b>Jam : </b> <?= date('H:i', strtotime($data['tanggal'])) ?></td>
                <td width="300"><b>KONSUL :</b></td>
                <td><b>Jam : </b> <?= date('H:i', strtotime($data['tanggal'])) ?></td>
            </tr>

            <tr height="200">
                <td width="300"><?= $data['terapi'] ?></td>
                <td class="gariskanan"><b></b></td>
                <td width="300"><?= $data['konsul'] ?></td>
                <td><b></b></td>
            </tr>
        </table>

        <!--end 3 table terakhir-->

        <!--2 table terakhir-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td width="150"><b>TINDAK LANJUT :</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="5"><?= $data['tindak_lanjut'] ?></td>

            </tr>
        </table>
        <!--end 2 table terakhir-->

        <!--table terakhir-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>
                    <center>Tanggal : <?= date('d-M-Y', strtotime($data['tanggal'])) ?> Jam : <?= date('H:i:s', strtotime($data['tanggal'])) ?> WIB</center>
                </td>
                <td>
                    <center>Tanggal : <?= date('d-M-Y', strtotime($data['tanggal'])) ?> Jam : <?= date('H:i:s', strtotime($data['tanggal'])) ?> WIB</center>
                </td>
            </tr>

            <tr>
                <td colspan="2">Telah dijelaskan dan dipahami kepada :</td>
            </tr>

            <tr>
                <td>&nbsp; <?php if ($data['paham'] == 'Pasien') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?> Pasien</td>
                <td></td>
            </tr>

            <tr>
                <td>&nbsp; <?php if ($data['paham'] != 'Pasien') { ?><span>&#10004;</span> Keluarga, hubungan dengan pasien : <?php echo $data['paham'];
                                                                                                                            } else { ?><span>__</span> Keluarga, hubungan dengan pasien : <?php } ?></td>
                <td></td>
            </tr>
            <tr height="90">
                <td>
                    <center></center>
                </td>
                <td>
                    <center></center>
                </td>

            </tr>
            <tr>
                <td>
                    <center>Pasien / Keluarga</center>
                </td>
                <td>
                    <center>Dokter</center>
                </td>

            </tr>

            <tr>
                <td>
                    <center><img src="<?= base_url() . $data['ttd'] ?>" style="width: 200px;height:200px; "></center>
                </td>
                <td>
                    <center></center>
                </td>

            </tr>

            <tr>
                <td>
                    <center> <?= $data['nama_lengkap'] ?>.</center>
                </td>
                <td>
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

=======
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
                    <img src="<?= base_url() ?>resources/img/rsbt_logo.jpg" style="width: 200px;">
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
                <td colspan="2" height="30">Jam melakukan asesmen</td>
                <td colspan="4" height="30"> <?= date('H:i:s', strtotime($data['tanggal'])) ?> WIB</td>

            </tr>

            <tr>
                <td colspan="6" height="30"><b>Data Psikologis, Sosial, Ekonomi Dan Spiritual</b></td>
            </tr>


            <tr>
                <td>Psikologis:</td>
                <td colspan="5"><?= $data['psikologis'] ?></td>
            </tr>

            <tr>
                <td colspan="6" height="20"></td>
            </tr>

            <tr>
                <td>Hambatan Sosial:</td>
                <td colspan="5"> <?= $data['ham_sos'] ?></td>

            </tr>

            <tr>
                <td>Hambatan Ekonomi:</td>
                <td colspan="5"> <?= $data['ham_eko'] ?></td>

            </tr>

            <tr>
                <td>Hambatan Spritual:</td>
                <td colspan="5"><?= $data['ham_spirit'] ?></td>
            </tr>

            <tr>
                <td colspan="6" height="20"></td>
            </tr>

            <tr>
                <td colspan="6" height="6"><b>Anamnesis</b></td>
            </tr>

            <tr>
                <td colspan="6" height="6">Keluhan Utama :</td>
            </tr>
            <tr>
                <td colspan="6" ;>
                    <?= $data['keluhan'] ?>
                </td>
            </tr>

            <tr>

                <td colspan="6" height="6">Riwayat Penyakit Sekarang :</td>
            </tr>
            <tr>
                <td colspan="6">
                    <?= $data['riwayat'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="6" height="6">Riwayat Penyakit Dahulu :</td>
            </tr>

            <tr>
                <td colspan="6"><?= $data['diagnosa'] ?></td>
            </tr>

        </table>


        <!--end new one-->

        <!--table baru lagi-->
        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td colspan="5"><b>PEMERIKSAAN FISIK</b></td>

            </tr>

            <tr>
                <td>Tanda Vital</td>
                <td>TD = <?= $data['tekanan_darah'] ?> mmHg</td>
                <td>Nadi = <?= $data['frequensi_nadi'] ?> x/menit</td>
                <td>Pernafasan = <?= $data['frequensi_nafas'] ?> x/menit</td>
                <td>Suhu = <?= $data['suhu'] ?> &deg;C</td>
            </tr>

            <tr>
                <td></td>
                <td>Skala Nyeri = <?= $data['skala_nyeri'] ?></td>
                <td>GCS = <?= $data['gcs'] ?></td>
                <td>Kondisi Umum = <?= $data['kondisi_umum'] ?></td>
                <td>Berat Badan = <?= $data['berat_badan'] ?> kg</td>
            </tr>
            <tr>
                <td></td>
                <td>Tinggi Badan = <?= $data['tinggi_badan'] ?></td>
                <td>Kebutuhan Khusus = <?= $data['kebutuhan_khusus'] ?></td>
                <td>Asesmen Triase = <?= $data['asesment_triase'] ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3"><b>KEPALA</b></td>
                <td colspan="2" rowspan="14">
                    <img src="<?= base_url() . $data['gambar'] ?>" style="width: 300px; ">
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['kepala'] ?></td>
            </tr>

            <tr>
                <td colspan="3"><b>HIDUNG</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['hidung'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>MULUT</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['mulut'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>LEHER</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['leher'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>THORAX</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['thorax'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>JANTUNG</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['jantung'] ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>PARU</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><?= $data['paru'] ?></td>
            </tr>

        </table>


        <!--akhir tabel baru lagi-->

        <!--new table lagi-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="6"><b>ABDOMEN DAN PELVIS :</b></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td colspan="4"><?= $data['andomen'] ?></td>
            </tr>
            <tr>
                <td colspan="6"><b>PUNGGUNG & PINGGANG :</b></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td colspan="4"><?= $data['punggung'] ?></td>
            </tr>
            <tr>
                <td colspan="6"><b>EKSTREMITAS :</b></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td colspan="4"><?= $data['ekstremitas'] ?></td>
            </tr>
        </table>

        <!--end new table lagi-->

        <!--table baru lagi-->

        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td><b>PEMERIKSAAN PENUNJANG</b></td>
                <td width="300"></td>
            </tr>

          
        </table>
        <!--end table baru lagi-->

        <!--4 table terakhir-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan=6><b>DIAGNOSA</b></td>
            </tr>
            <tr>
                <td colspan=6>
                    Diagnosa Utama : <?= $data['nama_diagnosa'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="6">Diagnosa Sekunder :</td>
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
            <?php $db = $this->db->get_where('erm_diagnosa_dokter', ['id_pelayanan' => $data['id_pelayanan']])->result_array();
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
        <!--end 4 table terakhir-->

        <!--3 table terakhir-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td width="300"><b>TERAPI / INSTRUKSI :</b></td>
                <td class="gariskanan"><b>Jam : </b> <?= date('H:i', strtotime($data['tanggal'])) ?></td>
                <td width="300"><b>KONSUL :</b></td>
                <td><b>Jam : </b> <?= date('H:i', strtotime($data['tanggal'])) ?></td>
            </tr>

            <tr height="200">
                <td width="300"><?= $data['terapi'] ?></td>
                <td class="gariskanan"><b></b></td>
                <td width="300"><?= $data['konsul'] ?></td>
                <td><b></b></td>
            </tr>
        </table>

        <!--end 3 table terakhir-->

        <!--2 table terakhir-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td width="150"><b>TINDAK LANJUT :</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="5"><?= $data['tindak_lanjut'] ?></td>

            </tr>
        </table>
        <!--end 2 table terakhir-->

        <!--table terakhir-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>
                    <center>Tanggal : <?= date('d-M-Y', strtotime($data['tanggal'])) ?> Jam : <?= date('H:i:s', strtotime($data['tanggal'])) ?> WIB</center>
                </td>
                <td>
                    <center>Tanggal : <?= date('d-M-Y', strtotime($data['tanggal'])) ?> Jam : <?= date('H:i:s', strtotime($data['tanggal'])) ?> WIB</center>
                </td>
            </tr>

            <tr>
                <td colspan="2">Telah dijelaskan dan dipahami kepada :</td>
            </tr>

            <tr>
                <td>&nbsp; <?php if ($data['paham'] == 'Pasien') { ?><span>&#10004;</span><?php } else { ?><span>__</span> <?php } ?> Pasien</td>
                <td></td>
            </tr>

            <tr>
                <td>&nbsp; <?php if ($data['paham'] != 'Pasien') { ?><span>&#10004;</span> Keluarga, hubungan dengan pasien : <?php echo $data['paham'];
                                                                                                                            } else { ?><span>__</span> Keluarga, hubungan dengan pasien : <?php } ?></td>
                <td></td>
            </tr>
            <tr height="90">
                <td>
                    <center></center>
                </td>
                <td>
                    <center></center>
                </td>

            </tr>
            <tr>
                <td>
                    <center>Pasien / Keluarga</center>
                </td>
                <td>
                    <center>Dokter</center>
                </td>

            </tr>

            <tr>
                <td>
                    <center><img src="<?= base_url() . $data['ttd'] ?>" style="width: 200px;height:200px; "></center>
                </td>
                <td>
                    <center></center>
                </td>

            </tr>

            <tr>
                <td>
                    <center> <?= $data['nama_lengkap'] ?>.</center>
                </td>
                <td>
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

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>