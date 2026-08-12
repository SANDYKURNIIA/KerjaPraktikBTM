<<<<<<< HEAD
<body onload="myFunction()">
    <center>RS. Bakti Timah</center>
    <center>KASIR</center>
    <center><?php date_default_timezone_set('Asia/Jakarta');
            setlocale(LC_TIME, 'IND');
            echo date(" d M Y ");  ?></center>
    <hr>
    <h3 align="center" width="95%"> KWITANSI </h3>
    </hr>
    <?php
    $total = $data['biaya_rs'] + $data['biaya_jasa'];
    $harga = round($total / 500) * 500;
    $adm = round($data['biaya_admin'] / 500) * 500;
    if ($ket == 'KONSULTASI & ADMINISTRASI') {
        $total_pelayanan = $harga + $adm;
    } else {
        if(!empty($kasir)){
            if(isset($id_pendapatan)){
                $db_pendapatan = $this->db->get_where('pendapatan_kasir',['id_pendapatan'=>$id_pendapatan])->row();
                $total_pelayanan = $db_pendapatan->selisih;
            }else{
                $total_pelayanan = $kasir->selisih;
            }
        }else{
            $total_pelayanan = 0;
        }
    }

    echo "<br>NAMA : " . $data['nama'];
    echo "<br>NO RM : " . $data['no_rm'];
    echo "<br>JENIS KLAIM : " . $data['cara_bayar'];
    echo "<br>CARA MASUK : " . $data['asal'];
    echo "<br>DPJP : " . $data['dokter'];
    echo "<br>" . $ket . " : Rp " . number_format($total_pelayanan, 0, ',', '.');

    // echo "<br>RUANGAN : " . $pasien['tipe'];
    ?>

    <!-- <table>


    <tbody>

      

    </tbody>
</table> -->
    <br>
    <center>TERIMA KASIH</center>
    <div class="panel-heading">
        <div class="pull-left">
            <h5> No NPWP : 71.785.977.1-304.000 </h5>
            <h4 class="panel-title txt-dark">PETUGAS KASIR</h4>
            <?php $staff = $this->session->userdata('data_auth');
            echo $staff->nama;
            ?>

        </div>
    </div>
</body>
<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    window.onafterprint = function(e) {
        closePrintView();
    };

    function myFunction() {
        window.print();
    }

    function closePrintView() {
        window.location.href = 'javascript:history.go(-1)';
    }
=======
<body onload="myFunction()">
    <center>RS. Bakti Timah</center>
    <center>KASIR</center>
    <center><?php date_default_timezone_set('Asia/Jakarta');
            setlocale(LC_TIME, 'IND');
            echo date(" d M Y ");  ?></center>
    <hr>
    <h3 align="center" width="95%"> KWITANSI </h3>
    </hr>
    <?php
    $total = $data['biaya_rs'] + $data['biaya_jasa'];
    $harga = round($total / 500) * 500;
    $adm = round($data['biaya_admin'] / 500) * 500;
    if ($ket == 'KONSULTASI & ADMINISTRASI') {
        $total_pelayanan = $harga + $adm;
    } else {
        if(!empty($kasir)){
            if(isset($id_pendapatan)){
                $db_pendapatan = $this->db->get_where('pendapatan_kasir',['id_pendapatan'=>$id_pendapatan])->row();
                $total_pelayanan = $db_pendapatan->selisih;
            }else{
                $total_pelayanan = $kasir->selisih;
            }
        }else{
            $total_pelayanan = 0;
        }
    }

    echo "<br>NAMA : " . $data['nama'];
    echo "<br>NO RM : " . $data['no_rm'];
    echo "<br>JENIS KLAIM : " . $data['cara_bayar'];
    echo "<br>CARA MASUK : " . $data['asal'];
    echo "<br>DPJP : " . $data['dokter'];
    echo "<br>" . $ket . " : Rp " . number_format($total_pelayanan, 0, ',', '.');

    // echo "<br>RUANGAN : " . $pasien['tipe'];
    ?>

    <!-- <table>


    <tbody>

      

    </tbody>
</table> -->
    <br>
    <center>TERIMA KASIH</center>
    <div class="panel-heading">
        <div class="pull-left">
            <h5> No NPWP : 71.785.977.1-304.000 </h5>
            <h4 class="panel-title txt-dark">PETUGAS KASIR</h4>
            <?php $staff = $this->session->userdata('data_auth');
            echo $staff->nama;
            ?>

        </div>
    </div>
</body>
<script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    window.onafterprint = function(e) {
        closePrintView();
    };

    function myFunction() {
        window.print();
    }

    function closePrintView() {
        window.location.href = 'javascript:history.go(-1)';
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>