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
                    <img src="<?=base_url()?>resources/img/rsbt_logo.jpg" style="width: 230px;">
                </td>
               

                <td width="250">
                    <p><b>&nbsp;</b></p>
                </td>
                <td align="left">
                	<p>NRM :</p>
                    <p>Nama :</p>
                    <p>Jenis Kelamin :</p>
                    <p>Tanggal Lahir :</p>
                    <p>&nbsp; (Mohon diisi atau tempelkan stiker jika ada)</p>
                </td>
            </tr>
        </table>

        Jl.Canggai Putri, Teluk Uma – Prov. Kepri<br>
        Telp. (0777)7367085, Fax. (0777)7367176<br>

        <center><b>FORMULIR PERSETUJUAN TINDAKAN KEDOKTERAN</b></center>
        <hr>
<!--Atas-->
        <table width=100% class="table1" cellspacing=0>

            <tr height="40" class=garisbawah>
                <td class=gariskanan>Dokter Pelaksana Tindakan</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>Pemberi Informasi</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan> Penerima Informasi / Pemberi Persetujuan* </td>
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
                <td class=gariskanan>Diagnosis (WD & DD)</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>2</td>
                <td class=gariskanan>Dasar Diagnosis</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>3</td>
                <td class=gariskanan>Tindakan Kedokteran</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>4</td>
                <td class=gariskanan>Indikasi Tindakan</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>5</td>
                <td class=gariskanan>
                    Tata Cara : <br>
                    &nbsp; &nbsp; &nbsp;<i>Tipe sedasi/anesthesia<i><br>
                    &nbsp; &nbsp; &nbsp;uraian singkat prosedur dan <br>
                    &nbsp; &nbsp; &nbsp;tahapan yang penting.
                </td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>6</td>
                <td class=gariskanan>Tujuan</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>7</td>
                <td class=gariskanan>Risiko & Komplikasi</td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>8</td>
                <td class=gariskanan>
                    Prognosis<br>
                    &nbsp; &nbsp; &nbsp;<i>Prognosis vital, prognosis fungsi dan<br>
                    &nbsp; &nbsp; &nbsp;prognosis kesembuhan</i>
                </td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>9</td>
                <td class=gariskanan>
                    Alternatif & Risiko<br>
                    Pilihan pengobatan/penatalaksanaan
                </td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>

            <tr height="40" class=garisbawah >
                <td class=gariskanan>10</td>
                <td class=gariskanan>
                    Hal lain yang akan dilakukan untuk <br>
                    menyelamatkan pasien<br>
                   &nbsp; &nbsp; &nbsp; <i>Perluasan tindakan <br>
                   &nbsp; &nbsp; &nbsp;  Konsultasi selama tindakan<br>
                   &nbsp; &nbsp; &nbsp;  Resusitasi</i>
                </td>
                <td width="290" class=gariskanan>&nbsp;</td>
                <td width="150" class=gariskanan>&nbsp;</td>
            </tr>



      </table>

<!--akhir table baru 1-->

<!--table ketiga -->
        <table width=100% class="table1" cellspacing=0>

            <tr height="60" class=garisbawah >
                <td class=gariskanan>
                    Dengan ini menyatakan bahwa saya telah menerangkan hal-hal diatas secara benar dan jelas<br>
                    dan memberikan kesempatan untuk bertanya dan/ atau berdiskusi
                </td>
                <td width="150" class=gariskanan align="center">&nbsp;<br>
                    &nbsp;<br>
                Tandatangan</td>
            </tr>

             <tr height="60" class=garisbawah >
                <td class=gariskanan>
                    Dengan ini menyatakan bahwa saya telah menerangkan hal-hal diatas secara benar dan jelas<br>
                    dan memberikan kesempatan untuk bertanya dan/ atau berdiskusi
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
                    <b>PERSETUJUAN TINDAKAN KEDOKTERAN</b>
                </td>
            </tr>

            <tr height="60"  >
                <td  >
                    Yang bertandatangan di bawah ini, saya nama ___________________________, tanggal lahir ___________________<br>
                    laki-laki/perempuan*, alamat________________________________________________________________________,<br>
                    dengan ini menyatakan persetujuan untuk dilakukannya tindakan _______________________________________ pada <br>
                    tanggal ________________terhadap saya/ ___________________ saya* bernama ______________________________, <br>
                    tanggal lahir _______________, laki- laki/perempuan*, alamat _____________________________________________<br>
                    Saya memahami perlunya dan manfaat tindakan tersebut sebagaimana telah dijelaskan seperti di atas kepada <br>
                    saya, termasuk risiko dan komplikasi yang mungkin timbul. <br>
                    Saya juga menyadari bahwa dokter melakukan suatu upaya dan oleh karena ilmu kedokteran bukanlah ilmu pasti, <br>
                    maka keberhasilan tindakan kedokteran bukanlah keniscayaan, melainkan sangat bergantung kepada izin Tuhan <br>
                    Yang Maha Esa.<br>

                </td>
            </tr>

            <tr>
                <td height="30">
                    __________________, tanggal _________________ pukul ________
                </td>
            </tr>

            <tr>
                <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Yang menyatakan* &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Saksi 1 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Saksi 2</td>
            </tr>

            <tr height="60">
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(.............................)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (.............................)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(.............................)</td>
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
</html>