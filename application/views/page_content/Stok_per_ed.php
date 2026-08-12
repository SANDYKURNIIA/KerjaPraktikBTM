<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default card-view">
									<div class="panel-heading">
										<div class="pull-left">
											<h6 class="panel-title txt-dark">STOK PER ED</h6>
										</div>
    <div class="row">
    
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            



            <div class="table-wrap">
                <!-- <p id="notif_load" style="color:red;">Loading data, Please wait</p> -->

                <div class="table-responsive">
                    <table class="table table-hover display  pb-30" id="datable">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
								<th>NAMA OBAT</th> 
								<th>HARGA</th> 
								<th>TANGGAL EXPIRED</th>
								<th>GOLONGAN OBAT</th> 
								<th>PRODUSEN</th> 
								<th>SISA STOK</th>   
								<th>TIPE</th>   
                            </tr>
                        </thead>

                        <tbody style="color: black">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Datatables -->



<!--tampil data-->

<script type="text/javascript">
        $(document).ready(function() {

            $('#datable').DataTable({
                "language": {
                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing": "Sedang memproses...",
                    "sLengthMenu": "Tampilkan _MENU_ entri",
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
                "ajax": '<?php echo base_url('Stok_per_ed/tampil_stok_obat'); ?>',
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

        
    </script>

<!--end tampil data-->