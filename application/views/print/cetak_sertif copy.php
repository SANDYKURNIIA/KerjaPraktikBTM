<<<<<<< HEAD
<style>
.huruf{
    font-size : 35px;
}
.huruf2{
    font-size : 30px;
}
.huruf3{
    font-family :"Arial";
    font-size : 16px;
    font-style : Bold;
}
.huruf4{
    font-family :"Arial";
    font-size : 16px;
}
.huruf5{
    font-family :"Times New Roman";
    font-size : 16px;
}
.huruf6{
    font-size : 14px;
    margin-left: 80;
}
.huruf7{
    font-size : 14px;
    margin-left: 490;
    margin-top:-26;
}
.header {
  font-size:14px; 
}
</style>
<body onload="myFunction()">
            <a><img src="../../assets/dist/img/bumn.jpg" alt="logo" width="20%"/></a>
            <!-- <img src="../../assets/dist/img/bumn.jpg" alt="logoa"  width="21%"/> -->
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <img src="../../assets/dist/img/rsbt-logo.jpg" alt="logoa"  width="17%"/>
    <br/>
    <br/>
    <img src="../../assets/dist/img/memberihc.png" alt="logoa"  width="20%"/>
    <hr style="height: 1px">
    <table>
        <tr>
            <td><h3 class="huruf3">Full Name  : </h3></td>
            <td><h3 class="huruf3"><?php echo $data_mcu['nama_pasien'];?></h3></td>
        </tr>
    </table>
    <br/>
    <table>
        <tr>
            <td><h3 class="huruf3">Date Of Birth    : </h3></td>
            <td><h3 class="huruf3"><?php echo $data_mcu['tgl_lahir'];?></h3></td>
        </tr>
    </table>
    <br/>
    <table>
        <tr>
            <td><h3 class="huruf3">Company : </h3></td>
            <td><h3 class="huruf3"><?php echo $data_mcu['perusahaan'];?></h3></td>
        </tr>
    </table>
    <br/>
    <table>
        <tr>
            <td><h3 class="huruf3">Occupation : </h3></td>
            <td><h3 class="huruf3"><?php echo $data_mcu['occupation'];?></h3></td>
        </tr>
    </table>
    <br/>
    <table>
        <tr>
            <td><h3 class="huruf3">This medical fitness certificate has been issued on the basic of the Applicant's health statement, examination, and evaluation</h3></td>
        </tr>
    </table>
    <table>
        <tr>
            <td><h3 class="huruf3">This health certificate is valid until : </h3></td>
            <td><h3 class="huruf3"><?php echo $data_mcu['present'];?></h3></td>
        </tr>
    </table>
    <table>
        <tr>
            <td><h3 class="huruf3">Conclusion : </h3></td>
            <td><h3 class="huruf3"><?php echo $data_mcu['summary'];?></h3></td>
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
<!-- <?php
function Terbilang($nilai) {
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        if($nilai==0){
            return "";
        }elseif ($nilai < 12&$nilai!=0) {
            return "" . $huruf[$nilai];
        } elseif ($nilai < 20) {
            return Terbilang($nilai - 10) . " Belas ";
        } elseif ($nilai < 100) {
            return Terbilang($nilai / 10) . " Puluh " . Terbilang($nilai % 10);
        } elseif ($nilai < 200) {
            return " Seratus " . Terbilang($nilai - 100);
        } elseif ($nilai < 1000) {
            return Terbilang($nilai / 100) . " Ratus " . Terbilang($nilai % 100);
        } elseif ($nilai < 2000) {
            return " Seribu " . Terbilang($nilai - 1000);
        } elseif ($nilai < 1000000) {
            return Terbilang($nilai / 1000) . " Ribu " . Terbilang($nilai % 1000);
        } elseif ($nilai < 1000000000) {
            return Terbilang($nilai / 1000000) . " Juta " . Terbilang($nilai % 1000000);
        }elseif ($nilai < 1000000000000) {
            return Terbilang($nilai / 1000000000) . " Milyar " . Terbilang($nilai % 1000000000);
        }elseif ($nilai < 100000000000000) {
            return Terbilang($nilai / 1000000000000) . " Trilyun " . Terbilang($nilai % 1000000000000);
        }elseif ($nilai <= 100000000000000) {
            return "Maaf Tidak Dapat di Proses Karena Jumlah nilai Terlalu Besar ";
        }
    }
=======
<style>
.huruf{
    font-size : 35px;
}
.huruf2{
    font-size : 30px;
}
.huruf3{
    font-family :"Arial";
    font-size : 16px;
    font-style : Bold;
}
.huruf4{
    font-family :"Arial";
    font-size : 16px;
}
.huruf5{
    font-family :"Times New Roman";
    font-size : 16px;
}
.huruf6{
    font-size : 14px;
    margin-left: 80;
}
.huruf7{
    font-size : 14px;
    margin-left: 490;
    margin-top:-26;
}
.header {
  font-size:14px; 
}
</style>
<body onload="myFunction()">
            <a><img src="../../assets/dist/img/bumn.jpg" alt="logo" width="20%"/></a>
            <!-- <img src="../../assets/dist/img/bumn.jpg" alt="logoa"  width="21%"/> -->
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <img src="../../assets/dist/img/rsbt-logo.jpg" alt="logoa"  width="17%"/>
    <br/>
    <br/>
    <img src="../../assets/dist/img/memberihc.png" alt="logoa"  width="20%"/>
    <hr style="height: 1px">
    <table>
        <tr>
            <td><h3 class="huruf3">Full Name  : </h3></td>
            <td><h3 class="huruf3"><?php echo $data_mcu['nama_pasien'];?></h3></td>
        </tr>
    </table>
    <br/>
    <table>
        <tr>
            <td><h3 class="huruf3">Date Of Birth    : </h3></td>
            <td><h3 class="huruf3"><?php echo $data_mcu['tgl_lahir'];?></h3></td>
        </tr>
    </table>
    <br/>
    <table>
        <tr>
            <td><h3 class="huruf3">Company : </h3></td>
            <td><h3 class="huruf3"><?php echo $data_mcu['perusahaan'];?></h3></td>
        </tr>
    </table>
    <br/>
    <table>
        <tr>
            <td><h3 class="huruf3">Occupation : </h3></td>
            <td><h3 class="huruf3"><?php echo $data_mcu['occupation'];?></h3></td>
        </tr>
    </table>
    <br/>
    <table>
        <tr>
            <td><h3 class="huruf3">This medical fitness certificate has been issued on the basic of the Applicant's health statement, examination, and evaluation</h3></td>
        </tr>
    </table>
    <table>
        <tr>
            <td><h3 class="huruf3">This health certificate is valid until : </h3></td>
            <td><h3 class="huruf3"><?php echo $data_mcu['present'];?></h3></td>
        </tr>
    </table>
    <table>
        <tr>
            <td><h3 class="huruf3">Conclusion : </h3></td>
            <td><h3 class="huruf3"><?php echo $data_mcu['summary'];?></h3></td>
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
<!-- <?php
function Terbilang($nilai) {
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        if($nilai==0){
            return "";
        }elseif ($nilai < 12&$nilai!=0) {
            return "" . $huruf[$nilai];
        } elseif ($nilai < 20) {
            return Terbilang($nilai - 10) . " Belas ";
        } elseif ($nilai < 100) {
            return Terbilang($nilai / 10) . " Puluh " . Terbilang($nilai % 10);
        } elseif ($nilai < 200) {
            return " Seratus " . Terbilang($nilai - 100);
        } elseif ($nilai < 1000) {
            return Terbilang($nilai / 100) . " Ratus " . Terbilang($nilai % 100);
        } elseif ($nilai < 2000) {
            return " Seribu " . Terbilang($nilai - 1000);
        } elseif ($nilai < 1000000) {
            return Terbilang($nilai / 1000) . " Ribu " . Terbilang($nilai % 1000);
        } elseif ($nilai < 1000000000) {
            return Terbilang($nilai / 1000000) . " Juta " . Terbilang($nilai % 1000000);
        }elseif ($nilai < 1000000000000) {
            return Terbilang($nilai / 1000000000) . " Milyar " . Terbilang($nilai % 1000000000);
        }elseif ($nilai < 100000000000000) {
            return Terbilang($nilai / 1000000000000) . " Trilyun " . Terbilang($nilai % 1000000000000);
        }elseif ($nilai <= 100000000000000) {
            return "Maaf Tidak Dapat di Proses Karena Jumlah nilai Terlalu Besar ";
        }
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
?> -->