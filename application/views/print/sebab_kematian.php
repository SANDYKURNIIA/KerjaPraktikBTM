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

                   
                </td>
            </tr>

            
        </table>

        <center><h3>LEMBARAN SEBAB KEMATIAN</h3></center>
        <p align="left"><h3>NO RM<span>__</span><span>__</span>&nbsp; &nbsp;<span>__</span><span>__</span>&nbsp; &nbsp;<span>__</span><span>__</span></h3></p>

<!--table 1-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>Nama :</td>
                <td>Umur :</td>
                <td>Tahun</td>
                <td>Jenis Kelamin : LK/PR</td>
            </tr>

            <tr>
                <td>Alamat :</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </table>

<!--end table 1-->

<!--table 2-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td class=gariskanan >&nbsp;</td>
                <td class=gariskanan>&nbsp;</td>
                <td class=gariskanan>&nbsp; </td>
            </tr>
            <tr>
                <td class=gariskanan >a.</td>
                <td class=gariskanan>a. …………………………………….</td>
                <td class=gariskanan> Lamanya (kira-kira) mulai sakit</td>
            </tr>
            <tr>
                <td class=gariskanan > Penyakit atau keadaan yang langsung</td>
                <td class=gariskanan> Penyakit tersebut dalam ruang a di-</td>
                <td class=gariskanan>hingga meninggal dunia</td>
            </tr>

            <tr>
                <td class=gariskanan >b.c</td>
                <td class=gariskanan> b. …………………………………….</td>
                <td class=gariskanan>..………………………………</td>
            </tr>

            <tr>
                <td class=gariskanan >Penyakit-penyakit (bila ada) yang</td>
                <td class=gariskanan>  Penyakit tersebut dalam ruang b di-</td>
                <td class=gariskanan></td>
            </tr>

            <tr>
                <td class=gariskanan >menjadi lantaran timbulnya sebab</td>
                <td class=gariskanan>  disebabkan oleh (atau akibat dari) :</td>
                <td class=gariskanan> ..………………………………</td>
            </tr>

            <tr>
                <td class=gariskanan >kematian tersebut pada a. dengan</td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

            <tr>
                <td class=gariskanan >menyebutkan yang menjadi pokok</td>
                <td class=gariskanan>c. ………………………………….</td>
                <td class=gariskanan>...………………………………</td>
            </tr>

            <tr class=garisbawah>
                <td class=gariskanan >pangkal terakhir.</td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

            <tr>
                <td class=gariskanan align="center" >II</td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

            <tr>
                <td class=gariskanan  >Penyakit-penyakit lain yang berarti</td>
                <td class=gariskanan>……………………</td>
                <td class=gariskanan>……………………</td>
            </tr>

            <tr>
                <td class=gariskanan  >dan mempengaruhi pula kematian itu</td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

            <tr>
                <td class=gariskanan  >tetapi tidak ada hubungannya dengan</td>
                <td class=gariskanan>……………………</td>
                <td class=gariskanan>……………………</td>
            </tr>

            <tr>
                <td class=gariskanan  >penyakit-penyakit tersebut dalam</td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>

            <tr>
                <td class=gariskanan  >I.a.b.c.</td>
                <td class=gariskanan></td>
                <td class=gariskanan></td>
            </tr>



        </table>



<!--end table 2-->

<!--table 3-->

        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>Keterangan khusus untuk :</td>
                <td></td>
            </tr>
            <tr>
                <td>I.   MATI KARENA RUPADAKSA (Violent Death) </td>
                <td></td>
            </tr>

            <tr>
                <td>a. Macam rudapaksa</td>
                <td>a. Bunuh Diri - Pembunuhan - Kecelakaan</td>
            </tr>

            <tr>
                <td>b. Cara kejadian rudapaksa</td>
                <td>………….………</td>
            </tr>

            <tr>
                <td>c. Sifat jejas (kerusakan tubuh)</td>
                <td>c. .…………</td>
            </tr>

            <tr>
                <td> II.  KELAHIRAN MATI (Stillbirth)</td>
                <td></td>
            </tr>

            <tr>
                <td colspan="2"> a. Apakah ini janin lahir mati ……………………………………………………….…………..…..…...……... Ya/Tidak</td>
                
            </tr>

            <tr>
                <td colspan="2">  b. Sebab kelahiran mati ………………………………………………………...…….………………...…………</td>
                
            </tr>

            <tr>
                <td colspan="2"> III. PERSALINAN, KEHAMILAN :</td>
                
            </tr>

            <tr>
                <td colspan="2">a. Apakah ini peristiwa persalinan…………………………………………………….…………..…..…...……... Ya/Tidak</td>
                
            </tr>

            <tr>
                <td colspan="2"> b. Apakah ini peristiwa kehamilan …………………………………………………….…………..…..…...……... Ya/Tidak</td>
                
            </tr>

            <tr>
                <td colspan="2">IV. OPERASI</td>
                
            </tr>

            <tr>
                <td colspan="2"> a. Apakah di sini dilakukan operasi …………………………………………………….…………..…..…...……... Ya/Tidak</td>
                
            </tr>

            <tr>
                <td colspan="2">  b. Jenis Operasi ……………………………...………… …………………………………………………….…….……...</td>
                
            </tr>

            <tr height="60">
                <td colspan="2"></td>
                
            </tr>

            <tr>
                <td></td>
                <td>Pangkal Pinang, ………...…………....</td>
            </tr>

            <tr>
                <td></td>
                <td>Yang memberi keterangan sebab kematian</td>
            </tr>

            <tr height="60">
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td>Tanda Tangan   : …….……………………</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td></td>
                <td> Nama terang     : ………..…………………</td>
            </tr>



        </table>


<!--end table 3-->

<!--table 4-->
        <table width=100% class="table1" cellspacing=0>
            <tr>
                <td>catatan :</td>
            </tr>

            <tr height="100">
                <td></td>
            </tr>
        </table>


<!--end table 4-->

       
























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