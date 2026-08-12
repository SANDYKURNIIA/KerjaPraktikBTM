<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <!-- sample modal content -->
        <div class="modal fade" id="modal_sep" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i>TAMBAH DATA KUNJUNGAN</h5>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12" style="text-align:right;">
                            <div id="btn_edit" class="col-md-12"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-body">

                            <form id="form-sep" class="form-horizontal">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Cari SEP</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control filled-input" placeholder="No SEP" id="inCekSEP" name="inTanggalKunjugan">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <button type="button" id="cari_sep" class="btn btn-primary">Cari</button>
                                    <button type="button" id="btn_reset" class="btn btn-default">Reset</button>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="clearfix"></div>
                                <!-- <div class="form-group" id="tabel_sep"> -->
                                <div class="table-wrap">
                                    <div class="table-responsive ">
                                        <table id="tabel_sep" class="table table-hover display">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th>EDIT</th>
                                                    <th>HAPUS</th>
                                                    <th>NO SEP</th>
                                                    <th>NO KARTU</th>
                                                    <th>NAMA</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr class="bg-success">
                                                    <th>EDIT</th>
                                                    <th>HAPUS</th>
                                                    <th>NO SEP</th>
                                                    <th>NO KARTU</th>
                                                    <th>NAMA</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <!-- </div> -->

                            </form>


                        </div>

                    </div>
                </div>




            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
</div>