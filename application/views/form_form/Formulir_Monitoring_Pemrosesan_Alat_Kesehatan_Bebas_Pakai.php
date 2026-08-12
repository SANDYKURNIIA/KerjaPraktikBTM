<style>
  canvas {
    cursor: crosshair;
    border: 1px solid #000000;
  }
</style>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6>FORMULIR MONITORING PEMROSESAN ALAT KESEHATAN BEBAS PAKAI</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-wrap">
					<form id='formDatas'>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tanggal <span class="help"></span></label>
								<div class="has-success">
									<input type="date" name="tglForm" id="tglForm" class="form-control">
								</div>
								<input type="hidden" name="idP" id="idP">
							</div>
							<span class="text-danger" id="tglForm_error"></span>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Unit<span class="help"></span></label>
								<div class="has-success">
									<input type="text" name="unit" id="unit" class="form-control">
								</div>
							</div>
							<span class="text-danger" id="tglForm_error"></span>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tanda Tangan<span class="help"></span></label>
								<a data-toggle="modal" data-target="#modal_ttd" aria-expanded="false" aria-controls="ttd" class="btn btn-primary btn-anim btn-sm form-control"><i class="icon-rocket"></i><span class="btn-text">TANDA TANGAN</span></a>
							</div>
							<span class="text-danger" id="tglForm_error"></span>
						</div>

						<div class="col-md-12">
							<span class="clearfix">&nbsp;</span>
							<p style='font-weight:bold !important;color:black !important;'>YA : ADA TERSEDIA/DIKERJAKAN SESUAI INDIKATOR</p>
							<p style='font-weight:bold !important;color:black !important;'>TIDAK : TIDAK ADA/TIDAK TERSEDIA/TIDAK SESUAI INDIKATOR</p>		
							<p style='font-weight:bold !important;color:black !important;'>NA : TIDAK DAPAT DI KERJAKAN/ NON APPLICATION</p>
						</div>
						<div class="col-md-12">
							<span class="clearfix">&nbsp;</span>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Petugas Pakai Alat Pelindung Diri(masker, sarung tangan, gaun)</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Petugas_Pakai_Alat_Pelindung_Diri" id="Petugas_Pakai_Alat_Pelindung_Diri" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Petugas_Pakai_Alat_Pelindung_Diri" id="Petugas_Pakai_Alat_Pelindung_Diri" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Petugas_Pakai_Alat_Pelindung_Diri" id="Petugas_Pakai_Alat_Pelindung_Diri" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Perendaman alat sampai seluruh permukaan alat</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Perendaman_alat_sampai_seluruh_permukaan_alat" id="Perendaman_alat_sampai_seluruh_permukaan_alat" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Perendaman_alat_sampai_seluruh_permukaan_alat" id="Perendaman_alat_sampai_seluruh_permukaan_alat" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Perendaman_alat_sampai_seluruh_permukaan_alat" id="Perendaman_alat_sampai_seluruh_permukaan_alat" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Perendaman menggunakan cairan enzymatic selama 10-15 menit</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit" id="perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit" id="perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit" id="perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Peralatan Dibersihkan Dengan air mengalir setelah direndam dalam didinfetan selama 15 menit</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam" id="Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam" id="Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam" id="Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Alat yang DTT di siram dengan air steril dan di keringkan</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan" id="Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan" id="Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan" id="Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<span class="clearfix">&nbsp;</span>
							<h6>
								<label for="" class="control-label mb-10 text-left">
									<strong>Pengemasan Dan Penyimpanan</strong>
								</label>
							</h6>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Penyimpanan Alat yang sudah diproses dibungkus dan disimpan dalam lemari</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan" id="Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan" id="Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan" id="Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Alat steril disimpan dalam lemari tertutup dengan jarak dari lantai 60 cm . tidak tercampur dengan barang-barang lain</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak" id="Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak" id="Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak" id="Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="modal fade" id="modal_ttd" role="dialog" aria-labelledby="newPeternakModallabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="newPeternakModallabel">TANDA TANGAN</h5>
									<a type="button" class="close" data-dismiss="modal" aria-label="Close"></a>
									<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<div class="modal-body">
									<div class="form-group row" style="margin-left: 30px;">

									<div class="row">
										<div class="col-md-12">
										<canvas id="ttd" width="300" height="300">
										</canvas>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
										<a class="btn btn-primary" id="sig-submitBtn">Submit Signature</a>
										<a class="btn btn-default" id="sig-clearBtn">Clear Signature</a>
										</div>
									</div>

									</div>
								</div>


								</div>
							</div>
							</div>
                  		</div>

						<div class="col-md-12">
							<span class="clearfix">&nbsp;</span>
						</div>

						<div class="form-group">
							<div class="col-md-6">
								<span class="clearfix">&nbsp;</span>
							</div>
							<div class="col-md-6">
								<canvas id="can" width="300" height="300" style="display: none;"></canvas>
							</div>
						</div>

						<div class="col-md-12">
							<span class="clearfix">&nbsp;</span>
						</div>

						<div class="col-md-6" style="margin-left: 600px;">
							<button id='btnSimpan' type="submit" class="btn btn-success mb-4">Simpan</button>
							<button style="display: none;" id="btnUpdate" type="submit" class="btn btn-warning mb-4">Edit</button>
                  		</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">List Data</h6>
					</div>
					<div class="clearfix">&nbsp;</div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="form-group">
							<div class="col-md-12">
								<div class="table-wrap">
									<div class="table-responsive">
										<table class="table table-hover display pb-60" id="datables">
											<thead>
												<tr class="bg-success">
													<th>NO</th>
													<th>PILIH</th>
													<th>HAPUS</th>
													<th>NAMA STAFF</th>
													<th>Tanggal</th>
													<th>Unit</th>
													<th>Petugas Pakai Alat Pelindung Diri(masker, sarung tangan, gaun)</th>
													<th>Perendaman alat sampai seluruh permukaan alat</th>
													<th>Perendaman menggunakan cairan enzymatic selama 10-15 menit</th>
													<th>Peralatan Dibersihkan Dengan air mengalir setelah direndam dalam didinfetan selama 15 menit</th>
													<th>Alat yang DTT di siram dengan air steril dan di keringkan</th>
													<th>Penyimpanan Alat yang sudah diproses dibungkus dan disimpan dalam lemari</th>
													<th>Alat steril disimpan dalam lemari tertutup dengan jarak dari lantai 60 cm . tidak tercampur dengan barang-barang lain</th>
												</tr>
											</thead>
											<tbody style="color: black"></tbody>
											<tfoot>
												<tr class="bg-success">
													<th>NO</th>
													<th>PILIH</th>
													<th>HAPUS</th>
													<th>NAMA STAFF</th>
													<th>Tanggal</th>
													<th>Unit</th>
													<th>Petugas Pakai Alat Pelindung Diri(masker, sarung tangan, gaun)</th>
													<th>Perendaman alat sampai seluruh permukaan alat</th>
													<th>Perendaman menggunakan cairan enzymatic selama 10-15 menit</th>
													<th>Peralatan Dibersihkan Dengan air mengalir setelah direndam dalam didinfetan selama 15 menit</th>
													<th>Alat yang DTT di siram dengan air steril dan di keringkan</th>
													<th>Penyimpanan Alat yang sudah diproses dibungkus dan disimpan dalam lemari</th>
													<th>Alat steril disimpan dalam lemari tertutup dengan jarak dari lantai 60 cm . tidak tercampur dengan barang-barang lain</th>
												</tr>
											</tfoot>
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
</div>

<?php $this->load->view('assets/signature_ppi') ?>


<script>
$(document).ready(function(){
	reload_datatables();
});

$("#sig-submitBtn").on('click',(e)=>{
	e.preventDefault();
	canvas = document.getElementById('ttd');
	ttd = canvas.toDataURL("image/png");

	var can = document.getElementById('can');
	var ctx = can.getContext('2d');

	var img = new Image;
	img.onload = function(){
		ctx.drawImage(img,0,0);
	};
	img.setAttribute("src",ttd);

	can.style.display = "block";
});

$("#sig-clearBtn").on('click',(e)=>{
	e.preventDefault();
	document.getElementById('can').style.display = "none";
	clearCanvas(document.getElementById('can'));
});


function reload_datatables() {
    $('#datables').dataTable().fnClearTable();
    $('#datables').dataTable().fnDestroy();
    $('#datables').DataTable({
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
        "url": '<?php echo base_url("Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai/get_all_data"); ?>',
        "type": 'GET',
      },
	  "dom": 'Bfrtip',
	  "buttons": ['csv', 'excel', 'pdf', 'print'],
      "deferRender": true,
      "processing": true,
      "order": [],
      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],
    });
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
					url:"<?= base_url("Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai/delete") ?>",
					method:"POST",
					dataType: "json",
					data:{
						id:id,
					},
					complete:function(data){
						if(data.status == 200){
							swal({
								title: "good job!",
								type: "success",
								text: "Data Berhasil dihapus",
								confirmButtonColor: "#3cb878",
							});
							$('#datables').DataTable().ajax.reload();
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

$('#btnSimpan').on('click',(e)=>{
e.preventDefault();
var formDatas = new FormData(document.getElementById('formDatas'));

canvas = document.getElementById('ttd');
ttd = canvas.toDataURL("image/png");

formDatas.append('ttd',ttd);

$.ajax({
	type: "POST",
	url:"<?= base_url("Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai/insert") ?>",
	data: formDatas,
	dataType: "json",
	cache:false,
    contentType: false,
    processData: false,
	complete:function (res) {
		if(res.status == 200){
			swal({
				title: "good job!",
				type: "success",
				text: "Data Berhasil disimpan",
				confirmButtonColor: "#3cb878",
			});
				$("#formDatas").trigger('reset');
				clearCanvas(canvas);
				clearCanvas(document.getElementById('can'));
				document.getElementById('can').style.display = 'none';
				$('#datables').DataTable().ajax.reload();
		}else{
			swal({
				title: "Gagal!",
				type: "warning",
				text: res.status,
				confirmButtonColor: "#3cb878",
			});
		}
	}
});
});

function pilih(id){
	$.ajax({
		type: "POST",
		url:"<?= base_url("Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai/getData") ?>",
		data: {
			id:id
		},
		dataType: "json",
		beforeSend: function(){
			//Smooth Scroll
			window.scrollTo({
				top:0,
				behavior:'smooth'
			});
		},
		success: function (res) {
			if(res != 0){
				$("#tglForm").val(res.Tanggal);
				$("#unit").val(res.unit);
				$("input[type='radio'][name='Petugas_Pakai_Alat_Pelindung_Diri'][value='"+res.Petugas_Pakai_Alat_Pelindung_Diri+"']").prop('checked',true);
				$("input[type='radio'][name='Perendaman_alat_sampai_seluruh_permukaan_alat'][value='"+res.Perendaman_alat_sampai_seluruh_permukaan_alat+"']").prop('checked',true);
				$("input[type='radio'][name='perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit'][value='"+res.perendaman_menggunakan_cairan_enzymatic_selama_10_15_menit+"']").prop('checked',true);
				$("input[type='radio'][name='Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam'][value='"+res.Peralatan_Dibersihkan_Dengan_air_mengalir_setelah_direndam+"']").prop('checked',true);
				$("input[type='radio'][name='Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan'][value='"+res.Alat_yang_DTT_disiram_dengan_air_steril_dan_dikeringkan+"']").prop('checked',true);
				$("input[type='radio'][name='Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan'][value='"+res.Penyimpanan_Alat_yang_sudah_diproses_dibungkus_dan_disimpan+"']").prop('checked',true);
				$("input[type='radio'][name='Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak'][value='"+res.Alat_steril_disimpan_dalam_lemari_tertutup_dengan_jarak+"']").prop('checked',true);
				$("#btnSimpan").hide();
				$("#btnUpdate").show();
				$("#idP").val(btoa(res.id_MONITORING_PEMROSESAN_ALAT_KESEHATAN));
				
				canvas = document.getElementById('ttd');
				var pcx = canvas.getContext('2d');

				var can = document.getElementById('can');
				var ctx = can.getContext('2d');

				var img = new Image;
				img.onload = function(){
					ctx.drawImage(img,0,0);
					pcx.drawImage(img,0,0);
				};
				img.setAttribute("src",res.Signature);

				can.style.display = "block";

			}else{
				swal({
					title: "Gagal!",
					type: "warning",
					text: "Data Tidak Ada",
					confirmButtonColor: "#3cb878",
				});
			}
		}
	});
}
function clearCanvas(c) {
    c.width = c.width;
}
$('#btnUpdate').on('click',(e)=>{
e.preventDefault();
var formDatas = new FormData(document.getElementById('formDatas'));
canvas = document.getElementById('ttd');
ttd = canvas.toDataURL("image/png");

formDatas.append('ttd',ttd);
$.ajax({
	type: "POST",
	url:"<?= base_url("Formulir_Monitoring_Pemrosesan_Alat_Kesehatan_Bebas_Pakai/update") ?>",
	data: formDatas,
	dataType: "json",
	cache:false,
    contentType: false,
    processData: false,
	complete:function (res) {
		if(res.status == 200){
			swal({
				title: "good job!",
				type: "success",
				text: "Data Berhasil diEdit",
				confirmButtonColor: "#3cb878",
			});
				$("#formDatas").trigger('reset');
				clearCanvas(canvas);
				clearCanvas(document.getElementById('can'));
				document.getElementById('can').style.display = 'none';
				$('#datables').DataTable().ajax.reload();
				$("#btnSimpan").show();
				$("#btnUpdate").hide();
		}else{
			swal({
				title: "Gagal!",
				type: "warning",
				text: res.status,
				confirmButtonColor: "#3cb878",
			});
		}
	}
});
});
</script>