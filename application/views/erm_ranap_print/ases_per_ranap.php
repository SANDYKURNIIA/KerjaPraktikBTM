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

        .table2 {
            color: #232323;
            border-collapse: collapse;
            border: 0px solid;

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
                <td width="220" class="gariskanan" align="center">
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
                    <p>Tgl Lahir : <?= $data['tgl_lahir'] ?></p>
                    <p>Jenis Kelamin :<?= $data['jenis_kelamin'] ?></p>
                </td>


            </tr>
        </table>

        <!--table satu-->
        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>PENGKAJIAN KEPERAWATAN AWAL PASIEN MASUK</b>
                </td>

            </tr>

        </table>
        <!--end of table satu-->

        <!--table dua -->
        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td>Jam/Tanggal Masuk</td>
                <td>:<?= $data['tgl_masuk'] ?></td>
                <td>&nbsp; &nbsp; &nbsp;Cara Bayar : <?= $data['cara_bayar'] ?>.</td>
                <td></td>
            </tr>
            <tr>
                <td>Cara Masuk</td>
                <td colspan="3">:<?= $data['cMasuk'] ?></td>
            </tr>


            <!-- <tr>
                <td>Cara Masuk</td>
                <td colspan="2">:<?= ($data['pRujuk'] == 'Tidak') ? $data['pRujuk'] : "Ya, Rujukan dari " . $data['asal_rujuk'] ?></td>
                <td>: <?= $data['cara_masuk'] ?></td>
            </tr> -->

        </table>

        <!--end of table dua-->

        <!--table tiga-->
        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>BAGIAN 1 : PEMERIKSAAN FISIK</b>
                </td>

            </tr>

        </table>
        <!--end of table tiga-->

        <!--table empat-->
        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td>GCS : <?= $data['gcs'] ?></td>
                <td>E : <?= $data['e'] ?></td>
                <td>M : <?= $data['m'] ?></td>
                <td>V : <?= $data['v'] ?></td>
            </tr>

            <tr>
                <td>Kondisi Saat Masuk :</td>
                <td colspan="3"><?= $data['kondisi_masuk'] ?></td>

            </tr>

            <tr>
                <td>Tekanan Darah :</td>
                <td colspan="1"> <?= $data['tekanan_darah'] ?> mmHg</td>
                <td>Suhu :</td>
                <td colspan="1"> <?= $data['suhu'] ?> &deg;C</td>
            </tr>

            <tr>
                <td>Frekuensi Nadi :</td>
                <td colspan="1"> <?= $data['frequensi_nadi'] ?> x/menit</td>
                <td>Berat Badan :</td>
                <td colspan="1"> <?= $data['berat_badan'] ?> kg</td>
            </tr>

            <tr>
                <td>Frekuensi Nafas :</td>
                <td colspan="1"> <?= $data['frequensi_nafas'] ?> x/menit</td>
                <td width='30%'>Tinggi Badan :</td>
                <td colspan="1"> <?= $data['tinggi_badan'] ?> cm</td>
            </tr>

            <tr>
                <td width='30%'>Dokter Pemeriksa :</td>
                <td colspan="3"> <?= $data['dokter_pemeriksa'] ?></td>
            </tr>

            <tr>
                <td width='30%'>Diagnosa Utama :</td>
                <td colspan="1"><?= $data['diagnosa_masuk'] ?></td>
                <td width='30%'>Keluhan Utama:</td>
                <td colspan="1"> <?= $data['keluhan_utama'] ?></td>
            </tr>
        </table>    


            <!--end of table empat-->

            <!--table 5-->
            <!-- <table width=100% class="table1" cellspacing=0>
                <tr>
                    <td width='30%'><b>Asesmen Triase : </b></td>
                    <td> <?= $data['asesment_triase'] ?></td>
                </tr>

            </table> -->



            <!--end of table lima-->

            <!--table enam-->
            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td>
                        <b>BAGIAN 2 : RIWAYAT KESEHATAN</b>
                    </td>

                </tr>

            </table>
            <!--end of table enam-->

            <!--table tujuh-->
            <table width=100% class="table1" cellspacing=0>

                <tr>
                    <td>Alergi Obat :</td>
                    <td colspan="3"><?= $data['alergi_obat'] ?></td>
                </tr>
                <tr>
                    <td>Alergi :</td>
                    <td colspan="3"><?= $data['alergi'] ?></td>
                </tr>
                <tr>
                    <td>Lain-lain</td>
                    <td colspan="3"><?= $data['lain_lain'] ?></td>
                </tr>

                <tr>
                    <td>Reaksi Utama Yang Timbul</td>
                    <td colspan="3"><?= $data['reaksi_utama'] ?></td>
                </tr>
                <tr>
                    <td>Riwayat Merokok</td>
                    <td colspan="3"><?= $data['riwayat_merokok'] ?></td>
                </tr>
                <tr>
                    <td>Riwayat Alkohol</td>
                    <td colspan="3"><?= $data['riwayat_alkohol'] ?></td>
                </tr>
                <tr>
                    <td>Riwayat Penyakit Keluarga :</td>
                    <td colspan="3"><?= $data['riwayat_keluarga'] ?></td>
                </tr>

            </table>


            <!--end of table tujuh-->

            <!--table delapam-->
            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td colspan="8"><b>BAGIAN 3 : DESIMINASI</b></td>
                </tr>
                

            </table>
            <table width=100% class="table1" cellspacing=0>
                    <tr>
                        <td>BAB</td>
                        <td colspan="1"><?= $data['bab'] ?></td>
                        <td>BAK</td>
                        <td colspan="1"><?= $data['bak'] ?></td>
                    </tr>

            </table>
            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td colspan="8"><b>BAGIAN 4 : SEKSUAL/REPRODUKSI DEWASA</b></td>
                </tr>
                

            </table>
            <table width=100% class="table1" cellspacing=0>
                    <tr>
                        <td colspan="4"><b>WANITA</b></td>
                    </tr>
                    <tr>
                        <td>Apakah Hamil</td>
                        <td colspan="1">: <?= $data['hamil'] ?></td>
                        <td>Alat Kontrasepsi</td>
                        <td colspan="1">: <?= $data['alat_kontrasepsi'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>LAKI-LAKI</b></td>
                    </tr>
                    <tr>
                        <td>Apakah Punya Masalah Prostat? </td>
                        <td colspan="3">: <?= $data['masalah_prostat'] ?></td>
                    </tr>
            </table>
            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td colspan="8"><b>BAGIAN 5 : SPIRITUAL</b></td>
                </tr>
                

            </table>
            <table width=100% class="table1" cellspacing=0>
                    
                    <tr>
                        <td>AGAMA</td>
                        <td colspan="3">: <?= $data['agama'] ?></td>
                    </tr>
                    <tr>
                        <td>Apakah Memerlukan Pemuka Agama ?</td>
                        <td colspan="3">: <?= $data['pemuka_agama'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>Keperluan/Larangan :</b></td>
                        <td colspan="3">: <?= $data['keperluan'] ?></td>
                    </tr>
            </table>
            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td colspan="8"><b>BAGIAN 6 : EKONOMI/PSIKOSOSIAL</b></td>
                </tr>
            </table>
            <table width=100% class="table1" cellspacing=0>
                    <tr>
                        <td>Status Pernikahan</td>
                        <td colspan="3">: <?= $data['status_pernikahan'] ?></td>
                    </tr>
                    <tr>
                        <td>Keluarga</td>
                        <td colspan="3">: <?= $data['keluarga'] ?></td>
                    </tr>
                    <tr>
                        <td>Tempat Tinggal</td>
                        <td colspan="3">: <?= $data['tempat_tinggal'] ?></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td colspan="3">: <?= $data['pekerjaan'] ?></td>
                    </tr>
                    <tr>
                        <td>Aktivitas</td>
                        <td colspan="3">: <?= $data['aktivitas'] ?></td>
                    </tr>
                    <tr>
                        <td>Status Emosional</td>
                        <td colspan="3">: <?= $data['status_emosional'] ?></td>
                    </tr>
                    <tr>
                        <td>Keluarga Terdekat</td>
                        <td colspan="1">: <?= $data['keluarga_terdekat'] ?></td>
                        <td>Hubungan</td>
                        <td colspan="1">: <?= $data['hubungan'] ?></td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td>Informasi Ini Didapat Dari : </td>
                        <td>: <?= $data['sumber_informasi'] ?></td>
                        <td></td>
                        <td></td>
                    </tr>
            </table>


            <!--end of table delapan-->
            
    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var birth = new Date('<?= $data['tgl_lahir'] ?>');
            var check = new Date();

            var milliDay = 1000 * 60 * 60 * 24; // a day in milliseconds;


            var ageInDays = (check - birth) / milliDay;

            var years = Math.floor(ageInDays / 365);
            if (years > 15) {
                $("#dewasa").show();
                $("#anak").hide();
            } else {
                $("#anak").show();
                $("#dewasa").hide();
            }
            // alert(years);
        });
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

        .table2 {
            color: #232323;
            border-collapse: collapse;
            border: 0px solid;

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
                <td width="220" class="gariskanan" align="center">
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
                    <p>Tgl Lahir : <?= $data['tgl_lahir'] ?></p>
                    <p>Jenis Kelamin :<?= $data['jenis_kelamin'] ?></p>
                </td>


            </tr>
        </table>

        <!--table satu-->
        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>PENGKAJIAN KEPERAWATAN AWAL PASIEN MASUK</b>
                </td>

            </tr>

        </table>
        <!--end of table satu-->

        <!--table dua -->
        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td>Jam/Tanggal Masuk</td>
                <td>:<?= $data['tgl_masuk'] ?></td>
                <td>&nbsp; &nbsp; &nbsp;Cara Bayar : <?= $data['cara_bayar'] ?>.</td>
                <td></td>
            </tr>
            <tr>
                <td>Cara Masuk</td>
                <td colspan="3">:<?= $data['cMasuk'] ?></td>
            </tr>


            <!-- <tr>
                <td>Cara Masuk</td>
                <td colspan="2">:<?= ($data['pRujuk'] == 'Tidak') ? $data['pRujuk'] : "Ya, Rujukan dari " . $data['asal_rujuk'] ?></td>
                <td>: <?= $data['cara_masuk'] ?></td>
            </tr> -->

        </table>

        <!--end of table dua-->

        <!--table tiga-->
        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>BAGIAN 1 : PEMERIKSAAN FISIK</b>
                </td>

            </tr>

        </table>
        <!--end of table tiga-->

        <!--table empat-->
        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td>GCS : <?= $data['gcs'] ?></td>
                <td>E : <?= $data['e'] ?></td>
                <td>M : <?= $data['m'] ?></td>
                <td>V : <?= $data['v'] ?></td>
            </tr>

            <tr>
                <td>Kondisi Saat Masuk :</td>
                <td colspan="3"><?= $data['kondisi_masuk'] ?></td>

            </tr>

            <tr>
                <td>Tekanan Darah :</td>
                <td colspan="1"> <?= $data['tekanan_darah'] ?> mmHg</td>
                <td>Suhu :</td>
                <td colspan="1"> <?= $data['suhu'] ?> &deg;C</td>
            </tr>

            <tr>
                <td>Frekuensi Nadi :</td>
                <td colspan="1"> <?= $data['frequensi_nadi'] ?> x/menit</td>
                <td>Berat Badan :</td>
                <td colspan="1"> <?= $data['berat_badan'] ?> kg</td>
            </tr>

            <tr>
                <td>Frekuensi Nafas :</td>
                <td colspan="1"> <?= $data['frequensi_nafas'] ?> x/menit</td>
                <td width='30%'>Tinggi Badan :</td>
                <td colspan="1"> <?= $data['tinggi_badan'] ?> cm</td>
            </tr>

            <tr>
                <td width='30%'>Dokter Pemeriksa :</td>
                <td colspan="3"> <?= $data['dokter_pemeriksa'] ?></td>
            </tr>

            <tr>
                <td width='30%'>Diagnosa Utama :</td>
                <td colspan="1"><?= $data['diagnosa_masuk'] ?></td>
                <td width='30%'>Keluhan Utama:</td>
                <td colspan="1"> <?= $data['keluhan_utama'] ?></td>
            </tr>
        </table>    


            <!--end of table empat-->

            <!--table 5-->
            <!-- <table width=100% class="table1" cellspacing=0>
                <tr>
                    <td width='30%'><b>Asesmen Triase : </b></td>
                    <td> <?= $data['asesment_triase'] ?></td>
                </tr>

            </table> -->



            <!--end of table lima-->

            <!--table enam-->
            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td>
                        <b>BAGIAN 2 : RIWAYAT KESEHATAN</b>
                    </td>

                </tr>

            </table>
            <!--end of table enam-->

            <!--table tujuh-->
            <table width=100% class="table1" cellspacing=0>

                <tr>
                    <td>Alergi Obat :</td>
                    <td colspan="3"><?= $data['alergi_obat'] ?></td>
                </tr>
                <tr>
                    <td>Alergi :</td>
                    <td colspan="3"><?= $data['alergi'] ?></td>
                </tr>
                <tr>
                    <td>Lain-lain</td>
                    <td colspan="3"><?= $data['lain_lain'] ?></td>
                </tr>

                <tr>
                    <td>Reaksi Utama Yang Timbul</td>
                    <td colspan="3"><?= $data['reaksi_utama'] ?></td>
                </tr>
                <tr>
                    <td>Riwayat Merokok</td>
                    <td colspan="3"><?= $data['riwayat_merokok'] ?></td>
                </tr>
                <tr>
                    <td>Riwayat Alkohol</td>
                    <td colspan="3"><?= $data['riwayat_alkohol'] ?></td>
                </tr>
                <tr>
                    <td>Riwayat Penyakit Keluarga :</td>
                    <td colspan="3"><?= $data['riwayat_keluarga'] ?></td>
                </tr>

            </table>


            <!--end of table tujuh-->

            <!--table delapam-->
            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td colspan="8"><b>BAGIAN 3 : DESIMINASI</b></td>
                </tr>
                

            </table>
            <table width=100% class="table1" cellspacing=0>
                    <tr>
                        <td>BAB</td>
                        <td colspan="1"><?= $data['bab'] ?></td>
                        <td>BAK</td>
                        <td colspan="1"><?= $data['bak'] ?></td>
                    </tr>

            </table>
            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td colspan="8"><b>BAGIAN 4 : SEKSUAL/REPRODUKSI DEWASA</b></td>
                </tr>
                

            </table>
            <table width=100% class="table1" cellspacing=0>
                    <tr>
                        <td colspan="4"><b>WANITA</b></td>
                    </tr>
                    <tr>
                        <td>Apakah Hamil</td>
                        <td colspan="1">: <?= $data['hamil'] ?></td>
                        <td>Alat Kontrasepsi</td>
                        <td colspan="1">: <?= $data['alat_kontrasepsi'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>LAKI-LAKI</b></td>
                    </tr>
                    <tr>
                        <td>Apakah Punya Masalah Prostat? </td>
                        <td colspan="3">: <?= $data['masalah_prostat'] ?></td>
                    </tr>
            </table>
            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td colspan="8"><b>BAGIAN 5 : SPIRITUAL</b></td>
                </tr>
                

            </table>
            <table width=100% class="table1" cellspacing=0>
                    
                    <tr>
                        <td>AGAMA</td>
                        <td colspan="3">: <?= $data['agama'] ?></td>
                    </tr>
                    <tr>
                        <td>Apakah Memerlukan Pemuka Agama ?</td>
                        <td colspan="3">: <?= $data['pemuka_agama'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>Keperluan/Larangan :</b></td>
                        <td colspan="3">: <?= $data['keperluan'] ?></td>
                    </tr>
            </table>
            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td colspan="8"><b>BAGIAN 6 : EKONOMI/PSIKOSOSIAL</b></td>
                </tr>
            </table>
            <table width=100% class="table1" cellspacing=0>
                    <tr>
                        <td>Status Pernikahan</td>
                        <td colspan="3">: <?= $data['status_pernikahan'] ?></td>
                    </tr>
                    <tr>
                        <td>Keluarga</td>
                        <td colspan="3">: <?= $data['keluarga'] ?></td>
                    </tr>
                    <tr>
                        <td>Tempat Tinggal</td>
                        <td colspan="3">: <?= $data['tempat_tinggal'] ?></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td colspan="3">: <?= $data['pekerjaan'] ?></td>
                    </tr>
                    <tr>
                        <td>Aktivitas</td>
                        <td colspan="3">: <?= $data['aktivitas'] ?></td>
                    </tr>
                    <tr>
                        <td>Status Emosional</td>
                        <td colspan="3">: <?= $data['status_emosional'] ?></td>
                    </tr>
                    <tr>
                        <td>Keluarga Terdekat</td>
                        <td colspan="1">: <?= $data['keluarga_terdekat'] ?></td>
                        <td>Hubungan</td>
                        <td colspan="1">: <?= $data['hubungan'] ?></td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td>Informasi Ini Didapat Dari : </td>
                        <td>: <?= $data['sumber_informasi'] ?></td>
                        <td></td>
                        <td></td>
                    </tr>
            </table>


            <!--end of table delapan-->
            
    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var birth = new Date('<?= $data['tgl_lahir'] ?>');
            var check = new Date();

            var milliDay = 1000 * 60 * 60 * 24; // a day in milliseconds;


            var ageInDays = (check - birth) / milliDay;

            var years = Math.floor(ageInDays / 365);
            if (years > 15) {
                $("#dewasa").show();
                $("#anak").hide();
            } else {
                $("#anak").show();
                $("#dewasa").hide();
            }
            // alert(years);
        });
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