<body onload="myFunction()">
    <div class="panel panel-default card-view">
        <div class="panel-heading">
            <table>
                <tr>
                    <td> <a><img src="<?= base_url('assets/dist/img/rsbt.jpg'); ?>" alt="logo" /></a></td>
                    <td> <a><img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" alt="logoa" /></a></td>
                    <td> SURAT ELIGIBILITAS PESERTA</td>
                </tr>
            </table>
        </div>
        <div class="panel-wrapper collapse in ">
            <div class="panel-body">
            <table>
                <tr>
                    <td>
                <?php
                foreach($row as $row){}
                echo "No SEP : " . $row['noSep'];
                echo "<br>TANGGAL SEP : " . $row['tglSep'];
                echo "<br>NO KARTU : " . $row['peserta']['noKartu'];
                echo "<br>NAMA : " . $row['peserta']['nama'];
                echo "<br>TANGGAL LAHIR : " . $row['peserta']['tglLahir'];
                echo "<br>JENIS KELAMIN : " . $row['peserta']['kelamin'];
                echo "<br>POLI TUJUAN : " . $row['poli'];
                echo "<br>DIAGNOSA AWAL : " . $row['diagnosa'];
                echo "<br>CATATAN : " . $row['catatan'];
                ?>
                    </td>
                    <td>
                    <?php
                echo "JENIS PESERTA : " . $row['peserta']['jnsPeserta'];
                echo "<br>JENIS RAWAT : " . $row['jnsPelayanan'];
                echo "<br>KELAS RAWAT : " . $row['kelasRawat'];
               
                ?>
                    </td>
                </tr>
            </table>
            Saya menyetujui BPJS Kesehatan menggunakan informasi medis apabila dibutuhkan
            <br>
            SEP bukan bukyti penjamin peserta
            <table width=100% class="table1" cellspacing=0>

        	<tr height="20">
        		<td></td>
        		<td></td>
        	</tr>


        	<tr>
        		<td>Pasien/Keluarga pasien</td>
        		<td>Petugas BPJS Kesehatan</td>
        	</tr>

        	<tr height="50">
        		<td></td>
        		<td></td>
        	</tr>

        	<tr>
        		<td>________________________</td>
        		<td>________________________</td>
        	</tr>


        </table>
            </div>
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
</script>