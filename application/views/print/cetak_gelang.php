<!DOCTYPE html>
<html>
<head>
	<title>CETAK GELANG - RS. Bakti Timah </title>
</head>
<style>

@media print {
@page { margin: 0; }
body { margin: 0; }
}
</style>

<body onload="myFunction()">
<table>
 	<tr>
         
         <td width="40%"></td>
        
 		<td>
         <b>
         <?php echo $cetak_gelang['nama']; ?>
        
         <?php echo "(".$cetak_gelang['no_rm'].")"; ?>
        
    
    </b>
<br>
    <?php 
    //tanggal lahir
    //date_default_timezone_get('Asia/Jakarta');
    //setlocale(LC_TIME, 'IND');

    $time = $cetak_gelang['tgl_lahir'];
    // $date = strftime("%A, %d %B %Y", $time);
    
    echo date("d M Y",strtotime($time)); 
    ?>

</br>
   <?php  //umur
   
  $birthDt = new DateTime( $cetak_gelang['tgl_lahir']);
  //tanggal hari ini
  $today = new DateTime('today');
  //tahun
  $y = $today->diff($birthDt)->y;
  //bulan
  $m = $today->diff($birthDt)->m;
  //hari
  $d = $today->diff($birthDt)->d;
  echo  $y . " tahun " . $m . " bulan " . $d . " hari";
    ?>
    <br>
    <?php echo "DPJP : ".$cetak_gelang['dokter']; ?>
</br>
<?php echo $cetak_gelang['cara']; ?>
    </td>
 	</tr>
 </table>
</body>
<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
    window.onafterprint = function(e){
        closePrintView();
    };

    function myFunction(){
        window.print();
    }

    function closePrintView() {
        window.location.href = 'javascript:history.go(-1)';   
    }
    </script>

</html>

