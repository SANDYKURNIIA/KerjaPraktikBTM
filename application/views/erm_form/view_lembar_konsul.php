<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Lembar Konsul Antar DPJP</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">

                <div class="panel-body">
                    <div class="form-wrap">


                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>
                                    <label class="control-label mb-10 text-left">Kepada Yth. TS. Dokter: <span class="help"></span></label>
                                </strong>
                                <span id="tempat_error" class="text-danger"></span>
                                <!-- <div class="has-success">
                                    <input type="text" class="form-control" value="" id="inDokter">
                                </div> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Mohon konsultasi pasien berikut: <span class="help"></span></label>
                                </strong>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" id="inPel">
                        <input type="hidden" class="form-control" value="<?= $id_history ?>" id="inHis">
                        <input type="hidden" class="form-control" value="<?= $no_rm ?>" id="inNoRM">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $nama ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label mb-10 text-left">Umur<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?php
                                                                                        $tanggal = new DateTime($tgl_lahir);
                                                                                        $today = new DateTime();
                                                                                        $y = $today->diff($tanggal)->y;
                                                                                        echo  $y . " tahun ";  ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Dari hasil pemeriksaan kami, pasien tersebut dengan : <span class="help"></span></label>
                                </strong>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Diagnosis<span class="help"></span></label>
                                <span id="diagnosis_error" class="text-danger"></span>
                                <div class="has-success" id="the-basics">
                                    <input type="text" class="form-control typeahead" value="" id="diagnosis" style="width: 500px;">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Terapi Yang Telah Diberikan<span class="help"></span></label>
                                <span id="terapi_error" class="text-danger"></span>
                                <div class="has-success">
                                    <textarea class="form-control" name="" id="terapi" cols="30" rows="5"></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label mb-10 text-left">Riwayat Penyakit<span class="help"></span></label>
                                <span id="riwayat_penyakit_error" class="text-danger"></span>
                                <div class="has-success">
                                    <textarea class="form-control" name="" cols="30" rows="5" id="riwayat_penyakit"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>
                        <!-- <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="tindak_lanjut5" type="checkbox" name="tindak_lanjut" value="5" checked>
                                    <label class="control-label" for="tindak_lanjut5">
                                        Hal penting yang perlu diperhatikan
                                    </label>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="kontrol" style="display: none;">
                                    </div>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="tindak_lanjut1" type="checkbox" name="tindak_lanjut" value="5">
                                    <label class="control-label" for="tindak_lanjut1">
                                        Mohon konsul dan tatalaksanan selanjutnya atas pasien tersebut
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="tindak_lanjut2" type="checkbox" name="tindak_lanjut" value="5">
                                    <label class="control-label" for="tindak_lanjut2">
                                        Mohon konsul, apakah ada kelainan di bagian TS atas pasien tersebut,
                                    </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="tindak_lanjut3" type="checkbox" name="tindak_lanjut" value="5">
                                    <label class="control-label" for="tindak_lanjut">
                                        Lainnya
                                    </label>
                                    <div class="has-success">
                                        <textarea class="form-control" name="" id="tindak_lanjut" cols="30" rows="5" style="display: none;"></textarea>

                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div>

                        <div class="form-group" style="margin-top: 30px;">
                            <div class="col-md-12">
                                <strong>
                                    <label class="control-label mb-10 text-left">Mohon konsul dan penanganan selanjutnya, terima kasih atas bantuan dan kerja samanya. <span class="help"></span></label>
                                </strong>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-6">
                                <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table table-hover display  pb-30" id="tabel_terapi">
                                <thead>
                                    <tr class="bg-success">
                                        <th>EDIT</th>
                                        <th>REPLY</th>
                                        <th>HAPUS</th>
                                        <th>TANGGAL & JAM</th>
                                        <th>DOKTER</th>
                                        <th>POLI</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-success">
                                        <th>EDIT</th>
                                        <th>REPLY</th>
                                        <th>HAPUS</th>
                                        <th>TANGGAL & JAM</th>
                                        <th>DOKTER</th>
                                        <th>POLI</th>
                                    </tr>
                                </tfoot>
                                <tbody style="color: black">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<div class="modal fade" id="newPeternakModal" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPeternakModallabel">Tambah Pengawasan Khusus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <div class="col-md-12">
                        <strong>
                            <label class="control-label mb-10 text-left">Lembar Jawaban Konsul <span class="help"></span></label>
                        </strong>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-md-6">
                        <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                        <input type="text" class="form-control" value="<?= $nama ?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <strong>
                            <label class="control-label mb-10 text-left">Kepada Yth. TS. Di - <span class="help"></span></label>
                        </strong>
                        <span id="tempat1_error" class="text-danger"></span>
                        <div class="has-success">
                            <input type="text" class="form-control" value="" id="tempat1">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <label class="control-label mb-10 text-left">Hasil Pemeriksaan<span class="help"></span></label>
                        <span id="hasil_periksa_error" class="text-danger"></span>
                        <div class="has-success">
                            <input type="text" class="form-control" id="hasil_periksa">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <label class="control-label mb-10 text-left">Teraphy<span class="help"></span></label>
                        <span id="terapi1_error" class="text-danger"></span>
                        <div class="has-success">
                            <input type="text" class="form-control" value="" id="terapi1">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <label class="control-label mb-10 text-left">Saran<span class="help"></span></label>
                        <span id="saran_error" class="text-danger"></span>
                        <div class="has-success">
                            <input type="text" class="form-control" value="" id="saran">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <strong>
                            <label class="control-label mb-10 text-left">Terima Kasih atas konsultasi ini. <span class="help"></span></label>
                        </strong>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                        <button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer mb-5 mr-5 mt-10">
                <button class="btn btn-success btn-anim  btn-sm" onclick="simpan()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-rocket"></i><span class="btn-text">SIMPAN</span>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $("#tindak_lanjut3").click(function() {
            if ($(this).is(":checked")) {
                $("#tindak_lanjut").show();
            } else {
                $("#tindak_lanjut").hide();
            }
        });

    });
    $(document).ready(function() {
        id = $('#inHis').val();
        id_pelayanan = $('#inPel').val();
        reload_data_id_pel(id_pelayanan);
        $.ajax({
            url: "<?php echo base_url() ?>Erm_dpjp/get_diagnosa",
            method: "POST",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('#diagnosis').val(data.kode + ' | ' + data.nama_diagnosa).attr('readonly', true);
                }
            }

        });
        $.ajax({
            url: "<?php echo base_url() ?>Erm_dpjp/get_ass_dok",
            method: "POST",
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                if (data.status_dt == 'found') {
                    $('#terapi').val(data.terapi).attr('readonly', true);
                    $('#riwayat_penyakit').val(data.alloanamnesa).attr('readonly', true);
                }
            }

        });
    });

    function reload_data_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
        $('#tabel_terapi').dataTable().fnClearTable();
        $('#tabel_terapi').dataTable().fnDestroy();
        $('#tabel_terapi').DataTable({
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
                "url": '<?php echo base_url('Erm_dpjp/tampil_list'); ?>',
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

    function simpan() {
        id_pelayanan = $('#inPel').val();
        id_history = $('#inHis').val();
        no_rm = $('#inNoRM').val();

        diagnosis = $('#diagnosis').val();
        terapi = $('#terapi').val();
        riwayat_penyakit = $('#riwayat_penyakit').val();
        // var tindak_lanjut = [];
        // $('input[name="tindak_lanjut"]').each(function() {
        //     if ($(this).is(":checked")) {
        //         tindak_lanjut.push($(this).val());
        //     }
        // });
        // tindak_lanjut = $('#tindak_lanjut3').is(":checked") ? tindak_lanjut.toString() + ', ' + $('#tindak_lanjut').val() : tindak_lanjut.toString();


        dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' + id_history +
            '&diagnosis=' + diagnosis + '&terapi=' + terapi+ '&riwayat_penyakit=' + riwayat_penyakit;

        $.ajax({
            url: "<?php echo base_url() ?>Erm_dpjp/insert_lembar_rujukan",
            method: "POST",
            dataType: 'json',
            data: dataString,
            success: function(data) {
                if (data.status == "success") {
                    window.location.href = "<?= $url ?>";
                } else if (data.error) {
                    if (data.tempat != '') {
                        $('#tempat_error').html(data.tempat);
                    } else {
                        $('#tempat_error').html('');
                    }
                    if (data.riwayat_penyakit != '') {
                        $('#riwayat_penyakit_error').html(data.riwayat_penyakit);
                    } else {
                        $('#riwayat_penyakit_error').html('');
                    }
                    if (data.diagnosis != '') {
                        $('#diagnosis_error').html(data.diagnosis);
                    } else {
                        $('#diagnosis_error').html('');
                    }
                    if (data.terapi != '') {
                        $('#terapi_error').html(data.terapi);
                    } else {
                        $('#terapi_error').html('');
                    }
                    if (data.tempat1 != '') {
                        $('#tempat1_error').html(data.tempat1);
                    } else {
                        $('#tempat1_error').html('');
                    }
                    if (data.hasil_periksa != '') {
                        $('#hasil_periksa_error').html(data.hasil_periksa);
                    } else {
                        $('#hasil_periksa_error').html('');
                    }
                    if (data.terapi1 != '') {
                        $('#terapi1_error').html(data.terapi1);
                    } else {
                        $('#terapi1_error').html('');
                    }
                    if (data.saran != '') {
                        $('#saran_error').html(data.saran);
                    } else {
                        $('#saran_error').html('');
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
</script>
<script type="text/javascript">
	/*Typeahead Init*/

	$(function() {
		"use strict";

		/*Basic*/

		var substringMatcher = function(strs) {
			return function findMatches(q, cb) {
				var matches, substringRegex;

				// an array that will be populated with substring matches
				matches = [];

				// regex used to determine if a string contains the substring `q`
				var substrRegex = new RegExp(q, 'i');

				// iterate through the pool of strings and for any string that
				// contains the substring `q`, add it to the `matches` array
				$.each(strs, function(i, str) {
					if (substrRegex.test(str)) {
						matches.push(str);
					}
				});

				cb(matches);
			};
		};

		var states = [
			<?php

			foreach ($diagnosa as $row) {


				echo ",'" . $row["id_diagnosa"] . " | " . $row["nama_diagnosa"] . "'";
			}  ?>
		];


		$('#the-basics .typeahead').typeahead({
			hint: true,
			highlight: true,
			minLength: 1
		}, {
			name: 'states',
			source: substringMatcher(states)
		});



	});
</script>