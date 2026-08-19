<?php $pasien = $this->db->get_where('pasien', ['no_bpjs' => $kartu])->row(); ?>
<div class="panel panel-success card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h3 style="color:white">SEP - <?= $pasien->nama ?> (<?= sprintf('%06d', $pasien->no_rm) ?>)</h3>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div id="jumSep" style="display: none;">
                <strong>
                    <h1 class="panel-title txt-dark">Jumlah SEP Rujukan RAJAL : <span id="jumlahSEP" class="font-weight-5000"></span></h1>
                </strong>
                <strong>
                    <h1 class="panel-title txt-dark">Jumlah SEP Rujukan RANAP : <span id="jumlahSEP1" class="font-weight-5000"></span></h1>
                </strong>
            </div>
            <span class="help-block"></span>
            <br>
            <div class="form-actions" style="margin-left: 30px;">
                <!-- <div class="row"> -->

                    <a class="btn btn-default btn-anim" href="javascript: history.go(-1)" style="margin-right: 5px; margin-bottom: 10px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                    <a style="background-color:#957DAD; margin-bottom: 10px;" class="btn btn-icon-anim" href="<?= base_url('SEP/form/') . $kartu . '/' . $id_pel . '/' . $history ; ?>"><span class="btn-text">RUJUKAN FKTP/FKTRL</span></a>
                    
                    <?php
                    $staff = $this->session->userdata('data_auth');
                    if ($staff->tipe == 'rekam medis' || $staff->tipe == 'polihemodialisa') { ?>
                        <a class="btn btn-primary btn-anim " style="margin-bottom: 10px;" href="<?= base_url('SEP/SEP_offline/' . $kartu . '/' . $id_pel . '/' . $history) ?>"><i class="fa fa-plus"></i><span class="btn-text">SEP OFFLINE</span></a>
                        <a style="background-color:#C7959F;margin-bottom: 10px;" class="btn btn-icon-anim" href="<?= base_url('Vclaim/Rujukan_khusus/' . $kartu . '/' . $id_pel . '/' . $history) ?>"><span class="btn-text">RUJUKAN KHUSUS</span></a>
                        <a class="btn btn-danger btn-anim" style="margin-bottom: 10px;" href="<?= base_url('SEP/Spri/') . $kartu . '/' . $history . '/' . $id_pel; ?>"><i class="icon-rocket"></i><span class="btn-text">SPRI</span></a>
                        <?php
                        $get_sep = $this->db->query("SELECT no_sep from pelayanan b, pasien p where b.id_pasien = p.no_rm and no_bpjs = '$kartu' and (no_sep !='' and LENGTH(no_sep) = 19) order by tgl_masuk desc limit 1");

                        $sep = $this->db->get_where('pelayanan', ['id_pelayanan' => $id_pel])->row()->no_sep;


                        if ($sep != "" || $sep != null) { ?>
                            <a class="btn btn-warning btn-anim" style="margin-bottom: 10px;" href="<?= base_url('SEP/Rencana_kontrol/') . $kartu . '/' . $sep . '/' . $history . '/' . $id_pel; ?>"><i class="icon-rocket"></i><span class="btn-text">RENCANA KONTROL</span></a>
                            <a class="btn btn-success btn-anim" style="margin-bottom: 10px;" href="<?= base_url('SEP/Rujukan/') . $kartu . '/' . $sep . '/' . $history . '/' . $id_pel; ?>"><i class="icon-rocket"></i><span class="btn-text">RUJUKAN KELUAR RS</span></a>
                            <a style="background-color:#957DAD;margin-bottom: 10px;" class="btn btn-icon-anim" href="<?= base_url('Vclaim/form_PRB/') . $kartu . '/' . $sep . '/' . $history . '/' . $id_pel; ?>"><span class="btn-text">PRB</span></a>

                            <a class="btn btn-info btn-anim" style="margin-bottom: 10px;" href="<?= base_url('SEP/cetak_sep/') . $sep; ?>"><i class="icon-printer"></i><span class="btn-text">CETAK SEP</span></a>
                        <?php } elseif (count($get_sep->result()) > 0) {
                            $sep_lama = $get_sep->row()->no_sep; ?>
                            <a class="btn btn-warning btn-anim" style="margin-bottom: 10px;" href="<?= base_url('SEP/Rencana_kontrol/') . $kartu . '/' . $sep_lama . '/' . $history . '/' . $id_pel; ?>"><i class="icon-rocket"></i><span class="btn-text">RENCANA KONTROL</span></a>
                            <a class="btn btn-success btn-anim" style="margin-bottom: 10px;" href="<?= base_url('SEP/Rujukan/') . $kartu . '/' . $sep_lama . '/' . $history . '/' . $id_pel; ?>"><i class="icon-rocket"></i><span class="btn-text">RUJUKAN</span></a>
                            <a style="background-color:#957DAD;margin-bottom: 10px;" class="btn btn-icon-anim" href="<?= base_url('Vclaim/form_PRB/') . $kartu . '/' . 'kosong' . '/' . $history . '/' . $id_pel; ?>"><span class="btn-text">PRB</span></a>
                            <a class="btn btn-info btn-anim" style="margin-bottom: 10px;" href="" onclick="alert('Tidak ada Nomor SEP di SIM BOS'); return false;"><i class="icon-printer"></i><span class="btn-text">CETAK SEP</span></a>


                        <?php } else { ?>

                            <a class="btn btn-warning btn-anim" style="margin-bottom: 10px;" href="<?= base_url('SEP/Rencana_kontrol/') . $kartu . '/' . 'kosong' . '/' . $history . '/' . $id_pel; ?>"><i class="icon-rocket"></i><span class="btn-text">RENCANA KONTROL</span></a>
                            <a class="btn btn-success btn-anim" style="margin-bottom: 10px;" href="<?= base_url('SEP/Rujukan/') . $kartu . '/' . 'kosong' . '/' . $history . '/' . $id_pel; ?>"><i class="icon-rocket"></i><span class="btn-text">RUJUKAN</span></a>
                            <a style="background-color:#957DAD; margin-bottom: 10px;" class="btn btn-icon-anim" href="<?= base_url('Vclaim/form_PRB/') . $kartu . '/' . 'kosong' . '/' . $history . '/' . $id_pel; ?>"><span class="btn-text">PRB</span></a>
                            <a class="btn btn-info btn-anim" style="margin-bottom: 10px;" href="" onclick="alert('Tidak ada Nomor SEP di SIM BOS'); return false;"><i class="icon-printer"></i><span class="btn-text">CETAK SEP</span></a>

                        <?php } ?>
                    <?php } ?>

                    <a class="btn btn-primary btn-anim" style="margin-bottom: 10px;" href="<?= base_url('SEP/Get_SEP/') . $kartu . '/' . $id_pel . '/' . $history; ?>"><i class="icon-rocket"></i><span class="btn-text">HISTORY SEP</span></a>

                <!-- </div> -->
                <?php
                if ($staff->tipe == 'rekam medis') { ?>
                   
                        <a class="btn btn-primary btn-anim"  style="margin-bottom: 10px;" href="<?= base_url('SEP/Pengajuan_backdate/') . $kartu . '/' . $history . '/' . $id_pel; ?>"><i class="icon-rocket"></i><span class="btn-text">PENGAJUAN APPROVAL</span></a>
                        <a class="btn btn-danger btn-anim"  style="margin-bottom: 10px;" onclick="check_out('<?= $sep ?>')"><i class="icon-logout"></i><span class="btn-text">CHECKOUT</span></a>

                <?php } ?>
            </div>
        </div>
    </div>

</div>
<?php $this->load->view('form_vclaim/Modal_checkout'); ?>

<div class="modal fade" id="modal_sep" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title mt-10" id="myLargeModalLabel"><i class="icon-user mr-10"></i>CARI SEP</h5>
            </div>
            <div class="modal-body">
                <div class="form-body">

                    <br>
                    <br>
                    <br>
                    <div class="clearfix"></div>
                    <!-- <div class="form-group" id="tabel_sep"> -->
                    <div class="table-wrap">
                        <div class="table-responsive ">
                            <table id="tabel_sep" class="table table-hover display">
                                <thead>
                                    <tr class="bg-success">
                                        <th>CETAK</th>
                                        <th>NO SEP</th>
                                        <th>DIAGNOSA</th>
                                        <th>POLI</th>
                                        <th>TANGGAL</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-success">
                                        <th>CETAK</th>
                                        <th>NO SEP</th>
                                        <th>DIAGNOSA</th>
                                        <th>POLI</th>
                                        <th>TANGGAL</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- </div> -->

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

    });

    function show_sep() {
        reload_sep();
        $('#modal_sep').modal('toggle');
    }

    function reload_sep() {
        // var table;
        $('#tabel_sep').dataTable().fnClearTable();
        $('#tabel_sep').dataTable().fnDestroy();
        var table = $('#tabel_sep').DataTable({
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
                    "sLast": "Terakhir"
                },

            },
            "ajax": {
                "url": '<?php echo base_url('SEP/list_sep'); ?>',
                "type": 'POST',
                "data": function(data) {
                    data.kartu = "<?= $kartu ?>";

                }
            },
            "deferRender": true,
            "processing": true,
            "order": [],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });
        $('#cari_sep').click(function() { //button filter event click
            table.ajax.reload(); //just reload table
        });
        $('#btn_reset').click(function() { //button reset event click
            $('#form-sep')[0].reset();
            table.ajax.reload(); //just reload table
        });
    }
</script>