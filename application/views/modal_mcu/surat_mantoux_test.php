<<<<<<< HEAD
<div class="modal fade bs-example-modal-lg" id="modal_mantoux_test" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> DATA SURAT KETERANGAN MANTOUX TEST
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->

                    <div class="form-body">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL SURAT
                        </h6>
                        <hr width="95%">
                        <form id="formObat" method="post" action="<?php echo base_url() . 'Surat_mcu/cetak_mantoux' ?>">
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
                                    <input type="hidden" class="form-control" id="inDokter5" name="inDokter">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HASIL MANTOUX TEST</label>
                                            <div class="col-md-9">
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="sehat" value="NEGATIF" id="sehat1"> <label class="control-label" for="sehat1">NEGATIF</label>
                                                </div>
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="sehat" value="POSITIF" id="sehat2"> <label class="control-label" for="sehat2">POSITIF </label>
                                                </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                  <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TANGGAL PERIKSA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="date" class="form-control" id="inTanggal" name="inTanggal" value="<?= date('Y-m-d'); ?>">
                                                <span class="help-block"></span>
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
        $('#modal_mantoux_test').modal('hide');
    }
=======
<div class="modal fade bs-example-modal-lg" id="modal_mantoux_test" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> DATA SURAT KETERANGAN MANTOUX TEST
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->

                    <div class="form-body">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL SURAT
                        </h6>
                        <hr width="95%">
                        <form id="formObat" method="post" action="<?php echo base_url() . 'Surat_mcu/cetak_mantoux' ?>">
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
                                    <input type="hidden" class="form-control" id="inDokter5" name="inDokter">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">HASIL MANTOUX TEST</label>
                                            <div class="col-md-9">
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="sehat" value="NEGATIF" id="sehat1"> <label class="control-label" for="sehat1">NEGATIF</label>
                                                </div>
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="sehat" value="POSITIF" id="sehat2"> <label class="control-label" for="sehat2">POSITIF </label>
                                                </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                  <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TANGGAL PERIKSA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="date" class="form-control" id="inTanggal" name="inTanggal" value="<?= date('Y-m-d'); ?>">
                                                <span class="help-block"></span>
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
        $('#modal_mantoux_test').modal('hide');
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>