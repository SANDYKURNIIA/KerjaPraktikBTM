<<<<<<< HEAD
<!-- Row -->
<style>
    .hidden {
        display: none;
    }
</style>
<?php $this->load->view('erm_form/Poli/view_tombol') ?>

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="form-group ">
            <div class="form-group">
                <div class="col-md-12">
                    <center>
                        <h4 style="margin-top: 30px;"><strong>
                                <label class="control-label mb-10 text-left"><b>SKRINING TBC</b><span class="help"></span></label></strong>
                        </h4>
                    </center>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">

                    <div class="panel-body">
                        <div class="form-wrap">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left" style="color: black;">No.RM<span class="help"></span></label>
                                    <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM" name="norm">
                                    <input type="hidden" class="form-control" value="<?= urlencode(base64_encode($id_pelayanan)) ?>" id="inPel">
                                    <input type="hidden" class="form-control" value="<?= urlencode(base64_encode($id_history)) ?>" id="inHis">
                                    <input type="hidden" class="form-control" value="<?= $poli ?>" id="inPoli">
                                    <input type="hidden" class="form-control" value="<?= $jenis_pelayanan ?>" id="inJenPel">

                                </div>
                                <!-- <div class="col-md-1"></div> -->
                            </div>

                            <!-- Sisipkan gaya warna hitam di sini -->
                            <style>
                                label {
                                    color: black;
                                }
                            </style>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left" style="color: black;">Nama<span class="help"></span></label>
                                    <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama" name="nama">
                                    <span class="help-block"></span>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                            </div>


                            <div class="form-group ">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left" style="color: black;">Jenis Kelamin</label>
                                    <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk" name="jk">
                                    <span class="help-block"></span>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Tgl Lahir / Umur<span class="help"></span></label>
                                    <input type="text" disabled class="form-control" id="inTglLahir" value="<?php
                                                                                                            setlocale(LC_ALL, 'id_ID');

                                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                                            $time = strtotime($tgl_lahir);
                                                                                                            $date = strftime(" %d %B %Y ", $time);
                                                                                                            echo $date  . '(' . getAge($tgl_lahir) . ')' ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left" style="color: black;">Jam/ Tanggal Masuk <span class="help"></span></label>
                                    <input type="text" id="inTglMasuk" disabled class="form-control" value="<?php
                                                                                                            setlocale(LC_ALL, 'id_ID');

                                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                                            $time = strtotime($tgl_masuk);
                                                                                                            $date = strftime(" %d %B %Y ", $time);
                                                                                                            echo $date ?>">
                                    <span class="help-block"></span>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left" style="color: black;">Cara Bayar<span class="help"></span></label>
                                    <input type="text" disabled class="form-control" id="inCaraBayar" value="<?= $cara_bayar ?>">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <input type="hidden" name="date" id="date">
                            <div class="panel-heading">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <center>
                                                <h4 style="margin-top: 30px;"><strong>
                                                        <label class="control-label mb-10 text-left"><b>PERTANYAAN</b><span class="help"></span></label></strong>
                                                </h4>
                                            </center>
                                            <br>
                                            <div class="clearfix"></div>
                                            <div id="pertanyaan5">
                                                <label style="color: black;">1. Apakah anda sedang menjalani pengobatan TBC?</label><br>
                                                <input type="radio" name="jawab1" value="ya" id="yay" onclick="tampilkanPertanyaan()">
                                                <label for="yay">Ya</label>
                                                <br>
                                                <input type="radio" name="jawab1" value="tidak" id="tidakt" onclick="tampilkanPertanyaan()">
                                                <label for="tidakt">Tidak</label>
                                            </div>

                                            <script>
                                                var jawabanTBC = "ya";

                                                function isiRadioButton() {
                                                    if (jawabanTBC === "ya") {
                                                        document.getElementById('yay').checked = true;
                                                        tampilkanPertanyaan();
                                                    } else if (jawabanTBC === "tidak") {
                                                        document.getElementById('tidakt').checked = true;
                                                        tampilkanPertanyaan();
                                                    }
                                                }
                                                window.onload = isiRadioButton;
                                            </script>
                                            <br>

                                            <div id="pertanyaan6" class="hidden">
                                                <p style="color: black;">2. Umur</p>
                                                <input type="radio" name="jawab_umur" value="kecil" id="umur_kecil" onclick="tampilkanPertanyaan2()">
                                                <label for="umur_kecil">
                                                    < 15tahun </label>
                                                        <br>
                                                        <input type="radio" name="jawab_umur" value="besar" id="umur_besar" onclick="tampilkanPertanyaan2()">
                                                        <label for="umur_besar"> >= 15 tahun</label>
                                            </div>
                                            <br>

                                            <div id="pertanyaan7" class="hidden">
                                                <label style="color: black;">3. Apakah bapak/ibu memiliki salah satu atau lebih kondisi berikut?</label><br>
                                                <input type="radio" name="jawab3" value="hiv" id="hiv" onclick="tampilkanPertanyaan3()">
                                                <label for="hiv">HIV</label>
                                                <br>
                                                <input type="radio" name="jawab3" value="dm" id="dm" onclick="tampilkanPertanyaan3()">
                                                <label for="dm">DM</label>
                                                <br>
                                                <input type="radio" name="jawab3" value="dh" id="dh" onclick="tampilkanPertanyaan3()">
                                                <label for="dh">DM & HIV</label>
                                                <br>
                                                <input type="radio" name="jawab3" value="tidak2" id="tidak2" onclick="tampilkanPertanyaan3()">
                                                <label for="tidak2">Tidak Keduanya</label>
                                            </div>
                                            <br>

                                            <div id="pertanyaan8" class="hidden">
                                                <label style="color: black;">4. Apakah bapak/ibu mengalami gejala batuk?</label><br>
                                                <input type="radio" name="jawab4" value="ya" id="yabtk" onclick="pertanyaan_batuk()">
                                                <label for="yabtk">Ya</label>
                                                <br>
                                                <input type="radio" name="jawab4" value="tidak" id="tidakbtk" onclick="pertanyaan_batuk()">
                                                <label for="tidakbtk">Tidak</label>
                                            </div>
                                            <br>

                                            <div id="pertanyaan9" class="hidden">
                                                <label style="color: black;">5. Berapa lama gejala batuk sudah dialami?</label><br>
                                                <input type="radio" name="jawab5" value="ya" id="ya5" onclick="vonis()">
                                                <label for="ya5">
                                                    < 2 minggu</label>
                                                        <br>
                                                        <input type="radio" name="jawab5" value="tidak" id="tidak5" onclick="vonis()">
                                                        <label for="tidak5"> ≥ 2 minggu</label>
                                            </div>
                                            <br>

                                            <div id="pertanyaan10" class="hidden">
                                                <div>
                                                    <label style="color: black;">4. Apakah bapak/ibu mengalami gejala berikut?</label><br>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <label>Batuk</label><br>
                                                                <input type="radio" name="jawab_batuk" value="ya" id="ya_batuk1" onclick="getahBening()">
                                                                <label for="ya_batuk1">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_batuk" value="tidak" id="tidak_batuk1" onclick="getahBening()">
                                                                <label for="tidak_batuk1">Tidak</label>
                                                            </td>
                                                            <td style="padding-left: 200px;" class="hidden" id="demam">
                                                                <label>Demam</label><br>
                                                                <input type="radio" name="jawab_demam" value="ya" id="ya_demam1" onclick="getahBening()">
                                                                <label for="ya_demam1">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_demam" value="tidak" id="tidak_demam1" onclick="getahBening()">
                                                                <label for="tidak_demam1">Tidak</label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <br>

                                                <div>
                                                    <table>
                                                        <tr>
                                                            <td class="hidden" id="berat_b">
                                                                <label for="jawab_berat_badan">Penurunan Berat Badan</label><br>
                                                                <input type="radio" name="jawab_berat_badan" value="ya" id="ya_berat_badan1" onclick="getahBening()">
                                                                <label for="ya_berat_badan1">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_berat_badan" value="tidak" id="tidak_berat_badan1" onclick="getahBening()">
                                                                <label for="tidak_berat_badan1">Tidak</label>
                                                            </td>
                                                            <td style="padding-left: 90px;" class="hidden" id="malaise">
                                                                <label for="jawab_keringat_malam">Keringat Malam Tanpa Aktivitas</label><br>
                                                                <input type="radio" name="jawab_keringat_malam" value="ya" id="ya_keringat_malam1" onclick="getahBening()">
                                                                <label for="ya_keringat_malam1">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_keringat_malam" value="tidak" id="tidak_keringat_malam1" onclick="getahBening()">
                                                                <label for="tidak_keringat_malam1">Tidak</label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <br>
                                                <div class="hidden" id="bening">
                                                    <label>Pembesaran kelenjar getah bening</label><br>
                                                    <input type="radio" name="jawabg" value="ya" id="yab" onclick="getahBening()">
                                                    <label for="yab">Ya</label>
                                                    <br>
                                                    <input type="radio" name="jawabg" value="tidak" id="tidakb" onclick="getahBening()">
                                                    <label for="tidakb">Tidak</label>
                                                </div>
                                            </div>

                                            <div id="pertanyaan11" class="hidden">
                                                <div>
                                                    <label style="color: black;">3. Apakah anak mengalami gejala berikut ini?</label>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <label>Batuk ≥ 2 minggu</label><br>
                                                                <input type="radio" name="jawab_batuk" value="ya" id="ya_batuk" onclick="batuklebih()">
                                                                <label for="ya_batuk">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_batuk" value="tidak" id="tidak_batuk" onclick="batuklebih()">
                                                                <label for="tidak_batuk">Tidak</label>
                                                            </td>
                                                            <td style="padding-left: 290px;" class="hidden" id="demam2mg">
                                                                <label> Demam ≥ 2 minggu</label><br>
                                                                <input type="radio" name="jawab_demam" value="ya" id="ya_demam" onclick="batuklebih()">
                                                                <label for="ya_demam">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_demam" value="tidak" id="tidak_demam" onclick="batuklebih()">
                                                                <label for="tidak_demam">Tidak</label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <br>

                                                <div>
                                                    <table>
                                                        <tr>
                                                            <td class="hidden" id="bbturun2mg">
                                                                <label for="jawab_berat_badan"> BB Turun atau Tidak Naik dalam 2 bulan terakhir</label><br>
                                                                <input type="radio" name="jawab_berat_badan" value="ya" id="ya_berat_badan" onclick="batuklebih()">
                                                                <label for="ya_berat_badan">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_berat_badan" value="tidak" id="tidak_berat_badan" onclick="batuklebih()">
                                                                <label for="tidak_berat_badan">Tidak</label>
                                                            </td>
                                                            <td style="padding-left: 90px;" class="hidden" id="malaise2mg">
                                                                <label for="jawab_keringat_malam">Malaise ≥ 2 minggu </label><br>
                                                                <input type="radio" name="jawab_keringat_malam" value="ya" id="ya_keringat_malam" onclick="batuklebih()">
                                                                <label for="ya_keringat_malam">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_keringat_malam" value="tidak" id="tidak_keringat_malam" onclick="batuklebih()">
                                                                <label for="tidak_keringat_malam">Tidak</label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <br>
                                        </div>

                                        <div class="col-md-6">
                                            <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                            <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                                            <!-- <button type="submit" class="btn btn-success mb-4" onclick="cetak()">Cetak</button> -->
                                        </div>
                                        <!-- <h1>Jumlah Pasien:</h1>
                                        <p id="jumlahPasien"></p>
                                        <h1>Jumlah Skirning:</h1>
                                        <p id="jumlahSkrining"></p> -->
                                        <!-- <h1>Jumlah terduga:</h1>
                                        <p id="jumlahTerduga"></p> -->
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
</div>
<script>
    // $(document).ready(function() {
    //     $.ajax({
    //         url: "<?php echo base_url('Skrining_TBC/tampilkan_jumlah_pasien'); ?>",
    //         method: "GET",
    //         success: function(response) {
    //             console.log(response); // Tampilkan response dari controller di console
    //             $("#jumlahPasien").text("Jumlah Pasien: " + response);
    //         },
    //         error: function(error) {
    //             console.error("Error:", error);
    //         }
    //     });
    // });
    // $(document).ready(function() {
    //     $.ajax({
    //         url: "<?php echo base_url('Skrining_TBC/tampilkan_jumlah_skrining'); ?>",
    //         method: "GET",
    //         success: function(response) {
    //             console.log(response); // Tampilkan response dari controller di console
    //             $("#jumlahSkrining").text("Jumlah skrining: " + response);
    //         },
    //         error: function(error) {
    //             console.error("Error:", error);
    //         }
    //     });
    // });
    // $(document).ready(function() {
    //     $.ajax({
    //         url: "<?php echo base_url('Skrining_TBC/tampilkan_jumlah_terduga'); ?>",
    //         method: "GET",
    //         success: function(response) {
    //             console.log(response); // Tampilkan response dari controller di console
    //             var alias = {
    //                 'E00RX703': 'Anak',
    //                 'ZX2016T39': 'Paru',
    //                 '24QRNLX29R': 'Dalam',
    //                 'MWK205D30K': 'Umum',
    //                 'HLGI4176K8': 'Obgyn',
    //                 'lainnya': 'Lainnya'
    //             };

    //             $.each(response, function(id_list_poli, jumlah_terduga) {
    //                 var aliasText = alias[id_list_poli] || id_list_poli;
    //                 $("#jumlahTerduga").append("Jumlah Terduga untuk " + aliasText + ": " + jumlah_terduga + "<br>");
    //             });
    //         },
    //         error: function(error) {
    //             console.error("Error:", error);
    //         }
    //     });
    // });

    function getahBening() {
        var yabatuk = document.getElementById('ya_batuk1');
        var tidakbatuk = document.getElementById('tidak_batuk1');
        var yademam = document.getElementById('ya_demam1');
        var tidakdemam = document.getElementById('tidak_demam1');
        var yaberatbadan = document.getElementById('ya_berat_badan1');
        var tidakberatbadan = document.getElementById('tidak_berat_badan1');
        var yamalaise = document.getElementById('ya_keringat_malam1');
        var tidakmalaise = document.getElementById('tidak_keringat_malam1');
        var yagetah = document.getElementById("yab");
        var tidakgetah = document.getElementById("tidakb");
        var per_demam = document.getElementById('demam');
        var per_berat = document.getElementById('berat_b');
        var per_malai = document.getElementById('malaise');
        var per_bening = document.getElementById('bening');

        var result;

        if (yabatuk.checked) {
            per_demam.classList.add('hidden');
            result = "terduga TBC";
        }
        if (tidakbatuk.checked) {
            per_demam.classList.remove('hidden');
            result = "tidak terduga TBC";
        }
        if (yademam.checked) {
            per_berat.classList.add('hidden');
            result = "terduga TBC";
        }
        if (tidakdemam.checked) {
            per_berat.classList.remove('hidden');
            result = "tidak terduga TBC";
        }
        if (yaberatbadan.checked) {
            per_malai.classList.add('hidden');
            result = "terduga TBC";
        }
        if (tidakberatbadan.checked) {
            per_malai.classList.remove('hidden');
            result = "tidak terduga TBC";
        }
        if (yamalaise.checked) {
            per_bening.classList.add('hidden');
            result = "terduga TBC";
        }
        if (tidakmalaise.checked) {
            per_bening.classList.remove('hidden');
            result = "tidak terduga TBC";
        }
        if (yagetah.checked) {
            result = "terduga TBC";
        }
        if (tidakgetah.checked) {
            result = "tidak terduga TBC";
        }
        return result;

    }

    function batuklebih() {
        var ya_batuk = document.getElementById('ya_batuk');
        var tidak_batuk = document.getElementById('tidak_batuk');
        // var yabatuk1 = document.getElementById('ya_batuk');
        // var tidakbatuk1 = document.getElementById('tidak_batuk');
        var ya_demam = document.getElementById('ya_demam');
        var tidak_demam = document.getElementById('tidak_demam');
        var ya_beratbadan = document.getElementById('ya_berat_badan');
        var tidak_beratbadan = document.getElementById('tidak_berat_badan');
        var ya_malaise = document.getElementById('ya_keringat_malam');
        var tidak_malaise = document.getElementById('tidak_keringat_malam');
        var pert_demam = document.getElementById('demam2mg');
        var pert_bb = document.getElementById('bbturun2mg');
        var pert_malai = document.getElementById('malaise2mg');

        var result;

        if (ya_batuk.checked) {
            pert_demam.classList.add('hidden');
            result = "terduga TBC";
        }
        if (tidak_batuk.checked) {
            pert_demam.classList.remove('hidden');
            result = "tidak terduga TBC";
        }
        if (ya_demam.checked) {
            pert_bb.classList.add('hidden');
            result = "terduga TBC";
        }
        if (tidak_demam.checked) {
            pert_bb.classList.remove('hidden');
            result = "tidak terduga TBC";
        }
        if (ya_beratbadan.checked) {
            pert_malai.classList.add('hidden');
            result = "terduga TBC";
        }
        if (tidak_beratbadan.checked) {
            pert_malai.classList.remove('hidden');
            result = "tidak terduga TBC";
        }
        if (ya_malaise.checked) {
            result = "terduga TBC";
        }
        if (tidak_malaise.checked) {
            result = "tidak terduga TBC";
        }

        return result;
        // if (yabatuk.checked && yademam.checked && yaberatbadan.checked && yamalaise.checked) {
        //     return "Terduga TBC";
        // } else if (tidakbatuk.checked && tidakdemam.checked && tidakberatbadan.checked && tidakmalaise.checked) {
        //     return "Tidak Terduga TBC";
        // } else if (yabatuk.checked && yademam.checked && tidakberatbadan.checked && tidakmalaise.checked) {
        //     return "Tidak Terduga TBC";
        // } else if (tidakbatuk.checked && tidakdemam.checked && yaberatbadan.checked && yamalaise.checked) {
        //     return "Tidak Terduga TBC";
        // } else if (yabatuk.checked && tidakdemam.checked && tidakberatbadan.checked && tidakmalaise.checked) {
        //     return "Terduga TBC";
        // } else if (tidakbatuk.checked && yademam.checked && yaberatbadan.checked && yamalaise.checked) {
        //     return "Terduga TBC";
        // } else if (tidakbatuk.checked && tidakdemam.checked && tidakberatbadan.checked && yamalaise.checked) {
        //     return "Terduga TBC";
        // } else {
        //     return "Tidak Terduga TBC";
        // }
    }

    function vonis() {
        var ya = document.getElementById('ya5');
        var tidak = document.getElementById('tidak5');
        var hasil;

        if (ya.checked) {
            hasil = "Tidak Terduga TBC";
            //console.log(hasil);
        } else if (tidak.checked) {
            hasil = "Terduga TBC";
            //console.log(hasil);
        }
        return hasil;
    }

    function pertanyaan_batuk() {
        var ya_btk = document.getElementById('yabtk');
        var tidak_btk = document.getElementById('tidakbtk');
        var per9 = document.getElementById('pertanyaan9');

        if (ya_btk.checked) {
            per9.classList.remove('hidden');
            var hasilVonis = vonis();
            return hasilVonis;
        } else if (tidak_btk.checked) {
            per9.classList.add('hidden');
            return "tidak terduga TBC";
        }

    }

    function diagnosaTBC() {
        var ya_btk = document.getElementById('yabtk');
        var tidak_btk = document.getElementById('tidakbtk');
        var per9 = document.getElementById('pertanyaan9');
        var hasil;

        if (ya_btk.checked) {
            per9.classList.remove('hidden');
            var ya = document.getElementById('ya5');
            var tidak = document.getElementById('tidak5');

            if (ya.checked) {
                hasil = "Tidak Terduga TBC";
            } else if (tidak.checked) {
                hasil = "Terduga TBC";
            }
        } else if (tidak_btk.checked) {
            per9.classList.add('hidden');
            hasil = "Tidak Terduga TBC";
        }

        return hasil;
    }


    function tampilkanPertanyaan() {
        var yaRadio = document.getElementById('yay');
        var tidakRadio = document.getElementById('tidakt');
        var pertanyaan6 = document.getElementById('pertanyaan6');
        var pertanyaan7 = document.getElementById('pertanyaan7');
        var pertanyaan8 = document.getElementById('pertanyaan8');
        var pertanyaan9 = document.getElementById('pertanyaan9');
        var pertanyaan10 = document.getElementById('pertanyaan10');
        var pertanyaan11 = document.getElementById('pertanyaan11');

        // Sembunyikan atau tampilkan pertanyaan kedua berdasarkan jawaban pertama
        if (tidakRadio.checked) {
            pertanyaan6.classList.remove('hidden');
        } else if (yaRadio.checked) {
            pertanyaan7.classList.add('hidden');
            pertanyaan8.classList.add('hidden');
            pertanyaan9.classList.add('hidden');
            pertanyaan10.classList.add('hidden');
            pertanyaan11.classList.add('hidden');
            pertanyaan6.classList.add('hidden');
        }
    }

    function tampilkanPertanyaan2() {
        var kecilRadio = document.getElementById('umur_kecil');
        var besarRadio = document.getElementById('umur_besar');
        var pertanyaan7 = document.getElementById('pertanyaan7');
        var pertanyaan8 = document.getElementById('pertanyaan8');
        var pertanyaan9 = document.getElementById('pertanyaan9');
        var pertanyaan10 = document.getElementById('pertanyaan10');
        var pertanyaan11 = document.getElementById('pertanyaan11');

        // Sembunyikan atau tampilkan pertanyaan kedua berdasarkan jawaban pertama
        if (kecilRadio.checked) {
            pertanyaan7.classList.add('hidden');
            pertanyaan11.classList.remove('hidden');
            pertanyaan8.classList.add('hidden');
            pertanyaan9.classList.add('hidden');
            pertanyaan10.classList.add('hidden');
        } else if (besarRadio.checked) {
            pertanyaan11.classList.add('hidden');
            pertanyaan7.classList.remove('hidden');
        }
    }




    function tampilkanPertanyaan3() {
        var hivRadio = document.getElementById('hiv');
        var dmRadio = document.getElementById('dm');
        var dhRadio = document.getElementById('dh');
        var tidakRadio2 = document.getElementById('tidak2');
        var pertanyaan8 = document.getElementById('pertanyaan8');
        var pertanyaan9 = document.getElementById('pertanyaan9');
        var pertanyaan10 = document.getElementById('pertanyaan10');

        // Sembunyikan atau tampilkan pertanyaan ketiga berdasarkan jawaban pertama
        if (tidakRadio2.checked) {
            pertanyaan8.classList.remove('hidden');
            pertanyaan9.classList.add('hidden');
            pertanyaan10.classList.add('hidden');
        } else if (hivRadio.checked || dmRadio.checked || dhRadio.checked) {
            pertanyaan10.classList.remove('hidden');
            pertanyaan9.classList.add('hidden');
            pertanyaan8.classList.add('hidden');
        }
    }

    function tampilkanPertanyaan4() {
        var kecilRadio = document.getElementById('umur_kecil');
        var besarRadio = document.getElementById('umur_besar');
        var hivRadio = document.getElementById('hiv');
        var dmRadio = document.getElementById('dm');
        var dhRadio = document.getElementById('dh');
        var tidakRadio2 = document.getElementById('tidak2');
        var pertanyaan3 = document.getElementById('pertanyaan3');
        var pertanyaan7 = document.getElementById('pertanyaan7');

        // Sembunyikan atau tampilkan pertanyaan ketiga berdasarkan jawaban pertama
        if (kecilRadio.checked) {
            pertanyaan7.classList.remove('hidden');
            pertanyaan3.classList.add('hidden');

        } else if (besarRadio.checked) {
            pertanyaan3.classList.remove('hidden');
            pertanyaan7.classList.add('hidden');
        }
    }


    function tampilkanPertanyaan5() {
        var hivRadio = document.getElementById('hiv');
        var dmRadio = document.getElementById('dm');
        var dhRadio = document.getElementById('dh');
        var pertanyaan4 = document.getElementById('pertanyaan4');
        var pertanyaan5 = document.getElementById('pertanyaan5');
        var pertanyaan6 = document.getElementById('pertanyaan6');

        // Sembunyikan pertanyaan6 dan tampilkan pertanyaan4 dan pertanyaan5 jika radio button HIV, DM, atau HIV & DM dipilih pada pertanyaan 3
        if (hivRadio.checked || dmRadio.checked || dhRadio.checked) {
            pertanyaan4.classList.remove('hidden');
            pertanyaan5.classList.remove('hidden');
        } else {
            pertanyaan4.classList.add('hidden');
            pertanyaan5.classList.add('hidden');
        }
    }

    function pertanyaan10Ditampilkan() {
        var per10 = document.getElementById('pertanyaan10');
        return !per10.classList.contains('hidden');
    }


    // Panggil fungsi saat ada perubahan pada radio button di pertanyaan 3
    // document.getElementsByName('jawab').forEach(function(radio) {
    //     radio.addEventListener('change', tampilkanPertanyaan3);
    // });



    // // Panggil fungsi saat ada perubahan pada radio button di pertanyaan 3
    // document.getElementsByName('jawab').forEach(function(radio) {
    //     radio.addEventListener('change', tampilkanPertanyaan3);
    // });


    // // Panggil fungsi saat ada perubahan pada radio button pertanyaan 3
    // document.querySelectorAll('input[name="jawab"]').forEach(function(radio) {
    //     radio.addEventListener('change', tampilkanPertanyaan6);
    // });


    // document.getElementsByName('jawab').forEach(function(radio) {
    //     radio.addEventListener('change', tampilkanPertanyaan3);
    // });

    function simpan() {
        var isTBCy = $('input[id="yay"]:checked').val();
        var isTBCt = $('input[id="tidakt"]:checked').val();
        var kecil = document.getElementById('umur_kecil');
        var besar = document.getElementById('umur_besar');

        if (isTBCt) {
            var no_rm = $('#inNoRM').val(); // Sesuaikan dengan nama sebenarnya dari input
            var nama = $('#inNama').val();
            var poli = $('#inPoli').val();
            var history = $('#inHis').val();
            var tgl_lahir = $('#inTglLahir').val();
            var jenis_kelamin = $('#inJk').val();
            var id_pel = $('#inPel').val();
            var jawaban = $('input[id="tidakt"]:checked').val();
            var keterangan;
            if (kecil.checked) {
                keterangan = batuklebih();
            } else if (besar.checked) {
                // Logika untuk menampilkan pertanyaan 10
                if (pertanyaan10Ditampilkan()) {
                    keterangan = getahBening();
                } else {
                    keterangan = diagnosaTBC();
                    // Atau kode lain yang perlu dieksekusi
                }
            }
            var postData = {
                no_rm: no_rm,
                nama: nama,
                poli: poli,
                id_pel: id_pel,
                tgl_lahir: tgl_lahir,
                jenis_kelamin: jenis_kelamin,
                jawaban: jawaban,
                history: history,
                keterangan: keterangan
            };
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Skrining_TBC/index_post') ?>",
                // url: 'http://192.168.125.7/re-sibatik/Skrining_TBC/index_post',
                contentType: 'application/json', // Mengatur tipe konten sebagai JSON
                data: JSON.stringify(postData), // Mengubah objek menjadi string JSON
                success: function(response) {
                    // Menangani respons dari server
                    console.log(response);

                    // Mengasumsikan respons adalah objek JSON dengan properti 'status'
                    if (response.status === 'success') {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data berhasil disimpan",
                            buttons: false,
                            timer: 800
                        });
                        $('#tablediagnosa').DataTable().ajax.reload();
                        $('#tablediagnosa1').DataTable().ajax.reload();
                        id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
                        id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";
                        inJenPel = $('#inJenPel').val();

                        window.location.href = "<?php echo base_url('Erm_poli/form/') ?>" + id_pel + '/' + id_his + '/' + inJenPel;
                    } else {
                        swal({
                            title: "Gagal!",
                            type: "warning",
                            confirmButtonColor: "#3cb878",
                        });
                    }
                },
                error: function(error) {
                    console.error(error);
                    alert('Kesalahan saat menyimpan data. Silakan coba lagi.');
                }
            });
        } else if (isTBCy) {
            // Mengambil data lainnya dari formulir
            var no_rm = $('#inNoRM').val(); // Sesuaikan dengan nama sebenarnya dari input
            var nama = $('#inNama').val();
            var poli = $('#inPoli').val();
            var history = $('#inHis').val();
            var tgl_lahir = $('#inTglLahir').val();
            var jenis_kelamin = $('#inJk').val();
            var id_pel = $('#inPel').val();
            var jawaban = $('input[id="yay"]:checked').val();
            var keterangan1 = "Pasien sedang pengobatan TBC";

            // Menyusun objek data untuk dikirim
            var postData = {
                no_rm: no_rm,
                nama: nama,
                poli: poli,
                id_pel: id_pel,
                tgl_lahir: tgl_lahir,
                jenis_kelamin: jenis_kelamin,
                jawaban: jawaban,
                history: history,
                keterangan: keterangan1
            };

            // Melakukan permintaan AJAX ke endpoint API
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('Skrining_TBC/index_post') ?>',
                contentType: 'application/json', // Mengatur tipe konten sebagai JSON
                data: JSON.stringify(postData), // Mengubah objek menjadi string JSON
                success: function(response) {
                    // Menangani respons dari server
                    console.log(response);

                    // Mengasumsikan respons adalah objek JSON dengan properti 'status'
                    if (response.status === 'success') {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data berhasil disimpan",
                            buttons: false,
                            timer: 800
                        });
                        $('#tablediagnosa').DataTable().ajax.reload();
                        $('#tablediagnosa1').DataTable().ajax.reload();
                        id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
                        id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";
                        inJenPel = $('#inJenPel').val();
                        window.location.href = "<?php echo base_url('Erm_poli/form/') ?>" + id_pel + '/' + id_his + '/' + inJenPel;
                    } else {
                        swal({
                            title: "Gagal!",
                            type: "warning",
                            confirmButtonColor: "#3cb878",
                        });
                    }
                },
                error: function(error) {
                    console.error(error);
                    alert('Kesalahan saat menyimpan data. Silakan coba lagi.');
                }
            });
        }
    }
=======
<!-- Row -->
<style>
    .hidden {
        display: none;
    }
</style>
<?php $this->load->view('erm_form/Poli/view_tombol') ?>

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="form-group ">
            <div class="form-group">
                <div class="col-md-12">
                    <center>
                        <h4 style="margin-top: 30px;"><strong>
                                <label class="control-label mb-10 text-left"><b>SKRINING TBC</b><span class="help"></span></label></strong>
                        </h4>
                    </center>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">

                    <div class="panel-body">
                        <div class="form-wrap">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left" style="color: black;">No.RM<span class="help"></span></label>
                                    <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM" name="norm">
                                    <input type="hidden" class="form-control" value="<?= urlencode(base64_encode($id_pelayanan)) ?>" id="inPel">
                                    <input type="hidden" class="form-control" value="<?= urlencode(base64_encode($id_history)) ?>" id="inHis">
                                    <input type="hidden" class="form-control" value="<?= $poli ?>" id="inPoli">
                                    <input type="hidden" class="form-control" value="<?= $jenis_pelayanan ?>" id="inJenPel">

                                </div>
                                <!-- <div class="col-md-1"></div> -->
                            </div>

                            <!-- Sisipkan gaya warna hitam di sini -->
                            <style>
                                label {
                                    color: black;
                                }
                            </style>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left" style="color: black;">Nama<span class="help"></span></label>
                                    <input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama" name="nama">
                                    <span class="help-block"></span>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                            </div>


                            <div class="form-group ">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left" style="color: black;">Jenis Kelamin</label>
                                    <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk" name="jk">
                                    <span class="help-block"></span>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Tgl Lahir / Umur<span class="help"></span></label>
                                    <input type="text" disabled class="form-control" id="inTglLahir" value="<?php
                                                                                                            setlocale(LC_ALL, 'id_ID');

                                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                                            $time = strtotime($tgl_lahir);
                                                                                                            $date = strftime(" %d %B %Y ", $time);
                                                                                                            echo $date  . '(' . getAge($tgl_lahir) . ')' ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left" style="color: black;">Jam/ Tanggal Masuk <span class="help"></span></label>
                                    <input type="text" id="inTglMasuk" disabled class="form-control" value="<?php
                                                                                                            setlocale(LC_ALL, 'id_ID');

                                                                                                            date_default_timezone_set('Asia/Jakarta');
                                                                                                            $time = strtotime($tgl_masuk);
                                                                                                            $date = strftime(" %d %B %Y ", $time);
                                                                                                            echo $date ?>">
                                    <span class="help-block"></span>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left" style="color: black;">Cara Bayar<span class="help"></span></label>
                                    <input type="text" disabled class="form-control" id="inCaraBayar" value="<?= $cara_bayar ?>">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <input type="hidden" name="date" id="date">
                            <div class="panel-heading">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <center>
                                                <h4 style="margin-top: 30px;"><strong>
                                                        <label class="control-label mb-10 text-left"><b>PERTANYAAN</b><span class="help"></span></label></strong>
                                                </h4>
                                            </center>
                                            <br>
                                            <div class="clearfix"></div>
                                            <div id="pertanyaan5">
                                                <label style="color: black;">1. Apakah anda sedang menjalani pengobatan TBC?</label><br>
                                                <input type="radio" name="jawab1" value="ya" id="yay" onclick="tampilkanPertanyaan()">
                                                <label for="yay">Ya</label>
                                                <br>
                                                <input type="radio" name="jawab1" value="tidak" id="tidakt" onclick="tampilkanPertanyaan()">
                                                <label for="tidakt">Tidak</label>
                                            </div>

                                            <script>
                                                var jawabanTBC = "ya";

                                                function isiRadioButton() {
                                                    if (jawabanTBC === "ya") {
                                                        document.getElementById('yay').checked = true;
                                                        tampilkanPertanyaan();
                                                    } else if (jawabanTBC === "tidak") {
                                                        document.getElementById('tidakt').checked = true;
                                                        tampilkanPertanyaan();
                                                    }
                                                }
                                                window.onload = isiRadioButton;
                                            </script>
                                            <br>

                                            <div id="pertanyaan6" class="hidden">
                                                <p style="color: black;">2. Umur</p>
                                                <input type="radio" name="jawab_umur" value="kecil" id="umur_kecil" onclick="tampilkanPertanyaan2()">
                                                <label for="umur_kecil">
                                                    < 15tahun </label>
                                                        <br>
                                                        <input type="radio" name="jawab_umur" value="besar" id="umur_besar" onclick="tampilkanPertanyaan2()">
                                                        <label for="umur_besar"> >= 15 tahun</label>
                                            </div>
                                            <br>

                                            <div id="pertanyaan7" class="hidden">
                                                <label style="color: black;">3. Apakah bapak/ibu memiliki salah satu atau lebih kondisi berikut?</label><br>
                                                <input type="radio" name="jawab3" value="hiv" id="hiv" onclick="tampilkanPertanyaan3()">
                                                <label for="hiv">HIV</label>
                                                <br>
                                                <input type="radio" name="jawab3" value="dm" id="dm" onclick="tampilkanPertanyaan3()">
                                                <label for="dm">DM</label>
                                                <br>
                                                <input type="radio" name="jawab3" value="dh" id="dh" onclick="tampilkanPertanyaan3()">
                                                <label for="dh">DM & HIV</label>
                                                <br>
                                                <input type="radio" name="jawab3" value="tidak2" id="tidak2" onclick="tampilkanPertanyaan3()">
                                                <label for="tidak2">Tidak Keduanya</label>
                                            </div>
                                            <br>

                                            <div id="pertanyaan8" class="hidden">
                                                <label style="color: black;">4. Apakah bapak/ibu mengalami gejala batuk?</label><br>
                                                <input type="radio" name="jawab4" value="ya" id="yabtk" onclick="pertanyaan_batuk()">
                                                <label for="yabtk">Ya</label>
                                                <br>
                                                <input type="radio" name="jawab4" value="tidak" id="tidakbtk" onclick="pertanyaan_batuk()">
                                                <label for="tidakbtk">Tidak</label>
                                            </div>
                                            <br>

                                            <div id="pertanyaan9" class="hidden">
                                                <label style="color: black;">5. Berapa lama gejala batuk sudah dialami?</label><br>
                                                <input type="radio" name="jawab5" value="ya" id="ya5" onclick="vonis()">
                                                <label for="ya5">
                                                    < 2 minggu</label>
                                                        <br>
                                                        <input type="radio" name="jawab5" value="tidak" id="tidak5" onclick="vonis()">
                                                        <label for="tidak5"> ≥ 2 minggu</label>
                                            </div>
                                            <br>

                                            <div id="pertanyaan10" class="hidden">
                                                <div>
                                                    <label style="color: black;">4. Apakah bapak/ibu mengalami gejala berikut?</label><br>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <label>Batuk</label><br>
                                                                <input type="radio" name="jawab_batuk" value="ya" id="ya_batuk1" onclick="getahBening()">
                                                                <label for="ya_batuk1">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_batuk" value="tidak" id="tidak_batuk1" onclick="getahBening()">
                                                                <label for="tidak_batuk1">Tidak</label>
                                                            </td>
                                                            <td style="padding-left: 200px;" class="hidden" id="demam">
                                                                <label>Demam</label><br>
                                                                <input type="radio" name="jawab_demam" value="ya" id="ya_demam1" onclick="getahBening()">
                                                                <label for="ya_demam1">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_demam" value="tidak" id="tidak_demam1" onclick="getahBening()">
                                                                <label for="tidak_demam1">Tidak</label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <br>

                                                <div>
                                                    <table>
                                                        <tr>
                                                            <td class="hidden" id="berat_b">
                                                                <label for="jawab_berat_badan">Penurunan Berat Badan</label><br>
                                                                <input type="radio" name="jawab_berat_badan" value="ya" id="ya_berat_badan1" onclick="getahBening()">
                                                                <label for="ya_berat_badan1">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_berat_badan" value="tidak" id="tidak_berat_badan1" onclick="getahBening()">
                                                                <label for="tidak_berat_badan1">Tidak</label>
                                                            </td>
                                                            <td style="padding-left: 90px;" class="hidden" id="malaise">
                                                                <label for="jawab_keringat_malam">Keringat Malam Tanpa Aktivitas</label><br>
                                                                <input type="radio" name="jawab_keringat_malam" value="ya" id="ya_keringat_malam1" onclick="getahBening()">
                                                                <label for="ya_keringat_malam1">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_keringat_malam" value="tidak" id="tidak_keringat_malam1" onclick="getahBening()">
                                                                <label for="tidak_keringat_malam1">Tidak</label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <br>
                                                <div class="hidden" id="bening">
                                                    <label>Pembesaran kelenjar getah bening</label><br>
                                                    <input type="radio" name="jawabg" value="ya" id="yab" onclick="getahBening()">
                                                    <label for="yab">Ya</label>
                                                    <br>
                                                    <input type="radio" name="jawabg" value="tidak" id="tidakb" onclick="getahBening()">
                                                    <label for="tidakb">Tidak</label>
                                                </div>
                                            </div>

                                            <div id="pertanyaan11" class="hidden">
                                                <div>
                                                    <label style="color: black;">3. Apakah anak mengalami gejala berikut ini?</label>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <label>Batuk ≥ 2 minggu</label><br>
                                                                <input type="radio" name="jawab_batuk" value="ya" id="ya_batuk" onclick="batuklebih()">
                                                                <label for="ya_batuk">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_batuk" value="tidak" id="tidak_batuk" onclick="batuklebih()">
                                                                <label for="tidak_batuk">Tidak</label>
                                                            </td>
                                                            <td style="padding-left: 290px;" class="hidden" id="demam2mg">
                                                                <label> Demam ≥ 2 minggu</label><br>
                                                                <input type="radio" name="jawab_demam" value="ya" id="ya_demam" onclick="batuklebih()">
                                                                <label for="ya_demam">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_demam" value="tidak" id="tidak_demam" onclick="batuklebih()">
                                                                <label for="tidak_demam">Tidak</label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <br>

                                                <div>
                                                    <table>
                                                        <tr>
                                                            <td class="hidden" id="bbturun2mg">
                                                                <label for="jawab_berat_badan"> BB Turun atau Tidak Naik dalam 2 bulan terakhir</label><br>
                                                                <input type="radio" name="jawab_berat_badan" value="ya" id="ya_berat_badan" onclick="batuklebih()">
                                                                <label for="ya_berat_badan">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_berat_badan" value="tidak" id="tidak_berat_badan" onclick="batuklebih()">
                                                                <label for="tidak_berat_badan">Tidak</label>
                                                            </td>
                                                            <td style="padding-left: 90px;" class="hidden" id="malaise2mg">
                                                                <label for="jawab_keringat_malam">Malaise ≥ 2 minggu </label><br>
                                                                <input type="radio" name="jawab_keringat_malam" value="ya" id="ya_keringat_malam" onclick="batuklebih()">
                                                                <label for="ya_keringat_malam">Ya</label>
                                                                <br>
                                                                <input type="radio" name="jawab_keringat_malam" value="tidak" id="tidak_keringat_malam" onclick="batuklebih()">
                                                                <label for="tidak_keringat_malam">Tidak</label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <br>
                                        </div>

                                        <div class="col-md-6">
                                            <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                            <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                                            <!-- <button type="submit" class="btn btn-success mb-4" onclick="cetak()">Cetak</button> -->
                                        </div>
                                        <!-- <h1>Jumlah Pasien:</h1>
                                        <p id="jumlahPasien"></p>
                                        <h1>Jumlah Skirning:</h1>
                                        <p id="jumlahSkrining"></p> -->
                                        <!-- <h1>Jumlah terduga:</h1>
                                        <p id="jumlahTerduga"></p> -->
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
</div>
<script>
    // $(document).ready(function() {
    //     $.ajax({
    //         url: "<?php echo base_url('Skrining_TBC/tampilkan_jumlah_pasien'); ?>",
    //         method: "GET",
    //         success: function(response) {
    //             console.log(response); // Tampilkan response dari controller di console
    //             $("#jumlahPasien").text("Jumlah Pasien: " + response);
    //         },
    //         error: function(error) {
    //             console.error("Error:", error);
    //         }
    //     });
    // });
    // $(document).ready(function() {
    //     $.ajax({
    //         url: "<?php echo base_url('Skrining_TBC/tampilkan_jumlah_skrining'); ?>",
    //         method: "GET",
    //         success: function(response) {
    //             console.log(response); // Tampilkan response dari controller di console
    //             $("#jumlahSkrining").text("Jumlah skrining: " + response);
    //         },
    //         error: function(error) {
    //             console.error("Error:", error);
    //         }
    //     });
    // });
    // $(document).ready(function() {
    //     $.ajax({
    //         url: "<?php echo base_url('Skrining_TBC/tampilkan_jumlah_terduga'); ?>",
    //         method: "GET",
    //         success: function(response) {
    //             console.log(response); // Tampilkan response dari controller di console
    //             var alias = {
    //                 'E00RX703': 'Anak',
    //                 'ZX2016T39': 'Paru',
    //                 '24QRNLX29R': 'Dalam',
    //                 'MWK205D30K': 'Umum',
    //                 'HLGI4176K8': 'Obgyn',
    //                 'lainnya': 'Lainnya'
    //             };

    //             $.each(response, function(id_list_poli, jumlah_terduga) {
    //                 var aliasText = alias[id_list_poli] || id_list_poli;
    //                 $("#jumlahTerduga").append("Jumlah Terduga untuk " + aliasText + ": " + jumlah_terduga + "<br>");
    //             });
    //         },
    //         error: function(error) {
    //             console.error("Error:", error);
    //         }
    //     });
    // });

    function getahBening() {
        var yabatuk = document.getElementById('ya_batuk1');
        var tidakbatuk = document.getElementById('tidak_batuk1');
        var yademam = document.getElementById('ya_demam1');
        var tidakdemam = document.getElementById('tidak_demam1');
        var yaberatbadan = document.getElementById('ya_berat_badan1');
        var tidakberatbadan = document.getElementById('tidak_berat_badan1');
        var yamalaise = document.getElementById('ya_keringat_malam1');
        var tidakmalaise = document.getElementById('tidak_keringat_malam1');
        var yagetah = document.getElementById("yab");
        var tidakgetah = document.getElementById("tidakb");
        var per_demam = document.getElementById('demam');
        var per_berat = document.getElementById('berat_b');
        var per_malai = document.getElementById('malaise');
        var per_bening = document.getElementById('bening');

        var result;

        if (yabatuk.checked) {
            per_demam.classList.add('hidden');
            result = "terduga TBC";
        }
        if (tidakbatuk.checked) {
            per_demam.classList.remove('hidden');
            result = "tidak terduga TBC";
        }
        if (yademam.checked) {
            per_berat.classList.add('hidden');
            result = "terduga TBC";
        }
        if (tidakdemam.checked) {
            per_berat.classList.remove('hidden');
            result = "tidak terduga TBC";
        }
        if (yaberatbadan.checked) {
            per_malai.classList.add('hidden');
            result = "terduga TBC";
        }
        if (tidakberatbadan.checked) {
            per_malai.classList.remove('hidden');
            result = "tidak terduga TBC";
        }
        if (yamalaise.checked) {
            per_bening.classList.add('hidden');
            result = "terduga TBC";
        }
        if (tidakmalaise.checked) {
            per_bening.classList.remove('hidden');
            result = "tidak terduga TBC";
        }
        if (yagetah.checked) {
            result = "terduga TBC";
        }
        if (tidakgetah.checked) {
            result = "tidak terduga TBC";
        }
        return result;

    }

    function batuklebih() {
        var ya_batuk = document.getElementById('ya_batuk');
        var tidak_batuk = document.getElementById('tidak_batuk');
        // var yabatuk1 = document.getElementById('ya_batuk');
        // var tidakbatuk1 = document.getElementById('tidak_batuk');
        var ya_demam = document.getElementById('ya_demam');
        var tidak_demam = document.getElementById('tidak_demam');
        var ya_beratbadan = document.getElementById('ya_berat_badan');
        var tidak_beratbadan = document.getElementById('tidak_berat_badan');
        var ya_malaise = document.getElementById('ya_keringat_malam');
        var tidak_malaise = document.getElementById('tidak_keringat_malam');
        var pert_demam = document.getElementById('demam2mg');
        var pert_bb = document.getElementById('bbturun2mg');
        var pert_malai = document.getElementById('malaise2mg');

        var result;

        if (ya_batuk.checked) {
            pert_demam.classList.add('hidden');
            result = "terduga TBC";
        }
        if (tidak_batuk.checked) {
            pert_demam.classList.remove('hidden');
            result = "tidak terduga TBC";
        }
        if (ya_demam.checked) {
            pert_bb.classList.add('hidden');
            result = "terduga TBC";
        }
        if (tidak_demam.checked) {
            pert_bb.classList.remove('hidden');
            result = "tidak terduga TBC";
        }
        if (ya_beratbadan.checked) {
            pert_malai.classList.add('hidden');
            result = "terduga TBC";
        }
        if (tidak_beratbadan.checked) {
            pert_malai.classList.remove('hidden');
            result = "tidak terduga TBC";
        }
        if (ya_malaise.checked) {
            result = "terduga TBC";
        }
        if (tidak_malaise.checked) {
            result = "tidak terduga TBC";
        }

        return result;
        // if (yabatuk.checked && yademam.checked && yaberatbadan.checked && yamalaise.checked) {
        //     return "Terduga TBC";
        // } else if (tidakbatuk.checked && tidakdemam.checked && tidakberatbadan.checked && tidakmalaise.checked) {
        //     return "Tidak Terduga TBC";
        // } else if (yabatuk.checked && yademam.checked && tidakberatbadan.checked && tidakmalaise.checked) {
        //     return "Tidak Terduga TBC";
        // } else if (tidakbatuk.checked && tidakdemam.checked && yaberatbadan.checked && yamalaise.checked) {
        //     return "Tidak Terduga TBC";
        // } else if (yabatuk.checked && tidakdemam.checked && tidakberatbadan.checked && tidakmalaise.checked) {
        //     return "Terduga TBC";
        // } else if (tidakbatuk.checked && yademam.checked && yaberatbadan.checked && yamalaise.checked) {
        //     return "Terduga TBC";
        // } else if (tidakbatuk.checked && tidakdemam.checked && tidakberatbadan.checked && yamalaise.checked) {
        //     return "Terduga TBC";
        // } else {
        //     return "Tidak Terduga TBC";
        // }
    }

    function vonis() {
        var ya = document.getElementById('ya5');
        var tidak = document.getElementById('tidak5');
        var hasil;

        if (ya.checked) {
            hasil = "Tidak Terduga TBC";
            //console.log(hasil);
        } else if (tidak.checked) {
            hasil = "Terduga TBC";
            //console.log(hasil);
        }
        return hasil;
    }

    function pertanyaan_batuk() {
        var ya_btk = document.getElementById('yabtk');
        var tidak_btk = document.getElementById('tidakbtk');
        var per9 = document.getElementById('pertanyaan9');

        if (ya_btk.checked) {
            per9.classList.remove('hidden');
            var hasilVonis = vonis();
            return hasilVonis;
        } else if (tidak_btk.checked) {
            per9.classList.add('hidden');
            return "tidak terduga TBC";
        }

    }

    function diagnosaTBC() {
        var ya_btk = document.getElementById('yabtk');
        var tidak_btk = document.getElementById('tidakbtk');
        var per9 = document.getElementById('pertanyaan9');
        var hasil;

        if (ya_btk.checked) {
            per9.classList.remove('hidden');
            var ya = document.getElementById('ya5');
            var tidak = document.getElementById('tidak5');

            if (ya.checked) {
                hasil = "Tidak Terduga TBC";
            } else if (tidak.checked) {
                hasil = "Terduga TBC";
            }
        } else if (tidak_btk.checked) {
            per9.classList.add('hidden');
            hasil = "Tidak Terduga TBC";
        }

        return hasil;
    }


    function tampilkanPertanyaan() {
        var yaRadio = document.getElementById('yay');
        var tidakRadio = document.getElementById('tidakt');
        var pertanyaan6 = document.getElementById('pertanyaan6');
        var pertanyaan7 = document.getElementById('pertanyaan7');
        var pertanyaan8 = document.getElementById('pertanyaan8');
        var pertanyaan9 = document.getElementById('pertanyaan9');
        var pertanyaan10 = document.getElementById('pertanyaan10');
        var pertanyaan11 = document.getElementById('pertanyaan11');

        // Sembunyikan atau tampilkan pertanyaan kedua berdasarkan jawaban pertama
        if (tidakRadio.checked) {
            pertanyaan6.classList.remove('hidden');
        } else if (yaRadio.checked) {
            pertanyaan7.classList.add('hidden');
            pertanyaan8.classList.add('hidden');
            pertanyaan9.classList.add('hidden');
            pertanyaan10.classList.add('hidden');
            pertanyaan11.classList.add('hidden');
            pertanyaan6.classList.add('hidden');
        }
    }

    function tampilkanPertanyaan2() {
        var kecilRadio = document.getElementById('umur_kecil');
        var besarRadio = document.getElementById('umur_besar');
        var pertanyaan7 = document.getElementById('pertanyaan7');
        var pertanyaan8 = document.getElementById('pertanyaan8');
        var pertanyaan9 = document.getElementById('pertanyaan9');
        var pertanyaan10 = document.getElementById('pertanyaan10');
        var pertanyaan11 = document.getElementById('pertanyaan11');

        // Sembunyikan atau tampilkan pertanyaan kedua berdasarkan jawaban pertama
        if (kecilRadio.checked) {
            pertanyaan7.classList.add('hidden');
            pertanyaan11.classList.remove('hidden');
            pertanyaan8.classList.add('hidden');
            pertanyaan9.classList.add('hidden');
            pertanyaan10.classList.add('hidden');
        } else if (besarRadio.checked) {
            pertanyaan11.classList.add('hidden');
            pertanyaan7.classList.remove('hidden');
        }
    }




    function tampilkanPertanyaan3() {
        var hivRadio = document.getElementById('hiv');
        var dmRadio = document.getElementById('dm');
        var dhRadio = document.getElementById('dh');
        var tidakRadio2 = document.getElementById('tidak2');
        var pertanyaan8 = document.getElementById('pertanyaan8');
        var pertanyaan9 = document.getElementById('pertanyaan9');
        var pertanyaan10 = document.getElementById('pertanyaan10');

        // Sembunyikan atau tampilkan pertanyaan ketiga berdasarkan jawaban pertama
        if (tidakRadio2.checked) {
            pertanyaan8.classList.remove('hidden');
            pertanyaan9.classList.add('hidden');
            pertanyaan10.classList.add('hidden');
        } else if (hivRadio.checked || dmRadio.checked || dhRadio.checked) {
            pertanyaan10.classList.remove('hidden');
            pertanyaan9.classList.add('hidden');
            pertanyaan8.classList.add('hidden');
        }
    }

    function tampilkanPertanyaan4() {
        var kecilRadio = document.getElementById('umur_kecil');
        var besarRadio = document.getElementById('umur_besar');
        var hivRadio = document.getElementById('hiv');
        var dmRadio = document.getElementById('dm');
        var dhRadio = document.getElementById('dh');
        var tidakRadio2 = document.getElementById('tidak2');
        var pertanyaan3 = document.getElementById('pertanyaan3');
        var pertanyaan7 = document.getElementById('pertanyaan7');

        // Sembunyikan atau tampilkan pertanyaan ketiga berdasarkan jawaban pertama
        if (kecilRadio.checked) {
            pertanyaan7.classList.remove('hidden');
            pertanyaan3.classList.add('hidden');

        } else if (besarRadio.checked) {
            pertanyaan3.classList.remove('hidden');
            pertanyaan7.classList.add('hidden');
        }
    }


    function tampilkanPertanyaan5() {
        var hivRadio = document.getElementById('hiv');
        var dmRadio = document.getElementById('dm');
        var dhRadio = document.getElementById('dh');
        var pertanyaan4 = document.getElementById('pertanyaan4');
        var pertanyaan5 = document.getElementById('pertanyaan5');
        var pertanyaan6 = document.getElementById('pertanyaan6');

        // Sembunyikan pertanyaan6 dan tampilkan pertanyaan4 dan pertanyaan5 jika radio button HIV, DM, atau HIV & DM dipilih pada pertanyaan 3
        if (hivRadio.checked || dmRadio.checked || dhRadio.checked) {
            pertanyaan4.classList.remove('hidden');
            pertanyaan5.classList.remove('hidden');
        } else {
            pertanyaan4.classList.add('hidden');
            pertanyaan5.classList.add('hidden');
        }
    }

    function pertanyaan10Ditampilkan() {
        var per10 = document.getElementById('pertanyaan10');
        return !per10.classList.contains('hidden');
    }


    // Panggil fungsi saat ada perubahan pada radio button di pertanyaan 3
    // document.getElementsByName('jawab').forEach(function(radio) {
    //     radio.addEventListener('change', tampilkanPertanyaan3);
    // });



    // // Panggil fungsi saat ada perubahan pada radio button di pertanyaan 3
    // document.getElementsByName('jawab').forEach(function(radio) {
    //     radio.addEventListener('change', tampilkanPertanyaan3);
    // });


    // // Panggil fungsi saat ada perubahan pada radio button pertanyaan 3
    // document.querySelectorAll('input[name="jawab"]').forEach(function(radio) {
    //     radio.addEventListener('change', tampilkanPertanyaan6);
    // });


    // document.getElementsByName('jawab').forEach(function(radio) {
    //     radio.addEventListener('change', tampilkanPertanyaan3);
    // });

    function simpan() {
        var isTBCy = $('input[id="yay"]:checked').val();
        var isTBCt = $('input[id="tidakt"]:checked').val();
        var kecil = document.getElementById('umur_kecil');
        var besar = document.getElementById('umur_besar');

        if (isTBCt) {
            var no_rm = $('#inNoRM').val(); // Sesuaikan dengan nama sebenarnya dari input
            var nama = $('#inNama').val();
            var poli = $('#inPoli').val();
            var history = $('#inHis').val();
            var tgl_lahir = $('#inTglLahir').val();
            var jenis_kelamin = $('#inJk').val();
            var id_pel = $('#inPel').val();
            var jawaban = $('input[id="tidakt"]:checked').val();
            var keterangan;
            if (kecil.checked) {
                keterangan = batuklebih();
            } else if (besar.checked) {
                // Logika untuk menampilkan pertanyaan 10
                if (pertanyaan10Ditampilkan()) {
                    keterangan = getahBening();
                } else {
                    keterangan = diagnosaTBC();
                    // Atau kode lain yang perlu dieksekusi
                }
            }
            var postData = {
                no_rm: no_rm,
                nama: nama,
                poli: poli,
                id_pel: id_pel,
                tgl_lahir: tgl_lahir,
                jenis_kelamin: jenis_kelamin,
                jawaban: jawaban,
                history: history,
                keterangan: keterangan
            };
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Skrining_TBC/index_post') ?>",
                // url: 'http://192.168.125.7/re-sibatik/Skrining_TBC/index_post',
                contentType: 'application/json', // Mengatur tipe konten sebagai JSON
                data: JSON.stringify(postData), // Mengubah objek menjadi string JSON
                success: function(response) {
                    // Menangani respons dari server
                    console.log(response);

                    // Mengasumsikan respons adalah objek JSON dengan properti 'status'
                    if (response.status === 'success') {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data berhasil disimpan",
                            buttons: false,
                            timer: 800
                        });
                        $('#tablediagnosa').DataTable().ajax.reload();
                        $('#tablediagnosa1').DataTable().ajax.reload();
                        id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
                        id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";
                        inJenPel = $('#inJenPel').val();

                        window.location.href = "<?php echo base_url('Erm_poli/form/') ?>" + id_pel + '/' + id_his + '/' + inJenPel;
                    } else {
                        swal({
                            title: "Gagal!",
                            type: "warning",
                            confirmButtonColor: "#3cb878",
                        });
                    }
                },
                error: function(error) {
                    console.error(error);
                    alert('Kesalahan saat menyimpan data. Silakan coba lagi.');
                }
            });
        } else if (isTBCy) {
            // Mengambil data lainnya dari formulir
            var no_rm = $('#inNoRM').val(); // Sesuaikan dengan nama sebenarnya dari input
            var nama = $('#inNama').val();
            var poli = $('#inPoli').val();
            var history = $('#inHis').val();
            var tgl_lahir = $('#inTglLahir').val();
            var jenis_kelamin = $('#inJk').val();
            var id_pel = $('#inPel').val();
            var jawaban = $('input[id="yay"]:checked').val();
            var keterangan1 = "Pasien sedang pengobatan TBC";

            // Menyusun objek data untuk dikirim
            var postData = {
                no_rm: no_rm,
                nama: nama,
                poli: poli,
                id_pel: id_pel,
                tgl_lahir: tgl_lahir,
                jenis_kelamin: jenis_kelamin,
                jawaban: jawaban,
                history: history,
                keterangan: keterangan1
            };

            // Melakukan permintaan AJAX ke endpoint API
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('Skrining_TBC/index_post') ?>',
                contentType: 'application/json', // Mengatur tipe konten sebagai JSON
                data: JSON.stringify(postData), // Mengubah objek menjadi string JSON
                success: function(response) {
                    // Menangani respons dari server
                    console.log(response);

                    // Mengasumsikan respons adalah objek JSON dengan properti 'status'
                    if (response.status === 'success') {
                        swal({
                            title: "good job!",
                            type: "success",
                            text: "Data berhasil disimpan",
                            buttons: false,
                            timer: 800
                        });
                        $('#tablediagnosa').DataTable().ajax.reload();
                        $('#tablediagnosa1').DataTable().ajax.reload();
                        id_pel = "<?php echo urlencode(base64_encode($id_pelayanan)); ?>";
                        id_his = "<?php echo urlencode(base64_encode($id_history)); ?>";
                        inJenPel = $('#inJenPel').val();
                        window.location.href = "<?php echo base_url('Erm_poli/form/') ?>" + id_pel + '/' + id_his + '/' + inJenPel;
                    } else {
                        swal({
                            title: "Gagal!",
                            type: "warning",
                            confirmButtonColor: "#3cb878",
                        });
                    }
                },
                error: function(error) {
                    console.error(error);
                    alert('Kesalahan saat menyimpan data. Silakan coba lagi.');
                }
            });
        }
    }
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>