<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark"><strong> ASSESMEN BAYI BARU LAHIR</strong></h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in" id="myDiv">
                <div class="panel-body">
                    <div class="form-wrap">

                        <div class="form-group">

                            <div class="form-group">
                                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
                                <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
                                <input type="hidden" class="form-control" value="" id="id" name="id">

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">No. RM :<span class="help"></span></label>
                                        <div class="has-success">
                                            <input type="text" class="form-control" id="noRM" value="<?= $no_rm ?>" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Nama Pasien :<span class="help"></span></label>
                                        <div class="has-success">
                                            <input type="text" class="form-control" id="namaPasien" value="<?= $nama ?>" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
							<div class="col-md-4">
								<label class="control-label mb-10 text-left">Tanggal Lahir<span class="help"></span></label>
								<input type="text" disabled class="form-control" value="<?php
																						setlocale(LC_ALL, 'id_ID');

																						date_default_timezone_set('Asia/Jakarta');
																						$time = strtotime($tgl_lahir);
																						echo $date = strftime(" %d %B %Y ", $time);
																						 ?>">
								<span class="help-block"></span>
							</div>
						</div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Jenis Kelamin :</label>
                                        <div class="has-success">
                                            <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="Jk">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Tanggal Pengkajian : <span class="help"></span></label>
                                        <span id="tgl_pengkajian_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="date" class="form-control" id="tgl_pengkajian" name="tgl_pengkajian">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Tanggal masuk dirawat :<span class="help"></span></label>
                                        <div class="has-success">
                                            <input type="text" id="inTglMasuk" disabled class="form-control" value="<?php
                                                                                                                    setlocale(LC_ALL, 'id_ID');

                                                                                                                    date_default_timezone_set('Asia/Jakarta');
                                                                                                                    $time = strtotime($tgl_masuk);
                                                                                                                    echo $date = strftime(" %d %B %Y ", $time);?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-1 text-left">Cara Masuk :<span class="help"></span></label>
                                        <span id="cara_masuk_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <select class="form-control select2" id="cara_masuk" name="cara_masuk">
                                                <option value="-">-</option>
                                                <option value="URJ">URJ</option>
                                                <option value="Unit Emergency">Unit Emergency</option>
                                                <option value="Dokter Pribadi">Dokter Pribadi</option>
                                                <option value="Langsung Kamar Bersalin">Langsung Kamar Bersalin</option>
                                            </select>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label mb-1 text-left">Dokter yang merawat :</label>
                                    <span id="dpjp_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="dpjp" value="<?= $nama_dokter ?>" disabled>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"><strong> STATUS GRAVIDA IBU </strong><span class="help"></span></label>
                                        <span id="statusgravidaIbu_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">G<span class="help"></span></label>
                                        <span id="g_ibu_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="g_ibu" name="g_ibu"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">P<span class="help"></span></label>
                                        <span id="p_ibu_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="p_ibu" name="p_ibu"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">A<span class="help"></span></label>
                                        <span id="a_ibu_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="a_ibu" name="a_ibu"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Usia Kehamilan :<span class="help"></span></label>
                                        <span id="usia_kehamilan_ibu_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="usia_kehamilan_ibu" name="usia_kehamilan_ibu"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Presentasi Bayi :<span class="help"></span></label>
                                        <span id="pres_bayi_ibu_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="pres_bayi_ibu" name="pres_bayi_ibu"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Komplikasi Antenatal :<span class="help"></span></label>
                                        <span id="komp_antenatal_ibu_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="komp_antenatal_ibu" name="komp_antenatal_ibu"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <div class="col-md-6">
                                        <label class="control-label mb-8 text-left">Pemeriksaan Antenatal :</label>
                                        <span id="pem_antenatal_ibu_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-3">
                                                <input id="pem_antenatal_ibu1" type="radio" name="pem_antenatal_ibu" value="Teratur">
                                                <label class="control-label" for="pem_antenatal_ibu1">
                                                    Teratur
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="pem_antenatal_ibu2" type="radio" name="pem_antenatal_ibu" value=" Tidak Teratur">
                                                <label class="control-label" for="pem_antenatal_ibu2">
                                                    Tidak Teratur
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

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"> <strong> RIWAYAT PERSALINAN </strong><span class="help"></span></label>
                                        <span id="riwayatPersalinan_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Berat Badan Ibu : <span class="help"></span></label>
                                        <span id="berat_ibu_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="berat_ibu" name="berat_ibu"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Tinggi Badan Ibu : <span class="help"></span></label>
                                        <span id="tinggi_ibu_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="tinggi_ibu" name="tinggi_ibu"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Keadaan Umum Ibu : <span class="help"></span></label>
                                        <span id="kead_um_ibu_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="kead_um_ibu" name="kead_um_ibu"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Jenis Persalinan : <span class="help"></span></label>
                                        <span id="jenis_persalinan_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="jenis_persalinan" name="jenis_persalinan"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Indikasi : <span class="help"></span></label>
                                        <span id="indikasi_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="indikasi" name="indikasi"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Komplikasi Persalinan : <span class="help"></span></label>
                                        <span id="komp_persalinan_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="komp_persalinan" name="komp_persalinan"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Lamanya Ketuban Pecah : <span class="help"></span></label>
                                        <span id="lam_ketu_pec_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="lam_ketu_pec" name="lam_ketu_pec"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Persalinan Di :<span class="help"></span></label>
                                        <span id="persalinan_di_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="persalinan_di" name="persalinan_di"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <label class="control-label mb-10 text-left">Tanda - Tanda Vital :<span class="help"></span></label>
                                </div>

                                <div class="col-md-8">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">TD :<span class="help"></span></label>
                                        <span id="td_vital_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="td_vital" name="td_vital"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">N :<span class="help"></span></label>
                                        <span id="n_vital_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="n_vital" name="n_vital"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">RR :<span class="help"></span></label>
                                        <span id="rr_vital_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="rr_vital" name="rr_vital"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">S :<span class="help"></span></label>
                                        <span id="s_vital_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="s_vital" name="s_vital"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label class="control-label mb-10 text-left">Fetus :<span class="help"></span></label>
                                    <span id="fetus_vital_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <textarea class="form-control" cols="1" rows="1" id="fetus_vital" name="fetus_vital"></textarea>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Kondisi Ketuban :<span class="help"></span></label>
                                        <span id="kond_ketu_vital_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="kond_ketu_vital" name="kond_ketu_vital"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label class="control-label mb-8 text-left">Proses Persalinan :</label>
                                    <span id="pros_persalinan_vital_error" class="text-danger"></span>
                                    <div class="radio-button radio-button-primary">
                                        <div class="col-md-6">
                                            <input id="pros_persalinan_vital1" type="radio" name="pros_persalinan_vital" value="KALA I">
                                            <label class="control-label" for="pros_persalinan_vital1">
                                                KALA I
                                            </label>
                                        </div>
                                    </div>
                                    <div class="radio-button radio-button-primary">
                                        <input id="pros_persalinan_vital2" type="radio" name="pros_persalinan_vital" value="KALA II">
                                        <label class="control-label" for="pros_persalinan_vital2">
                                            KALA II
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"><strong> PENYAKIT IBU TERDAHULU </strong><span class="help"></span></label>
                                        <span id="riwayatPenyakitIbu_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-6">
                                        <label class="control-label mb-8 text-left">Kebiasaan Ibu :</label>
                                        <span id="keb_ibu_terdahulu_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-3">
                                                <input id="keb_ibu_terdahulu1" type="radio" name="keb_ibu_terdahulu" value="Merokok">
                                                <label class="control-label" for="keb_ibu_terdahulu1">
                                                    Merokok
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="keb_ibu_terdahulu2" type="radio" name="keb_ibu_terdahulu" value="Obat-Obatan">
                                                <label class="control-label" for="keb_ibu_terdahulu2">
                                                    Obat-Obatan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-3">
                                                <input id="keb_ibu_terdahulu3" type="radio" name="keb_ibu_terdahulu" value="Tidak Ada">
                                                <label class="control-label" for="keb_ibu_terdahulu3">
                                                    Tidak Ada
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

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"><strong> KEADAAN BAYI SAAT BARU LAHIR </strong><span class="help"></span></label>
                                        <span id="keaadanBayiBaruLahir_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Lahir Tanggal : <span class="help"></span></label>
                                        <span id="lahir_bayi_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="date" class="form-control" id="lahir_bayi" name="lahir_bayi">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Jam : <span class="help"></span></label>
                                        <span id="jam_lahir_bayi_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="time" class="form-control" id="jam_lahir_bayi" name="jam_lahir_bayi">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label mb-8 text-left">Jenis Kelamin :</label>
                                        <span id="jenkel_lahir_bayi_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="jenkel_lahir_bayi1" type="radio" name="jenkel_lahir_bayi" value="Laki-Laki">
                                                <label class="control-label" for="jenkel_lahir_bayi1">Laki-Laki</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="jenkel_lahir_bayi2" type="radio" name="jenkel_lahir_bayi" value="Perempuan">
                                                <label class="control-label" for="jenkel_lahir_bayi2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">Kelahiran :</label>
                                        <span id="kelahiran_bayi_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="kelahiran_bayi1" type="radio" name="kelahiran_bayi" value="Tunggal">
                                                <label class="control-label" for="kelahiran_bayi1">Tunggal</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="kelahiran_bayi2" type="radio" name="kelahiran_bayi" value="Gemelli">
                                                <label class="control-label" for="kelahiran_bayi2">Gemelli</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group 20">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left" style="display: none;">Nilai APGAR (Menit) :</label>
                                        <span id="nilai_APGAR_bayi_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="nilai_APGAR_bayi1" style="display: none;" type="radio" name="nilai_APGAR_bayi" value="1">
                                                <label class="control-label" for="nilai_APGAR_bayi1" style="display: none;">0</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="nilai_APGAR_bayi2" style="display: none;" type="radio" name="nilai_APGAR_bayi" value="5">
                                                <label class="control-label" for="nilai_APGAR_bayi2" style="display: none;">1</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="nilai_APGAR_bayi3" style="display: none;" type="radio" name="nilai_APGAR_bayi" value="10">
                                                <label class="control-label" for="nilai_APGAR_bayi3" style="display: none;">2</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="nilai_APGAR_bayi4" style="display: none;" type="radio" name="nilai_APGAR_bayi" value="Lainnya">
                                                <label class="control-label" for="nilai_APGAR_bayi4" style="display: none;">Lainnya</label>
                                                <div class="has-success">
                                                    <input type="text" class="form-control" id="nilai_APGAR_bayi_lainnya" style="display: none;" oninput="updateTotal()">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">Denyut Jantung (Menit) :</label>
                                        <span id="deny_jantung_bayi_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="deny_jantung_bayi1" type="radio" name="deny_jantung_bayi" value="0">
                                                <label class="control-label" for="deny_jantung_bayi1">0</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="deny_jantung_bayi2" type="radio" name="deny_jantung_bayi" value="1">
                                                <label class="control-label" for="deny_jantung_bayi2">1</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="deny_jantung_bayi3" type="radio" name="deny_jantung_bayi" value="2">
                                                <label class="control-label" for="deny_jantung_bayi3">2</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">Usaha Nafas (Menit) :</label>
                                        <span id="usaha_nafas_bayi_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="usaha_nafas_bayi1" type="radio" name="usaha_nafas_bayi" value="0">
                                                <label class="control-label" for="usaha_nafas_bayi1">0</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="usaha_nafas_bayi2" type="radio" name="usaha_nafas_bayi" value="1">
                                                <label class="control-label" for="usaha_nafas_bayi2">1</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="usaha_nafas_bayi3" type="radio" name="usaha_nafas_bayi" value="2">
                                                <label class="control-label" for="usaha_nafas_bayi3">2</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">Tonus Otot (Menit) :</label>
                                        <span id="tonus_otot_bayi_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="tonus_otot_bayi1" type="radio" name="tonus_otot_bayi" value="0">
                                                <label class="control-label" for="tonus_otot_bayi1">0</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="tonus_otot_bayi2" type="radio" name="tonus_otot_bayi" value="1">
                                                <label class="control-label" for="tonus_otot_bayi2">1</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="tonus_otot_bayi3" type="radio" name="tonus_otot_bayi" value="2">
                                                <label class="control-label" for="tonus_otot_bayi3">2</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">Reflek (Menit) :</label>
                                        <span id="reflek_bayi_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="reflek_bayi1" type="radio" name="reflek_bayi" value="0">
                                                <label class="control-label" for="reflek_bayi1">0</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="reflek_bayi2" type="radio" name="reflek_bayi" value="1">
                                                <label class="control-label" for="reflek_bayi2">1</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="reflek_bayi3" type="radio" name="reflek_bayi" value="2">
                                                <label class="control-label" for="reflek_bayi3">2</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">Warna Kulit (Menit) :</label>
                                        <span id="warna_kulit_bayi_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="warna_kulit_bayi1" type="radio" name="warna_kulit_bayi" value="0">
                                                <label class="control-label" for="warna_kulit_bayi1">0</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="warna_kulit_bayi2" type="radio" name="warna_kulit_bayi" value="1">
                                                <label class="control-label" for="warna_kulit_bayi2">1</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input id="warna_kulit_bayi3" type="radio" name="warna_kulit_bayi" value="2">
                                                <label class="control-label" for="warna_kulit_bayi3">2</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label class="control-label mb-10 text-left">Total (Menit) :</label>
                                    <span id="total_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <textarea class="form-control" cols="1" rows="1" id="total" name="total" readonly></textarea>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <div class="col-md-10">
                                    <label class="control-label mb-10 text-left">Nilai APGAR:<span class="help"></span></label>
                                    <label class="control-label mb-10 text-left">7-10 : Tangisan kuat disertai gerakan aktif<span class="help"></span></label>
                                    <label class="control-label mb-10 text-left">4-6  : Pernafasan tidak teratur, megap-megap, atau tidak ada pernafasan<span class="help"></span></label>
                                    <label class="control-label mb-10 text-left">0-3  : Denyut jantung < 100x/menit atau kurang<span class="help"></span></label>
                                    <label class="control-label mb-10 text-left">0    : Tidak ada pernafasan Tidak ada denyut jantung<span class="help"></span></label>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <label class="control-label mb-10 text-left" style="opacity: 0.75;">Nilai APGAR:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-10 ">
                                    <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Asfiksia Rigan / tanpa asfiksia <strong>7-10</strong> : Tangisan kuat disertai gerakan aktif</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Asfiksia Sedang <strong>4-6</strong>  : Pernafasan tidak teratur, megap-megap, atau tidak ada pernafasan</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Asfiksia Berat <strong>0-3</strong>  : Denyut jantung &lt; 100x/menit atau kurang</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <label class="control-label mb-10 text-left" style="opacity: 0.75;">- Fres Stillbirth <strong>0</strong>    : Tidak ada pernafasan Tidak ada denyut jantung</label>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label mb-10 text-left">Caput Succedaneum :</label>
                                    <span id="cap_succedaneum_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <textarea class="form-control" cols="1" rows="1" id="cap_succedaneum" name="cap_succedaneum"></textarea>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label mb-10 text-left">Cepal Haematoma :</label>
                                    <span id="cap_haematoma_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <textarea class="form-control" cols="1" rows="1" id="cap_haematoma" name="cap_haematoma"></textarea>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label mb-10 text-left">Cacat Bawaan :</label>
                                    <span id="cacat_bawaan_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <textarea class="form-control" cols="1" rows="1" id="cacat_bawaan" name="cacat_bawaan"></textarea>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                            </div>


                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"> Resusitasi <span class="help"></span></label>
                                        <span id="resusitasi_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left"> Rangsangan :</label>
                                        <span id="rangsangan_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-4">
                                                <input id="rangsangan1" type="radio" name="rangsangan" value="Ya">
                                                <label class="control-label" for="rangsangan1">
                                                    Ya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="rangsangan2" type="radio" name="rangsangan" value="Tidak">
                                                <label class="control-label" for="rangsangan2">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left"> Penghisapan Lendir :</label>
                                        <span id="peng_lendir_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-4">
                                                <input id="peng_lendir1" type="radio" name="peng_lendir" value="Ya">
                                                <label class="control-label" for="peng_lendir1">
                                                    Ya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="peng_lendir2" type="radio" name="peng_lendir" value="Tidak">
                                                <label class="control-label" for="peng_lendir2">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Ambu Bag :</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="ambu_bag1" type="radio" name="ambu_bag" value="Tidak">
                                                    <label class="control-label" for="ambu_bag1">
                                                        Tidak
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="ambu_bag2" type="radio" name="ambu_bag" value="Ya">
                                                    <label class="control-label" for="ambu_bag2">
                                                        Ya
                                                    </label>
                                                    <div class="has-success">
                                                        <input type="text" class="form-control" id="ambu_bag" style="display: none;">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Massase Jantung :</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="mass_jantung1" type="radio" name="mass_jantung" value="Tidak">
                                                    <label class="control-label" for="mass_jantung1">
                                                        Tidak
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="mass_jantung2" type="radio" name="mass_jantung" value="Ya">
                                                    <label class="control-label" for="mass_jantung2">
                                                        Ya
                                                    </label>
                                                    <div class="has-success">
                                                        <input type="text" class="form-control" id="mass_jantung" style="display: none;">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left"> Intubasi Endotrakheal :</label>
                                        <span id="intu_endo_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-4">
                                                <input id="intu_endo1" type="radio" name="intu_endo" value="Ya">
                                                <label class="control-label" for="intu_endo1">
                                                    Ya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="intu_endo2" type="radio" name="intu_endo" value="Tidak">
                                                <label class="control-label" for="intu_endo2">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">O2 :</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="o21" type="radio" name="o2" value="Tidak">
                                                    <label class="control-label" for="o21">
                                                        Tidak
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="o22" type="radio" name="o2" value="Ya">
                                                    <label class="control-label" for="o22">
                                                        Ya
                                                    </label>
                                                    <div class="has-success">
                                                        <input type="text" class="form-control" id="o2" style="display: none;">
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>
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

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"><strong>PEMERIKSAAN FISIK </strong> <span class="help"></span></label>
                                        <span id="pemeriksaanFisik_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-15 text-left">Umur :<span class="help"></span></label>
                                        <span id="umur_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="umur_pf" name="umur_pf"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-15 text-left">Hari :<span class="help"></span></label>
                                        <span id="hari_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <select class="select2 form-control" id="hari_pf">
                                                <option value="-">-</option>
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jum'at">Jum'at</option>
                                                <option value="Sabtu">Sabtu</option>
                                                <option value="Minggu">Minggu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-15 text-left">Jam : <span class="help"></span></label>
                                        <span id="jam_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="time" class="form-control" id="jam_pf" name="jam_pf">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-15 text-left">Suhu (°c) :<span class="help"></span></label>
                                        <span id="suhu_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="number" class="form-control" id="suhu_pf" name="suhu_pf">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-15 text-left">Berat Badan (Gram) :<span class="help"></span></label>
                                        <span id="berat_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="berat_pf" name="berat_pf"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-15 text-left">Panjang Badan (Cm) :<span class="help"></span></label>
                                        <span id="panjang_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="panjang_pf" name="panjang_pf"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-15 text-left">Lingkar Kepala (Cm) :<span class="help"></span></label>
                                        <span id="lingkar_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="lingkar_pf" name="lingkar_pf"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"> Kepala :</label>
                                        <span id="kepala_pf_error" class="text-danger"></span>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="kepala_pf1" type="radio" name="kepala_pf" value="Bulat">
                                                    <label class="control-label" for="kepala_pf1">Bulat</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="kepala_pf2" type="radio" name="kepala_pf" value="Kaput">
                                                    <label class="control-label" for="kepala_pf2">Kaput</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="kepala_pf3" type="radio" name="kepala_pf" value="Cephalhematum">
                                                    <label class="control-label" for="kepala_pf3">Cephalhematum</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="kepala_pf4" type="radio" name="kepala_pf" value="Normal">
                                                    <label class="control-label" for="kepala_pf4">Normal</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="radio-button radio-button-primary">
                                                    <input id="kepala_pf5" type="radio" name="kepala_pf" value="Kelainan" onclick="document.getElementById('kelainan_input').style.display='block'">
                                                    <label class="control-label" for="kepala_pf5">Kelainan</label>
                                                </div>
                                                <div id="kelainan_input" class="has-success" style="display: none;">
                                                    <input type="text" class="form-control" id="kepala_pf_kelainan">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-8">
                                        <label class="control-label mb-10 text-left"> Ubun-ubun :</label>
                                        <span id="ubun_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="ubun_pf1" type="radio" name="ubun_pf" value="Besar">
                                                <label class="control-label" for="ubun_pf1">
                                                    Besar
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="ubun_pf2" type="radio" name="ubun_pf" value="Kecil">
                                                <label class="control-label" for="ubun_pf2">
                                                    Kecil
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="ubun_pf3" type="radio" name="ubun_pf" value="Normal">
                                                <label class="control-label" for="ubun_pf3">
                                                    Normal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="radio-button radio-button-primary">
                                                <input id="ubun_pf4" type="radio" name="ubun_pf" value="Kelainan">
                                                <label class="control-label" for="ubun_pf4">
                                                    Kelainan
                                                </label>
                                                <div class="has-success">
                                                    <input type="text" class="form-control" id="ubun_pf" style="display: none;">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-8">
                                        <label class="control-label mb-10 text-left"> Sutura :</label>
                                        <span id="sutura_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="sutura_pf1" type="radio" name="sutura_pf" value="Normal">
                                                <label class="control-label" for="sutura_pf1">
                                                    Normal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="radio-button radio-button-primary">
                                                <input id="sutura_pf2" type="radio" name="sutura_pf" value="Kelainan">
                                                <label class="control-label" for="sutura_pf2">
                                                    Kelainan
                                                </label>
                                                <div class="has-success">
                                                    <input type="text" class="form-control" id="sutura_pf" style="display: none;">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-8">
                                        <label class="control-label mb-10 text-left"> Telinga :</label>
                                        <span id="telinga_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="telinga_pf1" type="radio" name="telinga_pf" value="Simetris">
                                                <label class="control-label" for="telinga_pf1">
                                                    Simetris
                                                </label>
                                            </div>
                                        </div>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="telinga_pf2" type="radio" name="telinga_pf" value="Normal">
                                                <label class="control-label" for="telinga_pf2">
                                                    Normal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="radio-button radio-button-primary">
                                                <input id="telinga_pf3" type="radio" name="telinga_pf" value="Keluaran">
                                                <label class="control-label" for="telinga_pf3">
                                                    Keluaran
                                                </label>
                                                <div class="has-success">
                                                    <input type="text" class="form-control" id="telinga_pf" style="display: none;">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-8">
                                        <label class="control-label mb-10 text-left"> Hidung :</label>
                                        <span id="hidung_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="hidung_pf1" type="radio" name="hidung_pf" value="Lubang Hidung">
                                                <label class="control-label" for="hidung_pf1">
                                                    Lubang Hidung
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="hidung_pf2" type="radio" name="hidung_pf" value="Pernapasan Cuping Hidung">
                                                <label class="control-label" for="hidung_pf2">
                                                    Pernapasan Cuping Hidung
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="hidung_pf3" type="radio" name="hidung_pf" value="Normal">
                                                <label class="control-label" for="hidung_pf3">
                                                    Normal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="hidung_pf4" type="radio" name="hidung_pf" value="Kelainan">
                                                <label class="control-label" for="hidung_pf4">
                                                    Kelainan
                                                </label>
                                                <div class="has-success">
                                                    <input type="text" class="form-control" id="hidung_pf" style="display: none;">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Leher :<span class="help"></span></label>
                                        <span id="leher_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="leher_pf" name="leher_pf"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-8">
                                        <label class="control-label mb-10 text-left"> Mata :</label>
                                        <span id="mata_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="mata_pf1" type="radio" name="mata_pf" value="Simetris">
                                                <label class="control-label" for="mata_pf1">
                                                    Simetris
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mata_pf2" type="radio" name="mata_pf" value="Kotoran">
                                                <label class="control-label" for="mata_pf2">
                                                    Kotoran
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mata_pf3" type="radio" name="mata_pf" value="Pendarahan">
                                                <label class="control-label" for="mata_pf3">
                                                    Pendarahan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mata_pf4" type="radio" name="mata_pf" value="Normal">
                                                <label class="control-label" for="mata_pf4">
                                                    Normal
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-8">
                                        <label class="control-label mb-10 text-left"> Dada :</label>
                                        <span id="dada_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="dada_pf1" type="radio" name="dada_pf" value="Simetris">
                                                <label class="control-label" for="dada_pf1">
                                                    Simetris
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="dada_pf2" type="radio" name="dada_pf" value="Asi Metris">
                                                <label class="control-label" for="dada_pf2">
                                                    Asi Metris
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="dada_pf3" type="radio" name="dada_pf" value="Retraksi">
                                                <label class="control-label" for="dada_pf3">
                                                    Retraksi
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="dada_pf4" type="radio" name="dada_pf" value="Normal">
                                                <label class="control-label" for="dada_pf4">
                                                    Normal
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-8">
                                        <label class="control-label mb-10 text-left"> Tubuh :</label>
                                        <span id="tubuh_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="tubuh_pf1" type="radio" name="tubuh_pf" value="Warna Pink">
                                                <label class="control-label" for="tubuh_pf1">
                                                    Warna Pink
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tubuh_pf2" type="radio" name="tubuh_pf" value="Pucat">
                                                <label class="control-label" for="tubuh_pf2">
                                                    Pucat
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tubuh_pf3" type="radio" name="tubuh_pf" value="Sianosis">
                                                <label class="control-label" for="tubuh_pf3">
                                                    Sianosis
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tubuh_pf4" type="radio" name="tubuh_pf" value="Kuning">
                                                <label class="control-label" for="tubuh_pf4">
                                                    Kuning
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tubuh_pf5" type="radio" name="tubuh_pf" value="Normal">
                                                <label class="control-label" for="tubuh_pf5">
                                                    Normal
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-8">
                                        <label class="control-label mb-10 text-left"> Mulut :</label>
                                        <span id="mulut_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="mulut_pf1" type="radio" name="mulut_pf" value="Simetris">
                                                <label class="control-label" for="mulut_pf1">
                                                    Simetris
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mulut_pf2" type="radio" name="mulut_pf" value="Labioskisis">
                                                <label class="control-label" for="mulut_pf2">
                                                    Labioskisis
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mulut_pf3" type="radio" name="mulut_pf" value="Palatoskisis">
                                                <label class="control-label" for="mulut_pf3">
                                                    Palatoskisis
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mulut_pf4" type="radio" name="mulut_pf" value="Labipalatoskisis">
                                                <label class="control-label" for="mulut_pf4">
                                                    Labipalatoskisis
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="mulut_pf5" type="radio" name="mulut_pf" value="Normal">
                                                <label class="control-label" for="mulut_pf5">
                                                    Normal
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left"> Pergerakan :</label>
                                        <span id="pengerakan_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="pengerakan_pf1" type="radio" name="pengerakan_pf" value="Aktif">
                                                <label class="control-label" for="pengerakan_pf1">
                                                    Aktif
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="pengerakan_pf2" type="radio" name="pengerakan_pf" value="Kurang Aktif">
                                                <label class="control-label" for="pengerakan_pf2">
                                                    Kurang Aktif
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

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"> Jantung Dan Paru<span class="help"></span></label>
                                        <span id="jantungParu_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-8">
                                        <label class="control-label mb-10 text-left"> Bunyi Nafas :</label>
                                        <span id="bunyi_nafas_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="bunyi_nafas_pf1" type="radio" name="bunyi_nafas_pf" value="Ngorok">
                                                <label class="control-label" for="bunyi_nafas_pf1">
                                                    Ngorok
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="bunyi_nafas_pf2" type="radio" name="bunyi_nafas_pf" value="Tidak Ngorok">
                                                <label class="control-label" for="bunyi_nafas_pf2">
                                                    Tidak Ngorok
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="radio-button radio-button-primary">
                                                <input id="bunyi_nafas_pf3" type="radio" name="bunyi_nafas_pf" value="Lainnya">
                                                <label class="control-label" for="bunyi_nafas_pf3">
                                                    Lainnya
                                                </label>
                                                <div class="has-success">
                                                    <input type="text" class="form-control" id="bunyi_nafas_pf" style="display: none;">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Pernapasan (x/menit):<span class="help"></span></label>
                                        <span id="pernapasan_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="pernapasan_pf" name="pernapasan_pf"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Denyut Jantung (x/menit):<span class="help"></span></label>
                                        <span id="denyut_jantung_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="denyut_jantung_pf" name="denyut_jantung_pf"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left">Perut :</label>
                                        <span id="perut_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="perut_pf1" type="radio" name="perut_pf" value="Lembek">
                                                <label class="control-label" for="perut_pf1">
                                                    Lembek
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="perut_pf2" type="radio" name="perut_pf" value="Kembung">
                                                <label class="control-label" for="perut_pf2">
                                                    Kembung
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="perut_pf3" type="radio" name="perut_pf" value="Benjolan">
                                                <label class="control-label" for="perut_pf3">
                                                    Benjolan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Bising Usus :<span class="help"></span></label>
                                        <span id="bising_usus_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <select class="form-control select2" id="bising_usus_pf" name="bising_usus_pf">
                                                <option value="-">-</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Meningkat">Meningkat</option>
                                                <option value="Menurun">Menurun</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Mekonium :<span class="help"></span></label>
                                        <span id="mekonium_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="mekonium_pf" name="mekonium_pf"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Punggung :<span class="help"></span></label>
                                        <span id="punggung_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <select class="form-control select2" id="punggung_pf" name="punggung_pf">
                                                <option value="-">-</option>
                                                <option value="Normal">Normal</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label mb-10 text-left">Keadaan Punggung :<span class="help"></span></label>
                                        <span id="kead_punggung_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <select class="form-control select2" id="kead_punggung_pf" name="kead_punggung_pf">
                                                <option value="-">-</option>
                                                <option value="Asimetris">Asimetris</option>
                                                <option value="Simetris">Simetris</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"> Genetalia <span class="help"></span></label>
                                        <span id="genetalia_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-8">
                                        <label class="control-label mb-10 text-left"> Laki-laki :</label>
                                        <span id="laki_gene_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-3">
                                                <input id="laki_gene_pf1" type="radio" name="laki_gene_pf" value="Hypospadius">
                                                <label class="control-label" for="laki_gene_pf1">
                                                    Hypospadius
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="laki_gene_pf2" type="radio" name="laki_gene_pf" value="Epispadius">
                                                <label class="control-label" for="laki_gene_pf2">
                                                    Epispadius
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio-button radio-button-primary">
                                                <input id="laki_gene_pf3" type="radio" name="laki_gene_pf" value="Normal">
                                                <label class="control-label" for="laki_gene_pf3">
                                                    Normal
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-8">
                                        <label class="control-label mb-10 text-left"> Testis Descensus Testikulorum :</label>
                                        <span id="testis_gene_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="testis_gene_pf1" type="radio" name="testis_gene_pf" value="  Positif (+)">
                                                <label class="control-label" for="testis_gene_pf1">
                                                    Positif (+)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="testis_gene_pf2" type="radio" name="testis_gene_pf" value="Negatif (-)">
                                                <label class="control-label" for="testis_gene_pf2">
                                                    Negatif (-)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-8">
                                        <label class="control-label mb-10 text-left">Perempuan :</label>
                                        <span id="labia_minor_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-4">
                                                <input id="perem_gene_pf1" type="radio" name="perem_gene_pf" value="Labia minor : menonjol">
                                                <label class="control-label" for="perem_gene_pf1">
                                                    Labia minor : menonjol
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <span id="labia_mayor_pf_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="perem_gene_pf2" type="radio" name="perem_gene_pf" value="Labia Mayor : Tertutup">
                                                <label class="control-label" for="perem_gene_pf2">
                                                    Labia Mayor : Tertutup
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <span id="labia_mayor_pf_error" class="text-danger"></span>
                                            <div class="radio-button radio-button-primary">
                                                <input id="perem_gene_pf3" type="radio" name="perem_gene_pf" value="Normal">
                                                <label class="control-label" for="perem_gene_pf3">
                                                    Normal
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-8">
                                        <label class="control-label mb-10 text-left"> Anus : </label>
                                        <span id="anus_gene_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="anus_gene_pf1" type="radio" name="anus_gene_pf" value="Ada">
                                                <label class="control-label" for="anus_gene_pf1">
                                                    Ada
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="anus_gene_pf2" type="radio" name="anus_gene_pf" value="Tidak Ada">
                                                <label class="control-label" for="anus_gene_pf2">
                                                    Tidak Ada
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

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"> Ekstremitas <span class="help"></span></label>
                                        <span id="ekstremitas_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"> Jari Tangan<span class="help"></span></label>
                                        <span id="jari_tangan_eks_pf_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-6 text-left">Kelainan : <span class="help"></span></label>
                                        <span id="jari_tangan_eks_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="jari_tangan_eks_pf" name="jari_tangan_eks_pf"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"> Jari Kaki<span class="help"></span></label>
                                        <span id="jari_kaki_eks_pf_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-6 text-left">Kelainan : <span class="help"></span></label>
                                        <span id="jari_kaki_eks_pf_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="jari_kaki_eks_pf" name="jari_kaki_eks_pf"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"> Pergerakan : </label>
                                        <span id="pergerakan_eks_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="pergerakan_eks_pf1" type="radio" name="pergerakan_eks_pf" value="Tidak Aktif">
                                                <label class="control-label" for="pergerakan_eks_pf1">
                                                    Tidak Aktif
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="pergerakan_eks_pf2" type="radio" name="pergerakan_eks_pf" value="Simetris">
                                                <label class="control-label" for="pergerakan_eks_pf2">
                                                    Simetris
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="pergerakan_eks_pf3" type="radio" name="pergerakan_eks_pf" value="Tremor">
                                                <label class="control-label" for="pergerakan_eks_pf3">
                                                    Tremor
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

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"> Status Neurologi <span class="help"></span></label>
                                        <span id="statusNeurologi_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"> Reflek : <span class="help"></span></label>
                                        <span id="reflek_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left"> Tendon :</label>
                                        <span id="tendon_sn_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-4">
                                                <input id="tendon_sn_pf1" type="radio" name="tendon_sn_pf" value="Positif (+)">
                                                <label class="control-label" for="tendon_sn_pf1">
                                                    Positif (+)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tendon_sn_pf2" type="radio" name="tendon_sn_pf" value="Negatif (-)">
                                                <label class="control-label" for="tendon_sn_pf2">
                                                    Negatif (-)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left"> Moro :</label>
                                        <span id="moro_sn_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-4">
                                                <input id="moro_sn_pf1" type="radio" name="moro_sn_pf" value="Positif (+)">
                                                <label class="control-label" for="moro_sn_pf1">
                                                    Positif (+)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="moro_sn_pf2" type="radio" name="moro_sn_pf" value="Negatif (-)">
                                                <label class="control-label" for="moro_sn_pf2">
                                                    Negatif (-)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left"> Rooting :</label>
                                        <span id="rooting_sn_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-4">
                                                <input id="rooting_sn_pf1" type="radio" name="rooting_sn_pf" value="Positif (+)">
                                                <label class="control-label" for="rooting_sn_pf1">
                                                    Positif (+)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="rooting_sn_pf2" type="radio" name="rooting_sn_pf" value="Negatif (-)">
                                                <label class="control-label" for="rooting_sn_pf2">
                                                    Negatif (-)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left"> Menghisap :</label>
                                        <span id="menghisap_sn_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-4">
                                                <input id="menghisap_sn_pf1" type="radio" name="menghisap_sn_pf" value="Positif (+)">
                                                <label class="control-label" for="menghisap_sn_pf1">
                                                    Positif (+)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="menghisap_sn_pf2" type="radio" name="menghisap_sn_pf" value="Negatif (-)">
                                                <label class="control-label" for="menghisap_sn_pf2">
                                                    Negatif (-)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left"> Babinski :</label>
                                        <span id="babinski_sn_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-4">
                                                <input id="babinski_sn_pf1" type="radio" name="babinski_sn_pf" value="Positif (+)">
                                                <label class="control-label" for="babinski_sn_pf1">
                                                    Positif (+)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="babinski_sn_pf2" type="radio" name="babinski_sn_pf" value="Negatif (-)">
                                                <label class="control-label" for="babinski_sn_pf2">
                                                    Negatif (-)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left"> Menggenggam :</label>
                                        <span id="menggenggam_sn_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-4">
                                                <input id="menggenggam_sn_pf1" type="radio" name="menggenggam_sn_pf" value="Positif (+)">
                                                <label class="control-label" for="menggenggam_sn_pf1">
                                                    Positif (+)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="menggenggam_sn_pf2" type="radio" name="menggenggam_sn_pf" value="Negatif (-)">
                                                <label class="control-label" for="menggenggam_sn_pf2">
                                                    Negatif (-)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left"> Menangis :</label>
                                        <span id="menangis_sn_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-4">
                                                <input id="menangis_sn_pf1" type="radio" name="menangis_sn_pf" value="Positif (+)">
                                                <label class="control-label" for="menangis_sn_pf1">
                                                    Positif (+)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="menangis_sn_pf2" type="radio" name="menangis_sn_pf" value="Negatif (-)">
                                                <label class="control-label" for="menangis_sn_pf2">
                                                    Negatif (-)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left"> Berjalan :</label>
                                        <span id="berjalan_sn_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-4">
                                                <input id="berjalan_sn_pf1" type="radio" name="berjalan_sn_pf" value="Positif (+)">
                                                <label class="control-label" for="berjalan_sn_pf1">
                                                    Positif (+)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="berjalan_sn_pf2" type="radio" name="berjalan_sn_pf" value="Negatif (-)">
                                                <label class="control-label" for="berjalan_sn_pf2">
                                                    Negatif (-)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left"> Tonic / Neck :</label>
                                        <span id="tonic_sn_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-4">
                                                <input id="tonic_sn_pf1" type="radio" name="tonic_sn_pf" value="Positif (+)">
                                                <label class="control-label" for="tonic_sn_pf1">
                                                    Positif (+)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="tonic_sn_pf2" type="radio" name="tonic_sn_pf" value="Negatif (-)">
                                                <label class="control-label" for="tonic_sn_pf2">
                                                    Negatif (-)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left"> Nutrisi :</label>
                                        <span id="nutrisi_sn_pf_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-2">
                                                <input id="nutrisi_sn_pf1" type="radio" name="nutrisi_sn_pf" value="ASI">
                                                <label class="control-label" for="nutrisi_sn_pf1">
                                                    ASI
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="radio-button radio-button-primary">
                                                <input id="nutrisi_sn_pf2" type="radio" name="nutrisi_sn_pf" value="PASI">
                                                <label class="control-label" for="nutrisi_sn_pf2">
                                                    PASI
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="radio-button radio-button-primary">
                                                <input id="nutrisi_sn_pf3" type="radio" name="nutrisi_sn_pf" value="Lainnya">
                                                <label class="control-label" for="nutrisi_sn_pf3">
                                                    Lainnya
                                                </label>
                                                <div class="has-success">
                                                    <input type="text" class="form-control" id="nutrisi_sn_pf" style="display: none;">
                                                    <span class="help-block"></span>
                                                </div>
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

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left">Eliminasi<span class="help"></span></label>
                                        <span id="eliminasi_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"> BAB Pertama : <span class="help"></span></label>
                                        <span id="babPertama_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Tanggal : <span class="help"></span></label>
                                        <span id="tgl_bab_eliminasi_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="date" class="form-control" id="tgl_bab_eliminasi" name="tgl_bab_eliminasi">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Jam : <span class="help"></span></label>
                                        <span id="jam_bab_eliminasi_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="time" class="form-control" id="jam_bab_eliminasi" name="jam_bab_eliminasi">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"> BAB Kedua : <span class="help"></span></label>
                                        <span id="babKedua_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Tanggal : <span class="help"></span></label>
                                        <span id="tgl_bab2_eliminasi_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="date" class="form-control" id="tgl_bab2_eliminasi" name="tgl_bab2_eliminasi">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Jam : <span class="help"></span></label>
                                        <span id="jam_bab2_eliminasi_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <input type="time" class="form-control" id="jam_bab2_eliminasi" name="jam_ba2b_eliminasi">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left"> Meconium :</label>
                                        <span id="meconium_eliminasi_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-4">
                                                <input id="meconium_eliminasi1" type="radio" name="meconium_eliminasi" value="Positif (+)">
                                                <label class="control-label" for="meconium_eliminasi1">
                                                    Positif (+)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-button radio-button-primary">
                                                <input id="meconium_eliminasi2" type="radio" name="meconium_eliminasi" value=" Negatif (-)">
                                                <label class="control-label" for="meconium_eliminasi2">
                                                    Negatif (-)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Lingkar Kepala (cm) <span class="help"></span></label>
                                        <span id="lingkar_eliminasi_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="lingkar_eliminasi" name="lingkar_eliminasi"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Dada (cm) <span class="help"></span></label>
                                        <span id="dada_eliminasi_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="dada_eliminasi" name="dada_eliminasi"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Perut (cm) <span class="help"></span></label>
                                        <span id="perut_eliminasi_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="perut_eliminasi" name="perut_eliminasi"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"><strong> RIWAYAT IMUNISASI </strong><span class="help"></span></label>
                                        <span id="riwayatImunisasi_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"> Jenis Imunisasi <span class="help"></span></label>
                                        <span id="jenisImunisasi_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Dasar : <span class="help"></span></label>
                                        <span id="dasar_imunisasi_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="dasar_imunisasi" name="dasar_imunisasi"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Hepatitis : <span class="help"></span></label>
                                        <span id="hepatitis_imunisasi_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="hepatitis_imunisasi" name="hepatitis_imunisasi"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">DPT : <span class="help"></span></label>
                                        <span id="dpt_imunisasi_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="dpt_imunisasi" name="dpt_imunisasi"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Polio : <span class="help"></span></label>
                                        <span id="polio_imunisasi_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="polio_imunisasi" name="polio_imunisasi"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="control-label mb-10 text-left">Campak : <span class="help"></span></label>
                                        <span id="campak_imunisasi_error" class="text-danger"></span>
                                        <div class="has-success">
                                            <textarea class="form-control" cols="1" rows="1" id="campak_imunisasi" name="campak_imunisasi"></textarea>
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label mb-10 text-left"><strong> ASESMEN NYERI </strong><span class="help"></span></label>
                                        <span id="riwayatImunisasi_error" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Wajah :</label>
                                        <span id="wajah_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-12">
                                                <input id="wajah1" type="radio" name="wajah" value="Tidak ada ekspresi yang khusus (seperti senyum)" onchange="sumScore()">
                                                <label class="control-label" for="wajah1">
                                                    Tidak ada ekspresi yang khusus (seperti senyum)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="radio-button radio-button-primary">
                                                <input id="wajah2" type="radio" name="wajah" value="Kadang meringis atau mengerutkan dahi, menarik diri" onchange="sumScore()">
                                                <label class="control-label" for="wajah2">
                                                    Kadang meringis atau mengerutkan dahi, menarik diri
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="radio-button radio-button-primary">
                                                <input id="wajah3" type="radio" name="wajah" value="Sering/terus menerus mengerutkan dahi, rahang mengatup, dagu bergetar" onchange="sumScore()">
                                                <label class="control-label" for="wajah3">
                                                    Sering/terus menerus mengerutkan dahi, rahang mengatup, dagu bergetar
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">Ekstremitas :</label>
                                        <span id="ekstremitas_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-12">
                                                <input id="ekstremitas1" type="radio" name="ekstremitas" value="Posisi normal / rileks" onchange="sumScore()">
                                                <label class="control-label" for="ekstremitas1">
                                                    Posisi normal / rileks
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="radio-button radio-button-primary">
                                                <input id="ekstremitas2" type="radio" name="ekstremitas" value="Tidak tenang, gelisah, tegang" onchange="sumScore()">
                                                <label class="control-label" for="ekstremitas2">
                                                    Tidak tenang, gelisah, tegang
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="radio-button radio-button-primary">
                                                <input id="ekstremitas3" type="radio" name="ekstremitas" value="Menendang atau menarik kaki" onchange="sumScore()">
                                                <label class="control-label" for="ekstremitas3">
                                                    Menendang atau menarik kaki
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">Gerakan :</label>
                                        <span id="gerakan_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-12">
                                                <input id="gerakan1" type="radio" name="gerakan" value="Berbaring tenang, posisi normal, bergerak mudah" onchange="sumScore()">
                                                <label class="control-label" for="gerakan1">
                                                    Berbaring tenang, posisi normal, bergerak mudah
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="radio-button radio-button-primary">
                                                <input id="gerakan2" type="radio" name="gerakan" value="Menggeliat-geliat, bolak-balik berpindah, tegang" onchange="sumScore()">
                                                <label class="control-label" for="gerakan2">
                                                    Menggeliat-geliat, bolak-balik berpindah, tegang
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="radio-button radio-button-primary">
                                                <input id="gerakan3" type="radio" name="gerakan" value="Posisi tubuh meringkuk, kaku / spasme atau menyentak" onchange="sumScore()">
                                                <label class="control-label" for="gerakan3">
                                                    Posisi tubuh meringkuk, kaku / spasme atau menyentak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">Menangis :</label>
                                        <span id="menangis_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-12">
                                                <input id="menangis1" type="radio" name="menangis" value="Tidak menangis" onchange="sumScore()">
                                                <label class="control-label" for="menangis1">
                                                    Tidak menangis
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="radio-button radio-button-primary">
                                                <input id="menangis2" type="radio" name="menangis" value="Merintih, merengek, kadang mengeluh" onchange="sumScore()">
                                                <label class="control-label" for="menangis2">
                                                    Merintih, merengek, kadang mengeluh
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="radio-button radio-button-primary">
                                                <input id="menangis3" type="radio" name="menangis" value="Menangis tersedu-sedu, terisak-isak, menjerit" onchange="sumScore()">
                                                <label class="control-label" for="menangis3">
                                                    Menangis tersedu-sedu, terisak-isak, menjerit
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">Kemampuan Ditenangkan :</label>
                                        <span id="kemampuan_ditenangkan_error" class="text-danger"></span>
                                        <div class="radio-button radio-button-primary">
                                            <div class="col-md-12">
                                                <input id="kemampuan_ditenangkan1" type="radio" name="kemampuan_ditenangkan" value="Senang, rileks" onchange="sumScore()">
                                                <label class="control-label" for="kemampuan_ditenangkan1">
                                                    Senang, rileks
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="radio-button radio-button-primary">
                                                <input id="kemampuan_ditenangkan2" type="radio" name="kemampuan_ditenangkan" value="Dapat ditenangkan dengan sentuhan, pelukan, atau berbicara, dapat dialihkan" onchange="sumScore()">
                                                <label class="control-label" for="kemampuan_ditenangkan2">
                                                    Dapat ditenangkan dengan sentuhan, pelukan, atau berbicara, dapat dialihkan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="radio-button radio-button-primary">
                                                <input id="kemampuan_ditenangkan3" type="radio" name="kemampuan_ditenangkan" value="Sulit/ tidak dapat ditenangkan dengan pelukan, sentuhan atau distraksi" onchange="sumScore()">
                                                <label class="control-label" for="kemampuan_ditenangkan3">
                                                    Sulit/ tidak dapat ditenangkan dengan pelukan, sentuhan atau distraksi
                                                </label>
                                            </div>
                                        </div>

                                        <input type="hidden" class="form-control" value="" name="skor_akhir" id="skor_akhir">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>


                                <div class="form-group text-center" style="margin-top: 30px;">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                    </div>
                                    <div class="col-md-20">
                                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                        <button type="button" value="Simpan" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function() {
            id_pelayanan = $('#inPel').val();
            id_history = $('#inHis').val();
            reload_data_diagnosa(id_pelayanan, id_history);
            reload_data_diagnosa_id_pel(id_pelayanan);
            reload_data_diagnosa1_id_pel1(id_pelayanan);

            $("#nilai_APGAR_bayi4").click(function() {
                if ($(this).is(":checked")) {
                   $("#nilai_APGAR_bayi").show();
                }
            });
            $("#nilai_APGAR_bayi3").click(function() {
               if ($(this).is(":checked")) {
                   $("#nilai_APGAR_bayi").hide();
               }
           });
           $("#nilai_APGAR_bayi2").click(function() {
               if ($(this).is(":checked")) {
                   $("#nilai_APGAR_bayi").hide();
               }
           });
           $("#nilai_APGAR_bayi1").click(function() {
               if ($(this).is(":checked")) {
                   $("#nilai_APGAR_bayi").hide();
               }
            });


            $("#ambu_bag2").click(function() {
                if ($(this).is(":checked")) {
                    $("#ambu_bag").show();
                }
            });
            $("#ambu_bag1").click(function() {
                if ($(this).is(":checked")) {
                    $("#ambu_bag").hide();
                }
            });


            $("#mass_jantung2").click(function() {
                if ($(this).is(":checked")) {
                    $("#mass_jantung").show();
                }
            });
            $("#mass_jantung1").click(function() {
                if ($(this).is(":checked")) {
                    $("#mass_jantung").hide();
                }
            });

            $("#o22").click(function() {
                if ($(this).is(":checked")) {
                    $("#o2").show();
                }
            });
            $("#o21").click(function() {
                if ($(this).is(":checked")) {
                    $("#o2").hide();
                }
            });

            $("#kepala_pf5").click(function() {
                if ($(this).is(":checked")) {
                    $("#kepala_pf").show();
                }
            });
            $("#kepala_pf4").click(function() {
                if ($(this).is(":checked")) {
                    $("#kepala_pf").hide();
                }
            });
            $("#kepala_pf3").click(function() {
                if ($(this).is(":checked")) {
                    $("#kepala_pf").hide();
                }
            });
            $("#kepala_pf2").click(function() {
                if ($(this).is(":checked")) {
                    $("#kepala_pf").hide();
                }
            });
            $("#kepala_pf1").click(function() {
                if ($(this).is(":checked")) {
                    $("#kepala_pf").hide();
                }
            });


            $("#ubun_pf4").click(function() {
                if ($(this).is(":checked")) {
                    $("#ubun_pf").show();
                }
            });
            $("#ubun_pf3").click(function() {
                if ($(this).is(":checked")) {
                    $("#ubun_pf").hide();
                }
            });
            $("#ubun_pf2").click(function() {
                if ($(this).is(":checked")) {
                    $("#ubun_pf").hide();
                }
            });
            $("#ubun_pf1").click(function() {
                if ($(this).is(":checked")) {
                    $("#ubun_pf").hide();
                }
            });


            $("#sutura_pf2").click(function() {
                if ($(this).is(":checked")) {
                    $("#sutura_pf").show();
                }
            });
            $("#sutura_pf1").click(function() {
                if ($(this).is(":checked")) {
                    $("#sutura_pf").hide();
                }
            });


            $("#telinga_pf3").click(function() {
                if ($(this).is(":checked")) {
                    $("#telinga_pf").show();
                }
            });
            $("#telinga_pf2").click(function() {
                if ($(this).is(":checked")) {
                    $("#telinga_pf").hide();
                }
            });
            $("#telinga_pf1").click(function() {
                if ($(this).is(":checked")) {
                    $("#telinga_pf").hide();
                }
            });


            $("#hidung_pf4").click(function() {
                if ($(this).is(":checked")) {
                    $("#hidung_pf").show();
                }
            });
            $("#hidung_pf3").click(function() {
                if ($(this).is(":checked")) {
                    $("#hidung_pf").hide();
                }
            });
            $("#hidung_pf2").click(function() {
                if ($(this).is(":checked")) {
                    $("#hidung_pf").hide();
                }
            });
            $("#hidung_pf1").click(function() {
                if ($(this).is(":checked")) {
                    $("#hidung_pf").hide();
                }
            });


            $("#bunyi_nafas_pf3").click(function() {
                if ($(this).is(":checked")) {
                    $("#bunyi_nafas_pf").show();
                }
            });
            $("#bunyi_nafas_pf2").click(function() {
                if ($(this).is(":checked")) {
                    $("#bunyi_nafas_pf").hide();
                }
            });
            $("#bunyi_nafas_pf1").click(function() {
                if ($(this).is(":checked")) {
                    $("#bunyi_nafas_pf").hide();
                }
            });


            $("#nutrisi_sn_pf3").click(function() {
                if ($(this).is(":checked")) {
                    $("#nutrisi_sn_pf").show();
                }
            });
            $("#nutrisi_sn_pf2").click(function() {
                if ($(this).is(":checked")) {
                    $("#nutrisi_sn_pf").hide();
                }
            });
            $("#nutrisi_sn_pf1").click(function() {
                if ($(this).is(":checked")) {
                    $("#nutrisi_sn_pf").hide();
                }
            });
            $("#wajah1").click(function() {
                if ($(this).is(":checked")) {
                    $("#wajah").hide();
                }
            });
            $("#wajah2").click(function() {
                if ($(this).is(":checked")) {
                    $("#wajah").hide();
                }
            });
            $("#wajah3").click(function() {
                if ($(this).is(":checked")) {
                    $("#wajah").hide();
                }
            });
            $("#ekstremitas1").click(function() {
                if ($(this).is(":checked")) {
                    $("#ekstremitas").hide();
                }
            });
            $("#ekstremitas2").click(function() {
                if ($(this).is(":checked")) {
                    $("#ekstremitas").hide();
                }
            });
            $("#ekstremitas3").click(function() {
                if ($(this).is(":checked")) {
                    $("#ekstremitas").hide();
                }
            });
            $("#gerakan1").click(function() {
                if ($(this).is(":checked")) {
                    $("#gerakan").hide();
                }
            });
            $("#gerakan2").click(function() {
                if ($(this).is(":checked")) {
                    $("#gerakan").hide();
                }
            });
            $("#gerakan3").click(function() {
                if ($(this).is(":checked")) {
                    $("#gerakan").hide();
                }
            });
            $("#menangis1").click(function() {
                if ($(this).is(":checked")) {
                    $("#menangis").hide();
                }
            });
            $("#menangis2").click(function() {
                if ($(this).is(":checked")) {
                    $("#menangis").hide();
                }
            });
            $("#menangis3").click(function() {
                if ($(this).is(":checked")) {
                    $("#menangis").hide();
                }
            });
            $("#kemampuan_ditenangkan1").click(function() {
                if ($(this).is(":checked")) {
                    $("#kemampuan_ditenangkan").hide();
                }
            });
            $("#kemampuan_ditenangkan2").click(function() {
                if ($(this).is(":checked")) {
                    $("#kemampuan_ditenangkan").hide();
                }
            });
            $("#kemampuan_ditenangkan3").click(function() {
                if ($(this).is(":checked")) {
                    $("#kemampuan_ditenangkan").hide();
                }
            });
        });

        function sumScore() {
            if ($('#wajah1').is(":checked")) {
                score = 0;
            } else if ($('#wajah2').is(":checked")) {
                score = 1;
            } else if ($('#wajah3').is(":checked")) {
                score = 2;
            }

            if ($('#ekstremitas1').is(":checked")) {
                score1 = 0;
            } else if ($('#ekstremitas2').is(":checked")) {
                score1 = 1;
            } else if ($('#ekstremitas3').is(":checked")) {
                score1 = 2;
            }

            if ($('#gerakan1').is(":checked")) {
                score2 = 0;
            } else if ($('#gerakan2').is(":checked")) {
                score2 = 1;
            } else if ($('#gerakan3').is(":checked")) {
                score2 = 2;
            }

            if ($('#menangis1').is(":checked")) {
                score3 = 0;
            } else if ($('#menangis2').is(":checked")) {
                score3 = 1;
            } else if ($('#menangis3').is(":checked")) {
                score3 = 2;
            }

            if ($('#kemampuan_ditenangkan1').is(":checked")) {
                score4 = 0;
            } else if ($('#kemampuan_ditenangkan2').is(":checked")) {
                score4 = 1;
            } else if ($('#kemampuan_ditenangkan3').is(":checked")) {
                score4 = 2;
            }

            sum = Number(score) + Number(score1) + Number(score2) + Number(score3) + Number(score4);
            console.log(sum);
            skor_akhir = $('#skor_akhir').val(sum);
        }

        function sumKb() {
            // if ($('#nilai_APGAR_bayi1').is(":checked")) {
            //     score = 0;
            // } else if ($('#nilai_APGAR_bayi2').is(":checked")) {
            //     score = 1;
            // } else if ($('#nilai_APGAR_bayi3').is(":checked")) {
            //     score = 2;
            // }

            if ($('#deny_jantung_bayi1').is(":checked")) {
                score = 0;
            } else if ($('#deny_jantung_bayi2').is(":checked")) {
                score = 1;
            } else if ($('#deny_jantung_bayi3').is(":checked")) {
                score = 2;
            }

            if ($('#tonus_otot_bayi1').is(":checked")) {
                score1 = 0;
            } else if ($('#tonus_otot_bayi2').is(":checked")) {
                score1 = 1;
            } else if ($('#tonus_otot_bayi3').is(":checked")) {
                score1 = 2;
            }

            if ($('#warna_kulit_bayi1').is(":checked")) {
                score2 = 0;
            } else if ($('#warna_kulit_bayi2').is(":checked")) {
                score2 = 1;
            } else if ($('#warna_kulit_bayi3').is(":checked")) {
                score2 = 2;
            }

            if ($('#usaha_nafas_bayi1').is(":checked")) {
                score3 = 0;
            } else if ($('#usaha_nafas_bayi2').is(":checked")) {
                score3 = 1;
            } else if ($('#usaha_nafas_bayi3').is(":checked")) {
                score3 = 2;
            }

            if ($('#reflek_bayi1').is(":checked")) {
                score4 = 0;
            } else if ($('#reflek_bayi2').is(":checked")) {
                score4 = 1;
            } else if ($('#reflek_bayi3').is(":checked")) {
                score4 = 2;
            }

            sum = Number(score) + Number(score1) + Number(score2) + Number(score3) + Number(score4);
            console.log(sum);
            total = $('#total').val(sum);
        }
    </script>
    <script type="text/javascript">
        $("#persalinan1").click(function() {
            if ($(this).is(":checked")) {
                $("#title2").hide();
                $("#label3").hide();
                $("#label4").hide();
                $("#caesaria2").hide();
                $("#caesaria1").hide();
                $("#title1").show();
                $("#label1").show();
                $("#label2").show();
                $("#pervagina2").show();
                $("#pervagina1").show();
            }
        });
        $("#persalinan2").click(function() {
            if ($(this).is(":checked")) {
                $("#title1").hide();
                $("#label1").hide();
                $("#label2").hide();
                $("#pervagina2").hide();
                $("#pervagina1").hide();
                $("#title2").show();
                $("#label3").show();
                $("#label4").show();
                $("#caesaria2").show();
                $("#caesaria1").show();
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const inputNames = ['deny_jantung_bayi', 'usaha_nafas_bayi', 'tonus_otot_bayi', 'reflek_bayi', 'warna_kulit_bayi'];

            inputNames.forEach(name => {
                const radios = document.querySelectorAll(`input[name="${name}"]`);
                radios.forEach(radio => {
                    radio.addEventListener('change', handleRadioChange);
                });
            });
        });

        function handleRadioChange(event) {
            const target = event.target;
            const lainnyaInput = document.getElementById('nilai_APGAR_bayi_lainnya');

            if (target.value === 'Lainnya') {
                lainnyaInput.style.display = 'block';
                lainnyaInput.focus();
            } else {
                lainnyaInput.style.display = 'none';
                lainnyaInput.value = '';
            }

            updateTotal();
        }

        function updateTotal() {
            let total = 0;
            const inputNames = ['deny_jantung_bayi', 'usaha_nafas_bayi', 'tonus_otot_bayi', 'reflek_bayi', 'warna_kulit_bayi'];

            inputNames.forEach(name => {
                const radios = document.querySelectorAll(`input[name="${name}"]:checked`);
                radios.forEach(radio => {
                    if (radio.value === 'Lainnya') {
                        const lainnyaValue = parseInt(document.getElementById(`${name}_lainnya`).value, 10);
                        if (!isNaN(lainnyaValue)) {
                            total += lainnyaValue;
                        }
                    } else {
                        total += parseInt(radio.value, 10);
                    }
                });
            });

            document.getElementById('total').textContent = total;
        }
    </script>

    <script type="text/javascript">
        function simpan() {
            id_form = $('#id_form').val();
            id_pelayanan = $('#inPel').val();
            id_history = $('#inHis').val();
            skor_akhir = $('#skor_akhir').val();
            tgl_pengkajian = $('#tgl_pengkajian').val();
            cara_masuk = $('#cara_masuk').val();
            g_ibu = $('#g_ibu').val();
            p_ibu = $('#p_ibu').val();
            a_ibu = $('#a_ibu').val();
            usia_kehamilan_ibu = $('#usia_kehamilan_ibu').val();
            pres_bayi_ibu = $('#pres_bayi_ibu').val();
            komp_antenatal_ibu = $('#komp_antenatal_ibu').val();
            pem_antenatal_ibu = $('input[name="pem_antenatal_ibu"]:checked').val();
            berat_ibu = $('#berat_ibu').val();
            tinggi_ibu = $('#tinggi_ibu').val();
            kead_um_ibu = $('#kead_um_ibu').val();
            jenis_persalinan = $('#jenis_persalinan').val();
            indikasi = $('#indikasi').val();
            komp_persalinan = $('#komp_persalinan').val();
            lam_ketu_pec = $('#lam_ketu_pec').val();
            persalinan_di = $('#persalinan_di').val();
            td_vital = $('#td_vital').val();
            n_vital = $('#n_vital').val();
            rr_vital = $('#rr_vital').val();
            s_vital = $('#s_vital').val();
            fetus_vital = $('#fetus_vital').val();
            kond_ketu_vital = $('#kond_ketu_vital').val();
            pros_persalinan_vital = $('input[name="pros_persalinan_vital"]:checked').val();
            keb_ibu_terdahulu = $('input[name="keb_ibu_terdahulu"]:checked').val();
            lahir_bayi = $('#lahir_bayi').val();
            jam_lahir_bayi = $('#jam_lahir_bayi').val();
            jenkel_lahir_bayi = $('input[name="jenkel_lahir_bayi"]:checked').val();
            kelahiran_bayi = $('input[name="kelahiran_bayi"]:checked').val();
            deny_jantung_bayi = $('input[name="deny_jantung_bayi"]:checked').val();
            usaha_nafas_bayi = $('input[name="usaha_nafas_bayi"]:checked').val();
            tonus_otot_bayi = $('input[name="tonus_otot_bayi"]:checked').val();
            reflek_bayi = $('input[name="reflek_bayi"]:checked').val();
            warna_kulit_bayi = $('input[name="warna_kulit_bayi"]:checked').val();
            total = $('#total').val();
            cap_succedaneum = $('#cap_succedaneum').val();
            cap_haematoma = $('#cap_haematoma').val();
            cacat_bawaan = $('#cacat_bawaan').val();
            rangsangan = $('input[name="rangsangan"]:checked').val();
            peng_lendir = $('input[name="peng_lendir"]:checked').val();
            intu_endo = $('input[name="intu_endo"]:checked').val();
            umur_pf = $('#umur_pf').val();
            hari_pf = $('#hari_pf').val();
            jam_pf = $('#jam_pf').val();
            suhu_pf = $('#suhu_pf').val();
            berat_pf = $('#berat_pf').val();
            panjang_pf = $('#panjang_pf').val();
            lingkar_pf = $('#lingkar_pf').val();
            leher_pf = $('#leher_pf').val();
            mata_pf = $('input[name="mata_pf"]:checked').val();
            dada_pf = $('input[name="dada_pf"]:checked').val();
            tubuh_pf = $('input[name="tubuh_pf"]:checked').val();
            mulut_pf = $('input[name="mulut_pf"]:checked').val();
            pengerakan_pf = $('input[name="pengerakan_pf"]:checked').val();
            pernapasan_pf = $('#pernapasan_pf').val();
            denyut_jantung_pf = $('#denyut_jantung_pf').val();
            perut_pf = $('input[name="perut_pf"]:checked').val();
            bising_usus_pf = $('#bising_usus_pf').val();
            mekonium_pf = $('#mekonium_pf').val();
            punggung_pf = $('#punggung_pf').val();
            kead_punggung_pf = $('#kead_punggung_pf').val();
            laki_gene_pf = $('input[name="laki_gene_pf"]:checked').val();
            testis_gene_pf = $('input[name="testis_gene_pf"]:checked').val();
            perem_gene_pf = $('input[name="perem_gene_pf"]:checked').val();
            anus_gene_pf = $('input[name="anus_gene_pf"]:checked').val();
            jari_tangan_eks_pf = $('#jari_tangan_eks_pf').val();
            jari_kaki_eks_pf = $('#jari_kaki_eks_pf').val();
            pergerakan_eks_pf = $('input[name="pergerakan_eks_pf"]:checked').val();
            tendon_sn_pf = $('input[name="tendon_sn_pf"]:checked').val();
            moro_sn_pf = $('input[name="moro_sn_pf"]:checked').val();
            rooting_sn_pf = $('input[name="rooting_sn_pf"]:checked').val();
            menghisap_sn_pf = $('input[name="menghisap_sn_pf"]:checked').val();
            babinski_sn_pf = $('input[name="babinski_sn_pf"]:checked').val();
            menggenggam_sn_pf = $('input[name="menggenggam_sn_pf"]:checked').val();
            menangis_sn_pf = $('input[name="menangis_sn_pf"]:checked').val();
            berjalan_sn_pf = $('input[name="berjalan_sn_pf"]:checked').val();
            tonic_sn_pf = $('input[name="tonic_sn_pf"]:checked').val();
            tgl_bab_eliminasi = $('#tgl_bab_eliminasi').val();
            jam_bab_eliminasi = $('#jam_bab_eliminasi').val();
            tgl_bab2_eliminasi = $('#tgl_bab2_eliminasi').val();
            jam_bab2_eliminasi = $('#jam_bab2_eliminasi').val();
            meconium_eliminasi = $('input[name="meconium_eliminasi"]:checked').val();
            lingkar_eliminasi = $('#lingkar_eliminasi').val();
            dada_eliminasi = $('#dada_eliminasi').val();
            perut_eliminasi = $('#perut_eliminasi').val();
            dasar_imunisasi = $('#dasar_imunisasi').val();
            hepatitis_imunisasi = $('#hepatitis_imunisasi').val();
            dpt_imunisasi = $('#dpt_imunisasi').val();
            polio_imunisasi = $('#polio_imunisasi').val();
            campak_imunisasi = $('#campak_imunisasi').val();
            wajah = $('input[name="wajah"]:checked').val();
            ekstremitas = $('input[name="ekstremitas"]:checked').val();
            gerakan = $('input[name="gerakan"]:checked').val();
            menangis = $('input[name="menangis"]:checked').val();
            kemampuan_ditenangkan = $('input[name="kemampuan_ditenangkan"]:checked').val();
            staff = $('#staff').val();



            nilai_APGAR_bayi = $('input[name="nilai_APGAR_bayi"]:checked').val();
            if (nilai_APGAR_bayi == "lainnya") {
                nilai_APGAR_bayi = $('#nilai_APGAR_bayi').val();
            }
            nilai_APGAR = $('input[name="nilai_APGAR"]:checked').val();


            mass_jantung = $('input[name="mass_jantung"]:checked').val();
            if (mass_jantung == "Ya") {
                mass_jantung = $('#mass_jantung').val();
            }
            mass = $('input[name="mass"]:checked').val();

            o2 = $('input[name="o2"]:checked').val();
            if (o2 == "Ya") {
                o2 = $('#o2').val();
            }
            o2_o = $('input[name="o2_o"]:checked').val();

            ambu_bag = $('input[name="ambu_bag"]:checked').val();
            if (ambu_bag == "Ya") {
                ambu_bag = $('#ambu_bag').val();
            }
            ambu = $('input[name="ambu"]:checked').val();

            sutura_pf = $('input[name="sutura_pf"]:checked').val();
            if (sutura_pf == "Kelainan") {
                sutura_pf = $('#sutura_pf').val();
            }
            sutura = $('input[name="sutura"]:checked').val();


            telinga_pf = $('input[name="telinga_pf"]:checked').val();
            if (telinga_pf == "Kelainan") {
                telinga_pf = $('#telinga_pf').val();
            }
            telinga = $('input[name="telinga"]:checked').val();

            kepala_pf = $('input[name="kepala_pf"]:checked').val();
            if (kepala_pf == "kelainan") {
                kepala_pf = $('#kepala_pf').val();
            }
            kepala = $('input[name="kepala"]:checked').val();


            ubun_pf = $('input[name="ubun_pf"]:checked').val();
            if (ubun_pf == "kelainan") {
                ubun_pf = $('#ubun_pf').val();
            }
            ubun = $('input[name="ubun"]:checked').val();


            hidung_pf = $('input[name="hidung_pf"]:checked').val();
            if (hidung_pf == "Kelainan") {
                hidung_pf = $('#hidung_pf').val();
            }
            hidung = $('input[name="hidung"]:checked').val();

            bunyi_nafas_pf = $('input[name="bunyi_nafas_pf"]:checked').val();
            if (bunyi_nafas_pf == "lainnya") {
                bunyi_nafas_pf = $('#bunyi_nafas_pf').val();
            }
            bunyi_nafas = $('input[name="bunyi_nafas"]:checked').val();


            nutrisi_sn_pf = $('input[name="nutrisi_sn_pf"]:checked').val();
            if (nutrisi_sn_pf == "lainnya") {
                nutrisi_sn_pf = $('#nutrisi_sn_pf').val();
            }
            nutrisi_sn = $('input[name="nutrisi_sn"]:checked').val();

            $.ajax({
                url: "<?php echo base_url() ?>Erm_ranap_bayi_baru_lahir/store",
                method: "POST",
                dataType: 'json',
                data: {
                    id_form: id_form,
                    id_pelayanan: id_pelayanan,
                    id_history: id_history,
                    tgl_pengkajian: tgl_pengkajian,
                    cara_masuk: cara_masuk,
                    g_ibu: g_ibu,
                    p_ibu: p_ibu,
                    a_ibu: a_ibu,
                    usia_kehamilan_ibu: usia_kehamilan_ibu,
                    pres_bayi_ibu: pres_bayi_ibu,
                    komp_antenatal_ibu: komp_antenatal_ibu,
                    pem_antenatal_ibu: pem_antenatal_ibu,
                    berat_ibu: berat_ibu,
                    tinggi_ibu: tinggi_ibu,
                    kead_um_ibu: kead_um_ibu,
                    jenis_persalinan: jenis_persalinan,
                    indikasi: indikasi,
                    komp_persalinan: komp_persalinan,
                    lam_ketu_pec: lam_ketu_pec,
                    persalinan_di: persalinan_di,
                    td_vital: td_vital,
                    n_vital: n_vital,
                    rr_vital: rr_vital,
                    s_vital: s_vital,
                    fetus_vital: fetus_vital,
                    kond_ketu_vital: kond_ketu_vital,
                    pros_persalinan_vital: pros_persalinan_vital,
                    keb_ibu_terdahulu: keb_ibu_terdahulu,
                    lahir_bayi: lahir_bayi,
                    jam_lahir_bayi: jam_lahir_bayi,
                    jenkel_lahir_bayi: jenkel_lahir_bayi,
                    kelahiran_bayi: kelahiran_bayi,
                    nilai_APGAR_bayi: nilai_APGAR_bayi,
                    deny_jantung_bayi: deny_jantung_bayi,
                    usaha_nafas_bayi: usaha_nafas_bayi,
                    tonus_otot_bayi: tonus_otot_bayi,
                    reflek_bayi: reflek_bayi,
                    warna_kulit_bayi: warna_kulit_bayi,
                    total: total,
                    cap_succedaneum: cap_succedaneum,
                    cap_haematoma: cap_haematoma,
                    cacat_bawaan: cacat_bawaan,
                    rangsangan: rangsangan,
                    peng_lendir: peng_lendir,
                    ambu_bag: ambu_bag,
                    mass_jantung: mass_jantung,
                    intu_endo: intu_endo,
                    o2: o2,
                    umur_pf: umur_pf,
                    hari_pf: hari_pf,
                    jam_pf: jam_pf,
                    suhu_pf: suhu_pf,
                    berat_pf: berat_pf,
                    panjang_pf: panjang_pf,
                    lingkar_pf: lingkar_pf,
                    kepala_pf: kepala_pf,
                    ubun_pf: ubun_pf,
                    sutura_pf: sutura_pf,
                    telinga_pf: telinga_pf,
                    hidung_pf: hidung_pf,
                    leher_pf: leher_pf,
                    mata_pf: mata_pf,
                    dada_pf: dada_pf,
                    tubuh_pf: tubuh_pf,
                    mulut_pf: mulut_pf,
                    pengerakan_pf: pengerakan_pf,
                    bunyi_nafas_pf: bunyi_nafas_pf,
                    pernapasan_pf: pernapasan_pf,
                    denyut_jantung_pf: denyut_jantung_pf,
                    perut_pf: perut_pf,
                    bising_usus_pf: bising_usus_pf,
                    mekonium_pf: mekonium_pf,
                    punggung_pf: punggung_pf,
                    kead_punggung_pf: kead_punggung_pf,
                    laki_gene_pf: laki_gene_pf,
                    testis_gene_pf: testis_gene_pf,
                    perem_gene_pf: perem_gene_pf,
                    anus_gene_pf: anus_gene_pf,
                    jari_tangan_eks_pf: jari_tangan_eks_pf,
                    jari_kaki_eks_pf: jari_kaki_eks_pf,
                    pergerakan_eks_pf: pergerakan_eks_pf,
                    tendon_sn_pf: tendon_sn_pf,
                    moro_sn_pf: moro_sn_pf,
                    rooting_sn_pf: rooting_sn_pf,
                    menghisap_sn_pf: menghisap_sn_pf,
                    babinski_sn_pf: babinski_sn_pf,
                    menggenggam_sn_pf: menggenggam_sn_pf,
                    menangis_sn_pf: menangis_sn_pf,
                    berjalan_sn_pf: berjalan_sn_pf,
                    tonic_sn_pf: tonic_sn_pf,
                    nutrisi_sn_pf: nutrisi_sn_pf,
                    tgl_bab_eliminasi: tgl_bab_eliminasi,
                    jam_bab_eliminasi: jam_bab_eliminasi,
                    tgl_bab2_eliminasi: tgl_bab2_eliminasi,
                    jam_bab2_eliminasi: jam_bab2_eliminasi,
                    meconium_eliminasi: meconium_eliminasi,
                    lingkar_eliminasi: lingkar_eliminasi,
                    dada_eliminasi: dada_eliminasi,
                    perut_eliminasi: perut_eliminasi,
                    dasar_imunisasi: dasar_imunisasi,
                    hepatitis_imunisasi: hepatitis_imunisasi,
                    dpt_imunisasi: dpt_imunisasi,
                    polio_imunisasi: polio_imunisasi,
                    campak_imunisasi: campak_imunisasi,
                    wajah: wajah,
                    ekstremitas: ekstremitas,
                    gerakan: gerakan,
                    menangis: menangis,
                    kemampuan_ditenangkan: kemampuan_ditenangkan,
                    skor_akhir: skor_akhir,
                    staff: staff,
                },
                error: function(data, error) {
                    console.error(error);
                    console.log(data.error)
                },
                success: function(data) {
                    if (data.status == "success") {
                        // alert('success');
                        window.location.href = "<?php echo base_url('erm_ranap/form/') ?>" + '<?= urlencode(base64_encode($id_pelayanan)) ?>' + '/' + '<?= urlencode(base64_encode($id_history)) ?>';
                    } else if (data.error) {
                        if (nama_ibu == '' | nama_ibu == null) {
                            $('#ibu_error').html('*wajib diisi');
                        } else {
                            $('#ibu_error').html('');
                        }
                        if (jenis_persalinan == '' | jenis_persalinan == null) {
                            $('#persalinan_error').html('*wajib diisi');
                        } else {
                            $('#persalinan_error').html('');
                        }
                        if (rawat_gabung == '' | rawat_gabung == null) {
                            $('#rawat_error').html('*wajib diisi');
                        } else {
                            $('#rawat_error').html('');
                        }
                        if (alasan == '' | alasan == null) {
                            $('#alasan_error').html('*wajb diisi');
                        } else {
                            $('#alasan_error').html('');
                        }
                        if (catatan == '' | catatan == null) {
                            $('#catatan_error').html('*wajib diisi');
                        } else {
                            $('#catatan_error').html('');
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

        function reload_data_diagnosa(id_pelayanan, id_history) { //nampilinn diagnosa seluruhnya utk nambah ke diagnosa pasien
            $('#tabledgns').dataTable().fnClearTable();
            $('#tabledgns').dataTable().fnDestroy();
            $('#tabledgns').DataTable({
                "scrollX": false,
                "scrollY": false,
                "pageLength": 3,
                "language": {
                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing": "Sedang memproses...",
                    "sLengthMenu": "Tampilkan MENU entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan START sampai END dari TOTAL entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari MAX entri keseluruhan)",
                    "sInfoPostFix": "",
                    "sSearch": "Cari Diagnosa:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext": "Selanjutnya",
                        "sLast": "Terakhir",
                    }
                },
                "ajax": {
                    "url": '<?php echo base_url('Erm_igd/tampil_listdata_diagnosa'); ?>',
                    "type": 'POST',
                    "data": {
                        id_pelayanan: id_pelayanan,
                        id_history: id_history
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

        function reload_data_diagnosa_id_pel(id_pelayanan) { // modal utk nampilin diagnosa pasien
            $('#tablediagnosa').dataTable().fnClearTable();
            $('#tablediagnosa').dataTable().fnDestroy();
            $('#tablediagnosa').DataTable({
                "language": {
                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing": "Sedang memproses...",
                    "sLengthMenu": "Tampilkan MENU entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan START sampai END dari TOTAL entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari MAX entri keseluruhan)",
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
                    "url": '<?php echo base_url('Erm_ranap_asesmen_dokter/tampil_list_diagnosa_ranap'); ?>',
                    "type": 'POST',
                    "data": {
                        id_pelayanan: id_pelayanan
                    },
                },

                "deferRender": true,
                "processing": true,
                "order": [],
                "columnDefs": [{
                    "width": "20%",
                    "targets": [0],
                    "orderable": false,
                }, ],
            });
        }

        function reload_data_diagnosa1_id_pel1(id_pelayanan) { // modal utk nampilin diagnosa pasien
            $('#tablediagnosa1').dataTable().fnClearTable();
            $('#tablediagnosa1').dataTable().fnDestroy();
            $('#tablediagnosa1').DataTable({
                "language": {
                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing": "Sedang memproses...",
                    "sLengthMenu": "Tampilkan MENU entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan START sampai END dari TOTAL entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari MAX entri keseluruhan)",
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
                    "url": '<?php echo base_url('Erm_ranap_asesmen_dokter/tampil_list_diagnosa1'); ?>',
                    "type": 'POST',
                    "data": {
                        id_pelayanan: id_pelayanan
                    },
                },

                "deferRender": true,
                "processing": true,
                "order": [],
                "columnDefs": [{
                    "width": "20%",
                    "targets": [0],
                    "orderable": false,
                }, ],
            });
        }

        function tambah_data_diagnosa(id_pelayanan, id_diagnosa, nama_diagnosa, his) { //utk nambah diagnosa pasien
            id_pelayanan = $('#inPel').val();
            // no_diagnosa = $('#no_diagnosa').val();
            swal({
                title: "Apakah kamu yakin?",
                text: "Menambah Diagnosa " + nama_diagnosa + "?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function() {
                $().ready(function() {
                    $.ajax({
                        url: "<?php echo base_url() ?>Erm_igd/tambah_data_diagnosa",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            id_pelayanan: id_pelayanan,
                            id_diagnosa: id_diagnosa,
                            nama_diagnosa: nama_diagnosa,
                            id_history: his
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Id diagnosa" + id_diagnosa + " Berhasil ditambah",
                                    confirmButtonColor: "#3cb878",
                                });
                                reload_data_diagnosa_id_pel(his);
                                reload_data_diagnosa1_id_pel1(his);
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

        function hapus_data_diagnosa(id) { //utk hapus diagnosa pasien
            swal({
                title: "Warning?",
                text: "Apakah kamu yakin menghapus data ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function() {
                $().ready(function() {
                    $.ajax({
                        url: "<?php echo base_url() ?>Erm_ranap_asesmen_dokter/hapus_data_diagnosa",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            id: id,
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Data Berhasil dihapus",
                                    confirmButtonColor: "#3cb878",
                                });
                                $('#tablediagnosa').DataTable().ajax.reload();
                                $('#tablediagnosa1').DataTable().ajax.reload();
                            } else {
                                swal({
                                    title: "Gagal!",
                                    type: "warning",
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                });
            });
            return false;
        }

        function hapus_data_diagnosa1(id) { //utk hapus diagnosa pasien
            swal({
                title: "Warning?",
                text: "Apakah kamu yakin menghapus data ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3cb878",
                confirmButtonText: "Yakin",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function() {
                $().ready(function() {
                    $.ajax({
                        url: "<?php echo base_url() ?>Erm_ranap_asesmen_dokter/hapus_data_diagnosa1",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            id: id,
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Data Berhasil dihapus",
                                    confirmButtonColor: "#3cb878",
                                });
                                $('#tablediagnosa').DataTable().ajax.reload();
                                $('#tablediagnosa1').DataTable().ajax.reload();
                            } else {
                                swal({
                                    title: "Gagal!",
                                    type: "warning",
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                });
            });
            return false;
        }
    </script>