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
                	<h1>RESUME MEDIS</h1>
                </td>
            </tr>
        </table>
        <hr>
        <table width=100% class="table1" cellspacing=0 >
        <tr >
                <td width="220" class=gariskanan>Tanggal Masuk :</td>
                <td width="200" class=gariskanan>No RM : </td>
                <td width="200">Nama Pasien : </td>
                <td width="30"></td>
                <td></td>
        </tr>

        <tr >
                <td class=gariskanan>Tanggal Keluar :</td>
                <td class=gariskanan>Tanggal Lahir : </td>
                <td>Nama Pasien : </td>
                <td></td>
                <td></td>
        </tr>

        <tr >
                <td class=gariskanan><p></p></td>
                <td class=gariskanan><p></p></td>
                <td>Riwayat Alergi : &nbsp;<span>___</span> Tidak </td>
                <td></td>
                <td></td>
                
                
        </tr>

        <tr >
            <td height="7" class=gariskanan>
            </td>
            <td class=gariskanan><p></p></td>
        </tr>

         <tr class="garisbawah ">
                <td class=gariskanan><p></p></td>
                <td class=gariskanan><p></p></td>
                <td> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span>___</span>Ada </td>
                <td></td>
                <td></td>
                
                
        </tr>
 <!--batas-->
        
        <tr >
            <td colspan=5>
                1.Anamnesa :
            </td>
        </tr>

         <tr >
            <td height="20" colspan=5>
               <p> </p>
            </td>
        </tr>

         
        </tr>
        <tr>
            <td colspan=5>
            2. Riwayat Singkat Dan Pemeriksaan Fisik :
            </td>
        </tr>

        <tr >
            <td height="20" colspan=5>
               <p> </p>
            </td>
        </tr>

        <tr>
            <td colspan=5>
            3 .Pemeriksaan Penunjang/Diagnostik :
            </td>
        </tr>

        <tr >
        	<td colspan=5  >
        		 <span>____</span> Laboratorium 
        	</td> 
        </tr>

        <tr  >
        	<td colspan=5 >
        		 <span>____</span> Radiologi 
        	</td> 
        </tr>

        <tr >
        	<td colspan=5  >
        		 <span>____</span> Lain-lain :  
        	</td> 
        </tr>

        <tr>
            <td colspan=5>
            4 .Diagnosa Saat Masuk :
            </td>
        </tr>

        <tr >
            <td height="10" colspan=5>
               <p> </p>
            </td>
        </tr>

         <tr>
            <td colspan=5>
            5 .Diagnosa Utama :
            </td>
        </tr>

        <tr >
            <td height="10" colspan=5>
               <p> </p>
            </td>
        </tr>

        <tr>
            <td colspan=5>
            6 .Diagnosa Sekunder :
            </td>
        </tr>

        <tr >
            <td height="10" colspan=5>
               <p> </p>
            </td>
        </tr>

        <tr>
            <td colspan=5>
            7 .Prosedur Pembedahan/Tindakan :
            </td>
        </tr>

        <tr >
            <td height="10" colspan=5>
               <p> </p>
            </td>
        </tr>

        <tr>
            <td colspan=5>
            8 .Ringkasan Keluar :
            </td>
        </tr>

        

         <tr >
            <td height="10" colspan=5>
               <p> </p>
            </td>
        </tr>

        

        <tr >
                <td width="200" >&nbsp; &nbsp;Keadaan Waktu Pulang :</td>
                <td width="200"> <span>____</span> Sembuh<b> </b> </td>
                <td width="100"> <span>____</span> Sehat  </td>
                <td width="60"> <span>___</span>Sehat </td>
                <td></td>
        </tr>

        <tr >
            <td height="5" colspan=5>
               <p> </p>
            </td>
        </tr>

         <tr >
                <td width="200" ></td>
                <td width="200"> <span>____</span>Belum Sembuh<b> </b> </td>
                <td width="100"> <span>____</span> Meninggal  </td>
                <td width="60"></td>
                <td></td>
        </tr>

        <tr >
            <td height="10" colspan=5>
               <p> </p>
            </td>
        </tr>

         <tr >
                <td width="200" >&nbsp; &nbsp;Alasan Pulang :</td>
                <td width="200"> <span>____</span>Persetujuan Dokter<b> </b> </td>
                <td width="100"> <span>____</span>Permintaan Sendiri</td>
                <td width="60"> </td>
                <td></td>
        </tr>

        <tr >
                <td width="200" ></td>
                <td width="200"> <span>____</span>DiRujuk Ke<b> </b> </td>
                <td width="100"> </td>
                <td width="60"> </td>
                <td></td>
        </tr>

        <tr >
            <td height="20" colspan=5>
               <p> </p>
            </td>
        </tr>

        <tr >
                <td  width="200" >&nbsp; &nbsp;Hari / Tanggal Kontrol Ke RS : </td>
                <td width="200"></td>
                <td width="100">Poliklinik :</td>
                <td width="60"> </td>
                <td></td>
        </tr>

        <tr >
            <td height="20" colspan=5>
               <p> </p>
            </td>
        </tr>

        <tr >
                <td  width="200" >&nbsp; &nbsp;Edukasi Yang Telah Diberikan </td>
                <td width="200"></td>
                <td width="100"></td>
                <td width="60"> </td>
                <td></td>
        </tr>

        <tr >
            <td height="20" colspan=5>
               <p> </p>
            </td>
        </tr>

        <tr >
                <td  width="200" > </td>
                <td width="200">Selama Di Rumah Sakit</td>
                <td width="100">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Selama Di Rumah </td>
                <td width="60"> </td>
                <td></td>
        </tr>

        </td>
        </tr>

<!--table baru-->
        </table>
        <table width=100% class="table1" cellspacing=0>
        	<tr class="garisbawah" height="60">
        		<td class=gariskanan><center>Nama Obat</center></td>
        		<td class=gariskanan><center>Dosis</center></td>
        		<td class=gariskanan><center>Frekuensi</center></td>
        		<td width="90" class=gariskanan><center>Cara Pemberian</center></td>
        		<td class=gariskanan><center>Nama Obat</center></td>
        		<td class=gariskanan><center>Dosis</center></td>
        		<td class=gariskanan><center>Frekuensi</center></td>
        		<td width="90" class=gariskanan><center>Cara Pemberian</center></td>
        	</tr>

        	<tr class="garisbawah" >
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        	</tr>

        	<tr class="garisbawah" >
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        	</tr>

        	<tr class="garisbawah" >
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        	</tr>

        	<tr class="garisbawah" >
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        	</tr>

        	<tr class="garisbawah" >
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        	</tr>

        	<tr class="garisbawah" >
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        	</tr>

        	<tr class="garisbawah" >
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        	</tr>

        	<tr class="garisbawah" >
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        	</tr>

        	<tr class="garisbawah" >
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td class=gariskanan><center><p> &nbsp; </p></center></td>
        		<td width="90" class=gariskanan><center><p> &nbsp; </p></center></td>
        	</tr>
        </table>
<!--end of table baru-->

<!--tabel akhir-->
		<table width=100% class="table1" cellspacing=0>

			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>Karimun,................................jam: &nbsp; &nbsp; WIB</td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>Dokter Penanggung Jawab Pelayanan</td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>(&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;)</td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<td>Lembar Putih Penagihan</td>
				<td>Lembar Merah Muda Pasien</td>
				<td>Lembar Kuning - Arsip RM</td>
			</tr>

		</table>


<!--end of table akhir-->
    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
    </script>
</body>
</html>