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
                <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
                </td>
                <td>
                    <p><b>RS. Bakti Timah</b></p>
					<p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
					<p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
					<p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
                <td>
                	<h1>Lembar Rujukan</h1>
                </td>
            </tr>
        </table>
        <hr>
<!--Atas-->
        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td width="500">&nbsp;</td>
                <td>Kepada Yth.</td>
            </tr>

             <tr>
                <td width="500">&nbsp;</td>
                <td>TS.</td>
            </tr>

            <tr>
                <td width="500">&nbsp;</td>
                <td>Di-</td>
            </tr>

            <tr>
                <td width="500">&nbsp;</td>
                <td colspan="3"><?= $data['tempat'] ?></td>
            </tr>
      </table>
<!--Akhir Atas-->

<!--Tahap Dua-->
        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td>
                    Dengan Hormat,
                </td>
            </tr>

            <tr>
                <td>
                    Bersama ini kami kirimkan kepada teman sejawat, 
                </td>
            </tr>

        </table>

<!--Akhir Tahap Dua-->

<!--tahap tiga-->
        <table width=100% class="table1" cellspacing=0>

            <tr>
            <p>No. RM : <?= $data['no_rm'] ?></p>
            </tr>

            <tr>
            <p>Nama : <?= $data['nama'] ?></p>
            </tr>

            <tr>
            <p>Tgl Lahir : <?= $data['tgl_lahir'] ?></p>
            </tr>

            <tr>
            <p>Jenis Kelamin :<?= $data['jenis_kelamin'] ?></p>
            </tr>

            <tr>
            <p>Alamat : <?= $data['alamat'] ?></p>
            </tr>

            <tr>
                <!-- <td width="200">Riwayat Penyakit</td> -->
                <td colspan="3"> Riwayat Penyakit : <?= $data['riwayat_penyakit'] ?></td>
            </tr>

            <tr>
                <td width="200">Diagnosa : <?= $data['diagnosis'] ?></td>
            </tr>

            <tr>
                <td width="200">Terapi yang telah diberikan : <?= $data['terapi'] ?></td>
                </tr>

             <tr>
                <td width="200">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

        </table>


<!--akhir tahap tiga-->

<!--tahap empat-->
        <table width=100% class="table1" cellspacing=0>

            <tr>
                <td>
                    Mohon konsul dan penanganan selanjutnya, terima kasih atas bantuan dan kerja samanya.
                </td>
            </tr>

            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>

        </table>
<!--akhir tahap empat-->

<!--tahap lima-->
        
        <!-- <table width=100% class="table1" cellspacing=0>

            <tr>
                <td width="500">&nbsp;</td>
                <td>Karimun,...................................................</td>
            </tr>

             <tr>
                <td width="500">&nbsp;</td>
                <td>&nbsp; &nbsp; <b>Salam Sejawat</b></td>
            </tr>

            <tr>
                <td width="500">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td width="500">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td width="500">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td width="500">&nbsp;</td>
                <td>(.................................................................)</td>
            </tr>
      </table> -->

      <hr>

<!--akhir tahap lima-->

<!--tahap enam-->
    <table width=100% class="table1" cellspacing=0>

            <tr>
                <td>
                    <b><u>Lembar Jawaban Konsul</u></b>
                </td>
            </tr>

            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>

        </table>

<!--akhir tahap enam-->

<!-- tahap tujuh-->
    <table width=100% class="table1" cellspacing=0>

            <tr>
                <td width="500">Nama Pasien : <?= $data['nama'] ?></td>
                <td>Kepada Yth.</td>
            </tr>

             <tr>
                <td width="500">&nbsp;</td>
                <td>TS.</td>
            </tr>

            <tr>
                <td width="500">&nbsp;</td>
                <td>Di-</td>
            </tr>

            <tr>
            <td width="500">&nbsp;</td>
                <td colspan="3"><?= $data['tempat1'] ?></td>
            </tr>

            <tr>
                <td width="500">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

             <tr>
                <td width="500">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
      </table>

<!--akhir tahap tujuh-->

<!--tahap delapan -->

 <table width=100% class="table1" cellspacing=0>

            <tr height="60">
                <td>
                    Hasil Pemeriksaan &nbsp; &nbsp; &nbsp; : <?= $data['hasil_periksa'] ?>
                </td>
            </tr>

            <tr height="60">
                <td>
                    Teraphy &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; : <?= $data['terapi1'] ?>
                </td>
            </tr>

            <tr height="60">
                <td>
                    Saran &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?= $data['saran'] ?>
                </td>
            </tr>

            <tr height="90">
                <td>
                    &nbsp;
                </td>
            </tr>

            
        </table>

<!--akhir tahap delapan-->

<!--ini table akhir -->

         <table width=100% class="table1" cellspacing=0>

            <tr>
                <td width="500">Terima Kasih atas konsultasi ini.</td>
                <td></td>
            </tr>
    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
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
</html>