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
    <table width="100%" cellspacing="0" style="border-collapse: collapse; border:1px solid black;">
      <tr>
        <td style="width:33%; border-right:1px solid black; text-align:center; padding:10px;">
          <img src="<?= base_url() ?>assets/dist/img/rsbt_ihc.png" style="width:150px;">
        </td>
        <td
          style="width:33%; border-right:1px solid black; text-align:center; font-size:20px; font-weight:bold; padding:10px;">
          LAPORAN OPERASI
        </td>
        <td style="width:33%; padding:10px;">
          No.RM : <?= $data->no_rm ?><br>
          Nama : <?= $data->nama ?><br>
          Tgl Lahir : <?= strftime("%d %B %Y ", strtotime($data->tgl_lahir)); ?><br>
          Jenis Kelamin : <?= $data->jenis_kelamin ?>
        </td>
      </tr>
    </table>

    <table width="100%" class="table2" cellspacing="0" style="border-collapse: collapse; border:1px solid black;">
      <tr>
        <td width="33%" class="gariskanan" style="padding:6px;">
          <b>Ruang :</b> <?= $data->nama_ruangan ?>
        </td>
        <td width="33%" class="gariskanan" style="padding:6px;">
          <b>Kelas :</b> <?= $data->kelas ?>
        </td>
        <td width="33%" style="padding:6px;">
          <b>Kamar OK :</b> <?= $laporan_operasi->kamar_ok ?>
        </td>
      </tr>
    </table>

    <!-- <table width=100% class="table2" cellspacing=0>
      <tr>
        <td width="390" class=gariskanan>
          <center>Surat Izin Operasi : Ada / Tidak Ada, Mohon Dilampirkan</center>
        </td>
      </tr>
    </table> -->

    <table width=100% class="table2" cellspacing=0>
      <table width="100%" class="table2" cellspacing="0" style="border-collapse: collapse; border:1px solid black;">

        <tr>
          <td class="gariskanan" width="14%">
            <b>
              <center>Nama Ahli Bedah</center>
            </b>
          </td>
          <td class="gariskanan" width="14%">
            <b>
              <center>Perawat Instrumen</center>
            </b>
          </td>
          <td class="gariskanan" width="14%">
            <b>
              <center>Asisten I</center>
            </b>
          </td>
          <td class="gariskanan" width="14%">
            <b>
              <center>Asisten II</center>
            </b>
          </td>
          <td class="gariskanan" width="14%">
            <b>
              <center>Perawat Sirkuler</center>
            </b>
          </td>
          <td class="gariskanan" width="14%">
            <b>
              <center>Dokter Anestesi</center>
            </b>
          </td>
          <td class="gariskanan" width="14%">
            <b>
              <center>Perawat Anestesi</center>
            </b>
          </td>
        </tr>

        <tr>
          <td class="gariskanan">
            <center><?= $laporan_operasi->nama_ahli_bedah ?></center>
          </td>
          <td class="gariskanan">
            <center><?= $laporan_operasi->nama_perawat_instrumen ?></center>
          </td>
          <td class="gariskanan">
            <center><?= $laporan_operasi->nama_asisten1 ?></center>
          </td>
          <td class="gariskanan">
            <center><?= $laporan_operasi->nama_asisten2 ?></center>
          </td>
          <td class="gariskanan">
            <center><?= $laporan_operasi->sirkuler ?></center>
          </td>
          <td class="gariskanan">
            <center><?= $laporan_operasi->nama_dokter_anestesi ?></center>
          </td>
          <td class="gariskanan">
            <center><?= $laporan_operasi->nama_perawat_anestesi ?></center>
          </td>
        </tr>

      </table>
    </table>

    <table width="100%" class="table2" cellspacing="0" style="border-collapse: collapse; border:1px solid black;">

      <tr>
        <!-- ================== KOLOM KIRI ================== -->
        <td width="50%" class="gariskanan" style="padding:6px; vertical-align:top;">

          <table width="100%" style="border-collapse: collapse;">

            <tr>
              <td width="35%" style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
                Diagnosa Pra Operasi
              </td>
              <td width="3%" style="text-align:center; vertical-align:top;">:</td>
              <td style="vertical-align:top;"><?= nl2br($laporan_operasi->diagnosa_pra_operasi) ?></td>
            </tr>

            <tr>
              <td style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
                Diagnosa Post Operasi
              </td>
              <td style="text-align:center; vertical-align:top;">:</td>
              <td style="vertical-align:top;"><?= nl2br($laporan_operasi->diagnosa_post_operasi) ?></td>
            </tr>

            <tr>
              <td style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
                Tindakan Operasi
              </td>
              <td style="text-align:center; vertical-align:top;">:</td>
              <td style="vertical-align:top;"><?= nl2br($laporan_operasi->tindakan_operasi) ?></td>
            </tr>

            <tr>
              <td style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
                Indikasi Operasi
              </td>
              <td style="text-align:center; vertical-align:top;">:</td>
              <td style="vertical-align:top;"><?= nl2br($laporan_operasi->indikasi_operasi) ?></td>
            </tr>

            <tr>
              <td style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
                Jenis Operasi
              </td>
              <td style="text-align:center; vertical-align:top;">:</td>
              <td style="vertical-align:top;"><?= $laporan_operasi->jenis_operasi ?></td>
            </tr>

            <tr>
              <td style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
                Posisi Operasi
              </td>
              <td style="text-align:center; vertical-align:top;">:</td>
              <td style="vertical-align:top;"><?= $laporan_operasi->posisi_operasi ?></td>
            </tr>

            <tr>
              <td style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
                Jenis Pembiusan
              </td>
              <td style="text-align:center; vertical-align:top;">:</td>
              <td style="vertical-align:top;"><?= $laporan_operasi->jenis_pembiusan ?></td>
            </tr>

          </table>

        </td>

        <!-- ================== KOLOM KANAN ================== -->
        <td width="50%" style="padding:6px; vertical-align:top;">

          <table width="100%" style="border-collapse: collapse;">

            <tr>
              <td width="35%" style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
                Jaringan yang diambil
              </td>
              <td width="3%" style="text-align:center; vertical-align:top;">:</td>
              <td style="vertical-align:top;"><?= nl2br($laporan_operasi->jaringan_eksisi) ?></td>
            </tr>

            <tr>
              <td style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
                Jenis Pemeriksaan ke Labor
              </td>
              <td style="text-align:center; vertical-align:top;">:</td>
              <td style="vertical-align:top;"><?= $laporan_operasi->bahan_dikirim_laboratorium ?></td>
            </tr>

            <!-- Jika nanti mau tampilkan transfusi bisa aktifkan ini -->
            <!--
        <tr>
          <td style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
            Transfusi Darah
          </td>
          <td style="text-align:center; vertical-align:top;">:</td>
          <td style="vertical-align:top;"><?= $laporan_operasi->jumlah_transfusi ?></td>
        </tr>
        -->

            <tr>
              <td style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
                Antiseptik
              </td>
              <td style="text-align:center; vertical-align:top;">:</td>
              <td style="vertical-align:top;"><?= $laporan_operasi->antiseptik ?></td>
            </tr>

            <tr>
              <td style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
                Penyulit Operasi
              </td>
              <td style="text-align:center; vertical-align:top;">:</td>
              <td style="vertical-align:top;"><?= $laporan_operasi->penyulit_operasi ?></td>
            </tr>

            <tr>
              <td style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
                Nomor Implan
              </td>
              <td style="text-align:center; vertical-align:top;">:</td>
              <td style="vertical-align:top;"><?= $laporan_operasi->nomor_pendaftaran ?></td>
            </tr>

            <tr>
              <td style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
                Komplikasi
              </td>
              <td style="text-align:center; vertical-align:top;">:</td>
              <td style="vertical-align:top;"><?= $laporan_operasi->komplikasi_operasi ?></td>
            </tr>

            <tr>
              <td style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
                Jumlah Pendarahan
              </td>
              <td style="text-align:center; vertical-align:top;">:</td>
              <td style="vertical-align:top;">
                <?php
                $val_pendarahan = trim($laporan_operasi->jumlah_pendarahan);
                // Tambahkan "CC" jika belum ada dan tidak kosong
                if ($val_pendarahan !== '' && stripos($val_pendarahan, 'cc') === false) {
                  $val_pendarahan .= ' CC';
                }
                echo nl2br($val_pendarahan);
                ?>
              </td>
            </tr>

            <tr>
              <td style="text-align:left; padding-left:4px; padding-right:6px; vertical-align:top;">
                Jumlah Transfusi
              </td>
              <td style="text-align:center; vertical-align:top;">:</td>
              <td style="vertical-align:top;">
                <?php
                $val_transfusi = trim($laporan_operasi->jumlah_transfusi);
                // Tambahkan "CC" jika belum ada dan tidak kosong
                if ($val_transfusi !== '' && stripos($val_transfusi, 'cc') === false) {
                  $val_transfusi .= ' CC';
                }
                echo nl2br($val_transfusi);
                ?>
              </td>
            </tr>


          </table>

        </td>

      </tr>
    </table>

    <table width="100%" class="table2" cellspacing="0"
      style="border-collapse: collapse; border:1px solid black; text-align:center;">

      <tr>
        <td width="25%" class="gariskanan">
          <b>Tanggal Operasi</b><br>
          <?= $laporan_operasi->tanggal_operasi ?>
        </td>

        <td width="25%" class="gariskanan">
          <b>Operasi Dimulai</b><br>
          <?= $laporan_operasi->operasi_dimulai ?>
        </td>

        <td width="25%" class="gariskanan">
          <b>Operasi Selesai</b><br>
          <?= $laporan_operasi->operasi_selesai ?>
        </td>

        <td width="25%">
          <b>Lama Operasi</b><br>
          <?= $laporan_operasi->lama_operasi ?>
        </td>
      </tr>
    </table>

    <table width="100%" class="table2" cellspacing="0" style="border-collapse: collapse; border:1px solid black;">

      <tr>
        <td width="50%" class="gariskanan" style="padding:6px;">
          <b>
            <center>Laporan Operasi :</center>
          </b>
        </td>

        <td width="50%" class="gariskanan" style="padding:6px;">
          <b>
            <center>Gambar :</center>
          </b>
        </td>
      </tr>

      <tr>
        <!-- ISI LAPORAN OPERASI -->
        <td class="gariskanan" style="padding:8px; height:140px; vertical-align:top;">
          <?= nl2br($laporan_operasi->laporan_operasi) ?>
        </td>

        <!-- ISI GAMBAR -->
        <td style="padding:8px; height:220px; vertical-align:top;">
          <!-- area gambar -->
        </td>
      </tr>

    </table>

    <!-- <table width=100% class="table2">
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
    </table> -->

    <!-- <table width="100%" class="table2" cellspacing="0" style="border-collapse: collapse; border:1px solid black;">
      <tr>
        <td style="padding:6px;">
          <table width="100%" style="border-collapse: collapse;">
            <tr style="vertical-align:top;">
              <td width="30%" style="text-align:left; padding-right:6px;">
                Komplikasi
              </td>
              <td width="2%" style="text-align:center; padding-right:6px;">
                :
              </td>
              <td style="text-align:left;">
                <?= nl2br($laporan_operasi->komplikasi_operasi) ?>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <table width="100%" class="table2" cellspacing="0" style="border-collapse: collapse; border:1px solid black;">
      <tr>
        <td style="padding:6px;">
          <table width="100%" style="border-collapse: collapse;">
            <tr style="vertical-align:top;">
              <td width="30%" style="text-align:left; padding-right:6px;">
                Jumlah Perdarahan
              </td>
              <td width="2%" style="text-align:center; padding-right:6px;">
                :
              </td>
              <td style="text-align:left;">
                <?php
                $val_pendarahan = trim($laporan_operasi->jumlah_pendarahan);
                // Jika belum ada "CC", tambahkan
                if (stripos($val_pendarahan, 'cc') === false && $val_pendarahan !== '') {
                  $val_pendarahan .= ' CC';
                }
                echo nl2br($val_pendarahan);
                ?>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <table width="100%" class="table2" cellspacing="0" style="border-collapse: collapse; border:1px solid black;">
      <tr>
        <td style="padding:6px;">
          <table width="100%" style="border-collapse: collapse;">
            <tr style="vertical-align:top;">
              <td width="30%" style="text-align:left; padding-right:6px;">
                Jumlah Transfusi
              </td>
              <td width="2%" style="text-align:center; padding-right:6px;">
                :
              </td>
              <td style="text-align:left;">
                <?php
                $val_transfusi = trim($laporan_operasi->jumlah_transfusi);
                // Jika belum ada "CC", tambahkan
                if (stripos($val_transfusi, 'cc') === false && $val_transfusi !== '') {
                  $val_transfusi .= ' CC';
                }
                echo nl2br($val_transfusi);
                ?>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table> -->

    <?php
    $timestamp = date("Y-m-d H:i:s");
    ?>

    <table width="100%" class="table2" cellspacing="0" style="border-collapse: collapse; margin-top:0;">

<?php
// Ubah format: 30 November 2025 14:32:10
$timestamp_formatted = date("j F Y H:i:s", strtotime($timestamp));
?>
<tr>
  <td style="padding:6px 20px 6px 6px; text-align:right; white-space:nowrap;">
    <?= $timestamp_formatted ?>
  </td>
</tr>

      <tr>
        <td style="padding:6px 20px 6px 200px; text-align:right;">
          <b>Operator</b>
        </td>
      </tr>

      <tr style="height:50px;">
        <td></td>
      </tr>

      <tr>
        <td style="padding:6px 20px 6px 200px; text-align:right;">
          <?= $laporan_operasi->nama_ahli_bedah ?>
        </td>
      </tr>

      <tr>
        <td style="padding:6px 20px 6px 200px; text-align:right;">
          Tanda Tangan & Nama Jelas
        </td>
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
          success: function (data) {
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

    <script>
      window.print();
    </script>


</body>

</html>