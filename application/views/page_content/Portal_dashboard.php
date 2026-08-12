<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOS - RS BAKTI TIMAH</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/dist/img/logoIHC.png">
    <link rel="icon" href="<?= base_url(); ?>assets/dist/img/logoIHC.png" type="png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
            background-image:url("https://awsimages.detik.net.id/community/media/visual/2023/07/04/rumah-sakit-bakti-timah_43.jpeg?w=1200");
            background-size: auto;
        }

        p {
            color: grey;
        }

        .header {
            display: flex;
            background-color: white;
            align-items: center;
            justify-content: center;
            gap: 16px;
            text-align: center;
            padding: 16px;
        }

        .line {
            background-color: #3cb878;
            color: white;
            padding: 5px 10px;
            text-align: center;
        }


        nav {
            background-color: #3cb878;
            display: flex;
            justify-content: center;
            padding: 10px 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #003d80;
        }

        .card-content {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .card-content img {
            flex-shrink: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card {
            background-color: #f9f9f9;
            margin: 15px 0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            background-color: #e4e4e4;
        }

        footer {
            background-color: #e4e4e4;
            color: #333;
            text-align: center;
            padding: 10px 20px;
            margin-top: 20px;
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-logo {
            height: 20px;
            /* Sesuaikan ukuran logo */
        }

        footer p {
            margin: 0;
        }

        .logo-size {
            width: 50%;
        }
    </style>
</head>

<body>
    <header>
        <div class="header">
            <img src="<?= base_url(); ?>assets/dist/img/logoIHC.png" alt="" width="5%">
            <h1>PORTAL BAKTI TIMAH</h1>
        </div>
    </header>
    <div class="line">
    </div>
    <div class="container">
        <div class="card" onclick="navigateTopp()">
            <div class="card-content">
                <img src="<?= base_url(); ?>assets/dist/img/logoIHC.png"  alt="" width="5%">
                <div class="text">
                    <h2>Rumah Sakit Bakti Timah Pangkalpinang</h2>
                    <p>klik untuk menampilkan data kunjungan poli</p>
                </div>
            </div>
        </div>
        <div class="card" onclick="navigateToSungaiLiat()">
            <div class="card-content">
                <img src="<?= base_url(); ?>assets/dist/img/logoIHC.png"  alt="" width="5%">
                <div class="text">
                    <h2>Rumah Sakit Bakti Timah Sungai Liat</h2>
                    <p>klik untuk menampilkan data kunjungan poli</p>
                </div>
            </div>
        </div>
        <div class="card" onclick="navigateToMuntok()">
            <div class="card-content">
                <img src="<?= base_url(); ?>assets/dist/img/logoIHC.png" alt="" width="5%">
                <div class="text">
                    <h2>Rumah Sakit Bakti Timah Muntok</h2>
                    <p>klik untuk menampilkan data kunjungan poli</p>
                </div>
            </div>
        </div>
        <!-- <div class="card" onclick="navigateToKarimun()">
            <div class="card-content">
                <img src="<?= base_url(); ?>assets/dist/img/logoIHC.png"  alt="" width="5%">
                <div class="text">
                    <h2>Rumah Sakit Bakti Timah Karimun</h2>
                    <p>klik untuk menampilkan data kunjungan poli</p>
                </div>
            </div>
        </div> -->
    </div>

    <footer>
        <div class="footer-content">
            <img src="<?= base_url(); ?>assets/dist/img/logoIHC.png" alt="Logo" class="footer-logo">
            <p>&copy; 2025 Development from EDP</p>
        </div>
    </footer>

    <script>
        urlpp = "<?php base_url() ?>./Dashboard_poli/dashboard_pp";
        urlSungaiLiat = "http://36.88.168.34/re-sibatik/Dashboard_poli";
        urlMuntok = "http://36.88.184.39/re-sibatik/Dashboard_poli";
        urlKarimun = "";

        function navigateTopp() {
            window.open(urlpp,'_blank');
        }

        function navigateToSungaiLiat() {
            window.open(urlSungaiLiat,'_blank');
        }

        function navigateToMuntok() {
            window.open(urlMuntok,'_blank');
        }

        function navigateToKarimun() {
            window.open(urlKarimun,'_blank');
        }
    </script>

</body>

=======
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOS - RS BAKTI TIMAH</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/dist/img/logoIHC.png">
    <link rel="icon" href="<?= base_url(); ?>assets/dist/img/logoIHC.png" type="png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
            background-image:url("https://awsimages.detik.net.id/community/media/visual/2023/07/04/rumah-sakit-bakti-timah_43.jpeg?w=1200");
            background-size: auto;
        }

        p {
            color: grey;
        }

        .header {
            display: flex;
            background-color: white;
            align-items: center;
            justify-content: center;
            gap: 16px;
            text-align: center;
            padding: 16px;
        }

        .line {
            background-color: #3cb878;
            color: white;
            padding: 5px 10px;
            text-align: center;
        }


        nav {
            background-color: #3cb878;
            display: flex;
            justify-content: center;
            padding: 10px 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #003d80;
        }

        .card-content {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .card-content img {
            flex-shrink: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card {
            background-color: #f9f9f9;
            margin: 15px 0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            background-color: #e4e4e4;
        }

        footer {
            background-color: #e4e4e4;
            color: #333;
            text-align: center;
            padding: 10px 20px;
            margin-top: 20px;
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-logo {
            height: 20px;
            /* Sesuaikan ukuran logo */
        }

        footer p {
            margin: 0;
        }

        .logo-size {
            width: 50%;
        }
    </style>
</head>

<body>
    <header>
        <div class="header">
            <img src="<?= base_url(); ?>assets/dist/img/logoIHC.png" alt="" width="5%">
            <h1>PORTAL BAKTI TIMAH</h1>
        </div>
    </header>
    <div class="line">
    </div>
    <div class="container">
        <div class="card" onclick="navigateTopp()">
            <div class="card-content">
                <img src="<?= base_url(); ?>assets/dist/img/logoIHC.png"  alt="" width="5%">
                <div class="text">
                    <h2>Rumah Sakit Bakti Timah Pangkalpinang</h2>
                    <p>klik untuk menampilkan data kunjungan poli</p>
                </div>
            </div>
        </div>
        <div class="card" onclick="navigateToSungaiLiat()">
            <div class="card-content">
                <img src="<?= base_url(); ?>assets/dist/img/logoIHC.png"  alt="" width="5%">
                <div class="text">
                    <h2>Rumah Sakit Bakti Timah Sungai Liat</h2>
                    <p>klik untuk menampilkan data kunjungan poli</p>
                </div>
            </div>
        </div>
        <div class="card" onclick="navigateToMuntok()">
            <div class="card-content">
                <img src="<?= base_url(); ?>assets/dist/img/logoIHC.png" alt="" width="5%">
                <div class="text">
                    <h2>Rumah Sakit Bakti Timah Muntok</h2>
                    <p>klik untuk menampilkan data kunjungan poli</p>
                </div>
            </div>
        </div>
        <!-- <div class="card" onclick="navigateToKarimun()">
            <div class="card-content">
                <img src="<?= base_url(); ?>assets/dist/img/logoIHC.png"  alt="" width="5%">
                <div class="text">
                    <h2>Rumah Sakit Bakti Timah Karimun</h2>
                    <p>klik untuk menampilkan data kunjungan poli</p>
                </div>
            </div>
        </div> -->
    </div>

    <footer>
        <div class="footer-content">
            <img src="<?= base_url(); ?>assets/dist/img/logoIHC.png" alt="Logo" class="footer-logo">
            <p>&copy; 2025 Development from EDP</p>
        </div>
    </footer>

    <script>
        urlpp = "<?php base_url() ?>./Dashboard_poli/dashboard_pp";
        urlSungaiLiat = "http://36.88.168.34/re-sibatik/Dashboard_poli";
        urlMuntok = "http://36.88.184.39/re-sibatik/Dashboard_poli";
        urlKarimun = "";

        function navigateTopp() {
            window.open(urlpp,'_blank');
        }

        function navigateToSungaiLiat() {
            window.open(urlSungaiLiat,'_blank');
        }

        function navigateToMuntok() {
            window.open(urlMuntok,'_blank');
        }

        function navigateToKarimun() {
            window.open(urlKarimun,'_blank');
        }
    </script>

</body>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>