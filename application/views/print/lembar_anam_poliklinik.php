<!DOCTYPE html>
<html>

<head>
    <title>Print out <?=$page_title?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table1 {
            color: #232323;
            border-collapse: collapse;
            border: 1px solid black;

        }

        .garisbawah {
            border-bottom: 1px solid;
        }

        .gariskanan {
            border-right: 1px solid;
        }

    </style>
</head>

<body>
    <div class="content">
        <table class="a" style="width: 100%">
            <tr>
                <td>
                    <img src="<?=base_url()?>resources/img/rsbt_logo.jpg" style="width: 80px;">
                </td>
                <td>
                    <p><b>RS. Bakti Timah</b></p>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
                <td>
                    <p style="margin-left:-9em">LEMBAR POLIKLINIK</p>
                    <p style="margin-left:-9em">No. Rekam Medik :</p>
                    
                </td>
            </tr>
        </table>
        <hr>
        <table width=100% class="table1"  border="1" cellspacing=0 style="margin-top:15px;   " >

        <p>Nama Pasien  :   .....................................................</P>
        <p>Tanggal Lahir    :   .....................................................      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Umur :   ....... Tahun </p>
        <p>Jenis Kelamin    :   Laki-Laki / Perempuan</p>


        
            
            <tr >
                <td width="10%" >Tanggal</td>
                <td width="40%" >Riwayat Penyakit, Diagnosis dan Konsultasi</td>
                <td width="30%">Terapi</td>
                <td width="20%">Nama dan Tandatangan</td>
            </tr>
            
            </tr>
            </tr>



            <tr height=700px>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
            </td>
            </tr>

        </table>
    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            window.print();
        });

    </script>
</body>

</html>