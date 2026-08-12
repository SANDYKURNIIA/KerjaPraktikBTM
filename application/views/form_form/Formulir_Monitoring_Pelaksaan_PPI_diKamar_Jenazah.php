<<<<<<< HEAD
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6>FORMULIR MONITORING PELAKSANAAN PPI DI KAMAR JENAZAH</h6>
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
								<label for="" class="control-label mb-10 text-left">Unit <span class="help"></span></label>
								<div class="has-success">
									<input type="text" name="unit" id="unit" class="form-control">
								</div>
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
								<label for="" class="control-label mb-10 text-left">Lantai bersih dan tidak licin</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Lantai_bersih_dan_tidak_licin" id="Lantai_bersih_dan_tidak_licin" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Lantai_bersih_dan_tidak_licin" id="Lantai_bersih_dan_tidak_licin" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Lantai_bersih_dan_tidak_licin" id="Lantai_bersih_dan_tidak_licin" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Permukaan tidak berdebu</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Permukaan_tidak_berdebu" id="Permukaan_tidak_berdebu" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Permukaan_tidak_berdebu" id="Permukaan_tidak_berdebu" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Permukaan_tidak_berdebu" id="Permukaan_tidak_berdebu" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tidak ada lawa lawa</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tidak_ada_awa_lawa" id="Tidak_ada_awa_lawa" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tidak_ada_awa_lawa" id="Tidak_ada_awa_lawa" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tidak_ada_awa_lawa" id="Tidak_ada_awa_lawa" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tempat sampah tertutup</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_sampah_tertutup" id="Tempat_sampah_tertutup" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_sampah_tertutup" id="Tempat_sampah_tertutup" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_sampah_tertutup" id="Tempat_sampah_tertutup" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Wastafel cuci tangan selalu bersih dan bebas dari peralatan</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan" id="Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan" id="Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan" id="Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Keranda selalu bersih dan tidak berkarat</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Keranda_selalu_bersih_dan_tidak_berkarat" id="Keranda_selalu_bersih_dan_tidak_berkarat" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Keranda_selalu_bersih_dan_tidak_berkarat" id="Keranda_selalu_bersih_dan_tidak_berkarat" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Keranda_selalu_bersih_dan_tidak_berkarat" id="Keranda_selalu_bersih_dan_tidak_berkarat" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Penutup keranda bersih</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Penutup_keranda_bersih" id="Penutup_keranda_bersih" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Penutup_keranda_bersih" id="Penutup_keranda_bersih" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Penutup_keranda_bersih" id="Penutup_keranda_bersih" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Mobil jenazah bersih</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Mobil_jenazah_bersih" id="Mobil_jenazah_bersih" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Mobil_jenazah_bersih" id="Mobil_jenazah_bersih" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Mobil_jenazah_bersih" id="Mobil_jenazah_bersih" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Mobil jenazah dibersihkan setiap habis pakai</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Mobil_jenazah_dibersihkan_setiap_habis_pakai" id="Mobil_jenazah_dibersihkan_setiap_habis_pakai" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Mobil_jenazah_dibersihkan_setiap_habis_pakai" id="Mobil_jenazah_dibersihkan_setiap_habis_pakai" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Mobil_jenazah_dibersihkan_setiap_habis_pakai" id="Mobil_jenazah_dibersihkan_setiap_habis_pakai" value='NA'>
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
									<strong>Fasilitas</strong>
								</label>
							</h6>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tersedia APD lengkap (Sarung Tangan, Masker, Tutup Kepala, Goggles, Gawn, Celemek, Sepatu)</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_APD_lengkap" id="Tersedia_APD_lengkap" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_APD_lengkap" id="Tersedia_APD_lengkap" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_APD_lengkap" id="Tersedia_APD_lengkap" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Alat cuci tangan lengkap diruangan</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Alat_cuci_tangan_lengkap_diruangan" id="Alat_cuci_tangan_lengkap_diruangan" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Alat_cuci_tangan_lengkap_diruangan" id="Alat_cuci_tangan_lengkap_diruangan" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Alat_cuci_tangan_lengkap_diruangan" id="Alat_cuci_tangan_lengkap_diruangan" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span class="clearfix">&nbsp;</span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tersedia handrub di mobil jenazah</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_handrub_dimobil_jenazah" id="Tersedia_handrub_dimobil_jenazah" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_handrub_dimobil_jenazah" id="Tersedia_handrub_dimobil_jenazah" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_handrub_dimobil_jenazah" id="Tersedia_handrub_dimobil_jenazah" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tersedia spilkit di mobil jenazah</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_spilkit_dimobil_jenazah" id="Tersedia_spilkit_dimobil_jenazah" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_spilkit_dimobil_jenazah" id="Tersedia_spilkit_dimobil_jenazah" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_spilkit_dimobil_jenazah" id="Tersedia_spilkit_dimobil_jenazah" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tempat sampah infeksius dan non infeksius</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_sampah_infeksius_dan_non_infeksius" id="Tempat_sampah_infeksius_dan_non_infeksius" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_sampah_infeksius_dan_non_infeksius" id="Tempat_sampah_infeksius_dan_non_infeksius" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_sampah_infeksius_dan_non_infeksius" id="Tempat_sampah_infeksius_dan_non_infeksius" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tempat linen kotor</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_linen_kotor" id="Tempat_linen_kotor" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_linen_kotor" id="Tempat_linen_kotor" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_linen_kotor" id="Tempat_linen_kotor" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
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
													<th>Lantai bersih dan tidak licin</th>
													<th>Permukaan tidak berdebu</th>
													<th>Tidak ada lawa lawa</th>
													<th>Tempat sampah tertutup</th>
													<th>Wastafel cuci tangan selalu bersih dan bebas dari peralatan</th>
													<th>Keranda selalu bersih dan tidak berkarat</th>
													<th>Penutup keranda bersih</th>
													<th>Mobil jenazah bersih</th>
													<th>Mobil jenazah dibersihkan setiap habis pakai</th>
													<th>Tersedia APD lengkap (sarung tangan, masker, tutup kepala, goggles, gawn, celemek, sepatu)</th>
													<th>Alat cuci tangan lengkap di ruangan ( wastafel, sabun anti septic, handtowel dan hansrub)</th>         
													<th>Tersedia handrub di mobil jenazah</th>
													<th>Tersedia spilkit di mobil jenazah</th>
													<th>Tempat sampah infeksius dan non infeksius</th>
													<th>Tempat linen kotor</th>
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
													<th>Lantai bersih dan tidak licin</th>
													<th>Permukaan tidak berdebu</th>
													<th>Tidak ada lawa lawa</th>
													<th>Tempat sampah tertutup</th>
													<th>Wastafel cuci tangan selalu bersih dan bebas dari peralatan</th>
													<th>Keranda selalu bersih dan tidak berkarat</th>
													<th>Penutup keranda bersih</th>
													<th>Mobil jenazah bersih</th>
													<th>Mobil jenazah dibersihkan setiap habis pakai</th>
													<th>Tersedia APD lengkap (sarung tangan, masker, tutup kepala, goggles, gawn, celemek, sepatu)</th>
													<th>Alat cuci tangan lengkap di ruangan ( wastafel, sabun anti septic, handtowel dan hansrub)</th>         
													<th>Tersedia handrub di mobil jenazah</th>
													<th>Tersedia spilkit di mobil jenazah</th>
													<th>Tempat sampah infeksius dan non infeksius</th>
													<th>Tempat linen kotor</th>
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

<script>
$(document).ready(function(){
	reload_datatables();
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
        "url": '<?php echo base_url("Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah/get_all_data"); ?>',
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
					url:"<?= base_url("Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah/delete") ?>",
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
$.ajax({
	type: "POST",
	url:"<?= base_url("Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah/insert") ?>",
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
		url:"<?= base_url("Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah/getData") ?>",
		data: {
			id:id
		},
		beforeSend:function(){
						//Smooth Scroll
			window.scrollTo({
				top:0,
				behavior:'smooth'
			});
		},
		dataType: "json",
		success: function (res) {
			if(res != 0){
				$("#tglForm").val(res.Tanggal);
				$("#idP").val(btoa(res.id_pelaksanaan_ppi));
				$("#unit").val(res.unit);
				$("input[type='radio'][name='Lantai_bersih_dan_tidak_licin'][value='"+res.Lantai_bersih_dan_tidak_licin+"']").prop('checked',true);
				$("input[type='radio'][name='Permukaan_tidak_berdebu'][value='"+res.Permukaan_tidak_berdebu+"']").prop('checked',true);
				$("input[type='radio'][name='Tidak_ada_awa_lawa'][value='"+res.Tidak_ada_awa_lawa+"']").prop('checked',true);
				$("input[type='radio'][name='Tempat_sampah_tertutup'][value='"+res.Tempat_sampah_tertutup+"']").prop('checked',true);
				$("input[type='radio'][name='Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan'][value='"+res.Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan+"']").prop('checked',true);
				$("input[type='radio'][name='Keranda_selalu_bersih_dan_tidak_berkarat'][value='"+res.Keranda_selalu_bersih_dan_tidak_berkarat+"']").prop('checked',true);
				$("input[type='radio'][name='Penutup_keranda_bersih'][value='"+res.Penutup_keranda_bersih+"']").prop('checked',true);
				$("input[type='radio'][name='Mobil_jenazah_bersih'][value='"+res.Mobil_jenazah_bersih+"']").prop('checked',true);
				$("input[type='radio'][name='Mobil_jenazah_dibersihkan_setiap_habis_pakai'][value='"+res.Mobil_jenazah_dibersihkan_setiap_habis_pakai+"']").prop('checked',true);
				$("input[type='radio'][name='Tersedia_APD_lengkap'][value='"+res.Tersedia_APD_lengkap+"']").prop('checked',true);
				$("input[type='radio'][name='Alat_cuci_tangan_lengkap_diruangan'][value='"+res.Alat_cuci_tangan_lengkap_diruangan+"']").prop('checked',true);
				$("input[type='radio'][name='Tersedia_handrub_dimobil_jenazah'][value='"+res.Tersedia_handrub_dimobil_jenazah+"']").prop('checked',true);
				$("input[type='radio'][name='Tersedia_spilkit_dimobil_jenazah'][value='"+res.Tersedia_spilkit_dimobil_jenazah+"']").prop('checked',true);
				$("input[type='radio'][name='Tempat_sampah_infeksius_dan_non_infeksius'][value='"+res.Tempat_sampah_infeksius_dan_non_infeksius+"']").prop('checked',true);
				$("input[type='radio'][name='Tempat_linen_kotor'][value='"+res.Tempat_linen_kotor+"']").prop('checked',true);
				$("#btnUpdate").show();
				$("#btnSimpan").hide();
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

$('#btnUpdate').on('click',(e)=>{
e.preventDefault();
var formDatas = new FormData(document.getElementById('formDatas'));
$.ajax({
	type: "POST",
	url:"<?= base_url("Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah/update") ?>",
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
=======
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6>FORMULIR MONITORING PELAKSANAAN PPI DI KAMAR JENAZAH</h6>
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
								<label for="" class="control-label mb-10 text-left">Unit <span class="help"></span></label>
								<div class="has-success">
									<input type="text" name="unit" id="unit" class="form-control">
								</div>
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
								<label for="" class="control-label mb-10 text-left">Lantai bersih dan tidak licin</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Lantai_bersih_dan_tidak_licin" id="Lantai_bersih_dan_tidak_licin" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Lantai_bersih_dan_tidak_licin" id="Lantai_bersih_dan_tidak_licin" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Lantai_bersih_dan_tidak_licin" id="Lantai_bersih_dan_tidak_licin" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Permukaan tidak berdebu</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Permukaan_tidak_berdebu" id="Permukaan_tidak_berdebu" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Permukaan_tidak_berdebu" id="Permukaan_tidak_berdebu" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Permukaan_tidak_berdebu" id="Permukaan_tidak_berdebu" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tidak ada lawa lawa</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tidak_ada_awa_lawa" id="Tidak_ada_awa_lawa" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tidak_ada_awa_lawa" id="Tidak_ada_awa_lawa" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tidak_ada_awa_lawa" id="Tidak_ada_awa_lawa" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tempat sampah tertutup</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_sampah_tertutup" id="Tempat_sampah_tertutup" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_sampah_tertutup" id="Tempat_sampah_tertutup" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_sampah_tertutup" id="Tempat_sampah_tertutup" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Wastafel cuci tangan selalu bersih dan bebas dari peralatan</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan" id="Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan" id="Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan" id="Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Keranda selalu bersih dan tidak berkarat</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Keranda_selalu_bersih_dan_tidak_berkarat" id="Keranda_selalu_bersih_dan_tidak_berkarat" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Keranda_selalu_bersih_dan_tidak_berkarat" id="Keranda_selalu_bersih_dan_tidak_berkarat" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Keranda_selalu_bersih_dan_tidak_berkarat" id="Keranda_selalu_bersih_dan_tidak_berkarat" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Penutup keranda bersih</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Penutup_keranda_bersih" id="Penutup_keranda_bersih" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Penutup_keranda_bersih" id="Penutup_keranda_bersih" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Penutup_keranda_bersih" id="Penutup_keranda_bersih" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Mobil jenazah bersih</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Mobil_jenazah_bersih" id="Mobil_jenazah_bersih" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Mobil_jenazah_bersih" id="Mobil_jenazah_bersih" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Mobil_jenazah_bersih" id="Mobil_jenazah_bersih" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Mobil jenazah dibersihkan setiap habis pakai</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Mobil_jenazah_dibersihkan_setiap_habis_pakai" id="Mobil_jenazah_dibersihkan_setiap_habis_pakai" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Mobil_jenazah_dibersihkan_setiap_habis_pakai" id="Mobil_jenazah_dibersihkan_setiap_habis_pakai" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Mobil_jenazah_dibersihkan_setiap_habis_pakai" id="Mobil_jenazah_dibersihkan_setiap_habis_pakai" value='NA'>
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
									<strong>Fasilitas</strong>
								</label>
							</h6>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tersedia APD lengkap (Sarung Tangan, Masker, Tutup Kepala, Goggles, Gawn, Celemek, Sepatu)</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_APD_lengkap" id="Tersedia_APD_lengkap" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_APD_lengkap" id="Tersedia_APD_lengkap" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_APD_lengkap" id="Tersedia_APD_lengkap" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Alat cuci tangan lengkap diruangan</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Alat_cuci_tangan_lengkap_diruangan" id="Alat_cuci_tangan_lengkap_diruangan" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Alat_cuci_tangan_lengkap_diruangan" id="Alat_cuci_tangan_lengkap_diruangan" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Alat_cuci_tangan_lengkap_diruangan" id="Alat_cuci_tangan_lengkap_diruangan" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span class="clearfix">&nbsp;</span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tersedia handrub di mobil jenazah</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_handrub_dimobil_jenazah" id="Tersedia_handrub_dimobil_jenazah" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_handrub_dimobil_jenazah" id="Tersedia_handrub_dimobil_jenazah" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_handrub_dimobil_jenazah" id="Tersedia_handrub_dimobil_jenazah" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tersedia spilkit di mobil jenazah</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_spilkit_dimobil_jenazah" id="Tersedia_spilkit_dimobil_jenazah" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_spilkit_dimobil_jenazah" id="Tersedia_spilkit_dimobil_jenazah" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tersedia_spilkit_dimobil_jenazah" id="Tersedia_spilkit_dimobil_jenazah" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tempat sampah infeksius dan non infeksius</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_sampah_infeksius_dan_non_infeksius" id="Tempat_sampah_infeksius_dan_non_infeksius" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_sampah_infeksius_dan_non_infeksius" id="Tempat_sampah_infeksius_dan_non_infeksius" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_sampah_infeksius_dan_non_infeksius" id="Tempat_sampah_infeksius_dan_non_infeksius" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label for="" class="control-label mb-10 text-left">Tempat linen kotor</label>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_linen_kotor" id="Tempat_linen_kotor" value='Ya'>
									<label for="" class='control-label'>
										Ya
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_linen_kotor" id="Tempat_linen_kotor" value='Tidak'>
									<label for="" class='control-label'>
										Tidak
									</label>
								</div>
								<div class="radio-button radio-button-primary">
									<input type="radio" name="Tempat_linen_kotor" id="Tempat_linen_kotor" value='NA'>
									<label for="" class='control-label'>
										NA
									</label>
								</div>
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
													<th>Lantai bersih dan tidak licin</th>
													<th>Permukaan tidak berdebu</th>
													<th>Tidak ada lawa lawa</th>
													<th>Tempat sampah tertutup</th>
													<th>Wastafel cuci tangan selalu bersih dan bebas dari peralatan</th>
													<th>Keranda selalu bersih dan tidak berkarat</th>
													<th>Penutup keranda bersih</th>
													<th>Mobil jenazah bersih</th>
													<th>Mobil jenazah dibersihkan setiap habis pakai</th>
													<th>Tersedia APD lengkap (sarung tangan, masker, tutup kepala, goggles, gawn, celemek, sepatu)</th>
													<th>Alat cuci tangan lengkap di ruangan ( wastafel, sabun anti septic, handtowel dan hansrub)</th>         
													<th>Tersedia handrub di mobil jenazah</th>
													<th>Tersedia spilkit di mobil jenazah</th>
													<th>Tempat sampah infeksius dan non infeksius</th>
													<th>Tempat linen kotor</th>
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
													<th>Lantai bersih dan tidak licin</th>
													<th>Permukaan tidak berdebu</th>
													<th>Tidak ada lawa lawa</th>
													<th>Tempat sampah tertutup</th>
													<th>Wastafel cuci tangan selalu bersih dan bebas dari peralatan</th>
													<th>Keranda selalu bersih dan tidak berkarat</th>
													<th>Penutup keranda bersih</th>
													<th>Mobil jenazah bersih</th>
													<th>Mobil jenazah dibersihkan setiap habis pakai</th>
													<th>Tersedia APD lengkap (sarung tangan, masker, tutup kepala, goggles, gawn, celemek, sepatu)</th>
													<th>Alat cuci tangan lengkap di ruangan ( wastafel, sabun anti septic, handtowel dan hansrub)</th>         
													<th>Tersedia handrub di mobil jenazah</th>
													<th>Tersedia spilkit di mobil jenazah</th>
													<th>Tempat sampah infeksius dan non infeksius</th>
													<th>Tempat linen kotor</th>
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

<script>
$(document).ready(function(){
	reload_datatables();
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
        "url": '<?php echo base_url("Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah/get_all_data"); ?>',
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
					url:"<?= base_url("Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah/delete") ?>",
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
$.ajax({
	type: "POST",
	url:"<?= base_url("Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah/insert") ?>",
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
		url:"<?= base_url("Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah/getData") ?>",
		data: {
			id:id
		},
		beforeSend:function(){
						//Smooth Scroll
			window.scrollTo({
				top:0,
				behavior:'smooth'
			});
		},
		dataType: "json",
		success: function (res) {
			if(res != 0){
				$("#tglForm").val(res.Tanggal);
				$("#idP").val(btoa(res.id_pelaksanaan_ppi));
				$("#unit").val(res.unit);
				$("input[type='radio'][name='Lantai_bersih_dan_tidak_licin'][value='"+res.Lantai_bersih_dan_tidak_licin+"']").prop('checked',true);
				$("input[type='radio'][name='Permukaan_tidak_berdebu'][value='"+res.Permukaan_tidak_berdebu+"']").prop('checked',true);
				$("input[type='radio'][name='Tidak_ada_awa_lawa'][value='"+res.Tidak_ada_awa_lawa+"']").prop('checked',true);
				$("input[type='radio'][name='Tempat_sampah_tertutup'][value='"+res.Tempat_sampah_tertutup+"']").prop('checked',true);
				$("input[type='radio'][name='Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan'][value='"+res.Wastafel_cuci_tangan_selalu_bersih_dan_bebas_dari_peralatan+"']").prop('checked',true);
				$("input[type='radio'][name='Keranda_selalu_bersih_dan_tidak_berkarat'][value='"+res.Keranda_selalu_bersih_dan_tidak_berkarat+"']").prop('checked',true);
				$("input[type='radio'][name='Penutup_keranda_bersih'][value='"+res.Penutup_keranda_bersih+"']").prop('checked',true);
				$("input[type='radio'][name='Mobil_jenazah_bersih'][value='"+res.Mobil_jenazah_bersih+"']").prop('checked',true);
				$("input[type='radio'][name='Mobil_jenazah_dibersihkan_setiap_habis_pakai'][value='"+res.Mobil_jenazah_dibersihkan_setiap_habis_pakai+"']").prop('checked',true);
				$("input[type='radio'][name='Tersedia_APD_lengkap'][value='"+res.Tersedia_APD_lengkap+"']").prop('checked',true);
				$("input[type='radio'][name='Alat_cuci_tangan_lengkap_diruangan'][value='"+res.Alat_cuci_tangan_lengkap_diruangan+"']").prop('checked',true);
				$("input[type='radio'][name='Tersedia_handrub_dimobil_jenazah'][value='"+res.Tersedia_handrub_dimobil_jenazah+"']").prop('checked',true);
				$("input[type='radio'][name='Tersedia_spilkit_dimobil_jenazah'][value='"+res.Tersedia_spilkit_dimobil_jenazah+"']").prop('checked',true);
				$("input[type='radio'][name='Tempat_sampah_infeksius_dan_non_infeksius'][value='"+res.Tempat_sampah_infeksius_dan_non_infeksius+"']").prop('checked',true);
				$("input[type='radio'][name='Tempat_linen_kotor'][value='"+res.Tempat_linen_kotor+"']").prop('checked',true);
				$("#btnUpdate").show();
				$("#btnSimpan").hide();
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

$('#btnUpdate').on('click',(e)=>{
e.preventDefault();
var formDatas = new FormData(document.getElementById('formDatas'));
$.ajax({
	type: "POST",
	url:"<?= base_url("Formulir_Monitoring_Pelaksaan_PPI_diKamar_Jenazah/update") ?>",
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
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</script>