<!-- <style>
.kolom {
	-webkit-column-count: 2; /* Chrome, Safari, Opera */
	-moz-column-count: 2; /* Firefox */
	column-count: 2;
	-moz-column-fill: auto;
	column-fill: auto; 
 
}
</style> -->
<style>
  .garis {
    font-size: 13px;
    border: 1px solid black;
    border-collapse: collapse;
  }

  .header {
    font-size: 12px;
  }

  .garis td,
  .garis th {

    border: 1px solid black;
    padding-left: 5px;
    padding-right: 5px;
    padding-bottom: 3px;
  }

  .nogaris td {

    border-top: 1pt solid black;
    border-bottom: 0;
    border-right: 0;
    border-left: 0;
  }

  .nogariss td {

    border: 0;
  }

  tr.noBorder td {
    border-top: 0;
    border-bottom: 0;
    border-right: 1pt solid black;
    border-left: 1pt solid black;
  }

  tr.garis1 td {
    border-top: 1pt solid black;
    border-bottom: 0;
    border-right: 0;
    border-left: 0;
  }
</style>

<div class="col-md-12  " id="areaPrint">
  <div class="panel panel-default card-view">
    <div class="panel-heading">
      <table>
        <tr>

          <td width="40%"> <a><img src="<?= base_url('assets/dist/img/rsbt_ihc.png'); ?>" alt="logo" width="40%" /></a> <a><img src="<?= base_url('assets/dist/img/alamat.jpg'); ?>" alt="logoa" width="50%" /></a></td>
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

      <div>
        <div>
          <div>
            <br>
            <div>
              <!-- 																	<h4  >DETAIL FAKTUR</h4> -->
              <div class="kolom">



                <!-- <div class="panel-wrapper collapse in"> -->
                <!-- <div class="panel-body"> -->
                <!-- <div class="table-wrap"> -->
                <!-- <div class="table-responsive"> -->

                <table class="garis">
                  <thead>
                    <tr>
                      <th>NAMA BARANG</th>
                      <th>SATUAN</th>
                      <th>BANYAK NYA</th>
                      <th>HARGA</th>
                      <th>TOTAL</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $subtotal = 0;
                    foreach ($cetak_po2 as $key) { ?>

                      <tr>
                        <td width="40%"><?php
                                        echo "Produsen: " . $key["produsen"];
                                        echo "<br>";
                                        echo $key["item"]; ?></td>
                        <td><?php echo $key["tipe"]; ?></td>
                        <td><?php echo $key["jumlah"] * $key["diskon"]; ?></td>
                        <td width="20%"><?php $satuan = $key['jumlah'] * $key['harga'];
                                        echo "Rp " . number_format($key['harga'], 0, ',', '.');   ?></td>
                        <td width="20%"><?php $totalsem = $key['diskon'] * $satuan;
                                        echo "Rp " . number_format($totalsem, 0, ',', '.');   ?></td> <?php $subtotal += ($totalsem);
                                                                                                    } ?>
                      </tr>

                      <tr class="noBorder">



                        <td colspan="4">Total</td>
                        <td><?php echo "Rp " . number_format($subtotal, 0, ',', '.');   ?></td>
                      </tr>
                      <tr class="noBorder">



                        <td colspan="4">Total</td>
                        <td><?php echo "Rp " . number_format($subtotal, 0, ',', '.');   ?></td>
                      </tr>

                  </tbody>
                </table>
              </div>

              <div>
                <!-- 																				<h4   >PETUGAS KASIR</h4>
																			  -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <table class="header">
    <tr>

      <td> <?php echo "NB : ";  ?></td>
      <!-- <td> <?php echo   ": "  ?></td> -->
    </tr>
    <tr>
      <td> <?php echo "1. Jika terjadi penglockan dan pesanan tidak tersedia / stok kosong harap di informasikan secepatnya ke logistik farmasi Rumah Sakit Bakti Timah. "; ?></td>
    </tr>

    <tr>

      <td> <?php echo "2. Mohon mengkonfirmasi, jika sediaan obat dan BMHP yang exp nya di bawah 2 tahun.   ";  ?></td>

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

        <td> <?php echo "Pangkal Pinang   " .  $row['tgl_faktur'];
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
      <!-- <td > <?php echo "Diketahui,   ";  ?></td> -->
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
      <td> <?php echo "Ursula, Apt   ";  ?></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <!-- <td > <?php echo "Yulia Nurmalasari, S.E   ";  ?></td> -->
    </tr>

    <tr>
      <td> <?php echo "NOMOR : ";  ?></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <!-- <td > <?php echo "Kabid Keuangan   ";  ?></td> -->
    </tr>
  </table>


</div>
<script type="text/javascript">
  //                          
  //  window.onload = function () { 
  //   window.print();

  // window.close(); 
  //         }

  window.print();




  window.onafterprint = function(e) {
    closePrintView();
  };



  function closePrintView() {
    window.location.href = 'javascript:history.go(-1)';
  }
</script>
</div>