<<<<<<< HEAD
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">PRMRJ</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">

                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $nama ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Tgl Lahir / Umur<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?php
                                                                                        setlocale(LC_ALL, 'id_ID');

                                                                                        date_default_timezone_set('Asia/Jakarta');
                                                                                        $time = strtotime($tgl_lahir);
                                                                                        $date = strftime(" %d %B %Y ", $time);
                                                                                        echo $date  . '(' . getAge($tgl_lahir) . ')' ?>">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                <input type="text" class="form-control" value="<?= $jenis_kelamin ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
=======
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">PRMRJ</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">

                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?= $nama ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Tgl Lahir / Umur<span class="help"></span></label>
                                <input type="text" disabled class="form-control" value="<?php
                                                                                        setlocale(LC_ALL, 'id_ID');

                                                                                        date_default_timezone_set('Asia/Jakarta');
                                                                                        $time = strtotime($tgl_lahir);
                                                                                        $date = strftime(" %d %B %Y ", $time);
                                                                                        echo $date  . '(' . getAge($tgl_lahir) . ')' ?>">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-3">
                                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
                                <input type="text" class="form-control" value="<?= $jenis_kelamin ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</div>