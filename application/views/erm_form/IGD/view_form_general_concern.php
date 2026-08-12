<<<<<<< HEAD
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Genaral Consent</h6>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">

                        <input type="hidden" name="id_pelayanan">
                        <input type="hidden" name="id" id="id">
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Saya yang bertanda tangan di bawah ini :<span class="help"></span></label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nama<span class="help"></span></label>
                                        <span id="nama_error" class="text-danger"></span>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" id="gNama">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span id="jk_error" class="text-danger"></span>
                                        <div class="col-md-9 has-success">
                                            <div class="radio-list">
                                                <div class="radio-inline pl-0">
                                                    <span class="radio radio-info">
                                                        <input type="radio" value="LAKI-LAKI" name="gJk" id="inJkLk2">
                                                        <label class="control-label" for="inJkLk2">L</label>
                                                    </span>
                                                </div>
                                                <div class="radio-inline pl-0">
                                                    <span class="radio radio-info">
                                                        <input type="radio" value="PEREMPUAN" name="gJk" id="inJkPr2">
                                                        <label class="control-label" for="inJkPr2">P</label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Alamat<span class="help"></span></label>
                                        <span id="alamat_error" class="text-danger"></span>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" id="gAlamat">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <div class="form-group">
                                        <label class="control-label mb-10 text-left">Telpon<span class="help"></span></label>
                                        <input type="text" class="form-control" value="<?php echo $data['no_hp']?>">
                                    <!-- </div>
                                        <span id="tlp_error" class="text-danger"></span>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" id="gHP">
                                            <span class="help-block"></span>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Karena kondisi medis pasien, saya dengan ini memberikan persetujuan sebagai wakil dari pasien<span class="help"></span></label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nama<span class="help"></span></label>
                                        <input type="text" class="form-control" disabled="" value="<?= $data['nama'] . " (" . $data['jenis_kelamin'] . ")" ?>">
                                    </div>
                                </div>
                                <input type="hidden" disabled class="form-control" value="<?= $data['no_rm'] ?>" id="gNo_rm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Alamat<span class="help"></span></label>
                                        <input type="text" class="form-control" disabled="" value="<?= $data['alamat'] . "," . $data['kelurahan'] . "," . $data['kecamatan'] . "," . $data['kota'] . "," . $data['provinsi'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Telpon<span class="help"></span></label>
                                        <input type="text" class="form-control" disabled="" value="<?= $data['no_hp'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Hubungan dengan pasien</label>
                                    <span id="ghubungan_error" class="text-danger"></span>
                                    <div class="checkbox checkbox-primary">
                                        <input id="kondisi_umum1" type="checkbox" name="ghubungan" value="Saya sendiri">
                                        <label class="control-label" for="kondisi_umum1">
                                            Saya sendiri
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                        <input id="kondisi_umum2" type="checkbox" name="ghubungan" value="Anak kandung">
                                        <label class="control-label" for="kondisi_umum2">
                                            Anak kandung
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                        <input id="kondisi_umum3" type="checkbox" name="ghubungan" value="Suami/istri">
                                        <label class="control-label" for="kondisi_umum3">
                                            Suami/istri
                                        </label>
                                    </div>

                                    <div class="checkbox checkbox-primary">
                                        <input id="kondisi_umum4" type="checkbox" name="ghubungan" value="Orang tua kandung">
                                        <label class="control-label" for="kondisi_umum4">
                                            Orang tua kandung
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                        <input id="kondisi_umum6" type="checkbox" name="ghubungan" value="Lainnya">
                                        <label class="control-label col-md-2" for="kondisi_umum6">
                                            Lainnya:
                                        </label>
                                        <div class="col-md-8 has-success">
                                            <input type="text" class="form-control" id="ghubungan" style="display: none;">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Dengan ini saya: </label>
                            <ol style="color: black;">
                                <li>Saya menyetujui dan memberikan persetujuan untuk mendapatkan pelayanan kesehatan di RSBT dan dengan ini saya meminta dan memberikan
                                    kuasa kepada RSBT, Dokter dan perawat, dan tenaga kesehatan lainnya untuk memberikan asuhan keperawatan, pemeriksaan fisik yang
                                    dilakukan oleh dokter dan perawat dan melakukan prosedur diagnostik, radiologi dan atau terapi dan tata laksana sesuai pertimbangan
                                    dokter yang diperlukan atau disarankan pada perawatan saya. Hal in mencakup seluruh pemeriksaan dan prosedur diagnostik rutin,
                                    termasuk X-ray, pemberian atau tindakan medis serta penyuntikan (intramuscular, intravena dan prodsedur invasif lainnya), produk
                                    farmasi dan obat-obatan, pemasangan alat kesehatan (kecuali yang membutuhkan persetujuan khusus atau tertulis), dan pengambilan
                                    darah untuk pemeriksaan laboratorium atau pemeriksaan patolgi. Yang dibutuhkan untuk pengobatan dan tindakan yang aman, apabila
                                    pasien dan keluarga menggunakan obat dari luar/pengobatan dari luar menjadi tanggung jawab pasien dan keluarga, tidak menjadi tanggung jawab rumah sakit</li>
                                <br>
                                <li>
                                    <dd>a. Memahami informasi yang ada dalam diri saya, termasuk diagnosis, hasil laboratorium dan hasil tes diagnostik yang akan digunakan untuk perawatan medis, Rumah Sakit akan menjamin kerahasiannya.</dd>
                                    <dd>b. Memberi wewenang kepada RS untuk memberikan informasi tentang diagnosis,hasil pelayanan dan pengobatan bila diperlukan untuk memproses klaim asuransi/perusahaan dan atau lembaga pemerintah</dd>
                                    <dd>c. Memberikan wewenang kepada RS untuk memberikan informasi tentang diagnosis, hasil pelayanan dan pengobatan saya kepada anggota keluarga/teman saya yaitu :
                                    <dd>
                                        <!-- <strong><?= $data['nama'] ?></strong> -->
                                        <input type="text" size="8" id="gSamaran"><span id="samaran_error" class="text-danger"></span>
                                    </dd>


                                </li>
                                <br>
                                <dl>
                                    <li>
                                        <dt>Mengerti dan memahami bahwa :</dt>
                                    </li>
                                    <dd>Saya memberi kuasa dan meminta RS memberikan kepada pembayar asuransiswasta/pemerintah, atau apapun yang telah
                                        diidentifikasi sebagai bertanggung jawab atas pembayaran untuk rawat inap atau kunjungan rawat jalan, baik diagnosa,
                                        hasil pemeriksaan penunjang, pengobatan dan catatan lain</dd>

                                </dl>
                                <br>
                                <li>
                                    Memahami bahwa rumah sakit tidak bertanggung jawab atas semua kehilangan barang-barang milik saya dan saya secara pribadi
                                    bertanggung jawab atas barang-barang berharga yang sama miliki termasuk namun tidak terbatas pada uang, perhiasan, buku cek,
                                    kartu kredit, handphone atau barang lainnya. Dan apabila saya membutuhkan maka saya dapat menitipkan barang-barang saya kepada
                                    rumah sakit.
                                    <dd>
                                        Saya juga mengerti bahwa saya harus memberitahu/menitipkan pada RS jika saya memiliki gigi palsu, kacamata, lensa kontak, prosthetic atau barang
                                        lainnya yang saya butuhkan untuk diamankan
                                    </dd>
                                </li>
                                <br>
                                <li>
                                    Pasien / keluarga memiliki hak untuk mengajukan pertanyaan tentang pengobatan yang diusulkan (termasuk identitas setiap orang yang memberikan atau mengamati pengobatan) setiap saat. Mengerti dan
                                    memahami bahwa memiliki hak untuk persetujuan, atau menolak persetujuan, untuk setiap prosedur/ terapi.
                                    Jika diperlukan RS, saya akan berpartisipasi dalam pemilihan dokter yang akan bertanggung jawab untuk perawatan saya selama saya dalam perawatan di rumah sakit.
                                    Mengerti dan memahami tentang HAK PASIEN DAN KELUARGA sesuai dengan undang-undang Kesehatan No. 44/2009 tentang Rumah Sakit.

                                </li>
                                <br>
                                <li>
                                    <dl>
                                        Informasi tentang pelayanan kerohanian yang berada di Rumah Sakit sesuai dengan agama/kepercayaan pasien, dan cara pemberian / bimbingan yang disesuaikan dengan fasilitas rumah sakit yang ada / keinginan pasien / keluarga

                                    </dl>
                                </li>

                                <br>
                                <li>
                                    Penjelasan jika terjadi kerusakan atau kehilangan yang disebabkan oleh pasien maka menjadi tanggung jawab pasien termasuk fasilitas umum dan fasilitas / alat medis
                                </li>
                                <br>
                                <li>
                                    Mengizinkan keluarga pasien berkunjung diluar jam berkunjung tetapi harus lapor dan menukarkan identitas dengan kartu tamu / kartu pengunjung demi keselamatan dan keamanan pasien / keluarga
                                </li>

                                <br>
                                <li>
                                    <dd>a. Saya memberi kuasa kepada RSBT untuk menjaga Privacy dan Kerahasiaan penyakit saya selama dalam perawatan </dd>
                                    <dd>b. Mengizinkan / tidak mengizinkan Rumah Sakit memberi akses bagi keluarga dan handai taulan serta orang yang akan
                                        menemui/ menjenguk saya (sebutkan nama / profesi jika ada permintaan) :

                                    </dd>
                                    <span id="anggota_error" class="text-danger"></span>
                                    <div class="has-success"><input type="textarea" class="form-control" id="anggota"></div>
                                </li>
                                <br>
                                <li>
                                    Saya telah dijelaskan tentang biaya sesuai dengan perencanaan :
                                    Kelas Perawatan, Biaya Perkiraan Tindakan, Biaya Administrasi, Biaya Pemeriksaan penunjang sesuai dengan kebutuhan,Biaya Farmasi ,Biaya lain-lain
                                    Saya menyatakan setuju, baik sebagai wali atau sebagai pasien, bahwa sesuai pertimbangan pelayanan yang diberikan kepada pasien, maka saya wajib untuk membayar total biaya pelayanan. Biaya pelayanan berdasarkan acuan biaya dan ketentuan RS.Bakti Timah Pangkalpinang.

                                </li>
                                <br>
                                <li>Saya menyatakan bahwa saya telah menerima informasi tentang adanya tata cara mengajukan dan mengatasi keluhan terkait pelayanan
                                    medik yang diberikan terhadap diri saya. Saya setuju untuk mengikuti tata cara mengajukan keluhan sesuai prosedur yang ada.</li>

                                <br>
                                <li>
                                    Informasi tentang tata cara melakukan second opinion terhadap pemeriksaan laboratorium, pemeriksaan penunjang, dan second opinion
                                    kepada dokter yang berada di RSBT maupun dokter yang berada diluar RSBT.
                                </li>

                                <br>
                            </ol>
                            <label class="control-label mb-10 text-left">Dengan ini menyatakan bahwa saya/keluarga pasien telah menerima informasi sebagaimana di atas yang di berita tanda dikolom sebelah kanan serta telah diberi kesempatan untuk bertanya/berdiskusi dan telah memahami dan menyetujui</label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <label class="control-label">Pasien:</label>
                            <br />
                            <div class="row">
                                <button data-toggle="modal" data-target="#modal_ttd" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
                                <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                                <canvas id="can" width="300" height="300" style="display: none;"></canvas>
                                <div class="form-group">
                                    <div class="modal fade" id="modal_ttd" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="form-group row" style="margin-left: 30px;">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <canvas id="ttd" width="300" height="300">
                                                                </canvas>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                                                                <button class="btn btn-default" id="sig-clearBtn1">Clear Signature</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="form-group text-center" style="margin-top: 30px;">
                            <div class="col-md-12">
                                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                <button style="display: none;" type="submit" id="simpan" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                                <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                                <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /Row -->
<!--end modal 1-->
<?php $this->load->view('assets/signature2') ?>
<style>
    canvas {
        cursor: crosshair;
        border: 1px solid #000000;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $("#kondisi_umum6").click(function() {
            if ($(this).is(":checked")) {
                $("#ghubungan").show();
            } else {
                $("#ghubungan").hide();
            }
        });

    });
    $(document).ready(function() {
        no_rm = $('#gNo_rm').val();
        $.ajax({
            url: "<?php echo base_url() ?>Erm_general_concern/get_gencon",
            method: "POST",
            dataType: 'json',
            data: {
                id: no_rm
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    if (data.hubungan == "Saya sendiri") {
                        $('#kondisi_umum1').prop("checked", true);
                    } else if (data.hubungan == "Anak kandung") {
                        $('#kondisi_umum2').prop("checked", true);
                    } else if (data.hubungan == "Suami/istri") {
                        $('#kondisi_umum3').prop("checked", true);
                    } else if (data.hubungan == "Orang tua kandung") {
                        $('#kondisi_umum4').prop("checked", true);
                    } else {
                        $('#kondisi_umum6').prop("checked", true);
                        $("#ghubungan").show();
                        $("#ghubungan").val(data.hubungan);
                    }
                    $('#gNama').val(data.nama);
                    $('input[name="gJk"][value="' + data.jk + '"]').prop("checked", true);

                    $('#gAlamat').val(data.alamat);
                    $('#gHP').val(data.hp);
                    $('#gSamaran').val(data.samaran);
                    $('#anggota').val(data.anggota);
                    $('#id').val(data.id_general_concent);


                    canvas = document.getElementById('can');
                    ctx = canvas.getContext("2d");

                    var img = new Image();
                    img.onload = function() {
                        ctx.drawImage(img, 0, 0, 300, 300);
                        steps.length = 0;
                        steps[no] = ctx.getImageData(0, 0, canvas.width, canvas.height);
                        // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
                    }
                    img.src = "<?php echo base_url(); ?>" + data.file_path;
                    $('#can').show();
                    $('#simpan').hide();
                    $('#edit').show();
                } else {
                    $('#simpan').show();
                }
            }

        });
    });
</script>
<script type="text/javascript">
    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#gNo_rm').val();
        ghubungan = $('input[name="ghubungan"]:checked').val();
        if (ghubungan == "Lainnya") {
            ghubungan = $('#ghubungan').val();
        }
        gNama = $('#gNama').val();
        gJk = $('input[name="gJk"]:checked').val();

        gAlamat = $('#gAlamat').val();
        gHP = $('#gHP').val();
        gSamaran = $('#gSamaran').val();
        anggota = $('#anggota').val();

        canvas = document.getElementById('can');
        if (canvas.style.display !== 'none' && canvas.style.visibility !== 'hidden') {
            gambar = canvas.toDataURL("image/png");
        } else {
            gambar = '';
        }


        dataString = 'no_rm=' + no_rm + '&hubungan=' + ghubungan + '&nama=' + gNama +
            '&jk=' + gJk + '&alamat=' + gAlamat + '&HP=' + gHP + '&samaran=' + gSamaran + '&anggota=' + anggota + '&gambar=' + gambar;
        // alert(tindak_lanjut);

        $.ajax({
            url: "<?php echo base_url() ?>Erm_general_concern/insert_gencon",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {

                    $("#gecon").prop("disabled", true);
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil ditambah",
                        confirmButtonColor: "#3cb878",
                    });
                    window.location.href = "<?php echo base_url('Pencarian_pasien/Identitas_pasien/') ?>" + no_rm;
                    $('#gecon').attr('disabled', true);
                } else if (data.error) {
                    if (data.nama != '') {
                        $('#nama_error').html(data.nama);
                    } else {
                        $('#nama_error').html('');
                    }

                    if (data.alamat != '') {
                        $('#alamat_error').html(data.alamat);
                    } else {
                        $('#alamat_error').html('');
                    }
                    if (data.hp != '') {
                        $('#tlp_error').html(data.hp);
                    } else {
                        $('#tlp_error').html('');
                    }

                    if (data.anggota != '') {
                        $('#anggota_error').html(data.anggota);
                    } else {
                        $('#anggota_error').html('');
                    }

                    if (data.samaran != '') {
                        $('#samaran_error').html(data.samaran);
                    } else {
                        $('#samaran_error').html('');
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

    function edit() {
        id = $('#id').val();

        no_rm = $('#gNo_rm').val();
        ghubungan = $('input[name="ghubungan"]:checked').val();
        if (ghubungan == "Lainnya") {
            ghubungan = $('#ghubungan').val();
        }
        gNama = $('#gNama').val();
        gJk = $('input[name="gJk"]:checked').val();

        gAlamat = $('#gAlamat').val();
        gHP = $('#gHP').val();
        gSamaran = $('#gSamaran').val();
        anggota = $('#anggota').val();

        canvas = document.getElementById('can');
        gambar = canvas.toDataURL("image/png");


        dataString = 'no_rm=' + no_rm + '&hubungan=' + ghubungan + '&nama=' + gNama +
            '&jk=' + gJk + '&alamat=' + gAlamat + '&HP=' + gHP +
            '&samaran=' + gSamaran + '&anggota=' + anggota + '&gambar=' + gambar + '&id=' + id;
        // alert(tindak_lanjut);

        $.ajax({
            url: "<?php echo base_url() ?>Erm_general_concern/update_gencon",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {

                    $("#gecon").prop("disabled", true);
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil ditambah",
                        confirmButtonColor: "#3cb878",
                    });
                    window.location.href = "<?php echo base_url('Pencarian_pasien/Identitas_pasien/') ?>" + no_rm;
                    $('#gecon').attr('disabled', true);
                } else if (data.error) {
                    if (data.nama != '') {
                        $('#nama_error').html(data.nama);
                    } else {
                        $('#nama_error').html('');
                    }

                    if (data.alamat != '') {
                        $('#alamat_error').html(data.alamat);
                    } else {
                        $('#alamat_error').html('');
                    }
                    if (data.hp != '') {
                        $('#tlp_error').html(data.hp);
                    } else {
                        $('#tlp_error').html('');
                    }

                    if (data.anggota != '') {
                        $('#anggota_error').html(data.anggota);
                    } else {
                        $('#anggota_error').html('');
                    }

                    if (data.samaran != '') {
                        $('#samaran_error').html(data.samaran);
                    } else {
                        $('#samaran_error').html('');
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
=======
<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Genaral Consent</h6>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">

                        <input type="hidden" name="id_pelayanan">
                        <input type="hidden" name="id" id="id">
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Saya yang bertanda tangan di bawah ini :<span class="help"></span></label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nama<span class="help"></span></label>
                                        <span id="nama_error" class="text-danger"></span>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" id="gNama">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span id="jk_error" class="text-danger"></span>
                                        <div class="col-md-9 has-success">
                                            <div class="radio-list">
                                                <div class="radio-inline pl-0">
                                                    <span class="radio radio-info">
                                                        <input type="radio" value="LAKI-LAKI" name="gJk" id="inJkLk2">
                                                        <label class="control-label" for="inJkLk2">L</label>
                                                    </span>
                                                </div>
                                                <div class="radio-inline pl-0">
                                                    <span class="radio radio-info">
                                                        <input type="radio" value="PEREMPUAN" name="gJk" id="inJkPr2">
                                                        <label class="control-label" for="inJkPr2">P</label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Alamat<span class="help"></span></label>
                                        <span id="alamat_error" class="text-danger"></span>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" id="gAlamat">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <div class="form-group">
                                        <label class="control-label mb-10 text-left">Telpon<span class="help"></span></label>
                                        <input type="text" class="form-control" value="<?php echo $data['no_hp']?>">
                                    <!-- </div>
                                        <span id="tlp_error" class="text-danger"></span>
                                        <div class="col-md-9 has-success">
                                            <input type="text" class="form-control" id="gHP">
                                            <span class="help-block"></span>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Karena kondisi medis pasien, saya dengan ini memberikan persetujuan sebagai wakil dari pasien<span class="help"></span></label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nama<span class="help"></span></label>
                                        <input type="text" class="form-control" disabled="" value="<?= $data['nama'] . " (" . $data['jenis_kelamin'] . ")" ?>">
                                    </div>
                                </div>
                                <input type="hidden" disabled class="form-control" value="<?= $data['no_rm'] ?>" id="gNo_rm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Alamat<span class="help"></span></label>
                                        <input type="text" class="form-control" disabled="" value="<?= $data['alamat'] . "," . $data['kelurahan'] . "," . $data['kecamatan'] . "," . $data['kota'] . "," . $data['provinsi'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Telpon<span class="help"></span></label>
                                        <input type="text" class="form-control" disabled="" value="<?= $data['no_hp'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label mb-10 text-left">Hubungan dengan pasien</label>
                                    <span id="ghubungan_error" class="text-danger"></span>
                                    <div class="checkbox checkbox-primary">
                                        <input id="kondisi_umum1" type="checkbox" name="ghubungan" value="Saya sendiri">
                                        <label class="control-label" for="kondisi_umum1">
                                            Saya sendiri
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                        <input id="kondisi_umum2" type="checkbox" name="ghubungan" value="Anak kandung">
                                        <label class="control-label" for="kondisi_umum2">
                                            Anak kandung
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                        <input id="kondisi_umum3" type="checkbox" name="ghubungan" value="Suami/istri">
                                        <label class="control-label" for="kondisi_umum3">
                                            Suami/istri
                                        </label>
                                    </div>

                                    <div class="checkbox checkbox-primary">
                                        <input id="kondisi_umum4" type="checkbox" name="ghubungan" value="Orang tua kandung">
                                        <label class="control-label" for="kondisi_umum4">
                                            Orang tua kandung
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                        <input id="kondisi_umum6" type="checkbox" name="ghubungan" value="Lainnya">
                                        <label class="control-label col-md-2" for="kondisi_umum6">
                                            Lainnya:
                                        </label>
                                        <div class="col-md-8 has-success">
                                            <input type="text" class="form-control" id="ghubungan" style="display: none;">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">Dengan ini saya: </label>
                            <ol style="color: black;">
                                <li>Saya menyetujui dan memberikan persetujuan untuk mendapatkan pelayanan kesehatan di RSBT dan dengan ini saya meminta dan memberikan
                                    kuasa kepada RSBT, Dokter dan perawat, dan tenaga kesehatan lainnya untuk memberikan asuhan keperawatan, pemeriksaan fisik yang
                                    dilakukan oleh dokter dan perawat dan melakukan prosedur diagnostik, radiologi dan atau terapi dan tata laksana sesuai pertimbangan
                                    dokter yang diperlukan atau disarankan pada perawatan saya. Hal in mencakup seluruh pemeriksaan dan prosedur diagnostik rutin,
                                    termasuk X-ray, pemberian atau tindakan medis serta penyuntikan (intramuscular, intravena dan prodsedur invasif lainnya), produk
                                    farmasi dan obat-obatan, pemasangan alat kesehatan (kecuali yang membutuhkan persetujuan khusus atau tertulis), dan pengambilan
                                    darah untuk pemeriksaan laboratorium atau pemeriksaan patolgi. Yang dibutuhkan untuk pengobatan dan tindakan yang aman, apabila
                                    pasien dan keluarga menggunakan obat dari luar/pengobatan dari luar menjadi tanggung jawab pasien dan keluarga, tidak menjadi tanggung jawab rumah sakit</li>
                                <br>
                                <li>
                                    <dd>a. Memahami informasi yang ada dalam diri saya, termasuk diagnosis, hasil laboratorium dan hasil tes diagnostik yang akan digunakan untuk perawatan medis, Rumah Sakit akan menjamin kerahasiannya.</dd>
                                    <dd>b. Memberi wewenang kepada RS untuk memberikan informasi tentang diagnosis,hasil pelayanan dan pengobatan bila diperlukan untuk memproses klaim asuransi/perusahaan dan atau lembaga pemerintah</dd>
                                    <dd>c. Memberikan wewenang kepada RS untuk memberikan informasi tentang diagnosis, hasil pelayanan dan pengobatan saya kepada anggota keluarga/teman saya yaitu :
                                    <dd>
                                        <!-- <strong><?= $data['nama'] ?></strong> -->
                                        <input type="text" size="8" id="gSamaran"><span id="samaran_error" class="text-danger"></span>
                                    </dd>


                                </li>
                                <br>
                                <dl>
                                    <li>
                                        <dt>Mengerti dan memahami bahwa :</dt>
                                    </li>
                                    <dd>Saya memberi kuasa dan meminta RS memberikan kepada pembayar asuransiswasta/pemerintah, atau apapun yang telah
                                        diidentifikasi sebagai bertanggung jawab atas pembayaran untuk rawat inap atau kunjungan rawat jalan, baik diagnosa,
                                        hasil pemeriksaan penunjang, pengobatan dan catatan lain</dd>

                                </dl>
                                <br>
                                <li>
                                    Memahami bahwa rumah sakit tidak bertanggung jawab atas semua kehilangan barang-barang milik saya dan saya secara pribadi
                                    bertanggung jawab atas barang-barang berharga yang sama miliki termasuk namun tidak terbatas pada uang, perhiasan, buku cek,
                                    kartu kredit, handphone atau barang lainnya. Dan apabila saya membutuhkan maka saya dapat menitipkan barang-barang saya kepada
                                    rumah sakit.
                                    <dd>
                                        Saya juga mengerti bahwa saya harus memberitahu/menitipkan pada RS jika saya memiliki gigi palsu, kacamata, lensa kontak, prosthetic atau barang
                                        lainnya yang saya butuhkan untuk diamankan
                                    </dd>
                                </li>
                                <br>
                                <li>
                                    Pasien / keluarga memiliki hak untuk mengajukan pertanyaan tentang pengobatan yang diusulkan (termasuk identitas setiap orang yang memberikan atau mengamati pengobatan) setiap saat. Mengerti dan
                                    memahami bahwa memiliki hak untuk persetujuan, atau menolak persetujuan, untuk setiap prosedur/ terapi.
                                    Jika diperlukan RS, saya akan berpartisipasi dalam pemilihan dokter yang akan bertanggung jawab untuk perawatan saya selama saya dalam perawatan di rumah sakit.
                                    Mengerti dan memahami tentang HAK PASIEN DAN KELUARGA sesuai dengan undang-undang Kesehatan No. 44/2009 tentang Rumah Sakit.

                                </li>
                                <br>
                                <li>
                                    <dl>
                                        Informasi tentang pelayanan kerohanian yang berada di Rumah Sakit sesuai dengan agama/kepercayaan pasien, dan cara pemberian / bimbingan yang disesuaikan dengan fasilitas rumah sakit yang ada / keinginan pasien / keluarga

                                    </dl>
                                </li>

                                <br>
                                <li>
                                    Penjelasan jika terjadi kerusakan atau kehilangan yang disebabkan oleh pasien maka menjadi tanggung jawab pasien termasuk fasilitas umum dan fasilitas / alat medis
                                </li>
                                <br>
                                <li>
                                    Mengizinkan keluarga pasien berkunjung diluar jam berkunjung tetapi harus lapor dan menukarkan identitas dengan kartu tamu / kartu pengunjung demi keselamatan dan keamanan pasien / keluarga
                                </li>

                                <br>
                                <li>
                                    <dd>a. Saya memberi kuasa kepada RSBT untuk menjaga Privacy dan Kerahasiaan penyakit saya selama dalam perawatan </dd>
                                    <dd>b. Mengizinkan / tidak mengizinkan Rumah Sakit memberi akses bagi keluarga dan handai taulan serta orang yang akan
                                        menemui/ menjenguk saya (sebutkan nama / profesi jika ada permintaan) :

                                    </dd>
                                    <span id="anggota_error" class="text-danger"></span>
                                    <div class="has-success"><input type="textarea" class="form-control" id="anggota"></div>
                                </li>
                                <br>
                                <li>
                                    Saya telah dijelaskan tentang biaya sesuai dengan perencanaan :
                                    Kelas Perawatan, Biaya Perkiraan Tindakan, Biaya Administrasi, Biaya Pemeriksaan penunjang sesuai dengan kebutuhan,Biaya Farmasi ,Biaya lain-lain
                                    Saya menyatakan setuju, baik sebagai wali atau sebagai pasien, bahwa sesuai pertimbangan pelayanan yang diberikan kepada pasien, maka saya wajib untuk membayar total biaya pelayanan. Biaya pelayanan berdasarkan acuan biaya dan ketentuan RS.Bakti Timah Pangkalpinang.

                                </li>
                                <br>
                                <li>Saya menyatakan bahwa saya telah menerima informasi tentang adanya tata cara mengajukan dan mengatasi keluhan terkait pelayanan
                                    medik yang diberikan terhadap diri saya. Saya setuju untuk mengikuti tata cara mengajukan keluhan sesuai prosedur yang ada.</li>

                                <br>
                                <li>
                                    Informasi tentang tata cara melakukan second opinion terhadap pemeriksaan laboratorium, pemeriksaan penunjang, dan second opinion
                                    kepada dokter yang berada di RSBT maupun dokter yang berada diluar RSBT.
                                </li>

                                <br>
                            </ol>
                            <label class="control-label mb-10 text-left">Dengan ini menyatakan bahwa saya/keluarga pasien telah menerima informasi sebagaimana di atas yang di berita tanda dikolom sebelah kanan serta telah diberi kesempatan untuk bertanya/berdiskusi dan telah memahami dan menyetujui</label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <label class="control-label">Pasien:</label>
                            <br />
                            <div class="row">
                                <button data-toggle="modal" data-target="#modal_ttd" aria-expanded="false" aria-controls="poli_sore" class="btn btn-primary btn-anim btn-sm"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></button>
                                <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                                <canvas id="can" width="300" height="300" style="display: none;"></canvas>
                                <div class="form-group">
                                    <div class="modal fade" id="modal_ttd" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="form-group row" style="margin-left: 30px;">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <canvas id="ttd" width="300" height="300">
                                                                </canvas>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                                                                <button class="btn btn-default" id="sig-clearBtn1">Clear Signature</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="form-group text-center" style="margin-top: 30px;">
                            <div class="col-md-12">
                                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                <button style="display: none;" type="submit" id="simpan" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                                <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                                <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /Row -->
<!--end modal 1-->
<?php $this->load->view('assets/signature2') ?>
<style>
    canvas {
        cursor: crosshair;
        border: 1px solid #000000;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $("#kondisi_umum6").click(function() {
            if ($(this).is(":checked")) {
                $("#ghubungan").show();
            } else {
                $("#ghubungan").hide();
            }
        });

    });
    $(document).ready(function() {
        no_rm = $('#gNo_rm').val();
        $.ajax({
            url: "<?php echo base_url() ?>Erm_general_concern/get_gencon",
            method: "POST",
            dataType: 'json',
            data: {
                id: no_rm
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    if (data.hubungan == "Saya sendiri") {
                        $('#kondisi_umum1').prop("checked", true);
                    } else if (data.hubungan == "Anak kandung") {
                        $('#kondisi_umum2').prop("checked", true);
                    } else if (data.hubungan == "Suami/istri") {
                        $('#kondisi_umum3').prop("checked", true);
                    } else if (data.hubungan == "Orang tua kandung") {
                        $('#kondisi_umum4').prop("checked", true);
                    } else {
                        $('#kondisi_umum6').prop("checked", true);
                        $("#ghubungan").show();
                        $("#ghubungan").val(data.hubungan);
                    }
                    $('#gNama').val(data.nama);
                    $('input[name="gJk"][value="' + data.jk + '"]').prop("checked", true);

                    $('#gAlamat').val(data.alamat);
                    $('#gHP').val(data.hp);
                    $('#gSamaran').val(data.samaran);
                    $('#anggota').val(data.anggota);
                    $('#id').val(data.id_general_concent);


                    canvas = document.getElementById('can');
                    ctx = canvas.getContext("2d");

                    var img = new Image();
                    img.onload = function() {
                        ctx.drawImage(img, 0, 0, 300, 300);
                        steps.length = 0;
                        steps[no] = ctx.getImageData(0, 0, canvas.width, canvas.height);
                        // 			steps.push(  ctx.getImageData(0,0,canvas.width,canvas.height)); 
                    }
                    img.src = "<?php echo base_url(); ?>" + data.file_path;
                    $('#can').show();
                    $('#simpan').hide();
                    $('#edit').show();
                } else {
                    $('#simpan').show();
                }
            }

        });
    });
</script>
<script type="text/javascript">
    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#gNo_rm').val();
        ghubungan = $('input[name="ghubungan"]:checked').val();
        if (ghubungan == "Lainnya") {
            ghubungan = $('#ghubungan').val();
        }
        gNama = $('#gNama').val();
        gJk = $('input[name="gJk"]:checked').val();

        gAlamat = $('#gAlamat').val();
        gHP = $('#gHP').val();
        gSamaran = $('#gSamaran').val();
        anggota = $('#anggota').val();

        canvas = document.getElementById('can');
        if (canvas.style.display !== 'none' && canvas.style.visibility !== 'hidden') {
            gambar = canvas.toDataURL("image/png");
        } else {
            gambar = '';
        }


        dataString = 'no_rm=' + no_rm + '&hubungan=' + ghubungan + '&nama=' + gNama +
            '&jk=' + gJk + '&alamat=' + gAlamat + '&HP=' + gHP + '&samaran=' + gSamaran + '&anggota=' + anggota + '&gambar=' + gambar;
        // alert(tindak_lanjut);

        $.ajax({
            url: "<?php echo base_url() ?>Erm_general_concern/insert_gencon",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {

                    $("#gecon").prop("disabled", true);
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil ditambah",
                        confirmButtonColor: "#3cb878",
                    });
                    window.location.href = "<?php echo base_url('Pencarian_pasien/Identitas_pasien/') ?>" + no_rm;
                    $('#gecon').attr('disabled', true);
                } else if (data.error) {
                    if (data.nama != '') {
                        $('#nama_error').html(data.nama);
                    } else {
                        $('#nama_error').html('');
                    }

                    if (data.alamat != '') {
                        $('#alamat_error').html(data.alamat);
                    } else {
                        $('#alamat_error').html('');
                    }
                    if (data.hp != '') {
                        $('#tlp_error').html(data.hp);
                    } else {
                        $('#tlp_error').html('');
                    }

                    if (data.anggota != '') {
                        $('#anggota_error').html(data.anggota);
                    } else {
                        $('#anggota_error').html('');
                    }

                    if (data.samaran != '') {
                        $('#samaran_error').html(data.samaran);
                    } else {
                        $('#samaran_error').html('');
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

    function edit() {
        id = $('#id').val();

        no_rm = $('#gNo_rm').val();
        ghubungan = $('input[name="ghubungan"]:checked').val();
        if (ghubungan == "Lainnya") {
            ghubungan = $('#ghubungan').val();
        }
        gNama = $('#gNama').val();
        gJk = $('input[name="gJk"]:checked').val();

        gAlamat = $('#gAlamat').val();
        gHP = $('#gHP').val();
        gSamaran = $('#gSamaran').val();
        anggota = $('#anggota').val();

        canvas = document.getElementById('can');
        gambar = canvas.toDataURL("image/png");


        dataString = 'no_rm=' + no_rm + '&hubungan=' + ghubungan + '&nama=' + gNama +
            '&jk=' + gJk + '&alamat=' + gAlamat + '&HP=' + gHP +
            '&samaran=' + gSamaran + '&anggota=' + anggota + '&gambar=' + gambar + '&id=' + id;
        // alert(tindak_lanjut);

        $.ajax({
            url: "<?php echo base_url() ?>Erm_general_concern/update_gencon",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {

                    $("#gecon").prop("disabled", true);
                    swal({
                        title: "good job!",
                        type: "success",
                        text: "Data Berhasil ditambah",
                        confirmButtonColor: "#3cb878",
                    });
                    window.location.href = "<?php echo base_url('Pencarian_pasien/Identitas_pasien/') ?>" + no_rm;
                    $('#gecon').attr('disabled', true);
                } else if (data.error) {
                    if (data.nama != '') {
                        $('#nama_error').html(data.nama);
                    } else {
                        $('#nama_error').html('');
                    }

                    if (data.alamat != '') {
                        $('#alamat_error').html(data.alamat);
                    } else {
                        $('#alamat_error').html('');
                    }
                    if (data.hp != '') {
                        $('#tlp_error').html(data.hp);
                    } else {
                        $('#tlp_error').html('');
                    }

                    if (data.anggota != '') {
                        $('#anggota_error').html(data.anggota);
                    } else {
                        $('#anggota_error').html('');
                    }

                    if (data.samaran != '') {
                        $('#samaran_error').html(data.samaran);
                    } else {
                        $('#samaran_error').html('');
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>