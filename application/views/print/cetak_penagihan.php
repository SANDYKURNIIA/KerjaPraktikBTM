<<<<<<< HEAD
<div class="content">
    <table width=100% cellspacing=0>
        <tr>
            <td>
                <table class="a" style="width: 100%">
                    <tr>
                        <td style="width: 25%">
                            <img src="<?= base_url() ?>resources/img/rsbt_ihc.png" style="width: 150px;">
                        </td>
                        <td>
                            <p>
                                <font size=2.5><b>RUMAH SAKIT BAKTI TIMAH KARIMUN</b>
                            </p>
                            <p>Jalan Canggai Putri, Kelurahan Teluk Uma, Kecamatan Tebing</p>
                            <p>Kabupaten Karimun, Prov. Kepulauan Riau, Indonesia</p>
                            <p>Telpon +62 (777) 7367085, Fax. +62 (777) 7367176</p>
                            </font>
                        </td>
                        <td>
                            <h3>www.baktitimah.co.id</h3>
                        </td>
                    </tr>
                </table>
                <h3 style="margin-top:-10px" class="center">
                    <b><u>
                            <br>
                            <br>
                            SURAT IZIN CUTI
                    </b></u>
                </h3>

                <table style="margin-left:40px" cellspacing=0>
                    <tr height=10px>
                        <td width=200px colspan=2>
                            Diberikan izin untuk menjalan Cuti, kepada :
                        </td>
                    </tr>
                    <tr height=10px>
                        <td width=265px>
                            Nama
                        </td>
                        <td>: <?php echo $cetak['nama']; ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            Bidang
                        </td>
                        <td>: <?php echo $cetak['bidang']; ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            Unit
                        </td>
                        <td>: <?php echo $cetak['unit']; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            Tanggal Mulai Cuti
                        </td>
                        <td>: <?php echo $cetak['tgl_mulai']; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            Tanggal Akhir Cuti
                        </td>
                        <td>: <?php echo $cetak['tgl_akhir']; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            Keterangan Jadwal Off
                        </td>
                        <td>: <?php echo $cetak['jadwal_off']; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            Sisa Cuti
                        </td>
                        <td>: <?php echo $cetak['sisa_cuti']; ?> <i>(Setelah menjalankan cuti diatas)</i>

                        </td>
                    </tr>
                    <tr height=20px>
                        <td colspan=2>
                            <br>
                            <br>
                            Pastikan tugas dan kewajiban saudara sudah diselesaikan/ didelegasikan sebelum menjalankan cuti. Agar aktifitas kinerja dan pelayanan berjalan lancar selama saudara menjalankan cuti
                            <br>
                            <br>
                            Demikianlah Surat Izin Cuti ini dibuat agar dapat dipergunakan sebagaimana mestinya.
                            <br><br><br>
                        </td>
                    </tr>
                    <tr height=20px>
                        <td colspan=2>
                            <p align="center">Rumah Sakit Bakti Timah Karimun,</p>
                            <p align="center">Ttd<br></p>
                            <br>
                            <br>
                            <br>
                            <p align="center"><b><u>Sherly Marlysa, S.Psi</b></u></p>
                            <p align="center">Kabid. Pengembangan SDM</p>
                            <br><br><br><br><br>
                        </td>
                    </tr>
                    <tr height=20px>
                        <td colspan=2><i>
                                <font size=2>Note : Surat ini terbit secara otomatis setelah cuti disetujui oleh Atasan Lansung dan Kepala Bidang SDM.</font>
                            </i></td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table class="a" style="width: 100%">
        <tr>
            <td style="width: 50%">
                <img src="<?= base_url() ?>resources/img/kantor.jpg" style="width: 250px;">
            </td>
            <td style="width: 30%">
            </td>
            <td>
                <img src="<?= base_url() ?>resources/img/ihc.jpg" style="width: 250px;">
            </td>
        </tr>
    </table>
</div>
<style type="text/css">
    .table1 {
        color: #232323;
        border-collapse: collapse;
        border: 1px solid;

    }


    .garisbawah {
        border-bottom: 1px solid;
    }

    .gariskanan {
        border-right: 1px solid;
    }

    .box {
        border-bottom: 1px solid;
        width: 1px;
        height: 1px;

    }


    .block,

    li {
        border: 1px solid black;
        padding: .1em;
        width: 29px;
    }

    .block {
        display: block;
    }

    span,
    ul {
        border: 1px solid black;
        padding: .1em;
        width: 50px;

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
=======
<div class="content">
    <table width=100% cellspacing=0>
        <tr>
            <td>
                <table class="a" style="width: 100%">
                    <tr>
                        <td style="width: 25%">
                            <img src="<?= base_url() ?>resources/img/rsbt_ihc.png" style="width: 150px;">
                        </td>
                        <td>
                            <p>
                                <font size=2.5><b>RUMAH SAKIT BAKTI TIMAH KARIMUN</b>
                            </p>
                            <p>Jalan Canggai Putri, Kelurahan Teluk Uma, Kecamatan Tebing</p>
                            <p>Kabupaten Karimun, Prov. Kepulauan Riau, Indonesia</p>
                            <p>Telpon +62 (777) 7367085, Fax. +62 (777) 7367176</p>
                            </font>
                        </td>
                        <td>
                            <h3>www.baktitimah.co.id</h3>
                        </td>
                    </tr>
                </table>
                <h3 style="margin-top:-10px" class="center">
                    <b><u>
                            <br>
                            <br>
                            SURAT IZIN CUTI
                    </b></u>
                </h3>

                <table style="margin-left:40px" cellspacing=0>
                    <tr height=10px>
                        <td width=200px colspan=2>
                            Diberikan izin untuk menjalan Cuti, kepada :
                        </td>
                    </tr>
                    <tr height=10px>
                        <td width=265px>
                            Nama
                        </td>
                        <td>: <?php echo $cetak['nama']; ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            Bidang
                        </td>
                        <td>: <?php echo $cetak['bidang']; ?></td>
                    </tr>
                    <tr height=10px>
                        <td>
                            Unit
                        </td>
                        <td>: <?php echo $cetak['unit']; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            Tanggal Mulai Cuti
                        </td>
                        <td>: <?php echo $cetak['tgl_mulai']; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            Tanggal Akhir Cuti
                        </td>
                        <td>: <?php echo $cetak['tgl_akhir']; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            Keterangan Jadwal Off
                        </td>
                        <td>: <?php echo $cetak['jadwal_off']; ?></td>
                    </tr>
                    <tr height=20px>
                        <td>
                            Sisa Cuti
                        </td>
                        <td>: <?php echo $cetak['sisa_cuti']; ?> <i>(Setelah menjalankan cuti diatas)</i>

                        </td>
                    </tr>
                    <tr height=20px>
                        <td colspan=2>
                            <br>
                            <br>
                            Pastikan tugas dan kewajiban saudara sudah diselesaikan/ didelegasikan sebelum menjalankan cuti. Agar aktifitas kinerja dan pelayanan berjalan lancar selama saudara menjalankan cuti
                            <br>
                            <br>
                            Demikianlah Surat Izin Cuti ini dibuat agar dapat dipergunakan sebagaimana mestinya.
                            <br><br><br>
                        </td>
                    </tr>
                    <tr height=20px>
                        <td colspan=2>
                            <p align="center">Rumah Sakit Bakti Timah Karimun,</p>
                            <p align="center">Ttd<br></p>
                            <br>
                            <br>
                            <br>
                            <p align="center"><b><u>Sherly Marlysa, S.Psi</b></u></p>
                            <p align="center">Kabid. Pengembangan SDM</p>
                            <br><br><br><br><br>
                        </td>
                    </tr>
                    <tr height=20px>
                        <td colspan=2><i>
                                <font size=2>Note : Surat ini terbit secara otomatis setelah cuti disetujui oleh Atasan Lansung dan Kepala Bidang SDM.</font>
                            </i></td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table class="a" style="width: 100%">
        <tr>
            <td style="width: 50%">
                <img src="<?= base_url() ?>resources/img/kantor.jpg" style="width: 250px;">
            </td>
            <td style="width: 30%">
            </td>
            <td>
                <img src="<?= base_url() ?>resources/img/ihc.jpg" style="width: 250px;">
            </td>
        </tr>
    </table>
</div>
<style type="text/css">
    .table1 {
        color: #232323;
        border-collapse: collapse;
        border: 1px solid;

    }


    .garisbawah {
        border-bottom: 1px solid;
    }

    .gariskanan {
        border-right: 1px solid;
    }

    .box {
        border-bottom: 1px solid;
        width: 1px;
        height: 1px;

    }


    .block,

    li {
        border: 1px solid black;
        padding: .1em;
        width: 29px;
    }

    .block {
        display: block;
    }

    span,
    ul {
        border: 1px solid black;
        padding: .1em;
        width: 50px;

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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>