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

        hr {
            border: 1px solid black;
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
        <table style="width: 100%">
            <tr>
                <td>
                    <img src="<?= base_url() ?>resources/img/rsbt_logo.jpg" style="width: 110px;">
                </td>
                <td>
                <p><b>RS. Bakti Timah</b></p>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
            </tr>
        </table>
        <hr>
        <h2 class="center">
            LEMBAR EVALUASI PEMBERIAN INFORMASI PELAYANAN MEDIS OLEH DPJP
        </h2>
        <table style="margin-left:40px" cellspacing=0>
            <tr height=30px>
                <td width=250px>
                    Tanggal/Pukul
                </td>
                <td>: <?= strftime('%d %B %Y', strtotime($data['waktu_evaluasi'])) ?></td>
            </tr>
            <tr height=30px>
                <td>
                    Nama Dokter
                </td>
                <td>: <?= $data['nama_dokter'] ?></td>
            </tr>
            <tr height=30px>
                <td>
                    Sebagai DPJP
                </td>
                <td>: <?= $data['sebagai'] ?></td>
            </tr>
            <tr height=30px>
                <td>
                    Nama Pasien
                </td>
                <td>: <?= $data['pasien'] ?> </td>
            </tr>
            <tr height=30px>
                <td>
                    Tanggal Lahir
                </td>
                <td>: <?= strftime('%d %B %Y', strtotime($data['tgl_lahir'])) ?> </td>
            </tr>
        </table>
        <br/>
				<table width=100% class="table1" cellspacing=0>
                    <tr>
                        <th class="gariskanan garisbawah"> Penyampaian Rencana Pelayanan </td>
                        <th class="gariskanan garisbawah"> Keterangan </th>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="40%">Memperkenalkan Diri Sebagai DPJP</td>
						<td class="gariskanan garisbawah"><?= $data['perkenalan'] ?></td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="40%">Penyampaian Bahwa Pasien Telah Diperiksa</td>
						<td class="gariskanan garisbawah"><?= $data['periksa'] ?></td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="40%">Meyampaikan Rencana Pemeriksaan Penunjang</td>
						<td class="gariskanan garisbawah"><?= $data['penunjang'] ?></td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="40%">Menyampaikan Rencana Konsul</td>
						<td class="gariskanan garisbawah"><?= $data['konsul'] ?></td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="40%">Menyampaikan Rencana Tindakan atau Terapi Serta Manfaat dan Resikonya</td>
						<td class="gariskanan garisbawah"><?= $data['terapi'] ?></td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="40%">Menyampaikan harapan yang akan diperoleh dengan tindakan tersebut</td>
						<td class="gariskanan garisbawah"><?= $data['harapan'] ?></td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="40%">Menyampaikan apakah pasien memiliki pertanyaan yang akan diajukan</td>
						<td class="gariskanan garisbawah"><?= $data['pertanyaan'] ?></td>
                    </tr>
                    <tr>
                        <td class="gariskanan garisbawah" width="40%">Mengakhiri Pembicaraan Dengan Salam</td>
						<td class="gariskanan garisbawah"><?= $data['salam'] ?></td>
                    </tr>
                </table>   
                <br/>
                <table width=100% cellspacing=0>
            <tr>
                <td colspan="3">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                   &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <center>Pasien</center>
                </td>
                <td>
                    <center>DPJP</center>
                </td>
            </tr>
            <tr>
                <td>
                    <center><img src="<?= base_url() . $data['ttd'] ?>" style="width: 200px;height:200px; "></center>
                </td>
                <td>
                    <center><img src="<?= base_url() . $data['ttd1'] ?>" style="width: 200px;height:200px; "></center>
                </td>
            </tr>

        </table>        
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