<<<<<<< HEAD
<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Surveilans Infeksi Daerah Operasi (IDO) Pasien OPS/Operasi</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-wrap">
						<!-- Identitas Pasien -->
							<div class="form-group">
								<div class="col-md-3">
									<label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
									<input type="text" disabled class="form-control" name="inNoRm" value="<?= $no_rm ?>" id="inNoRM"></input>
								</div>
								<input type="hidden" name="id" value="id" id="id">
								<input type="hidden" class="form-control" name="inPel" value="<?= $id_pelayanan ?>" id="inPel">
            					<input type="hidden" class="form-control" name="inHis" value="<?= $id_history ?>" id="inHis">
							</div>
							<div class="form-group">
				              <div class="col-md-3">
				                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
				                <input type="text" disabled class="form-control" value="<?= $nama ?>">
				              </div>
            				</div>

				            <div class="form-group">
				              <div class="col-md-3">
				                <label class="control-label mb-10 text-left">Tanggal Lahir / Umur<span class="help"></span></label>
				                <input type="text" disabled class="form-control" value="<?php
                                                                                    $tanggal = new DateTime($tgl_lahir);
                                                                                    $today = new DateTime();
                                                                                    $y = $today->diff($tanggal)->y;
                                                                                    echo $tanggal->format('Y-m-d') ." / ".$y . " tahun";  ?>">
				              </div>
				            </div>
				            <div class="form-group">
				              <div class="col-md-3">
				                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
				                <input type="text" class="form-control" value="<?= $jenis_kelamin ?>">
				              </div>
				            </div>
						<!-- END identitas pasien -->

						<!--DIRAWAT JALAN-->
							<div class="form-group">
								<div class="col-md-12">
					                <h5 style="margin-top: 30px;"><strong>
					                    <label class="control-label mb-10 text-left">
					                      DI RAWAT JALAN
					                      <span class="help"></span>
					                    </label></strong>
					                </h5>
					            </div>
							</div>

							<div class="form-group">
								<div class="col-md-3">
									<label class="control-label mb-10 text-left">Tanggal Kontrol<span class="help"></span></label>
									<input type="date" class="form-control" name="TglKontrol" id="TglKontrol"></input>
								</div>
								<span id="TglKontrol_error" class="text-danger"></span>
							</div>

							<div class="form-group">
				              <div class="col-md-3">
				                <label class="control-label mb-10 text-left">Hari ke-<span class="help"></span></label>
				                <input type="number"  name="hariKe" class="form-control" id="hariKe">
				              </div>
				              <span id="hariKe_error" class="text-danger"></span>
            			</div>

				      <div class="form-group">
				          <div class="col-md-3">
				              <label class="control-label mb-10 text-left">Kondisi Luka<span class="help"></span></label>
				              <input type="text" class="form-control" name="kondisiLuka" id="kondisiLuka" style="width: 500px;">
				      		</div>
				            <span id="kondisiLuka_error" class="text-danger"></span>
				          </div>
						<!--END DIRAWAT JALAN-->

						<!--Kontrol 1-->
							<div class="form-group">
								<div class="col-md-12">
					                <h5 style="margin-top: 30px;"><strong>
					                    <label class="control-label mb-10 text-left">
					                      Kontrol
					                      <span class="help"></span>
					                    </label></strong>
					                </h5>
					            </div>
							</div>

							<div class="form-group">
								<div class="col-md-4">
									<label class="control-label mb-10 text-left">
										<p>Keluar cairan purulent dari insial supercial</p>
									</label>
									<span id="kel_cai_pur_error" class="text-danger"></span>
									<div class="radio-button radio-button-primary">
					                    <input id="kel_cai_pur1" type="radio" name="kel_cai_pur" value="Ada">
					                    <label class="control-label" for="kel_cai_pur1">
					                      Ada
					                    </label>
					                 </div>
					                  <div class="radio-button radio-button-primary">
					                    <input id="kel_cai_pur2" type="radio" name="kel_cai_pur" value="Tidak Ada">
					                    <label class="control-label" for="kel_cai_pur2">
					                      Tidak Ada
					                    </label>
					                  </div>
								</div>
							</div>

							<div class="form-group">
								<div class="form-group">
				                  <div class="col-md-12">
				                    <strong>
				                      <label class="control-label mb-10 text-left">
				                        <p><br>Ditemukan salah satu tanda infeksi :</p>
				                      </label>
				                    </strong>
				    
				                  </div>
				                </div>

				                <div class="form-group ">
									<div class="col-md-4">
										<div class="checkbox checkbox-primary">
										<input id="tanda_infeksi1" type="checkbox" name="tanda_infeksi" value="Bengkak Lokal">
										<label class="control-label" for="tanda_infeksi1">
											Bengkak Lokal
										</label>
									</div>
									<div class="checkbox checkbox-primary">
										<input id="tanda_infeksi2" type="checkbox" name="tanda_infeksi" value="Kemerahan">
										<label class="control-label" for="tanda_infeksi2">
											Kemerahan
										</label>
									</div>
									<div class="checkbox checkbox-primary">
										<input id="tanda_infeksi3" type="checkbox" name="tanda_infeksi" value="Panas 38 derajat">
										<label class="control-label" for="tanda_infeksi3">
											Panas ( < 38&#8451;)
										</label>
									</div>
									<div class="checkbox checkbox-primary">
										<input id="tanda_infeksi4" type="checkbox" name="tanda_infeksi" value="Nyeri">
										<label class="control-label" for="tanda_infeksi4">
											Nyeri/Tendemess
										</label>
									</div>
									<div class="checkbox checkbox-primary">
										<input id="tanda_infeksi5" type="checkbox" name="tanda_infeksi" value="IDO">
										<label class="control-label" for="tanda_infeksi5">
											IDO (Infeksi Daerah Operasi)
										</label>
									</div>
								</div>
                			</div>
						</div>
						<!--END Kontrol 1-->
						<!--button-->
						<div class="form-group text-center" style="margin-top: 30px;">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                  </div>
                  <div class="col-md-6" style="margin-left: 600px;">
                    <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                    <button id='simpan' onclick="simpan()" type="submit" class="btn btn-success mb-4">Simpan</button>
                    <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                    <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                  </div>
             </div>
         
             <!--END button-->
					</div>
				</div>
			</div>
		</div>
		     <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">DAFTAR HASIL SURVEILANS INFEKSI DAERAH OPERASI (IDO) PASIEN OPS/OPERASI</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-group">
            <div class="col-md-12">
              <div class="table-wrap">
                <div class="table-responsive">
                  <table class="table table-hover display  pb-60" id="tabel_infeksi">
                    <thead>
                      <tr class="bg-success">
                        <th>NO</th>
                        <th>PILIH</th>
                        <th>HAPUS</th>
                        <td>TANGGAL KONTROL</td>
                        <td>HARI KE-</td>
                        <td>KONDISI LUKA</td>
                        <td>KELUARAN CAIRAN PURULENT</td>
                        <td>TANDA INFEKSI</td>
						<td>STAFF</td>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr class="bg-success">
                        <th>NO</th>
                        <th>PILIH</th>
                        <th>HAPUS</th>
                        <td>TANGGAL KONTROL</td>
                        <td>HARI KE-</td>
                        <td>KONDISI LUKA</td>
                        <td>KELUARAN CAIRAN PURULENT</td>
                        <td>TANDA INFEKSI</td>
						<td>STAFF</td>
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
	</div>
</div>

<script type="text/javascript">
  $(document).ready(function(e) {
    id_pelayanan = $('#inPel').val();
    reload_data_hasil_survei(id_pelayanan);
	var today = new Date().toISOString().split('T')[0];
    $('#TglKontrol').val(today);
  });
</script>

<script type="text/javascript">
function simpan(){
	IdPelayanan = $('#inPel').val();IdHistory = $('#inHis').val();NoRm = $('#inNoRM').val();TglKontrol = $('#TglKontrol').val();
    hariKe = $('#hariKe').val(); kondisiLuka = $('#kondisiLuka').val();KelCaiPur = $('input[name="kel_cai_pur"]:checked').val();
    var tandaInfeksi = [];
    $('input[name="tanda_infeksi"]').each(function(){
    	if($(this).is(":checked")){
    		tandaInfeksi.push($(this).val());
    	}
    });
    dataString = 'no_rm=' + NoRm + '&id_pelayanan=' + IdPelayanan + '&id_history=' + IdHistory + 
				'&tgl_kontrol=' + TglKontrol + '&hari_ke=' + hariKe + '&kondisi_luka=' + kondisiLuka + 
				'&kel_cai_pur=' + KelCaiPur + '&tanda_infeksi=' + tandaInfeksi;
    $.ajax({
    	url: "<?php echo base_url(); ?>erm_survei_infeksi/insert_survei_infeksi",
    	method: "POST",
    	dataType: 'json',
    	data:dataString,
    	success:function(data){
    		if(data.status == "success"){
    			swal({
    				title: "Good Job!",
    				type: "success",
    				text: "Data Berhasil disimpan",
    				confirmButtonColor: "#3cb878",
    			});
    			var today = new Date().toISOString().split('T')[0];
    				$('#TglKontrol').val(today);$('#hariKe').val('');$('#kondisiLuka').val('');
   					$('input[name="kel_cai_pur"]').attr('checked',false);
   					$('input[name="tanda_infeksi"]').attr('checked',false);
    			$('#tabel_infeksi').DataTable().ajax.reload();
    		}else{
    			swal({
    				title: "Gagal!",
    				type:"warning",
    				text: data.status,
    				confirmButtonColor:"#3cb878",
    			});
    		}
    	}
    });
    return false;
	}

	function hapus(id){
		swal({
			title: "Warning?",
			text: "Apakah kamu yakin menghapus data ini?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		},function(){
			$().ready(function(){
				$.ajax({
					url:"<?= base_url("erm_survei_infeksi/hapus_survei") ?>",
					method:"POST",
					dataType: "json",
					data:{
						id:id,
					},
					success: function(data){
						if(data.status == "success"){
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dihapus",
								confirmButtonColor: "#3cb878",
							});
							$('#tabel_infeksi').DataTable().ajax.reload();
						}else{
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

	function pilih(id){
		$('#id').val(id);
		$('input[name="tanda_infeksi"]').prop("checked",false);
		$.ajax({
			url:"<?= base_url('Erm_survei_infeksi/getIdFormSurvei');?>",
			method:"POST",
			dataType:'json',
			data:{id:id},
			success:function(data){
				if(data.status_dt == "found"){
					$('#TglKontrol').val(data.tgl_kontrol);
					$('#hariKe').val(data.hari_ke);
					$('#kondisiLuka').val(data.kondisi_luka);
					if (data.kel_cai_pur == "Tidak Ada") {
					$('input[name="kel_cai_pur"][value="' + data.kel_cai_pur + '"]').prop("checked", true);
					} else {
					$('input[name="kel_cai_pur"][value="Ada"]').prop("checked", true);
					}
					if (data.tanda_infeksi.match(/Bengkak Lokal.*/)) {
						$('input[name="tanda_infeksi"][value="Bengkak Lokal"]').prop("checked", true);
					}
					if(data.tanda_infeksi.match(/Kemerahan.*/)){
						$('input[name="tanda_infeksi"][value="Kemerahan"]').prop("checked", true);
					}
					if(data.tanda_infeksi.match(/Panas 38 derajat.*/)){
						$('input[name="tanda_infeksi"][value="Panas 38 derajat"]').prop("checked", true);
					}
					if(data.tanda_infeksi.match(/Nyeri.*/)){
						$('input[name="tanda_infeksi"][value="Nyeri"]').prop("checked", true);
					}
					if(data.tanda_infeksi.match(/IDO.*/)){
						$('input[name="tanda_infeksi"][value="IDO"]').prop("checked", true);
					}
					$('#edit').show();
					$('#cetak').show();
					$('#simpan').hide();
					//Smooth Scroll
					window.scrollTo({
						top:0,
						behavior:'smooth'
					});
				}else{
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Data Kosong",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
		return false;
	}

	function edit(){
		id = $('#id').val();
		IdPelayanan = $('#inPel').val();
		IdHistory = $('#inHis').val();
		NoRm = $('#inNoRM').val();
		TglKontrol = $('#TglKontrol').val();
		hariKe = $('#hariKe').val();
		kondisiLuka = $('#kondisiLuka').val();
		KelCaiPur = $('input[name="kel_cai_pur"]:checked').val();

    var tandaInfeksi = [];
    $('input[name="tanda_infeksi"]').each(function(){
    	if($(this).is(":checked")){
    		tandaInfeksi.push($(this).val());
    	}
    });


    $.ajax({
    	type:"POST",
    	url:"<?= base_url(); ?>erm_survei_infeksi/edit_survei",
    	data:{
    		inNoRm:NoRm,
    		inPel:IdPelayanan,
    		inHis:IdHistory,
    		TglKontrol:TglKontrol,
    		hariKe:hariKe,
    		kondisiLuka:kondisiLuka,
    		kel_cai_pur:KelCaiPur,
    		tanda_infeksi:tandaInfeksi,
    		id:id
    	},
    	success:function(data){
    		
    		swal({
            title: "good job!",
            type: "success",
            text: "Data berhasil disimpan",
            confirmButtonColor: "#3cb878",
          });
    					$('#TglKontrol').val('');
							$('#hariKe').val('');
							$('#kondisiLuka').val('');
							$('input[name="kel_cai_pur"]').prop("checked",false);
							$('input[name="tanda_infeksi"]').prop("checked",false);

							$('#edit').hide();
							$('#cetak').hide();
							$('#simpan').show();
							$('#tabel_infeksi').DataTable().ajax.reload();    					
    	},
    	error:function(data){
    		    			swal({
            title: "Gagal!",
            text: "Data tidak terkirim, mohon cek inputan Anda kembali",
            type: "warning",
            confirmButtonColor: "#3cb878",
          });
    	}
    });
    return false;
	}


	function cetak(){
		id = $('#id').val();
		window.location.href = "" + id;
	}


 function reload_data_hasil_survei(id_pelayanan) { 
    $('#tabel_infeksi').dataTable().fnClearTable();
    $('#tabel_infeksi').dataTable().fnDestroy();
    $('#tabel_infeksi').DataTable({
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
        "url": '<?php echo base_url("erm_survei_infeksi/tampil_list_hasil_survei_infeksi"); ?>',
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
=======
<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Surveilans Infeksi Daerah Operasi (IDO) Pasien OPS/Operasi</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-wrap">
						<!-- Identitas Pasien -->
							<div class="form-group">
								<div class="col-md-3">
									<label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
									<input type="text" disabled class="form-control" name="inNoRm" value="<?= $no_rm ?>" id="inNoRM"></input>
								</div>
								<input type="hidden" name="id" value="id" id="id">
								<input type="hidden" class="form-control" name="inPel" value="<?= $id_pelayanan ?>" id="inPel">
            					<input type="hidden" class="form-control" name="inHis" value="<?= $id_history ?>" id="inHis">
							</div>
							<div class="form-group">
				              <div class="col-md-3">
				                <label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
				                <input type="text" disabled class="form-control" value="<?= $nama ?>">
				              </div>
            				</div>

				            <div class="form-group">
				              <div class="col-md-3">
				                <label class="control-label mb-10 text-left">Tanggal Lahir / Umur<span class="help"></span></label>
				                <input type="text" disabled class="form-control" value="<?php
                                                                                    $tanggal = new DateTime($tgl_lahir);
                                                                                    $today = new DateTime();
                                                                                    $y = $today->diff($tanggal)->y;
                                                                                    echo $tanggal->format('Y-m-d') ." / ".$y . " tahun";  ?>">
				              </div>
				            </div>
				            <div class="form-group">
				              <div class="col-md-3">
				                <label class="control-label mb-10 text-left">Jenis Kelamin</label>
				                <input type="text" class="form-control" value="<?= $jenis_kelamin ?>">
				              </div>
				            </div>
						<!-- END identitas pasien -->

						<!--DIRAWAT JALAN-->
							<div class="form-group">
								<div class="col-md-12">
					                <h5 style="margin-top: 30px;"><strong>
					                    <label class="control-label mb-10 text-left">
					                      DI RAWAT JALAN
					                      <span class="help"></span>
					                    </label></strong>
					                </h5>
					            </div>
							</div>

							<div class="form-group">
								<div class="col-md-3">
									<label class="control-label mb-10 text-left">Tanggal Kontrol<span class="help"></span></label>
									<input type="date" class="form-control" name="TglKontrol" id="TglKontrol"></input>
								</div>
								<span id="TglKontrol_error" class="text-danger"></span>
							</div>

							<div class="form-group">
				              <div class="col-md-3">
				                <label class="control-label mb-10 text-left">Hari ke-<span class="help"></span></label>
				                <input type="number"  name="hariKe" class="form-control" id="hariKe">
				              </div>
				              <span id="hariKe_error" class="text-danger"></span>
            			</div>

				      <div class="form-group">
				          <div class="col-md-3">
				              <label class="control-label mb-10 text-left">Kondisi Luka<span class="help"></span></label>
				              <input type="text" class="form-control" name="kondisiLuka" id="kondisiLuka" style="width: 500px;">
				      		</div>
				            <span id="kondisiLuka_error" class="text-danger"></span>
				          </div>
						<!--END DIRAWAT JALAN-->

						<!--Kontrol 1-->
							<div class="form-group">
								<div class="col-md-12">
					                <h5 style="margin-top: 30px;"><strong>
					                    <label class="control-label mb-10 text-left">
					                      Kontrol
					                      <span class="help"></span>
					                    </label></strong>
					                </h5>
					            </div>
							</div>

							<div class="form-group">
								<div class="col-md-4">
									<label class="control-label mb-10 text-left">
										<p>Keluar cairan purulent dari insial supercial</p>
									</label>
									<span id="kel_cai_pur_error" class="text-danger"></span>
									<div class="radio-button radio-button-primary">
					                    <input id="kel_cai_pur1" type="radio" name="kel_cai_pur" value="Ada">
					                    <label class="control-label" for="kel_cai_pur1">
					                      Ada
					                    </label>
					                 </div>
					                  <div class="radio-button radio-button-primary">
					                    <input id="kel_cai_pur2" type="radio" name="kel_cai_pur" value="Tidak Ada">
					                    <label class="control-label" for="kel_cai_pur2">
					                      Tidak Ada
					                    </label>
					                  </div>
								</div>
							</div>

							<div class="form-group">
								<div class="form-group">
				                  <div class="col-md-12">
				                    <strong>
				                      <label class="control-label mb-10 text-left">
				                        <p><br>Ditemukan salah satu tanda infeksi :</p>
				                      </label>
				                    </strong>
				    
				                  </div>
				                </div>

				                <div class="form-group ">
									<div class="col-md-4">
										<div class="checkbox checkbox-primary">
										<input id="tanda_infeksi1" type="checkbox" name="tanda_infeksi" value="Bengkak Lokal">
										<label class="control-label" for="tanda_infeksi1">
											Bengkak Lokal
										</label>
									</div>
									<div class="checkbox checkbox-primary">
										<input id="tanda_infeksi2" type="checkbox" name="tanda_infeksi" value="Kemerahan">
										<label class="control-label" for="tanda_infeksi2">
											Kemerahan
										</label>
									</div>
									<div class="checkbox checkbox-primary">
										<input id="tanda_infeksi3" type="checkbox" name="tanda_infeksi" value="Panas 38 derajat">
										<label class="control-label" for="tanda_infeksi3">
											Panas ( < 38&#8451;)
										</label>
									</div>
									<div class="checkbox checkbox-primary">
										<input id="tanda_infeksi4" type="checkbox" name="tanda_infeksi" value="Nyeri">
										<label class="control-label" for="tanda_infeksi4">
											Nyeri/Tendemess
										</label>
									</div>
									<div class="checkbox checkbox-primary">
										<input id="tanda_infeksi5" type="checkbox" name="tanda_infeksi" value="IDO">
										<label class="control-label" for="tanda_infeksi5">
											IDO (Infeksi Daerah Operasi)
										</label>
									</div>
								</div>
                			</div>
						</div>
						<!--END Kontrol 1-->
						<!--button-->
						<div class="form-group text-center" style="margin-top: 30px;">
                  <div class="col-md-12">
                    <label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
                  </div>
                  <div class="col-md-6" style="margin-left: 600px;">
                    <a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
                    <button id='simpan' onclick="simpan()" type="submit" class="btn btn-success mb-4">Simpan</button>
                    <button style="display: none;" id="edit" type="submit" class="btn btn-warning mb-4" onclick="edit()">Edit</button>
                    <button style="display: none;" id="cetak" type="submit" class="btn btn-primary mb-4" onclick="cetak()">Cetak</button>
                  </div>
             </div>
         
             <!--END button-->
					</div>
				</div>
			</div>
		</div>
		     <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">DAFTAR HASIL SURVEILANS INFEKSI DAERAH OPERASI (IDO) PASIEN OPS/OPERASI</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="form-group">
            <div class="col-md-12">
              <div class="table-wrap">
                <div class="table-responsive">
                  <table class="table table-hover display  pb-60" id="tabel_infeksi">
                    <thead>
                      <tr class="bg-success">
                        <th>NO</th>
                        <th>PILIH</th>
                        <th>HAPUS</th>
                        <td>TANGGAL KONTROL</td>
                        <td>HARI KE-</td>
                        <td>KONDISI LUKA</td>
                        <td>KELUARAN CAIRAN PURULENT</td>
                        <td>TANDA INFEKSI</td>
						<td>STAFF</td>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr class="bg-success">
                        <th>NO</th>
                        <th>PILIH</th>
                        <th>HAPUS</th>
                        <td>TANGGAL KONTROL</td>
                        <td>HARI KE-</td>
                        <td>KONDISI LUKA</td>
                        <td>KELUARAN CAIRAN PURULENT</td>
                        <td>TANDA INFEKSI</td>
						<td>STAFF</td>
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
	</div>
</div>

<script type="text/javascript">
  $(document).ready(function(e) {
    id_pelayanan = $('#inPel').val();
    reload_data_hasil_survei(id_pelayanan);
	var today = new Date().toISOString().split('T')[0];
    $('#TglKontrol').val(today);
  });
</script>

<script type="text/javascript">
function simpan(){
	IdPelayanan = $('#inPel').val();IdHistory = $('#inHis').val();NoRm = $('#inNoRM').val();TglKontrol = $('#TglKontrol').val();
    hariKe = $('#hariKe').val(); kondisiLuka = $('#kondisiLuka').val();KelCaiPur = $('input[name="kel_cai_pur"]:checked').val();
    var tandaInfeksi = [];
    $('input[name="tanda_infeksi"]').each(function(){
    	if($(this).is(":checked")){
    		tandaInfeksi.push($(this).val());
    	}
    });
    dataString = 'no_rm=' + NoRm + '&id_pelayanan=' + IdPelayanan + '&id_history=' + IdHistory + 
				'&tgl_kontrol=' + TglKontrol + '&hari_ke=' + hariKe + '&kondisi_luka=' + kondisiLuka + 
				'&kel_cai_pur=' + KelCaiPur + '&tanda_infeksi=' + tandaInfeksi;
    $.ajax({
    	url: "<?php echo base_url(); ?>erm_survei_infeksi/insert_survei_infeksi",
    	method: "POST",
    	dataType: 'json',
    	data:dataString,
    	success:function(data){
    		if(data.status == "success"){
    			swal({
    				title: "Good Job!",
    				type: "success",
    				text: "Data Berhasil disimpan",
    				confirmButtonColor: "#3cb878",
    			});
    			var today = new Date().toISOString().split('T')[0];
    				$('#TglKontrol').val(today);$('#hariKe').val('');$('#kondisiLuka').val('');
   					$('input[name="kel_cai_pur"]').attr('checked',false);
   					$('input[name="tanda_infeksi"]').attr('checked',false);
    			$('#tabel_infeksi').DataTable().ajax.reload();
    		}else{
    			swal({
    				title: "Gagal!",
    				type:"warning",
    				text: data.status,
    				confirmButtonColor:"#3cb878",
    			});
    		}
    	}
    });
    return false;
	}

	function hapus(id){
		swal({
			title: "Warning?",
			text: "Apakah kamu yakin menghapus data ini?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3cb878",
			confirmButtonText: "Yakin",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		},function(){
			$().ready(function(){
				$.ajax({
					url:"<?= base_url("erm_survei_infeksi/hapus_survei") ?>",
					method:"POST",
					dataType: "json",
					data:{
						id:id,
					},
					success: function(data){
						if(data.status == "success"){
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dihapus",
								confirmButtonColor: "#3cb878",
							});
							$('#tabel_infeksi').DataTable().ajax.reload();
						}else{
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

	function pilih(id){
		$('#id').val(id);
		$('input[name="tanda_infeksi"]').prop("checked",false);
		$.ajax({
			url:"<?= base_url('Erm_survei_infeksi/getIdFormSurvei');?>",
			method:"POST",
			dataType:'json',
			data:{id:id},
			success:function(data){
				if(data.status_dt == "found"){
					$('#TglKontrol').val(data.tgl_kontrol);
					$('#hariKe').val(data.hari_ke);
					$('#kondisiLuka').val(data.kondisi_luka);
					if (data.kel_cai_pur == "Tidak Ada") {
					$('input[name="kel_cai_pur"][value="' + data.kel_cai_pur + '"]').prop("checked", true);
					} else {
					$('input[name="kel_cai_pur"][value="Ada"]').prop("checked", true);
					}
					if (data.tanda_infeksi.match(/Bengkak Lokal.*/)) {
						$('input[name="tanda_infeksi"][value="Bengkak Lokal"]').prop("checked", true);
					}
					if(data.tanda_infeksi.match(/Kemerahan.*/)){
						$('input[name="tanda_infeksi"][value="Kemerahan"]').prop("checked", true);
					}
					if(data.tanda_infeksi.match(/Panas 38 derajat.*/)){
						$('input[name="tanda_infeksi"][value="Panas 38 derajat"]').prop("checked", true);
					}
					if(data.tanda_infeksi.match(/Nyeri.*/)){
						$('input[name="tanda_infeksi"][value="Nyeri"]').prop("checked", true);
					}
					if(data.tanda_infeksi.match(/IDO.*/)){
						$('input[name="tanda_infeksi"][value="IDO"]').prop("checked", true);
					}
					$('#edit').show();
					$('#cetak').show();
					$('#simpan').hide();
					//Smooth Scroll
					window.scrollTo({
						top:0,
						behavior:'smooth'
					});
				}else{
					swal({
						title: "Gagal!",
						type: "warning",
						text: "Data Kosong",
						confirmButtonColor: "#3cb878",
					});
				}
			}
		});
		return false;
	}

	function edit(){
		id = $('#id').val();
		IdPelayanan = $('#inPel').val();
		IdHistory = $('#inHis').val();
		NoRm = $('#inNoRM').val();
		TglKontrol = $('#TglKontrol').val();
		hariKe = $('#hariKe').val();
		kondisiLuka = $('#kondisiLuka').val();
		KelCaiPur = $('input[name="kel_cai_pur"]:checked').val();

    var tandaInfeksi = [];
    $('input[name="tanda_infeksi"]').each(function(){
    	if($(this).is(":checked")){
    		tandaInfeksi.push($(this).val());
    	}
    });


    $.ajax({
    	type:"POST",
    	url:"<?= base_url(); ?>erm_survei_infeksi/edit_survei",
    	data:{
    		inNoRm:NoRm,
    		inPel:IdPelayanan,
    		inHis:IdHistory,
    		TglKontrol:TglKontrol,
    		hariKe:hariKe,
    		kondisiLuka:kondisiLuka,
    		kel_cai_pur:KelCaiPur,
    		tanda_infeksi:tandaInfeksi,
    		id:id
    	},
    	success:function(data){
    		
    		swal({
            title: "good job!",
            type: "success",
            text: "Data berhasil disimpan",
            confirmButtonColor: "#3cb878",
          });
    					$('#TglKontrol').val('');
							$('#hariKe').val('');
							$('#kondisiLuka').val('');
							$('input[name="kel_cai_pur"]').prop("checked",false);
							$('input[name="tanda_infeksi"]').prop("checked",false);

							$('#edit').hide();
							$('#cetak').hide();
							$('#simpan').show();
							$('#tabel_infeksi').DataTable().ajax.reload();    					
    	},
    	error:function(data){
    		    			swal({
            title: "Gagal!",
            text: "Data tidak terkirim, mohon cek inputan Anda kembali",
            type: "warning",
            confirmButtonColor: "#3cb878",
          });
    	}
    });
    return false;
	}


	function cetak(){
		id = $('#id').val();
		window.location.href = "" + id;
	}


 function reload_data_hasil_survei(id_pelayanan) { 
    $('#tabel_infeksi').dataTable().fnClearTable();
    $('#tabel_infeksi').dataTable().fnDestroy();
    $('#tabel_infeksi').DataTable({
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
        "url": '<?php echo base_url("erm_survei_infeksi/tampil_list_hasil_survei_infeksi"); ?>',
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>