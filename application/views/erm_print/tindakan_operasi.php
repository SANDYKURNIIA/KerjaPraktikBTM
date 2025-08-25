<!DOCTYPE html>
<html>

<head>
    <title>RESUME MEDIS</title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;

        }

        .table-2 {
            margin: auto;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .table1+.table2 {
            margin-top: 20px;
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

        td.nama {
            vertical-align: bottom;

        }

        td.atas {
            vertical-align: top;
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

        td.label-colon {
            width: 5px;
        }

        th.judul {
            text-align: left;
        }

        td.garis {
            border: 1px solid black;
        }

        label.nama-bawah {
            vertical-align: bottom;
        }
        table:nth-of-type(3) {
      page-break-after: always;
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
                    <h1>Tindakan Operasi</h1>
                </td>
            </tr>
        </table>
        <hr>
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td width="220">Ruang</td>
                <td width="22">:</td>
                <td width="220" class=gariskanan><?= $data['ruang'] ?></td>
                <td width="220">Nomor RM</td>
                <td width="22">:</td>
                <td width="220" class=gariskanan><?= $data['no_rm'] ?></td>

            </tr>
            <tr widht="100%">
                <td width="220">Kelas</td>
                <td width="22">:</td>
                <td width="220" class=gariskanan><?= $data['kelas'] ?></td>
                <td width="220">Nama Pasien</td>
                <td width="22">:</td>
                <td width="220" class=gariskanan><?= $data['nama'] ?></td>
            </tr>

            <tr class="garisbawah ">
                <td width="220">Jenis Kelamin</td>
                <td width="22">:</td>
                <td width="220" class=gariskanan><?= $data['jenis_kelamin'] ?></td>
                <td width="220">Tanggal Lahir</td>
                <td width="22">:</td>
                <td width="220" class=gariskanan><?= $data['tgl_lahir'] ?></td>
            </tr>




            <!--batas-->

            <tr>
                <td colspan=8>
                    <center>Surat Izin Operasi : Ada / Tidak ada, Mohon Dilampirkan</center>
                </td>
            </tr>

        </table>

        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td colspan="2" style="border-right: 1px solid black;">
                    <center>Nama Ahli Bedah</center>

                </td>
                <td colspan="2" width="150" style="border-right: 1px solid black;">
                    <center>Nama Perawat</center>
                </td>
                <td colspan="2" style="border-right: 1px solid black;">
                    <center>Nama Asisten I</center>
                </td>
                <td colspan="2" style="border-right: 1px solid black;">
                    <center>Nama Asisten II</center>
                </td>
            </tr>
            <tr height="50">
                <td colspan="2" class="nama" style="border-right: 1px solid black; border-bottom: 1px solid black;">
                    <center><?= $data['ahlibedah'] ?></center>
                </td>
                <td colspan="2" width="150" class="nama" style="border-right: 1px solid black; border-bottom: 1px solid black;">
                    <center><?= $data['perawat'] ?></center>
                </td>
                <td colspan="2" class="nama" style="border-right: 1px solid black; border-bottom: 1px solid black;">
                    <center><?= $data['asisten1'] ?></center>
                </td>
                <td colspan="2" class="nama" style="border-right: 1px solid black; border-bottom: 1px solid black;">
                    <center><?= $data['asisten2'] ?></center>
                </td>
            </tr>

            <tr>
                <td colspan="2" class="garisbawah">Diagnosa Prae Operasi
                </td>
                <td colspan="1" class="garisbawah" width="22">:
                </td>
                <td colspan="5" class="garisbawah"><?= $data['diag_pra_opr'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="garisbawah">Tindakan Operasi
                </td>
                <td colspan="1" class="garisbawah">:
                </td>
                <td colspan="5" class="garisbawah"><?= $data['t_operasi'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="garisbawah">Diagnosa Post Operasi
                </td>
                <td colspan="1" class="garisbawah">:
                </td>
                <td colspan="5" class="garisbawah"><?= $data['diag_post_opr'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="garisbawah">Indikasi Operasi
                </td>
                <td colspan="1" class="garisbawah">:
                </td>
                <td colspan="5" class="garisbawah"><?= $data['indikasi_opr'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="garisbawah">Jenis Operasi
                </td>
                <td colspan="1" class="garisbawah">:
                </td>
                <td colspan="5" class="garisbawah"><?= $data['jenis_opr'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">Tanggal Operasi
                </td>
                <td colspan="1">:
                </td>
                <td colspan="5"><?= $data['tgl_operasi'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">Operasi Mulai
                </td>
                <td colspan="1">:
                </td>
                <td colspan="5"><?= $data['opr_mulai'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">Operasi Selesai
                </td>
                <td colspan="1">:
                </td>
                <td colspan="5"><?= $data['opr_selesai'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="atas" style="border-top: 1px solid black; border-right: 1px solid black;">
                    <center>Jaringan Yang di Eksisi / Insisi</center>
                </td>
                <td colspan="4" class="atas" style="border-top: 1px solid black;">
                    <center>Dikirim Untuk Pemeriksaan Phatalogie</center>
                </td>
            </tr>
            <tr height="90">
                <td colspan="4" class="nama" style="border-right: 1px solid black;">
                    <center><?= $data['jaringan'] ?></center>
                </td>
                <td colspan="4" class="nama">
                    <center> <?php if ($data['p_phatologis'] != "") {
                                    echo $data['p_phatologis'];
                                } else {
                                    echo "-";
                                } ?></center>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="border-top: 1px solid black; border-right: 1px solid black;">
                    <center>Jenis Bahan Yang Dikirim Ke Laboratorium</center>
                </td>
                <td colspan="4" style="border-top: 1px solid black;">
                    <center>Uraian Pemeriksaan</center>
                </td>
            </tr>
            <tr height="100">
                <td colspan="4" class="nama" style="border-right: 1px solid black;">
                    <center><?= $data['b_labor'] ?></center>
                </td>
                <td colspan="4" class="nama">
                    <center><?= $data['uraian'] ?></center>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="border-top: 1px solid black; border-right: 1px solid black;">
                    <center>Cara Apporach (Bila Perlu) Dengan Gambar</center>
                </td>
                <td colspan="4" style="border-top: 1px solid black;">
                    <center>Posisi Penderita (Bila Perlu) Dengan Gambar</center>
                </td>
            </tr>
            <tr height="100">
                <td colspan="4" class="nama" style="border-right: 1px solid black;">
                    <center><?= $data['c_approach'] ?></center>
                </td>
                <td colspan="4" class="nama">
                    <center><?= $data['p_penderita'] ?></center>
                </td>
            </tr>
            <tr>
                <td colspan="8" class="atas" style="border-top: 1px solid black;">
                    <center>Singkatan Kelainan Yang Ditemukan Dengan Gambar (Laporan Lengkap Lihat Dibawah)</center>
                </td>
            </tr>
            <tr height="100">
                <td colspan="8" class="nama">
                    <center><?= $data['s_kelainan'] ?></center>
                </td>
            </tr>
        </table>

        <table class="table2" width="100%" cellspacing="0" style="border: 1px solid black; border-collapse: collapse;">
            <tr>
                <th colspan="8" style="border-top: 1px solid black;" class="judul">Antiseptik dilakukan di operasi dengan : Bethadine / Alkohol</th>
            </tr>
            <tr>
                <td colspan="8">1. Penderita dalam posisi duduk menghadap Slit Lamp</td>
            </tr>
            <tr>
                <td colspan="8">2. Dilakukan penetesan Pantocain 2% pada mata kanan / kiri</td>
            </tr>
            <tr> <?php if ($data['t_operasi'] == "Laser, Capsulotomy") {
                        echo "<td>3. Dilakukan pemasangan lensa Capsulotomy pada mata kanan / kiri</td>";
                    } else {
                        echo "<td>3. Dilakukan pemasangan lensa PRP pada mata kanan / kiri</td>";
                    } ?>
            </tr>
            <tr>
                <td colspan="8">4. Dilkaukan penempatan posisi mata pasien</td>
            </tr>
            <tr><?php if ($data['t_operasi'] == "Laser, Capsulotomy") {
                    echo "<td>5. Dilakukan laser Nd Yag pada mata kanan / kiri</td>";
                } else {
                    echo "<td>5. Dilakukan laser PRP pada mata kanan / kiri</td>";
                } ?>

            </tr>
            <tr>
                <td colspan="8">6. Operasi Selesai</td>
            </tr>
            <tr>
                <td>
                    <table width="50%" class="table-2" cellspacing="0">
                        <tr>
                            <?php
                            if ($data['t_operasi'] == "Laser, Capsulotomy") {
                                echo '<td colspan="4" class="garisbawah">Jenis Laser</td>';
                                echo '<td colspan="4" class="garisbawah">' . $data['jenis_laser'] . '</td>';
                            } else {
                                echo '<td colspan="4" class="garisbawah">Jenis Pasien</td>';
                                echo '<td colspan="4" class="garisbawah">' . $data['jenis_laser'] . '</td>';
                            }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="4" class="garisbawah">Jumlah Spot</td>
                            <td colspan="4" class="garisbawah"><?= $data['j_spot'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="garisbawah">Besar Spot</td>
                            <td colspan="4" class="garisbawah"><?= $data['b_spot'] ?></td>
                        </tr>
                        <tr>
                            <?php
                            if ($data['t_operasi'] == "Laser, Capsulotomy") {
                                echo '<td colspan="4" class="garisbawah">Power</td>';
                                echo '<td colspan="4" class="garisbawah">' . $data['power'] . '</td>';
                            } else {
                                echo '<td colspan="4" class="garisbawah">Durasi</td>';
                                echo '<td colspan="4" class="garisbawah">' . $data['power'] . '</td>';
                            }
                            ?>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr height="10">
                <th colspan="8" class="judul">INTRUKSI PASCA BEDAH</th>
            </tr>
            <tr>
                <td colspan="8">1. Kontrol Nadi / Tensi / Nafas / Suhu</td>
            </tr>
            <tr>
                <td colspan="8">2. Puasa</td>
            </tr>
            <tr>
                <td colspan="8">3. Infus</td>
            </tr>
            <tr>
                <td colspan="8">4 Antibiotika</td>
            </tr>
            <tr>
                <td>
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td width="50" colspan="4" class="atas">
                                    <center><strong>Laporan Dibuat Oleh,</strong></center>
                                </td>
                                <td width="50" colspan="4" class="atas">
                                    <center><strong>Tanggal <?= date("d F Y") ?> Jam <?= date("H:i") ?> WIB</strong></center>
                                </td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td width="50" colspan="4" class="atas">

                                </td>
                                <td width="50" colspan="4" class="atas">
                                    <center><strong>Ahli Bedah,</strong></center>
                                </td>
                            </tr>
                        </tbody>
                        <tbody height="60">
                            <tr>
                                <td colspan="8"></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td width="50" colspan="4" class="atas">
                                    <center><strong>Nama Jelas & Tanda Tangan</strong></center>
                                </td>
                                <td width="50" colspan="4" class="atas">
                                    <center><strong>Nama Jelas & Tanda Tangan</strong></center>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </td>
            </tr>
        </table>
        <!--end of table akhir-->
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