<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">

            <div class="panel-heading">
                <div class="pull-left">
                    <strong>
                        <h6 class="panel-title txt-dark">RINGKASAN PASIEN PULANG (DISCHARGE SUMMARY)</h6>
                    </strong>



                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in" id="myDiv">
                    <div class="panel-body">
                        <div class="form-wrap">

                            <div class="form-group">
                                <!-- <form id="formUpload"> -->
                                <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
                                <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
                                <input type="hidden" class="form-control" value="" id="id" name="id">
                                <input type="text" class="form-control" style="display: none;" name="id_pelayanan" value="<?= $id_pelayanan ?>" id="id_pelayanan">

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Ruang :<span class="help"></span></label>
                                    <div class="has-success">
                                        <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                        <input type="text" class="form-control" id="nama_ruangan" value="<?= $nama_ruangan ?>" disabled>
                                        <!-- <span class="help-block"></span> -->
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Nama Pasien :<span class="help"></span></label>
                                    <div class="has-success">
                                        <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                        <input type="text" class="form-control" id="inNama" value="<?= $nama ?>" disabled>
                                        <!-- <span class="help-block"></span> -->
                                    </div>
                                </div>
                                <!-- <input type="hidden" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>"> -->

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Kelas :<span class="help"></span></label>
                                    <span id="alamat_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="kelas" value="<?= $kelas ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Dokter :</label>
                                    <span id="dpjp1_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="text" class="form-control" id="dpjp1" value="<?= $dokter ?>" disabled>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Tgl. Lahir : <span class="help"></span></label>
                                    <span id="tanggal_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <?php

                                        $tanggal_indonesia = date("d/m/Y", strtotime($tgl_lahir));

                                        echo '<input type="text" disabled class="form-control" value="' . $tanggal_indonesia . '">';
                                        ?>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Alamat :<span class="help"></span></label>
                                    <div class="has-success">
                                        <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                        <input type="text" class="form-control" id="alamat" value="<?= $alamat ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>

                            <!-- <form id="formUpload"> -->
                            <input type="hidden" class="form-control" value="<?= $id_pelayanan ?>" name="inPel" id="inPel">
                            <input type="hidden" class="form-control" value="<?= $id_history ?>" name="inHis" id="inHis">
                            <input type="hidden" class="form-control" value="" id="id" name="id">
                            <!-- <input type="hidden" class="form-control" name="inNoRM" id="inNoRM" value="<?= $no_rm ?>"> -->
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">No. RM :<span class="help"></span></label>
                                    <div class="has-success">
                                        <!-- <input type="text" class="form-control" id="in" disabled> -->
                                        <input type="text" class="form-control" id="inNoRM" value="<?= $no_rm ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Jenis Kelamin :</label>
                                    <!-- <input type="text" disabled class="form-control" id="inJk"> -->
                                    <div class="has-success">
                                        <input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk">
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                    <div class="col-md-4">      
                                        <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                        <div class="has-success">
                                             <select class="form-control filled-input select2" id="inJO" name="inJO">
                                                <option value="">Jenis Kelamin</option>
                                                <option value="Lakilaki">LK</option>
                                                <option value="Perempuan">PR</option>    
                                              </select>
                                        </div>
                                    </div>
                                  </div> -->
                            <!-- <div class="col-md-7">
                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                        </div> -->


                            <div class="col-md-4">
                                <div class="form-group">

                                    <label class="control-label mb-10 text-left">Tgl. Masuk :<span class="help"></span></label>
                                    <!-- <input type="text" id="inTglMasuk" disabled class="form-control"> -->
                                    <div class="has-success">
                                        <input type="text" id="inTglMasuk" disabled class="form-control" value="<?php
                                                                                                                setlocale(LC_ALL, 'id_ID');

                                                                                                                date_default_timezone_set('Asia/Jakarta');
                                                                                                                $time = strtotime($tgl_masuk);
                                                                                                                $date = strftime(" %d %B %Y ", $time);
                                                                                                                $jam = date(" H:i:s ", $time);
                                                                                                                echo $jam . '/' . $date ?>">
                                    </div>

                                </div>
                            </div>


                            <!-- Kolom pertama -->
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Tgl. Keluar : <span
                                            class="help"></span></label>
                                    <span id="tanggal_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div> -->

                            <div class="form-group ">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Agama :</label>
                                    <!-- <input type="text" disabled class="form-control" id="inJk"> -->
                                    <div class="has-success">
                                        <input type="text" disabled class="form-control" value="<?= $agama ?>" id="agama">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Status Perkawinan :<span class="help"></span></label>
                                    <div class="has-success">
                                        <!-- <input type="text" class="form-control" id="inNama" disabled> -->
                                        <input type="text" disabled class="form-control" value="<?= $status ?>" id="status">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="control-label mb-10 text-left">Alasan / Indikasi Masuk RS :<span class="help"></span></label>
                                    <span id="keluhan_error" class="text-danger"></span>
                                    <div class="has-success">
                                        <textarea class="form-control" name="keluhan_utama" id="keluhan_utama" cols="30" rows="3"></textarea>
                                        <span class="help-block text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default card-view">

                                        <div class="pull-left">

                                            <strong>
                                                <h6 class="panel-title txt-dark">RINGKASAN RIWAYAT PENYAKIT DAN PENEMUAN
                                                    FISIK PENTING</h6>
                                            </strong>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Riwayat :<span class="help"></span></label>
                                                <div class="has-success">
                                                    <textarea class="form-control" cols="3" rows="2" id="riwayat" name="riwayat"></textarea>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label mb-10 text-left">Pemeriksaan Fisik :<span class="help"></span></label>
                                                <div class="has-success" id="p_fisik">
                                                    <!-- <textarea class="form-control" disabled cols="3" rows="2" id="p_fisik" name="p_fisik"></textarea> -->
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                                <br>
                                                <div class="has-success" id="p_fisik_2">
                                                    <!-- <textarea class="form-control" disabled cols="3" rows="2" id="p_fisik" name="p_fisik"></textarea> -->
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Hasil Pemeriksaan Penunjang:</label>
                                                <div class="has-success">
                                                    <textarea class="form-control" style="font-weight: bold;" disabled cols="3" rows="2" id="hasil" name="hasil">Terlampir</textarea>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Diagnosa Saat Masuk:</label>
                                                <div class="has-success">
                                                    <textarea class="form-control" disabled readonly name="diagnosa" id="diagnosa" cols="3" rows="2"></textarea>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Prosedur Terapi & Tindakan Yang Telah Dikerjakan:</label>
                                                <div class="has-success">
                                                    <textarea class="form-control" cols="3" rows="2" id="prosedur_terapi" name="prosedur_terapi"></textarea>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Edukasi Yang Sudah Diberikan:</label>
                                                <div class="has-success">
                                                    <textarea class="form-control" cols="3" rows="2" id="edukasi" name="edukasi"></textarea>
                                                    <span class="help-block text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">

                                            <div class="col-md-6">
                                                <label class="control-label mb-10 text-left">Keadaan Pasien Saat Pulang:</label>
                                                <span id="ruang_rawat_error" class="text-danger"></span>
                                                <div class="has-success">
                                                    <select class="select2 form-control" id="keadaan" name="keadaan">
                                                        <option value="Diizinkan Dokter">Diizinkan Dokter</option>
                                                        <option value="Pulang Paksa">Pulang Paksa</option>
                                                        <option value="Meninggal < 48 jam">Meninggal < 48 jam</option>
                                                        <option value="Meninggal > 48 jam">Meninggal > 48 jam</option>
                                                        <option value="Dirujuk">Dirujuk</option>
                                                        <option value="Atas Permintaan Sendiri(APS)">Atas Permintaan Sendiri (APS)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-md-8">

                                            <div class="row ">
                                                <div class="col-md-4">

                                                    <strong>
                                                        <label class="control-label mb-10 text-left">
                                                            <b>Diagnosa (ICD-10): </b><span class="help"></span>
                                                        </label>
                                                    </strong>
                                                </div>
                                                <div class="col-md-8">

                                                    <div class="input-group has-success">
                                                        <input type="text" class="form-control" id="diagnosa_search" placeholder="Cari Diagnosa">
                                                        <div class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-top:20px;">
                                                <u>
                                                    <h6 class="panel-title txt-dark">LIST DIAGNOSA:</h6>
                                                </u>
                                                <br>
                                                <div id="diagnosa_ranap" style="margin-top:15px;">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>


                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="panel panel-default card-view">

                                                <div class="pull-left">

                                                    <strong>
                                                        <h6 class="panel-title txt-dark">TERAPI</h6>
                                                    </strong>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default card-view">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="table-wrap">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover display pb-60" id="tabel_terapi">
                                                                    <thead>
                                                                        <tr class="bg-success">
                                                                            <th>NAMA OBAT</th>
                                                                            <th>DOSIS</th>
                                                                            <th>FREKUENSI</th>
                                                                            <th>CARA PEMBERIAN</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                        <tr class="bg-success">
                                                                            <th>NAMA OBAT</th>
                                                                            <th>DOSIS</th>
                                                                            <th>FREKUENSI</th>
                                                                            <th>CARA PEMBERIAN</th>
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


                                    <div class="form-group text-center" style="margin-top: 30px;">
                                        <div class="col-md-12">
                                            <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <a class="btn btn-default btn-sm" onclick="javascript:history.go(-1)"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                                            <a type="button" class="btn btn-success btn-sm" id="simpan" onclick="simpan()">SIMPAN</a>
                                            <a type="button" target="_blank" class="btn btn-primary btn-sm" id="cetak" href="<?= base_url('Erm_resume_pulang/print_out/' . $id_pelayanan . '/' . $id_history . '') ?>">Cetak</a>

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
    <div id="loading" style="display:none;">
        <div class="spinner"></div>
        <p>Sedang memuat...</p>
    </div>
    <style>
        #t_fisik td {
            padding-right: 15px;
        }

        #loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Latar belakang semi-transparan */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            /* Pastikan di atas konten lain */
            flex-direction: column;
        }

        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.3);
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
            margin-bottom: 10px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <script type="text/javascript">
        let diagnose_arry = []; // Deklarasikan di scope global
        $(document).ready(function() {
            id_pelayanan = $('#inPel').val();
            id_history = $('#inHis').val();
            reload_data_terapi_id_pel(id_pelayanan);
        });
    </script>

    <script type="text/javascript">
        function reload_data_terapi_id_pel(id_pelayanan) { //utk reload data diagnosa pasien jika berhasil
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
                    "url": '<?php echo base_url('erm_igd/tampil_list_terapi'); ?>',
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
    </script>
    <script>
        $(document).ready(function() {
            id_pelayanan = $('#inPel').val();
            id_history = $('#inHis').val();
            $('#loading').show();
            $.ajax({
                url: "<?php echo base_url() ?>Erm_resume_pulang/get_data_resume",
                method: "POST",
                dataType: 'json',
                data: {
                    id: id_pelayanan,
                    id_history: id_history
                },
                success: function(data) {

                    $('#keluhan_utama').val(data.alasan);
                    $('#riwayat').val(data.resume['riwayat_sekarang']);
                    $('#diagnosa').val(data.diagnosa);
                    $('#prosedur_terapi').val(data.resume['terapi']);
                    $('#edukasi').val(data.resume['konsul']);
                    $('#keadaan').val(data.resume['keadaan_pulang']).change();
                    var html = "<table id='t_fisik'>" +
                        "<tr><td>a. Tanda Vital: </td></tr>" +
                        "<tr>" +
                        "<td>GCS : " + data.resume['gcs'] + " </td>" +
                        "<td>E : " + data.resume['e'] + " </td>" +
                        "<td>M : " + data.resume['m'] + " </td>" +
                        "<td>V : " + data.resume['v'] + " </td>" +
                        "</tr>" +
                        "<tr>" +
                        "<td>Tekanan darah : " + data.resume['tekanan_darah'] + " MmHg</td>" +
                        "<td>Suhu : " + data.resume['suhu'] + " &deg;C</td>" +
                        "<td>Nadi : " + data.resume['frequensi_nadi'] + " x/menit</td>" +
                        "<td>Pernafasan : " + data.resume['frequensi_nafas'] + " x/menit</td>" +
                        "</tr>" +
                        "<tr>" +
                        "<td>SPO2 : " + data.resume['spo2'] + " </td>" +
                        "<td>Berat Badan : " + data.resume['berat_badan'] + " kg</td>" +
                        "<td>Tinggi Badan : " + data.resume['tinggi_badan'] + " cm</td>" +
                        "<td></td>" +
                        "</tr>" +
                        "</table>";
                    $('#p_fisik').html(html).attr("style", "color:black");
                    const tabelHTML = generatePemeriksaanFisikTable(data.resume);
                    $('#p_fisik_2').html(tabelHTML).attr("style", "color:black");


                    let htmlDiagnosa = generateDiagnosa(data.diagnosa_ranap);
                    $('#diagnosa_ranap').html(htmlDiagnosa).attr("style", "color:black");
                    diagnose_arry = data.diagnosa_ranap;
                    console.log("Data diagnose_arry dari AJAX pertama:", diagnose_arry);

                    reload_data_terapi_id_pel(id_pelayanan);
                    $('#loading').hide();

                }

            });
        });

        function generatePemeriksaanFisikTable(data) {
            let html = `
                <table>
                <tr>
                    <td>b. Pemeriksaan Fisik:</td>
            `;

            const allNormal = (
                data.kepala === "Dalam Batas Normal" &&
                data.hidung === "Dalam Batas Normal" &&
                data.mulut === "Dalam Batas Normal" &&
                data.leher === "Dalam Batas Normal" &&
                data.thorax === "Dalam Batas Normal" &&
                data.jantung === "Dalam Batas Normal" &&
                data.paru === "Dalam Batas Normal" &&
                data.andomen === "Dalam Batas Normal" &&
                data.punggung === "Dalam Batas Normal" &&
                data.ekstremitas === "Dalam Batas Normal"
            );

            if (allNormal) {
                html += `
          <td>Dalam Batas Normal</td>
        </tr>
    `;
            } else {
                html += `
        <td></td>
      </tr>
    `;

                if (data.kepala !== "Dalam Batas Normal") {
                    html += `
        <tr>
          <td>Kepala :</td>
          <td>${data.kepala}</td>
        </tr>
      `;
                }
                if (data.hidung !== "Dalam Batas Normal") {
                    html += `
        <tr>
          <td>Hidung :</td>
          <td>${data.hidung}</td>
        </tr>
      `;
                }
                if (data.mulut !== "Dalam Batas Normal") {
                    html += `
        <tr>
          <td>Mulut :</td>
          <td>${data.mulut}</td>
        </tr>
      `;
                }
                if (data.leher !== "Dalam Batas Normal") {
                    html += `
        <tr>
          <td>Leher :</td>
          <td>${data.leher}</td>
        </tr>
      `;
                }
                if (data.thorax !== "Dalam Batas Normal") {
                    html += `
        <tr>
          <td>Thorax :</td>
          <td>${data.thorax}</td>
        </tr>
      `;
                }
                if (data.jantung !== "Dalam Batas Normal") {
                    html += `
        <tr>
          <td>Jantung :</td>
          <td>${data.jantung}</td>
        </tr>
      `;
                }
                if (data.paru !== "Dalam Batas Normal") {
                    html += `
        <tr>
          <td>Paru :</td>
          <td>${data.paru}</td>
        </tr>
      `;
                }
                if (data.andomen !== "Dalam Batas Normal") {
                    html += `
        <tr>
          <td>Andomen :</td>
          <td>${data.andomen}</td>
        </tr>
      `;
                }
                if (data.punggung !== "Dalam Batas Normal") {
                    html += `
        <tr>
          <td>Punggung :</td>
          <td>${data.punggung}</td>
        </tr>
      `;
                }
                if (data.ekstremitas !== "Dalam Batas Normal") {
                    html += `
        <tr>
          <td>Ekstremitas :</td>
          <td>${data.ekstremitas}</td>
        </tr>
      `;
                }
            }

            html += `
    </table>
  `;
            return html;
        }

        function generateDiagnosa(data) {
            let html = '';
            data.forEach((item, index) => {
                const parts = item.diagnosa.split(" - ");
                const code = parts[0];
                // const description = parts.slice(1).join(" - ");
                const id = `diag_no_${index}_${code.replace('.', '')}`;
                const id_diag = `${code.replace('.', '')}_${index}`;

                html += `
      <div class="diagitem" id="${id}">
        <span onclick="klikspan(${index})">${item.diagnosa}</span>&nbsp;<span style="color:#888;">${item.ket}</span>

      </div>
        <div class="row form_${index} collapse" style="margin-top:5px;">
            <div class="col-md-6" id="editDiag_${index}">
                <div class="input-group has-success col-md-12">
                        <input type="text" class="form-control" id="cari_diagnosa_edit_${index}" placeholder="Substitusi">
                        <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
                </div> 
            </div>
            <div class="has-danger col-md-1">
                <button class="btn btn-danger" onclick="hapus_data_diagnosa(${index})"><i class="glyphicon glyphicon-trash "></i></button>
            </div>
        </div>
        <hr>
    `;
            });
            return html;
        }

        function klikspan(id) {
            $(`.form_${id}`).collapse('toggle');
        }
    </script>
    <style>
        .diagitem {
            font-size: 17px;
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
    <script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/jquery-ui.js'); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#diagnosa_search').autocomplete({
                source: function(query, response) {

                    $.ajax({
                        url: "<?php echo base_url(); ?>Erm_resume_pulang/getDiagnosa",
                        type: "POST",
                        dataType: "json",
                        data: {
                            query: query,
                        },

                        success: function(data) {
                            response(data);

                        },

                    });
                },
                focus: function(event, ui) {
                    $('#diagnosa_search').val(ui.item.value);
                    return false;
                },
                select: function(event, ui) {

                    $('#diagnosa_search').val(ui.item.value); // Set the value in the input field

                    // Lakukan AJAX request untuk menyimpan ke database
                    var diagnosaObj = {
                        diagnosa: ui.item.value, // Contoh properti ID jika ada
                        ket: "Sekunder",
                    };

                    diagnose_arry.push(diagnosaObj);
                    console.log("Nilai diagnose_arry saat select:", diagnose_arry);
                    getDataDiagnosa();
                    $('#diagnosa_search').val('');
                    $.toast({
                        heading: 'Success!',
                        text: 'Diagnosa telah ditambah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });

                },
            });


        });

        $(document).on('focus', '[id^="cari_diagnosa_edit_"]', function() {
            var currentInput = $(this);
            var index = currentInput.attr('id').split('_')[3];
            currentInput.autocomplete({
                source: function(query, response) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>Erm_resume_pulang/getDiagnosa",
                        type: "POST",
                        dataType: "json",
                        data: {
                            query: query,
                        },
                        success: function(data) {
                            response(data);
                        },
                    });
                },
                focus: function(event, ui) {
                    currentInput.val(ui.item.value);
                    return false;
                },
                select: function(event, ui) {
                    currentInput.val(ui.item.value);
                    var diagnosaObj = {
                        diagnosa: ui.item.value, // Contoh properti ID jika ada
                        ket: "Sekunder",
                    };
                    diagnose_arry[index].diagnosa = ui.item.value;
                    console.log("Array setelah update:", diagnose_arry);
                    getDataDiagnosa(); // Contoh: refresh tampilan tabel diagnosa
                    $.toast({
                        heading: 'Success!',
                        text: 'Diagnosa berhasil diubah',
                        showHideTransition: 'fade',
                        icon: 'success'
                    });
                },
            });
            // Unbind agar autocomplete tidak diinisialisasi ulang setiap kali fokus
            currentInput.off('focus', this);
        });

        function getDataDiagnosa() {
            htmlDiagnosa = generateDiagnosa(diagnose_arry);
            $('#diagnosa_ranap').html(htmlDiagnosa).attr("style", "color:black");

        }


        function hapus_data_diagnosa(indexYangDihapus) {
            // Buat salinan array agar tidak memodifikasi array asli secara langsung (opsional tapi disarankan)
            // const arrayBaru = [...diagnose_arry];
            if (indexYangDihapus >= 0 && indexYangDihapus < diagnose_arry.length) {
                diagnose_arry.splice(indexYangDihapus, 1);
                // diagnose_arry = arrayBaru;
                $.toast({
                    heading: 'Success!',
                    text: 'Diagnosa telah dihapus',
                    showHideTransition: 'fade',
                    icon: 'success'
                });
            } else {
                console.warn("Indeks di luar batas array.");
                // diagnose_arry = arrayBaru;
            }
            console.log("Data setelah dihapus indeks ke-" + indexYangDihapus + ":", diagnose_arry);
            getDataDiagnosa();
        }
    </script>
    <script>
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
                url: "<?php echo base_url() ?>Erm_resume_pulang/simpan",
                method: "POST",
                dataType: 'json',
                data: {
                    id_pelayanan: $('#inPel').val(),
                    id_history: $('#inHis').val(),
                    no_rm: $('#inNoRM').val(),
                    alasan: $('#keluhan_utama').val(),
                    riwayat: $('#riwayat').val(),
                    diagnosa: diagnose_arry,
                    prosedur_terapi: $('#prosedur_terapi').val(),
                    keadaan_pulang: $('#keadaan').val(),
                    edukasi: $('#edukasi').val(),
                },
                error: function(data, error) {
                    console.error(error);
                    console.log(data.error)
                },
                success: function(data) {
                    console.log(data)
                    if (data.status == "success") {
                        window.location.href = "<?php echo base_url('Erm_resume_pulang/form_resume_pulang/') ?>" + '<?= $id_pelayanan ?>' + '/' + '<?= $id_history ?>';
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