<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">PENGAWASAN KHUSUS</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">No RM<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $no_rm ?>" id="inNoRM" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $nama ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                <input type="text" class="form-control" value="<?= $jenis_kelamin ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Tgl Lahir<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $tgl_lahir ?>" disabled>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h5 style="margin-top: 30px;">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        Pengawasan Khusus
                                        <span class="help"></span>
                                    </label>
                                </strong>
                            </h5>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <div class="col-md-4">
                                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                    <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#newPeternakModal">Tambah</a>
                                    <button type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                                </div>
                            </div>

                            <div class="modal fade" id="newPeternakModal" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="newPeternakModallabel">Tambah Pengawasan Khusus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <strong>
                                                            <h5><label class="control-label mb-10 text-left">Observasi<span class="help"></span></label></h5>
                                                        </strong>
                                                        <br>
                                                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                                                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Kesadaran<span class="help"></span></label>
                                                            <span id="kesadaran_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="kesadaran" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Tensi<span class="help"></span></label>
                                                            <span id="tensi_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="number" class="form-control" id="tensi" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Nadi<span class="help"></span></label>
                                                            <span id="nadi_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="number" class="form-control" id="nadi" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Pernapasan<span class="help"></span></label>
                                                            <span id="nafas_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="number" class="form-control" id="nafas" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Suhu<span class="help"></span></label>
                                                            <span id="nafas_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="number" class="form-control" id="suhu" value="" placeholder="Celcius">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Skala Nyeri<span class="help"></span></label>
                                                            <span id="nyeri_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="nyeri" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Jam<span class="help"></span></label>
                                                            <span id="jam_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="time" class="form-control" id="jam" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div> -->
                                                        <div class="clearfix"></div>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <strong>
                                                            <h5><label class="control-label mb-10 text-left">Keseimbangan cairan<span class="help"></span></label></h5>
                                                        </strong>

                                                        <br>
                                                        <div class="col-md-12">
                                                            <strong>
                                                                <label class="control-label mb-10 text-left">Masuk<span class="help"></span></label>
                                                            </strong>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Oral<span class="help"></span></label>
                                                            <span id="oral_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="oral" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Infus<span class="help"></span></label>
                                                            <span id="infus_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="infus" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Jumlah<span class="help"></span></label>
                                                            <span id="jumlah_masuk_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="jumlah_masuk" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <strong>
                                                                <label class="control-label mb-10 text-left">Keluar<span class="help"></span></label>
                                                            </strong>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Urin<span class="help"></span></label>
                                                            <span id="urin_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="urin" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Muntah<span class="help"></span></label>
                                                            <span id="muntah_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="muntah" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Drainage/BAB<span class="help"></span></label>
                                                            <span id="bab_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="bab" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Jumlah<span class="help"></span></label>
                                                            <span id="jumlah_keluar_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="jumlah_keluar" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <strong>
                                                                <label class="control-label mb-10 text-left">Keterangan<span class="help"></span></label>
                                                            </strong>
                                                            <span id="keterangan_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="keterangan" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer mb-5 mr-5 mt-10">
                                            <button class="btn btn-success btn-anim  btn-sm" onclick="simpan()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="edit" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="newPeternakModallabel">Edit Pengawasan Khusus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <strong>
                                                            <h5><label class="control-label mb-10 text-left">Observasi<span class="help"></span></label></h5>
                                                        </strong>
                                                        <br>
                                                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                                                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                                                        <input type="hidden" class="form-control" id="id_form">
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Kesadaran<span class="help"></span></label>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="up_kesadaran" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Tensi<span class="help"></span></label>
                                                            <div class="has-success">
                                                                <input type="number" class="form-control" id="up_tensi" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Nadi<span class="help"></span></label>
                                                            <div class="has-success">
                                                                <input type="number" class="form-control" id="up_nadi" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Pernapasan<span class="help"></span></label>
                                                            <div class="has-success">
                                                                <input type="number" class="form-control" id="up_nafas" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Suhu<span class="help"></span></label>
                                                            <span id="nafas_error" class="text-danger"></span>
                                                            <div class="has-success">
                                                                <input type="number" class="form-control" id="up_suhu" value="" placeholder="Celcius">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Skala Nyeri<span class="help"></span></label>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="up_nyeri" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Jam<span class="help"></span></label>
                                                            <div class="has-success">
                                                                <input type="time" class="form-control" id="up_jam" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div> -->
                                                        <div class="clearfix"></div>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <strong>
                                                            <h5><label class="control-label mb-10 text-left">Keseimbangan cairan<span class="help"></span></label></h5>
                                                        </strong>

                                                        <br>
                                                        <div class="col-md-12">
                                                            <strong>
                                                                <label class="control-label mb-10 text-left">Masuk<span class="help"></span></label>
                                                            </strong>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Oral<span class="help"></span></label>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="up_oral" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Infus<span class="help"></span></label>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="up_infus" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Jumlah<span class="help"></span></label>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="up_jumlah_masuk" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <strong>
                                                                <label class="control-label mb-10 text-left">Keluar<span class="help"></span></label>
                                                            </strong>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Urin<span class="help"></span></label>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="up_urin" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Muntah<span class="help"></span></label>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="up_muntah" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Drainage/BAB<span class="help"></span></label>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="up_bab" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label mb-10 text-left">Jumlah<span class="help"></span></label>
                                                            <div class="has-success">
                                                                <input type="number" class="form-control" id="up_jumlah_keluar" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <strong>
                                                                <label class="control-label mb-10 text-left">Keterangan<span class="help"></span></label>
                                                            </strong>
                                                            <div class="has-success">
                                                                <input type="text" class="form-control" id="up_keterangan" value="">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer mb-5 mr-5 mt-10">
                                            <button class="btn btn-success btn-anim  btn-sm" onclick="edit()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table table-hover display  pb-30" id="tabel_terapi">
                                <thead>
                                    <tr class="bg-success">
                                        <th>EDIT</th>
                                        <th>HAPUS</th>
                                        <th>TANGGAL & JAM</th>
                                        <th>KESADARAN</th>
                                        <th>TENSI</th>
                                        <th>NADI</th>
                                        <th>PERNAFASAN</th>
                                        <th>SUHU</th>
                                        <th>SKALA NYERI</th>
                                        <th>ORAL</th>
                                        <th>INFUS</th>
                                        <th>JUMLAH MASUK</th>
                                        <th>URIN</th>
                                        <th>MUNTAH</th>
                                        <th>DRAINAGE/BAB</th>
                                        <th>JUMLAH</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-success">
                                        <th>EDIT</th>
                                        <th>HAPUS</th>
                                        <th>TANGGAL & JAM</th>
                                        <th>KESADARAN</th>
                                        <th>TENSI</th>
                                        <th>NADI</th>
                                        <th>PERNAFASAN</th>
                                        <th>SUHU</th>
                                        <th>SKALA NYERI</th>
                                        <th>ORAL</th>
                                        <th>INFUS</th>
                                        <th>JUMLAH MASUK</th>
                                        <th>URIN</th>
                                        <th>MUNTAH</th>
                                        <th>DRAINAGE/BAB</th>
                                        <th>JUMLAH</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </tfoot>
                                <tbody style="color: black">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(e) {
        id_history = $('#inHis').val();
        reload_data_id_pel(id_history);
    });

    function pilih(id) {
        $('#id_form').val(id);
        $.ajax({
            url: "<?php echo base_url() ?>Erm_igd_peng_khu_upmar_2017/get_peng_khusus",
            method: "POST",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                $('#up_kesadaran').val(data.kesadaran);
                $('#up_tensi').val(data.tensi);
                $('#up_nadi').val(data.nadi);
                $('#up_nafas').val(data.nafas);
                $('#up_suhu').val(data.suhu);
                $('#up_nyeri').val(data.nyeri);
                $('#up_jam').val(data.jam);
                $('#up_oral').val(data.oral);
                $('#up_infus').val(data.infus);
                $('#up_jumlah_masuk').val(data.jumlah_masuk);
                $('#up_urin').val(data.urin);
                $('#up_muntah').val(data.muntah);
                $('#up_bab').val(data.bab);
                $('#up_jumlah_keluar').val(data.jumlah_keluar);
                $('#up_keterangan').val(data.keterangan);
                $("#edit").modal('show');
                $('#tabel_terapi').DataTable().ajax.reload();

            }

        });
        return false;
    }

    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();

        kesadaran = $('#kesadaran').val();
        tensi = $('#tensi').val();
        nadi = $('#nadi').val();
        nafas = $('#nafas').val();
        suhu = $('#suhu').val();
        nyeri = $('#nyeri').val();
        jam = $('#jam').val();
        oral = $('#oral').val();
        infus = $('#infus').val();
        jumlah_masuk = $('#jumlah_masuk').val();
        urin = $('#urin').val();
        muntah = $('#muntah').val();
        bab = $('#bab').val();
        jumlah_keluar = $('#jumlah_keluar').val();
        keterangan = $('#keterangan').val();

        dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
            '&kesadaran=' + kesadaran + '&tensi=' + tensi + '&nadi=' + nadi +
            '&nafas=' + nafas + '&nyeri=' + nyeri+ '&suhu=' + suhu + '&jam=' + jam +
            '&oral=' + oral + '&infus=' + infus + '&jumlah_masuk=' + jumlah_masuk +
            '&urin=' + urin + '&muntah=' + muntah + '&bab=' + bab +
            '&jumlah_keluar=' + jumlah_keluar + '&keterangan=' + keterangan;


        $.ajax({
            url: "<?php echo base_url() ?>Erm_igd_peng_khu_upmar_2017/insert_peng_khusus",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil ditambah",
                        confirmButtonColor: "#3cb878",
                    });

                    $("#newPeternakModal").modal('hide');
                    $('#tabel_terapi').DataTable().ajax.reload();
                } else if (data.error) {
                    if (data.kesadaran != '') {
                        $('#kesadaran_error').html(data.kesadaran);
                    } else {
                        $('#kesadaran_error').html('');
                    }
                    if (data.tensi != '') {
                        $('#tensi_error').html(data.tensi);
                    } else {
                        $('#tensi_error').html('');
                    }
                    if (data.nadi != '') {
                        $('#nadi_error').html(data.nadi);
                    } else {
                        $('#anadi_error').html('');
                    }
                    if (data.nafas != '') {
                        $('#nafas_error').html(data.nafas);
                    } else {
                        $('#nafas_error').html('');
                    }
                    if (data.nyeri != '') {
                        $('#nyeri_error').html(data.nyeri);
                    } else {
                        $('#nyeri_error').html('');
                    }
                    if (data.jam != '') {
                        $('#jam_error').html(data.jam);
                    } else {
                        $('#jam_error').html('');
                    }
                    if (data.oral != '') {
                        $('#oral_error').html(data.oral);
                    } else {
                        $('#oral_error').html('');
                    }
                    if (data.infus != '') {
                        $('#infus_error').html(data.infus);
                    } else {
                        $('#infus_error').html('');
                    }
                    if (data.jumlah_masuk != '') {
                        $('#jumlah_masuk_error').html(data.jumlah_masuk);
                    } else {
                        $('#jumlah_masuk_error').html('');
                    }
                    if (data.urin != '') {
                        $('#urin_error').html(data.urin);
                    } else {
                        $('#urin_error').html('');
                    }
                    if (data.muntah != '') {
                        $('#muntah_error').html(data.muntah);
                    } else {
                        $('#muntah_error').html('');
                    }
                    if (data.bab != '') {
                        $('#bab_error').html(data.bab);
                    } else {
                        $('#bab_error').html('');
                    }
                    if (data.jumlah_keluar != '') {
                        $('#jumlah_keluar_error').html(data.jumlah_keluar);
                    } else {
                        $('#jumlah_keluar_error').html('');
                    }
                    if (data.keterangan != '') {
                        $('#keterangan_error').html(data.keterangan);
                    } else {
                        $('#keterangan_error').html('');
                    }
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
        return false;
    }

    function edit() {
        id_form = $('#id_form').val();
        kesadaran = $('#up_kesadaran').val();
        tensi = $('#up_tensi').val();
        nadi = $('#up_nadi').val();
        nafas = $('#up_nafas').val();
        nyeri = $('#up_nyeri').val();
        suhu = $('#up_suhu').val();
        oral = $('#up_oral').val();
        infus = $('#up_infus').val();
        jumlah_masuk = $('#up_jumlah_masuk').val();
        urin = $('#up_urin').val();
        muntah = $('#up_muntah').val();
        bab = $('#up_bab').val();
        jumlah_keluar = $('#up_jumlah_keluar').val();
        keterangan = $('#up_keterangan').val();

        dataString = 'id_form=' + id_form + '&kesadaran=' + kesadaran + '&tensi=' + tensi + '&nadi=' + nadi +
            '&nafas=' + nafas + '&nyeri=' + nyeri + '&suhu=' + suhu +
            '&oral=' + oral + '&infus=' + infus + '&jumlah_masuk=' + jumlah_masuk +
            '&urin=' + urin + '&muntah=' + muntah + '&bab=' + bab +
            '&jumlah_keluar=' + jumlah_keluar + '&keterangan=' + keterangan;


        $.ajax({
            url: "<?php echo base_url() ?>Erm_igd_peng_khu_upmar_2017/edit_peng_khusus",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil diedit",
                        confirmButtonColor: "#3cb878",
                    });

                    $("#edit").modal('hide');
                    $('#tabel_terapi').DataTable().ajax.reload();
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
        return false;
    }

    function hapus_tindakan(id) { //utk hapus diagnosa pasien
        swal({
            title: "Warning?",
            text: "Apakah kamu yakin menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Erm_igd_peng_khu_upmar_2017/hapus_tindakan_pengawasan",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                            });
                            $('#tabel_terapi').DataTable().ajax.reload();
                        } else {
                            swal({
                                title: "Gagal!",
                                type: "warning",
                                confirmButtonColor: "#3cb878",
                            });
                        }
                    }
                });
            });
        });
        return false;
    }

    function reload_data_id_pel(id_history) { //utk reload data diagnosa pasien jika berhasil
        $('#tabel_terapi').dataTable().fnClearTable();
        $('#tabel_terapi').dataTable().fnDestroy();
        $('#tabel_terapi').DataTable({
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
                    "sLast": "Terakhir",
                }
            },
            "ajax": {
                "url": '<?php echo base_url('Erm_igd_peng_khu_upmar_2017/tampil_list_pengawasan'); ?>',
                "type": 'POST',
                "data": {
                    id_history: id_history
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
    function cetak() {
    id = $('#inHis').val();
    id_pelayanan = $('#inPel').val();
    window.location.href = "<?php echo base_url('Erm_igd_edit/print_peng_khusus/') ?>" + id+'/'+id_pelayanan;
  }
</script>