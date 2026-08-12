<<<<<<< HEAD
<body onload="myFunction()">
  <div class="panel panel-default card-view">
    <div class="panel-heading">
      <center>PENEMPATAN PESANAN</center>
      <p></p>
      <br>
      <table>
        <tr>

          <td width="40%"> <a><img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" alt="logo" width="30%" /></a> <a><img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" alt="logoa" width="60%" /></a></td>
          <td width="60%">
            <?php foreach ($cetak_po as $row) { ?>
              <table class="header">
                <tr>
                  <td> <?php echo "NO DOKUMEN   "; ?></td>
                  <td> <?php echo ": " . $row['no_dokumen']; ?></td>
                </tr>

                <tr>

                  <td> <?php echo "TANGGAL FAKTUR   ";  ?></td>
                  <td> <?php echo   ": " . $row["tgl_faktur"];   ?></td>
                </tr>

                <tr>
                  <td> <?php echo "VENDOR   "   ?></td>
                  <td> <?php echo ": " . $row["id_vendor"];  ?></td>

                </tr>
              </table>
            <?php } ?>
          </td>
        </tr>


      </table>

      <table cellpadding="10" border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;font-size:13px;">
        <tr>
          <th width=5%>NO</th>
          <th width=20%>NAMA BARANG</th>
          <th width=10%>SATUAN</th>
          <th width=5%>DISKON</th>
          <th width=5%>BANYAKNYA</th>
          <th width=10%>HARGA</th>
          <th width=10%>TOTAL</th>
        </tr>
        <?php
        $subtotal = 0;
        $nomor = 1;
        $ppn = 11;
        foreach ($cetak_po2 as $row) { ?>
          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo "Produsen: " . $row["produsen"];
                echo "<br>";
                echo $row["item"]; ?></td>
            <td><?php echo $row['tipe']; ?></td>
            <td><?php echo $row['disc']; ?></td>
            <td><?php echo $row["jumlah"]; ?></td>
            <td><?php $satuan = $row['diskon'] * $row['harga'];
                echo "Rp " . number_format($row['harga'], 0, ',', '.'); ?></td>
            <td><?php $totalsem = $row['jumlah'] * $satuan;
                echo "Rp " . number_format($totalsem, 0, ',', '.');  ?></td>
          </tr>
        <?php

          $subtotal += ($totalsem);
          $nomor++;
        }
        ?>


        <tr align="right">
          <td colspan="6">SUB TOTAL</td>
          <td><?php
              echo number_format($subtotal, 2, ',', '.') ?></td>
        </tr>

        <tr align="right">
          <td colspan="6">PPN</td>
          <td><?php $jppn = $ppn / 100;
              $jum2 = $subtotal * $jppn;
              echo number_format($jum2, 2, ',', '.'); ?></td>
          <!-- td><?php echo number_format(0, 2, ',', '.'); ?></td> -->
        </tr>



        <tr align="right">
          <td colspan="6">TOTAL </td>
          <td><?php $tot = $subtotal + $jum2;
              echo number_format($tot, 2, ',', '.') ?></td>
        </tr>



      </table>
      <table>
        <tr>
          <td height="20px"></td>
        </tr>
        <tr>
          <td>Terbilang :</td>
        </tr>
        <tr>
          <td align="right" style="font-style: italic;"><?php echo Terbilang($tot) . " Rupiah"; ?></td>
        </tr>
      </table>
      <hr>
      <table class="header">
        <tr>

          <td> <?php echo "NB : ";  ?></td>
          <!-- <td> <?php echo   ": "  ?></td> -->
        </tr>
        <tr>
          <td> <?php echo "1. Jika terjadi penglockan dan pesanan tidak tersedia / stok kosong harap di informasikan secepatnya ke logistik farmasi Rumah Sakit Bakti Timah. "; ?></td>
        </tr>

        <tr>

          <td> <?php echo "2. Minimal kadaluarsa obat 2 tahun dari PO yang diterbitkan (mohon dikonfirmasikan ke logistik farmasi Rumah Sakit Bakti Timah)   ";  ?></td>

        </tr>
      </table>


      <table class="header">
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>


        <tr>
          <?php foreach ($cetak_po as $row) { ?>

            <td> <?php echo "Pangkal Pinang,   " .  $row['tgl_faktur'];
                } ?></td>
            <td> </td>

        </tr>
      </table>
      <table class="header">
        <tr>
          <td> <?php echo "Chief. Instalasi farmasi   ";  ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td> <?php echo "Diketahui,   ";  ?></td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
      </table>
      <table>
        <tr>
          <td> <?php echo "Ursula, S.Si, Apt   ";  ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <!-- <td></td> -->
          <td> <?php echo "dr. R.Agus Subarkah, Sp.Rad   ";  ?></td>
        </tr>

        <tr>
          <td> <?php echo "No : 015/SIPA/DPMPTSP/V/2025";  ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <!-- <td></td> -->
          <td> <?php echo "Direktur   ";  ?></td>
        </tr>
      </table>
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
<body onload="myFunction()">
  <div class="panel panel-default card-view">
    <div class="panel-heading">
      <center>PENEMPATAN PESANAN</center>
      <p></p>
      <br>
      <table>
        <tr>

          <td width="40%"> <a><img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" alt="logo" width="30%" /></a> <a><img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" alt="logoa" width="60%" /></a></td>
          <td width="60%">
            <?php foreach ($cetak_po as $row) { ?>
              <table class="header">
                <tr>
                  <td> <?php echo "NO DOKUMEN   "; ?></td>
                  <td> <?php echo ": " . $row['no_dokumen']; ?></td>
                </tr>

                <tr>

                  <td> <?php echo "TANGGAL FAKTUR   ";  ?></td>
                  <td> <?php echo   ": " . $row["tgl_faktur"];   ?></td>
                </tr>

                <tr>
                  <td> <?php echo "VENDOR   "   ?></td>
                  <td> <?php echo ": " . $row["id_vendor"];  ?></td>

                </tr>
              </table>
            <?php } ?>
          </td>
        </tr>


      </table>

      <table cellpadding="10" border="1" style="border-collapse: collapse; width: 100%; border: 1px solid black;font-size:13px;">
        <tr>
          <th width=5%>NO</th>
          <th width=20%>NAMA BARANG</th>
          <th width=10%>SATUAN</th>
          <th width=5%>DISKON</th>
          <th width=5%>BANYAKNYA</th>
          <th width=10%>HARGA</th>
          <th width=10%>TOTAL</th>
        </tr>
        <?php
        $subtotal = 0;
        $nomor = 1;
        $ppn = 11;
        foreach ($cetak_po2 as $row) { ?>
          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo "Produsen: " . $row["produsen"];
                echo "<br>";
                echo $row["item"]; ?></td>
            <td><?php echo $row['tipe']; ?></td>
            <td><?php echo $row['disc']; ?></td>
            <td><?php echo $row["jumlah"]; ?></td>
            <td><?php $satuan = $row['diskon'] * $row['harga'];
                echo "Rp " . number_format($row['harga'], 0, ',', '.'); ?></td>
            <td><?php $totalsem = $row['jumlah'] * $satuan;
                echo "Rp " . number_format($totalsem, 0, ',', '.');  ?></td>
          </tr>
        <?php

          $subtotal += ($totalsem);
          $nomor++;
        }
        ?>


        <tr align="right">
          <td colspan="6">SUB TOTAL</td>
          <td><?php
              echo number_format($subtotal, 2, ',', '.') ?></td>
        </tr>

        <tr align="right">
          <td colspan="6">PPN</td>
          <td><?php $jppn = $ppn / 100;
              $jum2 = $subtotal * $jppn;
              echo number_format($jum2, 2, ',', '.'); ?></td>
          <!-- td><?php echo number_format(0, 2, ',', '.'); ?></td> -->
        </tr>



        <tr align="right">
          <td colspan="6">TOTAL </td>
          <td><?php $tot = $subtotal + $jum2;
              echo number_format($tot, 2, ',', '.') ?></td>
        </tr>



      </table>
      <table>
        <tr>
          <td height="20px"></td>
        </tr>
        <tr>
          <td>Terbilang :</td>
        </tr>
        <tr>
          <td align="right" style="font-style: italic;"><?php echo Terbilang($tot) . " Rupiah"; ?></td>
        </tr>
      </table>
      <hr>
      <table class="header">
        <tr>

          <td> <?php echo "NB : ";  ?></td>
          <!-- <td> <?php echo   ": "  ?></td> -->
        </tr>
        <tr>
          <td> <?php echo "1. Jika terjadi penglockan dan pesanan tidak tersedia / stok kosong harap di informasikan secepatnya ke logistik farmasi Rumah Sakit Bakti Timah. "; ?></td>
        </tr>

        <tr>

          <td> <?php echo "2. Minimal kadaluarsa obat 2 tahun dari PO yang diterbitkan (mohon dikonfirmasikan ke logistik farmasi Rumah Sakit Bakti Timah)   ";  ?></td>

        </tr>
      </table>


      <table class="header">
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>


        <tr>
          <?php foreach ($cetak_po as $row) { ?>

            <td> <?php echo "Pangkal Pinang,   " .  $row['tgl_faktur'];
                } ?></td>
            <td> </td>

        </tr>
      </table>
      <table class="header">
        <tr>
          <td> <?php echo "Chief. Instalasi farmasi   ";  ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td> <?php echo "Diketahui,   ";  ?></td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
      </table>
      <table>
        <tr>
          <td> <?php echo "Ursula, S.Si, Apt   ";  ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <!-- <td></td> -->
          <td> <?php echo "dr. R.Agus Subarkah, Sp.Rad   ";  ?></td>
        </tr>

        <tr>
          <td> <?php echo "No : 015/SIPA/DPMPTSP/V/2025";  ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <!-- <td></td> -->
          <td> <?php echo "Direktur   ";  ?></td>
        </tr>
      </table>
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
