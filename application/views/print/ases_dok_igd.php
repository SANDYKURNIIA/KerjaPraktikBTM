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
        
        <table width=100% class="table1" cellspacing=0 >
        <tr >
                <td width="220" class=gariskanan>
                    <img src="<?=base_url()?>resources/img/rsbt_logo.jpg" style="width: 200px;">
                </td>

                <td class=gariskanan>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>

                <td class=gariskanan>
                    <p>No. RM :………………………</p>
                    <p>Nama     :…………………………</p>
                    <p>Tgl Lahir :………………………</p>
                    <p>Jenis Kelamin :…………………</p>
                </td>

                
        </tr>
    </table>

<!--table satu-->
        <table width=100% class="table1" cellspacing=0 >
            <tr align="center">
                <td>
                    <b>PENGKAJIAN DOKTER</b>
                </td>
                
            </tr>

        </table>
<!--end of table satu-->

<!--new one-->
        <table width=100% class="table1" cellspacing=0 >

            <tr>
                <td colspan="2" height="30">Jam melakukan asesmen</td>
                <td colspan="4" height="30">WIB</td>

            </tr>

            <tr>
                <td colspan="6" height="30"><b>Data Psikologis, Sosial, Ekonomi Dan Spiritual</b></td>  
            </tr>


            <tr>
                <td>Psikologis:</td>
                <td><span>__</span>Stabil/Tenang</td>
                <td><span>__</span>Cemas/Takut</td>
                <td><span>__</span>Marah</td>
                <td><span>__</span>Sedih</td>
                <td><span>__</span>Kecenderungan bunuh diri</td>
            </tr>

            <tr>
                <td></td>
                <td><span>__</span>Gangguan Jiwa</td>
                <td colspan="3"><span>__</span>Lainnya :............. </td>
               
                <td></td>
            </tr>
            <tr >
                <td colspan="6" height="20"></td>
            </tr>

            <tr>
                <td>Hambatan Sosial:</td>
                <td></td>
                <td><span>__</span>Tidak Ada</td>
                <td colspan="3"><span>__</span>Ada,sebutkan ...................</td>
                
            </tr>

            <tr>
                <td>Hambatan Ekonomi:</td>
                <td></td>
                <td><span>__</span>Tidak Ada</td>
                <td colspan="3"><span>__</span>Ada,sebutkan ...................</td>
                
            </tr>

            <tr>
                <td>Hambatan Spritual:</td>
                <td></td>
                <td><span>__</span>Tidak Ada</td>
                <td colspan="3"><span>__</span>Ada,sebutkan ...................</td>
                
            </tr>

            <tr >
                <td colspan="6" height="20"></td>
            </tr>

            <tr >
                <td colspan="6" height="6"><b>Anamnesis</b></td>
            </tr>

            <tr >
                <td colspan="6" height="6">Keluhan Utama :</td>
            </tr>

            <tr >
                <td colspan="6" height="6">Riwayat Penyakit Sekarang :</td>
            </tr>

            <tr >
                <td colspan="6" height="100"></td>
            </tr>

            <tr >
                <td colspan="6" height="6">Riwayat Penyakit Dahulu :</td>
            </tr>

            <tr >
                <td colspan="6" height="50"></td>
            </tr>

        </table>


<!--end new one-->

<!--table baru lagi-->
        <table width=100% class="table1" cellspacing=0 >

        <tr>
            <td colspan="5" ><b>PEMERIKSAAN FISIK</b></td>
            
        </tr>

        <tr>
            <td>Tanda Vital</td>
            <td>TD  = mmHg</td>
            <td>Nadi = x/menit</td>
            <td>Pernafasan = x/menit</td>
            <td>Suhu = oC</td>
        </tr>

        <tr>
            <td></td>
            <td>Skala Nyeri  =</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="3">
                <p >GCS:</p>
                <p>&nbsp;</p>
                <p >Kondisi Umum :</p>
                <p>&nbsp;</p>
                <p ><b>KEPALA :</b></p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p><b>HIDUNG :</b></p>
                <p><b>MULUT  :</b></p>
                <p><b>LEHER  :</b></p>
                <p>&nbsp;</p>
                <p><b>THORAX :</b></p>
                <p>Jantung   :</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>paru</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </td>
            <td colspan="2">
                <img src="<?=base_url()?>resources/img/orang.png" style="width: 300px; ">
            </td>
        </tr>

        </table>


<!--akhir tabel baru lagi-->

<!--new table lagi-->
        <table width=100% class="table1" cellspacing=0 >
            <tr height="70">
                <td><b>ABDOMEN DAN PELVIS       :</b></td>
            </tr>

            <tr height="70">
                <td><b>PUNGGUNG & PINGGANG   :</b></td>
            </tr>

            <tr height="70">
                <td><b>EKSTREMITAS  :</b></td>
            </tr>

        </table>

<!--end new table lagi-->

<!--table baru lagi-->

        <table width=100% class="table1" cellspacing=0 >
            <tr>
                <td><b>PEMERIKSAAN PENUNJANG</b></td>
                <td width="300"></td>
            </tr>

            <tr>
                <td><span>__</span>Laboratorium :</td>
                <td width="300"><span>__</span>USG :</td>
            </tr>

            <tr>
                <td> &nbsp; &nbsp; &nbsp;Jam Pemeriksaan :</td>
                <td width="300"><span>__</span>EKG :</td>
            </tr>

            <tr>
                <td> &nbsp; &nbsp; &nbsp;Jam Selesai :</td>
                <td width="300"><span>__</span>CTG :</td>
            </tr>

            <tr>
                <td><span>__</span>Laboratorium :</td>
                <td width="300"><span>__</span>Lainnya :</td>
            </tr>

            <tr>
                <td> &nbsp; &nbsp; &nbsp;Jam Pemeriksaan  :</td>
                <td width="300"></td>
            </tr>

            <tr>
                <td> &nbsp; &nbsp; &nbsp;Jam selesai :</td>
                <td width="300"></td>
            </tr>

        </table>
<!--end table baru lagi-->

<!--4 table terakhir-->
        <table width=100% class="table1" cellspacing=0 >
            <tr height="200">
                <td><b>DIAGNOSA :</b></td>
            </tr>
             

        </table>
<!--end 4 table terakhir-->

<!--3 table terakhir-->
        <table width=100% class="table1" cellspacing=0 >
            <tr>
                <td width="300"><b>TERAPI / INSTRUKSI :</b></td>
                <td class="gariskanan"><b >Jam : </b></td>
                <td width="300"><b>KONSUL :</b></td>
                <td><b>Jam : </b></td>
            </tr>

            <tr height="200">
                <td width="300" ><b></b></td>
                <td class="gariskanan"><b></b></td>
                <td width="300"><b></b></td>
                <td><b></b></td>
            </tr>


<!--end 3 table terakhir-->

<!--2 table terakhir-->
        <table width=100% class="table1" cellspacing=0 >
            <tr>
                <td><b>TINDAK LANJUT :</b></td>
                <td></td>
                <td width="130"></td>
            </tr>

            <tr>
                <td> &nbsp; <span>__</span>  Pulang Atas Permintaan Sendiri</td>
                <td> &nbsp; <span>__</span>  Pulang Atas Permintaan Persetujuan</td>
                <td width="130"></td>
            </tr>

            <tr>
                <td> &nbsp; <span>__</span>  Dirujuk ke ………………………………</td>
                <td> &nbsp; <span>__</span>  Kontrol tanggal……………………  </td>
                <td width="130">ke……………</td>
            </tr>

            <tr>
                <td> &nbsp; <span>__</span>Rawat inap (Jam transfer : ……………………)</td>
                <td> &nbsp; <span>__</span>Meninggal Jam :  </td>
                <td width="130"></td>
            </tr>
        </table>
<!--end 2 table terakhir-->

<!--table terakhir-->
        <table width=100% class="table1" cellspacing=0 >
            <tr>
                <td><center>Tanggal : …………… Jam : …………</center></td>
                <td><center>Tanggal : …………… Jam : …………</center></td>
            </tr>

            <tr>
                <td>Telah dijelaskan dan dipahami kepada :</td>
            </tr>

            <tr>
                <td>&nbsp; <span>__</span>  Pasien</td>
                <td></td>
            </tr>

            <tr>
                <td>&nbsp; <span>__</span>Keluarga, hubungan dengan pasien :</td>
                <td></td>
            </tr>

            <tr>
                <td><center>Pasien / Keluarga</center></td>
                <td><center>Dokter</center></td>

            </tr>

            <tr height="90">
                <td><center></center></td>
                <td><center></center></td>

            </tr>

            <tr>
                <td><center> (……………………………………………….)</center></td>
                <td><center> (……………………………………………….)</center></td>

            </tr>

            <tr>
                <td><center> </center></td>
                <td><center> </center></td>

            </tr>
            <td><center>Tanda tangan dan nama lengkap</center></td>
            <td><center>Tanda tangan dan nama lengkap</center></td>

        </table>




<!--akhir table terakhir-->
        
       

        
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