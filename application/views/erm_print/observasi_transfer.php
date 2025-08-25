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
            font-size: 12px;
            vertical-align: text-top;
        }

        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;
            font-size: 12px;
            vertical-align: text-top;
        }


        .garisbawah {
            border-bottom: 1px solid;
        }

        span,
        ul {
            border: 1px solid black;
            padding: .1em;
            width: 50px;

        }

        .gariskanan {
            border-right: 1px solid;
        }
    </style>
</head>

<body>
    <div class="content">
        <table style="margin-top:-10px" style="width: 70%">
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
            </tr>
        </table>
        <h3 class="center">
            <b>
                <p style="margin-top:-20px">FORM OBSERVASI PASIEN SELAMA PROSES TRANSFER PASIEN EKSTERNAL
            </b></p>
        </h3>
        <table style="margin-top:-10px" width=100%>
            <tr>
                <td colspan=3><b>STATUS KEGAWAT DARURATAN:</td>
                <td colspan=3><b>PETUGAS AMBULAN</td>
                <td><b>TANGGAL</td>
            </tr>
            <tr>
                <td width=15%><?php if ($data['gawat'] == 'Merah') { ?><span>&#10004;</span><?php } else { ?><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> <?php } ?> Merah</td>
                <td width=15%><?php if ($data['gawat'] == 'Kuning') { ?><span>&#10004;</span><?php } else { ?><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> <?php } ?> Kuning</td>
                <td width=15%><?php if ($data['gawat'] == 'Hijau') { ?><span>&#10004;</span><?php } else { ?><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> <?php } ?> Hijau</td>
                <td width=18%>Nama Supir &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</td>
                <td colspan=2><?= $data['nama_supir'] ?></td>
                <td><?= date('d-M-Y', strtotime($data['tanggal'])) ?></td>
            </tr>
            <tr style="vertical-align: text-top
        " height=30px>
                <td></td>
                <td></td>
                <td></td>
                <td>Nama Tim Medis :</td>
                <td colspan=2><?= $data['nama_tm'] ?></td>
                <td></td>
            </tr>

            <tr>
                <td colspan="3"><b>JENIS KASUS</td>
                <td>Berangkat dari&nbsp&nbsp&nbsp&nbsp&nbsp : </td>
                <td><?= $data['berangkat'] ?></td>
                <td>Jam Berangkat : </td>
                <td><?= $data['jam_brgkt'] ?></td>
            </tr>
            <tr style="vertical-align: text-top" height=30px>
                <td width=15%><?php if ($data['jenis_kasus'] == 'Trauma') { ?><span>&#10004;</span><?php } else { ?><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> <?php } ?> Trauma</td>
                <td width=15%><?php if ($data['jenis_kasus'] == 'Non Trauma') { ?><span>&#10004;</span><?php } else { ?><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> <?php } ?> Non Trauma</td>
                <td></td>
                <td>Tujuan ke &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</td>
                <td><?= $data['tujuan'] ?></td>
                <td>Jam Tiba :</td>
                <td><?= $data['jam_tiba'] ?></td>
            </tr>
            <tr>
                <td colspan="7"><b>DATA PASIEN</td>
            </tr>

            <tr height="30px">
                <td width=10%>Nama : </td>
                <td colspan="2"><?= $data['nama'] ?></td>
                <td>Umur :</td>
                <td colspan="2"><?php
                                $tanggal = new DateTime($data['tgl_lahir']);
                                $today = new DateTime();
                                $y = $today->diff($tanggal)->y;
                                $m = $today->diff($tanggal)->m;
                                $d = $today->diff($tanggal)->d;
                                echo  $y . " tahun " . $m . " bulan " . $d . " hari";  ?></td>

            </tr>

            <tr style="vertical-align:text-top" height=30px>
                <td>TTL :</td>
                <td colspan="2"><?= date('d-M-Y', strtotime($data['tgl_lahir'])) ?></td>
                <td>Jenis Kelamin : </td>
                <td colspan="2"><?= $data['jenis_kelamin'] ?></td>
            </tr>
            <tr style="vertical-align:text-top" height=60px>
                <td>Alergi Obat :</td>
                <td><?php if ($data['ale_obat'] == 'Ya') { ?><span>&#10004;</span><?php } else { ?><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> <?php } ?> Ya</td>
                <td><?php if ($data['ale_obat'] == 'Tidak') { ?><span>&#10004;</span><?php } else { ?><span>&nbsp&nbsp&nbsp&nbsp&nbsp</span> <?php } ?> Tidak</td>
            </tr>
        </table>
        <p style="margin-top:-30px"><b>OBAT-OBATAN HIGH ALERT YANG SUDAH DIBERIKAN :</b></p>
        <table style="text-align:center" width=100% class="table1" cellspacing=0>
            <tr class="garisbawah">
                <td rowspan=2 class="gariskanan">JAM</td>
                <td rowspan=2 class="gariskanan">GCS</td>
                <td colspan=4 class="gariskanan"> TANDA-TANDA VITAL</td>
                <td rowspan=2 class="gariskanan">SpO2</td>
                <td rowspan=2 class="gariskanan">KEJADIAN DI PROSES TRANSFER</td>
                <td rowspan=2 class="gariskanan">TINDAKAN / PEMBERIAN OBAT-OBATAN</td>
            </tr>
            <tr class="garisbawah">
                <td class="gariskanan">TD (mmHg)</td>
                <td class="gariskanan">Nadi (x/i) </td>
                <td class="gariskanan">Temp (c)</td>
                <td class="gariskanan">RR (x/i)</td>
            </tr>
            <?php $db = $this->db->get_where('obat_observasi', ['id_pelayanan' => $data['id_pelayanan']])->result_array();
            if (count($db) > 0) {
                foreach ($db as $row) { ?>
                    <tr class="garisbawah">
                        <td height=20px class="gariskanan"><?= date('H:i:s',strtotime($row['tanggal'])) ?></td>
                        <td height=20px class="gariskanan"><?= $row['gcs'] ?></td>
                        <td height=20px class="gariskanan"><?= $row['tensi'] ?></td>
                        <td height=20px class="gariskanan"><?= $row['nadi'] ?></td>
                        <td height=20px class="gariskanan"><?= $row['suhu'] ?></td>
                        <td height=20px class="gariskanan"><?= $row['nafas'] ?></td>
                        <td height=20px class="gariskanan"><?= $row['spo2'] ?></td>
                        <td height=20px class="gariskanan"><?= $row['kejadian'] ?></td>
                        <td height=20px class="gariskanan"><?= $row['tindakan_obat'] ?></td>
                    </tr>

                <?php }
            } else { ?>

                <tr width="90">
                    <td colspan="9" class=gariskanan>
                        <center>Tidak ada data</center>
                    </td>
                </tr>
            <?php } ?>


        </table>
        <p align="right" style="margin-right:100px;margin-top: 50px;">PETUGAS YANG MENTRANSFER</p>
        <br><br>
        <p align="right" style="margin-right:82px">(&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp)</p>
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