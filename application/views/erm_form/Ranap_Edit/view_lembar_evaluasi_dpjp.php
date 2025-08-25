<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">LEMBAR EVALUASI DPJP</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                                <!-- <input type="text" class="form-control" id="inNoRM" disabled> -->
                                <input type="text" class="form-control" value="<?= $no_rm ?>" id="inNoRM" disabled>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                        <input type="hidden" class="form-control" id="id">
                        <div class="form-group">
                            <div class="col-md-8">
                                <label class="control-label mb-10 text-left">Tanggal dan Jam<span class="help"></span></label>
                                <span id="tgl_error" class="text-danger"></span>
                                <div class="has-success">
                                    <input type="datetime-local" class="form-control" id="inWaktu" name="inWaktu">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group ">
                        <div class="col-md-4">
                            <label class="control-label mb-10 text-left">Nama Pasien</label>
                            <!-- <input type="text" class="form-control" disabled> -->
                            <input type="text" class="form-control" value="<?= $nama ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label mb-10 text-left">Umur<span class="help"></span></label>
                            <input type="text" class="form-control" value="<?php
                                                                            $birthDate = $tgl_lahir;
                                                                            date_default_timezone_set('Asia/Jakarta');

                                                                            $date = new DateTime($birthDate);
                                                                            $now = new DateTime();
                                                                            $interval = $now->diff($date);

                                                                            echo  $interval->y . " Tahun"; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label mb-10 text-left">Nama Dokter<span class="help"></span></label>
                            <div class="has-success">
                                <!-- Menggunakan dropdown -->
                                <select class="form-control select2" id="inDPJP" required>
                                    <?php foreach ($dokter as $d): ?>
                                        <option><?php echo $d['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- <input type="text" class="form-control" value="<?= $namadokter ?>" disabled> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label mb-10 text-left">Sebagai DPJP<span class="help"></span></label>
                            <div class="has-success">
                                <!-- <input type="text" class="form-control" id="inSebagai" name="inSebagai"> -->
                                <select class="form-control select2" id="inSebagai" required>
                                    <?php foreach ($dokter as $d): ?>
                                        <option><?php echo $d['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- <input type="text" class="form-control" value="<?= $dpjp ?>" disabled> -->
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>


                    <div class="col-md-12">
                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                    </div>
                    <!-- <div class="form-group ">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Alamat</label>
                                <input type="text" class="form-control" disabled>
                                <input type="text" class="form-control" value="<?= $alamat ?>" disabled>
                            </div>
                        </div> -->
                    <!-- <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Dokter Pelaksana Tindakan<span class="help"></span></label>
                                <input type="Text" class="form-control" value="<?= $pasien->nama_dokter ?>" disabled>
                            </div>
                        </div> -->
                    <div class="form-group">
                        <div class="col-md-12">
                            <h5 style="margin-top: 5px;"><strong>
                                    <label class="control-label mb-10 text-left"><b> PENYAMPAIAN RENCANA PELAYANAN <b /><span class="help"></span></label>
                                </strong>
                            </h5>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">
                                            1 . Memperkenalkan Diri Sebagai DPJP
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="kenaldpjp_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="kenaldpjp1" type="radio" name="kenaldpjp" value="Sudah">
                                            <label class="control-label" for="kenaldpjp1">
                                                Sudah Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="kenaldpjp2" type="radio" name="kenaldpjp" value="Tidak">
                                            <label class="control-label" for="kenaldpjp2">
                                                Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">
                                            2 . Penyampaian Bahwa Pasien Telah Diperiksa
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="periksa_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="periksa1" type="radio" name="periksa" value="Sudah">
                                            <label class="control-label" for="periksa1">
                                                Sudah Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="periksa2" type="radio" name="periksa" value=" Tidak">
                                            <label class="control-label" for="periksa2">
                                                Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">
                                            3 . Menyampaikan Rencana Pemeriksaan Penunjang
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="penunjang_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="penunjang1" type="radio" name="penunjang" value="Sudah">
                                            <label class="control-label" for="penunjang1">
                                                Sudah Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="penunjang2" type="radio" name="penunjang" value="Tidak">
                                            <label class="control-label" for="penunjang2">
                                                Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">
                                            4 . Menyampaikan Rencana Konsul
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="konsul_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="konsul1" type="radio" name="konsul" value="Sudah">
                                            <label class="control-label" for="konsul1">
                                                Sudah Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="konsul2" type="radio" name="konsul" value="Tidak">
                                            <label class="control-label" for="konsul2">
                                                Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">
                                            5 . Menyampaikan rencana tindakan atau terapi serta manfaat dan resikonya
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="terapi_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="terapi1" type="radio" name="terapi" value="Sudah">
                                            <label class="control-label" for="terapi1">
                                                Sudah Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="terapi2" type="radio" name="terapi" value="Tidak">
                                            <label class="control-label" for="terapi2">
                                                Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">
                                            6 . Menyampaikan harapan yang akan diperoleh dengan tindakan / terapi tersebut
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="harapan_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="harapan1" type="radio" name="harapan" value="Sudah">
                                            <label class="control-label" for="harapan1">
                                                Sudah Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="harapan2" type="radio" name="harapan" value="Tidak">
                                            <label class="control-label" for="harapan2">
                                                Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">
                                            7 . Menanyakan apakah pasien (wali) memiliki pertanyaan yang akan diajukan
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="pertanyaan_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="pertanyaan1" type="radio" name="pertanyaan" value="Sudah">
                                            <label class="control-label" for="pertanyaan1">
                                                Sudah Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="pertanyaan2" type="radio" name="pertanyaan" value="Tidak">
                                            <label class="control-label" for="pertanyaan2">
                                                Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">
                                            8 . Mengakhiri pembicaraan dengan salam
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="salam_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="salam1" type="radio" name="salam" value="Sudah">
                                            <label class="control-label" for="salam1">
                                                Sudah Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-button radio-button-primary">
                                            <input id="salam2" type="radio" name="salam" value="Tidak">
                                            <label class="control-label" for="salam2">
                                                Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                            </div>
                            <div class="col-md-12">
                                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Pasien/Wali</label>
                                <br />
                                <div class="row">
                                    <button data-toggle="modal" data-target="#modal_ttd" id="modal_ttd" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
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
                                <label class="control-label">DPJP</label>
                                <br />
                                <div class="row">
                                    <button data-toggle="modal" data-target="#modal_ttd1" id="modal_ttd1" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
                                    <button class="btn btn-default" id="sig-clearBtn1">Clear Signature</button>
                                    <canvas id="can1" width="300" height="300" style="display: none;"></canvas>
                                    <div class="form-group">
                                        <div class="modal fade" id="modal_ttd1" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="false">&times;</span>
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
                                <label class="control-label"></label>
                                <br />
                                <div class="row">
                                    <!-- <button data-toggle="modal" disabled data-target="#modal_ttd2" aria-expanded="false" aria-controls="poli_sore" class="btn"></span></button> -->
                                    <button class="btn" disabled id="sig-clearBtn2"></button>
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

                                        <div class="form-group text-center" style="margin-top: 30px;">
                                            <div class="col-md-12">
                                                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                            </div>
                                            <div class="col-md-12">
                                                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                                <button type="submit" onclick="simpan()" class="btn btn-success mb-4">Simpan</button>
                                                <button id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
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
</div>
<?php $this->load->view('assets/signature1') ?>
<style>
    canvas {
        cursor: crosshair;
        border: 1px solid #000000;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        id_history = $('#inHis').val();
        $.ajax({
            url: "<?php echo base_url() ?>Erm_ranap_evaluasi_dpjp/get_ass_per",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_history
            },
            success: function(data) {
                $('input[name="kenaldpjp"][value="' + data.perkenalan + '"]').prop("checked", true);
                $('input[name="periksa"][value="' + data.periksa + '"]').prop("checked", true);
                $('input[name="penunjang"][value="' + data.penunjang + '"]').prop("checked", true);
                $('input[name="konsul"][value="' + data.konsul + '"]').prop("checked", true);
                $('input[name="terapi"][value="' + data.terapi + '"]').prop("checked", true);
                $('input[name="harapan"][value="' + data.harapan + '"]').prop("checked", true);
                $('input[name="pertanyaan"][value="' + data.pertanyaan + '"]').prop("checked", true);
                $('input[name="salam"][value="' + data.salam + '"]').prop("checked", true);
                /*----------------------------------*/
                $('#id').val(data.id_evaluasi);
                $('input[name="inWaktu"]').val(data.waktu_evaluasi);
                $('input[name="inDPJP"]').val(data.nama_dokter);
                $('input[name="inSebagai"]').val(data.sebagai);
                /*----------------------------------*/
                document.querySelector('#sig-clearBtn').disabled = true;
                document.querySelector('#sig-clearBtn1').disabled = true;
                document.querySelector('#sig-clearBtn2').disabled = true;
                document.querySelector('#modal_ttd').disabled = true;
                document.querySelector('#modal_ttd1').disabled = true;
                document.querySelector('#modal_ttd2').disabled = true;

                canvas = document.getElementById('can');
                canvas1 = document.getElementById('can1');
                ctx = canvas.getContext("2d");
                ctx1 = canvas1.getContext("2d");

                var img = new Image();
                var img1 = new Image();
                img.onload = function() {
                    ctx.drawImage(img, 0, 0, 300, 300);
                    steps.length = 0;
                    steps[no] = ctx.getImageData(0, 0, canvas.width, canvas.height);
                    //steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
                }
                img.src = "<?php echo base_url(); ?>" + data.ttd;
                img1.onload = function() {
                    ctx1.drawImage(img1, 0, 0, 300, 300);
                    steps.length = 0;
                    steps[no] = ctx1.getImageData(0, 0, canvas1.width, canvas1.height);
                    //steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
                }
                img1.src = "<?php echo base_url(); ?>" + data.ttd1;
                $('#can').show();
                $('#can1').show();
            }
        });
    });
</script>
<script type="text/javascript">
    function simpan() {
        id = $('#id').val();
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();
        waktu_evaluasi = $('#inWaktu').val();
        nama_dokter = $('#inDPJP').val();
        sebagai = $('#inSebagai').val();
        perkenalan = $('input[name="kenaldpjp"]:checked').val();
        periksa = $('input[name="periksa"]:checked').val();
        penunjang = $('input[name="penunjang"]:checked').val();
        konsul = $('input[name="konsul"]:checked').val();
        terapi = $('input[name="terapi"]:checked').val();
        harapan = $('input[name="harapan"]:checked').val();
        pertanyaan = $('input[name="pertanyaan"]:checked').val();
        salam = $('input[name="salam"]:checked').val();
        canvas = document.getElementById('can');
        ttd = canvas.toDataURL("image/png");
        canvas1 = document.getElementById('can1');
        ttd1 = canvas1.toDataURL("image/png");

        dataString = 'nama_dokter=' + nama_dokter + '&no_rm=' + no_rm + '&sebagai=' + sebagai + '&perkenalan=' + perkenalan + '&periksa=' + periksa + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
            '&penunjang=' + penunjang + '&konsul=' + konsul + '&terapi=' + terapi + '&harapan=' + harapan + '&pertanyaan=' + pertanyaan + '&salam=' + salam + '&waktu_evaluasi=' + waktu_evaluasi +
            '&ttd=' + ttd + '&ttd1=' + ttd1 + '&id=' + id;

        $.ajax({
            url: "<?php echo base_url() ?>Erm_ranap_evaluasi_dpjp/update_evaluasi",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" + '<?= urlencode(base64_encode($id_pelayanan)) ?>' + '/' + '<?= urlencode(base64_encode($id_history)) ?>';
                } else if (data.error) {
                    if (ttd == '' | ttd == null) {
                        $('#ttd_error').html('*wajib diisi');
                    } else {
                        $('#ttd_error').html('');
                    }
                    if (waktu_evaluasi == '' | waktu_evaluasi == null) {
                        $('#tgl_error').html('*wajib diisi');
                    } else {
                        $('#tgl_error').html('');
                    }
                    if (perkenalan == '' | perkenalan == null) {
                        $('#kenaldpjp_error').html('*wajib diisi');
                    } else {
                        $('#kenaldpjp_error').html('');
                    }
                    if (periksa == '' | periksa == null) {
                        $('#periksa_error').html('*wajib diisi');
                    } else {
                        $('#periksa_error').html('');
                    }
                    if (penunjang == '' | penunjang == null) {
                        $('#penunjang_error').html('*wajib diisi');
                    } else {
                        $('#penunjang_error').html('');
                    }
                    if (konsul == '' | konsul == null) {
                        $('#konsul_error').html('*wajib diisi');
                    } else {
                        $('#konsul_error').html('');
                    }
                    if (terapi == '' | terapi == null) {
                        $('#terapi_error').html('*wajib diisi');
                    } else {
                        $('#terapi_error').html('');
                    }
                    if (harapan == '' | harapan == null) {
                        $('#harapan_error').html('*wajib diisi');
                    } else {
                        $('#harapan_error').html('');
                    }
                    if (pertanyaan == '' | pertanyaan == null) {
                        $('#pertanyaan_error').html('*wajib diisi');
                    } else {
                        $('#pertanyaan_error').html('');
                    }
                    if (salam == '' | salam == null) {
                        $('#salam_error').html('*wajib diisi');
                    } else {
                        $('#salam_error').html('');
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

    function cetak() {
        id = $('#id').val();
        window.location.href = "<?php echo base_url('Erm_ranap/print_evaluasi/') ?>" + id;
    }
</script>