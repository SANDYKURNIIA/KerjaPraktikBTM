<div style="max-width: 1400px; margin: 0 auto; padding: 0 20px;">
    <ul class="nav nav-tabs mb-20" style="border-bottom: 2px solid #3cb878; padding: 0; display: flex; align-items: stretch; height: 52px; background: #ffffff; border-radius: 8px 8px 0 0; margin-top: 20px; list-style: none;">
        <li class="active" style="display: flex; align-items: stretch; margin-bottom: -2px;">
            <a href="#" onclick="return false;" style="border: none; border-bottom: 3px solid #3cb878; color: #3cb878; font-weight: 600; padding: 12px 24px; display: flex; align-items: center; height: 100%; text-decoration: none; font-size: 13px; border-radius: 0;">
                <i class="fa fa-heartbeat" style="margin-right: 8px; font-size: 15px;"></i> PEMANTAUAN HEMODIALISIS HARIAN
            </a>
        </li>
        <li style="display: flex; align-items: stretch; margin-bottom: -2px;">
            <a href="#" onclick="goToIntradialitik(event)" style="border: none; color: #6c7a89; font-weight: 600; padding: 12px 24px; display: flex; align-items: center; height: 100%; text-decoration: none; font-size: 13px; border-radius: 0;">
                <i class="fa fa-stethoscope" style="margin-right: 8px; font-size: 15px;"></i> PEMANTAUAN INTRADIALITIK
            </a>
        </li>
    </ul>
</div>
<div class="tab-content" style="max-width: 1400px; margin: 0 auto; padding: 0 20px;">
    <div class="tab-pane fade in active" id="tab_hd">

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view" style="border-radius: 0 0 16px 16px; border: 1px solid #f0f0f0; border-top: none; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
                    <div class="panel-heading" style="background: #fff; border-bottom: 2px solid #f0f0f0; padding: 20px 30px;">
                        <div class="pull-left">
                            <h2 class="panel-title txt-dark" style="font-size: 20px; font-weight: 700; color: #1a2a3a; margin: 0;">PEMANTAUAN PELAKSANAAN HEMODIALISIS HARIAN</h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="panel-wrapper collapse in">
                        <input type="hidden" name="id_pelayanan" id="id_pelayanan" value="<?= $id_pelayanan ?>">
                        <input type="hidden" name="id_history" id="id_history" value="<?= $id_history ?>">
                        <input type="hidden" id="no_rm" value="<?= $no_rm ?>">
                        <input type="hidden" id="id_edit">
                        <input type="hidden" id="mode" value="insert">

                        <!-- Data Pasien -->
                        <div class="panel-body" style="padding: 30px 35px 20px;">
                            <h5 class="text-primary mb-20" style="font-weight: 700; color: #1a2a3a; font-size: 16px; margin-bottom: 20px;"><strong>DATA PASIEN</strong></h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group" style="margin-bottom: 15px;">
                                        <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">No. RM</label>
                                        <input type="text" name="no_rm" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRm" style="background-color: #f8f9fa; border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%; font-weight: 500; color: #555;">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group" style="margin-bottom: 15px;">
                                        <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Nama</label>
                                        <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama" style="background-color: #f8f9fa; border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%; font-weight: 500; color: #555;">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group" style="margin-bottom: 15px;">
                                        <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Jenis Kelamin</label>
                                        <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk" style="background-color: #f8f9fa; border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%; font-weight: 500; color: #555;">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group" style="margin-bottom: 15px;">
                                        <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Tgl Lahir / Umur</label>
                                        <input type="text" disabled class="form-control" value="<?= $tgl_lahir ?>" id="inTglLahir" style="background-color: #f8f9fa; border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%; font-weight: 500; color: #555;">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group" style="margin-bottom: 15px;">
                                        <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Jam/Tanggal Masuk</label>
                                        <input type="text" disabled class="form-control" value="<?= $tgl_masuk ?>" id="inTglMasuk" style="background-color: #f8f9fa; border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%; font-weight: 500; color: #555;">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group" style="margin-bottom: 15px;">
                                        <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Cara Bayar</label>
                                        <input type="text" disabled class="form-control" value="<?= $cara_bayar ?>" id="inCaraBayar" style="background-color: #f8f9fa; border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%; font-weight: 500; color: #555;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="light-grey-hr" style="border-top: 1px solid #e0e0e0; margin: 0 30px;">
                        <!-- Form Input -->
                        <div class="panel-body" style="padding: 20px 35px 30px;">
                            <!-- Gelang Identitas -->
                            <div class="form-section mb-30" style="padding: 20px; background: #f9f9f9; border-radius: 5px; margin-bottom: 30px;">
                                <h5 class="text-primary mb-15" style="font-weight: 700; color: #1a2a3a; font-size: 14px; margin-bottom: 15px;"><strong>GELANG IDENTITAS PASIEN</strong></h5>
                                <div class="form-group" style="margin-bottom: 15px;">
                                    <label class="radio-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                        <input type="radio" name="gelang_identitas_status" value="Sudah terpasang" id="gelang_sudah">
                                        Sudah terpasang
                                    </label>
                                    <label class="radio-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                        <input type="radio" name="gelang_identitas_status" value="Belum terpasang" id="gelang_belum">
                                        Belum terpasang
                                    </label>
                                </div>
                                <div id="gelang_alasan_box" style="display:none; margin-top: 10px;">
                                    <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Alasan:</label>
                                    <input type="text" name="gelang_identitas_alasan" class="form-control" placeholder="Tuliskan alasan..." style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                </div>
                            </div>

                            <!-- Riwayat Alergi -->
                            <div class="form-section mb-30" style="padding: 20px; background: #f9f9f9; border-radius: 5px; margin-bottom: 30px;">
                                <h5 class="text-primary mb-15" style="font-weight: 700; color: #1a2a3a; font-size: 14px; margin-bottom: 15px;"><strong>RIWAYAT ALERGI</strong></h5>
                                <div class="form-group" style="margin-bottom: 15px;">
                                    <label class="radio-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                        <input type="radio" name="alergi_status" value="Tidak" id="alergi_tidak"> Tidak
                                    </label>
                                    <label class="radio-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                        <input type="radio" name="alergi_status" value="Ya" id="alergi_ya"> Ya, sebutkan
                                    </label>
                                </div>
                                <div id="alergi_sebutkan_box" style="display:none; margin-top: 10px;">
                                    <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Sebutkan alergi:</label>
                                    <input type="text" name="alergi_keterangan" class="form-control" placeholder="Tuliskan alergi..." style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                </div>

                                <div class="mt-20" style="margin-top: 20px;">
                                    <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;"><strong>Gelang Alergi:</strong></label>
                                    <div class="form-group mt-5" style="margin-top: 5px; margin-bottom: 15px;">
                                        <label class="radio-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                            <input type="radio" name="gelang_alergi_status" value="Sudah terpasang" id="gelang_alergi_sudah">
                                            Sudah terpasang
                                        </label>
                                        <label class="radio-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                            <input type="radio" name="gelang_alergi_status" value="Belum terpasang" id="gelang_alergi_belum">
                                            Belum terpasang
                                        </label>
                                    </div>
                                    <div id="gelang_alergi_alasan_box" style="display:none; margin-top: 10px;">
                                        <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Alasan:</label>
                                        <input type="text" name="gelang_alergi_alasan" class="form-control" placeholder="Tuliskan alasan..." style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                    </div>
                                </div>
                            </div>
                            <!-- Akses Vaskuler -->
                            <div class="form-section mb-30" style="padding: 20px; background: #f9f9f9; border-radius: 5px; margin-bottom: 30px;">
                                <h5 class="text-primary mb-15" style="font-weight: 700; color: #1a2a3a; font-size: 14px; margin-bottom: 15px;"><strong>AKSES VASKULER</strong></h5>

                                <div class="form-group" style="margin-bottom: 15px;">
                                    <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;"><strong>Jenis:</strong></label>
                                    <div class="checkbox-list mt-5" style="margin-top: 5px;">
                                        <label class="checkbox-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                            <input type="checkbox" name="akses_jenis" value="FISTULA AV (CIMINO)"> FISTULA AV (CIMINO)
                                        </label>
                                        <label class="checkbox-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                            <input type="checkbox" name="akses_jenis" value="GRAFT AV"> GRAFT AV
                                        </label>
                                        <br>
                                        <label class="checkbox-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                            <input type="checkbox" name="akses_jenis" value="TUNNEL CATHETER"> TUNNEL CATHETER
                                        </label>
                                        <label class="checkbox-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                            <input type="checkbox" name="akses_jenis" value="DOUBLE LUMEN CATHETER"> DOUBLE LUMEN CATHETER
                                        </label>
                                        <br>
                                        <label class="checkbox-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                            <input type="checkbox" name="akses_jenis" value="FEMORAL"> FEMORAL
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Lokasi:</label>
                                            <input type="text" name="akses_lokasi" class="form-control" placeholder="Tuliskan lokasi..." style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Kondisi:</label>
                                            <input type="text" name="akses_kondisi" class="form-control" placeholder="Tuliskan kondisi..." style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Tanda Infeksi:</label>
                                            <div>
                                                <label class="radio-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="akses_infeksi" value="Ya"> Ya
                                                </label>
                                                <label class="radio-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="akses_infeksi" value="Tidak"> Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Aneurisma:</label>
                                            <div>
                                                <label class="radio-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="akses_aneurisma" value="Ya"> Ya
                                                </label>
                                                <label class="radio-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="akses_aneurisma" value="Tidak"> Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Thrill (AV Fistula):</label>
                                            <div>
                                                <label class="radio-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="akses_thrill" value="Lemah"> Lemah
                                                </label>
                                                <label class="radio-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="akses_thrill" value="Tidak"> Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Bruit (AV Fistula):</label>
                                            <div>
                                                <label class="radio-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="akses_bruit" value="Lemah"> Lemah
                                                </label>
                                                <label class="radio-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="akses_bruit" value="Tidak"> Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-bottom: 15px;">
                                    <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Lain-lain:</label>
                                    <input type="text" name="akses_lain" class="form-control" placeholder="Tuliskan lainnya..." style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                </div>

                                <!-- Catheter Info -->
                                <div class="well well-sm mt-20" style="background-color: #f5f5f5; border: 1px solid #e3e3e3; border-radius: 4px; padding: 15px; margin-top: 20px;">
                                    <h6 class="mb-15" style="font-weight: 700; margin-bottom: 15px;"><strong>Untuk Tunnel dan Double Lumen Catheter:</strong></h6>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Ukuran Lumen Arteri (cm):</label>
                                            <input type="number" name="lumen_arteri_cm" class="form-control" placeholder="cm" style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Ukuran Lumen Vena (cm):</label>
                                            <input type="number" name="lumen_vena_cm" class="form-control" placeholder="cm" style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                        </div>
                                    </div>

                                    <div class="row mt-10" style="margin-top: 10px;">
                                        <div class="col-md-6">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Panjang DL Arteri (cc):</label>
                                            <input type="number" name="panjang_dl_arteri_cc" class="form-control" placeholder="cc" style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Panjang DL Vena (cc):</label>
                                            <input type="number" name="panjang_dl_vena_cc" class="form-control" placeholder="cc" style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                        </div>
                                    </div>

                                    <div class="row mt-10" style="margin-top: 10px;">
                                        <div class="col-md-6">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Antibiotic Lock Arteri (cc):</label>
                                            <input type="number" name="antibiotic_lock_arteri_cc" class="form-control" placeholder="cc" style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Antibiotic Lock Vena (cc):</label>
                                            <input type="number" name="antibiotic_lock_vena_cc" class="form-control" placeholder="cc" style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Mesin HD -->
                            <div class="form-section mb-30" style="padding: 20px; background: #f9f9f9; border-radius: 5px; margin-bottom: 30px;">
                                <h5 class="text-primary mb-15" style="font-weight: 700; color: #1a2a3a; font-size: 14px; margin-bottom: 15px;"><strong>MESIN HD</strong></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Jenis Mesin:</label>
                                            <div>
                                                <label class="radio-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="mesin_hd" value="B-Braun"> B-Braun
                                                </label>
                                                <label class="radio-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="mesin_hd" value="Nipro"> Nipro
                                                </label>
                                                <label class="radio-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="mesin_hd" value="Fresenius"> Fresenius
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">No Mesin:</label>
                                            <input type="text" name="mesin_no" class="form-control" placeholder="Masukkan no mesin..." style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dialisat -->
                            <div class="form-section mb-30" style="padding: 20px; background: #f9f9f9; border-radius: 5px; margin-bottom: 30px;">
                                <h5 class="text-primary mb-15" style="font-weight: 700; color: #1a2a3a; font-size: 14px; margin-bottom: 15px;"><strong>DIALISAT</strong></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Jenis Calcium:</label>
                                            <div>
                                                <label class="radio-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="dialisat_ca" value="High Calcium"> High Calcium (Ca > 1.3 mmol/L)
                                                </label>
                                                <br>
                                                <label class="radio-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="dialisat_ca" value="Low Calcium"> Low Calcium (Ca < 1.3 mmol/L)
                                                        </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Suhu (°C):</label>
                                            <input type="text" name="dialisat_suhu" class="form-control" placeholder="°C" style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dialiser -->
                            <div class="form-section mb-30" style="padding: 20px; background: #f9f9f9; border-radius: 5px; margin-bottom: 30px;">
                                <h5 class="text-primary mb-15" style="font-weight: 700; color: #1a2a3a; font-size: 14px; margin-bottom: 15px;"><strong>DIALISER</strong></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Model:</label>
                                            <input type="text" name="dialiser_model" class="form-control" placeholder="Masukkan model..." style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Jenis Flux:</label>
                                            <div>
                                                <label class="radio-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="dialiser_flux" value="Low Flux"> Low Flux
                                                </label>
                                                <label class="radio-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="dialiser_flux" value="High Flux"> High Flux
                                                </label>
                                                <label class="radio-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="dialiser_flux" value="Super High Flux"> Super High Flux
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Kondisi:</label>
                                            <div>
                                                <label class="radio-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="dialiser_kondisi" value="Baru"> Baru
                                                </label>
                                                <label class="radio-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                                    <input type="radio" name="dialiser_kondisi" value="Reuse"> Reuse
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BB Kering -->
                            <div class="form-section mb-30" style="padding: 20px; background: #f9f9f9; border-radius: 5px; margin-bottom: 30px;">
                                <h5 class="text-primary mb-15" style="font-weight: 700; color: #1a2a3a; font-size: 14px; margin-bottom: 15px;"><strong>BB KERING</strong></h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Berat Badan Kering (kg):</label>
                                            <input type="number" name="bb_kering_kg" class="form-control" placeholder="kg" style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Resep HD -->
                            <div class="form-section mb-30" style="padding: 20px; background: #f9f9f9; border-radius: 5px; margin-bottom: 30px;">
                                <h5 class="text-primary mb-15" style="font-weight: 700; color: #1a2a3a; font-size: 14px; margin-bottom: 15px;"><strong>RESEP HD (diisi oleh Dokter)</strong></h5>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Lama HD (Jam):</label>
                                            <input type="number" name="lama_hd_jam" class="form-control" placeholder="Jam" style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Blood Flow Rate (Qb) mL/menit:</label>
                                            <input type="number" name="blood_flow_rate_ml_menit" class="form-control" placeholder="mL/menit" style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-bottom: 15px;">
                                            <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Ultrafiltration Goal (UFG) Liter:</label>
                                            <input type="number" name="ufg" class="form-control" placeholder="Liter" style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                        </div>
                                    </div>
                                </div>

                                <div class="well well-sm mt-20" style="background-color: #f5f5f5; border: 1px solid #e3e3e3; border-radius: 4px; padding: 15px; margin-top: 20px;">
                                    <h6 class="mb-15" style="font-weight: 700; margin-bottom: 15px;"><strong>Heparin:</strong></h6>
                                    <div class="form-group" style="margin-bottom: 15px;">
                                        <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Jenis:</label>
                                        <div>
                                            <label class="radio-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                                <input type="radio" name="heparin_jenis" value="Reguler"> Reguler
                                            </label>
                                            <label class="radio-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                                <input type="radio" name="heparin_jenis" value="Minimal"> Minimal
                                            </label>
                                            <label class="radio-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                                <input type="radio" name="heparin_jenis" value="Free"> Free
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" style="margin-bottom: 15px;">
                                                <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Total (IU):</label>
                                                <input type="number" name="heparin_total" class="form-control" placeholder="IU" style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" style="margin-bottom: 15px;">
                                                <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Bolus Awal (IU):</label>
                                                <input type="number" name="heparin_bolus" class="form-control" placeholder="IU" style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" style="margin-bottom: 15px;">
                                                <label class="control-label" style="font-weight: 600; font-size: 12px; color: #666; margin-bottom: 4px; display: block;">Kontinyu (IU):</label>
                                                <input type="number" name="heparin_kontinyu" class="form-control" placeholder="IU" style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Lain-lain -->
                            <div class="form-section mb-30" style="padding: 20px; background: #f9f9f9; border-radius: 5px; margin-bottom: 30px;">
                                <h5 class="text-primary mb-15" style="font-weight: 700; color: #1a2a3a; font-size: 14px; margin-bottom: 15px;"><strong>LAIN-LAIN</strong></h5>
                                <div class="form-group" style="margin-bottom: 15px;">
                                    <input type="text" name="lain_lain_1" class="form-control mb-10" placeholder="Tuliskan keterangan lain-lain..." style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%; margin-bottom: 10px;">
                                    <input type="text" name="lain_lain_2" class="form-control" placeholder="Baris tambahan..." style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px; width: 100%;">
                                </div>
                            </div>

                            <!-- Perubahan Obat -->
                            <div class="form-section mb-30" style="padding: 20px; background: #f9f9f9; border-radius: 5px; margin-bottom: 30px;">
                                <h5 class="text-primary mb-15" style="font-weight: 700; color: #1a2a3a; font-size: 14px; margin-bottom: 15px;"><strong>PERUBAHAN OBAT RUTIN</strong></h5>
                                <div class="form-group" style="margin-bottom: 15px;">
                                    <label class="radio-inline" style="display: inline-block; margin-right: 15px; font-weight: 400; cursor: pointer;">
                                        <input type="radio" name="perubahan_obat" value="Ya"> Ya (Tuliskan di Catatan Perkembangan Terintegrasi)
                                    </label>
                                    <label class="radio-inline ml-20" style="display: inline-block; margin-left: 20px; font-weight: 400; cursor: pointer;">
                                        <input type="radio" name="perubahan_obat" value="Tidak"> Tidak
                                    </label>
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="text-right mt-30" style="text-align: right; margin-top: 30px;">
                                <button type="button" onclick="history.back()" class="btn btn-default btn-lg" style="padding: 12px 30px; border: 1px solid #ccc; border-radius: 8px; font-weight: 600; background: #f5f5f5;">
                                    <i class="fa fa-arrow-left"></i> KEMBALI
                                </button>
                                <button type="button" onclick="simpan()" class="btn btn-success btn-lg" id="btnSimpan" style="padding: 12px 30px; border: none; border-radius: 8px; font-weight: 600; background: #3cb878; color: #fff; box-shadow: 0 4px 6px rgba(60, 184, 120, 0.3); margin-left: 10px;">
                                    <i class="fa fa-save"></i> SIMPAN DATA
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TABEL SBAR -->
        <div style="max-width: 1400px; margin: 0 auto; padding: 0; margin-top: 20px;">
            <div class="panel panel-default card-view" style="border-radius: 16px; border: 1px solid #f0f0f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
                <div class="panel-heading" style="background: #fff; border-bottom: 2px solid #f0f0f0; padding: 15px 30px;">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark" style="font-weight: 700; font-size: 16px; color: #1a2a3a; margin: 0;">PEMANTAUAN HEMODIALISIS HARIAN</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body" style="padding: 20px 30px;">
                        <div class="form-group" style="margin-bottom: 15px;">
                            <div class="col-md-12" style="padding: 0;">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table class="table table-hover display pb-60" id="tabel_terapi" style="width: 100%; border-collapse: collapse;">
                                            <thead>
                                                <tr class="bg-success" style="background: #3cb878; color: white;">
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">NO</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">PILIH</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">LANJUTKAN</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">HAPUS</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">CETAK</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">NO RM</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">NAMA PASIEN</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">TANGGAL MASUK</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">TANGGAL INPUT</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr class="bg-success" style="background: #3cb878; color: white;">
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">NO</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">PILIH</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">LANJUTKAN</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">HAPUS</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">CETAK</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">NO RM</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">NAMA PASIEN</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">TANGGAL MASUK</th>
                                                    <th style="padding: 12px 10px; text-align: center; font-weight: 600;">TANGGAL INPUT</th>
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

    </div> <!-- END TAB HD -->
</div> <!-- END TAB CONTENT -->

<style>
    .form-section {
        padding: 20px;
        background: #f9f9f9;
        border-radius: 5px;
    }

    .ml-20 {
        margin-left: 20px;
    }

    .mt-5 {
        margin-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .mt-15 {
        margin-top: 15px;
    }

    .mt-20 {
        margin-top: 20px;
    }

    .mt-30 {
        margin-top: 30px;
    }

    .mb-10 {
        margin-bottom: 10px;
    }

    .mb-15 {
        margin-bottom: 15px;
    }

    .mb-20 {
        margin-bottom: 20px;
    }

    .mb-30 {
        margin-bottom: 30px;
    }

    .light-grey-hr {
        border-top: 1px solid #e0e0e0;
        margin: 20px 0;
    }

    .text-primary {
        color: #1a2a3a;
    }

    .checkbox-list label {
        display: inline-block;
        margin-right: 15px;
    }

    .well {
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        padding: 15px;
    }

    /* Style Tab SEDERHANA - SAMA DENGAN INTRADIALITIK */
    .nav-tabs {
        background: #ffffff;
        border-radius: 8px 8px 0 0;
        border-bottom: 2px solid #e8ecef;
        margin-top: 20px;
        padding: 0 20px;
    }

    .nav-tabs>li {
        margin-bottom: -2px;
    }

    .nav-tabs>li>a {
        border: none;
        border-radius: 0;
        padding: 12px 24px;
        font-weight: 600;
        font-size: 13px;
        color: #6c7a89;
        transition: all 0.25s ease;
        cursor: pointer;
        text-decoration: none;
    }

    .nav-tabs>li>a:hover {
        background: transparent;
        color: #3cb878;
        text-decoration: none;
    }

    .nav-tabs>li.active>a {
        color: #3cb878;
        background: transparent;
        border: none;
        border-bottom: 3px solid #3cb878;
    }

    .nav-tabs>li>a i {
        margin-right: 8px;
        font-size: 15px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .nav-tabs {
            padding: 0 10px;
        }

        .nav-tabs>li>a {
            padding: 10px 15px;
            font-size: 12px;
        }

        .nav-tabs>li>a i {
            margin-right: 5px;
            font-size: 13px;
        }
    }
</style>

<script>
    $(document).ready(function() {
        const fromIntradialitik = sessionStorage.getItem('from_tab');
        if (fromIntradialitik === 'intradialitik') {
            sessionStorage.removeItem('from_tab');
        }
        loadTableHD();

        // Toggle Gelang Identitas Alasan
        document.getElementById('gelang_belum').addEventListener('change', function() {
            document.getElementById('gelang_alasan_box').style.display = this.checked ? 'block' : 'none';
        });
        document.getElementById('gelang_sudah').addEventListener('change', function() {
            document.getElementById('gelang_alasan_box').style.display = 'none';
        });

        // Toggle Alergi Sebutkan
        document.getElementById('alergi_ya').addEventListener('change', function() {
            document.getElementById('alergi_sebutkan_box').style.display = this.checked ? 'block' : 'none';
        });
        document.getElementById('alergi_tidak').addEventListener('change', function() {
            document.getElementById('alergi_sebutkan_box').style.display = 'none';
        });

        // Toggle Gelang Alergi Alasan
        document.getElementById('gelang_alergi_belum').addEventListener('change', function() {
            document.getElementById('gelang_alergi_alasan_box').style.display = this.checked ? 'block' : 'none';
        });
        document.getElementById('gelang_alergi_sudah').addEventListener('change', function() {
            document.getElementById('gelang_alergi_alasan_box').style.display = 'none';
        });
    });

    function loadFormHD(id) {
        $.ajax({
            url: "<?= base_url() ?>Pemantauan_pelaksanaan_hemodialis_harian/get_by_id",
            method: "POST",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(res) {
                if (res.status === 'found') {
                    let hasil = res.data;
                    $.each(hasil, function(key, value) {
                        if ($('[name="' + key + '"]').is('input[type="text"], input[type="number"], input[type="hidden"], textarea')) {
                            $('[name="' + key + '"]').val(value);
                        }
                        if ($('[name="' + key + '"]').is('select')) {
                            $('[name="' + key + '"]').val(value).trigger('change');
                        }
                        if ($('[name="' + key + '"]').is('input[type="radio"]')) {
                            $('input[name="' + key + '"][value="' + value + '"]').prop('checked', true);
                        }
                        if ($('[name="' + key + '"]').is('input[type="checkbox"]')) {
                            $('[name="' + key + '"]').prop('checked', false);
                            if (value) {
                                let arr = value.split(',');
                                arr.forEach(val => {
                                    $('input[name="' + key + '"][value="' + val.trim() + '"]').prop('checked', true);
                                });
                            }
                        }
                    });
                }
            }
        });
    }

    function loadTableHD() {
        let id_history = $('#id_history').val();
        let id_pelayanan = $('#id_pelayanan').val();

        $.ajax({
            url: "<?= base_url() ?>Pemantauan_pelaksanaan_hemodialis_harian/get_data_pemantauan",
            method: "POST",
            dataType: 'json',
            data: {
                no_rm: $('#no_rm').val(),
                id_pelayanan: id_pelayanan,
                id_history: id_history
            },
            success: function(res) {
                let html = "";
                let no = 1;

                if (res.status === 'found') {
                    let data = res.data;
                    if (!Array.isArray(data)) {
                        data = [data];
                    }
                    data.forEach(item => {
                        html += `
                    <tr>
                        <td style="padding: 10px; text-align: center;">${no++}</td>
                        <td style="padding: 10px; text-align: center;">
                            <button class="btn btn-success btn-icon-anim btn square" onclick="pilih('${item.id}')" style="padding: 5px 10px; border: none; border-radius: 4px; background: #3cb878; color: white;">
                                <i class="icon-rocket"></i>
                            </button>
                        </td>
                        <td style="padding: 10px; text-align: center;">
                            <button class="btn btn-warning btn-icon-anim btn square" onclick="lanjutkan('${item.id}')" style="padding: 5px 10px; border: none; border-radius: 4px; background: #f39c12; color: white;">
                                <i class="icon-rocket"></i>
                            </button>
                        </td>
                        <td style="padding: 10px; text-align: center;">
                            <button class="btn btn-danger btn-icon-anim btn square" onclick="hapus('${item.id}')" style="padding: 5px 10px; border: none; border-radius: 4px; background: #e74c3c; color: white;">
                                <i class="icon-trash"></i>
                            </button>
                        </td>
                        <td style="padding: 10px; text-align: center;">
                            <button class="btn btn-info btn-icon-anim btn square" onclick="cetak('${item.id}', '${item.id_pelayanan}', '${item.id_history}')" style="padding: 5px 10px; border: none; border-radius: 4px; background: #3498db; color: white;">
                                <i class="fa fa-print"></i>
                            </button>
                        </td>
                        <td style="padding: 10px; text-align: center;">${item.no_rm ?? '-'}</td>
                        <td style="padding: 10px;">${item.nama_pasien ?? '-'}</td>
                        <td style="padding: 10px; text-align: center;">${formatTanggal(item.tgl_masuk)}</td>
                        <td style="padding: 10px; text-align: center;">${formatTanggal(item.tgl_simpan)}</td>
                    </tr>
                    `;
                    });
                } else {
                    html = `<tr><td colspan="9" class="text-center text-muted">Tidak ada data</td></tr>`;
                }

                $('#tabel_terapi tbody').html(html);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }

    function formatTanggal(datetime) {
        if (!datetime) return '-';
        let d = new Date(datetime);
        return d.toLocaleString('id-ID');
    }

    function cetak(id, id_pelayanan, id_history) {
        let url = "<?= base_url('Pemantauan_pelaksanaan_hemodialis_harian/cetak_pemantauan') ?>" +
            "/" + id +
            "/" + id_pelayanan +
            "/" + id_history;
        window.open(url, '_blank');
    }

    function simpan() {
        const formData = new FormData();

        document.querySelectorAll('input[name], select[name], textarea[name]').forEach(input => {
            if (input.type === 'radio' || input.type === 'checkbox') {
                if (input.checked) {
                    if (input.type === 'checkbox' && input.name === 'akses_jenis') {
                        const existing = formData.get(input.name);
                        formData.set(input.name, existing ? existing + ',' + input.value : input.value);
                    } else {
                        formData.set(input.name, input.value);
                    }
                }
            } else {
                formData.set(input.name, input.value);
            }
        });

        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });

        let mode = $('#mode').val();
        let id_edit = $('#id_edit').val();

        let url = "";
        if (mode === 'edit') {
            url = "<?= base_url() ?>Pemantauan_pelaksanaan_hemodialis_harian/update_data";
            data.id = id_edit;
        } else {
            url = "<?= base_url() ?>Pemantauan_pelaksanaan_hemodialis_harian/save";
        }

        swal({
            title: "Simpan Data Hemodialisis?",
            text: "Apakah Anda yakin ingin menyimpan data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Ya, Simpan",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: url,
                    method: "POST",
                    dataType: 'json',
                    data: data,
                    success: function(response) {
                        swal({
                            title: "Berhasil!",
                            text: response.message,
                            type: "success",
                            confirmButtonColor: "#3cb878"
                        });

                        $('#mode').val('insert');
                        $('#id_edit').val('');
                        loadTableHD();

                        $('#btnSimpan')
                            .html('<i class="fa fa-save"></i> SIMPAN DATA')
                            .removeClass('btn-warning')
                            .addClass('btn-success')
                            .attr('onclick', 'simpan()');
                    },
                    error: function() {
                        swal("Gagal!", "Terjadi kesalahan saat menyimpan data", "error");
                    }
                });
            }
        });
    }

    function pilih(id) {
        loadFormHD(id);

        $.ajax({
            url: "<?= base_url() ?>Pemantauan_pelaksanaan_hemodialis_harian/get_by_id",
            method: "POST",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(res) {
                if (res.status === 'found') {
                    let data = res.data;

                    $.each(data, function(key, value) {
                        if ($('[name="' + key + '"]').is('input[type="text"], input[type="number"], input[type="hidden"], textarea')) {
                            $('[name="' + key + '"]').val(value);
                        }
                        if ($('[name="' + key + '"]').is('select')) {
                            $('[name="' + key + '"]').val(value).trigger('change');
                        }
                        if ($('[name="' + key + '"]').is('input[type="radio"]')) {
                            $('input[name="' + key + '"][value="' + value + '"]').prop('checked', true);
                        }
                        if ($('[name="' + key + '"]').is('input[type="checkbox"]')) {
                            $('[name="' + key + '"]').prop('checked', false);
                            if (value) {
                                let arr = value.split(',');
                                arr.forEach(val => {
                                    $('input[name="' + key + '"][value="' + val.trim() + '"]').prop('checked', true);
                                });
                            }
                        }
                    });

                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });

                    $('#id_edit').val(id);
                    $('#mode').val('edit');

                    $('#btnSimpan')
                        .html('<i class="fa fa-edit"></i> EDIT DATA')
                        .removeClass('btn-success')
                        .addClass('btn-warning')
                        .attr('onclick', 'edit()');
                } else {
                    swal("Gagal!", "Data tidak ditemukan", "warning");
                }
            }
        });

        return false;
    }

    function edit() {
        const formData = new FormData();

        document.querySelectorAll('input[name], select[name], textarea[name]').forEach(input => {
            if (input.type === 'radio' || input.type === 'checkbox') {
                if (input.checked) {
                    if (input.type === 'checkbox' && input.name === 'akses_jenis') {
                        const existing = formData.get(input.name);
                        formData.set(input.name, existing ? existing + ',' + input.value : input.value);
                    } else {
                        formData.set(input.name, input.value);
                    }
                }
            } else {
                formData.set(input.name, input.value);
            }
        });

        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });

        let id = $('#id_edit').val();
        data.id = id;

        swal({
            title: "Update Data?",
            text: "Apakah Anda yakin ingin mengubah data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#f39c12",
            confirmButtonText: "Ya, Update",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "<?= base_url() ?>Pemantauan_pelaksanaan_hemodialis_harian/update_data",
                    method: "POST",
                    dataType: 'json',
                    data: data,
                    success: function(response) {
                        swal("Berhasil!", response.message, "success");
                        loadTableHD();

                        $('#mode').val('insert');
                        $('#id_edit').val('');

                        $('#btnSimpan')
                            .html('<i class="fa fa-save"></i> SIMPAN DATA')
                            .removeClass('btn-warning')
                            .addClass('btn-success')
                            .attr('onclick', 'simpan()');
                    },
                    error: function() {
                        swal("Gagal!", "Terjadi kesalahan saat update data", "error");
                    }
                });
            }
        });
    }

function lanjutkan(id) {
    loadFormHD(id);

    $.ajax({
        url: "<?= base_url() ?>Pemantauan_pelaksanaan_hemodialis_harian/get_by_id",
        method: "POST",
        dataType: 'json',
        data: {
            id: id
        },
        success: function(res) {
            if (res.status === 'found') {
                let data = res.data;

                $.each(data, function(key, value) {
                    if ($('[name="' + key + '"]').is('input[type="text"], input[type="number"], input[type="hidden"], textarea')) {
                        $('[name="' + key + '"]').val(value);
                    }
                    if ($('[name="' + key + '"]').is('select')) {
                        $('[name="' + key + '"]').val(value).trigger('change');
                    }
                    if ($('[name="' + key + '"]').is('input[type="radio"]')) {
                        $('input[name="' + key + '"][value="' + value + '"]').prop('checked', true);
                    }
                    if ($('[name="' + key + '"]').is('input[type="checkbox"]')) {
                        $('[name="' + key + '"]').prop('checked', false);
                        if (value) {
                            let arr = value.split(',');
                            arr.forEach(val => {
                                $('input[name="' + key + '"][value="' + val.trim() + '"]').prop('checked', true);
                            });
                        }
                    }
                });

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });

                // 🔥 PERUBAHAN DI SINI: SET MODE MENJADI 'edit'
                $('#id_edit').val(id);  // Set ID edit
                $('#mode').val('edit'); // Ubah mode menjadi edit

                // Ubah tombol menjadi EDIT DATA
                $('#btnSimpan')
                    .html('<i class="fa fa-edit"></i> EDIT DATA')
                    .removeClass('btn-success')
                    .addClass('btn-warning')
                    .attr('onclick', 'edit()');
            } else {
                swal("Gagal!", "Data tidak ditemukan", "warning");
            }
        }
    });

    return false;
}

    function hapus(id) {
        swal({
            title: "Hapus Data?",
            text: "Data yang dihapus tidak bisa dikembalikan!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#e74c3c",
            confirmButtonText: "Ya, Hapus",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "<?= base_url() ?>Pemantauan_pelaksanaan_hemodialis_harian/delete_data",
                    method: "POST",
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(res) {
                        swal("Berhasil!", "Data berhasil dihapus", "success");
                        loadTableHD();
                    },
                    error: function() {
                        swal("Gagal!", "Terjadi kesalahan saat menghapus data", "error");
                    }
                });
            }
        });
    }

    // 🔧 FUNGSI PINDAH KE HALAMAN INTRADIALITIK
    function goToIntradialitik(event) {
        if (event) {
            event.preventDefault();
        }

        let id_pelayanan = $('#id_pelayanan').val();
        let id_history = $('#id_history').val();
        let no_rm = $('#inNoRm').val();

        if (!id_pelayanan || !id_history) {
            if (typeof swal === 'function') {
                swal("Info", "Data pelayanan belum lengkap", "info");
            } else {
                alert('Data pelayanan belum lengkap!');
            }
            return;
        }

        sessionStorage.setItem('from_tab', 'hd_harian');
        sessionStorage.setItem('id_pelayanan', id_pelayanan);
        sessionStorage.setItem('id_history', id_history);
        sessionStorage.setItem('no_rm', no_rm);

        let url = "<?= base_url('Erm_pemantauan_intradialitik/form') ?>" +
            "?id_pelayanan=" + encodeURIComponent(id_pelayanan) +
            "&id_history=" + encodeURIComponent(id_history) +
            "&no_rm=" + encodeURIComponent(no_rm);

        window.location.href = url;
    }
</script>