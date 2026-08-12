<<<<<<< HEAD
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Formulir Persetujuan Tindakan Kedokteran</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">

                <div class="panel-body">
                    <div class="form-wrap">

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                        <input type="hidden" class="form-control" value="" id="id">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $nama ?>">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>">

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Tanggal Lahir<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $tgl_lahir ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Dokter Pelaksana Tindakan<span class="help"></span></label>
                                <input type="Text" disabled class="form-control" value="<?= $dpjp ?>">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>Penerima Informasi / Pemberi Persetujuan* </p>
                                    </label>
                                </strong>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Pemberi informasi<span class="help"></span></label>
                                    <span id="peminfo_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="pemberi_info">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Penerima Informasi / pemberi persetujuan **<span class="help"></span></label>
                                    <span id="peninfo_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="penerima_info">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b> Diagnosis (WD & DD): <b /><span id="diagnosis_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="diagnosis" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="diagnosis1" type="checkbox" name="diagnosis">
                                        <label class="control-label" for="diagnosis1">
                                            TANDAI
                                        </label>
                                        <span id="tddiagnosis_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Diagnosis Dasar:<b /><span id="diagnosis_d_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="diagnosis_d" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="diagnosis_d1" type="checkbox" name="diagnosis_d">
                                        <label class="control-label" for="diagnosis_d1">
                                            TANDAI
                                        </label>
                                        <span id="tddiagnosis_d_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Tindakan Kedokteran:<b /<span id="tindakan_error" class="text-danger">><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="tindakan" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="tindakan1" type="checkbox" name="tindakan">
                                        <label class="control-label" for="tindakan1">
                                            TANDAI
                                        </label>
                                        <span id="tdtindakan_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Indikasi Tindakan:<b /><span id="indikasi_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="indikasi" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="indikasi1" type="checkbox" name="indikasi">
                                        <label class="control-label" for="indikasi1">
                                            TANDAI
                                        </label>
                                        <span id="tdindikasi_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Tata Cara: <p style="font-style: italic; font-size: smaller;">Tipe sedasi/anesthesia
                                                uraian singkat prosedur dan
                                                tahapan yang penting.
                                            </p><b /><span id="tata_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="tatacara" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="tatacara1" type="checkbox" name="tatacara">
                                        <label class="control-label" for="tatacara1">
                                            TANDAI
                                        </label>
                                        <span id="tdtata_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Tujuan:<b /><span id="tuj_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="tujuan" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="tujuan1" type="checkbox" name="tujuan">
                                        <label class="control-label" for="tujuan1">
                                            TANDAI
                                        </label>
                                        <span id="tdtuj_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Resiko & Komplikasi<b /><span id="risk_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="risiko" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="risiko1" type="checkbox" name="risiko">
                                        <label class="control-label" for="risiko1">
                                            TANDAI
                                        </label>
                                        <span id="tdrisk_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Prognosis <p style="font-style: italic; font-size: smaller;">Prognosis vital, prognosis fungsi dan
                                                prognosis kesembuhan
                                            </p><b /><span id="prog_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="prognosis" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="prognosis1" type="checkbox" name="prognosis">
                                        <label class="control-label" for="prognosis1">
                                            TANDAI
                                        </label>
                                        <span id="tdprog_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Alternatif & Risiko
                                            Pilihan pengobatan/penatalaksanaan
                                            <b /><span id="alt_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="alt_risiko" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="alt_risiko1" type="checkbox" name="alt_risiko">
                                        <label class="control-label" for="alt_risiko1">
                                            TANDAI
                                        </label>
                                        <span id="tdalt_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Hal lain yang akan dilakukan untuk
                                            menyelamatkan pasien
                                            <p style="font-style: italic;font-size: small;">
                                                Perluasan tindakan
                                                <br>Konsultasi selama tindakan</br>
                                                Resusitasi
                                            </p><b /><span id="hal_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="hal_lain" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="hal_lain1" type="checkbox" name="hal_lain">
                                        <label class="control-label" for="hal_lain1">
                                            TANDAI
                                        </label>
                                        <span id="tdhal_error" class="text-danger"></span>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-6"><b>Dengan ini menyatakan bahwa saya telah menerangkan hal-hal diatas secara benar dan jelas dan memberikan kesempatan untuk bertanya dan/atau berdiskusi<b /><span class="help"></span></label>
                                    <span id="ttdpem_error" class="text-danger"></span>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="ttd_pemberi_info" type="checkbox" name="ttd_pemberi_info">
                                        <label class="control-label" for="ttd_pemberi_info">
                                            Setuju
                                        </label>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-6"><b>Dengan ini menyatakan bahwa saya telah menerima informasi dari dokter sebagaimana di atas kemudian yang saya beri tanda/paraf di kolom kanannya dan telah memahaminya<b /><span class="help"></span></label>
                                    <span id="ttdpen_error" class="text-danger"></span>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="ttd_penerima_info" type="checkbox" name="ttd_penerima_info">
                                        <label class="control-label" for="ttd_penerima_info">
                                            Setuju
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <h5 style="margin-top: 30px;text-align: center;"><strong>
                                        <label class="control-label mb-10 text-left">
                                            PERSETUJUAN TINDAKAN KEDOKTERAN
                                            <span class="help"></span>
                                        </label></strong>
                                </h5>
                                <label class="control-label mb-10 text-left">Dengan ini saya: </label>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Nama <span class="help"></span></label>
                                        <span id="nama_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="text" class="form-control" id="nama">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Umur <span class="help"></span></label>
                                        <span id="umur_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="number" class="form-control" id="umur" placeholder="Tahun">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Alamat <span class="help"></span></label>
                                        <span id="alamat_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="text" class="form-control" id="alamat">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                        <span id="jk_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="jk1" type="radio" name="jk" value="Laki-Laki">
                                            <label class="control-label" for="jk1">Laki-Laki
                                            </label>
                                        </div>
                                        <div class="radio-button radio-button-primary">
                                            <input id="jk2" type="radio" name="jk" value="Perempuan">
                                            <label class="control-label" for="jk2">Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Hubungan dengan pasien</label>
                                        <span id="ghubungan_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="kondisi_umum1" type="radio" name="ghubungan" value="Saya sendiri">
                                            <label class="control-label" for="kondisi_umum1">
                                                Saya sendiri
                                            </label>
                                        </div>
                                        <div class="radio-button radio-button-primary">
                                            <input id="kondisi_umum2" type="radio" name="ghubungan" value="Anak kandung saya">
                                            <label class="control-label" for="kondisi_umum2">
                                                Anak kandung
                                            </label>
                                        </div>
                                        <div class="radio-button radio-button-primary">
                                            <input id="kondisi_umum3" type="radio" name="ghubungan" value="Suami/istri saya">
                                            <label class="control-label" for="kondisi_umum3">
                                                Suami/istri
                                            </label>
                                        </div>

                                        <div class="radio-button radio-button-primary">
                                            <input id="kondisi_umum4" type="radio" name="ghubungan" value="Orang tua kandung saya">
                                            <label class="control-label" for="kondisi_umum4">
                                                Orang tua kandung
                                            </label>
                                        </div>

                                        <div class="radio-button radio-button-primary">
                                            <input id="kondisi_umum6" type="radio" name="ghubungan" value="Lainnya">
                                            <label class="control-label" for="kondisi_umum6">
                                                Lainnya:
                                            </label>
                                        </div>
                                        <div class="col-md-8 has-success">
                                            <input type="text" class="form-control" id="ghubungan" style="display: none;">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">

                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Persetujuan tindakan <span class="help"></span></label>
                                        <span id="tolak_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="text" class="form-control" id="tolak_tindakan">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Tanggal tindakan<span class="help"></span></label>
                                        <span id="tgl_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="date" class="form-control" id="tgl_tindakan">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">dengan ini menyatakan persetujuan/penolakan untuk dilakukannya rujukan terhadap pasien<span class="help"></span></label>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Nama <span class="help"></span></label>
                                            <input type="text" disabled class="form-control" value="<?= $nama ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Umur <span class="help"></span></label>
                                            <input type="text" disabled class="form-control" value="<?php
                                                                                                    $tanggal = new DateTime($tgl_lahir);
                                                                                                    $today = new DateTime();
                                                                                                    $y = $today->diff($tanggal)->y;
                                                                                                    echo  $y . " tahun ";  ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Alamat <span class="help"></span></label>
                                            <input type="text" disabled class="form-control" value="<?= $alamat ?>">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                            <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>">

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">Yang menyatakan *</label>
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
                            <label class="control-label">Saksi 1</label>
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
                            <label class="control-label">Saksi 2</label>
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
                        <div class="form-group text-center" style="margin-top: 30px;">
                            <div class="col-md-12">
                                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                <button type="submit" id="simpan" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                                <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                                <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">DAFTAR PERSETUJUAN TINDAKAN DOKTER</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-hover display  pb-60" id="tabel_terapi">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>PILIH</th>
                                                <th>TANGGAL MASUK</th>
                                                <th>TANGGAL PENGAJUAN</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>PILIH</th>
                                                <th>TANGGAL MASUK</th>
                                                <th>TANGGAL PENGAJUAN</th>
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
    $(document).ready(function(e) {
        id_pelayanan = $('#inPel').val();
        reload_data_id_pel(id_pelayanan);
    });
</script>
<script type="text/javascript">
    $(function() {
        $("#kondisi_umum6").click(function() {
            if ($(this).is(":checked")) {
                $("#ghubungan").show();
            } else {
                $("#ghubungan").hide();
            }
        });
        $("#kondisi_umum1").click(function() {
            if ($(this).is(":checked")) {
                $("#ghubungan").hide();
            }
        });
        $("#kondisi_umum2").click(function() {
            if ($(this).is(":checked")) {
                $("#ghubungan").hide();
            }
        });
        $("#kondisi_umum3").click(function() {
            if ($(this).is(":checked")) {
                $("#ghubungan").hide();
            }
        });
        $("#kondisi_umum4").click(function() {
            if ($(this).is(":checked")) {
                $("#ghubungan").hide();
            }
        });
    });

    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();

        pemberi_info = $('#pemberi_info').val();
        penerima_info = $('#penerima_info').val();
        diagnosis = $('#diagnosis').val();
        td_diagnosis = $('input[name="diagnosis"]:checked').val() ? 'OK' : 'NO';
        diagnosis_d = $('#diagnosis_d').val();
        td_diagnosis_d = $('input[name="diagnosis_d"]:checked').val() ? 'OK' : 'NO';
        tindakan = $('#tindakan').val();
        td_tindakan = $('input[name="tindakan"]:checked').val() ? 'OK' : 'NO';
        indikasi = $('#indikasi').val();
        td_indikasi = $('input[name="indikasi"]:checked').val() ? 'OK' : 'NO';
        tatacara = $('#tatacara').val();
        td_tatacara = $('input[name="tatacara"]:checked').val() ? 'OK' : 'NO';
        tujuan = $('#tujuan').val();
        td_tujuan = $('input[name="tujuan"]:checked').val() ? 'OK' : 'NO';
        risiko = $('#risiko').val();
        td_risiko = $('input[name="risiko"]:checked').val() ? 'OK' : 'NO';
        prognosis = $('#prognosis').val();
        td_prognosis = $('input[name="prognosis"]:checked').val() ? 'OK' : 'NO';
        alt_risiko = $('#alt_risiko').val();
        td_alt_risiko = $('input[name="alt_risiko"]:checked').val() ? 'OK' : 'NO';
        hal_lain = $('#hal_lain').val();
        td_hal_lain = $('input[name="hal_lain"]:checked').val() ? 'OK' : 'NO';

        ttd_pemberi_info = $('input[name="ttd_pemberi_info"]:checked').val() ? 'OK' : 'NO';
        ttd_penerima_info = $('input[name="ttd_penerima_info"]:checked').val() ? 'OK' : 'NO';
        nama = $('#nama').val();
        umur = $('#umur').val();
        alamat = $('#alamat').val();
        jk = $('input[name="jk"]:checked').val();
        ghubungan = $('input[name="ghubungan"]:checked').val();
        if (ghubungan == "Lainnya") {
            ghubungan = $('#ghubungan').val() + ' saya';
        }
        tolak_tindakan = $('#tolak_tindakan').val();
        tgl_tindakan = $('#tgl_tindakan').val();

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
            '&pemberi_info=' + pemberi_info + '&penerima_info=' + penerima_info +
            '&diagnosis=' + diagnosis + '&td_diagnosis=' + td_diagnosis +
            '&diagnosis_d=' + diagnosis_d + '&td_diagnosis_d=' + td_diagnosis_d +
            '&tindakan=' + tindakan +
            '&td_tindakan=' + td_tindakan + '&indikasi=' + indikasi + '&td_indikasi=' + td_indikasi +
            '&tatacara=' + tatacara + '&td_tatacara=' + td_tatacara + '&tujuan=' + tujuan +
            '&td_tujuan=' + td_tujuan + '&risiko=' + risiko + '&td_risiko=' + td_risiko +
            '&prognosis=' + prognosis + '&td_prognosis=' + td_prognosis + '&alt_risiko=' + alt_risiko +
            '&td_alt_risiko=' + td_alt_risiko + '&hal_lain=' + hal_lain + '&td_hal_lain=' + td_hal_lain +
            '&ttd_pemberi_info=' + ttd_pemberi_info +
            '&ttd_penerima_info=' + ttd_penerima_info + '&nama=' + nama + '&umur=' + umur +
            '&alamat=' + alamat + '&jk=' + jk + '&tolak_tindakan=' + tolak_tindakan + '&tgl_tindakan=' + tgl_tindakan +
            '&ttd=' + ttd + '&ttd1=' + ttd1 + '&ttd2=' + ttd2 + '&ghubungan=' + ghubungan;


        $.ajax({
            url: "<?php echo base_url() ?>Erm_per_tin_kedokteran/insert_persetujuan_tindakan",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pelayanan + '/' + id_history;
                } else if (data.error) {
                    if (data.pemberi_info != '') {
                        $('#peminfo_error').html(data.pemberi_info);
                    } else {
                        $('#peminfo_error').html('');
                    }
                    if (data.penerima_info != '') {
                        $('#peninfo_error').html(data.penerima_info);
                    } else {
                        $('#peninfo_error').html('');
                    }

                    if (data.diagnosis != '') {
                        $('#diagnosis_error').html(data.diagnosis);
                    } else {
                        $('#diagnosis_error').html('');
                    }
                    if (data.td_diagnosis != '') {
                        $('#tddiagnosis_error').html(data.td_diagnosis);
                    } else {
                        $('#tddiagnosis_error ').html('');
                    }
                    if (data.diagnosis_d != '') {
                        $('#diagnosis_d_error').html(data.diagnosis_d);
                    } else {
                        $('#diagnosis_d_error').html('');
                    }
                    if (data.td_diagnosis_d != '') {
                        $('#tddiagnosis_d_error').html(data.td_diagnosis_d);
                    } else {
                        $('#tddiagnosis_d_error ').html('');
                    }
                    if (data.tindakan != '') {
                        $('#tindakan_error').html(data.tindakan);
                    } else {
                        $('#tindakan_error').html('');
                    }
                    if (data.td_tindakan != '') {
                        $('#tdtindakan_error').html(data.td_tindakan);
                    } else {
                        $('#tdtindakan_error').html('');
                    }
                    if (data.indikasi != '') {
                        $('#indikasi_error').html(data.indikasi);
                    } else {
                        $('#indikasi_error').html('');
                    }
                    if (data.td_indikasi != '') {
                        $('#tdindikasi_error').html(data.td_indikasi);
                    } else {
                        $('#tdindikasi_error').html('');
                    }
                    if (data.tatacara != '') {
                        $('#tata_error').html(data.tatacara);
                    } else {
                        $('#tata_error').html('');
                    }
                    if (data.td_tatacara != '') {
                        $('#tdtata_error').html(data.td_tatacara);
                    } else {
                        $('#tdtata_error').html('');
                    }
                    if (data.tujuan != '') {
                        $('#tuj_error').html(data.tujuan);
                    } else {
                        $('#tuj_error').html('');
                    }
                    if (data.td_tujuan != '') {
                        $('#tdtuj_error').html(data.td_tujuan);
                    } else {
                        $('#tdtuj_error').html('');
                    }
                    if (data.risiko != '') {
                        $('#risk_error').html(data.risiko);
                    } else {
                        $('#risk_error').html('');
                    }
                    if (data.td_risiko != '') {
                        $('#tdrisk_error').html(data.td_risiko);
                    } else {
                        $('#tdrisk_error ').html('');
                    }
                    if (data.prognosis != '') {
                        $('#prog_error').html(data.prognosis);
                    } else {
                        $('#prog_error').html('');
                    }
                    if (data.td_prognosis != '') {
                        $('#tdprog_error').html(data.td_prognosis);
                    } else {
                        $('#tdprog_error').html('');
                    }
                    if (data.alt_risiko != '') {
                        $('#alt_error').html(data.alt_risiko);
                    } else {
                        $('#alt_error').html('');
                    }
                    if (data.td_alt_risiko != '') {
                        $('#tdalt_error').html(data.td_alt_risiko);
                    } else {
                        $('#tdalt_error').html('');
                    }
                    if (data.hal_lain != '') {
                        $('#hal_error').html(data.hal_lain);
                    } else {
                        $('#hal_error').html('');
                    }
                    if (data.td_hal_lain != '') {
                        $('#tdhal_error').html(data.td_hal_lain);
                    } else {
                        $('#tdhal_error').html('');
                    }

                    if (data.ttd_pemberi_info != '') {
                        $('#ttdpem_error').html(data.ttd_pemberi_info);
                    } else {
                        $('#ttdpem_error').html('');
                    }
                    if (data.ttd_penerima_info != '') {
                        $('#ttdpen_error').html(data.ttd_penerima_info);
                    } else {
                        $('#ttdpen_error').html('');
                    }
                    if (data.nama != '') {
                        $('#nama_error').html(data.nama);
                    } else {
                        $('#nama_error').html('');
                    }
                    if (data.umur != '') {
                        $('#umur_error').html(data.umur);
                    } else {
                        $('#umur_error').html('');
                    }
                    if (data.alamat != '') {
                        $('#alamat_error').html(data.alamat);
                    } else {
                        $('#alamat_error').html('');
                    }
                    if (jk == '' | jk == null) {
                        $('#jk_error').html('*wajib diisi');
                    } else {
                        $('#jk_error').html('');
                    }
                    if (ghubungan == '' | ghubungan == null) {
                        $('#ghubungan_error').html('*wajib diisi');
                    } else {
                        $('#ghubungan_error').html('');
                    }
                    if (data.tolak_tindakan != '') {
                        $('#tolak_error').html(data.tolak_tindakan);
                    } else {
                        $('#tolak_error').html('');
                    }
                    if (data.tgl_tindakan != '') {
                        $('#tgl_error').html(data.tgl_tindakan);
                    } else {
                        $('#tgl_error').html('');
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


    function reload_data_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
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
                "url": '<?php echo base_url('Erm_per_tin_kedokteran/tampil_list_per_tindakan_dokter'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan
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

    function pilih(id) {
        $('#id').val(id);
        $.ajax({
            url: "<?php echo base_url() ?>Erm_per_tin_kedokteran/getPerTindakanDok",
            method: "POST",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                if (data.status_dt == "found") {
                    $('#edit').show();
                    $('#cetak').show();

                    $('#pemberi_info').val(data.pemberi_info);
                    $('#penerima_info').val(data.penerima_info);
                    $('#diagnosis').val(data.diagnosis);
                    if (data.td_diagnosis == "OK") {
                        $('input[name="diagnosis"]').prop("checked", true);
                    }
                    $('#diagnosis_d').val(data.diagnosis_d);
                    if (data.td_diagnosis_d == "OK") {
                        $('input[name="diagnosis_d"]').prop("checked", true);
                    }
                    $('#tindakan').val(data.tindakan);
                    if (data.td_tindakan == "OK") {
                        $('input[name="tindakan"]').prop("checked", true);
                    }
                    $('#indikasi').val(data.indikasi);
                    if (data.td_indikasi == "OK") {
                        $('input[name="indikasi"]').prop("checked", true);
                    }
                    $('#tatacara').val(data.tatacara);
                    if (data.td_tatacara == "OK") {
                        $('input[name="tatacara"]').prop("checked", true);
                    }
                    $('#tujuan').val(data.tujuan);
                    if (data.td_tujuan == "OK") {
                        $('input[name="tujuan"]').prop("checked", true);
                    }
                    $('#risiko').val(data.risiko);
                    if (data.td_risiko == "OK") {
                        $('input[name="risiko"]').prop("checked", true);
                    }
                    $('#prognosis').val(data.prognosis);
                    if (data.td_prognosis == "OK") {
                        $('input[name="prognosis"]').prop("checked", true);
                    }
                    $('#alt_risiko').val(data.alt_risiko);
                    if (data.td_alt_risiko == "OK") {
                        $('input[name="alt_risiko"]').prop("checked", true);
                    }
                    $('#hal_lain').val(data.hal_lain);
                    if (data.td_hal_lain == "OK") {
                        $('input[name="hal_lain"]').prop("checked", true);
                    }
                    if (data.ttd_pemberi_info == "OK") {
                        $('input[name="ttd_pemberi_info"]').prop("checked", true);
                    }
                    if (data.ttd_penerima_info == "OK") {
                        $('input[name="ttd_penerima_info"]').prop("checked", true);
                    }

                    $('#nama').val(data.nama);
                    $('#umur').val(data.umur);
                    $('#alamat').val(data.alamat);
                    if (data.jk == "Laki-Laki") {
                        $('#jk1').prop("checked", true);
                    } else {
                        $('#jk2').prop("checked", true);
                    }
                    if (data.ghubungan == "Saya sendiri") {
                        $('#kondisi_umum1').prop("checked", true);
                    } else if (data.ghubungan == "Anak kandung saya") {
                        $('#kondisi_umum2').prop("checked", true);
                    } else if (data.ghubungan == "Suami/istri saya") {
                        $('#kondisi_umum3').prop("checked", true);
                    } else if (data.ghubungan == "Orang tua kandung saya") {
                        $('#kondisi_umum4').prop("checked", true);
                    } else {
                        $('#kondisi_umum6').prop("checked", true);
                        $("#ghubungan").show();
                        $("#ghubungan").val(data.ghubungan);
                    }
                    $('#tolak_tindakan').val(data.tolak_tindakan);
                    $('#tgl_tindakan').val(data.tgl_tindakan);

                    $('#edit').show();
                    $('#cetak').show();
                    $('#simpan').hide();

                    canvas = document.getElementById('can');
                    canvas1 = document.getElementById('can1');
                    canvas2 = document.getElementById('can2');
                    ctx = canvas.getContext("2d");
                    ctx1 = canvas1.getContext("2d");
                    ctx2 = canvas2.getContext("2d");

                    var img = new Image();
                    var img1 = new Image();
                    var img2 = new Image();
                    img.onload = function() {
                        ctx.drawImage(img, 0, 0, 300, 300);
                        steps.length = 0;
                        steps[no] = ctx.getImageData(0, 0, canvas.width, canvas.height);
                        // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
                    }
                    img.src = "<?php echo base_url(); ?>" + data.ttd;
                    img1.onload = function() {
                        ctx1.drawImage(img1, 0, 0, 300, 300);
                        steps.length = 0;
                        steps[no] = ctx1.getImageData(0, 0, canvas1.width, canvas1.height);
                        // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
                    }
                    img1.src = "<?php echo base_url(); ?>" + data.ttd1;
                    img2.onload = function() {
                        ctx2.drawImage(img2, 0, 0, 300, 300);
                        steps.length = 0;
                        steps[no] = ctx2.getImageData(0, 0, canvas2.width, canvas2.height);
                        // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
                    }
                    img2.src = "<?php echo base_url(); ?>" + data.ttd2;
                    $('#can').show();
                    $('#can1').show();
                    $('#can2').show();
                    // smooth scroll
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: "Data Kosong",
                        confirmButtonColor: "#3cb878",
                    });
                }
            }
        });
        return false;

    }

    function cetak() {
        id = $('#id').val();
        window.location.href = "<?php echo base_url('Erm_igd_edit/print_persetujuan/') ?>" + id;
    }

    function edit() {
        id = $('#id').val();
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();

        pemberi_info = $('#pemberi_info').val();
        penerima_info = $('#penerima_info').val();
        diagnosis = $('#diagnosis').val();
        td_diagnosis = $('input[name="diagnosis"]:checked').val() ? 'OK' : 'NO';
        diagnosis_d = $('#diagnosis_d').val();
        td_diagnosis_d = $('input[name="diagnosis_d"]:checked').val() ? 'OK' : 'NO';
        tindakan = $('#tindakan').val();
        td_tindakan = $('input[name="tindakan"]:checked').val() ? 'OK' : 'NO';
        indikasi = $('#indikasi').val();
        td_indikasi = $('input[name="indikasi"]:checked').val() ? 'OK' : 'NO';
        tatacara = $('#tatacara').val();
        td_tatacara = $('input[name="tatacara"]:checked').val() ? 'OK' : 'NO';
        tujuan = $('#tujuan').val();
        td_tujuan = $('input[name="tujuan"]:checked').val() ? 'OK' : 'NO';
        risiko = $('#risiko').val();
        td_risiko = $('input[name="risiko"]:checked').val() ? 'OK' : 'NO';
        prognosis = $('#prognosis').val();
        td_prognosis = $('input[name="prognosis"]:checked').val() ? 'OK' : 'NO';
        alt_risiko = $('#alt_risiko').val();
        td_alt_risiko = $('input[name="alt_risiko"]:checked').val() ? 'OK' : 'NO';
        hal_lain = $('#hal_lain').val();
        td_hal_lain = $('input[name="hal_lain"]:checked').val() ? 'OK' : 'NO';

        ttd_pemberi_info = $('input[name="ttd_pemberi_info"]:checked').val() ? 'OK' : 'NO';
        ttd_penerima_info = $('input[name="ttd_penerima_info"]:checked').val() ? 'OK' : 'NO';
        nama = $('#nama').val();
        umur = $('#umur').val();
        alamat = $('#alamat').val();
        jk = $('input[name="jk"]:checked').val();
        ghubungan = $('input[name="ghubungan"]:checked').val();
        if (ghubungan == "Lainnya") {
            ghubungan = $('#ghubungan').val() + ' saya';
        }
        tolak_tindakan = $('#tolak_tindakan').val();
        tgl_tindakan = $('#tgl_tindakan').val();
        canvas = document.getElementById('can');
        ttd = canvas.toDataURL("image/png");
        canvas1 = document.getElementById('can1');
        ttd1 = canvas1.toDataURL("image/png");
        canvas2 = document.getElementById('can2');
        ttd2 = canvas2.toDataURL("image/png");

        dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history + '&id=' + id +
            '&pemberi_info=' + pemberi_info + '&penerima_info=' + penerima_info +
            '&diagnosis=' + diagnosis + '&td_diagnosis=' + td_diagnosis +
            '&diagnosis_d=' + diagnosis_d + '&td_diagnosis_d=' + td_diagnosis_d +
            '&tindakan=' + tindakan +
            '&td_tindakan=' + td_tindakan + '&indikasi=' + indikasi + '&td_indikasi=' + td_indikasi +
            '&tatacara=' + tatacara + '&td_tatacara=' + td_tatacara + '&tujuan=' + tujuan +
            '&td_tujuan=' + td_tujuan + '&risiko=' + risiko + '&td_risiko=' + td_risiko +
            '&prognosis=' + prognosis + '&td_prognosis=' + td_prognosis + '&alt_risiko=' + alt_risiko +
            '&td_alt_risiko=' + td_alt_risiko + '&hal_lain=' + hal_lain + '&td_hal_lain=' + td_hal_lain +
            '&ttd_pemberi_info=' + ttd_pemberi_info +
            '&ttd_penerima_info=' + ttd_penerima_info + '&nama=' + nama + '&umur=' + umur +
            '&alamat=' + alamat + '&jk=' + jk + '&tolak_tindakan=' + tolak_tindakan + '&tgl_tindakan=' + tgl_tindakan +
            '&ttd=' + ttd + '&ttd1=' + ttd1 + '&ttd2=' + ttd2 + '&ghubungan=' + ghubungan;


        $.ajax({
            url: "<?php echo base_url() ?>Erm_per_tin_kedokteran/edit_persetujuan_tindakan",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pelayanan + '/' + id_history;
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
=======
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Formulir Persetujuan Tindakan Kedokteran</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">

                <div class="panel-body">
                    <div class="form-wrap">

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                        <input type="hidden" class="form-control" value="" id="id">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $nama ?>">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>">

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Tanggal Lahir<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $tgl_lahir ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Dokter Pelaksana Tindakan<span class="help"></span></label>
                                <input type="Text" disabled class="form-control" value="<?= $dpjp ?>">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">
                                        <p><br>Penerima Informasi / Pemberi Persetujuan* </p>
                                    </label>
                                </strong>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Pemberi informasi<span class="help"></span></label>
                                    <span id="peminfo_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="pemberi_info">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Penerima Informasi / pemberi persetujuan **<span class="help"></span></label>
                                    <span id="peninfo_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="penerima_info">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b> Diagnosis (WD & DD): <b /><span id="diagnosis_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="diagnosis" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="diagnosis1" type="checkbox" name="diagnosis">
                                        <label class="control-label" for="diagnosis1">
                                            TANDAI
                                        </label>
                                        <span id="tddiagnosis_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Diagnosis Dasar:<b /><span id="diagnosis_d_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="diagnosis_d" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="diagnosis_d1" type="checkbox" name="diagnosis_d">
                                        <label class="control-label" for="diagnosis_d1">
                                            TANDAI
                                        </label>
                                        <span id="tddiagnosis_d_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Tindakan Kedokteran:<b /<span id="tindakan_error" class="text-danger">><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="tindakan" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="tindakan1" type="checkbox" name="tindakan">
                                        <label class="control-label" for="tindakan1">
                                            TANDAI
                                        </label>
                                        <span id="tdtindakan_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Indikasi Tindakan:<b /><span id="indikasi_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="indikasi" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="indikasi1" type="checkbox" name="indikasi">
                                        <label class="control-label" for="indikasi1">
                                            TANDAI
                                        </label>
                                        <span id="tdindikasi_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Tata Cara: <p style="font-style: italic; font-size: smaller;">Tipe sedasi/anesthesia
                                                uraian singkat prosedur dan
                                                tahapan yang penting.
                                            </p><b /><span id="tata_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="tatacara" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="tatacara1" type="checkbox" name="tatacara">
                                        <label class="control-label" for="tatacara1">
                                            TANDAI
                                        </label>
                                        <span id="tdtata_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Tujuan:<b /><span id="tuj_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="tujuan" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="tujuan1" type="checkbox" name="tujuan">
                                        <label class="control-label" for="tujuan1">
                                            TANDAI
                                        </label>
                                        <span id="tdtuj_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Resiko & Komplikasi<b /><span id="risk_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="risiko" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="risiko1" type="checkbox" name="risiko">
                                        <label class="control-label" for="risiko1">
                                            TANDAI
                                        </label>
                                        <span id="tdrisk_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Prognosis <p style="font-style: italic; font-size: smaller;">Prognosis vital, prognosis fungsi dan
                                                prognosis kesembuhan
                                            </p><b /><span id="prog_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="prognosis" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="prognosis1" type="checkbox" name="prognosis">
                                        <label class="control-label" for="prognosis1">
                                            TANDAI
                                        </label>
                                        <span id="tdprog_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Alternatif & Risiko
                                            Pilihan pengobatan/penatalaksanaan
                                            <b /><span id="alt_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="alt_risiko" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="alt_risiko1" type="checkbox" name="alt_risiko">
                                        <label class="control-label" for="alt_risiko1">
                                            TANDAI
                                        </label>
                                        <span id="tdalt_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-2"><b>Hal lain yang akan dilakukan untuk
                                            menyelamatkan pasien
                                            <p style="font-style: italic;font-size: small;">
                                                Perluasan tindakan
                                                <br>Konsultasi selama tindakan</br>
                                                Resusitasi
                                            </p><b /><span id="hal_error" class="text-danger"><span class="help"></span></label>
                                    <div class="col-md-3 has-success">
                                        <textarea class="form-control" name="" id="hal_lain" cols="30" rows="3"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="hal_lain1" type="checkbox" name="hal_lain">
                                        <label class="control-label" for="hal_lain1">
                                            TANDAI
                                        </label>
                                        <span id="tdhal_error" class="text-danger"></span>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-6"><b>Dengan ini menyatakan bahwa saya telah menerangkan hal-hal diatas secara benar dan jelas dan memberikan kesempatan untuk bertanya dan/atau berdiskusi<b /><span class="help"></span></label>
                                    <span id="ttdpem_error" class="text-danger"></span>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="ttd_pemberi_info" type="checkbox" name="ttd_pemberi_info">
                                        <label class="control-label" for="ttd_pemberi_info">
                                            Setuju
                                        </label>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-md-6"><b>Dengan ini menyatakan bahwa saya telah menerima informasi dari dokter sebagaimana di atas kemudian yang saya beri tanda/paraf di kolom kanannya dan telah memahaminya<b /><span class="help"></span></label>
                                    <span id="ttdpen_error" class="text-danger"></span>
                                    <div class="checkbox checkbox-success col-md-3">
                                        <input id="ttd_penerima_info" type="checkbox" name="ttd_penerima_info">
                                        <label class="control-label" for="ttd_penerima_info">
                                            Setuju
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <h5 style="margin-top: 30px;text-align: center;"><strong>
                                        <label class="control-label mb-10 text-left">
                                            PERSETUJUAN TINDAKAN KEDOKTERAN
                                            <span class="help"></span>
                                        </label></strong>
                                </h5>
                                <label class="control-label mb-10 text-left">Dengan ini saya: </label>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Nama <span class="help"></span></label>
                                        <span id="nama_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="text" class="form-control" id="nama">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Umur <span class="help"></span></label>
                                        <span id="umur_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="number" class="form-control" id="umur" placeholder="Tahun">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Alamat <span class="help"></span></label>
                                        <span id="alamat_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="text" class="form-control" id="alamat">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                        <span id="jk_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="jk1" type="radio" name="jk" value="Laki-Laki">
                                            <label class="control-label" for="jk1">Laki-Laki
                                            </label>
                                        </div>
                                        <div class="radio-button radio-button-primary">
                                            <input id="jk2" type="radio" name="jk" value="Perempuan">
                                            <label class="control-label" for="jk2">Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Hubungan dengan pasien</label>
                                        <span id="ghubungan_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <input id="kondisi_umum1" type="radio" name="ghubungan" value="Saya sendiri">
                                            <label class="control-label" for="kondisi_umum1">
                                                Saya sendiri
                                            </label>
                                        </div>
                                        <div class="radio-button radio-button-primary">
                                            <input id="kondisi_umum2" type="radio" name="ghubungan" value="Anak kandung saya">
                                            <label class="control-label" for="kondisi_umum2">
                                                Anak kandung
                                            </label>
                                        </div>
                                        <div class="radio-button radio-button-primary">
                                            <input id="kondisi_umum3" type="radio" name="ghubungan" value="Suami/istri saya">
                                            <label class="control-label" for="kondisi_umum3">
                                                Suami/istri
                                            </label>
                                        </div>

                                        <div class="radio-button radio-button-primary">
                                            <input id="kondisi_umum4" type="radio" name="ghubungan" value="Orang tua kandung saya">
                                            <label class="control-label" for="kondisi_umum4">
                                                Orang tua kandung
                                            </label>
                                        </div>

                                        <div class="radio-button radio-button-primary">
                                            <input id="kondisi_umum6" type="radio" name="ghubungan" value="Lainnya">
                                            <label class="control-label" for="kondisi_umum6">
                                                Lainnya:
                                            </label>
                                        </div>
                                        <div class="col-md-8 has-success">
                                            <input type="text" class="form-control" id="ghubungan" style="display: none;">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">

                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Persetujuan tindakan <span class="help"></span></label>
                                        <span id="tolak_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="text" class="form-control" id="tolak_tindakan">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Tanggal tindakan<span class="help"></span></label>
                                        <span id="tgl_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="date" class="form-control" id="tgl_tindakan">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">dengan ini menyatakan persetujuan/penolakan untuk dilakukannya rujukan terhadap pasien<span class="help"></span></label>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Nama <span class="help"></span></label>
                                            <input type="text" disabled class="form-control" value="<?= $nama ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Umur <span class="help"></span></label>
                                            <input type="text" disabled class="form-control" value="<?php
                                                                                                    $tanggal = new DateTime($tgl_lahir);
                                                                                                    $today = new DateTime();
                                                                                                    $y = $today->diff($tanggal)->y;
                                                                                                    echo  $y . " tahun ";  ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Alamat <span class="help"></span></label>
                                            <input type="text" disabled class="form-control" value="<?= $alamat ?>">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-md-6">
                                            <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                            <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>">

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">Yang menyatakan *</label>
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
                            <label class="control-label">Saksi 1</label>
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
                            <label class="control-label">Saksi 2</label>
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
                        <div class="form-group text-center" style="margin-top: 30px;">
                            <div class="col-md-12">
                                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                <button type="submit" id="simpan" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                                <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                                <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">DAFTAR PERSETUJUAN TINDAKAN DOKTER</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-hover display  pb-60" id="tabel_terapi">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>PILIH</th>
                                                <th>TANGGAL MASUK</th>
                                                <th>TANGGAL PENGAJUAN</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>PILIH</th>
                                                <th>TANGGAL MASUK</th>
                                                <th>TANGGAL PENGAJUAN</th>
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
    $(document).ready(function(e) {
        id_pelayanan = $('#inPel').val();
        reload_data_id_pel(id_pelayanan);
    });
</script>
<script type="text/javascript">
    $(function() {
        $("#kondisi_umum6").click(function() {
            if ($(this).is(":checked")) {
                $("#ghubungan").show();
            } else {
                $("#ghubungan").hide();
            }
        });
        $("#kondisi_umum1").click(function() {
            if ($(this).is(":checked")) {
                $("#ghubungan").hide();
            }
        });
        $("#kondisi_umum2").click(function() {
            if ($(this).is(":checked")) {
                $("#ghubungan").hide();
            }
        });
        $("#kondisi_umum3").click(function() {
            if ($(this).is(":checked")) {
                $("#ghubungan").hide();
            }
        });
        $("#kondisi_umum4").click(function() {
            if ($(this).is(":checked")) {
                $("#ghubungan").hide();
            }
        });
    });

    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();

        pemberi_info = $('#pemberi_info').val();
        penerima_info = $('#penerima_info').val();
        diagnosis = $('#diagnosis').val();
        td_diagnosis = $('input[name="diagnosis"]:checked').val() ? 'OK' : 'NO';
        diagnosis_d = $('#diagnosis_d').val();
        td_diagnosis_d = $('input[name="diagnosis_d"]:checked').val() ? 'OK' : 'NO';
        tindakan = $('#tindakan').val();
        td_tindakan = $('input[name="tindakan"]:checked').val() ? 'OK' : 'NO';
        indikasi = $('#indikasi').val();
        td_indikasi = $('input[name="indikasi"]:checked').val() ? 'OK' : 'NO';
        tatacara = $('#tatacara').val();
        td_tatacara = $('input[name="tatacara"]:checked').val() ? 'OK' : 'NO';
        tujuan = $('#tujuan').val();
        td_tujuan = $('input[name="tujuan"]:checked').val() ? 'OK' : 'NO';
        risiko = $('#risiko').val();
        td_risiko = $('input[name="risiko"]:checked').val() ? 'OK' : 'NO';
        prognosis = $('#prognosis').val();
        td_prognosis = $('input[name="prognosis"]:checked').val() ? 'OK' : 'NO';
        alt_risiko = $('#alt_risiko').val();
        td_alt_risiko = $('input[name="alt_risiko"]:checked').val() ? 'OK' : 'NO';
        hal_lain = $('#hal_lain').val();
        td_hal_lain = $('input[name="hal_lain"]:checked').val() ? 'OK' : 'NO';

        ttd_pemberi_info = $('input[name="ttd_pemberi_info"]:checked').val() ? 'OK' : 'NO';
        ttd_penerima_info = $('input[name="ttd_penerima_info"]:checked').val() ? 'OK' : 'NO';
        nama = $('#nama').val();
        umur = $('#umur').val();
        alamat = $('#alamat').val();
        jk = $('input[name="jk"]:checked').val();
        ghubungan = $('input[name="ghubungan"]:checked').val();
        if (ghubungan == "Lainnya") {
            ghubungan = $('#ghubungan').val() + ' saya';
        }
        tolak_tindakan = $('#tolak_tindakan').val();
        tgl_tindakan = $('#tgl_tindakan').val();

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
            '&pemberi_info=' + pemberi_info + '&penerima_info=' + penerima_info +
            '&diagnosis=' + diagnosis + '&td_diagnosis=' + td_diagnosis +
            '&diagnosis_d=' + diagnosis_d + '&td_diagnosis_d=' + td_diagnosis_d +
            '&tindakan=' + tindakan +
            '&td_tindakan=' + td_tindakan + '&indikasi=' + indikasi + '&td_indikasi=' + td_indikasi +
            '&tatacara=' + tatacara + '&td_tatacara=' + td_tatacara + '&tujuan=' + tujuan +
            '&td_tujuan=' + td_tujuan + '&risiko=' + risiko + '&td_risiko=' + td_risiko +
            '&prognosis=' + prognosis + '&td_prognosis=' + td_prognosis + '&alt_risiko=' + alt_risiko +
            '&td_alt_risiko=' + td_alt_risiko + '&hal_lain=' + hal_lain + '&td_hal_lain=' + td_hal_lain +
            '&ttd_pemberi_info=' + ttd_pemberi_info +
            '&ttd_penerima_info=' + ttd_penerima_info + '&nama=' + nama + '&umur=' + umur +
            '&alamat=' + alamat + '&jk=' + jk + '&tolak_tindakan=' + tolak_tindakan + '&tgl_tindakan=' + tgl_tindakan +
            '&ttd=' + ttd + '&ttd1=' + ttd1 + '&ttd2=' + ttd2 + '&ghubungan=' + ghubungan;


        $.ajax({
            url: "<?php echo base_url() ?>Erm_per_tin_kedokteran/insert_persetujuan_tindakan",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pelayanan + '/' + id_history;
                } else if (data.error) {
                    if (data.pemberi_info != '') {
                        $('#peminfo_error').html(data.pemberi_info);
                    } else {
                        $('#peminfo_error').html('');
                    }
                    if (data.penerima_info != '') {
                        $('#peninfo_error').html(data.penerima_info);
                    } else {
                        $('#peninfo_error').html('');
                    }

                    if (data.diagnosis != '') {
                        $('#diagnosis_error').html(data.diagnosis);
                    } else {
                        $('#diagnosis_error').html('');
                    }
                    if (data.td_diagnosis != '') {
                        $('#tddiagnosis_error').html(data.td_diagnosis);
                    } else {
                        $('#tddiagnosis_error ').html('');
                    }
                    if (data.diagnosis_d != '') {
                        $('#diagnosis_d_error').html(data.diagnosis_d);
                    } else {
                        $('#diagnosis_d_error').html('');
                    }
                    if (data.td_diagnosis_d != '') {
                        $('#tddiagnosis_d_error').html(data.td_diagnosis_d);
                    } else {
                        $('#tddiagnosis_d_error ').html('');
                    }
                    if (data.tindakan != '') {
                        $('#tindakan_error').html(data.tindakan);
                    } else {
                        $('#tindakan_error').html('');
                    }
                    if (data.td_tindakan != '') {
                        $('#tdtindakan_error').html(data.td_tindakan);
                    } else {
                        $('#tdtindakan_error').html('');
                    }
                    if (data.indikasi != '') {
                        $('#indikasi_error').html(data.indikasi);
                    } else {
                        $('#indikasi_error').html('');
                    }
                    if (data.td_indikasi != '') {
                        $('#tdindikasi_error').html(data.td_indikasi);
                    } else {
                        $('#tdindikasi_error').html('');
                    }
                    if (data.tatacara != '') {
                        $('#tata_error').html(data.tatacara);
                    } else {
                        $('#tata_error').html('');
                    }
                    if (data.td_tatacara != '') {
                        $('#tdtata_error').html(data.td_tatacara);
                    } else {
                        $('#tdtata_error').html('');
                    }
                    if (data.tujuan != '') {
                        $('#tuj_error').html(data.tujuan);
                    } else {
                        $('#tuj_error').html('');
                    }
                    if (data.td_tujuan != '') {
                        $('#tdtuj_error').html(data.td_tujuan);
                    } else {
                        $('#tdtuj_error').html('');
                    }
                    if (data.risiko != '') {
                        $('#risk_error').html(data.risiko);
                    } else {
                        $('#risk_error').html('');
                    }
                    if (data.td_risiko != '') {
                        $('#tdrisk_error').html(data.td_risiko);
                    } else {
                        $('#tdrisk_error ').html('');
                    }
                    if (data.prognosis != '') {
                        $('#prog_error').html(data.prognosis);
                    } else {
                        $('#prog_error').html('');
                    }
                    if (data.td_prognosis != '') {
                        $('#tdprog_error').html(data.td_prognosis);
                    } else {
                        $('#tdprog_error').html('');
                    }
                    if (data.alt_risiko != '') {
                        $('#alt_error').html(data.alt_risiko);
                    } else {
                        $('#alt_error').html('');
                    }
                    if (data.td_alt_risiko != '') {
                        $('#tdalt_error').html(data.td_alt_risiko);
                    } else {
                        $('#tdalt_error').html('');
                    }
                    if (data.hal_lain != '') {
                        $('#hal_error').html(data.hal_lain);
                    } else {
                        $('#hal_error').html('');
                    }
                    if (data.td_hal_lain != '') {
                        $('#tdhal_error').html(data.td_hal_lain);
                    } else {
                        $('#tdhal_error').html('');
                    }

                    if (data.ttd_pemberi_info != '') {
                        $('#ttdpem_error').html(data.ttd_pemberi_info);
                    } else {
                        $('#ttdpem_error').html('');
                    }
                    if (data.ttd_penerima_info != '') {
                        $('#ttdpen_error').html(data.ttd_penerima_info);
                    } else {
                        $('#ttdpen_error').html('');
                    }
                    if (data.nama != '') {
                        $('#nama_error').html(data.nama);
                    } else {
                        $('#nama_error').html('');
                    }
                    if (data.umur != '') {
                        $('#umur_error').html(data.umur);
                    } else {
                        $('#umur_error').html('');
                    }
                    if (data.alamat != '') {
                        $('#alamat_error').html(data.alamat);
                    } else {
                        $('#alamat_error').html('');
                    }
                    if (jk == '' | jk == null) {
                        $('#jk_error').html('*wajib diisi');
                    } else {
                        $('#jk_error').html('');
                    }
                    if (ghubungan == '' | ghubungan == null) {
                        $('#ghubungan_error').html('*wajib diisi');
                    } else {
                        $('#ghubungan_error').html('');
                    }
                    if (data.tolak_tindakan != '') {
                        $('#tolak_error').html(data.tolak_tindakan);
                    } else {
                        $('#tolak_error').html('');
                    }
                    if (data.tgl_tindakan != '') {
                        $('#tgl_error').html(data.tgl_tindakan);
                    } else {
                        $('#tgl_error').html('');
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


    function reload_data_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
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
                "url": '<?php echo base_url('Erm_per_tin_kedokteran/tampil_list_per_tindakan_dokter'); ?>',
                "type": 'POST',
                "data": {
                    id_pelayanan: id_pelayanan
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

    function pilih(id) {
        $('#id').val(id);
        $.ajax({
            url: "<?php echo base_url() ?>Erm_per_tin_kedokteran/getPerTindakanDok",
            method: "POST",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                if (data.status_dt == "found") {
                    $('#edit').show();
                    $('#cetak').show();

                    $('#pemberi_info').val(data.pemberi_info);
                    $('#penerima_info').val(data.penerima_info);
                    $('#diagnosis').val(data.diagnosis);
                    if (data.td_diagnosis == "OK") {
                        $('input[name="diagnosis"]').prop("checked", true);
                    }
                    $('#diagnosis_d').val(data.diagnosis_d);
                    if (data.td_diagnosis_d == "OK") {
                        $('input[name="diagnosis_d"]').prop("checked", true);
                    }
                    $('#tindakan').val(data.tindakan);
                    if (data.td_tindakan == "OK") {
                        $('input[name="tindakan"]').prop("checked", true);
                    }
                    $('#indikasi').val(data.indikasi);
                    if (data.td_indikasi == "OK") {
                        $('input[name="indikasi"]').prop("checked", true);
                    }
                    $('#tatacara').val(data.tatacara);
                    if (data.td_tatacara == "OK") {
                        $('input[name="tatacara"]').prop("checked", true);
                    }
                    $('#tujuan').val(data.tujuan);
                    if (data.td_tujuan == "OK") {
                        $('input[name="tujuan"]').prop("checked", true);
                    }
                    $('#risiko').val(data.risiko);
                    if (data.td_risiko == "OK") {
                        $('input[name="risiko"]').prop("checked", true);
                    }
                    $('#prognosis').val(data.prognosis);
                    if (data.td_prognosis == "OK") {
                        $('input[name="prognosis"]').prop("checked", true);
                    }
                    $('#alt_risiko').val(data.alt_risiko);
                    if (data.td_alt_risiko == "OK") {
                        $('input[name="alt_risiko"]').prop("checked", true);
                    }
                    $('#hal_lain').val(data.hal_lain);
                    if (data.td_hal_lain == "OK") {
                        $('input[name="hal_lain"]').prop("checked", true);
                    }
                    if (data.ttd_pemberi_info == "OK") {
                        $('input[name="ttd_pemberi_info"]').prop("checked", true);
                    }
                    if (data.ttd_penerima_info == "OK") {
                        $('input[name="ttd_penerima_info"]').prop("checked", true);
                    }

                    $('#nama').val(data.nama);
                    $('#umur').val(data.umur);
                    $('#alamat').val(data.alamat);
                    if (data.jk == "Laki-Laki") {
                        $('#jk1').prop("checked", true);
                    } else {
                        $('#jk2').prop("checked", true);
                    }
                    if (data.ghubungan == "Saya sendiri") {
                        $('#kondisi_umum1').prop("checked", true);
                    } else if (data.ghubungan == "Anak kandung saya") {
                        $('#kondisi_umum2').prop("checked", true);
                    } else if (data.ghubungan == "Suami/istri saya") {
                        $('#kondisi_umum3').prop("checked", true);
                    } else if (data.ghubungan == "Orang tua kandung saya") {
                        $('#kondisi_umum4').prop("checked", true);
                    } else {
                        $('#kondisi_umum6').prop("checked", true);
                        $("#ghubungan").show();
                        $("#ghubungan").val(data.ghubungan);
                    }
                    $('#tolak_tindakan').val(data.tolak_tindakan);
                    $('#tgl_tindakan').val(data.tgl_tindakan);

                    $('#edit').show();
                    $('#cetak').show();
                    $('#simpan').hide();

                    canvas = document.getElementById('can');
                    canvas1 = document.getElementById('can1');
                    canvas2 = document.getElementById('can2');
                    ctx = canvas.getContext("2d");
                    ctx1 = canvas1.getContext("2d");
                    ctx2 = canvas2.getContext("2d");

                    var img = new Image();
                    var img1 = new Image();
                    var img2 = new Image();
                    img.onload = function() {
                        ctx.drawImage(img, 0, 0, 300, 300);
                        steps.length = 0;
                        steps[no] = ctx.getImageData(0, 0, canvas.width, canvas.height);
                        // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
                    }
                    img.src = "<?php echo base_url(); ?>" + data.ttd;
                    img1.onload = function() {
                        ctx1.drawImage(img1, 0, 0, 300, 300);
                        steps.length = 0;
                        steps[no] = ctx1.getImageData(0, 0, canvas1.width, canvas1.height);
                        // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
                    }
                    img1.src = "<?php echo base_url(); ?>" + data.ttd1;
                    img2.onload = function() {
                        ctx2.drawImage(img2, 0, 0, 300, 300);
                        steps.length = 0;
                        steps[no] = ctx2.getImageData(0, 0, canvas2.width, canvas2.height);
                        // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
                    }
                    img2.src = "<?php echo base_url(); ?>" + data.ttd2;
                    $('#can').show();
                    $('#can1').show();
                    $('#can2').show();
                    // smooth scroll
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } else {
                    swal({
                        title: "Gagal!",
                        type: "warning",
                        text: "Data Kosong",
                        confirmButtonColor: "#3cb878",
                    });
                }
            }
        });
        return false;

    }

    function cetak() {
        id = $('#id').val();
        window.location.href = "<?php echo base_url('Erm_igd_edit/print_persetujuan/') ?>" + id;
    }

    function edit() {
        id = $('#id').val();
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();

        pemberi_info = $('#pemberi_info').val();
        penerima_info = $('#penerima_info').val();
        diagnosis = $('#diagnosis').val();
        td_diagnosis = $('input[name="diagnosis"]:checked').val() ? 'OK' : 'NO';
        diagnosis_d = $('#diagnosis_d').val();
        td_diagnosis_d = $('input[name="diagnosis_d"]:checked').val() ? 'OK' : 'NO';
        tindakan = $('#tindakan').val();
        td_tindakan = $('input[name="tindakan"]:checked').val() ? 'OK' : 'NO';
        indikasi = $('#indikasi').val();
        td_indikasi = $('input[name="indikasi"]:checked').val() ? 'OK' : 'NO';
        tatacara = $('#tatacara').val();
        td_tatacara = $('input[name="tatacara"]:checked').val() ? 'OK' : 'NO';
        tujuan = $('#tujuan').val();
        td_tujuan = $('input[name="tujuan"]:checked').val() ? 'OK' : 'NO';
        risiko = $('#risiko').val();
        td_risiko = $('input[name="risiko"]:checked').val() ? 'OK' : 'NO';
        prognosis = $('#prognosis').val();
        td_prognosis = $('input[name="prognosis"]:checked').val() ? 'OK' : 'NO';
        alt_risiko = $('#alt_risiko').val();
        td_alt_risiko = $('input[name="alt_risiko"]:checked').val() ? 'OK' : 'NO';
        hal_lain = $('#hal_lain').val();
        td_hal_lain = $('input[name="hal_lain"]:checked').val() ? 'OK' : 'NO';

        ttd_pemberi_info = $('input[name="ttd_pemberi_info"]:checked').val() ? 'OK' : 'NO';
        ttd_penerima_info = $('input[name="ttd_penerima_info"]:checked').val() ? 'OK' : 'NO';
        nama = $('#nama').val();
        umur = $('#umur').val();
        alamat = $('#alamat').val();
        jk = $('input[name="jk"]:checked').val();
        ghubungan = $('input[name="ghubungan"]:checked').val();
        if (ghubungan == "Lainnya") {
            ghubungan = $('#ghubungan').val() + ' saya';
        }
        tolak_tindakan = $('#tolak_tindakan').val();
        tgl_tindakan = $('#tgl_tindakan').val();
        canvas = document.getElementById('can');
        ttd = canvas.toDataURL("image/png");
        canvas1 = document.getElementById('can1');
        ttd1 = canvas1.toDataURL("image/png");
        canvas2 = document.getElementById('can2');
        ttd2 = canvas2.toDataURL("image/png");

        dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history + '&id=' + id +
            '&pemberi_info=' + pemberi_info + '&penerima_info=' + penerima_info +
            '&diagnosis=' + diagnosis + '&td_diagnosis=' + td_diagnosis +
            '&diagnosis_d=' + diagnosis_d + '&td_diagnosis_d=' + td_diagnosis_d +
            '&tindakan=' + tindakan +
            '&td_tindakan=' + td_tindakan + '&indikasi=' + indikasi + '&td_indikasi=' + td_indikasi +
            '&tatacara=' + tatacara + '&td_tatacara=' + td_tatacara + '&tujuan=' + tujuan +
            '&td_tujuan=' + td_tujuan + '&risiko=' + risiko + '&td_risiko=' + td_risiko +
            '&prognosis=' + prognosis + '&td_prognosis=' + td_prognosis + '&alt_risiko=' + alt_risiko +
            '&td_alt_risiko=' + td_alt_risiko + '&hal_lain=' + hal_lain + '&td_hal_lain=' + td_hal_lain +
            '&ttd_pemberi_info=' + ttd_pemberi_info +
            '&ttd_penerima_info=' + ttd_penerima_info + '&nama=' + nama + '&umur=' + umur +
            '&alamat=' + alamat + '&jk=' + jk + '&tolak_tindakan=' + tolak_tindakan + '&tgl_tindakan=' + tgl_tindakan +
            '&ttd=' + ttd + '&ttd1=' + ttd1 + '&ttd2=' + ttd2 + '&ghubungan=' + ghubungan;


        $.ajax({
            url: "<?php echo base_url() ?>Erm_per_tin_kedokteran/edit_persetujuan_tindakan",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?php echo base_url('Erm_igd/form/') ?>" + id_pelayanan + '/' + id_history;
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>