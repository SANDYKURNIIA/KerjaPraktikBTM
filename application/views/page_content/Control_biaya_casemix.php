<!-- Row -->

<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h6 class="panel-title txt-dark"><span class="label label-success font-weight-100">CONTROL BIAYA PASIEN RAWAT INAP</span></h6>
        </div>
        <div class="clearfix"></div>

        <div class="row mt-30">

        </div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="datable" class="table table-hover display pb-30" width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>UBAH</th>
                                <th>TINDAKAN</th>
                                <th>NO RM</th>
                                <th>SEP</th>
                                <th>NO BPJS</th>
                                <th>NAMA PASIEN</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>JENIS KELAMIN</th>
                                <th>DOKTER</th>
                                <th>CARA MASUK</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>CARA BAYAR</th>
                                <th>DIAGNOSA</th>
                                <th>INACBG</th>
                                <th>TOTAL</th>
                                <th>TARIF INACBG</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>UBAH</th>
                                <th>TINDAKAN</th>
                                <th>NO RM</th>
                                <th>SEP</th>
                                <th>NO BPJS</th>
                                <th>NAMA PASIEN</th>
                                <th>TANGGAL PELAYANAN</th>
                                <th>JAM PELAYANAN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>JENIS KELAMIN</th>
                                <th>DOKTER</th>
                                <th>CARA MASUK</th>
                                <th>POLIKLINIK / RUANG</th>
                                <th>CARA BAYAR</th>
                                <th>DIAGNOSA</th>
                                <th>INACBG</th>
                                <th>TOTAL</th>
                                <th>TARIF INACBG</th>
                            </tr>
                        </tfoot>
                    </table>
                    <span id="hasil"></span>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('page_content/Modal_control_biayacasemix'); ?>


    <style>
        td {
            color: black;
        }
    </style>



    <script type="text/javascript">
        function convertToRupiah(angka) {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for (var i = 0; i < angkarev.length; i++)
                if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
            return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
        }

        function tampilEdit(id_pelayanan, id_history) {
            $.ajax({
                url: "<?= base_url() . 'Casemix/getDataPasien' ?>",
                data: {
                    id_pelayanan: id_pelayanan,
                    id_history: id_history
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data.status_dt == "found") {
                        //disini set datanya ke modal
                        $("#tipe_masuk").val(data.pasien['jenis_pelayanan']);
                        $("#inTanggalKunjugan").val(data.pasien['tgl_masuk']);
                        $("#idPelayanan").val(id_pelayanan);
                        $("#idHis").val(id_history);
                        $("#inNoSEP").val(data.pasien['no_sep']);
                        $("#inDiagnosa1").val(data.pasien['diagnosa']);
                        $("#inDPJP1").val(data.pasien['dpjp']).change();
                        $("#NamaPasien").val(data.pasien['pasien']);
                        $("#inAsalPasien").val(data.pasien['asal_pasien']).change();
                        $("#inCaraBayar1").val(data.pasien['cara_bayar']).change();
                        $("#inNaPol").val(data.pasien['id_kamar']).change();
                        $("#modal_edit_data").modal('show');
                    } else {
                        alert("data tidak ditemukan");
                    }
                }
            });
        }

        function tampilTindakan(id_pelayanan, id_history) {
            $.ajax({
                url: "<?= base_url() . 'Casemix/getDataPasien' ?>",
                data: {
                    id_pelayanan: id_pelayanan,
                    id_history: id_history
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data.status_dt == "found") {
                        $("#inJenisPel").val(data.pasien['jenis_pelayanan']);
                        $("#inKelas").val('KELAS ' + data.pasien['kelas_ruangan']);
                        $("#inNoBpjs").val(data.pasien['no_bpjs']);
                        $("#inDPJP").val(data.pasien['nama']);
                        $("#inTglMasuk").val(data.pasien['tgl_masuk']);
                        // $("#inTglKeluar").val(data.pasien['tgl_keluar']);
                        $("#inTglLahir").val(data.pasien['tgl_lahir']);
                        $("#inNoRm").val(data.pasien['no_rm']);
                        $("#inNama").val(data.pasien['pasien']);
                        $("#inSEP").val(data.pasien['no_sep']);
                        $("#inCaraBayar").val(data.pasien['caraBayar']);
                        $("#inGender").val(data.pasien['jenis_kelamin']);

                        if (data.pasien['kelas'] == 'KELAS I') {
                            $("#inHakKelas").val('1').change();
                        } else if (data.pasien['kelas'] == 'KELAS II') {
                            $("#inHakKelas").val('2').change();
                        } else if (data.pasien['kelas'] == 'KELAS III') {
                            $("#inHakKelas").val('3').change();
                        }


                        $("#inNonBedah").val(convertToRupiah((data.non_bedah['hasil'] == null) ? 0 : data.non_bedah['hasil']));
                        $("#inBedah").val(convertToRupiah((data.bedah['hasil'] == null) ? 0 : data.bedah['hasil']));
                        $("#inKonsul").val(convertToRupiah((data.konsul['hasil'] == null) ? 0 : data.konsul['hasil']));
                        $("#inTeAhli").val(convertToRupiah((data.tenaga_ahli['hasil'] == null) ? 0 : data.tenaga_ahli['hasil']));
                        $("#inKeperawatan").val(convertToRupiah((data.keperawatan['hasil'] == null) ? 0 : data.keperawatan['hasil']));
                        $("#inPenunjang").val(convertToRupiah((data.penunjang['hasil'] == null) ? 0 : data.penunjang['hasil']));
                        $("#inRadio").val(convertToRupiah((data.radio['hasil'] == null) ? 0 : data.radio['hasil']));
                        $("#inLabor").val(convertToRupiah((data.labor['hasil'] == null) ? 0 : data.labor['hasil']));
                        $("#inPelDarah").val(convertToRupiah((data.pel_darah['hasil'] == null) ? 0 : data.pel_darah['hasil']));
                        $("#inRehab").val(convertToRupiah((data.rehab['hasil'] == null) ? 0 : data.rehab['hasil']));
                        $("#inKamar").val(convertToRupiah((data.kamar['hasil'] == null) ? 0 : data.kamar['hasil']));
                        $("#inRawatIntens").val(convertToRupiah(0));
                        $("#inObat").val(convertToRupiah((data.obat['hasil'] == null) ? 0 : data.obat['hasil']));
                        $("#inObatKronis").val(convertToRupiah(0));
                        $("#inKemo").val(convertToRupiah(0));
                        $("#inAlkes").val(convertToRupiah(0));
                        $("#inBMHP").val(convertToRupiah((data.bmhp['hasil'] == null) ? 0 : data.bmhp['hasil']));
                        $("#inSewaAlat").val(convertToRupiah((data.sewa_alat['hasil'] == null) ? 0 : data.sewa_alat['hasil']));

                        var total = Number(data.non_bedah['hasil']) + Number(data.konsul['hasil']) + Number(data.kamar['hasil']) + Number(data.penunjang['hasil']) + Number(data.tenaga_ahli['hasil']) + Number(data.radio['hasil']) + Number(data.labor['hasil']) + Number(data.keperawatan['hasil']) + Number(data.bedah['hasil']) + Number(data.sewa_alat['hasil']) + Number(data.rehab['hasil']) + Number(data.bmhp['hasil']) + Number(data.pel_darah['hasil']) + Number(data.obat['hasil']);
                        $("#InTotTarif").val(convertToRupiah(total));

                        $("#inTotInacbg").val(convertToRupiah(total));
                        $("#inInacbg").val(data.inacbg);
                        $("#inTarif").val(convertToRupiah(data.tarif_inacbg));

                        $("#idHistory").val(id_history);
                        $("#idPel").val(id_pelayanan);

                        reload_diagnosa(id_pelayanan, id_history);
                        reload_prosedur(id_pelayanan, id_history);
                        $("#modal_edit_kasir").modal('show');
                    } else {
                        alert("data tidak ditemukan");
                    }
                }
            });

        }
        $(document).ready(function() {
            $('#datable').DataTable({
                "dom": 'Bfrtip',
                "buttons": ['csv', 'excel', 'pdf'],
                "language": {
                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing": "Sedang memproses...",
                    "sLengthMenu": "Tampilkan _MENU_ entri",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "sInfoPostFix": "",
                    "sSearch": "Pencarian :",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext": "Selanjutnya",
                        "sLast": "Terakhir"
                    },
                },
                "ajax": '<?php echo base_url('Casemix/tampil_control_biaya'); ?>',
                "deferRender": true,
                "processing": true,
                "order": [],
                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                }, ],
            });
        });
    </script>