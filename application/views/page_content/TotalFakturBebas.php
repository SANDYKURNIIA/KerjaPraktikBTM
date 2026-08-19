<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">TOTAL FAKTUR LOGISTIK FARMASI</span></h6>
        </div>

         <div class="clearfix"></div>
    </div>

    <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm" onclick="tampilHariIni();"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span>
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" autocomplete="off" id="inTglMulai" class="form-control" >
                </div>
                <div class="col-md-3">
                <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" autocomplete="off" id="inTglAkhir" class="form-control" >
                </div>
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1" onclick="tampilRangePo();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                </div>
            </div>
        </div>    
        
    <!--button-->


    <!--button-->

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="datable">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>PILIH</th>
                                <th>HAPUS</th>
                                <th>TANGGAL INPUT</th>
                                <th>JAM INPUT</th>
                                <th>ID FAKTUR</th>
                                <th>ONGKOS KIRIM</th>
                                <th>DISKON</th>
                                <th>PPN</th>
                                <th>TOTAL</th>
                                <th> GAMBAR </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>PILIH</th>
                                <th>HAPUS</th>
                                <th>TANGGAL INPUT</th>
                                <th>JAM INPUT</th>
                                <th>ID FAKTUR</th>
                                <th>ONGKOS KIRIM</th>
                                <th>DISKON</th>
                                <th>PPN</th>
                                <th>TOTAL</th>
                                <th>GAMBAR</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Datatables -->

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modalUpdateTotal" role="dialog" aria-labelledby="myLargeModalLabell" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabell"><i class="icon-user mr-10"></i>UPDATE DETAIL TAMBAHAN
                        </h5>
                    </div>
                  
                    <div class="modal-body">
                        <!-- <form action="#" id="formUpload"> -->

                        <!-- /formbody -->
                        <div class="row">
                             
                        <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">INFO TOTAL HARGA</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group "> -->
                                   <!--  <label class="control-label col-md-3">ID FAKTUR</label>
                                    <div class="col-md-9 has-success"> -->
                                        <input type="hidden" class="form-control " autocomplete="off"  name="id_faktur" id="id_faktur">
                                       <!--  <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">ID TOTAL</label>
                                    <div class="col-md-9 has-success"> -->
                                        <input type="hidden" class="form-control " autocomplete="off" name="id_total" id="id_total">
                                        <input type="hidden" class="form-control " autocomplete="off"  name="nofaktur" id="nofaktur">
                                      <!--   <span class="help-block"></span>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">ONGKOS KIRIM</label>
                                    <div class="col-md-9 has-success">
                                        <input type="number" class="form-control " autocomplete="off" placeholder="ONGKOS KIRIM" name="OngkosKirim" id="OngkosKirim">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">PPN</label>
                                    <div class="col-md-9 has-success">
                                        <input type="number" class="form-control " autocomplete="off" placeholder="PPN" name="PpnKeseluruhan" id="PpnKeseluruhan" >
                                        <span class="help-block"></span>  
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">DISKON</label>
                                    <div class="col-md-9 has-success">
                                        <input type="number" class="form-control " autocomplete="off" placeholder="DISKON" name="DiscKeselurahan" id="DiscKeselurahan">
                                        <span class="help-block"></span>
                                        <div type="submit" class="btn btn-success" onclick="tampil_harga_detail_tambahan()">TAMPILKAN HARGA</div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                        <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">PREVIEW HARGA</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">HARGA BARANG</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" autocomplete="off" value="0" class="form-control " placeholder="HNA" name="outHnaTotal" id="outHnaTotal">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                             <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">HARGA BARANG (Rp)</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " name="outHargaLamaTotal" id="outHargaLamaTotal" value="0" disabled="">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">HARGA TOTAL</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" autocomplete="off" class="form-control " name="outHargaTotal" id="outHargaTotal" value="0" >
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->

                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">DISKON</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" value="0" class="form-control " name="outDiskonTotal" id="outDiskonTotal" disabled="">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">ONGKOS KIRIM</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" value="0" class="form-control " name="outOngkirTotal" id="outOngkirTotal" disabled="">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">PPN</label>
                                    <div class="col-md-9 has-error">
                                        <input type="number" value="0" class="form-control " disabled="" name="outPpnTotal" id="outPpnTotal">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">HARGA TOTAL (Rp)</label>
                                    <div class="col-md-9 has-error">
                                        <input type="text" class="form-control " disabled="" name="outTotalKeseluruhan" id="outTotalKeseluruhan">
                                        <span class="help-block"></span>
                                        <br>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                            <button id="btnUpload" onclick="update_total_detail()" class="btn btn-success btn-anim btn-sm" type="submit"><i class="icon-rocket"></i><span class="btn-text">UPDATE DETAIL TAMBAHAN</span></button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                        </div>
                    </form>
                        
                        
                        <!--/span-->
                        
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /formbody -->
        </div>
    </div>

</div>

<style>
    td {
        color: black;
    }
</style>

<script type="text/javascript">
    // function cetak() {
    //     id_struk = $('#idStruk').val();
    //     window.location.href = '<?= base_url()?>logistik_umum/print_logum/' + id_struk;
    // }

    function update_total(id_total, id_faktur, no_faktur, ppn, diskon, ongkir, total, total_keseluruhan)
    {
        $("#id_total").val(id_total);
        $("#id_faktur").val(id_faktur);
        $("#nofaktur").val(nofaktur);
        $("#outHargaLamaTotal").val(convertToRupiah(total));
        total = $("#outHnaTotal").val(total);
        $("#outTotalKeseluruhan").val(convertToRupiah(total_keseluruhan));
        total_keseluruhan = $("#outHargaTotal").val(total_keseluruhan);
        $("#DiscKeselurahan").val(diskon);
        $("#PpnKeseluruhan").val(ppn);
        $("#OngkosKirim").val(ongkir);
        $("#outDiskonTotal").val(diskon);
        $("#outOngkirTotal").val(ongkir);
        $("#outPpnTotal").val(ppn);
        $("#modalUpdateTotal").modal('show');
    }    

    function tampil_harga_detail_tambahan(){
        ppn = parseFloat($("#PpnKeseluruhan").val());
        diskon = parseFloat($("#DiscKeselurahan").val());
        ongkir = parseFloat($("#OngkosKirim").val());
        $("#outPpnTotal").val(ppn);
        $("#outDiskonTotal").val(diskon);
        $("#outOngkirTotal").val(ongkir);
        totalAwal = parseFloat($("#outHnaTotal").val());
        totalpajak = totalAwal * (ppn / 100);
        totalKeseluruhan = totalAwal + totalpajak + ongkir - diskon;

        $("#outTotalKeseluruhan").val(convertToRupiah(totalKeseluruhan));
        $("#outHargaTotal").val(totalKeseluruhan);
        $("#outHnaTotal").val(totalAwal);
        $("#OngkosKirim").val(ongkir);
    }

     function update_total_detail(){
        id_faktur = $('#id_faktur').val();
        id_total = $('#id_total').val();
        nofaktur = $('#nototal').val();
        ongkir = $('#OngkosKirim').val();
        diskon = $('#DiscKeselurahan').val();
        ppn = $('#PpnKeseluruhan').val();
        total = $('#outHnaTotal').val();
        total_keseluruhan = $('#outHargaTotal').val();

        $().ready(function() {
            $.ajax({
                url: "<?php echo base_url() ?>Pembelian_obat/update_total",
                method: "POST",
                dataType: 'json',
                data: {
                    id_faktur: id_faktur,
                    id_total: id_total,
                    nofaktur: nofaktur,
                    ongkir: ongkir,
                    ppn: ppn,
                    diskon: diskon,
                    total: total,
                    total_keseluruhan: total_keseluruhan,
                },
                success: function(data) {
                    if (data.status == "success") {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: " Berhasil di update",
                            confirmButtonColor: "#3cb878",
                        });
                        $('#datable').DataTable().ajax.reload();
                        $('#isiFaktur').DataTable().ajax.reload();
                    } else {
                        swal({
                            title: "Gagal!",
                            type: "warning",
                            text: data.status,
                            confirmButtonColor: "#3cb878",
                        });
                    }
                }

            });
        });
        return false;
    }

    

    

    function convertToRupiah(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }


    function delete_total(id_total, id_faktur, no_faktur) {
        swal({
            title: "Apakah kamu yakin?",
            text: "Menghapus data " + id_total + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Pembelian_obat/delete_total",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id_total: id_total,
                        id_faktur: id_faktur,
                        no_faktur: no_faktur,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#datable').DataTable().ajax.reload();
                        } else {
                            swal({
                                title: "Gagal!",
                                type: "warning",
                                text: data.status,
                                confirmButtonColor: "#3cb878",
                            });
                        }
                    }
                });
            });

        });
        return false;
    }

    
</script>
<!--  -->

<!--tampil data-->

<script type="text/javascript">
    $(document).ready(function() {

        table = $('#datable').DataTable({
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entries",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },
            },
            "ajax": {
                "url": "<?php echo base_url('Pembelian_obat_bebas/tampil_total'); ?>",
                "type": "POST",
                "data": function(data) {



                }
            },
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
        });
    });
    // Make to collapse hidden
    $('.data_hide').addClass('collapse');
    $('#btn-filter').click(function() { //button filter event click
        table.ajax.reload(); //just reload table
    });
    $('#btn-reset').click(function() { //button reset event click
        $('#form-filter')[0].reset();
        $("#btn-filter").attr("disabled", false);
        table.ajax.reload(); //just reload table
    });

    function tampilHariIni(){
                $('#datable').DataTable().destroy();
                $('#datable').DataTable({
                            "retrieve": true,
                            "language": {
                            "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
                            "sProcessing":   "Sedang memproses...",
                            "sLengthMenu":   "Tampilkan _MENU_ entri",
                            "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                            "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                            "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                            "sInfoPostFix":  "",
                            "sSearch":  "Pencarian :",
                            "sUrl":          "",
                            "oPaginate": {
                            "sFirst":    "Pertama",
                            "sPrevious": "Sebelumnya",
                            "sNext":     "Selanjutnya",
                            "sLast":     "Terakhir"
                            },
                        },      
                            "ajax": '<?php echo base_url('Pembelian_obat/tampil_total'); ?>',    
                            "deferRender": true,
                            "processing": true,
                            "order": [], 
                            "columnDefs": [
                            { 
                            "targets": [ 0 ], 
                            "orderable": false, 
                            },
                        ],
                });
            }

            function tampilRangePo(mulai,akhir){
                $('#datable').DataTable().destroy();
                mulai = $("#inTglMulai").val();
                akhir = $("#inTglAkhir").val();
                $('#datable').DataTable({
                        "retrieve": true,
                        "language": {
                        "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
                        "sProcessing":   "Sedang memproses...",
                        "sLengthMenu":   "Tampilkan _MENU_ entri",
                        "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                        "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix":  "",
                        "sSearch":  "Pencarian :",
                        "sUrl":          "",
                        "oPaginate": {
                        "sFirst":    "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext":     "Selanjutnya",
                        "sLast":     "Terakhir"
                        },
                    },
                    "ajax": {
                        "url": '<?= base_url('Pembelian_obat/tampil_total_range'); ?>',
                        "type": 'POST',
                        "data": {
                            mulai:mulai,
                            akhir:akhir
                        },
                    },
                    "deferRender": true,
                    "processing": true,
                    "order": [],
                    "columnDefs": [{
                        "targets": [0],
                        "orderable": false,
                    }, ],
                });
            }
</script>

<!--end tampil data-->