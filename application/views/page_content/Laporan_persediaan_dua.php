<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">LAPORAN PERSEDIAAN DUA</span></h6>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">
            <div class="col-md-12">
                <div class="col-md-3 mt-20 pl-5">
                    <button class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">HARI INI </span></button>
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Mulai : </label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="mt-0 txt-dark">Tanggal Akhir : </label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-3 mt-20">
                    <button class="btn btn-primary btn-anim btn-sm1"><i class="icon-rocket"></i><span class="btn-text">PILIH</span></button>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable_persediaan_dua" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th>KODE SIBATIK</th>
                                <th>NAMA</th>
                                <th>STOK AWAL</th>
                                <th>PENERIMAAN</th>
                                <th>PENGELUARAN</th>
                                <th>STOK AKHIR</th>
                                <th>HARGA STOK AWAL</th>
                                <th>HARGA PENERIMAAN</th>
                                <th>HARGA PENGELUARAN</th>
                                <th>HARGA STOK AKHIR</th>
                                <th>HARGA PERSEDIAAN</th>
                                <th>HNA</th>
                                <th>PRODUSEN</th>
                                <th>DISTRIBUTOR</th>
                                <th>GOLONGAN OBAT</th>
                                <th>SATUAN</th>
                                <th>STANDAR</th>
                                <th>KODE FOPI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>BJN020200097</td>
                                <td>AMBROXOL SYRUP (BTL 60 ML)</td>
                                <td>0</td>
                                <td>280</td>
                                <td>0</td>
                                <td>280</td>
                                <td>Rp 0</td>
                                <td>Rp 28.400.624</td>
                                <td>Rp 0</td>
                                <td>Rp 28.400.624</td>
                                <td>Rp 101.431</td>
                                <td>Rp 101.431</td>
                                <td>KIMIA FARMA</td>
                                <td>KIMIA FARMA, PT</td>
                                <td>GENERIK</td>
                                <td>BTL</td>
                                <td>FOPI</td>
                                <td>FKF03C013</td>
                            </tr>
                            <tr>
                                <td>118330210155</td>
                                <td>SYRINGE 1 ml LS 27G 1/2IN</td>
                                <td>1000</td>
                                <td>1000</td>
                                <td>189</td>
                                <td>1811</td>
                                <td>Rp 189.000</td>
                                <td>Rp 189.000</td>
                                <td>Rp 35.721</td>
                                <td>Rp 342.279</td>
                                <td>Rp 189</td>
                                <td>Rp 189</td>
                                <td>Becton Dickinson (BD)</td>
                                <td>RECO SUKSES BERSAMA, PT</td>
                                <td>BMHP</td>
                                <td>PC</td>
                                <td>NON DAK</td>
                                <td>SPITBD13A004</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="bg-success">
                                <th colspan="6" style="text-align:right; font-weight: bold;">Total:</th>
                                <th style="font-weight: bold;">Rp 189.000</th>
                                <th style="font-weight: bold;">Rp 28.589.624</th>
                                <th style="font-weight: bold;">Rp 35.721</th>
                                <th style="font-weight: bold;">Rp 28.742.903</th>
                                <th colspan="8"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style> td { color: black; } </style>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datable_persediaan_dua').DataTable({
            "dom": 'Bfrtip',
            "buttons": ['csv', 'excel', 'pdf'],
            "paging": false,
            // Bagian "ajax" dan "footerCallback" dihapus karena data sudah ada di HTML
            "language": {
                "sEmptyTable": "Tidak ada data yang tersedia",
                "sProcessing": "Memproses...",
                "sZeroRecords": "Data tidak ditemukan"
            },
        });
    });
</script>
