<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">JURNAL MATERIAL</span></h6>
        </div>
        <div class="clearfix"></div>
        <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-5">
                    <label class="mt-0 txt-dark">PERIODE : </label>
                    <input type="month" autocomplete="off" id="inBulan" class="form-control">
                </div>
                <div class="col-md-7 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1 mr-10" onclick="tampilRangePermit();"><i class="icon-rocket"></i><span class="btn-text">PILIH</span>
                    <button class="btn btn-info btn-anim btn-sm1" onclick="setJurnal();"><i class="icon-rocket"></i><span class="btn-text">SIMPAN JURNAL</span>

                </div>
                
            </div>
        </div>

    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <div class="row mt-30 pull-right">
                        <div class="col-md-12 ">


                        </div>
                    </div>
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>KODE AKUN</th>
                                <th>DESKRIPSI</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    td {
        color: black;
    }
</style>

<script type="text/javascript">
    function setJurnal() {
        periode = $('#inBulan').val();
        var teks = "Melakukan jurnal pada bulan " + bulan_date_js(new Date(periode + '-01')) + " ?";

        swal({
            title: "Apakah kamu yakin?",
            text: teks,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            showLoaderOnConfirm: true,
            closeOnConfirm: false
        }, function() {
            $().ready(function() {

                $.ajax({
                    url: "<?= base_url() . 'Jurnal_Biaya_farmasi/setJurnalMaterial' ?>",
                    data: {
                        bulan: periode,
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data berhasil ditambahkan",
                                confirmButtonColor: "#3cb878",
                            });
                            // $("#na_tindakan").hide();
                            // $('#datable').DataTable().ajax.reload();
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
    }
</script>

<script type="text/javascript">
    
    
    function tampilRangePermit() {
        $('#datable').DataTable().destroy();
        bulan = $("#inBulan").val();
        $('#datable').DataTable({
            "retrieve": true,
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Pencarian :",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                },
            },
            "ajax": {
                "url": '<?= base_url('Jurnal_Biaya_farmasi/tampil_jurnal_material'); ?>',
                "type": 'POST',
                "data": {
                    bulan: bulan,

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