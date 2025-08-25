<style>
    .radio-inline {
        color:black;
    }
    .form-check-label{
        color:black;
    }
    .control-label{
        font-weight: bold;
    }    
</style>

<!-- Row-->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">
                        SURVEILANS INFEKSI HAIs RUMAH SAKIT
                    </h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        <form id="mainForm">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="inNoRM" class="control-label mb-10 text-left">No.Rm<span class="help"></span></label>
                                <input type="text" name="inNoRM" readonly id="inNoRM" class="form-control" value="<?= $no_rm ?>">
                                <input type="hidden" class="form-control" name="inPel" value="<?= $id_pelayanan ?>" id="inPel">
                                <input type="hidden" class="form-control" name="inHis" value="<?= $id_history ?>" id="inHis">
                                <input type="hidden" name="idMain" id="idMain">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="inNama" class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" name="inNama" id="inNama" class="form-control" value="<?= $nama ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="injenKel" class="control-label mb-10 text-left">Jenis Kelamin<span class="help"></span></label>
                                <input type="text" name="injenKel" id="jenKel" class="form-control" disabled value="<?= $jenis_kelamin ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="intglLahir" class="control-label mb-10 text-left">Tanggal Lahir<span class="help"></span></label>
                                <input type="text" name="intglLahir" id="intglLahir" class="form-control" value="<?php
                                                                                    $tanggal = new DateTime($tgl_lahir);
                                                                                    $today = new DateTime();
                                                                                    $y = $today->diff($tanggal)->y;
                                                                                    echo $tanggal->format('Y-m-d') ." / ".$y . " tahun";  ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5 style="margin: top 30px;">
                            <strong>
                                <label  class="control-label mb-10 text-left">Pengawasan Khusus<span class="help"></span></label>
                            </strong>
                            </h5>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="tgl_masuk" class="control-label mb-10 text-left">Tanggal Masuk</label>
                                <div class="has-success">
                                <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control" value="<?= $tgl_masuk; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="waktu_masuk" class="control-label mb-10 text-left">Waktu Masuk</label>
                                <div class="has-success">
                                <input type="time" name="waktu_masuk" id="waktu_masuk" class="form-control" value="<?= $waktu_masuk; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="diagnosa" class="control-label mb-10 text-left">Diagnosa Waktu Masuk</label>
                                <div class="has-success" id="the-basics">
                                    <input type="text" name="diagnosaMasuk" id="diagnosaMasuk" class="form-control typeahead filled-input" style="width: 284.17px;">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="DokterPenanggungJawab" class="control-label mb-10 text-left">Dokter Penanggung Jawab</label>
                                <div class="has-success">
                                    <select name="dokterPenanggung" id="dokterPenanggung" class="form-control select2" data-toggle="select2"></select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="ket" class="control-label mb-10 text-left">Spesialis Penyakit/Kategori Ruangan</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <ul>
                                    <li>
                                        <label for="spesialis1" class="radio-inline" style=" padding-right:25px;"><input type="radio"  name="spesialis"  id="spesialis1" value="Penyakit Dalam">Penyakit Dalam </label>
                                        <label for="spesialis2" class="radio-inline" style=" padding-right:56px;"><input type="radio"  name="spesialis"  id="spesialis2" value="Syaraf">Syaraf</label>
                                        <label for="spesialis3" class="radio-inline"><input type="radio"  name="spesialis"  id="spesialis3" value="Obstetri & Ginekologi">Obstetri & Ginekologi</label>
                                    </li>
                                    <li>
                                        <label for="spesialis4" class="radio-inline" style=" padding-right:36px;"><input type="radio"  name="spesialis"  id="spesialis4" value="Bedah Umum">Bedah Umum</label>
                                        <label for="spesialis5" class="radio-inline" style=" padding-right:65px;"><input type="radio"  name="spesialis"  id="spesialis5" value="Anak">Anak</label>
                                        <label for="spesialis6" class="radio-inline"><input type="radio"  name="spesialis"  id="spesialis6" value="THT">THT</label>
                                    </li>
                                    <li>
                                        <label for="spesialis7" class="radio-inline"style=" padding-right:14px;"><input type="radio"  name="spesialis"  id="spesialis7" value="Bedah Orthopedi">Bedah Orthopedi</label>
                                        <label for="spesialis8" class="radio-inline"><input type="radio"  name="spesialis"  id="spesialis8" value="Neonatus">Neonatus/Bayi</label>
                                        <label for="spesialis9" class="radio-inline"><input type="radio"  name="spesialis"  id="spesialis9" value="Umum">Umum</label>
                                    </li>
                                    <li>
                                        <label for="spesialis10" class="radio-inline"><input type="radio" id="spesialis10" name="spesialis" value="Lain-lain">Lain-Lain : <div class="has-success"><input type="text" style="display:none;" id="dtspesialis10" class="form-control"></div> </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6" id="theButton" style="display:none;">
                                    <a href="" class="btn btn-success mb-3" id="btnIVL" data-toggle="modal" data-target="#modalIVL" onclick="$('#formIVL').trigger('reset');$('#simpanIVL').show();$('#updateIVL').hide()">IVL</a>
                                    <a href="" class="btn btn-success mb-3" id="btnISK" data-toggle="modal" data-target="#modalISK" onclick="$('#formISK').trigger('reset');$('#simpanISK').show();$('#updateISK').hide()">ISK</a>
                                    <a href="" class="btn btn-success mb-3" id="btnVAP" data-toggle="modal" data-target="#modalVAP" onclick="$('#formVAP').trigger('reset');$('#simpanVAP').show();$('#updateVAP').hide()">VAP</a>
                                    <br>
                                    <br>
                                    <a href="" class="btn btn-success mb-3" id="btnCVL" data-toggle="modal" data-target="#modalCVL" onclick="$('#formCVL').trigger('reset');$('#simpanCVL').show();$('#updateCVL').hide()">CVL</a> 
                                    <a href="" class="btn btn-success mb-3" id="btnDCB" data-toggle="modal" data-target="#modalDCB" onclick="$('#formDCB').trigger('reset');$('#simpanDCB').show();$('#updateDCB').hide()">DCB</a>
                                    <a href="" class="btn btn-success mb-3" id="btnIDO" data-toggle="modal" data-target="#modalIDO" onclick="$('#formIDO').trigger('reset');$('#simpanIDO').show();$('#updateIDO').hide()">IDO</a>  
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="ket" class="control-label mb-10 text-left">Pemeriksaan Kultur :</label>
                        </div>  

                        <div class="form-group">
                            <div class="col-md-12">
                                <ul>
                                    <li>
                                        <label for="pemeriksaanKultur" class="radio-inline"><input type="radio" name="pemeriksaanKultur" id="pemeriksaanKultur" value="Ya">Ya</label>
                                        <label for="pemeriksaanKultur" class="radio-inline"><input type="radio" name="pemeriksaanKultur" id="pemeriksaanKultur" value="Tidak">Tidak</label>
                                    </li>
                                    <li id="dtpemeriksaanKultur" style="display:none;">  
                                        <div class="form-group">
                                             <div class="col-md-3">
                                                <label for="tglPeriksa" class="form-control" id="tglPeriksa" name="tglPeriksa">Tanggal Periksa</label>
                                                    <div class="has-success">
                                                    <input type="date" name="tglPeriksa" id="tglPeriksa" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <div class="col-md-3">
                                                    <label for="hasilPeriksa" class="form-control" id="hasilPeriksa" name="hasilPeriksa">Hasil</label>
                                                    <div class="has-success">
                                                    <input type="text" name="hasilPeriksa" id="hasilPeriksa" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        </form>

                        <div class="form-group text-center" style="margin-top:30px;">
                            <div class="col-md-12">
                                <label  class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                            </div>
                            <div class="col-md-4">
      
                            </div>
                        </div>

                        <div class="form-group text-center" style="margin-top:30px;">
                            <div class="col-md-12">
                                <labe class="control-label mb-10 text-left">&nbsp;<span class="help"></span></labe>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-default btn-anim  btn-sm" id="kembaliPage" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                <a class="btn btn-default btn-anim  btn-sm" id="hapusData" style="display:none;margin-right: 20px; margin-left: 30px;"><span class="btn-text">HAPUS</span></a>
                                <a class="btn btn-success btn-anim  btn-sm" id="simpanData" style="margin-right: 20px; margin-left: 30px;"><span class="btn-text">SIMPAN</span></a>
                                <a class="btn btn-warning btn-anim  btn-sm" id="updateData" style="display:none;margin-right: 20px; margin-left: 30px;"><span class="btn-text">UPDATE</span></a>
                            </div>
                        </div>

                        <!--MODAL IVL-->
                        <div class="modal fade" id="modalIVL" aria-hidden="true" role="dialog" aria-labelledby="modalTambahModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <strong>
                                            <h5>
                                                <label for="teks" class="control-label mb-10 text-left">Pemasangan IVL/INFUS<span class="help"></span></label>
                                            </h5>
                                        </strong>
                                        <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <hr>

                                    <div class="modal-body">
                                        <form id="formIVL">
                                        <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <label for="Tempat Insersi Infus (Vena)" class="control-label mb-10 text-left">Tempat Insersi Infus (Vena)</label>
                                                    <span id="tmpInsersi_error" class="text-danger"></span>
                                                    <div class="has-success">
                                                        <input type="text" name="tmpInsersi" id="tmpInsersi" class="form-control">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label  class="control-label mb-10 text-left">Tanggal Pemasangan <span class="help"></span></label>
                                                    <span id="TglPemasangan_error" class="text-danger"></span>
                                                    <div class="has-success">
                                                        <input type="date" name="tglIVLDari" id="tglIVLDari" class="form-control">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>


                                                <div class="col-md-3">
                                                    <label  class="control-label mb-10 text-left">Hingga<span class="help"></span></label>
                                                    <span id="TglPemasangan_error" class="text-danger"></span>
                                                    <div class="has-success">
                                                        <input type="date" name="tglIVLHingga" id="tglIVLHingga" class="form-control">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label  class="control-label mb-10 text-left">Unit <span class="help"></span></label>
                                                    <span id="unit_error" class="text-danger"></span>
                                                    <div class="has-success">
                                                        <input type="text" name="IVLunit" id="IVLunit" class="form-control">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label  class="control-label mb-10 text-left">Nama Dokter</label>
                                                    <span class="text-danger" id="namaPerDok"></span>
                                                    <div class="has-success">
                                                        <input type="text" name="IVLnamaPerDok" id="IVLnamaPerDok" class="form-control">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>

                                                <br>
                        
                                                <label  class="control-label mb-10 text-left">TANDA HAIs</label>

                                                <br>

                                                <div class="col-md-6">
                                                    <label  class="control-label mb-10 text-left">Suhu(>38&#176;)</label>
                                                    <div class="has-success">
                                                        <input type="text" name="tanda_infeksi1" id="tanda_infeksi1" class="form-control">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="clearfix">
                                                        &nbsp;
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label  class="control-label mb-10 text-left">Rubor(Merah)</label></label>
                                                    <div class="">
                                                    <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi2" id="tanda_infeksi2" value="Ya">Ya</label>
                                                    <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi2" id="tanda_infeksi2" value="Tidak">Tidak</label>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label  class="control-label mb-10 text-left">Dolor(Nyeri)</label></label>
                                                    <div class="">
                                                        <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi3" id="tanda_infeksi3" value="Ya">Ya</label>
                                                        <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi3" id="tanda_infeksi3" value="Tidak">Tidak</label>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label  class="control-label mb-10 text-left">Kalor(Panas)</label></label>
                                                    <div class="">
                                                        <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi4" id="tanda_infeksi4" value="Ya">Ya</label>
                                                        <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi4" id="tanda_infeksi4" value="Tidak">Tidak</label>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label  class="control-label mb-10 text-left">Tumor(Bengkak)</label></label>
                                                    <div class="">
                                                        <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi5" id="tanda_infeksi5" value="Ya">Ya</label>
                                                        <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi5" id="tanda_infeksi5" value="Tidak">Tidak</label>
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label  class="control-label mb-10 text-left">Tanggal Phlebtitis</label>
                                                        <input type="date" name="tanda_infeksi6" id="tanda_infeksi6" class="form-control ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="modal-footer mb-5 mr-5 mt-10">
                                            <button class="btn btn-success btn-anim  btn-sm" style="margin-right: 40px;" id="simpanIVL"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                            <button style="display:none;" class="btn btn-warning btn-anim btn-sm" type="submit"  id="updateIVL"><i class="icon-rocket"></i><span class="btn-text">UPDATE</span></button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!--end MODAL IVL-->

                        <!--MODAL ISK-->
                    <div class="modal fade" id="modalISK" aria-hidden="true" role="dialog" aria-labelledby="modalISKLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <strong>
                                        <h5>
                                            <label for="text" class="control-label mb-10 text-left">Infeksi Saluran Kemih (ISK) = UC</label>
                                        </h5>
                                    </strong>
                                    <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <hr>
                                <div class="modal-body">
                                    <form id="formISK">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="col-md-3">
                                                    <label  class="control-label mb-10 text-left">Kateter Urin:</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="ya" class="radio-inline"><input type="radio" name="kateterUrin" id="kateterUrin" class="radio-inline" value="Ya">Ya</label>
                                                    <label for="tidak" class="radio-inline"><input type="radio" name="kateterUrin" id="kateterUrin" class="radio-inline" value="Tidak">Tidak</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label  class="radio-inline"><input type="radio" name="jenisKeteter" id="jenisKeteter" class="radio-inline" value="Douwer">Douwer</label>
                                                    <label  class="radio-inline"><input type="radio" name="jenisKeteter" id="jenisKeteter" class="radio-inline" value="Intermitten">Intermitten</label>
                                                    <label  class="radio-inline"><input type="radio" name="jenisKeteter" id="jenisKeteter" class="radio-inline" value="Kondom">Kondom</label>
                                                </div>
                                            </div>

                                            <div class="col-md-24">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label  class="control-label mb-10 text-left">Pemasangan Kateter</label>
                                                        <div class="has-success">
                                                        <input type="text" name="pemasanganKateter" id="pemasanganKateter" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label  class="control-label mb-10 text-left">Tanggal Pemasangan</label>
                                                        <div class="has-success">
                                                            <input type="date" name="tglISKDari" id="tglISKDari" class="form-control ">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label  class="control-label mb-10 text-left">Hingga<span class="help"></span></label>
                                                        <span id="TglPemasangan_error" class="text-danger"></span>
                                                        <div class="has-success">
                                                            <input type="date" name="tglISKHingga" id="tglISKHingga" class="form-control ">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label  class="control-label mb-10 text-left">Unit</label>
                                                        <div class="has-success">
                                                            <input type="text" name="ISKunit" id="ISKunit" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label  class="control-label mb-10 text-left">Nama Dokter</label>
                                                        <div class="has-success">
                                                            <input type="text" name="ISKnamaPerDok" id="ISKnamaPerDok" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label  class="control-label mb-10 text-left">TANDA HAIs</label>
                                            </div>
                                            <div class="col-md-24">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label  class="control-label mb-10 text-left">Suhu<(38&#8451;)</label>
                                                        <div class="has-success">
                                                            <input type="text" name="tanda_infeksi1a" id="tanda_infeksi1a" class="form-control">                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label  class="control-label mb-10 text-left">Tanggal ISK</label>
                                                        <div class="has-success">
                                                            <input type="date" name="tanda_infeksi6a" id="tanda_infeksi6a" class="form-control ">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label  class="control-label mb-10 text-left">Urgensi</label>
                                                        <div class="">
                                                        <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi2a" id="tanda_infeksi2a" value="Ya">Ya</label>
                                                        <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi2a" id="tanda_infeksi2a" value="Tidak">Tidak</label>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label  class="control-label mb-10 text-left">Nyeri Supra Kubik</label>
                                                        <div class="">
                                                        <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi3a" id="tanda_infeksi3a" value="Ya">Ya</label>
                                                        <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi3a" id="tanda_infeksi3a" value="Tidak">Tidak</label>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label  class="control-label mb-10 text-left">Nyeri Kemih</label>
                                                        <div class="">
                                                        <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi4a" id="tanda_infeksi4a" value="Ya">Ya</label>
                                                        <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi4a" id="tanda_infeksi4a" value="Tidak">Tidak</label>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label  class="control-label mb-10 text-left">Pyuria>10 leucosit</label>
                                                        <div class="">
                                                        <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi5a" id="tanda_infeksi5a" value="Ya">Ya</label>
                                                        <label  class="control-label  text-left"><input type="radio" name="tanda_infeksi5a" id="tanda_infeksi5a" value="Tidak">Tidak</label>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>

                                <div class="modal-footer mb-5 mr-5 mt-10">
                                    <button class="btn btn-success btn-anim btn-sm" id="simpanISK"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
                                    <button style="display:none;" class="btn btn-warning btn-anim btn-sm" type="submit"  id="updateISK"><i class="icon-rocket"></i><span class="btn-text">UPDATE</span></button>
                                </div>

                            </div>
                        </div>
                    </div>
                        <!--END MODAL ISK-->

                    <!--MODAL DCB-->
                    <div class="modal fade" id="modalDCB" aria-hidden="true" role="dialog" aria-labelledby="modalDCBLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <strong>
                                        <h5>
                                            <label  class="control-label mb-10 text-left">Diagnosis : DCB/DECUBITUS</label>
                                        </h5>
                                    </strong>
                                    <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <hr>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <form id="formDCB">
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="clearfix">&nbsp;</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label  class="control-label mb-10 text-left">Tanggal Mulai Bedrest Total :</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <label  class="control-label mb-10 text-left">TiBa / Tirah Baring / Bedrest Total:</label>
                                                    <div class="form-group">
                                                        <label  class="radio-inline"><input type="radio" name="tiba"  value="Ya">Ya</label>
                                                        <label  class="radio-inline"><input type="radio" name="tiba"  value="Tidak">Tidak</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label  class="control-label mb-10 text-left">Mulai -</label>
                                                    <div class="form-group">
                                                        <div class="has-success">
                                                            <input class="form-control" type="date" name="tglDCBMulai" id="tglDCBMulai">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label style="text-color:black !important;"  class="control-label mb-10 text-left">Hingga</label>
                                                    <div class="form-group">
                                                        <div class="has-success">
                                                            <input class="form-control " type="date" name="tglDCBHingga" id="tglDCBHingga">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <label  class="control-label mb-10 text-left">Terdapat Dekubitus dari Awal:</label>
                                                    <div class="form-group">
                                                        <label  class="radio-inline"><input type="radio" name="DCBAwal"  value="Ya">Ya</label>
                                                        <label  class="radio-inline"><input type="radio" name="DCBAwal"  value="Tidak">Tidak</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label  class="control-label mb-10 text-left">Tanda-tanda/Gejala:</label>
                                                    <div class="form-group">
                                                        <label  class="radio-inline"><input type="radio" name="DCBGejala"  value="Ada">Ada</label>
                                                        <label  class="radio-inline"><input type="radio" name="DCBGejala"  value="Tidak">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label  class="control-label mb-10 text-left">Suhu Kulit Panas/Dingin</label>
                                                            <div class="has-success">
                                                             <input type="text" name="DCBKulit" id="DCBKulit" class="form-control">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label  class="control-label mb-10 text-left">Nyeri</label>
                                                    <div class="form-group">
                                                        <label  class="radio-inline"><input type="radio" name="DCBNyeri" id="DCBNyeri" value="Ya">Ya</label>
                                                        <label  class="radio-inline"><input type="radio" name="DCBNyeri" id="DCBNyeri" value="Tidak">Tidak</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label  class="control-label mb-10 text-left">Gatal</label>
                                                    <div class="form-group">
                                                        <label  class="radio-inline"><input type="radio" name="DCBGatal" id="DCBGatal" value="Ya">Ya</label>
                                                        <label  class="radio-inline"><input type="radio" name="DCBGatal" id="DCBGatal" value="Tidak">Tidak</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label  class="control-label mb-10 text-left">Gatal</label>
                                                    <div class="form-group">
                                                        <label  class="radio-inline"><input type="radio" name="DCBKemerahan" id="DCBKemerahan" value="Ya">Ya</label>
                                                        <label  class="radio-inline"><input type="radio" name="DCBKemerahan" id="DCBKemerahan" value="Tidak">Tidak</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label  class="control-label mb-10 text-left">Jaringan Keras/Lunak</label>
                                                    <div class="form-group">
                                                        <label  class="radio-inline"><input type="radio" name="DCBJaringan" id="DCBJaringan" value="Ya">Ya</label>
                                                        <label  class="radio-inline"><input type="radio" name="DCBJaringan" id="DCBJaringan" value="Tidak">Tidak</label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <label  class="control-label mb-10 text-left">Jaringan Epidermis/Dermis Rusak/Melempuh-Lubang dangkal</label>
                                                    <div class="form-group">
                                                        <label  class="radio-inline"><input type="radio" name="DCBDangkal" id="DCBDangkal" value="Ya">Ya</label>
                                                        <label  class="radio-inline"><input type="radio" name="DCBDangkal" id="DCBDangkal" value="Tidak">Tidak</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label  class="control-label mb-10 text-left">Jaringan Epidermis/Dermis Rusak/Melempuh-Lubang dalam</label>
                                                    <div class="form-group">
                                                        <label  class="radio-inline"><input type="radio" name="DCBDalam" id="DCBDalam" value="Ya">Ya</label>
                                                        <label  class="radio-inline"><input type="radio" name="DCBDalam" id="DCBDalam" value="Tidak">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <label  class="control-label mb-10 text-left">Kerusakan pada Otot atau Tulang, Nekrosis Jaringan</label>
                                                    <div class="form-group">
                                                        <label  class="radio-inline"><input type="radio" name="DCBNekrosis" id="DCBNekrosis" value="Ya">Ya</label>
                                                        <label  class="radio-inline"><input type="radio" name="DCBNekrosis" id="DCBNekrosis" value="Tidak">Tidak</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label  class="control-label mb-10 text-left">Perawatan Luka Dekubitus</label>
                                                    <div class="form-group">
                                                        <label  class="radio-inline"><input type="radio" name="DCBDekubitus" id="DCBDekubitus" value="Ya">Ya</label>
                                                        <label  class="radio-inline"><input type="radio" name="DCBDekubitus" id="DCBDekubitus" value="Tidak">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer mb-5 mr-5 mt-10">
                                <button class="btn btn-success btn-anim btn-sm" name="simpanDCB" id="simpanDCB"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
                                    <button style="display:none;" class="btn btn-warning btn-anim btn-sm" type="submit"  name="updateDCB" id="updateDCB"><i class="icon-rocket"></i><span class="btn-text">UPDATE</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END DCB-->

                        <!--MODAL CVL-->
                        <div class="modal fade" id="modalCVL" aria-hidden="true" role="dialog" aria-labelledby="modalCVLLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <strong>
                                        <h4>
                                            <label for="text" class="control-label mb-10 text-left">IADP</label>
                                        </h4>
                                        <br>
                                        <h6>
                                            <label for="text" class="control-label mb-10 text-left">Pemasangan : CVL/CVC</label>
                                        </h6>
                                    </strong>
                                    <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <hr>
                                <div class="modal-body">
                                    <form id="formCVL">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Tempat Insersi</label>
                                                <input type="text" name="tmpInsersiCVL" id="tmpInsersiCVL" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Tanggal Pemasangan</label>
                                                <input type="date" name="tglDariCVL" id="tglDariCVL" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Hingga</label>
                                                <input type="date" name="tglHinggaCVL" id="tglHinggaCVL" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Unit</label>
                                                <input type="text" name="unitCVL" id="unitCVL" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Nama Dokter</label>
                                                <input type="text" name="nmDokPerCVL" id="nmDokPerCVL" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label  class="control-label mb-10 text-left">Tanda Hais</label>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Suhu(>38&#176;)</label>
                                                <div class="has-success">
                                                    <input type="text" name="tanda_cvl1" id="tanda_cvl1" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Tanggal IADP</label>
                                                <div class="has-success">
                                                    <input type="date" name="tanda_cvl6" id="tanda_cvl6" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <label  class="control-label mb-10 text-left">Hipotermia</label>
                                                <div class="">
                                                <label  class="control-label  text-left"><input type="radio" name="tanda_cvl2" id="tanda_cvl2" value="Ya">Ya</label>
                                                <label  class="control-label  text-left"><input type="radio" name="tanda_cvl2" id="tanda_cvl2" value="Tidak">Tidak</label>
                                                <span class="help-block"></span>
                                                </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label  class="control-label mb-10 text-left">Eritemia</label>
                                                <div class="">
                                                <label  class="control-label  text-left"><input type="radio" name="tanda_cvl3" id="tanda_cvl3" value="Ya">Ya</label>
                                                <label  class="control-label  text-left"><input type="radio" name="tanda_cvl3" id="tanda_cvl3" value="Tidak">Tidak</label>
                                                <span class="help-block"></span>
                                                </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label  class="control-label mb-10 text-left">Tumor (Bengkak)</label>
                                                <div class="">
                                                <label  class="control-label  text-left"><input type="radio" name="tanda_cvl4" id="tanda_cvl4" value="Ya">Ya</label>
                                                <label  class="control-label  text-left"><input type="radio" name="tanda_cvl4" id="tanda_cvl4" value="Tidak">Tidak</label>
                                                <span class="help-block"></span>
                                                </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label  class="control-label mb-10 text-left">PUS</label>
                                                <div class="">
                                                <label  class="control-label  text-left"><input type="radio" name="tanda_cvl5" id="tanda_cvl5" value="Ya">Ya</label>
                                                <label  class="control-label  text-left"><input type="radio" name="tanda_cvl5" id="tanda_cvl5" value="Tidak">Tidak</label>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <div class="modal-footer mb-5 mr-5 mt-10">
                                    <button class="btn btn-success btn-anim btn-sm" id="simpanCVL"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
                                    <button style="display:none;" class="btn btn-warning btn-anim btn-sm" type="submit"  id="updateCVL"><i class="icon-rocket"></i><span class="btn-text">UPDATE</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <!--END MODAL CVL-->

                        <!--MODAL VAP-->
                    <div class="modal fade" id="modalVAP" aria-hidden="true" role="dialog" aria-labelledby="modalVAPLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <strong>
                                        <h4>
                                            <label for="text" class="control-label mb-10 text-left">VAP</label>
                                        </h4>
                                        <br>
                                        <h6>
                                            <label for="text" class="control-label mb-10 text-left">Pemasangan : ETT/INTUBASI</label>
                                        </h6>
                                    </strong>
                                    <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <hr>
                                <div class="modal-body">
                                    <form id="formVAP">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Pemasangan ETT</label>
                                                <div class="has-success">
                                                    <input type="text" name="tmpInsersiVAP" id="tmpInsersiVAP" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Tanggal Pemasangan</label>
                                                <div class="has-success">
                                                    <input type="date" name="tglDariVAP" id="tglDariVAP" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Hingga</label>
                                                <div class="has-success">
                                                    <input type="date" name="tglHinggaVAP" id="tglHinggaVAP" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Unit</label>
                                                <div class="has-success">
                                                    <input type="text" name="unitVAP" id="unitVAP" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Nama Dokter</label>
                                                <div class="has-success">
                                                    <input type="text" name="nmDokPerVAP" id="nmDokPerVAP" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label  class="control-label mb-10 text-left">Tanda Hais</label>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Suhu(>38&#176;)</label>
                                                <div class="has-success">
                                                    <input type="text" name="tanda_vap1" id="tanda_vap1" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Tanggal VAP</label>
                                                <div class="has-success">
                                                    <input type="date" name="tanda_vap6" id="tanda_vap6" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Sputum purulent</label>
                                                <div>
                                                    <label  class="control-label  text-left"><input type="radio" name="tanda_vap2" id="tanda_vap2" value="Ya">Ya</label>
                                                    <label  class="control-label  text-left"><input type="radio" name="tanda_vap2" id="tanda_vap2" value="Tidak">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">&#8595sat,FiO2 < 240</label>
                                                <div>
                                                    <label  class="control-label  text-left"><input type="radio" name="tanda_vap3" id="tanda_vap3" value="Ya">Ya</label>
                                                    <label  class="control-label  text-left"><input type="radio" name="tanda_vap3" id="tanda_vap3" value="Tidak">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">x-ray:infiltrat baru</label>
                                                <div>
                                                    <label  class="control-label  text-left"><input type="radio" name="tanda_vap4" id="tanda_vap4" value="Ya">Ya</label>
                                                    <label  class="control-label  text-left"><input type="radio" name="tanda_vap4" id="tanda_vap4" value="Tidak">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label  class="control-label mb-10 text-left">Leuko sit > 11.000</label>
                                                <div>
                                                    <label  class="control-label  text-left"><input type="radio" name="tanda_vap5" id="tanda_vap5" value="Ya">Ya</label>
                                                    <label  class="control-label  text-left"><input type="radio" name="tanda_vap5" id="tanda_vap5" value="Tidak">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>

                                <div class="modal-footer mb-5 mr-5 mt-10">
                                    <button class="btn btn-success btn-anim btn-sm" id="simpanVAP"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
                                    <button style="display:none;" class="btn btn-warning btn-anim btn-sm" type="submit"  id="updateVAP"><i class="icon-rocket"></i><span class="btn-text">UPDATE</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!--END MODAL VAP-->
                    
                    <!--MODAL IDO-->
                    <div class="modal fade" id="modalIDO" aria-hidden="true" role="dialog" aria-labelledby="modalIDOLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                    <strong>
                                        <h4>
                                            <label for="text" class="control-label mb-10 text-left">IDO</label>
                                        </h4>
                                        <br>
                                    </strong>
                                    
                                </div>
                                <hr>
                                <div class="modal-body">
                                    <form id="formIDO">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="text" class="control-label mb-10 text-left">Tindakan : OPS/Operasi</label>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="text" class="control-label mb-10 text-left">Diagnosa Operasi</label>
                                                        <input type="text" name="diagnosaIDO" id="diagnosaIDO" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="text" class="control-label mb-10 text-left">Tanggal Operasi</label>
                                                            <input type="date" name="tglIDO" id="tglIDO" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="text" class="control-label mb-10 text-left">Durasi Operasi</label>
                                                            <input type="time" name="durasiIDO" id="durasiIDO" value="00:00" class="form-control">
                                                            <small>Hours & Minute</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="text" class="control-label mb-10 text-left">Nama Tindakan</label>
                                                        <input type="text" id="nmTindakanIDO" name="nmTindakanIDO" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="text" class="control-label mb-10 text-left">Nama Operator</label>
                                                        <input type="text" id="nmOperatorIDO" name="nmOperatorIDO" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="text" class="control-label mb-10 text-left">Jenis IDO</label>
                                                        <div class="form-inline">
                                                                    <label  class="radio-inline"><input type="radio" name="jenisIDO" id="jenisIDO" value="Bersih">Bersih</label>
                                                                    <label  class="radio-inline"><input type="radio" name="jenisIDO" id="jenisIDO" value="Bersih Tercemar">Bersih Tercemar</label>
                                                                    <label  class="radio-inline"><input type="radio" name="jenisIDO" id="jenisIDO" value="Tercemar">Tercemar</label>
                                                                    <label  class="radio-inline"><input type="radio" name="jenisIDO" id="jenisIDO" value="Kotor">Kotor</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label  class="control-label mb-10 text-left">Tindakan Operasi</label>
                                                        <div class="form-inline">
                                                            <label  class="radio-inline"><input type="radio" name="tindakanIDO" id="tindakanIDO" value="cito">Cito/Segera</label>
                                                            <label  class="radio-inline"><input type="radio" name="tindakanIDO" id="tindakanIDO" value="elektif">Elektif/Rencana</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label  class="control-label mb-10 text-left">ASA</label>
                                                        <div class="form-inline">
                                                            <label  class="radio-inline"><input type="radio" name="asaIDO" id="asaIDO" value="satu">1</label>
                                                            <label  class="radio-inline"><input type="radio" name="asaIDO" id="asaIDO" value="dua">2</label>
                                                            <label  class="radio-inline"><input type="radio" name="asaIDO" id="asaIDO" value="tiga">3</label>
                                                            <label  class="radio-inline"><input type="radio" name="asaIDO" id="asaIDO" value="empat">4</label>
                                                            <label  class="radio-inline"><input type="radio" name="asaIDO" id="asaIDO" value="lima">5</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label  class="control-label mb-10 text-left">Tanggal Temuan IDO:</label>
                                                        <input type="date" name="tglTemuanIDO" id="tglTemuanIDO" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label  class="control-label mb-10 text-left">Tanda :</label>
                                            </div>
                                            <div class="col-md-12">
                                                    <label  class="radio-inline"><input type="checkbox" name="tandaIDO" id="tandaIDO" for="demam" value="Demam">Demam</label>
                                                    <label  class="radio-inline"><input type="checkbox" name="tandaIDO" id="tandaIDO" value="Merah">Merah</label>
                                                    <label  class="radio-inline"><input type="checkbox" name="tandaIDO" id="tandaIDO" value="Bengkak">Bengkak</label>
                                                    <label  class="radio-inline"><input type="checkbox" name="tandaIDO" id="tandaIDO" value="Cairan Purulen">Cairan Purulen/Pus</label>
                                                    <label  class="radio-inline"><input type="checkbox" name="tandaIDO" id="tandaIDO" value="Nyeri">Nyeri</label>
                                                    <label  class="radio-inline"><input type="checkbox" name="tandaIDO" id="tandaIDO" value="DPJP">Pernyataan Dokter/DPJP</label>
                                            </div>
                                            <div class="col-md-12">
                                                <label  class="control-label mb-10 text-left">Pemberian AB/Antimikroba/Antibiotik</label>
                                                <br>
                                                <label  class="control-label mb-10 text-left">Profilaksis</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label  class="control-label mb-10 text-left">Dosis</label>
                                                        <input type="text" name="dosisProfilaksis" id="dosisProfilaksis" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label  class="control-label mb-10 text-left">Tanggal</label>
                                                        <input type="date" name="tglProfilaksis" id="tglProfilaksis" class="form-control">
                                                    </div>
                                                </div>
                                                <label  class="control-label mb-10 text-left">Pengobatan Pasca Operasi</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label  class="control-label mb-10 text-left">Dosis</label>
                                                        <input type="text" name="dosisPascaIDO" id="dosisPascaIDO" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label  class="control-label mb-10 text-left">Tanggal</label>
                                                        <input type="date" name="tglPascaIDO" id="tglPascaIDO" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer mb-5 mr-5 mt-10">
                                    <button class="btn btn-success btn-anim btn-sm"   id="simpanIDO"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
                                    <button style="display:none;" class="btn btn-warning btn-anim btn-sm" type="submit"  id="updateIDO"><i class="icon-rocket"></i><span class="btn-text">UPDATE</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!--END MODAL IDO-->
                </div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table table-hover display  pb-30" id="tabelData_Infeksi">
                                <thead>
                                    <tr class="bg-success">
                                        <th>NO</th>
                                        <th>EDIT</th>
                                        <th>HAPUS</th>
                                        <th>Tipe</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Waktu Masuk</th>
                                        <th>Dokter Penanggung Jawab</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-success">
                                        <th>NO</th>
                                        <th>EDIT</th>
                                        <th>HAPUS</th>
                                        <th>Tipe</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Waktu Masuk</th>
                                        <th>Dokter Penanggung Jawab</th>
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
    $(document).ready(function(e){ 
        id_pelayanan = $('#inPel').val();
        reloadData(id_pelayanan);
        dataExist(id_pelayanan);
        $('input[name="pemeriksaanKultur"]').click(function(){
            if($(this).attr("value") == "Ya"){
                $("#dtpemeriksaanKultur").show('slow');
            }
            if($(this).attr("value")=="Tidak"){
                $("#dtpemeriksaanKultur").hide('slow');
            }
        });

        $('input[name="spesialis"]').click(function(){
            if($(this).attr("value")!="Lain-lain"){
                $("#dtspesialis10").hide('slow');
            }else{
                $('#dtspesialis10').show('slow');
            }
        });

    });

    $.ajax({
        url:"<?= base_url('/Erm_surveilans_hais_rs/getDokter') ?>",
        method:"GET",
        dataType:"json",
        success:function(res){
            var options = '';
            for(var i=0;i<res.length;i++){
                options += '<option value="'+res[i].nama+'">'+res[i].nama+'</option>';
            }
            $('#dokterPenanggung').append(options);
        }
    });
</script>

<script type="text/javascript">

    function deleteAll(id){
		swal({
			title: "Warning?",
            text: "Apakah kamu yakin menghapus data ini?\nHapus data artinya batal pelayanan",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
		},function(){
			$().ready(function(){
				$.ajax({
					url:"<?= base_url("Erm_surveilans_hais_rs/deleteAll") ?>",
					method:"POST",
					dataType: "json",
					data:{
						id:id,
					},
					complete: function(){
                        window.location.reload();
					}
				});
			});
		});
		return false;
    }

    function dataExist(id_pelayanan){
        //Memeriksa apakah ID pelayanan tersebut telah terisi atau tidak
            $.ajax({
                url:"<?= base_url('Erm_surveilans_hais_rs/dataExist') ?>",
                method:"POST",
                dataType:"json",
                data:{
                    idpelayanan:id_pelayanan
                },
                success:function(res){
                    if(res.status!=0){
                        $("input[name='idMain']").val(btoa(res.status.id_form_hais));
                        $("#tgl_masuk").val(res.status.tgl_masuk);
                        $("#waktu_masuk").val(res.status.waktu_masuk);
                        $("#diagnosaMasuk").val(res.status.diagnosaMasuk);
                        $('select[name="dokterPenanggung"]').select2().val(res.status.dokterPenanggung).trigger('change');
                        $('input[type="radio"][name="spesialis"][value="'+res.status.sp_penyakit+'"]').attr('checked',true);

                        if(res.status.sp_penyakit != "Penyakit Dalam" && res.status.sp_penyakit != "Syaraf" && res.status.sp_penyakit != "Obstetri & Ginekologi" && res.status.sp_penyakit != "Bedah Umum" && res.status.sp_penyakit != "Anak" && res.status.sp_penyakit != "THT" && res.status.sp_penyakit != "Bedah Orthopedi" && res.status.sp_penyakit != "Neonatus" && res.status.sp_penyakit != "Umum"){
                            $('input[type="radio"][name="spesialis"][value="Lain-lain"]').attr('checked',true);
                            $("#dtspesialis10").val(res.status.sp_penyakit)
                            $("#dtspesialis10").show();
                        }else{
                            $('input[type="radio"][name="spesialis"][value="'+res.status.sp_penyakit+'"]').attr('checked',true);
                        }

                        $('input[type="radio"][name="pemeriksaanKultur"][value="'+res.status.pemeriksaanKultur+'"]').attr('checked',true);
                        $("input[name='tglPeriksa']").val(res.status.tgl_periksa);
                        $("input[name='hasilPeriksa']").val(res.status.hasilPeriksa);
                        if(res.status.pemeriksaanKultur === "Ya"){
                            $("#dtpemeriksaanKultur").show();
                        }else{
                            $("#dtpemeriksaanKultur").hide();
                            $("#tglPeriksa").val(null);
                            $("#hasilPeriksa").val(null);
                        }
                        $("#simpanData").hide();
                        $("#hapusData").attr("onclick", "deleteAll('"+res.status.id_form_hais+"')");
                        $("#updateData").show();
                        $("#hapusData").show();
                        $("#theButton").show();
                    }else{
                        console.log("Data Tidak ada");
                    }
                }
            });
    }

     function reloadData(id_pelayanan) { //Merujuk ke table list survei
        $('#tabelData_Infeksi').dataTable().fnClearTable();
        $('#tabelData_Infeksi').dataTable().fnDestroy();
        $('#tabelData_Infeksi').DataTable({
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
            "url": '<?php echo base_url("Erm_surveilans_hais_rs/tampilListHasil"); ?>',
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
</script>

<script type="text/javascript">
    function hapus(id,tipe){
		swal({
			title: "Warning?",
            text: "Apakah kamu yakin menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
		},function(){
			$().ready(function(){
				$.ajax({
					url:"<?= base_url("Erm_surveilans_hais_rs/deleteData") ?>",
					method:"POST",
					dataType: "json",
					data:{
						id:id,
                        what:tipe,
					},
					complete: function(res){
						if(res.status !== 200 ){
                            swal({
                            title: "Gagal!\nStatus Code "+res.status,
                            type: "warning",
                            confirmButtonColor: "#3cb878",
                            });
                        }else{
                            swal({
								title: "good job!",
                                type: "success",
                                text: "Data Berhasil dihapus",
                                confirmButtonColor: "#3cb878",
                                });
                                $('#tabelData_Infeksi').DataTable().ajax.reload();
                                $("#form"+tipe).trigger('reset');
                                $("#simpan"+tipe).show();
                                $("#update"+tipe).hide();
                                $("#btn"+tipe).removeClass();
                                $("#btn"+tipe).addClass("btn btn-success");
						}
					}
				});
			});
		});
		return false;
	}
</script>

<script type="text/javascript">
    $('#updateData').click(function(e){
        e.preventDefault();
        if($("input[type='radio'][name='spesialis']:checked").val() == "Lain-lain"){
            spesialis1 = $("#dtspesialis10").val();
        }else{
            spesialis1 = $("input[type='radio'][name='spesialis']:checked").val();
        }      
        $.ajax({
            type: "POST",
            url: "<?= base_url("Erm_surveilans_hais_rs/updateData")?>",
            data: {
                idMain:$("#idMain").val(),
                inNoRM:$("#inNoRM").val(),
                inPel:$("#inPel").val(),
                inHis:$("#inHis").val(),
                tgl_masuk:$("#tgl_masuk").val(),
                waktu_masuk:$("#waktu_masuk").val(),
                diagnosaMasuk:$("#diagnosaMasuk").val(),
                dokterPenanggung:$("#dokterPenanggung").val(),
                spesialis:spesialis1,
                pemeriksaanKultur:$("input[name='pemeriksaanKultur']:checked").val(),
                tglPeriksa:$("input[name='tglPeriksa']").val() ,
                hasilPeriksa:$("input[name='hasilPeriksa']").val(),
            },
            dataType: "json",
            complete:function(res){
                if(res.status !== 200 ){
                    swal({
                        title: "Gagal!\nStatus Code "+res.status,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
                        });
                }else{
                    swal({
					    title: "good job!",
                        type: "success",
                        text: "Data Berhasil di Update",
                        confirmButtonColor: "#3cb878",
                        });
				}
            }
        });
        return false;
    });
    $('#updateIDO').on('click',function(){
            diagnosaIDO = $('#diagnosaIDO').val();
            tglIDO = $('#tglIDO').val();
            durasiIDO = $('#durasiIDO').val();
            nmTindakanIDO = $('#nmTindakanIDO').val();
            nmOperatorIDO = $('#nmOperatorIDO').val();
            tindakanIDO = $('input[name="tindakanIDO"]:checked').val();
            jenisIDO = $('input[name="jenisIDO"]:checked').val();
            asaIDO = $('input[name="asaIDO"]:checked').val();
            tglTemuanIDO = $('#tglTemuanIDO').val();
            var tanda = [];
            var tandaElement = $("input[name='tandaIDO']");
            for(var i=0;i<tandaElement.length;i++){
                if(tandaElement[i].checked){
                    tanda.push(tandaElement[i].value);
                }
            }
            dosisProfilaksis = $('#dosisProfilaksis').val();
            tglProfilaksis = $('#tglProfilaksis').val();
            dosisPascaIDO = $('#dosisPascaIDO').val();
            tglPascaIDO = $('#tglPascaIDO').val();

            $.ajax({
                url:"<?= base_url('/erm_surveilans_hais_rs/updateIDO') ?>",
                method:"post",
                data:{
                    id:$("#idMain").val(),
                    diagnosaIDO:diagnosaIDO,
                    tglIDO:tglIDO,
                    durasiIDO:durasiIDO,
                    nmTindakanIDO:nmTindakanIDO,
                    nmOperatorIDO:nmOperatorIDO,
                    jenisIDO:jenisIDO,
                    tindakanIDO:tindakanIDO,
                    asaIDO:asaIDO,
                    tglTemuanIDO:tglTemuanIDO,
                    tandaIDO:tanda.toString(),
                    dosisProfilaksis:dosisProfilaksis,
                    tglProfilaksis:tglProfilaksis,
                    dosisPascaIDO:dosisPascaIDO,
                    tglPascaIDO:tglPascaIDO
                },complete:function(res){
                if(res.status !== 200){
                    swal({
                        title: "Gagal!\nStatus Code "+res.status,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
						});
                }else{
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data Berhasil diUpdate",
                        confirmButtonColor: "#3cb878",
                        });
                        $('#tabelData_Infeksi').DataTable().ajax.reload();
                        $("#modalIDO .close").click();
                }
            }
            });
    });
    $('#updateCVL').on('click',function(){
        var cvl = $('#formCVL').serializeArray();
        $.ajax({
            url:"<?= base_url('/Erm_surveilans_hais_rs/updateCVL') ?>",
            method:"POST",
            data:{
                id:$("#idMain").val(),
                tmpInsersiCVL:$("#tmpInsersiCVL").val(),
                    tglDariCVL:$("#tglDariCVL").val(),
                    tglHinggaCVL:$("#tglHinggaCVL").val(),
                    unitCVL:$("#unitCVL").val(),
                    nmDokPerCVL:$("#nmDokPerCVL").val(),
                    tanda_cvl1:$("#tanda_cvl1").val(),
                    tanda_cvl2:$('input[name="tanda_cvl2"]:checked').val(),
                    tanda_cvl3:$('input[name="tanda_cvl3"]:checked').val(),
                    tanda_cvl4:$('input[name="tanda_cvl4"]:checked').val(),
                    tanda_cvl5:$('input[name="tanda_cvl5"]:checked').val(),
                    tanda_cvl6:$("#tanda_cvl6").val()
            },complete:function(res){
                if(res.status !== 200){
                    swal({
                        title: "Gagal!\nStatus Code "+res.status,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
						});
                }else{
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data Berhasil diUpdate",
                        confirmButtonColor: "#3cb878",
                        });
                        $('#tabelData_Infeksi').DataTable().ajax.reload();
                        $("#modalCVL .close").click();
                }
            }
        });
    });
    $('#updateVAP').on('click',function(){
        $.ajax({
            url:"<?= base_url('/Erm_surveilans_hais_rs/updateVAP') ?>",
            method:"POST",
            data:{
                id:$("#idMain").val(),
                tmpInsersiVAP:$("#tmpInsersiVAP").val(),
                    tglDariVAP:$("#tglDariVAP").val(),
                    tglHinggaVAP:$("#tglHinggaVAP").val(),
                    unitVAP:$("#unitVAP").val(),
                    nmDokPerVAP:$("#nmDokPerVAP").val(),
                    tanda_vap1:$("#tanda_vap1").val(),
                    tanda_vap2:$('input[name="tanda_vap2"]:checked').val(),
                    tanda_vap3:$('input[name="tanda_vap3"]:checked').val(),
                    tanda_vap4:$('input[name="tanda_vap4"]:checked').val(),
                    tanda_vap5:$('input[name="tanda_vap5"]:checked').val(),
                    tanda_vap6:$("#tanda_vap6").val()
            },complete:function(res){
                if(res.status !== 200){
                    swal({
                        title: "Gagal!\nStatus Code "+res.status,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
						});
                }else{
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data Berhasil diUpdate",
                        confirmButtonColor: "#3cb878",
                        });
                        $('#tabelData_Infeksi').DataTable().ajax.reload();
                        $("#modalVAP .close").click();
                }
            }
        });
    });
    $('#updateDCB').on('click',function(){
        $.ajax({
            url:"<?= base_url('/Erm_surveilans_hais_rs/updateDCB') ?>",
            method:"POST",
            dataType:"json",
            data:{
                id:$("#idMain").val(),
                tiba: $('input[name="tiba"]:checked').val(),
                    tglDCBMulai:$("#tglDCBMulai").val(),
                    tglDCBHingga:$("#tglDCBHingga").val(),
                    DCBAwal: $('input[name="DCBAwal"]:checked').val(),
                    DCBGejala:$('input[name="DCBGejala"]:checked').val(),
                    DCBNyeri: $('input[name="DCBNyeri"]:checked').val(),
                    DCBGatal: $('input[name="DCBGatal"]:checked').val(),
                    DCBKemerahan: $('input[name="DCBKemerahan"]:checked').val(),
                    DCBJaringan: $('input[name="DCBJaringan"]:checked').val(),
                    DCBDangkal: $('input[name="DCBDangkal"]:checked').val(),
                    DCBKulit: $("#DCBKulit").val(),
                    DCBDalam: $('input[name="DCBDalam"]:checked').val(),
                    DCBNekrosis: $('input[name="DCBNekrosis"]:checked').val(),
                    DCBDekubitus: $('input[name="DCBDekubitus"]:checked').val(),
            },
            complete:function(res){
                if(res.status !== 200){
                    swal({
                        title: "Gagal!\nStatus Code "+res.status,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
						});
                }else{
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data Berhasil diUpdate",
                        confirmButtonColor: "#3cb878",
                        });
                        $('#tabelData_Infeksi').DataTable().ajax.reload();
                        $("#modalDCB .close").click();
                }
            }
        });
    });
    $('#updateIVL').click(function(){
            tmpInsersi = $('#tmpInsersi').val();
            tglIVLDari = $('#tglIVLDari').val();
            tglIVLHingga = $('#tglIVLHingga').val();
            IVLunit = $('#IVLunit').val();
            IVLnamaPerDok = $('#IVLnamaPerDok').val();
            tanda_infeksi1 = $('#tanda_infeksi1').val();
            tanda_infeksi2 = $('input[name="tanda_infeksi2"]:checked').val();
            tanda_infeksi3 =  $('input[name="tanda_infeksi3"]:checked').val();
            tanda_infeksi4 =  $('input[name="tanda_infeksi4"]:checked').val();
            tanda_infeksi5 =  $('input[name="tanda_infeksi5"]:checked').val();
            tanda_infeksi6 = $('#tanda_infeksi6').val();
            $.ajax({
                url:"<?= base_url('/Erm_surveilans_hais_rs/updateIVL') ?>",
                method:"POST",
                dataType:"JSON",
                data:{
                    id:$("#idMain").val(),
                    tmpInsersi:tmpInsersi,
                    tglIVLDari:tglIVLDari,
                    tglIVLHingga:tglIVLHingga,
                    IVLunit:IVLunit,
                    IVLnamaPerDok:IVLnamaPerDok,
                    tanda_hais1:tanda_infeksi1,
                    tanda_hais2:tanda_infeksi2,
                    tanda_hais3:tanda_infeksi3,
                    tanda_hais4:tanda_infeksi4,
                    tanda_hais5:tanda_infeksi5,
                    tanda_hais6:tanda_infeksi6,
                },
                complete:function(jqXHR){
                    if(jqXHR.status !== 200){
                        swal({
                        title: "Gagal!\nStatus Code "+jqXHR.status,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
						});
                    }else{
                        swal({
                            title: "Good Job!",
                            type: "success",
                            text: "Data Berhasil diUpdate",
                            confirmButtonColor: "#3cb878",
                        });
                        $('#tabelData_Infeksi').DataTable().ajax.reload();
                        $("#modalIVL .close").click();
                    }
                }
        });
    });
    $('#updateISK').click(function(){
                kateter = $('input[name="kateterUrin"]:checked').val();
                JenisKateter = $('input[name="jenisKeteter"]:checked').val();
                pmsKateter = $('#pemasanganKateter').val();
                tglISKDari = $('#tglISKDari').val();
                tglISKHingga = $('#tglISKHingga').val();
                ISKunit = $('#ISKunit').val();
                ISKnamaPerDok = $('#ISKnamaPerDok').val();

                tanda_infeksi1a = $('#tanda_infeksi1a').val();
                tanda_infeksi2a =  $('input[name="tanda_infeksi2a"]:checked').val();
                tanda_infeksi3a =  $('input[name="tanda_infeksi3a"]:checked').val();
                tanda_infeksi4a = $('input[name="tanda_infeksi4a"]:checked').val();
                tanda_infeksi5a =  $('input[name="tanda_infeksi5a"]:checked').val();
                tanda_infeksi6a = $('#tanda_infeksi6a').val();

            $.ajax({
                url:"<?= base_url('/Erm_surveilans_hais_rs/updateISK') ?>",
                method:"POST",
                dataType:"JSON",
                data:{
                    id:$("#idMain").val(),
                    pmsKateter:pmsKateter,
                    tglISKDari:tglISKDari,
                    tglISKHingga:tglISKHingga,
                    ISKunit:ISKunit,
                    ISKnamaPerDok:ISKnamaPerDok,
                    kateterUrin:kateter,
                    jenisKateter:JenisKateter,
                    tanda_hais1a:tanda_infeksi1a,
                    tanda_hais2a:tanda_infeksi2a,
                    tanda_hais3a:tanda_infeksi3a,
                    tanda_hais4a:tanda_infeksi4a,
                    tanda_hais5a:tanda_infeksi5a,
                    tanda_hais6a:tanda_infeksi6a
                },
                complete:function(jqXHR){
                    if(jqXHR.status !== 200){
                        swal({
                        title: "Gagal!\nStatus Code "+jqXHR.status,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
						});
                    }else{
                        swal({
                            title: "Good Job!",
                            type: "success",
                            text: "Data Berhasil diUpdate",
                            confirmButtonColor: "#3cb878",
                        });
                        $('#tabelData_Infeksi').DataTable().ajax.reload();
                        $("#modalISK .close").click()
                    }
                }
        });
    });
    $('#simpanData').click(function(e){
        //Merujuk ke Button utama, Jika ini tereksekusi maka muncul 6 button survei
        e.preventDefault();
        if($("input[type='radio'][name='spesialis']:checked").val() == "Lain-lain"){
            spesialis1 = $("#dtspesialis10").val();
        }else{
            spesialis1 = $("input[type='radio'][name='spesialis']:checked").val();
        }        
        $.ajax({
            type: "POST",
            url: "<?= base_url("Erm_surveilans_hais_rs/insertData")?>",
            data: {
                inNoRM:$("#inNoRM").val(),
                inPel:$("#inPel").val(),
                inHis:$("#inHis").val(),
                tgl_masuk:$("#tgl_masuk").val(),
                waktu_masuk:$("#waktu_masuk").val(),
                diagnosaMasuk:$("#diagnosaMasuk").val(),
                dokterPenanggung:$("#dokterPenanggung").val(),
                spesialis:spesialis1,
                pemeriksaanKultur:$("input[name='pemeriksaanKultur']:checked").val(),
                tglPeriksa:$("input[name='tglPeriksa']").val() ,
                hasilPeriksa:$("input[name='hasilPeriksa']").val(),
            },
            dataType: "json",
            success:function(data){
                $("#hapusData").attr("onclick", "deleteAll('"+data.status+"')");
            },
            complete:function(res){
                if(res.status !== 200 ){
                    swal({
                        title: "Gagal!\nStatus Code "+res.status,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
                        });
                }else{
                    swal({
					    title: "good job!",
                        type: "success",
                        text: "Data Berhasil di Simpan",
                        confirmButtonColor: "#3cb878",
                        });
                        setTimeout(() => {
                            $("#simpanData").hide();
                            $("#updateData").show();
                            $("#hapusData").show();
                            $("#theButton").show();
                        }, 1000);
				}
            }
        });
        return false;
    });
    $("#simpanIVL").click(function(e){
        e.preventDefault();
            tmpInsersi = $('#tmpInsersi').val();
            tglIVLDari = $('#tglIVLDari').val();
            tglIVLHingga = $('#tglIVLHingga').val();
            IVLunit = $('#IVLunit').val();
            IVLnamaPerDok = $('#IVLnamaPerDok').val();
            tanda_infeksi1 = $('#tanda_infeksi1').val();
            
            tanda_infeksi2 = $('input[name="tanda_infeksi2"]:checked').val();
            tanda_infeksi3 = $('input[name="tanda_infeksi3"]:checked').val();
            tanda_infeksi4 = $('input[name="tanda_infeksi4"]:checked').val();
            tanda_infeksi5 = $('input[name="tanda_infeksi5"]:checked').val();

            tanda_infeksi6 = $('#tanda_infeksi6').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('/Erm_surveilans_hais_rs/insertIVL') ?>",
            data: {
                idpelayanan:$("#inPel").val(),
                    tmpInsersi:tmpInsersi,
                    tglIVLDari:tglIVLDari,
                    tglIVLHingga:tglIVLHingga,
                    IVLunit:IVLunit,
                    IVLnamaPerDok:IVLnamaPerDok,
                    tanda_hais1:tanda_infeksi1,
                    tanda_hais2:tanda_infeksi2,
                    tanda_hais3:tanda_infeksi3,
                    tanda_hais4:tanda_infeksi4,
                    tanda_hais5:tanda_infeksi5,
                    tanda_hais6:tanda_infeksi6,
            },
            dataType: "json",
            complete:function(jqXHR){
                if(jqXHR.status !== 200){
                        swal({
                        title: "Gagal!\nStatus Code "+jqXHR.status,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
						});
                    }else{
                        swal({
                            title: "Good Job!",
                            type: "success",
                            text: "Data Berhasil di Simpan",
                            confirmButtonColor: "#3cb878",
                        });
                        $('#tabelData_Infeksi').DataTable().ajax.reload();
                        $('#formIVL').trigger("reset");
                        $("#modalIVL .close").click();
                    }
            }
        });
    });
    $("#simpanISK").click(function(e){
        e.preventDefault();
        kateter = $('input[name="kateterUrin"]:checked').val();
        JenisKateter = $('input[name="jenisKeteter"]:checked').val();
        pmsKateter = $('#pemasanganKateter').val();
        tglISKDari = $('#tglISKDari').val();
        tglISKHingga = $('#tglISKHingga').val();
        ISKunit = $('#ISKunit').val();
        ISKnamaPerDok = $('#ISKnamaPerDok').val();
        tanda_infeksi1a = $('#tanda_infeksi1a').val();
        tanda_infeksi2a = $('input[name="tanda_infeksi2a"]:checked').val();
        tanda_infeksi3a = $('input[name="tanda_infeksi3a"]:checked').val();
        tanda_infeksi4a = $('input[name="tanda_infeksi4a"]:checked').val();
        tanda_infeksi5a = $('input[name="tanda_infeksi5a"]:checked').val();
        tanda_infeksi6a = $('#tanda_infeksi6a').val();

        $.ajax({
            type: "POST",
            url: "<?= base_url('/Erm_surveilans_hais_rs/insertISK') ?>",
            data: {
                idpelayanan:$("#inPel").val(),
                pmsKateter:pmsKateter,
                tglISKDari:tglISKDari,
                tglISKHingga:tglISKHingga,
                ISKunit:ISKunit,
                ISKnamaPerDok:ISKnamaPerDok,
                kateterUrin:kateter,
                jenisKateter:JenisKateter,
                tanda_hais1a:tanda_infeksi1a,
                tanda_hais2a:tanda_infeksi2a,
                tanda_hais3a:tanda_infeksi3a,
                tanda_hais4a:tanda_infeksi4a,
                tanda_hais5a:tanda_infeksi5a,
                tanda_hais6a:tanda_infeksi6a
            },
            dataType: "json",
            complete:function(jqXHR){
                if(jqXHR.status !== 200){
                        swal({
                        title: "Gagal!\nStatus Code "+jqXHR.status,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
						});
                    }else{
                        swal({
                            title: "Good Job!",
                            type: "success",
                            text: "Data Berhasil di Simpan",
                            confirmButtonColor: "#3cb878",
                        });
                        $('#tabelData_Infeksi').DataTable().ajax.reload();
                        $('#formISK').trigger("reset");
                        $("#modalISK .close").click();
                    }
            }
        });
    });
    $("#simpanCVL").click(function(e){
        e.preventDefault();
        $.ajax({
            url:"<?= base_url('/Erm_surveilans_hais_rs/insertCVL') ?>",
            method:"POST",
            data:{
                idpelayanan:$("#inPel").val(),
                 tmpInsersiCVL:$("#tmpInsersiCVL").val(),
                    tglDariCVL:$("#tglDariCVL").val(),
                    tglHinggaCVL:$("#tglHinggaCVL").val(),
                    unitCVL:$("#unitCVL").val(),
                    nmDokPerCVL:$("#nmDokPerCVL").val(),
                    tanda_cvl1:$("#tanda_cvl1").val(),
                    tanda_cvl2:$('input[name="tanda_cvl2"]:checked').val(),
                    tanda_cvl3:$('input[name="tanda_cvl3"]:checked').val(),
                    tanda_cvl4:$('input[name="tanda_cvl4"]:checked').val(),
                    tanda_cvl5:$('input[name="tanda_cvl5"]:checked').val(),
                    tanda_cvl6:$("#tanda_cvl6").val()
            },complete:function(res){
                if(res.status !== 200){
                    swal({
                        title: "Gagal!\nStatus Code "+res.status,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
						});
                }else{
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data Berhasil di Simpan",
                        confirmButtonColor: "#3cb878",
                        });
                        $('#tabelData_Infeksi').DataTable().ajax.reload();
                        $('#formCVL').trigger("reset");
                        $("#modalCVL .close").click();
                }
            }
        });
    });
    $("#simpanVAP").click(function(e){
        e.preventDefault();
        var vap = $('#formVAP').serializeArray();
        $.ajax({
            url:"<?= base_url('/Erm_surveilans_hais_rs/insertVAP') ?>",
            method:"POST",
            data:{
                idpelayanan:$("#inPel").val(),
                tmpInsersiVAP:$("#tmpInsersiVAP").val(),
                    tglDariVAP:$("#tglDariVAP").val(),
                    tglHinggaVAP:$("#tglHinggaVAP").val(),
                    unitVAP:$("#unitVAP").val(),
                    nmDokPerVAP:$("#nmDokPerVAP").val(),
                    tanda_vap1:$("#tanda_vap1").val(),
                    tanda_vap2:$('input[name="tanda_vap2"]:checked').val(),
                    tanda_vap3:$('input[name="tanda_vap3"]:checked').val(),
                    tanda_vap4:$('input[name="tanda_vap4"]:checked').val(),
                    tanda_vap5:$('input[name="tanda_vap5"]:checked').val(),
                    tanda_vap6:$("#tanda_vap6").val()
            },complete:function(res){
                if(res.status !== 200){
                    swal({
                        title: "Gagal!\nStatus Code "+res.status,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
						});
                }else{
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data Berhasil di Simpan",
                        confirmButtonColor: "#3cb878",
                        });
                        $('#tabelData_Infeksi').DataTable().ajax.reload();
                        $("#modalVAP .close").click();
                        $('#formISK').trigger("reset");
                }
            }
        });
    });

    $("#simpanDCB").click(function(e){
        e.preventDefault();
        $.ajax({
            url:"<?= base_url('/Erm_surveilans_hais_rs/insertDCB') ?>",
            method:"POST",
            data:{
                idpelayanan:$("#inPel").val(),
                tiba:$('input[name="tiba"]:checked').val(),
                tglDCBMulai:$("#tglDCBMulai").val(),
                tglDCBHingga:$("#tglDCBAkhir").val(),
                DCBAwal:$('input[name="DCBAwal"]:checked').val(),
                DCBGejala:$('input[name="DCBGejala"]:checked').val(),
                DCBNyeri:$('input[name="DCBNyeri"]:checked').val(),
                DCBGatal:$("input[name='DCBGatal']:checked").val(),
                DCBKemerahan:$('input[name="DCBKemerahan"]:checked').val(),
                DCBJaringan:$('input[name="DCBJaringan"]:checked').val(),
                DCBDangkal:$('input[name="DCBDangkal"]:checked').val(),
                DCBKulit:$("#DCBKulit").val(),
                DCBDalam:$('input[name="DCBDalam"]:checked').val(),
                DCBNekrosis:$('input[name="DCBNekrosis"]:checked').val(),
                DCBDekubitus:$('input[name="DCBDekubitus"]:checked').val()
            },complete:function(res){
                if(res.status !== 200){
                    swal({
                        title: "Gagal!\nStatus Code "+res.status,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
						});
                }else{
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data Berhasil di Simpan",
                        confirmButtonColor: "#3cb878",
                        });
                        $('#tabelData_Infeksi').DataTable().ajax.reload();
                        $('#formDCB').trigger("reset");
                        $("#modalDCB .close").click();
                }
            }
        });
    });


    $('#simpanIDO').on('click',function(){
            diagnosaIDO = $('#diagnosaIDO').val();
            tglIDO = $('#tglIDO').val();
            durasiIDO = $('#durasiIDO').val();
            nmTindakanIDO = $('#nmTindakanIDO').val();
            nmOperatorIDO = $('#nmOperatorIDO').val();
            tindakanIDO = $('input[name="tindakanIDO"]:checked').val();;
            jenisIDO = $('input[name="jenisIDO"]:checked').val();
            asaIDO = $('input[name="asaIDO"]:checked').val();
            tglTemuanIDO = $('#tglTemuanIDO').val();
            var tanda = [];
            var tandaElement = $("input[name='tandaIDO']");
            for(var i=0;i<tandaElement.length;i++){
                if(tandaElement[i].checked){
                    tanda.push(tandaElement[i].value);
                }
            }
            dosisProfilaksis = $('#dosisProfilaksis').val();
            tglProfilaksis = $('#tglProfilaksis').val();
            dosisPascaIDO = $('#dosisPascaIDO').val();
            tglPascaIDO = $('#tglPascaIDO').val();

            $.ajax({
                url:"<?= base_url('/erm_surveilans_hais_rs/insertIDO') ?>",
                method:"post",
                data:{
                    idpelayanan:$("#inPel").val(),
                    diagnosaIDO:diagnosaIDO,
                    tglIDO:tglIDO,
                    durasiIDO:durasiIDO,
                    nmTindakanIDO:nmTindakanIDO,
                    nmOperatorIDO:nmOperatorIDO,
                    jenisIDO:jenisIDO,
                    tindakanIDO:tindakanIDO,
                    asaIDO:asaIDO,
                    tglTemuanIDO:tglTemuanIDO,
                    tandaIDO:tanda.toString(),
                    dosisProfilaksis:dosisProfilaksis,
                    tglProfilaksis:tglProfilaksis,
                    dosisPascaIDO:dosisPascaIDO,
                    tglPascaIDO:tglPascaIDO
                },complete:function(res){
                if(res.status !== 200){
                    swal({
                        title: "Gagal!\nStatus Code "+res.status,
                        type: "warning",
                        confirmButtonColor: "#3cb878",
						});
                }else{
                    swal({
                        title: "Good Job!",
                        type: "success",
                        text: "Data Berhasil diSimpan",
                        confirmButtonColor: "#3cb878",
                        });
                        $('#tabelData_Infeksi').DataTable().ajax.reload();
                        $('#formIDO').trigger("reset");
                        $("#modalIDO .close").click();
                }
            }
            });
    });
</script>

<script type="text/javascript">
	/*Typeahead Init*/

	$(function() {
		"use strict";

		/*Basic*/

		var substringMatcher = function(strs) {
			return function findMatches(q, cb) {
				var matches, substringRegex;

				// an array that will be populated with substring matches
				matches = [];

				// regex used to determine if a string contains the substring `q`
				var substrRegex = new RegExp(q, 'i');

				// iterate through the pool of strings and for any string that
				// contains the substring `q`, add it to the `matches` array
				$.each(strs, function(i, str) {
					if (substrRegex.test(str)) {
						matches.push(str);
					}
				});

				cb(matches);
			};
		};

		var states = [
			<?php

			foreach ($diagnosa as $row) {
				echo ",'" . $row["id_diagnosa"] . " | " . $row["nama_diagnosa"] . "'";
			}  ?>
		];


		$('#the-basics .typeahead').typeahead({
			hint: true,
			highlight: true,
			minLength: 1
		}, {
			name: 'states',
			source: substringMatcher(states)
		});
	});

    function getUpdate(id,tipe){
        $.ajax({
            type: "POST",
            url: "<?= base_url("Erm_surveilans_hais_rs/getUpdateById") ?>",
            data: {
                id:id,
                tipe:tipe
            },
            dataType: "JSON",
            success: function (response) {
                    if(response[0].tipe == "IVL"){
                        $('#tmpInsersi').val(response[0].tmp_pms);
                        $('#tglIVLDari').val(response[0].tglDari);
                        $('#tglIVLHingga').val(response[0].tglHingga);
                        $('#IVLunit').val(response[0].unit);
                        $('#IVLnamaPerDok').val(response[0].nmDokPer);
                        $('#tanda_infeksi1').val(response[0].tanda_hais);
                        $('input[id="tanda_infeksi2"][value="'+response[0].tanda_hais2+'"]').prop('checked',true);
                        $('input[id="tanda_infeksi3"][value="'+response[0].tanda_hais3+'"]').prop('checked',true);
                        $('input[id="tanda_infeksi4"][value="'+response[0].tanda_hais4+'"]').prop('checked',true);
                        $('input[id="tanda_infeksi5"][value="'+response[0].tanda_hais5+'"]').prop('checked',true);

                        $('#tanda_infeksi6').val(response[0].tglTandaHais);
                        $("#simpanIVL").hide();
                        $("#updateIVL").show();
                    }

                    if(response[0].tipe == "ISK"){
                        $("#pemasanganKateter").val(response[0].tmp_pms);
                        $('input[id="kateterUrin"][value="'+response[0].kttUrin+'"]').prop('checked',true);
                        $('input[id="jenisKeteter"][value="'+response[0].kttJenis+'"]').prop('checked',true);
                        $('#tglISKDari').val(response[0].tglDari);
                        $('#tglISKHingga').val(response[0].tglHingga);
                        $('#ISKunit').val(response[0].unit);
                        $('#ISKnamaPerDok').val(response[0].nmDokPer);
                        $('#tanda_infeksi1a').val(response[0].tanda_hais);

                        $('input[id="tanda_infeksi2a"][value="'+response[0].tanda_hais2+'"]').prop('checked',true);
                        $('input[id="tanda_infeksi3a"][value="'+response[0].tanda_hais3+'"]').prop('checked',true);
                        $('input[id="tanda_infeksi4a"][value="'+response[0].tanda_hais4+'"]').prop('checked',true);
                        $('input[id="tanda_infeksi5a"][value="'+response[0].tanda_hais5+'"]').prop('checked',true);

                        $('#tanda_infeksi6a').val(response[0].tglTandaHais);
                        $("#simpanISK").hide();
                        $("#updateISK").show();
                    }

                    if(response[0].tipe == "DCB"){
                        $("input[name='tiba'][value='"+response[0].tirah_baring+"']").prop('checked',true);
                        $("input[name='DCBAwal'][value='"+response[0].drAwal+"']").prop('checked',true);
                        $("input[name='DCBGejala'][value='"+response[0].gejala+"']").prop('checked',true);
                        $("input[name='DCBNyeri'][value='"+response[0].nyeri+"']").prop('checked',true);
                        $("input[name='DCBGatal'][value='"+response[0].gatal+"']").prop('checked',true);
                        $("input[name='DCBKemerahan'][value='"+response[0].kemerahan+"']").prop('checked',true);
                        $("input[name='DCBJaringan'][value='"+response[0].jaringan_keras+"']").prop('checked',true);
                        $("input[name='DCBKulit']").val(response[0].suhu_kulit);
                        $("input[name='DCBDangkal'][value='"+response[0].dangkal+"']").prop('checked',true);
                        $("input[name='DCBDalam'][value='"+response[0].dalam+"']").prop('checked',true);
                        $("input[name='DCBNekrosis'][value='"+response[0].nekrosis+"']").prop('checked',true);
                        $("input[name='DCBDekubitus'][value='"+response[0].dekubitus+"']").prop('checked',true);
                        $('#tglDCBMulai').val(response[0].tgl_mulai);
                        $('#tglDCBHingga').val(response[0].tgl_hingga);

                        $("#simpanDCB").hide();
                        $("#updateDCB").show();
                    }

                    if(response[0].tipe == "CVL"){
                        $('#tmpInsersiCVL').val(response[0].tmp_pms);
                        $('#tglDariCVL').val(response[0].tglDari);
                        $('#tglHinggaCVL').val(response[0].tglHingga);
                        $('#unitCVL').val(response[0].unit);
                        $('#nmDokPerCVL').val(response[0].nmDokPer);
                        $('#tanda_cvl1').val(response[0].tanda_hais);
                        $('input[id="tanda_cvl2"][value="'+response[0].tanda_hais2+'"]').prop('checked',true);
                        $('input[id="tanda_cvl3"][value="'+response[0].tanda_hais3+'"]').prop('checked',true);
                        $('input[id="tanda_cvl4"][value="'+response[0].tanda_hais4+'"]').prop('checked',true);
                        $('input[id="tanda_cvl5"][value="'+response[0].tanda_hais5+'"]').prop('checked',true);
                        $('#tanda_cvl6').val(response[0].tglTandaHais);
                        $("#simpanCVL").hide();
                        $("#updateCVL").show();
                    }
                    if(response[0].tipe == "VAP"){
                        $('#tmpInsersiVAP').val(response[0].tmp_pms);
                        $('#tglDariVAP').val(response[0].tglDari);
                        $('#tglHinggaVAP').val(response[0].tglHingga);
                        $('#unitVAP').val(response[0].unit);
                        $('#nmDokPerVAP').val(response[0].nmDokPer);
                        $('#tanda_vap1').val(response[0].tanda_hais);
                        $('input[id="tanda_vap2"][value="'+response[0].tanda_hais2+'"]').prop('checked',true);
                        $('input[id="tanda_vap3"][value="'+response[0].tanda_hais3+'"]').prop('checked',true);
                        $('input[id="tanda_vap4"][value="'+response[0].tanda_hais4+'"]').prop('checked',true);
                        $('input[id="tanda_vap5"][value="'+response[0].tanda_hais5+'"]').prop('checked',true);
                        $('#tanda_vap6').val(response[0].tglTandaHais);
                        $("#simpanVAP").hide();
                        $("#updateVAP").show();
                    }
                    if(response[0].tipe == "IDO"){
                        $('#diagnosaIDO').val(response[0].diagnosaIDO);
                        $('#tglIDO').val(response[0].tglIDO);
                        $('#durasiIDO').val(response[0].durasiIDO);
                        $('#nmTindakanIDO').val(response[0].nmTindakanIDO);
                        $('#nmOperatorIDO').val(response[0].nmOperatorIDO);
                        
                        if(response[0].jenisIDO != null){
                            $('#jenisIDO[value="'+response[0].jenisIDO+'"]').prop('checked',true);
                        }
                        if(response[0].asaIDO != null){
                            $('#asaIDO[value="'+response[0].asaIDO+'"]').prop('checked',true);
                        }
                        if(response[0].tindakanIDO != null){
                            $('#tindakanIDO[value="'+response[0].tindakanIDO+'"]').prop('checked',true);
                        }
                        
                        var tanda = response[0].tandaIDO.split(',');
                        if(response[0].tandaIDO != null){
                            for(var i=0;i<tanda.length;i++){
                                $('input[name="tandaIDO"][value="'+tanda[i]+'"]').prop('checked',true);
                            }
                        }
                        $('#tglTemuanIDO').val(response[0].tglTemuanIDO);
                        $('#dosisProfilaksis').val(response[0].dosisProfilaksis);
                        $('#tglProfilaksis').val(response[0].tglProfilaksis);
                        $('#dosisPascaIDO').val(response[0].dosisPascaIDO);
                        $('#tglPascaIDO').val(response[0].tglPascaIDO);
                        $("#simpanIDO").hide();
                        $("#updateIDO").show();
                    }
                }
        });
    }
</script>