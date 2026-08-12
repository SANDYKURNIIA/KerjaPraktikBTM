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

.table2 {
    color: #232323;
    border-collapse: collapse;
    border: 0px solid ;

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

<!--table dua -->
        <table width=100% class="table1" cellspacing=0 >

            <tr>
                <td>Jam/Tanggal Masuk</td>
                <td>:......................</td>
                <td>&nbsp; &nbsp; &nbsp;Cara Bayar :.....................</td>
            </tr>

            <tr height="15">
                <td colspan="3" ></td>
            </tr>

            <tr>
                <td>Pasien Rujukan</td>
                <td><span>__</span>Tidak</td>
                <td><span>__</span>YA, Rujukan Dari :.....................</td>
            </tr>

        </table>

<!--end of table dua-->

<!--table tiga-->
        <table width=100% class="table1" cellspacing=0 >
            <tr align="center">
                <td>
                    <b>KEADAAN UMUM</b>
                </td>
                
            </tr>

        </table>
<!--end of table tiga-->

<!--table empat-->
        <table width=100% class="table1" cellspacing=0 >

            <tr>
                <td>Kesadaran :</td>
                <td colspan="2">GCS :</td>
                <td></td>
                <td colspan="3"></td>
            </tr>

            <tr height="15">
                <td colspan="7" ></td>
            </tr>

            <tr>
                <td>Kondisi Umum :</td>
                <td><span>__</span>Baik</td>
                <td><span>__</span>Tampak Sakit</td>
                <td><span>__</span>Sesak</td>
                <td><span>__</span>Pucat</td>
                <td><span>__</span>Lemah</td>
                <td><span>__</span>Lainnya:...........</td>
            </tr>

            <tr>
                <td>Tekanan Darah :</td>
                <td colspan="2">………………………mmHg</td>
                <td>Suhu :</td>
                <td colspan="3">………………………0C</td>
            </tr>

            <tr>
                <td>Frekuensi Nadi :</td>
                <td colspan="2">………………………x/menit</td>
                <td>Berat Badan :</td>
                <td colspan="3">………………………kg</td>
            </tr>

            <tr>
                <td>Frekuensi Nafas :</td>
                <td colspan="2">………………………x/menit</td>
                <td>Berat Badan :</td>
                <td colspan="3">………………………cm</td>
            </tr>

             <tr>
                <td>Kebutuhan Khusus :</td>
                <td><span>__</span>Tidak Ada</td>
                <td colspan="2" ><span>__</span>Alat Bantu Dengar</td>
                <td><span>__</span>Kacamata</td>
                <td><span>__</span>Tongkat</td>
                <td><span>__</span>Gigi Palsu</td>
            </tr>


<!--end of table empat-->

<!--table 5-->
        <table width=100% class="table1" cellspacing=0 >
            <tr>
                <td><b>Asesmen Triase : </b></td>
                <td><span>__</span>Merah</td>
                <td><span>__</span>Kuning</td>
                <td><span>__</span>Hijau</td>
                <td><span>__</span>Hitam</td>
            </tr>

        </table>



<!--end of table lima-->

<!--table enam-->
        <table width=100% class="table1" cellspacing=0 >
            <tr align="center">
                <td>
                    <b>ASESMEN AWAL KEPERAWATAN/KEBIDANAN</b>
                </td>
                
            </tr>

        </table>
<!--end of table enam-->

<!--table tujuh-->
        <table width=100% class="table1" cellspacing=0 >

            <tr>
               <td colspan="4"><b>Pengkajian Spritual</b></td>
               
           </tr>

            <tr>
               <td colspan="4">Kemampuan Beribadah</td>
               
           </tr>

           <tr>
               <td>Wajib Ibadah</td>
               <td><span>__</span>Baligh</td>
               <td><span>__</span>Belum Baligh</td>
               <td><span>__</span>Halaman Lain :......</td>
           </tr>

           <tr>
               <td>Thaharoh</td>
               <td><span>__</span>Berwudhu</td>
               <td><span>__</span>Tayamum</td>
               <td><span>__</span></td>
           </tr>

           <tr>
               <td>Sholat</td>
               <td><span>__</span>Berdiri</td>
               <td><span>__</span>Duduk</td>
               <td><span>__</span>Berbaring</td>
           </tr>

        </table>


<!--end of table tujuh-->

<!--table delapam-->
        <table width=100% class="table1" cellspacing=0 >
            <tr align="center">
                <td colspan="8"><b>Assesment Nyeri</b></td>
            </tr>

            <tr>
                <td colspan="2">Faktor Pemberat Rasa Nyeri</td>
                <td><span>__</span>Cahaya</td>
                <td><span>__</span>Gelap</td>
                <td><span>__</span>Gerakan</td>
                <td><span>__</span>Berbaring</td>
                <td><span>__</span>Lainnya:</td>
                <td></td>


            </tr>


            <tr>
                <td>Kualitas Nyeri :</td>
                <td><span>__</span>Tumpul</td>
                <td><span>__</span>Tajam</td>
                <td><span>__</span>Ditusuk</td>
                <td><span>__</span>Kram</td>
                <td><span>__</span>Terbakar</td>
                <td><span>__</span>Berdenyut</td>
                <td rowspan="6" ><img src="<?=base_url()?>resources/img/happy.png" style="width: 200px; height: 100px;"></td>

            </tr>

            <tr>
                <td colspan="2">Lokasi Nyeri :</td>
                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td >Skala Nyeri :</td>
                <td><span>__</span>Tidak nyeri</td>
                <td><span>__</span>Ringan</td>
                <td><span>__</span>Sedang</td>
                <td><span>__</span>Berat</td>
                <td colspan="2" ><span>__</span>Sangat Berat</td>
                
            </tr>

             <tr>
                <td>Durasi :</td>
                <td><span>__</span>Konsisten</td>
                <td><span>__</span>Intermiten</td>
                <td><span>__</span>Lainnya </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Efek Nyeri:</td>
                <td><span>__</span>Mual/muntah</td>
                <td colspan="2" ><span>__</span>Aktifitas terganggu</td>
                <td colspan="3"><span>__</span>Nafsu makan berkurang</td>

            </tr>

            <tr>
                <td></td>
                <td><span>__</span>Emosi</td>
                <td colspan="2" ><span>__</span>Gangguan tidur</td>
                <td colspan="2"><span>__</span>Lainnya :.......</td>
                <td></td>
            </tr>

        </table>



<!--end of table delapan-->

        <table width=100% class="table1" cellspacing=0 >
            <tr align="center">
                <td>
                    <b>SKRINING GIZI AWAL DEWASA  </b>(Malnutrition Screening Tools)
                </td>
                
            </tr>

        </table>

        <table width=100% class="table1" cellspacing=0 >
            <tr class=garisbawah >
                <td class=gariskanan>
                    1.  Apakah pasien mengalami penurunan berat badan yang tidak direncanakan/tidak <br>
                    &nbsp; &nbsp;diinginkan dalam 6 bulan terakhir?
                </td>
                <td class=gariskanan width="100">Skor</td>
                <td width="100">Skor Pasien</td>
            </tr>

             <tr class=garisbawah >
                <td class=gariskanan>
                   &nbsp; &nbsp; <span>__</span>Tidak 
                </td>
                <td class=gariskanan width="100">0</td>
                <td rowspan="8"  width="100"></td>
            </tr>

            <tr class=garisbawah >
                <td class=gariskanan>
                   &nbsp; &nbsp; <span>__</span>Tidak yakin (ada tanda: baju menjadi longgar) 
                </td>
                <td class=gariskanan width="100">2</td>
               
            </tr>

            <tr class=garisbawah >
                <td class=gariskanan>
                   &nbsp; &nbsp; <span>__</span>Ya, ada penurunan BB sebanyak :
                </td>
                <td class=gariskanan width="100"></td>
                
            </tr>

            <tr class=garisbawah >
                <td class=gariskanan>
                   &nbsp; &nbsp; &nbsp; &nbsp; <span>__</span>1 – 5 kg                                          
                </td>
                <td class=gariskanan width="100">1</td>
                
            </tr>

            <tr class=garisbawah >
                <td class=gariskanan>
                   &nbsp; &nbsp; &nbsp; &nbsp; <span>__</span>6 – 10 kg                                                                       
                </td>
                <td class=gariskanan width="100">2</td>
                
            </tr>

            <tr class=garisbawah >
                <td class=gariskanan>
                   &nbsp; &nbsp; &nbsp; &nbsp; <span>__</span>11 – 15 kg                                        
                </td>
                <td class=gariskanan width="100">3</td>
                
            </tr>

             <tr class=garisbawah >
                <td class=gariskanan>
                   &nbsp; &nbsp; &nbsp; &nbsp; <span>__</span>> 15 kg                   
                </td>
                <td class=gariskanan width="100">3</td>
                
            </tr>

            <tr class=garisbawah >
                <td class=gariskanan>
                   &nbsp; &nbsp; <span>__</span>Tidak tahu berapa kg penurunannya
                </td>
                <td class=gariskanan width="100">2</td>
                
            </tr>

             <tr class=garisbawah >
                <td class=gariskanan>
                    2.  Apakah asupan makan pasien berkurang karena penurunan nafsu makan/kesulitan <br>
                    &nbsp; &nbsp;menerima makanan?
                </td>
                <td class=gariskanan width="100">Skor</td>
                <td width="100">Skor Pasien</td>
            </tr>

            <tr class=garisbawah >
                <td class=gariskanan>
                   &nbsp; &nbsp; <span>__</span>Tidak 
                </td>
                <td class=gariskanan width="100">0</td>
                <td rowspan="2" width="100"></td>
            </tr>

            <tr class=garisbawah >
                <td class=gariskanan>
                   &nbsp; &nbsp; <span>__</span>Ya
                </td>
                <td class=gariskanan width="100">1</td>
               
            </tr>

            <tr class=garisbawah >
                <td height="30" colspan="2" class=gariskanan>
                   Bila skor≥2, pasien berisiko malnutrisi, konsul ke Ahli Gizi
                </td>
               
                <td width="100">Skor Pasien</td>
            </tr>


        </table>
        <table width=100% class="table1" cellspacing=0 >
            <tr align="center">
                <td>
                    <b>ASESMEN GIZI AWAL ANAK</b>
                </td>
                
            </tr>

        </table>

            <table width=100% class="table1" cellspacing=0 >
                <tr class=garisbawah>
                    <td class=gariskanan width="30" ><b>No</b></td>
                    <td class=gariskanan><b>PERTANYAAN</b></td>
                    <td width="120" ><b>SKOR</b></td>
                </tr>

                <tr class=garisbawah>
                    <td class=gariskanan width="30" >1</td>
                    <td class=gariskanan>
                       Apakah pasien tampak kurus:
                    </td>
                    <td width="120" >
                        ( &nbsp;    )  0 = tidak<br>
                        ( &nbsp;    )  1 = ya
                    </td>
                </tr>

                <tr class=garisbawah>
                    <td class=gariskanan width="30" >2</td>
                    <td class=gariskanan>
                        Apakah ada penurunan BB selama 1 bulan terakhir?<br>
                        *untuk bayi <1 tahun BB tidak naik  selama 3 bulan
                    </td>
                    <td width="120" >
                        ( &nbsp;    ) 0 = tidak<br>
                        ( &nbsp;    ) 1 = ya
                    </td>
                </tr>

                <tr class=garisbawah>
                    <td rowspan="3" class=gariskanan width="30" >3</td>
                    <td class=gariskanan>
                       Apakah terdapat salah satu dari kondisi di bawah ini
                    </td>
                    <td width="120" >
                        
                    </td>
                </tr>

                <tr class=garisbawah>
                    
                    <td class=gariskanan>
                        a. diare ≥ 5 kali/hari atau muntah >3 kali/hari dalam 1 minggu <br>
                        terakhir
                    </td>
                    <td rowspan="2" width="120" >
                        ( &nbsp;    )  0 = tidak <br>
                        ( &nbsp;    )  1 = ya
                        &nbsp;
                    </td>
                </tr>

                <tr class=garisbawah>
                    
                    <td class=gariskanan>
                        b. asupan makan berkurang selama 1 mingu terakhir
                    </td>
                    
                </tr>

                <tr class=garisbawah>
                    <td class=gariskanan width="30" >4</td>
                    <td class=gariskanan>
                        Apakah terdapat penyakit atau keadaan yang <br>
                        mengakibatkan pasien beresiko malnutrisi?
                    </td>
                    <td width="120" >
                        ( &nbsp;    ) 0 = tidak<br>
                        ( &nbsp;    ) 2 = ya
                    </td>
                </tr>

                 <tr class=garisbawah>
                    <td colspan="3" class=gariskanan width="30" >Total Skor : </td>
                    
                </tr>

                <tr class=garisbawah>
                    <td colspan="3" class=gariskanan width="30" >Bila skor MST lebih dari > 2 dilakukan pengkajian lanjut oleh ahli gizi.</td>
                    
                </tr>

                <tr class=garisbawah align="center">
                    <td colspan="3" class=gariskanan width="30" ><b>Pengkajian Risiko Jatuh</b></td>
                    
                </tr>

            </table>
<!--table baru-->
            <table width=100% class="table1" cellspacing=0 >
                <tr class=garisbawah>
                    <td width="20" ></td>
                    <td align="center" class=gariskanan>Komponen Penilaian</td>
                    <td class=gariskanan width="90">Ya</td>
                    <td class=gariskanan width="90">Tidak</td>
                </tr>

                <tr class=garisbawah>
                    <td width="20" >a.</td>
                    <td  class=gariskanan>
                        Perhatikan cara berjalan saat ini akan duduk di kursi , Apakah pasien tampak tidak seimbang <br>
                        sempoyongan/ limbung)
                    </td>
                    <td class=gariskanan width="90"></td>
                    <td class=gariskanan width="90"></td>
                </tr>

                <tr class=garisbawah>
                    <td width="20" >b.</td>
                    <td  class=gariskanan>
                        Apakah pasien memegang pinggiran kursi atau meja atau benda lain sebagai penopang saat akan  <br>
                        duduk ?
                    </td>
                    <td class=gariskanan width="90"></td>
                    <td class=gariskanan width="90"></td>
                </tr>

                

            </table>


<!--end table baru-->

            <table width=100% class="table1" cellspacing=0 >
                <tr>
                    <td><span>__</span>Tidak Berisiko (tidak ditemukan a dan b)    Bila risiko rendah :  pasien diberi edukasi bronsur pencegahan risiko jatuh<br>
                    <span>__</span>Risiko Tinggi    (a dan b ditemukan)              Bila risiko tinggi  : pasien diberikan gelang warna kuning pada pergelangan<br>
                    <span>__</span>Risiko Rendah  (ditemukan a atau b)                                                tangan pasien dan diberi bronsur pencegaan risiko jatuh

                    </td>

                    <td></td>
                    
                </tr>


            </table>

            <table width=100% class="table1" cellspacing=0 >
                <tr>
                    <td width="300"></td>
                    <td>Diberitahukan ke DPJP :<span>__</span>Ya, Jam :</td>
                    <td><span>__</span>Tidak</td>
                </tr>

            </table>

            <table width=100% class="table1" cellspacing=0 >
                <tr>
                    <td width="250">Frekuensi BAB :</td>
                    <td>……. x / hari </td>
                    <td><span>__</span>Tidak dapat dikaji</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td width="250">Keluhan BAB :</td>
                    <td><span>__</span>Tidak Ada</td>
                    <td><span>__</span>Pendarahan</td>
                    <td><span>__</span>Hemmoroid</td>
                    <td><span>__</span>Konstipasi</td>
                    <td><span>__</span>Diare</td>
                </tr>

                <tr>
                    <td width="250">Karakteristik Faces :</td>
                    <td><span>__</span>Padat</td>
                    <td><span>__</span>Lunak</td>
                    <td><span>__</span>Cair</td>
                    <td>Warna :</td>
                    <td></td>
                </tr>

                <tr>
                    <td width="250">Frekuensi Baak :</td>
                    <td>……… x/ hari</td>
                    <td>warna : ………</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr class=garisbawah>
                    <td width="250">Keluhan Baak :</td>
                    <td><span>__</span>tidak ada nyeri</td>
                    <td><span>__</span>pendarahan</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr class=garisbawah height="50">
                    <td colspan="6">Masalah Keperawatan / Kebidanan  :</td>
                </tr>

                <tr class=garisbawah height="50">
                    <td colspan="6">Rencana Asuhan :</td>
                </tr>


            </table>

            <table width=100% class="table2" cellspacing=0 >
                <tr>
                    <td></td>
                    <td width="300" >Tanggal / Jam : </td>
                </tr>

                 <tr>
                    <td></td>
                    <td width="300" >Perawat/Bidan yang melakukan Pengkajian</td>
                </tr>
                <tr height=50>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td width="300" >(...........................................)</td>
                </tr>



            </table>


























        
       

        
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