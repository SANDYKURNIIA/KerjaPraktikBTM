<!DOCTYPE html>
<html>
<head>
    <title>Print out <?=$page_title?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css"/>
    <style type="text/css">
           
           
            .table1 {
    color: #232323;
    border-collapse: collapse;
    border: 0px solid ;

}

.table2 {
    color: #232323;
    border-collapse: collapse;
    border: 1px solid ;

}


.garisbawah {
    border-bottom: 1px solid;
}

.gariskanan {
    border-right: 1px solid;
}
.box{
    border-bottom: 1px solid;
    width:1px;
    height:1px;

}


.block,

li {
  border: 1px solid black;
  padding: .1em;
  width:29px;
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
  width:50px;

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
    <table style="margin-top:-10px; font-size:11px" width=100%>
			<tr>
				<td width=150px>
					<img src="<?=base_url()?>resources/img/rsbt_logo.jpg" style="width: 150px;">
				</td>
				<td width="40%">
					<p><b>RS. Bakti Timah</b></p>
					<p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
				</td>
                <td >
                    <table style="margin-right:-50px; font-size:14px" class="table2 right" width=100%>
                        <tr>
                            <td width=40%>NRM</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                        </tr>
                    </table>
                </td>
			</tr>
		</table>

       

        <center><b>FORMULIR TRANSFER PASIEN INTRA RUMAH SAKIT</b></center>
    <table class="table2">
        <tr>
            <td>

<!--table 1-->
            <table width=100% class="table1" cellspacing=0>
                <tr>
                    <td width="17%">Tanggal Masuk  </td>
                    <td>:……………………………</td>
                    <td>Tanggal / Jam Pindah </td>
                    <td>: ……………………………</td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>Pindah ke Ruang / Kelas </td>
                    <td>: ……………………………</td>
                </tr>

                <tr>
                    <td>DPJP  </td>
                    <td>:  ……………………………</td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Diagnosis  </td>
                    <td>:  ……………………………</td>
                    <td></td>
                    <td></td>
                </tr>
               

            </table>

<!--end table 1-->

<!--table2-->
            <table width=100% class="table1" cellspacing=0>
                <tr>
                    <td>Cara Transfer   :</td>
                    <td><span>__</span> Jalan Sendiri</td>
                    <td><span>__</span> Kursi Roda</td>
                    <td><span>__</span> Barnkard</td>
                    <td><span>__</span>Lain lain</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="5"><b>I. PEMERIKSAAN FISIK</b></td>
                </tr>

            </table>
<!--end table 2-->

<!--table bonus-->

            <table width=100% class="table1" cellspacing=0>
               
                <tr>
                    <td width=25%>
                        &nbsp; a. Keadaan Umum 
                    </td>
                    <td>:......................................</td>
                </tr>
                <tr>
                    <td>
                        &nbsp; b. Kesadaran 
                    </td>
                    <td>:......................................</td>
                </tr>

                <tr>
                    <td>
                        &nbsp; c. Tanda Tanda Vital 
                    </td>
                    <td>:</td>
                </tr>
            </table>
<!--end table bonus-->

<!--table 3-->
            <table width=100%  class="table1" cellspacing=0>

                <?php
                $skala = 0;
                if (isset($data['skor_nyeri']) && $data['skor_nyeri'] !== '') {
                    $skala = intval($data['skor_nyeri']);
                } elseif (isset($data['skala_nyeri']) && is_numeric($data['skala_nyeri'])) {
                    $skala = intval($data['skala_nyeri']);
                } elseif (isset($data['skala_nyeri']) && is_string($data['skala_nyeri'])) {
                    $label = strtolower(trim($data['skala_nyeri']));
                    if (strpos($label, 'tidak') !== false) {
                        $skala = 0;
                    } elseif (strpos($label, 'ringan') !== false) {
                        $skala = 2;
                    } elseif (strpos($label, 'sedang') !== false) {
                        $skala = 4;
                    } elseif (strpos($label, 'mengganggu') !== false) {
                        $skala = 6;
                    } elseif (strpos($label, 'berat') !== false) {
                        $skala = 8;
                    } elseif (strpos($label, 'sangat berat') !== false) {
                        $skala = 10;
                    }
                }

                switch ($skala) {
                    case 0:
                        $gambar = "tidak_nyeri.png";
                        $status = "Tidak Nyeri";
                        break;
                    case 1:
                    case 2:
                        $gambar = "nyeri_ringan.png";
                        $status = "Nyeri Ringan";
                        break;
                    case 3:
                    case 4:
                        $gambar = "nyeri_sedang.png";
                        $status = "Nyeri Sedang";
                        break;
                    case 5:
                    case 6:
                        $gambar = "nyeri_sedang1.png";
                        $status = "Nyeri Mengganggu";
                        break;
                    case 7:
                    case 8:
                        $gambar = "nyeri_berat.png";
                        $status = "Nyeri Berat";
                        break;
                    case 9:
                    case 10:
                        $gambar = "nyeri_sangat_berat.png";
                        $status = "Nyeri Sangat Berat";
                        break;
                    default:
                        $gambar = "tidak_nyeri.png";
                        $status = "-";
                }
                ?>

                <tr>
                    <td width="5%"></td>
                    <td width="15%" >TD :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mmHg</td>
                    <td width="15%" >Suhu :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;°C </td>
                    <td width="15%" >Nadi :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x/mnt</td>
                    <td width="15%" > RR :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x/mnt</td>
                    <td width="15%">Skala Nyeri :</td>
                    <td width="15%" style="text-align:center;">
                        <img src="<?= base_url('assets/dist/img/'.$gambar); ?>" style="width:40px;"><br>
                        <strong><?= $skala ?></strong><br>
                        <?= $status ?>
                    </td>
                </tr>

                <tr>
                    <td width="40"></td>
                    <td>Respiratori :  Dada</td>
                    <td><span>__</span>Simetris</td>
                    <td><span>__</span>Asimetris</td>
                    <td><span>__</span>Bernafas</td>
                    <td><span>__</span>Nyeri</td>
                    <td><span>__</span>Tidak Nyeri</td>
                </tr>

                 <tr>
                    <td width="40"></td>
                    <td> &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Bunyi paru</td>
                    <td><span>__</span>Ronkhi</td>
                    <td><span>__</span>Wheezing</td>
                    <td><span>__</span>Vesikular</td>
                    <td><span>__</span>Crackles</td>
                    <td></td>
                </tr>

                 <tr>
                    <td width="40"></td>
                    <td>Sirkulasi :</td>
                    <td><span>__</span>Nyeri Dada</td>
                    <td><span>__</span>Sakit Kepala/Pusing</td>
                    <td><span>__</span>Cyanosis</td>
                    <td><span>__</span>Berdebar</td>
                    <td></td>
                </tr>

            </table>


<!--end table 3-->

<!--table bonus-->

            <table width=100% class="table1" cellspacing=0>
               
                <tr>
                    <td>
                        &nbsp; d. Keluhan 
                    </td>
                    <td>:......................................</td>
                </tr>
                <tr>
                    <td>
                        &nbsp; e. Riwayat Penyakit 
                    </td>
                    <td>:......................................</td>
                </tr>
            </table>
<!--end table bonus-->

<!--table bonus lagi-->
<table width=100% class="table1" cellspacing=0>
               
                <tr>
                    <td>
                        &nbsp; f. Riwayat Alergi
                    </td>
                    <td><span>__</span>Tidak</td>
                    <td><span>__</span>Ada, Sebutkan :</td>
                    <td></td>
                </tr>
                <tr >
                    <td>
                       
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr >
                    <td>
                       
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr >
                    <td>
                       
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
               
            </table>

<!--akhir table bonus-->
<!-- table empat-->
<br>
<table width=100% class="table1" cellspacing=0>
                <tr>
                    <td><b>II. PEMERIKSAAN DIAGNOSIS YANG TELAH DILAKUKAN</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                   
                </tr>

               
               

            </table>

<!--end table empat-->
<table width=100% class="table1" cellspacing=0>
    <tr>
                    <td>&nbsp; <span>__</span>Laboratorium.</td>
                    <td ></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>&nbsp; <span>__</span>EKG</td>
                    <td><span>__</span>HSG</td>
                    <td><span>__</span>CTG</td>
                    <td></td>
                </tr>

                <tr>
                    <td>&nbsp; <span>__</span>USG</td>
                    <td><span>__</span>Appendicogram</td>
                    <td><span>__</span>BNO</td>
                    <td></td>
                </tr>

                <tr>
                    <td>&nbsp; <span>__</span>Rontgen :</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

</table>


<br>
<!-- table empat-->
<table width=100% class="table1" cellspacing=0>
                <tr>
                    <td><b>III.TINDAKAN MEDIS YANG SUDAH DILAKUKAN</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                   
                </tr>

               
               

            </table>

<!--end table empat-->

<!-- table empat-->
<table width=100% class="table1" cellspacing=0>
                <tr>
                    <td>&nbsp; 1 ...............................</td>
                </tr>

                <tr>
                    <td>&nbsp; 2 ...............................</td>
                </tr>

                <tr>
                    <td>&nbsp; 3 ...............................</td>
                </tr>

            </table>

<!--end table empat-->

<!-- table empat-->
<br>
<table width=100% class="table1" cellspacing=0>
                <tr>
                    <td><b>IV. PEMBERIAN THERAPI</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                   
                </tr>

               
               

            </table>

<!--end table empat-->

<table width=100% class="table1" cellspacing=0>
                <tr>
                    <td><b>&nbsp;Infus</b></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                </tr>

            </table>

<!--end table empat-->

<!--end table empat-->

<table width=100% class="table2" cellspacing=0>
               

                <tr class=garisbawah >
                    <td class=gariskanan><center>Nama Obat</center></td>
                    <td width="150" class=gariskanan><center>Dosis</center></td>
                    <td><center>Cara Pemberian</center></td>

                </tr>

                 <tr  height="100" >
                    <td class=gariskanan><center></center></td>
                    <td width="150" class=gariskanan><center></center></td>
                    <td><center></center></td>

                </tr>

            </table>

<!--end table empat-->

<!-- table empat-->
<br>
<table width=100% class="table1" cellspacing=0>
                <tr>
                    <td><b>V. KONDISI PASIEN</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                   
                </tr>
            </table>

<!--end table empat-->

<!--table akhir-->
            <table width=100% class="table1" cellspacing=0>
                <tr>
                    <td colspan="5">a. Saat transfer : .................</td>
                </tr>

                <tr>
                    <td colspan="5">b. Saat Serah Terima :.........</td>
                </tr>
                <tr>
                    <td>&nbsp; &nbsp; Tanda-tanda vital</td>
                    <td>TD :        mmHg </td>
                    <td>Suhu :     °C</td>
                    <td>Nadi :       x/mnt</td>
                    <td>RR :       x/mnt</td>
                </tr>

                 <tr>
                    <td></td>
                    <td colspan="4">Skala Nyeri :</td>
                   
                </tr>
            </table>


<!--end table akhir-->

<!--table untuk ttd-->
            <table width=100% class="table1" cellspacing=0>
                <tr>
                    <td><center>Petugas Transfer</center></td>
                    <td><center>Petugas Yang Menerima</center></td>
                </tr>
                <tr height="150">
                    <td><center>(..........................)</center></td>
                    <td><center>(..........................)</center></td>
                </tr>

            </table>
            </td>
        </tr>
    </table> 
<!--end table untuk ttd-->

























 <!--batas-->
       
       



    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
    </script>
</body>
</html>
