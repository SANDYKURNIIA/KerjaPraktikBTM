<<<<<<< HEAD
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">RIWAYAT PEMBELIAN</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>

    

    <div align="right" class="col-md-12 has-error">
        <label for="tanggal_masuk1" class="col-sm-2 control-label">
            <p>&nbsp;</p>
        </label>
    </div>

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <!-- <form id="form-filter" class="form-horizontal"> -->
                <div class="form-group">



         <div class="row mt-30">
            <div class="col-md-12">
                
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-3 mt-20">
                   
                </div>
            
        </div>>



                <!-- <div class="form-group">

        </div> -->

            



            <div class="table-wrap">
                <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="datable">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>HARGA</th>
                                <th>GOLONGAN OBAT</th>
                                <th>PRODUSEN</th>
                                <th>HNA+PPN</th>
                                <th>TIPE</th>
                            </tr>
                        </thead>
                        <tfoot class="bg-success">
                        		<th>NO</th>
                                <th>NAMA</th>
                                <th>HARGA</th>
                                <th>GOLONGAN OBAT</th>
                                <th>PRODUSEN</th>
                                <th>HNA+PPN</th>
                                <th>TIPE</th>
                        </tfoot>
                        <tbody style="color: black">

                            <!--percobaan nampilin data-->



                            <!--end percobaan penampilan data-->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!--data table-->


<!--ajax-->


<script type="text/javascript">
    $(document).ready(function () {


                $('#datable').DataTable({
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
                            "ajax": '<?php echo base_url('PembelianObat/tampil_Riwayat'); ?>',    
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
            });
</script>               



<!--end of ajax-->

=======
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="span span-success">RIWAYAT PEMBELIAN</span></h6>
        </div>



        <div class="clearfix"></div>
    </div>

    

    <div align="right" class="col-md-12 has-error">
        <label for="tanggal_masuk1" class="col-sm-2 control-label">
            <p>&nbsp;</p>
        </label>
    </div>

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <!-- <form id="form-filter" class="form-horizontal"> -->
                <div class="form-group">



         <div class="row mt-30">
            <div class="col-md-12">
                
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="col-md-3 mt-20">
                   
                </div>
            
        </div>>



                <!-- <div class="form-group">

        </div> -->

            



            <div class="table-wrap">
                <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="datable">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>HARGA</th>
                                <th>GOLONGAN OBAT</th>
                                <th>PRODUSEN</th>
                                <th>HNA+PPN</th>
                                <th>TIPE</th>
                            </tr>
                        </thead>
                        <tfoot class="bg-success">
                        		<th>NO</th>
                                <th>NAMA</th>
                                <th>HARGA</th>
                                <th>GOLONGAN OBAT</th>
                                <th>PRODUSEN</th>
                                <th>HNA+PPN</th>
                                <th>TIPE</th>
                        </tfoot>
                        <tbody style="color: black">

                            <!--percobaan nampilin data-->



                            <!--end percobaan penampilan data-->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!--data table-->


<!--ajax-->


<script type="text/javascript">
    $(document).ready(function () {


                $('#datable').DataTable({
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
                            "ajax": '<?php echo base_url('PembelianObat/tampil_Riwayat'); ?>',    
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
            });
</script>               



<!--end of ajax-->

>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
        