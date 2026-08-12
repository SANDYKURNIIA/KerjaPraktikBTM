<<<<<<< HEAD
<div class="page_content">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h2 class="panel-title txt-dark"><strong>KESIMPULAN KLINIS</strong></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <h4 class="panel-title txt-dark"><b><strong>DATA PASIEN</strong></b></h4>



                                <div class="row mt-20">
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">NIK</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="nik_npp" value="<?php echo $data_mcu['no_ktp']; ?>" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Nama Lengkap</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="inName" disabled=""
                                                    value="<?php echo $data_mcu['nama_pasien']; ?>">
                                                <p id="namefull" style="font-size:12px; margin-top:5px;"></p>
                                                <input type="hidden" id="intanggalmasuk"
                                                    value="<?php echo date('Y-m-d H:i:s'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Jenis Kelamin</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="inJK" value="<?php echo $data_mcu['jenis_kelamin']; ?>" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">No Panduan</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="no_panduan" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Umur</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" disabled="" class="form-control" value="<?php
                                                                                                            setlocale(LC_ALL, 'id_ID');
                                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                                            $time = strtotime($data_mcu['tgl_lahir']);
                                                                                                            $date = strftime("%d %B %Y", $time);
                                                                                                            echo getAge($date)
                                                                                                            ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h4 class="panel-title txt-dark"><b><strong>Kesimpulan Klinis</strong></b></h4>
                                <hr>

                                <table border=1 class="table table-bordered display product-overview mb-30" id="support_table">
                                    <tbody>


                                        <tr>
                                            <td>KELEBIHAN BERAT BADAN TINGKAT (IMT : <font id="v_imt"></font>)</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kelebihan_bb" id="kelebihan_bb" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kelebihan_bb_simpan" id="kelebihan_bb_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kelebihan_bb_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kelebihan_bb_simpan" id="kelebihan_bb_simpan2" value="Ya" class="rad1" />
                                                            <label for="kelebihan_bb_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>OBESITAS SENTRAL (RPP: <font id="v_rpp"></font>) RPP</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="obesitas_sentral" id="obesitas_sentral" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="obesitas_sentral_simpan" id="obesitas_sentral_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="obesitas_sentral_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="obesitas_sentral_simpan" id="obesitas_sentral_simpan2" value="Ya" class="rad1" />
                                                            <label for="obesitas_sentral_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>TEKANAN DARAH: <font id="v_tekanan_darah"></font> mmHg</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="tekanan_darah" id="tekanan_darah" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="tekanan_darah_simpan" id="tekanan_darah_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="tekanan_darah_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="tekanan_darah_simpan" id="tekanan_darah_simpan2" value="Ya" class="rad1" />
                                                            <label for="tekanan_darah_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>KESIMPULAN: <font id="v_kesimpulan"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_antropometri" id="kesimpulan_antropometri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_antropometri_simpan" id="kesimpulan_antropometri_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_antropometri_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_antropometri_simpan" id="kesimpulan_antropometri_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_antropometri_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>OS: -spesialis mata- </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="os" id="os" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="os_simpan" id="os_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="os_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="os_simpan" id="os_simpan2" value="Ya" class="rad1" />
                                                            <label for="os_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>OD: -spesialis mata-</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="od" id="od" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="od_simpan" id="od_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="od_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="od_simpan" id="od_simpan2" value="Ya" class="rad1" />
                                                            <label for="od_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Step Test (Harvard): <font id="v_skor_step"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="step_test" id="step_test" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="step_test_simpan" id="step_test_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="step_test_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="step_test_simpan" id="step_test_simpan2" value="Ya" class="rad1" />
                                                            <label for="step_test_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">KEADAAN UMUM</td>
                                        </tr>
                                        <tr id="keadaan_umum" class="collapse">
                                            <td>Catatan Umum : <font id="v_keadaan_umum"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_keadaan_umum" id="kesimpulan_keadaan_umum" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_keadaan_umum_simpan" id="kesimpulan_keadaan_umum_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_keadaan_umum_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_keadaan_umum_simpan" id="kesimpulan_keadaan_umum_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_keadaan_umum_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">MATA</td>
                                        </tr>
                                        <tr id="mata" class="collapse">
                                            <td>Catatan : <font id="v_mata"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_mata" id="kesimpulan_mata" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_mata_simpan" id="kesimpulan_mata_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_mata_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_mata_simpan" id="kesimpulan_mata_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_mata_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">THT</td>
                                        </tr>
                                        <tr id="tht" class="collapse">
                                            <td>Catatan : <font id="v_tht"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_tht" id="kesimpulan_tht" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_tht_simpan" id="kesimpulan_tht_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_tht_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_tht_simpan" id="kesimpulan_tht_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_tht_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">LEHER</td>
                                        </tr>
                                        <tr id="leher" class="collapse">
                                            <td>Catatan : <font id="v_leher"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_leher" id="kesimpulan_leher" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_leher_simpan" id="kesimpulan_leher_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_leher_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_leher_simpan" id="kesimpulan_leher_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_leher_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">DADA</td>
                                        </tr>
                                        <tr id="dada" class="collapse">
                                            <td>Catatan : <font id="v_dada"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_dada" id="kesimpulan_dada" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_dada_simpan" id="kesimpulan_dada_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_dada_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_dada_simpan" id="kesimpulan_dada_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_dada_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">PARU</td>
                                        </tr>
                                        <tr id="paru" class="collapse">
                                            <td>Catatan : <font id="v_paru"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_paru" id="kesimpulan_paru" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_paru_simpan" id="kesimpulan_paru_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_paru_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_paru_simpan" id="kesimpulan_paru_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_paru_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">JANTUNG</td>
                                        </tr>
                                        <tr id="jantung" class="collapse">
                                            <td>Catatan : <font id="v_jantung"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_jantung" id="kesimpulan_jantung" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_jantung_simpan" id="kesimpulan_jantung_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_jantung_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_jantung_simpan" id="kesimpulan_jantung_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_jantung_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">RONGGA PERUT</td>
                                        </tr>
                                        <tr id="rongga_perut" class="collapse">
                                            <td>Catatan : <font id="v_rongga_perut"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_rongga_perut" id="kesimpulan_rongga_perut" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_rongga_perut_simpan" id="kesimpulan_rongga_perut_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_rongga_perut_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_rongga_perut_simpan" id="kesimpulan_rongga_perut_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_rongga_perut_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">UROGENITAL</td>
                                        </tr>
                                        <tr id="urogenital" class="collapse">
                                            <td>Catatan : <font id="v_urogenital"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_urogenital" id="kesimpulan_urogenital" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_urogenital_simpan" id="kesimpulan_urogenital_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_urogenital_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_urogenital_simpan" id="kesimpulan_urogenital_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_urogenital_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">ANGGOTA GERAK</td>
                                        </tr>
                                        <tr id="anggota_gerak" class="collapse">
                                            <td>Catatan : <font id="v_anggota_gerak"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_anggota_gerak" id="kesimpulan_anggota_gerak" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_anggota_gerak_simpan" id="kesimpulan_anggota_gerak_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_anggota_gerak_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_anggota_gerak_simpan" id="kesimpulan_anggota_gerak_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_anggota_gerak_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">NEUROLOGIS</td>
                                        </tr>
                                        <tr id="neurologis" class="collapse">
                                            <td>Catatan : <font id="v_neurologis"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_neurologis" id="kesimpulan_neurologis" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_neurologis_simpan" id="kesimpulan_neurologis_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_neurologis_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_neurologis_simpan" id="kesimpulan_neurologis_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_neurologis_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">GIGI GELIGI</td>
                                        </tr>
                                        <tr id="gigi_geligi" class="collapse">
                                            <td>Kesimpulan : <font id="v_gigi_geligi"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_gigi_geligi" id="kesimpulan_gigi_geligi" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_gigi_geligi_simpan" id="kesimpulan_gigi_geligi_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_gigi_geligi_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_gigi_geligi_simpan" id="kesimpulan_gigi_geligi_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_gigi_geligi_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">KARDIOLOGI</td>
                                        </tr>
                                        <tr id="kardiologi" class="collapse">
                                            <td>Kesimpulan : <font id="v_kardiologi"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_kardiologi" id="kesimpulan_kardiologi" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_kardiologi_simpan" id="kesimpulan_kardiologi_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_kardiologi_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_kardiologi_simpan" id="kesimpulan_kardiologi_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_kardiologi_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">THT SPESIALIS</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">1.Telinga</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">2.Hidung</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">3.Tenggorokan</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">4.Larynx</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">5.Audiometri</td>
                                        </tr>
                                        <tr id="tht_spesialis" class="collapse">
                                            <td>Kesimpulan : <font id="v_tht_spesialis"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_tht_spesialis" id="kesimpulan_tht_spesialis" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_tht_spesialis_simpan" id="kesimpulan_tht_spesialis_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_tht_spesialis_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_tht_spesialis_simpan" id="kesimpulan_tht_spesialis_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_tht_spesialis_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">AUDIOMETRI</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">a.Telinga Kanan</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">b.Telinga Kiri</td>
                                        </tr>
                                        <tr id="audiometri" class="collapse">
                                            <td>Kesimpulan : <font id="v_audiometri"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_audiometri" id="kesimpulan_audiometri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_audiometri_simpan" id="kesimpulan_audiometri_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_audiometri_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_audiometri_simpan" id="kesimpulan_audiometri_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_audiometri_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">PARU</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">a.Infeksi</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">b.Palpasi</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">c.Perkusi</td>
                                        </tr>
                                        <tr id="paru_spesialis" class="collapse">
                                            <td>Kesimpulan : <font id="v_paru_spesialis"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_paru_spesialis" id="kesimpulan_paru_spesialis" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_paru_spesialis_simpan" id="kesimpulan_paru_spesialis_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_paru_spesialis_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_paru_spesialis_simpan" id="kesimpulan_paru_spesialis_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_paru_spesialis_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">SPIROMETRI</td>
                                        </tr>
                                        <tr id="spirometri" class="collapse">
                                            <td>Kesimpulan : <font id="v_spirometri"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_spirometri" id="kesimpulan_spirometri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_spirometri_simpan" id="kesimpulan_spirometri_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_spirometri_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_spirometri_simpan" id="kesimpulan_spirometri_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_spirometri_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">MATA SPESIALIS</td>
                                        </tr>
                                        <tr id="mata_spesialis" class="collapse">
                                            <td>Kesimpulan : <font id="v_mata_spesialis"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_mata_spesialis" id="kesimpulan_mata_spesialis" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_mata_spesialis_simpan" id="kesimpulan_mata_spesialis_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_mata_spesialis_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_mata_spesialis_simpan" id="kesimpulan_mata_spesialis_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_mata_spesialis_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">NEUROLOGI SPESIALIS</td>
                                        </tr>
                                        <tr id="neurologi_spesialis" class="collapse">
                                            <td>Kesimpulan : <font id="v_neurologi_spesialis"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_neurologi_spesialis" id="kesimpulan_neurologi_spesialis" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_neurologi_spesialis_simpan" id="kesimpulan_neurologi_spesialis_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_neurologi_spesialis_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_neurologi_spesialis_simpan" id="kesimpulan_neurologi_spesialis_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_neurologi_spesialis_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">BEDAH</td>
                                        </tr>
                                        <tr id="bedah" class="collapse">
                                            <td>Kesimpulan : <font id="v_bedah"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_bedah" id="kesimpulan_bedah" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_bedah_simpan" id="kesimpulan_bedah_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_bedah_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_bedah_simpan" id="kesimpulan_bedah_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_bedah_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">KEBIDANAN</td>
                                        </tr>
                                        <tr id="kebidanan" class="collapse">
                                            <td>Kesimpulan : <font id="v_kebidanan"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_kebidanan" id="kesimpulan_kebidanan" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_kebidanan_simpan" id="kesimpulan_kebidanan_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_kebidanan_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_kebidanan_simpan" id="kesimpulan_kebidanan_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_kebidanan_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">LABORATORIUM</td>
                                        </tr>

                                        <tr>
                                            <td colspan="3">
                                                <div class="hasil_labor col-md-12">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="3">RADIOLOGI</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="expertise col-md-12">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u>Saran Klinis</u></p>
                                        </label>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="checkbox checkbox-primary">
                                            <input id="saran_klinis1" type="checkbox" name="saran_klinis" value="PERTAHANKAN KESEHATAN ANDA">
                                            <label class="control-label" for="saran_klinis1">
                                                PERTAHANKAN KESEHATAN ANDA
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="saran_klinis2" type="checkbox" name="saran_klinis" value="TINGKATKAN KESEHATAN ANDA">
                                            <label class="control-label" for="saran_klinis2">
                                                TINGKATKAN KESEHATAN ANDA
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="saran_klinis3" type="checkbox" name="saran_klinis" value="OLAHRAGA TERATUR DAN TERUKUR (AEROBIK 3-4 KALI SEMINGGU @ 15 MENIT)">
                                            <label class="control-label" for="saran_klinis3">
                                                OLAHRAGA TERATUR DAN TERUKUR (AEROBIK 3-4 KALI SEMINGGU @ 15 MENIT)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkbox checkbox-primary">
                                            <input id="saran_klinis4" type="checkbox" name="saran_klinis" value="MINUM AIR PUTIH 8 GELAS/HARI">
                                            <label class="control-label" for="saran_klinis4">
                                                MINUM AIR PUTIH 8 GELAS/HARI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="saran_klinis5" type="checkbox" name="saran_klinis" value="Lainnya">
                                            <label class="control-label" for="saran_klinis5">
                                                Lainnya :
                                            </label>
                                            <div class="has-success">
                                                <input type="text" class="form-control" id="saran_klinis" value="" style="display: block;">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u>Kurangi</u></p>
                                        </label>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi1" type="checkbox" name="kurangi" value="ROKOK">
                                            <label class="control-label" for="kurangi1">
                                                ROKOK
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi2" type="checkbox" name="kurangi" value="MAKANAN ASAM-ASAM">
                                            <label class="control-label" for="kurangi2">
                                                MAKANAN ASAM-ASAM
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi3" type="checkbox" name="kurangi" value="MINUMAN BERALKOHOL">
                                            <label class="control-label" for="kurangi3">
                                                MINUMAN BERALKOHOL
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi4" type="checkbox" name="kurangi" value="MAKANAN ASIN-ASIN">
                                            <label class="control-label" for="kurangi4">
                                                MAKANAN ASIN-ASIN
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi5" type="checkbox" name="kurangi" value="MAKANAN PEDAS">
                                            <label class="control-label" for="kurangi5">
                                                MAKANAN PEDAS
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi6" type="checkbox" name="kurangi" value="MAKANAN MANIS-MANIS">
                                            <label class="control-label" for="kurangi6">
                                                MAKANAN MANIS-MANIS
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi7" type="checkbox" name="kurangi" value="MAKANAN BANYAK LEMAK/GAJIH">
                                            <label class="control-label" for="kurangi7">
                                                MAKANAN BANYAK LEMAK/GAJIH
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi8" type="checkbox" name="kurangi" value="MAKANAN JEROAN,EMPING/MELINJO/KACANG-KACANGAN">
                                            <label class="control-label" for="kurangi8">
                                                MAKANAN JEROAN, EMPING/MELINJO/KACANG-KACANGAN
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi9" type="checkbox" name="kurangi" value="Lainnya">
                                            <label class="control-label" for="kurangi9">
                                                Lainnya :
                                            </label>
                                            <div class="has-success">
                                                <input type="text" class="form-control" id="kurangi" value="" style="display: block;">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u>Konsultasikan Kesehatan Anda Kepada</u></p>
                                        </label>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke1" type="checkbox" name="konsul_ke" value="AHLI GIZI">
                                            <label class="control-label" for="konsul_ke1">
                                                AHLI GIZI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke2" type="checkbox" name="konsul_ke" value="ANDROLOGI">
                                            <label class="control-label" for="konsul_ke2">
                                                ANDROLOGI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke3" type="checkbox" name="konsul_ke" value="BEDAH DIGESTIF">
                                            <label class="control-label" for="konsul_ke3">
                                                BEDAH DIGESTIF
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke4" type="checkbox" name="konsul_ke" value="BEDAH MULUT">
                                            <label class="control-label" for="konsul_ke4">
                                                BEDAH MULUT
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke5" type="checkbox" name="konsul_ke" value="BEDAH SYARAF">
                                            <label class="control-label" for="konsul_ke5">
                                                BEDAH SYARAF
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke6" type="checkbox" name="konsul_ke" value="BEDAH TULANG">
                                            <label class="control-label" for="konsul_ke6">
                                                BEDAH TULANG
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke7" type="checkbox" name="konsul_ke" value="BEDAH UMUM">
                                            <label class="control-label" for="konsul_ke7">
                                                BEDAH UMUM
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke8" type="checkbox" name="konsul_ke" value="FISIOTERAPIS">
                                            <label class="control-label" for="konsul_ke8">
                                                FISIOTERAPIS
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke9" type="checkbox" name="konsul_ke" value="GASTROENTEROLOGIST">
                                            <label class="control-label" for="konsul_ke9">
                                                GASTROENTEROLOGIST
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke10" type="checkbox" name="konsul_ke" value="GIGI">
                                            <label class="control-label" for="konsul_ke10">
                                                GIGI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke11" type="checkbox" name="konsul_ke" value="JANTUNG DAN PEMBULUH DARAH">
                                            <label class="control-label" for="konsul_ke11">
                                                JANTUNG DAN PEMBULUH DARAH
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke12" type="checkbox" name="konsul_ke" value="KEBIDANAN DAN KANDUNGAN">
                                            <label class="control-label" for="konsul_ke12">
                                                KEBIDANAN DAN KANDUNGAN
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke13" type="checkbox" name="konsul_ke" value="KONSERVASI GIGI">
                                            <label class="control-label" for="konsul_ke13">
                                                KONSERVASI GIGI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke14" type="checkbox" name="konsul_ke" value="KULIT DAN KELAMIN">
                                            <label class="control-label" for="konsul_ke14">
                                                KULIT DAN KELAMIN
                                            </label>
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke15" type="checkbox" name="konsul_ke" value="MATA">
                                            <label class="control-label" for="konsul_ke15">
                                                MATA
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke16" type="checkbox" name="konsul_ke" value="NEUROLOGI">
                                            <label class="control-label" for="konsul_ke16">
                                                NEUROLOGI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke17" type="checkbox" name="konsul_ke" value="OKUPASI">
                                            <label class="control-label" for="konsul_ke17">
                                                OKUPASI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke18" type="checkbox" name="konsul_ke" value="PARU">
                                            <label class="control-label" for="konsul_ke18">
                                                PARU
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke19" type="checkbox" name="konsul_ke" value="PENYAKIT DALAM">
                                            <label class="control-label" for="konsul_ke19">
                                                PENYAKIT DALAM
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke20" type="checkbox" name="konsul_ke" value="PSIKIATRI">
                                            <label class="control-label" for="konsul_ke20">
                                                PSIKIATRI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke21" type="checkbox" name="konsul_ke" value="PSIKOLOGI">
                                            <label class="control-label" for="konsul_ke21">
                                                PSIKOLOGI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke22" type="checkbox" name="konsul_ke" value="REHABILITASI">
                                            <label class="control-label" for="konsul_ke22">
                                                REHABILITASI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke23" type="checkbox" name="konsul_ke" value="SYARAF">
                                            <label class="control-label" for="konsul_ke23">
                                                SYARAF
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke24" type="checkbox" name="konsul_ke" value="TERAPI OKUPASI">
                                            <label class="control-label" for="konsul_ke24">
                                                TERAPI OKUPASI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke25" type="checkbox" name="konsul_ke" value="THT">
                                            <label class="control-label" for="konsul_ke25">
                                                THT
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke26" type="checkbox" name="konsul_ke" value="UMUM">
                                            <label class="control-label" for="konsul_ke26">
                                                UMUM
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke27" type="checkbox" name="konsul_ke" value="UROLOGI">
                                            <label class="control-label" for="konsul_ke27">
                                                UROLOGI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke28" type="checkbox" name="konsul_ke" value="Lainnya">
                                            <label class="control-label" for="konsul_ke28">
                                                Lainnya :
                                            </label>
                                            <div class="has-success">
                                                <input type="text" class="form-control" id="konsul_ke" value="" style="display: block;">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u>Ulangi Pemeriksaan</u></p>
                                        </label>
                                        <div class="form-group">
                                            <input type="radio" id="ulangi_pemeriksaan1" name="ulangi_pemeriksaan" value="2 Minggu Lagi">
                                            <label class="control-label" for="ulangi_pemeriksaan1">2 Minggu Lagi</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="ulangi_pemeriksaan2" name="ulangi_pemeriksaan" value="1 Bulan Lagi">
                                            <label class="control-label" for="ulangi_pemeriksaan2">1 Bulan Lagi</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="ulangi_pemeriksaan3" name="ulangi_pemeriksaan" value="2 Bulan Lagi">
                                            <label class="control-label" for="ulangi_pemeriksaan3">2 Bulan Lagi</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u>Pemeriksaan Yang Akan Dilakukan</u></p>
                                        </label>
                                        <div class="form-group">
                                            <input type="text" data-role="tagsinput" class="form-control" id="pemeriksaan_lanjut" placeholder="Isi Pemeriksaan Yang Akan Dilakukan">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer mb-5 mr-5 mt-10">
                                    <input type="hidden" id="id_mcu" value="<?php echo $data_mcu['id_mcu']; ?>">
                                    <button onclick="insertData()" class="btn btn-success btn-anim  btn-sm"><i
                                            class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->


                </div>
                <!-- /Main Content -->

            </div>
        </div>
    </div>

</div>
<script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

<style>
    tr {
        color: black;
    }

    td {
        color: black;
    }

    th {
        color: black;
    }

    .has-success input.form-control[data-role="tagsinput"] {
        font-size: 20px;
        /* Contoh: ukuran font 16 piksel */
        color: black !important;
    }

    .with-padding td {
        /* Jika Anda ingin padding di dalam sel */
        padding-top: 4px;
        padding-bottom: 4px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {


    });
    $(document).ready(function() {
        id_pelayanan = $('#id_mcu').val();
        $.ajax({
            url: "<?php echo base_url() ?>Kesimpulan_mcu/get_data_pemeriksaan",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
            },
            success: function(data) {
                if (data.status_dt == 'found') {

                    $('#v_imt').html(data.imt);
                    $('#v_rpp').html(data.rpp);
                    $('#v_tekanan_darah').html(data.sistol + '/' + data.diastol);
                    $('#v_kesimpulan').html(data.kesimpulan_umum);
                    $('#v_skor_step').html(data.skor_step);
                    if (data.cttn_keadaan_umum !== null && data.cttn_keadaan_umum !== '') {
                        $('#keadaan_umum').collapse('show');
                        $('#v_keadaan_umum').html(data.cttn_keadaan_umum);
                    }
                    if (data.cttn_mata !== null && data.cttn_mata !== '') {
                        $('#mata').collapse('show');
                        $('#v_mata').html(data.cttn_mata);
                    }
                    if (data.cttn_tht !== null && data.cttn_tht !== '') {
                        $('#tht').collapse('show');
                        $('#v_tht').html(data.cttn_tht);
                    }
                    if (data.cttn_leher !== null && data.cttn_leher !== '') {
                        $('#leher').collapse('show');
                        $('#v_leher').html(data.cttn_leher);
                    }

                    if (data.cttn_dada !== null && data.cttn_dada !== '') {
                        $('#dada').collapse('show');
                        $('#v_dada').html(data.cttn_dada);
                    }

                    if (data.cttn_paru !== null && data.cttn_paru !== '') {
                        $('#paru').collapse('show');
                        $('#v_paru').html(data.cttn_paru);
                    }

                    if (data.cttn_jantung !== null && data.cttn_jantung !== '') {
                        $('#jantung').collapse('show');
                        $('#v_jantung').html(data.cttn_jantung);
                    }

                    if (data.cttn_perut !== null && data.cttn_perut !== '') {
                        $('#rongga_perut').collapse('show');
                        $('#v_rongga_perut').html(data.cttn_perut);
                    }

                    if (data.cttn_urogenital !== null && data.cttn_urogenital !== '') {
                        $('#urogenital').collapse('show');
                        $('#v_urogenital').html(data.cttn_urogenital);
                    }

                    if (data.cttn_anggota_gerak !== null && data.cttn_anggota_gerak !== '') {
                        $('#anggota_gerak').collapse('show');
                        $('#v_anggota_gerak').html(data.cttn_anggota_gerak);
                    }

                    if (data.cttn_neurologi !== null && data.cttn_neurologi !== '') {
                        $('#neurologis').collapse('show');
                        $('#v_neurologis').html(data.cttn_neurologi);
                    }

                }
            }

        });
        $.ajax({
            url: "<?php echo base_url() ?>Kesimpulan_mcu/get_data_labor",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
            },
            success: function(laborValue) {
                if (laborValue.status_dt == 'found') {
                    let hasil_labor = document.querySelector('.hasil_labor');
                    const tableBody = document.createElement('table');
                    tableBody.classList.add('table', 'with-padding');

                    Object.keys(laborValue).forEach(function(key) {
                        if (key !== 'status_dt') {
                            // var data = laborValue[key]; // 'data' akan berisi object untuk index '0' atau '1'
                            // console.log("Index:", key);
                            // console.log("Data:", data);
                            const data = laborValue[key];
                            // console.log("Data:", data);

                            const tr = document.createElement('tr');
                            tr.style.padding = '10px';
                            tr.id = 'hasil_labor_' + key; // Membuat ID unik untuk setiap baris
                            tr.classList.add('labor_row');

                            const td1 = document.createElement('td');
                            td1.innerHTML = `<strong>${data.GROUP}</strong> : ${data.TESTNAME} (${data.VALUE} ${data.TESTUNIT})`;
                            td1.id = 'pemeriksaan_' + key;

                            const td2 = document.createElement('td');
                            const tableInput = document.createElement('table');
                            const trInput = document.createElement('tr');
                            const tdInput = document.createElement('td');
                            const inputKesimpulan = document.createElement('input');
                            inputKesimpulan.type = 'text';
                            inputKesimpulan.name = 'kesimpulan_labor';
                            inputKesimpulan.id = `kesimpulan_labor_${key}`;
                            tdInput.appendChild(inputKesimpulan);
                            trInput.appendChild(tdInput);
                            tableInput.appendChild(trInput);
                            td2.appendChild(tableInput);

                            const td3 = document.createElement('td');
                            const tableRadio = document.createElement('table');
                            const trRadio = document.createElement('tr');

                            const tdRadio1 = document.createElement('td');
                            tdRadio1.width = '100px';
                            const radioTidak = document.createElement('input');
                            radioTidak.type = 'radio';
                            radioTidak.name = 'kesimpulan_labor_simpan_' + key; // Membuat nama radio unik per baris
                            radioTidak.id = `kesimpulan_labor_simpan_no_${key}`;
                            radioTidak.value = 'Tidak';
                            radioTidak.className = 'rad1';
                            radioTidak.checked = true;
                            const labelTidak = document.createElement('label');
                            labelTidak.setAttribute('for', `kesimpulan_labor_simpan_no_${key}`);
                            labelTidak.textContent = 'Tidak';
                            tdRadio1.appendChild(radioTidak);
                            tdRadio1.appendChild(labelTidak);
                            trRadio.appendChild(tdRadio1);

                            const tdRadio2 = document.createElement('td');
                            const radioYa = document.createElement('input');
                            radioYa.type = 'radio';
                            radioYa.name = 'kesimpulan_labor_simpan_' + key; // Membuat nama radio unik per baris
                            radioYa.id = `kesimpulan_labor_simpan_yes_${key}`;
                            radioYa.value = 'Ya';
                            radioYa.className = 'rad1';
                            const labelYa = document.createElement('label');
                            labelYa.setAttribute('for', `kesimpulan_labor_simpan_yes_${key}`);
                            labelYa.textContent = 'Simpan';
                            tdRadio2.appendChild(radioYa);
                            tdRadio2.appendChild(labelYa);
                            trRadio.appendChild(tdRadio2);

                            tableRadio.appendChild(trRadio);
                            td3.appendChild(tableRadio);

                            tr.appendChild(td1);
                            tr.appendChild(td2);
                            tr.appendChild(td3);
                            tableBody.appendChild(tr);
                        }
                    });

                    hasil_labor.appendChild(tableBody);

                }
            }

        });

        $.ajax({
            url: "<?php echo base_url() ?>Kesimpulan_mcu/get_data_expertise",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
            },
            success: function(expertise_respon) {
                if (expertise_respon.status_dt == 'found') {
                    let expertise = document.querySelector('.expertise');
                    const tableBody = document.createElement('table');
                    tableBody.classList.add('table', 'with-padding');

                    Object.keys(expertise_respon).forEach(function(key) {
                        if (key !== 'status_dt') {
                            var data = expertise_respon[key];
                            const tr = document.createElement('tr');
                            tr.style.padding = '10px';
                            tr.id = 'hasil_radiologi_' + key; // Membuat ID unik untuk setiap baris
                            tr.classList.add('radiologi_row');

                            const td1 = document.createElement('td');
                            td1.innerHTML = `<strong>${data.nama}</strong> : ${data.hasil_pemeriksaan} `;
                            td1.width = '50%';
                            td1.id = 'pemeriksaan_radiologi_' + key;

                            const td2 = document.createElement('td');
                            const tableInput = document.createElement('table');
                            const trInput = document.createElement('tr');
                            const tdInput = document.createElement('td');
                            const inputKesimpulan = document.createElement('input');
                            inputKesimpulan.type = 'text';
                            inputKesimpulan.name = 'kesimpulan_radiologi';
                            inputKesimpulan.id = `kesimpulan_radiologi_${key}`;
                            tdInput.appendChild(inputKesimpulan);
                            trInput.appendChild(tdInput);
                            tableInput.appendChild(trInput);
                            td2.appendChild(tableInput);

                            const td3 = document.createElement('td');
                            const tableRadio = document.createElement('table');
                            const trRadio = document.createElement('tr');

                            const tdRadio1 = document.createElement('td');
                            tdRadio1.width = '100px';
                            const radioTidak = document.createElement('input');
                            radioTidak.type = 'radio';
                            radioTidak.name = 'kesimpulan_radiologi_simpan_' + key; // Membuat nama radio unik per baris
                            radioTidak.id = `kesimpulan_radiologi_simpan_no_${key}`;
                            radioTidak.value = 'Tidak';
                            radioTidak.className = 'rad1';
                            radioTidak.checked = true;
                            const labelTidak = document.createElement('label');
                            labelTidak.setAttribute('for', `kesimpulan_radiologi_simpan_no_${key}`);
                            labelTidak.textContent = 'Tidak';
                            tdRadio1.appendChild(radioTidak);
                            tdRadio1.appendChild(labelTidak);
                            trRadio.appendChild(tdRadio1);

                            const tdRadio2 = document.createElement('td');
                            const radioYa = document.createElement('input');
                            radioYa.type = 'radio';
                            radioYa.name = 'kesimpulan_radiologi_simpan_' + key; // Membuat nama radio unik per baris
                            radioYa.id = `kesimpulan_radiologi_simpan_yes_${key}`;
                            radioYa.value = 'Ya';
                            radioYa.className = 'rad1';
                            const labelYa = document.createElement('label');
                            labelYa.setAttribute('for', `kesimpulan_radiologi_simpan_yes_${key}`);
                            labelYa.textContent = 'Simpan';
                            tdRadio2.appendChild(radioYa);
                            tdRadio2.appendChild(labelYa);
                            trRadio.appendChild(tdRadio2);

                            tableRadio.appendChild(trRadio);
                            td3.appendChild(tableRadio);

                            tr.appendChild(td1);
                            tr.appendChild(td2);
                            tr.appendChild(td3);
                            tableBody.appendChild(tr);
                        }
                    });
                    expertise.appendChild(tableBody);

                }
            }
        });
    });
</script>

<script type="text/javascript">
    function insertData() {

        KelebihanBB = ($('input[name="kelebihan_bb_simpan"]:checked').val() === "Ya") ? $('#kelebihan_bb').val() : "";
        ObesitasSentral = ($('input[name="obesitas_sentral_simpan"]:checked').val() === "Ya") ? $('#obesitas_sentral').val() : "";
        TekananDarah = ($('input[name="tekanan_darah_simpan"]:checked').val() === "Ya") ? $('#tekanan_darah').val() : "";
        KesimpulanAntropometri = ($('input[name="kesimpulan_antropometri_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_antropometri').val() : "";
        Os = ($('input[name="os_simpan"]:checked').val() === "Ya") ? $('#os').val() : "";
        Od = ($('input[name="od_simpan"]:checked').val() === "Ya") ? $('#od').val() : "";
        StepTest = ($('input[name="step_test_simpan"]:checked').val() === "Ya") ? $('#step_test').val() : "";
        KesimpulanKeadaanUmum = ($('input[name="kesimpulan_keadaan_umum_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_keadaan_umum').val() : "";
        KesimpulanMata = ($('input[name="kesimpulan_mata_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_mata').val() : "";
        KesimpulanTht = ($('input[name="kesimpulan_tht_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_tht').val() : "";
        KesimpulanLeher = ($('input[name="kesimpulan_leher_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_leher').val() : "";
        KesimpulanDada = ($('input[name="kesimpulan_dada_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_dada').val() : "";
        KesimpulanParu = ($('input[name="kesimpulan_paru_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_paru').val() : "";
        KesimpulanJantung = ($('input[name="kesimpulan_jantung_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_jantung').val() : "";
        KesimpulanRonggaPerut = ($('input[name="kesimpulan_rongga_perut_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_rongga_perut').val() : "";
        KesimpulanUrogenital = ($('input[name="kesimpulan_urogenital_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_urogenital').val() : "";
        KesimpulanAnggotaGerak = ($('input[name="kesimpulan_anggota_gerak_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_anggota_gerak').val() : "";
        KesimpulanNeurologis = ($('input[name="kesimpulan_neurologis_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_neurologis').val() : "";
        KesimpulanGigiGeligi = ($('input[name="kesimpulan_gigi_geligi_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_gigi_geligi').val() : "";
        KesimpulanKardiologi = ($('input[name="kesimpulan_kardiologi_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_kardiologi').val() : "";
        KesimpulanThtSpesialis = ($('input[name="kesimpulan_tht_spesialis_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_tht_spesialis').val() : "";
        KesimpulanAudiometri = ($('input[name="kesimpulan_audiometri_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_audiometri').val() : "";
        KesimpulanParuSpesialis = ($('input[name="kesimpulan_paru_spesialis_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_paru_spesialis').val() : "";
        KesimpulanSpirometri = ($('input[name="kesimpulan_spirometri_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_spirometri').val() : "";
        KesimpulanMataSpesialis = ($('input[name="kesimpulan_mata_spesialis_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_mata_spesialis').val() : "";
        KesimpulanNeurologiSpesialis = ($('input[name="kesimpulan_neurologi_spesialis_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_neurologi_spesialis').val() : "";
        KesimpulanBedah = ($('input[name="kesimpulan_bedah_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_bedah').val() : "";
        KesimpulanKebidanan = ($('input[name="kesimpulan_kebidanan_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_kebidanan').val() : "";

        var saran_klinis = [];
        $('input[name="saran_klinis"]').each(function() {
            if ($(this).is(":checked")) {
                if ($(this).attr('id') === 'saran_klinis5') { // Asumsi ID untuk checkbox 'lainnya' pada saran klinis adalah 'saran_klinis5'
                    if ($('#saran_klinis').val() !== '') { // Asumsi ID untuk input teks 'lainnya' adalah 'saran_klinis_lainnya'
                        saran_klinis.push('' + $('#saran_klinis').val()); // Gabungkan nilai checkbox dan teks
                    } else {
                        saran_klinis.push($(this).val()); // Jika input teks kosong, masukkan nilai checkbox saja
                    }
                } else {
                    saran_klinis.push($(this).val());
                }
            }
        });
        saran_klinis = saran_klinis.join(';');

        var kurangi = [];
        $('input[name="kurangi"]').each(function() {
            if ($(this).is(":checked")) {
                if ($(this).attr('id') === 'kurangi9') { // Asumsi ID untuk checkbox 'lainnya' pada kurangi adalah 'kurangi5'
                    if ($('#kurangi').val() !== '') { // Asumsi ID untuk input teks 'lainnya' adalah 'kurangi_lainnya'
                        kurangi.push('' + $('#kurangi').val()); // Gabungkan nilai checkbox dan teks
                    } else {
                        kurangi.push($(this).val()); // Jika input teks kosong, masukkan nilai checkbox saja
                    }
                } else {
                    kurangi.push($(this).val());
                }
            }
        });
        kurangi = kurangi.join(';');

        var konsul_ke = [];
        $('input[name="konsul_ke"]').each(function() {
            if ($(this).is(":checked")) {
                if ($(this).attr('id') === 'konsul_ke28') { // Asumsi ID untuk checkbox 'lainnya' pada konsul_ke adalah 'konsul_ke5'
                    if ($('#konsul_ke').val() !== '') { // Asumsi ID untuk input teks 'lainnya' adalah 'konsul_ke_lainnya'
                        konsul_ke.push('' + $('#konsul_ke').val()); // Gabungkan nilai checkbox dan teks
                    } else {
                        konsul_ke.push($(this).val()); // Jika input teks kosong, masukkan nilai checkbox saja
                    }
                } else {
                    konsul_ke.push($(this).val());
                }
            }
        });
        konsul_ke = konsul_ke.join(';');

        const kesimpulan_labor = [];
        const laborRows = document.querySelectorAll('.labor_row'); // Pilih semua baris data labor

        laborRows.forEach(row => {
            // Dapatkan indeks atau ID unik dari baris (misalnya, dari ID tr)
            const rowId = row.id.replace('hasil_labor_', '');

            // Cari radio button "Simpan" di dalam baris
            const radioSimpan = row.querySelector(`input[name="kesimpulan_labor_simpan_${rowId}"][value="Ya"]`);

            // Jika radio button "Simpan" dicentang
            if (radioSimpan && radioSimpan.checked) {
                // Cari input teks kesimpulan labor di dalam baris
                const inputKesimpulan = row.querySelector(`#kesimpulan_labor_${rowId}`);
                const pemeriksaan = row.querySelector(`#pemeriksaan_${rowId}`);

                // Jika input kesimpulan ditemukan, ambil nilainya
                if (inputKesimpulan) {
                    kesimpulan_labor.push({
                        index: rowId, // Atau informasi pengenal lainnya
                        kesimpulan: inputKesimpulan.value,
                        pemeriksaan: pemeriksaan.textContent
                    });
                }
            }
        });
        console.log(kesimpulan_labor);
        const kesimpulan_radiologi = [];
        const radiologiRows = document.querySelectorAll('.radiologi_row'); // Pilih semua baris data labor

        radiologiRows.forEach(row => {
            // Dapatkan indeks atau ID unik dari baris (misalnya, dari ID tr)
            const rowId1 = row.id.replace('hasil_radiologi_', '');

            // Cari radio button "Simpan" di dalam baris
            const radioSimpan1 = row.querySelector(`input[name="kesimpulan_radiologi_simpan_${rowId1}"][value="Ya"]`);

            // Jika radio button "Simpan" dicentang
            if (radioSimpan1 && radioSimpan1.checked) {
                // Cari input teks kesimpulan labor di dalam baris
                const inputKesimpulan1 = row.querySelector(`#kesimpulan_radiologi_${rowId1}`);
                const pemeriksaan1 = row.querySelector(`#pemeriksaan_radiologi_${rowId1}`).querySelector("strong");

                // Jika input kesimpulan ditemukan, ambil nilainya
                if (inputKesimpulan1) {
                    kesimpulan_radiologi.push({
                        index: rowId1, // Atau informasi pengenal lainnya
                        kesimpulan: inputKesimpulan1.value,
                        pemeriksaan: pemeriksaan1.textContent

                    });
                }
            }
        });
        // console.log(kesimpulan_radiologi);

        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Menyimpan Data  ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Kesimpulan_mcu/simpan_klinis",
                    method: "POST",
                    dataType: "json",
                    data: {
                        id_mcu: $('#id_mcu').val(),
                        KelebihanBB: KelebihanBB,
                        ObesitasSentral: ObesitasSentral,
                        TekananDarah: TekananDarah,
                        KesimpulanAntropometri: KesimpulanAntropometri,
                        Os: Os,
                        Od: Od,
                        StepTest: StepTest,
                        pemeriksaan_fisik: {
                            "keadaan_umum": KesimpulanKeadaanUmum,
                            "mata": KesimpulanMata,
                            "tht": KesimpulanTht,
                            "leher": KesimpulanLeher,
                            "dada": KesimpulanDada,
                            "paru": KesimpulanParu,
                            "jantung": KesimpulanJantung,
                            "rongga_perut": KesimpulanRonggaPerut,
                            "urogenital": KesimpulanUrogenital,
                            "anggota_gerak": KesimpulanAnggotaGerak,
                            "neurologis": KesimpulanNeurologis,
                        },
                        kesimpulan_spesialis: {
                            "gigi_geligi": KesimpulanGigiGeligi,
                            "kardiologi": KesimpulanKardiologi,
                            "tht_spesialis": KesimpulanThtSpesialis,
                            "audiometri": KesimpulanAudiometri,
                            "paru_spesialis": KesimpulanParuSpesialis,
                            "spirometri": KesimpulanSpirometri,
                            "mata_spesialis": KesimpulanMataSpesialis,
                            "neurologi_spesialis": KesimpulanNeurologiSpesialis,
                            "bedah": KesimpulanBedah,
                            "kebidanan": KesimpulanKebidanan
                        },

                        kesimpulan_labor: kesimpulan_labor,
                        kesimpulan_radiologi: kesimpulan_radiologi,
                        saran_klinis: saran_klinis,
                        kurangi: kurangi,
                        konsul_ke: konsul_ke,
                        ulangi_pemeriksaan: $('input[name="ulangi_pemeriksaan"]:checked').val(),
                        pemeriksaan_lanjut: $("#pemeriksaan_lanjut").val()
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Medical Check Up Pasien ini telah disimpan",
                                confirmButtonColor: "#3cb878",
                            }, function() {
                                location.reload();
                            });


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

    $(document).ready(function() {
        id_pelayanan = $('#id_mcu').val();
        $.ajax({
            url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/get_data_pemeriksaan",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
                table: 'kesimpulan_klinis',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('input[type="checkbox"]').prop('checked', false);
                    $('#kelebihan_bb').val(data.KelebihanBB);
                    if (data.KelebihanBB !== '') {
                        $('input[name="kelebihan_bb_simpan"][value="Ya"]').prop("checked", true).trigger("change");
                    }

                    $('#obesitas_sentral').val(data.ObesitasSentral);
                    if (data.ObesitasSentral !== '') {
                        $('input[name="obesitas_sentral_simpan"][value="Ya"]').prop("checked", true).trigger("change");
                    }
                    $('#tekanan_darah').val(data.TekananDarah);
                    if (data.TekananDarah !== '') {
                        $('input[name="tekanan_darah_simpan"][value="Ya"]').prop("checked", true).trigger("change");
                    }
                    $('#kesimpulan_antropometri').val(data.KesimpulanAntropometri);
                    if (data.KesimpulanAntropometri !== '') {
                        $('input[name="kesimpulan_antropometri_simpan"][value="Ya"]').prop("checked", true).trigger("change");
                    }
                    $('#os').val(data.Os);
                    if (data.Os !== '') {
                        $('input[name="os_simpan"][value="Ya"]').prop("checked", true).trigger("change");
                    }
                    $('#od').val(data.Od);
                    if (data.Od !== '') {
                        $('input[name="od_simpan"][value="Ya"]').prop("checked", true).trigger("change");
                    }
                    $('#step_test').val(data.StepTest);
                    if (data.StepTest !== '') {
                        $('input[name="step_test_simpan"][value="Ya"]').prop("checked", true).trigger("change");
                    }

                    var pemeriksaan_lanjut_array = data.pemeriksaan_lanjut.split(',');
                    $('#pemeriksaan_lanjut').tagsinput();
                    $.each(pemeriksaan_lanjut_array, function(index, value) {
                        $("#pemeriksaan_lanjut").tagsinput('add', value);
                    });

                    $('input[name="ulangi_pemeriksaan"][value="' + data.ulangi_pemeriksaan + '"]').prop("checked", true);

                    if (data.saran_klinis != '') {
                        var saran_klinis = data.saran_klinis.split(';');
                        var saran_klinis_array = saran_klinis.map(function(item) {
                            return item.trim();
                        });
                        // console.log(saran_klinis_array);

                        $.each(saran_klinis_array, function(index, value) {
                            // Pilih checkbox dengan name 'saran_klinis[]' dan value yang sesuai dengan nilai saat ini
                            $('input[name="saran_klinis"][value="' + value + '"]').prop("checked", true);
                            if (value != 'PERTAHANKAN KESEHATAN ANDA' && value != 'TINGKATKAN KESEHATAN ANDA' && value != 'OLAHRAGA TERATUR DAN TERUKUR (AEROBIK 3-4 KALI SEMINGGU @ 15 MENIT)' && value != 'MINUM AIR PUTIH 8 GELAS/HARI') {
                                $('input[name="saran_klinis"][value="Lainnya"').prop("checked", true);
                                $('#saran_klinis').val(value); // Asumsi ada input dengan ID 'saran_klinis_lainnya' untuk nilai lainnya
                            }
                        });
                    }
                    if (data.kurangi != '') {
                        var kurangi = data.kurangi.split(';');
                        var kurangi_array = kurangi.map(function(item) {
                            return item.trim();
                        });
                        // console.log(kurangi_array);

                        $.each(kurangi_array, function(index, value) {
                            // Pilih checkbox dengan name 'kurangi' dan value yang sesuai dengan nilai saat ini
                            $('input[name="kurangi"][value="' + value + '"]').prop("checked", true);
                            if (value != 'ROKOK' && value != 'MAKANAN ASAM-ASAM' && value != 'MINUMAN BERALKOHOL' && value != 'MAKANAN ASIN-ASIN' && value != 'MAKANAN PEDAS' && value != 'MAKANAN MANIS-MANIS' && value != 'MAKANAN BANYAK LEMAK/GAJIH' && value != 'MAKANAN JEROAN,EMPING/MELINJO/KACANG-KACANGAN') {
                                $('input[name="kurangi"][value="Lainnya"').prop("checked", true);
                                $('#kurangi').val(value); // Asumsi ada input dengan ID 'kurangi_lainnya' untuk nilai lainnya
                            }
                        });
                    }
                    if (data.konsul_ke != '') {
                        var konsul_ke = data.konsul_ke.split(';');
                        var konsul_ke_array = konsul_ke.map(function(item) {
                            return item.trim();
                        });
                        // console.log(konsul_ke_array);

                        $.each(konsul_ke_array, function(index, value) {
                            // Pilih checkbox dengan name 'konsul_ke' dan value yang sesuai dengan nilai saat ini
                            $('input[name="konsul_ke"][value="' + value + '"]').prop("checked", true);
                            if (value != 'AHLI GIZI' && value != 'ANDROLOGI' && value != 'BEDAH DIGESTIF' && value != 'BEDAH MULUT' && value != 'BEDAH SYARAF' && value != 'BEDAH TULANG' && value != 'BEDAH UMUM' && value != 'FISIOTERAPIS' && value != 'GASTROENTEROLOGIST' && value != 'GIGI' && value != 'JANTUNG DAN PEMBULUH DARAH' && value != 'KEBIDANAN DAN KANDUNGAN' && value != 'KONSERVASI GIGI' && value != 'KULIT DAN KELAMIN' && value != 'MATA' && value != 'NEUROLOGI' && value != 'OKUPASI' && value != 'PARU' && value != 'PENYAKIT DALAM' && value != 'PSIKIATRI' && value != 'PSIKOLOGI' && value != 'REHABILITASI' && value != 'SYARAF' && value != 'TERAPI OKUPASI' && value != 'THT' && value != 'UMUM' && value != 'UROLOGI') {
                                $('input[name="konsul_ke"][value="Lainnya"').prop("checked", true);
                                $('#konsul_ke').val(value); // Asumsi ada input dengan ID 'konsul_ke_lainnya' untuk nilai lainnya
                            }
                        });
                    }

                    if (data.pemeriksaan_fisik !== '') {
                        var pemeriksaan_fisikValue = JSON.parse(data.pemeriksaan_fisik);
                        // console.log(pemeriksaan_fisikValue);
                        Object.keys(pemeriksaan_fisikValue).forEach(function(key) {
                            const value = pemeriksaan_fisikValue[key];
                            // console.log(value);
                            $('#kesimpulan_' + key + '').val(value);
                            $('input[name="kesimpulan_' + key + '_simpan"][value="Ya"]').prop("checked", true).change();
                        });
                    }

                    if (data.kesimpulan_spesialis !== '') {
                        var kesimpulan_spesialisValue = JSON.parse(data.kesimpulan_spesialis);
                        // console.log(pemeriksaan_fisikValue);
                        Object.keys(kesimpulan_spesialisValue).forEach(function(key) {
                            const value1 = kesimpulan_spesialisValue[key];
                            // console.log(value);
                            $('#kesimpulan_' + key + '').val(value1);
                            $('input[name="kesimpulan_' + key + '_simpan"][value="Ya"]').prop("checked", true).change();
                        });
                    }

                    if (data.kesimpulan_labor !== '' && data.kesimpulan_labor !== 'null' && data.kesimpulan_labor !== null) {
                        var kesimpulan_laborValue = JSON.parse(data.kesimpulan_labor);
                        // console.log(kesimpulan_laborValue);
                        Object.keys(kesimpulan_laborValue).forEach(function(key) {
                            const value2 = kesimpulan_laborValue[key];
                            // console.log(value2);
                            $('#kesimpulan_labor_' + value2.index + '').val(value2.kesimpulan);
                            $('input[name="kesimpulan_labor_simpan_' + value2.index + '"][value="Ya"]').prop("checked", true).change();
                        });
                    }

                    if (data.kesimpulan_radiologi !== '' && data.kesimpulan_radiologi !== 'null' && data.kesimpulan_radiologi !== null) {
                        var kesimpulan_radiologiValue = JSON.parse(data.kesimpulan_radiologi);
                        // console.log(kesimpulan_radiologiValue);
                        Object.keys(kesimpulan_radiologiValue).forEach(function(key) {
                            const value3 = kesimpulan_radiologiValue[key];
                            // console.log(value2);
                            $('#kesimpulan_radiologi_' + value3.index + '').val(value3.kesimpulan);
                            $('input[name="kesimpulan_radiologi_simpan_' + value3.index + '"][value="Ya"]').prop("checked", true).change();
                        });
                    }
                }
            }

        });
    });
=======
<div class="page_content">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h2 class="panel-title txt-dark"><strong>KESIMPULAN KLINIS</strong></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <h4 class="panel-title txt-dark"><b><strong>DATA PASIEN</strong></b></h4>



                                <div class="row mt-20">
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">NIK</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="nik_npp" value="<?php echo $data_mcu['no_ktp']; ?>" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Nama Lengkap</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="inName" disabled=""
                                                    value="<?php echo $data_mcu['nama_pasien']; ?>">
                                                <p id="namefull" style="font-size:12px; margin-top:5px;"></p>
                                                <input type="hidden" id="intanggalmasuk"
                                                    value="<?php echo date('Y-m-d H:i:s'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Jenis Kelamin</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="inJK" value="<?php echo $data_mcu['jenis_kelamin']; ?>" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">No Panduan</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" class="form-control" id="no_panduan" disabled>
                                                <!-- <p id="nik" style="font-size:12px; margin-top:5px;"></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="margin-bottom: 20px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 pt-5">Umur</label>
                                            <div class="col-md-6 has-success">
                                                <input type="text" disabled="" class="form-control" value="<?php
                                                                                                            setlocale(LC_ALL, 'id_ID');
                                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                                            $time = strtotime($data_mcu['tgl_lahir']);
                                                                                                            $date = strftime("%d %B %Y", $time);
                                                                                                            echo getAge($date)
                                                                                                            ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h4 class="panel-title txt-dark"><b><strong>Kesimpulan Klinis</strong></b></h4>
                                <hr>

                                <table border=1 class="table table-bordered display product-overview mb-30" id="support_table">
                                    <tbody>


                                        <tr>
                                            <td>KELEBIHAN BERAT BADAN TINGKAT (IMT : <font id="v_imt"></font>)</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kelebihan_bb" id="kelebihan_bb" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kelebihan_bb_simpan" id="kelebihan_bb_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kelebihan_bb_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kelebihan_bb_simpan" id="kelebihan_bb_simpan2" value="Ya" class="rad1" />
                                                            <label for="kelebihan_bb_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>OBESITAS SENTRAL (RPP: <font id="v_rpp"></font>) RPP</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="obesitas_sentral" id="obesitas_sentral" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="obesitas_sentral_simpan" id="obesitas_sentral_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="obesitas_sentral_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="obesitas_sentral_simpan" id="obesitas_sentral_simpan2" value="Ya" class="rad1" />
                                                            <label for="obesitas_sentral_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>TEKANAN DARAH: <font id="v_tekanan_darah"></font> mmHg</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="tekanan_darah" id="tekanan_darah" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="tekanan_darah_simpan" id="tekanan_darah_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="tekanan_darah_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="tekanan_darah_simpan" id="tekanan_darah_simpan2" value="Ya" class="rad1" />
                                                            <label for="tekanan_darah_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>KESIMPULAN: <font id="v_kesimpulan"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_antropometri" id="kesimpulan_antropometri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_antropometri_simpan" id="kesimpulan_antropometri_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_antropometri_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_antropometri_simpan" id="kesimpulan_antropometri_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_antropometri_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>OS: -spesialis mata- </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="os" id="os" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="os_simpan" id="os_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="os_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="os_simpan" id="os_simpan2" value="Ya" class="rad1" />
                                                            <label for="os_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>OD: -spesialis mata-</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="od" id="od" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="od_simpan" id="od_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="od_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="od_simpan" id="od_simpan2" value="Ya" class="rad1" />
                                                            <label for="od_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Step Test (Harvard): <font id="v_skor_step"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="step_test" id="step_test" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="step_test_simpan" id="step_test_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="step_test_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="step_test_simpan" id="step_test_simpan2" value="Ya" class="rad1" />
                                                            <label for="step_test_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">KEADAAN UMUM</td>
                                        </tr>
                                        <tr id="keadaan_umum" class="collapse">
                                            <td>Catatan Umum : <font id="v_keadaan_umum"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_keadaan_umum" id="kesimpulan_keadaan_umum" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_keadaan_umum_simpan" id="kesimpulan_keadaan_umum_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_keadaan_umum_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_keadaan_umum_simpan" id="kesimpulan_keadaan_umum_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_keadaan_umum_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">MATA</td>
                                        </tr>
                                        <tr id="mata" class="collapse">
                                            <td>Catatan : <font id="v_mata"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_mata" id="kesimpulan_mata" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_mata_simpan" id="kesimpulan_mata_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_mata_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_mata_simpan" id="kesimpulan_mata_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_mata_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">THT</td>
                                        </tr>
                                        <tr id="tht" class="collapse">
                                            <td>Catatan : <font id="v_tht"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_tht" id="kesimpulan_tht" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_tht_simpan" id="kesimpulan_tht_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_tht_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_tht_simpan" id="kesimpulan_tht_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_tht_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">LEHER</td>
                                        </tr>
                                        <tr id="leher" class="collapse">
                                            <td>Catatan : <font id="v_leher"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_leher" id="kesimpulan_leher" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_leher_simpan" id="kesimpulan_leher_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_leher_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_leher_simpan" id="kesimpulan_leher_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_leher_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">DADA</td>
                                        </tr>
                                        <tr id="dada" class="collapse">
                                            <td>Catatan : <font id="v_dada"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_dada" id="kesimpulan_dada" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_dada_simpan" id="kesimpulan_dada_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_dada_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_dada_simpan" id="kesimpulan_dada_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_dada_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">PARU</td>
                                        </tr>
                                        <tr id="paru" class="collapse">
                                            <td>Catatan : <font id="v_paru"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_paru" id="kesimpulan_paru" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_paru_simpan" id="kesimpulan_paru_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_paru_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_paru_simpan" id="kesimpulan_paru_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_paru_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">JANTUNG</td>
                                        </tr>
                                        <tr id="jantung" class="collapse">
                                            <td>Catatan : <font id="v_jantung"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_jantung" id="kesimpulan_jantung" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_jantung_simpan" id="kesimpulan_jantung_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_jantung_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_jantung_simpan" id="kesimpulan_jantung_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_jantung_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">RONGGA PERUT</td>
                                        </tr>
                                        <tr id="rongga_perut" class="collapse">
                                            <td>Catatan : <font id="v_rongga_perut"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_rongga_perut" id="kesimpulan_rongga_perut" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_rongga_perut_simpan" id="kesimpulan_rongga_perut_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_rongga_perut_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_rongga_perut_simpan" id="kesimpulan_rongga_perut_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_rongga_perut_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">UROGENITAL</td>
                                        </tr>
                                        <tr id="urogenital" class="collapse">
                                            <td>Catatan : <font id="v_urogenital"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_urogenital" id="kesimpulan_urogenital" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_urogenital_simpan" id="kesimpulan_urogenital_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_urogenital_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_urogenital_simpan" id="kesimpulan_urogenital_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_urogenital_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">ANGGOTA GERAK</td>
                                        </tr>
                                        <tr id="anggota_gerak" class="collapse">
                                            <td>Catatan : <font id="v_anggota_gerak"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_anggota_gerak" id="kesimpulan_anggota_gerak" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_anggota_gerak_simpan" id="kesimpulan_anggota_gerak_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_anggota_gerak_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_anggota_gerak_simpan" id="kesimpulan_anggota_gerak_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_anggota_gerak_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">NEUROLOGIS</td>
                                        </tr>
                                        <tr id="neurologis" class="collapse">
                                            <td>Catatan : <font id="v_neurologis"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_neurologis" id="kesimpulan_neurologis" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_neurologis_simpan" id="kesimpulan_neurologis_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_neurologis_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_neurologis_simpan" id="kesimpulan_neurologis_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_neurologis_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">GIGI GELIGI</td>
                                        </tr>
                                        <tr id="gigi_geligi" class="collapse">
                                            <td>Kesimpulan : <font id="v_gigi_geligi"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_gigi_geligi" id="kesimpulan_gigi_geligi" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_gigi_geligi_simpan" id="kesimpulan_gigi_geligi_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_gigi_geligi_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_gigi_geligi_simpan" id="kesimpulan_gigi_geligi_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_gigi_geligi_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">KARDIOLOGI</td>
                                        </tr>
                                        <tr id="kardiologi" class="collapse">
                                            <td>Kesimpulan : <font id="v_kardiologi"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_kardiologi" id="kesimpulan_kardiologi" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_kardiologi_simpan" id="kesimpulan_kardiologi_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_kardiologi_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_kardiologi_simpan" id="kesimpulan_kardiologi_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_kardiologi_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">THT SPESIALIS</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">1.Telinga</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">2.Hidung</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">3.Tenggorokan</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">4.Larynx</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">5.Audiometri</td>
                                        </tr>
                                        <tr id="tht_spesialis" class="collapse">
                                            <td>Kesimpulan : <font id="v_tht_spesialis"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_tht_spesialis" id="kesimpulan_tht_spesialis" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_tht_spesialis_simpan" id="kesimpulan_tht_spesialis_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_tht_spesialis_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_tht_spesialis_simpan" id="kesimpulan_tht_spesialis_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_tht_spesialis_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">AUDIOMETRI</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">a.Telinga Kanan</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">b.Telinga Kiri</td>
                                        </tr>
                                        <tr id="audiometri" class="collapse">
                                            <td>Kesimpulan : <font id="v_audiometri"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_audiometri" id="kesimpulan_audiometri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_audiometri_simpan" id="kesimpulan_audiometri_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_audiometri_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_audiometri_simpan" id="kesimpulan_audiometri_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_audiometri_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">PARU</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">a.Infeksi</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">b.Palpasi</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">c.Perkusi</td>
                                        </tr>
                                        <tr id="paru_spesialis" class="collapse">
                                            <td>Kesimpulan : <font id="v_paru_spesialis"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_paru_spesialis" id="kesimpulan_paru_spesialis" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_paru_spesialis_simpan" id="kesimpulan_paru_spesialis_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_paru_spesialis_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_paru_spesialis_simpan" id="kesimpulan_paru_spesialis_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_paru_spesialis_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">SPIROMETRI</td>
                                        </tr>
                                        <tr id="spirometri" class="collapse">
                                            <td>Kesimpulan : <font id="v_spirometri"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_spirometri" id="kesimpulan_spirometri" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_spirometri_simpan" id="kesimpulan_spirometri_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_spirometri_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_spirometri_simpan" id="kesimpulan_spirometri_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_spirometri_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">MATA SPESIALIS</td>
                                        </tr>
                                        <tr id="mata_spesialis" class="collapse">
                                            <td>Kesimpulan : <font id="v_mata_spesialis"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_mata_spesialis" id="kesimpulan_mata_spesialis" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_mata_spesialis_simpan" id="kesimpulan_mata_spesialis_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_mata_spesialis_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_mata_spesialis_simpan" id="kesimpulan_mata_spesialis_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_mata_spesialis_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">NEUROLOGI SPESIALIS</td>
                                        </tr>
                                        <tr id="neurologi_spesialis" class="collapse">
                                            <td>Kesimpulan : <font id="v_neurologi_spesialis"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_neurologi_spesialis" id="kesimpulan_neurologi_spesialis" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_neurologi_spesialis_simpan" id="kesimpulan_neurologi_spesialis_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_neurologi_spesialis_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_neurologi_spesialis_simpan" id="kesimpulan_neurologi_spesialis_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_neurologi_spesialis_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">BEDAH</td>
                                        </tr>
                                        <tr id="bedah" class="collapse">
                                            <td>Kesimpulan : <font id="v_bedah"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_bedah" id="kesimpulan_bedah" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_bedah_simpan" id="kesimpulan_bedah_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_bedah_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_bedah_simpan" id="kesimpulan_bedah_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_bedah_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">KEBIDANAN</td>
                                        </tr>
                                        <tr id="kebidanan" class="collapse">
                                            <td>Kesimpulan : <font id="v_kebidanan"></font>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="kesimpulan_kebidanan" id="kesimpulan_kebidanan" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td width="100px">
                                                            <input type="radio" name="kesimpulan_kebidanan_simpan" id="kesimpulan_kebidanan_simpan1" value="Tidak" class="rad1" checked />
                                                            <label for="kesimpulan_kebidanan_simpan1">Tidak</label>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="kesimpulan_kebidanan_simpan" id="kesimpulan_kebidanan_simpan2" value="Ya" class="rad1" />
                                                            <label for="kesimpulan_kebidanan_simpan2">Simpan</label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">LABORATORIUM</td>
                                        </tr>

                                        <tr>
                                            <td colspan="3">
                                                <div class="hasil_labor col-md-12">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="3">RADIOLOGI</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="expertise col-md-12">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u>Saran Klinis</u></p>
                                        </label>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="checkbox checkbox-primary">
                                            <input id="saran_klinis1" type="checkbox" name="saran_klinis" value="PERTAHANKAN KESEHATAN ANDA">
                                            <label class="control-label" for="saran_klinis1">
                                                PERTAHANKAN KESEHATAN ANDA
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="saran_klinis2" type="checkbox" name="saran_klinis" value="TINGKATKAN KESEHATAN ANDA">
                                            <label class="control-label" for="saran_klinis2">
                                                TINGKATKAN KESEHATAN ANDA
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="saran_klinis3" type="checkbox" name="saran_klinis" value="OLAHRAGA TERATUR DAN TERUKUR (AEROBIK 3-4 KALI SEMINGGU @ 15 MENIT)">
                                            <label class="control-label" for="saran_klinis3">
                                                OLAHRAGA TERATUR DAN TERUKUR (AEROBIK 3-4 KALI SEMINGGU @ 15 MENIT)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkbox checkbox-primary">
                                            <input id="saran_klinis4" type="checkbox" name="saran_klinis" value="MINUM AIR PUTIH 8 GELAS/HARI">
                                            <label class="control-label" for="saran_klinis4">
                                                MINUM AIR PUTIH 8 GELAS/HARI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="saran_klinis5" type="checkbox" name="saran_klinis" value="Lainnya">
                                            <label class="control-label" for="saran_klinis5">
                                                Lainnya :
                                            </label>
                                            <div class="has-success">
                                                <input type="text" class="form-control" id="saran_klinis" value="" style="display: block;">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u>Kurangi</u></p>
                                        </label>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi1" type="checkbox" name="kurangi" value="ROKOK">
                                            <label class="control-label" for="kurangi1">
                                                ROKOK
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi2" type="checkbox" name="kurangi" value="MAKANAN ASAM-ASAM">
                                            <label class="control-label" for="kurangi2">
                                                MAKANAN ASAM-ASAM
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi3" type="checkbox" name="kurangi" value="MINUMAN BERALKOHOL">
                                            <label class="control-label" for="kurangi3">
                                                MINUMAN BERALKOHOL
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi4" type="checkbox" name="kurangi" value="MAKANAN ASIN-ASIN">
                                            <label class="control-label" for="kurangi4">
                                                MAKANAN ASIN-ASIN
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi5" type="checkbox" name="kurangi" value="MAKANAN PEDAS">
                                            <label class="control-label" for="kurangi5">
                                                MAKANAN PEDAS
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi6" type="checkbox" name="kurangi" value="MAKANAN MANIS-MANIS">
                                            <label class="control-label" for="kurangi6">
                                                MAKANAN MANIS-MANIS
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi7" type="checkbox" name="kurangi" value="MAKANAN BANYAK LEMAK/GAJIH">
                                            <label class="control-label" for="kurangi7">
                                                MAKANAN BANYAK LEMAK/GAJIH
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi8" type="checkbox" name="kurangi" value="MAKANAN JEROAN,EMPING/MELINJO/KACANG-KACANGAN">
                                            <label class="control-label" for="kurangi8">
                                                MAKANAN JEROAN, EMPING/MELINJO/KACANG-KACANGAN
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="kurangi9" type="checkbox" name="kurangi" value="Lainnya">
                                            <label class="control-label" for="kurangi9">
                                                Lainnya :
                                            </label>
                                            <div class="has-success">
                                                <input type="text" class="form-control" id="kurangi" value="" style="display: block;">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u>Konsultasikan Kesehatan Anda Kepada</u></p>
                                        </label>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke1" type="checkbox" name="konsul_ke" value="AHLI GIZI">
                                            <label class="control-label" for="konsul_ke1">
                                                AHLI GIZI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke2" type="checkbox" name="konsul_ke" value="ANDROLOGI">
                                            <label class="control-label" for="konsul_ke2">
                                                ANDROLOGI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke3" type="checkbox" name="konsul_ke" value="BEDAH DIGESTIF">
                                            <label class="control-label" for="konsul_ke3">
                                                BEDAH DIGESTIF
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke4" type="checkbox" name="konsul_ke" value="BEDAH MULUT">
                                            <label class="control-label" for="konsul_ke4">
                                                BEDAH MULUT
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke5" type="checkbox" name="konsul_ke" value="BEDAH SYARAF">
                                            <label class="control-label" for="konsul_ke5">
                                                BEDAH SYARAF
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke6" type="checkbox" name="konsul_ke" value="BEDAH TULANG">
                                            <label class="control-label" for="konsul_ke6">
                                                BEDAH TULANG
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke7" type="checkbox" name="konsul_ke" value="BEDAH UMUM">
                                            <label class="control-label" for="konsul_ke7">
                                                BEDAH UMUM
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke8" type="checkbox" name="konsul_ke" value="FISIOTERAPIS">
                                            <label class="control-label" for="konsul_ke8">
                                                FISIOTERAPIS
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke9" type="checkbox" name="konsul_ke" value="GASTROENTEROLOGIST">
                                            <label class="control-label" for="konsul_ke9">
                                                GASTROENTEROLOGIST
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke10" type="checkbox" name="konsul_ke" value="GIGI">
                                            <label class="control-label" for="konsul_ke10">
                                                GIGI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke11" type="checkbox" name="konsul_ke" value="JANTUNG DAN PEMBULUH DARAH">
                                            <label class="control-label" for="konsul_ke11">
                                                JANTUNG DAN PEMBULUH DARAH
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke12" type="checkbox" name="konsul_ke" value="KEBIDANAN DAN KANDUNGAN">
                                            <label class="control-label" for="konsul_ke12">
                                                KEBIDANAN DAN KANDUNGAN
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke13" type="checkbox" name="konsul_ke" value="KONSERVASI GIGI">
                                            <label class="control-label" for="konsul_ke13">
                                                KONSERVASI GIGI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke14" type="checkbox" name="konsul_ke" value="KULIT DAN KELAMIN">
                                            <label class="control-label" for="konsul_ke14">
                                                KULIT DAN KELAMIN
                                            </label>
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke15" type="checkbox" name="konsul_ke" value="MATA">
                                            <label class="control-label" for="konsul_ke15">
                                                MATA
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke16" type="checkbox" name="konsul_ke" value="NEUROLOGI">
                                            <label class="control-label" for="konsul_ke16">
                                                NEUROLOGI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke17" type="checkbox" name="konsul_ke" value="OKUPASI">
                                            <label class="control-label" for="konsul_ke17">
                                                OKUPASI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke18" type="checkbox" name="konsul_ke" value="PARU">
                                            <label class="control-label" for="konsul_ke18">
                                                PARU
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke19" type="checkbox" name="konsul_ke" value="PENYAKIT DALAM">
                                            <label class="control-label" for="konsul_ke19">
                                                PENYAKIT DALAM
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke20" type="checkbox" name="konsul_ke" value="PSIKIATRI">
                                            <label class="control-label" for="konsul_ke20">
                                                PSIKIATRI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke21" type="checkbox" name="konsul_ke" value="PSIKOLOGI">
                                            <label class="control-label" for="konsul_ke21">
                                                PSIKOLOGI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke22" type="checkbox" name="konsul_ke" value="REHABILITASI">
                                            <label class="control-label" for="konsul_ke22">
                                                REHABILITASI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke23" type="checkbox" name="konsul_ke" value="SYARAF">
                                            <label class="control-label" for="konsul_ke23">
                                                SYARAF
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke24" type="checkbox" name="konsul_ke" value="TERAPI OKUPASI">
                                            <label class="control-label" for="konsul_ke24">
                                                TERAPI OKUPASI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke25" type="checkbox" name="konsul_ke" value="THT">
                                            <label class="control-label" for="konsul_ke25">
                                                THT
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke26" type="checkbox" name="konsul_ke" value="UMUM">
                                            <label class="control-label" for="konsul_ke26">
                                                UMUM
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke27" type="checkbox" name="konsul_ke" value="UROLOGI">
                                            <label class="control-label" for="konsul_ke27">
                                                UROLOGI
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="konsul_ke28" type="checkbox" name="konsul_ke" value="Lainnya">
                                            <label class="control-label" for="konsul_ke28">
                                                Lainnya :
                                            </label>
                                            <div class="has-success">
                                                <input type="text" class="form-control" id="konsul_ke" value="" style="display: block;">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u>Ulangi Pemeriksaan</u></p>
                                        </label>
                                        <div class="form-group">
                                            <input type="radio" id="ulangi_pemeriksaan1" name="ulangi_pemeriksaan" value="2 Minggu Lagi">
                                            <label class="control-label" for="ulangi_pemeriksaan1">2 Minggu Lagi</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="ulangi_pemeriksaan2" name="ulangi_pemeriksaan" value="1 Bulan Lagi">
                                            <label class="control-label" for="ulangi_pemeriksaan2">1 Bulan Lagi</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="ulangi_pemeriksaan3" name="ulangi_pemeriksaan" value="2 Bulan Lagi">
                                            <label class="control-label" for="ulangi_pemeriksaan3">2 Bulan Lagi</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u>Pemeriksaan Yang Akan Dilakukan</u></p>
                                        </label>
                                        <div class="form-group">
                                            <input type="text" data-role="tagsinput" class="form-control" id="pemeriksaan_lanjut" placeholder="Isi Pemeriksaan Yang Akan Dilakukan">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer mb-5 mr-5 mt-10">
                                    <input type="hidden" id="id_mcu" value="<?php echo $data_mcu['id_mcu']; ?>">
                                    <button onclick="insertData()" class="btn btn-success btn-anim  btn-sm"><i
                                            class="icon-rocket"></i><span class="btn-text">SIMPAN</span></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->


                </div>
                <!-- /Main Content -->

            </div>
        </div>
    </div>

</div>
<script src="<?= base_url(); ?>assets/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

<style>
    tr {
        color: black;
    }

    td {
        color: black;
    }

    th {
        color: black;
    }

    .has-success input.form-control[data-role="tagsinput"] {
        font-size: 20px;
        /* Contoh: ukuran font 16 piksel */
        color: black !important;
    }

    .with-padding td {
        /* Jika Anda ingin padding di dalam sel */
        padding-top: 4px;
        padding-bottom: 4px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {


    });
    $(document).ready(function() {
        id_pelayanan = $('#id_mcu').val();
        $.ajax({
            url: "<?php echo base_url() ?>Kesimpulan_mcu/get_data_pemeriksaan",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
            },
            success: function(data) {
                if (data.status_dt == 'found') {

                    $('#v_imt').html(data.imt);
                    $('#v_rpp').html(data.rpp);
                    $('#v_tekanan_darah').html(data.sistol + '/' + data.diastol);
                    $('#v_kesimpulan').html(data.kesimpulan_umum);
                    $('#v_skor_step').html(data.skor_step);
                    if (data.cttn_keadaan_umum !== null && data.cttn_keadaan_umum !== '') {
                        $('#keadaan_umum').collapse('show');
                        $('#v_keadaan_umum').html(data.cttn_keadaan_umum);
                    }
                    if (data.cttn_mata !== null && data.cttn_mata !== '') {
                        $('#mata').collapse('show');
                        $('#v_mata').html(data.cttn_mata);
                    }
                    if (data.cttn_tht !== null && data.cttn_tht !== '') {
                        $('#tht').collapse('show');
                        $('#v_tht').html(data.cttn_tht);
                    }
                    if (data.cttn_leher !== null && data.cttn_leher !== '') {
                        $('#leher').collapse('show');
                        $('#v_leher').html(data.cttn_leher);
                    }

                    if (data.cttn_dada !== null && data.cttn_dada !== '') {
                        $('#dada').collapse('show');
                        $('#v_dada').html(data.cttn_dada);
                    }

                    if (data.cttn_paru !== null && data.cttn_paru !== '') {
                        $('#paru').collapse('show');
                        $('#v_paru').html(data.cttn_paru);
                    }

                    if (data.cttn_jantung !== null && data.cttn_jantung !== '') {
                        $('#jantung').collapse('show');
                        $('#v_jantung').html(data.cttn_jantung);
                    }

                    if (data.cttn_perut !== null && data.cttn_perut !== '') {
                        $('#rongga_perut').collapse('show');
                        $('#v_rongga_perut').html(data.cttn_perut);
                    }

                    if (data.cttn_urogenital !== null && data.cttn_urogenital !== '') {
                        $('#urogenital').collapse('show');
                        $('#v_urogenital').html(data.cttn_urogenital);
                    }

                    if (data.cttn_anggota_gerak !== null && data.cttn_anggota_gerak !== '') {
                        $('#anggota_gerak').collapse('show');
                        $('#v_anggota_gerak').html(data.cttn_anggota_gerak);
                    }

                    if (data.cttn_neurologi !== null && data.cttn_neurologi !== '') {
                        $('#neurologis').collapse('show');
                        $('#v_neurologis').html(data.cttn_neurologi);
                    }

                }
            }

        });
        $.ajax({
            url: "<?php echo base_url() ?>Kesimpulan_mcu/get_data_labor",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
            },
            success: function(laborValue) {
                if (laborValue.status_dt == 'found') {
                    let hasil_labor = document.querySelector('.hasil_labor');
                    const tableBody = document.createElement('table');
                    tableBody.classList.add('table', 'with-padding');

                    Object.keys(laborValue).forEach(function(key) {
                        if (key !== 'status_dt') {
                            // var data = laborValue[key]; // 'data' akan berisi object untuk index '0' atau '1'
                            // console.log("Index:", key);
                            // console.log("Data:", data);
                            const data = laborValue[key];
                            // console.log("Data:", data);

                            const tr = document.createElement('tr');
                            tr.style.padding = '10px';
                            tr.id = 'hasil_labor_' + key; // Membuat ID unik untuk setiap baris
                            tr.classList.add('labor_row');

                            const td1 = document.createElement('td');
                            td1.innerHTML = `<strong>${data.GROUP}</strong> : ${data.TESTNAME} (${data.VALUE} ${data.TESTUNIT})`;
                            td1.id = 'pemeriksaan_' + key;

                            const td2 = document.createElement('td');
                            const tableInput = document.createElement('table');
                            const trInput = document.createElement('tr');
                            const tdInput = document.createElement('td');
                            const inputKesimpulan = document.createElement('input');
                            inputKesimpulan.type = 'text';
                            inputKesimpulan.name = 'kesimpulan_labor';
                            inputKesimpulan.id = `kesimpulan_labor_${key}`;
                            tdInput.appendChild(inputKesimpulan);
                            trInput.appendChild(tdInput);
                            tableInput.appendChild(trInput);
                            td2.appendChild(tableInput);

                            const td3 = document.createElement('td');
                            const tableRadio = document.createElement('table');
                            const trRadio = document.createElement('tr');

                            const tdRadio1 = document.createElement('td');
                            tdRadio1.width = '100px';
                            const radioTidak = document.createElement('input');
                            radioTidak.type = 'radio';
                            radioTidak.name = 'kesimpulan_labor_simpan_' + key; // Membuat nama radio unik per baris
                            radioTidak.id = `kesimpulan_labor_simpan_no_${key}`;
                            radioTidak.value = 'Tidak';
                            radioTidak.className = 'rad1';
                            radioTidak.checked = true;
                            const labelTidak = document.createElement('label');
                            labelTidak.setAttribute('for', `kesimpulan_labor_simpan_no_${key}`);
                            labelTidak.textContent = 'Tidak';
                            tdRadio1.appendChild(radioTidak);
                            tdRadio1.appendChild(labelTidak);
                            trRadio.appendChild(tdRadio1);

                            const tdRadio2 = document.createElement('td');
                            const radioYa = document.createElement('input');
                            radioYa.type = 'radio';
                            radioYa.name = 'kesimpulan_labor_simpan_' + key; // Membuat nama radio unik per baris
                            radioYa.id = `kesimpulan_labor_simpan_yes_${key}`;
                            radioYa.value = 'Ya';
                            radioYa.className = 'rad1';
                            const labelYa = document.createElement('label');
                            labelYa.setAttribute('for', `kesimpulan_labor_simpan_yes_${key}`);
                            labelYa.textContent = 'Simpan';
                            tdRadio2.appendChild(radioYa);
                            tdRadio2.appendChild(labelYa);
                            trRadio.appendChild(tdRadio2);

                            tableRadio.appendChild(trRadio);
                            td3.appendChild(tableRadio);

                            tr.appendChild(td1);
                            tr.appendChild(td2);
                            tr.appendChild(td3);
                            tableBody.appendChild(tr);
                        }
                    });

                    hasil_labor.appendChild(tableBody);

                }
            }

        });

        $.ajax({
            url: "<?php echo base_url() ?>Kesimpulan_mcu/get_data_expertise",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
            },
            success: function(expertise_respon) {
                if (expertise_respon.status_dt == 'found') {
                    let expertise = document.querySelector('.expertise');
                    const tableBody = document.createElement('table');
                    tableBody.classList.add('table', 'with-padding');

                    Object.keys(expertise_respon).forEach(function(key) {
                        if (key !== 'status_dt') {
                            var data = expertise_respon[key];
                            const tr = document.createElement('tr');
                            tr.style.padding = '10px';
                            tr.id = 'hasil_radiologi_' + key; // Membuat ID unik untuk setiap baris
                            tr.classList.add('radiologi_row');

                            const td1 = document.createElement('td');
                            td1.innerHTML = `<strong>${data.nama}</strong> : ${data.hasil_pemeriksaan} `;
                            td1.width = '50%';
                            td1.id = 'pemeriksaan_radiologi_' + key;

                            const td2 = document.createElement('td');
                            const tableInput = document.createElement('table');
                            const trInput = document.createElement('tr');
                            const tdInput = document.createElement('td');
                            const inputKesimpulan = document.createElement('input');
                            inputKesimpulan.type = 'text';
                            inputKesimpulan.name = 'kesimpulan_radiologi';
                            inputKesimpulan.id = `kesimpulan_radiologi_${key}`;
                            tdInput.appendChild(inputKesimpulan);
                            trInput.appendChild(tdInput);
                            tableInput.appendChild(trInput);
                            td2.appendChild(tableInput);

                            const td3 = document.createElement('td');
                            const tableRadio = document.createElement('table');
                            const trRadio = document.createElement('tr');

                            const tdRadio1 = document.createElement('td');
                            tdRadio1.width = '100px';
                            const radioTidak = document.createElement('input');
                            radioTidak.type = 'radio';
                            radioTidak.name = 'kesimpulan_radiologi_simpan_' + key; // Membuat nama radio unik per baris
                            radioTidak.id = `kesimpulan_radiologi_simpan_no_${key}`;
                            radioTidak.value = 'Tidak';
                            radioTidak.className = 'rad1';
                            radioTidak.checked = true;
                            const labelTidak = document.createElement('label');
                            labelTidak.setAttribute('for', `kesimpulan_radiologi_simpan_no_${key}`);
                            labelTidak.textContent = 'Tidak';
                            tdRadio1.appendChild(radioTidak);
                            tdRadio1.appendChild(labelTidak);
                            trRadio.appendChild(tdRadio1);

                            const tdRadio2 = document.createElement('td');
                            const radioYa = document.createElement('input');
                            radioYa.type = 'radio';
                            radioYa.name = 'kesimpulan_radiologi_simpan_' + key; // Membuat nama radio unik per baris
                            radioYa.id = `kesimpulan_radiologi_simpan_yes_${key}`;
                            radioYa.value = 'Ya';
                            radioYa.className = 'rad1';
                            const labelYa = document.createElement('label');
                            labelYa.setAttribute('for', `kesimpulan_radiologi_simpan_yes_${key}`);
                            labelYa.textContent = 'Simpan';
                            tdRadio2.appendChild(radioYa);
                            tdRadio2.appendChild(labelYa);
                            trRadio.appendChild(tdRadio2);

                            tableRadio.appendChild(trRadio);
                            td3.appendChild(tableRadio);

                            tr.appendChild(td1);
                            tr.appendChild(td2);
                            tr.appendChild(td3);
                            tableBody.appendChild(tr);
                        }
                    });
                    expertise.appendChild(tableBody);

                }
            }
        });
    });
</script>

<script type="text/javascript">
    function insertData() {

        KelebihanBB = ($('input[name="kelebihan_bb_simpan"]:checked').val() === "Ya") ? $('#kelebihan_bb').val() : "";
        ObesitasSentral = ($('input[name="obesitas_sentral_simpan"]:checked').val() === "Ya") ? $('#obesitas_sentral').val() : "";
        TekananDarah = ($('input[name="tekanan_darah_simpan"]:checked').val() === "Ya") ? $('#tekanan_darah').val() : "";
        KesimpulanAntropometri = ($('input[name="kesimpulan_antropometri_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_antropometri').val() : "";
        Os = ($('input[name="os_simpan"]:checked').val() === "Ya") ? $('#os').val() : "";
        Od = ($('input[name="od_simpan"]:checked').val() === "Ya") ? $('#od').val() : "";
        StepTest = ($('input[name="step_test_simpan"]:checked').val() === "Ya") ? $('#step_test').val() : "";
        KesimpulanKeadaanUmum = ($('input[name="kesimpulan_keadaan_umum_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_keadaan_umum').val() : "";
        KesimpulanMata = ($('input[name="kesimpulan_mata_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_mata').val() : "";
        KesimpulanTht = ($('input[name="kesimpulan_tht_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_tht').val() : "";
        KesimpulanLeher = ($('input[name="kesimpulan_leher_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_leher').val() : "";
        KesimpulanDada = ($('input[name="kesimpulan_dada_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_dada').val() : "";
        KesimpulanParu = ($('input[name="kesimpulan_paru_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_paru').val() : "";
        KesimpulanJantung = ($('input[name="kesimpulan_jantung_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_jantung').val() : "";
        KesimpulanRonggaPerut = ($('input[name="kesimpulan_rongga_perut_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_rongga_perut').val() : "";
        KesimpulanUrogenital = ($('input[name="kesimpulan_urogenital_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_urogenital').val() : "";
        KesimpulanAnggotaGerak = ($('input[name="kesimpulan_anggota_gerak_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_anggota_gerak').val() : "";
        KesimpulanNeurologis = ($('input[name="kesimpulan_neurologis_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_neurologis').val() : "";
        KesimpulanGigiGeligi = ($('input[name="kesimpulan_gigi_geligi_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_gigi_geligi').val() : "";
        KesimpulanKardiologi = ($('input[name="kesimpulan_kardiologi_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_kardiologi').val() : "";
        KesimpulanThtSpesialis = ($('input[name="kesimpulan_tht_spesialis_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_tht_spesialis').val() : "";
        KesimpulanAudiometri = ($('input[name="kesimpulan_audiometri_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_audiometri').val() : "";
        KesimpulanParuSpesialis = ($('input[name="kesimpulan_paru_spesialis_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_paru_spesialis').val() : "";
        KesimpulanSpirometri = ($('input[name="kesimpulan_spirometri_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_spirometri').val() : "";
        KesimpulanMataSpesialis = ($('input[name="kesimpulan_mata_spesialis_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_mata_spesialis').val() : "";
        KesimpulanNeurologiSpesialis = ($('input[name="kesimpulan_neurologi_spesialis_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_neurologi_spesialis').val() : "";
        KesimpulanBedah = ($('input[name="kesimpulan_bedah_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_bedah').val() : "";
        KesimpulanKebidanan = ($('input[name="kesimpulan_kebidanan_simpan"]:checked').val() === "Ya") ? $('#kesimpulan_kebidanan').val() : "";

        var saran_klinis = [];
        $('input[name="saran_klinis"]').each(function() {
            if ($(this).is(":checked")) {
                if ($(this).attr('id') === 'saran_klinis5') { // Asumsi ID untuk checkbox 'lainnya' pada saran klinis adalah 'saran_klinis5'
                    if ($('#saran_klinis').val() !== '') { // Asumsi ID untuk input teks 'lainnya' adalah 'saran_klinis_lainnya'
                        saran_klinis.push('' + $('#saran_klinis').val()); // Gabungkan nilai checkbox dan teks
                    } else {
                        saran_klinis.push($(this).val()); // Jika input teks kosong, masukkan nilai checkbox saja
                    }
                } else {
                    saran_klinis.push($(this).val());
                }
            }
        });
        saran_klinis = saran_klinis.join(';');

        var kurangi = [];
        $('input[name="kurangi"]').each(function() {
            if ($(this).is(":checked")) {
                if ($(this).attr('id') === 'kurangi9') { // Asumsi ID untuk checkbox 'lainnya' pada kurangi adalah 'kurangi5'
                    if ($('#kurangi').val() !== '') { // Asumsi ID untuk input teks 'lainnya' adalah 'kurangi_lainnya'
                        kurangi.push('' + $('#kurangi').val()); // Gabungkan nilai checkbox dan teks
                    } else {
                        kurangi.push($(this).val()); // Jika input teks kosong, masukkan nilai checkbox saja
                    }
                } else {
                    kurangi.push($(this).val());
                }
            }
        });
        kurangi = kurangi.join(';');

        var konsul_ke = [];
        $('input[name="konsul_ke"]').each(function() {
            if ($(this).is(":checked")) {
                if ($(this).attr('id') === 'konsul_ke28') { // Asumsi ID untuk checkbox 'lainnya' pada konsul_ke adalah 'konsul_ke5'
                    if ($('#konsul_ke').val() !== '') { // Asumsi ID untuk input teks 'lainnya' adalah 'konsul_ke_lainnya'
                        konsul_ke.push('' + $('#konsul_ke').val()); // Gabungkan nilai checkbox dan teks
                    } else {
                        konsul_ke.push($(this).val()); // Jika input teks kosong, masukkan nilai checkbox saja
                    }
                } else {
                    konsul_ke.push($(this).val());
                }
            }
        });
        konsul_ke = konsul_ke.join(';');

        const kesimpulan_labor = [];
        const laborRows = document.querySelectorAll('.labor_row'); // Pilih semua baris data labor

        laborRows.forEach(row => {
            // Dapatkan indeks atau ID unik dari baris (misalnya, dari ID tr)
            const rowId = row.id.replace('hasil_labor_', '');

            // Cari radio button "Simpan" di dalam baris
            const radioSimpan = row.querySelector(`input[name="kesimpulan_labor_simpan_${rowId}"][value="Ya"]`);

            // Jika radio button "Simpan" dicentang
            if (radioSimpan && radioSimpan.checked) {
                // Cari input teks kesimpulan labor di dalam baris
                const inputKesimpulan = row.querySelector(`#kesimpulan_labor_${rowId}`);
                const pemeriksaan = row.querySelector(`#pemeriksaan_${rowId}`);

                // Jika input kesimpulan ditemukan, ambil nilainya
                if (inputKesimpulan) {
                    kesimpulan_labor.push({
                        index: rowId, // Atau informasi pengenal lainnya
                        kesimpulan: inputKesimpulan.value,
                        pemeriksaan: pemeriksaan.textContent
                    });
                }
            }
        });
        console.log(kesimpulan_labor);
        const kesimpulan_radiologi = [];
        const radiologiRows = document.querySelectorAll('.radiologi_row'); // Pilih semua baris data labor

        radiologiRows.forEach(row => {
            // Dapatkan indeks atau ID unik dari baris (misalnya, dari ID tr)
            const rowId1 = row.id.replace('hasil_radiologi_', '');

            // Cari radio button "Simpan" di dalam baris
            const radioSimpan1 = row.querySelector(`input[name="kesimpulan_radiologi_simpan_${rowId1}"][value="Ya"]`);

            // Jika radio button "Simpan" dicentang
            if (radioSimpan1 && radioSimpan1.checked) {
                // Cari input teks kesimpulan labor di dalam baris
                const inputKesimpulan1 = row.querySelector(`#kesimpulan_radiologi_${rowId1}`);
                const pemeriksaan1 = row.querySelector(`#pemeriksaan_radiologi_${rowId1}`).querySelector("strong");

                // Jika input kesimpulan ditemukan, ambil nilainya
                if (inputKesimpulan1) {
                    kesimpulan_radiologi.push({
                        index: rowId1, // Atau informasi pengenal lainnya
                        kesimpulan: inputKesimpulan1.value,
                        pemeriksaan: pemeriksaan1.textContent

                    });
                }
            }
        });
        // console.log(kesimpulan_radiologi);

        swal({
            title: "Apakah kamu yakin ingin !",
            text: "Menyimpan Data  ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function() {
            $().ready(function() {
                $.ajax({
                    url: "<?php echo base_url() ?>Kesimpulan_mcu/simpan_klinis",
                    method: "POST",
                    dataType: "json",
                    data: {
                        id_mcu: $('#id_mcu').val(),
                        KelebihanBB: KelebihanBB,
                        ObesitasSentral: ObesitasSentral,
                        TekananDarah: TekananDarah,
                        KesimpulanAntropometri: KesimpulanAntropometri,
                        Os: Os,
                        Od: Od,
                        StepTest: StepTest,
                        pemeriksaan_fisik: {
                            "keadaan_umum": KesimpulanKeadaanUmum,
                            "mata": KesimpulanMata,
                            "tht": KesimpulanTht,
                            "leher": KesimpulanLeher,
                            "dada": KesimpulanDada,
                            "paru": KesimpulanParu,
                            "jantung": KesimpulanJantung,
                            "rongga_perut": KesimpulanRonggaPerut,
                            "urogenital": KesimpulanUrogenital,
                            "anggota_gerak": KesimpulanAnggotaGerak,
                            "neurologis": KesimpulanNeurologis,
                        },
                        kesimpulan_spesialis: {
                            "gigi_geligi": KesimpulanGigiGeligi,
                            "kardiologi": KesimpulanKardiologi,
                            "tht_spesialis": KesimpulanThtSpesialis,
                            "audiometri": KesimpulanAudiometri,
                            "paru_spesialis": KesimpulanParuSpesialis,
                            "spirometri": KesimpulanSpirometri,
                            "mata_spesialis": KesimpulanMataSpesialis,
                            "neurologi_spesialis": KesimpulanNeurologiSpesialis,
                            "bedah": KesimpulanBedah,
                            "kebidanan": KesimpulanKebidanan
                        },

                        kesimpulan_labor: kesimpulan_labor,
                        kesimpulan_radiologi: kesimpulan_radiologi,
                        saran_klinis: saran_klinis,
                        kurangi: kurangi,
                        konsul_ke: konsul_ke,
                        ulangi_pemeriksaan: $('input[name="ulangi_pemeriksaan"]:checked').val(),
                        pemeriksaan_lanjut: $("#pemeriksaan_lanjut").val()
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            swal({
                                title: "good job!",
                                type: "success",
                                text: "Data Medical Check Up Pasien ini telah disimpan",
                                confirmButtonColor: "#3cb878",
                            }, function() {
                                location.reload();
                            });


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

    $(document).ready(function() {
        id_pelayanan = $('#id_mcu').val();
        $.ajax({
            url: "<?php echo base_url() ?>Pemeriksaan_fisik_mcu/get_data_pemeriksaan",
            method: "POST",
            dataType: 'json',
            data: {
                id: id_pelayanan,
                table: 'kesimpulan_klinis',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('input[type="checkbox"]').prop('checked', false);
                    $('#kelebihan_bb').val(data.KelebihanBB);
                    if (data.KelebihanBB !== '') {
                        $('input[name="kelebihan_bb_simpan"][value="Ya"]').prop("checked", true).trigger("change");
                    }

                    $('#obesitas_sentral').val(data.ObesitasSentral);
                    if (data.ObesitasSentral !== '') {
                        $('input[name="obesitas_sentral_simpan"][value="Ya"]').prop("checked", true).trigger("change");
                    }
                    $('#tekanan_darah').val(data.TekananDarah);
                    if (data.TekananDarah !== '') {
                        $('input[name="tekanan_darah_simpan"][value="Ya"]').prop("checked", true).trigger("change");
                    }
                    $('#kesimpulan_antropometri').val(data.KesimpulanAntropometri);
                    if (data.KesimpulanAntropometri !== '') {
                        $('input[name="kesimpulan_antropometri_simpan"][value="Ya"]').prop("checked", true).trigger("change");
                    }
                    $('#os').val(data.Os);
                    if (data.Os !== '') {
                        $('input[name="os_simpan"][value="Ya"]').prop("checked", true).trigger("change");
                    }
                    $('#od').val(data.Od);
                    if (data.Od !== '') {
                        $('input[name="od_simpan"][value="Ya"]').prop("checked", true).trigger("change");
                    }
                    $('#step_test').val(data.StepTest);
                    if (data.StepTest !== '') {
                        $('input[name="step_test_simpan"][value="Ya"]').prop("checked", true).trigger("change");
                    }

                    var pemeriksaan_lanjut_array = data.pemeriksaan_lanjut.split(',');
                    $('#pemeriksaan_lanjut').tagsinput();
                    $.each(pemeriksaan_lanjut_array, function(index, value) {
                        $("#pemeriksaan_lanjut").tagsinput('add', value);
                    });

                    $('input[name="ulangi_pemeriksaan"][value="' + data.ulangi_pemeriksaan + '"]').prop("checked", true);

                    if (data.saran_klinis != '') {
                        var saran_klinis = data.saran_klinis.split(';');
                        var saran_klinis_array = saran_klinis.map(function(item) {
                            return item.trim();
                        });
                        // console.log(saran_klinis_array);

                        $.each(saran_klinis_array, function(index, value) {
                            // Pilih checkbox dengan name 'saran_klinis[]' dan value yang sesuai dengan nilai saat ini
                            $('input[name="saran_klinis"][value="' + value + '"]').prop("checked", true);
                            if (value != 'PERTAHANKAN KESEHATAN ANDA' && value != 'TINGKATKAN KESEHATAN ANDA' && value != 'OLAHRAGA TERATUR DAN TERUKUR (AEROBIK 3-4 KALI SEMINGGU @ 15 MENIT)' && value != 'MINUM AIR PUTIH 8 GELAS/HARI') {
                                $('input[name="saran_klinis"][value="Lainnya"').prop("checked", true);
                                $('#saran_klinis').val(value); // Asumsi ada input dengan ID 'saran_klinis_lainnya' untuk nilai lainnya
                            }
                        });
                    }
                    if (data.kurangi != '') {
                        var kurangi = data.kurangi.split(';');
                        var kurangi_array = kurangi.map(function(item) {
                            return item.trim();
                        });
                        // console.log(kurangi_array);

                        $.each(kurangi_array, function(index, value) {
                            // Pilih checkbox dengan name 'kurangi' dan value yang sesuai dengan nilai saat ini
                            $('input[name="kurangi"][value="' + value + '"]').prop("checked", true);
                            if (value != 'ROKOK' && value != 'MAKANAN ASAM-ASAM' && value != 'MINUMAN BERALKOHOL' && value != 'MAKANAN ASIN-ASIN' && value != 'MAKANAN PEDAS' && value != 'MAKANAN MANIS-MANIS' && value != 'MAKANAN BANYAK LEMAK/GAJIH' && value != 'MAKANAN JEROAN,EMPING/MELINJO/KACANG-KACANGAN') {
                                $('input[name="kurangi"][value="Lainnya"').prop("checked", true);
                                $('#kurangi').val(value); // Asumsi ada input dengan ID 'kurangi_lainnya' untuk nilai lainnya
                            }
                        });
                    }
                    if (data.konsul_ke != '') {
                        var konsul_ke = data.konsul_ke.split(';');
                        var konsul_ke_array = konsul_ke.map(function(item) {
                            return item.trim();
                        });
                        // console.log(konsul_ke_array);

                        $.each(konsul_ke_array, function(index, value) {
                            // Pilih checkbox dengan name 'konsul_ke' dan value yang sesuai dengan nilai saat ini
                            $('input[name="konsul_ke"][value="' + value + '"]').prop("checked", true);
                            if (value != 'AHLI GIZI' && value != 'ANDROLOGI' && value != 'BEDAH DIGESTIF' && value != 'BEDAH MULUT' && value != 'BEDAH SYARAF' && value != 'BEDAH TULANG' && value != 'BEDAH UMUM' && value != 'FISIOTERAPIS' && value != 'GASTROENTEROLOGIST' && value != 'GIGI' && value != 'JANTUNG DAN PEMBULUH DARAH' && value != 'KEBIDANAN DAN KANDUNGAN' && value != 'KONSERVASI GIGI' && value != 'KULIT DAN KELAMIN' && value != 'MATA' && value != 'NEUROLOGI' && value != 'OKUPASI' && value != 'PARU' && value != 'PENYAKIT DALAM' && value != 'PSIKIATRI' && value != 'PSIKOLOGI' && value != 'REHABILITASI' && value != 'SYARAF' && value != 'TERAPI OKUPASI' && value != 'THT' && value != 'UMUM' && value != 'UROLOGI') {
                                $('input[name="konsul_ke"][value="Lainnya"').prop("checked", true);
                                $('#konsul_ke').val(value); // Asumsi ada input dengan ID 'konsul_ke_lainnya' untuk nilai lainnya
                            }
                        });
                    }

                    if (data.pemeriksaan_fisik !== '') {
                        var pemeriksaan_fisikValue = JSON.parse(data.pemeriksaan_fisik);
                        // console.log(pemeriksaan_fisikValue);
                        Object.keys(pemeriksaan_fisikValue).forEach(function(key) {
                            const value = pemeriksaan_fisikValue[key];
                            // console.log(value);
                            $('#kesimpulan_' + key + '').val(value);
                            $('input[name="kesimpulan_' + key + '_simpan"][value="Ya"]').prop("checked", true).change();
                        });
                    }

                    if (data.kesimpulan_spesialis !== '') {
                        var kesimpulan_spesialisValue = JSON.parse(data.kesimpulan_spesialis);
                        // console.log(pemeriksaan_fisikValue);
                        Object.keys(kesimpulan_spesialisValue).forEach(function(key) {
                            const value1 = kesimpulan_spesialisValue[key];
                            // console.log(value);
                            $('#kesimpulan_' + key + '').val(value1);
                            $('input[name="kesimpulan_' + key + '_simpan"][value="Ya"]').prop("checked", true).change();
                        });
                    }

                    if (data.kesimpulan_labor !== '' && data.kesimpulan_labor !== 'null' && data.kesimpulan_labor !== null) {
                        var kesimpulan_laborValue = JSON.parse(data.kesimpulan_labor);
                        // console.log(kesimpulan_laborValue);
                        Object.keys(kesimpulan_laborValue).forEach(function(key) {
                            const value2 = kesimpulan_laborValue[key];
                            // console.log(value2);
                            $('#kesimpulan_labor_' + value2.index + '').val(value2.kesimpulan);
                            $('input[name="kesimpulan_labor_simpan_' + value2.index + '"][value="Ya"]').prop("checked", true).change();
                        });
                    }

                    if (data.kesimpulan_radiologi !== '' && data.kesimpulan_radiologi !== 'null' && data.kesimpulan_radiologi !== null) {
                        var kesimpulan_radiologiValue = JSON.parse(data.kesimpulan_radiologi);
                        // console.log(kesimpulan_radiologiValue);
                        Object.keys(kesimpulan_radiologiValue).forEach(function(key) {
                            const value3 = kesimpulan_radiologiValue[key];
                            // console.log(value2);
                            $('#kesimpulan_radiologi_' + value3.index + '').val(value3.kesimpulan);
                            $('input[name="kesimpulan_radiologi_simpan_' + value3.index + '"][value="Ya"]').prop("checked", true).change();
                        });
                    }
                }
            }

        });
    });
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>