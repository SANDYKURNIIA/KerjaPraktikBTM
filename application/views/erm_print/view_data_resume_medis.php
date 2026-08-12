<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Resume Medis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        header,
        footer {
            text-align: center;
            padding: 5px;

            color: black;
            border: 1px solid grey;

        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .content {
            margin: 20px;
        }

        h1 {
            text-align: center;
            font-size: x-large;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }


        td {
            border: 0px solid #dddddd;
            text-align: left;
            padding: 8px;
            width: 20%;
            background-color: #DEEAF6;
            font-size: 10px;
            /* Ganti nilai ini sesuai dengan ukuran teks yang Anda inginkan */
        }

        th {
            width: 15%;
            text-align: left;
            font-size: 10px;
            /* Ganti nilai ini sesuai dengan ukuran teks yang Anda inginkan */
        }
    </style>
</head>

<body>
    <header>

        <h1>Resume Medis</h1>

    </header>
    <br>
    <main>
        <div>
            <?php foreach ($records as $row) : ?>
                <table>

                    <tr>
                        <th>Nama</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->namas; ?></td>
                        <th style="text-align: center;">Tanggal Masuk</th>
                        <td style="border-left: 1px solid grey;"><?php echo $row->tanggal_masuk; ?></td>
                        <th style="text-align: center;">DPJP 1</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->dpjp1; ?></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black;">Tanggal Lahir</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->tanggal_lahir ?></td>
                        <th style=" text-align: center;">Tanggal Keluar:</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->tanggal_keluar = date('d-m-Y'); ?></td>
                        <th style="text-align: center;">DPJP 2</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->dpjp2; ?></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black;">No RM</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->no_rm; ?></td>
                        <th style="text-align: center;">Ruang Rawat</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->ruang_rawat; ?></td>
                        <th style="text-align: center;">DPJP 3</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->dpjp3; ?></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black;">Jenis kelamin</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->kelamin; ?></td>
                        <th style="text-align: center;">Kelas</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->kelas; ?></td>
                        <th style="text-align: center;">DPJP 4</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->dpjp4; ?></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black;"></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th style="text-align: center;">Riwayat alergi</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->riwayat_alergi; ?></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black;"></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th style="text-align: center;">Keterangan</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->keterangan; ?></td>
                    </tr>

                    <tr>
                        <th style="border-left: 0px solid black;" colspan="2">Alasan Indikasi Masuk:</th>
                    <tr>
                        <td colspan="6" style="height: 10px; border-left: 1px solid grey;"><?php echo $row->alasan_indikasi_masuk; ?></td>
                    </tr>


                    <tr>
                        <th style="border-left: 0px solid black;"></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>
                    <th colspan="2">Riwayat Singkat Fisik:</th>
                    <tr>
                        <td colspan="6" style="height: 10px; border-left: 1px solid grey;"><?php echo $row->riwayat_singkat_fisik; ?></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black;"></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>
                    <th colspan=" 2" style="border-left: 0px solid black;">Pemeriksaan Penunjang Diagnostik:</th>
                    <tr>
                        <td colspan="6" style="height: 10px; border-left: 1px solid grey;"><?php echo $row->pemeriksaan_penunjang_diagnostik; ?></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black;"></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>
                    <th style="border-left: 0px solid black;" colspan="2">Diagnosa Masuk:</th>
                    <tr>
                        <td colspan="6" style="height: 10px;  border-left: 1px solid grey;""><?php echo $row->diagnosa_masuk; ?></td>
                    </tr>
                    <tr>
                        <th style=" border-left: 0px solid black;">
                            </th>
                        <td style=" background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>
                    <th style="border-left: 0px solid black;" colspan="2">Diagnosa Keluar:</th>
                    <tr>
                        <td colspan="6" style="height: 10px; border-left: 1px solid grey;"><?php echo $row->diagnosa_keluar; ?></td>
                    </tr>
                    <tr>
                        <th style=" border-left: 0px solid black;">
                        </th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>
                    <th style="border-left: 0px solid black;" colspan="2">Prosedur Pembedahan/Tindakan:</th>
                    <tr>
                        <td colspan="6" style="height: 10px; border-left: 1px solid grey;"><?php echo $row->prosedur_pembedahan_tindakan; ?></td>
                    </tr>
                    <tr>
                        <th style=" border-left: 0px solid black;">
                        </th>
                        <td style=" background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black; font-size: 10px;"> Ringkasan keluar</th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black; font-weight: lighter;" colspan="2">Keadaan waktu pulang</th>
                        <td colspan="1" style="border-left:font-weight: lighter; 1px solid grey;">: <?php echo $row->keadaan_waktu_pulang; ?></td>
                        <th colspan="2" style="text-align: center;font-weight: lighter;">Kesadaran</th>
                        <td colspan="1" style="border-left: 1px solid grey; ">: <?php echo $row->kesadaran; ?></td>


                    </tr>

                    <th style="border-left:  0px solid black;  height: 10px;" colspan="2">Alasan Pulang:</th>
                    <tr>
                        <td colspan="6" style="height: 10px; border-left: 1px solid grey;"><?php echo $row->alasan_pulang; ?></td>
                    </tr>

                    <tr>
                        <th style=" border-left: 0px solid black;">
                        </th>
                        <td style=" background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>


                    <th colspan="2" style="border-left: 0px solid black;">Tanggal Kontrol ke RS:</th>
                    <td colspan="1" style="border-left: 1px solid grey;"><?php echo $row->tanggal_keluar_rs  = date('d-m-Y'); ?></td>


                    <th colspan="2" style="text-align: center; border-left: 0px solid black;"">Poliklinik:</th>
                    <td colspan=" 1" style="border-left: 1px solid grey;"><?php echo $row->poliklinik; ?></td>
                        </tr>
                        <tr>
                            <th style="border-left: 0px solid black;"> </th>
                            <td style="background-color: #ffff;"></td>
                            <th></th>
                            <td style="background-color: #ffff;"></td>
                            <th></th>
                            <td style="background-color: #ffff;"></td>
                        </tr>
                    <th colspan="2" style="border-left: 0px solid black;">Edukasi yang telah diberikan </th>
                    <br>

                    <tr>
                        <th colspan="1">Terapi:</th>
                        <th colspan="3" style="font-weight: lighter;"> Selama dirumah sakit</th>
                        <th colspan="2" style="font-weight: lighter; text-align: left;">Selama dirumah </th>

                    </tr>
                    <tr>
                        <td><textarea name="terapi_sakit" rows="6" cols="30"></textarea></td>
                        <td><textarea name="terapi_dirumah" rows="4" cols="30"></textarea></td>
                        <td><textarea name="terapi_sakit" rows="6" cols="30" style="background-color: #DEEAF6; border-color: #DEEAF6;"></textarea></td>
                        <td><textarea name="terapi_dirumah" rows="4" cols="30"></textarea></td>
                        <td><textarea name="terapi_sakit" rows="6" cols="30"></textarea></td>
                        <td><textarea name="terapi_sakit" rows="6" cols="30"></textarea></td>
                    </tr>
                    <tr>
                        <th colspan="1" style="font-weight: lighter; text-align: center;">
                            Pasien/Keluarga
                        </th>
                        <th colspan="1" style="font-weight: lighter; text-align: center;">
                            <?php echo $row->dpjp4; ?>
                        </th>
                        <th colspan="1" style="font-weight: lighter; text-align: center;">
                            <!-- Kosong -->
                        </th>
                        <th colspan="1" style="font-weight: lighter; text-align: center;">
                            <?php echo $row->dpjp3; ?>
                        </th>
                        <th colspan="1" style="font-weight: lighter; text-align: center;">
                            <?php echo $row->dpjp2; ?>
                        </th>
                        <th colspan="1" style="font-weight: lighter; text-align: center;">
                            <?php echo $row->dpjp1; ?>
                        </th>

                    </tr>


                </table>
                <hr> <!-- Garis pemisah antara data -->
            <?php endforeach; ?>
        </div>
    </main>

</body>

=======
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Resume Medis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        header,
        footer {
            text-align: center;
            padding: 5px;

            color: black;
            border: 1px solid grey;

        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .content {
            margin: 20px;
        }

        h1 {
            text-align: center;
            font-size: x-large;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }


        td {
            border: 0px solid #dddddd;
            text-align: left;
            padding: 8px;
            width: 20%;
            background-color: #DEEAF6;
            font-size: 10px;
            /* Ganti nilai ini sesuai dengan ukuran teks yang Anda inginkan */
        }

        th {
            width: 15%;
            text-align: left;
            font-size: 10px;
            /* Ganti nilai ini sesuai dengan ukuran teks yang Anda inginkan */
        }
    </style>
</head>

<body>
    <header>

        <h1>Resume Medis</h1>

    </header>
    <br>
    <main>
        <div>
            <?php foreach ($records as $row) : ?>
                <table>

                    <tr>
                        <th>Nama</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->namas; ?></td>
                        <th style="text-align: center;">Tanggal Masuk</th>
                        <td style="border-left: 1px solid grey;"><?php echo $row->tanggal_masuk; ?></td>
                        <th style="text-align: center;">DPJP 1</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->dpjp1; ?></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black;">Tanggal Lahir</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->tanggal_lahir ?></td>
                        <th style=" text-align: center;">Tanggal Keluar:</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->tanggal_keluar = date('d-m-Y'); ?></td>
                        <th style="text-align: center;">DPJP 2</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->dpjp2; ?></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black;">No RM</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->no_rm; ?></td>
                        <th style="text-align: center;">Ruang Rawat</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->ruang_rawat; ?></td>
                        <th style="text-align: center;">DPJP 3</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->dpjp3; ?></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black;">Jenis kelamin</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->kelamin; ?></td>
                        <th style="text-align: center;">Kelas</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->kelas; ?></td>
                        <th style="text-align: center;">DPJP 4</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->dpjp4; ?></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black;"></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th style="text-align: center;">Riwayat alergi</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->riwayat_alergi; ?></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black;"></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th style="text-align: center;">Keterangan</th>
                        <td style="border-left: 1px solid grey;">: <?php echo $row->keterangan; ?></td>
                    </tr>

                    <tr>
                        <th style="border-left: 0px solid black;" colspan="2">Alasan Indikasi Masuk:</th>
                    <tr>
                        <td colspan="6" style="height: 10px; border-left: 1px solid grey;"><?php echo $row->alasan_indikasi_masuk; ?></td>
                    </tr>


                    <tr>
                        <th style="border-left: 0px solid black;"></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>
                    <th colspan="2">Riwayat Singkat Fisik:</th>
                    <tr>
                        <td colspan="6" style="height: 10px; border-left: 1px solid grey;"><?php echo $row->riwayat_singkat_fisik; ?></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black;"></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>
                    <th colspan=" 2" style="border-left: 0px solid black;">Pemeriksaan Penunjang Diagnostik:</th>
                    <tr>
                        <td colspan="6" style="height: 10px; border-left: 1px solid grey;"><?php echo $row->pemeriksaan_penunjang_diagnostik; ?></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black;"></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>
                    <th style="border-left: 0px solid black;" colspan="2">Diagnosa Masuk:</th>
                    <tr>
                        <td colspan="6" style="height: 10px;  border-left: 1px solid grey;""><?php echo $row->diagnosa_masuk; ?></td>
                    </tr>
                    <tr>
                        <th style=" border-left: 0px solid black;">
                            </th>
                        <td style=" background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>
                    <th style="border-left: 0px solid black;" colspan="2">Diagnosa Keluar:</th>
                    <tr>
                        <td colspan="6" style="height: 10px; border-left: 1px solid grey;"><?php echo $row->diagnosa_keluar; ?></td>
                    </tr>
                    <tr>
                        <th style=" border-left: 0px solid black;">
                        </th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>
                    <th style="border-left: 0px solid black;" colspan="2">Prosedur Pembedahan/Tindakan:</th>
                    <tr>
                        <td colspan="6" style="height: 10px; border-left: 1px solid grey;"><?php echo $row->prosedur_pembedahan_tindakan; ?></td>
                    </tr>
                    <tr>
                        <th style=" border-left: 0px solid black;">
                        </th>
                        <td style=" background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black; font-size: 10px;"> Ringkasan keluar</th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>
                    <tr>
                        <th style="border-left: 0px solid black; font-weight: lighter;" colspan="2">Keadaan waktu pulang</th>
                        <td colspan="1" style="border-left:font-weight: lighter; 1px solid grey;">: <?php echo $row->keadaan_waktu_pulang; ?></td>
                        <th colspan="2" style="text-align: center;font-weight: lighter;">Kesadaran</th>
                        <td colspan="1" style="border-left: 1px solid grey; ">: <?php echo $row->kesadaran; ?></td>


                    </tr>

                    <th style="border-left:  0px solid black;  height: 10px;" colspan="2">Alasan Pulang:</th>
                    <tr>
                        <td colspan="6" style="height: 10px; border-left: 1px solid grey;"><?php echo $row->alasan_pulang; ?></td>
                    </tr>

                    <tr>
                        <th style=" border-left: 0px solid black;">
                        </th>
                        <td style=" background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                        <th></th>
                        <td style="background-color: #ffff;"></td>
                    </tr>


                    <th colspan="2" style="border-left: 0px solid black;">Tanggal Kontrol ke RS:</th>
                    <td colspan="1" style="border-left: 1px solid grey;"><?php echo $row->tanggal_keluar_rs  = date('d-m-Y'); ?></td>


                    <th colspan="2" style="text-align: center; border-left: 0px solid black;"">Poliklinik:</th>
                    <td colspan=" 1" style="border-left: 1px solid grey;"><?php echo $row->poliklinik; ?></td>
                        </tr>
                        <tr>
                            <th style="border-left: 0px solid black;"> </th>
                            <td style="background-color: #ffff;"></td>
                            <th></th>
                            <td style="background-color: #ffff;"></td>
                            <th></th>
                            <td style="background-color: #ffff;"></td>
                        </tr>
                    <th colspan="2" style="border-left: 0px solid black;">Edukasi yang telah diberikan </th>
                    <br>

                    <tr>
                        <th colspan="1">Terapi:</th>
                        <th colspan="3" style="font-weight: lighter;"> Selama dirumah sakit</th>
                        <th colspan="2" style="font-weight: lighter; text-align: left;">Selama dirumah </th>

                    </tr>
                    <tr>
                        <td><textarea name="terapi_sakit" rows="6" cols="30"></textarea></td>
                        <td><textarea name="terapi_dirumah" rows="4" cols="30"></textarea></td>
                        <td><textarea name="terapi_sakit" rows="6" cols="30" style="background-color: #DEEAF6; border-color: #DEEAF6;"></textarea></td>
                        <td><textarea name="terapi_dirumah" rows="4" cols="30"></textarea></td>
                        <td><textarea name="terapi_sakit" rows="6" cols="30"></textarea></td>
                        <td><textarea name="terapi_sakit" rows="6" cols="30"></textarea></td>
                    </tr>
                    <tr>
                        <th colspan="1" style="font-weight: lighter; text-align: center;">
                            Pasien/Keluarga
                        </th>
                        <th colspan="1" style="font-weight: lighter; text-align: center;">
                            <?php echo $row->dpjp4; ?>
                        </th>
                        <th colspan="1" style="font-weight: lighter; text-align: center;">
                            <!-- Kosong -->
                        </th>
                        <th colspan="1" style="font-weight: lighter; text-align: center;">
                            <?php echo $row->dpjp3; ?>
                        </th>
                        <th colspan="1" style="font-weight: lighter; text-align: center;">
                            <?php echo $row->dpjp2; ?>
                        </th>
                        <th colspan="1" style="font-weight: lighter; text-align: center;">
                            <?php echo $row->dpjp1; ?>
                        </th>

                    </tr>


                </table>
                <hr> <!-- Garis pemisah antara data -->
            <?php endforeach; ?>
        </div>
    </main>

</body>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>