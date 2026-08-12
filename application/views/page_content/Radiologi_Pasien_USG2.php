<<<<<<< HEAD
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN USG</span>
            </h6>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display  pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TINDAKAN</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>TANGGAL REQUEST</th>
                                <th>JAM REQUEST</th>
                                <th>JAM PELAYANAN</th>
                                <th>DIAGNOSA</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>RUANG INAP</th>
                                <th>JENIS KLAIM</th>
                                <th>DOKTER DPJP</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TINDAKAN</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>TANGGAL REQUEST</th>
                                <th>JAM REQUEST</th>
                                <th>JAM PELAYANAN</th>
                                <th>DIAGNOSA</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>RUANG INAP</th>
                                <th>JENIS KLAIM</th>
                                <th>DOKTER DPJP</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN RADIOLOGI RAWAT INAP
                    </h5>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="modal-body mt-5">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN RADIOLOGI
                                RAWAT INAP</h6>
                            <hr width="95%">
                            <div class="table-wrap" style="width: 95%; margin: auto ">
                                <div class="table-responsive">
                                    <table class="table table-hover display  pb-60" id="tableradiologi">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>AKSI</th>
                                                <th>DETAIL</th>
                                                <th>EDIT</th>
                                                <th>STATUS</th>
                                                <th>NAMA TINDAKAN</th>
                                                <th>JUMLAH TINDAKAN</th>
                                                <th>BIAYA TINDAKAN</th>
                                                <th>DIAGNOSA</th>
                                                <th>DOKTER</th>
                                                <th>NAMA STAFF</th>
                                                <th>GAMBAR</th>
                                                <th>KETERANGAN</th>
                                                <th>HAPUS</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>AKSI</th>
                                                <th>DETAIL</th>
                                                <th>EDIT</th>
                                                <th>STATUS</th>
                                                <th>NAMA TINDAKAN</th>
                                                <th>JUMLAH TINDAKAN</th>
                                                <th>BIAYA TINDAKAN</th>
                                                <th>DIAGNOSA</th>
                                                <th>DOKTER</th>
                                                <th>NAMA STAFF</th>
                                                <th>GAMBAR</th>
                                                <th>KETERANGAN</th>
                                                <th>HAPUS</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4 pull-right mt-20">
                                <div class="table-wrap" style="width: 85%; margin-bottom:40px;">
                                    <div class="table-responsive ">
                                        <table class="table table-hover display " id="outTotalHargaRadiologi">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th style="font-weight:bold;">Total Keseluruhan</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /formbody -->
                    <div class="collapse" id="infoTindakan">
                        <div class="form-body mb-30">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                            </h6>
                            <hr width="95%">
                            <form class="form-horizontal" id="formdata">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" name="inNama" disabled id="inNama">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" name="inJumlah" id="inJumlah" disabled>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" name="inBiaya" disabled id="inBiaya">
                                                <input type="hidden" class="form-control" disabled id="idPelayanan" name="idPelayanan">
                                                <input type="hidden" class="form-control" disabled id="id_tindakan_radiologi" name="id_tindakan_radiologi">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DOKTER PEMBACA</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" name="inDPJP" placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;" tabindex="1" id="inDPJP">
                                                    <option value="-">-</option>
                                                    <?php
                                                    foreach ($dokter as $row) : ?>
                                                        <option value="<?php echo $row['nama']; ?>">
                                                            <?php echo $row['nama']; ?></option>
                                                    <?php endforeach; ?>
                                                </select><br>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group pl-15">
                                            <label class="control-label">UPLOAD FILE</label>
                                            <div class="panel-body" style="margin-left:-1em;">
                                                <div class="mt-5">
                                                    <input type="file" id="file_input" name="files[]" multiple />
                                                </div>
                                                <div class="pt-20" style="color:#e84a5f;">*File tidak boleh lebih besar
                                                    dari
                                                    5 mb, dan hanya berformat .jpg |.png |.jpeg |</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <span class="help-block"></span>

                                <!-- <div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<div class="row" style="margin-top:-3em; margin-bottom:15px;">
												<div class="col-md-12 pull-left">

													<label class="control-label col-md-3" style="margin-left:-6em;">KETERANGAN</label>
												</div>
											</div>
											<div class="col-md-12 has-success" style="margin-left:19px;">
												<textarea class="form-control" id="inKet" name="inKet" rows="13" style="max-width:95%; "></textarea>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div> -->
                                <span class="help-block"></span>
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6" style="margin-top:-1em;">
                                        <div class="form-group pull-right" style="margin-right:20px;">
                                            <button id="btn_upload" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>

                    <div class="collapse" id="gambar">
                        <div class="form-body mb-30">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                            </h6>
                            <hr width="95%">
                            <form class="form-horizontal" id="formedit">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" disabled id="outNama">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="outFrek" disabled>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" disabled id="outHarga">
                                            </div>
                                            <input type="hidden" class="form-control" disabled id="idPelayanan" name="idPelayanan">
                                            <input type="hidden" class="form-control" disabled id="id_tindakan_radiologi" name="id_tindakan_radiologi">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DOKTER PEMBACA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" disabled id="outDokter">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group pl-15">
                                            <label class="control-label">UPLOAD FILE</label>
                                            <div class="panel-body" style="margin-left:-1em;">
                                                <div class="mt-5">
                                                    <input type="file" id="file_input1" name="files1[]" multiple />
                                                </div>
                                                <div class="pt-20" style="color:#e84a5f;">*File tidak boleh lebih besar
                                                    dari
                                                    5 mb, dan hanya berformat .jpg |.pdf |.png |.gif |</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <span class="help-block"></span>

                                <span class="help-block"></span>
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6" style="margin-top:-1em;">
                                        <div class="form-group pull-right" style="margin-right:20px;">
                                            <button id="btn_upload" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="collapse" id="gambar1">
                        <div class="form-body mb-30">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>EXPERTISE RADIOLOGI
                            </h6>
                            <hr width="95%">
                            <!-- <form class="form-horizontal" id="formexpert"> -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group pl-15">
                                        <strong><label class="control-label">INPUT PASIEN</label></strong>
                                        <div class="panel-body" style="margin-left:-1em;">


                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">NAMA</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" disabled id="inNamaPasien2">
                                                        <span class="help-block"></span>
                                                        <input type="hidden" id="intanggalmasuk"
                                                        value="<?php echo date('Y-m-d H:i:s'); ?>">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">DOKTER PENGIRIM</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" disabled id="nama_dokter">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">TGL.LAHIR/ UMUR</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" disabled id="tgl_lahir">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">NO. RM</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" disabled id="no_rm">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">RUANGAN</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" disabled id="ruang">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <form id="form_expertise">
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">NO SEP</label>
                                                        <div class="col-md-9 has-success">
                                                            <input type="text" class="form-control" placeholder=" NO SEP ... ." id="no_sep">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="col-md-6" id="myColElement">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">Kesimpulan</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" disabled id="kesimpulan" value="-">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                document.addEventListener("DOMContentLoaded", function() {
                                                    var elementToHide = document.getElementById('myColElement');
                                                    if (elementToHide) {
                                                        elementToHide.style.display = 'none';
                                                    }
                                                });
                                            </script>


                                            <form id="text_expertise">
                                                <!-- Row -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-default card-view">
                                                            <div class="panel-heading">
                                                                <div class="pull-left">

                                                                    <h6 class="panel-title txt-dark">YTH. TEMAN SEJAWAT,</h6>

                                                                    <br>
                                                                    <h6 class="panel-title txt-dark">HASIL PEMERIKSAAN RADIOGRAFI BNO :</>
                                                                    </h6>

                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="panel-wrapper collapse in">
                                                                <div class="panel-body">
                                                                    <div> <textarea class="textarea" id="hasil_pemeriksaan" style="width: 100%; height: 300px; color: black;"> </textarea></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Row -->



                                                <!-- Row -->
                                                <!-- <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-default card-view">
                                                            <div class="panel-heading">
                                                                <div class="pull-left">

                                                                    <h6 class="panel-title txt-dark">KESIMPULAN :</h6>

                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="panel-wrapper collapse in">
                                                                <div class="panel-body">
                                                                    <div> <textarea class="summernote"  id="kesimpulan"> </textarea></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                        </div>
                                        </form>



                                        <div class="row">
                                            <div class="col-md-8" style="margin-top:0em;">
                                                <div class="form-group pull-right" style="margin-right:20px;">
                                                    <button type="button" data-dismiss="modal" onclick="insert_radiologi2()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
                                                    <button onclick="reset_form()" class="btn btn-default btn-anim  btn-sm ml-20 mt-5"><i class="icon-trash"></i><span class="btn-text">CLEAR FORM</span></button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="collapse" id="listTindakan">
                        <div class="form-wrap">
                            <!-- /formbody -->
                            <div class="form-body mt-10">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
                                    TINDAKAN
                                </h6>
                                <hr width="95%">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TINDAKAN RADIOLOGI</label>
                                            <div class="col-md-9 has-success" onchange="pilihTindakanRadiologi()">
                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanRadiologi" id="inTindakanRadiologi">
                                                    <option value="-">-</option>
                                                    <?php
                                                    foreach ($tindakan_radiologi as $row) :
                                                        $harga = $row['harga']; ?>
                                                        <option value="<?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama']; ?>">
                                                            <?php echo $row['nama']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control " id="outJumlahRadiologi" disabled placeholder="jumlah">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled id="outBiayaTindakanRadiologi">
                                                <input type="hidden" class="form-control" disabled id="id_pel_rad">
                                                <input type="hidden" class="form-control" disabled id="id_tin_rad">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TOTAL HARGA</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control " disabled id="outTotalRadiologi">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>

                                <div class="row">
                                    <div class="col-md-6">
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">GAMBAR</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control " disabled id="outGambar">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top:10px;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row" style="margin-bottom:15px;">
                                                <div class="col-md-12 pull-left">
                                                    <label class="control-label col-md-3">KETERANGAN</label>

                                                </div>
                                            </div>
                                            <div class="col-md-12 has-success">
                                                <textarea class="form-control" id="outKet" name="outKet" rows="13" style="max-width:100%; "></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button onclick="update_radiologi()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN
                                                    PERUBAHAN</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Tindakan -->
                    <div class="collapse" id="detailTindakan">
                        <div class="form-body mb-30">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL
                                TINDAKAN
                            </h6>
                            <hr width="95%">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" disabled id="outNamaDetail">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" id="outFrekDetail" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="help-block"></span>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" disabled id="outHargaDetail">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">DOKTER PEMBACA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" disabled id="outDokterDetail">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <span class="help-block"></span>

                            <!-- <div class="row mt-10">
								<div class="col-md-12">
									<div class="form-group">
										<div class="row" style="margin-bottom:15px; margin-top:10px;">
											<div class="col-md-12">
												<label class="control-label col-md-3">KETERANGAN</label>
											</div>
										</div>
										<div class="col-md-12 has-success">
											<textarea class="form-control" id="outKeteranganDetail" rows="13" style="max-width:100%; " disabled></textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div> -->
                        </div>
                        <!-- End -->

                        <div class="col-xs-7 text-center data-wrap-right" id="outRadiologi" style="display: none">
                            <br>
                            <table class="table table-hover display pb-60">
                                <tr>
                                    <td style="border-top: none !important;"><img src="<?php base_url(); ?>../assets/logo-rsbt.png"></td>
                                    <td style="border-top: none !important;">
                                        <h5>RUMAH SAKIT BAKTI TIMAH </h5>
                                        <p style="font-size:12px; line-height:18px">Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang<br>
                                            Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia<br>
                                            Telp. 0717 9100844, Fax. 0715 32165
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <strong>
                                <font color="000000" size="5%" style="margin-left:10px"> EXPERTISE RADIOLOGI</font>
                                <input type="hidden" class="form-control" disabled id="inNamaPasien">
                                <input type="hidden" class="form-control" disabled id="tgl_lahir">
                                <input type="hidden" class="form-control" disabled id="no_rm">
                                <input type="hidden" class="form-control" disabled id="cara_bayar">
                                <input type="hidden" class="form-control" disabled id="ruang">
                            </strong>

                            <table class="table pb-0" style="margin-top:10px">
                                <tbody style="color: black;">
                                    <tr>
                                        <td style="font-size:12px; width:10%; padding:10px; border:0px">NO RM</td>
                                        <td style="font-size:12px; padding:10px; border:0px">: &nbsp;
                                            <font id="noRm" />
                                        </td>
                                        <td style="font-size:12px; padding:10px; border:0px">TANGGAL PEMERIKSAAN</td>
                                        <td style="font-size:12px; padding:10px; border:0px">: &nbsp;
                                            <font id="tanggall" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="font-size:12px; width:10%; padding:10px; border:0px">JENIS KLAIM</td>
                                        <td style="font-size:12px; padding:10px; border:0px">: &nbsp;
                                            <font id="caraBayar" />
                                        </td>
                                        <td style="font-size:12px; padding:10px; border:0px">NAMA PASIEN</td>
                                        <td style="font-size:12px; padding:10px; border:0px">: &nbsp;
                                            <font id="namaPemeriksaan" />
                                        </td>

                                    </tr>

                                    <tr>
                                        <td style="font-size:12px; width:10%; padding:10px; border:0px">NAMA PEMERIKSAAN </td>
                                        <td style="font-size:12px; padding:10px; border:0px">: &nbsp;
                                            <font id="namaa" />
                                        </td>
                                        <td style="font-size:12px; padding:10px; border:0px">RUANG</td>
                                        <td style="font-size:12px; padding:10px; border:0px">: &nbsp;
                                            <font id="ruangg" />
                                        </td>

                                    </tr>

                                    <tr>
                                        <td style="font-size:12px; width:10%; padding:10px; border:0px"></td>
                                        <td style="font-size:12px; padding:10px; border:0px"></td>
                                        <td style="font-size:12px; padding:10px; border:0px">TANGGAL LAHIR</td>
                                        <td style="font-size:12px; padding:10px; border:0px">: &nbsp;
                                            <font id="tanggalLahir" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" style="margin-bottom:80px;">
                                <div class="col-md-12" style="margin-left:10px;">
                                    <b>KETERANGAN :</b>
                                    <font id="keterangann">
                                </div>
                            </div>

                            <table class="table">
                                <tr>
                                    <th style="width: 55%;border-top: none"></th>
                                    <th style="border-top: none; font-size:12px ">DOKTER PEMBACA HASIL,</th>
                                </tr>
                                <tr>
                                    <td style="width: 55%; border-top: none"></td>
                                    <td style="border-top: none; "><img style="margin-left:40px; margin-top:-2em; margin-bottom:-4em;" src="<?php base_url(); ?>../assets/ttd-rad.png"></td>
                                </tr>
                                <tr>
                                    <td style="width: 55%; border-top: none"></td>
                                    <td style="border-top: none">dr. Yustiana Heriwinarsi., Sp.Rad</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End -->

            </div>

            <style>
                td {
                    color: black;
                }

                .zoom:active {
                    position: relative;
                    overflow: hidden;
                    transition: all .3s ease-in-out;
                    -webkit-transform: scale(6.5);
                    transform: scale(6.5);
                }
            </style>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('#formdata').submit(function(e) {
                        e.preventDefault();
                        if ($('#file_input').val() == '') {
                            swal({
                                title: "Gagal!",
                                text: "Gambar belum di pilih",
                                type: "warning",
                                confirmButtonColor: "#3cb878",
                            });
                        }
                        var a = $('#idPelayanan').val();
                        var b = $('#inJumlah').val();
                        var c = $('#inBiaya').val();
                        var d = $('#id_tindakan_radiologi').val();

                        var formData = new FormData(this);
                        formData.append('inPelayanan', a);
                        formData.append('inJumlah', b);
                        formData.append('inBiaya', c);
                        formData.append('id_tindakan_radiologi', d);
                        $.ajax({
                            url: '<?php echo base_url(); ?>Radiologi/post_radiologi_ranap',
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                const success = data.status.success;
                                const error = data.status.error;
                                if (success > 0) {
                                    swal({
                                        title: "good job!",
                                        type: "success",
                                        text: "Data berhasil disimpan",
                                        confirmButtonColor: "#3cb878",
                                    });
                                    $("#inNama").val('');
                                    $("#inJumlah").val('');
                                    $("#file_input").val(null);
                                    $("#inBiaya").val('');
                                    $("#inKet").val('');
                                    $('#infoTindakan').collapse('hide');
                                    $('#detailTindakan').collapse('hide');
                                    $('#listTindakan').collapse('hide');
                                    $('#tableradiologi').DataTable().ajax.reload();
                                    $('#outTotalHargaRadiologi').DataTable().ajax.reload();
                                } else if (error > 0) {
                                    swal({
                                        title: "Gagal!",
                                        text: "Data tidak terkirim, mohon cek inputan Anda kembali",
                                        type: "warning",
                                        confirmButtonColor: "#3cb878",
                                    });
                                }
                            }
                        });
                    })
                    $('#formedit').submit(function(e) {
                        e.preventDefault();
                        if ($('#file_input1').val() == '') {
                            swal({
                                title: "Gagal!",
                                text: "Gambar belum di pilih",
                                type: "warning",
                                confirmButtonColor: "#3cb878",
                            });
                        }
                        var a = $('#idPelayanan').val();
                        var b = $('#inJumlah').val();
                        var c = $('#inBiaya').val();
                        var d = $('#id_tindakan_radiologi').val();

                        var formData = new FormData(this);
                        formData.append('inPelayanan', a);
                        formData.append('inJumlah', b);
                        formData.append('inBiaya', c);
                        formData.append('id_tindakan_radiologi', d);
                        $.ajax({
                            url: '<?php echo base_url(); ?>Radiologi/update_foto',
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                const success = data.status.success;
                                const error = data.status.error;
                                if (success > 0) {
                                    swal({
                                        title: "good job!",
                                        type: "success",
                                        text: "Data berhasil disimpan",
                                        confirmButtonColor: "#3cb878",
                                    });

                                    $("#file_input1").val(null);
                                    $('#infoTindakan').collapse('hide');
                                    $('#detailTindakan').collapse('hide');
                                    $('#listTindakan').collapse('hide');
                                    $('#gambar').collapse('hide');
                                    $('#tableradiologi').DataTable().ajax.reload();
                                    $('#outTotalHargaRadiologi').DataTable().ajax.reload();
                                } else if (error > 0) {
                                    swal({
                                        title: "Gagal!",
                                        text: "Data tidak terkirim, mohon cek inputan Anda kembali",
                                        type: "warning",
                                        confirmButtonColor: "#3cb878",
                                    });
                                }
                            }
                        });
                    })
                    $('#formexpert').submit(function(e) {
                        e.preventDefault();
                        if ($('#file_input2').val() == '') {
                            swal({
                                title: "Gagal!",
                                text: "Gambar belum di pilih",
                                type: "warning",
                                confirmButtonColor: "#3cb878",
                            });
                        }
                        var a = $('#idPelayanan').val();
                        var b = $('#inJumlah').val();
                        var c = $('#inBiaya').val();
                        var d = $('#id_tindakan_radiologi').val();

                        var formData = new FormData(this);
                        formData.append('inPelayanan', a);
                        formData.append('inJumlah', b);
                        formData.append('inBiaya', c);
                        formData.append('id_tindakan_radiologi', d);
                        $.ajax({
                            url: '<?php echo base_url(); ?>Radiologi/upload_expertise',
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                const success = data.status.success;
                                const error = data.status.error;
                                if (success > 0) {
                                    swal({
                                        title: "good job!",
                                        type: "success",
                                        text: "Data berhasil disimpan",
                                        confirmButtonColor: "#3cb878",
                                    });

                                    $("#file_input2").val(null);

                                    $('#gambar1').collapse('hide');
                                    $('#tableradiologi').DataTable().ajax.reload();
                                    $('#outTotalHargaRadiologi').DataTable().ajax.reload();
                                    $("#modal_edit_data").modal('hide');
                                    $('#datable').DataTable().ajax.reload();
                                } else if (error > 0) {
                                    swal({
                                        title: "Gagal!",
                                        text: "Data tidak terkirim, mohon cek inputan Anda kembali",
                                        type: "warning",
                                        confirmButtonColor: "#3cb878",
                                    });
                                }
                            }
                        });
                    })
                    $('#datable').DataTable({
                        "language": {
                            "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                            "sProcessing": "Sedang memproses...",
                            "sLengthMenu": "Tampilkan _MENU_ entri",
                            "sZeroRecords": "Tidak ditemukan data yang sesuai",
                            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                            "sInfoPostFix": "",
                            "sSearch": "Pencarian :",
                            "sUrl": "",
                            "oPaginate": {
                                "sFirst": "Pertama",
                                "sPrevious": "Sebelumnya",
                                "sNext": "Selanjutnya",
                                "sLast": "Terakhir"
                            },
                        },
                        "ajax": '<?php echo base_url('Radiologi/tampil_data_usg2'); ?>',
                        "deferRender": true,
                        "processing": true,
                        "order": [],
                        "columnDefs": [{
                            "targets": [0],
                            "orderable": false,
                        }, ],

                    });
                });



                function reload_data_radiologi2(id_pelayanan) {
                    $('#tableradiologi').dataTable().fnClearTable();
                    $('#tableradiologi').dataTable().fnDestroy();
                    $('#tableradiologi').DataTable({
                        "pageLength": 10,
                        "language": {
                            "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                            "sProcessing": "Sedang memproses...",
                            "sLengthMenu": "Tampilkan _MENU_ entri",
                            "sZeroRecords": "Tidak ditemukan data yang sesuai",
                            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                            "sInfoPostFix": "",
                            "sSearch": "Pencarian :",
                            "sUrl": "",
                            "oPaginate": {
                                "sFirst": "Pertama",
                                "sPrevious": "Sebelumnya",
                                "sNext": "Selanjutnya",
                                "sLast": "Terakhir",
                            }
                        },
                        "ajax": {
                            "url": '<?php echo base_url('Radiologi/tampil_ranap_radiologi2'); ?>',
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


                function reload_total_radiologi(id_pelayanan) {
                    $('#outTotalHargaRadiologi').dataTable().fnClearTable();
                    $('#outTotalHargaRadiologi').dataTable().fnDestroy();
                    $('#outTotalHargaRadiologi').DataTable({
                        "pageLength": 10,
                        "searching": false,
                        "lengthChange": false,
                        "bInfo": false,
                        "paging": false,
                        "language": {
                            "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                            "sProcessing": "Sedang memproses...",
                            "sLengthMenu": "Tampilkan _MENU_ entri",
                            "sZeroRecords": "Tidak ditemukan data yang sesuai",
                            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                            "sInfoPostFix": "",
                            "sSearch": "Pencarian :",
                            "sUrl": "",
                            "oPaginate": {
                                "sFirst": "Pertama",
                                "sPrevious": "Sebelumnya",
                                "sNext": "Selanjutnya",
                                "sLast": "Terakhir",
                            }
                        },
                        "ajax": {
                            "url": '<?php echo base_url('Radiologi/tampil_total_radiologi'); ?>',
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



                // Kondisi Display Modal Per-poli
                function edit_data_tindakan2(id_pelayanan, id_history, nama) {
                    $.ajax({
                        url: "<?= base_url() . 'Radiologi/getdata_radiologi2' ?>",
                        data: {
                            pelayanan: id_pelayanan,
                            history: id_history
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            if (data.status_dt == "found") {
                                $("#idPelayanan").val(data.id_pelayanan);
                                $("#id_pel_rad").val(data.id_pelayanan);
                                $("#tgl_lahir").val(data.tgl_lahir);
                                $("#ruang").val(data.nama_ruangan);
                                $("#no_rm").val(data.no_rm);
                                $("#cara_bayar").val(data.cara_bayar);
                                $("#inNamaPasien2").val(data.nama);
                                $("#nama_poli").val(data.nama_poli);
                                $("#nama_dokter").val(data.nama_dokter);
                                $("#modal_edit_data").modal('show');
                                reload_data_radiologi2(id_pelayanan);
                                reload_total_radiologi(id_pelayanan);
                            } else {
                                swal({
                                    title: "Gagal!",
                                    type: "warning",
                                    text: "Maaf, Data tidak ditemukan",
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                }

                function edit_tindakan_radiologi(id_pelayanan, id_tindakan_radiologi) {
                    $.ajax({
                        url: "<?= base_url() . 'Radiologi/getdata_formById' ?>",
                        data: {
                            pelayanan: id_pelayanan,
                            tindakan: id_tindakan_radiologi,
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            if (data.status_dt == "found") {
                                $("#inTindakanRadiologi").val(data.nama);
                                $('#listTindakan').collapse('toggle');
                                $('#detailTindakan').collapse('hide');
                                $('#infoTindakan').collapse('hide');
                                $("#outTotalRadiologi").val(data.total);
                                $("#outJumlahRadiologi").val(data.frek);
                                $("#outKet").val(data.keterangan);
                                $("#outGambar").val(data.gambar);
                                $("#outBiayaTindakanRadiologi").val(data.harga);
                                $("#id_tin_rad").val(data.id_tindakan_radiologi);
                                $("#id_pel_rad").val(data.id_pelayanan);

                            } else {
                                swal({
                                    title: "Gagal!",
                                    type: "warning",
                                    text: "Maaf, Data tidak ditemukan",
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                }

                function edit_gambar_radiologi(id_pelayanan, id_tindakan_radiologi) {
                    $.ajax({
                        url: "<?= base_url() . 'Radiologi/getdata_formById' ?>",
                        data: {
                            pelayanan: id_pelayanan,
                            tindakan: id_tindakan_radiologi,
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            if (data.status_dt == "found") {
                                $('#idPelayanan').val(id_pelayanan);
                                $('#id_tindakan_radiologi').val(id_tindakan_radiologi);
                                $('#gambar').collapse('toggle');
                                $('#listTindakan').collapse('hide');
                                $('#infoTindakan').collapse('hide');
                                $("#outNama").val(data.nama);
                                $("#outFrek").val(data.frek);
                                $("#outHarga").val(data.harga);
                                $("#outDokter").val(data.dokter);
                                $("#outKeterangan").val(data.keterangan);
                            } else {
                                swal({
                                    title: "Gagal!",
                                    type: "warning",
                                    text: "Maaf, Data tidak ditemukan",
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                }

                function aksi_radiologi(id_pelayanan, id_tindakan_radiologi) {
                    $.ajax({
                        url: "<?= base_url() . 'Radiologi/getdata_formById' ?>",
                        data: {
                            pelayanan: id_pelayanan,
                            tindakan: id_tindakan_radiologi,
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            if (data.status_dt == "found") {
                                $('#infoTindakan').collapse('toggle');
                                $('#detailTindakan').collapse('hide');
                                $('#listTindakan').collapse('hide');
                                $("#inNama").val(data.nama);
                                $("#inBiaya").val(data.total);
                                $("#inJumlah").val(data.frek);
                                $("#id_tindakan_radiologi").val(data.id_tindakan_radiologi);
                            } else {
                                swal({
                                    title: "Gagal!",
                                    type: "warning",
                                    text: "Maaf, Data tidak ditemukan",
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                }

                function detail_radiologi(id_pelayanan, id_tindakan_radiologi) {
                    $.ajax({
                        url: "<?= base_url() . 'Radiologi/getdata_formById' ?>",
                        data: {
                            pelayanan: id_pelayanan,
                            tindakan: id_tindakan_radiologi,
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            if (data.status_dt == "found") {
                                $('#detailTindakan').collapse('toggle');
                                $('#listTindakan').collapse('hide');
                                $('#infoTindakan').collapse('hide');
                                $("#outNamaDetail").val(data.nama);
                                $("#outFrekDetail").val(data.frek);
                                $("#outHargaDetail").val(data.harga);
                                $("#outDokterDetail").val(data.dokter);
                                $("#outKeteranganDetail").val(data.keterangan);
                            } else {
                                swal({
                                    title: "Gagal!",
                                    type: "warning",
                                    text: "Maaf, Data tidak ditemukan",
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                }

                function pilihTindakanRadiologi() {
                    a = $("#inTindakanRadiologi").val();
                    splitDiag = a.split("|");

                    harga = parseFloat(splitDiag[1]);
                    $("#outBiayaTindakanRadiologi").val(convertToRupiah(harga));
                    document.getElementById("outJumlahRadiologi").value = "1";
                    document.getElementById("outTotalRadiologi").value = convertToRupiah(harga);
                }

                function update_radiologi() {
                    a = $("#inTindakanRadiologi").val();
                    splitDiag = a.split("|");
                    harga = parseFloat(splitDiag[1]);
                    frek = parseFloat($("#outJumlahRadiologi").val());
                    total = harga * frek;
                    id_pel_rad = $('#id_pel_rad').val();
                    id_tin_rad = $('#id_tin_rad').val();
                    nama = $('#nama').val();
                    ket = $('#outKet').val();


                    dataString = 'id_tin_rad=' + id_tin_rad + '&harga=' + harga +
                        '&id_pel_rad=' + id_pel_rad + '&id_list_tindakan=' + splitDiag[0] +
                        '&frek=' + frek + '&total=' + total + '&ket=' + ket;
                    $.ajax({
                        url: "<?= base_url() . 'Radiologi/update_tindakan_radiologi' ?>",
                        method: "POST",
                        dataType: 'json',
                        data: dataString,
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Perubahan Tindakan ini Telah di Simpan!",
                                    confirmButtonColor: "#3cb878",
                                });
                                $("#outTotalRadiologi").val("");
                                $("#outJumlahRadiologi").val("");
                                $("#outBiayaTindakanRadiologi").val("");
                                $('#infoTindakan').collapse('hide');
                                $('#detailTindakan').collapse('hide');
                                $('#listTindakan').collapse('hide');
                                $('#tableradiologi').DataTable().ajax.reload();
                                $('#outTotalHargaRadiologi').DataTable().ajax.reload();
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
                }




                function insert_radiologi2() {
                    id_expertise = $('#id_expertise').val();
                    no_rm = $('#no_rm').val();
                    nama = $('#nama').val();
                    tgl_lahir = $('#tgl_lahir').val();
                    dokter_pengirim = $('#nama_dokter').val();
                    // ruang_poliklinik = $('#ruang_poliklinik').val();
                    nama_poli = $('#nama_poli').val();
                    no_sep = $('#no_sep').val();
                    hasil_pemeriksaan = $('#hasil_pemeriksaan').val();
                    kesimpulan = $('#kesimpulan').val();
                    id_tindakan_radiologi = $('#id_tindakan_radiologi').val();

                    dataString = 'id_expertise=' + id_expertise +
                        '&no_rm=' + no_rm + '&nama=' + nama +
                        '&tgl_lahir=' + tgl_lahir +
                        '&dokter_pengirim=' + dokter_pengirim +
                        // '&ruang_poliklinik=' + ruang_poliklinik +
                        '&nama_poli=' + nama_poli +
                        '&no_sep=' + no_sep +
                        '&hasil_pemeriksaan=' + hasil_pemeriksaan +
                        '&kesimpulan=' + kesimpulan + '&id_tindakan_radiologi=' + id_tindakan_radiologi;

                    $.ajax({
                        url: "<?= base_url() . 'Radiologi/insert_radiologi2' ?>",
                        method: "POST",
                        dataType: 'json',
                        data: dataString,
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Tindakan ini Telah di Simpan!",
                                    confirmButtonColor: "#3cb878",
                                });
                                $('#id_expertise').val('');
                                $('#no_rm').val('');
                                $('#nama').val('');
                                $('#tgl_lahir').val('');
                                $('#dokter_pengirim').val('');
                                // $('#ruang_poliklinik').val('');
                                $('#nama_poli').val('');
                                $('#no_sep').val('');
                                $('#hasil_pemeriksaan').summernote('reset');
                                $('#kesimpulan').summernote('reset');

                                $('#table_expertise').DataTable().ajax.reload();
                                // $('#table_radiologi').DataTable().ajax.reload();
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
                }





                // function print_radiologi(id_pelayanan, id_tindakan_radiologi) {
                // 	a = $("#inNamaPasien").val();
                // 	b = $("#tgl_lahir").val();
                // 	c = $("#no_rm").val();
                // 	d = $("#cara_bayar").val();
                // 	e = $("#ruang").val();
                // 	$.ajax({
                // 		url: "<?= base_url() . 'Radiologi/print_radiologi' ?>",
                // 		data: {
                // 			pelayanan: id_pelayanan,
                // 			tindakan: id_tindakan_radiologi,
                // 		},
                // 		type: 'POST',
                // 		dataType: 'json',
                // 		success: function(html) {
                // 			document.getElementById("namaa").innerHTML = html.nama;
                // 			document.getElementById("keterangann").innerHTML = html.keterangan;
                // 			document.getElementById("tanggall").innerHTML = html.tanggal;
                // 			document.getElementById("namaPemeriksaan").innerHTML = a;
                // 			document.getElementById("tanggalLahir").innerHTML = b;
                // 			document.getElementById("noRm").innerHTML = c;
                // 			document.getElementById("caraBayar").innerHTML = d;
                // 			document.getElementById("ruangg").innerHTML = e;

                // 			var printContents = document.getElementById("outRadiologi").innerHTML;
                // 			var originalContents = document.body.innerHTML;

                // 			document.body.innerHTML = printContents;

                // 			window.print();
                // 			window.location.reload();

                // 			document.body.innerHTML = originalContents;
                // 			$("#inNamaPasien").val(a);

                // 		}
                // 	});
                // }


                function pilihTindakan() {
                    a = $("#inTindakan").val();
                    splitDiag = a.split("|");
                    harga = parseFloat(splitDiag[1]);
                    $("#outBiayaTindakan").val(convertToRupiah(harga));
                    document.getElementById("inJumlah").value = "1";
                    document.getElementById("outTotalHargaRadiologi").value = convertToRupiah(harga);
                }

                function hargaTotal() {
                    splitDiag = a.split("|");
                    harga = parseFloat(splitDiag[1]);
                    frek = parseFloat($("#inJumlah").val());
                    total = harga * frek;

                    $("#outTotalHargaRadiologi").val(convertToRupiah(total));
                }

                function convertToRupiah(angka) {
                    var rupiah = '';
                    var angkarev = angka.toString().split('').reverse().join('');
                    for (var i = 0; i < angkarev.length; i++)
                        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
                }

                function hapus_radiologi(id_tindakan_radiologi, id_pelayanan, nama) {
                    swal({
                        title: "Apakah kamu yakin?",
                        text: "Menghapus data " + nama + "?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3cb878",
                        confirmButtonText: "Yakin",
                        cancelButtonText: "Batal",
                        closeOnConfirm: false
                    }, function() {
                        $().ready(function() {
                            $.ajax({
                                url: "<?php echo base_url() ?>Radiologi/hapus_data_radiologi",
                                method: "POST",
                                dataType: 'json',
                                data: {
                                    id_tindakan_radiologi: id_tindakan_radiologi,
                                },
                                success: function(data) {
                                    if (data.status == "success") {
                                        swal({
                                            title: "good job!",
                                            type: "success",
                                            text: "Data Berhasil dihapus",
                                            confirmButtonColor: "#3cb878",
                                        });
                                        $('#tableradiologi').DataTable().ajax.reload();
                                        $('#outTotalHargaRadiologi').DataTable().ajax.reload();
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
                        });

                    });
                    return false;
                }

                function verifikasi(id_tindakan_radiologi) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>Radiologi/verifikasi',
                        method: "POST",
                        data: {
                            id: id_tindakan_radiologi
                        },
                        cache: false,
                        dataType: 'JSON',
                        success: function(data) {
                            if (data.status == 'success') {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Data berhasil disimpan",
                                    confirmButtonColor: "#3cb878",
                                });

                                $("#modal_edit_data").modal('hide');
                                $('#datable').DataTable().ajax.reload();
                            } else {
                                swal({
                                    title: "Gagal!",
                                    text: "Data tidak terkirim, mohon cek inputan Anda kembali",
                                    type: "warning",
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                }

                function print_radiologi(id_pelayanan, id_tindakan_radiologi) {
                    $('#gambar1').collapse('toggle');
                    $('#id_tindakan_radiologi').val(id_tindakan_radiologi);

                }
=======
<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">PASIEN USG</span>
            </h6>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display  pb-30">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TINDAKAN</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>TANGGAL REQUEST</th>
                                <th>JAM REQUEST</th>
                                <th>JAM PELAYANAN</th>
                                <th>DIAGNOSA</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>RUANG INAP</th>
                                <th>JENIS KLAIM</th>
                                <th>DOKTER DPJP</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>TINDAKAN</th>
                                <th>NO RM</th>
                                <th>NAMA PASIEN</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>TANGGAL REQUEST</th>
                                <th>JAM REQUEST</th>
                                <th>JAM PELAYANAN</th>
                                <th>DIAGNOSA</th>
                                <th>JENIS KELAMIN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>UMUR</th>
                                <th>CARA MASUK</th>
                                <th>RUANG INAP</th>
                                <th>JENIS KLAIM</th>
                                <th>DOKTER DPJP</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="modal_edit_data" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel"><i class="icon-user mr-10"></i> TINDAKAN RADIOLOGI RAWAT INAP
                    </h5>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="modal-body mt-5">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-list mr-10"></i>TINDAKAN RADIOLOGI
                                RAWAT INAP</h6>
                            <hr width="95%">
                            <div class="table-wrap" style="width: 95%; margin: auto ">
                                <div class="table-responsive">
                                    <table class="table table-hover display  pb-60" id="tableradiologi">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>AKSI</th>
                                                <th>DETAIL</th>
                                                <th>EDIT</th>
                                                <th>STATUS</th>
                                                <th>NAMA TINDAKAN</th>
                                                <th>JUMLAH TINDAKAN</th>
                                                <th>BIAYA TINDAKAN</th>
                                                <th>DIAGNOSA</th>
                                                <th>DOKTER</th>
                                                <th>NAMA STAFF</th>
                                                <th>GAMBAR</th>
                                                <th>KETERANGAN</th>
                                                <th>HAPUS</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="bg-success">
                                                <th>NO</th>
                                                <th>AKSI</th>
                                                <th>DETAIL</th>
                                                <th>EDIT</th>
                                                <th>STATUS</th>
                                                <th>NAMA TINDAKAN</th>
                                                <th>JUMLAH TINDAKAN</th>
                                                <th>BIAYA TINDAKAN</th>
                                                <th>DIAGNOSA</th>
                                                <th>DOKTER</th>
                                                <th>NAMA STAFF</th>
                                                <th>GAMBAR</th>
                                                <th>KETERANGAN</th>
                                                <th>HAPUS</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4 pull-right mt-20">
                                <div class="table-wrap" style="width: 85%; margin-bottom:40px;">
                                    <div class="table-responsive ">
                                        <table class="table table-hover display " id="outTotalHargaRadiologi">
                                            <thead>
                                                <tr class="bg-success">
                                                    <th style="font-weight:bold;">Total Keseluruhan</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /formbody -->
                    <div class="collapse" id="infoTindakan">
                        <div class="form-body mb-30">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                            </h6>
                            <hr width="95%">
                            <form class="form-horizontal" id="formdata">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" name="inNama" disabled id="inNama">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" name="inJumlah" id="inJumlah" disabled>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" name="inBiaya" disabled id="inBiaya">
                                                <input type="hidden" class="form-control" disabled id="idPelayanan" name="idPelayanan">
                                                <input type="hidden" class="form-control" disabled id="id_tindakan_radiologi" name="id_tindakan_radiologi">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DOKTER PEMBACA</label>
                                            <div class="col-md-9 has-success">
                                                <select class="form-control filled-input select2" name="inDPJP" placeholder="PILIH NAMA DOKTER" style="border: 1px solid lightgreen;" tabindex="1" id="inDPJP">
                                                    <option value="-">-</option>
                                                    <?php
                                                    foreach ($dokter as $row) : ?>
                                                        <option value="<?php echo $row['nama']; ?>">
                                                            <?php echo $row['nama']; ?></option>
                                                    <?php endforeach; ?>
                                                </select><br>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group pl-15">
                                            <label class="control-label">UPLOAD FILE</label>
                                            <div class="panel-body" style="margin-left:-1em;">
                                                <div class="mt-5">
                                                    <input type="file" id="file_input" name="files[]" multiple />
                                                </div>
                                                <div class="pt-20" style="color:#e84a5f;">*File tidak boleh lebih besar
                                                    dari
                                                    5 mb, dan hanya berformat .jpg |.png |.jpeg |</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <span class="help-block"></span>

                                <!-- <div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<div class="row" style="margin-top:-3em; margin-bottom:15px;">
												<div class="col-md-12 pull-left">

													<label class="control-label col-md-3" style="margin-left:-6em;">KETERANGAN</label>
												</div>
											</div>
											<div class="col-md-12 has-success" style="margin-left:19px;">
												<textarea class="form-control" id="inKet" name="inKet" rows="13" style="max-width:95%; "></textarea>
												<span class="help-block"></span>
											</div>
										</div>
									</div>
								</div> -->
                                <span class="help-block"></span>
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6" style="margin-top:-1em;">
                                        <div class="form-group pull-right" style="margin-right:20px;">
                                            <button id="btn_upload" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>

                    <div class="collapse" id="gambar">
                        <div class="form-body mb-30">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO TINDAKAN
                            </h6>
                            <hr width="95%">
                            <form class="form-horizontal" id="formedit">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" disabled id="outNama">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" id="outFrek" disabled>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" disabled id="outHarga">
                                            </div>
                                            <input type="hidden" class="form-control" disabled id="idPelayanan" name="idPelayanan">
                                            <input type="hidden" class="form-control" disabled id="id_tindakan_radiologi" name="id_tindakan_radiologi">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">DOKTER PEMBACA</label>
                                            <div class="col-md-9 has-success">
                                                <input type="text" class="form-control" disabled id="outDokter">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group pl-15">
                                            <label class="control-label">UPLOAD FILE</label>
                                            <div class="panel-body" style="margin-left:-1em;">
                                                <div class="mt-5">
                                                    <input type="file" id="file_input1" name="files1[]" multiple />
                                                </div>
                                                <div class="pt-20" style="color:#e84a5f;">*File tidak boleh lebih besar
                                                    dari
                                                    5 mb, dan hanya berformat .jpg |.pdf |.png |.gif |</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <span class="help-block"></span>

                                <span class="help-block"></span>
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6" style="margin-top:-1em;">
                                        <div class="form-group pull-right" style="margin-right:20px;">
                                            <button id="btn_upload" type="submit" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="collapse" id="gambar1">
                        <div class="form-body mb-30">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>EXPERTISE RADIOLOGI
                            </h6>
                            <hr width="95%">
                            <!-- <form class="form-horizontal" id="formexpert"> -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group pl-15">
                                        <strong><label class="control-label">INPUT PASIEN</label></strong>
                                        <div class="panel-body" style="margin-left:-1em;">


                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">NAMA</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" disabled id="inNamaPasien2">
                                                        <span class="help-block"></span>
                                                        <input type="hidden" id="intanggalmasuk"
                                                        value="<?php echo date('Y-m-d H:i:s'); ?>">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">DOKTER PENGIRIM</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" disabled id="nama_dokter">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">TGL.LAHIR/ UMUR</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" disabled id="tgl_lahir">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">NO. RM</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" disabled id="no_rm">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">RUANGAN</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" disabled id="ruang">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <form id="form_expertise">
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="control-label col-md-3">NO SEP</label>
                                                        <div class="col-md-9 has-success">
                                                            <input type="text" class="form-control" placeholder=" NO SEP ... ." id="no_sep">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="col-md-6" id="myColElement">
                                                <div class="form-group ">
                                                    <label class="control-label col-md-3">Kesimpulan</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" disabled id="kesimpulan" value="-">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                document.addEventListener("DOMContentLoaded", function() {
                                                    var elementToHide = document.getElementById('myColElement');
                                                    if (elementToHide) {
                                                        elementToHide.style.display = 'none';
                                                    }
                                                });
                                            </script>


                                            <form id="text_expertise">
                                                <!-- Row -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-default card-view">
                                                            <div class="panel-heading">
                                                                <div class="pull-left">

                                                                    <h6 class="panel-title txt-dark">YTH. TEMAN SEJAWAT,</h6>

                                                                    <br>
                                                                    <h6 class="panel-title txt-dark">HASIL PEMERIKSAAN RADIOGRAFI BNO :</>
                                                                    </h6>

                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="panel-wrapper collapse in">
                                                                <div class="panel-body">
                                                                    <div> <textarea class="textarea" id="hasil_pemeriksaan" style="width: 100%; height: 300px; color: black;"> </textarea></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Row -->



                                                <!-- Row -->
                                                <!-- <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-default card-view">
                                                            <div class="panel-heading">
                                                                <div class="pull-left">

                                                                    <h6 class="panel-title txt-dark">KESIMPULAN :</h6>

                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="panel-wrapper collapse in">
                                                                <div class="panel-body">
                                                                    <div> <textarea class="summernote"  id="kesimpulan"> </textarea></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                        </div>
                                        </form>



                                        <div class="row">
                                            <div class="col-md-8" style="margin-top:0em;">
                                                <div class="form-group pull-right" style="margin-right:20px;">
                                                    <button type="button" data-dismiss="modal" onclick="insert_radiologi2()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>
                                                    <button onclick="reset_form()" class="btn btn-default btn-anim  btn-sm ml-20 mt-5"><i class="icon-trash"></i><span class="btn-text">CLEAR FORM</span></button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="collapse" id="listTindakan">
                        <div class="form-wrap">
                            <!-- /formbody -->
                            <div class="form-body mt-10">
                                <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>INFO
                                    TINDAKAN
                                </h6>
                                <hr width="95%">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">TINDAKAN RADIOLOGI</label>
                                            <div class="col-md-9 has-success" onchange="pilihTindakanRadiologi()">
                                                <select class="form-control filled-input select2" style="border: 1px solid lightgreen;" tabindex="1" name="inTindakanRadiologi" id="inTindakanRadiologi">
                                                    <option value="-">-</option>
                                                    <?php
                                                    foreach ($tindakan_radiologi as $row) :
                                                        $harga = $row['harga']; ?>
                                                        <option value="<?php echo $row['id_daftar_tindakan'] . "|" . $harga . "|" .  $row['nama']; ?>">
                                                            <?php echo $row['nama']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control " id="outJumlahRadiologi" disabled placeholder="jumlah">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control" disabled id="outBiayaTindakanRadiologi">
                                                <input type="hidden" class="form-control" disabled id="id_pel_rad">
                                                <input type="hidden" class="form-control" disabled id="id_tin_rad">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">TOTAL HARGA</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control " disabled id="outTotalRadiologi">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>

                                <div class="row">
                                    <div class="col-md-6">
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">GAMBAR</label>
                                            <div class="col-md-9 has-error">
                                                <input type="text" class="form-control " disabled id="outGambar">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top:10px;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row" style="margin-bottom:15px;">
                                                <div class="col-md-12 pull-left">
                                                    <label class="control-label col-md-3">KETERANGAN</label>

                                                </div>
                                            </div>
                                            <div class="col-md-12 has-success">
                                                <textarea class="form-control" id="outKet" name="outKet" rows="13" style="max-width:100%; "></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button onclick="update_radiologi()" class="btn btn-success btn-anim  btn-sm ml-20 mt-5"><i class="icon-rocket"></i><span class="btn-text">SIMPAN
                                                    PERUBAHAN</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Tindakan -->
                    <div class="collapse" id="detailTindakan">
                        <div class="form-body mb-30">
                            <h6 class="txt-dark capitalize-font pl-20"><i class="icon-notebook mr-10"></i>DETAIL
                                TINDAKAN
                            </h6>
                            <hr width="95%">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">NAMA TINDAKAN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" disabled id="outNamaDetail">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">JUMLAH TINDAKAN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" id="outFrekDetail" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="help-block"></span>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">BIAYA TINDAKAN</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" disabled id="outHargaDetail">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">DOKTER PEMBACA</label>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" disabled id="outDokterDetail">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <span class="help-block"></span>

                            <!-- <div class="row mt-10">
								<div class="col-md-12">
									<div class="form-group">
										<div class="row" style="margin-bottom:15px; margin-top:10px;">
											<div class="col-md-12">
												<label class="control-label col-md-3">KETERANGAN</label>
											</div>
										</div>
										<div class="col-md-12 has-success">
											<textarea class="form-control" id="outKeteranganDetail" rows="13" style="max-width:100%; " disabled></textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div> -->
                        </div>
                        <!-- End -->

                        <div class="col-xs-7 text-center data-wrap-right" id="outRadiologi" style="display: none">
                            <br>
                            <table class="table table-hover display pb-60">
                                <tr>
                                    <td style="border-top: none !important;"><img src="<?php base_url(); ?>../assets/logo-rsbt.png"></td>
                                    <td style="border-top: none !important;">
                                        <h5>RUMAH SAKIT BAKTI TIMAH </h5>
                                        <p style="font-size:12px; line-height:18px">Jalan Bukit Baru No. 1, Pangkalpinang, Taman Bunga, Kec. Gerunggang<br>
                                            Kabupaten Bangka, Kepulauan Bangka Belitung, Indonesia<br>
                                            Telp. 0717 9100844, Fax. 0715 32165
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <strong>
                                <font color="000000" size="5%" style="margin-left:10px"> EXPERTISE RADIOLOGI</font>
                                <input type="hidden" class="form-control" disabled id="inNamaPasien">
                                <input type="hidden" class="form-control" disabled id="tgl_lahir">
                                <input type="hidden" class="form-control" disabled id="no_rm">
                                <input type="hidden" class="form-control" disabled id="cara_bayar">
                                <input type="hidden" class="form-control" disabled id="ruang">
                            </strong>

                            <table class="table pb-0" style="margin-top:10px">
                                <tbody style="color: black;">
                                    <tr>
                                        <td style="font-size:12px; width:10%; padding:10px; border:0px">NO RM</td>
                                        <td style="font-size:12px; padding:10px; border:0px">: &nbsp;
                                            <font id="noRm" />
                                        </td>
                                        <td style="font-size:12px; padding:10px; border:0px">TANGGAL PEMERIKSAAN</td>
                                        <td style="font-size:12px; padding:10px; border:0px">: &nbsp;
                                            <font id="tanggall" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="font-size:12px; width:10%; padding:10px; border:0px">JENIS KLAIM</td>
                                        <td style="font-size:12px; padding:10px; border:0px">: &nbsp;
                                            <font id="caraBayar" />
                                        </td>
                                        <td style="font-size:12px; padding:10px; border:0px">NAMA PASIEN</td>
                                        <td style="font-size:12px; padding:10px; border:0px">: &nbsp;
                                            <font id="namaPemeriksaan" />
                                        </td>

                                    </tr>

                                    <tr>
                                        <td style="font-size:12px; width:10%; padding:10px; border:0px">NAMA PEMERIKSAAN </td>
                                        <td style="font-size:12px; padding:10px; border:0px">: &nbsp;
                                            <font id="namaa" />
                                        </td>
                                        <td style="font-size:12px; padding:10px; border:0px">RUANG</td>
                                        <td style="font-size:12px; padding:10px; border:0px">: &nbsp;
                                            <font id="ruangg" />
                                        </td>

                                    </tr>

                                    <tr>
                                        <td style="font-size:12px; width:10%; padding:10px; border:0px"></td>
                                        <td style="font-size:12px; padding:10px; border:0px"></td>
                                        <td style="font-size:12px; padding:10px; border:0px">TANGGAL LAHIR</td>
                                        <td style="font-size:12px; padding:10px; border:0px">: &nbsp;
                                            <font id="tanggalLahir" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" style="margin-bottom:80px;">
                                <div class="col-md-12" style="margin-left:10px;">
                                    <b>KETERANGAN :</b>
                                    <font id="keterangann">
                                </div>
                            </div>

                            <table class="table">
                                <tr>
                                    <th style="width: 55%;border-top: none"></th>
                                    <th style="border-top: none; font-size:12px ">DOKTER PEMBACA HASIL,</th>
                                </tr>
                                <tr>
                                    <td style="width: 55%; border-top: none"></td>
                                    <td style="border-top: none; "><img style="margin-left:40px; margin-top:-2em; margin-bottom:-4em;" src="<?php base_url(); ?>../assets/ttd-rad.png"></td>
                                </tr>
                                <tr>
                                    <td style="width: 55%; border-top: none"></td>
                                    <td style="border-top: none">dr. Yustiana Heriwinarsi., Sp.Rad</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End -->

            </div>

            <style>
                td {
                    color: black;
                }

                .zoom:active {
                    position: relative;
                    overflow: hidden;
                    transition: all .3s ease-in-out;
                    -webkit-transform: scale(6.5);
                    transform: scale(6.5);
                }
            </style>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('#formdata').submit(function(e) {
                        e.preventDefault();
                        if ($('#file_input').val() == '') {
                            swal({
                                title: "Gagal!",
                                text: "Gambar belum di pilih",
                                type: "warning",
                                confirmButtonColor: "#3cb878",
                            });
                        }
                        var a = $('#idPelayanan').val();
                        var b = $('#inJumlah').val();
                        var c = $('#inBiaya').val();
                        var d = $('#id_tindakan_radiologi').val();

                        var formData = new FormData(this);
                        formData.append('inPelayanan', a);
                        formData.append('inJumlah', b);
                        formData.append('inBiaya', c);
                        formData.append('id_tindakan_radiologi', d);
                        $.ajax({
                            url: '<?php echo base_url(); ?>Radiologi/post_radiologi_ranap',
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                const success = data.status.success;
                                const error = data.status.error;
                                if (success > 0) {
                                    swal({
                                        title: "good job!",
                                        type: "success",
                                        text: "Data berhasil disimpan",
                                        confirmButtonColor: "#3cb878",
                                    });
                                    $("#inNama").val('');
                                    $("#inJumlah").val('');
                                    $("#file_input").val(null);
                                    $("#inBiaya").val('');
                                    $("#inKet").val('');
                                    $('#infoTindakan').collapse('hide');
                                    $('#detailTindakan').collapse('hide');
                                    $('#listTindakan').collapse('hide');
                                    $('#tableradiologi').DataTable().ajax.reload();
                                    $('#outTotalHargaRadiologi').DataTable().ajax.reload();
                                } else if (error > 0) {
                                    swal({
                                        title: "Gagal!",
                                        text: "Data tidak terkirim, mohon cek inputan Anda kembali",
                                        type: "warning",
                                        confirmButtonColor: "#3cb878",
                                    });
                                }
                            }
                        });
                    })
                    $('#formedit').submit(function(e) {
                        e.preventDefault();
                        if ($('#file_input1').val() == '') {
                            swal({
                                title: "Gagal!",
                                text: "Gambar belum di pilih",
                                type: "warning",
                                confirmButtonColor: "#3cb878",
                            });
                        }
                        var a = $('#idPelayanan').val();
                        var b = $('#inJumlah').val();
                        var c = $('#inBiaya').val();
                        var d = $('#id_tindakan_radiologi').val();

                        var formData = new FormData(this);
                        formData.append('inPelayanan', a);
                        formData.append('inJumlah', b);
                        formData.append('inBiaya', c);
                        formData.append('id_tindakan_radiologi', d);
                        $.ajax({
                            url: '<?php echo base_url(); ?>Radiologi/update_foto',
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                const success = data.status.success;
                                const error = data.status.error;
                                if (success > 0) {
                                    swal({
                                        title: "good job!",
                                        type: "success",
                                        text: "Data berhasil disimpan",
                                        confirmButtonColor: "#3cb878",
                                    });

                                    $("#file_input1").val(null);
                                    $('#infoTindakan').collapse('hide');
                                    $('#detailTindakan').collapse('hide');
                                    $('#listTindakan').collapse('hide');
                                    $('#gambar').collapse('hide');
                                    $('#tableradiologi').DataTable().ajax.reload();
                                    $('#outTotalHargaRadiologi').DataTable().ajax.reload();
                                } else if (error > 0) {
                                    swal({
                                        title: "Gagal!",
                                        text: "Data tidak terkirim, mohon cek inputan Anda kembali",
                                        type: "warning",
                                        confirmButtonColor: "#3cb878",
                                    });
                                }
                            }
                        });
                    })
                    $('#formexpert').submit(function(e) {
                        e.preventDefault();
                        if ($('#file_input2').val() == '') {
                            swal({
                                title: "Gagal!",
                                text: "Gambar belum di pilih",
                                type: "warning",
                                confirmButtonColor: "#3cb878",
                            });
                        }
                        var a = $('#idPelayanan').val();
                        var b = $('#inJumlah').val();
                        var c = $('#inBiaya').val();
                        var d = $('#id_tindakan_radiologi').val();

                        var formData = new FormData(this);
                        formData.append('inPelayanan', a);
                        formData.append('inJumlah', b);
                        formData.append('inBiaya', c);
                        formData.append('id_tindakan_radiologi', d);
                        $.ajax({
                            url: '<?php echo base_url(); ?>Radiologi/upload_expertise',
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                const success = data.status.success;
                                const error = data.status.error;
                                if (success > 0) {
                                    swal({
                                        title: "good job!",
                                        type: "success",
                                        text: "Data berhasil disimpan",
                                        confirmButtonColor: "#3cb878",
                                    });

                                    $("#file_input2").val(null);

                                    $('#gambar1').collapse('hide');
                                    $('#tableradiologi').DataTable().ajax.reload();
                                    $('#outTotalHargaRadiologi').DataTable().ajax.reload();
                                    $("#modal_edit_data").modal('hide');
                                    $('#datable').DataTable().ajax.reload();
                                } else if (error > 0) {
                                    swal({
                                        title: "Gagal!",
                                        text: "Data tidak terkirim, mohon cek inputan Anda kembali",
                                        type: "warning",
                                        confirmButtonColor: "#3cb878",
                                    });
                                }
                            }
                        });
                    })
                    $('#datable').DataTable({
                        "language": {
                            "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                            "sProcessing": "Sedang memproses...",
                            "sLengthMenu": "Tampilkan _MENU_ entri",
                            "sZeroRecords": "Tidak ditemukan data yang sesuai",
                            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                            "sInfoPostFix": "",
                            "sSearch": "Pencarian :",
                            "sUrl": "",
                            "oPaginate": {
                                "sFirst": "Pertama",
                                "sPrevious": "Sebelumnya",
                                "sNext": "Selanjutnya",
                                "sLast": "Terakhir"
                            },
                        },
                        "ajax": '<?php echo base_url('Radiologi/tampil_data_usg2'); ?>',
                        "deferRender": true,
                        "processing": true,
                        "order": [],
                        "columnDefs": [{
                            "targets": [0],
                            "orderable": false,
                        }, ],

                    });
                });



                function reload_data_radiologi2(id_pelayanan) {
                    $('#tableradiologi').dataTable().fnClearTable();
                    $('#tableradiologi').dataTable().fnDestroy();
                    $('#tableradiologi').DataTable({
                        "pageLength": 10,
                        "language": {
                            "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                            "sProcessing": "Sedang memproses...",
                            "sLengthMenu": "Tampilkan _MENU_ entri",
                            "sZeroRecords": "Tidak ditemukan data yang sesuai",
                            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                            "sInfoPostFix": "",
                            "sSearch": "Pencarian :",
                            "sUrl": "",
                            "oPaginate": {
                                "sFirst": "Pertama",
                                "sPrevious": "Sebelumnya",
                                "sNext": "Selanjutnya",
                                "sLast": "Terakhir",
                            }
                        },
                        "ajax": {
                            "url": '<?php echo base_url('Radiologi/tampil_ranap_radiologi2'); ?>',
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


                function reload_total_radiologi(id_pelayanan) {
                    $('#outTotalHargaRadiologi').dataTable().fnClearTable();
                    $('#outTotalHargaRadiologi').dataTable().fnDestroy();
                    $('#outTotalHargaRadiologi').DataTable({
                        "pageLength": 10,
                        "searching": false,
                        "lengthChange": false,
                        "bInfo": false,
                        "paging": false,
                        "language": {
                            "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                            "sProcessing": "Sedang memproses...",
                            "sLengthMenu": "Tampilkan _MENU_ entri",
                            "sZeroRecords": "Tidak ditemukan data yang sesuai",
                            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                            "sInfoPostFix": "",
                            "sSearch": "Pencarian :",
                            "sUrl": "",
                            "oPaginate": {
                                "sFirst": "Pertama",
                                "sPrevious": "Sebelumnya",
                                "sNext": "Selanjutnya",
                                "sLast": "Terakhir",
                            }
                        },
                        "ajax": {
                            "url": '<?php echo base_url('Radiologi/tampil_total_radiologi'); ?>',
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



                // Kondisi Display Modal Per-poli
                function edit_data_tindakan2(id_pelayanan, id_history, nama) {
                    $.ajax({
                        url: "<?= base_url() . 'Radiologi/getdata_radiologi2' ?>",
                        data: {
                            pelayanan: id_pelayanan,
                            history: id_history
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            if (data.status_dt == "found") {
                                $("#idPelayanan").val(data.id_pelayanan);
                                $("#id_pel_rad").val(data.id_pelayanan);
                                $("#tgl_lahir").val(data.tgl_lahir);
                                $("#ruang").val(data.nama_ruangan);
                                $("#no_rm").val(data.no_rm);
                                $("#cara_bayar").val(data.cara_bayar);
                                $("#inNamaPasien2").val(data.nama);
                                $("#nama_poli").val(data.nama_poli);
                                $("#nama_dokter").val(data.nama_dokter);
                                $("#modal_edit_data").modal('show');
                                reload_data_radiologi2(id_pelayanan);
                                reload_total_radiologi(id_pelayanan);
                            } else {
                                swal({
                                    title: "Gagal!",
                                    type: "warning",
                                    text: "Maaf, Data tidak ditemukan",
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                }

                function edit_tindakan_radiologi(id_pelayanan, id_tindakan_radiologi) {
                    $.ajax({
                        url: "<?= base_url() . 'Radiologi/getdata_formById' ?>",
                        data: {
                            pelayanan: id_pelayanan,
                            tindakan: id_tindakan_radiologi,
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            if (data.status_dt == "found") {
                                $("#inTindakanRadiologi").val(data.nama);
                                $('#listTindakan').collapse('toggle');
                                $('#detailTindakan').collapse('hide');
                                $('#infoTindakan').collapse('hide');
                                $("#outTotalRadiologi").val(data.total);
                                $("#outJumlahRadiologi").val(data.frek);
                                $("#outKet").val(data.keterangan);
                                $("#outGambar").val(data.gambar);
                                $("#outBiayaTindakanRadiologi").val(data.harga);
                                $("#id_tin_rad").val(data.id_tindakan_radiologi);
                                $("#id_pel_rad").val(data.id_pelayanan);

                            } else {
                                swal({
                                    title: "Gagal!",
                                    type: "warning",
                                    text: "Maaf, Data tidak ditemukan",
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                }

                function edit_gambar_radiologi(id_pelayanan, id_tindakan_radiologi) {
                    $.ajax({
                        url: "<?= base_url() . 'Radiologi/getdata_formById' ?>",
                        data: {
                            pelayanan: id_pelayanan,
                            tindakan: id_tindakan_radiologi,
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            if (data.status_dt == "found") {
                                $('#idPelayanan').val(id_pelayanan);
                                $('#id_tindakan_radiologi').val(id_tindakan_radiologi);
                                $('#gambar').collapse('toggle');
                                $('#listTindakan').collapse('hide');
                                $('#infoTindakan').collapse('hide');
                                $("#outNama").val(data.nama);
                                $("#outFrek").val(data.frek);
                                $("#outHarga").val(data.harga);
                                $("#outDokter").val(data.dokter);
                                $("#outKeterangan").val(data.keterangan);
                            } else {
                                swal({
                                    title: "Gagal!",
                                    type: "warning",
                                    text: "Maaf, Data tidak ditemukan",
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                }

                function aksi_radiologi(id_pelayanan, id_tindakan_radiologi) {
                    $.ajax({
                        url: "<?= base_url() . 'Radiologi/getdata_formById' ?>",
                        data: {
                            pelayanan: id_pelayanan,
                            tindakan: id_tindakan_radiologi,
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            if (data.status_dt == "found") {
                                $('#infoTindakan').collapse('toggle');
                                $('#detailTindakan').collapse('hide');
                                $('#listTindakan').collapse('hide');
                                $("#inNama").val(data.nama);
                                $("#inBiaya").val(data.total);
                                $("#inJumlah").val(data.frek);
                                $("#id_tindakan_radiologi").val(data.id_tindakan_radiologi);
                            } else {
                                swal({
                                    title: "Gagal!",
                                    type: "warning",
                                    text: "Maaf, Data tidak ditemukan",
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                }

                function detail_radiologi(id_pelayanan, id_tindakan_radiologi) {
                    $.ajax({
                        url: "<?= base_url() . 'Radiologi/getdata_formById' ?>",
                        data: {
                            pelayanan: id_pelayanan,
                            tindakan: id_tindakan_radiologi,
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            if (data.status_dt == "found") {
                                $('#detailTindakan').collapse('toggle');
                                $('#listTindakan').collapse('hide');
                                $('#infoTindakan').collapse('hide');
                                $("#outNamaDetail").val(data.nama);
                                $("#outFrekDetail").val(data.frek);
                                $("#outHargaDetail").val(data.harga);
                                $("#outDokterDetail").val(data.dokter);
                                $("#outKeteranganDetail").val(data.keterangan);
                            } else {
                                swal({
                                    title: "Gagal!",
                                    type: "warning",
                                    text: "Maaf, Data tidak ditemukan",
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                }

                function pilihTindakanRadiologi() {
                    a = $("#inTindakanRadiologi").val();
                    splitDiag = a.split("|");

                    harga = parseFloat(splitDiag[1]);
                    $("#outBiayaTindakanRadiologi").val(convertToRupiah(harga));
                    document.getElementById("outJumlahRadiologi").value = "1";
                    document.getElementById("outTotalRadiologi").value = convertToRupiah(harga);
                }

                function update_radiologi() {
                    a = $("#inTindakanRadiologi").val();
                    splitDiag = a.split("|");
                    harga = parseFloat(splitDiag[1]);
                    frek = parseFloat($("#outJumlahRadiologi").val());
                    total = harga * frek;
                    id_pel_rad = $('#id_pel_rad').val();
                    id_tin_rad = $('#id_tin_rad').val();
                    nama = $('#nama').val();
                    ket = $('#outKet').val();


                    dataString = 'id_tin_rad=' + id_tin_rad + '&harga=' + harga +
                        '&id_pel_rad=' + id_pel_rad + '&id_list_tindakan=' + splitDiag[0] +
                        '&frek=' + frek + '&total=' + total + '&ket=' + ket;
                    $.ajax({
                        url: "<?= base_url() . 'Radiologi/update_tindakan_radiologi' ?>",
                        method: "POST",
                        dataType: 'json',
                        data: dataString,
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Perubahan Tindakan ini Telah di Simpan!",
                                    confirmButtonColor: "#3cb878",
                                });
                                $("#outTotalRadiologi").val("");
                                $("#outJumlahRadiologi").val("");
                                $("#outBiayaTindakanRadiologi").val("");
                                $('#infoTindakan').collapse('hide');
                                $('#detailTindakan').collapse('hide');
                                $('#listTindakan').collapse('hide');
                                $('#tableradiologi').DataTable().ajax.reload();
                                $('#outTotalHargaRadiologi').DataTable().ajax.reload();
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
                }




                function insert_radiologi2() {
                    id_expertise = $('#id_expertise').val();
                    no_rm = $('#no_rm').val();
                    nama = $('#nama').val();
                    tgl_lahir = $('#tgl_lahir').val();
                    dokter_pengirim = $('#nama_dokter').val();
                    // ruang_poliklinik = $('#ruang_poliklinik').val();
                    nama_poli = $('#nama_poli').val();
                    no_sep = $('#no_sep').val();
                    hasil_pemeriksaan = $('#hasil_pemeriksaan').val();
                    kesimpulan = $('#kesimpulan').val();
                    id_tindakan_radiologi = $('#id_tindakan_radiologi').val();

                    dataString = 'id_expertise=' + id_expertise +
                        '&no_rm=' + no_rm + '&nama=' + nama +
                        '&tgl_lahir=' + tgl_lahir +
                        '&dokter_pengirim=' + dokter_pengirim +
                        // '&ruang_poliklinik=' + ruang_poliklinik +
                        '&nama_poli=' + nama_poli +
                        '&no_sep=' + no_sep +
                        '&hasil_pemeriksaan=' + hasil_pemeriksaan +
                        '&kesimpulan=' + kesimpulan + '&id_tindakan_radiologi=' + id_tindakan_radiologi;

                    $.ajax({
                        url: "<?= base_url() . 'Radiologi/insert_radiologi2' ?>",
                        method: "POST",
                        dataType: 'json',
                        data: dataString,
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Tindakan ini Telah di Simpan!",
                                    confirmButtonColor: "#3cb878",
                                });
                                $('#id_expertise').val('');
                                $('#no_rm').val('');
                                $('#nama').val('');
                                $('#tgl_lahir').val('');
                                $('#dokter_pengirim').val('');
                                // $('#ruang_poliklinik').val('');
                                $('#nama_poli').val('');
                                $('#no_sep').val('');
                                $('#hasil_pemeriksaan').summernote('reset');
                                $('#kesimpulan').summernote('reset');

                                $('#table_expertise').DataTable().ajax.reload();
                                // $('#table_radiologi').DataTable().ajax.reload();
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
                }





                // function print_radiologi(id_pelayanan, id_tindakan_radiologi) {
                // 	a = $("#inNamaPasien").val();
                // 	b = $("#tgl_lahir").val();
                // 	c = $("#no_rm").val();
                // 	d = $("#cara_bayar").val();
                // 	e = $("#ruang").val();
                // 	$.ajax({
                // 		url: "<?= base_url() . 'Radiologi/print_radiologi' ?>",
                // 		data: {
                // 			pelayanan: id_pelayanan,
                // 			tindakan: id_tindakan_radiologi,
                // 		},
                // 		type: 'POST',
                // 		dataType: 'json',
                // 		success: function(html) {
                // 			document.getElementById("namaa").innerHTML = html.nama;
                // 			document.getElementById("keterangann").innerHTML = html.keterangan;
                // 			document.getElementById("tanggall").innerHTML = html.tanggal;
                // 			document.getElementById("namaPemeriksaan").innerHTML = a;
                // 			document.getElementById("tanggalLahir").innerHTML = b;
                // 			document.getElementById("noRm").innerHTML = c;
                // 			document.getElementById("caraBayar").innerHTML = d;
                // 			document.getElementById("ruangg").innerHTML = e;

                // 			var printContents = document.getElementById("outRadiologi").innerHTML;
                // 			var originalContents = document.body.innerHTML;

                // 			document.body.innerHTML = printContents;

                // 			window.print();
                // 			window.location.reload();

                // 			document.body.innerHTML = originalContents;
                // 			$("#inNamaPasien").val(a);

                // 		}
                // 	});
                // }


                function pilihTindakan() {
                    a = $("#inTindakan").val();
                    splitDiag = a.split("|");
                    harga = parseFloat(splitDiag[1]);
                    $("#outBiayaTindakan").val(convertToRupiah(harga));
                    document.getElementById("inJumlah").value = "1";
                    document.getElementById("outTotalHargaRadiologi").value = convertToRupiah(harga);
                }

                function hargaTotal() {
                    splitDiag = a.split("|");
                    harga = parseFloat(splitDiag[1]);
                    frek = parseFloat($("#inJumlah").val());
                    total = harga * frek;

                    $("#outTotalHargaRadiologi").val(convertToRupiah(total));
                }

                function convertToRupiah(angka) {
                    var rupiah = '';
                    var angkarev = angka.toString().split('').reverse().join('');
                    for (var i = 0; i < angkarev.length; i++)
                        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
                }

                function hapus_radiologi(id_tindakan_radiologi, id_pelayanan, nama) {
                    swal({
                        title: "Apakah kamu yakin?",
                        text: "Menghapus data " + nama + "?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3cb878",
                        confirmButtonText: "Yakin",
                        cancelButtonText: "Batal",
                        closeOnConfirm: false
                    }, function() {
                        $().ready(function() {
                            $.ajax({
                                url: "<?php echo base_url() ?>Radiologi/hapus_data_radiologi",
                                method: "POST",
                                dataType: 'json',
                                data: {
                                    id_tindakan_radiologi: id_tindakan_radiologi,
                                },
                                success: function(data) {
                                    if (data.status == "success") {
                                        swal({
                                            title: "good job!",
                                            type: "success",
                                            text: "Data Berhasil dihapus",
                                            confirmButtonColor: "#3cb878",
                                        });
                                        $('#tableradiologi').DataTable().ajax.reload();
                                        $('#outTotalHargaRadiologi').DataTable().ajax.reload();
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
                        });

                    });
                    return false;
                }

                function verifikasi(id_tindakan_radiologi) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>Radiologi/verifikasi',
                        method: "POST",
                        data: {
                            id: id_tindakan_radiologi
                        },
                        cache: false,
                        dataType: 'JSON',
                        success: function(data) {
                            if (data.status == 'success') {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Data berhasil disimpan",
                                    confirmButtonColor: "#3cb878",
                                });

                                $("#modal_edit_data").modal('hide');
                                $('#datable').DataTable().ajax.reload();
                            } else {
                                swal({
                                    title: "Gagal!",
                                    text: "Data tidak terkirim, mohon cek inputan Anda kembali",
                                    type: "warning",
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                }

                function print_radiologi(id_pelayanan, id_tindakan_radiologi) {
                    $('#gambar1').collapse('toggle');
                    $('#id_tindakan_radiologi').val(id_tindakan_radiologi);

                }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
            </script>