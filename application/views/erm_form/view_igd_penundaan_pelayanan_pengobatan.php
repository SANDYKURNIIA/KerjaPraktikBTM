<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">PENUNDAAN PELAYANAN ATAU PENGOBATAN</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">

                <div class="panel-body">
                    <div class="form-wrap">

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Saya yang bertanda tangan dibawah ini :<span class="help"></span></label>
                                </strong>

                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <span id="nama_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" value="" id="inNama">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Tgl Lahir<span class="help"></span></label>
                                <span id="tgl_lahir_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="date" class="form-control" value="" id="inTglLahir">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Alamat<span class="help"></span></label>
                                <span id="alamat_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" value="" id="inAlamat">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Hubungan Dengan Pasien<span class="help"></span></label>
                                <span id="hubungan_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" value="" id="inHub">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Dengan ini menyatakan bahwa saya telah mendapatkan informasi mengenai penundaan pelayanan/pengobatan terhadap :<span class="help"></span></label>
                                </strong>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $nama ?>" disabled>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Tgl Lahir<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $tgl_lahir ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">No. RM<span class="help"></span></label>
                                <input type="text" class="form-control" value="<?= $no_rm ?>" id="inNoRM" disabled>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Penjelasan informasi mengenai penundaan pelayanan/pengobatan telah diberikan dari :<span class="help"></span></label>
                                </strong>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Nama Dokter/Penanggung Jawab Unit:<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $dpjp ?>" id="inDPJP">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Penundaan terhadap tindakan :<span class="help"></span></label>
                                <span id="tindakan_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="text" class="form-control" value="" id="inTindakan">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Alasan Penundaan :<span class="help"></span></label>
                                <span id="alasan_error" class="text-danger"></span>
                                <div class="has-success">
                                    <textarea class="form-control" name="" id="alasan" cols="30" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Alternatif yang diberikan: <span class="help"></span></label>
                                <span id="alt_error" class="text-danger"></span>
                                <div class="has-success">
                                    <textarea class="form-control" name="" id="alt" cols="30" rows="4"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Tanggal Penundaan: <span class="help"></span></label>
                                <span id="tgl_tunda_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="date" class="form-control" value="" id="tgl_tunda">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Jam: <span class="help"></span></label>
                                <span id="jam_tunda_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="time" class="form-control" value="" id="jam_tunda">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Perkiraan Penundaan Sampai Tanggal: <span class="help"></span></label>
                                <span id="bts_tgl_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="date" class="form-control" value="" id="bts_tgl">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Jam: <span class="help"></span></label>
                                <span id="bts_jam_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="time" class="form-control" value="" id="bts_jam">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Saya memahami penjelasan yang diberikan mengenai penundaan pelayanan/pengobatan terhadap (saya/keluarga saya). :<span class="help"></span></label>
                                </strong>

                            </div>
                        </div>


                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-4">
                                <label class="control-label">Yang Memberikan Informasi</label>
                                <br />
                                <div class="row">
                                    <button data-toggle="modal" data-target="#modal_ttd" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
                                    <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                                    <canvas id="can" width="300" height="300" style="display: none;"></canvas>
                                    <div class="form-group">
                                        <div class="modal fade" id="modal_ttd" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="form-group row" style="margin-left: 30px;">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <canvas id="ttd" width="300" height="300">
                                                                    </canvas>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                                                                    <button class="btn btn-default" id="sig-clearBtn3">Clear Signature</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Yang Membuat Pernyataan</label>
                                <br />
                                <div class="row">
                                    <button data-toggle="modal" data-target="#modal_ttd1" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
                                    <button class="btn btn-default" id="sig-clearBtn1">Clear Signature</button>
                                    <canvas id="can1" width="300" height="300" style="display: none;"></canvas>
                                    <div class="form-group">
                                        <div class="modal fade" id="modal_ttd1" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="form-group row" style="margin-left: 30px;">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <canvas id="ttd1" width="300" height="300">
                                                                    </canvas>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button class="btn btn-primary" id="sig-submitBtn1">Submit Signature</button>
                                                                    <button class="btn btn-default" id="sig-clearBtn4">Clear Signature</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Saksi</label>
                                <br />
                                <div class="row">
                                    <button data-toggle="modal" data-target="#modal_ttd2" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
                                    <button class="btn btn-default" id="sig-clearBtn2">Clear Signature</button>
                                    <canvas id="can2" width="300" height="300" style="display: none;"></canvas>
                                    <div class="form-group">
                                        <div class="modal fade" id="modal_ttd2" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="form-group row" style="margin-left: 30px;">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <canvas id="ttd2" width="300" height="300">
                                                                    </canvas>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button class="btn btn-primary" id="sig-submitBtn2">Submit Signature</button>
                                                                    <button class="btn btn-default" id="sig-clearBtn5">Clear Signature</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center" style="margin-top: 30px;">
                            <div class="col-md-12">
                                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('assets/signature1') ?>
<style>
    canvas {
        cursor: crosshair;
        border: 1px solid #000000;
    }
</style>

<script type="text/javascript">
    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();

        nama = $('#inNama').val();
        tgl_lahir = $('#inTglLahir').val();
        alamat = $('#inAlamat').val();
        hubungan = $('#inHub').val();
        tindakan = $('#inTindakan').val();
        alasan = $('#alasan').val();
        alt = $('#alt').val();
        tgl_tunda = $('#tgl_tunda').val();
        jam_tunda = $('#jam_tunda').val();
        bts_tgl = $('#bts_tgl').val();
        bts_jam = $('#bts_jam').val();


        canvas = document.getElementById('can');
        if (canvas.style.display !== 'none' && canvas.style.visibility !== 'hidden') {
            ttd = canvas.toDataURL("image/png");
        } else {
            ttd = '';
        }
        canvas1 = document.getElementById('can1');
        if (canvas1.style.display !== 'none' && canvas1.style.visibility !== 'hidden') {
            ttd1 = canvas1.toDataURL("image/png");
        } else {
            ttd1 = '';
        }
        canvas2 = document.getElementById('can2');
        if (canvas2.style.display !== 'none' && canvas2.style.visibility !== 'hidden') {
            ttd2 = canvas2.toDataURL("image/png");
        } else {
            ttd2 = '';
        }

        dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
            '&nama=' + nama + '&tgl_lahir=' + tgl_lahir +
            '&alamat=' + alamat + '&hubungan=' + hubungan + '&tindakan=' + tindakan +
            '&alasan=' + alasan + '&alt=' + alt + '&tgl_tunda=' + tgl_tunda +
            '&jam_tunda=' + jam_tunda + '&bts_tgl=' + bts_tgl + '&bts_jam=' + bts_jam +
            '&ttd=' + ttd + '&ttd1=' + ttd1 + '&ttd2=' + ttd2;

        id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
        id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";
        $.ajax({
            url: "<?php echo base_url() ?>Erm_igd_penundaan_pelayanan_pengobatan/insert_penundaan_pelayanan",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pel + '/' + id_his;
                } else if (data.error) {
                    if (data.nama != '') {
                        $('#nama_error').html(data.nama);
                    } else {
                        $('#nama_error').html('');
                    }
                    if (data.tgl_lahir != '') {
                        $('#tgl_lahir_error').html(data.tgl_lahir);
                    } else {
                        $('#tgl_lahir_error').html('');
                    }
                    if (data.alamat != '') {
                        $('#alamat_error').html(data.alamat);
                    } else {
                        $('#alamat_error').html('');
                    }
                    if (data.hubungan != '') {
                        $('#hubungan_error').html(data.hubungan);
                    } else {
                        $('#hubungan_error').html('');
                    }
                    if (data.tindakan != '') {
                        $('#tindakan_error').html(data.tindakan);
                    } else {
                        $('#tindakan_error').html('');
                    }
                    if (data.alasan != '') {
                        $('#alasan_error').html(data.alasan);
                    } else {
                        $('#alasan_error').html('');
                    }
                    if (data.alt != '') {
                        $('#alt_error').html(data.alt);
                    } else {
                        $('#alt_error').html('');
                    }
                    if (data.tgl_tunda != '') {
                        $('#tgl_tunda_error').html(data.tgl_tunda);
                    } else {
                        $('#tgl_tunda_error').html('');
                    }
                    if (data.jam_tunda != '') {
                        $('#jam_tunda_error').html(data.jam_tunda);
                    } else {
                        $('#jam_tunda_error').html('');
                    }
                    if (data.bts_tgl != '') {
                        $('#bts_tgl_error').html(data.bts_tgl);
                    } else {
                        $('#bts_tgl_error').html('');
                    }
                    if (data.bts_jam != '') {
                        $('#bts_jam_error').html(data.bts_jam);
                    } else {
                        $('#bts_jam_error').html('');
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
</script>