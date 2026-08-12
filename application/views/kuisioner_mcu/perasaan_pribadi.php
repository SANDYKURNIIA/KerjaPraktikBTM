<<<<<<< HEAD
<div id="perasaan_pribadi">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h1 class="panel-title txt-dark"><strong>Perasaan pribadi</strong></h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="form-wrap">
                                <span class="help-block"></span>
                                <div class="form-body">
                                    <!-- Hidden: id_mcu -->
                                    <input type="hidden" id="id_mcu" value="<?= isset($id_mcu) ? htmlspecialchars($id_mcu, ENT_QUOTES, 'UTF-8') : '' ?>">

                                    <form id="formPerasaanPribadi">
                                        <table class="table table-bordered">
                                            <thead class="btn-success text-white">
                                                <tr>
                                                    <th colspan="7" class="text-center bg-success">Perasaan pribadi</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-left" colspan="7">Perasaan anda selama 4 minggu?</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Merasa tenang dan damai</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tenang" value="selalu"> Selalu</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tenang" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tenang" value="jarang"> jarang</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tenang" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                                <tr>
                                                    <td>Merasa bertenaga</td>
                                                    <td class="text-center"><input type="radio" name="merasa_bertenaga" value="selalu"> Selalu</td>
                                                    <td class="text-center"><input type="radio" name="merasa_bertenaga" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="merasa_bertenaga" value="jarang"> jarang</td>
                                                    <td class="text-center"><input type="radio" name="merasa_bertenaga" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                                <tr>
                                                    <td>Merasa Sedih</td>
                                                    <td class="text-center"><input type="radio" name="merasa_sedih" value="selalu"> Selalu</td>
                                                    <td class="text-center"><input type="radio" name="merasa_sedih" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="merasa_sedih" value="jarang"> jarang</td>
                                                    <td class="text-center"><input type="radio" name="merasa_sedih" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                                <tr>
                                                    <td>Merasa gembira</td>
                                                    <td class="text-center"><input type="radio" name="merasa_gembira" value="selalu"> selalu</td>
                                                    <td class="text-center"><input type="radio" name="merasa_gembira" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="merasa_gembira" value="jarang"> Jarang</td>
                                                    <td class="text-center"><input type="radio" name="merasa_gembira" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                                <tr>
                                                    <td>Merasa tidak berguna</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tidak_berguna" value="selalu"> Selalu</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tidak_berguna" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tidak_berguna" value="jarang"> Jarang</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tidak_berguna" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                                <tr>
                                                    <td>Merasa Santai</td>
                                                    <td class="text-center"><input type="radio" name="merasa_santai" value="selalu"> Selalu</td>
                                                    <td class="text-center"><input type="radio" name="merasa_santai" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="merasa_santai" value="jarang"> Jarang</td>
                                                    <td class="text-center"><input type="radio" name="merasa_santai" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                                <tr>
                                                    <td>Seberapa besar pengaruh nasional seperti depresi atau kecemasan mempengaruhi pekerjaan anda</td>
                                                    <td class="text-center"><input type="radio" name="pengaruh_nasional" value="selalu"> Selalu</td>
                                                    <td class="text-center"><input type="radio" name="pengaruh_nasional" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="pengaruh_nasional" value="jarang"> Jarang</td>
                                                    <td class="text-center"><input type="radio" name="pengaruh_nasional" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                                <tr>
                                                    <td>Secara umum, apakah anda tidur 7-8 jam sehari?</td>
                                                    <td class="text-center"><input type="radio" name="secara_umum" value="selalu"> Selalu</td>
                                                    <td class="text-center"><input type="radio" name="secara_umum" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="secara_umum" value="jarang"> Jarang</td>
                                                    <td class="text-center"><input type="radio" name="secara_umum" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-success" id="btnSimpanPerasaan" onclick="simpan_perasaan_pribadi()"><i class="fa fa-file"></i> Simpan</button>
                                    </form>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function simpan_perasaan_pribadi() {
        var id_mcu = document.getElementById('id_mcu').value || '';
        if (!id_mcu) {
            swal({
                title: "Oops",
                text: "id_mcu tidak ditemukan.",
                type: "warning",
                confirmButtonColor: "#3cb878"
            });
            return;
        }

        var data = {};
        var questions = [
            'merasa_tenang', 'merasa_bertenaga', 'merasa_sedih', 'merasa_gembira', 
            'merasa_tidak_berguna', 'merasa_santai', 'pengaruh_nasional', 'secara_umum'
        ];

        for (var i = 0; i < questions.length; i++) {
            var answer = document.querySelector(`input[name="${questions[i]}"]:checked`);
            if (!answer) {
                swal({
                    title: "Oops",
                    text: `Jawaban untuk ${questions[i]} wajib diisi.`,
                    type: "warning",
                    confirmButtonColor: "#3cb878"
                });
                return;
            }
            data[questions[i]] = answer.value;
        }

        swal({
            title: "Apakah kamu yakin?",
            text: "Menyimpan data perasaan pribadi ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function () {
            var btn = document.getElementById('btnSimpanPerasaan');
            if (btn) btn.disabled = true;

            $.ajax({
                url: "<?= base_url('Quitioners/simpan_perasaan_pribadi'); ?>",  // Ensure the URL is correct
                method: "POST",
                dataType: "json",
                data: Object.assign({ id_mcu: id_mcu }, data),
                success: function (res) {
                    if (res && res.status === "success") {
                        swal({
                            title: "Berhasil!",
                            type: "success",
                            text: "Data perasaan pribadi telah disimpan.",
                            confirmButtonColor: "#3cb878"
                        }, function () { location.reload(); });
                    } else {
                        swal({
                            title: "Gagal",
                            type: "warning",
                            text: res.message || "Gagal menyimpan.",
                            confirmButtonColor: "#3cb878"
                        });
                        if (btn) btn.disabled = false;
                    }
                },
                error: function () {
                    swal({
                        title: "Error",
                        type: "error",
                        text: "Terjadi kesalahan koneksi.",
                        confirmButtonColor: "#3cb878"
                    });
                    if (btn) btn.disabled = false;
                }
            });
        });
    }
    </script>
=======
<div id="perasaan_pribadi">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h1 class="panel-title txt-dark"><strong>Perasaan pribadi</strong></h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="form-wrap">
                                <span class="help-block"></span>
                                <div class="form-body">
                                    <!-- Hidden: id_mcu -->
                                    <input type="hidden" id="id_mcu" value="<?= isset($id_mcu) ? htmlspecialchars($id_mcu, ENT_QUOTES, 'UTF-8') : '' ?>">

                                    <form id="formPerasaanPribadi">
                                        <table class="table table-bordered">
                                            <thead class="btn-success text-white">
                                                <tr>
                                                    <th colspan="7" class="text-center bg-success">Perasaan pribadi</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-left" colspan="7">Perasaan anda selama 4 minggu?</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Merasa tenang dan damai</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tenang" value="selalu"> Selalu</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tenang" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tenang" value="jarang"> jarang</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tenang" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                                <tr>
                                                    <td>Merasa bertenaga</td>
                                                    <td class="text-center"><input type="radio" name="merasa_bertenaga" value="selalu"> Selalu</td>
                                                    <td class="text-center"><input type="radio" name="merasa_bertenaga" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="merasa_bertenaga" value="jarang"> jarang</td>
                                                    <td class="text-center"><input type="radio" name="merasa_bertenaga" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                                <tr>
                                                    <td>Merasa Sedih</td>
                                                    <td class="text-center"><input type="radio" name="merasa_sedih" value="selalu"> Selalu</td>
                                                    <td class="text-center"><input type="radio" name="merasa_sedih" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="merasa_sedih" value="jarang"> jarang</td>
                                                    <td class="text-center"><input type="radio" name="merasa_sedih" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                                <tr>
                                                    <td>Merasa gembira</td>
                                                    <td class="text-center"><input type="radio" name="merasa_gembira" value="selalu"> selalu</td>
                                                    <td class="text-center"><input type="radio" name="merasa_gembira" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="merasa_gembira" value="jarang"> Jarang</td>
                                                    <td class="text-center"><input type="radio" name="merasa_gembira" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                                <tr>
                                                    <td>Merasa tidak berguna</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tidak_berguna" value="selalu"> Selalu</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tidak_berguna" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tidak_berguna" value="jarang"> Jarang</td>
                                                    <td class="text-center"><input type="radio" name="merasa_tidak_berguna" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                                <tr>
                                                    <td>Merasa Santai</td>
                                                    <td class="text-center"><input type="radio" name="merasa_santai" value="selalu"> Selalu</td>
                                                    <td class="text-center"><input type="radio" name="merasa_santai" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="merasa_santai" value="jarang"> Jarang</td>
                                                    <td class="text-center"><input type="radio" name="merasa_santai" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                                <tr>
                                                    <td>Seberapa besar pengaruh nasional seperti depresi atau kecemasan mempengaruhi pekerjaan anda</td>
                                                    <td class="text-center"><input type="radio" name="pengaruh_nasional" value="selalu"> Selalu</td>
                                                    <td class="text-center"><input type="radio" name="pengaruh_nasional" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="pengaruh_nasional" value="jarang"> Jarang</td>
                                                    <td class="text-center"><input type="radio" name="pengaruh_nasional" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                                <tr>
                                                    <td>Secara umum, apakah anda tidur 7-8 jam sehari?</td>
                                                    <td class="text-center"><input type="radio" name="secara_umum" value="selalu"> Selalu</td>
                                                    <td class="text-center"><input type="radio" name="secara_umum" value="sering"> Sering</td>
                                                    <td class="text-center"><input type="radio" name="secara_umum" value="jarang"> Jarang</td>
                                                    <td class="text-center"><input type="radio" name="secara_umum" value="tidak_pernah"> Tidak pernah</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-success" id="btnSimpanPerasaan" onclick="simpan_perasaan_pribadi()"><i class="fa fa-file"></i> Simpan</button>
                                    </form>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function simpan_perasaan_pribadi() {
        var id_mcu = document.getElementById('id_mcu').value || '';
        if (!id_mcu) {
            swal({
                title: "Oops",
                text: "id_mcu tidak ditemukan.",
                type: "warning",
                confirmButtonColor: "#3cb878"
            });
            return;
        }

        var data = {};
        var questions = [
            'merasa_tenang', 'merasa_bertenaga', 'merasa_sedih', 'merasa_gembira', 
            'merasa_tidak_berguna', 'merasa_santai', 'pengaruh_nasional', 'secara_umum'
        ];

        for (var i = 0; i < questions.length; i++) {
            var answer = document.querySelector(`input[name="${questions[i]}"]:checked`);
            if (!answer) {
                swal({
                    title: "Oops",
                    text: `Jawaban untuk ${questions[i]} wajib diisi.`,
                    type: "warning",
                    confirmButtonColor: "#3cb878"
                });
                return;
            }
            data[questions[i]] = answer.value;
        }

        swal({
            title: "Apakah kamu yakin?",
            text: "Menyimpan data perasaan pribadi ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3cb878",
            confirmButtonText: "Yakin",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        }, function () {
            var btn = document.getElementById('btnSimpanPerasaan');
            if (btn) btn.disabled = true;

            $.ajax({
                url: "<?= base_url('Quitioners/simpan_perasaan_pribadi'); ?>",  // Ensure the URL is correct
                method: "POST",
                dataType: "json",
                data: Object.assign({ id_mcu: id_mcu }, data),
                success: function (res) {
                    if (res && res.status === "success") {
                        swal({
                            title: "Berhasil!",
                            type: "success",
                            text: "Data perasaan pribadi telah disimpan.",
                            confirmButtonColor: "#3cb878"
                        }, function () { location.reload(); });
                    } else {
                        swal({
                            title: "Gagal",
                            type: "warning",
                            text: res.message || "Gagal menyimpan.",
                            confirmButtonColor: "#3cb878"
                        });
                        if (btn) btn.disabled = false;
                    }
                },
                error: function () {
                    swal({
                        title: "Error",
                        type: "error",
                        text: "Terjadi kesalahan koneksi.",
                        confirmButtonColor: "#3cb878"
                    });
                    if (btn) btn.disabled = false;
                }
            });
        });
    }
    </script>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</div>