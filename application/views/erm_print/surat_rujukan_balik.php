<!DOCTYPE html>
<html>
<head>
    <title>Print out <?=$page_title?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?=date('his')?>" rel="stylesheet" type="text/css"/>
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
    <table class="table1" style="width: 100%">
    <tr>
        <td>
        
        <table  style="width: 100%">
            <tr>
                <td>
                <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 150px;">
                </td>
                <td>
                    
                </td>
            </tr>
        </table>
        
        <h3 class="center">
            SURAT RUJUKAN BALIK
        </h3>

        <p>Teman Sejawat Yth.</p>
        <p>Mohon kontrol selanjutnya penderita :</p><br>

        <table style="margin-left:40px"  cellspacing=0 >
        <tr height=10px>
            <td width=200px >
            Nama
            </td>
            <td>:</td>
            <td>_______________________________________________</td>
        </tr>
        <tr height=10px>
            <td>
                Diagnosa
            </td>
            <td>:</td>
            <td>_______________________________________________</td>
        </tr>
        <tr height=10px>
            <td>
            Terapi
            </td>
            <td>:</td>
            <td>_______________________________________________</td>
        </tr>
        </table>
        <br>
        <p>Tindak lanjut yang dianjurkan  : </p><br>

        <table style="margin-left:40px"  cellspacing=0 >
        <tr height=10px>
            <td width=250px >
            Pengobatan dengan obat-obatan 
            </td>
            <td>:</td>
            <td>_________________________________________</td>
        </tr>
        <tr height=10px>
            <td>
            Kontrol kembali ke RS tanggal 
            </td>
            <td>:</td>
            <td>_________________________________________</td>
        </tr>
        <tr height=10px>
            <td>
            Kontrol Selesai.
            </td>
            <td>:</td>
            <td></td>
        </tr>
        </table>

        <p align="right" > Pangkal Pinang,...-...........-20.... &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p><br><br>
        <p align="right" > (_______________)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
    </td>
    </tr>

    
        </table>

        <br>

        <table class="table1" style="width: 100%">
    <tr>
        <td>
        
        <table  style="width: 100%">
            <tr>
                <td>
                    <img src="<?=base_url()?>resources/img/rsbt_logo.jpg" style="width: 150px;">
                </td>
                <td>
                    
                </td>
            </tr>
        </table>
        
        <h3 class="center">
            SURAT RUJUKAN BALIK
        </h3>

        <p>Teman Sejawat Yth.</p>
        <p>Mohon kontrol selanjutnya penderita :</p><br>

        <table style="margin-left:40px"  cellspacing=0 >
        <tr height=10px>
            <td width=200px >
            Nama
            </td>
            <td>:</td>
            <td>_______________________________________________</td>
        </tr>
        <tr height=10px>
            <td>
                Diagnosa
            </td>
            <td>:</td>
            <td>_______________________________________________</td>
        </tr>
        <tr height=10px>
            <td>
            Terapi
            </td>
            <td>:</td>
            <td>_______________________________________________</td>
        </tr>
        </table>
        <br>
        <p>Tindak lanjut yang dianjurkan  : </p><br>

        <table style="margin-left:40px"  cellspacing=0 >
        <tr height=10px>
            <td width=250px >
            Pengobatan dengan obat-obatan 
            </td>
            <td>:</td>
            <td>_________________________________________</td>
        </tr>
        <tr height=10px>
            <td>
            Kontrol kembali ke RS tanggal 
            </td>
            <td>:</td>
            <td>_________________________________________</td>
        </tr>
        <tr height=10px>
            <td>
            Kontrol Selesai.
            </td>
            <td>:</td>
            <td></td>
        </tr>
        </table>

        <p align="right" > Pangkal Pinang,...-..........-20.... &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p><br><br>
        <p align="right" > (_______________)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
    </td>
    </tr>

    
        </table>


    </div>
    <script src="<?= base_url() ?>resources/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
    </script>
</body>
</html>