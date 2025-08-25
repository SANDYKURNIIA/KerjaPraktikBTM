<form>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h10 class="panel-title txt-dark">Resume Pasien Pulang</h10>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">

                            <div class="form-group">
                                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
                                <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
                                <input type="hidden" class="form-control" value="" id="id" name="id">
                                <input type="hidden" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>">

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Ruang :<span class="help"></span></label>
                                        <input type="text" disabled class="form-control" value="<?= $nama_ruangan ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">No. RM :</label><span class="help"></span></label>
                                        <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                                <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">


                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Kelas :<span class="help"></span></label>
                                        <input type="text" disabled class="form-control" value="<?= $kelas ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Nama Pasien :<span class="help"></span></label>
                                        <input type="text" disabled class="form-control" value="<?= $nama ?>">
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Jenis Kelamin :</label>
                                        <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Tanggal Lahir :</label>
                                        <?php
                                        $tanggal_indonesia = date("Y/m/d", strtotime($tgl_lahir));
                                        echo '<input type="text" id="tanggal_lahir" readonly name="tanggal_lahir"   class="form-control" value="' . $tanggal_indonesia . '">'; ?>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Agama :</label>
                                        <input type="text" disabled class="form-control" value="<?= $agama ?>">
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Status Perkawinan :</label>
                                        <input type="text" disabled class="form-control" value="<?= $status ?>">
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Alamat :</label>
                                        <input type="text" disabled class="form-control" value="<?= $alamat ?>">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Dokter :</label>
                                        <input type="text" disabled class="form-control" value="<?= $nama_dokter ?>">
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Tanggal Masuk :</label>
                                        <input type="text" disabled class="form-control" value="<?= $tgl_masuk ?>">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Tanggal Keluar :</label>
                                        <input type="text" disabled class="form-control" value="<?= $keluar_kamar ?>">
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Riwayat Kelahiran/Anamnesa :<span class="help"></span></label>
                                        <div class="has-success">
                                            <input type="text" class="form-control" name="inRka" id="inRka" value="<?php echo $resume_pasien_pulang["riw_kel"] ?>">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Pemeriksaan Fisik :<span class="help"></span></label>
                                        <div class="has-success">
                                            <input type="text" class="form-control" name="inPF" id="inPF" value="<?php echo $resume_pasien_pulang["pem_fisik"] ?>">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Hasil Pemeriksaan Penunjang :<span class="help"></span></label>
                                        <div class="has-success">
                                            <input type="text" class="form-control" name="inHPP" id="inHPP" value="<?php echo $resume_pasien_pulang["has_pem_pen"] ?>">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Diagnosa Saat Masuk :</label>
                                        <input type="text" disabled class="form-control" value="<?= $diagnosa ?>">
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Diagnosa Utama Yang Ditegakan :</label>
                                        <input type="text" disabled class="form-control" value="<?= $diagnosa_utama ?>">
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Diagnosa Sekunder :<span class="help"></span></label>
                                        <div class="has-success">
                                            <input type="text" class="form-control" name="inDS" id="inDS" value="<?php echo $resume_pasien_pulang["diag_seku"] ?>">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Porsedur Terapi & Tindakan Yang Telah Di Kerjakan :<span class="help"></span></label>
                                        <div class="has-success">
                                            <input type="text" class="form-control" name="inPTTYTDK" id="inPTTYTDK" value="<?php echo $resume_pasien_pulang["por_terapi"] ?>">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Terapi Obat Yang Diberikan Termasuk Obat Setelah Pasien Pulang :<span class="help"></span></label>
                                        <div class="has-success">
                                            <input type="text" class="form-control" name="inTOYDTOSPP" id="inTOYDTOSPP" value="<?php echo $resume_pasien_pulang["ter_obat"] ?>">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Kondisi / Keadaan Pasien Saat Pulang :<span class="help"></span></label>
                                        <div class="has-success">
                                            <select class="form-control select2" id="inKKPSP" name="inKKPSP">
                                                <option value="<?php echo $resume_pasien_pulang['kead_pasien']; ?>">
                                                    <?php echo $resume_pasien_pulang['kead_pasien']; ?>
                                                </option>
                                                <option value="Dirujuk">Dirujuk</option>
                                                <option value="Pulang Paksa">Pulang Paksa</option>
                                                <option value="Meninggal < 48 Jam">Meninggal &lt; 48 Jam</option>
                                                <option value="Meninggal > 48 Jam">Meninggal &gt; 48 Jam</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Edukasi Yang Sudah Diberikan :<span class="help"></span></label>
                                        <div class="has-success">
                                            <input type="text" class="form-control" name="inEYSD" id="inEYSD" value="<?php echo $resume_pasien_pulang["edu_diberi"] ?>">
                                            <span class="help-block text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="control-label mb-10 text-left">Kontrol Kembali Ke RS Tanggal :<span class="help"></span></label>
                                        <div>
                                            <label class="control-label mb-10 text-left">Tanggal :<span class="help"></span></label>
                                            <span id="rawat_error" class="text-danger"></span>
                                            <div class="has-success">
                                                <input type="date" class="form-control" name="inTgl" id="inTgl" value="<?php echo $resume_pasien_pulang["tanggal"] ?>">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <label class="control-label mb-10 text-left">Pukul :<span class="help"></span></label>
                                        <div class="has-success">
                                            <input type="time" class="form-control" name="inPkl" id="inPkl" value="<?php echo $resume_pasien_pulang["pukul"] ?>">
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="col-md-20">
                                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">Kembali</span></a>
                                    <button type="button" value="Simpan" class="btn btn-success mb-4" onclick="simpan()">Simpan </button>
                                </div>
                                <a type="button" target="_blank" class="btn btn-primary mb-4" id="cetak" href="<?= base_url('Erm_resume_pasien_pulang/print_out/' . $id_pelayanan . '/' . $id_history . '') ?>"> Cetak</a>
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
        });
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
    <script type="text/javascript">
        function simpan() {
            id_pelayanan = $('#inPel').val();
            id_history = $('#inHis').val();
            no_rm = $('#inNoRM').val();
            riw_kel = $('#inRka').val();
            pem_fisik = $('#inPF').val();
            has_pem_pen = $('#inHPP').val();
            diag_seku = $('#inDS').val();
            por_terapi = $('#inPTTYTDK').val();
            ter_obat = $('#inTOYDTOSPP').val();
            kead_pasien = $('#inKKPSP').val();
            edu_diberi = $('#inEYSD').val();
            tanggal = $('#inTgl').val();
            pukul = $('#inPkl').val();


            $.ajax({
                url: "<?php echo base_url() ?>Erm_resume_pasien_pulang/store",
                method: "POST",
                dataType: 'json',
                data: {
                    id_pelayanan: id_pelayanan,
                    id_history: id_history,
                    no_rm: no_rm,
                    riw_kel: riw_kel,
                    pem_fisik: pem_fisik,
                    has_pem_pen: has_pem_pen,
                    diag_seku: diag_seku,
                    por_terapi: por_terapi,
                    ter_obat: ter_obat,
                    kead_pasien: kead_pasien,
                    edu_diberi: edu_diberi,
                    tanggal: tanggal,
                    pukul: pukul,
                },

                success: function(data) {
                    if (data.status == "success") {
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
                    "sLengthMenu": "Tampilkan _MENU_ entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
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
                    "sLengthMenu": "Tampilkan _MENU_ entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
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
                    "sLengthMenu": "Tampilkan _MENU_ entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
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