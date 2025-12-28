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
        .garisbawah { border-bottom: 1px solid; }
        .gariskanan { border-right: 1px solid; }
        .gariskiri { border-left: 1px solid; }
        .box { border-bottom: 1px solid; width: 1px; height: 1px; }
        .block, li {
            border: 1px solid black;
            padding: .1em;
            width: 29px;
        }
        hr { border: 1px solid black; }
        .block { display: block; }
        span, ul {
            border: 1px solid black;
            padding: .1em;
            width: 50px;
        }
        ul {
            display: inline-flex;
            list-style: none;
            padding: 0;
        }
        .inline { display: inline; }
    </style>
</head>

<body>
    <div class="content">

        <table style="width: 100%">
            <tr>
                <td>
                    <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 110px;">
                </td>
                <td>
                    <p><b>RS. Bakti Timah</b></p>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
                <td>
                    <p style="margin-left:-9em">NRM : <?= $data['no_rm'] ?></p>
                    <p style="margin-left:-9em">Nama : <?= $data['pasien'] ?></p>
                    <p style="margin-left:-9em">Jenis Kelamin : <?= $data['jenis_kelamin'] ?></p>
                    <p style="margin-left:-9em">Tanggal Lahir : <?= strftime('%d %B %Y', strtotime($data['tgl_lahir'])) ?></p>
                    <p style="margin-left:-9em">(Mohon diisi stiker jika ada)</p>
                </td>
            </tr>
        </table>

        <hr>

        <h2 class="center">
            ASESMEN ULANG JATUH LANSIA
        </h2>

        <br/>

        <table width=100% class="table1" cellspacing=0>
            <tr>
                <th class="gariskanan garisbawah">Faktor Resiko</th>
                <th class="gariskanan garisbawah">Skala</th>
                <th class="gariskanan garisbawah">Skor</th>
                <th class="gariskanan garisbawah">Skor Pasien</th>
            </tr>

            <!-- RIWAYAT JATUH -->
            <?php
                $skor_jatuh = $data['riwayat_jatuh'];
                $nilai_jatuh = ($skor_jatuh == "Ya") ? 25 : 0;
            ?>
            <tr>
                <td class="gariskanan garisbawah" rowspan="2" width="30%">Riwayat Jatuh</td>
                <td class="gariskanan garisbawah">Tidak</td>
                <td class="gariskanan garisbawah">0</td>
                <td class="gariskanan garisbawah" rowspan="2"><center><?= $nilai_jatuh ?></center></td>
            </tr>
            <tr>
                <td class="gariskanan garisbawah">Ya</td>
                <td class="gariskanan garisbawah">25</td>
            </tr>

            <!-- DIAGNOSA SEKUNDER -->
            <?php
                $skor_diagnosa = $data['diagnosa_sekunder'];
                $nilai_diagnosa = ($skor_diagnosa == "Ya") ? 15 : 0;
            ?>
            <tr>
                <td class="gariskanan garisbawah" rowspan="2">Diagnosa Sekunder</td>
                <td class="gariskanan garisbawah">Tidak</td>
                <td class="gariskanan garisbawah">0</td>
                <td class="gariskanan garisbawah" rowspan="2"><center><?= $nilai_diagnosa ?></center></td>
            </tr>
            <tr>
                <td class="gariskanan garisbawah">Ya</td>
                <td class="gariskanan garisbawah">15</td>
            </tr>

            <!-- ALAT BANTU -->
            <?php
                $skor_bantu = $data['bantu']; // LANSIA gunakan field bantu
                if ($skor_bantu == "Tidak Ada") $nilai_bantu = 0;
                elseif ($skor_bantu == "Tongkat") $nilai_bantu = 15;
                else $nilai_bantu = 30;
            ?>
            <tr>
                <td class="gariskanan garisbawah" rowspan="3">Menggunakan Alat Bantu</td>
                <td class="gariskanan garisbawah">Tidak Ada / Bedrest / Dibantu</td>
                <td class="gariskanan garisbawah">0</td>
                <td class="gariskanan garisbawah" rowspan="3"><center><?= $nilai_bantu ?></center></td>
            </tr>
            <tr>
                <td class="gariskanan garisbawah">Kruk / Tongkat</td>
                <td class="gariskanan garisbawah">15</td>
            </tr>
            <tr>
                <td class="gariskanan garisbawah">Kursi / Perabot</td>
                <td class="gariskanan garisbawah">30</td>
            </tr>

            <!-- INFUS -->
            <?php
                $skor_infus = $data['infus'];
                $nilai_infus = ($skor_infus == "Ya") ? 20 : 0;
            ?>
            <tr>
                <td class="gariskanan garisbawah" rowspan="2">Menggunakan Infus</td>
                <td class="gariskanan garisbawah">Tidak</td>
                <td class="gariskanan garisbawah">0</td>
                <td class="gariskanan garisbawah" rowspan="2"><center><?= $nilai_infus ?></center></td>
            </tr>
            <tr>
                <td class="gariskanan garisbawah">Ya</td>
                <td class="gariskanan garisbawah">20</td>
            </tr>

            <!-- GAYA JALAN -->
            <?php
                $skor_jalan = $data['gaya_jalan'];
                if ($skor_jalan == "Normal") $nilai_jalan = 0;
                elseif ($skor_jalan == "Lemah") $nilai_jalan = 10;
                else $nilai_jalan = 20;
            ?>
            <tr>
                <td class="gariskanan garisbawah" rowspan="3">Gaya Berjalan</td>
                <td class="gariskanan garisbawah">Normal / Bedrest / Kursi Roda</td>
                <td class="gariskanan garisbawah">0</td>
                <td class="gariskanan garisbawah" rowspan="3"><center><?= $nilai_jalan ?></center></td>
            </tr>
            <tr>
                <td class="gariskanan garisbawah">Lemah</td>
                <td class="gariskanan garisbawah">10</td>
            </tr>
            <tr>
                <td class="gariskanan garisbawah">Terganggu</td>
                <td class="gariskanan garisbawah">20</td>
            </tr>

            <!-- STATUS MENTAL -->
            <?php
                $skor_mental = $data['status_mental'];
                $nilai_mental = ($skor_mental == "Pelupa") ? 15 : 0;
            ?>
            <tr>
                <td class="gariskanan garisbawah" rowspan="2">Status Mental</td>
                <td class="gariskanan garisbawah">Menyadari</td>
                <td class="gariskanan garisbawah">0</td>
                <td class="gariskanan garisbawah" rowspan="2"><center><?= $nilai_mental ?></center></td>
            </tr>
            <tr>
                <td class="gariskanan garisbawah">Pelupa</td>
                <td class="gariskanan garisbawah">15</td>
            </tr>

            <!-- TOTAL SKOR -->
            <tr>
                <td class="gariskanan garisbawah">Skor Total</td>
                <td class="gariskanan garisbawah" colspan="3">
                    <center><?= $data['skor_total'] ?></center>
                </td>
            </tr>

            <!-- KATEGORI -->
            <?php
                $skor_total = intval($data['skor_total']);
                if ($skor_total <= 24) $kategori = "Risiko Rendah";
                elseif ($skor_total <= 44) $kategori = "Risiko Sedang";
                else $kategori = "Risiko Tinggi";
            ?>
            <tr>
                <td class="gariskanan garisbawah">Kategori</td>
                <td class="gariskanan garisbawah" colspan="3"><center><?= $kategori ?></center></td>
            </tr>

        </table>

        <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                window.print();
            });
            window.onafterprint = function(e) {
                window.location.href = 'javascript:history.go(-1)';
            };
        </script>

    </div>
</body>

</html>