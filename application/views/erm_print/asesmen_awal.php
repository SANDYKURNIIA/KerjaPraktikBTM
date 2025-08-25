<!DOCTYPE html>
<html>
<head>
    <title>Print out <?=$page_title?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css"/>
    <style type="text/css">
            
            
            .table1 {
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
        <table class="a" style="width: 100%">
            <tr>
                <td>
                    <img src="<?=base_url()?>resources/img/rsbt_logo.jpg" style="width: 150px;">
                </td>
                <td>
                    <p><b>RS. Bakti Timah</b></p>
					<p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
					<p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
					<p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
                <td>
        <table width=100% class="table1" cellspacing=0>
                        <tr>
                            <td>
                                <p>NRM :</p>
                                <P>Nama :</P>
                                <p>Jenis Kelamin :</p>
                                <p>Tanggal Lahir :</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <h2 align="center">ASESMEN RAWAT JALAN</h2>

<!--table 1-->
        <table width=100% class="table1" cellspacing=0>
            <tr class=garisbawah>
                <td>Tanggal Kunjungan :</td>
                <td >Jam :</td>
            </tr>
            <tr >
                <td align="center" colspan="2"><b>PENGKAJIAN KEPERAWATAN</b></td>
            </tr>
            <tr class=garisbawah>
                <td colspan="2">&nbsp;</td>
            </tr>

        </table>
<!--end table 1-->

<!--table 2-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>Tekanan Darah :</td>
                <td>mmHg</td>
                <td>Suhu:</td>
                <td> ºC</td>
                <td>Berat Lahir </td>
                <td> gram</td>
            </tr>

            <tr>
                <td>Nadi</td>
                <td> x/mnt</td>
                <td>Tinggi Badan</td>
                <td>cm</td>
                <td>Lingkar Kepala :</td>
                <td> cm</td>
            </tr>

            <tr class=garisbawah>
                <td>Pernafasan</td>
                <td> x/mnt</td>
                <td>Tinggi Badan</td>
                <td>kg</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td align="center" colspan="6"><b>Riwayat Psikososial, Spiritual dan Ekonomi</b></td>
            </tr>


        </table>
<!--end table 2-->

<!--table 3-->
        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td >Bicara</td>
                <td><span>__</span>Jelas</td>
                <td><span>__</span>Tidak</td>
                <td ></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td >Komunikasi</td>
                <td><span>__</span>Verbal</td>
                <td><span>__</span>Non Verbal</td>
                <td ><span>__</span>Apatis</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td  >Status Psikologi</td>
                <td><span>__</span>Tenang</td>
                <td><span>__</span>marah</td>
                <td ><span>__</span>Takut</td>
                <td><span>__</span>cemas</td>
                <td><span>__</span>Sedih</td>
            </tr>


            <tr>
                <td>Sosiologi</td>
                <td><span>__</span>Komunikatif</td>
                <td><span>__</span>Komunikan</td>
                <td colspan="2"><span>__</span>Tidak Efektif</td>
                <td><span>__</span>Menarik Diri</td>
            </tr>

            <tr>
                <td>Pendidikan</td>
                <td><span>__</span>Belum Sekolah</td>
                <td><span>__</span>SD</td>
                <td><span>__</span>SMP</td>
                <td><span>__</span>SMA</td>
                <td><span>__</span>Akademi/Sarjana/Magister</td>
            </tr>

            <tr>
                <td>Agama</td>
                <td><span>__</span>Islam</td>
                <td><span>__</span>Protestan</td>
                <td><span>__</span>Katolik</td>
                <td><span>__</span>Hindu</td>
                <td><span>__</span>Budha</td>
            </tr>

            <tr>
                <td>Pekerjaan</td>
                <td><span>__</span>Swasta</td>
                <td><span>__</span>PNS/TNI/POLRI</td>
                <td><span>__</span>Wiraswasta</td>
                <td><span>__</span>Pelaut/petani</td>
                <td><span>__</span>Lainnya</td>
            </tr>

             <tr class=garisbawah>
                <td >Ekonomi</td>
                <td><span>__</span>Baik</td>
                <td><span>__</span>Cukup</td>
                <td ><span>__</span>Kurang</td>
                <td></td>
                <td></td>
            </tr>

             <tr class=garisbawah>
                <td align="center" colspan="6" ><b>Riwayat Kesehatan Pasien</b></td>
            </tr>

            <tr >
                <td  colspan="6" >Keluhan Utama :</td>
            </tr>

            <tr >
                <td  colspan="6" >&nbsp;</td>
            </tr>

            <tr >
                <td  colspan="6" >Riwayat Penyakit Dahulu :</td>
            </tr>

            <tr >
                <td  colspan="6" >&nbsp;</td>
            </tr>

            <tr >
                <td  colspan="6" >Riwayat Kesehatan Keluarga :</td>
            </tr>

            <tr >
                <td  colspan="6" >&nbsp;</td>
            </tr>

            <tr class=garisbawah >
                <td  colspan="6" >Riwayat Penggunaan Obat :</td>
            </tr>

            <tr class=garisbawah >
                <td  colspan="6" ><b>Alloanamnesa :</b></td>
            </tr>

            <tr class=garisbawah >
                <td   ><b>Alergi :</b></td>
                <td colspan="2"><span>__</span>Ya</td>
                <td colspan="3"><span>__</span>Tidak</td>
            </tr>

            <tr class=garisbawah >
                <td colspan="2"  ><b>Asesmen Nyeri :</b></td>
                <td colspan="4"><img src="<?=base_url()?>resources/img/assesman_awal.png" style="width: 400px;"></td>
              
            </tr>

            <tr align="center" class=garisbawah >
                <td  colspan="6" ><b>Pengkajian Risiko Pasien Jatuh</b></td>
            </tr>

        </table>
<!--end table 3-->

<!--table 4-->
        <table width=100% class="table1" cellspacing=0>
            <tr class=garisbawah>
                <td class=gariskanan>No</td>
                <td class=gariskanan>Faktor Risiko</td>
                <td class=gariskanan>Ya</td>
                <td class=gariskanan>Tidak</td>
                <td class=gariskanan>Skor</td>
            </tr>

             <tr class=garisbawah>
                <td class=gariskanan>1</td>
                <td class=gariskanan>Riwayat jatuh akhir-akhir ini</td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

            <tr class=garisbawah>
                <td class=gariskanan>2</td>
                <td class=gariskanan>Gangguan BAB/ BAK (Inkontinesia, sering ke kamar mandi)</td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

             <tr class=garisbawah>
                <td class=gariskanan>3</td>
                <td class=gariskanan>Disorientasi / bingung</td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

            <tr class=garisbawah>
                <td class=gariskanan>4</td>
                <td class=gariskanan>Depresi</td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

            <tr class=garisbawah>
                <td class=gariskanan>5</td>
                <td class=gariskanan>Vertigo / pusing</td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

            <tr class=garisbawah>
                <td class=gariskanan>6</td>
                <td class=gariskanan>Kelemahan umum, kesulitan berjalan</td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

            <tr class=garisbawah>
                <td class=gariskanan>7</td>
                <td class=gariskanan>Pikun / demensia</td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

             <tr class=garisbawah>
                <td class=gariskanan>8</td>
                <td class=gariskanan>Mendapat obat : antihistamin, antihipertensi, henzodiazepines, diuretik, diabetik, narkotik,  </td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

            <tr class=garisbawah>
                <td class=gariskanan></td>
                <td class=gariskanan>psikotropik, sedative / hipnotic, vasadilator cerebral dan perifer antara lain : brainact, stugeron</td>
                <td class=gariskanan><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p></td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

            <tr class=garisbawah>
                <td class=gariskanan></td>
                <td class=gariskanan>neulin ps, degrium dan sebelium.</td>
                <td class=gariskanan><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p></td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

             <tr class=garisbawah>
                <td class=gariskanan>9</td>
                <td class=gariskanan>Perawatan di ruang ICU, recovery room, prepartum</td>
                <td class=gariskanan><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p></td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

             <tr class=garisbawah>
                <td colspan="5" align="center" class=gariskanan><b>Keterangan : bila total skor ≥ 1 dikategorikan rendah dan ≥ 5 dikategorikan tinggi.</b></td>
            </tr>

        </table>


<!--end table 4-->

<!--table akhir-->
        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td colspan="2"><b>Skrining Gizi Awal dengan MST (Malnutrition Screening Tool) </b></td>
            </tr>

            <tr>
                <td colspan="2">1. Apakah ada penurunan berat badan yang tidak diingikan selama 6 bulan terakhir?</td>
            </tr>

            <tr>
                <td> a. Tidak  = 0</td>
                <td></td>
            </tr>

            <tr>
                <td> b. Tidak Yakin  = 2</td>
                <td></td>
            </tr>

            <tr>
                <td> c. Ya, 1-5 kg = 1</td>
                <td>11-15 kg = 3</td>
            </tr>

            <tr>
                <td>  6-10 kg = 2</td>
                <td>≥ 15 kg = 4</td>
            </tr>

            <tr>
                <td colspan="2">2. Apakah asupan makan menurun yang dikarenakan adanya penurunan nafsu makan atau kesulitan  menerima makanan?</td>
            </tr>

            <tr>
                <td> a. Tidak = 0</td>
                <td> b. Ya = 1</td>
            </tr>

            <tr>
                <td><b>Total Skor =</b></td>
                <td>Bila Skor ≥ 2, pasien berisiko malnutrisi tinggi, konsul ke Ahli Gizi.</td>
            </tr>

        </table>




<!--end table akhir-->
    
        


    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
    </script>
</body>
</html>