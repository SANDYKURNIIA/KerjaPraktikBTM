<?php
$data = $this->session->userdata('data_auth');
$izinAkses = $data->izin_akses;
?>
<?php $this->load->view('form_vclaim/Modal_cari_sep'); ?>

<div class="panel panel-success card-view">
    <div class="panel-heading">
        <div class="pull-left">
            <h1 class="panel-title txt-light">DATA BUAT RUJUKAN KHUSUS
            </h1>
        </div>
        <div class="clearfix"></div>
    </div>
    <h6 class="panel-title txt-dark"><?= $this->session->flashdata('alert'); ?></h6>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">NO RUJUKAN</label>
                        <div class="input-group col-md-9 has-success">
                            <input type="text" autocomplete="off" class="form-control" placeholder="NO RUJUKAN" name="inNoRujuk" id="inNoRujuk" value="">
                            <span class="help-block"></span>
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>


            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">DIAGNOSA PRIMER</label>
                        <div class="input-group col-md-9 has-success">
                            <input type="text" autocomplete="off" class="form-control" name="inNama" id="inDiagnosa1" value="" placeholder="Maksimal 3 karakter">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">DIAGNOSA SEKUNDER</label>
                        <div class="input-group col-md-9 has-success">
                            <input type="text" autocomplete="off" class="form-control" name="inNama" id="inDiagnosa2" value="" placeholder="Maksimal 3 karakter">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">PROSEDURE</label>
                        <div class="input-group col-md-9 has-success">
                            <input type="text" autocomplete="off" class="form-control" name="inNama" id="inProsedure" value="" placeholder="Maksimal 3 karakter">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>


            </div>

            <br>
            <div align="right">


                <span class="help-block"></span>
                <a class="btn btn-default btn-anim" href="javascript: history.go(-1)" style="margin-right: 5px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                <button class="btn btn-success btn-anim" onclick="insertSEP()" type="submit" style="margin-right: 40px;" id="simpanKunjungan"><i class="icon-print"></i><span class="btn-text">BUAT RUJUKAN</span>
            </div>
        </div>
    </div>
</div>
            <style>
                td {
                    color: black;
                }
            </style>
            <link rel="stylesheet" href="<?php echo base_url('assets/dist/jquery-ui.css'); ?>">
            <script src="<?php echo base_url('assets/dist/jquery-ui.min.js'); ?>"></script>
            <script type="text/javascript">
                $(document).ready(function() {

                    $('#inDiagnosa1').autocomplete({

                        source: function(query, response) {
                            $.ajax({
                                url: "<?php echo base_url(); ?>Vclaim_bpjs/getDiagnosa",
                                method: "POST",
                                data: {
                                    query: query,
                                },
                                minLength: 3,
                                dataType: "json",
                                cache: false,
                                success: function(data) {
                                    response($.map(data.slice(0, 5), function(item) {
                                        return item.nama;
                                    }));

                                }
                            });
                        },
                        //appendTo: "#vclaim_sep"
                    });

                    $('#inDiagnosa2').autocomplete({

                        source: function(query, response) {
                            $.ajax({
                                url: "<?php echo base_url(); ?>Vclaim_bpjs/getDiagnosa",
                                method: "POST",
                                data: {
                                    query: query,
                                },
                                minLength: 3,
                                dataType: "json",
                                cache: false,
                                success: function(data) {
                                    response($.map(data.slice(0, 5), function(item) {
                                        return item.nama;
                                    }));

                                }
                            });
                        },
                        //appendTo: "#vclaim_sep"
                    });

                    $('#inProsedure').autocomplete({

                        source: function(query, response) {
                            $.ajax({
                                url: "<?php echo base_url(); ?>Vclaim_bpjs/getProsedur",
                                method: "POST",
                                data: {
                                    query: query,
                                },
                                minLength: 3,
                                dataType: "json",
                                cache: false,
                                success: function(data) {
                                    response($.map(data.slice(0, 5), function(item) {
                                        return item.nama;
                                    }));

                                }
                            });
                        },
                        //appendTo: "#vclaim_sep"
                    });


                });



                function insertSEP() {
                    norujukan = $('#inNoRujuk').val();
                    a = $('#inDiagnosa1').val();
                    b = $('#inDiagnosa2').val();
                    c = $('#inProsedure').val();

                    splitA = a.split(' - ');
                    diagnosa1 = splitA[0];

                    splitB = b.split(' - ');
                    diagnosa2 = splitB[0];

                    splitC = c.split(' - ');
                    prosedur = splitC[0];


                    $.ajax({
                        url: "<?php echo base_url(); ?>Vclaim_bpjs/insert_rujukan_khusus",
                        method: "POST",
                        data: {
                            norujukan: norujukan,
                            diagnosa1: diagnosa1,
                            diagnosa2: diagnosa2,
                            prosedur: prosedur,
                            // id_pel: "</?= $id_pel ?>"
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 'success') {
                                swal({
                                    title: "good job!",
                                    type: "success",
                                    text: "Data Berhasil dinput. No Rujukan : " + response.data['rujukan']['norujukan'],
                                    confirmButtonColor: "#3cb878",
                                }, function() {
                                    location.reload();
                                });

                            } else {
                                swal({
                                    title: "Gagal!",
                                    type: "warning",
                                    text: response.data['message'],
                                    confirmButtonColor: "#3cb878",
                                });
                            }
                        }
                    });
                }
            </script>