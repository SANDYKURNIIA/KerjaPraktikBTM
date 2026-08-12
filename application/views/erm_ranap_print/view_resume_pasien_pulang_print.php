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

    .table2 {
      color: #232323;
      border-collapse: collapse;
      border: 1px solid;

    }

    .table3 {
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

    <table width=100% class="table1" cellspacing=0>
      <tr>
        <td>
          <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 200px;">
        <td width="800">
          <strong>
            <center>RINGKASAN PASIEN PULANG (DISCHARGE SUMMARY)</center>
          </strong>
        </td>
        </td>
      </tr>
    </table>

    <table width=100% class="table2" cellspacing=0>
      <tr>
        <td width="390" class=gariskanan>
          <p>Ruang : <?= $data->nama_ruangan ?></p>
          <p>Kelas : <?= $data->kelas ?></p>
          <p>Jenis Kelamin : <?= $data->jenis_kelamin ?></p>
        </td>

        <td width="390" class=gariskanan>
          <p>No.RM : <?= $data->no_rm ?></p>
          <p>Nama Pasien : <?= $data->nama ?></p>
          <p>Tanggal Lahir : <?= strftime("%d %B %Y ", strtotime($data->tgl_lahir)); ?></p>
        </td>
      </tr>
    </table>

    <table width=100% class="table2" cellspacing=0>
      <tr>
        <td width=10%>Agama</td>
        <td width=1%>:</td>
        <td><?= $data->agama ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Status Perkawinan</td>
        <td width=1%>:</td>
        <td><?= $data->perkawinan ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Alamat Pasien</td>
        <td width=1%>:</td>
        <td><?= $data->alamat ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Dokter</td>
        <td width=1%>:</td>
        <td><?= $data->nama_dokter ?></td>
        </td>
      </tr>
    </table>

    <table width=100% class="table2" cellspacing=0>
      <tr>
        <td width="220" class=gariskanan>
          <center>Dokter :</center>
        </td>
        <td width="220" class=gariskanan>
          <center>Tanggal Masuk :</center>
        </td>
        <td width="220" class=gariskanan>
          <center>Tanggal Keluar :</center>
        </td>
      </tr>
      <tr>
        <td width="220" class=gariskanan>
          <center><?= $data->nama_dokter ?></center>
        </td>
        <td width="220" class=gariskanan>
          <center><?= $data->tgl_masuk ?></center>
        </td>
        <td width="220" class=gariskanan>
          <center><?= $data->keluar_kamar ?></center>
        </td>
      </tr>
    </table>

    <table width=100% class="table2" cellspacing=0>
      
      <tr>

        <td width=61%>Riwayat Kelahiran/Anamnesa </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $resume_pasien_pulang->riw_kel ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Pemeriksaan Fisik </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $resume_pasien_pulang->pem_fisik ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Hasil Pemeriksaan Penunjang </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $resume_pasien_pulang->has_pem_pen ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Diagnosa Saat Masuk </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $data->diagnosa ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Diagnosa Utama Yang Ditegakkan </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $diagnosa_utama ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Diagnosa Sekunder </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $resume_pasien_pulang->diag_seku ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Porsedur Terapi & Tindakan Yang Telah Di Kerjakan </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $resume_pasien_pulang->por_terapi ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Terapi Obat-obatan Yang Diberikan Termasuk Obat Setelah Pasien Pulang </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $resume_pasien_pulang->ter_obat ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Kondisi / Keadaan Pasien Saat Pulang </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 50px;"><?= $resume_pasien_pulang->kead_pasien ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Edukasi Yang Sudah Diberikan </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 50px;"><?= $resume_pasien_pulang->edu_diberi ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Tanggal</td>
        <td width=1%>:</td>
        <td style="padding-bottom: 50px;"><?= $resume_pasien_pulang->tanggal ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Pukul</td>
        <td width=1%>:</td>
        <td style="padding-bottom: 50px;"><?= $resume_pasien_pulang->pukul ?></td>
        </td>
      </tr>
    </table>

    <table width="100%" class="table2" cellspacing=0>
      <tr width="30%">
        <td></td>
        <td></td>
        <td style="text-align: right;">Tgl & Jam Pembuatan Laporan <?= $resume_pasien_pulang->tanggal ?></td>
      </tr>
      <tr width="30%">
        <td></td>
        <td></td>
        <td style="text-align: right;">Operator</td>
      </tr>
      <tr height=60px></tr>
      <tr width="30%">
        <td></td>
        <td></td>
        <td style="text-align: right;"><?= $data->nama_dokter ?></td>
      </tr>
      <tr width="30%">
        <td></td>
        <td></td>
        <td style="text-align: center;">Tanda Tangan & Nama Jelas</td>
      </tr>
    </table>

    <script type="text/javascript">
      function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();
        riw_kel = $('#inRka').val();
        pem_fisik = $('#inPF').val();
        has_pem_pen = $('#inHPP').val();
        diag_seku = $('#inDS').val();
        por_terapi = $('#inPTTYTDK').val();
        ter_obat = $('#inTOYDTOSPP').val();
        kead_pasien = $('#inKKPSP').val();
        edu_diberi = $('#inEYSD').val();
        tanggal = $('#inTgl').val();
        pukul = $('#inPkl').val();

        $.ajax({
          url: "<?php echo base_url() ?>Erm_resume_pasien_pulang/store",
          method: "POST",
          dataType: 'json',
          data: {
            id_pelayanan: id_pelayanan,
            id_history: id_history,
            no_rm: no_rm,
            riw_kel: riw_kel,
            pem_fisik: pem_fisik,
            has_pem_pen: has_pem_pen,
            diag_seku: diag_seku,
            por_terapi: por_terapi,
            ter_obat: ter_obat,
            kead_pasien: kead_pasien,
            edu_diberi: edu_diberi,
            tanggal: tanggal,
            pukul: pukul,
          },
          success: function(data) {
            if (data.status == "success") {
              // alert('success');
              window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" +
                '<?= urlencode(base64_encode($id_pelayanan)) ?>' +
                '/' + '<?= urlencode(base64_encode($id_history)) ?>';
            } else {
              swal({
                title: "Gagal!",
                type: "warning",
                text: data.status,
                confirmButtonColor: "#3cb878",
              });
            }
          }
        })
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

    .table2 {
      color: #232323;
      border-collapse: collapse;
      border: 1px solid;

    }

    .table3 {
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

    <table width=100% class="table1" cellspacing=0>
      <tr>
        <td>
          <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width: 200px;">
        <td width="800">
          <strong>
            <center>RINGKASAN PASIEN PULANG (DISCHARGE SUMMARY)</center>
          </strong>
        </td>
        </td>
      </tr>
    </table>

    <table width=100% class="table2" cellspacing=0>
      <tr>
        <td width="390" class=gariskanan>
          <p>Ruang : <?= $data->nama_ruangan ?></p>
          <p>Kelas : <?= $data->kelas ?></p>
          <p>Jenis Kelamin : <?= $data->jenis_kelamin ?></p>
        </td>

        <td width="390" class=gariskanan>
          <p>No.RM : <?= $data->no_rm ?></p>
          <p>Nama Pasien : <?= $data->nama ?></p>
          <p>Tanggal Lahir : <?= strftime("%d %B %Y ", strtotime($data->tgl_lahir)); ?></p>
        </td>
      </tr>
    </table>

    <table width=100% class="table2" cellspacing=0>
      <tr>
        <td width=10%>Agama</td>
        <td width=1%>:</td>
        <td><?= $data->agama ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Status Perkawinan</td>
        <td width=1%>:</td>
        <td><?= $data->perkawinan ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Alamat Pasien</td>
        <td width=1%>:</td>
        <td><?= $data->alamat ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Dokter</td>
        <td width=1%>:</td>
        <td><?= $data->nama_dokter ?></td>
        </td>
      </tr>
    </table>

    <table width=100% class="table2" cellspacing=0>
      <tr>
        <td width="220" class=gariskanan>
          <center>Dokter :</center>
        </td>
        <td width="220" class=gariskanan>
          <center>Tanggal Masuk :</center>
        </td>
        <td width="220" class=gariskanan>
          <center>Tanggal Keluar :</center>
        </td>
      </tr>
      <tr>
        <td width="220" class=gariskanan>
          <center><?= $data->nama_dokter ?></center>
        </td>
        <td width="220" class=gariskanan>
          <center><?= $data->tgl_masuk ?></center>
        </td>
        <td width="220" class=gariskanan>
          <center><?= $data->keluar_kamar ?></center>
        </td>
      </tr>
    </table>

    <table width=100% class="table2" cellspacing=0>
      
      <tr>

        <td width=61%>Riwayat Kelahiran/Anamnesa </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $resume_pasien_pulang->riw_kel ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Pemeriksaan Fisik </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $resume_pasien_pulang->pem_fisik ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Hasil Pemeriksaan Penunjang </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $resume_pasien_pulang->has_pem_pen ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Diagnosa Saat Masuk </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $data->diagnosa ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Diagnosa Utama Yang Ditegakkan </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $diagnosa_utama ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Diagnosa Sekunder </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $resume_pasien_pulang->diag_seku ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Porsedur Terapi & Tindakan Yang Telah Di Kerjakan </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $resume_pasien_pulang->por_terapi ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Terapi Obat-obatan Yang Diberikan Termasuk Obat Setelah Pasien Pulang </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 30px;"><?= $resume_pasien_pulang->ter_obat ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Kondisi / Keadaan Pasien Saat Pulang </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 50px;"><?= $resume_pasien_pulang->kead_pasien ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Edukasi Yang Sudah Diberikan </td>
        <td width=1%>:</td>
        <td style="padding-bottom: 50px;"><?= $resume_pasien_pulang->edu_diberi ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Tanggal</td>
        <td width=1%>:</td>
        <td style="padding-bottom: 50px;"><?= $resume_pasien_pulang->tanggal ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Pukul</td>
        <td width=1%>:</td>
        <td style="padding-bottom: 50px;"><?= $resume_pasien_pulang->pukul ?></td>
        </td>
      </tr>
    </table>

    <table width="100%" class="table2" cellspacing=0>
      <tr width="30%">
        <td></td>
        <td></td>
        <td style="text-align: right;">Tgl & Jam Pembuatan Laporan <?= $resume_pasien_pulang->tanggal ?></td>
      </tr>
      <tr width="30%">
        <td></td>
        <td></td>
        <td style="text-align: right;">Operator</td>
      </tr>
      <tr height=60px></tr>
      <tr width="30%">
        <td></td>
        <td></td>
        <td style="text-align: right;"><?= $data->nama_dokter ?></td>
      </tr>
      <tr width="30%">
        <td></td>
        <td></td>
        <td style="text-align: center;">Tanda Tangan & Nama Jelas</td>
      </tr>
    </table>

    <script type="text/javascript">
      function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();
        riw_kel = $('#inRka').val();
        pem_fisik = $('#inPF').val();
        has_pem_pen = $('#inHPP').val();
        diag_seku = $('#inDS').val();
        por_terapi = $('#inPTTYTDK').val();
        ter_obat = $('#inTOYDTOSPP').val();
        kead_pasien = $('#inKKPSP').val();
        edu_diberi = $('#inEYSD').val();
        tanggal = $('#inTgl').val();
        pukul = $('#inPkl').val();

        $.ajax({
          url: "<?php echo base_url() ?>Erm_resume_pasien_pulang/store",
          method: "POST",
          dataType: 'json',
          data: {
            id_pelayanan: id_pelayanan,
            id_history: id_history,
            no_rm: no_rm,
            riw_kel: riw_kel,
            pem_fisik: pem_fisik,
            has_pem_pen: has_pem_pen,
            diag_seku: diag_seku,
            por_terapi: por_terapi,
            ter_obat: ter_obat,
            kead_pasien: kead_pasien,
            edu_diberi: edu_diberi,
            tanggal: tanggal,
            pukul: pukul,
          },
          success: function(data) {
            if (data.status == "success") {
              // alert('success');
              window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" +
                '<?= urlencode(base64_encode($id_pelayanan)) ?>' +
                '/' + '<?= urlencode(base64_encode($id_history)) ?>';
            } else {
              swal({
                title: "Gagal!",
                type: "warning",
                text: data.status,
                confirmButtonColor: "#3cb878",
              });
            }
          }
        })
      }
    </script>
</body>

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>