<div class="modal fade bs-example-modal-lg" id="modal_surat_sehat" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
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
                        <form id="formObat" action="<?php echo base_url('Surat_mcu/cetak_surat_sehat') ?>" method="post" enctype="multipart/form-data" role="form">
                            <div id="tambah_obat">

                                <div class="row">
                                    <input type="hidden" class="form-control" id="inName" name="inName" value="<?php echo $data_mcu['nama_pasien']; ?>">
                                    <input type="hidden" id="intanggalmasuk" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                    <input type="hidden" class="form-control" id="inPlace" name="inPlace" value="<?php echo $data_mcu['tempat_lahir']; ?>">
                                    <input type="hidden" class="form-control" id="inDateofbirth" name="inDateofbirth" value="<?php echo $data_mcu['tgl_lahir']; ?>">
                                    <input type="hidden" class="form-control" id="inOccupation" name="inOccupation" value="<?php echo $data_mcu['occupation']; ?>">
                                    <input type="hidden" class="form-control" id="inAlamat" name="inAlamat" value="<?php echo $data_mcu['alamat']; ?>">
                                    <input type="hidden" class="form-control" id="inDokter" name="inDokter">
                                    <input type="hidden" class="form-control" id="result_blood" name="result_blood" value="<?php echo $data_mcu['blood_group']; ?>">
                                    <input type="hidden" id="id_mcu" name="id_mcu" value="<?php echo $data_mcu['id_mcu']; ?>">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">SIP Dokter</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="dok_sip" name="dok_sip">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Jabatan Dokter</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="dok_jabatan" name="dok_jabatan">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr width="95%">
  					                <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">KESEHATAN</label>
                                            <div class="col-md-9">
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="sehat" value="BAIK" id="sehat1" checked>
                                                    <label class="control-label" for="sehat1">BAIK</label>
                                                </div>
                                                <div class="radio-button radio-button-primary col-md-6">
                                                    <input type="radio" name="sehat" value="TIDAK BAIK" id="sehat2">
                                                    <label class="control-label" for="sehat2">TIDAK BAIK</label>
                                                </div>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                   <div  class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TANGGAL PERIKSA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="date" class="form-control" id="inTanggal" name="inTanggal" value="<?php echo date("Y-m-d"); ?>">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                     <script>
                                        // Ambil tanggal hari ini dalam format YYYY-MM-DD
                                        const today = new Date().toISOString().split('T')[0];
                                        document.getElementById('inTanggal').value = today;
                                    </script> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">BERAT BADAN</label>
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
                                            <label class="control-label col-md-3">TINGGI BADAN</label>
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
                                            <label class="control-label col-md-3">TEKANAN DARAH</label>
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
                                            <label class="control-label col-md-3">Denyut Nadi</label>
                                            <div class="col-md-6 has-success">
                                                <input type="number" class="form-control" id="nadi" value="0" name="nadi">
                                                <span class="help-block"></span>
                                            </div>
                                            <div class="col-md-3">
                                                <p style="color: black;">/mnt</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Respirasi</label>
                                            <div class="col-md-6 has-success">
                                                <input type="number" class="form-control" id="respirasi" value="0" name="respirasi">
                                                <span class="help-block"></span>
                                            </div>
                                            <div class="col-md-3">
                                                <p style="color: black;">/mnt</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Suhu</label>
                                            <div class="col-md-6 has-success">
                                                <input type="number" class="form-control" id="suhu" value="0" name="suhu">
                                                <span class="help-block"></span>
                                            </div>
                                            <div class="col-md-3">
                                                <p style="color: black;">&#8451;</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">KEPERLUAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="kebutuhan" name="kebutuhan">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">KEADAAN UMUM</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="keadaan" name="keadaan">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">KEPALA - LEHER</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="kepala" name="kepala">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">THORAX</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="thorax" name="thorax">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">ABDOMEN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="abdomen" name="abdomen">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">EXTREMITAS</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="extremitas" name="extremitas">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">STATUS NEUROLOGIS</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="neurologis" name="neurologis">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">BUTA WARNA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="bwarna" name="bwarna">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">KETERANGAN</label>
                                            <div class="col-md-9 has-success">
                                                <textarea class="form-control" id="ket" name="ket"></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->



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
        $('#modal_surat_sehat').modal('hide');
    }
</script>