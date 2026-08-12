<<<<<<< HEAD
<!DOCTYPE html>
<html>

<style>
    .no-spacing {
        margin: 0;
    }

    .small-text {
        font-size: 15px;
    }

    .centered-text {
        text-align: center;
        margin: 0;
    }

    .small-font {
        font-size: 12px;
    }

    .small {
        font-size: 10px;
    }
</style>

<head>
    <title>Print out</title>
    <!-- <title>Print out <?= $page_title ?></title> -->
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
            border-bottom: 1px collapse;
        }

        .gariskanan {
            border-right: 1px solid;
        }

        .gariskiri {
            border-left: 1px solid;
        }

        .garisatas {
            border-top: 1px collapse;
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

        .sub-section {
            margin-left: 20px;
            /* Indentasi untuk sub-sections */
        }

        .italic-text {
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="content">
        <img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" style="width: 150px;">

        <table width=100% class="table1" cellspacing=0>
            <tr>

                <td class=gariskanan align="center" width=30%>
                    <b>
                        <p>PERENCANAAN PASIEN</p>
                        <p>PULANG</p>
                        <p>(Discharge Planning)</p>
                    </b>
                </td>

                <td class=gariskanan>
                    <br>
                    <p>Ruang:<?= $data->nama_ruangan ?> </p>
                    <p>Kelas:<?= $data->kelas ?> </p>
                    <p>Jenis Kelamin:<?= $data->jenis_kelamin ?>
                    </p>
                </td>

                <td class=gariskanan width=40%>
                    <p class="small italic-text" align="center">Label Barcode</p>
                    <p>No. RM:<?= $data->no_rm ?> </p>
                    <p>Nama Pasien: <?= $data->nama ?></p>
                    <p>Tanggal Lahir: <?= $data->tgl_lahir ?></p>
                </td>

            </tr>
        </table>

        <!--table satu-->
        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <p>Diisi dan diberi tanda √ pada kotak yang tersedia sesuai dengan data pasien</p>
                </td>

            </tr>

        </table>
        <!--end of table satu-->

        <table width=100% class="table1" cellspacing=0>
            <tr>

                <td class=gariskanan align="center" width=7%>
                    <p>Tgl / </p>
                    <p>Pukul</p>
                </td>

                <td class=gariskanan align="center">
                    <b>
                        <p>Saat Pasien Masuk RS</p>
                    </b>
                </td>

                <td class=gariskanan align="center" width=15%>
                    <b>
                        <p>Nama</p>
                        <p>Perawat/Bidan </p>
                        <p>(Paraf)</p>
                    </b>
                </td>

            </tr>
        </table>

        <table width=100% class="table1" cellspacing=0>
            <tr>

                <td class=gariskanan align="center" width=7%>
                    <p></p>
                </td>

                <td class=gariskanan>
                    <br>
                    <div class="container">
                        <p>a. Pasien tinggal dengan siapa?
                            <?= $data->pasienTinggal ?>
                        </p>
                    </div>
                    <div class="container">
                        <p>b. Dimana letak kamar pasien di rumah?
                            <?= $data->letakkamar ?>
                        </p>
                    </div>
                    <div>
                        <p>c. Bagaimana kondisi rumah pasien</p>
                        <div class="sub-section">
                            <div class="container">
                                <p>I. Penerangan                                        :
                                    <?= $data->penerangan ?>
                                </p>
                            </div>
                            <div class="container">
                                <p>II. Kamar tidur jauh dengan kamar mandi              :
                                    <?= $data->kamarmandi ?>
                                </p>
                            </div>
                            <div class="container">
                                <p>III. WC/Kloset                                       :
                                    <?= $data->toilet ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <p>d. Bagaimana pemenuhan kebutuhan dasar pasien ?
                            <?= $data->kebutuhandasar ?>
                        </p>
                    </div>
                    <div class="container">
                        <p>e. Apakah pasien memerlukan alat bantu khusus ?
                            <?= $data->alatbantukhusus ?>
                        </p>
                    </div>
                    <div class="container">
                        <p>f. Apakah ada diet/makanan yang diprogramkan ?
                            <?= $data->dietmakananprogram ?>
                        </p>
                    </div>
                    <div class="container">
                        <p>g. Apakah perlu dirujuk ke komunitas lain ?
                            <?= $data->rujukankekomunitas ?>
                        </p>
                    </div>

                    <hr class=garisatas cellspacing=0>
                    <p class="small-text centered-text"><b>Sedang dirawat ( Catatan tambahan) Apabila ada perubahan Discharge Planning</b></p>
                    <hr class=garisbawah cellspacing=0>

                    <p>Managemen Nyeri :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan1 ?>
                        </label>
                    </p>

                    
                    <p>Perawatan Luka :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan2 ?>
                        </label>
                    </p>

                    
                    <p>Teknik Mobilisasi :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan3 ?>
                        </label>
                    </p>

                    
                    <p>Program Diet :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan4 ?>
                        </label>
                    </p>

                    
                    <p>Cara Pemberian Obat-obatan :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan5 ?>
                        </label>
                    </p>

                    
                    <p>Cara Penyuntikan Insulin :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan6 ?>
                        </label>
                    </p>

                    
                    <p>Penyuluhan Pasien Pulang Dengan Alat (O2/NGT/Cateter Urine/ .......................... :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan7 ?>
                        </label>
                    </p>

                    
                    <p>Perawatan Diri / Pasien Dengan Bedrest :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan8 ?>
                        </label>
                    </p>

                    
                    <p>Lingkungan :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan9 ?>
                        </label>
                    </p>

                    
                    <p>Perawatan Perineum :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan10 ?>
                        </label>
                    </p>

                    
                    <p>Perawatan Payudara :
                        
                    <label class="checkbox-label">
                       <?= $data->keperluan11 ?>
                        </label>
                    </p>

                    
                    <p>Perawatan Bayi (Perawatan tali pusat, Teknik menyusui, memandikan Bayi, Jadwal Imunisasi, Dan lain-lain ) :
                        
                    <label class="checkbox-label">
                       <?= $data->keperluan12 ?>
                        </label>
                    </p>

                    
                    <p>Saat Kontrol :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan13 ?>
                        </label>
                    </p>

                    
                    <p>Spiritual ( Toharoh,ibadah,fiqih) :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan14 ?>
                        </label>
                    </p>

                    
                    <p>Dan lain-lain ..................... :
                        
                        <label class="checkbox-label">
                       <?= $data->keperluan15 ?>
                        </label>
                    </p>



                    <hr class=garisatas cellspacing=0>
                    <p class="small-text centered-text"><b>Pada Saat Akan Pulang</b></p>
                    <hr class=garisbawah cellspacing=0>

                    
                    <p>Surat yang dibawa pulang :
                        <label class="checkbox-label">
                       <?= $data->keperluan1 ?>
                        </label>
                    </p>
                    <p>Pasien/Keluarga mengerti tentang Penyuluhan/Penjelasan yang diberikan :
                        <label class="checkbox-label">
                        <?= $data->penyuluhan ?>
                        </label>
                    </p>
                    <p>Pulang ke alamat : <?= $data->Alamat ?></p>
                    <p>Nama Penjemput : <?= $data->penjemput ?></p>
                    <p>Hubungan dengan pasien : <?= $data->hubungan ?></p>
                    <p>Transportasi yang digunakan :
                        <label class="checkbox-label">
                        <?= $data->transportasi ?>
                        </label>
                    </p>
                </td>

                <td class=gariskanan align="center" width=15%>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <p><b>Dokter DPJP</b></p>
                    <br><br><br>
                    <p>(.......................)</p>
                    <p class="small-font">Tanda Tangan & Nama Terang</p>
                </td>

            </tr>
        </table>
        <br>
        <p align="center"><b class="italic-text">MITRA TERPERCAYA LAYANAN KESEHATAN KELUARGA DAN MASYARAKAT</b></p>

        <!--table dua
        <table width=100% class="table1" cellspacing=0>


            <p>Kebutuhan Dasar: <?= $data->kebutuhandasar ?></p>



        </table>


        <!--table tiga-->
        <!-- <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>BAGIAN 1 : PEMERIKSAAN FISIK</b>
                </td>

            </tr>

        </table>

        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>BAGIAN 2 : RIWAYAT KESEHATAN</b>
                </td>

            </tr>

        </table>

        <table width=100% class="table1" cellspacing=0>


            <p>Surat Pulang: <?= $data->suratpulang ?></p>
            <p>Penyuluhan: <?= $data->penyuluhan ?></p>
            <p>Transportasi: <?= $data->transportasi ?></p>

        </table>



        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td colspan="8"><b>BAGIAN 3 : DESIMINASI</b></td>
            </tr>


            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td colspan="8"><b>BAGIAN 4 : SEKSUAL/REPRODUKSI DEWASA</b></td>
                </tr>


            </table>
            <table width=100% class="table1" cellspacing=0>

            </table>
            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td colspan="8"><b>BAGIAN 5 : SPIRITUAL</b></td>
                </tr>


            </table>
            <table width=100% class="table1" cellspacing=0>



                <table width=100% class="table1" cellspacing=0>
                    <tr align="center">
                        <td colspan="8"><b>BAGIAN 6 : EKONOMI/PSIKOSOSIAL</b></td>
                    </tr>
                </table>
                <table width=100% class="table1" cellspacing=0>

                </table> -->


        <!--end of table delapan-->

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

<style>
    .no-spacing {
        margin: 0;
    }

    .small-text {
        font-size: 15px;
    }

    .centered-text {
        text-align: center;
        margin: 0;
    }

    .small-font {
        font-size: 12px;
    }

    .small {
        font-size: 10px;
    }
</style>

<head>
    <title>Print out</title>
    <!-- <title>Print out <?= $page_title ?></title> -->
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
            border-bottom: 1px collapse;
        }

        .gariskanan {
            border-right: 1px solid;
        }

        .gariskiri {
            border-left: 1px solid;
        }

        .garisatas {
            border-top: 1px collapse;
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

        .sub-section {
            margin-left: 20px;
            /* Indentasi untuk sub-sections */
        }

        .italic-text {
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="content">
        <img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" style="width: 150px;">

        <table width=100% class="table1" cellspacing=0>
            <tr>

                <td class=gariskanan align="center" width=30%>
                    <b>
                        <p>PERENCANAAN PASIEN</p>
                        <p>PULANG</p>
                        <p>(Discharge Planning)</p>
                    </b>
                </td>

                <td class=gariskanan>
                    <br>
                    <p>Ruang:<?= $data->nama_ruangan ?> </p>
                    <p>Kelas:<?= $data->kelas ?> </p>
                    <p>Jenis Kelamin:<?= $data->jenis_kelamin ?>
                    </p>
                </td>

                <td class=gariskanan width=40%>
                    <p class="small italic-text" align="center">Label Barcode</p>
                    <p>No. RM:<?= $data->no_rm ?> </p>
                    <p>Nama Pasien: <?= $data->nama ?></p>
                    <p>Tanggal Lahir: <?= $data->tgl_lahir ?></p>
                </td>

            </tr>
        </table>

        <!--table satu-->
        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <p>Diisi dan diberi tanda √ pada kotak yang tersedia sesuai dengan data pasien</p>
                </td>

            </tr>

        </table>
        <!--end of table satu-->

        <table width=100% class="table1" cellspacing=0>
            <tr>

                <td class=gariskanan align="center" width=7%>
                    <p>Tgl / </p>
                    <p>Pukul</p>
                </td>

                <td class=gariskanan align="center">
                    <b>
                        <p>Saat Pasien Masuk RS</p>
                    </b>
                </td>

                <td class=gariskanan align="center" width=15%>
                    <b>
                        <p>Nama</p>
                        <p>Perawat/Bidan </p>
                        <p>(Paraf)</p>
                    </b>
                </td>

            </tr>
        </table>

        <table width=100% class="table1" cellspacing=0>
            <tr>

                <td class=gariskanan align="center" width=7%>
                    <p></p>
                </td>

                <td class=gariskanan>
                    <br>
                    <div class="container">
                        <p>a. Pasien tinggal dengan siapa?
                            <?= $data->pasienTinggal ?>
                        </p>
                    </div>
                    <div class="container">
                        <p>b. Dimana letak kamar pasien di rumah?
                            <?= $data->letakkamar ?>
                        </p>
                    </div>
                    <div>
                        <p>c. Bagaimana kondisi rumah pasien</p>
                        <div class="sub-section">
                            <div class="container">
                                <p>I. Penerangan                                        :
                                    <?= $data->penerangan ?>
                                </p>
                            </div>
                            <div class="container">
                                <p>II. Kamar tidur jauh dengan kamar mandi              :
                                    <?= $data->kamarmandi ?>
                                </p>
                            </div>
                            <div class="container">
                                <p>III. WC/Kloset                                       :
                                    <?= $data->toilet ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <p>d. Bagaimana pemenuhan kebutuhan dasar pasien ?
                            <?= $data->kebutuhandasar ?>
                        </p>
                    </div>
                    <div class="container">
                        <p>e. Apakah pasien memerlukan alat bantu khusus ?
                            <?= $data->alatbantukhusus ?>
                        </p>
                    </div>
                    <div class="container">
                        <p>f. Apakah ada diet/makanan yang diprogramkan ?
                            <?= $data->dietmakananprogram ?>
                        </p>
                    </div>
                    <div class="container">
                        <p>g. Apakah perlu dirujuk ke komunitas lain ?
                            <?= $data->rujukankekomunitas ?>
                        </p>
                    </div>

                    <hr class=garisatas cellspacing=0>
                    <p class="small-text centered-text"><b>Sedang dirawat ( Catatan tambahan) Apabila ada perubahan Discharge Planning</b></p>
                    <hr class=garisbawah cellspacing=0>

                    <p>Managemen Nyeri :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan1 ?>
                        </label>
                    </p>

                    
                    <p>Perawatan Luka :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan2 ?>
                        </label>
                    </p>

                    
                    <p>Teknik Mobilisasi :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan3 ?>
                        </label>
                    </p>

                    
                    <p>Program Diet :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan4 ?>
                        </label>
                    </p>

                    
                    <p>Cara Pemberian Obat-obatan :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan5 ?>
                        </label>
                    </p>

                    
                    <p>Cara Penyuntikan Insulin :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan6 ?>
                        </label>
                    </p>

                    
                    <p>Penyuluhan Pasien Pulang Dengan Alat (O2/NGT/Cateter Urine/ .......................... :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan7 ?>
                        </label>
                    </p>

                    
                    <p>Perawatan Diri / Pasien Dengan Bedrest :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan8 ?>
                        </label>
                    </p>

                    
                    <p>Lingkungan :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan9 ?>
                        </label>
                    </p>

                    
                    <p>Perawatan Perineum :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan10 ?>
                        </label>
                    </p>

                    
                    <p>Perawatan Payudara :
                        
                    <label class="checkbox-label">
                       <?= $data->keperluan11 ?>
                        </label>
                    </p>

                    
                    <p>Perawatan Bayi (Perawatan tali pusat, Teknik menyusui, memandikan Bayi, Jadwal Imunisasi, Dan lain-lain ) :
                        
                    <label class="checkbox-label">
                       <?= $data->keperluan12 ?>
                        </label>
                    </p>

                    
                    <p>Saat Kontrol :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan13 ?>
                        </label>
                    </p>

                    
                    <p>Spiritual ( Toharoh,ibadah,fiqih) :
                    
                        <label class="checkbox-label">
                       <?= $data->keperluan14 ?>
                        </label>
                    </p>

                    
                    <p>Dan lain-lain ..................... :
                        
                        <label class="checkbox-label">
                       <?= $data->keperluan15 ?>
                        </label>
                    </p>



                    <hr class=garisatas cellspacing=0>
                    <p class="small-text centered-text"><b>Pada Saat Akan Pulang</b></p>
                    <hr class=garisbawah cellspacing=0>

                    
                    <p>Surat yang dibawa pulang :
                        <label class="checkbox-label">
                       <?= $data->keperluan1 ?>
                        </label>
                    </p>
                    <p>Pasien/Keluarga mengerti tentang Penyuluhan/Penjelasan yang diberikan :
                        <label class="checkbox-label">
                        <?= $data->penyuluhan ?>
                        </label>
                    </p>
                    <p>Pulang ke alamat : <?= $data->Alamat ?></p>
                    <p>Nama Penjemput : <?= $data->penjemput ?></p>
                    <p>Hubungan dengan pasien : <?= $data->hubungan ?></p>
                    <p>Transportasi yang digunakan :
                        <label class="checkbox-label">
                        <?= $data->transportasi ?>
                        </label>
                    </p>
                </td>

                <td class=gariskanan align="center" width=15%>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <p><b>Dokter DPJP</b></p>
                    <br><br><br>
                    <p>(.......................)</p>
                    <p class="small-font">Tanda Tangan & Nama Terang</p>
                </td>

            </tr>
        </table>
        <br>
        <p align="center"><b class="italic-text">MITRA TERPERCAYA LAYANAN KESEHATAN KELUARGA DAN MASYARAKAT</b></p>

        <!--table dua
        <table width=100% class="table1" cellspacing=0>


            <p>Kebutuhan Dasar: <?= $data->kebutuhandasar ?></p>



        </table>


        <!--table tiga-->
        <!-- <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>BAGIAN 1 : PEMERIKSAAN FISIK</b>
                </td>

            </tr>

        </table>

        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td>
                    <b>BAGIAN 2 : RIWAYAT KESEHATAN</b>
                </td>

            </tr>

        </table>

        <table width=100% class="table1" cellspacing=0>


            <p>Surat Pulang: <?= $data->suratpulang ?></p>
            <p>Penyuluhan: <?= $data->penyuluhan ?></p>
            <p>Transportasi: <?= $data->transportasi ?></p>

        </table>



        <table width=100% class="table1" cellspacing=0>
            <tr align="center">
                <td colspan="8"><b>BAGIAN 3 : DESIMINASI</b></td>
            </tr>


            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td colspan="8"><b>BAGIAN 4 : SEKSUAL/REPRODUKSI DEWASA</b></td>
                </tr>


            </table>
            <table width=100% class="table1" cellspacing=0>

            </table>
            <table width=100% class="table1" cellspacing=0>
                <tr align="center">
                    <td colspan="8"><b>BAGIAN 5 : SPIRITUAL</b></td>
                </tr>


            </table>
            <table width=100% class="table1" cellspacing=0>



                <table width=100% class="table1" cellspacing=0>
                    <tr align="center">
                        <td colspan="8"><b>BAGIAN 6 : EKONOMI/PSIKOSOSIAL</b></td>
                    </tr>
                </table>
                <table width=100% class="table1" cellspacing=0>

                </table> -->


        <!--end of table delapan-->

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