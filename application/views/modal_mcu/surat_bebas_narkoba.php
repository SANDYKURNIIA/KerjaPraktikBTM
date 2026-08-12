<div class="modal fade bs-example-modal-lg" id="modal_bebas_narkoba" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> DATA SURAT KETERANGAN BEBAS NARKOBA
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->

                    <div class="form-body">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL SURAT
                        </h6>
                        <hr width="95%">
                        <form id="formObat" method="post" action="<?php echo base_url() . 'Surat_mcu/cetak_bebas_narkoba' ?>">
                            <div id="tambah_obat">

                                <div class="row">
                                    <input type="hidden" class="form-control" id="inName" name="inName" value="<?php echo $data_mcu['nama_pasien']; ?>">
                                    <input type="hidden" id="id_mcu" name="id_mcu" value="<?php echo $data_mcu['id_mcu']; ?>">
                                    <input type="hidden" id="intanggalmasuk" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                    <input type="hidden" class="form-control" id="inPlace" name="inPlace" value="<?php echo $data_mcu['tempat_lahir']; ?>">
                                    <input type="hidden" class="form-control" id="inDateofbirth" name="inDateofbirth" value="<?php echo $data_mcu['tgl_lahir']; ?>">
                                    <!-- <input type="hidden" class="form-control" id="inOccupation" name="inOccupation" value="<?php echo $data_mcu['occupation']; ?>"> -->
                                    <input type="hidden" class="form-control" id="insex" name="insex" value="<?php echo $data_mcu['sex']; ?>">
                                    <!-- <input type="hidden" class="form-control" id="result_blood" name="result_blood" value="<?php echo $data_mcu['blood_group']; ?>"> -->
                                    <input type="hidden" class="form-control" id="inAlamat" name="inAlamat" value="<?php echo $data_mcu['alamat']; ?>">
                                    <input type="hidden" class="form-control" id="inDokter7" name="inDokter">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TINGGI BADAN</label>
                                            <div class="col-md-6 has-success">
                                                <input type="number" class="form-control" id="tinggi" value="0" name="tinggi">
                                                <span class="help-block"></span>
                                            </div>
                                            <div class="col-md-3">
                                                <p style="color: black;">Cm</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">BERAT BADAN</label>
                                            <div class="col-md-6 has-success">
                                                <input type="number" class="form-control" id="berat" value="0" name="berat">
                                                <span class="help-block"></span>
                                            </div>
                                            <div class="col-md-3">
                                                <p style="color: black;">Kg</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TEKANAN DARAH</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="tekanan" value="0" name="tekanan">
                                                <span class="help-block"></span>
                                            </div>
                                            <div class="col-md-3">
                                                <p style="color: black;">mmHg</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">NADI</label>
                                            <div class="col-md-6 has-success">
                                                <input type="number" class="form-control" id="nadi" value="0" name="nadi">
                                                <span class="help-block"></span>
                                            </div>
                                            <div class="col-md-3">
                                                <p style="color: black;">x/mnt</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group-radio">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 custom-label">AMPHETAMINE</label>
                                            <div class="col-md-8 radio-group">
                                                <div class="radio-button radio-button-primary">
                                                    <input type="radio" name="amphetamine" value="NEGATIF" id="amphetamine1">
                                                    <label class="control-label" for="amphetamine1">NEGATIF</label>
                                                </div>
                                                <div class="radio-button radio-button-primary">
                                                    <input type="radio" name="amphetamine" value="POSITIF" id="amphetamine2">
                                                    <label class="control-label" for="amphetamine2">POSITIF</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-4">METAMPHETAMINE</label>
                                            <div class="col-md-8">
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="metamphetamine" value="NEGATIF" id="metamphetamine1"> <label class="control-label" for="metamphetamine1">NEGATIF</label>
                                                </div>
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="metamphetamine" value="POSITIF" id="metamphetamine2"> <label class="control-label" for="metamphetamine2">POSITIF</label>
                                                </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">MORPHINE</label>
                                            <div class="col-md-9">
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="morphine" value="NEGATIF" id="morphine1"> <label class="control-label" for="morphine1">NEGATIF</label>
                                                </div>
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="morphine" value="POSITIF" id="morphine2"> <label class="control-label" for="morphine2">POSITIF</label>
                                                    <span class="help-block"></span>
                                                </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-4">BENZODIAZEPAM</label>
                                            <div class="col-md-8">
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="benzodiazepam" value="NEGATIF" id="benzodiazepam1"> <label class="control-label" for="benzodiazepam1">NEGATIF</label>
                                                </div>
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="benzodiazepam" value="POSITIF" id="benzodiazepam2"> <label class="control-label" for="benzodiazepam2">POSITIF</label>
                                                    <span class="help-block"></span>
                                                </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">MARIJUANA</label>
                                            <div class="col-md-9">
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="marijuana" value="NEGATIF" id="marijuana1"> <label class="control-label" for="marijuana1">NEGATIF</label>
                                                </div>
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="marijuana" value="POSITIF" id="marijuana2"> <label class="control-label" for="marijuana2">POSITIF</label>
                                                    <span class="help-block"></span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-4">COCAIN</label>
                                            <div class="col-md-8">
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="cocain" value="NEGATIF" id="cocain1"> <label class="control-label" for="cocain1">NEGATIF</label>
                                                </div>
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="cocain" value="POSITIF" id="cocain2"> <label class="control-label" for="cocain2">POSITIF</label>
                                                </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TANGGAL PERIKSA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="date" class="form-control" id="inTanggal" name="inTanggal" value="<?php echo date("Y-m-d"); ?>">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">KEBUTUHAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="inKebutuhan" name="inKebutuhan">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group form-group-radio">
                                            <label class="control-label col-md-4 custom-label-full">TANDA - TANDA NARKOBA</label>
                                            <div class="col-md-8 radio-group-full">
                                                <div class="radio-button radio-button-primary">
                                                    <input type="radio" name="tanda_narkoba" value="DITEMUKAN" id="tanda1">
                                                    <label class="control-label" for="tanda1"><strong>DITEMUKAN</strong></label>
                                                </div>
                                                <div class="radio-button radio-button-primary">
                                                    <input type="radio" name="tanda_narkoba" value="TIDAK DITEMUKAN" id="tanda2">
                                                    <label class="control-label" for="tanda2"><strong>TIDAK DITEMUKAN</strong></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                // Ambil tanggal hari ini dalam format YYYY-MM-DD
                                const today = new Date().toISOString().split('T')[0];
                                document.getElementById('inTanggal').value = today;
                            </script>
                    </div>
                    <!--/span-->


                </div>
                <div class="form-actions mt-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
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
        $('#modal_bebas_narkoba').modal('hide');
    }
</script>