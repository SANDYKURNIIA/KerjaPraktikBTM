<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
    <title>Print out <?= $page_title ?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
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
        .gariskiri {
            border-left: 1px solid;
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

        hr {
            border: 1px solid black;
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
</head>

<body>
    <div class="content">
        <table style="width: 100%">
            <tr>
                <td>
                    <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 110px;">
                </td>
                <td>
                    <p><b>RS. Bakti Timah</b></p>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
                <td>
                    <p style="margin-left:-9em">NRM : <?= $data['no_rm'] ?></p>
                    <p style="margin-left:-9em">Nama :<?= $data['pasien'] ?></p>
                    <p style="margin-left:-9em">Jenis Kelamin :<?= $data['jenis_kelamin'] ?></p>
                    <p style="margin-left:-9em">Tanggal Lahir :<?= strftime('%d %B %Y', strtotime($data['tgl_lahir'])) ?></p>
                    <p style="margin-left:-9em">(Mohon diisi stiker jika ada)</p>

                </td>
            </tr>
        </table>
        <hr>
        <h2 class="center">
            ANALISA DATA
        </h2>
				<table width=100% class="table1" cellspacing=0>
                    <tr>
                        <th class="gariskanan garisbawah"> DATA </td>
                        <th class="gariskanan garisbawah"> ETIOLOGI </th>
                        <th class="garisbawah"> MASALAH </th>
                    </tr>

                    <tr>
                        <td class="gariskanan" width="40%"><?= $data['data'] ?></td>
						<td class="gariskanan"><?= $data['etiologi'] ?></td>
						<td ><?= $data['masalah'] ?></td>
                    </tr>
                </table>   
                      		    <!-- <table class="table1">
						            <thead>
										<tr> 
										    <th>DATA</th>
									        <th>ETIOLOGI</th>
						    				<th>MASALAH</th>
										</tr>
									</thead>
	                                <tbody>                                     
                                    	<tr>
								            <td width="40%"><?= $data['data'] ?></td>
											<td ><?= $data['etiologi'] ?></td>
											<td ><?= $data['masalah'] ?></td>
									    </tr>
									</tbody>
								</table>  -->
                          
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
    </script>
</body>

=======
<!DOCTYPE html>
<html>

<head>
    <title>Print out <?= $page_title ?></title>
    <link href="<?= base_url() ?>resources/css/styles_print.css?p=<?= date('his') ?>" rel="stylesheet" type="text/css" />
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
        .gariskiri {
            border-left: 1px solid;
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

        hr {
            border: 1px solid black;
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
</head>

<body>
    <div class="content">
        <table style="width: 100%">
            <tr>
                <td>
                    <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 110px;">
                </td>
                <td>
                    <p><b>RS. Bakti Timah</b></p>
                    <p>Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang</p>
                    <p>Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia</p>
                    <p>Telp. 0717 9100844, Fax. 0715 32165</p>
                </td>
                <td>
                    <p style="margin-left:-9em">NRM : <?= $data['no_rm'] ?></p>
                    <p style="margin-left:-9em">Nama :<?= $data['pasien'] ?></p>
                    <p style="margin-left:-9em">Jenis Kelamin :<?= $data['jenis_kelamin'] ?></p>
                    <p style="margin-left:-9em">Tanggal Lahir :<?= strftime('%d %B %Y', strtotime($data['tgl_lahir'])) ?></p>
                    <p style="margin-left:-9em">(Mohon diisi stiker jika ada)</p>

                </td>
            </tr>
        </table>
        <hr>
        <h2 class="center">
            ANALISA DATA
        </h2>
				<table width=100% class="table1" cellspacing=0>
                    <tr>
                        <th class="gariskanan garisbawah"> DATA </td>
                        <th class="gariskanan garisbawah"> ETIOLOGI </th>
                        <th class="garisbawah"> MASALAH </th>
                    </tr>

                    <tr>
                        <td class="gariskanan" width="40%"><?= $data['data'] ?></td>
						<td class="gariskanan"><?= $data['etiologi'] ?></td>
						<td ><?= $data['masalah'] ?></td>
                    </tr>
                </table>   
                      		    <!-- <table class="table1">
						            <thead>
										<tr> 
										    <th>DATA</th>
									        <th>ETIOLOGI</th>
						    				<th>MASALAH</th>
										</tr>
									</thead>
	                                <tbody>                                     
                                    	<tr>
								            <td width="40%"><?= $data['data'] ?></td>
											<td ><?= $data['etiologi'] ?></td>
											<td ><?= $data['masalah'] ?></td>
									    </tr>
									</tbody>
								</table>  -->
                          
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
    </script>
</body>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>