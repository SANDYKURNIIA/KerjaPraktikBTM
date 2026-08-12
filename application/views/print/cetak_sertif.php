<<<<<<< HEAD
<html>

<head>
    <style type='text/css'>
        @page {
            size: 29.7cm 21cm;
            /* margin: 10mm 15mm 10mm 15mm; */
            /* change the margins as you want them to be. */
        }


        body,
        html {
            margin: 0;
            padding: 0;
        }

        body {
            color: black;
            display: table;
            font-family: Georgia, serif;
            font-size: 21px;
            text-align: center;

        }

        .huruf3 {
            font-family: "Arial";
            font-size: 19px;
            font-style: Bold;
        }

        .container {
            position: relative;
            /* text-align: center; */
            width: 29.7cm;
            height: 18.7cm;
            display: table-cell;
        }

        .centered {
            position: absolute;
            /* width: 400px; */
            top: 5%;
            left: 0%;
            /*transform: translate(-30%, -50%); */
        }

        .centered1 {
            position: absolute;
            /* width: 400px; */
            top: 30%;
            left: 5%;
            text-align: left;
            /*transform: translate(-30%, -50%); */
        }

        .centered {
            position: absolute;
            /* width: 400px; */
            top: 5%;
            left: 0%;
            /*transform: translate(-30%, -50%); */
        }

        .centered2 {
            position: absolute;
            /* font-size: 19px; */
            top: 80%;
            /* left: 30%; */
            left: 20%; 
           
            /*transform: translate(-30%, -50%); */
        }

        tr.spaceUnder>td {
            padding-bottom: 0.8em;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body onload="myFunction()">
    <div class="page">

        <div class="container">
            <img src="<?= base_url('assets/dist/img/certif1.jpg') ?>">

            <div class="centered">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <img src="../../assets/dist/img/rsbt-logo.jpg" alt="logoa" width="17%" /> -->
                <!-- <br />
                <br /> -->
                <img src="../../assets/dist/img/rsbt_ihc.png" alt="logoa" width="21%" />

            </div>
            <div class="centered1">
                <table cellpadding=5 style="float: right;">
                    <tr class="spaceUnder">
                        <td>
                            <h3 class="huruf3">Number </h3>
                        </td>
                        <td>:</td>
                        <td>
                            <h3 class="huruf3"><?php echo '&nbsp;&nbsp;'; ?></h3>
                        </td>
                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                </table>
                <table cellpadding=5>
                    <tr class="spaceUnder">
                        <td>
                            <h3 class="huruf3">Full Name </h3>
                        </td>
                        <td>:</td>
                        <td>
                            <h3 class="huruf3"><?php echo '&nbsp;&nbsp;' . $data_mcu['nama_pasien']; ?></h3>
                        </td>
                    </tr>

                    <tr class="spaceUnder">
                        <td>
                            <h3 class="huruf3">Date Of Birth </h3>
                        </td>
                        <td>:</td>
                        <td>
                            <h3 class="huruf3"><?php echo '&nbsp;&nbsp;' . $data_mcu['tgl_lahir']; ?></h3>
                        </td>
                    </tr>

                    <tr class="spaceUnder">
                        <td>
                            <h3 class="huruf3">Company </h3>
                        </td>
                        <td>:</td>
                        <td>
                            <h3 class="huruf3"><?php echo  '&nbsp;&nbsp;' . $data_mcu['perusahaan']; ?></h3>
                        </td>
                    </tr>

                    <tr class="spaceUnder">
                        <td>
                            <h3 class="huruf3">Occupation </h3>
                        </td>
                        <td>:</td>
                        <td>
                            <h3 class="huruf3"><?php echo '&nbsp;&nbsp;' . $data_mcu['occupation']; ?></h3>
                        </td>
                    </tr>
                </table>
                <br />
                <table>
                    <tr>
                        <td>
                            <h3 class="huruf3">This medical fitness certificate has been issued on the basic of the Applicant's health statement, examination, and evaluation</h3>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <h3 class="huruf3">This health certificate is valid until </h3>
                        </td>
                        <td>:</td>
                        <td>
                            <h3 class="huruf3"><?php echo '&nbsp;&nbsp;'. $data_mcu['present']; ?></h3>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <h3 class="huruf3">Conclusion </h3>
                        </td>
                        <td> : </td>
                        <td>
                            <h3 class="huruf3"><?php echo $data_mcu['summary']; ?></h3>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="centered2">

                <table width=100%>
                    <tr >
                        <td >
                            <center>
                                <p class="huruf3"><?php
                                                    date_default_timezone_set('Asia/Jakarta');
                                                    setlocale(LC_TIME, 'IND');
                                                    echo  indo_date2(date("Y-m-d"));
                                                    // echo  indo_date2('2021-05-01'); 
                                                    ?></p>
                            </center>
                        </td>
                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <center>
                                <p class="huruf3"><?=$data_mcu['examined'];
                                                    ?></p>
                            </center>
                        </td>
                    </tr>
                    <tr >
                        <td >
                            <center>
                                <p class="huruf3">Day,Month,Year</p>
                            </center>
                        </td>
                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td style="padding: 15px">
                            <center>
                                <p class="huruf3">Examining Doctor's Signature</p>
                            </center>
                        </td>
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

=======
<html>

<head>
    <style type='text/css'>
        @page {
            size: 29.7cm 21cm;
            /* margin: 10mm 15mm 10mm 15mm; */
            /* change the margins as you want them to be. */
        }


        body,
        html {
            margin: 0;
            padding: 0;
        }

        body {
            color: black;
            display: table;
            font-family: Georgia, serif;
            font-size: 21px;
            text-align: center;

        }

        .huruf3 {
            font-family: "Arial";
            font-size: 19px;
            font-style: Bold;
        }

        .container {
            position: relative;
            /* text-align: center; */
            width: 29.7cm;
            height: 18.7cm;
            display: table-cell;
        }

        .centered {
            position: absolute;
            /* width: 400px; */
            top: 5%;
            left: 0%;
            /*transform: translate(-30%, -50%); */
        }

        .centered1 {
            position: absolute;
            /* width: 400px; */
            top: 30%;
            left: 5%;
            text-align: left;
            /*transform: translate(-30%, -50%); */
        }

        .centered {
            position: absolute;
            /* width: 400px; */
            top: 5%;
            left: 0%;
            /*transform: translate(-30%, -50%); */
        }

        .centered2 {
            position: absolute;
            /* font-size: 19px; */
            top: 80%;
            /* left: 30%; */
            left: 20%; 
           
            /*transform: translate(-30%, -50%); */
        }

        tr.spaceUnder>td {
            padding-bottom: 0.8em;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body onload="myFunction()">
    <div class="page">

        <div class="container">
            <img src="<?= base_url('assets/dist/img/certif1.jpg') ?>">

            <div class="centered">

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <img src="../../assets/dist/img/rsbt-logo.jpg" alt="logoa" width="17%" /> -->
                <!-- <br />
                <br /> -->
                <img src="../../assets/dist/img/rsbt_ihc.png" alt="logoa" width="21%" />

            </div>
            <div class="centered1">
                <table cellpadding=5 style="float: right;">
                    <tr class="spaceUnder">
                        <td>
                            <h3 class="huruf3">Number </h3>
                        </td>
                        <td>:</td>
                        <td>
                            <h3 class="huruf3"><?php echo '&nbsp;&nbsp;'; ?></h3>
                        </td>
                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                </table>
                <table cellpadding=5>
                    <tr class="spaceUnder">
                        <td>
                            <h3 class="huruf3">Full Name </h3>
                        </td>
                        <td>:</td>
                        <td>
                            <h3 class="huruf3"><?php echo '&nbsp;&nbsp;' . $data_mcu['nama_pasien']; ?></h3>
                        </td>
                    </tr>

                    <tr class="spaceUnder">
                        <td>
                            <h3 class="huruf3">Date Of Birth </h3>
                        </td>
                        <td>:</td>
                        <td>
                            <h3 class="huruf3"><?php echo '&nbsp;&nbsp;' . $data_mcu['tgl_lahir']; ?></h3>
                        </td>
                    </tr>

                    <tr class="spaceUnder">
                        <td>
                            <h3 class="huruf3">Company </h3>
                        </td>
                        <td>:</td>
                        <td>
                            <h3 class="huruf3"><?php echo  '&nbsp;&nbsp;' . $data_mcu['perusahaan']; ?></h3>
                        </td>
                    </tr>

                    <tr class="spaceUnder">
                        <td>
                            <h3 class="huruf3">Occupation </h3>
                        </td>
                        <td>:</td>
                        <td>
                            <h3 class="huruf3"><?php echo '&nbsp;&nbsp;' . $data_mcu['occupation']; ?></h3>
                        </td>
                    </tr>
                </table>
                <br />
                <table>
                    <tr>
                        <td>
                            <h3 class="huruf3">This medical fitness certificate has been issued on the basic of the Applicant's health statement, examination, and evaluation</h3>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <h3 class="huruf3">This health certificate is valid until </h3>
                        </td>
                        <td>:</td>
                        <td>
                            <h3 class="huruf3"><?php echo '&nbsp;&nbsp;'. $data_mcu['present']; ?></h3>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <h3 class="huruf3">Conclusion </h3>
                        </td>
                        <td> : </td>
                        <td>
                            <h3 class="huruf3"><?php echo $data_mcu['summary']; ?></h3>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="centered2">

                <table width=100%>
                    <tr >
                        <td >
                            <center>
                                <p class="huruf3"><?php
                                                    date_default_timezone_set('Asia/Jakarta');
                                                    setlocale(LC_TIME, 'IND');
                                                    echo  indo_date2(date("Y-m-d"));
                                                    // echo  indo_date2('2021-05-01'); 
                                                    ?></p>
                            </center>
                        </td>
                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                            <center>
                                <p class="huruf3"><?=$data_mcu['examined'];
                                                    ?></p>
                            </center>
                        </td>
                    </tr>
                    <tr >
                        <td >
                            <center>
                                <p class="huruf3">Day,Month,Year</p>
                            </center>
                        </td>
                        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td style="padding: 15px">
                            <center>
                                <p class="huruf3">Examining Doctor's Signature</p>
                            </center>
                        </td>
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

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>