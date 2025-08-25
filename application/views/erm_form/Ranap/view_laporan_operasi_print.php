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
            <center>LAPORAN OPERASI</center>
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
        <td width="390" class=gariskanan>
          <center>Surat Izin Operasi : Ada / Tidak Ada, Mohon Dilampirkan</center>
        </td>
      </tr>
    </table>

    <table width=100% class="table2" cellspacing=0>
      <tr>
        <td width="220" class=gariskanan>
          <center>Nama Ahli Bedah :</center>
        </td>
        <td width="220" class=gariskanan>
          <center>Nama Perawat Instrumen :</center>
        </td>
        <td width="220" class=gariskanan>
          <center>Nama Asisten I :</center>
        </td>
        <td width="220" class=gariskanan>
          <center> Nama Asisten II :</center>
        </td>
      </tr>
      <tr>
        <td width="220" class=gariskanan>
          <center><?= $laporan_operasi->nama_ahli_bedah ?></center>
        </td>
        <td width="220" class=gariskanan>
          <center><?= $laporan_operasi->nama_perawat_instrumen ?></center>
        </td>
        <td width="220" class=gariskanan>
          <center><?= $laporan_operasi->nama_asisten1 ?></center>
        </td>
        <td width="220" class=gariskanan>
          <center><?= $laporan_operasi->nama_asisten2 ?></center>
        </td>
      </tr>
    </table>

    <table width=100% class="table2" cellspacing=0>
      <tr>
        <td width=20%>Diagnosa Pra Operasi </td>
        <td width=1%>:</td>
        <td><?= $laporan_operasi->diagnosa_pra_operasi ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Tindakan Operasi </td>
        <td width=1%>:</td>
        <td><?= $laporan_operasi->tindakan_operasi ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Diagnosa Post Operasi </td>
        <td width=1%>:</td>
        <td><?= $laporan_operasi->diagnosa_post_operasi ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Indikasi Operasi </td>
        <td width=1%>:</td>
        <td><?= $laporan_operasi->indikasi_operasi ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Jenis Operasi</td>
        <td width=1%>:</td>
        <td><?= $laporan_operasi->jenis_operasi ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Tanggal Operasi </td>
        <td width=1%>:</td>
        <td><?= $laporan_operasi->tanggal_operasi ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Operasi Dimulai </td>
        <td width=1%>:</td>
        <td><?= $laporan_operasi->operasi_dimulai ?></td>
        </td>
      </tr>
      <tr>
        <td width=20%>Operasi Selesai </td>
        <td width=1%>:</td>
        <td><?= $laporan_operasi->operasi_selesai ?></td>
        </td>
      </tr>
    </table>

    <table width=100% class="table2" cellspacing=0>
      <tr>
        <td width="220" class=gariskanan>
          <center>Jaringan Yang Di Eksisi / Insisi :</center>
        </td>
        <td width="220" class=gariskanan>
          <center>Dikirim Untuk Pemeriksaan Pathologie :</center>
        </td>
      </tr>
      <tr>
        <td width="220" class=gariskanan>
          <center><?= $laporan_operasi->jaringan_eksisi ?></center>
        </td>
        <td width="220" class=gariskanan>
          <center><?= $laporan_operasi->pemeriksaan_pathologie ?></center>
        </td>
      </tr>
    </table>

    <table width=100% class="table2" cellspacing=0>
      <tr>
        <td width="220" class=gariskanan>
          <center>Jenis Bahan Yang Dikirim Ke Laboratorium :</center>
        </td>
        <td width="220" class=gariskanan>
          <center>Untuk Pemeriksaan :</center>
        </td>
      </tr>
      <tr>
        <td width="220" class=gariskanan>
          <center><?= $laporan_operasi->bahan_dikirim_laboratorium ?></center>
        </td>
        <td width="220" class=gariskanan>
          <center><?= $laporan_operasi->untuk_pemeriksaan ?></center>
        </td>
      </tr>
    </table>

    <table width=100% class="table2">
      <tr>
        <td width="50%" class=gariskanan>
          <center>Cara Approach (bila perlu) Dengan Gambar :</center>
        </td>
        <td width="50%" class=gariskanan>
          <center>Posisi Penderita (bila perlu) Dengan Gambar :</center>
        </td>
      </tr>
      <tr>
        <td width="50%" height="200px" class=gariskanan></td>
      </tr>
    </table>

    <table width=100% class="table2">
      <tr>
        <td class=gariskanan>
          <center>Singkatan Kelainan Yang Ditemukan Dengan Gambar (laporan lengkap lihat sebelah) </center>
        </td>
      </tr>
      <tr>
        <td width="50%" height="200px" class=gariskanan></td>
      </tr>
    </table>

    <table width=100% class="table2" cellspacing=0>
      <tr>
        <td width=41%>Antiseptik dilakukan di daerah operasi dengan </td>
        <td width=1%>:</td>
        <td><?= $laporan_operasi->antiseptik ?></td>
        </td>
      </tr>
      <tr>
        <td width=41%>Jumlah Perdarahan </td>
        <td width=1%>:</td>
        <td><?= $laporan_operasi->jumlah_pendarahan ?></td>
        </td>
      </tr>
      <tr>
        <td width=41%>Jumlah transfusi </td>
        <td width=1%>:</td>
        <td><?= $laporan_operasi->jumlah_transfusi ?></td>
        </td>
      </tr>
      <tr>
        <td width=41%>penyulit Operasi</td>
        <td width=1%>:</td>
        <td><?= $laporan_operasi->penyulit_operasi ?></td>
        </td>
      </tr>
      <tr>
        <td width=41%>Komplikasi</td>
        <td width=1%>:</td>
        <td><?= $laporan_operasi->komplikasi_operasi ?></td>
        </td>
      </tr>
      <tr>
        <td width=41%>Nomor Pendaftaran alat yang dipasang ( implan ) </td>
        <td width=1%>:</td>
        <td><?= $laporan_operasi->nomor_pendaftaran ?></td>
        </td>
      </tr>
      <tr>
        <td width=41%>Laporan Operasi </td>
        <td width=1%>:</td>
        <td><?= $laporan_operasi->laporan_operasi ?></td>
        </td>
      </tr>
    </table>

    <table width="100%" class="table2" cellspacing=0>
      <tr width="30%">
        <td></td>
        <td width="350px"></td>
        <td>Tgl & Jam Pembuatan Laporan <?= $laporan_operasi->tanggal_operasi ?> <?= $laporan_operasi->operasi_selesai ?></td>
      </tr>
      <tr width="30%">
        <td></td>
        <td></td>
        <td>Operator</td>
      </tr>
      <tr height=60px></tr>
      <tr width="30%">
        <td></td>
        <td></td>
        <td><?= $laporan_operasi->nama_ahli_bedah ?></td>
      </tr>
      <tr width="30%">
        <td></td>
        <td></td>
        <td>Tanda Tangan & Nama Jelas</td>
      </tr>
    </table>


    <script type="text/javascript">
      function simpan() {
        id_pelayanan = $('#inPel').val();
        no_rm = $('#inNoRM').val();
        nama_ahli_bedah = $('#inNamaAhli').val();
        nama_perawat_instrumen = $('#inNamaPerawat').val();
        nama_asisten1 = $('#inNamaAsisten1').val();
        nama_asisten2 = $('#inNamaAsisten2').val();
        diagnosa_pra_operasi = $('#inDiagPra').val();
        tindakan_operasi = $('#inTinOperasi').val();
        diagnosa_post_operasi = $('#inDiagPost').val();
        indikasi_operasi = $('#inOperasi').val();
        jenis_operasi = $('input[name="inJenOperasi"]:checked').val();
        operasi_dimulai = $('#inOpeMulai').val();
        operasi_selesai = $('#inOpeSelesai').val();
        jaringan_eksisi = $('#inJarEksisi').val();
        bahan_dikirim_laboratorium = $('#inBahDikirim').val();
        pemeriksaan_pathologie = $('input[name="inPemPath"]:checked').val();
        untuk_pemeriksaan = $('#inUntPem').val();
        singkatan_kelainan = $('#inSingKel').val();
        antiseptik = $('#inAntiseptik').val();
        jumlah_pendarahan = $('#inJumPenda').val();
        jumlah_transfusi = $('#inJumTrans').val();

        penyulit_operasi = $('input[name="inPenOperasi"]:checked').val();
        if (penyulit_operasi == "Ada") {
          penyulit_operasi = $('#inPenOperasi').val();
        }
        penOperasi = $('input[name="penOperasi"]:checked').val();

        komplikasi_operasi = $('input[name="inKomplikasi"]:checked').val();
        if (komplikasi_operasi == "Ada") {
          komplikasi_operasi = $('#inKomplikasi').val();
        }
        komplikasi = $('input[name="komplikasi"]:checked').val();

        nomor_pendaftaran = $('#inNoPend').val();

        $.ajax({
          url: "<?php echo base_url() ?>Erm_laporan_operasi/store",
          method: "POST",
          dataType: 'json',
          data: {
            id_pelayanan: id_pelayanan,
            id_history: id_history,
            no_rm: no_rm,
            nama_ahli_bedah: nama_ahli_bedah,
            nama_perawat_instrumen: nama_perawat_instrumen,
            nama_asisten1: nama_asisten1,
            nama_asisten2: nama_asisten2,
            diagnosa_pra_operasi: diagnosa_pra_operasi,
            tindakan_operasi: tindakan_operasi,
            diagnosa_post_operasi: diagnosa_post_operasi,
            indikasi_operasi: indikasi_operasi,
            jenis_operasi: jenis_operasi,
            operasi_dimulai: operasi_dimulai,
            operasi_selesai: operasi_selesai,
            jaringan_eksisi: jaringan_eksisi,
            bahan_dikirim_laboratorium: bahan_dikirim_laboratorium,
            pemeriksaan_pathologie: pemeriksaan_pathologie,
            untuk_pemeriksaan: untuk_pemeriksaan,
            singkatan_kelainan: singkatan_kelainan,
            antiseptik: antiseptik,
            jumlah_pendarahan: jumlah_pendarahan,
            jumlah_transfusi: jumlah_transfusi,
            penyulit_operasi: penyulit_operasi,
            komplikasi_operasi: komplikasi_operasi,
            nomor_pendaftaran: nomor_pendaftaran,
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

</html>