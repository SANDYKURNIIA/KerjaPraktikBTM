<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h2 class="panel-title txt-dark">PEMANTAUAN PELAKSANAAN HEMODIALISIS HARIAN</h2>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <div class="panel-wrapper collapse in">
                <input type="hidden" name="id_pelayanan" id="id_pelayanan" value="<?= $id_pelayanan ?>">
                <input type="hidden" name="id_history" id="id_history" value="<?= $id_history ?>">

                <!-- Data Pasien -->
                <div class="panel-body">
                    <h5 class="text-primary mb-20"><strong>DATA PASIEN</strong></h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">No. RM</label>
                                <input type="text" name="no_rm" disabled class="form-control" value="<?= $no_rm ?>" id="no_rm">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Nama</label>
                                <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Jenis Kelamin</label>
                                <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Tgl Lahir / Umur</label>
                                <input type="text" disabled class="form-control" value="<?= $tgl_lahir ?>" id="inTglLahir">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Jam/Tanggal Masuk</label>
                                <input type="text" disabled class="form-control" value="<?= $tgl_masuk ?>" id="inTglMasuk">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Cara Bayar</label>
                                <input type="text" disabled class="form-control" value="<?= $cara_bayar ?>" id="inCaraBayar">
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="light-grey-hr">

                <!-- Form Input -->
                <div class="panel-body">
                    <!-- Gelang Identitas -->
                    <div class="form-section mb-30">
                        <h5 class="text-primary mb-15"><strong>GELANG IDENTITAS PASIEN</strong></h5>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="gelang_identitas_status" value="Sudah terpasang" id="gelang_sudah"> 
                                Sudah terpasang
                            </label>
                            <label class="radio-inline ml-20">
                                <input type="radio" name="gelang_identitas_status" value="Belum terpasang" id="gelang_belum"> 
                                Belum terpasang
                            </label>
                        </div>
                        <div id="gelang_alasan_box" style="display:none;" class="mt-10">
                            <label class="control-label">Alasan:</label>
                            <input type="text" name="gelang_identitas_alasan" class="form-control" placeholder="Tuliskan alasan...">
                        </div>
                    </div>

                    <!-- Riwayat Alergi -->
                    <div class="form-section mb-30">
                        <h5 class="text-primary mb-15"><strong>RIWAYAT ALERGI</strong></h5>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="alergi_status" value="Tidak" id="alergi_tidak"> Tidak
                            </label>
                            <label class="radio-inline ml-20">
                                <input type="radio" name="alergi_status" value="Ya" id="alergi_ya"> Ya, sebutkan
                            </label>
                        </div>
                        <div id="alergi_sebutkan_box" style="display:none;" class="mt-10">
                            <label class="control-label">Sebutkan alergi:</label>
                            <input type="text" name="alergi_keterangan" class="form-control" placeholder="Tuliskan alergi...">
                        </div>
                        
                        <div class="mt-20">
                            <label class="control-label"><strong>Gelang Alergi:</strong></label>
                            <div class="form-group mt-5">
                                <label class="radio-inline">
                                    <input type="radio" name="gelang_alergi_status" value="Sudah terpasang" id="gelang_alergi_sudah"> 
                                    Sudah terpasang
                                </label>
                                <label class="radio-inline ml-20">
                                    <input type="radio" name="gelang_alergi_status" value="Belum terpasang" id="gelang_alergi_belum"> 
                                    Belum terpasang
                                </label>
                            </div>
                            <div id="gelang_alergi_alasan_box" style="display:none;" class="mt-10">
                                <label class="control-label">Alasan:</label>
                                <input type="text" name="gelang_alergi_alasan" class="form-control" placeholder="Tuliskan alasan...">
                            </div>
                        </div>
                    </div>

                    <!-- Akses Vaskuler -->
                    <div class="form-section mb-30">
                        <h5 class="text-primary mb-15"><strong>AKSES VASKULER</strong></h5>
                        
                        <div class="form-group">
                            <label class="control-label"><strong>Jenis:</strong></label>
                            <div class="checkbox-list mt-5">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="akses_jenis" value="FISTULA AV (CIMINO)"> FISTULA AV (CIMINO)
                                </label>
                                <label class="checkbox-inline ml-20">
                                    <input type="checkbox" name="akses_jenis" value="GRAFT AV"> GRAFT AV
                                </label>
                                <br>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="akses_jenis" value="TUNNEL CATHETER"> TUNNEL CATHETER
                                </label>
                                <label class="checkbox-inline ml-20">
                                    <input type="checkbox" name="akses_jenis" value="DOUBLE LUMEN CATHETER"> DOUBLE LUMEN CATHETER
                                </label>
                                <br>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="akses_jenis" value="FEMORAL"> FEMORAL
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Lokasi:</label>
                                    <input type="text" name="akses_lokasi" class="form-control" placeholder="Tuliskan lokasi...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Kondisi:</label>
                                    <input type="text" name="akses_kondisi" class="form-control" placeholder="Tuliskan kondisi...">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tanda Infeksi:</label>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" name="akses_infeksi" value="Ya"> Ya
                                        </label>
                                        <label class="radio-inline ml-20">
                                            <input type="radio" name="akses_infeksi" value="Tidak"> Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Aneurisma:</label>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" name="akses_aneurisma" value="Ya"> Ya
                                        </label>
                                        <label class="radio-inline ml-20">
                                            <input type="radio" name="akses_aneurisma" value="Tidak"> Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thrill (AV Fistula):</label>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" name="akses_thrill" value="Lemah"> Lemah
                                        </label>
                                        <label class="radio-inline ml-20">
                                            <input type="radio" name="akses_thrill" value="Tidak"> Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Bruit (AV Fistula):</label>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" name="akses_bruit" value="Lemah"> Lemah
                                        </label>
                                        <label class="radio-inline ml-20">
                                            <input type="radio" name="akses_bruit" value="Tidak"> Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Lain-lain:</label>
                            <input type="text" name="akses_lain" class="form-control" placeholder="Tuliskan lainnya...">
                        </div>

                        <!-- Catheter Info -->
                        <div class="well well-sm mt-20">
                            <h6 class="mb-15"><strong>Untuk Tunnel dan Double Lumen Catheter:</strong></h6>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Ukuran Lumen Arteri (cm):</label>
                                    <input type="number" name="lumen_arteri_cm" class="form-control" placeholder="cm">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Ukuran Lumen Vena (cm):</label>
                                    <input type="number" name="lumen_vena_cm" class="form-control" placeholder="cm">
                                </div>
                            </div>

                            <div class="row mt-10">
                                <div class="col-md-6">
                                    <label class="control-label">Panjang DL Arteri (cc):</label>
                                    <input type="number" name="panjang_dl_arteri_cc" class="form-control" placeholder="cc">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Panjang DL Vena (cc):</label>
                                    <input type="number" name="panjang_dl_vena_cc" class="form-control" placeholder="cc">
                                </div>
                            </div>

                            <div class="row mt-10">
                                <div class="col-md-6">
                                    <label class="control-label">Antibiotic Lock Arteri (cc):</label>
                                    <input type="number" name="antibiotic_lock_arteri_cc" class="form-control" placeholder="cc">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Antibiotic Lock Vena (cc):</label>
                                    <input type="number" name="antibiotic_lock_vena_cc" class="form-control" placeholder="cc">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mesin HD -->
                    <div class="form-section mb-30">
                        <h5 class="text-primary mb-15"><strong>MESIN HD</strong></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Jenis Mesin:</label>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" name="mesin_hd" value="B-Braun"> B-Braun
                                        </label>
                                        <label class="radio-inline ml-20">
                                            <input type="radio" name="mesin_hd" value="Nipro"> Nipro
                                        </label>
                                        <label class="radio-inline ml-20">
                                            <input type="radio" name="mesin_hd" value="Fresenius"> Fresenius
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">No Mesin:</label>
                                    <input type="text" name="mesin_no" class="form-control" placeholder="Masukkan no mesin...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dialisat -->
                    <div class="form-section mb-30">
                        <h5 class="text-primary mb-15"><strong>DIALISAT</strong></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Jenis Calcium:</label>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" name="dialisat_ca" value="High Calcium"> High Calcium (Ca > 1.3 mmol/L)
                                        </label>
                                        <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="dialisat_ca" value="Low Calcium"> Low Calcium (Ca < 1.3 mmol/L)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Suhu (°C):</label>
                                    <input type="text" name="dialisat_suhu" class="form-control" placeholder="°C">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dialiser -->
                    <div class="form-section mb-30">
                        <h5 class="text-primary mb-15"><strong>DIALISER</strong></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Model:</label>
                                    <input type="text" name="dialiser_model" class="form-control" placeholder="Masukkan model...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Jenis Flux:</label>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" name="dialiser_flux" value="Low Flux"> Low Flux
                                        </label>
                                        <label class="radio-inline ml-20">
                                            <input type="radio" name="dialiser_flux" value="High Flux"> High Flux
                                        </label>
                                        <label class="radio-inline ml-20">
                                            <input type="radio" name="dialiser_flux" value="Super High Flux"> Super High Flux
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Kondisi:</label>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" name="dialiser_kondisi" value="Baru"> Baru
                                        </label>
                                        <label class="radio-inline ml-20">
                                            <input type="radio" name="dialiser_kondisi" value="Reuse"> Reuse
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BB Kering -->
                    <div class="form-section mb-30">
                        <h5 class="text-primary mb-15"><strong>BB KERING</strong></h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Berat Badan Kering (kg):</label>
                                    <input type="number" name="bb_kering_kg" class="form-control" placeholder="kg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Resep HD -->
                    <div class="form-section mb-30">
                        <h5 class="text-primary mb-15"><strong>RESEP HD (diisi oleh Dokter)</strong></h5>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Lama HD (Jam):</label>
                                    <input type="number" name="lama_hd_jam" class="form-control" placeholder="Jam">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Blood Flow Rate (Qb) mL/menit:</label>
                                    <input type="number" name="blood_flow_rate_ml_menit" class="form-control" placeholder="mL/menit">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Ultrafiltration Goal (UFG) Liter:</label>
                                    <input type="number" name="ufg" class="form-control" placeholder="Liter">
                                </div>
                            </div>
                        </div>

                        <div class="well well-sm mt-20">
                            <h6 class="mb-15"><strong>Heparin:</strong></h6>
                            <div class="form-group">
                                <label class="control-label">Jenis:</label>
                                <div>
                                    <label class="radio-inline">
                                        <input type="radio" name="heparin_jenis" value="Reguler"> Reguler
                                    </label>
                                    <label class="radio-inline ml-20">
                                        <input type="radio" name="heparin_jenis" value="Minimal"> Minimal
                                    </label>
                                    <label class="radio-inline ml-20">
                                        <input type="radio" name="heparin_jenis" value="Free"> Free
                                    </label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Total (IU):</label>
                                        <input type="number" name="heparin_total" class="form-control" placeholder="IU">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Bolus Awal (IU):</label>
                                        <input type="number" name="heparin_bolus" class="form-control" placeholder="IU">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Kontinyu (IU):</label>
                                        <input type="number" name="heparin_kontinyu" class="form-control" placeholder="IU">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lain-lain -->
                    <div class="form-section mb-30">
                        <h5 class="text-primary mb-15"><strong>LAIN-LAIN</strong></h5>
                        <div class="form-group">
                            <input type="text" name="lain_lain_1" class="form-control mb-10" placeholder="Tuliskan keterangan lain-lain...">
                            <input type="text" name="lain_lain_2" class="form-control" placeholder="Baris tambahan...">
                        </div>
                    </div>

                    <!-- Perubahan Obat -->
                    <div class="form-section mb-30">
                        <h5 class="text-primary mb-15"><strong>PERUBAHAN OBAT RUTIN</strong></h5>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="perubahan_obat" value="Ya"> Ya (Tuliskan di Catatan Perkembangan Terintegrasi)
                            </label>
                            <label class="radio-inline ml-20">
                                <input type="radio" name="perubahan_obat" value="Tidak"> Tidak
                            </label>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="text-right mt-30">
                        <button type="button" onclick="history.back()" class="btn btn-default btn-lg">
                            <i class="fa fa-arrow-left"></i> KEMBALI
                        </button>
                        <button type="button" onclick="simpan()" class="btn btn-success btn-lg" id="btnSimpan">
                            <i class="fa fa-save"></i> SIMPAN DATA
                        </button>

                        <button type="button" onclick="cetak()" class="btn btn-success btn-lg" id="btnSimpan">
                            <i class="fa fa-save"></i> CETAK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
        color: #000;
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
</style>

<script>
    $(document).ready(function () {

        let id_history = $('#id_history').val();
        let id_pelayanan = $('#id_pelayanan').val();

        $.ajax({
            url: "<?php echo base_url() ?>Pemantauan_pelaksanaan_hemodialis_harian/get_data_pemantauan",
            method: "POST",
            dataType: 'json',
            data: {
                id_pelayanan: id_pelayanan,
                id_history: id_history
            },
            success: function (data) {
                if (data.status === 'found') {

                    let hasil = data.data;

                    // LOOP semua field otomatis
                    $.each(hasil, function (key, value) {

                        // TEXT / NUMBER / HIDDEN
                        if ($('[name="' + key + '"]').is('input[type="text"], input[type="number"], input[type="hidden"], textarea')) {
                            $('[name="' + key + '"]').val(value);
                        }

                        // SELECT
                        if ($('[name="' + key + '"]').is('select')) {
                            $('[name="' + key + '"]').val(value).trigger('change');
                        }

                        // RADIO
                        if ($('[name="' + key + '"]').is('input[type="radio"]')) {
                            $('input[name="' + key + '"][value="' + value + '"]').prop('checked', true);
                        }

                        // CHECKBOX
                        if ($('[name="' + key + '"]').is('input[type="checkbox"]')) {
                            if (value !== null && value !== '') {
                                $('input[name="' + key + '"][value="' + value + '"]').prop('checked', true);
                            }
                        }
                    });

                    // Ubah tombol
                    $('#btnSimpan')
                        .html('<i class="fa fa-edit"></i> <span class="btn-text">Update Data</span>')
                        .removeClass('btn-success')
                        .addClass('btn-primary');

                }
            }
        });
    });

    // Toggle Gelang Identitas Alasan
    document.getElementById('gelang_belum').addEventListener('change', function () {
        document.getElementById('gelang_alasan_box').style.display = this.checked ? 'block' : 'none';
    });
    document.getElementById('gelang_sudah').addEventListener('change', function () {
        document.getElementById('gelang_alasan_box').style.display = 'none';
    });

    // Toggle Alergi Sebutkan
    document.getElementById('alergi_ya').addEventListener('change', function () {
        document.getElementById('alergi_sebutkan_box').style.display = this.checked ? 'block' : 'none';
    });
    document.getElementById('alergi_tidak').addEventListener('change', function () {
        document.getElementById('alergi_sebutkan_box').style.display = 'none';
    });

    // Toggle Gelang Alergi Alasan
    document.getElementById('gelang_alergi_belum').addEventListener('change', function () {
        document.getElementById('gelang_alergi_alasan_box').style.display = this.checked ? 'block' : 'none';
    });
    document.getElementById('gelang_alergi_sudah').addEventListener('change', function () {
        document.getElementById('gelang_alergi_alasan_box').style.display = 'none';
    });


    function cetak() {
        let id_history = $('#id_history').val();
        let id_pelayanan = $('#id_pelayanan').val();

        let url = "<?= base_url('Pemantauan_pelaksanaan_hemodialis_harian/cetak_pemantauan') ?>" 
                + "/" + id_pelayanan 
                + "/" + id_history;

        window.open(url, '_blank');
    }

    function simpan() {
        const formData = new FormData();

        document.querySelectorAll('input[name], select[name], textarea[name]').forEach(input => {
            if (input.type === 'radio' || input.type === 'checkbox') {
                if (input.checked) {
                    // Untuk checkbox yang bisa multiple, kita append value
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

        // Convert FormData to object for logging
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });

        swal({
            title: "Simpan Data Hemodialisis?",
            text: "Apakah Anda yakin ingin menyimpan data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Ya, Simpan",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "<?php echo base_url() ?>Pemantauan_pelaksanaan_hemodialis_harian/save",
                    method: "POST",
                    dataType: 'json',
                    data: data,
                    success: function (response) {
                        swal({
                            title: "Berhasil!",
                            text: response.message,
                            type: "success",
                            confirmButtonColor: "#3cb878"
                        });

                        if (response.type === 'insert') {
                            document.getElementById('btnSimpan').innerHTML = '✏️ UPDATE DATA';
                            document.getElementById('btnSimpan').className = 'btn btn-primary';
                        }
                    },
                    error: function () {
                        swal("Gagal!", "Terjadi kesalahan saat menyimpan data", "error");
                    }
                });
            }
        });

    }
</script>