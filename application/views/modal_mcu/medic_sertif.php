<div class="modal fade bs-example-modal-lg" id="modal_medic_sertif" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> DATA SURAT KETERANGAN SEHAT
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->

                    <div class="form-body">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL SURAT
                        </h6>
                        <hr width="95%">
                        <form id="formObat" action="<?php echo base_url('Surat_mcu/cetak_medic_sertif') ?>" method="post" enctype="multipart/form-data" role="form">
                            <div id="tambah_obat">

                                <div class="row">
                                    <input type="hidden" class="form-control" id="inDokter1" name="inDokter">
                                    <input type="hidden" class="form-control" id="inName" name="inName" value="<?php echo $data_mcu['nama_pasien']; ?>">
                                    <input type="hidden" id="id_mcu" name="id_mcu" value="<?php echo $data_mcu['id_mcu']; ?>">
                                    <input type="hidden" id="intanggalmasuk" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                    <input type="hidden" class="form-control" id="inPlace" name="inPlace" value="<?php echo $data_mcu['tempat_lahir']; ?>">
                                    <input type="hidden" class="form-control" id="inDateofbirth" name="inDateofbirth" value="<?php echo $data_mcu['tgl_lahir']; ?>">
                                    <input type="hidden" class="form-control" id="inOccupation" name="inOccupation" value="<?php echo $data_mcu['occupation']; ?>">
                                    <input type="hidden" class="form-control" id="insex" name="insex" value="<?php echo $data_mcu['sex']; ?>">
                                    <input type="hidden" class="form-control" id="result_blood" name="result_blood" value="<?php echo $data_mcu['blood_group']; ?>">
                                    <input type="hidden" class="form-control" id="inAlamat" name="inAlamat" value="<?php echo $data_mcu['alamat']; ?>">

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">STATED HEALTH</label>
                                            <div class="col-md-9">
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="sehat" value="HEALTHY" id="sehat1"> <label class="control-label" for="sehat1">HEALTHY</label>
                                                </div>
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="sehat" value="GOOD" id="sehat2"> <label class="control-label" for="sehat2">GOOD </label>
                                                </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">CHECHKED DATE</label>
                                            <div class="col-md-9 has-success">
                                                <input type="date" class="form-control" id="inTanggal" name="inTanggal">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">WEIGHT</label>
                                            <div class="col-md-6 has-success">
                                                <input type="number" class="form-control" id="inWeight" value="0" name="inWeight">
                                                <span class="help-block"></span>
                                            </div>
                                            <div class="col-md-3">
                                                <p style="color: black;">Kg</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">HEIGHT</label>
                                            <div class="col-md-6 has-success">
                                                <input type="number" class="form-control" id="inHigh" value="0" name="inHigh">
                                                <span class="help-block"></span>
                                            </div>
                                            <div class="col-md-3">
                                                <p style="color: black;">Cm</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">BLOOD PRESSURE</label>
                                            <div class="col-md-6 has-success">
                                                <input type="number" class="form-control" id="tekanan_darah" value="0" name="tekanan_darah">
                                                <span class="help-block"></span>
                                            </div>
                                            <div class="col-md-3">
                                                <p style="color: black;">mmHg</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">COLOR BLIND</label>
                                            <div class="col-md-9">
                                                <div class="radio-button radio-button-primary col-md-7">
                                                    <input type="radio" name="blind" value="Not color blind" id="blind1"> <label class="control-label" for="blind1">NO</label>
                                                </div>
                                                <div class="radio-button radio-button-primary col-md-5">
                                                    <input type="radio" name="blind" value="Color blind" id="blind2"> <label class="control-label" for="blind2">YES</label>
                                                </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">REQUIRE TO</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="kebutuhan" name="kebutuhan">
                                                <span class="help-block"></span>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <!--/span-->


                            </div>
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>
                                                <button type="submit" class="btn btn-success mr-10">CETAK</button>

                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </form>

                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function batalFarmasi() {
        $('#modal_medic_sertif').modal('hide');
    }
</script>