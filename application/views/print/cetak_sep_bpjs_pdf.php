<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cetak SEP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <style>
    /*@page { size: A4 } */
    @page { 
        size: 210mm 125mm;
        margin-top:30px;
        margin-right:30px;
        margin-left:30px;
        margin-buttom:30px;
     }
    /*section { padding: 4px 4px 4px 4px;}*/

    .logo { 
        width: 50%; 
        height: auto;
    }

    h1 {
        font-family:sans-serif; 
        color: black; 
        font-size: 12pt;
    }

    .table-container {
        font-family:sans-serif; 
        color: black; 
        font-size: 10pt;
        word-wrap: break-word;
        vertical-align: text-top;
     }


    .table-container td {
        vertical-align: top;
    }

    .table-akil {
        font-family:sans-serif; 
        color: black; 
        font-size:8pt;
        vertical-align: text-top;
        margin-top: 10px;
    }


    .table-akil td, .table-akil tr {
        vertical-align: top;
    }


    .table-catatan {
        font-family:sans-serif; 
        color: black; 
        font-size: 10pt;
        vertical-align: text-top;
    }


    .table-catatan td {
        vertical-align: top;
    }
    

    .table-prb {
        font-family:sans-serif; 
        color: black; 
        font-size: 10pt;
        width: 100%;
    }

    </style>       

</head>

<body>
    <section>
        <img class="logo" src="<?= base_url() ?>/assets/dist/img/bpjs_text.png">
        <table class="table-prb">
          <tr>
                <td align="right"><?php echo  $prb ?>PRB</td>
            </tr>
        </table>

        <div class="table-container">
            <table width="100%">
                <tr>
                    <td>
                        No. SEP
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td colspan="5">
                        <?php echo  $data['noSep'] ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tgl. SEP
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <?php echo  $data['tglSep'] ?>
                    </td>

                    <td>
                        
                    </td>

                    <td>
                        Peserta
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">
                        <?php echo  $data['peserta']['jnsPeserta'] ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        No.Kartu
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">
                        <?php echo $data['peserta']['noKartu'] ?> (MR : <?php echo $data['peserta']['noMr'] ?>)
                    </td>

                    <td>
                        
                    </td>

                    <td>
                        COB
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">

                        <?php echo $data['cob']; ?>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        Nama Peserta
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">
                        <?php echo $data['peserta']['nama'] ?>
                    </td>

                    <td>
                        
                    </td>
                    
                    <td>
                        Jns.Rawat
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">
                        <?php echo $data['jnsPelayanan']; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Tgl.Lahir
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">
                        <?php echo date('d/m/Y', strtotime($data['peserta']['tglLahir'])) ?>
                        Kelamin :<?php 
                        if ($data['peserta']['kelamin']=="P"){
                            echo "Perempuan";
                        }
                        elseif ($data['peserta']['kelamin'] == "L") {
                            echo "Laki-laki";
                        } else {
                            echo "-";
                        }
                        
                         ?>
                    </td>

                    <td>
                        
                    </td>

                    <td>
                        Jns.Kunjungan
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">
                        <span style="color:red">No Available</span>
                    </td>

                    
                </tr>
                <tr>
                    <td>
                        No. Telepon
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">
                        <?php echo $noTelepon ?>
                    </td>

                    <td>
                        
                    </td>

                    <td>

                    </td>
                    <td>
                        
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        Sub/Spesialis
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">
                        <?php echo  $data['poli'] ?>
                    </td>

                    <td>
                        
                    </td>

                    <td>
                        Poli Perujuk
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">
                        <span style="color:red">No Available</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        Dokter
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">
                        <?php echo  $data['dpjp']['nmDPJP'] ?>
                    </td>

                    <td>
                        
                    </td>

                    <td>
                        Kls.Hak
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">
                        <?php echo  $hakKelas ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Faskes Perujuk
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">
                        <?php echo   $rujukan ?>
                    </td>

                    <td>
                        
                    </td>

                    <td>
                        Kls.Rawat
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">
                        <?php echo  $data['klsRawat']['klsRawatHak'] ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Diagnosa Awal
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">
                        <?php echo   $data['diagnosa'] ?>
                    </td>

                    <td>
                        
                    </td>

                    <td>Penjamin</td>
                    <td>:</td>
                    <td>
                        <?php echo  $data['penjamin'] ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Catatan
                    </td>
                    <td width="1%">
                        :
                    </td>
                    <td width="25%">
                        <?php echo   $data['catatan'] ?>
                    </td>

                    <td>
                        
                    </td>

                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>

                
            </table>
        </div>

        


   
        

        <table class="table-akil">
            <tr>
                <td width="80%">
                    <table width="100%">
                        <tr>

                            <td width="2%">*</td>
                            <td colspan="2">
                                <div>
                                    <font>Saya menyetujui BPJS kesehatan menggunakan informasi medis pasien jika di perlukan.</font>
                                </div>
                            </td>
                        </tr>
                        <tr>

                            <td width="2%">**</td>
                            <td colspan="2">
                                <div>
                                    <font>
                                       SEP Bukan sebagai bukti penjamin peserta.
                                    </font>
                                </div>
                            </td>
                        </tr>
                        <tr>

                            <td width="2%">**</td>
                            <td colspan="2">
                                <div>
                                    <font>
                                        Dengan tampilnya luaran SEP elektronik ini
                                        merupakan hasil validasi terhadap eligibilats Pasien
                                        secara elektronik (validasi fingerprint atau biometrik /
                                        sistem validasi lain) dan selanjutnya Pasien dapat
                                        mengakses pelayanan kesehatan untuk rujukan
                                        sesuai ketentuan berlaku.
                                        Kebenaran dan keaslian atas informasi data Pasien
                                        menjadi tanggung jawab penuh FKRTL
                                    </font>
                                </div>
                            </td>
                        </tr>

                        <?php
                        if ($data['kdStatusKecelakaan'] != 0) { ?>
                        <tr>
                            <td width="3%">**</td>
                            <td colspan="2">
                                <div>
                                    <font>
                                        Peserta Mengalami Kecelakaan lalu lintas,penjamin
                                        akan dikoordinasikan RS dengan Jasa Raharja PT
                                        terlebih dahulu.
                                    </font>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>

                            <td width="2%"></td>
                            <td colspan="2">
                                <div>
                                    <font>
                                       Tanggal Cetak <?php echo  date("d/m/Y H:i") ?> wib
                                    </font>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table style="text-align: center;">
                        <tr>

                            <td>
                                <div>Pasien/Keluarga Pasien</div>
                            </td>
                        </tr>

                        <tr>
                            <td>

                                <div id="gambar"></div><br>
                                <?= $data['peserta']['nama'] ?>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </section>

<script src="<?= base_url() ?>/resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/dist/js/jquery.qrcode.min.js"></script>
    <div id="output" style="display: none;"></div>

<script>
        // jQuery(function() {
        //     jQuery('#output').qrcode("<?= $data['peserta']['noKartu'] ?>");

        //     // the lib generate a canvas under target, you should get that canvas, not #output
        //     // And put the code here would ensure that you can get the canvas, and canvas has the image.
        //     var canvas = document.querySelector("#output canvas");
        //     var img = canvas.toDataURL("image/png");
        //     $(canvas).on('click', function() {
        //         // Create an anchor, and set its href and download.
        //         var dl = document.createElement('a');
        //         dl.setAttribute('href', img);
        //         dl.setAttribute('download', 'qrcode.png');
        //         // simulate a click will start download the image, and name is qrcode.png.
        //         dl.click();
        //     });

        //     // Note this will overwrite any current content.
        //     $('#gambar').html('<img src="' + img + '" width="50px"/>');
        // })
    </script>
</body>

