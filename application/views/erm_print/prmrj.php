<!DOCTYPE html>
<html>

<head>
    <title>PRMRJ <?= $nama ?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid black;

        }

        .garisbawah {
            border-bottom: 1px solid;
        }

        .gariskanan {
            border-right: 1px solid;
        }

        body {
            /* size: A4; */
            size: landscape;
            margin: 30pt;

        }

        @media print {
            @page {
                size: landscape;
                margin: 30pt;

                /* @bottom-center {
                content: counter(page) " of "counter(pages);
            } */
            }

            /* html,
        body {
            margin: 20pt;
            width: 210mm;
            height: 297mm;
        } */
        }
    </style>
</head>

<body>
    <div class="">
        <table class="a" style="width: 100%">
            <tr>
                <td width = 200px>
                <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
                </td>
                <td>
                    <font><b>RS. Bakti Timah</b></font><br>
                    <font>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</font><br>
                    <font>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</font><br>
                    <font>Telp. 0717 9100844, Fax. 0715 32165</font>
                </td>

            </tr>
        </table>
        <hr>
        <table class="a" style="width: 100%">
            <tr>

                <td>
                    <p>NRM : <?= $no_rm ?></p>
                    <p>Nama : <?= $nama ?></p>
                    <p>Jenis Kelamin : <?= $jenis_kelamin ?></p>
                    <p>Tanggal Lahir : <?= indo_date2($tgl_lahir) ?></p>
                    <!-- <p >(Mohon diisi stiker jika ada)</p> -->

                </td>
            </tr>
        </table>
        <h3 class="center">
            <p style="margin-top:-20px"> PROFIL RINGKAS MEDIS RAWAT JALAN (PRMRJ)</p>
        </h3>
        <table width=100% class="table1" border="1" cellspacing=0 style="margin-top:-20px;   ">
            <br>
            <tr>
                <td colspan=8>Alergi</td>

            </tr>


            <tr>
                <td width="12px" class="center">No</td>
                <td width="12px" class="center">Tanggal Berkunjung</td>
                <td width="12px" class="center">Poli</td>
                <td width="30px" class="center">Diagnosis</td>
                <td width="12px" class="center">Pemeriksaaan Penunjang</td>
                <td width="12px" class="center">Obat-obatan / Jenis Pemeriksaan</td>
                <td width="12px" class="center">Riwayat Rawat Inap sejak Kunjungan Terakhir</td>
                <td width="12px" class="center">Prosedur Bedah/Operasi sejak kunjungan terakhir</td>
                <td width="12px" class="center">Nama Jelas dan Tanda tangan DPJP</td>
            </tr>
            <?php if (count($pelayanan) > 0) {
                $nomor = 1;
                foreach ($pelayanan as $row) {
            ?>

                    <tr>
                        <td width="12px" class="center"><?= $nomor ?></td>
                        <td width="12px" class="center"><?= indo_date2($row->tgl_masuk) . ' ' . date('H:i:s', strtotime($row->tgl_masuk)) ?></td>
                        <td width="12px" class="center"><?= $row->nama_panjang ?></td>
                        <td width="12px" class="center"><?php $diagnosa_utama = $this->db->query("SELECT * from diagnosa_utama where id_history = '$row->id_history'")->row();
                                                        echo !empty($diagnosa_utama) ? $diagnosa_utama->nama_diagnosa : '';
                                                        // echo $row->id_history;

                                                        ?></td>
                        <td width="12px" class="center"><?php $labor = $this->db->query("SELECT nama_tindakan from tindakan_labor where poli = '$row->id_history'")->result_array();
                                                        if (!empty($labor)) {
                                                            foreach ($labor as $row1) {
                                                                $k[] = $row1['nama_tindakan'];
                                                            }
                                                            echo implode(',', $k);
                                                        } else {
                                                            echo '';
                                                        }

                                                        ?>
                            <br>
                            <?php $radiologi = $this->db->query("SELECT l.nama from tindakan_radiologi t, list_tindakan_radiologi l 
                                                        where t.id_tindakan = l.id_daftar_tindakan and t.poli = '$row->id_history'")->result_array();
                            if (!empty($radiologi)) {
                                foreach ($radiologi as $row2) {
                                    $l[] = $row2['nama'];
                                }
                                echo implode(',', $l);
                            } else {
                                echo '';
                            }
                            ?>
                        </td>
                        <td width="12px" class="center"><?php $obat = $this->db->query("SELECT l.nama from tindakan_farmasi t, list_logistik l 
                                                        where t.id_list_tindakan = l.id_logistik and t.poli = '$row->id_history'")->result_array();
                                                        if (!empty($obat)) {
                                                            foreach ($obat as $row3) {
                                                                $m[] = $row3['nama'];
                                                            }
                                                            echo implode(',', $m);
                                                        } else {
                                                            echo '';
                                                        }
                                                        ?>
                            <br>
                            <?php $ases_dokter = $this->db->query("SELECT * from form_assesmen_dokter where id_history = '$row->id_history'")->row();
                            echo !empty($ases_dokter) ? $ases_dokter->terapi : '';

                            ?>
                        </td>
                        <td width="12px" class="center"></td>
                        <td width="12px" class="center"></td>
                        <td width="12px" class="center"><?= $row->dpjp ?></td>
                    </tr>
                <?php
                    $nomor++;
                }
            } else { ?>

                <tr width="90">
                    <td colspan="4" class=gariskanan>
                        <center>Tidak ada data</center>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // window.print();
        });
    </script>
</body>

</html>