<<<<<<< HEAD
<div class="panel panel-default card-view">
  <div class="panel-heading">
   <div class="pull-left">
    <h6 class="panel-title txt-dark"><span class="span span-success">Daftar Pasien Rawat Inap</span></h6>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <a href="javascript:void(0);" class="mr-25" data-toggle="modal" data-target="#modal_edit_data" data-original-title="UBAH"><i class="fa fa-pencil text-success    m-r-10"></i><span class="btn-text"></span></a>

    <div class="table-wrap">
        <div class="table-responsive">
            <table id="datable_1" class="table table-hover display  pb-30">
                <thead>
                    <tr>        
                        <th>NO</th>
                        <th width="10%">AKSI </th>
                        <th>NO RM</th>
                        <th>NAMA PASIEN</th>
                        <th>TANGGAL MASUK</th>
                        <th>JAM MASUK</th>
                        <th>JENIS KELAMIN</th>
                        <th>TANGGAL LAHIR</th>
                        <th>UMUR</th>           
                        <th>CARA MASUK</th>
                        <th>RUANG INAP</th>
                        <th>DPJP</th>
                        <th>CARA BAYAR</th>
                        <th>KETERANGAN</th>
                        <th>NO SEP</th>
                        <th>DIAGNOSA</th>
                        <th>AGAMA</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_pasien_rawat_inap as $d) {
                        ?> 
                        <tr>
                            <td><?php echo $no;  $no++; ?></td>
                            <td>
                                <a href="javascript:void(0);" class="mr-25" data-toggle="modal" onclick="edit_data_kunjungan('<?= $d->id_pelayanan?>', '<?=$d->id_history ?>')" data-original-title="UBAH"><i class="fa fa-pencil text-success    m-r-10"></i><span class="btn-text"></span></a>
                                <a href="javascript:void(0);"class="mr-25" data-toggle="tooltip" data-original-title="HAPUS"><i class="fa fa-close text-danger"></i></a>
                            </td>
                            <td><?php echo sprintf('%06d', $d->no_rm);?></td>
                            <td><?php echo $d->nama;?></td>
                            <td><?php setlocale(LC_ALL, 'id_ID'); 
                            date_default_timezone_set('Asia/Jakarta');
                            $time = strtotime($d->tgl_masuk);
                            $date = strftime("%A, %d %B %Y ", $time);
                            $waktu = strftime("%H:%M", $time);
                            echo  $date   ?></td>
                            <td><?php echo $waktu ." WIB";   ?></td>
                            <td><?php echo $d->jenis_kelamin;   ?></td>
                            <td><?php setlocale(LC_ALL, 'id_ID');
                            date_default_timezone_set('Asia/Jakarta');
                            $time = strtotime($d->tgl_lahir);
                            $date = strftime(" %d %B %Y ", $time);
                            echo $date ?></td>
                            <td><?php $birthDate = $d->tgl_lahir;
                            $date = new DateTime($birthDate); 
                            $now = new DateTime();
                            $interval = $now->diff($date);
                            echo  $interval->y ." Tahun, ".$interval->m." Bulan"; ?></td>            
                            <td><?php echo $d->jenis_pelayanan;?></td>
                            <td><?php echo $d->nama_poli;?></td>
                            <td><?php echo $d->nama_dokter;?></td>
                            <td><?php echo $d->nama_bayar; ?></td>
                            <td><?php echo $d->keterangan;   ?></td>
                            <td><?php echo $d->no_sep;   ?></td>
                            <td><?php echo $d->diagnosa;   ?></td>
                            <td><?php echo $d->agama;   ?></td>
                        </tr>
                        <?php 
                    } ?>

                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- modal edit data -->

<?php
//oke, abg jelasin yaa
//sebelumnya seperti ini ni (yang dibawah)
//ini kan dia cetak modal untuk masing2 data jadinya kek gini. makanya berat.
//kita liat yaa, berapa lama dia nampil.
//oke,ada timing kan.
//coba diubah konsepnya
// wkwkwk, gua matiin recordingnya
// hahaha
// oke, selanjutnya kita ubah dengan cara ajax yaa.
// abg hapus dulu modal yang sebelumnya.
// coba cek modalnya yaa
// oke, background ga transparan kancoba abg update modelnya, dan bakalan jadi seperti ini.
// ini yang lama abg hapus dulu
// oke, ini kan udah abg update ni, coba kita test modalnya yaaa,
// abg oasang tombol test diatas satu
// oke, nice kan perubahannya
// sekarang tinggal ajaxkan kebelakang datanyanya untuk request
// 
// modal udah oke kan, tinggal penyesuaian data. jadi di ajaxkan datanya ke server.
// tujuannya :
// 1. data akan di load data yang terbaru
// kalau pake konsep sebelumnya, data yang di load data saat reload page, sedangkan kalo pake ajax,
// akan load data terbaru.
// cth : user buka halaman ini 5 menit yang lalu, sendangkan ada data yang terupdate 1 menit yang lalu
// data yang terpanggil kan bukan data saat ini
//
// command aja di WA kalau bingung, abg lanjut buat ajaxnya yaa.
// pertama sesuaikan dulu tampilannya
// 
// konsep modal ada 3 place
// 1 modal header, 2 modal body, 3 modal footer
// kita contohin penggunaanya
// 
// oke, kita isi dengan datanya
// 
// 
// udah oke kan modalnya,
// tinggal ajax ke belakang
?>


<!-- sample modal content -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel">Large modal</h5>
            </div>
            <div class="modal-body">
                <h5 class="mb-15">Overflowing text to show scroll behavior</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script type="text/javascript">
    //sampai disini tadi paham kan??
    //baru ni diajaxkan kebelakang
    //
    function edit_data_kunjungan(id_pelayanan,id_history) {
        // alert(id_pelayanan);
        // disini ni buatkan ajaxnya
        // 
        $.ajax({
            url: "<?= base_url().'Pasien/getddata_ranap'?>",
            data: {
                pelayanan :id_pelayanan,
                history :id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                if(data.status_dt=="found"){
                    //disini set datanya ke modal
                    $("#tipe_masuk").val(data.jenis_pelayanan);
                    $("#inTanggalKunjugan").val(data.tgl_masuk);
                    $("#inDPJP").val(data.nama_dokter).change();
                    $("#modal_edit_data").modal('show');
                }else{
                    alert("data tidak ditemukan");
                }
            }
        });
    }
</script>

<div class="modal fade bs-example-modal-lg" id="modal_edit_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT KUNJUNGAN</h5>
            </div>
            <form action="<?php echo base_url().'Pasien_Rawat/Pasien_rawat_jalan' ?>" method="post">
                <div class="modal-body">

                    <div class="form-wrap">
                        <!-- /formbody -->
                        <div class="form-body"> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="help-block"></span>
                                        <label class="control-label col-md-3">TIPE MASUK</label>
                                        <div class="col-md-9 has-success" id="the-basics">
                                            <input type="text" autocomplete="off" class="form-control filled-input" disabled=""  name="tipe_masuk" id="tipe_masuk" >
                                            <span class="help-block"></span> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TANGGAL KUNJUNGAN</label>
                                        <div class="col-md-9 has-error">
                                            <input type="text" class="form-control filled-input" placeholder="TANGGAL"  disabled=""  id="inTanggalKunjugan" name="TanggalKunjugan" >
                                            <span class="help-block"></span> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="help-block"></span>
                            <!-- /Row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA DOKTER (DPJP)</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDPJP" name="namaDPJP">
                                                <?php
                                                foreach ($data_dokter as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->nama; ?>"><?php echo $row->nama; ?></option> 
                                                    <?php 
                                                }  ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!-- /Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">ASAL PASIEN</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2"placeholder="Choose a Category" tabindex="1"  id="inAsalPasien" name="AsalPasien">
                                                <?php
                                                foreach ($data_asal_pasien as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id_asal_pasien; ?>"><?php echo $row->nama_asal; ?></option> 
                                                    <?php 
                                                }  ?>
                                            </select>
                                            <span class="help-block"></span> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">CARA BAYAR</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1"  id="inCaraBayar" name="CaraBayar">
                                                <?php
                                                foreach ($data_cara_bayar as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id_cara_bayar; ?>"><?php echo $row->nama_bayar; ?></option> 
                                                    <?php 
                                                }  ?>

                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="help-block"></span>
                                        <label class="control-label col-md-3">NO SEP / SLIP</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" autocomplete="off" class="form-control filled-input" placeholder="NO SEP" name="NoSEP" id="inNoSEP">
                                            <span class="help-block"></span> 
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="help-block"></span> 
                                        <label class="control-label col-md-3">DIAGNOSA</label>
                                        <div class="col-md-9 has-success" id="the-basics">
                                            <input type="text" class="form-control filled-input" placeholder="Diagnosa" id="inDiagnosa" name="Diagnosa">
                                        </div>
                                        <span class="help-block"></span> 
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="SIMPAN">
                    <button type="button" class="btn btn-danger text-left" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
=======
<div class="panel panel-default card-view">
  <div class="panel-heading">
   <div class="pull-left">
    <h6 class="panel-title txt-dark"><span class="span span-success">Daftar Pasien Rawat Inap</span></h6>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
    <a href="javascript:void(0);" class="mr-25" data-toggle="modal" data-target="#modal_edit_data" data-original-title="UBAH"><i class="fa fa-pencil text-success    m-r-10"></i><span class="btn-text"></span></a>

    <div class="table-wrap">
        <div class="table-responsive">
            <table id="datable_1" class="table table-hover display  pb-30">
                <thead>
                    <tr>        
                        <th>NO</th>
                        <th width="10%">AKSI </th>
                        <th>NO RM</th>
                        <th>NAMA PASIEN</th>
                        <th>TANGGAL MASUK</th>
                        <th>JAM MASUK</th>
                        <th>JENIS KELAMIN</th>
                        <th>TANGGAL LAHIR</th>
                        <th>UMUR</th>           
                        <th>CARA MASUK</th>
                        <th>RUANG INAP</th>
                        <th>DPJP</th>
                        <th>CARA BAYAR</th>
                        <th>KETERANGAN</th>
                        <th>NO SEP</th>
                        <th>DIAGNOSA</th>
                        <th>AGAMA</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_pasien_rawat_inap as $d) {
                        ?> 
                        <tr>
                            <td><?php echo $no;  $no++; ?></td>
                            <td>
                                <a href="javascript:void(0);" class="mr-25" data-toggle="modal" onclick="edit_data_kunjungan('<?= $d->id_pelayanan?>', '<?=$d->id_history ?>')" data-original-title="UBAH"><i class="fa fa-pencil text-success    m-r-10"></i><span class="btn-text"></span></a>
                                <a href="javascript:void(0);"class="mr-25" data-toggle="tooltip" data-original-title="HAPUS"><i class="fa fa-close text-danger"></i></a>
                            </td>
                            <td><?php echo sprintf('%06d', $d->no_rm);?></td>
                            <td><?php echo $d->nama;?></td>
                            <td><?php setlocale(LC_ALL, 'id_ID'); 
                            date_default_timezone_set('Asia/Jakarta');
                            $time = strtotime($d->tgl_masuk);
                            $date = strftime("%A, %d %B %Y ", $time);
                            $waktu = strftime("%H:%M", $time);
                            echo  $date   ?></td>
                            <td><?php echo $waktu ." WIB";   ?></td>
                            <td><?php echo $d->jenis_kelamin;   ?></td>
                            <td><?php setlocale(LC_ALL, 'id_ID');
                            date_default_timezone_set('Asia/Jakarta');
                            $time = strtotime($d->tgl_lahir);
                            $date = strftime(" %d %B %Y ", $time);
                            echo $date ?></td>
                            <td><?php $birthDate = $d->tgl_lahir;
                            $date = new DateTime($birthDate); 
                            $now = new DateTime();
                            $interval = $now->diff($date);
                            echo  $interval->y ." Tahun, ".$interval->m." Bulan"; ?></td>            
                            <td><?php echo $d->jenis_pelayanan;?></td>
                            <td><?php echo $d->nama_poli;?></td>
                            <td><?php echo $d->nama_dokter;?></td>
                            <td><?php echo $d->nama_bayar; ?></td>
                            <td><?php echo $d->keterangan;   ?></td>
                            <td><?php echo $d->no_sep;   ?></td>
                            <td><?php echo $d->diagnosa;   ?></td>
                            <td><?php echo $d->agama;   ?></td>
                        </tr>
                        <?php 
                    } ?>

                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- modal edit data -->

<?php
//oke, abg jelasin yaa
//sebelumnya seperti ini ni (yang dibawah)
//ini kan dia cetak modal untuk masing2 data jadinya kek gini. makanya berat.
//kita liat yaa, berapa lama dia nampil.
//oke,ada timing kan.
//coba diubah konsepnya
// wkwkwk, gua matiin recordingnya
// hahaha
// oke, selanjutnya kita ubah dengan cara ajax yaa.
// abg hapus dulu modal yang sebelumnya.
// coba cek modalnya yaa
// oke, background ga transparan kancoba abg update modelnya, dan bakalan jadi seperti ini.
// ini yang lama abg hapus dulu
// oke, ini kan udah abg update ni, coba kita test modalnya yaaa,
// abg oasang tombol test diatas satu
// oke, nice kan perubahannya
// sekarang tinggal ajaxkan kebelakang datanyanya untuk request
// 
// modal udah oke kan, tinggal penyesuaian data. jadi di ajaxkan datanya ke server.
// tujuannya :
// 1. data akan di load data yang terbaru
// kalau pake konsep sebelumnya, data yang di load data saat reload page, sedangkan kalo pake ajax,
// akan load data terbaru.
// cth : user buka halaman ini 5 menit yang lalu, sendangkan ada data yang terupdate 1 menit yang lalu
// data yang terpanggil kan bukan data saat ini
//
// command aja di WA kalau bingung, abg lanjut buat ajaxnya yaa.
// pertama sesuaikan dulu tampilannya
// 
// konsep modal ada 3 place
// 1 modal header, 2 modal body, 3 modal footer
// kita contohin penggunaanya
// 
// oke, kita isi dengan datanya
// 
// 
// udah oke kan modalnya,
// tinggal ajax ke belakang
?>


<!-- sample modal content -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel">Large modal</h5>
            </div>
            <div class="modal-body">
                <h5 class="mb-15">Overflowing text to show scroll behavior</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script type="text/javascript">
    //sampai disini tadi paham kan??
    //baru ni diajaxkan kebelakang
    //
    function edit_data_kunjungan(id_pelayanan,id_history) {
        // alert(id_pelayanan);
        // disini ni buatkan ajaxnya
        // 
        $.ajax({
            url: "<?= base_url().'Pasien/getddata_ranap'?>",
            data: {
                pelayanan :id_pelayanan,
                history :id_history
            },
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                if(data.status_dt=="found"){
                    //disini set datanya ke modal
                    $("#tipe_masuk").val(data.jenis_pelayanan);
                    $("#inTanggalKunjugan").val(data.tgl_masuk);
                    $("#inDPJP").val(data.nama_dokter).change();
                    $("#modal_edit_data").modal('show');
                }else{
                    alert("data tidak ditemukan");
                }
            }
        });
    }
</script>

<div class="modal fade bs-example-modal-lg" id="modal_edit_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> EDIT KUNJUNGAN</h5>
            </div>
            <form action="<?php echo base_url().'Pasien_Rawat/Pasien_rawat_jalan' ?>" method="post">
                <div class="modal-body">

                    <div class="form-wrap">
                        <!-- /formbody -->
                        <div class="form-body"> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="help-block"></span>
                                        <label class="control-label col-md-3">TIPE MASUK</label>
                                        <div class="col-md-9 has-success" id="the-basics">
                                            <input type="text" autocomplete="off" class="form-control filled-input" disabled=""  name="tipe_masuk" id="tipe_masuk" >
                                            <span class="help-block"></span> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">TANGGAL KUNJUNGAN</label>
                                        <div class="col-md-9 has-error">
                                            <input type="text" class="form-control filled-input" placeholder="TANGGAL"  disabled=""  id="inTanggalKunjugan" name="TanggalKunjugan" >
                                            <span class="help-block"></span> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="help-block"></span>
                            <!-- /Row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">NAMA DOKTER (DPJP)</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1" id="inDPJP" name="namaDPJP">
                                                <?php
                                                foreach ($data_dokter as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->nama; ?>"><?php echo $row->nama; ?></option> 
                                                    <?php 
                                                }  ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!-- /Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">ASAL PASIEN</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2"placeholder="Choose a Category" tabindex="1"  id="inAsalPasien" name="AsalPasien">
                                                <?php
                                                foreach ($data_asal_pasien as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id_asal_pasien; ?>"><?php echo $row->nama_asal; ?></option> 
                                                    <?php 
                                                }  ?>
                                            </select>
                                            <span class="help-block"></span> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">CARA BAYAR</label>
                                        <div class="col-md-9 has-success">
                                            <select class="form-control filled-input select2" placeholder="Choose a Category" tabindex="1"  id="inCaraBayar" name="CaraBayar">
                                                <?php
                                                foreach ($data_cara_bayar as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id_cara_bayar; ?>"><?php echo $row->nama_bayar; ?></option> 
                                                    <?php 
                                                }  ?>

                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="help-block"></span>
                                        <label class="control-label col-md-3">NO SEP / SLIP</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" autocomplete="off" class="form-control filled-input" placeholder="NO SEP" name="NoSEP" id="inNoSEP">
                                            <span class="help-block"></span> 
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="help-block"></span> 
                                        <label class="control-label col-md-3">DIAGNOSA</label>
                                        <div class="col-md-9 has-success" id="the-basics">
                                            <input type="text" class="form-control filled-input" placeholder="Diagnosa" id="inDiagnosa" name="Diagnosa">
                                        </div>
                                        <span class="help-block"></span> 
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="SIMPAN">
                    <button type="button" class="btn btn-danger text-left" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
