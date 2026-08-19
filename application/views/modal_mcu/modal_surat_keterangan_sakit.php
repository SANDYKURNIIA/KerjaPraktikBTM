<div class="modal fade bs-example-modal-lg" id="modal_medic_sertif" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> DATA SURAT KETERANGAN SAKIT
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-wrap">
                    <!-- /formbody -->

                    <div class="form-body">
                        <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL SURAT
                        </h6>
                        <hr width="95%">
                        <form id="formSuratKeteranganSakit" action="<?php echo base_url('Surat_keterangan_sakit/cetak_surat_sakit') ?>" method="post" enctype="multipart/form-data" role="form">
                            <div id="tambah_obat">

                                <div class="row">

                                    <input type="hidden" id="no_rm" name="surat_no_rm" >
                                    <input type="hidden" id="id_mcu" name="surat_id_mcu" value="<?php echo $id_pelayanan ?>">
                                   
 

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Kepada Instansi :</label>
                                            <div required class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="instansi" name="surat_instansi">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Dokter Pemeriksa :</label>
                                            <div required class="col-md-9 has-success">
                                                <select required name="surat_dokter_id" id="dokter_id" class="form-control">
                                                    <option value="">-- Pilih Dokter --</option>
                                                    <?php foreach ($data_dokter as $d): ?>
                                                        <option value="<?= $d->id_dokter; ?>"><?= $d->nama; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--/span-->

                                </div>
                                <hr>
                                <div class="row mt-10" >
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Tanggal Mulai Istirahat :</label>
                                            <div class="col-md-9 has-success">
                                                <input required type="date" class="form-control" id="inTanggalAwal" name="surat_inTanggalAwal">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Tanggal Akhir Istirahat :</label>
                                            <div class="col-md-9 has-success">
                                                <input required type="date" class="form-control" id="inTanggalAkhir" name="surat_inTanggalAkhir">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Kepada Email :</label>
                                            <div class="col-md-9 has-success">
                                                <input  type="text" class="form-control" id="email" name="surat_email" placeholder="siapa@gmail.com">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="form-actions mt-10">
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-12">
                                                <div id="batalFarmasi" onclick="batalFarmasi()" class="btn btn-danger ">BATAL</div>
                                                <button type="submit" class="btn btn-success mr-10">Tampil</button>
                                                <button type="button" id="btnKirim" class="btn btn-warning mr-10">KIRIM</button>

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

    document.getElementById('btnKirim').addEventListener('click', function() {
        const form = document.getElementById('formSuratKeteranganSakit');

        // ubah action sementara
        form.action = "<?php echo base_url('Surat_keterangan_sakit/insert_data_kirim'); ?>";

        // submit form
        form.submit();
    });
</script>