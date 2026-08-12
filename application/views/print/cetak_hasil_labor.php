<!DOCTYPE html>
<html>

<head>

    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid;

        }


        .table1,
        tr {
            vertical-align: text-top;
        }

        .garisbawah {
            border-bottom: 2px solid;
        }

        .garisatas {
            border-top: 2px solid;
        }
    </style>
</head>

<body onload="myFunction()">

    <div class="content">
        <table>
            <tr>
                <td> <a><img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" width="100px" alt="logo" /></a></td>
                <td> <a><img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" width="200px" alt="logoa" /></a></td>
                <td class=gariskanan>

                </td>

            </tr>
        </table>
        <hr>
        <h2 align="center"><u> HASIL LABORATORIUM</h2></u>

        <table class="a" style="width: 100%">
            <tr>
                <td>
                    <p><b>Laboratorium Patalogi Klinik</b></p>
                </td>
                <!-- <td>
                    <p><b>Halaman :</b></p>
                </td> -->
            </tr>
        </table>
        <hr>
        <!-- </?php print_arr($labor) ?> -->
        <table width=100% cellspacing=0 border="0">
            <tr>
                <td>

                    <table>
                        <tr>
                            <td>
                                Lab No.
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo  $labor[0]->LABNO ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No. RM
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo  $labor[0]->PID ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nama Pasien
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo  $labor[0]->PNAME ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tanggal Lahir
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo  $labor[0]->DOB ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Alamat
                            </td>
                            <td>
                                :
                            </td>
                            <td width=50%>
                                <?php echo  $labor[0]->PADDRESS1 ?>
                            </td>
                        </tr>
                    </table>

                </td>
                <td>
                    <table>
                        <tr>
                            <td>
                                Dokter
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo  $labor[0]->CLINICIAN ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Ruangan / Poli
                            </td>
                            <td>
                                :
                            </td>
                            <td>

                                <?php echo $labor[0]->SOURCE; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Kamar
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo ($labor[0]->PTYPE == "OUTPATIENT") ? '-' : $labor[0]->SOURCE; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tanggal Order
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo  $labor[0]->TGLORDER ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tanggal Terima
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo  $labor[0]->TGLORDER ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tanggal Cetak
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo  date("d/m/Y H:i") ?>

                            </td>
                        </tr>
                    </table>
            </tr>
        </table>

        <table width=100% cellspacing=0>
            <tr>
                <td class="garisbawah garisatas" width=30%> Jenis Pemeriksaan
                </td>
                <td class="garisbawah garisatas" width=15%> Hasil
                </td>
                <td class="garisbawah garisatas" width=15%> Satuan
                </td>
                <td class="garisbawah garisatas"> Nilai Rujukan
                </td>
                <td class="garisbawah garisatas"> Keterangan
                </td>
            </tr>

            <?php
            $group = array();
            foreach ($labor[0]->RESULT as $row) {
                $group[$row->GROUP][] = $row;
            }
            //print_arr($group);
            ?>
            <?php
            foreach ($group as $key => $value) {
            ?>
                <tr height="40px">
                    <td><b><?= $key ?></b></td>

                </tr>
                <?php foreach ($value as $k) {
                ?>
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
        </table>
        <br>
        <table width=100% cellspacing=0>
            <tr>
                <td>
                    <div style="width: 30%; text-align: left; float: left;">Pemeriksa : <?php $data = $this->session->userdata('data_auth');
                                                                                        $db = $this->db->get_where('staff', ['id_staff' => $data->id_staff])->row_array();
                                                                                        echo $db['nama']; ?></div><br>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="width: 20%; text-align: left; float: right;">Penanggung Jawab :</div><br>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="width: 30%; text-align: left; float: left;"></div><br>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="width: 20%; text-align: left; float: right;"><img src="<?php echo base_url() . 'assets/ttd/cap_labor.jpg'; ?>" width="150px"></div><br>
                </td>
            </tr>
            <tr>
                <td>

                    <div style="width: 20%; text-align: left; float: left;"></div><br>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="width: 20%; text-align: left; float: right;">dr. Nur Fitri Hayati Melida Ritonga, Sp.PK</div><br>
                </td>
            </tr>

        </table>
    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        window.onafterprint = function(e) {
            closePrintView();
        };

        function myFunction() {
            window.print();
        }

        function closePrintView() {
            window.location.href = 'javascript:history.go(-1)';
        }
    </script>
</body>

</html>