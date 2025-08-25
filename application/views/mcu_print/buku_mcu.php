<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUKU MCU - <?= strtoupper($identitas['nama_pasien']) ?></title>

</head>
<header></header>
<?php $this->load->view('assets/css_buku_mcu') ?>

<body>
    <div id="header" style="page-break-after:always;">
        <div class="nama-pasien">
            <?= $pasien ?>
        </div>
        <div class="judul-besar">
            <strong>
                <h1 class="medical-checkup">Medical Check Up</h1>
            </strong>
            Hasil Pengujian Kesehatan

        </div>
        <div class="hasil-pengujian">
            <font>
                Tanggal<br>
                <?= indo_date($identitas['tanggal']) ?>
            </font>
        </div>
        <br>
        <br>
        <div class="confidential">
            <u>CONFIDENTIAL</u><br>
            RAHASIA
        </div>
        <div class="design-by">
            DESIGN BY<br>
            MCU <?= faskes ?>
            <br>
            BAKTI TIMAH MEDIKA
            <br>
            <?= alamat ?>
        </div>
        <div class="logo">
            <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" alt="Logo Rumah Sakit">
        </div>
    </div>
    <div class="identitas">
        <h2>IDENTITAS PESERTA</h2>
        <table class="tabel-identitas">
            <tr>
                <td>Tanggal MCU</td>
                <td> <?= indo_date2($identitas['tanggal']) ?></td>
            </tr>
            <tr>
                <td>Tempat MCU</td>
                <td><?= faskes ?></td>
            </tr>
            <tr>
                <td>Perusahaan</td>
                <td><?= ($identitas['cara_bayar'] == '42') ? '' : $identitas['perusahaan'] ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td><?= $identitas['no_ktp'] ?></td>
            </tr>
            <tr>
                <td>No. Pegawai</td>
                <td><?= $identitas['badge_no'] ?></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><?= $identitas['nama_pasien'] ?></td>
            </tr>
            <tr>
                <td>Divisi</td>
                <td></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><?= $identitas['tempat_lahir'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><?= date('d-m-Y', strtotime($identitas['tgl_lahir'])) ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><?= $identitas['jenis_kelamin'][0] ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?= $identitas['alamat'] ?></td>
            </tr>
            <tr>
                <td>Kota</td>
                <td><?= $identitas['kota'] ?></td>
            </tr>
            <tr>
                <td>Kode Pos</td>
                <td></td>
            </tr>
            <tr>
                <td>Telepon Rumah</td>
                <td></td>
            </tr>
            <tr>
                <td>Handphone</td>
                <td><?= $identitas['no_hp'] ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?= $identitas['sts_kawin'] ?></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td><?= $identitas['agama'] ?></td>
            </tr>
        </table>
    </div>
    <div id="kuisioner" class="identitas">
        <h2>KUESIONER</h2>

        <table class="tabel-kuisioner">
            <tr>
                <th>PEMERIKSAAN DATA PRIBADI</th>
            </tr>
            <tr>
                <td>
                    <?php if (!empty($quiz_pemeriksaan_pribadi)) { ?>
                        <table>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>a) Apakah Anda saat ini dalam perawatan medis atau menerima perawatan? <?= $quiz_pemeriksaan_pribadi['P11a'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>b) Apakah Anda sedang minum obat, diresepkan atau tidak, injeksi, menggunakan inhaler atau baru saja melakukannya, atau Anda sedang menjalani diet khusus? <?= $quiz_pemeriksaan_pribadi['P11b'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="main-question">Apakah anda pernah mengalami:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>a) Sawan, Fobia, pusing atau gangguan mental atau saraf? <?= $quiz_pemeriksaan_pribadi['P12a'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>b) Asma, bronkitis, pneumonia atau gangguan paru-paru lainnya? <?= $quiz_pemeriksaan_pribadi['P12b'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>c) Rematik, demam reumatik, radang sendi atau gangguan sendi dan otot lainnya ? <?= $quiz_pemeriksaan_pribadi['P12c'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>d) Nyeri dada, sesak napas, jantung berdebar, tekanan darah tinggi atau gangguan jantung atau sirkulasi lainnya? <?= $quiz_pemeriksaan_pribadi['P12d'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>e) Gangguan pencernaan, tukak lambung, diare, sembelit atau keluhan usus, hepatitis atau gangguan hati lainnya atau diabetes? <?= $quiz_pemeriksaan_pribadi['P12e'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>f) Ginjal, kandung kemih atau gangguan genitourinari lainnya? <?= $quiz_pemeriksaan_pribadi['P12f'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>g) Adakah cedera, operasi, cacat fisik atau kelainan bentuk? <?= $quiz_pemeriksaan_pribadi['P12g'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>h) Penyakit lain yang tidak disebutkan di atas? <?= $quiz_pemeriksaan_pribadi['P12h'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>a) Pernahkah Anda menjadi pasien di rumah sakit, panti jompo atau klinik khusus? <?= $quiz_pemeriksaan_pribadi['P13a'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>b) Apakah anda pernah melakukan pemeriksaan medis? <?= $quiz_pemeriksaan_pribadi['P13b'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Apakah Anda pernah menderita penyakit menular seksual atau adakah gaya hidup Anda yang dapat membuat Anda berisiko terkena AIDS atau kondisi terkait AIDS? <?= $quiz_pemeriksaan_pribadi['P14a'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><strong>Khusus Wanita:</strong> Apakah Anda pernah memiliki masalah ginekologi atau obstetrik? <?= $quiz_pemeriksaan_pribadi['P15a'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Apakah Anda pernah minum obat selain yang diresepkan oleh dokter? <?= $quiz_pemeriksaan_pribadi['P16a'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>a) Non-Perokok: Apakah Anda pernah merokok di masa lalu? <?= $quiz_pemeriksaan_pribadi['P17a'] ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>b) Perokok : Berapa kali anda merokok per hari? <?= $quiz_pemeriksaan_pribadi['smoker'] ?> Jumlah Rokok yang dihisap <?= $quiz_pemeriksaan_pribadi['number_smoker'] ?> batang/hari</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>c) Berapa rata-rata konsumsi alkohol setiap hari? <?= $quiz_pemeriksaan_pribadi['concumption_alcohol'] ?></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Hasil SRQ-29 (Suspect) : <?= $quiz_pemeriksaan_pribadi['terhambat_belanjaan'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        -
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <th>RIWAYAT KESEHATAN KELUARGA</th>
            </tr>
            <tr>
                <td>-</td>
            </tr>
            <tr>
                <th>RIWAYAT KESEHATAN PRIBADI PENYAKIT YANG PERNAH / SEDANG DIDERITA</th>
            </tr>
            <tr>
                <td>-</td>
            </tr>
            <tr>
                <th>GEJALA YANG DIALAMI SEKARANG</th>
            </tr>
            <tr>
                <td>-</td>
            </tr>
            <tr>
                <th>NYERI DADA</th>
            </tr>
            <tr>
                <td>-</td>
            </tr>
            <tr>
                <th>HAMBATAN TERHADAP AKTIFITAS FISIK</th>
            </tr>
            <tr>
                <td>-</td>
            </tr>
            <tr>
                <th>AKTIVITAS FISIK</th>
            </tr>
            <tr>
                <td>-</td>
            </tr>
            <tr>
                <th>KEBIASAAN MAKAN</th>
            </tr>
            <tr>
                <td>-</td>
            </tr>
            <tr>
                <th>HOBI</th>
            </tr>
            <tr>
                <td>-</td>
            </tr>
            <tr>
                <th>KEBIASAAN</th>
            </tr>
            <tr>
                <td>-</td>
            </tr>
            <tr>
                <th>RIWAYAT PEKERJAAN TERDAHULU</th>
            </tr>
            <tr>
                <td>-</td>
            </tr>
            <tr>
                <th>RIWAYAT PEKERJAAN TERKINI</th>
            </tr>
            <tr>
                <td>-</td>
            </tr>
        </table>
    </div>

    <?php if (!empty($antropometri)) { ?>
        <div id="antropometri" class="identitas">
            <h2>ANTROPOMETRI</h2>
            <table class="tabel-identitas">
                <tr>
                    <td width=50%>Dokter Pemeriksa</td>
                    <td width=50%><?= ($antropometri['dokter_periksa'] != '' ? $antropometri['dokter_periksa'] : 'PERAWAT GENERAL CHECK UP') ?></td>
                </tr>
                <tr>
                    <td>Tinggi Badan</td>
                    <td><?= $antropometri['tinggi_badan'] ?> Cm</td>
                </tr>
                <tr>
                    <td>Berat Badan</td>
                    <td><?= $antropometri['berat_badan'] ?> Kg</td>
                </tr>
                <tr>
                    <td>Lingkar Pinggang</td>
                    <td><?= $antropometri['lingkar_pinggang'] ?> Cm</td>
                </tr>
                <tr>
                    <td>Lingkar Panggul</td>
                    <td><?= $antropometri['lingkar_panggul'] ?> Cm</td>
                </tr>
                <tr>
                    <td>IMT</td>
                    <td><?= ($antropometri['imt'] < 18.5) ? 'UNDERWEIGHT' : (($antropometri['imt'] >= 18.5 && $antropometri['imt'] < 25) ? 'NORMAL' : (($antropometri['imt'] >= 25 && $antropometri['imt'] <= 27) ? 'OVERWEIGHT' : 'OBESITAS')) ?> (IMT : <?= $antropometri['imt'] ?>)</td>
                </tr>
                <tr>
                    <td>RPP</td>
                    <td><?php if ($identitas['jenis_kelamin'][0] == 'L') {
                            if ($antropometri['rpp'] == 0.90) {
                                echo 'NORMAL';
                            } elseif ($antropometri['rpp'] > 0.90) {
                                echo 'OBESITAS SENTRAL';
                            } elseif ($antropometri['rpp'] < 0.90) {
                                echo 'OBESITAS PERIFER'; // Kondisi ini mungkin tidak tercapai berdasarkan tabel, tapi baik untuk antisipasi
                            }
                        } elseif ($identitas['jenis_kelamin'][0] == 'P') {
                            if ($antropometri['rpp'] == 0.80) {
                                echo 'NORMAL';
                            } elseif ($antropometri['rpp'] > 0.80) {
                                echo 'OBESITAS SENTRAL';
                            } elseif ($antropometri['rpp'] < 0.80) {
                                echo 'OBESITAS PERIFER'; // Kondisi ini mungkin tidak tercapai berdasarkan tabel, tapi baik untuk antisipasi
                            }
                        } ?> (RPP : <?= $antropometri['rpp'] ?>)</td>
                </tr>
            </table>

            <br>
            <table class="tabel-identitas">
                <tr>
                    <th colspan="2"><b>Vital Sign</b></th>
                </tr>
                <tr>
                    <td width=50%>Suhu</td>
                    <td width=50%><?= $antropometri['suhu'] ?> °C</td>
                </tr>
            </table>
            <br>
            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">Nadi</th>
                </tr>
                <tr>
                    <td width=50%>Frekuensi</td>
                    <td><?= $antropometri['nadi'] ?></td>
                </tr>
                <tr>
                    <td>Irama</td>
                    <td><?= $antropometri['irama'] ?></td>
                </tr>
                <tr>
                    <td>Isi</td>
                    <td><?= $antropometri['isi_nadi'] ?></td>
                </tr>
            </table>
            <br>
            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">Nafas</th>
                </tr>
                <tr>
                    <td width=50%>Frekuensi</td>
                    <td><?= $antropometri['pernapasan'] ?> X/Menit</td>
                </tr>
                <tr>
                    <td>Irama</td>
                    <td><?= $antropometri['irama_nafas'] ?></td>
                </tr>
            </table>
            <br>
            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">Tekanan Darah</th>
                </tr>
                <tr>
                    <td width=50%>Sistolik/Diastolik</td>
                    <td><?= $antropometri['sistol'] ?> / <?= $antropometri['diastol'] ?> MMHG</td>
                </tr>
            </table>
            <br>
            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">Kesimpulan</th>
                </tr>
                <tr>
                    <td width=50%>Kesimpulan</td>
                    <td><?= $antropometri['kesimpulan_umum'] != '' ? $antropometri['kesimpulan'] . ': ' . $antropometri['kesimpulan_umum'] : $antropometri['kesimpulan'] ?></td>
                </tr>
                <tr>
                    <td colspan="2" height=30px style="text-align: right;">Dokter Pemeriksa: <?= ($antropometri['dokter_periksa'] != '' ? $antropometri['dokter_periksa'] : 'PERAWAT GENERAL CHECK UP') ?></td>
                </tr>
            </table>
            <br>

        </div>
    <?php } ?>

    <div id="pemeriksaan_fisik" class="identitas">
        <h2>PEMERIKSAAN FISIK</h2>
        <table class="tabel-identitas">
            <tr>
                <th colspan="2">UMUM</th>
            </tr>
            <tr>
                <td>Keadaan Umum</td>
                <td><?= $pemeriksaan_fisik['keadaan_umum'] ?></td>
            </tr>
            <tr>
                <td>Kesadaran</td>
                <td><?= $pemeriksaan_fisik['kesadaran'] ?></td>
            </tr>
            <tr>
                <td>Gizi</td>
                <td><?= $pemeriksaan_fisik['gizi'] ?></td>
            </tr>
            <tr>
                <td>Sesak Nafas</td>
                <td><?= $pemeriksaan_fisik['sesak_nafas'] ?></td>
            </tr>
            <tr>
                <td>Cyanosis</td>
                <td><?= $pemeriksaan_fisik['cyanosis'] ?></td>
            </tr>
            <tr>
                <td>Kulit</td>
                <td><?= $pemeriksaan_fisik['kulit'] ?></td>
            </tr>
            <tr>
                <td>Kepala</td>
                <td><?= $pemeriksaan_fisik['kepala'] ?></td>
            </tr>
            <tr>
                <td colspan="2" class="catatan">Catatan: <?= $pemeriksaan_fisik['catatan'] ?></td>
            </tr>
        </table>
        <br>

        <table class="tabel-identitas">
            <tr>
                <th colspan="3">MATA</th>
            </tr>
            <tr>
                <td></td>
                <td>Kiri</td>
                <td>Kanan</td>
            </tr>
            <tr>
                <td>Tajam Penglihatan</td>
                <td>-spesialis mata-</td>
                <td>-spesialis mata-</td>
            </tr>
        </table>
        <br>
        <table class="tabel-identitas">
            <tr>
                <th colspan="2">THT</th>
            </tr>
            <tr>
                <td width=50%>Telinga</td>
                <td><?= $pemeriksaan_fisik['telinga'] ?></td>
            </tr>
            <tr>
                <td>Hidung</td>
                <td><?= $pemeriksaan_fisik['hidung'] ?></td>
            </tr>
            <tr>
                <td>Mulut dan Tenggorokan</td>
                <td><?= $pemeriksaan_fisik['mulut'] ?></td>
            </tr>
        </table>
        <br>
        <table class="tabel-identitas">
            <tr>
                <th colspan="2">LEHER</th>
            </tr>
            <tr>
                <td colspan="2"><?= ($pemeriksaan_fisik['cttn_leher'] != '') ? $pemeriksaan_fisik['cttn_leher'] : 'Dalam Batas Normal' ?></td>
            </tr>
        </table>
        <br>
        <table class="tabel-identitas">
            <tr>
                <th colspan="2">DADA</th>
            </tr>
            <tr>
                <td colspan="2"><?= ($pemeriksaan_fisik['cttn_dada'] != '') ? $pemeriksaan_fisik['cttn_dada'] : 'Dalam Batas Normal' ?></td>
            </tr>
        </table>
        <br>
        <table class="tabel-identitas">
            <tr>
                <th colspan="2">PARU</th>
            </tr>
            <tr>
                <td colspan="2"><?= ($pemeriksaan_fisik['cttn_paru'] != '') ? $pemeriksaan_fisik['cttn_paru'] : 'Dalam Batas Normal' ?></td>
            </tr>
        </table>
        <br>
        <table class="tabel-identitas">
            <tr>
                <th colspan="2">JANTUNG</th>
            </tr>
            <tr>
                <td colspan="2"><?= ($pemeriksaan_fisik['cttn_jantung'] != '') ? $pemeriksaan_fisik['cttn_jantung'] : 'Dalam Batas Normal' ?></td>
            </tr>
        </table>
        <br>
        <table class="tabel-identitas">
            <tr>
                <th colspan="2">RONGGA PERUT</th>
            </tr>
            <tr>
                <td colspan="2"><?= ($pemeriksaan_fisik['cttn_perut'] != '') ? $pemeriksaan_fisik['cttn_perut'] : 'Dalam Batas Normal' ?></td>
            </tr>
        </table>
        <br>
        <table class="tabel-identitas">
            <tr>
                <th colspan="2">ANUS & UROGENITAL</th>
            </tr>
            <tr>
                <td colspan="2"><?= ($pemeriksaan_fisik['cttn_urogenital'] != '') ? $pemeriksaan_fisik['cttn_urogenital'] : 'Dalam Batas Normal' ?></td>
            </tr>
        </table>
        <br>
        <table class="tabel-identitas">
            <tr>
                <th colspan="2">ANGGOTA GERAK</th>
            </tr>
            <tr>
                <td colspan="2"><?= ($pemeriksaan_fisik['cttn_anggota_gerak'] != '') ? $pemeriksaan_fisik['cttn_anggota_gerak'] : 'Dalam Batas Normal' ?></td>
            </tr>
        </table>
        <br>
        <table class="tabel-identitas">
            <tr>
                <th colspan="2">NEUROLOGIS</th>
            </tr>
            <tr>
                <td colspan="2"><?= ($pemeriksaan_fisik['cttn_neurologi'] != '') ? $pemeriksaan_fisik['cttn_neurologi'] : 'Dalam Batas Normal' ?></td>
            </tr>
            <tr>
                <td colspan="2" height=30px style="text-align: right;">Dokter Pemeriksa: PERAWAT GENERAL CHECK UP</td>
            </tr>
        </table>
    </div>
    <?php if (!is_null($labor)) { ?>
        <div id="labor" class="identitas">
            <h2>HASIL PEMERIKSAAN LABORATORIUM</h2>
            <table class="tabel-identitas">
                <thead>
                    <tr>
                        <th>PEMERIKSAAN</th>
                        <th>HASIL</th>
                        <th>SATUAN</th>
                        <th>NILAI NORMAL</th>
                        <th>KETERANGAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($labor as $key => $value) {
                    ?>
                        <tr height="40px">
                            <th colspan="5"><b><?= $key ?></b></th>

                        </tr>
                        <?php foreach ($value as $k) { ?>
                            <?php if ($k->VALUE != '!') { ?>

                                <tr height="40px">
                                    <?php if ($k->PARENT == "000000") { ?>
                                        <?php if ($k->TESTTYPE == "U") { ?>
                                            <td><?= $k->TESTNAME ?></td>


                                        <?php } else { ?>
                                            <td><b><?= $k->TESTNAME ?></b></td>

                                        <?php }
                                    } else { ?>
                                        <td><?= $k->TESTNAME ?></td>
                                    <?php } ?>
                                    <td><?php
                                        $flag = ($k->FLAG != "null") ? $k->FLAG : "";
                                        if ($k->VALUE == 'null') {
                                            $nilai = "";
                                        } else {
                                            if ($k->VALUE == "FTEXT") {

                                                $nilai = $k->FREETEXT1;
                                            } else {
                                                $nilai = $k->VALUE;
                                            }
                                        }
                                        if ($flag == 'L') {
                                            echo "<font color='blue'>" . $nilai . "</font>";
                                        } else if ($flag == 'LL') {
                                            echo "<font color='blue'>" . $nilai . "</font>";
                                        } else if ($flag == 'H') {
                                            echo "<font color='red'>" . $nilai . "</font>";
                                        } else if ($flag == 'HH') {
                                            echo "<font color='red'>" . $nilai . "</font>";
                                        } else {
                                            echo $nilai;
                                        }
                                        ?></td>
                                    <td><?= ($k->TESTUNIT != "null") ? $k->TESTUNIT : "" ?></td>
                                    <td><?= ($k->REFRANGE != "null") ? $k->REFRANGE : "" ?></td>
                                    <td><?php
                                        if ($flag == 'L') {
                                            echo  "<font color='blue'>Low</font>";
                                        } else if ($flag == 'LL') {
                                            echo "<font color='blue'>Low Panic</font>";
                                        } else if ($flag == 'H') {
                                            echo "<font color='red'>High</font>";
                                        } else if ($flag == 'HH') {
                                            echo "<font color='red'>High Panic</font>";
                                        } else if ($flag == 'N') {
                                            echo "Normal";
                                        }
                                        ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>

    <?php if (count($radiologi) > 0) { ?>
        <div id="radiologi" class="section">
            <h2>RADIOLOGI</h2>
            <h3>HASIL RADIOLOGI</h3>
            <div>
                <?php $gambar = null;
                foreach ($radiologi as $row1) {
                    if ($row1['gambar'] != "") {
                        foreach (explode(',', $row1['gambar']) as $image) { // 1, 2, 3
                            $gambar .= "<img src='" . base_url('assets/images/') . $image . "' width='500px'><br>";
                            echo $gambar;
                        }
                    }
                } ?>
            </div>
            <h3>EXPERTISE</h3>
            <table class="tabel-identitas">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No. Roentgen</th>
                        <th>Tanggal</th>
                        <th>Expertise</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1;
                    foreach ($radiologi as $row) {
                        if (isset($row['id_expertise'])) {
                    ?>
                            <tr>
                                <td><?= $nomor ?></td>
                                <td><?= $row['id_expertise'] ?></td>
                                <td><?= date('d-m-Y', strtotime($row['tgl'])) ?><br><?= date('H:i:s', strtotime($row['tgl'])) ?></td>
                                <td><?= $row['hasil_pemeriksaan'] ?>
                                    <br>
                                    <p style="text-align: right;">Dokter Pemeriksa : <?= $row['dokter'] ?></p>
                                </td>
                            </tr>
                    <?php $nomor++;
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
    <?php if (!empty($gigi)) { ?>
        <div id="gigi_geligi" class="section">
            <h2>GIGI GELIGI</h2>
            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">Riwayat Penyakit</th>
                </tr>
                <tr>
                    <td width=50%>Penyakit Jantung</td>
                    <td><?= $gigi['penyakit_jantung'] ?></td>
                </tr>
                <tr>
                    <td>Hipertensi</td>
                    <td><?= $gigi['hipertensi'] ?></td>
                </tr>
                <tr>
                    <td>Diabetes Miletus</td>
                    <td><?= $gigi['diabetes_militus'] ?></td>
                </tr>
                <tr>
                    <td>Alergi</td>
                    <td><?= $gigi['alergi'] ?></td>
                </tr>
                <tr>
                    <td>Asma</td>
                    <td><?= $gigi['asma'] ?></td>
                </tr>
                <tr>
                    <td>Kelainan Darah</td>
                    <td><?= $gigi['kelainan_darah'] ?></td>
                </tr>
                <tr>
                    <td>Penyakit Lambung</td>
                    <td><?= $gigi['penyakit_lambung'] ?></td>
                </tr>
                <tr>
                    <td>Psikis Darah</td>
                    <td><?= $gigi['psikis'] ?></td>
                </tr>
                <tr>
                    <td>Hepatitis</td>
                    <td><?= $gigi['hepatitis'] ?></td>
                </tr>
                <tr>
                    <td>Lain-lain</td>
                    <td><?= $gigi['lain_lain'] ?></td>
                </tr>
            </table>
            <br>
            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">Intra Oral</th>
                </tr>
                <tr>
                    <td width=50%>Lidah</td>
                    <td><?= $gigi['lidah'] ?></td>
                </tr>
                <tr>
                    <td>Gingiva</td>
                    <td><?= $gigi['gingiva'] ?></td>
                </tr>
                <tr>
                    <td>Mucossa Pipi</td>
                    <td><?= $gigi['mukosa_pipi'] ?></td>
                </tr>
                <tr>
                    <td>Pallatum</td>
                    <td><?= $gigi['pallatum'] ?></td>
                </tr>
            </table>
            <br>
            <table class="tabel-identitas">
                <tr>
                    <th>Pemeriksaan Odontogram</th>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        // Dekode data JSON menjadi array PHP
                        $data_from_db = json_decode($gigi['odontogram'], true);

                        // Inisialisasi array untuk menyimpan nomor gigi yang terpilih
                        $selected_teeth = [];

                        // Loop melalui data dari database dan masukkan nomor gigi ke dalam array $selected_teeth
                        if (is_array($data_from_db)) {
                            foreach ($data_from_db as $item) {
                                if (isset($item['nomor'])) {
                                    $selected_teeth[] = $item['nomor'];
                                }
                            }
                        }

                        // Sekarang, kita akan menghasilkan HTML odontogram.
                        // Anda bisa menggabungkan ini dengan kode HTML Anda yang sudah ada.
                        $odontogram_html = '<table class="odontogram">';
                        $odontogram_html .= '    <tr class="teeth-row">';
                        $teeth_atas_kanan = [18, 17, 16, 15, 14, 13, 12, 11];
                        foreach ($teeth_atas_kanan as $tooth_number) {
                            $selected_class = in_array($tooth_number, $selected_teeth) ? ' selected' : '';
                            $odontogram_html .= '        <td class="tooth' . $selected_class . '" data-tooth="' . $tooth_number . '">' . $tooth_number . '</td>';
                        }
                        $odontogram_html .= '        <td class="tooth" data-tooth="21">21</td>';
                        $odontogram_html .= '        <td class="tooth" data-tooth="22">22</td>';
                        $odontogram_html .= '        <td class="tooth" data-tooth="23">23</td>';
                        $odontogram_html .= '    </tr>';
                        $odontogram_html .= '    <tr class="teeth-row">';
                        $odontogram_html .= '        <td class="tooth" colspan="3"></td>';
                        $teeth_atas_kiri_belakang = [24, 25, 26, 27, 28];
                        foreach ($teeth_atas_kiri_belakang as $tooth_number) {
                            $selected_class = in_array($tooth_number, $selected_teeth) ? ' selected' : '';
                            $odontogram_html .= '        <td class="tooth' . $selected_class . '" data-tooth="' . $tooth_number . '">' . $tooth_number . '</td>';
                        }
                        $odontogram_html .= '        <td class="tooth" colspan="3"></td>';
                        $odontogram_html .= '    </tr>';
                        $odontogram_html .= '    <tr class="teeth-row">';
                        $odontogram_html .= '        <td style="margin-left: 105px;" class="tooth" data-tooth="55">55</td>';
                        $teeth_susu_atas_kanan = [54, 53, 52, 51];
                        foreach ($teeth_susu_atas_kanan as $tooth_number) {
                            $selected_class = in_array($tooth_number, $selected_teeth) ? ' selected' : '';
                            $odontogram_html .= '        <td class="tooth' . $selected_class . '" data-tooth="' . $tooth_number . '">' . $tooth_number . '</td>';
                        }
                        $teeth_susu_atas_kiri = [61, 62, 63, 64, 65];
                        foreach ($teeth_susu_atas_kiri as $tooth_number) {
                            $selected_class = in_array($tooth_number, $selected_teeth) ? ' selected' : '';
                            $odontogram_html .= '        <td class="tooth' . $selected_class . '" data-tooth="' . $tooth_number . '">' . $tooth_number . '</td>';
                        }
                        $odontogram_html .= '    </tr>';
                        $odontogram_html .= '    <tr class="teeth-row">';
                        $odontogram_html .= '        <td style="margin-left: 173px;" class="tooth" data-tooth="85">85</td>';
                        $teeth_susu_bawah_kanan = [84, 83, 82, 81];
                        foreach ($teeth_susu_bawah_kanan as $tooth_number) {
                            $selected_class = in_array($tooth_number, $selected_teeth) ? ' selected' : '';
                            $odontogram_html .= '        <td class="tooth' . $selected_class . '" data-tooth="' . $tooth_number . '">' . $tooth_number . '</td>';
                        }
                        $teeth_susu_bawah_kiri = [71, 72, 73, 74, 75];
                        foreach ($teeth_susu_bawah_kiri as $tooth_number) {
                            $selected_class = in_array($tooth_number, $selected_teeth) ? ' selected' : '';
                            $odontogram_html .= '        <td class="tooth' . $selected_class . '" data-tooth="' . $tooth_number . '">' . $tooth_number . '</td>';
                        }
                        $odontogram_html .= '    </tr>';
                        $odontogram_html .= '    <tr class="teeth-row">';
                        $odontogram_html .= '        <td colspan="3"></td>';
                        $teeth_bawah_kanan_belakang = [48, 47, 46, 45, 44];
                        foreach ($teeth_bawah_kanan_belakang as $tooth_number) {
                            $selected_class = in_array($tooth_number, $selected_teeth) ? ' selected' : '';
                            $odontogram_html .= '        <td class="tooth' . $selected_class . '" data-tooth="' . $tooth_number . '">' . $tooth_number . '</td>';
                        }
                        $odontogram_html .= '        <td colspan="3"></td>';
                        $odontogram_html .= '    </tr>';
                        $odontogram_html .= '    <tr class="teeth-row">';
                        $teeth_bawah_kanan_depan = [43, 42, 41];
                        $teeth_bawah_kiri_depan = [31, 32, 33];
                        $teeth_bawah_kiri_belakang = [34, 35, 36, 37, 38];

                        foreach ($teeth_bawah_kanan_depan as $tooth_number) {
                            $selected_class = in_array($tooth_number, $selected_teeth) ? ' selected' : '';
                            $odontogram_html .= '        <td class="tooth' . $selected_class . '" data-tooth="' . $tooth_number . '">' . $tooth_number . '</td>';
                        }
                        foreach ($teeth_bawah_kiri_depan as $tooth_number) {
                            $selected_class = in_array($tooth_number, $selected_teeth) ? ' selected' : '';
                            $odontogram_html .= '        <td class="tooth' . $selected_class . '" data-tooth="' . $tooth_number . '">' . $tooth_number . '</td>';
                        }
                        foreach ($teeth_bawah_kiri_belakang as $tooth_number) {
                            $selected_class = in_array($tooth_number, $selected_teeth) ? ' selected' : '';
                            $odontogram_html .= '        <td class="tooth' . $selected_class . '" data-tooth="' . $tooth_number . '">' . $tooth_number . '</td>';
                        }
                        $odontogram_html .= '    </tr>';
                        $odontogram_html .= '</table>';

                        echo $odontogram_html;

                        ?>
                    </td>
                </tr>
            </table>
            <br>
            <table class="tabel-identitas">
                <?php $isian_odontogram = [];

                // Loop melalui data dari database dan masukkan informasi ke dalam array isian_odontogram
                if (is_array($data_from_db)) {
                    foreach ($data_from_db as $item) {
                        if (isset($item['nomor']) && isset($item['pilihan']) && isset($item['keterangan'])) {
                            $isian_odontogram[$item['nomor']] = [
                                'pilihan' => $item['pilihan'],
                                'keterangan' => $item['keterangan']
                            ];
                        }
                    }
                }
                // Array yang merepresentasikan urutan gigi pada odontogram (sesuai gambar)
                // $urutan_gigi = [14, 24, 25, 16, 26, 17, 27, 18, 28, 35, 45, 36, 46, 37, 47, 38, 48];
                $isian_odontogram_html = '    <tr><th colspan="3">ISIAN ODONTOGRAM</th></tr>';
                foreach ($data_from_db as $row) {
                    // if (isset($isian_odontogram[$nomor_gigi])) {
                    $isian_odontogram_html .= '    <tr><td>Gigi: ' . $row['nomor'] . '</td><td>' . $isian_odontogram[$row['nomor']]['pilihan'] . '</td><td>Keterangan: ' . $isian_odontogram[$row['nomor']]['keterangan'] . '</td></tr>';
                    // }
                }

                echo $isian_odontogram_html; ?>
            </table>
            <br>
            <table class="tabel-identitas">
                <tr>
                    <th>KESIMPULAN</th>
                </tr>
                <tr>
                    <td style="background-color: white;"><?= $gigi['kesimpulan'] ?>
                    </td>
                </tr>
                <tr>
                    <td height=30px>Dokter Pemeriksa: <?= $gigi['dokter_periksa'] ?></td>
                </tr>
            </table>

        </div>
    <?php } ?>
    <?php if (!empty($kardiologi)) { ?>
        <div id="kardiologi" class="section">
            <h2>KARDIOLOGI</h2>
            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">NADI</th>
                </tr>
            </table>
            <br>
            <table class="tabel-identitas">

                <tr>
                    <th colspan="2">ECG</th>
                </tr>
                <tr>
                    <td>Irama</td>
                    <td><?= $kardiologi['irama_ecg'] ?></td>
                </tr>
                <tr>
                    <td>Rotation</td>
                    <td><?= $kardiologi['rotation_ecg'] ?></td>
                </tr>
                <tr>
                    <td>Atrial Rate</td>
                    <td><?= $kardiologi['atrail_rate'] ?> X / MENIT</td>
                </tr>
                <tr>
                    <td>Ventricular Rate</td>
                    <td><?= $kardiologi['ventricular_rate_ecg'] ?></td>
                </tr>
                <tr>
                    <td>P-R Interval</td>
                    <td><?= $kardiologi['pr_interval_ecg'] ?></td>
                </tr>
                <tr>
                    <td>QRS Interval</td>
                    <td><?= $kardiologi['qrs_interval_ecg'] ?></td>
                </tr>
                <tr>
                    <td>Q-T Interval</td>
                    <td><?= $kardiologi['qt_interval_ecg'] ?></td>
                </tr>
                <tr>
                    <td>Gelombang P</td>
                    <td><?= $kardiologi['gelombang_p_ecg'] ?></td>
                </tr>
                <tr>
                    <td>Gelombang QRS</td>
                    <td><?= $kardiologi['gelombang_qrs_ecg'] ?></td>
                </tr>
                <tr>
                    <td>Gelombang ST</td>
                    <td><?= $kardiologi['gelombang_st_ecg'] ?></td>
                <tr>
                    <td>Gelombang T</td>
                    <td><?= $kardiologi['gelombang_t_ecg'] ?></td>
                </tr>
                <tr>
                    <td>Gelombang U</td>
                    <td><?= $kardiologi['gelombang_u_ecg'] ?></td>
                </tr>
                <tr>
                    <th colspan="2">KESIMPULAN</th>
                </tr>
                <tr>
                    <td colspan="2" style="background-color: white;"><?= $kardiologi['kesimpulan'] ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" height=30px style="text-align: right;">Dokter Pemeriksa: <?= $kardiologi['dokter_periksa'] ?></td>
                </tr>
            </table>

            <div>
                <?php
                $gambar = null;
                if ($kardiologi['dokumen_periksa_ekg'] != "") {
                    foreach (explode(',', $kardiologi['dokumen_periksa_ekg']) as $image) {
                        $gambar .= "<img src='" . base_url('assets/upload_mcu/') . $image . "' width='500px'><br>";
                        echo $gambar;
                    }
                }
                if ($kardiologi['dokumen_periksa_echo'] != "") {
                    foreach (explode(',', $kardiologi['dokumen_periksa_echo']) as $image) {
                        $gambar .= "<img src='" . base_url('assets/upload_mcu/') . $image . "' width='500px'><br>";
                        echo $gambar;
                    }
                }
                if ($kardiologi['dokumen_periksa_treadmil'] != "") {
                    foreach (explode(',', $kardiologi['dokumen_periksa_treadmil']) as $image) {
                        $gambar .= "<img src='" . base_url('assets/upload_mcu/') . $image . "' width='500px'><br>";
                        echo $gambar;
                    }
                }
                ?>
            </div>
        </div>
    <?php } ?>
    <?php if (!empty($tht)) { ?>
        <div id="tht" class="section">
            <h2>THT</h2>
            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">TELINGA</th>
                </tr>
                <tr>
                    <td width="50%">Auricula</td>
                    <td width="50%"><?= $tht['auricula'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Canalis Auditorius Externus</td>
                    <td width="50%"><?= $tht['canalis_auditorius_externus'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Kulit Canalis</td>
                    <td width="50%"><?= $tht['kulit_canalis'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Discharge</td>
                    <td width="50%"><?= $tht['discharge'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Membran Tympani</td>
                    <td width="50%"><?= $tht['membran_tympani'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Cavum Tympani</td>
                    <td width="50%"><?= $tht['cavum_tympani'] ?></td>
                </tr>
            </table>

            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">HIDUNG</th>
                </tr>
                <tr>
                    <td width="50%">Mucosa Cavum Nasi</td>
                    <td width="50%"><?= $tht['mucosa_cavum_nasi'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Concha</td>
                    <td width="50%"><?= $tht['concha'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Septum Nasi</td>
                    <td width="50%"><?= $tht['septum_nasi'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Dishcarge</td>
                    <td width="50%"><?= $tht['dishcarge'] ?></td>
                </tr>
            </table>

            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">TENGGOROKAN</th>
                </tr>
                <tr>
                    <td width="50%">Pharynx</td>
                    <td width="50%"><?= $tht['pharynx'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Naso Pharynx</td>
                    <td width="50%"><?= $tht['naso_pharynx'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Oro Pharynx</td>
                    <td width="50%"><?= $tht['oro_pharynx'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Laryngo Pharynx</td>
                    <td width="50%"><?= $tht['laryngo_pharynx'] ?></td>
                </tr>
            </table>

            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">LARYNX</th>
                </tr>
                <tr>
                    <td width="50%">Supra Glotis</td>
                    <td width="50%"><?= $tht['supra_glotis'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Glotis</td>
                    <td width="50%"><?= $tht['glotis'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Sub Glotis</td>
                    <td width="50%"><?= $tht['sub_glotis'] ?></td>
                </tr>
            </table>

            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">AUDIOMETRI</th>
                </tr>
                <tr>
                    <td width="50%">Pure Tone Audiometri</td>
                    <td width="50%"><?= $tht['pure_tone_audiometri'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Sisi Test</td>
                    <td width="50%"><?= $tht['sisi_test'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Tone Decay</td>
                    <td width="50%"><?= $tht['tone_decay'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Impedance</td>
                    <td width="50%"><?= $tht['impedance'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Speech Audiometri</td>
                    <td width="50%"><?= $tht['speech_audiometri'] ?></td>
                </tr>
                <tr>
                    <th colspan="2">KESIMPULAN</th>
                </tr>
                <tr>
                    <td colspan="2" style="background-color: white;"><?= $tht['kesimpulan'] ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" height=30px style="text-align: right;">Dokter Pemeriksa: <?= $tht['dokter_periksa'] ?></td>
                </tr>
            </table>
        </div>
    <?php } ?>
    <?php if (!empty($audiometri)) { ?>
        <div id="audiometri" class="section">
            <h2>AUDIOMETRI</h2>
            <table class="tabel-identitas">
                <tr>
                    <th>TELINGA KIRI</th>
                    <th>TELINGA KANAN</th>
                </tr>
                <tr>
                    <td style="background-color: white;" width="50%"><?= $audiometri['telinga_kiri'] ?></td>
                    <td style="background-color: white;" width="50%"><?= $audiometri['telinga_kanan'] ?></td>
                </tr>
            </table>
            <br>
            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">KESIMPULAN</th>
                </tr>
                <tr>
                    <td colspan="2" style="background-color: white;"><?= $audiometri['kesimpulan'] ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" height=30px style="text-align: right;">Dokter Pemeriksa: <?= $audiometri['dokter_periksa'] ?></td>
                </tr>
            </table>
        </div>
    <?php } ?>
    <?php if (!empty($paru)) { ?>
        <div id="paru" class="section">
            <h2>PARU</h2>

            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">INSPEKSI</th>
                </tr>
                <tr>
                    <td width="50%">Statis</td>
                    <td width="50%"><?= $paru['statis'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Dinamis</td>
                    <td width="50%"><?= $paru['dinamis'] ?></td>
                </tr>
            </table>

            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">PALPASI</th>
                </tr>
                <tr>
                    <td style="background-color: white;" width="50%">Premitus</td>
                    <td width="50%"><?= $paru['premitus'] ?></td>
                </tr>
            </table>

            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">PERKUSI</th>
                </tr>
                <tr>
                    <td style="background-color: white;" width="50%">Bunyi Ketok Dada</td>
                    <td width="50%"><?= $paru['bunyi_ketok_dada'] ?></td>
                </tr>
            </table>

            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">AUSKULTASI</th>
                </tr>
                <tr>
                    <td width="50%">Suara Nafas Utama</td>
                    <td width="50%"><?= $paru['suara_nafas_utama'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Suara Nafas Tambahan</td>
                    <td width="50%"><?= $paru['suara_nafas_tambahan'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Rhonki</td>
                    <td width="50%"><?= $paru['rhonki'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Wheezing</td>
                    <td width="50%"><?= $paru['wheezing'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Lain-lain</td>
                    <td width="50%"><?= $paru['lainLain'] ?></td>
                </tr>
                <tr>
                    <th colspan="2">KESIMPULAN</th>
                </tr>
                <tr>
                    <td colspan="2" style="background-color: white;"><?= $paru['kesimpulan'] ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" height=30px style="text-align: right;">Dokter Pemeriksa: <?= $paru['dokter_periksa'] ?></td>
                </tr>
            </table>
        </div>
    <?php } ?>
    <?php if (!empty($spirometri)) { ?>
        <div id="spirometri" class="section">

            <h2>SPIROMETRI</h2>
            <table class="tabel-identitas">
                <thead>
                    <tr>
                        <th>UNSUR</th>
                        <th>VOL PREDIKSI</th>
                        <th>HASIL UKUR</th>
                        <th>PERSEN (%)</th>
                        <th>NORMAL (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>FVC (KVP)</td>
                        <td><?= $spirometri['prediksi_fvc'] ?></td>
                        <td><?= $spirometri['hasil_fvc'] ?></td>
                        <td><?= $spirometri['persen_fvc'] ?></td>
                        <td>> 80</td>
                    </tr>

                    <tr>
                        <td>FEV1 (VEP1)</td>
                        <td><?= $spirometri['prediksi_FEV1'] ?></td>
                        <td><?= $spirometri['hasil_FEV1'] ?></td>
                        <td><?= $spirometri['persen_FEV1'] ?></td>
                        <td>> 75</td>
                    </tr>

                    <tr>
                        <td>FEV1 / FVC (VEP1/KVP)</td>
                        <td><?= $spirometri['prediksi_fvc_fev'] ?></td>
                        <td><?= $spirometri['hasil_fvc_fev'] ?></td>
                        <td><?= $spirometri['persen_fvc_fev'] ?></td>
                        <td>> 75</td>
                    </tr>
                    <tr>
                        <td width=50%>Kesimpulan</td>
                        <td colspan="4"><?= $spirometri['kesimpulan'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="5" height=30px style="text-align: right;">Dokter Pemeriksa: <?= $spirometri['dokter_periksa'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>
    <?php if (!empty($mata)) { ?>
        <div id="mata" class="section">
            <h2>MATA</h2>
            <table class="tabel-identitas">
                <thead>
                    <tr>
                        <th></th>
                        <th>KIRI</th>
                        <th>KANAN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tajam Penglihatan Visus</td>
                        <td><?= $mata['tajam_kiri'] ?></td>
                        <td><?= $mata['tajam_kanan'] ?></td>
                    </tr>
                    <tr>
                        <td>Bino Kularis</td>
                        <td><?= $mata['binokularitas_kiri'] ?></td>
                        <td><?= $mata['binokularitas_kanan'] ?></td>
                    </tr>
                    <tr>
                        <td>Kedalaman</td>
                        <td><?= $mata['kedalaman_kiri'] ?></td>
                        <td><?= $mata['kedalaman_kanan'] ?></td>
                    </tr>
                    <tr>
                        <td>Lapang Pandang</td>
                        <td><?= $mata['lapang_pandang_kiri'] ?></td>
                        <td><?= $mata['lapang_pandang_kanan'] ?></td>
                    </tr>
                    <tr>
                        <td>Diferensiasi Warna</td>
                        <td><?= $mata['diferensiasi_warna_kiri'] ?></td>
                        <td><?= $mata['diferensiasi_warna_kanan'] ?></td>
                    </tr>
                    <tr>
                        <td>Stereognosis</td>
                        <td><?= $mata['stereognosis_kiri'] ?></td>
                        <td><?= $mata['stereognosis_kanan'] ?></td>
                    </tr>
                    <tr>
                        <td>Fundus</td>
                        <td><?= $mata['fundus_kiri'] ?></td>
                        <td><?= $mata['fundus_kanan'] ?></td>
                    </tr>
                    <tr>
                        <td>Media Refraksi</td>
                        <td><?= $mata['media_refraksi_kiri'] ?></td>
                        <td><?= $mata['media_refraksi_kanan'] ?></td>
                    </tr>
                    <tr>
                        <td>Papil Optik</td>
                        <td><?= $mata['papil_optik_kiri'] ?></td>
                        <td><?= $mata['papil_optik_kanan'] ?></td>
                    </tr>
                    <tr>
                        <td>Makula Lutea</td>
                        <td><?= $mata['makula_lutea_kiri'] ?></td>
                        <td><?= $mata['makula_lutea_kanan'] ?></td>
                    </tr>
                    <tr>
                        <td>Retina</td>
                        <td><?= $mata['retina_kiri'] ?></td>
                        <td><?= $mata['retina_kanan'] ?></td>
                    </tr>
                    <tr>
                        <td>Tekanan Bola Mata</td>
                        <td><?= $mata['tekanan_bola_mata_kiri'] ?></td>
                        <td><?= $mata['tekanan_bola_mata_kanan'] ?></td>
                    </tr>
                    <tr>
                        <td>Ishihara</td>
                        <td><?= $mata['ishihara_kiri'] ?></td>
                        <td><?= $mata['ishihara_kanan'] ?></td>
                    </tr>
                    <tr>
                        <td>Amsler Grid</td>
                        <td><?= $mata['amsler_grid_kiri'] ?></td>
                        <td><?= $mata['amsler_grid_kanan'] ?></td>
                    </tr>
                    <tr>
                        <td>Balik Mata Depan</td>
                        <td><?= $mata['balik_mata_depan_kiri'] ?></td>
                        <td><?= $mata['balik_mata_depan_kanan'] ?></td>
                    </tr>
                    <tr>
                        <td width=40%>Kesimpulan</td>
                        <td colspan="2"><?= $mata['kesimpulan'] ?> (saran : <?= $mata['saran'] ?>)</td>
                    </tr>
                    <tr>
                        <td colspan="3" height=30px style="text-align: right;">Dokter Pemeriksa: <?= $mata['dokter_periksa'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>
    <?php if (!empty($neurologi)) { ?>
        <div id="neurologi" class="section">
            <h2>NEUROLOGI</h2>

            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">RANGSANG MENINGEAL</th>
                </tr>
                <tr>
                    <td width="50%">Kaku Duduk</td>
                    <td width="50%"><?= $neurologi['kaku_duduk'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Laseque</td>
                    <td width="50%"><?= $neurologi['laseque'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Kernig</td>
                    <td width="50%"><?= $neurologi['kernig'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Bruzinski I</td>
                    <td width="50%"><?= $neurologi['bruzinskiI'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Bruzinski II</td>
                    <td width="50%"><?= $neurologi['bruzinski2'] ?></td>
                </tr>
            </table>

            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">SARAF OTAK</th>
                </tr>
                <tr>
                    <td width="50%">N I (Olfaktorius):</td>
                    <td width="50%"><?= $neurologi['olfaktorius'] ?></td>
                </tr>
                <tr>
                    <td width="50%">N II (Optikus):</td>
                    <td width="50%"><?= $neurologi['optikus'] ?></td>
                </tr>
                <tr>
                    <td width="50%">N III (Okulomotorius):</td>
                    <td width="50%"><?= $neurologi['okulomotorius'] ?></td>
                </tr>
                <tr>
                    <td width="50%">N IV (Troklearis):</td>
                    <td width="50%"><?= $neurologi['troklearis'] ?></td>
                </tr>
                <tr>
                    <td width="50%">N V (Trigeminus):</td>
                    <td width="50%"><?= $neurologi['trigeminus'] ?></td>
                </tr>
                <tr>
                    <td width="50%">N VI (Abducens):</td>
                    <td width="50%"><?= $neurologi['abducens'] ?></td>
                </tr>
                <tr>
                    <td width="50%">N VII (Fasialis):</td>
                    <td width="50%"><?= $neurologi['fasialis'] ?></td>
                </tr>
                <tr>
                    <td width="50%">N VIII (Vestibulo Koklearis):</td>
                    <td width="50%"><?= $neurologi['vestibulo_koklearis'] ?></td>
                </tr>
                <tr>
                    <td width="50%">N IX (Glosofaringeus):</td>
                    <td width="50%"><?= $neurologi['glosofaringeus'] ?></td>
                </tr>
                <tr>
                    <td width="50%">N X (Vagus):</td>
                    <td width="50%"><?= $neurologi['vagus'] ?></td>
                </tr>
                <tr>
                    <td width="50%">N XI (Asesorius):</td>
                    <td width="50%"><?= $neurologi['asesorius'] ?></td>
                </tr>
                <tr>
                    <td width="50%">N XII (Hipoglosus):</td>
                    <td width="50%"><?= $neurologi['hipoglosus'] ?></td>
                </tr>
            </table>

            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">SISTEM MOTORIK</th>
                </tr>
                <tr>
                    <td width="50%">Anggota Gerak Atas:</td>
                    <td width="50%"><?= $neurologi['motorik_anggota_gerak_atas'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Anggota Gerak Bawah:</td>
                    <td width="50%"><?= $neurologi['motorik_anggota_gerak_bawah'] ?></td>
                </tr>
            </table>

            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">SISTEM SENSIBILITAS</th>
                </tr>
                <tr>
                    <td width="50%">Anggota Gerak Atas:</td>
                    <td width="50%"><?= $neurologi['sensibilitas_anggota_gerak_atas'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Anggota Gerak Bawah:</td>
                    <td width="50%"><?= $neurologi['sensibilitas_anggota_gerak_bawah'] ?></td>
                </tr>
            </table>

            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">REFLEKS</th>
                </tr>
                <tr>
                    <td width="50%">Refleks Fisiologis:</td>
                    <td width="50%"><?= $neurologi['refleks_fisiologis'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Refleks Patologis:</td>
                    <td width="50%"><?= $neurologi['refleks_patologis'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Koordinasi:</td>
                    <td width="50%"><?= $neurologi['koordinasi'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Vegetatif:</td>
                    <td width="50%"><?= $neurologi['vegetatif'] ?></td>
                </tr>
            </table>

            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">FUNGSI LUHUR</th>
                </tr>
                <tr>
                    <td width="50%">Bicara Spontan:</td>
                    <td width="50%"><?= $neurologi['bicara_spontan'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Mengerti Pembicaraan:</td>
                    <td width="50%"><?= $neurologi['mengerti_pembicaraan'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Menghitung:</td>
                    <td width="50%"><?= $neurologi['menghitung'] ?></td>
                </tr>
                <tr>
                    <td width="50%">Daya Ingat:</td>
                    <td width="50%"><?= $neurologi['daya_ingat'] ?></td>
                </tr>
            </table>

            <table class="tabel-identitas">
                <tr>
                    <th colspan="2">TANDA REGRESI</th>
                </tr>
                <tr>
                    <td width="50%">Tanda Regresi:</td>
                    <td width="50%"><?= $neurologi['tandaRegresi'] ?></td>
                </tr>
                <tr>
                    <th colspan="2">KESIMPULAN</th>
                </tr>
                <tr>
                    <td colspan="2" style="background-color: white;"><?= $neurologi['kesimpulan'] ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" height=30px style="text-align: right;">Dokter Pemeriksa: <?= $neurologi['dokter_periksa'] ?></td>
                </tr>
            </table>
        </div>
    <?php } ?>
    <?php if (!empty($bedah)) { ?>
        <div id="bedah" class="section">
            <h2>BEDAH</h2>
            <table class="tabel-identitas">
                <tr>
                    <td width="50%">KELUHAN</td>
                    <td width="50%"><?= $bedah['keluhan'] ?></td>
                </tr>
                <tr>
                    <td width="50%">STATUS LOKALIS</td>
                    <td width="50%"><?= $bedah['status_lokalis'] ?></td>
                </tr>
                <tr>
                    <td width="50%">HERNIA</td>
                    <td width="50%"><?= $bedah['hernia'] ?></td>
                </tr>
                <tr>
                    <td width="50%">VARICES TUNGKAI</td>
                    <td width="50%"><?= $bedah['varices_tungkai'] ?></td>
                </tr>
                <tr>
                    <td width="50%">HAEMORRHOIDS</td>
                    <td width="50%"><?= $bedah['haemorrhoids'] ?></td>
                </tr>
                <tr>
                    <td width="50%">BENJOLAN</td>
                    <td width="50%"><?= $bedah['benjolan'] ?></td>
                </tr>
                <tr>
                    <th colspan="2">KESIMPULAN</th>
                </tr>
                <tr>
                    <td colspan="2" style="background-color: white;"><?= $bedah['kesimpulan'] ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" height=30px style="text-align: right;">Dokter Pemeriksa: <?= $bedah['dokter_periksa'] ?></td>
                </tr>
            </table>
        </div>
    <?php } ?>
    <?php if (!empty($kebidanan)) { ?>
        <div id="kebidanan" class="section">
            <h2>KEBIDANAN</h2>
            <table class="tabel-identitas">
                <tbody>
                    <tr>
                        <td>Temuan</td>
                        <td><?= $kebidanan['temuan'] ?></td>
                    </tr>

                    <tr>
                        <td width=50%>Kesimpulan</td>
                        <td><?= $kebidanan['kesimpulan'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" height=30px style="text-align: right;">Dokter Pemeriksa: BIDAN</td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>

    <!-- <div id="penghalang" class="identitas"></div> -->
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <div id="kesimpulan_klinis" class="section">
        <h2>KESIMPULAN KLINIS</h2>
        <table class="tabel-identitas">
            <tr>
                <th>Deskripsi Dengan Temuan</th>
            </tr>
            <?php
            if (!empty($klinis_col)) {
                foreach ($klinis_col as $key => $value) {
                    if (!empty($value) && !is_null($value) && $value != 'null') {
                        echo "<tr>";

                        if (
                            $key === 'pemeriksaan_fisik' ||
                            $key === 'kesimpulan_spesialis'
                        ) {
                            $jsonData = null;
                            if (is_string($value)) { // Tambahkan pengecekan apakah $value adalah string
                                $jsonData = json_decode($value, true);
                            }
                            // print_arr($jsonData);
                            if (is_array($jsonData)) { // Tambahkan pengecekan apakah $jsonData adalah array

                                echo "<td>";
                                foreach ($jsonData as $jsonKey => $jsonValue) {
                                    //     if (!empty($jsonValue)) {
                                    echo "- " . htmlspecialchars($jsonValue) . "<br>";
                                    //     }
                                }
                                echo "</td>";
                            }
                        } else if (
                            $key === 'kesimpulan_labor' || $key === 'kesimpulan_radiologi'
                        ) {
                            $jsonData = null;
                            if (is_string($value)) { // Tambahkan pengecekan apakah $value adalah string
                                $jsonData = json_decode($value, true);
                            }
                            // print_arr($jsonData);
                            if (is_array($jsonData)) { // Tambahkan pengecekan apakah $jsonData adalah array

                                echo "<td>";
                                foreach ($jsonData as $rows) {
                                    foreach ($rows as $jsonKey => $jsonValue) {
                                        if ($jsonKey == 'kesimpulan') {
                                            echo "- " . htmlspecialchars($jsonValue) . "<br>";
                                        }
                                    }
                                }
                                echo "</td>";
                            }
                        } else {
                            echo "<td>- " . htmlspecialchars($value) . "</td>";
                        }
                        echo "</tr>";
                    }
                }
            } else { ?>
                <tr>
                    <td> - </td>
                </tr>
            <?php } ?>



        </table>
        <br>
        <table class="tabel-identitas">
            <tr>
                <th>SARAN KLINIS</th>
            </tr>
            <?php
            if (isset($klinis['saran_klinis'])) {
                $db_saranKlinis = explode(';', $klinis['saran_klinis']);
                foreach ($db_saranKlinis as $row) {
            ?>
                    <tr>
                        <td>- <?= $row ?></td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td>PERTAHANKAN KESEHATAN ANDA</td>
                </tr>
            <?php } ?>
        </table>
        <br>

        <table class="tabel-identitas">
            <tr>
                <th>KONSULTASIKAN KESEHATAN ANDA PADA DOKTER</th>
            </tr>
            <?php
            if (isset($klinis['konsul_ke'])) {
                $db_konsul = explode(';', $klinis['konsul_ke']);
                foreach ($db_konsul as $row) {
            ?>
                    <tr>
                        <td>- <?= $row ?></td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td>-</td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div id="kesimpulan_okupasi" class="section">
        <h2>KESIMPULAN OKUPASI</h2>
        <table class="tabel-identitas">
            <tr>
                <th>KESIMPULAN OKUPASI</th>
            </tr>
            <tr>
                <td><?= isset($okupasi['kesimpulan_okupasi']) ? $okupasi['kesimpulan_okupasi'] : 'Dicurigai Berhubung Dengan Pekerjaan' ?></td>
            </tr>
        </table>
        <br>

        <table class="tabel-identitas">
            <tr>
                <th>REKOMENDASI OKUPASI</th>
            </tr>
            <?php
            if (isset($okupasi['rekomendasi_okupasi'])) {
                $rekomendasi_okupasi = explode(';', $okupasi['rekomendasi_okupasi']);
                foreach ($rekomendasi_okupasi as $row) {
            ?>
                    <tr>
                        <td>- <?= $row ?></td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td>Sehat Untuk Bekerja (Fit To Work)</td>
                </tr>
            <?php } ?>
        </table>
        <br>

        <table class="tabel-identitas">
            <tr>
                <th>STATUS DERAJAT KESEHATAN</th>
            </tr>
            <tr>
                <td><?= isset($okupasi['status_kesehatan']) ? $okupasi['status_kesehatan'] : 'P1. Tidak ditemukan kelainan medis' ?></td>
            </tr>
        </table>
        <br>

        <table class="tabel-identitas">
            <tr>
                <th>RESIKO SKJ</th>
            </tr>
            <tr>
                <td><?= isset($okupasi['resiko_skj']) ? $okupasi['resiko_skj'] : 'Ringan' ?></td>
            </tr>
        </table>
        <br>

        <table class="tabel-identitas">
            <tr>
                <th>ULANGI PEMERIKSAAN <u><?= isset($okupasi['ulangi_pemeriksaan']) ? strtoupper($okupasi['ulangi_pemeriksaan']) : '' ?></u></th>
            </tr>
        </table>
    </div>
    <div class="tanda-tangan">
        <div class="text-tangan">

            <div class="alamat">
                Pangkalpinang, <?= indo_date($identitas['tanggal']) ?><br>
                Penguji Kesehatan Tenaga Kerja
            </div>
            <div class="qr-code">
                <img src="<?php echo $qr_code_image; ?>" alt="QR Code" width="100px">
            </div>
            <div class="nama-dokter">
                <?php
                echo $staff; ?>
            </div>
            <div class="penanggung-jawab">
                Penanggung Jawab
            </div>
        </div>
    </div>
    <style>
        .odontogram {
            position: center;
        }

        .tooth {
            justify-content: center;
            align-items: center;
            font-size: 17px;
            color: black;
            background-color: white;
        }

        .tooth.selected {
            background-color: grey;
        }
    </style>
</body>

</html>