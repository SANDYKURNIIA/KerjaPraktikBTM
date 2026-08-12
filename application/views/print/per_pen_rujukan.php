<<<<<<< HEAD
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
        <table class="a" style="width: 100%">
            <tr>
                <td>
                    <img src="<?=base_url()?>resources/img/rsbt_logo.jpg" style="width: 200px;">
                </td>
               

                 
                <td>

                    <p><b>RS. Bakti Timah</b></p>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
            </tr>

            
        </table>

        <center><h3>PERSETUJUAN/PENOLAKAN* RUJUKAN</h3></center>
       
<!--Atas-->
        <table width=100% class="table1" cellspacing=0>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>Pemberi informasi</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>Penerima Informasi / pemberi persetujuan **</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

      </table>
<!--Akhir Atas-->

<!--table baru 1-->

        <table width=100% class="table1" cellspacing=0>

            <tr height="40" class=garisbawah align="center">
                <td class=gariskanan><b>No</b></td>
                <td class=gariskanan><b>Jenis Informasi</b></td>
                <td width="290" class=gariskanan><b>Isi Informasi</b></td>
                <td width="150" class=gariskanan><b>Tandai (√)</b></td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>1</td>
                <td class=gariskanan>Diagnosis dan terapi dan/atau tindakan medis yang diperlukan</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>2</td>
                <td class=gariskanan>Alasan dan tujuan dilakukan rujukan</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>3</td>
                <td class=gariskanan>Risiko yang dapat timbul apabila rujukan tidak dilakukan</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>4</td>
                <td class=gariskanan>Transportasi rujukan</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>5</td>
                <td class=gariskanan>Risiko atau penyulit yang dapat timbul selama dalam perjalanan</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

      </table>

<!--akhir table baru 1-->

<!--table ketiga -->
        <table width=100% class="table1" cellspacing=0>

            <tr height="60" class=garisbawah >
                <td class=gariskanan>
                    Dengan ini menyatakan bahwa saya telah menerangkan hal-hal di atas secara benar dan jelas <br>
                    dan memberikan kesempatan untuk bertanya dan/atau berdiskusi
                </td>
                <td width="150" class=gariskanan align="center">&nbsp;<br>
                    &nbsp;<br>
                Tandatangan</td>
            </tr>

             <tr height="60" class=garisbawah >
                <td class=gariskanan>
                    Dengan ini menyatakan bahwa saya telah menerima informasi sebagaimana di atas yang saya <br>
                    beri tanda/paraf di kolom kanannya, dan telah memahaminya
                </td>
                <td width="150" class=gariskanan align="center">&nbsp;<br>
                    &nbsp;<br>
                Tandatangan</td>
            </tr>


        </table>



<!--akhir table tiga-->

<!--table satu kecil-->
        <table width=100% class="table1" cellspacing=0>

            <tr height="40" class=garisbawah>
                <td >
                    *Bila pasien tidak kompeten atau tidak mau menerima informasi, maka penerima informasi adalah wali keluarga terdekat.
                </td>
            </tr>

            <tr height="40" class=garisbawah align="center">
                <td >
                    <b>PERSETUJUAN/PENOLAKAN RUJUKAN*</b>
                </td>
            </tr>

            <tr height="60"  >
                <td  >
                    Yang bertandatangan di bawah ini, saya nama ________________________, tanggal lahir ___________________<br>
                    laki-laki/perempuan*, alamat___________________________________________________________________,<br>
                    dengan ini menyatakan persetujuan/penolakan untuk dilakukannya rujukan terhadap saya/_________________saya*<br>
                    bernama ______________________________________________, umur __________ tahun, laki-laki / perempuan*,<br>
                    tanggal lahir _______________, laki- laki/perempuan*, alamat __________________________________________<br>
                    alamat________________________________________________________________________________________<br>
                    Saya memahami perlunya dan manfaat rujukan tersebut sebagaimana telah dijelaskan seperti di atas kepada saya,<br>
                    termasuk risiko dan komplikasi yang mungkin timbul.<br>
                </td>
            </tr>

            <tr>
                <td height="30">
                    __________________, tanggal _________________ pukul ________
                </td>
            </tr>

            <tr>
                <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Yang menyatakan* &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Saksi 1 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Saksi 2</td>
            </tr>

            <tr height="60">
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(.............................)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; (.............................)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(.............................)</td>
            </tr>




        </table>


<!--akhir table satu kecil-->

















 <!--batas-->
        
       



    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
    </script>
</body>
=======
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
        <table class="a" style="width: 100%">
            <tr>
                <td>
                    <img src="<?=base_url()?>resources/img/rsbt_logo.jpg" style="width: 200px;">
                </td>
               

                 
                <td>

                    <p><b>RS. Bakti Timah</b></p>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
            </tr>

            
        </table>

        <center><h3>PERSETUJUAN/PENOLAKAN* RUJUKAN</h3></center>
       
<!--Atas-->
        <table width=100% class="table1" cellspacing=0>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>Pemberi informasi</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>Penerima Informasi / pemberi persetujuan **</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

      </table>
<!--Akhir Atas-->

<!--table baru 1-->

        <table width=100% class="table1" cellspacing=0>

            <tr height="40" class=garisbawah align="center">
                <td class=gariskanan><b>No</b></td>
                <td class=gariskanan><b>Jenis Informasi</b></td>
                <td width="290" class=gariskanan><b>Isi Informasi</b></td>
                <td width="150" class=gariskanan><b>Tandai (√)</b></td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>1</td>
                <td class=gariskanan>Diagnosis dan terapi dan/atau tindakan medis yang diperlukan</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>2</td>
                <td class=gariskanan>Alasan dan tujuan dilakukan rujukan</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>3</td>
                <td class=gariskanan>Risiko yang dapat timbul apabila rujukan tidak dilakukan</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>4</td>
                <td class=gariskanan>Transportasi rujukan</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>5</td>
                <td class=gariskanan>Risiko atau penyulit yang dapat timbul selama dalam perjalanan</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

      </table>

<!--akhir table baru 1-->

<!--table ketiga -->
        <table width=100% class="table1" cellspacing=0>

            <tr height="60" class=garisbawah >
                <td class=gariskanan>
                    Dengan ini menyatakan bahwa saya telah menerangkan hal-hal di atas secara benar dan jelas <br>
                    dan memberikan kesempatan untuk bertanya dan/atau berdiskusi
                </td>
                <td width="150" class=gariskanan align="center">&nbsp;<br>
                    &nbsp;<br>
                Tandatangan</td>
            </tr>

             <tr height="60" class=garisbawah >
                <td class=gariskanan>
                    Dengan ini menyatakan bahwa saya telah menerima informasi sebagaimana di atas yang saya <br>
                    beri tanda/paraf di kolom kanannya, dan telah memahaminya
                </td>
                <td width="150" class=gariskanan align="center">&nbsp;<br>
                    &nbsp;<br>
                Tandatangan</td>
            </tr>


        </table>



<!--akhir table tiga-->

<!--table satu kecil-->
        <table width=100% class="table1" cellspacing=0>

            <tr height="40" class=garisbawah>
                <td >
                    *Bila pasien tidak kompeten atau tidak mau menerima informasi, maka penerima informasi adalah wali keluarga terdekat.
                </td>
            </tr>

            <tr height="40" class=garisbawah align="center">
                <td >
                    <b>PERSETUJUAN/PENOLAKAN RUJUKAN*</b>
                </td>
            </tr>

            <tr height="60"  >
                <td  >
                    Yang bertandatangan di bawah ini, saya nama ________________________, tanggal lahir ___________________<br>
                    laki-laki/perempuan*, alamat___________________________________________________________________,<br>
                    dengan ini menyatakan persetujuan/penolakan untuk dilakukannya rujukan terhadap saya/_________________saya*<br>
                    bernama ______________________________________________, umur __________ tahun, laki-laki / perempuan*,<br>
                    tanggal lahir _______________, laki- laki/perempuan*, alamat __________________________________________<br>
                    alamat________________________________________________________________________________________<br>
                    Saya memahami perlunya dan manfaat rujukan tersebut sebagaimana telah dijelaskan seperti di atas kepada saya,<br>
                    termasuk risiko dan komplikasi yang mungkin timbul.<br>
                </td>
            </tr>

            <tr>
                <td height="30">
                    __________________, tanggal _________________ pukul ________
                </td>
            </tr>

            <tr>
                <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Yang menyatakan* &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Saksi 1 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Saksi 2</td>
            </tr>

            <tr height="60">
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(.............................)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; (.............................)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(.............................)</td>
            </tr>




        </table>


<!--akhir table satu kecil-->

















 <!--batas-->
        
       



    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
    </script>
</body>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>