<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
    <title>RESUME MEDIS</title>
    <!-- <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" /> -->
</head>

<body>

    <?php if ($cara_masuk == 'UGD') { ?>
        <div class="content" id="resume_med_igd" style="page-break-after:always;">
            <?php
            $data_igd['data'] = $data;
            $data_igd['terapi'] = $terapi;
            $this->load->view('erm_print/resume_medis_igd', $data_igd);
            ?>
        </div>
    <?php } else if ($cara_masuk == 'POLI') { ?>
        <div class="content" id="resume_med_poli" style="page-break-after:always;">
            <?php
            $data_poli['data'] = $data;
            $data_poli['terapi'] = $terapi;
            $this->load->view('erm_print/resume_medis_raj', $data_poli);
            ?>
        </div>
    <?php } else if ($cara_masuk == 'RAWAT INAP') { ?>
        <div class="content" id="resume_med_ranap" style="page-break-after:always;">
            <?php
            $data_ranap['data'] = $data;
            $data_ranap['terapi'] = $terapi;
            $data_ranap['id_pelayanan'] = $id_pelayanan;
            $this->load->view('erm_print/view_resume_pulang_print', $data_ranap);

            ?>
        </div>
    <?php } ?>
    <?php if (count($labor1) > 0) { ?>
        <div class="content" id="labor">

            <?php
            foreach ($labor1 as $data2) {

                $param = array('ono' => 'A' . $data2['id_form_labor']);
                $labor = json_decode($this->curl->simple_get("http://192.168.87.2:8181/" . 'RESULTS', $param));

                if ($labor != "") {
                    $data['labor'] = $labor;
            ?>
                    <div class="content" id="labor_data" style="page-break-after:always;">

                        <?php
                        $this->load->view('print/cetak_hasil_labor', $data);
                        ?>
                    </div>
                <?php
                } else { ?>
                    <script type="text/javascript">
                        document.getElementById('labor').style.display = 'none';
                    </script>
                <?php }
                ?>

            <?php } ?>
        </div>
    <?php } ?>
    <?php if (count($radio1) > 0) { ?>
        <div class="content" id="expertise" style="page-break-after:always;">

            <h2 class="center">
                EXPERTISE
            </h2>
            <hr>
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
                    foreach ($radiologi as $row) { ?>
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
                    } ?>
                </tbody>
            </table>

        </div>
    <?php } else { ?>
        <script type="text/javascript">
            document.getElementById('expertise').style.display = 'none';
        </script>
    <?php } ?>
    <div class="content" id="kuitansi" style="page-break-after:always;">
        <?php if ($cara_masuk == 'UGD') {
             $data_kasir = $pendapatan;
             $data_kasir['tgl_keluar_rajal'] = $pasien['tgl_keluar'];
             $data_kasir['pasien'] = $pasien;
             $data_kasir['diskon'] = !empty($kasir) ? $kasir->diskon : 0;
             $data_kasir['dp'] = !empty($kasir) ? $kasir->dp : 0;
             $data_kasir['selisih'] = !empty($kasir) ? $kasir->selisih : 0;
             $data_kasir['note'] = !empty($kasir) ? $kasir->note : '';
             $data_kasir['action'] = "cetak_ulang";
             $data_kasir['opsi'] = "cetak_ulang";
             $this->load->view('print/cetak_pembayaran', $data_kasir);
        } else if ($cara_masuk == 'POLI') {
            $data_kasir = $pendapatan;
            $data_kasir['tgl_keluar_rajal'] = $pasien['tgl_keluar'];
            $data_kasir['pasien'] = $pasien;
            $data_kasir['diskon'] = !empty($kasir) ? $kasir->diskon : 0;
            $data_kasir['dp'] = !empty($kasir) ? $kasir->dp : 0;
            $data_kasir['selisih'] = !empty($kasir) ? $kasir->selisih : 0;
            $data_kasir['note'] = !empty($kasir) ? $kasir->note : '';
            $data_kasir['action'] = "cetak_ulang";
            $data_kasir['opsi'] = "cetak_ulang";
            $this->load->view('print/cetak_pembayaran_poli', $data_kasir);
        } else if ($cara_masuk == 'RAWAT INAP') {
            $data_kasir['pasien'] = $pasien;
            $data_kasir['tgl_keluar_ranap'] = $pasien['tgl_keluar'];
            $data_kasir['diskon'] = !empty($kasir) ? $kasir->diskon : 0;
            $data_kasir['dp'] = !empty($kasir) ? $kasir->dp : 0;
            $data_kasir['selisih'] = !empty($kasir) ? $kasir->selisih : 0;
            $data_kasir['note'] = !empty($kasir) ? $kasir->note : '';
            $data_kasir['action'] = "cetak_penata";
            $data_kasir['opsi'] = "cetak_ulang";
            $this->load->view('print/cetak_bayar_ranap', $data_kasir);
        }
        ?>

    </div>
    <div class="content" id="sep" style="page-break-after:always;">

        <?php if (preg_match('/BPJS/i', $pasien['cara_bayar']) && $pasien['cara_bayar'] != 'BPJSTK') { ?>
            <?php
            $id = $pasien['no_sep'];
            $headers = generate_headers();
            $key = generate_key();
            $url = base_vclaim() . "SEP/" . $id;
            $sep = get($url, $headers);
            //print_arr($data['metaData']);
            if ($sep['metaData']['code'] == 200) {

                $decript = stringDecrypt($key, $sep['response']);
                //print_arr($decript);

                $response = json_decode(decompress($decript), true);

                if (($response['noRujukan'] != null || $response['noRujukan'] != "") && $response['jnsPelayanan'] != "Rawat Inap") {
                    $url1 = base_vclaim() . "Rujukan/" . $response['noRujukan'];
                    $url3 = base_vclaim() . "Rujukan/RS/" . $response['noRujukan'];
                    $sep1 = get($url1, $headers);
                    $sep3 = get($url3, $headers);
                    // print_arr($data1['metaData']);
                    if ($sep1['metaData']['code'] == 200) {
                        $decript1 = stringDecrypt($key, $sep1['response']);
                        // print_arr($decript);

                        $response1 = json_decode(decompress($decript1), true);
                        $sep_data['rujukan'] = $response1['rujukan']['provPerujuk']['nama'];
                    } else if ($sep3['metaData']['code'] == 200) {

                        $decript3 = stringDecrypt($key, $sep3['response']);
                        $response3 = json_decode(decompress($decript3), true);
                        $sep_data['rujukan'] = $response3['rujukan']['provPerujuk']['nama'];
                    } else {
                        $sep_data['rujukan'] = "RS BAKTI TIMAH - KAB. TJ BALAI KARIMUN";
                    }
                } else {
                    $sep_data['rujukan'] = "RS BAKTI TIMAH - KAB. TJ BALAI KARIMUN";
                }

                $url2 = base_vclaim() . "/Peserta/nokartu/" . $response['peserta']['noKartu'] . "/tglSEP/" . $response['tglSep'];
                $sep2 = get($url2, $headers);
                if ($sep2['metaData']['code'] == 200) {
                    $decript2 = stringDecrypt($key, $sep2['response']);
                    $response2 = json_decode(decompress($decript2), true);
                    $sep_data['noTelepon'] = $response2['peserta']['mr']['noTelepon'];
                    $sep_data['hakKelas'] = $response2['peserta']['hakKelas']['keterangan'];
                    $sep_data['prb'] = $response2['peserta']['informasi']['prolanisPRB'];
                }
                $sep_data['data'] = $response;


                $this->load->view('print/cetak_sep_bpjs', $sep_data);
            }
            ?>
        <?php } else { ?>
            <script type="text/javascript">
                document.getElementById('sep').style.display = 'none';
            </script>
        <?php } ?>
    </div>
    <div class="content" id="eklaim" style="page-break-after:always;">
        <?php if ($eklaim != 'tidak ada data') {
            $eklaim_data['data'] = $eklaim;
            $this->load->view('print/eclaim', $eklaim_data);
        ?>
        <?php } else { ?>
            <script type="text/javascript">
                document.getElementById('eklaim').style.display = 'none';
            </script>
        <?php } ?>
    </div>
    <!-- <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script> -->
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
    <title>RESUME MEDIS</title>
    <!-- <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" /> -->
</head>

<body>

    <?php if ($cara_masuk == 'UGD') { ?>
        <div class="content" id="resume_med_igd" style="page-break-after:always;">
            <?php
            $data_igd['data'] = $data;
            $data_igd['terapi'] = $terapi;
            $this->load->view('erm_print/resume_medis_igd', $data_igd);
            ?>
        </div>
    <?php } else if ($cara_masuk == 'POLI') { ?>
        <div class="content" id="resume_med_poli" style="page-break-after:always;">
            <?php
            $data_poli['data'] = $data;
            $data_poli['terapi'] = $terapi;
            $this->load->view('erm_print/resume_medis_raj', $data_poli);
            ?>
        </div>
    <?php } else if ($cara_masuk == 'RAWAT INAP') { ?>
        <div class="content" id="resume_med_ranap" style="page-break-after:always;">
            <?php
            $data_ranap['data'] = $data;
            $data_ranap['terapi'] = $terapi;
            $data_ranap['id_pelayanan'] = $id_pelayanan;
            $this->load->view('erm_print/view_resume_pulang_print', $data_ranap);

            ?>
        </div>
    <?php } ?>
    <?php if (count($labor1) > 0) { ?>
        <div class="content" id="labor">

            <?php
            foreach ($labor1 as $data2) {

                $param = array('ono' => 'A' . $data2['id_form_labor']);
                $labor = json_decode($this->curl->simple_get("http://192.168.87.2:8181/" . 'RESULTS', $param));

                if ($labor != "") {
                    $data['labor'] = $labor;
            ?>
                    <div class="content" id="labor_data" style="page-break-after:always;">

                        <?php
                        $this->load->view('print/cetak_hasil_labor', $data);
                        ?>
                    </div>
                <?php
                } else { ?>
                    <script type="text/javascript">
                        document.getElementById('labor').style.display = 'none';
                    </script>
                <?php }
                ?>

            <?php } ?>
        </div>
    <?php } ?>
    <?php if (count($radio1) > 0) { ?>
        <div class="content" id="expertise" style="page-break-after:always;">

            <h2 class="center">
                EXPERTISE
            </h2>
            <hr>
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
                    foreach ($radiologi as $row) { ?>
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
                    } ?>
                </tbody>
            </table>

        </div>
    <?php } else { ?>
        <script type="text/javascript">
            document.getElementById('expertise').style.display = 'none';
        </script>
    <?php } ?>
    <div class="content" id="kuitansi" style="page-break-after:always;">
        <?php if ($cara_masuk == 'UGD') {
             $data_kasir = $pendapatan;
             $data_kasir['tgl_keluar_rajal'] = $pasien['tgl_keluar'];
             $data_kasir['pasien'] = $pasien;
             $data_kasir['diskon'] = !empty($kasir) ? $kasir->diskon : 0;
             $data_kasir['dp'] = !empty($kasir) ? $kasir->dp : 0;
             $data_kasir['selisih'] = !empty($kasir) ? $kasir->selisih : 0;
             $data_kasir['note'] = !empty($kasir) ? $kasir->note : '';
             $data_kasir['action'] = "cetak_ulang";
             $data_kasir['opsi'] = "cetak_ulang";
             $this->load->view('print/cetak_pembayaran', $data_kasir);
        } else if ($cara_masuk == 'POLI') {
            $data_kasir = $pendapatan;
            $data_kasir['tgl_keluar_rajal'] = $pasien['tgl_keluar'];
            $data_kasir['pasien'] = $pasien;
            $data_kasir['diskon'] = !empty($kasir) ? $kasir->diskon : 0;
            $data_kasir['dp'] = !empty($kasir) ? $kasir->dp : 0;
            $data_kasir['selisih'] = !empty($kasir) ? $kasir->selisih : 0;
            $data_kasir['note'] = !empty($kasir) ? $kasir->note : '';
            $data_kasir['action'] = "cetak_ulang";
            $data_kasir['opsi'] = "cetak_ulang";
            $this->load->view('print/cetak_pembayaran_poli', $data_kasir);
        } else if ($cara_masuk == 'RAWAT INAP') {
            $data_kasir['pasien'] = $pasien;
            $data_kasir['tgl_keluar_ranap'] = $pasien['tgl_keluar'];
            $data_kasir['diskon'] = !empty($kasir) ? $kasir->diskon : 0;
            $data_kasir['dp'] = !empty($kasir) ? $kasir->dp : 0;
            $data_kasir['selisih'] = !empty($kasir) ? $kasir->selisih : 0;
            $data_kasir['note'] = !empty($kasir) ? $kasir->note : '';
            $data_kasir['action'] = "cetak_penata";
            $data_kasir['opsi'] = "cetak_ulang";
            $this->load->view('print/cetak_bayar_ranap', $data_kasir);
        }
        ?>

    </div>
    <div class="content" id="sep" style="page-break-after:always;">

        <?php if (preg_match('/BPJS/i', $pasien['cara_bayar']) && $pasien['cara_bayar'] != 'BPJSTK') { ?>
            <?php
            $id = $pasien['no_sep'];
            $headers = generate_headers();
            $key = generate_key();
            $url = base_vclaim() . "SEP/" . $id;
            $sep = get($url, $headers);
            //print_arr($data['metaData']);
            if ($sep['metaData']['code'] == 200) {

                $decript = stringDecrypt($key, $sep['response']);
                //print_arr($decript);

                $response = json_decode(decompress($decript), true);

                if (($response['noRujukan'] != null || $response['noRujukan'] != "") && $response['jnsPelayanan'] != "Rawat Inap") {
                    $url1 = base_vclaim() . "Rujukan/" . $response['noRujukan'];
                    $url3 = base_vclaim() . "Rujukan/RS/" . $response['noRujukan'];
                    $sep1 = get($url1, $headers);
                    $sep3 = get($url3, $headers);
                    // print_arr($data1['metaData']);
                    if ($sep1['metaData']['code'] == 200) {
                        $decript1 = stringDecrypt($key, $sep1['response']);
                        // print_arr($decript);

                        $response1 = json_decode(decompress($decript1), true);
                        $sep_data['rujukan'] = $response1['rujukan']['provPerujuk']['nama'];
                    } else if ($sep3['metaData']['code'] == 200) {

                        $decript3 = stringDecrypt($key, $sep3['response']);
                        $response3 = json_decode(decompress($decript3), true);
                        $sep_data['rujukan'] = $response3['rujukan']['provPerujuk']['nama'];
                    } else {
                        $sep_data['rujukan'] = "RS BAKTI TIMAH - KAB. TJ BALAI KARIMUN";
                    }
                } else {
                    $sep_data['rujukan'] = "RS BAKTI TIMAH - KAB. TJ BALAI KARIMUN";
                }

                $url2 = base_vclaim() . "/Peserta/nokartu/" . $response['peserta']['noKartu'] . "/tglSEP/" . $response['tglSep'];
                $sep2 = get($url2, $headers);
                if ($sep2['metaData']['code'] == 200) {
                    $decript2 = stringDecrypt($key, $sep2['response']);
                    $response2 = json_decode(decompress($decript2), true);
                    $sep_data['noTelepon'] = $response2['peserta']['mr']['noTelepon'];
                    $sep_data['hakKelas'] = $response2['peserta']['hakKelas']['keterangan'];
                    $sep_data['prb'] = $response2['peserta']['informasi']['prolanisPRB'];
                }
                $sep_data['data'] = $response;


                $this->load->view('print/cetak_sep_bpjs', $sep_data);
            }
            ?>
        <?php } else { ?>
            <script type="text/javascript">
                document.getElementById('sep').style.display = 'none';
            </script>
        <?php } ?>
    </div>
    <div class="content" id="eklaim" style="page-break-after:always;">
        <?php if ($eklaim != 'tidak ada data') {
            $eklaim_data['data'] = $eklaim;
            $this->load->view('print/eclaim', $eklaim_data);
        ?>
        <?php } else { ?>
            <script type="text/javascript">
                document.getElementById('eklaim').style.display = 'none';
            </script>
        <?php } ?>
    </div>
    <!-- <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script> -->
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