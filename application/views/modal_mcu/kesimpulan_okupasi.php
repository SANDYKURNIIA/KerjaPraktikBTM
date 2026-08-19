<div class="page_content">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h2 class="panel-title txt-dark"><strong>KESIMPULAN OKUPASI</strong></h2>
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
                                <h4 class="panel-title txt-dark"><b><strong>Kesimpulan Okupasi</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-6">

                                        <div class="radio-button radio-button-primary">
                                            <input id="kesimpulan_okupasi1" type="radio" name="kesimpulan_okupasi" value="Dicurigai Berhubung Dengan Pekerjaan" checked>
                                            <label class="control-label" for="kesimpulan_okupasi1">
                                                Dicurigai Berhubung Dengan Pekerjaan
                                            </label>
                                        </div>

                                        <div class="radio-button radio-button-primary">
                                            <input id="kesimpulan_okupasi2" type="radio" name="kesimpulan_okupasi" value="Tidak Dicurigai Berhubung Dengan Pekerjaan">
                                            <label class="control-label" for="kesimpulan_okupasi2">
                                                Tidak Dicurigai Berhubung Dengan Pekerjaan
                                            </label>
                                        </div>

                                        <div class="radio-button radio-button-primary">
                                            <input id="kesimpulan_okupasi3" type="radio" name="kesimpulan_okupasi" value="Akibat Pekerjaan">
                                            <label class="control-label" for="kesimpulan_okupasi3">
                                                Akibat Pekerjaan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <h4 class="panel-title txt-dark"><b><strong>Rekomendasi Okupasi</strong></b></h4>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-primary">
                                            <input id="rekom_okupasi1" type="checkbox" name="rekom_okupasi[]" value="Sehat Untuk Bekerja (Fit To Work)" checked>
                                            <label class="control-label" for="rekom_okupasi1">
                                                Sehat Untuk Bekerja (<i>Fit To Work</i>)
                                            </label>
                                        </div>

                                        <div class="checkbox checkbox-primary">
                                            <input id="rekom_okupasi2" type="checkbox" name="rekom_okupasi[]" value="Sehat Untuk Bekerja Dengan Keterbatasan Tertentu / Catatan (Fit To Work With Restriction / Note)">
                                            <label class="control-label" for="rekom_okupasi2">
                                                Sehat Untuk Bekerja Dengan Keterbatasan Tertentu / Catatan (<i>Fit To Work With Restriction / Note</i>)
                                            </label>
                                            <div class="has-success">
                                                <input type="text" class="form-control" value="" id="rekom_okupasi" style="display: block;">
                                            </div>
                                        </div>

                                        <div class="checkbox checkbox-primary">
                                            <input id="rekom_okupasi3" type="checkbox" name="rekom_okupasi[]" value="Tidak Sehat Untuk Sementara Waktu (Temporary Unfit)">
                                            <label class="control-label" for="rekom_okupasi3">
                                                Tidak Sehat Untuk Sementara Waktu (<i>Temporary Unfit</i>)
                                            </label>
                                        </div>

                                        <div class="checkbox checkbox-primary">
                                            <input id="rekom_okupasi4" type="checkbox" name="rekom_okupasi[]" value="Tidak Sehat Untuk Bekerja (Unfit To Work)">
                                            <label class="control-label" for="rekom_okupasi4">
                                                Tidak Sehat Untuk Bekerja (<i>Unfit To Work</i>)
                                            </label>
                                        </div>

                                        <div class="checkbox checkbox-primary">
                                            <input id="rekom_okupasi5" type="checkbox" name="rekom_okupasi[]" value="Hasil Belum Lengkap, Masih Memerlukan Tambahan (The Result Uncompleted, Need Further Examination As Needed)">
                                            <label class="control-label" for="rekom_okupasi5">
                                                Hasil Belum Lengkap, Masih Memerlukan Tambahan (<i>The Result Uncompleted, Need Further Examination As Needed</i>)
                                            </label>
                                        </div>

                                        <div class="checkbox checkbox-primary">
                                            <input id="rekom_okupasi6" type="checkbox" name="rekom_okupasi[]" value="Bila Perlu Calon Karyawan Diberi Kesempatan Berobat 14, Kemudian Periksa Kembali">
                                            <label class="control-label" for="rekom_okupasi6">
                                                Bila Perlu Calon Karyawan Diberi Kesempatan Berobat 14, Kemudian Periksa Kembali
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u><strong> STATUS DERAJAT KESEHATAN </strong></u></p>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="radio-list" id="kesehatan-radio-group">
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u><strong>Resiko SKJ</strong></u></p>
                                        </label>
                                        <div class="form-group">
                                            <input type="radio" id="resiko_skj1" name="resiko_skj" value="Ringan" checked>
                                            <label class="control-label" for="resiko_skj1">Ringan</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="resiko_skj2" name="resiko_skj" value="Sedang">
                                            <label class="control-label" for="resiko_skj2">Sedang</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="resiko_skj3" name="resiko_skj" value="Berat">
                                            <label class="control-label" for="resiko_skj3">Berat</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u><strong>SARAN OKUPASI</strong></u></p>
                                        </label>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="checkbox checkbox-primary">
                                            <input id="saran_okupasi1" type="checkbox" name="saran_okupasi" value="Gunakan Selalu APD yang tepat, Sesuai, Dan Benar Saat Bekerja">
                                            <label class="control-label" for="saran_okupasi1">
                                                Gunakan Selalu APD yang tepat, Sesuai, Dan Benar Saat Bekerja
                                            </label>
                                        </div>

                                        <div class="checkbox checkbox-primary">
                                            <input id="saran_okupasi2" type="checkbox" name="saran_okupasi" value="Lainnya">
                                            <label class="control-label" for="saran_okupasi2">
                                                Lainnya :
                                            </label>
                                            <div class="has-success">
                                                <input type="text" class="form-control" id="saran_okupasi" value="" style="display: block;">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u><strong>HINDARI TEMPAT / LINGKUNGAN KERJA</strong></u></p>
                                        </label>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="checkbox checkbox-primary">
                                            <input id="hindari_tempat1" type="checkbox" name="hindari_tempat" value="Berdebu">
                                            <label class="control-label" for="hindari_tempat1">
                                                Berdebu
                                            </label>
                                        </div>

                                        <div class="checkbox checkbox-primary">
                                            <input id="hindari_tempat2" type="checkbox" name="hindari_tempat" value="panas tinggi">
                                            <label class="control-label" for="hindari_tempat2">
                                                Panas tinggi
                                            </label>
                                        </div>

                                        <div class="checkbox checkbox-primary">
                                            <input id="hindari_tempat3" type="checkbox" name="hindari_tempat" value="bising">
                                            <label class="control-label" for="hindari_tempat3">
                                                Bising
                                            </label>
                                        </div>

                                        <div class="checkbox checkbox-primary">
                                            <input id="hindari_tempat4" type="checkbox" name="hindari_tempat" value="mengandung radiasi">
                                            <label class="control-label" for="hindari_tempat4">
                                                Mengandung radiasi
                                            </label>
                                        </div>

                                        <div class="checkbox checkbox-primary">
                                            <input id="hindari_tempat5" type="checkbox" name="hindari_tempat" value="Lainnya">
                                            <label class="control-label" for="hindari_tempat5">
                                                Lainnya :
                                            </label>
                                            <div class="has-success">
                                                <input type="text" class="form-control" id="hindari_tempat" value="" style="display: block;">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u><strong>HINDARI BEKERJA DENGAN</strong></u></p>
                                        </label>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="checkbox checkbox-primary">
                                            <input id="hindari_kerja1" type="checkbox" name="hindari_kerja" value="Bahan Kimia">
                                            <label class="control-label" for="hindari_kerja1">
                                                Bahan Kimia
                                            </label>
                                        </div>

                                        <div class="checkbox checkbox-primary">
                                            <input id="hindari_kerja2" type="checkbox" name="hindari_kerja" value="Pelarut Organix/Oil/Gemuk/Grease">
                                            <label class="control-label" for="hindari_kerja2">
                                                Pelarut Organix/Oil/Gemuk/Grease
                                            </label>
                                        </div>

                                        <div class="checkbox checkbox-primary">
                                            <input id="hindari_kerja3" type="checkbox" name="hindari_kerja" value="Naik Turun Tangga Lebih Dari 1 M">
                                            <label class="control-label" for="hindari_kerja3">
                                                Naik Turun Tangga Lebih Dari 1 M
                                            </label>
                                        </div>

                                        <div class="checkbox checkbox-primary">
                                            <input id="hindari_kerja4" type="checkbox" name="hindari_kerja" value="Angkat Beban Lebih Dari 1/3 BB">
                                            <label class="control-label" for="hindari_kerja4">
                                                Angkat Beban Lebih Dari 1/3 BB
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="hindari_kerja5" type="checkbox" name="hindari_kerja" value="Lainnya">
                                            <label class="control-label" for="hindari_kerja5">
                                                Lainnya :
                                            </label>
                                            <div class="has-success">
                                                <input type="text" class="form-control" id="hindari_kerja" value="" style="display: block;">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">
                                            <p><u><strong> Ulangi Pemeriksaan Kesehatan</strong></u></p>
                                        </label>
                                        <div class="form-group">
                                            <input type="radio" id="ulangi_pemeriksaan1" name="ulangi_pemeriksaan" value="2 Minggu Lagi">
                                            <label class="control-label" for="ulangi_pemeriksaan1">2 Minggu Lagi</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="ulangi_pemeriksaan2" name="ulangi_pemeriksaan" value="3 Bulan Lagi">
                                            <label class="control-label" for="ulangi_pemeriksaan2">3 Bulan Lagi</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="ulangi_pemeriksaan3" name="ulangi_pemeriksaan" value="6 Bulan Lagi">
                                            <label class="control-label" for="ulangi_pemeriksaan4">6 Bulan Lagi</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="ulangi_pemeriksaan3" name="ulangi_pemeriksaan" value="1 Tahun Lagi">
                                            <label class="control-label" for="ulangi_pemeriksaan4">1 Tahun Lagi</label>
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
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $('#keadaan_umum').collapse('show');
    });
    $(document).ready(function() {
        var kesehatanOptions = [{
                value: 'P1',
                label: 'P1. Tidak ditemukan kelainan medis'
            },
            {
                value: 'P2',
                label: 'P2. Ditemukan kelainan medis yang tidak serius'
            },
            {
                value: 'P3',
                label: 'P3. Ditemukan kelainan medis, risiko kesehatan rendah'
            },
            {
                value: 'P4',
                label: 'P4. Ditemukan kelainan medis bermakna yang dapat menjadi serius, risiko kesehatan sedang'
            },
            {
                value: 'P5',
                label: 'P5. Ditemukan kelainan medis yang serius, risiko kesehatan tinggi'
            },
            {
                value: 'P6',
                label: 'P6. Ditemukan kelainan medis yang menyebabkan keterbatasan fisik maupun psikis untuk melakukan pekerjaan sesuai jabatan/posisinya'
            },
            {
                value: 'P7',
                label: 'P7. Tidak dapat bekerja untuk melakukan pekerjaan sesuai jabatan/posisinya dan/atau posisi apapun, dalam perawatan di rumah sakit, atau dalam status ijin sakit'
            },
            {
                value: 'Lainnya',
                label: 'Lainnya'
            }
        ];

        var radioContainer = $('#kesehatan-radio-group');

        $.each(kesehatanOptions, function(index, option) {
            var radioDiv = $('<div class="radio-button radio-button-primary"></div>');

            var id = 'status_' + option.value.replace(/[^a-zA-Z0-9]/g, ''); // Membuat ID yang aman

            var value = option.label; // Set value sama dengan label

            var radio = $('<input type="radio" name="status_kesehatan" value="' + value + '" id="' + id + '">');
            var label = $('<label class="control-label" for="' + id + '">' + option.label + '</label>');

            radioDiv.append(radio);
            radioDiv.append(label);
            if (value === 'Lainnya') {
                var radioDivLainnya = $('<div class="has-success"></div>');
                var inputLainnya = $('<input type="text" class="form-control" id="status_kesehatan" value="" style="display: block;">');
                radioDiv.append(radioDivLainnya);
                radioDiv.append(inputLainnya);
            }


            // Menambahkan div radio-inline ke dalam container utama
            radioContainer.append(radioDiv);
        });
    });
</script>
<script type="text/javascript">
    function insertData() {
        var rekomendasi_okupasi = [];
        $('input[name="rekom_okupasi[]"]').each(function() {
            if ($(this).is(":checked")) {
                if ($(this).attr('id') === 'rekom_okupasi2') { // Cek apakah checkbox yang dicentang adalah 'rekom_okupasi2'
                    if ($('#rekom_okupasi').val() !== '') { // Pastikan input teks tidak kosong
                        rekomendasi_okupasi.push($(this).val() + ' ' + $('#rekom_okupasi').val()); // Gabungkan nilai checkbox dan teks
                    } else {
                        rekomendasi_okupasi.push($(this).val()); // Jika input teks kosong, masukkan nilai checkbox saja
                    }
                } else {
                    rekomendasi_okupasi.push($(this).val()); // Untuk checkbox lain, masukkan nilai seperti biasa
                }
            }
        });
        rekomendasi_okupasi = rekomendasi_okupasi.join(';');

        var status_kesehatan = $("input[name='status_kesehatan']:checked").val();
        status_kesehatan = (status_kesehatan === 'Lainnya') ? $("#status_kesehatan").val() : status_kesehatan;

        var saran_okupasi = [];
        $('input[name="saran_okupasi"]').each(function() {
            if ($(this).is(":checked")) {
                if ($(this).attr('id') === 'saran_okupasi2') { // Cek apakah checkbox yang dicentang adalah 'rekom_okupasi2'
                    if ($('#saran_okupasi').val() !== '') { // Pastikan input teks tidak kosong
                        saran_okupasi.push('' + $('#saran_okupasi').val()); // Gabungkan nilai checkbox dan teks
                    } else {
                        saran_okupasi.push($(this).val()); // Jika input teks kosong, masukkan nilai checkbox saja
                    }
                } else {
                    saran_okupasi.push($(this).val());
                }
            }
        });
        saran_okupasi = saran_okupasi.join(';');

        var hindari_tempat = [];
        $('input[name="hindari_tempat"]').each(function() {
            if ($(this).is(":checked")) {
                if ($(this).attr('id') === 'hindari_tempat5') { // Cek apakah checkbox yang dicentang adalah 'rekom_okupasi2'
                    if ($('#hindari_tempat').val() !== '') { // Pastikan input teks tidak kosong
                        hindari_tempat.push('' + $('#hindari_tempat').val()); // Gabungkan nilai checkbox dan teks
                    } else {
                        hindari_tempat.push($(this).val()); // Jika input teks kosong, masukkan nilai checkbox saja
                    }
                } else {
                hindari_tempat.push($(this).val());
                }
            }
        });
        hindari_tempat = hindari_tempat.join(';');

        var hindari_kerja = [];
        $('input[name="hindari_kerja"]').each(function() {
            if ($(this).is(":checked")) {
                if ($(this).attr('id') === 'hindari_kerja5') { // Cek apakah checkbox yang dicentang adalah 'rekom_okupasi2'
                    if ($('#hindari_kerja').val() !== '') { // Pastikan input teks tidak kosong
                        hindari_kerja.push('' + $('#hindari_kerja').val()); // Gabungkan nilai checkbox dan teks
                    } else {
                        hindari_kerja.push($(this).val()); // Jika input teks kosong, masukkan nilai checkbox saja
                    }
                } else {
                hindari_kerja.push($(this).val());
                }
            }
        });
        hindari_kerja = hindari_kerja.join(';');

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
                    url: "<?php echo base_url() ?>Kesimpulan_mcu/simpan_okupasi",
                    method: "POST",
                    dataType: "json",
                    data: {
                        id_mcu: $('#id_mcu').val(),
                        kesimpulan_okupasi: $('input[name="kesimpulan_okupasi"]:checked').val(),
                        rekomendasi_okupasi: rekomendasi_okupasi,
                        status_kesehatan: status_kesehatan,
                        resiko_skj: $('input[name="resiko_skj"]:checked').val(),
                        saran_okupasi: saran_okupasi,
                        hindari_tempat: hindari_tempat,
                        hindari_kerja: hindari_kerja,
                        ulangi_pemeriksaan: $('input[name="ulangi_pemeriksaan"]:checked').val(),

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
                table: 'kesimpulan_okupasi',
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('input[type="checkbox"]').prop('checked', false);

                    $('input[name="kesimpulan_okupasi"][value="' + data.kesimpulan_okupasi + '"]').prop("checked", true);
                    $('input[name="resiko_skj"][value="' + data.resiko_skj + '"]').prop("checked", true);
                    $('input[name="ulangi_pemeriksaan"][value="' + data.ulangi_pemeriksaan + '"]').prop("checked", true);



                    var rekom_okupasi = data.rekomendasi_okupasi.split(';');
                    var rekom_okupasi_array = rekom_okupasi.map(function(item) {
                        return item.trim();
                    });
                    // console.log(rekom_okupasi_array);
                    $.each(rekom_okupasi_array, function(index, value) {
                        $('input[name="rekom_okupasi[]"][value="' + value + '"]').prop("checked", true);
                        if (value.match(/Note*/)) {
                            var separator = "Note) ";
                            var startIndex = value.indexOf(separator);
                            if (startIndex !== -1) {
                                var catatan = value.substring(startIndex + separator.length).trim();
                            } else {
                                catatan = '';
                            }
                            $('input[name="rekom_okupasi[]"][value="Sehat Untuk Bekerja Dengan Keterbatasan Tertentu / Catatan (Fit To Work With Restriction / Note)"]').prop("checked", true);
                            $('#rekom_okupasi').val(catatan);

                        }
                    });

                    if (!(data.status_kesehatan.match(/P1.*&P2.*&P3.*&P4.*&P5.*&P6.*&P7/))) {
                        $('input[name="status_kesehatan"][value="Lainnya"]').prop("checked", true).change();
                        $('#status_kesehatan').val(data.status_kesehatan);
                    } else {
                        $('input[name="status_kesehatan"][value="' + data.status_kesehatan + '"]').prop("checked", true);
                    }

                    $('input[name="resiko_skj"][value="' + data.resiko_skj + '"]').prop("checked", true);
                    if (data.saran_okupasi !== null) {
                        var saran_okupasi = data.saran_okupasi.split(';');
                        var saran_okupasi_array = saran_okupasi.map(function(item) {
                            return item.trim();
                        });

                        $.each(saran_okupasi_array, function(index, value) {
                            // Pilih checkbox dengan name 'rekom_okupasi[]' dan value yang sesuai dengan nilai saat ini
                            $('input[name="saran_okupasi"][value="' + value + '"]').prop("checked", true);
                            if(!(value.match(/APD*/))) {
                                $('input[name="saran_okupasi"][value="Lainnya"').prop("checked", true);
                                $('#saran_okupasi').val(value);
                            }
                        });
                    }

                    var hindari_tempat = data.hindari_tempat.split(';');
                    var hindari_tempat_array = hindari_tempat.map(function(item) {
                        return item.trim();
                    });
                    console.log(hindari_tempat_array);

                    $.each(hindari_tempat_array, function(index, value) {
                        // Pilih checkbox dengan name 'rekom_okupasi[]' dan value yang sesuai dengan nilai saat ini
                        $('input[name="hindari_tempat"][value="' + value + '"]').prop("checked", true);
                        if (value != 'Berdebu' && value != 'panas tinggi' && value != 'bising' && value != 'mengandung radiasi') {
                            $('input[name="hindari_tempat"][value="Lainnya"').prop("checked", true);
                            $('#hindari_tempat').val(value);
                        }
                    });

                    var hindari_kerja = data.hindari_kerja.split(';');
                    var hindari_kerja_array = hindari_kerja.map(function(item) {
                        return item.trim();
                    });
                    $.each(hindari_kerja_array, function(index, value) {
                        // Pilih checkbox dengan name 'rekom_okupasi[]' dan value yang sesuai dengan nilai saat ini
                        $('input[name="hindari_kerja"][value="' + value + '"]').prop("checked", true);
                        if (value != 'Bahan Kimia' && value != 'Pelarut Organix/Oil/Gemuk/Grease' && value != 'Naik Turun Tangga Lebih Dari 1 M' && value != 'Angkat Beban Lebih Dari 1/3 BB') {
                            $('input[name="hindari_kerja"][value="Lainnya"').prop("checked", true);
                            $('#hindari_kerja').val(value);
                        }
                    });

                    $('input[name="ulangi_pemeriksaan"][value="' + data.ulangi_pemeriksaan + '"]').prop("checked", true);

                }
            }

        });
    });
</script>